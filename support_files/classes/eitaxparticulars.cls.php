<?php
class clstaxparticulars 
{
	var $particular_id;
	var $name;
	var $section;
	var $cap;
	var $remarks;
	var $entered_by;
	var $entered_dt;
	var $modified_by;
	var $modified_dt;
	var $action; 
	var $error;
	var $delparticulars;
	
	function clstaxparticulars() 
	{
		$this->particular_id = 0;
		$this->name = "";
		$this->section = "";
		$this->cap = "";
		$this->remarks = "";
		$this->entered_by = "";
		$this->entered_dt = '0000-00-00 00:00:00';
		$this->modified_by = "";
		$this->modified_dt = '0000-00-00 00:00:00';
		$this->action = "";	
		$this->error = "";
		$this->delparticulars = "";
	}
	
	function setpostvars()
	{
		if(isset($_POST['clstaxparticular_name'])) $this->name = trim($_POST['clstaxparticular_name']);
		if(isset($_POST['clstaxparticular_section'])) $this->section = trim($_POST['clstaxparticular_section']);
		if(isset($_POST['clstaxparticular_cap'])) $this->cap = trim($_POST['clstaxparticular_cap']);
		if(isset($_POST['clstaxparticular_remarks'])) $this->remarks = trim($_POST['clstaxparticular_remarks']);
		if(isset($_POST['clstaxparticular_hdnaction'])) $this->action = trim($_POST['clstaxparticular_hdnaction']);
		if(isset($_POST['clstaxparticular_hdnparticularid'])) $this->particular_id = trim($_POST['clstaxparticular_hdnparticularid']);
		if(isset($_POST['clstaxparticular_delparticulars'])) $this->delparticulars = $_POST['clstaxparticular_delparticulars'];
	}
	function setgetvars()
	{
		if(isset($_GET['action'])) $this->action = trim($_GET['action']);
		if(isset($_GET['particularid'])) $this->particular_id = trim($_GET['particularid']);
	}
	function getParticulars($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM payroll_taxParticulars";
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows() > 0) 
		{
			while($row = $dbquery->getrowarray()) 
			{
				$arrRet[$row["particularid"]] = array("particularid" => $row["particularid"],
												  "name" => $row["name"],
												  "section" => $row["section"],
												  "cap" => $row["cap"],
												  "remarks" => $row["remarks"]
												  );
			}
		}
		return $arrRet;
	}
	
	function pageAddParticular($connid,$name)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		if($this->action == 'SaveData')
		{
			if($this->validation($connid))
			{
				$this->savedata($connid,$name);
				$this->action = "Successfull";			
			}
		}
		if($this->action == 'Edit')
		{
			$this->retrieveParticularByID($connid,$this->particular_id);
		}
		if($this->action == "Delete")
		{
			$this->deleteParticulars($connid);
		}
	}
	function savedata($connid,$name)
	{
		if($this->particular_id == 0){
			$query = "INSERT INTO payroll_taxParticulars(name,section,cap,remarks,entered_by,entered_dt) VALUES (".
					 "'".addslashes($this->name)."',".
					 "'".addslashes($this->section)."',".
					 "'".$this->cap."',".
					 "'".addslashes($this->remarks)."',".
					 "'".$name."',".
					 "NOW())";
			$dbquery = new dbquery($query,$connid);
			$this->action = "Successfull";
		}
		else 
		{
			$query = "UPDATE payroll_taxParticulars SET ".
					 "name = '".addslashes($this->name)."',".
					 "section = '".addslashes($this->section)."',".
					 "cap = '".$this->cap."',".
					 "remarks = '".$this->remarks."',".
					 "modified_by = '".$_SESSION['username']."',".
					 "modified_dt = NOW() WHERE particularid = '".$this->particular_id."' ";
					 
			$dbquery = new dbquery($query,$connid);	
			$this->action = "Successfull";	 
		}
	}
	
	function validation($connid)
	{
		if($this->name == "")
			$this->error["name"] = "Please enter the name of the particular";
		
		if($this->particular_id == 0 && $this->CheckParticularExistence($connid,$this->name))
			$this->error["duplicate"] = "Particular already exists";
			
 		if(is_array($this->error) && count($this->error) > 0)
 			return false;
		else 
			return true; 
	}
	
	function CheckParticularExistence($connid,$name)
	{
		$query = "SELECT name FROM payroll_taxParticulars WHERE name LIKE '%".$name."%' ";
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows() > 0) 
			return true;
		else 
			return false;	
	}
	function retrieveParticularByID($connid,$particular_id)
	{
		$query = "SELECT * FROM payroll_taxParticulars WHERE particularid = '".$particular_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->name = $row['name'];
		$this->section = $row['section'];
		$this->cap = $row['cap'];
		$this->remarks = $row['remarks'];
	}
	function deleteParticulars($connid)
	{
		if(is_array($this->delparticulars) && count($this->delparticulars) > 0)
		{
			foreach($this->delparticulars as $particularid)
			{
				$query = "DELETE FROM payroll_taxParticulars WHERE particularid =  '".$particularid."'";
				$dbquery = new dbquery($query,$connid);
			}
			
		}
	}
}
?>