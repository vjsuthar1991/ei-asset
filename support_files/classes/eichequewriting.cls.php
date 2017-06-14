<?php
class clschequewriting
{
        var $cheque_id;
        var $cheque_date;
        var $cheque_no;
        var $number;
        var $date;
        var $partyname;
        var $partyid;
        var $payto;
        var $type;
        var $amount;
        var $entered_by;
        var $entered_dt;
        var $modified_by;
        var $modified_dt;
        var $eiaccount_number;
        var $getnumber;
        var $getaccountnumber;
        var $action;
        var $purposeid;
        var $start_date;
        var $end_date;
        var $removeFromList;
        var $comments;
        var $school_code;
        var $setschoolname;
        var $keyword;
        var $searchChequeNo;
        var $mode;
        var $status;
		var $bankname;
		var $chequemode;
		var $urgentcheques;
		var $uapprovedids;
		var $debitdate;
		var $srchdebitdate;
		var $sbu;
		var $sbu_project;
		var $group;
		var $subgroup;
		var $projectConsider;
		var $projectid;
		var $budget_amount;
		var $partyPAN;
		var $totalTDS;
        function clschequewriting()
        {
                $this->action = "";
                $this->cheque_id = "";
                $this->cheque_date = "";
                $this->cheque_no = "";
                $this->number = "";
                $this->date = "";
                $this->partyname = "";
                $this->type = "";
                $this->amount = "";
                $this->entered_by = "";
                $this->entered_dt = "";
                $this->modified_by = "";
                $this->modified_dt = "";
                $this->eiaccount_number = "";
                $this->getnumber = "";
                $this->getaccountnumber = "";
                $this->purposeid = "";
                $this->partyid = "";
                $this->payto = "";
                $this->start_date = "0000-00-00 00:00:00";
                $this->end_date = "0000-00-00 00:00:00";
                $this->removeFromList = "";
                $this->comments = "";
                $this->school_code = "";
                $this->setschoolname = "";
                $this->keyword = "";
                $this->searchChequeNo = "";
                $this->mode = "";
                $this->status = '0';
				$this->bankname = "";
				$this->chequemode = "";
				$this->urgentcheques = "";
				$this->uapprovedids = "";
				$this->debitdate = "0000-00-00";
				$this->srchdebitdate = "";
				$this->sbu = "";
				$this->sbu_project = "";
				$this->group = "";
				$this->subgroup = "";
				$this->projectConsider = "";
				$this->projectid = "0";
				$this->budget_amount = "";
				$this->partyPAN = "";
				$this->totalTDS = "";
        }
        function setpostvars()
        {
                if(isset($_POST["MakeCheque"])) $this->cheque_id = $_POST["MakeCheque"];
                if(isset($_POST["clschequewriting_action"])) $this->action = $_POST["clschequewriting_action"];
                if(isset($_POST["clschequewriting_chequedate"])) $this->cheque_date = $_POST["clschequewriting_chequedate"];
                if(isset($_POST["clschequewriting_chequeno"])) $this->cheque_no = $_POST["clschequewriting_chequeno"];
                if(isset($_POST["clschequewriting_accountno"])) $this->eiaccount_number = $_POST["clschequewriting_accountno"];
                if(isset($_POST["clschequewriting_number"])) $this->number = $_POST["clschequewriting_number"];
                if(isset($_POST["clschequewriting_date"])) $this->date = $_POST["clschequewriting_date"];
                if(isset($_POST["clschequewriting_partyname"])) $this->partyname = $_POST["clschequewriting_partyname"];
                if(isset($_POST["clschequewriting_chequeamount"])) $this->amount = $_POST["clschequewriting_chequeamount"];
                if(isset($_POST["clschequewriting_type"])) $this->type = $_POST["clschequewriting_type"];
                if(isset($_POST["clschequewriting_purpose"])) $this->purposeid = $_POST["clschequewriting_purpose"];
                if(isset($_POST["clschequewriting_searchstartdate"])) $this->start_date = $_POST["clschequewriting_searchstartdate"];
                if(isset($_POST["clschequewriting_searchenddate"])) $this->end_date = $_POST["clschequewriting_searchenddate"];
                if(isset($_POST["RemoveFromList"])) $this->removeFromList = $_POST["RemoveFromList"];
                if(isset($_POST["clschequewriting_hdnpartyid"])) $this->partyid = $_POST["clschequewriting_hdnpartyid"];
                if(isset($_POST["clschequewriting_comments"])) $this->comments = $_POST["clschequewriting_comments"];
                if(isset($_POST["clschequewriting_payto"])) $this->payto = $_POST["clschequewriting_payto"];
                if(isset($_POST["clschequewriting_schoolcode"])) $this->school_code = $_POST["clschequewriting_schoolcode"];
                if(isset($_POST["clschequewriting_setschoolname"])) $this->setschoolname = $_POST["clschequewriting_setschoolname"];
				if(isset($_POST["clschequewriting_keyword"])) $this->keyword = $_POST["clschequewriting_keyword"];
				if(isset($_POST["clschequewriting_searchchequeno"])) $this->searchChequeNo = $_POST["clschequewriting_searchchequeno"];
				if(isset($_POST["clschequewriting_status"])) $this->status = $_POST["clschequewriting_status"];
				if(isset($_POST["CancelCheque"])) $this->cheque_id = $_POST["CancelCheque"];
				if(isset($_POST["clschequewriting_bankname"]) && $this->bankname == "") $this->bankname = $_POST["clschequewriting_bankname"];
				if(isset($_POST["clschequewriting_chequemode"])) $this->chequemode = $_POST["clschequewriting_chequemode"];
				if(isset($_POST["UrgentCheques"])) $this->urgentcheques = $_POST["UrgentCheques"];
				if(isset($_POST["clschequewriting_uapprovedids"])) $this->uapprovedids = $_POST["clschequewriting_uapprovedids"];
				if(isset($_POST["clschequewriting_debitdate"])) $this->debitdate = $_POST["clschequewriting_debitdate"];
				if(isset($_POST["clschequewriting_srchdebitdate"])) $this->srchdebitdate = $_POST["clschequewriting_srchdebitdate"];
				if(isset($_POST["selSBU"])) $this->sbu = $_POST["selSBU"];
				if(isset($_POST["selProject"])) $this->sbuproject = $_POST["selProject"];
				if(isset($_POST["selGroup"])) $this->group = $_POST["selGroup"];
				if(isset($_POST["selSubGroup"])) $this->subgroup = $_POST["selSubGroup"];
				if(isset($_POST["clschequewriting_projectconsider"])) $this->projectConsider = $_POST["clschequewriting_projectconsider"];
				if(isset($_POST["clschequewriting_budgetamount"])) $this->budget_amount = $_POST["clschequewriting_budgetamount"];
				if(isset($_POST["clschequewriting_hdnpartyPAN"])) $this->partyPAN = $_POST["clschequewriting_hdnpartyPAN"];
				if(isset($_POST["clschequewriting_hdnTotalTds"])) $this->totalTDS = $_POST["clschequewriting_hdnTotalTds"];
                //print_r($_POST);
                //echo "Ei Account Number:".$this->eiaccount_number;
        }
        function setgetvars()
        {
                if(isset($_GET["cheque_no"])) $this->getnumber = $_GET["cheque_no"];
                if(isset($_GET["account_no"])) $this->getaccountnumber = $_GET["account_no"];
                if(isset($_GET["payto"])) $this->payto = $_GET["payto"];
                if(isset($_GET["mode"])) $this->mode = $_GET["mode"];
				if(isset($_GET["bank"])) $this->bankname = $_GET["bank"];
				if(isset($_GET["project_consider"])) $this->projectConsider = $_GET["project_consider"];
				if(isset($_GET["projectid"])) $this->projectid = $_GET["projectid"];
        }
        function getThirdPartyCheques($connid,$flag="")
        {
                $ts = time();
				# figure out what 7 days is in seconds
				$one_day = 1 * 24 * 60 * 60;
				# make last weeks date based on a past timestamp
				$tomorrow = date( "d-m-Y", ( $ts + $one_day ) );
        		$arrRet = array();
				if($flag != "")
					$condition = " AND bankno >0 AND nameAsPerBank != '' AND bankAccntNo != '' AND ifscCode != '' ";

				$arrAdjustedBills = $this->getBillAdjustedAmount($connid);
                $query = "SELECT bill_master.partyid,partyname,GROUP_CONCAT(DISTINCT bill_master.billid) as billstr,bill_partyMaster.PAN,bill_master.payto,bill_partyMaster.bankno,bankAccntNo,nameAsPerBank,branchAddress,branchName,accountType,ifscCode,micrCode,SUM(tdsamount) as total_tds FROM bill_master,bill_partyMaster,budget_costCenterDetails c
                          WHERE bill_master.partyid = bill_partyMaster.partyid AND bill_master.billid = c.code AND c.category = 'bill' AND bill_master.approved2_by <> '' AND cheque_no = '' AND cheque_date = '0000-00-00'  AND status = 'Approved-2' AND sbu_project_id != '6' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND netpayable > 0 ".$condition." GROUP BY bill_master.payto ORDER BY payto";
                //echo $query;
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $total_amount = 0;
                        if($row["billstr"] != "")
                		$total_amount = $this->getNetPayable($connid,$row["billstr"]);
                		if(isset($arrAdjustedBills[$row["payto"]]) && $arrAdjustedBills[$row["payto"]] > 0)
						{
							$netpayable = $total_amount - $arrAdjustedBills[$row["payto"]];
						}
						else
						{
							$netpayable = $total_amount;
						}
						
						$pan = $row["PAN"];
						if(($flag == "NEFT" && $netpayable < "200000" && $row["bankno"] != 18) || ($flag == "RGTS" && $netpayable >= "200000" && $row["bankno"] != 18) || $flag == "")
						$arrRet[$row["payto"]] = array( "payto"=>$row["payto"],
                        								"partyid"=>$row["partyid"],
                                                        "partyname"=>$row["partyname"],
														"PAN"=>$pan,
                                                        "bankno"=>$row["bankno"],
                                                        "bankAccntNo"=>$row["bankAccntNo"],
                                                        "nameAsPerBank"=>$row["nameAsPerBank"],
                                                        "branchName"=>$row["branchName"],
                                                        "ifscCode"=>$row["ifscCode"],
                                                        "micrCode"=>$row["micrCode"],
														"tdsamount"=>$row["total_tds"],
                                                        "billamount"=>$netpayable
                                                                                );
                }
                return $arrRet;
        }
        function getNetPayable($connid,$billstr)
        {
        	$query = "SELECT SUM(netpayable) as total_amount FROM bill_master WHERE billid IN (".$billstr.") ";
        	$dbquery = new dbquery($query,$connid);
        	$row = $dbquery->getrowarray();
        	return $row["total_amount"];
        }
		function getHPbills($connid)
		{
			$arrRet = array();
			$arrAdjustedBills = $this->getBillAdjustedAmount($connid);
			$query = "SELECT payto,SUM(netpayable) as total_amount,c.partyid,partyname FROM bill_master a,budget_costCenterDetails b,bill_partyMaster c WHERE a.billid = b.code AND a.partyid = c.partyid AND category = 'bill' AND a.approved2_by <> '' AND cheque_no = '' AND cheque_date = '0000-00-00'  AND status != 'Paid' AND sbu_project_id = '6' AND netpayable > 0 GROUP BY a.payto ORDER BY payto";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
                if(isset($arrAdjustedBills[$row["payto"]]) && $arrAdjustedBills[$row["payto"]] > 0)
				{
					$netpayable = $row["total_amount"] - $arrAdjustedBills[$row["payto"]];
				}
				else
				{
					$netpayable = $row["total_amount"];
				}
				$payto = $row["payto"]."-HP";
				$arrRet[$row["payto"]] = array( "payto"=>$row["payto"],
                								"partyid"=>$row["partyid"],
                                                "partyname"=>$row["partyname"],
                                                "billamount"=>$netpayable
                                            	);
			}
			return $arrRet;
		}
        function getReimbursementLocal($connid,$bank="ICICI Bank",$category="employee",$projectConsider="")
        {
                $arrRet = array();
				$arrFullname = $this->getFullName($connid);
				$advanceTotalAmount = 0;

				if(strtolower($bank) == "icici bank")
					$bankno = "9";
				else
					$bankno = "18";

				$arrLocalAdvanceAdjustment = $this->advanceAdjustmentAgainstExpenses($connid,"L");
				if($projectConsider == "1")
					$condition = " AND projectConsider = 6 " ;
				else
					$condition = " AND projectConsider != 6 " ;
                if($category == "employee")
				{
					$query = "SELECT name,sum(checked_amount) as scm FROM local_expense_details,local_expense_items,payroll_statusMaster,emp_master WHERE local_expense_details.tour_no = local_expense_items.tour_no AND local_expense_details.name = payroll_statusMaster.userID AND local_expense_details.name = emp_master.userID AND leftDate IS NULL AND cheque_no = '' AND checked_amount != '' AND tour_status = 'checked' AND payment_sent_date = '0000-00-00' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND reimbursement_accountWithBank = '".$bank."' ".$condition." GROUP BY name ";
					$query.= "UNION SELECT name,sum(checked_amount) as scm FROM local_expense_details,local_expense_items,contract_master WHERE local_expense_details.tour_no = local_expense_items.tour_no AND local_expense_details.name = contract_master.userID AND contract_leftDate IS NULL AND cheque_no = '' AND checked_amount != '' AND tour_status = 'checked' AND payment_sent_date = '0000-00-00' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND bankno = '".$bankno."' ".$condition." GROUP BY name ";
				}
				elseif ($category == "guest_login")
				{
					$query = "SELECT name,sum(checked_amount) as scm
							  FROM local_expense_details,local_expense_items
							  WHERE local_expense_details.tour_no = local_expense_items.tour_no 
							  AND cheque_no = ''
	                          AND checked_amount != ''
	                          AND tour_status = 'checked'
	                          AND payment_sent_date = '0000-00-00'
							  AND name IN (SELECT name FROM guest_login UNION SELECT userID FROM contract_master WHERE bankno NOT IN (9,18))
							  AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition."
							  GROUP BY name";
				}
				else
				{
					$query = "SELECT name,sum(checked_amount) as scm
							  FROM local_expense_details,local_expense_items
							  WHERE local_expense_details.tour_no = local_expense_items.tour_no AND cheque_no = ''
	                          AND checked_amount != ''
	                          AND tour_status = 'checked'
	                          AND payment_sent_date = '0000-00-00'
							  AND name IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO' OR category = 'EA'))
							  AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition."
							  GROUP BY name";
				}
				
                $dbquery = new dbquery($query,$connid);
                $arrLocalDetails = $this->getLocalReimbursementDetails($connid,$bank,$category,$projectConsider);
                while($row = $dbquery->getrowarray())
                {
                        $message = "";
						$comments = "";
						$checked_amount = 0;
						$advanceTotalAmount = 0;
                        $arrName = $arrLocalDetails[$row["name"]];
						$fullname = $arrFullname[$row["name"]]["fullname"];
                        if(is_array($arrName) && count($arrName) >0)
						{

							foreach($arrName as $tourno)
							{
								$message.="<tr><td>Local</td><td>&nbsp;</td><td>".$tourno["tour_no"]."</td><td>".round($tourno["claimedamt"])."</td><td>".$tourno["chkdamount"]."</td><td>".round($tourno["claimedamt"]-$tourno["chkdamount"])."</td><td>".$tourno["comments"]."</td></tr>";
								$checked_amount = $checked_amount + $tourno["chkdamount"];
								$queryAdvance = "SELECT sum(amount) FROM advance_adjustment_details WHERE type = 'L' AND code = '".$tourno["tour_no"]."'";
								$dbqueryAdvance = new dbquery($queryAdvance,$connid);
								$rowAdvance = $dbqueryAdvance->getrowarray();
								$checked_amount = $checked_amount - $rowAdvance[0];
								for($i = 0;$i<count($arrLocalAdvanceAdjustment[$tourno["tour_no"]]);$i++)
								{
									//echo $arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["advance_id"];
									$message.="<tr><td>Advance ID ".$arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["advance_id"]." Adjustment aga this Local Exp</td><td>&nbsp;</td><td>--</td><td>--</td><td>".($arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["totalamt"])*(-1)."</td><td>--</td><td>--</td></tr>";
									$advanceTotalAmount = $advanceTotalAmount + $arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["totalamt"];
								}
							}


						}
						else
						{
							$checked_amount = $row["scm"];
						}
                                //$checked_amount = $checked_amount - $advanceTotalAmount;
								 $arrRet[$row["name"]] = array( "name"=>$row["name"],
                        							   "amount"=>$checked_amount,
													   "message"=>$message,
													   "fullname"=>$fullname
													   );
                }
                return $arrRet;
        }
        function getLocalReimbursementDetails($connid,$bank,$category,$projectConsider="")
		{
			$arrRet = array();
			$this->Crypt = new Crypt();
			$arrCommunication = $this->getLocalCommunicationDetails($connid,$bank,$category);
			if($projectConsider == "1")
					$condition = " AND projectConsider = 6 " ;
				else
					$condition = " AND projectConsider != 6 " ;
			if($category == "employee")
			{
				$query = "SELECT name,local_expense_details.tour_no as tour_no,start_date,end_date,sum(amount) as claimedamt,sum(checked_amount) as chkdamount,communication,
						completion_date,DATEDIFF(completion_date,start_date) as daydiff,comments,penalty_removed_reason
						FROM  local_expense_details,local_expense_items,payroll_statusMaster
						WHERE local_expense_details.tour_no = local_expense_items.tour_no AND local_expense_details.name = payroll_statusMaster.userID
						AND cheque_no = ''
						AND checked_amount != ''
						AND tour_status = 'checked'
						AND payment_sent_date = '0000-00-00'
						AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."'
						AND reimbursement_accountWithBank = '".$bank."' ".$condition." GROUP BY local_expense_details.tour_no ";
				$query.= " UNION SELECT name,local_expense_details.tour_no as tour_no,start_date,end_date,sum(amount) as claimedamt,sum(checked_amount) as chkdamount,'' as communication,
	                        completion_date,DATEDIFF(completion_date,start_date) as daydiff,comments,penalty_removed_reason
	                        FROM local_expense_details,local_expense_items
							WHERE local_expense_details.tour_no = local_expense_items.tour_no 
							AND cheque_no = ''
	                        AND checked_amount != ''
	                        AND tour_status = 'checked'
	                        AND payment_sent_date = '0000-00-00'
							AND name IN (SELECT name FROM guest_login UNION SELECT userID FROM contract_master WHERE bankno IN (9,18))
	                        AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition."
	                        GROUP BY local_expense_details.tour_no ";

			}
			else if($category == "guest_login")
			{
				$query = "SELECT name,local_expense_details.tour_no as tour_no,start_date,end_date,sum(amount) as claimedamt,sum(checked_amount) as chkdamount,
	                        completion_date,DATEDIFF(completion_date,start_date) as daydiff,comments,penalty_removed_reason
	                        FROM  local_expense_details,local_expense_items
							WHERE local_expense_details.tour_no = local_expense_items.tour_no 
							AND cheque_no = ''
	                        AND checked_amount != ''
	                        AND tour_status = 'checked'
	                        AND payment_sent_date = '0000-00-00'
							AND name IN (SELECT name FROM guest_login UNION SELECT userID FROM contract_master WHERE bankno NOT IN (9,18))
	                        AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition."
	                        GROUP BY local_expense_details.tour_no ";
			}
			else
			{
				$query = "SELECT name,local_expense_details.tour_no as tour_no,start_date,end_date,sum(amount) as claimedamt,sum(checked_amount) as chkdamount,
	                        completion_date,DATEDIFF(completion_date,start_date) as daydiff,comments,penalty_removed_reason
	                        FROM  local_expense_details,local_expense_items
							WHERE local_expense_details.tour_no = local_expense_items.tour_no 
							AND cheque_no = ''
	                        AND checked_amount != ''
	                        AND tour_status = 'checked'
	                        AND payment_sent_date = '0000-00-00'
							AND name IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO' OR category = 'EA'))
	                        AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition."
	                        GROUP BY local_expense_details.tour_no ";
			}
			//echo $query;
			$dbquery = new dbquery($query,$connid);

			while($row = $dbquery->getrowarray())
			{
				$amountCommunication = $this->Crypt->decrypt($row['communication']);
				$total_checked = 0;
				$total_checked_com = 0;
				$penalty_removed_reason = $row["penalty_removed_reason"];
				if($row["chkdamount"] != "")
					$total_checked = $row["chkdamount"];
				if($arrCommunication[$row["name"]][$row["tour_no"]] != "")
					$total_checked_com = $arrCommunication[$row["name"]][$row["tour_no"]];

				$delay_days = $row["daydiff"];

				if($amountCommunication > 0 )
					$totalFinalAmo = $total_checked - $total_checked_com;
				else
					$totalFinalAmo = $total_checked;

				$start_date_for_count = $row["start_date"];
				$days_in_month = cal_days_in_month(
				CAL_GREGORIAN,
				date('m',strtotime($row["start_date"])),
				date('Y',strtotime($row["start_date"]))
				);
				/* we can to count delay month ens + 10 day = 30 + 10 = 40 , penaly sud start from 40+  */
				$need_apply_penalty =  ( ($delay_days - $days_in_month - 9) >= 1) ? 1 : 0;  // 51-30[31,28 ..etc]-09
				if($need_apply_penalty and ($this->greaterDate($start_date_for_count,'2009-06-30') ) and empty($penalty_removed_reason))
				{
					$delay_days = ($delay_days - $days_in_month); // if there is delay after 30+10 days , slabs are include with relax 10 day , so just remove month days
					$penalty_amo = $this->getPenalty($totalFinalAmo,intval($delay_days));
				}
				else
					$penalty_amo = 0;

				$checked_after_penalty_amo = $totalFinalAmo - $penalty_amo;
				if($amountCommunication > 0)
                                   $checked_after_penalty_amo = $checked_after_penalty_amo + $total_checked_com;

				$arrRet[$row["name"]][$row["tour_no"]] = array("tour_no"=>$row["tour_no"],
												 "name"=>$row["name"],
												 "start_date"=>$row["start_date"],
												 "end_date"=>$row["end_date"],
												 "completion_date"=>$row["completion_date"],
												 "claimedamt"=>$row["claimedamt"],
												 "comments"=>$row["comments"],
												 "chkdamount"=>$checked_after_penalty_amo
				);
			}
			/*echo "<pre>";
			print_r($arrRet);
			echo "</pre>";*/
			return $arrRet;
		}
		function getLocalCommunicationDetails($connid,$bank,$category)
		{
			$arrRet = array();
			if($category == "employee")
			{
				$query = "SELECT name,local_expense_details.tour_no as tour_no,start_date,end_date,sum(amount) as claimedamt,sum(checked_amount) as chkdamount,communication,
						completion_date,DATEDIFF(completion_date,start_date) as daydiff
						FROM  local_expense_details,local_expense_items,payroll_statusMaster
						WHERE local_expense_details.tour_no = local_expense_items.tour_no AND local_expense_details.name = payroll_statusMaster.userID
						AND cheque_no = ''
						AND checked_amount != ''
						AND tour_status = 'checked'
						AND payment_sent_date = '0000-00-00'
						AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."'
						AND (item_type = 'ph' OR item_type = 'net')
						AND reimbursement_accountWithBank = '".$bank."' GROUP BY local_expense_details.tour_no ";
			}
			elseif ($category == "guest_login")
			{
				$query = "SELECT name,local_expense_details.tour_no as tour_no,start_date,end_date,sum(amount) as claimedamt,sum(checked_amount) as chkdamount,
	                        completion_date,DATEDIFF(completion_date,start_date) as daydiff,comments
	                        FROM  local_expense_details,local_expense_items
							WHERE local_expense_details.tour_no = local_expense_items.tour_no 
							AND cheque_no = ''
	                        AND checked_amount != ''
	                        AND tour_status = 'checked'
	                        AND payment_sent_date = '0000-00-00'
	                        AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."'
	                        AND (item_type = 'ph' OR item_type = 'net')
							AND name IN (SELECT name FROM guest_login UNION SELECT userID FROM contract_master WHERE bankno NOT IN (9,18))
	                        GROUP BY local_expense_details.tour_no ";
			}
			else
			{
				$query = "SELECT name,local_expense_details.tour_no as tour_no,start_date,end_date,sum(amount) as claimedamt,sum(checked_amount) as chkdamount,
	                        completion_date,DATEDIFF(completion_date,start_date) as daydiff,comments
	                        FROM  local_expense_details,local_expense_items
							WHERE local_expense_details.tour_no = local_expense_items.tour_no 
							AND cheque_no = ''
	                        AND checked_amount != ''
	                        AND tour_status = 'checked'
	                        AND payment_sent_date = '0000-00-00'
	                        AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."'
	                        AND (item_type = 'ph' OR item_type = 'net')
							AND name IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO' OR category = 'EA'))
	                        GROUP BY local_expense_details.tour_no ";
			}
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["name"]][$row["tour_no"]] = $row["chkdamount"];
			}
			return $arrRet;
		}
        function getSalaryWithAccNoCheques($connid)
        {
                $arrRet = array();
                $query = "";
        }
        function pageAddCheques($connid,$crypt)
        {
                $this->setpostvars();
                $this->setgetvars();

                if($this->action == "MakeCheque")
                {
                    $this->saveChequeDetails($connid,$crypt);
                }
                if($this->action == "SaveData")
                {
                    $this->savedata($connid);
                }
                if($this->action == "PrintTransferLetter")
                {
                	$this->OmitUserforReimbursement($connid);
                }
				if($this->action == "PrintIncentiveTransferLetter")
                {
                	$this->OmitUserForTourOrGeneralAdvance($connid);
                }
                if($this->action == "cancelCheque")
                {
                	$this->cancelCheques($connid);
                }
				if($this->action == "saveDebitDate")
				{
					$this->saveDebitDate($connid);
				}
        }
		function getTicketDetailsNotPaidByTourist($connid,$tour_no,$name)
		{
			$arrRet = array();
			$query = "SELECT ticket_code,source,destination,travel_reason,paid_by,name FROM tour_expense_master a,tour_expense_items b,ticket_details c WHERE a.tour_no = b.tour_master_tour_no AND b.ticket_code = c.code AND tour_master_tour_no = '".$tour_no."' AND item_type = 'fare' AND paid_by = '".$name."' ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$str = "You have booked ticket from ".$row["source"]." to ".$row["destination"]." of <b>".ucfirst($row["name"])."</b>. We are making the payment against the same ";
				$arrRet[$row["ticket_code"]] = $str;
			}
			return $arrRet;
		}
        function saveChequeDetails($connid,$crypt)
        {
        		$ts = time();
				# figure out what 7 days is in seconds
				$one_day = 1 * 24 * 60 * 60;
				# make last weeks date based on a past timestamp
				$tomorrow = date( "d-m-Y", ( $ts + $one_day ) );
				$this->entered_by = $_SESSION["username"];
				
                $arrGuestTours = $this->getReimbursementTours($connid,"guest_login");
                $arrGuestLocal = $this->getReimbursementLocal($connid,"","guest_login");
                $arrGuestTrKeys = array_keys($arrGuestTours);
                $arrGuestLclKeys = array_keys($arrGuestLocal);
				if($arrGuestTrKeys == null)
					$arrGuestTrKeys = array();
				if($arrGuestLclKeys == null)
					$arrGuestLclKeys = array();
                $arrGuestCombined = array_merge($arrGuestTrKeys,$arrGuestLclKeys);
                $arrGuestToursKeys = array_unique($arrGuestCombined);
                /*echo "<pre>";
                print_r($arrGuestToursKeys);
                echo "</pre>";*/
				$arrScoDcoTours = $this->getReimbursementTours($connid,'scodcoea');
				$arrScoDcoLocal = $this->getReimbursementLocal($connid,'','scodcoea');
				//print_r($arrScoDcoLocal);
				$arrScoDcoLocalKeys = array_keys($arrScoDcoLocal);
				$arrScoDcoToursKeys = array_keys($arrScoDcoTours);
                $arrScoDcoAdvanceCheques = $this->getScoDcoTourAdvanceCheques($connid);
				$arrScoDcoAdvanceChequesKeys = array_keys($arrScoDcoAdvanceCheques);
                $arrSchoolsRefund = $this->getSchoolsForRefund($connid,"F");
                $arrSchoolsRefundKeys = array_keys($arrSchoolsRefund);
                $arrAdvanceTours = $this->getTourAdvanceCheques($connid);
                $arrAdvanceToursKeys = array_keys($arrAdvanceTours);
				$arrHpAdvanceTours = $this->getTourAdvanceCheques($connid,"ICICI Bank","employee","1");
                $arrHpAdvanceToursKeys = array_keys($arrHpAdvanceTours);
                $arrPendingCheques = $this->getPendingCheques($connid);
                $arrPendingChequesKeys = array_keys($arrPendingCheques);
				$arrTdsCheques = $this->getTdsChequesFromBills($connid,$crypt);
				$arrTdsChequesKeys = array_keys($arrTdsCheques);
				$arrHPbillsPayto = $this->getHPbills($connid);
				/*$time_check = "AND ( 
								(approval3_status = 'Approved' AND ( DATE(approval3_date) < CURDATE() OR (HOUR(approval3_date) < '10' AND DATE(approval3_date) = CURDATE() )) ) 
						 		OR (approval2_status = 'Approved' AND approval3_date IS NULL AND ( DATE(approval2_date) < CURDATE() OR (HOUR(approval2_date) < '10' AND DATE(approval2_date) = CURDATE() )) ) 
						 		OR (approval1_status = 'Approved' AND approval2_date IS NULL AND ( DATE(updated_date) < CURDATE() OR (HOUR(updated_date) < '10' AND DATE(updated_date) = CURDATE() )) )
							)";*/
				$time_check = " AND ((DATE(tour_advance.lastModified) < CURDATE()) OR (HOUR(tour_advance.lastModified) < '10'))";
                //print_r($arrPendingChequesKeys);
                //print_r($this->cheque_id);
                if(is_array($this->cheque_id) && count($this->cheque_id) > 0)
                {
                        //$arrPartyId = array_keys($this->cheque_no);
						foreach($this->cheque_id as $chqdtl)
                        {
								if($this->validation($connid,$this->cheque_no[$chqdtl]))
                                {
                                	if($chqdtl == "reimbursement")
	                                {
	                                        //echo "Cheque Date".$chqdtl;
	                                        //echo "Account Number".$this->eiaccount_number[$chqdtl];
											
											$this->sendAutoMailer($connid,$this->cheque_no[$chqdtl],"ICICI bank");

	                                        $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);

	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."',
	                                                                   '".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_expense_master SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                                $dbquery1 = new dbquery($query1,$connid);
	                                        
                                                $query2 = "UPDATE local_expense_details SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                                $dbquery2 = new dbquery($query2,$connid);

                                                $query3 = "UPDATE tour_advance SET cheque_id  = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status = 'Paid' WHERE status = 'Approved' AND cheque_no = '0' AND  cheque_date = '0000-00-00' AND sbuproject_id != '6' ".$time_check." AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
                                                
                                                
                                                $dbquery3 = new dbquery($query3,$connid);
                                            //date : 17-08-2009 Comments : Following queries are added to update the records with comments who have left the company but have pending claims.
                                                
                                                $query4 = "UPDATE tour_expense_master,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE tour_expense_master.name = emp_master.userID AND leftDate IS NOT NULL AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                                $dbquery4 = new dbquery($query4,$connid);
                                            
                                                $query5 = "UPDATE local_expense_details,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE local_expense_details.name = emp_master.userID AND leftDate IS NOT NULL AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                            
                                                $dbquery5 = new dbquery($query5,$connid);

                                            $query6 = "UPDATE tour_payment_details,tour_expense_master SET status = 'paid', tour_payment_details.cheque_id = '".$chequeid."',tour_payment_details.cheque_no = '".$this->cheque_no[$chqdtl]."',tour_payment_details.cheque_date = '".$formatted_date."',tour_payment_details.cheque_writing_dt = NOW(),tour_payment_details.payment_sent_date = CURDATE() WHERE tour_payment_details.tour_code = tour_expense_master.tour_no AND status = 'pending' AND tour_payment_details.name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND tour_payment_details.name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND DATE_FORMAT(tour_payment_details.payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND projectConsider != 6 ";
                                            $dbquery6 = new dbquery($query6,$connid);
										
											
            /*
             *  Comment Auto Bill Updation on Reimbursement Cheque Adjustment as We have skipped Bills in Reimbursement
             *  Updated on - 13-10-2014
             */
                
                /*$query7 = "UPDATE bill_master SET status = 'Paid',cheque_id = '".$chequeid."',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW() WHERE status = 'Approved-2' AND payto IN (SELECT CONCAT(firstName,' ',lastName) FROM emp_master a,payroll_statusMaster b WHERE a.userID = b.userID AND reimbursement_accountWithBank = 'ICICI Bank') AND (DATE(paybydate) <= CURDATE()) AND projectConsider != 6";
                $dbquery7 = new dbquery($query7,$connid);*/
                
                                            
            }
            if($chqdtl == "reimbursementAxis")
            {
                                            //echo "Cheque Date".$chqdtl;
                                            //echo "Account Number".$this->eiaccount_number[$chqdtl];
                                            $this->sendAutoMailer($connid,$this->cheque_no[$chqdtl],"Axis Bank");
                                            $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
                                            $queryInsert = "INSERT INTO cheques_master
                                                                       (number,date,type,payto,comments,
                                                                       purpose_id,partyid,amount,entered_dt,
                                                                       entered_by,eiaccount_number,month,year) VALUES
                                                                       ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
                                                                       ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
                                                                       NOW(),'".$this->entered_by."',
                                                                       '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
                                            //echo $queryInsert;
                                            $dbqueryInsert = new dbquery($queryInsert,$connid);
                                            $chequeid = $dbqueryInsert->insertid;


                                            $query1 = "UPDATE tour_expense_master SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                            $dbquery1 = new dbquery($query1,$connid);
											

                                            $query2 = "UPDATE local_expense_details SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                            $dbquery2 = new dbquery($query2,$connid);

                                            $query3 = "UPDATE tour_advance SET cheque_id  = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status = 'Paid' WHERE status = 'Approved' AND cheque_no = '0' AND  cheque_date = '0000-00-00' AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND sbuproject_id != '6' ".$time_check." AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
                                            $dbquery3 = new dbquery($query3,$connid);
                                 			
                                            $query4 = "UPDATE tour_expense_master,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE tour_expense_master.name = emp_master.userID AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                            $dbquery4 = new dbquery($query4,$connid);
                                            
                                            $query5 = "UPDATE local_expense_details,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE local_expense_details.name = emp_master.userID AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider != 6";
                                            $dbquery5 = new dbquery($query5,$connid);
                                            
                                            $query6 = "UPDATE tour_payment_details,tour_expense_master SET status = 'paid', tour_payment_details.cheque_id = '".$chequeid."',tour_payment_details.cheque_no = '".$this->cheque_no[$chqdtl]."',tour_payment_details.cheque_date = '".$formatted_date."',tour_payment_details.cheque_writing_dt = NOW(),tour_payment_details.payment_sent_date = CURDATE() WHERE tour_payment_details.tour_code = tour_expense_master.tour_no AND status = 'pending' AND tour_payment_details.name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND tour_payment_details.name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND DATE_FORMAT(tour_payment_details.payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND projectConsider != 6";
                                            $dbquery6 = new dbquery($query6,$connid);
					
            /*
             *  Comment Auto Bill Updation on Reimbursement Cheque Adjustment as We have skipped Bills in Reimbursement
             *  Updated on - 13-10-2014
             */
											
                                            /*$query7 = "UPDATE bill_master SET status = 'Paid',cheque_id = '".$chequeid."',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW() WHERE status = 'Approved-2' AND payto IN (SELECT CONCAT(firstName,' ',lastName) FROM emp_master a,payroll_statusMaster b WHERE a.userID = b.userID AND reimbursement_accountWithBank = 'Axis Bank') AND (DATE(paybydate) <= CURDATE()) AND projectConsider != 6 ";
                                            $dbquery7 = new dbquery($query7,$connid);
                                            */
                }
                
                if($chqdtl == "reimbursementHp")
                {
	                                        //echo "Cheque Date".$chqdtl;
	                                        //echo "Account Number".$this->eiaccount_number[$chqdtl];
                                $this->sendAutoMailer($connid,$this->cheque_no[$chqdtl],"ICICI bank","1");

	                                        $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);

	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."',
	                                                                   '".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_expense_master SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6' ";
	                                        $dbquery1 = new dbquery($query1,$connid);

	                                        $query2 = "UPDATE local_expense_details SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6' ";
	                                        $dbquery2 = new dbquery($query2,$connid);

						$query3 = "UPDATE tour_advance SET cheque_id  = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status = 'Paid' WHERE status = 'Approved' AND cheque_no = '0' AND  cheque_date = '0000-00-00' AND sbuproject_id = '6' ".$time_check." AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
                                                $dbquery3 = new dbquery($query3,$connid);
                                            //date : 17-08-2009 Comments : Following queries are added to update the records with comments who have left the company but have pending claims.
											
                                                $query4 = "UPDATE tour_expense_master,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE tour_expense_master.name = emp_master.userID AND leftDate IS NOT NULL AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6' ";
                                            $dbquery4 = new dbquery($query4,$connid);
                                            
                                            $query5 = "UPDATE local_expense_details,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE local_expense_details.name = emp_master.userID AND leftDate IS NOT NULL AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6' ";
                                            $dbquery5 = new dbquery($query5,$connid);

                                            $query6 = "UPDATE tour_payment_details SET status = 'paid', cheque_id = '".$chequeid."',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE() WHERE status = 'pending' AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND tour_code IN (SELECT tour_no FROM tour_expense_master WHERE projectConsider = 6) ";
                                            $dbquery6 = new dbquery($query6,$connid);

            /*
             *  Comment Auto Bill Updation on Reimbursement Cheque Adjustment as We have skipped Bills in Reimbursement
             *  Updated on - 13-10-2014
             */
                                            /*$query7 = "UPDATE bill_master SET status = 'Paid',cheque_id = '".$chequeid."',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW() WHERE status = 'Approved-2' AND payto IN (SELECT CONCAT(firstName,' ',lastName) FROM emp_master a,payroll_statusMaster b WHERE a.userID = b.userID AND reimbursement_accountWithBank = 'ICICI Bank') AND (DATE(paybydate) <= CURDATE()) AND projectConsider = '6' ";
                                            $dbquery7 = new dbquery($query7,$connid);
                                            */
            }
            
            if($chqdtl == "reimbursementAxisHp")
            {
                                            //echo "Cheque Date".$chqdtl;
                                            //echo "Account Number".$this->eiaccount_number[$chqdtl];
                                            $this->sendAutoMailer($connid,$this->cheque_no[$chqdtl],"Axis Bank","1");
                                            $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
                                            $queryInsert = "INSERT INTO cheques_master
                                                                       (number,date,type,payto,comments,
                                                                       purpose_id,partyid,amount,entered_dt,
                                                                       entered_by,eiaccount_number,month,year) VALUES
                                                                       ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
                                                                       ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
                                                                       NOW(),'".$this->entered_by."',
                                                                       '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
                                            //echo $queryInsert;
                                            $dbqueryInsert = new dbquery($queryInsert,$connid);
                                            $chequeid = $dbqueryInsert->insertid;

                                            
                                            $query1 = "UPDATE tour_expense_master SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6'";
                                            $dbquery1 = new dbquery($query1,$connid);

                                            $query2 = "UPDATE local_expense_details SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6'";
                                            $dbquery2 = new dbquery($query2,$connid);

                                            $query3 = "UPDATE tour_advance SET cheque_id  = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status = 'Paid' WHERE status = 'Approved' AND cheque_no = '0' AND  cheque_date = '0000-00-00' AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND sbuproject_id = '6' ".$time_check." AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
                                            $dbquery3 = new dbquery($query3,$connid);
                                 			
                                            $query4 = "UPDATE tour_expense_master,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE tour_expense_master.name = emp_master.userID AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6'";
                                            $dbquery4 = new dbquery($query4,$connid);
                                            
                                            $query5 = "UPDATE local_expense_details,emp_master SET auto_comments = CONCAT('Not transferred to Cheque Writing System as in notice period till',' ',leftDate) WHERE local_expense_details.name = emp_master.userID AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND name NOT IN (SELECT name FROM guest_login) AND name NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank') AND name IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND projectConsider = '6'";
                                            $dbquery5 = new dbquery($query5,$connid);
                                            
                                            $query6 = "UPDATE tour_payment_details SET status = 'paid', cheque_id = '".$chequeid."',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE() WHERE status = 'pending' AND name IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank') AND name NOT IN (SELECT userID FROM emp_master WHERE leftDate IS NOT NULL) AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND tour_code IN (SELECT tour_no FROM tour_expense_master WHERE projectConsider = '6') ";
                                            $dbquery6 = new dbquery($query6,$connid);
											
            /*
             *  Comment Auto Bill Updation on Reimbursement Cheque Adjustment as We have skipped Bills in Reimbursement
             *  Updated on - 13-10-2014
             */				
                                            /*$query7 = "UPDATE bill_master SET status = 'Paid',cheque_id = '".$chequeid."',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW() WHERE status = 'Approved-2' AND payto IN (SELECT CONCAT(firstName,' ',lastName) FROM emp_master a,payroll_statusMaster b WHERE a.userID = b.userID AND reimbursement_accountWithBank = 'Axis Bank') AND (DATE(paybydate) <= CURDATE()) AND projectConsider = '6' ";
                                            $dbquery7 = new dbquery($query7,$connid);
                                            */
                                    }
	                                if($chqdtl == "salary")
	                                {										
                                        $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
										$query = "UPDATE cheques_master SET number = '".$this->cheque_no[$chqdtl]."',date = '".$formatted_date."' WHERE purpose_id = '9' AND number = '0' AND date = '0000-00-00' AND partyid != '0' ";
                                        $dbquery = new dbquery($query,$connid);
										
										$nullAmount = 0;
										$query1 = "UPDATE payroll_statusMaster SET payroll_giving='".$crypt->encrypt($nullAmount)."'";
										mysql_query($query1) or die(mysql_error());
	                                }
	                                if(in_array($chqdtl,$arrPendingChequesKeys) && ($this->purposeid[$chqdtl] == 9 || $this->purposeid[$chqdtl] == 1))
	                                {
	                                        $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
											$query = "UPDATE cheques_master SET number = '".$this->cheque_no[$chqdtl]."',date = '".$formatted_date."',modified_dt=NOW(),modified_by='".$_SESSION["username"]."' WHERE purpose_id = '".$this->purposeid[$chqdtl]."' AND number = '0' AND date = '0000-00-00' AND srno = '".$chqdtl."'";
	                                        $dbquery = new dbquery($query,$connid);
											if($this->purposeid[$chqdtl] == 1)
											{
												$query_get_userid = "SELECT userid FROM cheques_master WHERE srno = '".$chqdtl."'" ;
												$dbquery_get_userid = new dbquery($query_get_userid,$connid);
												$row_get_userid = $dbquery_get_userid->getrowarray();
												$set_userid = $row_get_userid["userid"];
												if($set_userid != "")
												{
													$query_ffs_paid = "UPDATE payroll_ffs_details SET status = 'Paid' WHERE userID = '".$set_userid."' AND status = 'Approved' LIMIT 1";
													$dbquery_ffs_paid = new dbquery($query_ffs_paid,$connid);
													$this->sendFFSPaidMail($chqdtl, $connid);
													$this->sendFFSEmployeeMail($chqdtl, $connid);
												}
											}
	                                }
	                                if(in_array($chqdtl,$arrGuestToursKeys))
	                                {
	                                		$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,userid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_expense_master SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND name IN (SELECT name FROM guest_login UNION SELECT userID FROM contract_master WHERE bankno NOT IN (9,18)) AND name = '".$chqdtl."'";
	                                        $dbquery1 = new dbquery($query1,$connid);

	                                        $query2 = "UPDATE local_expense_details SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND name IN (SELECT name FROM guest_login UNION SELECT userID FROM contract_master WHERE bankno NOT IN (9,18)) AND name = '".$chqdtl."'";
	                                        $dbquery2 = new dbquery($query2,$connid);

											/*$query2_old = "UPDATE local_expense SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND name IN (SELECT name FROM guest_login UNION SELECT userID FROM contract_master WHERE bankno NOT IN (9,18)) AND name = '".$chqdtl."'";
	                                        $dbquery2_old = new dbquery($query2_old,$connid);*/
	                                }
									if(in_array($chqdtl,$arrScoDcoToursKeys))
	                                {
	                                		$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                       	$queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,userid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_expense_master SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND name IN (SELECT name FROM marketing WHERE category = 'SCO' OR category = 'DCO' OR category = 'EA' OR name = 'SZM') AND name = '".$chqdtl."'";
	                                        $dbquery1 = new dbquery($query1,$connid);
	                                }
									if(in_array($chqdtl,$arrScoDcoLocalKeys))
	                                {
	                                		$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                       	$queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,userid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE local_expense_details SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND name IN (SELECT name FROM marketing WHERE category = 'SCO' OR category = 'DCO' OR category = 'EA' OR name = 'SZM') AND name = '".$chqdtl."'";
	                                        $dbquery1 = new dbquery($query1,$connid);

											/*$query1_old = "UPDATE local_expense SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND name IN (SELECT name FROM marketing WHERE category = 'SCO' OR category = 'DCO' OR category = 'EA' OR name = 'SZM') AND name = '".$chqdtl."'";
	                                        $dbquery1_old = new dbquery($query1_old,$connid);*/
	                                }
									if(in_array($chqdtl,$arrScoDcoAdvanceChequesKeys))
									{
											 $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
                                                              $queryInsert = "INSERT INTO cheques_master
                                                                           (number,date,type,payto,comments,
                                                                           purpose_id,partyid,amount,entered_dt,
                                                                           entered_by,eiaccount_number,month,year) VALUES
                                                                           ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
                                                                           ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
                                                                           NOW(),'".$this->entered_by."',
                                                                           '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
                                                //echo $queryInsert;
                                                $dbqueryInsert = new dbquery($queryInsert,$connid);
                                                $chequeid = $dbqueryInsert->insertid;

                                                $query1 = "UPDATE tour_advance SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status='Paid' WHERE status = 'approved' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND sbuproject_id != '6' ".$time_check." AND applied_by IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND applied_by = '".$chqdtl."'";
                                                $dbquery1 = new dbquery($query1,$connid);
									}
	                                if(in_array($chqdtl,$arrSchoolsRefundKeys))
	                                {
	                                		$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                		$querySchool = "SELECT schoolname FROM schools WHERE schoolno = '".$chqdtl."' ";
	                                		$dbquerySchool = new dbquery($querySchool,$connid);
	                                		$rowSchool = $dbquerySchool->getrowarray();
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,schoolcode,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$rowSchool["schoolname"]."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        /*$chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_expense_master SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),payment_sent_date = CURDATE(),tour_status = 'paid' WHERE tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND DATE_FORMAT(checked_date,'%Y%m%d') > '20081001' AND name IN (SELECT name FROM guest_login)";
	                                        $dbquery1 = new dbquery($query1,$connid);*/
	                                }
	                                if($chqdtl == "touradvance")
	                                {
	                                	$this->sendAdvanceAutoMailer($connid,$this->cheque_no[$chqdtl],'ICICI bank');
										$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_advance SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status='Paid' WHERE status = 'approved' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND sbuproject_id != 6 ".$time_check." AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
	                                        $dbquery1 = new dbquery($query1,$connid);
	                                }
									if($chqdtl == "touradvanceHp")
	                                {
	                                	$this->sendAdvanceAutoMailer($connid,$this->cheque_no[$chqdtl],'ICICI bank',"1");
										$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_advance SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status='Paid' WHERE status = 'approved' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND sbuproject_id = 6 ".$time_check." AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT userID FROM contract_master WHERE bankno = '9') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
	                                        $dbquery1 = new dbquery($query1,$connid);
	                                }
									if($chqdtl == "touradvanceHpAxis")
	                                {
	                                	$this->sendAdvanceAutoMailer($connid,$this->cheque_no[$chqdtl],'Axis bank',"1");
										$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE tour_advance SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status='Paid' WHERE status = 'approved' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND sbuproject_id = 6 ".$time_check." AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
	                                        $dbquery1 = new dbquery($query1,$connid);
	                                }
									if($chqdtl == "touradvanceAxis")
                                    {
                                            $this->sendAdvanceAutoMailer($connid,$this->cheque_no[$chqdtl],'Axis Bank');
											$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
                                            $queryInsert = "INSERT INTO cheques_master
                                                           (number,date,type,payto,comments,
                                                           purpose_id,partyid,amount,entered_dt,
                                                           entered_by,eiaccount_number,month,year) VALUES
                                                           ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
                                                           ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
                                                           NOW(),'".$this->entered_by."',
                                                           '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
                                    		//echo $queryInsert;
                                            $dbqueryInsert = new dbquery($queryInsert,$connid);
                                            $chequeid = $dbqueryInsert->insertid;

                                            $query1 = "UPDATE tour_advance SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),status='Paid' WHERE status = 'approved' AND cheque_no = '0' AND cheque_date = '0000-00-00' AND sbuproject_id != 6 ".$time_check." AND applied_by NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND applied_by IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank' UNION SELECT userID FROM contract_master WHERE bankno = '18') AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'";
                                            $dbquery1 = new dbquery($query1,$connid);
                                    }
									if($chqdtl == "salaryadvance")
	                                {
	                                	$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."',
	                                                                   '".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;

	                                        $query1 = "UPDATE payroll_salary_advance SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),app_status='Paid' WHERE app_status = 'Approved' AND userID NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND userID IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'ICICI Bank')";
	                                        $dbquery1 = new dbquery($query1,$connid);
	                                }
									if($chqdtl == "salaryadvanceAxis")
                                    {
                                                    $formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                                $queryInsert = "INSERT INTO cheques_master
	                                                               (number,date,type,payto,comments,
	                                                               purpose_id,partyid,amount,entered_dt,
	                                                               entered_by,eiaccount_number,month,year) VALUES
	                                                               ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."',
	                                                               '".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                               NOW(),'".$this->entered_by."',
	                                                               '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
                                            //echo $queryInsert;
                                            $dbqueryInsert = new dbquery($queryInsert,$connid);
                                            $chequeid = $dbqueryInsert->insertid;

                                            $query1 = "UPDATE payroll_salary_advance SET cheque_id = '$chequeid',cheque_no = '".$this->cheque_no[$chqdtl]."',cheque_date = '".$formatted_date."',cheque_writing_dt = NOW(),app_status='Paid' WHERE app_status = 'Approved' AND userID NOT IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO')) AND userID IN (SELECT userID from payroll_statusMaster WHERE reimbursement_accountWithBank = 'Axis Bank')";
                                            $dbquery1 = new dbquery($query1,$connid);
                                    }
	                                if($chqdtl == "telecallersalary")
	                                {
	                                	$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."',
	                                                                   '".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE())-1,YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;
	                                }
	                                if($chqdtl == "telecallersalaryAxis")
	                                {
	                                	$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."',
	                                                                   '".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE())-1,YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;
	                                }
									if(in_array($chqdtl,$arrTdsChequesKeys))
	                                {
	                                	$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
                                        $queryInsert = "INSERT INTO cheques_master
                                                                   (number,date,type,payto,comments,
                                                                   purpose_id,partyid,amount,entered_dt,
                                                                   entered_by,eiaccount_number,month,year) VALUES
                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."',
                                                                   '".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
                                                                   NOW(),'".$this->entered_by."',
                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
                                        //echo $queryInsert;
                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
                                        //$chequeid = $dbqueryInsert->insertid;
	                                }
	                                if($chqdtl == "incentivepayment")
	                                {
	                                	$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                        $queryInsert = "INSERT INTO cheques_master
	                                                                   (number,date,type,payto,comments,
	                                                                   purpose_id,partyid,amount,entered_dt,
	                                                                   entered_by,eiaccount_number,month,year) VALUES
	                                                                   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
	                                                                   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
	                                                                   NOW(),'".$this->entered_by."',
	                                                                   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";
	                                        //echo $queryInsert;
	                                        $dbqueryInsert = new dbquery($queryInsert,$connid);
	                                        $chequeid = $dbqueryInsert->insertid;
	                                        $queryIncentive = "UPDATE status_incentive_roundwise SET cheque_id = '".$chequeid."' WHERE status = 'approved2' AND entered_by = 'sudhir' ";
	                                        $dbqueryIncentive = new dbquery($queryIncentive,$connid);
	                                }
	                                if($chqdtl == "neft")
	                                {
	                                	$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                	$arrBillChequesNeft = $this->getThirdPartyCheques($connid,"NEFT");
	                                	$arrBillChequesNeftKeys = array_keys($arrBillChequesNeft);
	                                	$strbills_neft = implode("','",$arrBillChequesNeftKeys);
										$queryInsert = "INSERT INTO cheques_master
														   (number,date,type,payto,comments,
														   purpose_id,partyid,amount,entered_dt,
														   entered_by,eiaccount_number,month,year) VALUES
														   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
														   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
														   NOW(),'".$this->entered_by."',
														   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";

										$dbqueryInsert = new dbquery($queryInsert,$connid);
										$chequeid = $dbqueryInsert->insertid;
										//echo $this->eiaccount_number[$chqdtl];
																					
										foreach($arrBillChequesNeft as $neft_key => $neft_value)	
										{
											if($this->eiaccount_number[$chqdtl] == "6405005147")
												$arrDetailsByID = $this->getDetailsById($connid,$neft_value["payto"],"6");
											else
												$arrDetailsByID = $this->getDetailsById($connid,$neft_value["payto"]);											
											$this->sendEmail($connid,$arrDetailsByID,$this->cheque_no[$chqdtl],$neft_value["partyid"]);											
										}
										if($this->eiaccount_number[$chqdtl] == "6405005147")
											$query = "UPDATE bill_master,budget_costCenterDetails SET cheque_id = '$chequeid',cheque_date='".$formatted_date."',cheque_no='".$this->cheque_no[$chqdtl]."',status='Paid',cheque_writing_dt = NOW() WHERE bill_master.billid = budget_costCenterDetails.code AND category = 'bill' AND cheque_no = '' AND cheque_date = '0000-00-00' AND status != 'Paid' AND approved2_by <> '' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND DATE_FORMAT(approved2_date,'%Y%m%d') > '20081001' AND sbu_project_id = '6'  AND payto IN ('".$strbills_neft."') ";
										else
											$query = "UPDATE bill_master,budget_costCenterDetails SET cheque_id = '$chequeid',cheque_date='".$formatted_date."',cheque_no='".$this->cheque_no[$chqdtl]."',status='Paid',cheque_writing_dt = NOW() WHERE bill_master.billid = budget_costCenterDetails.code AND category = 'bill' AND cheque_no = '' AND cheque_date = '0000-00-00' AND status != 'Paid' AND approved2_by <> '' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND DATE_FORMAT(approved2_date,'%Y%m%d') > '20081001' AND sbu_project_id != '6' AND payto IN ('".$strbills_neft."') ";
										$dbquery = new dbquery($query,$connid);
	                                }
	                                if($chqdtl == "rgts")
	                                {
	                                	$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
	                                	$arrBillChequesRgts = $this->getThirdPartyCheques($connid,"RGTS");
	                                	$arrBillChequesRgtsKeys = array_keys($arrBillChequesRgts);
	                                	$strbills_rgts = implode("','",$arrBillChequesRgtsKeys);
										$queryInsert = "INSERT INTO cheques_master
														   (number,date,type,payto,comments,
														   purpose_id,partyid,amount,entered_dt,
														   entered_by,eiaccount_number,month,year) VALUES
														   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
														   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
														   NOW(),'".$this->entered_by."',
														   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";

										$dbqueryInsert = new dbquery($queryInsert,$connid);
										$chequeid = $dbqueryInsert->insertid;
										//echo $this->eiaccount_number[$chqdtl];
										foreach($arrBillChequesRgts as $rgts_key => $rgts_value)	
										{
											if($this->eiaccount_number[$chqdtl] == "6405005147")
												$arrDetailsByID = $this->getDetailsById($connid,$rgts_value["payto"],"6");
											else
												$arrDetailsByID = $this->getDetailsById($connid,$rgts_value["payto"]);											
											$this->sendEmail($connid,$arrDetailsByID,$this->cheque_no[$chqdtl],$rgts_value["partyid"]);											
										}
										if($this->eiaccount_number[$chqdtl] == "6405005147")
											$query = "UPDATE bill_master,budget_costCenterDetails SET cheque_id = '$chequeid',cheque_date='".$formatted_date."',cheque_no='".$this->cheque_no[$chqdtl]."',status='Paid',cheque_writing_dt = NOW() WHERE bill_master.billid = budget_costCenterDetails.code AND category = 'bill' AND cheque_no = '' AND cheque_date = '0000-00-00' AND status != 'Paid' AND approved2_by <> '' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND DATE_FORMAT(approved2_date,'%Y%m%d') > '20081001' AND sbu_project_id = '6'  AND payto IN ('".$strbills_rgts."') ";
										else
											$query = "UPDATE bill_master,budget_costCenterDetails SET cheque_id = '$chequeid',cheque_date='".$formatted_date."',cheque_no='".$this->cheque_no[$chqdtl]."',status='Paid',cheque_writing_dt = NOW() WHERE bill_master.billid = budget_costCenterDetails.code AND category = 'bill' AND cheque_no = '' AND cheque_date = '0000-00-00' AND status != 'Paid' AND approved2_by <> '' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND DATE_FORMAT(approved2_date,'%Y%m%d') > '20081001' AND sbu_project_id != '6' AND payto IN ('".$strbills_rgts."') ";
										$dbquery = new dbquery($query,$connid);
	                                }
	                                if($chqdtl!= "salary" && $chqdtl != "reimbursement" && !in_array($chqdtl,$arrGuestToursKeys) && !in_array($chqdtl,$arrSchoolsRefundKeys) && !in_array($chqdtl,$arrAdvanceToursKeys) && !in_array($chqdtl,$arrHpAdvanceToursKeys) && $this->purposeid[$chqdtl] == 11 && (($this->partyPAN[$chqdtl] != "" && $this->totalTDS[$chqdtl] > 0) || $this->totalTDS[$chqdtl] == "" || $this->totalTDS[$chqdtl] == 0))
	                                {
										$formatted_date = $this->formatDate($this->cheque_date[$chqdtl]);
										$queryInsert = "INSERT INTO cheques_master
														   (number,date,type,payto,comments,
														   purpose_id,partyid,amount,entered_dt,
														   entered_by,eiaccount_number,month,year) VALUES
														   ('".$this->cheque_no[$chqdtl]."','".$formatted_date."','Payee','".$chqdtl."','".$this->comments[$chqdtl]."','
														   ".$this->purposeid[$chqdtl]."','".$this->partyid[$chqdtl]."','".$this->amount[$chqdtl]."',
														   NOW(),'".$this->entered_by."',
														   '".$this->eiaccount_number[$chqdtl]."',MONTH(CURDATE()),YEAR(CURDATE()))";

										$dbqueryInsert = new dbquery($queryInsert,$connid);
										$chequeid = $dbqueryInsert->insertid;
										//echo $this->eiaccount_number[$chqdtl];
										if($this->eiaccount_number[$chqdtl] == "6405005147")
											$arrDetailsByID = $this->getDetailsById($connid,$chqdtl,"6");
										else
											$arrDetailsByID = $this->getDetailsById($connid,$chqdtl);
											
										$this->sendEmail($connid,$arrDetailsByID,$this->cheque_no[$chqdtl],$this->partyid[$chqdtl]);
										if($this->eiaccount_number[$chqdtl] == "6405005147")
											$query = "UPDATE bill_master,budget_costCenterDetails SET cheque_id = '$chequeid',cheque_date='".$formatted_date."',cheque_no='".$this->cheque_no[$chqdtl]."',status='Paid',cheque_writing_dt = NOW() WHERE bill_master.billid = budget_costCenterDetails.code AND category = 'bill' AND payto='".$chqdtl."' AND cheque_no = '' AND cheque_date = '0000-00-00' AND status != 'Paid' AND approved2_by <> '' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND DATE_FORMAT(approved2_date,'%Y%m%d') > '20081001' AND sbu_project_id = '6' ";
										else
											$query = "UPDATE bill_master,budget_costCenterDetails SET cheque_id = '$chequeid',cheque_date='".$formatted_date."',cheque_no='".$this->cheque_no[$chqdtl]."',status='Paid',cheque_writing_dt = NOW() WHERE bill_master.billid = budget_costCenterDetails.code AND category = 'bill' AND payto='".$chqdtl."' AND cheque_no = '' AND cheque_date = '0000-00-00' AND status != 'Paid' AND approved2_by <> '' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND DATE_FORMAT(approved2_date,'%Y%m%d') > '20081001' AND sbu_project_id != '6' ";
										$dbquery = new dbquery($query,$connid);
	                                }
									else if($this->purposeid[$chqdtl] == 11 && $this->partyPAN[$chqdtl] == "")
									{
										echo "<div align='center'><font color='red' size='2'>PAN for the party for whom cheque is required to be saved is missing!</font></div>";	
									}
									
                                }
                        }
                }
        }
        // for saving the data of other complicated of cheques...
        function savedata($connid)
        {
				$userID = "";
                $partyid = "";
                $this->entered_by = $_SESSION["username"];
                $arrChequeKeys = array_keys($this->number);
                foreach ($arrChequeKeys as $partyid)
                {
                        if($this->validation($connid,$this->number[$partyid]) && $this->validationFFS($connid,$this->purposeid[$partyid],$this->partyname[$partyid]))
                        {
	                	    if($this->number[$partyid] != "")
	                        {
	                                $userID = "";
	                                $partyID = "";
									$chequeid = 0;
									$arrUserDetails = explode("~",$this->partyname[$partyid]);
	                        		$queryUser = "SELECT count(*) FROM emp_master WHERE userID = '".$arrUserDetails[1]."' ";
	                                $dbqueryUser = new dbquery($queryUser,$connid);
	                                $rowUser = $dbqueryUser->getrowarray();
	                                
	                                $query_old = "SELECT count(*) FROM old_emp_master WHERE userID = '".$arrUserDetails[1]."' ";
	                                $dbquery_old = new dbquery($query_old,$connid);
	                                $row_old = $dbquery_old->getrowarray();
	                                
	                                $query_contract = "SELECT count(*) FROM contract_master WHERE userID = '".$arrUserDetails[1]."' ";
									$dbquery_contract = new dbquery($query_contract,$connid);
									$row_contract = $dbquery_contract->getrowarray();
										
									$query_old_contract = "SELECT count(*) FROM old_contract_master WHERE userID = '".$arrUserDetails[1]."' ";
									$dbquery_old_contract = new dbquery($query_old_contract,$connid);
									$row_old_contract = $dbquery_old_contract->getrowarray();
									
	                                $queryGuest = "SELECT count(*) FROM guest_login WHERE name = '".$arrUserDetails[1]."' ";
                                    $dbqueryGuest = new dbquery($queryGuest,$connid);
                                    $rowGuest = $dbqueryGuest->getrowarray();

                                    if($rowUser[0] > 0 || $rowGuest[0] > 0 || $row_contract[0] > 0 || $row_old[0] >0 || $row_old_contract[0] > 0)
									{	
										$userID = $arrUserDetails[1];
									}
	                                else
	                                {
                                        $queryParty = "SELECT partyid FROM bill_partyMaster WHERE partyname = '".$this->partyname[$partyid]."' ";
                                        $dbqueryParty = new dbquery($queryParty,$connid);
                                        $rowParty = $dbqueryParty->getrowarray();
                                        if($rowParty["partyid"] != "")
                                                $partyID = $rowParty["partyid"];
	                                }
	                                $date = explode('-',$this->date[$partyid]);
	                                $date_mod = $date[2].'-'.$date[1].'-'.$date[0];
	                                if($userID != "")
	                                {
	                                        $query ="INSERT INTO cheques_master (number,date,type,purpose_id,userid,amount,eiaccount_number,month,year,entered_dt,entered_by,payto,schoolcode,comments,otherCheque) ".
	                                                        "VALUES ('".$this->number[$partyid]."','".$date_mod."','".$this->type[$partyid]."','".
	                                                        $this->purposeid[$partyid]."','".$userID."','".$this->amount[$partyid]."','".$this->eiaccount_number[$partyid]."',MONTH(CURDATE()),YEAR(CURDATE()),NOW(),'".$this->entered_by."','".$this->payto[$partyid]."','".$this->school_code[$partyid]."','".$this->comments[$partyid]."','Y') ";
	                                }
	                                else if($partyID != "" || $this->payto[$partyid] != "")
	                                {
	                                        $query ="INSERT INTO cheques_master (number,date,type,purpose_id,partyid,amount,eiaccount_number,month,year,entered_dt,entered_by,payto,schoolcode,comments,otherCheque) ".
	                                                        "VALUES ('".$this->number[$partyid]."','".$date_mod."','".$this->type[$partyid]."','".
	                                                        $this->purposeid[$partyid]."','".$partyID."','".$this->amount[$partyid]."','".$this->eiaccount_number[$partyid]."',MONTH(CURDATE()),YEAR(CURDATE()),NOW(),'".$this->entered_by."','".$this->payto[$partyid]."','".$this->school_code[$partyid]."','".$this->comments[$partyid]."','Y') ";
	                                }
	                                //echo $query;
									
	                                $dbquery = new dbquery($query,$connid);
									$chequeid = $dbquery->insertid;
									
									$querysbuid = "SELECT srno FROM sbu_master WHERE dbname = '".$this->sbu[$partyid]."'";
									$resultsbuid = mysql_query($querysbuid);
									$rowsbuid = mysql_fetch_array($resultsbuid);
									$sbu = $rowsbuid[0];
									
									$queryprojectid = "SELECT projectno FROM project_sbu WHERE projectname = '".$this->sbuproject[$partyid]."'";
									$resultprojectid = mysql_query($queryprojectid);
									$rowprojectid = mysql_fetch_array($resultprojectid);
									$sbuproject = $rowprojectid[0];
									
									$querygroupid = "SELECT id FROM budget_heads WHERE head_dbname = '".$this->group[$partyid]."'";
									$resultgroupid = mysql_query($querygroupid);
									$rowgroupid = mysql_fetch_array($resultgroupid);
									$group = $rowgroupid[0];
									
									$querysubgroupid = "SELECT id FROM budget_subHeads WHERE sub_head = '".$this->subgroup[$partyid]."'";
									$resultsubgroupid = mysql_query($querysubgroupid);
									$rowsubgroupid = mysql_fetch_array($resultsubgroupid);
									$subgroup = $rowsubgroupid[0];
									
									$this->saveOtherChequesSBUdetails($connid,$sbu,$sbuproject,$group,$subgroup,$this->amount[$partyid],$chequeid,$this->entered_by,$this->budget_amount[$partyid]);
							}
                        }
                }
        }
        function validation($connid,$chequeno)
        {
				$query = "SELECT count(*) FROM cheques_master WHERE number = '".$chequeno."' ";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				if($row[0] == 0)
				 return true;
				else
				 return false;
        }
		function validationFFS($connid,$purpose_id,$userID)
		{
			if($purpose_id != 1)
				return true;
			$query = "SELECT a.assetid,code FROM fams_user_mapping a,fams_asset_master b WHERE a.assetid = b.assetid AND userID = '".$userID."' ";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($dbquery->numrows() == 0)
			{
				 return true;
			}
			else
			{
				echo "<div align='center'>".$userID." has the machine with code : ".$row["code"]." remaining to be unalloted</div>";
				return false;
			}
		}
        function getAccNo($connid)
        {
                $arrRet = array();
                $query = "SELECT userID,salaccountno,reimbursement_salaccountno FROM payroll_statusMaster UNION SELECT userID,account_no as salaccountno,account_no as reimbursement_salaccountno FROM contract_master";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["userID"]] = array("userID"=>$row["userID"],
                                                         "salaccountno"=>$row["reimbursement_salaccountno"]);
                }
                return $arrRet;
        }
        function getTelecallersAccNo($connid)
        {
                $arrRet = array();
                $query = "SELECT userID,account_no FROM contract_master ";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["userID"]] = array("userID"=>$row["userID"],
                                                         "salaccountno"=>$row["account_no"]);
                }
                return $arrRet;
        }
        function getFullName($connid)
        {
            $arrRet = array();
            $query = "SELECT salaccountname,userID,reimbursement_salaccountname FROM payroll_statusMaster UNION SELECT concat(firstname,' ',lastname) as salaccountname,userID,concat(firstname,' ',lastname) as reimbursement_salaccountname FROM contract_master UNION SELECT fullname as salaccountname,name as userID,fullname as reimbursement_salaccountname FROM marketing WHERE category IN ('SCO','DCO','EA')";
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                $arrRet[$row["userID"]] = array("name"=>$row["userID"],
                                              "fullname"=>$row["reimbursement_salaccountname"]);
            }
            //print_r($arrRet);
			return $arrRet;
		}
		function getEmailId($connid)
		{
			$arrRet = array();
			$query = "SELECT name,email FROM marketing";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["name"]] = $row["email"];
			}
			return $arrRet;
		}
        function formatDate($oldformat)
        {
                if($oldformat=="")        return "";
                $dateParameters=explode("-",$oldformat);
                $newformat=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
                return $newformat;
        }
        function getAllAccountsDetails($connid)
        {
                $arrRet = array();
                $query = "SELECT * FROM accounts_master";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["number"]] = array("bankname"=>$row["bankname"],
                                                        "number"=>$row["number"]);
                }
                return $arrRet;
        }
        function getChequePurposes($connid)
        {
                $arrRet = array();
                $query = "SELECT * FROM cheques_purpose_master ORDER BY description";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["purpose_id"]] = array("purpose_id"=>$row["purpose_id"],
                                                            "description"=>$row["description"]);
                }
                return $arrRet;
        }
    function getUsersList($connid)
    {
            $arrRet = array();
            //$query = "SELECT name,fullname FROM marketing ORDER BY fullname";
			$query = "SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM emp_master ";
			$query.="UNION SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM old_emp_master ";
			$query.="UNION SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM contract_master ";
			$query.="UNION SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM old_contract_master ";
			$query.="UNION SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM ea_master ";
			$query.="UNION SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM old_ea_master ";
			
			//echo $query;
			
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                    $arrRet[$row['userID']] = array('name'=>$row['userID'],
                                                  'fullname'=>$row['fullname']);
            }
            return $arrRet;
    }
    function getDetailsById($connid,$payto,$projectid="")
    {
            $arrRet = array();
            $ts = time();
			# figure out what 7 days is in seconds
			$one_day = 1 * 24 * 60 * 60;
			# make last weeks date based on a past timestamp
			$tomorrow = date( "d-m-Y", ( $ts + $one_day ) );
			$arrGuestTours = $this->getGuestTourDetails($connid);
			$arrGuestToursKeys = array_keys($arrGuestTours);
			
			if($projectid == "6")
				$condition = " AND sbu_project_id = '".$projectid."' ";
			else
				$condition = " AND sbu_project_id != '6' ";
				
			if(in_array($payto,$arrGuestToursKeys))
			{
				$query = "SELECT tour_expense_master.tour_no as billid,guest_login.fullname as payto,tour_expense_master.tour_purpose as billdescription,
						 tour_expense_master.name,sum(checked_amount) as netpayable
						 FROM tour_expense_master,tour_expense_items,guest_login WHERE tour_expense_master.tour_no = tour_expense_items.tour_master_tour_no AND tour_expense_master.name = guest_login.name AND cheque_no = ''
						 AND tour_expense_master.name = '$payto' AND checked_amount != '' AND tour_status = 'checked'
						 AND payment_sent_date = '0000-00-00' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' GROUP BY tour_expense_master.name ";
			}
			else
			{
            	$query = "SELECT DISTINCT billid,netpayable,billdescription,partyid,payto,tdsamount,deductionamount,deductionreason,invoiceno,billamount,servicetaxamount,a.sbu_id,isMultiSbu FROM bill_master a,budget_costCenterDetails b WHERE a.billid = b.code AND category = 'bill' ".$condition." 
           		AND payto = '".$payto."' AND a.approved2_by <> '' AND cheque_no = '' AND cheque_date = '0000-00-00'  AND status != 'Paid' AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 ";
			}
            //echo $query;
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
	        {
	            $invoice_amt = $row["billamount"] + $row["servicetaxamount"];
	        	$arrRet[$row["billid"]] = array("billid"=>$row["billid"],
                                                    "netpayable"=>$row["netpayable"],
                                                    "billdescription"=>$row["billdescription"],
                                                    "payto"=>$row["payto"],
													"tdsamount"=>$row["tdsamount"],
													"deductionamount"=>$row["deductionamount"],
													"deductionreason"=>$row["deductionreason"],
													"invoiceno"=>$row["invoiceno"],
													"sbu_id"=>$row["sbu_id"],
													"isMultiSbu"=>$row["isMultiSbu"],
													"invoiceamt"=>$invoice_amt
                                                   );

	        }
        return $arrRet;
    }
    function getPendingCheques($connid)
    {
            $arrRet = array();
            $query = "SELECT a.*,description FROM cheques_master a,cheques_purpose_master b WHERE a.purpose_id = b.purpose_id AND number = '0' AND date = '0000-00-00' and amount > 0 ";
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                $arrRet[$row["srno"]] = array("srno"=>$row["srno"],
                                              "partyid"=>$row["partyid"],
                                              "userid"=>$row["userid"],
                                              "month"=>$row["month"],
                                              "year"=>$row["year"],
                                              "eiaccount_number"=>$row["eiaccount_number"],
                                              "amount"=>$row["amount"],
                                              "purpose_id"=>$row["purpose_id"],
                                              "description"=>$row["description"]
                                              );
            }
        return $arrRet;
    }
    function searchChequesByCriteria($connid)
    {
            $arrRet = array();
            $this->setpostvars();
            $query = "SELECT *,DATE_FORMAT(date,'%d-%m-%Y') as chkDate,DATE_FORMAT(debitDate,'%d-%m-%Y') as dbtDate FROM cheques_master WHERE number != '0' AND date != '0000-00-00' ";
			$query.="AND status = '".$this->status."' ";
			$columnname = "date";
			if($this->srchdebitdate == "yes")
			{
				$columnname = "debitDate";
			}

            if($this->start_date != '' && $this->start_date != "0000-00-00 00:00:00")
            {
                $arrStDt = explode('-',$this->start_date);
                $start_date = $arrStDt[2].$arrStDt[1].$arrStDt[0];
                $query.="AND DATE_FORMAT(".$columnname.",'%Y%m%d') >= $start_date ";
            }
            else if($this->keyword == "" && $this->searchChequeNo == "")
            {
                    $query.="AND DATE_FORMAT(".$columnname.",'%Y%m%d') >= '".date('Ymd')."' ";
            }
            if($this->end_date != '' && $this->end_date != "0000-00-00 00:00:00")
            {
                    $arrEnDt = explode('-',$this->end_date);
                    $end_date = $arrEnDt[2].$arrEnDt[1].$arrEnDt[0];
                    $query.="AND DATE_FORMAT(".$columnname.",'%Y%m%d') <= $end_date ";
            }
            else if($this->keyword == "" && $this->searchChequeNo == "")
            {
                    $query.="AND DATE_FORMAT(".$columnname.",'%Y%m%d') <= '".date('Ymd')."' ";
            }
            if($this->keyword != "")
            	$query.="AND (payto LIKE '%".$this->keyword."%' OR userid LIKE '%".$this->keyword."%')";
            if($this->searchChequeNo != "")
            	$query.="AND number = '".$this->searchChequeNo."' ";

            if($query != "")
            {
	            //echo $query;
            	$dbquery = new dbquery($query,$connid);
	            while($row = $dbquery->getrowarray())
	        	{
					$purpose = "Party Payment";
					$partyname = "";
					if($row["partyid"] != 0)
					{
		        		$queryParty = "SELECT partyname FROM bill_partyMaster WHERE partyid = '".$row["partyid"]."'";
						$dbqueryParty = new dbquery($queryParty,$connid);
						$rowParty = $dbqueryParty->getrowarray();
						$partyname = $rowParty["partyname"];
					}
					else if($row["userid"] != "")
					{
						$queryParty = "SELECT fullname FROM marketing WHERE name = '".$row["userid"]."'";
						$dbqueryParty = new dbquery($queryParty,$connid);
						$rowParty = $dbqueryParty->getrowarray();
						$partyname = $rowParty["fullname"];
					}
					if($row["dbtDate"] == '00-00-0000')
						$debitdate = '-';
					else
						$debitdate = $row["dbtDate"];
					$arrRet[$row["srno"]] = array("srno"=>$row["srno"],
                                            "number"=>$row["number"],
                                            "date"=>$row["chkDate"],
                                            "partyname"=>$partyname,
                                            "payto"=>$row["payto"],
                                            "purpose_id"=>$row["purpose_id"],
                                            "month"=>$row["month"],
                                            "year"=>$row["year"],
											"type"=>$row["type"],
                                            "comments"=>$row["comments"],
                                            "eiaccount_number"=>$row["eiaccount_number"],
											"dbtDate"=>$debitdate,
                                            "amount"=>$row["amount"]);

	        	}
            }
            //print_r($arrRet);
         return $arrRet;
    }
    function getChequesPurpose($connid)
    {
    	$arrRet = array();
    	$query = "SELECT * FROM cheques_purpose_master";
    	$dbquery = new dbquery($query,$connid);
        while($row = $dbquery->getrowarray())
	    {
	    	$arrRet[$row["purpose_id"]] = array("purpose_id"=>$row["purpose_id"],
                                            "description"=>$row["description"]);
	    }
	    return $arrRet;
    }
    function OmitUserforReimbursement($connid)
    {
    	$i = 0;
		$this->setgetvars();
		$this->setpostvars();
		$paybydate = "0000-00-00";
		$Monday = array("4","5","6","0");
		$Thursday = array("1","2","3");
		//echo date("D",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
		if(in_array(date("w"),$Thursday))
		{
			while(date("D",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"))) != "Thu")
			{
				$i = $i + 1;
				//echo 	date("D",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
				//echo "<br>";
				$paybydate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
			}
		}
		if(in_array(date("w"),$Monday))
		{
			while(date("D",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y"))) != "Mon")
			{
				$i = $i + 1;
				//echo 	date("D",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
				//echo "<br>";
				$paybydate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+$i, date("Y")));
			}
		}
		$arrAccNo = $this->getAccNo($connid);
		$arrFullName = $this->getFullName($connid);
		if($this->bankname == "Axis Bank")
			$arrTourCheques = $this->getReimbursementTours($connid,"employeeAxisBank",$this->projectConsider);
		else
			$arrTourCheques = $this->getReimbursementTours($connid,"employee",$this->projectConsider);

		$arrLocalCheques = $this->getReimbursementLocal($connid,$this->bankname,"employee",$this->projectConsider);
		$arrAdvanceTours = $this->getTourAdvanceCheques($connid,$this->bankname,"employee",$this->projectConsider);
		$arrAdvanceToursKeys = array_keys($arrAdvanceTours);
		$arrFareCCholders = $this->getFareReimbursementDetails($connid,$this->bankname,$this->projectConsider);
		$arrFareCCholdersKeys = array_keys($arrFareCCholders);

		$tour_names = array_keys($arrTourCheques);
		$local_names = array_keys($arrLocalCheques);

		//print_r($tour_names);
		//print_r($local_names);
		$names = array_merge($tour_names,$local_names);
		$farenames = array_merge($names,$arrFareCCholdersKeys);
		$advance_names = array_merge($farenames,$arrAdvanceToursKeys);
		$unique_names = array_unique($advance_names);
		//print_r($unique_names);
		if(is_array($unique_names) && count($unique_names) > 0)
		{
			$amount = 0;
			foreach ($unique_names as $row_name)
			{
				if($arrAccNo[$row_name]["salaccountno"]	!= '')
				{
					$arrName[] = $row_name;
				}
			}
		}
		if(is_array($arrName) && count($arrName)>0)
		{
			foreach ($arrName as $name)
			{
    			if(!in_array($name,$this->removeFromList))
    			{
					/*$query1 = "UPDATE tour_expense_master SET payby_dt = '".$paybydate."' WHERE name = '".$name."' AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' ";
	    			$dbquery1 = new dbquery($query1,$connid);
	    			$query2 = "UPDATE local_expense SET payby_dt = '".$paybydate."' WHERE name = '".$name."' AND tour_status = 'checked' AND cheque_no = '0' AND cheque_date = '0000-00-00' ";
	    			$dbquery2 = new dbquery($query2,$connid);*/
    			}

			}
		}
    }
    function OmitUserForTourOrGeneralAdvance($connid)
    {
    	$this->setgetvars();
		$this->setpostvars();
		$arrAccNo = $this->getAccNo($connid);
		$arrFullName = $this->getFullName($connid);
		$arrAdvanceTours = $this->getTourAdvanceCheques($connid,$this->bankname,"employee",$this->projectConsider);
		$arrAdvanceToursKeys = array_keys($arrAdvanceTours);
		$paybydate = date("Y-m-d",mktime(0, 0, 0, date("m")  , date("d")+1, date("Y")));
		if(is_array($arrAdvanceToursKeys) && count($arrAdvanceToursKeys) > 0)
		{
			foreach ($arrAdvanceToursKeys as $row_name)
			{
				if(!in_array($row_name,$this->removeFromList))
        		{
        			/*$query = "UPDATE tour_advance SET payby_date = '".$paybydate."' WHERE applied_by = '".$row_name."' AND status = 'approved' AND cheque_no = '0' AND cheque_date = '0000-00-00' ";
        			$dbquery = new dbquery($query,$connid);*/
        		}
			}
		}
    }
    function getSchoolNameBySchoolCode($connid)
	{
		$this->setpostvars();
		if($this->action == "SetSchoolName")
		{
			$query = "SELECT schoolname FROM schools ".
					 "WHERE schoolno = '".$this->school_code."' ";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			//echo $row["schoolname"];
			return $row["schoolname"];
		}
		else
		{
			return 0;
		}
	}
	function getGuestTourDetails($connid)
	{
		$arrRet = array();
        $query = "SELECT guest_login.fullname,tour_expense_master.name,sum(checked_amount) as scm FROM tour_expense_master,tour_expense_items,guest_login WHERE tour_expense_master.tour_no = tour_expense_items.tour_master_tour_no AND tour_expense_master.name = guest_login.name AND cheque_no = '' AND tour_expense_master.name != '' AND checked_amount != '' AND tour_status = 'checked' AND payment_sent_date = '0000-00-00' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' GROUP BY tour_expense_master.name ";
		$query.=" UNION SELECT firstName as fullname,tour_expense_master.name,sum(checked_amount) as scm FROM tour_expense_master,tour_expense_items,contract_master WHERE tour_expense_master.tour_no = tour_expense_items.tour_master_tour_no AND tour_expense_master.name = contract_master.userID AND cheque_no = '' AND tour_expense_master.name != '' AND checked_amount != '' AND tour_status = 'checked' AND payment_sent_date = '0000-00-00' AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' AND bankno NOT IN ('18','9') GROUP BY tour_expense_master.name ";
		//echo $query;
        $dbquery = new dbquery($query,$connid);
        while($row = $dbquery->getrowarray())
        {
                $arrRet[$row["name"]] = array( "fullname"=>$row["fullname"],
                							   "name"=>$row["name"],
                                               "amount"=>$row["scm"]);
        }
        return $arrRet;
	}
	function getSchoolsForRefund($connid,$test_edition)
	{
		$arrRet = array();
		$query = "select ss.school_code, schoolname, s.city,
				(paid-refund_amt) paid_amt, amount_payable,
				answers_date,
				(amount_payable-(paid-refund_amt))
				from schools s,school_status ss,territory_allotment ta,school_refund_roundwise srr
				where schoolno = ss.school_code and s.territory=ta.territory
				and s.schoolno = srr.school_code and srr.test_edition ='".$test_edition."'
				and ss.test_edition='".$test_edition."'
				and (paid-refund_amt-amount_payable) > 0 and answers_date <> '0000-00-00'
				and despatch_date <> '0000-00-00' order by answers_date desc,7 and ss.school_code NOT IN (SELECT DISTINCT schoolcode FROM cheques_master WHERE schoolcode != '0' AND schoolcode != '' AND purpose_id = '13')";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
        {
                $diffrence=$row['paid_amt']-$row['amount_payable'];
                if($diffrence >= 100) {
        		$arrRet[$row["school_code"]] = array( "school_code"=>$row["school_code"],
        									   "schoolname"=>$row["schoolname"],
                							   "amount"=>$diffrence);
               }
        }
        return $arrRet;
	}
	function getReimbursementBillDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT billid,partyname,netpayable,b.userID,CONCAT(firstName,' ',lastName) as fullname FROM bill_master a,emp_master b,payroll_statusMaster c,bill_partyMaster d WHERE payto = concat(firstName,' ',lastName) AND b.userID = c.userID AND a.partyid = d.partyid AND status = 'Approved-2'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["userID"]][$row["billid"]] = array("billid"=>$row["billid"],
											"partyname"=>$row["partyname"],
											"userID"=>$row["userID"],
											"netpayable"=>$row["netpayable"],
											"fullname"=>$row["fullname"]
											
			
			);
		}
		return $arrRet;
	}
	function getReimbursementBills($connid,$bank,$projectConsider="")
	{
		$arrRet = array();
		
                /*
                 * To exclude Bills from Reimursement we are returning Records Array forcefully NULL
                 */
                /*
		$ts = time();
		# figure out what 7 days is in seconds
		$one_day = 1 * 24 * 60 * 60;
		# make last weeks date based on a past timestamp
		$tomorrow = date( "d-m-Y", ( $ts + $one_day ) );
		
		if($projectConsider == "1")
			$condition = " AND projectConsider = '6' ";
		else
			$condition = " AND projectConsider != '6' ";
		
		$query = "SELECT SUM(netpayable) as total_amount,b.userID,salaccountname FROM bill_master a,emp_master b,payroll_statusMaster c WHERE payto = concat(firstName,' ',lastName) AND b.userID = c.userID AND status = 'Approved-2' AND ( DATE(approved2_date) < CURDATE() OR (DATE(approved2_date) = CURDATE() AND HOUR(approved2_date) < '10') ) AND DATEDIFF('".$this->formatDate($tomorrow)."',paybydate) >= -1 AND reimbursement_accountWithBank = '".$bank."' ".$condition." GROUP BY payto";
		$dbquery = new dbquery($query,$connid);
		$arrBillAdvanceAdjustment = $this->advanceAdjustmentAgainstExpenses($connid,"B");
		$arrBillDetails = $this->getReimbursementBillDetails($connid); 
		while($row = $dbquery->getrowarray())
		{
			$message = "";
			$total_amount = 0;
			$advanceamount = 0;
			$arrDetails = $arrBillDetails[$row["userID"]];
			foreach($arrDetails as $bill)
			{
				$message.="<tr><td>Bill</td><td>".$bill["partyname"]."</td><td>".$bill["billid"]."</td><td>".round($bill["netpayable"])."</td><td>".$bill["netpayable"]."</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
				for($i = 0;$i<count($arrBillAdvanceAdjustment[$bill["billid"]]);$i++)
				{
					//echo $arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["advance_id"];
					$message.="<tr><td>Advance ID ".$arrBillAdvanceAdjustment[$bill["billid"]][$i]["advance_id"]." Adjustment aga this Fare Exp</td><td>&nbsp;</td><td>--</td><td>--</td><td>".($arrBillAdvanceAdjustment[$bill["billid"]][$i]["totalamt"])*(-1)."</td><td>--</td><td>--</td></tr>";
					//$advanceTotalAmount = $advanceTotalAmount + $arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["totalamt"];
				}
				$queryAdvance = "SELECT sum(amount) FROM advance_adjustment_details WHERE type = 'B' AND code = '".$bill["billid"]."'";
				$dbqueryAdvance = new dbquery($queryAdvance,$connid);
				$rowAdvance = $dbqueryAdvance->getrowarray();
				if($rowAdvance[0] > 0)
					$advanceamount = $advanceamount + $rowAdvance[0];
			}
			$total_amount =   $row["total_amount"] - $advanceamount;
			if($total_amount > 0)
			{
				$arrRet[$row["userID"]] = array("total_amount"=>$total_amount,
											"message"=>$message,
											"fullname"=>$row["salaccountname"]
				);	
			}
		}
                */
		return $arrRet;
	}
	function getReimbursementTours($connid,$category,$projectConsider="")
	{
		if($category == "employee")
			$queryM = "SELECT name,fullname FROM marketing,payroll_statusMaster,emp_master WHERE marketing.name = payroll_statusMaster.userID AND marketing.name = emp_master.userID AND leftDate IS NULL AND reimbursement_accountWithBank = 'ICICI Bank' UNION SELECT name,fullname FROM marketing e,contract_master f WHERE e.name = f.userID AND bankno = '9' ";
		elseif($category == "employeeAxisBank")
			$queryM = "SELECT name,fullname FROM marketing,payroll_statusMaster,emp_master WHERE marketing.name = payroll_statusMaster.userID AND marketing.name = emp_master.userID AND leftDate IS NULL AND reimbursement_accountWithBank = 'Axis Bank' AND marketing.category != 'TC' UNION SELECT name,fullname FROM marketing e,contract_master f WHERE e.name = f.userID AND bankno = '18'";
		elseif($category == "guest_login")
			$queryM = "SELECT name,fullname FROM guest_login UNION SELECT name,fullname FROM contract_master a,marketing b WHERE a.userID = b.name AND bankno NOT IN (9,18)";
		elseif($category == "employeeWithAccNo")
			$queryM = "SELECT name,fullname FROM marketing WHERE category != 'TC' AND name NOT IN (SELECT userID FROM payroll_statusMaster)";
		elseif($category == "scodcoea")
			$queryM	= "SELECT name,fullname FROM marketing WHERE (category = 'SCO' OR category = 'DCO' OR category = 'EA' OR fullname = 'SZM') ";

                //echo $queryM;
		if($projectConsider == "1")
			$condition = " AND projectConsider = 6 " ;
		else
			$condition = " AND projectConsider != 6 " ;
		if($category == "employee")
			$bank = "ICICI Bank";
		else
			$bank = "Axis Bank";
		$arrAdvances = $this->getTourAdvanceCheques($connid,$bank,$category,$projectConsider);
		$arrCreditNoteTours = $this->getAllCreditNoteTours($connid);
		$arrTourAdvanceAdjustment = $this->advanceAdjustmentAgainstExpenses($connid,"T");
		$dbqueryM = new dbquery($queryM,$connid);
		while($rowM = $dbqueryM->getrowarray())
		{
			$final_checked_amount = "";
			$advanceTotalAmount = 0;
			$message="";
			$query = "SELECT tour_no,name,start_date,end_date,completion_date,comments,tour_purpose,
                    DATEDIFF(completion_date,end_date) as days,DATEDIFF(CURDATE(),supportings_received_date) as accdays,
                    sum(checked_amount),sum(approved_amount),sum(amount),penalty_removed_reason FROM tour_expense_master,tour_expense_items WHERE tour_expense_master.tour_no = tour_expense_items.tour_master_tour_no
					AND cheque_no = ''
                    AND name = '".$rowM["name"]."' AND checked_amount != ''
                    AND tour_status = 'checked' AND payment_sent_date = '0000-00-00'
					AND (paid_by = '".$rowM["name"]."' OR paid_by = '' OR paid_by IS NULL)
                    AND DATE_FORMAT(payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition." GROUP BY tour_no";
		    $dbquery = new dbquery($query,$connid);
		    while($rowSelectTour = $dbquery->getrowarray())
		    {
				$end_date_tour = "";
				$completion_date_tour = "";
				$pc_percentage = "";
				$pc_diff = 0;
				$pc_total = $rowSelectTour["sum(amount)"];
				$pc_total_checked = $rowSelectTour["sum(checked_amount)"];
				$pc_total_approved = $rowSelectTour["sum(approved_amount)"];

				if($arrCreditNoteTours[$rowSelectTour["tour_no"]][$rowM["name"]] != '' && $arrCreditNoteTours[$rowSelectTour["tour_no"]][$rowM["name"]] != 0)
				{
					$pc_total = $pc_total - $arrCreditNoteTours[$rowSelectTour["tour_no"]][$rowM["name"]];
					$pc_total_checked = $pc_total_checked - $arrCreditNoteTours[$rowSelectTour["tour_no"]][$rowM["name"]];
					$pc_total_approved = $pc_total_approved - $arrCreditNoteTours[$rowSelectTour["tour_no"]][$rowM["name"]];
				}
		    	if(str_replace('-','',$rowSelectTour["start_date"]) >= '20080325' && $rowSelectTour["penalty_removed_reason"] == "")
				{
					$arrPercentageSlab = array("15,24"=>10,"25,34"=>30,"35,44"=>50,"45,59"=>75);
					$days  = 0;
					$accdays ="";
					$end_date_tour = $rowSelectTour["end_date"];
					$completion_date_tour = $rowSelectTour["completion_date"];
					$NameCheck = $rowSelectTour["name"];
					if($rowSelectTour["days"] == "")
						$days = 0;
					else
						$days = $rowSelectTour["days"];

					if($rowSelectTour["accdays"] == "")
						$accdays = 0;
					else
						$accdays = $rowSelectTour["accdays"];

					//echo "Final Days for the tour are:".$final_days;
					if($days <= 2)
					{
						$pc_status = "+";
						$pc_percentage = 2;
						if($pc_total_checked == 0)
							$pc_diff = round(($pc_total/100)*2);
						else
							$pc_diff = round(($pc_total_checked/100)*2);

						if(round(($pc_total /100)*2) >= 500)
						{
							$pc_total = $pc_total + 500;
						}
						else
						{
							$pc_total = $pc_total  + round(($pc_total /100)*2);
						}
						if(round(($pc_total_checked/100)*2) >= 500)
						{
							$pc_total_checked = $pc_total_checked + 500;
						}
						else
						{
							$pc_total_checked = $pc_total_checked + round(($pc_total_checked/100)*2);
						}
						if(round(($pc_total_approved/100)*2) >= 500)
						{
							$pc_total_approved = $pc_total_approved + 500;
						}
						else
						{
							$pc_total_approved = $pc_total_approved + round(($pc_total_approved/100)*2);
						}
					}
					if($days >=3 && $days <=10)
					{
						$pc_percentage = 0;
						if($pc_total_checked == 0)
							$pc_diff = round(($pc_total/100)*0);
						else
							$pc_diff = round(($pc_total_checked/100)*0);

						$pc_total = $pc_total + 0;
						$pc_total_checked = $pc_total_checked + 0;
						$pc_total_approved = $pc_total_approved + 0;
					}
					if($days >10 && $days <= 14)
					{
						$pc_status = "-";
						$pc_percentage = 5;

						if($pc_total_checked == 0)
							$pc_diff = round(($pc_total/100)*5);
						else
							$pc_diff = round(($pc_total_checked/100)*5);

						$pc_total = $pc_total - round(($pc_total/100)*5);
						$pc_total_checked = $pc_total_checked - round(($pc_total_checked/100)*5);
						$pc_total_approved = $pc_total_approved - round(($pc_total_approved/100)*5);
					}

					foreach($arrPercentageSlab as $key=>$value)
					{
						$keyslab = explode(',',$key);
						if($days >= $keyslab[0] && $days <= $keyslab[1])
						{
							$pc_status = "-";
							$pc_percentage = $value;
							if($pc_total_checked == 0)
								$pc_diff = round(($pc_total/100)*$value);
							else
								$pc_diff = round(($pc_total_checked/100)*$value);

							$pc_total = $pc_total - round(($pc_total/100)*$value);
							$pc_total_checked = $pc_total_checked - round(($pc_total_checked/100)*$value);
							$pc_total_approved = $pc_total_approved - round(($pc_total_approved/100)*$value);
						}
					}
					if($days >= 60)
					{
						$pc_status = "-";
						$pc_percentage = 100;
						$pc_diff = round($pc_total_checked/100)*100;
						$pc_total = $pc_total - round(($pc_total/100)*100);
						$pc_total_checked = $pc_total_checked - round(($pc_total_checked/100)*100);
						$pc_total_approved = $pc_total_approved - round(($pc_total_approved/100)*100);
					}
				// Penalty and Reward application finishes up here


				} // Final if condition is ending here
				$queryAdvance = "SELECT sum(amount) FROM advance_adjustment_details WHERE type = 'T' AND code = '".$rowSelectTour["tour_no"]."'";
				$dbqueryAdvance = new dbquery($queryAdvance,$connid);
				$rowAdvance = $dbqueryAdvance->getrowarray();
				//$pc_total_checked = $pc_total_checked - $rowAdvance[0];
				$final_checked_amount = $final_checked_amount + ($pc_total_checked - $rowAdvance[0]);
				$message.="<tr><td>Tour</td><td>".$rowSelectTour["tour_purpose"]."</td><td>".$rowSelectTour["tour_no"]."</td><td>".$pc_total."</td><td>".$pc_total_checked."</td><td>".($pc_total - $pc_total_checked)."</td><td>".$rowSelectTour["comments"]."&nbsp;</td></tr>";
				for($i = 0;$i<count($arrTourAdvanceAdjustment[$rowSelectTour["tour_no"]]);$i++)
				{
					//echo $arrTourAdvanceAdjustment[$rowSelectTour["tour_no"]][$i]["advance_id"];
					$message.="<tr><td>Advance ID ".$arrTourAdvanceAdjustment[$rowSelectTour["tour_no"]][$i]["advance_id"]." Adjustment aga this Tour</td><td>&nbsp;</td><td>--</td><td>--</td><td>".($arrTourAdvanceAdjustment[$rowSelectTour["tour_no"]][$i]["totalamt"])*(-1)."</td><td>--</td><td>--</td></tr>";
					$advanceTotalAmount = $advanceTotalAmount + $arrTourAdvanceAdjustment[$rowSelectTour["tour_no"]][$i]["totalamt"];
				}

		    } // Second while condition finished here
		    $yesterdayHoliday = $this->getHolidayStatus($dbconnect->connid);
            if($final_checked_amount != "")
            {
                if(date("D") == "Mon" || date("D") == "Thu" || (date("D") == "Fri" && $yesterdayHoliday > 0) || (date("D") == "Tue" && $yesterdayHoliday > 0))
				{
					//$queryAdvance1 = "SELECT sum(approved_amount) as advanceamount,sum(advance_amount) as appliedamount FROM tour_advance WHERE applied_by = '".$rowM["name"]."' AND status = 'Approved' AND used = 0 ";
					//$dbqueryAdvance1 = new dbquery($queryAdvance1,$connid);
					//$rowAdvance1 = $dbqueryAdvance1->getrowarray();
					//$message.="<tr><td>Advance Amount</td><td>&nbsp;</td><td>".$rowAdvance1["appliedamount"]."</td><td>".$rowAdvance1["advanceamount"]."</td><td>".($rowAdvance1["appliedamount"] - $rowAdvance1["advanceamount"])."</td><td>Your sbu head has approved amount: ".$rowAdvance1["advanceamount"]."/-&nbsp;</td></tr>";

					if($arrAdvances[$rowM["name"]]["approved_amount"] != "")
					{
						$final_checked_amount = $final_checked_amount + $arrAdvances[$rowM["name"]]["approved_amount"];
						$message.=$arrAdvances[$rowM["name"]]["message"];
					}

				}
				//echo $final_checked_amount."<br>".$rowM["name"];
				if($final_checked_amount > 0)
				{
					//$final_checked_amount = $final_checked_amount - $advanceTotalAmount;
					if($category == "guest_login" || $category == "scodcoea")
                        $arrRet[$rowM["name"]] = array("name"=>$rowM["name"],"fullname"=>$rowM["fullname"],"amount"=>$final_checked_amount,"message"=>$message);
                	else
                        $arrRet[$rowM["name"]] = array("name"=>$rowM["name"],"amount"=>$final_checked_amount,"message"=>$message);
				}

            }
		}
		return $arrRet;
	}
	function getTourAdvanceCheques($connid,$bank="ICICI Bank",$category="employee",$projectConsider="")
	{
		$arrRet = array();
		/*$time_check = "AND ( 
								(approval3_status = 'Approved' AND ( DATE(approval3_date) < CURDATE() OR (HOUR(approval3_date) < '10' AND DATE(approval3_date) = CURDATE() )) ) 
						 		OR (approval2_status = 'Approved' AND approval3_date IS NULL AND ( DATE(approval2_date) < CURDATE() OR (HOUR(approval2_date) < '10' AND DATE(approval2_date) = CURDATE() )) ) 
						 		OR (approval1_status = 'Approved' AND approval2_date IS NULL AND ( DATE(updated_date) < CURDATE() OR (HOUR(updated_date) < '10' AND DATE(updated_date) = CURDATE() )) )
							)";*/
							
		$time_check = " AND ((DATE(tour_advance.lastModified) < CURDATE()) OR (HOUR(tour_advance.lastModified) < '10'))"; 
							
		if($projectConsider == "1")
			$condition = " AND sbuproject_id = 6 " ;
		else
			$condition = " AND sbuproject_id != 6 " ;
		if(strtolower($bank) == "icici bank")	
			$bankno = "9";
		else
			$bankno = "18";
			
		if($category == "employee" || $category == "employeeAxisBank")
		{
			$query = "SELECT applied_by,status,sum(approved_amount),sum(advance_amount),tour_purpose FROM tour_advance,payroll_statusMaster WHERE tour_advance.applied_by = payroll_statusMaster.userID AND status='Approved' AND cheque_no = '0' AND cheque_id = '0' AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."'  ".$time_check." AND reimbursement_accountWithBank = '".$bank."' ".$condition." GROUP BY applied_by ";
			$query.= "UNION SELECT applied_by,status,sum(approved_amount),sum(advance_amount),tour_purpose FROM tour_advance,contract_master WHERE tour_advance.applied_by = contract_master.userID AND status='Approved' AND cheque_no = '0' AND cheque_id = '0' AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."' ".$time_check." AND bankno = '".$bankno."' ".$condition." GROUP BY applied_by ";
		}
		else
		{
			$query = "SELECT applied_by,status,sum(approved_amount),sum(advance_amount),tour_purpose FROM tour_advance WHERE  status='approved' AND cheque_no = '0' AND cheque_id = '0' AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."' AND applied_by IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO' OR category = 'EA')) ".$condition." ".$time_check." GROUP BY applied_by";
		}
		//echo '<br></br>'.$query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrDetails = $this->getTourAdvanceDetails($connid,$bank,$category);
			$message = "";
			$details = $arrDetails[$row["applied_by"]];
			if(is_array($details) && count($details)>0)
			{
				foreach($details as $dtls)
				{
					$message.="<tr><td>(".$dtls["type"].") Advance Amount</td><td>".$dtls["tour_purpose"]."</td><td>".$dtls["id"]."</td><td>".$dtls["advance_amount"]."</td><td>".$dtls["approved_amount"]."</td><td>".($dtls["advance_amount"] - $dtls["approved_amount"])."</td><td>-</td></tr>";
				}
			}
			$arrRet[$row["applied_by"]] = array("applied_by"=>$row["applied_by"],
												"status"=>$row["status"],
												"approved_amount"=>$row["sum(approved_amount)"],
												"amount"=>$row["sum(advance_amount)"],
												"message"=>$message
												);
		}
		return $arrRet;
	}
	function getTourAdvanceDetails($connid,$bank,$category)
	{
		$arrRet = array();
		if(strtolower($bank) == "icici bank")	
			$bankno = "9";
		else
			$bankno = "18";
		if($category == "employee" || $category == "employeeAxisBank")
		{
			$query = "SELECT applied_by,status,approved_amount,advance_amount,id,type FROM tour_advance,payroll_statusMaster WHERE tour_advance.applied_by = payroll_statusMaster.userID AND status='approved' AND cheque_no = '0' AND cheque_id = '0' AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."' AND reimbursement_accountWithBank = '".$bank."' ";
			$query.= "UNION SELECT applied_by,status,approved_amount,advance_amount,id,type FROM tour_advance,contract_master WHERE tour_advance.applied_by = contract_master.userID AND status='approved' AND cheque_no = '0' AND cheque_id = '0' AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."' AND bankno = '".$bankno."' ";
		}
		else
		{
			$query = "SELECT applied_by,status,approved_amount,advance_amount,id,type FROM tour_advance WHERE  status='approved' AND cheque_no = '0' AND cheque_id = '0' AND DATE_FORMAT(payby_date,'%Y%m%d') <= '".date('Ymd')."' AND applied_by IN (SELECT name FROM marketing WHERE (category = 'SCO' OR category = 'DCO' OR category = 'EA'))";
		}
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row["type"] == "T")
				$type = 'Tour';
			elseif($row["type"] == "G")
				$type = 'General';
			$arrRet[$row["applied_by"]][$row["id"]] = array("id"=>$row["id"],
										"applied_by"=>$row["applied_by"],
										"status"=>$row["status"],
										"type"=>$type,
										"approved_amount"=>$row["approved_amount"],
										"advance_amount"=>$row["advance_amount"]
									);
		}
		return $arrRet;
	}
	function getScoDcoTourAdvanceCheques($connid)
    {
		/*$time_check = "AND ( 
							(approval3_status = 'Approved' AND ( DATE(approval3_date) < CURDATE() OR (HOUR(approval3_date) < '10' AND DATE(approval3_date) = CURDATE() )) ) 
					 		OR (approval2_status = 'Approved' AND approval3_date IS NULL AND ( DATE(approval2_date) < CURDATE() OR (HOUR(approval2_date) < '10' AND DATE(approval2_date) = CURDATE() )) ) 
					 		OR (approval1_status = 'Approved' AND approval2_date IS NULL AND ( DATE(updated_date) < CURDATE() OR (HOUR(updated_date) < '10' AND DATE(updated_date) = CURDATE() )) )
						)";*/
		
		$time_check = " AND ((DATE(tour_advance.lastModified) < CURDATE()) OR (HOUR(tour_advance.lastModified) < '10'))"; 
		
    	$arrRet = array();
        $query = "SELECT applied_by,status,sum(approved_amount) FROM tour_advance WHERE status='approved' AND cheque_no = '0' AND cheque_id = '0' AND applied_by IN (SELECT name FROM marketing WHERE category IN ('SCO','DCO') ) AND applied_by NOT IN (SELECT userID FROM payroll_statusMaster) ".$time_check." GROUP BY applied_by";
        $dbquery = new dbquery($query,$connid);
        while($row = $dbquery->getrowarray())
        {
                $arrRet[$row["applied_by"]] = array("applied_by"=>$row["applied_by"],
                                                    "status"=>$row["status"],
                                                    "approved_amount"=>$row["sum(approved_amount)"]
												   );
        }
		return $arrRet;

    }
	function getIncentiveAmountForRM($connid,$EA)
	{
		$year = '2008';
		$test_edition="'F','G'";
		define("ASTUDENTS", "no_of_students+ceil((ss5+ss6+ss7+ss8+ss9+ss10+h4+h5+h6+h7+h8)/2)");
		define("NSTUDENTS", "no_of_students");
		$arrRet = array();
		if($EA == 1)
			$queryRM = "SELECT name,category FROM marketing WHERE category IN ('EA') AND email != ''";
		else
			$queryRM = "SELECT name,category FROM marketing WHERE category IN ('RM','ZM','AM','SRM') AND email != ''";

		$dbqueryRM = new dbquery($queryRM,$connid);
		while($rowRM = $dbqueryRM->getrowarray())
		{
			$whereclause = '';
			$target_result = mysql_query("select incentive_target,fixed_incentive,incentive_percent from person_target_master where year='".$year."' and person='".$rowRM["name"]."'") or die(mysql_error());
			$target_line = mysql_fetch_array($target_result);
			$target = $target_line['incentive_target'];
			$fixed_incentive = $target_line['fixed_incentive'];
			$incentive_rate = $target_line['incentive_percent'];

			$whereclause .= " and (zm_username='".$rowRM["name"]."' or rm_username='".$rowRM["name"]."' or ea_username='".$rowRM["name"]."') ";


			$str="select ss.school_code, schoolname, s.city, s.territory,".ASTUDENTS." astud, ".NSTUDENTS." nstud, ssf_date,
			paid,refund_amt,deduct1,deduct2,amount_payable,aro_form_date,
			ea_username,rm_username,zm_username
			from schools s, school_status ss, territory_allotment ta,status_incentive_roundwise sir
			where schoolno = ss.school_code
			and ss.test_edition IN (".$test_edition.")
			and s.territory=ta.territory
			and s.schoolno = sir.school_code and (sir.incentive_for_rm = '".$rowRM["name"]."' or sir.incentive_for_ea = '".$rowRM["name"]."')
			and sir.status = 'approved2' and sir.entered_by='sudhir'
			and ssf_date >= from_date and ssf_date <= current_date
			and amount_payable>0 ".$whereclause;

			$str .= " UNION ";

			$str.="select ss.school_code, schoolname, s.city, s.territory,".ASTUDENTS." astud,".NSTUDENTS." nstud, ssf_date,
			paid,refund_amt,deduct1,deduct2,amount_payable,aro_form_date,
			ea_username,rm_username,zm_username
			from schools s, school_status ss, territory_allotment_history tah,status_incentive_roundwise sir
			where schoolno = ss.school_code
			and ss.test_edition IN (".$test_edition.")
			and s.territory=tah.territory
			and s.schoolno = sir.school_code and (sir.incentive_for_rm = '".$rowRM["name"]."' or sir.incentive_for_ea = '".$rowRM["name"]."')
			and sir.status = 'approved2' and sir.entered_by='sudhir'
			and ssf_date >= from_date and ssf_date <= to_date
			and amount_payable>0 ".$whereclause;

			$str .=" order by astud desc";

			//and (paid1+paid2+paid3-(refund_amt+deduct1+deduct2) >= amount_payable * 0.99)
			//echo $str;
			$sch_count = mysql_query($str) or die(mysql_error());
			$schs = mysql_num_rows($sch_count);

			//echo "$str<BR>";

			$srno=1;
			$cum_no_of_student=0;
			$total_amount_payable=0;
			$total_paid=0;
			$total_incentive_amount=0;
			$cross80=0;
			$achieved=0;
			if($EA == 0)
				$cutoff_target = $target*0.80;

			$result = mysql_query($str) or die(mysql_error());
			$recv = mysql_num_rows($result);
			while($line = mysql_fetch_array($result))
			{
				//echo $line['school_code']."--";
				$amount_payable = $line['amount_payable'];
				$total_amount_payable += $line['amount_payable'];
				$paid = $line['paid']-$line['refund_amt'];

				$incentive_percent=0;
				$incentive_amount=0;
				$consider_amount = $amount_payable * 0.99;

				//$bgcolor='pink';

				if($paid > $consider_amount)
				{
					//$bgcolor='#FFFFFF';

					$total_paid += $paid;

					if($line['aro_form_date']<>0)
						$stud = $line['astud'];
					else
						$stud = $line['nstud'];

					$cum_no_of_student += $stud;

					if($line['amount_payable']>$paid)
						$onamount = $paid;
					else
						$onamount = $line['amount_payable'];

					//echo $cum_no_of_student.",,,".$target*0.80."<br>";

					if(($rowRM["category"]=='RM' || $rowRM["category"]=='AM' || $rowRM["category"]=='SRM' || $rowRM["category"]=='ZM') && $rowRM["name"]<>'SZM' && $cum_no_of_student >= $target*0.80)
					{
						$join_date_result = mysql_query("select joinDate from emp_master where userID='".$rowRM["name"]."'") or die(mysql_error());
						$join_date_row = mysql_fetch_array($join_date_result);
						$join_date = $join_date_row['joinDate'];

						$ssf_date = $line['ssf_date'];
						if($ssf_date > $join_date)
						{
							$achieved=1;

							$incentive_percent = $incentive_rate;
							if($cross80==0)
							{
								$consider_students = ($cum_no_of_student - $target*0.80);
								$onamount = ($onamount/$stud)*$consider_students;

								$cross80 = 1;
								//$bgcolor = '#99FF99';
							}

							$incentive_amount = round(($onamount*$incentive_percent)/100);
							$total_incentive_amount += $incentive_amount;

						}
					}
					if($rowRM["category"]=='EA' || $rowRM["name"]=='SZM')
					{
						//Not needed for EA's Confirmed by Vidhi
						//$visit_result = mysql_query("select * from presales_visits where test_edition in (".$test_edition.") and schoolCode=".$line['school_code']." and contactMediumCode in('VT','PH') and visitorID='".$Name."'") or die(mysql_error());
						$visit_phone_line = mysql_num_rows($visit_result);
						//if($visit_phone_line > 0)
						//{
							if($incentive_rate>0)
								$incentive_percent = $incentive_rate;
							else
								$incentive_percent = 12;
						//}
						//else
							//$incentive_percent = 0;

						if($rowRM["name"]=='deepali' || $rowRM["name"]=='n.kalpana' || $rowRM["name"]=='jayanthi.manjunath' || $rowRM["name"]=='nagaraja')
							$incentive_percent = $incentive_rate;
						$incentive_amount = round(($onamount*$incentive_percent)/100);
						$total_incentive_amount += $incentive_amount;

					}
				}
				else
				{
					if($line['aro_form_date']<>0)
						$stud = $line['astud'];
					else
						$stud = $line['nstud'];
				}

				//$srno++;

			}
			if($total_incentive_amount != 0)
				$arrRet[$rowRM["name"]] = array("name"=>$rowRM["name"],"cum_no_of_student"=>$cum_no_of_student,"total_amount_payable"=>$total_amount_payable,"total_paid"=>$total_paid,"total_incentive_amount"=>$total_incentive_amount,"fixed_incentive"=>$fixed_incentive);
		}
		return $arrRet;
	}
	/* function added by Jaspreet on 2009-07-27 for separately calculating the fare amount and relative CC holder*/
	function getFareReimbursementDetails($connid,$bank,$projectConsider="")
	{
		$arrRet = array();
		if($projectConsider == "1")
			$condition = " AND projectConsider = '6' ";			
		else
			$condition = " AND projectConsider != '6' ";
		$arrFareAdvanceAdjustment = $this->advanceAdjustmentAgainstExpenses($connid,"F");
		$query = "SELECT sum(amount) as chkd_amount,tour_payment_details.name FROM tour_payment_details,payroll_statusMaster,emp_master,tour_expense_master
			WHERE tour_payment_details.name = payroll_statusMaster.userID
			AND tour_payment_details.name = emp_master.userID
			AND tour_payment_details.tour_code = tour_expense_master.tour_no
			AND reimbursement_accountWithBank = '$bank'
			AND leftDate IS NULL
			AND status = 'pending' AND DATE_FORMAT(tour_payment_details.payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition." GROUP BY name ";
		
		$query.= "UNION SELECT sum(amount) as chkd_amount,tour_payment_details.name FROM tour_payment_details,contract_master,tour_expense_master,banknamelist 
					WHERE tour_payment_details.name = contract_master.userID 
					AND tour_payment_details.tour_code = tour_expense_master.tour_no
					AND contract_master.bankno = banknamelist.bankno
					AND bankname = '$bank' AND status = 'pending'
					AND DATE_FORMAT(tour_payment_details.payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition." GROUP BY name
					";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$message="";
			$advanceamount = 0;
			$totalamount = 0;
			
			$queryTour = "SELECT tour_code,a.amount FROM tour_payment_details a,tour_expense_master b WHERE a.tour_code = b.tour_no AND status = 'pending' AND a.name = '".$row["name"]."' AND DATE_FORMAT(a.payby_dt,'%Y%m%d') <= '".date('Ymd')."' ".$condition;
			$dbqueryTour = new dbquery($queryTour,$connid);
			while($rowTour = $dbqueryTour->getrowarray())
			{
				$strTicketDetails = "";
				$arrTicketDetails = $this->getTicketDetailsNotPaidByTourist($connid,$rowTour["tour_code"],$row["name"]);
				if(is_array($arrTicketDetails) && count($arrTicketDetails)>0)
				{
					$strTicketDetails = implode("<br>",$arrTicketDetails);
				}
				$message.= "<tr><td>Ticket</td><td>".$strTicketDetails."</td><td>".$rowTour["tour_code"]."</td><td>".$rowTour["amount"]."</td><td>".$rowTour["amount"]."</td><td>0</td><td>&nbsp;</td></tr>";
				for($i = 0;$i<count($arrFareAdvanceAdjustment[$rowTour["tour_code"]]);$i++)
				{
					//echo $arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["advance_id"];
					$message.="<tr><td>Advance ID ".$arrFareAdvanceAdjustment[$rowTour["tour_code"]][$i]["advance_id"]." Adjustment aga this Fare Exp</td><td>&nbsp;</td><td>--</td><td>--</td><td>".($arrFareAdvanceAdjustment[$rowTour["tour_code"]][$i]["totalamt"])*(-1)."</td><td>--</td><td>--</td></tr>";
					//$advanceTotalAmount = $advanceTotalAmount + $arrLocalAdvanceAdjustment[$tourno["tour_no"]][$i]["totalamt"];
				}
				$queryAdvance = "SELECT sum(amount) FROM advance_adjustment_details WHERE type = 'F' AND code = '".$rowTour["tour_code"]."'";
				$dbqueryAdvance = new dbquery($queryAdvance,$connid);
				$rowAdvance = $dbqueryAdvance->getrowarray();
				if($rowAdvance[0] > 0)
					$advanceamount = $advanceamount + $rowAdvance[0];
			}
			//$message.="</table><br><br>Regards,<br>Ketan";
			$totalamount = $row["chkd_amount"];
			if($advanceamount > 0)
				$totalamount = $row["chkd_amount"] - $advanceamount;
			$arrRet[$row["name"]] = array("chequeno_ccholder"=>$row["name"],
			                              "chkd_amount"=>$totalamount,
										  "message"=>$message
										);
		}
		return $arrRet;
	}
	function getTelcallerSalary($connid,$bankno,$monthSelect=0,$yearSelect=0,$crypt)
	{
			$arrRet = array();
			$arrEmpty = array();
			$current_month=date("m")-1;
			$current_year=date("Y");
			$laptopAllowance = 0;
			$desktopAllowance = 0;
			if($monthSelect == 0)
			{
				$current_month = 12;	
				$current_year = $current_year - 1;
			}
			if(!isset($monthSelect) || $monthSelect == 0)
				$monthSelect=$current_month;
			if(!isset($yearSelect) || $yearSelect == 0)
				$yearSelect=$current_year;
			$date=date("Y-m-d",mktime(0,0,0,$monthSelect,1,$yearSelect));
			//$date=date("Y-m-d");
			$year=substr($date,0,4);
			$month=substr($date,5,2);
			$day=substr($date,8,2);
			$current_time=mktime(0,0,0,$month,$day,$year);
			$float_time = 24 * 60 * 60;

			$daysInMonth=date("t",$current_time);
			$date=date("Y-m-d",mktime(0,0,0,$monthSelect,$daysInMonth,$yearSelect));
			$arrAdditions = $this->getTelecallerAdjustments($connid,"Add",$monthSelect,$yearSelect);
			$arrDeductions = $this->getTelecallerAdjustments($connid,"Subtract",$monthSelect,$yearSelect);
			$arrAdditionscig = $this->getTelecallerAdjustmentsCig($connid,"Add",$monthSelect,$yearSelect);
			$arrDeductionscig = $this->getTelecallerAdjustmentsCig($connid,"Subtract",$monthSelect,$yearSelect);

			/*if(!in_array($Name,$showall))
		  	{
		  		echo "<center><b>Please take authorization</b></center>";
		  		exit;
		  	}*/


			for($i=1;$i<=$daysInMonth;$i++)
			{
				$weekDay=date("D",mktime(0,0,0,$monthSelect,$i,$yearSelect));
				$weekDay=substr($weekDay,0,1);

			}
			if($bankno == "NON")
				$query="SELECT * FROM contract_master em, marketing m where em.userId=name  AND bankno NOT IN ('9','18') AND considerInPayroll = '1' ORDER BY location,firstName";
			else 
				$query="SELECT * FROM contract_master em, marketing m where em.userId=name  AND bankno = '".$bankno."' AND considerInPayroll = '1' ORDER BY location,firstName";
				
			$result=mysql_query($query);
			$srno=0;
			while($user_row = mysql_fetch_array($result))
			{
				$srno++;
				$userID=$user_row['userID'];
				$firstName=$user_row['firstName'];
				$lastName=$user_row['lastName'];
				$startTime=$user_row['startTime'];
				$endTime=$user_row['endTime'];
				$additions = 0;
				$deductions = 0;
				$sundaysCnt=0;
				$otherHolidaysCnt=0;
				$laptopAllowance = 0;
				$desktopAllowance = 0;
				$joinDate = strtotime($user_row["joinDate"]);
				/*$joinDate = $user_row["joinDate"];
				$joinMonth = $user_row["joinMonth"];
				$joinYear = $user_row["joinYear"];
				$joinDay = $user_row["joinDay"];*/
				
				for($i=1;$i<=$daysInMonth;$i++)
				{
					$current_time=mktime(0,0,0,$month,$i,$year);
					$comp_date = strtotime($year."-".$month."-".$i);
					if(date("D",$current_time)=="Sun" && $joinDate < $comp_date)
						$sundaysCnt++;
	
				}
				for($i=1;$i<=$daysInMonth;$i++)
				{
					$holiday_query="SELECT count(*) FROM holiday_master WHERE holidayDate='$year-$month-$i' AND dayname(holidayDate) != 'Sunday' ";
					$holiday_result=mysql_query($holiday_query);
					$holiday_user_row=mysql_fetch_array($holiday_result);
					$records=$holiday_user_row['count(*)'];
					$hdcomp_date = strtotime($year."-".$month."-".$i);
					if($records==1 && $joinDate < $hdcomp_date)
					{
						$otherHolidaysCnt++;
					}
				}
				$emp_query="SELECT count(*) FROM dailyLogin WHERE concat(date,' ','$startTime')>=startTime AND userID='$userID' AND date LIKE '$year-$month-%' ";
				$emp_result=mysql_query($emp_query);
				$emp_user_row = mysql_fetch_array($emp_result);
				$withinTimeCnt=$emp_user_row["count(*)"];

				$emp_query="SELECT count(*) FROM dailyLogin WHERE concat(date,' ','$startTime')<startTime AND startTime<=(concat(date,' ','$startTime')+INTERVAL 5 MINUTE) AND userID='$userID'  AND date LIKE '$year-$month-%' ";
				$emp_result=mysql_query($emp_query);
				$emp_user_row = mysql_fetch_array($emp_result);
				$zeroToFiveMinsLateCnt=$emp_user_row["count(*)"];

				$emp_query="SELECT count(*) FROM dailyLogin WHERE (concat(date,' ','$startTime')+INTERVAL 5 MINUTE) <startTime AND startTime<=(concat(date,' ','$startTime') + INTERVAL 15 MINUTE) AND userID='$userID'  AND date LIKE '$year-$month-%' ";
				$emp_result=mysql_query($emp_query);
				$emp_user_row = mysql_fetch_array($emp_result);
				$fiveToFifteenMinsLateCnt=$emp_user_row["count(*)"];

				$emp_query="SELECT count(*) FROM dailyLogin WHERE startTime>(concat(date,' ','$startTime')+ INTERVAL 15 MINUTE) AND userID='$userID' AND date LIKE '$year-$month-%' ";
				$emp_result=mysql_query($emp_query);
				$emp_user_row = mysql_fetch_array($emp_result);
				$greaterThanFifteenMinsLateCnt=$emp_user_row["count(*)"];

				$totalMinsLate_start_query = "select sum((time_to_sec(timeDiff(time(substring(startTime,12,6)),time('$startTime'))))/60) from dailyLogin where date like '$year-$month-%' and userId='$userID' and time(substring(startTime,12,6))>time('$startTime')";
				$totalMinsLate_start_result = mysql_query($totalMinsLate_start_query);
				$totalMinsLate_start_row = mysql_fetch_array($totalMinsLate_start_result);
				$totalMinsLateStartCnt = $totalMinsLate_start_row[0];

				$totalMinsLate_login_query = "select sum((time_to_sec(timeDiff(time(substring(loginTime,12,6)),time('$startTime'))))/60) from dailyLogin where date like '$year-$month-%' and userId='$userID' and time(substring(loginTime,12,6))>time('$startTime')";
				$totalMinsLate_login_result = mysql_query($totalMinsLate_login_query);
				$totalMinsLate_login_row = mysql_fetch_array($totalMinsLate_login_result);
				$totalMinsLateLoginCnt = $totalMinsLate_login_row[0];

				$presenceArray=array();
				$emp_query="SELECT date FROM dailyLogin WHERE userID='$userID'  AND date LIKE '$year-$month-%' ";
				$emp_result=mysql_query($emp_query);
				while($emp_user_row = mysql_fetch_array($emp_result))
				{
					/*
					$startTime=$user_row['startTime'];
					$year=substr($startTime,0,4);
					$month=substr($startTime,5,2);
					$day=substr($startTime,8,2);
					$hours=substr($startTime,11,2);
					$minutes=substr($startTime,14,2);
					$seconds=substr($startTime,17,2);
					$startTime=date("H:i:s",mktime($hours,$minutes,$seconds,$month,$day,$year));
					*/

					$date=$emp_user_row['date'];
					$day=substr($date,8,2);
					array_push($presenceArray,$day);
				}

				$empPresenceDaysCnt=0;
				$sickLeaveCnt=0;
				$casualLeaveCnt=0;
				$privilegedLeaveCnt=0;
				$tourCnt=0;
				$forgotToLoginCnt=0;
				$otherReasonCnt=0;
				$compensatoryLeaveCnt =0;
				$workHomeCnt = 0;

				for($i=1;$i<=$daysInMonth;$i++)
				{
					$bgcolor="#DDEEFF";
					$sunday=false;
					$holiday=false;
					$current_time=mktime(0,0,0,$month,$i,$year);
					if(date("D",$current_time)=="Sun")
					{
						$bgcolor="#AABBCC";
						$sunday=true;
					}

					$holiday_query="SELECT count(*) FROM holiday_master WHERE holidayDate='$year-$month-$i'";
					$holiday_result=mysql_query($holiday_query);
					$holiday_user_row=mysql_fetch_array($holiday_result);
					$records=$holiday_user_row['count(*)'];
					if($records==1)
					{
						$bgcolor="#AABBCC";
						$holiday=true;
					}

					if(array_search($i,$presenceArray)!==false)	//here it is utmost important to use double not equal to (!==))
					{
						if($sunday==false && $holiday==false)
							$empPresenceDaysCnt++;
					}
					else
					{
						$nonLoginAbbreviations["Half Day Part1"]="H1";
						$nonLoginAbbreviations["Half Day Part2"]="H2";
						$nonLoginAbbreviations["Sick Leave"]="SL";
						$nonLoginAbbreviations["Casual Leave"]="CL";
						$nonLoginAbbreviations["Privileged Leave"]="PL";
						$nonLoginAbbreviations["Privilege Leave"]="PL";
						$nonLoginAbbreviations["Tour"]="T";
						$nonLoginAbbreviations["Forgot to Login"]="F";
						$nonLoginAbbreviations["Other Reason"]="O";
						$nonLoginAbbreviations["Compensatory Leave"]="ComL";
						$nonLoginAbbreviations["Work Home"]="HL";
						$nonLoginAbbreviations["Leave Without Pay"]="LWP";

						$nonLogin_query="SELECT * FROM nonlogin_cause WHERE userID='$userID' AND noLoginDate='$year-$month-$i'";
						$nonLogin_result=mysql_query($nonLogin_query);
						$nonLogin_user_row = mysql_fetch_array($nonLogin_result);
						$cause=$nonLogin_user_row["cause"];
						$explanation=$nonLogin_user_row["explanation"];

						$leave_query="SELECT * FROM leave_application WHERE userID='$userID' AND (grant_from<='$year-$month-$i' and grant_until>='$year-$month-$i') AND leave_status<>'Rejected'";
						$leave_result = mysql_query($leave_query);
						if($leave_user_row = mysql_fetch_array($leave_result))
						{
							$cause=$leave_user_row["leave_type"];
							$explanation=$leave_user_row["leave_reason"];
						}

						if($explanation=="")
							$explanation="No Explanation Given";
						if($sunday==false && $holiday==false)
						{
							if($cause=="Sick Leave")
								$sickLeaveCnt++;
							if($cause=="Casual Leave")
								$casualLeaveCnt++;
							if($cause=="Privileged Leave" || $cause=="Privilege Leave")
								$privilegedLeaveCnt++;
							if($cause=="Tour")
								$tourCnt++;
							if($cause=="Forgot to Login")
								$forgotToLoginCnt++;
							if($cause=="Other Reason")
								$otherReasonCnt++;
							if($cause=="Compensatory Leave")
								$compensatoryLeaveCnt++;
							if($cause=="Work Home")
								$workHomeCnt++;
						}
					}
				}
				$workingDayCnt = $sickLeaveCnt+$casualLeaveCnt+$privilegedLeaveCnt+$tourCnt+$forgotToLoginCnt+$otherReasonCnt+$empPresenceDaysCnt + $compensatoryLeaveCnt;
				$totalDayCnt = $workingDayCnt+$sundaysCnt+$otherHolidaysCnt;
				$arrEligibleLaptopAllowance = array();
				$arrEligibleDesktopAllowance = array();
				if($month >= 1 && $year >= 2011)
				{
					$queryLeaveStatus = "SELECT presentdays,otherholidays,sundays FROM contract_monthlyLeaveStatus WHERE userID = '".$userID."' AND month = '".$month."' AND year = '".$year."' ";
					$dbqueryLeaveStatus = new dbquery($queryLeaveStatus,$connid);
					$rowLeaveStatus = $dbqueryLeaveStatus->getrowarray();
					$totalDayCnt = $rowLeaveStatus["presentdays"] + $rowLeaveStatus["otherholidays"] + $rowLeaveStatus["sundays"]; 
				}
				if($user_row["paymentAmount"] > 0)
					$totalSalary = round($user_row["paymentAmount"]*($totalDayCnt/$daysInMonth));
				$tdsSalary = $totalSalary;
				$tdsAmount = 0;

				$totalActualSalary = $totalSalary;
				if(isset($arrAdditions[$userID]))
				{
					$totalActualSalary = $totalActualSalary + $arrAdditions[$userID];
					$additions = $arrAdditions[$userID];
				}

				if(isset($arrDeductions[$userID]))
				{
					$totalActualSalary = $totalActualSalary - $arrDeductions[$userID];
					$deductions  = $arrDeductions[$userID];
				}
				if(isset($arrAdditionscig[$userID]))
				{
					$tdsSalary = $tdsSalary + $arrAdditionscig[$userID];
				}

				if(isset($arrDeductionscig[$userID]))
				{
					$tdsSalary = $tdsSalary - $arrDeductionscig[$userID];
				}
                if($month <= 7 && $year == 2010)
				{
					$tdsAmount = round($tdsSalary/10);	
				}
				else
				{
					$queryTds = "SELECT empId, taxamt FROM empotherdetails WHERE category = 'contract' AND empId = '".$userID."' AND month = '".$month."' AND year = '".$year."' ";
					$dbqueryTds = new dbquery($queryTds,$connid);
					$rowTds = $dbqueryTds->getrowarray();
					$tdsAmount = $crypt->decrypt($rowTds["taxamt"]);	
				}
				$arrEligibleLaptopAllowance = $this->getContractPeopleForAllowance($connid,"laptop");
				$arrEligibleDesktopAllowance = $this->getContractPeopleForAllowance($connid,"desktop");
				if(in_array($userID,$arrEligibleLaptopAllowance))
				{
					$laptopAllowance = round(600*($totalDayCnt/$daysInMonth));
					
					$queryAllowance = "SELECT SUM(allowance) FROM contract_allowance_details WHERE userID = '".$userID."' AND status = 'pending' ";
					$resultAllowance = mysql_query($queryAllowance) or die(mysql_error());
					$rowAllowance = mysql_fetch_array($resultAllowance);
					if($rowAllowance[0] > 0)
					{
						$laptopAllowance+=$rowAllowance[0];
					}
					/*if(mysql_num_rows($resultAllowance) >0)
					{
						$query_used = "UPDATE contract_allowance_details SET status = 'paid' WHERE userID = '".$userID."' AND status = 'pending' ";
						$result_used = mysql_query($query_used) or die(mysql_error());	
					}*/
				}
				if(in_array($userID,$arrEligibleDesktopAllowance))
				{
					$desktopAllowance = round(250*($totalDayCnt/$daysInMonth));	
					
					$queryAllowance = "SELECT SUM(allowance) FROM contract_allowance_details WHERE userID = '".$userID."' AND status = 'pending' ";
					$resultAllowance = mysql_query($queryAllowance) or die(mysql_error());
					$rowAllowance = mysql_fetch_array($resultAllowance);
					if($rowAllowance[0] > 0)
					{
						$laptopAllowance+=$rowAllowance[0];
					}
					/*if(mysql_num_rows($resultAllowance) >0)
					{
						$query_used = "UPDATE contract_allowance_details SET status = 'paid' WHERE userID = '".$userID."' AND status = 'pending' ";
						$result_used = mysql_query($query_used) or die(mysql_error());	
					}*/
				}
				$arrEligibleNotComp3MonthsLaptop  = $this->getContractPeopleEligibleForAllowance($connid,"laptop");
				$arrEligibleNotComp3MonthsDesktop  = $this->getContractPeopleEligibleForAllowance($connid,"desktop");
				
				if(!in_array($userID,$arrEligibleLaptopAllowance) && in_array($userID,$arrEligibleNotComp3MonthsLaptop))
				{
					$laptopAllowanceAdd = round(600*($totalDayCnt/$daysInMonth));
					$query_check = "SELECT COUNT(*) FROM contract_allowance_details WHERE userID = '".$userID."' AND month = '".$month."' AND year = '".$year."' ";
					$dbquery_check = new dbquery($query_check,$connid);
					$row_check = $dbquery_check->getrowarray();
					if($row_check[0] == 0)
					{
						$query_insert = "INSERT INTO contract_allowance_details SET userID = '".$userID."',month = '".$month."',year = '".$year."',allowance = '".$laptopAllowanceAdd."',entered_by = '".$_SESSION["username"]."' ";
						$result_insert = mysql_query($query_insert) or die(mysql_error());
					}
				}
				if(!in_array($userID,$arrEligibleDesktopAllowance) && in_array($userID,$arrEligibleNotComp3MonthsDesktop))
				{
					$desktopAllowanceAdd = round(250*($totalDayCnt/$daysInMonth));	
					$query_check = "SELECT COUNT(*) FROM contract_allowance_details WHERE userID = '".$userID."' AND month = '".$month."' AND year = '".$year."' ";
					$dbquery_check = new dbquery($query_check,$connid);
					$row_check = $dbquery_check->getrowarray();
					if($row_check[0] == 0)
					{
						$query_insert = "INSERT INTO contract_allowance_details SET userID = '".$userID."',month = '".$month."',year = '".$year."',allowance = '".$desktopAllowanceAdd."',entered_by = '".$_SESSION["username"]."' ";
						$result_insert = mysql_query($query_insert) or die(mysql_error());
					}
				}
				$totalActualSalary = ($totalActualSalary - $tdsAmount);
				$totalActualSalary = $totalActualSalary + $laptopAllowance + $desktopAllowance;
				if($totalDayCnt == 0)
					$totalActualSalary = 0;
				$arrRet[$userID] = array("name"=>$userID,
										 "totalpresentdays"=>$totalDayCnt,
										 "workingdayscount"=>$workingDayCnt,
										 "sundaysCount"=>$sundaysCnt,
										 "sickLeaveCnt"=>$sickLeaveCnt,
										 "casualLeaveCnt"=>$casualLeaveCnt,
										 "privilegedLeaveCnt"=>$privilegedLeaveCnt,
										 "tourCnt"=>$tourCnt,
										 "forgotToLoginCnt"=>$forgotToLoginCnt,
										 "otherReasonCnt"=>$otherReasonCnt,
										 "empPresenceDaysCnt"=>$empPresenceDaysCnt,
										 "compensatoryLeaveCnt"=>$compensatoryLeaveCnt,
										 "otherHolidaysCnt"=>$otherHolidaysCnt,
										 "fullamount"=>$totalSalary,
										 "tdsamount"=>$tdsAmount,
										 "additions"=>$additions,
										 "deductions"=>$deductions,
										 "totaldaysCount"=>$totalDayCnt,
										 "workingdaycount"=>$workingDayCnt,
										 "sundaycount"=>$sundaysCnt,
										 "otherHolidayCount"=>$otherHolidaysCnt,
										 "daysInMonth"=>$daysInMonth,
										 "totalActualSalary"=>$totalActualSalary,
										 "laptopallowance"=>$laptopAllowance,
										 "desktopallowance"=>$desktopAllowance,
										 "amount"=>round($totalActualSalary));

			}
			/*echo "<pre>";
			print_r($arrRet);
			echo "</pre>";*/
			return $arrRet;
	}
	function getTelecallerAdjustments($connid,$opType,$month,$year)
	{
		$arrRet = array();
		$query = "SELECT sum(amount) as total_amount,userID FROM contract_salaryAdjustments WHERE operationType = '".$opType."' AND month = '".$month."' AND year =  '".$year."' GROUP BY userID";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["userID"]] = $row["total_amount"];
		}
		return $arrRet;
	}
	function getTelecallerAdjustmentsCig($connid,$opType,$month,$year)
	{
		$arrRet = array();
		$query = "SELECT sum(amount) as total_amount,userID FROM contract_salaryAdjustments WHERE operationType = '".$opType."' AND month = '".$month."' AND year =  '".$year."' AND considerInGross = '1' GROUP BY userID";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["userID"]] = $row["total_amount"];
		}
		return $arrRet;
	}
	function getHolidayStatus($connid)
	{
		$count = 0;
		$query = "SELECT count(*) FROM holiday_master WHERE holidayDate = '".date('Y-m-d',mktime(0, 0, 0, date("m")  , date("d")-1, date("Y")))."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$count = $row[0];
		return $count;
	}
	function cancelCheques($connid)
    {
    	//print_r($this->cheque_id);
    	if(is_array($this->cheque_id) && count($this->cheque_id) >0)
    	{
    		foreach($this->cheque_id as $cheque_id)
    		{
				$query = "UPDATE cheques_master SET status = '1' WHERE srno = '".$cheque_id."' LIMIT 1";
				$dbquery = new dbquery($query,$connid);
    		}
    	}
    }
    function getGuestLogin($connid)
    {
    	$arrRet = array();
    	$query = "SELECT name FROM guest_login ";
    	$dbquery = new dbquery($query,$connid);
    	while($row = $dbquery->getrowarray())
        {
                $arrRet[] = $row["name"];
        }
        return $arrRet;
    }
	function getSalaryAdvanceRequests($connid,$bank="ICICI Bank")
    {
    	$arrRet = array();
    	$query = "SELECT payroll_salary_advance.userID,approved_amount FROM payroll_salary_advance,payroll_statusMaster WHERE payroll_statusMaster.userID =  payroll_salary_advance.userID AND accountWithBank = '".$bank."' AND app_status = 'Approved' GROUP BY userID";
    	$dbquery = new dbquery($query,$connid);
    	while($row = $dbquery->getrowarray())
        {
        	$arrRet[$row["userID"]] = array("userID"=>$row["userID"],
        									"approved_amount"=>$row["approved_amount"]
        	);
        }
        return $arrRet;
    }
    # return true if First parameter is greater
		function greaterDate($start_date,$end_date)
		{
		  $start = strtotime($start_date);
		  $end = strtotime($end_date);
		  if ($start-$end > 0)
		    return 1;
		  else
		   return 0;
		}
		/**
		 * Retrun penalty amount part - applying penalty slabs on total amount -
		 *
		 * @param float $amount
		 * @param int $delay_days
		 * @return float amount of penalty %
		 */
		function getPenalty($amount=0,$delay_days=0)
		{
			$totalExpensesAmount = 0;

			switch ($delay_days)
			{
				case ( ($delay_days >= 10) and ($delay_days <= 14) ) :
																		$totalExpensesAmount = (($amount * 5)/100) ;
																		break;
				case ( ($delay_days >= 15) AND ($delay_days <= 24) ) :
																		$totalExpensesAmount = ( ($amount * 10)/100) ;
																		break;
				case ( ($delay_days >= 25) and ($delay_days <= 34) ) :
																		$totalExpensesAmount = ( ($amount * 30)/100) ;
																		break;
				case ( ($delay_days >= 35) and ($delay_days <= 44) ) :
																		$totalExpensesAmount = ( ($amount * 50)/100) ;
																		break;
				case ( ($delay_days >= 45) and ($delay_days <= 59) ) :
																		$totalExpensesAmount =  ( ($amount * 75)/100) ;
																		break;
				case (($delay_days >= 60)) :
											$totalExpensesAmount = ( ($amount * 100)/100) ;
											break;
			}
			return round($totalExpensesAmount,2);
		}
		function sendAutoMailer($connid,$cheque_no,$bank,$projectConsider="")
		{
			$arrAccNo = $this->getAccNo($connid);
			if(strtoupper(substr(PHP_OS,0,3)=='WIN')) 
			{
			  $eol="\r\n";
			} 
			elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) 
			{
			  $eol="\r";
			} 
			else 
			{
			  $eol="\n";
			}
			$cheque_date = date("d-m-Y");
			$arrFullName = $this->getFullName($connid);
			$arrFareCCholders = $this->getFareReimbursementDetails($connid,$bank);
			$arrFareCCholdersKeys = array_keys($arrFareCCholders);
			if($bank == "Axis Bank")
				$arrTourCheques = $this->getReimbursementTours($connid,"employeeAxisBank",$projectConsider);
			else
				$arrTourCheques = $this->getReimbursementTours($connid,"employee",$projectConsider);

			$arrLocalCheques = $this->getReimbursementLocal($connid,$bank,"employee",$projectConsider);
			$arrAdvanceTours = $this->getTourAdvanceCheques($connid,$bank,"employee",$projectConsider);
			$arrBillCheques = $this->getReimbursementBills($connid,$bank,$projectConsider);
			$arrAdvanceToursKeys = array_keys($arrAdvanceTours);
			$arrBillChequesKeys = array_keys($arrBillCheques);
			$tour_names = array_keys($arrTourCheques);
			$local_names = array_keys($arrLocalCheques);
			$arrTomailid = $this->getEmailId($connid);	
			//print_r($tour_names);
			//print_r($arrLocalCheques);
			$names = array_merge((array)$tour_names,(array)$local_names);
			$farenames = array_merge($names,$arrFareCCholdersKeys);
			$billnames = array_merge((array)$farenames,(array)$arrBillChequesKeys);
			$advance_names = array_merge((array)$billnames,(array)$arrAdvanceToursKeys);
			$unique_names = array_unique($advance_names);
			if(is_array($unique_names) && count($unique_names) > 0)
			{
				foreach ($unique_names as $row_name)
				{
					if($arrAccNo[$row_name]["salaccountno"]	!= '')
					{
						if(array_key_exists($row_name,$arrTourCheques) &&  array_key_exists($row_name,$arrLocalCheques))
						{
							$headers = "MIME-Version: 1.0$eol";
							$message = "";
							$accountno = "";
							$amount = "";
							$message = "<html><body>";
							$message.="<table style=\"font-family:arial;font-size:12px;\" cellpadding=\'5\' cellspacing=\'1\'><tr><td><p>";
							$amount = $arrTourCheques[$row_name]["amount"] + $arrLocalCheques[$row_name]["amount"]+ $arrFareCCholders[$row_name]["chkd_amount"] + $arrBillCheques[$row_name]["total_amount"];
							$accountno = $arrAccNo[$row_name]["salaccountno"];
							$message.="<b>Dear ".$arrFullName[$row_name]["fullname"].",</b><br><br>";
							$message.="We have deposited a cheque (No:".$cheque_no.") of Rs. ".$amount."/- in your account on ".date("d-m-Y").". We have made this payment against your below expense claim(s).<br><br>";
							$message.="The amount will be credited in to your account before ".date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")+2, date("Y"))).". Request you to check your account and inform us at the earliest if it has not been credited on the said date<br><br>";
							$message.="Break up of Expense Claim(s)<br>";
							$message.="</p></td></tr></table>";
							$message.="<table style=\"font-family:arial;font-size:12px;border-collapse: collapse\" cellpadding=\'5\' cellspacing=\'1\' border=1>";
							$message.= "<tr><td>Expense Type</td><td>Description</td><td>Code</td><td>Claimed Amount</td><td>Approved Amount</td><td>Difference</td><td>Comments</td></tr>";
							$message.=$arrTourCheques[$row_name]["message"].$arrLocalCheques[$row_name]["message"].$arrFareCCholders[$row_name]["message"].$arrBillCheques[$row_name]["message"];
							/*if(array_key_exists($row_name,$arrAdvanceTours))
							{
								 $message.=$arrAdvanceTours[$row_name]["message"];
							}*/
							$message.="<tr><td colspan=\"4\" align=\"right\">Total</td><td colspan=\"3\" align=\"left\">".$amount."</td></tr>";
							$message.="</table><br><br>Regards,<br>Ketan";
							$message.="</body></html>";
							//echo "<br>".$message;
							$headers.= "Content-type: text/html; charset=iso-8859-1$eol";
							$headers.= "From: Ketan Baherawala<ketan@ei-india.com>$eol";
							$headers.= "Cc: $eol";
							$headers.= "Bcc: ketan@ei-india.com,rupande.shah@ei-india.com$eol";
							$subject="Reimbursement Details";
							if(isset($arrTomailid[$row_name]))
								$to = $arrTomailid[$row_name];
							else
								$to = "ketan@ei-india.com";
							$mail_content='<html>
							<head>
							  <title>Mail</title>
							</head>
							<body>';	
							$mail_content.=$message;
							$mail_content.='</body></html>';
							
							$mail_content=wordwrap($mail_content,70,$eol);
							if(mail($to,$subject,$mail_content,$headers))
							{
								echo "Mail Sent successfully";
							}
							else
							{
								echo "Mail failed";
							}
						}
						elseif(array_key_exists($row_name,$arrTourCheques) &&  !array_key_exists($row_name,$arrLocalCheques))
						{
							$headers = "MIME-Version: 1.0$eol";
							$message = "";
							$amount = "";
							$accountno = "";
							$message = "<html><body>";
							$message.="<table style=\"font-family:arial;font-size:12px;\" cellpadding=\'5\' cellspacing=\'1\'><tr><td><p>";
							$amount = $arrTourCheques[$row_name]["amount"] + $arrFareCCholders[$row_name]["chkd_amount"] + $arrBillCheques[$row_name]["total_amount"];
							$accountno = $arrAccNo[$row_name]["salaccountno"];
							$message.="<b>Dear ".$arrFullName[$row_name]["fullname"].",</b><br><br>";
							$message.="We have deposited a cheque (No:".$cheque_no.") of Rs. ".$amount."/- in your account on ".date("d-m-Y").". We have made this payment against your below expense claim(s).<br><br>";
							$message.="The amount will be credited in to your account before ".date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")+2, date("Y"))).". Request you to check your account and inform us at the earliest if it has not been credited on the said date<br><br>";
							$message.="Break up of Expense Claim(s)<br>";
							$message.="</p></td></tr></table>";
							$message.="<table style=\"font-family:arial;font-size:12px;border-collapse: collapse\" cellpadding=\'5\' cellspacing=\'1\' border=1>";
							$message.= "<tr><td>Expense Type</td><td>Description</td><td>Code</td><td>Claimed Amount</td><td>Approved Amount</td><td>Difference</td><td>Comments</td></tr>";
							$message.=$arrTourCheques[$row_name]["message"].$arrFareCCholders[$row_name]["message"].$arrBillCheques[$row_name]["message"];
							$message.="<tr><td colspan=\"4\" align=\"right\">Total</td><td colspan=\"3\" align=\"left\">".$amount."</td></tr>";
							$message.="</table><br><br>Regards,<br>Ketan";
							$message.="</body></html>";
							//echo "<br>".$message;
							$headers.= "Content-type: text/html; charset=iso-8859-1$eol";
							$headers.= "From: Ketan Baherawala<ketan@ei-india.com>$eol";
							$headers.= "Cc: $eol";
							$headers.= "Bcc: ketan@ei-india.com,rupande.shah@ei-india.com$eol";
							$subject="Reimbursement Details";
							if(isset($arrTomailid[$row_name]))
								$to = $arrTomailid[$row_name];
							else
								$to = "ketan@ei-india.com";
							$mail_content='<html>
							<head>
							  <title>Mail</title>
							</head>
							<body>';	
							$mail_content.=$message;
							$mail_content.='</body></html>';
							
							$mail_content=wordwrap($mail_content,70,$eol);
							if(mail($to,$subject,$mail_content,$headers))
							{
								echo "Mail Sent successfully";
							}
							else
							{
								echo "Mail failed";
							}
						}
						elseif(!array_key_exists($row_name,$arrTourCheques) &&  array_key_exists($row_name,$arrLocalCheques))
						{
							$headers = "MIME-Version: 1.0$eol";
							$message = "";
							$amount  = 0;
							$accountno = "";
							$message = "<html><body>";
							$message.="<table style=\"font-family:arial;font-size:12px;\" cellpadding=\'5\' cellspacing=\'1\'><tr><td><p>";
							$amount = $arrLocalCheques[$row_name]["amount"] + $arrFareCCholders[$row_name]["chkd_amount"] + $arrBillCheques[$row_name]["total_amount"];
							if(array_key_exists($row_name,$arrAdvanceTours))
							{
	                             $amount = $amount +  $arrAdvanceTours[$row_name]["approved_amount"];

							}

							$accountno = $arrAccNo[$row_name]["salaccountno"];
							$message.="<b>Dear ".$arrFullName[$row_name]["fullname"].",</b><br><br>";
							$message.="We have deposited a cheque (No:".$cheque_no.") of Rs. ".$amount."/- in your account on ".date("d-m-Y").". We have made this payment against your below expense claim(s).<br><br>";
							$message.="The amount will be credited in to your account before ".date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")+2, date("Y"))).". Request you to check your account and inform us at the earliest if it has not been credited on the said date<br><br>";
							$message.="Break up of Expense Claim(s)<br>";
							$message.="</p></td></tr></table>";
							$message.="<table style=\"font-family:arial;font-size:12px;border-collapse: collapse\" cellpadding=\'5\' cellspacing=\'1\' border=1>";
							$message.= "<tr><td>Expense Type</td><td>Description</td><td>Code</td><td>Claimed Amount</td><td>Approved Amount</td><td>Difference</td><td>Comments</td></tr>";
							$message.=$arrLocalCheques[$row_name]["message"].$arrFareCCholders[$row_name]["message"].$arrBillCheques[$row_name]["message"];
							if(array_key_exists($row_name,$arrAdvanceTours))
							{
								 $message.=$arrAdvanceTours[$row_name]["message"];
							}
							$message.="<tr><td colspan=\"4\" align=\"right\">Total</td><td colspan=\"3\" align=\"left\">".$amount."</td></tr>";
							$message.="</table><br><br>Regards,<br>Ketan";
							$message.="</body></html>";
							//echo "<br>".$message;
							$headers.= "Content-type: text/html; charset=iso-8859-1$eol";
							$headers.= "From: Ketan Baherawala<ketan@ei-india.com>$eol";
							$headers.= "Cc: $eol";
							$headers.= "Bcc: ketan@ei-india.com,rupande.shah@ei-india.com$eol";
							$subject="Reimbursement Details";
							if(isset($arrTomailid[$row_name]))
								$to = $arrTomailid[$row_name];
							else
								$to = "ketan@ei-india.com";
							$mail_content='<html>
							<head>
							  <title>Mail</title>
							</head>
							<body>';	
							$mail_content.=$message;
							$mail_content.='</body></html>';
							
							$mail_content=wordwrap($mail_content,70,$eol);	
							if(mail($to,$subject,$mail_content,$headers))
							{
								echo "Mail Sent successfully";
							}
							else
							{
								echo "Mail failed";
							}
						}
						elseif(!array_key_exists($row_name,$arrTourCheques) &&  !array_key_exists($row_name,$arrLocalCheques) && array_key_exists($row_name,$arrAdvanceTours))
						{
							$headers = "MIME-Version: 1.0$eol";
							$message = "";
							$amount  = 0;
							$accountno = "";
							$message = "<html><body>";
							$message.="<table style=\"font-family:arial;font-size:12px;\" cellpadding=\'5\' cellspacing=\'1\'><tr><td><p>";
							$amount = $arrAdvanceTours[$row_name]["approved_amount"] + $arrFareCCholders[$row_name]["chkd_amount"] + $arrBillCheques[$row_name]["total_amount"];
							$accountno = $arrAccNo[$row_name]["salaccountno"];
							$message.="<b>Dear ".$arrFullName[$row_name]["fullname"].",</b><br><br>";
							$message.="We have deposited a cheque (No:".$cheque_no.") of Rs. ".$amount."/- in your account on ".date("d-m-Y").". We have made this payment against your below expense claim(s).<br><br>";
							$message.="The amount will be credited in to your account before ".date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")+2, date("Y"))).". Request you to check your account and inform us at the earliest if it has not been credited on the said date<br><br>";
							$message.="Break up of Expense Claim(s)<br>";
							$message.="</p></td></tr></table>";
							$message.="<table style=\"font-family:arial;font-size:12px;border-collapse: collapse\" cellpadding=\'5\' cellspacing=\'1\' border=1>";
							$message.= "<tr><td>Expense Type</td><td>Description</td><td>Code</td><td>Claimed Amount</td><td>Approved Amount</td><td>Difference</td><td>Comments</td></tr>";
							$message.=$arrAdvanceTours[$row_name]["message"];
							$message.=$arrFareCCholders[$row_name]["message"];
							$message.=$arrBillCheques[$row_name]["message"];
							$message.="<tr><td colspan=\"4\" align=\"right\">Total</td><td colspan=\"3\" align=\"left\">".$amount."</td></tr>";
							$message.="</table><br><br>Regards,<br>Ketan";
							$message.="</body></html>";
							//echo "<br>".$message;
							$headers.= "Content-type: text/html; charset=iso-8859-1$eol";
							$headers.= "From: Ketan Baherawala<ketan@ei-india.com>$eol";
							$headers.= "Cc: $eol";
							$headers.= "Bcc: ketan@ei-india.com,rupande.shah@ei-india.com$eol";
							$subject="Reimbursement Details";
							if(isset($arrTomailid[$row_name]))
								$to = $arrTomailid[$row_name];
							else
								$to = "ketan@ei-india.com";
							$mail_content='<html>
							<head>
							  <title>Mail</title>
							</head>
							<body>';	
							$mail_content.=$message;
							$mail_content.='</body></html>';
							
							$mail_content=wordwrap($mail_content,70,$eol);	
							if(mail($to,$subject,$mail_content,$headers))
							{
								echo "Mail Sent successfully";
							}
							else
							{
								echo "Mail failed";
							}
						}
						elseif((!array_key_exists($row_name,$arrTourCheques) &&  !array_key_exists($row_name,$arrLocalCheques) && !array_key_exists($row_name,$arrAdvanceTours) && array_key_exists($row_name,$arrFareCCholders)) || array_key_exists($row_name,$arrBillCheques))
						{
							$headers = "MIME-Version: 1.0$eol";
							$message = "";
							$amount  = 0;
							$accountno = "";
							$message = "<html><body>";
							$message.="<table style=\"font-family:arial;font-size:12px;\" cellpadding=\'5\' cellspacing=\'1\'><tr><td><p>";
							$amount = $arrFareCCholders[$row_name]["chkd_amount"] + $arrBillCheques[$row_name]["total_amount"];
							$accountno = $arrAccNo[$row_name]["salaccountno"];
							$message.="<b>Dear ".$arrFullName[$row_name]["fullname"].",</b><br><br>";
							$message.="We have deposited a cheque (No:".$cheque_no.") of Rs. ".$amount."/- in your account on ".date("d-m-Y").". We have made this payment against your below expense claim(s).<br><br>";
							$message.="The amount will be credited in to your account before ".date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")+2, date("Y"))).". Request you to check your account and inform us at the earliest if it has not been credited on the said date<br><br>";
							$message.="Break up of Expense Claim(s)<br>";
							$message.="</p></td></tr></table>";
							$message.="<table style=\"font-family:arial;font-size:12px;border-collapse: collapse\" cellpadding=\'5\' cellspacing=\'1\' border=1>";
							$message.= "<tr><td>Expense Type</td><td>Description</td><td>Code</td><td>Claimed Amount</td><td>Approved Amount</td><td>Difference</td><td>Comments</td></tr>";
							//$message.="<tr><td>Advance amount</td><td>".$arrAdvanceTours[$row_name]["amount"]."</td><td>".$arrAdvanceTours[$row_name]["approved_amount"]."</td><td>".($arrAdvanceTours[$row_name]["amount"]-$arrAdvanceTours[$row_name]["approved_amount"])."</td><td>Your sbu head has approved amount:".$arrAdvanceTours[$row_name]["approved_amount"]."</td></tr>";
							$message.=$arrFareCCholders[$row_name]["message"].$arrBillCheques[$row_name]["message"];
							$message.="<tr><td colspan=\"4\" align=\"right\">Total</td><td colspan=\"3\" align=\"left\">".$amount."</td></tr>";
							$message.="</table><br><br>Regards,<br>Ketan";
							$message.="</body></html>";
							//echo "<br>".$message;
							$headers.= "Content-type: text/html; charset=iso-8859-1$eol";
							$headers.= "From: Ketan Baherawala<ketan@ei-india.com>$eol";
							$headers.= "Cc: $eol";
							$headers.= "Bcc: ketan@ei-india.com,rupande.shah@ei-india.com$eol";
							$subject="Reimbursement Details";
							if(isset($arrTomailid[$row_name]))
								$to = $arrTomailid[$row_name];
							else
								$to = "ketan@ei-india.com";
							$mail_content='<html>
							<head>
							  <title>Mail</title>
							</head>
							<body>';	
							$mail_content.=$message;
							$mail_content.='</body></html>';
							
							$mail_content=wordwrap($mail_content,70,$eol);	
							if(mail($to,$subject,$mail_content,$headers))
							{
								echo "Mail Sent successfully";
							}
							else
							{
								echo "Mail failed";
							}
						}

					}// if account number exists condition ends here..........
				}// For each condition ends here
			}// If  array exists condition ends here...
		} // Email function ends here...
		function sendAdvanceAutoMailer($connid,$cheque_no,$bank,$projectConsider="")
		{
			if(strtoupper(substr(PHP_OS,0,3)=='WIN')) 
			{
			  $eol="\r\n";
			} 
			elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) 
			{
			  $eol="\r";
			} 
			else 
			{
			  $eol="\n";
			}
			$arrAccNo = $this->getAccNo($connid);
			$cheque_date = date("d-m-Y");
			$arrFullName = $this->getFullName($connid);
			$arrAdvanceTours = $this->getTourAdvanceCheques($connid,$bank,"employee",$projectConsider);
			$arrAdvanceToursKeys = array_keys($arrAdvanceTours);
			$unique_names = array_unique($arrAdvanceToursKeys);
			$arrTomailid = $this->getEmailId($connid);
			if(is_array($unique_names) && count($unique_names) > 0)
			{
				foreach ($unique_names as $row_name)
				{
					if($arrAccNo[$row_name]["salaccountno"]	!= '')
					{
						if(array_key_exists($row_name,$arrAdvanceTours))
						{
							$headers = "MIME-Version: 1.0$eol";
							$message = "";
							$amount  = 0;
							$accountno = "";
							$message = "<html><body>";
							$message.="<table style=\"font-family:arial;font-size:12px;\" cellpadding=\'5\' cellspacing=\'1\'><tr><td><p>";
							$amount = $arrAdvanceTours[$row_name]["approved_amount"];
							$accountno = $arrAccNo[$row_name]["salaccountno"];
							$message.="<b>Dear ".$arrFullName[$row_name]["fullname"].",</b><br><br>";
							$message.="We have deposited a cheque (No:".$cheque_no.") of Rs. ".$amount."/- in your account on ".date("d-m-Y").". We have made this payment against your below Advance request.<br><br>";
							$message.="The amount will be credited in to your account before ".date("d-m-Y", mktime(0, 0, 0, date("m"), date("d")+2, date("Y"))).". Request you to check your account and inform us at the earliest if it has not been credited on the said date<br><br>";
							$message.="Break up of Expense Claim(s)<br>";
							$message.="</p></td></tr></table>";
							$message.="<table style=\"font-family:arial;font-size:12px;border-collapse: collapse\" cellpadding=\'5\' cellspacing=\'1\' border=1>";
							$message.= "<tr><td>Expense Type</td><td>Description</td><td>Code</td><td>Claimed Amount</td><td>Approved Amount</td><td>Difference</td><td>Comments</td></tr>";
							$message.=$arrAdvanceTours[$row_name]["message"];
							$message.="<tr><td colspan=\"4\" align=\"right\">Total</td><td colspan=\"3\" align=\"left\">".$amount."</td></tr>";
							$message.="</table><br><br>Regards,<br>Ketan";
							$message.="</body></html>";
							//echo "<br>".$message;
							$headers.= "Content-type: text/html; charset=iso-8859-1$eol";
							$headers.= "From: Ketan Baherawala<ketan@ei-india.com>$eol";
							$headers.= "Cc: $eol";
							$headers.= "Bcc: ketan@ei-india.com,rupande.shah@ei-india.com$eol";
							$subject="Advance Payment";
							if(isset($arrTomailid[$row_name]))
								$to = $arrTomailid[$row_name];
							else
								$to = "ketan@ei-india.com";
							$mail_content='<html>
							<head>
							  <title>Mail</title>
							</head>
							<body>';	
							$mail_content.=$message;
							$mail_content.='</body></html>';
							$mail_content=wordwrap($mail_content,70,$eol);
							if(mail($to,$subject,$mail_content,$headers))
							{
								echo "Mail Sent successfully";
							}
							else
							{
								echo "Mail failed";
							}
						}
					}
				}
			}
		}
		function getAllCreditNoteTours($connid)
		{
			$arrRet = array();
			$query = "SELECT SUM(ticket_creditnote_details.amount) as totalAmt,LOWER(paid_by) as payby,tour_no FROM ticket_creditnote_details,tour_expense_items,tour_expense_master ".
					"WHERE ticket_creditnote_details.ticketCode = tour_expense_items.ticket_code ".
					"AND tour_expense_items.tour_master_tour_no =tour_expense_master.tour_no AND ticket_creditnote_details.status in ('ACTIVE','CANCELLATION_CHARGE_FROM_CN') ".
					"GROUP BY LOWER(paid_by),tour_no ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["tour_no"]][$row["payby"]] = $row["totalAmt"];
			}
			return $arrRet;
		}
		function getAllPendingBills($connid)
		{
			$arrRet = array();
			$this->setpostvars();
			//echo "Action is".$this->action;
			if($this->action == "UnApprovedBillOrAdvances")
			{
				//echo "entered";
				if($this->chequemode == "ShowPendingBills")
				{
					$query = "SELECT bill_master.*,bill_type.description as type_desc FROM bill_master,bill_type WHERE bill_master.typeid = bill_type.typeid AND status = 'pending' ";
					$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray())
					{
						$arrRet[$row["billid"]] = array("billid"=>$row["billid"],
														"billdate"=>$row["billdate"],
														"description"=>$row["type_desc"],
														"billdescription"=>$row["billdescription"],
														"creditdays"=>$row["creditdays"],
														"billamount"=>$row["billamount"],
														"netpayable"=>$row["netpayable"],
														"payto"=>$row["payto"],
														"projectname"=>$row["projectname"],
														"approved1_by"=>$row["approved1_by"],
														"approved1_date"=>$row["approved1_date"],
														"approved2_by"=>$row["approved2_by"],
														"approved2_date"=>$row["approved2_date"]

						);
					}
				}
				else
				{
					/*$query = "SELECT id,applied_by,date_format(applied_date,'%d-%m-%Y') as appld_dt,advance_amount,approved_amount,tour_purpose,status,approval1_status,approval2_by,approval3_by,approval3_status,project_name,subproject_name FROM tour_advance WHERE status = 'pending' ";*/
					$query = "SELECT id,applied_by,date_format(applied_date,'%d-%m-%Y') as appld_dt,advance_amount,approved_amount,tour_purpose,status,project_name,subproject_name FROM tour_advance WHERE status = 'pending' ";
					
					$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray())
					{
						/*$arrRet[$row["id"]] = array("id"=>$row["id"],
													"applied_date"=>$row["appld_dt"],
													"applied_by"=>$row["applied_by"],
													"tour_purpose"=>$row["tour_purpose"],
													"approved_amount"=>$row["approved_amount"],
													"status"=>$row["status"],
													"updated_by"=>$row["updated_by"],
													"approved1_status"=>$row["approved1_status"],
													"approved2_by"=>$row["approved2_by"],
													"approved2_status"=>$row["approved2_status"],
													"approval3_by"=>$row["approval3_by"],
													"approval3_status"=>$row["approval3_status"],
													"project_name"=>$row["project_name"],
													"subproject_name"=>$row["subprojet_name"]
						);*/
						
						$arrRet[$row["id"]] = array("id"=>$row["id"],
													"applied_date"=>$row["appld_dt"],
													"applied_by"=>$row["applied_by"],
													"tour_purpose"=>$row["tour_purpose"],
													"approved_amount"=>$row["approved_amount"],
													"status"=>$row["status"],
													"project_name"=>$row["project_name"],
													"subproject_name"=>$row["subprojet_name"]
						);
					}
				}
			}
			return $arrRet;
	}
	function ShowMergedRecords($connid)
	{
		$this->setpostvars();
		$arrRet = array();
		print_r($this->urgentcheques);
		if($this->action == "ShowMergedRecords" && is_array($this->urgentcheques) && count($this->urgentcheques) >0)
		{
			if(count($this->urgentcheques) == 1)
					$str = $this->urgentcheques[0];
				else
					$str = implode(',',$this->urgentcheques);
			if($this->chequemode == "ShowPendingBills")
			{

				$query = "SELECT payto,sum(netpayable) as total_amount FROM bill_master WHERE billid IN (".$str.") GROUP BY payto";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$arrRet[$row["payto"]] = "B|".$row["total_amount"]."|".$str."|".$row["partyid"];
				}
				//$query = "INSERT INTO cheques_master SET date = CURDATE(),number = '".$this->cheque_id."',purpose_id = '11' "
			}
			else
			{
				$query = "SELECT applied_by,sum(advance_amount) as total_amount FROM tour_advance WHERE id IN (".$str.") GROUP BY applied_by";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$arrRet[$row["applied_by"]] = "A|".$row["total_amount"]."|".$str;
				}
			}
		}
		return $arrRet;
	}
	function saveUnapprovedExpensesCheques($connid)
	{
		$this->setpostvars();
		$flag = 0;
		if($this->action == "saveUrgentCheques")
		{
			if(is_array($this->cheque_no) && count($this->cheque_no) >0)
			{
				foreach($this->cheque_no as $chequeDtl =>$value)
				{
					$newDate = $this->formatDate($this->cheque_date[$chequeDtl]);
					$query = "INSERT INTO cheques_master SET
							date = '".$newDate."',
							number = '".$this->cheque_no[$chequeDtl]."',
							purpose_id = '".$this->purposeid[$chequeDtl]."',
							partyid = '".$this->partyid[$chequeDtl]."',
							payto = '".$this->payto[$chequeDtl]."',
							eiaccount_number = '".$this->eiaccount_number[$chequeDtl]."',
							amount = '".$this->amount[$chequeDtl]."',
							month = '".date('m')."',
							year = '".date('Y')."',
							entered_dt = NOW(),
							entered_by = '".$_SESSION["username"]."',
							comments = '".$this->comments[$chequeDtl]."'";
					$dbquery = new dbquery($query,$connid);
					$flag = $this->purposeid[$chequeDtl];
					if($flag == 11)
					{
						$queryUpdate = "UPDATE bill_master SET
										status = 'Paid',
										cheque_no = '".$this->cheque_no[$chequeDtl]."',
										cheque_date = '".$this->cheque_date[$chequeDtl]."',
										cheque_writing_dt = NOW(),
										cheque_id = '".$dbquery->insertid."'
										WHERE payto = '".$chequeDtl."' AND billid IN (".$this->uapprovedids.")
										";
						$dbqueryUpdate = new dbquery($queryUpdate,$connid);
					}

				}


			}
		}
	}
	function pendingDebitDate($connid)
	{
		$this->setpostvars();
		if(isset($this->eiaccount_number) && $this->action == "searchCheque")
			$account_number = $this->eiaccount_number;
		else
			$account_number = "6405000246";
		$query = "SELECT srno,number,DATE_FORMAT(cheques_master.date,'%d-%m-%Y') as chequeDate,DATE_FORMAT(cheques_master.debitDate,'%d-%m-%Y') as debitDt,amount,month,year,DATE_FORMAT(cheques_master.entered_dt,'%d-%m-%Y') as enteredDate,description,partyname,schoolname,payto,userid FROM cheques_master
					LEFT JOIN cheques_purpose_master ON cheques_master.purpose_id = cheques_purpose_master.purpose_id
					LEFT JOIN bill_partyMaster ON cheques_master.partyid = bill_partyMaster.partyid
					LEFT JOIN schools ON cheques_master.schoolcode = schools.schoolno
					WHERE debitDate = '0000-00-00' AND debitPending = 'Y' AND MONTH(cheques_master.entered_dt) >= 1 AND YEAR(cheques_master.entered_dt) = '2010' AND eiaccount_number = '".$account_number."' ORDER BY srno ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row["debitDt"] == '00-00-0000')
				$debitdate  =  "-";
			else
				$debitdate = $row["debitDt"];
			$arrRet[$row["srno"]] = array("srno"=>$row["srno"],
										"number"=>$row["number"],
										"chequeDate"=>$row["chequeDate"],
										"amount"=>$row["amount"],
										"month"=>$row["month"],
										"year"=>$row["year"],
										"description"=>$row["description"],
										"type"=>$row["type"],
										"debitDt"=>$debitdate,
										"purpose_id"=>$row["purpose_id"],
										"partyname"=>$row["partyname"],
										"userid"=>$row["userid"],
										"payto"=>$row["payto"],
										"schoolname"=>$row["schoolname"],
										"enteredDate"=>$row["enteredDate"]

			);
		}
		return $arrRet;
	}
	function saveDebitDate($connid)
	{
		//print_r($this->debitdate);
		if(is_array($this->debitdate) && count($this->debitdate) >0)
		{
			$arrKeys = array_keys($this->debitdate);
			//print_r($arrKeys);
			foreach($arrKeys as $srno)
			{
				if($this->debitdate[$srno] != "")
				{
					$arrDate = explode("-",$this->debitdate[$srno]);
					$dbdate = $arrDate[2]."-".$arrDate[1]."-".$arrDate[0];
					$query = "UPDATE cheques_master SET debitDate = '".$dbdate."',debitPending = 'N' WHERE srno = '".$srno."' LIMIT 1";
					$dbquery = new dbquery($query,$connid);
				}

			}
			echo "<script language=javascript>window.location=\"pendingDebitDate.php\"</script>";
		}

	}
	function generateUsedTours($connid)
	{
		$arrRet = array();
		$query = "SELECT tour_code,sum(amount) totalAmount FROM tour_advance_adjustment_details GROUP BY tour_code";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["tour_code"]] = $row["totalAmount"];
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function advanceAdjustmentAgainstExpenses($connid,$type)
	{
		$arrRet = array();
		$query = "SELECT *,SUM(amount) as totalamt FROM advance_adjustment_details WHERE type = '".$type."' GROUP BY advance_id,code";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["code"]][] = array("advance_id"=>$row["advance_id"],"code"=>$row["code"],"totalamt"=>$row["totalamt"]);
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function getTdsChequesFromBills($connid,$crypt)
	{
		$arrRet = array();
		if(date("m") == "3" && date("d") > "10")
			$query = "SELECT SUM(tdsamount) as total_amount,tds_master.description as tdsdesc,tdstype FROM bill_master,tds_master WHERE bill_master.tdstype = tds_master.id AND status != 'Rejected' AND MONTH(billConsDate) = MONTH(CURDATE()) AND YEAR(billConsDate) = YEAR(CURDATE()) GROUP BY tdstype UNION SELECT 0,description,id as tdstype FROM tds_master WHERE id = 6";
		else
			$query = "SELECT SUM(tdsamount) as total_amount,tds_master.description as tdsdesc,tdstype FROM bill_master,tds_master WHERE bill_master.tdstype = tds_master.id AND status != 'Rejected' AND MONTH(billConsDate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND YEAR(billConsDate) = IF(MONTH(CURDATE()) = 1,YEAR(CURDATE())-1,YEAR(CURDATE())) GROUP BY tdstype UNION SELECT 0,description,id as tdstype FROM tds_master WHERE id = 6";
		$dbquery = new dbquery($query,$connid);
		$arrMadeCheque = $this->excludeChequesMade($connid);
		while($row = $dbquery->getrowarray())
		{
			$key = "tdsmonthlypayment".$row["tdsdesc"];
			$totalamount = 0;
			$amount = 0;
			if(!in_array($key,$arrMadeCheque))
			{
				if($row["tdstype"] == "3")
				{
					//$arrTelecallersSalary = $this->getTelcallerSalary($connid,'9',date(m)-1,date("Y"),$crypt);
					//$arrTelecallersSalaryAxis = $this->getTelcallerSalary($connid,'18',date(m)-1,date("Y"),$crypt);
					if(date("m") == 1)
						$arrTelecallersSalary = $this->retrievePaymentHistory($connid,12,date("Y")-1,$crypt);
					else if(date("m") == 3)
						$arrTelecallersSalary = $this->retrievePaymentHistory($connid,date("m"),date("Y"),$crypt);
					else 
						$arrTelecallersSalary = $this->retrievePaymentHistory($connid,date("m")-1,date("Y"),$crypt);
						
					$arrTelecallersSalaryKeys = array_keys($arrTelecallersSalary);
					//$arrTelecallersSalaryKeysAxis = array_keys($arrTelecallersSalaryAxis);
					$arrAccNo = $this->getTelecallersAccNo($connid);
					foreach ($arrTelecallersSalaryKeys as $row_name)
					{
						if($arrAccNo[$row_name]["salaccountno"]	!= '0')
						{
							$tdspartsalary = $arrTelecallersSalary[$row_name]["tdsamount"];
							$totalamount = $totalamount + ($tdspartsalary);
						}
					}
					/*foreach ($arrTelecallersSalaryKeysAxis as $row_axisname)
					{
						if($arrAccNo[$row_axisname]["salaccountno"]	!= '0')
						{
							$tdspartsalaryaxis = $arrTelecallersSalaryAxis[$row_axisname]["tdsamount"];
							$totalamount = $totalamount + ($tdspartsalaryaxis);
						}
					}*/
					$amount = $row["total_amount"] + $totalamount;
				}
				elseif($row["tdstype"] == "6")
				{
					$arrSalaryTDS = $this->getSalaryTDSdetails($connid,$crypt);
					if(is_array($arrSalaryTDS) && count($arrSalaryTDS) >0)
					{
						foreach($arrSalaryTDS as $empid => $value)
						{
							$amount = $amount + $value;
						}
					}
				}
				else
				{
					$amount = $row["total_amount"];
				}

				$arrRet["tdsmonthlypayment".$row["tdsdesc"]] = array("tdstype"=>$row["tdstype"],"tdsamount"=>$amount,"description"=>$row["tdsdesc"]);
			}
		}
		return $arrRet;
	}
	function retrievePaymentHistory($connid,$month,$year,$crypt)
	{
		if($month == 0)
		{
			$month = 12;	
			$year = $year - 1;
		}
		$arrRet = array();
		$query = "SELECT * FROM empotherdetails WHERE month = '".$month."' AND year = '".$year."' AND category = 'contract' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$tdsamount = $crypt->decrypt($row["taxamt"]);
			$arrRet[$row["empid"]] = array("userID"=>$row["empid"],
											"tdsamount"=>$tdsamount
			);
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function getBillAdjustedAmount($connid)
	{
		$arrRet = array();
		$query = "SELECT sum(amount) as total_amount,payto FROM advance_adjustment_details a,bill_master b WHERE a.code = b.billid AND type = 'B' AND status = 'Approved-2' GROUP BY payto ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["payto"]] = $row["total_amount"];
		}
		return $arrRet;
	}
	function getBillsByMonthAndTDStype($connid,$tdstype)
	{
		$arrRet = array();
		if(date("m") == "3" && date("d") > "10")
			$query = "SELECT pan,billid,partyname,payto,tdstype,tdsamount,billamount,servicetaxamount,valueaddedtaxamount,city,state,pincode,address,address2,address3,address4,DATE_FORMAT(billConsDate,'%d-%m-%Y') as billConsDate FROM bill_master a,bill_partyMaster b WHERE a.partyid =  b.partyid AND tdstype = '".$tdstype."' AND status != 'Rejected' AND MONTH(billConsDate) = MONTH(CURDATE()) AND YEAR(billConsDate) = YEAR(CURDATE()) ";
		else
			$query = "SELECT pan,billid,partyname,payto,tdstype,tdsamount,billamount,servicetaxamount,valueaddedtaxamount,city,state,pincode,address,address2,address3,address4,DATE_FORMAT(billConsDate,'%d-%m-%Y') as billConsDate FROM bill_master a,bill_partyMaster b WHERE a.partyid =  b.partyid AND tdstype = '".$tdstype."' AND status != 'Rejected' AND MONTH(billConsDate) = MONTH(DATE_SUB(CURDATE(), INTERVAL 1 MONTH)) AND YEAR(billConsDate) = IF(MONTH(CURDATE()) = 1,YEAR(CURDATE())-1,YEAR(CURDATE())) ";
		
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$billAmount = $row["billamount"] + $row["servicetaxamount"] + $row["valueaddedtaxamount"];
			$arrRet[$row["billid"]] = array("billid"=>$row["billid"],
											"partyname"=>$row["partyname"],
											"city"=>$row["city"],
											"state"=>$row["state"],
											"pincode"=>$row["pincode"],
											"address"=>$row["address"],
											"address2"=>$row["address2"],
											"address3"=>$row["address3"],
											"address4"=>$row["address4"],			
											"payto"=>$row["payto"],
				                            "pan"=>$row["pan"],
											"tdsamount"=>$row["tdsamount"],
											"billConsDate"=>$row["billConsDate"],
                                                                                                       "origbillamount"=>$row["billamount"],
											"billamount"=>$billAmount
										);
		}
		return $arrRet;
	}
	function getTDSdetails($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM tds_master";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$arrRet[$row["id"]] = $row["description"];
		}
		return $arrRet;
	}
	function excludeChequesMade($connid)
	{
		$arrRet = array();
		$query = "SELECT distinct payto FROM cheques_master WHERE purpose_id = '6' AND MONTH(CURDATE()) <= month AND YEAR(CURDATE()) <= year AND payto != '' ";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$arrRet[] = $row["payto"];
		}
		return $arrRet;
	}
	function telecallerSalaryValidation($connid,$month,$year,$partyid)
	{
		if($month == 0)
		{
			$month = 12;	
			$year = $year - 1;
		}
		
		$query = "SELECT count(*) FROM cheques_master WHERE purpose_id = '15' and month = '".$month."' AND year = '".$year."' AND partyid = '".$partyid."'";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		return $row[0];
	}
	function saveOtherChequesSBUdetails($connid,$sbu,$sbu_project,$group,$subgroup,$amount,$cheque_id,$name,$budget_amount)
	{
		if($sbu > 0 && $group > 0 && $subgroup >0)
		{
			$query = "INSERT INTO  cheques_costCenterDetails SET sbu_id = '".$sbu."',sbu_project_id = '".$sbu_project."',head_id = '".$group."',sub_head_id = '".$subgroup."',cheque_id = '".$cheque_id."',amount = '".$amount."',entered_date = NOW(),entered_by = '".$name."',budget_amount = '".$budget_amount."' ";
			$dbquery = new dbquery($query,$connid);
		}
		//$row = $dbquery->getrowarray();
	}
	function getSalaryTDSdetails($connid,$crypt)
	{
		$arrRet = array();
		if(date("m") == "3" && date("d") > "10")
			$query = "SELECT taxamt,empid FROM empotherdetails WHERE year=YEAR(CURDATE()) AND month= MONTH(CURDATE()) AND category = 'employee' ";
		else
			$query = "SELECT taxamt,empid FROM empotherdetails WHERE year=YEAR(DATE_SUB(CURDATE(),INTERVAL 30 DAY)) AND month= MONTH(DATE_SUB(CURDATE(),INTERVAL 30 DAY)) AND category = 'employee' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["empid"]] = $crypt->decrypt($row["taxamt"]);
		}
		return $arrRet;
	}
	function getEmployeeTaxDetails($connid)
	{
		$arrRet = array();
		if(date("m") == "3" && date("d") > "10")
			$query = "SELECT pan,CONCAT(firstName,' ',lastName) as fullname,b.userID,taxamt,earnings FROM empotherdetails a,payroll_paymentHistory b,emp_master c WHERE a.empid = b.userID AND b.userID = c.userID AND a.month = MONTH(CURDATE()) AND a.year = YEAR(CURDATE()) AND b.month = MONTH(CURDATE()) AND b.year = YEAR(CURDATE())";
		else
			$query = "SELECT pan,CONCAT(firstName,' ',lastName) as fullname,b.userID,taxamt,earnings FROM empotherdetails a,payroll_paymentHistory b,emp_master c WHERE a.empid = b.userID AND b.userID = c.userID AND a.month = MONTH(DATE_SUB(CURDATE(),INTERVAL 30 DAY)) AND a.year = YEAR(DATE_SUB(CURDATE(),INTERVAL 30 DAY)) AND b.month = MONTH(DATE_SUB(CURDATE(),INTERVAL 30 DAY)) AND b.year = YEAR(DATE_SUB(CURDATE(),INTERVAL 30 DAY))";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["userID"]] = array("PAN"=>$row["pan"],
											"userID"=>$row["userID"],
											"taxamt"=>$row["taxamt"],
											"earnings"=>$row["earnings"],
											"fullname"=>$row["fullname"]
			);
		}
		return $arrRet;
	}
	function sendEmail($connid,$arrDetailsByID,$chequeNo,$partyid)
	{
		$headers = "";
		$total = "";
		$partyname = "";
		$flag = 0;
		if(strtoupper(substr(PHP_OS,0,3)=='WIN')) 
		{
		  $eol="\r\n";
		} 
		elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) 
		{
		  $eol="\r";
		} 
		else 
		{
		  $eol="\n";
		}
		if($partyid > 0)
		{
			$query = "SELECT partyname FROM bill_partyMaster WHERE partyid = '".$partyid."' ";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$partyname = $row["partyname"];
		}
		$message = "<table align='center' cellspacing='2' cellpadding='4' style='font-family:arial;font-size:12px' border='1'>";
		$message.="<tr><td>Code</td><td>Description</td><td>Bill No</td><td>Invoice Amt</td><td>TDS</td><td>Net Amt</td><td>Other Deduction if Any</td><td>Reason for same</td><td>Pay To</td></tr>";
		if(is_array($arrDetailsByID) && count($arrDetailsByID) >0)
		{ 
			foreach ($arrDetailsByID as $row)
			{
				$total+=$row["netpayable"];
				$message.="<tr><td>".$row["billid"]."</td>";
				$message.="<td>".$row["billdescription"]."</td>";
				$message.="<td>".$row["invoiceno"]."</td>";
				$message.="<td>".number_format($row["invoiceamt"])."</td>";
				$message.="<td>".number_format($row["tdsamount"])."</td>";
				$message.="<td>".number_format($row["netpayable"])."</td>";
				$message.="<td>".number_format($row["deductionamount"])."</td>";
				$message.="<td>".$row["deductionreason"]."</td>";
				$message.="<td>".$row["payto"]."</td></tr>";
				if($row["isMultiSBU"] == "Y")
					$flag = 1;
				$arrSBU[] = $row["sbu_id"];
			}
		}
		
		$arrAuthorityEmail = $this->getApprover1Email($connid);
		$message.="<tr><td colspan='5' align='right'>Total</td><td>".$total."</td><td colspan='3'>&nbsp;</td></tr></table>";						
		$heading = "<html><head><title>Party Payment</title></head><body><font face='arial' size='2'>We have paid ".$partyname." Rs.".$total."/- by cheque No. ".$chequeNo.". Other details are as under.</font><br>";
		$to = "ketan@ei-india.com";
		$headers.= "Content-type: text/html; charset=iso-8859-1$eol";
		$headers.= "From: Ketan EI<ketan@ei-india.com>$eol";
		$headers.= "Cc: ketan@ei-india.com$eol";
		$headers.= "Bcc: rupande.shah@ei-india.com,kavita.jain@ei-india.com$eol";
		$subject="Payment details breakup of ".$partyname;
		//echo $subject;
		$newmessage.=$heading.$message."</body></html>";
		$newmessage=wordwrap($newmessage,70,$eol);
		//echo $newmessage;
		$sbu_id = $arrSBU[0];
		if($flag == 0 && count($arrSBU) == 1)
			$to = $arrAuthorityEmail[$sbu_id];
		if($to != "" && mail($to,$subject,$newmessage,$headers))
		{
			echo "Mail Sent successfully";
		}
		else
		{
			echo "Mail failed";
		}
	}
	function getApprover1Email($connid)
	{
		/*$query = "SELECT srno,authority1,emailComp FROM sbu_master a,emp_master b WHERE a.authority1 = b.userID";*/
		$query = "SELECT srno,sbu_head,emailComp FROM sbu_master a,emp_master b WHERE a.sbu_head = b.userID";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["srno"]] = $row["emailComp"];
		}
		return $arrRet;
	}
	function getContractPeopleForAllowance($connid,$machinetype)
	{
		$arrRet = array();
		$query = "SELECT a.userID FROM payroll_allowanceRequest a,contract_master b WHERE a.userID = b.userID AND approved2_status = 'Approved' AND machine_type = '".$machinetype."' AND DATE_ADD(joinDate,INTERVAL 3 MONTH) <= CURDATE() ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] =	$row[0];
		}
		return $arrRet;
	}
	function getContractPeopleEligibleForAllowance($connid,$machinetype)
	{
		$arrRet = array();
		$query = "SELECT a.userID FROM payroll_allowanceRequest a,contract_master b WHERE a.userID = b.userID AND approved2_status = 'Approved' AND machine_type = '".$machinetype."'  ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] =	$row[0];
		}
		return $arrRet;
	}
	function sendContractSalaryPaymentMails($connid,$cheque_no,$month,$year,$crypt)
	{
		$query = "SELECT a.*,paymentAmount,CONCAT(firstName,' ',lastName) as fullname,MONTHNAME('".$year."-".$month."-01') as mthname,emailComp FROM contract_paymentHistory a,contract_master b WHERE a.userID = b.userID AND b.userID != 'venkat' AND month = '".$month."' AND year = '".$year."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$message = "<p style=\"font-family:arial;font-size:12px;\">Dear ".$row["fullname"].",</p>";
			$message.="<p style=\"font-family:arial;font-size:12px;\">This is to inform you that we have deposited a cheque of Rs.".number_format($row["takehome"])."/- in your account aga your ".$row["mthname"]." month's Contractual payment.</p>";
			$message.="<table style=\"font-family:arial;font-size:12px;border-collapse:collapse;\" cellpadding=\'5\' cellspacing=\'1\' border='1' width='500'>";
			$message.="<tr bgcolor='#FFFFFF'><td>Name</td><td>".$row["fullname"]."</td></tr>";
			$message.="<tr bgcolor='#FFFFFF'><td><b>Monthly Remuneration</b></td><td align='right'>".round($row["paymentAmount"])."</td></tr>";
			$message.="<tr bgcolor='#FFFFFF'><td>This month's Remuneration</td><td align='right'>".$row["basic"]."</td></tr>";
			if($row["laptopallowance"] > 0)
				$message.="<tr bgcolor='#FFFFFF'><td>Laptop Allowance</td><td align='right'>".$row["laptopallowance"]."</td></tr>";
			if($row["desktopallowance"] >0)
				$message.="<tr bgcolor='#FFFFFF'><td>Desktop Allowance</td><td align='right'>".$row["desktopallowance"]."</td></tr>";
			$query_adjustment_sub = "SELECT SUM(amount) FROM contract_salaryAdjustments WHERE userID = '".$row["userID"]."' AND month = '".$month."' AND year = '".$year."' AND operationType = 'Subtract' ";
			$dbquery_adjustment_sub = new dbquery($query_adjustment_sub,$connid);
			$row_subtract_amount = $dbquery_adjustment_sub->getrowarray();
			$deductions = $row_subtract_amount[0];
			
			$query_adjustment_add = "SELECT SUM(amount) FROM contract_salaryAdjustments WHERE userID = '".$row["userID"]."' AND month = '".$month."' AND year = '".$year."' AND operationType = 'Add' ";
			$dbquery_adjustment_add = new dbquery($query_adjustment_add,$connid);
			$row_add_amount = $dbquery_adjustment_add->getrowarray();
			$additions = $row_add_amount[0];
			$adjustment_amount = $additions - $deductions;
			$message.="<tr bgcolor='#FFFFFF'><td>Adjustment Amount</td><td align='right'>".$adjustment_amount."</td></tr>";
				
			$queryTds = "SELECT empId, taxamt FROM empotherdetails WHERE category = 'contract' AND empId = '".$row["userID"]."' AND month = '".$month."' AND year = '".$year."' ";
			$dbqueryTds = new dbquery($queryTds,$connid);
			$rowTds = $dbqueryTds->getrowarray();
			$tdsAmount = $crypt->decrypt($rowTds["taxamt"]);
			if($tdsAmount >0)
				$message.="<tr bgcolor='#FFFFFF'><td>TDS</td><td align='right'>".$tdsAmount."</td></tr>";
			$netAmount = $row["basic"] + $additions + $row["laptopallowance"] + $row["desktopallowance"] - ($deductions + $tdsAmount);
			$message.="<tr bgcolor='#FFFFFF'><td><b>Net Amount</b></td><td align='right'><b>".$netAmount."<b></td></tr>";
			$message.="</table>";
			
			$query_adjustment = "SELECT * FROM contract_salaryAdjustments WHERE month = '".$month."' AND year = '".$year."' AND userID = '".$row["userID"]."' ORDER BY operationType ";
			$dbquery_adjustment = new dbquery($query_adjustment,$connid);
			if($dbquery_adjustment->numrows() > 0)
			{
				$message.="<br><table style=\"font-family:arial;font-size:12px;border-collapse:collapse\" cellpadding=\'10\' cellspacing=\'1\' border='1' width='300'>";
				$message.="<tr><th colspan='3'>Adjustments</th></tr>";
				$message.="<tr><td>Type</td><td>Amount</td><td>Remarks</td></tr>";
				while($row_adjustment = $dbquery_adjustment->getrowarray())
				{
					$message.="<tr><td>".$row_adjustment["operationType"]."</td><td align='right'>".$row_adjustment["amount"]."</td><td>".$row_adjustment["remarks"]."</td></tr>";
				}
				$message.="</table>";
			}
			//$message.="<p>It will be credited in your account today. Request you to check your account.</p>";	
			$message.="<p style=\"font-family:arial;font-size:12px;\">If you have any query, please contact us.</p>";
			$message.="<p style=\"font-family:arial;font-size:12px;\">Regards,<br><b>Team - Accounts</b></p>";
			if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
				  $eol="\r\n";
				} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
				  $eol="\r";
				} else {
				  $eol="\n";
				}
			$headers= "MIME-Version: 1.0$eol";
			$headers.="Content-type: text/html; charset=iso-8859-1$eol";
			$headers.= "From: Ketan<ketan@ei-india.com>$eol";
			$headers.= "Reply-To: <ketan@ei-india.com>$eol";
			$mail_content='<html>
			<head>
			  <title>Mail</title>
			</head>
			<body>';	
			$mail_content.=$message;
			$mail_content.='</body></html>';
			$mail_content=wordwrap($mail_content,70,$eol);
			$headers.= "Cc: Ketan<ketan@ei-india.com>,Rupande Shah<rupande.shah@ei-india.com>$eol";
			
			$to = $row["emailComp"];
			$subLine = $row["mthname"]." months payment";
			echo $subLine;
			echo $message;
			if($netAmount > 0 && $row["takehome"] > 0)
			{
				if(mail($to, $subLine, $mail_content, $headers))
				{
					echo $to."Mail Sent<br>";
				}
				else 
				{
					echo "Mail sending failed";
				}
			}
		}
	}
	function sendFFSPaidMail($chqdtl, $connid)
	{
		include("../empdb/mailers_functions.php");
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}
		$chqDetailsQuery = "SELECT firstName, lastName, number, amount FROM cheques_master cm, emp_master em WHERE srno = $chqdtl AND cm.userid = em.userID";
		$chqDetailsQuery .= " UNION SELECT firstName, lastName, number, amount FROM cheques_master cm, contract_master em WHERE srno = $chqdtl AND cm.userid = em.userID";
		$dbquery_chqDetails = new dbquery($chqDetailsQuery,$connid);
		while($row_chqDetails = $dbquery_chqDetails->getrowarray())
		{
			$message = "Dear Team HR, <br/><br/>";
			$message .= "We have prepared a cheque (No. ".$row_chqDetails["number"].") of Rs.".$row_chqDetails["amount"]."/- as FFS cheque of ".$row_chqDetails["firstName"]." ".$row_chqDetails["lastName"].".<br/><br/>";
			$message .= "We request you to please remove his/her name from the System.<br/><br/>";
			$message .= "Regards<br/>Team Accounts";
		}
				
		$mailerRow = getHRpeopleList("makeCheque.php","ffs completed");
			
		$to = $mailerRow["primary_list"];
		$headers= "MIME-Version: 1.0$eol";
		$headers.="Content-type: text/html; charset=iso-8859-1$eol";
		$headers.= "From: ".$mailerRow["send_from"]."$eol";
		$headers.= "Reply-To: ".$mailerRow["send_from"]."$eol";
		$headers.= "Cc: ".$mailerRow["secondary_list"]."$eol";
		$headers.= "Bcc: ".$mailerRow["condition_based"]."$eol";
		$subject = $mailerRow["subject"];
		
		if(mail($to, $subject, $message, $headers))
		{
			echo $to."Mail Sent<br>";
		}
		else 
		{
			echo "Mail sending failed<br>";
		}
	}
	function sendFFSEmployeeMail($chqdtl, $connid)
	{
		include("../empdb/mailers_functions.php");
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}
		$cheque_number = 0;
		$email_personal = '';
		$empNo = '';
		$userID = '';
		$semi_rand     = md5(time());
		$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
		$chqDetailsQuery = "SELECT firstName,userID, emailPer,empNo,lastName,street,cityName,pincode, number, amount FROM cheques_master cm, emp_master em WHERE srno = $chqdtl AND cm.userid = em.userID";
		$chqDetailsQuery .= " UNION SELECT firstName,userID,emailPer,empNo, lastName,street,cityName,pincode, number, amount FROM cheques_master cm, contract_master em WHERE srno = $chqdtl AND cm.userid = em.userID";
		$dbquery_chqDetails = new dbquery($chqDetailsQuery,$connid);
		while($row_chqDetails = $dbquery_chqDetails->getrowarray())
		{
			$message = "Dear ".$row_chqDetails["firstName"]." ".$row_chqDetails["lastName"]." <br/><br/>";
			$message .="Your Full and Final Settlement (FFS) cheque is ready. Please take a Print-out of the attached FFS Form, sign it and send us a scanned copy as well as the hard copy by courier. <u>On receipt of the hard or soft copy of signed FFS form</u>, we will courier your FFS cheque on below address <br/></br>";
			$message .= '<u><b>Address</b></u>:<br/><br/>';
			$message .= $row_chqDetails["street"].'<br/>'.$row_chqDetails["cityName"].'<br/>Pincode:  '.$row_chqDetails["pincode"].'<br/></br/>';
			$mesaage .= 'If you want us to courier the documents to any other address, please send us complete postal address.';
			$message .= 'Please note that if we do not receive your signed FFS form within 2 months ( i.e. '.date('d-m-Y',strtotime("+2 months", time())).'), any unclaimed FFS amount beyond 2 months will be forfeited. In case of any query or clarification, please feel free to contact us.';
			$message .= "Regards<br/>Team Accounts";
			$cheque_number = $row_chqDetails["number"];
			$email_personal = $row_chqDetails["emailPer"];
			$empNo = $row_chqDetails["empNo"];
			$userID = $row_chqDetails['userID'];
		}
				
		$to = $email_personal;
		$headers    = "\nMIME-Version: 1.0\n" .
						"Content-Type: multipart/mixed;\n" .
						" boundary=\"{$mime_boundary}\"";
		$headers.= "From: rupande.shah@ei-india.com".$eol;
		$headers.= "Reply-To: rupande.shah@ei-india.com ".$eol;
		$headers.= "Cc: ketan@ei-india.com".$eol;

		$subject = '';
		$this->generate_pdf($userID,$cheque_number);
		$attachment = chunk_split(base64_encode(file_get_contents(SITEURL.'ffs_system/uploads/pdf/'.$empNo)));
		$message .= "--{$mime_boundary}\n" .
			"Content-Type: {$fileatttype};\n" .
			" name=FFS.pdf \n" .
			"Content-Disposition: attachment;\n" .
			" filename=\"FFS.pdf\"\n" .
			"Content-Transfer-Encoding: base64\n\n" .
			$attachment . "\n\n" .
			"-{$mime_boundary}-\n";

		if(mail($to, $subject, $message, $headers))
		{
			echo $to."Mail Sent<br>";
		}
		else 
		{
			echo "Mail sending failed<br>";
		}
	}
	function generate_pdf($userID,$cheque_number)
	{
		$postdata = http_build_query(
		    array(
		        'username' => $userID,
		        'chequenumber' => $cheque_number
		    )
		);

		$opts = array('http' =>
		    array(
		        'method'  => 'POST',
		        'header'  => 'Content-type: application/x-www-form-urlencoded',
		        'content' => $postdata
		    )
		);

		$context  = stream_context_create($opts);

		$result = file_get_contents(SITEURL.'ffs_system/pdfgenerate/print_pdf', false, $context);
	}

}
?>
