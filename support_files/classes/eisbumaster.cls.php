<?php
class clssbu
{
	var $id;
	var $sbu_name;
	var $dbname;
	var $sbu_fullname;
	var $sbu_code;
	var $sbu_head;
	var $authority1;
	var $authority2;
	var $authority3;
	var $authority4;
	var $authority5;
	var $dept;
	var $entered_dt;
	var $action;
	function clssbu()
	{
		$this->id = 0;
		$this->sbu_name = "";
		$this->dbname = "";
		$this->sbu_fullname = "";
		$this->sbu_code = "";
		$this->sbu_head = "";
		$this->authority1 = "";
		$this->authority2 = "";
		$this->authority3 = "";
		$this->authority4 = "";
		$this->authority5 = "";
		$this->dept = "";
		$this->entered_dt = ""; 
		$this->action = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clssbu_id"])) $this->id = $_POST["clssbu_id"];
		if(isset($_POST["clssbu_sbuhead"])) $this->sbu_head = $_POST["clssbu_sbuhead"];
		if(isset($_POST["clssbu_authority1"])) $this->authority1 = $_POST["clssbu_authority1"];
		if(isset($_POST["clssbu_authority2"])) $this->authority2 = $_POST["clssbu_authority2"];
		if(isset($_POST["clssbu_authority3"])) $this->authority3 = $_POST["clssbu_authority3"];
		if(isset($_POST["clssbu_authority4"])) $this->authority4 = $_POST["clssbu_authority4"];
		if(isset($_POST["clssbu_authority5"])) $this->authority5 = $_POST["clssbu_authority5"];
		if(isset($_POST["clssbu_hdnaction"])) $this->action = $_POST["clssbu_hdnaction"];
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		
	}
	function retrieveSbuDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM sbu_master ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["srno"]] = array("srno"=>$row["srno"],
										"sbu_name"=>$row["sbu_name"],
										"sbu_fullname"=>$row["sbu_fullname"],
										"sbu_code"=>$row["sbu_code"],
										"sbu_head"=>$row["sbu_head"],
										"authority1"=>$row["authority1"],
										"authority2"=>$row["authority2"],
										"authority3"=>$row["authority3"],
										"authority4"=>$row["authority4"],
										"authority5"=>$row["authority5"],
										"dept"=>$row["dept"]
			);
		}
		return $arrRet;
	}
	function pageEditSbuDetails($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			/*if($this->validate($connid))
			{*/
				$this->saveData($connid);
			/*}*/
		}
	}
	function validate($connid)
	{
		if(is_array($this->id) && count($this->id) > 0)
		{
			for($i=0;$i<count($this->id);$i++)
			{
				for($j=0;$j<count($this->id);$j++)
				{
					if($i != $j && ($this->authority1[$i] == $this->authority1[$j] || ($this->authority4[$i] == $this->authority4[$j] && $this->authority4[$i] != "" && $this->authority4[$j] != "") || ($this->authority5[$i] == $this->authority5[$j] && $this->authority5[$i] != "" && $this->authority5[$j] != "")))
						$this->error[$i][$j] = "Authority 1/4/5 have duplicate please check";
				}	
			}
		}
		if(is_array($this->error) && count($this->error) > 0)
			return false;
		else
			return true;
	}
	function saveData($connid)
	{
		$i = 0;
		$arrEmployee = $this->getEmployeeDetails($connid);
		if(is_array($this->id) && count($this->id) > 0)
		{
			for($i=0;$i<count($this->id);$i++)
			{
				/*if($this->authority1[$i] != "" && $this->authority2[$i] != "" && in_array($this->authority1[$i],$arrEmployee) && ( $this->authority4[$i] == "" || ($this->authority4[$i] != "" && in_array($this->authority4[$i],$arrEmployee) ) ) && ($this->authority5[$i] == "" || ($this->authority5[$i] != "" && in_array($this->authority5[$i],$arrEmployee))))
				{*/
					$query = "UPDATE sbu_master SET authority1 = '".$this->authority1[$i]."',
						authority2 = '".$this->authority2[$i]."',
						authority3 = '".$this->authority3[$i]."',
						authority4 = '".$this->authority4[$i]."',
						authority5 = '".$this->authority5[$i]."' WHERE srno = '".$this->id[$i]."' LIMIT 1
					";
					$dbquery = new dbquery($query,$connid);
				/*}*/
				
			}
		}
	}
	function getEmployeeDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT userID FROM emp_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = $row["userID"];
		}
		return $arrRet; 
	}
}

?>