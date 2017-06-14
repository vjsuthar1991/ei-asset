<?php

class clsorderstudents
{
	var $schoolCode;
	var $schoolName;
	var $year;
	var $product;
	var $class;
	var $section;
	var $action;
	var $studentID;
	var $StuClass;
	var $StuSection;
	var $StuFirstName;
	var $StuLastName;
	var $StuDob;
	var $StuRollNo;
	var $StuGender;
	var $StuPanNumber;
	var $StuChildEmail;
	var $StuParentName;
	var $StuAdditionalEmail;
	var $StuAddress;
	var $StuCountry;
	var $StuState;
	var $StuCity;
	var $StuPinCode;
	var $StuContactRec;
	var $StuContactMob;
	var $msg;
	var $error;
	var $pageName;
	var $clspaging;
	var $activecheckbox;
	var $bucket;
	var $total_active_paid;
	var $order_paid;
	var $available_paid;
	var $addOnStudents;
	var $daactivationdate;
	var $sub_order_id_set;
	var $deactivecheckbox;
	var $regularStudents;
	var $total_deactive_amount;
	var $ajax_set;
	var $type_set;
	var $current_password;
	var $new_password;
	var $retype_password;
	var $change_username;

	function clsorderstudents()
	{
		$this->class = "";
		$this->section = "";
		$this->schoolCode = "";
		$this->schoolName = "";
		$this->year = "";
		$this->product = "";
		$this->action = "";
		$this->studentID = "";
		$this->StuClass = "";
		$this->StuSection = "";
		$this->StuFirstName = "";
		$this->StuLastName = "";
		$this->StuDob = "";
		$this->StuRollNo = "";
		$this->StuGender = "";
		$this->StuPanNumber = "";
		$this->StuChildEmail = "";
		$this->StuParentName = "";
		$this->StuAdditionalEmail = "";
		$this->StuAddress = "";
		$this->StuCountry = "";
		$this->StuState = "";
		$this->StuCity = "";
		$this->StuPinCode = "";
		$this->StuContactRec = "";
		$this->StuContactMob = "";
		$this->msg = "";
		$this->error = "";
		$this->pageName = "";
		$this->clspaging = "";
		$this->activecheckbox = array();
		$this->bucket = 0;
		$this->total_active_paid = 0;
		$this->order_paid = 0;
		$this->available_paid = 0;
		$this->addOnStudents = array();
		$this->daactivationdate = "";
		$this->sub_order_id_set = 0;
		$this->deactivecheckbox = array();
		$this->regularStudents = array();
		$this->total_deactive_amount = 0;
		$this->ajax_set = "";
		$this->type_set = "";
		$this->current_password = "";
		$this->new_password = "";
		$this->retype_password = "";
		$this->change_username = "";
	}

	function setpostvars()
	{
		if (isset($_POST["schoolCode"])) $this->schoolCode = $_POST["schoolCode"];
		if (isset($_POST["schoolName"])) $this->schoolName = $_POST["schoolName"];
		if (isset($_POST["year"])) $this->year = $_POST["year"];
		if (isset($_POST["product"])) $this->product = $_POST["product"];
		if (isset($_POST["class"])) $this->class = $_POST["class"];
		if (isset($_POST["hdnaction"])) $this->action = $_POST["hdnaction"];
		if (isset($_REQUEST["section"])) $this->section = $_REQUEST["section"];
		if (isset($_POST["set_studentID"])) $this->studentID = $_POST["set_studentID"];
		if (isset($_POST["StuClass"])) $this->StuClass = $_POST["StuClass"];
		if (isset($_POST["StuSection"])) $this->StuSection = $_POST["StuSection"];
		if (isset($_POST["StuFirstName"])) $this->StuFirstName = $this->cleanString($_POST["StuFirstName"]);
		if (isset($_POST["StuLastName"])) $this->StuLastName = $this->cleanString($_POST["StuLastName"]);
		if (isset($_POST["StuDob"])) $this->StuDob = $_POST["StuDob"];
		if (isset($_POST["StuRollNo"])) $this->StuRollNo = $_POST["StuRollNo"];
		if (isset($_POST["StuGender"])) $this->StuGender = $_POST["StuGender"];
		if (isset($_POST["StuPanNumber"])) $this->StuPanNumber = $_POST["StuPanNumber"];
		if (isset($_POST["StuChildEmail"])) $this->StuChildEmail = $_POST["StuChildEmail"];
		if (isset($_POST["StuParentName"])) $this->StuParentName = $this->cleanString($_POST["StuParentName"]);
		if (isset($_POST["StuAdditionalEmail"])) $this->StuAdditionalEmail = $_POST["StuAdditionalEmail"];
		if (isset($_POST["StuAddress"])) $this->StuAddress = $_POST["StuAddress"];
		if (isset($_POST["StuCountry"])) $this->StuCountry = $_POST["StuCountry"];
		if (isset($_POST["StuState"])) $this->StuState = $_POST["StuState"];
		if (isset($_POST["StuCity"])) $this->StuCity = $_POST["StuCity"];
		if (isset($_POST["StuPinCode"])) $this->StuPinCode = $_POST["StuPinCode"];
		if (isset($_POST["StuContactRec"])) $this->StuContactRec = $_POST["StuContactRec"];
		if (isset($_POST["StuContactMob"])) $this->StuContactMob = $_POST["StuContactMob"];
		if (isset($_POST["activecheckbox"])) $this->activecheckbox = $_POST["activecheckbox"];
		if (isset($_POST["bucket"])) $this->bucket = $_POST["bucket"];
		if (isset($_POST["activation_date"])) $this->daactivationdate = $_POST["activation_date"];
		if (isset($_POST["deactivecheckbox"])) $this->deactivecheckbox = $_POST["deactivecheckbox"];
		if (isset($_POST["current_password"])) $this->current_password = $_POST["current_password"];
		if (isset($_POST["new_password"])) $this->new_password = $_POST["new_password"];
		if (isset($_POST["retype_password"])) $this->retype_password = $_POST["retype_password"];
		if (isset($_POST["change_username"])) $this->change_username = $_POST["change_username"];

		if (isset($_POST["message_set"])) $this->msg = $_POST["message_set"];
		if (isset($_POST["error_set"])) $this->error = $_POST["error_set"];
		if (isset($_POST["pageName"])) $this->pageName = $_POST["pageName"];
		if (isset($_POST["ajax_set"])) $this->ajax_set = $_POST["ajax_set"];
		if (isset($_POST["type_set"])) $this->type_set = $_POST["type_set"];
		//print_r($_POST);
	}

	function setgetvars()
	{
		if (isset($_GET["schoolCode"])) $this->schoolCode = $_GET["schoolCode"];
		if (isset($_GET["year"])) $this->year = $_GET["year"];
		if (isset($_GET["product"])) $this->product = $_GET["product"];
		if (isset($_GET["class"])) $this->class = $_GET["class"];
		if (isset($_GET["hdnaction"])) $this->action = $_GET["hdnaction"];
		if (isset($_GET["set_studentID"])) $this->studentID = $_GET["set_studentID"];
		if (isset($_GET["message_set"])) $this->msg = $_GET["message_set"];
		if (isset($_GET["error_set"])) $this->error = $_GET["error_set"];
		if (isset($_GET["pageName"])) $this->pageName = $_GET["pageName"];
	}

	function getActiveStudents($connid)
	{
		$this->setgetvars();
		$this->setpostvars();

		$arrRet = array();

		if ($this->action == "Go") {
			if ($this->product == "da") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();

				$arrRet = $this->getStudentsList($connid, "da", 1);
			} else if ($this->product == "mindspark") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();

				$arrRet = $this->getStudentsList($connid, "mindspark", 1);
			} else if ($this->product == "asset") {
				//$arrRet = $this->getAssetActiveStudents($connid);
			} else if ($this->product == "") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();
				$arrRet = $this->getStudentsForUpgradation($connid);
			}
		}
		return $arrRet;
	}

	function getDaActiveStudForm($connid)
	{
		include_once("../order_common/lib/order_common_functions.php");
		$arrMaster = array();
		$arrClassBreakup = getStudentBreakupOrder($this->schoolCode, $this->year);
		$arrClass = $this->getClassBreakups($arrClassBreakup, $connid, "da");

		$arrMain = array();
		$arRet = array();
		$condition = "";
		$sectionstr="";

		if ($this->schoolCode != "") {
			$condition .= " AND schoolCode = '$this->schoolCode'";
		}
		if ($this->class != "" && $this->class != "All") {
			$condition .= " AND class = '$this->class'";
		}
		if ($this->section != "" && $this->section != "All") {
			$condition .= " AND section = '$this->section'";
		}else if($this->section == "")
		{
			$sectionArr=$this->getSectionBreakup($this->schoolCode, $this->class, $connid, $this->year, "da");
			$sectionstr=implode("','",$sectionArr);
			$condition .= " AND section in ('$sectionstr')";
		}


		$query = "SELECT
                        *
                  FROM
                        common_user_details
                  WHERE
                        DA_enabled='0'
                  AND
                        DA_activationdate='0000-00-00'
                  AND
                        DA_deactivationdate='0000-00-00'
                  AND
                        category='STUDENT'
                  AND
                        subcategory = 'School'
                  $condition
                  ORDER BY
                        class,section";
		// echo $query;

		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			if (in_array($row["class"], $arrClass)) {
				$arrMain[] = $row;
			}
		}
		$this->clspaging->numofrecs = count($arrMain);

		if ($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}

		$arrLimit = array();
		$arrLimit1 = array();
		$arrLimit = explode("LIMIT ", $this->clspaging->limit);
		$arrLimit1 = explode(",", $arrLimit[1]);

		$lastLimit = 0;
		$lastLimit = $arrLimit1[0] + $arrLimit1[1];

		for ($i = $arrLimit1[0]; $i < $lastLimit; $i++) {
			if (isset($arrMain[$i])) {
				$arRet[] = $arrMain[$i];
			}
		}


		return $arRet;
	}

	function getDeactiveCount($connid, $product,$startDate,$endDate)
	{
		include_once("../order_common/lib/order_common_functions.php");
		$condition = "";
		if ($this->schoolCode != "") {
			$condition .= " AND schoolCode = '$this->schoolCode'";
		}
		if ($this->class != "" && $this->class != "All") {
			$condition .= " AND class = '$this->class'";
		}

		if ($product == "DA") {
			$enabled = "DA_enabled";
			$activationdate = "DA_activationdate";
			$Deactivationdate = "DA_deactivationdate";

		} else {
			$enabled = "MS_enabled";
			$activationdate = "MS_activationdate";
			$Deactivationdate = "MS_deactivationdate";

		}
		$query = "SELECT
                        count(id)
                  FROM
                        common_user_details
                  WHERE
                        $enabled='0'
                  AND
                        $activationdate!='0000-00-00'
                  AND
                        $Deactivationdate!='0000-00-00'
                  AND
                        ($activationdate!='0000-00-00' AND $activationdate>='$startDate' AND $activationdate<='$endDate')
                  
                  AND
                        category='STUDENT'
                  AND
                        subcategory = 'School'
                  $condition
                 ";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			return $row[0];
		}
		return 0;
	}

	function getactiveCount($connid, $product,$startDate,$endDate)
	{
		include_once("../order_common/lib/order_common_functions.php");
		$condition = "";
		if ($this->schoolCode != "") {
			$condition .= " AND schoolCode = '$this->schoolCode'";
		}
		if ($this->class != "" && $this->class != "All") {
			$condition .= " AND class = '$this->class'";
		}

		if ($product == "DA") {
			$enabled = "DA_enabled";
			$activationdate = "DA_activationdate";
			$Deactivationdate = "DA_deactivationdate";

		} else {
			$enabled = "MS_enabled";
			$activationdate = "MS_activationdate";
			$Deactivationdate = "MS_deactivationdate";

		}
		$query = "SELECT
                        count(id)
                  FROM
                        common_user_details
                  WHERE
                        $enabled='1'
                  AND
                        $activationdate!='0000-00-00'
                  AND
                        $Deactivationdate='0000-00-00'
                  AND
                        ($activationdate!='0000-00-00' AND $activationdate>='$startDate' AND $activationdate<='$endDate')
                  AND
                        category='STUDENT'
                  AND
                        subcategory = 'School'
                  $condition
                  ";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			return $row[0];
		}
		return 0;
	}

	function getTotalactiveCount($connid, $product,$startDate,$endDate)
	{
		include_once("../order_common/lib/order_common_functions.php");
		$condition = "";
		if ($this->schoolCode != "") {
			$condition .= " AND schoolCode = '$this->schoolCode'";
		}
		if ($this->class != "" && $this->class != "All") {
			$condition .= " AND class = '$this->class'";
		}
		if ($product == "DA") {
			$activationdate = "DA_activationdate";
			$deactivationdate = "DA_deactivationdate";

		} else {
			$activationdate = "MS_activationdate";
			$deactivationdate = "MS_deactivationdate";

		}
		$query = "SELECT
                        count(id)
                  FROM
                        common_user_details
                  WHERE
                        $activationdate!='0000-00-00'
                  AND
                        ($activationdate!='0000-00-00' AND $activationdate>='$startDate' AND $activationdate<='$endDate')
				  AND
						(($deactivationdate='0000-00-00') || (DATEDIFF($deactivationdate,$activationdate) > 7))
                  AND
                        category='STUDENT'
                  AND
                        subcategory = 'School'
                  $condition
                  ";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			return $row[0];
		}
		return 0;
	}

	function getMsActiveStudForm($connid)
	{
		include_once("../order_common/lib/order_common_functions.php");
		$arrMaster = array();
		$arrClassBreakup = getStudentBreakupOrder($this->schoolCode, $this->year);
		$arrClass = $this->getClassBreakups($arrClassBreakup, $connid, "mindspark");

		$arrMain = array();
		$arRet = array();
		$condition = "";

		if ($this->schoolCode != "") {
			$condition .= " AND schoolCode = '$this->schoolCode'";
		}
		if ($this->class != "" && $this->class != "All") {
			$condition .= " AND class = '$this->class'";
		}
		if ($this->section != "" && $this->section != "All") {
			$condition .= " AND section = '$this->section'";
		}else if($this->section == "")
		{
			$sectionArr=$this->getSectionBreakup($this->schoolCode, $this->class, $connid, $this->year, "mindspark");
			$sectionstr=implode("','",$sectionArr);
			$condition .= " AND section in ('$sectionstr')";
		}

		$query = "SELECT
                        *
                  FROM
                        common_user_details
                  WHERE
                        MS_enabled='0'
                  AND
                        MS_activationdate='0000-00-00'
                  AND
                        MS_deactivationdate='0000-00-00'
                  AND
                        category='STUDENT'
                  AND
                        subcategory = 'School'
                  $condition
                  ORDER BY
                        class,section";
     	
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			if (in_array($row["class"], $arrClass)) {
				$arrMain[] = $row;
			}
		}
		$this->clspaging->numofrecs = count($arrMain);

		if ($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}

		$arrLimit = array();
		$arrLimit1 = array();
		$arrLimit = explode("LIMIT ", $this->clspaging->limit);
		$arrLimit1 = explode(",", $arrLimit[1]);

		$lastLimit = 0;
		$lastLimit = $arrLimit1[0] + $arrLimit1[1];

		for ($i = $arrLimit1[0]; $i < $lastLimit; $i++) {
			if (isset($arrMain[$i])) {
				$arRet[] = $arrMain[$i];
			}
		}
		return $arRet;
	}

	function getDeactiveListStudents($connid)
	{
		$this->setgetvars();
		$this->setpostvars();

		$arrRet = array();

		if ($this->action == "Go") {
			if ($this->product == "da") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();

				$arrRet = $this->getStudentsList($connid, "da", 0);
			} else if ($this->product == "mindspark") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();

				$arrRet = $this->getStudentsList($connid, "mindspark", 0);
			}
		}

		return $arrRet;
	}
		
	function getStudentData($connid,$limit="")
	{
		$this->setgetvars();
		$this->setpostvars();
		if (isset($_SESSION["schoolCode"]) && $_SESSION["schoolCode"] != "" && $this->schoolCode == "") {
			$this->schoolCode = $_SESSION["schoolCode"];
		}
		if (isset($_SESSION["year"]) && $_SESSION["year"] != "" && $this->year == "") {
			$this->year = $_SESSION["year"];
		}
		if ($this->action == "Search") {
			$arrRet = $this->getAddEditStudentData($connid);
		} else if ($this->action == "Save") {
			$arrGetStudents = array();
			$arrGetStudents = $this->saveStudentData($connid);
			if(is_array($arrGetStudents)){
				if($this->error!=""){
					$this->error= "Student data is not added due to error.<br>".$this->error;
				}
				else if ($arrGetStudents["added"] != 0) {
					$this->msg .= "Data inserted successfully!";
				} else if ($arrGetStudents["updated"] != 0) {
					$this->msg .= "Data updated successfully!";
				}
			}else{
				if ($this->StuRollNo != "" && $this->StuRollNo != 0) 
					$rollNo = $this->checkRollNo($this->StuRollNo, $connid);
				else	
					$rollNo=""; 
					
					if($this->error==""){
						$line[0]['A']=$this->StuFirstName;
						$line[0]['B']=$this->StuLastName;
						$line[0]['C']=$this->StuClass;
						$line[0]['D']=$this->StuSection;
						$line[0]['E']=$rollNo;
						$line[0]['F']=$this->StuDob;
						$line[0]['G']=$this->StuGender;
                                                $line[0]['H']=$this->StuAdditionalEmail;
						
						$existingData[0]['newData']=$line[0];
						$existingData[0]['existingId']=$arrGetStudents;
						$existingData[0]['TotalAddedStudents']=0;
						$_SESSION['data']=$existingData;
						$this->msg="Location: /schoolSite/decideStudents.php";
						///header('Location: /schoolSite/decideStudents.php');
					}else{
						$this->error= "Student data is not added due to error<br>".$this->error;
					}
			}
		} else if ($this->action == "Upload Student") {
			$this->uploadStudents($connid);
		} else if ($this->action == "SearchDAActiveStudent") {
			$this->clspaging->setgetvars();
			$this->clspaging->setpostvars();
			
			//Added New Active Function
			$arrRet = $this->getDaActiveStudForm($connid);

		} else if ($this->action == "SearchMSActiveStudent") {
			$this->clspaging->setgetvars();
			$this->clspaging->setpostvars();
			
			//Added New Active Function
			$arrRet = $this->getMsActiveStudForm($connid);

		} else if ($this->action == "ActiveDAStudents") {
			$arrRet = $this->activeDAStudents($connid, $this->ajax_set);
		} else if ($this->action == "ActiveMSStudents") {
			$arrRet = $this->activeMSStudents($connid, $this->ajax_set);
		} else if ($this->action == "SearchDADeActiveStudent") {
			$this->clspaging->setgetvars();
			$this->clspaging->setpostvars();
			$arrRet = $this->getStudentsList($connid, "da", 1);
		} else if ($this->action == "SearchMSDeActiveStudent") {
			$this->clspaging->setgetvars();
			$this->clspaging->setpostvars();
			$arrRet = $this->getStudentsList($connid, "mindspark", 1);
		} else if ($this->action == "DeActiveDAStudents") {
			$arrRet = $this->DeactiveDAStudents($connid, $this->ajax_set);
		} else if ($this->action == "DeActiveMSStudents") {
			$arrRet = $this->DeactiveMSStudents($connid, $this->ajax_set);
		} else if ($this->action == "SearchUpgradationStudent") {
			$this->clspaging->setgetvars();
			$this->clspaging->setpostvars();
			$arrRet=$this->getStudentsForUpgradation($connid,$limit);
		}
		
		return $arrRet;
	}
	function getStudentsForUpgradation($connid,$limit="")
	{
		//Get Start Date & end date
		$arRet = array();
		$condition = "";

		if ($this->schoolCode != "") {
			$condition .= " AND ud.schoolCode = '$this->schoolCode'";
		}
		if ($this->class != "" && $this->class != "All" && $flagset == "") {
			$condition .= " AND ud.class = '$this->class'";
		}
		if ($this->section != "" && $this->section != "All" && $flagset == "") {
			$condition .= " AND ud.section = '$this->section'";
		}else if($this->section == "" && $this->product == "")
		{
			$condition .= " AND isnull(ud.section)";
		}
		if(isset($_REQUEST['is_updated']) && $_REQUEST['is_updated']=='1')
			$join="JOIN";
		else
			$join="LEFT JOIN";
		$query = "SELECT
                        ud.id,
						ud.Name,
						ud.first_name,
						ud.last_name,
						ud.username,
						ud.class,
						ud.section,
						ud.dob,
						ud.rollNo,
						ud.schoolCode,
						ud.gender,
						ud.additionalEmail,
						ud.category,
						ud.subcategory,
						uu.new_class,
						uu.new_section,
						uu.new_rollNo,
						uu.upgrade_info	
                  FROM
                        common_user_details ud
				  $join
				  		schoolsite_under_upgradation uu
				  on
				  		uu.student_id=ud.id 
                  WHERE
				  
                        ud.category='STUDENT'
                  AND
				        (ud.MS_enabled=1 || ud.DA_enabled=1)
			      AND
                        ud.subcategory = 'School' $condition
				  AND
				  		ud.class <= 10
                  ORDER BY
                        ud.class,ud.section,ud.Name";			
			if(!isset($_REQUEST['is_updated'])){
				if ($appendlimit != "No") {
					$this->clspaging->numofrecs = getQueryCount($query);

					if ($this->clspaging->numofrecs > 0) {
						$this->clspaging->getcurrpagevardb();
					}

					if ($limit != "limit") {
						$query .= $this->clspaging->limit;
					}
			    }
			}
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		return $arrRet;
		
	}
	
	function uploadStudents($connid)
	{
		include_once("../order_common/lib/order_common_functions.php");
		
		$inputFileName =$_FILES['data']['tmp_name'];
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);	
		$sheetNames= $objPHPExcel->getSheetNames();
		$sheetData=array();
		$valid=0;
		for($i=0;$i<count($sheetNames) && $valid!=1;$i++){
			if($sheetNames[$i]=="Sheet1"){
				$sheetData = $objPHPExcel->getSheet($i)->toArray(null,true,true,true);
				//Validate file
				$this->checkExistingExcel($sheetData, $connid);
				// if their is no error than upload It
				if ($this->error == "") {
						$this->uploadActualData($sheetData, $this->schoolCode, $connid);
				}
				$valid=1;
			}
		}
		
		if($valid==0)
		{
			echo '
				<div align="center" style="width:100%;min-height:460px">
					<div> 
						<font color="red" size="3">
							<b>Uploaded Excel sheet is tampered</br> 
							please verify the excel sheet format and upload file again.
							If you further face any problems, please contact customer support.</b>
						</font>
					</div><br/> 
					<div>Try again <a href="addStudentId.php" >Click Here</a></div>
				</div>';	
			exit;
		}
	}
	function uploadActualData($line, $schoolCode, $connid)
	{
		include_once("../order_common/lib/order_common_functions.php");
		// DOB OR ROLL NO OPTIONAL
		$is_dob_optional=0;
		$is_rollNo_optional=0;
		// Made DOB optional for (NOt DA Schools)
		if(!isset($_SESSION['schoolproduct']['da']))
		{
			$is_dob_optional=1;
			$is_rollNo_optional=1;
		}
			
		$arrGetStudents = array();
		$total_added = 0;
		$total_updated = 0;
		$num_row = count($line);
		$num_column = sizeof($line[1]);
		
		// Get school Detail
		$schoolArray = getSchoolDetails($schoolCode);
		
		// Existing users
		$existingData=array();
		$exCount=0;
		$error_msg="";
		for ($i = 2; $i <= $num_row; $i++) {
			$this->StuFirstName = $this->cleanString($line[$i]['A']);
			$this->StuLastName = $this->cleanString($line[$i]['B']);
			$this->StuClass = trim($line[$i]['C']);
			$this->StuSection = trim($line[$i]['D']);
			$this->StuRollNo = trim($line[$i]['E']);
			$this->StuDob = trim($line[$i]['F']);
			$this->StuGender = trim(strtoupper($line[$i]['G']));
			$this->schoolName=$schoolArray['schoolname'];
			$this->StuCountry=$schoolArray['country'];
			$this->StuCity=$schoolArray['city'];
			$this->StuState=$schoolArray['state'];

			// Neglate null record
			if(!($this->StuClass=="" && $this->StuSection=="" && $this->StuFirstName=="" 
				&& $this->StuLastName=="" && $this->StuDob=="" && $this->StuRollNo=="" 
				&& $this->StuGender=="")){
			
			$arrGetStudents = $this->saveStudentData($connid);
			if($this->error==""){
				if(is_array($arrGetStudents)){
					if ($arrGetStudents["added"] != 0) {
						$total_added = $total_added + 1;
					}
					if ($arrGetStudents["updated"] != 0) {
						$total_updated = $total_updated + 1;
					}
				}else{
					//Existing user
					if(substr($arrGetStudents,0,1)=="#")
					{
						$error_msg.=substr($arrGetStudents,1,strlen($arrGetStudents))." in line " . ($i) . "(skipped)<br>";
					}else{
						$existingData[$exCount]['newData']=$line[$i];
						$existingData[$exCount]['existingId']=$arrGetStudents;
						$exCount++;						
					}

				}
			}
		 }
		}
		if($error_msg!="")
			$this->error=$error_msg;
			
		if((($total_added + $total_updated) == 0) && $exCount==0 )
		{
			$this->msg .= "No Data Found!<br/>";
		}


		if ($total_added != 0 || $total_updated != 0) {
			$total_students = 0;
			$total_students = $total_updated + $total_added;
			if ($total_students != 0) {
				$schoolArray = array();
				$schoolArray = getSchoolDetails($schoolCode);
				$mailTo = array();
				$mailTo = getSenderMail("new_user_create", $schoolCode);
				//$subjectLine = "<i>new users created: ".$schoolCode." ".$schoolArray["schoolname"]."</i>";
				$subjectLine = "<i>EI new users created: " . $schoolCode . " " . $schoolArray["schoolname"] . "</i>";
				$message = "";
				$message .= "<table border=0 width=80%>";
				$message .= "<tr><td>";
				$message .= "<i>Dear Sir/Madam,</i><br/>";
				$message .= "<i>Greetings from Educational Initiatives!</i><br/><br/>";
				$message .= "<i>You have successfully created $total_students new student users for your school.
							You may now want to activate Mindspark and/or DA for these new students.
							You can do so by logging in to your account at <a href='http://www.educationalinitiatives.com/schoolSite'
							target='blank'>here</a>. 
							You will need sufficient balance in your account to activate new student IDs.</i><br/><br/>";
				$message .= "<i>Please let us know if you have any questions.</i><br/><br/>";
				$message .= "<i>Sincerely,</i><br/>";
				$message .= "<i>Customer Support</i><br/>";
				$message .= "<i>Educational Initiatives Pvt. Ltd</i><br/>";
				$message .= "<i>Tel: 079-66211687, 66211689</i>";
				$message .= "</td></tr>";
				$message .= "</table>";

				//sendMail($mailTo, $subjectLine, $message);
				logEmails($subjectLine,$schoolCode,$message,$mailTo['to'],$mailTo['cc']);
			}$this->msg .= "Data successfully added for $total_students students!<br/>";
		}
		if($exCount!=0)
		{
			$existingData[0]['TotalAddedStudents']=$total_added + $total_updated;
			$_SESSION['data']=$existingData;
			header('Location: /schoolSite/decideStudents.php'); 
		}
		
	}
	

