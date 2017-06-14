<?php
class clstgadminquestions
{
    var $qcode;
    var $question;
    var $answer;
    var $subjectno;
    var $class;
    var $questtype;
    var $topic_code;
    var $subtopic_code;
    var $subsubtopic_code;
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
    var $subtype;
    var $qno;
    var $difficultylevel;
    var $action;
    var $no_of_questions;
    var $group_text;
    var $group_name;
    var $qcodestring;
    var $allotedto;
    var $approveQuestion;
    var $comments;
    var $search_topic;
    var $search_subtopic;
    var $search_subsubtopic;
    var $search_fromclass;
    var $search_toclass;
    var $search_questtype;
    var $search_qmaker;
    var $keyword;
	var $search_status;
	var $search_source;
	var $search_subject;
	var $search_qcode;
	var $current_alloted;
	var $first_alloted;
	var $listaction;
	var $search_substring;
	var $search_subsubtopic_code;
	var $search_topic_code;
	var $search_subtopic_code;
	var $search_criteria;
    var $search_groupid;
	var $schooltestqcode;
	var $import_to_ms;
	var $correct_answer;
	var $display_answer;
	var $ncert_chapter;
	var $search_typeqmaker;
	var $viewallquestions;
	var $school_test_code;
	var $numrecsperpage;
	var $start_date;
	var $end_date;
	var $selectqmaker;
	var $numrecordssperpage;
	var $commonsearch_qmaker;
	var $search_currentalloted; 
    var $errorGroup;  
    var $cameFromsubtopic;  
    var $showquery; 
	var $group_imagedescription;
    function clstgadminquestions()
    {
            $this->clspaging = new clspaging('tgquestionslist');
            $this->qcode = 0;
            $this->question = "";
            $this->answers = "";
            $this->subjectno = 0;
            $this->class = 0;
            $this->questtype = "";
            $this->topic_code = 0;
            $this->subtopic_code = 0;
            $this->subsubtopic_code = 0;
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
            $this->subtype = "";
            $this->qno = "";
            $this->difficultylevel = "";
            $this->action = "";
            $this->no_of_questions = "";
            $this->group_text = "";
            $this->group_name = "";
            $this->qcodestring = "";
            $this->approveQuestion = "";
            $this->comments = "";
            $this->search_topic = "";
            $this->search_subtopic = "";
            $this->search_subsubtopic = "";
            $this->search_fromclass = "";
            $this->search_toclass = "";
            $this->search_qmaker = "";
            $this->search_questtype = "";
            $this->search_status = "";
            $this->keyword = "";
            $this->search_source = "";
            $this->search_subject = "";
            $this->search_qcode = "";
            $this->current_alloted = "";
            $this->first_alloted = "";
            $this->listaction = "";
            $this->search_substring = "";
            $this->search_topic_code = "";
            $this->search_subtopic_code = "";
            $this->search_subsubtopic_code = "";
            $this->search_criteria = "both";
            $this->schooltestqcode = "";
            $this->import_to_ms = "";
            $this->correct_answer = "";
            $this->display_answer = "";
            $this->optiona = "";
            $this->optionb = "";
            $this->optionc = "";
            $this->optiond = "";
            $this->ncert_chapter = "";
            $this->search_typeqmaker = "";
            $this->viewallquestions = "";
            $this->school_test_code = "";
            $this->numrecsperpage = 50;
            $this->start_date = "";
            $this->end_date = "";
            $this->selectqmaker = "";
            $this->numrecordssperpage = "";
            $this->commonsearch_qmaker = "";
            $this->search_currentalloted = "";
            $this->errorGroup = "";
            $this->cameFromsubtopic = "";
            $this->showquery = ""; 
			$this->group_imagedescription = "";
    }
    function setgetvars()
    {
            if(isset($_GET["code"])) $this->qcode = $_GET["code"];
            if(isset($_GET["subtype"])) $this->subtype = $_GET["subtype"];
            if(isset($_GET["codestring"])) $this->qcodestring = $_GET["codestring"];
            if(isset($_GET["action"])) $this->action = $_GET["action"];
            if(isset($_GET["class"])) $this->class = $_GET["class"];
            if(isset($_GET["subject"])) $this->subjectno = $_GET["subject"];
            if(isset($_GET["allotedto"])) $this->allotedto = $_GET["allotedto"];
            if(isset($_GET["status"])) $this->status = $_GET["status"];
            if(isset($_GET["listaction"])) $this->listaction = $_GET["listaction"];
            if(isset($_GET["search_topic"])) $this->search_topic = $_GET["search_topic"];
            if(isset($_GET["search_question"])) $this->question = $_GET["search_question"];
            if(isset($_GET["search_answer"])) $this->answer = $_GET["search_answer"];
            if(isset($_GET["search_subtopic"])) $this->search_subtopic = $_GET["search_subtopic"];
            if(isset($_GET["search_subsubtopic"])) $this->search_subsubtopic = $_GET["search_subsubtopic"];
            if(isset($_GET["keyword"])) $this->keyword = $_GET["keyword"];
            if(isset($_GET["search_source"])) $this->search_source = $_GET["search_source"];
            if(isset($_GET["search_fromclass"])) $this->search_fromclass = $_GET["search_fromclass"];
            if(isset($_GET["search_toclass"])) $this->search_toclass = $_GET["search_toclass"];
            if(isset($_GET["search_questtype"])) $this->search_questtype = $_GET["search_questtype"];
            if(isset($_GET["search_qmaker"])) $this->search_qmaker = $_GET["search_qmaker"];
            if(isset($_GET["search_substring"])) $this->search_substring = $_GET["search_substring"];
            if(isset($_GET["search_qcode"])) $this->search_qcode = $_GET["search_qcode"];
            if(isset($_GET["search_status"])) $this->search_status = $_GET["search_status"];
            if(isset($_GET["search_subsubtopic_code"])) $this->search_subsubtopic_code = $_GET["search_subsubtopic_code"];
            if(isset($_GET["search_subtopic_code"])) $this->search_subtopic_code = $_GET["search_subtopic_code"];
            if(isset($_GET["search_topic_code"])) $this->search_topic_code = $_GET["search_topic_code"];
            if(isset($_GET["typeqmaker"])) $this->search_typeqmaker = $_GET["typeqmaker"];
            if(isset($_GET["schoolTestCode"])) $this->school_test_code = $_GET["schoolTestCode"];
            if(isset($_GET["search_startdate"])) $this->start_date = $_GET["search_startdate"];
            if(isset($_GET["search_enddate"])) $this->end_date = $_GET["search_enddate"];
            if(isset($_GET["numrecsperpage"])) $this->numrecordssperpage = $_GET["numrecsperpage"];
            if(isset($_GET["getgroupid"])) $this->groupid = $_GET["getgroupid"];
            if(isset($_GET["cameFromsubtopic"])) $this->cameFromsubtopic = $_GET["cameFromsubtopic"];
            if(isset($_GET["showquery"])) $this->showquery = $_GET["showquery"];
             /*echo "<pre>";
             print_r($_GET);
             echo "</pre>";*/
    }
    function setpostvars()
    {
            if(isset($_POST["clstgadminquestions_hdnaction"])) $this->action = $_POST["clstgadminquestions_hdnaction"];
            if(isset($_POST["clstgadminquestions_hdnqcode"])) $this->qcode = $_POST["clstgadminquestions_hdnqcode"];
            if(isset($_POST["clstgadminquestions_question"])) $this->question = $_POST["clstgadminquestions_question"];
            if(isset($_POST["clstgadminquestions_answer"])) $this->answer = $_POST["clstgadminquestions_answer"];
            if(isset($_POST["clstgadminquestions_topic"])) $this->topic_code = $_POST["clstgadminquestions_topic"];
            if(isset($_POST["clstgadminquestions_subtopic"])) $this->subtopic_code = $_POST["clstgadminquestions_subtopic"];
            if(isset($_POST["clstgadminquestions_subsubtopic"])) $this->subsubtopic_code = $_POST["clstgadminquestions_subsubtopic"];
            if(isset($_POST["clstgadminquestions_hdnsubtopic"])) $this->setsubTopic = $_POST["clstgadminquestions_hdnsubtopic"];
            if(isset($_POST["clstgadminquestions_questtype"])) $this->questtype = $_POST["clstgadminquestions_questtype"];
            if(isset($_POST["clstgadminquestions_subject"])) $this->subjectno = $_POST["clstgadminquestions_subject"];
            if(isset($_POST["clstgadminquestions_marks"])) $this->ei_marks = $_POST["clstgadminquestions_marks"];
            if(isset($_POST["clstgadminquestions_class"])) $this->class = $_POST["clstgadminquestions_class"];
            if(isset($_POST["clstgadminquestions_source"])) $this->source = $_POST["clstgadminquestions_source"];
            if(isset($_POST["clstgadminquestions_imagedescription"])) $this->image_description = $_POST["clstgadminquestions_imagedescription"];
            if(isset($_POST["clstgadminquestions_subtype"])) $this->subtype = $_POST["clstgadminquestions_subtype"];
            if(isset($_POST["clstgadminquestions_hdnqno"])) $this->qno = $_POST["clstgadminquestions_hdnqno"];
            if(isset($_POST["clstgadminquestions_difficultylevel"])) $this->difficultylevel = $_POST["clstgadminquestions_difficultylevel"];
            if(isset($_POST["clstgadminquestions_noofquestions"])) $this->no_of_questions = $_POST["clstgadminquestions_noofquestions"];
            if(isset($_POST["clstgadminquestions_groupname"])) $this->group_name = $_POST["clstgadminquestions_groupname"];
            if(isset($_POST["clstgadminquestions_grouptext"])) $this->group_text = $_POST["clstgadminquestions_grouptext"];
            if(isset($_POST["clstgadminquestions_groupid"])) $this->groupid = $_POST["clstgadminquestions_groupid"];
            if(isset($_POST["clstgadminquestions_hdnqcodestring"])) $this->qcodestring = $_POST["clstgadminquestions_hdnqcodestring"];
            if(isset($_POST["ApproveQuestion"])) $this->approveQuestion = $_POST["ApproveQuestion"];
            if(isset($_POST["clstgadminquestions_comments"])) $this->comments = $_POST["clstgadminquestions_comments"];
            if(isset($_POST["clstgadminquestions_searchtopic"])) $this->search_topic = $_POST["clstgadminquestions_searchtopic"];
            if(isset($_POST["clstgadminquestions_searchsubtopic"])) $this->search_subtopic = $_POST["clstgadminquestions_searchsubtopic"];
            if(isset($_POST["clstgadminquestions_searchsubsubtopic"])) $this->search_subsubtopic = $_POST["clstgadminquestions_searchsubsubtopic"];
            if(isset($_POST["clstgadminquestions_searchfromclass"])) $this->search_fromclass = $_POST["clstgadminquestions_searchfromclass"];
            if(isset($_POST["clstgadminquestions_searchtoclass"])) $this->search_toclass = $_POST["clstgadminquestions_searchtoclass"];
           	if(isset($_POST["clstgadminquestions_keyword"])) $this->keyword= $_POST["clstgadminquestions_keyword"];
           	if(isset($_POST["clstgadminquestions_searchqmaker"])) $this->search_qmaker= $_POST["clstgadminquestions_searchqmaker"];
           	if(isset($_POST["clstgadminquestions_searchqtype"])) $this->search_questtype=$_POST["clstgadminquestions_searchqtype"];
           	if(isset($_POST["clstgadminquestions_searchstatus"])) $this->search_status=$_POST["clstgadminquestions_searchstatus"];
           	if(isset($_POST["clstgadminquestions_searchsource"])) $this->search_source=$_POST["clstgadminquestions_searchsource"];
           	if(isset($_POST["clstgadminquestions_searchqcode"])) $this->search_qcode=$_POST["clstgadminquestions_searchqcode"];
           	if(isset($_POST["clstgadminquestions_searchsubject"])) $this->search_subject=$_POST["clstgadminquestions_searchsubject"];
           	if(isset($_POST["clstgadminquestions_currentalloted"])) $this->current_alloted = $_POST["clstgadminquestions_currentalloted"];
           	if(isset($_POST["clstgadminquestions_firstalloted"])) $this->first_alloted = $_POST["clstgadminquestions_firstalloted"];
           	if(isset($_POST["clstgadminquestions_onlytg"])) $this->search_criteria = $_POST["clstgadminquestions_onlytg"];
           	if(isset($_POST["clstgadminquestions_importtoms"])) $this->import_to_ms = $_POST["clstgadminquestions_importtoms"];
           	if(isset($_POST["clstgadminquestions_sendtoschooltest"])) $this->schooltestqcode = $_POST["clstgadminquestions_sendtoschooltest"];
           	if(isset($_POST["clstgadminquestions_correctanswer"])) $this->correct_answer = $_POST["clstgadminquestions_correctanswer"];
           	if(isset($_POST["clstgadminquestions_displayanswer"])) $this->display_answer = $_POST["clstgadminquestions_displayanswer"];
           	if(isset($_POST["clstgadminquestions_ncertchapter"])) $this->ncert_chapter = $_POST["clstgadminquestions_ncertchapter"];
			if(isset($_POST["clstgadminquestions_optiona"])) $this->optiona = $_POST["clstgadminquestions_optiona"];
			if(isset($_POST["clstgadminquestions_optionb"])) $this->optionb = $_POST["clstgadminquestions_optionb"];
			if(isset($_POST["clstgadminquestions_optionc"])) $this->optionc = $_POST["clstgadminquestions_optionc"];
			if(isset($_POST["clstgadminquestions_optiond"])) $this->optiond = $_POST["clstgadminquestions_optiond"];
			if(isset($_POST["clstgadminquestions_allquestions"])) $this->viewallquestions = $_POST["clstgadminquestions_allquestions"];
			if(isset($_POST["clstgadminquestions_searchsubstring"])) $this->search_substring = $_POST["clstgadminquestions_searchsubstring"];
			if(isset($_POST["clstgadminquestions_numrecsperpage"])) $this->numrecsperpage = $_POST["clstgadminquestions_numrecsperpage"];
			if(isset($_POST["clstgadminquestions_startdate"])) $this->start_date = $_POST["clstgadminquestions_startdate"];
			if(isset($_POST["clstgadminquestions_enddate"])) $this->end_date = $_POST["clstgadminquestions_enddate"];
			if(isset($_POST["clstgadminquestions_selectqmaker"])) $this->selectqmaker = $_POST["clstgadminquestions_selectqmaker"];
			if(isset($_POST["clstgadminquestions_search_qmaker"])) $this->commonsearch_qmaker = $_POST["clstgadminquestions_search_qmaker"];
			if(isset($_POST["clstgadminquestions_searchcurrentalloted"])) $this->search_currentalloted = $_POST["clstgadminquestions_searchcurrentalloted"];
			if(isset($_POST["clstgadminquestions_searchgroupid"])) $this->search_groupid = $_POST["clstgadminquestions_searchgroupid"];
			if(isset($_POST["clstgadminquestions_groupimagedescription"])) $this->group_imagedescription = $_POST["clstgadminquestions_groupimagedescription"];
                      /*echo "<pre>";
                       print_r($_POST);
                       echo "</pre>";*/
    }
    function pageAddQuestions($connid)
    {
            $this->setgetvars();
            $this->setpostvars();
            if($this->action == "SaveData")
            {
                    if($this->validation($connid))
                    {
                            $string = $this->savedata($connid);
                            echo "<script language=javascript>window.location=\"tgadmin_viewquestion.php?subtype=".$this->subtype."&str=".$string."\"</script>";
                    }
            }
            if($this->action == "UpdateData")
            {
                    $this->updatedata($connid);
                    //echo "qcodestring".$this->qcodestring;
                    echo "<script language=javascript>window.location=\"tgadmin_viewsinglequestion.php?code=".$this->qcode."&codestring=".$this->qcodestring."&subtype=".$this->subtype."\"</script>";
            }
            if($this->action == "CreateCopy")
            {
                    $viewCode = $this->createQuestionCopy($connid);
                    echo "<script language=javascript>window.location=\"tgadmin_viewsinglequestion.php?code=".$viewCode."&codestring=".$this->qcodestring."&subtype=".$this->subtype."\"</script>";
            }
            if($this->action == "DeleteData" || $this->action == "DeleteDataPage")
            {
                    $this->deleteQuestion($connid);
                    //echo "<script language=javascript>window.location=\"tgadmin_viewquestion.php?str=".$this->qcodestring."\"</script>";
                    //echo "<script language=javascript>window.close();</script>";
            }
            if($this->action == "approve")
            {
                    $this->ApproveQuestion($connid);
            }
            if($this->action == "reject")
            {
                    $this->RejectQuestion($connid);
            }
            if($this->action == "SaveChanges")
            {
				$this->saveChanges($connid);
            }
            if($this->action == "ImportData")
            {
            	//$this->importDataToSchoolTest($connid,$schooltestid);
            	$this->importDataToSchoolTest($connid,1);
            }
            if($this->action == "MultipleCreateCopy")
            {
            	$string = $this->createCopyOfSelectedQuestions($connid);
            	if($string != ""){
            	echo "<script language=javascript>window.open('tgadmin_viewquestion.php?str=".$string."','Instructions','left=20,top=20,width=770,height=710,toolbar=0,scrollbars=1,resizable=1')</script>";
            	
            	$url = "tgadmin_questionsFreelancers.php?1=1";
            	if($this->search_topic != '')
				$url.="&search_topic=".$this->search_topic;
				if($this->search_topic_code != '')
					$url.="&search_topic_code=".$this->search_topic_code;
				if($this->search_subtopic != '')
					$url.="&search_subtopic=".$this->search_subtopic;
				if($this->search_subtopic_code != '')
					$url.="&search_subtopic_code=".$this->search_subtopic_code;
				if($this->search_subsubtopic != '')
					$url.="&search_subsubtopic=".$this->search_subsubtopic;
				if($this->search_qmaker != "")
					$url.="&search_qmaker=".$this->search_qmaker;
				if($this->search_questtype != "")
					$url.="&search_questtype=".$this->search_questtype;	
				if($this->search_status != "")
					$url.="&search_status=".$this->search_status;
				if($this->search_source != "")
					$url.="&search_source=".$this->search_source;
				if($this->keyword != "")
					$url.="&keyword=".$this->keyword;		
				if($this->search_fromclass != "")
					$url.="&search_fromclass=".$this->search_fromclass;	
				if($this->search_toclass != "")
					$url.="&search_toclass=".$this->search_toclass;
				if($this->search_typeqmaker != "")
					$url.="&typeqmaker=".$this->search_typeqmaker;
				if($this->search_qcode != "" && $this->search_qcode != 0)	
					$url.="&search_qcode=".$this->search_qcode;
				if($this->search_substring != "" && $this->search_substring != 0)	
					$url.="&search_substring=".$this->search_substring;
				//echo $url;
				//exit;
				echo "<script>window.opener.location.href=\"$url\"</script>";
            	}
            }
            if($this->action == "OnHold")
            {
				$this->setStatusOnHold($connid);            	
            }
    }
    function dateWiseCount($connid,$category)
    {
    	$arrRet = array();
    	$this->setpostvars();
    	//print_r($this->selectqmaker);
    	if(is_array($this->selectqmaker) && count($this->selectqmaker) > 0)
    	{
    		$arrStartDate = explode('-',$this->start_date);
    		$start_date = $arrStartDate[2].$arrStartDate[1].$arrStartDate[0];
    		$arrEndDate = explode('-',$this->end_date);
    		$end_date = $arrEndDate[2].$arrEndDate[1].$arrEndDate[0];
    		$qmakerList = implode("','",$this->selectqmaker);
    		//echo $qmakerList;
    		$condition = "";
    		if($category == "approved")
    			$condition = "  AND status = 5 AND ( copied_from = '0' OR copied_from = '' ) ";
    		else if($category == "made")
    			$condition = " AND ( copied_from = '0' OR copied_from = '' ) ";
    		elseif ($category == "copy_approved")
    			$condtion = "AND status = 5 AND copied_from != '0' AND copied_from != '' ";
    		if($category == "approved" || $category == "copy_approved")	{
    			$query = "SELECT count(*) as count,qmaker FROM tg_questions,tg_comments WHERE tg_comments.qcode = tg_questions.qcode AND type = 'ATUO' AND comment = 'Question Approved' AND DATE_FORMAT(submitdate,'%Y%m%d') >= ".$start_date." AND  DATE_FORMAT(submitdate,'%Y%m%d') <= ".$end_date." and qmaker IN ('".$qmakerList."') ".$condition." GROUP BY qmaker ";
    		} else {
				$query = "SELECT count(*) as count,qmaker FROM tg_questions WHERE DATE_FORMAT(created_date,'%Y%m%d') >= ".$start_date." AND  DATE_FORMAT(created_date,'%Y%m%d') <= ".$end_date." and qmaker IN ('".$qmakerList."') ".$condition." GROUP BY qmaker ";	    			
				}
    		$dbquery = new dbquery($query,$connid);		
    		while($row = $dbquery->getrowarray())
    		{
    			$arrRet[$row["qmaker"]] = array("qmaker"=>$row["qmaker"],
    										"count"=>$row["count"]);
    		}
    	}
    	return $arrRet;
    }
    function setStatusOnHold($connid)
    {
    	if(is_array($this->approveQuestion) && count($this->approveQuestion) >0)
    	{
    		foreach ($this->approveQuestion as $value)
    		{
    			$arrKey = explode('|',$value);
    			$qcode = $arrKey[1];
    			if($qcode != "")
    			{
    				$query = "UPDATE tg_questions SET used_status = '2' WHERE qcode = '".$qcode."' LIMIT 1";
    				$dbquery = new dbquery($query,$connid);
    			}
    		}
    	}
    }
    function validation($connid)
    {
         if(isset($this->no_of_questions) && $this->no_of_questions != "" && ($this->groupid == "" || $this->groupid == 0))
         {
             if($this->checkGroupDuplicate($connid))
             {
                $this->errorGroup = "Group Already Exist Please select the group from main page"; 
             }
         }   
         if(is_array($this->question) && count($this->question) > 0)
            {
                    $arrAlotter = $this->getAlloters($connid);
					for($i=1;$i <= count($this->question);$i ++)
                    {
                            if($this->question[$i] == "" && $i == 1)
                                    $this->error[$i]["question"] = "Please enter the question number ".$i;
                            /*if($this->answer[$i] == "" && $i == 1)
                                    $this->error[$i]["answer"]        = "Please enter the answer for question number ".$i;*/
                            if(($this->topic_code[$i] == "" && $i == 1) || ($this->topic_code[$i] == "" && $this->question[$i] != ""))
                                    $this->error[$i]["topic_code"] = "Please select the topic for question number ".$i;
                            if(($this->subtopic_code[$i] == "" && $i == 1) || ($this->subtopic_code[$i] == "" && $this->question[$i] != ""))
                                    $this->error[$i]["subtopic_code"] = "Please select the subtopic for question number ".$i;
							if(in_array($_SESSION["username"],$arrAlotter))
							{
								if(($this->class[$i] == "" && $i == 1) || ($this->topic_code[$i] == "" && $this->question[$i] != ""))
                                    $this->error[$i]["class"] = "Please select the class for question number ".$i;
                            	if(($this->ei_marks[$i] == "" && $i == 1) || ($this->topic_code[$i] == "" && $this->question[$i] != ""))
                                    $this->error[$i]["marks"] = "Please enter the marks for the question number".$i;
							}

                    }
                    if((is_array($this->error) && count($this->error) >0) || $this->errorGroup != "")
                            return false;
                    else
                            return true;
            }
    }
    function checkGroupDuplicate($connid)
    {
      $query = "SELECT count(*) FROM tg_groupmaster WHERE groupname = '".$this->groupname."' and grouptext != '' ";
      $dbquery = new dbquery($query,$connid);
      $row = $dbquery->getrowarray();
      if($row[0] == 0)
       return false;
      else
       return true;
    }  
    function savedata($connid)
    {
            $string = "";
           	$groupid = $this->groupid;
            $this->qmaker = $_SESSION["username"];
			$arrAllowedAllotment = array('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george');
            if(isset($this->no_of_questions) && $this->no_of_questions != "" && ($this->groupid == "" || $this->groupid == 0))
            {
                    $groupid = $this->saveGroup($connid);
            }
            if(is_array($this->question) && count($this->question) > 0)
            {
                    for($i=1;$i <= count($this->question);$i ++)
                    {
                            if($this->question[$i] != "")
                            {
                                    $condition = "";
									$cnt_ques = 0;
									$cnt_answer = 0;
									$cnt_group = 0;
									if($groupid == "" || $groupid == 0)
										$flag = 0;
									$current_alloted = "";
									$cnt_imagedescription = 0;
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
                                     
                                    if(in_array($this->qmaker,$arrAllowedAllotment) && $flag == 0)
                                    {
                                    	$current_alloted = $this->calculateCurrentAlloter($connid,$this->class[$i],$subject);
                                    }
									
									
                                    $query = "INSERT INTO tg_questions ".
                                                     "SET question = '".$this->question[$i]."',".
                                                     "answer = '".$this->answer[$i]."',".
                                                     "class = '".$this->class[$i]."',".
                                                     "topic_code = '".$this->topic_code[$i]."',".
                                                     "subtopic_code = '".$this->subtopic_code[$i]."',".
                                                     "sub_subtopic_code = '".$this->subsubtopic_code[$i]."',".
                                                     "ei_marks = '".$this->ei_marks[$i]."',".
                                                     "questtype = '".$this->questtype[$i]."',".
                                                     "level = '".$this->difficultylevel[$i]."',".
                                                     "qmaker = '".$this->qmaker."',".
                                                     "current_alloted = '".$current_alloted."',".
                                                     "first_alloted = '".$current_alloted."',".
                                                     "status = '1',".$condition.
                                                     "subjectno = '".$this->subjectno."',";

                                    if(isset($this->no_of_questions) && $this->no_of_questions != " ")
                                                   $query.= "groupid = '".$groupid."',";

                                    $query.= "source = '".$this->source[$i]."',image_description='".$this->image_description[$i]."',".
                                                     "difficulty_level = '".$this->difficultylevel[$i]."',".
                                                     "created_date = NOW()";
                                    //echo $query;
                                    $dbquery = new dbquery($query,$connid);
                                    $string.= $dbquery->insertid.",";
                                    if(in_array($this->qmaker,$arrAllowedAllotment))
                                     {
										$cnt_ques = $this->saveImages($connid,$this->question[$i],$dbquery->insertid,"Q",$this->subjectno,$this->class[$i]);
										$cnt_answer = $this->saveImages($connid,$this->answer[$i],$dbquery->insertid,"A",$this->subjectno,$this->class[$i]);
										if($groupid != "" || $groupid != 0)
											$cnt_group = $this->saveImages($connid,$this->group_text,$groupid,"GT",$this->subjectno,$this->class[$i]);
										if($this->image_description[$i] != "" && $cnt_ques == 0 && $cnt_answer == 0)	
											$cnt_imagedescription = $this->saveImageDescription($connid,$this->image_description[$i],$dbquery->insertid,"IDO",$this->subjectno,$this->class[$i]);
										if($this->group_imagedescription != "" && $cnt_group == 0)	
											$cnt_groupimagedescription = $this->saveImageDescription($connid,$this->group_imagedescription,$groupid,"GIDO",$this->subjectno,$this->class[$i]);
									 }
									 if($cnt_ques >0 || $cnt_answer >0 || $cnt_imagedescription > 0 || $cnt_group > 0 || $cnt_groupimagedescription > 0)
									 	$flag = 1;
									 if($flag == 1)
										{
											/*if($cnt_group >0 || $cnt_groupimagedescription > 0)
												$queryCA = "UPDATE tg_questions SET current_alloted = 'Designer',first_alloted='Designer',status = '7' WHERE qcode = '".$dbquery->insertid."' LIMIT 1";		
											else*/
											$queryCA = "UPDATE tg_questions SET current_alloted = 'Designer',first_alloted='Designer',status = '7' WHERE qcode = '".$dbquery->insertid."' LIMIT 1";
											$dbqueryCA = new dbquery($queryCA,$connid);
											$current_alloted = "Designer";
										}	
                                    if($current_alloted != "" && $flag == 0)
                                            $this->updateAllotedCount($connid,$this->class[$i],$subject,$current_alloted);
									
                            }
                    }
            }
            return $string;
    }
	function saveImages($connid,$orig,$id,$position, $subject,$class)
	{
		preg_match_all("/src=\"(.*?)image\/(.*?)\"/i", stripslashes($orig), $matches, PREG_SET_ORDER);
		$cnt_mathes = count($matches);
		if($subject == 1 || $subject == 2)
			$parent_subject = $subject;
		else
			$parent_subject = 3;
		$flag = 0;
		for($i=0 ; $i<$cnt_mathes ;$i++)
		{
			$image_name = $matches[$i][2];
			$query = "SELECT * FROM tg_images WHERE id = '".$id."' AND (image_name = '".$image_name."' OR final_image_name = '".$image_name."') ";
			$dbquery = new dbquery($query,$connid);

			if($dbquery->numrows() == 0)
			{
				if($position == "GT")
					$queryP = "SELECT * FROM tg_images WHERE id = '".$id."'";
				else
					$queryP = "SELECT * FROM tg_images WHERE id = '".$id."' AND where_in_question = '".$position."'";

				$dbqueryP = new dbquery($queryP,$connid);
				$num = $dbqueryP->numrows() + 1;
				
				$queryS = "INSERT INTO tg_images SET id=".$id.",image_name='".$image_name."',image_no=".$num.",where_in_question='".$position."' , subjectno=".$subject.",parent_subjectno = '".$parent_subject."',class=".$class." , current_alloted='Designer',qmaker='".$_SESSION["username"]."', lastmodifieddate='".date("Y-m-d H:i:s")."'";
				$dbqueryS = new dbquery($queryS,$connid);
				if($dbqueryS->affectedrows() > 0)
				$flag = 1;
			}
		}
		return $flag;
	}
	function saveImageDescription($connid,$orig,$id,$position, $subject,$class)
	{
		$image_name = "";
		if($subject == 1 || $subject == 2)
			$parent_subject = $subject;
		else
			$parent_subject = 3;
		$flag = 0;
		$query = "SELECT * FROM tg_images WHERE id = '".$id."'";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() == 0)
		{
			$queryP = "SELECT * FROM tg_images WHERE id = '".$id."' AND where_in_question = '".$position."'";
			$dbqueryP = new dbquery($queryP,$connid);
			$num = $dbqueryP->numrows() + 1;
			
			$queryS = "INSERT INTO tg_images SET id=".$id.",image_name='".$image_name."',image_no=".$num.",where_in_question='".$position."' , subjectno=".$subject.",parent_subjectno = '".$parent_subject."',class=".$class." , current_alloted='Designer',qmaker='".$_SESSION["username"]."', lastmodifieddate='".date("Y-m-d H:i:s")."'";
			$dbqueryS = new dbquery($queryS,$connid);
			if($dbqueryS->affectedrows() > 0)
				$flag = 1;
		}
		return $flag;
	}
    function saveGroup($connid)
    {
            $this->setpostvars();
            $query = "INSERT INTO tg_groupmaster SET ".
                             "noofquesreqd = '".$this->no_of_questions."',".
                             "groupname = '".$this->group_name."',".
                             "grouptext = '".$this->group_text."',".
							 "groupimage_description = '".$this->group_imagedescription."',".
                             "subjectno = '".$this->subjectno."'";
            $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            $groupid = $dbquery->insertid;
            return $groupid;
    }
    function getQuestionsByTopicSubTopic($connid)
    {
            $this->setpostvars();
            $arrRet = array();
            $papercode = "0";
            $qno = "0";
            $option_string = "";
            $query = "SELECT * FROM tg_questions WHERE topic_code = '".$this->topic_code."' AND (subtopic_code = '".$this->subtopic_code."' OR subtopic_code = '".$this->setsubTopic."') AND questtype =  '".$this->questtype."'";
            $dbquery = new dbquery($query,$connid);
            while ($row = $dbquery->getrowarray())
            {
                    $arrRet[$row["qcode"]] = array("qcode"=>$row["qcode"],
                                                    "question"=>$row["question"],
                                                    "ei_marks"=>$row["ei_marks"],
                                                    "image_description"=>$row["image_description"],
                                                    "status"=>$row["status"],
                                                    "bench_mark"=>$row["bench_mark"],
                                                    "qmaker"=>$row["qmaker"]
                                                    );
            }
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
            	
            $query = "SELECT subtopic_code,description FROM tg_subtopicmaster WHERE topic_code = '".$topic_code."' ".$condition;
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
    function getTopicBySubjectClass($connid)
    {
    	$this->setpostvars();
    	$arrRet = array();
    	$condition_class = "AND classes LIKE '%".$this->class."%'";
    	
    	if($this->class == 'All')
    		$condition_class = "";
    			
    	if($this->subjectno == "3")
    		$query = "SELECT topic_code,description FROM tg_topicmaster WHERE parent_subjectno = '".$this->subjectno."' ".$condition_class;
    	else
    		$query = "SELECT topic_code,description FROM tg_topicmaster WHERE subjectno = '".$this->subjectno."' ".$condition_class;
    	$dbquery = new dbquery($query,$connid);
    	while($row = $dbquery->getrowarray())
    	{
    		$arrRet[$row["topic_code"]] = array("topic_code" => $row["topic_code"],
    											"description" =>$row["description"]);

    	}
    	return $arrRet;
    }
    function getTopicBySubjectAndClass($connid,$subject,$class)
    {
    	$this->setpostvars();
    	$arrRet = array();
    	if($subject == "3")
    		$query = "SELECT topic_code,description FROM tg_topicmaster WHERE parent_subjectno = '".$subject."' AND classes LIKE '%".$class."%'";
    	else
    		$query = "SELECT topic_code,description FROM tg_topicmaster WHERE subjectno = '".$subject."' AND classes LIKE '%".$class."%'";
    	$dbquery = new dbquery($query,$connid);
    	while($row = $dbquery->getrowarray())
    	{
    		$arrRet[$row["topic_code"]] = array("topic_code" => $row["topic_code"],
    											"description" =>$row["description"]);

    	}
    	return $arrRet;
    }
    function getAllGroups($connid)
    {
            $arrRet = array();
            $query = "SELECT groupid,noofquesreqd,grouptext,groupname,subjectno FROM tg_groupmaster WHERE groupname != '' ORDER BY groupname";
            $dbquery = new dbquery($query,$connid);
            while ($row = $dbquery->getrowarray())
            {
                    $arrRet[$row["groupid"]] = array("groupid"=>$row["groupid"],
                                                                                     "noofquesreqd"=>$row["noofquesreqd"],
                                                                                     "grouptext"=>$row["grouptext"],
                                                                                     "groupname"=>$row["groupname"],
                                                                                     "subjectno"=>$row["subjectno"]
                                                                            );
            }
            return $arrRet;
    }
    function getQuestionDetailsByQcodes($connid,$str)
    {
            $arrRet = array();
            $str = substr($str,0,-1);
             //echo $str;
            /*$query = "SELECT tg_questions.*,tg_topicmaster.description as topic,
            tg_subtopicmaster.description as subtopic,tg_questypemaster.instruction,tg_subjectmaster.description as subject,

            FROM tg_questions,tg_topicmaster,tg_subtopicmaster,tg_questypemaster,tg_subjectmaster
            WHERE tg_questions.topic_code = tg_topicmaster.topic_code
            AND tg_questions.subtopic_code = tg_subtopicmaster.subtopic_code

            AND tg_questions.questtype = tg_questypemaster.code
            AND tg_questions.subjectno = tg_subjectmaster.subjectno
            AND qcode IN (".$str.")";*/
           $query = "SELECT tg_questions.*,tg_topicmaster.description as topic,tg_subtopicmaster.description as subtopic,tg_subsubtopicmaster.description as subsubtopic,
                              tg_subjectmaster.description as subject,tg_questypemaster.instruction,tg_difficultylevel.description as difflevel,grouptext,groupimage_description
                              FROM tg_questions
                              LEFT JOIN tg_topicmaster ON tg_questions.topic_code = tg_topicmaster.topic_code
                              LEFT JOIN tg_subtopicmaster ON tg_questions.subtopic_code = tg_subtopicmaster.subtopic_code
                              LEFT JOIN tg_subsubtopicmaster ON tg_questions.sub_subtopic_code = tg_subsubtopicmaster.sub_subtopic_code
                              LEFT JOIN tg_subjectmaster ON tg_questions.subjectno = tg_subjectmaster.subjectno
                              LEFT JOIN tg_questypemaster ON tg_questions.questtype = tg_questypemaster.code
                              LEFT JOIN tg_groupmaster ON tg_groupmaster.groupid = tg_questions.groupid
                              LEFT JOIN tg_difficultylevel ON tg_questions.difficulty_level = tg_difficultylevel.id
                              WHERE qcode IN (".$str.")";

            $dbquery = new dbquery($query,$connid);

            while ($row = $dbquery->getrowarray())
            {
                $copied_from = "";   
            	if($row["copied_from"] != 0)
            		$copied_from = $row["copied_from"];
            		
            	$arrRet[$row["qcode"]] = array( "qcode"=>$row["qcode"],
                                                "question"=>$row["question"],
                                                "answer"=>$row["answer"],
                                                "class"=>$row["class"],
                                                "subject"=>$row["subject"],
                                                "topic"=>$row["topic"],
                                                "topic_code"=>$row["topic_code"],
                                                "subtopic"=>$row["subtopic"],
                                                "subtopic_code"=>$row["subtopic_code"],
                                                "sub_subtopic_code"=>$row["subsubtopic"],
                                                "subsubtopic_code"=>$row["sub_subtopic_code"],
                                                "questtype"=>$row["questtype"],
                                                "instruction"=>$row["instruction"],
                                                "subjectno"=>$row["subjectno"],
                                                "source"=>$row["source"],
                                                "qmaker"=>$row["qmaker"],
                                                "groupid"=>$row["groupid"],
                                                "image_description"=>$row["image_description"],
                                                "copied_from"=>$copied_from,
                                                "grouptext"=>$row["grouptext"],
                                                "difflevel"=>$row["difflevel"],
												"group_imagedescription"=>$row["groupimage_description"]
                    );
            }
            //print_r($arrRet);
            return $arrRet;
    }
    function getGroupOfQuestions($connid,$str)
    {
            $str = substr($str,0,-1);
            $query = "SELECT DISTINCT grouptext FROM tg_groupmaster,tg_questions WHERE tg_questions.groupid = tg_groupmaster.groupid AND qcode IN (".$str.")";
            $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            return $row["grouptext"];
    }
    function getGroupIDOfQuestions($connid,$str)
    {
            $str = substr($str,0,-1);
            $query = "SELECT DISTINCT tg_questions.groupid FROM tg_groupmaster,tg_questions WHERE tg_questions.groupid = tg_groupmaster.groupid AND qcode IN (".$str.")";
            $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            return $row["groupid"];
    }
    function retrieveQuestionDetials($connid)
    {
            $this->setpostvars();
            $this->setgetvars();
            $query = "SELECT question,answer,class,subjectno,topic_code,subtopic_code,source,qmaker,image_description,
                              sub_subtopic_code,questtype,difficulty_level,groupid,ei_marks,status FROM tg_questions WHERE qcode = '".$this->qcode."'";

            $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            $queryGt = "SELECT grouptext,groupimage_description FROM tg_groupmaster WHERE groupid = '".$row["groupid"]."'";
            $dbqueryGt = new dbquery($queryGt,$connid);
            $rowGt = $dbqueryGt->getrowarray();

            $this->question = $row["question"];
            $this->answer = $row["answer"];
            $this->class = $row["class"];
            $this->subjectno = $row["subjectno"];
            $this->topic_code = $row["topic_code"];
            $this->subtopic_code = $row["subtopic_code"];
            $this->subsubtopic_code = $row["sub_subtopic_code"];
            $this->questtype = $row["questtype"];
            $this->difficultylevel = $row["difficulty_level"];
            $this->group_text = $rowGt["grouptext"];
            $this->groupid = $row["groupid"];
            $this->ei_marks = $row["ei_marks"];
            $this->status = $row["status"];
            $this->qmaker = $row["qmaker"];
            $this->source = $row["source"];
            $this->image_description = $row["image_description"];
			$this->group_imagedescription = $rowGt["groupimage_description"];
    }
    function updatedata($connid)
    {
            $groupid = $this->groupid;
            $grouptext = $this->group_text;
			$group_imagedescription = $this->group_imagedescription;
            $congroup = "";
            $cnt_ques = 0;
			$cnt_answer = 0;
			$cnt_group = 0;
			$cnt_imagedescription = 0;
			$flag = 0;
            $this->qmaker = $_SESSION["username"];
            $arrAllowedAllotment = array('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george');
            if($groupid != "" && $groupid != 0)
            {
            	$congroup = "groupid = '".$groupid."',";
            }
                    $query = "UPDATE tg_questions ".
                             "SET question = '".$this->question."',".
                             "answer = '".$this->answer."',".
                             "class = '".$this->class."',".
                             "topic_code = '".$this->topic_code."',".
                             "subtopic_code = '".$this->subtopic_code."',".
                             "sub_subtopic_code = '".$this->subsubtopic_code."',".
                             "ei_marks = '".$this->ei_marks."',".
                             "questtype = '".$this->questtype."',".$congroup.
                             "level = '".$this->difficultylevel."',";
                             //"subjectno = '".$this->subjectno."',";

            $query.= "source = '".$this->source."', image_description = '".$this->image_description."',".
                             "difficulty_level = '".$this->difficultylevel."',".
                             "modified_date = NOW() WHERE qcode = '".$this->qcode."' LIMIT 1";
            //echo $query;
            $dbquery = new dbquery($query,$connid);
            if(in_array($this->qmaker,$arrAllowedAllotment))
             {
				$cnt_ques = $this->saveImages($connid,$this->question,$this->qcode,"Q",$this->subjectno,$this->class);
				$cnt_answer = $this->saveImages($connid,$this->answer,$this->qcode,"A",$this->subjectno,$this->class);
				if($groupid != "" || $groupid != 0)
					$cnt_group = $this->saveImages($connid,$this->group_text,$groupid,"GT",$this->subjectno,$this->class);
				if($this->image_description != "" && $cnt_ques == 0 && $cnt_answer == 0 && $cnt_group == 0)	
					$cnt_imagedescription = $this->saveImageDescription($connid,$this->image_description,$this->qcode,"IDO",$this->subjectno,$this->class);
				if($this->group_imagedescription != "" && $cnt_group == 0)	
					$cnt_groupimagedescription = $this->saveImageDescription($connid,$this->group_imagedescription,$groupid,"GIDO",$this->subjectno,$this->class);	
			 }
			 if($cnt_ques > 0 || $cnt_answer >0 || $cnt_group > 0 || $cnt_imagedescription > 0 || $cnt_groupimagedescription > 0)
			 	$flag = 1;
			 if($flag == 1)
			 {
			 	if($cnt_group >0 || $cnt_groupimagedescription > 0)
					$queryA = "UPDATE tg_questions SET current_alloted = 'Designer',first_alloted = 'Designer',status = '7' WHERE groupid = '".$groupid."'";
				else
					$queryA = "UPDATE tg_questions SET current_alloted = 'Designer',first_alloted = 'Designer',status = '7' WHERE qcode = '".$this->qcode."' LIMIT 1";
							
			 	$dbqueryA = new dbquery($queryA,$connid);
			 }
            $this->updateGroup($connid,$groupid,$grouptext,$group_imagedescription);
            
    }
    function updateGroup($connid,$groupid,$grouptext,$group_imagedescription = "")
    {
            if($groupid != "" && $groupid != 0 && $grouptext != "")
            {
                    $query = "UPDATE tg_groupmaster SET grouptext = '".$grouptext."',groupimage_description = '".$group_imagedescription."' WHERE groupid = '".$groupid."' LIMIT 1";
                    $dbquery = new dbquery($query,$connid);
            }
    }
    function deleteQuestion($connid)
    {
            $query = "DELETE FROM tg_questions WHERE qcode = '".$this->qcode."' LIMIT 1";
            $dbquery = new dbquery($query,$connid);
            if($this->action == "DeleteDataPage")
            {
                    echo "<script>window.opener.location.href=\"tgadmin_viewquestion.php?str=".$this->qcodestring."\"</script>";
                    echo "<script>window.close();</script>";
            }
    }
            function getQuestionType($connid)
            {
                    $this->setgetvars();
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
        function getSubsubtopicBySubTopic($connid,$subtopic_code)
        {
                $arrRet = array();
                $query = "SELECT sub_subtopic_code,description FROM tg_subsubtopicmaster WHERE subtopic_code = '".$subtopic_code."'";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["sub_subtopic_code"]] = array("sub_subtopic_code"=>$row["sub_subtopic_code"],
                                                                   "description"=>$row["description"]
                        );
                }
                return $arrRet;
        }
        function getAllQuestionsForApproval($connid,$freelancerpool=0)
        {
                $arrRet = array();
                $condition = "";
                $or1 = "";
                $or2 = "";
                $this->setgetvars();
                
                $this->setpostvars();
               	$this->clspaging->setgetvars();
                if($this->numrecordssperpage != "" && $this->numrecordssperpage != 0)
                	$this->clspaging->numofrecsperpage = $this->numrecordssperpage;
                else
	                $this->clspaging->numofrecsperpage = $this->numrecsperpage;
                if($this->start_date != "")
                {
                	$arrStDt = explode('-',$this->start_date);
                	$start_date = $arrStDt[2].$arrStDt[1].$arrStDt[0];
                }
                if($this->end_date != "")
                {
                	$arrEnDt = explode('-',$this->end_date);
                	$end_date = $arrEnDt[2].$arrEnDt[1].$arrEnDt[0];
                }
                $arrAlloters = $this->getAlloters($connid);
               
                
               /* $queryCount = "SELECT count(tg_questions.qcode) FROM tg_questions, tg_topicmaster, tg_subtopicmaster, tg_subjectmaster, tg_questypemaster, tg_difficultylevel,tg_subsubtopicmaster
                                        WHERE tg_topicmaster.topic_code = tg_questions.topic_code
                                        AND tg_subtopicmaster.subtopic_code = tg_questions.subtopic_code
                                        AND tg_subsubtopicmaster.sub_subtopic_code = tg_questions.sub_subtopic_code
                                        AND tg_subjectmaster.subjectno = tg_questions.subjectno
                                        AND tg_questypemaster.code = tg_questions.questtype
                                        AND tg_difficultylevel.id = tg_questions.difficulty_level ";
                $query = "SELECT tg_questions. * , tg_topicmaster.description AS topic, tg_subtopicmaster.description AS subtopic, tg_subjectmaster.description AS subject, tg_questypemaster.instruction, tg_difficultylevel.description AS difflevel,tg_subsubtopicmaster.description as subsubtopic
                                        FROM tg_questions, tg_topicmaster, tg_subtopicmaster, tg_subjectmaster, tg_questypemaster, tg_difficultylevel,tg_subsubtopicmaster
                                        WHERE tg_topicmaster.topic_code = tg_questions.topic_code
                                        AND tg_subtopicmaster.subtopic_code = tg_questions.subtopic_code
                                        AND tg_subsubtopicmaster.sub_subtopic_code = tg_questions.sub_subtopic_code
                                        AND tg_subjectmaster.subjectno = tg_questions.subjectno
                                        AND tg_questypemaster.code = tg_questions.questtype
                                        AND tg_difficultylevel.id = tg_questions.difficulty_level";*/
                $queryCount = "SELECT count(tg_questions.qcode)
                                                        FROM tg_questions
                                                        LEFT JOIN tg_topicmaster ON tg_topicmaster.topic_code = tg_questions.topic_code
                                                        LEFT JOIN tg_subtopicmaster ON tg_subtopicmaster.subtopic_code = tg_questions.subtopic_code
                                                        LEFT JOIN tg_subsubtopicmaster ON tg_subsubtopicmaster.sub_subtopic_code = tg_questions.sub_subtopic_code
                                                        LEFT JOIN tg_questypemaster ON tg_questypemaster.code = tg_questions.questtype
                                                        LEFT JOIN tg_difficultylevel ON tg_difficultylevel.id = tg_questions.difficulty_level
                                                        LEFT JOIN tg_groupmaster ON tg_questions.groupid = tg_groupmaster.groupid
                                                        LEFT JOIN tg_subjectmaster ON tg_subjectmaster.subjectno = tg_questions.subjectno WHERE 1 = 1 ";

               $query = "SELECT tg_questions. * , tg_topicmaster.description AS topic, tg_subtopicmaster.description AS subtopic, tg_subjectmaster.description AS subject, tg_questypemaster.instruction, tg_difficultylevel.description AS difflevel, tg_subsubtopicmaster.description AS subsubtopic,tg_groupmaster.grouptext as groupdetails,tg_groupmaster.groupname as groupname,tg_groupmaster.groupimage_description as groupimage_description
                                                        FROM tg_questions
                                                        LEFT JOIN tg_topicmaster ON tg_topicmaster.topic_code = tg_questions.topic_code
                                                        LEFT JOIN tg_subtopicmaster ON tg_subtopicmaster.subtopic_code = tg_questions.subtopic_code
                                                        LEFT JOIN tg_subsubtopicmaster ON tg_subsubtopicmaster.sub_subtopic_code = tg_questions.sub_subtopic_code
                                                        LEFT JOIN tg_questypemaster ON tg_questypemaster.code = tg_questions.questtype
                                                        LEFT JOIN tg_difficultylevel ON tg_difficultylevel.id = tg_questions.difficulty_level
                                                        LEFT JOIN tg_groupmaster ON tg_questions.groupid = tg_groupmaster.groupid
                                                        LEFT JOIN tg_subjectmaster ON tg_subjectmaster.subjectno = tg_questions.subjectno WHERE 1 = 1 ";



            /*if($this->search_topic == 'yes' || $this->search_subtopic == 'yes' || $this->search_subsubtopic == 'yes')
            {
                                $condition.=" AND ( ";
                    if($this->search_topic == 'yes')
                    {
                                    $condition.=" tg_topicmaster.description LIKE '%".$this->keyword."%'";
                                    $or1 = " OR ";
                    }
                    if($this->search_subtopic == 'yes')
                    {
                                    $condition.=$or1." tg_subtopicmaster.description LIKE '%".$this->keyword."%'";
                                    $or2 = " OR ";
                    }
                    if($this->search_subsubtopic == 'yes')
                    {
                                    $condition.=$or2." tg_subsubtopicmaster.description LIKE '%".$this->keyword."%'";
                    }
                    $condition.=" ) ";
            }*/
                 if(!in_array($_SESSION["username"],$arrAlloters) && $_SESSION["username"] != "vishnu" && !($_SESSION['username']=='devpal' || $_SESSION['username']=='rajan' || $_SESSION['username']=='nilesh.goswami'))
                 	 	$condition.="AND tg_questions.qmaker = '".$_SESSION["username"]."'";
            	 if($this->keyword != "")
                         $condition.="AND ( tg_topicmaster.description LIKE '%".$this->keyword."%' OR tg_subtopicmaster.description LIKE '%".$this->keyword."%' OR tg_subsubtopicmaster.description LIKE '%".$this->keyword."%' )";
                 if($this->search_topic != "")
                         $condition.="AND tg_topicmaster.description LIKE '%".$this->search_topic."%'";

                 if($this->search_subtopic != "")
                         $condition.="AND tg_subtopicmaster.description LIKE '%".$this->search_subtopic."%'";
                 if($this->search_subsubtopic != "")
                         $condition.="AND tg_subsubtopicmaster.description LIKE '%".$this->search_subsubtopic."%'";
            if($this->search_topic_code != "" && $this->search_topic_code != 0)
            	$condition.=" AND tg_questions.topic_code = '".$this->search_topic_code."' ";
            if($this->search_subtopic_code != "" && $this->search_subtopic_code != 0)
            	$condition.=" AND tg_questions.subtopic_code = '".$this->search_subtopic_code."' ";
            if($this->search_source != "")
                    $condition.=" AND tg_questions.source = '".$this->search_source."'";
            if($this->search_status != "" && $this->search_status != 0)
                    $condition.=" AND tg_questions.status = '".$this->search_status."'";
            if($this->search_questtype != "")
                    $condition.=" AND tg_questions.questtype = '".$this->search_questtype."'";
            if($this->search_currentalloted != "")
                    $condition.=" AND tg_questions.current_alloted = '".$this->search_currentalloted."' AND copied_from = 0 AND status != 5 AND status != 6 ";        
            if($this->search_qmaker != "")
                   $condition.=" AND tg_questions.qmaker = '".$this->search_qmaker."'";
            if($this->commonsearch_qmaker != "")        
            		$condition.=" AND tg_questions.qmaker = '".$this->commonsearch_qmaker."'";
            if($this->class != "" && $this->class != 0 && !is_array($this->class))
                    $condition.=" AND tg_questions.class = '".$this->class."'";
            if($this->subjectno != "" && $this->subjectno != 0 && !is_array($this->subjectno))
                    $condition.=" AND tg_questions.parent_subjectno = '".$this->subjectno."' ";
            if($this->allotedto != "")
                    $condition.=" AND tg_questions.current_alloted = '".$this->allotedto."' ";
            if($this->allotedto != "" && $_GET["subject"] != "" && $_GET["subject"] != 0 && is_array($this->subjectno))
            		$condition.=" AND tg_questions.parent_subjectno = '".$_GET["subject"]."' ";
            if($this->allotedto != "" && $_GET["class"] != "" && $_GET["class"] != 0 && is_array($this->class))
                    $condition.=" AND tg_questions.class = '".$_GET["class"]."'";
            if($this->status != "" && $this->status != 0)
                    $condition.=" AND tg_questions.status = '".$this->status."' ";
            if($this->topic_code[1] != "" && $this->topic_code[1] == 0)
                    $condition.=" AND tg_questions.topic_code = '".$this->topic_code[1]."' ";
            if($this->subtopic_code[1] != "" && $this->subtopic_code[1] == 0)
                    $condition.=" AND tg_questions.subtopic_code = '".$this->subtopic_code[1]."' ";
            if($this->subsubtopic_code[1] != "" && $this->subsubtopic_code[1] == 0)
                    $condition.=" AND tg_questions.sub_subtopic_code = '".$this->subsubtopic_code[1]."' ";
             if($this->search_subsubtopic_code != "" && $this->search_subsubtopic_code!=0)
                             $condition.=" AND tg_questions.sub_subtopic_code = '".$this->search_subsubtopic_code."' ";
            if($this->questtype != "" && $this->questtype== 0)
                    $condition.=" AND tg_questions.questtype = '".$this->questtype."' ";
            if($this->search_fromclass != "" && $this->search_fromclass != 0)
                            $condition.=" AND tg_questions.class >= '".$this->search_fromclass."' ";
                if($this->search_toclass != "" && $this->search_toclass != 0)
                            $condition.=" AND tg_questions.class <= '".$this->search_toclass."' ";
            if($this->search_qcode != "" && $this->search_qcode != 0)
                            $condition.=" AND tg_questions.qcode IN (".$this->search_qcode.") ";
            if($this->search_typeqmaker == "ei")
            	$condition.=" AND tg_questions.qmaker IN ('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george') ";
            if($this->search_typeqmaker == "nonei" || $freelancerpool == 1)
            	$condition.=" AND tg_questions.qmaker NOT IN ('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george') ";
            if($this->start_date != "")
            	$condition.=" AND DATE_FORMAT(tg_questions.created_date,'%Y%m%d') >= '".$start_date."'";
            if($this->end_date != "")
            	$condition.=" AND DATE_FORMAT(tg_questions.created_date,'%Y%m%d') <= '".$end_date."'";
            	
            if(is_array($this->search_subject) && count($this->search_qcode) >0)
            {
                    $ps = implode(',',$this->search_subject);
                    $condition.=" AND tg_questions.parent_subjectno IN (".$ps.") ";
            }
            if($this->search_substring != "")
            {
                    $condition.=" AND tg_questions.parent_subjectno IN (".$this->search_substring.") ";
            }
            if($this->search_groupid != "")
               $condition.= " AND tg_questions.groupid = '".$this->search_groupid."' ";
            if($freelancerpool == 1 || $this->cameFromsubtopic == 1)
            	$condition.=" AND used_status = '0' ";
            if($this->action == "approve" || $this->allotedto != "")
                    $condition.= " AND tg_questions.status != 5 AND used_status = 0 ";
            if($this->action == "reject" || $this->allotedto != "")
                    $condition.= " AND tg_questions.status != 6 AND used_status = 0 ";

            $queryCount = $queryCount." ".$condition;
            //echo $queryCount;
            $dbqueryCnt = new dbquery($queryCount,$connid);
            $rowCnt = $dbqueryCnt->getrowarray();
            $this->clspaging->numofrecs = $rowCnt[0];

            if($this->clspaging->numofrecs >0)
            {
                    $this->clspaging->getcurrpagevardb();
            }
            $query = $query." ".$condition." ORDER BY qcode ".$this->clspaging->limit;
            if($this->showquery != "")
            {
                echo $query;
            }
            //echo $query;
            $dbquery = new dbquery($query,$connid);

            while($row = $dbquery->getrowarray())
            {
                $copied_from = "";
                if($row["copied_from"] != 0)    
                	$copied_from = $row["copied_from"];
            	/*$query = "SELECT tg_questions.*,tg_topicmaster.description as topic,tg_subtopicmaster.description as subtopic,tg_subsubtopicmaster.description as subsubtopic,
                                      tg_subjectmaster.description as subject,tg_questypemaster.instruction,tg_difficultylevel.description as difflevel
                                      FROM tg_questions
                                      LEFT JOIN tg_topicmaster ON tg_questions.topic_code = tg_topicmaster.topic_code
                                      LEFT JOIN tg_subtopicmaster ON tg_topicmaster.topic_code = tg_subtopicmaster.topic_code
                                      LEFT JOIN tg_subsubtopicmaster ON tg_subtopicmaster.subtopic_code = tg_subsubtopicmaster.subtopic_code
                                      LEFT JOIN tg_subjectmaster ON tg_questions.subjectno = tg_subjectmaster.subjectno
                                      LEFT JOIN tg_questypemaster ON tg_questions.questtype = tg_questypemaster.code
                                      LEFT JOIN tg_difficultylevel ON tg_questions.difficulty_level = tg_difficultylevel.id AND qcode = '".$row1["qcode"]."'";*/

                                    $arrRet[$row["qcode"]] = array( "qcode"=>$row["qcode"],
			                                                        "question"=>$row["question"],
			                                                        "answer"=>$row["answer"],
			                                                        "class"=>$row["class"],
			                                                        "ei_marks"=>$row["ei_marks"],
			                                                        "subject"=>$row["subject"],
			                                                        "subjectno"=>$row["subjectno"],
			                                                        "qmaker"=>$row["qmaker"],
			                                                        "source"=>$row["source"],
			                                                        "groupid"=>$row["groupid"],
			                                                        "groupname"=>$row["groupname"],
			                                                        "copied_from"=>$copied_from,
			                                                        "parent_subjectno"=>$row["parent_subjectno"],
			                                                        "topic_code"=>$row["topic_code"],
			                                                        "subtopic_code"=>$row["subtopic_code"],
			                                                        "sub_subtopic_code"=>$row["sub_subtopic_code"],
			                                                        "questtype"=>$row["questtype"],
			                                                        "topic"=>$row["topic"],
			                                                        "subtopic"=>$row["subtopic"],
			                                                        "sub_subtopic_code"=>$row["subsubtopic"],
			                                                        "subsubtopic"=>$row["sub_subtopic_code"],
			                                                        "instruction"=>$row["instruction"],
			                                                        "difflevel"=>$row["difflevel"],
																	"image_description"=>$row["image_description"],
			                                                        "difficulty_level"=>$row["difficulty_level"],
			                                                        "groupdetails"=>$row["groupdetails"],
																	"groupimage_description"=>$row["groupimage_description"]
                            );
            }
            //print_r($arrRet);
            return $arrRet;
        }
        function calculateCurrentAlloter($connid,$class,$subject)
        {
                $arrRet = array();
                $query = "SELECT userID,alloted FROM tg_allotmentmaster WHERE class = '".$class."' AND subjectno = '".$subject."' AND userID != '".$_SESSION["username"]."' AND target != 0 ";
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
        function getAlloters($connid)
        {
                $arrRet = array();
                $query = "SELECT DISTINCT userID FROM tg_allotmentmaster";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[] = $row["userID"];
                }
                return $arrRet;
        }
		function getAllotersWithSubject($connid)
		{
			$arrRet = array();
			$query = "SELECT DISTINCT userID,subjectno FROM tg_allotmentmaster";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["userID"]] = $row["subjectno"];
			}
			return $arrRet;
		}
		function getAllotersBySubject($connid)
		{
			$this->setgetvars();
			$query = "SELECT DISTINCT userID FROM tg_allotmentmaster WHERE subjectno = '".$this->subjectno."'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[] = $row["userID"];
			}
			return $arrRet;
		}
        function getQcount($connid)
        {
                $arrRet = array();
                $query = "SELECT count(*) as count,current_alloted,tg_questions.class,tg_questions.parent_subjectno FROM tg_questions WHERE status != '5' AND status != '6' AND used_status = 0
                                  GROUP BY current_alloted,parent_subjectno,class";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["current_alloted"]][$row["parent_subjectno"]][$row["class"]] = $row["count"];
                }
                //print_r($arrRet);
                return $arrRet;
        }
        function ApproveQuestion($connid)
        {
                $status = "approved";

                if(is_array($this->approveQuestion) && count($this->approveQuestion)>0)
                {
                        foreach ($this->approveQuestion as $value)
                        {
                                $arrKey = explode('|',$value);
		            			$key = $arrKey[0];
		            			$qcode = $arrKey[1];
								$queryQmaker = "SELECT qmaker,topic_code,subtopic_code,class FROM tg_questions WHERE qcode = '".$qcode."' LIMIT 1";
                            	$dbqueryQmaker = new dbquery($queryQmaker,$connid);
                            	$rowQmaker = $dbqueryQmaker->getrowarray();	
								$username = $rowQmaker["qmaker"];
								if(eregi('_',$username))
								{
									$this->createCopyOfTeacherQuestions($key,$qcode,$connid);
								}
   								else
								{
									
									
											//$arrLoginDtls = explode('_',$username);
				            			$condition_img = "";
				            			if($this->image_description[$key] != "")
				            				$condition_img = " image_description = '".$this->image_description[$key]."',";	
				            			
										if(eregi('_',$username))
		   									$arrLoginDtls = explode('_',$username);
		                        		$query = "UPDATE tg_questions SET status = '5' WHERE qcode = '".$qcode."' AND current_alloted = '".$_SESSION["username"]."' AND qmaker != '".$_SESSION["username"]."' LIMIT 1";
		                                $dbquery = new dbquery($query,$connid);
		                                if($dbquery->affectedrows() > 0)
		                                	$this->saveAutoComments($connid,$qcode,$status);
		                               
		                               	$querySC = "UPDATE tg_questions ".
		                                         "SET question = '".$this->question[$key]."',".
								                 "answer = '".$this->answer[$key]."',".
								                 "class = '".$this->class[$key]."',".
								                 "topic_code = '".$this->topic_code[$key]."',".
								                 "subtopic_code = '".$this->subtopic_code[$key]."',".
								                 "sub_subtopic_code = '".$this->subsubtopic_code[$key]."',".
								                 "ei_marks = '".$this->ei_marks[$key]."',".
								                 "questtype = '".$this->questtype[$key]."',".
								                 "level = '".$this->difficultylevel[$key]."',".
								                 "subjectno = '".$this->subjectno[$key]."',".$condition_img.
								                 "modified_date = NOW() WHERE qcode = '".$qcode."' AND (qmaker = '".$_SESSION["username"]."' OR current_alloted = '".$_SESSION["username"]."') LIMIT 1";
		                                $dbquerySC = new dbquery($querySC,$connid);
		                                if($this->groupid[$key] != '' && $this->group_text[$key] != '')
										{
											$queryGrp = "UPDATE tg_groupmaster SET grouptext = '".$this->group_text[$key]."' WHERE groupid = '".$this->groupid[$key]."' LIMIT 1";
											$dbqueryGrp = new dbquery($queryGrp,$connid);
											
										}
							}// Else condition ends here.....
                        }
                }
        }
        function RejectQuestion($connid)
        {
                $status = "rejected";
                if(is_array($this->approveQuestion) && count($this->approveQuestion)>0)
                {
                        foreach ($this->approveQuestion as $qcode)
                        {
                                $arrKey = explode('|',$qcode);
                        		$key = $arrKey[0];
		            			$questioncode = $arrKey[1];
								$queryQmaker = "SELECT qmaker,topic_code,subtopic_code,class FROM tg_questions WHERE qcode = '".$questioncode."' LIMIT 1";
                            	$dbqueryQmaker = new dbquery($queryQmaker,$connid);
                            	$rowQmaker = $dbqueryQmaker->getrowarray();	
								$username = $rowQmaker["qmaker"];
								if(eregi('_',$username))
								{
	                        		$query = "UPDATE tg_questions SET used_status = '2' WHERE qcode = '".$questioncode."' LIMIT 1";
    								$dbquery = new dbquery($query,$connid);		
									
								}
								else
								{
									$query = "UPDATE tg_questions SET status = '6' WHERE qcode = '".$questioncode."' AND current_alloted = '".$_SESSION["username"]."' AND qmaker != '".$_SESSION["username"]."' LIMIT 1";
	                                $dbquery = new dbquery($query,$connid);
	                                if($dbquery->affectedrows() > 0)
	                                	$this->saveAutoComments($connid,$questioncode,$status);
								}
								
                        }
                }
        }
        function saveCommentsByQcode($connid)
        {
                $query1 = "SELECT qcode FROM tg_comments WHERE qcode = '".$this->qcode."' AND comment = '".$this->comments."' AND commenter='".$_SESSION["username"]."' AND type='Q' ORDER BY id DESC limit 1";
				$dbquery1 = new dbquery($query1,$connid);
				if($dbquery1->numrows() == 0)
				{
					$query = "INSERT INTO tg_comments SET qcode = '".$this->qcode."',comment = '".$this->comments."',commenter='".$_SESSION["username"]."',type='Q',submitdate=NOW()";
                	$dbquery = new dbquery($query,$connid);
                	$this->changeStatus($connid,$this->qcode);
                	echo "<b>".$_SESSION["username"]."</b>(".date("d-m-y").")".$this->comments."&nbsp;&nbsp;<font color=red>Comments are saved</font>";
				}
				else
				{
					echo "<b>Comments are already saved</b>";
					
				}
					
        }
        function saveAutoComments($connid,$qcode,$status)
        {
                $query = "INSERT INTO tg_comments SET qcode = '".$qcode."',comment = 'Question $status',commenter='".$_SESSION["username"]."',type='ATUO',submitdate=NOW()";
                $dbquery = new dbquery($query,$connid);
        }
        function updateAllotedCount($connid,$class,$subject,$allotedto)
        {
                $query = "UPDATE tg_allotmentmaster SET alloted = alloted + 1 WHERE userID = '".$allotedto."' AND class = '".$class."' AND subjectno = '".$subject."' LIMIT 1";
                $dbquery = new dbquery($query,$connid);
        }
        function changeStatus($connid,$qcode)
        {
                $qmaker = $this->getQmakerByQcode($connid,$qcode);
                $string = $this->getCurrentAllotedByQcode($connid,$qcode);

                $arrStr = explode('|',$string);
                if($arrStr[0] == $_SESSION["username"] && $arrStr[1] != '2' && $arrStr[0] != $qmaker)
                        $query = "UPDATE tg_questions SET status = '2',current_alloted = '".$qmaker."' WHERE qcode = '".$qcode."' LIMIT 1";
                elseif ($arrStr[0] == $_SESSION["username"] && $arrStr[1] == '2' && $arrStr[0] == $qmaker)
                        $query = "UPDATE tg_questions SET status = '3',current_alloted = '".$arrStr[2]."' WHERE qcode = '".$qcode."' LIMIT 1";

                $dbquery = new dbquery($query,$connid);
        }
        function getQmakerByQcode($connid,$qcode)
        {
            $query = "SELECT qmaker FROM tg_questions WHERE qcode = '".$qcode."'";
            $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            return $row["qmaker"];
        }
        function getCurrentAllotedByQcode($connid,$qcode)
        {
            $query = "SELECT current_alloted,status,first_alloted FROM tg_questions WHERE qcode = '".$qcode."'";
            $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            return $row["current_alloted"]."|".$row["status"]."|".$row["first_alloted"];
        }
        function getLatestCommentsByQcode($connid,$qcode)
        {
            $arrRet = array();
            $query = "SELECT id,comment,commenter,DATE_FORMAT(submitdate,'%d-%m-%Y') as comment_date 
            FROM tg_comments WHERE qcode = '".$qcode."' AND type != 'I' ORDER BY id DESC LIMIT 2";
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                    $arrRet[$row["id"]] = array("id"=>$row["id"],
                                                "comment"=>$row["comment"],
                                                "commenter"=>$row["commenter"],
                                                "comment_date"=>$row["comment_date"]
                    );
            }
            //print_r($arrRet);
            return $arrRet;
        }
		function getAllCommentsByQcode($connid)
        {
            $this->setgetvars();
			$arrRet = array();
			$qcode = 0;
			if($this->qcode != "" && $this->qcode != 0)
				$qcode = $this->qcode;
            $query = "SELECT id,comment,commenter,DATE_FORMAT(submitdate,'%d-%m-%Y') as comment_date 
            FROM tg_comments WHERE qcode = '".$qcode."' AND type != 'I' ORDER BY id DESC";
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                    $arrRet[$row["id"]] = array("id"=>$row["id"],
                                                "comment"=>$row["comment"],
                                                "commenter"=>$row["commenter"],
                                                "comment_date"=>$row["comment_date"]
                    );
            }
            //print_r($arrRet);
            return $arrRet;
        }
        function saveChanges($connid)
        {
                //print_r($this->approveQuestion);
        		if(is_array($this->approveQuestion) && count($this->approveQuestion)>0)
                {
                        foreach ($this->approveQuestion as $value)
                        {
                                $arrKey = explode('|',$value);
		            			$key = $arrKey[0];
		            			$qcode = $arrKey[1];
		            			$condition_img = "";
								
								$queryQmaker = "SELECT qmaker,topic_code,subtopic_code,class FROM tg_questions WHERE qcode = '".$qcode."' LIMIT 1";
                            	$dbqueryQmaker = new dbquery($queryQmaker,$connid);
                            	$rowQmaker = $dbqueryQmaker->getrowarray();	
								$username = $rowQmaker["qmaker"];
								if(eregi('_',$username))
								{
									$this->createCopyOfTeacherQuestions($key,$qcode,$connid);
								}
   								else
								{
									if($this->image_description[$key] != "")
		            				$condition_img = " image_description = '".$this->image_description[$key]."',";	
		            			
	                               	$querySC = "UPDATE tg_questions ".
	                                         "SET question = '".$this->question[$key]."',".
							                 "answer = '".$this->answer[$key]."',".
							                 "class = '".$this->class[$key]."',".
							                 "topic_code = '".$this->topic_code[$key]."',".
							                 "subtopic_code = '".$this->subtopic_code[$key]."',".
							                 "sub_subtopic_code = '".$this->subsubtopic_code[$key]."',".
							                 "ei_marks = '".$this->ei_marks[$key]."',".
							                 "questtype = '".$this->questtype[$key]."',".
							                 "level = '".$this->difficultylevel[$key]."',".
							                 "subjectno = '".$this->subjectno[$key]."',".$condition_img.
							                 "modified_date = NOW() WHERE qcode = '".$qcode."' LIMIT 1";
	                                $dbquerySC = new dbquery($querySC,$connid);
	                                if($this->groupid[$key] != '' && $this->group_text[$key] != '')
									{
										$queryGrp = "UPDATE tg_groupmaster SET grouptext = '".$this->group_text[$key]."' WHERE groupid = '".$this->groupid[$key]."' LIMIT 1";
										$dbqueryGrp = new dbquery($queryGrp,$connid);
										
									}
								}
		            			
                        }
                }
        }
        function getQcountByStatus($connid)
        {
                $arrRet = array();
                $query = "SELECT count(*) as count,tg_statusmaster.id,tg_statusmaster.status,class,parent_subjectno FROM tg_questions,tg_statusmaster WHERE tg_questions.status = tg_statusmaster.id AND used_status = 0 GROUP BY tg_questions.status,parent_subjectno,class";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["id"]][$row["parent_subjectno"]][$row["class"]] = $row["count"];

                }
                return $arrRet;
        }
        function getQuestionsStatus($connid)
        {
                $arrRet = array();
                $query = "SELECT id,status FROM tg_statusmaster";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["id"]] = array("id"=>$row["id"],
                                                        "status"=>$row["status"]
                        );
                }
                return $arrRet;
        }
        function getQuestionMakers($connid)
        {
            $arrRet = array();
            $query = "SELECT DISTINCT qmaker FROM tg_questions WHERE qmaker != '' ";
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                    $arrRet[] = $row["qmaker"];
            }
            return $arrRet;
        }
		function getQmakersWithSubject($connid)
		{
			$arrRet = array();
			$query = "SELECT DISTINCT qmaker,subjectno FROM tg_questions where subjectno NOT IN (4,5,6) and qmaker != ''";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["qmaker"]] = $row["subjectno"];
			}
			return $arrRet;
		}
        function createQuestionCopy($connid)
        {
            $this->qmaker = $_SESSION["username"];
			$chkStatus = "1";
			$groupid = $this->groupid;
            $arrAllowedAllotment = array('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george');
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
			
            $chkGrpImgApproved = $this->getGroupImageStatus($connid,$this->groupid);
            if(in_array($this->qmaker,$arrAllowedAllotment))
            {
            	if($chkGrpImgApproved > 0 )
				{
					$current_alloted = "Designer";
					$chkStatus = "7";
				}
				else
				{
					$current_alloted = $this->calculateCurrentAlloter($connid,$this->class,$subject);
					$chkStatus = "1";
				}
				
            }
                $query = "INSERT INTO tg_questions ".
                     "SET question = '".$this->question."',".
                     "answer = '".$this->answer."',".
                     "class = '".$this->class."',".
                     "topic_code = '".$this->topic_code."',".
                     "subtopic_code = '".$this->subtopic_code."',".
                     "sub_subtopic_code = '".$this->subsubtopic_code."',".
                     "ei_marks = '".$this->ei_marks."',".
                     "questtype = '".$this->questtype."',".
                     "level = '".$this->difficultylevel."',".
                     "qmaker = '".$this->qmaker."',".
                     "current_alloted = '".$current_alloted."',".
                     "first_alloted = '".$current_alloted."',".
                     "status = '".$chkStatus."',".$condition.
                     "subjectno = '".$this->subjectno."',";

                /*if(isset($this->no_of_questions) && $this->no_of_questions != " ")*/
                               $query.= "groupid = '".$this->groupid."',";

                $query.= "source = '".$this->source."',".
                                 "difficulty_level = '".$this->difficultylevel."',".
                                 "created_date = NOW()";
                //echo $query;
                $dbquery = new dbquery($query,$connid);
				if(in_array($this->qmaker,$arrAllowedAllotment))
	             {
					$cnt_ques = $this->saveImages($connid,$this->question,$dbquery->insertid,"Q",$this->subjectno,$this->class);
					$cnt_answer = $this->saveImages($connid,$this->answer,$dbquery->insertid,"A",$this->subjectno,$this->class);
					if($groupid != "" || $groupid != 0)
						$cnt_group = $this->saveImages($connid,$this->group_text,$groupid,"GT",$this->subjectno,$this->class);
					if($this->image_description != "" && $cnt_ques == 0 && $cnt_answer == 0 && $cnt_group == 0)	
						$cnt_imagedescription = $this->saveImageDescription($connid,$this->image_description,$dbquery->insertid,"IDO",$this->subjectno,$this->class);
					if($this->group_imagedescription != "" && $cnt_group == 0)	
						$cnt_groupimagedescription = $this->saveImageDescription($connid,$this->group_imagedescription,$groupid,"GIDO",$this->subjectno,$this->class);
				 }
				 if($cnt_ques > 0 || $cnt_answer >0 || $cnt_group > 0 || $cnt_imagedescription > 0 || $cnt_groupimagedescription >0)
				 	$flag = 1;
				 if($flag == 1)
				 {
				 	$queryA = "UPDATE tg_questions SET current_alloted = 'Designer',first_alloted = 'Designer',status = '7' WHERE qcode = '".$dbquery->insertid."' AND status != '5' LIMIT 1";
				 	$dbqueryA = new dbquery($queryA,$connid);
				 }
                if($current_alloted != "" && $flag == 0)
                    $this->updateAllotedCount($connid,$this->class,$subject,$current_alloted);

                return $dbquery->insertid;
        }
        function setUsedStatus($connid,$qcode)
        {
        	$query = "UPDATE tg_questions SET used_status = '1' WHERE qcode = '".$qcode."' LIMIT 1";
        	$dbquery = new dbquery($query,$connid);
        }
        function createCopyOfSelectedQuestions($connid)
        {
        	
        	//$arrApproveKeys = array_keys($this->approveQuestion);
        	$string = 0;
			$cnt_ques = 0;
			$cnt_answer = 0;
			$cnt_group = 0;
			$cnt_imagedescription = 0;
			$flag = 0;
			$arrAllowedAllotment = array('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george');
        	if(is_array($this->approveQuestion) && count($this->approveQuestion)>0)
        	{
	        	$this->qmaker = $_SESSION["username"];
	        	foreach ($this->approveQuestion as $value)
	        	{
		            $arrKey = explode('|',$value);
		            $key = $arrKey[0];
		            $qcode = $arrKey[1];
		            $queryQmaker = "SELECT qmaker FROM tg_questions WHERE qcode = '".$qcode."' LIMIT 1";
                    $dbqueryQmaker = new dbquery($queryQmaker,$connid);
                    $rowQmaker = $dbqueryQmaker->getrowarray();
                            
	        		$queryCD = "SELECT count(*) FROM tg_questions WHERE question = '".$this->question[$key]."' 
		            		AND answer = '".$this->answer[$key]."' AND class ='".$this->class[$key]."' AND topic_code = '".$this->topic_code[$key]."' AND qmaker = '".$this->qmaker."'";
		            $dbqueryCD = new dbquery($queryCD,$connid);
		            $rowCD = $dbqueryCD->getrowarray();
		            if($rowCD[0] == 0)
		            {
		            	if($qcode != "")
			            {
			            	$this->setUsedStatus($connid,$qcode);
			            }
		        		if($this->subjectno[$key] == "4" || $this->subjectno[$key] == "5" || $this->subjectno[$key] == "6")
			            {
			                     $condition = "parent_subjectno = '3',";
			                     $subject = "3";
			            }
			            else
			            {
			                     $condition = "parent_subjectno = '".$this->subjectno[$key]."',";
			                     $subject = $this->subjectno[$key];
			            }
			            //$current_alloted = $this->calculateCurrentAlloter($connid,$this->class[$key],$subject);
			            
			            
						$chkGrpImgApproved = $this->getGroupImageStatus($connid,$this->groupid[$key]);	
						if($chkGrpImgApproved > 0)
						{
							$current_alloted = "Designer";
							$chkStatus = "7";
						}
						else
						{
							$current_alloted = $this->qmaker;
							$chkStatus = "1";
						}
							
						$status = "approved";
		            	
		            	$query = "INSERT INTO tg_questions ".
			                 "SET question = '".$this->question[$key]."',".
			                 "answer = '".$this->answer[$key]."',".
			                 "class = '".$this->class[$key]."',".
			                 "topic_code = '".$this->topic_code[$key]."',".
			                 "subtopic_code = '".$this->subtopic_code[$key]."',".
			                 "sub_subtopic_code = '".$this->subsubtopic_code[$key]."',".
			                 "ei_marks = '".$this->ei_marks[$key]."',".
			                 "questtype = '".$this->questtype[$key]."',".
			                 "level = '".$this->difficultylevel[$key]."',".
			                 "qmaker = '".$this->qmaker."',".
			                 "copied_from = '".$qcode."',".
			                 "current_alloted = '".$current_alloted."',".
			                 "first_alloted = '".$current_alloted."',".
			                 "status = '".$chkStatus."',".$condition.
			                 "subjectno = '".$this->subjectno[$key]."',";
			
			           /*if(isset($this->no_of_questions) && $this->no_of_questions != " ")*/
			                           $query.= "groupid = '".$this->groupid[$key]."',";
			
			            $query.= "source = '".$this->source[$key]."',image_description = '".$this->image_description[$key]."',".
			                             "difficulty_level = '".$this->difficultylevel[$key]."',".
			                             "created_date = NOW()";
			            //echo $query;
			            $dbquery = new dbquery($query,$connid);
			            $string.=$dbquery->insertid.",";
			            
			            
						if($this->group_text[$key] != "" && $this->group_text[$key] != "")
							$this->updateGroup($connid,$this->groupid[$key],$this->group_text[$key],$this->group_imagedescription[$key]);
							
						if(in_array($this->qmaker,$arrAllowedAllotment) && $rowQmaker["qmaker"] != "ASSET")
						{
							$cnt_ques = $this->saveImages($connid,$this->question[$key],$dbquery->insertid,"Q",$this->subjectno[$key],$this->class[$key]);
							$cnt_answer = $this->saveImages($connid,$this->answer[$key],$dbquery->insertid,"A",$this->subjectno[$key],$this->class[$key]);
							if($groupid != "" || $groupid != 0)
								$cnt_group = $this->saveImages($connid,$this->group_text[$key],$this->groupid[$key],"GT",$this->subjectno[$key],$this->class[$key]);
							if($this->image_description[$key] != "" && $cnt_ques == 0 && $cnt_answer == 0 && $cnt_group == 0)	
								$cnt_imagedescription = $this->saveImageDescription($connid,$this->image_description[$key],$dbquery->insertid,"IDO",$this->subjectno[$key],$this->class[$key]);
							if($this->group_imagedescription[$key] != "" && $cnt_group == 0)	
								$cnt_groupimagedescription = $this->saveImageDescription($connid,$this->group_imagedescription[$key],$this->groupid[$key],"GIDO",$this->subjectno[$key],$this->class[$key]);	
						}
						if($cnt_ques > 0 || $cnt_answer > 0 || $cnt_group > 0 || $cnt_imagedescription > 0 || $cnt_groupimagedescription > 0)
							$flag = 1;

						if($flag == 0 && $chkGrpImgApproved == 0)			
						{
							$queryApprove = "UPDATE tg_questions SET status = '5' WHERE qcode = '".$dbquery->insertid."' LIMIT 1";
	                        $dbqueryApprove = new dbquery($queryApprove,$connid);
	                        if($dbqueryApprove->affectedrows() >0)
	                        	$this->saveAutoComments($connid,$dbquery->insertid,$status);
	                        	
						}
						else if($flag == 1)
						{
							$queryCA = "UPDATE tg_questions SET current_alloted = 'Designer',first_alloted='Designer',status = '7' WHERE qcode = '".$dbquery->insertid."' AND status != '5' LIMIT 1";
							$dbqueryCA = new dbquery($queryCA,$connid);
							$current_alloted = 'Designer';
						}
						
						if($current_alloted != "" && $flag == 0)
			                $this->updateAllotedCount($connid,$this->class[$key],$subject,$current_alloted);
		            }
	        	}
        	}
        	return $string;
		}
		function createCopyOfTeacherQuestions($key,$qcode,$connid)
		{
			$string = 0;
			$cnt_ques = 0;
			$cnt_answer = 0;
			$cnt_group = 0;
			$cnt_imagedescription = 0;
			$flag = 0;
			$arrAllowedAllotment = array('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george');
			$queryQmaker = "SELECT qmaker FROM tg_questions WHERE qcode = '".$qcode."' LIMIT 1";
	        $dbqueryQmaker = new dbquery($queryQmaker,$connid);
	        $rowQmaker = $dbqueryQmaker->getrowarray();
            $this->qmaker = $_SESSION["username"];                
			$queryCD = "SELECT count(*) FROM tg_questions WHERE question = '".$this->question[$key]."' 
        		AND answer = '".$this->answer[$key]."' AND class ='".$this->class[$key]."' AND topic_code = '".$this->topic_code[$key]."' AND qmaker = '".$this->qmaker."'";
        	$dbqueryCD = new dbquery($queryCD,$connid);
        	$rowCD = $dbqueryCD->getrowarray();
	        if($rowCD[0] == 0)
	        {
	        	if($qcode != "")
	            {
	            	$this->setUsedStatus($connid,$qcode);
	            }
	    		if($this->subjectno[$key] == "4" || $this->subjectno[$key] == "5" || $this->subjectno[$key] == "6")
	            {
	                     $condition = "parent_subjectno = '3',";
	                     $subject = "3";
	            }
	            else
	            {
	                     $condition = "parent_subjectno = '".$this->subjectno[$key]."',";
	                     $subject = $this->subjectno[$key];
	            }
	            //$current_alloted = $this->calculateCurrentAlloter($connid,$this->class[$key],$subject);
	            
	            
				$chkGrpImgApproved = $this->getGroupImageStatus($connid,$this->groupid[$key]);	
				if($chkGrpImgApproved > 0)
				{
					$current_alloted = "Designer";
					$chkStatus = "7";
				}
				else
				{
					$current_alloted = $this->qmaker;
					$chkStatus = "1";
				}
					
				$status = "approved";
	        	
	        	$query = "INSERT INTO tg_questions ".
	                 "SET question = '".$this->question[$key]."',".
	                 "answer = '".$this->answer[$key]."',".
	                 "class = '".$this->class[$key]."',".
	                 "topic_code = '".$this->topic_code[$key]."',".
	                 "subtopic_code = '".$this->subtopic_code[$key]."',".
	                 "sub_subtopic_code = '".$this->subsubtopic_code[$key]."',".
	                 "ei_marks = '".$this->ei_marks[$key]."',".
	                 "questtype = '".$this->questtype[$key]."',".
	                 "level = '".$this->difficultylevel[$key]."',".
	                 "qmaker = '".$this->qmaker."',".
	                 "copied_from = '".$qcode."',".
	                 "current_alloted = '".$current_alloted."',".
	                 "first_alloted = '".$current_alloted."',".
	                 "status = '".$chkStatus."',".$condition.
	                 "subjectno = '".$this->subjectno[$key]."',";
	
	           /*if(isset($this->no_of_questions) && $this->no_of_questions != " ")*/
	                           $query.= "groupid = '".$this->groupid[$key]."',";
	
	            $query.= "source = '".$this->source[$key]."',image_description = '".$this->image_description[$key]."',".
	                             "difficulty_level = '".$this->difficultylevel[$key]."',".
	                             "created_date = NOW()";
	            //echo $query;
	            $dbquery = new dbquery($query,$connid);
	            $string.=$dbquery->insertid.",";
	            
	            
				if($this->group_text[$key] != "" && $this->group_text[$key] != "")
					$this->updateGroup($connid,$this->groupid[$key],$this->group_text[$key],$this->group_imagedescription[$key]);
					
				if(in_array($this->qmaker,$arrAllowedAllotment) && $rowQmaker["qmaker"] != "ASSET")
				{
					$cnt_ques = $this->saveImages($connid,$this->question[$key],$dbquery->insertid,"Q",$this->subjectno[$key],$this->class[$key]);
					$cnt_answer = $this->saveImages($connid,$this->answer[$key],$dbquery->insertid,"A",$this->subjectno[$key],$this->class[$key]);
					if($groupid != "" || $groupid != 0)
						$cnt_group = $this->saveImages($connid,$this->group_text[$key],$this->groupid[$key],"GT",$this->subjectno[$key],$this->class[$key]);
					if($this->image_description[$key] != "" && $cnt_ques == 0 && $cnt_answer == 0 && $cnt_group == 0)	
						$cnt_imagedescription = $this->saveImageDescription($connid,$this->image_description[$key],$dbquery->insertid,"IDO",$this->subjectno[$key],$this->class[$key]);
					if($this->group_imagedescription[$key] != "" && $cnt_group == 0)	
						$cnt_groupimagedescription = $this->saveImageDescription($connid,$this->group_imagedescription[$key],$this->groupid[$key],"GIDO",$this->subjectno[$key],$this->class[$key]);	
				}
				if($cnt_ques > 0 || $cnt_answer > 0 || $cnt_group > 0 || $cnt_imagedescription > 0 || $cnt_groupimagedescription > 0)
					$flag = 1;
	
				if($flag == 0 && $chkGrpImgApproved == 0)			
				{
					$queryApprove = "UPDATE tg_questions SET status = '5' WHERE qcode = '".$dbquery->insertid."' LIMIT 1";
	                $dbqueryApprove = new dbquery($queryApprove,$connid);
	                if($dbqueryApprove->affectedrows() >0)
	                	$this->saveAutoComments($connid,$dbquery->insertid,$status);
	                	
				}
				else if($flag == 1)
				{
					$queryCA = "UPDATE tg_questions SET current_alloted = 'Designer',first_alloted='Designer',status = '7' WHERE qcode = '".$dbquery->insertid."' AND status != '5' LIMIT 1";
					$dbqueryCA = new dbquery($queryCA,$connid);
					$current_alloted = 'Designer';
				}
				
				if($current_alloted != "" && $flag == 0)
	                $this->updateAllotedCount($connid,$this->class[$key],$subject,$current_alloted);
			}
			//return $string;
		}
        function getTopicAndQuestionTypeBalanceDetails($connid,$approved)
        {
                $arrRet = array();
                if($approved == 1)
                        $query = "SELECT count(*) as count,questtype,subtopic_code FROM tg_questions WHERE status = '5' GROUP BY questtype,subtopic_code";
                else
                        $query = "SELECT count(*) as count,questtype,subtopic_code FROM tg_questions GROUP BY questtype,subtopic_code ";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
            {
                    $arrRet[$row["questtype"]][$row["subtopic_code"]] = $row["count"];
            }
            return $arrRet;
        }
        function getTopicSubTopicAndQuestionTypeBalanceDetails($connid,$approved)
        {
                $arrRet = array();
                if($approved == 1)
				{
					$query = "SELECT count(*) as count,questtype,sub_subtopic_code FROM tg_questions WHERE status = '5' 
					    AND class = '".$this->class."' 
						AND topic_code = '".$this->topic_code[1]."' 
						AND subtopic_code = '".$this->subtopic_code[1]."' 
						GROUP BY questtype,sub_subtopic_code";
				}
                else if($approved == 2)
				{
					$query = "SELECT count(*) as count,questtype,sub_subtopic_code FROM tg_questions 
						WHERE class = '".$this->class."'
						AND topic_code = '".$this->topic_code[1]."' 
						AND subtopic_code = '".$this->subtopic_code[1]."'
						AND qmaker IN ('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george')
						GROUP BY questtype,sub_subtopic_code ";			
				}
                else
				{
					$query = "SELECT count(*) as count,questtype,sub_subtopic_code FROM tg_questions 
						WHERE class = '".$this->class."'
						AND topic_code = '".$this->topic_code[1]."' 
						AND subtopic_code = '".$this->subtopic_code[1]."'
						AND used_status = 0
						GROUP BY questtype,sub_subtopic_code ";			
					
				}   
				//echo $query.$approved."<br>";     
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
	            {
	                    $arrRet[$row["questtype"]][$row["sub_subtopic_code"]] = $row["count"];
	            }
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
        function getMindsparkQuestions($connid)
        {
        	$arrRet = array();
        	$this->setpostvars();
        	$this->setgetvars();
        	$this->clspaging->setgetvars();
            $this->clspaging->numofrecsperpage = 30;
            $condition = "";
            $database1 = "educatio_educat.";
            $queryCount = "SELECT count(".$database1."tg_questions.qcode)
	                        FROM tg_questions
	                        LEFT JOIN ".$database1."tg_topicmaster ON ".$database1."tg_topicmaster.topic_code = ".$database1."tg_questions.topic_code
	                        LEFT JOIN ".$database1."tg_subtopicmaster ON ".$database1."tg_subtopicmaster.subtopic_code = ".$database1."tg_questions.subtopic_code
	                        LEFT JOIN ".$database1."tg_subsubtopicmaster ON ".$database1."tg_subsubtopicmaster.sub_subtopic_code = ".$database1."tg_questions.sub_subtopic_code
	                        LEFT JOIN ".$database1."tg_questypemaster ON ".$database1."tg_questypemaster.code = ".$database1."tg_questions.questtype
	                        LEFT JOIN ".$database1."tg_difficultylevel ON ".$database1."tg_difficultylevel.id = ".$database1."tg_questions.difficulty_level
	                        LEFT JOIN ".$database1."tg_groupmaster ON ".$database1."tg_questions.groupid = ".$database1."tg_groupmaster.groupid
	                        LEFT JOIN ".$database1."tg_subjectmaster ON ".$database1."tg_subjectmaster.subjectno = ".$database1."tg_questions.subjectno WHERE tg_questions.subjectno = 2 ";

            $query = "SELECT CONCAT('T',".$database1."tg_questions.qcode) as question_code,".$database1."tg_questions.question,".$database1."tg_questions.answer,".$database1."tg_topicmaster.description AS topic, ".$database1."tg_subtopicmaster.description AS subtopic, ".$database1."tg_questypemaster.instruction,".$database1."tg_subsubtopicmaster.description AS subsubtopic,".$database1."tg_groupmaster.grouptext as groupdetails
                        FROM tg_questions
                        LEFT JOIN ".$database1."tg_topicmaster ON ".$database1."tg_topicmaster.topic_code = ".$database1."tg_questions.topic_code
                        LEFT JOIN ".$database1."tg_subtopicmaster ON ".$database1."tg_subtopicmaster.subtopic_code = ".$database1."tg_questions.subtopic_code
                        LEFT JOIN ".$database1."tg_subsubtopicmaster ON ".$database1."tg_subsubtopicmaster.sub_subtopic_code = ".$database1."tg_questions.sub_subtopic_code
                        LEFT JOIN ".$database1."tg_questypemaster ON ".$database1."tg_questypemaster.code = ".$database1."tg_questions.questtype
                        LEFT JOIN ".$database1."tg_difficultylevel ON ".$database1."tg_difficultylevel.id = ".$database1."tg_questions.difficulty_level
                        LEFT JOIN ".$database1."tg_groupmaster ON ".$database1."tg_questions.groupid = ".$database1."tg_groupmaster.groupid
                        LEFT JOIN ".$database1."tg_subjectmaster ON ".$database1."tg_subjectmaster.subjectno = ".$database1."tg_questions.subjectno WHERE tg_questions.subjectno = 2 ";


            if($this->question != "")
              $condition.="AND tg_questions.question LIKE '%".$this->question."%'";
            if($this->answer != "")
              $condition.="AND tg_questions.answer LIKE '%".$this->answer."%'";
            if($this->keyword != "")
              $condition.="AND (tg_questions.question LIKE '%".$this->keyword."%' OR
              tg_questions.answer LIKE '%".$this->keyword."%' OR
              tg_topicmaster.description LIKE '%".$this->keyword."%' OR
              tg_subtopicmaster.description LIKE '%".$this->keyword."%' OR
              tg_subsubtopicmaster.description LIKE '%".$this->keyword."%'
              )";
               if($this->search_questtype != "")
               {
            		if($this->search_questtype == "Blank")
            			$qtype = "FITB";

            			$condition.=" AND tg_questypemaster.code = '".$this->search_questtype."' ";
               }
            if($this->search_topic != "")
            	$condition.=" AND tg_topicmaster.description LIKE '%".$this->search_topic."%' ";
            if($this->search_subtopic != "")
            	$condition.=" AND tg_subtopicmaster.description LIKE '%".$this->search_subtopic."%' ";
			if($this->search_subsubtopic != "")
            	$condition.=" AND tg_subsubtopicmaster.description LIKE '%".$this->search_subsubtopic."%' ";

            if($_SERVER['SERVER_NAME'] == "programserver")
            	$database = "educatio_adepts.";
            else
            	$database = "educatio_educat.";

            $queryMCount.= "SELECT count(".$database."adepts_questions.qcode) FROM ".$database."adepts_questions ".
            		  "LEFT JOIN ".$database."adepts_clusterMaster ON ".$database."adepts_questions.clusterCode = ".$database."adepts_clusterMaster.clusterCode ".
            		  "LEFT JOIN ".$database."adepts_subTopicMaster ON ".$database."adepts_clusterMaster.subTopicCode = ".$database."adepts_subTopicMaster.subTopicCode ".
            		  "LEFT JOIN ".$database."adepts_topicMaster ON ".$database."adepts_topicMaster.topicCode = ".$database."adepts_subTopicMaster.topicCode ".
            		  "LEFT JOIN ".$database."adepts_quesTypes ON ".$database."adepts_quesTypes.code = ".$database."adepts_questions.question_type WHERE 1 = 1 ";

            $queryM.= " SELECT CONCAT('M',".$database."adepts_questions.qcode) as question_code,".$database."adepts_questions.question,".$database."adepts_questions.display_answer as answer,".$database."adepts_topicMaster.topic,".$database."adepts_subTopicMaster.subTopic,".$database."adepts_quesTypes.description as instruction,".$database."adepts_clusterMaster.cluster as subsubtopic,'grouptext' as groupdetails FROM ".$database."adepts_questions ".
            		  "LEFT JOIN ".$database."adepts_clusterMaster ON ".$database."adepts_questions.clusterCode = ".$database."adepts_clusterMaster.clusterCode ".
            		  "LEFT JOIN ".$database."adepts_subTopicMaster ON ".$database."adepts_clusterMaster.subTopicCode = ".$database."adepts_subTopicMaster.subTopicCode ".
            		  "LEFT JOIN ".$database."adepts_topicMaster ON ".$database."adepts_topicMaster.topicCode = ".$database."adepts_subTopicMaster.topicCode ".
            		  "LEFT JOIN ".$database."adepts_quesTypes ON ".$database."adepts_quesTypes.code = ".$database."adepts_questions.question_type WHERE 1 = 1 ";
           if($this->question != "")
              $conditionM.="AND ".$database."adepts_questions.question LIKE '%".$this->question."%'";
            if($this->answer != "")
              $conditionM.="AND ".$database."adepts_questions.display_answer LIKE '%".$this->answer."%'";
            if($this->keyword != "")
              $conditionM.="AND (adepts_questions.question LIKE '%".$this->keyword."%' OR
              ".$database."adepts_questions.display_answer LIKE '%".$this->keyword."%' OR
              ".$database."adepts_topicMaster.topic LIKE '%".$this->keyword."%' OR
              ".$database."adepts_subTopicMaster.subtopic LIKE '%".$this->keyword."%' OR
              ".$database."adepts_clusterMaster.cluster LIKE '%".$this->keyword."%'
              )";
            if($this->search_questtype != "")
            {
            	$conditionM.=" AND ".$database."adepts_quesTypes.code LIKE '%".$this->search_questtype."%' ";
            }
            if($this->search_topic != "")
            	$conditionM.=" AND ".$database."adepts_topicMaster.topic LIKE '%".$this->search_topic."%' ";
            if($this->search_subtopic != "")
            	$conditionM.=" AND ".$database."adepts_subTopicMaster.subtopic LIKE '%".$this->search_subtopic."%' ";
			if($this->search_subsubtopic != "")
            	$conditionM.=" AND ".$database."adepts_clusterMaster.cluster LIKE '%".$this->search_subsubtopic."%' ";

            $queryTGcount = $queryCount." ".$condition;
            $queryMindsparkCount = $queryMCount." ".$conditionM;

            $dbqueryTGcount = new dbquery($queryTGcount,$connid);
      		$dbqueryMScount = new dbquery($queryMindsparkCount,$connid);

      		$rowTGcount = $dbqueryTGcount->getrowarray();
      		$rowMScount = $dbqueryMScount->getrowarray();

        	$queryTG = $query." ".$condition;
        	$queryMindspark = $queryM." ".$conditionM;
      		//echo $queryTG."<br>";
      		//echo $queryMindspark;
      		if($this->search_criteria == "both")
      			$this->clspaging->numofrecs = $rowTGcount[0] + $rowMScount[0];
      		elseif ($this->search_criteria == "tg")
            	$this->clspaging->numofrecs = $rowTGcount[0];
            elseif ($this->search_criteria == "ms")
            	$this->clspaging->numofrecs = $rowMScount[0];

            if($this->clspaging->numofrecs >0)
            {
                    $this->clspaging->getcurrpagevardb();
            }
            if($this->search_criteria == "both")
            	$queryF = $queryTG." UNION ".$queryMindspark." ".$this->clspaging->limit;
            else if($this->search_criteria == "tg")
            	$queryF = $queryTG." ".$this->clspaging->limit;
            elseif ($this->search_criteria == "ms")
            	$queryF = $queryMindspark." ".$this->clspaging->limit;

            //echo $queryF;
            $dbquery = new dbquery($queryF,$connid);
      		while($row = $dbquery->getrowarray())
      		{
      			$arrRet[$row["question_code"]] = array("question_code"=>$row["question_code"],
      													"question"=>$row["question"],
      													"answer"=>$row["answer"],
      													"topic"=>$row["topic"],
      													"subtopic"=>$row["subtopic"],
      													"subsubtopic"=>$row["subsubtopic"],
      													"instruction"=>$row["instruction"]


      			);
      		}
      		return $arrRet;
        }
        function getOnlyMathTopics($connid)
        {
        	$arrRet = array();
        	$query = "SELECT topic_code,description FROM tg_topicmaster WHERE subjectno = 2";
        	$dbquery = new dbquery($query,$connid);
        	while($row = $dbquery->getrowarray())
      		{
      			$arrRet[$row["topic_code"]] = array("topic_code"=>$row["topic_code"],
      												"description"=>$row["description"]
      												);
      		}
      		return $arrRet;
        }
        function getOnlyMathSubtopics($connid)
        {
        	$arrRet = array();
        	$query = "SELECT subtopic_code,tg_subtopicmaster.description FROM tg_topicmaster,tg_subtopicmaster WHERE tg_topicmaster.topic_code = tg_subtopicmaster.topic_code AND subjectno = 2";
        	$dbquery = new dbquery($query,$connid);
        	while($row = $dbquery->getrowarray())
      		{
      			$arrRet[$row["subtopic_code"]] = array("subtopic_code"=>$row["subtopic_code"],
      												"description"=>$row["description"]
      												);
      		}
      		return $arrRet;
        }
        function importDataToSchoolTest($connid)
        {
        	if($_SERVER['SERVER_NAME'] == "programserver")
            	$database = "educatio_adepts.";
            else
            	$database = "educatio_educat.";

        	if(is_array($this->question) && count($this->question) >0)
        	{
        		$arrQuestionKeys = array_keys($this->question);
				foreach($arrQuestionKeys as $qcode)
				{
					$qno = 1;
					$condition = "";
					$question = $this->html_to_orig($this->question[$qcode]);
					/*if(is_array($this->optiona) && count($this->optiona)>0)
						$optiona = */
					if($this->questtype[$qcode] == "blank" || $this->questtype[$qcode] == "Blank")
					{
						$condition.="correct_answer = '".$this->answer[$qcode]."',";
					}
					else
					{
						$condition.="correct_answer = '".$this->correct_answer[$qcode]."',";
					}
					$query = "INSERT INTO ".$database."adepts_schoolTestQuestions SET ".
							 "question = '".$question."',".
							 "optiona = '".$this->optiona[$qcode]."',".
							 "optionb = '".$this->optionb[$qcode]."',".
							 "optionc = '".$this->optionc[$qcode]."',".
							 "optiond = '".$this->optiond[$qcode]."',".$condition.
							 "display_answer = '".$this->display_answer[$qcode]."',".
							 "question_type = '".$this->questtype[$qcode]."',".
							 "marks = '".$this->ei_marks[$qcode]."',".
							 "ncert_chapter = '".$this->ncert_chapter[$qcode]."',".
							 "subTopicCode = '".$this->subtopic_code[$qcode]."',".
							 "source = '".$qcode."',".
							 "difficulty_level = '".$this->difficultylevel[$qcode]."',".
							 "entered_by = '".$_SESSION["username"]."',".
							 "entered_dt = NOW()";
					$dbquery = new dbquery($query,$connid);
					$school_qcode = $dbquery->insertid;
					$queryGetQno = "SELECT qno FROM ".$database."adepts_schoolTestDetails WHERE schoolTestCode = '".$this->school_test_code."' ORDER BY qno DESC LIMIT 1";
					$dbqueryGetQno = new dbquery($queryGetQno,$connid);
					$rowGetQno = $dbqueryGetQno->getrowarray();
					$qno = $rowGetQno["qno"] + 1;
					$querySchoolTest = "INSERT INTO ".$database."adepts_schoolTestDetails  SET ".
										"schoolTestCode = '".$this->school_test_code."',".
							 			"qcode = '".$school_qcode."',".
										"qno = '".$qno."'";
					$dbquerySchoolTest = new dbquery($querySchoolTest,$connid);
				}
				?>
				<script>
					var redir='../mindspark/create_test.php?schoolTestCode='+'<?php echo $this->school_test_code;?>';	
					window.location=redir;
				</script>
				<?php 
        	}
        }
        function getSchoolTestQuestions($connid)
        {
        	$arrRet = array();
        	$optiona = "";
        	$optionb = "";
        	$optionc = "";
        	$optiond = "";

        	 if($_SERVER['SERVER_NAME'] == "programserver")
            	$database = "educatio_adepts.";
            else
            	$database = "educatio_educat.";
        	if(is_array($this->import_to_ms) && count($this->import_to_ms) >0)
        	{
        		$strm = "";
        		$strt = "";
        		foreach($this->import_to_ms as $qcode)
        		{
        			if($qcode != "" && substr($qcode, 0, 1) == "M")
        			{
        				$strm.=substr($qcode,1)."," ;
        			}
        			else if($qcode != "" && substr($qcode, 0, 1) == "T")
        			{
        				$strt.=substr($qcode,1)."," ;
        			}
        		}
        		$strt = substr($strt,0,-1);
        		$strm = substr($strm,0,-1);
        		if($strt == "")
        			$strt = 0;
        		if($strm == "")
        			$strm = 0;
        		$queryT = "SELECT qcode,question,answer,questtype,ei_marks FROM tg_questions WHERE qcode IN ($strt)";
        		$dbqueryT = new dbquery($queryT,$connid);

        		while($rowT = $dbqueryT->getrowarray())
        		{
        			$correct_answer = "";
					$question = $rowT["question"];
        			if($rowT["questtype"] == "MCQ")
        			{
        				$arrOptions = explode("A)",$rowT["question"],2);
						if(is_array($arrOptions) && count($arrOptions) >0)
							$question = $arrOptions[0];

        				if(!is_array($arrOptions))
        					$arrOptions1 = explode("A.",$rowT["question"]);
        				if(!is_array($arrOptions1))
        					$arrOptions2 = explode("A ",$rowT["question"]);
        				if(is_array($arrOptions) && count($arrOptions) >0)
        				{
        					$arrOptionA = explode("B)",$arrOptions[1]);
        					$optiona = $arrOptionA[0];
        					$arrOptionB = explode("C)",$arrOptionA[1]);
        					$optionb = $arrOptionB[0];
        					$arrOptionC = explode("D)",$arrOptionB[1]);
        					$optionc = $arrOptionC[0];
        					$optiond = $arrOptionC[1];
        				}
        				else if(is_array($arrOptions1) && count($arrOptions1) >0)
        				{
        					$arrOptionA = explode("B.",$arrOptions1[1]);
        					$optiona = $arrOptionA[0];
        					$arrOptionB = explode("C.",$arrOptionA[1]);
        					$optionb = $arrOptionB[0];
        					$arrOptionC = explode("D.",$arrOptionB[1]);
        					$optionc = $arrOptionC[0];
        					$optiond = $arrOptionC[1];
        				}
        				elseif (is_array($arrOptions2) && count($arrOptions2) >0)
        				{
        					$arrOptionA = explode("B ",$arrOptions2[1]);
        					$optiona = $arrOptionA[0];
        					$arrOptionB = explode("C ",$arrOptionA[1]);
        					$optionb = $arrOptionB[0];
        					$arrOptionC = explode("D ",$arrOptionB[1]);
        					$optionc = $arrOptionC[0];
        					$optiond = $arrOptionC[1];
        				}

        			}
        			if(ereg("A)",$rowT["answer"]) || ereg("A.",$rowT["answer"]) || ereg("A ",$rowT["answer"]))
        				$correct_answer = "A";
        			if(ereg("B)",$rowT["answer"]) || ereg("B.",$rowT["answer"]) || ereg("B ",$rowT["answer"]))
        				$correct_answer = "B";
        			if(eregi("C)",$rowT["answer"]) || eregi("C.",$rowT["answer"]) || eregi("C ",$rowT["answer"]))
        				$correct_answer = "C";
        			if(ereg("D)",$rowT["answer"]) || ereg("D.",$rowT["answer"]) || ereg("D ",$rowT["answer"]))
        				$correct_answer = "D";
        			$arrRet["T".$rowT["qcode"]]	= array("qcode"=>"T".$rowT["qcode"],
        											"question"=>$question,
        											"optiona"=>$optiona,
        											"optionb"=>$optionb,
        											"optionc"=>$optionc,
        											"optiond"=>$optiond,
        											"answer"=>$rowT["answer"],
        											"display_answer"=>$rowT["answer"],
        											"correct_answer"=>$correct_answer,
        											"marks"=>$rowT["ei_marks"],
        											"questtype"=>$rowT["questtype"],
        										);
        		}

        		$queryM = "SELECT * FROM ".$database."adepts_questions WHERE qcode IN ($strm)";
        		$dbqueryM = new dbquery($queryM,$connid);
        		while($rowM = $dbqueryM->getrowarray())
        		{
        			$arrRet["M".$rowM["qcode"]]	= array("qcode"=>"M".$rowM["qcode"],
        											"question"=>$rowM["question"],
        											"optiona"=>$rowM["optiona"],
        											"optionb"=>$rowM["optionb"],
        											"optionc"=>$rowM["optionc"],
        											"optiond"=>$rowM["optiond"],
  													"answer"=>$rowM["display_answer"],
        											"display_answer"=>$rowM["display_answer"],
        											"correct_answer"=>$rowM["correct_answer"],
        											"marks"=>"1",
        											"questtype"=>$rowM["question_type"]
        										);
        		}
        	}
        	return $arrRet;
        }
        function getMindsparkSubTopicByTopic($connid,$topic_code)
        {
        	$arrRet = array();
        	 if($_SERVER['SERVER_NAME'] == "programserver")
            	$database = "educatio_adepts.";
            else
            	$database = "educatio_educat.";
        	$query = "SELECT * FROM ".$database."adepts_subTopicMaster WHERE topicCode = '".$topic_code."'";
        	$dbquery = new dbquery($query,$connid);
        	while($row = $dbquery->getrowarray())
        	{
        		$arrRet[$row["subTopicCode"]] = array("subTopicCode"=>$row["subTopicCode"],
        											  "subTopic"=>$row["subTopic"]
        											);
        	}
        	//print_r($arrRet);
        	return $arrRet;
        }
		function html_to_orig($html_ver)
		{
			//echo $html_ver;
			$matches = array();
			preg_match_all("/\<img[^>]*\>/i",$html_ver,$matches, PREG_SET_ORDER);
			$cnt_matches = count($matches);

			for($i=0 ; $i<$cnt_matches; $i++)
			{
				$img_str = $matches[$i][0];
				$matches1 = array();

				preg_match_all("/src=\"(.*?)image\/([^']*)\"/i", $img_str, $matches1, PREG_SET_ORDER);
				$cnt = count($matches1);

				for($j=0 ; $j<$cnt ;$j++)
				{
					$image_name = $matches1[$j][2] ;
					//echo $image_name."<br/>";

					$html_ver = str_replace($img_str,"[".$image_name."]",$html_ver);
					//echo $html_ver;
				}
			}

			return $html_ver;
		}
		function getDailyMailDetailsQmaker($connid)
		{
			$arrRet = array();
			$query = "SELECT count(*) as count,qmaker,parent_subjectno,class,DATE_FORMAT(created_date,'%Y-%m-%d') as created_dt
					FROM tg_questions WHERE (DATE_FORMAT(created_date,'%Y-%m-%d') = CURDATE()
					OR DATE_FORMAT(created_date,'%Y-%m-%d') = DATE_SUB(CURDATE(),INTERVAL 1 DAY)
					OR DATE_FORMAT(created_date,'%Y-%m-%d') = DATE_SUB(CURDATE(),INTERVAL 2 DAY))
					GROUP BY qmaker,parent_subjectno,class,DATE_FORMAT(created_date,'%Y-%m-%d')";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["qmaker"]][$row["class"]][$row["parent_subjectno"]][$row["created_dt"]] = $row["count"];
			}
			return $arrRet;
		}
		function getDailyMailDetailsCommentator($connid,$type)
		{
			$arrRet = array();
			$condition = "";
			if($type == "ATUO")
				$condition = " AND comment = 'Question approved' ";
			$query = "SELECT count(*) as count,commenter,DATE_FORMAT(submitdate,'%Y-%m-%d') as submitdt,class,parent_subjectno FROM tg_comments,tg_questions
			          WHERE tg_comments.qcode = tg_questions.qcode
					  AND tg_comments.type = '".$type."'".$condition."
					  AND (DATE_FORMAT(submitdate,'%Y-%m-%d') = CURDATE()
					  OR DATE_FORMAT(submitdate,'%Y-%m-%d') = DATE_SUB(CURDATE(),INTERVAL 1 DAY)
					  OR DATE_FORMAT(submitdate,'%Y-%m-%d') = DATE_SUB(CURDATE(),INTERVAL 2 DAY))
					  GROUP BY commenter,parent_subjectno,class,DATE_FORMAT(submitdate,'%Y-%m-%d')";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["commenter"]][$row["class"]][$row["parent_subjectno"]][$row["submitdt"]] = $row["count"];
			}
			return $arrRet;

		}
		function getQcountByTopicAndSubtopic($connid,$flag,$class,$subject)
		{
			$arrRet = array();
			$query1 = "";
			$query2 = "";
			if($subject == 3)
				$query1 = " AND parent_subjectno = '".$subject."'";
			else 
				$query1 = " AND subjectno = '".$subject."'";
			
			$query2 = " AND class = '".$class."' ";
			if($class == 'All')
				$query2 = "";
								
			if($flag == 0)
				$query = "SELECT count(qcode) as count,topic_code,subtopic_code FROM tg_questions WHERE qmaker IN ('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george')".$query1.$query2."GROUP BY subtopic_code,topic_code";
			else
				$query = "SELECT count(qcode) as count,topic_code,subtopic_code FROM tg_questions WHERE qmaker NOT IN ('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george') AND used_status = '0' ".$query1.$query2."GROUP BY subtopic_code,topic_code";
			
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["topic_code"]][$row["subtopic_code"]] = $row["count"];
			}
			/*echo "<pre>";
			print_r($arrRet);
			echo "</pre>";*/
			return $arrRet;
		}
		function getApprovedQcountByTopicAndSubtopic($connid,$flag,$class,$subject)
		{
			$arrRet = array();
			$query1 = "";
			$query2 = "";
			if($subject == 3)
				$query1 = " AND parent_subjectno = '".$subject."'";
			else 
				$query1 = " AND subjectno = '".$subject."'";
			$query2 = " AND class = '".$class."' ";
			if($class == 'All')
				$query2 = "";
			if($flag == 0)
				$query = "SELECT count(qcode) as count,topic_code,subtopic_code FROM tg_questions WHERE qmaker IN ('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george')".$query1.$query2." AND status = '5' AND copied_from = 0 GROUP BY subtopic_code,topic_code";
			else
				$query = "SELECT count(qcode) as count,topic_code,subtopic_code FROM tg_questions WHERE qmaker IN ('asmi','ekta','maulik.shah','meghna.kumar','nishchal','jayasree.ts','ashtu.killimangalam','vishnu','rama.naicker','kevin.george')".$query1.$query2." AND status = '5' AND copied_from != 0 GROUP BY subtopic_code,topic_code";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["topic_code"]][$row["subtopic_code"]] = $row["count"];
			}
			/*echo "<pre>";
			print_r($arrRet);
			echo "</pre>";*/
			return $arrRet;
		}
		function getWeeklyMailCountByQmakerCreated($connid)
		{
			$query = "SELECT count(*) as count,qmaker,parent_subjectno,DATE_FORMAT(created_date,'%Y-%m-%d') as created_dt FROM tg_questions
			WHERE DATE_FORMAT(created_date,'%Y%m%d') < DATE_FORMAT(CURDATE(),'%Y%m%d')
			AND DATE_FORMAT(created_date,'%Y%m%d') >= DATE_FORMAT(DATE_SUB(CURDATE(),INTERVAL 7 DAY),'%Y%m%d')
			GROUP BY qmaker,parent_subjectno";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["qmaker"]][$row["parent_subjectno"]] = $row["count"];
			}
			return $arrRet;

		}
		function getWeeklyMailCountByQmakerModified($connid)
		{
			$query = "SELECT count(*) as count,qmaker,parent_subjectno,DATE_FORMAT(modified_date,'%Y-%m-%d') as modified_dt FROM tg_questions
			WHERE DATE_FORMAT(modified_date,'%Y%m%d') < DATE_FORMAT(CURDATE(),'%Y%m%d')
			AND DATE_FORMAT(modified_date,'%Y%m%d') >= DATE_FORMAT(DATE_SUB(CURDATE(),INTERVAL 7 DAY),'%Y%m%d')
			GROUP BY qmaker,parent_subjectno";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["qmaker"]][$row["parent_subjectno"]] = $row["count"];
			}
			return $arrRet;

		}
		function getWeeklyMailDetailsCommentator($connid,$type)
		{
			$arrRet = array();
			$condition = "";
			if($type == "ATUO")
				$condition = " AND comment = 'Question approved' ";
			$query = "SELECT count(*) as count,commenter,DATE_FORMAT(submitdate,'%Y-%m-%d') as submitdt,parent_subjectno FROM tg_comments,tg_questions
			          WHERE tg_comments.qcode = tg_questions.qcode
					  AND tg_comments.type = '".$type."'".$condition."
					  AND DATE_FORMAT(submitdate,'%Y%m%d') < DATE_FORMAT(CURDATE(),'%Y%m%d')
					  AND DATE_FORMAT(submitdate,'%Y%m%d') >= DATE_FORMAT(DATE_SUB(CURDATE(),INTERVAL 7 DAY),'%Y%m%d')
					  GROUP BY commenter,parent_subjectno";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["commenter"]][$row["parent_subjectno"]] = $row["count"];
			}
			return $arrRet;

		}
		function getPassageCount($connid,$class)
		{
			$arrRet = array();
			$condition = " AND tg_questions.class = '".$class."' ";
			
			if($class == 'All')
				$condition = "";
				
			$query = " SELECT tg_questions.subtopic_code,description,tg_questions.class,count(distinct(groupid)) as count FROM tg_questions,tg_subtopicmaster WHERE  tg_subtopicmaster.subtopic_code = tg_questions.subtopic_code and subjectno = '1' AND tg_questions.topic_code = 45 ".$condition." GROUP BY tg_questions.subtopic_code";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["subtopic_code"]] = array("description"=>$row["description"],
													   "count"=>$row["count"],
													   "class"=>$row["class"]
				);
			}
			return $arrRet;
		}
		function getGroupTextByGroupID($connid,$groupid)
		{
			$group_text = "";
			$query = "SELECT grouptext FROM tg_groupmaster WHERE groupid = '".$groupid."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$group_text = $row["grouptext"];
			return $group_text;
		}
		function getMonthlyCountsForQmakers($connid)
		{
			$arrRet = array();
			$query = "SELECT count(*) as count,DATE_FORMAT(created_date,'%Y%m') as crdt,qmaker FROM tg_questions GROUP BY DATE_FORMAT(created_date,'%Y%m'),qmaker";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				
				$arrRet[$row["crdt"]][$row["qmaker"]] = $row["count"];
				
			}
			return $arrRet;
		}
		function getQmakerMonthwiseCount($connid,$qmaker)
		{
			$arrRet = array();
			$query = "SELECT count(*) as count,DATE_FORMAT(created_date,'%Y%m') as crdt,class FROM tg_questions WHERE qmaker = '".$qmaker."' GROUP BY DATE_FORMAT(created_date,'%Y%m'),class";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["crdt"]][$row["class"]] = $row["count"];	
			}
			return $arrRet;
		}
		function AddAllPreviousImageQuestions($connid)
		{
			$query = "SELECT tg_questions.*,grouptext FROM tg_questions LEFT JOIN tg_groupmaster ON tg_questions.groupid = tg_groupmaster.groupid WHERE tg_questions.question LIKE '%<IMG%' OR tg_questions.answer LIKE '%<IMG%' OR tg_groupmaster.grouptext LIKE '%<IMG%'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$this->saveImages($connid,$row["question"],$row["qcode"],'Q',$row["subjectno"],$row["class"]);
				$this->saveImages($connid,$row["answer"],$row["qcode"],'A',$row["subjectno"],$row["class"]);
				$this->saveImages($connid,$row["grouptext"],$row["groupid"],'GT',$row["subjectno"],$row["class"]);
				if($row["image_description"] != "")
					$this->saveImageDescription($connid,$row["image_description"],$row["qcode"],'IDO',$row["subjectno"],$row["class"]);
			}
		}
		function getClassOfSubtopics($connid)
		{
			$arrRet = array();
			$query = "SELECT class,subtopic_code FROM tg_subtopicmaster";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["subtopic_code"]] = $row["class"];
			}
			return $arrRet;
		}
        function getGroupDetails($connid)
        {
            $arrRet = array();
            $this->setgetvars();  
            $query = "SELECT * FROM tg_groupmaster WHERE groupid = '".$this->groupid."' ";
            $dbquery = new dbquery($query,$connid);
            $row = $dbquery->getrowarray();
            $this->group_name = $row["groupname"];
            $this->group_text = $row["grouptext"];   
        }
		function getGroupImageStatus($connid,$groupid)
		{
			$count = 0;
			if($groupid != "" && $groupid != 0)
			{
				$query = "SELECT count(*) as count FROM tg_images WHERE id = '".$groupid."' AND (where_in_question = 'GT' OR where_in_question = 'GIDO') AND status != 3 ";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
                if($row["count"] > 0)
					$count = $row["count"]; 			
			}
			return $count;	
		}
}

?>