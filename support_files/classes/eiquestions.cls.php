<?php
class clsquestions
{
        var $class;
        var $subject;
        var $skill_id;
        var $question_code;
        var $description;
        var $option_a;
        var $option_b;
        var $option_c;
        var $option_d;
        var $correct_option;
        var $question_maker;
        var $entered_by;
        var $entered_dt;
        var $updated_by;
        var $updated_dt;
        var $action;
        var $error;
        var $search_teacher_name;
        var $search_teacher_email;
        var $search_teacher_city;
        var $search_qcode;
        var $from_date;
        var $to_date;
        var $numberofrecords;
        var $keyword;
        var $schoolcode;
                
        function clsquestions()
        {
                $this->class = 0;
                $this->subject = "";
                $this->skill_id = "";
                $this->question_code = "";
                $this->option_a = "";
                $this->option_b = "";
                $this->option_c = "";
                $this->option_d = "";
                $this->correct_option = "";
                $this->question_code = "";
                $this->question_maker = "";
                $this->entered_by = "";
                $this->entered_dt = '0000-00-00 00:00:00';
                $this->updated_by = "";
                $this->updated_dt = '0000-00-00 00:00:00';
                $this->action = "";
                $this->error = "";
                $this->search_teacher_email = "";
                $this->search_teacher_name = "";
                $this->search_qcode = "";
                $this->from_date = "0000-00-00";
                $this->to_date = "0000-00-00";
                $this->numberofrecords = 20;
                $this->keyword = "";
                $this->printquestions = "";
                $this->schoolcode = "";
                $this->search_teacher_city = "";
        }