function checkExistingExcel($line, $connid)
	{
		include_once("../order_common/lib/order_common_functions.php");
		
		// DOB OR ROLL NO OPTIONAL
		$is_dob_optional=0;
		$is_rollNo_optional=0;
		// Made DOB optional for (NOt DA Schools)
		if(!isset($_SESSION['schoolproduct']['da']))
		{
			$is_dob_optional=1;
			$is_rollNo_optional=1;
		}
		
		/*if (!is_array($line) || count($line) == 0) {
		$this->error .= "No Data Found!";
		return;
		}*/
		
		//Check for 
		if(isset($line[1]) && !($line[1]['C']=="Class" && $line[1]['D']=="Section" && $line[1]['A']=="First Name" && $line[1]['B']=="Last Name" && $line[1]['F']=="Dob(dd/mm/yyyy)" && $line[1]['E']=="Roll No" && $line[1]['G']=="* Gender(B/G)")){
			$this->error = '</br>Uploaded Excel sheet is tampered </br>'; 
			$this->error.= 'Please verify the excel sheet format and upload file again.';
			$this->error.= 'If you further face any problems, please contact customer support</br>';
			$this->error.= '<a href="studentinfo.xls"><img src="images/sample_format.png" width="200px"></a><br><br>';
			echo '<div align="center" style="min-height:460px"> 
						<font color="red" size="3">
							<b>'.$this->error.'</b>
						</font>
				 </div>';
			exit;
		}else{
			$uniqueClassSection = array();
			$uniqueRollNo = array();
			$orderBreakup = array();

			$arrClassBreakup = array();
			$arrClass = array();
			$this->schoolCode=$_SESSION['schoolCode'];
			$this->year=$_SESSION['year'];
			$arrClassBreakup = getStudentBreakupOrder($_SESSION['schoolCode'],$_SESSION['year']);
			$arrClass = $this->getClassBreakups($arrClassBreakup, $connid);

			if (isset($arrClass) && count($arrClass) > 0) {
				foreach ($arrClass as $keyClass => $valueClass) {
					$orderBreakup[] = $valueClass;

				}
			}
			
			//validsecation_data
			$classArr=array(); 

			$num_row = count($line);
			$num_column = sizeof($line[1]);
			for ($i = 2; $i <= $num_row; $i++) {
				$invalidClass=0;
				$invalidSection=0;
				$error = "";
				$first_name = trim($line[$i]['A']);
				$last_name = trim($line[$i]['B']);
				$class = trim($line[$i]['C']);
				$section = trim($line[$i]['D']);
				$rollNo = trim($line[$i]['E']);
				$dob = trim($line[$i]['F']);
				$gender = trim(strtoupper($line[$i]['G']));
			
			// Neglate null record
			if(!($class=="" && $section=="" && $first_name=="" && $last_name=="" && 
				$last_name=="" && $rollNo=="" && $gender=="")){
					
				if (!is_numeric($class) && $class != "") $error .= "Class should be numeric in line " . ($i) . "<br>";
				$section = strtoupper($section);
				if (!in_array($class, $uniqueClassSection) && ($class != "") && is_numeric($class)) {
					$uniqueClassSection[] = $class;
					if (!in_array($class, $orderBreakup)){
						$error .= "Your school has not subscribed to Mindspark/DA for the class " . $class . " mentioned in line " . ($i + 1) . ".<br> ";
						$invalidClass=1;
					}
				}
				
				// validate section
				if($invalidClass==0){
					///get valid section
					if(!isset($classArr[$class]))
					{
						$arrSection = $this->getSectionBreakup($_SESSION['schoolCode'],$class,$connid,$_SESSION['year']); 
						foreach($arrSection as $sectionKey =>$sectionVal)
						{
							if($sectionVal=="")
								$arrSection[$sectionKey]="No Section";
							
							// Capital to compare
							$arrSection[$sectionKey]=strtolower($sectionVal);
						}
						$classArr[$class]=implode(',',$arrSection);
					}
					// Validate
					$validSection=explode(',',$classArr[$class]);
					if(!(in_array(strtolower($section),$validSection))){
						$error.="Section is not valid in line ".$i."</br>";
						$invalidSection=1;
					}
					
				}

				if($invalidClass==0 && $invalidSection==0)
				{
					if (isset($uniqueRollNo[$class][$section])) {
						if (in_array($rollNo, $uniqueRollNo[$class][$section]) && $line[$i][0] != "") {
							$error .= $rollNo . " roll no is duplicate, line no:" . ($i) . " in excel sheet.<br>";
						} else {
							if ($rollNo != "") $uniqueRollNo[$class][$section][] = $rollNo;
						}
					} else {
						if ($rollNo != "") {
							$uniqueRollNo[$class][$section][] = $rollNo;
						}
					}
					$this->StuClass = $class;
					$this->StuSection = $section;

					if ($rollNo != "" && $rollNo != 0) {
						$rollNoSet = $this->checkRollNo($rollNo, $connid);
					}


					if ($class == "") $error .= " Class is missing in line " . ($i) . "<br>";
					if ($first_name == "") $error .= " First Name is missing in line " . ($i) . "<br>";
					//if ($last_name == "") $error .= " Last Name is missing in line " . ($i) . "<br>";
					if (($rollNo == "" || $rollNo == "0") && $is_rollNo_optional==0) $error .= " Roll No is missing in line " . ($i) . "<br>";

					if (!is_numeric($rollNo) && $rollNo != "" && $rollNo != "0") $error .= "Roll No should be numeric in line " . ($i) . "<br>";
					if (!is_numeric($pincode) && $pincode != "") $error .= "Pincode should be numeric in line " . ($i) . "<br>";
					if (!is_numeric($contact_rec) && $contact_rec != "") $error .= "Contact No(Rec) should be numeric in line " . ($i) . "<br>";
					if (!is_numeric($contact_mob) && $contact_mob != "") $error .= "Contact No(Mob) should be numeric in line " . ($i) . "<br>";

					// Check date formate
					if($dob!="")
					{
						$dateArr = explode('/',$dob);
						$pos = strpos($dob, '/');
						if(!$pos){
							$error .="Date of birth must be in dd/mm/yyyy format in line ".$i;						
						}else{
							if (!((checkdate($dateArr[1],$dateArr[0],$dateArr[2])) && intval($dateArr[0])<=31 && intval($dateArr[1])<=12  && strlen($dateArr[2])==4)) {
								//echo $dateArr[1]."=".$dateArr[0]."=".$dateArr[2];
							        $error .="Date of birth must be in dd/mm/yyyy format in line ".$i;
							}	
						}
					}
					if($dob=="" && $is_dob_optional==0)
						$error .="Date of birth is missing in line ".$i;
					if ($additional_email != "" && !filter_var($additional_email, FILTER_VALIDATE_EMAIL)) $error .= "Additional Email is not valid in line " . ($i) . "<br>";
					if($gender!="" && $gender!="B" && $gender!="G") $error.="Gender is not valid in line ".($i)." (allowed B/G only)";
				}
				if ($error != "") {
					$error .= "<br>";
					$this->error .= $error;
				}
			  }
			}
		}
		if ($this->error != "") {
			$this->error = "Student data is not uploaded due to error in Excel file.<br>Please correct the excel file and upload again.<br><br>".$this->error;
		}
	}
	function getAddEditStudentData($connid)
	{
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();

		// DA Start & End date
			$daStartDate = '0000-00-00';
			$daEndDate = '0000-00-00';

			$query_date_da = "	SELECT 
										start_date,
										end_date 
								FROM 
										da_orderMaster 
								WHERE 
										schoolCode = '$this->schoolCode' 
								AND 
										year='$this->year'";
										
			$dbquery_date_da = new dbquery($query_date_da, $connid);
			while ($row_date = $dbquery_date_da->getrowarray()) {
				$daStartDate = $row_date["start_date"];
				$daEndDate = $row_date["end_date"];
			}
		// MS Start & End date
			$msStartDate = '0000-00-00';
			$msEndDate = '0000-00-00';

			$query_date_ms = "	SELECT 
										start_date,
										end_date 
								FROM 
										ms_orderMaster 
								WHERE 
										schoolCode = '$this->schoolCode' 
								AND 
										year='$this->year'";
										
			$dbquery_date_ms = new dbquery($query_date_ms, $connid);
			while ($row_date = $dbquery_date_ms->getrowarray()) {
				$msStartDate = $row_date["start_date"];
				$msEndDate = $row_date["end_date"];
			}
		$condition = "";
		if ($this->class != "") $condition .= " AND a.class = '$this->class'";
		if ($this->section != "") $condition .= " AND a.section = '$this->section'";

		$arrRet = array();

		$query = "	SELECT 
							a.*,
							b.password as pwd 
					FROM 
							common_user_details a 
					LEFT JOIN 
							common_studentPassword b 
					ON 
							a.id = b.studentID 
					WHERE 
							a.schoolCode = '$this->schoolCode' 
					AND 
							a.category='STUDENT' 
					AND 
							a.subcategory='School' $condition 
					AND 
							MS_enabled!=3 
					AND 
							DA_enabled!=3 
					ORDER BY 
							a.class,a.section,a.rollNO,a.username";
		$this->clspaging->numofrecs = getQueryCount($query);

		if ($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}

		$query .= $this->clspaging->limit;

		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			###########For status of students#############
			
			if($row["DA_activationdate"]!="" && $row["DA_activationdate"]!="0000-00-00" && $row["DA_activationdate"]>date('Y-m-d')){	
				// Future Activation / Deactivation
				$row["DA_status"]= "Active from ".addOrdinalNumberSuffix(date('d',(strtotime($row["DA_activationdate"])))).' '.date('M Y',(strtotime($row["DA_activationdate"])));	
				if($row["DA_deactivationdate"] != "" && $row["DA_deactivationdate"] != "0000-00-00" &&$row["DA_deactivationdate"]>date('Y-m-d'))
					$row["DA_status"].= "<br>[Deactive from ".addOrdinalNumberSuffix(date('d',(strtotime($row["DA_deactivationdate"])))).' '.date('M Y',(strtotime($row["DA_deactivationdate"])))."]";
			}else{
				$row["DA_status"] = "N/A";
				if ($row["DA_enabled"] == 1 && $row["DA_activationdate"]!="0000-00-00" && $row["DA_activationdate"]>=$daStartDate && $row["DA_activationdate"]<=$daEndDate) {
					$row["DA_status"] = "Active";	
				} else {	
					if ($row["DA_deactivationdate"] != "" && $row["DA_deactivationdate"] != "0000-00-00" && $row["DA_deactivationdate"]>=$daStartDate && $row["DA_deactivationdate"]<=$daEndDate) {
						$row["DA_status"]="Deactive";
					}
				}
			}		
			
			if($row["MS_activationdate"]!="" && $row["MS_activationdate"]!="0000-00-00" && $row["MS_activationdate"]>date('Y-m-d')){	
				// Future Activation / Deactivation
				$row["MS_status"] = "Active from ".addOrdinalNumberSuffix(date('d',(strtotime($row["MS_activationdate"])))).' '.date('M Y',(strtotime($row["MS_activationdate"])));
				if($row["MS_deactivationdate"] != "" && $row["MS_deactivationdate"] != "0000-00-00" && $row["MS_deactivationdate"]>date('Y-m-d'))
					$row["MS_status"].= "</br>[Deactive from ".addOrdinalNumberSuffix(date('d',(strtotime($row["MS_deactivationdate"])))).' '.date('M Y',(strtotime($row["MS_deactivationdate"])))."]";	
			}
			else{
				$row["MS_status"] = "N/A";
				if ($row["MS_enabled"] == 1 && $row["MS_activationdate"]!="0000-00-00" && $row["MS_activationdate"] >=$msStartDate && $row["MS_activationdate"] <=$msEndDate) {
					$row["MS_status"] = "Active";
				} else {
					if ($row["MS_deactivationdate"] != "" && $row["MS_deactivationdate"] != "0000-00-00" && $row["MS_deactivationdate"] >=$msStartDate && $row["MS_deactivationdate"] <=$msEndDate) {
						$row["MS_status"] ="Deactive";
					}
				}
			}		
			###########For status of students#############
			$arrRet[] = $row;
		}
		return $arrRet;
	}
			
	function getClassBreakups($arrClassBreakup, $connid, $product = "")
	{
		$arrRet = array();

		if (isset($arrClassBreakup) && count($arrClassBreakup) > 0) {
			foreach ($arrClassBreakup as $keyClassBreakup => $valueClassBreakup) {
				if ($keyClassBreakup == "da" || $keyClassBreakup == "mindspark") {
					foreach ($valueClassBreakup as $keyClassBreakup1 => $valueClassBreakup1) {
						if ($keyClassBreakup1 != "total") {
							if ($product == "") {
								$arrRet[$keyClassBreakup1] = $keyClassBreakup1;
							} else {
								if ($product == $keyClassBreakup) {
									$arrRet[$keyClassBreakup1] = $keyClassBreakup1;
								}
							}
						}
					}
				}
			}
		}
		asort($arrRet);
		return $arrRet;
	}

	function getSectionBreakup($schoolCode, $class, $connid, $year, $product="")
	{
		$arrRet = array();

		if ($product == "") {
			$arrDARet = array();
			$arrMSRet = array();
			$arrDARet = $this->getDASectionData($schoolCode, $class, $year, $connid);
			$arrMSRet = $this->getMSSectionData($schoolCode, $class, $year, $connid);

			if (isset($arrDARet) && count($arrDARet) > 0) {
				foreach ($arrDARet as $keyDARet => $valueDARet) {
					$arrRet[$valueDARet] = $valueDARet;
				}
			}

			if (isset($arrMSRet) && count($arrMSRet) > 0) {
				foreach ($arrMSRet as $keyMSRet => $valueMSRet) {
					$arrRet[$valueMSRet] = $valueMSRet;
				}
			}
		} else if ($product == "da") {
			$arrRet = $this->getDASectionData($schoolCode, $class, $year, $connid);
		} else if ($product == "mindspark") {

			$arrRet = $this->getMSSectionData($schoolCode, $class, $year, $connid);
		}

		return $arrRet;
	}

	function getDASectionData($schoolCode, $class, $year, $connid)
	{
		$arrRet = array();
		$query = "	SELECT 
							DISTINCT section 
					FROM 
							da_orderMaster a,
							da_orderBreakup c 
					WHERE 
							a.order_id=c.order_id 
					AND 
							a.schoolCode='$schoolCode'  
					AND 
							c.class='$class' 
					AND 
							a.year='$year' 
					ORDER BY 
							c.section";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[$row["section"]] = $row["section"];
		}

		asort($arrRet);

		return $arrRet;
	}

	function getMSSectionData($schoolCode, $class, $year, $connid)
	{
		$arrRet = array();
		$query = "	SELECT 
							section 
					FROM 
							ms_orderMaster a,
							ms_studentBreakup c 
					WHERE 
							a.order_id = c.order_id 
					AND 
							a.schoolCode='$schoolCode' 
					AND 
							c.class='$class' 
					AND 
							a.year='$year'";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrSection = array();
			$arrSection = explode(",", $row["section"]);
		
			if (isset($arrSection) && count($arrSection) > 0) {
				foreach ($arrSection as $keySection => $valueSection) {
					$arrRet[$valueSection] = $valueSection;
				}
			}
		}
		asort($arrRet);
		return $arrRet;
	}

	function getAjaxStudentData($connid, $select, $tablename, $whereClause = "")
	{
		$arrRet = array();
		$query = "SELECT $select FROM $tablename WHERE 1=1 $whereClause";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		return $arrRet;
	}
	
	// To save decided students
	function saveDecidedUser($connid){
		unset($_SESSION['data']);
		$newData=$_REQUEST['newuser'];
		$sameData=$_REQUEST['sameuser'];
		foreach($newData as $key =>$value){
			$data=explode(',',$value);
			$condition = "";

			$Name = "";
			$username = "";
			$pwd = "";
			$rollNo = "";
			$fname=ucwords(strtolower($this->cleanString($data[0])));
			$lname=ucwords(strtolower($this->cleanString($data[1])));
			$Name = $fname . " " . $lname;

			$username = strtolower(str_replace(" ", "", $data[0]));
			if(trim($data[1])!="")
				$username .= "." . strtolower(str_replace(" ", "", $data[1]));
			
			$username = $this->checkUserNameExist($_SESSION['schoolCode'], $data[2], $username, $connid, 'desided');
			
			$pwd = $username;

			$condition .= "Name='".trim($Name)."',";
			$condition .= "first_name='".trim($fname)."',";
			$condition .= "last_name='".trim($lname)."',";
			$condition .= "username='$username',";
			$condition .= "DA_username='$username',";
			if($data[2]==1 || $data[2]==2)
				$condition .= "password='',";
			else	
				$condition .= "password=PASSWORD('" . $pwd . "'),";
			//$condition .= "DA_password='" . md5($pwd) . "',";
			
			$condition .= "class='$data[2]',";
			$condition .= "section='$data[3]',";
			if ($data[5] != "" && $data[5] != "0000-00-00") {
				$pos = strpos($data[5], '/');
				if($pos)
					$condition .= "dob='" . date('Y-m-d', strtotime(str_replace('/', '-', $data[5]))). "',";
				else
					$condition .= "dob='" . date('Y-m-d', strtotime($data[5])). "',";
			}
			$gender=$data[6]==""?" ":$data[6];
			
			$condition .= "rollNo='$data[4]',";
			$condition .= "schoolCode='$_SESSION[schoolCode]',";
			if(isset($data[6]) && $data[6]!="")
				$condition .= "gender='$data[6]',";
                        if(isset($data[7]) && $data[7]!="")
				$condition .= "additionalEmail='$data[7]',";
                        
                        $schoolArray = getSchoolDetails($_SESSION[schoolCode]);
                        
                        $condition .= "city='".$schoolArray['city']."',";
                        $condition .= "state='".$schoolArray['state']."',";
                        $condition .= "country='".$schoolArray['country']."',";
                        
			$condition .= "category='STUDENT',";
			$condition .= "subcategory='School',";

			$condition .= "created_dt=NOW(),";
			$condition .= "created_by='" . $_SESSION["username_school"] . "'";
			
			$query = "INSERT INTO common_user_details SET $condition";
			$dbquery = new dbquery($query, $connid);
	
		}
		return count($newData).'_'.count($sameData);
	}
	function saveStudentData($connid)
	{
		$arrRet = array();
		$total_added_students = 0;
		$total_updated_students = 0;

		$condition = "";

		$Name = "";
		$username = "";
		$pwd = "";
		$rollNo = "";
		$fname=ucwords(strtolower($this->cleanString($this->StuFirstName)));
		$lname=ucwords(strtolower($this->cleanString($this->StuLastName)));
		$Name = $fname. " " .$lname ;

		if (trim($this->studentID) == "") {
			$username = strtolower(str_replace(" ", "", $this->StuFirstName));
			if(trim($this->StuLastName)!="")
				$username .= "." . strtolower(str_replace(" ", "", $this->StuLastName));
			
			$username = $this->checkUserNameExist($this->schoolCode, $this->StuClass, $username, $connid);
		}
		// Neglate Existing Students
		$data=explode('_',$username);
		if(!isset($data[1])){
			$rollNo = $this->StuRollNo;

			if ($rollNo != "" && $rollNo != 0) {
				$rollNo = $this->checkRollNo($rollNo, $connid);
				if($this->error!=""){
					$temp_message='#'.$this->error;
					$this->error="";
					return $temp_message;
				}
			}

			$pwd = $username;
			$condition .= "Name='".trim($Name)."',";
			$condition .= "first_name='".trim($fname)."',";
			$condition .= "last_name='".trim($lname)."',";
				
			if ($this->studentID == "") {
				$condition .= "class='$this->StuClass',";
				$condition .= "schoolCode='$this->schoolCode',";
				$condition .= "schoolName='$this->schoolName',";
				$condition .= "username='$username',";
				$condition .= "DA_username='$username',";
				if($this->StuClass==1 || $this->StuClass==2)
					$condition .= "password='',";
				else	
					$condition .= "password=PASSWORD('" . $pwd . "'),";	
				//$condition .= "DA_password='" . md5($pwd) . "',";
			}

			
			$condition .= "section='$this->StuSection',";
			if ($this->StuDob != "" && $this->StuDob != "0000-00-00") {
				$pos = strpos($this->StuDob, '/');
				if($pos)
					$condition .= "dob='" .date('Y-m-d', strtotime(str_replace('/', '-', $this->StuDob))). "',";
				else	
					$condition .= "dob='" .date('Y-m-d', strtotime($this->StuDob)). "',";
			}
			$schoolArray = getSchoolDetails($this->schoolCode);
			$condition .= "rollNo='$rollNo',";
			$condition .= "gender='$this->StuGender',";
                        $condition .= "additionalEmail='$this->StuAdditionalEmail',";
                        $condition .= "category='STUDENT',";
                        $condition .= "subcategory='School',";
                        $condition .= "city='".$schoolArray['city']."',";
                        $condition .= "state='".$schoolArray['state']."',";
                        $condition .= "country='".$schoolArray['country']."',";
                        /*  $condition .= "pincode='$this->StuPinCode',";
                            $condition .= "contactno_res='$this->StuContactRec',";
                            $condition .= "contactno_cel='$this->StuContactMob',";
                            $condition .= "address='$this->StuAddress',";
                            $condition .= "pan_number='$this->StuPanNumber',";
                            $condition .= "childEmail='$this->StuChildEmail',";
                            $condition .= "parentName='$this->StuParentName',";
                         */


			if ($this->studentID != "" && $this->studentID != 0) {
				if($this->StuRollNo!=$rollNo){
					$this->error="Roll No: $rollNo exist for class: $this->StuClass";
						if($this->StuSection!="")
					 		$this->error .=" AND section: $this->StuSection";
				}
					
				$condition .= "updated_dt=NOW(),";
				$condition .= "updated_by='" . $_SESSION["username_school"] . "',";
			} else {
				$condition .= "created_dt=NOW(),";
				$condition .= "created_by='" . $_SESSION["username_school"] . "',";
			}

			$condition = substr_replace($condition, "", -1);
			if($this->error==""){
				if ($this->studentID != "" && $this->studentID != 0) {
					$query = "UPDATE common_user_details SET $condition WHERE id = '$this->studentID'";
					$dbquery = new dbquery($query, $connid);	
					$total_updated_students++;
					//$this->msg .= "Data Updated!<br/>";
				} else {
					$query = "INSERT INTO common_user_details SET $condition";
					$dbquery = new dbquery($query, $connid);
					$studentId = "";
					$studentId = $dbquery->insertid;

					$query_insert = "INSERT INTO common_studentPassword SET studentID = '$studentId',password='$pwd'";
					$dbquery_insert = new dbquery($query_insert, $connid);
					$total_added_students++;
					//$this->msg .= "Data Inserted successfully!<br/>";
				}
			}
			$arrRet["added"] = $total_added_students;
			$arrRet["updated"] = $total_updated_students;
			return $arrRet;
		}else{
				
			return $username;	
		}
	}

	function checkUserNameExist($schoolCode, $class, $username, $connid, $type="")
	{
		// Same school & class existing id
		$existingId=0;
		$max=0;
		$oldusername = "";
		$oldusername = $username;
		$arrRet = array();
		$checkQuery = "	SELECT 
								id,
								username,
								schoolCode,
								class,
								section,
								rollNo,
								dob 
						FROM 
								common_user_details 
						WHERE 
								username='$username'";
								
		$dbCheckquery = new dbquery($checkQuery, $connid);
		if($dbCheckquery->numrows() > 0){
			$query = "	SELECT 
								id,
								username,
								schoolCode,
								class,
								section,
								rollNo,
								dob 
						FROM 
								common_user_details 
						WHERE 
								username like '$username%'";
								
			$dbquery = new dbquery($query, $connid);
			while ($row = $dbquery->getrowarray()) {
				$no=intval(substr($row["username"],strlen($username)));
				if($no > $max)
					$max=$no;
					
				$arrRet[] = $row["username"];
				//Check for Existing same user
				if($schoolCode==$row['schoolCode'] && $class==$row['class'])
				{
					$existingId=$row['id'].'_'.$row['class'].'_'.$row['section'].'_'.$row['rollNo'].'_'.$row['dob'];
				}
			}
		}
		if(($existingId==0 || $type=='desided'))
		{
			if (count($arrRet) > 0) {
				$count = count($arrRet);
			
				if ($count != 0) {
						if($max > 9)
						{
							$seq = intval(substr($max,0,-1));
							$username = $username.($seq+1).rand(0,9);
						}
						else 
						{
							$username = $username.($max+1).rand(0,9);
						}
				
						$this->msg.= "Username: $oldusername already exists so converted to Username: $username!<br/>";
				}
			}
			return $username;
		}
		return $existingId;
	}

	function checkRollNo($rollNo, $connid)
	{
		$counter = 0;
		$oldrollNo = "";
		$oldSection="";

		if ($this->studentID != "" && $this->studentID != 0) {
			$query_rollno = "	SELECT 
										rollNo,
										section 
								FROM 
										common_user_details 
								WHERE 
										category='STUDENT' 
								AND 
										subcategory = 'School' 
								AND 
										id = '$this->studentID'";
			$dbquery_rollno = new dbquery($query_rollno, $connid);
			while ($row_rollno = $dbquery_rollno->getrowarray()) {
				$oldrollNo = $row_rollno["rollNo"];
				$oldSection=$row_rollno["section"];
			}
			if($oldSection==$this->StuSection){
				if ($oldrollNo == $rollNo) {
					return $rollNo;
				}
			}
		}

		$query = "	SELECT 
							count(id) as cnt 
					FROM 
							common_user_details 
					WHERE 
							category='STUDENT' 
					AND 
							subcategory = 'School' 
					AND 
							class = '$this->StuClass' 
					AND 
							section = '$this->StuSection' 
					AND 
							schoolCode = '$this->schoolCode' 
					AND 
							rollNo = '$rollNo' 
					AND 
							MS_enabled!=3 
					AND 
							DA_enabled!=3";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			if ($row["cnt"] > 0) {
				$counter = 1;
			}
		}

		if ($counter == 1) {
			if ($this->studentID == "" && $this->studentID == 0) {
				if ($oldrollNo != "" && $oldrollNo != 0) {
					return $oldrollNo;
				}	
			}

			//$this->error.="Roll No: $rollNo exist for class: $this->StuClass AND section: $this->StuSection so inserted record but leave roll no blank!<br/>";
			$this->error .= "Roll No: $rollNo exist for class: $this->StuClass AND section: $this->StuSection! </br>";

			$rollNo = "";
		}
		return $rollNo;
	}

	function DeactiveDAStudents($connid, $ajax_set_flag)
	{
		// Temporory for testing purpose.
		$deactivate_date=date("Y-m-d",strtotime($_REQUEST['deactivation_date']));
		//$deactivate_date="NOW()";
		
		$totalDeactived=0;
		include_once("../order_common/lib/order_common_functions.php");
		// Get Winthin 7 days deactivated students count
			$deActiveIds=implode(',',$this->deactivecheckbox);
			$query1="	SELECT 
								COUNT(id) as cnt,
								class,
								section 
						FROM 
								common_user_details 
						WHERE  
								category='STUDENT' 
						AND 
								subcategory='School' 
						AND 
								schoolCode=$_SESSION[schoolCode] 
						AND
								(DATEDIFF(CURDATE(),DA_activationdate) < 7) 
						AND 
								id IN ($deActiveIds)";
			$dbQuery1 = new dbquery($query1, $connid);
			$row = $dbQuery1->getrowarray();
			$neglateCount=isset($row['cnt'])?$row['cnt']:0;
			$class=isset($row['class'])?$row['class']:0;
		// echo "</br>Neglate ".$neglateCount;	
		
		// Get Current Quarter addons
			$OrderDetails = "	SELECT 
										order_id,
										start_date,
										end_date 
								FROM 
										da_orderMaster 
								WHERE 
										year=" .$_SESSION['year']. " 
								AND 
										schoolCode=".$_SESSION['schoolCode'];
			$OrderResult = mysql_query($OrderDetails);
			while ($data = mysql_fetch_array($OrderResult)) {
				$orderId=$data['order_id'];
				$start_date=$data['start_date'];
				$end_date=$data['end_date'];
			}
			$result=getCurrentQuarterDates('getDAInstallmentsForInvoicePurpose',$orderId,$start_date,$end_date);
			$criteria_start=$result['startDate'];
			$criteria_end=$result['endDate'];
		//	print_r($result);
		
		// Deactive Students
		if (isset($this->deactivecheckbox) && count($this->deactivecheckbox) > 0) {
			foreach ($this->deactivecheckbox as $key => $value) {
					if ($ajax_set_flag == "") {				
						// Update common_user_details
						$flag="";
						if(date("Y-m-d", strtotime($deactivate_date))==date('Y-m-d'))
							$flag="DA_enabled='0',";
							
							$query_common_user_details = "	UPDATE 
																	common_user_details 
															SET 
																	$flag 
																	DA_deactivationdate='$deactivate_date',
																	updated_dt=NOW(),
																	updated_by='" . $_SESSION["username_school"] . "' 
															WHERE 
																	id = '$value'";
							$dbquery_common_user_details = new dbquery($query_common_user_details, $connid);

						// For log
							$this->saveCommonUserDetailsLog($value, "DA-deactive", $connid);			
					}
					$totalDeactived++;
				}
				
				// Update Addons
				if($neglateCount > 0)
				{
					$query2="	UPDATE 
										common_user_details 
								SET 
										is_da_addon=0 
								WHERE 
										is_da_addon=1 
								AND
										category='STUDENT' 
								AND 
										subcategory='School' 
								AND  
										schoolCode=$_SESSION[schoolCode]
								AND
										class='$class' 
								AND 
										(DA_activationdate!='0000-00-00' AND 
										DA_activationdate >='".$criteria_start."' AND 
										DA_activationdate <='".$criteria_end."') 
								ORDER BY 
										DA_activationdate desc limit ".$neglateCount;
			
					$dbquery2 = new dbquery($query2, $connid);
					//echo "</br>".$query2;
				}
		}
 	// Email
	if ($totalDeactived != 0 && $ajax_set_flag == "") {
				$schoolArray = array();
				$schoolArray = getSchoolDetails($this->schoolCode);
				$mailTo = array();
				$mailTo = getSenderMail("new_deactive_user", $this->schoolCode, "da");
				$subjectLine = "<i>DA EI IDs deactivated: " . $schoolArray["schoolname"]. " " . $this->schoolCode  . "</i>";
				$message = "";
				$message .= "<table border=0 width=80%>";
				$message .= "<tr><td>";
				$message .= "<i>Dear Sir/Madam,</i><br/>";
				$message .= "<i>Greetings from Educational Initiatives!</i><br/><br/>";
				$message .= "<i>You have successfully deactivated DA for $totalDeactived students of your school. There won't be any more payments required towards these IDs beyond the current payment cycle. You can verify your account status by logging in to your account at <a href='http://www.educationalinitiatives.com/schoolSite' target='blank'>here</a>.</i><br/><br/>";
				$message .= "<i>Sincerely,</i><br/>";
				$message .= "<i>Customer Support</i><br/>";
				$message .= "<i>Educational Initiatives Pvt. Ltd</i><br/>";
				$message .= "<i>Tel: 079-66211687, 66211689</i>";
				$message .= "</td></tr>";
				$message .= "</table>";
				//sendMail($mailTo, $subjectLine, $message);
				logEmails($subjectLine,$this->schoolCode,$message,$mailTo['to'],$mailTo['cc']);
			}
			
		if ($ajax_set_flag == "") {
			$this->msg .= "<br/>Number of students deactivated: <u>" . $totalDeactived . "</u> <br/>";
		} else {
			$this->msg .= "<br/>Number of students you want to deactivate: <u>" . $totalDeactived . "</u> <br/>";
		}
	}

	function saveDAClassWiseBreakup($arrAddOnClassWiseBreakup, $sub_order_id_set, $connid)
	{
		foreach ($arrAddOnClassWiseBreakup as $keyAddOnClassWiseBreakup => $valueAddOnClassWiseBreakup) {
			foreach ($valueAddOnClassWiseBreakup as $key => $value) {
				$query = "	INSERT INTO 
									da_suborderBreakup 
							SET 
									sub_order_id ='$sub_order_id_set',
									class='$keyAddOnClassWiseBreakup',
									section='$key',
									e='" . $value["e"] . "',
									m='" . $value["m"] . "',
									s='" . $value["s"] . "',
									total_students='" . $value["total_students"] . "'";
									
				$dbquery = new dbquery($query, $connid);
			}
		}
	}

	function saveMSClassWiseBreakup($arrAddOnClassWiseBreakup, $sub_order_id_set, $connid)
	{
		$arrMaster = array();
		foreach ($arrAddOnClassWiseBreakup as $keyAddOnClassWiseBreakup => $valueAddOnClassWiseBreakup) {
			$arrSection = array();
			$total_student = 0;
			$section_str = "";
			foreach ($valueAddOnClassWiseBreakup as $key => $value) {
				$arrSection[$key] = $key;
				$total_student = $total_student + $value["total_students"];
			}
			if (isset($arrSection) && count($arrSection) > 0) {
				$section_str = implode(",", $arrSection);
			}
			$arrMaster[$keyAddOnClassWiseBreakup][$section_str] = $total_student;
		}

		foreach ($arrMaster as $keyMaster => $valueMaster) {
			foreach ($valueMaster as $keyMaster1 => $valueMaster1) {
				$query = "	INSERT INTO 
										ms_substudentBreakup 
							SET 
										sub_order_id ='$sub_order_id_set',
										class='$keyMaster',
										section='$keyMaster1',
										no_of_students='" . $valueMaster1 . "'";
										
				$dbquery = new dbquery($query, $connid);
			}

		}
	}

	function studentDAUpdate($arrGetStudentData, $sub_order_id, $order_id,$year,$schoolCode,$activationdate,$paid,$connid,$is_addon)
	{
		$arrGetStudentData = $arrGetStudentData[0];
		$studentMasterId = 0;
		if ($arrGetStudentData["DA_userID"] != 0 && $arrGetStudentData["DA_userID"] != "") {
			$studentMasterId = $arrGetStudentData["DA_userID"];
		} else {
			$maxIdQuery="SELECT MAX(studentID)+1 as id FROM da_studentMaster";
			$maxResult = mysql_query($maxIdQuery) or die(mysql_error());
			$data = mysql_fetch_array($maxResult);
			$studentMasterId = $data["id"];
		}
		$flag="";
		if(date("Y-m-d", strtotime($activationdate))==date('Y-m-d'))
			$flag=",DA_enabled='1'";
			
		$reset="";		
		
		if($arrGetStudentData["DA_password"]==""){
			$resetDAPassword=$this->generatePassword(6);
			$reset="DA_password=md5('".$resetDAPassword."'),";
			// Insert into da_studentPasswords
			$tempPassword="	INSERT INTO 
												da_studentPasswords(studentID,password) 
							values
												('".$studentMasterId."','".$resetDAPassword."')";
			$dbQuery_temp= new dbquery($tempPassword, $connid);
		}
		
		$query_comomn_user_details = "	UPDATE 
												common_user_details 
										SET 
												$reset
												temp_year='".$year."' ,
												DA_activationdate='" . date("Y-m-d", strtotime($activationdate)) . "',
												DA_userID='$studentMasterId' $flag ,
												is_da_addon='$is_addon',
												updated_dt=NOW(),
												updated_by='" . $_SESSION["username_school"] . "' 
										WHERE 
												id = '" . $arrGetStudentData["id"] . "'";
		$dbquery_comomn_user_details = new dbquery($query_comomn_user_details, $connid);
		$this->saveCommonUserDetailsLog($arrGetStudentData["id"], "DA-activate", $connid);		
		
	}

	function checkAvailableStudentPassword($studentMasterId, $connid)
	{
		$studentID = 0;
		$query = "SELECT studentID FROM da_studentPasswords WHERE studentID='$studentMasterId'";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$studentID = $row["studentID"];
		}
		return $studentID;

	}

	function getStudentDAMainData($id, $connid)
	{
		$arrRet = array();
		$query = "	SELECT 
							a.*,
							b.password as pwd 
					FROM 
							common_user_details a 
					LEFT JOIN 
							common_studentPassword b 
					ON 
							a.id=b.studentID 
					WHERE 
							a.id = '$id'";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		return $arrRet;
	}

	function getStudentDABreakup($connid, $select, $tablename, $whereClause = "")
	{
		$arrRet = array();
		$query = "SELECT $select FROM $tablename WHERE 1=1 $whereClause";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		return $arrRet;
	}

	function getStudentMSBreakup($connid, $select, $tablename, $whereClause = "")
	{
		$arrRet = array();
		$query = "SELECT $select FROM $tablename WHERE 1=1 $whereClause";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		return $arrRet;
	}

	function getClassWiseRate($connid, $select, $tablename, $whereClause = "")
	{

		$arrRet = array();
		$query = "SELECT $select FROM $tablename WHERE 1=1 $whereClause";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		return $arrRet;
	}

	function activeDAStudents($connid, $ajax_set_flag)
	{
		include_once("../order_common/lib/order_common_functions.php");

		$this->bucket = getBucketAmount($this->schoolCode, $this->year);
		$schoolArray[$this->schoolCode] = $this->schoolCode;

		// Get Data
		$order_id = getDAOrderId($this->schoolCode, $this->year);
		$class = $_REQUEST['class_str'];
		$minimum = $_REQUEST['minimum'];
		$totalActive = $_REQUEST['totalActive'];
		$ids = explode("#", $_REQUEST['activeSet']);
		$idCount = count($ids);

		//Get Classwise rate
		$arrClassWiseRate = $this->getClassWiseRate($connid, "*", "da_classWiseRate", " AND class=$class AND order_id= '$order_id'");
		$rate = $arrClassWiseRate[0]['rate'];

		// Get Tax & Vat
		$Tax = orderInfo($order_id, "DA");
		$tax = $Tax['st_percentage'];

		//School Agreed percentage
		$percentage = schoolAgreedPercentage($order_id, "da");

		$regular = 0;
		$leftregular = 0;
		$addon = 0;
		$amount_charged = 0;
		$leftregular = 0;
		$this->error = "";
		
		// Check if school have any previous Overdue than Stop activation
		$checkQuery="	SELECT 
								sum(amount_payable)-sum(paid) overdue,
								(sum(amount_payable)-sum(paid))/sum(amount_payable)*100
						FROM 
								installment_school_master 
						WHERE 
								order_id=$order_id
						AND 
								product='da'
						AND
								installment_date <= DATE_SUB(current_date,INTERVAL 15 day)";
		
		$checkResult=mysql_query($checkQuery);
		$checkArr=mysql_fetch_array($checkResult);
		$totalDue=0;
		if(!is_null($checkArr[0]) && $checkArr[0]!="")
		{
			$totalDue=$checkArr[0];		
			$totalDuePer=$checkArr[1];
		}
		// Change Message to overdue	
		if ($totalDue > 0 && $totalDuePer > 12) {
			$this->error .= "There is an overdue of Rs ".numberformat_indian($totalDue)." in DA offering, ";
			$this->error .= "hence IDs can not be activated. ";
			$this->error .= "Kindly make a payment immediately to activate students";
		} else {
			if (($totalActive + $idCount) <= $minimum) {

				$regular = $idCount;
				$amount_charged = 0;
				$leftregular = $minimum - ($totalActive + $idCount);
			} else {
				if ($totalActive <= $minimum)
				$addon = ($totalActive + $idCount) - $minimum;
				else
				$addon = $idCount;

				$regular = ($minimum - $totalActive) < 0 ? 0 : ($minimum - $totalActive);
				$amount_payable = $addon * $rate * ((25 + $tax) / 100);
				if ($amount_payable <= $this->bucket) {
					$amount_charged = $amount_payable;
				} else {
					$count = 0;
					$amount = 0;
					for ($i = 0; $i < $addon; $i++) {
						$amount += $rate;
						if ($amount <= $this->bucket)
						$count++;
					}
					//$this->error .= "You do not have sufficient balance in your account to activate new student IDs. Please make a payment immediately to activate new students. You will need to make minimum 25% payment to activate students. We recommend that you keep sufficient balance in your account to activate new student any time. Surplus amounts if any can be carried forward or refunded at the end of year<br/>";
					if ($regular > 0) {
						$this->error .= "<b>You can only active " . $regular . " Regular Students</b><br/>";
						$this->error .= "You have registered for ".$minimum." students in this class and ";
						$this->error .= "already activated ".$totalActive." students <br>";
					}
					if ($count > 0) {
						$this->error .= "<b>You can only active " . $count . " Addon Students</b><br/>";
					}
					if($regular > 0 || $count > 0){
						$this->error .= "If you want to change your registration count, please change class";
						$this->error .= "breakup from 'Update Registration' menu";
					}
					$addon = $count;
				}
			}
			if($this->error==""){
				$this->msg .= "<br/>Number of regular students activated: <u>$regular</u><br/>";
				$this->msg .= "Number of add-on students activated: <u>$addon</u><br/>";
				$this->msg .= "Total amount that charged from your account balance to activate these";
				$this->msg .= "IDs: Rs <u>$amount_charged</u><br/>";
				$this->msg .='~'.$order_id.'~'.$amount_charged.'~'.$addon.'~'.$regular.'~'.$leftregular;
			}
			//echo $order_id.'='.$amount_charged.'='.$addon.'='.$regular.'='.$leftregular;

		}
	}

	function activeStudent($connid,$order_id,$amount_charged,$activecheckbox,$year,$schoolCode,
							$activationdate,$addon,$regular,$leftregular){

		// Enabled Addon user First
		$count=0;
		$class=0;
		foreach ($activecheckbox as $key => $value) {
			 $arrGetStudentData = $this->getStudentDAMainData($value, $connid);
			 $class=$arrGetStudentData[0]['class'];
				if($count<$addon)
				{
					$this->studentDAUpdate($arrGetStudentData, 0, $order_id,$year,$schoolCode,
										  $activationdate,$amount_charged, $connid,"1");
						
				}
				else
				{
					$this->studentDAUpdate($arrGetStudentData, 0, $order_id,$year,$schoolCode,
										  $activationdate,$amount_charged, $connid,"0");
				}
			    $count++;
		}

		//Email Activated students

		$total_active_mail_students = 0;
		$total_active_mail_students =$addon + $regular;

		$leftregular=0;
		if ($total_active_mail_students != 0) {
			
			// When both type of students are activated
			if($addon > 0 && $regular >0)
			{
				$first=$regular." Registered students and ".$addon." addon students of your school. 
					   A minimum required sum of Rs ".numberformat_indian($amount_charged)." has been 
					   charged to your account for the new IDs created. As indicated at the time of activation, 
					   this is an irreversible charge. No additional payment is required from you at this stage, 
					   the money has been deducted from the advance you have already paid to us. 
					   You can verify your balance by logging in to your account at 
					   <a href='http://www.educationalinitiatives.com/schoolSite' target='blank'>here</a>. 
					   Your next invoice will include this amount.You may deactivate the IDs within 7days without 
					   any payment implication.";
			}else if($regular > 0)
			{
				$first=$regular." Registered students of your school. You have ".$leftregular." IDs 
						more for ".addOrdinalNumberSuffix($class)." class that you can create towards your original 
						order this year.You may deactivate the IDs within 7days without any payment implication.";
			}else if($addon > 0)
			{
				$first=$addon." addon students of your school. A minimum required sum of Rs ".numberformat_indian($amount_charged)." 
						has been charged to your account for the new IDs created. As indicated at the time of activation, 
						this is an irreversible charge. No additional payment is required from you at this stage, 
						the money has been deducted from the advance you have already paid to us. You can verify your balance 
						by logging in to your account at <a href='http://www.educationalinitiatives.com/schoolSite' target='blank'>
						here</a>. Your next invoice will include this amount.You may deactivate the IDs within 7days without any 
						payment implication.";
			}
			
			$schoolArray = array();
			$schoolArray = getSchoolDetails($schoolCode);
			$mailTo = array();
			$mailTo = getSenderMail("new_active_user", $schoolCode, "da");
			$subjectLine = "<i>DA EI IDs activated: " .$schoolArray["schoolname"]. "-" . $schoolCode . "</i>";
			$message = "";
			$message .= "<table border=0 width=80%>";
			$message .= "<tr><td>";
			$message .= "<i>Dear Sir/Madam,</i><br/>";
			$message .= "<i>Greetings from Educational Initiatives!</i><br/><br/>";
			$message .= "<i>You have successfully activated DA for ".$first."</i><br><br>";
			$message .= "<i>Please let us know if you have any questions.</i><br/><br/>";
			$message .= "<i>Sincerely,</i><br/>";
			$message .= "<i>Customer Support</i><br/>";
			$message .= "<i>Educational Initiatives Pvt. Ltd</i><br/>";
			$message .= "<i>Tel: 079-66211687, 66211689</i>";
			$message .= "</td></tr>";
			$message .= "</table>";
			
			/*echo "<pre>";
			print_r($mailTo);
			echo "</pre>";
		
			echo $subjectLine;
			echo $message;
			echo "<br/>";*/
			
			//sendMail($mailTo, $subjectLine, $message);
			logEmails($subjectLine,$schoolCode,$message,$mailTo['to'],$mailTo['cc']);
		}

	}

	function activeMSStudents($connid, $ajax_set_flag)
	{
		include_once("../order_common/lib/order_common_functions.php");

		$this->bucket = getBucketAmount($this->schoolCode, $this->year);
		$schoolArray[$this->schoolCode] = $this->schoolCode;

		// Get Data
		$order_id = getMSOrderId($this->schoolCode, $this->year);
		$class = $_REQUEST['class_str'];
		$minimum = $_REQUEST['minimum'];
		$totalActive = $_REQUEST['totalActive'];
		$ids = explode("#", $_REQUEST['activeSet']);
		$idCount = count($ids);

		//Get Classwise rate
		$arrClassWiseRate = $this->getClassWiseRate($connid, "*", "ms_classWiseRate", " AND class=$class AND order_id= '$order_id'");
		$ms_rate = isset($arrClassWiseRate[0]['ms_rate'])?$arrClassWiseRate[0]['ms_rate']:0;
		$rate = isset($arrClassWiseRate[0]['rate'])?$arrClassWiseRate[0]['rate']:0;
		$equipmentRate=$rate-$ms_rate;

		// Get Tax & Vat
		$Tax = orderInfo($order_id, "MS");
		$tax = isset($Tax['equipment_tax'])?$Tax['equipment_tax']:0;
		$vat = isset($Tax['VAT'])?$Tax['VAT']:0;
		$ms_tax=isset($Tax['ms_tax'])?$Tax['ms_tax']:0;
		$ms_vat=isset($Tax['MS_VAT'])?$Tax['MS_VAT']:0;

		//School Agreed percentage
		$percentage = schoolAgreedPercentage($order_id, "mindspark");
		$regular = 0;
		$leftregular = 0;
		$addon = 0;
		$amount_charged = 0;
		$leftregular = 0;
		$this->error = "";
		
		// Check if school have any previous Overdue than Stop activation
		$checkQuery="	SELECT 
								sum(amount_payable)-sum(paid) overdue,
								(sum(amount_payable)-sum(paid))/sum(amount_payable)*100 
						FROM 
								installment_school_master 
						WHERE 
								order_id=$order_id
						AND 
								product='mindspark'
						AND 
								installment_date <= DATE_SUB(current_date,INTERVAL 15 day)";
		
		$checkResult=mysql_query($checkQuery);
		$checkArr=mysql_fetch_array($checkResult);
		$totalDue=0;
		if(!is_null($checkArr[0]) && $checkArr[0]!="")
		{
			$totalDue=$checkArr[0];
			$totalDuePer=$checkArr[1];
		}
		// Change Message to overdue	
		if ($totalDue > 0 && $totalDuePer > 12) {
			$this->error .= "There is an overdue of Rs ".numberformat_indian($totalDue)." in Mindspark offering, ";
                        $this->error .= "hence IDs can not be activated. ";
                        $this->error .= "Kindly make a payment immediately to activate students";
		}else {
			if (($totalActive + $idCount) <= $minimum) {

				$regular = $idCount;
				$amount_charged = 0;
				$leftregular = $minimum - ($totalActive + $idCount);
			} else {

				$netpayableWithVat=0;
				$equipmentChargesWithVat=0;

				if ($totalActive <= $minimum)
				$addon = ($totalActive + $idCount) - $minimum;
				else
				$addon = $idCount;

				$regular = ($minimum - $totalActive) < 0 ? 0 : ($minimum - $totalActive);


				// First calculate Tax Then vat
				$netpayable=$addon * $ms_rate * 0.25;
				$netpayableWithTax=$netpayable+ ($netpayable *($ms_tax/100));
				$netpayableWithVat=$netpayableWithTax + ($netpayableWithTax *($ms_vat/100));

				// Check for Equipment
				if($equipmentRate> 0 )
				{
					$equipmentCharges = $addon * $equipmentRate * 0.25;
					$equipmentChargesWithTax=$equipmentCharges+($equipmentCharges * ($tax/100));
					$equipmentChargesWithVat=$equipmentChargesWithTax+($equipmentChargesWithTax * ($vat/100));
				}
				$amount_payable=$netpayableWithVat + $equipmentChargesWithVat;

				if ($amount_payable <= $this->bucket) {
					$amount_charged = $amount_payable;
				} else {
					$count = 0;
					$amount = 0;
					for ($i = 0; $i < $addon; $i++) {
						$amount += $rate;
						if ($amount <= $this->bucket)
						$count++;
					}
					//$this->error .= "You do not have sufficient balance in your account to activate new student IDs. Please make a payment immediately to activate new students. You will need to make minimum 25% payment to activate students. We recommend that you keep sufficient balance in your account to activate new student any time. Surplus amounts if any can be carried forward or refunded at the end of year<br/>";
					if ($regular > 0) {
						$this->error .= "<b>You can activate only " . $regular . " students</b><br/>";
						$this->error .= "You have registered for ".$minimum." students in this class and already ";
						$this->error .= "activated ".$totalActive." students <br>";
					}
					if ($count > 0) {
						$this->error .= "<b>You can activate only " . $count . " Addon Students</b><br/>";
					}
					if($regular > 0 || $count > 0){
						$this->error .= "If you want to change your registration count, please change class breakup ";
						$this->error .= "from 'Update Registration' menu";
					}
					$addon = $count;
				}
			}
			if($this->error==""){
				$this->msg .= "<br/>Number of regular students activated: <u>$regular</u><br/>";
				$this->msg .= "Number of add-on students activated: <u>$addon</u><br/>";
				$this->msg .= "Total amount that charged from your account balance to activate these IDs: ";
                                $this->msg .= "Rs <u>$amount_charged</u><br/>";
				$this->msg .='~'.$order_id.'~'.$amount_charged.'~'.$addon.'~'.$regular.'~'.$leftregular;
			}
			
		}

	}

	function activeMsstudent($connid,$order_id,$amount_charged,$activecheckbox,$year,$schoolCode,
							$activationdate,$addon,$regular,$leftregular){
		//Email Activated students

		// Enabled Addon users first
			$count=0;
			$class=0;
				foreach ($activecheckbox as $key => $value) {
					 $arrGetStudentData = $this->getStudentDAMainData($value, $connid);
					 $class=$arrGetStudentData[0]['class'];
					 if($count<$addon)
					 {
						$this->studentMSUpdate($arrGetStudentData, 0, $order_id,$year,$schoolCode,
											  $activationdate,$paid, $connid,"1");
						
					 }
					 else
					 {
						$this->studentMSUpdate($arrGetStudentData, 0, $order_id,$year,$schoolCode,
											  $activationdate,$paid, $connid,"0");
					 }
					 $count++;
				}
		$total_active_mail_students = 0;
		$leftregular=0;
		$total_active_mail_students = $addon + $regular;
		if ($total_active_mail_students != 0) {
			
			// When both type of students are activated
			if($addon > 0 && $regular >0)
			{
				$first=$regular." Registered students and ".$addon." addon students of your school. 
					   A minimum required sum of Rs ".numberformat_indian($amount_charged)." has been 
					   charged to your account for the new IDs created. As indicated at the time of 
					   activation, this is an irreversible charge. No additional payment is required 
					   from you at this stage, the money has been deducted from the advance you have 
					   already paid to us. You can verify your balance by logging in to your account 
					   at <a href='http://www.educationalinitiatives.com/schoolSite' target='blank'>here</a>. 
					   Your next invoice will include this amount. You may deactivate the IDs within 7days 
					   without any payment implication.";
			}else if($regular > 0)
			{
				$first=$regular." Registered students of your school. You have ".$leftregular." IDs 
					   more for ".addOrdinalNumberSuffix($class)." class that you can create towards your 
					   original order this year.You may deactivate the IDs within 7days without any payment implication.";
			}else if($addon > 0)
			{
				$first=$addon." addon students of your school. A minimum required sum of Rs ".numberformat_indian($amount_charged)."
					   has been charged to your account for the new IDs created. As indicated at the time of activation, 
					   this is an irreversible charge. No additional payment is required from you at this stage, 
					   the money has been deducted from the advance you have already paid to us. You can verify your 
					   balance by logging in to your account at <a href='http://www.educationalinitiatives.com/schoolSite' 
					   target='blank'>here</a>. Your next invoice will include this amount.You may deactivate the IDs 
					   within 7days without any payment implication.";
			}
			
			
			$schoolArray = array();
			$schoolArray = getSchoolDetails($schoolCode);
			$mailTo = array();
			$mailTo = getSenderMail("new_active_user", $schoolCode, "mindspark");
			$subjectLine = "<i>Mindspark EI IDs activated: " .$schoolArray["schoolname"]. "-" . $schoolCode . "</i>";
			$message = "";
			$message .= "<table border=0 width=80%>";
			$message .= "<tr><td>";
			$message .= "<i>Dear Sir/Madam,</i><br/>";
			$message .= "<i>Greetings from Educational Initiatives!</i><br/><br/>";
			$message .= "<i>You have successfully activated Mindspark for ".$first."</i><br><br>";
			$message .= "<i>Please let us know if you have any questions.</i><br/>";
			$message .= "<i>Sincerely,</i><br/>";
			$message .= "<i>Customer Support</i><br/>";
			$message .= "<i>Educational Initiatives Pvt. Ltd</i><br/>";
			$message .= "<i>Tel: 079-66211687, 66211689</i>";
			$message .= "</td></tr>";
			$message .= "</table>";
			/*echo "<pre>";
			print_r($mailTo);
			echo "</pre>";
		
			echo $subjectLine;
			echo $message;
			echo "<br/>";
			exit; */
			//sendMail($mailTo, $subjectLine, $message);
			logEmails($subjectLine,$schoolCode,$message,$mailTo['to'],$mailTo['cc']);
			
		}

	}

	function studentMSUpdate($arrGetStudentData, $sub_order_id, $order_id,$year,$schoolCode,
							$activationdate,$paid,$connid,$is_addon){
		$arrGetStudentData = $arrGetStudentData[0];
		$setMasterTableStr = "";
		$end_date_set = "";
		$order_query = "SELECT start_date,end_date FROM ms_orderMaster WHERE order_id = '$order_id'";
		$dbquery_order_query = new dbquery($order_query, $connid);
		while ($row_order_query = $dbquery_order_query->getrowarray()) {
			$end_date_set = $row_order_query["end_date"];
		}

		if ($arrGetStudentData["MS_userID"] == 0 || $arrGetStudentData["MS_userID"] == "") {
			$setMasterTableStr .= ",startDate=NOW()";		
			$setMasterTableStr .= ",type='N'";
		}else{
			$setMasterTableStr .= ",type='R'";
		}
		$setMasterTableStr .= ",registrationDate='" . date("Y-m-d", strtotime($activationdate)) . "'";
		$setMasterTableStr .= ",endDate='" . date("Y-m-d", strtotime($end_date_set)) . "'";
		
		$studentMasterId = 0;
		if ($arrGetStudentData["MS_userID"] != 0 && $arrGetStudentData["MS_userID"] != "") {
			$studentMasterId = $arrGetStudentData["MS_userID"];
		} else {
			$studentMasterId = $arrGetStudentData["id"];
		}
		$flag="";
		if(date("Y-m-d", strtotime($activationdate))==date('Y-m-d'))
			$flag=",MS_enabled='1'";
		$query_comomn_user_details = "	UPDATE 
												common_user_details 
										SET 
												MS_activationdate='" . date("Y-m-d",strtotime($activationdate)) . "',
												MS_userID='$studentMasterId' $flag ,
												is_ms_addon='$is_addon',
												updated_dt=NOW(),
												updated_by='" . $_SESSION["username_school"] . "'$setMasterTableStr 
										WHERE 
												id = '" . $arrGetStudentData["id"] . "'";
		$dbquery_comomn_user_details = new dbquery($query_comomn_user_details, $connid);
		$this->saveCommonUserDetailsLog($arrGetStudentData["id"], "MS-active", $connid);
	}

	function DeactiveMSStudents($connid, $ajax_set_flag)
	{
		include_once("../order_common/lib/order_common_functions.php");
		// Temporory for testing purpose.
		$deactivate_date=date("Y-m-d",strtotime($_REQUEST['deactivation_date']));
		//$deactivate_date="NOW()";
		$totalDeactived=0;
		
		// Get Winthin 7 days deactivated students count
			$deActiveIds=implode(',',$this->deactivecheckbox);
			$query1="	SELECT 
								COUNT(id) as cnt,
								class,
								section 
						FROM 
								common_user_details 
						WHERE  
								category='STUDENT' 
						AND 
								subcategory='School' 
						AND 
								schoolCode=$_SESSION[schoolCode] 
						AND
								(DATEDIFF(CURDATE(),MS_activationdate) < 7) 
						AND 
								id IN ($deActiveIds)";
			$dbQuery1 = new dbquery($query1, $connid);
			$row = $dbQuery1->getrowarray();
			$neglateCount=isset($row['cnt'])?$row['cnt']:0;
			$class=isset($row['class'])?$row['class']:0;
		
		// Get Current Quarter addons
			$OrderDetails = "	SELECT 
										order_id,
										start_date,
										end_date 
								FROM 
										ms_orderMaster 
								WHERE 
										year=" .$_SESSION['year']. " 
								AND 
										schoolCode=".$_SESSION['schoolCode'];
			$OrderResult = mysql_query($OrderDetails);
			while ($data = mysql_fetch_array($OrderResult)) {
				$orderId=$data['order_id'];
				$start_date=$data['start_date'];
				$end_date=$data['end_date'];
			}
			$result=getCurrentQuarterDates('getMSInstallmentsForInvoicePurpose',$orderId,$start_date,$end_date);
			$criteria_start=$result['startDate'];
			$criteria_end=$result['endDate'];
		// Deactive Students
		if (isset($this->deactivecheckbox) && count($this->deactivecheckbox) > 0) {
			foreach ($this->deactivecheckbox as $key => $value) {
				if ($ajax_set_flag == "") {
						$flag="";
						if(date("Y-m-d", strtotime($deactivate_date))==date('Y-m-d'))
							$flag="MS_enabled='0',";
							
					 //Update common User details
						$query_common_user_details = "	UPDATE 
																common_user_details 
														SET 
																$flag 
																MS_deactivationdate='$deactivate_date',
																updated_dt=NOW(),
																updated_by='" . $_SESSION["username_school"] . "' 
														WHERE 
																id = '$value'";
						$dbquery_common_user_details = new dbquery($query_common_user_details, $connid);
					 //FOr log
						$this->saveCommonUserDetailsLog($value, "MS-deactive", $connid);
					
				}
				$totalDeactived++;
			}
			
			// Update Addons
			if($neglateCount > 0){

				$query2="	UPDATE 
									common_user_details 
							SET 
									is_ms_addon=0 
							WHERE 
									is_ms_addon=1 
							AND
									category='STUDENT' 
							AND 
									subcategory='School' 
							AND  
									schoolCode=$_SESSION[schoolCode] 
							AND
									class='$class' 
							AND 
									(MS_activationdate!='0000-00-00' AND 
									MS_activationdate >='".$criteria_start."' AND 
									MS_activationdate <='".$criteria_end."') 
							ORDER BY 
									MS_activationdate desc limit ".$neglateCount;
				$dbquery2 = new dbquery($query2, $connid);
			}
		}
		//emails
		if ($totalDeactived != 0 && $ajax_set_flag == "") {
			$schoolArray = array();
			$schoolArray = getSchoolDetails($this->schoolCode);
			$mailTo = array();
			$mailTo = getSenderMail("new_deactive_user", $this->schoolCode, "mindspark");
			$subjectLine = "<i>Mindspark EI IDs deactivated: " . $schoolArray["schoolname"]. "-" .$this->schoolCode. "</i>";
			$message = "";
			$message .= "<table border=0 width=80%>";
			$message .= "<tr><td>";
			$message .= "<i>Dear Sir/Madam,</i><br/>";
			$message .= "<i>Greetings from Educational Initiatives!</i><br/><br/>";
			$message .= "<i>You have successfully deactivated Mindspark for $totalDeactived students of your school.There won't be any more payments required towards these IDs beyond the current payment cycle. You can verify your account status by logging in to your account at <a href='http://www.educationalinitiatives.com/schoolSite' target='blank'>here</a>.</i><br/><br/><br/>";
			$message .= "<i>Sincerely,</i><br/>";
			$message .= "<i>Customer Support</i><br/>";
			$message .= "<i>Educational Initiatives Pvt. Ltd</i><br/>";
			$message .= "<i>Tel: 079-66211687, 66211689</i>";
			$message .= "</td></tr>";
			$message .= "</table>";
			//sendMail($mailTo, $subjectLine, $message);
			logEmails($subjectLine,$this->schoolCode,$message,$mailTo['to'],$mailTo['cc']);
		}
			
		if ($ajax_set_flag == "") {
			$this->msg .= "<br/>Number of students deactivated: <u>" . $totalDeactived . "</u> <br/>";
		} else {
			$this->msg .= "<br/>Number of students you want to deactivate: <u>" . $totalDeactived . "</u> <br/>";
		}
	}

	function getDAMinimumCommitment($connid)
	{
		include_once("../order_common/lib/order_common_functions.php");

		$arrRet = array();
		$order_id = getDAOrderId($this->schoolCode, $this->year);
		$arrClassBreakupMaster = array();

		$arrOrderMaster = orderBreakup("*", "da_orderMaster", " AND order_id = '$order_id'", " ORDER BY order_id limit 1");
		$arrClassBreakup = $this->getStudentDABreakup($connid, "class,sum(total_students) as total_students", "da_orderBreakup", 
													  " AND class='$this->class'AND order_id = '$order_id' GROUP BY class");
		$arrClassBreakupMaster["minimum"] = 0;
		if (isset($arrClassBreakup) && count($arrClassBreakup) > 0) {
			$arrClassBreakupMaster[$arrClassBreakup[0]["total_students"]] = $arrClassBreakup[0]["total_students"];
			$arrClassBreakupMaster["minimum"] = $arrClassBreakup[0]["total_students"];
		}

		$classActive = $this->getactiveCount($connid, "DA",$arrOrderMaster[0]['start_date'],$arrOrderMaster[0]['end_date']);
		$arrClassBreakupMaster["active"] = isset($classActive) ? $classActive : 0;

		$classDeactive = $this->getDeactiveCount($connid, "DA",$arrOrderMaster[0]['start_date'],$arrOrderMaster[0]['end_date']);
		$arrClassBreakupMaster["deactive"] = isset($classDeactive) ? $classDeactive : 0;

		$classTotalActive = $this->getTotalActiveCount($connid, "DA",$arrOrderMaster[0]['start_date'],$arrOrderMaster[0]['end_date']);
		$totalActive = isset($classTotalActive) ? $classTotalActive : 0;
		$arrClassBreakupMaster["TotalActive"] = isset($totalActive) ? $totalActive : 0;

		$arrClassBreakupMaster["addon"] = $totalActive - $arrClassBreakupMaster["minimum"] > 0 ? $totalActive - $arrClassBreakupMaster["minimum"] : 0;
		$arrClassBreakupMaster["class"] = $this->class;
		return $arrClassBreakupMaster;
	}

	function getMSMinimumCommitment($connid)
	{
		include_once("../order_common/lib/order_common_functions.php");

		$arrRet = array();
		$order_id = getMSOrderId($this->schoolCode, $this->year);
		$arrClassBreakupMaster = array();

		$arrOrderMaster = orderBreakup("*", "ms_orderMaster", " AND order_id = '$order_id'", " ORDER BY order_id limit 1");
		$arrClassBreakup = $this->getStudentMSBreakup($connid, "class,sum(no_of_students) as no_of_students", "ms_studentBreakup", 
													" AND class='$this->class'AND order_id = '$order_id' GROUP BY class");
		$arrClassBreakupMaster["minimum"] = 0;
		if (isset($arrClassBreakup) && count($arrClassBreakup) > 0) {
			$arrClassBreakupMaster[$arrClassBreakup[0]["no_of_students"]] = $arrClassBreakup[0]["no_of_students"];
			$arrClassBreakupMaster["minimum"] = $arrClassBreakup[0]["no_of_students"];
		}

		$classActive = $this->getactiveCount($connid, "MS",$arrOrderMaster[0]['start_date'],$arrOrderMaster[0]['end_date']);
		$arrClassBreakupMaster["active"] = isset($classActive) ? $classActive : 0;

		$classDeactive = $this->getDeactiveCount($connid, "MS",$arrOrderMaster[0]['start_date'],$arrOrderMaster[0]['end_date']);
		$arrClassBreakupMaster["deactive"] = isset($classDeactive) ? $classDeactive : 0;

		$classTotalActive = $this->getTotalActiveCount($connid, "MS",$arrOrderMaster[0]['start_date'],$arrOrderMaster[0]['end_date']);
		$totalActive = isset($classTotalActive) ? $classTotalActive : 0;
		$arrClassBreakupMaster["TotalActive"] = isset($totalActive) ? $totalActive : 0;
		
		$arrClassBreakupMaster["addon"] = $totalActive - $arrClassBreakupMaster["minimum"] > 0 ? $totalActive - $arrClassBreakupMaster["minimum"] : 0;
		$arrClassBreakupMaster["class"] = $this->class;

		return $arrClassBreakupMaster;

	}

	//function for saving common user details - log - modified by kalpana
	function saveCommonUserDetailsLog($commonUserID, $action, $connid)
	{
		$set = "";
		$arrRet = array();
		$query="	SELECT 
							* 
					FROM 
							common_user_details 
					WHERE 
							category='STUDENT' 
					AND 
							subcategory = 'School' 
					AND 
							id = '$commonUserID'";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		$set .= "schoolCode='$_SESSION[schoolCode]',";
		$set .= "commonUserID='$commonUserID',";
		$set .= "action='$action',";
		$set .= "DA_userID='" . $arrRet[0]["DA_userID"] . "',";
		$set .= "MS_userID='" . $arrRet[0]["MS_userID"] . "',";
		$set .= "DA_enabled='" . $arrRet[0]["DA_enabled"] . "',";
		$set .= "MS_enabled='" . $arrRet[0]["MS_enabled"] . "',";
		$set .= "DA_activationdate='" . $arrRet[0]["DA_activationdate"] . "',";
		$set .= "MS_activationdate='" . $arrRet[0]["MS_activationdate"] . "',";
		$set .= "DA_deactivationdate='" . $arrRet[0]["DA_deactivationdate"] . "',";
		$set .= "MS_deactivationdate='" . $arrRet[0]["MS_deactivationdate"] . "',";
		$set .= "updated_dt=NOW(),";
		$set .= "updated_by='" . $_SESSION["username_school"] . "',";
		$set = substr_replace($set, "", -1);

		$query_insert_log = "INSERT into common_user_details_log SET $set";
		$dbquery_insert_log = new dbquery($query_insert_log, $connid);

	}

	function checktMindsparkOrderActive($schoolCode, $year, $connid)
	{
		$checkflag = 0;
		$current_date = date("Y-m-d");

		$query_check = "	SELECT 
									order_type, start_date, end_date 
							FROM 
									ms_orderMaster 
							WHERE 
									schoolCode = '$schoolCode' 
							AND 
									year='$year' 
							AND 
									stage='3'";
		$dbquery_check = new dbquery($query_check, $connid);
		while ($row_check = $dbquery_check->getrowarray()) {
			if (strtotime($current_date) >= strtotime($row_check["start_date"]) && strtotime($current_date) <= strtotime($row_check["end_date"])) {
				$checkflag = 1;
			}
			if($row_check["order_type"]=="pilot") {
				$checkflag = 1;
			}
		}

		return $checkflag;
	}

	function checktDAOrderActive($schoolCode, $year, $connid)
	{
		$checkflag = 0;
		$current_date = date("Y-m-d");

		$query_check = "	SELECT 
									count(*) as cnt 
							FROM 
									da_orderMaster 
							WHERE 
									schoolCode = '$schoolCode' 
							AND 
									year='$year' 
							AND 
									(start_date<='$current_date' AND end_date>='$current_date') 
							AND 
									stage='3'";
		$dbquery_check = new dbquery($query_check, $connid);
		while ($row_check = $dbquery_check->getrowarray()) {
			if ($row_check["cnt"] > 0) {
				$checkflag = 1;
			}
		}

		return $checkflag;
	}

	function getStudentsList($connid, $product, $active, $flagset = "", $limit = "", $appendlimit = "")
	{
		include_once("../order_common/lib/order_common_functions.php");	
		
		$condition = "";
		
		if ($this->schoolCode != "") {
			$condition .= " AND a.schoolCode = '$this->schoolCode'";
		}
		if ($this->class != "" && $this->class != "All" && $flagset == "") {
			$condition .= " AND a.class = '$this->class'";
		}
		if ($this->section != "" && $this->section != "All" && $flagset == "") {
			$condition .= " AND section = '$this->section'";
		}else if($this->section == "" && $this->class != "All")
		{
			$sectionArr=$this->getSectionBreakup($this->schoolCode, $this->class, $connid, $this->year, $product);
			$sectionstr=implode("','",$sectionArr);
			$condition .= " AND section in ('$sectionstr')";
		}
				
		if($product == "da")
			$orderTable = "da_orderMaster";
		else 
			$orderTable = "ms_orderMaster";
			
		$currentOrder = getCurrentOrder($this->schoolCode,$product,$this->year);
		
		if($currentOrder==1)
		{
			// Generic Variables against offering 
		    if ($product == "da") {
		        $activation = "DA_activationdate";
		        $deactivation = "DA_deactivationdate";
		        $enabled = "DA_enabled";
		        $userId = "DA_userID";
		        $exempt_unused = "exempt_unused_da";        
		    } else {
		        $activation = "MS_activationdate";
		        $deactivation = "MS_deactivationdate";        
		        $enabled = "MS_enabled";
		        $userId = "MS_userID";
		        $exempt_unused = "exempt_unused_ms";
		    }
		    $table = "common_user_details";		    
		}
		else 
		{
			$activation = "activation_date";
	        $deactivation = "deactivation_date";
	        $enabled = "enabled";
	        $userId = "userID";
	        $exempt_unused = "exempt_unused";
	        $table = "common_logs";
	        if($product=='da')
	        	$condition .= " AND year=$this->year AND offering='da' ";
	        else 
	        	$condition .= " AND year=$this->year AND offering='ms' ";
		}
		
		$startDate = '0000-00-00';
		$endDate = '0000-00-00';

		$query_date = "	SELECT 
								start_date,
								end_date 
						FROM 
								".$orderTable." 
						WHERE 
								schoolCode = '$this->schoolCode' 
						AND 
								year='$this->year'";
		$dbquery_date = new dbquery($query_date, $connid);
		while ($row_date = $dbquery_date->getrowarray()) {
			$startDate = $row_date["start_date"];
			$endDate = $row_date["end_date"];
		}
		
		$arrRet = array();
			
		$query = "SELECT
                        a.id,
                        Name,
						first_name,
						last_name,
						username,
						a.class,
						section,
						additionalEmail,
						rollNo,
						$activation activationdate,
						$deactivation deactivationdate,
						temp_year,".
						$userId." as userID
                  FROM
                        ".$table." a ";
		
		if($currentOrder==0)
	    {
			if($product=="da")
	    		$query .= ' LEFT JOIN common_user_details ON a.common_user_id=common_user_details.id ';
	    	else 
	    		$query .= ' LEFT JOIN common_user_details ON a.common_user_id=common_user_details.id ';    	
	    }
		    
		$query .= "WHERE
                        (".$activation."!='0000-00-00' AND ".$activation.">='$startDate' AND ".$activation."<='$endDate')";
		
		if($active==1)
		{
			$query .= " AND
							".$enabled."=1
						AND
							".$deactivation."='0000-00-00'";
		}
		
		if($active==0)
		{
			$query .= " AND 
							".$enabled."=0
						AND
							".$deactivation."!='0000-00-00'";
		}
		
		$query .= "AND
                        a.category='STUDENT'
                  AND
                        a.subcategory = 'School'
                  		$condition                  
                  ORDER BY
                        a.class,section,rollNo";
		
		if ($appendlimit != "No") {
			$this->clspaging->numofrecs = getQueryCount($query);

			if ($this->clspaging->numofrecs > 0) {
				$this->clspaging->getcurrpagevardb();
			}

			if ($limit != "limit") {
				$query .= $this->clspaging->limit;
			}
		}
		
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			$arrRet[] = $row;
		}
		
		return $arrRet;
	}
	
	########################For change password logic###################################
	function changePassword($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		
		if ($this->action == "changePassword") {
			$checkflag = 0;
			$userId=0;
			$oldPassword="";
			$query = "	SELECT 
								id,
								password 
						FROM 
								common_user_details 
						WHERE 
								username='$this->change_username' 
						AND 
								password=PASSWORD('" . $this->current_password . "')";
			$dbquery = new dbquery($query, $connid);
			while ($row = $dbquery->getrowarray()) {
				$checkflag = 1;
				$userId=$row['id'];
				$oldPassword=$row['password'];
			}
			if ($checkflag == 1) {
				$query_update = "	UPDATE 
											common_user_details 
									SET 
											password=PASSWORD('" . $this->new_password . "') 
									WHERE 
											username='$this->change_username'";
				$dbquery_update = new dbquery($query_update, $connid);
				if($this->new_password!=$_SESSION['schoolCode'])
					$_SESSION["default_password"]="0";
				else
					$_SESSION["default_password"]="1";
				// Password LOG
				$query_log = "INSERT INTO 	
											schoolsite_password_change_log
											(common_user_id,category,old_password,changed_by,timestamp) 
							  VALUES
											($userId,'SchoolsiteAdmin','" . $oldPassword . "','$_SESSION[username_school]',NOW())";
				$dbquery_log = new dbquery($query_log, $connid);
				$this->msg .= "Password changed successfully!<br/>";
			} else {
				$this->error .= "Your current password is not matching please enter correct password!<br/>";
			}
		}
	}

	########################For change password logic###################################

	########################Get Total Percentage Yet####################################
	function getTotalPercentageYet($order_id, $product, $connid)
	{
		include_once("../order_common/lib/order_common_functions.php");

		$total_percentage = 0;
		$current_date = date("Y-m-d");
		$arrInstallment = getInstallmentDataAvailable("*", "installment_master", "order_id = '$order_id' AND product = '$product'",
													 " ORDER BY installment_no");
		if (isset($arrInstallment) && count($arrInstallment) > 0) {
			foreach ($arrInstallment as $keyInstallment => $valueInstallment) {
				if (strtotime($this->daactivationdate) >= strtotime($valueInstallment["installment_date"])) {
					$total_percentage = $total_percentage + $valueInstallment["installment_percentage"];
				}
			}
		}

		return $total_percentage;
	}

	function getTotalSchoolPercentageYet($order_id, $product, $connid)
	{
		include_once("../order_common/lib/order_common_functions.php");

		$total_percentage = 0;
		$current_date = date("Y-m-d");
		$arrInstallment = getInstallmentDataAvailable("*", "installment_school_master",
													"order_id = '$order_id' AND product = '$product'", " ORDER BY installment_no");
		if (isset($arrInstallment) && count($arrInstallment) > 0) {
			foreach ($arrInstallment as $keyInstallment => $valueInstallment) {
				if (strtotime($this->daactivationdate) >= strtotime($valueInstallment["installment_date"])) {
					$total_percentage = $total_percentage + $valueInstallment["installment_percentage"];
				}
			}
		}

		return $total_percentage;
	}

	########################Get Total Percentage Yet####################################

	########################Get Total Paid Percenateg###################################
	function getPaidPercentage($order_id, $product, $connid)
	{
		include_once("../order_common/lib/order_common_functions.php");

		$total_percentage = 0;
		$current_date = date("Y-m-d");
		$storeKeyInstallment = "";
		$arrInstallment = getInstallmentDataAvailable("*", "installment_master", "order_id = '$order_id' AND product = '$product'", 
													  " ORDER BY installment_no");
		if (isset($arrInstallment) && count($arrInstallment) > 0) {
			foreach ($arrInstallment as $keyInstallment => $valueInstallment) {
				if (strtotime($this->daactivationdate) >= strtotime($valueInstallment["installment_date"])) {
					$storeKeyInstallment = $keyInstallment;
				} else {
					$total_percentage = $arrInstallment[$storeKeyInstallment]["installment_percentage"];
				}
			}
		}
		if ($total_percentage == 0) {
			if ($storeKeyInstallment != "") {
				$total_percentage = $arrInstallment[$storeKeyInstallment]["installment_percentage"];
			}
		}
		return $total_percentage;
	}

	########################Get Total Paid Percenateg###################################

	########################Fetching order breakups for da######################################
	function getDABreakupForDeactivation($order_id, $connid)
	{
		$arrRet = array();
		$query = "	SELECT 
							a.* 
					FROM 
							da_orderBreakup a,
							da_orderMaster b 
					WHERE 
							a.order_id = b.order_id 
					AND 
							b.order_id='$order_id' 
					ORDER BY 
							order_id";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			if (!isset($arrRet[$row["order_id"]])) {
				$arrRet[$row["order_id"]] = $row["total_students"];
			} else {
				$arrRet[$row["order_id"]] = $arrRet[$row["order_id"]] + $row["total_students"];
			}
		}

		return $arrRet;
	}
	function getMSBreakupForDeactivation($order_id, $connid)
	{
		$arrRet = array();
		$query = " SELECT 
							a.* 
					FROM 
							ms_studentBreakup a,
							ms_orderMaster b 
					WHERE 
							a.order_id = b.order_id 
					AND 
							b.order_id='$order_id' 
					ORDER BY 
							order_id";
		$dbquery = new dbquery($query, $connid);
		while ($row = $dbquery->getrowarray()) {
			if (!isset($arrRet[$row["order_id"]])) {
				$arrRet[$row["order_id"]] = $row["no_of_students"];
			} else {
				$arrRet[$row["order_id"]] = $arrRet[$row["order_id"]] + $row["no_of_students"];
			}
		}

		return $arrRet;
	}

	########################Fetching order breakups for da######################################
	
	function checkActivationdate($connid,$product,$year,$schoolCode,$activation_date,$type)
	{
		if($type=="deactive"){
			$var1="Deactivation";
			$var2="deactivate";
		}else{
			$var1="Activation";
			$var2="activate";
		}
		if($product=="mindspark")
			$table="ms_orderMaster";
		else
			$table="da_orderMaster";
		
		$orderInfo="SELECT
							*
					From
							$table 
					WHERE 
							schoolCode = '$schoolCode' 
					AND 
							year='$year'";
		$dbquery = new dbquery($orderInfo, $connid);
		$row = $dbquery->getrowarray() ;
		$orderId=$row['order_id'];
		$endDate=$row['end_date'];
		$query="SELECT
						*
				From 
						installment_master
				where
						product='".$product."'
				AND
						order_id=".$orderId."
				order by installment_date";
	   $dbquery = new dbquery($query, $connid);
	   $invoiceDate="0000-00-00";
	   $flag=0;
	   
	   while ($row = $dbquery->getrowarray()) {
			if((strtotime(date('Y-m-d')) < strtotime($row['installment_date'] )) && $flag==0)
			{
					$invoiceDate=$row['installment_date'];
					$flag=1;
			}
	   }
	   
	   // Temporary for last invoice date, it will be remove after adding end date istallment entery in installment_master
	   if($invoiceDate=="0000-00-00" && (strtotime($activation_date) <= strtotime($endDate)))
	   {
	   		$invoiceDate=$endDate;
	   }
	   //===============
	   $activation_date = date("Y-m-d", strtotime($activation_date));
	   if($invoiceDate!="0000-00-00" && (strtotime($activation_date) <= strtotime($invoiceDate)))
			echo 1;
	   else if(strtotime($activation_date) > strtotime($endDate))
	   		echo $var1." date can not be greater than end date!";
	   else
			echo "You can not ".$var2." for next quarter!";
	}
	function generatePassword($plength)
	{
	    $pwd="";
	    if(!is_numeric($plength) || $plength <= 0){
	                $plength = 8;
	    }
	    if($plength > 32){
	                $plength = 32;
	    }
	               
	    $chars = 'abcdefghijklmnopqrstuvwzyz0123456789';
	    mt_srand(microtime() * 1000000);
	                for($i = 0; $i < $plength; $i++){
	                $key = mt_rand(0,strlen($chars)-1);
	                $pwd = $pwd . $chars{$key};
	    }
	 
	    for($i = 0; $i < $plength; $i++){
	                    $key1 = mt_rand(0,strlen($pwd)-1);
	                    $key2 = mt_rand(0,strlen($pwd)-1);
	                    $tmp = $pwd{$key1};
	                    $pwd{$key1} = $pwd{$key2};
	                    $pwd{$key2} = $tmp;
	    }
	               
	                return $pwd;
	}
	
	/* 	For internal Login : It returns data for summary table for internal login of schoolSite as per user'S
							 accessible schools.
							 Return : Array -> valid user and displays Summary table
							 		  0 -> Invalid User
							  
	*/
		
	function getSchoolsForInternalLogin($connid)
	{
		include_once("../order_common/lib/order_common_functions.php");
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
		$searchCondition=" ";
				
		if(isset($_REQUEST['criteria_year']))
			$search_year=$_REQUEST['criteria_year'];
		else 
			$search_year=2015;
		
		$username=$_SESSION['username'];
		// For Alerts :When user click on alerts then overdueList flag is set and respective data return.
		$is_only_overdueList=(isset($_REQUEST['chkOverdue']) && $_REQUEST['chkOverdue']=="on")?1:0;
		
		// Preparing Summary Table Search string 
		if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']!="")
		{
			$searchCondition.="AND s.".$_REQUEST['criteria']." ".$_REQUEST['operator']." ";
			$keyword=$_REQUEST['keyword'];
			if($_REQUEST['operator']=="in"){
				$indata=$_REQUEST['keyword'];
				$indata=explode(',',$indata);
				$keyword="('".implode("','",$indata)."')";
			}
			elseif ($_REQUEST['operator']=="like")	{
				$keyword="'%".$_REQUEST['keyword']."%'";
			}	
			else{
				$keyword="'".$_REQUEST['keyword']."'";
			}
			$searchCondition.=$keyword;
		}
		
		/* Read Only rights for selected users
		   They all can access all schools as cs team with accounts deatils but in read only mode.
		*/
		$setAccessRights=array("bidhan","vishwa.talati","urvi.shah","ketan","vicky.idnani","renil.shah","sindhu.deshmukh","dipti.lal","harit","sudhir","dharti.thaker","sanatan","shaji.chacko","sridhar","rahul.venuraj","pranav.kothari","venkat","mihir.jhaveri");
		$setAdminRights = array("rahul","kalpana.dixit","dharmistha.pandya","jignasha.mistry","drupad");
		
		$categoryArr=array();
		$categoryArr=getCategoryRegion($username);
		$allowPayment="1";
		if($categoryArr['category']=="CS")
		{
			$allowPayment="0";
		}
		if(in_array($username,$setAccessRights) || in_array($username,$setAdminRights))
		{
			$categoryArr['category']="CS";
		}
		
		$query="";
		// Preapring Query as per user category.
		if($categoryArr['category']=="CS")
		{
			
			$query="SELECT
						   s.schoolname,s.region,s.city,s.schoolno,
						   (SELECT a.group_code FROM group_master a, group_mapping b WHERE a.group_code=b.group_code and year=$search_year and schoolCode=s.schoolno) AS group_code
					FROM 
						   common_user_details cud
					INNER JOIN 
						   schools s ON cud.schoolCode=s.schoolno
					WHERE
						   cud.category='ADMIN' 
					AND 
						   subcategory='SchoolsSite'$searchCondition  
					GROUP BY schoolno
					ORDER BY 
						s.schoolname";
							
		}elseif($categoryArr["category"]=="ZM" || $categoryArr["category"]=="SUMA")
		{
			$condition=getSchoolSelectionQuery($username,'schoolno,schoolname,city');
			$index=strpos($condition,'WHERE');
			$query="SELECT
						   s.schoolname,s.region,s.city,s.schoolno,
						   (SELECT a.group_code FROM group_master a, group_mapping b WHERE a.group_code=b.group_code and year=$search_year and schoolCode=s.schoolno) AS group_code 
					FROM 
						   common_user_details cud
					INNER JOIN 
						   schools s ON cud.schoolCode=s.schoolno
					".substr($condition,$index)." 
					AND
						   cud.category='ADMIN' 
					AND 
						   subcategory='SchoolsSite'$searchCondition  
					GROUP BY schoolno
					ORDER BY 
							s.schoolname";
							
		}elseif($categoryArr["category"]=="SRM" || $categoryArr["category"]=="RM" || $categoryArr["category"]=="SUM" || $categoryArr["category"]=="SUZM")
		{
			$condition=getSchoolSelectionQuery($username,'schoolno,schoolname,city');
			$index=strpos($condition,'WHERE');
			$query="SELECT
						   s.schoolname,s.region,s.city,s.schoolno,
						   (SELECT a.group_code FROM group_master a, group_mapping b WHERE a.group_code=b.group_code and year=$search_year and schoolCode=s.schoolno) AS group_code 
					FROM 
						   common_user_details cud
					INNER JOIN
							sales_allotment_master m ON m.schoolCode=cud.schoolCode
					INNER JOIN 
						   schools s ON cud.schoolCode=s.schoolno
					".substr($condition,$index)."
					AND
						   cud.category='ADMIN' 
					AND 
						   subcategory='SchoolsSite'$searchCondition
					GROUP BY schoolno  
					ORDER BY 
							s.schoolname";
		}
		
		if($query!="")	
		{
			$result=array();
			$count=0;
			$totalRecords=0;
			$groupArr=array();
			$records=1;
			/* Custom paging:
							Three varible mainted for that.
							minRecords : Neglate minRecords as per cuurent page
							maxRecords : From minRecords to how many max records user want to see.
							totalRecords : Total number of records	
			*/
			$minRecords=(($this->clspaging->numofrecsperpage * $this->clspaging->currentpage) - $this->clspaging->numofrecsperpage);
			$minRecords=$minRecords < 0 ?0:$minRecords;
			$maxRecords=$this->clspaging->numofrecsperpage;
			
			$dbquery = new dbquery($query, $connid);
			while ($data = $dbquery->getrowarray()) 
			{
				// initialize variable
				$asset_flag = 0;
				$ms_flag = 0;
				$da_flag=0; 
				$year=$search_year;	
				$schoolCode=$data['schoolno'];
				$offering=array();
										
				/* Check for Active orders for all offering as per passed / default year.
					if 
						asset_flag , da_flag , ms_flag  = 1 , then order placed
					else 
						Order is not placed 
				*/
				$asset_flag = checktASSETkOrderActive($schoolCode,$year," AND is_active=1");
				$da_flag = checktDAOrderActive($schoolCode,$year," AND is_active=1 ");
				$ms_flag = checktMindsparkOrderActive($schoolCode,$year," AND is_active=1");	
				if($asset_flag!=0)
					array_push($offering,"Asset");
				if($da_flag!=0)
					array_push($offering,"DA");
				if($ms_flag!=0)
					array_push($offering,"Mindspark");	
				
				// School must have any of one offering 
				if($asset_flag==1 || $da_flag==1 || $ms_flag==1)
				{
					/*
						Group School :
						Check if it's the same group school before executed then just skip current school 
						else excutes further.
					*/
					if(!in_array($data['group_code'],$groupArr))
					{	
						if($is_only_overdueList==0)
							$totalRecords++;
						// Get Group School DATA
						$schoolGroupArray=array();
						$schoolGroupArray = getCommonGroupSchools($schoolCode, $year);
						if($records > $minRecords)
						{
							if($is_only_overdueList==1 || $count<$maxRecords)
							{
								if($allowPayment=="1")	
								{
									$schoolDataArray=array();
									$overdue=0;
									$bucket=0;
									$totalSchoolPaid=0;	
									$PayableForTheYear=0;
									$PayableAsOfToday=0;
									$PayableAsOfAfter15Days=0;								
																		
									//Create School Array as per schoolGroupArray to use as parameter in another functions
									if (isset($schoolGroupArray) && count($schoolGroupArray) > 0) 
									{
										foreach ($schoolGroupArray as $keyGroupArray => $valueGroupArray) {
											$schoolDataArray[$valueGroupArray["schoolCode"]] = $valueGroupArray["schoolCode"];
										}
									}else {
											$schoolDataArray[$schoolCode] = $schoolCode;
									}																
									//Payable till today & for the year	
									
									global  $installmentDateArray;
									$installmentDateArray =  getQuarterInstallmentDates($year);
									
									$date = strtotime(date("Y-m-d"));
									$date = date('Y-m-d',strtotime('+15 days',$date));							
									
									foreach ($schoolDataArray as $key => $schoolno)
									{
										$asset_id = getOrderID($schoolno, $year, 'asset');
										$da_idArray = getOrderID($schoolno, $year, 'da');
										$da_id = $da_idArray[0];
										$ms_idArray = getOrderID($schoolno, $year, 'mindspark');
										$ms_id = $ms_idArray[0];
								
										$asAssetToday = 0;
										$asdaToday = 0 ;	
										$asMsToday = 0;
										
									    if($asset_id['Summer'] > 0 )
									    {
											$asAsset1[$schoolno] = getASSETAmountPayable($asset_id['Summer']);
										    $asAssetToday1 = getAmountPayablePIInstallment($asAsset1[$schoolno], $asset_id['Summer'], 0, "asset");
										    $asAssetAfter15Days1 = getAmountPayablePIInstallment($asAsset1[$schoolno], $asset_id['Summer'], 0, "asset", $date);
										    $PayableAsOfToday += $asAssetToday1;
										    $PayableAsOfAfter15Days += $asAssetAfter15Days1;
										    $PayableForTheYear += $asAsset1[$schoolno];
									    } 
									    if($asset_id['Winter'] > 0 )
									    {
											$asAsset2[$schoolno] = getASSETAmountPayable($asset_id['Winter']);
										    $asAssetToday2 = getAmountPayablePIInstallment($asAsset2[$schoolno], $asset_id['Winter'], 0, "asset");
										    $asAssetAfter15Days2 = getAmountPayablePIInstallment($asAsset2[$schoolno], $asset_id['Winter'], 0, "asset", $date); 
										    $PayableAsOfToday += $asAssetToday2;
										    $PayableAsOfAfter15Days += $asAssetAfter15Days2;
										    $PayableForTheYear += $asAsset2[$schoolno];
									    }   
									    if($da_id > 0)
									    {
									    	$asda[$schoolno] = getAmountPayableBasedOnActivation($schoolno, $da_id, 'da');
									    	$asdaToday = getAmountPayablePIInstallment($asda[$schoolno], $da_id, 0, "da");									    	
									    	$asdaAfter15Days = getAmountPayablePIInstallment($asda[$schoolno], $da_id, 0, "da",$date);
									    	$PayableAsOfToday += $asdaToday;
									    	$PayableAsOfAfter15Days += $asdaAfter15Days;
									    	$PayableForTheYear += $asda[$schoolno];
									    }
									    if($ms_id > 0 )
									    {
									    	$duration = getOrderDuration($ms_id);
									    	$asMs[$schoolno] = getAmountPayableBasedOnActivation($schoolno, $ms_id, 'mindspark', $duration);
									    	$asMsToday = getAmountPayablePIInstallment($asMs[$schoolno], $ms_id, 0, "mindspark");	
									    	$asMsAfter15Days = getAmountPayablePIInstallment($asMs[$schoolno], $ms_id, 0, "mindspark",$date);
									    	$PayableAsOfToday += $asMsToday;
									    	$PayableAsOfAfter15Days += $asMsAfter15Days;
									    	$PayableForTheYear += $asMs[$schoolno];
									    }							     
									}
									// Get total Paid
									$totalSchoolPaid= getTotalSchoolPaid($schoolDataArray,$year);								
									
									// Bucket & overdue
									$bucket1 = $totalSchoolPaid - $PayableAsOfToday;
									//$bucket = getBucketAmount_New($schoolCode,$year);
									// Overdue
									$overdue = $bucket1 < 0 ? abs($bucket1) : 0;
																		
									$bucket = $totalSchoolPaid - $PayableAsOfAfter15Days;
									
									$bucket = $bucket > 0 ? round($bucket) : 0;
								}
								if($is_only_overdueList==1 && $overdue > 100)
										$totalRecords++;
							}
							if($count<$maxRecords)
							{
								if(($is_only_overdueList==1 && $overdue > 100 ) || $is_only_overdueList==0)
								{
									
									if(empty($schoolGroupArray))
									{
										// For not a group school
										$result[$count][0]['schoolname']=$data['schoolname'];
										$result[$count][0]['schoolCode']=$data['schoolno'];
										$result[$count][0]['city']=$data['city'];
										$result[$count][0]['offering']=$offering;
										$result[$count][0]['region']=$data['region'];	
										if($allowPayment=="1")	{
											//Only for accounts allowed users
											$result[$count][0]['amountPayableForTheYear']=$PayableForTheYear;
											$result[$count][0]['amountPayableTillDate']=$PayableAsOfToday;
											$result[$count][0]['overdue']=$overdue;
											$result[$count][0]['bucket']=$bucket;
											$result[$count][0]['paid']=$totalSchoolPaid;
										}
									}else{
											/* For group school
											   1) Itrate all group school of current school
											   2) Check for order in passed or default year -> Yes then add it
											   3) Through this we can added all group school, No need to recaulculate  
												  Paid,Total payable as of today , overdue and bucket all are same for group school.
											   4) Add groupCode to groupArr to neglate for future execution of same group schools.  	
											*/
											foreach($schoolGroupArray as $key => $value)
											{
												// Offering
												$group_offering=array();
												$group_asset_flag = checktASSETkOrderActive($value['schoolno'],$year," AND is_active=1");
												$group_da_flag = checktDAOrderActive($value['schoolno'],$year," AND is_active=1 ");
												$group_ms_flag = checktMindsparkOrderActive($value['schoolno'],$year," AND is_active=1");	
												if($group_asset_flag!=0)
													array_push($group_offering,"Asset");
												if($group_da_flag!=0)
													array_push($group_offering,"Da");
												if($group_ms_flag!=0)
													array_push($group_offering,"Mindspark");
												if(count($group_offering)>0)
												{						
													$result[$count][$key]['schoolname']=$value['schoolname'];
													$result[$count][$key]['schoolCode']=$value['schoolno'];
													$result[$count][$key]['city']=$value['city'];
													$result[$count][$key]['offering']=$group_offering;
													$result[$count][$key]['region']=$value['region'];	
													if($allowPayment=="1")	{
														//Only for accounts allowed users
														$result[$count][$key]['amountPayableForTheYear']=$PayableForTheYear;
														$result[$count][$key]['amountPayableTillDate']=$PayableAsOfToday;
														$result[$count][$key]['overdue']=$overdue;
														$result[$count][$key]['paid']=$totalSchoolPaid;
														$result[$count][$key]['bucket']=$bucket;
													}
												}
											}
									}
									if(!empty($schoolGroupArray) && $data['group_code']!="")
									array_push($groupArr,$data['group_code']);
									$count++;
								}else{
									if(($is_only_overdueList==1 && $overdue <= 100 ) && (!empty($schoolGroupArray)) && $data['group_code']!="")
										array_push($groupArr,$data['group_code']);
								}	
						}else{
								if(!empty($schoolGroupArray) && $data['group_code']!="")
								array_push($groupArr,$data['group_code']);
							}
					}else{
						if(!empty($schoolGroupArray) && $data['group_code']!="")
						array_push($groupArr,$data['group_code']);
						$records++;
					}
				}
			 }
		}
						
			// Custom paging
			if ($appendlimit != "No") {
				$this->clspaging->numofrecs = $totalRecords;
				if ($this->clspaging->numofrecs > 0) {
					$this->clspaging->getcurrpagevardb();
				}
			}
			// Return parameter for accessing Accounts details 
			$result['is_allow_payment']=$allowPayment;
			return $result;
		}else{
			return "0";
		}
	 }
		 
	 // Save feedback [Feedback form]
	 function saveFeedBack($schoolCode,$rating,$feedback,$connid){
		$query="	INSERT INTO 
								schoolsite_feedback(schoolCode,rating,feedback,timestamp,feedback_by) 
					values($schoolCode,$rating,'$feedback',now(),'".$_SESSION['username_school']."')";
		$dbquery = new dbquery($query, $connid);
	 }
		 
	 // BULK STUDENT LIST UPDATE
	 
	 // Bulk Excel
	function bulkEditExcel($connid)
	{
		// Create phpExcel object of uploaded file
		$inputFileName =$_FILES['file']['tmp_name'];
		$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);	
		$sheetNames= $objPHPExcel->getSheetNames();
		$sheetData=array();
		$valid=0;
		
		// Validate Sheet
		for($i=0;$i<count($sheetNames) && $valid!=1;$i++){
			if($sheetNames[$i]=="BulkEdit"){
				//Check with sheet protection with same password
				$password=$objPHPExcel->getSheet($i)->getProtection()->getPassword();
				if($password!=null && $password=="F9BB"){
					$sheetData = $objPHPExcel->getSheet($i)->toArray(null,true,true,true);
					if($sheetData[1]['M']==$_SESSION['schoolCode'])
					{
						// Validate Student data against required fields by calling validatebulkStudents with 'validate' parameter.	
						$result=$this->validatebulkEditStudents($sheetData,"BulkExcel",$connid);
						
						// If data is correct than call validatebulkStudents with 'insert' parameter.
						if(is_array($result)){
								// Update Student 
								$nonEditableClassesStr = ''; 
								$nonEditableClasses = $this->SaveBulkEdit($result,$connid);	
								$nonEditableClassesStr = implode(",",$nonEditableClasses);
								if($nonEditableClassesStr == '')
								{
									echo '<br><div align="center" style="width:100%;min-height:460px"> 
											<font color="green" size="3">
												<b>Uploded successfully!</b>
											</font>
										  </div>';
								}
								else 
								{
									echo '<br><div align="center" style="width:100%;min-height:460px">										
												The information for <font color="red">classes '.$nonEditableClassesStr.' could not be updated</font> as 
												there are test(s) currently planned / active for these classes. Please try again later.										
										  </div>';
								}							
						}
						else{
							// Stop inserting data and prompts error message student and field specific.
							echo '<br><div align="center" style="width:100%;min-height:460px"> 
										<div>
											 <font color="red" size="3">
												<b>Student data is not updated due to error in excel file. Please correct the excel file and upload again.</b>
											 </font>
										</div><br/>
										<div> 
											<font color="red" size="3">
												<b>'.$result.'</b>
											</font>
										</div><br>
										<div>Try again <a href="addStudentId.php" >Click Here</a></div>
								   </div>';
						}
						$valid=1;
					}
				}
			}
		}
		// If none of the sheet is valid for bulk upgradation 
		if($valid==0)
		{
			echo '<br>
				<div align="center" style="width:100%;min-height:460px">
					<div> 
						<font color="red" size="3">
							<b>Uploaded Excel sheet is tampered</br> please verify the excel sheet format
							   and upload file again. If you further face any problems,
							   please contact customer support.</b>
						</font>
					</div><br/> 
					<div>Try again <a href="classUpgrade_bulk.php" >Click Here</a></div>
				</div>';	
		}
	 }

	function validatebulkEditStudents($sheetData,$validationType,$connid)
	{
		$message="";
		$studentArr=array();
		if($validationType=="BulkExcel")
		{
			$Data=array();
			$classArr=array();
			for($i=2;$i<=count($sheetData);$i++){
				// Student array
				$studentArr[$i-2]['id']=$sheetData[$i]['A'];
				$studentArr[$i-2]['class']=$sheetData[$i]['C'];
				$studentArr[$i-2]['section']=$this->cleanString($sheetData[$i]['D']);
				$studentArr[$i-2]['rollNo']=trim($sheetData[$i]['E']);
				$studentArr[$i-2]['first_name']=$this->cleanString($sheetData[$i]['F']);
				$studentArr[$i-2]['last_name']=$this->cleanString($sheetData[$i]['G']);
				$studentArr[$i-2]['gender']=strtoupper(trim($sheetData[$i]['H']));
				$studentArr[$i-2]['additionalEmail']=trim($sheetData[$i]['I']);
				$studentArr[$i-2]['isEditable']=trim($sheetData[$i]['J']);
				
				// Section
				if($studentArr[$i-2]['isEditable']==1){
					if($studentArr[$i-2]['section']==""){
						$message.="Please select section for line no ".$i."</br>";
					}else{
						// VALIDATE FOR STUDENT CLASS DEPENDENCY
						if(!isset($classArr[$sheetData[$i]['C']])){
							$arrSection = $this->getSectionBreakup($_SESSION['schoolCode'],$sheetData[$i]['C'],
																   $connid,$_SESSION['year']); 
							foreach($arrSection as $sectionKey =>$sectionVal)
							{
								if($sectionVal=="")
									$arrSection[$sectionKey]="NoSection";
							}
							$classArr[$sheetData[$i]['C']]=implode(',',$arrSection);	
						}
				
						// Validate
						$validSection=explode(',',$classArr[$sheetData[$i]['C']]);
						if(!(in_array($studentArr[$i-2]['section'],$validSection))){
							$message.="Section is not valid for line no ".$i."</br>";
						}
					}
				}
				
				$combination=trim($sheetData[$i]['C']).'_'.trim($sheetData[$i]['D']).'_'.trim($sheetData[$i]['E']);
				if(array_key_exists($combination,$Data)){
					$message.="Roll no ".$sheetData[$i]['E']." is Duplicate for class ".$sheetData[$i]['C']." section ".$sheetData[$i]['D']." at line no ".$i."</br>"; 
				}else{
					$Data[$combination]=$combination;	
				}
				
				if($studentArr[$i-2]['first_name']=="")
					$message.="First name can't be blank for line no ".$i."</br>";
				/*if($studentArr[$i-2]['last_name']=="")
					$message.="Last name can't be blank for line no ".$i."</br>";*/
				if($studentArr[$i-2]['isEditable']==1){
					if($studentArr[$i-2]['rollNo']==""){
						$message.="RollNo can't be be blank for line no ".$i."</br>";		
					}else{
						if(!is_numeric($studentArr[$i-2]['rollNo']))
							$message.="RollNo shoud be numeric for line no ".$i."</br>";		
					}
				}
				if($studentArr[$i-2]['gender']!="" && $studentArr[$i-2]['gender']!="B" && $studentArr[$i-2]['gender']!="G")	
					$message.="Gender is not valid for line no ".$i." (allowed only (B/G))</br>";	
				if($studentArr[$i-2]['additionalEmail']!="" && !filter_var($studentArr[$i-2]['additionalEmail'], FILTER_VALIDATE_EMAIL))
				  $message.="E-mail is not valid for line no ".$i."</br>";
			}
			if($message=="")
				return $studentArr;
			else
				return $message;
		}else if($validationType="ValidateRollNo"){
			// Validation for interface.
			$combinationArr=array();
			foreach($sheetData as $key => $valeStudent){
				$data_comb=$valeStudent['class']."_".$valeStudent['section']."_".$valeStudent['rollNo'];
				
				if(isset($combinationArr[$data_comb])){
					$combinationArr[$data_comb] .= "#".$valeStudent['SNo'];
				}else{
					$query="SELECT 
									count(id)
							FROM 
									common_user_details 
							WHERE 
									MS_enabled!=3 
							AND 
									DA_enabled!=3							
							AND
									class=".$valeStudent['class']." 
							AND 
									section='".$valeStudent['section']."' 
							AND 	
									rollNo=".$valeStudent['rollNo']."
							AND 	
									schoolCode=".$_REQUEST['schoolCode']."
							AND 
									id!=".$valeStudent['studentId'];
					$dbquery = new dbquery($query, $connid);
					$resultArr = $dbquery->getrowarray();
					$count=$resultArr[0];
					if($count > 0)
					{
						$valeStudent['section']=$valeStudent['section']==""?"'No section'":$valeStudent['section'];
						$message.="Roll no ".$valeStudent['rollNo']." is Duplicate for class ".$valeStudent['class']." and section ".$valeStudent['section']." for SNo ".$valeStudent['SNo']."</br>"; 
					}
					$combinationArr[$data_comb]=$valeStudent['SNo'];
				}
			}
			// Same Data error
			foreach($combinationArr as $key =>$valueError){
				$data=explode('#',$valueError);
				if(count($data) > 1)
				{
					$part="";
					for($i=0;$i<count($data);$i++){
						if($i==0)
							$part.=" SNo ".$data[$i];
						else	
							$part.=", SNo ".$data[$i];
					}
					
					$valeStudent['section']=$valeStudent['section']==""?"'No section'":$valeStudent['section'];
					$message.="Same RollNo can't allowed for".$part." for class ".$valeStudent['class']." and section ".$valeStudent['section']."<br>";
				}
			}
			if($message=="")
				return 1;
			else
				return $message;
		}
	 }
	 
	 function bulkEditThroughInterface($connid){
		$studentArr=array();
		for($i=0;$i<count($_REQUEST['studetId']);$i++){
			$studentArr[$i]['id']=$_REQUEST['studetId'][$i];
			$studentArr[$i]['first_name']=$this->cleanString($_REQUEST['fname'][$i]);
			$studentArr[$i]['last_name']=$this->cleanString($_REQUEST['lname'][$i]);
			$studentArr[$i]['section']=isset($_REQUEST['section'][$i]) ? trim($_REQUEST['section'][$i]) : "";
			$studentArr[$i]['rollNo']=isset($_REQUEST['rollNo'][$i]) ? trim($_REQUEST['rollNo'][$i]) : "";
			$studentArr[$i]['gender']=strtoupper(trim($_REQUEST['gender'][$i]));
			$studentArr[$i]['additionalEmail']=trim($_REQUEST['additional'][$i]);
			$studentArr[$i]['isEditable']=trim($_REQUEST['is_editable']);
		}
		//Save students
		$this->SaveBulkEdit($studentArr,$connid);
		echo '</br>
		<div align="center" style="width:100%;min-height:460px"> 
			<font color="green" size="3">
				<b>Students updated successfully!</b>
			</font>
		</div>';
		
	 }

	 function SaveBulkEdit($studentArr,$connid){
		$nonEditableClasses = array();
	 	for($i=0;$i<count($studentArr);$i++){
			$condition="";
			
			if(strtolower($this->cleanString($studentArr[$i]['section']))=="nosection")
				$studentArr[$i]['section']='';
				
			$classArr[0]=$studentArr[$i]['class'];
			$editArr=$this->isEditable($_SESSION['schoolCode'],$classArr,$_SESSION['year'],$connid);
            $is_editable=isset($editArr[$classArr[0]])? $editArr[$classArr[0]] : 1;
                
			if($is_editable==1){
				$condition="section='".$studentArr[$i]['section']."',rollNo=".$studentArr[$i]['rollNo'].",";	
			}else{ 
				array_push($nonEditableClasses,$classArr[0]);
			}
			$query="UPDATE
							common_user_details
					SET
							$condition
							first_name='".ucwords(strtolower($this->cleanString($studentArr[$i]['first_name'])))."',
							last_name='".ucwords(strtolower($this->cleanString($studentArr[$i]['last_name'])))."',
							name=concat(first_name, ' ', last_name),
							gender='".$studentArr[$i]['gender']."',
							additionalEmail='".$studentArr[$i]['additionalEmail']."'
					WHERE
							id=".$studentArr[$i]['id'];
			$dbquery = new dbquery($query, $connid);
		}
		return array_unique($nonEditableClasses);
	 }
	 
	 /*function isEditable($schoolCode,$year,$classArr,$connid){
		$editArr=array();
		$query="SELECT 
						DATE_ADD(test_date,INTERVAL 2 DAY) as test_date,drop_end_date,class 
				FROM
						da_testRequest
				WHERE
						schoolCode=$schoolCode
				AND 
						year=$year 
				AND
						class in (".implode(',', $classArr).")
				AND
						drop_end_date!='0000-00-00'
				ORDER BY drop_end_date DESC";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray()){
			if(date('Y-m-d') > $row['drop_end_date'] && date('Y-m-d') <=$row['test_date'] && $schoolCode!=153271)	
			{
				$editArr[$row['class']]=0;	
			}else{
				$editArr[$row['class']]=1;
			}
		}
		return $editArr;
	 }*/
	 
	 /**
	 * Function IsEditableClassData
	 * checks if the project is qualified as a newly created project. 
	 * @param schooCode  numeric, class numeric, year numeric, connid mysql connection
	 * @returns boolean
	 * @author Sudhir
	 **/
	function isEditable($schoolCode,$classArr,$year,$connid){
	    $editArr=array();
	    $ClassExamMode = array();
	    
	    $query = "SELECT submode FROM orderAdditionalDetails,da_orderMaster
	              WHERE orderAdditionalDetails.order_id = da_orderMaster.order_id
	              AND da_orderMaster.schoolCode = '".$schoolCode."' AND year = '".$year."'
	              AND product = 'da'";
	    $dbqry = new dbquery($query,$connid);
	    $result = $dbqry->getrowarray();
	    $submode_str = $result["submode"];
	    $submode_arr = explode(",",$submode_str);
	    foreach ($submode_arr as $key => $value){
	                    $tempArr = explode("#",$value);
	                    $ClassExamMode[$tempArr[0]] = $tempArr[1]; # Class as Key and Exammode as Value
	    }
	    foreach ($classArr as $key => $class)
	    {
		    # For IBT schools we need to check if any test is active for particular class
		    if ($ClassExamMode[$class] == "IBT") {
		                    
		        $examquery = "SELECT count(*) as total,da_testRequest.class as class from da_conductTestDetails
		                      LEFT JOIN da_examDetails ON da_conductTestDetails.exam_code = da_examDetails.exam_code
		                      LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
		                      WHERE da_testRequest.schoolCode = '".$schoolCode."' AND da_testRequest.year = '".$year."'
		                      AND da_testRequest.class='".$class."'
		                      AND da_conductTestDetails.status = 'active'";
		        $examdbqry = new dbquery($examquery,$connid);
		        while($examresult = $examdbqry->getrowarray())
		        {
		            $totalActiveExams = $examresult["total"];
		            if ($totalActiveExams == 0) {
		            	$editArr[$class]=1;	
		            }else{
		                $editArr[$class]=0;	
		            }
		        }
		                    
		    }else { // Rest of the exam modes logic will remain as it is as per the order system
		                    
		        $query="SELECT DATE_ADD(test_date,INTERVAL 2 DAY) as test_date,drop_end_date,class 
		                FROM da_testRequest WHERE schoolCode = '".$schoolCode."' AND year = '".$year."'
		                AND class='".$class."' AND drop_end_date!='0000-00-00'
		                ORDER BY drop_end_date DESC";
		        $dbquery = new dbquery($query, $connid);
		        while($row = $dbquery->getrowarray()){
		            if(date('Y-m-d') > $row['drop_end_date'] && date('Y-m-d') <=$row['test_date']) {
		            	$editArr[$class]=0;	
		            }else{
		                $editArr[$class]=1;	
		            }
		        }
		    }
	    }
		return $editArr;              
	}
	 
	 function cleanString($str){
		return trim(preg_replace('/[^A-Za-z0-9\-]/', '', $str));
	 }
	 
	function getCompleteStudentsList($connid, $product, $schoolCode, $order_id, $quarter=0, $active=1) 
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$arrRet = array();
		
		if ($this->action == "Go") {
			if ($this->product == "da") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();
				$arrRet = $this->getStudentsListDetails($connid, 'da', $schoolCode, $order_id, $quarter, $active);				
			} else if ($this->product == "mindspark") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();
				$arrRet = $this->getStudentsListDetails($connid, 'mindspark', $schoolCode, $order_id, $quarter, $active);				
			} 
		}

		return $arrRet;
	}
		
	function getStudentsListDetails($connid, $product, $schoolCode, $orderid, $quarter, $active)
	{
		include_once("../order_common/lib/order_common_functions.php");
		include_once("../order_common/lib/functions.php");

		$arRet = array();
		
		$year = getOrderYear($orderid,$product);
		
		$currentOrder = getCurrentOrder($schoolCode,$product,$year);

		if($currentOrder==1)
		{	
			// Generic Variables against offering 
		    if ($product == "da") {
		        $activation = "DA_activationdate";
		        $deactivation = "DA_deactivationdate";
		        $enabled = "DA_enabled";
		        $userId = "DA_userID";
		        $exempt_unused = "exempt_unused_da";         
		    } else {
		        $activation = "MS_activationdate";
		        $deactivation = "MS_deactivationdate";        
		        $enabled = "MS_enabled";
		        $userId = "MS_userID";
		        $exempt_unused = "exempt_unused_ms";
		    }
		    $table = "common_user_details";
	    	$condition = "";
		}
		else 
		{
			$activation = "activation_date";
	        $deactivation = "deactivation_date";
	        $enabled = "enabled";
	        $userId = "userID";
	        $exempt_unused = "exempt_unused";
	        $table = "common_logs";
	        if($product == "da")
	        	$condition = " AND year=$year AND offering='da' ";
	        else 
	        	$condition = " AND year=$year AND offering='ms' ";
	        
		}
	
		//For R - Class wise DA & MS Rates from SSF
		if($product=="da")
			$R = getDAClassWiseRate($orderid);
		
		if($product=="mindspark")
		{
			$duration = getOrderDuration($orderid);	
			$R = getMSClassWiseRate($orderid, $duration);
		}
	
	    if($quarter!=0)
	    {
			// Get current quarter dates
		    $result = getQuarterDates($product, $orderid, $quarter);
		    //print_r($result);
		    $quarter_start = $result['startDate'];
		    $quarter_end = $result['endDate'];
	    }
	    else 
	    {
			// Get current order dates
		    $result = orderInfo($orderid,$product);
		    //print_r($result);
		    $quarter_start = $result['start_date'];
		    $quarter_end = $result['end_date'];
	    }
	    
	    // Get current order end dates
	    $result = orderInfo($orderid,$product);
	    $orderEndDate = $result['end_date'];
	    $currentDate = date("Y-m-d");
	    if(strtotime($currentDate) < strtotime($orderEndDate))
			$orderEndDate = $currentDate;
			
	    if($active==1)
	    {    
		    $query = 'SELECT
						Name,first_name,last_name,username,a.class,section,'.$userId.',
						DATEDIFF(' . $deactivation . ',' . $activation . ') daysActiveForDeactiveStud,
						DATEDIFF("'.$orderEndDate.'",' . $activation . ') daysActiveForActiveStud,
						date_format('.$activation.',"%d-%m-%Y") '.$activation.',
						date_format('.$deactivation.',"%d-%m-%Y") '.$deactivation.',
						temp_year,'.$exempt_unused.'
				 FROM
						'.$table.' a';
		    
		    if($currentOrder==0)
		    {
				if($product == "da")
		    		$query .= ' LEFT JOIN common_user_details ON a.common_user_id=common_user_details.id ';
		    	else 
		    		$query .= ' LEFT JOIN common_user_details ON a.common_user_id=common_user_details.id ';
		    }
	    
		    $query .= ' WHERE
				 		'.$userId.' > 0
				 AND
				 		'.$enabled.' IN(0,1) 
				 AND	
						a.schoolCode=' . $schoolCode . '  
				 AND
						(' . $activation . '!="0000-00-00" AND ' . $activation . '>="' . $quarter_start . '"
							 AND ' . $activation . '<="' . $quarter_end . '")
				 AND
						a.category="STUDENT" 
				 AND
						a.subcategory="School"
				 '.$condition.'
				 ORDER BY
						a.class,section,Name';
		    //	AND
			//			((' . $deactivation . '="0000-00-00") || (DATEDIFF(' . $deactivation . ',' . $activation . ') > 7))
	    }
	    else
	    {
	    	$query = 'SELECT
						Name,first_name,last_name,username,a.class,section,'.$userId.',
						DATEDIFF(' . $deactivation . ',' . $activation . ') daysActiveForDeactiveStud,
						DATEDIFF("'.$orderEndDate.'",' . $activation . ') daysActiveForActiveStud,
						date_format('.$activation.',"%d-%m-%Y") '.$activation.',
						date_format('.$deactivation.',"%d-%m-%Y") '.$deactivation.',
						temp_year,'.$exempt_unused.'
				 FROM
						'.$table.' a';
	    	
	    	if($currentOrder==0)
		    {
				$query .= ' LEFT JOIN common_user_details ON a.common_user_id=common_user_details.id ';    	
		    }
	    	
		    $query .= ' WHERE
				 		'.$userId.' > 0
				 AND
				 		'.$enabled.' = 0 
				 AND	
						a.schoolCode=' . $schoolCode . '  
				 AND
					(' . $deactivation . '!="0000-00-00" AND ' . $deactivation . '>="' . $quarter_start . '"
						 AND ' . $deactivation . '<="' . $quarter_end . '")
				 AND
						a.category="STUDENT" 
				 AND
						a.subcategory="School"
				 '.$condition.'
				 ORDER BY
						a.class,section,Name';
		    // AND
			//			((' . $deactivation . '="0000-00-00") || (DATEDIFF(' . $deactivation . ',' . $activation . ') > 7))
	    }
			
		$this->clspaging->numofrecs = getQueryCount($query);

		if ($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}

		$query .= $this->clspaging->limit;
		
		//echo $query;
		
		$dbquery = new dbquery($query, $connid);
		$i=0;
		while ($row = $dbquery->getrowarray()) {
			$arRet[$i] = $row;
			$class = $row['class'];
			$arRet[$i]['activationdate']= $row[$activation];
			$arRet[$i]['deactivationdate']= $row[$deactivation];
			$activationDate = $row[$activation];
			$deactivationDate = $row[$deactivation];
			$noOfquarterUsed = getQuarterUsed($activationDate,$deactivationDate,$product,$orderid);
			$exempt = $row[$exempt_unused];
			if($exempt == 1)
				$arRet[$i]['amount'] = 0;
			else
			{
				$totalQuarter = totalQuarters($product,$orderid);
				$arRet[$i]['amount'] = ($R[$class]["rate"]+$R[$class]["equipment_rate"]) * ($noOfquarterUsed / $totalQuarter);	
			}
			if($activationDate!='00-00-0000' && $product=='mindspark')
			{
				if($deactivationDate=='00-00-0000')
				{
					$Date = date("d-m-Y");
					if(strtotime($Date) > strtotime(date("d-m-Y",strtotime($orderEndDate))))
						$Date = date("d-m-Y",strtotime($orderEndDate));
				}
				else 
					$Date = $deactivationDate;				
				$usageQuery = "SELECT SEC_TO_TIME(sum(time)) time FROM (
							SELECT SUM(timeSpent) time FROM educatio_adepts.adepts_homeSchoolUsage where userID=".$row[$userId]." AND startTime_int>=date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d')
							UNION SELECT SUM(timeSpent) time FROM educatio_adepts.adepts_homeSchoolUsage_archive where userID=".$row[$userId]." AND startTime_int>=date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d')) temp";
				$usageResult = mysql_query($usageQuery) or die($usageQuery."<br>".mysql_error());
				$usageLine = mysql_fetch_array($usageResult);
				$usageHours = $usageLine['time'];
				
				$lastLoginQuery = "SELECT startTime_int,if(date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') > startTime_int,'',date_format(startTime_int,'%d-%m-%Y')) date FROM educatio_adepts.adepts_sessionStatus where userid = ".$row[$userId]." AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d') UNION 
								   SELECT startTime_int,if(date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') > startTime_int,'',date_format(startTime_int,'%d-%m-%Y')) date FROM educatio_adepts.adepts_sessionStatus_archive where userid = ".$row[$userId]." AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d') 
								   ORDER BY startTime_int DESC LIMIT 1";
				$lastLoginResult = mysql_query($lastLoginQuery) or die($lastLoginQuery."<br>".mysql_error());
				$lastLoginLine = mysql_fetch_array($lastLoginResult);
				$lastLogin = $lastLoginLine['date'];
				
				if($usageHours=='')
					$usageHours = '00:00:00';
				if($lastLogin=='')
					$lastLogin = 'NA';
				
				if($deactivationDate=='00-00-0000')
					$arRet[$i]['usageDays'] = $row['daysActiveForActiveStud'];					
				else
					$arRet[$i]['usageDays'] = $row['daysActiveForDeactiveStud'];					
				
				$arRet[$i]['LastLogin'] = $lastLogin;
				$arRet[$i]['usageHours'] = $usageHours;
			}
			elseif($activationDate!='00-00-0000' && $product=='da')
			{ 
				if($deactivationDate=='00-00-0000')
				{
					 $Date = date("d-m-Y");
					 if(strtotime($Date) > strtotime(date("d-m-Y",strtotime($orderEndDate))))
						$Date = date("d-m-Y",strtotime($orderEndDate));
				}
				else 
					$Date = $deactivationDate;
				$usageQuery = "SELECT count(distinct da_tabletResponses.examcode) usage_count FROM da_tabletResponses 
							INNER JOIN da_examDetails ON da_tabletResponses.examcode = da_examDetails.exam_code 
							INNER JOIN da_testRequest ON da_testRequest.id = da_examDetails.request_id 
							WHERE da_testRequest.year = ".$year." AND da_tabletResponses.studentID=".$row[$userId]."
							AND da_tabletResponses.insert_date >= date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y-%m-%d') 
							AND da_tabletResponses.insert_date <= date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y-%m-%d')";
				$usageResult = mysql_query($usageQuery) or die($usageQuery."<br>".mysql_error());
				$usageLine = mysql_fetch_array($usageResult);
				$usageTests = $usageLine['usage_count'];
				
				if($usageTests=='')
					$usageTests = 0;
				
				if($deactivationDate=='00-00-0000')
					$arRet[$i]['usageDays'] = $row['daysActiveForActiveStud'];					
				else
					$arRet[$i]['usageDays'] = $row['daysActiveForDeactiveStud'];
				$arRet[$i]['LastLogin'] = '';
				$arRet[$i]['usageHours'] = '';
				$arRet[$i]['usageTests'] = $usageTests;
				
			}
			$i++;	
		}

		return $arRet;
	}


	/* ADDED BY KALPANA */

	function getCompleteStudentsListByIds($connid, $product, $schoolCode, $order_id, $quarter=0, $rate, $ids)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$arrRet = array();
		
		if ($this->action == "Go") {
			if ($this->product == "da") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();
				$arrRet = $this->getStudentsListDetailsByIds($connid, 'da', $schoolCode, $order_id, $quarter, $rate, $ids);				
			} else if ($this->product == "mindspark") {
				$this->clspaging->setgetvars();
				$this->clspaging->setpostvars();
				$arrRet = $this->getStudentsListDetailsByIds($connid, 'mindspark', $schoolCode, $order_id, $quarter, $rate, $ids);				
			} 
		}

		return $arrRet;
	}


	function getStudentsListDetailsByIds($connid, $product, $schoolCode, $orderid, $quarter, $rate, $ids)
	{
		include_once("../order_common/lib/order_common_functions.php");
		include_once("../order_common/lib/functions.php");

		$arRet = array();
		
		$year = getOrderYear($orderid,$product);
		
		$currentOrder = getCurrentOrder($schoolCode,$product,$year);

		if($currentOrder==1)
		{	
			// Generic Variables against offering 
		    if ($product == "da") {
		        $activation = "DA_activationdate";
		        $deactivation = "DA_deactivationdate";
		        $enabled = "DA_enabled";
		        $userId = "DA_userID";
		        $exempt_unused = "exempt_unused_da";         
		    } else {
		        $activation = "MS_activationdate";
		        $deactivation = "MS_deactivationdate";        
		        $enabled = "MS_enabled";
		        $userId = "MS_userID";
		        $exempt_unused = "exempt_unused_ms";
		    }
		    $common_id = 'id'; //common_user_details id
		    $table = "common_user_details";
	    	$condition = " AND id IN (".$ids.")";
		}
		else 
		{
			$common_id = 'common_user_id'; //common_user_details id
			$activation = "activation_date";
	        $deactivation = "deactivation_date";
	        $enabled = "enabled";
	        $userId = "userID";
	        $exempt_unused = "exempt_unused";
	        $table = "common_logs";
	        if($product == "da")
	        	$condition = " AND year=$year AND offering='da' ";
	        else 
	        	$condition = " AND year=$year AND offering='ms' AND common_user_id IN (".$ids.")";
	        
		}
	
		//For R - Class wise DA & MS Rates from SSF
		if($product=="da")
			$R = getDAClassWiseRate($orderid);
		
		if($product=="mindspark")
		{
			$duration = getOrderDuration($orderid);	
			$R = getMSClassWiseRate($orderid, $duration);
		}
	
	    if($quarter!=0)
	    {
			// Get current quarter dates
		    $result = getQuarterDates($product, $orderid, $quarter);
		    $quarter_start = $result['startDate'];
		    $quarter_end = $result['endDate'];
	    }
	    else 
	    {
			// Get current order dates
		    $result = orderInfo($orderid,$product);
		    $quarter_start = $result['start_date'];
		    $quarter_end = $result['end_date'];
	    }
	    
	    // Get current order end dates
	    $result = orderInfo($orderid,$product);
	    $orderEndDate = $result['end_date'];
	    $currentDate = date("Y-m-d");
	    if(strtotime($currentDate) < strtotime($orderEndDate))
			$orderEndDate = $currentDate;
			
	    $query = 'SELECT
					Name,first_name,last_name,username,a.class,section,'.$userId.',
					DATEDIFF(' . $deactivation . ',' . $activation . ') daysActiveForDeactiveStud,
					DATEDIFF("'.$orderEndDate.'",' . $activation . ') daysActiveForActiveStud,
					date_format('.$activation.',"%d-%m-%Y") '.$activation.',
					date_format('.$deactivation.',"%d-%m-%Y") '.$deactivation.',
					temp_year,'.$exempt_unused.'
			 FROM
					'.$table.' a';
	    
	    if($currentOrder==0)
	    {
			if($product == "da")
	    		$query .= ' LEFT JOIN common_user_details ON a.common_user_id=common_user_details.id ';
	    	else 
	    		$query .= ' LEFT JOIN common_user_details ON a.common_user_id=common_user_details.id ';
	    }
    
	    $query .= ' WHERE
			 		'.$userId.' > 0
			 AND	
					a.schoolCode=' . $schoolCode . '  
			 AND
					(' . $activation . '!="0000-00-00" AND ' . $activation . '>="' . $quarter_start . '"
						 AND ' . $activation . '<="' . $quarter_end . '")
			 AND
					a.category="STUDENT" 
			 AND
					a.subcategory="School"
			 '.$condition.'
			 ORDER BY
					a.class,section,Name';
			
		$this->clspaging->numofrecs = getQueryCount($query);

		if ($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}

		$query .= $this->clspaging->limit;
		
		$dbquery = new dbquery($query, $connid);
		$i=0;
		while ($row = $dbquery->getrowarray()) {
			$arRet[$i] = $row;
			$class = $row['class'];
			$arRet[$i]['activationdate']= $row[$activation];
			$arRet[$i]['deactivationdate']= $row[$deactivation];
			$activationDate = $row[$activation];
			$deactivationDate = $row[$deactivation];
			$noOfquarterUsed = getQuarterUsed($activationDate,$deactivationDate,$product,$orderid);
			$exempt = $row[$exempt_unused];
			if($exempt == 1)
				$arRet[$i]['amount'] = 0;
			else
			{
				$totalQuarter = totalQuarters($product,$orderid);
				$arRet[$i]['amount'] = ($R[$class]["rate"]+$R[$class]["equipment_rate"]) * ($noOfquarterUsed / $totalQuarter);	
			}
			if($activationDate!='00-00-0000' && $product=='mindspark')
			{
				if($deactivationDate=='00-00-0000')
				{
					$Date = date("d-m-Y");
					if(strtotime($Date) > strtotime(date("d-m-Y",strtotime($orderEndDate))))
						$Date = date("d-m-Y",strtotime($orderEndDate));
				}
				else 
					$Date = $deactivationDate;				
				$usageQuery = "SELECT SEC_TO_TIME(sum(time)) time FROM (
							SELECT SUM(timeSpent) time FROM educatio_adepts.adepts_homeSchoolUsage where userID=".$row[$userId]." AND startTime_int>=date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d')
							UNION SELECT SUM(timeSpent) time FROM educatio_adepts.adepts_homeSchoolUsage_archive where userID=".$row[$userId]." AND startTime_int>=date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d')) temp";
				$usageResult = mysql_query($usageQuery) or die($usageQuery."<br>".mysql_error());
				$usageLine = mysql_fetch_array($usageResult);
				$usageHours = $usageLine['time'];
				
				$lastLoginQuery = "SELECT startTime_int,if(date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') > startTime_int,'',date_format(startTime_int,'%d-%m-%Y')) date FROM educatio_adepts.adepts_sessionStatus where userid = ".$row[$userId]." AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d') UNION 
								   SELECT startTime_int,if(date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y%m%d') > startTime_int,'',date_format(startTime_int,'%d-%m-%Y')) date FROM educatio_adepts.adepts_sessionStatus_archive where userid = ".$row[$userId]." AND startTime_int<=date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y%m%d') 
								   ORDER BY startTime_int DESC LIMIT 1";
				$lastLoginResult = mysql_query($lastLoginQuery) or die($lastLoginQuery."<br>".mysql_error());
				$lastLoginLine = mysql_fetch_array($lastLoginResult);
				$lastLogin = $lastLoginLine['date'];
				
				if($usageHours=='')
					$usageHours = '00:00:00';
				if($lastLogin=='')
					$lastLogin = 'NA';
				
				if($deactivationDate=='00-00-0000')
					$arRet[$i]['usageDays'] = $row['daysActiveForActiveStud'];					
				else
					$arRet[$i]['usageDays'] = $row['daysActiveForDeactiveStud'];					
				
				$arRet[$i]['LastLogin'] = $lastLogin;
				$arRet[$i]['usageHours'] = $usageHours;
			}
			elseif($activationDate!='00-00-0000' && $product=='da')
			{ 
				if($deactivationDate=='00-00-0000')
				{
					 $Date = date("d-m-Y");
					 if(strtotime($Date) > strtotime(date("d-m-Y",strtotime($orderEndDate))))
						$Date = date("d-m-Y",strtotime($orderEndDate));
				}
				else 
					$Date = $deactivationDate;
				$usageQuery = "SELECT count(distinct da_tabletResponses.examcode) usage_count FROM da_tabletResponses 
							INNER JOIN da_examDetails ON da_tabletResponses.examcode = da_examDetails.exam_code 
							INNER JOIN da_testRequest ON da_testRequest.id = da_examDetails.request_id 
							WHERE da_testRequest.year = ".$year." AND da_tabletResponses.studentID=".$row[$userId]."
							AND da_tabletResponses.insert_date >= date_format(STR_TO_DATE('".$activationDate."', '%d-%m-%Y'),'%Y-%m-%d') 
							AND da_tabletResponses.insert_date <= date_format(STR_TO_DATE('".$Date."', '%d-%m-%Y'),'%Y-%m-%d')";
				$usageResult = mysql_query($usageQuery) or die($usageQuery."<br>".mysql_error());
				$usageLine = mysql_fetch_array($usageResult);
				$usageTests = $usageLine['usage_count'];
				
				if($usageTests=='')
					$usageTests = 0;
				
				if($deactivationDate=='00-00-0000')
					$arRet[$i]['usageDays'] = $row['daysActiveForActiveStud'];					
				else
					$arRet[$i]['usageDays'] = $row['daysActiveForDeactiveStud'];
				$arRet[$i]['LastLogin'] = '';
				$arRet[$i]['usageHours'] = '';
				$arRet[$i]['usageTests'] = $usageTests;
				
			}
			$i++;	
		}

		return $arRet;
	}
		
}
?>