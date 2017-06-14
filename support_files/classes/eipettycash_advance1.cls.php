<?php
class clspettycashadvance
{
	var $id;
	var $office_id;
	var $office_name;
	var $total_amount;
	var $remarks;
	var $status;
	var $approved_amount;
	var $amount;
	var $advance_date;
	var $advance_purpose;
	var $expense_type;
	var $entered_by;
	var $entered_dt = "0000-00-00 00:00:00";
	var $modified_by;
	var $modified_dt;
	var $action; 
	var $approve_advance;
	var $advance_id;
	function  clspettycashadvance()
	{
		$this->id = 0;
		$this->office_id = 0;
		$this->office_name = "";
		$this->total_amount = "";
		$this->remarks = "";
		$this->status = "pending";
		$this->approved_amount = 0;
		$this->advance_purpose = "";
		$this->amount = 0;
		$this->advance_date = "0000-00-00";
		$this->entered_by = "";
		$this->entered_dt = "0000-00-00 00:00:00";
		$this->modified_by = "";
		$this->modified_dt = "0000-00-00 00:00:00";
		$this->action = "";
		$this->approve_advance = "";
		$this->advance_id = "";
	}
	
	function setpostvars()
	{
		if(isset($_POST["clspettycashadvance_hdnaction"])) $this->action = $_POST["clspettycashadvance_hdnaction"];
		if(isset($_POST["clspettycashadvance_office"])) $this->office_id = $_POST["clspettycashadvance_office"];
		if(isset($_POST["clspettycashadvance_searchstatus"])) $this->status = $_POST["clspettycashadvance_searchstatus"];
		if(isset($_POST["clspettycashadvance_date"])) $this->advance_date = $_POST["clspettycashadvance_date"];
		if(isset($_POST["clspettycashadvance_advancepurpose"])) $this->advance_purpose = $_POST["clspettycashadvance_advancepurpose"];
		if(isset($_POST["clspettycashadvance_totalamount"])) $this->total_amount = $_POST["clspettycashadvance_totalamount"];
		if(isset($_POST["clspettycashadvance_remarks"])) $this->remarks = $_POST["clspettycashadvance_remarks"];
		if(isset($_POST["clspettycashadvance_expensetype"])) $this->expense_type = $_POST["clspettycashadvance_expensetype"];
		if(isset($_POST["clspettycashadvance_purpose"])) $this->purpose = $_POST["clspettycashadvance_purpose"];
		if(isset($_POST["clspettycashadvance_amount"])) $this->amount = $_POST["clspettycashadvance_amount"];
		if(isset($_POST["clspettycashadvance_approvedamount"])) $this->approved_amount = $_POST["clspettycashadvance_approvedamount"];
		if(isset($_POST["clspettycashadvance_approve"])) $this->approve_advance = $_POST["clspettycashadvance_approve"];
		if(isset($_POST["clspettycashadvance_hdnadvanceid"])) $this->id = $_POST["clspettycashadvance_hdnadvanceid"];
	}
	function setgetvars()
	{
		if(isset($_GET["advance_id"])) $this->advance_id = $_GET["advance_id"];
	}
	function pageAddcashRequest($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
			{
				$this->savedata($connid);
			}
		}
		if($this->action == "Approve")
		{
			$this->approveAdvances($connid);
		}
		if($this->action == "UpdateData")
		{
			$this->updateData($connid);
		}
	}
	function savedata($connid)
	{
		$advance_dt = "";
		$advance_date = "";
		if($this->advance_date != "" || $this->advance_date == "0000-00-00")
		{
			$advance_date = explode('-',$this->advance_date);
			$advance_dt = $advance_date[2]."-".$advance_date[1]."-".$advance_date[0];
		}
			
		$query = "INSERT INTO petty_cash_advance(office_id,date,amount,purpose,entered_dt,entered_by) 
				VALUES ('".$this->office_id."','".$advance_dt."','".$this->total_amount."','".$this->advance_purpose."',NOW(),'".$_SESSION["username"]."') ";
		$dbquery = new dbquery($query,$connid);
		$advanceid = $dbquery->insertid;
		$this->saveRoughCalculation($connid,$advanceid);
	}
	function updateData($connid)
	{
		if($this->id != 0)
		{
			$query = "UPDATE petty_cash_advance SET approved_amount = '".$this->total_amount."' WHERE id = '".$this->id."' LIMIT 1";
			$dbquery = new dbquery($query,$connid);
		}
	}
	function saveRoughCalculation($connid,$advanceid)
	{
		//print_r($this->expense_type);
		if(is_array($this->expense_type) && count($this->expense_type) > 0)
		{
			for($i=0;$i<count($this->expense_type);$i++)
			{
				if($this->expense_type[$i] != "")
				{
					$query = "INSERT INTO petty_cash_advance_items(expense_type,purpose,amount,entered_dt,entered_by,advance_id) 
					VALUES('".$this->expense_type[$i]."','".$this->purpose[$i]."','".$this->amount[$i]."',NOW(),'".$_SESSION["username"]."','".$advanceid."')";
					$dbquery = new dbquery($query,$connid);
				}
			}	
		}	
	}
	function validation($connid)
	{
		if($this->office_id == "")
			$this->error["office"] = "Please select the office";
		if($this->advance_date == "0000-00-00" || $this->advance_date == "")
			$this->error["date"] = "Please enter the date";
		if($this->total_amount == "" || $this->total_amount == 0)
			$this->error["totalamount"] = "Please enter the total amount";
		if($this->advance_purpose == "")
			$this->error["advancepurpose"] = "Please enter the purpose for taking advance";
			
		if(is_array($this->error) && count($this->error) >0)
			return false;
		else 
			return true;
	}
	function getAllPettyCashAdvances($connid,$user="")
	{
		$arrRet = array();
		$this->setpostvars();
		
		$Admin = $this->getAdminAuthority($connid);

		$conditionAdmin = "";
		$condtitionAcc = "";
		
		$arrCheck = array($Admin,'ketan','sheel.shastri','rupande.shah');
		
		if(!in_array($_SESSION["username"],$arrCheck))
			$conditionDefault = " AND petty_cash_advance.entered_by = '".$_SESSION["username"]."' ";
		
		/*if($_SESSION["username"] == $arrAdmin[0])
			$conditionAdmin = " AND approved1_by = '' AND status = 'pending' ";
		else if($_SESSION["username"] == $arrAdmin[1])
			$conditionAdmin = " AND approved1_by <> '' AND status = 'approved1' ";*/
			
		//if($_SESSION["username"] == 'ketan' || $_SESSION["username"] == 'sheel.shastri' || $_SESSION["username"] == 'rupande.shah')	
			$condtitionAcc = " AND status = '".$this->status."' ";
			
		$LeftJoin = " LEFT JOIN marketing ON marketing.name = petty_cash_advance.entered_by ";
		$LeftJoin.= " LEFT JOIN office_master ON office_master.id = petty_cash_advance.id ";
		//$LeftJoin .= "LEFT JOIN petty_cash_advance_items ON petty_cash_advance.id = petty_cash_advance_items.id WHERE petty_cash_advance_items.id IS NOT NULL ";
		
		if($user != "")
			$query = "SELECT petty_cash_advance.*,bill_office_number,DATE_FORMAT(date,'%d-%m-%Y') as advance_date, 
					 DATE_FORMAT(petty_cash_advance.entered_dt,'%d-%m-%Y') as entered_date,fullname 
					 FROM petty_cash_advance ".$LeftJoin."  WHERE 1 = 1 ".$conditionAdmin." ".$condtitionAcc." ".$conditionDefault." AND applied_by= '".$user."' ";
		else 
			$query = "SELECT petty_cash_advance.*,bill_office_number,DATE_FORMAT(date,'%d-%m-%Y') as advance_date, 
					 DATE_FORMAT(petty_cash_advance.entered_dt,'%d-%m-%Y') as entered_date,fullname FROM petty_cash_advance ".$LeftJoin." WHERE 1 = 1 ".$conditionAdmin." ".$condtitionAcc." ".$conditionDefault;
			
		$dbquery = new dbquery($query,$connid);
		
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["id"]] = array("id"=>$row["id"],
										"bill_office_number"=>$row["bill_office_number"],
										"advance_date"=>$row["advance_date"],
										"amount"=>$row["amount"],
										"purpose"=>$row["purpose"],
										"status"=>$row["status"],
										"approved_amount"=>$row["approved_amount"],
										"approved_by"=>$row["approved_by"],
										"approved_dt"=>$row["approved_dt"],
										"entered_date"=>$row["entered_date"],
										"fullname"=>$row["fullname"]
										);
		}
		return $arrRet;	
	}
	function approveAdvances($connid)
	{
		if(is_array($this->approve_advance) && count($this->approve_advance) > 0)
		{
			foreach($this->approve_advance as $advanceid)
			{
				$query = "UPDATE petty_cash_advance SET status='approved',approved_by='".$_SESSION["username"]."' WHERE id = '".$advanceid."'";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function getAllDetailsOfAdvanceById($connid)
	{
		$this->setgetvars();
		$query = "SELECT petty_cash_advance.*,DATE_FORMAT(date,'%d-%m-%Y') as advance_date,bill_office_number FROM petty_cash_advance,office_master WHERE petty_cash_advance.id = office_master.id AND petty_cash_advance.id = '".$this->advance_id."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->office_name = $row["bill_office_number"];
		$this->advance_date = $row["advance_date"];
		$this->advance_purpose = $row["purpose"];
		if($row["approved_amount"] != '0.00')
			$this->total_amount = $row["approved_amount"];
		else 
			$this->total_amount = $row["amount"];
	}
	function getAllAdvanceItems($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM petty_cash_advance_items WHERE advance_id = '".$this->advance_id."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["id"]] = array("expense_type"=>$row["expense_type"],
										"purpose"=>$row["purpose"],
										"amount"=>$row["amount"]
										); 
		}	
		return $arrRet;
	}
	function getAdminAuthority($connid)
	{
		$str = "";
		$query = "SELECT authority1 FROM project_master WHERE projectno = '10' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["authority1"];
	}
}
?>