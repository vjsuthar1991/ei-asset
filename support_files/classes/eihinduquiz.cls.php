<?php
class clshinduquiz 
{
	var $srno;
	var $round;
	var $questionNo;
	var $paperCode;
	var $publishDate;
	var $action;
	var $submitted;
	var $error;
	var $quizId;
	var $answerChosen;
	var $explanation;
	function clshinduquiz()
	{
		$this->srno=0;
		$this->round="";
		$this->questionNo="";
		$this->paperCode="";
		$this->publishDate="0000-00-00";
		$this->action="";
		$this->submitted="";
		$this->error="";
		$this->quizId="";
		$this->answerChosen = "";
		$this->explanation = "";
	}
	function setpostvars()	
	{
		if(isset($_POST["clshinduquiz_hdnsubmitted"])) $this->submitted=$_POST["clshinduquiz_hdnsubmitted"];
		if(isset($_POST["clshinduquiz_hdnaction"])) $this->action=$_POST["clshinduquiz_hdnaction"];
		if(isset($_POST["clshinduquiz_papercode"])) $this->paperCode=$_POST["clshinduquiz_papercode"];
		if(isset($_POST["clshinduquiz_questionNumber"])) $this->questionNo=$_POST["clshinduquiz_questionNumber"];
		if(isset($_POST["clshinduquiz_publishDate"])) $this->publishDate=$_POST["clshinduquiz_publishDate"];
		if(isset($_POST["clshinduquiz_hdnquizid"])) $this->quizId=$_POST["clshinduquiz_hdnquizid"];
		if(isset($_POST["clshinduquiz_answer"])) $this->answerChosen=$_POST["clshinduquiz_answer"];
		if(isset($_POST["clshinduquiz_explanation"])) $this->explanation = $_POST["clshinduquiz_explanation"];
	}
	function savedata($connid)
	{
		if($this->srno == 0)
		{
			//echo mysql_insert_id($connid);
			$this->round = $this->getRound($connid);
			$this->round = $this->round + 1;
			$query = "INSERT INTO hindu_quiz_rounds(round,papercode,qno,publishDate)".
					 "VALUES (".
					 "'".$this->round."',".
					 "'".$this->paperCode."',".
					 "'".$this->questionNo."',".
					 "'".$this->publishDate."') ";
			//echo $query;	 
		    $dbquery = new dbquery($query,$connid);
		}
		else
		{
			$query = "UPDATE hindu_quiz_rounds SET ".
					 "papercode = '".$this->paperCode."',".
					 "qno = '".$this->questionNo."',".
					 "publishDate = '".$this->publishDate."'";
					 
			$dbquery = new dbquery($query,$connid);
		}
	}
	function validation($connid)
	{
		if($this->paperCode == "")
			$this->error["papercode"]  = "Paper Code is a required field\r\n";
		elseif(strlen($this->paperCode) > 3)
			$this->error["papercode"]  = "Paper Code is not proper\r\n";
		if($this->questionNo == "")
			$this->error["qno"]  = "Question Number is a required field\r\n";
		elseif(!ctype_digit($this->questionNo))
			$this->error["qno"]  = "Question Numeric should only be numeric\r\n";
		if($this->publishDate == "0000-00-00")
			$this->error["publishDate"]  = "Publish Date is a required field\r\n";
		$query = "SELECT * FROM hindu_quiz_rounds ".
				 "WHERE papercode='".$this->paperCode."' ".
				 "AND qno ='".$this->questionNo."' ";
		$dbquery = new dbquery($query,$connid);		 
		if ($dbquery->numrows() > 0)
			$this->error["combinationexists"] = "Paper Code and Question Number combination already exists.";
				
		if(is_array($this->error) && count($this->error) > 0)
			return false;
		else 
			return true;
	}
	function pageAddhinduQuizDetails($connid)
	{
		$this->setpostvars();
		if($this->submitted == "1")
		{
			if($this->validation($connid))
			{
				if($this->action = "Savedata")
				{
					$this->savedata($connid);
					$this->action="Successfull";
				}
			}
		}
	}
	function getRound($connid)
	{
		$query = "SELECT round FROM hindu_quiz_rounds ORDER BY round DESC ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["round"];
	}
	function getlatestRoundResponseCount($connid)
	{
		$query = "SELECT quiz_id,round FROM hindu_quiz_rounds ORDER BY round DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$queryQR = "SELECT COUNT(*) as count FROM hindu_quiz_responses WHERE quiz_id = '".$row["quiz_id"]."' ";
		$dbqueryQR = new dbquery($queryQR,$connid);
		$rowQR = $dbqueryQR->getrowarray();
		return $rowQR["count"].",".$row["round"];
	}
	function getLatestQuestionDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT quiz_id,question,c.qcode,optiona,optionb,optionc,optiond,subjectno,a.papercode FROM hindu_quiz_rounds a,paper_master b,questions c 
					WHERE a.papercode = b.papercode AND a.qno = b.qno AND b.qcode = c.qcode
					ORDER BY quiz_id DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$class = substr($row['papercode'],1,1);		
			$round=substr($row['papercode'],2,1);
			$subjectno = $row['subjectno'];
			
			if($subjectno==1)
				$imgfolder	= "Round".$round."/english_images/class".$class;
			elseif($subjectno==2)
				$imgfolder	= "Round".$round."/MATHS_IMAGES/class".$class;
			elseif($subjectno==3)
				$imgfolder	= "Round".$round."/sci_images/class".$class;
			elseif($subjectno==4)
				$imgfolder	= "Round".$round."/social_images/class".$class;
				
			$arrRet = array("question"=>$row["question"],
							"optiona"=>$row["optiona"],
							"optionb"=>$row["optionb"],
							"optionc"=>$row["optionc"],
							"optiond"=>$row["optiond"],
							"quiz_id"=>$row["quiz_id"],
							"imgfolder"=>$imgfolder
							);
		}
		return $arrRet;
	}
	function getMyScoreDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT c.qcode,a.quiz_id,a.answer_chosen FROM hindu_quiz_responses a, hindu_quiz_rounds b,paper_master c,questions d 
					WHERE a.quiz_id = b.quiz_id AND b.papercode = c.papercode AND b.qno = c.qno AND c.qcode = d.qcode AND user_id = '".$_SESSION["user_id"]."'";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function saveResponse($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveResponse")
		{
			$query = "INSERT INTO hindu_quiz_responses SET quiz_id = '".$this->quizId."',user_id = '".$_SESSION["userid"]."',answer_chosen = '".$this->answerChosen."',explanation ='".$this->explanation."',entered_dt = CURDATE(),entered_by = '".$_SESSION["userid"]."' ";
			$dbquery = new dbquery($query,$connid);
		}
	}
}
?>