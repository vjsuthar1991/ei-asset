<?php
class clsdagroup
{
	var $group_id;
	var $group_text;
	var $subjectno;
	var $action;
	var $entered_by;
	var $group_name;
	var $groupDesgn_ImageDesc;

	function clsdatopic()
	{
		$this->group_id = "";
		$this->group_name = "";
		$this->group_text = "";
		$this->subjectno = "";
		$this->entered_by = "";
		$this->groupDesgn_ImageDesc ="";
	}
	function setpostvars()
	{
		if(isset($_POST["clsdagroup_group_id"])) $this->group_id = $_POST["clsdagroup_group_id"];
		if(isset($_POST["clsdagroup_group_name"])) $this->group_name = $_POST["clsdagroup_group_name"];
		if(isset($_POST["clsdagroup_group_text"])) $this->group_text = $_POST["clsdagroup_group_text"];
		if(isset($_POST["clsdagroup_image_desc"])) $this->groupDesgn_ImageDesc = $_POST["clsdagroup_image_desc"];
	}
	function setgetvars()
	{
		if(isset($_POST["clsdagroup_group_id"])) $this->group_id = $_POST["clsdagroup_group_id"];
		if(isset($_POST["clsdagroup_group_name"])) $this->group_name = $_POST["clsdagroup_group_name"];
		if(isset($_POST["clsdagroup_group_text"])) $this->group_text = $_POST["clsdagroup_group_text"];
	}

	function retrieveGroupDetails($connid, $groupid)
	{
		$this->group_id = $groupid;
		if($groupid!="")
		{
			$query = "SELECT * FROM da_groupMaster WHERE group_id = ".$groupid;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$this->group_text = $row["group_text"];
			$this->subjectno = $row["subjectno"];
			$this->group_name = $row["groupname"];
			$this->entered_by = $row["entered_by"];
			$this->groupDesgn_ImageDesc =$row["groupDesgn_imageDesc"];
		}
	}
	function saveData($connid, $subjectno="", $entered_by="")
	{
		if($this->group_id=="" && $this->group_name!="")	//Implies new group - add an entry in the group master table
		{
			$query = "INSERT INTO da_groupMaster SET
				             groupname='".$this->group_name."',
				             group_text='".$this->group_text."',
				             subjectno=".$subjectno.",
				             entered_by='".$entered_by."',
				             entered_date='".date("Y-m-d")."'";
			$dbquery = new dbquery($query,$connid);
			$this->group_id = mysql_insert_id($connid);
		}
		else
		{
			$query = "UPDATE da_groupMaster SET group_text='".$this->group_text."' WHERE group_id=".$this->group_id;
			$dbquery = new dbquery($query,$connid);
		}
	}
}
?>