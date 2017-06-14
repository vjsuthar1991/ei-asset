<?php
include("../approval_common_functions.php");
class clsexpense
{
	/**
	 * Define Master Table 
	 *
	 * @var string
	 * 
	 */
	var $TABLE_MASTER; 
	/**
	 * Define Items Table 
	 *
	 * @var string
	 */
	var $TABLE_ITEM;
	/**
	 * Define Querter Table
	 *
	 * @var string
	 */
	var $TABLE_TICKET;
	
	
	var $tour_no; 
	var $tour_purpose; 
	var $advance_amount; 
	var $first_city; 
	var $tour_status; 
	var $start_date; 
	var $end_date; 
	var $name; 
	var $checked_by; 
	var $approved_by; 
	var $checked_date; 
	var $approved_date; 
	var $reimbursed_date; 
	var $ticket_code_not_use; 
	var $remarks; 
	var $completion_date; 
	var $supportings_details; 
	var $supportings_sent_by; 
	var $supportings_sent_date; 
	var $supportings_notyet_received_date; 
	var $supportings_received_date; 
	var $supportings_partially_received_date; 
	var $supporting_status; 
	var $supportings_comments; 
	var $penalty_removed_reason; 
	var $cheque_no; 
	var $cheque_date; 
	var $payment_sent_date; 
	var $cheque_writing_dt; 
	var $cheque_id; 
	var $payby_dt; 
	var $comments; 
	var $auto_comments; 
	var $breakup_of_payment;

	/**
	 * Fun - Constructor init
	 *
	 * @param string $TABLE_MASTER
	 * @param string $TABLE_ITEM
	 * @return NULL 
	 */
	function clsexpense($TABLE_MASTER='tour_expense_master',$TABLE_ITEM='tour_expense_items')
	{ 		
		$this->TABLE_MASTER = $TABLE_MASTER; //default init
		$this->TABLE_ITEM   = $TABLE_ITEM; //default init
		$this->TABLE_TICKET   = 'ticket_details'; //default init
		
		$this->tour_no = "";
		$this->tour_purpose = "";
		$this->advance_amount = "";
		$this->first_city = "";
		$this->tour_status = "";
		$this->start_date = "0000-00-00"; 
		$this->end_date = "0000-00-00"; 
		$this->name = "";
		$this->checked_by = "";
		$this->approved_by = "";
		$this->checked_date ="0000-00-00"; 
		$this->approved_date = "0000-00-00"; 
		$this->reimbursed_date = "0000-00-00"; 
		$this->ticket_code_not_use = "";
		$this->remarks = "";
		$this->completion_date = "0000-00-00"; 
		$this->supportings_details = "";
		$this->supportings_sent_by = "";
		$this->supportings_sent_date = "0000-00-00"; 
		$this->supportings_notyet_received_date = "0000-00-00"; 
		$this->supportings_received_date ="0000-00-00"; 
		$this->supportings_partially_received_date = "0000-00-00"; 
		$this->supporting_status = "";
		$this->supportings_comments = "";
		$this->penalty_removed_reason = "";
		$this->cheque_no = "";
		$this->cheque_date = "0000-00-00"; 
		$this->payment_sent_date = "0000-00-00"; 
		$this->cheque_writing_dt = "0000-00-00"; 
		$this->cheque_id = "";
		$this->payby_dt = "0000-00-00"; 
		$this->comments = "";
		$this->auto_comments = "";
		$this->breakup_of_payment = "";  
		$this->tour_comments = "";
	}

