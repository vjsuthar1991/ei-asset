<?php
class clsdatopic
{
	var $topic_code;
	var $description;
	var $subjectno;
	var $action;
	var $class;
	var $owner;
	var $pageName;
	var $flflag; // loading alloted subtopoics topic for freelancers
	
	function clsdatopic()
	{
		$this->topic_code = "";
		$this->description = "";
		$this->subjectno = "";
		$this->action = "";
		$this->class = "";
		$this->owner = "";
		$this->pageName = "";
		$this->flflag = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsdatopic_description"])) $this->description = $_POST["clsdatopic_description"];
		if(isset($_POST["clsdatopic_subjectno"])) $this->subjectno = $_POST["clsdatopic_subjectno"];
		if(isset($_POST["clsdatopic_hdnaction"])) $this->action = $_POST["clsdatopic_hdnaction"];
		if(isset($_POST["clsdatopic_class"])) $this->class = $_POST["clsdatopic_class"];
		if(isset($_POST["clsdatopic_owner"])) $this->owner = $_POST["clsdatopic_owner"];
		if(isset($_POST["clsdatopic_pageName"])) $this->pageName = $_POST["clsdatopic_pageName"];
		if(isset($_POST["clsdatopic_flflag"])) $this->flflag = $_POST["clsdatopic_flflag"];
		
	}
	function setgetvars()
	{
		if(isset($_GET["topic_code"])) $this->topic_code = $_GET["topic_code"];
		if(isset($_GET["class"])) $this->class = $_GET["class"];
		if(isset($_GET["action"])) $this->action = $_GET["action"];
		if(isset($_GET["subject"])) $this->subjectno = $_GET["subject"];
		
	}
	function pageAddEditTopic($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
			{
				if($this->topic_code == "")
					$this->saveData($connid);
				else if($this->topic_code != "" && $this->topic_code != 0)
					$this->updateData($connid);
			}
		}
	}
	function retrieveTopicDetails($connid)
	{
		$this->setgetvars();
		$query = "SELECT * FROM da_topicMaster WHERE topic_code = '".$this->topic_code."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->description = $row["description"];
		$this->class = $row["class"];
		$this->subjectno = $row["subjectno"];
		$this->owner = $row["owner"];
	}
	function saveData($connid)
	{
		$query="INSERT INTO da_topicMaster SET ".
				"description = '".$this->description."',".
				"subjectno = '".$this->subjectno."',".
				"owner = '".$this->owner."',".
				"entered_by = '".$_SESSION["username"]."'";
		$dbquery = new dbquery($query,$connid);
		echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";
	}
	function updateData($connid)
	{
		$query = "UPDATE da_topicMaster SET description = '".$this->description."',subjectno = '".$this->subjectno."',owner = '".$this->owner."' WHERE  topic_code = '".$this->topic_code."' LIMIT 1 ";
		$dbquery = new dbquery($query,$connid);
		echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";
	}
	function checkDuplicate($connid,$topic_code)
	{
		$condition = "";
		if($topic_code > 0)
			$condition = " AND topic_code != '".$topic_code."' ";

		$query = "SELECT COUNT(*) FROM da_topicMaster WHERE description = '".$this->description."' AND subjectno = '".$this->subjectno."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		//echo $row[0];
		if($row[0] > 0)
			return true;
		else
			return false;
	}
	function validation($connid)
	{
		if($this->description == "")
			$this->error["description"] = "Please enter the topic desription\r\n";
		if($this->subjectno == "")
			$this->error["subjectno"]= "Please enter the subject for the topic\r\n";
		if($this->checkDuplicate($connid,$this->topic_code))
			$this->error["duplicate"] = "This topic has already been entered in the system";
		if(is_array($this->error) && count($this->error) >0)
	        return false;
	    else
	       	return true;
	}
	function getTopicByClassAndSubject($connid,$class="",$subjectno="")
	{
		$arrRet = array();
		$this->setgetvars();
		$this->setpostvars();
		if($this->action == "getTopicDetails" || $this->action == "GenerateTree" || $this->action == "view" || ($class != "" && $subjectno != ""))
		{
			$arrRet = array();
			if($class == "")
				$class = $this->class;
			if($subjectno == "")
				$subjectno = $this->subjectno;

			$query = "SELECT * FROM da_topicMaster WHERE class = '".$class."' AND subjectno = '".$subjectno."' ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["topic_code"]] = $row["description"];
			}
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function getTopicsBySubject($connid,$subjectno,$class="",$flflag="")
	{
		$arrRet = array();
		if($subjectno != "")
		{
			$condition = " WHERE subjectno IN (".$subjectno.") ";
			if($class != "")
				$condition .= " AND find_in_set('".$class."',c.class) > 0 ";
			if($this->flflag == "Y" || $flflag == 'Y')	
				$condition .= "AND c.freelancer = '".$_SESSION["username"]."'";
					
			$query = "SELECT DISTINCT a.topic_code, a.description FROM da_topicMaster a
						LEFT JOIN da_subtopicMaster b ON a.topic_code = b.topic_code
						LEFT JOIN da_subSubTopicMaster c ON b.subtopic_code = c.subtopic_code 
						 ".$condition." ORDER BY a.subjectno,a.description";
			
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				$arrRet[$row["topic_code"]] = $row["description"];
			}
		}
		return $arrRet;
	}
}
?>