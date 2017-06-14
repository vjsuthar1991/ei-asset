<?php
require_once dirname(__FILE__) . '/../classes/hsdbconnect.cls.php';
require dirname(__FILE__) . '/../classes/eidaMembers.cls.php';
define('MYSQL_CODE_DUPLICATE_KEY',1062);
class clsTDTracker {

    var $connid;
    private $selectedMonth; 
    private $selectedYear;
    private $selectedSubject;
    
    public function getSelectedMonth(){
        return (int) $this->selectedMonth;
    }
    
    public function getSelectedYear(){
        return $this->selectedYear;
    }    
    public function setSelectedYear($year){
        $this->selectedYear = $year;
    }
    public function setSelectedMonth($month){
        $this->selectedMonth = $month;
    }

    public function __construct($connid,$selectedSubject=1) {        
        $this->selectedMonth = date('F'); 
        $this->selectedYear = date('Y');
        $this->selectedSubject = $selectedSubject;
        $this->connid = $connid;
    }

    
    /**
    * Function getTDTeamMembers
    *
    * Simply returns list of employees(id and name details) belonging to `Test Development` department.     
    *    
    * @param (string) ($subject) subject name of which employees are to be listed.
    * @return (mixed object) returns array of employee object
    * 
    * @author hitesh
    * @lastupdated 08-04-13 12:00
    *     
    **/
    
    function getTDTeamMembers($subject = 1) {
      
        $daMembersObj = new eidaMembers($this->connid);
        $daMembers = $daMembersObj->getMembers(array($subject));
        return $daMembers;
        
    }

    function getQMSAfuedQuestionsCountByMember($subject = null, $time_range = array()) {
        return $this->getAfuedQuestionsCounts($time_range, $subject, 'questionmaker');
    }

    function getQMSAfuedQuestionsByOthersCountByMember($subject = null, $time_range = array()) {
        return $this->getAfuedQuestionsCounts($time_range, $subject, 'approved2_by');
    }

    function getApprovedQuestionCountsOthers($subject = null, $time_range = array()) {
        return $this->calculateApprovedQuestionCountsOthers($time_range, $subject,'<>');
    }
    
    function getApprovedQuestionCountsSelf($subject = null, $time_range = array()) {
        return $this->calculateApprovedQuestionCountsOthers($time_range, $subject,'=');
    }

