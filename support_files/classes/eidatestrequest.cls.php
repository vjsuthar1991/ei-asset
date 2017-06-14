<?php
include_once dirname(__FILE__) . "/../constants.php";

class clsdatestrequest
{
	var $connid;
	var $id;
	var $schoolCode;
	var $year;
	var $class;
	var $subject;
	var $testName;
	var $paper_type;
	var $paper_code;
	var $chapter_id;
	var $request_date;
	var $requested_by;
	var $test_date;
	var $scoring_date;
	var $analysis_pubish_date;
	var $status;
	var $comments;
	var $alloted_to;
	var $approver;
	var $approved_date;
	var $approved_time;
	var $reapproved;
	var $teacher_comments;
	var $unfinalize_reason;
	var $type;
	var $lastPdfGenerated;
	var $replacement;
	var $last_modified;
	
	var $region;
	var $action;
	var $submited;
	
	var $requestidstr;
	var $msg;
	var $tabletid;
	var $tablet_schoolcodestr;
	var $request_id;
	var $kitno;
	var $delete_request_id;
	var $delete_kitno;
	var $delete_action;
	var $delete_submited;
	var $school_id;
	var $school_code;
	var $schoolsearchCode;
	var $examcode;
	var $drop_ques;
	var $ques_with_versions;
	var $remarks;
	var $examcodes;
	var $usedextversion;
	
	var $target_month;
	var $target_year;
	var $regionwisetarget;
	var $report_status;
	var $testSection;
	var $ajaxcall;
	var $drop_reasons;
	var $other_reasons;
	var $droppped_questions;
	var $no_of_student;
		
	var $scoreoutof;
	var $releasto; // 1 = Students,2 = Staff,3 = Both
	var $sectionarr;
	
	function clsdatestrequest($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->id = 0;
		$this->schoolCode = 0;
		$this->year = "";
		$this->class = "";
		$this->subject = "";
		$this->testName = "";
		$this->paper_type = "";
		$this->paper_code = "";
		$this->chapter_id = "";
		$this->request_date = "";
		$this->requested_by = "";
		$this->test_date = "";
		$this->scoring_date = "";
		$this->analysis_pubish_date = "";
		$this->status = "";
		$this->comments = "";
		$this->alloted_to = "";
		$this->approver = "";
		$this->approved_date = "";
		$this->approved_time = "";
		$this->reapproved = "";
		$this->teacher_comments = "";
		$this->unfinalize_reason = "";
		$this->type = "";
		$this->lastPdfGenerated = "";
		$this->replacement = "";
		$this->last_modified = "";
		
		$this->region = "";
		$this->action = "";
		$this->submited = "";
		
		$this->requestidstr = "";
		$this->msg = "";
		$this->tabletid = 0;
		$this->tablet_schoolcodestr = "202374,2387554,3377";
		
		$this->request_id = "";
		$this->kitno = "";
		$this->delete_request_id = "";
		$this->delete_kitno = "";
		$this->delete_action = "";
		$this->delete_submited = "";
		$this->school_id = "";
		$this->school_code = "";
		$this->schoolsearchCode = "";
		$this->examcode = "";
		$this->examcodes = "";
		$this->drop_ques = "";
		$this->ques_with_versions = "";
		$this->remarks = "";
		$this->usedextversion = "";
		
		$this->target_month = 0;
		$this->target_year = 0;
		$this->regionwisetarget = array();
		$this->report_status = "";
		$this->testSection = "";
		$this->ajaxcall = "";
		$this->drop_reasons = array();
		$this->other_reasons = array();
		$this->dropped_questions = "";
		$this->no_of_student = "";
		
		$this->scoreoutof = 10;
		$this->releasto = "";
		$this->sectionarr = array();
	}
	
	
	function setpostvars()
	{		
		if(isset($_POST["clsdatestrequest_region"])) $this->region = $_POST["clsdatestrequest_region"];
		if(isset($_POST["clsdatestrequest_hdnsubmited"])) $this->submited = $_POST["clsdatestrequest_hdnsubmited"];
		if(isset($_POST["clsdatestrequest_hdnaction"])) $this->action = $_POST["clsdatestrequest_hdnaction"];
		if(isset($_POST["clsdatestrequest_requestidstr"])) $this->requestidstr = trim($_POST["clsdatestrequest_requestidstr"]);
		if(isset($_POST["clsdatestrequest_kitnos"])) $this->kitnos = trim($_POST["clsdatestrequest_kitnos"]);
		if(isset($_POST["clsdatestrequest_schoolcode"])) $this->school_code = $_POST["clsdatestrequest_schoolcode"];
		if(isset($_POST["clsdatestrequest_examcode"])) $this->examcode = $_POST["clsdatestrequest_examcode"];
		if(isset($_POST["clsdatestrequest_request_id"])) $this->id	= $_POST["clsdatestrequest_request_id"];
		if(isset($_POST["clsdatestrequest_examcodes"])) $this->examcodes = $_POST["clsdatestrequest_examcodes"];
		if(isset($_POST["clsdatestrequest_quecode"])) $this->drop_ques = $_POST["clsdatestrequest_quecode"];
		if(isset($_POST["clsdatestrequest_ques_with_versions"])) $this->ques_with_versions = $_POST["clsdatestrequest_ques_with_versions"];		
		if(isset($_POST["clsdatestrequest_remarks"])) $this->remarks = $_POST["clsdatestrequest_remarks"];	
		if(isset($_POST["clsdatestrequest_type"])) $this->type = $_POST["clsdatestrequest_type"];
		if(isset($_POST["clsdatestrequest_target_month"])) $this->target_month = $_POST["clsdatestrequest_target_month"];
		if(isset($_POST["clsdatestrequest_target_year"])) $this->target_year = $_POST["clsdatestrequest_target_year"];
		if(isset($_POST["clsdatestrequest_regionwisetarget"])) $this->regionwisetarget = $_POST["clsdatestrequest_regionwisetarget"];
		if(isset($_POST["clsdatestrequest_class"])) $this->class = $_POST["clsdatestrequest_class"];
		if(isset($_POST["clsdatestrequest_subject"])) $this->subject = $_POST["clsdatestrequest_subject"];
		if(isset($_POST["clsdatestrequest_hdnexamcode"])) $this->examcode = $_POST["clsdatestrequest_hdnexamcode"];
		if(isset($_POST["DisplayVersionTable"])) $this->usedextversion = $_POST["DisplayVersionTable"];
		if(isset($_POST["clsdatestrequest_report_status"])) $this->report_status = $_POST["clsdatestrequest_report_status"];
		if(isset($_POST["clsdatestrequest_test_date"])) $this->test_date = $_POST["clsdatestrequest_test_date"];
		if(isset($_POST["clsdatestrequest_request_date"])) $this->request_date = $_POST["clsdatestrequest_request_date"];
		if(isset($_POST["clsdatestrequest_testName"])) $this->testName = $_POST["clsdatestrequest_testName"];
		if(isset($_POST["clsdatestrequest_section"])) $this->testSection = $_POST["clsdatestrequest_section"];		

		if(isset($_POST["clsdatablet_request_id"])) $this->request_id = $_POST["clsdatablet_request_id"];
		if(isset($_POST["clsdatablet_kitno"])) $this->kitno = $_POST["clsdatablet_kitno"];
		if(isset($_POST["clsdatablet_schoolsearchCode"])) $this->schoolsearchCode = $_POST["clsdatablet_schoolsearchCode"];
		if(isset($_POST["clsdatablet_delete_hdnkitno"])) $this->delete_kitno = $_POST["clsdatablet_delete_hdnkitno"];
		if(isset($_POST["clsdatablet_schooltest"])) $this->school_id = $_POST["clsdatablet_schooltest"];
		
		if(isset($_POST["clsdatestrequest_ajaxcall"])) $this->ajaxcall = $_POST["clsdatestrequest_ajaxcall"];
		if(isset($_POST["clsdatestrequest_drop_reason"])) $this->drop_reasons = $_POST["clsdatestrequest_drop_reason"];
		if(isset($_POST["clsdatestrequest_other_reason"])) $this->other_reasons = $_POST["clsdatestrequest_other_reason"];
		if(isset($_POST["clsdatestrequest_no_of_student"])) $this->no_of_student = $_POST["clsdatestrequest_no_of_student"];
		
		if(isset($_POST["clsdatestrequest_pilot_year"])) $this->year = $_POST["clsdatestrequest_pilot_year"];
		if(isset($_POST["clsdatestrequest_misconception_year"])) $this->year = $_POST["clsdatestrequest_misconception_year"];
		if(isset($_POST["clsdatestrequest_year"])) $this->year = $_POST["clsdatestrequest_year"];
		
		if(isset($_POST["clsdatestrequest_scoreoutof"])) $this->scoreoutof = $_POST["clsdatestrequest_scoreoutof"];
		if(isset($_POST["clsdatestrequest_releasto"])) $this->releasto = $_POST["clsdatestrequest_releasto"];
		if(isset($_POST["clsdatestrequest_sectionarr"])) $this->sectionarr = $_POST["clsdatestrequest_sectionarr"];
		
		
	}
	
	
	function setgetvars()
    {
        if(isset($_GET["id"])) $this->id = $_GET["id"];
        if(isset($_GET["tabletid"])) $this->tabletid = trim($_GET["tabletid"]);
        if(isset($_GET["schoolcode"])) $this->school_code = trim($_GET["schoolcode"]);
        
        if(isset($_GET["examcode_set"])) $this->examcode = $_GET["examcode_set"];
        if(isset($_GET["class_set"])) $this->class = $_GET["class_set"];
        if(isset($_GET["subject_set"])) $this->subject = $_GET["subject_set"];
        if(isset($_GET["action"])) $this->action = $_GET["action"];
        if(isset($_GET["submitted"])) $this->submited = $_GET["submitted"];
        
        if(isset($_GET["subjectCode"])) $this->subject = $_GET["subjectCode"];
        if(isset($_GET["year"])) $this->year = $_GET["year"];
        
    }
    
    function GetRegions(){
    	
        global $constant_da;
    	$RegionArr = array();
    	
    	$query = "SELECT DISTINCT(region) FROM {$constant_da(COMMON_DATABASE)}.region_master";
    	$dbqry = new dbquery($query,$this->connid);
    	while($result = $dbqry->getrowarray()){
    		$RegionArr[] = $result["region"];    		
    	}
    	return $RegionArr;
    }
    
    function GetPilotTestlist($condition = ""){
    	
        global $constant_da;
    	$ResultArr = array();
    	$query = "SELECT da_testRequest.id,da_testRequest.schoolCode,schools.schoolname,schools.region,
    			  da_testRequest.type,da_testRequest.subject,da_testRequest.class,da_testRequest.testName,da_testRequest.test_date,
    			  da_testRequest.request_date,da_testRequest.scoring_date,da_testRequest.requested_by,da_testRequest.optfor_device,
				  da_examDetails.exam_code,da_examDetails.report_status,da_examDetails.report_date
				  FROM da_testRequest 
				  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_testRequest.schoolCode = schools.schoolno
				  LEFT JOIN da_examDetails ON da_testRequest.id = da_examDetails.request_id
				  WHERE da_testRequest.type = 'pilot' $condition
				  ORDER BY da_testRequest.request_date DESC";
    				  
		$dbqry = new dbquery($query,$this->connid);
		while($result = $dbqry->getrowarray()){
			
			$ResultArr["SCHOOLDETAILS"][$result["id"]] = array("id"=>$result["id"],
															   "type"=>$result["type"],	
													  		   "schoolCode" => $result["schoolCode"],
													  		   "schoolname" => $result["schoolname"],
													  		   "region" => $result["region"],
													  		   "subject" => $result["subject"],
													  		   "class" => $result["class"],
													  		   "testName" => $result["testName"],
													  		   "test_date" => $result["test_date"],
													  		   "request_date" => $result["request_date"],
													  		   "scoring_date" => $result["scoring_date"],
													  		   "requested_by" => $result["requested_by"],
													  		   "optfor_device" => $result["optfor_device"]
													  		   );
													  		   
			$ResultArr["REPORTSTATUS"][$result["id"]][$result["exam_code"]] = array("report_status"=>$result["report_status"],"report_date"=>$result["report_date"]);
			
		}
		return $ResultArr;
    }
	
