<?php
class clsteacher
{
	var $password;
	var $email;
	var $action;
	var $error;
	var $session;
	
	function clsteacher()
	{
		$this->email="";
		$this->password="";
		$this->action="";
		$this->error="";
		$this->session = new clssession();
  	}

	function setpostvars()
	{
		if(isset($_POST["clsteacher_email"])) 					$this->email 	= trim($_POST["clsteacher_email"]);
		if(isset($_POST["clsteacher_password"])) 				$this->password = trim($_POST["clsteacher_password"]);
		if(isset($_POST["clsteacher_hdnaction"])) 				$this->action 	= trim($_POST["clsteacher_hdnaction"]);
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
			if($returnvalue == 0)
				$this->error = "Invalid Login ID or Password...";
			else 
			{
				$this->session->startSession();
				$_SESSION["userid"] = $returnvalue;
				
				if($returnvalue >= 1)
					echo "<script>window.location= 'http://jaspreet/qmc/addEditquestion.php';</script>";
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
		echo header("Location:http://jaspreet/qmc/teacherLogin.php");
	}
	
	/***
	    Function called from pageUserLogin() function. Added by Arpit (18/12/2007) - For validationg user login
    **/
	function validateuser($connid)
	{
		$returnvalue = 0;
		//echo $query."A<br>";
		//$query = "SELECT COUNT(*) FROM qmc_registrationdetails WHERE email='".$this->email."' AND password=password('".$this->password."')";
		$query = "SELECT * FROM qmc_registrationdetails WHERE teacher_email='".trim($this->email)."' AND teacher_password=password('".$this->password."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($dbquery->numrows() > 0)
		{
			$returnvalue=$row["srno"];
		}
		
		return $returnvalue;
	}
}
?>