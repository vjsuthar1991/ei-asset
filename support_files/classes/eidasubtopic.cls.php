<?php

include_once("eipaging.cls.php");
include_once dirname(__FILE__) . "/../constants.php";

class clsdasubtopic {

    var $subtopic_code;
    var $topic_code;
    var $description;
    var $expected_questions;
    var $class;
    var $subjectno;
    var $action;
    var $commentator;
    var $searchqcode;
    var $searchqmaker;
    var $searchstatus;
    var $searchallotedto;
    var $comments;
    var $setcolor;
    var $searchmisconception;
    var $searchindicator;
    var $approveSubtopic;
    var $passage_id;
    var $sub_subtopic_code;
    var $skill;
    var $fromDate;
    var $toDate;
    var $approver;
    var $owner;
    var $current_alloted;
    var $sstlist;
    var $qmade;
    var $sorting;
    var $searchOwner;
    var $usedByEI;
    var $freelancer_name;
    var $multisort;
    var $testClass;
    var $mc_added_by;
    var $keyword;
    var $approver2;
    var $copyques;
    var $freelancer;
    var $flflag;
    var $freelancerName;
    var $ips_status;
    var $secondapproved;
    var $clspaging;
    var $linkqcode;
    var $linkparentqcode;
    var $linkToParentQcode;
    var $msg;
    var $rejected_status;
    var $srchnotinstatus;
    var $subtopic_assign;
    var $subsubtopic_assign;
    var $submited;
    var $ajax;
    var $sorttype;
    var $srch_approver2;
    var $source;
    var $ssst_code;
    var $group_id;
    var $ssst_assign;
    var $excluded_status;
    var $queryPageName;
    var $approvedBy;
    var $appr_QsearchFlag;
    var $approvedFromDate;
    var $approvedToDate;

    function clsdasubtopic() {
        $this->subtopic_code = "";
        $this->topic_code = "";
        $this->description = "";
        $this->expected_questions = "";
        $this->class = "";
        $this->subjectno = "";
        $this->action = "";
        $this->status = "";
        $this->commentator = "";
        $this->searchqcode = "";
        $this->searchqmaker = "";
        $this->searchstatus = "";
        $this->searchallotedto = "";
        $this->comments = "";
        $this->setcolor = array();
        $this->searchmisconception = "";
        $this->searchindicator = "";
        $this->approveSubtopic = array();
        $this->passage_id = "";
        $this->sub_subtopic_code = "";
        $this->skill = "";
        $this->fromDate = "";
        $this->toDate = "";
        $this->approver = array();
        $this->sstapprover = "";
        $this->owner = array();
        $this->current_alloted = "";
        $this->sstlist = "";
        $this->qmade = "";
        $this->sorting = array();
        $this->searchOwner = "";
        $this->usedByEI = "";
        $this->freelancer_name = "";
        $this->multisort = "";
        $this->testClass = "";
        $this->mc_added_by = "";
        $this->mc_fromDate = "";
        $this->mc_toDate = "";
        $this->keyword = "";
        $this->approver2 = array();
        $this->copyques = "";
        $this->freelancer = array();
        $this->flflag = "";
        $this->freelancerName = "";
        $this->ips_status = "";
        $this->secondapproved = "";
        $this->clspaging = new clspaging('clsdasubtopic', 'searchflque');
        $this->linkparentqcode = "";
        $this->linkqcode = "";
        $this->linkToParentQcode = "";
        $this->msg = "";
        $this->rejected_status = 4;
        $this->srchnotinstatus = "";
        $this->subtopic_assign = array();
        $this->subsubtopic_assign = array();
        $this->submited = "";
        $this->ajax = "";
        $this->sorttype = "ASC";
        $this->srch_approver2 = "";
        $this->source = "";
        $this->ssst_code = "";
        $this->group_id = "";
        $this->ssst_assign = array();
        $this->excludedStatus = 0;
        $this->queryPageName = "";
        $this->approvedBy = "";
        $this->appr_QsearchFlag = "";
        $this->approvedFromDate = "";
        $this->approvedToDate = "";
    }

    function setgetvars() {
        if (isset($_GET["subtopic_code"]))
            $this->subtopic_code = $_GET["subtopic_code"];
        if (isset($_GET["sub_subtopic_code"]))
            $this->sub_subtopic_code = $_GET["sub_subtopic_code"];
        if (isset($_GET["current_alloted"]))
            $this->searchallotedto = $_GET["current_alloted"];
        if (isset($_GET["action"]))
            $this->action = $_GET["action"];
        if (isset($_GET["misconception"]))
            $this->searchmisconception = $_GET["misconception"];
        if (isset($_GET["indicator"]))
            $this->searchindicator = $_GET["indicator"];
        if (isset($_GET["subjectno"]))
            $this->subjectno = $_GET["subjectno"];
        if (isset($_GET["class"]))
            $this->class = $_GET["class"];
        if (isset($_GET["status"]))
            $this->status = $_GET["status"];
        if (isset($_GET["skill"]))
            $this->skill = $_GET["skill"];
        if (isset($_GET["topic_code"]))
            $this->topic_code = $_GET["topic_code"];
        if (isset($_GET["fromDate"]))
            $this->fromDate = $_GET["fromDate"];
        if (isset($_GET["toDate"]))
            $this->toDate = $_GET["toDate"];
        if (isset($_GET["mc_fromDate"]))
            $this->mc_fromDate = $_GET["mc_fromDate"];
        if (isset($_GET["mc_toDate"]))
            $this->mc_toDate = $_GET["mc_toDate"];
        if (isset($_GET["qlist"]))
            $this->searchqcode = $_GET["qlist"];
        if (isset($_GET["approver"]))
            $this->sstapprover = $_GET["approver"];
        if (isset($_GET["owner"]))
            $this->searchOwner = $_GET["owner"];
        if (isset($_GET["current_alloted"]))
            $this->current_alloted = $_GET["current_alloted"];
        if (isset($_GET["sstlist"]))
            $this->sstlist = $_GET["sstlist"];
        if (isset($_GET["qmade"]))
            $this->qmade = $_GET["qmade"];
        if (isset($_GET["used"]))
            $this->usedByEI = $_GET["used"];
        if (isset($_GET["freelancer_name"]))
            $this->freelancer_name = $_GET["freelancer_name"];
        if (isset($_GET["testclass"]))
            $this->testClass = $_GET["testclass"];
        if (isset($_GET["mc_added_by"]))
            $this->mc_added_by = $_GET["mc_added_by"];
        if (isset($_GET["qmaker"]))
            $this->searchqmaker = $_GET["qmaker"];
        if (isset($_GET["copyques"]))
            $this->copyques = trim($_GET["copyques"]);
        if (isset($_GET["linkqcode"]))
            $this->linkqcode = trim($_GET["linkqcode"]);
        if (isset($_GET["linkqcode"]))
            $this->linkqcode = trim($_GET["linkqcode"]);
        if (isset($_GET["linkparentqcode"]))
            $this->linkparentqcode = trim($_GET["linkparentqcode"]);
        if (isset($_GET["srchnotinstatus"]))
            $this->srchnotinstatus = trim($_GET["srchnotinstatus"]);
        if (isset($_GET["excludedStatus"]))
            $this->excludedStatus = $_GET["excludedStatus"];

        if (isset($_GET["Appr_Qsearch"]))
            $this->appr_QsearchFlag = $_GET["Appr_Qsearch"];
        if (isset($_GET["approvedBy"]))
            $this->approvedBy = $_GET["approvedBy"];
        if (isset($_GET["approvedFromDate"]))
            $this->approvedFromDate = $_GET["approvedFromDate"];
        if (isset($_GET["approvedToDate"]))
            $this->approvedToDate = $_GET["approvedToDate"];
    }

    function setpostvars() {
        if (isset($_POST["clsdasubtopic_topic"]))
            $this->topic_code = $_POST["clsdasubtopic_topic"];
        if (isset($_POST["clsdasubtopic_searchallotedto"]))
            $this->searchallotedto = $_POST["clsdasubtopic_searchallotedto"];
        if (isset($_POST["clsdasubtopic_searchqcode"]))
            $this->searchqcode = $_POST["clsdasubtopic_searchqcode"];
        if (isset($_POST["clsdasubtopic_searchqmaker"]))
            $this->searchqmaker = $_POST["clsdasubtopic_searchqmaker"];
        if (isset($_POST["clsdasubtopic_class"]))
            $this->class = $_POST["clsdasubtopic_class"];
        if (isset($_POST["clsdasubtopic_searchstatus"]))
            $this->searchstatus = $_POST["clsdasubtopic_searchstatus"];
        if (isset($_POST["clsdasubtopic_subjectno"]))
            $this->subjectno = $_POST["clsdasubtopic_subjectno"];
        if (isset($_POST["clsdasubtopic_subtopic"]))
            $this->subtopic_code = $_POST["clsdasubtopic_subtopic"];
        if (isset($_POST["clsdasubtopic_skill"]))
            $this->skill = $_POST["clsdasubtopic_skill"];
        if (isset($_POST["clsdasubtopic_expectedques"]))
            $this->expected_questions = $_POST["clsdasubtopic_expectedques"];
        if (isset($_POST["clsdasubtopic_hdnaction"]))
            $this->action = $_POST["clsdasubtopic_hdnaction"];
        if (isset($_POST["clsdasubtopic_description"]))
            $this->description = $_POST["clsdasubtopic_description"];
        if (isset($_POST["clsdasubtopic_commentator"]))
            $this->commentator = $_POST["clsdasubtopic_commentator"];
        if (isset($_POST["clsdasubtopic_approver"]))
            $this->approver = $_POST["clsdasubtopic_approver"];
        if (isset($_POST["clsdasubtopic_hdnsubtopic"]))
            $this->subtopic_code = $_POST["clsdasubtopic_hdnsubtopic"];
        if (isset($_POST["clsdasubtopic_remarks"]))
            $this->comments = $_POST["clsdasubtopic_remarks"];
        if (isset($_POST["approveSubtopic"]))
            $this->approveSubtopic = $_POST["approveSubtopic"];
        if (isset($_POST["approveSubSubtopic"]))
            $this->approveSubSubtopic = $_POST["approveSubSubtopic"];
        if (isset($_POST["clsdasubtopic_passage"]))
            $this->passage_id = $_POST["clsdasubtopic_passage"];
        if (isset($_POST["clsdasubtopic_subsubtopic"]))
            $this->sub_subtopic_code = $_POST["clsdasubtopic_subsubtopic"];
        if (isset($_POST["clsdasubtopic_hdnsubsubtopic"]))
            $this->sub_subtopic_code = $_POST["clsdasubtopic_hdnsubsubtopic"];
        if (isset($_POST["clsdasubtopic_owner"]))
            $this->owner = $_POST["clsdasubtopic_owner"];
        if (isset($_POST["clsdasubtopic_sorting"]))
            $this->sorting = $_POST["clsdasubtopic_sorting"];
        if (isset($_POST["clsdasubtopic_multisort"]))
            $this->multisort = $_POST["clsdasubtopic_multisort"];
        if (isset($_POST["clsdasubtopic_searchOwner"]))
            $this->searchOwner = $_POST["clsdasubtopic_searchOwner"];
        if (isset($_POST["clsdasubtopic_usedbyei"]))
            $this->usedByEI = $_POST["clsdasubtopic_usedbyei"];
        if (isset($_POST["clsdasubtopic_status"]))
            $this->status = $_POST["clsdasubtopic_status"];
        if (isset($_POST["clsdasubtopic_keyword"]))
            $this->keyword = $_POST["clsdasubtopic_keyword"];
        if (isset($_POST["clsdasubtopic_flflag"]))
            $this->flflag = $_POST["clsdasubtopic_flflag"];
        //if(isset($_POST["clsdasubtopic_error"])) $this->duplicate_error = $_POST["clsdasubtopic_error"];
        if (isset($_POST["clsdasubtopic_second_approver"]))
            $this->approver2 = $_POST["clsdasubtopic_second_approver"];
        if (isset($_POST["clsdasubtopic_freelancer"]))
            $this->freelancer = $_POST["clsdasubtopic_freelancer"];
        if (isset($_POST["clsdasubtopic_freelancerName"]))
            $this->freelancerName = $_POST["clsdasubtopic_freelancerName"];
        if (isset($_POST["clsdasubtopic_ips_status"]))
            $this->ips_status = $_POST["clsdasubtopic_ips_status"];
        if (isset($_POST["clsdasubtopic_secondapproved"]))
            $this->secondapproved = $_POST["clsdasubtopic_secondapproved"];
        if (isset($_POST["clsdasubtopic_linkQcode"]))
            $this->linkqcode = trim($_POST["clsdasubtopic_linkQcode"]);
        if (isset($_POST["clsdasubtopic_linkParentQcode"]))
            $this->linkparentqcode = trim($_POST["clsdasubtopic_linkParentQcode"]);
        if (isset($_POST["clsdasubtopic_linkToParentQcode"]))
            $this->linkToParentQcode = trim($_POST["clsdasubtopic_linkToParentQcode"]);
        if (isset($_POST["clsdasubtopic_subtopic_assign"]))
            $this->subtopic_assign = $_POST["clsdasubtopic_subtopic_assign"];
        if (isset($_POST["clsdasubtopic_subsubtopic_assign"]))
            $this->subsubtopic_assign = $_POST["clsdasubtopic_subsubtopic_assign"];
        if (isset($_POST["clsdasubtopic_hdnsubmited"]))
            $this->submited = $_POST["clsdasubtopic_hdnsubmited"];
        if (isset($_POST["clsdasubtopic_copyques"]))
            $this->copyques = $_POST["clsdasubtopic_copyques"];
        if (isset($_POST["clsdasubtopic_ajax"]))
            $this->ajax = $_POST["clsdasubtopic_ajax"];
        if (isset($_POST["fromDate"]))
            $this->fromDate = $_POST["fromDate"];
        if (isset($_POST["tillDate"]))
            $this->tillDate = $_POST["tillDate"];
        if (isset($_POST["clsdasubtopic_sorttype"]))
            $this->sorttype = $_POST["clsdasubtopic_sorttype"];
        if (isset($_POST["clsdasubtopic_srch_approver2"]))
            $this->srch_approver2 = $_POST["clsdasubtopic_srch_approver2"];
        if (isset($_POST["clsdasubtopic_source"]))
            $this->source = $_POST["clsdasubtopic_source"];
        if (isset($_POST["clsdasubtopic_ssst_code"]))
            $this->ssst_code = $_POST["clsdasubtopic_ssst_code"];
        if (isset($_POST["clsdasubtopic_group_id"]))
            $this->group_id = $_POST["clsdasubtopic_group_id"];
        if (isset($_POST["clsdasubtopic_ssst_assign"]))
            $this->ssst_assign = $_POST["clsdasubtopic_ssst_assign"];
    }

