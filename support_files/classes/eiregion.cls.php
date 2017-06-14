<?php
class clsregion
{
		var $city;
		var $region;
		var $state;
		var $std_code;
		var $checked;
		var $action;
		var $city_update;
		var $country;

function clsregion()
{
		$this->city = "";
		$this->region = "";
		$this->state = "";
		$this->std_code = 0;
		$this->checked = 0;
		$this->action = "";
		$this->city_update = "";
		$this->country = "";
}
function setgetvars()
{
	if(isset($_GET['city'])) $this->city_update = $_GET['city'];
}
function setpostvars()
{
	if(isset($_POST['clsregion_city'])) $this->city = $_POST['clsregion_city'];
	if(isset($_POST['clsregion_region'])) $this->region = $_POST['clsregion_region'];
	if(isset($_POST['clsregion_state'])) $this->state = $_POST['clsregion_state'];
	if(isset($_POST['clsregion_std_code'])) $this->std_code = $_POST['clsregion_std_code'];
	if(isset($_POST['clsregion_action'])) $this->action = $_POST['clsregion_action'];
	if(isset($_POST['clsregion_country'])) $this->country = $_POST['clsregion_country'];
}
function savedata($connid)
{
	$this->setpostvars();
	$query = "INSERT INTO region_master (city,region,state,country,std_code,checked) VALUES(".
			 "'".$this->city."',".
			 "'".$this->region."',".
			 "'".$this->state."',".
			 "'".$this->country."',".
			 "'".$this->std_code."',".
			 "'".$this->checked."')";
			 
	$dbquery = new dbquery($query,$connid);
	$this->action = "Successfull";		 
			 
}
function updatedata($connid)
{
	$this->setpostvars();
	$query = "UPDATE region_master SET ".
			 "city ='".$this->city."',".
			 "region='".$this->region."',".
			 "state='".$this->state."',".
			 "country='".$this->country."',".
			 "std_code='".$this->std_code."' WHERE city='$this->city_update' ";
	$dbquery = new dbquery($query,$connid);
}
function pageAddCityToRegionMaster($connid)
{
	$this->setpostvars();
	if($this->action == "SaveData")
	{
		if($this->validation($connid,$this->city,$this->std_code))
		{
			$this->savedata($connid);
			$this->action = "Successfull";
		}
		else
		{
			$this->action = "Duplicate";
		}
	}
	else if($this->action == "UpdateData")
	{
		$this->updatedata($connid);
		$this->action = "Successfull";
	}
}
function validation($connid,$city,$std_code)
{
	$query = "SELECT * FROM region_master WHERE (city = '".$city."')";
	$dbquery = new dbquery($query,$connid);
	if($dbquery->numrows() > 0)
		return false;
	else 
		return true;
}
function generateStateList($connid)
{
	$arrRet = array();
	$query = "SELECT DISTINCT state FROM region_master WHERE state!= '' ORDER BY state";
	$dbquery = new dbquery($query,$connid);
	while($row = $dbquery->getrowarray()) 
	{
		$arrRet[$row["state"]] = array("state" => $row["state"]);
	}
	return $arrRet;
}
function getAllRegionList($connid)
{
	$arrRet = array();
	$query = "SELECT * FROM region_master ORDER BY city ";
	$dbquery = new dbquery($query,$connid);
	while($row = $dbquery->getrowarray()) 
	{
		$arrRet[$row["city"]] = array("city"=>$row["city"],
								"region"=>$row["region"],
								"state"=>$row["state"],
								"std_code"=>$row["std_code"],
								"country"=>$row["country"]
								);
	}
	return $arrRet;
}
function getRegionDetialsByCityID($connid)
{
	$this->setgetvars();
	$query = "SELECT * FROM region_master WHERE city='$this->city_update' ORDER BY city ";
	$dbquery = new dbquery($query,$connid);
	$row = $dbquery->getrowarray();
	$this->city = $row["city"];
	$this->region = $row["region"];
	$this->state = $row["state"];
	$this->std_code = $row["std_code"];
	$this->country = $row["country"];
}
function getAllZones($connid)
{
	$arrRet = array();
	$query = "SELECT DISTINCT region FROM region_master";
	$dbquery = new dbquery($query,$connid);
	while($row = $dbquery->getrowarray())
	{
		$arrRet[] = $row["region"];
	}
	return $arrRet;
}
function getAllCountries($connid)
{
	$arrRet = array();
	$query = "SELECT id,name FROM country_master ORDER BY name";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		$arrRet[$row["id"]] = array("id"=>$row["id"],"name"=>$row["name"]);
	}
	return $arrRet;
}
}
?>