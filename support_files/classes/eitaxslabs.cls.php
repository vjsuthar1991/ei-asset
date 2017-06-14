<?php 
class clstaxslabs
{
	var $slab_id;
	var $period;
	var $searchperiod;
	var $fromTaxableIncome;
	var $toTaxableIncome;
	var $category;
	var $searchcategory;
	var $percentageTax;
	var $surcharge;
	var $action;
	var $entered_dt;
	var $entered_by;
	var $modified_dt;
	var $modified_by;
	var $error;
	var $make_editable;
	function clstaxslabs()
	{
		$this->slab_id = "";
		$this->period = "";
		$this->fromTaxableIncome = "";
		$this->toTaxableIncome = "";
		$this->category = "";
		$this->percentageTax = 0;
		$this->surcharge = 0;
		$this->action = "";
		$this->entered_by = "";
		$this->entered_dt = "0000-00-00 00:00:00";
		$this->modified_by = "";
		$this->modified_dt = "0000-00-00 00:00:00";
		$this->error = "";
		$this->make_editable = "";
	}
	
	function setpostvars()
	{
		if(isset($_POST["clstaxslabs_period"])) $this->period[$this->action] = $_POST["clstaxslabs_period"];
		if(isset($_POST["clstaxslabs_fromTaxableIncome"])) $this->fromTaxableIncome = $_POST["clstaxslabs_fromTaxableIncome"];
		if(isset($_POST["clstaxslabs_toTaxableIncome"])) $this->toTaxableIncome = $_POST["clstaxslabs_toTaxableIncome"];
		if(isset($_POST["clstaxslabs_category"])) $this->category = $_POST["clstaxslabs_category"];
		if(isset($_POST["clstaxslabs_percentageTax"])) $this->percentageTax = $_POST["clstaxslabs_percentageTax"];
		if(isset($_POST["clstaxslabs_surcharge"])) $this->surcharge = $_POST["clstaxslabs_surcharge"];
		if(isset($_POST["clstaxslabs_hdnaction"])) $this->action = $_POST["clstaxslabs_hdnaction"];
		if(isset($_POST["clstaxslabs_hdnslabid"])) $this->slab_id = $_POST["clstaxslabs_hdnslabid"];
		if(isset($_POST["clstaxslabs_searchperiod"])) $this->searchperiod = $_POST["clstaxslabs_searchperiod"];
		if(isset($_POST["clstaxslabs_searchcategory"])) $this->searchcategory = $_POST["clstaxslabs_searchcategory"];
		if(isset($_POST["clstaxslabs_makeeditable"])) $this->make_editable = $_POST["clstaxslabs_makeeditable"];
		echo "<pre>";		
		print_r($_POST);
		echo "</pre>";
		//exit;
	}
	
	function setgetvars()
	{
		
	}
	
