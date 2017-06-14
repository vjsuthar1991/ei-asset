<?php


/**
 * Description of eidaonlinetest
 *
 * @author hitesh
 */

include_once dirname(__FILE__) . '/../DA/lib/functions.php';
include_once(constant("PATH_ABSOLUTE_CLASSES").'eidastudentmaster.cls.php');
class EIDAOnlineTest {
    var $connid;
    
    var $errorMessageMapping = array(
        '-1' => 'Success',
        '1' => 'Incorrect exam code entered. Please try again',
        '2' => 'Unknown student id - Please try again.',
        '3' => 'No active session for this exam code, please contact your teacher.',
        '4' => 'Cannot start test - this test has been completed already by this student id.',
        '5' => 'Already the total students have started the test!',
        '6' => 'This student id has already started/taken this test.',
        '7' => 'This student id cannot start test right now, please contact your teacher.',
        '8' => 'This student id has already started the test. Please contact your teacher to enter the test again.',
        '9' => 'Your teacher has ended this test session. Your answers have been saved, thank you.'
    );
    
    public function __construct($connid) {
        $this->connid = $connid;
    }
    
    /* returns true or error codes*/
    /* -1 is success. -2 is review test*/
    
    public function getStudentLoginErrorMessage($statuscode){
        return isset($this->errorMessageMapping[$statuscode]) ? $this->errorMessageMapping[$statuscode] : 'Unknown error.';
    }
    
    public function doStudentLogin($examcode, $student){
        $status = $this->checkStudentLogin($examcode, $student);
        return $status;        
    }    
    
    public function checkStudentLogin($examCode, $student){
        $queryDummy = "SELECT COUNT(*), b.schoolCode,b.class,a.section,b.type,b.year FROM da_examDetails a,da_testRequest b WHERE a.request_id = b.id AND a.exam_code = '$examCode'";
        $dbQueryDummy = new dbquery($queryDummy,$this->connid);
        $rowDummy = $dbQueryDummy->getrowarray();

        $query = "SELECT COUNT(*) FROM da_conductTestDetails WHERE exam_code = '$examCode' AND status = 'active'";
        $dbquery = new dbquery($query,$this->connid);
        $row =$dbquery->getrowarray();

        // singapore schoolcode
        $singaporeExamflag = 0;
        if($rowDummy['schoolCode'] == "2492338")
            $singaporeExamflag = 1;
        
        $enabled = 0;
        if( $row[0] > 0 ) 
        {                    
            if(($rowDummy[4]=="pilot")){ //$rowDummy[1]=="2387554" || 
                $enabled = 1;
            }else {			
                $query_student_check = "SELECT count(*) as cnt_student FROM da_studAcadDetails "
                        . " LEFT JOIN da_studentMaster ON da_studAcadDetails.studentID = da_studentMaster.studentID "
                        . " WHERE da_studAcadDetails.class = '".$rowDummy["class"]."' "
                        . " AND da_studAcadDetails.section = '".$rowDummy["section"]."' "
                        . " AND da_studAcadDetails.studentID = '".$student["studentID"]."' "
                        . " AND da_studentMaster.enabled = 1 AND da_studAcadDetails.status = 1 "
                        . " AND da_studAcadDetails.year = '".$rowDummy["year"]."'"
                        . " AND da_studentMaster.schoolCode = '$rowDummy[schoolCode]'";
                $studentDbquery = new dbquery($query_student_check,$this->connid);
                $row_student_check = $studentDbquery->getrowarray();
                if($row_student_check['cnt_student'] > 0){
                    $enabled = 1;
                }
            }
            if($enabled === 1){
                // get roll no.
                $clsdastudentmaster = new clsdastudentmaster($this->connid);
                $studentDetails = $clsdastudentmaster->getActiveStudentDetails($student["studentID"]);
                $rollNo = isset($studentDetails['rollNo']) ? $studentDetails['rollNo'] : null;
                $flagArr = checkReloginAttendance($examCode, $this->connid,$rollNo);
                $paperVersion = ($singaporeExamflag === 1) ? 1: $flagArr['paperVersion'];
                if($flagArr['present_flag'] == 0)
                {
                    return array('errcode' => 7);
                }
                $i=0;
                for($i=40; $i>= 1; $i--){							
                    $arr_field[$i] = "qn{$i}";
                }

                $str_select = implode(', ', $arr_field);
                $login_query = "SELECT {$str_select} , status, TIMESTAMPDIFF(HOUR,entered_dt,NOW()) AS duration, review_flag FROM da_studentAnswerDetails "
                . " WHERE studentID = '$student[studentID]' AND exam_code = '$examCode'";
                $loginDbquery = new dbquery($login_query,$this->connid);
                if($loginDbquery->numrows() > 0) {
                    $login_result = $loginDbquery->getrowarray();
                    if ($login_result["status"] != "pending"){					
                        return array('errcode' => 4);
                    }
                    else {
                        if($flagArr["relogin_flag"] == 0){
                            return array('errcode' => 8);                            
                        }
                        $start= 1;
                        $end = 1;
                        if($login_result["review_flag"] == 1){
                            return array('errcode' => -2, 'paperversion' => $paperVersion);
                        }
                        foreach($arr_field as $key=> $value){
                            $str = "qn".$key;						
                            if($login_result[$str] !="")
                            {
                                $start = $key;
                                break;
                            }
                        }
                        if($start == 1){
                            return array('errcode' => -1, 'paperversion' => $paperVersion);
                        }
                        else{
                            return array('errcode' => -1, 'data' => array('start' => $start), 'paperversion' => $paperVersion);
                        }
                    }	
                }else{
                    return array('errcode' => -1, 'paperversion' => $flagArr['paperVersion']);
                }

            }else{
                return array('errcode' => 2);                
            }
        }else{
            return array('errcode' => 1);
        }
    }
}