	function setter($getVal)
	{  		
		$this->tour_no = trim($getVal["tour_no"]);
		$this->tour_purpose = trim($getVal["tour_purpose"]);
		$this->advance_amount = trim($getVal["advance_amount"]);
		$this->first_city = trim($getVal["first_city"]);
		$this->tour_status = trim($getVal["tour_status"]);
		$this->start_date = trim($getVal["start_date"]);
		$this->end_date = trim($getVal["end_date"]);
		$this->name = trim($getVal["name"]);
		$this->checked_by = trim($getVal["checked_by"]);
		$this->approved_by = trim($getVal["approved_by"]);
		$this->checked_date = trim($getVal["checked_date"]);
		$this->approved_date = trim($getVal["approved_date"]);
		$this->reimbursed_date = trim($getVal["reimbursed_date"]);
		$this->ticket_code_not_use = trim($getVal["ticket_code_not_use"]);
		$this->remarks = trim($getVal["remarks"]);
		$this->completion_date = trim($getVal["completion_date"]);
		$this->supportings_details = trim($getVal["supportings_details"]);
		$this->supportings_sent_by = trim($getVal["supportings_sent_by"]);
		$this->supportings_sent_date = trim($getVal["supportings_sent_date"]);
		$this->supportings_notyet_received_date = trim($getVal["supportings_notyet_received_date"]);
		$this->supportings_received_date = trim($getVal["supportings_received_date"]);
		$this->supportings_partially_received_date = trim($getVal["supportings_partially_received_date"]);
		$this->supporting_status = trim($getVal["supporting_status"]);
		$this->supportings_comments = trim($getVal["supportings_comments"]);
		$this->penalty_removed_reason = trim($getVal["penalty_removed_reason"]);
		$this->cheque_no = trim($getVal["cheque_no"]);
		$this->cheque_date = trim($getVal["cheque_date"]);
		$this->payment_sent_date = trim($getVal["payment_sent_date"]);
		$this->cheque_writing_dt = trim($getVal["cheque_writing_dt"]);
		$this->cheque_id = trim($getVal["cheque_id"]);
		$this->payby_dt = trim($getVal["payby_dt"]);
		$this->comments = trim($getVal["comments"]);
		$this->auto_comments = trim($getVal["auto_comments"]);
		$this->breakup_of_payment = trim($getVal["breakup_of_payment"]); 
	}
	function setgetvars()
	{
		$this->tour_no = $_GET["code"];
	}
	function setpostvars()
	{
		//if(isset($_POST['clsschools_schoolname'])) $this->schoolname=$_POST['clsschools_schoolname'];\		
		if(isset($_POST["tour_no"])) $this->tour_no = $_POST["tour_no"];
		if(isset($_POST["tour_purpose"])) $this->tour_purpose = $_POST["tour_purpose"];
		if(isset($_POST["advance_amount"])) $this->advance_amount = $_POST["advance_amount"];
		if(isset($_POST["first_city"])) $this->first_city = $_POST["first_city"];
		if(isset($_POST["tour_status"])) $this->tour_status = $_POST["tour_status"];
		if(isset($_POST["start_date"])) $this->start_date = $_POST["start_date"];
		if(isset($_POST["end_date"])) $this->end_date = $_POST["end_date"];
		if(isset($_POST["name"])) $this->name = $_POST["name"];
		if(isset($_POST["checked_by"])) $this->checked_by = $_POST["checked_by"];
		if(isset($_POST["approved_by"])) $this->approved_by = $_POST["approved_by"];
		if(isset($_POST["checked_date"])) $this->checked_date = $_POST["checked_date"];
		if(isset($_POST["approved_date"])) $this->approved_date = $_POST["approved_date"];
		if(isset($_POST["reimbursed_date"])) $this->reimbursed_date = $_POST["reimbursed_date"];
		if(isset($_POST["ticket_code_not_use"])) $this->ticket_code_not_use = $_POST["ticket_code_not_use"];
		if(isset($_POST["remarks"])) $this->remarks = $_POST["remarks"];
		if(isset($_POST["completion_date"])) $this->completion_date = $_POST["completion_date"];
		if(isset($_POST["supportings_details"])) $this->supportings_details = $_POST["supportings_details"];
		if(isset($_POST["supportings_sent_by"])) $this->supportings_sent_by = $_POST["supportings_sent_by"];
		if(isset($_POST["supportings_sent_date"])) $this->supportings_sent_date = $_POST["supportings_sent_date"];
		if(isset($_POST["supportings_notyet_received_date"])) $this->supportings_notyet_received_date = $_POST["supportings_notyet_received_date"];
		if(isset($_POST["supportings_received_date"])) $this->supportings_received_date = $_POST["supportings_received_date"];
		if(isset($_POST["supportings_partially_received_date"])) $this->supportings_partially_received_date = $_POST["supportings_partially_received_date"];
		if(isset($_POST["supporting_status"])) $this->supporting_status = $_POST["supporting_status"];
		if(isset($_POST["supporting_comments"])) $this->supportings_comments = $_POST["supporting_comments"];
		if(isset($_POST["penalty_removed_reason"])) $this->penalty_removed_reason = $_POST["penalty_removed_reason"];
		if(isset($_POST["cheque_no"])) $this->cheque_no = $_POST["cheque_no"];
		if(isset($_POST["cheque_date"])) $this->cheque_date = $_POST["cheque_date"];
		if(isset($_POST["payment_sent_date"])) $this->payment_sent_date = $_POST["payment_sent_date"];
		if(isset($_POST["cheque_writing_dt"])) $this->cheque_writing_dt = $_POST["cheque_writing_dt"];
		if(isset($_POST["cheque_id"])) $this->cheque_id = $_POST["cheque_id"];
		if(isset($_POST["payby_dt"])) $this->payby_dt = $_POST["payby_dt"];
		if(isset($_POST["comments"])) $this->comments = $_POST["comments"];
		if(isset($_POST["auto_comments"])) $this->auto_comments = $_POST["auto_comments"];
		if(isset($_POST["breakup_of_payment"])) $this->breakup_of_payment = $_POST["breakup_of_payment"];
		if(isset($_POST["tour_comments"])) $this->tour_comments = $_POST["tour_comments"];
		//print_r($_POST);
	}
	
