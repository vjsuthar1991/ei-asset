<?php
class clsreceiptdetails
{
	var $receiptid;
	var $username;
	var $paymentmode;
	var $amount;
	var $date;
	var $chequeno;
	var $bankname;
	var $entered_by;
	var $entered_date;
	var $modified_by;
	var $modified_date;
	var $transaction_no;
	var $system_id;
	var $remarks;
	var $action;
	function clsreceiptdetails()
	{
		$this->receiptid = 0;
		$this->username = "";
		$this->paymentmode = "";
		$this->amount = "";
		$this->date = "";
		$this->chequeno = "";
		$this->bankname = "";
		$this->entered_by = "";
		$this->entered_date = "";
		$this->modified_by = "";
		$this->modified_date = "";
		$this->transaction_no = "";
		$this->system_id = "";
		$this->remarks = "";
		$this->action = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsreceiptdetails_hdnreceiptid"])) $this->receiptid =  $_POST["clsreceiptdetails_hdnreceiptid"];
		if(isset($_POST["clsreceiptdetails_username"])) $this->username =  $_POST["clsreceiptdetails_username"];
		if(isset($_POST["clsreceiptdetails_paymentmode"])) $this->paymentmode =  $_POST["clsreceiptdetails_paymentmode"];
		if(isset($_POST["clsreceiptdetails_amount"])) $this->amount =  $_POST["clsreceiptdetails_amount"];
		if(isset($_POST["clsreceiptdetails_date"])) $this->date =  $_POST["clsreceiptdetails_date"];
		if(isset($_POST["clsreceiptdetails_chequeno"])) $this->chequeno =  $_POST["clsreceiptdetails_chequeno"];
		if(isset($_POST["clsreceiptdetails_bankname"])) $this->bankname =  $_POST["clsreceiptdetails_bankname"];
		if(isset($_POST["clsreceiptdetails_hdnaction"])) $this->action =  $_POST["clsreceiptdetails_hdnaction"];
		if(isset($_POST["clsreceiptdetails_trans_no"])) $this->transaction_no =  $_POST["clsreceiptdetails_trans_no"];
		if(isset($_POST["clsreceiptdetails_bill_no"]) && $_POST["clsreceiptdetails_paymentmode"] =='bill') $this->system_id =  $_POST["clsreceiptdetails_bill_no"];
		if(isset($_POST["clsreceiptdetails_tour_no"]) && $_POST["clsreceiptdetails_paymentmode"] =='tour') $this->system_id =  $_POST["clsreceiptdetails_tour_no"];
		if(isset($_POST["clsreceiptdetails_local_no"]) && $_POST["clsreceiptdetails_paymentmode"] =='local') $this->system_id =  $_POST["clsreceiptdetails_local_no"];
		if(isset($_POST["clsreceiptdetails_salary"])) $this->remarks =  $_POST["clsreceiptdetails_salary"];
		//print_r($_POST);
	}
	function setgetvars()
	{
		if(isset($_GET["receiptid"])) $this->receiptid =  $_GET["receiptid"];
	}
	function pageAddEditDetails($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			$this->savedata($connid);
		}
		if($this->action == "SearchData")
		{
			$this->getAllReceiptEntries($connid);	
		}
		
	}
	function savedata($connid)
	{
		$arrdateval = explode('-',$this->date);
		$dateval = $arrdateval[2]."-".$arrdateval[1]."-".$arrdateval[0];
		$count = $this->checkDuplication($connid);
		if($this->receiptid == 0 && $count == 0)
		{
			$query = "INSERT INTO receipt_master SET 
				username = '".$this->username."',
				paymentmode = '".$this->paymentmode."',
				amount = '".$this->amount."',
				receipt_date = '".$dateval."',
				cheque_no = '".$this->chequeno."',
				bankname = '".$this->bankname."',
				transaction_no = '".$this->transaction_no."',
				system_id = '".$this->system_id."',
				remarks = '".$this->remarks."',
				entered_by = '".$_SESSION["username"]."',
				entered_date = NOW()";
			$dbquery = new dbquery($query,$connid);	
		}
		elseif($this->receiptid > 0)
		{
			if($this->paymentmode =='bill' || $this->paymentmode =='local' || $this->paymentmode =='tour' ){
				$this->chequeno = '';
				$this->bankname = '';
				$this->transaction_no = '';
				$this->remarks = '';
			}
			if($this->paymentmode =='cheque'){
				$this->transaction_no = '';
				$this->remarks = '';
				$this->system_id = '';
			}
			if($this->paymentmode =='online'){
				$this->chequeno = '';
				$this->bankname = '';
				$this->remarks = '';
				$this->system_id = '';
			}
			if($this->paymentmode =='cash'){
				$this->chequeno = '';
				$this->bankname = '';
				$this->remarks = '';
				$this->system_id = '';
				$this->transaction_no = '';
			}
			$query = "UPDATE receipt_master SET 
				username = '".$this->username."',
				paymentmode = '".$this->paymentmode."',
				amount = '".$this->amount."',
				receipt_date = '".$dateval."',
				cheque_no = '".$this->chequeno."',
				bankname = '".$this->bankname."',
				transaction_no = '".$this->transaction_no."',
				system_id = '".$this->system_id."',
				remarks = '".$this->remarks."',
				modified_by = '".$_SESSION["username"]."',
				modified_date = NOW() WHERE receiptid = '".$this->receiptid."'";
			$dbquery = new dbquery($query,$connid);	
		}	
	}
	function retrieveDetails($connid)
	{
		$this->setgetvars();
		if($this->receiptid > 0)
		{
			$query = "SELECT *,DATE_FORMAT(receipt_date,'%d-%m-%Y') as receipt_date FROM receipt_master WHERE receiptid = '".$this->receiptid."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$arrdateval = explode('-',$row["receipt_date"]);
			$dateval = $arrdateval[2]."-".$arrdateval[1]."-".$arrdateval[0];
			$this->username = $row["username"];
			$this->paymentmode = $row["paymentmode"];
			$this->amount = $row["amount"];
			$this->date = $row["receipt_date"];
			$this->chequeno = $row["cheque_no"];
			$this->bankname = $row["bankname"];
			$this->transaction_no =  $row["transaction_no"];
			$this->system_id = $row["system_id"];
			$this->remarks =  $row["remarks"];	
		}
	}
	function checkDuplication($connid)
	{
		$query = "SELECT COUNT(*) FROM receipt_master WHERE username = '".$this->username."' AND paymentmode = '".$this->paymentmode."' AND amount = '".$this->amount."' AND cheque_no = '".$this->chequeno."' AND bankname = '".$this->bankname."' AND receipt_date = '".$this->date."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getAllReceiptEntries($connid)
	{
		$arrRet = array();
		$query = "SELECT *,DATE_FORMAT(receipt_date,'%d-%m-%Y') as receiptdate FROM receipt_master WHERE 1 = 1 order by receipt_date desc";	
		/*if($this->amount != "")
			$query.=" AND amount LIKE '%".$this->amount."%' ";
		if($this->date != "")
			$query.=" AND date = '".$this->date."' ";
		if($this->paymentmode)
			$query.=" AND paymentmode = '".$this->paymentmode."' ";
		if($this->chequeno != "")			
			$query.=" AND cheque_no = '".$this->chequeno."' ";
		if($this->bankname != "")
			$query.=" AND bankname LIKE '%".$this->bankname."%' ";
		if($this->username != "")	
			$query.=" AND username LIKE '%".$this->username."%' ";*/
		//echo $query;	
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = array("receiptid"=>$row["receiptid"],
											"username"=>$row["username"],
											"paymentmode"=>$row["paymentmode"],
											"amount"=>$row["amount"],
											"receipt_date"=>$row["receiptdate"],
											"cheque_no"=>$row["cheque_no"],
											"bankname"=>$row["bankname"],
											"transaction_no"=>$row["transaction_no"],
											"system_id"=>$row["system_id"],
											"remarks"=>$row["remarks"]
				);
		}
		return $arrRet;
	}
}
?>