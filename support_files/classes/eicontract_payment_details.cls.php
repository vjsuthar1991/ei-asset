<?php
class clscontractpaymentdetails
{
	var $adjustment_id;
	var $userID;
	var $operationType;
	var $month;
	var $year;
	var $amount;
	var $remarks;
	var $considerInGross;
	var $action;
	var $basic;
	var $takehome;
	var $comments;
	
	function clscontractpaymentdetails()
	{
		$this->adjustment_id = 0;
		$this->userID = "";
		$this->operationType = "";
		$this->month = "";
		$this->year = "";
		$this->amount = "";
		$this->remarks = "";
		$this->considerInGross = "";
		$this->action = "";
		$this->comments = "";
	}
	function setpostvars()
	{
		if(isset($_POST['clscontractpaymentdetails_operationType'])) $this->operationType=$_POST['clscontractpaymentdetails_operationType'];
		if(isset($_POST['clscontractpaymentdetails_month'])) $this->month=trim($_POST['clscontractpaymentdetails_month']);
		if(isset($_POST['clscontractpaymentdetails_userid'])) $this->userID=$_POST['clscontractpaymentdetails_userid'];
		if(isset($_POST['clscontractpaymentdetails_year'])) $this->year=trim($_POST['clscontractpaymentdetails_year']);
		if(isset($_POST['clscontractpaymentdetails_amount'])) $this->amount=$_POST['clscontractpaymentdetails_amount'];
		if(isset($_POST['clscontractpaymentdetails_remarks'])) $this->remarks=$_POST['clscontractpaymentdetails_remarks'];
		if(isset($_POST['clscontractpaymentdetails_basic'])) $this->basic=$_POST['clscontractpaymentdetails_basic'];
		if(isset($_POST['clscontractpaymentdetails_takehome'])) $this->takehome=$_POST['clscontractpaymentdetails_takehome'];
		if(isset($_POST['clscontractpaymentdetails_consideringross'])) $this->considerInGross=$_POST['clscontractpaymentdetails_consideringross'];
		if(isset($_POST['clscontractpaymentdetails_hdnaction'])) $this->action=$_POST['clscontractpaymentdetails_hdnaction'];
		if(isset($_POST['clscontractpaymentdetails_comments'])) $this->comments=$_POST['clscontractpaymentdetails_comments'];
		
	}
	function saveAdjustment($connid)
	{
		if(is_array($this->userID) && count($this->userID) >0)
		{
			for($i=0;$i<count($this->userID);$i++)
			{
				if($this->userID[$i] != "")
				{
					$query = "INSERT INTO contract_salaryAdjustments SET month = '".$this->month."',year = '".$this->year."',userID = '".$this->userID[$i]."',amount= '".$this->amount[$i]."',operationType = '".$this->operationType[$i]."',remarks='".$this->remarks[$i]."'";
					$dbquery = new dbquery($query,$connid);	
				}
						
			}
		}
	}
	function pageAdjustments($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			$this->saveAdjustment($connid);
		}
		elseif($this->action == "DeleteData")
		{
			$this->deleteAdjustments($connid);
		}
		elseif($this->action == "ConsiderInGross")
		{
			$this->considerInGross($connid);
		}
	}
	function pageAddSalaryDetails($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			$this->savePaymentHistory($connid);
		}
	}
	function getContractPeopleDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM contract_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["userID"]] = array("userID"=>$row["userID"],
											"firstName"=>$row["firstName"],
											"lastName"=>$row["lastName"]
											
			);
		}
		return $arrRet;
	}
	function retrieveAdjustmentDetails($connid)
	{
		$arrRet = array();
		$this->setpostvars();
		$query = "SELECT a.*,firstName,lastName FROM contract_salaryAdjustments a,contract_master b WHERE a.userID = b.userID AND month = '".$this->month."' AND year = '".$this->year."' ";
		$query.=" UNION SELECT c.*,firstName,lastName FROM contract_salaryAdjustments c,old_contract_master d WHERE c.userID = d.userID AND month = '".$this->month."' AND year = '".$this->year."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["adjustment_id"]] = array("userID"=>$row["userID"],
													"firstName"=>$row["firstName"],
													"lastName"=>$row["lastName"],
													"amount"=>$row["amount"],
													"operationType"=>$row["operationType"],
													"remarks"=>$row["remarks"],
													"adjustment_id"=>$row["adjustment_id"],
													"considerInGross"=>$row["considerInGross"]
			);
		}
		return $arrRet;
	}
	function deleteAdjustments($connid)
	{
		if(is_array($this->considerInGross) && count($this->considerInGross) >0)
		{
			for($i=0;$i<count($this->considerInGross);$i++)
			{
				$query = "DELETE FROM contract_salaryAdjustments WHERE adjustment_id = '".$this->considerInGross[$i]."' LIMIT 1";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function considerInGross($connid)
	{
		if(is_array($this->considerInGross) && count($this->considerInGross) >0)
		{
			for($i=0;$i<count($this->considerInGross);$i++)
			{
				$query = "UPDATE contract_salaryAdjustments SET considerInGross = '1' WHERE adjustment_id = '".$this->considerInGross[$i]."' AND considerInGross = '0' ";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function savePaymentHistory($connid)
	{
		if(is_array($this->userID) && count($this->userID) > 0)
		{
			for($i=0;$i<count($this->userID);$i++)
			{
				$query = "INSERT INTO contract_paymentHistory SET userID = '".$this->userID[$i]."',month='".$this->month."',year = '".$this->year."',takehome = '".$this->takehome[$i]."',basic = '".$this->basic[$i]."'";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function retrievePaymentHistory($connid,$month,$year)
	{
		if($month == 0)
		{
			$month = 12;	
			$year = $year - 1;
		}
		$arrRet = array();
		$query = "SELECT * FROM contract_paymentHistory WHERE month = '".$month."' AND year = '".$year."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["userID"]] = array("userID"=>$row["userID"],
											"takehome"=>$row["takehome"],
											"basic"=>$row["basic"],
											"comments"=>$row["comments"]
			);
		}
		return $arrRet;
	}
}
?>