<?php
class clstgquestions
{
        var $qcode;
        var $question;
        var $answer;
        var $subjectno;
        var $class;
        var $questtype;
        var $topic_code;
        var $subtopic_code;
        var $level;
        var $ei_marks;
        var $groupid;
        var $category;
        var $qmaker;
        var $reference;
        var $content_std;
        var $image_description;
        var $status;
        var $current_allotted;
        var $source;
        var $permission;
        var $created_date;
        var $modified_date;
        var $setsubTopic;
        var $difficultylevel;
        var $marks; 
        function clstgquestions()
        {
                $this->qcode = 0;
                $this->question = "";
                $this->answers = "";
                $this->subjectno = 0;
                $this->class = 0;
                $this->questtype = "";
                $this->topic_code = 0;
                $this->subtopic_code = 0;
                $this->level = "";
                $this->ei_marks = "";
                $this->groupid = 0;
                $this->category = "";
                $this->qmaker = "";
                $this->reference = "";
                $this->content_std = "";
                $this->image_description = "";
                $this->status = "";
                $this->current_allotted = "";
                $this->source = "";
                $this->permission = "";
                $this->created_date = "0000-00-00 00:00:00";
                $this->modified_date = "0000-00-00 00:00:00";
                $this->setsubTopic = "";
                $this->difficultylevel = "";
                $this->marks = "";
        }
        function setpostvars()
        {
                if(isset($_POST["clstgquestions_hdnaction"])) $this->action = $_POST["clstgquestions_hdnaction"];
                if(isset($_POST["clstgquestions_topic"])) $this->topic_code = $_POST["clstgquestions_topic"];
                if(isset($_POST["clstgquestions_subtopic"])) $this->subtopic_code = $_POST["clstgquestions_subtopic"];
                if(isset($_POST["clstgquestions_hdnsubtopic"])) $this->setsubTopic = $_POST["clstgquestions_hdnsubtopic"];
                if(isset($_POST["clstgquestions_questtype"])) $this->questtype = $_POST["clstgquestions_questtype"];
                if(isset($_POST["clstgquestions_question"])) $this->question = $_POST["clstgquestions_question"];
                if(isset($_POST["clstgquestions_answer"])) $this->answer = $_POST["clstgquestions_answer"];
    			if(isset($_POST["clstgquestions_difficultylevel"])) $this->difficultylevel = $_POST["clstgquestions_difficultylevel"];
                if(isset($_POST["clstgquestions_marks"])) $this->marks = $_POST["clstgquestions_marks"];
                if(isset($_POST["clstgquestions_subject"])) $this->subjectno = $_POST["clstgquestions_subject"];
                if(isset($_POST["clstgquestions_class"])) $this->class = $_POST["clstgquestions_class"];
        }
        function pageAddQuestion($connid)
        {
        	$this->setpostvars();
        	if($this->action == "SaveData")
        	{
        		if($this->validation($connid))
        		{
        			$this->savedata($connid);
        			echo "<script language=\"javascript\">window.location=\"index.php\"</script>";
        		}
        		
        	}
        }
        function validation($connid)
        {
          if($this->question == "")
            $this->error["question"] = "Please enter the question details";
          if($this->answer == "")
            $this->error["answer"] = "Please enter the answer of the question";
          
          if(is_array($this->error) && count($this->error) > 0)
          {
            return false;
          }
          else
          {
            return true;
          }
            
        }
        function getTeacherUsername($connid)
        {
          $query = "SELECT username FROM tg_teacherdetails WHERE teacher_id =  '".$_SESSION["userid"]."'";
          $dbquery = new dbquery($query,$connid);
          $row = $dbquery->getrowarray();
          return $row["username"];
        }
        function savedata($connid)
        {
        	$arrRet = array();
        	$condition = "";
        	$this->qmaker = $this->getTeacherUsername($connid);
        	
        	if($this->subjectno == "4" || $this->subjectno == "5" || $this->subjectno == "6")
	        {
	                 $condition = "parent_subjectno = '3',";
	                 $subject = "3";
	        }
	        else
	        {
	                 $condition = "parent_subjectno = '".$this->subjectno."',";
	                 $subject = $this->subjectno;
	        }
        	$current_alloted = $this->calculateCurrentAlloter($connid,$this->class,$subject);
        	if($this->qmaker != "")
			{
				$query = "INSERT INTO tg_questions ".
                     "SET question = '".$this->question."',".
                     "answer = '".$this->answer."',".
                     "class = '".$this->class."',".
                     "topic_code = '".$this->topic_code."',".
                     "subtopic_code = '".$this->subtopic_code."',".
                     "ei_marks = '".$this->marks."',".
                     "questtype = '".$this->questtype."',".
                     "level = '".$this->difficultylevel."',".
                     "qmaker = '".$this->qmaker."',".
                     "current_alloted = '".$current_alloted."',".
                     "first_alloted = '".$current_alloted."',".
                     "status = '1',".$condition.
                     "subjectno = '".$this->subjectno."',";

			    /*if(isset($this->no_of_questions) && $this->no_of_questions != " ")
			                   $query.= "groupid = '".$groupid."',";*/
			
			    $query.=  "difficulty_level = '".$this->difficultylevel."',".
			                     "created_date = NOW()";
			    //echo $query;
			    $dbquery = new dbquery($query,$connid);
			}
			else
			{
				echo "<script language=\"javascript\">window.location=\"tgteacher_login.php\"</script>";
			}
        }
        function calculateCurrentAlloter($connid,$class,$subject)
        {
                $arrRet = array();
                $query = "SELECT userID,alloted FROM tg_allotmentmaster WHERE class = '".$class."' AND subjectno = '".$subject."' AND userID != '".$_SESSION["username"]."' AND target != 0";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        //echo $row["userID"];
                       $count = $this->getTotalNoOfQuesByClassSubjectQmaker($connid,$class,$subject,$row["userID"]);
                       /*if($count == 0)
                               $count = 1;
                       $percentage = ($row["alloted"]/$count)*100;
                       $arrRet[$row["userID"]] = $percentage;*/
                       $arrRet[$row["userID"]] = $count;
                 }

