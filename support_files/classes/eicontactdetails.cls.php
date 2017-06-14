<?php
class clscontactdetails
{
        var $contact_id;
		var $school_code;
		var $school_name;
		var $contact_person;
		var $designation;
		var $std_code;
		var $contact_no;
		var $mobile_no;
		var $conact_mail;
		var $dob_date;
		var $dob_month;
		var $dob_year;
		var $doj;
		var $action;
		var $city;
		function clscontactdetails()
        {
                $this->contact_id = 0;
                $this->school_code = "";
				$this->school_name = "";
				$this->contact_person = "";
				$this->desingation = "";
				$this->std_code = "";
				$this->contact_no = "";
				$this->mobile_no = "";
				$this->contact_mail = "";
				$this->dob = "";
				$this->doj = "";
				$this->action = "";
				$this->city = "";
		}
		function setpostvars()
		{
			if(isset($_POST["clscontactdetails_contactperson"]))    $this->contact_person= trim($_POST["clscontactdetails_contactperson"]);
			if(isset($_POST["clscontactdetails_designation"])) $this->designation = $_POST["clscontactdetails_designation"];
			if(isset($_POST["clscontactdetails_stdcode"])) $this->std_code = $_POST["clscontactdetails_stdcode"];
			if(isset($_POST["clscontactdetails_contactno"])) $this->contact_no = $_POST["clscontactdetails_contactno"];
			if(isset($_POST["clscontactdetails_mobileno"])) $this->mobile_no = $_POST["clscontactdetails_mobileno"];
			if(isset($_POST["clscontactdetails_contactmail"])) $this->contact_mail = $_POST["clscontactdetails_contactmail"];
			if(isset($_POST["clscontactdetails_date"])) $this->dob_date = $_POST["clscontactdetails_date"];
			if(isset($_POST["clscontactdetails_month"])) $this->dob_month = $_POST["clscontactdetails_month"];
			if(isset($_POST["clscontactdetails_year"])) $this->dob_year = $_POST["clscontactdetails_year"];
			if(isset($_POST["clscontactdetails_doj"])) $this->doj = $_POST["clscontactdetails_doj"];
			if(isset($_POST["clscontactdetails_hdnaction"])) $this->action = $_POST["clscontactdetails_hdnaction"];
		}
		function setgetvars()
		{
			if(isset($_GET["id"])) $this->contact_id = $_GET["id"];
			
		}
		function retreiveContactDetailsByID($connid,$id)
		{
			$query = "SELECT schoolname,city,contact_details.std_code,contact_person,contact_no,mobile_no,contact_mail,DOB FROM contact_details,schools WHERE contact_details.school_code = schools.schoolno AND md5(contact_id) = '".$id."'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrDate = explode("-",$row["DOB"]);
				$year = $arrDate[0];
				$month = $arrDate[1];
				$date = $arrDate[2];
				$this->school_name = $row["schoolname"];
				$this->contact_person = $row["contact_person"];
				$this->std_code = $row["std_code"];
				$this->contact_no = $row["contact_no"];
				$this->mobile_no = $row["mobile_no"];
				$this->contact_mail = $row["contact_mail"];
				$this->dob_date = $date;
				$this->dob_month = $month;
				$this->dob_year = $year;
				$this->city = $row["city"];
			}
		}
		function pageChangeProfile($connid,$id)
		{
			$this->setpostvars();
			$this->setgetvars();
			//echo $id;
			//exit;
			if($this->action == "UpdateData")
			{
				$this->updateData($connid,$id);
				echo "<script language=javascript>window.location=\"thanksMessage.php\"</script>";
			}
		}
		function updateData($connid,$id)
		{
			//echo "Thisi jgdh".$id;
			//exit;
			if($id != "")
			{
				$dob = $this->dob_year."-".$this->dob_month."-".$this->dob_date;
				$query = "UPDATE contact_details SET ".
						 "contact_person = '".$this->contact_person."',".
						 "std_code = '".$this->std_code."',".
						 "contact_no = '".$this->contact_no."',".
						 "mobile_no = '".$this->mobile_no."',".
						 "contact_mail = '".$this->contact_mail."',".
						 "profile_updated = 'Y',".
						 "DOB = '".$dob."' WHERE md5(contact_id) = '".$id."'";
				$dbquery = new dbquery($query,$connid);
			}
		}
}
?>