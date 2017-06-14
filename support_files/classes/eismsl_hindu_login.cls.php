<?
class clssmsl_hindu_login
{
	var $password;
	var $username;
	var $newpassword;
	var $old_password;
	var $action;
	var $error;
	var $session;
	
	function clssmsl_hindu_login()
	{
		$this->password = "";
		$this->username = "";
		$this->password="";
        $this->old_password = "";
		$this->action = "";
		$this->error = "";
		$this->session = new clssession();
	}
	function setpostvars()
	{
		if(isset($_POST["clssmslhindulogin_username"])) $this->username = trim($_POST["clssmslhindulogin_username"]);
		if(isset($_POST["clssmslhindulogin_password"])) $this->password = trim($_POST["clssmslhindulogin_password"]);
		if(isset($_POST["clssmslhindulogin_hdnaction"])) $this->action = trim($_POST["clssmslhindulogin_hdnaction"]);
		if(isset($_POST["clssmslhindulogin_newpassword"])) $this->newpassword = trim($_POST["clssmslhindulogin_newpassword"]);
		
	}
	function pageUserLogin($connid)
	{
		$this->setpostvars();
		if($this->action == "UserLogin")
		{
			$returnvalue = $this->validateuser($connid);
			if($returnvalue == 0)
			{
				$this->error = "Invalid Username or Password";
			}
			else 
			{
				$this->session->startSession();
				$_SESSION["userid"] = $this->username;
				echo "<script>window.location= 'http://".$_SERVER['SERVER_NAME']."/asset_hindu/accountDetails.php';</script>";	
			}
		}
	}
	function pageUserLogout()
	{
		$this->setpostvars();
		$this->session->destroySession();
		echo header("Location:http://".$_SERVER['SERVER_NAME']."/asset_hindu/login.php");
	}
	function validateuser($connid)
	{
		$query = "SELECT COUNT(*) FROM smsl_hinduRegistrationDetails WHERE username = '".$this->username."' AND password = password('".$this->password."') ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] > 0)
			return 1;
		else 
			return 0;
	}
	function ChangePassword($connid)
	{
		$this->setpostvars();
		$updateID = 0;
		if($this->action == "PasswordChange")
		{
			$query = "UPDATE smsl_hinduRegistrationDetails SET password='".$this->newpassword."',updated_date = NOW() WHERE username='".$this->username."' AND password = '".password($this->old_password)."' LIMIT 1";
			$dbquery = new dbquery($query,$connid);
			
			//$update_result = mysql_query($update_query) or die("<br>Error in update query - ".mysql_error());
			if ($dbquery->affectedrows()>0)
			{
				$updateID = 1;
			}
		}
		return $updateID;
	}
}
?>