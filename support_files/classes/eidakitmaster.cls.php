<?php
class kitmaster {

	var $connid;
	
	var $id;
	var $city;
	var $type;
	var $added_dt;
	var $added_by;
	var $tab;
	var $mob;
	var $pie;
	var $region;
	var $city_count;
	var $action;

	function kitmaster($connid ="") {
		$this->connid = $connid; // Connection
		$this->id = "";
		$this->city = "";
		$this->type = "";
		$this->added_dt = "";
		$this->added_by = "";
		$this->action = "";
		$this->tab = "";
		$this->mob = "";
		$this->pie = "";
		$this->region = "";
		$this->city_count = 0;
	}

	function setpostvars() {
		if(isset($_POST["action"])) $this->action = $_POST["action"];
		if(isset($_POST["city"])) $this->city = $_POST["city"];
		if(isset($_POST["tab"])) $this->tab = $_POST["tab"];
		if(isset($_POST["mob"])) $this->mob = $_POST["mob"];
		if(isset($_POST["pie"])) $this->pie = $_POST["pie"];
		if(isset($_POST["region"])) $this->region = $_POST["region"];
		if(isset($_POST["citycnt"])) $this->city_count = $_POST["citycnt"];
	}	

	function setgetvars() {
		
	}
	
	
	function getCities() {
		
		$arrRet = array();
		$query = "SELECT DISTINCT region FROM da_kitMaster";
		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray())
		{
			if($row["region"] != "")
				$arrRet[] = $row["region"];
		}
		return $arrRet;
	}
	
	function getUpdateKits() {
			
		$this->setpostvars();
		
		if(isset($this->action) && $this->action == 1) {
			$returnArr = array();
			
			$query = "SELECT COUNT(*) no_of_mob FROM da_kitMaster WHERE type = 'MOB' AND region_id = '$this->region'";
			$dbqry = new dbquery($query,$this->connid);
			while($row=$dbqry->getrowarray())
			{
				$returnArr['mob'] = $row['no_of_mob'];
			}
			
			$query = "SELECT COUNT(*) no_of_tab FROM da_kitMaster WHERE type = 'TAB' AND region_id = '$this->region'";
			$dbqry = new dbquery($query,$this->connid);
			while($row=$dbqry->getrowarray())
			{
				$returnArr['tab'] = $row['no_of_tab'];
			}
			
			
			$query = "SELECT COUNT(*) no_of_pie FROM da_kitMaster WHERE type = 'PIE' AND region_id = '$this->region'";
			$dbqry = new dbquery($query,$this->connid);
			while($row=$dbqry->getrowarray())
			{
				$returnArr['pie'] = $row['no_of_pie'];
			}
			return ($returnArr);
		}
	}
	
	function getKits() {
		
		$this->setpostvars();
		$this->setgetvars();
		
		$returnArr = array();
		
		$query = "SELECT region_id,type,count(*) count from da_kitMaster where 1=1 group by region_id,type";
		$dbqry = new dbquery($query,$this->connid);
		while($row=$dbqry->getrowarray())
		{
			if($row['type']=='MOB')
				$returnArr[$row['region_id']]['mob'] = $row['count'];
			else if($row['type']=='TAB')
				$returnArr[$row['region_id']]['tab'] = $row['count'];
			else if($row['type']=='PIE')
				$returnArr[$row['region_id']]['pie'] = $row['count'];
				
			if(!isset($returnArr[$row['region_id']]['tab']))	$returnArr[$row['region_id']]['tab']=0;
			if(!isset($returnArr[$row['region_id']]['mob']))	$returnArr[$row['region_id']]['mob']=0;
			if(!isset($returnArr[$row['region_id']]['pie']))	$returnArr[$row['region_id']]['pie']=0;
			
		}
		return ($returnArr);
	}
	
	function updateKits() {
		
		$this->setpostvars();
			
		if(isset($this->action) && $this->action == 2) {
			
			$query = "SELECT COUNT(*) no_of_tab FROM da_kitMaster WHERE type = 'TAB' AND region_id = '$this->region'";
			$dbqry = new dbquery($query,$this->connid);
			while($row=$dbqry->getrowarray()){
				$returnArr['tab'] = $row['no_of_tab'];
			}
			
			# Tablet
			$diff = $returnArr['tab']-$this->tab;
			if($diff<0) {	//means have to insert some entries
				$diff = $diff*(-1);
				for($i=0;$i<$diff;$i++) {
					$query = "INSERT INTO da_kitMaster SET region_id='$this->region', type='TAB'";
					$dbqry = new dbquery($query,$this->connid);
				}
			}
			else if($diff>0) {	//have to delete some entries
				$query = "DELETE FROM da_kitMaster WHERE region_id='$this->region' AND type='TAB' LIMIT $diff";
				$dbqry = new dbquery($query,$this->connid);
			}
			
			# Mobile
			$query = "SELECT COUNT(*) no_of_mob FROM da_kitMaster WHERE type = 'MOB' AND region_id = '$this->region'";
			$dbqry = new dbquery($query,$this->connid);
			while($row=$dbqry->getrowarray())
			{
				$returnArr['mob'] = $row['no_of_mob'];
			}
			$diff = $returnArr['mob']-$this->mob;
			if($diff<0) {	//means have to insert some entries
				$diff = $diff*(-1);
				for($i=0;$i<$diff;$i++) {
					$query = "INSERT INTO da_kitMaster SET region_id='$this->region', type='MOB'";
					$dbqry = new dbquery($query,$this->connid);
				}
			}
			else if($diff>0) {	//have to delete some entries
				$query = "DELETE FROM da_kitMaster WHERE region_id='$this->region' AND type='MOB' LIMIT $diff";
				$dbqry = new dbquery($query,$this->connid);
			}
			
			# PIE
			$query = "SELECT COUNT(*) no_of_pie FROM da_kitMaster WHERE type = 'PIE' AND region_id = '$this->region'";
			$dbqry = new dbquery($query,$this->connid);
			while($row=$dbqry->getrowarray())
			{
				$returnArr['pie'] = $row['no_of_pie'];
			}
			$diff = $returnArr['pie']-$this->pie;
			if($diff<0) {	//means have to insert some entries
				$diff = $diff*(-1);
				for($i=0;$i<$diff;$i++) {
					$query = "INSERT INTO da_kitMaster SET region_id='$this->region', type='PIE'";
					$dbqry = new dbquery($query,$this->connid);
				}
			}
			else if($diff>0) {	//have to delete some entries
				$query = "DELETE FROM da_kitMaster WHERE region_id='$this->region' AND type='PIE' LIMIT $diff";
				$dbqry = new dbquery($query,$this->connid);
			}
			
		}
	}
	
	function getNewCities() {
		
		$query = "SELECT * FROM da_kitRegions
				  WHERE id NOT IN (SELECT DISTINCT region_id FROM da_kitMaster)";
		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray()){
			$arrRet[$row["id"]] = $row["region"];
		}
		return $arrRet;
	}
	
	function addNewCityKits() {
		
		$this->setpostvars();
		
		if(isset($this->action) && $this->action == 3) {
			for($i=0; $i<$this->tab; $i++) {
				$query = "INSERT INTO da_kitMaster SET region_id = '$this->region', type = 'TAB', added_by = '".$_SESSION['username']."', added_dt = NOW()";
				$dbqry = new dbquery($query,$this->connid);
			}
			/*for($i=0; $i<$this->mob; $i++) {
				$query = "INSERT INTO da_kitMaster SET region = '$this->city', type = 'MOB', added_by = '".$_SESSION['username']."', added_dt = NOW()";
				$dbqry = new dbquery($query,$this->connid);
			}*/
			for($i=0; $i<$this->pie; $i++) {
				$query = "INSERT INTO da_kitMaster SET region_id = '$this->region', type = 'PIE', added_by = '".$_SESSION['username']."', added_dt = NOW()";
				$dbqry = new dbquery($query,$this->connid);
			}
		}
	}
	
	function getRegionCities() {
		$query = "SELECT da_kitRegions.region, da_regionCities.city FROM da_kitRegions, da_regionCities WHERE da_kitRegions.id=da_regionCities.region_id ORDER BY region, city";
		$dbqry = new dbquery($query,$this->connid);
		$regioncities = array();
		while($row = $dbqry->getrowarray()) {
			$regioncities[$row['region']][] = $row['city'];
		}
		return $regioncities;
	}
	
	function PageMapRegionCities() {
		
		$this->setpostvars();
		$this->setgetvars();
		
		if(isset($this->action) && $this->action=="save") {
			
			$regioncities = $this->getRegionCities(); //Get mapped regions and cities.
			$query = "SELECT id from da_kitRegions WHERE region='$this->region'"; //Get ID of selected region (used in INSERT).
			$dbqry = new dbquery($query,$this->connid);
			$row = $dbqry->getrowarray();
			$region_id = $row['id'];
			for($i=0;$i<$this->city_count;$i++) { //For all cities displayed with checkboxes.
				if(isset($_POST['chkbox_'.$i])) { //If city selected.
					if(!isset($regioncities["$this->region"]) || !in_array($_POST['chkbox_'.$i],$regioncities["$this->region"])) { //If city not already mapped with region.
						$query = "INSERT INTO da_regionCities SET region_id=$region_id, city='".$_POST['chkbox_'.$i]."', added_by = '".$_SESSION['username']."', added_dt = NOW()";
						$dbqry = new dbquery($query,$this->connid);
					}
				}
				else { //If city not selected.
					if(isset($regioncities["$this->region"]) && in_array($_POST['hchkbox_'.$i],$regioncities["$this->region"])) { //If city already mapped with region.
						$query = "DELETE FROM da_regionCities WHERE city='".$_POST['hchkbox_'.$i]."'";
						$dbqry = new dbquery($query,$this->connid);
					}
				}
			}
			$this->action="region";
		}
		
		
		$query = "SELECT DISTINCT(region), id FROM da_kitRegions ORDER BY region";
		$dbqry = new dbquery($query,$this->connid);
		$region = array();
		while($row = $dbqry->getrowarray()) {
			$region[$row['id']][] = $row['region'];
		}
		return $region;
	}
	
	function getAllCities() {
		
		if($this->action=="region") {
			$query = "SELECT DISTINCT(schools.city) FROM da_orderMaster, schools 
					WHERE da_orderMaster.schoolCode=schools.schoolno ORDER BY city";
			$dbqry = new dbquery($query,$this->connid);
			$cities = array();
			while($row = $dbqry->getrowarray()) {
				$cities[] = $row['city'];
			}
			return $cities;
		}
	}
	
	function getUnrelatedCities() {
		if($this->action=="region") {
			
			$query = "SELECT city FROM da_kitRegions, da_regionCities 
					WHERE region!='$this->region' and da_kitRegions.id=da_regionCities.region_id;";
			$dbqry = new dbquery($query,$this->connid);
			$cities = array();
			while($row = $dbqry->getrowarray()) {
				$cities[] = $row['city'];
			}
			return $cities;
		}
	}
	
	function getPieKits() {
		if($this->action=="region") {
			
			$query = "SELECT no_of_pies, no_of_kits FROM da_kitRegions
					  WHERE region='$this->region'";
			$dbqry = new dbquery($query,$this->connid);
			$row = $dbqry->getrowarray();
			$pieKits = array();
			$pieKits['pies'] = $row['no_of_pies'];
			$pieKits['kits'] = $row['no_of_kits'];
			return $pieKits;
		}
	}

}
?>