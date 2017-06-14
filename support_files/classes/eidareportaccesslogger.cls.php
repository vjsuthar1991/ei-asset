<?php

/**
 * Description of eidalogger
 *
 * @author hitesh
 */
class EIDAReportAccessLogger {

    var $connid;
    var $fileAccessLogTable = 'da_reportsAccessLog';
    
    var $filename;
    var $accessedBy;
    var $usercategory;       
    var $examCode;       
    var $reportType = 'teacher_report';       
        
    public function __construct($connid) {
        $this->connid = $connid;       
    }    
    public function setFileName($filename){
        $this->filename = $filename;
    }
    public function setAccessedBy($username){
        $this->accessedBy = $username;
    }
    public function setUserCategory($usercategory){
        $this->usercategory = $usercategory;
    }
    public function setExamCode($examCode){
        $this->examCode = $examCode;
    }
    public function setIdentifierValue($identifier){
        $this->identifier_value = $identifier;
    }

    /** Function addFileAccessLog
    * 
    * Returns number of students with atleast one login
    * @param ($schoolcode) if empty or 0 function would return with false.
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @param ($year) e.g. 2015 if ignored current year will be taken.
    * @return (number) highest login count.  
    *
    */
    public function addFileAccessLog(){
        $now = new DateTime();
        $date = $now->format('Y-m-d');
        $time = $now->format('Y-m-d H:i:s');
        $dbQueryObj = new dbquery(null, $this->connid);
        $fileAccessQuery = "INSERT INTO $this->fileAccessLogTable "
                    . " SET user_category = '$this->usercategory', filename = '$this->filename', "
                    . " examcode = '$this->examCode', report_type = '$this->reportType' , "
                    . " accessed_by = '$this->accessedBy', accessed_on = '$date', updated_at = '$time'"
                    . " ON DUPLICATE KEY update updated_at = '$time'";
        $dbqry = $dbQueryObj->executequery($fileAccessQuery);        
        return $dbqry;
    }
   
}
