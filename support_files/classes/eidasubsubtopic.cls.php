<?php
class clsdasubsubtopic
{
	var $subjectno;
	var $topic_code;
	var $subsubtopic_code;
	var $subtopic_code;
	var $description;
	var $expected_questions;
	var $action;
	var $error;
	var $setcolor;
	var $fromDate;
	var $toDate;
	var $delSST;
	var $class;
	var $what_it_covers;
	var $status;
	var $flflag;
	var $ssst_code;
	
	function clsdasubsubtopic()
	{
		$this->subjectno = "";
		$this->topic_code = "";
		$this->subsubtopic_code = "";
		$this->subtopic_code = "";
		$this->action = "";
		$this->error = "";
		$this->description = "";
		$this->expected_questions = "";
		$this->setcolor = "";
		$this->fromDate = "";
		$this->toDate = "";
		$this->delSST = array();
		$this->class = array();
		$this->what_it_covers = "";
		$this->status = "";
		$this->flflag = "";
		$this->ssst_code = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsdasubtopic_subjectno"])) $this->subjectno = $_POST["clsdasubtopic_subjectno"];
		if(isset($_POST["clsdasubtopic_topic"]	)) $this->topic_code = $_POST["clsdasubtopic_topic"];
		if(isset($_POST["clsdasubtopic_subtopic"]	)) $this->subtopic_code = $_POST["clsdasubtopic_subtopic"];
		if(isset($_POST["clsdasubsubtopic_description"])) $this->description = mysql_real_escape_string($_POST["clsdasubsubtopic_description"]);
		if(isset($_POST["clsdasubsubtopic_class"])) $this->class = $_POST["clsdasubsubtopic_class"];
		if(isset($_POST["clsdasubtopic_class"])) $this->class = $_POST["clsdasubtopic_class"];
		if(isset($_POST["clsdasubsubtopic_expectedques"])) $this->expected_questions = $_POST["clsdasubsubtopic_expectedques"];
		if(isset($_POST["subsubtopic_code"])) $this->subsubtopic_code = $_POST["subsubtopic_code"];
		if(isset($_POST["clsdasubsubtopic_hdnsubsubtopic"])) $this->subsubtopic_code = $_POST["clsdasubsubtopic_hdnsubsubtopic"];
		if(isset($_POST["subtopic_code"])) $this->subtopic_code = $_POST["subtopic_code"];
		if(isset($_POST["hdnaction"])) $this->action = $_POST["hdnaction"];
		if(isset($_POST["fromDate"])) $this->fromDate = $_POST["fromDate"];
		if(isset($_POST["toDate"])) $this->toDate = $_POST["toDate"];
		if(isset($_POST["clsdasubtopic_hdnaction"])) $this->action = $_POST["clsdasubtopic_hdnaction"];
		if(isset($_POST["clsdasubtopic_hdnstatus"])) $this->status = $_POST["clsdasubtopic_hdnstatus"];
		if(isset($_POST["delSST"])) $this->delSST = $_POST["delSST"];
		//if(isset($_POST["clsdasubsubtopic_class"])) $this->class = $_POST["clsdasubsubtopic_class"];
		if(isset($_POST["clsdasubsubtopic_whatitcovers"])) $this->what_it_covers = mysql_real_escape_string($_POST["clsdasubsubtopic_whatitcovers"]);
		if(isset($_POST["clsdasubtopic_flflag"])) $this->flflag = $_POST["clsdasubtopic_flflag"];
		
		//print_r($_POST);
	}
	function setgetvars()
    {
        if(isset($_GET["subtopic_code"])) $this->subtopic_code = $_GET["subtopic_code"];
		if(isset($_GET["sub_subtopic_code"])) $this->subsubtopic_code = $_GET["sub_subtopic_code"];
		if(isset($_GET["current_alloted"])) $this->searchallotedto = $_GET["current_alloted"];
		if(isset($_GET["action"])) $this->action = $_GET["action"];
		if(isset($_GET["misconception"])) $this->searchmisconception = $_GET["misconception"];
		if(isset($_GET["subjectno"])) $this->subjectno = $_GET["subjectno"];
		if(isset($_GET["class"])) $this->class = $_GET["class"];
		if(isset($_GET["status"])) $this->status = $_GET["status"];
		if(isset($_GET["topic_code"])) $this->topic_code = $_GET["topic_code"];
    }
	function getsubSubtopicBySubtopic($connid,$subtopic_code="",$class="",$flflag="")
	{
		
		$this->setpostvars();
		$condition = "";
		if($subtopic_code == "")
			$st_code = $this->subtopic_code;
		else
			$st_code = 	$subtopic_code;
		if($class != "")
			$condition = " AND find_in_set('".$class."',class) > 0 ";
		else if($this->class != "" && !is_array($this->class))
			$condition = " AND find_in_set('".$this->class."',class) > 0 ";
			
		if($this->flflag == "Y" || $flflag == "Y")
			$condition .= "AND freelancer = '".$_SESSION["username"]."'";	

		$query = "SELECT * FROM da_subSubTopicMaster WHERE subtopic_code = '".$st_code."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function pageAddEditSubSubtopic($connid)
    {
        $this->setpostvars();
		$this->setgetvars();
        if($this->action == "SaveData")
        {
	        if($this->validation($connid))
	        {
	           $this->saveData($connid);
			}
			/*else
			{
				echo "<html><body><head><script>function pageSubmit(){document.hdform.action='daAdmin_addEditSubtopic.php';document.hdform.submit();}</script></head><form name='hdform' method='POST'><input type='hidden' name='clsdasubtopic_error[]' value='".$this->error."'><input type='hidden' name='clsdasubtopic_class' value='".$this->class."'><input type='hidden' name='clsdasubtopic_subjectno' value='".$this->subjectno."'><input type='hidden' name='clsdasubtopic_topic' value='".$this->topic_code."'><input type='hidden' name='clsdasubtopic_hdnaction' value='GetData'><script language='javascript'>pageSubmit();</script></form></body></html>";
			}*/
        }
		if($this->action == "DeleteData")
		{
			$this->delSubSubTopic($connid);
		}
    }
	function delSubSubTopic($connid)
	{
		if(count($this->delSST) > 0)
		{
			foreach($this->delSST as $key =>$sstcode)
			{
				$qcount = $this->sstWithQues($connid,$sstcode);
				if($qcount == 0)
				{
					$query = "DELETE FROM da_subSubTopicMaster WHERE sub_subtopic_code = '".$sstcode."' ";
					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}
	function sstWithQues($connid,$sub_subtopic_code)
	{
		$query = "SELECT count(*) FROM da_questions WHERE sub_subtopic_code = '".$sub_subtopic_code."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function validation($connid)
    {
        /*if($this->class == "")
			$this->error["class"] = "Please enter the class";*/
		/*if($this->subjectno == "")
			$this->error["sujectno"] = "Please enter the subject";*/
		if($this->subtopic_code == "")
        	$this->error["subtopic"] = "Please enter the subtopic for the sub subtopic";
        if($this->description == "")
        	$this->error["description"] = "Please enter the subtopic";
        if($this->checkDuplicate($connid))
        	$this->error["duplicate"] = "This sub subtopic is already entered in database";


        if(is_array($this->error) && count($this->error) >0)
        	return false;
        else
        	return true;
    }
	function checkDuplicate($connid)
    {
        if(is_array($this->description) && count($this->description) >0)
		{
			for($i=0;$i<count($this->description);$i++)
			{
				if($this->description[$i] != "" && (!isset($this->subsubtopic_code[$i]) || $this->subsubtopic_code[$i] == ""))
				{
					$query = "SELECT count(*) FROM da_subSubTopicMaster WHERE description = '".$this->description[$i]."' AND subtopic_code = '".$this->subtopic_code."'";
        			$dbquery = new dbquery($query,$connid);
        			$row = $dbquery->getrowarray();
					//echo $row[0];
					if($row[0] > 0)
					{
						$this->setcolor[$i] = "#FFFF99";
						return true;
					}
					else
						return false;
				}
			}
		}
    }
	function saveData($connid)
    {
		if(is_array($this->description) && count($this->description) >0)
		{
			for($i=0;$i<count($this->description);$i++)
			{
				if($this->description[$i] != "")
				{
					if($this->subsubtopic_code[$i] > 0)
						$query = "UPDATE da_subSubTopicMaster SET subtopic_code = '".$this->subtopic_code."',description = '".$this->description[$i]."',class = '".implode(",",$this->class[$i])."',what_it_covers = '".$this->what_it_covers[$i]."' WHERE sub_subtopic_code = '".$this->subsubtopic_code[$i]."' LIMIT 1";
					else
						$query = "INSERT INTO da_subSubTopicMaster SET subtopic_code = '".$this->subtopic_code."',description = '".$this->description[$i]."',class = '".implode(",",$this->class[$i])."',what_it_covers = '".$this->what_it_covers[$i]."',entered_by = '".$_SESSION["username"]."'";
        			$dbquery = new dbquery($query,$connid);
				}
			}
			$this->action = "SuccessfullyAdded";
			//echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";
		}
	}
	function retrieveSubSubTopicDetails($connid)
    {
        $this->description = "";
        $this->expected_questions = "";
        $this->subsubtopic_code = "";
    	$this->setgetvars();
        $query = "SELECT a.description,a.subtopic_code,a.expected_questions,sub_subtopic_code,a.class,what_it_covers FROM da_subSubTopicMaster a,da_subtopicMaster b WHERE a.subtopic_code = b.subtopic_code AND a.subtopic_code = '".$this->subtopic_code."' ORDER BY sub_subtopic_code";
        $dbquery = new dbquery($query,$connid);
        /*$this->class = $row["class"];
		$this->subjectno = $row["subjectno"];*/
		$i = 0;
		while($row = $dbquery->getrowarray())
		{
			$this->description[$i] = $row["description"];
			$this->expected_questions[$i] = $row["expected_questions"];
			$this->subsubtopic_code[$i] = $row["sub_subtopic_code"];
            $this->class[$i] = $row["class"];
            $this->what_it_covers[$i] = $row["what_it_covers"];
			$i++;
		}
		//$this->topic_code = $row["topic_code"];
    }
	function searchQuestions($connid,$arrQcodes=array())
	{
		$this->setgetvars();
		$this->setpostvars();
		$qcodes_list = "";
		if(count($arrQcodes) > 0)
			$qcodes_list = implode($arrQcodes,",");
		$arrRet = array();
		$arrPassageDetails = $this->getPassageDetails($connid);
		if($this->action == "SearchData" || $this->action == "search")
		{
			$query = "SELECT a.*,b.description as subtopic,c.description as topic
			          FROM   da_questions a, da_subSubTopicMaster d, da_subtopicMaster b,da_topicMaster c
			          WHERE  a.sub_subtopic_code=d.sub_subtopic_code AND d.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code ";
			if(trim($this->searchqcode) != "")
				$query.=" AND qcode IN (".$this->searchqcode.") ";
			if($this->class != "" && $this->class > 0)
				$query.=" AND a.class = '".$this->class."' ";
			if($this->searchstatus != "")
				$query.=" AND a.status = '".$this->searchstatus."' ";
			if($this->subjectno != "" && $this->subjectno > 0)
				$query.=" AND a.subjectno = '".$this->subjectno."' ";
			if($this->topic_code != "" && $this->topic_code > 0)
				$query.=" AND b.topic_code = '".$this->topic_code."' ";
			if($this->subtopic_code != "" && $this->subtopic_code > 0)
				$query.=" AND a.subtopic_code = '".$this->subtopic_code."' ";
			if($this->searchallotedto != "")
				$query.=" AND a.current_alloted = '".$this->searchallotedto."' ";
			if($this->searchqmaker != "")
				$query.=" AND question_maker = '".$this->searchqmaker."' ";
			if($this->searchmisconception == "1")
				$query.=" AND misconception = '".$this->searchmisconception."' ";
			if(isset($this->status) && $this->status > 0)
				$query.=" AND a.status = '".$this->status."' ";
			if(isset($this->passage_id) && $this->passage_id >0)
				$query.=" AND a.passage_id = '".$this->passage_id."' ";
			if($qcodes_list != "")
				$query.=" AND qcode NOT IN (".$qcodes_list.") ";

			$query.=" ORDER BY a.sub_subtopic_code,group_id,qcode ";
			/*if($_SESSION["username"] == "jaspreet")
				echo $query;*/
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["qcode"]] = array("question"=>$row["question"],
											"class"=>$row["class"],
											"subjectno"=>$row["subjectno"],
											"topic"=>$row["topic"],
											"subtopic"=>$row["subtopic"],
											"optiona"=>$row["optiona"],
											"optionb"=>$row["optionb"],
											"optionc"=>$row["optionc"],
											"optiond"=>$row["optiond"],
											"correct_answer"=>$row["correct_answer"],
											"question_maker"=>$row["question_maker"],
											"status"=>$row["status"],
											"first_alloted"=>$row["first_alloted"],
											"current_alloted"=>$row["current_alloted"],
											"passage_name"=>$arrPassageDetails[$row["passage_id"]]);
			}
		}
		return $arrRet;
	}
	function getSkillClassBalanceDetails($connid)
	{
		$this->setpostvars();
		$arrRet = array();
		$condition = "";
		if(isset($this->fromDate) && $this->fromDate != "")
		{
			$arrFromDate = explode('-',$this->fromDate);
			$fromDate = $arrFromDate[2]."-".$arrFromDate[1]."-".$arrFromDate[0];
			$condition.=" AND submit_date >= '".$fromDate."' ";
		}
		if(isset($this->toDate) && $this->toDate != "")
		{
			$arrToDate = explode('-',$this->toDate);
			$toDate = $arrToDate[2]."-".$arrToDate[1]."-".$arrToDate[0];
			$condition.=" AND submit_date <= '".$toDate."' ";
		}

		$query = "SELECT count(*) as qcount,status,skill,class FROM da_questions WHERE subjectno = '".$this->subjectno."' ".$condition." AND sub_subtopic_code != 0 GROUP BY status,skill,class";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["status"]][$row["skill"]][$row["class"]] = $row["qcount"];
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function getTopicClassBalance($connid)
	{
		$arrRet = array();
		$this->setpostvars();
		$condition = "";
		if(isset($this->fromDate) && $this->fromDate != "")
		{
			$arrFromDate = explode('-',$this->fromDate);
			$fromDate = $arrFromDate[2]."-".$arrFromDate[1]."-".$arrFromDate[0];
			$condition.=" AND submit_date >= '".$fromDate."' ";
		}
		if(isset($this->toDate) && $this->toDate != "")
		{
			$arrToDate = explode('-',$this->toDate);
			$toDate = $arrToDate[2]."-".$arrToDate[1]."-".$arrToDate[0];
			$condition.=" AND submit_date <= '".$toDate."' ";
		}
		if(is_array($this->class))
		{
		    foreach ($this->class as $cls)
		    {
		        $condition .= " AND find_in_set('$cls',b.class)>0 ";
		    }
		}
		$query = "SELECT count(*) as qcount,a.status,d.topic_code,a.class FROM da_questions a,da_subSubTopicMaster b,da_subtopicMaster c,da_topicMaster d
				WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = c.subtopic_code AND c.topic_code = d.topic_code AND a.subjectno = '".$this->subjectno."' ".$condition." GROUP BY a.status,c.topic_code,a.class ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["status"]][$row["topic_code"]][$row["class"]] = $row["qcount"];
		}
		return $arrRet;
	}
	function getClassBySubtopic($connid)
	{
		$this->setpostvars();
		$query = "SELECT class FROM da_subSubTopicMaster WHERE sub_subtopic_code = '".$this->subsubtopic_code."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getSubTopicClassBalance($connid)
	{
		$arrRet = array();
		$condition = "";
		if(isset($this->fromDate) && $this->fromDate != "")
		{
			$arrFromDate = explode('-',$this->fromDate);
			$fromDate = $arrFromDate[2]."-".$arrFromDate[1]."-".$arrFromDate[0];
			$condition.=" AND submit_date >= '".$fromDate."' ";
		}
		if(isset($this->toDate) && $this->toDate != "")
		{
			$arrToDate = explode('-',$this->toDate);
			$toDate = $arrToDate[2]."-".$arrToDate[1]."-".$arrToDate[0];
			$condition.=" AND submit_date <= '".$toDate."' ";
		}
		if(is_array($this->class))
		{
		    foreach ($this->class as $cls)
		    {
		        $condition .= " AND find_in_set('$cls',b.class)>0 ";
		    }
		}

		$query = "SELECT count(*) as qcount,a.status,c.subtopic_code,a.class FROM da_questions a,da_subSubTopicMaster b,da_subtopicMaster c
				WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = c.subtopic_code AND a.subjectno = '".$this->subjectno."' ".$condition." GROUP BY a.status,b.subtopic_code,a.class ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["status"]][$row["subtopic_code"]][$row["class"]] = $row["qcount"];
		}
		return $arrRet;
	}
	function getSubSubTopicClassBalance($connid)
	{
		$arrRet = array();
		$condition = "";
		if(isset($this->fromDate) && $this->fromDate != "")
		{
			$arrFromDate = explode('-',$this->fromDate);
			$fromDate = $arrFromDate[2]."-".$arrFromDate[1]."-".$arrFromDate[0];
			$condition.=" AND submit_date >= '".$fromDate."' ";
		}
		if(isset($this->toDate) && $this->toDate != "")
		{
			$arrToDate = explode('-',$this->toDate);
			$toDate = $arrToDate[2]."-".$arrToDate[1]."-".$arrToDate[0];
			$condition.=" AND submit_date <= '".$toDate."' ";
		}
		if(is_array($this->class))
		{
		    foreach ($this->class as $cls)
		    {
		        $condition .= " AND find_in_set('$cls',b.class)>0 ";
		    }
		}
		$query = "SELECT count(*) as qcount,a.status,b.sub_subtopic_code,a.class FROM da_questions a,da_subSubTopicMaster b
				WHERE a.sub_subtopic_code = b.sub_subtopic_code AND a.subjectno = '".$this->subjectno."' ".$condition." GROUP BY a.sub_subtopic_code ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["status"]][$row["class"]][$row["sub_subtopic_code"]] = $row["qcount"];
		}
		return $arrRet;
	}
	
	
}
?>