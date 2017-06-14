<?php
class clstgsubtopic
{
    var $subtopic_code;
    var $topic_code;
    var $description;
    var $action;
    var $class;
    var $subjectno;
    
    function clstgsubtopic()
    {
        $this->subtopic_code = "";
        $this->topic_code = "";
        $this->description = "";
        $this->action = "";
        $this->class = "";
        $this->subjectno = "";
    }
    function setgetvars()
    {
        if(isset($_GET["subtopic_code"])) $this->subtopic_code = $_GET["subtopic_code"];
    }
    function setpostvars()
    {
        if(isset($_POST["clstgsubtopic_class"])) $this->class = $_POST["clstgsubtopic_class"];
        if(isset($_POST["clstgsubtopic_subject"])) $this->subjectno = $_POST["clstgsubtopic_subject"];
        if(isset($_POST["clstgsubtopic_topic"])) $this->topic_code = $_POST["clstgsubtopic_topic"];
        if(isset($_POST["clstgsubtopic_hdnaction"])) $this->action = $_POST["clstgsubtopic_hdnaction"];
        if(isset($_POST["clstgsubtopic_description"])) $this->description = $_POST["clstgsubtopic_description"];
    }
    function getSubtopicByTopic($connid,$topic_code,$class)
    {
        $arrRet = array();
        $query = "SELECT description,subtopic_code,class FROM tg_subtopicmaster WHERE topic_code = '".$topic_code."' AND class = '".$class."'";
        $dbquery = new dbquery($query,$connid);
        while ($row = $dbquery->getrowarray()) 
        {
                $arrRet[$row["subtopic_code"]] = array("subtopic_code"=>$row["subtopic_code"],
                                                        "description"=>$row["description"],
                                                        "class"=>$row["class"]
                                                        );
        }
        return $arrRet;
    }
    function pageAddEditSubTopic($connid)
    {
        $this->setpostvars();
		//$this->setgetvars();
        
        if($this->action == "SaveData")
        {
                if($this->validation($connid))
                {
                        if($this->subtopic_code == "" || $this->subtopic_code == 0)
                                $this->savedata($connid);                
                        else if(is_numeric($this->subtopic_code)) 
                                $this->updatedata($connid);
                }
        }
    }
    function validation($connid)
    {
        if($this->class == "")
                $this->error["class"] = "Please enter the class for the subtopic";
        if($this->subjectno == "") 
                $this->error["subject"] = "Please enter the subject for the subtopic";
        if($this->topic_code == "")        
                $this->error["topic"] = "Please enter the topic for the subtopic";
        if($this->description == "")
                $this->error["description"] = "Please enter the subtopic";
        if(($this->subtopic_code == "" || $this->subtopic_code == 0) && $this->checkDuplicate($connid))
                $this->error["duplicate"] = "This subtopic is already entered in database";
                
        
        if(is_array($this->error) && count($this->error) >0)
                return false;
        else 
                return true;
    }
    function savedata($connid)
    {
        $query = "INSERT INTO tg_subtopicmaster SET topic_code = '".$this->topic_code."',description = '".$this->description."',class = '".$this->class."',entered_by = '".$_SESSION["username"]."',entered_dt = NOW()";
        $dbquery = new dbquery($query,$connid);
    }
    function updatedata($connid)
    {
        $query = "UPDATE tg_subtopicmaster SET topic_code = '".$this->topic_code."',description = '".$this->description."',class = '".$this->class."',modified_by = '".$_SESSION["username"]."',modified_dt = NOW() WHERE subtopic_code = '".$this->subtopic_code."' LIMIT 1";
		if($_SESSION["username"] == "jaspreet")
			echo $query;
        $dbquery = new dbquery($query,$connid);
    }
    function getAllSubtopic($connid)
    {
        $arrRet = array();
        $query = "SELECT subtopic_code,description,class,topic_code FROM tg_subtopicmaster ORDER BY topic_code";
        $dbquery = new dbquery($query,$connid);
        while($row = $dbquery->getrowarray())
        {
                $arrRet[$row["topic_code"]][] = array("topic_code"=>$row["topic_code"],"subtopic_code"=>$row["subtopic_code"],"class"=>$row["class"]);
        }
        return $arrRet;
    }
    function retrieveSubTopicDetails($connid)
    {
        $this->setgetvars();
        $query = "SELECT * FROM tg_subtopicmaster WHERE subtopic_code = '".$this->subtopic_code."'";
        $dbquery = new dbquery($query,$connid);
        $row = $dbquery->getrowarray();
        $this->description = $row["description"];
        $this->subjectno = $this->getSubjectByTopic($connid,$row["topic_code"],$row["class"]);
        $this->topic_code = $row["topic_code"];
        $this->class = $row["class"];
    }
    function getSubjectByTopic($connid,$topic_code,$class)
    {
        $query = "SELECT subjectno,parent_subjectno FROM tg_topicmaster WHERE topic_code = '".$topic_code."'";
        $dbquery = new dbquery($query,$connid);
        $row = $dbquery->getrowarray();
		if($class <= 5)
        	return $row["parent_subjectno"];
		else
			return $row["subjectno"];
    }
    function checkDuplicate($connid)
    {
        $query = "SELECT count(*) FROM tg_subtopicmaster WHERE description = '".$this->description."' AND topic_code = '".$this->topic_code."' AND class = '".$this->class."'";
        $dbquery = new dbquery($query,$connid);
        $row = $dbquery->getrowarray();
        if($row[0] > 0)
                return true;
        else 
                return false;
    }
    function getAllSubTopicForSuggestList($connid)
    {
        $arrRet = array();
        $query = "SELECT DISTINCT description FROM tg_subtopicmaster";
        $dbquery = new dbquery($query,$connid);
        while($row = $dbquery->getrowarray())
        {
                $arrRet[] = $row["description"];
        }
        return $arrRet;
    }
}
?>