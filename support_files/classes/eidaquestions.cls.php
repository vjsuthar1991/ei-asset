<?php
include_once dirname(__FILE__) . "/../constants.php";
include_once(constant("PATH_ABSOLUTE_CLASSES") . "eidagroup.cls.php");

class clsdaquestion {

    var $qcode;
    var $class;
    var $subjectno;
    var $question;
    var $optiona;
    var $optionb;
    var $optionc;
    var $optiond;
    var $correct_answer;
    var $clsdagroup;
    var $passage_id;
    var $subtopic_code;
    var $sub_subtopic_code;
    var $skill;
    var $ques_testing;
    var $question_maker;
    var $current_alloted;
    var $first_alloted;
    var $qtype;
    var $status;
    var $image_description;
    var $submit_date;
    var $trail;
    var $mcques_title;
    var $mcexplanation;
    var $remedial_instruction;
    var $misconception;
    var $action;
    var $topic_code;
    var $group_question_status;
    var $make_version;
    var $approvedby;
    var $teachersheet;
    var $tagquestion;
    var $commentator;
    var $logic_distractor_a;
    var $logic_distractor_b;
    var $logic_distractor_c;
    var $logic_distractor_d;
    var $freelancerQues;
    var $map_lower_class;
    var $context;
    var $copied_from;
    var $lastModified;
    var $approver2_status;
    var $noOfClassification;
    var $classificationType;
    var $classificationCodes;
    var $parent_qcode;
    var $copiesFromQcode;
    var $levelForQuestion;
    var $ips_status;
    var $ssst_code;
    var $clspaging;
    var $mc_school_code;
    var $mc_year;
    var $mc_std;
    var $lowperformance_startdate;
    var $lowperformance_enddate;
    var $lowperformance_percentage;
    var $lowperformance_above_percentage;
    var $searchqcode;
    var $msg;
    var $droppedstartdate;
    var $droppedenddate;
    var $startDateCopyAvailable;
    var $endDateCopyAvailable;
    var $minimum_class;
    var $source;
    var $school_usage;

    function clsdaquestion() {
        $this->qcode = "";
        $this->class = "";
        $this->subjectno = "";
        $this->question = "";
        $this->optiona = "";
        $this->optionb = "";
        $this->optionc = "";
        $this->optiond = "";
        $this->correct_answer = "";
        $this->question_maker = "";
        $this->clsdagroup = new clsdagroup();
        $this->passage_id = "";
        $this->current_alloted = "";
        $this->first_alloted = "";
        $this->qtype = "";
        $this->status = "";
        $this->image_description = "";
        $this->submit_date = "";
        $this->trail = "";
        $this->mcexplanation = "";
        $this->misconception = 0;
        $this->mcques_title = "";
        $this->remedial_instruction = "";
        $this->subtopic_code = "";
        $this->sub_subtopic_code = "";
        $this->skill = "";
        $this->ques_testing = "";
        $this->question = "";
        $this->topic_code = "";
        $this->make_version = "";
        $this->approvedby = "";
        $this->teachersheet = "";
        $this->tagquestion = "";
        $this->commentator = "";
        $this->logic_distractor_a = "";
        $this->logic_distractor_b = "";
        $this->logic_distractor_c = "";
        $this->logic_distractor_d = "";
        $this->freelancerQues = array();
        $this->map_lower_class = "";
        $this->context = "";
        $this->copied_from = "";
        $this->lastModified = "";
        $this->approver2_status = "";
        $this->parent_qcode = "";
        $this->copiesFromQcode = array();
        $this->levelForQuestion = array();
        $this->ips_status = "";
        $this->ssst_code = "";
        $this->clspaging = "";
        $this->mc_school_code = "";
        $this->mc_year = "";
        $this->mc_std = "";
        $this->lowperformance_startdate = "";
        $this->lowperformance_enddate = "";
        $this->lowperformance_percentage = "";
        $this->lowperformance_above_percentage = "";
        $this->searchqcode = "";
        $this->msg = "";
        $this->droppedstartdate = "";
        $this->droppedenddate = "";
        $this->startDateCopyAvailable = "";
        $this->endDateCopyAvailable = "";
        $this->minimum_class = "";
        $this->source = "";  // Eg:  Asset , CQB, TG
        $this->school_usage = 0;
    }

   	function setpostvars($connid)
	{
		if(isset($_POST["clsdaquestion_question"])) $this->question = $_POST["clsdaquestion_question"];
		if(isset($_POST["clsdaquestion_class"])) $this->class = $_POST["clsdaquestion_class"];
		if(isset($_POST["clsdaquestion_hdnaction"])) $this->action = $_POST["clsdaquestion_hdnaction"];
		if(isset($_POST["clsdaquestion_subjectno"])) $this->subjectno = $_POST["clsdaquestion_subjectno"];
		if(isset($_POST["clsdaquestion_optiona"])) $this->optiona = $_POST["clsdaquestion_optiona"];
		if(isset($_POST["clsdaquestion_optionb"])) $this->optionb = $_POST["clsdaquestion_optionb"];
		if(isset($_POST["clsdaquestion_optionc"])) $this->optionc = $_POST["clsdaquestion_optionc"];
		if(isset($_POST["clsdaquestion_optiond"])) $this->optiond = $_POST["clsdaquestion_optiond"];
		if(isset($_POST["clsdaquestion_correctans"])) $this->correct_answer = $_POST["clsdaquestion_correctans"];
		if(isset($_POST["clsdaquestion_passageid"])) $this->passage_id = $_POST["clsdaquestion_passageid"];
		if(isset($_POST["clsdaquestion_imagedesc"])) $this->image_description = $_POST["clsdaquestion_imagedesc"];
		if(isset($_POST["clsdaquestion_mcquestitle"])) $this->mcques_title = $_POST["clsdaquestion_mcquestitle"];
		if(isset($_POST["clsdaquestion_mcexplanation"])) $this->mcexplanation = $_POST["clsdaquestion_mcexplanation"];
		if(isset($_POST["clsdaquestion_remedialInstruction"])) $this->remedial_instruction = $_POST["clsdaquestion_remedialInstruction"];
		if(isset($_POST["clsdaquestion_subtopic"])) $this->subtopic_code = $_POST["clsdaquestion_subtopic"];
		if(isset($_POST["clsdaquestion_subsubtopic"])) $this->sub_subtopic_code = $_POST["clsdaquestion_subsubtopic"];
		if(isset($_POST["clsdaquestion_skill"])) $this->skill = $_POST["clsdaquestion_skill"];
		if(isset($_POST["clsdaquestion_questesting"])) $this->ques_testing = $_POST["clsdaquestion_questesting"];
		if(isset($_POST["clsdaquestion_topic"])) $this->topic_code = $_POST["clsdaquestion_topic"];
		if(isset($_POST["clsdaquestion_qtype"])) $this->qtype = $_POST["clsdaquestion_qtype"];
		if(isset($_POST["group_question_status"])) $this->group_question_status = $_POST["group_question_status"];
		if(isset($_POST["clsdaquestion_make_version"])) $this->make_version = $_POST["clsdaquestion_make_version"];
		if(isset($_POST["clsdaquestion_subsubtopic"])) $this->sub_subtopic_code = $_POST["clsdaquestion_subsubtopic"];
		if(isset($_POST["clsdaquestion_addtag"])) $this->tagquestion = $_POST["clsdaquestion_addtag"];
		if(isset($_POST["clsdaquestion_teachersheet"])) $this->teachersheet = $_POST["clsdaquestion_teachersheet"];
		if(isset($_POST["clsdaquestion_commentator"])) $this->commentator = $_POST["clsdaquestion_commentator"];
		if(isset($_POST["clsdaquestion_lda"])) $this->logic_distractor_a = $_POST["clsdaquestion_lda"];
		if(isset($_POST["clsdaquestion_ldb"])) $this->logic_distractor_b = $_POST["clsdaquestion_ldb"];
		if(isset($_POST["clsdaquestion_ldc"])) $this->logic_distractor_c = $_POST["clsdaquestion_ldc"];
		if(isset($_POST["clsdaquestion_ldd"])) $this->logic_distractor_d = $_POST["clsdaquestion_ldd"];
		if(isset($_POST["transferFreelancerQues"])) $this->freelancerQues = $_POST["transferFreelancerQues"];
		if(isset($_POST["clsdaquestion_maplowerclass"])) $this->map_lower_class = $_POST["clsdaquestion_maplowerclass"];
		if(isset($_POST["clsdaquestion_context"])) $this->context = $_POST["clsdaquestion_context"];
		if(isset($_POST["copied_from"])) $this->copied_from = $_POST['copied_from'];
		if(isset($_POST["clsdaquestion_parent_qcode"])) $this->parent_qcode = $_POST['clsdaquestion_parent_qcode'];
		if(isset($_POST["clsdaquestion_ssst_code"])) $this->ssst_code = $_POST['clsdaquestion_ssst_code'];
		if(isset($_POST["clsdaquestion_mc_schoolcode"])) $this->mc_school_code = $_POST['clsdaquestion_mc_schoolcode'];
		if(isset($_POST["clsdaquestion_mc_year"])) $this->mc_year = $_POST['clsdaquestion_mc_year'];
		if(isset($_POST["clsdaquestion_std"])) $this->mc_std = $_POST['clsdaquestion_std'];		
		if(isset($_POST["clsdaquestion_startDate"])) $this->lowperformance_startdate = $_POST['clsdaquestion_startDate'];			
		if(isset($_POST["clsdaquestion_endDate"])) $this->lowperformance_enddate = $_POST['clsdaquestion_endDate'];			
		if(isset($_POST["clsdaquestion_lowperformance_percentage"])) $this->lowperformance_percentage = $_POST['clsdaquestion_lowperformance_percentage'];					
		if(isset($_POST["clsdaquestion_lowperformance_above_percentage"])) $this->lowperformance_above_percentage = $_POST['clsdaquestion_lowperformance_above_percentage'];							
		if(isset($_POST["clsdaquestion_searchqcode"])) $this->searchqcode = $_POST['clsdaquestion_searchqcode'];
		if(isset($_POST["clsdaquestion_msg"])) $this->msg = $_POST['clsdaquestion_msg'];
		if(isset($_POST["clsdaquestion_droppedstartdate"])) $this->droppedstartdate = $_POST['clsdaquestion_droppedstartdate'];
		if(isset($_POST["clsdaquestion_droppedenddate"])) $this->droppedenddate = $_POST['clsdaquestion_droppedenddate'];				
		if(isset($_POST["clsdaquestion_startDateCopyAvailable"])) $this->startDateCopyAvailable = $_POST['clsdaquestion_startDateCopyAvailable'];						
		if(isset($_POST["clsdaquestion_endDateCopyAvailable"])) $this->endDateCopyAvailable = $_POST['clsdaquestion_endDateCopyAvailable'];								
		if(isset($_POST["clsdaquestion_minclass"])) $this->minimum_class = $_POST['clsdaquestion_minclass'];
		$this->clsdagroup->setpostvars();
		//print_r($_POST);
	}

    function setgetvars() {
        if (isset($_GET["qcode"])) $this->qcode = $_GET["qcode"];
        if (isset($_GET["cans"])) $this->correct_answer = $_GET["cans"];
    }

    function pageAddquestion($connid, $tablename = "da_questions") {
        $this->setpostvars($connid);
        if ($this->action == "SaveData") {
            $this->saveData($connid, $tablename);
            /* echo "<script language='javascript'>window.location='daAdmin_editQuestion.php'</script>"; */
        }
    }