    function getQMSQuestionCountByMember($status = null, $subject = null, $time_range = array()) {
        $questionsCountQuery = "select count(qcode) as question_count_afued, subjectno, questionmaker from question_making where 1 = 1";

        if ($status != null) {
            $questionsCountQuery.= " AND status = '$status'";
        }
        if ($subject != null) {
            $questionsCountQuery.= " AND subjectno = $subject";
        }
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $questionsCountQuery.= " AND submitdate > '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $questionsCountQuery.= " AND submitdate < '$till'";
        }
        $questionsCountQuery.= " group by questionmaker";
        if ($subject == null) {
            $questionsCountQuery .= " , subjectno";
        }
        $dbqry = new dbquery($questionsCountQuery, $this->connid);
        $qcodeCounts = array();
        while ($result = $dbqry->getrowassocarray()) {
            $qcodeCounts[] = $result;
        }
        return $qcodeCounts;
    }

    function getQMSPassagesCountByMember($status = null, $time_range = array()) {

        $passagesCountQuery = "select made_by as member,status, count(passage_id) as passage_count from qms_passage  where 1 = 1";
        if ($status != null) {
            $passagesCountQuery.= " AND status = '$status'";
        }
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $passagesCountQuery.= " AND submitdate > '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $passagesCountQuery.= " AND submitdate < '$till'";
        }
        $passagesCountQuery .= " group by made_by";

        $dbqry = new dbquery($passagesCountQuery, $this->connid);
        $passage_counts = array();
        while ($result = $dbqry->getrowassocarray()) {
            $passage_counts[] = $result;
        }
        return $passage_counts;
    }

    function daQuestionApprovedForAssemblyCountByMember($subject = null, $time_range = array()){
        $query = "SELECT commenter, da_questions.subjectno, count(distinct da_comments.qcode) as count FROM da_comments, da_questions WHERE da_comments.qcode=da_questions.qcode AND "
                . " da_comments.comment='AUTO:Approved' AND da_comments.type='AUTO'";
        if ($subject != null)
            $query .= " AND da_questions.subjectno = $subject";
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $query.= " AND da_comments.submitdate >= '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $query.= " AND da_comments.submitdate <= '$till'";
        }
        $query .= " GROUP BY da_comments.commenter";
        if ($subject == null) {
            $query .= ", da_questions.subjectno";
        }
        error_log($query);
        $daQuestionsForAssemblyCount = array();
        $dbqry = new dbquery($query, $this->connid);
        while ($result = $dbqry->getrowassocarray()) {
            $daQuestionsForAssemblyCount[] = $result;
        }        
        $daQuestionsForAssemblyCountByMemberAndSubject = array();        
        foreach ($daQuestionsForAssemblyCount as $record) {
           if(isset($daQuestionsForAssemblyCountByMemberAndSubject[$record['commenter']])){
               $daQuestionsForAssemblyCountByMemberAndSubject[$record['commenter']]  += array($record['subjectno'] => 
                    $record['count']);
           }else{
               $daQuestionsForAssemblyCountByMemberAndSubject[$record['commenter']] = array($record['subjectno'] => 
                    $record['count']);               
           }
        } 
        return $daQuestionsForAssemblyCountByMemberAndSubject;
    }
    
    function daMisconceptionCountByMember($subject = null, $time_range = array()){
        $query = "SELECT mc_added_by as member, subjectno, count(qcode) as count FROM da_questions WHERE  mc_added_date <> '0000-00-00'";
        if ($subject != null)
            $query .= " AND subjectno = $subject";
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $query.= " AND mc_added_date >= '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $query.= " AND mc_added_date <= '$till'";
        }
        $query .= " GROUP BY mc_added_by";
        if ($subject == null) {
            $query .= ", subjectno";
        }
        $misconceptionsCount = array();
        $dbqry = new dbquery($query, $this->connid);
        while ($result = $dbqry->getrowassocarray()) {
            $misconceptionsCount[] = $result;
        }        
        $misconceptionCountByMemberAndSubject = array();        
        foreach ($misconceptionsCount as $record) {
           if(isset($misconceptionCountByMemberAndSubject[$record['member']])){
               $misconceptionCountByMemberAndSubject[$record['member']]  += array($record['subjectno'] => 
                    $record['count']);
           }else{
               $misconceptionCountByMemberAndSubject[$record['member']] = array($record['subjectno'] => 
                    $record['count']);               
           }
        } 
        return $misconceptionCountByMemberAndSubject;
    }
    
    function daQuestionCountByMember($subject = null, $time_range = array()) {

        $query = "SELECT question_maker,subjectno, count(qcode) FROM da_questions WHERE status != 4";
        if ($subject != null)
            $query .= " AND subjectno = $subject";
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $query.= " AND submit_date > '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $query.= " AND submit_date < '$till'";
        }
        $query .= " GROUP BY question_maker";
        if ($subject == null) {
            $query .= ", subjectno";
        }
        $dbqry = new dbquery($query, $this->connid);
        $qcodeCounts = array();
        while ($result = $dbqry->getrowassocarray()) {
            $qcodeCounts[] = $result;
        }
        return $qcodeCounts;
    }

    function daQuestionCountByMemberAndSubject($subject = null, $time_range = array()) {
        $resultObject = $this->daQuestionCountByMember($subject, $time_range);
        return $this->groupCountByMemberAndSubject($resultObject, 'question_maker');
    }
    
    
    /**
    * Function isUserTeamLead
    *
    * checks if the given user is a team lead for the given subject.
    * member type in the `da_teamMembers` table has flags for admin, super admin, non admin and so on.
    * 
    * @param (mixed array) ($user) user array with an id key value.
    * @param (integer) ($subject) subject code @example 1 for english and so on.
    * @return (boolean) returns true if the member is a team lead else false.
    * 
    * @author hitesh
    * @lastupdated 29-04-13 14:00
    *     
    **/
    
    function isUserTeamLead($user,$subject){
        $daMemberObj = new eidaMembers($this->connid);
        $daMembers = $daMemberObj->getMemberById($user['id'],array($subject));
        if(isset($daMembers[0]) && isset($daMembers[0]['member_type']) && in_array($daMembers[0]['member_type'], array(0,1))){
            return true;
        }
        if($user['id'] === 'sudhir.prajapati'){
            return true;
        }
        return false;
    }
    
    
    /**
    * Function areTargetsFreezed
    *
    * checks if the targets were freezed for a given month-year previosly freezed by @see Function freezeTargets
    *
    * @param (string) ($month) month number. date('m')
    * @param (string) ($year) year number. date('Y')
    * @return (mixed object) returns the freezed object(record from db) if data for the tuple was freezed else null
    * 
    * @author hitesh
    * @lastupdated 29-04-13 14:00
    *     
    **/
    
    function areTargetsFreezed($month,$year){
        $resp = null;
        $targetFreezeCheckQuery = "SELECT id from asset_td_target_locks where month = '$month' AND year = '$year'";
        try{
            $dbqry = new dbquery($targetFreezeCheckQuery, $this->connid); 
            if(is_resource($dbqry)){
                $db_response = $dbqry->getrowarray();               
                $resp = $db_response;               
            }
                                 
        }catch(Exception $e){
            //error_log($e->getMessage());
        }
        return $resp;
    }
    
    /**
    * Function freezeTargets
    *
    * Freezes the target. i.e makes an entry against given month and year in `asset_td_target_locks` table
    *
    * @param (string) ($month) month number. date('m')
    * @param (string) ($year) year number. date('Y')
    * @return (mixed array) array with success and error messages.
    * 
    * @author hitesh
    * @lastupdated 29-04-13 14:00

    **/
    
    function freezeTargets($month,$year,$user = 'system'){       
        $resp = array();
        $current_time = date('Y-m-d H:i:s');
        $targetfreezeSql = "INSERT INTO asset_td_target_locks(month,year,is_freezed,updated_at,created_at,freezed_by) "
                . "values($month,$year,true,'$current_time','$current_time','$user')";
        try{
            $dbqry = new dbquery($targetfreezeSql, $this->connid);                    
            $resp['msg'] = 'success';
            if ($dbqry->errortext() == MYSQL_CODE_DUPLICATE_KEY) {
                $resp['msg'] = 'duplicate index!';
            }
        }catch(Exception $e){
            $resp['msg'] = 'failure';
            //error_log($e->getMessage());
        }
        return $resp;
    }
    
    /**
    * Function getTargets
    *
    * Currently defined only to return targets of all the members for a given month and year.
    *
    * @param (object) ($member) member object
    * @param (string) ($month) month number. date('m')
    * @param (string) ($year) year number. date('Y')
    * @return (mixed array) targets associative array.
    * 
    * @author hitesh
    * @lastupdated 04-04-13 16:00

    **/
    
    function getTargets($member = null,$month,$year){
        $tdTargets = array();
        if($member === null){
            $tdTargetsQuery = "SELECT * from asset_td_targets where month = '$month' and year = '$year'";
            try{
                $dbqry = new dbquery($tdTargetsQuery, $this->connid); 
                while($row = $dbqry->getrowassocarray()){
                        $tdTargets[] = $row;
                } 
            }catch(Exception $e){
                //error_log($e->getMessage());
            }
        }
        return $tdTargets;
    }
    
    function syncCells($month = 0,$year = 0, $changes = array()){
        $ret = false;        
        $currentUser = $_SESSION['username'];       
        if($currentUser){
            $changes = array($changes);
            foreach($changes as $change){                  
                if(isset($change['member'])  && isset($change['prop_name']) && isset($change['prop_value'])){
                    $dbResp = $this->updateProperty($month,$year, array(
                        'member' => $change['member'],
                        'name' => $change['prop_name'],
                        'value' => $change['prop_value']
                    ));
                    if($dbResp){
                        $ret = true;
                    }  
                }else{
                   $ret = false;
                }            
            }
            return $ret;
        }
    }
    
    
    function getColumnWidths(){
        return array(84, 80, 48, 55, 48, 48, 64 , 47, 47, 47, 47, 50, 70, 58, 56, 48, // 16
                    47, 47, 56, 66, 47, 47, 70, 100, 96, 96, 96, 90, 90, //29
                    96, 108, 120, 95, 95, 95, 95, 95, 95, 95, 90, 90,80,75,80,80);        
    }
        
    
    /**
     * Function getColumnConfigurations
     *
     * UI specific function. Gets the column configuration needed by handsontable library on client side.     
     *
     * @param (integer) ($subject) subject code for which configuration is to be listed.
     * @return (mixed array) associative array of configuration details.
     * 
     * @author hitesh
     * @lastupdated 04-04-13 16:00    
     **/
    
    function getColumnConfigurations($subject, $selectedProducts){
         $mandatoryProducts = array('general','total');
         $config  = array(
             array('data' => "member.name", 'readOnly' => true , 'product' => 'general'),
               array('data' => "monthString", 'readOnly' => true,'product' => 'general'),
               array('data' => "noOfWorkingDays", 'readOnly' => true, 'product' => 'general'),                
               array('data' => "holidays", 'product' => 'general'),
               array('data' => "leaves" ,'product' => 'general'),                
               array('data' => "sickleaves" ,'product' => 'general' ),                
               array('data' => "lpq" ,'product' => 'general'),               
               array('data' => "researchsummary", 'product' => 'general'),
               array('data' => "availableDays" , 'readOnly' => true , 'product' => 'general'),
               array('data' => "availableHours", 'readOnly' => true, 'product' => 'general'),
               array('data' => "bluePrinting", 'product' => 'asset')
             );
         
            if($subject === 1){
                array_push($config, array('data' => "passageSource", 'product' => 'asset'));
                array_push($config, array('data' => "passageAFU", 'readOnly' => true, 'product' => 'asset'));
            }
            $t = array(
               array('data' => "questionsUnreviewed", 'readOnly' => true, 'product' => 'asset'),
               array('data' => "qsaps" , 'readOnly' => true, 'product' => 'asset'),
               array('data' => "questionsAfuedOwn", 'readOnly' => true, 'product' => 'asset'),
               array('data' => "ppas" , 'product' => 'asset' ),
               array('data' => "pprpf" , 'product' => 'asset'),
               array('data' => "questionsApprovedOthers",'readOnly' => true, 'product' => 'asset'),
               array('data' => "questionsAfuedOthers", 'readOnly' => true, 'product' => 'asset'),
               array('data' => "ppfin" ,'product' => 'asset'),
               array('data' => "ips" , 'product' => 'asset'),
               array('data' => "assetmc" , 'product' => 'asset'),
               array('data' => "da1" , 'product' => 'da'),
               array('data' => "daSubjectAutoAssembledPaperCount",'readOnly' => true, 'product' => 'da'),
               array('data' => "daApprovedPaperCount", 'readOnly' => true, 'product' => 'da'),
               array('data' => "daQuestionsMadeCount", 'readOnly' => true, 'product' => 'da'),
               array('data' => "daQuestionApprovedForAssembly" , 'readOnly' => true , 'product' => 'da'),
               array('data' => "daMisconeptionsWrittenCount", 'readOnly' => true, 'product' => 'da'),
               array('data' => "da8", 'product' => 'da'),
               array('data' => "da6", 'product' => 'da'),
               array('data' => "da9", 'product' => 'da'),
               array('data' => "da10", 'product' => 'da'),
               array('data' => "da11", 'product' => 'da'),
               array('data' => "lsa", 'product' => 'lsa'),
               array('data' => "ms", 'product' => 'ms'),
               array('data' => "tr_ws", 'product' => 'others'),
               array('data' => "mc", 'product' => 'others'),
               array('data' => "pln" ,'product' => 'others'),
               array('data' => "askex",'product' => 'others'),
               array('data' => "aqad",'product' => 'others')
            );
            foreach($t as $ti){
                array_push($config,$ti);
            }
            unset($t);
            $t = array(
                    array('data' => "totalAllotedHrs", 'readOnly' => true, 'product' => 'total'),
                    array('data' => "remaningHrs", 'readOnly' => true, 'product' => 'total'),
                    array('data' => "remainingDays", 'readOnly' => true, 'product' => 'total')
            );
            foreach($t as $ti){
                array_push($config,$ti);
            }           
            $filteredConfiguration = array(); 
            foreach($config as $ele){
                if(in_array($ele['product'], $selectedProducts) || in_array($ele['product'],$mandatoryProducts )){
                    array_push($filteredConfiguration, $ele);
                }
            }
            return $filteredConfiguration;
    }
    
    /**
     * Function getColumnHeaders
     *
     * UI specific function. gets data for the first row of td tracking interface, simulating table header.
     *
     * @param (string) ($subject) subject code for which headers are to be listed.
     * @return (mixed array) associative array of header data     
     *  
     * @author hitesh
     * @lastupdated 04-04-13 16:00    
     * 
     **/
    
    function getColumnHeaders($subject){
        switch($subject){  
             case '1':
                 $daHeaders = array(
                     'da1' => 'E-Au Ap Pp Ck', 
                     'daSubjectAutoAssembledPaperCount' => 'E-Au As Pp',
                     'daApprovedPaperCount' => 'E- Pp Ap',
                     'daQuestionsMadeCount' => 'E- Qs Md',
                     'daQuestionApprovedForAssembly' => 'E- Qs Ap As',
                     'da6' => 'E- Nw Qs Ap',
                     'daMisconeptionsWrittenCount' => 'Nw MERI Wt',
                     'da8' => 'Cp MERI Wt',
                     'da9' => 'ME Ed/ Cp Qs Ck',
                     'da10' => 'DA Prj Scl',
                     'da11' => 'DA Mc',
                     'passageSource' => "PsgSrc", 
                     'passageAFU' => "PsgAFU(S)");
                 break;
             case '2':
                 $daHeaders = array(
                        'da1' => 'M- Pp As',
                        'daSubjectAutoAssembledPaperCount' => 'M- Pp Ap',
                        'daApprovedPaperCount'  => 'S/M- Un Qs Md',
                        'daQuestionsMadeCount' => 'S/M- Cp Qs Md',
                        'daQuestionApprovedForAssembly' => 'S/M- Qs Ap',
                        'daMisconeptionsWrittenCount' => 'Nw MERI Wt',
                        'da8' => 'Cp MERI Wt',
                        'da9' => 'ME Ed/ Cp Qs Ck',
                        'da6'  => 'Tx Mp',
                        'da10' => 'DA Prj Scl',
                        'da11' => 'DA Mc'
                    );
                 break;
             case '3':
                 $daHeaders = 
                     array( 'da1' => 'M- Pp As', 
                        'daSubjectAutoAssembledPaperCount' => 'M- Pp Ap',
                        'daApprovedPaperCount'  => 'S/M- Un Qs Md',
                        'daQuestionsMadeCount' => 'S/M- Cp Qs Md',
                        'daQuestionApprovedForAssembly' => 'S/M- Qs Ap',
                        'da8' => 'Cp MERI Wt',
                        'daMisconeptionsWrittenCount' => 'Nw MERI Wt',
                        'da9' => 'ME Ed/ Cp Qs Ck',
                        'da6'  => 'Tx Mp',
                        'da10' => 'DA Prj Scl',
                        'da11' => 'DA Mc');                 
                 break;
         }
        $respHeaders = array('member' => array('name' =>'Member'), 'monthString' => date('F',mktime(0, 0, 0, $this->selectedMonth, 1)));        
        $standardHeaders = array('noOfWorkingDays' => "Wrdy", 'holidays' => "Holidays", 
                    'leaves' => "L", 'sickleaves' => "SI", 'lpq' => "LPQ/HPQ", 
                    'researchsummary' => "RS",'availableDays' => "Avbdy", 'availableHours' => "Avlhr");         
        $assetHeaders = array( 
           'bluePrinting'  => "BP", 'questionsUnreviewed' => "QsMd(S)",
            'qsaps' => "QsAp(S)", 'questionsAfuedOwn' => "QsAFU(S)", 'ppas' => "PpAs", 'pprpf' => "PpRFP", 'questionsApprovedOthers' => "QsAp(O)", 
                   'questionsAfuedOthers' => "QsAFU(O)", "ppfin" => "PpFin", "ips" => "IPS", "assetmc" => "Mc(A)");                        
        $lsaHeaders = array( 'lsa' => 'LSA');
        $msHeaders = array('ms' => 'MS');                    
        $otherHeaders = array('tr_ws' => 'Tr Ws', "mc" => 'Mc(DA)', "pln" => 'Pln', "askex" =>'Ask Ex', "aqad" => 'AQ AD');
        $totalHeaders = array('totalAllotedHrs' => 'Ttl Alt Hr','remaningHrs' => 'Rmn hr','remainingDays' => 'Rmn dy');
        return ($respHeaders + $standardHeaders  + $assetHeaders + $daHeaders + $lsaHeaders + $msHeaders + $otherHeaders + $totalHeaders);
       
    }
       
    
    /**
     * Function getTargetValuesForMember
     *
     * UI Helper function. gets target column values for the given member object
     *
     * @param (array) ($subject) targets array holding target values for all members.
     * @param (array) ($tdmember) associative array with member details. @example array('name' => 'john.doe')
     * @return (array) associative array of header data     
     *  
     * @author hitesh
     * @lastupdated 15-04-13 14:00    
     * 
     **/
    
    public static function getTargetValuesForMember($tdTargetsByMember,$tdmember){
        $fieldsArray = array();
        if(isset($tdTargetsByMember[$tdmember['name']])){
            $fieldsArray =  array(                                    
                'questionsUnreviewed' => $tdTargetsByMember[$tdmember['name']]['questionsUnreviewed'],
                'questionsAfuedOwn' => $tdTargetsByMember[$tdmember['name']]['questionsAfuedOwn'],
                'questionsAfuedOthers' => $tdTargetsByMember[$tdmember['name']]['questionsAfuedOthers'],
                'questionsApprovedOthers' => $tdTargetsByMember[$tdmember['name']]['questionsApprovedOthers'],
                'qsaps' => $tdTargetsByMember[$tdmember['name']]['qsaps'],
                'daQuestionsMadeCount' => $tdTargetsByMember[$tdmember['name']]['daQuestionsMadeCount'],
                'daSubjectAutoAssembledPaperCount' => $tdTargetsByMember[$tdmember['name']]['daSubjectAutoAssembledPaperCount'],
                'daApprovedPaperCount' => $tdTargetsByMember[$tdmember['name']]['daApprovedPaperCount'],      

                'holidays' => $tdTargetsByMember[$tdmember['name']]['holidays'],
                'leaves' => $tdTargetsByMember[$tdmember['name']]['leaves'],
                'sickleaves' => $tdTargetsByMember[$tdmember['name']]['sickleaves'],
                'researchsummary' => $tdTargetsByMember[$tdmember['name']]['researchsummary'],
                'lpq' => $tdTargetsByMember[$tdmember['name']]['lpq'],  

                'bluePrinting' => $tdTargetsByMember[$tdmember['name']]['bluePrinting'],
                'passageSource' => $tdTargetsByMember[$tdmember['name']]['passageSource'],
                'passageAFU' => $tdTargetsByMember[$tdmember['name']]['passageAFU'],

                'daQuestionApprovedForAssembly' => $tdTargetsByMember[$tdmember['name']]['daQuestionApprovedForAssembly'],                                
                'da6' => $tdTargetsByMember[$tdmember['name']]['da6'],
                'daMisconeptionsWrittenCount' => isset($tdTargetsByMember[$tdmember['name']]['daMisconeptionsWrittenCount']) ? $tdTargetsByMember[$tdmember['name']]['daMisconeptionsWrittenCount'] : 0,
                'da8' => $tdTargetsByMember[$tdmember['name']]['da8'],
                'da9' => $tdTargetsByMember[$tdmember['name']]['da9'],
                'da10' => $tdTargetsByMember[$tdmember['name']]['da10'],
                'da11' => $tdTargetsByMember[$tdmember['name']]['da11'],
                'lsa' => $tdTargetsByMember[$tdmember['name']]['lsa'],
                'ms' => $tdTargetsByMember[$tdmember['name']]['ms'],
                'tr_ws' => $tdTargetsByMember[$tdmember['name']]['tr_ws'],
                'mc' => $tdTargetsByMember[$tdmember['name']]['mc'],
                'pln' => $tdTargetsByMember[$tdmember['name']]['pln'],
                'askex' => $tdTargetsByMember[$tdmember['name']]['askex'],
                'aqad' => $tdTargetsByMember[$tdmember['name']]['aqad']
            );
        }
        
       return $fieldsArray;
    }    
    
    
    private function updateProperty($month = 0, $year = 0,$changes = array()){
        $resp = null;
        if(isset($changes['name']) && isset($changes['value']) && isset($changes['member'])){
            $prop_name = $changes['name'];
            $prop_value = $changes['value'];
            $member = $changes['member'];
            $updatePropertyQuery = "INSERT INTO asset_td_targets (member,month,year,$prop_name) "
                    . "VALUES ('$member','$month','$year',$prop_value) ON DUPLICATE KEY UPDATE $prop_name=$prop_value";
            try{
                $dbqry = new dbquery($updatePropertyQuery, $this->connid); 
                $resp = true;
            }catch(Exception $e){
                $resp = false;
                error_log($e->getMessage());
            }  
        }        
        return $resp; 
    }

    private function calculateApprovedQuestionCountsOthers($time_range = array(), $subject = null, $op = '<>') {
        $group_by = 'commenter';
      
        $queryQuestionMaking = "SELECT comments.$group_by, question_making.subjectno, count(distinct comments.qcode) as question_count_approved FROM comments, question_making
	           WHERE  comments.qcode=question_making.qcode AND comments.type='AUTO' AND question_making.questionmaker $op comments.$group_by AND comments.comment='AUTO:Approved1'";       
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $queryQuestionMaking.= " AND comments.submitdate > '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $queryQuestionMaking.= " AND comments.submitdate < '$till'";
        }
        if ($subject != null) {
            $queryQuestionMaking .= " AND question_making.subjectno=$subject";
        }

        $queryQuestionMaking.= " GROUP BY comments.$group_by";

        if ($subject == null) {
            $queryQuestionMaking .= ", question_making.subjectno";
        }

        $dbqry = new dbquery($queryQuestionMaking, $this->connid);
        $qcodeCountsQuestionMaking = array();
        while ($result = $dbqry->getrowassocarray()) {
            $qcodeCountsQuestionMaking[] = $result;
        }
        
        $queryQuestions = "SELECT comments.$group_by, questions.subjectno, count(distinct comments.qcode) as question_count_approved FROM comments, questions
	           WHERE comments.qcode=questions.qcode AND comments.type='AUTO' AND questions.questionmaker $op comments.$group_by AND comments.comment='AUTO:Approved1'";
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $queryQuestions.= " AND comments.submitdate > '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $queryQuestions.= " AND comments.submitdate < '$till'";
        }
        if ($subject != null) {
            $queryQuestions .= " AND questions.subjectno=$subject";
        }

        $queryQuestions.= " GROUP BY comments.$group_by";

        if ($subject == null) {
            $queryQuestions .= " ,questions.subjectno";
        }

        $dbqry = new dbquery($queryQuestions, $this->connid);
        $qcodeCounts = array();
        while ($result = $dbqry->getrowassocarray()) {
            $qcodeCounts[] = $result;
        }        

        $qcodeCountsQuestionMakingFlattened = array();
        foreach ($qcodeCountsQuestionMaking as $record) {
           if(isset($qcodeCountsQuestionMaking[$record[$group_by]])){
               $qcodeCountsQuestionMaking[$record[$group_by]]  += array($record['subjectno'] => 
                       $record['question_count_approved']);
           }else{
               $qcodeCountsQuestionMaking[$record[$group_by]] = array($record['subjectno'] => 
                       $record['question_count_approved']);               
           }
        }  
        $qcodeCountsQuestionsFlattened = array();
        foreach ($qcodeCounts as $record) {
           if(isset($qcodeCountsQuestionsFlattened[$record[$group_by]])){
               $qcodeCountsQuestionsFlattened[$record[$group_by]]  += array($record['subjectno'] => 
                       $record['question_count_approved']);
           }else{
               $qcodeCountsQuestionsFlattened[$record[$group_by]] = array($record['subjectno'] => 
                       $record['question_count_approved']);               
           }
        }        
        $qcodeCountsMerged = array();
        foreach (array_keys($qcodeCountsQuestionsFlattened + $qcodeCountsQuestionsFlattened) as $key) {
            if(isset($qcodeCountsQuestionMakingFlattened[$key]) && isset($qcodeCountsQuestionsFlattened[$key])){
                $qcodeCountsMerged[$key] = $this->arraySumIdenticalKeys($qcodeCountsQuestionMakingFlattened[$key],$qcodeCountsQuestionsFlattened[$key]);
            }elseif(isset($qcodeCountsQuestionMakingFlattened[$key])){
                $qcodeCountsMerged[$key] = $qcodeCountsQuestionMakingFlattened[$key];
            }elseif(isset($qcodeCountsQuestionsFlattened[$key])){
                $qcodeCountsMerged[$key] = $qcodeCountsQuestionsFlattened[$key];
            }
        }
        
        
        return $qcodeCountsMerged;
    }

    private function getAfuedQuestionsCounts($time_range = array(), $subject = null, $group_by = 'questionmaker') {
        $queryQuestionMaking = "SELECT question_making.$group_by, comments.submitdate, question_making.subjectno, count(DISTINCT comments.qcode) as question_count_afued FROM comments, question_making
	           WHERE  comments.qcode=question_making.qcode AND comments.type='AUTO' and comments.comment='AUTO:Approved2'";
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $queryQuestionMaking.= " AND comments.submitdate > '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $queryQuestionMaking.= " AND comments.submitdate < '$till'";
        }
        if ($subject != null) {
            $queryQuestionMaking .= " AND question_making.subjectno=$subject";
        }

        $queryQuestionMaking.= " GROUP BY question_making.$group_by";

        if ($subject == null) {
            $queryQuestionMaking .= ", question_making.subjectno";
        }
        
        $dbqry = new dbquery($queryQuestionMaking, $this->connid);
        $qcodeCountsQuestionMaking = array();
        while ($result = $dbqry->getrowassocarray()) {
            $qcodeCountsQuestionMaking[] = $result;
        }

        $queryQuestions = "SELECT questions.$group_by, questions.subjectno, comments.submitdate, count(DISTINCT comments.qcode) as question_count_afued FROM comments, questions
	           WHERE comments.qcode=questions.qcode AND comments.type='AUTO' and comments.comment='AUTO:Approved2'";
        if (isset($time_range['from'])) {
            $from = date("Y-m-d H:i:s", $time_range['from']);
            $queryQuestions.= " AND comments.submitdate > '$from'";
        }
        if (isset($time_range['till'])) {
            $till = date("Y-m-d H:i:s", $time_range['till']);
            $queryQuestions.= " AND comments.submitdate < '$till'";
        }
        if ($subject != null) {
            $queryQuestions .= " AND questions.subjectno=$subject";
        }

        $queryQuestions.= " GROUP BY questions.$group_by";

        if ($subject == null) {
            $queryQuestions .= ", questions.subjectno";
        }
        
        $dbqry = new dbquery($queryQuestions, $this->connid);
        $qcodeCounts = array();
        while ($result = $dbqry->getrowassocarray()) {
            $qcodeCounts[] = $result;
        }               
        
        $qcodeCountsQuestionMakingFlattened = array();
        foreach ($qcodeCountsQuestionMaking as $record) {
           if(isset($qcodeCountsQuestionMaking[$record[$group_by]])){
               $qcodeCountsQuestionMaking[$record[$group_by]]  += array($record['subjectno'] => 
                       $record['question_count_afued'], 'submitdate' => $record['submitdate']);
           }else{
               $qcodeCountsQuestionMaking[$record[$group_by]] = array($record['subjectno'] => 
                       $record['question_count_afued'], 'submitdate' => $record['submitdate']);               
           }
        }  
        $qcodeCountsQuestionsFlattened = array();
        foreach ($qcodeCounts as $record) {
           if(isset($qcodeCountsQuestionsFlattened[$record[$group_by]])){
               $qcodeCountsQuestionsFlattened[$record[$group_by]]  += array($record['subjectno'] => 
                       $record['question_count_afued'],'submitdate' => $record['submitdate']);
           }else{
               $qcodeCountsQuestionsFlattened[$record[$group_by]] = array($record['subjectno'] => 
                       $record['question_count_afued'], 'submitdate' => $record['submitdate']);               
           }
        }
   
        $qcodeCountsMerged = array();
        foreach (array_keys($qcodeCountsQuestionsFlattened + $qcodeCountsQuestionsFlattened) as $key) {
            if(isset($qcodeCountsQuestionMakingFlattened[$key]) && isset($qcodeCountsQuestionsFlattened[$key])){
                $qcodeCountsMerged[$key] = $this->arraySumIdenticalKeys($qcodeCountsQuestionMakingFlattened[$key],$qcodeCountsQuestionsFlattened[$key]);
            }elseif(isset($qcodeCountsQuestionMakingFlattened[$key])){
                $qcodeCountsMerged[$key] = $qcodeCountsQuestionMakingFlattened[$key];
            }elseif(isset($qcodeCountsQuestionsFlattened[$key])){
                $qcodeCountsMerged[$key] = $qcodeCountsQuestionsFlattened[$key];
            }
        }
        return $qcodeCountsMerged;
    }

    
     /**
     * Function arraySumIdenticalKeys
     *
     * Sums values of passed associative arrays for matching keys.
     *
     * @param (array) ($arrays) Array of associative arrays that are to merged added.
     * @return (mixed object) merged added array
     * 
     * @example @input array(array("a" => 2,"b" => 0),array("a" => 3,"c" => 7))
     * 
     * @example @output array(array("a" => 5, b=> 0, "c" => 7))
     * @credits deceze@stackoverflow.com
     * @lastupdated 29-04-13 14:00
     *     
     **/
    
    private function arraySumIdenticalKeys($arrays) {
        $keys = array_keys(array_reduce($arrays, function ($keys, $arr) { return $keys + $arr; }, array()));
        $sums = array();
        foreach ($keys as $key) {
            $sums[$key] = array_reduce($arrays, function ($sum, $arr) use ($key) { return $sum + @$arr[$key]; });
        }
        return $sums;
    }
    
    private function groupCountByMemberAndSubject($resultObject, $groupBy, $groupBy2 = 'subjectno') {
        $groupedObject = array();
        foreach ($resultObject as $record) {
            if (isset($groupedObject[$record[$groupBy]])) {
                $question_count = 0;
                if (isset($record['question_count'])) {
                    $question_count = $record['question_count'];
                }
                $groupedObject[$record[$groupBy]][$record[$groupBy2]] = $question_count;
            } else {
                $groupedObject[$record[$groupBy]] = array();
            }
        }
        return $groupedObject;
    }

    /* For debugging purpose only */
    private function getCallee($sqlResult){
        if(!is_resource($sqlResult)){
              $trace=debug_backtrace();
              $caller=array_shift($trace);
              error_log("Called by {$caller['function']}");
              if (isset($caller['class'])){
                  error_log(" in {$caller['class']}");
              }
          }
    }
}


?>



