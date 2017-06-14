<?php
class clsffscalculations
{
	var $userID;
	var $action;
	var $totalPaidDays;
	var $reimbursementComponent;
	var $additions;
	var $deductions;
	var $doj;
	var $dol;
	var $pfnumber;
	var $salAmount;
	var $otherAdditions;
	var $leavesEncashed;
	var $country;
	var $ctc;
	var $basicSalary;
	var $salarystructurecode;
	var $gratuityApplicable;
	var $pfApplicable;
	var $grossMonthlyAbsolute;
	var $month;
	var $year;
	var $totalDays;
	var $lta;
	var $leaveEncashment;
	var $bonus;
	var $description;
	var $ffs_id;
	var $pls_prorata;
	var $pls_taken;
	var $adjustment_id;
	var $joinMonth;
	var $joinDays;
	var $netpayable;
	var $chkadjustment;
	var $status;
	var $bonusDate;
	var $budgetAmount;
	var $isOnContract;
	var $arrApproveFFS;
	var $comments;
	function clsffscalculations()
	{
		$this->userID = "";
		$this->name = "";
		$this->action = "";
		$this->totalPaidDays = "";
		$this->salaryComponent = "";
		$this->reimbursementComponent = 0;
		$this->deductions = array();
		$this->additions = array();
		$this->salAmount = "";
		$this->leaveEncashment = 0;
		$this->country = "";
		$this->ctc = "";
		$this->basicSalary = "";
		$this->salarystructurecode = "";
		$this->gratuityApplicable = "";
		$this->pfApplicable = "";
		$this->month = "";
		$this->year = "";
		$this->totalDays = "";
		$this->lta = "";
		$this->bonus = "";
		$this->description = Array();
		$this->action = "";
		$this->ffs_id = "";
		$this->pls_prorata = 0;
		$tihs->pls_taken = 0;
		$this->adjustment_id = 0;
		$this->joinMonth = 0;
		$this->netpayable = "";
		$this->chkadjustment = array();
		$this->status = "";
		$this->bonusDate = "";
		$this->budgetAmount = "";
		$this->isOnContract = "";
		$this->arrApproveFFS = array();
		$this->arrComments = array();
		$this->comments = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsffscalculations_hdnaction"])) $this->action = $_POST["clsffscalculations_hdnaction"];
		if(isset($_POST["clsffscalculations_userID"])) $this->userID = $_POST["clsffscalculations_userID"];
		if(isset($_POST["clsffscalculations_totalPaidDays"])) $this->totalPaidDays = $_POST["clsffscalculations_totalPaidDays"];
		if(isset($_POST["clsffscalculations_leavesEncashed"])) $this->leavesEncashed = $_POST["clsffscalculations_leavesEncashed"];
		if(isset($_POST["clsffscalculations_description"])) $this->description = $_POST["clsffscalculations_description"];
		if(isset($_POST["clsffscalculations_amount"])) $this->amount = $_POST["clsffscalculations_amount"];
		if(isset($_POST["clsffscalculations_salamount"])) $this->salAmount = $_POST["clsffscalculations_salamount"];
		if(isset($_POST["clsffscalculations_reimbursement"])) $this->reimbursementComponent = $_POST["clsffscalculations_reimbursement"];
		if(isset($_POST["clsffscalculations_lta"])) $this->lta = $_POST["clsffscalculations_lta"];
		if(isset($_POST["clsffscalculations_leaveEncashment"])) $this->leaveEncashment = $_POST["clsffscalculations_leaveEncashment"];
		if(isset($_POST["clsffscalculations_bonus"])) $this->bonus = $_POST["clsffscalculations_bonus"];
		if(isset($_POST["clsffscalculations_hdnffsid"])) $this->ffs_id = $_POST["clsffscalculations_hdnffsid"];
		if(isset($_POST["clsffscalculations_chkadjustment"])) $this->chkadjustment = $_POST["clsffscalculations_chkadjustment"];
		if(isset($_POST["clsffscalculations_netpayable"])) $this->netpayable = $_POST["clsffscalculations_netpayable"];
		if(isset($_POST["clsffscalculations_bonusDate"])) $this->bonusDate = $_POST["clsffscalculations_bonusDate"];
		if(isset($_POST["clsffscalculations_comments"])) $this->comments = $_POST["clsffscalculations_comments"];
		if(isset($_POST["clsffscalculations_budgetAmount"])) $this->budgetAmount = $_POST["clsffscalculations_budgetAmount"];
		if(isset($_POST["chkApprove"])) $this->arrApproveFFS = $_POST["chkApprove"];
		if(isset($_POST["txtApprove"])) $this->arrComments = $_POST["txtApprove"];
	}
	function setgetvars()
	{
		if(isset($_GET["userID"])) $this->userID = $_GET["userID"];
		if(isset($_GET["username"])) $this->userID = $_GET["username"];
		if(isset($_GET["type"])) $this->type = $_GET["type"];
	}
	function pageFFSdetails($connid,$crypt)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action == "SaveData" || $this->action == "SendForApproval")
		{
			$this->saveData($connid,$crypt);
			$this->saveAdjustments($connid,$crypt);
			if($this->action == "SendForApproval" && $this->ffs_id >0)
			{
				$this->updateStatus($connid,$this->action,$crypt);
			}
		}
		if($this->action == "Approved-1" && $this->ffs_id > 0)
		{
			$this->updateStatus($connid,$this->action,$crypt);
		}
		if($this->action == "Approved" && $this->ffs_id > 0)
		{
			$this->updateStatus($connid,$this->action,$crypt);
		}
		if($this->action == "SaveAdjustment")
		{
			$this->saveAdjustments($connid,$crypt);
		}
		if($this->action == "DeleteAdjustment")
		{
			$this->deleteAdjustment($connid);
		}
		if($this->action == "MultiApproved-1")
		{
			$this->multiFirstApproval($connid);
		}
		if($this->action == "MultiApproved")
		{
			$this->multiSecondApproval($connid,$crypt);
		}
		if($this->action == "Pending")
		{
			$this->sendBackToAccounts($connid);
		}
		if($this->action == "MultiPending")
		{
			$this->sendMultiBackToAccounts($connid);
		}
	}
	function multiFirstApproval($connid)
	{
		if(is_array($this->arrApproveFFS) && count($this->arrApproveFFS) > 0)
		{
			foreach($this->arrApproveFFS as $key => $ffs_id)
			{
				$comments = '';
				if(isset($this->arrComments[$ffs_id]) && trim($this->arrComments[$ffs_id])!='')
					$comments = "<b>".$_SESSION["username"]."(".date("d-m-Y H:i:s")."):</b> ".$this->arrComments[$ffs_id];
				if($comments == '')
					$query = "UPDATE payroll_ffs_details SET status = 'Approved-1', modified_date = CURDATE(), modified_by = '".$_SESSION["username"]."',approver1 = '".$_SESSION["username"]."',approved1_status = 'Approved',approved1_date = CURDATE()  WHERE ffs_id = '".$ffs_id."' LIMIT 1 ";
				else
					$query = "UPDATE payroll_ffs_details SET status = 'Approved-1', modified_date = CURDATE(), modified_by = '".$_SESSION["username"]."',approver1 = '".$_SESSION["username"]."',approved1_status = 'Approved',approved1_date = CURDATE(),comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."'))  WHERE ffs_id = '".$ffs_id."' LIMIT 1 ";
				$dbquery = new dbquery($query,$connid);
			}	
		}
	}
	function multiSecondApproval($connid,$crypt)
	{
		if(is_array($this->arrApproveFFS) && count($this->arrApproveFFS) > 0)
		{
			foreach($this->arrApproveFFS as $key => $ffs_id)
			{
				$comments = '';
				if(isset($this->arrComments[$ffs_id]) && trim($this->arrComments[$ffs_id])!='')
					$comments = "<b>".$_SESSION["username"]."(".date("d-m-Y H:i:s")."):</b> ".$this->arrComments[$ffs_id];
				if($comments == '')
					$query = "UPDATE payroll_ffs_details SET status = 'Approved',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',approver2 = '".$_SESSION["username"]."',approved2_status = 'Approved',approved2_date = CURDATE()  WHERE ffs_id = '".$ffs_id."' LIMIT 1 ";
				else	
					$query = "UPDATE payroll_ffs_details SET status = 'Approved',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',approver2 = '".$_SESSION["username"]."',approved2_status = 'Approved',approved2_date = CURDATE(),comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."'))  WHERE ffs_id = '".$ffs_id."' LIMIT 1 ";
				$dbquery = new dbquery($query,$connid);
				
				//Add to cheque writing system				
				$query_ffs = "SELECT userID, netpayable, budgetAmount FROM payroll_ffs_details WHERE ffs_id = '".$ffs_id."' ";
				$dbquery_ffs = new dbquery($query_ffs,$connid);	
				$row_ffs = $dbquery_ffs->getrowarray();
				
				$query_sbu = "SELECT sbu_id FROM emp_sbu_mapping WHERE username = '".$row_ffs["userID"]."' ORDER BY effective_from DESC LIMIT 1";
				$dbquery_sbu = new dbquery($query_sbu,$connid);
				$row_sbu = $dbquery_sbu->getrowarray();
				$emp_sbu_id = $row_sbu[0];
				
				if($row_ffs["userID"]!="" && $row_ffs["netpayable"]!="" && $crypt->decrypt($row_ffs["netpayable"])>0)
				{
					$query_cm = "INSERT INTO cheques_master(type,purpose_id,userid,amount,month,year,entered_dt,entered_by) VALUES
					    		('Payee','1','".$row_ffs["userID"]."','".$crypt->decrypt($row_ffs["netpayable"])."',MONTH(CURDATE()), YEAR(CURDATE()), NOW(),'".$_SESSION['username']."')";
					$dbquery_cm = new dbquery($query_cm,$connid);
					$cheque_id = $dbquery_cm->insertid;
					
					$query_cc = "INSERT INTO cheques_costCenterDetails SET cheque_id = '".$cheque_id."',amount = '".$crypt->decrypt($row_ffs["netpayable"])."',budget_amount = '".$crypt->decrypt($row_ffs["budgetAmount"])."',head_id = '1',sub_head_id = '1',sbu_project_id = '0',sbu_id = '".$emp_sbu_id."',entered_by = '".$_SESSION['username']."',entered_date = CURDATE() ";
					$dbquery_cc = new dbquery($query_cc,$connid);
				}	
			}	
		}
	}
	function sendMultiBackToAccounts($connid)
	{
		if(is_array($this->arrApproveFFS) && count($this->arrApproveFFS) > 0)
		{
			foreach($this->arrApproveFFS as $key => $ffs_id)
			{
				$comments = '';
				if(isset($this->arrComments[$ffs_id]) && trim($this->arrComments[$ffs_id])!='')
					$comments = "<b>".$_SESSION["username"]."(".date("d-m-Y H:i:s")."):</b> ".$this->arrComments[$ffs_id];
				if($comments == '')
					$query = "UPDATE payroll_ffs_details SET status = 'Pending',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."'  WHERE ffs_id = '".$ffs_id."' LIMIT 1 ";
				else	
					$query = "UPDATE payroll_ffs_details SET status = 'Pending',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."'))  WHERE ffs_id = '".$ffs_id."' LIMIT 1 ";
				$dbquery = new dbquery($query,$connid);
			}	
		}
	}
	function sendBackToAccounts($connid)
	{		
		$comments = '';
		if(isset($this->comments) && trim($this->comments)!='')
			$comments = "<b>".$_SESSION["username"]."(".date("d-m-Y H:i:s")."):</b> ".$this->comments;
		if($comments == '')
			$query = "UPDATE payroll_ffs_details SET status = 'Pending',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."'  WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
		else	
			$query = "UPDATE payroll_ffs_details SET status = 'Pending',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."'))  WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
		$dbquery = new dbquery($query,$connid);
	}
	function updateStatus($connid,$status,$crypt)
	{
		if($status != "")
		{
			$comments = '';
			if(isset($this->comments) && trim($this->comments)!='')
				$comments = "<b>".$_SESSION["username"]."(".date("d-m-Y H:i:s").")</b>: ".$this->comments;
				
			if($status == "SendForApproval")
				$query = "UPDATE payroll_ffs_details SET status = '".$status."',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."'  WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
			if($status == "Approved-1")
			{
				if($comments == '')
					$query = "UPDATE payroll_ffs_details SET status = '".$status."',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',approver1 = '".$_SESSION["username"]."',approved1_status = 'Approved',approved1_date = CURDATE() WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
				else	
					$query = "UPDATE payroll_ffs_details SET status = '".$status."',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',approver1 = '".$_SESSION["username"]."',approved1_status = 'Approved',approved1_date = CURDATE(), comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."')) WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
			}
			else if($status == "Approved")
			{
				if($comments == '')
					$query = "UPDATE payroll_ffs_details SET status = '".$status."',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',approver2 = '".$_SESSION["username"]."',approved2_status = 'Approved',approved2_date = CURDATE() WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
				else
					$query = "UPDATE payroll_ffs_details SET status = '".$status."',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',approver2 = '".$_SESSION["username"]."',approved2_status = 'Approved',approved2_date = CURDATE(), comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."')) WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
			}
			$dbquery = new dbquery($query,$connid);
			
			if($status == "Approved")
			{
				$query = "UPDATE payroll_ffs_details SET status = 'Approved',modified_date = CURDATE(),modified_by = '".$_SESSION["username"]."',approver2 = '".$_SESSION["username"]."',approved2_status = 'Approved',approved2_date = CURDATE()  WHERE ffs_id = '".$this->ffs_id."' LIMIT 1 ";
				$dbquery = new dbquery($query,$connid);
				
				//Add to cheque writing system				
				$query_ffs = "SELECT userID, netpayable, budgetAmount FROM payroll_ffs_details WHERE ffs_id = '".$this->ffs_id."' ";
				$dbquery_ffs = new dbquery($query_ffs,$connid);	
				$row_ffs = $dbquery_ffs->getrowarray();
				
				$query_sbu = "SELECT sbu_id FROM emp_sbu_mapping WHERE username = '".$row_ffs["userID"]."' ORDER BY effective_from DESC LIMIT 1";
				$dbquery_sbu = new dbquery($query_sbu,$connid);
				$row_sbu = $dbquery_sbu->getrowarray();
				$emp_sbu_id = $row_sbu[0];
				
				if($row_ffs["userID"] != "" && $row_ffs["netpayable"] != "" && $crypt->decrypt($row_ffs["netpayable"])>0)
				{
					$query_cm = "INSERT INTO cheques_master(type,purpose_id,userid,amount,month,year,entered_dt,entered_by) VALUES
					    		('Payee','1','".$row_ffs["userID"]."','".$crypt->decrypt($row_ffs["netpayable"])."',MONTH(CURDATE()), YEAR(CURDATE()), NOW(),'".$_SESSION['username']."')";
					$dbquery_cm = new dbquery($query_cm,$connid);
					$cheque_id = $dbquery_cm->insertid;
					
					$query_cc = "INSERT INTO cheques_costCenterDetails SET cheque_id = '".$cheque_id."',amount = '".$crypt->decrypt($row_ffs["netpayable"])."',budget_amount = '".$crypt->decrypt($row_ffs["budgetAmount"])."',head_id = '1',sub_head_id = '1',sbu_project_id = '0',sbu_id = '".$emp_sbu_id."',entered_by = '".$_SESSION['username']."',entered_date = CURDATE() ";
					$dbquery_cc = new dbquery($query_cc,$connid);
				}	
			}
		}	
	}
	function saveData($connid,$crypt)
	{
		//echo "FFS".$this->ffs_id;
		$comments = '';
			if(isset($this->comments) && trim($this->comments)!='')
				$comments = "<b>".$_SESSION["username"]."(".date("d-m-Y H:i:s").")</b>: ".$this->comments;
		if($this->ffs_id > 0)
		{
			if($comments == '')
			{				
				$query = "UPDATE payroll_ffs_details SET
						totalPaidDays = '".$this->totalPaidDays."',
						salAmount = '".$crypt->encrypt($this->salAmount)."',
						reimbursement =  '".$crypt->encrypt($this->reimbursementComponent)."',
						lta ='".$crypt->encrypt($this->lta)."',
						leaveEncashment = '".$crypt->encrypt($this->leaveEncashment)."',
						bonus = '".$crypt->encrypt($this->bonus)."',
						bonus_date = '".formatDate($this->bonusDate)."',
						modified_by = '".$_SESSION["username"]."',
						netpayable = '".$crypt->encrypt($this->netpayable)."',
						budgetAmount = '".$crypt->encrypt($this->budgetAmount)."',
						modified_date = CURDATE() WHERE ffs_id = '".$this->ffs_id."' 
						";
			}
			else
			{
				$query = "UPDATE payroll_ffs_details SET
						totalPaidDays = '".$this->totalPaidDays."',
						salAmount = '".$crypt->encrypt($this->salAmount)."',
						reimbursement =  '".$crypt->encrypt($this->reimbursementComponent)."',
						lta ='".$crypt->encrypt($this->lta)."',
						leaveEncashment = '".$crypt->encrypt($this->leaveEncashment)."',
						bonus = '".$crypt->encrypt($this->bonus)."',
						bonus_date = '".formatDate($this->bonusDate)."',
						modified_by = '".$_SESSION["username"]."',
						netpayable = '".$crypt->encrypt($this->netpayable)."',
						budgetAmount = '".$crypt->encrypt($this->budgetAmount)."',
						comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."')),
						modified_date = CURDATE() WHERE ffs_id = '".$this->ffs_id."' 
						";
			}
			$dbquery = new dbquery($query,$connid);			
		}
		else
		{
			if($comments == '')
			{
				$query = "INSERT INTO payroll_ffs_details SET 
						userID = '".$this->userID."',
						totalPaidDays = '".$this->totalPaidDays."',
						salAmount = '".$crypt->encrypt($this->salAmount)."',
						reimbursement =  '".$crypt->encrypt($this->reimbursementComponent)."',
						lta ='".$crypt->encrypt($this->lta)."',
						leaveEncashment = '".$crypt->encrypt($this->leaveEncashment)."',
						bonus = '".$crypt->encrypt($this->bonus)."',
						bonus_date = '".formatDate($this->bonusDate)."',
						entered_date = CURDATE(),
						netpayable = '".$crypt->encrypt($this->netpayable)."',
						budgetAmount = '".$crypt->encrypt($this->budgetAmount)."',
						entered_by = '".$_SESSION["username"]."' ";
			}
			else
			{
				$query = "INSERT INTO payroll_ffs_details SET 
						userID = '".$this->userID."',
						totalPaidDays = '".$this->totalPaidDays."',
						salAmount = '".$crypt->encrypt($this->salAmount)."',
						reimbursement =  '".$crypt->encrypt($this->reimbursementComponent)."',
						lta ='".$crypt->encrypt($this->lta)."',
						leaveEncashment = '".$crypt->encrypt($this->leaveEncashment)."',
						bonus = '".$crypt->encrypt($this->bonus)."',
						bonus_date = '".formatDate($this->bonusDate)."',
						entered_date = CURDATE(),
						netpayable = '".$crypt->encrypt($this->netpayable)."',
						budgetAmount = '".$crypt->encrypt($this->budgetAmount)."',
						comments = IF(comments='','$comments',CONCAT_WS('<br>', comments,'".$comments."')),
						entered_by = '".$_SESSION["username"]."' ";
			}
			$dbquery = new dbquery($query,$connid);	
			$this->ffs_id = $dbquery->insertid;
		}		
	}
	function saveAdjustments($connid,$crypt)
	{
		if(is_array($this->description) && count($this->description) >0)
		{
			foreach($this->description as $type => $description)
			{
				foreach($description as $key => $value)
				{
					if($value != "")
					{
						$queryDC = "SELECT COUNT(*) FROM payroll_ffs_adjustments WHERE ffs_id = '".$this->ffs_id."' AND type = '".$type."' AND description = '".$value."' AND amount = '".$crypt->encrypt($this->amount[$type][$key])."' ";
						$dbqueryDC = new dbquery($queryDC,$connid);
						$rowDC = $dbqueryDC->getrowarray();
						if($rowDC[0] == 0)
						{
							$query = "INSERT INTO payroll_ffs_adjustments SET type='".$type."',description = '".$value."',amount = '".$crypt->encrypt($this->amount[$type][$key])."',entered_dt = CURDATE(),entered_by = '".$_SESSION["username"]."',ffs_id = '".$this->ffs_id."' ";		
							$dbquery = new dbquery($query,$connid);	
						}
					}
				}	
			}	
		}	
	}
	function deleteAdjustment($connid)
	{
		if(is_array($this->chkadjustment) && count($this->chkadjustment) >0)
		{
			foreach($this->chkadjustment as $key => $value)	
			{
				$query = "DELETE FROM payroll_ffs_adjustments WHERE id = '".$value."' LIMIT 1";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function getUserDetails($connid,$crypt)
	{
		$querySSC = "SELECT salarystructurecode FROM payroll_salaryStructureMaster ORDER BY salarystructurecode DESC LIMIT 1";
		$dbquerySSC = new dbquery($querySSC,$connid);
		$rowSSC = $dbquerySSC->getrowarray();
				
		$queryContract = "SELECT firstName,lastName,DATEDIFF(DATE_ADD(contract_leftDate, INTERVAL 1 DAY),joinDate) as total_days,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,
					DATE_FORMAT(contract_leftDate,'%d-%m-%Y') as leftDate,MONTH(contract_leftDate) as month, YEAR(contract_leftDate) as year,paymentAmount
					FROM contract_master WHERE userID = '".$this->userID."' ";
		$dbqueryContract = new dbquery($queryContract,$connid);
		$rowContract = $dbqueryContract->getrowarray();
		if($dbqueryContract->numrows() > 0)
		{
			$this->isOnContract = 1;
			$this->name = $rowContract["firstName"]." ".$rowContract["lastName"];
			$this->doj = $rowContract["joinDate"];
			$this->dol = $rowContract["leftDate"];
			$this->ctc = $rowContract["paymentAmount"];
			$this->basicSalary = $rowContract["paymentAmount"];
			$this->month = $row["month"];
			$this->year = $row["year"];
			$this->totalDays = $row["total_days"];
			$this->joinMonth = $row["joinMonth"];
			$this->joinDays = $row["joinDays"];
		}
		else
		{
			$query = "SELECT firstName,lastName,DATEDIFF(DATE_ADD(leftDate, INTERVAL 1 DAY),joinDate) as total_days,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,
					DATE_FORMAT(leftDate,'%d-%m-%Y') as leftDate,MONTH(leftDate) as month, YEAR(leftDate) as year,pfaccountno,basic,ctc,country,pfApplicable,
					gratuityApplicable,openingBalance_PL,DATEDIFF(leftDate,'".formatDate($this->bonusDate)."') as bonus_days,MONTH(joinDate) as joinMonth,DATEDIFF(CURDATE(),joinDate) as joinDays
					FROM emp_master a,payroll_statusMaster b  WHERE a.userID = b.userID AND a.userID = '".$this->userID."' UNION ";
			$query.= "SELECT firstName,lastName,DATEDIFF(DATE_ADD(leftDate, INTERVAL 1 DAY),joinDate) as total_days,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,
					DATE_FORMAT(leftDate,'%d-%m-%Y') as leftDate,MONTH(leftDate) as month, YEAR(leftDate) as year,'' as pfaccountno,'' as basic,'' as ctc,country,pfApplicable,
					gratuityApplicable,'' as openingBalance_PL,DATEDIFF(leftDate,'".formatDate($this->bonusDate)."') as bonus_days,MONTH(joinDate) as joinMonth,DATEDIFF(CURDATE(),joinDate) as joinDays
					FROM old_emp_master WHERE userID = '".$this->userID."' ";
			
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			
			$query_basic = "SELECT * FROM payroll_salaryMasterHistory WHERE userID = '".$this->userID."' ORDER BY effectivefrom DESC LIMIT 1";
			$dbquery_basic = new dbquery($query_basic,$connid);
			$row_basic = $dbquery_basic->getrowarray();
			
			$lta = 0;
				
			$this->name = $row["firstName"]." ".$row["lastName"];
			$this->doj = $row["joinDate"];
			$this->dol = $row["leftDate"];
			$this->pfnumber = $row["pfaccountno"];
			$this->ctc = $crypt->decrypt($row["ctc"]);
			$this->basicSalary = $crypt->decrypt($row["basic"]);
			$this->country = $row["country"];	
			$this->salarystructurecode = $rowSSC["salarystructurecode"];
			$this->pfApplicable = $row["pfApplicable"];
			$this->gratuityApplicable = $row["gratuityApplicable"];
			$this->grossMonthlyAbsolute = $crypt->decrypt($row["grossMonthlyAbsolute"]);
			
			if(!isset($this->basicSalary) || $this->basicSalary == "")
				$this->basicSalary = $crypt->decrypt($row_basic["basic"]);
			if(!isset($this->grossMonthlyAbsolute) || $this->grossMonthlyAbsolute == "")
				$this->grossMonthlyAbsolute = $crypt->decrypt($row_basic["grossMonthlyAbsolute"]);	
			if(!isset($this->ctc) || $this->ctc == "")
				$this->ctc = $crypt->decrypt($row_basic["ctc"]);	
			$this->month = $row["month"];
			$this->year = $row["year"];
			$this->totalDays = $row["total_days"];
			$openingBalancePL = $row["openingBalance_PL"];
			if($openingBalancePL>21)
	  				$lastYearsPL = $openingBalancePL - 21;
	  			else
	  				$lastYearsPL = 0;
			
			$totalPLForTheYear = ($openingBalancePL - 21)>0? 21:$openingBalancePL;
			$PLAvailableTillDate = getPLsAvailableTillDate($totalPLForTheYear, $row["joinMonth"], date("Y", strtotime($row["joinDate"])) ,date("m", strtotime($row["leftDate"])));
					
			$balance_PL = $lastYearsPL + $PLAvailableTillDate;
			$this->pls_prorata = $balance_PL;
			
			$leavesTaken = getLeavesTaken($this->userID,date("m",strtotime($this->dol)));
			
			$this->pls_taken = $leavesTaken["PL"];
			$this->bonus = round(2500*($row["bonus_days"]/365));
			$this->joinMonth = $row["joinMonth"];
			$this->joinDays = $row["joinDays"];
			$joinDay = date("d", strtotime($this->doj));
			$leftDay = date("d", strtotime($this->dol));
			if($this->joinMonth == $this->month && $joinDay <= $leftDay && $this->joinDays > 365)
					$lta = getLTAPayable($this->userID, formatDate($this->doj), $this->year);
			$this->lta = $lta;
		}	
	}
	function getFFSdetails($connid,$crypt)
	{
		$query = "SELECT * FROM payroll_ffs_details WHERE userID = '".$this->userID."' ORDER BY ffs_id DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($this->action != "GetData")
		{
			$this->ffs_id = $row["ffs_id"];
			$this->totalPaidDays = $row["totalPaidDays"];
			$this->leaveEncashment = $crypt->decrypt($row["leaveEncashment"]);
			$this->bonus = $crypt->decrypt($row["bonus"]);
			if($row["bonus_date"] != "" && $row["bonus_date"] != "0000-00-00")
				$this->bonusDate = formatDate($row["bonus_date"]);
			$this->salAmount = $crypt->decrypt($row["salAmount"]);
			$this->budgetAmount = $crypt->decrypt($row["budgetAmount"]);
			$this->lta = $crypt->decrypt($row["lta"]);
			$this->reimbursementComponent = $crypt->decrypt($row["reimbursement"]);
			$this->status = $row["status"];
			$this->comments = $row["comments"];
		}
	}
	function getAdjustments($connid,$crypt,$type)
	{
		$query = "SELECT * FROM payroll_ffs_adjustments WHERE type = '".$type."' AND ffs_id = '".$this->ffs_id."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getFFStoApprove($connid,$crypt,$type="")
	{
		$arrRet = array();
		if($type != "" && $type == "4ec3587292f5141d0a8b2a59bc347254")
		{
			$query = "SELECT  a.userID,firstName,lastName,desig,DATE_FORMAT(leftDate,'%d-%m-%Y') as left_date,DATE_FORMAT(joinDate,'%d-%m-%Y') as join_date,totalPaidDays,reimbursement,otherDeductions,leaveEncashment,bonus,salAmount,status,ffs_id,netpayable,a.comments as comments FROM payroll_ffs_details a,emp_master b WHERE a.userID = b.userID AND status = 'Approved-1' ";
			$query.= " UNION SELECT  c.userID,firstName,lastName,desig,DATE_FORMAT(contract_leftDate,'%d-%m-%Y') as left_date,DATE_FORMAT(joinDate,'%d-%m-%Y') as join_date,totalPaidDays,reimbursement,otherDeductions,leaveEncashment,bonus,salAmount,status,ffs_id,netpayable,c.comments as comments FROM payroll_ffs_details c,contract_master d WHERE c.userID = d.userID AND status = 'Approved-1' ";
		}
		else
		{
			$query = "SELECT  a.userID,firstName,lastName,desig,DATE_FORMAT(leftDate,'%d-%m-%Y') as left_date,DATE_FORMAT(joinDate,'%d-%m-%Y') as join_date,totalPaidDays,reimbursement,otherDeductions,leaveEncashment,bonus,salAmount,status,ffs_id,netpayable,a.comments as comments FROM payroll_ffs_details a,emp_master b WHERE a.userID = b.userID AND status = 'SendForApproval' AND adminReportingTo = '".$_SESSION["username"]."' ";
			$query.= " UNION SELECT  c.userID,firstName,lastName,desig,DATE_FORMAT(contract_leftDate,'%d-%m-%Y') as left_date,DATE_FORMAT(joinDate,'%d-%m-%Y') as join_date,totalPaidDays,reimbursement,otherDeductions,leaveEncashment,bonus,salAmount,status,ffs_id,netpayable,c.comments as comments FROM payroll_ffs_details c,contract_master d WHERE c.userID = d.userID AND status = 'SendForApproval' AND adminReportingTo = '".$_SESSION["username"]."' ";
		}
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["userID"]] = array("firstName"=>$row["firstName"],
											"lastName"=>$row["lastName"],
											"left_date"=>$row["left_date"],
											"join_date"=>$row["join_date"],
											"desig"=>$row["desig"],
											"status"=>$row["status"],
											"totalPaidDays"=>$row["totalPaidDays"],
											"reimbursement"=>$crypt->decrypt($row["reimbursement"]),
											"otherDeductions"=>$crypt->decrypt($row["otherDeductions"]),
											"leaveEncashment"=>$crypt->decrypt($row["leaveEncashment"]),
											"bonus"=>$crypt->decrypt($row["bonus"]),
											"salAmount"=>$crypt->decrypt($row["salAmount"]),
											"netpayable"=>$crypt->decrypt($row["netpayable"]),
											"status"=>$row["status"],
											"comments"=>$row["comments"],
											"ffs_id"=>$row["ffs_id"]
											);
		}
		return $arrRet;
	}
	function getWaiveOffDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM emp_resignation_details WHERE userID = '".$this->userID."' ORDER BY id DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$arrRet["waiveOffPL"] = $row["waiveOffPL"];
		$arrRet["waiveOffNoticePay"] = $row["waiveOffNoticePay"];
		$arrRet["waiveOffNoticePayStatus"] = $row["waiveOffNoticePayStatus"];
		$arrRet["waiveOffNone"] = $row["waiveOffNone"];
		$arrRet["waiveOffNoneReason"] = $row["waiveOffNoneReason"];
		$arrRet["waiveOffNoneStatus"] = $row["waiveOffNoneStatus"];
		$arrRet["waiveOffStatus_date"] = $row["waiveOffStatus_date"];
		return $arrRet;
	} 
}
?>