    function saveData($connid, $tablename = "da_questions") {
        $this->question_maker = $_SESSION["username"];

        if ($tablename == "da_questions")
            $redirect_filename = "daAdmin_vieweditques.php";
        else
            $redirect_filename = "daAdmin_viewedit_freelancerques.php";

        if ($this->group_question_status == "yes") {
            $this->clsdagroup->saveData($connid, $this->subjectno, $this->question_maker);
        }
        $commentator = "";
        if ($this->commentator != "")
            $commentator = $this->commentator;
        elseif ($this->sub_subtopic_code != "")
            $commentator = $this->getCommentator($connid, $this->sub_subtopic_code);


        $query = "INSERT INTO " . $tablename . " SET
					question = '" . $this->question . "',
					class = '" . $this->class . "',
					subjectno = '" . $this->subjectno . "',
					optiona = '" . $this->optiona . "',
					optionb = '" . $this->optionb . "',
					optionc = '" . $this->optionc . "',
					optiond = '" . $this->optiond . "',
					correct_answer = '" . $this->correct_answer . "',
					image_description = '" . $this->image_description . "',
					group_id = '" . $this->clsdagroup->group_id . "',
					mc_ques_title = '" . $this->mcques_title . "',
					mcexplanation = '" . $this->mcexplanation . "',
					remedial_instruction = '" . $this->remedial_instruction . "',
					sub_subtopic_code = '" . $this->sub_subtopic_code . "',
					skill = '" . $this->skill . "',
					question_testing = '" . $this->ques_testing . "',
					passage_id = '" . $this->passage_id . "',
					question_maker = '" . $this->question_maker . "',
					qtype = '" . $this->qtype . "',
					trail = '" . $this->question_maker . "',
					submit_date = '" . date("Y-m-d") . "',
					parent_qcode = '" . $this->parent_qcode . "',
					status = 0,
					ssst_code = '" . $this->ssst_code . "'
				";
        if ($tablename == "da_freelancer_questions") {
            $query.=",logic_distractor_a = '" . $this->logic_distractor_a . "' ,
						logic_distractor_b = '" . $this->logic_distractor_b . "' ,
						logic_distractor_c = '" . $this->logic_distractor_c . "' ,
						logic_distractor_d = '" . $this->logic_distractor_d . "' ";
        }

        # we don't have to insert first alloted and current alloted in copy from original in freelancer interface
        if ($tablename == "da_freelancer_questions" && $this->parent_qcode == 0)
            $query.=",first_alloted = '" . $commentator . "',current_alloted = '" . $commentator . "' ";
        elseif ($tablename == "da_questions" && $commentator != "")
            $query.=",first_alloted = '" . $commentator . "',current_alloted = '" . $commentator . "' ";

        if (isset($this->tagquestion) && $this->tagquestion == 1)
            $query.=",tag_ques = '" . $this->tagquestion . "' ";
        if (isset($this->map_lower_class) && $this->map_lower_class == 1)
            $query.=",indicate_lower_class = '" . $this->map_lower_class . "' ";
        if (trim($this->mcexplanation) != "") {
            $query.=",misconception= 1,mc_added_date = CURDATE(), mc_added_by='" . $this->question_maker . "'";
            $this->misconception = 1;
        }
        if ($this->teachersheet != "") {
            $query .= ",ts_file='" . $this->teachersheet . "'";
        }
        ###############For Minimum Class####################
        if ($tablename == "da_questions") {
            $query .= ",class_minlevel='" . $this->minimum_class . "'";
        }
        ###############For Minimum Class####################			
        //echo $query;exit;
        $dbquery = new dbquery($query, $connid);
        $qcode = mysql_insert_id($connid);

        $version = 1;
        if ($tablename != "da_freelancer_questions") {
            $query = "INSERT INTO da_questions_versions SET
					qcode = " . $qcode . ",
					version = " . $version . ",
					question = '" . $this->question . "',
					class = '" . $this->class . "',
					subjectno = '" . $this->subjectno . "',
					optiona = '" . $this->optiona . "',
					optionb = '" . $this->optionb . "',
					optionc = '" . $this->optionc . "',
					optiond = '" . $this->optiond . "',
					correct_answer = '" . $this->correct_answer . "',
					image_description = '" . $this->image_description . "',
					group_id = '" . $this->group_id . "',
					mcexplanation = '" . $this->mcexplanation . "',
					misconception = " . $this->misconception . ",
					question_testing = '" . $this->ques_testing . "',
					sub_subtopic_code = '" . $this->sub_subtopic_code . "',
					passage_id = '" . $this->passage_id . "',
					question_maker = '" . $this->question_maker . "',
					qtype = '" . $this->qtype . "',
					submit_date = '" . date("Y-m-d H:i:s") . "',
					parent_qcode = '" . $this->parent_qcode . "',
					status = 0,
					ssst_code = '" . $this->ssst_code . "',
					class_minlevel='" . $this->minimum_class . "'
					";
            $dbquery = new dbquery($query, $connid);
            if ($this->copied_from != "") {
                $query = "INSERT INTO da_comments (qcode, commenter, comment, type, submitdate) VALUES
			              ($qcode, '" . $this->question_maker . "','Copied From: " . $this->copied_from . "','AUTO', now())";
                $dbquery = new dbquery($query, $connid);
            }
        } else {

            $query = "INSERT INTO da_freelancer_questions_versions SET
					  qcode = " . $qcode . ",
					  version = " . $version . ",
					  question = '" . $this->question . "',
					  class = '" . $this->class . "',
					  subjectno = '" . $this->subjectno . "',
					  optiona = '" . $this->optiona . "',
					  optionb = '" . $this->optionb . "',
					  optionc = '" . $this->optionc . "',
					  optiond = '" . $this->optiond . "',
					  correct_answer = '" . $this->correct_answer . "',
					  image_description = '" . $this->image_description . "',
					  group_id = '" . $this->group_id . "',
					  mcexplanation = '" . $this->mcexplanation . "',
					  misconception = " . $this->misconception . ",
					  question_testing = '" . $this->ques_testing . "',
					  sub_subtopic_code = '" . $this->sub_subtopic_code . "',
					  passage_id = '" . $this->passage_id . "',
					  question_maker = '" . $this->question_maker . "',
					  qtype = '" . $this->qtype . "',
					  submit_date = '" . date("Y-m-d H:i:s") . "',
					  parent_qcode = '" . $this->parent_qcode . "',
					  status = 0,
					  ssst_code = '" . $this->ssst_code . "'
					";
            $dbquery = new dbquery($query, $connid);
            if ($this->copied_from != "") {
                $query = "INSERT INTO da_comments (qcode, commenter, comment, type, submitdate) VALUES
			              ($qcode, '" . $this->question_maker . "','Copied From: " . $this->copied_from . "','AUTO', now())";
                $dbquery = new dbquery($query, $connid);
            }
        }

        $mode = "";
        if (($tablename == "da_freelancer_questions" && $this->parent_qcode == 0) || $tablename == "da_questions")
        	$mode = "<input type='hidden' name='mode' value='add'>";
		
        //comment out javascript code and uncomment header location because questions adding twice
        //header("Location:$redirect_filename?qcode=$qcode&list=$qcode");
        echo "<html>
        	   <body><head>
			   <script>function pageSubmit(){
			   		document.hdform.action='" . $redirect_filename . "';
			   		document.hdform.submit();
			   }</script>
			   </head>
			   <form name='hdform' method='POST'>
			   <input type='hidden' name='list' value='" . $qcode . "'>
			   <input type='hidden' name='qcode' value='" . $qcode . "'>
			   $mode
			   <script language='javascript'>pageSubmit();</script>
			   </form>
			   </body></html>";
    }

    function saveComments($connid) {
        if (is_array($this->comments) && count($this->comments) > 0) {
            for ($i = 0; $i < count($this->comments); $i++) {
                $query = "INSERT INTO da_comments SET comment = '" . $this->comments[$i] . "',qcode = '" . $this->qcode[$i] . "',type = 'Q',entered_by = '" . $_SESSION["username"] . "' ,entered_date = NOW() ";
                $dbquery = new dbquery($query, $connid);

                $this->changeAllotment($connid, $this->qcode[$i], $this->qmaker[$i], '2');
            }
        }
    }

    function getApprovedImageCount($connid, $qcode, $type) {
        if ($type == "GT")
            $query = "SELECT count(*) as imgcount FROM da_images WHERE id = '" . $qcode . "' AND where_in_question = 'GT' AND status >= '3' ";
        else
            $query = "SELECT count(*) as imgcount FROM da_images WHERE id = '" . $qcode . "' AND where_in_question != 'GT' AND status >= '3' ";

        $dbquery = new dbquery($query, $connid);
        $row = $dbquery->getrowarray();
        return $row["imgcount"];
    }

    function changeAllotment($connid, $qcode, $allotTo, $status) {
        $query = "UPDATE da_questions SET status = '" . $status . "',current_alloted = '" . $allotTo . "' WHERE qcode = '" . $qcode . "' LIMIT 1";
        $dbquery = new dbquery($query, $connid);
    }

    function recursiveQuestionCode($connid, $original_qcode, $flag = "") {
        $query = "SELECT * from da_questions where qcode = '" . $original_qcode . "'";
        $dbquery = new dbquery($query, $connid);
        $row = $dbquery->getrowarray();
        $arrGet = array("");
        if ($flag == 1) {
            if ($row['parent_qcode'] == 0) {
                if (isset($this->levelForQuestion) && count($this->levelForQuestion) > 0) {
                    foreach ($this->levelForQuestion as $siblingcode) {
                        $arrGet = $this->getCopiesForOriginal($connid, $siblingcode, '1');
                    }
                    return $arrGet;
                }
            } else {
                $this->levelForQuestion[] = $row['parent_qcode'];
                return $this->recursiveQuestionCode($connid, $row['parent_qcode'], '1');
            }
        } else {
            if ($row['parent_qcode'] == 0)
                return $row['qcode'];
            else
                return $this->recursiveQuestionCode($connid, $row['parent_qcode']);
        }
    }

    function getCopiesForOriginal($connid, $original_qcode) {
        $copyQcodes = array();
        $query = "SELECT * from da_questions where parent_qcode = '" . $original_qcode . "'";
        $dbquery = new dbquery($query, $connid);
        if ($dbquery->numrows() > 0) {
            while ($row = $dbquery->getrowarray()) {
                $copyQcodes[] = $row["qcode"];
            }
        }
        //return $this->copiesFromQcode;
        return $copyQcodes;
    }

    /** Added by Muntaquim on 22nd Oct 2010 */
    function populateQuestion($connid, $qcode, $date = "", $tablename = "da_questions", $version = 0) {
        $select = "qtype, a.ips_status";

        if ($tablename == "da_questions_versions" || $tablename == "da_questions") {
            $select .= ",class_minlevel";
        }
        // Task  S-01009 Source type display  Naveen  , added source field in query
        // added field school usage in query to flag New questions
        if ($version > 0)
            $tablename = "da_questions_versions";
        $first_alloted = "first_alloted, a.current_alloted,trail,ts_file,tag_ques,indicate_lower_class";
        if ($tablename == "da_freelancer_questions")
            $select = "qtype,logic_distractor_a,logic_distractor_b,logic_distractor_c,logic_distractor_d";
        if ($tablename == "da_questions_versions")
            $first_alloted = "0";
        $query = "SELECT	question, optiona, optionb, optionc, optiond, correct_answer, question_maker," . $select . ", a.school_usage,
							b.subtopic_code, c.topic_code, a.status, mcexplanation, subjectno, a.class, group_id, passage_id, image_description,approver2_status,
							" . $first_alloted . ", question_testing, skill,a.sub_subtopic_code, mc_ques_title, remedial_instruction,misconception,context,a.lastModified,submit_date,
							classificationType, classificationCodes, a.parent_qcode, a.ssst_code, source
				  FROM		" . $tablename . " a LEFT JOIN  da_subSubTopicMaster b ON a.sub_subtopic_code=b.sub_subtopic_code
				            INNER JOIN da_subtopicMaster c ON b.subtopic_code=c.subtopic_code
				  WHERE		qcode='" . $qcode . "'";
        //echo $query;
        if ($tablename == "da_questions_versions" && $version > 0) {
            $query.=" AND version = '" . $version . "' ";
        }

        $dbquery = new dbquery($query, $connid);
        $line = $dbquery->getrowarray();

        $this->qcode = $qcode;
        $this->question = $line['question'];
        $this->optiona = $line['optiona'];
        $this->optionb = $line['optionb'];
        $this->optionc = $line['optionc'];
        $this->optiond = $line['optiond'];
        $this->correct_answer = $line['correct_answer'];
        $this->submit_date = $line['submit_date'];
        $this->lastModified = $line['lastModified'];
        /* $this->topic			=	$line['topic']; */
        $this->subtopic_code = $line['subtopic_code'];
        $this->sub_subtopic_code = $line['sub_subtopic_code'];
        $this->skill = $line['skill'];
        $this->status = $line['status'];
        $this->passage_id = $line['passage_id'];
        $this->image_description = $line['image_description'];
        $this->misconception = $line['misconception'];
        $this->mcques_title = $line['mc_ques_title'];
        $this->mcexplanation = $line['mcexplanation'];
        $this->remedial_instruction = $line['remedial_instruction'];
        $this->subjectno = $line['subjectno'];
        $this->class = $line['class'];
        $this->clsdagroup->retrieveGroupDetails($connid, $line['group_id']);
        $this->question_maker = $line['question_maker'];
        $this->current_alloted = $line['current_alloted'];
        $this->qtype = $line['qtype'];
        $this->trail = $line['trail'];
        $this->topic_code = $line['topic_code'];
        $this->ques_testing = $line['question_testing'];
        $this->teachersheet = $line['ts_file'];
        $this->tagquestion = $line['tag_ques'];
        $this->map_lower_class = $line['indicate_lower_class'];
        $this->context = $line['context'];
        $this->approver2_status = $line['approver2_status'];
        $this->classificationType = $line['classificationType'];
        $this->classificationCodes = $line['classificationCodes'];
        $this->parent_qcode = $line["parent_qcode"];
        $this->ssst_code = $line["ssst_code"];

        // Source field Naveen
        $this->source = $line["source"];

        // school usage field added Naveen for flagging New Questions
        $this->school_usage = $line["school_usage"];

        if ($tablename == "da_questions_versions" || $tablename == "da_questions") {
            $this->minimum_class = $line["class_minlevel"];
        }

        if ($tablename == "da_questions")
            $this->ips_status = $line["ips_status"];

        $this->noOfClassification = 0;
        if ($this->classificationCodes != "")
            $this->noOfClassification = count(explode(",", $this->classificationCodes));
        if ($tablename == "da_freelancer_questions") {
            $this->logic_distractor_a = $line["logic_distractor_a"];
            $this->logic_distractor_b = $line["logic_distractor_b"];
            $this->logic_distractor_c = $line["logic_distractor_c"];
            $this->logic_distractor_d = $line["logic_distractor_d"];
        }
        if ($this->status == 3 && $tablename == "da_freelancer_questions")
            $this->approvedby = $this->getApprover($connid, "da_freelancerComments");
        else if ($this->status == 3)
            $this->approvedby = $this->getApprover($connid);

        if ($date != "")
            $this->getAppropriateQnVersion($connid, $date, $qcode);


        //mysql_free_result($result);
    }

    function getApprover($connid, $tablename = "da_comments") {
        $approver = "";
        $query = "SELECT commenter FROM " . $tablename . " WHERE qcode=" . $this->qcode . " AND comment='AUTO:Approved' AND type='AUTO' ORDER BY srno DESC";
        $dbquery = new dbquery($query, $connid);
        if ($line = $dbquery->getrowarray()) {
            $tmpArray = explode(".", $line[0]);
            $approver = $tmpArray[0];
        }
        return $approver;
    }

    /**
     * Function to determine whether it is a group question or not.
     *
     * @return bool if group question return true
     */
    function isGroupQue() {
        if ($this->clsdagroup->group_id != '' && $this->clsdagroup->group_id != '0')
            return true;
        else
            return false;
    }

    /**
     * Check whether the person has the right to edit the question or not
     *
     * @param string $person
     * @return true if yes, false otherwise
     */
    function isEditableBy($connid, $person) {
        global $constant_da;
        $personArray = array("sridhar", "muntaquim", "mg.subramanian", "simon.talreja",  "maulik.shah", "sudhir.prajapati", "amit.deshwal", "sidhya.balakrishnan", "naveen.kumar", "lakshmi.prakashkumar", "jinal.rajdev");
        $query = "SELECT sbu_fullname FROM {$constant_da(COMMON_DATABASE)}.emp_master a,{$constant_da(COMMON_DATABASE)}.sbu_master b WHERE a.empl_sbu_id = b.srno AND userID='$person'";
        $dbquery = new dbquery($query, $connid);
        $dept = "";
        if ($dbquery->numrows() > 0) {
            if ($line = $dbquery->getrowarray())
                $dept = $line['sbu_fullname'];
        } else {
            $contract_query = "SELECT sbu_fullname FROM {$constant_da(COMMON_DATABASE)}.contract_master a, {$constant_da(COMMON_DATABASE)}.sbu_master b WHERE a.empl_sbu_id = b.srno AND userID='$person'";
            $contract_dbquery = new dbquery($contract_query, $connid);
            if ($contract_line = $contract_dbquery->getrowarray())
                $dept = $contract_line['sbu_fullname'];
        }
        if ($this->status == 3) {
            if ((!isset($_SESSION["company"]) || $_SESSION["company"] == "") && (strcasecmp($this->question_maker, $person) == 0 || strcasecmp($dept, "Test Development") == 0 || strcasecmp($dept, "TD") == 0 || in_array($person, $personArray)))
                return true;
            else
                return false;
        }
        return true;
    }

    /**
     * To determine whether the person can delete the question or not.
     *
     * @param string $person
     * @return bool  true if yes else false.
     */
    function canDelete($person) {
        if (strcasecmp($person, $this->question_maker) == 0 || strcasecmp($person, "muntaquim") == 0  || strcasecmp($person, "sudhir.prajapati") == 0 )
            return true;
        else
            return false;
    }

