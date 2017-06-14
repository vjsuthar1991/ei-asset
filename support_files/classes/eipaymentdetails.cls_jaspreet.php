<?php

class clspaymentdetails
{
	var $payment_id;
	var $test_edition;
	var $school_code;
	var $who_paid;
	var $who_deposited;
	var $payment_type;
	var $amount;
	var $when_paid; // Should only be numeric
	var $paymentMode;
	var $cheque_dd_no;
	var $cheque_dd_date;
	var $bank_name;
	var $bank_branch_name;
	var $bank_city_name;
	var $ssf_sent;
	var $comments;
	var $action_on_dd;
	var $amt_recd_and_updated;
	var $entered_dt;
	var $entered_by;
	var $updated_dt;
	var $updated_by;
	var $error;
	var $action;
	var $search_school_code;
	var $paymentdetail_deactivate;
	var $payment_status;
	// Paging and Sorting variables
	var $currentpage;
	var $numofpages;
	var $numofrecs;
	var $recsfrom;
	var $recsto;
	var $sortby;
	var $sorttype;
	var $clspaging;
	
	var $keyword;
	var $no_of_students;
	var $paid1;
	var $paid2;
	var $paid3;
	var $amount_payable;
	var $search_test_edition;
	var $search_ssf_sent;
	var $search_action_on_dd;
	
	function clspaymentdetails()
	{
		$this->clspaging = new clspaging('paymentlist');
		$this->payment_id = 0;
		$this->test_edition = "H";
		$this->school_code = "-1";
		$this->who_paid = "";
		$this->who_deposited = "";
		$this->payment_type = "-1";
		$this->amount = "";
		$this->when_paid = "0000-00-00";
		$this->paymentMode = "-1";
		$this->cheque_dd_no = "";
		$this->cheque_dd_date = "0000-00-00";
		$this->bank_name = "-1";
		$this->bank_branch_name = "";
		$this->bank_city_name = "-1";
		$this->ssf_sent = "SBR";
		$this->comments = "";
		$this->action_on_dd = "Ei-Account";
		$this->amt_recd_and_updated = "";
		$this->entered_dt = "0000-00-00 00:00:00";
		$this->entered_by = "";
		$this->updated_dt = "0000-00-00 00:00:00";
		$this->updated_by = "";
		$this->error = array();
		$this->action = "";
		$this->search_school_code = "";
		$this->paymentdetail_deactivate = "";
		$this->payment_status = "N";
		
		$this->noofrecords=5;
		$this->currentpage=0;
		$this->numofpages=0;
		$this->numofrecs=0;
		$this->recsfrom=0;
		$this->recsto=0;
		$this->sortby = "payment_info.entered_dt";
		$this->sorttype = "DESC";
		$this->keyword = ""; 
		$this->no_of_students = 0;
		$this->paid1 = 0;
		$this->paid2 = 0;
		$this->paid3 = 0;
		$this->amount_payable = 0;
		$this->search_test_edition = -1;
		$this->search_ssf_sent = -1;
		$this->search_action_on_dd = -1;
	}
	
