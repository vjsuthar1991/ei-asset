<?php
class clsparentseminar
{
	var $id;
	var $name;
	var $mobile_no;
	var $email;
	var $std_code;
	var $phone_no;
	var $child_name;
	var $child_class;
	var $child_school;
	var $child_email;
	var $asset_taken;
	var $mindspark_taken;
	var $about_asset;
	var $about_mindspark;
	var $attend_seminar;
	var $entered_dt;
	var $entered_by;
	var $modified_dt;
	var $modified_by;
	var $action;
	function clsparentseminar()
	{
		$this->id=0;
		$this->name="";
		$this->mobile_no="";
		$this->email = "";
		$this->std_code="";
		$this->phone_no="";
		$this->child_name="";
		$this->child_class="";
		$this->child_school="";
		$this->child_email="";
		$this->asset_taken="N";
		$this->mindspark_taken="N";
		$this->about_asset="N";
		$this->about_mindspark="N";
		$this->attend_seminar="N";
		$this->entered_dt="";
		$this->entered_by="";
		$this->modified_dt="";
		$this->modified_by="";
		$this->action = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsparentseminar_name"])) $this->name =  $_POST["clsparentseminar_name"];
		if(isset($_POST["clsparentseminar_email"])) $this->email =  $_POST["clsparentseminar_email"];
		if(isset($_POST["clsparentseminar_mobileno"])) $this->mobile_no =  $_POST["clsparentseminar_mobileno"];
		if(isset($_POST["clsparentseminar_stdno"])) $this->std_code =  $_POST["clsparentseminar_stdno"];
		if(isset($_POST["clsparentseminar_phoneno"])) $this->phone_no =  $_POST["clsparentseminar_phoneno"];
		if(isset($_POST["clsparentseminar_childname"])) $this->child_name =  $_POST["clsparentseminar_childname"];
		if(isset($_POST["clsparentseminar_childclass"])) $this->child_class =  $_POST["clsparentseminar_childclass"];
		if(isset($_POST["clsparentseminar_childschool"])) $this->child_school =  $_POST["clsparentseminar_childschool"];
		if(isset($_POST["clsparentseminar_childemail"])) $this->child_email =  $_POST["clsparentseminar_childemail"];
		if(isset($_POST["clsparentseminar_assettaken"])) $this->asset_taken =  $_POST["clsparentseminar_assettaken"];
		if(isset($_POST["clsparentseminar_mindsparktaken"])) $this->mindspark_taken =  $_POST["clsparentseminar_mindsparktaken"];
		if(isset($_POST["clsparentseminar_aboutasset"])) $this->about_asset =  $_POST["clsparentseminar_aboutasset"];
		if(isset($_POST["clsparentseminar_aboutmindspark"])) $this->about_mindspark =  $_POST["clsparentseminar_aboutmindspark"];
		if(isset($_POST["clsparentseminar_confirmattendance"])) $this->attend_seminar =  $_POST["clsparentseminar_confirmattendance"];
		if(isset($_POST["clsparentseminar_hdnaction"])) $this->action =  $_POST["clsparentseminar_hdnaction"];
		//print_r($_POST);
	}
	function pageAddParentSeminarRegistration($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
				$this->savedata($connid);
		}
	}
	function savedata($connid)
	{
		$this->entered_by = $this->name;
		$query = "INSERT INTO parentseminar_registrationdetails 
				 (fullname,email,mobile_no,std_code,phone_no,child_name,child_class,
				 child_school,child_email,asset_taken,mindspark_taken,
				 about_asset,about_mindspark,attend_seminar,entered_dt,entered_by)
				 VALUES ('".addslashes($this->name)."','".$this->email."','".$this->mobile_no."','".$this->std_code."','".$this->phone_no."','".$this->child_name.
				 "','".$this->child_class."','".addslashes($this->child_school)."','".addslashes($this->child_email).
				 "','".$this->asset_taken."','".$this->mindspark_taken.
				 "','".$this->about_asset."','".$this->about_mindspark."','".$this->attend_seminar."',NOW(),'".$this->entered_by."')";
		//echo $query;		 
		$dbquery = new dbquery($query,$connid);	
		echo header("Location:http://www.ei-india.com/parent-seminar/");
	}
	function validation($connid) 
	{
		if($this->name == "")
			$this->error["name"] = "Please enter your name for registering";
		if($this->mobile_no == "" && $this->phone_no == "")
			$this->error["number"] = "Please enter any one contact number for registering";	
		if($this->checkDuplication($connid))
			$this->error["duplicate"] = "You are already registered with us!";
		if(is_array($this->error) && count($this->error) > 0)	
			return false;
		else 
			return true;
	}
	function checkDuplication($connid)
	{
		if($this->mobile_no != "")
		{
			$query1 = "SELECT count(*) FROM parentseminar_registrationdetails WHERE mobile_no = '".$this->mobile_no."'";
			$dbquery1 = new dbquery($query1,$connid);
			$row1 = $dbquery1->getrowarray();
		}	
		if($this->phone_no != "")
		{
			$query2 = "SELECT count(*) FROM parentseminar_registrationdetails WHERE phone_no = '".$this->phone_no."'";	
			$dbquery2 = new dbquery($query2,$connid);
			$row2 = $dbquery2->getrowarray();
		}
		if($this->email != "")
		{
			$query3 = "SELECT count(*) FROM parentseminar_registrationdetails WHERE email= '".$this->email."'";	
			$dbquery3 = new dbquery($query3,$connid);
			$row3 = $dbquery3->getrowarray();
		}
				
		if($row1[0] > 0 || $row2[0] > 0 || $row3[0] > 0)
			return true;
		else 
		    return false;  
	}
}
?>