    /**
     * To determine whether the person can approve the question or not.
     *
     * @param string $person
     * @return bool  true if yes else false.
     */
    function canApprove($person) {
        if ($this->status < 3 || $this->status == "5") {

            if (strcasecmp($person, $this->question_maker) != 0) {
                // last editer cannot approve the question				
                $trailArr = explode("-", $this->trail);
                if (count($trailArr) == 0)
                    $lastModifier = "";
                else
                    $lastModifier = $trailArr[count($trailArr) - 1];

                if (strcasecmp($person, $lastModifier) != 0)
                    return true;
                else
                    return false;
            } else
                return false;
        } else
            return false;
    }

    /**
     * To determine whether the person can second approve the question or not.
     *
     * @param string $person
     * @return bool  true if yes else false.
     */
    function secondApprove($person) {
        if ($this->status == 3 && $this->approver2_status == 0) {
            if (strcasecmp($person, $this->question_maker) != 0)
                return true;
            else
                return false;
        } else
            return false;
    }

    /**
     * Determine whether the person has the rights to reject the question
     *
     * @param string $person
     * @return bool true if yes, false otherwise.
     */
    function canReject($person) {
        if ($this->status == 3) {
            if (strcasecmp($person, $this->question_maker) != 0 && ( strcasecmp($person, "vishnu") == 0 || strcasecmp($person, "muntaquim") == 0 || strcasecmp($person, "nishchal") == 0))
                return true;
            else
                return false;
        }
        else {
            if (strcasecmp($person, 'sridhar') == 0 || strcasecmp($person, 'vishnu') == 0 || strcasecmp($person, 'muntaquim') == 0 || strcasecmp($person, 'sudhir.prajapati') == 0)
                return true;
            else if (strcasecmp($person, $this->question_maker) != 0 && strcasecmp($person, $this->current_alloted) == 0)
                return true;
            else
                return false;
        }
    }

    /**
     * Determine whether the person has the rights to reject the question
     *
     * @param string $person
     * @return bool true if yes, false otherwise.
     */
    function secondReject($person) {
        if ($this->status == 3 && $this->approver2_status == 0) {
            if (strcasecmp($person, $this->question_maker) != 0)
                return true;
            else
                return false;
        }
        else {
            if (strcasecmp($person, 'sridhar') == 0 || strcasecmp($person, 'vishnu') == 0 || strcasecmp($person, 'muntaquim') == 0 || strcasecmp($person, 'jaspreet') == 0)
                return true;
            else if (strcasecmp($person, $this->question_maker) != 0 && strcasecmp($person, $this->current_alloted) == 0)
                return true;
            else
                return false;
        }
    }

    function getClass()		 		{ return $this->class; }
	function getSubject()	 		{ return $this->subjectno; }
	function getQuestion()			{ return $this->question; }
	function getOptionA() 			{ return $this->optiona; }
	function getOptionB() 			{ return $this->optionb; }
	function getOptionC() 			{ return $this->optionc; }
	function getOptionD() 			{ return $this->optiond; }
	function getTopic() 			{ return $this->topic_code; }
	function getSubTopic() 			{ return $this->subtopic_code; }
	function getSubSubTopic() 		{ return $this->sub_subtopic_code; }
	function getSSSTCode() 			{ return $this->ssst_code; }
	function getCorrectAnswer()		{ return $this->correct_answer; }
	function getImageDescription() 	{ return $this->image_description; }
	function getMCExplanation() 	{ return $this->mcexplanation; }
	function getQuesTesting() 	{ return $this->ques_testing; }
	function getStatus()			{ return $this->status; }
	function get2ndApprovalStatus()	{return $this->approver2_status;}
	function getPassage() 			{ return $this->passage_id; }
	function getMisconception() 			{ return $this->misconception; }
	function getTagQuestion() 			{ return $this->tagquestion; }
	function getMapLowerClass() 			{ return $this->map_lower_class; }
	function getRemedialInstruction() 	{ return $this->remedial_instruction; }

    function getPassageText($connid) {
        global $constant_da;
        $passageText = "";
        if ($this->passage_id != "") {
            $query = "SELECT description FROM {$constant_da(COMMON_DATABASE)}.qms_passage WHERE passage_id=" . $this->passage_id;
            $dbquery = new dbquery($query, $connid);
            $row = $dbquery->getrowarray();
            $passageText = html_entity_decode($row["description"], ENT_QUOTES, 'UTF-8');
        }
        return $passageText;
    }

    function getPassageSource($connid) {
        global $constant_da;

        $passageSource = "";
        if ($this->passage_id != "") {
            $query = "SELECT source FROM {$constant_da(COMMON_DATABASE)}.qms_passage WHERE passage_id=" . $this->passage_id;
            $dbquery = new dbquery($query, $connid);
            $row = $dbquery->getrowarray();
            //$passageSource = html_entity_decode($row["source"]);
            $passageSource = html_entity_decode($row["source"], ENT_QUOTES, 'UTF-8');
        }
        return $passageSource;
    }
    function getGroupId() 			{ return $this->clsdagroup->group_id; }
	function getGroupText() 			{ return $this->clsdagroup->group_text; }
	function getGroupDesgn_ImageDesc() {return $this->clsdagroup->groupDesgn_ImageDesc; }
	
    function getCurrentlyAlloted($tablename = "da_questions") {
        $query = "SELECT current_alloted FROM " . $tablename . " WHERE qcode=" . $this->qcode;
        $result = mysql_query($query);
        $line = mysql_fetch_array($result);
        return $line['current_alloted'];
    }

    function getFirstAlloted($tablename = "da_questions") {
        $query = "SELECT first_alloted FROM " . $tablename . " WHERE qcode=" . $this->qcode;
        $result = mysql_query($query);
        $line = mysql_fetch_array($result);
        return $line['first_alloted'];
    }

    function getAnswersOpted() {
        $answers = "";
        $query = "SELECT comment,commenter FROM da_comments WHERE qcode=" . $this->qcode . " AND type='AUTO' AND comment like 'Answer:%'";
        $result = mysql_query($query);
        $answers .= mysql_num_rows($result);
        $answers .= "~";
        while ($line = mysql_fetch_array($result)) {
            $ans = explode(":", $line['comment']);
            $answers.=$line['commenter'] . "~" . $ans[1] . "~";
        }
        $answers = substr($answers, 0, -1);
        return $answers;
    }

    /**
     * To determine whether the person has answered the question before or not
     *
     * @param string $person
     * @return bool  true if yes, false otherwise.
     */
    function isAnswered($person, $setflag = "") {
        $answered = false;
        if (strcasecmp($person, $this->question_maker) == 0)  //If questionmaker, then no need to answer the question.
            $answered = true;
        else {
            //Check if the person has already answered.
            if ($setflag == "freelancerComments") {
                $query = "SELECT count(*) FROM da_freelancerComments WHERE qcode=" . $this->qcode . " AND type='AUTO' AND comment like 'Answer:%' AND commenter='" . $person . "'";
            } else {
                $query = "SELECT count(*) FROM da_comments WHERE qcode=" . $this->qcode . " AND type='AUTO' AND comment like 'Answer:%' AND commenter='" . $person . "'";
            }
            $result = mysql_query($query);
            $line = mysql_fetch_array($result);
            if ($line[0] != 0)
                $answered = true;
        }
        return $answered;
    }

    function getCommentator($connid, $sub_subtopic_code) {
        $query = "SELECT commentator,status FROM da_subSubTopicMaster WHERE sub_subtopic_code = '" . $sub_subtopic_code . "' ";
        $dbquery = new dbquery($query, $connid);
        $row = $dbquery->getrowarray();
        return $row["commentator"];
    }

    function updateTS($connid, $tsFile) {
        $query = "UPDATE da_questions SET ts_file='$tsFile' WHERE qcode=" . $this->qcode;
        $dbquery = new dbquery($query, $connid);
    }

    function getApprovedDate($connid) {
        $approveddate = "";
        if ($this->getStatus() == 3) {
            $query = "SELECT submitdate FROM da_comments WHERE comment='AUTO:Approved' and qcode=" . $this->qcode;

            $dbquery = new dbquery($query, $connid);
            if ($row = $dbquery->getrowarray())
                $approveddate = $row['submitdate'];
        }
        return $approveddate;
    }

    function tranferFreelancerQues($connid) {
        $this->setpostvars($connid);
        if ($this->action == "CopyQuestion" && is_array($this->freelancerQues) && count($this->freelancerQues) > 0) {
            foreach ($this->freelancerQues as $key => $qcode) {
                if ($qcode != "") {
                    $query = "SELECT * FROM da_freelancer_questions WHERE qcode = '" . $qcode . "' ";
                    $dbquery = new dbquery($query, $connid);
                    $row = $dbquery->getrowarray();

                    $queryCD = "SELECT COUNT(*) FROM da_questions WHERE copied_from = '" . $row["qcode"] . "' ";
                    $dbqueryCD = new dbquery($queryCD, $connid);
                    $rowCD = $dbqueryCD->getrowarray();

                    if ($rowCD[0] == 0) {
                        $queryInsert = "INSERT INTO da_questions
						(class,subjectno,question,optiona,optionb,optionc,optiond,correct_answer,subtopic_code,
						sub_subtopic_code,skill,question_maker,qtype,trail,group_id,image_description,ts_file,status,submit_date,modify_date,
						lastModified,passage_id,misconception,mc_ques_title,mcexplanation,remedial_instruction,
						question_testing,first_alloted,current_alloted,alloted_date,ignore_words,tag_ques,copied_from,added_by,parent_qcode
						)
						SELECT class,subjectno,question,optiona,optionb,optionc,optiond,correct_answer,subtopic_code,
						sub_subtopic_code,skill,'" . $_SESSION["username"] . "',qtype,trail,group_id,image_description,ts_file,'3',submit_date,modify_date,
						lastModified,passage_id,misconception,mc_ques_title,mcexplanation,remedial_instruction,
						question_testing,first_alloted,current_alloted,alloted_date,ignore_words,tag_ques,qcode,question_maker,parent_qcode FROM da_freelancer_questions WHERE qcode = '" . $qcode . "'
						 ";


                        /* $queryInsert = "INSERT INTO da_questions SET ".
                          " class = '".$row["class"]."', ".
                          " subjectno = '".$row["subjectno"]."', ".
                          " question = '".addslashes($row["question"])."', ".
                          " optiona = '".$row["optiona"]."',".
                          " optionb = '".$row["optionb"]."',".
                          " optionc = '".$row["optionc"]."',".
                          " optiond = '".$row["optiond"]."',".
                          " correct_answer = '".$row["correct_answer"]."',".
                          " subtopic_code = '".$row["subtopic_code"]."',".
                          " sub_subtopic_code = '".$row["sub_subtopic_code"]."',".
                          " skill = '".$row["skill"]."',".
                          " question_maker = '".$_SESSION["username"]."',".
                          " qtype = '".$row["qtype"]."',".
                          " trail = '".$row["trail"]."',".
                          " group_id = '".$row["group_id"]."',".
                          " image_description = '".$row["image_description"]."',".
                          " ts_file = '".$row["ts_file"]."',".
                          " status = '3', ".
                          " submit_date = '".$row["submit_date"]."',".
                          " modify_date = '".$row["modify_date"]."',".
                          " lastModified = '".$row["lastModified"]."',".
                          " passage_id = '".$row["passage_id"]."',".
                          " misconception = '".$row["misconception"]."',".
                          " mc_ques_title = '".$row["mc_ques_title"]."',".
                          " mcexplanation = '".$row["mcexplanation"]."',".
                          " remedial_instruction = '".$row["remedial_instruction"]."',".
                          " question_testing = '".$row["question_testing"]."',".
                          " first_alloted = '".$row["first_alloted"]."',".
                          " current_alloted = '".$row["current_alloted"]."',".
                          " alloted_date = '".$row["alloted_date"]."',".
                          " ignore_words = '".$row["ignore_words"]."',".
                          " tag_ques = '".$row["tag_ques"]."',".
                          " copied_from = '".$row["qcode"]."',".
                          " added_by = '".$row["question_maker"]."' "; */

                        $dbqueryInsert = new dbquery($queryInsert, $connid);
                        $qcodeDA = $dbqueryInsert->insertid;
                        checkImageOnly($qcodeDA);
                        $querySetUsed = "UPDATE da_freelancer_questions SET used = '1' WHERE qcode = '" . $row["qcode"] . "' ";
                        $dbquerySetUsed = new dbquery($querySetUsed, $connid);
                    }
                }
            }
        }
    }

