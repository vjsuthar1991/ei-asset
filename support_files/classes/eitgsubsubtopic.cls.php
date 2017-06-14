<?php
class clstgsubsubtopic
{
	var $sub_subtopic_code;
	var $subtopic_code;
	var $topic_code;
	var $description;
	var $action;
	var $class;
	var $subjectno;
	var $map_subtopic_code;
	var $linked_subtopic_code;
	function clstgsubsubtopic()
	{
		$this->sub_subtopic_code = "";
		$this->subtopic_code = "";
		$this->topic_code = "";
		$this->description = "";
		$this->action = "";
		$this->class = "";
		$this->subjectno = "";
		$this->map_subtopic_code = "";
		$this->linked_subtopic_code = "";
	}
	function setgetvars()
	{
		if(isset($_GET["subsubtopic_code"])) $this->sub_subtopic_code = $_GET["subsubtopic_code"];
		if(isset($_GET["map_subtopic_code"])) $this->map_subtopic_code = $_GET["map_subtopic_code"];
	}
	function setpostvars()
	{
		if(isset($_POST["clstgsubsubtopic_class"])) $this->class = $_POST["clstgsubsubtopic_class"];
		if(isset($_POST["clstgsubsubtopic_subject"])) $this->subjectno = $_POST["clstgsubsubtopic_subject"];
		if(isset($_POST["clstgsubsubtopic_topic"])) $this->topic_code = $_POST["clstgsubsubtopic_topic"];
		if(isset($_POST["clstgsubsubtopic_subtopic"])) $this->subtopic_code = $_POST["clstgsubsubtopic_subtopic"];
		if(isset($_POST["clstgsubsubtopic_hdnaction"])) $this->action = $_POST["clstgsubsubtopic_hdnaction"];
		if(isset($_POST["clstgsubsubtopic_description"])) $this->description = $_POST["clstgsubsubtopic_description"];
		if(isset($_POST["clstgsubsubtopic_linksubtopiccode"])) $this->linked_subtopic_code = $_POST["clstgsubsubtopic_linksubtopiccode"];
	}
	function getSubSubtopicBySubTopic($connid,$subtopic_code)
	{
		$arrRet = array();
		if($subtopic_code != "" && $subtopic_code != 0)
		{
			$query = "SELECT description,sub_subtopic_code FROM tg_subsubtopicmaster WHERE subtopic_code = '".$subtopic_code."'";
			$dbquery = new dbquery($query,$connid);
			while ($row = $dbquery->getrowarray()) 
			{
				$arrRet[$row["sub_subtopic_code"]] = array("sub_subtopic_code"=>$row["sub_subtopic_code"],
														"description"=>$row["description"]
														);
			}
		}
		return $arrRet;
	}
	function getAllSubSubTopics($connid)
	{
		$query = "SELECT description,sub_subtopic_code,subtopic_code FROM tg_subsubtopicmaster ORDER BY subtopic_code";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["subtopic_code"]][$row["sub_subtopic_code"]] = array("sub_subtopic_code"=>$row["sub_subtopic_code"],
													"description"=>$row["description"]
													);
		}
		return $arrRet;
	}
	function pageAddEditSubsubTopic($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
			{
				if($this->sub_subtopic_code == "" || $this->sub_subtopic_code == 0)
					$this->savedata($connid);		
				else if(is_numeric($this->sub_subtopic_code)) 
					$this->updatedata($connid);
			}
		}
	}
	function linkToSubTopic($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->action == "LinkToSubtopic")
		{
			if($this->validation($connid,1))
			{
				$this->mapData($connid);
				$this->action = "subtopicMappedSuccessfully";
			}
		}
	}
	function deleteMappedData($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->action == "deleteMapping")
		{
			$this->deleteMapData($connid);
			$this->action = "subtopicMappedDeletedSuccessfully";
		}
	}
	function deleteMapData($connid)
	{
		echo $query = "DELETE FROM tg_subtopic_mapping WHERE (old_subtopic_code = '".$this->linked_subtopic_code."' AND new_subtopic_code = '".$this->map_subtopic_code."' ) OR (old_subtopic_code = '".$this->map_subtopic_code."' AND new_subtopic_code = '".$this->linked_subtopic_code."') LIMIT 1";
		$dbquery = new dbquery($query,$connid);
	}
	
	function mapData($connid)
	{
		$query = "INSERT INTO tg_subtopic_mapping SET old_subtopic_code = '".$this->map_subtopic_code."',new_subtopic_code = '".$this->subtopic_code."',entered_by = '".$_SESSION["username"]."',entered_dt = NOW()";
		$dbquery = new dbquery($query,$connid);
	}
	function validation($connid,$flag=0)
	{
		if($this->class == "")
			$this->error["class"] = "Please enter the class for the sub subtopic";
		if($this->subjectno == "") 
			$this->error["subject"] = "Please enter the subject for the sub subtopic";
		if($this->topic_code == "")	
			$this->error["topic"] = "Please enter the topic for the sub subtopic";
		if($this->subtopic_code == "")	
			$this->error["subtopic"] = "Please enter the subtopic for the sub subtopic";
		if($this->description == "" && $flag == 0)
			$this->error["description"] = "Please enter the sub subtopic";
		if($this->checkDuplicate($connid) && $flag == 0)
			$this->error["duplicate"] = "This sub subtopic is already entered in database";
		if($this->checkSubtopicMappingDuplication($connid) && $flag == 1)
			$this->error["alreadyMapped"] = "This subtopic is already mapped with select subtopic";
			
		if(is_array($this->error) && count($this->error) >0)
			return false;
		else 
			return true;
	}
	function checkSubtopicMappingDuplication($connid)
	{
		$query = "SELECT count(*) FROM tg_subtopic_mapping WHERE (old_subtopic_code = '".$this->map_subtopic_code."' AND new_subtopic_code = '".$this->subtopic_code."') OR  (new_subtopic_code = '".$this->map_subtopic_code."' AND old_subtopic_code = '".$this->subtopic_code."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] > 0)
			return true;
		else
			return false;
	}
	function savedata($connid)
	{
		$query = "INSERT INTO tg_subsubtopicmaster SET subtopic_code = '".$this->subtopic_code."',description = '".$this->description."',entered_by = '".$_SESSION["username"]."',entered_dt = NOW()";
		$dbquery = new dbquery($query,$connid);
	}
	function updatedata($connid)
	{
		$query = "UPDATE tg_subsubtopicmaster SET subtopic_code = '".$this->subtopic_code."',description = '".$this->description."',modified_by = '".$_SESSION["username"]."',modified_dt = NOW() WHERE sub_subtopic_code = '".$this->sub_subtopic_code."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
	}
	function retrieveSubsubtopicDetails($connid)
	{
		$this->setgetvars();
		$arrRet = array();
		$query = "SELECT * FROM tg_subsubtopicmaster WHERE sub_subtopic_code = '".$this->sub_subtopic_code."'" ;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		$this->sub_subtopic_code = $row["sub_subtopic_code"];
		$this->description = $row["description"];
		$this->subtopic_code = $row["subtopic_code"];
		$arrTopicClass = $this->getTopicAndClassDetails($connid,$row["subtopic_code"]);
		
		$str = explode("|",$arrTopicClass);
		$this->topic_code = $str[0];
		$this->class = $str[1];
		$this->subjectno = $str[2];
	}
	function getTopicAndClassDetails($connid,$subtopic_code)
	{
		$query = "SELECT topic_code,class FROM tg_subtopicmaster WHERE subtopic_code = '".$subtopic_code."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$subject = $this->getSubjectByTopic($connid,$row["topic_code"]);
		return $row["topic_code"]."|".$row["class"]."|".$subject;
	}
	function getSubjectByTopic($connid,$topic_code)
	{
		$query = "SELECT subjectno FROM tg_topicmaster WHERE topic_code = '".$topic_code."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["subjectno"];
	}
	function checkDuplicate($connid)
	{
		$query = "SELECT count(*) FROM tg_subsubtopicmaster WHERE description = '".$this->description."' AND subtopic_code = '".$this->subtopic_code."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] > 0)
			return true;
		else 
			return false;
	}
	function getAllSubSubTopicForSuggestList($connid)
	{
		$arrRet = array();
		$query = "SELECT DISTINCT description FROM tg_subsubtopicmaster";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = $row["description"];
		}
		return $arrRet;
	}
	function retrieveMappingDetails($connid)
	{
		$query = "SELECT IF(STRCMP(old_subtopic_code,'".$this->map_subtopic_code."') = 0,new_subtopic_code,old_subtopic_code) FROM tg_subtopic_mapping WHERE old_subtopic_code= '".$this->map_subtopic_code."' OR new_subtopic_code = '".$this->map_subtopic_code."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] != "")
		{
			$queryDtls = "SELECT * FROM tg_subtopicmaster WHERE subtopic_code = '".$row[0]."'";
			$dbqueryDtls = new dbquery($queryDtls,$connid);
			$rowDtls = $dbqueryDtls->getrowarray();
			$this->class = $rowDtls["class"];
			$this->topic_code = $rowDtls["topic_code"];
			$this->subtopic_code = $rowDtls["subtopic_code"];
		}
	}
	function getMappedSubtopicList($connid)
	{
		$this->setgetvars();
		$arrRet = array();
		$query = "SELECT new_subtopic_code as stCode,tg_subtopicmaster.description as subtopic,tg_topicmaster.description as topic,class FROM tg_subtopic_mapping,tg_subtopicmaster,tg_topicmaster WHERE tg_subtopic_mapping.new_subtopic_code = tg_subtopicmaster.subtopic_code AND tg_subtopicmaster.topic_code = tg_topicmaster.topic_code AND old_subtopic_code = '".$this->map_subtopic_code."'";
		$query.=" UNION SELECT old_subtopic_code as stCode,tg_subtopicmaster.description as subtopic,tg_topicmaster.description as topic,class FROM tg_subtopic_mapping,tg_subtopicmaster,tg_topicmaster WHERE tg_subtopic_mapping.old_subtopic_code = tg_subtopicmaster.subtopic_code AND tg_subtopicmaster.topic_code = tg_topicmaster.topic_code AND new_subtopic_code = '".$this->map_subtopic_code."'";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["stCode"]] = array("stCode"=>$row["stCode"],
											"topic"=>$row["topic"],
											"class"=>$row["class"],
											"subtopic"=>$row["subtopic"]
			);
		}
		return $arrRet;
	}
}


?>