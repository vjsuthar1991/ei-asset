<?php
class clsoffice
{
	var $id;
	var $bill_office_number;
	var $location;
	var $entered_dt;
	var $entered_by;
	var $modified_by;
	var $modified_dt;
	
	function clsoffice()
	{
		$this->id = 0;
		$this->bill_office_number = "";
		$this->location = "";
		$this->entered_dt = "0000-00-00 00:00:00";
		$this->entered_by = "";
		$this->modified_dt = "0000-00-00 00:00:00";
		$this->modified_by = "";
	}
	
	function getOfficeLocations($connid)
	{
		$arrRet = array();
		$query = "SELECT id,location FROM office_master GROUP BY location ORDER BY location";
		 //echo $query;
        $dbquery = new dbquery($query,$connid);
        while($row = $dbquery->getrowarray())
        {
			$arrRet[$row["id"]] = array("id"=>$row["id"],
									"location"=>$row["location"]);
		}
		return $arrRet;
	}
	
	function getBillOfficeNumber($connid)
	{
		$arrRet = array();
		$query = "SELECT id,bill_office_number,location FROM office_master ORDER BY id";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["id"]] = array("id"=>$row["id"],
									"bill_office_number"=>$row["bill_office_number"],
									"location"=>$row["location"]);
		}
		return $arrRet;
	}
}
?>