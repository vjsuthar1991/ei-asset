<?php
class clstgteacherlogin
{
	var $password;
    var $old_password;
	var $username;
	var $action;
	var $error;
	var $session;
	var $newpassword;
	function clstgteacherlogin()
	{
		$this->username="";
		$this->password="";
        $this->old_password = "";
		$this->newpassword = "";
		$this->action="";
		$this->error="";
		$this->session = new clssession();
  	}

	function setpostvars()
	{
		if(isset($_POST["clstgteacherlogin_username"])) 				$this->username	= trim($_POST["clstgteacherlogin_username"]);
		if(isset($_POST["clstgteacherlogin_password"])) 				$this->password = trim($_POST["clstgteacherlogin_password"]);
		if(isset($_POST["clstgteacherlogin_newpassword"])) 				$this->newpassword = trim($_POST["clstgteacherlogin_newpassword"]);
		if(isset($_POST["clstgteacherlogin_hdnaction"])) 				$this->action 	= trim($_POST["clstgteacherlogin_hdnaction"]);
        if(isset($_POST["clstgteacherlogin_oldpassword"])) 				$this->old_password = $_POST["clstgteacherlogin_oldpassword"];
    }
    function setgetvars()
	{
		if(isset($_GET["username"])) $this->username = trim($_GET["username"]);
	}
    /***
	    Function called from bt_userLogin.php. Added by Arpit (18/12/2007) - For validationg user login
    **/
    function pageUserLogin($connid)
	{
		$this->setpostvars();
		if($this->action == "UserLogin")
		{
			$returnvalue = $this->validateuser($connid);
			if($returnvalue == -1)
				$this->error = "Invalid Username or Password";
			else 
			{
				if ($returnvalue==-2)
				{
					//$this->pageUserLogout($connid);
					$this->error = "Login Expired!";
					echo "<div align=center><table width=650 bgcolor=\"#EEEEEE\" style=\"border:1px solid black;\" height=50><tr><th valign=center align=center><font size=2 face=arial><b>Your login ID is expired !!</td></tr><tr><td align=center><font size=2 face=arial><b>
					Please send School Summary Form (Final SSF) to renew the login.</b></font></td></tr></table><br></div>";
				}
				else if ($returnvalue==-3)
				{
					echo "<script>window.location= 'http://programserver/tgs/tgteacher_passwordchange.php?username=".md5(strtoupper($this->username))."';</script>";
				}
				else if($returnvalue >= 1)
				{
					$this->session->startSession();
					$_SESSION["userid"] = $returnvalue;
                                        $this->saveLoginDetails($connid);
					echo "<script>window.location= 'http://programserver/tgs/index.php';</script>";	
				}
			}
		}
	}
	//Function to store the login details....
	function saveLoginDetails($connid)
	{
		$query = "INSERT INTO tg_logindetails SET teacher_userid = '".$_SESSION["userid"]."',start_time = NOW() ";
		$dbquery = new dbquery($query,$connid);
		$_SESSION['loginid'] = $dbquery->insertid;
	}
	function saveLogoutDetails($connid)
	{
		$query = "UPDATE tg_logindetails SET end_time = NOW() WHERE id = '".$_SESSION['loginid']."' AND teacher_userid = '".$_SESSION["userid"]."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		//exit;
	}
	/***
	    Function called from any page where user clicks on Logout. Added by Arpit (23/12/2007)
    **/
    function pageUserLogout($connid)
	{
		$this->setpostvars();
                $this->saveLogoutDetails($connid);
		$this->session->destroySession();
		echo header("Location:http://programserver/tgs/tgteacher_login.php");
	}
	
	/***
	    Function called from pageUserLogin() function. Added by Arpit (18/12/2007) - For validationg user login
    **/
	function ChangePassword($connid)
	{
		$this->setpostvars();
		$updateID = 0;
		if($this->action == "PasswordChange")
		{
			$query = "UPDATE tg_teacherdetails SET password='".$this->newpassword."',updated_date = NOW() WHERE username='".$this->username."' AND password = '".$this->old_password."' LIMIT 1";
			$dbquery = new dbquery($query,$connid);
			
			//$update_result = mysql_query($update_query) or die("<br>Error in update query - ".mysql_error());
			if ($dbquery->affectedrows()>0)
			{
				$updateID = 1;
			}
		}
		return $updateID;
	}
	function decryptUsername($username,$connid)
	{
		$query = "SELECT username FROM tg_teacherdetails where md5(username) = '".$username."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["username"];
	}
	function validateuser($connid)
	{
		$returnvalue = 0;
		//echo $query."A<br>";
		//$query = "SELECT COUNT(*) FROM qmc_registrationdetails WHERE email='".$this->email."' AND password=password('".$this->password."')";
		//$query = "SELECT * FROM qmc_registrationdetails WHERE teacher_email='".trim($this->email)."' AND teacher_password=password('".$this->password."')";
		$query = "SELECT * FROM tg_teacherdetails WHERE username='".trim($this->username)."' AND password='".$this->password."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($dbquery->numrows() > 0)
		{
			$username = $row['username'];
			$password = $row['password'];
			$end_date = $row['end_date'];
			if ($end_date < date("Y-m-d"))
			{
				$returnvalue = -2;
			}
			else
			{
				$default_password = str_replace("_","@",$username);
				if ($password==$default_password)
				{
					$returnvalue = -3;
				}
				else
				{
					$returnvalue=$row["teacher_id"];
				}
			}
		}
		else
		{
			$returnvalue = -1;
		}
		
		return $returnvalue;
	}
        function getTeacherUsername($connid)
        {
          $query = "SELECT username FROM tg_teacherdetails WHERE teacher_id =  '".$_SESSION["userid"]."'";
          $dbquery = new dbquery($query,$connid);
          $row = $dbquery->getrowarray();
          return $row["username"];
	}
}
?>