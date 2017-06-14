<?php

/**
$Rev:: 28151                  $ 
$Author:: hitesh.israni       $
$Date:: 2015-03-04 14:53:12 +#$
*/

include_once(constant("PATH_ABSOLUTE_CLASSES").'eidaquestions.cls.php');
include_once(constant("PATH_ABSOLUTE_CLASSES").'eidahtmlreports.cls.php');
include_once(constant("PATH_ABSOLUTE_CLASSES").'eidastudentmaster.cls.php');

class EIDAResult {
    var $connid;
    var $examcode;
    var $studentid;
    var $testversion;
    static $resultTable = 'da_studentAnswerDetails';
    
    public function __construct($connid, $examcode = null, $studentid = null) {  
        $this->connid = $connid;     
        $this->examcode = $examcode;
        $this->studentid = $studentid;
    }
    
    public function getExamScore(){
        $table = self::$resultTable;
        $eidaquestion = new clsdaquestion();                
        $qsProjection = substr(implode(',qn', range(0, 40)),2);    
        $rawResultForQuestionsQuery  = 
                "SELECT da_studentAnswerDetails.studentID, da_testRequest.schoolCode, da_testRequest.subject, da_examDetails.exam_code, da_testRequest.approved_date, "
                . " da_paperDetails.qcode_list, da_paperDetails.papercode, da_paperDetails.version, $qsProjection "
                . " FROM $table "
                . " INNER JOIN da_examDetails on SUBSTRING(da_studentAnswerDetails.exam_code,1, 6) = da_examDetails.exam_code "
                . " INNER JOIN da_testRequest on da_testRequest.id = da_examDetails.request_id "
                . " INNER JOIN da_paperDetails on da_paperDetails.papercode = da_testRequest.paper_code "
                . " AND SUBSTRING(da_studentAnswerDetails.exam_code, 7, 1) = da_paperDetails.version"
                . " WHERE 1 = 1";
        $rawResultForQuestionsQuery.= " AND da_examDetails.exam_code = '$this->examcode' AND da_studentAnswerDetails.studentID = '$this->studentid'";        
        $dbQueryObj = new dbquery(null, $this->connid);
        $dbqry = $dbQueryObj->executequery($rawResultForQuestionsQuery);
        $paperquestions = $dbqry->getrowassocarray();
        $totalAttempted = 0;
        $qcodesInPaper = explode(',', $paperquestions['qcode_list']);
        $qcodesInPaper = array_filter($qcodesInPaper); // Important. This will remove any empty elements from the array.
        $qcodeDetails = $eidaquestion->getQuestionByQcode($this->connid, $qcodesInPaper);
        $questionsStudentResponses = array();
        $idx = 1;     
        foreach($qcodesInPaper as $qcode){  
            $questionsStudentResponses[$qcode] = $eidaquestion->GetQueTableAndVersion($this->connid, $qcode, $paperquestions['approved_date'], $qcodeDetails[$qcode]['lastModified']);
            if(isset($questionsStudentResponses[$qcode])){
                if(empty($questionsStudentResponses[$qcode]['correct_answer'])){
                    $questionsStudentResponses[$qcode]['correct_answer'] = $qcodeDetails[$qcode]['correct_answer'];
                }
                if(!empty($paperquestions['qn' . $idx])){
                    $totalAttempted++;
                    $questionsStudentResponses[$qcode]['student_answer'] = $paperquestions['qn' . $idx];
                }
            }
            $idx++;
        }   
        /* getYear from commonfunctions expect school_code in session */
        $_SESSION['user_category'] = 'Parent';
        $_SESSION['school_code'] = $paperquestions['schoolCode'];
        
        $year = getYear();        
        $eidastudent = new clsdastudentmaster($this->connid);
        $studentDetails = $eidastudent->getActiveStudentDetails($this->studentid);
        $eidahtmlreport = new clsdahtmlreports($this->connid);
        $correctCount = $this->calculateTotalFromRawScore(array_values($questionsStudentResponses));
        
        $scoreOutOfDetails = $eidahtmlreport->getScoreOutOfDetails($studentDetails['schoolCode'], $year, $studentDetails['class']);
        $scoreOutOf = $scoreOutOfDetails[$studentDetails['class']][$paperquestions['subject']];

        $studentScore = $eidahtmlreport->getAverageScoreFromTotal($correctCount, sizeof($qcodesInPaper), array(
            'score_out_of' => $scoreOutOf,
            'school_code' => $paperquestions['schoolCode']
        ));
        // get reporting details
        $reportingDetails = $eidahtmlreport->getReportingDetails($paperquestions['papercode']);
       
        $reportingHeadWiseStudentResponse = array();
        foreach($reportingDetails['reporting_questions'] as $reportingHeadId => $qcodes){
            foreach($qcodes as $qcode){
                if(!isset($reportingHeadWiseStudentResponse[$reportingHeadId])){
                    $reportingHeadWiseStudentResponse[$reportingHeadId] = array();
                }else{
                    array_push($reportingHeadWiseStudentResponse[$reportingHeadId], array(
                        'student_answer' => $questionsStudentResponses[$qcode]['student_answer'],
                        'correct_answer' => $qcodeDetails[$qcode]['correct_answer']
                    ));
                }
            }
        }
       
        $reportingHeadWiseScores = array();
        $reportingHeadWiseScore = null;
        $best_peformed_area = null;
        $max = constant("MIN_SUBTOPIC_PERFO");
        foreach($reportingHeadWiseStudentResponse as $reportingHeadId => $rawResponse){
            $tmptotal = count($reportingDetails['reporting_questions'][$reportingHeadId]);
            if($tmptotal > 0){                
                /* For calculating best performed Area */
                $tmpscore = $this->calculateTotalFromRawScore($rawResponse);
                $correct_percentage = $eidahtmlreport->round_to_nearest_half(($tmpscore / $tmptotal * 100));                
                if($correct_percentage > $max){
                    $max = $correct_percentage;
                    $best_peformed_area = $reportingDetails['reporting_topics'][$reportingHeadId];
                }
                $reportingHeadWiseScore = array(
                    'total_questions_in_reporting_head' => count($reportingDetails['reporting_questions'][$reportingHeadId]),
                    'total_correct' => $this->calculateTotalFromRawScore($rawResponse),
                    'correct_percentage' => $correct_percentage,
                    'reporting_head' => $reportingDetails['reporting_topics'][$reportingHeadId]
                );
                $reportingHeadWiseScores[$reportingHeadId] = $reportingHeadWiseScore; 
            }else{
                $reportingHeadWiseScores[$reportingHeadId] = null; 
            }
            
        }
        return array(
            'average_score' => array('correct_count' => $correctCount, 'total_attempted' => $totalAttempted, 'total_questions' => sizeof($qcodesInPaper), 'score' => $studentScore, 'score_out_of' => $scoreOutOf, 'best_performed_area' => $best_peformed_area),
            'reporting_heading_wise_score' => $reportingHeadWiseScores
        );
    }
    
    
    public function calculateTotalFromRawScore($rawScore){
        $correctcount = 0;
        foreach($rawScore as $score){
            if($score['correct_answer'] === $score['student_answer']){
                $correctcount++;
            }
        }
        return $correctcount;
    }
}