	// To set properties with post variables 
	function setpostvars()
	{
		if(isset($_POST['clspaymentdetails_test_edition'])) $this->test_edition=$_POST['clspaymentdetails_test_edition'];
		if(isset($_POST['clspaymentdetails_schoolcode'])) $this->school_code=$_POST['clspaymentdetails_schoolcode'];
		if(isset($_POST['clspaymentdetails_search_school_code'])) $this->search_school_code=$_POST['clspaymentdetails_search_school_code'];
		if(isset($_POST['clspaymentdetails_who_paid'])) $this->who_paid=$_POST['clspaymentdetails_who_paid'];
		if(isset($_POST['clspaymentdetails_who_deposited'])) $this->who_deposited=$_POST['clspaymentdetails_who_deposited'];
		if(isset($_POST['clspaymentdetails_payment_type'])) $this->payment_type=$_POST['clspaymentdetails_payment_type'];
		if(isset($_POST['clspaymentdetails_amount'])) $this->amount=$_POST['clspaymentdetails_amount'];
		if(isset($_POST['clspaymentdetails_when_paid'])) $this->when_paid=$_POST['clspaymentdetails_when_paid'];
		if(isset($_POST['clspaymentdetails_paymentMode'])) $this->paymentMode=$_POST['clspaymentdetails_paymentMode'];
		if(isset($_POST['clspaymentdetails_cheque_dd_no'])) $this->cheque_dd_no=$_POST['clspaymentdetails_cheque_dd_no'];
		if(isset($_POST['clspaymentdetails_cheque_dd_date'])) $this->cheque_dd_date=$_POST['clspaymentdetails_cheque_dd_date'];
		if(isset($_POST['clspaymentdetails_bank_name'])) $this->bank_name=$_POST['clspaymentdetails_bank_name'];
		if(isset($_POST['clspaymentdetails_bank_branch_name'])) $this->bank_branch_name=$_POST['clspaymentdetails_bank_branch_name'];
		if(isset($_POST['clspaymentdetails_bank_city_name'])) $this->bank_city_name=$_POST['clspaymentdetails_bank_city_name'];
		if(isset($_POST['clspaymentdetails_action_on_dd'])) $this->action_on_dd=$_POST['clspaymentdetails_action_on_dd'];
		if(isset($_POST['clspaymentdetails_ssf_sent'])) $this->ssf_sent=$_POST['clspaymentdetails_ssf_sent'];
		if(isset($_POST['clspaymentdetails_comments'])) $this->comments=$_POST['clspaymentdetails_comments'];
		if(isset($_POST['clspaymentdetails_amt_recd_and_updated'])) $this->amt_recd_and_updated=$_POST['clspaymentdetails_amt_recd_and_updated'];
		if(isset($_POST['clspaymentdetails_hdnaction'])) $this->action=$_POST['clspaymentdetails_hdnaction'];
		if(isset($_POST['clspaymentdetails_deactivate_payment'])) $this->paymentdetail_deactivate=$_POST['clspaymentdetails_deactivate_payment'];
		if(isset($_POST['clspaymentdetails_payment_status'])) $this->payment_status=$_POST['clspaymentdetails_payment_status'];
		if(isset($_POST['clspaymentdetails_sorttype'])) $this->sorttype=$_POST['clspaymentdetails_sorttype'];
		if(isset($_POST['clspaymentdetails_sortby']))	$this->sortby=trim($_POST['clspaymentdetails_sortby']);
		if(isset($_POST['clspaymentdetails_keyword']))	$this->keyword=trim($_POST['clspaymentdetails_keyword']);
		if(isset($_POST['clspaymentdetails_search_test_edition'])) $this->search_test_edition=$_POST['clspaymentdetails_search_test_edition'];
		if(isset($_POST['clspaymentdetails_search_ssf_sent'])) $this->search_ssf_sent=$_POST['clspaymentdetails_search_ssf_sent'];
		if(isset($_POST['clspaymentdetails_search_action_on_dd'])) $this->search_action_on_dd=$_POST['clspaymentdetails_search_action_on_dd'];
		if(isset($_POST['clspaymentdetails_hdnpaymentid'])) $this->payment_id=$_POST['clspaymentdetails_hdnpaymentid'];
		//if(isset($_POST['clspaging__currentpage'])) $this->clspaging->currentpage=$_POST['clspaging__currentpage'];
		//print_r($_POST);
	}
	