    function getSubtopicByTopic($connid, $topic_code, $class = "", $flflag = "") {
        $arrRet = array();
        $condition = "";

        if (is_array($class) && count($class) > 0) {
            foreach ($class as $cls)
                $condition = " AND find_in_set('" . $cls . "',b.class) > 0 ";
        } else if ($class != "") {
            $condition = " AND find_in_set('" . $class . "',b.class) > 0 ";
        }

        if ($this->flflag == "Y" || $flflag == "Y")
            $condition .= "AND b.freelancer = '" . $_SESSION["username"] . "'";

        $query = "SELECT DISTINCT a.description,a.subtopic_code, a.expected_questions FROM da_subtopicMaster a LEFT JOIN da_subSubTopicMaster b ON a.subtopic_code = b.subtopic_code WHERE a.topic_code = '" . $topic_code . "' " . $condition;
        //echo $query;
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["subtopic_code"]] = array("subtopic_code" => $row["subtopic_code"],
                "description" => $row["description"],
                "expected_questions" => $row["expected_questions"]
            );
        }
        return $arrRet;
    }

    function pageAddEditSubtopic($connid) {
        $this->setpostvars();
        $this->setgetvars();

        if ($this->action == "SaveData") {
            if ($this->validation($connid)) {
                $this->saveData($connid);
            }
            /* else
              {
              echo "<html><body><head><script>function pageSubmit(){document.hdform.action='daAdmin_addEditSubtopic.php';document.hdform.submit();}</script></head><form name='hdform' method='POST'><input type='hidden' name='clsdasubtopic_error[]' value='".$this->error."'><input type='hidden' name='clsdasubtopic_class' value='".$this->class."'><input type='hidden' name='clsdasubtopic_subjectno' value='".$this->subjectno."'><input type='hidden' name='clsdasubtopic_topic' value='".$this->topic_code."'><input type='hidden' name='clsdasubtopic_hdnaction' value='GetData'><script language='javascript'>pageSubmit();</script></form></body></html>";
              } */
        }
    }

    function pageStatusDetails($connid) {
        $this->setgetvars();
        $this->setpostvars();
        if ($this->action == "showStatusDetails" || $this->action == "approveSST" || $this->action == "GenerateXLS") {
            $dbquery = $this->topicSubtopicDetails($connid);
            return $dbquery;
        }
        if ($this->action == "makeAllotment") {
            $this->makeAllotment($connid);
            $dbquery = $this->topicSubtopicDetails($connid);
            return $dbquery;
        }
        if ($this->action == "approve") {
            $this->approveMultipleSubSubtopics($connid);
            $dbquery = $this->topicSubtopicDetails($connid);
            return $dbquery;
        }
        return 0;
    }

    function pageApproveSubtopic($connid) {
        $this->setpostvars();
        $this->setgetvars();
        if ($this->action == "comment") {
            $this->saveComments($connid);
        }
        /* if($this->action == "approve")
          {
          $this->approveMultipleSubtopics($connid);
          } */
    }

    function validation($connid) {
        /* if($this->class == "")
          $this->error["class"] = "Please enter the class"; */
        if ($this->subjectno == "")
            $this->error["sujectno"] = "Please enter the subject";
        if ($this->topic_code == "")
            $this->error["topic"] = "Please enter the topic for the subtopic";
        if ($this->description == "")
            $this->error["description"] = "Please enter the subtopic";
        if ($this->checkDuplicate($connid))
            $this->error["duplicate"] = "This subtopic is already entered in database";


        if (is_array($this->error) && count($this->error) > 0)
            return false;
        else
            return true;
    }

    function saveData($connid) {
        if (is_array($this->description) && count($this->description) > 0) {
            for ($i = 0; $i < count($this->description); $i++) {
                if ($this->description[$i] != "") {

                    if ($this->subtopic_code[$i] > 0)
                        $query = "UPDATE da_subtopicMaster SET topic_code = '" . $this->topic_code . "',description = '" . $this->description[$i] . "' WHERE subtopic_code = '" . $this->subtopic_code[$i] . "' LIMIT 1";
                    else
                        $query = "INSERT INTO da_subtopicMaster SET topic_code = '" . $this->topic_code . "',description = '" . $this->description[$i] . "',entered_by = '" . $_SESSION["username"] . "'";
                    $dbquery = new dbquery($query, $connid);
                }
            }
            $this->action = "SuccessfullyAdded";
            //echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";
        }
    }

    /* function updateData($connid)
      {
      if(is_array($this->description) && count($this->description) >0)
      {
      for($i=0;$i<count($this->description);$i++)
      {
      if($this->description[$i] != "")
      {

      }
      }
      //echo "<div align='center'>The subtopic details have been saved successfully</div>";
      //echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";
      }
      } */

    function getAllSubtopic($connid) {
        $arrRet = array();
        $query = "SELECT subtopic_code,description,topic_code,expected_questions FROM da_subtopicMaster ORDER BY topic_code";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["topic_code"]][] = array("topic_code" => $row["topic_code"], "subtopic_code" => $row["subtopic_code"], "expected_questions" => $row["expected_questions"]);
        }
        return $arrRet;
    }

    function retrieveSubTopicDetails($connid) {
        $this->description = "";
        $this->expected_questions = "";
        $this->subtopic_code = "";
        $this->setgetvars();
        $query = "SELECT a.description,a.topic_code,class,subjectno,expected_questions,subtopic_code FROM da_subtopicMaster a,da_topicMaster b WHERE a.topic_code = b.topic_code AND a.topic_code = '" . $this->topic_code . "' ORDER BY subtopic_code";
        $dbquery = new dbquery($query, $connid);
        /* $this->class = $row["class"];
          $this->subjectno = $row["subjectno"]; */
        $i = 0;
        while ($row = $dbquery->getrowarray()) {
            $this->description[$i] = $row["description"];
            $this->expected_questions[$i] = $row["expected_questions"];
            $this->subtopic_code[$i] = $row["subtopic_code"];
            $i++;
        }
        //$this->topic_code = $row["topic_code"];
    }

    function checkDuplicate($connid) {
        if (is_array($this->description) && count($this->description) > 0) {
            for ($i = 0; $i < count($this->description); $i++) {
                if ($this->description[$i] != "" && !isset($this->subtopic_code[$i])) {
                    $query = "SELECT count(*) FROM da_subtopicMaster WHERE description = '" . $this->description[$i] . "' AND topic_code = '" . $this->topic_code . "'";
                    $dbquery = new dbquery($query, $connid);
                    $row = $dbquery->getrowarray();
                    //echo $row[0];
                    if ($row[0] > 0) {
                        $this->setcolor[$i + 1] = "#FFFF99";
                        return true;
                    } else
                        return false;
                }
            }
        }
    }

    function getAllSubTopicForSuggestList($connid) {
        $arrRet = array();
        $query = "SELECT DISTINCT description FROM da_subtopicMaster";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[] = $row["description"];
        }
        return $arrRet;
    }

    function getPendingAllotment($connid) {
        $arrRet = array();
        $condition = "";
        $condition1 = "";
        $userType = checkUserType();
        if ($userType > 0) {
            $condition.=" AND a.current_alloted = 'Designer' ";
        } else {
            //$condition.="AND a.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = a.qcode) 
            $condition .=" AND a.current_alloted = '" . $_SESSION["username"] . "' ";
        }

        # Current alloted questions display in main page
        $query = "SELECT count(qcode) as qcount,
			      a.sub_subtopic_code,b.description as subsubtopic, c.description as subtopic, d.description as topic, a.subjectno, a.class, group_concat(a.qcode) as qcodeList
		          FROM da_questions a, da_subSubTopicMaster b, da_subtopicMaster c, da_topicMaster d
		          WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code=c.subtopic_code AND c.topic_code=d.topic_code 
		          AND a.status < 3 " . $condition . " GROUP BY sub_subtopic_code ORDER BY topic";

        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["sub_subtopic_code"]] = array("qcount" => $row["qcount"], "subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "qcodeList" => $row["qcodeList"], "imgcount" => 0, "freelancercount" => 0);
        }

        # images count that needs to be approved displayed in main page
        $query = "SELECT count(image_id) as imgcount,d.sub_subtopic_code,b.description as subtopic, c.description as topic, e.description as subsubtopic, a.class, a.subjectno
		          FROM   da_images a, da_questions d,da_subtopicMaster b, da_topicMaster c, da_subSubTopicMaster e
		          WHERE  a.id=d.qcode AND d.sub_subtopic_code = e.sub_subtopic_code AND e.subtopic_code=b.subtopic_code AND b.topic_code=c.topic_code AND where_in_question in ('Q','A','B','C','D','IDO') " . $condition . "
		          GROUP BY sub_subtopic_code ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            if (isset($arrRet[$row["subsubtopic_code"]]))
                $arrRet[$row["sub_subtopic_code"]]["imgcount"] = $row["imgcount"];
            else
                $arrRet[$row["sub_subtopic_code"]] = array("qcount" => 0, "subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "imgcount" => $row["imgcount"], "freelancercount" => 0);
        }
        $query = "SELECT image_id ,MIN(d.sub_subtopic_code) as sub_subtopic_code,b.description as subtopic, c.description as topic, e.description as subsubtopic, d.class, d.subjectno
		          FROM   da_images a, da_questions d,da_subtopicMaster b, da_topicMaster c, da_subSubTopicMaster e
		          WHERE  a.id=d.group_id AND d.sub_subtopic_code = e.sub_subtopic_code AND e.subtopic_code=b.subtopic_code AND b.topic_code=c.topic_code AND where_in_question in ('GT') " . $condition . "
		          GROUP BY image_id ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            if (isset($arrRet[$row["sub_subtopic_code"]])) {
                $arrRet[$row["sub_subtopic_code"]]["imgcount"] = $arrRet[$row["sub_subtopic_code"]]["imgcount"] + 1;
            } else {
                $arrDesc = $this->getDetailsBySubtopicCode($connid, $row["subtopicCode"]);
                $arrRet[$row["sub_subtopic_code"]] = array("qcount" => 0, "subsubtopic" => $row["subsubtopic"], "subtopic" => $arrDesc["subtopic"], "topic" => $arrDesc["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "imgcount" => 1, "freelancercount" => 0);
            }
        }

        # freelancer questions count display that need to be check in main page
        $query = "SELECT COUNT(*),b.sub_subtopic_code,b.description as subsubtopic,c.description as subtopic,d.description as topic,a.class,a.subjectno FROM da_freelancer_questions a,da_subSubTopicMaster b,da_subtopicMaster c, da_topicMaster d
				  WHERE a.used = 0 AND a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = c.subtopic_code AND c.topic_code = d.topic_code AND b.entered_by = '" . $_SESSION["username"] . "' AND a.status IN (2,5) GROUP BY a.sub_subtopic_code";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            if (isset($arrRet[$row["sub_subtopic_code"]])) {
                $arrRet[$row["sub_subtopic_code"]]["freelancercount"] = $arrRet[$row["sub_subtopic_code"]]["freelancercount"] + $row[0];
            } else {
                $arrRet[$row["sub_subtopic_code"]] = array("qcount" => 0, "subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "imgcount" => 0, "freelancercount" => $row[0]);
            }
        }
        return $arrRet;
    }

    function GetOwnQuesAlloted($connid) {

        $arrRet = array();
        $condition.="AND a.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = a.qcode) 
		             AND a.current_alloted = '" . $_SESSION["username"] . "' AND a.question_maker = '" . $_SESSION["username"] . "' ";

        $query = "SELECT count(qcode) as qcount,
			      a.sub_subtopic_code,b.description as subsubtopic, c.description as subtopic, d.description as topic, a.subjectno, a.class, group_concat(a.qcode) as qcodeList
		          FROM da_questions a, da_subSubTopicMaster b, da_subtopicMaster c, da_topicMaster d
		          WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code=c.subtopic_code AND c.topic_code=d.topic_code
		           " . $condition . " GROUP BY sub_subtopic_code ORDER BY topic";

        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["sub_subtopic_code"]] = array("qcount" => $row["qcount"], "subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "qcodeList" => $row["qcodeList"]);
        }
        return $arrRet;
    }

    function GetOthersQuesAlloted($connid) {

        $arrRet = array();
        $condition.="AND a.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = a.qcode) 
		             AND a.current_alloted = '" . $_SESSION["username"] . "' AND a.question_maker != '" . $_SESSION["username"] . "' ";

        $query = "SELECT count(qcode) as qcount,
			      a.sub_subtopic_code,b.description as subsubtopic, c.description as subtopic, d.description as topic, a.subjectno, a.class, group_concat(a.qcode) as qcodeList
		          FROM da_questions a, da_subSubTopicMaster b, da_subtopicMaster c, da_topicMaster d
		          WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code=c.subtopic_code AND c.topic_code=d.topic_code
		           " . $condition . " GROUP BY sub_subtopic_code ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["sub_subtopic_code"]] = array("qcount" => $row["qcount"], "subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "qcodeList" => $row["qcodeList"]);
        }

        return $arrRet;
    }

    /*     * *******************Added Start by Parth 04/01/2012 ************************ */

    function getImagePendingAllotment($connid) {
        $arrRet = array();
        $condition.="AND (a.status='0' OR a.status='2') AND a.current_alloted = 'Designer' ";
        $query = "SELECT count(image_id) as imgcount,a.status,d.sub_subtopic_code,b.description as subtopic, c.description as topic, e.description as subsubtopic, a.class, 
				  a.subjectno FROM   da_images a, da_questions d,da_subtopicMaster b, da_topicMaster c, da_subSubTopicMaster e
		          WHERE  a.id=d.qcode AND d.sub_subtopic_code = e.sub_subtopic_code AND e.subtopic_code=b.subtopic_code AND b.topic_code=c.topic_code 
		          AND where_in_question in ('Q','A','B','C','D','IDO') " . $condition . "
		          GROUP BY sub_subtopic_code,a.status,a.class ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $classes = array();
            $classes2 = array();
            if (isset($arrRet[$row["sub_subtopic_code"]])) {
                if ($row['status'] == 0) {
                    if ($arrRet[$row["sub_subtopic_code"]]["class"] == "")
                        $arrRet[$row["sub_subtopic_code"]]["class"] = $row['class'];

                    $classes = explode(",", $arrRet[$row["sub_subtopic_code"]]["class"]);
                    if (!in_array($row['class'], $classes)) {
                        $arrRet[$row["sub_subtopic_code"]]["class"] = $arrRet[$row["sub_subtopic_code"]]["class"] . "," . $row["class"];
                    }
                    $arrRet[$row["sub_subtopic_code"]]["imgcount"] = $arrRet[$row["sub_subtopic_code"]]["imgcount"] + $row["imgcount"];
                }
                if ($row['status'] == 2) {
                    if ($arrRet[$row["sub_subtopic_code"]]["class2"] == "")
                        $arrRet[$row["sub_subtopic_code"]]["class2"] = $row['class'];

                    $classes2 = explode(",", $arrRet[$row["sub_subtopic_code"]]["class2"]);
                    if (!in_array($row['class'], $classes2)) {
                        $arrRet[$row["sub_subtopic_code"]]["class2"] = $arrRet[$row["sub_subtopic_code"]]["class2"] . "," . $row["class"];
                    }
                    $arrRet[$row["sub_subtopic_code"]]["imgcount2"] = $arrRet[$row["sub_subtopic_code"]]["imgcount2"] + $row["imgcount"];
                }
            } else {
                if ($row['status'] == 0) {
                    $arrRet[$row["sub_subtopic_code"]] = array("subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "imgcount" => $row["imgcount"], "imgcount2" => 0);
                }
                if ($row['status'] == 2) {
                    $arrRet[$row["sub_subtopic_code"]] = array("subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class2" => $row["class"], "subjectno" => $row["subjectno"], "imgcount" => 0, "imgcount2" => $row["imgcount"]);
                }
            }
        }
        $query = "SELECT image_id,a.status,MIN(d.sub_subtopic_code) as sub_subtopic_code,b.description as subtopic, c.description as topic, e.description as subsubtopic, 
				  d.class, d.subjectno FROM   da_images a, da_questions d,da_subtopicMaster b, da_topicMaster c, da_subSubTopicMaster e
		          WHERE  a.id=d.group_id AND d.sub_subtopic_code = e.sub_subtopic_code AND e.subtopic_code=b.subtopic_code AND b.topic_code=c.topic_code 
		          AND where_in_question in ('GT') " . $condition . "
		          GROUP BY image_id,a.status,a.class ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $classes = array();
            $classes2 = array();
            if (isset($arrRet[$row["sub_subtopic_code"]])) {
                if ($row['status'] == 0) {
                    if ($arrRet[$row["sub_subtopic_code"]]["class"] == "")
                        $arrRet[$row["sub_subtopic_code"]]["class"] = $row['class'];

                    $classes = explode(",", $arrRet[$row["sub_subtopic_code"]]["class"]);
                    if (!in_array($row['class'], $classes)) {
                        $arrRet[$row["sub_subtopic_code"]]["class"] = $arrRet[$row["sub_subtopic_code"]]["class"] . "," . $row["class"];
                    }
                    $arrRet[$row["sub_subtopic_code"]]["imgcount"] = $arrRet[$row["sub_subtopic_code"]]["imgcount"] + 1;
                }
                if ($row['status'] == 2) {
                    if ($arrRet[$row["sub_subtopic_code"]]["class2"] == "")
                        $arrRet[$row["sub_subtopic_code"]]["class2"] = $row['class'];

                    $classes2 = explode(",", $arrRet[$row["sub_subtopic_code"]]["class2"]);
                    if (!in_array($row['class'], $classes2)) {
                        $arrRet[$row["sub_subtopic_code"]]["class2"] = $arrRet[$row["sub_subtopic_code"]]["class2"] . "," . $row["class"];
                    }
                    $arrRet[$row["sub_subtopic_code"]]["imgcount2"] = $arrRet[$row["sub_subtopic_code"]]["imgcount2"] + 1;
                }
            } else {
                if ($row['status'] == 0) {
                    $arrRet[$row["sub_subtopic_code"]] = array("subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "imgcount" => 1, "imgcount2" => 0);
                }
                if ($row['status'] == 2) {
                    $arrRet[$row["sub_subtopic_code"]] = array("subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class2" => $row["class"], "subjectno" => $row["subjectno"], "imgcount" => 0, "imgcount2" => 1);
                }
            }
        }
        uasort($arrRet, create_function('$a, $b', 'if ($a["subjectno"] == $b["subjectno"]) return 0; return ($a["subjectno"] < $b["subjectno"]) ? -1 : 1;'));
        return $arrRet;
    }

    /*     * ******************Added End by Parth 04/01/2012 ********************* */

    function getFreelancerAllotment($connid) {
        $arrRet = array();
        $condition = "";
        $userType = checkUserType();
        $query = "SELECT count(qcode) as qcount,a.sub_subtopic_code,b.description as subsubtopic, c.description as subtopic, d.description as topic, a.subjectno, a.class, group_concat(a.qcode) as qcodeList FROM da_questions a, da_subSubTopicMaster b, da_subtopicMaster c, da_topicMaster d WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code=c.subtopic_code AND c.topic_code=d.topic_code AND b.freelancer =  '" . $_SESSION["username"] . "' AND a.status = '3' AND parent_qcode = 0 GROUP BY sub_subtopic_code ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["sub_subtopic_code"]] = array("qcount" => $row["qcount"], "subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "qcodeList" => $row["qcodeList"]);
        }
        $query = "SELECT count(qcode) as qcount,a.sub_subtopic_code,b.description as subsubtopic, c.description as subtopic, d.description as topic, a.subjectno, a.class, group_concat(a.qcode) as qcodeList FROM da_freelancer_questions a, da_subSubTopicMaster b, da_subtopicMaster c, da_topicMaster d WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code=c.subtopic_code AND c.topic_code=d.topic_code AND a.question_maker = '" . $_SESSION["username"] . "' AND b.freelancer =  '" . $_SESSION["username"] . "' AND a.parent_qcode != '0' GROUP BY sub_subtopic_code ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["sub_subtopic_code"]]["copyqcount"] = $row['qcount'];
            $arrRet[$row["sub_subtopic_code"]]["copyqcodeList"] = $row['qcodeList'];
        }
        $query = "SELECT count(qcode) as qcount,a.sub_subtopic_code,b.description as subsubtopic, c.description as subtopic, d.description as topic, a.subjectno, a.class, group_concat(a.qcode) as qcodeList FROM da_freelancer_questions a, da_subSubTopicMaster b, da_subtopicMaster c, da_topicMaster d WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code=c.subtopic_code AND c.topic_code=d.topic_code AND a.status = '1' AND a.question_maker = '" . $_SESSION["username"] . "' AND b.freelancer =  '" . $_SESSION["username"] . "' AND a.parent_qcode != '0' GROUP BY sub_subtopic_code ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["sub_subtopic_code"]]["commentatorqcount"] = $row['qcount'];
            $arrRet[$row["sub_subtopic_code"]]["commentatorqcodeList"] = $row['qcodeList'];
        }
        return $arrRet;
    }

    function getDetailsBySubtopicCode($connid, $subtopicCode) {
        $arrRet = array();
        $query = "SELECT a.description as subtopic,b.description as topic FROM da_subtopicMaster a,da_topicMaster b WHERE a.topic_code = b.topic_code AND a.subtopic_code = '" . $subtopicCode . "' ";
        $dbquery = new dbquery($query, $connid);
        $row = $dbquery->getrowarray();
        $arrRet["topic"] = $row["topic"];
        $arrRet["subtopic"] = $row["subtopic"];
        return $arrRet;
    }

    function getSubtopicsWithQuestionCount($connid, $flag = "", $subjectno = "", $class = "") {
        if ($flag == "1")
            $condition.=" AND misconception = 1 ";
        if ($flag == "2")
            $condition.= " AND a.current_alloted = '" . $_SESSION["username"] . "' ";
        if ($flag == "3")
            $condition.=" AND a.status = '" . $flag . "' ";
        if ($subjectno != "")
            $condition.= " AND a.subjectno = $subjectno";
        if ($class != "")
            $condition.= " AND a.class = $class";

        $query = "SELECT count(qcode) as qcount,a.subtopic_code FROM da_questions a,da_subtopicMaster b
		          WHERE a.subtopic_code = b.subtopic_code " . $condition . " GROUP BY subtopic_code";
        $dbquery = new dbquery($query, $connid);

        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["subtopic_code"]] = $row["qcount"];
        }
        return $arrRet;
    }

    function getSubSubtopicsWithQuestionCount($connid, $flag = "", $subjectno = "", $class = "", $tablename = "da_questions") {
        $condition = "";
        $arrRet = array();
        if ($flag == "1")
            $condition.=" AND misconception = 1 ";
        if ($flag == "2")
            $condition.= " AND a.current_alloted = '" . $_SESSION["username"] . "' ";
        if ($flag == "3")
            $condition.=" AND a.status = '" . $flag . "' ";
        if ($flag == "10")
            $condition.=" AND a.status in (2,5)";
        if ($flag == "11")
            $condition.=" AND a.parent_qcode = 0 AND a.status != $this->rejected_status";
        if ($flag == "12")
            $condition.=" AND a.parent_qcode != 0 AND a.status != $this->rejected_status";
        if ($subjectno != "")
            $condition.= " AND a.subjectno = $subjectno";
        if ($class != "")
            $condition.= " AND a.class = $class";
        if ($flag == "4")
            $condition.= " AND a.skill = 'Mechanical' ";
        if ($flag == "5")
            $condition.= " AND a.tag_ques = 1 ";
        if ($this->class != "")
            $condition.= " AND a.class = " . $this->class;
        if ($this->subjectno != "")
            $condition.= " AND a.subjectno = " . $this->subjectno;
        if ($tablename == "da_freelancer_questions")
            $condition.=" AND used = 0 ";

        if ($flag == 13) {
            $condition.=" AND a.parent_qcode = 0 AND a.status = 3";
        }

        if ($flag == 14) {
            $condition.=" AND a.parent_qcode != 0 AND a.status = 3";
        }

        if ($flag == "11" || $flag == "12") {
            $queryforglobal = "SET SESSION group_concat_max_len = 1000000";
            $dbquery_for_global = new dbquery($queryforglobal, $connid);

            $query = "SELECT count(qcode) as qcount,GROUP_CONCAT( qcode ) AS qcodes,a.sub_subtopic_code FROM " . $tablename . " a LEFT JOIN da_subSubTopicMaster b ON a.sub_subtopic_code = b.sub_subtopic_code WHERE 1=1 " . $condition . " GROUP BY a.sub_subtopic_code";
        } else {
            $query = "SELECT count(qcode) as qcount,a.sub_subtopic_code FROM " . $tablename . " a LEFT JOIN da_subSubTopicMaster b ON a.sub_subtopic_code = b.sub_subtopic_code
		          WHERE a.status != 4 " . $condition . " GROUP BY a.sub_subtopic_code";
        }

        $dbquery = new dbquery($query, $connid);

        while ($row = $dbquery->getrowarray()) {
            if ($flag == "11" || $flag == "12") {
                $arrRet[$row["sub_subtopic_code"]] = array("qcount" => $row["qcount"],
                    "list" => $row["qcodes"]);
            } else {
                $arrRet[$row["sub_subtopic_code"]] = $row["qcount"];
            }
        }
        //print_r($arrRet);
        return $arrRet;
    }

    function getSTwiseSkillCount($connid, $flag = "") {
        $arrRet = array();
        $condition = "";
        if ($flag == "1")
            $condition = " AND a.skill = 'Mechanical' ";
        if ($this->class != "")
            $condition.= " AND a.class = " . $this->class;
        if ($this->subjectno != "")
            $condition.= " AND a.subjectno = " . $this->subjectno;
        $query = "SELECT count(qcode) as qcount,a.sub_subtopic_code,b.subtopic_code FROM da_questions a
					LEFT JOIN da_subSubTopicMaster b ON a.sub_subtopic_code = b.sub_subtopic_code
					LEFT JOIN da_subtopicMaster c ON b.subtopic_code = c.subtopic_code
		          WHERE 1=1 " . $condition . " GROUP BY b.subtopic_code";
        $dbquery = new dbquery($query, $connid);

        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["subtopic_code"]] = $row["qcount"];
        }
        //print_r($arrRet);
        return $arrRet;
    }

    function topicSubtopicDetails($connid) {
        $condition = "";
        if ($this->subjectno != "")
            $condition .= " AND subjectno = '" . $this->subjectno . "' ";
        if ($this->topic_code != "" && $this->topic_code > 0)
            $condition.=" AND b.topic_code = '" . $this->topic_code . "' ";
        if ($this->subtopic_code != "" && $this->subtopic_code > 0)
            $condition.=" AND a.subtopic_code = '" . $this->subtopic_code . "' ";
        if ($this->status != "")
            $condition.=" AND a.status = '" . $this->status . "' ";
        if ($this->sstapprover != "")
            $condition.=" AND a.approver = '" . $this->sstapprover . "' ";
        if ($this->srch_approver2 != "")
            $condition.=" AND a.approver2 = '" . $this->srch_approver2 . "' ";
        if ($this->current_alloted != "")
            $condition.=" AND a.current_alloted = '" . $this->current_alloted . "' ";
        if ($this->class != "")
            $condition.= " AND find_in_set('" . $this->class . "',a.class) > 0";
        if ($this->searchOwner != "")
            $condition.=" AND a.entered_by = '" . $this->searchOwner . "' ";
        if ($this->fromDate != "")
            $condition.=" AND a.approved_date >= '" . $this->fromDate . "' ";
        if ($this->toDate != "")
            $condition.=" AND a.approved_date <= '" . $this->toDate . "' ";
        $order_by = " ORDER BY topic, subtopic";
        if (is_array($this->sorting) && count($this->sorting) > 0)
            $order_by = " ORDER BY " . implode(",", $this->sorting);
        if (trim($this->multisort) != "")
            $order_by = " ORDER BY " . $this->multisort;
        if ($this->freelancerName != "")
            $condition.=" AND a.freelancer = '" . $this->freelancerName . "' ";

        $query = "SELECT a.description as subsubtopic,b.description as subtopic,c.description as topic,a.expected_questions,b.topic_code,b.subtopic_code,a.commentator,a.approver,a.status,a.entered_by,a.sub_subtopic_code, a.what_it_covers,a.freelancer,
				a.class,a.entered_by as owner,a.class as sst_class,a.status as sst_status,approver2
				FROM da_subSubTopicMaster a,da_subtopicMaster b,da_topicMaster c WHERE a.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code " . $condition;
        $query .= $order_by . " " . $this->sorttype;
        $dbquery = new dbquery($query, $connid);
        //echo $query;
        return $dbquery;
    }

    function GetSstIPSAnd2ndApproveQCount($connid) {

        $this->setgetvars();
        $this->setpostvars();

        $ResultArr = array();
        $condition1 = "";
        $condition2 = "";

        if ($this->action != "") {

            if ($this->subjectno != "")
                $condition1 .= " AND da_questions.subjectno = '" . $this->subjectno . "' ";

            if ($this->class == "") {

                $query = "SELECT da_ipsMaster.level,da_questions.sub_subtopic_code,da_ipsMaster.topic_code,
			    				 count(distinct(da_ipsDetails.qcode)) AS qcodecount
						  FROM da_ipsDetails
						  LEFT JOIN da_ipsMaster ON da_ipsDetails.ips_id = da_ipsMaster.ips_id
						  LEFT JOIN da_questions ON da_ipsDetails.qcode = da_questions.qcode
						  WHERE da_ipsDetails.ips_status = 1
						  $condition1
						  GROUP BY da_ipsMaster.level,da_questions.sub_subtopic_code";
                $dbqry = new dbquery($query, $connid);
                while ($result = $dbqry->getrowarray()) {
                    $ResultArr["IPSRESOLVED"][$result["level"]][$result["sub_subtopic_code"]] = $result["qcodecount"];
                }

                $query1 = "SELECT sub_subtopic_code,count(distinct(qcode)) AS qcodecount
						   FROM da_questions
						   WHERE approver2_status = 1 AND status = 3
					   	   $condition1
					   	   GROUP BY sub_subtopic_code";
                $dbqry1 = new dbquery($query1, $connid);
                while ($result2 = $dbqry1->getrowarray()) {
                    $ResultArr["SECONDAPPROVED"][$result2["sub_subtopic_code"]] = $result2["qcodecount"];
                }
            } else {

                $query = "SELECT da_ipsMaster.level,da_ipsMaster.class,da_questions.sub_subtopic_code,da_ipsMaster.topic_code,count(distinct(da_ipsDetails.qcode)) AS qcodecount
						  FROM da_ipsDetails
						  LEFT JOIN da_ipsMaster ON da_ipsDetails.ips_id = da_ipsMaster.ips_id
						  LEFT JOIN da_questions ON da_ipsDetails.qcode = da_questions.qcode
						  WHERE da_ipsDetails.ips_status = 1
						  $condition1
						  GROUP BY da_ipsMaster.level,da_questions.sub_subtopic_code,da_ipsMaster.class";
                $dbqry = new dbquery($query, $connid);
                while ($result = $dbqry->getrowarray()) {
                    $ResultArr["IPSRESOLVED"][$result["level"]][$result["class"]][$result["sub_subtopic_code"]] = $result["qcodecount"];
                }

                $query1 = "SELECT class,sub_subtopic_code,count(distinct(qcode)) AS qcodecount
						   FROM da_questions
						   WHERE approver2_status = 1 AND status = 3
					   	   $condition1
					   	   GROUP BY class, sub_subtopic_code";
                $dbqry1 = new dbquery($query1, $connid);
                while ($result2 = $dbqry1->getrowarray()) {
                    $ResultArr["SECONDAPPROVED"][$result2["class"]][$result2["sub_subtopic_code"]] = $result2["qcodecount"];
                }
            }
        }
        return $ResultArr;
    }

    function topicSubtopicCount($connid) {
        $arrRet = array();
        $condition = "";
        if ($this->topic_code != "" && $this->topic_code > 0)
            $condition.=" AND b.topic_code = '" . $this->topic_code . "' ";
        if ($this->subtopic_code != "" && $this->subtopic_code > 0)
            $condition.=" AND a.subtopic_code = '" . $this->subtopic_code . "' ";
        $query = "SELECT count(a.sub_subtopic_code) as sstcount,b.subtopic_code FROM da_subSubTopicMaster a,da_subtopicMaster b,da_topicMaster c WHERE a.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code AND subjectno = '" . $this->subjectno . "' " . $condition;
        $query .= " GROUP BY b.subtopic_code ";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["subtopic_code"]] = $row["sstcount"];
        }
        return $arrRet;
    }

    function subtopicDetails($connid, $topic = "", $class = "") {
        $this->setpostvars();
        $condition = "";
        if ($topic == "")
            $topic = $this->topic_code;
        if ($class != "")
            $condition = " AND find_in_set('" . $class . "',c.class) > 0 ";
        $query = "SELECT DISTINCT a.description as subtopic,a.subtopic_code FROM da_subtopicMaster a,da_topicMaster b,da_subSubTopicMaster c WHERE a.topic_code = b.topic_code AND a.subtopic_code = c.subtopic_code AND a.topic_code = '" . $topic . "' " . $condition;
        $dbquery = new dbquery($query, $connid);
        //echo $dbquery->getrowarray();
        return $dbquery;
    }

    function makeAllotment($connid) {
        if (is_array($this->commentator) && count($this->commentator) > 0) {
            $i = 0;
            foreach ($this->commentator as $key => $userID) {
                if ($userID != "") {
                    $queryST = "UPDATE da_subSubTopicMaster SET commentator = '" . $userID . "' WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$i] . "'";
                    $dbqueryST = new dbquery($queryST, $connid);
                    if ($dbqueryST->affectedrows() > 0) {
                        // as we have to allot only status 0,2 questions as per discussion with nishchal Dt:12-06-2012
                        $query = "UPDATE da_questions SET current_alloted = '" . $userID . "',first_alloted = '" . $userID . "' 
								  WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$i] . "' AND status IN(0,2)";
                        $dbquery = new dbquery($query, $connid);
                    }
                }
                $i++;
            }
        }
        if (is_array($this->approver) && count($this->approver) > 0) {
            $j = 0;
            foreach ($this->approver as $akey => $approver) {
                if ($approver != "") {
                    $query_app = "UPDATE da_subSubTopicMaster SET approver = '" . $approver . "' WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$j] . "'";
                    $dbquery_app = new dbquery($query_app, $connid);
                    if ($dbquery_app->affectedrows() > 0) {
                        $query_allot = "UPDATE da_subSubTopicMaster SET current_alloted='" . $approver . "' WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$j] . "'";
                        $dbquery_allot = new dbquery($query_allot, $connid);
                    }
                }
                $j++;
            }
        }
        if (is_array($this->owner) && count($this->owner) > 0) {
            $k = 0;
            foreach ($this->owner as $okey => $owner) {
                if ($owner != "") {
                    $query_owner = "UPDATE da_subSubTopicMaster SET entered_by = '" . $owner . "' WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$k] . "'";
                    $dbquery_owner = new dbquery($query_owner, $connid);
                }
                $k++;
            }
        }
        if (is_array($this->approver2) && count($this->approver2) > 0) {
            $m = 0;
            foreach ($this->approver2 as $key => $userID) {
                if ($userID != "") {
                    $query_approver2 = "UPDATE da_subSubTopicMaster SET approver2 = '" . $userID . "' WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$m] . "'";
                    $dbquery_approver2 = new dbquery($query_approver2, $connid);
                    if ($dbquery_approver2->affectedrows() > 0) {
                        $query_approver_allot = "UPDATE da_questions SET current_alloted = '" . $userID . "' WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$m] . "' AND status = 3";
                        $dbquery_approver_allot = new dbquery($query_approver_allot, $connid);
                    }
                }
                $m++;
            }
        }
        if (is_array($this->freelancer) && count($this->freelancer) > 0) {
            $n = 0;
            foreach ($this->freelancer as $fkey => $freelancer) {
                if ($freelancer != "") {
                    if ($freelancer == "none") {
                        $freelancer = "";
                    }
                    $query_freelancer = "UPDATE da_subSubTopicMaster SET freelancer = '" . $freelancer . "' WHERE sub_subtopic_code = '" . $this->sub_subtopic_code[$n] . "'";
                    $dbquery_freelancer = new dbquery($query_freelancer, $connid);
                }
                $n++;
            }
        }
    }

    function saveComments($connid) {
        $comments = "<b>" . $_SESSION["username"] . "</b>(" . date("d-m-Y") . "):" . $this->comments;
        $query_cd = "SELECT count(*) FROM da_subSubTopicMaster WHERE sub_subtopic_code='" . $this->sub_subtopic_code . "' AND comments = '" . $comments . "' ";

        $dbquery_cd = new dbquery($query_cd, $connid);
        $row = $dbquery_cd->getrowarray();
        if ($row[0] == 0) {
            $query = "UPDATE da_subSubTopicMaster SET comments = CONCAT_WS('<br>',comments,'" . $comments . "') WHERE sub_subtopic_code = '" . $this->sub_subtopic_code . "' ";
            //$query = "INSERT INTO da_subtopicComments SET commenter = '".$_SESSION["username"]."',comment = '".$this->comments."',type='ST',submitdate = NOW() ";
            $dbquery = new dbquery($query, $connid);
            $this->changeSSTallotment($connid, $this->sub_subtopic_code);
        }
    }

    function changeSSTallotment($connid, $sub_subtopic_code) {
        $querySST = "SELECT approver,entered_by FROM da_subSubTopicMaster WHERE sub_subtopic_code = '" . $this->sub_subtopic_code . "' ";
        $dbquerySST = new dbquery($querySST, $connid);
        $rowSST = $dbquerySST->getrowarray();
        if ($rowSST["approver"] == $_SESSION["username"])
            $current_allotto = $rowSST["entered_by"];
        if ($rowSST["entered_by"] == $_SESSION["username"])
            $current_allotto = $rowSST["approver"];

        $query = "UPDATE da_subSubTopicMaster SET current_alloted = '" . $current_allotto . "' WHERE sub_subtopic_code = '" . $sub_subtopic_code . "'  AND status != 'Approved' ";
        $dbquery = new dbquery($query, $connid);
    }

    function approve($connid, $sub_subtopic_code = "") {
        if ($sub_subtopic_code == "")
            $sub_subtopic_code = $this->sub_subtopic_code;

        $query = "UPDATE da_subSubTopicMaster SET status = 'Approved', approved_date=curdate(),current_alloted = '' WHERE sub_subtopic_code = '" . $sub_subtopic_code . "'";
        $dbquery = new dbquery($query, $connid);
        $this->setQuestionsFree($connid, $sub_subtopic_code);
    }

    function setQuestionsFree($connid, $sub_subtopic_code) {
        $query = "UPDATE da_questions SET current_alloted = '' WHERE sub_subtopic_code = '" . $sub_subtopic_code . "'  AND status = '3' ";
        $dbquery = new dbquery($query, $connid);
    }

    function approveMultipleSubSubtopics($connid) {
        if (is_array($this->approveSubSubtopic) && count($this->approveSubSubtopic) > 0) {
            foreach ($this->approveSubSubtopic as $key => $sub_subtopic_code) {
                $this->approve($connid, $sub_subtopic_code);
            }
        }
    }

    function searchQuestions($connid, $arrQcodes = array(), $tablename = "da_questions", $conditionset = "", $paging = "") {
        $this->setpostvars();
        $this->setgetvars();

        $this->clspaging->setgetvars();
        $this->clspaging->setpostvars();

        $qcodes_list = "";
        if (is_array($arrQcodes) && count($arrQcodes) > 0)
            $qcodes_list = implode($arrQcodes, ",");
        $arrRet = array();
        $arrPassageDetails = $this->getPassageDetails($connid);

        if ($this->action == "SearchData" || $this->action == "search") {
            $join_str = "";
            $join_cond = "";

            if ($this->appr_QsearchFlag == 2) {
                $join_str = ", da_comments e ";
                $approver_str = "";
                if ($this->approvedBy != "")
                    $approver_str = " AND e.commenter='" . addslashes($this->approvedBy) . "' ";

                $join_cond = " AND a.qcode =e.qcode " . $approver_str . " AND e.comment='AUTO:Second Approved' AND e.type='AUTO'
                               AND e.submitdate >='" . $this->approvedFromDate . "' AND e.submitdate <='" . $this->approvedToDate . "' ";
            }

            if ($this->appr_QsearchFlag == 3) { // Listing of all searched second approved questions
                $join_str = ", da_comments e ";
                $approver_str = "";
                $this->approvedBy = "";
                if ($this->approvedBy == "")
                    $approver_str = " AND e.commenter!='' ";

                $join_cond = " AND a.qcode =e.qcode " . $approver_str . " AND e.comment='AUTO:Second Approved' AND e.type='AUTO'
                               AND e.submitdate >='" . $this->approvedFromDate . "' AND e.submitdate <='" . $this->approvedToDate . "' ";
            }


            if ($this->appr_QsearchFlag == 1) {
                $join_str = ", da_comments e ";
                $approver_str = "";
                if ($this->approvedBy != "")
                    $approver_str = " AND e.commenter='" . addslashes($this->approvedBy) . "' ";

                $join_cond = " AND a.qcode =e.qcode " . $approver_str . " AND e.comment='AUTO:Approved' AND e.type='AUTO'
                               AND e.submitdate >='" . $this->approvedFromDate . "' AND e.submitdate <='" . $this->approvedToDate . "' ";
            }

            $query = "SELECT a.*,b.description as subtopic,c.description as topic, d.description as subsubtopic, a.sub_subtopic_code
                               FROM   " . $tablename . " a, da_subSubTopicMaster d, da_subtopicMaster b,da_topicMaster c " . $join_str . " 
                              WHERE  a.sub_subtopic_code=d.sub_subtopic_code AND d.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code
                                      " . $join_cond . " ";

            if (trim($this->searchqcode) != "")
                $query.=" AND qcode IN (" . $this->searchqcode . ") ";
            if ($this->class != "" && $this->class > 0)
                $query.=" AND a.class = '" . $this->class . "' ";
            if ($this->searchstatus != "") {
                $query.=" AND a.status = '" . $this->searchstatus . "' ";
            }
            if ($this->usedByEI != "" && $tablename == "da_freelancer_questions")
                $query.=" AND used = '1' ";
            if ($this->usedByEI != "" && $tablename == "da_questions")
                $query.=" AND copied_from > 0 ";
            if ($this->subjectno != "" && $this->subjectno > 0) {
                if ($this->testClass > 0 && $this->subjectno == "3")
                    $query.=" AND a.subjectno IN (" . $this->subjectno . ",4) ";
                else
                    $query.=" AND a.subjectno IN (" . $this->subjectno . ") ";
            }
            if ($this->topic_code != "" && $this->topic_code > 0)
                $query.=" AND c.topic_code = '" . $this->topic_code . "' ";
            if ($this->subtopic_code != "" && $this->subtopic_code > 0)
                $query.=" AND b.subtopic_code = '" . $this->subtopic_code . "' ";
            if ($this->sub_subtopic_code != "" && $this->sub_subtopic_code > 0)
                $query.=" AND a.sub_subtopic_code = '" . $this->sub_subtopic_code . "' ";
            if ($this->skill != "")
                $query.=" AND a.skill = '" . $this->skill . "' ";
            if ($this->searchallotedto != "")
                $query.=" AND a.current_alloted = '" . $this->searchallotedto . "' ";
            if ($this->searchqmaker != "")
                $query.=" AND question_maker = '" . $this->searchqmaker . "' ";
            if ($this->searchmisconception == "1")
                $query.=" AND misconception = '" . $this->searchmisconception . "' ";
            if ($this->searchindicator != "")
                $query.=" AND tag_ques = '" . $this->searchindicator . "' ";
            if (isset($this->status) && $this->status > 0)
                $query.=" AND a.status  in (" . $this->status . ")";
            if (isset($this->passage_id) && $this->passage_id > 0)
                $query.=" AND a.passage_id = '" . $this->passage_id . "' ";
            if (isset($this->group_id) && $this->group_id > 0)
                $query.=" AND a.group_id = '" . $this->group_id . "' ";
            if ($qcodes_list != "" && $this->qmade == "")
                $query.=" AND qcode NOT IN (" . $qcodes_list . ") ";
            if ($this->freelancer_name != '' && $tablename == "da_freelancer_questions")
                $query.=" AND question_maker = '" . $this->freelancer_name . "' ";
            if ($this->freelancer_name != '' && $tablename == "da_questions")
                $query.=" AND added_by = '" . $this->freelancer_name . "' ";

            if ($this->excludedStatus == 1 && $this->searchstatus == "")
                $query.=" AND a.status NOT IN (3,4)";

            if ($this->qmade > 0) {
                if ($qcodes_list != "")
                    $query.=" AND qcode IN (" . $qcodes_list . ") ";
                else
                    $query.=" AND qcode IN (0) ";
            }
            if (isset($this->keyword) && $this->keyword != "") {
                $condition = "";
                if ($tablename == "da_freelancer_questions") {
                    $condition = "OR logic_distractor_a LIKE '%" . $this->keyword . "%' OR logic_distractor_b LIKE '%" . $this->keyword . "%' OR logic_distractor_c LIKE '%" . $this->keyword . "%' OR logic_distractor_d LIKE '%" . $this->keyword . "%'";
                }
                $query.=" AND (question LIKE '%" . $this->keyword . "%' OR optiona LIKE '%" . $this->keyword . "%' OR optionb LIKE '%" . $this->keyword . "%' OR optionc LIKE '%" . $this->keyword . "%' OR optiond LIKE '%" . $this->keyword . "%' OR mcexplanation LIKE '%" . $this->keyword . "%' OR remedial_instruction LIKE '%" . $this->keyword . "%' OR question_testing LIKE  '%" . $this->keyword . "%' $condition) ";
            }
            if (isset($this->mc_added_by) && $this->mc_added_by != "")
                $query.=" AND a.mc_added_by = '" . $this->mc_added_by . "' ";
            if (isset($this->testClass) && $this->subjectno == 1 && $this->testClass > 0 && $this->class == "")
                $query.=" AND a.class = '" . $this->testClass . "' ";
            if (isset($this->fromDate) && $this->fromDate != "")
                $query.=" AND submit_date >= '" . $this->fromDate . "' ";
            if (isset($this->toDate) && $this->toDate != "")
                $query.=" AND submit_date <= '" . $this->toDate . "' ";
            if ($this->mc_fromDate != "")
                $query.=" AND mc_added_date >= '" . $this->mc_fromDate . "' ";
            if ($this->mc_toDate != "")
                $query.=" AND mc_added_date <= '" . $this->mc_toDate . "' ";
            if (isset($this->sstlist) && $this->sstlist != "")
                $query.=" AND a.sub_subtopic_code IN (" . $this->sstlist . ") AND a.status = '3' ";
            if ($tablename == "da_freelancer_questions" && $_SESSION["company"] == "" && $this->usedByEI == "")
                $query.=" AND used = 0 ";

            if ($this->flflag == "Y") {
                $query .= "AND d.freelancer = '" . $_SESSION["username"] . "' AND a.status = 3";
            } elseif (isset($_SESSION["company"]) && $_SESSION["company"] != '') {
                $query.=" AND question_maker IN (SELECT username FROM da_freelancerDetails WHERE company = '" . $_SESSION["company"] . "' ) ";
            }

            if ($this->ips_status != "" && $this->ips_status != 0) {
                $query.=" AND a.ips_status = $this->ips_status";
            }

            if ($this->source != "") {
                $query.=" AND a.source = '" . $this->source . "'";
            }

            if ($this->secondapproved != "" && $this->secondapproved != 0) {
                $query.=" AND a.approver2_status = $this->secondapproved";
            }

            if (isset($this->copyques) && $this->copyques != "" && $this->copyques == 0)
                $query.=" AND a.parent_qcode = 0 ";
            if (isset($this->copyques) && $this->copyques != "" && $this->copyques == 1)
                $query.=" AND a.parent_qcode != 0 ";

            if (isset($this->srchnotinstatus) && $this->srchnotinstatus != "")
                $query .= " AND a.status != $this->srchnotinstatus ";

            if (isset($this->ssst_code) && $this->ssst_code != "")
                $query .= " AND a.ssst_code = $this->ssst_code ";

            if ($conditionset != "")
                $query .= $conditionset;

            // search from add questions page different ordering 
            if ($this->queryPageName == "addQuestions") {
                $query.=" ORDER BY a.sub_subtopic_code,group_id,a.school_usage,qcode";
            } else {
                $query.=" ORDER BY a.source DESC,a.sub_subtopic_code,group_id,qcode";
            }
            //	$query.=" ORDER BY a.source DESC,a.sub_subtopic_code,group_id,qcode";


            $this->clspaging->numofrecs = getQueryCount($query);

            if ($this->clspaging->numofrecs > 0) {
                $this->clspaging->getcurrpagevardb();
            }


            if ($paging == "Y")
                $query .= $this->clspaging->limit;

            if ($_SESSION["username"] == "sudhir.prajapati" || $_SESSION["username"] == "tb.test" || $_SESSION["username"] == "naveen.kumar")
                echo $query;

            $dbquery = new dbquery($query, $connid);
            while ($row = $dbquery->getrowarray()) {
                $minclass = "";
                if ($tablename = "da_questions" || $tablename = "da_questions_versions") {
                    $minclass = $row["class_minlevel"];
                }

                ######################################For source based qcode#####################################
                $otherQcode = "";
                if ($row["source"] != "") {
                    if ($row["source"] == "ASSET") {
                        $comment = "";
                        $otherQcode = "";
                        $query_AssetQcode = "SELECT comment FROM da_comments WHERE qcode = '" . $row["qcode"] . "' AND comment LIKE '%Added from ASSET%'";
                        $dbquery_AssetQcode = new dbquery($query_AssetQcode, $connid);
                        while ($row_AssetQcode = $dbquery_AssetQcode->getrowarray()) {
                            $arrOQB = array();
                            $arrFinalOQB = array();
                            $comment = $row_AssetQcode["comment"];
                            $arrOQB = explode("(qcode:", $comment);
                            $string_qcode = "";
                            $string_qcode = $arrOQB[1];
                            $arrFinalOQB = explode(")", $string_qcode);
                            $otherQcode = $arrFinalOQB[0];
                        }
                    } else if ($row["source"] == "TG") {
                        $comment = "";
                        $otherQcode = "";
                        $query_AssetQcode = "SELECT comment FROM da_comments WHERE qcode = '" . $row["qcode"] . "' AND comment LIKE '%Added from TG%'";
                        $dbquery_AssetQcode = new dbquery($query_AssetQcode, $connid);
                        while ($row_AssetQcode = $dbquery_AssetQcode->getrowarray()) {
                            $arrOQB = array();
                            $arrFinalOQB = array();
                            $comment = $row_AssetQcode["comment"];
                            $arrOQB = explode("(qcode:", $comment);
                            $string_qcode = "";
                            $string_qcode = $arrOQB[1];
                            $arrFinalOQB = explode(")", $string_qcode);
                            $otherQcode = $arrFinalOQB[0];
                        }
                    } else if ($row["source"] == "CQB") {
                        $comment = "";
                        $otherQcode = "";
                        $query_AssetQcode = "SELECT comment FROM da_comments WHERE qcode = '" . $row["qcode"] . "' AND comment LIKE '%Added from Common Ques Bank%'";
                        $dbquery_AssetQcode = new dbquery($query_AssetQcode, $connid);
                        while ($row_AssetQcode = $dbquery_AssetQcode->getrowarray()) {
                            $arrOQB = array();
                            $arrFinalOQB = array();
                            $comment = $row_AssetQcode["comment"];
                            $arrOQB = explode("(qcode:", $comment);
                            $string_qcode = "";
                            $string_qcode = $arrOQB[1];
                            $arrFinalOQB = explode(")", $string_qcode);
                            $otherQcode = $arrFinalOQB[0];
                        }
                    }
                }
                ######################################For source based qcode#####################################

                $arrRet[$row["qcode"]] = array("question" => $row["question"],
                    "class" => $row["class"],
                    "subjectno" => $row["subjectno"],
                    "topic" => $row["topic"],
                    "subtopic" => $row["subtopic"],
                    "subsubtopic" => $row["subsubtopic"],
                    "sub_subtopic_code" => $row["sub_subtopic_code"],
                    "optiona" => $row["optiona"],
                    "optionb" => $row["optionb"],
                    "optionc" => $row["optionc"],
                    "optiond" => $row["optiond"],
                    "correct_answer" => $row["correct_answer"],
                    "question_maker" => $row["question_maker"],
                    "status" => $row["status"],
                    "first_alloted" => $row["first_alloted"],
                    "current_alloted" => $row["current_alloted"],
                    "skill" => $row["skill"],
                    "misconception" => $row["misconception"],
                    "tag_ques" => $row["tag_ques"],
                    "question_testing" => $row["question_testing"],
                    "passage_name" => isset($arrPassageDetails[$row["passage_id"]]) ? $arrPassageDetails[$row["passage_id"]] : "",
                    "approver2_status" => $row["approver2_status"],
                    "parent_qcode" => $row["parent_qcode"],
                    "source" => $row["source"],
                    "ips_status" => $row["ips_status"],
                    "group_id" => $row["group_id"],
                    "passage_id" => $row["passage_id"],
                    "class_minlevel" => $minclass,
                    "other_source_qcode" => $otherQcode,
                    "school_usage" => $row["school_usage"]
                );
            }
        }



        //print_r($arrRet);
        return $arrRet;
    }

    function SearchQuestionForMapping($connid, $paging = "N") {

        $qcodes_list = "";
        $arrRet = array();

        if (is_array($arrQcodes) && count($arrQcodes) > 0)
            $qcodes_list = implode($arrQcodes, ",");
        $arrRet = array();
        #$arrPassageDetails = $this->getPassageDetails($connid);

        $query = "SELECT da_questions.*, da_topicMaster.description as topic, da_subSubTopicMaster.description as subsubtopic
				  from da_questions , da_subSubTopicMaster , da_subtopicMaster , da_topicMaster 
				  WHERE da_questions.sub_subtopic_code = da_subSubTopicMaster.sub_subtopic_code 
				  AND da_subSubTopicMaster.subtopic_code = da_subtopicMaster.subtopic_code 
				  AND da_subtopicMaster.topic_code = da_topicMaster.topic_code ";
        if (trim($this->searchqcode) != "")
            $query.=" AND qcode IN (" . $this->searchqcode . ") ";
        if ($this->class != "" && $this->class > 0)
            $query.=" AND da_questions.class = '" . $this->class . "' ";

        if ($this->subjectno != "" && $this->subjectno > 0) {
            if ($this->testClass > 0 && $this->subjectno == "3")
                $query.=" AND da_questions.subjectno IN (" . $this->subjectno . ",4) ";
            else
                $query.=" AND da_questions.subjectno IN (" . $this->subjectno . ") ";
        }
        if ($this->topic_code != "" && $this->topic_code > 0)
            $query.=" AND da_topicMaster.topic_code = '" . $this->topic_code . "' ";
        if ($this->subtopic_code != "" && $this->subtopic_code > 0)
            $query.=" AND da_subtopicMaster.subtopic_code = '" . $this->subtopic_code . "' ";
        if ($this->sub_subtopic_code != "" && $this->sub_subtopic_code > 0)
            $query.=" AND da_questions.sub_subtopic_code = '" . $this->sub_subtopic_code . "'";

        $query.=" ORDER BY da_questions.sub_subtopic_code,group_id,qcode";

        $this->clspaging->numofrecs = getQueryCount($query);

        if ($this->clspaging->numofrecs > 0) {
            $this->clspaging->getcurrpagevardb();
        }

        if ($paging == "Y")
            $query .= $this->clspaging->limit;

        if ($_SESSION["username"] == "jaspreet" || $_SESSION["username"] == "sudhir.prajapati" || $_SESSION["username"] == "tb.test")
            echo $query;

        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["qcode"]] = array("question" => $row["question"],
                "class" => $row["class"],
                "subjectno" => $row["subjectno"],
                "topic" => $row["topic"],
                "subtopic" => $row["subtopic"],
                "subsubtopic" => $row["subsubtopic"],
                "sub_subtopic_code" => $row["sub_subtopic_code"],
                "optiona" => $row["optiona"],
                "optionb" => $row["optionb"],
                "optionc" => $row["optionc"],
                "optiond" => $row["optiond"],
                "correct_answer" => $row["correct_answer"],
                "question_maker" => $row["question_maker"],
                "status" => $row["status"],
                "first_alloted" => $row["first_alloted"],
                "current_alloted" => $row["current_alloted"],
                "skill" => $row["skill"],
                "misconception" => $row["misconception"],
                "tag_ques" => $row["tag_ques"],
                "question_testing" => $row["question_testing"],
                "approver2_status" => $row["approver2_status"],
                "parent_qcode" => $row["parent_qcode"],
                "ips_status" => $row["ips_status"],
                "ssst_code" => $row["ssst_code"]
            );
        }

        return $arrRet;
    }

    function PageQuestionMapping($connid) {

        $arrRet = array();
        $this->setpostvars();
        $this->setgetvars();

        $this->clspaging->setgetvars();
        $this->clspaging->setpostvars();

        if (isset($this->submited) && $this->submited == 1 && $this->action == "SaveMapping") {

            $this->SaveMapping($connid);
            $this->action = "SearchData";
        }

        if ($this->action == "SearchData") {
            $arrRet = $this->SearchQuestionForMapping($connid, 'Y');
        }

        return $arrRet;
    }

    function SaveMapping($connid) {

        $QcodesArr = array();
        $QcodeStr = "";
        $NeedtoUpdateSSTCodeArr = array();
        $NeedtoUpdateSSSTCodeArr = array();

        if (is_array($this->subsubtopic_assign) && count($this->subsubtopic_assign) > 0) {

            $QcodesArr = array_keys($this->subsubtopic_assign);
            $QcodeStr = implode(",", $QcodesArr);

            $query = "select qcode,sub_subtopic_code,ssst_code from da_questions where qcode IN($QcodeStr)";
            $dbqry = new dbquery($query, $connid);
            while ($result = $dbqry->getrowarray()) {
                $QcodeSST[$result["qcode"]] = $result["sub_subtopic_code"];
                $QcodeSSST[$result["qcode"]] = $result["ssst_code"];
            }

            foreach ($this->subsubtopic_assign as $qcode => $subsubtopic_code) {

                if ($subsubtopic_code != "" && $subsubtopic_code != $QcodeSST[$qcode]) {
                    $NeedtoUpdateSSTCodeArr[$qcode] = $subsubtopic_code;
                }
            }

            foreach ($this->ssst_assign as $qcode => $ssst_code) {

                if ($ssst_code != "" && $ssst_code != $QcodeSSST[$qcode]) {
                    $NeedtoUpdateSSSTCodeArr[$qcode] = $ssst_code;
                }
            }

            # updating SST code
            if (is_array($NeedtoUpdateSSTCodeArr) && count($NeedtoUpdateSSTCodeArr) > 0) {

                foreach ($NeedtoUpdateSSTCodeArr as $qcode => $subsubtopic_code) {

                    $up_query = "UPDATE da_questions SET sub_subtopic_code = $subsubtopic_code WHERE qcode = $qcode";
                    $up_dbqry = new dbquery($up_query, $connid);

                    $in_query = "INSERT INTO da_comments SET 
			   				     qcode=" . $qcode . ",commenter='" . $_SESSION['username'] . "',comment='SST is changed from " . $QcodeSST[$qcode] . " To " . $subsubtopic_code . "',
			   				     type='Q',submitdate = NOW()";
                    $in_dbqry = new dbquery($in_query, $connid);
                }
                $this->msg = "Successfully Updated!";
            }

            # Updating SSST code
            if (is_array($NeedtoUpdateSSSTCodeArr) && count($NeedtoUpdateSSSTCodeArr) > 0) {

                foreach ($NeedtoUpdateSSSTCodeArr as $qcode => $ssst_code) {

                    $up_query1 = "UPDATE da_questions SET ssst_code = $ssst_code WHERE qcode = $qcode";
                    $up_dbqry1 = new dbquery($up_query1, $connid);

                    $in_query1 = "INSERT INTO da_comments SET 
			   				      qcode=" . $qcode . ",commenter='" . $_SESSION['username'] . "',comment='SSST is changed from " . $QcodeSSST[$qcode] . " To " . $ssst_code . "',
			   				      type='Q',submitdate = NOW()";
                    $in_dbqry1 = new dbquery($in_query1, $connid);
                }
                $this->msg = "Successfully Updated!";
            }
        }
    }

    function getSubtopicComments($connid, $subtopic_code = "") {
        if ($subtopic_code == "")
            $subtopic_code = $this->subtopic_code;
        $query = "SELECT comments FROM da_subSubTopicMaster WHERE sub_subtopic_code = '" . $subtopic_code . "'";
        $dbquery = new dbquery($query, $connid);
        $row = $dbquery->getrowarray();
        return $row[0];
    }

    function getSubtopicValidityToApprove($connid, $subtopic_code) {
        global $constant_da;
        $count = 0;
        $arrRet = array();
        $arrImages = array();
        $query = "SELECT * FROM da_questions a, da_images b WHERE a.qcode = b.id AND where_in_question != 'GT' AND subtopic_code = '" . $subtopic_code . "' AND b.status < 3";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrImages[] = $row["image_id"];
        }
        $count = $count + $dbquery->numrows();
        $queryGrp = "SELECT * FROM da_questions a, da_images b WHERE a.group_id = b.id AND where_in_question = 'GT' AND subtopic_code = '" . $subtopic_code . "' AND b.status < 3";
        $dbqueryGrp = new dbquery($queryGrp, $connid);
        while ($rowGrp = $dbqueryGrp->getrowarray()) {
            $arrImages[] = $rowGrp["image_id"];
        }
        $count = $count + $dbqueryGrp->numrows();

        $queryPsg = "SELECT count(*) FROM da_questions a, {$constant_da(COMMON_DATABASE)}.qms_images b WHERE a.passage_id = b.id AND b.status < '6' AND where_in_question IN ('P','PID') AND subtopic_code = '" . $subtopic_code . "'";
        $dbqueryPsg = new dbquery($queryPsg, $connid);
        $rowPsg = $dbqueryPsg->getrowarray();
        $count = $count + $rowPsg[0];

        $arrRet[0] = $arrImages;
        $arrRet[1] = $count;
        return $arrRet;
    }

    function getSubSubtopicValidityToApprove($connid, $sub_subtopic_code) {
        global $constant_da;

        $count = 0;
        $arrRet = array();
        $arrImages = array();
        $query = "SELECT DISTINCT image_id FROM da_questions a,da_images b WHERE a.qcode = b.id AND where_in_question != 'GT' AND sub_subtopic_code = '" . $sub_subtopic_code . "' AND b.status < 3";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrImages[] = $row["image_id"];
        }
        $count = $count + $dbquery->numrows();
        $queryGrp = "SELECT DISTINCT image_id FROM da_questions a,da_images b WHERE a.group_id = b.id AND where_in_question = 'GT' AND sub_subtopic_code = '" . $sub_subtopic_code . "' AND b.status < 3";
        $dbqueryGrp = new dbquery($queryGrp, $connid);
        while ($rowGrp = $dbqueryGrp->getrowarray()) {
            $arrImages[] = $rowGrp["image_id"];
        }
        $count = $count + $dbqueryGrp->numrows();

        $queryPsg = "SELECT count(*) FROM da_questions a,{$constant_da(COMMON_DATABASE)}.qms_images b WHERE a.passage_id = b.id AND b.status < '6' AND where_in_question IN ('P','PID') AND sub_subtopic_code = '" . $sub_subtopic_code . "'";
        $dbqueryPsg = new dbquery($queryPsg, $connid);
        $rowPsg = $dbqueryPsg->getrowarray();
        $count = $count + $rowPsg[0];

        $arrRet[0] = $arrImages;
        $arrRet[1] = $count;
        return $arrRet;
    }

    /*     * *****************************************Added Start By Parth 05/01/2012 (Commented Old Function)********************************** */
    /* function getPassageDetails($connid="",$class="")
      {
      $arrRet = array();
      $query = "SELECT passage_id,passage_name FROM educatio_educat.qms_passage WHERE project = 'DA' AND status = 'A' ";
      if($class != "")
      $query.=" AND class = '".$class."' ";
      $query.=" ORDER BY passage_name " ;
      //echo $query;
      $result = mysql_query($query) or die(mysql_error());
      while($row = mysql_fetch_array($result))
      {
      $arrRet[$row["passage_id"]] = $row["passage_name"];
      }
      return $arrRet;
      } */

    function getPassageDetails($connid = "", $class = "") {
        global $constant_da;

        $arrRet = array();
        $query = "SELECT count( b.qcode ) AS qcount,a.passage_id,a.passage_name,a.subjectno, a.use_as FROM {$constant_da(COMMON_DATABASE)}.qms_passage a LEFT JOIN da_questions b ON a.passage_id = b.passage_id WHERE a.project = 'DA' AND a.status IN ('A','AFU')";
        if ($class != "")
            $query.=" AND a.class = '" . $class . "' ";
        $query.=" GROUP BY a.passage_id ORDER BY a.passage_name ";
        //echo $query;
        $result = mysql_query($query) or die(mysql_error());
        while ($row = mysql_fetch_array($result)) {
            $concatpassagecount = "";
            if ($row["subjectno"] == 1) {
                if ($row['qcount'] != 0 && $row['qcount'] != "") {
                    $concatpassagecount = " (" . $row['qcount'] . ")";
                }
            }
            $arrRet[$row["passage_id"]] = $row["passage_name"] . $concatpassagecount . " - " . $row["use_as"];
        }
        return $arrRet;
    }

    function PageLinkingQcodes($connid) {

        $this->setgetvars();
        $this->setpostvars();

        if ($this->ajax == "ajax" && $this->action == "") {
            $this->LinkingQcodeValidation($connid);
            exit;
        }

        if ($this->action == "linkQcode") {
            $this->LinkQuestion($connid);
        }
    }

    function LinkingQcodeValidation($connid) {

        #checking if already linked with some other qcode
        $chk_query = "select qcode,parent_qcode FROM da_questions WHERE qcode = '" . $this->linkqcode . "'";
        $chk_dbqry = new dbquery($chk_query, $connid);
        $chk_result = $chk_dbqry->getrowarray();
        if ($chk_result["parent_qcode"] != 0) {
            echo "ALERT";
            exit;
        }

        # checking the question is exists or not to whom we have to link
        $query_main = "select qcode,parent_qcode FROM da_questions WHERE qcode = '" . $this->linkToParentQcode . "'";
        $dbquery_main = new dbquery($query_main, $connid);
        if ($dbquery_main->numrows() > 0) {

            $row_main = $dbquery_main->getrowarray();
            if ($row_main["parent_qcode"] == 0) { // checked that its not copy question
                $arrParentQcode = array();
                $arrParentLinkToQcode = array();

                $queryPrentQcode = "SELECT a.sub_subtopic_code,b.subtopic_code,c.topic_code 
									FROM da_questions d,da_subSubTopicMaster a,da_subtopicMaster b,da_topicMaster c 
									WHERE d.sub_subtopic_code = a.sub_subtopic_code AND a.subtopic_code = b.subtopic_code 
									AND b.topic_code = c.topic_code AND d.qcode = '$this->linkqcode'";
                $dbqueryPrentQcode = new dbquery($queryPrentQcode, $connid);
                while ($rowPrentQcode = $dbqueryPrentQcode->getrowarray()) {
                    $arrParentQcode = array("subsubtopic" => $rowPrentQcode["sub_subtopic_code"], "subtopic" => $rowPrentQcode["subtopic_code"], "topic" => $rowPrentQcode["topic_code"]);
                }

                $queryPrentLinkToQcode = "SELECT a.sub_subtopic_code,b.subtopic_code,c.topic_code 
										  FROM da_questions d, da_subSubTopicMaster a, da_subtopicMaster b, da_topicMaster c 
										  WHERE d.sub_subtopic_code = a.sub_subtopic_code AND a.subtopic_code = b.subtopic_code 
										  AND b.topic_code = c.topic_code 
										  AND d.qcode = '$this->linkToParentQcode'";
                $dbqueryPrentLinkToQcode = new dbquery($queryPrentLinkToQcode, $connid);


                while ($rowPrentLinkToQcode = $dbqueryPrentLinkToQcode->getrowarray()) {
                    $arrParentLinkToQcode = array("subsubtopic" => $rowPrentLinkToQcode["sub_subtopic_code"], "subtopic" => $rowPrentLinkToQcode["subtopic_code"], "topic" => $rowPrentLinkToQcode["topic_code"]);
                }

                $query = "SELECT count(*) as total FROM da_questions WHERE parent_qcode = '$this->linkqcode'";
                $dbquery = new dbquery($query, $connid);
                $row = $dbquery->getrowarray();
                if ($row["total"] == 0) {
                    if (($arrParentQcode["subsubtopic"] != $arrParentLinkToQcode["subsubtopic"])) {
                        echo "SST will be changed of the qcode :" . $this->linkqcode;
                        exit;
                    }
                } else {
                    if ($arrParentQcode["subsubtopic"] == $arrParentLinkToQcode["subsubtopic"]) {
                        echo "There are copies linked to this question, change will be reflect in those copy questions also.";
                        exit;
                    } else {
                        echo "There are copies linked to this question, change will be reflect in those copy questions also. SST will be changed in all questions!";
                        exit;
                    }
                }
            } else {
                echo "ALERT2";
                exit;
            }
        } else {
            echo "ALERT3";
            exit;
        }
    }

    function LinkQuestion($connid) {
        $this->setgetvars();
        $this->setpostvars();
        if ($this->action == "linkQcode") {
            # checking the question is exists or not to whom we have to link
            $query_main = "select qcode,parent_qcode FROM da_questions WHERE qcode = '" . $this->linkToParentQcode . "'";
            $dbquery_main = new dbquery($query_main, $connid);

            if ($dbquery_main->numrows() > 0) {

                $row_main = $dbquery_main->getrowarray();
                if ($row_main["parent_qcode"] == 0) { // checked that its not copy question
                    $arrParentQcode = array();
                    $arrParentLinkToQcode = array();

                    $queryPrentQcode = "SELECT a.sub_subtopic_code,b.subtopic_code,c.topic_code 
										FROM da_questions d,da_subSubTopicMaster a,da_subtopicMaster b,da_topicMaster c 
										WHERE d.sub_subtopic_code = a.sub_subtopic_code AND a.subtopic_code = b.subtopic_code 
										AND b.topic_code = c.topic_code AND d.qcode = '$this->linkqcode'";
                    $dbqueryPrentQcode = new dbquery($queryPrentQcode, $connid);
                    while ($rowPrentQcode = $dbqueryPrentQcode->getrowarray()) {
                        $arrParentQcode = array("subsubtopic" => $rowPrentQcode["sub_subtopic_code"], "subtopic" => $rowPrentQcode["subtopic_code"], "topic" => $rowPrentQcode["topic_code"]);
                    }

                    $queryPrentLinkToQcode = "SELECT a.sub_subtopic_code,b.subtopic_code,c.topic_code 
											  FROM da_questions d, da_subSubTopicMaster a, da_subtopicMaster b, da_topicMaster c 
											  WHERE d.sub_subtopic_code = a.sub_subtopic_code AND a.subtopic_code = b.subtopic_code 
											  AND b.topic_code = c.topic_code 
											  AND d.qcode = '$this->linkToParentQcode'";
                    $dbqueryPrentLinkToQcode = new dbquery($queryPrentLinkToQcode, $connid);


                    while ($rowPrentLinkToQcode = $dbqueryPrentLinkToQcode->getrowarray()) {
                        $arrParentLinkToQcode = array("subsubtopic" => $rowPrentLinkToQcode["sub_subtopic_code"], "subtopic" => $rowPrentLinkToQcode["subtopic_code"], "topic" => $rowPrentLinkToQcode["topic_code"]);
                    }

                    $query = "SELECT count(*) as total FROM da_questions WHERE parent_qcode = '$this->linkqcode'";
                    $dbquery = new dbquery($query, $connid);
                    $row = $dbquery->getrowarray();
                    if ($row["total"] == 0) {
                        $queryUpdate = "Update da_questions set parent_qcode = '$this->linkToParentQcode',sub_subtopic_code = '" . $arrParentLinkToQcode["subsubtopic"] . "'  where qcode = '$this->linkqcode'";
                        $dbqueryUpdate = new dbquery($queryUpdate, $connid);
                        $query1 = "INSERT INTO da_comments SET 
				   				   qcode=" . $this->linkqcode . ",commenter='" . $_SESSION['username'] . "',comment='Question is linked to qcode:$this->linkToParentQcode',
				   				   type='AUTO',submitdate = NOW()";
                        $dbquery1 = new dbquery($query1, $connid);
                    } else {

                        $msg = "";
                        $childquery = "SELECT GROUP_CONCAT(qcode) as childqcodes FROM da_questions WHERE parent_qcode = '$this->linkqcode'";
                        $childdbqry = new dbquery($childquery, $connid);
                        $childres = $childdbqry->getrowarray();
                        $childqcodes = $childres["childqcodes"];
                        $childqcodesArr = explode(",", $childqcodes);

                        $queryUpdate = "UPDATE da_questions SET parent_qcode = '$this->linkToParentQcode',sub_subtopic_code = '" . $arrParentLinkToQcode["subsubtopic"] . "'  
									    where qcode IN($childqcodes,$this->linkqcode)";
                        $dbqueryUpdate = new dbquery($queryUpdate, $connid);

                        $up_fields = "";
                        if (is_array($childqcodesArr) && count($childqcodesArr) > 0) {
                            foreach ($childqcodesArr as $cqcode) {
                                $up_fields .= "('" . $cqcode . "','" . $_SESSION['username'] . "','Question is linked to qcode:$this->linkToParentQcode','AUTO',NOW()),";
                            }
                        }

                        $query1 = "INSERT INTO da_comments SET 
				   				   qcode=" . $this->linkqcode . ",commenter='" . $_SESSION['username'] . "',comment='Question is linked to qcode:$this->linkToParentQcode',
				   				   type='AUTO',submitdate = NOW()";
                        $dbquery1 = new dbquery($query1, $connid);

                        if ($up_fields != "") {
                            $up_query = "INSERT INTO da_comments (qcode,commenter,comment,type,submitdate) VALUES " . rtrim($up_fields, ",");
                            $up_dbqry = new dbquery($up_query, $connid);
                        }
                    }
                    $this->msg = "Successfully Updated..!";
                } else {
                    $this->msg = "You are trying to link question that is copy question!";
                }
            } else {
                $this->msg = "You are trying to link question that is not exist!";
            }
        }
    }

    # for second approver of sst

    function GetSecondApproverAllotment($connid) {

        $arrRet = array();
        $condition = " AND b.approver2 = '" . $_SESSION["username"] . "' AND a.current_alloted = '" . $_SESSION["username"] . "' AND a.status >= 3 ";
        $query = "SELECT count(qcode) as qcount,a.sub_subtopic_code,b.description as subsubtopic, c.description as subtopic, d.description as topic, a.subjectno, a.class, group_concat(a.qcode) as qcodeList
				  FROM da_questions a, da_subSubTopicMaster b, da_subtopicMaster c, da_topicMaster d
				  WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code=c.subtopic_code AND c.topic_code=d.topic_code 
				  $condition
			 	  AND a.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = a.qcode)
				  GROUP BY sub_subtopic_code ORDER BY topic";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $arrRet[$row["sub_subtopic_code"]] = array("qcount" => $row["qcount"], "subsubtopic" => $row["subsubtopic"], "subtopic" => $row["subtopic"], "topic" => $row["topic"], "class" => $row["class"], "subjectno" => $row["subjectno"], "qcodeList" => $row["qcodeList"], "imgcount" => 0, "freelancercount" => 0);
        }
        return $arrRet;
    }

    # for topic owner

    function GetSecondApprovalAllotment($connid) {
        $arrRet = array();
        $cond_str = "";
        $topic_codes = "";
        $put_condi = 0;
        $AllotedTopic = array();
        $condition = "";

        $query = "SELECT class,GROUP_CONCAT(distinct(topic_code)) AS allottedtopiccodes FROM da_ipsMaster WHERE ips_owner = '" . $_SESSION['username'] . "' GROUP BY class";
        $dbqry = new dbquery($query, $connid);
        while ($result = $dbqry->getrowarray()) {
            $AllotedTopic[$result["class"]] = $result["allottedtopiccodes"];
        }

        if (is_array($AllotedTopic) && count($AllotedTopic) > 0) {
            $put_condi = 1;
            foreach ($AllotedTopic as $class => $allotedtopics) {
                $cond_str .= "(da_questions.class = $class AND da_topicMaster.topic_code IN($allotedtopics)) OR ";
            }
        }

        if ($put_condi == 1) {
            $condition = " AND (" . rtrim($cond_str, "OR ") . ")";
        }

        $query = "SELECT count(distinct(da_questions.qcode)) as qcount,da_questions.sub_subtopic_code,da_subSubTopicMaster.description as subsubtopic,
				  da_subtopicMaster.description as subtopic, da_topicMaster.description as topic, da_questions.subjectno, da_questions.class, group_concat(distinct(da_questions.qcode)) as qcodeList,
				  da_subSubTopicMaster.approver2
				  FROM da_questions
		          left join da_subSubTopicMaster ON da_questions.sub_subtopic_code = da_subSubTopicMaster.sub_subtopic_code
				  left join da_subtopicMaster ON da_subSubTopicMaster.subtopic_code = da_subtopicMaster.subtopic_code
				  left join da_topicMaster ON da_subtopicMaster.topic_code = da_topicMaster.topic_code 
				  left join da_comments ON da_questions.qcode = da_comments.qcode
		          WHERE 
		          da_questions.current_alloted = '" . $_SESSION['username'] . "'
		          AND da_questions.status = 3 AND da_questions.approver2_status = 0
		     	  $condition
			 	  AND da_comments.type = 'AP2'
		          GROUP BY sub_subtopic_code HAVING MAX(da_comments.srno) ORDER BY topic
		          ";

        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {

            $arrRet[$row["sub_subtopic_code"]] = array("qcount" => $row["qcount"],
                "subsubtopic" => $row["subsubtopic"],
                "subtopic" => $row["subtopic"],
                "topic" => $row["topic"],
                "class" => $row["class"],
                "approver2" => $row["approver2"],
                "subjectno" => $row["subjectno"],
                "qcodeList" => $row["qcodeList"]);
        }
        return $arrRet;
    }

    function PageSubjectWiseDetails($connid) {

        $this->setpostvars();
        $this->setgetvars();

        $subject_arr = array(1, 2, 3);
        $approve_condi = "";
        $approve_condi_all = "";
        $submit_condi = "";
        $ips_condi = "";
        $meri_condi = "";

        $returnarr = array();


        //if ($this->action == "SearchData") {

        $condition = "";
        if ($this->searchqmaker != "") {
            $condition .= "AND da_questions.question_maker = '" . $this->searchqmaker . "'";
            $approve_grpby = "group by commenter,subjectno,class";
            $submit_grpby = "group by question_maker,subjectno,class";
            $ips_resolved_grpby = "group by a.resolved_by,da_questions.subjectno,da_questions.class,b.level";
            $secondapprover2_grpby = "group by commenter,b.subjectno,b.class";
            $meri_grpby = "group by mc_added_by,subjectno,class";

            $approve_sel_field = "commenter,";
            $submit_sel_field = "question_maker,";
            $ips_sel_field = "resolved_by,";
            $second_approver_field = "commenter,";
            $meri_field = "mc_added_by,";
        } else {

            $approve_grpby = "group by subjectno,class";
            $submit_grpby = "group by subjectno,class";
            $ips_resolved_grpby = "group by da_questions.subjectno,da_questions.class,b.level";
            $secondapprover2_grpby = "group by b.subjectno,b.class";
            $meri_grpby = "group by subjectno,class";

            $approve_sel_field = "";
            $submit_sel_field = "";
            $ips_sel_field = "";
            $second_approver_field = "";
            $meri_field = "";
        }

        if ($this->fromDate != "" && $this->tillDate != "") {

            $approve_condi = "AND date_format(submitdate,'%Y-%m-%d') BETWEEN '" . date("Y-m-d", strtotime($this->fromDate)) . "' AND '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
            $approve_condi_all = "AND date_format(submitdate,'%Y-%m-%d') BETWEEN '" . date("Y-m-d", strtotime($this->fromDate)) . "' AND '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
            $submit_condi = "AND submit_date BETWEEN '" . date("Y-m-d", strtotime($this->fromDate)) . "' AND '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
            $ips_condi = "AND resolved_date BETWEEN '" . date("Y-m-d", strtotime($this->fromDate)) . "' AND '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
            $meri_condi = "AND mc_added_date BETWEEN '" . date("Y-m-d", strtotime($this->fromDate)) . "' AND '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
        } elseif ($this->fromDate != "" && $this->tillDate == "") {

            $approve_condi = "AND date_format(submitdate ,'%Y-%m-%d') >= '" . date("Y-m-d", strtotime($this->fromDate)) . "'";
            $approve_condi_all = "AND date_format(submitdate ,'%Y-%m-%d') >= '" . date("Y-m-d", strtotime($this->fromDate)) . "'";
            $submit_condi = "AND submit_date >= '" . date("Y-m-d", strtotime($this->fromDate)) . "'";
            $ips_condi = "AND resolved_date >= '" . date("Y-m-d", strtotime($this->fromDate)) . "'";
            $meri_condi = "AND mc_added_date >= '" . date("Y-m-d", strtotime($this->fromDate)) . "'";
        } elseif ($this->fromDate == "" && isset($this->tillDate) && $this->tillDate != "") {

            $approve_condi = "AND date_format(submitdate ,'%Y-%m-%d') <= '" . date("Y-m-d", strtotime($this->fromDate)) . "'";
            $approve_condi_all = "AND date_format(submitdate ,'%Y-%m-%d') <= '" . date("Y-m-d", strtotime($this->fromDate)) . "'";
            $submit_condi = "AND submit_date <= '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
            $ips_condi = "AND resolved_date <= '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
            $meri_condi = "AND mc_added_date <= '" . date("Y-m-d", strtotime($this->tillDate)) . "'";
        }

        # questions made
        $query = "select subjectno,class, $submit_sel_field count(*) as total,
					  sum(IF(parent_qcode = 0,1,0)) as total_unique,
					  sum(IF(parent_qcode != 0,1,0)) as total_copy
					  from da_questions
					  WHERE status != 4 $condition $submit_condi
					  $submit_grpby
					  order by subjectno,class";
        $dbqry = new dbquery($query, $connid);
        if ($dbqry->numrows() > 0) {
            while ($result = $dbqry->getrowarray()) {

                if ($this->searchqmaker != "")
                    $userfield = $result["question_maker"];
                else
                    $userfield = "ALL";

                $returnarr["MADE"][$result["subjectno"]][$userfield][$result["class"]] = array("total_question" => $result["total"],
                    "total_unique" => $result["total_unique"],
                    "total_copy" => $result["total_copy"]
                );
            }
        }
        /* else if($this->searchqmaker != ""){

          foreach($subject_arr as $key => $subjectid){
          for($i=3;$i<=10;$i++){
          $returnarr["MADE"][$subjectid][$this->searchqmaker][$i] = array();
          }
          }
          }
         */
        # questions approved
        if ($this->searchqmaker != "") {

            /* 	echo $query2 = "SELECT count(distinct b.qcode) as total, 
              SUM(if(parent_qcode = 0,1,0)) as total_unique,
              SUM(if(parent_qcode != 0,1,0) as total_copy,
              $approve_sel_field b.subjectno, b.class  FROM
              da_comments a, da_questions b
              WHERE a.qcode=b.qcode
              AND comment='AUTO:Approved'
              AND type='AUTO' $approve_condi
              $approve_grpby
              ORDER BY b.subjectno,b.class"; */

            $query2 = "SELECT class,subjectno,$approve_sel_field
								  count(distinct(qcode)) as total,
								  sum(if(parent_qcode != 0,1,0)) as total_copy,
								  sum(if(parent_qcode = 0,1,0)) as total_unique
						   FROM (
								SELECT distinct da_questions.qcode as qcode,parent_qcode, $approve_sel_field class,subjectno 
								FROM da_questions
								LEFT JOIN da_comments ON da_questions.qcode = da_comments.qcode
								WHERE comment='AUTO:Approved'
								AND type='AUTO' 
								AND status != 4
								$approve_condi
							) AS D $approve_grpby
							ORDER BY subjectno,class";
        } else {

            /* echo $query2 = "SELECT count(distinct b.qcode) as total, 
              SUM(if(parent_qcode = 0,1,0)) as total_unique,
              SUM(if(parent_qcode != 0,1,0)) as total_copy,
              b.subjectno, b.class  FROM da_comments a,da_questions b
              WHERE a.qcode = b.qcode
              AND comment='AUTO:Approved'
              AND type='AUTO'
              $approve_condi_all
              $approve_grpby
              ORDER BY b.subjectno,b.class"; */
            $query2 = "SELECT class,subjectno,
								  COUNT(distinct(qcode)) as total,
								  SUM(if(parent_qcode != 0,1,0)) as total_copy,
								  SUM(if(parent_qcode = 0,1,0)) as total_unique
						   FROM (
								SELECT distinct da_questions.qcode as qcode,parent_qcode,class,subjectno 
								FROM da_questions
								LEFT JOIN da_comments ON da_questions.qcode = da_comments.qcode
								WHERE comment='AUTO:Approved'
								AND type='AUTO' 
								AND status != 4
								$approve_condi_all
							) AS D $approve_grpby
							ORDER BY subjectno,class";
        }

        //echo "<br> Query ::",$query2;
        $dbqry2 = new dbquery($query2, $connid);
        while ($result2 = $dbqry2->getrowarray()) {

            if ($this->searchqmaker != "")
                $userfield = $result2["commenter"];
            else
                $userfield = "ALL";
            $returnarr["APPROVED"][$result2["subjectno"]][$userfield][$result2["class"]] = array("total_approved" => $result2["total"],
                "unique_approved" => $result2["total_unique"],
                "copy_approved" => $result2["total_copy"]
            );
        }

        # ips resolved
        $query3 = "SELECT COUNT(DISTINCT da_questions.qcode) as total,da_questions.subjectno,da_questions.class,
							  $ips_sel_field b.level
					   FROM da_questions, da_ipsDetails a,da_ipsMaster b,da_topicMaster d
					   WHERE da_questions.qcode = a.qcode AND a.ips_id = b.ips_id 
					   AND b.topic_code = d.topic_code 
					   AND a.ips_status = 1 $ips_condi
					   $ips_resolved_grpby
					   ORDER BY da_questions.subjectno,da_questions.class,b.level
					  ";
        $dbqry3 = new dbquery($query3, $connid);
        while ($result3 = $dbqry3->getrowarray()) {
            if ($this->searchqmaker != "")
                $userfield = $result3["resolved_by"];
            else
                $userfield = "ALL";
            $returnarr["IPSRESOLVED"][$result3["subjectno"]][$userfield][$result3["class"]][$result3["level"]] = array("ips_resolved" => $result3["total"]);
        }

        # second approve
        $query4 = "SELECT count(distinct a.qcode) as total, 
						SUM(IF(parent_qcode = 0,1,0)) as total_unique,
						SUM(IF(parent_qcode != 0,1,0)) as total_copy,
						$second_approver_field b.subjectno, b.class  FROM 
						da_comments a, da_questions b 
						WHERE a.qcode=b.qcode 
						AND comment='AUTO:Second Approved'
						AND type='AUTO' AND b.approver2_status = 1 $approve_condi
						$secondapprover2_grpby
						ORDER BY b.subjectno,b.class";

        $dbqry4 = new dbquery($query4, $connid);
        while ($result4 = $dbqry4->getrowarray()) {
            if ($this->searchqmaker != "")
                $userfield = $result4["commenter"];
            else
                $userfield = "ALL";
            $returnarr["SECONDAPPROVED"][$result4["subjectno"]][$userfield][$result4["class"]] = array("total_approved" => $result4["total"],
                "unique_approved" => $result4["total_unique"],
                "copy_approved" => $result4["total_copy"]
            );
            // default value setting 																					  				);
            if (!isset($returnarr['MADE'][$result4['subjectno']][$userfield][$result4["class"]])) {
                $returnarr['MADE'][$result4['subjectno']][$userfield][$result4["class"]] = array("total_question" => 0,
                    "total_unique" => 0,
                    "total_copy" => 0
                );
            }

            if (!isset($returnarr['APPROVED'][$result4['subjectno']][$userfield][$result4["class"]])) {
                $returnarr['APPROVED'][$result4['subjectno']][$userfield][$result4["class"]] = array("total_approved" => 0,
                    "unique_approved" => 0,
                    "copy_approved" => 0
                );
            }
        }

        #ME/RI written
        $query5 = "SELECT count(distinct(qcode)) as total, 
					   SUM(IF(parent_qcode = 0,1,0)) as total_unique,
					   SUM(IF(parent_qcode != 0,1,0)) as total_copy,
					   $meri_field subjectno,class
					   FROM da_questions
              		   WHERE  mc_added_date <> '0000-00-00'  
					   $meri_condi
					   $meri_grpby
					   ORDER BY subjectno,class";
        $dbqry5 = new dbquery($query5, $connid);
        while ($result5 = $dbqry5->getrowarray()) {
            if ($this->searchqmaker != "")
                $userfield = $result5["mc_added_by"];
            else
                $userfield = "ALL";

            $returnarr["MERIWRITTEN"][$result5["subjectno"]][$userfield][$result5["class"]] = array("total_questions" => $result5["total"],
                "total_unique" => $result5["total_unique"],
                "total_copy" => $result5["total_copy"]
            );

            if (!isset($returnarr['MADE'][$result5['subjectno']][$userfield][$result5["class"]])) {
                $returnarr['MADE'][$result5['subjectno']][$userfield][$result5["class"]] = array("total_question" => 0,
                    "total_unique" => 0,
                    "total_copy" => 0
                );
            }

            if (!isset($returnarr['APPROVED'][$result5['subjectno']][$userfield][$result5["class"]])) {
                $returnarr['APPROVED'][$result5['subjectno']][$userfield][$result5["class"]] = array("total_approved" => 0,
                    "unique_approved" => 0,
                    "copy_approved" => 0
                );
            }
        }

        //}
        return $returnarr;
    }

    ############################For checking unique qcode used ###############################

    function getUniqueUsedQuestions($arrQuestions, $connid) {
        $arrRet = array();
        $qcode_list = "";
        $qcode_list = implode(",", $arrQuestions);
        if ($qcode_list != "") {
            $query = "SELECT parent_qcode,qcode FROM da_questions WHERE qcode IN($qcode_list) AND parent_qcode != 0";
            $dbqry = new dbquery($query, $connid);
            while ($result = $dbqry->getrowarray()) {
                $arrRet[$result["qcode"]] = $result["parent_qcode"];
            }
        }
        return $arrRet;
    }

    ############################For checking unique qcode used ###############################
    ###########################For Asset Details##########################

    function getAssetQuestiuonDetails($qcode_set, $connid) {
        global $constant_da;

        $arrRet = array();
        $query = "SELECT papercode,qno FROM {$constant_da(COMMON_DATABASE)}.paper_master WHERE qcode = '$qcode_set'";
        $dbqry = new dbquery($query, $connid);
        while ($result = $dbqry->getrowarray()) {
            $arrRet["paper_code"] = $result["papercode"];
            $arrRet["qno"] = $result["qno"];
        }
        return $arrRet;
    }

    ###########################For Asset Details##########################
}

?>