                asort($arrRet);
                /*echo "<pre>";
                print_r($arrRet);
                echo "</pre>";*/
                $arrNames = array_keys($arrRet);
                       return $arrNames[0];
        }

        function getTotalNoOfQuesByClassSubjectQmaker($connid,$class,$subject,$qmaker)
        {
            $arrRet = array();

            $query = "SELECT count(*) FROM tg_questions WHERE parent_subjectno = '".$subject."' AND class = '".$class."' AND current_alloted = '".$qmaker."' ";
             
                        $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            return $row[0];
        }
        function getQuestionsByTopicSubTopic($connid,$class)
        {
                $this->setpostvars();
                $arrRet = array();
                $papercode = "0";
                $qno = "0";
                $option_string = "";
                //echo $_SESSION["userid"];
                $condtion = "";
                $this->qmaker = $this->getTeacherUsername($connid);
                $classStr = -1;
                $preClass = -1;
                $postClass = -1;
                $subtopicStr = -1;
				if($this->questtype != "")
				 $condition = " AND questtype =  '".$this->questtype."' ";
                 $queryS = "SELECT description FROM tg_subtopicmaster WHERE (subtopic_code = '".$this->subtopic_code."' OR subtopic_code = '".$this->setsubTopic."')";
                $dbqueryS = new dbquery($queryS,$connid);
                $rowS = $dbqueryS->getrowarray();
                $preClass = $class - 1;
                $curClass = $class;
                $postClass = $class + 1;
                
                $classStr = $preClass.",".$curClass.",".$postClass;
                $query1 = "SELECT subtopic_code FROM tg_subtopicmaster WHERE description = '".$rowS["description"]."' AND topic_code = '".$this->topic_code."' AND class IN (".$classStr.") ";
                $dbquery1 = new dbquery($query1,$connid);
                while($row1 = $dbquery1->getrowarray())
                {
                  $subtopicStr.=",".$row1["subtopic_code"];
                } 
				$arrMappedSubtopic = $this->getMappedSubtopicList($connid,$this->subtopic_code,$this->setsubTopic);
				$strMappedSubtopic = implode(',',$arrMappedSubtopic);
                 $query = "SELECT qcode,question,ei_marks,image_description,status,bench_mark,qmaker,groupid FROM tg_questions WHERE class IN (".$classStr.") AND topic_code = '".$this->topic_code."' AND subtopic_code IN (".$subtopicStr.") AND status = 5 ".$condition." AND groupid = 0 ";
                $query.= " UNION SELECT qcode,question,ei_marks,image_description,status,bench_mark,qmaker,groupid FROM tg_questions WHERE class IN (".$classStr.") AND topic_code = '".$this->topic_code."' AND subtopic_code IN (".$subtopicStr.") AND status = 5 AND groupid != 0 ";
                $query.=" UNION SELECT qcode,question,ei_marks,image_description,status,bench_mark,qmaker,groupid FROM tg_questions WHERE qmaker = '".$this->qmaker."' AND status NOT IN (5,6) AND class = '".$class."' AND topic_code = '".$this->topic_code."' AND (subtopic_code = '".$this->subtopic_code."' OR subtopic_code = '".$this->setsubTopic."') ".$condition." ";
				if($strMappedSubtopic != "")
				$query.=" UNION SELECT qcode,question,ei_marks,image_description,status,bench_mark,qmaker,groupid FROM tg_questions WHERE subtopic_code IN (".$strMappedSubtopic.") AND subtopic_code NOT IN (".$subtopicStr.") AND status = 5 ".$condition." AND subtopic_code != '".$this->subtopic_code."' AND subtopic_code != '".$this->setsubTopic."'";
				
				$query.=" ORDER BY groupid ";
                //echo $query;
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray()) 
                {
                        if($row["bench_mark"] != "")
                        {
                                $arrPaperQno = explode('-',$row["bench_mark"]);
                                $papercode = $arrPaperQno[0];
                                $qno = $arrPaperQno[1];
                                $option_string = $this->getPerformanceStringForBenchMarkQuestions($connid,$papercode,$qno);
                        }
                        
                        $arrRet[$row["qcode"]] = array("qcode"=>$row["qcode"],
	                                                    "question"=>$row["question"],
	                                                    "ei_marks"=>$row["ei_marks"],
	                                                    "image_description"=>$row["image_description"],
	                                                    "status"=>$row["status"],
	                                                    "bench_mark"=>$row["bench_mark"],
	                                                    "options_string"=>$option_string,
	                                                    "qmaker"=>$row["qmaker"],
	                                                    "groupid"=>$row["groupid"]
	                                                    )         ;
                }
                //print_r($arrRet);
                return $arrRet;
        }
        function getGroupDetailsByGroupID($connid,$groupid)
        {
                $query = "SELECT grouptext FROM tg_groupmaster WHERE groupid = '".$groupid."'";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                return $row["grouptext"];
        }
        function getGroupDetails($connid)
        {
                $arrRet = array();
                $condition = "";
                $query = "SELECT count(qcode) as count,tg_questions.groupid FROM tg_questions,tg_groupmaster WHERE tg_questions.groupid = tg_groupmaster.groupid AND tg_questions.groupid != '' AND tg_questions.groupid != 0 AND tg_groupmaster.grouptext != '' ".$condition." AND status = '5' GROUP BY tg_questions.groupid";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["groupid"]] = $row["count"];
                }
                return $arrRet;
        }
        function getPerformanceStringForBenchMarkQuestions($connid,$papercode,$qno)
        {
                $query = "SELECT option_a,option_b,option_c,option_d FROM correct_answers ".
                                 "WHERE papercode = '".$papercode."' ".
                                 "AND qno = '".$qno."' LIMIT 1";
                                 round(1.95583, 2);  
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                $str = "A:".round($row["option_a"],1)."%&nbsp;&nbsp;&nbsp;&nbsp;B:".round($row["option_b"],1)."%&nbsp;&nbsp;&nbsp;&nbsp;C:".round($row["option_c"],1)."%&nbsp;&nbsp;&nbsp;&nbsp;D:".round($row["option_d"],1);
                return $str;
        }
        function getQuestionTypeBySubject($connid,$subject)
		{
			$arrRet = array();
	        $query = "SELECT code,instruction,subjectlist FROM tg_questypemaster";
	        $dbquery = new dbquery($query,$connid);
	
	        while($row = $dbquery->getrowarray())
	        {
	                if(strlen($row["subjectlist"]) == 1)
	                {
	                        if($subject == $row["subjectlist"])
	                        {
	                                $arrRet[$row["code"]] = array("code"=>$row["code"],"instruction"=>$row["instruction"]);
	                        }
	                }
	                else
	                {
	                        $arrSubjectList = explode(',',$row["subjectlist"]);
	                        if(in_array($subject,$arrSubjectList))
	                        {
	                                $arrRet[$row["code"]] = array("code"=>$row["code"],"instruction"=>$row["instruction"]);
	                        }
	                }
	        }
			//print_r($arrRet);
	        return $arrRet;
		}
		function getQuestionTypeBySubject1($connid,$subject,$class)
		{
			$arrRet = array();
			$this->setpostvars();
			$classStr = -1;
            $preClass = -1;
            $postClass = -1;
            $queryS = "SELECT description FROM tg_subtopicmaster WHERE (subtopic_code = '".$this->subtopic_code."' OR subtopic_code = '".$this->setsubTopic."')";
            $dbqueryS = new dbquery($queryS,$connid);
            $rowS = $dbqueryS->getrowarray();
            $preClass = $class - 1;
            $curClass = $class;
            $postClass = $class + 1;
            $classStr = $preClass.",".$curClass.",".$postClass;
			$arrQuestionType = $this->getQTypeWithCountByTopicSubtopic($connid,$subject,$class);
			$arrMappedSubtopics = $this->getMappedSubtopicList($connid,$this->subtopic_code,$this->setsubTopic);
			$arrMappedTopics = $this->getTopicsMappedSubtopic($connid,$this->subtopic_code,$this->setsubTopic);
			$query = "SELECT code,instruction,subjectlist FROM tg_questypemaster";
	        $dbquery = new dbquery($query,$connid);
	         $query1 = "SELECT subtopic_code FROM tg_subtopicmaster WHERE description = '".$rowS["description"]."' AND topic_code = '".$this->topic_code."' AND class IN (".$classStr.") ";
            $dbquery1 = new dbquery($query1,$connid);
            while($row1 = $dbquery1->getrowarray())
            {
              $subtopicStr.=",".$row1["subtopic_code"];
            } 
	        while($row = $dbquery->getrowarray())
	        {
	            $count = 0; 
	             $arrSubtopicDtls = explode(',',$subtopicStr);
	            foreach ($arrSubtopicDtls as $key => $value) 
	            {
	            	 if($arrQuestionType[$this->topic_code][$value][$row["code"]] != "")
	                	$count = $count + $arrQuestionType[$this->topic_code][$value][$row["code"]];
	            }	
				foreach($arrMappedSubtopics as $mapped => $SubtopicCode)
				{
					 
					 if($arrQuestionType[$arrMappedTopics[$SubtopicCode]][$SubtopicCode][$row["code"]] != "" && !($arrMappedTopics[$SubtopicCode] != $this->topic_code && !in_array($SubtopicCode,$arrSubtopicDtls) ))
					 {
					 	//echo "checking the subtopic....";
						$count = $count + $arrQuestionType[$arrMappedTopics[$SubtopicCode]][$SubtopicCode][$row["code"]];
					 }
	                	
				}                	
	        		if(strlen($row["subjectlist"]) == 1)
	                {
	                        if($subject == $row["subjectlist"])
	                        {
	                                $arrRet[$row["code"]] = array("code"=>$row["code"],"instruction"=>$row["instruction"],"count"=>$count);
	                        }
	                }
	                else
	                {
	                        $arrSubjectList = explode(',',$row["subjectlist"]);
	                        if(in_array($subject,$arrSubjectList))
	                        {
	                                
	                        		$arrRet[$row["code"]] = array("code"=>$row["code"],"instruction"=>$row["instruction"],"count"=>$count);
	                        }
	                }
	        }
			//print_r($arrRet);
	        return $arrRet;
		}
		function getQTypeWithCountByTopicSubtopic($connid,$subject,$class)
        {
        	$arrRet = array();
                $strQcode = -1;
        	$classStr = -1;
            $preClass = -1;
            $postClass = -1;
        	if($subject == '3')
        		$condition = " AND parent_subjectno = '".$subject."' ";
        	else 
        		$condition = " AND subjectno = '".$subject."' ";	
        	$preClass = $class - 1;
            $curClass = $class;
            $postClass = $class + 1;
            $this->qmaker = $this->getTeacherUsername($connid);
			if($_SESSION["paperid"] != "" && $_SESSION["paperid"] != 0)
			{
				$queryPaper = "SELECT qcode FROM tg_paperdetails WHERE paper_id = '".$_SESSION["paperid"]."'";
				$dbqueryPaper = new dbquery($queryPaper,$connid);
				while($rowPaper = $dbqueryPaper->getrowarray())
				{
					$strQcode.=",".$rowPaper["qcode"];
				}
				
			}
            $classStr = $preClass.",".$curClass.",".$postClass;	
        	$arrClassMappedStr = $this->getClassesMappedSubtopic($connid,$this->subtopic_code,$this->setsubTopic);
			$strClassMappedStr = implode(',',$arrClassMappedStr);
			if($strClassMappedStr != "")
				$classStr.=",".$strClassMappedStr; 
        	$query = "SELECT count(*) as count, questtype,topic_code,subtopic_code ".
					 "FROM tg_questions ".
					 "WHERE questtype != '' AND (status = 5 OR qmaker = '".$this->qmaker."' ) ".
					 "AND class IN (".$classStr.") ".$condition." AND qcode NOT IN (".$strQcode.") ".
					 "GROUP BY questtype,topic_code,subtopic_code ";
			$dbquery = new dbquery($query,$connid);		
			while($row = $dbquery->getrowarray()) 
			{
				 $arrRet[$row["topic_code"]][$row["subtopic_code"]][$row["questtype"]]= $row["count"];
			} 
			/*echo "<pre>";
			print_r($arrRet);
			echo "</pre>";*/
			return $arrRet;
        }
        function getAllTopicsF($connid)
        {
                $arrRet = array();
                /*if($subjectno == 3)
                        $query = "SELECT * FROM tg_topicmaster WHERE parent_subjectno = '".$subjectno."'";
                else
                        $query = "SELECT * FROM tg_topicmaster WHERE subjectno = '".$subjectno."'";*/
                $query = "SELECT * FROM tg_topicmaster ORDER BY subjectno";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray())
                {
                    if($row["subjectno"] == 4 || $row["subjectno"] == 5 || $row["subjectno"] == 6)
                    {
                                                $arrRet[$row["parent_subjectno"]][] = array("topic_code"=>$row["topic_code"],"classes"=>$row["classes"],"description"=>$row["description"],"subjectno"=>$row["subjectno"],"parent_subjectno"=>$row["parent_subjectno"]);
                    }
                        $arrRet[$row["subjectno"]][] = array("topic_code"=>$row["topic_code"],"classes"=>$row["classes"],"description"=>$row["description"],"subjectno"=>$row["subjectno"],"parent_subjectno"=>$row["parent_subjectno"]);
                }
                /*echo "<pre>";
                print_r($arrRet);
                echo "<pre>";
                exit;*/
                return $arrRet;
        }
        function getAllSubSubTopicsF($connid)
        {
                $query = "SELECT description,sub_subtopic_code,subtopic_code FROM tg_subsubtopicmaster ORDER BY subtopic_code";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["subtopic_code"]][] = array("sub_subtopic_code"=>$row["sub_subtopic_code"],
                                                                                                        "description"=>$row["description"]
                                                                                                        );
                }
                return $arrRet;
        }
        function getAllSubtopicF($connid)
        {
                $arrRet = array();
                $query = "SELECT subtopic_code,description,class,topic_code FROM tg_subtopicmaster ORDER BY topic_code";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["topic_code"]][] = array("topic_code"=>$row["topic_code"],"subtopic_code"=>$row["subtopic_code"],"class"=>$row["class"],"description"=>$row["description"]);
                }
                return $arrRet;
        }
        function getQuestionTypeF($connid)
        {
                $arrRet = array();
                $query = "SELECT code,instruction,subjectlist FROM tg_questypemaster ";
                $dbquery = new dbquery($query,$connid);

                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["code"]] = array("code"=>$row["code"],
                                                                                  "instruction"=>$row["instruction"],
                                                                                  "subjectlist"=>$row["subjectlist"]
                                                                        );
                }

                return $arrRet;
        }
        function getTopicsBySubject($connid)
	    {
	       $this->setpostvars();
	       $arrRet = array();
	       if($this->subjectno == "3")
	               $query = "SELECT topic_code,description,classes FROM tg_topicmaster WHERE subjectno IN (3,4,5,6)";
	       else
	               $query = "SELECT topic_code,description,classes FROM tg_topicmaster WHERE subjectno = '".$this->subjectno."'";
	
	       $dbquery = new dbquery($query,$connid);
	       while($row = $dbquery->getrowarray())
	       {
	            if(strlen($row["classes"]) == 1)
	                        {
	                                if($this->class == $row["classes"])
	                                {
	                                        $arrRet[$row["topic_code"]] = array("topic_code"=>$row["topic_code"],"description"=>$row["description"]);
	                                }
	                        }
	                        else
	                        {
	                                $arrClasses = explode(',',$row["classes"]);
	                                if(in_array($this->class,$arrClasses))
	                                {
	                                        $arrRet[$row["topic_code"]] = array("topic_code"=>$row["topic_code"],"description"=>$row["description"]);
	                                }
	                        }
	       }
	      return $arrRet;
	    }
	    function getSubTopicByTopicAndClass($connid,$topic_code,$class)
	    {
            $this->setpostvars();
            $arrRet = array();
            $condition = "AND class = '".$class."'";
            if($class == 'All' )
                    $condition = "";
                    
            $query = "SELECT subtopic_code,description FROM tg_subtopicmaster WHERE topic_code = '".$topic_code."' ".$condition." ORDER BY class ";
            //exit;
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                    $arrRet[$row["subtopic_code"]] = array("subtopic_code"=>$row["subtopic_code"],
                                                                                              "description"=>$row["description"]
                                                                                            );
            }
           /* echo "<pre>";
                        print_r($arrRet);
                        echo "</pre>";*/
            return $arrRet;
	    }
	    function getDifficultyLevels($connid)
	    {
	       $arrRet = array();
	       $query = "SELECT id,description FROM tg_difficultylevel";
	       $dbquery = new dbquery($query,$connid);
	        while($row = $dbquery->getrowarray())
	        {
	            $arrRet[$row["id"]] = array("id"=>$row["id"],
	                                        "description"=>$row["description"]
	                                    );
	        }
	        return $arrRet;
	    }
	    function getQuestionType($connid)
        {
                $this->setpostvars();
                $arrRet = array();
                $query = "SELECT code,instruction,subjectlist FROM tg_questypemaster";
                $dbquery = new dbquery($query,$connid);

                while($row = $dbquery->getrowarray())
                {
                        if(strlen($row["subjectlist"]) == 1)
                        {
                                if($this->subjectno == $row["subjectlist"])
                                {
                                        $arrRet[$row["code"]] = array("code"=>$row["code"],"instruction"=>$row["instruction"]);
                                }
                        }
                        else
                        {
                                $arrSubjectList = explode(',',$row["subjectlist"]);
                                if(in_array($this->subjectno,$arrSubjectList))
                                {
                                        $arrRet[$row["code"]] = array("code"=>$row["code"],"instruction"=>$row["instruction"]);
                                }
                        }
                }
                        //print_r($arrRet);
                return $arrRet;
        }
		function getApprovedQuestionsByTeacherID($connid)
		{
			$arrRet = array();
			$this->qmaker = $this->getTeacherUsername($connid);
			/*$query = "SELECT tg_questions.*,tg_topicmaster.description as topic,tg_groupmaster.grouptext as grpdescription,tg_questypemaster.instruction as questiontype,".
					 "tg_subtopicmaster.description as subtopic FROM tg_questions ".
					 "LEFT JOIN tg_groupmaster ON tg_questions.groupid = tg_groupmaster.groupid ".
					 "LEFT JOIN tg_topicmaster ON tg_questions.topic_code = tg_topicmaster.topic_code ".
					 "LEFT JOIN tg_subtopicmaster ON tg_questions.subtopic_code = tg_subtopicmaster.subtopic_code ".
					 "LEFT JOIN tg_questypemaster ON tg_questions.questtype = tg_questypemaster.code ".
					 "WHERE ((qmaker = '".$this->qmaker."' AND status = '5') OR (copied_from IN (SELECT qcode FROM tg_questions WHERE qmaker = '".$this->qmaker."' AND used_status = 1) )) ORDER BY qcode,groupid DESC ".
					 "";*/
			$query = "SELECT tg_questions.*,tg_topicmaster.description as topic,tg_questypemaster.instruction as questiontype,tg_subtopicmaster.description as subtopic ".
					 "FROM tg_questions,tg_topicmaster,tg_subtopicmaster,tg_questypemaster WHERE tg_questions.topic_code = tg_topicmaster.topic_code AND tg_questions.subtopic_code = tg_subtopicmaster.subtopic_code AND tg_questions.questtype = tg_questypemaster.code ".
					 "AND (
					 		(qmaker = '".$this->qmaker."' AND status = '5') 
								OR (copied_from IN (SELECT qcode FROM tg_questions WHERE qmaker = '".$this->qmaker."' AND used_status = 1) AND status = 5
							)
						) ORDER BY qcode,groupid DESC ";
					 
					 
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["qcode"]] = array("qcode"=>$row["qcode"],
											"question"=>$row["question"],
											"answer"=>$row["answer"],
											"topic"=>$row["topic"],
											"subtopic"=>$row["subtopic"],
											"questiontype"=>$row["questiontype"],
											"class"=>$row["class"],
											"parent_subjectno"=>$row["parent_subjectno"],
											"subjectno"=>$row["subjectno"]
				);
			}
			/*echo "<pre>";
			print_r($arrRet);
			echo "<pre>";*/
			return $arrRet;
		}
		function getTeacherApprovedQuestionsCount($connid)
		{
			$queryCount = "SELECT count(*) as count FROM tg_questions WHERE qmaker = '".$this->qmaker."' AND status = '5' ";
			$dbqueryCount = dbquery($queryCount,$connid);
			$row = mysql_fetch_array($queryCount) or die(mysql_error());
			return $row["count"];
		}
		function getMappedSubtopicList($connid,$subtopic_code,$setSubtopic)
		{
			$arrRet = array();
			if($setSubtopic == "")
				$setSubtopic = 0;
			$query = "SELECT new_subtopic_code as stCode FROM tg_subtopic_mapping WHERE old_subtopic_code IN ('".$subtopic_code."','".$setSubtopic."')";
			$query.=" UNION SELECT old_subtopic_code as stCode FROM tg_subtopic_mapping WHERE new_subtopic_code IN ('".$subtopic_code."','".$setSubtopic."')";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[] = $row["stCode"];
			}
			//print_r($arrRet);
			return $arrRet;
		}
		function getClassesMappedSubtopic($connid,$subtopic_code,$setSubtopic)
		{
			$arrClass = array();
			$arrMappedSubtopicList = $this->getMappedSubtopicList($connid,$subtopic_code,$setSubtopic);
			$strMappedSubtopicList = implode(',',$arrMappedSubtopicList);
			if($strMappedSubtopicList != "")
			{
				$query = "SELECT class FROM tg_subtopicmaster WHERE subtopic_code IN (".$strMappedSubtopicList.") ";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$arrClass[] = $row["class"];
				}
			}
			return $arrClass;
		}
		function getTopicsMappedSubtopic($connid,$subtopic_code,$setSubtopic)
		{
			$arrClass = array();
			$arrMappedSubtopicList = $this->getMappedSubtopicList($connid,$subtopic_code,$setSubtopic);
			$strMappedSubtopicList = implode(',',$arrMappedSubtopicList);
			if($strMappedSubtopicList != "")
			{
				$query = "SELECT subtopic_code,topic_code FROM tg_subtopicmaster WHERE subtopic_code IN (".$strMappedSubtopicList.") ";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$arrClass[$row["subtopic_code"]] = $row["topic_code"];
				}
			}
			return $arrClass;
		}
}

?>
