<?php
class clsparty
{
	var $id;
	var $name;
	var $pan;
	var $address;
	var $address2;
	var $address3;
	var $address4;
	var $stdcode;
	var $phoneno;
	var $mobileno;
	var $service_tax_no;
	var $action;
	var $partyid;
	var $nameAsPerBank;
	var $bankName;
	var $branchName;
	var $branchAddress;
	var $accountType;
	var $bankAcNo;
	var $ifscCode;
	var $micrCode;
	var $city;
	var $pincode;
	var $state;
	function clsparty()
	{
		$this->id = 0;
		$this->name = "";
		$this->pan = "";
		$this->address = "";
		$this->stdcode = "";
		$this->phoneno = "";
		$this->mobileno = "";
		$this->service_tax_no = "";
		$this->action = "";
		$this->partyid = "";
		$this->nameAsPerBank = "";
		$this->bankNo = "";
		$this->branchName = "";
		$this->branchAddress = "";
		$this->accountType = "";
		$this->bankAcNo = "";
		$this->ifscCode = "";
		$this->micrCode = "";
		$this->city = "";
		$this->pincode = "";
		$this->state = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsparty_name"])) $this->name = $_POST["clsparty_name"];
		if(isset($_POST["clsparty_pan"])) $this->pan = $_POST["clsparty_pan"];
		if(isset($_POST["clsparty_address"])) $this->address = $_POST["clsparty_address"];
		if(isset($_POST["clsparty_address2"])) $this->address2 = $_POST["clsparty_address2"];
		if(isset($_POST["clsparty_address3"])) $this->address3 = $_POST["clsparty_address3"];
		if(isset($_POST["clsparty_address4"])) $this->address4 = $_POST["clsparty_address4"];
		if(isset($_POST["clsparty_stdcode"])) $this->stdcode = $_POST["clsparty_stdcode"];
		if(isset($_POST["clsparty_phone"])) $this->phoneno = $_POST["clsparty_phone"];
		if(isset($_POST["clsparty_mobile"])) $this->mobileno = $_POST["clsparty_mobile"];
		if(isset($_POST["clsparty_servicetaxno"])) $this->service_tax_no = $_POST["clsparty_servicetaxno"];
		if(isset($_POST["clsparty_hdnaction"])) $this->action = $_POST["clsparty_hdnaction"];
		if(isset($_POST["clsparty_bankNo"])) $this->bankNo = $_POST["clsparty_bankNo"];
		if(isset($_POST["clsparty_branchName"])) $this->branchName = $_POST["clsparty_branchName"];
		if(isset($_POST["clsparty_branchAddress"])) $this->branchAddress = $_POST["clsparty_branchAddress"];
		if(isset($_POST["clsparty_nameAsPerBank"])) $this->nameAsPerBank = $_POST["clsparty_nameAsPerBank"];
		if(isset($_POST["clsparty_bankAcNo"])) $this->bankAcNo = $_POST["clsparty_bankAcNo"];
		if(isset($_POST["clsparty_accountType"])) $this->accountType = $_POST["clsparty_accountType"];
		if(isset($_POST["clsparty_ifscCode"])) $this->ifscCode = $_POST["clsparty_ifscCode"];
		if(isset($_POST["clsparty_micrCode"])) $this->micrCode = $_POST["clsparty_micrCode"];
		if(isset($_POST["clsparty_city"])) $this->city = $_POST["clsparty_city"];
		if(isset($_POST["clsparty_pincode"])) $this->pincode = $_POST["clsparty_pincode"];
		if(isset($_POST["clsparty_state"])) $this->state = $_POST["clsparty_state"];
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
	}
	function setgetvars()
	{
		if(isset($_GET["partyid"])) $this->partyid = $_GET["partyid"];
	}
	function getParties($connid)
	{
		$arrRet = array();
		$query = "SELECT * from bill_partyMaster";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["partyid"]] = array("parytid"=>$row["partyid"],
											 "partyname"=>$row["partyname"],
											 "PAN"=>$row["PAN"]	
											);
		}
		return $arrRet;
	}
	function pageEditPartDetails($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
			{
				$this->addParty($connid);
			}
		}
		if($this->action == "UpdateData")
		{
			if($this->validation($connid))
			{
				$this->updateParty($connid);
			}
		}
	}
	function validation($connid)
	{
		if($this->name == "")
			$this->error["name"] = "Please enter the partyname";
		/*if($this->pan == "")
			$this->error["pan"] = "Please enter the pan";*/
			
		if(is_array($this->error) && count($this->error) >0)
			return false;
		else 
			return true;
	}
	function updateParty($connid)
	{
		$checkParty = $this->checkPartyNameUpdation($connid, $this->partyid, $this->name, $this->pan, $this->city);
		if($checkParty == FALSE)
		{
			$query = "UPDATE bill_partyMaster SET ".
					 "partyname = '".$this->name."',".
					 "pan = '".$this->pan."',".
					 "address = '".$this->address."',".
					 "address2 = '".$this->address2."',".
					 "address3 = '".$this->address3."',".
		         	 "address4 = '".$this->address4."',".
		         	 "nameAsPerBank = '".$this->nameAsPerBank."',".
				     "bankAccntNo = '".$this->bankAcNo."',".
				     "branchName = '".$this->branchName."',".
				     "branchAddress = '".$this->branchAddress."',".
				     "accountType = '".$this->accountType."',".
				     "ifscCode = '".$this->ifscCode."',".
				     "micrCode = '".$this->micrCode."',".
				     "city = '".$this->city."',".
					 "pincode = '".$this->pincode."',".
					 "bankno = '".$this->bankNo."',".
					 "stdcode = '".$this->stdcode."',".
					 "phone = '".$this->phoneno."',".
					 "mobileno = '".$this->mobileno."',".
					 "service_tax_no = '".$this->service_tax_no."' ".
					 "WHERE partyid = '".$this->partyid."'";
			//var_dump($query);exit;
			$dbquery = new dbquery($query,$connid);
			echo "<script language=javascript>window.location.href = 'partyMaster.php';window.close();</script>";
		}
		else
		{
			echo "<pre align='center'>Party already exists.</pre>";
		}
	}
	function addParty($connid)
	{
		$checkParty = $this->checkPartyExists($connid, $this->name, $this->pan, $this->city);
		if($checkParty == FALSE)
		{
			$query = "INSERT INTO bill_partyMaster SET ".
					 "partyname = '".$this->name."',".
					 "pan = '".$this->pan."',".
					 "address = '".$this->address."',".
					 "address2 = '".$this->address2."',".
					 "address3 = '".$this->address3."',".
		         	 "address4 = '".$this->address4."',".
		         	 "nameAsPerBank = '".$this->nameAsPerBank."',".
				     "bankAccntNo = '".$this->bankAcNo."',".
				     "branchName = '".$this->branchName."',".
				     "branchAddress = '".$this->branchAddress."',".
				     "accountType = '".$this->accountType."',".
				     "ifscCode = '".$this->ifscCode."',".
				     "micrCode = '".$this->micrCode."',".
				     "city = '".$this->city."',".
					 "bankno = '".$this->bankNo."',".
					 "stdcode = '".$this->stdcode."',".
					 "pincode = '".$this->pincode."',".
					 "phone = '".$this->phoneno."',".
					 "mobileno = '".$this->mobileno."',".
					 "service_tax_no = '".$this->service_tax_no."' ";
			$dbquery = new dbquery($query,$connid);
			/*echo "<script language=javascript>window.location.href = '../cheque_writing/addEditOtherCheques.php';</script>";*/
			echo "<script language=javascript>window.opener.location.href = 'partyMaster.php';window.close();</script>";
		}
		else
		{
			echo "<pre align='center'>Party already exists.</pre>";
		}
		
	}
	function retrievePartyDetails($connid) 
	{
		$this->setgetvars();
		$query = "SELECT * FROM bill_partyMaster WHERE partyid = '".$this->partyid."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		$this->name = $row["partyname"];
		$this->pan = $row["PAN"];
		$this->address = $row["address"];
		if($row["phone"] != 0)
			$this->phoneno = $row["phone"];
		if($row["stdcode"] != 0)
			$this->stdcode = $row["stdcode"];
		if($row["mobileno"] != 0)
			$this->mobileno = $row["mobileno"];
                //if($row["service_tax_no"] != 0)	
		$this->service_tax_no = $row["service_tax_no"];
		$this->bankNo = $row["bankno"];
		$this->city = $row["city"];
		$this->address2 = $row["address2"];
		$this->address3 = $row["address3"];
		$this->address4 = $row["address4"];
		if($row["pincode"] != 0)	
			$this->pincode = $row["pincode"];
		$this->bankAcNo = $row["bankAccntNo"];
		$this->branchAddress = $row["branchAddress"];
		$this->branchName = $row["branchName"];
		$this->accountType = $row["accountType"];
		$this->ifscCode = $row["ifscCode"];
		$this->micrCode = $row["micrCode"];
		$this->nameAsPerBank = $row["nameAsPerBank"];
	}
	function getBankNameList($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM banknamelist ORDER BY bankname";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["bankname"]] = array("bankname" => $row["bankname"],"bankno"=>$row["bankno"]);
		}
		return $arrRet;
	}
	function checkPartyExists($connid, $name, $pan, $city)
	{
		$partyExists = FALSE;
		$query = "SELECT COUNT(*) FROM bill_partyMaster WHERE partyname='$name' AND (pan='$pan' OR city='$city') LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			if($row[0] > 0)
				$partyExists = TRUE;
		}
		return $partyExists;
	}
	function checkPartyNameUpdation($connid, $partyid, $name, $pan, $city)
	{
		$partyExists = FALSE;
		$nameQuery = "SELECT partyname FROM bill_partyMaster WHERE partyid = '$partyid'";
		$dbquery = new dbquery($nameQuery,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			if($row['partyname'] != $name)
			{
				$partyExists = $this->checkPartyExists($connid, $name, $pan, $city);
			}
		}
		return $partyExists;
	}
}
?>