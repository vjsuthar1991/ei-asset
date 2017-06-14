<?php
class clstelcallerattendance
{
	var $userID;
	var $name;
	
	function clstelcallerattendance()
	{
		$this->userID;
		$this->name;
	}
	
	function getMonthlyAttendance($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM contract_master ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			for($i = 1;$i <= date('j');$i++)
			{
				$query1 = "SELECT 1 FROM dailyLogin WHERE userID = '".$row['userID']."' AND date='".date('Y-m-').$i."' ";
				$dbquery1 = new dbquery($query1,$connid);
				$row1 = $dbquery1->getrowarray();
				$arrRet[$row['userID']][$i] = array("present"=>$row1[0]);
			}
		}
	}
	function getContractPayments($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM contract_master ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$query1 = "SELECT count(*) FROM dailyLogin WHERE userID = '".$row["userID"]."' AND month(date) = '".date('m')."' ";
			$dbquery1 = new dbquery($query1,$connid);
			$row1 = $dbquery1->getrowarray();
			$arrRet[$row["userID"]] = $row1["count(*)"];
		}
		return $arrRet;
	}
}
?>