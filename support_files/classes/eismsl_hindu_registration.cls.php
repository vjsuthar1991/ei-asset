<?php 
class clssmsl_hindu_register
{
	var $fullname;
	var $email;
	var $phone;
	var $mobile;
	var $std_code;
	var $bmonth;
	var $bday;
	var $byear;
	var $gender;
	var $school_name;
	var $entered_date;
	var $entered_by;
	var $modified_by;
	var $modified_date;
	var $password;
	var $username;
	var $action;
	var $error;
	
	function clssmsl_hindu_register()
	{
		$this->fullname = "";
		$this->email = "";
		$this->phone = "";
		$this->mobile = "";
		$this->std_code = "";
		$this->dob = "";
		$this->gender = "";
		$this->school_name = "";
		$this->entered_date = "";
		$this->entered_by = "";
		$this->modified_by = "";
		$this->modified_date = "";
		$this->password = "";
		$this->username = "";
		$this->action = "";
		$this->error = "";
		$this->session = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clssmslhindu_fullname"])) $this->fullname = trim($_POST["clssmslhindu_fullname"]);
		if(isset($_POST["clssmslhindu_email"])) $this->email = trim($_POST["clssmslhindu_email"]);
		if(isset($_POST["clssmslhindu_std_code"])) $this->std_code = $_POST["clssmslhindu_std_code"];
		if(isset($_POST["clssmslhindu_phone"])) $this->phone = trim($_POST["clssmslhindu_phone"]);
		if(isset($_POST["clssmslhindu_mobile"])) $this->mobile = trim($_POST["clssmslhindu_mobile"]);
		if(isset($_POST["clssmslhindu_bmonth"])) $this->bmonth = trim($_POST["clssmslhindu_bmonth"]);
		if(isset($_POST["clssmslhindu_bday"])) $this->bday = trim($_POST["clssmslhindu_bday"]);
		if(isset($_POST["clssmslhindu_byear"])) $this->byear = trim($_POST["clssmslhindu_byear"]);
		if(isset($_POST["clssmslhindu_gender"])) $this->gender = trim($_POST["clssmslhindu_gender"]);
		if(isset($_POST["clssmslhindu_schoolname"])) $this->school_name = trim($_POST["clssmslhindu_schoolname"]);
		if(isset($_POST["clssmslhindu_stdcode"])) $this->std_code = trim($_POST["clssmslhindu_stdcode"]);
		if(isset($_POST["clssmslhindu_username"])) $this->username = trim($_POST["clssmslhindu_username"]);
		if(isset($_POST["clssmslhindu_password"])) $this->password = trim($_POST["clssmslhindu_password"]);
		if(isset($_POST["clssmslhindu_hdnaction"])) $this->action = trim($_POST["clssmslhindu_hdnaction"]);
	}
	function pageRegisterStudents($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
			$this->saveData($connid);
		if($this->action == "UpdateData")	
			$this->updateData($connid);
	}
	function saveData($connid)
	{
		$dob = $this->byear."-".$this->bmonth."-".$this->bday;
		$query = "INSERT INTO smsl_hinduRegistrationDetails SET 
				  fullname = '".$this->fullname."',
				  email    = '".$this->email."', 
				  std_code    = '".$this->std_code."',
				  phone_res    = '".$this->phone."',
				  gender   = '".$this->gender."',
				  dob   = '".$dob."',
				  school_name = '".$this->school_name."',
				  mobile = '".$this->mobile."',
			      username = '".$this->username."',
			      password = password('".$this->password."')";
		$dbquery = new dbquery($query,$connid);
		$this->action = "Successfull";
		
	}
	function retrieveDetails($connid)
	{
		$query = "SELECT * FROM smsl_hinduRegistrationDetails WHERE username = '".$this->username."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->username = $row["username"];
		$this->fullname = $row["fullname"];
		$this->std_code = $row["std_code"];
		$this->phone = $row["phone_res"];
		$this->gender = $row["gender"];
		$this->dob = $row["dob"];
		$this->email = $row["email"];
		$this->school_name = $row["school_name"];
		$this->mobile = $row["mobile"];
	}
	function updatedData($connid)
	{
		
		$query = "UPDATE smsl_hinduRegistrationDetails SET 
				  fullname = '".$this->fullname."',
				  email    = '".$this->email."', 
				  std_code    = '".$this->std_code."',
				  phone_res    = '".$this->phone."',
				  gender   = '".$this->gender."',
				  dob   = '".$this->dob."',
				  school_name = '".$this->school_name."',
				  mobile = '".$this->mobile."',
			      username = '".$this->username."'
			      WHERE username = '".$_SESSION["userid"]."'";
		$dbquery = new dbquery($query,$connid);
	}
	function changePassword($connid)
	{
		
	}
}
?>