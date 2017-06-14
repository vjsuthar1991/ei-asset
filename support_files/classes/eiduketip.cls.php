<?php
class clsduketip
{
	var $firstName;
	var $lastName;
	var $fullName;
	var $panNumber;
	var $class;
	var $bmonth;
	var $bday;
	var $byear;
	var $gender;
	var $studentStdCode;
	var $studentContactNo;
	var $studentEmail;
	var $schoolName;
	var $schoolCode;
	var $examCity1;
	var $examCity2;
	var $parentCategory;
	var $parentFirstName;
	var $parentLastName;
	var $parentStdCode;
	var $parentRes;
	var $parentCell;
	var $parentEmail;
	var $address;
	var $address2;
	var $city;
	var $state;
	var $zipcode;
	var $checkAgreement;
	var $paymentMode;
	var $action;
	var $eligibleToRegister;
	var $displaymessage;
	var $bankName;
	var $chequeNo;
	var $amount;
	var $orderID;
	var $paymentStatus;
	var $acctCeditedDate;
	var $authDesc;
	var $middleName;
	var $motherFirstName;
	var $motherLastName;
	var $motherCell;
	var $motherEmail;
	var $readInstructions;
	var $country;

	/* Optional Attrs */
	var $principal;
	var $fee;
	var $no_of_sections;
	var $no_of_studs_in_class;
	var $board;

	var $bulkGenerated;