    function PagePilotList()
    {
    	$ResultArr = array();
    	$condition = "";
    	
    	$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->submited && $this->action == "GetRequest"){
    		
    		if($this->region != "ALL")
    			$condition .= "AND schools.region='".$this->region."'";
    			
    		if($this->type != "ALL")
    			$condition .= "AND da_testRequest.type='".$this->type."'";	
    			
    		if($this->report_status != "ALL")
    			$condition .= "AND da_examDetails.report_status='".$this->report_status."'";		
    		
    		if($this->request_date != "")
    			$condition .= "AND da_testRequest.request_date='".date('Y-m-d',strtotime($this->request_date))."'";	
    				
    		if($this->test_date != "")
    			$condition .= "AND da_testRequest.test_date='".date('Y-m-d',strtotime($this->test_date))."'";	
    		
    		#For da reports year condition in pilot test page date 04-07-2012#	
    		if($this->year != "ALL")
    			$condition .= "AND da_testRequest.year='".$this->year."'";		
    		#For da reports year condition in pilot test page date 04-07-2012#
    						
    		$ResultArr = $this->GetPilotTestlist($condition);
    		
    	}else{
    		$ResultArr = $this->GetPilotTestlist();
    	}
    	return $ResultArr;
    }
    
    function GetZippedPaper(){
    	
    	$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->tabletid != 0 && !$this->submited){
    		
    		$tab_qry = "SELECT tabletid, group_concat( da_tablettest.request_id ) AS loadedrequestids
					    FROM da_tabletmaster
					    LEFT JOIN da_tablettest ON da_tabletmaster.tabletid = da_tablettest.tablet_id
					    WHERE da_tabletmaster.tabletid = '".$this->tabletid."'
					    GROUP BY tablet_id";
    		$tabdbqry = new dbquery($tab_qry,$this->connid);
    		if($tabdbqry->numrows() == 0) return "Invalid Tablet Id!";
    		else{ 
    			$tabresult = $tabdbqry->getrowarray();
    			$requestids_loaded = $tabresult["loadedrequestids"];
    			$condition = "";
    			
    			if($requestids_loaded != '')
    				$condition = "AND da_tabkitmappingtorequest.request_id NOT IN ($requestids_loaded)";
    			
    			if($this->subject != "")
    				$condition .= "AND da_testRequest.subject = $this->subject";
    			else 
    				$condition .= "AND da_testRequest.subject != 1";
    				
    			//AND request_date >= '".constant("CONSIDERREQDATE")."'
    			$req_query = "SELECT GROUP_CONCAT(da_tabkitmappingtorequest.request_id ORDER BY da_tabkitmappingtorequest.request_id) AS notloadedrequestids
    						  FROM da_tabkitmappingtorequest 
							  LEFT JOIN da_tabletmaster ON da_tabkitmappingtorequest.kitno = da_tabletmaster.kitno
							  LEFT JOIN da_testRequest ON da_tabkitmappingtorequest.request_id = da_testRequest.id
							  WHERE status = 'Approved'
							  AND CASE WHEN da_testRequest.type = 'actual' THEN da_testRequest.drop_end_date < '".date("Y-m-d")."' ELSE 1=1 END
							  AND tabletid = $this->tabletid $condition ";//AND type != 'demo'
    			$req_dbqry = new dbquery($req_query,$this->connid);
    			$req_result = $req_dbqry->getrowarray();
    			if($req_result["notloadedrequestids"] == "") return "No Request IDs Available!";
    			else { 
    				$notlodedrequestids = $req_result["notloadedrequestids"];
    			}
    			if($notlodedrequestids != ""){
    				$this->ExportQuestionsAndImages($notlodedrequestids);
    				$this->UpdateTabletTest($this->tabletid,$notlodedrequestids);			
    			}	
    		}	
    	}else if($this->submited && $this->action == "GetData"){
    		if($this->requestidstr != '') return $this->ExportQuestionsAndImages(rtrim($this->requestidstr,","));
    	}else {
    		return "Invalid Tablet Id!";
    	}	
    }
    
    function UpdateTabletTest($tabletid,$requestidstr){
    	
    	if($tabletid == 0) return;
    	$valuestr = "";
    	$RequestArr = explode(",",$requestidstr);
    	foreach($RequestArr AS $key => $request_id){
    		$valuestr .= " ('".$tabletid."','".$request_id."',NOW()),";
    	}
    	$query = "INSERT IGNORE INTO da_tablettest (tablet_id,request_id,loaded_dt) VALUES ".rtrim($valuestr,",");
    	$dbqry = new dbquery($query,$this->connid);
    }
    
    function ExportQuestionsAndImages($requestidstr){
    	
    	if($requestidstr == "") return "Request IDs Not Found!";
    	//AND da_testRequest.request_date >= '".constant("CONSIDERREQDATE")."'
    	$query = "SELECT da_testRequest.id, da_paperDetails.papercode, da_paperDetails.version, da_paperDetails.qcode_list
				  FROM da_testRequest
				  LEFT JOIN da_paperDetails ON da_testRequest.paper_code = da_paperDetails.papercode
				  WHERE da_testRequest.id IN (".$requestidstr.") 
				  AND da_testRequest.status = 'Approved'
				  AND da_testRequest.paper_code != ''
				  AND CASE WHEN da_testRequest.type = 'actual' THEN da_testRequest.drop_end_date < '".date("Y-m-d")."' ELSE 1=1 END
				  AND da_paperDetails.papercode IS NOT NULL";
    	//AND da_testRequest.type = 'pilot' - we have removed as we have allowed all request ids allowed in export paper interface.
    	$dbqry = new dbquery($query,$this->connid);
    	if($dbqry->numrows() == 0){
    		
    		$this->msg = "Sorry! No Data Found For Requestids.";
    		return;
    		
    	} else {	
    		
    		$RequestIdsFound = "";
    		$ResultArr["PAPER"] = array();
    		$image_tag_arr = array();
	    	$sqlstr = "";
	    	
	    	while($result = $dbqry->getrowarray()){
	    		$ResultArr["PAPER"][$result["id"]][$result["version"]] = explode(",",$result["qcode_list"]);
	    	}
	    	
	    	$timestamp = date("YmdHis");
	    	
	    	$examqry = "SELECT request_id,exam_code,subject
	    			    FROM da_examDetails
	    			    LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
	    			    WHERE request_id IN ($requestidstr)";
	    	$exdbqry = new dbquery($examqry,$this->connid);
	    	while($result = $exdbqry->getrowarray()){
	    		$sqlstr .= "INSERT INTO da_examDetails (request_id,exam_code,subjectCode) VALUES ('".$result["request_id"]."','".$result["exam_code"]."','".$result["subject"]."');\r\n";
	    	}
	    	
	    	$files_to_zip = array();
	    	if(is_array($ResultArr["PAPER"]) && count($ResultArr["PAPER"] > 0)) {
		    	foreach($ResultArr["PAPER"] AS $request_id => $QcodesWithPaperVersion){
					$qcodelist = "";
		    		if(isset($QcodesWithPaperVersion[1]) && count($QcodesWithPaperVersion[1]) > 0)
		    			$order1arr = array_flip($QcodesWithPaperVersion[1]);
		    		
		    		if(isset($QcodesWithPaperVersion[2]) && count($QcodesWithPaperVersion[2]) > 0)
		    			$order2arr = array_flip($QcodesWithPaperVersion[2]);
		    		
		    		if(isset($QcodesWithPaperVersion[3]) && count($QcodesWithPaperVersion[3]) > 0)
		    			$order3arr = array_flip($QcodesWithPaperVersion[3]);
		    			    			
		    		if(isset($QcodesWithPaperVersion[4]) && count($QcodesWithPaperVersion[4]) > 0)
		    			$order4arr = array_flip($QcodesWithPaperVersion[4]);
		    		
		    		foreach ($QcodesWithPaperVersion[1] AS  $OrderKey => $Qcode){
		    			$qcodelist .= $Qcode.",";
		    		}
		    		
		    		$query = "SELECT qcode,question,optiona,optionb,optionc,optiond,correct_answer,da_questions.group_id,da_groupMaster.group_text 
		    				  FROM da_questions 
		    				  LEFT JOIN da_groupMaster ON da_questions.group_id = da_groupMaster.group_id 
		    				  WHERE qcode IN(".rtrim($qcodelist,",").")";
		    		//$query = "SELECT qcode,question,optiona,optionb,optionc,optiond,correct_answer FROM da_questions WHERE qcode IN(3077)";
		    		$dbqry = new dbquery($query,$this->connid);
		    		while($queresult = $dbqry->getrowarray()){
		    			
		    			$question = stripslashes($queresult["question"]);
		    			$optiona = $queresult["optiona"];
		    			$optionb = $queresult["optionb"];
		    			$optionc = $queresult["optionc"];
		    			$optiond = $queresult["optiond"];
		    			$group_text = $queresult["group_text"];
		    			$optioncontent = stripslashes($queresult["optiona"]."##".$queresult["optionb"]."##".$queresult["optionc"]."##".$queresult["optiond"]);
		    			
		    			$expr = "/<img[^>]*src=[\"|\'](.*)[\"|\']/Ui";
		    			preg_match_all($expr, $question, $images_arr, PREG_PATTERN_ORDER);
		    			if(count($images_arr[1]) > 0){
		    				$question_image_arr[] = $images_arr[1];
		    				$question = $this->ReplaceImgURL($images_arr[1],$question);
		    			}	
		    			
		    			preg_match_all($expr, $optioncontent, $images_arr2, PREG_PATTERN_ORDER);
		    			if(count($images_arr2[1]) > 0) {
		    				$option_image_arr[] = $images_arr2[1];
		    				
		    			}
		    			
		    			preg_match_all($expr, $group_text, $images_arr3, PREG_PATTERN_ORDER);
		    			if(count($images_arr3[1]) > 0) {
		    				$group_txt_image_arr[] = $images_arr3[1];
		    				$group_text = $this->ReplaceImgURL($images_arr3[1],$group_text);
		    			}
		    			
		    			# for optiona
		    			preg_match_all($expr, $optiona, $images_arr_a, PREG_PATTERN_ORDER);
		    			if(count($images_arr_a[1]) > 0) {
			    			$optiona = $this->ReplaceImgURL($images_arr_a[1],$optiona);
		    			}	
		    			
		    			# for optionb
		    			preg_match_all($expr, $optionb, $images_arr_b, PREG_PATTERN_ORDER);
		    			if(count($images_arr_b[1]) > 0) {
			    			$optionb = $this->ReplaceImgURL($images_arr_b[1],$optionb);
		    			}
		    			
		    			# for optionc
		    			preg_match_all($expr, $optionc, $images_arr_c, PREG_PATTERN_ORDER);
		    			if(count($images_arr_c[1]) > 0) {
			    			$optionc = $this->ReplaceImgURL($images_arr_c[1],$optionc);
		    			}
		    			
		    			# for optiond
		    			preg_match_all($expr, $optiond, $images_arr_d, PREG_PATTERN_ORDER);
		    			if(count($images_arr_d[1]) > 0) {
			    			$optiond = $this->ReplaceImgURL($images_arr_d[1],$optiond);
		    			}
		    			
		    			$question = $this->convert_line_breaks($question);
		    			$optiona = $this->convert_line_breaks($optiona);
		    			$optionb = $this->convert_line_breaks($optionb);
		    			$optionc = $this->convert_line_breaks($optionc);
		    			$optiond = $this->convert_line_breaks($optiond);
		    			$group_text = $this->convert_line_breaks($group_text);
		    			
		    			# removing junkchars if any
		    			$question = $this->common_pdf_junk_replace($question);
		    			$optiona = $this->common_pdf_junk_replace($optiona);
		    			$optionb = $this->common_pdf_junk_replace($optionb);
		    			$optionc = $this->common_pdf_junk_replace($optionc);
		    			$optiond = $this->common_pdf_junk_replace($optiond);
		    			$group_text = $this->common_pdf_junk_replace($group_text);
		    			
		    			$qcode = $queresult["qcode"];
		    			$group_id = $queresult["group_id"];
		    			
			    		//$expr = '/<img[^>]*src=[\"|\'](.*)[\"|\']/i';
			    		
		    			/*$expr = "/<img[^>]*src=[\"|\'](.*)[\"|\']/Ui";
		    			preg_match_all($expr, $question, $images_arr, PREG_PATTERN_ORDER);
		    			if(count($images_arr[1]) > 0){
		    				$question_image_arr[] = $images_arr[1];
		    				$question = $this->ReplaceImgURL($images_arr[1],$question);
		    			}	
		    			
		    			preg_match_all($expr, $optioncontent, $images_arr2, PREG_PATTERN_ORDER);
		    			if(count($images_arr2[1]) > 0) {
		    				$option_image_arr[] = $images_arr2[1];
		    				
		    			}
		    			
		    			preg_match_all($expr, $group_text, $images_arr3, PREG_PATTERN_ORDER);
		    			if(count($images_arr3[1]) > 0) {
		    				$group_txt_image_arr[] = $images_arr3[1];
		    				$group_text = $this->ReplaceImgURL($images_arr3[1],$group_text);
		    			}
		    			
		    			# for optiona
		    			preg_match_all($expr, $optiona, $images_arr_a, PREG_PATTERN_ORDER);
		    			if(count($images_arr_a[1]) > 0) {
			    			$optiona = $this->ReplaceImgURL($images_arr_a[1],$optiona);
		    			}	
		    			
		    			# for optionb
		    			preg_match_all($expr, $optionb, $images_arr_b, PREG_PATTERN_ORDER);
		    			if(count($images_arr_b[1]) > 0) {
			    			$optionb = $this->ReplaceImgURL($images_arr_b[1],$optionb);
		    			}
		    			
		    			# for optionc
		    			preg_match_all($expr, $optionc, $images_arr_c, PREG_PATTERN_ORDER);
		    			if(count($images_arr_c[1]) > 0) {
			    			$optionc = $this->ReplaceImgURL($images_arr_c[1],$optionc);
		    			}
		    			
		    			# for optiond
		    			preg_match_all($expr, $optiond, $images_arr_d, PREG_PATTERN_ORDER);
		    			if(count($images_arr_d[1]) > 0) {
			    			$optiond = $this->ReplaceImgURL($images_arr_d[1],$optiond);
		    			}*/
		    			
		    			
		    			$sqlstr .= "INSERT INTO Questionbank (request_id,qcode,order1,order2,order3,order4,question,optiona,optionb,optionc,optiond,group_text,groupId) ".
			    				   "VALUES ('".$request_id."','".$qcode."','".($order1arr[$qcode]+1)."','".($order2arr[$qcode]+1)."','".($order3arr[$qcode]+1)."','".($order4arr[$qcode]+1)."','".trim($question)."','".$optiona."','".$optionb."','".$optionc."','".$optiond."','".$group_text."','".$group_id."');\r\n";
		    		}
		    		
		    		# creating single dimension array from multi dimensional
		    		if(is_array($question_image_arr) && count($question_image_arr) > 0){
			    		foreach($question_image_arr as $key => $valuearr){
			    			foreach($valuearr as $key => $url){
			    				$que_img_arr[] = $url;
			    			}
			    		}
		    		}
		    		
		    		if(is_array($option_image_arr) && count($option_image_arr) > 0){
			    		foreach($option_image_arr as $key => $valuearr){
			    			foreach($valuearr as $key => $url){
			    				$opt_img_arr[] = $url;
			    			}
			    		}
		    		}
		    		
		    		if(is_array($group_txt_image_arr) && count($group_txt_image_arr) > 0){
			    		foreach($group_txt_image_arr as $key => $valuearr){
			    			foreach($valuearr as $key => $url){
			    				$grouptext_img_arr[] = $url;
			    			}
			    		}
		    		}
		    		

		    		if(is_array($que_img_arr) && count($que_img_arr) > 0) {
			    		foreach($que_img_arr as $key => $image_url){
			    			
			    			$imagesizes = getimagesize(constant("PATH_REPORTIMAGES").basename($image_url));
			    			
			    			if($imagesizes[0] > constant("TABLET_QUEIMAGE_MAXWIDTH") || $imagesizes[1] > constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				if(!is_dir(constant("PATH_TEMP")."imageresized_".$timestamp))
									mkdir(constant("PATH_TEMP")."imageresized_".$timestamp,0755);
			    			}
			    			
			    			if($imagesizes[0] > constant("TABLET_QUEIMAGE_MAXWIDTH") && $imagesizes[1] < constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,constant("TABLET_QUEIMAGE_MAXWIDTH"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}elseif($imagesizes[0] < constant("TABLET_QUEIMAGE_MAXWIDTH") && $imagesizes[1] > constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,'',constant("TABLET_QUEIMAGE_MAXHEIGHT"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}elseif($imagesizes[0] > constant("TABLET_QUEIMAGE_MAXWIDTH") && $imagesizes[1] > constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,constant("TABLET_QUEIMAGE_MAXWIDTH"),constant("TABLET_QUEIMAGE_MAXHEIGHT"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}else {
			    				$files_to_zip[] = constant("PATH_REPORTIMAGES").basename($image_url);
			    			}
			    			//$files_to_zip[] = basename($image_url);
			    		}
		    		}
		    		
		    		
		    		if(is_array($opt_img_arr) && count($opt_img_arr) > 0) {
			    		foreach($opt_img_arr as $key => $image_url){
			    			
			    			$imagesizes = getimagesize(constant("PATH_REPORTIMAGES").basename($image_url));
			    			
			    			if($imagesizes[0] > constant("TABLET_OPTIMAGE_MAXWIDTH") || $imagesizes[1] > constant("TABLET_OPTIMAGE_MAXHEIGHT")){
			    				
			    				if(!is_dir(constant("PATH_TEMP")."imageresized_".$timestamp."/"))
									mkdir(constant("PATH_TEMP")."imageresized_".$timestamp."/",0755);
			    			}
			    			
			    			if($imagesizes[0] > constant("TABLET_OPTIMAGE_MAXWIDTH") && $imagesizes[1] < constant("TABLET_OPTIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,constant("TABLET_OPTIMAGE_MAXWIDTH"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}elseif($imagesizes[0] < constant("TABLET_OPTIMAGE_MAXWIDTH") && $imagesizes[1] > constant("TABLET_OPTIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,'',constant("TABLET_OPTIMAGE_MAXHEIGHT"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}elseif($imagesizes[0] > constant("TABLET_OPTIMAGE_MAXWIDTH") && $imagesizes[1] > constant("TABLET_OPTIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,constant("TABLET_OPTIMAGE_MAXWIDTH"),constant("TABLET_OPTIMAGE_MAXHEIGHT"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}else {
			    				$files_to_zip[] = constant("PATH_REPORTIMAGES").basename($image_url);
			    			}
			    		}
		    		}
		    		
		    		if(is_array($grouptext_img_arr) && count($grouptext_img_arr) > 0) {
			    		foreach($grouptext_img_arr as $key => $image_url){
			    			
			    			$imagesizes = getimagesize(constant("PATH_REPORTIMAGES").basename($image_url));
			    			
			    			if($imagesizes[0] > constant("TABLET_QUEIMAGE_MAXWIDTH") || $imagesizes[1] > constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				if(!is_dir(constant("PATH_TEMP")."imageresized_".$timestamp))
									mkdir(constant("PATH_TEMP")."imageresized_".$timestamp,0755);
			    			}
			    			
			    			if($imagesizes[0] > constant("TABLET_QUEIMAGE_MAXWIDTH") && $imagesizes[1] < constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,constant("TABLET_QUEIMAGE_MAXWIDTH"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}elseif($imagesizes[0] < constant("TABLET_QUEIMAGE_MAXWIDTH") && $imagesizes[1] > constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,'',constant("TABLET_QUEIMAGE_MAXHEIGHT"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}elseif($imagesizes[0] > constant("TABLET_QUEIMAGE_MAXWIDTH") && $imagesizes[1] > constant("TABLET_QUEIMAGE_MAXHEIGHT")){
			    				
			    				$this->ImageResize($timestamp,$image_url,constant("TABLET_QUEIMAGE_MAXWIDTH"),constant("TABLET_QUEIMAGE_MAXHEIGHT"));
			    				$files_to_zip[] = constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url);
			    				
			    			}else {
			    				$files_to_zip[] = constant("PATH_REPORTIMAGES").basename($image_url);
			    			}
			    		}
		    		}
		    		
		    		
		    	}
		    	   	
		    	//$sqlfile = "questions_".$timestamp.".sql";
		    	$sqlfile = "db.sql";
		    	$handler = fopen(constant("PATH_TEMP").$sqlfile, "w");
				fwrite($handler,trim($sqlstr));
				fclose($handler);
				if(file_exists(constant("PATH_TEMP").$sqlfile))
					$files_to_zip[] = constant("PATH_TEMP").$sqlfile;
				
		    	#$this->msg = "Questions Attached For Request Ids: ".rtrim($RequestIdsFound,",");
		    	$result = $this->create_zip(array_unique($files_to_zip),"update_".$timestamp.".zip",true);
		    	if($result) $this->ForceDownload("update_".$timestamp.".zip");
		    	@unlink(constant("PATH_TEMP").$sqlfile);
		    	if(is_dir(constant("PATH_TEMP")."imageresized_".$timestamp))
					rmdir(constant("PATH_TEMP")."imageresized_".$timestamp);
		    	ob_end_flush();
		    	return;
    		}
    	}
    }
    

    function ImageResize($timestamp,$image_url,$width="",$height=""){
    	
    	include_once(constant("PATH_ABSOLUTE_CLASSES")."eidaresizeimage.cls.php");
    	$image = new SimpleImage();
    	$image->load(constant("PATH_REPORTIMAGES").basename($image_url));
    	
    	if($width != '' && $height != '')
			$image->resize($width,$height);
		elseif($width != '' && $height = '')
			$image->resizeToWidth($width);
		elseif($width = '' && $height != '')
			$image->resizeToHeight($height);
		
		$image->save(constant("PATH_TEMP")."imageresized_".$timestamp."/".basename($image_url));
    }
    
	function create_zip($files = array(),$archivefilename = "",$overwrite = false) {
	
		//if the zip file already exists and overwrite is false, return false
		if(file_exists(constant("PATH_TEMP").$archivefilename) && !$overwrite) { return false; }
		
		$valid_files = array();
		
		if(is_array($files)) {
			foreach($files as $file) {
			  if(file_exists($file)){
			  	$valid_files[] = $file;
			  }	
			}
		}
		if(count($valid_files)){
		
			$zip = new ZipArchive();
			if($zip->open(constant("PATH_TEMP").$archivefilename,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true)
				return false;
			
			foreach($valid_files as $file) {
				
				if(substr(strrchr(basename($file), '.'), 1) == "sql"){
					$zip->addFile($file,basename($file));
				}	
				else	
					$zip->addFile($file,"detailed_assessment/images/".basename($file));
			}
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			$zip->close();
			return file_exists(constant("PATH_TEMP").$archivefilename);
		}
		else
			return false;
		
	}

	function ForceDownload($archivefilename){
		
		if($archivefilename == "") return;
		if(ini_get('zlib.output_compression')) {
			ini_set('zlib.output_compression', 'Off');
		}
		ob_end_clean();
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/zip');
	    header('Content-Disposition: attachment; filename="'.$archivefilename);
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize(constant("PATH_TEMP").$archivefilename));
	    readfile(constant("PATH_TEMP").$archivefilename);
		@unlink(constant("PATH_TEMP").$archivefilename);
	}
	
	function zipFilesAndDownload($file_names,$archive_file_name,$file_path)
	{
	  //create the object
	  $zip = new ZipArchive();
	  //create the file and throw the error if unsuccessful
	  if ($zip->open($archive_file_name, ZIPARCHIVE::CREATE )!==TRUE) {
	    exit("cannot open <$archive_file_name>\n");
	  }
	
	  //add each files of $file_name array to archive
	  foreach($file_names as $files)
	  {
	    $zip->addFile($file_path.$files,$files);
	  }
	  $zip->close();
	
	  //then send the headers to foce download the zip file
	  header("Content-type: application/zip");
	  header("Content-Disposition: attachment; filename=$archive_file_name");
	  header("Pragma: no-cache");
	  header("Expires: 0");
	  readfile("$archive_file_name");
	  exit;
	}
	
	function PageTabletTestList(){
		$this->setpostvars();
    	$this->setgetvars();
		$resultarr = array();
		
		if($this->action == "GetList" && $this->schoolsearchCode != "Select"){
			$query = "SELECT kitno,GROUP_CONCAT(tabletid) AS tabletids FROM da_tabletmaster WHERE 1 =1 GROUP BY kitno ";
			$dbqry = new dbquery($query,$this->connid);
			while($result = $dbqry->getrowarray()){
				$TabletList[$result["kitno"]] = explode(",",$result["tabletids"]); 
			}
			
			//AND da_testRequest.request_date >= '".constant("CONSIDERREQDATE")."'
			$condition = "";
			if(isset($this->request_id) && $this->request_id != '')
	    		$condition .= "AND da_testRequest.id = '".$this->request_id."'";
	    		
	    	if(isset($this->kitno) && $this->kitno != '')
	    		$condition .= "AND da_tabkitmappingtorequest.kitno = '".$this->kitno."'";
				
			if(isset($this->schoolsearchCode) && $this->schoolsearchCode != 'Select' && $this->schoolsearchCode != '')
				$condition .= "AND da_testRequest.schoolCode = '".$this->schoolsearchCode."'";	
	
			/*$sch_query = "SELECT GROUP_CONCAT(DISTINCT(schoolCode)) AS schoolCodes FROM da_testRequest WHERE optfor_device = 4";
			$sch_dbqry = new dbquery($sch_query,$this->connid);
			$sch_result = $sch_dbqry->getrowarray();
			$school_code_str = $sch_result["schoolCodes"];*/
			
			$query2 = "SELECT da_testRequest.id,GROUP_CONCAT(DISTINCT(da_examDetails.exam_code) ORDER BY da_examDetails.exam_code SEPARATOR ', ') as examcodes,
					   da_tabkitmappingtorequest.kitno,GROUP_CONCAT(DISTINCT(da_tablettest.tablet_id) ORDER BY da_tablettest.tablet_id SEPARATOR ', ')  AS loadedtabletids
					   FROM da_testRequest
					   LEFT JOIN da_tabkitmappingtorequest on da_testRequest.id = da_tabkitmappingtorequest.request_id
					   LEFT JOIN da_tabletmaster ON da_tabkitmappingtorequest.kitno = da_tabletmaster.kitno
					   LEFT JOIN da_tablettest ON da_tabletmaster.tabletid = da_tablettest.tablet_id AND da_tabkitmappingtorequest.request_id = da_tablettest.request_id
					   LEFT JOIN da_examDetails ON da_testRequest.id = da_examDetails.request_id
					   WHERE da_testRequest.status = 'Approved' AND da_testRequest.optfor_device = 4
					   AND da_testRequest.paper_code != '' $condition
					   group by da_testRequest.id,da_tabkitmappingtorequest.kitno";//AND da_testRequest.type != 'demo' 
			
			//AND da_testRequest.schoolCode IN($school_code_str)
		
			$dbqry2 = new dbquery($query2,$this->connid);
			if ($dbqry2->numrows()>0)
	        {
	           while($row = $dbqry2->getrowarray()){
	         	
	           		$notloadedtabletids = "";
	           		
	           		if(isset($row["kitno"])) {
	           			
	           			$loadedtabletarr[$row["kitno"]] = array();
	           			if($row["loadedtabletids"] != ""){
	       					$loadedtabletarr[$row["kitno"]] = explode(", ",trim($row["loadedtabletids"]));
		       				$newarr = array_diff($TabletList[$row["kitno"]],$loadedtabletarr[$row["kitno"]]);
			           		asort($newarr,SORT_NUMERIC);
			           		$notloadedtabletids = implode(", ",$newarr);
	           			}else {
	           				$notloadedtabletids = implode(", ",$TabletList[$row["kitno"]]);
	           			}
	           		}	
	           			
	           		$resultarr[] = array("requestid" => $row["id"],
	           							 "examcodes" => $row["examcodes"],
	           							 "kitno" => $row["kitno"],
	           							 "loadedtabletids" => $row["loadedtabletids"],
	           							 "notloadedtabletids" => $notloadedtabletids 
	           							 );
	           	  	
	           }
	        }
		} 
        return $resultarr;
	}
			
	function ReplaceImgURL($imagesarr,$content){
		
		if(!is_array($imagesarr) || count($imagesarr) == 0 || $content == "") return;
		
		foreach($imagesarr as $key => $url){
			if(stripos($url,"http") === false){
				$arr = array();
				$arr = explode("/",strrev($url));
				$newvar = "http://www.educationalinitiatives.com/detailed_assessment/images/".strrev($arr[0]);
				$srchimg = str_replace("/","\/",$url);
				$content = preg_replace('/<img[^>]*src=[\"|\']('.$srchimg.')[\"|\']/i' ,"<IMG src=\"".$newvar."\"", $content);
			}
		}
		return $content;
	}
	
	function convert_line_breaks($string) {
		$patterns = array("\r","\n","\r\n","'");
	    $replacements = array("","","","''");
	    foreach($patterns as $key => $value){
	    	$string = str_replace($value, $replacements[$key], $string);
	    }
	    return $string;
	}
	
	function PageAssignSchool(){
		
        global $constant_da;

		$this->setpostvars();
    	$this->setgetvars();
		
    	$resultarr = array();
		$resultarr_delete = array();
		
		if($this->submited)
		{
		    if($this->action=='Delete')
			{
			 
		 		$query = "SELECT id,schoolCode FROM da_testRequest where schoolCode = '".$this->school_code."'AND optfor_device = '4'";// AND type != 'demo'
				$dbqry = new dbquery($query,$this->connid);
				if ($dbqry->numrows()>0)
				{
					while($row = $dbqry->getrowarray()){	
						$resultarr_delete[] = array("schoolCode1" => $row["schoolCode1"],
					 								"requestid" => $row["id"]);
					}
					
					foreach($resultarr_delete as $row)
					{
						$query = "select request_id from da_tablettest where request_id = '".$row['requestid']."'";
						$dbqry = new dbquery($query,$this->connid);
						if ($dbqry->numrows()>0)	{
							$this->msg = "Unable To Delete because of loaded Tablets";
							$msg_flag = 1;
						}
				    }
				    	
					if($this->msg=='')
					{
						$query = "Update da_testRequest set optfor_device = '0' where schoolCode = '".$this->school_code."'";// AND type!='demo'
						$dbqry = new dbquery($query,$this->connid);		
						foreach($resultarr_delete as $row)
						    {
							$query = "Delete from da_tabkitmappingtorequest where request_id = '".$row['requestid']."'";
							$dbqry = new dbquery($query,$this->connid);		
							}
					}				
				}
				header("location: daAdmin_assignSchoolTotablet.php?msg=".$msg_flag);
			}
			if($this->action=='Save')
			{
				 foreach($this->school_id as $schoolcode)
				 {
				 	$query = "Update da_testRequest set optfor_device = '4' where schoolCode = '".$schoolcode."')";// AND type != 'demo'
					$dbqry = new dbquery($query,$this->connid);
					$msg_flag = 2;
				 }
				 $this->msg = 'School Successfully Added';
				 header("location: daAdmin_assignSchoolTotablet.php?msg=".$msg_flag);
			}
			
		}
		
		$query2 = "SELECT DISTINCT(da_testRequest.schoolCode),schools.schoolname
				   FROM da_testRequest
				   LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_testRequest.schoolCode = schools.schoolno
				   WHERE da_testRequest.optfor_device = 4 AND da_testRequest.status = 'Approved'
				   ORDER BY schools.schoolname";//AND da_testRequest.type != 'demo' 
		$dbqry2 = new dbquery($query2,$this->connid);
		if ($dbqry2->numrows()>0)
        {
           while($row = $dbqry2->getrowarray()){	
           		$resultarr[] = array("schoolCode" => $row["schoolCode"],
           							 "schoolname" => $row["schoolname"],
           							);
           }
        }
        
        return $resultarr;
	}
	
	function GetSchoolListToOptForTablet(){
        global $constant_da;
               
        $returnarr = array();
		$query2 = "SELECT DISTINCT(da_testRequest.schoolCode),schools.schoolname,schools.city
				   FROM da_testRequest
				   LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_testRequest.schoolCode = schools.schoolno
				   WHERE da_testRequest.optfor_device = 0 AND da_testRequest.status = 'Approved'
				   AND da_testRequest.schoolCode != 0
				   ORDER BY schools.schoolname";
		$dbqry2 = new dbquery($query2,$this->connid);
		if ($dbqry2->numrows()>0)
        {
           while($row = $dbqry2->getrowarray()){	
           		$resultarr[$row["schoolCode"]] = array("schoolCode" => $row["schoolCode"],
           							 "schoolname" => $row["schoolname"],
           							 "city"=>$row["city"]
           							);
           }
        }
        return $resultarr;
	}

	function PageGenerateReports(){
		
		$this->setpostvars();
    	$this->setgetvars();
    	$resultarr = array();
    	$genExamcodes = "";
    	$NotGenExamcodes = "";

    	if($this->submited && $this->action == "GetQuestion"){
    	
			$query = "SELECT da_paperDetails.qcode_list,GROUP_CONCAT(DISTINCT(da_examDetails.exam_code) ORDER BY exam_code) AS examcodes 
					  FROM da_testRequest
					  LEFT JOIN da_examDetails ON da_testRequest.id = da_examDetails.request_id
					  LEFT JOIN da_paperDetails ON da_testRequest.paper_code = da_paperDetails.papercode
					  WHERE da_testRequest.id = '".$this->id."' AND da_paperDetails.version = 1
					  GROUP BY da_testRequest.id";
    		$dbqry = new dbquery($query,$this->connid);
    		if($dbqry->numrows() == 0) $this->msg = "Invalid Request ID..!";
    		else {
    			$result = $dbqry->getrowarray();
    			$qcode_list = $result["qcode_list"];
                if(!empty($result["examcodes"])){                
                    $exam_query = "SELECT exam_code,report_status,report_date,no_of_students,response_received FROM da_examDetails WHERE exam_code IN(".$result["examcodes"].") AND request_id = '".$this->id."'";
                    $exam_dbqry = new dbquery($exam_query,$this->connid);
                    while($examresult = $exam_dbqry->getrowarray()){

                        $resultarr["EXAMCODEDETAILS"][$examresult["exam_code"]] = array("examcode"=>$examresult["exam_code"],
                                                                                        "report_status" =>$examresult["report_status"],
                                                                                        "report_date"=>$examresult["report_date"],
                                                                                        "no_of_students"=>$examresult["no_of_students"],
                                                                                        "response_received"=>$examresult["response_received"]
                                                                                        );

                    }

                    $resultarr["EXAMCODES"] = $result["examcodes"];

                    $query2 = "SELECT da_questions.qcode,da_questions.question,da_questions.optiona,da_questions.optionb,da_questions.optionc,da_questions.optiond,
                                      da_questions.misconception,GROUP_CONCAT(da_questions_versions.version ORDER BY da_questions_versions.version) AS qversions
                               FROM da_questions
                               LEFT JOIN da_questions_versions ON da_questions.qcode = da_questions_versions.qcode
                               WHERE da_questions.qcode IN($qcode_list)
                               GROUP BY da_questions.qcode";
                    $dbqry2 = new dbquery($query2,$this->connid);
                    while($row = $dbqry2->getrowarray()){

                        $resultarr["QUES"][$row["qcode"]] = array("qcode" => $row["qcode"],
                                                          "question" => $row["question"],
                                                          "optiona" => $row["optiona"],
                                                          "optionb" => $row["optionb"],
                                                          "optionc" => $row["optionc"],
                                                          "optiond" => $row["optiond"],
                                                          "misconception"=>$row["misconception"],
                                                          "qversions" => $row["qversions"]
                                                          );
                    }

                    $query3 = "SELECT qcode,version,question_maker,submit_date FROM da_questions_versions WHERE qcode IN($qcode_list) AND status = 3 ORDER BY version";
                    $dbqry3 = new dbquery($query3,$this->connid);
                    while($row3 = $dbqry3->getrowarray()){

                        $resultarr["VERSIONS"][$row3["qcode"]][$row3["version"]] = array("qcode" => $row3["qcode"],
                                                                                         "version" => $row3["version"],
                                                                                         "question_maker" => $row3["question_maker"],
                                                                                         "submit_date" => $row3["submit_date"]
                                                                                         );
                    }
                }
            }
    		return $resultarr;	
    	}
    	
		if($this->submited && $this->action == "Save"){
			
			if(!is_array($this->examcodes) || count($this->examcodes) == 0 || $this->id == 0 || $this->id == "")
				return;
				
			if($this->usedextversion == 1){
				$this->SaveReportGenRequest();
			}else{
				$this->RegenerateReports(0);
			}
			
		}
		
		if($this->submited && $this->action == "GenerateReport"){
			
			if(!is_array($this->examcodes) || count($this->examcodes) == 0)
				return;
			$this->RegenerateReports(0);
		}
	}
	
	function SaveReportGenRequest()
	{
		$DropQues = "";
		
		if(is_array($this->drop_ques) && count($this->drop_ques)>0)
			$DropQues = implode(",",$this->drop_ques);
			
		$ExamCodes = implode(",",$this->examcodes);
		$username = $_SESSION['username'];
		$clsdareports = new clsdareports();
			
		$query = "INSERT INTO da_reportsRegen (request_id,exam_codes,drop_ques,comments,requested_by,requested_dt)
				  VALUES ('".$this->id."','".$ExamCodes."','".$DropQues."','".addslashes($this->remarks)."','".$username."',NOW())";
	  	$dbqry = new dbquery($query,$this->connid);
		$regen_id = $dbqry->insertid;
		
		if(is_array($this->ques_with_versions) && count($this->ques_with_versions) > 0 && $regen_id != 0){

			foreach($this->ques_with_versions as $qcode => $version){
				$query2 = "INSERT INTO da_reportsRegen_questions (regen_id,qcode,version)
						   VALUES('".$regen_id."','".$qcode."','".$version."')";	
				$dbqry2 = new dbquery($query2,$this->connid);
			}
		}
		if($regen_id != 0){
			
			$this->ReScoring($this->id,$this->examcodes,$DropQues,$regen_id);
			$this->RegenerateReports($regen_id);
		}
	}
	
	function RegenerateReports($regen_id=0){
		
		$genExamcodes = "";
    	$NotGenExamcodes = "";
    	$clsdareports = new clsdareports();
		foreach($this->examcodes as $key => $examcode){
			if($this->CheckResoponseAvailability($examcode)){
				$clsdareports->GenerateStudentReport($examcode,$request_id=0,$reqstudentid=0,$this->connid,$regen_id);
				$clsdareports->GenerateSectionReport($examcode,$request_id=0,$this->connid,$regen_id);
				$genExamcodes .= $examcode.",";
			}else {
				$NotGenExamcodes .= $examcode.",";
			}
		}
		if($genExamcodes != "") {
			
			$up_query = "UPDATE da_examDetails SET report_status = 'generated',report_date = NOW() WHERE exam_code IN(".rtrim($genExamcodes,",").")";
			$up_dbqry = new dbquery($up_query,$this->connid);
			
			$check_query = "SELECT COUNT(*) FROM da_examDetails WHERE report_status = 'pending' AND request_id = '".$this->id."'";
			$check_dbqry = new dbquery($check_query,$this->connid);
			if($check_dbqry->numrows() == 0 || $regen_id != 0){
				
				$clsdareports->GenerateSchoolReport($this->id,$this->connid,$regen_id);
				
				$up_status_qry = "UPDATE da_testRequest SET scoring_date = NOW() WHERE id = '".$this->id."'";
				$up_status_dbqry = new dbquery($up_status_qry,$this->connid);
			}
		}
		if($genExamcodes != "")
			$this->msg = "Reports Generated For Examcodes:".rtrim($genExamcodes,",");
		if($NotGenExamcodes != "")
			$this->msg .= "\r\nReports Not Generated For Examcodes Due To No Response Available: ".rtrim($NotGenExamcodes,",");	
	}
	
	
	function CheckResoponseAvailability($examcode){
		
		if($examcode == 0 || $examcode == "") return false;
		
		$query = "SELECT count(*) AS response_received FROM da_response WHERE examCode = '".$examcode."'";
		$dbqry = new dbquery($query,$this->connid);
		$result = $dbqry->getrowarray();
		if($result["response_received"] > 0)
			return true;
		else 
			return false;	
	}
	
	function ReScoring($request_id,$examcode_arr,$dropques,$regenerteid) {

		$PaperWiseQue = array();
		$VersionQue = array();
		$DropQueArr = array();
		$QueCorrecAnswers = array();
		
		if($dropques != '')
			$DropQueArr = explode(",",$dropques);
			
		$query = "SELECT papercode,version,qcode_list,da_testRequest.approved_date FROM da_paperDetails 
				  LEFT JOIN da_testRequest ON da_paperDetails.papercode = da_testRequest.paper_code
				  WHERE da_testRequest.id = '".$request_id."'";
		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray()){
			$PaperWiseQue[$row["version"]] = $row["qcode_list"];
			$approved_date = $row["approved_date"];
		}
		
		$QcodeStr = "";
		$query2 = "SELECT qcode,version FROM da_reportsRegen_questions WHERE regen_id = '".$regenerteid."'";
		$dbqry2 = new dbquery($query2,$this->connid);
		while($row2 = $dbqry2->getrowarray()){
			if($row2["version"] != 0)
				$VersionQue[$row2["qcode"]] = $row2["version"];
			else 
				$QcodeStr .= $row2["qcode"].",";	
		}
			
		if(is_array($VersionQue) && count($VersionQue) > 0){
			
			foreach($VersionQue as $qcode => $version){
				
				$query = "SELECT qcode,correct_answer,misconception,version FROM da_questions_versions WHERE qcode = '".$qcode."' AND version = '".$version."'";
				$dbqry = new dbquery($query,$this->connid);
				$ansres = $dbqry->getrowarray();
				$QueCorrecAnswers[$qcode] = array("tablename"=>"da_questions_versions","version"=>$ansres["version"],"misconception"=>$ansres["misconception"],"correct_answer"=>$ansres["correct_answer"]);
			}
		}
		
		# Fetching Correct answers for all qcodes as per the new question version logic if its not there in version questions
		if($QcodeStr != "") {
			$clsdaquestion = new clsdaquestion();
			# merging above array we find from version questions
			$QueCorrecAnswers += $clsdaquestion->GetCorrectAnsOfQcodeForTestReq($this->connid,rtrim($QcodeStr,","),$approved_date);
			
		}
		
		for ($i=1;$i<=75;$i++) $select.="A".$i.",";

		foreach($examcode_arr as $key => $exam_code) {
			
			$query = "SELECT $select sno,studentID,paperversion FROM da_response WHERE examcode='$exam_code' ORDER BY paperversion";
			$dbqry = new dbquery($query,$this->connid);
			
			while($row = $dbqry->getrowassocarray()) {
				
				$qcodes = explode(",",$PaperWiseQue[$row["paperversion"]]);
			
				$total=0;
				$set_response_string='';
					
				foreach ($qcodes as $key=>$value) { // for each qcode get correct answer and check student response
					
					if(in_array($value,$DropQueArr)) {  // drop question
						$set_response_string.="R".($key+1)."='1',";
						$total++;
					} else {
						
						if(array_key_exists($value,$QueCorrecAnswers)) $correct_answer = $QueCorrecAnswers[$value]["correct_answer"];
						/*else {
							
							$returnarr = $clsdaquestion->GetCorrectAnsOfQcodeForTestReq($this->connid,$value,$approved_date);
							$correct_answer = $returnarr[$value]["correct_answer"];
							array_push($QueCorrecAnswers,$returnarr[$value]);						
						}*/
						
						$response = $row["A".($key+1)];
						
						if($response==$correct_answer) {
							$total++;
							$set_response_string.="R".($key+1)."='1',";
						} else $set_response_string.="R".($key+1)."='0',";
					}
				}
				
				$update="UPDATE da_response SET $set_response_string total='$total' WHERE sno='$row[sno]'";
				mysql_query($update) or die("doScoring update".mysql_error());
			}			
		}
	}
	
	function PagePilotTarget(){
		
		$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->submited && $this->action == "GetRegionTarget"){
    		return $RegionWiseTarget = $this->fetchRegionWiseTarget();
    	}
    	
    	if($this->submited && $this->action == "SaveTargetData"){
    		
    		if(is_array($this->regionwisetarget) && count($this->regionwisetarget) > 0 && $this->target_month != 0 && $this->target_year != 0){
	    		foreach($this->regionwisetarget as $region => $target){
	    			
	    			$query = "INSERT INTO da_pilotTestTarget (month,year,region,tot_target,created_dt,created_by) VALUES ('".$this->target_month."','".$this->target_year."','".$region."','".$target."',NOW(),'".$_SESSION["username"]."')
	    					  ON DUPLICATE KEY UPDATE tot_target = '".$target."', updated_dt = NOW(),updated_by = '".$_SESSION["username"]."'";
	    			$dbqry = new dbquery($query,$this->connid);
	    		}
	    		$this->msg = "Successfully Saved!";
	    		#return $RegionWiseTarget = $this->fetchRegionWiseTarget();
    		}
    	}
	}
	
	function fetchRegionWiseTarget(){
		
		if($this->target_month == 0 || $this->target_year == 0) return;
		$TargetArray = array();
		
		$query = "SELECT region,tot_target FROM da_pilotTestTarget WHERE month = '".$this->target_month."' AND year = '".$this->target_year."'";
		$dbqry = new dbquery($query,$this->connid);
		if($dbqry->numrows() > 0) {
			while($result = $dbqry->getrowarray()){
				$TargetArray[$result["region"]] = $result["tot_target"];
			}
		}
		
		return $TargetArray;
	}
	
	function GetTargetData(){
		
		$this->setgetvars();
		$this->setpostvars();
		
		$condition = "";
		$TargetList = array();
		
		if($this->target_month != "0")
		{
			$condition .= " AND month = '".$this->target_month."'";
		}
		if($this->target_year!="0")
		{
			$condition .= " AND year = '".$this->target_year."'";
		}
		if($this->region != "0" && $this->region != "")
		{
			$condition .= " AND region = '".$this->region."'";
		}
		
		$query = "SELECT id,month,year,region,tot_target,created_by,created_dt,updated_by,updated_dt FROM 
				  da_pilotTestTarget WHERE  1 =1 ".$condition;
		$dbqry = new dbquery($query,$this->connid);
		while($result = $dbqry->getrowarray()){
			$TargetList[] = array("id" => $result["id"],
								"month" => $result["month"],
								"year" => $result["year"],
								"region" => $result["region"],
								"tot_target" => $result["tot_target"],
								"created_dt" => $result["created_dt"],
								"created_by" => $result["created_by"],
								"updated_dt" => $result["updated_dt"],
								"updated_by" => $result["updated_by"]
								);
		}
		return $TargetList;
		
	}
	
	function GetTestRequestedSchools(){
        global $constant_da;

		#For misconception PDF generate page year filter 04-07-2012
		$this->setpostvars();
		$this->setgetvars();
		
		$condition = "";		
		if($this->year != "ALL" && $this->year != '')
		{
			$condition .= " AND da_testRequest.year = '$this->year'";
		}	
		#For misconception PDF generate page year filter 04-07-2012
		
		$resultarr = array();
		$query2 = "SELECT DISTINCT(da_testRequest.schoolCode),schools.schoolname
				   FROM da_testRequest
				   LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_testRequest.schoolCode = schools.schoolno
				   WHERE da_testRequest.status = 'Approved'
				   AND da_testRequest.type = 'actual'
				   AND da_testRequest.schoolCode != 0 $condition
				   ORDER BY schools.schoolname";
		$dbqry2 = new dbquery($query2,$this->connid);
		if ($dbqry2->numrows()>0)
        {
           while($row = $dbqry2->getrowarray()){	
           		$resultarr[] = array("schoolCode" => $row["schoolCode"],
           							 "schoolname" => $row["schoolname"],
           							);
           }
        }
        return $resultarr;
		
	}
	
	function PageMisconceptionqQuestionReport(){
		
		$this->setgetvars();
		$this->setpostvars();
		
		if($this->submited) {
		
			if($this->action == "GetRequest"){
				
				#For misconception PDF generate page year filter 04-07-2012
				$condition = "";
				if($this->year != "ALL")
					$condition .= " AND da_testRequest.year = '$this->year'";
				#For misconception PDF generate page year filter 04-07-2012
				
				$query ="SELECT da_testRequest.id,da_testRequest.subject,da_testRequest.class,da_testRequest.testName,da_examDetails.exam_code,da_examDetails.section,
								da_examDetails.miscon_qcode_list,da_examDetails.class_avg,da_examDetails.report_status,
								da_examDetails.lowperform_qcode_list
						 FROM da_examDetails 
						 LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
						 WHERE da_testRequest.schoolCode = '".$this->school_code."' $condition
						 ORDER BY da_testRequest.subject,da_testRequest.class";
				$dbqry = new dbquery($query,$this->connid);
				if ($dbqry->numrows()>0)
		        {
					while($row = $dbqry->getrowarray()){	
		           		$resultarr["EXAMCODES"][] = array(
		           							 "request_id" => $row["id"],
		           							 "testName" => $row["testName"],
		           							 "subject" => $row["subject"],
		           							 "class" => $row["class"],
		           							 "exam_code" => $row["exam_code"],
		           							 "section" => $row["section"],
		           							 "miscon_qcode_list" => $row["miscon_qcode_list"],
		           							 "class_avg" => $row["class_avg"],
		           							 "report_status" => $row["report_status"]
		           							);
		           		$resultarr["SUBJECTS"][$row["subject"]] = $row["subject"];
		           		$resultarr["CLASSES"][$row["class"]] = $row["class"];				
			        }
		        }
	        return $resultarr;
			}
			
			if($this->action == "GeneratePDF"){
				
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->subject != "ALL")
					$condition .= "AND subject = '".$this->subject."'";
				if($this->class != "ALL")
					$condition .= "AND class = '".$this->class."'";
				#For misconception PDF generate page year filter 04-07-2012
				if($this->year != "ALL")
					$condition .= " AND da_testRequest.year = '".$this->year."'";	
				#For misconception PDF generate page year filter 04-07-2012	
					
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionPDF($this->school_code,$condition,$this->connid);
				$files_to_zip[] = constant("PATH_TEMP").$this->school_code.".pdf";
				$result = $this->CreateZipCommon($files_to_zip,$this->school_code."_".$timestamp.".zip",true);
				$this->ForceDownload($this->school_code."_".$timestamp.".zip");
				$this->action = "GetRequest";
			}
			
			if($this->action == "GenExamcodePDF"){
				
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->examcode != 0)
					$condition .= "AND exam_code = '".$this->examcode."'";
				
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionPDF($this->school_code,$condition,$this->connid);
				$files_to_zip[] = constant("PATH_TEMP").$this->school_code.".pdf";
				$result = $this->CreateZipCommon($files_to_zip,$this->school_code."_".$timestamp.".zip",true);
				$this->ForceDownload($this->school_code."_".$timestamp.".zip");
				//$this->ForceDownload($this->school_code.".pdf");
				$this->action = "GetRequest";
			}
			
			if($this->action == "GetExamcodeBrowse")
			{
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->examcode != 0)
					$condition .= "AND exam_code = '".$this->examcode."'";
				
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionBrowse($this->school_code,$condition,$this->connid);
				//$files_to_zip[] = constant("PATH_TEMP").$this->school_code.".pdf";
				//$result = $this->CreateZipCommon($files_to_zip,$this->school_code."_".$timestamp.".zip",true);
				//$this->ForceDownload($this->school_code."_".$timestamp.".zip");
				//$this->ForceDownload($this->school_code.".pdf");
				//$this->action = "GetRequest";
			}
			if($this->action == "GeneratePDFBrowse"){
				
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->subject != "ALL")
					$condition .= "AND subject = '".$this->subject."'";
				if($this->class != "ALL")
					$condition .= "AND class = '".$this->class."'";
					
					
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionBrowse($this->school_code,$condition,$this->connid);
				//$files_to_zip[] = constant("PATH_TEMP").$this->school_code.".pdf";
				//$result = $this->CreateZipCommon($files_to_zip,$this->school_code."_".$timestamp.".zip",true);
				//$this->ForceDownload($this->school_code."_".$timestamp.".zip");
				//$this->action = "GetRequest";
			}
		} 
	}
	
	function CreateZipCommon($files = array(),$archivefilename = "",$overwrite = false) {
	
		//if the zip file already exists and overwrite is false, return false
		if(file_exists(constant("PATH_TEMP").$archivefilename) && !$overwrite) { return false; }
		
		$valid_files = array();
		
		if(is_array($files)) {
			foreach($files as $file) {
			  if(file_exists($file)){
			  	$valid_files[] = $file;
			  }	
			}
		}
		if(count($valid_files)){
		
			$zip = new ZipArchive();
			if($zip->open(constant("PATH_TEMP").$archivefilename,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true)
				return false;
			
			foreach($valid_files as $file) {
				$zip->addFile($file,basename($file));
			}
			//echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;
			$zip->close();
			# removing the files
			foreach($valid_files as $file) {
				@unlink($file);
			}
			return file_exists(constant("PATH_TEMP").$archivefilename);
		}
		else
			return false;
	}
	
	function getSchoolList($connid)
	{
        global $constant_da;

		$arrRet = array();
		$query = "select t.schoolCode,s.schoolname,s.city from {$constant_da(COMMON_DATABASE)}.schools s INNER JOIN da_testRequest t on t.schoolCode = s.schoolno
				  where t.type = 'actual'  	  
				  GROUP BY s.schoolno ORDER BY s.schoolname";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrRet[$row[schoolCode]]=$row;
			}
		return 	$arrRet;
	}
    
	function getActualList($connid,$school)
	{
        global $constant_da;

		if(isset($school))
		{
		$this->setpostvars();
		$this->setgetvars();
			
		if($this->submited && $this->action == "ChangeOptdevice"){
			if(!is_array($this->id) || count($this->id) == 0)
				return;
				
			$this->UpdateOptDevice();
		}
		
			$ResultArr = array();
	    	$query = "SELECT da_testRequest.id,da_testRequest.schoolCode,schools.schoolname,
	    			  da_testRequest.type,da_testRequest.subject,da_testRequest.class,
					  da_testRequest.testName,da_testRequest.test_date,da_testRequest.request_date,da_testRequest.requested_by
					  FROM da_testRequest 
					  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_testRequest.schoolCode = schools.schoolno
					  WHERE da_testRequest.schoolCode = '".$school."' 
					  AND da_testRequest.optfor_device = '0'
					  ORDER BY da_testRequest.request_date,da_testRequest.subject DESC";
	    				  
			$dbqry = new dbquery($query,$this->connid);
			while($result = $dbqry->getrowarray()){
				
				$ResultArr["SCHOOLDETAILS"][$result["id"]] = array("id"=>$result["id"],
																   "type"=>$result["type"],	
														  		   "schoolCode" => $result["schoolCode"],
														  		   "schoolname" => $result["schoolname"],
														  		   "subject" => $result["subject"],
														  		   "class" => $result["class"],
														  		   "testName" => $result["testName"],
														  		   "test_date" => $result["test_date"],
														  		   "requested_by" => $result["requested_by"],
														  		   "requested_date" => $result["request_date"]
														  		   );													  		   
				
			}
			return $ResultArr;
		}
	}
	function UpdateOptDevice()
	{
		$RequestId = implode(",",$this->id);
		$query = "select optfor_device,id from da_testRequest where id IN ($RequestId)";
		$dbqry = new dbquery($query,$this->connid);	
		while($result = $dbqry->getrowarray())
		{
		if($result[optfor_device]!=4)
			{	
				$query_set = "Update da_testRequest set optfor_device = '4',last_modified = NOW() where id = '$result[id]'";
				$dbqry_set = new dbquery($query_set,$this->connid);
			}
		}		
	}
	
	function PageMisconceptionqQuestionReportSummary(){
		$this->setgetvars();
		$this->setpostvars();
		
		if($this->submited) {
		
			if($this->action == "GetRequest" || $this->action == "GenMisconceptionSummary"){
				#For misconception summary generate page year filter 04-07-2012
				$condition = "";
				if($this->year != "ALL")
					$condition .= " AND da_testRequest.year = '$this->year'";
				#For misconception summary generate page year filter 04-07-2012
				
				
				$query ="SELECT da_testRequest.id,da_testRequest.subject,da_testRequest.class,da_testRequest.testName,da_examDetails.exam_code,da_examDetails.section,
								da_examDetails.miscon_qcode_list,da_examDetails.class_avg,da_examDetails.report_status,
								da_examDetails.lowperform_qcode_list
						 FROM da_examDetails 
						 LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
						 WHERE da_testRequest.schoolCode = '".$this->school_code."' $condition
						 ORDER BY da_testRequest.subject,da_testRequest.class";
				$dbqry = new dbquery($query,$this->connid);
				if ($dbqry->numrows()>0)
		        {
					while($row = $dbqry->getrowarray()){	
		           		$resultarr["EXAMCODES"][] = array(
		           							 "request_id" => $row["id"],
		           							 "testName" => $row["testName"],
		           							 "subject" => $row["subject"],
		           							 "class" => $row["class"],
		           							 "exam_code" => $row["exam_code"],
		           							 "section" => $row["section"],
		           							 "miscon_qcode_list" => $row["miscon_qcode_list"],
		           							 "class_avg" => $row["class_avg"],
		           							 "report_status" => $row["report_status"]
		           							);
		           		$resultarr["SUBJECTS"][$row["subject"]] = $row["subject"];
		           		$resultarr["CLASSES"][$row["class"]] = $row["class"];				
			        }
		        }
	        return $resultarr;
			}
			
			/*if($this->action == "GeneratePDF"){
				
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->subject != "ALL")
					$condition .= "AND subject = '".$this->subject."'";
				if($this->class != "ALL")
					$condition .= "AND class = '".$this->class."'";
					
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionPDF($this->school_code,$condition,$this->connid);
				$files_to_zip[] = constant("PATH_TEMP").$this->school_code.".pdf";
				$result = $this->CreateZipCommon($files_to_zip,$this->school_code."_".$timestamp.".zip",true);
				$this->ForceDownload($this->school_code."_".$timestamp.".zip");
				$this->action = "GetRequest";
			}
			
			if($this->action == "GenExamcodePDF"){
				
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->examcode != 0)
					$condition .= "AND exam_code = '".$this->examcode."'";
				
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionPDF($this->school_code,$condition,$this->connid);
				$files_to_zip[] = constant("PATH_TEMP").$this->school_code.".pdf";
				$result = $this->CreateZipCommon($files_to_zip,$this->school_code."_".$timestamp.".zip",true);
				$this->ForceDownload($this->school_code."_".$timestamp.".zip");
				//$this->ForceDownload($this->school_code.".pdf");
				$this->action = "GetRequest";
			}*/
			
			/*if($this->action == "GetExamcodeBrowse")
			{
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->examcode != 0)
					$condition .= "AND exam_code = '".$this->examcode."'";
				
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionBrowse($this->school_code,$condition,$this->connid);
				//$files_to_zip[] = constant("PATH_TEMP").$this->school_code.".pdf";
				//$result = $this->CreateZipCommon($files_to_zip,$this->school_code."_".$timestamp.".zip",true);
				//$this->ForceDownload($this->school_code."_".$timestamp.".zip");
				//$this->ForceDownload($this->school_code.".pdf");
				//$this->action = "GetRequest";
			}*/
			
		}
	}
	function PageMisconceptionqQuestionReportSummaryDisplay(){
		$this->setgetvars();
		$this->setpostvars();
		if($this->submited) {
			if($this->action == "GenMisconceptionSummary"){
				
				$condition = "";
				$timestamp = date("YmdHis");
				if($this->subject != "ALL")
					$condition .= "AND subject = '".$this->subject."'";
				if($this->class != "ALL")
					$condition .= "AND class = '".$this->class."'";
				if($this->testName != "ALL")
				    $condition .= "AND testName = '".$this->testName."'";
				if($this->testSection != "ALL")    	
					$condition .= "AND section = '".$this->testSection."'";
				if($this->year != "ALL")
					$condition .= " AND da_testRequest.year = '".$this->year."'";	
				
				$clsdareports = new clsdareports();
				$clsdareports->GenerateMisconceptionBrowseSummary($this->school_code,$condition,$this->connid,$this->testSection);
			}
		}
	}	
	
	function PageDropQuestions($connid){
		
		$this->setgetvars();
		$this->setpostvars();
	
		if($this->ajaxcall == "ajax"){
			
			$alert = "";
			$QcodeArr = array();
			$totalQuestions = 0;
			# fetching paper code and qcode list for whole paper
			$query = "SELECT da_paperDetails.qcode_list,da_paperDetails.papercode,da_testRequest.subject FROM da_paperDetails
	     			  LEFT JOIN da_testRequest ON da_paperDetails.papercode = da_testRequest.paper_code
				      WHERE da_testRequest.id = $this->id AND da_paperDetails.version = 1";
			$dbqry = new dbquery($query,$connid);
			$result = $dbqry->getrowarray();
			$papercode = $result["papercode"];
			$qcodelist = $result["qcode_list"];
			$subject = $result["subject"];
			
			# taking qcodes in array for numbering
			$QcodeArr = explode(",",$qcodelist);
			$totalQuestions = count($QcodeArr);
			
			# fetching reporting details array
			$query2 = "SELECT reporting_id,reporting_level,qcode_list,reporting_order FROM da_reportingDetails WHERE papercode = '".$papercode."'";
			$dbqry2 = new dbquery($query2,$connid);
			while($result2 = $dbqry2->getrowarray()){
				$ReportingDetails[$result2["reporting_order"]] = $result2["qcode_list"];
			}
			
			
			if(is_array($this->drop_ques) && count($this->drop_ques) > 0){
				$DropQues = implode(",",$this->drop_ques);
				$DropQuesArr = $this->drop_ques;
			}else if($this->drop_ques != ""){
				$DropQues = $this->drop_ques;
				$DropQuesArr = explode(",",$this->drop_ques);
			}

			# fetching misconception questions
			if($DropQues != ""){
				
				$misconceptionQuestions = array();
				$query3 = "SELECT qcode,misconception FROM da_questions WHERE qcode IN($DropQues) AND misconception =1";
				$dbqry3 = new dbquery($query3,$connid);
				while($result3 = $dbqry3->getrowarray()){
					$misconceptionQuestions[] = $result3["qcode"];
				}
				if(is_array($DropQuesArr) && count($DropQuesArr) > 0){
					foreach($DropQuesArr as $key => $qcode){
						
						if(in_array($qcode,$misconceptionQuestions)){
							$alert .= "\n Question No. ".(array_search($qcode,$QcodeArr)+1)." is a misconception question. Do you want to continue?\r\n";
						}
						$RepQcodeArr = array();
						foreach ($ReportingDetails as $order => $repQcodelist){
							$RepQcodeArr = explode(",",$repQcodelist);
							if(in_array($qcode,$RepQcodeArr) && count($RepQcodeArr) <= 3){
								$alert .= "\n Question No. ".(array_search($qcode,$QcodeArr)+1)." from a subtopic that has only ".count($RepQcodeArr)." questions. Do you want to continue?\r\n";
							}
						}
					}
				}
			}	
			if($alert != "")
				echo $alert;
			exit;
		}
		
		if(isset($this->submited) && $this->action == "DropQuestion"){
			
			# checking for already dropped questions
			$dropped_questions_arr = array();
			$query = "SELECT da_reportingDetails.reporting_id,da_reportingDetails.sst_list,da_reportingDetails.qcode_list,da_reportingDetails.required_ques,
					  da_reportingDetails.reporting_order,da_reportingDetails.papercode,da_testRequest.subject,
					  da_testRequest.dropped_questions,da_testRequest.flag,da_testRequest.paper_code
					  FROM da_reportingDetails
					  LEFT JOIN da_testRequest ON da_reportingDetails.papercode = da_testRequest.paper_code
					  WHERE da_testRequest.id = $this->id ORDER BY da_reportingDetails.reporting_order";
			$dbqry = new dbquery($query,$connid);
			while($result = $dbqry->getrowarray()){
				
				$ReportingDetails[$result["reporting_id"]] = array("sst_list"=>$result["sst_list"],
																   "qcode_list"=>$result["qcode_list"],
																   "required_ques"=>$result["required_ques"],
																   "reporting_order"=>$result["reporting_order"],
																   "reporting_id"=>$result["reporting_id"],
																   "papercode"=>$result["papercode"]);
				$dropped_questions = $result["dropped_questions"];
				$assembled_type = $result["flag"];
				$paper_code = $result["paper_code"];
				$subject = $result["subject"];
			}
			
			$qcode_query = "SELECT qcode_list FROM da_paperDetails
							LEFT JOIN da_testRequest ON da_paperDetails.papercode = da_testRequest.paper_code AND da_paperDetails.version = 1
							WHERE da_testRequest.id = $this->id";
			$qcode_dbqry = new dbquery($qcode_query,$connid);
			$qcode_result = $qcode_dbqry->getrowarray();
			//$QcodeArr = explode($qcode_result["qcode_list"],",");
			$QcodeArr = explode(',',$qcode_result["qcode_list"]);
			
			if($dropped_questions != "")
				$dropped_questions_arr = explode(",",$dropped_questions);

			# Checking validation of no of questions allowed to be drop Task : S-01121 DA: Dropper feature edits
			if(is_array($dropped_questions_arr) && count($dropped_questions_arr) > 0){
				if($subject == 1 || $subject == 100){ // for Engligh & Other Assessment
					if(count($dropped_questions_arr) >= 5 || (count($dropped_questions_arr) + count($this->drop_ques)) >= 5){
						$this->msg = "5 Questions are already dropped from paper you can't drop more now!";
					}
				}else{ // Maths/Science
					if(count($QcodeArr) <= 25 && (count($dropped_questions_arr) >= 5 || (count($dropped_questions_arr) + count($this->drop_ques)) >= 5)){
						$this->msg = "You have already dropped ".count($dropped_questions_arr)." questions & only up to 5 questions can be dropped from the paper!";
					}else if((count($QcodeArr) + count($dropped_questions_arr)) > 25 && ((count($QcodeArr) + count($dropped_questions_arr)) - count($this->drop_ques) < 20)){
						$allowed_count = ((count($QcodeArr) + count($dropped_questions_arr)) - 20);
						$this->msg = "You have already dropped ".count($dropped_questions_arr)." questions & only up to ".$allowed_count." questions can be dropped from the paper!";
					}
				}
			} else{
				if($subject == 1 || $subject == 100){ // for Engligh && Other Assessment
					if(count($this->drop_ques) > 5){
						$this->msg = "Only up to 5 questions can be dropped from the paper. Please select only up to 5 questions!";
					}
				}else{ // Maths/Science
					if(count($QcodeArr) <= 25 && count($this->drop_ques) > 5){
						$this->msg = "Only up to 5 questions can be dropped from the paper. Please select only up to 5 questions!";
					}else if(count($QcodeArr) > 25 && ((count($QcodeArr) - count($this->drop_ques)) < 20)){
						$allowed_count = (count($QcodeArr) - 20);
						$this->msg = "Only up to $allowed_count questions can be dropped from the paper. Please select only up to $allowed_count questions!";
					}
				}
			}

			if($this->msg == "" && is_array($this->drop_ques) && count($this->drop_ques) > 0){
					
				$UpdatedReportingDetails = array();
				$RepIDNeedToDelete = array();
				# checking not to drop all questions from one reporting head
				foreach($ReportingDetails as $reporting_id => $reporting_details){
				
					$dropcount = 0;
					$need_to_drop_ques = array();

					foreach($this->drop_ques as $key => $drop_qcode){
						if(in_array($drop_qcode,explode(",",$reporting_details["qcode_list"]))){
							$dropcount++;
							$need_to_drop_ques[] = $drop_qcode;
						}	
					}
					//echo "<br>drop count::".$dropcount;
					if($dropcount == $reporting_details["required_ques"]){
						
						$RepIDNeedToDelete[$reporting_details["papercode"]] = array("reporting_id" => $reporting_details["reporting_id"],
																				    "reporting_order"=> $reporting_details["reporting_order"]);
						# previously we are not allowing to delete quesions from one subtopic
						//$this->msg = "You cannot drop all questions from one subtopic! Please deselect some questions and then select other questions.";
						//break;
					}else if(is_array($need_to_drop_ques) && count($need_to_drop_ques) > 0){
						
						#taking difference of qcode list 
						$NewQcodeArr = array_diff(explode(",",$reporting_details["qcode_list"]),$need_to_drop_ques);

						$NewQcodelist = implode(",",$NewQcodeArr);
						$NewRequiredQues = $reporting_details["required_ques"] - count($need_to_drop_ques);
						
						$UpdatedReportingDetails[$reporting_id] = array("qcode_list"=>$NewQcodelist,
																		"required_ques"=>$NewRequiredQues);
					}
				}
				

				if(is_array($RepIDNeedToDelete) && count($RepIDNeedToDelete) > 0){
					
					foreach($RepIDNeedToDelete as $rep_papercode => $repdeletedetails){
						
						# log for reporting head
						$log_query = "INSERT INTO da_reportingDetailsLog (reporting_id,papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order,entered_dt,entered_by,modified_by,lastModifiedDate,log_entered_dt,log_type)
									  SELECT reporting_id,papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order,entered_dt,entered_by,modified_by,lastModifiedDate,NOW(),'DROPQUESTION' FROM da_reportingDetails 
									  WHERE reporting_id = ".$repdeletedetails["reporting_id"]." AND papercode = '".$rep_papercode."'";
						$log_dbqry =  new dbquery($log_query,$connid);
						
						# delete reporting ids
						$up_query = "DELETE FROM da_reportingDetails WHERE reporting_id = ".$repdeletedetails["reporting_id"]." AND papercode = '".$rep_papercode."'";
						$up_dbqry = new dbquery($up_query,$connid);
					}
					
					# re arrange the reporting order as we have deleted some reporting ids 
					$rep_sel_query = "SELECT reporting_id,papercode,reporting_order FROM da_reportingDetails WHERE papercode = '".$rep_papercode."' 
									  ORDER BY reporting_order";
					$rep_sel_dbqry = new dbquery($rep_sel_query,$connid);
					$new_order = 1;
					while($rep_sel_result = $rep_sel_dbqry->getrowarray()){
						
						$rep_up_query = "UPDATE da_reportingDetails SET reporting_order = $new_order WHERE 
									     papercode = '".$rep_sel_result["papercode"]."' AND reporting_id = ".$rep_sel_result["reporting_id"]."";
						$rep_up_dbqry = new dbquery($rep_up_query,$connid);
						$new_order++;
					}
				}
				
				if((is_array($UpdatedReportingDetails) && count($UpdatedReportingDetails) > 0) || (is_array($RepIDNeedToDelete) && count($RepIDNeedToDelete) > 0)){
					
					# generating all versions questions to update in paper details table
					$pquery = "select papercode,version,qcode_list from da_paperDetails where papercode = '".$paper_code."'";
					$pdbqry = new dbquery($pquery,$connid);
					while($presult = $pdbqry->getrowarray()){
						
						# generating necessary variables for all version at one go
						$VersionQues[$presult["version"]] = $presult["qcode_list"];
						${OrgQcodesArrV.$presult["version"]} = explode(",",$presult["qcode_list"]);
						${NewQcodesArrV.$presult["version"]} = array_diff(${OrgQcodesArrV.$presult["version"]},$this->drop_ques);
						${NewQcodesV.$presult["version"]} = implode(",",${NewQcodesArrV.$presult["version"]});
					}
					
					//print_r(${OrgQcodesArrV.$version1});// we can access such type of variable using this method
					
					# updating test request table
					$DroppedQcodes = implode(",",$this->drop_ques);
					$update_query = "UPDATE da_testRequest SET dropped_questions = IF(dropped_questions != '',CONCAT(dropped_questions,',','".$DroppedQcodes."'),'".$DroppedQcodes."') WHERE id = $this->id";
					$udated_dbqry = new dbquery($update_query,$connid);
					
					# updating reporting details table
					foreach($UpdatedReportingDetails as $rep_id => $rep_details){
						
						# log for reporting head
						$log_query = "INSERT INTO da_reportingDetailsLog (reporting_id,papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order,entered_dt,entered_by,modified_by,lastModifiedDate,log_entered_dt,log_type)
									  SELECT reporting_id,papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order,entered_dt,entered_by,modified_by,lastModifiedDate,NOW(),'DROPQUESTION' FROM da_reportingDetails 
									  WHERE reporting_id = $rep_id AND papercode = '".$paper_code."'";
						$log_dbqry =  new dbquery($log_query,$connid);
						
						$up_query = "UPDATE da_reportingDetails SET qcode_list = '".$rep_details["qcode_list"]."',required_ques = '".$rep_details["required_ques"]."',modified_by = '".$_SESSION["username"]."'
									 WHERE reporting_id = $rep_id AND papercode = '".$paper_code."'";
						$up_dbqry = new dbquery($up_query,$connid);
					}
					
					# updating paper Details
					if($NewQcodesArrV1 != "" && $NewQcodesArrV2 != "" && $NewQcodesArrV3 != "" && $NewQcodesArrV4 != ""){
						
						foreach($VersionQues as $version => $orgqcodes){
							
							$updated_qcode_list = ${NewQcodesV.$version}; // accessed dynamic variable
							
							# log for paperdetails	
							$log_query = "INSERT INTO da_paperDetailsLog (papercode,version,qcode_list,lastModifiedBy,lastModifiedDate,log_entered_dt,log_type)
										  SELECT papercode,version,qcode_list,lastModifiedBy,lastModifiedDate,NOW(),'DROPQUESTION' FROM da_paperDetails
										  WHERE papercode = '".$paper_code."'  AND version = $version";
							$log_dbqry =  new dbquery($log_query,$connid);							
							
							$up_query2 = "UPDATE da_paperDetails SET qcode_list = '".$updated_qcode_list."',lastModifiedBy = '".$_SESSION["username"]."'
										  WHERE papercode = '".$paper_code."' AND version = $version";
							$up_dbqry2 = new dbquery($up_query2,$connid);
						}
					}
					
					# inserting into new table for dropped questions reasons
					$insert_str = "";
					foreach($this->drop_ques as $key => $drop_qcode){
						$insert_str .= "('".$this->id."','".$drop_qcode."','".$this->drop_reasons[$drop_qcode]."','".addslashes($this->other_reasons[$drop_qcode])."','".$_SESSION["username"]."',NOW()),"; 
					}
					if($insert_str != ""){
						$in_query ="INSERT INTO da_dropQuestions (request_id,qcode,reason_id,other_reason,dropped_by,dropped_dt) VALUES ".rtrim($insert_str,",");
						$in_dbqry = new dbquery($in_query,$connid);

						// Decrement school usage count for dropped questions Naveen

						$ques_list = implode(",",$this->drop_ques);
						if($ques_list != "")
						{
							$queryUpdatePaperDetailsGet = "UPDATE da_questions SET school_usage = IF(school_usage =0 , 0 , school_usage - 1),lastModified = lastModified where qcode IN (".$ques_list.")";
							$dbqueryUpdatePaperDetailsGet = new dbquery($queryUpdatePaperDetailsGet,$connid);
						}	
						// End decrement school usage count of question 
					}
					
					# Do below process if paper is auto assembled
					if($assembled_type == "Auto"){
						
						# checking the entries for finalize stage for the given request id & doing the comparision between qcodes list
						$sel_query = "select * from da_questionSelectionSummary WHERE request_id = $this->id AND type = 'Finalize' order by id";
						$sel_dbqry = new dbquery($sel_query,$connid);
						while($sel_result = $sel_dbqry->getrowarray()){
							
							$unique_qcode_list_arr = explode(",",$sel_result["unique_qcode_list"]);
							$unique_selected_count = $sel_result["unique_selected_count"];
							
							$copies_qcode_list_arr = explode(",",$sel_result["copies_qcode_list"]);
							$copies_selected_count = $sel_result["copies_selected_count"];
							
							$unique_repeated_qcode_list_arr = explode(",",$sel_result["unique_repeated_qcode_list"]);
							$unique_repeated_count = $sel_result["unique_repeated_count"];
							
							$mc_copies_no_qcode_list_arr = explode(",",$sel_result["mc_copies_no_qcode_list"]);
							$mc_copies_no_count = $sel_result["mc_copies_no_count"];
							
							$ips_mismatch_qcode_list_arr = explode(",",$sel_result["ips_mismatch_qcode_list"]);
							$ips_mismatch_count = $sel_result["ips_mismatch_count"];
							
							$unused_question_added_list_arr = explode(",",$sel_result["unused_question_added_list"]);
							$unused_questions_added = $sel_result["unused_questions_added"];
							
							$unapproved_image_qcode_list_arr = explode(",",$sel_result["unapproved_image_qcode_list"]);
							$unapproved_image_qcode_count = $sel_result["unapproved_image_qcode_count"];
							
							$qcode_all_list_arr = explode(",",$sel_result["qcode_all_list"]);
						
															
							foreach($this->drop_ques as $key => $srch_qcode){
							
								if(in_array($srch_qcode,$unique_qcode_list_arr)){
									$unique_qcode_list_arr = array_diff($unique_qcode_list_arr,array($srch_qcode));
									$unique_selected_count--;
								}
								
								if(in_array($srch_qcode,$copies_qcode_list_arr)){
									$copies_qcode_list_arr = array_diff($copies_qcode_list_arr,array($srch_qcode));
									$copies_selected_count--;	
								}
								
								if(in_array($srch_qcode,$unique_repeated_qcode_list_arr)){
									$unique_repeated_qcode_list_arr = array_diff($unique_repeated_qcode_list_arr,array($srch_qcode));
									$unique_repeated_count--;	
								}
								
								if(in_array($srch_qcode,$mc_copies_no_qcode_list_arr)){
									$mc_copies_no_qcode_list_arr = array_diff($mc_copies_no_qcode_list_arr,array($srch_qcode));
									$mc_copies_no_count--;	
								}
								
								if(in_array($srch_qcode,$ips_mismatch_qcode_list_arr)){
									$ips_mismatch_qcode_list_arr = array_diff($ips_mismatch_qcode_list_arr,array($srch_qcode));
									$ips_mismatch_count--;	
								}
								
								if(in_array($srch_qcode,$unused_question_added_list_arr)){
									$unused_question_added_list_arr = array_diff($unused_question_added_list_arr,array($srch_qcode));
									$unused_questions_added--;	
								}
								
								if(in_array($srch_qcode,$unapproved_image_qcode_list_arr)){
									$unapproved_image_qcode_list_arr = array_diff($unapproved_image_qcode_list_arr,array($srch_qcode));
									$unapproved_image_qcode_count--;	
								}
								
								if(in_array($srch_qcode,$qcode_all_list_arr)){
									$qcode_all_list_arr = array_diff($qcode_all_list_arr,array($srch_qcode));
								}
								
							}
							
							$que_selected = explode("/",$sel_result["questions_selected"]);
							$questions_selected = count($qcode_all_list_arr)."/".$que_selected[1];
							
							# Deleting the previous entry for same chapter id and request id from selection summary table
							$check_query = "SELECT id FROM da_questionSelectionSummary WHERE request_id = $this->id AND chapter_id = '".$sel_result["chapter_id"]."' AND type = 'Scoring'";
							$check_dbqry = new dbquery($check_query,$connid);
							if($check_dbqry->numrows() > 0){
								
								$check_result = $check_dbqry->getrowarray();
								$del_query = "DELETE FROM da_questionSelectionSummary WHERE id = '".$check_result["id"]."'";
								$del_dbqry = new dbquery($del_query,$connid);
							}
							
							# Insert the record in da_questionSelectionSummary table for auto assembly
							$in_query2 = "INSERT INTO da_questionSelectionSummary 
							              (request_id,chapter_id,passage_id,requested_before,
							               requested_by_same_school,best_fit_past_test_id,past_count,
							               teacher_comment,dropped_questions,questions_selected,
							               unique_selected_count,unique_qcode_list,copies_selected_count,copies_qcode_list,
							               unique_repeated_count,unique_repeated_qcode_list,mc_copies_no_count,mc_copies_no_qcode_list,
							               ips_mismatch_count,ips_mismatch_qcode_list,unapproved_image_qcode_count,unapproved_image_qcode_list,
							               extra_ques_recommended,unused_questions_added,unused_question_added_list,
							               qcode_all_list,type,entered_date,lastModified)
							               VALUES 
							               ($this->id,'".$sel_result["chapter_id"]."','".$sel_result["passage_id"]."','".$sel_result["requested_before"]."',
							               '".$sel_result["requested_by_same_school"]."','".$sel_result["best_fit_past_test_id"]."','".$sel_result["past_count"]."',
							               '".$sel_result["teacher_comment"]."','".$sel_result["dropped_questions"]."','".$questions_selected."',
							               '".$unique_selected_count."','".implode(",",$unique_qcode_list_arr)."','".$copies_selected_count."','".implode(",",$copies_qcode_list_arr)."',
							               '".$unique_repeated_count."','".implode(",",$unique_repeated_qcode_list_arr)."','".$mc_copies_no_count."','".implode(",",$mc_copies_no_qcode_list_arr)."',
							               '".$ips_mismatch_count."','".implode(",",$ips_mismatch_qcode_list_arr)."','".$unapproved_image_qcode_count."','".implode(",",$unapproved_image_qcode_list_arr)."',
							               '".count($this->drop_ques)."','".$sel_result["unused_questions_added"]."','".$sel_result["unused_question_added_list"]."',
							               '".implode(",",$qcode_all_list_arr)."','Scoring',NOW(),NOW())";
							$in_dbqry2 = new dbquery($in_query2,$connid);
						}
					}
					
					# paper generation process
					$clsdatest = new clsdatest();
					$ex_query = "SELECT da_examDetails.exam_code,da_examDetails.request_id,da_testRequest.paper_code
								 FROM da_examDetails
								 LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
								 WHERE da_testRequest.id = $this->id AND report_status = 'pending' AND response_received = 0";
					$ex_dbqry = new dbquery($ex_query,$connid);
					while($ex_result = $ex_dbqry->getrowarray()){
						
						$clsdatest->papercode = $ex_result["paper_code"];
						$clsdatest->test_requestid = $ex_result["request_id"];
						$clsdatest->quesArray = array();
						for($i=1;$i<=4;$i++){
							$clsdatest->generatePDF($connid,$ex_result["exam_code"],$i);
						}
					}
				}
			}
			return $this->RetriveQcodeToDrop($connid);
		}
		return $this->RetriveQcodeToDrop($connid);
	}
	
	function RetriveQcodeToDrop($connid){
		
		$this->setpostvars();
		$this->setgetvars();
		
		if(isset($this->id) && $this->id != 0){
			
			$query = "SELECT da_paperDetails.qcode_list,da_testRequest.delivery_date FROM da_paperDetails
	     			  LEFT JOIN da_testRequest ON da_paperDetails.papercode = da_testRequest.paper_code
				      WHERE da_testRequest.id = $this->id AND da_paperDetails.version = 1
				      AND da_testRequest.status = 'Approved'";
					 //AND da_testRequets.status = 'Approved' AND da_testRequest.type = 'actual' 
			$dbqry = new dbquery($query,$connid);
			$result = $dbqry->getrowarray();
			if(strtotime($result["delivery_date"]) <= strtotime(date("Y-m-d"))){
				return $result["qcode_list"];	
			} else {
				$this->msg ="You can drop the questions only on or after the delivery date!";
				return;
			}
		}
	}
	
	function tabletUpgrade($connid)
    {
    	echo $this->action;
    	$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->action == "SaveExamCodeDetails")
    	{    		
    		$this->saveExamCodeData($connid);
    	}
    }
    
    function saveExamCodeData($connid)
    {
    	if($this->examcode!="" && $this->no_of_student!="")
    	{
    		$queryCheck = "SELECT id FROM da_examDetails where exam_code = '$this->examcode'";
    		$dbqryCheck = new dbquery($queryCheck,$connid);
			if($dbqryCheck->numrows() == 0)
			{
				$this->msg	= "Data updation failed due to examcode is not in databse!";
			}
			else 
			{
	    		while($resultCheck = $dbqryCheck->getrowarray())
				{
					if($resultCheck["id"]!="" || $resultCheck["id"]!=0)
					{
						$queryUpdate = "UPDATE da_examDetails set no_of_students = '$this->no_of_student',last_modified_by = '".$_SESSION["username"]."' WHERE id = '".$resultCheck[id]."'";
						$dbqryUpdate = new dbquery($queryUpdate,$connid);
						$this->msg	= "Data updated successfully!";
					}
					else 
					{
						$this->msg	= "Data updation failed due to examcode is not in databse!";		 
					}
				}
			}	
    	}
    }
    
    # common function for junk replacement
	function common_pdf_junk_replace($string){
        $string = str_replace("â€˜","'",$string);
        $string = str_replace("â€™","'",$string);
        $string = str_replace("â€“","-",$string);
        $string = str_replace("â€¦","...",$string);
        $string = str_replace("Ã†","'",$string);
        $string = str_replace("&nbsp;"," ",$string);
        $string = str_replace("Â·",".",$string);
        $string = str_ireplace("</DIV>","<br>",$string);
        $string = str_replace("‘","'",$string);
        $string = str_replace("’","'",$string);
        $string = str_replace("–","-",$string);
        $string = str_replace("…","...",$string);
        $string = str_replace("Æ","'",$string);
        $string = str_replace("·",".",$string);
        $string = str_replace("÷","&divide;",$string);
        $string = str_replace("×","&times;",$string);
        $string = str_replace("á"," ",$string);
        $string = iconv("UTF-8","UTF-8//IGNORE",$string); // removed Invalid UTF8 chars
        //$string = preg_replace('/[^(\x20-\x7F)]*/','', $string); // removed non ASCII chars
        return $string;
	}
	
	function GetAcademicYearSchools($connid){
        global $constant_da;
        
		$this->setpostvars();
		$this->setgetvars();
		
		if($this->year == "") return ;
		
		$arrRet = array();
		$query = "SELECT da_orderMaster.schoolCode,schools.schoolname,schools.city 
				  FROM da_orderMaster
				  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno
				  WHERE da_orderMaster.year = '".$this->year."'
				  ORDER BY schools.schoolname";
		$dbquery = new dbquery($query,$connid);
		
		while($row = $dbquery->getrowarray()){
			$arrRet[$row["schoolCode"]]=$row;
		}
		return $arrRet;
	}
	
	function PageAdminExportPaper($connid){
		
        global $constant_da;

		$this->setpostvars();
		$this->setgetvars();
		
		if($this->submited){
			
			if($this->action == "GetData"){
				if(is_array($this->id) && count($this->id > 0)){
					$requestidstr = implode(",",$this->id);
					$this->ExportQuestionsAndImages($requestidstr);
				}
			}
			
			if($this->action == "GetRequests"){
				
				if($this->school_code == "" || $this->school_code == 0) return;
				$returnArray = array();
				
				$query = "SELECT da_testRequest.id,da_testRequest.schoolCode,schools.schoolname,da_testRequest.subject,da_testRequest.class,
								 da_testRequest.testName,da_testRequest.test_date,da_testRequest.requested_by,
								 DATE_FORMAT(da_testRequest.request_date,'%d-%m-%Y') AS request_date,
								 DATE_FORMAT(da_testRequest.delivery_date,'%d-%m-%Y') AS delivery_date,
								 DATE_FORMAT(da_testRequest.test_date,'%d-%m-%Y') AS test_date,da_testRequest.status
						  FROM da_testRequest
						  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_testRequest.schoolCode = schools.schoolno
						  WHERE da_testRequest.schoolCode = '".$this->school_code."'
						  AND da_testRequest.status = 'approved'
						  AND da_testRequest.year = '".$this->year."'
						  ORDER BY da_testRequest.test_date DESC,da_testRequest.class";
                $dbqry = new dbquery($query,$connid);
                while ($result = $dbqry->getrowarray()) {
                    $returnArray[$result["id"]] = array("id"=>$result["id"],
														"schoolCode" => $result["schoolCode"],
														"schoolname" => $result["schoolname"],
														"subject" => $result["subject"],
														"class" => $result["class"],
														"testName" => $result["testName"],
														"test_date" => $result["test_date"],
														"requested_by" => $result["requested_by"],
														"requested_date" => $result["request_date"],
														"delivery_date" => $result["delivery_date"],
														"test_date" => $result["test_date"],
														"status" => $result["status"]
														);
				}
				return $returnArray;
			}
		}
	}
	
	function pageRequestAnnualStudentReports($connid){
		$this->setpostvars();
		$this->setgetvars();
		
		if($this->submited && $this->action == "PlaceRequest"){
			
			$delivery_date = date("Y-m-d",strtotime('next Monday',mktime(0,0,0,date('m'),date('d'),date('Y'))));
			$insert_values = "";
			foreach($this->sectionarr as $key => $section){
				$insert_values .= "('".$_SESSION["school_code"]."','".$this->year."','".$this->class."','".$section."','Requested','".$this->scoreoutof."','".$this->releasto."',NOW(),'".$_SESSION["username"]."','".$delivery_date."'),";
			}
			$query = "INSERT INTO da_studentAnnualReports (schoolCode,year,class,section,status,score_outof,releaseto,requested_dt,requested_by,delivery_dt) VALUES ".rtrim($insert_values,",");
			$dbqry = new dbquery($query,$connid);
			header("Location: studentAnnualReports1.php?clsdatestrequest_class=$this->class&go=Go");
		}
		
		if($this->submited && $this->action == "ExportResult"){
			
			$xlsheader = array("Roll No","Student ID","Student Name","Class","Section","Score - Maths","Score - Sci","Score - Eng");
			$xlsfilename = $_SESSION["school_code"]."_Class_".$this->class;
			$objPHPExcel = new PHPExcel();
			$querycond = "";
			$sectionArray = array();
			
			$sectionArray = getSectionToShow($this->class,$this->year);
			if(is_array($sectionArray) && count($sectionArray) > 0){
				$sectionstr = implode("','",$sectionArray);
				$querycond = " AND da_studentAnnualResults.section IN('".$sectionstr."')";
			}
			
			// Set document properties                                                                                                                                                                                                                               
			$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
										 ->setLastModifiedBy("Maarten Balliauw")
										 ->setTitle("Office 2007 XLSX Test Document")
										 ->setSubject("Office 2007 XLSX Test Document")
										 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
										 ->setKeywords("office 2007 openxml php")
										 ->setCategory("Test result file");
			
			$query = "SELECT da_studentAnnualResults.rollNo,da_studentAnnualResults.studentID,da_studentMaster.studentName,
							 da_studentAnnualResults.class,da_studentAnnualResults.section,da_studentAnnualResults.sub2_avg as scoremat,
							 da_studentAnnualResults.sub3_avg as scoresci,da_studentAnnualResults.sub1_avg as scoreeng
					  FROM da_studentAnnualResults,da_studentMaster
					  WHERE da_studentAnnualResults.studentID = da_studentMaster.studentID
					  AND da_studentMaster.schoolCode = '".$_SESSION["school_code"]."'
					  AND da_studentAnnualResults.class = '".$this->class."'
					  AND da_studentAnnualResults.year = '".$this->year."'
					  $querycond
					  ORDER BY da_studentAnnualResults.class,da_studentAnnualResults.section,da_studentAnnualResults.rollNo,da_studentAnnualResults.studentID";
			$result = mysql_query($query);
			$row = 1; // 1-based index
			$col = 0;
			foreach($xlsheader as $key => $value){
		        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
		        $col++;
			}
			$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFont()->setBold(true);
			$row++;
			while($row_data = mysql_fetch_assoc($result)) {
			    $col = 0;
			    foreach($row_data as $key=>$value) {
			    	$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
			        $col++;
			    }
			    $row++;
			}
			$objPHPExcel->getActiveSheet()->setTitle($xlsfilename);
			$objPHPExcel->setActiveSheetIndex(0);
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$xlsfilename.'.xlsx"');
			header('Cache-Control: max-age=0');
			$objWriter->save('php://output');
			exit;
		}
		
	}
	
	function getRequestedReportsDetails($class,$year,$connid){
		
		if($class =="" || $year == "") return;
		$ReportArr = array();
		$query = "SELECT id,schoolCode,year,class,section,status,score_outof,releaseto,DATE_FORMAT(requested_dt,'%d-%m-%Y') as requested_dt,
						 requested_by,DATE_FORMAT(delivery_dt,'%d-%m-%Y') as delivery_dt
				  FROM da_studentAnnualReports 
				  WHERE schoolCode = '".$_SESSION["school_code"]."' AND class = '".$class."' AND year = '".$year."'";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowassocarray()){
			$ReportArr[$result["section"]] = $result;
		}
		return $ReportArr;
		
	}
    
    function getExamDetails($examcode){
        if(empty($examcode)){ 
            return false;         
        }
		$query = "SELECT request_id, exam_code, section, report_status, report_date, expired_status, display_status FROM "
                . " da_examDetails WHERE exam_code = '$examcode' LIMIT 1";
		$dbqry = new dbquery($query,$this->connid);
		$examDetails =  $dbqry->getrowassocarray();
        return $examDetails;
    }
    
}	

?>