	function pageAddPaymentDetails($connid)
	{
		$this->setpostvars();
		if($this->validation($connid))
		{
			if($this->action == "Savedata")
			{
				$this->savedata($connid);
				header("Location:eipaymentdetails_list.php");
			}
		}
		if($this->action == "Edit")
		{
			$this->retrieveDatabyPaymentID($connid,$this->payment_id);
		}
		if($this->action == "Setschoolpaymentdetails")
		{
			$this->getPaymentDetailsBySchoolCode($connid,$this->school_code,$this->test_edition);			
		}
	}
	function savedata($connid)
	{
		$name = $_SESSION["username"];
		//$name = "bidhan";
		if($this->paymentMode == "Cash")
			$this->cheque_dd_date = "0000-00-00";
		
		if($this->payment_id == 0)
		{
			$query = "INSERT INTO payment_info( ".
					 "test_edition,school_code,who_paid,who_deposited,payment_type,".
					 "amount,when_paid,mode_of_payment,cheque_dd_no,".
					 "cheque_dd_date,bank_name,branch_name,city,".
					 "ssf_sent,comment,action_on_dd,entered_dt,entered_by) ".
					 "VALUES (".
					 "'".$this->test_edition."',".
					 "'".$this->school_code."',".
					 "'".$this->who_paid."',".
					 "'".$this->who_deposited."',".
					 "'".$this->payment_type."',".
					 "'".$this->amount."',".
					 "'".$this->when_paid."',".
					 "'".$this->paymentMode."',".
					 "'".$this->cheque_dd_no."',".
					 "'".$this->cheque_dd_date."',".
					 "'".$this->bank_name."',".
					 "'".$this->bank_branch_name."',".
					 "'".$this->bank_city_name."',".
					 "'".$this->ssf_sent."',".
					 "'".$this->comments."',".
					 "'".$this->action_on_dd."',".
					 "NOW(),".
					 "'".$name."' ".
					 ")";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			$this->sendMail($connid,$name,$this->school_code);
		}
		else 
		{
			$query = "UPDATE payment_info SET ".
					 "school_code = '".$this->school_code."',".
					 "test_edition = '".$this->test_edition."',".
					 "who_paid = '".$this->who_paid."',".
					 "who_deposited = '".$this->who_deposited."',".
					 "payment_type = '".$this->payment_type."',".
					 "amount = '".$this->amount."',".
					 "when_paid = '".$this->when_paid."',".
					 "mode_of_payment = '".$this->paymentMode."',".
					 "cheque_dd_no = '".$this->cheque_dd_no."',".
					 "cheque_dd_date = '".$this->cheque_dd_date."',".
					 "bank_name = '".$this->bank_name."',".
					 "branch_name = '".$this->bank_branch_name."',".
					 "city = '".$this->bank_city_name."',".
					 "ssf_sent = '".$this->ssf_sent."',".
					 "action_on_dd = '".$this->action_on_dd."',".
					 "comment = CONCAT(comment,', ','".$this->comments."'),".
					 "updated_dt = NOW(),".
					 "updated_by = '".$name."' ".
					 "WHERE payment_id = '".$this->payment_id."' ";
					 
					 
			$dbquery = new dbquery($query,$connid);
		}
		//echo $query;
	}
	function CheckExistence($connid,$school_code,$test_edition)
	{
		$query = "SELECT * FROM payment_info WHERE school_code = '".$school_code."' ".
				 "AND test_edition = '".$test_edition."'";
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows() > 0)
			return true;
		else 
			return false;
		
	}
	function retrieveDatabyPaymentID($connid,$paymentid)
	{
		
		$query = "SELECT payment_id,school_code,test_edition,who_paid,".
				 "who_deposited,payment_type,amount,when_paid,mode_of_payment,".
				 "cheque_dd_no,cheque_dd_date,bank_name,branch_name,city,ssf_sent,action_on_dd,amt_recd_and_updated ".
				 "FROM payment_info ".
				 "WHERE payment_id = '".$paymentid."' ";
				 
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		//echo $query;
		
			 $this->school_code = $row["school_code"];
			 $this->test_edition = $row["test_edition"];
			 $this->who_paid = $row["who_paid"];
			 $this->who_deposited = $row["who_deposited"];
			 $this->payment_type = $row["payment_type"];
			 $this->amount = $row["amount"];
			 $this->when_paid = $row["when_paid"];
			 $this->paymentMode = $row["mode_of_payment"];
			 $this->cheque_dd_no = $row["cheque_dd_no"];
			 $this->cheque_dd_date = $row["cheque_dd_date"];
			 $this->bank_name = $row["bank_name"];
			 $this->bank_branch_name = $row["branch_name"];
			 $this->bank_city_name = $row["city"];
			 $this->ssf_sent = $row["ssf_sent"];
			 $this->action_on_dd = $row["action_on_dd"];
			 $this->amt_recd_and_updated = $row["amt_recd_and_updated"];
	}
	
	function getSchoolDataArrayasperZonalManager($connid)
	{
		$arrRet = array();
		$name = $_SESSION["username"];
		//echo $name;
		//$name = "bidhan";
		if($this->CheckUserisManagaer($connid,$name))
		{
			$query = "SELECT s.schoolno,s.schoolname, ".
					 "s.city from schools s, school_status ss ".
					 "WHERE s.schoolno=ss.school_code ".
					 /*"AND s.territory=ta.territory ".*/
					 "AND  (zm='".$name."' ".
					 "OR rm_am='".$name."' ".
					 /*"OR addtl_username='".$name."' ".
				 	 "OR mse_username='".$name."' ".*/
					 "OR ea='".$name."' ) ".
					 "AND ss.test_edition = '".$this->test_edition."' ".
					 "ORDER BY s.schoolname ";			
		}
		else 
		{
			$query = "SELECT s.schoolno,s.schoolname, ".
					 "s.city from schools s, school_status ss ".
					 "WHERE s.schoolno=ss.school_code ".
					 "AND ss.test_edition = '".$this->test_edition."' ".
					 "ORDER BY s.schoolname ";
		}
		$dbquery = new dbquery($query,$connid);
		//echo $query;
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["schoolno"]] = array("schoolno" => $row["schoolno"],
											  "schoolname" => $row["schoolname"],
											  "city" => $row["city"]
											  );
		}
		return $arrRet;
	}
	function getCityArrayasperZonalManager($connid)
	{
		$arrRet = array();
		//$name = $_SESSION["username"];
		//$name = "bidhan";
		/*if($this->CheckUserisManagaer($connid,$name))
		{
			$query = "SELECT DISTINCT ".
					 "s.city from schools s, school_status ss, territory_allotment ta ".
					 "WHERE s.schoolno=ss.school_code ".
					 "AND s.territory=ta.territory ".
					 "AND  (zm_username='".$name."' ".
					 "OR rm_username='".$name."' ".
					 "OR ea_username='".$name."' ) ".
					 "AND ss.test_edition = '".$this->test_edition."' ".
					 "ORDER BY s.city ";
		}
		else 
		{*/
			$query = "SELECT DISTINCT ".
					 "s.city from schools s, school_status ss ".
					 "WHERE s.schoolno=ss.school_code ".
					 "AND ss.test_edition = '".$this->test_edition."' ".
					 "ORDER BY s.city ";
		//}
				 
		$dbquery = new dbquery($query,$connid);
		//echo $query;
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["city"]] = array("city" => $row["city"]);
		}
		return $arrRet;
	}
	function getTestEditionAndRound($connid)
	{
		$arrRet = array();
		$query = "SELECT test_edition,description FROM test_edition_details ";
		$dbquery = new dbquery($query,$connid);
		//echo $query;
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["test_edition"]] = array("test_edition" => $row["test_edition"],
											  "description" => $row["description"]
											  );
		}
		return $arrRet;
	}
	function validation($connid)
	{
		if($this->school_code == "")
			$this->error["school_code"]  = "School Name is a required field\r\n";
		if($this->who_paid == "")
			$this->error["who_paid"]  = "Who Paid is a required field\r\n";
		if($this->who_deposited == "")
			$this->error["who_deposited"]  = "School Code is a required field\r\n";
		if($this->payment_type == "-1")
			$this->error["payment_type"] = "Payment Type is required field\r\n";
		if($this->amount == "")
			$this->error["amount"] = "Amount is a required field\r\n";
		elseif(!ctype_digit($this->amount))
			$this->error["amount"] = "Amount should only have numeric digits\r\n";
		if($this->when_paid == "")
			$this->error["when_paid"] = "When Paid is a required field\r\n";
		if($this->bank_name == "-1")
			$this->error["bank_name"] = "Bank Name is a required field\r\n";
		if($this->bank_branch_name == "")
			$this->error["bank_branch_name"] = "Branch Name is a required field\r\n";
		if($this->bank_city_name == "-1")
			$this->error["bank_city_name"] = "City Name is a required field\r\n";
		if($this->paymentMode == "-1")
			$this->error["paymentMode"] = "Payment Mode is a required field\r\n";
		if($this->paymentMode != "Cash")
		{	
			
			if($this->cheque_dd_no == "")
				$this->error["cheque_dd_no"] = "Cheque/DD No. is a required field\r\n";
			elseif($this->payment_id == 0)
			{
				if($this->CheckChequeOrDDduplication($connid,$this->cheque_dd_no,$this->bank_name,$this->bank_city_name))
					$this->error["cheque_dd_no"] = "Cheque/DD No. and Bank Combination already Exists \r\n";
			}
			if($this->cheque_dd_date == "")
				$this->error["cheque_dd_date"] = "Cheque/DD Date. is a required field\r\n";
			
		}
		
		if($this->action_on_dd == "-1")
			$this->error["action_on_dd"] = "Action taken on Cheque/DD is a required field\r\n";
		if($this->ssf_sent == "-1")
			$this->error["ssf_sent"] = "SSF sent is a required field\r\n";
			
		if(is_array($this->error) && count($this->error) > 0)
			return false;
		else 
			return true;
	}
	
	function searchPaymentDetails($connid)
	{
		$name = $_SESSION["username"];
		//$name = "bidhan";
		$this->setpostvars();
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
		$condition = "";
		$querySelect = "SELECT payment_id,schools.schoolname,payment_info.school_code,payment_info.test_edition,payment_info.who_paid,payment_info.who_deposited,payment_info.payment_type,payment_info.amount,".
				 "payment_info.when_paid,payment_info.mode_of_payment,payment_info.cheque_dd_no,payment_info.cheque_dd_date,payment_info.bank_name,".
				 "payment_info.branch_name,payment_info.city,payment_info.ssf_sent,payment_info.action_on_dd,payment_info.amt_recd_and_updated, ".
				 "payment_info.entered_by,payment_info.updated_by ";
		
		$queryCount = "SELECT count(*) ";
		$queryFrom = "FROM payment_info ";
		if($this->CheckUserisManagaer($connid,$name))
		{
		 	$queryLeftJoin = " LEFT JOIN schools ON payment_info.school_code = schools.schoolno ".
		 					 " LEFT JOIN school_status ON schools.schoolno = school_status.school_code ";
		 					 
		 	$queryWhere = " WHERE  (zm='".$name."' ".
						  "OR rm_am='".$name."' ".
						  /*"OR addtl_username='".$name."' ".
				 		  "OR mse_username='".$name."' ".*/
						  "OR ea='".$name."' ) ";
		 	
		}
		else 
		{
		 	$queryLeftJoin = " LEFT JOIN schools ON payment_info.school_code = schools.schoolno ";
		 					 
		 	$queryWhere = " WHERE 1 = 1 ";
		}
		if($this->search_test_edition != "-1")
			$condition .= "AND payment_info.test_edition LIKE '%".$this->search_test_edition."%' ";
		if($this->payment_status != "-1")
			$condition .= " AND amt_recd_and_updated = '".$this->payment_status."' ";
		if($this->search_ssf_sent != "-1")
			$condition .= "AND payment_info.ssf_sent LIKE '%".$this->search_ssf_sent."%' ";
		if($this->search_action_on_dd != "-1")
			$condition .= "AND payment_info.action_on_dd LIKE '%".$this->search_action_on_dd."%' ";	
		if($this->school_code != "")
		{
				if($this->school_code != "-1")
				{
					$condition = "AND payment_info.school_code = '".$this->school_code."'";
				}
		}
		if($this->search_school_code != "")
			$condition .= "AND payment_info.school_code = '".$this->search_school_code."' ";
		if($this->who_paid != "")
			$condition .= "AND payment_info.who_paid LIKE '%".$this->who_paid."%' ";
		if($this->who_deposited != "")
			$condition .= "AND payment_info.who_deposited LIKE '%".$this->who_deposited."%' ";
		if($this->payment_type != "-1")
			$condition .= "AND payment_info.payment_type LIKE '%".$this->payment_type."%' ";
		if($this->amount != "")
			$condition .= "AND payment_info.amount LIKE '%".$this->amount."%' ";
		if($this->when_paid != "0000-00-00")
			$condition .= "AND payment_info.when_paid LIKE '%".$this->when_paid."%' ";
		if($this->paymentMode != "-1")
			$condition .= "AND payment_info.mode_of_payment LIKE '%".$this->paymentMode."%' ";
		if($this->cheque_dd_date != "0000-00-00" )
			$condition .= "AND payment_info.cheque_dd_date LIKE '%".$this->cheque_dd_date."%' ";
		if($this->cheque_dd_no != "" )
			$condition .= "AND payment_info.cheque_dd_no LIKE '%".$this->cheque_dd_no."%' ";	
		if($this->bank_name != "-1" )
			$condition .= "AND payment_info.bank_name LIKE '%".$this->bank_name."%' ";
		if($this->bank_branch_name != "" )
			$condition .= "AND payment_info.branch_name LIKE '%".$this->bank_branch_name."%' ";	
		if($this->bank_city_name != "-1" )
			$condition .= "AND payment_info.city LIKE '%".$this->bank_city_name."%' ";
		if($this->keyword != "" )
			$condition .="AND ( payment_info.action_on_dd LIKE '%".$this->keyword."%' OR payment_info.city LIKE '%".$this->keyword."%' OR payment_info.branch_name LIKE '%".$this->keyword."%' OR payment_info.bank_name LIKE '%".$this->keyword."%' OR payment_info.cheque_dd_date LIKE '%".$this->keyword."%' OR payment_info.mode_of_payment LIKE '%".$this->keyword."%' OR payment_info.when_paid LIKE '%".$this->keyword."%' OR payment_info.amount LIKE '%".$this->keyword."%' OR payment_info.payment_type LIKE '%".$this->keyword."%' OR who_deposited LIKE '%".$this->keyword."%' OR who_paid LIKE '%".$this->keyword."%' OR payment_info.school_code = '".$this->keyword."' OR payment_info.ssf_sent LIKE '%".$this->keyword."%' ) ";
		
		
		$query = $queryCount.$queryFrom.$queryLeftJoin." ".$queryWhere." ".$condition;
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->clspaging->numofrecs = $row[0];
		if($this->clspaging->numofrecs >0)
		{
			$this->clspaging->getcurrpagevardb();
		}
		$query = $querySelect.$queryFrom.$queryLeftJoin." ".$queryWhere." ".$condition." "."ORDER BY $this->sortby $this->sorttype"." ".$this->clspaging->limit;
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["payment_id"]] = array("payment_id" => $row["payment_id"],
											  "school_code" => $row["school_code"],
											  "test_edition" => $row["test_edition"],	
											  "schoolname" => $row["schoolname"],
											  "who_paid" => $row["who_paid"],
											  "who_deposited" => $row["who_deposited"],
											  "payment_type" => $row["payment_type"],
											  "amount" => $row["amount"],
											  "when_paid"=>$row["when_paid"],
											  "mode_of_payment"=>$row["mode_of_payment"],
											  "cheque_dd_no"=>$row["cheque_dd_no"],
											  "cheque_dd_date"=>$row["cheque_dd_date"],
											  "bank_name"=>$row["bank_name"],
											  "branch_name"=>$row["branch_name"],
											  "city" => $row["city"],
											  "ssf_sent" => $row["ssf_sent"],
											  "action_on_dd" => $row["action_on_dd"],
											  "entered_by" => $row["entered_by"],
											  "updated_by" => $row["updated_by"],
											  "amount_payable" => $row["amount_payable"],
											  "amt_recd_and_updated" => $row["amt_recd_and_updated"]
											  );
		}
		return $arrRet;
	}
	function DeactivateOrActivatePayments($connid)
	{
		$this->setpostvars();
		if($this->action == "Deactivate")
		{
			foreach($this->paymentdetail_deactivate as $paymentid)
			{
				$query = "UPDATE payment_info SET amt_recd_and_updated = 'Y' ".
						 "WHERE payment_id = '".$paymentid."' AND amt_recd_and_updated = 'N' ";
						 
				$dbquery = new dbquery($query,$connid);
			}
		}
		elseif($this->action == "Activate")
		{
			foreach($this->paymentdetail_deactivate as $paymentid)
			{
				$query = "UPDATE payment_info SET amt_recd_and_updated = 'N' ".
						 "WHERE payment_id = '".$paymentid."' AND amt_recd_and_updated = 'Y' ";
						 
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function CheckUserisManagaer($connid,$name)
	{
		$arrRet = array();
		$query = "SELECT * FROM marketing ".
				 "WHERE ( name = '".$name."') AND category IN ('ZM','RM','EA','AM','SRM')";
				 /*"OR rm_username = '".$name."' ".
				 "OR addtl_username='".$name."' ".
				 "OR mse_username='".$name."' ".
				 "OR ea_username = '".$name."' )";*/
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows() > 0)
			return true;
		else 
			return false;
	}
	function initAll()
	{
		$this->test_edition = "H";
		$this->school_code = "-1";
		$this->who_paid = "";
		$this->who_deposited = "";
		$this->payment_type = "-1";
		$this->amount = "";
		$this->when_paid = "0000-00-00";
		$this->paymentMode = "-1";
		$this->cheque_dd_no = "";
		$this->cheque_dd_date = "0000-00-00";
		$this->bank_name = "";
		$this->bank_branch_name = "";
		$this->bank_city_name = "";
		$this->action_on_dd = "Ei-Account";
		$this->ssf_sent = "SBR";
	}
	function getPaymentDetailsBySchoolCode($connid,$school_code,$test_edition)
	{
		$str="";
		$str=$this->SetAlreadyAddedPayments($connid);
		$balamount = "";
		$balamount = $this->getBalancePayment($connid);
		$query = "SELECT school_status.no_of_students,school_status.paid1,school_status.paid2,school_status.paid3,school_status.amount_payable ".
				 "FROM school_status WHERE school_status.school_code = $school_code ".
				 "AND school_status.test_edition = '".$test_edition."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();	
		//print_r($row);
			 $this->no_of_students = $row["no_of_students"];
			 $this->paid1 = $row["paid1"];
			 $this->paid2 = $row["paid2"];
			 $this->paid3 = $row["paid3"];	
			 $this->amount_payable = $row["amount_payable"];
		echo $this->no_of_students.",".$this->paid1.",".$this->paid2.",".$this->paid3.",".$this->amount_payable.",".$str.",".$balamount;		 
	}
	function sendMail($connid,$name,$school_code)
	{
		
		$arrEmail = $this->getAllManageremailsOfTerritory($connid,$school_code);
		if(is_array($arrEmail) && count($arrEmail) > 0)
		{
			$string = "jaspreet.chhabra@ei-india.com";
			foreach($arrEmail as $row)
			{
				//echo $row["email"];
				$string.= ",".$row["email"];
			}
		}
		if(!array_key_exists($name,$arrEmail))
		{
			$query = "SELECT name,email FROM marketing WHERE name = '".$name."'";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			$row2 = $dbquery->getrowarray();	
			$string.= ",".$row2["email"];
		}
		
		$arrString = explode(",",$string);
		if(is_array($arrString) && count($arrString) > 0)
		{
			if(!in_array("rashmi.dahiya@ei-india.com",$arrString))
				$string.= ",rashmi.dahiya@ei-india.com";
			if(!in_array("sudhir@ei-india.com",$arrString))
				$string.= ",sudhir@ei-india.com";
		}
		$Cc = "Cc: $string\r\n";
		//echo $Cc;
		$headers = "From: <system@ei-india.com>\r\n";
		$headers .= $Cc;
		$headers .= "Bcc: jaspreet.chhabra@ei-india.com\r\n";
		$headers .= "Reply-To: <jaspreet.chhabra@ei-india.com>\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$paymentType = "";
		$ss_sent_by = ""; 
		$test_edition = "";
		$schoolname = "";
		$schoolname = $this->getSchoolNameBySchoolCode($connid,$this->school_code);
		if($this->payment_type == "BP")
			$paymentType = "Balance Payment";
		elseif($this->payment_type == "FP")
			$paymentType = "Full Payment";
		elseif($this->payment_type == "AP")
			$paymentType = "Additional Payment for students added later";
			
		if($this->ssf_sent == "SBR")
			$ss_sent_by = "Sent By RM";
		elseif($this->ssf_sent == "SBS")
			$ss_sent_by = "Sent By School";
		elseif($this->ssf_sent == "NS")
			$ss_sent_by = "Not Sent";
			
		if($this->test_edition == 'H')
			$test_edition = "Summer 2009";
		elseif($this->test_edition == 'I')
			$test_edition = "Winter 2009";
		
		$message .= "<html>";
		$message .= " <style><!--BODY{ color:#000000;font-size:small;}input{ border:1px solid #CCBBAA;} ".
					" TEXTAREA{ border:1px solid #CCCCCC;} ".
					" TH{COLOR: #27408B; FONT-FAMILY: verdana, arial, helvetica; FONT-SIZE: 12px; FONT-WEIGHT: normal} ".
					" TD{COLOR: #27408B; FONT-FAMILY: verdana, arial, helvetica; FONT-SIZE: 11px; FONT-WEIGHT: normal} ".
					" A:hover {font-weight:bold; color: red;} ".
					".select{ border-style:ridge; border:0px;} ".
					".styleBorder{ border:1px solid #CCBBAA; } ".
					"--> ".
					"</style>";
		$message .= "<table><tr><td colspan =2><b>Educational Initiatives.<b></td></tr>";
		$message .= "<tr><td colspan=2></td></tr>";
		$message .= "<tr><td colspan=2>Dear Sir/Madam,</td></tr>";
		$message .= "<tr><td colspan=2></td></tr>";
		$message .= "<tr><td colspan=2>Following are the payment details entered by you</td></tr>";
		$message .= "<tr><td colspan=2></td></tr>";
		$message .= "<tr><td>Test edition :</td><td>$test_edition</td></tr>";
		$message .= "<tr><td>School Name/Code :</td><td>".$schoolname."/".$this->school_code."</td></tr>";
		$message .= "<tr><td>Who Paid :</td><td>$this->who_paid</td></tr>";
		$message .= "<tr><td>Who Deposited :</td><td>$this->who_deposited</td></tr>";
		$message .= "<tr><td>When Paid :</td><td>".$this->format_date($this->when_paid)."</td></tr>";
		$message .= "<tr><td>Type of Payment :</td><td>$paymentType</td></tr>";
		$message .= "<tr><td>Amount :</td><td>$this->amount</td></tr>";
		$message .= "<tr><td>Mode of Payment :</td><td>$this->paymentMode</td></tr>";
		if($this->paymentMode != "Cash")
		{
			$message .= "<tr><td>Cheque/DD No :</td><td>$this->cheque_dd_no</td></tr>";
			$message .= "<tr><td>Cheque/DD Date:</td><td>".$this->format_date($this->cheque_dd_date)."</td></tr>";
		}
		$message .= "<tr><td>SSF sent :</td><td>$ss_sent_by</td></tr>";
		$message .= "<tr><td>Action on DD</td><td>$this->action_on_dd</td></tr>";
		$message .= "<tr><td>Comments :</td><td>$this->comments</td></tr>";
		$message .= "<tr><td colspan=2></td></tr>";
		$message .= "<tr><td colspan=2>Regards,<br>".ucfirst($name)."</td></tr></table>";
		$message .= "</html>";
		$to = "ketan@ei-india.com";
		//echo $personal_email;
		//echo $message;
		if($to!="")
		{
			$subject = "Payment Details intimation";
			if(mail($to, $subject, $message, $headers)) echo "mail sent .........";
			else echo "Mail not sent........";
		}
		
	}
	function getSchoolNameBySchoolCode($connid,$school_code)
	{
		$query = "SELECT schoolname FROM schools ".
				 "WHERE schoolno = '".$school_code."' ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();	
		return $row["schoolname"];
	}
	function format_date($date1)
	{
		$date1 = substr($date1,8,2)."/".substr($date1,5,2)."/".substr($date1,0,4);
		return $date1;
	}
	function getAllManageremailsOfTerritory($connid,$school_code)
	{
		$arrRet = array();
		$query = "SELECT marketing.name,marketing.email FROM marketing ".
				 "LEFT JOIN school_status ON (school_status.zm = marketing.name OR school_status.rm_am = marketing.name OR school_status.ea = marketing.name) ".
				 /*"ON (marketing.name = territory_allotment.zm_username ".
				 "OR marketing.name = territory_allotment.rm_username ".
				 "OR marketing.name = territory_allotment.ea_username ".
				 "OR marketing.name = territory_allotment.addtl_username ".
				 "OR marketing.name = territory_allotment.mse_username ) ".
				 "LEFT JOIN schools ON territory_allotment.territory = schools.territory ".*/
				 "WHERE school_status.school_code = '".$school_code."' AND category IN ('ZM','RM','EA','SRM') ".
				 "AND marketing.email != '' ";
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["name"]] = array("name" => $row["name"],
											  "email" => $row["email"] 
											  );
		}		
		//print_r($arrRet);
		return $arrRet;
	}
	function getAlreadyAddedPaymentInfoBySchoolcodeAndRound($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM payment_info WHERE school_code = '".$this->school_code."' ".
				 "AND test_edition = '".$this->test_edition."' ";
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["payment_id"]] = array("payment_id" => $row["payment_id"],
											  "school_code" => $row["school_code"],
											   "test_edition" => $row["test_edition"],
											   "who_paid" => $row["who_paid"],
											   "who_deposited" => $row["who_deposited"],
											   "payment_type" => $row["payment_type"],
											   "amount" => $row["amount"],
											   "when_paid" => $row["when_paid"],
											   "mode_of_payment" => $row["mode_of_payment"],
											   "cheque_dd_no" => $row["cheque_dd_no"],
											   "cheque_dd_date" => $row["cheque_dd_date"],
											   "bank_name" => $row["bank_name"],
											   "branch_name" => $row["branch_name"],
											   "city" => $row["city"],
											   "ssf_sent" => $row["ssf_sent"],
											   "action_on_dd" => $row["action_on_dd"]
											  );
		}					
		return $arrRet;						  
	}
	function SetAlreadyAddedPayments($connid)
	{
		$str = "";
		$arrAlreadyAddedPayments = $this->getAlreadyAddedPaymentInfoBySchoolcodeAndRound($connid);
		$arrPaymentType = array("FP"=>"Full Payment","BP"=>"Balance Payment","AP"=>"Additonal Payment","PP"=>"Advance Payment");
		$arrSSF = array("SBR"=>"Sent By RM","SBS"=>"Sent By School","NS"=>"Not Sent");
		if(is_array($arrAlreadyAddedPayments) && count($arrAlreadyAddedPayments) > 0)
		{
			$str.="<table class=\"styleBorder1\" bgcolor=\"#F0F8FF\" border=\"0\" width=\"82%\" cellpadding=\"0\" cellspacing=\"0\">";
			$str.="<tr><td colspan=\"11\" class=\"styleBorder1\">";
			$str.="<b>Payments already added related to above mentioned round and school</b> ";
			$str.="</td></tr><tr><td class=\"styleBorder1\">Payment ID</td>";
			$str.="<td class=\"styleBorder1\">Payment Type</td>";
			$str.="<td class=\"styleBorder1\">Amount</td>";
			$str.="<td class=\"styleBorder1\">When Paid</td>";
			$str.="<td class=\"styleBorder1\">How Paid</td>";
			$str.="<td class=\"styleBorder1\">Cheque/DD No.</td>";
			$str.="<td class=\"styleBorder1\">Cheque/DD Date.</td>";
			$str.="<td class=\"styleBorder1\">Bank/<br>Branch/<br>City";
			$str.="</td><td class=\"styleBorder1\">Action On DD</td>";
			$str.="<td class=\"styleBorder1\">SSF sent";
			$str.="</td></tr>";
			foreach($arrAlreadyAddedPayments as $row)
			{
				$str .="<tr>";
				$str .="<td class=\"styleBorder1\"><center><a href=\"javascript:EditPaymentDetails('".$row["payment_id"]."');\">".$row["payment_id"]."</a></center></td>";
				$str .="<td class=\"styleBorder1\">".$arrPaymentType[$row["payment_type"]]."</td>";
				$str .="<td class=\"styleBorder1\">".$row["amount"]."</td>";
				$str .="<td class=\"styleBorder1\">".$this->format_date($row["when_paid"])."</td>";
				$str .="<td class=\"styleBorder1\">".$row["mode_of_payment"]."</td>";
				$str .="<td class=\"styleBorder1\">".$row["cheque_dd_no"]."</td>";
				$str .="<td class=\"styleBorder1\">".$this->format_date($row["cheque_dd_date"])."</td>";
				$str .="<td class=\"styleBorder1\">".$row["bank_name"]."<br>".$row["branch_name"]."<br>".$row["city"]."</td>";
				$str .="<td class=\"styleBorder1\">".$row["action_on_dd"]."</td>";
				$str .="<td class=\"styleBorder1\">".$arrSSF[$row["ssf_sent"]]."</td>";
				$str .="</tr>";
			}
			$str .="</table>";
		}
		
		return $str;
	}
	function CheckChequeOrDDduplication($connid,$cheque_dd_no,$bank_name,$bank_city)
	{
		$query = "SELECT * FROM payment_info WHERE cheque_dd_no = '".$cheque_dd_no."' AND bank_name = '".$bank_name."' AND city = '".$bank_city."' ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows() > 0)
			return true;
		else 
			return false;
	}
	function getBankNameList($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM banknamelist ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["bankname"]] = array("bankname" => $row["bankname"]);
		}
		return $arrRet;
	}
	function getSchoolsUpdatedInSchoolStatus($connid)
	{
		$arrRet = array();
		$query = "SELECT sum(payment_info.amount) as sumamount,payment_info.school_code,paid1+paid2+paid3 as sumpaid123 FROM payment_info ".
				 "LEFT JOIN school_status ON school_status.school_code = payment_info.school_code ".
				 "AND school_status.test_edition = payment_info.test_edition ".
				 "GROUP BY payment_info.school_code,payment_info.test_edition ".
				 "HAVING sum(payment_info.amount) = sumpaid123 ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["school_code"]] = array("school_code" => $row["school_code"]);
		}
		return $arrRet;
	}
	function getBalancePayment($connid)
	{
		
		$balanceamount = "";
		if($this->amount == "")
			$this->amount = 0;
		$query = "SELECT sum(payment_info.amount)+$this->amount as sumamount, ".
				 "payment_info.school_code,payment_info.test_edition ".
				 "FROM payment_info ".
				 "GROUP BY payment_info.school_code,payment_info.test_edition ".
				 "HAVING  payment_info.school_code = '".$this->school_code."' ".
				 "AND payment_info.test_edition = '".$this->test_edition."' ";
		//echo $query;		 
		//exit;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		$querySS = "SELECT paid1+paid2+paid3 as sumpaid123 ".
				 "FROM school_status ".
				 "WHERE school_code = '".$this->school_code."' ".
				 "AND 	test_edition = '".$this->test_edition."' ";
		//echo $query;		 
		//exit;
		$dbquerySS = new dbquery($querySS,$connid);
		$rowSS = $dbquerySS->getrowarray();
		if($row["sumamount"] != "")
			$balanceamount = $rowSS["sumpaid123"] - $row["sumamount"];
		else
			$balanceamount = $rowSS["sumpaid123"] - $this->amount;
		//echo $row["sumamount"];
		return $balanceamount;
	}
}
?>