<?php
class clstgtopic
{
        var $topic_code;
        var $description;
        var $subjectno;
        var $action;
        var $classes;
        
        function clstgtopic()
        {
                $this->topic_code = "";
                $this->description = "";
                $this->subjectno = "";
                $this->action = "";
                $this->classes = "";
        }
        function setgetvars()
        {
                if(isset($_GET["topic_code"])) $this->topic_code = $_GET["topic_code"];
        }
        function setpostvars()
        {
                if(isset($_POST["clstgtopic_topiccode"])) $this->topic_code = $_POST["clstgtopic_topiccode"];
                if(isset($_POST["clstgtopic_description"])) $this->description = $_POST["clstgtopic_description"];
                if(isset($_POST["clstgtopic_subjectno"])) $this->subjectno = $_POST["clstgtopic_subjectno"];
                if(isset($_POST["clstgtopic_hdnaction"])) $this->action = $_POST["clstgtopic_hdnaction"];
                if(isset($_POST["clstgtopic_classes"])) $this->classes = $_POST["clstgtopic_classes"];
        }

        function getAllSubjects($connid)
        {
                $arrRet = array();
                $query = "SELECT * FROM tg_subjectmaster ";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray()) 
                {
                        $arrRet[$row["subjectno"]] = array("subjectno"=>$row["subjectno"],
                                                                                        "description"=>$row["description"]
                                                                                        );
                }
                return $arrRet;
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
                                        $this->savedata($connid);
                                else if($this->topic_code != "" && $this->topic_code != 0)
                                        $this->updatedata($connid);
                        }
                }
        }
        function updatedata($connid)
        {
                $query = "UPDATE tg_topicmaster SET ".
                                "description = '".$this->description."',".
                                "subjectno = '".$this->subjectno."',".
                                "modified_by = '".$_SESSION["username"]."',".
                                "modified_dt = NOW(),".
                                "classes = '".$this->classes."' WHERE topic_code = '".$this->topic_code."' LIMIT 1";
                $dbquery = new dbquery($query,$connid);
                //echo "Your Topic has been successfully updated";
        }
        function savedata($connid)
        {
                $arrParentSubject = array("1"=>"1","2"=>"2","3"=>"3","4"=>"3","5"=>"3","6"=>"3");
                $query = "INSERT INTO tg_topicmaster SET ".
                                "description = '".$this->description."',".
                                "parent_subjectno = '".$arrParentSubject[$this->subjectno]."',".
                                "subjectno = '".$this->subjectno."',".
                                "entered_by = '".$_SESSION["username"]."',".
                                "entered_dt = NOW(),".
                                "classes = '".$this->classes."'";
                $dbquery = new dbquery($query,$connid);
        }
        
        function validation($connid)
        {
                if($this->description == "")
                        $this->error["description"] = "Please enter the topic";
                if($this->subjectno == "")
                        $this->error["subjectno"] = "Please enter the subject";
                if($this->classes == "")
                        $this->error["classes"] = "Please enter the classes";
                if($this->checkDuplicate($connid))
                        $this->error["duplicate"] = "This topic is already entered in database";
                                
                if(is_array($this->error) && count($this->error) >0)
                        return false;
                else 
                        return true;
        }
		function getAllTopics($connid,$subjectno)
        {
                $arrRet = array();
                if($subjectno == 3)
                        $query = "SELECT * FROM tg_topicmaster WHERE parent_subjectno = '".$subjectno."'";
                else 
                        $query = "SELECT * FROM tg_topicmaster WHERE subjectno = '".$subjectno."'";
                //$query = "SELECT * FROM tg_topicmaster ORDER BY subjectno";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray()) 
                {
                        //$arrRet[$row["subjectno"]][] = array("topic_code"=>$row["topic_code"],"classes"=>$row["classes"],"description"=>$row["description"],"subjectno"=>$row["subjectno"],"parent_subjectno"=>$row["parent_subjectno"]);
                        $arrRet[$row["topic_code"]] = array("topic_code"=>$row["topic_code"],
                        									"description"=>$row["description"]
                        );
                }
                /*echo "<pre>";
                print_r($arrRet);
                echo "<pre>";
                exit;*/
                return $arrRet;
        }
        function retrieveTopicDetails($connid)
        {
                $this->setgetvars();
                $query = "SELECT * FROM tg_topicmaster WHERE topic_code = '".$this->topic_code."'";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                $this->description = $row["description"];
                $this->subjectno = $row["subjectno"];
                $this->classes = $row["classes"];
        }
        function checkDuplicate($connid)
        {
                $query = "SELECT count(*) FROM tg_topicmaster WHERE description = '".$this->description."' AND subjectno = '".$this->subjectno."'";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                if($row[0] > 0)
                        return true;
                else 
                        return false;
        }
        function getAllTopicForSuggestList($connid)
        {
                $arrRet = array();
                $query = "SELECT topic_code,description FROM tg_topicmaster ORDER BY description";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray()) 
                {
                        $arrRet[$row["topic_code"]] = array("description"=>$row["description"],
                        									"topic_code"=>$row["topic_code"]
                        );
                }
                return $arrRet;
        }
}
?>