        function setpostvars()
        {
                if(isset($_POST["clsquestions_description"])) $this->description = trim($_POST["clsquestions_description"]);
                if(isset($_POST["clsquestions_class"]))    $this->class = trim($_POST["clsquestions_class"]);
                if(isset($_POST["clsquestions_subject"]))  $this->subject = trim($_POST["clsquestions_subject"]);
                if(isset($_POST["clsquestions_skill"]))    $this->skill_id= trim($_POST["clsquestions_skill"]);
                if(isset($_POST["clsquestions_option_a"])) $this->option_a = trim($_POST["clsquestions_option_a"]);
                if(isset($_POST["clsquestions_option_b"])) $this->option_b = trim($_POST["clsquestions_option_b"]);
                if(isset($_POST["clsquestions_option_c"])) $this->option_c = trim($_POST["clsquestions_option_c"]);
                if(isset($_POST["clsquestions_option_d"])) $this->option_d = trim($_POST["clsquestions_option_d"]);
                if(isset($_POST["clsquestions_correctoption"])) $this->correct_option = trim($_POST["clsquestions_correctoption"]);
                if(isset($_POST["clsquestions_hdnaction"])) $this->action = trim($_POST["clsquestions_hdnaction"]);
                if(isset($_POST["clsquestions_hdnqcode"])) $this->question_code = trim($_POST["clsquestions_hdnqcode"]);
                if(isset($_POST["clsquestions_search_teacher_name"]))  $this->search_teacher_name = trim($_POST["clsquestions_search_teacher_name"]);
                if(isset($_POST["clsquestions_search_teacher_email"]))  $this->search_teacher_email = trim($_POST["clsquestions_search_teacher_email"]);
                if(isset($_POST["clsquestions_qcode"])) $this->search_qcode = trim($_POST["clsquestions_qcode"]);
                if(isset($_POST["clsquestions_from_date"]))    $this->from_date= trim($_POST["clsquestions_from_date"]);
                if(isset($_POST["clsquestions_to_date"]))    $this->to_date= trim($_POST["clsquestions_to_date"]);
                if(isset($_POST["clsquestions_numberofrecords"])) $this->numberofrecords = trim($_POST["clsquestions_numberofrecords"]);
                if(isset($_POST["clsquestions_keyword"]))    $this->keyword= trim($_POST["clsquestions_keyword"]);
                if(isset($_POST["clsquestions_qcodetakeprint"])) $this->printquestions = $_POST["clsquestions_qcodetakeprint"];
                if(isset($_POST["clsquestions_schoolcode"]))    $this->schoolcode= trim($_POST["clsquestions_schoolcode"]);
                if(isset($_POST["clsquestions_search_teacher_city"]))    $this->search_teacher_city= trim($_POST["clsquestions_search_teacher_city"]);
        }
        function setgetvars()
        {
                if(isset($_GET["question_code"])) $this->question_code = trim($_GET["question_code"]);
        }
        function pageAddquestionDetails($connid)
        {
                $this->setpostvars();
                //echo "Action is".$this->action;
                if($this->action == "SaveData")
                {
                        if($this->validation($connid))
                        {
                                $this->saveData($connid);
                        }
                }
                if($this->action == 'Edit')
                {
                        $this->retrieveQuestionDetailsByQcode($connid,$this->question_code);
                }
                if($this->action == 'Delete')
                {
                        $this->deleteData($connid,$this->question_code);
                }
        }
        function saveData($connid)
        {
                $query = "";
                $this->question_maker = $_SESSION["userid"];
                $teacher_name = $this->getTeacherDetailsByID($connid,$_SESSION["userid"]);
                if($teacher_name != '')
                {
                        $this->entered_by = $teacher_name;
                        if($this->question_code != 0 && $this->question_code != "")
                                $this->updated_by = $teacher_name;
                }
                 if($this->question_code == "")
                 {
                        $query = "INSERT INTO qmc_questions(description,class,subject,skill_id,option_a,".
                                 "option_b,option_c,option_d,correct_option,question_maker,entered_by,entered_dt) ".
                         //"VALUES('".$this->question_code."','".$this->description."','".$this->class."',".
                         "VALUES('".addslashes($this->description)."','".$this->class."',".
                         "'".$this->subject."','".$this->skill_id."','".addslashes($this->option_a)."',".
                                   "'".addslashes($this->option_b)."','".addslashes($this->option_c)."','".addslashes($this->option_d)."','".$this->correct_option."',".
                                   "'".$this->question_maker."','".addslashes($this->entered_by)."',NOW()) ";
                $dbquery = new dbquery($query,$connid);
                 }
                 elseif($this->question_code != "" && $this->question_code != 0)
                 {
                        $query = "UPDATE qmc_questions SET ".
                   "description = '".addslashes($this->description)."',".
                   "class = '".$this->class."',".
                   "subject = '".$this->subject."',".
                   "skill_id = '".$this->skill_id."',".
                   "option_a = '".addslashes($this->option_a)."',".
                   "option_b = '".addslashes($this->option_b)."',".
                   "option_c = '".addslashes($this->option_c)."',".
                   "option_d = '".addslashes($this->option_d)."',".
                   "correct_option = '".$this->correct_option."',".
                   "question_maker = '".$this->question_maker."',".
                   "modified_by = '".addslashes($this->updated_by)."',".
                   "modified_dt = NOW() ".
                   "WHERE qcode = '".$this->question_code."' ";
                         $dbquery = new dbquery($query,$connid);
                 }
        }
        function validation($connid)
        {
                $arrSubjects = $this->getSubjectsByUserid($connid,$_SESSION["userid"]);
                $arrSubjectsKeys = array_keys($arrSubjects);

                if($this->class == "")
                        $this->error["class"] = "Please enter the class";
                if($this->subject == "")
                        $this->error["subject"] = "Please enter the subject";
                if($this->question_code == "" && $this->subject != "" && in_array($this->subject,$arrSubjectsKeys))
                {
                        if($arrSubjects[$this->subject]["questions_count"] >= 6)
                                $this->error["subject_limit"] = "You cannot add more than 6 questions in a subject";
                }
                if($this->description == "")
                        $this->error["description"] = "Please enter the description";
                if($this->option_a == "")
                        $this->error["option_a"] = "Please enter the option A";
                if($this->option_b == "")
                        $this->error["option_b"] = "Please enter the option B";
                if($this->option_c == "")
                        $this->error["option_c"] = "Please enter the option C";
                if($this->option_d == "")
                        $this->error["option_d"] = "Please enter the option D";
                if($this->correct_option == "")
                        $this->error["correct_option"] = "Please enter the correct option";
                if($this->question_code == "" && $this->CheckDuplication($connid))
                        $this->error["duplicate"] = "This question has already been entered";

                if(is_array($this->error) && count($this->error) > 0)
                        return false;
                else
                        return true;
        }
        function getSkillsByClassAndSubject($connid,$class,$subject)
        {
                $arrRet = array();
                $query = "SELECT unique_skill_master.skillname as name,unique_skill_master.u_skill_no as id FROM
                rounda_skill,unique_skill_master WHERE rounda_skill.u_skill_no = unique_skill_master.u_skill_no
                AND rounda_skill.class = '".$class."' AND rounda_skill.subjectno = '".$subject."' ";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                                $arrRet[$row["id"]] = array("u_skill_no"=>$row["id"],
                                "skillname"=>$row["name"]);

                }
                return $arrRet;

        }
        function deleteData($connid,$qcode)
        {
                if($qcode != ""){
                        $this->insertIntoLog($connid,$qcode);
                        $this->deleteImages($connid,$qcode);
                        $query = "DELETE FROM qmc_questions WHERE qcode = '".$qcode."'";
                        $dbquery = new dbquery($query,$connid);
                }
        }
        function insertIntoLog($connid,$qcode)
        {
                $query = "INSERT INTO qmc_questions_log(qcode,description,class,subject,skill_id,option_a,".
                         "option_b,option_c,option_d,correct_option,question_maker,entered_by,entered_dt,modified_by,modified_dt) ".
                         "SELECT qcode,description,class,subject,skill_id,option_a,".
                         "option_b,option_c,option_d,correct_option,question_maker,entered_by,entered_dt,modified_by,modified_dt FROM qmc_questions WHERE qcode = '".$qcode."'";
           $dbquery = new dbquery($query,$connid);
        }
        function deleteImages($connid,$qcode)
        {
                $image_name = "";
                $cnt_mathes = "";
                $query = "SELECT description FROM qmc_questions WHERE qcode = '".$qcode."'";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                if($row["description"] != "")
                {
                        preg_match_all("/src=\"(.*?)\/qmc\/uploads\/(.*?)\"/i", $row["description"], $matches, PREG_SET_ORDER);
                        $cnt_mathes = count($matches);
                        for($i=0 ; $i<$cnt_mathes ;$i++)
                        {
                                $image_name = $matches[$i][2] ;
                                if($image_name != "")
                                        unlink("C:\\Program Files\\Apache Group\\Apache2\\htdocs\\qmc\\uploads\\".$image_name);
                        }
                }
        }
        function getTeacherDetailsByID($connid,$srno)
        {
                $query = "SELECT teacher_name FROM QMC_registrationDetails WHERE srno = '".$srno."'";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                return $row["teacher_name"];
        }
        function getQuestionsByUserId($connid,$question_maker)
        {
                $arrRet = array();
                $query = "SELECT * FROM qmc_questions WHERE question_maker = '".$question_maker."'";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                                $arrRet[$row["qcode"]] = array("qcode"=>$row["qcode"],
                                                                                        "description"=>$row["description"],
                                                                                        "class"=>$row["class"],
                                                                                        "subject"=>$row["subject"],
                                                                                        "skill_id"=>$row["skill_id"],
                                                                                        "option_a"=>$row["option_a"],
                                                                                        "option_b"=>$row["option_b"],
                                                                                        "option_c"=>$row["option_c"],
                                                                                        "option_d"=>$row["option_d"],
                                                                                        "correct_option"=>$row["correct_option"],
                                                                                        "question_maker"=>$row["question_maker"],
                                                                                        "entered_by"=>$row["entered_by"],
                                                                                        "entered_dt"=>$row["entered_dt"],
                                                                                        "modified_by"=>$row["modified_by"],
                                                                                        "modified_dt"=>$row["modified_dt"]
                                                                                        );
                }
                return $arrRet;
        }
        function retrieveQuestionDetailsByQcode($connid,$qcode)
        {
                $query = "SELECT * FROM qmc_questions WHERE qcode = '".$qcode."'";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                $this->description = $row["description"];
                $this->class = $row["class"];
                $this->subject = $row["subject"];
                $this->skill_id = $row["skill_id"];
                $this->option_a = $row["option_a"];
                $this->option_b = $row["option_b"];
                $this->option_c = $row["option_c"];
                $this->option_d = $row["option_d"];
                $this->correct_option = $row["correct_option"];
        }

        function getSubjectsByUserid($connid,$question_maker)
        {
                $arrRet = array();
                $arrSubName = array("1"=>"English","2"=>"Maths","3"=>"Science","4"=>"Social Studies","5"=>"Hindi");
                $query = "SELECT subject,count(qcode) FROM qmc_questions WHERE question_maker = '".$question_maker."' GROUP BY subject ORDER BY subject";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray())
                {
                        if($row["count(qcode)"] >= 6)
                                $display = "disabled"." "."title=\"Your limit of adding questions to ".$arrSubName[$row["subject"]]." subject is completed\"";
                        else
                                $display = "";
                        $arrRet[$row["subject"]] = array("subject"=>$row["subject"],
                                                                                                "questions_count"=>$row["count(qcode)"],
                                                                                                "display"=>$display
                                                                                                );
                }
                return $arrRet;
        }
        function CheckDuplication($connid)
        {
                $query = "SELECT count(*) FROM qmc_questions WHERE description = '".$this->description."' AND class='".$this->class."' AND subject='".$this->subject."' AND question_maker='".$_SESSION["userid"]."' ";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                if($row[0] > 0)
                        return true;
                else
                        return false;
        }
                function getAllcities($connid)
                {
                        $arrRet = array();
                        $query = "SELECT DISTINCT city FROM region_master ";
                        $dbquery = new dbquery($query,$connid);
                        while($row = $dbquery->getrowarray())
                        {
                                $arrRet[] = $row["city"];
                        }
                        //print_r($arrRet);
                        return $arrRet;
                }
        function searchAllQuestions($connid)
        {
                $this->setpostvars();
                $this->clspaging = new clspaging('qmcquestionslist');
                $this->clspaging->setgetvars();
                $this->clspaging->setpostvars();
                $this->clspaging->numofrecsperpage = $this->numberofrecords;
                //echo $this->search_qcode;
                //echo $this->from_date;
                $arrRet = array();
                //echo $this->subject;
                $querySelect = "SELECT *,IF(offline_received_dt = '0000-00-00',entered_dt,offline_received_dt) as orderDate,DATE_FORMAT(entered_dt,'%d-%m-%Y') as submitted_dt,DATE_FORMAT(offline_received_dt,'%d-%m-%Y') as offline_submitted_dt FROM qmc_questions";
                $queryLeftJoin = "LEFT JOIN QMC_registrationDetails ON QMC_registrationDetails.srno = qmc_questions.question_maker WHERE 1 = 1 ";
                $query = $querySelect." ".$queryLeftJoin;
                if($this->search_qcode != "")
                        $query.="AND qcode IN (0,".$this->search_qcode.") ";
                if($this->class != "" && $this->class != 0)
                        $query.= "AND class = '".$this->class."' ";
                if($this->subject != "" && $this->subject != 0)
                        $query.= "AND subject = '".$this->subject."' ";
                if($this->skill_id != "")
                        $query.= "AND skill_id LIKE '%".$this->skill_id."%' ";
                if($this->question_maker != "" && $this->question_maker != 0)
                        $query.= "AND question_maker = '".$this->question_maker."' ";
                if($this->description != "")
                        $query.= "AND description LIKE '".$this->description."' ";
                if($this->schoolcode != "")
                        $query.= "AND school_code = '".$this->schoolcode."' ";
                                if($this->search_teacher_city != "")
                                                $query.= "AND (teacher_city = '".$this->search_teacher_city."' OR school_city = '".$this->search_teacher_city."') ";
                if($this->from_date != '0000-00-00' && $this->from_date != "" && $this->to_date != "" && $this->to_date != '0000-00-00')
                {
                        $from_date = explode('-',$this->from_date);
                        $frm_date =$from_date[2].$from_date[1].$from_date[0];
                $to_date = explode('-',$this->to_date);
                $tdate =$to_date[2].$to_date[1].$to_date[0];

                        $query.= "AND (
                                                                (DATE_FORMAT(entered_dt,'%Y%m%d') >= '".$frm_date."' 
                                                                AND DATE_FORMAT(entered_dt,'%Y%m%d') <= '".$tdate."' 
                                                                AND offline_received_dt = '0000-00-00') 
                                                                        OR 
                                                                (DATE_FORMAT(offline_received_dt,'%Y%m%d') >= '".$frm_date."' 
                                                                AND DATE_FORMAT(offline_received_dt,'%Y%m%d') <= '".$tdate."' 
                                                                AND offline_received_dt != '0000-00-00')
                                                        ) ";
                }
                if($this->search_teacher_name != "")
                        $query.="AND teacher_name LIKE '%".$this->search_teacher_name."%' ";
                if($this->search_teacher_email != "")
                        $query.="AND teacher_email LIKE '%".$this->search_teacher_email."%' ";
                if($this->keyword != "")
                        $query.="AND (teacher_name LIKE '%".$this->keyword."%' OR teacher_email LIKE '%".$this->keyword."%' OR description LIKE '%".$this->keyword."%' OR school_name LIKE '%".$this->keyword."%' OR skill_id LIKE '%".$this->keyword."%') ";
                                 $query.=" ORDER BY orderDate,srno ";                
                //echo $query;
                $dbquery = new dbquery($query,$connid);
                $this->clspaging->numofrecs = $dbquery->numrows();
                if($this->clspaging->numofrecs >0)
                {
                        $this->clspaging->getcurrpagevardb();
                }
                $query_records = $query." ".$this->clspaging->limit;
                $dbquery = new dbquery($query_records,$connid);
                while($row = $dbquery->getrowarray())
                {
                                if($row["offline_submitted_dt"] != '00-00-0000')
                                                                        $submitted_date = $row["offline_submitted_dt"];
                                                                else
                                                                        $submitted_date = $row["submitted_dt"];
                                                                        
                                                                $arrRet[$row["qcode"]] = array("qcode"=>$row["qcode"],
                                                                                        "description"=>$row["description"],
                                                                                        "class"=>$row["class"],
                                                                                        "school_name"=>$row["school_name"],
                                                                                        "school_code"=>$row["school_code"],
                                                                                                                                                                                "school_city"=>$row["school_city"],
                                                                                                                                                                                "teacher_city"=>$row["teacher_city"],
                                                                                        "teacher_name"=>$row["teacher_name"],
                                                                                        "teacher_email"=>$row["teacher_email"],
                                                                                        "subject"=>$row["subject"],
                                                                                        "skill_id"=>$row["skill_id"],
                                                                                        "option_a"=>$row["option_a"],
                                                                                        "option_b"=>$row["option_b"],
                                                                                        "option_c"=>$row["option_c"],
                                                                                        "option_d"=>$row["option_d"],
                                                                                        "correct_option"=>$row["correct_option"],
                                                                                        "question_maker"=>$row["question_maker"],
                                                                                        "entered_by"=>$row["entered_by"],
                                                                                        "entered_dt"=>$submitted_date,
                                                                                        "modified_by"=>$row["modified_by"],
                                                                                        "modified_dt"=>$row["modified_dt"]
                                                                                        );
                }
                return $arrRet;
        }
        function getUniqueTeachersCountForQuestion($connid)
        {
                $this->setpostvars();
                $query = "SELECT COUNT( DISTINCT question_maker )
                                  FROM qmc_questions,QMC_registrationDetails
                                  WHERE QMC_registrationDetails.srno = qmc_questions.question_maker
                                  AND question_maker != '' ";
                                
                if($this->search_qcode != "")
                $query.="AND qcode = '".$this->search_qcode."'";
        if($this->class != "" && $this->class != 0)
                $query.= "AND class = '".$this->class."' ";
        if($this->subject != "" && $this->subject != 0)
                $query.= "AND subject = '".$this->subject."' ";
        if($this->skill_id != "")
                $query.= "AND skill_id LIKE '%".$this->skill_id."%' ";
        if($this->question_maker != "" && $this->question_maker != 0)
                $query.= "AND question_maker = '".$this->question_maker."' ";
        if($this->description != "")
                $query.= "AND description LIKE '".$this->description."' ";
        if($this->schoolcode != "")
                $query.= "AND school_code = '".$this->schoolcode."' ";
                if($this->search_teacher_city != "")
                                $query.= "AND (teacher_city = '".$this->search_teacher_city."' OR school_city = '".$this->search_teacher_city."') ";
        if($this->from_date != '0000-00-00' && $this->from_date != "" && $this->to_date != "" && $this->to_date != '0000-00-00')
        {
                $from_date = explode('-',$this->from_date);
                $frm_date =$from_date[2].$from_date[1].$from_date[0];
                                $frm_db_date =$from_date[2]."-".$from_date[1]."-".$from_date[0];
                               $to_date = explode('-',$this->to_date);
                        $tdate =$to_date[2].$to_date[1].$to_date[0];
                                $t_db_date =$to_date[2]."-".$to_date[1]."-".$to_date[0];

                $query.= "AND (
                                                                (DATE_FORMAT(entered_dt,'%Y%m%d') >= '".$frm_date."' 
                                                                AND DATE_FORMAT(entered_dt,'%Y%m%d') <= '".$tdate."' 
                                                                AND offline_received_dt = '0000-00-00') 
                                                                        OR 
                                                                (DATE_FORMAT(offline_received_dt,'%Y%m%d') >= '".$frm_date."' 
                                                                AND DATE_FORMAT(offline_received_dt,'%Y%m%d') <= '".$tdate."' 
                                                                AND offline_received_dt != '0000-00-00')
                                                        ) ";
                $query.=" AND question_maker NOT IN (SELECT DISTINCT question_maker FROM qmc_questions WHERE DATE_FORMAT(entered_dt,'%Y%m%d') < '".$frm_date."' AND offline_received_dt = '0000-00-00') ";
                $query.=" AND question_maker NOT IN (SELECT DISTINCT question_maker FROM qmc_questions WHERE DATE_FORMAT(offline_received_dt,'%Y%m%d') < '".$frm_date."' AND offline_received_dt != '0000-00-00') ";
        }
        if($this->search_teacher_name != "")
                $query.="AND teacher_name LIKE '%".$this->search_teacher_name."%' ";
        if($this->search_teacher_email != "")
                $query.="AND teacher_email LIKE '%".$this->search_teacher_email."%' ";
        if($this->keyword != "")
                $query.="AND (teacher_name LIKE '%".$this->keyword."%' OR teacher_email LIKE '%".$this->keyword."%' OR description LIKE '%".$this->keyword."%' OR school_name LIKE '%".$this->keyword."%' OR skill_id LIKE '%".$this->keyword."%') ";
       
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                return $row[0];
        }
        function getQuestionsPrint($connid)
        {
                $this->setpostvars();
                $printdata = "";
                $somecontent = "";
                $i = 0;
                $arrSubName = array("1"=>"English","2"=>"Maths","3"=>"Science","4"=>"Social Studies","5"=>"Hindi");
                if($this->action == 'PrintData')
                {
                        //print_r($this->printquestions);
                        if(is_array($this->printquestions) && count($this->printquestions) > 0)
                        {
                                
                                $str="<html>";
                                $str.="<head><style>.pagebreak{page-break-before : always;}</style><title>ASSET Question making competition</title></head><body>";
                                $str.=  "<table width=\"600\" border=\"1\" cellpadding=\"4\" cellspacing=\"1\" align=\"center\" style=\"border-collapse:collapse;font-face:verdana\">";
                                foreach ($this->printquestions as $qcode)
                                {
                                        $query = "SELECT *,IF(offline_received_dt = '0000-00-00',DATE_FORMAT(entered_dt,'%d-%m-%Y'),DATE_FORMAT(offline_received_dt,'%d-%m-%Y')) as orderDate FROM qmc_questions WHERE qcode = '".$qcode."'";
                                        $dbquery = new dbquery($query,$connid);
                                        $data = $dbquery->getrowarray();
                                        $queryUser = "SELECT teacher_name,teacher_email,school_name FROM QMC_registrationDetails WHERE srno = '".$data["question_maker"]."' ";
                                        $dbqueryUser = new dbquery($queryUser,$connid);
                                        $userdata = $dbqueryUser->getrowarray();
                                         
														            if($i >= 2 && $i % 2 == 0)
															          {
                                            $str.="
                                            <tr class=\"pagebreak\">
                                                  <td width=\"5\"><b>Teacher Email</b></td>
                                                  <td>".$userdata["teacher_email"]."</td>
                                                  <td><b>Qcode</b></td>
                                                  <td>".$qcode."</td>
  												                        <td><b>Question Submission Date</b></td>
  												                        <td>".$data["orderDate"]."</td>
                                           </tr>";
                                       }
                                       else
                                       {
                                            $str.="
                                            <tr>
                                                  <td width=\"5\"><b>Teacher Email</b></td>
                                                  <td>".$userdata["teacher_email"]."</td>
                                                  <td><b>Qcode</b></td>
                                                  <td>".$qcode."</td>
  												                        <td><b>Question Submission Date</b></td>
  												                        <td>".$data["orderDate"]."</td>
                                           </tr>";
                                       }
                                        
                                        $str.="
                                         <tr>
                                                <td width=\"5\"><b>Class</b></td>
                                                <td colspan=2>".$data["class"]."</td>
                                                <td><b>Subject</b></td>
                                                <td colspan=2>".$arrSubName[$data["subject"]]."</td>
                                         </tr>";
                                                        $str.="<tr>
                                                                <td colspan=6><b>Question</b></td>
                                                        </tr>";
                                                        $str.="<tr>
                                                                <td colspan=\"6\"><div>".
                                                                        stripslashes(str_replace('src=\"/qmc/uploads/','src=\"http://www.ei-india.com/qmc/uploads/',$data["description"]))."</div>
                                                                </td>
                                                        </tr>";
                                                        $str.="<tr>
                                                                <td width=\"5\"><b>A</b></td>
                                                                <td colspan=\"5\"><div>".stripslashes(str_replace('src=\"/qmc/uploads/','src=\"http://www.ei-india.com/qmc/uploads/',$data["option_a"]))."</div></td>
                                                        </tr>";
                                                        $str.="<tr>
                                                                <td width=\"5\"><b>B</b></td>
                                                                <td colspan=\"5\"><div>".stripslashes(str_replace('src=\"/qmc/uploads/','src=\"http://www.ei-india.com/qmc/uploads/',$data["option_b"]))."</div></td>
                                                        </tr>";
                                                        $str.="<tr>
                                                                <td width=\"5\"><b>C</b></td>
                                                                <td colspan=\"5\"><div>".stripslashes(str_replace('src=\"/qmc/uploads/','src=\"http://www.ei-india.com/qmc/uploads/',$data["option_c"]))."</div></td>
                                                        </tr>";
                                                        $str.="<tr>
                                                                <td width=\"5\"><b>D</b></td>
                                                                <td colspan=\"5\"><div>".stripslashes(str_replace('src=\"/qmc/uploads/','src=\"http://www.ei-india.com/qmc/uploads/',$data["option_d"]))."</div></td>
                                                        </tr>";
                                                        $str.="<tr>
                                                                <td width=\"5\"><b>Correct<br>Option</b></td>
                                                                <td colspan=\"5\"><div>".$data["correct_option"]."</div></td>
                                                        </tr>";
                                                        $str.="<tr><td colspan=\"6\"><b>Comments</b></td></tr>";
                                                        $str.="<tr><td colspan=\"6\" height=\"50\"></td></tr>";
                                                        $i = $i + 1;                                                       

                                }
                                $str.="</table></body></html>";
                                //echo $str;
                                $filename = "../qmc/html_files/Asset_QMC_".date("dmYHis").".html";
                                                                $somecontent = $str;

                                                                // Let's make sure the file exists and is writable first.
                                                                /*if (is_writable($filename)) {*/

                                                                    // In our example we're opening $filename in append mode.
                                                                    // The file pointer is at the bottom of the file hence
                                                                    // that's where $somecontent will go when we fwrite() it.
                                                                    if (!$handle = fopen($filename, 'w')) {
                                                                         echo "Cannot open file ($filename)";
                                                                         exit;
                                                                    }

                                                                    // Write $somecontent to our opened file.
                                                                    if (fwrite($handle, $somecontent) === FALSE) {
                                                                        echo "Cannot write to file ($filename)";
                                                                        exit;
                                                                    }

                                                                   // echo "Success, wrote ($somecontent) to file ($filename)";

                                                                    fclose($handle);
                                                                    //$mm_type="text/html";
																	$mm_type = "application/msword";

                                                                        header("Cache-Control: public, must-revalidate");
                                                                        header("Pragma: hack");
                                                                        header("Content-Type: " . $mm_type);
                                                                        header("Content-Length: " .(string)(filesize($filename)) );
                                                                        header('Content-Disposition: attachment; filename="'.basename($filename).'"');
                                                                        header("Content-Transfer-Encoding: binary\n");

                                                                        $fp = fopen($filename, 'rb');
                                                                        $buffer = fread($fp, filesize($filename));
                                                                        fclose ($fp);

                                                                        print $buffer;
                                                                        //exit();
                        }
                }
        }
}
?>