    function getRequestIdWhereUsed($connid, $criteria = "", $class_set = "") {
        $condition = "";
        /* if(isset($criteria) && $criteria!="")
          $condition = "AND a.request_date >= '$criteria'"; */
        if (isset($criteria) && $criteria != "")
            $condition = "AND DATE(a.approved_date) >= '$criteria'";

        if ($class_set != "")
            $condition = "AND a.class = '$class_set'";

        if (isset($this->subjectno) && $this->subjectno != "")
            $condition .= " AND a.subject = $this->subjectno ";

        $usedIn = "";
        $query = "SELECT a.id FROM da_testRequest a, da_paperDetails b WHERE type='actual' AND schoolCode<>2387554 
       			  AND a.paper_code=b.papercode AND a.status='Approved' AND a.approved_date != '0000-00-00 00:00:00' AND find_in_set(" . $this->qcode . ",qcode_list)>0 AND version=1 $condition ORDER BY a.approved_date ASC";
        //          $query = "SELECT a.id FROM da_testRequest a, da_paperDetails b WHERE type='actual' AND schoolCode<>2387554 
        //   			  AND a.paper_code=b.papercode  AND find_in_set(".$this->qcode.",qcode_list)>0 AND version=1 $condition ORDER BY a.approved_date ASC";
//      			  echo "$query <br/> ";

        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $usedIn .= $row['id'] . ", ";
        }
        $usedIn = substr($usedIn, 0, -2);
        return $usedIn;
    }

    /*     * ***** Added by Manish ************* */

    function getQuestionPosition($connid, $paperCodeArray) {
        $qcode = $this->qcode;
        $query = "SELECT papercode,version,find_in_set(" . $qcode . ",qcode_list) as position FROM da_paperDetails WHERE papercode IN ('" . implode("','", $paperCodeArray) . "') ";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $returnArray[$row["papercode"]][$row["version"]] = $row["position"];
        }
        return $returnArray;
    }

    function getQuestionPerformance($connid, $request_id = "", $exam_code = "", $class_set = "", $paperDiff_flag = 0) {
        $qcode = $this->qcode;
        if ($request_id == "" && $exam_code == "") { // for overall performance
            $request_id = $this->getRequestIdWhereUsed($connid, "", $class_set);

            //remove request id where correct answer is not current version current answer 
            if ($paperDiff_flag == 1 && $request_id != "") {
                $request_id = $this->getRequestIdToConsider($request_id, $connid);
            }

            if ($request_id != "" && $request_id != 0) {
                $condition = " AND request_id IN ($request_id) ";
                $response_count["usedin"] = sizeof(explode(",", $request_id));
            } else {
                $response_count["usedin"] = 0;
                $response_count["total"] = 0;
                $response_count["invalid"] = 0;
                return $response_count;
            }
        } else if ($exam_code != "" && $request_id == "") { // for class level performance
            $condition = " AND exam_code='$exam_code' ";
        } else if ($request_id != "" && $exam_code == "") { // for section level performance
            $condition = " AND request_id='$request_id' ";
        }

        if ($condition == "")
            exit;
        $paperCodeArray = array();
        $query = "SELECT a.id,paper_code,exam_code FROM da_testRequest a, da_examDetails b WHERE a.id=b.request_id $condition";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            if (!in_array($row["paper_code"], $paperCodeArray))
                $paperCodeArray[] = $row["paper_code"];
            $requestIDArray[$row["id"]]["paper_code"] = $row["paper_code"];
            $requestIDArray[$row["id"]]["exam_code"][] = $row["exam_code"];
        }

        $questionPositions = $this->getQuestionPosition($connid, $paperCodeArray);
        //echo "<pre>"; print_r($requestIDArray); echo "</pre>";
        //echo "<pre>"; print_r($questionPositions); echo "</pre>";

        for ($i = 1; $i <= 75; $i++)
            $select.="A" . $i . ",";
        $validResponse = array("A", "B", "C", "D");
        foreach ($requestIDArray as $rid => $requestDetails) {
            $paper_code = $requestDetails["paper_code"];
            foreach ($requestDetails["exam_code"] as $examcodes) {
                $query = "SELECT $select paperversion FROM da_response WHERE examcode='$examcodes' ORDER BY paperversion";
                $dbquery = new dbquery($query, $connid);
                while ($row = $dbquery->getrowarray()) {
                    $position = $questionPositions[$paper_code][$row["paperversion"]];
                    $student_response = $row["A" . $position];
                    $response_count["total"] ++;
                    if (in_array($student_response, $validResponse)) {
                        $response_count[$student_response] ++;
                    } else {
                        $response_count["invalid"] ++;
                    }
                }
            }
        }

        //echo "<pre>"; print_r($response_count); echo "</pre>";
        return $response_count;
    }

    /*     * ****End **************************** */

    function getAppropriateQnVersion($connid, $date, $qcode) {
        /* $approved_date = "";
          $approved_date = $this->getApprovedDate($connid);
          if($approved_date == "" && $this->status == "3")
          $this->lastModified = $this->submit_date; */

        $resultarr = $this->GetQueTableAndVersion($connid, $qcode, $date, $this->lastModified);
        $tablename = $resultarr["tablename"];
        $version = $resultarr["version"];
        $this->populateQuestion($connid, $qcode, "", $tablename, $version);
    }

    function GetQueTableAndVersion($connid, $qcode, $approved_date, $last_modified_date) {

        $returnArr = array();
        $version = 0;
        $misconception = "";
        $correct_ans = "";
        $tablename = "da_questions";

        if ($approved_date != "" && $approved_date != '0000-00-00 00:00:00') {

            $time1 = explode(" ", $last_modified_date);
            $time_1 = explode("-", $time1[0]);
            $time_m1 = explode(":", $time1[1]);

            $time2 = explode(" ", $approved_date);
            $time_2 = explode("-", $time2[0]);
            $time_m2 = explode(":", $time2[1]);         
            
            $timec1 = mktime($time_m1[0], $time_m1[1], $time_m1[2], $time_1[1], $time_1[2], $time_1[0]);
            $timec2 = mktime($time_m2[0], $time_m2[1], $time_m2[2], $time_2[1], $time_2[2], $time_2[0]);

           
            if ($timec1 > $timec2) {
                $queryVersion = "SELECT version,misconception,correct_answer FROM da_questions_versions WHERE qcode = '" . $qcode . "' AND submit_date <= '" . $approved_date . "' AND status = 3 ORDER BY submit_date DESC, version DESC LIMIT 1";
                $dbqueryVersion = new dbquery($queryVersion, $connid);
                if ($dbqueryVersion->numrows() > 0) {
                    $rowVersion = $dbqueryVersion->getrowarray();
                    $version = $rowVersion["version"];
                    $misconception = $rowVersion["misconception"];
                    $correct_ans = $rowVersion["correct_answer"];
                    $tablename = "da_questions_versions";
                } else {
                    $version = 0;
                    $misconception = "";
                    $correct_ans = "";
                    $tablename = "da_questions";
                }
            }
        }
        $returnArr = array("tablename" => $tablename, "version" => $version, "misconception" => $misconception, "correct_answer" => $correct_ans);
        return $returnArr;
    }

    function GetCorrectAnsOfQcodeForTestReq($connid, $qcodestr = '', $approved_date) {

        if ($qcodestr == "")
            return;

        $returnArr = array();

        $query = "SELECT qcode,correct_answer,misconception,lastModified FROM da_questions WHERE qcode IN ($qcodestr)";
        $dbqry = new dbquery($query, $connid);
        while ($result = $dbqry->getrowarray()) {
            $QueTblResult = $this->GetQueTableAndVersion($connid, $result["qcode"], $approved_date, $result["lastModified"]);
            if ($QueTblResult["tablename"] == "da_questions_versions")
                $returnArr[$result["qcode"]] = $QueTblResult;
            else {
                $returnArr[$result["qcode"]] = array("tablename" => "da_questions", "version" => 0, "misconception" => $result["misconception"], "correct_answer" => $result["correct_answer"]);
            }
        }

        return $returnArr;
    }

    function GetParentQcode($connid, $qcode) {

        $query = "SELECT parent_qcode FROM da_questions WHERE qcode = '" . $qcode . "'";
        $dbqry = new dbquery($query, $connid);
        if ($dbqry->numrows() > 0) {
            $row = $dbqry->getrowarray();
            return $row["parent_qcode"];
        }
    }

    function GetFreelancerCopies($connid, $qcode) {

        $copyQcodes = array();
        $query = "SELECT qcode,status FROM da_freelancer_questions WHERE parent_qcode = '" . $qcode . "'";
        $dbquery = new dbquery($query, $connid);
        if ($dbquery->numrows() > 0) {
            while ($row = $dbquery->getrowarray()) {
                $copyQcodes[$row["qcode"]] = array("qcode" => $row["qcode"],
                    "status" => $row["status"]);
            }
        }
        return $copyQcodes;
    }

    ###########For unique with no copy or rejected ######################

    function getUniqueUsedQcodeDataList($subjectno, $connid) {
        $arrRet = array();
        $query = "SELECT a.subjectno,a.class,a.sub_subtopic_code,da_subSubTopicMaster.description,a.qcode,a.school_usage,count(b.qcode) as childqcodecount 
				  FROM da_questions as a 
				  LEFT JOIN da_questions as b ON a.qcode = b.parent_qcode 
				  LEFT JOIN da_subSubTopicMaster ON a.sub_subtopic_code = da_subSubTopicMaster.sub_subtopic_code 
				  WHERE a.status = 3 and a.parent_qcode = 0 
				  and a.subjectno = '$subjectno'
				  GROUP BY a.qcode having childqcodecount = 0 
				  ORDER BY a.subjectno,a.qcode";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $qcode_set = "";
            $qcode_set = $row["qcode"];
            $arrRet[$row["qcode"]]["subjectno"] = $row["subjectno"];
            $arrRet[$row["qcode"]]["class"] = $row["class"];
            $arrRet[$row["qcode"]]["sub_subtopic_code"] = $row["sub_subtopic_code"];
            $arrRet[$row["qcode"]]["description"] = $row["description"];
            $arrRet[$row["qcode"]]["qcode"] = $row["qcode"];
            $arrRet[$row["qcode"]]["school_usage"] = $row["school_usage"];

            $queryFetch = "SELECT a.test_date,a.id from da_testRequest a,da_paperDetails b WHERE a.paper_code = b.paperCode AND a.paper_code!='' AND FIND_IN_SET($qcode_set,b.qcode_list) AND a.status = 'Approved' AND a.type = 'actual' ORDER BY test_date ASC LIMIT 1";
            $dbqueryFetch = new dbquery($queryFetch, $connid);
            while ($rowFetch = $dbqueryFetch->getrowarray()) {
                $arrRet[$qcode_set]["request_id"] = $rowFetch["id"];
                $arrRet[$qcode_set]["test_date"] = date("d-m-Y", strtotime($rowFetch["test_date"]));
            }
        }
        return $arrRet;
    }

    ###########For unique with no copy or rejected ######################
    #######################For Misconetion Interface#####################

    function getMisconceptionAllQcode($connid) {
        $this->setpostvars();
        $this->setgetvars();

        $this->clspaging->setgetvars();
        $this->clspaging->setpostvars();

        if ($this->action == "SearchMisconception") {
            $condition = "";
            $arrRet = array();
            if ($this->class != "" && $this->class > 0) {
                $condition.=" AND a.class = '" . $this->class . "' ";
            }
            if ($this->subjectno != "" && $this->subjectno > 0) {
                $condition.=" AND a.subjectno IN (" . $this->subjectno . ") ";
            }
            if ($this->topic_code != "" && $this->topic_code > 0) {
                $condition.=" AND c.topic_code = '" . $this->topic_code . "' ";
            }
            if ($this->subtopic_code != "" && $this->subtopic_code > 0) {
                $condition.=" AND b.subtopic_code = '" . $this->subtopic_code . "' ";
            }
            if ($this->sub_subtopic_code != "" && $this->sub_subtopic_code > 0) {
                $condition.=" AND a.sub_subtopic_code = '" . $this->sub_subtopic_code . "' ";
            }

            $query = "SELECT a.*,b.description as subtopic,c.description as topic, d.description as subsubtopic, a.sub_subtopic_code
			          FROM   da_questions a, da_subSubTopicMaster d, da_subtopicMaster b,da_topicMaster c
			          WHERE  a.sub_subtopic_code=d.sub_subtopic_code AND d.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code $condition ORDER BY a.qcode";
            $this->clspaging->numofrecs = getQueryCount($query);

            if ($this->clspaging->numofrecs > 0) {
                $this->clspaging->getcurrpagevardb();
            }
            if ($this->mc_school_code == "") {
                //$query .= $this->clspaging->limit;
            }

            $dbquery = new dbquery($query, $connid);
            while ($row = $dbquery->getrowarray()) {
                if ($this->mc_school_code != "") {
                    $criteria = "";
                    $checkToUse = 0;
                    if ($this->mc_year != "") {
                        $criteria .= " AND b.year = $this->mc_year";
                    }
                    $queryFetchCheck = "SELECT count(*) as counter FROM da_paperDetails a,da_testRequest b WHERE a.papercode = b.paper_code AND b.schoolCode = $this->mc_school_code AND FIND_IN_SET($row[qcode],a.qcode_list) AND a.version = '1' $criteria";
                    $dbqueryFetchCheck = new dbquery($queryFetchCheck, $connid);
                    while ($rowFetchCheck = $dbqueryFetchCheck->getrowarray()) {
                        if ($rowFetchCheck["counter"] > 0) {
                            $checkToUse = 1;
                        }
                    }
                    if ($checkToUse == 1) {
                        $arrRet[] = $row["qcode"];
                    }
                } else {
                    //$arrRet[$row["qcode"]] = $row["qcode"];	
                    $arrRet[] = $row["qcode"];
                }
            }
        }
        $arrStandardDev = array();
        $arrSetFinalArr = array();
        foreach ($arrRet as $key => $value) {
            //$this->populateQuestion($connid,$value); # we need to display latest version in crate edit test page : Dt:2012-05-16             						
            $query_qcode_fetch = "SELECT qcode,class,subjectno,correct_answer FROM da_questions WHERE qcode = '$value'";
            $dbquery_qcode_fetch = new dbquery($query_qcode_fetch, $connid);
            while ($row_qcode_fetch = $dbquery_qcode_fetch->getrowarray()) {
                $this->qcode = $row_qcode_fetch["qcode"];
                $this->class = $row_qcode_fetch["class"];
                $this->subjectno = $row_qcode_fetch["subjectno"];
                $this->correct_answer = $row_qcode_fetch["correct_answer"];
            }
            $overallPerformance = $this->getQuestionPerformanceMisconception($connid, $this->class, $this->subjectno);

            $validAnswerArr = array("A", "B", "C", "D");
            $maxWrong = "";
            $wrongAnswerCount = array();
            $standardDeviation = array();
            foreach ($validAnswerArr as $keyvalidArr => $valuevalidArr) {
                if ($valuevalidArr != $this->getCorrectAnswer()) {
                    $wrongAnswerCount[$valuevalidArr] = $valuevalidArr;
                }
            }
            $getMaxWrongValues = array();
            foreach ($wrongAnswerCount as $keywrongAnswerCount => $valuewrongAnswerCount) {
                if (round($overallPerformance[$valuewrongAnswerCount] * 100 / $overallPerformance[total], 1) != 0) {
                    $getMaxWrongValues[$valuewrongAnswerCount] = round($overallPerformance[$valuewrongAnswerCount] * 100 / $overallPerformance[total], 1);
                }
                $standardDeviation[] = round($overallPerformance[$valuewrongAnswerCount] * 100 / $overallPerformance[total], 1);
            }
            if (isset($getMaxWrongValues) && count($getMaxWrongValues) > 0) {
                $maxWrong = array_keys($getMaxWrongValues, max($getMaxWrongValues));
            }
            $standard_deviation = 0;
            $standard_deviation = $this->getStandardDeviation($standardDeviation);
            $arrSetFinalArr[$value]["A"] = round($overallPerformance["A"] * 100 / $overallPerformance[total], 1);
            $arrSetFinalArr[$value]["B"] = round($overallPerformance["B"] * 100 / $overallPerformance[total], 1);
            $arrSetFinalArr[$value]["C"] = round($overallPerformance["C"] * 100 / $overallPerformance[total], 1);
            $arrSetFinalArr[$value]["D"] = round($overallPerformance["D"] * 100 / $overallPerformance[total], 1);
            $arrSetFinalArr[$value]["standard_deviation"] = $standard_deviation;
            $arrSetFinalArr[$value]["correct_answer"] = $this->getCorrectAnswer();
            $arrSetFinalArr[$value]["most_wrong_answer"] = $maxWrong[0];
            $arrStandardDev[$value] = $standard_deviation;
        }

        /* echo "<pre>";
          print_r($arrStandardDev);
          echo "</pre>";
          exit; */
        if (isset($arrStandardDev) && count($arrStandardDev) > 0) {
            arsort($arrStandardDev);
            $arrGetKeys = array();
            $arrGetKeys = array_keys($arrStandardDev);
            $arrRet = array();
            $arrRet = $arrGetKeys;
        }
        /* if($this->mc_school_code!="")
          { */
        $this->clspaging->numofrecs = count($arrRet);
        if ($this->clspaging->numofrecs > 0) {
            $this->clspaging->getcurrpagevardb();
        }
        $startFrom = (( $this->clspaging->currentpage - 1 ) * $this->clspaging->numofrecsperpage );
        $endFrom = $startFrom + $this->clspaging->numofrecsperpage - 1;
        $arrNewSet = array();
        foreach ($arrRet as $key => $value) {
            if (($key >= $startFrom) && ($key <= $endFrom)) {
                $arrNewSet[$value] = $value;
            }
        }
        if (isset($arrNewSet) && count($arrNewSet) > 0) {
            $arrRet = array();
            $arrRet = $arrNewSet;
        }
        $arrReturnArr = array();
        foreach ($arrRet as $key => $value) {
            $arrReturnArr[$value] = $arrSetFinalArr[$value];
        }
        /* echo "<pre>";
          print_r($arrReturnArr);
          echo "</pre>"; */
        /* } */
        //return $arrRet;		
        return $arrReturnArr;
    }

    function getQuestionPerformanceMisconception($connid, $class, $subjectno) {
        $qcode = $this->qcode;

        $request_id = $this->getRequestIdWhereUsedMisconception($connid, $class, $subjectno);
        if ($request_id != "" && $request_id != 0) {
            $condition = " AND request_id IN ($request_id) ";
            $response_count[usedin] = sizeof(explode(",", $request_id));
        } else {
            $response_count["usedin"] = 0;
            $response_count["total"] = 0;
            $response_count["invalid"] = 0;
            return $response_count;
        }


        if ($condition == "")
            exit;
        $paperCodeArray = array();
        $query = "SELECT a.id,paper_code,exam_code FROM da_testRequest a, da_examDetails b WHERE a.id=b.request_id $condition";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            if (!in_array($row[paper_code], $paperCodeArray))
                $paperCodeArray[] = $row[paper_code];
            $requestIDArray[$row[id]][paper_code] = $row[paper_code];
            $requestIDArray[$row[id]][exam_code][] = $row[exam_code];
        }

        $questionPositions = $this->getQuestionPosition($connid, $paperCodeArray);
        //echo "<pre>"; print_r($requestIDArray); echo "</pre>";
        //echo "<pre>"; print_r($questionPositions); echo "</pre>";

        for ($i = 1; $i <= 75; $i++)
            $select.="A" . $i . ",";
        $validResponse = array("A", "B", "C", "D");
        foreach ($requestIDArray as $rid => $requestDetails) {
            $paper_code = $requestDetails[paper_code];
            foreach ($requestDetails[exam_code] as $examcodes) {
                $query = "SELECT $select paperversion FROM da_response WHERE examcode='$examcodes' ORDER BY paperversion";
                $dbquery = new dbquery($query, $connid);
                while ($row = $dbquery->getrowarray()) {
                    $position = $questionPositions[$paper_code][$row[paperversion]];
                    $student_response = $row["A" . $position];
                    $response_count[total] ++;
                    if (in_array($student_response, $validResponse)) {
                        $response_count[$student_response] ++;
                    } else {
                        $response_count[invalid] ++;
                    }
                }
            }
        }
        //echo "<pre>"; print_r($response_count); echo "</pre>";
        return $response_count;
    }

    function getRequestIdWhereUsedMisconception($connid, $class_set = "", $subject_set = "") {
        $condition = "";
        /* if(isset($criteria) && $criteria!="")
          $condition = "AND a.request_date >= '$criteria'"; */

        if ($class_set != "")
            $condition .= "AND a.class = '$class_set'";

        if ($subject_set != "")
            $condition .= "AND a.subject = '$subject_set'";

        if ($this->mc_school_code != "")
            $condition .= "AND a.schoolCode = '$this->mc_school_code'";

        if ($this->mc_year != "")
            $condition .= "AND a.year = '$this->mc_year'";

        $usedIn = "";
        $query = "SELECT a.id FROM da_testRequest a, da_paperDetails b WHERE type='actual' AND schoolCode<>2387554 
       			  AND a.paper_code=b.papercode AND find_in_set(" . $this->qcode . ",qcode_list)>0 AND version=1 $condition";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $usedIn .= $row['id'] . ", ";
        }
        $usedIn = substr($usedIn, 0, -2);
        return $usedIn;
    }

    function getStandardDeviation($std) {
        $total;
        while (list($key, $val) = each($std)) {
            $total += $val;
        }
        reset($std);
        $mean = $total / count($std);
        while (list($key, $val) = each($std)) {
            $sum += pow(($val - $mean), 2);
        }
        $var = sqrt($sum / (count($std) - 1));
        return $var;
    }

    function getmeriwrittenflag($qcode, $connid) {
        $flag_set = 0;
        $query_misconception = "SELECT mcexplanation,remedial_instruction FROM da_questions WHERE qcode = $qcode";
        $dbquery = new dbquery($query_misconception, $connid);
        while ($row = $dbquery->getrowarray()) {
            if ((trim(strtolower(html_entity_decode(preg_replace("/&nbsp;/", "", $row["mcexplanation"])))) != "" && !is_null($row["mcexplanation"])) || (trim(strtolower(html_entity_decode(preg_replace("/&nbsp;/", "", $row["remedial_instruction"])))) != "" && !is_null($row["remedial_instruction"]))) {
                $flag_set = 1;
            }
        }
        return $flag_set;
    }

    #######################For Misconetion Interface#####################
    #######################For Low Performance###########################

    function getLowPerformanceAllQcode($connid) {
        $this->setpostvars();
        $this->setgetvars();

        if ($this->action == "SearchLowPerformance") {

            $condition = "";
            $arrRet = array();

            if ($this->class != "" && $this->class != "ALL")
                $condition .= " AND a.class = '$this->class'";

            if ($this->subjectno != "")
                $condition .= " AND a.subject = '$this->subjectno'";

            if ($this->lowperformance_startdate != "") {
                $startFrom = date('Y-m-d', strtotime($this->lowperformance_startdate));
                $condition .= " AND a.scoring_date >= '$startFrom'";
            }

            if ($this->lowperformance_enddate != "") {
                $endFrom = date('Y-m-d', strtotime($this->lowperformance_enddate));
                $condition .= " AND a.scoring_date <= '$endFrom'";
            }

            $qcode_list = "";
//		$query = "SELECT b.qcode_list FROM da_paperDetails b,da_testRequest a WHERE a.paper_code = b.papercode $condition AND b.version = '1'";
            // add condition to not get demo paper and demo school questions
            $query = "SELECT b.qcode_list FROM da_paperDetails b,da_testRequest a WHERE a.paper_code = b.papercode $condition AND b.version = '1' and a.schoolCode <> 2387554 and a.type='actual' ";
            $dbquery = new dbquery($query, $connid);
            while ($row = $dbquery->getrowarray()) {
                if ($row["qcode_list"] != "") {
                    $qcode_list .= $row["qcode_list"] . ",";
                }
            }
            if ($qcode_list != "") {
                $qcode_list = substr_replace($qcode_list, "", -1);

                $arrRet = explode(",", $qcode_list);
            }
        }
        return $arrRet;
    }

    function getQuestionPerformanceLowPerformance($connid) {
        $qcode = $this->qcode;

        $request_id = $this->getRequestIdWhereUsedLowPerformance($connid);

        if ($request_id != "" && $request_id != 0) {
            $condition = " AND request_id IN ($request_id) ";
            //	$response_count[usedin]=sizeof(explode(",",$request_id));
        } else {
            /* 	$response_count["usedin"] = 0;
              $response_count["total"] = 0;
              $response_count["invalid"] = 0;
             */
            $response_count[0]["usedin"] = 0;
            $response_count[0]["total"] = 0;
            $response_count[0]["invalid"] = 0;
            return $response_count;
        }

        if ($this->lowperformance_startdate != "") {
            $startFrom = date('Y-m-d', strtotime($this->lowperformance_startdate));
        }

        if ($this->lowperformance_enddate != "") {
            $endFrom = date('Y-m-d', strtotime($this->lowperformance_enddate));
        }

        if ($condition == "")
            exit;
        $paperCodeArray = array();
        $query = "SELECT a.id,a.approved_date,paper_code,exam_code FROM da_testRequest a, da_examDetails b WHERE a.id=b.request_id $condition";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            if (!in_array($row[paper_code], $paperCodeArray))
                $paperCodeArray[] = $row[paper_code];
            $requestIDArray[$row[id]][paper_code] = $row[paper_code];
            $requestIDArray[$row[id]][exam_code][] = $row[exam_code];
            $requestIDArray[$row[id]][approved_date][] = $row[approved_date];
        }

        $questionPositions = $this->getQuestionPosition($connid, $paperCodeArray);
        //echo "<pre>"; print_r($requestIDArray); echo "</pre>";
        //echo "<pre>"; print_r($questionPositions); echo "</pre>";

        for ($i = 1; $i <= 75; $i++)
            $select.="A" . $i . ",";
        $validResponse = array("A", "B", "C", "D");
        foreach ($requestIDArray as $rid => $requestDetails) {
            $paper_code = $requestDetails[paper_code];
            $response_count[$rid]["approved_date"] = $requestDetails["approved_date"][0];
            foreach ($requestDetails[exam_code] as $examcodes) {
                /* $query="SELECT $select paperversion FROM da_response WHERE examcode='$examcodes' AND DATE(last_modified) >= '$startFrom' AND DATE(last_modified) <= '$endFrom' ORDER BY paperversion"; */
                $query = "SELECT $select paperversion FROM da_response WHERE examcode='$examcodes' ORDER BY paperversion";
                $dbquery = new dbquery($query, $connid);
                while ($row = $dbquery->getrowarray()) {
                    $position = $questionPositions[$paper_code][$row[paperversion]];
                    $student_response = $row["A" . $position];
                    //	$response_count[total]++;
                    $response_count[$rid]["total"] ++;

                    if (in_array($student_response, $validResponse)) {
                        //$response_count[$student_response]++;
                        $response_count[$rid][$student_response] ++;
                    } else {
                        //	$response_count[invalid]++;
                        $response_count[$rid]["invalid"] ++;
                    }
                }
            }
        }
        //echo "<pre>"; print_r($response_count); echo "</pre>";
        return $response_count;
    }

    function getRequestIdWhereUsedLowPerformance($connid) {
        $condition = "";
        /* if(isset($criteria) && $criteria!="")
          $condition = "AND a.request_date >= '$criteria'"; */

        if ($this->class != "" && $this->class != "ALL")
            $condition .= "AND a.class = '$this->class'";

        if ($this->subjectno != "")
            $condition .= "AND a.subject = '$this->subjectno' ";

        if ($this->lowperformance_startdate != "") {
            $startFrom = date('Y-m-d', strtotime($this->lowperformance_startdate));
            $condition .= "AND a.scoring_date >= '$startFrom'";
        }

        if ($this->lowperformance_enddate != "") {
            $endFrom = date('Y-m-d', strtotime($this->lowperformance_enddate));
            $condition .= "AND a.scoring_date <= '$endFrom'";
        }

        $usedIn = "";
        $query = "SELECT a.id FROM da_testRequest a, da_paperDetails b WHERE type='actual' AND schoolCode<>2387554 
       			  AND a.paper_code=b.papercode AND find_in_set(" . $this->qcode . ",qcode_list)>0 AND version=1 $condition";

        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $usedIn .= $row['id'] . ", ";
        }
        $usedIn = substr($usedIn, 0, -2);
        return $usedIn;
    }

    function getSSTNameByCode($sub_subtopic_code, $connid) {
        $sub_subtopic_desc = "";
        $query = "SELECT description FROM da_subSubTopicMaster WHERE sub_subtopic_code = '$sub_subtopic_code'";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $sub_subtopic_desc = $row["description"];
        }
        return $sub_subtopic_desc;
    }

    function getLowPerformanceAllQcodeXLS($connid) {
        $arrSubject = array("1" => "English", "2" => "Maths", "3" => "Science", "4" => "SS", "100" => "General Assessments");
        $arrQcodeSet = $this->getLowPerformanceAllQcode($connid);
        $counter_set = 0;
        $arrForFetchFinal = array();
        $arrForFetchFinalForSorting = array();


        foreach ($arrQcodeSet as $keyQcodeSet => $valueQcodeSet) {
            $class_set = $this->class;
            $subject_set = $this->subjectno;
            $this->populateQuestion($connid, $valueQcodeSet);
            if ($class_set != "") {
                $this->class = $class_set;
            }
            if ($subject_set != "") {
                $this->subjectno = $subject_set;
            }

            if (!isset($arrPerformance[$valueQcodeSet])) {

                // $overallPerformance=$this->getQuestionPerformanceLowPerformance($connid);
                $request_overallPerformance = $this->getQuestionPerformanceLowPerformance($connid);

                $overallPerformance = $this->getPerformanceLowBasedQuesVersion($request_overallPerformance, $this->lowperformance_above_percentage, $this->lowperformance_percentage, $connid);

                $arrPerformance[$valueQcodeSet] = $overallPerformance;
            } else {
                //echo "saved getting performance of question <br/>";
                $overallPerformance = $arrPerformance[$valueQcodeSet];
            }

            $persentage_answer = 0;
            //  $persentage_answer = round($overallPerformance[$correct_answer]*100/$overallPerformance[total],1);
            $persentage_answer = round($overallPerformance["correct_answer"] * 100 / $overallPerformance["total"], 1);
            /*
              $correct_answer = $this->getCorrectAnswer();
              $persentage_answer = 0;
              $persentage_answer = round($overallPerformance[$correct_answer]*100/$overallPerformance[total],1);
              $validAnswerArr = array("A","B","C","D");
              $maxWrong = 0;
              $wrongAnswerCount = array();
              $standardDeviation = array();
              foreach($validAnswerArr as $keyvalidArr => $valuevalidArr)
              {
              if($valuevalidArr!=$this->getCorrectAnswer())
              {
              $wrongAnswerCount[$valuevalidArr] = $valuevalidArr;
              }
              }
              $getMaxWrongValues = array();
              foreach($wrongAnswerCount as $keywrongAnswerCount => $valuewrongAnswerCount)
              {
              if(round($overallPerformance[$valuewrongAnswerCount]*100/$overallPerformance[total],1)!=0)
              {
              $getMaxWrongValues[$valuewrongAnswerCount] =  round($overallPerformance[$valuewrongAnswerCount]*100/$overallPerformance[total],1);
              }
              }
              if(isset($getMaxWrongValues) && count($getMaxWrongValues)>0)
              {
              $maxWrong = max($getMaxWrongValues);
              }

             */
            $arrGetClassFinal = array();
            $arrGetClassFinal = $this->getClassesForLowPerformance($connid, $class_set, $subject_set);
            $arrGetAllClass = array();
            $arrGetAllClass = explode(",", $arrGetClassFinal["class_used"]);
            $arrGetAllClassNot = array();
            $arrGetAllClassNot = explode(",", $arrGetClassFinal["class_not_used"]);
            $arrGetAllSchoolCode = array();
            $arrGetAllSchoolCode = explode(",", $arrGetClassFinal["schoolCode"]);
            $counterSchools = 0;
            $counterSchools = count($arrGetAllSchoolCode);
            //if($persentage_answer<50)
            /* 	    if(($persentage_answer >= $this->lowperformance_above_percentage) && ($persentage_answer<=$this->lowperformance_percentage))		   
              {
              if($persentage_answer!=0 && $overallPerformance["maxWrong"]!=0)
              {
              $arrForFetchFinalForSorting[$valueQcodeSet] = $persentage_answer;
              $arrForFetchFinal[$valueQcodeSet] = array("right_answer"=>$persentage_answer,"wrong_answer"=>$overallPerformance["maxWrong"],"overall_student"=>$overallPerformance[total],"class_used"=>$arrGetClassFinal["class_used"],"class_not_used"=>$arrGetClassFinal["class_not_used"],"no_of_schools"=>$counterSchools);
              }
              }
             */      //$counter_set = $counter_set + 1;

            $persentage_answer = 0;
            if ($overallPerformance["total"] == 0)
                $persentage_answer = 0;
            else
                $persentage_answer = round($overallPerformance["correct_answer"] * 100 / $overallPerformance["total"], 1);

            if ($persentage_answer >= $this->lowperformance_above_percentage && $persentage_answer <= $this->lowperformance_percentage && $persentage_answer != 0) {
                $arrForFetchFinalForSorting[$valueQcodeSet] = $persentage_answer;
                $arrForFetchFinal[$valueQcodeSet] = array("right_answer" => $persentage_answer, "wrong_answer" => $overallPerformance["maxWrong"], "overall_student" => $overallPerformance[total], "underperforming_reqids" => $overallPerformance["req_ids_underPerforming"], "class_used" => $arrGetClassFinal["class_used"], "class_not_used" => $arrGetClassFinal["class_not_used"]);
            }
        }

        $arrRetArrFinal = array();
        asort($arrForFetchFinalForSorting);
        foreach ($arrForFetchFinalForSorting as $keyForFetchFinalForSorting => $valueForFetchFinalForSorting) {
            $counter_set = $counter_set + 1;
            $this->populateQuestion($connid, $keyForFetchFinalForSorting);

            $arrRetArrFinal[$keyForFetchFinalForSorting]["qcode"] = $keyForFetchFinalForSorting;
            $arrRetArrFinal[$keyForFetchFinalForSorting]["subjectno"] = $arrSubject[$this->subjectno];
            $getSSTName = $this->getSSTNameByCode($this->sub_subtopic_code, $connid);
            $arrRetArrFinal[$keyForFetchFinalForSorting]["SST_name"] = $getSSTName;
            $arrRetArrFinal[$keyForFetchFinalForSorting]["right_answer"] = $arrForFetchFinal[$keyForFetchFinalForSorting]["right_answer"];
            $arrRetArrFinal[$keyForFetchFinalForSorting]["wrong_answer"] = $arrForFetchFinal[$keyForFetchFinalForSorting]["wrong_answer"];
            $arrRetArrFinal[$keyForFetchFinalForSorting]["overall_student"] = $arrForFetchFinal[$keyForFetchFinalForSorting]["overall_student"];
            $arrRetArrFinal[$keyForFetchFinalForSorting]["class_used"] = $arrForFetchFinal[$keyForFetchFinalForSorting]["class_used"];
            $arrRetArrFinal[$keyForFetchFinalForSorting]["class_not_used"] = $arrForFetchFinal[$keyForFetchFinalForSorting]["class_not_used"];
            $arrRetArrFinal[$keyForFetchFinalForSorting]["no_of_schools"] = $arrForFetchFinal[$keyForFetchFinalForSorting]["no_of_schools"];
            $arrRetArrFinal[$keyForFetchFinalForSorting]["req_ids_underPerforming"] = $arrForFetchFinal[$keyForFetchFinalForSorting]["underperforming_reqids"];

            $flag_mc = 0;
            if ($this->misconception == 1) {
                $flag_mc = 1;
            }
            $set_flag = "N";
            if ($flag_mc == 1) {
                $set_flag = "Y";
            }
            $arrRetArrFinal[$keyForFetchFinalForSorting]["mc_flag"] = $set_flag;
        }
        return $arrRetArrFinal;
    }

    function getClassesForLowPerformance($connid, $class_set, $subject_set) {
        if ($this->subjectno != "")
            $condition .= "AND a.subject = '$subject_set'";

        $arrRet = array();
        $arrSchoolsUsed = array();
        $arrRequestId = array();
        $arrIgnore = array();
        $arrReturn = array();
        $usedIn = "";
        $requestId = "";
        $usednotin = "";
        $query = "SELECT a.id,a.class,a.scoring_date,a.schoolCode FROM da_testRequest a, da_paperDetails b WHERE type='actual' AND schoolCode<>2387554 
       			  AND a.paper_code=b.papercode AND find_in_set(" . $this->qcode . ",qcode_list)>0 AND version=1 $condition";

        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $condition_check = 1;
            if ($this->lowperformance_startdate != "") {
                if (($row["scoring_date"] >= date('Y-m-d', strtotime($this->lowperformance_startdate)))) {
                    //echo $row["scoring_date"];
                    $condition_check = 1;
                } else {
                    $condition_check = 0;
                }
            }
            if ($this->lowperformance_enddate != "" && $condition_check == 1) {
                if (($row["scoring_date"] <= date('Y-m-d', strtotime($this->lowperformance_enddate)))) {
                    //echo $row["scoring_date"];
                    $condition_check = 1;
                } else {
                    $condition_check = 0;
                }
            }



            if ($condition_check == 1) {
                if ($class_set != "ALL") {
                    if ($class_set == $row['class']) {
                        $arrRet[$row['class']] = $row['class'];
                        $arrSchoolsUsed[$row["schoolCode"]] = $row["schoolCode"];
                        $arrRequestId[$row["id"]] = $row["id"];
                    } else {
                        $arrIgnore[$row['class']] = $row['class'];
                    }
                } else {
                    $arrRet[$row['class']] = $row['class'];
                    $arrSchoolsUsed[$row["schoolCode"]] = $row["schoolCode"];
                    $arrRequestId[$row["id"]] = $row["id"];
                }
            } else {
                if ($row["scoring_date"] != '0000-00-00') {
                    $arrIgnore[$row['class']] = $row['class'];
                }
            }
        }

        asort($arrRet);
        asort($arrIgnore);
        $diff_arr = array();
        $diff_arr = array_diff($arrIgnore, $arrRet);
        $usedIn = implode(", ", $arrRet);
        $usednotin = implode(", ", $diff_arr);

        $schoolCodeStr = "";
        if (isset($arrSchoolsUsed) && count($arrSchoolsUsed) > 0) {
            $schoolCodeStr = implode(",", $arrSchoolsUsed);
        }

        $requestIdArr = "";
        if (isset($arrRequestId) && count($arrRequestId) > 0) {
            $requestIdArr = implode(",", $arrRequestId);
        }

        $arrReturn["class_used"] = $usedIn;
        $arrReturn["class_not_used"] = $usednotin;
        $arrReturn["schoolCode"] = $schoolCodeStr;
        $arrReturn["request_id"] = $requestIdArr;
        return $arrReturn;
    }

    function getDataLowPerformanceSchoolList($arrSchools, $arrRequestId, $connid) {
        $arrRet = array();
        $schoolCode = "";
        $schoolCode = implode(",", $arrSchools);
        $requestId = "";
        $requestId = implode(",", $arrRequestId);

        if ($schoolCode != "" && $requestId != "") {
            $query = "SELECT schoolCode,id FROM da_testRequest WHERE schoolCode IN($schoolCode) AND id IN($requestId)";
            $dbquery = new dbquery($query, $connid);
            while ($result = $dbquery->getrowarray()) {
                $arrRet[$result["schoolCode"]][$result["id"]] = $result["id"];
            }
        }
        return $arrRet;
    }

    function getSchoolDetailsLowPerformance($schoolCode, $valArr, $connid) {
        global $constant_da;
        $arrRet = array();
        //$query = "SELECT schoolname,board FROM schools WHERE schoolno = '$schoolCode'";

        $reqId_str = implode(",", $valArr);

        $query = "SELECT schools.schoolname, da_orderMaster.board 
				 FROM {$constant_da(COMMON_DATABASE)}.schools 
				 LEFT JOIN da_testRequest ON schools.schoolno = da_testRequest.schoolCode 
				 LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster ON da_testRequest.schoolCode = da_orderMaster.schoolCode AND da_testRequest.year = da_orderMaster.year 
				 WHERE da_testRequest.id in('" . $reqId_str . "')";
        //	echo "$query ";
        $dbquery = new dbquery($query, $connid);
        while ($result = $dbquery->getrowarray()) {
            $arrRet["schoolname"] = $result["schoolname"];
            $arrRet["board"] = $result["board"];
        }

        return $arrRet;
    }

    function getQuestionPerformanceLowPerformanceSchoolWisePopup($qcode, $request_id, $connid) {
        $this->qcode = $qcode;
        $query_app_dt = "select approved_date FROM da_testRequest  where id ='" . $request_id . "' ";
        $query_apprv = new dbquery($query_app_dt, $connid);
        $appDt_row = $query_apprv->getrowarray();

        $this->correct_answer = "";

        $lstMod_query = "SELECT lastModified, correct_answer from da_questions where qcode ='" . $qcode . "' ";
        $lstMod_dbquery = new dbquery($lstMod_query, $connid);
        $lstMod_row = $lstMod_dbquery->getrowarray();

        $this->correct_answer = $lstMod_row["correct_answer"];

        //	print "Modified |".$lstMod_row["lastModified"]." APP DATE ".$appDt_row["approved_date"]." ";
        $resultArr = $this->GetQueTableAndVersion($connid, $qcode, $appDt_row["approved_date"], $lstMod_row["lastModified"]);

        if (count($resultArr) > 0) {
            if ($resultArr["correct_answer"] != "")
                $this->correct_answer = $resultArr["correct_answer"];
        }

        if ($request_id != "" && $request_id != 0) {
            $condition = " AND request_id IN ($request_id) ";
            $response_count[usedin] = sizeof(explode(",", $request_id));
        } else {
            $response_count["usedin"] = 0;
            $response_count["total"] = 0;
            $response_count["invalid"] = 0;
            return $response_count;
        }

        if ($condition == "")
            exit;
        $paperCodeArray = array();
        $query = "SELECT a.id,paper_code,exam_code FROM da_testRequest a, da_examDetails b WHERE a.id=b.request_id $condition";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            if (!in_array($row[paper_code], $paperCodeArray))
                $paperCodeArray[] = $row[paper_code];
            $requestIDArray[$row[id]][paper_code] = $row[paper_code];
            $requestIDArray[$row[id]][exam_code][] = $row[exam_code];
        }

        $questionPositions = $this->getQuestionPosition($connid, $paperCodeArray);
        //echo "<pre>"; print_r($requestIDArray); echo "</pre>";
        //echo "<pre>"; print_r($questionPositions); echo "</pre>";

        for ($i = 1; $i <= 75; $i++)
            $select.="A" . $i . ",";
        $validResponse = array("A", "B", "C", "D");
        foreach ($requestIDArray as $rid => $requestDetails) {
            $paper_code = $requestDetails[paper_code];
            foreach ($requestDetails[exam_code] as $examcodes) {
                /* $query="SELECT $select paperversion FROM da_response WHERE examcode='$examcodes' AND DATE(last_modified) >= '$startFrom' AND DATE(last_modified) <= '$endFrom' ORDER BY paperversion"; */
                $query = "SELECT $select paperversion FROM da_response WHERE examcode='$examcodes' ORDER BY paperversion";
                $dbquery = new dbquery($query, $connid);
                while ($row = $dbquery->getrowarray()) {
                    $position = $questionPositions[$paper_code][$row[paperversion]];
                    $student_response = $row["A" . $position];
                    $response_count[total] ++;
                    if (in_array($student_response, $validResponse)) {
                        $response_count[$student_response] ++;
                    } else {
                        $response_count[invalid] ++;
                    }
                }
            }
        }
        //echo "<pre>"; print_r($response_count); echo "</pre>";
        return $response_count;
    }

    #######################For Low Performance###########################

    function viewGroupPassage($subjectno, $class, $connid) {
        global $constant_da;
        if ($class != "")
            $condition = "AND a.class = $class";
        else
            $condition = "";

        $returnData = array();
        $query = "SELECT DISTINCT(g.group_id), trim(g.groupname) as groupname, g.group_text
				  FROM da_groupMaster as g
				  JOIN da_questions as a ON g.group_id=a.group_id
				  WHERE g.subjectno='" . $subjectno . "' $condition ORDER BY trim(g.groupname)";
        $dbquery = new dbquery($query, $connid);
        if ($dbquery->numrows() > 0) {
            while ($result = $dbquery->getrowarray()) {
                $returnData["GROUP"][$result["group_id"]] = array("group_text" => $result["group_text"],
                    "groupname" => $result["groupname"]);
            }
        }

        $query1 = "SELECT DISTINCT(a.passage_id), trim(a.passage_name) as passage_name, a.description
				   FROM {$constant_da(COMMON_DATABASE)}.qms_passage as a
				   WHERE a.subjectno='" . $subjectno . "' $condition ORDER BY trim(a.passage_name) ";
        $dbquery1 = new dbquery($query1, $connid);
        if ($dbquery1->numrows() > 0) {
            while ($result1 = $dbquery1->getrowarray()) {
                $returnData["PASSAGE"][$result1["passage_id"]] = array("passage_text" => $result1["description"],
                    "passage_name" => $result1["passage_name"]);
            }
        }
        return $returnData;
    }

    function searchQuestionForGroupPassage($keyword, $connid) {
        global $constant_da;
        $this->setpostvars();

        if ($this->action == 'SearchData') {

            $condition = "";
            $arrRet = array();
            if ($this->class != "" && $this->class > 0)
                $condition.=" AND da_questions.class = '" . $this->class . "' ";
            if ($this->subjectno != "" && $this->subjectno > 0)
                $condition.=" AND da_questions.subjectno = '" . $this->subjectno . "' ";
            if (isset($this->passage_id) && $this->passage_id > 0)
                $condition.=" AND da_questions.passage_id = '" . $this->passage_id . "' ";
            if (isset($this->clsdagroup->group_id) && $this->clsdagroup->group_id > 0)
                $condition.=" AND da_questions.group_id = '" . $this->clsdagroup->group_id . "' ";

            if ($keyword != "" && ($this->searchqcode == "" || $this->searchqcode == 0)) {

                $srch_query = "SELECT da_questions.group_id,da_questions.passage_id 
							  FROM da_questions
							  LEFT JOIN {$constant_da(COMMON_DATABASE)}.qms_passage ON da_questions.passage_id = qms_passage.passage_id
							  LEFT JOIN da_groupMaster ON da_questions.group_id = da_groupMaster.group_id 	
							  WHERE 
							  (qms_passage.passage_name LIKE '%" . $keyword . "%' 
							   OR 
							   qms_passage.description LIKE '%" . $keyword . "%' 
							   OR 
							   da_groupMaster.groupname LIKE '%" . $keyword . "%' 
							   OR 
							   da_groupMaster.group_text LIKE '%" . $keyword . "%')
							  $condition
							  GROUP BY da_questions.group_id,da_questions.passage_id";
                $srch_dbqry = new dbquery($srch_query, $connid);
            } else if ($keyword == "" && $this->searchqcode != "" && $this->searchqcode != 0) {

                $srch_query = "SELECT group_id, passage_id FROM da_questions WHERE da_questions.qcode = '" . $this->searchqcode . "' $condition GROUP BY da_questions.group_id,da_questions.passage_id";
                $srch_dbqry = new dbquery($srch_query, $connid);
            } else if ($keyword != "" && $this->searchqcode != "" && $this->searchqcode != 0) {

                $srch_query = "SELECT qms_passage.passage_id, da_groupMaster.group_id FROM da_questions
							   LEFT JOIN {$constant_da(COMMON_DATABASE)}.qms_passage ON da_questions.passage_id = qms_passage.passage_id
							   LEFT JOIN da_groupMaster ON da_questions.group_id = da_groupMaster.group_id
							   WHERE
							   (qms_passage.passage_name LIKE '%" . $keyword . "%'
							   OR
							   qms_passage.description LIKE '%" . $keyword . "%'
							   OR 
							   da_groupMaster.groupname LIKE '%" . $keyword . "%'
							   OR
							   da_groupMaster.group_text LIKE '%" . $keyword . "%')
							   AND da_questions.qcode = '" . $this->searchqcode . "' $condition
							   GROUP BY da_questions.group_id,da_questions.passage_id";
                $srch_dbqry = new dbquery($srch_query, $connid);
            } else {

                $srch_query = "SELECT da_questions.group_id, da_questions.passage_id 
							   FROM da_questions WHERE 1=1 $condition GROUP BY da_questions.group_id, da_questions.passage_id";
                $srch_dbqry = new dbquery($srch_query, $connid);
            }

            if ($srch_dbqry->numrows() > 0) {

                $group_ids = "";
                $passage_ids = "";

                while ($srch_row = $srch_dbqry->getrowarray()) {

                    if ($srch_row['group_id'] != 0)
                        $arrGP["GROUP"][] = $srch_row['group_id'];
                    if ($srch_row['passage_id'] != 0)
                        $arrGP["PASSAGE"][] = $srch_row['passage_id'];
                }

                if (is_array($arrGP["GROUP"]) && count($arrGP["GROUP"]) > 0)
                    $group_ids = implode(',', $arrGP["GROUP"]);

                if (is_array($arrGP["PASSAGE"]) && count($arrGP["PASSAGE"]) > 0)
                    $passage_ids = implode(',', $arrGP["PASSAGE"]);

                if ($passage_ids != "" && $group_ids != "") {
                    $grp_pssg_srch_condi = "(da_questions.group_id IN (" . $group_ids . ") OR da_questions.passage_id IN (" . $passage_ids . "))";
                } else if ($passage_ids != "" && $group_ids == "") {
                    $grp_pssg_srch_condi = "da_questions.passage_id IN (" . $passage_ids . ")";
                } else if ($passage_ids == "" && $group_ids != "") {
                    $grp_pssg_srch_condi = "da_questions.group_id IN (" . $group_ids . ")";
                } else if (isset($this->searchqcode) && $this->searchqcode != 0) {
                    $grp_pssg_srch_condi = "da_questions.qcode = $this->searchqcode";
                }

                $query = "SELECT da_questions.qcode, da_questions.question, da_questions.class, da_questions.subjectno, da_questions.sub_subtopic_code, da_questions.optiona, da_questions.optionb, da_questions.optionc, da_questions.optiond, da_questions.correct_answer, da_questions.status, da_questions.misconception, da_questions.group_id, da_questions.passage_id, da_subSubTopicMaster.description as subsubtopic, qms_passage.passage_name,
							     qms_passage.class as qmsclass
						  FROM da_questions
						  LEFT JOIN da_subSubTopicMaster ON da_questions.sub_subtopic_code = da_subSubTopicMaster.sub_subtopic_code
						  LEFT JOIN {$constant_da(COMMON_DATABASE)}.qms_passage ON da_questions.passage_id = qms_passage.passage_id
			         	  WHERE $grp_pssg_srch_condi $condition";
                $query.=" ORDER BY da_questions.group_id,da_questions.qcode";
                $dbquery = new dbquery($query, $connid);

                while ($row = $dbquery->getrowarray()) {
                    $arrRet[$row["qcode"]] = array("question" => $row["question"],
                        "class" => $row["class"],
                        "subjectno" => $row["subjectno"],
                        "subsubtopic" => $row["subsubtopic"],
                        "sub_subtopic_code" => $row["sub_subtopic_code"],
                        "optiona" => $row["optiona"],
                        "optionb" => $row["optionb"],
                        "optionc" => $row["optionc"],
                        "optiond" => $row["optiond"],
                        "correct_answer" => $row["correct_answer"],
                        "status" => $row["status"],
                        "misconception" => $row["misconception"],
                        "passage_name" => $row["passage_name"],
                        "group_id" => $row["group_id"],
                        "passage_id" => $row["passage_id"],
                        "psg_class" => $row["qmsclass"]);
                }
            } else
                $this->msg = "No Data Found !";
        }
        return $arrRet;
    }

    ##################################Dropped Question Display List###########################

    function getDroppedQuestionWithRequestId($connid) {
        global $constant_da;
        $this->setpostvars($connid);
        $this->setgetvars();

        if ($this->action == "SearchDroppedQuestions") {
            $arrRet = array();
            $condition = "";
            if ($this->class != "") {
                $condition .= " AND class = '$this->class'";
            }
            if ($this->subjectno != "") {
                $condition .= " AND subject = '$this->subjectno'";
            }
            $query = "SELECT * FROM da_testRequest WHERE (request_date >= '" . date("Y-m-d", strtotime($this->droppedstartdate)) . "' AND request_date <= '" . date("Y-m-d", strtotime($this->droppedenddate)) . "') $condition";
            $dbquery = new dbquery($query, $connid);
            while ($result = $dbquery->getrowarray()) {
                $dropped_questions = $result["dropped_questions"];
                $request_id = $result["id"];
                $schoolCode = $result["schoolCode"];
                if ($schoolCode != "") {
                    $query_schoolname = "SELECT schoolname FROM {$constant_da(COMMON_DATABASE)}.schools WHERE schoolno = '$schoolCode'";
                    $dbquery_schoolname = new dbquery($query_schoolname, $connid);
                    while ($result_schoolname = $dbquery_schoolname->getrowarray()) {
                        $schooolname = $result_schoolname["schoolname"];
                    }
                }
                if ($dropped_questions != "") {
                    $arrQuestions = array();
                    $arrQuestions = explode(",", $dropped_questions);
                    foreach ($arrQuestions as $keyQuestions => $valueQuestions) {
                        $sstName = "";
                        $query_sstfetch = "SELECT a.description,b.sub_subtopic_code FROM da_subSubTopicMaster a,da_questions b WHERE a.sub_subtopic_code = b.sub_subtopic_code  AND b.qcode = '$valueQuestions'";
                        $dbquery_sstfetch = new dbquery($query_sstfetch, $connid);
                        while ($result_sstfetch = $dbquery_sstfetch->getrowarray()) {
                            $sstName = $result_sstfetch["description"];
                        }

                        $query_reasons = "SELECT * FROM da_dropQuestions WHERE request_id = '$request_id' AND qcode = '$valueQuestions'";
                        $dbquery_reasons = new dbquery($query_reasons, $connid);
                        while ($result_reasons = $dbquery_reasons->getrowarray()) {
                            $frequency_counter = 0;
                            $query_frequency = "SELECT count(a.id) as cnt FROM da_testRequest a,da_dropQuestions b WHERE a.id = b.request_id AND b.qcode = '$valueQuestions' AND (a.request_date >= '" . date("Y-m-d", strtotime($this->droppedstartdate)) . "' AND a.request_date <= '" . date("Y-m-d", strtotime($this->droppedenddate)) . "') $condition";
                            $dbquery_frequency = new dbquery($query_frequency, $connid);
                            while ($result_frequency = $dbquery_frequency->getrowarray()) {
                                $frequency_counter = $result_frequency["cnt"];
                            }
                            $arrRet[$request_id][$valueQuestions]["reason_id"] = $result_reasons["reason_id"];
                            $arrRet[$request_id][$valueQuestions]["schoolname"] = $schooolname;
                            $arrRet[$request_id][$valueQuestions]["sst"] = $sstName;
                            $arrRet[$request_id][$valueQuestions]["frequency"] = $frequency_counter;
                            if ($result_reasons["reason_id"] == 5) {
                                $arrRet[$request_id][$valueQuestions]["other"] = $result_reasons["other_reason"];
                            } else {
                                $arrRet[$request_id][$valueQuestions]["other"] = "";
                            }
                        }
                    }
                }
            }
        }
        return $arrRet;
    }

    ##################################Dropped Question Display List###########################
    #################################For questions last modification date fetch##############

    function getlastModifiedDateForQcode($connid, $qcode) {
        $last_modified_date = "";
        $query = "SELECT lastModified FROM da_questions WHERE qcode = '$qcode'";
        $dbquery = new dbquery($query, $connid);
        while ($result = $dbquery->getrowarray()) {
            $last_modified_date = $result["lastModified"];
        }
        return $last_modified_date;
    }

    #################################For questions last modification date fetch##############
    ################################For version fetch array #################################

    function getVersionsOfQuestions($connid, $qcode) {
        $arrRet = array();
        //change order by from submit_date to orderby version to display version list in correct order in question performance page
        $query = "SELECT question_maker, submit_date, version FROM da_questions_versions WHERE qcode=" . $qcode . " ORDER BY version DESC";
        $dbquery = new dbquery($query, $connid);
        while ($result = $dbquery->getrowarray()) {
            $arrRet[$result["version"]] = $result["version"];
        }
        return $arrRet;
    }

    ################################For version fetch array #################################
    ################################For Copy Availability####################################

    function searchQuestionsCopyAvailable($connid, $tablename = "da_questions", $paging = "") {
        $this->setpostvars();
        $this->setgetvars();

        $this->clspaging->setgetvars();
        $this->clspaging->setpostvars();

        $qcodes_list = "";

        $arrRet = array();

        if ($this->action == "SearchDataCopyAvailablity") {

            $arrQcodes = array();

            $query_paper_details = "SELECT a.qcode_list FROM da_paperDetails a,da_testRequest b WHERE a.papercode = b.paper_code AND a.qcode_list != '' AND a.version = '1'";

            if ($this->startDateCopyAvailable != "") {
                $startFrom = date('Y-m-d', strtotime($this->startDateCopyAvailable));
                $query_paper_details.=" AND b.approved_date >= '" . $startFrom . "' ";
            }

            if ($this->endDateCopyAvailable != "") {
                $endFrom = date('Y-m-d', strtotime($this->endDateCopyAvailable));
                $query_paper_details.=" AND b.approved_date <= '" . $endFrom . "' ";
            }

            $dbquery_paper_details = new dbquery($query_paper_details, $connid);
            while ($row_paper_details = $dbquery_paper_details->getrowarray()) {
                $arrQcodesFinal = array();
                if ($row_paper_details["qcode_list"] != "") {
                    $arrQcodesFinal = explode(",", $row_paper_details["qcode_list"]);
                    if (isset($arrQcodesFinal) && count($arrQcodesFinal) > 0) {
                        foreach ($arrQcodesFinal as $keyQcodesFinal => $valueQcodesFinal) {

                            if ($this->class != "" || $this->subjectno != "") {
                                $query_check = "SELECT qcode FROM da_questions WHERE qcode = '$valueQcodesFinal' AND parent_qcode = '0'";
                                if ($this->class != "" && $this->class > 0)
                                    $query_check.=" AND class = '" . $this->class . "' ";

                                if ($this->subjectno != "" && $this->subjectno > 0) {
                                    $query_check.=" AND subjectno IN (" . $this->subjectno . ") ";
                                }
                                $dbquery_check = new dbquery($query_check, $connid);
                                while ($row_check = $dbquery_check->getrowarray()) {
                                    if ($row_check["qcode"] == $valueQcodesFinal) {
                                        $arrQcodes[$valueQcodesFinal] = $valueQcodesFinal;
                                    }
                                }
                            } else {
                                $arrQcodes[$valueQcodesFinal] = $valueQcodesFinal;
                            }
                        }
                    }
                }
            }
            if (isset($arrQcodes) && count($arrQcodes) > 0) {
                asort($arrQcodes);

                $qcode_list = "";
                $qcode_list = implode(",", $arrQcodes);

                $arrFinalFetchQcodes = array();

                $query_parent_qcode = "select count(a.qcode),a.parent_qcode,0,b.qcode FROM da_questions b LEFT JOIN da_questions a ON a.parent_qcode=b.qcode WHERE b.qcode IN ($qcode_list) GROUP BY b.qcode HAVING count(a.qcode) = 0";
                //$query_parent_qcode = "select count(*),parent_qcode FROM da_questions a WHERE a.parent_qcode IN ($qcode_list) GROUP BY a.parent_qcode HAVING count(*) > 0";								

                $this->clspaging->numofrecs = getQueryCount($query_parent_qcode);

                if ($this->clspaging->numofrecs > 0) {
                    $this->clspaging->getcurrpagevardb();
                }

                if ($paging == "Y")
                    $query_parent_qcode .= $this->clspaging->limit;

                $dbquery_parent_qcode = new dbquery($query_parent_qcode, $connid);
                while ($row_parent_qcode = $dbquery_parent_qcode->getrowarray()) {
                    $arrFinalFetchQcodes[$row_parent_qcode["qcode"]] = $row_parent_qcode["qcode"];
                }

                if (isset($arrFinalFetchQcodes) && count($arrFinalFetchQcodes) > 0) {

                    $qcode_list_final = "";
                    $qcode_list_final = implode(",", $arrFinalFetchQcodes);

                    $query_final = "SELECT a.*,b.description as subtopic,c.description as topic, d.description as subsubtopic, a.sub_subtopic_code FROM " . $tablename . " a, da_subSubTopicMaster d, da_subtopicMaster b,da_topicMaster c
WHERE a.sub_subtopic_code=d.sub_subtopic_code AND d.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code AND a.qcode IN ($qcode_list_final)";

                    /* $query = "select a.*,b.description as subtopic,c.description as topic, d.description as subsubtopic, a.sub_subtopic_code,(SELECT count(z.qcode) FROM da_questions z WHERE a.parent_qcode = z.qcode) FROM ".$tablename." a, da_subSubTopicMaster d, da_subtopicMaster b,da_topicMaster c
                      WHERE a.sub_subtopic_code=d.sub_subtopic_code AND d.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code AND (SELECT count(z.qcode) FROM da_questions z WHERE a.parent_qcode = z.qcode)=0";

                      if($this->class != "" && $this->class > 0)
                      $query.=" AND a.class = '".$this->class."' ";

                      if($this->subjectno != "" && $this->subjectno > 0)
                      {
                      $query.=" AND a.subjectno IN (".$this->subjectno.") ";
                      } */

                    $query_final.=" ORDER BY a.qcode";

                    $dbquery_final = new dbquery($query_final, $connid);
                    while ($row_final = $dbquery_final->getrowarray()) {
                        $arrRet[$row_final["qcode"]] = array("question" => $row_final["question"],
                            "class" => $row_final["class"],
                            "subjectno" => $row_final["subjectno"],
                            "topic" => $row_final["topic"],
                            "subtopic" => $row_final["subtopic"],
                            "subsubtopic" => $row_final["subsubtopic"],
                            "sub_subtopic_code" => $row_final["sub_subtopic_code"],
                            "optiona" => $row_final["optiona"],
                            "optionb" => $row_final["optionb"],
                            "optionc" => $row_final["optionc"],
                            "optiond" => $row_final["optiond"],
                            "correct_answer" => $row_final["correct_answer"],
                            "question_maker" => $row_final["question_maker"],
                            "status" => $row_final["status"],
                            "first_alloted" => $row_final["first_alloted"],
                            "current_alloted" => $row_final["current_alloted"],
                            "skill" => $row_final["skill"],
                            "misconception" => $row_final["misconception"],
                            "tag_ques" => $row_final["tag_ques"],
                            "question_testing" => $row_final["question_testing"],
                            "approver2_status" => $row_final["approver2_status"],
                            "parent_qcode" => $row_final["parent_qcode"],
                            "source" => $row_final["source"],
                            "ips_status" => $row_final["ips_status"],
                            "group_id" => $row_final["group_id"],
                            "passage_id" => $row_final["passage_id"]);
                    }
                }
            }
        }



        //print_r($arrRet);
        return $arrRet;
    }

    ################################For Copy Availability####################################
    ################################For Dropped Count#######################################

    function getDroppedQcodeCount($qcode, $connid) {
        $counter = 0;
        $query = "SELECT distinct request_id FROM da_dropQuestions WHERE qcode = '$qcode'";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $counter++;
        }
        return $counter;
    }

    function getQuestionDroppedList($qcode, $connid) {
        global $constant_da;
        $arrRet = array();
        $query = "SELECT a.id,a.schoolCode,a.class,a.subject,b.reason_id,b.other_reason FROM da_testRequest a,da_dropQuestions b WHERE a.id = b.request_id AND b.qcode = '$qcode'";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $schoolCode = "";
            $query_schools = "SELECT schoolname FROM {$constant_da(COMMON_DATABASE)}.schools WHERE schoolno = '" . $row["schoolCode"] . "'";
            $dbquery_schools = new dbquery($query_schools, $connid);
            while ($row_schools = $dbquery_schools->getrowarray()) {
                $schoolCode = $row_schools["schoolname"];
            }
            $arrRet[$row["id"]] = array("schoolName" => $schoolCode, "class" => $row["class"], "subject" => $row["subject"], "reason_id" => $row["reason_id"]);
            if ($row["reason_id"] == 5) {
                $arrRet[$row["id"]]["other"] = $row["other_reason"];
            } else {
                $arrRet[$row["id"]]["other"] = "";
            }
        }
        return $arrRet;
    }

    ################################For Dropped Count#######################################
    // Task S-01009 Adding Source Type in Edit Question page Naveen

    function getSourceType($connid) {

        $qcode = $this->qcode;
        $source = $this->source;

        $otherQcode = "";
        if ($source != "") {
            if ($source == "ASSET") {
                $comment = "";
                $otherQcode = "";
                $query_AssetQcode = "SELECT comment FROM da_comments WHERE qcode = '" . $qcode . "' AND comment LIKE '%Added from ASSET%'";
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
            } else if ($source == "TG") {
                $comment = "";
                $otherQcode = "";
                $query_AssetQcode = "SELECT comment FROM da_comments WHERE qcode = '" . $qcode . "' AND comment LIKE '%Added from TG%'";
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
            } else if ($source == "CQB") {
                $comment = "";
                $otherQcode = "";
                $query_AssetQcode = "SELECT comment FROM da_comments WHERE qcode = '" . $qcode . "' AND comment LIKE '%Added from Common Ques Bank%'";
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


        return $otherQcode;
    }

    function assetQuestions($qcode_set, $connid) {
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

    // Task S-01009 Adding Source Type
    // getting the last test date 
    function getApprovedDateRequest($request_id, $connid) {
        $approved_date = "";
        $requesDatArr = array();


        $query = "SELECT approved_date, test_date FROM da_testRequest WHERE id ='" . $request_id . "' ";
        $dbqry = new dbquery($query, $connid);
        while ($result = $dbqry->getrowarray()) {
            $requestDatArr["approved_date"] = $result["approved_date"];
            $requestDatArr["test_date"] = $result["test_date"];
        }

        return $requestDatArr;
    }

    // get correct answer based on version used in paper
    function getCorrectAnswerBasedonVersionUsedinRequest($approved_date, $connid) {
        $correct_answer = "";
        if ($this->lastModified != "") {
            $mod_date = new DateTime($this->lastModified);
            $app_date = new DateTime($approved_date);

            if ($mod_date > $app_date) {
                $query = "SELECT correct_answer FROM da_questions_versions where qcode = " . $this->qcode . " AND submit_date <= '" . $approved_date . "' AND status = 3 ORDER BY submit_date DESC LIMIT 1 ";
                $dbqry = new dbquery($query, $connid);
                while ($result = $dbqry->getrowarray()) {
                    $correct_answer = $result["correct_answer"];
                }
            }
        }

        return $correct_answer;
    }

    // function to get performance per request id for lowperformance page , based on question version used in that request
    function getPerformanceLowBasedQuesVersion($request_overallPerformance, $below_percent = "", $above_percent = "", $connid) {
        $correct_answer = "";
        $overallPerformance = array();
        $validAnswerArr = array("A", "B", "C", "D");
        $maxWrong = 0;
        $wrongAnswerCount = array();
        $standardDeviation = array();
        $percent_ans = "";
        $overallPerformance["display"] = 0;
        $overallPerformance["total"] = 0;
        $overallPerformance["correct_answer"] = 0;
        $overallPerformance["invalid"] = 0;
        $reqIdStr = "";

        $maxWrongPercent = 0;
        $WrongPercent = 0;

        foreach ($request_overallPerformance as $rid => $responseArr) {
            if ($responseArr["approved_date"] == "0000-00-00 00:00:00") {
                $correct_answer = $this->getCorrectAnswer();
            } else {
                $correct_answer = $this->getCorrectAnswerBasedonVersionUsedinRequest($responseArr["approved_date"], $connid);
            }

            if ($correct_answer == "")
                $correct_answer = $this->getCorrectAnswer();



            if ($responseArr["total"] == 0)
                $percent_ans = 0;
            else
                $percent_ans = round($responseArr[$correct_answer] * 100 / $responseArr["total"], 1);


            // if performance is less than criteria take total and calculate average
            //	if($percent_ans >=$below_percent && $percent_ans <= $above_percent && $percent_ans !=0)		
            // above if removed get all values and then check if percentage is between the range

            $overallPerformance["total"] +=$responseArr["total"];
            $overallPerformance["correct_answer"] += $responseArr[$correct_answer];
            $overallPerformance["invalid"]+=$responseArr["invalid"];
            $reqIdStr .=", $rid";

            foreach ($validAnswerArr as $keyvalidArr => $valuevalidArr) {
                if ($valuevalidArr != $correct_answer) {
                    if (!isset($overallPerformance[$valuevalidArr]))
                        $overallPerformance[$valuevalidArr] = 0;

                    $overallPerformance[$valuevalidArr] +=$responseArr[$valuevalidArr];

                    if ($responseArr["total"] != 0) {
                        $WrongPercent = round($responseArr[$valuevalidArr] * 100 / $responseArr["total"], 1);
                    }

                    if ($maxWrongPercent < $WrongPercent) {
                        $maxWrongPercent = $WrongPercent;
                    }
                }
            }
        }

        $overallPerformance["req_ids_underPerforming"] = ltrim($reqIdStr, ",");

        $overallPerformance["maxWrong"] = $maxWrongPercent;
        return $overallPerformance;
    }

    /**
     * Wrapper function over dbquery to get da_questions by question code(s).
     * Returns an array of questions by question code.   
     * @param mixed $connid connection id for connecting to db
     * @param mixed $qcodes can be a qcode string or an array of qcodes.
     * @param mixed $projection array for selecting fields from table.
     * @author HI
     * @created 1-3-14 11:00
     * @lastmodified 1-3-14 11:30 ~HI
     */
    function getQuestionByQcode($connid, $qcodes, $projection = array('qcode,correct_answer,lastModified,submit_date')) {
        $questions = array();
        $projectionStr = implode(',', $projection);

        if (is_array($qcodes)) {
            $qcodes = array_map('mysql_real_escape_string', $qcodes); 
            $query = 'SELECT ' . $projectionStr . ' from da_questions where qcode IN ("' . implode('", "', $qcodes) . '")';
        } else {
            $query = "SELECT $projectionStr from da_questions where qcode = '$qcodes'";
        }
        $dbquery = new dbquery($query, $connid);
        if ($dbquery->numrows() > 0) {
            while ($row = $dbquery->getrowassocarray()) {
                $questions[$row['qcode']] = $row;
            }
        }
        return $questions;
    }

    // function to get the request id where the correct answer of question is same current version correct ans 
    function getRequestIdToConsider($request_id, $connid) {
        $req_id = "";
        $query = "SELECT id, approved_date FROM da_testRequest where id in (" . $request_id . ") ";
        //echo "$query <br/> ";
        $dbquery = new dbquery($query, $connid);
        while ($row = $dbquery->getrowarray()) {
            $retArr = $this->GetQueTableAndVersion($connid, $this->qcode, $row["approved_date"], $this->lastModified);

            //echo " ID -".$row['id']." CA ".  $retArr['correct_answer']." <br/> ";
            if ($retArr["correct_answer"] == $this->correct_answer || $retArr["version"] == 0)
                $req_id .="," . $row["id"];
        }
        $req_id = ltrim($req_id, ",");
        return $req_id;
    }

    /* ASSET passage move functions 
      // function to get asset passage based questions to import into DA
      function getAssetPassageQues($sub,$cls,$round,$connid) {

      $paperCode = $sub.$cls.$round;
      // eng default subject 1
      $query = "SELECT paper_master.qcode, questions.question, questions.passageid, qms_passage.passage_name from paper_master INNER JOIN questions
      ON paper_master.qcode = questions.qcode
      INNER JOIN qms_passage ON questions.passageid=qms_passage.passage_id
      WHERE paper_master.papercode ='".$paperCode."' AND questions.passageid !='' ORDER BY questions.passageid ";
      echo "$query <br/><br/> ";
      $dbquery = new dbquery($query,$connid);
      while($row= $dbquery->getrowarray()) {

      $retArr[] = array('qcode'=>$row['qcode'],'question'=>$this->imageReplace($row['question'],$row['qcode']),'passageid'=>$row['passageid'],'passage_name'=>$row['passage_name']);
      }

      return $retArr;

      }

      // function to replace image with a link
      function imageReplace($question,$qcode) {

      $question=str_replace("^","'",$question);

      $pattern[0] = "/\[([a-z0-9_\.]*)\]/i";

      $replacement[0] = "[fig]";

      //$pattern[1] = "/\[([a-z0-9_\.]*)[ ]*,[ ]*(.*)\]/i";
      $pattern[1] = "/\[([a-z0-9_\.]*)[ ]*,[ ]*(.[^\]]*)\]/i";

      $replacement[1] = "[fig]";
      $pattern[2] = "/\<img[^>]*>/i";
      $replacement[2] = "[fig]";

      $question = preg_replace($pattern, $replacement, $question);
      return $question;

      }
     */

    // function to get second approver of the question and time
    function getSecondApprover($connid, $tablename = "da_comments") {
        $approver = "";
        $apprv_date = '';
        $query = "SELECT commenter,submitdate FROM " . $tablename . " WHERE qcode=" . $this->qcode . " AND comment='AUTO:Second Approved' AND type='AUTO' ORDER BY srno DESC";
        $dbquery = new dbquery($query, $connid);
        if ($line = $dbquery->getrowarray()) {
            $tmpArray = explode(".", $line['commenter']);
            $approver = $tmpArray[0];
            $apprv_date = $line['submitdate'];
        }
        return array($approver, $apprv_date);
    }

    function getTopicDetails($connid, $qcodes){
        $filter = null;
        if(is_array($qcodes)){
            $qcodesString = implode(",", $qcodes);
            if (empty($qcodesString)){
                $qcodesString = "''";
            }
            $filter = " AND da_questions.qcode IN ($qcodesString)";
        }elseif(is_string($qcodes)){
            $filter = " AND da_questions.qcode = '$qcodes'";
        }
        $topicQquery = "SELECT da_questions.qcode, da_questions.group_id, da_topicMaster.topic_code, da_topicMaster.description as topic_name, da_topicMaster.class, da_topicMaster.subjectno" 
                . " FROM da_subtopicMaster INNER JOIN da_topicMaster ON  da_subtopicMaster.topic_code = da_topicMaster.topic_code"
                . " INNER JOIN da_questions ON da_questions.subtopic_code = da_subtopicMaster.subtopic_code "
                . " WHERE 1 = 1 $filter";
        $dbquery = new dbquery($topicQquery, $connid);
        if(is_array($qcodes)){
            $topicDetails = array();
            while($topic = $dbquery->getrowassocarray()){
                $topicDetails[] = $topic;
            }	            
        }elseif(is_string($qcodes)){
            $topicDetails = $dbquery->getrowassocarray();
        }
        return $topicDetails;
    }
    
    /* function to get exam code wise question performance 
      function getQcodePerfExam($qcodeArr,$paper_code,$examcode,$connid){

      $paperCodeArray=array();
      $paperCodeArray[]=$paper_code;

      foreach($qcodeArr as $ky=>$qcod){
      $this->qcode= $qcode;
      $questionPositions[$qcod]=$this->getQuestionPosition($connid,$paperCodeArray);
      }
      //echo "<pre>"; print_r($requestIDArray); echo "</pre>";
      //echo "<pre>"; print_r($questionPositions); echo "</pre>";

      for ($i=1;$i<=75;$i++) $select.="A".$i.",";
      $validResponse=array("A","B","C","D");

      $query="SELECT $select paperversion FROM da_response WHERE examcode='$examcodes' ORDER BY paperversion";
      $dbquery = new dbquery($query,$connid);
      while($row=$dbquery->getrowarray()) {

      foreach($qcodeArr as $ky=>$qcode) {
      $position=$questionPositions[$qcode][$paper_code][$row["paperversion"]];
      $student_response=$row["A".$position];
      $response_count["total"]++;
      if(in_array($student_response,$validResponse)) {
      $response_count[$qcode][$student_response]++;
      } else {
      $response_count["invalid"]++;
      }
      }
      }

      echo "<pre>"; print_r($response_count); echo "</pre>";
      return $response_count;
      }
     */
}

?>