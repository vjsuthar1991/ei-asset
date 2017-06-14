<?php
class clsPerformanceIncentive
{
	/**
	 * Define Master Table
	 */
	var $TABLE_MASTER; 
	/**
	 * Define Details Table
	 */
	var $TABLE_DETAILS;
	/**
	 * Define Quarter Table
	 */
	var $TABLE_QUARTER;
	
	// for $TABLE_MASTER
	var $appID;
	var $userID;
	var $managerID;
	var $quarterID;
	var $status;
	
	// for $TABLE_DETAILS
	var $goal;
	var $description;
	var $weightage;
	var $criteria;
	var $remarks;
	var $achieved;
	var $lastModifiedBy;
	
	// for $TABLE_QUARTER
	var $year;
	var $type;
	var $startDate;
	var $goalSettingDate;
	var $endDate;
	var $active;
	var $createdBy;
	var $createdOn;
	
	//For past view
	var $pastGoalsView;
	var $arrApply;
	
	//Constructor
	function clsPerformanceIncentive($TABLE_MASTER, $TABLE_DETAILS, $TABLE_QUARTER)
	{ 		
		$this->TABLE_MASTER = $TABLE_MASTER; 
		$this->TABLE_DETAILS   = $TABLE_DETAILS;
		$this->TABLE_QUARTER   = $TABLE_QUARTER;
		
		// for $TABLE_MASTER
		$this->appID = 0;
		$this->userID = "";
		$this->managerID = "";
		$this->quarterID = "";
		$this->status = "";
		$this->statusFlag = 0;
		
		// for $TABLE_DETAILS
		$this->goalID = array();
		$this->goal = array();
		$this->description = array();
		$this->weightage = array();
		$this->criteria = array();
		$this->remarks = array();
		$this->achieved = array();
		$this->lastModifiedBy = "";
		
		// for $TABLE_QUARTER  
		$this->year = "";
		$this->type = "";
		$this->startDate = "0000-00-00"; 
		$this->goalSettingDate = "0000-00-00"; 
		$this->endDate = "0000-00-00"; 
		$this->active = "";
		$this->createdBy = "";
		
		$this->pastGoalsView = 0;
		$this->arrApply = array();
	}
	
		//Function to set GET variables
	function setgetvars($connid)
	{
		if(isset($_GET["person"])) 
			$this->userID = $this->decryptName($connid, $_GET["person"]);
		if(isset($_GET["past"]) && $_GET["past"] == 1)
			$this->pastGoalsView = 1;
	}
	
	//Function to set POST variables
	function setpostvars()
	{			
		// for $TABLE_ITEMS
		if(isset($_POST['goalID'])) $this->goal = $_POST['goalID'];	
		if(isset($_POST['goal'])) $this->goal = $_POST['goal'];	
		if(isset($_POST['description'])) $this->description = $_POST['description'];
		if(isset($_POST['weightage'])) $this->weightage = $_POST['weightage'];
		if(isset($_POST['criteria'])) $this->criteria = $_POST['criteria'];
		if(isset($_POST['remarks'])) $this->remarks = $_POST['remarks'];
		if(isset($_POST['achieved'])) $this->achieved = $_POST['achieved'];
		if(isset($_POST['lastModifiedBy'])) $this->lastModifiedBy = $_POST['lastModifiedBy'];
			
		// for $TABLE_QUARTER
		if(isset($_POST['year'])) $this->year = $_POST['year'];	
		if(isset($_POST['type'])) $this->type = $_POST['type'];
		if(isset($_POST['startDate'])) $this->startDate = $_POST['startDate'];
		if(isset($_POST['goalSettingDate'])) $this->goalSettingDate = $_POST['goalSettingDate'];
		if(isset($_POST['endDate'])) $this->endDate = $_POST['endDate'];
		if(isset($_POST['active'])) $this->active = $_POST['active'];
		if(isset($_POST['createdBy'])) $this->createdBy = $_POST['createdBy'];
	}
	
	//Function to load the goal setting page
	function pageLoad($connid, $page, $crypt, $mode = "")
	{		
		$this->setgetvars($connid);
		
		if($page == "goals")
		{
			if($this->pastGoalsView == 1)
			{
				if(isset($_POST["quarters"]) && $_POST["quarters"] > 0)
				{
					$this->quarterID = $_POST["quarters"];
				}
				else
				{
					$arrPrevQuarterDetails = $this->getPrevQuarterDetails($connid);
					$this->quarterID = $arrPrevQuarterDetails["quarterID"];
				}		
			}
			
			$this->setSessionVars($connid, $crypt);	
			$this->loadGoalsData($connid, $crypt);
			if($mode != "")
			{
				$this->setpostvars();
				
				if($mode == "saveDraft")
				{
					$this->saveGoalData($connid, $crypt);
					$msg = "Goals Have Been Successfully Saved";
				}				
				elseif($mode == "submit")
				{
					$this->saveGoalData($connid, $crypt);
					$this->updateStatus($connid, "Submitted");
					$this->sendGoalsSubmissionMail($connid, $crypt, $this->userID, $this->quarterID);
					$msg = "Goals Have Been Successfully Submitted To The Manager";
				}
				elseif($mode == "reject-manager")
				{
					$this->saveGoalData($connid, $crypt);
					$this->updateStatus($connid, "InProgress-Emp");
					$this->sendGoalsRejectionMail($connid, $crypt, $this->userID, $this->quarterID);
					$msg = "Goals Have Been Rejected";
				}
				elseif($mode == "submit-manager")
				{
					$this->saveGoalData($connid, $crypt);
					$this->updateStatus($connid, "ApprovalAwaited");
					$this->sendEvaluationApprovalMail($connid, $crypt, $this->userID, $this->quarterID);
					$msg = "Goals And Evaluation Have Been Successfully Sent To SBU Head For Approval";
				}
				elseif($mode == "reject-sbuhead")
				{
					$this->updateStatus($connid, "Submitted");
					$this->sendProcessCompletionMail($connid, $crypt, 'rejected', $this->userID, $this->quarterID);
					$msg = "Goal Evaluation Has Been Rejected";
				}
				elseif($mode == "approve-sbuhead")
				{
					$this->updateStatus($connid, "Completed");
					$this->insertAchievedIncentives($connid, $crypt);
					$this->sendProcessCompletionMail($connid, $crypt, 'approved', $this->userID, $this->quarterID);
					$msg = "Performance Incentives Process Has Been Successfully Completed";
				}				
				
				echo "<pre><div align='center'>$msg</div></pre>";
				//$this->pageLoad($connid, "goals", $crypt, "");
				echo "<script>window.location=\"updateSuccessful.php?q=".$_REQUEST["q"]."&person=".$_REQUEST["person"]."&mode=".$mode."\"</script>";
			}
		}		
	}
	