	function pageAddTaxSlabForFinancialYear($connid,$name)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
			{
				$this->savedata($connid,$name);
			}
			/*echo $this->period[$this->action];
			echo $this->period[$this->action];
			print_r($this->fromTaxableIncome[$this->action]);
			print_r($this->toTaxableIncome[$this->action]);
			print_r($this->percentageTax[$this->action]);
			print_r($this->surcharge[$this->action]);*/
			/*if($this->validation($connid))
			{
				$this->savedata();		
			}*/
			
		}
		elseif($this->action == "UpdateData")
		{
			if($this->validation($connid))
			{
				$this->updatedata($connid,$name);
			}
		}
		elseif($this->action == "DeleteData")
		{
			$this->deleteData($connid,$this->make_editable);
		}
	}
	function deleteData($connid,$arrDeleteSlabs)
	{
		foreach($arrDeleteSlabs as $slabid)
		{
			$query = "DELETE FROM payroll_taxslabMaster WHERE slab_id = '".$slabid."'";
			$dbquery = new dbquery($query,$connid);
		}
	}
	function savedata($connid,$name)
	{
		/*if($this->slab_id[$this->action] == "")
		{*/
			for($i = 0;$i <= count($this->fromTaxableIncome[$this->action])-1 ; $i++)
			{
				if($this->period[$this->action] != "" && $this->fromTaxableIncome[$this->action][$i] != "" && $this->toTaxableIncome[$this->action][$i] != "" && $this->period[$this->action] != "" && $this->percentageTax[$this->action][$i] != "" && $this->surcharge[$this->action] != "")
				{
					$query = "INSERT INTO payroll_taxslabMaster(period,fromTaxableIncome,toTaxableIncome,category,percentageTax,surcharge,".
							 "entered_dt,entered_by) ".
							 "VALUES("	.
							 "'".$this->period[$this->action][$i]."',".
							 "'".$this->fromTaxableIncome[$this->action][$i]."',".
							 "'".$this->toTaxableIncome[$this->action][$i]."',".
							 "'".$this->category[$this->action][$i]."',".
							 "'".$this->percentageTax[$this->action][$i]."',".
							 "'".$this->surcharge[$this->action][$i]."',".
							 "NOW(),".
							 "'".$name."') ";
					$dbquery = new dbquery($query,$connid);
				}
			}
			$this->action = "SuccessfullyAdded";
		/*}*/
	}
	function updatedata($connid,$name)
	{
		for($i = 0;$i <= count($this->fromTaxableIncome[$this->action])-1 ; $i++)
		{
			if($this->period[$this->action] != "" && $this->fromTaxableIncome[$this->action][$i] != "" && $this->toTaxableIncome[$this->action][$i] != "" && $this->period[$this->action] != "" && $this->percentageTax[$this->action][$i] != "" && $this->surcharge[$this->action] != "")
			{
				$query = "UPDATE payroll_taxslabMaster SET ".
						 "period = '".$this->period[$this->action][$i]."', ".
						 "fromTaxableIncome = '".$this->fromTaxableIncome[$this->action][$i]."', ".
						 "toTaxableIncome = '".$this->toTaxableIncome[$this->action][$i]."', ".
						 "category = '".$this->category[$this->action][$i]."', ".
						 "percentageTax = '".$this->percentageTax[$this->action][$i]."',".
						 "surcharge = '".$this->surcharge[$this->action][$i]."', ".
						 "modified_dt = NOW(),".
						 "modified_by = '".$name."' ".
						 "WHERE slab_id = '".$this->slab_id[$this->action][$i]."' ";
				$dbquery = new dbquery($query,$connid);
			}
		}
		$this->action = "SuccessfullyUpdated";
	}
	function validation($connid)
	{
		$error = "";
		if(!$this->NotEmptyValues($this->period[$this->action]))
			$this->error["period"] = "Please select the period for the slab";
		if(!$this->NotEmptyValues($this->category[$this->action]))
			$this->error["category"] = "Please select the category for adding their respective tax slabs";
		/*echo "Function is called"	;*/
		$arrTemp = $this->fromTaxableIncome["UpdateData"];
		echo "<pre>";
		print_r($arrTemp);
		echo "</pre>";
		/*foreach($arrTemp as $key =>$value)
		{
			print_r($value);
		}*/
		if($this->checkEmptyValues($this->fromTaxableIncome[$this->action]))
			$this->error["fromTaxableIncome"] = "Please enter any from taxable income for the slab";
		$error = $this->checkSequentialEntriesAreComplete($this->slab_id[$this->action],$this->fromTaxableIncome[$this->action],$this->toTaxableIncome[$this->action],$this->percentageTax[$this->action],$this->surcharge[$this->action]);
		if($error != "")
			$this->error["sequenceCheck"] = $error;
		$notnumeric_error=$this->CheckAllNumeric($this->fromTaxableIncome[$this->action],$this->toTaxableIncome[$this->action],$this->percentageTax[$this->action],$this->surcharge[$this->action]);
		if($notnumeric_error != "")
			$this->error["numericCheck"] = $notnumeric_error;
		$duplication_error = $this->CheckDuplicationOfSlabs($connid,$this->fromTaxableIncome[$this->action],$this->toTaxableIncome[$this->action]);
		if($duplication_error != "" && $this->action != "UpdateData")
			$this->error["duplicationCheck"] = $duplication_error;
		/*if($this->toTaxableIncome[$this->action] == "")
			$this->error["toTaxableIncome"] = "Please enter the to taxable income for the slab";
		if($this->period[$this->action] == "")
			$this->error["category "] = "Please enter the category for the slab";
		if($this->percentageTax[$this->action] == 0)	
			$this->error["percentageTax "] = "Please enter the percentage tax for the slab";
		if($this->CheckDuplicationOfSlabs($connid))
			$this->error["checkduplicate"] = "This slab has already been entered";*/
		
		if(is_array($this->error) && count($this->error) > 0)
			return false;
		else 
			return true;
	}
	function checkEmptyValues($arrRecd)
	{
		$status = true;
		for($i = 0;$i <= count($arrRecd)-1 ; $i ++)
		{
			if($arrRecd[$i] != "")
				$status = false;
		}
		return $status;
	}
	function NotEmptyValues($arrRecd)
	{
		$status = true;
		for($i = 0;$i <= count($arrRecd)-1 ; $i ++)
		{
			if($arrRecd[$i] == "")
				$status = false;
		}
		return $status;
	}
	function checkSequentialEntriesAreComplete($arrSlabs,$arrRecdfrom,$arrRecdto,$arrRecdrate,$arrRecdSurcharge)
	{
		$error = "";
		if(is_array($arrRecdfrom) && count($arrRecdfrom) >0)
		{
			for($i = 0;$i <= count($arrRecdfrom)-1 ; $i++)
			{
				if($arrRecdfrom[$i] != "" && $arrRecdto[$i] == "")
				{
					$error = "Please enter the to taxable income of the slab ".($i+1);
					break;
				}
				if($arrRecdfrom[$i] != "" && $arrRecdrate[$i] == "")
				{
					$error = "Please enter the rate of the slab ".($i+1);
					break;
				}
				elseif ($arrRecdfrom[$i] != "" && $arrRecdSurcharge[$i] == "")
				{
					$error = "Please enter the surcharge of the slab ".($i + 1);
					break;
				}
			}	
		}
		
		return $error;
	}
	function CheckAllNumeric($arrRecdfrom,$arrRecdto,$arrRecdrate,$arrRecdSurcharge)
	{
		$error = "";
		for($i = 0;$i <= count($arrRecdfrom)-1 ; $i++)
		{
			if(!ctype_digit($arrRecdfrom[$i]))
			{
				$error = "Please enter the from taxable income in numeric format for slab ".($i+1);
				break;
			}
			elseif (!ctype_digit($arrRecdto[$i]))
			{
				$error = "Please enter the to taxable income in numeric format for slab ".($i+1);
				break;
			}
			elseif (!ctype_digit($arrRecdrate[$i]))
			{
				$error = "Please enter the rate in numeric format for slab ".($i+1);
				break;
			}
			elseif (!ctype_digit($arrRecdSurcharge[$i]))
			{
				$error = "Please enter the surcharge in numeric format for slab ".($i+1);
				break;
			}
		}
		return $error;
	}
	function CheckDuplicationOfSlabs($connid,$arrRecdfrom,$arrRecdto)
	{
		$error = "";
		for($i = 0;$i <= count($arrRecdfrom)-1 ; $i++)
		{
			$query = "SELECT count(*) ".
				 "FROM payroll_taxslabMaster ".
				 "WHERE period = '".$this->period[$this->action]."' ".
				 "AND  fromTaxableIncome= '".$arrRecdfrom[$i]."' ".
				 "AND  toTaxableIncome= '".$arrRecdto[$i]."' ".
				 "AND  category= '".$this->period[$this->action]."' ";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($row[0] > 0)
			{
				$error = "Slab ".($i + 1)." Already exists";
				break;
			}	
		}
		
		return $error; 
	}
	function searchTaxSlabs($connid)
	{
		$this->setpostvars();
		$arrRet = array();
		$query = "SELECT * FROM payroll_taxslabMaster WHERE 1 = 1 ";
		
		if($this->searchperiod != "")
			$query.= "AND payroll_taxslabMaster.period = '".$this->searchperiod."' ";
		if($this->searchcategory != "")
			$query.= "AND payroll_taxslabMaster.category = '".$this->searchcategory."' ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["slab_id"]] = array("slab_id" =>$row["slab_id"],
											"period" =>$row["period"],
											"category" =>$row["category"],
											"fromTaxableIncome"=>$row["fromTaxableIncome"],
											"toTaxableIncome"=>$row["toTaxableIncome"],
											"percentageTax"=>$row["percentageTax"],
											"surcharge"=>$row["surcharge"]
											); 
		}
		return $arrRet;
	}
}