<?php

class clsuserlogin
{
	var $userid;
	var $password;
	var $email;
	var $actiontoperform;
	var $erromsg;
	var $session;
	
	function clsuserlogin()
	{
		$this->userid="";
		$this->password="";
		$this->email="";
		$this->actiontoperform="";
		$this->erromsg="";
		$this->session = new clssession();
  	}

	function setpostvars()
	{
		if(isset($_POST["userid"])) 							$this->userid   = DoTrim($_POST["userid"]);
		if(isset($_POST["password"])) 							$this->password = DoTrim($_POST["password"]);
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
				
				if($returnvalue == 1)
				{
					$_SESSION["usertype"] = "Admin";
					$this->doLogEntry($_SESSION["userid"],$_SESSION["usertype"],$connid);
					echo "<script>redirectPage('bt_adminPanel.php');</script>";
				}
				elseif($returnvalue==2)
				{
					$_SESSION["usertype"] = "Child";
					$this->doLogEntry($_SESSION["userid"],$_SESSION["usertype"],$connid);
					$querystring = "hdn_actiontoperform=View Child&cts_number=".$this->userid;
					$url="bt_viewChild.php?".$querystring;
					echo "<script>redirectPage('".$url."');</script>";
				}
				elseif($returnvalue==3)
				{
					$_SESSION["usertype"] = "School";
					$this->doLogEntry($_SESSION["userid"],$_SESSION["usertype"],$connid);
					$querystring = "schoolcode=".$this->userid;
					$url="bt_adminPanel.php?".$querystring;
					echo "<script>redirectPage('".$url."');</script>";
				}
			}
		}
	}
	
	/***
	    Function called from any page where user clicks on Logout. Added by Arpit (23/12/2007)
    **/
    function pageUserLogout($connid)
	{
		$this->setpostvars();
		$this->session->destroySession();
		echo "<script>redirectPage('bt_userLogin.php');</script>";
	}
	
	/***
	    Function called from pageUserLogin() function. Added by Arpit (18/12/2007) - For validationg user login
    **/
	function validateuser($connid)
	{
		$returnvalue = 0;
		//echo $query."A<br>";
		$query = "SELECT COUNT(*) FROM bt_users WHERE userid='".$this->userid."' AND password=password('".$this->password."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($row[0] != 0)
		{
			$returnvalue=1;
		}
		
		if($returnvalue == 0)
		{
			$query = "SELECT COUNT(*) FROM student_master WHERE cts_number='".$this->userid."' AND password=password('".$this->password."')";
			//echo $query."<br>";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($row[0] != 0)
			{
				$returnvalue=2;
			}
		}
		
		if($returnvalue == 0)
		{
			$query = "SELECT COUNT(*) FROM school_master WHERE schoolcode='".$this->userid."' AND password=password('".$this->password."')";
			//echo $query."<br>";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($row[0] != 0)
			{
				$returnvalue=3;
			}
		}
		
		return $returnvalue;
	}
	
	function doLogEntry($userid,$usertype,$connid)
	{
		$query = "INSERT INTO bt_log SET userid='".$userid."', usertype='".$usertype."'";
		$dbquery = new dbquery($query,$connid);
	}
}
?>