	//Function to load goals data
	function loadGoalsData($connid, $crypt)
	{
		$arrgoalID = array();
		$arrgoal = array();
		$arrdescription = array();
		$arrweightage = array();
		$arrcriteria = array();
		$arrremarks = array();
		$arrachieved = array();
		
		if(isset($this->appID) && $this->appID > 0)
		{
			$query = "SELECT goalID, goal, description,weightage,criteria,remarks,achieved FROM ".$this->TABLE_DETAILS." WHERE appID = '".$this->appID."' ORDER BY goalID";
		}
		else
		{
			$query = "SELECT goalID, appID, goal,description,weightage,criteria,remarks,achieved FROM ".$this->TABLE_DETAILS." WHERE appID = (SELECT appID FROM ".$this->TABLE_MASTER." WHERE userID = '".$this->userID."' AND quarterID = ".$this->quarterID.") ORDER BY goalID ";
		}
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($this->appID <= 0)
				$this->appID = $row["appID"];
			array_push($arrgoalID, $row["goalID"]);
			array_push($arrgoal, $row["goal"]);
			array_push($arrdescription, $row["description"]);
			array_push($arrweightage, $crypt->decrypt($row["weightage"]));
			array_push($arrcriteria, $row["criteria"]);
			array_push($arrremarks, $row["remarks"]);
			array_push($arrachieved, $crypt->decrypt($row["achieved"]));
		}
		$this->goalID = $arrgoalID;
		$this->goal = $arrgoal;
		$this->description = $arrdescription;
		$this->weightage = $arrweightage;
		$this->criteria = $arrcriteria;
		$this->remarks = $arrremarks;
		$this->achieved = $arrachieved;	
	}
	
	//Function to set SESSION variables
	function setSessionVars($connid, $crypt)
	{
		if($this->pastGoalsView != 1)
		{
			if(isset($_REQUEST["q"]) && $_REQUEST["q"]!='')
			{
				$_SESSION["quarterID"] = $crypt->decrypt($_REQUEST["q"]);
				$this->quarterID = $_SESSION["quarterID"];
			}				
			else
			{
				$quarterDetails = $this->getCurrentQuarterDetails($connid);
				if(isset($quarterDetails) && is_array($quarterDetails))
				{
					$_SESSION["quarterID"] = $quarterDetails["quarterID"];
					$this->quarterID = $_SESSION["quarterID"];
				}
			}
		}		
		$manager = $this->getAdminReportingTo($connid, $this->userID);
		$this->managerID = $manager;
		$statusDetails = $this->getAppStatus($connid);
		$this->status = $statusDetails["status"];
		$this->statusFlag = $statusDetails["statusFlag"];
	}
	
	//Function to get the details of current quarter details
	function getCurrentQuarterDetails($connid)
	{
		$arrRet = NULL;
		$today = date("Y-m-d");
		$query = "SELECT quarterID, year, type, startDate, goalSettingDate, endDate FROM ".$this->TABLE_QUARTER." WHERE active='active' AND startDate<='$today' AND endDate>='$today' ORDER BY quarterID DESC LIMIT 1";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet["quarterID"]		= $row["quarterID"];
			$arrRet["year"]				= $row["year"];
			$arrRet["type"]				= $row["type"];
			$arrRet["startDate"]		= $row["startDate"];
			$arrRet["goalSettingDate"] 	= $row["goalSettingDate"];
			$arrRet["endDate"] 			= $row["endDate"];
		}
		return $arrRet;
	}
	
	//Function to get all the quarter details
	function getQuarterDetails($connid, $quarterID = "", $past = 0)
	{
		$arrRet = array();
		$condition = '';
		if($past == 1)
			$condition = " WHERE active='inactive'";
		if($quarterID == "")
		{
			$query = "SELECT quarterID, year, type, startDate, goalSettingDate, endDate, active FROM ".$this->TABLE_QUARTER." ".$condition." ORDER BY quarterID DESC";
		}
		else
		{
			$query = "SELECT quarterID, year, type, startDate, goalSettingDate, endDate, active FROM ".$this->TABLE_QUARTER." WHERE quarterID = ".$quarterID;
		}
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			if($quarterID == "")
			{
				$arrRet[$row["quarterID"]] = array("quarterID" => $row["quarterID"],
										"year" => $row["year"],
										"type" => $row["type"],
										"startDate" => $row["startDate"],
										"active" => $row["active"],
										"goalSettingDate" => $row["goalSettingDate"],
										"endDate" => $row["endDate"]);
			}
			else
			{
				$arrRet["year"] = $row["year"];
				$arrRet["type"] = $row["type"];
				$arrRet["startDate"] = $row["startDate"];
				$arrRet["goalSettingDate"] = $row["goalSettingDate"];
				$arrRet["endDate"] = $row["endDate"];
				$arrRet["active"] = $row["active"];
				
			}
		}
		return $arrRet;		
	}
	
	//Function to get the details for next quarter
	function getNextQuarterDetails($connid)
	{
		$arrRet = array();
		$currQrt = $this->getCurrentQuarterDetails($connid);
		if(isset($currQrt) && $currQrt != NULL)
		{
			$qrtType 			= $currQrt["type"];
			$qrtYear 			= $currQrt["year"];
			$arrRet["year"] 	= $currQrt["year"];
			$arrRet["active"] 	= "active";
		}
		else
		{
			$qrtYear = date('Y');
			$arrRet["year"] = $qrtYear;
			$arrRet["active"] = "active";
			$qrtMonth = date('m');
			if($qrtMonth <= 3)
				$qrtType = 4;
			elseif($qrtMonth <= 6)
				$qrtType = 1;
			elseif($qrtMonth <= 9)
				$qrtType = 2;
			elseif($qrtMonth <= 12)
				$qrtType = 3;
		}
		switch($qrtType)
		{
			case 1:
				$startmonth = '04';
				$endmonth 	= '06';
				$endday 	= '30';
				break;
			case 2:
				$startmonth = '07';
				$endmonth 	= '09';
				$endday 	= '30';
				break;
			case 3:
				$startmonth = '10';
				$endmonth 	= '12';
				$endday 	= '31';
				break;
			case 4:
				$startmonth = '01';
				$endmonth 	= '03';
				$endday 	= '31';
				break;
		}		
		if($qrtType < 4)
		{
			$arrRet["type"] = $qrtType + 1;
			$arrRet["year"] = $qrtYear;
		}
		elseif($qrtType == 4)
		{
			$arrRet["type"] = 1;
			$arrRet["year"] = $qrtYear+1;
		}
		$arrRet["startDate"] 		= $arrRet["year"]."-$startmonth-01";
		$arrRet["goalSettingDate"] 	= $arrRet["year"]."-$startmonth-30";
		$arrRet["endDate"] 			= $arrRet["year"]."-$endmonth-$endday";
		return $arrRet;
	}
	
	//Function to get the details of previous quarter
	function getPrevQuarterDetails($connid, $accMon='', $accYear='',$forPayroll='')
	{
		$arrRet = NULL;
		$condition = '';
		$today = date("Y-m-d");
		if($forPayroll!='' && $forPayroll=='Payroll')
		{
			$accDate = date('Y-m-d', mktime(0,0,0,$accMon,3,$accYear));
			$condition = " endDate < '$accDate'";
		}			
		else
			$condition = " endDate < '$today' ";
		$query = "SELECT quarterID, year, type, startDate, goalSettingDate, endDate FROM ".$this->TABLE_QUARTER." WHERE active='inactive' AND $condition ORDER BY quarterID DESC LIMIT 1";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet["quarterID"] 		= $row["quarterID"];
			$arrRet["year"] 			= $row["year"];
			$arrRet["type"] 			= $row["type"];
			$arrRet["startDate"] 		= $row["startDate"];
			$arrRet["goalSettingDate"] 	= $row["goalSettingDate"];
			$arrRet["endDate"] 			= $row["endDate"];
		}
		return $arrRet;
	}
	
	//Function to save new quarter details
	function saveQuarterDetails($connid, $quarterID = 0)
	{
		//echo "$quarterID";
		if(isset($quarterID) && $quarterID > 0)
		{
			$query = "UPDATE ".$this->TABLE_QUARTER." 
				SET year = '".$_POST["year"]."' ,
				type = '".$_POST["type"]."', 
				startDate = '".date("Y-m-d",strtotime($_POST["startDate"]))."', 
				goalSettingDate = '".date("Y-m-d",strtotime($_POST["goalSettingDate"]))."', 
				endDate = '".date("Y-m-d",strtotime($_POST["endDate"]))."', 
				active = '".$_POST["active"]."',
				createdBy = '".$_SESSION["username"]."', 
				createdOn = '".date("Y-m-d")."'
				WHERE quarterID = $quarterID";
			$dbquery = new dbquery($query,$connid);
			echo "<div align='center'><pre>The Quarter Has Been Successfully Updated</pre></div>";
		}
		else
		{
			$startDt = date("Y-m-d", strtotime($_POST["startDate"]));
			$query_check = "SELECT COUNT(*) FROM ".$this->TABLE_QUARTER." WHERE (year = '".$_POST["year"]."' AND type = '".$_POST["type"]."') OR (startDate <= '$startDt' AND endDate >= '$startDt')";
			//echo $query_check;
			$dbquery_check = new dbquery($query_check,$connid);
			$row_check = $dbquery_check->getrowarray();
			$cnt = $row_check['COUNT(*)'];
			//echo $cnt;
			if(isset($cnt) && $cnt > 0)
			{
				echo "<div align='center'><pre>The Quarter Already Exists For The Given Period</pre></div>";
			}
			else
			{
				$query = "INSERT INTO ".$this->TABLE_QUARTER." 
				SET year = '".$_POST["year"]."' ,
				type = '".$_POST["type"]."', 
				startDate = '".date("Y-m-d",strtotime($_POST["startDate"]))."', 
				goalSettingDate = '".date("Y-m-d",strtotime($_POST["goalSettingDate"]))."', 
				endDate = '".date("Y-m-d",strtotime($_POST["endDate"]))."', 
				active = '".$_POST["active"]."',
				createdBy = '".$_SESSION["username"]."', 
				createdOn = '".date("Y-m-d")."'";
				//echo $query;
				$dbquery = new dbquery($query,$connid);
				$this->quarterID = $dbquery->insertid;
				
				if($_POST["active"] == "active")
				{
					$query_update 	= "UPDATE ".$this->TABLE_QUARTER." SET active='inactive' WHERE quarterID <> ".$this->quarterID;
					$dbquery_check 	= new dbquery($query_update,$connid);
				}
				echo "<div align='center'><pre><u>The quarter has been saved<br/>The Previous Quarter(s) Have Been Closed</u></pre></div>";
			}
		}		
	}
	
	//Function to get AdminReportingTo
	function getAdminReportingTo($connid, $Name)
	{
		$query 		= "SELECT adminReportingTo FROM emp_master WHERE userID = '$Name'";
		$dbquery 	= new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$manager = $row["adminReportingTo"];
		}
		return $manager;
	}
	
	//Function to get SBUHead
	function getSBUHead($connid, $Name)
	{
		$query 		= "SELECT sbu_head FROM sbu_master WHERE srno = (SELECT empl_sbu_id FROM emp_master WHERE userID = '$Name')";
		$dbquery 	= new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$sbuhead = $row["sbu_head"];
		}
		return $sbuhead;
	}
	
	//Function to save the goals and the app
	function saveGoalData($connid, $crypt)
	{
		if(!(isset($this->appID)) || $this->appID <= 0)
		{
			$query_check = "SELECT appID FROM ".$this->TABLE_MASTER." WHERE userID = '".$this->userID."' AND quarterID = '".$this->quarterID."'";
			//echo($query_check);
			$dbquery_check = new dbquery($query_check,$connid);
			$row_check = $dbquery_check->getrowarray();
			$this->appID = $row_check['appID'];
			//echo "<hr>App ID: ".$this->appID;
			//echo "<hr>Noofrows:".$dbquery_check->numrows();
			if($dbquery_check->numrows() == 0)
			{
				$query 		 = "INSERT INTO ".$this->TABLE_MASTER." SET userID = '".$this->userID."' ,managerID = '".$this->managerID."', quarterID = '".$this->quarterID."', status = 'InProgress-Emp'";
				$dbquery 	 = new dbquery($query,$connid);
				$this->appID = $dbquery->insertid;
				//echo "<hr>App ID: ".$this->appID;
			}
		}	
		
		$this->saveGoalDetails($connid, $crypt);
	}
	
	//Function to save the goals and their details
	function saveGoalDetails($connid, $crypt)
	{
		if(is_array($this->goal) && count($this->goal) > 0)
		{
			foreach($this->goal as $key => $goal)
			{
				if($this->goal[$key] != "")
				{
					if(isset($this->goalID[$key]) && $this->goalID[$key] > 0)
					{
						$detailsQuery = "UPDATE ".$this->TABLE_DETAILS." SET goal = '".$this->goal[$key]."', description = '".$this->description[$key]."', weightage = '".$crypt->encrypt($this->weightage[$key])."', criteria ='".$this->criteria[$key]."', remarks = '".addslashes($this->remarks[$key])."', achieved = '".$crypt->encrypt($this->achieved[$key])."' WHERE goalID = ".$this->goalID[$key];
						/*if(trim($this->goal[$key])=='' && trim($this->description[$key])=='' && trim($this->weightage[$key])=='' && trim($this->achieved[$key])=='' && trim($this->remarks[$key])=='')
						{
							$detailsQuery = "DELETE FROM ".$this->TABLE_DETAILS." WHERE goalID = ".$this->goalID[$key];
						}*/
						//echo("<hr>Details Query: ".$detailsQuery);
						$dbquery = new dbquery($detailsQuery,$connid);
					}
					else
					{
						if($this->goal[$key] != "")
						{
							$detailsQuery = "INSERT INTO ".$this->TABLE_DETAILS." SET appID = '".$this->appID."', goal = '".$this->goal[$key]."', description = '".$this->description[$key]."', weightage = '".$crypt->encrypt($this->weightage[$key])."', criteria ='".$this->criteria[$key]."', remarks = '".$this->remarks[$key]."', achieved = '".$crypt->encrypt($this->achieved[$key])."'";
							//echo("<hr>Details Query: ".$detailsQuery);
							$dbquery = new dbquery($detailsQuery,$connid);
						}						
					}
				}
				else
				{
					if(isset($this->goalID[$key]) && $this->goalID[$key] > 0)
					{
						if(trim($this->goal[$key])=='' && trim($this->description[$key])=='' && trim($this->weightage[$key])=='' && trim($this->achieved[$key])=='' && trim($this->remarks[$key])=='')
						{
							$detailsQuery = "DELETE FROM ".$this->TABLE_DETAILS." WHERE goalID = ".$this->goalID[$key];
						}
						//echo("<hr>Details Query: ".$detailsQuery);
						$dbquery = new dbquery($detailsQuery,$connid);
					}
				}
			}	
		}		
	}
	
	//Function to get the total number of goals set
	function getGoalsCount($connid)
	{
		$cnt = 0;
		if(isset($this->appID) && $this->appID > 0)
		{
			$query = "SELECT COUNT(*) FROM ".$this->TABLE_DETAILS." WHERE appID = ".$this->appID;
		}
		else
		{
			$query = "SELECT COUNT(*) FROM ".$this->TABLE_DETAILS." WHERE appID = (SELECT appID FROM pi_goalMaster WHERE userID = '".$this->userID."' AND quarterID = ".$this->quarterID.") ";
		}
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$cnt = $row["COUNT(*)"];
		}
		return $cnt;
	}
	
	//Functino to update app status
	function updateStatus($connid, $status)
	{
		$query 	 = "UPDATE ".$this->TABLE_MASTER." SET status = '$status' WHERE userID = '".$this->userID."' AND quarterID = ".$this->quarterID;
		$dbquery = new dbquery($query,$connid);
	}
	
	//Function to fetch app status
	function getAppStatus($connid, $userID = "", $quarterID = "")
	{
		$arrRet = array();
		$status = "Not Started";
		$statusString = "Pending With ".fetchFullName($userID);
		$statusFlag = 0;
		if(isset($this->appID) && $this->appID > 0)
		{
			$query = "SELECT appID, status FROM ".$this->TABLE_MASTER." WHERE appID = ".$this->appID;
		}
		else
		{
			if(isset($userID) && $userID != "" && isset($quarterID) && $quarterID != "")
				$query = "SELECT appID, status FROM ".$this->TABLE_MASTER." WHERE userID = '".$userID."' AND quarterID = ".$quarterID;
			else
				$query = "SELECT appID, status FROM ".$this->TABLE_MASTER." WHERE userID = '".$this->userID."' AND quarterID = ".$this->quarterID;
		}		
		//echo $query;
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$status = $row["status"];
			$appID = $row["appID"];
		}
		if($status == "InProgress-Emp")
		{
			$statusFlag = 1;
		}
		elseif($status == "Submitted")
		{
			$statusFlag = 2;
			$statusString = "Pending With ".fetchFullName($this->getAdminReportingTo($connid, $userID));
		}
		elseif($status == "Approved")
		{
			$statusFlag = 3;
			$statusString = "Pending With ".fetchFullName($this->getAdminReportingTo($connid, $userID));
		}
		elseif($status == "InProgress-Mgr")
		{
			$statusFlag = 4;
			$statusString = "Pending With ".fetchFullName($this->getAdminReportingTo($connid, $userID));
		}
		elseif($status == "ApprovalAwaited")
		{
			$statusFlag = 5;
			$statusString = "Pending With ".fetchFullName($this->getSBUHead($connid, $userID));
		}
		elseif($status == "Completed")
		{
			$statusFlag = 6;
			$statusString = "Process Completed";
		}
		$arrRet["appID"] = $appID;
		$arrRet["status"] = $status;
		$arrRet["statusFlag"] = $statusFlag;
		$arrRet["statusString"] = $statusString;
		return $arrRet;
	}
	
	//Function to get reportees
	function getReportees($connid, $Name="", $sbuID="")
	{
		$arrRet = array();
		$condition = "";
		if(isset($Name) && $Name != "")
			$condition = " WHERE adminReportingTo = '$Name' ";
		if(isset($sbuID) && $sbuID != "")
			$condition = " WHERE empl_sbu_id = $sbuID";
		$query = "SELECT userID FROM emp_master $condition";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($arrRet, $row["userID"]);
		}
		return $arrRet;
	}
	
	//Function to check if there are any past quarters
	function checkForPastQuarters($connid)
	{
		$cnt = 0;
		$query = "SELECT COUNT(*) FROM ".$this->TABLE_QUARTER." WHERE active='inactive' ORDER BY quarterID DESC";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$cnt = $row["COUNT(*)"];
		}
		return $cnt;
	}
	
	//Function to encrypt reportee
	function encryptName($connid, $Name)
	{
		$encName = "";
		$query = "SELECT MD5(userID) FROM emp_master WHERE userID = '$Name'";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$encName = $row["MD5(userID)"];
		}
		return $encName;
	}
	
	//Function to decrypt reportee
	function decryptName($connid, $key)
	{
		$uname = "";
		$query = "SELECT userID FROM emp_master WHERE MD5(userID) = '$key'";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$uname = $row["userID"];
		}
		return $uname;
	}
	
	//Function to get the details of all quarters
	function getAllQuarterDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT quarterID, year, type, startDate, goalSettingDate, endDate, active, createdBy, createdOn FROM ".$this->TABLE_QUARTER." ORDER BY quarterID DESC";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["quarterID"]] = array("year" => $row["year"],
												"type" => $row["type"],
												"startDate" => $row["startDate"],
												"goalSettingDate" => $row["goalSettingDate"],
												"endDate" => $row["endDate"],
												"active" => $row["active"],
												"createdBy" => $row["createdBy"],
												"createdOn" => $row["createdOn"]);
		}
		return $arrRet;
	}
	
	//Function to get the PI for employee
	function getPIValue($connid, $Name)
	{
		$piVal = 0;
		$eligibilityQuery = "SELECT performance_incentives AS pi FROM payroll_statusMaster WHERE userID ='$Name'";
		$dbquery = new dbquery($eligibilityQuery, $connid);
		while($eligibilityRow = $dbquery->getrowarray())
		{
			$piVal = $eligibilityRow["pi"];
		}
		return $piVal;	
	}
	
	//Function to assign incentives to employees
	function saveIncentivesData($connid, $incentives)
	{
		
		if(isset($_POST["chkApply"])) $this->arrApply = $_POST["chkApply"];
		if(is_array($this->arrApply) && count($this->arrApply) > 0)
		{
			foreach($this->arrApply as $key => $userID)
			{
				$query = "UPDATE payroll_statusMaster SET performance_incentives = '".$incentives."' WHERE userID = '".$userID."' LIMIT 1 ";
				$dbquery = new dbquery($query,$connid);
			}	
		}
	}
	
	//Function to get employee details
	function getEmployeeDetails($connid, $Name)
	{
		$arrRet = array();
		$empQuery = "SELECT adminReportingTo, sbu_name, desig FROM emp_master, sbu_master WHERE userID ='$Name' AND empl_sbu_id = srno";
		$dbquery = new dbquery($empQuery, $connid);
		while($empRow = $dbquery->getrowarray())
		{
			$arrRet["adminReportingTo"] = $empRow["pi"];
			$arrRet["sbu_name"] = $empRow["sbu_name"];
			$arrRet["desig"] = $empRow["desig"];
		}
		return $arrRet;	
	}
	
	//Function to get employee details
	function getSBUDetailsByHeadName($connid, $sbuHeadName)
	{
		$arrRet = array();
		if($sbuHeadName!='')
			$sbuQuery = "SELECT srno, sbu_name FROM sbu_master WHERE sbu_head = '".$sbuHeadName."'";
		else 
			$sbuQuery = "SELECT srno, sbu_name FROM sbu_master";
			
		$dbquery = new dbquery($sbuQuery, $connid);
		while($sbuRow = $dbquery->getrowarray())
		{
			$arrRet[$sbuRow["srno"]] = array(
												"srno" =>$sbuRow["srno"],
												"sbu_name" => $sbuRow["sbu_name"]
											);
		}
		return $arrRet;	
	}
	
	function getIncentiveDetailsOfEmpInSBU($connid, $sbuID, $status='')
	{
		$arrRet = array();
		if($status != '')
			$condition = " AND c.status = '$status'";
		$detQuery = "SELECT b.userID AS userID, c.appID AS appID, c.quarterID as quarterID, c.status AS status FROM emp_master b, pi_goalMaster c WHERE b.userID = c.userID AND b.empl_sbu_id=$sbuID AND b.userID NOT IN (SELECT sbu_head FROM sbu_master WHERE srno=$sbuID) $condition";
		//$detQuery .= " UNION SELECT b.userID AS userID, c.appID AS appID, c.quarterID as quarterID, c.status AS status FROM emp_master b, pi_goalMaster c WHERE b.userID = c.userID AND b.userID IN (SELECT sbu_head FROM sbu_master, emp_master WHERE sbu_head=userID AND adminReportingTo='$Name') $condition";
		$dbquery = new dbquery($detQuery, $connid);
		while($detRow = $dbquery->getrowarray())
		{
			$arrRet[$detRow["appID"]] = array(
												"userID"=>$detRow["userID"],
												"appID"=>$detRow["appID"],
												"quarterID"=>$detRow["quarterID"],
												"status"=>$detRow["status"],
												);
		}
		return $arrRet;	
	}
	
	function getIncentiveDetailsOfSBUHeads($connid, $Name, $status='')
	{
		$arrRet = array();
		if($status != '')
			$condition = " AND c.status = '$status'";
		$detQuery = "SELECT b.userID AS userID, c.appID AS appID, c.quarterID as quarterID, c.status AS status FROM emp_master b, pi_goalMaster c WHERE b.userID = c.userID AND b.userID IN (SELECT sbu_head FROM sbu_master, emp_master WHERE sbu_head=userID AND adminReportingTo='$Name') $condition";
		$dbquery = new dbquery($detQuery, $connid);
		while($detRow = $dbquery->getrowarray())
		{
			$arrRet[$detRow["appID"]] = array(
												"userID"=>$detRow["userID"],
												"appID"=>$detRow["appID"],
												"quarterID"=>$detRow["quarterID"],
												"status"=>$detRow["status"],
												);
		}
		return $arrRet;	
	}
	
	function getEmpSBUWise($connid, $crypt, $sbuID)
	{
		$arrRet = array();
		$detQuery = "SELECT userID FROM emp_master WHERE empl_sbu_id = $sbuID AND userID NOT IN (select sbu_head FROM sbu_master WHERE srno = $sbuID)";
		$dbquery = new dbquery($detQuery, $connid);
		$index = 0;
		while($detRow = $dbquery->getrowarray())
		{
			$empID = $detRow["userID"];
			$isEligible = $this->checkEligibility($connid, $crypt, $empID);
			if($isEligible == 1)
				$arrRet[$index++] = $empID;
		}
		return $arrRet;	
	}
	
	function getAchievedDetails($connid, $crypt, $appID)
	{
		$totalAchieved = 0;
		$achievedQuery = "SELECT achieved, weightage FROM pi_goalDetails WHERE appID = ".$appID;
		$dbquery = new dbquery($achievedQuery, $connid);
		while($achievedRow = $dbquery->getrowarray())
		{
			$totalAchieved += ($crypt->decrypt($achievedRow["achieved"])*$crypt->decrypt($achievedRow["weightage"]))/100;
		}
		$totalAchieved = round($totalAchieved, 2);
		return $totalAchieved;
	}
	
	//Function which converts yyyy-mm-dd to dd/mm/yyyy format
	function formatDate($oldformat) 
	{
		$dateParameters=explode("-",$oldformat);
		$newformat=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
		return $newformat;
	}
	
	//Function to send mail on completion of process
	function sendProcessCompletionMail($connid, $crypt, $status, $userID = "", $quarterID = "")
	{
		if($userID == "")
			 $userID = $this->userID;
		
		$detailsQuery = "SELECT firstName, lastName, adminReportingTo, emailComp, sbu_head FROM emp_master, sbu_master WHERE userID = '$userID' AND empl_sbu_id=srno";
		$dbquery = new dbquery($detailsQuery, $connid);
		$detailsRow = $dbquery->getrowarray();
		
		$fullname = ucfirst($detailsRow["firstName"])." ".ucfirst($detailsRow["lastName"]);
		
		if($status == 'approved')
			$arrMailingDet = getHRpeopleList("pi_goal_settings.php","process completion");
		elseif($status == 'rejected')
			$arrMailingDet = getHRpeopleList("pi_goal_settings.php","evaluation rejection");
		
		$mgr = $detailsRow["adminReportingTo"];
		$sbuhead = $detailsRow["sbu_head"];
		$mgrMail = $this->getEmail($connid, $mgr);
		$sbuheadMail = $this->getEmail($connid, $sbuhead);
		
		$quarterPeriod = $this->getQuarterHeader($connid, $quarterID);
		$link = "http://www.educationalinitiatives.com/performance_incentives/pi_goal_settings.php?q=".$crypt->encrypt($quarterID);
		$link .= "&person=".$this->encryptName($connid, $userID);
		
		if($status == 'approved')
			$message= "Dear ".$fullname.",<br/><br/>";
		elseif($status == 'rejected')
			$message= "Dear ".fetchFullName($mgr).",<br/><br/>";
		
		if($status == 'approved')
		{
			$message.= "The process of performance incentives for the period $quarterPeriod has been completed.<br/><br/>";
		}
		elseif($status == 'rejected')
		{
			$message.= "The evaluation of performance incentives for $fullname for the period $quarterPeriod has been rejected.<br/><br/>";
			
			if($_POST['hdnReason']!='')
				$message.= "The reasons for rejection are:<br/>".$_POST['hdnReason']."<br/><br/>";
		}		
					
		$message.= "To check the details of the same you may visit the given <a href='$link'>link</a>.";
		
		$message.= "<br/><br/>Regards,<br/>".fetchFullName($sbuhead);
		
		$headers = "From:".$arrMailingDet["send_from"]."\r\n";
		
		if($status == 'approved')
		{
			$headers .= "Cc:".$mgrMail.",".$sbuheadMail."\r\n";
		}
		elseif($status == 'rejected')
		{
			$headers .= "Cc:".$sbuheadMail."\r\n";
		}		
		
		$headers .= "Bcc:".$arrMailingDet["condition_based"]."\r\n";
					
		$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
		
		$subject = $arrMailingDet['subject'];
			
		if($status == 'approved')
			$to = $detailsRow["emailComp"];
		elseif($status == 'rejected')
			$to = $mgrMail;
		
		/*echo '<pre>';
		echo $to.'</br>';
		echo $headers.'</br>';
		echo $subject.'</br>';
		echo $message.'</br>';
		echo '</pre>';*/

		if(mail($to, $subject, $message, $headers))
		{
			echo "<pre><div align='Center'>Mail Sent</div></pre>";
		}	
		else
		{
			echo "<pre><div align='Center'>Mail Sending Failed</div></pre>";
		}
	}
	
	//Function to get email address
	function getEmail($connid, $userID)
	{
		$email = '';
		$detailsQuery = "SELECT emailComp FROM emp_master WHERE userID = '$userID'";
		$dbquery = new dbquery($detailsQuery, $connid);
		$detailsRow = $dbquery->getrowarray();
		$email = $detailsRow['emailComp'];
		return $email;
	}
	
	//Function to check eligibility of employee for incentives
	function checkEligibility($connid, $crypt, $userID = "")
	{
		if($userID == "")
			 $userID = $this->userID;
		$isEligible = 0;
		$eligibilityQuery = "SELECT performance_incentives, probation_confirmed, TIMESTAMPDIFF(DAY, ADDDATE(joinDate, probation_period_alloted), CURDATE()) AS daydiff FROM emp_master a, payroll_statusMaster b WHERE a.userID = '$userID' AND b.userID = '$userID' LIMIT 1";
		$dbquery = new dbquery($eligibilityQuery, $connid);
		$eligibilityRow = $dbquery->getrowarray();
		$joinDate = $eligibilityRow["joinDate"];
		$probation_period_alloted = $eligibilityRow["probation_period_alloted"];
		$probation_confirmed = $eligibilityRow["probation_confirmed"];
		$daydiff = $eligibilityRow["daydiff"];
		$incentives = $crypt->decrypt($eligibilityRow["performance_incentives"]);
		
		if($probation_confirmed == 1 && $daydiff >= 0 && $incentives > 0)
		{
			$isEligible = 1;
		}
		return $isEligible;
	}
	
	//Function to check eligibility of employee for incentives
	function checkEligibilityForQuarter($connid, $crypt, $quarterID, $userID = "")
	{
		if($userID == "")
			 $userID = $this->userID;
		$isEligible = 0;
		$eligibilityQuery = "SELECT performance_incentives, probation_confirmed, TIMESTAMPDIFF(DAY, ADDDATE(joinDate, probation_period_alloted), p.startDate) AS daydiff FROM emp_master a, payroll_statusMaster b, pi_quarterDetails p WHERE a.userID = b.userID AND a.userID = '$userID' AND quarterID = $quarterID LIMIT 1";
		$dbquery = new dbquery($eligibilityQuery, $connid);
		$eligibilityRow = $dbquery->getrowarray();
		$joinDate = $eligibilityRow["joinDate"];
		$probation_period_alloted = $eligibilityRow["probation_period_alloted"];
		$probation_confirmed = $eligibilityRow["probation_confirmed"];
		$daydiff = $eligibilityRow["daydiff"];
		$incentives = $crypt->decrypt($eligibilityRow["performance_incentives"]);
		
		if($incentives > 0 && (($probation_confirmed == 1 && $daydiff >= 0) || $daydiff >= -45))
		{
			$isEligible = 1;
		}
		return $isEligible;
	}
	
	//Function to insert the incentives value
	function insertAchievedIncentives($connid, $crypt, $userID="")
	{
		if($userID == "")
			 $userID = $this->userID;
		$isEligible = $this->checkEligibilityForQuarter($connid, $crypt, $this->quarterID, $userID);
		if($isEligible == 1)
		{
			$empDetails = $this->getEmpDetailsForPICalculations($connid, $crypt, $userID);
			$joinDt = $empDetails["joinDate"];
			$leftDt = $empDetails["leftDate"];
			$probationEndDays = $empDetails["probationperiod"];
			$probationEndDate = $empDetails["probationEndDate"];
			$pi = $empDetails["pi"];
			$quarterDetails = $this->getQuarterDetails($connid, $this->quarterID);
			$qrtStrtDt = $quarterDetails["startDate"];
			$qrtEndDt = $quarterDetails["endDate"];
			if($probationEndDate > $qrtStrtDt)
			{
				$daysToBeDeducted = (strtotime($probationEndDate) - strtotime($qrtStrtDt))/3600/24;
				$totalDaysForQuarter = (strtotime($qrtEndDt) - strtotime($qrtStrtDt))/3600/24;
				
				$pi = floor((($pi*3)/$totalDaysForQuarter)*($totalDaysForQuarter-$daysToBeDeducted));
				/*echo "<br/>totalDaysForQuarter: ".$totalDaysForQuarter;
				echo "<br/>daysToBeDeducted: ".$daysToBeDeducted;
				echo "<br/>probationEndDays: ".$probationEndDays;
				echo "<br/>probationEndDate: ".$probationEndDate;
				
				echo "<br/>qrtStrtDt: ".$qrtStrtDt;
				echo "<br/>qrtEndDt: ".$qrtEndDt;*/				
			}
			else
				$pi = $pi * 3;
			
			$weightage = 0;
			$achieved = 0;
			$total = 0;
			$sum = 0;
			if(is_array($this->goal) && count($this->goal) > 0)
			{
				foreach($this->goal as $key => $goalDetails)
				{						
					$weightage = $this->weightage[$key];
					$achieved = $this->achieved[$key];									
					$sum = ($pi * $weightage)/100;
					$sum = ($sum * $achieved)/100;
					$total += $sum;
				}	
			}
			$total = ceil($total);
			$addPIQuery = "UPDATE pi_goalMaster SET achieved_pi='".$crypt->encrypt($total)."' WHERE appID=".$this->appID;
			$dbquery = new dbquery($addPIQuery, $connid);
		}
	}
	
	/*
	 *	Function to get the achieved PI for the past quarter
	 *	This function is only to be used from generatePayroll (i.e. from prlPayrollSheet.php)
	 */
	function getPIAchievedValue($connid, $crypt, $accMon, $accYear, $userID = "", $quarterID = "")
	{
		$pi = 0;
		$isToBeAccounted = FALSE;
		if($userID == "")
			 $userID = $this->userID;
			 
		if($pi==0)
		{
			//For Mindspark center monthly PI
			$getPIQuery = "SELECT pi_amt FROM ms_center_pincentives WHERE emp_name='$userID' AND pi_month=$accMon AND pi_year=$accYear AND status='CALCULATED'";
			$dbquery = new dbquery($getPIQuery,$connid);
			$piRow = $dbquery->getrowarray();
			$pi = $piRow["pi_amt"];
		}
		
		if($quarterID == "" && $pi==0)
		{
			$quarterDetails = $this->getPrevQuarterDetails($connid, $accMon, $accYear, 'Payroll');
			$quarterID = $quarterDetails["quarterID"];
		}
		if($quarterID>0)
		{
			$qrtMon = (int)date("m", strtotime($quarterDetails["endDate"]));
			$qrtYear = (int)date("Y", strtotime($quarterDetails["endDate"]));
			
			if($accMon == 1)
				$accMon = 12;
			else
				$accMon = $accMon-1;
				
			if($qrtMon == $accMon)
			{
				if($qrtMon < 12 && $qrtYear == $accYear)
					$isToBeAccounted = TRUE;
				elseif($qrtMon == 12 && $qrtYear == ($accYear-1))
					$isToBeAccounted = TRUE;			
			}
			
			if($isToBeAccounted)
			{
				$getPIQuery = "SELECT achieved_pi FROM pi_goalMaster WHERE userID='$userID' AND quarterID=$quarterID AND status='Completed'";
				$dbquery = new dbquery($getPIQuery, $connid);
				while($piRow = $dbquery->getrowarray())
					$pi = $crypt->decrypt($piRow["achieved_pi"]);
			}
		}
					
		return $pi;
	}
	
	//Function to get employee details
	function getEmpDetailsForPICalculations($connid, $crypt, $userID="")
	{
		$arrRet = array();
		if($userID == "")
			 $userID = $this->userID;
		$empDetailsQuery = "SELECT joinDate, leftDate, performance_incentives, TIMESTAMPDIFF(DAY, ADDDATE(joinDate, probation_period_alloted), CURDATE()) AS probationperiod, ADDDATE(joinDate, probation_period_alloted) as probationEndDate FROM emp_master a, payroll_statusMaster b WHERE a.userID = b.userID AND a.userID = '$userID' LIMIT 1";
		$dbquery = new dbquery($empDetailsQuery, $connid);
		$empDetailsRow = $dbquery->getrowarray();
		$arrRet["joinDate"] = $empDetailsRow["joinDate"];
		$arrRet["leftDate"] = $empDetailsRow["leftDate"];
		$arrRet["probationperiod"] = $empDetailsRow["probationperiod"];
		$arrRet["probationEndDate"] = $empDetailsRow["probationEndDate"];
		$arrRet["pi"] = $crypt->decrypt($empDetailsRow["performance_incentives"]);
		return $arrRet;
	}

	//Function to get all SBU details
	function getAllSBUCodes($connid)
	{
		$arrRet = array();
		$getSBUCodesQuery = "SELECT srno, sbu_name FROM sbu_master";
		$dbquery = new dbquery($getSBUCodesQuery, $connid);
		while($SBUCodesRow = $dbquery->getrowarray())
		{
			$arrRet[$SBUCodesRow["srno"]] = $SBUCodesRow["sbu_name"];
		}	
		return $arrRet;		
	}
	
	//Function to set the payment status
	function setPaymentStatus($mode)
	{
		if($mode == 'delete')
		{
			$setStatus = 'Completed';
			$getStatus = 'Paid';
		}
		elseif($mode == 'generate')
		{
			$getStatus = 'Completed';
			$setStatus = 'Paid';
		}
		$query = "UPDATE pi_goalMaster SET status='$setStatus' WHERE status = '$getStatus' AND quarter_id = ".$this->quarterID;
		mysql_query($query) or die(mysql_error());
	}
	
	//Function to check if there is an incomplete past quarter
	function checkIncompleteQuarter($connid, $userID)
	{
		$incompleteQuarterAvailable = 0;
		$today = date('Y-m-d');
		
		$checkIncompleteQuery = "SELECT COUNT(*) AS total, quarterID FROM pi_goalMaster 
					WHERE (userID='$userID' OR managerID='$userID') AND status <> 'Completed'
					AND quarterID = (SELECT quarterID FROM pi_quarterDetails 
					WHERE endDate<'$today' AND active='inactive' ORDER BY quarterID desc LIMIT 1)";
		$dbquery = new dbquery($checkIncompleteQuery, $connid);
		while($checkIncompleteRow = $dbquery->getrowarray())
		{
			$cnt = $checkIncompleteRow["total"];
			if($cnt>0)
				$incompleteQuarterAvailable = $checkIncompleteRow["quarterID"];
		}
		return $incompleteQuarterAvailable;
	}
	
	//Function to get quarter Header
	function getQuarterHeader($connid, $quarterID)
	{
		$quarterHeader = '';
		$quarterDetails = $this->getQuarterDetails($connid, $quarterID);		
		$quarterHeader = date('F Y', strtotime($quarterDetails['startDate']))." - ".date('F Y', strtotime($quarterDetails['endDate']));
		return $quarterHeader;
	}
	
	//Function to check if the user is a SBU Head
	function checkIsSbuHead($connid, $reportee)
	{
		$isSbuHead = FALSE;
		$query = "SELECT COUNT(*) FROM sbu_master WHERE sbu_head='$reportee' LIMIT 1";
		$dbquery = new dbquery($query, $connid);
		while($row = $dbquery->getrowarray())
		{
			if($row['COUNT(*)'] > 0)
				$isSbuHead = TRUE;
		}	
		return $isSbuHead;
	}
	
	//Function to send mail for approval of the goals evaluation
	function sendEvaluationApprovalMail($connid, $crypt, $userID = "", $quarterID = "")
	{
		if($userID == "")
			 $userID = $this->userID;
		$detailsQuery = "SELECT firstName, lastName, adminReportingTo, emailComp, sbu_head FROM emp_master, sbu_master WHERE userID = '$userID' AND empl_sbu_id=srno";
		$dbquery = new dbquery($detailsQuery, $connid);
		$detailsRow = $dbquery->getrowarray();
		
		$fullname = ucfirst($detailsRow["firstName"])." ".ucfirst($detailsRow["lastName"]);
		$arrMailingDet = getHRpeopleList("pi_goal_settings.php","process approval");
		
		$mgr = $detailsRow["adminReportingTo"];
		$sbuhead = $detailsRow["sbu_head"];
		$mgrMail = $this->getEmail($connid, $mgr);
		$sbuheadMail = $this->getEmail($connid, $sbuhead);
		
		$quarterPeriod = $this->getQuarterHeader($connid, $quarterID);
		$link = "http://www.educationalinitiatives.com/performance_incentives/pi_goal_settings.php?q=".$crypt->encrypt($quarterID);
		$link .= "&person=".$this->encryptName($connid, $userID);
		
		$message= "Dear ".fetchFullName($sbuhead).",<br/><br/>";
		
		$message.= "The evaluation process of performance incentives for $fullname for the period $quarterPeriod has been completed.<br/><br/>";
					
		$message.= "You may now approve or reject the evaluation.<br/><br/>";
		
		$message.= "To check the details of the same you may visit the given <a href='$link'>link</a>.";
		
		$message.= "<br/><br/>Regards,<br/>".fetchFullName($mgr);
		
		$headers = "From:".$arrMailingDet["send_from"]."\r\n";
				
		//$headers .= "Cc:".$mgrMail.",".$detailsRow["emailComp"]."\r\n";
		$headers .= "Cc:".$mgrMail."\r\n";
		
		$headers .= "Bcc:".$arrMailingDet["condition_based"]."\r\n";
					
		$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
		
		$subject = $arrMailingDet["subject"];
		
		$to = $sbuheadMail;
		
		/*echo '<pre>';
		echo $to.'</br>';
		echo $headers.'</br>';
		echo $subject.'</br>';
		echo $message.'</br>';
		echo '</pre>';*/

		if(mail($to, $subject, $message, $headers))
		{
			echo "<pre><div align='Center'>Mail Sent</div></pre>";
		}	
		else
		{
			echo "<pre><div align='Center'>Mail Sending Failed</div></pre>";
		}
	}
	
	//Function to send mail for goals submission
	function sendGoalsSubmissionMail($connid, $crypt, $userID = "", $quarterID = "")
	{
		if($userID == "")
			 $userID = $this->userID;
		$detailsQuery = "SELECT firstName, lastName, adminReportingTo, emailComp FROM emp_master WHERE userID = '$userID'";
		$dbquery = new dbquery($detailsQuery, $connid);
		$detailsRow = $dbquery->getrowarray();
		
		$fullname = ucfirst($detailsRow["firstName"])." ".ucfirst($detailsRow["lastName"]);
		$arrMailingDet = getHRpeopleList("pi_goal_settings.php","goals submission");
		
		$mgr = $detailsRow["adminReportingTo"];		
		$mgrMail = $this->getEmail($connid, $mgr);
		
		$quarterPeriod = $this->getQuarterHeader($connid, $quarterID);
		$link = "http://www.educationalinitiatives.com/performance_incentives/pi_goal_settings.php?q=".$crypt->encrypt($quarterID);
		$link .= "&person=".$this->encryptName($connid, $userID);
		
		$message= "Dear ".fetchFullName($mgr).",<br/><br/>";
		
		$message.= "The goals for performance incentives process for the period $quarterPeriod have been submitted.<br/><br/>";
		
		$message.= "To check the details of the same you may visit the given <a href='$link'>link</a>.";
		
		$message.= "<br/><br/>Regards,<br/>$fullname";
		
		$headers = "From:".$arrMailingDet["send_from"]."\r\n";
				
		$headers .= "Cc:".$detailsRow["emailComp"]."\r\n";
		
		$headers .= "Bcc:".$arrMailingDet["condition_based"]."\r\n";
					
		$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
		
		$subject = $arrMailingDet["subject"];
		
		$to = $mgrMail;
		
		/*echo '<pre>';
		echo $to.'</br>';
		echo $headers.'</br>';
		echo $subject.'</br>';
		echo $message.'</br>';
		echo '</pre>';*/

		if(mail($to, $subject, $message, $headers))
		{
			echo "<pre><div align='Center'>Mail Sent</div></pre>";
		}	
		else
		{
			echo "<pre><div align='Center'>Mail Sending Failed</div></pre>";
		}
	}
	
	//Function to send mail for goals rejection
	function sendGoalsRejectionMail($connid, $crypt, $userID = "", $quarterID = "")
	{
		if($userID == "")
			 $userID = $this->userID;
		$detailsQuery = "SELECT firstName, lastName, adminReportingTo, emailComp FROM emp_master WHERE userID = '$userID'";
		$dbquery = new dbquery($detailsQuery, $connid);
		$detailsRow = $dbquery->getrowarray();
		
		$fullname = ucfirst($detailsRow["firstName"])." ".ucfirst($detailsRow["lastName"]);
		$arrMailingDet = getHRpeopleList("pi_goal_settings.php","goals rejection");
		
		$mgr = $detailsRow["adminReportingTo"];		
		$mgrMail = $this->getEmail($connid, $mgr);
		
		$quarterPeriod = $this->getQuarterHeader($connid, $quarterID);
		$link = "http://www.educationalinitiatives.com/performance_incentives/pi_goal_settings.php?q=".$crypt->encrypt($quarterID);
		$link .= "&person=".$this->encryptName($connid, $userID);
		
		$message= "Dear ".$fullname.",<br/><br/>";
		
		$message.= "The goals for performance incentives process for the period $quarterPeriod have been rejected.<br/><br/>";
		
		$message.= "To check the details of the same you may visit the given <a href='$link'>link</a>.";
		
		$message.= "<br/><br/>Regards,<br/>".fetchFullName($mgr);
		
		$headers = "From:".$arrMailingDet["send_from"]."\r\n";
				
		$headers .= "Cc:".$mgrMail."\r\n";
		
		$headers .= "Bcc:".$arrMailingDet["condition_based"]."\r\n";
					
		$headers .= "Content-type:text/html; charset=iso-8859-1\r\n";
		
		$subject = $arrMailingDet["subject"];
		
		$to = $detailsRow["emailComp"];
		
		/*echo '<pre>';
		echo $to.'</br>';
		echo $headers.'</br>';
		echo $subject.'</br>';
		echo $message.'</br>';
		echo '</pre>';*/

		if(mail($to, $subject, $message, $headers))
		{
			echo "<pre><div align='Center'>Mail Sent</div></pre>";
		}	
		else
		{
			echo "<pre><div align='Center'>Mail Sending Failed</div></pre>";
		}
	}
}
?>