	function clsduketip()
	{
		$this->firstName = "";
		$this->lastName = "";
		$this->fullName = "";
		$this->panNumber ="";
		$this->bmonth = "";
		$this->bday = "";
		$this->byear = "";
		$this->gender = "";
		$this->studentStdCode = "";
		$this->studentEmail = "";
		$this->schoolName = "";
		$this->schoolCode = "";
		$this->studentContactNo = "";
		$this->examCity1 = "";
		$this->class = "";
		//$this->examCity2 = "";
		$this->parentCategory = "";
		$this->parentFirstName = "";
		$this->parentLastName = "";
		$this->parentStdCode = "";
		$this->parentRes = "";
		$this->parentCell = "";
		$this->parentEmail = "";
		$this->residenceAddress = "";
		$this->checkAgreement = "";
		$this->paymentMode = "";
		$this->action = "";
		$this->eligibleToRegister = "";
		$this->displaymessage = 0;
		$this->bankName = "";
		$this->chequeNo = "";
		$this->amount = "1000";
		$this->orderID = "";
		$this->paymentStatus = "";
		$this->acctCeditedDate = "";
		$this->authDesc = "";
		$this->middleName = "";
		$this->motherFirstName = "";
		$this->motherLastName = "";
		$this->motherCell = "";
		$this->motherEmail = "";
		$this->readInstructions = "";
		$this->country = "";

		/*$this->principal = '';
		$this->fee = '';
		$this->no_of_sections = '';
		$this->no_of_studs_in_class = '';
		$this->board = '';*/

	}
	function pageAddEditDetails($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action == "CheckData")
		{
			if($this->checkDuplicate($connid))
			{
				$this->displaymessage = 2;
			}
			else
			{
				// Before checking eligibility, check if source is not 'bulk generated'. 
				// Meaning student is not a asset student.
				if($this->isPANBulkGenerated($this->panNumber, $connid)){
					$this->bulkGenerated = true;					
				}else{
					$this->bulkGenerated = false;					
					$this->eligibleToRegister = $this->validateUserForReg($connid);
					if($this->eligibleToRegister == "" || count($this->eligibleToRegister) == 0)
					{
						$this->displaymessage = 1;	
					}
					else
					{
						$arrName = explode(" ",$this->eligibleToRegister["name"]);
						$len = count($arrName) - 1;
						$this->firstName = $arrName[0];
						$this->lastName = $arrName[$len];
						$this->country = $this->eligibleToRegister["country"];
					}
				}				
			}
		}
		if($this->action == "SaveData")
		{
			if($this->checkDuplicate($connid))
			{
				$this->displaymessage = 2;
			}
			else
			{
            	if($this->replaceCheck($connid,$this->panNumber))
                	$this->deleteOrder($connid,$this->panNumber);
                $this->saveData($connid);
			}
		}
		if($this->action == "UpdateData")
		{
			$this->updateDetailsByPanNumber($connid);
		}
	}
	function pageGetPan($connid)
	{
		$arrRet = array();
		$this->setpostvars();
		if($this->action == "getPanDetails")
			$arrRet = $this->validatePanRequest($connid);
		return $arrRet;
	}
	function setpostvars()
	{
		if(isset($_POST["clsduketip_hdnaction"])) $this->action = trim($_POST["clsduketip_hdnaction"]);
		if(isset($_POST["clsduketip_firstname"])) $this->firstName = trim($_POST["clsduketip_firstname"]);
		if(isset($_POST["clsduketip_lastname"])) $this->lastName = trim($_POST["clsduketip_lastname"]);
		if(isset($_POST["clsduketip_middlename"])) $this->middleName = trim($_POST["clsduketip_middlename"]);
		if(isset($_POST["clsduketip_fullname"])) $this->fullName = trim($_POST["clsduketip_fullname"]);
		if(isset($_POST["clsduketip_panno"])) $this->panNumber = trim($_POST["clsduketip_panno"]);
		if(isset($_POST["clsduketip_bmonth"])) $this->bmonth = trim($_POST["clsduketip_bmonth"]);
		if(isset($_POST["clsduketip_bday"])) $this->bday = trim($_POST["clsduketip_bday"]);
		if(isset($_POST["clsduketip_byear"])) $this->byear = trim($_POST["clsduketip_byear"]);
		if(isset($_POST["clsduketip_gender"])) $this->gender = trim($_POST["clsduketip_gender"]);
		if(isset($_POST["clsduketip_studentstdcode"])) $this->studentStdCode = trim($_POST["clsduketip_studentstdcode"]);
		if(isset($_POST["clsduketip_studentcontactno"])) $this->studentContactNo = trim($_POST["clsduketip_studentcontactno"]);
		if(isset($_POST["clsduketip_studentemail"])) $this->studentEmail = trim($_POST["clsduketip_studentemail"]);
		if(isset($_POST["clsduketip_schoolname"])) $this->schoolName = trim($_POST["clsduketip_schoolname"]);
		if(isset($_POST["clsduketip_examcity1"])) $this->examCity1 = trim($_POST["clsduketip_examcity1"]);
		if(isset($_POST["clsduketip_class"])){
			$this->class = trim($_POST["clsduketip_class"]);
		}else{
			$this->class = null;
		}		
		//if(isset($_POST["clsduketip_examcity2"])) $this->examCity2 = trim($_POST["clsduketip_examcity2"]);
		if(isset($_POST["clsduketip_parentcategory"])) $this->parentCategory = trim($_POST["clsduketip_parentcategory"]);
		if(isset($_POST["clsduketip_parentfirstname"])) $this->parentFirstName = trim($_POST["clsduketip_parentfirstname"]);
		if(isset($_POST["clsduketip_parentlastname"])) $this->parentLastName = trim($_POST["clsduketip_parentlastname"]);
		if(isset($_POST["clsduketip_parentcell"])) $this->parentCell = trim($_POST["clsduketip_parentcell"]);
		if(isset($_POST["clsduketip_parentstdcode"])) $this->parentStdCode = trim($_POST["clsduketip_parentstdcode"]);
		if(isset($_POST["clsduketip_parentres"])) $this->parentRes = trim($_POST["clsduketip_parentres"]);
		if(isset($_POST["clsduketip_parentemail"])) $this->parentEmail = trim($_POST["clsduketip_parentemail"]);
		if(isset($_POST["clsduketip_address"])) $this->address = trim($_POST["clsduketip_address"]);
		if(isset($_POST["clsduketip_address2"])) $this->address2 = trim($_POST["clsduketip_address2"]);
		if(isset($_POST["clsduketip_city"])) $this->city = trim($_POST["clsduketip_city"]);
		if(isset($_POST["clsduketip_state"])) $this->state = trim($_POST["clsduketip_state"]);
		if(isset($_POST["clsduketip_zipcode"])) $this->zipcode = trim($_POST["clsduketip_zipcode"]);
		if(isset($_POST["clsduketip_paymentmode"])) $this->paymentMode = trim($_POST["clsduketip_paymentmode"]);
		if(isset($_POST["clsduketip_bankname"])) $this->bankName = trim($_POST["clsduketip_bankname"]);
		if(isset($_POST["clsduketip_chequeno"])) $this->chequeNo = trim($_POST["clsduketip_chequeno"]);
		if(isset($_POST["clsduketip_hdnSchoolCode"])) $this->schoolCode = trim($_POST["clsduketip_hdnSchoolCode"]);
		if(isset($_POST["clsduketip_motherfirstname"])) $this->motherFirstName = trim($_POST["clsduketip_motherfirstname"]);
		if(isset($_POST["clsduketip_motherlastname"])) $this->motherLastName = trim($_POST["clsduketip_motherlastname"]);
		if(isset($_POST["clsduketip_mothercell"])) $this->motherCell = trim($_POST["clsduketip_mothercell"]);
		if(isset($_POST["clsduketip_motherstdcode"])) $this->motherStdCode = trim($_POST["clsduketip_motherstdcode"]);
		if(isset($_POST["clsduketip_motherres"])) $this->motherRes = trim($_POST["clsduketip_motherres"]);
		if(isset($_POST["clsduketip_motheremail"])) $this->motherEmail = trim($_POST["clsduketip_motheremail"]);
		if(isset($_POST["clsduketip_readinstructions"])) $this->readInstructions = trim($_POST["clsduketip_readinstructions"]);
		/*echo "<pre>";
		print_r($_POST);
		echo "<pre>";*/

		/*if(isset($_POST["clsduketip_principal"])) $this->principal = addslashes(trim($_POST["clsduketip_principal"]));
		if(isset($_POST["clsduketip_fee"])) $this->fee = addslashes(trim($_POST["clsduketip_fee"]));
		if(isset($_POST["clsduketip_no_of_sections"])) $this->no_of_sections = addslashes(trim($_POST["clsduketip_no_of_sections"]));
		if(isset($_POST["clsduketip_no_of_studs_in_class"])) $this->no_of_studs_in_class = addslashes(trim($_POST["clsduketip_no_of_studs_in_class"]));
		if(isset($_POST["clsduketip_board"])) $this->board = addslashes(trim($_POST["clsduketip_board"]));
		*/
	}
	function setgetvars()
	{
		if(isset($_GET["panNumber"])) $this->panNumber = trim($_GET["panNumber"]);
	}

	function saveData($connid)
	{
		$dob = $this->byear."-".$this->bmonth."-".$this->bday;
		$name = $this->firstName." ".$this->lastName;
		$query = "INSERT INTO duketip_registrationDetails SET
				firstName = '".$this->firstName."',
				middleName = '".$this->middleName."',
				lastName = '".$this->lastName."',
				panNumber = '".$this->panNumber."',
				dob = '".$dob."',
				gender = '".$this->gender."',
				studentEmail = '".$this->studentEmail."',
				studentStdCode = '".$this->studentStdCode."',
				studentContactNo = '".$this->studentContactNo."',
				schoolCode = '".$this->schoolCode."',
				examCity1= '".$this->examCity1."',					
				class= '".$this->class."',								
				parentCategory = '".$this->parentCategory."',
				parentFirstName = '".$this->parentFirstName."',
				parentLastName = '".$this->parentLastName."',
				parentRes = '".$this->parentRes."',
				parentStdCode = '".$this->parentStdCode."',
				parentCell = '".$this->parentCell."',
				parentEmail = '".$this->parentEmail."',
				motherFirstName = '".$this->motherFirstName."', 
				motherLastName = '".$this->motherLastName."',
				motherCell	= '".$this->motherCell."',
				motherEmail = '".$this->motherEmail."',
				address = '".$this->address."',
				address2 = '".$this->address2."',
				city = '".$this->city."',
				stateCode = '".$this->state."',
				zipCode = '".$this->zipcode."',
				paymentMode = '".$this->paymentMode."',
				bankName = '".$this->bankName."',
				chequeNo = '".$this->chequeNo."',				
				entered_by = '".$name."',			
				entered_date = NOW()";
			if($this->bulkGenerated === true){
				$query .= "notAssetStudent = 1";
			}
		$dbquery = new dbquery($query,$connid);
		$this->orderID = $dbquery->insertid;
		$this->setOrderID($connid,$this->orderID);
	}
	function validateUserForReg($connid)
	{
		//echo $connid;
		$arrRet = array();
		$query = "SELECT * FROM duketip_eligibleStudents WHERE pan_number = '".$this->panNumber."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($dbquery->numrows() > 0)
		{
			$arrRet["name"] = $row["name"];
			$arrRet["ep"] = $row["ep"];
			$arrRet["mp"] = $row["mp"];
			$arrRet["sp"] = $row["sp"];
			$arrRet["ssp"] = $row["ssp"];
			$arrRet["hp"] = $row["hp"];
			$arrRet["tp"] = $row["tp"];
			$arrRet["country"] = $row["country"];
		}
		return $arrRet;
	}

	function isPANBulkGenerated($pan,$connid){
		$checkAssetStudentQuery = "SELECT * from student_master WHERE pan_number='$pan' LIMIT 1";
		$dbquery = new dbquery($checkAssetStudentQuery,$connid);
		$studentRecord = $dbquery->getrowassocarray();
		if($studentRecord['source'] === 'BULK_GENERATE'){
			return true;
		}
		return false;
	}

	function setOrderID($connid,$regid)
	{
		$query = "UPDATE duketip_registrationDetails SET orderID = 'DUKETIP".$regid."' WHERE srno = '".$regid."'";
		$dbquery = new dbquery($query,$connid);
	}
	function getStateDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM stateCode_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["code"]] = $row["name"];
		}
		return $arrRet;
	}
	function checkDuplicate($connid)
	{
		$query = "SELECT count(*) FROM duketip_registrationDetails WHERE panNumber = '".$this->panNumber."' AND paymentStatus = 'paid' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function replaceCheck($connid,$panNumber)
	{
        if($panNumber > 0)
        {
           $query = "SELECT count(*) FROM duketip_registrationDetails WHERE panNumber = '".$panNumber."' AND paymentStatus = 'pending' ";
           $dbquery = new dbquery($query,$connid);
           $row = $dbquery->getrowarray();
			if($row[0] > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
        }
	}
    function deleteOrder($connid,$panNumber)
    {
      	$query = "SELECT * FROM duketip_registrationDetails WHERE panNumber = '".$panNumber."' AND paymentStatus = 'pending' ";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() > 0)
		{
			while($row = $dbquery->getrowarray())
			{
				$queryLog = "INSERT INTO duketip_registrationDetailsLog SET 
							srno = '".$row["srno"]."',
							orderID = '".$row["orderID"]."',
							firstName = '".$row["firstName"]."',
							lastName = '".$row["lastName"]."',
							middleName = '".$row["middleName"]."',
							panNumber = '".$row["panNumber"]."',
							dob = '".$row["dob"]."',
							gender = '".$row["gender"]."',
							studentEmail = '".$row["studentEmail"]."',
							studentStdCode = '".$row["studentStdCode"]."',
							studentContactNo = '".$row["studentContactNo"]."',
							schoolCode = '".addslashes($row["schoolCode"])."',
							examCity1= '".$row["examCity1"]."',
							class= '".$row["class"]."',							
							parentCategory = '".$row["parentCategory"]."',
							parentFirstName = '".addslashes($row["parentFirstName"])."',
							parentLastName = '".addslashes($row["parentLastName"])."',
							parentRes = '".$row["parentRes"]."',
							parentStdCode = '".$row["parentStdCode"]."',
							parentCell = '".$row["parentCell"]."',
							parentEmail = '".$row["parentEmail"]."',
							address = '".addslashes($row["address"])."',
							address2 = '".addslashes($row["address2"])."',
							city = '".$row["city"]."',
							stateCode = '".$row["stateCode"]."',
							zipCode = '".$row["zipCode"]."',
							paymentMode = '".$row["paymentMode"]."',
							paymentStatus = '".$row["paymentStatus"]."',
							acctCreditedDate = '".$row["acctCreditedDate"]."',
							authDesc = '".$row["authDesc"]."',
							bankName = '".addslashes($row["bankName"])."',
							chequeNo = '".$row["chequeNo"]."',
							entered_by = '".$row["entered_by"]."',
							entered_date = '".$row["entered_date"]."',
							modified_by = '".$row["modified_by"]."',
							modified_date = '".$row["modified_date"]."',
							notAssetStudent = '".$row["notAssetStudent"]."',
							lastModified = '".$row["lastModified"]."'";
				$dbqueryLog = new dbquery($queryLog,$connid);
				$queryDelete = "DELETE FROM duketip_registrationDetails WHERE srno = '".$row["srno"]."' AND paymentStatus = 'pending' LIMIT 1";
				$dbqueryDelete = new dbquery($queryDelete,$connid);
			}
		}
	}
	function retrieveUserDetails($connid,$orderID)
	{
		$query = "SELECT * FROM duketip_registrationDetails WHERE orderID = '".$orderID."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$this->firstName = $row["firstName"];
			$this->lastName = $row["lastName"];
			$this->address = $row["address"];
			
		}
	}
	function validatePanRequest($connid)
	{
		$arrRet = array();
		$arrPan = array();
		$dob = $this->byear."-".$this->bmonth."-".$this->bday;
		$query_pan = "SELECT pan_number FROM student_master WHERE name = '".$this->fullName."' AND dob = '".$dob."' ";
		$dbquery_pan = new dbquery($query_pan,$connid);
		while($row_pan = $dbquery_pan->getrowarray())
		{
			$arrPan[] =  $row_pan["pan_number"];
		}
		if(is_array($arrPan) && count($arrPan) >0)
		{
			foreach($arrPan as $key => $value)
			{
				$query = "SELECT name,pan_number,schoolname,a.country FROM duketip_eligibleStudents a,schools b WHERE a.school_code = b.schoolno AND pan_number = '".$value."'";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$arrRet[$row["pan_number"]] = array("name"=>$row["name"],
													"pan_number"=>$row["pan_number"],
													"schoolname"=>$row["schoolname"],
													"country"=>$row["country"]
													);
				}
			}
			
		}
		return $arrRet;
	}
	function getSchoolDetailsByPanNumber($connid,$pan_number)
	{
		$arrRet = array();
		$query = "SELECT schoolname,city,schoolno FROM duketip_eligibleStudents a,schools b WHERE a.school_code = b.schoolno AND pan_number = '".$pan_number."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($dbquery->numrows() > 0)
		{
			$arrRet[0] = $row["schoolname"].", ".$row["city"]." (".$row["schoolno"].")";
			$arrRet[1] = $row["schoolno"];
		}
		return $arrRet;	
	}

	function getDukeTipExamCities(){
		$arr = array("Delhi","Mumbai","Kolkata","Bangalore","Chennai","Ahmedabad","Guwahati","Hyderabad", 'Lucknow', 'Pune','Indore');
		sort($arr);
		return $arr;
	}

	function updateDetailsByPanNumber($connid)
	{
		$dob = $this->byear."-".$this->bmonth."-".$this->bday;
		$query = "UPDATE duketip_registrationDetails SET ".
				"firstName = '".$this->firstName."',".
				"middleName = '".$this->middleName."',".
				"lastName = '".$this->lastName."',".
				"studentEmail = '".$this->studentEmail."',".
				"studentStdCode = '".$this->studentStdCode."',".
				"studentContactNo = '".$this->studentContactNo."',".
				"dob= '".$dob."',".
				"examCity1= '".$this->examCity1."',".
				"class= '".$this->class."',".				
				"parentRes = '".$this->parentRes."',".
				"parentStdCode = '".$this->parentStdCode."',".
				"parentCell = '".$this->parentCell."',".
				"parentEmail = '".$this->parentEmail."',".
				"motherCell	= '".$this->motherCell."',".
				"motherEmail = '".$this->motherEmail."',".
				"address = '".$this->address."',".
				"address2 = '".$this->address2."',".
				"city = '".$this->city."',".
				"stateCode = '".$this->state."',".
				"zipCode = '".$this->zipcode."',".
				"paymentMode = '".$this->paymentMode."',".
				"bankName = '".$this->bankName."',".
				"chequeNo = '".$this->chequeNo."',".					
				" modified_date = curdate(), modified_by = '".$_SESSION["username"]."' WHERE panNumber = '".$_GET["panNumber"]."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		echo "<div align='center'>PAN Number : ".$_GET["panNumber"]." is updated successfully</div>";
	}
	function retrieveDetailsByPan($connid)
	{
		$this->setgetvars();
		$query = "SELECT *,DAYOFMONTH(dob) as bday,MONTH(dob) as bmonth,YEAR(dob) as byear FROM duketip_registrationDetails WHERE panNumber = '".$this->panNumber."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->firstName = $row["firstName"];
		$this->lastName = $row["lastName"];
		$this->middleName = $row["middleName"];
		$this->studentEmail = $row["studentEmail"];
		$this->studentStdCode = $row["studentStdCode"];
		$this->studentContactNo = $row["studentContactNo"];
		$this->bday = $row["bday"];
		$this->bmonth = $row["bmonth"];
		$this->byear = $row["byear"];
		$this->examCity1 = $row["examCity1"];
		$this->class = $row["class"];
		$this->parentStdCode = $row["parentStdCode"];
		$this->parentRes = $row["parentRes"];
		$this->parentCell = $row["parentCell"];
		$this->parentEmail = $row["parentEmail"];
		$this->motherCell = $row["motherCell"];
		$this->motherEmail = $row["motherEmail"];
		$this->address = $row["address"];
		$this->address2 = $row["address2"];
		$this->city = $row["city"];
		$this->state = $row["stateCode"];
		$this->zipcode = $row["zipCode"];
		$this->paymentMode = $row["paymentMode"];
		$this->bankName = $row["bankName"];
		$this->chequeNo = $row["chequeNo"];		
	}
}
?>