	/**
	 * / function which converts yyyy-mm-dd to dd-mm-yyyy format on valid 
	 *
	 * @param SRTING $DBdate IN yyyy-mm-dd
	 * @return STRING IN dd-mm-yyyy 
	 */
	function formatDateDB($DBdate)
	{
		if(empty($DBdate))
			return $this->start_date;
		elseif($DBdate == '0000-00-00')
			return $this->start_date;
		elseif($DBdate == '00-00-0000')
			return '0000-00-00';	
		else{	
			$dateParameters=explode("-",$DBdate);
			$newformat=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
			return $newformat;
		}
	}	
		
	function getAllExpMaster($connid)
	{
		$query = "SELECT * FROM ".$this->TABLE_MASTER." ORDER BY tour_no desc limit 1";
		$dbquery = new dbquery($query,$connid); 
		$fetchedResult = $dbquery->getrowassocarray(); // get result 
		return $fetchedResult;
	}
	
	/**
	 * Update record by given table id - tour_no
	 *
	 * @param unknown_type $connid
	 */
	function updateExpMasterById($connid,$tour_no)
	{
		$this->setpostvars();
		//echo '<br>'.$this->start_date ;
		$query = "UPDATE ".$this->TABLE_MASTER." SET ".
			 "tour_purpose='".mysql_escape_string($this->tour_purpose)."',".
			 "start_date='".$this->formatDateDB($this->start_date)."',".
			 "end_date='".$this->formatDateDB($this->end_date)."' ".
			 "WHERE tour_no= $tour_no ";
		$dbquery = new dbquery($query,$connid);
	}
	function pageAddEditExpenseDetails($connid,$code,$name,$start_date,$end_date,$sbu,$project,$head,$subhead,$arrItems)
	{
		$this->setpostvars();
		$this->saveData($connid,$code,$name,$start_date,$end_date,$sbu,$project,$head,$subhead,$arrItems);
	}
	function saveData($connid,$code,$name,$start_date,$end_date,$sbu,$project,$head,$subhead,$arrItems)
	{
		//echo $start_date."**".$end_date;
		
		$query_check = "SELECT tour_no FROM ".$this->TABLE_MASTER." WHERE name = '".$name."' AND tour_status = 'running' AND start_date='$start_date' AND end_date='$end_date' ";
		//die($query_check);
		$dbquery_check = new dbquery($query_check,$connid);
		$row_check = $dbquery_check->getrowarray();
		//echo $dbquery_check->numrows();
		if($dbquery_check->numrows() == 0)
		{
			$query = "INSERT INTO ".$this->TABLE_MASTER." SET tour_no = '".$code."',tour_status = 'running',name = '".$name."',start_date = '".$start_date."',end_date = '".$end_date."'";
			//die($query);
			$dbquery = new dbquery($query,$connid);
			$this->saveItems($connid,$arrItems,$code,$sbu,$project,$head,$subhead);
		}
		else
		{
			/*echo $query = "UPDATE local_expense_details SET tour_status = '".$tour_status."' WHERE tour_no = '".$code."' ";
			$dbquery = new dbquery($query,$connid);*/
			$this->saveItems($connid,$arrItems,$code,$sbu,$project,$head,$subhead);
		}
	}
	function saveItems($connid,$arrItems,$code,$sbu,$project,$head,$subhead)
	{
		//echo "<hr>in save itemsw";
		//print_r($arrItems);
		if(is_array($arrItems) && count($arrItems) >0)
		{
			foreach($arrItems as $key => $value)
			{
				//echo("<hr>In loop");
				$query_item = "INSERT INTO ".$this->TABLE_ITEM." SET tour_no = '".$code."',item_type = '".$value["item_type"]."',
								date = '".$value["date"]."',from_location = '".$value["from_location"]."',to_location = '".$value["to_location"]."',
								mode = '".$value["mode"]."',amount = '".$value["amount"]."',rate = '".$value["rate"]."',
								purpose = '".$value["purpose"]."',duration = '".$value["duration"]."',sub_type = '".$value["sub_type"]."',
								local_sbu_id='".$sbu."',local_sbu_project_id='".$project."',local_head_id='".$head."',local_sub_head_id='".$subhead."' ";
				//echo "<hr>Insert  Item Query: ".$query_item."<br>";
				$dbquery_item = new dbquery($query_item,$connid);
			}
		}
		
	}
	function deleteExpense($connid,$code,$user)
	{
		$condition = "";
		if(isset($user) && $user != "")
			$condition = " AND name = '".$user."' ";
		$query = "DELETE FROM ".$this->TABLE_MASTER." WHERE tour_no = '".$code."' ".$condition." LIMIT 1 ";
		$dbquery = new dbquery($query,$connid);
		
		$queryItem = "DELETE FROM ".$this->TABLE_ITEM." WHERE tour_no = '".$code."' ";
		$dbqueryItem = new dbquery($queryItem,$connid);
	}
	function deleteItems($connid,$delete_item)
	{
		if(is_array($delete_item) && count($delete_item) > 0)
	    {
			
		    foreach ($delete_item as $rowDelItem)
		    {
				/*
				 * This Conditional block has been added by Kirti Kumar
				 * for checking items table for tour number
				 * and store that to check if the same tour number has any
				 * items left in table and completely delete from local
				 * expenses details table if any.
				 * The bug was if one deletes all items from a tour,
				 * then the related tour should not be available
				 * where currently it was not being deleted
				 */
				if($this->TABLE_ITEM == 'local_expense_items'){
					$fetchTourNoSql = 'select tour_no from local_expense_items where item_no = "'. $rowDelItem .'"';
					$tourSqlRes = mysql_query($fetchTourNoSql, $connid) or die('Some error occured in #' . __FILE__ . ' Line: ' . __LINE__ . mysql_error($connid));
					$tourSqlRow = mysql_fetch_array($tourSqlRes);
				}
		    	$queryItem = "DELETE FROM ".$this->TABLE_ITEM." WHERE item_no = '".$rowDelItem."' ";
				$dbqueryItem = new dbquery($queryItem,$connid);
				/*
				 * Now check if the tour id stored has any more items
				 * and if present then DO NOT DELETE the respective record
				 * from local expenses details table else delete that
				 */
				 $countItemsPresentSql = 'select count(*) as itemcount from local_expense_items where tour_no = "' . $tourSqlRow['tour_no'] .'"';
				 $countItemsPresentRes = mysql_query($countItemsPresentSql, $connid) or die('Some error occured in #' . __FILE__ . ' Line: ' . __LINE__ . mysql_error($connid));
				 $countItemsPresentRow = mysql_fetch_array($countItemsPresentRes);
				 if($countItemsPresentRow['itemcount'] === '0'){
					$queryToDeleteExpDet = 'delete from local_expense_details where tour_no = "'. $tourSqlRow['tour_no'] .'"';
					$dbqueryItem = mysql_query($queryToDeleteExpDet,$connid) or die('Some error occured in #' . __FILE__ . ' Line: ' . __LINE__ . mysql_error($connid));
				 }
		    }
			
	    }
	}
	function insertLocalExpenseCostCenter($connid,$tr_no,$total_old,$checked="")
	{

		$sbuIDs = array();
		if($checked == 1)
			$fieldname = "SUM(checked_amount)";
		else
			$fieldname = "SUM(amount)";

		if($checked == 1)
		{
			$queryDelete = "DELETE FROM budget_costCenterDetails WHERE category = 'local' AND code = '".$tr_no."' ";
			$dbqueryDelete = new dbquery($queryDelete,$connid);
		}
		$query="SELECT DISTINCT local_sbu_id,local_head_id,local_sbu_project_id,local_sub_head_id FROM ".$this->TABLE_ITEM." WHERE tour_no='".$tr_no."' ";
		//echo $query;exit;
		$dbquery = new dbquery($query,$connid);
                $checkEntryExistsQuery = "DELETE FROM budget_costCenterDetails where category='local' AND code='".$tr_no."'";
                $checkEntryExists = mysql_query($checkEntryExistsQuery) or die(mysql_error());
		while ($row = $dbquery->getrowarray())
		{
			$sbuIDs[] = $row["local_sbu_id"];
			
			$querysum="SELECT ".$fieldname." as amount FROM ".$this->TABLE_ITEM." WHERE tour_no='".$tr_no."' AND local_sbu_id='".$row["local_sbu_id"]."' AND local_head_id='".$row["local_head_id"]."' AND local_sbu_project_id='".$row["local_sbu_project_id"]."' AND local_sub_head_id='".$row["local_sub_head_id"]."' ";
			/*print_r($querysum);
			exit();*/
			$dbquerysum = new dbquery($querysum,$connid);
			$rowsum = $dbquerysum->getrowarray();

			
			$percentage=round(($rowsum[0]/$total_old)*100,3);
			
			//insert the record into database
                        
                        //$entryExists = mysql_fetch_array($checkEntryExists);
                        
                        //if(empty($entryExists)){
                            $query_insert="INSERT INTO budget_costCenterDetails SET category='local', code='".$tr_no."', sbu_id='".$row["local_sbu_id"]."',head_id='".$row["local_head_id"]."',sub_head_id='".$row["local_sub_head_id"]."',sbu_project_id='".$row["local_sbu_project_id"]."',percentage='".$percentage."' ";
                            $dbquery_insert = new dbquery($query_insert,$connid);
                        //}
		}
		
		insertapprovalDetails($sbuIDs,$tr_no,'local');
	}
	function updateSBUdetails($connid,$code,$delete_item,$cc_sbu,$cc_project,$cc_head,$cc_subheads)
	{
		if(is_array($delete_item) && count($delete_item) > 0)
	    {
		    foreach($delete_item as $rowDelItem)
		    {
		    	$query = "UPDATE ".$this->TABLE_ITEM." SET local_sbu_id='".$cc_sbu[0]."',local_sbu_project_id='".$cc_project[0]."',local_head_id='".$cc_head[0]."',local_sub_head_id='".$cc_subheads[0]."' WHERE item_no ='".$rowDelItem."' ";
		        //echo $queryDeleteItem;
		        $dbquery = new dbquery($query,$connid);
		    }
	    }
	}
	function getRunningExpenseStatus($connid)
	{
		$query = "SELECT tour_no,freezePR FROM ".$this->TABLE_MASTER." WHERE tour_status='running' AND name='".$_SESSION['username']."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function generateExpenseCode($connid)
	{
		$query = "SELECT MAX(tour_no) FROM ".$this->TABLE_MASTER;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$code = $row["0"]+1;
	}
	function getFullNameByUserID($connid,$userID)
	{
		$fullname = "";
		$query = "SELECT CONCAT(firstName,' ',lastName) fullname FROM emp_master WHERE userID = '".$userID."' UNION ";
		$query.= "SELECT CONCAT(firstName,' ',lastName) fullname FROM old_emp_master WHERE userID = '".$userID."' UNION ";
		$query.= "SELECT CONCAT(firstName,' ',lastName) fullname FROM contract_master WHERE userID = '".$userID."' UNION ";
		$query.= "SELECT CONCAT(firstName,' ',lastName) fullname FROM old_contract_master WHERE userID = '".$userID."' UNION ";
		$query.= "SELECT fullname FROM guest_login WHERE name = '".$userID."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$fullname = $row["fullname"];
		return $fullname;
	}
	function getItemCountAndTotalAmount($connid,$condition)
	{
		$query = "SELECT COUNT(*),start_date,SUM(amount) FROM local_expense_details a,local_expense_items b WHERE a.tour_no = b.tour_no AND tour_status = 'running' ".$condition." AND name='".$_SESSION['username']."' ORDER BY date,item_no ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function getItemCountAndTotalAmountByCode($connid,$code,$condition)
	{
		$query = "SELECT COUNT(*),start_date,SUM(amount) FROM local_expense_details a,local_expense_items b WHERE a.tour_no = b.tour_no AND a.tour_no = '".$code."' ".$condition." ORDER BY date,item_no ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function getItemDetails($connid,$condition)
	{
		$query = "SELECT a.*, b.* FROM local_expense_details a,local_expense_items b WHERE a.tour_no = b.tour_no AND tour_status='running' ".$condition." AND name='".$_SESSION['username']."' ORDER BY date,item_no ";
		/*print_r($query);
		exit();*/
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getItemDetailsByCode($connid,$code,$condition)
	{
		$query = "SELECT a.*, b.* FROM local_expense_details a,local_expense_items b WHERE a.tour_no = b.tour_no AND a.tour_no='".$code."' ".$condition." ORDER BY date,item_no ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function searchExpenseDetails($status,$user,$day_difference)
	{
            
        /* Code 001 starts here - By Saloni
        * Added budget_costCenterDetails in each condition to fetch SBU, Head and Sub Head filter and sort the query according to that
        */   
	if($status != 'All')
        {
            if(strtolower($status) == 'paid')        
               	$tour_query = "SELECT DISTINCT a.*.b.* FROM local_expense_details a,local_expense_items b WHERE a.tour_no = b.tour_no AND tour_status='paid' AND payment_sent_date != '0000-00-00' ";
             
            
            if($status == 'notseen')
            {
                $tour_query ="SELECT DISTINCT a.tour_no FROM local_expense_details a,local_expense_items b, budget_costCenterDetails c 
                                         WHERE a.tour_no = b.tour_no
                                         AND c.code = a.tour_no
                                         AND completion_date != '0000-00-00'
			                 AND name = '".$user."'
			                 AND supportings_notyet_received_date = '0000-00-00'
			                 AND supportings_received_date = '0000-00-00'
			                 AND tour_status = 'pending' AND start_date >= '2008-04-01'";
            }
            elseif ($status == 'snr')                
            {
                $tour_query ="SELECT DISTINCT a.tour_no FROM local_expense_details a,local_expense_items b, budget_costCenterDetails c 
                                          WHERE a.tour_no = b.tour_no
                                          AND c.code = a.tour_no
			                  AND  supportings_notyet_received_date != '0000-00-00'
			                  AND name = '".$user."'
			                  AND supportings_received_date = '0000-00-00'
			                  AND DATEDIFF(CURDATE(),supportings_notyet_received_date) >= '$day_difference' 
			                  AND tour_status = 'pending' AND start_date >= '2008-04-01'";
            }
			elseif ($status == 'notchecked')
            {
                    $tour_query ="SELECT DISTINCT tour_no FROM local_expense_details a, budget_costCenterDetails c 
                              WHERE  c.code = a.tour_no
                              AND supportings_notyet_received_date != '0000-00-00' 
                              AND supportings_received_date != '0000-00-00'
                              AND (checked_date = '0000-00-00' OR checked_date = '' OR checked_date IS NULL )
                              AND DATEDIFF(CURDATE(),supportings_received_date) >= '$day_difference'
                              AND tour_status = 'approved' AND start_date >= '2008-04-01' ";
            }
            else if($status == 'notpaid')
            {
                    $tour_query ="SELECT DISTINCT tour_no FROM local_expense_details a, budget_costCenterDetails c
                             WHERE c.code = a.tour_no
                             AND supportings_notyet_received_date != '0000-00-00'
                             AND supportings_received_date != '0000-00-00'
                             AND checked_date != '0000-00-00'
                             AND payment_sent_date = '0000-00-00'
                             AND DATEDIFF(CURDATE(),checked_date) >= '$day_difference'
                             AND tour_status = 'checked' AND start_date >= '2008-04-01'";
            }   
            else 
                $tour_query = "SELECT a.*,b.* FROM local_expense_details a,local_expense_items b, budget_costCenterDetails c WHERE a.tour_no = b.tour_no AND c.code = a.tour_no AND tour_status='".$status."' ";
        }
        else
        {
            $tour_query = "SELECT a.*,b.* FROM local_expense_details a,local_expense_items b, budget_costCenterDetails c WHERE a.tour_no = b.tour_no AND c.code = a.tour_no AND tour_status!='running' ";
				
        }
        /* Code 001 ends here
         */
		return $tour_query;
	}
	function setClaimIncomplete($connid,$user,$code,$category,$arrAdmin,$freezePenalty=0)
	{
            
            /* Code to not insert duplicate entries on completing a tour - By Saloni*/
            /* Starts here */
            $previousComment = "SELECT comments from ".$this->TABLE_MASTER." where tour_no = '".$code."'";
	    $getCommentsList = mysql_query($previousComment) or die (mysql_error());
            $getCommentsListing = mysql_fetch_assoc($getCommentsList);
            
            $query = "UPDATE ".$this->TABLE_MASTER." SET comments=CONCAT('".$getCommentsListing['comments']."','\n".$_SESSION['username'].": This claim had been sent back to user. Kindly proceed for approval again.') WHERE tour_no='".$code."'";
            $dbquery = new dbquery($query,$connid);
            
            if(in_array($user,$arrAdmin))
	    	$query = "UPDATE ".$this->TABLE_MASTER." SET tour_status='running',supportings_notyet_received_date = '0000-00-00',supportings_received_date = '0000-00-00',checked_by = '',checked_date = '' WHERE tour_no='".$code."'";
	    else
	    	$query = "UPDATE ".$this->TABLE_MASTER." SET tour_status='running',checked_by = '',checked_date = '' 
	    	WHERE tour_no='$code'";
	    $dbquery = new dbquery($query,$connid);
	    /* Ends here - By Saloni */
            
	    //delete from common_sbuapproverList which are associated with given code.
		$apprqry = "delete from common_sbuApproverList where code = '".$code."' and type = 'local'";
		mysql_query($apprqry) or die ('Mysql Error tour incomplete apprqry: '.mysql_error());
	    
	    
		// Delete sbu old cost center entries
		$query_del_cc = "DELETE from budget_costCenterDetails WHERE category='".$category."' AND code='".$code."'";
	    $dbquery_del_cc = new dbquery($query_del_cc,$connid);
		if(isset($freezePenalty) && $freezePenalty == 1)
		{
			$query_freeze = "UPDATE ".$this->TABLE_MASTER." SET freezePR = '".$freezePenalty."' WHERE tour_no='".$code."'";
			$dbquery_freeze = new dbquery($query_freeze,$connid);
		}
	}
	function setClaimApproved($connid,$user,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET approved_by = '".$user."',tour_status='approved',approved_date='".date("Y-m-d")."' WHERE tour_no='".$code."'";
		$dbquery = new dbquery($query,$connid);
	}
	function setClaimAsPaid($connid,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET tour_status = 'paid' WHERE tour_no ='".$code."' ";
		$dbquery = new dbquery($query,$connid);
	}
	function setPenaltyRemovedReason($connid,$penaltycheck_reason,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET penalty_removed_reason='".mysql_escape_string(trim($penaltycheck_reason))."' WHERE tour_no='".$code."' ";
		$dbquery = new dbquery($query,$connid);
	}
	
	function setReimbed($connid,$penaltycheck_reason,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET  tour_status='reimbursed', reimbursed_date='".mysql_escape_string(trim(date('Y-m-d')))."' WHERE tour_no='".$code."' ";
		$dbquery = new dbquery($query,$connid);
	}
	function setClaimAsChecked($connid,$user,$code,$paybydate)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET checked_by = '".$user."',tour_status='checked',payby_dt='".$paybydate."',checked_date='".date("Y-m-d")."',supportings_received_date = CURDATE(),supporting_status = '".$this->supporting_status."',supportings_comments = '".$this->supportings_comments."',comments = '".$this->comments."' WHERE tour_no = '".$code."' ";
		$dbquery = new dbquery($query,$connid);
	}
	function setCheckedAmountItems($connid,$val,$code,$item_no)
	{
		$query = "UPDATE ".$this->TABLE_ITEM." SET checked_amount = '".$val."' WHERE item_no = '".$item_no."' AND tour_no = '".$code."' ";
		$dbquery = new dbquery($query,$connid);
	}
	function getTotalCheckedAmountByCode($connid,$code)
	{
		$query = "SELECT SUM(amount),SUM(checked_amount) FROM ".$this->TABLE_ITEM." WHERE tour_no = '".$code."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function getExpenseDetailsByCode($connid,$code)
	{
		$query = "SELECT * FROM local_expense_details a,local_expense_items b WHERE a.tour_no = b.tour_no AND a.tour_no = '".$code."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function getClaimStatus($connid,$code)
	{
		$query = "SELECT tour_status FROM ".$this->TABLE_MASTER." WHERE tour_no = '".$code."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function updateClaimStatusAndDetails($connid,$remark,$start_date,$end_date,$supportings_details,$all_supportings_sent_by,$date_supportings_sent_mod,$projectConsider,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET tour_status='pending',remarks='".$remark."',start_date='".$start_date."',end_date='".$end_date."',supportings_details = '".$supportings_details."',supportings_sent_by='".$all_supportings_sent_by."',supportings_sent_date='".$date_supportings_sent_mod."',projectConsider = '".$projectConsider."' WHERE tour_no='".$code."' "; 
		//die($query);
		$dbquery = new dbquery($query,$connid);
	}
	function freezePenalty($connid,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET completion_date = CURDATE() WHERE tour_no='".$code."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
	}
	function getUsernamePenalty($connid,$code)
	{
		$query = "SELECT name,SUM(amount) as total,completion_date FROM local_expense_details a,local_expense_items b WHERE a.tour_no = b.tour_no AND a.tour_no='".$code."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function getCommExpByCode($connid,$code)
	{
		$query = "SELECT SUM(amount) as total FROM ".$this->TABLE_ITEM." WHERE tour_no='".$code."' AND item_type IN ('ph','net') ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function getPayrollComm($connid,$code,$username_penalty)
	{
		$query = "SELECT communication FROM  payroll_statusMaster WHERE userid = '".$username_penalty."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function getRunningOrPendingClaimByName($connid,$name)
	{
		//$query = "SELECT * FROM ".$this->TABLE_MASTER." WHERE name = '".$name."' AND (tour_status='running' OR tour_status = 'pending') ORDER BY start_date ASC ";
		$query = "SELECT * FROM ".$this->TABLE_MASTER." WHERE name = '".$name."' AND (tour_status='running') ORDER BY start_date DESC ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function setSupportingsReceievedDetails($connid,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET supportings_received_date = CURDATE() WHERE tour_no = '".$code."'";
		$dbquery = new dbquery($query,$connid);
	}
	function setSupportingsNotReceievedDetails($connid,$code)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET supportings_notyet_received_date = CURDATE() WHERE tour_no = '".$code."'";
		$dbquery = new dbquery($query,$connid);
	}
	function setExpensePaymentDetails($connid,$code,$cheque_no,$cheque_id,$cheque_writing_dt)
	{
		$query = "UPDATE ".$this->TABLE_MASTER." SET payment_sent_date = CURDATE(),paidSetInterface = '1',cheque_no = '$cheque_no',tour_status = 'paid',cheque_writing_dt = '".$cheque_writing_dt."',cheque_date = '$cheque_formatted_date',cheque_id = '".$cheque_id."' WHERE tour_no = '".$code."' AND tour_status = 'checked'";
		$dbquery = new dbquery($query,$connid);
	}
	function addComments($connid,$code)
	{
		$query ="UPDATE ".$this->TABLE_MASTER." SET supportings_partially_received_date = CURDATE(),supporting_status = '".$this->supporting_status."',supportings_comments = '".$this->supportings_comments."' WHERE tour_no='".$code."' AND tour_status = 'approved' ";
        $dbquery = new dbquery($query,$connid);
	}
	function addApprovedComments($connid,$code)
	{
		$tour_appComments = $_SESSION["username"]."(".date("d-m-Y H:i")."):".$this->tour_comments;
    	$queryDC = "SELECT COUNT(*) FROM ".$this->TABLE_MASTER." WHERE comments LIKE '%".$tour_appComments."%' AND tour_no = '".$code."' ";
		$resultDC = mysql_query($queryDC) or die(mysql_error());
		$rowDC = mysql_fetch_array($resultDC);
		if($rowDC[0] == 0)
		{
			$query ="UPDATE ".$this->TABLE_MASTER." SET comments = CONCAT_WS('<br>',comments,'".$tour_appComments."') WHERE tour_no='".$code."'";
			mysql_query($query) or die("#$query# ". mysql_error()."<br>update problem".$query);  
		}
	}
}// Class Ends here...
?>
