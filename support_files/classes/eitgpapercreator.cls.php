<?php
class clstgpapercreator
{
	var $paper_id;
	var $teacher_id;
	var $subjectno;
	var $class;
	var $total_marks;
	var $qno;
	var $qcode;
	var $marks;
	var $action;
	var $error;
	var $make_paper;
	var $type_order;
	var $instruction;
	var $school_name;
	var $total_time;
	var $exam;
	var $testdate;
	var $id;
	function clstgpapercreator()
	{
		$this->paper_id = 0;
		$this->subjectno = 0;
		$this->class = 0;
		$this->total_marks = "";
		$this->qno = 0;
		$this->qcode = 0;
		$this->marks = "";
		$this->action = "";
		$this->error = "";
		$this->make_paper = "";
		$this->type_order = "";
		$this->instruction = "";
		$this->school_name = "";
		$this->total_time = "";
		$this->exam = "";
		$this->testdate = "0000-00-00";
		$this->id = "";
	}
	function setpostvars()
	{
		
		//print_r($_SESSION);
		if(isset($_POST["clstgpapercreator_hdnaction"])) $this->action = $_POST["clstgpapercreator_hdnaction"];
		if(isset($_POST["clstgpapercreator_class"])) $this->class = $_POST["clstgpapercreator_class"];
		if(isset($_POST["clstgpapercreator_subject"])) $this->subjectno = $_POST["clstgpapercreator_subject"];
		if(isset($_POST["clstgpapercreator_totalmarks"])) $this->total_marks = $_POST["clstgpapercreator_totalmarks"];
		if(isset($_POST["clstgpapercreator_makepaper"])) $this->make_paper = $_POST["clstgpapercreator_makepaper"];
		if(isset($_POST["clstgpapercreator_marks"])) $this->marks = $_POST["clstgpapercreator_marks"];
		if(isset($_POST["clstgpapercreator_hdnqcode"])) $this->qcode = $_POST["clstgpapercreator_hdnqcode"];
		if(isset($_POST["clstgpapercreator_qno"])) $this->qno = $_POST["clstgpapercreator_qno"];
		if(isset($_POST["clstgpapercreator_typeorder"])) $this->type_order = $_POST["clstgpapercreator_typeorder"];
		if(isset($_POST["clstgpapercreator_instruction"])) $this->instruction = $_POST["clstgpapercreator_instruction"];
		if(isset($_POST["clstgpapercreator_schoolname"])) $this->school_name = $_POST["clstgpapercreator_schoolname"];
		if(isset($_POST["clstgpapercreator_exam"])) $this->exam = $_POST["clstgpapercreator_exam"];
		if(isset($_POST["clstgpapercreator_time"])) $this->total_time = $_POST["clstgpapercreator_time"];
		if(isset($_POST["clstgpapercreator_testdate"])) $this->testdate = $_POST["clstgpapercreator_testdate"];
		if(isset($_POST["clstgpapercreator_hdnpaperid"])) $this->paper_id = $_POST["clstgpapercreator_hdnpaperid"];
		if(isset($_POST["clstgpapercreator_hdnqid"])) $this->id = $_POST["clstgpapercreator_hdnqid"];
		if(isset($this->paper_id) && $this->paper_id != 0)
		{
			$_SESSION["paperid"] = $this->paper_id;
		}
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
	}
	function pageAddPaperDetails($connid)
	{
		$this->setpostvars();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		
		if($this->action == "DeleteCode")
		{
			$this->deleteQuestion($connid);
		}
		if($this->action == "ReplaceCode")
		{
			$this->replaceQuestion($connid);
		}
		if($this->action == "SaveChanges" || $this->action == "FinalizePaper")
		{
			$this->saveChanges($connid,$paper_id);
		}
		if($this->action == "FinalizePaper")
		{
			$this->finalizePaper($connid,$paper_id);
		}
	}
	function pageDeletePaper($connid)
	{
		$this->setpostvars();
		if($this->action == "DeletePaper")
		{
			$paper_id = $this->getLatestPaperByTeacherID($connid);
			$this->deletePaper($connid,$paper_id);
			echo "<script language=javascript>window.location=\"index.php\"</script>";
		}
	}
	function pageAddNewPaper($connid)
	{
		
		$this->setpostvars();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
				$this->savedata($connid);
			
		}
	}
       function getTeacherUsername($connid)
       {
        $query = "SELECT username FROM tg_teacherdetails WHERE teacher_id =  '".$_SESSION["userid"]."'";
        $dbquery = new dbquery($query,$connid);
        $row = $dbquery->getrowarray();
        return $row["username"];
       } 
	function validation($connid)
	{
		if($this->class == "")
			$this->error["class"] = "Please enter the class for preparing the paper";
		if($this->subjectno == "" || $this->subjectno == 0)
			$this->error["subject"] = "Please enter the subject for preparing the paper";	
		if($this->total_marks == "" || $this->total_marks == 0)
			$this->error["total_marks"] = "Please enter the total marks for preparing the paper";
			
		if(is_array($this->error) && count($this->error) > 0)
			return false;
		else 
			return true;
	}
	function savedata($connid)
	{
		
		//$query = "INSERT INTO tg_papermaster SET class '" .$this->class."', subjectno = '".$this->subjectno."', total_marks = '".$this->total_marks."' teacher_id = '".$_SESSION["teacher_id"]."'";
		$arrDate = explode('-',$this->testdate);
		$strDt = $arrDate[2]."-".$arrDate[1]."-".$arrDate[0];
		$query = "INSERT INTO tg_papermaster SET class = '" .$this->class."', subjectno = '".$this->subjectno."', 
				 total_marks = '".$this->total_marks."',teacher_id = '".$_SESSION["userid"]."',created_date = NOW(),school_name = '".$this->school_name."',exam = '".$this->exam."',total_time = '".$this->total_time."',test_date = '".$strDt."' ";
		$dbquery = 	new dbquery($query,$connid);
		
		$_SESSION["paperid"] = $dbquery->insertid;
		
		
       /*if(($_SESSION['userid'] == '369') || ($_SESSION['userid'] == '23') || ($_SESSION['userid'] == '24') || ($_SESSION['userid'] == '25') || ($_SESSION['userid'] == '26') || ($_SESSION['userid'] == '27') || ($_SESSION['userid'] == '28'))
			echo "<script language=javascript>window.location=\"tgcreate_test_step1_demo.php\"</script>";
		else 
			echo "<script language=javascript>window.location=\"tgcreate_test_step1.php\"</script>";*/
			
		echo "<script language=javascript>window.location=\"tgcreate_test_step1.php\"</script>";
			
	}
	function saveQuesType($connid,$questtype,$paper_id,$qcode)
	{
		$order = $this->getLatestOrderOfQuesttype($connid,$paper_id);
		if($order == "")
			$order = 1;
		else 
			$order = $order + 1;
			
		$query = "INSERT INTO tg_paperqtypeorder SET paper_id = '".$paper_id."',questtype ='".$questtype."',order_paper ='$order',qcode_list='".$qcode."',created_date=NOW() ";
		$dbquery = 	new dbquery($query,$connid);
	}
	function getLatestOrderOfQuesttype($connid,$paper_id)
	{
		$query = "SELECT order_paper FROM tg_paperqtypeorder WHERE paper_id = '".$paper_id."' ORDER BY order_paper DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0] ;
	}
	function validateQuestype($connid,$questtype,$paper_id)
	{
		$query = "SELECT count(*) FROM tg_paperqtypeorder WHERE questtype = '".$questtype."' AND paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] > 0)
			return false;
		else 
			return true;	
	}
	function pageAddQuestionToPaper($connid)
	{
		$this->setpostvars();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$qno = $this->getLatestQnoByTeacherID($connid,$paper_id);
		if($this->action == "AddToPaper" || $this->action == "ReplaceCode")
		{
			//print_r($this->make_paper);
			if(is_array($this->make_paper) && count($this->make_paper) >0)
			{
				foreach ($this->make_paper as $qcode)
				{
					if($this->validate($connid,$qcode,$paper_id))
					{
						$qno = $qno + 1;
						$query = "INSERT INTO tg_paperdetails SET paper_id = '".$paper_id."',qno = '".$qno."',qcode = '".$qcode."',marks = '".$this->marks[$qcode]."',created_date = NOW() ";
						$dbquery = new dbquery($query,$connid);
						$questtype = $this->getQuesttypeByQcode($connid,$qcode);
						if($this->validateQuestype($connid,$questtype,$paper_id))
							$this->saveQuesType($connid,$questtype,$paper_id,$qcode);
						else 
							$this->updateQuestionList($connid,$questtype,$paper_id,$qcode);
					}
				}
			}
		}
	}
	function updateQuestionList($connid,$questionType,$paper_id,$qcode)
	{
		$query = "UPDATE tg_paperqtypeorder SET qcode_list = CONCAT(qcode_list,',','".$qcode."') WHERE questtype = '".$questionType."' AND paper_id = '".$paper_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
	}
	function getQuesttypeByQcode($connid,$qcode)
	{
		$query = "SELECT questtype,grouptext,groupname,tg_questions.groupid FROM tg_questions LEFT JOIN tg_groupmaster ON tg_questions.groupid = tg_groupmaster.groupid WHERE qcode = '".$qcode."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row["grouptext"] != '')
			return  $row["groupid"];
		else	
			return $row["questtype"];
	}
	function getLatestPaperByTeacherID($connid)
	{
		/*$query = "SELECT paper_id FROM tg_papermaster WHERE teacher_id = '".$_SESSION["userid"]."' ORDER BY paper_id DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["paper_id"];*/
		$this->setpostvars();
		//echo $this->paper_id;
		//echo $_SESSION["paperid"];
		//exit;
		return $_SESSION["paperid"];
	}
	function getPaperDetailsByPaperID($connid)
	{
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT * FROM tg_papermaster WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->class = $row["class"];
		$this->subjectno = $row["subjectno"];
		$this->total_marks = $row["total_marks"];
		$this->school_name = $row["school_name"];
		$this->total_time = $row["total_time"];
		$this->testdate = $row["test_date"];
		$this->exam = $row["exam"];
	}
	function getLatestQnoByTeacherID($connid,$paper_id)
	{
		$qno = 0;
		$query = "SELECT qno FROM tg_paperdetails WHERE paper_id = '".$paper_id."' ORDER BY qno DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row["qno"] != "")
				$qno = $row["qno"];

		return $qno;
	}
	function getLatestQuestionsByPaperID($connid)
	{
		$arrRet = array();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT qno,question,tg_paperdetails.qcode,topic_code,subtopic_code,questtype,groupid FROM tg_paperdetails,tg_questions WHERE tg_questions.qcode = tg_paperdetails.qcode AND paper_id = '".$paper_id."' ORDER BY qno DESC ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())		
		{
			$arrRet[$row["qcode"]] = array("qcode"=>$row["qcode"],
											"question"=>$row["question"],
											"topic_code"=>$row["topic_code"],
											"subtopic_code"=>$row["subtopic_code"],
											"questtype"=>$row["questtype"],
											"groupid"=>$row["groupid"],
											"qno"=>$row["qno"]);
		}
		return $arrRet;
	}
	function deleteQuestion($connid)
	{
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$qcode = $this->qcode;
		$query = "DELETE FROM tg_paperdetails WHERE qcode = '".$this->qcode."' AND paper_id = '".$paper_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		//echo "<script>window.location.reload();</script>";
		$questionType = $this->getQuesttypeByQcode($connid,$this->qcode);
		if($this->checkQtypeExist($connid,$questionType,$paper_id))
		{
			//echo "entered in to the first contion";
			$this->deleteQuestionTypeFromPaper($connid,$questionType,$paper_id);
		}
		else 
		{
			//echo "entered in to the second condition";
			$this->deleteQcodeFromQtypeQcodeList($connid,$qcode,$paper_id,$questionType);
		}
	}
	function deleteQuestionTypeFromPaper($connid,$questionType,$paper_id)
	{
		$query = "DELETE FROM tg_paperqtypeorder WHERE paper_id =  '".$paper_id."' AND questtype = '".$questionType."'";
		$dbquery = new dbquery($query,$connid);
	}
	function checkQtypeExist($connid,$questtype,$paper_id)
	{
		$query = "SELECT count(*) FROM tg_paperdetails,tg_questions WHERE tg_paperdetails.qcode = tg_questions.qcode AND paper_id = '".$paper_id."' AND ((questtype LIKE '".$questtype."' AND groupid = 0) OR (groupid LIKE '".$questtype."' AND groupid != 0))";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] == 0)
			return true;
		else 
			return false;
	}
	function getQuestionTypeByQcode($connid,$qcode)
	{
		$query = "SELECT questtype FROM tg_questions WHERE qcode = '".$qcode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["questtype"];
	}
	function replaceQuestion($connid)	
	{
		$this->deleteQuestion($connid);
	}
	function getQuestionType($connid)
	{
		$arrRet = array();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT questtype,instruction FROM tg_questions,tg_paperdetails,tg_questypemaster WHERE tg_questions.qcode = tg_paperdetails.qcode AND 
		tg_questions.questtype = tg_questypemaster.code
		AND paper_id = '".$paper_id."' GROUP BY questtype";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["questtype"]] = array("questtype"=>$row["questtype"],
				"instruction"=>$row["instruction"]
				);
		}
		return $arrRet;
	}
	function getQuestionsByType($connid,$questtype,$qcode_list)
	{
		$arrRet = array();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$arrGroupQuestions = $this->getGroupDetailsForPaper($connid);
		$arrGroupQuestionsKeys = array_keys($arrGroupQuestions);
		//$arrQcodes = explode(',',$qcode_list);
		if($qcode_list == "")
			$qcode_list = 0;
		elseif($qcode_list{0} == ',')
			$qcode_list = "0,".$qcode_list;
			
		$query = "SELECT tg_questions.qcode,qno,question,marks,topic_code,subtopic_code,class,subjectno,answer,groupid 
				FROM tg_questions,tg_paperdetails WHERE tg_questions.qcode = tg_paperdetails.qcode 
				AND paper_id = '".$paper_id."' AND ((questtype LIKE '".$questtype."' AND groupid = 0)  OR (groupid LIKE '".$questtype."' AND groupid !=0)) AND tg_questions.qcode IN (".$qcode_list.") AND tg_questions.qcode != 0 ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			/*if(!in_array($row["groupid"],$arrGroupQuestionsKeys))
			{*/
				$arrRet[$row["qcode"]] = array("qcode"=>$row["qcode"],
										   "qno"=>$row["qno"],
										   "question"=>$row["question"],
										   "answer"=>$row["answer"],
										   "topic_code"=>$row["topic_code"],
										   "subtopic_code"=>$row["subtopic_code"],
										   "question"=>$row["question"],
										   "class"=>$row["class"],
										   "subjectno"=>$row["subjectno"],
										   "marks"=>$row["marks"],
										   "groupid"=>$row["groupid"]
										);
			/*}*/
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function getQuesTypeOrder($connid)
	{
		$arrRet = array();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT order_paper,questtype,instruction,modified_instruction,qcode_list,description FROM tg_paperqtypeorder 
				  LEFT JOIN tg_questypemaster ON tg_questypemaster.code = tg_paperqtypeorder.questtype
				  WHERE paper_id = '".$paper_id."' ORDER BY order_paper";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = array("questtype"=>$row["questtype"],
												"order_paper"=>$row["order_paper"],
												"qcode_list"=>$row["qcode_list"],
												"modified_instruction"=>$row["modified_instruction"],
												"instruction"=>$row["instruction"],
"description"=>$row["description"]
											);
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function saveChanges($connid,$paper_id)
	{
		foreach($this->type_order as $key =>$value)
		{
			$arrQcodeList = $this->qno[$key];
			$arrQcodeList = array_flip($arrQcodeList);
			ksort($arrQcodeList); 
			$str = implode(',',$arrQcodeList);
			$query = "UPDATE tg_paperqtypeorder SET order_paper = '".$value."',qcode_list = '".$str."',modified_instruction = '".$this->instruction[$key]."' WHERE questtype = '".$key."' AND paper_id ='".$paper_id."' LIMIT 1";
			$dbquery = new dbquery($query,$connid);
		}
		$this->savePaperOtherDetails($connid,$paper_id);
	}
	function saveMarks($connid,$marks,$paper_id,$qcode)
	{
		$query = "UPDATE tg_paperdetails SET marks = '".$marks."' WHERE qcode ='".$qcode."' AND paper_id ='".$paper_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
	}
	function getQcodeListByQtype($connid,$qcode,$paper_id,$questtype)
	{
		$query = "SELECT qcode_list FROM tg_paperqtypeorder WHERE questtype = '".$questtype."' AND paper_id = '".$paper_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["qcode_list"];
	}
	function deleteQcodeFromQtypeQcodeList($connid,$qcode,$paper_id,$questtype)
	{
		$qcode_list = $this->getQcodeListByQtype($connid,$qcode,$paper_id,$questtype);
		$arrQcodes = explode(',',$qcode_list);
		$key = array_search($qcode,$arrQcodes);
		
		if($key === 0)
		{
			unset($arrQcodes[$key]);
			$str = implode(',',$arrQcodes);
			if($str != "")
			{
				$query = "UPDATE tg_paperqtypeorder SET qcode_list = '".$str."',modified_date = NOW() WHERE questtype = '".$questtype."' AND paper_id = '".$paper_id."' LIMIT 1";
				$dbquery = new dbquery($query,$connid);
			
			}
		}
		else if(!empty($key))
		{
			unset($arrQcodes[$key]);
			$str = implode(',',$arrQcodes);
			if($str != "")
			{
				$query = "UPDATE tg_paperqtypeorder SET qcode_list = '".$str."',modified_date = NOW() WHERE questtype = '".$questtype."' AND paper_id = '".$paper_id."' LIMIT 1";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function getTotalMarksAndCount($connid)
	{
		$arrRet = array();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		/*echo $query = "SELECT count(tg_questions.qcode) as total_count,sum(tg_paperdetails.marks),instruction,questtype
				  FROM tg_questions,tg_paperdetails,tg_questypemaster  
				  WHERE tg_questions.qcode = tg_paperdetails.qcode 
				  AND tg_questypemaster.code = tg_questions.questtype
			      AND tg_paperdetails.paper_id = '".$paper_id."' GROUP BY questtype";*/
		$query = "SELECT questtype,qcode_list FROM tg_paperqtypeorder WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
		
		while ($row = $dbquery->getrowarray()) 
		{
			$qcode_list = 0;
			if($row["qcode_list"] != "")
				$qcode_list = $row["qcode_list"];
$querysub = "SELECT sum(marks) as total_marks FROM tg_paperdetails WHERE paper_id = '".$paper_id."' AND qcode IN (".$qcode_list.")";
			$dbquerysub = new dbquery($querysub,$connid);
			$rowsub = $dbquerysub->getrowarray();
			if(ereg(',',$row["qcode_list"]))
			{
				$arrQcodes = explode(',',$row["qcode_list"]);
				$count = count($arrQcodes);
			}
			else 
			{
				$count = 1;
			}
			$arrRet[$row["questtype"]]	= array("questtype"=>$row["questtype"],
												"total_count"=>$count,
												"total_marks"=>$rowsub["total_marks"]
							);
		}
		
		return $arrRet;
	}
	function getPendingPapersByTeacherId($connid)
	{
		$arrRet = array();
		$query = "SELECT tg_papermaster.*,DATE_FORMAT(created_date,'%d-%m-%Y') as created_dt,description FROM tg_papermaster,tg_subjectmaster WHERE tg_papermaster.subjectno = tg_subjectmaster.subjectno AND teacher_id = '".$_SESSION["userid"]."' ORDER BY created_dt DESC";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["paper_id"]] = array("paper_id"=>$row["paper_id"],
											 "class"=>$row["class"],
											 "status"=>$row["status"],
											 "created_date"=>$row["created_dt"],
											  "description"=>$row["description"],
											  "total_marks"=>$row["total_marks"],
											  "exam"=>$row["exam"]
								);
		}
		return $arrRet;
	}
	function getFinalizedPapers($connid)
	{
		$arrRet = array();
		$query = "SELECT tg_paperdetails.paper_id,sum(marks) as total_marks FROM tg_paperdetails,tg_papermaster WHERE tg_papermaster.paper_id = tg_paperdetails.paper_id AND status = 'completed' AND teacher_id = '".$_SESSION["userid"]."' GROUP BY tg_paperdetails.paper_id";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["paper_id"]] = $row["total_marks"];
		}
		return $arrRet;
	}
	function redirectIndex($connid)
	{
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		
		if($paper_id == "" || $paper_id == 0)
			echo "<script language=javascript>window.location=\"index.php\"</script>";
	}
	function getTotalMarksByPaperId($connid)
	{
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT total_marks FROM tg_papermaster WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["total_marks"];
	}
	function getSumOfMarksOfQuestionsAdded($connid)
	{
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT sum(marks) FROM tg_paperdetails WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function finalizePaper($connid,$paper_id)
	{
		$query = "UPDATE tg_papermaster SET status = 'completed' WHERE paper_id = '".$paper_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$this->savePaperOtherDetails($connid,$paper_id);
		echo "<script language=javascript>window.location=\"viewCompletePaper.php\"</script>";
	}
	function getQuestionTypeWithQuestions($connid,$class,$subjectno)
	{
		$arrRet = array();
		$query = "SELECT instruction,questtype,count(qcode) FROM tg_questions,tg_questypemaster WHERE tg_questions.questtype = tg_questypemaster.code 
		AND tg_questions.subjectno = '".$subjectno."'  GROUP BY tg_questions.questtype HAVING count(qcode) > 0";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["questtype"]] = array("questtype"=>$row["questtype"],
											"instruction"=>$row["instruction"],
											"count_questions"=>$row["count(tg_questions.*)"]
				);
		}
		return $arrRet;
	}
	function validate($connid,$qcode,$paper_id)
	{
		$query = "SELECT count(*) FROM tg_paperdetails WHERE qcode = '".$qcode."' AND paper_id = '".$paper_id."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] == 0)
			return true;
		else 
			return false;
	}
	function getSubjectByPaperID($connid)
	{
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT subjectno FROM tg_papermaster WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["subjectno"];
	}
	function getClassByPaperID($connid)
	{
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT class FROM tg_papermaster WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["class"];
	}
	function getTgTopics($connid,$class,$subjectno)
	{
		$arrRet = array();
		if($subjectno == 3)
			$condition = " AND parent_subjectno = '".$subjectno."' ";
		else
			$condition = " AND subjectno = '".$subjectno."' ";
		
		$query = "SELECT * FROM tg_topicmaster WHERE 1 = 1 ".$condition;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			
			if(strlen($row["classes"]) == 1)
            {
                    if($class == $row["classes"])
                    {
                            $arrRet[$row["topic_code"]] = array("topic_code"=>$row["topic_code"],"description"=>$row["description"],"subjectno"=>$row["subjectno"]);
                    }
            }
            else
            {
                    $arrClasses = explode(',',$row["classes"]);
                    if(in_array($class,$arrClasses))
                    {
                            $arrRet[$row["topic_code"]] = array("topic_code"=>$row["topic_code"],"description"=>$row["description"],"subjectno"=>$row["subjectno"]);
                    }
            }
		}
		return $arrRet;
	}
	
	function romanNumerals($num) 
	{
	    $n = intval($num);
	    $res = '';
	 
	    /*** roman_numerals array  ***/
	    $roman_numerals = array(
	                'M'  => 1000,
	                'CM' => 900,
	                'D'  => 500,
	                'CD' => 400,
	                'C'  => 100,
	                'XC' => 90,
	                'L'  => 50,
	                'XL' => 40,
	                'X'  => 10,
	                'IX' => 9,
	                'V'  => 5,
	                'IV' => 4,
	                'I'  => 1);
	 
	    foreach ($roman_numerals as $roman => $number) 
	    {
	        /*** divide to get  matches ***/
	        $matches = intval($n / $number);
	 
	        /*** assign the roman char * $matches ***/
	        $res .= str_repeat($roman, $matches);
	 
	        /*** substract from the number ***/
	        $n = $n % $number;
	    }
	 
	    /*** return the res ***/
	    return $res;
	    }
	    
	function deletePaper($connid,$paper_id)
	{
		$query = "DELETE FROM tg_papermaster WHERE paper_id = '".$paper_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$this->deletePaperQuestions($connid,$paper_id);
		$this->deletePaperOrderQuestionType($connid,$paper_id);
	}
	function deletePaperQuestions($connid,$paper_id)
	{
		$query = "DELETE FROM tg_paperdetails WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
	}
	function deletePaperOrderQuestionType($connid,$paper_id)
	{
		$query = "DELETE FROM tg_paperqtypeorder WHERE paper_id = '".$paper_id."'";
		$dbquery = new dbquery($query,$connid);
	}
	function savePaperOtherDetails($connid,$paper_id)
	{
		$arrDate = explode('-',$this->testdate);
		$strDt = $arrDate[2]."-".$arrDate[1]."-".$arrDate[0];
		$query = "UPDATE tg_papermaster SET school_name = '".$this->school_name."',exam = '".$this->exam."',total_time = '".$this->total_time."',modified_date = NOW(),test_date = '".$strDt."' WHERE paper_id = '".$paper_id."' LIMIT 1" ;
		$dbquery = new dbquery($query,$connid);
	}
	function getOtherDetailsByPaperID($connid)
	{
		$arrRet = array();
		$paper_id = $this->getLatestPaperByTeacherID($connid);
		$query = "SELECT school_name,exam,description,total_marks,class,total_time FROM tg_papermaster,tg_subjectmaster WHERE tg_papermaster.subjectno = tg_subjectmaster.subjectno AND paper_id = '".$paper_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[] = array("school_name"=>$row["school_name"],
							  "exam"=>$row["exam"],
							  "total_time"=>$row["total_time"],
							  "total_marks"=>$row["total_marks"],
							  "class"=>$row["class"],
							  "description"=>$row["description"]
							  );
		} 
		return $arrRet;
	}
	function getAllSubjectDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM tg_subjectmaster";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
				$arrRet[$row["subjectno"]] = array("subjectno"=>$row["subjectno"],
												   "description"=>$row["description"]	
				);
		}
		return $arrRet;
	}
	function getGroupDetailsForPaper($connid)
	{
		$arrRet = array();
		$query = "SELECT count(qcode) as count,tg_questions.groupid FROM tg_questions,tg_groupmaster WHERE tg_questions.groupid = tg_groupmaster.groupid AND tg_questions.groupid != '' AND tg_questions.groupid != 0 AND tg_groupmaster.grouptext != '' GROUP BY tg_questions.groupid";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["groupid"]] = $row["count"];
		}
		return $arrRet;
	}
    function getNotSeenFeedbackCount($connid)
	{
		$query = "SELECT count(*) as count FROM tg_feedback WHERE teacher_userid = '".$_SESSION["userid"]."' AND status = 2 AND response != '' AND seen = 0 ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["count"];
	}
	
}
?>
