<?php
class clsdatest
{
	var $papercode;
	var $subjectno;
	var $totalQues;
	var $class;
	var $action;
	var $quesArray;
	var $correctAnsArray;
	var $quesNo;
	var $qcodeArray;
	var $test_requestid;
	var $attendeeArray;
	var $approverArray;
	var $testRequestArray;
	var $reportingLevelArray;
	var $quesSkillArray;
	var $paperType;
	var $testStatus;
	var $sstlist;
	var $requiredQues;
	var $groupsst;
	var $sstname;
	var $stname;
	var $startDate;
	var $endDate;
	var $testSubject;
	var $reportingHeadArray;
	var $ques_sstArray;
	var $examCode;
	var $quesRHdetails;
	var $ques_rhArray;
	var $error;
	var $testName;
	var $quesMisconceptionArray;
	var $quesTagArray;
	var $searchAlloter;
	var $searchApprover;
	var $spcl_requestid;
	var $searchSchool;
	var $searchClass;
	var $fromAllotment;
	var $reporting_id;
	var $version;
	var $ufreason;
	var $reportingOrder;
	var $request_details;
	var $two_day;
	var $seven_day;
	var $month;
	var $year;
	var $importRequestID;
	var $reportingID;
	var $reportingHeadID;
	var $chapter_id;
	var $schoolCode;
	var $skills;
	var $qcode;
	var $plannedCountArray;
	var $searchMonth;
	var $showQuesTesting;
	var $delRhDetails;
	var $searchRequest;
	var $tb_id;
	var $searchExamCode;
	var $searchChapters;
	var $searchTestName;
	var $showReports;
	var $showOnlyOverAll;
	var $zone;
	var $deliverBy;
	var $testType;
	var $startDeliverDate;
	var $endDeliverDate;
	var $arrGRPQustion;
	var $DataTransferSchoolCode;
	var $error_set;
	var $request_date;
	var $sstLevelArray;
	var $NewReportingHead;
	var $IPSMismatch;
	var $UniqueUsed;
	var $UnusedUniqueUsed;
	var $flagset;
	var $countUnique;
	var $timer_set;
	var $person;
	var $reasonManualSet;
	var $chpaterMCArray;
	var $allotedJobArrCheckbox;
	var $assemblyJobAlloter;
	var $task_search;
	var $alloter_search;
	var $search_request_id;
	var $englishMcChapterwise;
	var $changeBalanceChapter;
	var $request_type;
	var $autoset_flag;
	var $flag;
	var $test_date;
	var $chapter_name;
	var $newtestdate;
	var $startApproveDate;
	var $endApproveDate;
	var $englishConditionCheckFlag;
	var $englishConditionCheckFlagArr; 
	var $globalcheckQcodeArray;
	var $dropped_questions_flag;
	var $drop_qcodes_frm_bestFit;
	var $dropQuestions_failedCnt;
	var $bluePrintQues_count;
	var $currentAssembledQcodeArr; 
	var $jumblePDF_flag; 
	var $addDictionaryWordsArr;
	var $startFinalizeDate;
	var $endFinalizeDate;
	
	function clsdatest()
	{
		$this->papercode = "";
		$this->subjectno = "";
		$this->class = "";
		$this->action = "";
		$this->quesArray = array();
		$this->correctAnsArray = array();
		$this->totalQues = 0;
		$this->test_requestid = 0;
		$this->attendeeArray = array();
		$this->approverArray = array();
		$this->testRequestArray = array();
		$this->reportingLevelArray = array();
		$this->quesSkillArray = array();
		$this->paperType = "";
		$this->testStatus = "";
		$this->sstlist = array();
		$this->requiredQues = array();
		$this->reportingHead = array();
		$this->groupsst = array();
		$this->sstname = array();
		$this->stname = array();
		$this->startDate = "";
		$this->endDate = "";
		$this->testSubject = "";
		$this->reportingHeadArray = array();
		$this->quesRHdetails = array();
		$this->ques_sstArray = array();
		$this->sstArray = array();
		$this->examCode = "";
		$this->ques_rhArray = array();
		$this->error = "";
		$this->testName = "";
		$this->quesMisconceptionArray = array();
		$this->quesTagArray = array();
		$this->searchAlloter = "";
		$this->searchApprover = "";
		$this->spcl_requestid = "";
		$this->searchSchool = "";
		$this->searchClass = "";
		$this->fromAllotment = "";
		$this->reqcnt = "";
		$this->addedcnt = "";
		$this->version = "";
		$this->ufreason = "";
		$this->reportingOrder = "";
		$this->request_details = "";
		$this->two_day = "";
		$this->seven_day = "";
		$this->month = "";
		$this->year = "";
		$this->importRequestID = "";
		$this->reportingID = "";
		$this->reportingHeadID = "";
		$this->testDate = "";
		$this->chapter_id = "";
		$this->schoolCode = "";
		$this->skills = "";
		$this->qcode = "";
		$this->plannedCountArray = array();
		$this->searchMonth = "";
		$this->showQuesTesting = "";
		$this->delRhDetails = "";
		$this->searchRequest = "";
		$this->tb_id = array();
		$this->searchExamCode = "";
		$this->searchChapters = "";
		$this->searchTestName = "";
		$this->showReports = "";
		$this->showOnlyOverAll = "";
		$this->zone = "";
		$this->deliverBy = "";
		$this->testType = "";
		$this->startDeliverDate = "";
		$this->endDeliverDate = "";
		$this->arrGRPQustion = array();
		$this->DataTransferSchoolCode = array(263,3033,3598,16591,16795,16855,17925,18396,21150,23997,24060,24668,26978,27425,42625,45494,47385,54239,56490,57910,60381,68878,106496,110697,124138,149442,153271,163368,165834,169794,169963,170099,170622,172149,175250,178268,183578,185336,194456,202374,207093,209328,209447,210666,211918,220184,220284,224856,226272,226742,228121,253858,255648,258293,281366,301048,309270,343881,356995,364234,364480,371778,383080,394551,396325,408736,409494,411876,413252,416343,416821,423384,428436,437634,439410,444218,450484,451829,453926,454513,473147,495578,507090,522044,525210,525392,531041,537187,538235,539575,544871,558676,561140,577294,581418,613873,615868,617957,618511,620889,630789,632896,635870,642669,655669,658950,676882,679233,682760,690912,736050,749568,762795,790799,796828,829818,839114,891348,912899,942680,955955,994059,995778,1016991,1019428,1022191,1026343,1029466,1050151,1064665,1069653,1102950,1111355,1114788,1166254,1173541,1175495,1203680,1214217,1259649,1272564,1312595,1315210,1330320,1370988,1391497,1433396,1434746,1438430,1485826,1498877,1515967,1553466,1601346,1624382,1651476,1719827,1722766,1793670,1840381,1846185,1859083,1860140,1868729,1999271,2017322,2038645,2039560,2053321,2057359,2068567,2145276,2159059,2192996,2255292,2285293,2363620,2384771,2390367,2392614,2408274,2410118,2431574,2431622,2435098,2436444,2440186,2441783,2451822,2458794,2459111,2459475,2459540,2459656,2462023,2462519,2464812,2465923,2469043,2477115,2479616,2480996,2485722,2488010,2494212,2496391,2498840,2502777,2502830,2503225,2504537,2506817,2506942,2507029,2507661,2508220,2512661,
											  24374,2387554,2459944,2492338,415337,366777,1337028,651378,1733578,524522,10251,2436678,439385,449949,1187617,47745,60414,104187,559960,2379583,982556,764756,1666662,51820,2405521,1500777,203339,482842,20191,815613,2436678,165035,1672951,5184,63421,384445,34736,205449,45959,50110,395483,770229,50010,60573,1163014,2039326,45519,2392614,529319,496982,203718,180028,409763,365439,64811,2470230,404271,2500183,581062,60854,1596332);
		$this->error_set = "";
		$this->request_date = "";
		$this->sstLevelArray = array();
		$this->NewReportingHead = "";
		$this->IPSMismatch = array();
		$this->UniqueUsed = array();
		$this->UnusedUniqueUsed = array();
		$this->flagset = 0;
		$this->countUnique = 1;
		$this->timer_set = "";
		$this->person = "";
		$this->reasonManualSet = "";
		$this->chpaterMCArray = array();
		$this->allotedJobArrCheckbox = array();
		$this->assemblyJobAlloter;
		$this->task_search;
		$this->alloter_search;
		$this->search_request_id;
		$this->englishMcChapterwise = array();
		$this->changeBalanceChapter = array();
		$this->request_type = "";
		$this->autoset_flag = "";
		$this->flag = "";
		$this->test_date = "";
		$this->chapter_name = "";
		$this->newtestdate = "";
		$this->startApproveDate = "";
		$this->endApproveDate = "";
		$this->englishConditionCheckFlag = "Y";
		$this->englishConditionCheckFlagArr = array();
		$this->globalcheckQcodeArray = array();
		$this->dropped_questions_flag = "";		
		$this->drop_qcodes_frm_bestFit = "";
		$this->dropQuestions_failedCnt = 0;
		$this->bluePrintQues_count =  0;
		$this->currentAssembledQcodeArr = array();
		$this->jumblePDF_flag =0;
		$this->addDictionaryWordsArr = array();
		$this->startFinalizeDate="";
		$this->endFinalizeDate="";
	}

	function setpostvars()
	{
		if(isset($_POST["subjectno"])) $this->subjectno = $_POST["subjectno"];
		if(isset($_POST["hdnaction"])) $this->action = $_POST["hdnaction"];
		if(isset($_POST["class"])) $this->class = $_POST["class"];
		if(isset($_POST["testclass"])) $this->class = $_POST["testclass"];
		if(isset($_POST["papercode"])) $this->papercode = $_POST["papercode"];
		if(isset($_POST["quesNo"])) $this->quesNo = $_POST["quesNo"];
		if(isset($_POST["qcode"])) $this->qcodeArray = $_POST["qcode"];
		if(isset($_POST["testRequestId"])) $this->test_requestid = $_POST["testRequestId"];
		if(isset($_POST["hdnRequestId"])) $this->testRequestArray = $_POST["hdnRequestId"];
		if(isset($_POST["clsdatest_attendee"])) $this->attendeeArray = $_POST["clsdatest_attendee"];
		if(isset($_POST["clsdatest_approver"])) $this->approverArray = $_POST["clsdatest_approver"];
		if(isset($_POST["clsdatest_reportingLevel"])) $this->reportingLevelArray = $_POST["clsdatest_reportingLevel"];
		if(isset($_POST["paperType"])) $this->paperType = $_POST["paperType"];
		if(isset($_POST["clsdatest_status"])) $this->testStatus = $_POST["clsdatest_status"];
		if(isset($_POST["clsdatest_comments"])) $this->comments = $_POST["clsdatest_comments"];
		if(isset($_POST["clsdatest_requiredQues"])) $this->requiredQues = $_POST["clsdatest_requiredQues"];
		if(isset($_POST["clsdatest_reportingHead"])) $this->reportingHead = $_POST["clsdatest_reportingHead"];
		if(isset($_POST["clsdatest_groupsst"])) $this->groupsst = $_POST["clsdatest_groupsst"];
		if(isset($_POST["clsdatest_sstname"])) $this->sstname = $_POST["clsdatest_sstname"];
		if(isset($_POST["clsdatest_stname"])) $this->stname = $_POST["clsdatest_stname"];
		if(isset($_POST["clsdatest_sstlist"])) $this->sstlist = $_POST["clsdatest_sstlist"];
		if(isset($_POST["clsdatest_startDate"])) $this->startDate = $_POST["clsdatest_startDate"];
		if(isset($_POST["clsdatest_endDate"])) $this->endDate = $_POST["clsdatest_endDate"];
		if(isset($_POST["clsdatest_testSubject"])) $this->testSubject = $_POST["clsdatest_testSubject"];
		if(isset($_POST["hdnreportingHeads"])) $this->quesRHdetails = $_POST["hdnreportingHeads"];
		if(isset($_POST["hdnQnoReportingHeads"])) $this->ques_rhArray = $_POST["hdnQnoReportingHeads"];
		if(isset($_POST["hdnsst"])) $this->sstArray = $_POST["hdnsst"];
		if(isset($_POST["examCode"])) $this->examCode = $_POST["examCode"];
		if(isset($_POST["clsdatest_testName"])) $this->testName = $_POST["clsdatest_testName"];
		if(isset($_POST["clsdatest_searchalloter"])) $this->searchAlloter = $_POST["clsdatest_searchalloter"];
		if(isset($_POST["clsdatest_searchapprover"])) $this->searchApprover= $_POST["clsdatest_searchapprover"];
		if(isset($_POST["clsdatest_searchschool"])) $this->searchSchool = $_POST["clsdatest_searchschool"];
		if(isset($_POST["clsdatest_searchclass"])) $this->searchClass = $_POST["clsdatest_searchclass"];
		if(isset($_POST["clsdatest_ufreason"])) $this->ufreason = $_POST["clsdatest_ufreason"];
		if(isset($_POST["clsdatest_reportingOrder"])) $this->reportingOrder = $_POST["clsdatest_reportingOrder"];
		if(isset($_POST["clsdatest_month"])) $this->month =  $_POST["clsdatest_month"];
		if(isset($_POST["clsdatest_year"])) $this->year =  $_POST["clsdatest_year"];
		if(isset($_POST["clsdatest_importRequestID"]))	$this->importRequestID = $_POST["clsdatest_importRequestID"];
		if(isset($_POST["clsdatest_hdnReportingID"])) $this->reportingHeadID = $_POST["clsdatest_hdnReportingID"];
		if(isset($_POST["clsdatest_testDate"])) $this->testDate =  $_POST["clsdatest_testDate"];
		if(isset($_POST["clsdatest_chapters"])) $this->chapter_id =  $_POST["clsdatest_chapters"];
		if(isset($_POST["clsdatest_skills"])) $this->skills =  $_POST["clsdatest_skills"];
		if(isset($_POST["clsdatest_plannedCount"])) $this->plannedCount = $_POST["clsdatest_plannedCount"];
		if(isset($_POST["clsdatest_showQuesTesting"])) $this->showQuesTesting = $_POST["clsdatest_showQuesTesting"];
		if(isset($_POST["clsdatest_delReportingHead"])) $this->delRhDetails = $_POST["clsdatest_delReportingHead"];
		if(isset($_POST["clsdatest_searchRequest"])) $this->searchRequest = $_POST["clsdatest_searchRequest"];
		if(isset($_POST["clstxtbook_tbid"])) $this->tb_id = $_POST["clstxtbook_tbid"];
		if(isset($_POST["clsdatest_searchExamCode"])) $this->searchExamCode = $_POST["clsdatest_searchExamCode"];
		if(isset($_POST["clsdatest_searchChapters"])) $this->searchChapters = $_POST["clsdatest_searchChapters"];
		if(isset($_POST["clsdatest_searchTestName"])) $this->searchTestName = $_POST["clsdatest_searchTestName"];
		if(isset($_POST["clsdatest_showReports"])) $this->showReports = $_POST["clsdatest_showReports"];
		if(isset($_POST["clsdatest_showOnlyOverAll"])) $this->showOnlyOverAll =  $_POST["clsdatest_showOnlyOverAll"];
		if(isset($_POST["clsdatest_zone"])) $this->zone = $_POST["clsdatest_zone"];
		if(isset($_POST["clsdatest_deliverBy"])) $this->deliverBy = $_POST["clsdatest_deliverBy"];
		if(isset($_POST["clsdatest_testType"])) $this->testType = $_POST["clsdatest_testType"];
		if(isset($_POST["clsdatest_startDeliverDate"])) $this->startDeliverDate = $_POST["clsdatest_startDeliverDate"];
		if(isset($_POST["clsdatest_endDeliverDate"])) $this->endDeliverDate = $_POST["clsdatest_endDeliverDate"];
		if(isset($_POST["clsdatest_request_date"])) $this->request_date = $_POST["clsdatest_request_date"];
		if(isset($_POST["NewReportingHeadName"])) $this->NewReportingHead = $_POST["NewReportingHeadName"];
		if(isset($_POST["clsdatest_person"])) $this->person = $_POST["clsdatest_person"];
		
		if(isset($_POST["clsdatest_subjectselect"])) $this->subjectno = $_POST["clsdatest_subjectselect"];
		if(isset($_POST["spnTime"])) $this->timer_set = $_POST["spnTime"];
		if(isset($_POST["clsdatest_reset_manual"])) $this->reasonManualSet = $_POST["clsdatest_reset_manual"];
		
		if(isset($_POST["assembly_allot_checkbox"])) $this->allotedJobArrCheckbox = $_POST["assembly_allot_checkbox"];
		if(isset($_POST["jobs_alloter"])) $this->assemblyJobAlloter = $_POST["jobs_alloter"];
		if(isset($_POST["clsdatest_task"])) $this->task_search = $_POST["clsdatest_task"];
		if(isset($_POST["clsdatest_alloted_person"])) $this->alloter_search = $_POST["clsdatest_alloted_person"];
		if(isset($_POST["clsdatest_search_request_id"])) $this->search_request_id = $_POST["clsdatest_search_request_id"];
		if(isset($_POST["change_balance"])) $this->changeBalanceChapter = $_POST["change_balance"];
		if(isset($_POST["autoset_flag"])) $this->autoset_flag = $_POST["autoset_flag"];		
		if(isset($_POST["clsdatest_flag"])) $this->flag = $_POST["clsdatest_flag"];
		if(isset($_POST["clsdatest_newtestdate"])) $this->newtestdate = $_POST["clsdatest_newtestdate"];
		
		if(isset($_POST["clsdatest_startApproveDate"])) $this->startApproveDate = $_POST["clsdatest_startApproveDate"];
		if(isset($_POST["clsdatest_endApproveDate"])) $this->endApproveDate = $_POST["clsdatest_endApproveDate"];
		if(isset($_POST["clsdatest_oldcurrentdate"])) $this->test_date = $_POST["clsdatest_oldcurrentdate"];
		if(isset($_POST["clsdatest_dropped_questions_flag"])) $this->dropped_questions_flag = $_POST["clsdatest_dropped_questions_flag"];

		if(isset($_POST["jumblePDF"])) $this->jumblePDF_flag =$_POST["jumblePDF"];

		if(isset($_POST['clsdatest_startFinalizeDate'])) $this->startFinalizeDate =$_POST['clsdatest_startFinalizeDate'];
		if(isset($_POST['clsdatest_endFinalizeDate'])) $this->endFinalizeDate =$_POST['clsdatest_endFinalizeDate'];
		if(isset($_POST['clsdatest_requestType'])) $this->request_type =$_POST['clsdatest_requestType'];
	}

	function setgetvars()
	{
		if(isset($_GET["subjectno"])) $this->subjectno = $_GET["subjectno"];
		if(isset($_GET["class"])) $this->class = $_GET["class"];
		if(isset($_GET["testclass"])) $this->class = $_GET["testclass"];
		if(isset($_GET["papercode"])) $this->papercode = $_GET["papercode"];
		if(isset($_GET["paperType"])) $this->paperType = $_GET["paperType"];
		if(isset($_GET["action"])) $this->action = $_GET["action"];
		if(isset($_GET["status"])) $this->testStatus = $_GET["status"];
		if(isset($_GET["testSubject"])) $this->testSubject = $_GET["testSubject"];
		if(isset($_GET["fromAllotment"])) $this->fromAllotment = $_GET["fromAllotment"];
		if(isset($_GET["reqcnt"])) $this->reqcnt = $_GET["reqcnt"];
		if(isset($_GET["addedcnt"])) $this->addedcnt = $_GET["addedcnt"];
		if(isset($_GET["examCode"])) $this->examCode = $_GET["examCode"];
		if(isset($_GET["version"])) $this->version = $_GET["version"];
		if(isset($_GET["requests"])) $this->request_details = $_GET["requests"];
		if(isset($_GET["schoolno"])) $this->searchSchool = $_GET["schoolno"];
		if(isset($_GET["twoDay"])) $this->two_day = $_GET["twoDay"];
		if(isset($_GET["sevenDay"])) $this->seven_day = $_GET["sevenDay"];
		if(isset($_GET["startDate"])) $this->startDate = $_GET["startDate"];
		if(isset($_GET["endDate"])) $this->endDate = $_GET["endDate"];
		if(isset($_GET["reportingID"])) $this->reportingID = $_GET["reportingID"];
		if(isset($_GET["editRequestID"])) $this->test_requestid = $_GET["editRequestID"];
		if(isset($_GET["qcode_usage"])) $this->qcode = $_GET["qcode_usage"];
		if(isset($_GET["searchMonth"])) $this->searchMonth = $_GET["searchMonth"];
		if(isset($_GET["showReports"]) && $_GET["showReports"] == 1) $this->showReports = $_GET["showReports"];
		
		if(isset($_GET["zone"])) $this->zone = $_GET["zone"];
		if(isset($_GET["person"])) $this->person = $_GET["person"];
		if(isset($_GET["srchyear"])) $this->year =  $_GET["srchyear"];				
	}
	function pageAddEditTestDetails($connid)
	{
		$this->setgetvars();
		$this->setpostvars();

		if($this->action=="Delete")
			$this->removeQuesRhWise($connid);
		if($this->action=="SaveOrder")
			$this->saveQuesOrder($connid);
		if($this->action=="AddToTest")
			$this->addQuestionsToPaper($connid);
		if($this->action == "GetPaper")
			$this->generatePapercode($connid);
		if($this->action == "GenAutoPaper")
			$this->GenerateAutoPaper($connid);
		if($this->action == "GenAutoPaperVersion2")
			$this->GenAutoPaperVersion2($connid);		
		if($this->action == "GenAutoPaperEnglish")
			$this->GenerateAutoPaperEnglish($connid);
		if($this->action == "GenAutoPaperEnglishVersion2")
			$this->GenAutoPaperEnglishVersion2($connid);		
		if($this->action == "AllotApprove")
			$this->assignAllotApprover($connid);
		if($this->action == "Finalize")
		{
			$this->finalizePaper($connid);
		}
		if($this->action == "Unfinalize")
			$this->unfinalizePaper($connid);
		if($this->action == "Approve")
			$this->approvePaper($connid);
		if($this->action == "SaveComments")
			$this->saveComments($connid);
		if($this->action == "SaveReporting")
			$this->saveReportingDetails($connid);
		if($this->action == "Reset")
			$this->resetReportingDetails($connid);
		if($this->action == "RefreshAuto")
			$this->refreshAutoReportingDetails($connid);
		if($this->action == "AddIndicatorQuestions")
			$this->updateReportingHeadAndReqQues($connid);
		if($this->action == "updateReportingDetails")
			$this->updateReportingHeadAndReqQues($connid);
		if($this->action == "GeneratePDF")
		{
			
			$chkquery = "SELECT status FROM da_testRequest WHERE paper_code = '".$this->papercode."' AND id = '".$this->test_requestid."' ";
			$dbquerySel = new dbquery($chkquery,$connid);
			$rowSel = $dbquerySel->getrowarray();
			if($rowSel['status']=="Approved")
			{
				$this->error.= "<div align='center'><font color='red'><b>You can't generate PDF for approved paper!</b></font></div>";
			}
			
			
			
			$arrValidations = $this->validationGeneratePDF($connid);
			if($arrValidations["qcodeListPending"]!="")
			{
				$qcodes = explode(",",$arrValidations["qcodeListPending"]);			
			}			
			
			#For Reporting Head Blank Validation
			if(isset($arrValidations) && count($arrValidations)>0)
			{		
				if($arrValidations["reportingHeadError"]=="Yes")
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>Reporting head have blank qcode list</b></font>";
					$this->error.= "</div>";
				}
			}			
			#For Reporting Head Blank Validation

			// Unapproved questions  Naveen
			if(isset($arrValidations) && count($arrValidations)>0)
			{				
				if($arrValidations["UnapprovedQuestions"] !="" )
				{
					$this->error.="<div align='center'><font color='red'><b>";
					$this->error.="<br/>  ".$arrValidations["UnapprovedQuestions"]."</b></font>";
					$this->error.= "</div>";
				} 
			}

			// For unapproved questions
			
			#For Date of exam Validation
			if(isset($arrValidations) && count($arrValidations)>0)
			{		
				if($arrValidations["testDateError"]=="Yes")
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>Test date is missing</b></font>";
					$this->error.= "</div>";
				}
			}
			#For Date of exam Validation
			
			#For Name of exam Validation
			if(isset($arrValidations) && count($arrValidations)>0)
			{		
				if($arrValidations["testNameError"]=="Yes")
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>Test name is missing</b></font>";
					$this->error.= "</div>";
				}
			}
			#For Name of exam Validation

			#For Class Validation
			if(isset($arrValidations) && count($arrValidations)>0)
			{		
				if($arrValidations["classError"]=="Yes")
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>Class is missing</b></font>";
					$this->error.= "</div>";
				}
			}
			#For Class Validation
			
			#For SchoolName Validation
			if(isset($arrValidations) && count($arrValidations)>0)
			{		
				if($arrValidations["schoolnameError"]=="Yes")
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>Schoolname is missing</b></font>";
					$this->error.= "</div>";
				}
			}
			#For SchoolName Validation
			
			#For No of Question Validation
			if(isset($arrValidations) && count($arrValidations)>0)
			{		
				if($arrValidations["noofQuestionError"]=="Yes")
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>No question is there in paper for pdf generation</b></font>";
					$this->error.= "</div>";
				}
			}			
			#For No of Question Validation
			
			#For Examcode Validation
			if(isset($arrValidations) && count($arrValidations)>0)
			{		
				if($arrValidations["examcodeError"]=="Yes")
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>Examcode is missing</b></font>";
					$this->error.= "</div>";
				}
			}				
			#For Examcode Validation		
			
			#For Table td blank
			if($arrValidations["tdblanklist"]!="")
			{
				$this->error.= "<div align='center'><font color='red'><b>";
				//$this->error.="<br/>Qcode : ".$arrValidations["tdblanklist"]." are having td blank in table</b></font>";
				$this->error.="<br/>Qcode : ".$arrValidations["tdblanklist"]." are having line blank in table</b></font>";
				$this->error.= "</div>";
			}
			
			#For Table td blank
			
			#For Image Missing Validation
			if($arrValidations["imagemissing"]!="")
			{
				$this->error.= "<div align='center'><font color='red'><b>";
				$this->error.="<br/>Qcode : ".$arrValidations["imagemissing"]." are having the images missing</b></font>";
				$this->error.= "</div>";
			}
			#For Image Missing Validation
			
			#For Image jpg Validation
			if($arrValidations["imagejpg"]!="")
			{
				$this->error.= "<div align='center'><font color='red'><b>";
				$this->error.="<br/>Qcode : ".$arrValidations["imagejpg"]." have not jpg type images</b></font>";
				$this->error.= "</div>";
			}
			#For Image jpg Validation
			
			#For Image height width Validation
			if($arrValidations["imageheightwidthQcodeList"]!="")
			{
				$this->error.= "<div align='center'><font color='red'><b>";
				$this->error.="<br/>Qcode : ".$arrValidations["imageheightwidthQcodeList"]." have not satisfied height and width condition for images</b></font>";
				$this->error.= "</div>";
			}
			#For Image height width Validation
			
			#For Image dpi Validation
			if($arrValidations["imagedpi"]!="")
			{
				$this->error.= "<div align='center'><font color='red'><b>";
				$this->error.="<br/>Qcode : ".$arrValidations["imagedpi"]." have not satisfied dpi condition for images</b></font>";
				$this->error.= "</div>";
			}
			#For Image dpi Validation
				
			$arrLinkQcodeImage = array();
			if(isset($arrValidations) && count($arrValidations)>0)
			{
				
				foreach($qcodes as $qcode)
				{					
					$qcode_Set = "";					
					if(isset($this->arrGRPQustion[$qcode])){$qcode_Set = $this->arrGRPQustion[$qcode]; }else{$qcode_Set = $qcode;}
					$arrLinkQcodeImage[] = "<a href='daAdmin_imageformatting.php?searchqcode=$qcode&mode=GetImages&action=fromSSTstatus' target='_blank'><font color='red'>".$qcode_Set."</font></a>";
				}
				if(isset($arrLinkQcodeImage) && count($arrLinkQcodeImage)>0)
				{
					$this->error.= "<div align='center'><font color='red'><b>";
					$this->error.="<br/>Qcode : ".implode(",",$arrLinkQcodeImage)." are having the images pending to be approved</b></font>";
					$this->error.= "</div>";
				}	
			}
			if($this->error == "")
			{
				// Naveen version 1 generate
		
				$i =1;
				$queryCode = "SELECT  da_paperDetails.qcode_list, da_testRequest.flag FROM da_paperDetails LEFT JOIN  da_testRequest ON da_paperDetails.papercode =da_testRequest.paper_code WHERE da_testRequest.id ='".$this->test_requestid."' AND da_paperDetails.papercode = '".$this->papercode."' AND da_paperDetails.version = 1 AND da_paperDetails.qcode_list != '' ";
				
				$dbqueryCode = new dbquery($queryCode,$connid);
				$rowCode = $dbqueryCode->getrowarray();
			
				if($rowCode["flag"] =="Auto" && $this->jumblePDF_flag ==1)
				{
					if($this->subjectno == 2 || $this->subjectno == "3" || $this->subjectno=="100")
					{
						$this->getPaperVersions($connid,$i,$rowCode["qcode_list"]);
					}
					else if($this->subjectno == 1)
					{
						$this->getEngPaperVersions($connid,$i,$rowCode["qcode_list"]);
					}
				}
				else
				{
						$this->generatePDF($connid,$this->examCode,"1");
				}
								
				//Naveen Jumbling of questions 	
				// Commented because version 1 PDF is generated when jumbling for auto paper and if they confirm
			//	$this->generatePDF($connid,$this->examCode,"1");
				$this->generateVersions($connid,$this->subjectno);
				$this->lastUpdatedPDFgeneration($connid);
			}
			
			
		}
		if($this->action == "SaveTestName")
		{
			$this->saveTestName($connid);
		}
		if($this->action == "Delete" || $this->action == "SaveOrder" || $this->action == "AddToTest")
		{
			$this->resetVersions($connid);
		}
		if($this->action == "importPaper")
			$this->generatePapercode($connid);
		if($this->action == "updateRequestDetails")
			$this->editRequestDetails($connid);
		if($this->action == "DeleteReportingHead")
			$this->delReportingHeads($connid);
		if($this->action == "MergeReportingHead")
			$this->MergeReportingHeads($connid,$this->test_requestid,$this->papercode,$this->reportingHeadID,$this->NewReportingHead);
		if($this->action == "GetAllRelatedAssemblyJobs")
			return $this->GetAllRelatedAssemblyJobs($connid);
		if($this->action == "SaveRelatedAssemblyJobsAllotment")
			return $this->SaveRelatedAssemblyJobsAllotment($connid);
		if($this->action=="ChangeBalance")
		{
			$this->GenAutoPaperVersion2($connid);
		}			
		if($this->action == "autoAssemble")
		{
			$this->GenAutoPaperVersion2($connid);
		}	
		if($this->action == "autoAssemble_english")
		{
			$this->GenAutoPaperEnglishVersion2($connid);
		}	

		// second approve seleted questions 
		if($this->action =="secondApproval") {
			$this->second_ApprovedQues($connid);
		}
	}
	
	function GenerateAutoPaperEnglish($connid)
	{
		$qcode_list = "";
		if($this->test_requestid == 0) return;
		
		if($this->test_requestid != 0 && $this->test_requestid != ""){
			$arrVocabArr = array();
			$requestDetails = $this->GetRequestDetails($this->test_requestid,"",$connid);
		//	$board = $this->getBoardUsingSchoolCoad($requestDetails["schoolCode"],$connid); // Fetching the board of school			
			// Added year parameter for shifting board in ordermaster table - Naveen
			$board = $this->getBoardUsingSchoolCoad($requestDetails["schoolCode"],$requestDetails["year"],$connid); // Fetching the board of school
			
			/******************Getting Blue Print based on board and class OF school ***************/
			$blueprintDetails = $this->getAutoBluePrintEnglish($board,$requestDetails["class"],$requestDetails["subject"],$connid);
			
			foreach($blueprintDetails as $key=>$value)
			{
				$selectAllPassageMultiple = array();
				if($value['no_of_passage']==1)/*****Passage Selection ******/
				{	
					$arrPassageFormDetails = $this->getPassageFormDetails($value['id'],$connid);
					$arrMinMax = array();
					foreach($arrPassageFormDetails as $rowkey=>$rowvalue)
					{
						$selectAllPassageMultiple[$rowvalue['passage_form']] = $this->getPassageForms($rowvalue['passage_form'],$value['class'],$value['subjectno'],$connid);
						$arrMinMax[$rowvalue['passage_form']]["min"] =  $rowvalue['min'];	
						$arrMinMax[$rowvalue['passage_form']]["max"] =  $rowvalue['max'];
					}
					$qcode_list .= $this->selectQcodeList($selectAllPassageMultiple,$arrMinMax,$connid);
				}
				if($value['no_of_passage']>1)/*****Passage Selection ******/
				{
					$arrPassageFormDetails = $this->getPassageFormDetails($value['id'],$connid);
					$arrMinMax = array();
					foreach($arrPassageFormDetails as $rowkey=>$rowvalue)
					{
						$selectAllPassageMultiple[$rowvalue['passage_form']] = $this->getPassageForms($rowvalue['passage_form'],$value['class'],$value['subjectno'],$connid);
						$arrMinMax[$rowvalue['passage_form']]["min"] =  $rowvalue['min'];
						$arrMinMax[$rowvalue['passage_form']]["max"] =  $rowvalue['max'];
					}	
					$qcode_list .= $this->selectQcodeList($selectAllPassageMultiple,$arrMinMax,$connid);
				}
				
				$mintotal = 0;
				$maxtotal = 0;
				foreach($arrMinMax as $keynew=>$valuenew){
					$mintotal = $mintotal + $valuenew["min"];
					$maxtotal = $maxtotal + $valuenew["max"];
				}
				
				$qcode_list_check = $qcode_list;
				$arrQcodeCountCheck = explode(",",substr_replace($qcode_list_check,"",-1))	;
				if(count($arrQcodeCountCheck)>=$mintotal && count($arrQcodeCountCheck)<=$maxtotal){
					$this->error = "";
				}
				
			  	$get_qcode_list = $qcode_list;
			   	if($this->error=="")/*****Vocab Free Selection ******/
			   	{
					$arrQcodeCount = explode(",",substr_replace($qcode_list,"",-1))	;
				
					$vocab_min = $value['vocab_min'];
					$vocab_max = $value['total_ques']-count($arrQcodeCount);
					$arrVocabArr = $this->selectVocabQuestion($value['class'],$value['subjectno'],$connid);
					$forgrp = array();
					foreach($arrVocabArr as $keygrp=>$valuegrp){
						$forgrp[] = $valuegrp['qcode'];
					}
					$qcodelistgrp = implode(",",$forgrp);
					$arrSetGrpInfo = $this->groupConcat($qcodelistgrp,$connid);

					if(isset($arrVocabArr) && count($arrVocabArr)>0)
					{
						$arrCheckGrp = array();
						$percentage = 0;
						$grpcount = 0;
						$arrSetGRP = array();
						if(count($arrVocabArr)>=$vocab_min)
						{
							$percentage = round(($vocab_max)*0.30);
							$count_misconception = 0;
							shuffle($arrVocabArr);
							
							//Selecting MIsconception Questions
							foreach($arrVocabArr as $key=>$value)
							{
								if($value['mccount']==1){	
									$arrCheckGrp[$value['qcode']] = $value['qcode'];								
									$qcode_list .= $value['qcode'].",";
									$count_misconception++;
									unset($arrVocabArr[$key]);
									if($value['group_list']!=0 && $value['group_list']!=""){
										$arrSetGRP[$value['group_list']] = $value['group_list'];
										$grpcount++;
									}
								}
								if($count_misconception==$percentage){
									break;
								}
							}
							
							$tochoosequestion = $vocab_max-$count_misconception."<br/>";
							shuffle($arrVocabArr);
							
							foreach($arrVocabArr as $key=>$value)
							{
								if($value['mccount']==0)
								{
									$arrCheckGrp[$value['qcode']] = $value['qcode'];	
									$qcode_list .= $value['qcode'].",";
									$count_misconception++;
									unset($arrVocabArr[$key]);
									if($value['group_list']!=0 && $value['group_list']!=""){
										$arrSetGRP[$value['group_list']] = $value['group_list'];
										$grpcount++;
									}
								}
								
								if($count_misconception==$vocab_max){
									break;
								}
							}
							
							/******************If Any Group Questions Selcted Select other qcodes of that groups ***************/
							if(isset($arrSetGRP) && count($arrSetGRP)>0)
							{
								foreach($arrSetGRP as $grpid=>$grpvalue)
								{
									$getQcodes = $arrSetGrpInfo[$grpid]["qcode_list"];
									$getArraySetGrp = explode(",",$getQcodes);
									foreach($getArraySetGrp as $keysetNewGrp => $valuesetNewGrp)
									{
										if(!in_array($valuesetNewGrp,$arrCheckGrp)){
											$getArrayGrp[] = $valuesetNewGrp;
										}
									}
									
									foreach($arrCheckGrp as $keysetgrp=>$valuesetgrp)
									{
										$arrGetValue = $this->getvalueforqcode($valuesetgrp,$connid);
										if(($arrGetValue[$valuesetgrp]["group_id"]!=$grpid && $arrGetValue[$valuesetgrp]["group_id"]==0 && $arrGetValue[$valuesetgrp]["misconception"]!=1) || 
										($arrGetValue[$valuesetgrp]["group_id"]!=$grpid && $arrGetValue[$valuesetgrp]["group_id"]=="" && $arrGetValue[$valuesetgrp]["misconception"]!=1))
										{
											
											foreach($getArrayGrp as $keyArrayGrp=>$valueArrayGrp){
												if($valueArrayGrp!=$valuesetgrp){
													$arrCheckGrp[$keysetgrp] = $valueArrayGrp;
													unset($getArrayGrp[$keyArrayGrp]);
													break;
												}
											}
										}
									}
								}	
							}
							if($grpcount>0)
							{
								$q_list = implode(",",$arrCheckGrp);
								$arrCheckGrp = $this->orderByGroup($q_list,$connid);
							}
							if(isset($arrCheckGrp) && count($arrCheckGrp)>0 && $grpcount>0){
								$qcode_list_get = implode(",",$arrCheckGrp);
								$qcode_list = $get_qcode_list.$qcode_list_get.",";
							}
							
							if(($count_misconception>=$vocab_min) && ($count_misconception<=$vocab_max)){
								
							}
							else{
								$this->error .= "Not enough questions in Vocab Free Form.<br/>";
							}
							
						}
						else {
							$this->error .= "Not enough questions in Vocab Free Form.<br/>";
						}
					}
				}
			}
			if($this->error!="")
			{
				$this->error = "<font color=red><b>The paper cannot be auto-assembled as - <br/>".$this->error."</b></font>";
			}
			
			$qcode_list_set = substr_replace($qcode_list,"",-1);
			
			/******************Getting Reporting Heads SST based on selected qcode list***************/
			if($qcode_list_set!=""){
				$arrReportingHead = $this->setReportingHead($qcode_list_set,$connid);
			}
			
		    $this->subjectno =  $requestDetails["subject"];
		    $this->class = $requestDetails["class"];
		    $this->generatePapercode($connid);
		    $this->paperType = '2';
		    $i=0;
		    foreach($arrReportingHead as $key => $value)
		    {
		    	$i++;
		    	$arrCount = explode(",",$value[qcode_list]);
		    	$rqcount = count($arrCount);
		    	$queryInsert = "INSERT INTO da_reportingDetails (papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order,entered_dt) 
		    					VALUES('$this->papercode','sst','$value[sstlist]','$value[qcode_list]','$rqcount','$key','$i',NOW())";
		    	$dbqueryInsert = new dbquery($queryInsert,$connid);
		    }
		    
		    $queryUpdate = "UPDATE da_testRequest SET flag = 'Auto' WHERE id = '$this->test_requestid'";
		    $dbqueryUpdate = new dbquery($queryUpdate,$connid);
		    
		    $querySel = "UPDATE da_paperDetails SET qcode_list = '$qcode_list_set' where papercode = '$this->papercode' AND version = '1'";
		    $dbquerySel = new dbquery($querySel,$connid);
		    
		    echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$requestDetails["subject"]."&testclass=".$requestDetails["class"]."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&autopublish=set&error_msg=".$this->error."\"</script>";		    
		}	

	}
	function groupConcat($arrGroupConcat,$connid)
	{
		$arrSet = array();
		$querySel = "select GROUP_CONCAT(qcode) as qcode_list,count(qcode) as qcount,group_id from da_questions where qcode IN ($arrGroupConcat) AND group_id != 0 GROUP BY group_id";
		$dbquerySel = new dbquery($querySel,$connid);
			while($rowSel = $dbquerySel->getrowarray())
			{				
				$arrSet[$rowSel['group_id']] = array("qcode_list"=>$rowSel['qcode_list'],"qcount"=>$rowSel['qcount']);
			}
		return $arrSet;
	}
	function setReportingHead($qcode_list_set,$connid)
	{
		$arrSet = array();
		$querySel = "select d.description,GROUP_CONCAT(b.sub_subtopic_code) as sstlist,GROUP_CONCAT(b.qcode) as qcode_list from da_questions b 
					 INNER JOIN da_subSubTopicMaster c ON b.sub_subtopic_code = c.sub_subtopic_code INNER JOIN da_subtopicMaster d ON c.subtopic_code = d.subtopic_code 
		             WHERE b.qcode IN ($qcode_list_set) GROUP BY d.description";
		$dbquerySel = new dbquery($querySel,$connid);
        while($rowSel = $dbquerySel->getrowarray())
        {				
            $arrSet[$rowSel['description']] = array("sstlist"=>$rowSel['sstlist'],"qcode_list"=>$rowSel['qcode_list']);
        }
		return $arrSet;
	}
	function orderByGroup($arrGroupConcat,$connid)
	{
		$arrSet = array();
		$querySel = "select qcode from da_questions where qcode IN ($arrGroupConcat) ORDER BY group_id";
		$dbquerySel = new dbquery($querySel,$connid);
        while($rowSel = $dbquerySel->getrowarray())
        {				
            $arrSet[$rowSel['qcode']] = $rowSel['qcode'];
        }
		return $arrSet;
	}
	function getvalueforqcode($qcode,$connid)
	{
		$arrSet = array();
		$querySel = "select qcode ,group_id, misconception from da_questions where qcode IN ($qcode)";
		$dbquerySel = new dbquery($querySel,$connid);
			while($rowSel = $dbquerySel->getrowarray())
			{			
				$arrSet[$rowSel['qcode']] = array("qcode"=>$rowSel['qcode'],"group_id"=>$rowSel['group_id'],"misconception"=>$rowSel['misconception']);
			}
		return $arrSet;
	}
	function selectVocabQuestion($class_set,$subject_set,$connid)
	{
		$arrSet = array();
		$querySel = "SELECT b.qcode,b.misconception as mccount, b.sub_subtopic_code  AS subtopiclist, b.group_id AS group_list 
					 FROM da_questions b INNER JOIN da_subSubTopicMaster c ON b.sub_subtopic_code = c.sub_subtopic_code 
					 INNER JOIN da_subtopicMaster d ON 
					 c.subtopic_code = d.subtopic_code 
					 AND b.class = '$class_set' 
					 AND b.subjectno = '$subject_set' 
					 AND d.description IN ('Contextual meaning','Word Knowledge') AND b.passage_id = 0 AND b.school_usage = 0 ORDER BY d.description";
        $dbquerySel = new dbquery($querySel,$connid);
        while($rowSel = $dbquerySel->getrowarray())
        {				
            $arrSet[$rowSel['qcode']] = array("qcode"=>$rowSel['qcode'],"mccount"=>$rowSel['mccount'],"subtopiclist"=>$rowSel["subtopiclist"],"group_list"=>$rowSel['group_list']);
        }
        return $arrSet;
	}
	function selectQcodeList($selectAllPassageMultiple,$arrMinMax,$connid)
	{
		$qcode_list = "";
		foreach($selectAllPassageMultiple as $keypassage => $valuepassage)
		{
			$arrSelectQcodes = array();
			$max = $arrMinMax[$keypassage]["max"];
			$min = $arrMinMax[$keypassage]["min"];
			foreach($valuepassage as $keyname => $keyvalue)
			{
				foreach($keyvalue as $keypassageid => $valuepassageid)
				{
					if($valuepassageid['qcount']>=$min && $valuepassageid['qcount']<=$max){
						$arrSelectQcodes[] = $keyvalue[$keypassageid];
					}								
				}
				
				if(isset($arrSelectQcodes) && count($arrSelectQcodes)>0){
					
				}
				else{
					$this->error .= "Not enoughs question in ".$keyname.".<br/>";
				}
			}
			
			if(isset($arrSelectQcodes) && count($arrSelectQcodes)>0){
				if(count($arrSelectQcodes)>1)
				{
					$arrMisConceptionCheck = array();
					$maxqcount = array();
					foreach($arrSelectQcodes as $key => $value){
						$maxqcount[] = $value['qcount'];
					}
					$max_set = max($maxqcount);
					foreach($arrSelectQcodes as $key => $value)
					{
						if($value['qcount']==$max_set)
						{
							$arrMisConceptionCheck[] = $arrSelectQcodes[$key];
						}
					}	
					$micconception = 0;
					$comparemcconception = 0;
					$arrSetQcodeList = array();
					foreach($arrMisConceptionCheck as $key=>$value)
					{
						$comparemcconception = $value['mccount'];
						if((($micconception)<($comparemcconception)) || (($micconception)==($comparemcconception)))
						{
						$micconception = $comparemcconception;
						$arrSetQcodeList[0] = $arrMisConceptionCheck[$key];
						}
					}
					if(isset($arrSetQcodeList) && count($arrSetQcodeList)>0)
					{
						if(count($arrSetQcodeList)>1){
							$qcode_list .= $arrSetQcodeList[0]['qcodelist'].",";
						}
						else{
							$qcode_list .= $arrSetQcodeList[0]['qcodelist'].",";
						}
					}
					
				}
				else {
					$qcode_list .= $arrSelectQcodes[0]['qcodelist'].",";
				}
			}
		}
		return $qcode_list;
					
	}
	
	// Added year parameter for board shifted to ordermaster table -Naveen
//	function getBoardUsingSchoolCoad($schoolCode,$connid)
	function getBoardUsingSchoolCoad($schoolCode,$year,$connid)
	{
		$board = "";
		$valid_board_arr = array("state","cbse","icse","igcse");
	//	$querySel = "SELECT board FROM schools WHERE schoolno = '".$schoolCode."' ";
		$querySel = "SELECT board FROM da_orderMaster WHERE schoolCode = '".$schoolCode."' AND year ='".$year."' ";

		$dbquerySel = new dbquery($querySel,$connid);
		$rowSel = $dbquerySel->getrowarray();
		
		if($rowSel["board"] == "")	$board = "State";
		else{
			$SchoolArr = explode(",",$rowSel["board"]);
			
			if(count($SchoolArr)== 1 && in_array(strtolower($SchoolArr[0]),$valid_board_arr)){
				$board = $SchoolArr[0];				
			}	
			elseif(count($SchoolArr)== 1 && !in_array(strtolower($SchoolArr[0]),$valid_board_arr)){
				if(strtolower($SchoolArr[0])=="matriculation")
				{
					$board = "State";					
				}
				else if(strtolower($SchoolArr[0])=="cambridge")
				{
					$board = "IGCSE";					
				}
				else 
				{
					$board = "State";
				}	
			}
			elseif(count($SchoolArr) > 1){				
				$board = "CBSE";								
			}
		}
		return $board;
	}
	function getAutoBluePrintEnglish($boards,$class_set,$subject_set,$connid) 
	{
		$arrSet = array();
		$querySel = "select * from da_autoblueprintdetails where class = '$class_set' AND subjectno = '$subject_set' AND board LIKE '%$boards%'";
		$dbquerySel = new dbquery($querySel,$connid);
		$rowSel = $dbquerySel->getrowarray();
		$arrSet[$row[id]] = array("id" => $rowSel['id'],
								  "class" => $rowSel['class'],
								  "subjectno" => $rowSel['subjectno'],
								  "no_of_passage" => $rowSel['no_of_passage'],
								  "passage_min" => $rowSel['passage_min'],
								  "passage_max" => $rowSel['passage_max'],
								  "passage_form" => $rowSel['passage_form'], 
								  "vocab_min" => $rowSel['vocab_min'],
								  "vocab_max" => $rowSel['vocab_max'],
								  "total_ques" => $rowSel['total_ques'],
								  "board" => $rowSel['board']);
		return $arrSet;					
	}
	function selectAllPassageAvailable($passage_forms,$class_forms,$subject_forms,$connid)
	{
		$arrSet = array();
		$passageForms = explode(",",$passage_forms);
		foreach($passageForms as $row)
		{
			$querySel = "SELECT count( b.qcode ) AS qcount,SUM(IF(b.misconception=1,1,0)) as mccount,GROUP_CONCAT(b.sub_subtopic_code) as subtopiclist,a.passage_id,a.passage_name,a.subjectno,a.pas_form FROM qms_passage a 
						 INNER JOIN da_questions b ON a.passage_id = b.passage_id 
						 INNER JOIN da_subSubTopicMaster c ON b.sub_subtopic_code = c.sub_subtopic_code 
						 INNER JOIN da_subtopicMaster d ON c.subtopic_code = d.subtopic_code 
						 WHERE a.project = 'DA' AND a.status = 'A' AND a.subjectno = '$subject_forms' 
						 AND a.class = '$class_forms' AND a.pas_form = '$row' AND d.description IN ('Extended Reasoning','Literal Comprehension','Contextual meaning','	Word Knowledge') AND b.school_usage = '0' GROUP BY a.passage_id";
			$dbquerySel = new dbquery($querySel,$connid);
			while($rowSel = $dbquerySel->getrowarray())
			{				
				$arrSet[$rowSel["pas_form"]][$rowSel['passage_id']] = array("qcount"=>$rowSel['qcount'],"qcodelist"=>$rowSel['qcodelist'],"mccount"=>$percentage,"pas_form"=>$rowSel["pas_form"],"subtopiclist"=>$rowSel["subtopiclist"]);
			}
		}
		return $arrSet;
	}
	function getPassageFormDetails($abp_id,$connid)
	{
		$arrSet = array();
		$querySel = "select * from da_autopassageformdetails where abp_id = $abp_id";
		$dbquerySel = new dbquery($querySel,$connid);
		while($rowSel = $dbquerySel->getrowarray())
			{
				$arrSet[$rowSel[id]] = array("id"=>$rowSel['id'],"abp_id"=>$rowSel["abp_id"],"passage_form"=>$rowSel["passage_form"],"min"=>$rowSel["min"],"max"=>$rowSel["max"]);
			}
		return $arrSet;
	}
	function getPassageForms($passage_forms,$class_forms,$subject_forms,$connid)
	{
		$arrSet = array();
		$passageForms = explode("/",$passage_forms);
		foreach($passageForms as $row)
		{			
			$querySel = "SELECT count( b.qcode ) AS qcount,GROUP_CONCAT(b.qcode) as qcodelist,SUM(IF(b.misconception=1,1,0)) as mccount,GROUP_CONCAT(b.sub_subtopic_code) as subtopiclist,a.passage_id,a.passage_name,a.subjectno,a.pas_form 
						 FROM qms_passage a INNER JOIN da_questions b ON a.passage_id = b.passage_id  
						 INNER JOIN da_subSubTopicMaster c ON b.sub_subtopic_code = c.sub_subtopic_code 
						 INNER JOIN da_subtopicMaster d ON c.subtopic_code = d.subtopic_code 
						 WHERE a.project = 'DA' AND a.status = 'A' AND a.subjectno = '$subject_forms' 
						 AND a.class = '$class_forms' AND a.pas_form = '$row' AND d.description IN ('Extended Reasoning','Literal Comprehension','Contextual meaning','	Word Knowledge') AND b.school_usage = '0' GROUP BY a.passage_id";
			$dbquerySel = new dbquery($querySel,$connid);
			$percentage = 0;
			while($rowSel = $dbquerySel->getrowarray())
			{
				$percentage = round(($rowSel["mccount"]/$rowSel['qcount'])*100);
				$arrSet[$rowSel["pas_form"]][$rowSel['passage_id']] = array("qcount"=>$rowSel['qcount'],"qcodelist"=>$rowSel['qcodelist'],"mccount"=>$percentage,"pas_form"=>$rowSel["pas_form"],"subtopiclist"=>$rowSel["subtopiclist"]);
			}
		}
		return $arrSet;
	}
	function getStatusOfAutopublish($connid)
	{
		$querySel = "select flag from da_testRequest where id = '$this->test_requestid'";
		$dbquerySel = new dbquery($querySel,$connid);
		$rowSel = $dbquerySel->getrowarray();
		return $rowSel["flag"];
	}
	/**************************************************************************************************************************************/
	
	function GenerateAutoPaper($connid){
		
		if($this->test_requestid == 0) return;
		
		if($this->test_requestid != 0 && $this->test_requestid != ""){
		
			$requestDetails = $this->GetRequestDetails($this->test_requestid,"",$connid);
			
			/******************Search for same request id based on chapters ***************/
			$SameRequestDetails = $this->SearchSameRequestOfPaper($this->test_requestid,$requestDetails["chapter_id"],$requestDetails["class"],$requestDetails["subject"],$connid);
						
			if(is_array($SameRequestDetails) && count($SameRequestDetails) > 0){ /******************If same request id found ***************/
				if($requestDetails["schoolCode"] != $SameRequestDetails["schoolCode"]){ /******************If schoolcode is not same ***************/
					
					$this->papercode = $requestDetails["paper_code"];
					$this->class = $requestDetails["class"];
					$this->subjectno = $requestDetails["subject"];
					$this->paperType = $requestDetails["paper_type"];
					
					$papercode = $this->GenNewPaperCode($connid);					
					$this->importRequestID = $SameRequestDetails["id"];
					
					$this->importPaper($connid,$papercode);
					
					if($this->papercode != ""){
						$queryAutoUpdate = "Update da_testRequest set flag = 'Auto' where id = '$this->test_requestid'";  
						$dbqryAutoUpdate = new dbquery($queryAutoUpdate,$connid);
						echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."\"</script>";
					}
					
				}elseif($requestDetails["schoolCode"] == $SameRequestDetails["schoolCode"]){ /******************If schoolcode is same ***************/
					$this->papercode = $requestDetails["paper_code"];
					$this->class = $requestDetails["class"];
					$this->subjectno = $requestDetails["subject"];
					$this->paperType = $requestDetails["paper_type"];
					
					$newPaperCode = $this->GenNewPaperCode($connid);
					$referencePapercode = $SameRequestDetails["paper_code"];
					$this->importReportingDetails($newPaperCode,$referencePapercode,$connid);
					$this->SelectCopyQuestions($newPaperCode,$this->class,$connid,$referencePapercode);
				}
			}else{ /******************If same request id not found ***************/
				
				$this->papercode = $requestDetails["paper_code"];
				$this->class = $requestDetails["class"];
				$this->subjectno = $requestDetails["subject"];
				$this->paperType = $requestDetails["paper_type"];
					
				$newPaperCode = $this->GenNewPaperCode($connid);
				$this->papercode = $newPaperCode;
				echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."\"</script>";
			}
		}
	}
	/***************************************Auto Assembly English Version 2 Start from here ********************************/
	
	function GenAutoPaperEnglishVersion2($connid){		
		if($this->action=="autoAssemble_english")
		{
			$this->refreshAutoReportingDetails($connid);			
		}
		if($this->action=="updateRequestDetails")
		{
			$this->refreshAutoReportingDetails($connid);			
			$this->flagset = 1;
		}       
		#Define Array For Passage Selection
		$arrStartEndWordArr = array();
		$arrStartEndWordArr["3"] = array("start"=>100,"end"=>250);
		$arrStartEndWordArr["4"] = array("start"=>100,"end"=>250);
		$arrStartEndWordArr["5"] = array("start"=>100,"end"=>250);
		$arrStartEndWordArr["6"] = array("start"=>200,"end"=>349);
		$arrStartEndWordArr["7"] = array("start"=>200,"end"=>349);
		$arrStartEndWordArr["8"] = array("start"=>200,"end"=>349);
		$arrStartEndWordArr["9"] = array("start"=>350,"end"=>2000);
		$arrStartEndWordArr["10"] = array("start"=>350,"end"=>2000);
		
		$paper_type_fetch = 0;
		$requestDetails = $this->GetRequestDetails($this->test_requestid,"",$connid);
		$this->papercode = $requestDetails["paper_code"];
		$this->class = $requestDetails["class"];
		$this->subjectno = $requestDetails["subject"];
		$this->paperType = $requestDetails["paper_type"];
		$this->schoolCode = $requestDetails["schoolCode"];
		$this->request_type = $requestDetails['request_type'];
		if($this->paperType == 1 || $this->paperType == 2 || $this->paperType == 6)
		{
			$paper_type_fetch = 2;
		}
		else 
		{
			$paper_type_fetch = 1;
		}                
        
        /*Story 2064 */
        $isVocabRequested = false;
        include_once (constant("PATH_ABSOLUTE_CLASSES").'eidachapters.cls.php');
        include_once(constant("PATH_ABSOLUTE_CLASSES")."eidaquestions.cls.php");
        $eidachapter = new clsdachapter();
        $eidaquestionObj = new clsdaquestion();
        $requestChapters = explode(",", $requestDetails['chapter_id']);
        $chapterTopicDetails = $eidachapter->getTopicDetails($requestChapters, $connid);
        foreach($chapterTopicDetails as $chapter){
            if(isset($chapter['topic_code']) && $chapter['topic_name'] == 'Vocabulary'){
                $isVocabRequested = true;
                break;
            }
        }
        error_log('########### VOCABULARY REQUESTED ###########' . json_encode($isVocabRequested));
		$papercode = $this->GenNewPaperCode($connid);
		$finalArrForTableChapterWise = array();
		$priorityArrForClassSelection = array(); 
		#For Change Process Of Passage Selection Class Selection Single
		$priorityArrForClassSelectionPassage = array(); 
		$priorityArrForClassSelectionPassage[$requestDetails["class"]][1] = $requestDetails["class"];
				
		#For Change Process Of Passage Selection Class Selection Single		
		$finalMismatchQuestions = array();
		$qcodePaperList = "";
		
		$priorityArrForClassSelection = $this->SelectPriorityAsPerClass($requestDetails["class"],$connid);
		
		$no_of_passage = 0;
		
		//Added year parameter for changing board to Ordermaster table
		$board = $this->getBoardUsingSchoolCoad($requestDetails["schoolCode"],$requestDetails["year"],$connid); // Fetching the board of school
		$blueprintArr = $this->FetchRequiredQuestion($requestDetails["class"],$requestDetails["subject"],$paper_type_fetch,$board,$connid,$requestDetails["schoolCode"],$requestDetails["year"]);
		$totalQuestionsRequired = $blueprintArr["total_questions"];
		$totaPassagesRequired = $blueprintArr["total_passages"];

		if($totalQuestionsRequired == 0)
		{
			$queryUpdatePaperCode = "UPDATE da_testRequest set paper_code = '' where id = '$this->test_requestid'";
			$rowUpdatePaperCode = new dbquery($queryUpdatePaperCode,$connid);
			$queryDeletePaperCode = "DELETE from da_questionSelectionSummary where request_id = '$this->test_requestid'";
			$rowDeletePaperCode = new dbquery($queryDeletePaperCode,$connid);
			if($this->flagset==0)
			{
				echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
				exit;
			}	
		}
			
		if($totalQuestionsRequired != 0){					
            $generalTotalQuestionRequired = $totalQuestionsRequired;
            $passageSelected = array();
            $year_passage = $requestDetails['year'];
            $past_year_passage = $year_passage - 1;
            $updateCounter = 1;
            ################Here code for RC Start#######################
            if($this->paperType == 1 || $this->paperType == 2 || $this->paperType == 6)
            {
                if( $board == "State"  || $totaPassagesRequired == 1 ) 
                {
                    $countedQuestion = 0;
                    $passageRandFlag = "";

                    // random select image or text passage if only 1 passage required and board is not state based on rand value
                    if($totaPassagesRequired ==1 && $board != "State" )
                        $passageRandFlag = rand(0,100);

                    if($passageRandFlag =="" )
                        $finalArrForTableChapterWise = $this->ForTextPassageSelection($arrStartEndWordArr,$priorityArrForClassSelectionPassage,$requestDetails['schoolCode'],$year_passage,$past_year_passage,$connid,"1");
                    else 
                    {
                        // not state board so random image or text passage 
                        if($passageRandFlag > 50 )
                            $finalArrForTableChapterWise =$this->ForImagePassageSelection($arrStartEndWordArr,$priorityArrForClassSelectionPassage,$requestDetails['schoolCode'],$year_passage,$past_year_passage,'',$connid);
                        else
                            $finalArrForTableChapterWise = $this->ForTextPassageSelection($arrStartEndWordArr,$priorityArrForClassSelectionPassage,$requestDetails['schoolCode'],$year_passage,$past_year_passage,$connid,"1");
                    }

                    foreach($finalArrForTableChapterWise as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
                    {
                        $passage_id = $keyArrForTableChapterWise;
                        $FinalQuestionsSelected = explode(",",$finalArrForTableChapterWise[$keyArrForTableChapterWise]["final_all_qcode_list"]);
                        $qcode_list_final = $finalArrForTableChapterWise[$keyArrForTableChapterWise]["final_all_qcode_list"];	
                        $FinalQuestionsSelected = array_filter($FinalQuestionsSelected);				
                        if(isset($FinalQuestionsSelected) && count($FinalQuestionsSelected) > 0)
                        {
                            $countedQuestion = count($FinalQuestionsSelected);
                        }	
                    }

                    $sub_sst_list = $this->getSSTByQcodesForEnglish($FinalQuestionsSelected,$connid);
                    if($sub_sst_list=="")
                    {
                        $sub_sst_list = $sub_subtopic_code_set;
                    }				

                    #Start on 23/05/2012

                    $arrSTRelated = $this->getSTRevisedRelatedToPassage($qcode_list_final,$connid);
                    
                    $vocabPlusGroupQuestions = array();
                    $dbqueryUpdateReportingOrder = new dbquery(null,$connid);	
                    foreach($arrSTRelated as $keySTRelated => $valueSTRelated)
                    {
                        $addReportingHead = true;
                        $qcodeArr = explode(',', $qcode_list_ST);
                        if($isVocabRequested === false){
                            $questionTopics = $eidaquestionObj->getTopicDetails($connid, $qcodeArr);
                            foreach($questionTopics as $question){
                                if($keySTRelated == 'Vocabulary' && $question['topic_name'] == 'Vocabulary' && $question['group_id'] != '0' && $question['group_id'] != ''){
                                    array_push($vocabPlusGroupQuestions, $question['qcode']);
                                }
                            }
                            if(count($vocabPlusGroupQuestions) > 0){
                                $addReportingHead = false;
                            }
                        }
                        if($addReportingHead === true){
                            $qcode_list_ST = $valueSTRelated;
                            $reporting_head_name_ST = $keySTRelated;

                            $qcodeArrST = explode(",",$valueSTRelated);
                            $requiredST = count($qcodeArrST);                                               

                            $sub_sst_list_ST = $this->getSSTByQcodesForEnglish($qcodeArrST,$connid);
                            $queryUpdateReportingOrder = "INSERT INTO da_reportingDetails set papercode = '$papercode',reporting_level = 'sst',sst_list = '$sub_sst_list_ST',qcode_list = '$qcode_list_ST',required_ques = '".count($qcodeArrST)."',reporting_head = '".addslashes($reporting_head_name_ST)."',reporting_order = '$updateCounter',entered_dt = '".date('Y-m-d')."',entered_by = '".$_SESSION["username"]."'";
                            $dbqueryUpdateReportingOrder->executequery($queryUpdateReportingOrder);	
                        }
                        $updateCounter++;
                    }
                    $this->mergeVocabularyUnderRcReportingHead($connid, $vocabPlusGroupQuestions, $papercode);
                     
                    #End on 23/05/2012

                    if($qcode_list_final!=""){
                        $qcodePaperList = $qcodePaperList.$qcode_list_final.",";
                    }

                }
                else 
                {
                    $countedQuestion = 0;
                    #First Passage Selection

                    $finalArrForTableChapterWise = $this->ForTextPassageSelection($arrStartEndWordArr,$priorityArrForClassSelectionPassage,$requestDetails['schoolCode'],$year_passage,$past_year_passage,$connid);
                    foreach($finalArrForTableChapterWise as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
                    {
                        $passage_id = $keyArrForTableChapterWise;
                        $FinalQuestionsSelected = explode(",",$finalArrForTableChapterWise[$keyArrForTableChapterWise]["final_all_qcode_list"]);
                        $qcode_list_final = $finalArrForTableChapterWise[$keyArrForTableChapterWise]["final_all_qcode_list"];	
                        $FinalQuestionsSelected = array_filter($FinalQuestionsSelected);
                        if(isset($FinalQuestionsSelected) && count($FinalQuestionsSelected)>0)
                        {				
                            $countedQuestion = count($FinalQuestionsSelected);
                        }	
                    }

                    $sub_sst_list = $this->getSSTByQcodesForEnglish($FinalQuestionsSelected,$connid);
                    if($sub_sst_list=="")
                    {
                        $sub_sst_list = $sub_subtopic_code_set;
                    }
                    #Start on 23/05/2012

                    $arrSTRelated = $this->getSTRevisedRelatedToPassage($qcode_list_final,$connid);				
                    
                    $vocabPlusGroupQuestions = array();
                    $dbqueryUpdateReportingOrder = new dbquery(null,$connid);
                    
                    foreach($arrSTRelated as $keySTRelated => $valueSTRelated)
                    {
                                                                       
                        $addReportingHead = true;
                        $qcodeArr = explode(',', $qcode_list_ST);
                        if($isVocabRequested === false){
                            $questionTopics = $eidaquestionObj->getTopicDetails($connid, $qcodeArr);
                            foreach($questionTopics as $question){
                                if($keySTRelated == 'Vocabulary' && $question['topic_name'] == 'Vocabulary' && $question['group_id'] != '0' && $question['group_id'] != ''){
                                    array_push($vocabPlusGroupQuestions, $question['qcode']);
                                }
                            }
                            if(count($vocabPlusGroupQuestions) > 0){
                                $addReportingHead = false;
                            }
                        }
                        
                        if($addReportingHead === true){
                            $qcode_list_ST = $valueSTRelated;
                            $reporting_head_name_ST = $keySTRelated;

                            $qcodeArrST = explode(",",$valueSTRelated);
                            $requiredST = count($qcodeArrST);                                              
                            $sub_sst_list_ST = $this->getSSTByQcodesForEnglish($qcodeArrST,$connid);

                            $queryUpdateReportingOrder = "INSERT INTO da_reportingDetails set papercode = '$papercode',reporting_level = 'sst',sst_list = '$sub_sst_list_ST',qcode_list = '$qcode_list_ST',required_ques = '".count($qcodeArrST)."',reporting_head = '".addslashes($reporting_head_name_ST)."',reporting_order = '$updateCounter',entered_dt = '".date('Y-m-d')."',entered_by = '".$_SESSION["username"]."'";
                            $dbqueryUpdateReportingOrder->executequery($queryUpdateReportingOrder);	
                        }                                                
                        
                        $updateCounter++;
                    }
                    $this->mergeVocabularyUnderRcReportingHead($connid, $vocabPlusGroupQuestions, $papercode);

                    #End on 23/05/2012

                    if($qcode_list_final!="")
                    {
                        $qcodePaperList = $qcodePaperList.$qcode_list_final.",";
                    }

                    #Second Passage Selection

                    $finalArrForTableChapterWiseImage = $this->ForImagePassageSelection($arrStartEndWordArr,$priorityArrForClassSelectionPassage,$requestDetails['schoolCode'],$year_passage,$past_year_passage,$keyArrForTableChapterWise,$connid);
                    $finalArrForTableChapterWise = $finalArrForTableChapterWise + $finalArrForTableChapterWiseImage;

                    foreach($finalArrForTableChapterWiseImage as $keyArrForTableChapterWiseImage => $valueArrForTableChapterWiseImage)
                    {
                        $passage_id = $keyArrForTableChapterWiseImage;
                        $FinalQuestionsSelected = explode(",",$finalArrForTableChapterWiseImage[$keyArrForTableChapterWiseImage]["final_all_qcode_list"]);
                        $qcode_list_final = $finalArrForTableChapterWiseImage[$keyArrForTableChapterWiseImage]["final_all_qcode_list"];					
                        $FinalQuestionsSelected = array_filter($FinalQuestionsSelected);
                        if(isset($FinalQuestionsSelected) && count($FinalQuestionsSelected)>0)
                        {
                            $countedQuestion = $countedQuestion + count($FinalQuestionsSelected);
                        }	
                    }

                    $sub_sst_list = $this->getSSTByQcodesForEnglish($FinalQuestionsSelected,$connid);
                    if($sub_sst_list=="")
                    {
                        $sub_sst_list = $sub_subtopic_code_set;
                    }

                    #Start on 23/05/2012

                    $arrSTRelated = $this->getSTRevisedRelatedToPassage($qcode_list_final,$connid);

                    foreach($arrSTRelated as $keySTRelated => $valueSTRelated)
                    {
                        $qcodeArrST = explode(",",$valueSTRelated);
                        $requiredST = count($qcodeArrST);
                        $qcode_list_ST = $valueSTRelated;
                        $reporting_head_name_ST = $keySTRelated;
                        $sub_sst_list_ST = $this->getSSTByQcodesForEnglish($qcodeArrST,$connid);

                        $checkArr = array();
                        $count_checking = $this->checkCountForUsedST($papercode,$keySTRelated,$connid);
                        $checkArr = $this->checkCountForUsedSTArr($papercode,$keySTRelated,$connid);

                        if($count_checking > 0)
                        {
                            $sst_list_check = $checkArr["sst_list"];
                            $qcode_list_check = $checkArr["qcode_list"];
                            $required_ques_check = $checkArr["required_ques"];
                            $reporting_order_check = $checkArr["reporting_order"];
                            if($sub_sst_list_ST!='')
                            {
                                if($sst_list_check=='')
                                {
                                    $sst_list_check = $sub_sst_list_ST;	
                                }
                                else 
                                {
                                    $arrSSTOld = explode(",",$sst_list_check);
                                    $arrSSTNew = explode(",",$sub_sst_list_ST);
                                    foreach($arrSSTNew as $keySSTNew => $valueSSTNew)
                                    {
                                        if(in_array($valueSSTNew,$arrSSTOld))
                                        {
                                            unset($arrSSTNew[$keySSTNew]);
                                        }
                                    }
                                    $sub_sst_list_ST = implode(",",$arrSSTNew);
                                    if($sub_sst_list_ST!='')
                                    {
                                        $sst_list_check = $sst_list_check.",".$sub_sst_list_ST;
                                    }
                                }
                            }
                            if($qcode_list_ST!='')
                            {
                                if($qcode_list_check=='')
                                {
                                    $qcode_list_check = $qcode_list_ST;
                                }
                                else 
                                {
                                    $qcode_list_check = $qcode_list_check.",".$qcode_list_ST;
                                }	
                            }
                            if($requiredST!=0)
                            {
                                $required_ques_check = $required_ques_check+$requiredST;
                            }

                            $queryUpdateReportingOrder = "UPDATE da_reportingDetails set sst_list = '$sst_list_check',qcode_list = '$qcode_list_check',required_ques = '$required_ques_check',reporting_head = '".addslashes($reporting_head_name_ST)."',reporting_order = '$reporting_order_check',entered_dt = '".date('Y-m-d')."',entered_by = '".$_SESSION["username"]."' where reporting_head = '".$reporting_head_name_ST."' AND papercode = '$papercode'";						
                            $dbqueryUpdateReportingOrder = new dbquery($queryUpdateReportingOrder,$connid);	
                        }

                        else
                        {	
                            
                            $addReportingHead = true;
                            $qcodeArr = explode(',', $qcode_list_ST);
                            if($isVocabRequested === false){
                                $questionTopics = $eidaquestionObj->getTopicDetails($connid, $qcodeArr);
                                foreach($questionTopics as $question){
                                    if($keySTRelated == 'Vocabulary' && $question['topic_name'] == 'Vocabulary' && $question['group_id'] != '0' && $question['group_id'] != ''){
                                        array_push($vocabPlusGroupQuestions, $question['qcode']);
                                    }
                                }
                                if(count($vocabPlusGroupQuestions) > 0){
                                    $addReportingHead = false;
                                }
                            }
                        
                            if($addReportingHead === true){                                                        
                                $queryUpdateReportingOrder = "INSERT INTO da_reportingDetails set papercode = '$papercode',reporting_level = 'sst',sst_list = '$sub_sst_list_ST',qcode_list = '$qcode_list_ST',required_ques = '".count($qcodeArrST)."',reporting_head = '".addslashes($reporting_head_name_ST)."',reporting_order = '$updateCounter',entered_dt = '".date('Y-m-d')."',entered_by = '".$_SESSION["username"]."'";
                                $dbqueryUpdateReportingOrder = new dbquery($queryUpdateReportingOrder,$connid);	
                                $updateCounter++;
                            }
                        }
                    }
                    $this->mergeVocabularyUnderRcReportingHead($connid, $vocabPlusGroupQuestions, $papercode);

                    #End on 23/05/2012

                    if($qcode_list_final!="")
                    {
                        $qcodePaperList = $qcodePaperList.$qcode_list_final.",";
                    }


                }
            }
            #######################################################	
            ######For MC Selection Process ########(18/06/2012)
            $forMcQcodeList = "";
            $countMcNeeded = 0;
            $mcRequire = 5;
            $arrSelectedQcodeList = array();
            if($this->paperType == 1 || $this->paperType == 2 || $this->paperType == 6)
            {
                if($qcodePaperList!="")
                {
                    $forMcQcodeList = substr_replace($qcodePaperList,"",-1);
                    $countMcNeeded = $this->selectMcSelectedInPassage($forMcQcodeList,$connid);
                    if($countMcNeeded >= $mcRequire)
                    {
                        $mcRequire = 0;
                    }
                    else 
                    {
                        $mcRequire = $mcRequire - $countMcNeeded;
                    }
                }
            }
            else 
            {
                $mcRequire = 5;
            }		

            if($mcRequire>0)
            {
                $arrSortingArrForMc = array();
                $arrChapterForMc = explode(",",$requestDetails["chapter_id"]);

                $year_new_check = $requestDetails['year'];
                $past_year_new_check = $year_new_check - 1;		

                foreach($arrChapterForMc as $keyChapterForMc => $valueChapterForMc)
                {
                    $arrForMcAllCount = array();
                    $sub_subtopic_code_set_check = "";
                    $sub_subtopic_code_set_check = $this->getSubSubTopicOfChapter($valueChapterForMc,$connid);
                    foreach($priorityArrForClassSelection as $keyclass => $valueclass)
                    {
                        foreach($valueclass as $keyclassset => $valueclassset)
                        {
                            $arrMisconceptionQcode = array();
                            $class_set_for_qcode = $valueclass;
                            $arrMisconceptionQcodeCheck = $this->getAllMisconceptionQuestions($valueclassset,$sub_subtopic_code_set_check,$connid);
                            foreach($arrMisconceptionQcodeCheck as $keyMisconceptionCheck => $valueMisconceptionCheck)
                            {
                                $checkFlagSetForMc = 0;
                                $checkFlagSetForMc = $this->questionusedbeforeforenglish($valueMisconceptionCheck,$requestDetails['schoolCode'],$year_new_check,$past_year_new_check,$connid);							
                                if($checkFlagSetForMc==0)
                                {
                                    $arrForMcAllCount[$valueMisconceptionCheck] = $valueMisconceptionCheck; 
                                }
                            }						
                        }
                    }	

                    if(isset($arrForMcAllCount) && count($arrForMcAllCount)>0)
                    {
                        $arrSortingArrForMc[$valueChapterForMc] = count($arrForMcAllCount);
                    }
                    else 
                    {
                        $arrSortingArrForMc[$valueChapterForMc] = 0;
                    }	
                }

            }
            $forMcRelatedDecrease = $mcRequire;

            arsort($arrSortingArrForMc);

            foreach($arrSortingArrForMc as $keySortingArrForMc => $valueSortingArrForMc)
            {
                if($forMcRelatedDecrease>0)
                {
                    if($valueSortingArrForMc>0)
                    {
                        $this->englishMcChapterwise[$keySortingArrForMc] = 1;
                        $forMcRelatedDecrease = $forMcRelatedDecrease-1;
                    }
                    else 
                    {
                        $this->englishMcChapterwise[$keySortingArrForMc] = 0;
                    }
                }
                else 
                {
                    $this->englishMcChapterwise[$keySortingArrForMc] = 0;	
                }	
            }		

            ######For MC Selection Process ########(18/06/2012)		

            $totalQuestionsRequired = $totalQuestionsRequired - $countedQuestion;		

            $arrChaptersFetch = $this->chapterWiseQuestionNeeded($requestDetails["chapter_id"],$requestDetails["class"],$totalQuestionsRequired,$connid);

            $finalMismatchQuestions = $this->getAllMismatchQcodeArr($connid);

            ##########################Same answer question selection process###########################
            $arrSameAnswerUnusedQuestion = array();
            $arrSameAnswerUsedQuestion = array();
            ##########################Same answer question selection process###########################

            foreach($arrChaptersFetch as $keyChapterFetch => $valueChapterFetch)
            {			
                $FinalQuestionsSelected = array();
                $this->UniqueUsed = array();
                $this->UnusedUniqueUsed = array();
                $this->IPSMismatch = array();

                $sub_subtopic_code_set = "";
                $sub_subtopic_code_set = $this->getSubSubTopicOfChapter($keyChapterFetch,$connid);

                $finalArrForTableChapterWise[$keyChapterFetch]["chapter_id"] = $keyChapterFetch;
                $finalArrForTableChapterWise[$keyChapterFetch]["passage_id"] = 0;
                $finalArrForTableChapterWise[$keyChapterFetch]["request_id"] = $this->test_requestid;
                $finalArrForTableChapterWise[$keyChapterFetch]["best_fit_past_rid"] = "";
                $finalArrForTableChapterWise[$keyChapterFetch]["teacher_comment"] = "";
                $finalArrForTableChapterWise[$keyChapterFetch]["past_count"] = 0;

                $counterForChapter = 0;

                ####################Check For SSST Available######################
                $checkSSSTAvailable = 0;
                $arrSSSTAvailable = array();
                $arrSSSTAvailable = $this->getSSSTAvailable($keyChapterFetch,$connid);					
                if(isset($arrSSSTAvailable) && count($arrSSSTAvailable)>0)
                {
                    asort($arrSSSTAvailable);
                    $checkSSSTAvailable = count($arrSSSTAvailable);
                }
                ####################Check For SSST Available######################

                if($valueChapterFetch!=0)
                {
                ####################SSST New Process######################

                    #Misconception Selection 
                    if($mcRequire>0)
                    {
                        if($this->englishMcChapterwise[$keyChapterFetch]>0)
                        {					
                            foreach($priorityArrForClassSelection as $keyclass => $valueclass)
                            {
                                $year_new = $requestDetails['year'];
                                $past_year_new = $year_new - 1;
                                foreach($valueclass as $keyclassset => $valueclassset)
                                {
                                    $arrMisconceptionQcode = array();
                                    $arrMisconceptionQcodeCheckMC = array();
                                    $class_set_for_qcode = $valueclass;
                                    $arrMisconceptionQcodeCheckMC = $this->getAllMisconceptionQuestions($valueclassset,$sub_subtopic_code_set,$connid);

                                    #####Added For MC which is not used only######(18/06/2012)
                                    foreach($arrMisconceptionQcodeCheckMC as $keyMisconceptionQcodeCheckMC => $valueMisconceptionQcodeCheckMC)
                                    {
                                        $checkFlagSetForMc = 0;

                                        // To prevent same questions assembly
                                        $same_assembled = $this->checkSameQcodeEnglish($valueMisconceptionQcodeCheckMC,$requestDetails['schoolCode'],$requestDetails['class'],$connid);
                                        if($same_assembled ==1) continue;

                                        $checkFlagSetForMc = $this->questionusedbeforeforenglish($valueMisconceptionQcodeCheckMC,$requestDetails['schoolCode'],$year_new,$past_year_new,$connid);							
                                        if($checkFlagSetForMc==0)
                                        {
                                            $arrMisconceptionQcode[$valueMisconceptionQcodeCheckMC] = $valueMisconceptionQcodeCheckMC; 
                                        }
                                    }
                                    #####Added For MC which is not used only######(18/06/2012)

                                    if(isset($arrMisconceptionQcode) && count($arrMisconceptionQcode)>0) 
                                    {
                                        $year_new = $requestDetails['year'];
                                        $past_year_new = $year_new - 1;						
                                        //		$FinalQuestionsSelected[] = $this->MisconceptionSelect($arrMisconceptionQcode,$requestDetails['schoolCode'],$year_new,$past_year_new,$connid);
                                        // 		Added class parameter for checking same question in da_autoAssemblyQues		
                                        $FinalQuestionsSelected[] = $this->MisconceptionSelect($arrMisconceptionQcode,$requestDetails['schoolCode'],$year_new,$past_year_new,$requestDetails['class'],$connid);

                                        $FinalQuestionsSelected = array_filter($FinalQuestionsSelected);
                                        if(isset($FinalQuestionsSelected) && count($FinalQuestionsSelected)>0)
                                        {
                                            $counterForChapter++;
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                    }							

                    $flag_allYears =1;
                    #For Unused Questions 
                    foreach($priorityArrForClassSelection as $keyclass => $valueclass)
                    {
                        $year_new = $requestDetails['year'];
                        $past_year_new = $year_new - 1;
                        foreach($valueclass as $keyclassset => $valueclassset)
                        {
                            $arrUnusedQuestions = array();
                            $class_set_for_qcode = $valueclass;
                            $arrUnusedQuestions = $this->getAllUnusedQuestions($valueclassset,$sub_subtopic_code_set,$requestDetails['schoolCode'],$year_new,$past_year_new,$connid,$flag_allYears);

                            if(isset($arrUnusedQuestions) && count($arrUnusedQuestions)>0)
                            {
                                ###############For same answer question replacement process################
                                foreach($arrUnusedQuestions as $keyUnusedQues_same => $valueUnusedQues_same)
                                {
                                    $arrSameAnswerUnusedQuestion[$valueclassset][$sub_subtopic_code_set][$valueUnusedQues_same] = $valueUnusedQues_same;
                                }
                                ###############For same answer question replacement process################

                                foreach($arrUnusedQuestions as $keyUnusedQues => $valueUnusedQues)
                                {
                                    if($counterForChapter == $valueChapterFetch)
                                    {
                                        break;
                                    }
                                    if(!in_array($valueUnusedQues,$finalMismatchQuestions))
                                    {
                                        $FinalQuestionsSelected[] = $valueUnusedQues;
                                        $this->UniqueUsed[] = $valueUnusedQues;
                                        $counterForChapter++;
                                        unset($arrSameAnswerUnusedQuestion[$valueclassset][$sub_subtopic_code_set][$valueUnusedQues]);
                                    }
                                    else 
                                    {
                                        $this->IPSMismatch[] = $valueUnusedQues;
                                        unset($arrSameAnswerUnusedQuestion[$valueclassset][$sub_subtopic_code_set][$valueUnusedQues]);
                                    }
                                }

                            }
                        }
                    }

                    #For Used Questions 
                    foreach($priorityArrForClassSelection as $keyclass => $valueclass)
                    {				
                        $year_new = $requestDetails['year'];
                        $past_year_new = $year_new - 1;
                        foreach($valueclass as $keyclassset => $valueclassset)
                        {
                            $arrUusedQuestions = array();
                            $class_set_for_qcode = $valueclass;
                            $arrUusedQuestions = $this->getAllUsedQuestions($valueclassset,$sub_subtopic_code_set,$requestDetails['schoolCode'],$year_new,$past_year_new,$connid);

                            if(isset($arrUusedQuestions) && count($arrUusedQuestions)>0)
                            {					
                                foreach($arrUusedQuestions as $keyUusedQues => $valueUusedQues)
                                {
                                    ###############For same answer question replacement process################
                                    foreach($arrUusedQuestions as $keyUusedQues_same => $valueUusedQues_same)
                                    {
                                        $arrSameAnswerUsedQuestion[$valueclassset][$sub_subtopic_code_set][$valueUusedQues_same] = $valueUusedQues_same;
                                    }
                                    ###############For same answer question replacement process################
                                    if($counterForChapter == $valueChapterFetch)
                                    {
                                        break;
                                    }
                                    if(!in_array($valueUusedQues,$finalMismatchQuestions))
                                    {
                                        $FinalQuestionsSelected[] = $valueUusedQues;								
                                        $this->UniqueUsed[] = $valueUusedQues;
                                        $counterForChapter++;
                                        unset($arrSameAnswerUsedQuestion[$valueclassset][$sub_subtopic_code_set][$valueUusedQues]);
                                    }
                                    else 
                                    {
                                        $this->IPSMismatch[] = $valueUusedQues;
                                        unset($arrSameAnswerUsedQuestion[$valueclassset][$sub_subtopic_code_set][$valueUusedQues]);
                                    }	
                                }
                            }
                        }
                    }
                  /*}*/
                }			

                #Added start for group question selection problem			
                $FinalQuestionsSelected = array_filter($FinalQuestionsSelected);
                $FinalQuestionsSelected = $this->orderByGroupInSequence($FinalQuestionsSelected,$connid);
                #End for group question selection problem				

                $qcode_list_unique_all = "";
                $qcode_list_unique = "";
                $qcode_list_no_unique = "";
                $ips_qcode_list = "";
                if(isset($FinalQuestionsSelected) && count($FinalQuestionsSelected)>0)
                {
                    $qcode_list_unique_all = implode(",",$FinalQuestionsSelected);
                }	
                if(isset($this->UniqueUsed) && count($this->UniqueUsed)>0)
                {
                    $qcode_list_unique = implode(",",$this->UniqueUsed);
                }
                if(isset($this->UnusedUniqueUsed) && count($this->UnusedUniqueUsed)>0)
                {	
                    $qcode_list_no_unique = implode(",",$this->UnusedUniqueUsed);
                }	
                if(isset($this->IPSMismatch) && count($this->IPSMismatch)>0)
                {
                    $ips_qcode_list = implode(",",$this->IPSMismatch);
                }	
                /*****Change on date 18/05/2012 *******/

                    $finalArrForTableChapterWise[$keyChapterFetch]["qs_selected"] = count($FinalQuestionsSelected)."/".$valueChapterFetch;
                    $finalArrForTableChapterWise[$keyChapterFetch]["Unique"] =  count($this->UniqueUsed);
                    $finalArrForTableChapterWise[$keyChapterFetch]["Copies"] =  "";
                    $finalArrForTableChapterWise[$keyChapterFetch]["No_copies"] =  count($this->UnusedUniqueUsed);
                    $finalArrForTableChapterWise[$keyChapterFetch]["No_Mc_Copy_qcode"] = "";
                    $finalArrForTableChapterWise[$keyChapterFetch]["IPSMismatch_qcode"] = count($this->IPSMismatch);
                    $finalArrForTableChapterWise[$keyChapterFetch]["unique_qcode_list"] =  $qcode_list_unique;
                    $finalArrForTableChapterWise[$keyChapterFetch]["copies_qcode_list"] = "";
                    $finalArrForTableChapterWise[$keyChapterFetch]["no_copies_qcode_list"] = $qcode_list_no_unique;
                    $finalArrForTableChapterWise[$keyChapterFetch]["final_all_qcode_list"] = $qcode_list_unique_all;
                    $finalArrForTableChapterWise[$keyChapterFetch]["No_Mc_Copy_qcode_list"] = "";
                    $finalArrForTableChapterWise[$keyChapterFetch]["IPSMismatch_qcode_list"] = $ips_qcode_list;
                    $finalArrForTableChapterWise[$keyChapterFetch]["type"] = "Auto";

                /*****Change on date 18/05/2012 *******/
                $sub_sst_list = $this->getSSTByQcodesForEnglish($FinalQuestionsSelected,$connid);
                if($sub_sst_list=="")
                {
                    $sub_sst_list = $sub_subtopic_code_set;
                }
                $chapter_name = $this->FetchchapterNameEnglish($keyChapterFetch,$connid);
                $st_set = array();

                $st_set = $this->getSTOfSSTRevised($sub_subtopic_code_set,$connid,$requestDetails["request_type"]);			

                $chapter_name = $st_set["description"];
                $count_checking = 0;
                $checkArr = array();
                $count_checking = $this->checkCountForUsedST($papercode,$st_set["description"],$connid);
                $checkArr = $this->checkCountForUsedSTArr($papercode,$st_set["description"],$connid);

                if($count_checking > 0)
                {
                    $sst_list_check = $checkArr["sst_list"];
                    $qcode_list_check = $checkArr["qcode_list"];
                    $required_ques_check = $checkArr["required_ques"];
                    $reporting_order_check = $checkArr["reporting_order"];
                    if($sub_sst_list!='')
                    {
                        if($sst_list_check=='')
                        {
                            $sst_list_check = $sub_sst_list;	
                        }
                        else 
                        {
                            $sst_list_check = $sst_list_check.",".$sub_sst_list;
                        }
                    }
                    if($qcode_list_unique_all != '')
                    {
                        if($qcode_list_check=='')
                        {
                            $qcode_list_check = $qcode_list_unique_all;
                        }
                        else 
                        {
                            $qcode_list_check = $qcode_list_check.",".$qcode_list_unique_all;
                        }	
                    }
                    if($valueChapterFetch!=0)
                    {
                        $required_ques_check = $required_ques_check + $valueChapterFetch;
                    }
                    ####################For making sst single unique same reporting head same sst problem################
                    if($sst_list_check!="")
                    {
                        $arrSSTReportingHeadSingle = array();
                        $arrSSTReportingHeadSingle = explode(",",$sst_list_check);
                        $arrSSTReportingHeadSingle = array_unique(array_values($arrSSTReportingHeadSingle));					
                        $sst_list_check = implode(",",$arrSSTReportingHeadSingle);
                    }
                    ####################For making sst single unique same reporting head same sst problem################
                    $queryUpdateReportingOrder = "UPDATE da_reportingDetails set sst_list = '$sst_list_check',qcode_list = '$qcode_list_check',required_ques = '$required_ques_check',reporting_head = '".addslashes($chapter_name)."',reporting_order = '$reporting_order_check',entered_dt = '".date('Y-m-d')."',entered_by = '".$_SESSION["username"]."' where reporting_head = '".$st_set["description"]."' AND papercode = '$papercode'";
                    $dbqueryUpdateReportingOrder = new dbquery($queryUpdateReportingOrder,$connid);	
                }
                else 
                {
                    ####################For making sst single unique same reporting head same sst problem################
                    if($sst_list_check!="")
                    {
                        $arrSSTReportingHeadSingle = array();
                        $arrSSTReportingHeadSingle = explode(",",$sub_sst_list);
                        $arrSSTReportingHeadSingle = array_unique(array_values($arrSSTReportingHeadSingle));
                        $sub_sst_list = implode(",",$arrSSTReportingHeadSingle);
                    }
                    ####################For making sst single unique same reporting head same sst problem################
                    $queryUpdateReportingOrder = "INSERT into da_reportingDetails set papercode = '$papercode',reporting_level = 'sst',sst_list = '$sub_sst_list',qcode_list = '$qcode_list_unique_all',required_ques = '$valueChapterFetch',reporting_head = '".addslashes($chapter_name)."',reporting_order = '$updateCounter',entered_dt = '".date('Y-m-d')."',entered_by = '".$_SESSION["username"]."'";
                    $dbqueryUpdateReportingOrder = new dbquery($queryUpdateReportingOrder,$connid);	
                    $updateCounter++;
                }	

                if($qcode_list_unique_all!="")
                {
                    $qcodePaperList = $qcodePaperList.$qcode_list_unique_all.",";
                }
            }

            #############################For same question same answer problem #################################

            $arrMasterCheckSameAnswer = array();
            $arrMasterCheckSameAnswer = $this->autoCheckforSameAnswer($this->papercode,$connid);	

            if(isset($arrMasterCheckSameAnswer) && count($arrMasterCheckSameAnswer)>0)
            {
                foreach($arrMasterCheckSameAnswer as $keyMasterCheckSameAnswerl => $valueMasterCheckSameAnswerl)
                {
                    $arrMakeCheckNew = array();
                    foreach($valueMasterCheckSameAnswerl as $keyRhl => $valueQcodel)
                    {
                        $query_check_answers = "SELECT * FROM da_questions WHERE qcode = '$valueQcodel'";
                        $dbquery_check_answers = new dbquery($query_check_answers,$connid);
                        while($row_check_answers = $dbquery_check_answers->getrowarray())
                        {					
                            $str_make_option = "option".strtolower($row_check_answers["correct_answer"]);	
                            $answer_set = $row_check_answers[$str_make_option];
                            if($row_check_answers["misconception"]==0)
                            {
                                $arrMakeCheckNew[strtolower(trim($answer_set))][] =  $valueQcodel;
                            }	
                        }
                    }

                    $counter_for_qcodes = 0;
                    foreach($arrMakeCheckNew as $keyMakeCheckNew_Count => $valueMakeCheckNew_Count){
                        foreach($valueMakeCheckNew_Count as $keyCounter => $valueCounter)
                        {
                            $counter_for_qcodes = $counter_for_qcodes + 1;
                        }	
                    }

                    if(isset($arrMakeCheckNew) && count($arrMakeCheckNew)>0 && $counter_for_qcodes>1)
                    {					
                        foreach($arrMakeCheckNew as $keyMakeCheckNew => $valueMakeCheckNew){
                            $valuetounsetqcode = $valueMakeCheckNew[0];
                            unset($arrMasterCheckSameAnswer[$keyMasterCheckSameAnswerl][$valuetounsetqcode]);
                            break;
                        }
                    }
                }

                foreach($arrMasterCheckSameAnswer as $keyMasterCheckSameAnswer => $valueMasterCheckSameAnswer)
                {		
                    $qcode_list_same = "";		
                    $query_get_qcode_list = "SELECT * FROM da_reportingDetails WHERE reporting_id = '$keyMasterCheckSameAnswer'";
                    $dbquery_get_qcode_list = new dbquery($query_get_qcode_list,$connid);
                    while($row_get_qcode_list = $dbquery_get_qcode_list->getrowarray())
                    {
                        $qcode_list_same = $row_get_qcode_list["qcode_list"];
                    }	
                    if($qcode_list_same!="")
                    {
                        $arrQcodeSame = array();
                        $arrQcodeSame = explode(",",$qcode_list_same);					
                        $arrOldNew = array();
                        foreach($valueMasterCheckSameAnswer as $keyRh => $valueQcode)
                        {						
                            $check_misconception_flag = 0;
                            $query_misconception_check = "SELECT * FROM da_questions WHERE qcode = '$valueQcode'";
                            $dbquery_misconception_check = new dbquery($query_misconception_check,$connid);
                            while($row_misconception_check = $dbquery_misconception_check->getrowarray())
                            {
                                if($row_misconception_check["misconception"]==0)
                                {								
                                    $class_same = "";
                                    $sub_subtopic_code_same = "";

                                    $class_same = $row_misconception_check["class"];
                                    $sub_subtopic_code_same = $row_misconception_check["sub_subtopic_code"];
                                    $counter_set_for_second_loop = 0;

                                    foreach($arrSameAnswerUnusedQuestion as $keyLoop => $valueLoop){										
                                        foreach($valueLoop[$sub_subtopic_code_same] as $keyFetchReplaceQcode => $valueFetchReplaceQcode)
                                        {												
                                            if($valueFetchReplaceQcode!=$valueQcode && $counter_set_for_second_loop==0)
                                            {
                                                $key = "";
                                                $key = array_search($valueQcode, $arrQcodeSame);																	
                                                $arrQcodeSame[$key] = $valueFetchReplaceQcode;													
                                                unset($arrSameAnswerUnusedQuestion[$keyLoop][$sub_subtopic_code_same][$valueFetchReplaceQcode]);
                                                $counter_set_for_second_loop = 1;
                                                $arrOldNew[$valueQcode] = $valueFetchReplaceQcode;
                                            }	
                                        }
                                    }

                                    if($counter_set_for_second_loop==0)
                                    {										
                                        foreach($arrSameAnswerUsedQuestion as $keyLoop1 => $valueLoop1){											
                                            foreach($valueLoop1[$sub_subtopic_code_same] as $keyFetchReplaceQcode1 => $valueFetchReplaceQcode1)
                                            {
                                                if($valueFetchReplaceQcode1!=$valueQcode && $counter_set_for_second_loop==0)
                                                {
                                                    $key = "";
                                                    $key = array_search($valueQcode, $arrQcodeSame);
                                                    if($key!=""){
                                                        $arrQcodeSame[$key] = $valueFetchReplaceQcode1;
                                                        unset($arrSameAnswerUsedQuestion[$class_same][$sub_subtopic_code_same][$valueFetchReplaceQcode1]);
                                                        $arrOldNew[$valueQcode] = $valueFetchReplaceQcode1;
                                                    }														
                                                }	
                                            }
                                        }										
                                    }								
                                }
                            }	
                        }							


                        if(isset($arrQcodeSame) && count($arrQcodeSame)>0)
                        {
                            if(isset($arrOldNew) && count($arrOldNew)>0)
                            {
                                $qcode_list_update = "";
                                $qcode_list_update = implode(",",$arrQcodeSame);
                                $queryUpdateSame = "UPDATE da_reportingDetails set qcode_list = '$qcode_list_update' WHERE reporting_id = '$keyMasterCheckSameAnswer'";		
                                $dbqueryUpdateSame = new dbquery($queryUpdateSame,$connid);
                                foreach($arrOldNew as $keyOldNew => $valueOldNew)
                                {
                                    foreach($finalArrForTableChapterWise as $keyReplaceValueInList => $valueReplaceValueInList)
                                    {
                                        $counter_check_same_set = 0;
                                        $arrFullSetList = explode(",",$valueReplaceValueInList["final_all_qcode_list"]);								
                                        ########unique check############
                                        $arrUniqueCheck = explode(",",$valueReplaceValueInList["unique_qcode_list"]);								
                                        if(in_array($keyOldNew,$arrUniqueCheck))
                                        {
                                            $key_get = "";
                                            $key_all = "";
                                            $key_get = array_search($keyOldNew,$arrUniqueCheck);
                                            $key_all = array_search($keyOldNew,$arrFullSetList);										
                                            $arrUniqueCheck[$key_get] = $valueOldNew;
                                            $arrFullSetList[$key_all] = $valueOldNew;										
                                            $unique_list_same = implode(",",$arrUniqueCheck);
                                            $full_list_same  = implode(",",$arrFullSetList);
                                            $finalArrForTableChapterWise[$keyReplaceValueInList]["unique_qcode_list"] = $unique_list_same;
                                            $finalArrForTableChapterWise[$keyReplaceValueInList]["final_all_qcode_list"] = $full_list_same;
                                            $arrWholeQcodes = explode(",",$qcodePaperList);
                                            $key_all_whole = "";
                                            $key_all_whole = array_search($keyOldNew,$arrWholeQcodes);	
                                            $arrWholeQcodes[$key_all_whole] = $valueOldNew;										
                                            $qcodePaperList = "";
                                            $qcodePaperList = implode(",",$arrWholeQcodes);
                                            $counter_check_same_set = 1;
                                        }	
                                        ########unique check############
                                        #######No copies selection##########
                                        if($counter_check_same_set!=1)
                                        {
                                            $arrCopyCheck = explode(",",$valueReplaceValueInList["no_copies_qcode_list"]);								
                                            if(in_array($keyOldNew,$arrCopyCheck))
                                            {
                                                $key_get = "";
                                                $key_all = "";											
                                                $key_get = array_search($keyOldNew,$arrCopyCheck);																				
                                                $key_all = array_search($keyOldNew,$arrFullSetList);
                                                $arrCopyCheck[$key_get] = $valueOldNew;																						
                                                $arrFullSetList[$key_all] = $valueOldNew;											
                                                $copies_list_same = implode(",",$arrCopyCheck);
                                                $full_list_same  = implode(",",$arrFullSetList);
                                                $finalArrForTableChapterWise[$keyReplaceValueInList]["no_copies_qcode_list"] = $copies_list_same;
                                                $finalArrForTableChapterWise[$keyReplaceValueInList]["final_all_qcode_list"] = $full_list_same;
                                                $arrWholeQcodes = explode(",",$qcodePaperList);
                                                $key_all_whole = "";
                                                $key_all_whole = array_search($keyOldNew,$arrWholeQcodes);
                                                $arrWholeQcodes[$key_all_whole] = $valueOldNew;											
                                                $qcodePaperList = "";
                                                $qcodePaperList = implode(",",$arrWholeQcodes);
                                                $counter_check_same_set = 1;
                                            }	
                                        }

                                        #######No copies selection##########
                                    }
                                }
                            }						
                        }	
                    }	
                }
            }

            #############################For same question same answer problem #################################

            if($qcodePaperList!='')#This will update paperdetails in the table with qcode list
            {			
                $qcodePaperList = substr_replace($qcodePaperList,"",-1);
                $queryPaper = "UPDATE da_paperDetails set qcode_list='".$qcodePaperList."',lastModifiedBy='".$_SESSION["username"]."' WHERE papercode = '".$papercode."' AND version = '1'";
                $dbqueryPaper = new dbquery($queryPaper,$connid);

                #inserting in temp autoassembly table so it won't repeat quesions while assembling and we need to delete this entry @ the timeof approval.
                $in_query = "INSERT INTO da_autoAssemblyQues (schoolCode,class,subject,request_id,qcode_list,insert_dt) VALUES
                             ('".$this->schoolCode."','".$this->class."','".$this->subjectno."','".$this->test_requestid."','".$qcodePaperList."',NOW())";
                $in_dbqry = new dbquery($in_query,$connid);
            }	

            $this->UpdateTestRequestDetails("0",$connid);

            $this->UpdateChapterDetailsTableEnglish($finalArrForTableChapterWise,$connid);

            #############################Checking For 7 Conditions#########################
            $this->checkConditions($papercode,$qcodePaperList,$connid,$generalTotalQuestionRequired,$reportingDetails["teacher_comments"]);	
            if(isset($this->englishConditionCheckFlagArr) && count($this->englishConditionCheckFlagArr>0))
            {
                $arrMakeForInsertion = array(1=>"repeat_ques_flag='1'",2=>"meri_flag='1'",3=>"enough_ques_flag='1'",4=>"approved_imgs_flag='1'",5=>"same_ans_que_flag='1'",6=>"gen_teacher_comm_flag='1'",7=>"morethan_3ques_flag='1'",8=>"new_ques_flag='1'");
                $condition_for_insert = "";
                foreach($this->englishConditionCheckFlagArr as $keyConditionArr => $valueConditionArr)
                {
                    $condition_for_insert .= $arrMakeForInsertion[$valueConditionArr].",";
                }
                $condition_for_insert = substr_replace($condition_for_insert,"",-1);
                if($condition_for_insert!="")
                {
                    $condition_for_insert = ",".$condition_for_insert;
                }	
                if($this->englishConditionCheckFlag=="N")
                {
                    $this->englishConditionCheckFlag = 1;
                }	
                $queryForInsert = "INSERT INTO da_autoReport set request_id = '$this->test_requestid', autoreport_flag='$this->englishConditionCheckFlag' $condition_for_insert";
                $dbqueryForInsert = new dbquery($queryForInsert,$connid);
            }
            #############################Checking For 7 Conditions#########################

            #For Test Name Update in test request
            $test_name = "";
            if($this->request_type === 'RV') {
                $test_name ='Revision';
            } else {
                if($this->paperType == 1 || $this->paperType == 2 || $this->paperType == 6)
                {
                    $test_name = 'DA English - With Reading Comprehension';
                }
                else 
                {
                    $test_name = 'DA English - Without Reading Comprehension';
                }
            }


            $updateQuery = "UPDATE da_testRequest set testName = '".addslashes($test_name)."' where id = '$this->test_requestid'";		
            $dbUpdateQuery = new dbquery($updateQuery,$connid);

            ########To Check Questions Selected Or Not#######
            $checkFlagSetForList = $this->checkQuestionSelectedFlag($this->test_requestid,$connid);
            #####################		

            ########################Checking For revision chapters##########################
            # commented for English Subject. Task id: 798
            /*if($requestDetails["request_type"]=="RV")
            {
                if($type_chapter=="Manual")
                {
                    $this->changeForRevisionTest($connid);
                }
            }*/
            ########################Checking For revision chapters##########################

            if($this->flagset==0)
            {
            echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
            exit;
            }
		}
	}/////////////////////////////////////////////////////////////////////////////////////////////////
	   
    
	###################Common function for fetching qcodes############
	function CommonFunctionForFetchingSSSTQcode($arrQcodeSSST,$schoolCode,$year_new,$past_year_new,$connid)
	{
		$qcode = "";
		/*echo "================================================================================================Start";
		echo "<br/>";
		echo "Available Qcodes Passes";
		echo "<pre>";
		print_r($arrQcodeSSST);
		echo "</pre>";	*/	
		$arrRet = array();
		foreach($arrQcodeSSST as $keyQcodeSSST => $valueQcodeSSST)
		{
			$request_id = 0;
			$query = "SELECT b.id from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND FIND_IN_SET($valueQcodeSSST,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode' AND (b.year = '$year_new' OR b.year='$past_year_new') AND b.type = 'actual' AND id!='$this->test_requestid' ORDER BY b.id DESC LIMIT 1";
			$dbquery = new dbquery($query,$connid);
			 while($row = $dbquery->getrowarray()){
			 		if($row["id"]!="")
			 		{
			 			$request_id = $row["id"];
			 		}
			 }
			 
			 $arrCheck[$valueQcodeSSST] = $request_id;	
		}				
		asort($arrCheck);
	/*	echo "<pre>";
		print_r($arrCheck);
		echo "</pre>";*/
		$arrCheckKeys = array();
		$arrCheckKeys = array_keys($arrCheck);
		/*echo "<pre>";
		print_r($arrCheckKeys);
		echo "</pre>";*/
		$fetch_element = "";
		$fetch_element = $arrCheckKeys[0];
		$qcode = $fetch_element;
		$first_element = "";
		$first_element = $arrCheck[$fetch_element];		
		$arrSchoolUsage = array();
		$counter_check = 0;
		foreach($arrCheck as $keyCheck => $valueCheck)
		{
			if($first_element == $valueCheck)
			{
				$counter_check = $counter_check + 1;
				$arrSchoolUsage[$keyCheck] = $keyCheck;
			}
		}
		if($counter_check==1)
		{
			return $qcode;
		}	
		else 
		{
			/*echo "<br/>School Usage Loop";
			echo "<pre>";
			print_r($arrSchoolUsage);
			echo "</pre>";*/
			if(isset($arrSchoolUsage) && count($arrSchoolUsage)>0)
			{
				$arrSetSchoolUsageWise = array();
				foreach($arrSchoolUsage as $keySchoolUsage => $valueSchoolUsage)
				{
					$counterUsage = 0;
					$counterUsage = $this->questionusedbeforeforenglish($valueSchoolUsage,$schoolCode,$year_new,$past_year_new,$connid);	
					$arrSetSchoolUsageWise[$valueSchoolUsage] = $counterUsage;					
				}	
				/*$arrSetSchoolUsageWise["3117"] = 1;
				$arrSetSchoolUsageWise["21099"] = 2;*/
				asort($arrSetSchoolUsageWise);
				$arrSetSchoolUsageWiseKeys = array();
				$arrSetSchoolUsageWiseKeys = array_keys($arrSetSchoolUsageWise);
				$fetch_element = $arrSetSchoolUsageWiseKeys[0];
				$qcode = $fetch_element;
				$first_element = $arrSetSchoolUsageWise[$fetch_element];
				$arrQcodeWise = array();
				$counter_check_usage = 0;
				/*echo "<pre>";
				print_r($arrSetSchoolUsageWise);
				echo "</pre>";			*/
				
				foreach($arrSetSchoolUsageWise as $keySetSchoolUsageWise => $valueSetSchoolUsageWise)
				{
					if($first_element == $valueSetSchoolUsageWise)
					{
						$counter_check_usage = $counter_check_usage + 1;
						$arrQcodeWise[$keySetSchoolUsageWise] = $keySetSchoolUsageWise;
					}
				}
				if($counter_check==1)
				{					
					return $qcode;
				}	
				else 
				{
					$arrQcodeWiseKeys = array_keys($arrQcodeWise);
					asort($arrQcodeWiseKeys);
					/*echo "<pre>";
					print_r($arrQcodeWiseKeys);
					echo "</pre>";*/
					$qcode = $arrQcodeWiseKeys[0];					
					
					return $qcode;
				}
			}	
		}	
		//exit;
		/*echo "Fetched Final:-".$qcode."<br/>";
		echo "================================================================================================End<br/>";*/
		
	}
	###################Common function for fetching qcodes############	

	
	####################Check For SSST Available######################	
	function getSSSTAvailable($keyChapterFetch,$connid)
	{
		$arrRet = array();
		$query = "SELECT subsubtopic_code FROM da_tbChapterMapping WHERE chapter_id = '$keyChapterFetch'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$sub_subtopic_code = $row["subsubtopic_code"];
			if($sub_subtopic_code!="")
			{
				$query_ssst = "SELECT ssst_code FROM da_ssstMaster WHERE sub_subtopic_code = '$sub_subtopic_code'";
				$dbquery_ssst = new dbquery($query_ssst,$connid);
				while($row_ssst = $dbquery_ssst->getrowarray()){
					$arrRet[$row_ssst["ssst_code"]] = $row_ssst["ssst_code"];
				}
			}	
		}
		
		return $arrRet;
	}
	####################Check For SSST Available######################
	
	#########For MC check of required question count################
	function selectMcSelectedInPassage($forMcQcodeList,$connid)
	{
		$counter_MC = 0;
		$query = "SELECT count(*) as counter FROM da_questions WHERE qcode IN($forMcQcodeList) AND misconception = '1'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$counter_MC = $row["counter"];
		}
		return $counter_MC;
				
	}
	#########For MC check of required question count################
	
	function orderByGroupInSequence($FinalQuestionsSelected,$connid)
	{
		if(isset($FinalQuestionsSelected) && count($FinalQuestionsSelected)>0)
		{
			$question_string = implode(",",$FinalQuestionsSelected);
			$arrRet = array();
			$query = "select qcode from da_questions where qcode IN($question_string) ORDER BY sub_subtopic_code,group_id";
			$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray()){
					$arrRet[] = $row["qcode"];
				}
			return 	$arrRet;
		}
	}
	
	function getSTRelatedToPassage($qcode_list_final,$connid)
	{
		$arrRet = array();
		$arrExplodeQcodeArr = explode(",",$qcode_list_final);
		foreach($arrExplodeQcodeArr as $key => $value)
		{
			$query = "SELECT a.description FROM da_subtopicMaster a,da_subSubTopicMaster b,da_questions c where c.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = a.subtopic_code AND c.qcode = '$value'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				if($value!='')
				{
					$arrRet[$row["description"]] .= $value.",";
				}	
			}
		}
		foreach($arrRet as $keyRet => $valueRet)
		{
			$arrRet[$keyRet] = substr_replace($valueRet,"",-1);
		}
		return $arrRet;
	}
	
	
	function getSTRevisedRelatedToPassage($qcode_list_final,$connid)
	{
		$arrRet = array();
		$arrExplodeQcodeArr = explode(",",$qcode_list_final);
		foreach($arrExplodeQcodeArr as $key => $value)
		{
			$query = "SELECT a.description FROM da_topicMaster a,da_subtopicMaster b,da_subSubTopicMaster c,da_questions d WHERE d.sub_subtopic_code = c.sub_subtopic_code 
					  AND c.subtopic_code = b.subtopic_code AND b.topic_code = a.topic_code AND d.qcode = '$value'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				if($value!='')
				{
					if($row["description"]=="Grammar")
					{
						$querySubTopic = "SELECT a.description FROM da_subtopicMaster a,da_subSubTopicMaster b,da_questions c where c.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = a.subtopic_code AND c.qcode = '$value'";
						$dbquerySubTopic = new dbquery($querySubTopic,$connid);
						while($rowSubTopic = $dbquerySubTopic->getrowarray()){
							$arrRet[$rowSubTopic["description"]] .= $value.",";
						}
					}
					else 
					{					
						$arrRet[$row["description"]] .= $value.",";
					}	
				}	
			}
		}
		foreach($arrRet as $keyRet => $valueRet)
		{
			$arrRet[$keyRet] = substr_replace($valueRet,"",-1);
		}
		return $arrRet;
	}
	
	
	
	function checkCountForUsedSTArr($papercode,$st_set,$connid)
	{
		$count_set = array();
		$query = "SELECT * from da_reportingDetails where papercode = '$papercode' AND reporting_head = '$st_set'";
		$dbquerySel = new dbquery($query,$connid);
		while($rowSel = $dbquerySel->getrowarray())
        {
            $count_set["sst_list"] = $rowSel["sst_list"];		
            $count_set["qcode_list"] = $rowSel["qcode_list"];				
            $count_set["required_ques"] = $rowSel["required_ques"];	
            $count_set["reporting_order"] = $rowSel["reporting_order"];	
        }
		return $count_set;
	}
	
	function checkCountForUsedST($papercode,$st_set,$connid)
	{
		$count_set = 0;
		$query = "SELECT count(*) as count from da_reportingDetails where papercode = '$papercode' AND reporting_head = '$st_set'";
		$dbquerySel = new dbquery($query,$connid);
		while($rowSel = $dbquerySel->getrowarray())
        {
            $count_set = $rowSel["count"];				
        }
		return $count_set;
	}
	
	function getSTOfSST($sub_subtopic_code_set,$connid)
	{
		$st = array();
		$query = "SELECT a.* from da_subtopicMaster a,da_subSubTopicMaster b where a.subtopic_code = b.subtopic_code AND b.sub_subtopic_code = '$sub_subtopic_code_set'";
		$dbquerySel = new dbquery($query,$connid);
		while($rowSel = $dbquerySel->getrowarray())
			{
				$st["subtopic_code"] = $rowSel["subtopic_code"];
				$st["description"] = $rowSel["description"];
			}
		return $st;
	}
	
	
	function getSTOfSSTRevised($sub_subtopic_code_set,$connid,$request_type="")
	{
		$st = array();
		$query = "SELECT a.* from da_topicMaster a,da_subtopicMaster b,da_subSubTopicMaster c where a.topic_code = b.topic_code AND b.subtopic_code = c.subtopic_code AND c.sub_subtopic_code = '$sub_subtopic_code_set'";
		$dbquerySel = new dbquery($query,$connid);
		while($rowSel = $dbquerySel->getrowarray())
			{
				if($rowSel["description"]=="Grammar")
				{
					$queryGrammarSel = "SELECT a.* from da_subtopicMaster a,da_subSubTopicMaster b where a.subtopic_code = b.subtopic_code AND b.sub_subtopic_code = '$sub_subtopic_code_set'";
					$dbqueryGrammarSel = new dbquery($queryGrammarSel,$connid);
					while($rowGrammarSel = $dbqueryGrammarSel->getrowarray())
						{
							$st["subtopic_code"] = $rowGrammarSel["subtopic_code"];
							if(($request_type=="RV") && ($this->paperType==1 || $this->paperType==2 || $this->paperType==6))
							{
								$st["description"] = "Grammar Concepts";
							}
							else 
							{
								$st["description"] = $rowGrammarSel["description"];
							}	
						}
				}
				else 
				{	
					#############Added For Distinguise process of rc and without rc papre####################
					if($this->paperType==1 || $this->paperType==2 || $this->paperType==6)
					{
						$st["subtopic_code"] = $rowSel["subtopic_code"];
						$st["description"] = $rowSel["description"];
					}
					else 
					{
						$queryGrammarSel = "SELECT a.* from da_subtopicMaster a,da_subSubTopicMaster b where a.subtopic_code = b.subtopic_code AND b.sub_subtopic_code = '$sub_subtopic_code_set'";
						$dbqueryGrammarSel = new dbquery($queryGrammarSel,$connid);
						while($rowGrammarSel = $dbqueryGrammarSel->getrowarray())
						{
						#############Added For Distinguise process of rc and without rc papre####################		
								$st["subtopic_code"] = $rowGrammarSel["subtopic_code"];
								$st["description"] = $rowGrammarSel["description"];
						#############Added For Distinguise process of rc and without rc papre####################		
						}
					}
					#############Added For Distinguise process of rc and without rc papre####################
				}	
			}
		return $st;
	}
	
	
	function ForImagePassageSelection($arrStartEndWordArr=array(),$priorityArrForClassSelection=array(),$schoolCode,$year_passage,$past_year_passage,$passage_id_set="",$connid)
	{
				$finalArrForTableChapterWise = array();
				$UniqueUsed = 0;
				$UniqueNotUsed = 0;
				$flagUsed = 0;
				$countSelectedPassage = 0;
				$no_of_passage = 1;
				$passageSelected = array();
				
				#For unused passages
				foreach($priorityArrForClassSelection as $keyclass => $valueclass)
				{
					foreach($valueclass as $keyclassset => $valueclassset)
					{
						$flagUsed = 0; 
						$passageSelected = $this->SelectImageBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year_passage,$past_year_passage,$flagUsed,$connid);
						if(isset($passageSelected) && count($passageSelected) > 0)
						{
							$UniqueUsed = 1;
							$countSelectedPassage++;
							break;
						}
					}
				}	
				
				#For used passage
				if(!isset($passageSelected) && count($passageSelected) == 0 && $countSelectedPassage==0)
				{
					foreach($priorityArrForClassSelection as $keyclass => $valueclass)
					{
						foreach($valueclass as $keyclassset => $valueclassset)
						{
							$flagUsed = 1; 
							$passageSelected = $this->SelectImageBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year_passage,$past_year_passage,$flagUsed,$connid);
							if(isset($passageSelected) && count($passageSelected) > 0)
							{
								$UniqueUsed = 1;
								$countSelectedPassage++;
								break;
							}
						}
					}	
				}
				
				#For unused passages
				if(!isset($passageSelected) && count($passageSelected) == 0 && $countSelectedPassage==0)
				{					
					foreach($priorityArrForClassSelection as $keyclass => $valueclass)
					{
						foreach($valueclass as $keyclassset => $valueclassset)
						{
							$flagUsed = 0; 
							$passageSelected = $this->SelectTextBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year_passage,$past_year_passage,$flagUsed,$connid,$passage_id_set);
							if(isset($passageSelected) && count($passageSelected) > 0)
							{
								$UniqueUsed = 1;
								$countSelectedPassage++;
								break;
							}
						}
					}	
				}
				
				#For used passage
				if(!isset($passageSelected) && count($passageSelected) == 0 && $countSelectedPassage==0)
				{
					foreach($priorityArrForClassSelection as $keyclass => $valueclass)
					{
						foreach($valueclass as $keyclassset => $valueclassset)
						{
							$flagUsed = 1; 
							$passageSelected = $this->SelectTextBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year_passage,$past_year_passage,$flagUsed,$connid,$passage_id_set);
							if(isset($passageSelected) && count($passageSelected) > 0)
							{								
								$UniqueUsed = 1;
								$countSelectedPassage++;
								break;
							}
						}
					}	
				}
				
				$passage_id = 0;
				$qcode_list_final = "";
				$countedQuestion = 0;
				$unique = 0;
				$uniqueNot = 0;
				$unique_qcode_set = "";
				$unique_not_qcode_set = "";
				foreach($passageSelected as $keypassageselected => $valuepassageselected)
				{
					$passage_id = $keypassageselected;
					$qcode_list_final = $valuepassageselected["qcode_list"];
					$FinalQuestionsSelected = explode(",",$qcode_list_final);					
					$countedQuestion = count($FinalQuestionsSelected);
					if($UniqueUsed == 1)
					{
						$unique_qcode_set = $qcode_list_final;
						$unique = count($FinalQuestionsSelected);						
					}
					if($UniqueNotUsed == 1)
					{
						$unique_not_qcode_set = $qcode_list_final;
						$uniqueNot = count($FinalQuestionsSelected);						
					}
				}
				$finalArrForTableChapterWise[$passage_id]["chapter_id"] = 0;
				$finalArrForTableChapterWise[$passage_id]["passage_id"] = $passage_id;
				$finalArrForTableChapterWise[$passage_id]["request_id"] = $this->test_requestid;
				$finalArrForTableChapterWise[$passage_id]["best_fit_past_rid"] = "";
				$finalArrForTableChapterWise[$passage_id]["teacher_comment"] = "";
				$finalArrForTableChapterWise[$passage_id]["past_count"] = 0;
				$finalArrForTableChapterWise[$passage_id]["qs_selected"] = count($FinalQuestionsSelected)."/".count($FinalQuestionsSelected);
				$finalArrForTableChapterWise[$passage_id]["Unique"] =  $unique;
				$finalArrForTableChapterWise[$passage_id]["Copies"] =  "";
				$finalArrForTableChapterWise[$passage_id]["No_copies"] =  $uniqueNot;
				$finalArrForTableChapterWise[$passage_id]["No_Mc_Copy_qcode"] = "";
				$finalArrForTableChapterWise[$passage_id]["IPSMismatch_qcode"] = "";
				$finalArrForTableChapterWise[$passage_id]["unique_qcode_list"] =  $unique_qcode_set;
				$finalArrForTableChapterWise[$passage_id]["copies_qcode_list"] = "";
				$finalArrForTableChapterWise[$passage_id]["no_copies_qcode_list"] = $unique_not_qcode_set;
				$finalArrForTableChapterWise[$passage_id]["final_all_qcode_list"] = $qcode_list_final;
				$finalArrForTableChapterWise[$passage_id]["No_Mc_Copy_qcode_list"] = "";
				$finalArrForTableChapterWise[$passage_id]["IPSMismatch_qcode_list"] = "";
				$finalArrForTableChapterWise[$passage_id]["type"] = "Auto";
				return $finalArrForTableChapterWise;
	}
	
	
	function ForTextPassageSelection($arrStartEndWordArr=array(),$priorityArrForClassSelection=array(),$schoolCode,$year_passage,$past_year_passage,$connid,$single_passage="0")
	{
				$finalArrForTableChapterWise = array();
				$UniqueUsed = 0;
				$UniqueNotUsed = 0;
				$flagUsed = 0;
				$countSelectedPassage = 0;
				$no_of_passage = 1;
				$passageSelected = array();
				
				#For unused passages
				foreach($priorityArrForClassSelection as $keyclass => $valueclass)
				{
					foreach($valueclass as $keyclassset => $valueclassset)
					{
						$flagUsed = 0; 
						$passageSelected = $this->SelectTextBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year_passage,$past_year_passage,$flagUsed,$connid,"",$single_passage);
						if(isset($passageSelected) && count($passageSelected) > 0)
						{
							$UniqueUsed = 1;
							$countSelectedPassage++;
							break;
						}
					}
				}	
				
				#For used passage
				if(!isset($passageSelected) && count($passageSelected) == 0 && $countSelectedPassage==0)
				{
					foreach($priorityArrForClassSelection as $keyclass => $valueclass)
					{
						foreach($valueclass as $keyclassset => $valueclassset)
						{
							$flagUsed = 1; 
							$passageSelected = $this->SelectTextBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year_passage,$past_year_passage,$flagUsed,$connid,"",$single_passage);
							if(isset($passageSelected) && count($passageSelected) > 0)
							{								
								$UniqueUsed = 1;
								$countSelectedPassage++;
								break;
							}
						}
					}	
				}
				$passage_id = 0;
				$qcode_list_final = "";
				$countedQuestion = 0;
				$unique = 0;
				$uniqueNot = 0;
				$unique_qcode_set = "";
				$unique_not_qcode_set = "";
				foreach($passageSelected as $keypassageselected => $valuepassageselected)
				{
					$passage_id = $keypassageselected;
					$qcode_list_final = $valuepassageselected["qcode_list"];
					$FinalQuestionsSelected = explode(",",$qcode_list_final);					
					$countedQuestion = count($FinalQuestionsSelected);
					if($UniqueUsed == 1)
					{
						$unique_qcode_set = $qcode_list_final;
						$unique = count($FinalQuestionsSelected);						
					}
					if($UniqueNotUsed == 1)
					{
						$unique_not_qcode_set = $qcode_list_final;
						$uniqueNot = count($FinalQuestionsSelected);						
					}
				}
				$finalArrForTableChapterWise[$passage_id]["chapter_id"] = 0;
				$finalArrForTableChapterWise[$passage_id]["passage_id"] = $passage_id;
				$finalArrForTableChapterWise[$passage_id]["request_id"] = $this->test_requestid;
				$finalArrForTableChapterWise[$passage_id]["best_fit_past_rid"] = "";
				$finalArrForTableChapterWise[$passage_id]["teacher_comment"] = "";
				$finalArrForTableChapterWise[$passage_id]["past_count"] = 0;
				$finalArrForTableChapterWise[$passage_id]["qs_selected"] = count($FinalQuestionsSelected)."/".count($FinalQuestionsSelected);
				$finalArrForTableChapterWise[$passage_id]["Unique"] =  $unique;
				$finalArrForTableChapterWise[$passage_id]["Copies"] =  "";
				$finalArrForTableChapterWise[$passage_id]["No_copies"] =  $uniqueNot;
				$finalArrForTableChapterWise[$passage_id]["No_Mc_Copy_qcode"] = "";
				$finalArrForTableChapterWise[$passage_id]["IPSMismatch_qcode"] = "";
				$finalArrForTableChapterWise[$passage_id]["unique_qcode_list"] =  $unique_qcode_set;
				$finalArrForTableChapterWise[$passage_id]["copies_qcode_list"] = "";
				$finalArrForTableChapterWise[$passage_id]["no_copies_qcode_list"] = $unique_not_qcode_set;
				$finalArrForTableChapterWise[$passage_id]["final_all_qcode_list"] = $qcode_list_final;
				$finalArrForTableChapterWise[$passage_id]["No_Mc_Copy_qcode_list"] = "";
				$finalArrForTableChapterWise[$passage_id]["IPSMismatch_qcode_list"] = "";
				$finalArrForTableChapterWise[$passage_id]["type"] = "Auto";
				return $finalArrForTableChapterWise;
	}
	
	function SelectTextBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year,$pastyear,$flagUsed=0,$connid,$passage_id_set="",$single_passage="0")
	{
		#####################Count Required##################
		$total_rc_qcount = 0;
		$rc = 0;
		$vb = 0;
		#####################Count Required##################
		$condition = "";
		if($single_passage=="1")
		{
			#####################Count Required##################
			$total_rc_qcount = 9;
			$rc = 6;
			$vb = 3;
			#####################Count Required##################
			#For checking Of first request for this type
			$checkFlagFirst = 0;
			$queryCheckForFirstRequest = "SELECT id,schoolCode,year,class FROM da_testRequest where schoolCode = '$schoolCode' AND class = '$this->class' AND year = '$year' AND paper_type IN(1,2,6) AND flag = 'Auto' AND subject = '1' AND status = 'Approved'";

			$dbqueryCheckForFirstRequest = new dbquery($queryCheckForFirstRequest,$connid);
			while($resultCheckForFirstRequest = $dbqueryCheckForFirstRequest->getrowarray())
			{
				$checkFlagFirst = 1;
			}
			#For checking Of first request for this type
			if($checkFlagFirst==0)
			{
				$condition .= " AND b.use_as = 'RC1'";
			}
			else 
			{	
				$condition .= " AND (b.use_as = 'RC1' OR b.use_as = 'RC2')";
			}
		}
		else 
		{
			#####################Count Required##################
			$total_rc_qcount = 8;
			$rc = 6;
			$vb = 2;
			#####################Count Required##################
			$condition .= " AND  b.use_as = 'RC1'";
		}
		
		$order_by = "";
		$order_by .= "b.submitdate DESC";
		######################FOR passage selection process from table new############################
		if($flagUsed != 0)
		{
			$stringPassageId = "";
			$arrPassageTable = array();
			$query_passage = "SELECT b.passage_id FROM da_passageUsage b WHERE b.class = '$valueclassset' AND b.schoolCode = '$schoolCode' $condition ORDER BY b.last_useddate";			
			$dbquery_passage = new dbquery($query_passage,$connid);
			while($result_passage = $dbquery_passage->getrowarray())
			{
				$arrPassageTable[$result_passage["passage_id"]] = $result_passage["passage_id"];		
			}
			$stringPassageId = implode(",",$arrPassageTable);
			if($stringPassageId != ""){
				$condition .= " AND b.passage_id IN(".$stringPassageId.")";
				$order_by = " FIELD(b.passage_id,$stringPassageId)"; 
			}
		}		
		######################FOR passage selection process from table new############################
		
		$arrRet = array();
		
		$query = "SELECT count(qcode) as qcount,GROUP_CONCAT(qcode) as qcode_list,a.passage_id,b.class,b.submitdate,b.no_of_words FROM da_questions a,
		          qms_passage b where a.passage_id = b.passage_id 
                  AND (b.class = '$valueclassset') AND b.subjectno = '1' AND b.project = 'DA' 
                  $condition AND a.status = '3'
                  GROUP BY a.passage_id ORDER BY $order_by";		
        
		
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$checkTheFlag = 0;
			if($flagUsed==0)
			{
				$qcode_list_set = $result["qcode_list"];
				
				//Skip passage if questions are in da_autoAssemblyQues
				$sameAssembled = $this->checkSamePassageEnglish($qcode_list_set,$schoolCode,$this->class,$connid);
				if($sameAssembled ==1) { continue; }
				
				$flag_forAllYears =0;
				$checkTheFlag = $this->checkusedpassage($qcode_list_set,$schoolCode,$year,$pastyear,$connid,$flag_forAllYears);
				if($checkTheFlag==0)
				{					
                    if($result["qcount"] >=5)
                    {
                        $checkFlagUsedId = 0;
                        if($passage_id_set!="")
                        {
                            if($passage_id_set==$result["passage_id"])
                            {
                                $checkFlagUsedId = 1;
                            }
                        }
                        if($checkFlagUsedId==0)
                        {			
                            #####################Count Required##################
                            $arrQuestionsSelectedRC = array();								
                            $arrQuestionsSelectedRC = $this->getQuestionsRequiredForRC($total_rc_qcount,$rc,$vb,$result["qcode_list"],$schoolCode,$year,$pastyear,$connid);	
                            if(isset($arrQuestionsSelectedRC) && count($arrQuestionsSelectedRC)>0)
                            {
                                $result["qcount"] = count($arrQuestionsSelectedRC);								
                                $result["qcode_list"] = implode(",",$arrQuestionsSelectedRC);
                            }
                            #####################Count Required##################			
                            $arrRet[$result["passage_id"]] = array("qcount"=>$result["qcount"],"qcode_list"=>$result["qcode_list"]);
                            return $arrRet;
                        }	
                    }						
				}
			}
			else 
			{					
                if($result["qcount"]>=5)
                {
                    $checkFlagUsedId = 0;
                    if($passage_id_set!="")
                    {
                        if($passage_id_set==$result["passage_id"])
                        {
                            $checkFlagUsedId = 1;
                        }
                    }
                    if($checkFlagUsedId==0)
                    {	
                        #####################Count Required##################
                        $arrQuestionsSelectedRC = array();
                        $arrQuestionsSelectedRC = $this->getQuestionsRequiredForRC($total_rc_qcount,$rc,$vb,$result["qcode_list"],$schoolCode,$year,$pastyear,$connid);	
                        if(isset($arrQuestionsSelectedRC) && count($arrQuestionsSelectedRC)>0)
                        {
                            $result["qcount"] = count($arrQuestionsSelectedRC);
                            $result["qcode_list"] = implode(",",$arrQuestionsSelectedRC);
                        }	
                        #####################Count Required##################
                        $arrRet[$result["passage_id"]] = array("qcount"=>$result["qcount"],"qcode_list"=>$result["qcode_list"]);
                        return $arrRet;
                    }	
                }					
			}
		}
	}
	
	function SelectImageBasedPassage($arrStartEndWordArr,$valueclassset,$schoolCode,$year,$pastyear,$flagUsed=0,$connid)
	{
		$arrRet = array();
		#####################Count Required##################
		$total_rc_qcount = 6;
		$rc = 5;
		$vb = 1;
		#####################Count Required##################
		
		$condition = "";
		$order_by = "";
		$order_by .= "b.submitdate DESC";
		######################FOR passage selection process from table new############################
		if($flagUsed!=0)
		{
			$stringPassageId = "";
			$arrPassageTable = array();
			$query_passage = "SELECT b.passage_id FROM da_passageUsage b WHERE b.class = '$valueclassset' AND b.schoolCode = '$schoolCode' $condition ORDER BY b.last_useddate";
			$dbquery_passage = new dbquery($query_passage,$connid);
			while($result_passage = $dbquery_passage->getrowarray())
			{
				$arrPassageTable[$result_passage["passage_id"]] = $result_passage["passage_id"];
			}
			$stringPassageId = implode(",",$arrPassageTable);
			if($stringPassageId != ""){
				$condition .= " AND b.passage_id IN(".$stringPassageId.")";
				$order_by = " FIELD(b.passage_id,$stringPassageId)";
		
			}

		}		
		######################FOR passage selection process from table new############################		
		
		$query = "SELECT count(qcode) as qcount,GROUP_CONCAT(qcode) as qcode_list,a.passage_id,b.class,b.submitdate,b.no_of_words FROM da_questions a,
		          qms_passage b where a.passage_id = b.passage_id 
                  AND (b.class = '$valueclassset') AND b.subjectno = '1' AND b.project = 'DA' 
                  AND b.use_as = 'RC2' AND a.status = '3' $condition
                  GROUP BY a.passage_id ORDER BY $order_by";
		
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$checkTheFlag = 0;
			if($flagUsed==0)
			{
				$qcode_list_set = $result["qcode_list"];
				
				//Skip passage if questions are in da_autoAssemblyQues
				$sameAssembled = $this->checkSamePassageEnglish($qcode_list_set,$schoolCode,$this->class,$connid);
				
				if($sameAssembled ==1) { continue; }

				$flag_forAllYears =0;
				$checkTheFlag = $this->checkusedpassage($qcode_list_set,$schoolCode,$year,$pastyear,$connid,$flag_forAllYears);
				if($checkTheFlag==0)
				{	
					if($result["qcount"]>=5)
						{		
							#####################Count Required##################
							$arrQuestionsSelectedRC = array();
							$arrQuestionsSelectedRC = $this->getQuestionsRequiredForRC($total_rc_qcount,$rc,$vb,$result["qcode_list"],$schoolCode,$year,$pastyear,$connid);	
							if(isset($arrQuestionsSelectedRC) && count($arrQuestionsSelectedRC)>0)
							{
								$result["qcount"] = count($arrQuestionsSelectedRC);
								$result["qcode_list"] = implode(",",$arrQuestionsSelectedRC);
							}	
							#####################Count Required##################		
							$arrRet[$result["passage_id"]] = array("qcount"=>$result["qcount"],"qcode_list"=>$result["qcode_list"]);
							return $arrRet;
						}	
				}
			}
			else 
			{	
				if($result["qcount"]>=5)
					{		
						#####################Count Required##################
						$arrQuestionsSelectedRC = array();
						$arrQuestionsSelectedRC = $this->getQuestionsRequiredForRC($total_rc_qcount,$rc,$vb,$result["qcode_list"],$schoolCode,$year,$pastyear,$connid);	
						if(isset($arrQuestionsSelectedRC) && count($arrQuestionsSelectedRC)>0)
						{
							$result["qcount"] = count($arrQuestionsSelectedRC);
							$result["qcode_list"] = implode(",",$arrQuestionsSelectedRC);
						}	
						#####################Count Required##################		
						$arrRet[$result["passage_id"]] = array("qcount"=>$result["qcount"],"qcode_list"=>$result["qcode_list"]);
						return $arrRet;
					}	
			}
		}
	}
	
	#####################Count Required##################
	function getQuestionsRequiredForRC($total_rc_qcount,$rc,$vb,$qcode_list,$schoolCode,$year,$past_year,$connid)
	{
		$arrFinalQcodes = array();
		$arrQcodes = array();
		$arrRC = array();
		$arrVB = array();		
		$arrQcode = explode(",",$qcode_list);		
		foreach($arrQcode as $keyQcode => $valueQcode)
		{
			$query = "SELECT a.description FROM da_topicMaster a,da_subtopicMaster b,da_subSubTopicMaster c,da_questions d where d.sub_subtopic_code = c.sub_subtopic_code 
					  AND c.subtopic_code = b.subtopic_code AND b.topic_code = a.topic_code AND d.qcode = '$valueQcode'";
			$dbquery = new dbquery($query,$connid);
			while($result = $dbquery->getrowarray())
			{
				if($result["description"]=="Reading Comprehension")
				{
					$checkUsed = 0;
					$checkUsed = $this->questionusedbeforeforenglish($valueQcode,$schoolCode,$year,$past_year,$connid);
					$arrRC[$valueQcode] = $checkUsed;
				}
				if($result["description"]=="Vocabulary")
				{
					$checkUsed = 0;
					$checkUsed = $this->questionusedbeforeforenglish($valueQcode,$schoolCode,$year,$past_year,$connid);
					$arrVB[$valueQcode] = $checkUsed;
				}
			}
		}
		if(isset($arrRC) && count($arrRC)>0)
		{
			asort($arrRC);
		}
		if(isset($arrVB) && count($arrVB)>0)
		{
			asort($arrVB);
		}
		asort($arrVB);
		if(count($arrQcode) > $total_rc_qcount)
		{
			$calculate_rc = 0;
			$calculate_vb = 0;
			$calculate_rc = count($arrRC);
			$calculate_vb = count($arrVB);
			if($calculate_rc > $rc && $calculate_vb > $vb)
			{
				$rc = $rc;
				$vb = $vb;
			}
			if($calculate_rc > $rc && $calculate_vb < $vb)
			{
				$difference_count = 0;
				$difference_count = $vb-$calculate_vb;
				$rc = $rc + $difference_count;
				$vb = $vb;
			}
			if($calculate_rc < $rc && $calculate_vb > $vb)
			{
				$difference_count = 0;
				$difference_count = $rc-$calculate_rc;
				$rc = $rc;
				$vb = $vb + $difference_count;
			}
			
			$counter_rc = 0;
			foreach($arrRC as $keyRC => $valueRC)
			{
				if($counter_rc < $rc)
				{
					$arrFinalQcodes[$keyRC] = $keyRC;
					$counter_rc++;
				}			
			}
			$counter_vb = 0;
			foreach($arrVB as $keyVB => $valueVB)
			{
				if($counter_vb < $vb)
				{
					$arrFinalQcodes[$keyVB] = $keyVB;
					$counter_vb++;
				}			
			}
			return $arrFinalQcodes;
		}
		else 
		{
			return $arrQcode;
		}		
	}
	#####################Count Required##################
	
	function checkusedpassage($qcode_list_set,$schoolCode,$year,$pastyear,$connid,$flag_forAllYears='')
	{
		$qcodeSelect = explode(",",$qcode_list_set);
		foreach($qcodeSelect as $keySelect => $valueSelect)
		{
			// if flag zero then check for all years
			if( $flag_forAllYears === 0)
				$year_cond = "" ;
			else
				$year_cond = " AND (b.year = '$year' OR b.year='$pastyear') ";

			$query = "SELECT count(*) as questionusedcount from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND FIND_IN_SET($valueSelect,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode' $year_cond AND b.type = 'actual'";
			$dbquery = new dbquery($query,$connid);
			while($result = $dbquery->getrowarray())
			{
				if($result["questionusedcount"]!=0)
				{
					return "1";
				}
			}
		}
		return "0";
	}
		
	function FetchchapterNameEnglish($keyChapterFetch,$connid)
	{
		$chapter_name = "";
		$query = "SELECT chapter_name FROM da_chapterMaster where chapter_id = '$keyChapterFetch'";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$chapter_name = $result["chapter_name"];
		}
		return $chapter_name;
	}
	
	function FetchpassageNameEnglish($keyPassageFetch,$connid)
	{
		$passage_name = "";
		$query = "SELECT passage_name FROM qms_passage where passage_id = '$keyPassageFetch'";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$passage_name = $result["passage_name"];
		}
		return $passage_name;
	}
	
	
	function getSSTByQcodesForEnglish($FinalQuestionsSelected=array(),$connid)
	{
		$sst_list = "";
		$sstSelected = array();
		foreach($FinalQuestionsSelected as $keyQuestionsSelected => $valueQuestionsSelected)
		{
			$query = "SELECT sub_subtopic_code FROM da_questions where qcode = '$valueQuestionsSelected'";
			$dbquery = new dbquery($query,$connid);
			while($result = $dbquery->getrowarray())
			{
				$sstSelected[$result["sub_subtopic_code"]] = $result["sub_subtopic_code"];
			}
		}
		$sst_list = implode(",",$sstSelected);
		return $sst_list;
	}
	
	######################For fetching qcode based on ssst########################
	function getAllFrreQuestions($classes_str,$ssst_code,$year_new,$past_year_new,$connid,$arrfetchToCheck=array())
	{
		$arrRet = array();
		$query = "SELECT qcode,sub_subtopic_code,class FROM da_questions where class IN ($classes_str) AND ssst_code IN ($ssst_code) AND subjectno = '1' AND misconception != '1' AND status = '3' AND passage_id = '0' AND group_id = '0' ORDER BY group_id";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			if(isset($arrfetchToCheck) && count($arrfetchToCheck)>0)
			{
				if(!in_array($result["qcode"],$arrfetchToCheck))
				{
					$arrRet[$result["qcode"]] = array("qcode"=>$result["qcode"],"sub_subtopic_code"=>$result["sub_subtopic_code"],"class"=>$result["class"]);
				}	
			}	
			else 
			{
				$arrRet[$result["qcode"]] = array("qcode"=>$result["qcode"],"sub_subtopic_code"=>$result["sub_subtopic_code"],"class"=>$result["class"]);
			}	
		}	
		return $arrRet;
	}	
	######################For fetching qcode based on ssst########################
	
	function getAllUnusedQuestions($valueclassset,$sub_subtopic_code_set,$schoolCode,$year,$pastyear,$connid,$flag_allYears ="")
	{
		$arrUnusedSet = array();
		
		$query = "SELECT qcode FROM da_questions where class = '$valueclassset' AND sub_subtopic_code = '$sub_subtopic_code_set' AND subjectno = '1' AND misconception != '1' AND status = '3' AND passage_id = '0' AND group_id = '0' ORDER BY group_id";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$countForWhile = 0;
			$same_assembled = $this->checkSameQcodeEnglish($result["qcode"],$schoolCode,$valueclassset,$connid);
			if($same_assembled ==1) { continue; }
			
			if($flag_allYears ==1)
			{
				$countForWhile = $this->questionusedbeforeforenglish($result["qcode"],$schoolCode,$year,$pastyear,$connid,"",$flag_allYears);
			}
			else
			{
				$countForWhile = $this->questionusedbeforeforenglish($result["qcode"],$schoolCode,$year,$pastyear,$connid);
			}
			//$countForWhile = $this->questionusedbeforeforenglish($result["qcode"],$schoolCode,$year,$pastyear,$connid);
			if($countForWhile == 0)
			{
				$arrUnusedSet[$result["qcode"]] = $result["qcode"];
			}
		}
		return $arrUnusedSet;
	}
	
	function getAllUsedQuestions($valueclassset,$sub_subtopic_code_set,$schoolCode,$year,$pastyear,$connid)
	{
		$arrUsedSet = array();
		$arrTempUsedSet = array();
		
		$query = "SELECT qcode FROM da_questions where class = '$valueclassset' AND sub_subtopic_code = '$sub_subtopic_code_set' AND subjectno = '1' AND misconception != '1' AND status = '3' AND passage_id = '0' AND group_id = '0' ORDER BY group_id";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$countForWhile = 0;
			$same_assembled = $this->checkSameQcodeEnglish($result["qcode"],$schoolCode,$valueclassset,$connid);
			if($same_assembled ==1){  continue; }
			

			// Changed to check for all years
			$flag_forAllYears =1;
			$countForWhile = $this->questionusedbeforeforenglish($result["qcode"],$schoolCode,$year,$pastyear,$connid,"",$flag_forAllYears);
			if($countForWhile > 0)
			{
				$arrTempUsedSet[$result["qcode"]] = $countForWhile;
			}
		}
		
		
		asort($arrTempUsedSet);

		// get last used date of the questions 
		$lastUsedDate ="";
		$qArr = array();
		foreach($arrTempUsedSet as $qcode => $usage)
		{
			$lastUsedDate = $this->getLastUsedDate($qcode,$connid);
			$qArr[] = array("qcode"=>$qcode,"lastUsed"=>"$lastUsedDate","usage"=>$usage);
		}

		$sort = array();
		foreach($qArr as $k=>$v) {
		    $sort['usage'][$k] = $v['usage'];
		    $sort['lastUsed'][$k] = $v['lastUsed'];
		}
		# sort by event_type desc and then title asc
		array_multisort($sort['lastUsed'], SORT_ASC, $sort['usage'], SORT_ASC,$qArr);

		foreach($qArr as $key => $valArr)
		{
			$arrUsedSet[] = $valArr["qcode"];	
		}
		return $arrUsedSet;
	}
	
	// Added class parameter for Task check in Temp Table, if same paper is assembled for school
//	function MisconceptionSelect($arrMisconceptionQcode=array(),$schoolCode,$year,$pastyear,$connid)
	function MisconceptionSelect($arrMisconceptionQcode=array(),$schoolCode,$year,$pastyear,$class,$connid)
	{
			$finalMismatchQuestions = array();
			$finalMismatchQuestions = $this->getAllMismatchQcodeArr($connid);
			if(count($arrMisconceptionQcode)==1) 	#check for copyquestions used before if one copy questions
			{
				$countFlagSet = 0;
				foreach($arrMisconceptionQcode as $keyMCQcode=>$valueMCQcode)
				{
					if(!in_array($valueMCQcode,$finalMismatchQuestions))
					{
						$same_assembled = $this->checkSameQcodeEnglish($valueMCQcode,$schoolCode,$class,$connid);
						if($same_assembled ==1){  continue; }

						$countFlagSet = $this->questionusedbeforeforenglish($valueMCQcode,$schoolCode,$year,$pastyear,$connid);
						if($countFlagSet==0)
						{
							$this->UniqueUsed[] = $valueMCQcode;
						}else 
						{
							$this->UniqueUsed[] = $valueMCQcode;							
						}
						return $valueMCQcode;
					}
					else 
					{
						$this->IPSMismatch[] = $valueMCQcode;
					}
				}
			}
			else 	#check for misconception used before if more than one copy questions
			{
			$countFlagSet = 0;
		
				foreach($arrMisconceptionQcode as $keyMCQcode=>$valueMCQcode)
				{
					if(!in_array($valueMCQcode,$finalMismatchQuestions))
					{
						$same_assembled = $this->checkSameQcodeEnglish($valueMCQcode,$schoolCode,$class,$connid);
						if($same_assembled ==1){  continue; }
						
						$countFlagSet = $this->questionusedbeforeforenglish($valueMCQcode,$schoolCode,$year,$pastyear,$connid);
						if($countFlagSet==0)
						{
							$this->UniqueUsed[] = $valueMCQcode;
							return $valueMCQcode;
						}
					}
					else 
					{
						$this->IPSMismatch[] = $valueMCQcode;
					}
				}

			#if no solution from used count means all qcodes have same count than use performance for selection	
				$performanceArray = array();
				foreach($arrMisconceptionQcode as $keyMCQcode=>$valueMCQcode)
				{
					if(!in_array($valueMCQcode,$finalMismatchQuestions))
					{
						$performanceArray[$valueMCQcode] = $this->copyquestionperformancecount($valueMCQcode,$connid);
					}
					else 
					{
						$this->IPSMismatch[] = $valueMCQcode;
					}
				}
				
				asort($performanceArray);
			
				$copyqcode_midd = $this->getMiddleCopyQuestionPerformance($performanceArray,$connid);
				$this->UniqueUsed[] = $copyqcode_midd;				
				return $copyqcode_midd;
			}
	}
	
	function questionusedbeforeforenglish($qcode,$schoolCode,$year,$pastyear,$connid,$flag="",$flag_allYears =""){
		$countSetForSameQuestionsUsed = 0;
		$condition = "";
		if($flag == "Uniqueused")
		{
			$condition = " AND id!='$this->test_requestid'";
		}
		$year_cond = "";
		if($flag_allYears !=1)
		{
			$year_cond = " AND (b.year = '$year' OR b.year='$pastyear') ";
		}
		
		//	$query = "SELECT count(*) as questionusedcount from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND b.subject =1 AND FIND_IN_SET($qcode,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode' AND (b.year = '$year' OR b.year='$pastyear') AND b.type = 'actual' $condition";
			$query = "SELECT count(*) as questionusedcount from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND b.subject =1 AND FIND_IN_SET($qcode,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode' AND b.type = 'actual' $year_cond $condition";
		//	echo "$query <br/> ";
			$dbquery = new dbquery($query,$connid);
		 	while($row = $dbquery->getrowarray()){
		 		$countSetForSameQuestionsUsed = $row["questionusedcount"];
		 	}
		 	return $countSetForSameQuestionsUsed;
	}
	
	
	function getAllMisconceptionQuestions($valueclass,$sub_subtopic_code_set,$connid)
	{
		$arrMisconeptionSet = array();
		
		$query = "SELECT qcode FROM da_questions where class = '$valueclass' AND sub_subtopic_code = '$sub_subtopic_code_set' AND subjectno = '1' AND  misconception = '1' AND status = '3' AND passage_id = '0' AND group_id = '0'";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$arrMisconeptionSet[$result["qcode"]] = $result["qcode"];
		}
		return $arrMisconeptionSet;
	}
	
	####################SSST New Process######################
	function getAllMisconceptionQuestionsSSST($valueclass,$ssst_code_set,$connid)
	{
		$arrMisconeptionSet = array();
		
		$query = "SELECT qcode FROM da_questions where class IN ($valueclass) AND ssst_code = '$ssst_code_set' AND subjectno = '1' AND  misconception = '1' AND status = '3' AND passage_id = '0' AND group_id = '0'";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$arrMisconeptionSet[$result["qcode"]] = $result["qcode"];
		}
		return $arrMisconeptionSet;
	}
	####################SSST New Process######################
	
	function getSubSubTopicOfChapter($keyChapterFetch,$connid)
	{
		$subSubTopicCode = "";
		$query = "SELECT subsubtopic_code FROM da_tbChapterMapping where chapter_id = '$keyChapterFetch'";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$subSubTopicCode = $result["subsubtopic_code"];
		}
		return $subSubTopicCode;
	}
	
	function SelectPriorityAsPerClass($class,$connid)
	{
		$priorityArr = array();
		$query = "SELECT * from da_questionSelectionPriorityEnglish where original_class = '$class' ORDER BY priority";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$priorityArr[$class][$result['priority']] = $result["class"];
		}
		return $priorityArr;
	}
	
	function chapterWiseQuestionNeeded($chapter_id,$class,$totalQuestionsRequired,$connid)
	{
		$chapterArr = array();
		$chapterWiseArr = array();
		$countChapters = 0;
		$neededQuestions = 0;
		$totalSelected = 0;
		$diffcount = 0;
		$chapterArr = explode(",",$chapter_id);
		$countChapters = count($chapterArr);
		$neededQuestions = ($totalQuestionsRequired/$countChapters);
		
		foreach($chapterArr as $key => $value)
		{			
			$totalSelected = $totalSelected + round($neededQuestions);
			$chapterWiseArr[$value] =  round($neededQuestions);
			
		}		
		
		$diffcount = $totalSelected - $totalQuestionsRequired;
				
		if($diffcount < 0)
		{
			$arrChapterAvailableQuestions = array();
			foreach($chapterArr as $key => $value)
			{
				$countForQues = $this->FetchAvailebaleQuestionForChapters($value,$class,$connid);
				$arrChapterAvailableQuestions[$value] =  $countForQues;
			}
			
			#For just test Problem of less fraction can also solve with this# (05-07-2012)
			arsort($arrChapterAvailableQuestions);
			$maxchapterval = array_keys($arrChapterAvailableQuestions);
			if(count($maxchapterval)==1)
			{
				$chapterWiseArr[$maxchapterval[0]] = $chapterWiseArr[$maxchapterval[0]] + abs($diffcount);			
			}
			else 
			{
				$neededdiff = abs($diffcount);				
				
				for($i=0;$i<count($maxchapterval);$i++)
				{					
				
					if($neededdiff == 0)
					{
						break;
					}

					$chapterWiseArr[$maxchapterval[$i]] = $chapterWiseArr[$maxchapterval[$i]] + 1;					
					
					$neededdiff = $neededdiff - 1;
									
				}
			}
			#For just test Problem of less fraction can also solve with this# (05-07-2012)
							
			return $chapterWiseArr;
		}
		else if($diffcount > 0)
		{
			$arrChapterAvailableQuestions = array();
			foreach($chapterArr as $key => $value)
			{
				$countForQues = $this->FetchAvailebaleQuestionForChapters($value,$class,$connid);
				$arrChapterAvailableQuestions[$value] =  $countForQues;
			}
			
			asort($arrChapterAvailableQuestions);									
						
			$maxchapterval = array_keys($arrChapterAvailableQuestions);
			
			/*****Added by me for 30/32 issue -3 issue ***/
			if(count($maxchapterval)==1)
			{
				$chapterWiseArr[$maxchapterval[0]] = $chapterWiseArr[$maxchapterval[0]] - abs($diffcount);
				
				if($chapterWiseArr[$maxchapterval[0]]<0)
				{
					$chapterWiseArr[$maxchapterval[0]]=0;
				}
			}
			else 
			{
				$neededdiff = abs($diffcount);				
				
				for($i=0;$i<count($maxchapterval);$i++)
				{					
					
					if($neededdiff == 0)
					{
						break;
					}

					$chapterWiseArr[$maxchapterval[$i]] = $chapterWiseArr[$maxchapterval[$i]] - 1;					
									
					
					if($chapterWiseArr[$maxchapterval[$i]]==0)
					{
						$chapterWiseArr[$maxchapterval[$i]] = 0;						
					}
					else if($chapterWiseArr[$maxchapterval[$i]]<0)
					{						
						$neededdiff = abs($chapterWiseArr[$maxchapterval[$i]]);						
						$chapterWiseArr[$maxchapterval[$i]] = 0;						
					}					
					
					$neededdiff = $neededdiff - 1;
									
				}
			}
				
			/*****Added by me for 30/32 issue -3 issue ***/
			return $chapterWiseArr;
		}
		else 
		{
			return $chapterWiseArr;
		}
	
		
	}
	
	function FetchAvailebaleQuestionForChapters($value,$class,$connid)
	{
		$countQuestions = 0;
		
		$query = "SELECT count(*) as countQuestion FROM da_questions a,da_tbChapterMapping b WHERE 
		          a.sub_subtopic_code = b.subsubtopic_code AND b.chapter_id = '$value' 
		          AND a.status = 3 AND a.group_id = 0 AND a.class = '$class'";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$countQuestions = $result["countQuestion"];
		}
		return $countQuestions;
	}
	
	/*function FetchRequiredQuestion($class,$subject,$paper_type,$board,$connid)
	{
		$total_ques = 0;
		$query = "SELECT total_ques from da_autoBluePrint where class = '$class' AND subjectno = '$subject' AND paper_type = '$paper_type' AND board = '$board'";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$total_ques = $result["total_ques"];
		}
		return $total_ques;
	}*/
	function FetchRequiredQuestion($class,$subject,$paper_type,$board,$connid,$schoolCode="",$year)
	{
		$total_ques = 0;
		$condition = "";
		$retArr = array();
		$retArr["total_questions"]=0;
		$retArr["total_passages"]=0;

		if($paper_type!="N/A")
		{
			$condition .= " AND paper_type = '$paper_type'";
		}
		
		// Added year to blueprint query to get count of required questions for that year
		//$query = "SELECT total_ques from da_autoBluePrint where class = '$class' AND subjectno = '$subject' AND paper_type = '$paper_type' AND board = '$board'";
		$query = "SELECT no_of_questions, no_of_passage from da_autoSchoolBluePrint where class = '$class' AND subject = '$subject' AND schoolCode = '$schoolCode' AND year = '$year' $condition";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$retArr["total_questions"] = $result["no_of_questions"];
			$retArr["total_passages"]=$result["no_of_passage"];
		}
		return $retArr;
	}
	
	function FetchRequiredQuestionMathsScience($class,$subject,$connid,$schoolCode="",$year)
	{
		$total_ques = 0;
		$condition = "";		

		// Added year to blueprint query to get count of required questions for that year
		//$query = "SELECT total_ques from da_autoBluePrint where class = '$class' AND subjectno = '$subject' AND paper_type = '$paper_type' AND board = '$board'";
		$query = "SELECT no_of_questions from da_autoSchoolBluePrint where class = '$class' AND subject = '$subject' AND schoolCode = '$schoolCode' AND year = '$year' ";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray())
		{
			$total_ques = $result["no_of_questions"];
		}
		if($total_ques != 0)
			$this->bluePrintQues_count = $total_ques;
		return $total_ques;
	}
	
	
	function UpdateChapterDetailsTableEnglish($finalArrForTableChapterWise,$connid)
	{
        include_once(constant("PATH_ABSOLUTE_CLASSES")."eidaquestions.cls.php");
        $presentYear = date('Y');
        $eidaquestionObj = new clsdaquestion();
		foreach($finalArrForTableChapterWise as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
		{
			/***************For Image Checking *****************/
			$arrIamges = array();
			$qcodeImageNotApprovedlist = "";
			$qcodeImageNotApprovedCount = 0;
			$arrIamges = $this->getQuesImagesValidityToFinalizeAutomationCheck($connid,$valueArrForTableChapterWise["final_all_qcode_list"]);
			$qcodeImageNotApprovedlist = implode(",",$arrIamges);
			$qcodeImageNotApprovedCount = count($arrIamges);
			/***************For Image Checking *****************/
			
			#################################Check 7 Conditions Flags###########################
			//if($valueArrForTableChapterWise["no_copies_qcode_list"]!="")			
            if($valueArrForTableChapterWise["final_all_qcode_list"] !="")
			{
				$arrCheckLastUsed = explode(",",$valueArrForTableChapterWise["final_all_qcode_list"]);
				if(isset($arrCheckLastUsed) && count($arrCheckLastUsed)>0)
				{
					foreach($arrCheckLastUsed as $keyCheckLastUsed => $valueCheckLastUsed)
					{						
						$test_date_last = "";
						$test_date_last = $this->getLastUsedDate($valueCheckLastUsed,$connid);
						if($test_date_last!="")
						{	
                            $testDateObject = new DateTime($test_date_last);
                            if(!is_null($testDateObject)){
                                $testDateYear = $testDateObject->format('Y');
                                $questionTopicDetails = $eidaquestionObj->getTopicDetails($connid, $valueCheckLastUsed);
                                if($questionTopicDetails['topic_name'] == 'Grammar'){
                                    if($testDateYear >= ($presentYear - 2)){
                                        $this->englishConditionCheckFlag = "N";
                                        $this->englishConditionCheckFlagArr[1] = 1;
                                        break;
                                    }
                                }                 
                                else if($questionTopicDetails['topic_name'] == 'Reading Comprehension'){
                                    if($testDateYear >= ($presentYear - 3)){
                                        $this->englishConditionCheckFlag = "N";
                                        $this->englishConditionCheckFlagArr[1] = 1;
                                        break;
                                    }
                                }
                            }							
						}	
					}	
				}	
			}
			if($qcodeImageNotApprovedlist!="")
			{
				$this->englishConditionCheckFlag = "N";
				$this->englishConditionCheckFlagArr[4] = 4;
			}			
			#################################Check 7 Conditions Flags###########################
			
			
			$query = "INSERT into da_questionSelectionSummary set 
					  request_id = '".$valueArrForTableChapterWise["request_id"]."',
					  chapter_id = '".$valueArrForTableChapterWise["chapter_id"]."',
					  passage_id = '".$valueArrForTableChapterWise["passage_id"]."',
					  requested_before = '".$valueArrForTableChapterWise["requested_before"]."',
					  requested_by_same_school = '".$valueArrForTableChapterWise["requested_by_sameschool"]."',
					  best_fit_past_test_id = '".$valueArrForTableChapterWise["best_fit_past_rid"]."',
					  past_count = '".$valueArrForTableChapterWise["past_count"]."',
					  teacher_comment = '".$valueArrForTableChapterWise["teacher_comment"]."',
					  questions_selected = '".$valueArrForTableChapterWise["qs_selected"]."',
					  unique_selected_count = '".$valueArrForTableChapterWise["Unique"]."',
					  unique_qcode_list = '".$valueArrForTableChapterWise["unique_qcode_list"]."',
					  copies_selected_count = '".$valueArrForTableChapterWise["Copies"]."',
					  copies_qcode_list = '".$valueArrForTableChapterWise["copies_qcode_list"]."',
					  unique_repeated_count = '".$valueArrForTableChapterWise["No_copies"]."',
					  unique_repeated_qcode_list = '".$valueArrForTableChapterWise["no_copies_qcode_list"]."',
					  mc_copies_no_count = '".$valueArrForTableChapterWise["No_Mc_Copy_qcode"]."',
					  mc_copies_no_qcode_list = '".$valueArrForTableChapterWise["No_Mc_Copy_qcode_list"]."',
					  ips_mismatch_count = '".$valueArrForTableChapterWise["IPSMismatch_qcode"]."',
					  ips_mismatch_qcode_list = '".$valueArrForTableChapterWise["IPSMismatch_qcode_list"]."',
					  unapproved_image_qcode_count = '".$qcodeImageNotApprovedCount."',
					  unapproved_image_qcode_list = '".$qcodeImageNotApprovedlist."',
					  qcode_all_list = '".$valueArrForTableChapterWise["final_all_qcode_list"]."',
					  type = '".$valueArrForTableChapterWise["type"]."',
					  entered_date = '".date("Y-m-d")."'";
			$dbqry = new dbquery($query,$connid);
		}
	}
	
	
	/***************************************Auto Assembly English Version 2 End from here ********************************/
	
	/****************************************Auto Assembly Version 2 Start from here ***************************************/
	function GenAutoPaperVersion2($connid){
		
		##########For edit update autoassembly ######################
		if($this->action == "updateRequestDetails")
		{
			$this->refreshAutoReportingDetails($connid);
			$this->flagset = 1;
		}
		##########For edit update autoassembly ######################
		if(isset($this->changeBalanceChapter) && count($this->changeBalanceChapter)>0)
		{
			$this->refreshAutoReportingDetails($connid);
		}
		if($this->action=="autoAssemble")
		{
			$this->refreshAutoReportingDetails($connid);
		}
		#Define Array OR variable to use
		$reportingDetailsArr = array();
		$finalReportingArr = array();
		$SameRequestDetails = array();
		$FlagForoAutoAssembledMode = 0;  /****************This flag for Autoassemble Mode **********************/
		$sstUsedInPaper = array(); /************For making chapter and sst combo ****************/ 
		$chapterSubtopicMatch = array(); /*************For making combo of chapters and Subtopiv ****************/
		$finalArrForTableChapterWise = array();
		$approvercheck = "No";
		$arrForRequestIDchoosen = array(); /*****************For seeign same request id used before ****************/
		if($this->test_requestid == 0) return;
		if($this->test_requestid != 0 && $this->test_requestid != ""){
			
			# Fetching Test Request Details
			$requestDetails = $this->GetRequestDetails($this->test_requestid,"",$connid);
			
			# CHECK 1: Is it a past test combination for that chapterid?
			# Searching for past request which are having same chapters id requested
			$SameRequestDetails = $this->SearchSameRequestOfPaperForVersion2($this->test_requestid,$requestDetails["chapter_id"],$requestDetails["class"],$requestDetails["subject"],$requestDetails["schoolCode"],$connid);
			
			##########For Similar Chapter Mapping #############
			# if we are not found any past request with same chapter ids than we are checking for similar chapter ids
			$arrForFlagSimilarChapterArr = array();
			$arrMakeForSimilarChapterSet = array();
			$arrMainSetChapter = array();
			$chapter_final_set_main_thing = $requestDetails["chapter_id"];
			
			if(count($SameRequestDetails)==0)
			{				
				$arrExplodeChapterCheck = explode(",",$requestDetails["chapter_id"]);
				$chapter_similar_id = 0;
				
				foreach($arrExplodeChapterCheck as $keyExplodeChapterCheck => $valueExplodeChapterCheck)
				{
					$arrMainSetChapter[$valueExplodeChapterCheck] = $valueExplodeChapterCheck;
					$similar_chapter_check_id = 0;
					$querySimilarChapterCheckId = "SELECT * FROM da_chapterMaster where chapter_id = '$valueExplodeChapterCheck'";
					$dbquerySimilarChapterCheckId = new dbquery($querySimilarChapterCheckId,$connid);
					while($resultSimilarChapterCheckId = $dbquerySimilarChapterCheckId->getrowarray())
					{
						$similar_chapter_check_id = $resultSimilarChapterCheckId["similar_chapter_id"];
						if($resultSimilarChapterCheckId["similar_chapter_id"]!=0)
						{
							$arrForFlagSimilarChapterArr[$resultSimilarChapterCheckId["similar_chapter_id"]] = $resultSimilarChapterCheckId["similar_chapter_id"];
							$arrMainSetChapter[$valueExplodeChapterCheck] = $resultSimilarChapterCheckId["similar_chapter_id"];
						}
					}
				}
				
				$requestDetails["chapter_id"] = implode(",",$arrMainSetChapter);				
				$SameRequestDetails = $this->SearchSameRequestOfPaperForVersion2($this->test_requestid,$requestDetails["chapter_id"],$requestDetails["class"],$requestDetails["subject"],$requestDetails["schoolCode"],$connid);																	
			}
			##########End For Similar Chapter Mapping #############
			
			# If request is revision so we are checking total requested chapters used percentage & if we found < 0.5 than we are setting paper type to manual
			########################Checking For revision chapters##########################
			if($requestDetails["request_type"]=="RV")
			{
				$type_chapter = "Auto";
				$check_year = "2012";
				$check_year = $requestDetails["year"];
				$check_schoolCode = "";
				$check_schoolCode = $requestDetails["schoolCode"];
				$chapterArrRevision = array();
				$chapterArrRevision = $this->getRevisionChapters($check_schoolCode,$check_year,$connid);				
				$chaptersRequested = explode(",",$requestDetails["chapter_id"]);
				$totalChapterCount = 0;
				$totalChapterCount = count($chaptersRequested);
				$totalChapterUsedCount = 0;
				foreach($chaptersRequested as $keyChapterRequested => $valueChapterRequested)
				{
					if(in_array($valueChapterRequested,$chapterArrRevision))
					{
						$totalChapterUsedCount = $totalChapterUsedCount+1;
					}
				}
				$percebtage_used_chapters = 0;
				$percebtage_used_chapters = ($totalChapterUsedCount/$totalChapterCount);
				if($percebtage_used_chapters <= 0.5){
					
					//$type_chapter = "Manual";
					// Task S-01020 Semi Auto type Naveen
					$type_chapter = "Semi-Auto";
				}				
			}
			########################End Checking For revision chapters##########################
			#YES:/******************If same request id found ***************/
			if(is_array($SameRequestDetails) && count($SameRequestDetails) > 0){ 
			
			#############FOR Similar Chapter Process##########
			if(isset($arrForFlagSimilarChapterArr) && count($arrForFlagSimilarChapterArr)>0)
			{
					$queryUpdateTestChapter = "UPDATE da_testRequest set chapter_id = '".$requestDetails["chapter_id"]  ."' WHERE id = '$this->test_requestid'";
					$dbqryUpdateTestChapter = new dbquery($queryUpdateTestChapter,$connid);	
			}
			#############FOR Similar Chapter Process##########			
								
			#CHECK 2 � Is that past test provided to the same school?
				#NO:
				if($requestDetails["schoolCode"] != $SameRequestDetails["schoolCode"]){ /******************If schoolcode is not same ***************/
					$FlagForoAutoAssembledMode = 1; /***************For (a)	Same combination for different school  � direct import using latest version of questions ******/
					$this->papercode = $requestDetails["paper_code"];
					$this->class = $requestDetails["class"];
					$this->subjectno = $requestDetails["subject"];
					$this->paperType = $requestDetails["paper_type"];
					$this->schoolCode = $requestDetails["schoolCode"];
					$this->request_type = $requestDetails['request_type'];
					$referencePapercode = $SameRequestDetails["paper_code"];
					
					$papercode = $this->GenNewPaperCode($connid); #(Commented Due to Testing Purpose)
					
					// to set blueprint count 
					$totalQuestionsRequired = $this->FetchRequiredQuestionMathsScience($this->class,$this->subjectno,$connid,$this->schoolCode,$requestDetails["year"]);

					// If no blue print count then stop 

					if($totalQuestionsRequired==0)
					{			
						$queryUpdatePaperCode = "UPDATE da_testRequest set paper_code ='' where id = '$this->test_requestid'";
						$rowUpdatePaperCode = new dbquery($queryUpdatePaperCode,$connid);
						$queryDeletePaperCode = "DELETE from da_questionSelectionSummary where request_id = '$this->test_requestid'";
						$rowDeletePaperCode = new dbquery($queryDeletePaperCode,$connid);
						if($this->flagset==0)
						{
							echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
							exit;
						}	
					}

					// end for blueprint count check 

				//	$papercode = $this->GenNewPaperCode($connid); #(Commented Due to Testing Purpose)
					$reportingDetailsArr = $this->getReportingDetailsPast($referencePapercode,$connid);					
					
					################################################For Past Qcode list used in direct,related,no related repeat q found###############################
					$final_qcode_list_after = "";
					$final_qcode_list_after = $this->getFinalQcodeList($reportingDetailsArr,$connid);										
					######################################################################################################
					
					#Questions  � use the same questions as in the past test if the questions not used by that school in last year and this year so far. If used, use the copy of that question. If no copy present, use the original as a repeat question
					
					$finalReportingArr = $this->SelectionOfQccodes($reportingDetailsArr,$requestDetails["year"],$requestDetails["schoolCode"],"FoundRequestId",$papercode,$connid);
					
					// Naveen task 1002 Drop questions if they request for less questions
					$finalReportingArr = $this->dropQuestions_autoBlueprint($finalReportingArr, $reportingDetailsArr, $requestDetails["year"],$requestDetails["schoolCode"], $this->class, $this->subjectno, $papercode,$connid);
					
					#RH  � Use the same reporting heads as in the past test paper(Update of the latest request id that we are auto assembling)
					$this->UpdateReportingHeadForNewRequest($finalReportingArr,$connid);
					$this->UpdateTestRequestDetails($FlagForoAutoAssembledMode,$connid);
					#Questions Selection Summary Table
					foreach($this->sstLevelArray as $keyLevelArray => $valueLevelArray)
					{
						$sstUsedInPaper[] = $keyLevelArray;
					}
					
					
					$chapters_in_paper = explode(",",$requestDetails["chapter_id"]);
					$chapterSubtopicMatch = $this->checkChapterMappedToSubSubTopic($chapters_in_paper,$sstUsedInPaper,$connid);
										
					$finalArrForTableChapterWise = $this->FetchFinalChapterTableArray($chapterSubtopicMatch,"FetchForSameRequestFound","N",$SameRequestDetails["id"],$connid,$final_qcode_list_after,$requestDetails);
					
					#############FOR Similar Chapter Process##########
					if(isset($arrForFlagSimilarChapterArr) && count($arrForFlagSimilarChapterArr)>0)
					{
							$queryUpdateTestChapter = "UPDATE da_testRequest set chapter_id = '".$chapter_final_set_main_thing."' WHERE id = '$this->test_requestid'";	
							$dbqryUpdateTestChapter = new dbquery($queryUpdateTestChapter,$connid);	
							foreach($arrForFlagSimilarChapterArr as $keyForFlagSimilarChapterArr => $valueForFlagSimilarChapterArr)
							{
									$finalArrForTableChapterWise[$valueForFlagSimilarChapterArr]["similar_chapter_flag"] = 1;
							}	
					}#############FOR Similar Chapter Process##########					
									
					$finalArrForTableChapterWise = $this->UpdateChapterDetailsTable($finalArrForTableChapterWise,$connid);
					
					#For test request name 
					$test_name = "";
					if($this->request_type ==='RV') {
						$test_name = 'Revision';
					} else {
						foreach($finalArrForTableChapterWise as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
						{
							$queryChapterName = "SELECT chapter_name from da_chapterMaster where chapter_id = '".$valueArrForTableChapterWise["chapter_id"]."'";
							$dbqueryChapterName = new dbquery($queryChapterName,$connid);
							while($rowChapterName = $dbqueryChapterName->getrowarray())
							{
								$chapter_name = $rowChapterName["chapter_name"];
							}
							$test_name .= $chapter_name."; "; 
						}
						$test_name = substr_replace($test_name,"",-2);
						$test_name = common_junk_replace($test_name);
					}
					$updateQuery = "UPDATE da_testRequest set testName = '".addslashes($test_name)."' where id = '$this->test_requestid'";
					$dbUpdateQuery = new dbquery($updateQuery,$connid);
					
					########To Check Questions Selected Or Not#######
					$checkFlagSetForList = $this->checkQuestionSelectedFlag($this->test_requestid,$connid);
					#####################				
					
					#Approver
					#CHECK 3 � Does any reporting head have < 3 questions or paper has >50% copies?
					$approvercheck = $this->checkApproverFlag($finalReportingArr,$connid);
					
					#YES:  Send for approval � approver will need to manually make changes / checks
					if($approvercheck=="Yes")
					{
						#pending Later we will do
					}
					
					#NO: No approval - generate PDF after the 7th day from test request date;New approval status called System Approved to be assigned
					else 
					{
						#pending Later we will do
					}
					
					########################Checking For revision chapters##########################
					if($requestDetails["request_type"]=="RV")
					{
						if($type_chapter=="Manual"){
							$this->changeForRevisionTest($connid);
						}
						else if($type_chapter == "Semi-Auto"){
							$up_query = "UPDATE da_testRequest SET flag = '".$type_chapter."' WHERE id = '".$this->test_requestid."'";
							$up_dbqry = new dbquery($up_query,$connid);
						}
						
					}
					########################Checking For revision chapters##########################
					## PROCESS FOR AUTO REPORT AND AUTO APPROVAL CONDICTION CHECKING
					$this->CheckAutoApproveConditions($this->test_requestid,$connid);
					if($this->flagset==0)
					{
						echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
						exit;
					}
				}
				#YES:
				elseif($requestDetails["schoolCode"] == $SameRequestDetails["schoolCode"]){ /******************If schoolcode is same ***************/	
					$FlagForoAutoAssembledMode = 2; /***************(b)	Same combination for same school  � built using copies ******/
					$this->papercode = $requestDetails["paper_code"];
					$this->class = $requestDetails["class"];
					$this->subjectno = $requestDetails["subject"];
					$this->paperType = $requestDetails["paper_type"];
					$this->schoolCode =$requestDetails["schoolCode"];
					$this->request_type= $requestDetails['request_type'];
					$referencePapercode = $SameRequestDetails["paper_code"];
					
					$papercode = $this->GenNewPaperCode($connid); #(Commented Due to Testing Purpose)
					
					// to set blueprint count 
					$totalQuestionsRequired = $this->FetchRequiredQuestionMathsScience($this->class,$this->subjectno,$connid,$this->schoolCode,$requestDetails["year"]);

					// If no blue print count then stop 

					if($totalQuestionsRequired==0)
					{			
						$queryUpdatePaperCode = "UPDATE da_testRequest set paper_code ='' where id = '$this->test_requestid'";
						$rowUpdatePaperCode = new dbquery($queryUpdatePaperCode,$connid);
						$queryDeletePaperCode = "DELETE from da_questionSelectionSummary where request_id = '$this->test_requestid'";
						$rowDeletePaperCode = new dbquery($queryDeletePaperCode,$connid);
						if($this->flagset==0)
						{
							echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
							exit;
						}	
					}

					// end for blueprint count check

					
					$reportingDetailsArr = $this->getReportingDetailsPast($referencePapercode,$connid);					
										
					################################################For Past Qcode list used in direct,related,no related repeat q found###############################
					$final_qcode_list_after = "";
					$final_qcode_list_after = $this->getFinalQcodeList($reportingDetailsArr,$connid);										
					######################################################################################################
					
					#Questions  � use the same questions as in the past test if the questions not used by that school in last year and this year so far. If used, use the copy of that question. If no copy present, use the original as a repeat question
					
					$finalReportingArr = $this->SelectionOfQccodes($reportingDetailsArr,$requestDetails["year"],$requestDetails["schoolCode"],"",$papercode,$connid);
					
					// Naveen task 1002 drop excess questions based on BluePrint table
					$finalReportingArr=$this->dropQuestions_autoBlueprint($finalReportingArr, $reportingDetailsArr, $requestDetails["year"],$requestDetails["schoolCode"], $this->class, $this->subjectno, $papercode,$connid);
								
					// task 1002

					#######For swapping selected question in reporting head(Re-order the 1st question for same combo same school papers)#######
					foreach($finalReportingArr as $keyArrSwap => $valueArrSwap)
					{
						if($valueArrSwap["qcode_list"]!="")
						{							
							$qcodeExplodeForSwap = explode(",",$valueArrSwap["qcode_list"]);
							if(isset($qcodeExplodeForSwap) && count($qcodeExplodeForSwap)>0)
							{	
								$sift_last = "";						
								$sift_last = $qcodeExplodeForSwap[0];												
								array_shift($qcodeExplodeForSwap);						
								$qcodeExplodeForSwap[] = $sift_last;												
								$finalReportingArr[$keyArrSwap]["qcode_list"] = implode(",",$qcodeExplodeForSwap);
							}
						}	
						
					}
					#######For swapping selected question in reporting head(Re-order the 1st question for same combo same school papers)#######
					
					#RH � Use the same reporting heads as in the past test paper(Update of the latest request id that we are auto assembling)
					$this->UpdateReportingHeadForNewRequest($finalReportingArr,$connid);
					$this->UpdateTestRequestDetails($FlagForoAutoAssembledMode,$connid);
					#Questions Selection Summary Table
					foreach($this->sstLevelArray as $keyLevelArray => $valueLevelArray)
					{
						$sstUsedInPaper[] = $keyLevelArray;
					}
					
					
					$chapters_in_paper = explode(",",$requestDetails["chapter_id"]);
					$chapterSubtopicMatch = $this->checkChapterMappedToSubSubTopic($chapters_in_paper,$sstUsedInPaper,$connid);
															
					$finalArrForTableChapterWise = $this->FetchFinalChapterTableArray($chapterSubtopicMatch,"FetchForSameRequestFound","Y",$SameRequestDetails["id"],$connid,$final_qcode_list_after,$requestDetails);
										
					#############FOR Similar Chapter Process##########
					if(isset($arrForFlagSimilarChapterArr) && count($arrForFlagSimilarChapterArr)>0)
					{
							$queryUpdateTestChapter = "UPDATE da_testRequest set chapter_id = '".$chapter_final_set_main_thing."' WHERE id = '$this->test_requestid'";	
							$dbqryUpdateTestChapter = new dbquery($queryUpdateTestChapter,$connid);	
							foreach($arrForFlagSimilarChapterArr as $keyForFlagSimilarChapterArr => $valueForFlagSimilarChapterArr)
							{
									$finalArrForTableChapterWise[$valueForFlagSimilarChapterArr]["similar_chapter_flag"] = 1;
							}	
					}		
					#############FOR Similar Chapter Process##########
					
					$finalArrForTableChapterWise = $this->UpdateChapterDetailsTable($finalArrForTableChapterWise,$connid);
					
					#For Test Name Update in test request
					$test_name = "";
					if($this->request_type === "RV") {
						$test_name = "Revision";
					} else {
						foreach($finalArrForTableChapterWise as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
						{
							$queryChapterName = "SELECT chapter_name from da_chapterMaster where chapter_id = '".$valueArrForTableChapterWise["chapter_id"]."'";
							$dbqueryChapterName = new dbquery($queryChapterName,$connid);
							while($rowChapterName = $dbqueryChapterName->getrowarray())
							{
								$chapter_name = $rowChapterName["chapter_name"];
							}
							$test_name .= $chapter_name."; "; 
						}
						$test_name = substr_replace($test_name,"",-2);
						$test_name = common_junk_replace($test_name);
					}	
					
					$updateQuery = "UPDATE da_testRequest set testName = '".addslashes($test_name)."' where id = '$this->test_requestid'";
					$dbUpdateQuery = new dbquery($updateQuery,$connid);
					
					########To Check Questions Selected Or Not#######
					$checkFlagSetForList = $this->checkQuestionSelectedFlag($this->test_requestid,$connid);
					#####################				
					
					#Approval � Send for approval (Pending)
					#Approver
					#CHECK 3  � Does any reporting head have < 3 questions or paper has >50% copies?
					$approvercheck = $this->checkApproverFlag($finalReportingArr,$connid);
					
					#YES:  Send for approval  � approver will need to manually make changes / checks
					if($approvercheck=="Yes")
					{
						#pending Later we will do
					}
					
					#NO: No approval - generate PDF after the 7th day from test request date;New approval status called System Approved to be assigned
					else 
					{
						#pending Later we will do
					}
					## PROCESS FOR AUTO REPORT AND AUTO APPROVAL CONDICTION CHECKING
					$this->CheckAutoApproveConditions($this->test_requestid,$connid);
					########################Checking For revision chapters##########################
					if($requestDetails["request_type"]=="RV")
					{
						if($type_chapter=="Manual"){
							$this->changeForRevisionTest($connid);
						}
						else if($type_chapter == "Semi-Auto"){
							$up_query = "UPDATE da_testRequest SET flag = '".$type_chapter."' WHERE id = '".$this->test_requestid."'";
							$up_dbqry = new dbquery($up_query,$connid);
						}
					}
					########################Checking For revision chapters##########################
					
					if($this->flagset==0)
					{						
					echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
					exit;
					}
				}	
			}
			#NO:	
			#(New chapter combination)
			else{/******************If same request id not found ***************/ 					
				$FlagForoAutoAssembledMode = 3; /***************(c)	New combination  � assembled chapter by chapter ******/
				$arrChaptersFetch = array();
				$this->papercode = $requestDetails["paper_code"];
				$this->class = $requestDetails["class"];
				$this->subjectno = $requestDetails["subject"];
				$this->schoolCode =$requestDetails["schoolCode"];
				$this->paperType = $requestDetails["paper_type"];
				$this->request_type =$requestDetails['request_type'];
				$finalArrForTableChapterWise = array();
				
				#######################For same chapter sst repeat qcode issue take care##################
				$arrAllQcodesSet = array();
				#######################For same chapter sst repeat qcode issue take care##################				
				
				$papercode = $this->GenNewPaperCode($connid); #(Commented Due to Testing Purpose)
				
				$requestDetails["chapter_id"] = $chapter_final_set_main_thing; 
				
				if(isset($this->changeBalanceChapter) && count($this->changeBalanceChapter)>0)
				{
					$arrChaptersFetch = $this->changeBalanceChapter;					
				}
				else 
				{
					//$arrChaptersFetch = $this->chapterQuestionSelectionCount($requestDetails["chapter_id"],$connid);
					$arrChaptersFetch = $this->chapterQuestionSelectionCount($requestDetails["chapter_id"],$connid,$requestDetails["class"],$requestDetails["subject"],$requestDetails["paper_type"],$requestDetails["schoolCode"], $requestDetails["year"]);
									
					$maxchapterval = "";
					$fractionSet = array();
					$calCount = 0;					
					$diffNedded_count =0;
					
					foreach($arrChaptersFetch as $keyChapterFetch => $valueChapterFetch)
					{
						$valueChapterFetchNew = round($valueChapterFetch,2);
						$errSplitBaseNumerator = explode(".",$valueChapterFetchNew); 
						$fetchfrac = $errSplitBaseNumerator[1];
						if($fetchfrac != 0)
						{ 
							$fractionSet[$keyChapterFetch] = $fetchfrac; 
						}
						$arrChaptersFetch[$keyChapterFetch] = 	round($valueChapterFetch);
						$calCount = $calCount + round($valueChapterFetch);
					}					
					
					$maxchapterval = array_keys($arrChaptersFetch, max($arrChaptersFetch));
					
					if($calCount < 25)
					{
						$countFracTotal = 0;
						foreach($fractionSet as $keyfrac => $valuefrac)
						{
							$countFracTotal = $countFracTotal + $valuefrac;
						}
						$countFracTotal = ($countFracTotal/100);
					}
					
					// Needed value based on blueprint value for question selection table
					if($this->bluePrintQues_count !=0)
					{
						// Increment needed value if found is less, if found is more decrement needed value
						if($calCount < $this->bluePrintQues_count)
						{
							$diffNedded_count = $this->bluePrintQues_count - $calCount;

							while($diffNedded_count > 0)
							{
								foreach($arrChaptersFetch as $chp => $req)
								{
									if($diffNedded_count ==0) break;
												
									$arrChaptersFetch[$chp]+=1;
									$diffNedded_count-=1;
							
								}	
							}
					//		$arrChaptersFetch[$maxchapterval[0]] = $arrChaptersFetch[$maxchapterval[0]] + 1;
						}
						else if($calCount > $this->bluePrintQues_count)
						{
							$diffNedded_count = $calCount - $this->bluePrintQues_count;
							while($diffNedded_count > 0)
							{	
								foreach($arrChaptersFetch as $chp => $req)
								{
									if($diffNedded_count ==0) break;
														
									$arrChaptersFetch[$chp]-=1;
									$diffNedded_count-=1;
								
								}
							}
						}
					}

				//	if($countFracTotal>0.5)
					{						
				//		$arrChaptersFetch[$maxchapterval[0]] = $arrChaptersFetch[$maxchapterval[0]] + 1;
					}
				}
				$count_for_reporting_head = 0;
				$count_for_reporting_head = count($arrChaptersFetch);
				
				######### For Count Of Misconception To Select #############
				$this->setSelectMisconceptionCount($arrChaptersFetch,$connid);
				######### For Count Of Misconception To Select #############
				
				#chapter by chapter scanning
				foreach($arrChaptersFetch as $keyChapterFetch => $valueChapterFetch)
				{				
					$finalArrForTableChapterWise[$keyChapterFetch]["chapter_id"] = $keyChapterFetch;
					$finalArrForTableChapterWise[$keyChapterFetch]["request_id"] = $this->test_requestid;					

					$arrRelatedToPastRequestIds = array();
					$arrGetDataRelatedToQuestionsIneachRequesrId =  array();
					
					#CHECK 4: Is the chapter requested in atleast 1 past test?
					$arrRelatedToPastRequestIds[$keyChapterFetch] = $this->selectPastRequestIdsForBestFit($keyChapterFetch,$this->test_requestid,$connid); 
					$arrRelatedToPastRequestIds = array_filter($arrRelatedToPastRequestIds);
										
					##########For Similar Chapter Id Process#############
					if(count($arrRelatedToPastRequestIds)==0)
					{					
					
						$get_similar_chapter_id = 0;
						$get_similar_chapter_id = $this->getSimilarMappedChapterId($keyChapterFetch,$connid);
						if($get_similar_chapter_id!=0 && $get_similar_chapter_id!="")
						{							
							$keyChapterFetch = $get_similar_chapter_id;							
							$arrRelatedToPastRequestIds[$keyChapterFetch] = $this->selectPastRequestIdsForBestFit($get_similar_chapter_id,$this->test_requestid,$connid); 
							$arrRelatedToPastRequestIds = array_filter($arrRelatedToPastRequestIds);
							$finalArrForTableChapterWise[$keyChapterFetch]["chapter_id"] = $keyChapterFetch;
							$finalArrForTableChapterWise[$keyChapterFetch]["request_id"] = $this->test_requestid;							
							$finalArrForTableChapterWise[$keyChapterFetch]["similar_chapter_flag"] = 1;							
						}						
						
					}
					##########For Similar Chapter Id Process#############					
										
					#o	YES
					if(isset($arrRelatedToPastRequestIds) && count($arrRelatedToPastRequestIds)>0)
					{
						$finalArrForTableChapterWise[$keyChapterFetch]["requested_before"] = "Y";
						$arrDifferenceCount = array(); 
						foreach($arrRelatedToPastRequestIds[$keyChapterFetch] as $keyIdFetch => $valueIdFetch)
						{	
							$arrGetDataRelatedToQuestionsIneachRequesrId[$keyIdFetch] = $this->fetchDataRelatedToRequestIdQuestions($keyChapterFetch,$valueIdFetch,$connid);
							$arrDifferenceCount[$valueIdFetch] = abs($arrGetDataRelatedToQuestionsIneachRequesrId[$keyIdFetch][$keyIdFetch]["count"]-$valueChapterFetch);
						}						
						
						#For each such chapter (say first is chapter A), find the best fit past test for that chapter that has closest number of questions to X. Best fit past test is the test which has least difference in number of questions to X.
						$makeLeastArrayId = array();
						$getminvalue = min($arrDifferenceCount); 
						foreach($arrDifferenceCount as $keyDifferenceCount => $valueDifferenceCount)
						{
							if($valueDifferenceCount == $getminvalue)
							{
								$makeLeastArrayId[$keyDifferenceCount] = $valueDifferenceCount;
							}
						}
						
						#Check if more request id is there for least number of qcount difference
						$question_past_paper = 0;
						$id_selected = 0;
						
						#If two test available with same difference: �	Choose the one with more number of questions (if chapter A needs 8 questions, you may get one with 6 i.e. X-2 and one with 10 i.e. X+2 � both have difference of 2. In this case choose the one with 10 questions (higher number).
			
						if(isset($makeLeastArrayId) && count($makeLeastArrayId)>1)
						{
							$arrForRequestIds = array();
							$arrForRequestIds = $this->fetchMaxQcountRequestIds($makeLeastArrayId,$arrGetDataRelatedToQuestionsIneachRequesrId,$connid);
							$id_selected_arr = array_keys($arrForRequestIds);
							$id_selected = $id_selected_arr[0];
							$question_past_paper = $arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["count"]; 							
						}
						else 
						{
							foreach($makeLeastArrayId as $keyLeastArrayId => $valuLeastArrayId)
							{
								$question_past_paper = $arrGetDataRelatedToQuestionsIneachRequesrId[$keyLeastArrayId][$keyLeastArrayId]["count"];
								$id_selected = $keyLeastArrayId;
							}
						}
						
						$finalArrForTableChapterWise[$keyChapterFetch]["past_count"] =  $question_past_paper;
						
						$schoolCodePast = $this->getSchoolCodeRID($id_selected,$connid);
						$schoolCodeCurrent = $this->getSchoolCodeRID($this->test_requestid,$connid);
						if($schoolCodePast==$schoolCodeCurrent)
						{
							$finalArrForTableChapterWise[$keyChapterFetch]["requested_by_sameschool"] = "Y";
						}
						else 
						{
							$finalArrForTableChapterWise[$keyChapterFetch]["requested_by_sameschool"] = "N";
						}
						
						$finalArrForTableChapterWise[$keyChapterFetch]["best_fit_past_rid"] = $id_selected;
						$finalArrForTableChapterWise[$keyChapterFetch]["teacher_comment"] = $this->FindTeacherComment($id_selected,$connid);
						
						#######################For same chapter sst repeat qcode issue take care##################
						if(isset($arrAllQcodesSet) && count($arrAllQcodesSet)>0)
						{
							if($arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"]!="")
							{
								$arrSameQcodeCheck = array();
								$arrSameQcodeCheck = explode(",", $arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"]);					
								foreach($arrSameQcodeCheck as $keySameQcodeCheck => $valueSameQcodeCheck)
								{
									if(in_array($valueSameQcodeCheck,$arrAllQcodesSet))
									{
										unset($arrSameQcodeCheck[$keySameQcodeCheck]);
									}
								}	
								$arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"] = implode(",",$arrSameQcodeCheck);
							}	
						}
						#######################For same chapter sst repeat qcode issue take care##################
						
							#	CHECK 5 - Does the best fit past test have > X questions?
						
							#�	YES:
							if($question_past_paper>$valueChapterFetch)
							{
								#CHECK 6  � Is no. of questions <= X + 2;
								#YES:
								
								if($question_past_paper<=$valueChapterFetch+2)
								{									
									$qcode_list_past = "";
									$qcode_list_past = $arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"];
									
									$referencePapercode = $this->referencePaperCodeSelect($id_selected,$connid);
									$reportingDetailsArr = $this->getReportingDetailsPastForNewCombination($referencePapercode,$qcode_list_past,$connid,$count_for_reporting_head,$keyChapterFetch,$valueChapterFetch);						
									
									#Questions  � use the same questions as in the past test if the questions not used by that school in last year and this year so far. If used, use the copy of that question. If no copy present, use the original as a repeat question
						
									
									$finalReportingArr = $this->SelectionOfQccodes($reportingDetailsArr,$requestDetails["year"],$requestDetails["schoolCode"],"FoundChapterId",$papercode,$connid,$keyChapterFetch);
									
								}
								#NO: (More X +2) 
								else 
								{		
									#Check 7 IF number of SST <= no of question needed
									#YES
									if($arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["sst_count"]<=$valueChapterFetch)
									{	
										$qcode_list_past_all = "";
										$qcode_list_past_all = $arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"];
										$qcode_list_past = $this->fetchFinalQcodeListForMoreQcode($qcode_list_past_all,$valueChapterFetch,$connid,$requestDetails["year"],$requestDetails["schoolCode"],$keyChapterFetch);
										$referencePapercode = $this->referencePaperCodeSelect($id_selected,$connid);
										$reportingDetailsArr = $this->getReportingDetailsPastForNewCombination($referencePapercode,$qcode_list_past,$connid,$count_for_reporting_head,$keyChapterFetch,$valueChapterFetch);
																	
										#Questions  � use the same questions as in the past test if the questions not used by that school in last year and this year so far. If used, use the copy of that question. If no copy present, use the original as a repeat question
										
										$finalReportingArr = $this->SelectionOfQccodes($reportingDetailsArr,$requestDetails["year"],$requestDetails["schoolCode"],"FoundChapterId",$papercode,$connid,$keyChapterFetch,"More");
										
									}
									#No
									else 
									{										
										$ExplodeMisconceptionCheckArr = array();
										$sstQcodeArr = array();
										$sstQcodeArr = $this->GroupBySSTQcodes($arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"],$connid);
										$sstQcodeCount = array();
										$bestTopFitSST =  array();
										$qcode_list_past_all = "";
										$qcodeArrSelected = array();
										foreach($sstQcodeArr as $keyQcodeArr=>$valueQcodeArr)
										{
											$sstQcodeCount[$keyQcodeArr] = count($sstQcodeArr[$keyQcodeArr]);
										}
										arsort($sstQcodeCount);										
										
										$bestTopFitSST = $this->selectBestFitSST($sstQcodeCount,$valueChapterFetch,$connid,$requestDetails["subject"]);
										foreach($bestTopFitSST as $keyMisconceptionCheck => $valueMisconceptionCheck)
										{
											foreach($sstQcodeArr[$keyMisconceptionCheck] as $keyQcodeArrMc => $valueQcodArrMc)
											{												
													$ExplodeMisconceptionCheckArr[] = $valueQcodArrMc;												
											}	
										}																					
									
																
										foreach($bestTopFitSST as $keybestTopFitSST => $valuebestTopFitSST)
										{																							
												$qcodemisconception = "";
												########Added Here #########
												if($this->chpaterMCArray[$keyChapterFetch]!=0)
												{
												########Added Here #########	
													#Misconception Select
													foreach($sstQcodeArr[$valuebestTopFitSST] as $key1 => $value1){
													$misconception = $this->selectMisaconceptionQcode($value1,$connid);
													
													
														if($misconception==1)
														{
															$qcodemisconception = $this->CommonFunctionForQcodeFetch($value1,$requestDetails["year"],$requestDetails["schoolCode"],"FoundChapterId",$ExplodeMisconceptionCheckArr,$connid,"","More");
															
															if($qcodemisconception!="")
															{
																$qcodeArrSelected[$value1] = $qcodemisconception;
																$countselectedqcode++;
															}	
														}
														if($qcodemisconception != "")
														{
															########Added Here #########
															$this->chpaterMCArray[$keyChapterFetch] = $this->chpaterMCArray[$keyChapterFetch]-1;
															########Added Here #########
															break;
														}
													}
												########Added Here #########
												}
												########Added Here #########
												#Selecr Qcode based on performance middle
												if($qcodemisconception == "")
												{
													########Added Here #########
													$questionArrUsageNormalMade = array();
													foreach($sstQcodeArr[$valuebestTopFitSST] as $key1 => $value1)
													{
														$questionArrUsageNormalMade[$value1] = $value1;
													}
													$totalcountformccalculate = 0;
													$countavailablenormalquestion = 0;
													$misconception_select_flag = 0;
													$totalcountformccalculate = count($questionArrUsageNormalMade);			
													$qcode_list_check_misconception_qlist = implode(",",$questionArrUsageNormalMade);
													$countavailablenormalquestion = $this->fetchPureNormalQuestionCount($qcode_list_check_misconception_qlist,$connid);	
													if(1 <= $countavailablenormalquestion)
													{
														$misconception_select_flag = 1;
													}												
													########Added Here #########													
													
													$perfromanceArryForQcode = array();
													foreach($sstQcodeArr[$valuebestTopFitSST] as $key1 => $value1)
													{
														########Added Here #########	
														$checkFlagMisconception = 0;
														if($misconception_select_flag==1)
														{					
															
															$checkFlagMisconception = $this->checkMisconceptionQuestion($value1,$connid);
															if($checkFlagMisconception==0)
															{																
																$value1 = $this->CommonFunctionForQcodeFetch($value1,$requestDetails["year"],$requestDetails["schoolCode"],"FoundChapterId",$ExplodeMisconceptionCheckArr,$connid);
																if($value1!="")
																{
																	$perfromanceArryForQcode[$value1] = $this->copyquestionperformancecount($value1,$connid);
																}
															}
															
														}
														else 
														{															
														########Added Here #########		
															$value1 = $this->CommonFunctionForQcodeFetch($value1,$requestDetails["year"],$requestDetails["schoolCode"],"FoundChapterId",$ExplodeMisconceptionCheckArr,$connid);
															if($value1!="")
															{
																$perfromanceArryForQcode[$value1] = $this->copyquestionperformancecount($value1,$connid);
															}
														########Added Here #########	
														}
														########Added Here #########		
														
													}
														
													asort($perfromanceArryForQcode);														
													$qcode_midd = $this->getMiddleCopyQuestionPerformance($perfromanceArryForQcode,$connid);
													$qcodeArrSelected[$qcode_midd] = $qcode_midd;
														
												}
 												
											
										}
										
										$qcodeArrSelected = array_filter($qcodeArrSelected);
										$qcode_list_past = implode(",",$qcodeArrSelected);										
										$referencePapercode = $this->referencePaperCodeSelect($id_selected,$connid);
										$reportingDetailsArr = $this->getReportingDetailsPastForNewCombination($referencePapercode,$qcode_list_past,$connid,$count_for_reporting_head,$keyChapterFetch,$valueChapterFetch);
										
										#Questions  � use the same questions as in the past test if the questions not used by that school in last year and this year so far. If used, use the copy of that question. If no copy present, use the original as a repeat question
							
										
										$finalReportingArr = $this->SelectionOfQccodes($reportingDetailsArr,$requestDetails["year"],$requestDetails["schoolCode"],"FoundChapterId",$papercode,$connid,$keyChapterFetch);
										
									}
								}
							}
							#�	No:
							else 
							{
									$qcode_list_past = "";
									$qcode_list_past = $arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"];
									$referencePapercode = $this->referencePaperCodeSelect($id_selected,$connid);
									$reportingDetailsArr = $this->getReportingDetailsPastForNewCombination($referencePapercode,$qcode_list_past,$connid,$count_for_reporting_head,$keyChapterFetch,$valueChapterFetch);
						
									
									#Questions  � use the same questions as in the past test if the questions not used by that school in last year and this year so far. If used, use the copy of that question. If no copy present, use the original as a repeat question
						
									
									$finalReportingArr = $this->SelectionOfQccodes($reportingDetailsArr,$requestDetails["year"],$requestDetails["schoolCode"],"FoundChapterId",$papercode,$connid,$keyChapterFetch);
									
							}
						
						#checking related to update or insert reporting head
						if(in_array($id_selected,$arrForRequestIDchoosen))
						{
							#RH  � Use the same reporting heads as in the past test paper(Update of the latest request id that we are auto assembling)
							$this->UpdateReportingHeadForNewRequestNewCombination($finalReportingArr,"Repeat",$connid);
							$arrForRequestIDchoosen[$id_selected] = $id_selected;
						}
						else 
						{
							#RH  � Use the same reporting heads as in the past test paper(Update of the latest request id that we are auto assembling)
							$this->UpdateReportingHeadForNewRequestNewCombination($finalReportingArr,"NoRepeat",$connid);
							$arrForRequestIDchoosen[$id_selected] = $id_selected;
							
						}
						$tempfinalArrForTableChapterWiseFetch = array();
						$tempfinalArrForTableChapterWiseFetch = $this->FetchAllFinalTableSetArrayForQuestionSummaryTable($keyChapterFetch,$valueChapterFetch,$connid);
						foreach($tempfinalArrForTableChapterWiseFetch as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
						{		
							########Added For Direct,Related And Not Q Direct Related######
							$direct_list_arr = array();
							$related_list_arr = array();
							$no_related_list_arr = array();
							
                            // New Process Based on oldest date
						
							if($arrGetDataRelatedToQuestionsIneachRequesrId[$id_selected][$id_selected]["qcode_list"]!="")
							{	
								$valueArrForTableChapterWise["Unique"] = $valueArrForTableChapterWise["Unique"];
								$valueArrForTableChapterWise["Copies"] = $valueArrForTableChapterWise["Copies"];
								$valueArrForTableChapterWise["No_copies"] = $valueArrForTableChapterWise["No_copies"];
								$valueArrForTableChapterWise["unique_qcode_list"] =$valueArrForTableChapterWise["unique_qcode_list"];
								$valueArrForTableChapterWise["copies_qcode_list"] = $valueArrForTableChapterWise["copies_qcode_list"];
								$valueArrForTableChapterWise["no_copies_qcode_list"] = $valueArrForTableChapterWise["no_copies_qcode_list"];
							}
							###########################################	
							
							$finalArrForTableChapterWise[$keyChapterFetch]["qs_selected"] = $valueArrForTableChapterWise["qs_selected"];
							$finalArrForTableChapterWise[$keyChapterFetch]["Unique"] =  $valueArrForTableChapterWise["Unique"];
							$finalArrForTableChapterWise[$keyChapterFetch]["Copies"] =  $valueArrForTableChapterWise["Copies"];
							$finalArrForTableChapterWise[$keyChapterFetch]["No_copies"] =  $valueArrForTableChapterWise["No_copies"];
							$finalArrForTableChapterWise[$keyChapterFetch]["No_Mc_Copy_qcode"] = $valueArrForTableChapterWise["No_MC_copies"];
							$finalArrForTableChapterWise[$keyChapterFetch]["IPSMismatch_qcode"] = $valueArrForTableChapterWise["IPSMismatch_qcode"];
							$finalArrForTableChapterWise[$keyChapterFetch]["unique_qcode_list"] =  $valueArrForTableChapterWise["unique_qcode_list"];
							$finalArrForTableChapterWise[$keyChapterFetch]["copies_qcode_list"] = $valueArrForTableChapterWise["copies_qcode_list"];
							$finalArrForTableChapterWise[$keyChapterFetch]["no_copies_qcode_list"] = $valueArrForTableChapterWise["no_copies_qcode_list"];
							$finalArrForTableChapterWise[$keyChapterFetch]["final_all_qcode_list"] = $valueArrForTableChapterWise["final_all_qcode_list"];
							$finalArrForTableChapterWise[$keyChapterFetch]["No_Mc_Copy_qcode_list"] = $valueArrForTableChapterWise["no_mc_copies_qcode_list"];
							$finalArrForTableChapterWise[$keyChapterFetch]["IPSMismatch_qcode_list"] = $valueArrForTableChapterWise["IPSMismatch_qcode_list"];
							$finalArrForTableChapterWise[$keyChapterFetch]["unapproved_image_qcode"] = $valueArrForTableChapterWise["unapproved_image_qcode"];
							$finalArrForTableChapterWise[$keyChapterFetch]["unapproved_image_qcode_list"] = $valueArrForTableChapterWise["unapproved_image_qcode_list"];
							$finalArrForTableChapterWise[$keyChapterFetch]["type"] = "Auto";
						}
					}
					#o	No 
					else {
						$finalArrForTableChapterWise[$keyChapterFetch]["requested_before"] = "N";
						$finalArrForTableChapterWise[$keyChapterFetch]["requested_by_sameschool"] = "N";
						$finalArrForTableChapterWise[$keyChapterFetch]["best_fit_past_rid"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["teacher_comment"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["past_count"] = 0;
						$finalArrForTableChapterWise[$keyChapterFetch]["qs_selected"] = "0/".$valueChapterFetch;
						$finalArrForTableChapterWise[$keyChapterFetch]["Unique"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["Copies"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["No_copies"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["No_Mc_Copy_qcode"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["IPSMismatch_qcode"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["unique_qcode_list"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["copies_qcode_list"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["no_copies_qcode_list"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["No_Mc_Copy_qcode_list"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["IPSMismatch_qcode_list"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["final_all_qcode_list"] = "";
						$finalArrForTableChapterWise[$keyChapterFetch]["type"] = "Auto";		
					}
					
					#######################For same chapter sst repeat issue take care##################
					if($finalArrForTableChapterWise[$keyChapterFetch]["final_all_qcode_list"] != "")
					{
						$arrGetThisQcodes = array();
						$arrGetThisQcodes = explode(",",$finalArrForTableChapterWise[$keyChapterFetch]["final_all_qcode_list"]);
						foreach($arrGetThisQcodes as $keyGetThisQcode => $valueGetThisQcode)
						{
							$arrAllQcodesSet[] = $valueGetThisQcode;
							$this->globalcheckQcodeArray[$valueGetThisQcode] = $valueGetThisQcode;
						}	
					}	
					#######################For same chapter sst repeat issue take care##################
				}
				
				#update reporting order
				$updateCounter = 1;
				$querySelectReportingOrder = "SELECT * from da_reportingDetails where papercode = '$papercode'";
				$dbquerySelectReportingOrder = new dbquery($querySelectReportingOrder,$connid);				
				 while($rowSelectReportingOrder = $dbquerySelectReportingOrder->getrowarray()){
				 	
				 	$queryUpdateReportingOrder = "UPDATE da_reportingDetails set reporting_order = '$updateCounter' where reporting_id = '".$rowSelectReportingOrder['reporting_id']."'";
				 	$dbqueryUpdateReportingOrder = new dbquery($queryUpdateReportingOrder,$connid);	
				 	$updateCounter++;
				 }
				
				$this->UpdateTestRequestDetails($FlagForoAutoAssembledMode,$connid);					
				
				$finalArrForTableChapterWise = $this->UpdateChapterDetailsTable($finalArrForTableChapterWise,$connid);
				
				#For Test Name Update in test request
				$test_name = "";
				$arrCheckNames = array();
				if($this->request_type ==='RV') {
					$test_name = 'Revision';
				} else {
					foreach($finalArrForTableChapterWise as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
					{
						$queryChapterName = "SELECT chapter_name from da_chapterMaster where chapter_id = '".$valueArrForTableChapterWise["chapter_id"]."'";
						$dbqueryChapterName = new dbquery($queryChapterName,$connid);
						while($rowChapterName = $dbqueryChapterName->getrowarray())
						{
							$chapter_name = "";						
							if(!in_array($rowChapterName["chapter_name"],$arrCheckNames)){
								$chapter_name = $rowChapterName["chapter_name"];
								$arrCheckNames[] = $chapter_name;
							}						
						}
						if($chapter_name!="")
						{
							$test_name .= $chapter_name."; "; 
						}	
					}				
					$test_name = substr_replace($test_name,"",-2);
					$test_name = common_junk_replace($test_name);
				}	
				$updateQuery = "UPDATE da_testRequest set testName = '".addslashes($test_name)."' where id = '$this->test_requestid'";
				$dbUpdateQuery = new dbquery($updateQuery,$connid);
												
				########To Check Questions Selected Or Not#######
				$checkFlagSetForList = $this->checkQuestionSelectedFlag($this->test_requestid,$connid);
				#####################				
				
				## PROCESS FOR AUTO REPORT AND AUTO APPROVAL CONDICTION CHECKING
				$this->CheckAutoApproveConditions($this->test_requestid,$connid);
				########################Checking For revision chapters##########################
				if($requestDetails["request_type"]=="RV")
				{
					if($type_chapter=="Manual"){
						$this->changeForRevisionTest($connid);
					}
					else if($type_chapter == "Semi-Auto"){
						$up_query = "UPDATE da_testRequest SET flag = '".$type_chapter."' WHERE id = '".$this->test_requestid."'";
						$up_dbqry = new dbquery($up_query,$connid);
					}
				}
				########################Checking For revision chapters##########################
				
				if(isset($this->changeBalanceChapter) && count($this->changeBalanceChapter)>0)
				{
					echo "<script>window.opener.location.href=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\";self.close();</script>";					
				}
				else 
				{
					if($this->flagset==0)
					{						
					echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";					
					exit;
					}
				}
			}
			
		}
	}

	##########For Final Qcode List For Same Request Same School and Different School
	function getFinalQcodeList($reportingDetailsArr,$connid)
	{
		$qcode_list = "";
		foreach($reportingDetailsArr as $keyDetailArr => $valueDetailArr)
		{
			if($valueDetailArr["qcode_list"]!="")
			{
				$qcode_list .= $valueDetailArr["qcode_list"].",";
			}
		}	
		$qcode_list = substr_replace($qcode_list,"",-1);
		return $qcode_list;				
	}	
	##########For Final Qcode List For Same Request Same School and Different School
	
	##########For Count Of Misconception Question#################
	function setSelectMisconceptionCount($arrChaptersFetch,$connid)
	{		
		$forchapteruniqueset = 0;
		$countChapter = 0;
		$countChapter = count($arrChaptersFetch);	
		if($countChapter == 1)
		{
			$forchapteruniqueset = 5;
		}
		else if($countChapter == 2)
		{
			$forchapteruniqueset = 2;
		}
		else if($countChapter == 3)
		{
			$forchapteruniqueset = 2;
		}
		else if($countChapter > 3)
		{
			$forchapteruniqueset = 1;
		}
		foreach($arrChaptersFetch as $keyCF => $valueCF)
		{
			$this->chpaterMCArray[$keyCF] = $forchapteruniqueset;
		}
		
	}
	##########For Count Of Misconception Question#################
	
	##########Added To check Flag if qcode list is blank #############
	function checkQuestionSelectedFlag($test_requestid,$connid)
	{
		$paper_code = "";
		$qcode_list = "";
		$query = "SELECT paper_code FROM da_testRequest WHERE id = '$test_requestid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
        {
            $paper_code = $row["paper_code"];				
        }
			
		$queryQuestionList = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '$paper_code'";
		$dbqueryQuestionList = new dbquery($queryQuestionList,$connid);
		while($rowQuestionList = $dbqueryQuestionList->getrowarray())
        {
            $qcode_list = $rowQuestionList["qcode_list"];
        }
		
		if($qcode_list=='')
		{
			$queryUpdateTestRequest = "UPDATE da_testRequest set flag='Manual',auto_type='0' WHERE id = '$test_requestid'";
			$dbqueryUpdateTestRequest = new dbquery($queryUpdateTestRequest,$connid);
			
			$queryDeleteQuestionSelectionSummary = "DELETE FROM da_questionSelectionSummary WHERE request_id = '$test_requestid' AND type = 'Auto'";
			$dbqueryDeleteQuestionSelectionSummary = new dbquery($queryDeleteQuestionSelectionSummary,$connid);			
		}	
		
		return "";			
	}
	####################################################################
	
	function selectBestFitSST($sstQcodeCount,$valueChapterFetch,$connid,$subno)
	{
		$counter = 0;
		$countSST = array();
		$finalFetchSST = array();
		$performanceUsageInSST = array();
		foreach($sstQcodeCount as $keyQcodeCount => $valueQcodeCount)
		{
			$countSST[$valueQcodeCount]["count"] = $countSST[$valueQcodeCount]["count"] + 1;
			$countSST[$valueQcodeCount]["sst_list"] .= $keyQcodeCount.",";
		}		
		
		$flagforsecondcriteria = 0;
		foreach($countSST as $keySST => $valueSST)
		{
			if($valueSST["count"]>1) { $flagforsecondcriteria = 1; }
			$countSST[$keySST]["sst_list"] = substr_replace($countSST[$keySST]["sst_list"],"",-1);
		}
		
		if($flagforsecondcriteria == 1)
		{
			$performanceUsageInSSTNew = array();
			foreach($countSST as $keySST => $valueSST)
			{
				$sstQcodeCountArr = explode(",",$valueSST["sst_list"]);
				$sstQcodeCountArrNew = array();
				foreach($sstQcodeCountArr as $keysstQcodeCountArr => $valuesstQcodeCountArr)
				{
					$sstQcodeCountArrNew[$valuesstQcodeCountArr] = $valuesstQcodeCountArr;
				}
				$performanceUsageInSST = $this->countPerformanseOfSSTusageVersion2($sstQcodeCountArrNew,$connid,$subno);
				arsort($performanceUsageInSST);
				
				foreach($performanceUsageInSST as $keyUsageInSST => $valueUsageInSST)
				{
					$performanceUsageInSSTNew[$keyUsageInSST] = $valueUsageInSST;
				}
				
			}				
				
			foreach($performanceUsageInSSTNew as $keyPerformanceUsageInSST => $valuePerformanceUsageInSST)
				{
					if($counter == $valueChapterFetch)
					{
						break;
					}
					else 
					{
						$counter++;
						$finalFetchSST[$keyPerformanceUsageInSST] = $keyPerformanceUsageInSST; 
					}	 
				}
		}
		else 
		{
			foreach($sstQcodeCount as $keyQcodeCountFetch => $valueQcodeCountFetch)
			{
				if($counter == $valueChapterFetch)
				{
					break;
				}
				else 
				{
					$counter++;
					$finalFetchSST[$keyQcodeCountFetch] = $keyQcodeCountFetch; 
				}	 
			}
		}		
		
		return $finalFetchSST;
	}
	
	function countPerformanseOfSSTusageVersion2($arrSSTUsage,$connid,$subno)
	{
		$arrSSTUsageArr = array();
		foreach($arrSSTUsage as $key=>$row)
		{
		$query = "SELECT (count( DISTINCT (
				  a.paper_code
				  ) ) ) AS usage_count 
				  FROM da_testRequest a, da_reportingDetails c
				  WHERE a.paper_code = c.papercode
				  AND a.status = 'Approved' and a.subject = $subno
				  AND FIND_IN_SET( '$key', c.sst_list ) AND a.class = '$this->class'";
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray(); 
		$arrSSTUsageArr[$key] = $result["usage_count"];
		}
		return $arrSSTUsageArr;
	}
	
	function GroupBySSTQcodes($qcode_list_past_all,$connid)
	{
		$QuestionArr = explode(",",$qcode_list_past_all);
		$sstWiseArr = array();
		$sstQcountArr = array();
		$sstQcountRatio = array();
		foreach($QuestionArr as $keyQuestionArr => $valueQuestionArr)
		{
			$query = "SELECT sub_subtopic_code from da_questions where qcode = '$valueQuestionArr'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
				{
					$sstWiseArr[$row["sub_subtopic_code"]][$valueQuestionArr] = $valueQuestionArr;
				}	
		}
		return $sstWiseArr;
	}	
	
	
	function FindTeacherComment($id_selected,$connid)
	{
		$teacher_comment_flag = "N";
		$query = "SELECT teacher_comments from da_testRequest where id = '$id_selected'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				if($row["teacher_comments"]!="")
				{	
					$teacher_comment_flag = "Y";
				}	
			}
		return $teacher_comment_flag;	
	}
	
	function getMisconceptionQcodeArray($qcode_list,$connid)
	{
		$qcode_list_set = "";
		$qcodeArr = array();
		$query_misq = "SELECT qcode from da_questions where misconception = 1 AND qcode IN($qcode_list)";
		$dbquery = new dbquery($query_misq,$connid);
		while($row = $dbquery->getrowarray())
			{
				$qcodeArr[$row["qcode"]] = $row["qcode"];
			}	
		$qcode_list_set = implode(",",$qcodeArr);
		return $qcode_list_set;
	}
	
	#########Added For Misconception Wise sort SST 14/06/2012 ########################
	function sortByMaxMisconception($sstWiseArrForFetch,$connid)
	{		
		$newsstWiseArrForFetch = array();
		$arrCountMisconception = array();
		foreach($sstWiseArrForFetch as $key=>$value)
		{
			$arrCountMisconception[$key] = 0;
			foreach($value as $key1 => $value1)
			{
				$queryCheckMisconception = "SELECT misconception FROM da_questions WHERE qcode IN($value1)";
				$dbquery = new dbquery($queryCheckMisconception,$connid);
				while($row = $dbquery->getrowarray())
					{
						if($row["misconception"]==1)
						{
							$arrCountMisconception[$key] = $arrCountMisconception[$key]+1;
						}
					}				
			}
		}
		arsort($arrCountMisconception);

		foreach($arrCountMisconception as $keyMC => $valueMC)
		{
			foreach($sstWiseArrForFetch[$keyMC] as $fetchkey => $valuekey)
			{
				$newsstWiseArrForFetch[$keyMC][$valuekey] = $valuekey;
			}
		}
		
		return $newsstWiseArrForFetch;
	}
	#########Added For Misconception Wise sort SST 14/06/2012 ########################
	
	function fetchFinalQcodeListForMoreQcode($qcode_list_past_all,$valueChapterFetch,$connid,$year="",$schoolCode="",$keyChapterFetch="")
	{
		$QuestionArr = explode(",",$qcode_list_past_all);
		$sstWiseArr = array();
		$sstWiseArrForFetch = array(); 
		$sstQcountArr = array();
		$sstQcountRatio = array();
		foreach($QuestionArr as $keyQuestionArr => $valueQuestionArr)
		{
			$query = "SELECT sub_subtopic_code from da_questions where qcode = '$valueQuestionArr'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
				{
					$sstWiseArrForFetch[$row["sub_subtopic_code"]][$valueQuestionArr] = $valueQuestionArr;
				}	
		}
		
		$sstWiseArr = $this->sortByMaxMisconception($sstWiseArrForFetch,$connid); 		
		
		$totalcount = 0;
		foreach($sstWiseArr as $key=>$value)
		{
			$count = 0;
			foreach($value as $key1 => $value1)
			{
				$count = $count + 1;
			}
			$sstQcountArr[$key] = $count;
			$totalcount = $totalcount + $count; 
		}		
		
		foreach($sstQcountArr as $keyQcountArr => $valueQcountArr)
		{
			$sstQcountRatio[$keyQcountArr] = ($valueQcountArr/$totalcount)*$valueChapterFetch;
			if((($valueQcountArr/$totalcount)*$valueChapterFetch)<1)
			{
				$sstQcountRatio[$keyQcountArr] = 1;
			}
		}		
		
				$maxchapterval = "";
				$fractionSet = array();
				$calCount = 0;
				foreach($sstQcountRatio as $keyQcountRatio => $valueQcountRatio)
				{
					$valueForRound = round($valueQcountRatio,2);
					$errSplitBaseNumerator = explode(".",$valueForRound); 
					$fetchfrac = $errSplitBaseNumerator[1];
					if($fetchfrac != 0)
					{ 
						$fractionSet[$keyQcountRatio] = $fetchfrac; 
					}
					$sstQcountRatio[$keyQcountRatio] = 	round($valueQcountRatio);
					$calCount = $calCount + round($valueQcountRatio);
				}				
			
				$maxchapterval = array_keys($sstQcountRatio, max($sstQcountRatio));			
			
					$countFracTotal = 0;
					foreach($fractionSet as $keyfrac => $valuefrac)
					{
						$countFracTotal = $countFracTotal + $valuefrac;
					}
					$countFracTotal = ($countFracTotal/100);
				

			//	if($countFracTotal>0.5 && ($calCount<$valueChapterFetch))
				{					
			//		$sstQcountRatio[$maxchapterval[0]] = $sstQcountRatio[$maxchapterval[0]] + 1;
				}
				
				$qcode_list_final_sst_wise = $this->fetchQuestionsBasedOnSSTRatio($sstWiseArr,$sstQcountRatio,$connid,$year,$schoolCode,$keyChapterFetch);
				return $qcode_list_final_sst_wise;
				
	}
	
	function fetchTeacherComments($best_fit_past_test_id,$connid)
	{
		$teacher_comments = "";
		$query = "SELECT teacher_comments from da_testRequest where id = '$best_fit_past_test_id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$teacher_comments = $row["teacher_comments"];
			}
		return $teacher_comments;
	}
	
	########For Pure Normal Question Fetch ###################
	function fetchPureNormalQuestionCount($qcode_list_check_misconception_qlist,$connid)
	{
		$counter = 0;
		if($qcode_list_check_misconception_qlist!="")
		{
			$query = "SELECT count(qcode) as counter_set FROM da_questions WHERE qcode IN($qcode_list_check_misconception_qlist) AND misconception = 0";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
				{
					$counter = $row["counter_set"];
				}
		}		
		return $counter;	
	}
	########For Pure Normal Question Fetch ###################
	
	#######For Checking Available Question is Misconception Or Not ############
	function checkMisconceptionQuestion($keyFetchUsage,$connid)
	{
		$counter = 0;
		$query = "SELECT count(qcode) as counter_set FROM da_questions WHERE qcode IN($keyFetchUsage) AND misconception = 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$counter = $row["counter_set"];
			}
		return $counter;
	}
	#######For Checking Available Question is Misconception Or Not ############
	
	function fetchQuestionsBasedOnSSTRatio($sstWiseArr,$sstQcountRatio,$connid,$year="",$schoolCode="",$keyChapterFetch="")
	{		
		$ExplodeMisconceptionCheck = array();
		
		
		foreach($sstWiseArr as $keyMisconceptionCheck => $valueMisconceptionCheck)
		{
			foreach($valueMisconceptionCheck as $keyQcodeArrMc => $valueQcodArrMc)
			{
				$ExplodeMisconceptionCheck[] = $valueQcodArrMc;
			}	
		}	
		
		$qcodeFetchedSSTwise = array();
		foreach($sstQcountRatio as $keyQcountRatio => $valueQcountRatio)
		{
			$countselectedqcode = 0;
			$questionArrUsage = array();
			$commonUsageArr = array();
			foreach($sstWiseArr[$keyQcountRatio] as $keyWiseArr => $valueWiseArr)
			{
				$questionArrUsage[$keyWiseArr] = $this->questionusedbeforeSSTMapped($keyWiseArr,$connid);
				$commonUsageArr[$questionArrUsage[$keyWiseArr]] = $questionArrUsage[$keyWiseArr];
			}
				
				arsort($commonUsageArr);
				
			$checkup = 0;	
			#misconception selection			
			if($this->chpaterMCArray[$keyChapterFetch]!=0)
			{
				foreach($questionArrUsage as $keyArrUsage => $valuArrUsage)
				{
					if($countselectedqcode==$valueQcountRatio)
					{
						break;
					}
					else 
					{
						$misconception = $this->selectMisaconceptionQcode($keyArrUsage,$connid);
						$qcodemisconception = "";
						if($misconception==1)
						{
							$qcodemisconception = $this->CommonFunctionForQcodeFetch($keyArrUsage,$year,$schoolCode,"FoundChapterId",$ExplodeMisconceptionCheck,$connid);
							
							if($qcodemisconception!="")
							{
								$qcodeFetchedSSTwise[$keyArrUsage] = $qcodemisconception;
								$countselectedqcode++;
								unset($sstWiseArr[$keyQcountRatio][$keyArrUsage]);
								unset($questionArrUsage[$keyArrUsage]);								
								$this->chpaterMCArray[$keyChapterFetch] = $this->chpaterMCArray[$keyChapterFetch]-1;
								$checkup = 1;
								break;
							}	
						}	
					}
				}
			}			
					
			$countDiff = $valueQcountRatio-$countselectedqcode;
						
			$totalcountformccalculate = 0;
			$countavailablenormalquestion = 0;
			$misconception_select_flag = 0;
			$totalcountformccalculate = count($questionArrUsage);			
			$qcode_list_check_misconception_qlist = implode(",",array_keys($questionArrUsage));
			$countavailablenormalquestion = $this->fetchPureNormalQuestionCount($qcode_list_check_misconception_qlist,$connid);
			if($countDiff <= $countavailablenormalquestion)
			{
				$misconception_select_flag = 1;
			}					
			
			#misconception selection if required more questions
			$pendingCount = 0;
			if($countDiff>0)
			{				
				#For loop based on usage find question which have usage found
				foreach($commonUsageArr as $keyCommonUsageArr => $valuCommonUsageArr)
				{
					$selectPendingQuest = array();
					foreach($questionArrUsage as $keyFetchUsage => $valueFetchUsage)
					{
						if($valuCommonUsageArr == $valueFetchUsage)
						{
							$checkFlagMisconception = 0;
							if($misconception_select_flag==1)
							{
								$checkFlagMisconception = $this->checkMisconceptionQuestion($keyFetchUsage,$connid);
								if($checkFlagMisconception==0)
								{
									$selectPendingQuest[$keyFetchUsage] = $keyFetchUsage;
								}
							}
							else 
							{
								$selectPendingQuest[$keyFetchUsage] = $keyFetchUsage;
							}	
						}
					}
					
					#if more than one qcode have same usage
					if(isset($selectPendingQuest) && count($selectPendingQuest)>1)
					{
						$performanceArray = array();
						foreach($selectPendingQuest as $keyPendingQuest=>$valuePendingQuest)
						{
							$performanceArray[$valuePendingQuest] = $this->copyquestionperformancecount($valuePendingQuest,$connid);
						}						
					
						arsort($performanceArray);
						foreach($performanceArray as $keyperformanceArray => $valueperformanceArray)
						{
							if($countDiff > 0)
							{										
									$qcodeFetchedSSTwise[$keyperformanceArray] = $keyperformanceArray;
									$countselectedqcode++;
									$countDiff = $valueQcountRatio-$countselectedqcode;
							}
							else 
							{
								break;
							}
						}
						
					}
					#if single qcode have usage
					else 
					{
						if($countDiff > 0)
						{							
							foreach($selectPendingQuest as $keyQcodeLink => $valueQcodeLink)
							{
								$qcodeFetchedSSTwise[$keyQcodeLink] = $keyQcodeLink;
								$countselectedqcode++;
								$countDiff = $valueQcountRatio-$countselectedqcode;
							}	
						}
						else 
						{
							break;
							
						}
					}
				}
			}
			
		}
			
			$qcode_list_return = "";
			$qcodeFetchedSSTwise = array_filter($qcodeFetchedSSTwise);
			$qcode_list_return = implode(",",$qcodeFetchedSSTwise);
			return $qcode_list_return;
	}
	
	function selectMisaconceptionQcode($qcodeMisconception,$connid)
	{
		$misconceptionflag = 0;
		$query = "SELECT misconception from da_questions where qcode = '$qcodeMisconception'";
		$dbquery = new dbquery($query,$connid);
		 	while($row = $dbquery->getrowarray()){
		 		$misconceptionflag = $row["misconception"];
		 	}
		 return $misconceptionflag;	
	}
	
	function questionusedbeforeSSTMapped($qcode,$connid){
		$countSetForSameQuestionsUsed = 0;
		$query = "SELECT count(*) as questionusedcount from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND FIND_IN_SET($qcode,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.type = 'actual' AND class = '$this->class'";
			$dbquery = new dbquery($query,$connid);
		 	while($row = $dbquery->getrowarray()){
		 		$countSetForSameQuestionsUsed = $row["questionusedcount"];
		 	}
		 	return $countSetForSameQuestionsUsed;
	}
	
	
	function getSchoolCodeRID($id,$connid)
	{
		$schoolCode = "";
		$query = "SELECT schoolCode from da_testRequest where id = '$id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$schoolCode = $row["schoolCode"];
			}
		return $schoolCode;	
	}
	
	function UpdateReportingHeadForNewRequestNewCombination($finalReportingArr,$flagset,$connid)
	{
		$qcodePaperList = "";
		$paperCode = "";
		$requestIdCureent = array();
		$reportingDetailsArr = array();
		if($flagset=="Repeat")
		{
			$CurrentPapercode = $this->referencePaperCodeSelect($this->test_requestid,$connid);
			$reportingDetailsArr = $this->getReportingDetailsPast($CurrentPapercode,$connid);			
			foreach($finalReportingArr as $keyFinalReporting=>$valueFinalReporting)
			{
				if($valueFinalReporting["qcode_list"]!="")
				{	
					$reporting_keyid = "";
					$qcode_keylist = "";
					$sst_keylist = "";
					$required_keyques = 0;
					$flag_for_repeat = 0;
					foreach($reportingDetailsArr as $keyDetailArr => $valueDetailArr)
					{
						if($valueDetailArr["reporting_head"]==$valueFinalReporting["reporting_head"])
						{
							$flag_for_repeat = 1;
							$reporting_keyid = $valueDetailArr["reporting_id"];
							$qcode_keylist = $valueDetailArr["qcode_list"].",".$valueFinalReporting["qcode_list"];
							$sst_keylist = $valueDetailArr["sst_list"].",".$valueFinalReporting["sst_list"];
							$required_keyques = $valueDetailArr["required_ques"]+$valueFinalReporting["required_ques"];
						}
					}
					if($flag_for_repeat == 1)
					{
						$paperCode = $valueFinalReporting["papercode"];
						$query = 'UPDATE da_reportingDetails set sst_list="'.$sst_keylist.'", qcode_list="'.$qcode_keylist.'", required_ques="'.$required_keyques.'", entered_dt=curdate(), entered_by="'.$_SESSION["username"].'" WHERE reporting_id = "'.$reporting_keyid.'"';
						$dbquery = new dbquery($query,$connid);
						if($valueFinalReporting["qcode_list"]!="")
						{
							$qcodePaperList = $qcodePaperList.$valueFinalReporting["qcode_list"].",";
						}	
					}
					else 
					{
						$paperCode = $valueFinalReporting["papercode"];
						$query = 'INSERT INTO da_reportingDetails set papercode = "'.$valueFinalReporting["papercode"].'", reporting_level="'.$valueFinalReporting["reporting_level"].'", sst_list="'.$valueFinalReporting["sst_list"].'", qcode_list="'.$valueFinalReporting["qcode_list"].'", required_ques="'.$valueFinalReporting["required_ques"].'", reporting_head="'.$valueFinalReporting["reporting_head"].'", reporting_order="'.$valueFinalReporting["reporting_order"].'", entered_dt=curdate(), entered_by="'.$_SESSION["username"].'"';
						$dbquery = new dbquery($query,$connid);
						if($valueFinalReporting["qcode_list"]!="")
						{
							$qcodePaperList = $qcodePaperList.$valueFinalReporting["qcode_list"].",";
						}	
					}
				}	
			}
		}
		else
		{
			foreach($finalReportingArr as $keyFinalReporting=>$valueFinalReporting)
			{
				if($valueFinalReporting["qcode_list"]!="")
				{
					$paperCode = $valueFinalReporting["papercode"];
					$query = 'INSERT INTO da_reportingDetails set papercode = "'.$valueFinalReporting["papercode"].'", reporting_level="'.$valueFinalReporting["reporting_level"].'", sst_list="'.$valueFinalReporting["sst_list"].'", qcode_list="'.$valueFinalReporting["qcode_list"].'", required_ques="'.$valueFinalReporting["required_ques"].'", reporting_head="'.$valueFinalReporting["reporting_head"].'", reporting_order="'.$valueFinalReporting["reporting_order"].'", entered_dt=curdate(), entered_by="'.$_SESSION["username"].'"';
					$dbquery = new dbquery($query,$connid);
					if($valueFinalReporting["qcode_list"]!="")
					{
						$qcodePaperList = $qcodePaperList.$valueFinalReporting["qcode_list"].",";
					}	
				}
			}
		}
		$qcodePaperFinalList = "";
		if($qcodePaperList!='')#This will update paperdetails in the table with qcode list
		{
			$queryFetchQcodeListForUpdate = "SELECT qcode_list from da_reportingDetails where papercode = '$paperCode'";
			$dbqueryFetchQcodeListForUpdate = new dbquery($queryFetchQcodeListForUpdate,$connid);
			while($rowFetchQcodeListForUpdate = $dbqueryFetchQcodeListForUpdate->getrowarray())
			{
				if($rowFetchQcodeListForUpdate["qcode_list"]!="")
				{
					$qcodePaperFinalList .= $rowFetchQcodeListForUpdate["qcode_list"].",";
				}	
			}
			$qcodePaperFinalList = substr_replace($qcodePaperFinalList,"",-1);
			$qcodePaperList = substr_replace($qcodePaperList,"",-1);
			$queryPaper = "UPDATE da_paperDetails set qcode_list='".$qcodePaperFinalList."',lastModifiedBy='".$_SESSION["username"]."' WHERE papercode = '".$paperCode."' AND version = '1'";
			$dbqueryPaper = new dbquery($queryPaper,$connid);

			#inserting in temp autoassembly table so it won't repeat quesions while assembling and we need to delete this entry @ the timeof approval.
			$in_query = "INSERT INTO da_autoAssemblyQues (schoolCode,class,subject,request_id,qcode_list,insert_dt) VALUES
						 ('".$this->schoolCode."','".$this->class."','".$this->subjectno."','".$this->test_requestid."','".$qcodePaperList."',NOW())";							 
			
			$in_dbqry = new dbquery($in_query,$connid);	
		
		}	
	}
	
	function getReportingDetailsPastForNewCombination($referencePapercode,$qcode_list_past,$connid,$count_for_reporting_head="",$chapter_id="",$required_questions="") /***************For fetching all data regarding past reporting heads.********************/
	{
		$globalArrForCheck = array();
		$quesNeeded = 0;
		$diffReportingCount= 0 ;
		
		if($qcode_list_past!='')
		{
			$explodeQcodeArr = explode(",",$qcode_list_past);		
			
			$explodeQcodeArr = array_filter($explodeQcodeArr);
			$qcode_list_past = implode(",",$explodeQcodeArr);
			
			$arrCopyQuestions = array();
			$queryParent = "SELECT qcode,parent_qcode FROM da_questions WHERE qcode IN($qcode_list_past)";
			$dbqueryParent = new dbquery($queryParent,$connid);
			while($rowParent = $dbqueryParent->getrowarray()){
				if($rowParent["parent_qcode"]!=0)
				{
				 	$arrCopyQuestions[$rowParent["qcode"]] = $rowParent["parent_qcode"];				 	
				}
			}
		}		
		$arrRet = array();
		#for less than 4 chapters.
		if($count_for_reporting_head<4)
		{
			$query = "SELECT reporting_id,reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order FROM da_reportingDetails WHERE papercode='$referencePapercode' ORDER BY reporting_order";
			 $dbquery = new dbquery($query,$connid);
			 while($row = $dbquery->getrowarray()){
			 	$countQcodeListPast = 0;
			 	$explodeQcodeListPast = explode(",",$row["qcode_list"]);				 			 	
			 	$sst_set_list = "";
			 	$question_set_list = "";
			 	$sst_set_list_Arr = array();
			 	
			 	foreach($explodeQcodeListPast as $keyQcodeListPast => $valueQcodeListPast)
			 	{			 		
			 		$qcode_take = "";
			 		if((in_array($valueQcodeListPast,$explodeQcodeArr)) || (in_array($valueQcodeListPast,$arrCopyQuestions)))
			 		{
			 			if(in_array($valueQcodeListPast,$explodeQcodeArr))
			 			{
			 				if(in_array($valueQcodeListPast,$globalArrForCheck))
			 				{
			 					
			 				}	
			 				else 
			 				{
				 				$globalArrForCheck[] = $valueQcodeListPast;
				 				$qcode_take = $valueQcodeListPast;
			 				}	
			 			}
			 			else 
			 			{
			 				foreach($arrCopyQuestions as $keyCopyQuestion => $valueCopyQuestion)
			 				{
			 					if($valueCopyQuestion == $valueQcodeListPast)
			 					{
			 						if(in_array($valueCopyQuestion,$globalArrForCheck))
			 						{
			 						}
			 						else 
			 						{	
				 						$globalArrForCheck[] = $keyCopyQuestion;
				 						$qcode_take = $keyCopyQuestion;
			 						}	
			 					}
			 				}			 				
			 			}
			 			if($qcode_take!="")
			 			{
			 				$countQcodeListPast = $countQcodeListPast + 1;
			 			}	
			 			
			 			if($qcode_take!="")
			 			{
			 				$question_set_list .= $qcode_take.",";
			 			}	
			 			if($valueQcodeListPast!="" && $qcode_take!="")
			 			{				 			
				 			$query_subsubtopic = "SELECT sub_subtopic_code from da_questions where qcode = $qcode_take";
				 			$dbquery_subsubtopic = new dbquery($query_subsubtopic,$connid);
							while($row_subsubtopic = $dbquery_subsubtopic->getrowarray()){
							 	$sst_set_list_Arr[$row_subsubtopic['sub_subtopic_code']] = $row_subsubtopic['sub_subtopic_code'];
							}
			 			}
			 		}
			 	}
			 	if(isset($sst_set_list_Arr) && count($sst_set_list_Arr)>0)
			 	{
			 		$sst_set_list = implode(",",$sst_set_list_Arr);
			 	}
			 	if($question_set_list!=""){ $question_set_list = substr_replace($question_set_list,"",-1); } 
			 				 	
			 	if($question_set_list!="")
			 	{
			 		$arrRet[$row["reporting_id"]] = array("reporting_level"=>$row["reporting_level"],
			 								    "sst_list"=>$sst_set_list,
			 								    "qcode_list"=>$question_set_list,
			 								    "required_ques"=>$countQcodeListPast,
			 								    "reporting_head"=>$row["reporting_head"],
			 								    "reporting_order"=>$row["reporting_order"]
			 								   );
			 	}							   
			 }

			 // Update required questions reporting Head wise 
			 foreach($arrRet as $keyRet => $valRet)
			 {
			 	$totalReported += $valRet["required_ques"];
			 }
					
			 if($totalReported != $required_questions)
			 {
			 	if($totalReported < $required_questions)
			 	{
			 		$diffReportingCount = $required_questions - $totalReported;

			 		while($diffReportingCount > 0)
			 		{
			 			foreach($arrRet as $keyReporting => $valueReporting)
				 		{
				 			if($diffReportingCount == 0) break;

				 			$arrRet[$keyReporting]["required_ques"] +=1;
				 			$diffReportingCount-=1;
				 		}
				 	}
			 	}
			 	 else
				 {
				 	$diffReportingCount =$totalReported - $required_questions;
				 	$sst_count = 0;
				 	// Pass 1 if each sst has a question
				 	foreach($arrRet as $keyReporting => $valueReporting)
				 	{
				 		if($diffReportingCount == 0) break;

				 		$sst_count = count(explode(",", $valueReporting["sst_list"]));
				 		
				 		if($sst_count < $valueReporting["required_ques"]) 
				 		{	
				 			$arrRet[$keyReporting]["required_ques"] -=1;
				 			$diffReportingCount-=1;
				 		}
				 	}
				 	
				 	if($diffReportingCount !=0)
				 	{
				 	
				 	// Pass 2 pass 1 failed reduce from start
				 		while($diffReportingCount > 0)
			 			{ 
						 	foreach($arrRet as $keyReporting => $valueReporting)
						 	{
						 		if($diffReportingCount == 0) break;

					 			$arrRet[$keyReporting]["required_ques"] -=1;
					 			$diffReportingCount-=1;

						 	}
						 }
					}	
				 }
			 }
			
		
		}
		#if chapter count is more than 4 
		else {
				$chapter_name = "";
				$query_chapter_name = "SELECT chapter_name from da_chapterMaster where chapter_id = '$chapter_id'";
				$dbquery_chapter_name = new dbquery($query_chapter_name,$connid);
						while($row_chapter_name = $dbquery_chapter_name->getrowarray()){
							$chapter_name = $row_chapter_name["chapter_name"];
						}
						 	
				$countQcodeListPast = 0;
			 	
			 	$sst_set_list = "";
			 	$question_set_list = "";
			 	$sst_set_list_Arr = array();
			 	foreach($explodeQcodeArr as $keyQcodeListPast => $valueQcodeListPast)
			 	{
			 		if((in_array($valueQcodeListPast,$explodeQcodeArr)) || (in_array($valueQcodeListPast,$arrCopyQuestions)))
			 		{
			 			if(in_array($valueQcodeListPast,$explodeQcodeArr))
			 			{
			 				if(in_array($valueQcodeListPast,$globalArrForCheck))
			 				{
			 					
			 				}	
			 				else 
			 				{
			 					$globalArrForCheck[] = $valueQcodeListPast;
			 					$qcode_take = $valueQcodeListPast;
			 				}	
			 			}
			 			else 
			 			{
			 				foreach($arrCopyQuestions as $keyCopyQuestion => $valueCopyQuestion)
			 				{
			 					if($valueCopyQuestion == $valueQcodeListPast)
			 					{
			 						if(in_array($valueCopyQuestion,$globalArrForCheck))
			 						{
			 						}
			 						else 
			 						{	
				 						$globalArrForCheck[] = $keyCopyQuestion;
			 							$qcode_take = $keyCopyQuestion;
			 						}	
			 					}
			 				}			 				
			 			}
			 			if($qcode_take!="")
			 			{
			 				$countQcodeListPast = $countQcodeListPast + 1;			 				
			 				$question_set_list .= $qcode_take.",";
			 			}
			 						 			
			 			if($valueQcodeListPast!="" && $qcode_take!="")
			 			{
				 			$query_subsubtopic = "SELECT sub_subtopic_code from da_questions where qcode = $qcode_take";
				 			$dbquery_subsubtopic = new dbquery($query_subsubtopic,$connid);
							while($row_subsubtopic = $dbquery_subsubtopic->getrowarray()){
							 	$sst_set_list_Arr[$row_subsubtopic['sub_subtopic_code']] = $row_subsubtopic['sub_subtopic_code'];
							}
			 			}	
			 		}
			 	}
			 	if(isset($sst_set_list_Arr) && count($sst_set_list_Arr)>0)
			 	{
			 		$sst_set_list = implode(",",$sst_set_list_Arr);
			 	}
			 	if($question_set_list!=""){ $question_set_list = substr_replace($question_set_list,"",-1); } 
			 	
			 	if($question_set_list!="")
			 	{
			 		$arrRet[$row["reporting_id"]] = array("reporting_level"=>"sst",
			 								    "sst_list"=>$sst_set_list,
			 								    "qcode_list"=>$question_set_list,
			 								    "required_ques"=>$required_questions,
			 								    "reporting_head"=>$chapter_name,
			 								    "reporting_order"=>"0"
			 								   );
			 	}							   
		 }
		
		 return $arrRet;
	}
	
	function referencePaperCodeSelect($id_selected,$connid)
	{
		$returnPaperCode = "";
		$query = "SELECT paper_code from da_testRequest where id = '$id_selected'";
		$dbqry = new dbquery($query,$connid); 
		while($result = $dbqry->getrowarray()){
			$returnPaperCode = $result["paper_code"];
		}
		return $returnPaperCode;
	}
	
	function fetchMaxQcountRequestIds($makeLeastArrayId,$arrGetDataRelatedToQuestionsIneachRequesrId,$connid)
	{
		# Choose the one with more number of questions (if chapter A needs 8 questions, you may get one with 6 i.e. X-2 and one with 10 i.e. X+2  � both have difference of 2. In this case choose the one with 10 questions (higher number).
		$maxqcount = "";
		$qcountArry = array();
		$finalRequestId = array();
		$finalRequestIdUsingPaperCode = array();
		foreach($makeLeastArrayId as $keyLeastArrayId => $valueLeastArrayId)
		{
			$qcountArry[$keyLeastArrayId] = $arrGetDataRelatedToQuestionsIneachRequesrId[$keyLeastArrayId][$keyLeastArrayId]["count"];
		}
		
		$maxqcount = max($qcountArry);
		foreach($qcountArry as $keyqcountArr => $valueqcountArr)
		{
			if($maxqcount == $valueqcountArr)
			{
				$finalRequestId[$keyqcountArr] = $valueqcountArr;
			}
		}		
		
		#If more than one, choose test with greater paper code (newer test)
		
		if(isset($finalRequestId) && count($finalRequestId)>1)
		{
			#############################For Dropped Question Process#############################
			$counter_check_for_request = 1;
			$arrMakeWithoutDroppedArr = array();
			foreach($finalRequestId as $keyLeastDroppedId => $valueLeastDroppedId)
			{
				$query_dropped_check = "SELECT dropped_questions FROM da_testRequest WHERE id = '$keyLeastDroppedId'";	
				$dbquery_dropped_check = new dbquery($query_dropped_check,$connid);
				while($row_dropped_check = $dbquery_dropped_check->getrowarray()){					
					if($row_dropped_check["dropped_questions"]=="")
					{
						$arrMakeWithoutDroppedArr[$keyLeastDroppedId] = $keyLeastDroppedId; 
					}
				}
							
			}	
			$finalRequestIdFinal = array();
			if(isset($arrMakeWithoutDroppedArr) && count($arrMakeWithoutDroppedArr)>0)
			{
				foreach($arrMakeWithoutDroppedArr as $keyMakeWithoutDroppedArr => $valueMakeWithoutDroppedArr)
				{
					$finalRequestIdFinal[$keyMakeWithoutDroppedArr] = $finalRequestId[$keyMakeWithoutDroppedArr];
				}
			}
			if(isset($finalRequestIdFinal) && count($finalRequestIdFinal)>0)
			{
				$finalRequestId = array();
				$finalRequestId = $finalRequestIdFinal;
			}			
			
			#############################For Dropped Question Process#############################
			
			$getHighestPaperCodeRid = $this->getHighestPaperCode($finalRequestId,$connid);
			$finalRequestIdUsingPaperCode[$getHighestPaperCodeRid] = $arrGetDataRelatedToQuestionsIneachRequesrId[$getHighestPaperCodeRid][$getHighestPaperCodeRid]["count"];
			return $finalRequestIdUsingPaperCode;
		}
		else 
		{
			return $finalRequestId;
		}
		

	}
	
	function getHighestPaperCode($finalRequestId,$connid)
	{
		$getRid = "";
		$returnID = "";
		foreach($finalRequestId as $keyRequestId => $valueRequestId)
		{
			$getRid .= $keyRequestId.","; 
		}
		$getRid = substr_replace($getRid,"",-1);
		$query = "SELECT id from da_testRequest where id IN($getRid) ORDER BY id DESC LIMIT 1";
		$dbqry = new dbquery($query,$connid); 
		while($result = $dbqry->getrowarray()){
			$returnID = $result["id"];
		}
		return $returnID;
	}
	
	function fetchDataRelatedToRequestIdQuestions($keyChapterFetch,$valueIdFetch,$connid)
	{
		$setFinalRequestIdArray = array();
		$qcode_list_arr = array();
		$subSubTopicUsed = array();
		$subSubTopicUsedFinal = array();
		$chapterSubtopicMatchArr = array();
		$countQuestions = 0;
		$qcode_count_list = "";
		$sst_count_list = "";
		$countSST = 0;
		$query = "SELECT a.qcode_list from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND b.id = '$valueIdFetch'";
		$dbqry = new dbquery($query,$connid); 
		while($result = $dbqry->getrowarray()){			
			$qcode_list_arr = explode(",",$result["qcode_list"]);
		}
		
		foreach($qcode_list_arr as $key_list_arr => $value_list_arr)
		{			
			$query_subsubtopic_fetch = "SELECT sub_subtopic_code from da_questions where qcode = '$value_list_arr'";
			$dbqry_subsubtopic_fetch = new dbquery($query_subsubtopic_fetch,$connid); 
			while($result_subsubtopic_fetch = $dbqry_subsubtopic_fetch->getrowarray()){
				$subSubTopicUsed[$result_subsubtopic_fetch["sub_subtopic_code"]][$value_list_arr] = $value_list_arr;
			}
		}
		foreach($subSubTopicUsed as $keySubSubTopic => $valueSubSubTopic)
		{
			$subSubTopicUsedFinal[] = $keySubSubTopic;
		}
		
		$chapterSubtopicMatchArr = $this->checkChapterMppedToSST($keyChapterFetch,$subSubTopicUsedFinal,$connid); 
	
		foreach($chapterSubtopicMatchArr as $keySubtopicMatchArr => $valueSubtopicMatchArr)
		{
			foreach($valueSubtopicMatchArr as $keyset => $valueset)
			{
				$sst_count_list .= $valueset.",";
				$countSST = $countSST + 1;
				$countQuestions = $countQuestions + count($subSubTopicUsed[$valueset]);
				foreach($subSubTopicUsed[$valueset] as $keyqcodeset => $valueqcodeset)
				{
					$qcode_count_list .= $valueqcodeset.",";
				}
			}	
		}
		$setFinalRequestIdArray[$valueIdFetch]["count"] = $countQuestions;
		$setFinalRequestIdArray[$valueIdFetch]["qcode_list"] = substr_replace($qcode_count_list,"",-1);
		$setFinalRequestIdArray[$valueIdFetch]["sst_count"] = $countSST;
		$setFinalRequestIdArray[$valueIdFetch]["sst_list"] = substr_replace($sst_count_list,"",-1);
		return $setFinalRequestIdArray;
	}
	
	function checkChapterMppedToSST($keyChapterFetch,$subSubTopicUsedFinal,$connid)
	{

		$subSubTopicArr = array();
		
		$chapterMappedWithSST = array();
		
			$query = "SELECT subsubtopic_code from da_tbChapterMapping where chapter_id = '$keyChapterFetch'";
			$dbqry = new dbquery($query,$connid);
			while($result = $dbqry->getrowarray()){
				if($result["subsubtopic_code"]!=-1)
				{
					if(in_array($result["subsubtopic_code"],$subSubTopicUsedFinal) && !in_array($result["subsubtopic_code"],$subSubTopicArr)){
						$subSubTopicArr[] = $result["subsubtopic_code"];
						$chapterMappedWithSST[$keyChapterFetch][$result["subsubtopic_code"]] = $result["subsubtopic_code"];
					}
				}
			} 
		
		return $chapterMappedWithSST;	
	}
	
	function UpdateTestRequestDetails($FlagForoAutoAssembledMode,$connid)
	{
		$query = "UPDATE da_testRequest set auto_type = '$FlagForoAutoAssembledMode',flag='Auto' where id = '$this->test_requestid'";
		$dbqry = new dbquery($query,$connid); 
	}
	
	function fetchQuestionSelectionSummary($requestid,$connid,$jobsFlag="")
	{
		$arrRet = array();
		if($this->subjectno == 1)
		{
			$query = "SELECT * FROM (
					  SELECT b.passage_name as chapter_name,a.* from da_questionSelectionSummary a,qms_passage b where a.passage_id = b.passage_id AND a.request_id = '$requestid' AND type = 'Auto' 
					  UNION 
					  SELECT b.chapter_name as chapter_name,a.* from da_questionSelectionSummary a,da_chapterMaster b where a.chapter_id = b.chapter_id AND a.request_id = '$requestid' AND type = 'Auto'
					  ) a
					  ORDER BY a.id";
		}
		else 
		{
			$query = "SELECT b.chapter_name,a.* from da_questionSelectionSummary a,da_chapterMaster b where a.chapter_id = b.chapter_id AND a.request_id = '$requestid' AND type = 'Auto' ORDER BY a.id";
		}
		$dbqry = new dbquery($query,$connid); 
		while($result = $dbqry->getrowarray()){
			/****For Passage selection ***********/
			if($result["chapter_id"] == 0 && $this->subjectno == 1)
			{
				if($result["passage_id"]!=0)
				{
					$querySet = "SELECT passage_name from qms_passage where passage_id = '".$result["passage_id"]."'";
					$dbqrySet = new dbquery($querySet,$connid); 
					while($resultSet = $dbqrySet->getrowarray()){
						$result["chapter_name"] = $resultSet["passage_name"];
						$result["chapter_id"] = $result["passage_id"];
					}
				}
			}
			/****For Passage selection ***********/
			
			/****************Added For Drop Question 28/05/2012 *************/
			$droppedQuestion = "";
			$query_drop = "SELECT dropped_questions from da_testRequest where id = '".$result["best_fit_past_test_id"]."'";
			$dbqry_drop = new dbquery($query_drop,$connid); 
			while($result_drop = $dbqry_drop->getrowarray()){
				$droppedQuestion = $result_drop["dropped_questions"];
			}
			/****************Added For Drop Question 28/05/2012 *************/
			
			/*$arrRet[$result["chapter_name"]] = array("chapter_id"=>$result["chapter_id"],
													 "requested_before"=>$result["requested_before"],
													 "requested_by_same_school"=>$result["requested_by_same_school"],
													 "best_fit_past_test_id"=>$result["best_fit_past_test_id"],
													 "past_count"=>$result["past_count"],
													 "teacher_comment"=>$result["teacher_comment"],													 
													 "dropped_questions"=>$droppedQuestion,
													 "questions_selected"=>$result["questions_selected"],
													 "unique_selected_count"=>$result["unique_selected_count"],
													 "unique_qcode_list"=>$result["unique_qcode_list"],
													 "copies_selected_count"=>$result["copies_selected_count"],
													 "copies_qcode_list"=>$result["copies_qcode_list"],
													 "unique_repeated_count"=>$result["unique_repeated_count"],
													 "unique_repeated_qcode_list"=>$result["unique_repeated_qcode_list"],
													 "mc_copies_no_count"=>$result["mc_copies_no_count"],
													 "mc_copies_no_qcode_list"=>$result["mc_copies_no_qcode_list"],
													 "extra_ques_recommended"=>$result["extra_ques_recommended"],
													 "unused_questions_added"=>$result["unused_questions_added"],
													 "unused_question_added_list"=>$result["unused_question_added_list"],
													 "ips_mismatch_count"=>$result["ips_mismatch_count"],
													 "ips_mismatch_qcode_list"=>$result["ips_mismatch_qcode_list"],
													 "unapproved_image_qcode_count"=>$result["unapproved_image_qcode_count"],
													 "unapproved_image_qcode_list"=>$result["unapproved_image_qcode_list"],
													 "qcode_all_list"=>$result["qcode_all_list"],
													 "type"=>$result["type"],
													 "similar_chapter_flag"=>$result["similar_chapter_flag"],
													 "entered_date"=>$result["entered_date"],
													 "lastModified"=>$result["lastModified"]
													); */

			// For Unique Repeated Qcode list , get parent qcode not copy qcode;
		if($jobsFlag ==1 )
		{
			$unq_qcode ="";
		//	echo "BFR ".$result["unique_repeated_qcode_list"]." <br/> ";
			if($result["unique_repeated_qcode_list"] != "")
			{
				$query_unq = "SELECT qcode, parent_qcode from da_questions where qcode in (".$result["unique_repeated_qcode_list"].") order by FIELD (qcode, ".$result["unique_repeated_qcode_list"]	.")";
			
				$dbqry_unq = new dbquery($query_unq,$connid);
				
				while($result_unq = $dbqry_unq->getrowarray()){

					if($result_unq["parent_qcode"] != 0)
					{
						$unq_qcode .=",".$result_unq["parent_qcode"];
					}
					else
					{
						$unq_qcode .=",".$result_unq["qcode"];
					}
				}
			}

			$unq_qcode = ltrim($unq_qcode,",");
		}
		else
		{
			$unq_qcode =$result["unique_repeated_qcode_list"];
		}

			$arrRet[$result["chapter_id"]] = array(  "chapter_name"=>$result["chapter_name"],
													 "chapter_id"=>$result["chapter_id"],
													 "requested_before"=>$result["requested_before"],
													 "requested_by_same_school"=>$result["requested_by_same_school"],
													 "best_fit_past_test_id"=>$result["best_fit_past_test_id"],
													 "past_count"=>$result["past_count"],
													 "teacher_comment"=>$result["teacher_comment"],													 
													 "dropped_questions"=>$droppedQuestion,
													 "questions_selected"=>$result["questions_selected"],
													 "unique_selected_count"=>$result["unique_selected_count"],
													 "unique_qcode_list"=>$result["unique_qcode_list"],
													 "copies_selected_count"=>$result["copies_selected_count"],
													 "copies_qcode_list"=>$result["copies_qcode_list"],
													 "unique_repeated_count"=>$result["unique_repeated_count"],
													 "unique_repeated_qcode_list"=>$unq_qcode,
													 "mc_copies_no_count"=>$result["mc_copies_no_count"],
													 "mc_copies_no_qcode_list"=>$result["mc_copies_no_qcode_list"],
													 "extra_ques_recommended"=>$result["extra_ques_recommended"],
													 "unused_questions_added"=>$result["unused_questions_added"],
													 "unused_question_added_list"=>$result["unused_question_added_list"],
													 "ips_mismatch_count"=>$result["ips_mismatch_count"],
													 "ips_mismatch_qcode_list"=>$result["ips_mismatch_qcode_list"],
													 "unapproved_image_qcode_count"=>$result["unapproved_image_qcode_count"],
													 "unapproved_image_qcode_list"=>$result["unapproved_image_qcode_list"],
													 "qcode_all_list"=>$result["qcode_all_list"],
													 "dropped_frm_bestFit" => $result["dropqcodes_frm_bestfit_reqid"],
													 "type"=>$result["type"],
													 "similar_chapter_flag"=>$result["similar_chapter_flag"],
													 "entered_date"=>$result["entered_date"],
													 "lastModified"=>$result["lastModified"],
													 "original_repeat_qcode_list"=>$result["unique_repeated_qcode_list"]
													);
		}
		
		return $arrRet;
	}
	
	function UpdateChapterDetailsTable($finalArrForTableChapterWise,$connid)
	{	
		$arrChapterFetchCheck = array();
		$chapter_id_testrequest = "";
		$similar_chapter_foundArr = array();

		$queryChapterIdFetch = "SELECT * FROM da_testRequest where id = '$this->test_requestid'";

		$dbqryChapterIdFetch = new dbquery($queryChapterIdFetch,$connid);	
		while($resultChapterIdFetch = $dbqryChapterIdFetch ->getrowarray()){
			$chapter_id_testrequest = $resultChapterIdFetch["chapter_id"]; 
			$arrChapterFetchCheck = explode(",",$chapter_id_testrequest);
		}
		
		foreach($finalArrForTableChapterWise as $keyArrForTableChapterWise => $valueArrForTableChapterWise)
		{			
			#######Added For Similar Chapter Mapping Id##################
			
			if(isset($chapter_id_testrequest) && count($chapter_id_testrequest)>0)
			{
				if(!in_array($valueArrForTableChapterWise["chapter_id"],$arrChapterFetchCheck))
				{
					$arrChapterSet = array();
					//$chapter_id_main = 0;
					$queryCheckSimilarId = "SELECT chapter_id FROM da_chapterMaster WHERE similar_chapter_id = '".$valueArrForTableChapterWise["chapter_id"]."'";
					$dbqryCheckSimilarId = new dbquery($queryCheckSimilarId,$connid);	
					while($resultCheckSimilarId = $dbqryCheckSimilarId ->getrowarray()){
						$arrChapterSet[] = $resultCheckSimilarId["chapter_id"];
						//$chapter_id_main = $resultCheckSimilarId["chapter_id"];
					}
					foreach($arrChapterSet as $keyChapterSet => $valueChapterSet)
					{
						if(in_array($valueChapterSet,$arrChapterFetchCheck))
						{
							$chapter_id_main = $valueChapterSet;
						}
					}
					if($chapter_id_main!=0)
					{
						if(in_array($chapter_id_main,$arrChapterFetchCheck))
						{
							if($valueArrForTableChapterWise["similar_chapter_flag"]==1)
							{								
								//$finalArrForTableChapterWise[$keyArrForTableChapterWise]["chapter_id"] = $chapter_id_main;								
								$valueArrForTableChapterWise["chapter_id"] = $chapter_id_main;	
								$finalArrForTableChapterWise[$keyArrForTableChapterWise]["chapter_id"] = $chapter_id_main;	
								$similar_chapter_foundArr[] = $chapter_id_main;
							}	
						}
					}
				}
			}
						
			#######Added For Similar Chapter Mapping Id##################
						
			$query = "INSERT into da_questionSelectionSummary set 
					  request_id = '".$valueArrForTableChapterWise["request_id"]."',
					  chapter_id = '".$valueArrForTableChapterWise["chapter_id"]."',
					  requested_before = '".$valueArrForTableChapterWise["requested_before"]."',
					  requested_by_same_school = '".$valueArrForTableChapterWise["requested_by_sameschool"]."',
					  best_fit_past_test_id = '".$valueArrForTableChapterWise["best_fit_past_rid"]."',
					  past_count = '".$valueArrForTableChapterWise["past_count"]."',
					  teacher_comment = '".$valueArrForTableChapterWise["teacher_comment"]."',
					  questions_selected = '".$valueArrForTableChapterWise["qs_selected"]."',
					  unique_selected_count = '".$valueArrForTableChapterWise["Unique"]."',
					  unique_qcode_list = '".$valueArrForTableChapterWise["unique_qcode_list"]."',
					  copies_selected_count = '".$valueArrForTableChapterWise["Copies"]."',
					  copies_qcode_list = '".$valueArrForTableChapterWise["copies_qcode_list"]."',
					  unique_repeated_count = '".$valueArrForTableChapterWise["No_copies"]."',
					  unique_repeated_qcode_list = '".$valueArrForTableChapterWise["no_copies_qcode_list"]."',
					  mc_copies_no_count = '".$valueArrForTableChapterWise["No_Mc_Copy_qcode"]."',
					  mc_copies_no_qcode_list = '".$valueArrForTableChapterWise["No_Mc_Copy_qcode_list"]."',
					  ips_mismatch_count = '".$valueArrForTableChapterWise["IPSMismatch_qcode"]."',
					  ips_mismatch_qcode_list = '".$valueArrForTableChapterWise["IPSMismatch_qcode_list"]."',
					  unapproved_image_qcode_count = '".$valueArrForTableChapterWise["unapproved_image_qcode"]."',
					  unapproved_image_qcode_list = '".$valueArrForTableChapterWise["unapproved_image_qcode_list"]."',
					  qcode_all_list = '".$valueArrForTableChapterWise["final_all_qcode_list"]."',
					  dropqcodes_frm_bestfit_reqid = '".$valueArrForTableChapterWise["dropqcodes_frm_bestfit_reqid"]. "',					 
					  type = '".$valueArrForTableChapterWise["type"]."',
					  similar_chapter_flag = '".$valueArrForTableChapterWise["similar_chapter_flag"]."',
					  entered_date = '".date("Y-m-d")."'";			
			$dbqry = new dbquery($query,$connid);					
		}
		
		// If Chapter id in Test Request But  
		// Chapter taken care of Best Fit Array 
		// check if similar chapter was picked else add to array and insert 

		$chap_frmBestFitArr  = array_keys($finalArrForTableChapterWise);
			
		foreach($arrChapterFetchCheck as $keys => $RequestedChapter)
		{
			if(!in_array($RequestedChapter, $chap_frmBestFitArr))
			{
				if(!in_array($RequestedChapter,$similar_chapter_foundArr))
				{
					$finalArrForTableChapterWise[$RequestedChapter] = array("chapter_id"=> $RequestedChapter, "request_id"=>$this->test_requestid, "type" => "Auto");
					$qry= "INSERT into da_questionSelectionSummary set 
					  request_id = '".$this->test_requestid."',
					  chapter_id = '".$RequestedChapter."',
					  requested_before = '',
					  requested_by_same_school = '',
					  best_fit_past_test_id =  '',
					  past_count =  '',
					  teacher_comment =  '',
					  questions_selected =  '',
					  unique_selected_count =  '',
					  unique_qcode_list = '',
					  copies_selected_count = '',
					  copies_qcode_list = '',
					  unique_repeated_count =  '',
					  unique_repeated_qcode_list = '' ,
					  mc_copies_no_count =  '',
					  mc_copies_no_qcode_list = '',
					  ips_mismatch_count =  '',
					  ips_mismatch_qcode_list = '',
					  unapproved_image_qcode_count = '',
					  unapproved_image_qcode_list =  '',
					  qcode_all_list =  '',
					  dropqcodes_frm_bestfit_reqid = '',
					  type =  'Auto',
					  similar_chapter_flag = '',
					  entered_date = '".date("Y-m-d")."'";			
		
					$dbqry = new dbquery($qry,$connid);			

				}	
			}
		}		
		// End of Chapter missed in best fit,  but in testRequest 
		
		return $finalArrForTableChapterWise;				
	}
	
	function getAllMismatchQcodeArr($connid)
	{
		    $query = "SELECT da_questions.qcode FROM da_questions
					  LEFT JOIN da_ipsDetails ON da_questions.qcode = da_ipsDetails.qcode
					  WHERE da_questions.correct_answer != da_ipsDetails.answer
					  AND da_ipsDetails.ips_status = 0";
			
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				$arrRet[] = $row["qcode"];
			}
		
			return $arrRet;
	}
	
	function FetchFinalChapterTableArray($chapterSubtopicMatch,$flag,$finalflag,$SameRequestDetails,$connid,$final_qcode_list_after="",$requestDetails=array())
	{
		$best_fit_request = "";
		$teacher_comment = "";
						
		if($flag=="FetchForSameRequestFound"){
			$best_fit_request = $SameRequestDetails;			
		}

		$finalArrForTableChapterWise = array();

		$drop_qcode_arr = array();
		if($this->drop_qcodes_frm_bestFit != "")
			$drop_qcode_arr = explode(",", $this->drop_qcodes_frm_bestFit);
		
		$ChaptersFetch_needed = $this->question_neededChapterWise($requestDetails["chapter_id"],$connid,$requestDetails["class"],$requestDetails["subject"],$requestDetails["paper_type"],$requestDetails["schoolCode"], $requestDetails["year"]);
		
		foreach($chapterSubtopicMatch as $keySubtopicMatch => $valueSubtopicMatch){
			$unique = 0;
			$copies = 0;
			$no_copies = 0;
			$ips_mismatch = 0;
			$total_ques = 0;
			$unique_qcode_list = array();
			$copies_qcode_list = array();
			$no_copies_qcode_list = array();
			$ips_mismatch_qcode_list = array();
			$uniques_qcodes = "";
			$copies_qcodes = "";
			$no_copies_qcodes = "";
			$ips_mismatch_qcodes = "";
			
			$unique_dropped = 0;
			$copies_dropped = 0;
			$nocopies_dropped = 0;
			$ipsmismatch_dropped = 0;
			$dropped_bst_str = "";
			
			foreach($valueSubtopicMatch as $keysubsubtopicset => $valuesubsubtopicset)
			{
				$unique = $unique + count($this->sstLevelArray[$keysubsubtopicset]["Uniques"]);
				if(isset($this->sstLevelArray[$keysubsubtopicset]["Uniques"]) && count($this->sstLevelArray[$keysubsubtopicset]["Uniques"])>0)
				{
					foreach($this->sstLevelArray[$keysubsubtopicset]["Uniques"] as $keyUnique => $valueUnique)
					{									
						if(!in_array($valueUnique,$drop_qcode_arr))
							$unique_qcode_list[] = $valueUnique;
						else
						{
							$unique_dropped = $unique_dropped + 1;
							$dropped_bst_str = $dropped_bst_str ."," . $valueUnique;
						}
					}
				}
				$copies = $copies + count($this->sstLevelArray[$keysubsubtopicset]["Copies"]);
				if(isset($this->sstLevelArray[$keysubsubtopicset]["Copies"]) && count($this->sstLevelArray[$keysubsubtopicset]["Copies"])>0)
				{
					foreach($this->sstLevelArray[$keysubsubtopicset]["Copies"] as $keyCopies => $valueCopies)
					{								
						if(!in_array($valueCopies,$drop_qcode_arr))	
							$copies_qcode_list[] = $valueCopies;
						else 
						{
							$copies_dropped = $copies_dropped + 1;								
							$dropped_bst_str = $dropped_bst_str ."," . $valueCopies;
						}
					}
				}							
				$no_copies = $no_copies + count($this->sstLevelArray[$keysubsubtopicset]["No_copies"]);
				if(isset($this->sstLevelArray[$keysubsubtopicset]["No_copies"]) && count($this->sstLevelArray[$keysubsubtopicset]["No_copies"])>0)
				{
					foreach($this->sstLevelArray[$keysubsubtopicset]["No_copies"] as $keyNoCopies => $valueNoCopies)
					{								
						if(!in_array($valueNoCopies,$drop_qcode_arr))		
							$no_copies_qcode_list[] = $valueNoCopies;
						else 
						{
							$nocopies_dropped = $nocopies_dropped + 1;	
							$dropped_bst_str = $dropped_bst_str ."," . $valueNoCopies;								
						}
					}	
				}
				$ips_mismatch = $ips_mismatch + count($this->sstLevelArray[$keysubsubtopicset]["IPS_mismatch"]);
				if(isset($this->sstLevelArray[$keysubsubtopicset]["IPS_mismatch"]) && count($this->sstLevelArray[$keysubsubtopicset]["IPS_mismatch"])>0)
				{
					foreach($this->sstLevelArray[$keysubsubtopicset]["IPS_mismatch"] as $keyIPSMismatch => $valueIPSMismatch)
					{								
						if(!in_array($valueIPSMismatch,$drop_qcode_arr))
							$ips_mismatch_qcode_list[] = $valueIPSMismatch;
						else 	
						{
							$ipsmismatch_dropped = $ipsmismatch_dropped + 1;
							$dropped_bst_str = $dropped_bst_str ."," . $valueIPSMismatch;
						}
					}	
				}
			}
			
			//$total_ques = $unique + $copies + $no_copies;
			//$total_ques_all = $unique + $copies + $no_copies + $ips_mismatch;

			$dropped_bst_str = ltrim ($dropped_bst_str, ",");

			$total_ques = $unique + $copies + $no_copies - $unique_dropped - $copies_dropped - $nocopies_dropped;
			$total_ques_all = $unique + $copies + $no_copies + $ips_mismatch  - $unique_dropped - $copies_dropped - $nocopies_dropped - $ipsmismatch_dropped;
	
			$total_ques_all = round($ChaptersFetch_needed[$keySubtopicMatch]);
		
			if($total_ques_all == 0)
			{
				$total_ques_all = $unique + $copies + $no_copies + $ips_mismatch  - $unique_dropped - $copies_dropped - $nocopies_dropped - $ipsmismatch_dropped;
			}
			$uniques_qcodes = implode(",",$unique_qcode_list);
			$copies_qcodes = implode(",",$copies_qcode_list);
			$no_copies_qcodes = implode(",",$no_copies_qcode_list);
			$ips_mismatch_qcodes = implode(",",$ips_mismatch_qcode_list);
			
			$qcode_final_all_list = "";
			if($uniques_qcodes!="")
			{					
				$qcode_final_all_list = $uniques_qcodes.",";
			}	
			if($copies_qcodes!="")
			{
				$qcode_final_all_list .= $copies_qcodes.",";
			}
			if($no_copies_qcodes!="")
			{
				$qcode_final_all_list .= $no_copies_qcodes.",";
			}
			
			$qcode_final_all_list = substr_replace($qcode_final_all_list,"",-1);
			
			/***************For Image Checking *****************/
			$arrIamges = array();
			$qcodeImageNotApprovedlist = "";
			$qcodeImageNotApprovedCount = 0;
			$arrIamges = $this->getQuesImagesValidityToFinalizeAutomationCheck($connid,$qcode_final_all_list);
			array_filter($arrIamges);
			$qcodeImageNotApprovedlist = implode(",",$arrIamges);
			$qcodeImageNotApprovedCount = count($arrIamges);
			/***************For Image Checking *****************/
			
			#################################Added For Direct,Related And Not Q Direct Related###############################
			$direct_list_arr = array();
			$related_list_arr = array();
			$no_related_list_arr = array();
			
					
			// Changed for new process Oldest date Naveen

			if($final_qcode_list_after!="")
			{
			/*	$arrPastQcode = explode(",",$final_qcode_list_after);					
				$final_qcode_arr = explode(",",$qcode_final_all_list);
				foreach($final_qcode_arr as $key_qcode => $value_qcode)
				{
					$flag_set_direct = 0;
					$year_past = $requestDetails["year"]-1;
					if(!in_array($value_qcode,$arrPastQcode))
					{
						$related_list_arr[$value_qcode] = $value_qcode;
					}
					else 
					{
						
						$flag_set_direct = $this->questionusedbefore($value_qcode,$requestDetails["schoolCode"],$requestDetails["year"],$year_past,$connid,"Uniqueused");									
						echo "Flag used before $flag_set_direct $value_qcode<br/> ";
						if($flag_set_direct==1)
						{
							$no_related_list_arr[$value_qcode] = $value_qcode;
						}
						else 
						{
							$direct_list_arr[$value_qcode] = $value_qcode;
						}
					}
													
				}
				$unique = count($direct_list_arr);
				$copies = count($related_list_arr);
				$no_copies = count($no_related_list_arr);						
				$uniques_qcodes = implode(",",$direct_list_arr);
				$copies_qcodes = implode(",",$related_list_arr);
				$no_copies_qcodes = implode(",",$no_related_list_arr);												
				
				$unique = $valuesubsubtopicset["Unique"];
				$copies = $valuesubsubtopicset["Copies"];
				$no_copies  = $valuesubsubtopicset["No_copies"];
				$uniques_qcodes =$valuesubsubtopicset["unique_qcode_list"];
				$copies_qcodes = $valuesubsubtopicset["copies_qcode_list"];
				$no_copies_qcodes = $valuesubsubtopicset["no_copies_qcode_list"];

				echo "List --> $unique $copies $uniques_qcodes $copies_qcodes $no_copies_qcodes <br/>";
			*/	
			}	
			######################################################################################################	
			
			$finalArrForTableChapterWise[$keySubtopicMatch]["chapter_id"] = $keySubtopicMatch;
			$finalArrForTableChapterWise[$keySubtopicMatch]["request_id"] = $this->test_requestid;
			$finalArrForTableChapterWise[$keySubtopicMatch]["requested_before"] = "Y";
			$finalArrForTableChapterWise[$keySubtopicMatch]["requested_by_sameschool"] = $finalflag;
			$finalArrForTableChapterWise[$keySubtopicMatch]["best_fit_past_rid"] = $best_fit_request;
			$finalArrForTableChapterWise[$keySubtopicMatch]["teacher_comment"] = $this->FindTeacherComment($best_fit_request,$connid);
			$finalArrForTableChapterWise[$keySubtopicMatch]["qs_selected"] = $total_ques."/".$total_ques_all;
			$finalArrForTableChapterWise[$keySubtopicMatch]["past_count"] =  $total_ques;					
			$finalArrForTableChapterWise[$keySubtopicMatch]["Unique"] = $unique;
			$finalArrForTableChapterWise[$keySubtopicMatch]["Copies"] = $copies;
			$finalArrForTableChapterWise[$keySubtopicMatch]["No_copies"] = $no_copies;
			$finalArrForTableChapterWise[$keySubtopicMatch]["No_Mc_Copy_qcode"] = "";
			$finalArrForTableChapterWise[$keySubtopicMatch]["IPSMismatch_qcode"] = $ips_mismatch;
			$finalArrForTableChapterWise[$keySubtopicMatch]["unapproved_image_qcode"] = $qcodeImageNotApprovedCount;
			$finalArrForTableChapterWise[$keySubtopicMatch]["unique_qcode_list"] = $uniques_qcodes;
			$finalArrForTableChapterWise[$keySubtopicMatch]["copies_qcode_list"] = $copies_qcodes;
			$finalArrForTableChapterWise[$keySubtopicMatch]["no_copies_qcode_list"] = $no_copies_qcodes;
			$finalArrForTableChapterWise[$keySubtopicMatch]["No_Mc_Copy_qcode_list"] = "";
			$finalArrForTableChapterWise[$keySubtopicMatch]["IPSMismatch_qcode_list"] = $ips_mismatch_qcodes;
			$finalArrForTableChapterWise[$keySubtopicMatch]["unapproved_image_qcode_list"] = $qcodeImageNotApprovedlist;
			$finalArrForTableChapterWise[$keySubtopicMatch]["final_all_qcode_list"] = $qcode_final_all_list;
			$finalArrForTableChapterWise[$keySubtopicMatch]["type"] = "Auto";		

			if($this->drop_qcodes_frm_bestFit != "")
				$finalArrForTableChapterWise[$keySubtopicMatch]["dropqcodes_frm_bestfit_reqid"] = $dropped_bst_str;					
		}
		return $finalArrForTableChapterWise;
	}
	
	function FetchAllFinalTableSetArrayForQuestionSummaryTable($chapterSubtopicMatch,$valueChapterFetch,$connid)
	{
		
		$unique = 0;
		$copies = 0;
		$no_copies = 0;
		$no_mc_qcode = 0;
		$ips_mismatch = 0;
		$total_ques = 0;
		$unique_qcode_list = array();
		$copies_qcode_list = array();
		$no_copies_qcode_list = array();
		$no_mc_copy_qcode_list = array();
		$ips_mismatch_qcode_list = array();
		$uniques_qcodes = "";
		$copies_qcodes = "";
		$no_copies_qcodes = "";
		$no_mc_copy_qcodes = "";
		$ips_mismatch_qcodes = "";					
			$unique = $unique + count($this->sstLevelArray[$chapterSubtopicMatch]["Uniques"]);
			if(isset($this->sstLevelArray[$chapterSubtopicMatch]["Uniques"]) && count($this->sstLevelArray[$chapterSubtopicMatch]["Uniques"])>0)
			{
				foreach($this->sstLevelArray[$chapterSubtopicMatch]["Uniques"] as $keyUnique => $valueUnique)
				{
					$unique_qcode_list[] = $valueUnique;
				}
			}
			$copies = $copies + count($this->sstLevelArray[$chapterSubtopicMatch]["Copies"]);
			if(isset($this->sstLevelArray[$chapterSubtopicMatch]["Copies"]) && count($this->sstLevelArray[$chapterSubtopicMatch]["Copies"])>0)
			{
				foreach($this->sstLevelArray[$chapterSubtopicMatch]["Copies"] as $keyCopies => $valueCopies)
				{
					$copies_qcode_list[] = $valueCopies;
				}
			}							
			$no_copies = $no_copies + count($this->sstLevelArray[$chapterSubtopicMatch]["No_copies"]);
			if(isset($this->sstLevelArray[$chapterSubtopicMatch]["No_copies"]) && count($this->sstLevelArray[$chapterSubtopicMatch]["No_copies"])>0)
			{
				foreach($this->sstLevelArray[$chapterSubtopicMatch]["No_copies"] as $keyNoCopies => $valueNoCopies)
				{
					$no_copies_qcode_list[] = $valueNoCopies;
				}	
			}
			$no_mc_qcode = $no_mc_qcode + count($this->sstLevelArray[$chapterSubtopicMatch]["MC_NO_Copy_Qcode"]);
			if(isset($this->sstLevelArray[$chapterSubtopicMatch]["MC_NO_Copy_Qcode"]) && count($this->sstLevelArray[$chapterSubtopicMatch]["MC_NO_Copy_Qcode"])>0)
			{
				foreach($this->sstLevelArray[$chapterSubtopicMatch]["MC_NO_Copy_Qcode"] as $keyNoMCCopies => $valueNoMCCopies)
				{
					$no_mc_copy_qcode_list[] = $valueNoMCCopies;
				}	
			}									
			$ips_mismatch = $ips_mismatch + count($this->sstLevelArray[$chapterSubtopicMatch]["IPS_mismatch"]);
			if(isset($this->sstLevelArray[$chapterSubtopicMatch]["IPS_mismatch"]) && count($this->sstLevelArray[$chapterSubtopicMatch]["IPS_mismatch"])>0)
			{
				foreach($this->sstLevelArray[$chapterSubtopicMatch]["IPS_mismatch"] as $keyIPSMismatch => $valueIPSMismatch)
				{								
						$ips_mismatch_qcode_list[] = $valueIPSMismatch;								
				}	
			}
					
					
			$total_ques = $unique + $copies + $no_copies;					
			$uniques_qcodes = implode(",",$unique_qcode_list);
			$copies_qcodes = implode(",",$copies_qcode_list);
			$no_copies_qcodes = implode(",",$no_copies_qcode_list);
			$no_mc_copy_qcodes = implode(",",$no_mc_copy_qcode_list);
			$ips_mismatch_qcodes = implode(",",$ips_mismatch_qcode_list);
			
			$qcode_final_all_list = "";
			if($uniques_qcodes!="")
			{					
				$qcode_final_all_list = $uniques_qcodes.",";
			}	
			if($copies_qcodes!="")
			{
				$qcode_final_all_list .= $copies_qcodes.",";
			}
			if($no_copies_qcodes!="")
			{
				$qcode_final_all_list .= $no_copies_qcodes.",";
			}
			$qcode_final_all_list = substr_replace($qcode_final_all_list,"",-1);
			/***************For Image Checking *****************/
			$arrIamges = array();
			$qcodeImageNotApprovedlist = "";
			$qcodeImageNotApprovedCount = 0;
			$arrIamges = $this->getQuesImagesValidityToFinalizeAutomationCheck($connid,$qcode_final_all_list);
			$qcodeImageNotApprovedlist = implode(",",$arrIamges);
			$qcodeImageNotApprovedCount = count($arrIamges);
			/***************For Image Checking *****************/
			
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["qs_selected"] = $total_ques."/".$valueChapterFetch;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["Unique"] = $unique;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["Copies"] = $copies;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["No_copies"] = $no_copies;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["No_MC_copies"] = $no_mc_qcode;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["IPSMismatch_qcode"] = $ips_mismatch;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["unapproved_image_qcode"] = $qcodeImageNotApprovedCount;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["unique_qcode_list"] = $uniques_qcodes;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["copies_qcode_list"] = $copies_qcodes;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["no_copies_qcode_list"] = $no_copies_qcodes;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["no_mc_copies_qcode_list"] = $no_mc_copy_qcodes;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["IPSMismatch_qcode_list"] = $ips_mismatch_qcodes;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["unapproved_image_qcode_list"] = $qcodeImageNotApprovedlist;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["final_all_qcode_list"] = $qcode_final_all_list;
			$finalArrForTableChapterWise[$chapterSubtopicMatch]["type"] = "Auto";
			
			return $finalArrForTableChapterWise;
	}
	
	function checkChapterMappedToSubSubTopic($chapters_in_paper,$sstUsedInPaper,$connid)
	{		
		$subSubTopicArr = array();
		
		$chapterMappedWithSST = array();
		foreach($chapters_in_paper as $key_in_paper => $value_in_paper)
		{
			$query = "SELECT subsubtopic_code from da_tbChapterMapping where chapter_id = '$value_in_paper'";
			$dbqry = new dbquery($query,$connid);
			while($result = $dbqry->getrowarray()){
				if($result["subsubtopic_code"]!=-1)
				{
					if(in_array($result["subsubtopic_code"],$sstUsedInPaper) && !in_array($result["subsubtopic_code"],$subSubTopicArr)){
						$subSubTopicArr[] = $result["subsubtopic_code"];
						$chapterMappedWithSST[$value_in_paper][$result["subsubtopic_code"]] = $result["subsubtopic_code"];
					}
				}
			} 
		}
		return $chapterMappedWithSST;		
	}	
	
	function selectPastRequestIdsForBestFit($keyChapterFetch,$id,$connid)
	{		
		$returnarr = array();
		$query = "SELECT id,schoolCode,paper_code FROM da_testRequest
				  WHERE FIND_IN_SET('".$keyChapterFetch."',chapter_id) 
				  AND status = 'Approved' AND paper_code != ''
				  AND type = 'actual'
				  AND subject = '".$this->subjectno."'
				  AND id != $id ORDER BY test_date DESC";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$returnarr[$result["id"]] = $result["id"];
		}
		return $returnarr;
	}
	
	function getReportingDetailsPast($referencePapercode,$connid) /***************For fetching all data regarding past reporting heads.********************/
	{
		$arrRet = array();
		$query = "SELECT reporting_id,reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order FROM da_reportingDetails WHERE papercode='$referencePapercode' ORDER BY reporting_order";
		 $dbquery = new dbquery($query,$connid);
		 while($row = $dbquery->getrowarray()){
		 	$arrRet[$row["reporting_id"]] = array("reporting_level"=>$row["reporting_level"],
		 								    "sst_list"=>$row["sst_list"],
		 								    "qcode_list"=>$row["qcode_list"],
		 								    "required_ques"=>$row["required_ques"],
		 								    "reporting_head"=>$row["reporting_head"],
		 								    "reporting_order"=>$row["reporting_order"]
		 								   );
		 }
		 return $arrRet;
	}
	
	function UpdateReportingHeadForNewRequest($finalReportingArr,$connid)
	{ 
		$qcodePaperList = "";
		$paperCode = "";
		$dropCnt =0; 
		$countSST =0;
		$totalNeeded = 0;
		$ques_list = "";
		$diff_needed_count =0;

		// if blue print count is less than total in reporting increment for the reporting heads
		foreach($finalReportingArr as $keyArr => $valArr)
		{
			$totalNeeded += $valArr["required_ques"];
		}

		if($totalNeeded < $this->bluePrintQues_count)
		{
			$diff_needed_count = $this->bluePrintQues_count - $totalNeeded;

			while($diff_needed_count > 0)
			{	
				foreach($finalReportingArr as $keyAdd=> $valAdd)
				{
					if($diff_needed_count ==0) break;

					$finalReportingArr[$keyAdd]["required_ques"] +=1;
					$diff_needed_count -= 1;
				}
			}
		}

		// Then it had to drop questions but was it succesfully dropped
		// Pass 1 reduce no of questions in reporting Head with more than 1 question per sst		
		if($this->dropQuestions_failedCnt != 0)
		{
			$dropCnt = $this->dropQuestions_failedCnt;
			foreach($finalReportingArr as $keyUpdateReporting=>$valueUpdateReporting)
			{
				if($dropCnt == 0) break;

				$countSST = count(explode(",",$valueUpdateReporting["sst_list"]));

				if($valueUpdateReporting["required_ques"] > $countSST)
				{
					$finalReportingArr[$keyUpdateReporting]["required_ques"] -= 1;
					$dropCnt -=1;
				}	
			}
		}

		// if above process failed then reduce from first 
		if($this->dropQuestions_failedCnt !=0)
		{
			if($dropCnt != 0)
			{
				foreach($finalReportingArr as $keyPass2 => $valuePass2)
				{
					if($dropCnt == 0) break;

					$finalReportingArr[$keyUpdateReporting]["required_ques"] -= 1;
					$dropCnt -=1;					
				}
			}
		}
		foreach($finalReportingArr as $keyFinalReporting=>$valueFinalReporting)
		{
			$paperCode = $valueFinalReporting["papercode"];
			$query = 'INSERT INTO da_reportingDetails set papercode = "'.$valueFinalReporting["papercode"].'", reporting_level="'.$valueFinalReporting["reporting_level"].'", sst_list="'.$valueFinalReporting["sst_list"].'", qcode_list="'.$valueFinalReporting["qcode_list"].'", required_ques="'.$valueFinalReporting["required_ques"].'", reporting_head="'.$valueFinalReporting["reporting_head"].'", reporting_order="'.$valueFinalReporting["reporting_order"].'", entered_dt=curdate(), entered_by="'.$_SESSION["username"].'"';
			$dbquery = new dbquery($query,$connid);
			if($valueFinalReporting["qcode_list"]!="")
			{
				$qcodePaperList = $qcodePaperList.$valueFinalReporting["qcode_list"].",";
			}	
		}
		if($qcodePaperList!='')#This will update paperdetails in the table with qcode list
		{			
			$qcodePaperList = substr_replace($qcodePaperList,"",-1);			
			$queryPaper = "UPDATE da_paperDetails set qcode_list='".$qcodePaperList."',lastModifiedBy='".$_SESSION["username"]."' WHERE papercode = '".$paperCode."' AND version = '1'";
			$dbqueryPaper = new dbquery($queryPaper,$connid);
			
			#inserting in temp autoassembly table so it won't repeat quesions while assembling and we need to delete this entry @ the timeof approval.
			$in_query = "INSERT INTO da_autoAssemblyQues (schoolCode,class,subject,request_id,qcode_list,insert_dt) VALUES
						 ('".$this->schoolCode."','".$this->class."','".$this->subjectno."','".$this->test_requestid."','".$qcodePaperList."',NOW())";
			$in_dbqry = new dbquery($in_query,$connid);
			
		}	
	}
	
	function getMappedChapterSubSubtopicCode($test_requestid,$qcode_set,$connid)
	{
		$setFlag = 1;
		$arrSubSubTopicCodeMapped = array();
		$chapter_id_for_check = "";
		$sub_subtopic_code_check = "";
		$queryChapterFetch = "SELECT chapter_id FROM da_testRequest where id = '$test_requestid'";
		$dbqueryChapterFetch = new dbquery($queryChapterFetch,$connid);
		 	while($rowChapterFetch = $dbqueryChapterFetch->getrowarray()){
		 		$chapter_id_for_check = $rowChapterFetch["chapter_id"];
		 	}
		 	
		$queryChekcSubSubtopicCode = "SELECT sub_subtopic_code FROM da_questions where qcode = '$qcode_set'";
		$dbqueryChekcSubSubtopicCode = new dbquery($queryChekcSubSubtopicCode,$connid);
		 	while($rowChekcSubSubtopicCode = $dbqueryChekcSubSubtopicCode->getrowarray()){
		 		$sub_subtopic_code_check = $rowChekcSubSubtopicCode["sub_subtopic_code"];
		 	}
		 
		
		$queryMapped = "SELECT DISTINCT(subsubtopic_code) as sst FROM da_tbChapterMapping where chapter_id IN ($chapter_id_for_check)";
		$dbqueryMapped = new dbquery($queryMapped,$connid);
		 	while($rowMapped = $dbqueryMapped->getrowarray()){
		 		$arrSubSubTopicCodeMapped[$rowMapped["sst"]] = $rowMapped["sst"];
		 	} 	
		 if(in_array($sub_subtopic_code_check,$arrSubSubTopicCodeMapped))
		 {
		 	$setFlag = 0;
		 }
		return $setFlag;
	}	
	
	function SelectionOfQccodes($reportingDetailsArr,$year="",$schoolCode="",$flagforqcodeprocess="",$papercode="",$connid,$chapterPassed="",$flagformisconception="")
	{
		$arrRet = array();
		$explodePastQcodeList = array();
		$fetchqcode = "";
		
		#This will make array that has been used in refering paper for making new paper this will used in checking if any questions copy is not used in same paper.
		$strQcodeListExisting = "";
		$ExistingQcode = array();
		foreach($reportingDetailsArr as $key=>$value)
		{
			$strQcodeListExisting .= $value["qcode_list"].",";
		}
		$strQcodeListExisting = substr_replace($strQcodeListExisting,"",-1);
		$ExistingQcode = explode(",",$strQcodeListExisting);
		
		############For Existing Paper Selection###################
		$arrExistingSelectedQcodes = array();
		############For Existing Paper Selection###################
		
		foreach($reportingDetailsArr as $key=>$value)
		{
			$arrRet[$key]["reporting_level"] = $value["reporting_level"];			
			$arrRet[$key]["required_ques"] = $value["required_ques"];
			$arrRet[$key]["reporting_head"] = $value["reporting_head"];
			$arrRet[$key]["reporting_order"] = $value["reporting_order"];
			$arrRet[$key]["papercode"] = $papercode;
			$arrRet[$key]["past_qcode_list"] = $value["qcode_list"];			
			
			$explodePastQcodeList = explode(",",$value["qcode_list"]);
			$qcode_list_string = "";
			$qcode_sst_mismatch_string = "";
			foreach($explodePastQcodeList as $keyqcode=>$valueqcode){				
				#Added Start By
				$setFlag = 0;
				if($chapterPassed=="")
				{
					$setFlag = $this->getMappedChapterSubSubtopicCode($this->test_requestid,$valueqcode,$connid);				
				}	
				#End
				if($setFlag == 0)
				{
				#call function for fetching qcode that needs to really take in consideration
					
					$fetchqcode = $this->CommonFunctionForQcodeFetch($valueqcode,$year,$schoolCode,$flagforqcodeprocess,$ExistingQcode,$connid,$chapterPassed,$flagformisconception,$arrExistingSelectedQcodes);										
					
					if($fetchqcode!="")
					{
						$qcode_list_string .= $fetchqcode.",";
						$arrExistingSelectedQcodes[$fetchqcode] = $fetchqcode;
					}	
				}
				else 
				{
					$qcode_sst_mismatch_string .= $valueqcode.",";
				}
					
			}
			$subSubList = "";
			
			$arrRet[$key]["qcode_list"] = substr_replace($qcode_list_string,"",-1);
			$qcodeForSUBSUBLIST = $arrRet[$key]["qcode_list"];		
			if($qcodeForSUBSUBLIST!="")
			{				
				$querySUBList = "SELECT GROUP_CONCAT(DISTINCT(sub_subtopic_code)) as sst_listset FROM da_questions where qcode IN($qcodeForSUBSUBLIST)";
					$dbquery = new dbquery($querySUBList,$connid);
				 	while($rowSUBList = $dbquery->getrowarray()){
				 		$subSubList = $rowSUBList[sst_listset];
				 	}							
			}	 	
			$arrRet[$key]["sst_list"] = $subSubList;
			$arrRet[$key]["qcode_sst_mismatch_list"] = substr_replace($qcode_sst_mismatch_string,"",-1);
			if($arrRet[$key]["qcode_sst_mismatch_list"]!='')
			{
				$arrQcodeSSTMismatch = explode(",",$arrRet[$key]["qcode_sst_mismatch_list"]);
				foreach($arrQcodeSSTMismatch as $keySSTMismatchSet => $valueSSTMismatchSet)
				{
					$querySSTMismatch = "INSERT into da_questionSSTMismatch set request_id = '$this->test_requestid',qcode='$valueSSTMismatchSet'";
					$dbquerySSTMismatch = new dbquery($querySSTMismatch,$connid);
				}
			}
			
		}
		
		return $arrRet;
	}
	
	function CommonFunctionForQcodeFetch($qcode,$year="",$schoolCode="",$flagforqcodeprocess="",$ExistingQcode=array(),$connid,$chapterPassed="",$flagformisconception="",$arrExistingSelectedQcodes=array())
	{	
		################For same questions in same sst issue track################
		if(isset($this->globalcheckQcodeArray) && count($this->globalcheckQcodeArray)>0)
		{
			foreach($this->globalcheckQcodeArray as $keyglobalcheckQcodeArray => $valueglobalcheckQcodeArray)
			{
				if(!in_array($valueglobalcheckQcodeArray,$arrExistingSelectedQcodes))
				{
					$arrExistingSelectedQcodes[$valueglobalcheckQcodeArray] = $valueglobalcheckQcodeArray;
				}
				if(!in_array($valueglobalcheckQcodeArray,$ExistingQcode))
				{
					$ExistingQcode[$valueglobalcheckQcodeArray] = $valueglobalcheckQcodeArray;
				}
			}
			
		}
		################For same questions in same sst issue track################
		
		$past_qcode = $qcode;	
		if($flagformisconception=="More")
		{
			$misconceptioncheck_new = $this->selectMisaconceptionQcode($qcode,$connid);
		}
		###########For Copy Question if found#############
		if($qcode!="")
		{			
			##################For Rejected Question Check###################
			$rejectedQuestion = 0;
			$rejectedQuestion = $this->checkForRejectedQuestion($qcode,$connid);
			##################For Rejected Question Check###################
			$pastyear = $year-1;
			
			$countPerformance = 0;
		/*
			$countPerformance = $this->questionusedbefore($qcode,$schoolCode,$year,$pastyear,$connid);
		
			if($countPerformance!=0)
			{				
				$qcode = $this->checkForRelatedQuestions($qcode,$ExistingQcode,$schoolCode,$year,$rejectedQuestion,$connid);		
				##########For Checking Existing Paper Qcode Available##############
				if(isset($arrExistingSelectedQcodes) && count($arrExistingSelectedQcodes)>0)
				{
					if(in_array($qcode,$arrExistingSelectedQcodes))
					{
						$qcode = $past_qcode;
					}
				}
				##########For Checking Existing Paper Qcode Available##############
			}			
		*/
			// if rejected question check related question 
			
			
			 if($rejectedQuestion == 1 )
			{				
			    $qcode = $this->checkForRelatedQuestions($qcode,$ExistingQcode,$schoolCode,$year,$rejectedQuestion,$connid);		
			 
			
				if(isset($arrExistingSelectedQcodes) && count($arrExistingSelectedQcodes)>0)
				{
					if(in_array($qcode,$arrExistingSelectedQcodes))
					{
						$qcode = $past_qcode;
					}
				}		
			
			}


			// Get all related question of this question order by used in id oldest first
			$returnOldestQcodeArr = $this->oldestUsedQuestion($qcode,$schoolCode,$year,$connid);
			// End 
			##############For Rejected Question#################
		/*	if($rejectedQuestion == 1 && $countPerformance==0)
			{				
			    $qcode = $this->checkForRelatedQuestions($qcode,$ExistingQcode,$schoolCode,$year,$rejectedQuestion,$connid);		
			 
				##########For Checking Existing Paper Qcode Available##############
				if(isset($arrExistingSelectedQcodes) && count($arrExistingSelectedQcodes)>0)
				{
					if(in_array($qcode,$arrExistingSelectedQcodes))
					{
						$qcode = $past_qcode;
					}
				}		
				##########For Checking Existing Paper Qcode Available##############
			}
		*/
			if($rejectedQuestion == 1)
			{
				if($qcode == $past_qcode)
				{	
					$queryInsertRejected = "INSERT into da_questionRejectedAssembly (request_id,qcode,status,qcode_status) VALUES('$this->test_requestid','$qcode',0,0)";
					$dbqueryInsertRejected = new dbquery($queryInsertRejected,$connid);				
					return "";
				}
				if($qcode != $past_qcode)
				{
					$check_qcode = "";
					$queryCheckRejected = "SELECT parent_qcode FROM da_questions WHERE qcode = '$qcode'";
					$dbqueryCheckRejected = new dbquery($queryCheckRejected,$connid);	
					while($rowCheckRejected = $dbqueryCheckRejected->getrowarray())
					{
						$check_qcode = $rowCheckRejected["parent_qcode"];
					}
					if($check_qcode==$past_qcode)
					{
						$queryInsertRejected = "INSERT into da_questionRejectedAssembly (request_id,qcode,status,qcode_status) VALUES('$this->test_requestid','$qcode',1,1)";
						$dbqueryInsertRejected = new dbquery($queryInsertRejected,$connid);	
					}	
					else 
					{
						$queryInsertRejected = "INSERT into da_questionRejectedAssembly (request_id,qcode,status,qcode_status) VALUES('$this->test_requestid','$qcode',1,0)";
						$dbqueryInsertRejected = new dbquery($queryInsertRejected,$connid);	
					}
				}
			}
			##############For Rejected Question#################
			
		}	
		###########For Copy Question if found#############
		$finalMismatchQuestions =  array();
		$finalMismatchQuestions = $this->getAllMismatchQcodeArr($connid);
		$sub_subtopic_code_arr = "";
		$sub_subtopic_code_arr = $this->findSubTopicOfQcode($qcode,$connid);
		$pastyear = $year-1;
		if($flagforqcodeprocess == "FoundRequestId" || $flagforqcodeprocess == "FoundChapterId"){ $countSetForSameQuestionsUsed = 0; }
		else { $countSetForSameQuestionsUsed = 1; }
		$copyqcode = "";
		
		#checking use the same questions as in the past test if the questions not used by that school in last year and this year so far
		if($flagforqcodeprocess == "FoundRequestId" || $flagforqcodeprocess == "FoundChapterId")
		{
			$countSetForSameQuestionsUsed = $this->questionusedbefore($qcode,$schoolCode,$year,$pastyear,$connid);
		}		
		
			$qType = $returnOldestQcodeArr["quesPickedType"];
			$ques = $returnOldestQcodeArr["qcode"];
			
		if($qType == "unique")
		{
			if(!in_array($ques,$finalMismatchQuestions))
		    {
				if($chapterPassed!="" || $chapterPassed!=0)
				{					
					$this->sstLevelArray[$chapterPassed]["Uniques"][$ques] = $ques;
				}
				else
				{	
					$this->sstLevelArray[$sub_subtopic_code_arr]["Uniques"][$ques] = $ques;
				}
				return $ques;
			}
			else 
			{				
				#For IPS Mismatch Qcode count
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["IPS_mismatch"][$ques] = $ques;
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["IPS_mismatch"][$ques] = $ques;
					}
				return "";
			}
		}
		else if($qType == "copy")
		{
		
			if(!in_array($ques,$finalMismatchQuestions))
				{
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["Copies"][$ques] = $ques;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["Copies"][$ques] = $ques;  
					}
					if($misconceptioncheck_new == 1)
					{
						$misconception_check_new = 0;
						$misconception_check_new = $this->selectMisaconceptionQcode($ques,$connid);
						if($misconception_check_new!=1)
						{
							if($chapterPassed!="" || $chapterPassed!=0)
							{
								$this->sstLevelArray[$chapterPassed]["MC_NO_Copy_Qcode"][$ques] = $ques;  
							}
							else 
							{
								$this->sstLevelArray[$sub_subtopic_code_arr]["MC_NO_Copy_Qcode"][$ques] = $ques;  
							}
							
						}
					}

						
					return $ques;
				}
				else 
				{
					#For IPS Mismatch Qcode count
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["IPS_mismatch"][$ques] = $ques;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["IPS_mismatch"][$ques] = $ques;  
					}
					return "";
				}
		}
		else if($qType == "repeat")
		{
		//	echo "Repeat D* ";
			if(!in_array($ques,$finalMismatchQuestions))
				{					
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["No_copies"][$ques] = $ques;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["No_copies"][$ques] = $ques;  
					}
					return $ques;
				}
				else 
				{
					#For IPS Mismatch Qcode count
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["IPS_mismatch"][$ques] = $ques;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["IPS_mismatch"][$ques] = $ques;  
					}
					return "";
				}
		}

		

	/* Old Process based on Usage Count		
		if($countSetForSameQuestionsUsed==0)
		{			
		    if(!in_array($qcode,$finalMismatchQuestions))
		    {
				if($chapterPassed!="" || $chapterPassed!=0)
				{					
					$this->sstLevelArray[$chapterPassed]["Uniques"][$qcode] = $qcode;  
				}
				else 
				{	
					$this->sstLevelArray[$sub_subtopic_code_arr]["Uniques"][$qcode] = $qcode;  
				}
				return $qcode;
			}
			else 
			{
				#For IPS Mismatch Qcode count
					if($chapterPassed!="" || $chapterPassed!=0)
					{						
						$this->sstLevelArray[$chapterPassed]["IPS_mismatch"][$qcode] = $qcode;  												
					}
					else 
					{	
						$this->sstLevelArray[$sub_subtopic_code_arr]["IPS_mismatch"][$qcode] = $qcode;  						
					}
				return "";
			}
		}
		else 
		{			
			#If used, use the copy of that question. OR if CHECK-2 YES Condition
			$copyqcode = $this->getCopyQcode($qcode,$year,$schoolCode,$ExistingQcode,$connid,$misconceptioncheck_new); 
							
			#If used, use the copy of that question.
			if($copyqcode!="")
			{
				if(!in_array($copyqcode,$finalMismatchQuestions))
				{
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["Copies"][$copyqcode] = $copyqcode;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["Copies"][$copyqcode] = $copyqcode;  
					}
					if($misconceptioncheck_new == 1)
					{
						$misconception_check_new = 0;
						$misconception_check_new = $this->selectMisaconceptionQcode($copyqcode,$connid);
						if($misconception_check_new!=1)
						{
							if($chapterPassed!="" || $chapterPassed!=0)
							{
								$this->sstLevelArray[$chapterPassed]["MC_NO_Copy_Qcode"][$copyqcode] = $copyqcode;  
							}
							else 
							{
								$this->sstLevelArray[$sub_subtopic_code_arr]["MC_NO_Copy_Qcode"][$copyqcode] = $copyqcode;  
							}
							
						}
					}

						
					return $copyqcode;
				}
				else 
				{
					#For IPS Mismatch Qcode count
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["IPS_mismatch"][$copyqcode] = $copyqcode;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["IPS_mismatch"][$copyqcode] = $copyqcode;  
					}
					return "";
				}
			}
			#If no copy present, use the original as a repeat question.
			else 
			{
				if(!in_array($qcode,$finalMismatchQuestions))
				{
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["No_copies"][$qcode] = $qcode;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["No_copies"][$qcode] = $qcode;  
					}
					return $qcode;
				}
				else 
				{
					#For IPS Mismatch Qcode count
					if($chapterPassed!="" || $chapterPassed!=0)
					{
						$this->sstLevelArray[$chapterPassed]["IPS_mismatch"][$qcode] = $qcode;  
					}
					else 
					{
						$this->sstLevelArray[$sub_subtopic_code_arr]["IPS_mismatch"][$qcode] = $qcode;  
					}
					return "";
				}
			}
		}

	End of Old process */		
	}
	
	###########For Rejceted Questiohn To Be Reject######################
	function checkForRejectedQuestion($qcode,$connid)
	{
		$set_flag = 0;
		$query = "SELECT status FROM da_questions WHERE qcode = $qcode";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			if($row["status"]==4)
			{
				$set_flag = 1;
			}	
		}
		return $set_flag;
	}
	###########For Rejceted Questiohn To Be Reject######################
	
	###########For Copy Question if found Alternate Process#############
	function checkForRelatedQuestions($qcode,$ExistingQcode=array(),$schoolCode="",$year="",$rejectedQuestion=0,$connid)
	{	
		$pastyear = $year-1;
		$parent_qcode = 0;
		$misconception = 0;
		$query = "SELECT parent_qcode,misconception FROM da_questions where qcode = '$qcode'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$parent_qcode = $row["parent_qcode"];
			$misconception = $row["misconception"];
		}		
		if($parent_qcode==0 && $rejectedQuestion==1)
		{
			$parent_qcode = $qcode;
		}
		if($parent_qcode==0 && $rejectedQuestion==0)
		{
			return $qcode;
		}
		else 
		{
			$finalMismatchQuestions =  array();
			$finalMismatchQuestions = $this->getAllMismatchQcodeArr($connid);
			$status = 0;
			$queryCheckApproved = "SELECT status FROM da_questions WHERE qcode = '$parent_qcode'";			
			$dbqueryCheckApproved = new dbquery($queryCheckApproved,$connid);
			while($rowCheckApproved = $dbqueryCheckApproved->getrowarray()){		
				$status = $rowCheckApproved["status"];
			}			
			
			if($status==3 && !in_array($parent_qcode,$finalMismatchQuestions))
			{					
				$countUsage = 0;
				$countUsage = $this->questionusedbefore($parent_qcode,$schoolCode,$year,$pastyear,$connid);												
				if($countUsage==0)
				{					
					return $parent_qcode;
				}
				else 
				{							
					$arrCopyCount = array();
					$arrCopyCount = $this->getForRverseProcessCopyQuestion($parent_qcode,$ExistingQcode,$connid);					
					if(isset($arrCopyCount) && count($arrCopyCount)>0)
					{
						if(count($arrCopyCount)==1)
						{									
							if($rejectedQuestion==1)
							{
								$countFlagSet = 0;
			
								foreach($arrCopyCount as $keyCopyQcode=>$valueCopyQcode)
								{
									$countFlagSet = $this->questionusedbefore($valueCopyQcode,$schoolCode,$year,$pastyear,$connid);
									if($countFlagSet==0)
									{										
										return $valueCopyQcode;
									}
								}
								
								$arrCopyCount[$parent_qcode] = $parent_qcode; 
								
								$fetchFinalBasedOnLastUsed = $this->lastUsedQuestions($arrCopyCount,$schoolCode,$year,$pastyear,$connid);
								if($fetchFinalBasedOnLastUsed!=$qcode)
								{
									return $fetchFinalBasedOnLastUsed;
								}
								return $parent_qcode;	
							}
							else 
							{	
								################################For new change related to repeat questions in paper##########################								
								$countFlagSet = 0;			
								
								foreach($arrCopyCount as $keyCopyQcode=>$valueCopyQcode)
								{
									$countFlagSet = $this->questionusedbefore($valueCopyQcode,$schoolCode,$year,$pastyear,$connid);
									if($countFlagSet==0)
									{										
										return $valueCopyQcode;
									}
								}
								
								$arrCopyCount[$parent_qcode] = $parent_qcode;	
								$fetchFinalBasedOnLastUsed = $this->lastUsedQuestions($arrCopyCount,$schoolCode,$year,$pastyear,$connid);	
								if($fetchFinalBasedOnLastUsed!="")
								{
									$parent_qcode = $fetchFinalBasedOnLastUsed;		
								}
								################################For new change related to repeat questions in paper##########################		
								return $parent_qcode;
							}	
						}
						else 
						{							
							$countFlagSet = 0;
		
							foreach($arrCopyCount as $keyCopyQcode=>$valueCopyQcode)
							{								
								$countFlagSet = $this->questionusedbefore($valueCopyQcode,$schoolCode,$year,$pastyear,$connid);
								if($countFlagSet==0)
								{
									return $valueCopyQcode;
								}
							}
							
							$arrCopyCount[$parent_qcode] = $parent_qcode; 
							
							$fetchFinalBasedOnLastUsed = $this->lastUsedQuestions($arrCopyCount,$schoolCode,$year,$pastyear,$connid);
							return $fetchFinalBasedOnLastUsed;
						}
					}
					return 	$parent_qcode;
				}					
			}
			else 
			{								
				$arrCopyCount = array();
				$arrCopyCount = $this->getForRverseProcessCopyQuestion($parent_qcode,$ExistingQcode,$connid);						
				if(isset($arrCopyCount) && count($arrCopyCount)>0)
				{									
					if(count($arrCopyCount)==1)
					{					
						
						if($rejectedQuestion==1)
						{
							foreach($arrCopyCount as $keyCopyCount => $valueCopyCount)
							{
								if($valueCopyCount!=$qcode)
								{
									return $valueCopyCount;
								}	
							}
							return $qcode;
						}
						else 
						{
							################################For new change related to repeat questions in paper##########################
							$countFlagSet = 0;
			
							foreach($arrCopyCount as $keyCopyQcode=>$valueCopyQcode)
							{
								$countFlagSet = $this->questionusedbefore($valueCopyQcode,$schoolCode,$year,$pastyear,$connid);
								if($countFlagSet==0)
								{										
									return $valueCopyQcode;
								}
							}
							
							$arrCopyCount[$parent_qcode] = $parent_qcode;	
							$fetchFinalBasedOnLastUsed = $this->lastUsedQuestions($arrCopyCount,$schoolCode,$year,$pastyear,$connid);	
							if($fetchFinalBasedOnLastUsed!="")
							{
								$qcode = $fetchFinalBasedOnLastUsed;
							}	
							################################For new change related to repeat questions in paper##########################	
							return $qcode;	
						}	
					}
					else 
					{						
						$countFlagSet = 0;
	
						foreach($arrCopyCount as $keyCopyQcode=>$valueCopyQcode)
						{
							$countFlagSet = $this->questionusedbefore($valueCopyQcode,$schoolCode,$year,$pastyear,$connid);
							if($countFlagSet==0)
							{
								return $valueCopyQcode;
							}
						}												
						
						$fetchFinalBasedOnLastUsed = $this->lastUsedQuestions($arrCopyCount,$schoolCode,$year,$pastyear,$connid);
						return $fetchFinalBasedOnLastUsed;
					}
				}
				return 	$qcode;
			}
		}
	}

	function lastUsedQuestions($arrCopyCount,$schoolCode,$year,$pastyear,$connid)
	{
			$arrCheck = array();
			foreach($arrCopyCount as $key=>$value)
			{
				$request_id = 0;
				$query = "SELECT b.id from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND FIND_IN_SET($value,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode' AND (b.year = '$year' OR b.year='$pastyear') AND b.type = 'actual' AND b.class = '$this->class' AND id!='$this->test_requestid' ORDER BY b.id DESC LIMIT 1";
				$dbquery = new dbquery($query,$connid);
				 while($row = $dbquery->getrowarray()){
				 		if($row["id"]!="")
				 		{
				 			$request_id = $row["id"];
				 		}
				 }
				 $arrCheck[$value] = $request_id;				 
			}	 	
			
			asort($arrCheck);		
			
			foreach($arrCheck as $keycheck=>$valuecheck)
			{
				return $keycheck;
			}			 
	}
	
	function getForRverseProcessCopyQuestion($qcode,$ExistingQcode=array(),$connid)
	{
		$arrForCopyQuestios = array();
		$query = "SELECT qcode from da_questions where parent_qcode = '$qcode' AND status = 3 ORDER BY qcode";
			$dbquery = new dbquery($query,$connid);
			 	while($row = $dbquery->getrowarray()){
			 		//if(!in_array($row["qcode"],$ExistingQcode)){
			 			$arrForCopyQuestios[$row["qcode"]] = $row["qcode"];
			 		//}
			 	}
		return $arrForCopyQuestios;	 	
	}
	###########For Copy Question if found Alternate Process#############
	
	function findSubTopicOfQcode($qcode,$connid)
	{
		$sub_subtopic_code = "";
		$query = "SELECT sub_subtopic_code from da_questions where qcode = '$qcode'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$sub_subtopic_code = $row["sub_subtopic_code"];
		}
		return $sub_subtopic_code;
	}
	
	function questionusedbefore($qcode,$schoolCode,$year,$pastyear,$connid,$flag=""){
		$countSetForSameQuestionsUsed = 0;
		$condition = "";
		if($flag == "Uniqueused")
		{
			$condition = " AND id!='$this->test_requestid'";
		}
		
			$query = "SELECT count(*) as questionusedcount from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND FIND_IN_SET($qcode,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode' AND (b.year = '$year' OR b.year='$pastyear') AND b.type = 'actual' AND b.class = '$this->class' $condition";						
			$dbquery = new dbquery($query,$connid);
		 	while($row = $dbquery->getrowarray()){
		 		$countSetForSameQuestionsUsed = $row["questionusedcount"];
		 	}		 	
		 	return $countSetForSameQuestionsUsed;
	}
	
	function getCopyQcode($qcode,$year,$schoolCode,$ExistingQcode=array(),$connid)
	{
		$pastyear = $year-1;
		$arrForCopyQuestios = array();
		$copyqcode_midd = "";
		
		$query = "SELECT qcode from da_questions where parent_qcode = '$qcode' AND status = 3 ORDER BY qcode";
		$dbquery = new dbquery($query,$connid);
		 	while($row = $dbquery->getrowarray()){
		 		if(!in_array($row["qcode"],$ExistingQcode)){
		 			$arrForCopyQuestios[$row["qcode"]] = $row["qcode"];
		 		}
		 	}
		#if copy questions found 	
		if(isset($arrForCopyQuestios) && count($arrForCopyQuestios)>0) 
		{
			if(count($arrForCopyQuestios)==1) 	#check for copyquestions used before if one copy questions
			{
				foreach($arrForCopyQuestios as $keyCopyQcode=>$valueCopyQcode)
				{					
					return $valueCopyQcode;
				}
			}
			else 	#check for copyquestions used before if more than one copy questions
			{			
			$countFlagSet = 0;
		
				foreach($arrForCopyQuestios as $keyCopyQcode=>$valueCopyQcode)
				{
					$countFlagSet = $this->questionusedbefore($valueCopyQcode,$schoolCode,$year,$pastyear,$connid);
					if($countFlagSet==0)
					{
						return $valueCopyQcode;
					}
				}

			#if no solution from used count means all qcodes have same count than use performance for selection	
			$performanceArray = array();
				foreach($arrForCopyQuestios as $keyCopyQcode=>$valueCopyQcode)
				{
					$performanceArray[$valueCopyQcode] = $this->copyquestionperformancecount($valueCopyQcode,$connid);
				}
				
				asort($performanceArray);
				
				$copyqcode_midd = $this->getMiddleCopyQuestionPerformance($performanceArray,$connid);
				return $copyqcode_midd;
			}
			
		}
		#if copy questions found not found
		else 
		{
			return "";
		}
	}
	
	function getMiddleCopyQuestionPerformance($performanceArray,$connid)
	{
		$countForOddEven = count($performanceArray);
		if($countForOddEven%2==0) #Even
		{
			$getPositionOfQcodeToSelect = round($countForOddEven/2);
			$count_select = 0;
			foreach($performanceArray as $keyPerformanceQcode => $valuePerformanceQcode)
			{
				
				$count_select++;
				if($count_select==$getPositionOfQcodeToSelect)
				{
					return $keyPerformanceQcode; 
				}
				 
				
			}
		}
		else #odd
		{
			$getPositionOfQcodeToSelect = round($countForOddEven/2);
			$count_select = 0;
			foreach($performanceArray as $keyPerformanceQcode => $valuePerformanceQcode)
			{
				
				$count_select++;
				if($count_select==$getPositionOfQcodeToSelect)
				{
					return $keyPerformanceQcode; 
				}
				 
				
			}
		}
	}
	
	function copyquestionperformancecount($valueCopyQcode,$connid) #For calculating performance of copy questions
	{
		 include_once(constant("PATH_ABSOLUTE_CLASSES")."eidaquestions.cls.php");
		 $countqcode = 0;
 		 $countperformanceavg = 0;
		 $objQuestion = new clsdaquestion();
   		 $objQuestion->populateQuestion($connid,$valueCopyQcode,$paperApprovedDate);
   		 $overallPerformance=$objQuestion->getQuestionPerformance($connid,"","",$class_set);
        	if($objQuestion->getCorrectAnswer()=="A") { 
         		$countperformanceavg += round($overallPerformance["A"]*100/$overallPerformance[total],1); 
				if(round($overallPerformance["A"]*100/$overallPerformance[total],1)!=0)
				{
					 $countqcode++;	
				}
			}
			if($objQuestion->getCorrectAnswer()=="B") { 
				$countperformanceavg += round($overallPerformance["B"]*100/$overallPerformance[total],1); 
				if(round($overallPerformance["B"]*100/$overallPerformance[total],1)!=0)
				{
					 $countqcode++;	
				}
			}
			if($objQuestion->getCorrectAnswer()=="C") { 
				$countperformanceavg += round($overallPerformance["C"]*100/$overallPerformance[total],1);
				if(round($overallPerformance["C"]*100/$overallPerformance[total],1)!=0)
				{
					 $countqcode++;	
				} 
			} 
			if($objQuestion->getCorrectAnswer()=="D") { 
				$countperformanceavg += round($overallPerformance["D"]*100/$overallPerformance[total],1);
				if(round($overallPerformance["D"]*100/$overallPerformance[total],1)!=0)
				{
					 $countqcode++;	
				}
			}
			return  $countperformanceavg;
	}
	
	function checkApproverFlag($finalReportingArr,$connid)
	{	
		$arrFinalAllPaperQcode = array();
		$arrFinalAllCopyPaperQcode = array();
		$countAllPaperQuestionsArr = array();
		$counterForAllQuestions = 0;
		$counterForAllCopyQuestions = 0;
		#checking if any reporting head has less than 3 questions.
		foreach($finalReportingArr as $keyReportingHead=>$valueReportingHead)
		{
			$countReportingHeadQuestionsArr = array();
			$countReportingHeadQuestionsArr = explode(",",$valueReportingHead["qcode_list"]);
			if(count($countReportingHeadQuestionsArr)<3)
			{
				return "Yes";
			}
		}
		
		#paper has >50% copies.
		foreach($finalReportingArr as $keyReportingHead=>$valueReportingHead)
		{
			$countAllPaperQuestionsArr = explode(",",$valueReportingHead["qcode_list"]);
			foreach($countAllPaperQuestionsArr as $keyAllQcode=>$valueAllQcode)
			{
				$flagparentqcode = 0;
				$arrFinalAllPaperQcode[$valueAllQcode] =  $valueAllQcode;
				#checking if selected qcode is copy question or not
				$query = "SELECT parent_qcode from da_questions where qcode = '$valueAllQcode'";
				$dbquery = new dbquery($query,$connid);
		 		while($row = $dbquery->getrowarray())
		 		{				
		 			$flagparentqcode = $row["parent_qcode"];
		 		}
		 		if($flagparentqcode!=0 && $flagparentqcode!="")
		 		{
		 			$arrFinalAllCopyPaperQcode[$valueAllQcode] = $valueAllQcode;
		 		}
			}
		}
		$counterForAllQuestions = count($arrFinalAllPaperQcode);
		$counterForAllCopyQuestions = count($arrFinalAllCopyPaperQcode);
		if($counterForAllCopyQuestions>0)
		{
			$getCopyQuestionsPercentage = 0;
			$getCopyQuestionsPercentage = (($counterForAllCopyQuestions/$counterForAllQuestions)*100);
			if($getCopyQuestionsPercentage>50)
			{
				return "Yes";
			}
			else 
			{
				return "No";
			}
		}
		else 
		{
			return "No";
		}
	}
	
	
	//function chapterQuestionSelectionCount($chapter_id,$connid){
	function chapterQuestionSelectionCount($chapter_id,$connid,$class_set="",$subject_set="",$ppaer_type="",$schoolCode_set="",$year){		
		$chapter_fetch = array();
		$chapter_fetch = explode(",",$chapter_id);
		$chapterWithNumberOfPage = array();
		$questions_needed = $this->FetchRequiredQuestionMathsScience($class_set,$subject_set,$connid,$schoolCode_set,$year);		
		if($questions_needed==0)
		{			
			$queryUpdatePaperCode = "UPDATE da_testRequest set paper_code ='' where id = '$this->test_requestid'";
			$rowUpdatePaperCode = new dbquery($queryUpdatePaperCode,$connid);
			$queryDeletePaperCode = "DELETE from da_questionSelectionSummary where request_id = '$this->test_requestid'";
			$rowDeletePaperCode = new dbquery($queryDeletePaperCode,$connid);
			if($this->flagset==0)
			{
				echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&errmsg=".$errmsg."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
				exit;	
			}	
		}
		//$questions_needed = 25;
		$nooftotalpagesbase = 0;
		#Use ratio of total page numbers for each chapter in the request to get ratio of questions needed for each chapter in the paper of total 25 questions
		#find first ratio needed
		if($questions_needed!=0)
		{
		foreach($chapter_fetch as $keychapter=>$valuechapter){
			
			
				$chapterWithNumberOfPage[$valuechapter] = $this->fetchPageNumberForChapters($valuechapter,$connid);			
				
				#if chapter number not found than redirect to paper assembly and do again AutoAssemble after chapter mapping
				if($chapterWithNumberOfPage[$valuechapter]==0)
				{	
					$errmsg = "You have no page number assigned to chapters in textbooks";
					$queryUpdatePaperCode = "UPDATE da_testRequest set paper_code ='' where id = '$this->test_requestid'";
					$rowUpdatePaperCode = new dbquery($queryUpdatePaperCode,$connid);
					$queryDeletePaperCode = "DELETE from da_questionSelectionSummary where request_id = '$this->test_requestid'";
					$rowDeletePaperCode = new dbquery($queryDeletePaperCode,$connid);
					if($this->flagset==0)
					{
						echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&errmsg=".$errmsg."&FlagForoAutoAssembledMode=".$FlagForoAutoAssembledMode."\"</script>";
						exit;	
					}		 						
				}
				
				$nooftotalpagesbase = $nooftotalpagesbase + $chapterWithNumberOfPage[$valuechapter];
			
		}
		
		foreach($chapter_fetch as $keychapter=>$valuechapter){
			$chapterWithQuestionSelection[$valuechapter] = $this->questionsneededforChapters($chapterWithNumberOfPage[$valuechapter],$nooftotalpagesbase,$questions_needed,$connid);
		}
		}
		return $chapterWithQuestionSelection;
		
	
	}
	
	function questionsneededforChapters($chapterWithNumberOfPage,$nooftotalpagesbase,$questions_needed,$connid)
	{
		$questionsneededforchapter = 0;
		$questionsneededforchapter = ($chapterWithNumberOfPage/$nooftotalpagesbase)*$questions_needed;
		return $questionsneededforchapter;
	}
	
	function fetchPageNumberForChapters($valuechapter,$connid)
	{
		$noofpages = 0;
		$query = "SELECT start_pageno,end_pageno,summary_pages FROM da_chapterMaster 
		          where chapter_id = '$valuechapter'";
        error_log($query);
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			if($result["end_pageno"]!=0 && $result["start_pageno"]!=0){
				$noofpagesupper = $result["end_pageno"]-$result["start_pageno"]+1-$result["summary_pages"];
			}	
		}
		return $noofpagesupper;
	}

	function SearchSameRequestOfPaperForVersion2($id,$chapter_ids,$class,$subjectno,$schoolCode,$connid)
	{			
		$returnarr = array();
		$arrGetAllId = array();
		$arrSchoolWiseArr = array();
		$condition = "";
		$diffSchoolArr = array();
		$restArr =array();

		$query_count = "SELECT * FROM da_testRequest WHERE chapter_id = '".$chapter_ids."'
					    AND type = 'actual' AND status = 'Approved' AND paper_code != '' AND subject = '".$subjectno."' AND id != $id 
					    ORDER BY test_date DESC,id DESC";
		$dbqry_count = new dbquery($query_count,$connid);
		
		while($result_count = $dbqry_count->getrowarray()){
			
			$dropped = 0;
			if($result_count["dropped_questions"]!=""){
				$dropped = 1;
			}
			$arrGetAllId[$result_count["id"]] = array("schoolCode"=>$result_count["schoolCode"],"paper_code"=>$result_count["paper_code"],"dropped_questions"=>$dropped); 
		}
				
		foreach($arrGetAllId as $keyGetAllId => $valueGetAllId)
		{
			if($valueGetAllId["schoolCode"] == $schoolCode){
				$arrSchoolWiseArr[$keyGetAllId] = array("schoolCode"=>$valueGetAllId["schoolCode"],"paper_code"=>$valueGetAllId["paper_code"],"dropped_questions"=>$valueGetAllId["dropped_questions"]); 
			}
			else
			{
				$diffSchoolArr[$keyGetAllId] = array("schoolCode"=>$valueGetAllId["schoolCode"],"paper_code"=>$valueGetAllId["paper_code"],"dropped_questions"=>$valueGetAllId["dropped_questions"]); 
			}	
		}
		
		// Logic , getting diff of all id with same school ids , then push the same schools ids to end - Naveen
		
		foreach($diffSchoolArr as $rid => $resArr)
		{
			$restArr[$rid] = $resArr; 
		}

		foreach($arrSchoolWiseArr as $sameSchoolId => $sameSchoolArr)
		{
			$restArr[$sameSchoolId] = $sameSchoolArr; 
		}
		$returnarr = array();
		$returnarr = $this->getRequestIdFromArr($restArr,$connid);
		
		return $returnarr;

		/*
		if(isset($arrSchoolWiseArr) && count($arrSchoolWiseArr)>0)
		{
			$returnarr = array();
			$returnarr = $this->getRequestIdFromArr($arrSchoolWiseArr,$connid);					
			return $returnarr;
		}
		else {
			$returnarr = array();
			$returnarr = $this->getRequestIdFromArr($arrGetAllId,$connid);			
			return $returnarr;
		}
		return $returnarr;
		*/
	}
	
	function getRequestIdFromArr($arrFinal,$connid)
	{		
		$countercheck = 0;
		foreach($arrFinal as $keyFinal => $valueFinal)
		{
			if($valueFinal["dropped_questions"]==1)
			{
				$countercheck = 1;
			}
		}
		if($countercheck == 0)
		{
			foreach($arrFinal as $keyFinal => $valueFinal)
			{
				$returnarr = array("id"=>$keyFinal,
								    "schoolCode" => $valueFinal["schoolCode"],
								    "paper_code" => $valueFinal["paper_code"]);
				return $returnarr;				    
			}
			
		}
		else 
		{
			foreach($arrFinal as $keyFinal => $valueFinal)
			{
				if($valueFinal["dropped_questions"]==0)
				{
					$returnarr = array("id"=>$keyFinal,
									    "schoolCode" => $valueFinal["schoolCode"],
									    "paper_code" => $valueFinal["paper_code"]);
					return $returnarr;	
				}	
			}
			foreach($arrFinal as $keyFinal => $valueFinal)
			{
				$returnarr = array("id"=>$keyFinal,
									    "schoolCode" => $valueFinal["schoolCode"],
									    "paper_code" => $valueFinal["paper_code"]);
				return $returnarr;	
			}
		}
		
	}
	
	function getLastUsedDate($qcode,$connid,$testrequestId=0)
	{ //for last used date on second page  test request id 
            
        if($this->test_requestid == 0 && $testrequestId!=0)
                $this->test_requestid = $testrequestId;            
                
		$lastUsedDate = "";
		$schoolCodeSet = "";
		$class = "";
		$subject = "";
		$condition = "";
		$querySchoolCode = "SELECT schoolCode,class,subject from da_testRequest where id = '$this->test_requestid'";
		$dbqrySchooLCode = new dbquery($querySchoolCode,$connid);
		while($resultSchoolCode = $dbqrySchooLCode->getrowarray()){
			$schoolCodeSet = $resultSchoolCode["schoolCode"];
			
			#Modified for lastused date problem(29/05/2012)
			$class = $resultSchoolCode["class"];
			$subject = $resultSchoolCode["subject"];
			#end
		}
		
		#Modified for lastused date problem(29/05/2012)
		if($subject!=1)
		{
			$condition = " AND a.class = '$class'";
		}
		#end                
                		
		//$query = "SELECT a.test_date from da_testRequest a,da_paperDetails b WHERE a.paper_code = b.paperCode AND a.paper_code!='' AND FIND_IN_SET($qcode,b.qcode_list) AND id != '$this->test_requestid' AND a.status = 'Approved' AND a.schoolCode = '$schoolCodeSet' AND a.type = 'actual' AND b.version = 1 $condition ORDER BY test_date DESC LIMIT 1";
		// for english get last used date of approved and finalized papers
		if($subject == 1)
			$query = "SELECT a.test_date from da_testRequest a,da_paperDetails b WHERE a.paper_code = b.paperCode AND a.paper_code!='' AND a.subject =$subject AND FIND_IN_SET($qcode,b.qcode_list) AND id != '$this->test_requestid' AND (a.status = 'Approved' OR a.status ='finalize') AND a.schoolCode = '$schoolCodeSet' AND a.type = 'actual' AND b.version = 1 $condition ORDER BY test_date DESC LIMIT 1";
                else
			$query = "SELECT a.test_date from da_testRequest a,da_paperDetails b WHERE a.paper_code = b.paperCode AND a.paper_code!='' AND a.subject =$subject AND FIND_IN_SET($qcode,b.qcode_list) AND id != '$this->test_requestid' AND a.status = 'Approved' AND a.schoolCode = '$schoolCodeSet' AND a.type = 'actual' AND b.version = 1 $condition ORDER BY test_date DESC LIMIT 1";	
                
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
            $lastUsedDate = $result["test_date"];
		} 
		return $lastUsedDate;
	}
		
	function getYearForCurrentTestRequestID($test_id,$connid)
	{
		$CurrentYear = "";
		$query = "SELECT year from da_testRequest where id = '$test_id'";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$CurrentYear = $result["year"];
		}
		return $CurrentYear;
	}
	/****************************************Auto Assembly Version 2 End from here ***************************************/
	function delReportingHeads($connid)
	{
		
		if(is_array($this->delRhDetails) && count($this->delRhDetails) >0)
		{
			foreach($this->delRhDetails as $key => $value)
			{
				$querySel = "SELECT qcode_list,reporting_order FROM da_reportingDetails WHERE reporting_id = '".$value."' ";
				$dbquerySel = new dbquery($querySel,$connid);
				$rowSel = $dbquerySel->getrowarray();
				$reporting_order = $rowSel["reporting_order"];
				if($rowSel["qcode_list"] != "")
				{
					$arrDel = explode(",",$rowSel["qcode_list"]);
					if(is_array($arrDel) && count($arrDel) >0)
					$this->removeQues($connid,$arrDel);
				}
				$query = "DELETE FROM da_reportingDetails WHERE reporting_id = '".$value."' ";
				$dbquery = new dbquery($query,$connid);
				if($reporting_order > 0 )
				{
					$queryReviseOrder = "UPDATE da_reportingDetails SET reporting_order = reporting_order - 1 WHERE reporting_order > '".$reporting_order."' AND papercode = '".$this->papercode."' ";
					$dbqueryReviseOrder = new dbquery($queryReviseOrder,$connid);
				}
			}
			
			#########################Check For update######################### 
			$flag_set = "";
			$flag_set = $this->getStatusOfAutopublish($connid);
			if($flag_set=="Auto")
			{
				$this->updateProcessStatusFlag($connid);
			}	
			#########################Check For update######################### 
			
			echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."\"</script>";
		}
	}
	function lastUpdatedPDFgeneration($connid)
	{
		if($this->test_requestid > 0)
		{
			$query = "UPDATE da_testRequest SET lastPdfGenerated = NOW() WHERE id = '".$this->test_requestid."' LIMIT 1";
			$dbquery = new dbquery($query,$connid);
		}
	}
	function editRequestDetails($connid)
	{
		
		$arrDate = explode("-",$this->testDate);
		$date = $arrDate[2]."-".$arrDate[1]."-".$arrDate[0];

		# Start of delivery date calculations
		$paper_courier_flag = 0;
		$ClassWiseExamPrintMode = array();
		
		$query = "SELECT a.subject,a.class,b.is_e_courier,b.is_m_courier,b.is_s_courier,b.exam_mode,b.order_id,c.submode,c.printing_pages
				  FROM da_testRequest a, da_orderMaster b, orderAdditionalDetails c
				  WHERE b.schoolCode = a.schoolCode 
				  AND a.year = b.year 
				  AND b.order_id = c.order_id AND c.product = 'da'
				  AND a.id = '".$this->test_requestid."'";
		$dbquery = new dbquery($query,$connid);
		
		while($row = $dbquery->getrowarray()) {
			
			/*if($row["subject"] == 1)
				$paper_courier_flag = $row['is_e_courier'];
			else if($row["subject"] == 2)
				$paper_courier_flag = $row['is_m_courier'];
			else if($row["subject"] == 3)
				$paper_courier_flag = $row['is_s_courier'];
			else 
				$paper_courier_flag = 0;*/
			$exam_mode = $row["exam_mode"];
			$sub_mode = $row["submode"];
			$printing_pages = $row["printing_pages"];
			$class = $row["class"];
			$order_id = $row["order_id"];
			$subject = $row["subject"];
		}
		
		$ClassWiseExamPrintMode = $this->getClassWiseExamAndPrintModes($order_id,$connid);
		
		$paper_courier_flag = 0;
		if (($ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets" && $subject == 1) || 
			(($subject == 2 || $subject == 3) && ($ClassWiseExamPrintMode["PRINTMODE"][$class] == "1 per child" || $ClassWiseExamPrintMode["PRINTMODE"][$class] == "Reuse Sets") && $ClassWiseExamPrintMode["EXAMMODE"][$class] != "tablets" && $ClassWiseExamPrintMode["PRINTMODE"][$class] != "NIL")) {
				$paper_courier_flag = 1;
		}
		
		//$ClassWiseExamModes = 
		## 1 per child and 1 per set, mobile, mwa & tablet (english only) 
		//if($paper_courier_flag==1 && ($exam_mode == "comprehensive" || $exam_mode == "mobile")) // tablet & mobile Paper printed by sessashai
		/*if(($ClassWiseExamPrintMode["PRINTMODE"][$class]=="1 per child" || $ClassWiseExamPrintMode["PRINTMODE"][$class]=="Reuse Sets" ) && 
		($ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets" || $ClassWiseExamPrintMode["EXAMMODE"][$class] == "mobile" || $ClassWiseExamPrintMode["EXAMMODE"][$class] == "mwa")) // tablet & mobile Paper printed by sessashai
		*/
		if ($paper_courier_flag == 1 && ($ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets" || $ClassWiseExamPrintMode["EXAMMODE"][$class] == "mobile" || $ClassWiseExamPrintMode["EXAMMODE"][$class] == "mwa"))
		{
			$query = "SELECT
						IF(
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Friday' 
						  OR 
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Saturday' 
						  OR 
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Sunday',
						IF(
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Saturday'  OR 
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Friday',
						  DATE_FORMAT(DATE_SUB('$date',INTERVAL 9 DAY),'%Y-%m-%d'),
						IF(
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Sunday',
						  DATE_FORMAT(DATE_SUB('$date',INTERVAL 10 DAY),'%Y-%m-%d'),
						  DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')
						)),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) as delivered_by";
			
		}
		else if ($paper_courier_flag == 0 && $ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets") {
		//else if($ClassWiseExamPrintMode["PRINTMODE"][$class] == "NIL" && $ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets"){ // tablet but paper not printed by sessashai - tablet (maths & science - NIL)
		//else if($paper_courier_flag==0 && $exam_mode == "comprehensive"){ // tablet but paper not printed by sessashai - tablet (maths & science - NIL)
			$query = "SELECT
						IF(
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Friday'
							OR   
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Saturday'  
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Sunday',
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 5 DAY),'%Y-%m-%d'),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) as delivered_by";
		}
		else if($paper_courier_flag == 0 && ($ClassWiseExamPrintMode["EXAMMODE"][$class] == "mobile" || $ClassWiseExamPrintMode["EXAMMODE"][$class] == "mwa")){ //mobile & mwa - nill
		//else if($paper_courier_flag==0 && $exam_mode == "mobile"){ //mobile & mwa - nill
			
			$query = "SELECT
						IF(
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Monday'  
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Sunday'
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Saturday'
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Friday',
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 6 DAY),'%Y-%m-%d'),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 4 DAY),'%Y-%m-%d')) as delivered_by";
		}
		else  //cBT IBT
		{
			$query = "SELECT
						IF(
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 2 DAY),'%Y-%m-%d')) = 'Saturday'  
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 2 DAY),'%Y-%m-%d')) = 'Sunday',
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 4 DAY),'%Y-%m-%d'),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 2 DAY),'%Y-%m-%d')) as delivered_by";
		}
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$delivery_date = $row[0];
		# end of delivery date calculations
		
		# View & Drop link End date Calculations
		//if($exam_mode == "comprehensive" || $exam_mode == "mobile"){
		if($ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets" || $ClassWiseExamPrintMode["EXAMMODE"][$class] == "mobile" || $ClassWiseExamPrintMode["EXAMMODE"][$class] == "mwa"){
			$drop_end_dt_query = "SELECT 
								    IF(
										DAYNAME('$delivery_date') = 'Friday',
										DATE_FORMAT(DATE_ADD('$delivery_date',INTERVAL 3 DAY),'%Y-%m-%d'),
										DATE_FORMAT(DATE_ADD('$delivery_date',INTERVAL 1 DAY),'%Y-%m-%d')
									) as dropenddate";
			
			$drop_end_dt_dbqry = new dbquery($drop_end_dt_query,$connid);
			$drop_end_dt_row = $drop_end_dt_dbqry->getrowarray();
			$drop_end_dt = $drop_end_dt_row["dropenddate"];
		} else {
			$drop_end_dt_query = "SELECT DATE_FORMAT(DATE_SUB('$date',INTERVAL 1 DAY),'%Y-%m-%d') as dropenddate";
			$drop_end_dt_dbqry = new dbquery($drop_end_dt_query,$connid);
			$drop_end_dt_row = $drop_end_dt_dbqry->getrowarray();
			$drop_end_dt = $drop_end_dt_row["dropenddate"];
		}

		if($this->subjectno != "1")
		{
			$this->saveRequestLog($connid);
			$query = "UPDATE da_testRequest SET delivery_date = '".$delivery_date."',drop_end_date = '".$drop_end_dt."',test_date = '".$date."',chapter_id = '".implode(",",$this->chapter_id)."' WHERE id = '".$this->test_requestid."' ";
			$dbquery = new dbquery($query,$connid);
		}
		else
		{
			$this->saveRequestLog($connid);
			if($this->test_requestid < 6770){
				
				if($this->paperType == "1" || $this->paperType == "3")
					$query = "UPDATE da_testRequest SET delivery_date = '".$delivery_date."',drop_end_date = '".$drop_end_dt."',test_date = '".$date."',chapter_id = '".implode(",",$this->skills)."',paper_type= '".$this->paperType."' WHERE id = '".$this->test_requestid."' ";
				else 
					$query = "UPDATE da_testRequest SET delivery_date = '".$delivery_date."',drop_end_date = '".$drop_end_dt."',test_date = '".$date."',paper_type= '".$this->paperType."',chapter_id ='' WHERE id = '".$this->test_requestid."' ";
				
				$dbquery = new dbquery($query,$connid);
			}else {
				$query = "UPDATE da_testRequest SET delivery_date = '".$delivery_date."',drop_end_date = '".$drop_end_dt."',test_date = '".$date."',chapter_id = '".implode(",",$this->chapter_id)."' WHERE id = '".$this->test_requestid."' ";
				$dbquery = new dbquery($query,$connid);
			}
		}
		
		#############For Again AutoAssembly to do################# 
		if( $this->autoset_flag=="Yes")
		{
			if($this->subjectno == 1)
			{
				$this->GenAutoPaperEnglishVersion2($connid);
			}
			else 
			{
				$this->GenAutoPaperVersion2($connid);			
			}
		}		
		#############For Again AutoAssembly to do#################
		
		echo "<script language='javascript'>";
		echo 'window.opener.location.reload();';
		echo 'self.close();';
		echo "</script>";
	}
	function saveRequestLog($connid)
	{
		$query = "INSERT INTO da_testRequestLog (id,schoolCode,year,class,subject,testName,paper_type,
						paper_code,chapter_id,request_date,requested_by,test_date,
						scoring_date,analysis_pubish_date,status,comments,alloted_to,
						approver,approved_date,reapproved,teacher_comments,unfinalize_reason,type,
						lastPdfGenerated,replacement,last_modified,optfor_device,delivery_date,imported_requestid,
						flag,finalize_date,dropped_questions,auto_type,reset_flag,request_type,reset_reason,drop_end_date)

						SELECT id,schoolCode,year,class,subject,testName,paper_type,
						paper_code,chapter_id,request_date,requested_by,test_date,
						scoring_date,analysis_pubish_date,status,comments,alloted_to,
						approver,approved_date,reapproved,teacher_comments,unfinalize_reason,type,
						lastPdfGenerated,replacement,last_modified,optfor_device,delivery_date,imported_requestid,
						flag,finalize_date,dropped_questions,auto_type,reset_flag,request_type,reset_reason,drop_end_date
						FROM da_testRequest WHERE id = '".$this->test_requestid."' ";
		$dbquery = new dbquery($query,$connid);
	}
	function saveTestName($connid)
	{
		
		$query = "UPDATE da_testRequest SET testName = '".$this->testName."' WHERE paper_code = '".$this->papercode."' AND id = '".$this->test_requestid."'";
		$dbquery = new dbquery($query,$connid);
		
	}
	function resetVersions($connid)
	{
		
		$query = "DELETE FROM da_paperDetails WHERE papercode = '".$this->papercode."' AND version IN (2,3,4) ";
		$dbquery = new dbquery($query,$connid);
		
	}
	function getPaperStageDetails($connid,$stage)
	{
		$count = 0;
		if($stage == 2)
		{
			$arrpaper = explode("_v",$this->papercode);
			$query = "SELECT SUM(required_ques) FROM da_reportingDetails WHERE papercode = '".$arrpaper[0]."' ";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$count = $row[0];
		}
		return $count;
	}
	function removeQues($connid,$delReportingArr="")
	{
		if(is_array($this->quesNo) && count($this->quesNo) >0)
		$delReportingArr = $this->quesNo;

		if(is_array($delReportingArr) && count($delReportingArr) >0)
		{
			$query_list = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."' AND version = 1 ";
			$dbquery_list = new dbquery($query_list,$connid);
			$row = $dbquery_list->getrowarray();
			$arrQcodes = explode(',',$row["qcode_list"]);
			foreach($delReportingArr as $arrkey => $qcode) # change the name of array key so it wont conflict with below key
			{
				$key = array_search($qcode,$arrQcodes);
				if($key !== false) # Added condition as if above function array search return false than it removes the 0 index element
					unset($arrQcodes[$key]);
			}
			$str = implode(',',$arrQcodes);
			$query = "UPDATE da_paperDetails SET qcode_list = '".$str."',lastModifiedBy = '".$_SESSION["username"]."' WHERE papercode = '".$this->papercode."' AND version = 1";
			$dbquery = new dbquery($query,$connid);
		}
	}
	function removeQuesRhWise($connid)
	{
		
		if(is_array($this->quesNo) && count($this->quesNo) >0)
		{
			$query_list = "SELECT qcode_list,reporting_id FROM da_reportingDetails WHERE papercode = '".$this->papercode."' ";
			$dbquery_list = new dbquery($query_list,$connid);
			while($row = $dbquery_list->getrowarray())
			{
				$arrQcodes = array();
				$str = "";
				if($row["qcode_list"] != "")
				{
					$arrQcodes = explode(',',$row["qcode_list"]);
					foreach($this->quesNo as $quekey => $qcode) # change the name of array key so it wont conflict with below key
					{
						if(in_array($qcode,$arrQcodes))
						{
							$key = array_search($qcode,$arrQcodes);
							if($key !== false) # Added condition as if above function array search return false than it removes the 0 index element
								unset($arrQcodes[$key]);
						}
					}
					$str = implode(',',$arrQcodes);
					$query = "UPDATE da_reportingDetails SET qcode_list = '".$str."',same_ans_que_flag='0' WHERE reporting_id = '".$row["reporting_id"]."' ";
					$dbquery = new dbquery($query,$connid);
					if($this->subjectno == 1)
					{
						######################For same answer checking#####################
						$this->commonForReportingHeadChecking($this->papercode,$connid,$row["reporting_id"]);
						######################For same answer checking#####################
					}
				}
			}
			if($this->subjectno == 1)
			{
				$this->removeQues($connid);
			}
			else
			{
				$this->updatePaperDetails($connid);
			}
			
			#########################Check For update######################### 
			$flag_set = "";
			$flag_set = $this->getStatusOfAutopublish($connid);
			if($flag_set=="Auto")
			{
				$this->updateProcessStatusFlag($connid);
			}	
			#########################Check For update######################### 
			
		}
	}
	function getTestReportingDetails($connid)
	{
		$arrPaperCode = explode("_v",$this->papercode);
		$papercode = $arrPaperCode[0];
		$query = "SELECT * FROM da_reportingDetails WHERE papercode = '".$papercode."' ORDER BY reporting_order";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getTestDetails($connid,$version="1")
	{
		mysql_query("SET NAMES 'utf8'");
		$this->setpostvars();
		$this->setgetvars();
		$mechSkill = 0;
		if($this->papercode!="")
		{
			$query_list = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."' AND version = '".$version."'";
			$dbquery_list = new dbquery($query_list,$connid);
			$row_list = $dbquery_list->getrowarray();
			
			if($row_list["qcode_list"] != "")
			{
				$arrReportingHeads = $this->getReportingIDquesWise($connid);
				$query = "SELECT qcode,correct_answer,skill,sub_subtopic_code,misconception,tag_ques FROM da_questions WHERE qcode IN (".$row_list["qcode_list"].") ORDER BY FIELD(qcode,".$row_list["qcode_list"].") ";
				$dbquery = new dbquery($query,$connid);
				$i = 1;
				while($row = $dbquery->getrowarray())
				{
					$this->quesArray[$i] = $row["qcode"];
					$this->correctAnsArray[$i] = $row['correct_answer'];
					$this->reportingHeadArray[$i] = $arrReportingHeads[$row['qcode']];
					$this->ques_sstArray[$i] = $row["sub_subtopic_code"];
					if($row["skill"] == "Mechanical" && $version == 1)
					$this->quesSkillArray[$i] = $row["qcode"];
					if($row["misconception"] == "1" && $version == 1)
					$this->quesMisconceptionArray[$i] = $row["qcode"];
					if($row["tag_ques"] == "1" && $version == 1)
					$this->quesTagArray[$i] = $row["qcode"];

					$i++;
				}
			}
		}
		
		$this->totalQues = count($this->quesArray);
		return $this->quesArray;
	}
	function getReportingHeadSSTwise($connid,$papercode)
	{
		$arrRet = array();
		$query = "SELECT reporting_id,sst_list FROM da_reportingDetails WHERE papercode = '".$papercode."' ORDER BY reporting_order";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrSST = explode(",",$row["sst_list"]);
			if(count($arrSST) > 1)
			{
				foreach($arrSST as $key => $value)
				{
					$arrRet[$arrSST[$key]] = $row["reporting_id"];
				}
			}
			else
			{
				$arrRet[$arrSST[0]] = $row["reporting_id"];
			}

		}
		return $arrRet;
	}
	function getReportingOrderSSTwise($connid,$papercode)
	{
		$arrRet = array();
		$query = "SELECT reporting_order,sst_list FROM da_reportingDetails WHERE papercode = '".$papercode."' ORDER BY reporting_order";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrSST = explode(",",$row["sst_list"]);
			if(count($arrSST) > 1)
			{
				foreach($arrSST as $key => $value)
				{
					$arrRet[$arrSST[$key]] = $row["reporting_order"];
				}
			}
			else
			{
				$arrRet[$arrSST[0]] = $row["reporting_order"];
			}

		}
		return $arrRet;
	}
	function getReportingIDquesWise($connid,$papercode="")
	{
		$arrRet = array();
		if($papercode == "")
		$papercode = $this->papercode;

		$query = "SELECT reporting_id,qcode_list FROM da_reportingDetails WHERE papercode = '".$papercode."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrQcodes = explode(",",$row["qcode_list"]);
			foreach($arrQcodes as $key => $qcode)
			{
				$arrRet[$qcode] = $row["reporting_id"];
			}
		}
		return $arrRet;
	}
	function getCorrectAnswerSequence()
	{
		$correctAnsSeq = "";
		foreach ($this->correctAnsArray as $qno=>$correctAns)
		{
			$correctAnsSeq .= $correctAns." ";
		}
		return $correctAnsSeq;
	}

	function getOptionBalance()
	{
		$optionBalanceArray = array();
		foreach ($this->correctAnsArray as $qno=>$correctAns)
		{
			if(!isset($optionBalanceArray[$correctAns]))
			$optionBalanceArray[$correctAns] = 0;
			$optionBalanceArray[$correctAns]++;
		}
		ksort($optionBalanceArray);
		return $optionBalanceArray;
	}

	function saveQuesOrder($connid)
	{
		
		if(is_array($this->qcodeArray) && count($this->qcodeArray) >0)
		{
			$arrQuesReportingHead = $this->getReportingIDquesWise($connid);
			if($this->subjectno == 2 || $this->subjectno == 3)
			{
				$flag = $this->reorderValidation($connid);
				if($flag != 0)
				{
					$this->error = "<div align='center'><font color='red'><b>Questions are not in proper order of their Reporting heads Please check the details</b></font></div>";
					return false;
				}
			}
			foreach($this->qcodeArray as $index => $qcode)
			{
				$arrQcodeList[$qcode] = $this->quesNo[$index];
			}
			asort($arrQcodeList);
			foreach($arrQcodeList as $qkey => $qno)
			{
				$rh = $arrQuesReportingHead[$qkey];
				$arrRhQcodeList[$rh][] = $qkey;
			}
			foreach($arrRhQcodeList as $reportingHd => $arrQlist)
			{
				$strRh = "";
				$strRh = implode(",",$arrRhQcodeList[$reportingHd]);
				if($strRh != "")
				{
					$query = "UPDATE da_reportingDetails SET qcode_list = '".$strRh."' WHERE reporting_id = '".$reportingHd."' ";
					$dbquery = new dbquery($query,$connid);
				}
			}
			$qcodestr = implode(",",array_keys($arrQcodeList));

			$query = "UPDATE da_paperDetails SET qcode_list = '".$qcodestr."' WHERE papercode = '".$this->papercode."' AND version = '1' ";
			$dbquery = new dbquery($query,$connid);
		}
	}
	function reorderValidation($connid)
	{
		$flag = 0;
		if(is_array($this->quesRHdetails) && count($this->quesRHdetails) >0)
		{
			foreach($this->quesRHdetails as $index => $rh)
			{
				$arrReportingDetails[$rh][] = $this->quesNo[$index];
			}
		}
		foreach($arrReportingDetails as $head => $qnohead)
		{
			sort($qnohead);
			
			for($j=1;$j<count($qnohead);$j++)
			{				
				if(($qnohead[$j] - $qnohead[$j-1]) > 1)
				{
					$flag = 1;
				}
			}
		}
		
		return $flag;
	}
	function getSubTopicWiseDetails($connid)
	{
		$arrRet = array();
		$query = "SELECT b.subtopic_code, description, group_concat(qno ORDER BY qno SEPARATOR ', ') as ques, count(a.qcode) as quescount
                  FROM   da_testDetails a, da_subtopicMaster_old b, da_questions_old c
                  WHERE  a.qcode=c.qcode AND c.subtopic_code=b.subtopic_code AND papercode='".$this->papercode."'
                  GROUP BY subtopic_code ORDER BY qno";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["subtopic_code"]] = array("subtopic"=>$row["description"],"ques"=>$row["ques"],"quescount"=>$row["quescount"]);
		}
		return $arrRet;
	}
	function getSubSubtopicWiseDetails($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$arrRet = array();
		
		$querySel = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."' AND version = 1";
		$dbquerySel = new dbquery($querySel,$connid);
		$rowSel = $dbquerySel->getrowarray();

		$query = "SELECT description,group_concat(a.qcode ORDER BY FIELD(a.qcode,".$rowSel["qcode_list"].") SEPARATOR ', ') as ques,count(a.qcode) as quescount,a.sub_subtopic_code FROM da_questions a,da_subSubTopicMaster b WHERE a.sub_subtopic_code = b.sub_subtopic_code AND qcode IN (".$rowSel["qcode_list"].") GROUP BY a.sub_subtopic_code";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["sub_subtopic_code"]] = array("sub_subtopic"=>$row["description"],"ques"=>$row["ques"],"quescount"=>$row["quescount"]);
		}
		return $arrRet;
	}
	function addQuestionsToTest($connid)
	{
		if(is_array($this->qcodeArray) && count($this->qcodeArray) >0)
		{
			$strqcode = implode(",",$this->qcodeArray);
			$arrPaperCode = explode("_v",$this->papercode);
			$papercode = $arrPaperCode["0"];
			$arrReportingHeads = $this->getReportingOrderSSTwise($connid,$papercode);
			$arrUniqueHeads = array_unique($arrReportingHeads);
			$version = 1;
			$queryCheck = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' AND version = '".$version."' AND qcode_list != '' ";
			$dbqueryCheck = new dbquery($queryCheck,$connid);
			$rowCheck = $dbqueryCheck->getrowarray();
			if($this->subjectno == 2 || $this->subjectno == 3)
			{
				if($dbqueryCheck->numrows() > 0)
				{
					$querysst = "SELECT sub_subtopic_code,qcode FROM da_questions WHERE qcode IN (".$rowCheck["qcode_list"].") ORDER BY FIELD(qcode,".$rowCheck["qcode_list"].")";
					$dbquerysst = new dbquery($querysst,$connid);
					while($rowsst = $dbquerysst->getrowarray())
					{
						$rh = $arrReportingHeads[$rowsst["sub_subtopic_code"]];
						$arrSST[$rh][] = $rowsst["qcode"];

					}
					$querynsst = "SELECT sub_subtopic_code,qcode FROM da_questions WHERE qcode IN (".$strqcode.")";
					$dbquerynsst = new dbquery($querynsst,$connid);
					while($rownsst = $dbquerynsst->getrowarray())
					{
						$rhn = $arrReportingHeads[$rownsst["sub_subtopic_code"]];
						$arrSST[$rhn][] = $rownsst["qcode"];

					}
					$arrSSTrh = array_keys($arrSST);
					asort($arrSSTrh);
					foreach($arrSSTrh as $key => $value)
					{
						$arrQcodes[] = implode(",",$arrSST[$value]);
					}
					
					$qcode_list = implode(",",$arrQcodes);
				}
				else
				{
					foreach($this->qcodeArray as $index => $qcode)
					{
						$arrNewQcodes[$qcode] = $this->ques_rhArray[$qcode];
					}

					asort($arrNewQcodes);
					$arrDetails = array_keys($arrNewQcodes);
					$qcode_list = implode(",",$arrDetails);
				}
								
				$query = "UPDATE da_paperDetails SET qcode_list ='".$qcode_list."',lastModifiedBy = '".$_SESSION["username"]."',lastModifiedBy = '".$_SESSION["username"]."' WHERE papercode = '".$papercode."' AND version = '".$version."'  ";
				$dbquery = new dbquery($query,$connid);
			}
			else
			{
				if($rowCheck["qcode_list"] != "")
				$engqcodelist = $rowCheck["qcode_list"].",".$strqcode;
				else
				$engqcodelist = $strqcode;

				$modengqcodelist = $this->getGroupWiseArrangedList($connid,$engqcodelist);
				if($modengqcodelist != "")
				{
					$query = "UPDATE da_paperDetails SET qcode_list ='".$modengqcodelist."',lastModifiedBy = '".$_SESSION["username"]."',lastModifiedBy = '".$_SESSION["username"]."' WHERE papercode = '".$papercode."' AND version = '".$version."'  ";
					$dbquery = new dbquery($query,$connid);
				}
			}
		}
		echo "<script language='javascript'>";
		echo 'window.opener.pageSubmit();';
		echo 'self.close();';
		echo "</script>";		
	}
	/*
	Following is the new question added (by Jaspreet) to get the new
	Method of adding the questions to Paper as per the reporting ID
	Parameter : Connection ID
	*/
	function addQuestionsToPaper($connid)
	{
		
		if(is_array($this->qcodeArray) && count($this->qcodeArray) >0)
		{
			$strqcode = implode(",",$this->qcodeArray);
			$strconcat = "";
			$strPaper = "";
			$query = "SELECT qcode_list FROM da_reportingDetails WHERE reporting_id = '".$this->reportingID."' ";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($row["qcode_list"] != "")
			{
				$strconcat = $row["qcode_list"].",".$strqcode;
				$arr_strconcat = explode(",",$strconcat);
				$arr_unistrconcat = array_unique($arr_strconcat);
				$unistrconcat = implode(",",$arr_unistrconcat);

				$queryQues = "UPDATE da_reportingDetails SET qcode_list = '".$unistrconcat."',same_ans_que_flag='0' WHERE reporting_id = '".$this->reportingID."' ";
				$dbqueryQues = new dbquery($queryQues,$connid);
				if($this->subjectno == 1)
				{
					######################For same answer checking#####################
					$this->commonForReportingHeadChecking($this->papercode,$connid,$this->reportingID);
					######################For same answer checking#####################				
				}	
				#########################Check For update######################### 				
				$this->updateProcessStatusFlag($connid);			
				#########################Check For update######################### 
			}
			else
			{
				$queryQues = "UPDATE da_reportingDetails SET qcode_list = '".$strqcode."',same_ans_que_flag='0' WHERE reporting_id = '".$this->reportingID."' ";
				$dbqueryQues = new dbquery($queryQues,$connid);
				if($this->subjectno == 1)
				{
					######################For same answer checking#####################
					$this->commonForReportingHeadChecking($this->papercode,$connid,$this->reportingID);
					######################For same answer checking#####################					
				}	
				#########################Check For update######################### 				
				$this->updateProcessStatusFlag($connid);			
				#########################Check For update######################### 
			}
			$this->updatePaperDetails($connid);
			
			echo "<script language='javascript'>";
			echo 'window.opener.pageSubmit();';
			echo 'self.close();';
			echo "</script>";
		}
	}
	function updatePaperDetails($connid)
	{
		$strqcode = implode(",",$this->qcodeArray);

		$queryQlist = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."' AND version = 1";
		$dbqueryQlist = new dbquery($queryQlist,$connid);
		$rowQlist = $dbqueryQlist->getrowarray();
		if($rowQlist["qcode_list"] != "")
		$strqcode = $rowQlist["qcode_list"].",".$strqcode;

		$queryPaper = "SELECT qcode_list FROM da_reportingDetails WHERE papercode = '".$this->papercode."' ORDER BY reporting_order ";
		$dbqueryPaper = new dbquery($queryPaper,$connid);
		if($dbqueryPaper->numrows() > 0)
		{
			$strPaper = "";
			while($rowPaper = $dbqueryPaper->getrowarray())
			{
				if($rowPaper["qcode_list"] != "")
				$strPaper.=$rowPaper["qcode_list"].",";
			}
			if($strPaper != "")
			$strPaper = substr($strPaper,0,-1);

			if($this->subjectno == "1" && $strqcode != "")
			{
				$modengqcodelist = $this->getGroupWiseArrangedList($connid,$strqcode);
			}
			else
			{
				$modengqcodelist = $strPaper;
			}

			$queryUpdate = "UPDATE da_paperDetails SET qcode_list = '".$modengqcodelist."' WHERE papercode = '".$this->papercode."' AND version = '1' ";
			$dbqueryUpdate = new dbquery($queryUpdate,$connid);
		}
	}
	function getMaxQuesNo($connid,$paperCode)
	{
		$query = "SELECT IFNULL(MAX(qno)+1,1) FROM da_testDetails WHERE papercode = '".$paperCode."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function validationFinalize($connid)
	{
		$arrRet = array();
		$qcode_list = "";
		$qcode_meri_list = "";
		
		$queryGetDate = "SELECT lastPdfGenerated,paper_code FROM da_testRequest WHERE id = '".$this->test_requestid."' ";
		$dbqueryGetDate = new dbquery($queryGetDate,$connid);
		$rowGetDate = $dbqueryGetDate->getrowarray();
		
		if($this->action == "Approve")
		{
			$stringmessage = "";
			for($v=1;$v<=4;$v++)
			{
			$queryCheckCode = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$rowGetDate["paper_code"]."' AND version = '".$v."'";
			$dbqueryCheckCode = new dbquery($queryCheckCode,$connid);
			$rowCheck = $dbqueryCheckCode->getrowarray();
			$rowCheckCode[$v] = $rowCheck['qcode_list'];
			$arrSetCheck[$v] = explode(",",$rowCheckCode[$v]);
						
			if($v>1)
				{
					$stringmessage = "";
					$result = array_diff($arrSetCheck[1], $arrSetCheck[$v]);
					$result1 = array_diff($arrSetCheck[$v], $arrSetCheck[1]);
					$str = "";
					$str1 = "";
										
					if(isset($result) && count($result)>0)	
						$str = implode(",",$result);		
					if(isset($result1) && count($result1)>0)
						$str1 = implode(",",$result1);		
						
					if($str!="")
					{
						if($str1=="")
							$br = "</div>";
						else 
							$br = "";
							 
						$stringmessage = "<div>Qcode(s) ".$str." in version-1 not in version-".$v.".".$br."";
					}
					if($str1!="")
					{
						$stringmessage .= " Qcode(s) ".$str1." in version-".$v." not in version-1.</div>";
					}
					if($stringmessage!="")
					{
						$arrRet['qcodecheckcount'] .= $stringmessage;
					}						
				}
			
			}	
			if($arrRet['qcodecheckcount']!="")
			{
				$arrRet['qcodecheckcount']  = $arrRet['qcodecheckcount']."<br/>"; 		
			}
			
		}	
		if($rowGetDate["lastPdfGenerated"] == "0000-00-00 00:00:00")
		$arrRet["noPdfError"] = "No PDF has been generated for the paper to finalize it";

		$queryCode = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$rowGetDate["paper_code"]."' AND version = 1";
		$dbqueryCode = new dbquery($queryCode,$connid);
		$rowCode = $dbqueryCode->getrowarray();

		$queryPaper = "SELECT COUNT(*) FROM da_paperDetails WHERE papercode = '".$rowGetDate["paper_code"]."' AND version = 1 AND lastModifiedDate > '".$rowGetDate["lastPdfGenerated"]."'";
		$dbqueryPaper = new dbquery($queryPaper,$connid);
		$rowPaper = $dbqueryPaper->getrowarray();
		if($rowPaper[0] > 0 && $arrRet["noPdfError"] == "")
		$arrRet["paperError"] = "The paper has been modified and the PDF for this has not been generated after that";

		$query = "SELECT qcode FROM da_questions WHERE qcode IN (".$rowCode["qcode_list"].") AND lastModified > '".$rowGetDate["lastPdfGenerated"]."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$qcode_list.=$row["qcode"].",";
		}
		$qcode_list = substr($qcode_list,0,-1);
		if($qcode_list != "" && $arrRet["noPdfError"] == "")
		$arrRet["qcodeError"] = "Qcodes : ".$qcode_list." are modified and after that the PDF for this paper has not been generated.";

		/*start change by 16/12/2011*/
		$queryMERI = "SELECT qcode,remedial_instruction,mcexplanation FROM da_questions WHERE misconception=1 AND qcode in (".$rowCode["qcode_list"].")";
		$dbqueryMERI = new dbquery($queryMERI,$connid);
		while($rowMERI = $dbqueryMERI->getrowarray())
		{
			$misexplaination_check =  str_replace('&nbsp;','',strip_tags($rowMERI['mcexplanation']));
			$remedial_instruction_check = str_replace('&nbsp;','',strip_tags($rowMERI['remedial_instruction']));
			if((trim($misexplaination_check)=='') || (trim($remedial_instruction_check) == ''))
			{
				$qcode_meri_list.=$rowMERI["qcode"].",";
			}
		}
		
		/*end by 16/12/2011*/

		$qcode_meri_list = substr($qcode_meri_list,0,-1);
		if($qcode_meri_list != "")
		$arrRet["noMisExpError"] = "Qcode : ".$qcode_meri_list." are misconception question(s) with ME/RI missing";

		if($this->action != "Finalize")
		{
			$arrQcodes = $this->getQuesImagesValidityToFinalize($connid,$rowCode["qcode_list"]);
			if(is_array($arrQcodes) && count($arrQcodes)>0)
			$arrRet["imgAppPendingError"] = "Qcode : ".implode(",",$arrQcodes)." are having the images pending to be approved";
			
			
			################################################################################################################################(05-07-2012)
			$arrValidationsCheck = $this->validationGeneratePDF($connid);
			if($arrValidationsCheck["qcodeListPending"]!="")
			{
				$qcodes = explode(",",$arrValidationsCheck["qcodeListPending"]);			
			}			
			
			
			#For Reporting Head Blank Validation
			if(isset($arrValidationsCheck) && count($arrValidationsCheck)>0)
			{		
				if($arrValidationsCheck["reportingHeadError"]=="Yes")
				{
					$arrRet["reportingHeadError"] = "Reporting head have blank qcode list";										
				}
			}			
			#For Reporting Head Blank Validation
			
			
			#For Date of exam Validation
			if(isset($arrValidationsCheck) && count($arrValidationsCheck)>0)
			{		
				if($arrValidationsCheck["testDateError"]=="Yes")
				{
					$arrRet["testDateError"] = "Test date is missing";					
				}
			}
			#For Date of exam Validation
			
			#For Name of exam Validation
			if(isset($arrValidationsCheck) && count($arrValidationsCheck)>0)
			{		
				if($arrValidationsCheck["testNameError"]=="Yes")
				{
					$arrRet["testNameError"] = "Test name is missing";					
				}
			}
			#For Name of exam Validation

			#For Class Validation
			if(isset($arrValidationsCheck) && count($arrValidationsCheck)>0)
			{		
				if($arrValidationsCheck["classError"]=="Yes")
				{
					$arrRet["classError"] = "Class is missing";										
				}
			}
			#For Class Validation
			
			#For SchoolName Validation
			if(isset($arrValidationsCheck) && count($arrValidationsCheck)>0)
			{		
				if($arrValidationsCheck["schoolnameError"]=="Yes")
				{
					$arrRet["schoolnameError"] = "Schoolname is missing";					
				}
			}
			#For SchoolName Validation
			
			#For No of Question Validation
			if(isset($arrValidationsCheck) && count($arrValidationsCheck)>0)
			{		
				if($arrValidationsCheck["noofQuestionError"]=="Yes")
				{
					$arrRet["noofQuestionError"] = "No question is there in paper for pdf generation";					
				}
			}			
			#For No of Question Validation			
			
			#For Examcode Validation
			if(isset($arrValidationsCheck) && count($arrValidationsCheck)>0)
			{		
				if($arrValidationsCheck["examcodeError"]=="Yes")
				{					
					$arrRet["examcodeError"] = "Examcode is missing";				
				}
			}				
			#For Examcode Validation						
						
			#For Table td blank
			if($arrValidationsCheck["tdblanklist"]!="")
			{				
				$arrRet["tdblanklist"] ="Qcode : ".$arrValidationsCheck["tdblanklist"]." are having line blank in table";			
			}
						
			#For Image Missing Validation
			if($arrValidationsCheck["imagemissing"]!="")
			{
				$arrRet["imagemissing"] = "Qcode : ".$arrValidationsCheck["imagemissing"]." are having the images missing";				
			}
			#For Image Missing Validation
			
			#For Image jpg Validation
			if($arrValidationsCheck["imagejpg"]!="")
			{
				$arrRet["imagejpg"] = "Qcode : ".$arrValidationsCheck["imagejpg"]." have not jpg type images";				
			}
			#For Image jpg Validation
			
			#For Image height width Validation
			if($arrValidationsCheck["imageheightwidthQcodeList"]!="")
			{
				$arrRet["imageheightwidthQcodeList"] = "Qcode : ".$arrValidationsCheck["imageheightwidthQcodeList"]." have not satisfied height and width condition for images";	
			}
			#For Image height width Validation
			
			#For Image dpi Validation
			if($arrValidationsCheck["imagedpi"]!="")
			{
				$arrRet["imagedpi"] = "Qcode : ".$arrValidationsCheck["imagedpi"]." have not satisfied dpi condition for images";				
			}
			#For Image dpi Validation
				
			
			################################################################################################################################(05-07-2012)
			
			
			
		}
		
		return $arrRet;
	}
	
	#For Time Taken In paper 
	function getTimeTakenForPaper($request_id,$flag_set,$connid)
	{
		$time_taken = 0;		
		if($flag_set=="finalize")
		{
			$query = "SELECT seconds FROM da_timerTestRequest where request_id = '$request_id'";
		}
		if($flag_set == "approve")
		{
			$query = "SELECT approve_seconds FROM da_timerTestRequest where request_id = '$request_id'";
		}
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{			
			if($flag_set=="finalize")
			{
				$init = $row["seconds"];
			}
			if($flag_set == "approve")
			{
				$init = $row["approve_seconds"];
			}
			$minutes = floor(($init / 60) % 60);
		    $seconds = $init % 60;
		    if(strlen($seconds)==1)
		    {
		    	$seconds = "0".$seconds;
		    }
			$time_taken = $minutes.":".$seconds;

		}
		return $time_taken;
	}
	#For Time Taken In paper 
	
	function getTestRequestsForAuto($connid)
	{
		$arrRet = array();
		$this->setgetvars();
		$this->setpostvars();
		
		if($this->action == "SearchRequestsAuto")
		{
			if(isset($this->searchClass) && $this->searchClass != '')
			$condition.=" AND a.class = '".$this->searchClass."' ";
			if(isset($this->testSubject) && $this->testSubject != "")
			$condition.=" AND subject = '".$this->testSubject."' ";
			if(isset($this->startDate) && $this->startDate != "")
			$condition.=" AND DATE(a.approved_date) >= '".daformatDate($this->startDate)."' ";
			if(isset($this->endDate) && $this->endDate != "")
			$condition.=" AND DATE(a.approved_date) <= '".daformatDate($this->endDate)."' ";
		}
		$query = "SELECT a.*
				  FROM da_testRequest a 
				  WHERE a.schoolCode != '0'".$condition;
		$query.= " ORDER BY approved_date";
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{	
			#For Time Taken In paper 
			$time_taken = "";			
			$time_taken = $this->getTimeTakenForPaper($row['id'],'finalize',$connid);
			$time_taken_approval = "";			
			$time_taken_approval = $this->getTimeTakenForPaper($row['id'],'approve',$connid);
			#For Time Taken In paper 
			
			if($this->testSubject == 1)
			{
				$passages = array();		
				$passageSetArr = array();
				$queryFetchPassage = "SELECT passage_id from da_questionSelectionSummary where request_id = '".$row["id"]."'";
				$dbqueryFetchPassage = new dbquery($queryFetchPassage,$connid);
				while($rowFetchPassage = $dbqueryFetchPassage->getrowarray())
				{
					if($rowFetchPassage["passage_id"]!=0)
					{
						$passageSetArr[$rowFetchPassage["passage_id"]] = $rowFetchPassage["passage_id"];
					}	
				}
				if(isset($passageSetArr) && count($passageSetArr)>0)
				{
					foreach($passageSetArr as $key => $value)
					{							
						$chapter_name = "";
						$chapter_name_id = "";
						$queryFetchChapter = "SELECT passage_name,passage_id from qms_passage where passage_id = '$value'";
						$dbqueryFetchChapter = new dbquery($queryFetchChapter,$connid);
						while($rowFetchChapter = $dbqueryFetchChapter->getrowarray())
						{
							$chapter_name = $rowFetchChapter["passage_name"];
							$chapter_name_id = $rowFetchChapter["passage_id"];
						}						
						
						if($row["flag"]=="Auto" || $row["flag"]=="System Approved")
						{
							$queryAuto = "SELECT * from da_questionSelectionSummary where request_id = '".$row['id']."' AND passage_id = '".$chapter_name_id."' AND type = 'Auto'";
							$dbqueryAuto = new dbquery($queryAuto,$connid);
							while($rowAuto = $dbqueryAuto->getrowarray())
							{
								$question_list_for_auto = "";
								$arrRet[$row['id']][$chapter_name_id]["approved_date"] = date("Y-m-d",strtotime($row["approved_date"]));
								$arrRet[$row['id']][$chapter_name_id]["chapter_name"] = $chapter_name;
								$arrRet[$row['id']][$chapter_name_id]["build_mode"] = $row["flag"];
								$auto_type = "";
								if($row["auto_type"]==1)
								{
									$auto_type = "SC-DS";
								}
								if($row["auto_type"]==2)
								{
									$auto_type = "SC-SS";
								}
								if($row["auto_type"]==3)
								{
									$auto_type = "NC";
								}
								
								$arrRet[$row['id']][$chapter_name_id]["assembly_type"] = $auto_type;
								$arrRet[$row['id']][$chapter_name_id]["auto_qs_selected"] = $rowAuto["questions_selected"];
								$arrRet[$row['id']][$chapter_name_id]["reset"] = $row["reset_flag"];
								$question_list_for_auto = $rowAuto["qcode_all_list"];
							}
							$queryFinalize = "SELECT * from da_questionSelectionSummary where request_id = '".$row['id']."' AND passage_id = '".$chapter_name_id."' AND type = 'Finalize'";
							$dbqueryFinalize = new dbquery($queryFinalize,$connid);
							while($rowFinalize = $dbqueryFinalize->getrowarray())
							{
								$question_list_for_finalize = $rowFinalize["qcode_all_list"];
								$arrRet[$row['id']][$chapter_name_id]["finalize_qs_selected"] = $rowFinalize["questions_selected"];
								$arrRet[$row['id']][$chapter_name_id]["no_copies_unique"] = $rowFinalize["unique_repeated_count"];
								$arrRet[$row['id']][$chapter_name_id]["no_copies_unique_list"] = $rowFinalize["unique_repeated_qcode_list"];
								$arrRet[$row['id']][$chapter_name_id]["no_mc_copies"] = $rowFinalize["mc_copies_no_count"];
								$arrRet[$row['id']][$chapter_name_id]["finalize_unused_questions_added"] = $rowFinalize["unused_questions_added"];
								$arrRet[$row['id']][$chapter_name_id]["finalize_unused_question_added_list"] = $rowFinalize["unused_question_added_list"];
								
								$questionArrayAuto = array();
								$questionArrayFinalize =  array();
								$questionDropped = array();
								$questionAdded =  array();
								if($question_list_for_auto!="")
								{
									$questionArrayAuto = explode(",",$question_list_for_auto);
								}
								if($question_list_for_finalize!="")
								{	
									$questionArrayFinalize = explode(",",$question_list_for_finalize);
								}
								if(isset($questionArrayAuto) && count($questionArrayAuto)>0)
								{
									foreach($questionArrayAuto as $keyArrayAuto => $valueArrayAuto){
										if(!in_array($valueArrayAuto,$questionArrayFinalize))
										{
											$questionDropped[$valueArrayAuto] = $valueArrayAuto;
										}
									}
								}
								if(isset($questionArrayFinalize) && count($questionArrayFinalize)>0)
								{	
									foreach($questionArrayFinalize as $keyArrayFinalize => $valueArrayFinalize){
										if(!in_array($valueArrayFinalize,$questionArrayAuto))
										{
											$questionAdded[$valueArrayFinalize] = $valueArrayFinalize;
										}
									}
								}
								$question_dropped_count = 0;
								$question_added_count = 0;
								$question_dropped_list = "";
								$question_added_list = "";
								
								if(isset($questionDropped) && count($questionDropped)>0)
								{
									$question_dropped_count = count($questionDropped);
								}
								if(isset($questionAdded) && count($questionAdded)>0)
								{
									$question_added_count = count($questionAdded);
								}
								if(isset($questionDropped) && count($questionDropped)>0)
								{	
									foreach($questionDropped as $keyDropped => $valueDropped)
									{
										$question_dropped_list .= $valueDropped.",";
									}
								}	
								if(isset($questionAdded) && count($questionAdded)>0)
								{
									foreach($questionAdded as $keyAdded => $valueAdded)
									{
										$question_added_list .= $valueAdded.",";
									}
								}	
								$question_dropped_list = substr_replace($question_dropped_list,"",-1);
								$question_added_list = substr_replace($question_added_list,"",-1);
								
								$arrRet[$row['id']][$chapter_name_id]["dropped_question_count"] = $question_dropped_count;
								$arrRet[$row['id']][$chapter_name_id]["added_question_count"] = $question_added_count;
								$arrRet[$row['id']][$chapter_name_id]["dropped_question_list"] = $question_dropped_list;
								$arrRet[$row['id']][$chapter_name_id]["added_question_list"] = $question_added_list;								
							}
							
							$queryScoring = "SELECT * from da_questionSelectionSummary where request_id = '".$row['id']."' AND passage_id = '".$chapter_name_id."' AND type = 'Scoring'";
							$dbqueryScoring = new dbquery($queryScoring,$connid);
							while($rowScoring = $dbqueryScoring->getrowarray())
							{
								$question_list_for_scoring = $rowScoring["qcode_all_list"];
								$arrRet[$row['id']][$chapter_name_id]["scoring_qs_selected"] = $rowScoring["questions_selected"];
								$question_dropped_scoring_count = "";
								$question_dropped_scoring_list = "";
								$questionArrayAllAuto = array();
								$questionArrayScoring = array();
								$questionDroppedScoring = array();
								if($question_list_for_auto!="")
								{
									$questionArrayAllAuto = explode(",",$question_list_for_auto);
								}
								if($question_list_for_scoring!="")
								{	
									$questionArrayScoring = explode(",",$question_list_for_scoring);
								}	
								if(isset($questionArrayAllAuto) && count($questionArrayAllAuto)>0)
								{
									foreach($questionArrayAllAuto as $keyArrayAllAuto => $valueArrayAllAuto){
										if(!in_array($valueArrayAllAuto,$questionArrayScoring))
										{
											$questionDroppedScoring[$valueArrayAllAuto] = $valueArrayAllAuto;
										}
									}
								}	
								$question_dropped_scoring_count = 0;
								$question_dropped_scoring_list = "";
								if(isset($questionDroppedScoring) && count($questionDroppedScoring)>0)
								{
									$question_dropped_scoring_count = count($questionDroppedScoring);
									foreach($questionDroppedScoring as $keyDroppedScoring => $valueDroppedScoring)
									{
										$question_dropped_scoring_list .= $valueDroppedScoring.",";
									}
									$question_dropped_scoring_list = substr_replace($question_dropped_scoring_list,"",-1);
								}	
								$arrRet[$row['id']][$chapter_name_id]["dropped_question_scoring_count"] = $question_dropped_scoring_count;
								$arrRet[$row['id']][$chapter_name_id]["dropped_question_scoring_list"] = $question_dropped_scoring_list;
							}
						}
						#For Time Taken In paper 
						$arrRet[$row['id']][$chapter_name_id]["time"] = $time_taken;
						$arrRet[$row['id']][$chapter_name_id]["time_approve"] = $time_taken_approval;
						#For Time Taken In paper 
					}
				}				
			}
			
			$chapters = array();		
			$chapters = explode(",",$row["chapter_id"]);
			foreach($chapters as $key => $value)
			{					
				$chapter_name = "";
				$chapter_name_id = "";
				$queryFetchChapter = "SELECT chapter_name,chapter_id from da_chapterMaster where chapter_id = '$value'";
				$dbqueryFetchChapter = new dbquery($queryFetchChapter,$connid);
				while($rowFetchChapter = $dbqueryFetchChapter->getrowarray())
				{
					$chapter_name = $rowFetchChapter["chapter_name"];
					$chapter_name_id = $rowFetchChapter["chapter_id"];
				}
				if($row["flag"]=="Auto" || $row["flag"]=="System Approved")
				{
					$queryAuto = "SELECT * from da_questionSelectionSummary where request_id = '".$row['id']."' AND chapter_id = '".$chapter_name_id."' AND type = 'Auto'";
					$dbqueryAuto = new dbquery($queryAuto,$connid);
					while($rowAuto = $dbqueryAuto->getrowarray())
					{
						$question_list_for_auto = "";
						$arrRet[$row['id']][$chapter_name_id]["approved_date"] = date("Y-m-d",strtotime($row["approved_date"]));
						$arrRet[$row['id']][$chapter_name_id]["chapter_name"] = $chapter_name;
						$arrRet[$row['id']][$chapter_name_id]["build_mode"] = $row["flag"];
						$auto_type = "";
						if($row["auto_type"]==1)
						{
							$auto_type = "SC-DS";
						}
						if($row["auto_type"]==2)
						{
							$auto_type = "SC-SS";
						}
						if($row["auto_type"]==3)
						{
							$auto_type = "NC";
						}
						
						$arrRet[$row['id']][$chapter_name_id]["assembly_type"] = $auto_type;
						$arrRet[$row['id']][$chapter_name_id]["auto_qs_selected"] = $rowAuto["questions_selected"];
						$arrRet[$row['id']][$chapter_name_id]["reset"] = $row["reset_flag"];
						$question_list_for_auto = $rowAuto["qcode_all_list"];
					}
					$queryFinalize = "SELECT * from da_questionSelectionSummary where request_id = '".$row['id']."' AND chapter_id = '".$chapter_name_id."' AND type = 'Finalize'";
					$dbqueryFinalize = new dbquery($queryFinalize,$connid);
					while($rowFinalize = $dbqueryFinalize->getrowarray())
					{
						$question_list_for_finalize = $rowFinalize["qcode_all_list"];
						$arrRet[$row['id']][$chapter_name_id]["finalize_qs_selected"] = $rowFinalize["questions_selected"];
						$arrRet[$row['id']][$chapter_name_id]["no_copies_unique"] = $rowFinalize["unique_repeated_count"];
						$arrRet[$row['id']][$chapter_name_id]["no_copies_unique_list"] = $rowFinalize["unique_repeated_qcode_list"];
						$arrRet[$row['id']][$chapter_name_id]["no_mc_copies"] = $rowFinalize["mc_copies_no_count"];
						$arrRet[$row['id']][$chapter_name_id]["finalize_unused_questions_added"] = $rowFinalize["unused_questions_added"];
						$arrRet[$row['id']][$chapter_name_id]["finalize_unused_question_added_list"] = $rowFinalize["unused_question_added_list"];
						
						$questionArrayAuto = array();
						$questionArrayFinalize =  array();
						$questionDropped = array();
						$questionAdded =  array();
						if($question_list_for_auto!="")
						{
							$questionArrayAuto = explode(",",$question_list_for_auto);
						}
						if($question_list_for_finalize!="")
						{	
							$questionArrayFinalize = explode(",",$question_list_for_finalize);
						}
						if(isset($questionArrayAuto) && count($questionArrayAuto)>0)
						{	
							foreach($questionArrayAuto as $keyArrayAuto => $valueArrayAuto){
								if(!in_array($valueArrayAuto,$questionArrayFinalize))
								{
									$questionDropped[$valueArrayAuto] = $valueArrayAuto;
								}
							}
						}
						if(isset($questionArrayFinalize) && count($questionArrayFinalize)>0)
						{	
							foreach($questionArrayFinalize as $keyArrayFinalize => $valueArrayFinalize){
								if(!in_array($valueArrayFinalize,$questionArrayAuto))
								{
									$questionAdded[$valueArrayFinalize] = $valueArrayFinalize;
								}
							}
						}	
						$question_dropped_count = 0;
						$question_added_count = 0;
						$question_dropped_list = "";
						$question_added_list = "";
						
						if(isset($questionDropped) && count($questionDropped)>0)
						{
							$question_dropped_count = count($questionDropped);
						}
						if(isset($questionAdded) && count($questionAdded)>0)	
						{
							$question_added_count = count($questionAdded);
						}	
						if(isset($questionDropped) && count($questionDropped)>0)
						{
							foreach($questionDropped as $keyDropped => $valueDropped)
							{
								$question_dropped_list .= $valueDropped.",";
							}
						}
						if(isset($questionAdded) && count($questionAdded)>0)	
						{	
							foreach($questionAdded as $keyAdded => $valueAdded)
							{
								$question_added_list .= $valueAdded.",";
							}
						}	
						$question_dropped_list = substr_replace($question_dropped_list,"",-1);
						$question_added_list = substr_replace($question_added_list,"",-1);
						
						$arrRet[$row['id']][$chapter_name_id]["dropped_question_count"] = $question_dropped_count;
						$arrRet[$row['id']][$chapter_name_id]["added_question_count"] = $question_added_count;
						$arrRet[$row['id']][$chapter_name_id]["dropped_question_list"] = $question_dropped_list;
						$arrRet[$row['id']][$chapter_name_id]["added_question_list"] = $question_added_list;
					}
					
					$queryScoring = "SELECT * from da_questionSelectionSummary where request_id = '".$row['id']."' AND chapter_id = '".$chapter_name_id."' AND type = 'Scoring'";
					$dbqueryScoring = new dbquery($queryScoring,$connid);
					while($rowScoring = $dbqueryScoring->getrowarray())
					{
						$question_list_for_scoring = $rowScoring["qcode_all_list"];
						$arrRet[$row['id']][$chapter_name_id]["scoring_qs_selected"] = $rowScoring["questions_selected"];
						$question_dropped_scoring_count = "";
						$question_dropped_scoring_list = "";
						$questionArrayAllAuto = array();
						$questionArrayScoring = array();
						$questionDroppedScoring = array();
						if($question_list_for_auto!="")
						{
							$questionArrayAllAuto = explode(",",$question_list_for_auto);
						}
						if($question_list_for_scoring!="")
						{	
							$questionArrayScoring = explode(",",$question_list_for_scoring);
						}	
						if(isset($questionArrayAllAuto) && count($questionArrayAllAuto)>0)
						{
							foreach($questionArrayAllAuto as $keyArrayAllAuto => $valueArrayAllAuto){
								if(!in_array($valueArrayAllAuto,$questionArrayScoring))
								{
									$questionDroppedScoring[$valueArrayAllAuto] = $valueArrayAllAuto;
								}
							}
						}	
						$question_dropped_scoring_count = 0;
						$question_dropped_scoring_list = "";
						if(isset($questionDroppedScoring) && count($questionDroppedScoring)>0)
						{
							$question_dropped_scoring_count = count($questionDroppedScoring);
							foreach($questionDroppedScoring as $keyDroppedScoring => $valueDroppedScoring)
							{
								$question_dropped_scoring_list .= $valueDroppedScoring.",";
							}
							$question_dropped_scoring_list = substr_replace($question_dropped_scoring_list,"",-1);
						}	
						$arrRet[$row['id']][$chapter_name_id]["dropped_question_scoring_count"] = $question_dropped_scoring_count;
						$arrRet[$row['id']][$chapter_name_id]["dropped_question_scoring_list"] = $question_dropped_scoring_list;
					}
					#For Time Taken In paper 
					$arrRet[$row['id']][$chapter_name_id]["time"] = $time_taken;
					$arrRet[$row['id']][$chapter_name_id]["time_approve"] = $time_taken_approval;
					#For Time Taken In paper 
				}
				else 
				{
					$arrRet[$row['id']][$chapter_name_id]["approved_date"] = date("Y-m-d",strtotime($row["approved_date"]));
					$arrRet[$row['id']][$chapter_name_id]["chapter_name"] = $chapter_name;
					$arrRet[$row['id']][$chapter_name_id]["build_mode"] = $row["flag"];
					$arrRet[$row['id']][$chapter_name_id]["assembly_type"] = "";
					$arrRet[$row['id']][$chapter_name_id]["auto_qs_selected"] = "";
					$arrRet[$row['id']][$chapter_name_id]["reset"] = "";
					$count_selected = $this->getManualQsSelected($chapter_name_id,$row["paper_code"],$row["id"],$connid); 
					$arrRet[$row['id']][$chapter_name_id]["finalize_qs_selected"] = $count_selected."/".$count_selected;
					$arrRet[$row['id']][$chapter_name_id]["scoring_qs_selected"] = "";
					$arrRet[$row['id']][$chapter_name_id]["no_copies_unique"] = "";
					$arrRet[$row['id']][$chapter_name_id]["no_mc_copies"] = "";
					$arrRet[$row['id']][$chapter_name_id]["dropped_question_count"] = "";
					$arrRet[$row['id']][$chapter_name_id]["added_question_count"] = "";
					$arrRet[$row['id']][$chapter_name_id]["dropped_question_scoring_count"] = "";
					$arrRet[$row['id']][$chapter_name_id]["dropped_question_list"] = "";
					$arrRet[$row['id']][$chapter_name_id]["added_question_list"] = "";
					$arrRet[$row['id']][$chapter_name_id]["dropped_question_scoring_list"] = "";
					$arrRet[$row['id']][$chapter_name_id]["no_copies_unique_list"] = "";
					#For Time Taken In paper 
					$arrRet[$row['id']][$chapter_name_id]["time"] = $time_taken;
					$arrRet[$row['id']][$chapter_name_id]["time_approve"] = $time_taken_approval;
					#For Time Taken In paper 
				}
			}
			
		}
		return $arrRet;	
	}
	
	function getManualQsSelected($chapter_name_id,$paper_code,$request_id,$connid)
	{
		$qcode_list = "";
		$arrQcodeList = array();
		$arrSubTopicMapped = array();
		$arrSubtopicUsed = array();
		$query = "SELECT * from da_paperDetails where papercode = '$paper_code' AND version = 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$qcode_list = $row["qcode_list"];
			}
		if($this->testSubject == 1)
		{	
			if($request_id < 6610 )
			{
				$queryChapterMapped = "SELECT sub_subtopic_code from da_grammarSkillsBreakup where skill_id = '$chapter_name_id'";
				$dbqueryChapterMapped = new dbquery($queryChapterMapped,$connid);
				while($rowChapterMapped = $dbqueryChapterMapped->getrowarray())
					{
						$arrSubtopicUsed[] = $rowChapterMapped["sub_subtopic_code"];
					}	
			}
			else 
			{
				$queryChapterMapped = "SELECT subsubtopic_code from da_tbChapterMapping where chapter_id = '$chapter_name_id'";
				$dbqueryChapterMapped = new dbquery($queryChapterMapped,$connid);
				while($rowChapterMapped = $dbqueryChapterMapped->getrowarray())
					{
						$arrSubtopicUsed[] = $rowChapterMapped["subsubtopic_code"];
					}
			}	
		}
		else 
		{
			$queryChapterMapped = "SELECT subsubtopic_code from da_tbChapterMapping where chapter_id = '$chapter_name_id'";
			$dbqueryChapterMapped = new dbquery($queryChapterMapped,$connid);
			while($rowChapterMapped = $dbqueryChapterMapped->getrowarray())
				{
					$arrSubtopicUsed[] = $rowChapterMapped["subsubtopic_code"];
				}
		}
		$arrQcodeList = explode(",",$qcode_list);	
		$counter_qcode = 0;
		foreach($arrQcodeList as $keyQcodeList => $valueQcodeList)
		{
			$querySSTMapped = "SELECT sub_subtopic_code from da_questions where qcode = '$valueQcodeList'";
			$dbquerySSTMapped = new dbquery($querySSTMapped,$connid);
			while($rowSSTMapped = $dbquerySSTMapped->getrowarray())
			{
				if(in_array($rowSSTMapped["sub_subtopic_code"],$arrSubtopicUsed))
				{
					$counter_qcode = $counter_qcode+1;
					$arrSubTopicMapped[$rowSSTMapped["sub_subtopic_code"]][$valueQcodeList] = $valueQcodeList;
				}	
			}
		}	
		return $counter_qcode;
	}
	function getTestRequests($connid,$arrAdmin)
	{
		$this->setgetvars();
		$this->setpostvars();

		$condition = "";
		$year = date("Y");
		$chaptercount = 0;
		$arrChapters = $this->getChaptersByTextBooks($connid);
		$arrChapterKeys = array_keys($arrChapters);
		
		if($this->action == "SearchRequests" || $this->action == "AllotApprove")
		{

			if(isset($this->testType) && $this->testType != "" && $this->testType!="all")
			$condition .= "AND type='".$this->testType."'";

			if(isset($this->testStatus) && $this->testStatus != "" && !is_array($this->testStatus))
			{
				if($this->testStatus == "finalize")
				$condition.=" AND (a.status = 'finalize' OR a.status = 'responded') ";
				else if($this->testStatus == "NotApproved")
				$condition.=" AND a.status != 'Approved' ";
				else
				$condition.=" AND a.status = '".$this->testStatus."' ";
			}
			if(is_array($this->testStatus) && count($this->testStatus) > 0)
			{
				if(in_array("finalize",$this->testStatus))
				$condition.=" AND a.status IN ('responded','".implode("','",$this->testStatus)."') ";
				else
				$condition.=" AND a.status IN ('".implode("','",$this->testStatus)."') ";
			}
			if(isset($_GET["action"]) && $_GET["action"] != "" && $this->fromAllotment !=1 && $_GET["flag_for_auto"]!="Auto")
			$condition.=" AND a.schoolCode != '2387554' AND test_date != '0000-00-00' ";
			if($this->request_details != '')
			$condition.=" AND id IN (".$this->request_details.") ";
			if($this->two_day != "")
			$condition.=" AND DATEDIFF(test_date,CURDATE()) <= 2 AND a.schoolCode != '2387554' AND a.schoolCode != 0 AND type != 'demo' ";
			if($this->seven_day != "")
			$condition.=" AND DATEDIFF(test_date,CURDATE()) > '2' AND DATEDIFF(test_date,CURDATE()) <= '7' AND a.schoolCode != '2387554' AND a.schoolCode != 0 AND type != 'demo' ";
			if(isset($this->startDate) && $this->startDate != "")
			$condition.=" AND a.test_date >= '".daformatDate($this->startDate)."' ";
			if(isset($this->endDate) && $this->endDate != "")
			$condition.=" AND a.test_date <= '".daformatDate($this->endDate)."' ";
			if(isset($this->startDeliverDate) && $this->startDeliverDate != "")
			{
				$condition.=" AND a.delivery_date >= '".daformatDate($this->startDeliverDate)."'";
			}
			if(isset($this->endDeliverDate) && $this->endDeliverDate != "")
			{
				$condition.="AND a.delivery_date <= '".daformatDate($this->endDeliverDate)."'";
			}
			if(isset($this->deliverBy) && $this->deliverBy != "")
			{
				$condition.="AND a.delivery_date = '".daformatDate($this->deliverBy)."'";
			}
			if(isset($this->request_date) && $this->request_date != "")
			{
				$condition.="AND a.request_date = '".daformatDate($this->request_date)."'";
			}
			if(isset($this->year) && $this->year != "-1" && $this->year != "")
			{
				$condition.="AND a.year = '".$this->year."'";
			}
			if(isset($this->flag) && $this->flag != ""){
				$condition.="AND a.flag = '".$this->flag."'";
			}			
			if(isset($this->startApproveDate) && $this->startApproveDate != "")
			{
				$condition.=" AND a.approved_date >= '".daformatDate($this->startApproveDate)."'";
			}
			if(isset($this->endApproveDate) && $this->endApproveDate != "")
			{
				$condition.=" AND a.approved_date <= '".daformatDate($this->endApproveDate)."'";
			}
			if(isset($this->startFinalizeDate) && $this->startFinalizeDate != "")
			{
				$condition.=" AND a.finalize_date >= '".daformatDate($this->startFinalizeDate)."'";
			}
			if(isset($this->endFinalizeDate) && $this->endFinalizeDate != "")
			{
				$condition.=" AND a.finalize_date <= '".daformatDate($this->endFinalizeDate)."'";
			}
			if(isset($this->request_type) && $this->request_type !='')
			{
				$condition.=" AND a.request_type = '".$this->request_type."'";
			}	

			
			
			if(isset($this->testSubject) && $this->testSubject != "")
			$condition.=" AND subject = '".$this->testSubject."' ";
			if(is_array($this->tb_id) && count($this->tb_id) > 0)
			{
				if(is_array($arrChapterKeys) && count($arrChapterKeys) >0)
				{
					$condition.=" AND ( ";
					$chaptercount = 0;
					foreach($arrChapterKeys as $chapterkey => $chapterid)
					{
						$condition.=" FIND_IN_SET('".$chapterid."',chapter_id) > 0 ";
						if($chaptercount < count($arrChapters)-1)
						$condition.=" OR ";
						$chaptercount++;
					}
					$condition.=" ) ";
				}
			}
			if(is_array($this->searchChapters) && count($this->searchChapters) >0)
			{
				$condition.=" AND ( ";
				$chtercount = 0;
				foreach($this->searchChapters as $chpkey => $chpval)
				{
					$condition.=" FIND_IN_SET('".$chpval."',chapter_id) > 0 ";
					if($chtercount < count($this->searchChapters)-1)
					$condition.=" OR ";
					$chtercount++;
				}
				$condition.=" ) ";
			}
			if(isset($this->searchAlloter) && $this->searchAlloter != "")
			{
				if($this->searchAlloter == "None")
				$condition.=" AND (alloted_to IS NULL OR alloted_to = '' )";
				else
				$condition.=" AND alloted_to = '".$this->searchAlloter."' ";
			}
			if($this->searchMonth > 0)
			$condition.=" AND MONTH(test_date) = '".$this->searchMonth."' ";
			if(isset($this->searchRequest) && $this->searchRequest != "")
			$condition.=" AND id IN (".$this->searchRequest.") ";
			if(isset($this->searchExamCode) && $this->searchExamCode != "")
			$condition.=" AND id IN (SELECT request_id FROM da_examDetails WHERE exam_code IN (".$this->searchExamCode.") ) " ;
			if(isset($this->searchTestName) && $this->searchTestName != "")
			$condition.=" AND testName LIKE '%".$this->searchTestName."%' ";

			if(isset($this->searchApprover) && $this->searchApprover != "")
			{
				if($this->searchApprover == "None")
				$condition.=" AND (approver IS NULL OR approver = '') ";
				else
				$condition.=" AND approver = '".$this->searchApprover."' ";
			}
			if(isset($this->searchSchool) && $this->searchSchool != '')
			$condition.=" AND a.schoolCode = '".$this->searchSchool."' ";
			if(isset($this->searchClass) && $this->searchClass != '')
			$condition.=" AND a.class = '".$this->searchClass."' ";
			if(isset($this->fromAllotment) && $this->fromAllotment ==1 && $this->testStatus != 'finalize')
			$condition.= " AND alloted_to = '".$_SESSION["username"]."' ";
			else if(isset($this->fromAllotment) && $this->fromAllotment ==1 && $this->testStatus == 'finalize')
			$condition.= " AND approver = '".$_SESSION["username"]."' ";
			
			if(isset($this->dropped_questions_flag) && $this->dropped_questions_flag == "Y")
				$condition .= "AND a.dropped_questions != ''";
			else if(isset($this->dropped_questions_flag) && $this->dropped_questions_flag == "N")
				$condition .= "AND a.dropped_questions = ''";
			
		}
		$query = "SELECT a.*,DATE_FORMAT(test_date,'%d-%m-%Y') as testDate,DATEDIFF(delivery_date,CURDATE()) as pending_days,schoolname,city,
				  DATE_FORMAT(delivery_date,'%d-%m-%Y') as delivered_by,DATE_FORMAT(drop_end_date,'%d-%m-%Y') as drop_end_date,
				  DATE_FORMAT(request_date,'%d-%m-%Y') as requestDate ,
				  DATE_FORMAT(finalize_date,'%d-%m-%Y') as finalizeDate 
				  FROM da_testRequest a,schools b
				  WHERE a.schoolCode = b.schoolno AND a.schoolCode != '0' ".$condition;
		$query.= " ORDER BY delivery_date,test_date";

        error_log($query);
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getChaptersByTextBooks($connid)
	{
		$arrRet = array();
		$textBooks = implode(",",$this->tb_id);
		if($textBooks != "")
		{
			$query = "SELECT chapter_id,chapter_name FROM da_chapterMaster WHERE tb_id IN (".$textBooks.") ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["chapter_id"]] = $row["chapter_name"];
			}
		}
		return $arrRet;
	}
	
	function getTestRequestBreakup($connid,$level="",$year="",$arrSchools=array())
	{
		$this->setpostvars();
		$this->setgetvars();
		$status = $this->testStatus;
		if($level == "test")
		$query = "SELECT a.id,chapter_id,class,subject,GROUP_CONCAT(CONCAT(class,'',CONCAT(section,'~',exam_code))) as sections,paper_type,b.class_avg,b.report_date FROM da_testRequest a,da_examDetails b,schools c WHERE a.id = b.request_id AND a.schoolCode = c.schoolno AND type = 'actual' AND a.schoolCode != '2387554' AND a.schoolCode != '0'";
		else
		$query = "SELECT exam_code,a.schoolCode,schoolname,class,section,subject,chapter_id,paper_type,DATE_FORMAT(test_date,'%d-%m-%Y') as tdate,status,report_status,scoring_date,no_of_students,response_received,b.class_avg,b.report_date FROM da_testRequest a,da_examDetails b,schools c WHERE a.id = b.request_id AND a.schoolCode = c.schoolno AND a.schoolCode != '2387554' AND a.schoolCode != '0' AND type = 'actual' ";

		if(isset($this->searchMonth) && $this->searchMonth > 0)
		$query.=" AND MONTH(test_date) = '".$this->searchMonth."' ";
		if(isset($this->searchSchool) && $this->searchSchool > 0)
		$query.=" AND a.schoolCode = '".$this->searchSchool."' ";
		if(isset($this->test_requestid) && $this->test_requestid > 0)
		$query.=" AND request_id = '".$this->test_requestid."' ";
		if($status == "Approved")
		$query.=" AND status = 'Approved' ";
		if($status == "NotApproved")
		$query.=" AND status = 'Approved' AND status != 'Approved' ";
		if($status == "conducted")
		$query.=" AND status = 'Approved' AND response_received > 0";
		if($status == "pending")
		$query.=" AND status = 'Approved' AND response_received = 0 ";
		if($status == "generated")
		$query.=" AND status = 'Approved' AND report_status = 'generated' AND response_received > 0 ";
		if($status == "notgenerated")
		$query.=" AND status = 'Approved' AND report_status = 'pending' AND response_received > 0 ";
		if($status == "report_generated")
		$query.=" AND status = 'Approved' AND scoring_date != '0000-00-00' AND response_received > 0 ";
		if($status == "report_notgenerated")
		$query.=" AND status = 'Approved' AND scoring_date = '0000-00-00' AND response_received > 0 ";
		if($status == "lessthanComplete")
		$query.=" AND status = 'Approved' AND report_status = 'generated' AND (no_of_students - response_received) > 0 AND response_received > 0";
		if($status == "complete")
		$query.=" AND status = 'Approved' AND report_status = 'generated' AND (no_of_students - response_received) <= 0 AND response_received > 0 ";
		if(isset($this->popupFlag) && $this->popupFlag==1)
		$query.=" AND a.delivery_date <= DATE_SUB(CURDATE(),INTERVAL 1 MONTH)";		
		if(isset($arrSchools) && count($arrSchools)>0)
		{
			$make_schoolCode_list = implode(",",array_keys($arrSchools));
			$query.=" AND a.schoolCode IN ($make_schoolCode_list)";		
		}		
		
		#Added Start By Parth 02/06/2012
		if($year!="")
		$query.=" AND a.year = '$year'";
		#Added End By Parth 02/06/2012
		
		if($level == "test")
		$query.=" GROUP BY request_id ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getChapterNamesByIdList($connid,$chapter_id)
	{
		$arrRet = array();
		if($chapter_id == "")
		return;
		$query = "SELECT * FROM da_chapterMaster WHERE chapter_id IN (".$chapter_id.")";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["chapter_id"]] = $row["chapter_name"];
		}
		return $arrRet;
	}
	function validateFinalize($connid)
	{
		$arrReportingHeads = $this->getReportingHeadSSTwise($connid,$this->papercode);
		$arrReportingHeadsKeys = array_keys($arrReportingHeads);
		$arrQuesRH = $this->ques_rhArray;
		$arrResult = array_diff($arrReportingHeads,$arrQuesRH);
		if(count($arrResult) > 0)
		return false;
		else
		return true;
	}
	function getTestRequestSSTdetails($connid)
	{
		$arrRet = array();
		$this->setgetvars();
		$this->setpostvars();
		$query_chlist = "SELECT * FROM da_testRequest WHERE paper_code = '".$this->papercode."' ";
		$dbquery_chlist = new dbquery($query_chlist,$connid);
		$row_chlist = $dbquery_chlist->getrowarray();
		if($row_chlist["chapter_id"] != "")
		{			
			$query = "SELECT a.chapter_id,tb_name,e.class as tb_class,chapter_name,summary,count(f.topic_code) as topic_count,count(d.subtopic_code) as subtopic_count,count(c.sub_subtopic_code) as sstcount,b.comments as tb_comments,
						GROUP_CONCAT(b.class ORDER BY f.topic_code,d.subtopic_code,b.map_id) as sstclass,
						GROUP_CONCAT(c.sub_subtopic_code ORDER BY f.topic_code,d.subtopic_code,b.map_id) as sst_code,
						GROUP_CONCAT(f.topic_code ORDER BY f.topic_code) as topicCode,
						GROUP_CONCAT(d.subtopic_code ORDER BY d.topic_code,d.subtopic_code) as subtopicCode,
						e.tb_id FROM da_chapterMaster a
                        LEFT JOIN da_tbChapterMapping b ON a.chapter_id = b.chapter_id
                        LEFT JOIN da_subSubTopicMaster c ON c.sub_subtopic_code = b.subsubtopic_code
                        LEFT JOIN da_subtopicMaster d ON d.subtopic_code = c.subtopic_code
                        LEFT JOIN da_textbooks e ON a.tb_id = e.tb_id
						LEFT JOIN da_topicMaster f ON f.topic_code = d.topic_code
                        WHERE a.chapter_id IN (".$row_chlist["chapter_id"].") AND b.subsubtopic_code > 0 GROUP BY b.chapter_id";

			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["chapter_id"]] = array("chapter_id"=>$row["chapter_id"],
				"chapter_name"=>$row["chapter_name"],
				"summary"=>$row["summary"],
				"tb_name"=>$row["tb_name"],
				"tb_id"=>$row["tb_id"],
				"tb_class"=>$row["tb_class"],
				"tb_comments"=>$row["tb_comments"],
				"sstclass"=>$row["sstclass"],
				"sst_code"=>$row["sst_code"],
				"topic_count"=>$row["topic_count"],
				"subtopic_count"=>$row["subtopic_count"],
				"sstcount"=>$row["sstcount"],
				"topicCode"=>$row["topicCode"],
				"subtopicCode"=>$row["subtopicCode"]
				);
			}
		}
		
		return $arrRet;
	}
	function getAllsstDetailsByChapters($connid)
	{
		$arrRet = array();
		$query_chlist = "SELECT * FROM da_testRequest WHERE paper_code = '".$this->papercode."' ";
		$dbquery_chlist = new dbquery($query_chlist,$connid);
		$row_chlist = $dbquery_chlist->getrowarray();
		if($row_chlist["chapter_id"] != "")
		{
			#####################For Similar Chapters#####################
			$arrSimilarChapterSet = array();
			$similar_chapter_check = 0;
			$querychaptercheck = "SELECT similar_chapter_id FROM da_chapterMaster WHERE chapter_id IN (".$row_chlist["chapter_id"] .")";
			$dbquerychaptercheck = new dbquery($querychaptercheck,$connid);
			while($rowchaptercheck = $dbquerychaptercheck->getrowarray())
			{
				if($rowchaptercheck["similar_chapter_id"]!=0)
				{				
					$arrSimilarChapterSet[$rowchaptercheck["similar_chapter_id"]] = $rowchaptercheck["similar_chapter_id"];
				}				
			}
			if(isset($arrSimilarChapterSet) && count($arrSimilarChapterSet)>0)
			{
				$similar_chapter_check = implode(",",$arrSimilarChapterSet);
				$row_chlist["chapter_id"] = $row_chlist["chapter_id"].",".$similar_chapter_check;
			}	
			#####################For Similar Chapters#####################
			
			$query = "SELECT DISTINCT sub_subtopic_code,description FROM da_tbChapterMapping a,da_subSubTopicMaster b WHERE a.subsubtopic_code = b.sub_subtopic_code AND chapter_id IN (".$row_chlist["chapter_id"].") ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["sub_subtopic_code"]] = $row["description"];
			}
		}
		return $arrRet;
	}
	function getTopicSubtopicSSTdesc($connid,$sst_list)
	{
		if($sst_list == "")
		return;
		$query = "SELECT DISTINCT b.description as subsubtopic,c.description as subtopic,d.description as topic,b.sub_subtopic_code,c.subtopic_code,d.topic_code FROM da_subSubTopicMaster b,da_subtopicMaster c,da_topicMaster d WHERE b.subtopic_code = c.subtopic_code AND c.topic_code = d.topic_code AND sub_subtopic_code IN (".$sst_list.") ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet["sst"][$row["sub_subtopic_code"]]	= $row["subsubtopic"];
			$arrRet["st"][$row["subtopic_code"]]	= $row["subtopic"];
			$arrRet["topic"][$row["topic_code"]]	= $row["topic"];
		}
		return $arrRet;
	}
	function getTestSTdetails($connid,$papercode)
	{
		$arrRet = array();
		$arrSST = $this->getReportingHeadSSTwise($connid,$papercode);
		$arrSSTcode = array_keys($arrSST);
		
		#Added For one error coming in reporting details fetching;
		$arrSSTcode = array_filter($arrSSTcode);
		#Added For one error coming in reporting details fetching;
		
		$sst = implode(",",$arrSSTcode);
		if($sst != "")
		{
			$query = "SELECT sub_subtopic_code,b.subtopic_code,b.description as subtopic,a.description subsubtopic FROM da_subSubTopicMaster a,da_subtopicMaster b WHERE a.subtopic_code = b.subtopic_code AND sub_subtopic_code IN (".$sst.") ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["sub_subtopic_code"]] = array("subtopic_code"=>$row["subtopic_code"],"subtopic"=>$row["subtopic"],"subsubtopic"=>$row["subsubtopic"]);
			}
		}

		return $arrRet;
	}
	function getSSTmappingComments($connid,$chapter_id)
	{
		$arrRet = array();
		$query = "SELECT subsubtopic_code,comments FROM da_tbChapterMapping WHERE chapter_id = '".$chapter_id."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["subsubtopic_code"]] = $row["comments"];
		}
		return $arrRet;
	}
	function getQcountBySST($connid,$class="")
	{
		$arrRet = array();
		$query_chlist = "SELECT * FROM da_testRequest WHERE paper_code = '".$this->papercode."' ";
		$dbquery_chlist = new dbquery($query_chlist,$connid);
		$row_chlist = $dbquery_chlist->getrowarray();
		if($row_chlist["chapter_id"] != "")
		{			
			$query = "SELECT COUNT(DISTINCT(qcode)) as qcount,sub_subtopic_code
					FROM da_questions a,da_tbChapterMapping b
					WHERE a.sub_subtopic_code = b.subsubtopic_code
					AND a.status = 3 AND chapter_id IN (".$row_chlist["chapter_id"].") GROUP BY sub_subtopic_code";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["sub_subtopic_code"]] = $row["qcount"];
			}
		}
		return $arrRet;
	}
	function getChapterDetails($connid,$chapter_list)
	{
		if($chapter_list == "")
		return;
		$arrRet = array();
		$query = "SELECT * FROM da_chapterMaster WHERE chapter_id IN (".$chapter_list.")";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["chapter_id"]] = $row["chapter_name"];
		}
		return $arrRet;
	}
	function generatePapercode($connid)
	{
		
		$paperCodeVersion = $this->papercode;
		$testRequest = $this->test_requestid;
		global $arrPaperType;
		if($this->papercode == "" && $testRequest != "")
		{
			$queryLock = "LOCK TABLES da_paperDetails WRITE";
			$dbqueryLock = new dbquery($queryLock,$connid);

			$queryMax = "SELECT IFNULL(MAX(CAST(SUBSTRING(papercode,3) AS UNSIGNED))+1,1) FROM da_paperDetails ";
			$dbqueryMax = new dbquery($queryMax,$connid);
			$rowMax = $dbqueryMax->getrowarray();
			if($this->class <= 9)
			{
				$paperCodeVersion = $this->subjectno.$this->class.$rowMax[0];
				$paperCode = $this->subjectno.$this->class.$rowMax[0];
			}
			else
			{
				$paperCodeVersion = $this->subjectno."A".$rowMax[0];
				$paperCode = $this->subjectno."A".$rowMax[0];
			}
			$query = "INSERT INTO da_paperDetails SET  papercode = '".$paperCode."',version = '1' ";
			$dbquery = new dbquery($query,$connid);

			$queryUnLock = "UNLOCK TABLES";
			
			$dbqueryUnLock = new dbquery($queryUnLock,$connid);

			$queryupdate = "UPDATE da_testRequest SET paper_code = '".$paperCode."',testName = '".$arrPaperType[$this->paperType]."'  WHERE id = '".$testRequest."'  ";
			$dbqueryupdate = new dbquery($queryupdate,$connid);			
			
			$this->papercode = $paperCodeVersion;
			
			###############For Auto To Manual Convert###############
			if(($this->action == "GetPaper" && $this->showReports!=1) || ($this->action=="importPaper"))
			{
				$flag_type_chdek = 0;
				$queryFlagCheck = "SELECT flag FROM da_testRequest WHERE id = '".$testRequest."'";
				$dbqueryFlagCheck = new dbquery($queryFlagCheck,$connid);
				while($rowFlagCheck = $dbqueryFlagCheck->getrowarray())
				{
					if($rowFlagCheck["flag"]=="Auto")
					{						
						$queryUpdateFlagCheck = "UPDATE da_testRequest SET flag='Manual',auto_type='0',reset_flag='N' WHERE id = '".$testRequest."'";
						$dbqueryUpdateFlagCheck = new dbquery($queryUpdateFlagCheck,$connid);
					}	
				}
			}
			###############For Auto To Manual Convert###############
			
			if($this->action!="GenAutoPaperEnglish")
			{
				echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."\"</script>";
			}
		}
		
		###############For Auto To Manual Convert###############
		if(($this->action == "GetPaper" && $this->showReports!=1) || ($this->action=="importPaper"))
		{
			$flag_type_chdek = 0;
			$queryFlagCheck = "SELECT flag FROM da_testRequest WHERE id = '".$testRequest."'";
			$dbqueryFlagCheck = new dbquery($queryFlagCheck,$connid);
			while($rowFlagCheck = $dbqueryFlagCheck->getrowarray())
			{
				if($rowFlagCheck["flag"]=="Auto")
				{	
					$qcode_list_check_paper = "";
					$queryCheckQcodeCountPapers = "SELECT qcode_list FROM da_paperDetails where paperCode = '$this->papercode'";
					$dbqueryCheckQcodeCountPapers = new dbquery($queryCheckQcodeCountPapers,$connid);
					while($rowCheckQcodeCountPapers = $dbqueryCheckQcodeCountPapers->getrowarray())
					{
						$qcode_list_check_paper = $rowCheckQcodeCountPapers["qcode_list"];
					}
					if($qcode_list_check_paper=="")
					{				
						$queryUpdateFlagCheck = "UPDATE da_testRequest SET flag='Manual',auto_type='0',reset_flag='N' WHERE id = '".$testRequest."'";
						$dbqueryUpdateFlagCheck = new dbquery($queryUpdateFlagCheck,$connid);
					}	
				}	
			}
		}
		###############For Auto To Manual Convert###############
		
		if($this->action=="importPaper")
		$this->importPaper($connid,$this->papercode);
		
		if($this->papercode != "" && $this->action!="GenAutoPaperEnglish")
		{			
			echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$this->papercode."&editRequestID=".$this->test_requestid."&subjectno=".$this->subjectno."&testclass=".$this->class."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."\"</script>";			
		}
	}
	function importPaper($connid,$newPaperCode)
	{
		$query = "SELECT qcode_list, paper_code FROM da_testRequest a, da_paperDetails b
				  WHERE a.paper_code=b.papercode AND id = '".$this->importRequestID."' AND version=1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$qcodeList = $row['qcode_list'];
		$referencePapercode = $row['paper_code'];

		$queryUpdate = "UPDATE da_paperDetails SET qcode_list='$qcodeList' WHERE papercode='$newPaperCode' AND version=1";
		$dbquery = new dbquery($queryUpdate,$connid);
		$query = "INSERT INTO da_reportingDetails(papercode, reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order, entered_dt, entered_by)
		          SELECT '$newPaperCode', reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order, curdate(), '".$_SESSION["username"]."' FROM da_reportingDetails WHERE papercode='$referencePapercode'";
		
		$dbquery = new dbquery($query,$connid);

		# keeping track of imported paper code
		$up_query = "UPDATE da_testRequest SET imported_requestid = '".$this->importRequestID."' WHERE id = '".$this->test_requestid."'";
		$up_dbqry = new dbquery($up_query,$connid);
	}
	function getExamCodeByRequestID($connid)
	{
		$arrRet = array();
		$query = "SELECT request_id,exam_code FROM da_examDetails GROUP BY request_id";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["request_id"]] = $row["exam_code"];
		}
		return $arrRet;
	}
	function getSectionByExamCode($connid,$exam_code) {
		$query = "SELECT section FROM da_examDetails WHERE exam_code='$exam_code'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["section"];
	}
	function assignAllotApprover($connid)
	{
		
		if(is_array($this->testRequestArray) && count($this->testRequestArray) >0)
		{
			foreach($this->testRequestArray as $key => $requestid)
			{
				if($this->attendeeArray[$requestid] != "")
				{
					$query = "UPDATE da_testRequest SET alloted_to = '".$this->attendeeArray[$requestid]."' WHERE id = '".$requestid."' ";
					$dbquery = new dbquery($query,$connid);
				}
				if($this->approverArray[$requestid] != "")
				{
					$query = "UPDATE da_testRequest SET approver =  '".$this->approverArray[$requestid]."' WHERE id = '".$requestid."' ";
					$dbquery = new dbquery($query,$connid);
				}
			}
			
		}
	}
	function getQuestionCountByPaperCode($connid)
	{
		$arrRet = array();
		$query = "SELECT papercode as vpcode,qcode_list,version FROM da_paperDetails WHERE version= 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$qcount = 0;
			if($row["qcode_list"] != "")
			$qcount = substr_count($row["qcode_list"],',') + 1;

			$arrRet[$row["vpcode"]] = $qcount;
		}
		return $arrRet;
	}
	function paperDetailsInReportingHead($paperCode,$connid)
	{		
		$queryPapeerDetails = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '$paperCode' AND version = '1'";
		$dbqueryPapeerDetails = new dbquery($queryPapeerDetails,$connid);
		$rowPapeerDetails = $dbqueryPapeerDetails->getrowarray();
		
		if($rowPapeerDetails["qcode_list"]=="")
		{
			return 0;
		}
		else 
		{
			return 1;
		}
		
	}
	function getTestDetailsByCode($connid)
	{
		$this->setpostvars();
		$arrRet = array();
		// Added year parameter for shifting board to OrderMaster table	
		//	$query = "SELECT a.*,DATE_FORMAT(test_date,'%d%-%m-%Y') as test_date,DATE_FORMAT(request_date,'%d%-%m-%Y') as request_date,schoolname,city,testName,type, board FROM da_testRequest a,schools b WHERE a.schoolCode = b.schoolno AND paper_code = '".$this->papercode."'";
		$query = "SELECT a.*,DATE_FORMAT(test_date,'%d%-%m-%Y') as test_date,DATE_FORMAT(request_date,'%d%-%m-%Y') as request_date,schoolname,city,testName,type, if(type ='pilot', b.board,c.board) board FROM da_testRequest a
				  LEFT JOIN schools b ON a.schoolCode = b.schoolno 
				  LEFT JOIN da_orderMaster c ON b.schoolno = c.schoolCode AND a.year = c.year 
				  WHERE paper_code = '".$this->papercode."'";
	
		if($this->spcl_requestid > 0)
		$query.=" AND id = '".$this->spcl_requestid."' ";
		else
		$query.=" AND id = '".$this->test_requestid."' ";
        
        error_log($query);
        
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$arrRet["schoolname"] = $row["schoolname"];
		$arrRet["city"]=$row["city"];
		$arrRet["schoolCode"]=$row["schoolCode"];
		$arrRet["class"] = $row["class"];
		$arrRet["schoolCode"] = $row["schoolCode"];
		$arrRet["subject"] = $row["subject"];
		$arrRet["year"] = $row["year"];
		$arrRet["chapter_id"] = $row["chapter_id"];
		$arrRet["test_date"] = $row["test_date"];
		$arrRet["reportingLevel"] = $row["reportingLevel"];
		$arrRet["status"] = $row["status"];
		$arrRet["approver"] = $row["approver"];
		$arrRet["alloted_to"] = $row["alloted_to"];
		$arrRet["testName"] = $row["testName"];
		$arrRet["id"]=$row["id"];
		$arrRet["reapproved"]=$row["reapproved"];
		$arrRet["approved_date"] = $row["approved_date"];
		$arrRet["unfinalize_reason"] = $row["unfinalize_reason"];
		$arrRet["teacher_comments"] = $row["teacher_comments"];
		$arrRet["type"] = $row["type"];
		$arrRet["board"] = $row["board"];
		$arrRet["imported_requestid"] = $row["imported_requestid"];
		$arrRet["request_date"] = $row["request_date"];
		$arrRet["dropped_questions"] = $row["dropped_questions"];
		$arrRet["auto_type"] = $row["auto_type"];
		$arrRet["request_type"] = $row["request_type"];
		return $arrRet;
	}
	function getTestRequestDetailsByID($connid)
	{
		$this->setgetvars();
		$query = "SELECT a.*,DATE_FORMAT(test_date,'%d%-%m-%Y') as test_date,schoolname,city,testName FROM da_testRequest a,schools b WHERE a.schoolCode = b.schoolno AND id = '".$this->test_requestid."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$this->subjectno = $row["subject"];
			$this->testDate = $row["test_date"];
			$this->testStatus = $row["status"];
			$this->testName = $row["testName"];
			$this->class = $row["class"];
			$this->schoolCode = $row["schoolCode"];
			$this->chapter_id = $row["chapter_id"];
			$this->paperType = $row["paper_type"];
			$this->year = $row["year"];
			$this->request_type = $row["request_type"];
		}
	}
	function finalizePaper($connid)
	{

		if($this->papercode == "")
		return;
		$this->error = "";
		// function to check for reporting and test name spelling
		$this->reportingDetails_spellCheck($connid);

		if(count($this->addDictionaryWordsArr) >0 ) {
			$this->error .= "<div align='center' style='color:red;font-weight:bold;'> Please correct spelling errors in test name/reporting details <br/>";
			foreach ($this->addDictionaryWordsArr as $index => $stringVal) {
				$this->error.=  ($index+1).")".$stringVal." <br/>";
			}
			$this->error .= "</div>";
		}
		$validateRhQcount = $this->checkReportingHeadWiseQuestionCount($connid,$this->papercode);
		$arrValidations = $this->validationFinalize($connid);
		if($validateRhQcount != "" && $validateRhQcount != 0)
		{
			$this->error.= "<div align='center'><font color='red'>The number of questions in the reporting head ".$validateRhQcount." is not equal to the required questions</font></div>";
		}
		foreach($arrValidations as $key => $value)
		{
			$this->error.= "<div align='center'><font color='red'><b>".$value."</b></font></div>";
		}
		if($this->error == "")
		{
			if($this->validateFinalize($connid))
			{				
				$query = "UPDATE da_testRequest SET status = 'finalize',finalize_date = IF(finalize_date = '0000-00-00 00:00:00',NOW(),finalize_date) WHERE paper_code = '".$this->papercode."' AND id = '".$this->test_requestid."' ";
				$dbquery = new dbquery($query,$connid);
			}
			else
			{
				$this->error.= "<div align='center'><font color='red' size=2><b>All reporting heads should have atleast 1 question</b></font></div>";
			}
		}
	
	}
	function getTotalRequiredQuesInPaper($connid)
	{
		$query = "SELECT SUM(required_ques) FROM da_reportingDetails WHERE papercode = '".$this->papercode."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getEngPaperVersions($connid,$version,$qcodelist)
	{
		if($this->papercode == "")
		return;
		$arrGroup = array();
		if($qcodelist != "")
		{			
			$i = 1;
			$query_grp = "SELECT qcode,group_id FROM da_questions WHERE qcode IN (".$qcodelist.") ORDER BY FIELD(qcode,".$qcodelist.")";
			$dbquery_grp = new dbquery($query_grp,$connid);
			while($row_grp = $dbquery_grp->getrowarray())
			{
				if($row_grp["group_id"] > 0)
				{					
					if(isset($arrGroup[$row_grp["group_id"]]))
					{
						$value = $arrGroup[$row_grp["group_id"]];
						$arrGroupQcode[$value][] = $row_grp["qcode"];
					}
					if(!array_key_exists($row_grp["group_id"],$arrGroup))
					{
						$arrGroup[$row_grp["group_id"]] = "G".$i;
						$arrQcodeList[] = "G".$i;
						$arrGroupQcode["G".$i][] = $row_grp["qcode"];
						$i++;
					}
				}
				else
				{
					$arrQcodeList[] = $row_grp["qcode"];
				}
			}			

			shuffle($arrQcodeList);
			$strqcodes = implode(",",$arrQcodeList);
			# added the code to prevent the bug of group questions
			$strqcodes = ",".$strqcodes.",";
			for($h=1;$h<=$i;$h++)
			{
				if(isset($arrGroupQcode["G".$h])){
					$groupQcodes = ",G".$h.",";
					$groupQcodeStr = implode(",",$arrGroupQcode["G".$h]);
					$replaceGqcode = ",".$groupQcodeStr.",";
					$strqcodes = str_replace($groupQcodes,$replaceGqcode,$strqcodes);
				}
			}
			$strqcodes = trim($strqcodes,",");
			
			$query = "REPLACE INTO da_paperDetails SET papercode = '".$this->papercode."',version = '".$version."', qcode_list = '".$strqcodes."',lastModifiedBy = '".$_SESSION["username"]."' ";
			$dbquery = new dbquery($query,$connid);

			if($this->examCode != "")	
				$this->generatePDF($connid,$this->examCode,$version);
		}
	}
	function getGroupWiseArrangedList($connid,$qcodelist)
	{
		if($qcodelist == "")
		return;
		$arrGroup = array();
		
		$i = 1;
		$query_grp = "SELECT qcode,group_id FROM da_questions WHERE qcode IN (".$qcodelist.") ORDER BY FIELD(qcode,".$qcodelist.")";
		$dbquery_grp = new dbquery($query_grp,$connid);
		while($row_grp = $dbquery_grp->getrowarray())
		{
			if($row_grp["group_id"] > 0)
			{				
				if(isset($arrGroup[$row_grp["group_id"]]))
				{
					$value = $arrGroup[$row_grp["group_id"]];
					$arrGroupQcode[$value][] = $row_grp["qcode"];
				}
				if(!array_key_exists($row_grp["group_id"],$arrGroup))
				{
					$arrGroup[$row_grp["group_id"]] = "G".$i;
					$arrQcodeList[] = "G".$i;
					$arrGroupQcode["G".$i][] = $row_grp["qcode"];
					$i++;
				}
			}
			else
			{
				$arrQcodeList[] = $row_grp["qcode"];
			}
		}
				
		$strqcodes = implode(",",$arrQcodeList);
		# Below new code added to sorted out the problem related to some times its select Sci/Maths questions in Eng paper
		# If more than 4- 5 groups quesions selected in paper than below old logic was not working properly
		$strqcodes = ",".$strqcodes.",";
		for($h=1;$h<=$i;$h++)
		{
			if(isset($arrGroupQcode["G".$h])){
				$groupQcodes = ",G".$h.",";
				$groupQcodeStr = implode(",",$arrGroupQcode["G".$h]);
				$replaceGqcode = ",".$groupQcodeStr.",";
				$strqcodes = str_replace($groupQcodes,$replaceGqcode,$strqcodes);
			}
			
		}
		$strqcodes = trim($strqcodes,",");
		
		return $strqcodes;
	}
	function generateVersions($connid,$subjectno)
	{
		$query_paper = "SELECT * FROM da_paperDetails WHERE papercode = '".$this->papercode."' AND version = '1' AND qcode_list != '' ";
		$dbquery_paper = new dbquery($query_paper,$connid);
		$row_paper = $dbquery_paper->getrowarray();
		if($subjectno == 2 || $subjectno == "3" || $subjectno=="100")
		{
			for($i=2;$i<=4;$i++)
			{
				$this->getPaperVersions($connid,$i,$row_paper["qcode_list"]);
			}
		}
		else if($subjectno == 1)
		{
			for($i=2;$i<=4;$i++)
			{
				$this->getEngPaperVersions($connid,$i,$row_paper["qcode_list"]);
			}
		}
	}
	function getPaperVersions($connid,$version,$qcodelist)
	{
		$arrSST = array();
		if($qcodelist != "")
		{
			$querylist = "SELECT reporting_id,sst_list,qcode_list FROM da_reportingDetails WHERE papercode = '".$this->papercode."' ORDER BY reporting_order";
			
			$dbquerylist = new dbquery($querylist,$connid);
			
			$r = 0;
			$arrReporting = array();
			$arrQcodeList = array();
			$strqcodes = "";
			$g = 1;
			while($rowlist = $dbquerylist->getrowarray())
			{
				$reporting_id = "R".$r;
				$arrQcodeList = array();
				$query = "SELECT GROUP_CONCAT(qcode ORDER BY FIELD(qcode,".$qcodelist.")) as qlist,group_id FROM da_questions WHERE qcode IN (".$rowlist["qcode_list"].") GROUP BY group_id";
				$dbquery = new dbquery($query,$connid);
				if($dbquery->numrows() > 0)
				{
					while($row = $dbquery->getrowarray())
					{
						if($row["group_id"] != 0)
						{
							${"G".$g} = $row["qlist"];
							$arrQcodeList[] = "G".$g;
						}
						else
						{
							$arrql = explode(",",$row["qlist"]);
							foreach($arrql as $key => $value)
							{
								$arrQcodeList[] = $value;
							}
						}
						$g++;
					}
					shuffle($arrQcodeList);
					$arrReporting[$reporting_id] = implode(",",$arrQcodeList);
					$r++;
				}

			}
			if(is_array($arrReporting) && count($arrReporting) > 0)
			{
				$arrReportingHeads = array_keys($arrReporting);
				shuffle($arrReportingHeads);
			}
			foreach($arrReportingHeads as $key => $value)
			{
				$arrRandomise[] = $arrReporting[$value];
			}
			$strqcodes = implode(",",$arrRandomise);
			
			# added code to solve the problem of group replacement G1, G10 etc
			$strqcodes = ",".$strqcodes.",";
			for($h=1;$h<=$g;$h++)
			{
				$groupQcodes = ",G".$h.",";
				$replaceGqcode = ",".${"G".$h}.",";
				$strqcodes = str_replace($groupQcodes,$replaceGqcode,$strqcodes);
			}
			$strqcodes = trim($strqcodes,",");
			### code end ##
			
			$query = "REPLACE INTO da_paperDetails SET papercode = '".$this->papercode."',version = '".$version."', qcode_list = '".$strqcodes."',lastModifiedBy = '".$_SESSION["username"]."' ";
			$dbquery = new dbquery($query,$connid);
			
			$this->generatePDF($connid,$this->examCode,$version);
			
		}
	}
	function approvePaper($connid)
	{
				
		$this->error = "";
		# wait timeout query
		$waittimeoutquery = "SET session wait_timeout=300";
		$waittimeoutdbqry = new dbquery($waittimeoutquery,$connid);

		// check the testName max 100 characters
		if(strlen(trim($this->testName)) > 100) {
			$this->error .="<div align='center' style='color:red;font-weight:bold;'>Test Name is too long (Max 100 Characters)</div>";
		}
		
		// Second Approval condition
		$second_unApprovedQues = $this->validateSecondApproval($connid);
		$this->reportingDetails_spellCheck($connid);

		if(count($this->addDictionaryWordsArr) >0 ) {
			$this->error .= "<div align='center' style='color:red;font-weight:bold;'> Please correct spelling errors in test name/reporting details <br/>";
			foreach ($this->addDictionaryWordsArr as $index => $stringVal) {
				$this->error.=  ($index+1).")".$stringVal." <br/>";
			}
			$this->error .= "</div>";
		}
		if($second_unApprovedQues !="")
		{
			$this->error .="<div align='center'><font color='red'><b> Questions which are not second approved ".$second_unApprovedQues."</b></font></div>";
		}
		$arrValidations = $this->validationFinalize($connid);
		foreach($arrValidations as $key => $value)
		{
			$this->error.= "<div align='center'><font color='red'><b>".$value."</b></font></div>";
		}
		if($this->error == "")
		{
			$queryExam = "SELECT exam_code FROM da_examDetails WHERE request_id = '".$this->test_requestid."' AND exam_code != '".$this->examCode."' ";
			$dbqueryExam = new dbquery($queryExam,$connid);
			while($rowExam = $dbqueryExam->getrowarray())
			{
				for($i=1;$i<=4;$i++)
				{
					$this->generatePDF($connid,$rowExam["exam_code"],$i);
				}
			}
			$query = "UPDATE da_testRequest SET status = 'Approved',approved_date = NOW(),progress_status='0' WHERE paper_code = '".$this->papercode."' AND id = '".$this->test_requestid."' ";
			$dbquery = new dbquery($query,$connid);

			// Delete entry from da_autoAssemblyQues after paper is approved 
			$del_query ="DELETE FROM da_autoAssemblyQues where request_id ='".$this->test_requestid."' ";
			$del_dbquery = new dbquery($del_query,$connid);
			
			/***************************Added for question count increment **********************/
			$queryPaperDetailsGet = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."'";
			$dbqueryPaperDetailsGet = new dbquery($queryPaperDetailsGet,$connid);
			$rowPaperDetailsGet = $dbqueryPaperDetailsGet->getrowarray();
			
			$queryUpdatePaperDetailsGet = "UPDATE da_questions SET school_usage = (school_usage + 1),lastModified = lastModified where qcode IN ($rowPaperDetailsGet[qcode_list])";
			$dbqueryUpdatePaperDetailsGet = new dbquery($queryUpdatePaperDetailsGet,$connid);
			/***************************Added for question count increment **********************/
			
			###############################For process of chapter removal and set of chapters############################## 
			if($this->subjectno==1)
			{
				$this->setForChaptersNotUsed($this->test_requestid,$connid);				
			}
			###############################For process of chapter removal and set of chapters############################## 
			
			/**************************Added Start by Parth On 13/04/2012 **********************/
			$year = "";
			$pastyear = "";
			$schoolCode = "";
			$chapterToSubtopicMap = array();
			
			$queryToFetchAllRequiredData = "SELECT * from da_testRequest WHERE id = '$this->test_requestid'";
			$dbqueryresultToFetchAllRequiredData = new dbquery($queryToFetchAllRequiredData,$connid);
			while($rowToFetchAllRequiredData = $dbqueryresultToFetchAllRequiredData->getrowarray())
			{
				$year = $rowToFetchAllRequiredData['year'];
				$schoolCode = $rowToFetchAllRequiredData['schoolCode'];
			}
			$pastyear = $year-1;
			
			$arrQcodeApprove = array();
			$approveqcodelist = "";

			// added version because Passage questions where aded 4 times in Question Selection Summary
			$queryForPaperDetailsQcode = "SELECT qcode_list from da_paperDetails where papercode = '$this->papercode' and version =1 ";
			$dbqueryForPaperDetailsQcode = new dbquery($queryForPaperDetailsQcode,$connid);
			while($rowForPaperDetailsQcode = $dbqueryForPaperDetailsQcode->getrowarray())
			{
				if($this->subjectno == 1)
				{
					$approvedQcode = array();
					$qcodeNew = array();
					$passageSetArr = array();
					$qcodeNew = explode(",",$rowForPaperDetailsQcode["qcode_list"]);
					foreach($qcodeNew as $keyNew => $valueNew)
					{
						$queryPassage = "SELECT passage_id from da_questions where qcode = '$valueNew'";
						$dbqueryPassage = new dbquery($queryPassage,$connid);
						while($rowPassage = $dbqueryPassage->getrowarray())
						{
							if($rowPassage["passage_id"] == 0)
							{
								$approvedQcode[] = $valueNew;
							}
							else 
							{
								$passageSetArr[$rowPassage["passage_id"]][$valueNew] = $valueNew;
							}
						}
									
						
					}					
					
					$approveqcodelist = implode(",",$approvedQcode);
						
					foreach($passageSetArr as $keySetArr => $valueSetArr)
					{
						foreach($valueSetArr as $keyQcodeT => $valueQcodeT)
						{
							if(!isset($chapterToSubtopicMap[$keySetArr]))
							{
								$chapterToSubtopicMap[$keySetArr]["count"] = 0;
							}
							$chapterToSubtopicMap[$keySetArr]["count"] = $chapterToSubtopicMap[$keySetArr]["count"] + 1;
							$chapterToSubtopicMap[$keySetArr]["qcode_list"] .= $valueQcodeT.",";
						}
						$chapterToSubtopicMap[$keySetArr]["qcode_list"] = substr_replace($chapterToSubtopicMap[$keySetArr]["qcode_list"],"",-1);
					}					
					
				}
				else 
				{
					$approveqcodelist = $rowForPaperDetailsQcode["qcode_list"];
				}
			}
			$arrQcodeApprove = explode(",",$approveqcodelist);
			$subtopicUsedArr = array();
			foreach($arrQcodeApprove as $keyQcodeApprove => $valueQcodeApprove)
			{
				$subtopicUsedArr = $this->getSSTMappedToQcodeDuringApprove($arrQcodeApprove,$connid);
			}

			$subtopicUsedFinal = array();
			foreach($subtopicUsedArr as $key=>$value)
			{
				$subtopicUsedFinal[] = $key;
			}
			
			$chapterArr = array();
			$chapter_id = "";
			$queryForChapter = "SELECT chapter_id from da_testRequest where id = '$this->test_requestid'";
			$dbqueryForChapter = new dbquery($queryForChapter,$connid); 
			while($rowForChapter = $dbqueryForChapter->getrowarray())
			{
				$chapter_id = $rowForChapter["chapter_id"];
			}
			$chapterArr = explode(",",$chapter_id);
			
			
			foreach($chapterArr as $keyChapterArr => $valueChapterArr)
			{
				$subsubTopicMappedToChapter = array();
				$countChapterQcode = 0;
				$qcode_list_chapter_mapped = "";
				$querysubsubTopicMappedToChapter = "SELECT subsubtopic_code from da_tbChapterMapping where chapter_id = '$valueChapterArr'";
				$dbquerysubsubTopicMappedToChapter = new dbquery($querysubsubTopicMappedToChapter,$connid); 
				while($rowsubsubTopicMappedToChapter = $dbquerysubsubTopicMappedToChapter->getrowarray())
				{
					if(in_array($rowsubsubTopicMappedToChapter["subsubtopic_code"],$subtopicUsedFinal))
					{
						foreach($subtopicUsedArr[$rowsubsubTopicMappedToChapter["subsubtopic_code"]] as $keyQcodeVal => $valueQcodeVal)
						{
							$countChapterQcode++;
							$qcode_list_chapter_mapped .= $valueQcodeVal.",";
						}
					}
				}
				$qcode_list_chapter_mapped = substr_replace($qcode_list_chapter_mapped,"",-1);
				$chapterToSubtopicMap[$valueChapterArr]["count"] = $countChapterQcode;
				$chapterToSubtopicMap[$valueChapterArr]["qcode_list"] = $qcode_list_chapter_mapped;
			}			
			
			$countForScoring = 0;
			$queryToTakeData = "SELECT count(*) as scoring_cout from da_questionSelectionSummary where request_id = '".$this->test_requestid."' AND type = 'Scoring'";
			$dbqueryToTakeData = new dbquery($queryToTakeData,$connid);  
			while($rowToTakeData = $dbqueryToTakeData->getrowarray())
			{
				$countForScoring = $rowToTakeData["scoring_cout"];
			}
			
			if($countForScoring == 0)
			{
				$countForAuto = 0;
				$queryToTakeDataForAuto = "SELECT count(*) as scoring_cout from da_questionSelectionSummary where request_id = '".$this->test_requestid."' AND type = 'Auto'";
				$dbqueryToTakeDataForAuto = new dbquery($queryToTakeDataForAuto,$connid);  
				while($rowToTakeDataForAuto = $dbqueryToTakeDataForAuto->getrowarray())
				{
					$countForAuto = $rowToTakeDataForAuto["scoring_cout"];
				}		
			}
			
			$condition = "";
			
			if($countForScoring > 0)
			{
				$condition = " AND type = 'Scoring'";
			}
			else 
			{
				$condition = " AND type = 'Auto'";
			}
			
			$countUniquUsed = 0;
			$finalFetchData = array();
			$queryToFetchAllFinalData = "SELECT * from da_questionSelectionSummary where request_id = '".$this->test_requestid."' $condition";
			$dbToFetchAllFinalData = new dbquery($queryToFetchAllFinalData,$connid);   
			while($rowToFetchAllFinalData = $dbToFetchAllFinalData->getrowarray())
			{
				$qcode_list_selected = array();
				$finalFetchData[$rowToFetchAllFinalData["id"]]["request_id"] = $rowToFetchAllFinalData["request_id"];
				if($this->subjectno == 1)
				{
					if($rowToFetchAllFinalData["chapter_id"] == 0)
					{
						if($rowToFetchAllFinalData["passage_id"]!=0)
						{
							$finalFetchData[$rowToFetchAllFinalData["id"]]["chapter_id"] = 0;
							$finalFetchData[$rowToFetchAllFinalData["id"]]["passage_id"] = $rowToFetchAllFinalData["passage_id"];
							$rowToFetchAllFinalData["chapter_id"] = $rowToFetchAllFinalData["passage_id"];
						}
					}
					else 
					{
						$finalFetchData[$rowToFetchAllFinalData["id"]]["chapter_id"] = $rowToFetchAllFinalData["chapter_id"];
						$finalFetchData[$rowToFetchAllFinalData["id"]]["passage_id"] = 0;
					}
				}
				else 
				{
					$finalFetchData[$rowToFetchAllFinalData["id"]]["chapter_id"] = $rowToFetchAllFinalData["chapter_id"];
					$finalFetchData[$rowToFetchAllFinalData["id"]]["passage_id"] = 0;
				}	
				$finalFetchData[$rowToFetchAllFinalData["id"]]["requested_before"] = $rowToFetchAllFinalData["requested_before"];
				$finalFetchData[$rowToFetchAllFinalData["id"]]["requested_by_same_school"] = $rowToFetchAllFinalData["requested_by_same_school"];
				$finalFetchData[$rowToFetchAllFinalData["id"]]["best_fit_past_test_id"] = $rowToFetchAllFinalData["best_fit_past_test_id"];
				$finalFetchData[$rowToFetchAllFinalData["id"]]["past_count"] = $rowToFetchAllFinalData["past_count"];
				$finalFetchData[$rowToFetchAllFinalData["id"]]["teacher_comment"] = $rowToFetchAllFinalData["teacher_comment"];
				$finalFetchData[$rowToFetchAllFinalData["id"]]["dropped_questions"] = $rowToFetchAllFinalData["dropped_questions"];
				$explodeNeededQuestions = explode("/",$rowToFetchAllFinalData["questions_selected"]);
				$totalNeeded = $explodeNeededQuestions[1];
				$totalSelected = $chapterToSubtopicMap[$rowToFetchAllFinalData["chapter_id"]]["count"];

				if($totalSelected =="")
					$totalSelected = 0;

				$finalFetchData[$rowToFetchAllFinalData["id"]]["questions_selected"] = $totalSelected."/".$totalNeeded;
				$qcode_list_selected = explode(",",$rowToFetchAllFinalData["qcode_all_list"]); 
				$question_list_latest = $chapterToSubtopicMap[$rowToFetchAllFinalData["chapter_id"]]["qcode_list"];
				$finalFetchData[$rowToFetchAllFinalData["id"]]["qcode_all_list"] = $question_list_latest;
				$question_list_latest_Arr = explode(",",$question_list_latest);
				$diffArrForChapter = array();
				foreach($question_list_latest_Arr as $key_list_latest_Arr => $value_list_latest_Arr)
				{
					if(!in_array($value_list_latest_Arr,$qcode_list_selected))
					{
						if($value_list_latest_Arr!="")
						{
							$diffArrForChapter[$value_list_latest_Arr] = $value_list_latest_Arr;					
						}	
					}	
				}
				
				$arrChapterTypeQuestion = array();
				$UniqueQcodesDiff = array();
				$CopyQcodesDiff = array();
				$UnuseduniqueQcodeDiff = array();

				foreach($diffArrForChapter as $keyArrForChapter => $valueArrForChapter)
				{
					if($valueArrForChapter!="")
					{
						$flag_set = $this->qcodeSelectType($valueArrForChapter,$connid);
						$arrChapterTypeQuestion[$flag_set][$valueArrForChapter] = $valueArrForChapter; 
						if($flag_set=="Unique")
						{
							$counterCheckForUnique = 0;
							$flag = "Uniqueused";
							$counterCheckForUnique = $this->questionusedbefore($valueArrForChapter,$schoolCode,$year,$pastyear,$connid,$flag);
							if($counterCheckForUnique == 0)
							{
								$UnuseduniqueQcodeDiff[$valueArrForChapter] = $valueArrForChapter;
							}
							else 
							{
								$UniqueQcodesDiff[$valueArrForChapter] = $valueArrForChapter;
							}
						}
						else 
						{	
							$CopyQcodesDiff[$valueArrForChapter] = $valueArrForChapter;
						}
					}	
				}
				
				
				
				$UniqueArr = array();
				$FinalUniqueArr = array();
				$countUnique = 0;
				$UniqueArr = explode(",",$rowToFetchAllFinalData["unique_qcode_list"]);
				foreach($UniqueArr as $keyUniqueArr => $valueUniqueArr)
				{
					if(in_array($valueUniqueArr,$question_list_latest_Arr))
					{
						$FinalUniqueArr[$valueUniqueArr] = $valueUniqueArr;
					}
				}
				if(isset($UniqueQcodesDiff) && count($UniqueQcodesDiff)>0)
				{
					foreach($UniqueQcodesDiff as $keyUniqueQcodesDiff => $valueUniqueQcodesDiff)
					{
						$FinalUniqueArr[$valueUniqueQcodesDiff] = $valueUniqueQcodesDiff;
					}	
				}				
				$unique_final_qcode_list = implode(",",$FinalUniqueArr);
				$count_unique_qcode_list = count($FinalUniqueArr);
				$finalFetchData[$rowToFetchAllFinalData["id"]]["unique_selected_count"] = $count_unique_qcode_list;
				$finalFetchData[$rowToFetchAllFinalData["id"]]["unique_qcode_list"] = $unique_final_qcode_list;
				
				
				$CopiesArr = array();
				$FinalCopiesArr = array();
				$countCopies = 0;
				$CopiesArr = explode(",",$rowToFetchAllFinalData["copies_qcode_list"]);
				foreach($CopiesArr as $keyCopiesArr => $valueCopiesArr)
				{
					if(in_array($valueCopiesArr,$question_list_latest_Arr))
					{
						$FinalCopiesArr[$valueCopiesArr] = $valueCopiesArr;
					}
				}
				if(isset($CopyQcodesDiff) && count($CopyQcodesDiff)>0)
				{
					foreach($CopyQcodesDiff as $keyCopiesQcodesDiff => $valueCopiesQcodesDiff)
					{
						$FinalCopiesArr[$valueCopiesQcodesDiff] = $valueCopiesQcodesDiff;
					}	
				}
				
				$copies_final_qcode_list = implode(",",$FinalCopiesArr);
				$count_copies_qcode_list = count($FinalCopiesArr);
				$finalFetchData[$rowToFetchAllFinalData["id"]]["copies_selected_count"] = $count_copies_qcode_list;
				$finalFetchData[$rowToFetchAllFinalData["id"]]["copies_qcode_list"] = $copies_final_qcode_list;
				
	
				$UniqueUsedQcodeList = "";
				$UniqueUsedQcodeList = implode(",",$UnuseduniqueQcodeDiff);
				$countUniquUsed = $countUniquUsed + count($UnuseduniqueQcodeDiff);
				$finalFetchData[$rowToFetchAllFinalData["id"]]["unused_unique_added_list"] = $UniqueUsedQcodeList;
				$finalFetchData[$rowToFetchAllFinalData["id"]]["unused_unique_added"] = count($UnuseduniqueQcodeDiff);
				
				$NoCopiesRepeatedArr = array();
				$FinalNoCopiesRepeatedArr = array();
				$countNoCopiesRepeated = 0;
				$NoCopiesRepeatedArr = explode(",",$rowToFetchAllFinalData["unique_repeated_qcode_list"]);
				foreach($NoCopiesRepeatedArr as $keyNoCopiesRepeatedArr => $valueNoCopiesRepeatedArr)
				{
					if(in_array($valueNoCopiesRepeatedArr,$question_list_latest_Arr))
					{
						$FinalNoCopiesRepeatedArr[$valueNoCopiesRepeatedArr] = $valueNoCopiesRepeatedArr;
					}
				}
				$no_copies_repeated_final_qcode_list = implode(",",$FinalNoCopiesRepeatedArr);
				$count_no_copies_repeated_qcode_list = count($FinalNoCopiesRepeatedArr);
				$finalFetchData[$rowToFetchAllFinalData["id"]]["unique_repeated_count"] = $count_no_copies_repeated_qcode_list;
				$finalFetchData[$rowToFetchAllFinalData["id"]]["unique_repeated_qcode_list"] = $no_copies_repeated_final_qcode_list;
				
				
				
				$MCNoCopiesArr = array();
				$FinalMCNoCopiesArr = array();
				$countMCNoCopies = 0;
				$MCNoCopiesArr = explode(",",$rowToFetchAllFinalData["mc_copies_no_qcode_list"]);
				foreach($MCNoCopiesArr as $keyMCNoCopiesArr => $valueMCNoCopiesArr)
				{
					if(in_array($valueMCNoCopiesArr,$question_list_latest_Arr))
					{
						$FinalMCNoCopiesArr[$valueMCNoCopiesArr] = $valueMCNoCopiesArr;
					}
				}
				
				
				$no_mc_copies_final_qcode_list = implode(",",$FinalMCNoCopiesArr);
				$count_mc_no_copies_qcode_list = count($FinalMCNoCopiesArr);
				$finalFetchData[$rowToFetchAllFinalData["id"]]["mc_copies_no_count"] = $count_mc_no_copies_qcode_list;
				$finalFetchData[$rowToFetchAllFinalData["id"]]["mc_copies_no_qcode_list"] = $no_mc_copies_final_qcode_list;
				
				$finalFetchData[$rowToFetchAllFinalData["id"]]["type"] = "Finalize";
				
				
				
			}
			
			if(isset($finalFetchData) && count($finalFetchData)>0)
			{
				foreach($finalFetchData as $key=>$value)
				{
					/***************For Image Checking *****************/
					$arrIamges = array();
					$qcodeImageNotApprovedlist = "";
					$qcodeImageNotApprovedCount = 0;
					$arrIamges = $this->getQuesImagesValidityToFinalizeAutomationCheck($connid,$value["qcode_all_list"]);
					$qcodeImageNotApprovedlist = implode(",",$arrIamges);
					$qcodeImageNotApprovedCount = count($arrIamges);
					/***************For Image Checking *****************/
					
					if($this->subjectno == 1)
					{
						$chapter_id_query = 0;
						$passage_id_query = 0;
						if($value["chapter_id"]==0)
						{
							if($value["passage_id"]!=0)
							{
								$chapter_id_query = 0;
								$passage_id_query = $value["passage_id"];
							}
						}
						else 
						{
							$chapter_id_query = $value["chapter_id"];
							$passage_id_query = 0;
						}
						$queryUpdateChapterByChapter = "INSERT into da_questionSelectionSummary set 
						  request_id = '".$value["request_id"]."',
						  chapter_id = '".$chapter_id_query."',
						  passage_id = '".$passage_id_query."',
						  requested_before = '".$value["requested_before"]."',
						  requested_by_same_school = '".$value["requested_by_sameschool"]."',
						  best_fit_past_test_id = '".$value["best_fit_past_rid"]."',
						  past_count = '".$value["past_count"]."',
						  teacher_comment = '".$value["teacher_comment"]."',
						  questions_selected = '".$value["questions_selected"]."',
						  unique_selected_count = '".$value["unique_selected_count"]."',
						  unique_qcode_list = '".$value["unique_qcode_list"]."',
						  copies_selected_count = '".$value["copies_selected_count"]."',
						  copies_qcode_list = '".$value["copies_qcode_list"]."',
						  unique_repeated_count = '".$value["unique_repeated_count"]."',
						  unique_repeated_qcode_list = '".$value["unique_repeated_qcode_list"]."',
						  mc_copies_no_count = '".$value["mc_copies_no_count"]."',
						  mc_copies_no_qcode_list = '".$value["mc_copies_no_qcode_list"]."',
						  unused_questions_added = '".$value["unused_unique_added"]."',
						  unused_question_added_list = '".$value["unused_unique_added_list"]."',
						  unapproved_image_qcode_count = '".$qcodeImageNotApprovedCount."',
						  unapproved_image_qcode_list = '".$qcodeImageNotApprovedlist."',
						  qcode_all_list = '".$value["qcode_all_list"]."',
						  type = '".$value["type"]."',
						  entered_date = '".date("Y-m-d")."'";
					}
					else 
					{
						$queryUpdateChapterByChapter = "INSERT into da_questionSelectionSummary set 
						  request_id = '".$value["request_id"]."',
						  chapter_id = '".$value["chapter_id"]."',
						  passage_id = '0',
						  requested_before = '".$value["requested_before"]."',
						  requested_by_same_school = '".$value["requested_by_sameschool"]."',
						  best_fit_past_test_id = '".$value["best_fit_past_rid"]."',
						  past_count = '".$value["past_count"]."',
						  teacher_comment = '".$value["teacher_comment"]."',
						  questions_selected = '".$value["questions_selected"]."',
						  unique_selected_count = '".$value["unique_selected_count"]."',
						  unique_qcode_list = '".$value["unique_qcode_list"]."',
						  copies_selected_count = '".$value["copies_selected_count"]."',
						  copies_qcode_list = '".$value["copies_qcode_list"]."',
						  unique_repeated_count = '".$value["unique_repeated_count"]."',
						  unique_repeated_qcode_list = '".$value["unique_repeated_qcode_list"]."',
						  mc_copies_no_count = '".$value["mc_copies_no_count"]."',
						  mc_copies_no_qcode_list = '".$value["mc_copies_no_qcode_list"]."',
						  unused_questions_added = '".$value["unused_unique_added"]."',
						  unused_question_added_list = '".$value["unused_unique_added_list"]."',
						  unapproved_image_qcode_count = '".$qcodeImageNotApprovedCount."',
						  unapproved_image_qcode_list = '".$qcodeImageNotApprovedlist."',
						  qcode_all_list = '".$value["qcode_all_list"]."',
						  type = '".$value["type"]."',
						  entered_date = '".date("Y-m-d")."'";
					}
					$dbqryUpdateChapterByChapter = new dbquery($queryUpdateChapterByChapter,$connid);
				}
			}
			
			/**************************Added End by Parth On 13/04/2012 **********************/
			##########################Passage Updation Process##########################
			if($this->subjectno==1)
			{
				$this->passageUpdation($connid);			
			}	
			##########################Passage Updation Process##########################
		}
		
	}
	
	##########################Passage Updation Process##########################
	function passageUpdation($connid)
	{
		$arrPassageId = array();
		$paperCode = $this->papercode;		
		$class = $this->class;
				
		$query_testDate = "SELECT test_date,schoolCode FROM da_testRequest WHERE id = '$this->test_requestid'";
		$dbquery_testDate = new dbquery($query_testDate,$connid); 
		while($row_testDate = $dbquery_testDate->getrowarray())
		{
			$schoolCode = "";
			$schoolCode = $row_testDate["schoolCode"];
			$test_date = "";
			$test_date = $row_testDate["test_date"]." 00:00:00";
		}
		
		$query = "SELECT a.passage_id FROM da_questions a,da_paperDetails b WHERE FIND_IN_SET(a.qcode,b.qcode_list) AND papercode = '$paperCode'";
		$dbquery = new dbquery($query,$connid); 
		while($row = $dbquery->getrowarray())
		{
			if($row["passage_id"]!=0)
			{
				$arrPassageId[$row["passage_id"]] = $row["passage_id"];
			}	
		}
		
		foreach($arrPassageId as $keyPassageId => $valuePassgaeId)
		{
			$passage_id = "";
			$passage_id = $valuePassgaeId;
			
			$use_as = "";
			$query_useas = "SELECT use_as FROM qms_passage WHERE passage_id = '$passage_id'";
			$dbquery_useas = new dbquery($query_useas,$connid); 
			while($row_useas = $dbquery_useas->getrowarray())
			{
				$use_as = $row_useas["use_as"];
			}
			
			$id = "";
			$query_passageId = "SELECT id FROM da_passageUsage WHERE passage_id = '$passage_id' AND class = '$class' AND schoolCode = '$schoolCode'";
			$dbquery_passageId = new dbquery($query_passageId,$connid); 
			while($row_passageId = $dbquery_passageId->getrowarray())
			{
				$id = $row_passageId["id"];
			}
			if($id != "")
			{
				$query_update = "UPDATE da_passageUsage set last_useddate='$test_date',updated_dt=NOW() WHERE id = '$id'";
				$dbquery_update = new dbquery($query_update,$connid); 
			}
			else 
			{
				$query_insert = "INSERT into da_passageUsage (schoolCode,class,passage_id,use_as,last_useddate,updated_dt) VALUES('".$schoolCode."','".$class."','".$valuePassgaeId."','".$use_as."','".$test_date."',NOW())";
				$dbquery_insert = new dbquery($query_insert,$connid); 
			}
		}
	}
	
	function passageRevertProcess($connid)
	{
		$paperCode = "";
		$paperCode = $this->papercode;
		$class = "";
		$class = $this->class;
		$schoolCode = "";
		
		$query_testdetails = "SELECT schoolCode FROM da_testRequest WHERE id = '$this->test_requestid'";
		$dbquery_testdetails = new dbquery($query_testdetails,$connid); 
		while($row_testdetails = $dbquery_testdetails->getrowarray())
		{
			$schoolCode = $row_testdetails["schoolCode"];
		}	
		
		$query = "SELECT a.passage_id FROM da_questions a,da_paperDetails b WHERE FIND_IN_SET(a.qcode,b.qcode_list) AND papercode = '$paperCode'";
		$dbquery = new dbquery($query,$connid); 
		while($row = $dbquery->getrowarray())
		{
			if($row["passage_id"]!=0)
			{
				$arrPassageId[$row["passage_id"]] = $row["passage_id"];
			}	
		}
		
		foreach($arrPassageId as $keyPassageId => $valuePassageId)
		{
			$passage_id = "";
			$passage_id = $valuePassageId;
			$id = "";
			$query_passageId = "SELECT id FROM da_passageUsage WHERE passage_id = '$passage_id' AND class = '$class' AND schoolCode = '$schoolCode'";
			$dbquery_passageId = new dbquery($query_passageId,$connid); 
			while($row_passageId = $dbquery_passageId->getrowarray())
			{
				$id = $row_passageId["id"];
			}
			$arrQcode = array();
			$qcode_list = "";
			$query_qcodes = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '$paperCode'";
			$dbquery_qcodes = new dbquery($query_qcodes,$connid); 
			while($row_qcodes = $dbquery_qcodes->getrowarray())
			{
				$qcode_list = $row_qcodes["qcode_list"];
			}
			$arrQcode = explode(",",$qcode_list);
			$arrRequestId = array();
			foreach($arrQcode as $keyQcode => $valueQcode)
			{
				$queryUsed = "SELECT b.schoolCode,b.test_date,b.id,b.class FROM da_paperDetails a,da_testRequest b where a.papercode = b.paper_code AND FIND_IN_SET($valueQcode,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND (b.year = '2012' OR b.year='2011') AND b.type = 'actual' AND b.schoolCode = '$schoolCode' AND b.class = '$class' AND b.subject = '1'";
				$dbqueryUsed = new dbquery($queryUsed,$connid);
				while($resultUsed = $dbqueryUsed->getrowarray())
				{					
					$arrRequestId[$passage_id][$resultUsed["id"]] = $resultUsed["test_date"];
					
				}
			}
			
			$last_useddate = "";
			if(isset($arrRequestId) && count($arrRequestId)>0)
			{				
				foreach($arrRequestId as $keyRequestId => $valueRequestId)
				{
					arsort($valueRequestId);
					
					$arrayKeys = array_keys($valueRequestId);
					$qcode_key  = $arrayKeys[0]; 
					$last_used_date = $valueRequestId[$qcode_key];
					$last_used_date = $last_used_date." 00:00:00";
					$query_update = "UPDATE da_passageUsage set last_useddate = '$last_used_date',updated_dt='NOW()' WHERE id = '$id'";
					$dbquery_update = new dbquery($query_update,$connid);
				}	
				
				
				//exit;
			}	
			else 
			{
				if($id!="")
				{
					$query_delete = "DELETE FROM da_passageUsage WHERE id = '$id'";
					$dbquery_delete = new dbquery($query_delete,$connid);
				}				
			}			
		}		
	}	
	##########################Passage Updation Process##########################
		
	function qcodeSelectType($qcode,$connid)
	{
		$flag_set = 0;
		$query = "SELECT parent_qcode from da_questions where qcode = '$qcode'";
		$dbquery = new dbquery($query,$connid); 
		while($row = $dbquery->getrowarray())
		{
			if($row["parent_qcode"]==0)
			{
				$flag_set = "Unique";
			}
			else 
			{
				$flag_set = "Copy";
			}
		}
		return $flag_set;
	}
	
	function getSSTMappedToQcodeDuringApprove($arrQcodeApprove=array(),$connid)
	{
		$sstUsed = array();
		foreach($arrQcodeApprove as $key => $value)
		{
			$query = "SELECT sub_subtopic_code from da_questions where qcode = '$value'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$sstUsed[$row["sub_subtopic_code"]][$value] = $value;  
			}
		}	
		return $sstUsed; 	
	}
	
	function updateQuestionsByReportingHead($connid,$papercode)
	{
		$version = 1;
		$queryCheck = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' AND version = '".$version."' AND qcode_list != '' ";
		$dbqueryCheck = new dbquery($queryCheck,$connid);
		$rowCheck = $dbqueryCheck->getrowarray();
		$strqcode = $rowCheck["qcode_list"];
		$arrReportingDetails = $this->getReportingHeadSSTwise($connid,$papercode);
		if($dbqueryCheck->numrows() > 0)
		{
			$querynsst = "SELECT sub_subtopic_code,qcode FROM da_questions WHERE qcode IN (".$strqcode.") ORDER BY FIELD(qcode,".$strqcode.")";
			$dbquerynsst = new dbquery($querynsst,$connid);
			while($rownsst = $dbquerynsst->getrowarray())
			{
				$rhid = $arrReportingDetails[$rownsst["sub_subtopic_code"]];
				$arrRhQues[$rhid][] = $rownsst["qcode"];
			}
			
			if(is_array($arrRhQues) && count($arrRhQues) >0)
			{
				foreach ($arrRhQues as $qkey => $qvalue)
				{
					$strRhques = "";
					$strRhques = implode(",",$arrRhQues[$qkey]);
					if($strRhques != "")
					$this->setReportingHeadQcodeList($connid,$qkey,$strRhques);
				}
			}
		}
	}
	function checkReportingHeadWiseQuestionCount($connid,$papercode)
	{
		$version = 1;
		$queryCheck = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' AND version = '".$version."' AND qcode_list != '' ";
		$dbqueryCheck = new dbquery($queryCheck,$connid);
		$rowCheck = $dbqueryCheck->getrowarray();
		$strqcode = $rowCheck["qcode_list"];
		$arrReportingDetails = $this->getReportingHeadSSTwise($connid,$papercode);
		$arrReportingHeadReqQues = $this->getRequiredQuesByReportingHead($connid,$papercode);
		if($dbqueryCheck->numrows() > 0)
		{
			$querynsst = "SELECT sub_subtopic_code,qcode FROM da_questions WHERE qcode IN (".$strqcode.") ORDER BY FIELD(qcode,".$strqcode.")";
			$dbquerynsst = new dbquery($querynsst,$connid);
			while($rownsst = $dbquerynsst->getrowarray())
			{
				$rhid = $arrReportingDetails[$rownsst["sub_subtopic_code"]];
				$arrRhQues[$rhid][] = $rownsst["qcode"];
			}
			
			if(is_array($arrRhQues) && count($arrRhQues) >0)
			{
				foreach ($arrRhQues as $qkey => $qvalue)
				{
					if($arrRhQues[$qkey] == $arrReportingHeadReqQues[$qkey]["required_ques"])
					continue;
					else
					return $arrReportingHeadReqQues[$qkey]["reporting_head"];
				}
			}
		}
		return 0;
	}
	function getRequiredQuesByReportingHead($connid,$papercode)
	{
		$arrRet = array();
		$query = "SELECT required_ques,reporting_id,reporting_head FROM da_reportingDetails WHERE papercode = '".$papercode."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["reporting_id"]]["required_ques"] = $row["required_ques"];
			$arrRet[$row["reporting_id"]]["reporting_head"] = $row["reporting_head"];
		}
		return $arrRet;
	}
	function setReportingHeadQcodeList($connid,$reporting_id,$qcode_list)
	{
		$query = "UPDATE da_reportingDetails SET qcode_list = '".$qcode_list."' WHERE reporting_id = '".$reporting_id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
	}
	function unfinalizePaper($connid)
	{
		
		$this->saveUnfinalizeReason($connid);
		$query = "UPDATE da_testRequest SET status = 'pending',reapproved = '1',approved_date = '' WHERE paper_code = '".$this->papercode."' AND id = '".$this->test_requestid."' AND status = 'Approved' ";
		$dbquery = new dbquery($query,$connid);
		$this->renameFiles($connid,$this->test_requestid);
		
		/******************Added By Parth Start 13/04/2012 ******************/
		$countFetchCalculat = 0;
		$queryFetchCalculat = "SELECT count(*) as finalcount from da_questionSelectionSummary where request_id = '$this->test_requestid' AND type = 'Finalize'";
		$dbqueryFetchCalculat = new dbquery($queryFetchCalculat,$connid);
		while($rowFetchCalculat = $dbqueryFetchCalculat->getrowarray())
		{
			$countFetchCalculat = $rowFetchCalculat["finalcount"];
		}
		if($countFetchCalculat>0)
		{
			$queryDeleteCalculat = "DELETE from da_questionSelectionSummary where request_id = '$this->test_requestid' AND type = 'Finalize'";
			$dbqueryDeleteCalculat = new dbquery($queryDeleteCalculat,$connid);
		}
		/******************Added By Parth End 13/04/2012 ******************/
		
		// Decrement school usage Count for questions

		$queryPaperDetailsGet = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."' AND version =1";
		$dbqueryPaperDetailsGet = new dbquery($queryPaperDetailsGet,$connid);
		$rowPaperDetailsGet = $dbqueryPaperDetailsGet->getrowarray();

		if($rowPaperDetailsGet["qcode_list"] != "")
		{
			$queryUpdatePaperDetailsGet = "UPDATE da_questions SET school_usage = IF(school_usage =0 , 0 , school_usage - 1),lastModified = lastModified where qcode IN (".$rowPaperDetailsGet["qcode_list"].")";
			$dbqueryUpdatePaperDetailsGet = new dbquery($queryUpdatePaperDetailsGet,$connid);
		}
		// End Decrement school usage on unfinalize

		##########################Passage Updation Process##########################
		if($this->subjectno==1)
		{
			$this->passageRevertProcess($connid);
		}
		##########################Passage Updation Process##########################
		
		# Log for paperDetails & reportingDetails
		$this->InsertPaperLog($this->papercode,"UNFINALIZE",$connid);
		
		// delete the pdf when unfinalized is clicked 
		if($this->test_requestid !=""){
			if(constant("SERVER_TYPE") == "Live"){
				$this->deleteFromBucket($connid);
			}	
		}
	}
	function renameFiles($connid,$requestid)
	{
		$query = "SELECT exam_code,schoolCode FROM da_examDetails a,da_testRequest b WHERE a.request_id = b.id AND request_id = '".$requestid."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			for($i=1;$i<=4;$i++)
			{
				$path = "PDF/".$row["schoolCode"]."/".$requestid."/papers/".$row["exam_code"].$i.".pdf";
				$pathnew = "PDF/".$row["schoolCode"]."/".$requestid."/papers/".$row["exam_code"].$i."_".date("YmdHis").".pdf";
								
				if(!copy($path,$pathnew))
				echo "Copy failed";
			}
		}
	}
	function printLastGeneratedPDF($connid)
	{
		$query = "SELECT DATE_FORMAT(lastPDFgenerated,'%d-%m-%Y %H:%i:%s') FROM da_testRequest WHERE id = '".$this->test_requestid."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function saveUnfinalizeReason($connid)
	{
		$reason = $_SESSION["username"]."(".date("d-m-Y H:i:s")."):".$this->ufreason;
		$query = "UPDATE da_testRequest SET unfinalize_reason = CONCAT_WS('<br>',unfinalize_reason,'".$reason."') WHERE id = '".$this->test_requestid."' ";
		$dbquery = new dbquery($query,$connid);
	}
	function createPaperCopies($connid)
	{
		$querySel = "SELECT * FROM da_paperDetails WHERE CONCAT(papercode,'_v',version) = '".$this->papercode."' ";
		$dbquerySel = new dbquery($querySel,$connid);
		$rowSel = $dbquerySel->getrowarray();
	}
	function generateCopyCheck($connid)
	{
		$test = $this->getTestDetailsByCode($connid);
		$query = "SELECT id FROM da_testRequest WHERE schoolCode = '".$test["schoolCode"]."' AND class =  '".$test["class"]."' AND subject = '".$test["subject"]."' AND chapter_id = '".$test["chapter_id"]."' AND year = '".$test["year"]."' AND paper_code != '".$this->papercode."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = $row["id"];
		}
		return $arrRet;
	}
	function getBluePrintDetails($connid)
	{
		$query = "SELECT * FROM da_bluePrintDetails WHERE paper_type = '".$this->paperType."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function saveComments($connid,$approver)
	{
		
		$this->error = "";
		if($this->testStatus == "responded")
		{
			$arrValidations = $this->validationFinalize($connid);
			foreach($arrValidations as $key => $value)
			{
				$this->error.= "<div align='center'><font color='red'><b>".$value."</b></font></div>";
			}
		}
		if($this->error == "")
		{
			$query = "INSERT INTO da_testComments SET paper_code = '".$this->papercode."',comment='".$this->comments."',commenter = '".$_SESSION["username"]."',submitdate = NOW()";
			$dbquery = new dbquery($query,$connid);
			$this->changeStatus($connid,$this->testStatus);
		}
		
	}
	function getTestComments($connid,$papercode)
	{
		$query = "SELECT *,DATE_FORMAT(submitdate,'%d-%m-%Y') as comment_date FROM da_testComments WHERE paper_code = '".$papercode."'";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function changeStatus($connid,$status)
	{
		$query = "UPDATE da_testRequest SET status = '".$status."' WHERE paper_code ='".$this->papercode."' AND id = '".$this->test_requestid."' AND status != 'Approved' ";
		$dbquery = new dbquery($query,$connid);
	}
	function saveReportingDetails($connid)
	{
		
		$papercode = explode("_v",$this->papercode);
		
		foreach($this->reportingLevelArray as $report_id => $reportvalue)
		{
			if($reportvalue != "")
			{
				$sstcode = $this->groupsst[$report_id];
				if($reportvalue == "sst")
				$reportingHead = trim($this->sstname[$sstcode]);
				else
				$reportingHead = trim($this->stname[$sstcode]);


				$queryCD = "SELECT reporting_id,FIND_IN_SET('".$this->groupsst[$report_id]."',sst_list) FROM da_reportingDetails WHERE papercode = '".$papercode[0]."' AND reporting_level = '".$reportvalue."' AND reporting_head = '".addslashes($reportingHead)."' ";
				$dbqueryCD = new dbquery($queryCD,$connid);
				$row = $dbqueryCD->getrowarray();
				if($dbqueryCD->numrows() > 0)
				{
					if($row[1] == 0 && $this->groupsst[$report_id] > 0)
					{
						$query = "UPDATE da_reportingDetails SET sst_list = CONCAT(sst_list,',','".$this->groupsst[$report_id]."'),modified_by = '".$_SESSION["username"]."',lastModifiedDate = NOW(),reporting_order = '".$this->reportingOrder[$report_id]."' WHERE reporting_id = '".$row["reporting_id"]."' AND papercode = '".$papercode[0]."' ";
						$dbquery = new dbquery($query,$connid);
					}
				}
				else if($this->groupsst[$report_id] > 0)
				{
					$query = "INSERT INTO da_reportingDetails SET papercode = '".$papercode[0]."',reporting_level = '".$reportvalue."',sst_list = '".$this->groupsst[$report_id]."',reporting_head = '".$reportingHead."',entered_dt = CURDATE(),entered_by = '".$_SESSION["username"]."',reporting_order = '".$this->reportingOrder[$report_id]."'  ";
					$dbquery = new dbquery($query,$connid);
				}				
			}
		}
		
	}
	function saveEnglishReportingDetails($connid)
	{
		$this->setpostvars();
		$papercode = explode("_v",$this->papercode);
		$query = "INSERT INTO da_reportingDetails(reporting_head,sst_list,required_ques,reporting_level,papercode) SELECT b.description, b.sub_subtopic_code, max_ques,'sst','".$papercode[0]."' FROM da_blueprintDetails a, da_subSubTopicMaster b WHERE subjectno='1' AND paper_type='".$this->paperType."' AND a.class = '".$this->class."' AND a.sub_subtopic_code=b.sub_subtopic_code";
		$dbquery = new dbquery($query,$connid);

		$querySSTlist = "SELECT GROUP_CONCAT(sst_list) as list FROM da_reportingDetails WHERE papercode = '".$papercode[0]."' ORDER BY reporting_order";
		$dbquerySSTlist = new dbquery($querySSTlist,$connid);
		$row = $dbquerySSTlist->getrowarray();		
	}
	function getEnglishReportingDetails($connid,$criteria="")
	{
		$condition = "AND (e.class = '".$this->class."'";
		if($criteria == "Auto" && $this->subjectno == 1)
		{
			$prioritySet = array();
			$prioritySet = $this->SelectPriorityAsPerClass($this->class,$connid);
			foreach($prioritySet as $keyPriority => $valuePriority)	
			{
				foreach($valuePriority as $keyP => $valueP)
				{
					if($valueP != $this->class)
					{
						$condition .= " OR  e.class = '".$valueP."'";
					}	
				}
			}
			
		}
		$condition = $condition.")";
			
		$query ="SELECT b.description as sub_subtopic, b.sub_subtopic_code,c.subtopic_code,c.description as subtopic,d.description as topic,d.topic_code,COUNT(qcode) as qcount
				 FROM da_subSubTopicMaster b,da_subtopicMaster c,da_topicMaster d,da_questions e
				 WHERE b.subtopic_code = c.subtopic_code AND c.topic_code = d.topic_code AND b.sub_subtopic_code = e.sub_subtopic_code
				 AND d.subjectno =1 AND e.subjectno='1' AND e.status = '3' $condition
				 GROUP BY e.sub_subtopic_code ORDER BY topic,subtopic,sub_subtopic";

		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getActualQuesBySST($connid,$sstlist)
	{
		$arrRet = array();
		if($sstlist == "")
		return;
		$query = "SELECT sub_subtopic_code,COUNT(qcode) as qcount FROM da_questions WHERE sub_subtopic_code IN (".$sstlist.") GROUP BY sub_subtopic_code ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["sub_subtopic_code"]] = $row["qcount"];
		}
		return $arrRet;
	}
	function updateReportingHeadAndReqQues($connid)
	{
		
		$papercode = explode("_v",$this->papercode);
		foreach($this->reportingHead as $key => $value)
		{			

			$sstlist = "";
			$sstlist = implode(",",$this->sstlist[$key]);
			if($sstlist != "" && $value != "")
			{
				if($this->reportingHeadID[$key] > 0)
				{
					if(trim(strtolower($value)) ==='other areas')
						$value.='*';

					$queryDC = "SELECT reporting_order FROM da_reportingDetails WHERE papercode = '".$papercode[0]."' AND reporting_head = '".$value."' AND reporting_order = '".$this->reportingOrder[$key]."' AND required_ques = '".$this->requiredQues[$key]."'";
					$dbqueryDC = new dbquery($queryDC,$connid);
					$rowDC = $dbqueryDC->getrowarray();

					$query = "UPDATE da_reportingDetails SET reporting_head = '".$value."',required_ques = '".$this->requiredQues[$key]."',modified_by = '".$_SESSION["username"]."',reporting_order = '".$this->reportingOrder[$key]."',sst_list = '".$sstlist."',same_ans_que_flag='0' WHERE reporting_id = '".$this->reportingHeadID[$key]."' LIMIT 1";
					$dbquery = new dbquery($query,$connid);
					if($rowDC["reporting_order"] != $this->reportingOrder[$key])
					$this->updatePaperDetails($connid);
					if($this->subjectno == 1)
					{
						######################For same answer checking#####################
						$this->commonForReportingHeadChecking($papercode[0],$connid,$this->reportingHeadID[$key]);
						######################For same answer checking#####################
					}	
					
					#########################Check For update######################### 
					$flag_set = "";
					$flag_set = $this->getStatusOfAutopublish($connid);
					if($flag_set=="Auto")
					{
						$this->updateProcessStatusFlag($connid);
					}	
					#########################Check For update######################### 					
				}
				else
				{
					$queryDC = "SELECT count(*) FROM da_reportingDetails WHERE papercode = '".$papercode[0]."' AND reporting_head = '".$value."' AND reporting_order = '".$this->reportingOrder[$key]."' AND required_ques = '".$this->requiredQues[$key]."'";
					$dbqueryDC = new dbquery($queryDC,$connid);
					$rowDC = $dbqueryDC->getrowarray();
					if($rowDC[0] == 0)
					{
						if(trim(strtolower($value)) ==='other areas')
							$value.='*';

						$query = "INSERT INTO da_reportingDetails SET papercode = '".$papercode[0]."',reporting_level = 'sst',sst_list = '".$sstlist."',reporting_head = '".$value."',required_ques = '".$this->requiredQues[$key]."',entered_by = '".$_SESSION["username"]."',reporting_order = '".$this->reportingOrder[$key]."',entered_dt = CURDATE() ";
						$dbquery = new dbquery($query,$connid);
						if($this->subjectno == 1)
						{				
							######################For same answer checking#####################
							$this->commonForReportingHeadChecking($papercode[0],$connid);
							######################For same answer checking#####################
						}	
						
						#########################Check For update######################### 
						$flag_set = "";
						$flag_set = $this->getStatusOfAutopublish($connid);
						if($flag_set=="Auto")
						{
							$this->updateProcessStatusFlag($connid);
						}	
						#########################Check For update######################### 	
					}
				}
			}

		}
		
	}
	function insertReportingHeadAndReqQues($connid)
	{
		$flag = 0;
		$papercode = explode("_v",$this->papercode);
		
		if($flag == 0)
		{
			foreach($this->reportingHead as $key => $value)
			{
				$sstlist = implode(",",$this->sstlist[$key]);
				if($sstlist != "")
				{
					$query = "INSERT INTO da_reportingDetails SET papercode = '".$papercode[0]."',reporting_level = 'sst',sst_list = '".$sstlist."',reporting_head = '".$value."',required_ques = '".$this->requiredQues[$key]."',entered_by = '".$_SESSION["username"]."',reporting_order = '".$this->reportingOrder[$key]."',entered_dt = CURDATE() ";
					$dbquery = new dbquery($query,$connid);
				}
			}
			
		}
		else if($flag == 1)
		{
			$this->error = "<div align='center'><font color='red'><b>SST mapped against the reporting heads have duplicates please check</b></font></div>";
		}
	}
	function getSSTduplicateCheck($connid)
	{
		$papercode = explode("_v",$this->papercode);
		foreach($this->reportingHead as $key => $value)
		{
			$arrSST = $this->sstlist[$key];
			foreach($arrSST as $sst => $sstval)
			{
				$arrComSST[] = $sstval;
			}
		}
		$arrUniqueSST = array_unique($arrComSST);
		$query = "SELECT count(*) FROM da_reportingDetails WHERE papercode = '".$papercode[0]."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if(count($arrUniqueSST) != count($arrComSST))
		return 1;
		else if($row[0] > 0)
		return 2;
		else
		return 0;
	}
	function getMaxQuesBluePrint($connid,$subject,$class,$papertype="")
	{
		$query = "SELECT SUM(max_ques) FROM da_blueprintDetails WHERE subjectno = '".$subject."' AND class = '".$class."' ";
		if($subject == 1)
		$query.= " AND paper_type = '".$papertype."' ";

		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getMaxQuesBluePrintEnglishAuto($connid,$subject,$class,$papertype="",$board="")
	{
		$query = "SELECT total_ques FROM da_autoblueprintdetails WHERE subjectno = '".$subject."' AND class = '".$class."' AND board = '".$board."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function transferIndicatorQuestions($connid)
	{
		$papercode = explode("_v",$this->papercode);
		$querySST = "SELECT * FROM da_reportingDetails WHERE papercode = '".$papercode[0]."' ORDER BY reporting_order";
		$dbquerySST = new dbquery($querySST,$connid);
		if($dbquerySST->numrows() > 0)
		{
			while($rowSST = $dbquerySST->getrowarray())
			{
				$sstlist = $rowSST["sst_list"];
				$papercode = explode("_v",$this->papercode);
				$query = "SELECT GROUP_CONCAT(qcode ORDER BY FIELD(sub_subtopic_code,".$sstlist.") ) as qlist FROM da_questions WHERE sub_subtopic_code IN (".$sstlist.") AND tag_ques = '1' AND status = '3' ";
				if($this->subjectno == 1)
				$query.=" AND class = '".$this->class."' ";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				$qlist = $row["qlist"];

				$queryCheck = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$papercode[0]."' AND version = 1 ";
				$dbqueryCheck = new dbquery($queryCheck,$connid);
				$row_check = $dbqueryCheck->getrowarray();
				if($row_check["qcode_list"] != '' && $qlist != '')
				{
					$queryUpdate = "UPDATE da_paperDetails SET qcode_list = CONCAT(qcode_list,',','".$qlist."') WHERE papercode = '".$papercode[0]."' AND version = 1 ";
					$dbqueryUpdate = new dbquery($queryUpdate,$connid);
				}
				else if($qlist != '')
				{
					$queryUpdate = "UPDATE da_paperDetails SET qcode_list = '".$qlist."' WHERE papercode = '".$papercode[0]."' AND version = 1 ";
					$dbqueryUpdate = new dbquery($queryUpdate,$connid);
				}
			}
		}
	}
	function getQcountBySSTcode($connid,$sstlist,$type="",$condition="")
	{
		if($sstlist == "")
		return;
		$papercode = explode("_v",$this->papercode);
		$queryPC = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$papercode[0]."' ";
		$dbqueryPC = new dbquery($queryPC,$connid);
		$rowPC = $dbqueryPC->getrowarray();

		$query = "SELECT COUNT(qcode) FROM da_questions WHERE sub_subtopic_code IN (".$sstlist.") AND status = '3' ";

		if($rowPC["qcode_list"] != "")
		$query.=" AND qcode NOT IN (".$rowPC["qcode_list"].") ";
		if($type == "indicator")
		$query.=" AND tag_ques = '1' ";
		if($type == "misconception")
		$query.=" AND misconception = '1' ";

		if($condition != '')
		$query .= $condition;

		if($this->subjectno == 1)
		$query.=" AND class = '".$this->class."' ";
		
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function resetReportingDetails($connid)
	{
		
		$papercode = explode("_v",$this->papercode);
		$query = "DELETE FROM da_reportingDetails WHERE papercode = '".$papercode[0]."'";
		$dbquery = new dbquery($query,$connid);
		
		$queryQues = "UPDATE da_paperDetails SET qcode_list = '' WHERE papercode = '".$papercode[0]."'";
		$dbqueryQues = new dbquery($queryQues,$connid);		
		
		$this->saveResetManualReason($connid,$this->reasonManualSet);
		$queryTestDate = "UPDATE da_testRequest SET flag='Manual',reset_flag='Y',auto_type=0,lastPdfGenerated = '0000-00-00 00:00:00',status = 'pending',imported_requestid='',progress_status='0' WHERE id = '".$this->test_requestid."' ";
		$dbqueryTestDate = new dbquery($queryTestDate,$connid);
		
	    /***************************Added For Reset All table of summary table *****************/
		$counterforsummaryquestions = 0;
		$querySelectSummaryQuestions = "SELECT count(*) as request_id_count from da_questionSelectionSummary WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestions =  new dbquery($querySelectSummaryQuestions,$connid);
		while($rowSelectSummaryOperation = 	$dbquerySelectSummaryQuestions->getrowarray())
		{
			$counterforsummaryquestions = $rowSelectSummaryOperation["request_id_count"]; 
		}
		if($counterforsummaryquestions>0)
		{
			$querySummaryQuestions = "DELETE FROM da_questionSelectionSummary WHERE request_id = '".$this->test_requestid."'";
			$dbquerySummaryQuestions = new dbquery($querySummaryQuestions,$connid);
		}
		
		$counterforsummaryquestionsSST = 0;
		$querySelectSummaryQuestionsSST = "SELECT count(*) as request_id_count from da_questionSSTMismatch WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestionsSST =  new dbquery($querySelectSummaryQuestionsSST,$connid);
		while($rowSelectSummaryOperationSST = 	$dbquerySelectSummaryQuestionsSST->getrowarray())
		{
			$counterforsummaryquestionsSST = $rowSelectSummaryOperationSST["request_id_count"]; 
		}
		if($counterforsummaryquestionsSST>0)
		{
			$querySummaryQuestionsSST = "DELETE FROM da_questionSSTMismatch WHERE request_id = '".$this->test_requestid."' ";
			$dbquerySummaryQuestionsSST = new dbquery($querySummaryQuestionsSST,$connid);
		}
		
        #######For Rejected Questions ################
		$counterforsummaryquestionsRejected = 0;
		$querySelectSummaryQuestionsRejected = "SELECT count(*) as request_id_count from da_questionRejectedAssembly WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestionsRejected =  new dbquery($querySelectSummaryQuestionsRejected,$connid);
		while($rowSelectSummaryOperationRejected = 	$dbquerySelectSummaryQuestionsRejected->getrowarray())
		{
			$counterforsummaryquestionsRejected = $rowSelectSummaryOperationRejected["request_id_count"]; 
		}
		if($counterforsummaryquestionsRejected>0)
		{
			$querySummaryQuestionsRejected = "DELETE FROM da_questionRejectedAssembly WHERE request_id = '".$this->test_requestid."' ";
			$dbquerySummaryQuestionsRejected = new dbquery($querySummaryQuestionsRejected,$connid);
		}
		#######For Rejected Questions ################
		
		#######For Condition  7################
		$counterforsummaryquestionsCondition = 0;
		$querySelectSummaryQuestionsCondition = "SELECT count(*) as request_id_count from da_autoReport WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestionsCondition =  new dbquery($querySelectSummaryQuestionsCondition,$connid);
		while($rowSelectSummaryOperationCondition = $dbquerySelectSummaryQuestionsCondition->getrowarray())
		{
			$counterforsummaryquestionsCondition = $rowSelectSummaryOperationCondition["request_id_count"]; 
		}
		if($counterforsummaryquestionsCondition>0)
		{
			$querySummaryQuestionsCondition = "DELETE FROM da_autoReport WHERE request_id = '".$this->test_requestid."' ";
			$dbquerySummaryQuestionsCondition = new dbquery($querySummaryQuestionsCondition,$connid);
		}
		#######For Condition  7################		
		
	}
	
	function refreshAutoReportingDetails($connid)
	{
		
		$papercode = explode("_v",$this->papercode);
		$query = "DELETE FROM da_reportingDetails WHERE papercode = '".$papercode[0]."'";
		$dbquery = new dbquery($query,$connid);
				
		$queryQues = "DELETE FROM da_paperDetails WHERE papercode = '".$papercode[0]."'";
		$dbqueryQues = new dbquery($queryQues,$connid);
		
		$queryTestDate = "UPDATE da_testRequest SET reset_flag='Y',paper_code='',auto_type=0,lastPdfGenerated = '0000-00-00 00:00:00',status = 'pending',imported_requestid='',progress_status='0' WHERE id = '".$this->test_requestid."' ";
		$dbqueryTestDate = new dbquery($queryTestDate,$connid);
		
		/***************************Added For Reset All table of summary table *****************/
		$counterforsummaryquestions = 0;
		$querySelectSummaryQuestions = "SELECT count(*) as request_id_count from da_questionSelectionSummary WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestions =  new dbquery($querySelectSummaryQuestions,$connid);
		while($rowSelectSummaryOperation = 	$dbquerySelectSummaryQuestions->getrowarray())
		{
			$counterforsummaryquestions = $rowSelectSummaryOperation["request_id_count"]; 
		}
		if($counterforsummaryquestions>0)
		{
			$querySummaryQuestions = "DELETE FROM da_questionSelectionSummary WHERE request_id = '".$this->test_requestid."' ";
			$dbquerySummaryQuestions = new dbquery($querySummaryQuestions,$connid);
		}
		
		$counterforsummaryquestionsSST = 0;
		$querySelectSummaryQuestionsSST = "SELECT count(*) as request_id_count from da_questionSSTMismatch WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestionsSST =  new dbquery($querySelectSummaryQuestionsSST,$connid);
		while($rowSelectSummaryOperationSST = 	$dbquerySelectSummaryQuestionsSST->getrowarray())
		{
			$counterforsummaryquestionsSST = $rowSelectSummaryOperationSST["request_id_count"]; 
		}
		if($counterforsummaryquestionsSST>0)
		{
			$querySummaryQuestionsSST = "DELETE FROM da_questionSSTMismatch WHERE request_id = '".$this->test_requestid."' ";
			$dbquerySummaryQuestionsSST = new dbquery($querySummaryQuestionsSST,$connid);
		}
		
		#######For Rejected Questions ################
		$counterforsummaryquestionsRejected = 0;
		$querySelectSummaryQuestionsRejected = "SELECT count(*) as request_id_count from da_questionRejectedAssembly WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestionsRejected =  new dbquery($querySelectSummaryQuestionsRejected,$connid);
		while($rowSelectSummaryOperationRejected = 	$dbquerySelectSummaryQuestionsRejected->getrowarray())
		{
			$counterforsummaryquestionsRejected = $rowSelectSummaryOperationRejected["request_id_count"]; 
		}
		if($counterforsummaryquestionsRejected>0)
		{
			$querySummaryQuestionsRejected = "DELETE FROM da_questionRejectedAssembly WHERE request_id = '".$this->test_requestid."' ";
			$dbquerySummaryQuestionsRejected = new dbquery($querySummaryQuestionsRejected,$connid);
		}
		#######For Rejected Questions ################
		
		#######For Condition  7################
		$counterforsummaryquestionsCondition = 0;
		$querySelectSummaryQuestionsCondition = "SELECT count(*) as request_id_count from da_autoReport WHERE request_id = '".$this->test_requestid."'";
		$dbquerySelectSummaryQuestionsCondition =  new dbquery($querySelectSummaryQuestionsCondition,$connid);
		while($rowSelectSummaryOperationCondition = $dbquerySelectSummaryQuestionsCondition->getrowarray())
		{
			$counterforsummaryquestionsCondition = $rowSelectSummaryOperationCondition["request_id_count"]; 
		}
		if($counterforsummaryquestionsCondition>0)
		{
			$querySummaryQuestionsCondition = "DELETE FROM da_autoReport WHERE request_id = '".$this->test_requestid."' ";
			$dbquerySummaryQuestionsCondition = new dbquery($querySummaryQuestionsCondition,$connid);
		}
		#######For Condition  7################	

		// Delete entry from da_autoAssemblyQues after paper on reset auto
		$del_query ="DELETE FROM da_autoAssemblyQues where request_id ='".$this->test_requestid."' ";
		$del_dbquery = new dbquery($del_query,$connid);

		
		if(empty($this->changeBalanceChapter) && count($this->changeBalanceChapter)==0 && $this->action!="autoAssemble_english" && $this->action!="autoAssemble" && $this->action!="updateRequestDetails"){
			echo "<script>window.location.href = 'daAdmin_teacherPaperRequests.php?action=SearchRequests&requests=".$this->test_requestid."&srchyear=-1&flag_for_auto=Auto'</script>"; 
		}		
		
	}
	
	
	function getSSTlistByPaperCode($connid)
	{
		$papercode = explode("_v",$this->papercode);
		$query = "SELECT GROUP_CONCAT(sst_list) FROM da_reportingDetails WHERE papercode = '".$papercode[0]."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getBluePrintDetailsBySubject($connid,$subjectno,$class)
	{
		$query = "SELECT * FROM da_blueprintDetails WHERE subjectno = '".$subjectno."' AND class = '".$class."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getBluePrintDetailsByEnglishSubjectAuto($connid,$subjectno,$class,$board)
	{
		$query = "SELECT * FROM da_autoblueprintdetails WHERE subjectno = '".$subjectno."' AND class = '".$class."' AND board = '".$board."'";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getQcodeUsage($connid,$qcode)
	{
		$query = "SELECT COUNT(papercode) FROM da_paperDetails WHERE version=1 AND FIND_IN_SET('".$qcode."',qcode_list)>0";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	// function added to solve slave conenction issue in add test page 
	function getpaperValues($connid) {
		$querySchool = "SELECT schoolCode, class FROM da_testRequest WHERE subject = $this->subjectno AND paper_code = '".$this->papercode."' ";
		$dbquerySchool = new dbquery($querySchool,$connid);
		$rowSchool = $dbquerySchool->getrowarray();
		$schoolCode = $rowSchool["schoolCode"];
		$class = $rowSchool["class"];

		return array($schoolCode, $class);
	}
	function getQcodeSchoolWiseUsage($connid,$qcode, $sameClass=0,$schoolCode, $class)
	{
		$query = "SELECT COUNT(papercode) as qcount FROM da_paperDetails a,da_testRequest b 
			  	  WHERE a.papercode = b.paper_code AND b.type = 'actual' AND b.subject = $this->subjectno AND b.status = 'Approved' AND id != '$this->test_requestid' AND  version=1 AND FIND_IN_SET('".$qcode."',qcode_list)>0 AND schoolCode = '".$schoolCode."' ";;
		if($sameClass)
		 $query .= " AND class=$class";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["qcount"];
	}
	function setSamplePaperForRequest($connid,$request_id)
	{
		$SamplePaperCode = "2434";
		
		$testName = "Fractions and Time";
		
		$this->papercode = $SamplePaperCode;
		$this->spcl_requestid = $request_id;
		$query = "UPDATE da_testRequest SET paper_code = '".$SamplePaperCode."',status = 'Approved',testName = '".$testName."' WHERE id = '".$request_id."' ";
		$dbquery = new dbquery($query,$connid);
		
		$queryExamCode = "SELECT * FROM da_examDetails WHERE request_id = '".$request_id."' ";
		$dbqueryExamCode = new dbquery($queryExamCode,$connid);
		while($line = $dbqueryExamCode->getrowarray())
		{
			for($i=1;$i<=4;$i++)
			{
				$this->generatePDF($connid,$line["exam_code"],$i);
			}
		}
	}
	function getGrammarSkillsBreakupByPaper($connid)
	{
		$arrRet = array();
		$queryList = "SELECT chapter_id FROM da_testRequest WHERE id = '".$this->test_requestid."' AND subject = '1' AND paper_type IN ('1','3') ";
		$dbqueryList = new dbquery($queryList,$connid);
		$rowList = $dbqueryList->getrowarray();
		if($rowList["chapter_id"] != "")
		{
			$query = "SELECT sub_subtopic_code,skill_id,name,tool_tip FROM da_grammarSkillsBreakup WHERE skill_id IN (".$rowList["chapter_id"].")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["sub_subtopic_code"]][] = array("skill_id"=>$row["skill_id"],"name"=>$row["name"],"tool_tip"=>$row["tool_tip"]);
			}
		}
		return $arrRet;
	}
	
	function getPendingTestRequestSummary($connid,$datediff=0,$bySchoolCode=0)
	{
		$fieldname = "";
		$condition = " AND status != 'Approved' ";
		if($datediff == 10)
		$condition = " AND status = 'Approved' ";
		if($datediff == 9)
		$condition = "";
		if($bySchoolCode == 1)
		$fieldname = ",schoolname,schoolCode,GROUP_CONCAT(id ORDER BY id) as requests,GROUP_CONCAT(DATEDIFF(test_date,CURDATE()) ORDER BY id) as datediff ";
		$query = "SELECT COUNT(*)".$fieldname." FROM da_testRequest a,schools b WHERE a.schoolCode = b.schoolno ".$condition." AND type != 'demo' AND schoolCode != '2387554' AND schoolCode != 0 AND test_date != '0000-00-00' ";

		if($datediff == 2)
		$query.= " AND DATEDIFF(test_date,CURDATE()) <= '".$datediff."' ";
		if($datediff == 7)
		$query.= " AND DATEDIFF(test_date,CURDATE()) > '2' AND DATEDIFF(test_date,CURDATE()) <= '7' ";
		if($datediff == 8)
		$query.= " AND DATEDIFF(test_date,CURDATE()) > '7' ";

		if($bySchoolCode == 1)
		$query.= " GROUP BY schoolCode ORDER BY schoolname";
		
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getNoOfTestRequestBySchool($connid)
	{
		$arrTestRequests = array();
		$query = "SELECT schoolCode, count(id) as totReq FROM da_testRequest WHERE type='actual' GROUP BY schoolCode";
		$dbquery = new dbquery($query,$connid);
		while ($line = $dbquery->getrowarray())
		{
			$arrTestRequests[$line['schoolCode']] = $line['totReq'];
		}
		return $arrTestRequests;

	}
	function getExamDetails($connid)
	{
		$this->setgetvars();
		if($this->request_details != "")
		{
			$query = "SELECT a.*,schoolname,class,b.* FROM da_examDetails a,da_testRequest b,schools c WHERE a.request_id = b.id AND b.schoolCode = c.schoolno AND report_status = 'pending' AND request_id IN (".$this->request_details.") AND status = 'Approved' AND schoolCode != 0 AND schoolCode != '2387554' AND type = 'actual' AND exam_code IN (SELECT DISTINCT examcode FROM da_response)";
			$dbquery = new dbquery($query,$connid);
			return $dbquery;
		}
		else
		return 0;
	}
	function getPaperReuseFlag($connid,$schoolCode) {
		$query="SELECT paper_reuse FROM da_orderMaster WHERE schoolCode='$schoolCode' ORDER BY registration_date DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$line = $dbquery->getrowarray();
		return $line[paper_reuse];
	}
	function getAllExamCodesForRequest($connid,$request_id) {
		$query="SELECT class,section,exam_code,report_status,response_received,miscon_qcode_list,class_avg,scoring_date FROM da_testRequest a, da_examDetails b WHERE a.id=b.request_id AND a.id='$request_id' ORDER BY section";
		$dbquery = new dbquery($query,$connid);
		while ($line = $dbquery->getrowarray())
		{
			$returnArray[] = array($line['class'],$line[section],$line[exam_code],$line[report_status],$line[response_received],$line[miscon_qcode_list],$line[class_avg],$line["scoring_date"]);
		}
		return $returnArray;
	}
	function getSSTbyReportingHead($connid,$reportingID)
	{
		$arrRet = array();
		$query = "SELECT sst_list FROM da_reportingDetails WHERE reporting_id = '".$reportingID."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row["sst_list"] != "")
		{
			$querySST = "SELECT sub_subtopic_code,description FROM da_subSubTopicMaster WHERE sub_subtopic_code IN (".$row["sst_list"].") ";
			$dbquerySST = new dbquery($querySST,$connid);
			while($rowSST = $dbquerySST->getrowarray())
			{
				$arrRet[$rowSST["sub_subtopic_code"]] = $rowSST["description"];
			}
		}
		return $arrRet;
	}
	function getGrammarSkillsByClass($connid,$class)
	{
		$arrRet = array();
		$query="SELECT * FROM da_grammarSkillsBreakup WHERE class='".$class."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["skill_id"]] = array("skill_id"=>$row["skill_id"],
			"name"=>$row["name"],
			"tool_tip"=>$row["tool_tip"]
			);
		}
		return $arrRet;
	}
	function getQuesImagesValidityToFinalize($connid,$qcode_list)
	{
		$count = 0;
		$arrQcodes = array();
		if($qcode_list != "")
		{
			$query = "SELECT DISTINCT a.qcode FROM da_questions a,da_images b WHERE a.qcode = b.id AND where_in_question != 'GT' AND b.status < 3 AND a.qcode IN (".$qcode_list.")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if(!in_array($row["qcode"],$arrQcodes))
				$arrQcodes[] = $row["qcode"];
			}

			$queryGrp = "SELECT DISTINCT a.qcode,b.id FROM da_questions a,da_images b WHERE a.group_id = b.id AND where_in_question = 'GT' AND b.status < 3 AND a.qcode IN (".$qcode_list.")";

			$dbqueryGrp = new dbquery($queryGrp,$connid);
			while($rowGrp = $dbqueryGrp->getrowarray())
			{
				if(!in_array($rowGrp["id"],$arrQcodes))
				$this->arrGRPQustion[$rowGrp["id"]] = "Group Id-".$rowGrp["id"]."(";
				
				$this->arrGRPQustion[$rowGrp["id"]] =  $this->arrGRPQustion[$rowGrp["id"]].$rowGrp["qcode"].",";
				
				if(!in_array($rowGrp["id"],$arrQcodes))
				$arrQcodes[] = $rowGrp["id"];
			}
			foreach($this->arrGRPQustion as $key=>$value)
			{
				$this->arrGRPQustion[$key] = substr_replace($this->arrGRPQustion[$key],")",-1);
			}		
			$queryPsg = "SELECT DISTINCT a.qcode FROM da_questions a,qms_images b WHERE a.passage_id = b.id AND b.status < '6' AND where_in_question IN ('P','PID') AND a.qcode IN (".$qcode_list.")";
			$dbqueryPsg = new dbquery($queryPsg,$connid);
			while($rowPsg = $dbqueryPsg->getrowarray())
			{
				if(!in_array($rowPsg["qcode"],$arrQcodes))
				$arrQcodes[] = $rowPsg["qcode"];
			}
		}
		return $arrQcodes;
	}
	function getUsageDetailsByQcode($connid,$qcode)
	{
		$arrRet = array();
		$query = "SELECT schoolno,schoolname,id FROM da_testRequest a,schools b WHERE a.schoolCode = b.schoolno AND paper_code IN (SELECT papercode FROM da_paperDetails WHERE version = '1' AND FIND_IN_SET('".$qcode."',qcode_list)>0)";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["id"]] = array("schoolno"=>$row["schoolno"],"schoolname"=>$row["schoolname"]);
		}
		return $arrRet;
	}
	function saveSchoolDataComparison($connid,$year)
	{		
		$this->setpostvars();
		if($this->action == "SaveComparison" && $this->searchSchool > 0)
		{			
			foreach($this->plannedCount as $key => $value)
			{				
				$queryCheck = "SELECT COUNT(*) FROM da_summaryPlanDetails WHERE monthVal = '".$key."' AND year = '".$year."' AND schoolCode = '".$this->searchSchool."' ";
				$dbqueryCheck = new dbquery($queryCheck,$connid);
				$rowCheck = $dbqueryCheck->getrowarray();
				if($rowCheck[0] == 0)
				{
					$query = "INSERT INTO da_summaryPlanDetails SET monthVal = '".$key."',year= '".$year."',planned_count = '".$value."',entered_by = '".$_SESSION["username"]."',entered_date = CURDATE(),schoolCode = '".$this->searchSchool."'   ";
					$dbquery = new dbquery($query,$connid);
				}
				else
				{
					$query = "UPDATE da_summaryPlanDetails SET planned_count = '".$value."',modified_by = '".$_SESSION["username"]."' WHERE monthVal = '".$key."' AND year = '".$year."' AND schoolCode = '".$this->searchSchool."'";
					$dbquery = new dbquery($query,$connid);
				}
			}
		}

	}
	function getSchoolWiseOrderDetails($connid,$year,$papers,$months)
	{
		$arrRet = array();
		$this->setpostvars();
		$arrModifiedMonthwise = $this->getModifiedSchoolMonthWiseCount($connid,$year);
		/**********************Commented And Added Start By Parth 02/06/2012 ******************************************/		
		if($this->searchSchool=="")
		{
			$monthArray = array("6"=>"Jun","7"=>"Jul","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec","1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May");
		}
		else 
		{
			$monthArray = $this->getMonthsArray($year,$connid);
		}
		/**********************Commented And Added End By Parth 02/06/2012 ******************************************/
				
		$arrMonthsCycle = array();
		$query = "SELECT COUNT(class) as cntclass,IF(e > 0,1,0) + IF(m > 0,1,0) + IF(s > 0,1,0) as cntsubject,schoolCode,a.order_id FROM da_orderMaster a,da_orderBreakup b,schools c WHERE a.order_id = b.order_id AND a.schoolCode = c.schoolno AND year = '".$year."' ";
		if(isset($this->searchSchool) && $this->searchSchool > 0)
		$query.=" AND schoolCode = '".$this->searchSchool."' ";
		if(isset($this->zone) && $this->zone != "")
		$query.=" AND region = '".$this->zone."' ";
		$query.=" GROUP BY schoolCode ";
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrStoreCheck = array();
			$sectionCount = 0;			
			$queryCycle = "SELECT * FROM da_cycleDates where order_id = '$row[order_id]'";
			$dbqueryCycle = new dbquery($queryCycle,$connid);
			while($rowCycle = $dbqueryCycle->getrowarray())
			{
				$queryCountSection = "SELECT count(DISTINCT(section)) as cnt FROM da_orderBreakup where order_id = '$row[order_id]' AND class = '$rowCycle[class]'";
					$dbqueryCountSection = new dbquery($queryCountSection,$connid);
					while($rowCountSection = $dbqueryCountSection->getrowarray())
					{
						$sectionCount = $rowCountSection["cnt"];
					}
				$monthsFetched = "";
				$monthsFetched = date('n',strtotime($rowCycle["to_date"]));
				$makeString = "";
				$makeString = $rowCycle["subject"]."-".$rowCycle["class"];				
								
				if($arrMonthsCycle[$monthsFetched]=="")
				{
					$arrMonthsCycle[$monthsFetched] = (1*$sectionCount);
				}
				else 
				{
					$arrMonthsCycle[$monthsFetched] = $arrMonthsCycle[$monthsFetched] + (1*$sectionCount);
				}	
				
				$arrStoreCheck[] = $rowCycle["subject"]."-".$rowCycle["class"];
			}
		}
		
		$arrRet = $arrMonthsCycle;
		
		return $arrRet;
	}	
	
	function getSchoolWiseOrderDetailsBreakupOld($connid,$year,$papers,$months)
	{
		$arrRet = array();
		$condition = "";
		$this->setgetvars();
		if($this->searchSchool > 0)
		$condition = " AND schoolCode = '".$this->searchSchool."' ";
		$query = "SELECT schoolCode,schoolname,COUNT(class) as cntclass,IF(e > 0,1,0) + IF(m > 0,1,0) + IF(s > 0,1,0) as cntsubject FROM da_orderMaster a,da_orderBreakup b,schools c WHERE a.order_id = b.order_id AND a.schoolCode = c.schoolno AND year = '".$year."' ".$condition." GROUP BY schoolCode";				
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$value = 0;
			$value = ($row["cntclass"]*$row["cntsubject"]*$papers)/$months;
			$arrRet[$row["schoolCode"]] = array("schoolCode"=>$row["schoolCode"],"schoolname"=>$row["schoolname"],"cntclass"=>$row["cntclass"],"cntsubject"=>$row["cntsubject"],"plannedCount"=>$value);
		}	
		
		return $arrRet;
	}
	
	function getSchoolWiseOrderDetailsBreakup($connid,$year,$papers,$months)
	{
		$arrRet = array();
		$condition = "";
		$this->setgetvars();
		if($this->searchSchool > 0)
		$condition = " AND schoolCode = '".$this->searchSchool."' ";
		$query = "SELECT schoolCode,schoolname,COUNT(class) as cntclass,IF(e > 0,1,0) + IF(m > 0,1,0) + IF(s > 0,1,0) as cntsubject,a.order_id FROM da_orderMaster a,da_orderBreakup b,schools c WHERE a.order_id = b.order_id AND a.schoolCode = c.schoolno AND year = '".$year."' ".$condition." GROUP BY schoolCode";		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$value = 0;
			##########Later Process #############
						
			$arrMonthsCycle = array();		
			$arrClass = array();
			$arrSubject = array();
			$countsubjectset = 0;
			$countclassset = 0;
				$arrStoreCheck = array();
				$sectionCount = 0;			
				$queryCycle = "SELECT * FROM da_cycleDates where order_id = '$row[order_id]'";
				$dbqueryCycle = new dbquery($queryCycle,$connid);
				while($rowCycle = $dbqueryCycle->getrowarray())
				{
					$queryCountSection = "SELECT count(DISTINCT(section)) as cnt FROM da_orderBreakup where order_id = '$row[order_id]' AND class = '$rowCycle[class]'";
					$dbqueryCountSection = new dbquery($queryCountSection,$connid);
					while($rowCountSection = $dbqueryCountSection->getrowarray())
					{
						$sectionCount = $rowCountSection["cnt"];
					}
					
					$monthsFetched = "";
					$monthsFetched = date('n',strtotime($rowCycle["to_date"]));
					$makeString = "";
					$makeString = $rowCycle["subject"]."-".$rowCycle["class"];				
					$arrClass[$rowCycle["class"]] = $rowCycle["class"]; 
					$arrSubject[$rowCycle["subject"]] = $rowCycle["subject"];
					
					if($arrMonthsCycle[$monthsFetched]=="")
					{
						$arrMonthsCycle[$monthsFetched] = (1*$sectionCount);
					}
					else 
					{
						$arrMonthsCycle[$monthsFetched] = $arrMonthsCycle[$monthsFetched] + (1*$sectionCount);
					}	
					
					$arrStoreCheck[] = $rowCycle["subject"]."-".$rowCycle["class"];
				}
			$countsubjectset= count($arrClass);
			$countclassset = count($arrSubject);
			$arrOrderOfMonths = array();	
			$queryModify = "SELECT start_date,end_date FROM da_orderMaster where order_id = '$row[order_id]'";
			$dbqueryModify = new dbquery($queryModify,$connid);	
			while($rowModify = $dbqueryModify->getrowarray())
			{
				$start_here = strtotime($rowModify["start_date"]);
				$end_here = strtotime($rowModify["end_date"]);
				$month = $start_here;
				$arrOrderOfMonths[] = date('n', $start_here);
				$month = strtotime("+1 month", $month);
				while($month <= $end_here) {
					$arrOrderOfMonths[] = date('n', $month);  
					$month = strtotime("+1 month", $month);			  
				}
				
			}			
			
			$arrFinalMakeMonths = array();
			foreach($arrOrderOfMonths as $keyOrderOfMonths => $valueOrderMonths)
			{
				foreach($arrMonthsCycle as $keyMonthsCycle => $valueMonthsCycle)
				{
					if($keyMonthsCycle == $valueOrderMonths)
					{
						$arrFinalMakeMonths[$keyMonthsCycle] = $valueMonthsCycle;
					}
				}
			}			
			
			foreach($arrFinalMakeMonths as $keyMonthsCycle => $valueMonthsCycle)
			{
				$value = $value + $valueMonthsCycle;
			}
			
			$get_month = date('n');
			$get_index = array_search($get_month,$arrOrderOfMonths); 
			
			$value1 = 0;
			foreach($arrOrderOfMonths as $keyOrderOfMonths => $valueOrderMonths)
			{
				if($keyOrderOfMonths<=$get_index)
				{
					foreach($arrMonthsCycle as $keyMonthsCycle => $valueMonthsCycle)
					{
						if($keyMonthsCycle == $valueOrderMonths)
						{
							$value1 = $value1 + $valueMonthsCycle;
						}
					}
				}
			}			
			
			##########Later Process #############			
						
			$arrRet[$row["schoolCode"]] = array("schoolCode"=>$row["schoolCode"],"schoolname"=>$row["schoolname"],"cntclass"=>$countclassset,"cntsubject"=>$countsubjectset,"plannedCount"=>$value,"tilldate_plannedCount"=>$value1);
		}	
		return $arrRet;
	}
	
	function getModifiedPlannedDate($connid,$year)
	{
		$arrRet = array();
		$this->setpostvars();
		$query = "SELECT * FROM da_summaryPlanDetails WHERE year = '".$year."' ";
		if($this->searchSchool > 0)
		$query.=" AND schoolCode = '".$this->searchSchool."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["monthVal"]] = $row["planned_count"];
		}
		return $arrRet;
	}
	function getModifiedPlannedCntSchoolWise($connid,$year,$ytd="")
	{
		$arrRet = array();
		$query = "SELECT schoolCode,planned_count as cnt FROM da_summaryPlanDetails WHERE year = '".$year."' ";
		if($ytd == 1)
		$query.=" AND MONTH(monthVal) <= MONTH(CURDATE()) ";

		$query.=" GROUP BY schoolCode" ;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["schoolCode"]] = $row["cnt"];
		}
		return $arrRet;
	}
	function getQuestionsPendingIPS($connid,$qcodes = array())
	{
		$arrRet = array();
		if(is_array($qcodes) && count($qcodes) > 0){
			$qcodelist = implode(",",$qcodes);

			$query = "SELECT da_questions.qcode FROM da_questions
					  LEFT JOIN da_ipsDetails ON da_questions.qcode = da_ipsDetails.qcode
					  WHERE da_questions.correct_answer != da_ipsDetails.answer
					  AND da_ipsDetails.ips_status = 0
					  AND da_questions.qcode IN($qcodelist)";

			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				$arrRet[] = $row["qcode"];
			}
		}
		return $arrRet;
	}
	
	function getSchoolWiseReqDetails($connid,$year,$arrSchools=array())
	{
		$arrRet = array();
		$this->setpostvars();
		$query = "SELECT COUNT(DISTINCT(exam_code)) cntreq,MONTH(test_date) as monthdate FROM da_testRequest a,da_examDetails b,schools c WHERE a.id = b.request_id AND a.schoolCode = c.schoolno AND year = '".$year."' AND a.schoolCode != '2387554' AND a.schoolCode != '0' AND type='actual' ";		
		if($this->searchSchool > 0)
		$query.=" AND a.schoolCode = '".$this->searchSchool."' ";		
		$query.=" GROUP BY MONTH(test_date) ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["monthdate"]] = $row["cntreq"];
		}

		return $arrRet;
	}
	function getModifiedSchoolMonthWiseCount($connid,$year)
	{
		$arrRet = array();
		$query = "SELECT * FROM da_summaryPlanDetails WHERE year = '".$year."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["schoolCode"]][$row["monthVal"]] = $row["planned_count"];
		}
		return $arrRet;
	}
	function getQnoDetailsByPaperCodeVersion($connid)
	{
		$arrRet = array();
		$query = "SELECT version,qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["version"]] = $row["qcode_list"];
		}
		return $arrRet;
	}
	function updatePaperCourierDetails($connid)
	{
		$studentStr = "";
		$examCodeStr = "";
		$arrStudents = array();
		$queryExamCode = "SELECT GROUP_CONCAT(section) as sectionStr,GROUP_CONCAT(exam_code ORDER BY section) as examCodeStr,a.schoolCode,class,paper_reuse,b.year
						  FROM da_testRequest a,da_orderMaster b,da_examDetails c 
						  WHERE a.schoolCode = b.schoolCode AND a.year = b.year AND a.id = c.request_id AND a.id = '".$this->test_requestid."' AND paper_courier = '1' GROUP BY request_id ";
		$dbqueryExamCode = new dbquery($queryExamCode,$connid);
		$rowExamCode = $dbqueryExamCode->getrowarray();

		$arrSection = explode(",",$rowExamCode["sectionStr"]);
		$arrExamCode = explode(",",$rowExamCode["examCodeStr"]);
		$examCodeStr = $rowExamCode["examCodeStr"];
		$year = $rowExamCode["year"];

		/*if(is_array($arrSection) && count($arrSection) >0)
		$queryStudentCnt = "SELECT COUNT(studentID),section FROM da_studentMaster WHERE schoolCode = '".$rowExamCode["schoolCode"]."' AND class = '".$rowExamCode["class"]."'  GROUP BY section ORDER BY section";
		else
		$queryStudentCnt = "SELECT COUNT(studentID) FROM da_studentMaster WHERE schoolCode = '".$rowExamCode["schoolCode"]."' AND class = '".$rowExamCode["class"]."'";*/
		if(is_array($arrSection) && count($arrSection) >0) {
			$queryStudentCnt = "SELECT COUNT(da_studAcadDetails.studentID),da_studAcadDetails.section 
								FROM da_studAcadDetails
								LEFT JOIN da_studentMaster ON da_studAcadDetails.studentID = da_studentMaster.studentID
								WHERE da_studentMaster.schoolCode = '".$rowExamCode["schoolCode"]."' 
								AND da_studAcadDetails.class = '".$rowExamCode["class"]."'
								AND da_studAcadDetails.year = '".$rowExamCode["year"]."'
								GROUP BY da_studAcadDetails.section ORDER BY da_studAcadDetails.section";
		}
		else {
			$queryStudentCnt = "SELECT COUNT(da_studAcadDetails.studentID)
								FROM da_studAcadDetails
								LEFT JOIN da_studentMaster ON da_studAcadDetails.studentID = da_studentMaster.studentID
								WHERE da_studentMaster.schoolCode = '".$rowExamCode["schoolCode"]."'
								AND da_studAcadDetails.year = '".$rowExamCode["year"]."'
								AND da_studAcadDetails.class = '".$rowExamCode["class"]."'";
		}
		$dbqueryStudentCnt = new dbquery($queryStudentCnt,$connid);

		while($rowStudentCnt = $dbqueryStudentCnt->getrowarray())
		{
			if(is_array($arrSection) && count($arrSection) >0)
			$arrStudents[$rowStudentCnt["section"]] = $rowStudentCnt[0];
			else
			$arrStudents[0] = $rowStudentCnt[0];
		}
		if(is_array($arrSection) && count($arrSection) > 0)
		{
			foreach($arrSection as $section_key => $section_value)
			{
				if(isset($arrStudents[$section_value]))
				$arrStud[] = $arrStudents[$section_value];
				else
				$arrStud[] = 0;
			}
		}
		else
		{
			$arrStud[] = $arrStudents[0];
		}
		if($rowExamCode["paper_reuse"] == '1')
		{
			rsort($arrStud);
			$studentStr = $arrStud[0];
			$examCodeStr = $arrExamCode[0];
		}
		else
		{
			$studentStr = implode(",",$arrStud);
		}
		if($examCodeStr != "" && $this->test_requestid > 0 && $studentStr != "")
		{
			$query = "INSERT INTO da_paperCourier SET request_id = '".$this->test_requestid."',exam_code = '".$examCodeStr."',copies_count = '".$studentStr."',order_date = CURDATE(),status = 'pending'";
			$dbquery = new dbquery($query,$connid);
		}
	}
	function generatePDF($connid,$examCode,$version) {
		/****Configuration***/
		$page_width = 595;
		$page_height = 842;
		$fontsize=10;
		$fontname="Dejavu";
		$right_margin = 36;
		$top_margin    = 99.7+$fontsize;
		$bottom_margin = 36;
		$xpos  = 63.21;
		$left_margine  = 63.21;
		$ypos  = $page_height-$top_margin;
		$break=15;
		$header_height=15;
		$header_break=30;
		$rect_width=15;
		$rect_height=12;
		$optionformat = "1";      // If A than option will be A, B, C, D. If 1 than options will be 1, 2, 3, 4
		$questionstem = 1;
		$pageno=2;
		$tblborder=0.5;
		$considerImgFactor = 1;  // 0 means 90 DPI images, 1 means 150 DPI images
		$resizedimages = array();
		$arrangeoptions=1;


		global $arrSubject;
		// If 1 than question will come in bold, 0 than normal font
		/****End Configuration***/

		$arrPaperDetails = $this->getTestDetails($connid,$version);
		$arrSchoolDetails = $this->getTestDetailsByCode($connid);
		$section = $this->getSectionByExamCode($connid,$examCode);
		$paper_reuse = $this->getPaperReuseFlag($connid,$arrSchoolDetails[schoolCode]);
		$approved_date = $arrSchoolDetails["approved_date"];
		$allExamCodes = array();
		//if($paper_reuse==1) $allExamCodes = $this->getAllExamCodesForRequest($connid,$arrSchoolDetails["id"]);
		$allExamCodes = $this->getAllExamCodesForRequest($connid,$arrSchoolDetails["id"]);
		$pdf = pdf_new();
		PDF_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 8
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");

		$filename=$examCode.$version;
		
		if(!is_dir(constant("PATH_PDF").$arrSchoolDetails["schoolCode"]."/"))
			mkdir(constant("PATH_PDF").$arrSchoolDetails["schoolCode"]."/",0755);
			
		if(!is_dir(constant("PATH_PDF").$arrSchoolDetails["schoolCode"]."/".$arrSchoolDetails["id"]."/"))
			mkdir(constant("PATH_PDF").$arrSchoolDetails["schoolCode"]."/".$arrSchoolDetails["id"]."/",0755);
			
		if(!is_dir(constant("PATH_PDF").$arrSchoolDetails["schoolCode"]."/".$arrSchoolDetails["id"]."/papers/"))
			mkdir(constant("PATH_PDF").$arrSchoolDetails["schoolCode"]."/".$arrSchoolDetails["id"]."/papers/",0755);
		#constant("PATH_PDF")
		#constant("PATH_PDFFONT");	
		pdf_open_file($pdf, constant("PATH_PDF").$arrSchoolDetails["schoolCode"]."/".$arrSchoolDetails["id"]."/papers/".$filename.".pdf");
		
		//$fontdir = $_SERVER['DOCUMENT_ROOT']."/fonts";
		$fontdir = constant("PATH_PDFFONT");
		pdf_set_parameter($pdf, "FontOutline", "Dejavu=$fontdir/DejaVuSans.ttf");

		$parameters=array("exam_code"=>$examCode.$version,"test_name"=>$arrSchoolDetails[testName],"test_date"=>$arrSchoolDetails[test_date],"class"=>$arrSchoolDetails['class'],"subject"=>$arrSchoolDetails['subject'],"section"=>$section,"school_name"=>$arrSchoolDetails[schoolname],"qcount"=>sizeof($arrPaperDetails),"examCodes"=>$allExamCodes,"version"=>$version,"schoolCode"=>$arrSchoolDetails[schoolCode],"type"=>$arrSchoolDetails[type]);

		/* if($paper_reuse==1 || $arrSchoolDetails[type]=="pilot") CreateFirstPagePaperReuse($pdf,$page_width,$page_height,$xpos,$right_margin,$fontsize,$parameters);
		else CreateFirstPageOfPaper($pdf,$page_width,$page_height,$xpos,$right_margin,$fontsize,$parameters); */
		CreateFirstPagePaperReuse($pdf,$page_width,$page_height,$xpos,$right_margin,$fontsize,$parameters);
		pdf_begin_page($pdf, $page_width, $page_height);

		/* if($paper_reuse==1 || $arrSchoolDetails[type]=="pilot") createDAHeaderPaperReuse($pdf,$xpos,$page_height,$fontsize-4,$parameters);
		else createDAHeader($pdf,$xpos,$page_height,$fontsize-4,$parameters); */
		createDAHeaderPaperReuse($pdf,$xpos,$page_height,$fontsize-4,$parameters);
		addpagenumber($pdf,$pageno,$fontdir);

		$font = pdf_findfont($pdf, "Dejavu", "host",1);
		pdf_set_parameter($pdf, "FontOutline", "Dejavu Bold=$fontdir/DejaVuSans-Bold.ttf");
		$font_bold = pdf_findfont($pdf, "Dejavu Bold", "host",1);
		pdf_set_parameter($pdf, "FontOutline", "Dejavu Italic=$fontdir/DejaVuSans-Oblique.ttf");
		$fontitalic_normal = pdf_load_font($pdf, "Dejavu Italic", "host","");

		$prevgroupid = -1;
		$prevpassageid = 0;
		$srno = 1;

		foreach($arrPaperDetails as $qno =>$qcode)  {
			$istextpassage = 'N';
			$buffersize = 0;
			$isGroupText=0;
			$objQuestion = new clsdaquestion();
			$objQuestion->populateQuestion($connid,$qcode,$approved_date);
			$qcodestr='';
			if($prevpassageid!=$objQuestion->passage_id && $prevpassageid!=0) {   // passage end question
				$ypos-=$break;

				if($ypos >= (29+15) ) {
					pdf_setrgbcolor_fill($pdf, 0, 0, 0);
					pdf_rect($pdf,$xpos,$ypos+$break,$page_width-$right_margin-$xpos+15,$break);
					pdf_fill($pdf);

					pdf_setrgbcolor_fill($pdf, 205/255, 201/255, 201/255);
					pdf_rect($pdf,$xpos,$ypos+$break+1,$page_width-$right_margin-$xpos+15,$break-2);
					pdf_fill($pdf);

					pdf_setrgbcolor($pdf, 0, 0, 0);
					pdf_setfont($pdf, $font_bold, 9);
					pdf_show_boxed($pdf,"End of Passage Related Questions",$xpos,$ypos+$break-2,$page_width-$right_margin-$xpos+15,$break,"center","");
					$ypos-=$break;
				}
			}

			if($objQuestion->isGroupQue()) {
				$groupid = $objQuestion->getGroupId();
				$imagepathfrom = 1;    // 1: DA questions and group text images, 2: DA passage images, 3: ASSET images
				if($prevgroupid==-1 || $prevgroupid!=$groupid) { //If first question in the group, print group text.
					$prevgroupid = $groupid;
					$qcodestr = "<b>".$objQuestion->getGroupText()."</b> ";
					if($objQuestion->passage_id!=0 && $prevpassageid!=$objQuestion->passage_id)  {  //If first question in the group, append passage.
						$prevpassageid = $objQuestion->passage_id;
						$passagetext = $objQuestion->getPassageText($connid);
						$passagetext = $this->RemoveJunk($passagetext);

						$passageSource = $objQuestion->getPassageSource($connid);
						$passageSource = $this->RemoveJunk($passageSource);
						
						$passagetext = str_replace("*","",$passagetext);
						$passagetext = preg_replace('/\s\s+/', ' ', $passagetext);

						if($qcodestr!="" && $passagetext!="")
						$qcodestr .= "<br>";
						$qcodestr.=$passagetext."<br>".$passageSource;
						$imagepathfrom = 2;
					}
					$qcodestr = str_ireplace("</DIV>","<br>",$qcodestr);
					$qcodestr = $this->RemoveJunk($qcodestr);
					$ypos_returned = array();
					$ypos_returned[0] = 0;
					$ypos_returned[1] = 0;
					$prevPassageYpos=$ypos;
					$istextpassage = 'Y';
					// Make The Passage Not Bold 
					$questionstem =0;
					$ypos_returned = autoPublishPaper($pdf,$qcodestr,$xpos,$ypos,$right_margin,$page_width,$page_height,$top_margin,$bottom_margin,$buffersize,$imagepathfrom,$optionformat,$questionstem,$fontsize,$fontname,$tblborder,$left_margine,$considerImgFactor,$resizedimages,$arrangeoptions,$istextpassage);
					$questionstem =1;
					$ypos = $ypos_returned[0];
					$isNewPage=$ypos_returned[1];
					$ypos-=$break;
					$isFirstPassgeQuestion=1;
					if($isNewPage==1) $temp_ypos=$page_height-$top_margin; else $temp_ypos=$prevPassageYpos;
					if($isNewPage==1) {
						$pageno++;
						/* if($paper_reuse==1 || $arrSchoolDetails[type]=="pilot") createDAHeaderPaperReuse($pdf,$xpos,$page_height,$fontsize-4,$parameters);
						else createDAHeader($pdf,$xpos,$page_height,$fontsize-4,$parameters); */
						createDAHeaderPaperReuse($pdf,$xpos,$page_height,$fontsize-4,$parameters);
						addpagenumber($pdf,$pageno,$fontdir);
					}

					pdf_setdash($pdf,0,0);
					pdf_setlinewidth($pdf,0.5);
					pdf_moveto($pdf,$xpos,$temp_ypos+18.5);
					pdf_lineto($pdf,$page_width-$right_margin,$temp_ypos+18.5);
					pdf_stroke($pdf);



				} else $isFirstPassgeQuestion=0;

			} else {
				$isFirstPassgeQuestion=0;
				$groupid=0;
				$prevpassageid=0;
			}
			$prevYpos=$ypos;
			
			$qcodestr = $objQuestion->getQuestion()."##&&".$objQuestion->getOptionA()."##&&".$objQuestion->getOptionB()."##&&".$objQuestion->getOptionC()."##&&".$objQuestion->getOptionD();
			$qcodestr = str_replace("‘","'",$qcodestr);
			$qcodestr = str_replace("’","'",$qcodestr);
			$qcodestr = str_replace("–","-",$qcodestr);
			$qcodestr = str_replace("…","...",$qcodestr);
			$qcodestr = str_replace("Æ","'",$qcodestr);
			$qcodestr = str_replace("&nbsp;"," ",$qcodestr);
			$qcodestr = str_replace("·",".",$qcodestr);
			$qcodestr = str_ireplace("</DIV>","<br>",$qcodestr);
			
			
			// Added for table align issue
			$qcodestr = str_ireplace("</table>", "</table> &emsp;", $qcodestr);
			$qcodestr = str_ireplace("<table", "&emsp; <table", $qcodestr);
			// end table align issue
			

			$imagepathfrom = 1;    // 1: DA questions and group text images, 2: DA passage images, 3: ASSET images

			$ypos_returned = array();
			$ypos_returned[0] = 0;
			$ypos_returned[1] = 0;
			$istextpassage = 'N';
			$ypos_returned = autoPublishPaper($pdf,$qcodestr,$xpos,$ypos,$right_margin,$page_width,$page_height,$top_margin,$bottom_margin,$buffersize,$imagepathfrom,$optionformat,$questionstem,$fontsize,$fontname,$tblborder,$left_margine,$considerImgFactor,$resizedimages,$arrangeoptions,$istextpassage);
			$ypos = $ypos_returned[0];
			$isNewPage=$ypos_returned[1];
			if($isNewPage==1) $ypos=$page_height-$top_margin; else $ypos=$prevYpos;
			$ypos+=5;

			pdf_setrgbcolor_fill($pdf, 0, 0, 0);
			if($isNewPage==1) {
				$pageno++;
				/* if($paper_reuse==1 || $arrSchoolDetails[type]=="pilot") createDAHeaderPaperReuse($pdf,$xpos,$page_height,$fontsize-4,$parameters);
				else createDAHeader($pdf,$xpos,$page_height,$fontsize-4,$parameters); */
				createDAHeaderPaperReuse($pdf,$xpos,$page_height,$fontsize-4,$parameters);
				addpagenumber($pdf,$pageno,$fontdir);
			}


			//qno formatting
			if($qno>9) $space=33; else $space=28;
			pdf_setfont($pdf, $font_bold, 10);
			pdf_show_xy($pdf,"Q: ".$qno,$xpos-$space,$ypos-3);
			pdf_setrgbcolor($pdf, 0, 0, 0);

			pdf_setlinewidth($pdf,0.5);
			pdf_moveto($pdf,$xpos-$space,$ypos+8.5);
			pdf_lineto($pdf,$xpos-5,$ypos+8.5);
			pdf_stroke($pdf);

			pdf_setlinewidth($pdf,0.5);
			pdf_moveto($pdf,$xpos-$space,$ypos-9);
			pdf_lineto($pdf,$xpos-5,$ypos-9);
			pdf_stroke($pdf);

			//separator
			if(!$isFirstPassgeQuestion ) {
				if($objQuestion->passage_id!=0 || $groupid>0) pdf_setdash($pdf,4,4);
				else pdf_setdash($pdf,0,0);

				pdf_setlinewidth($pdf,0.5);
				pdf_moveto($pdf,$xpos,$ypos+8.5);
				pdf_lineto($pdf,$page_width-$right_margin,$ypos+8.5);
				pdf_stroke($pdf);
			}
			$ypos=$ypos_returned[0]-10;
			pdf_setdash($pdf,0,0);

			$ypos-=$break;
			$prevpassageid = $objQuestion->passage_id;
		}

		pdf_end_page($pdf);
		pdf_close($pdf);
		# moving files to bucket
		$source_path = constant("PATH_STUDENTREPORT")."/".$arrSchoolDetails["schoolCode"]."/".$arrSchoolDetails["id"]."/papers/".$filename.".pdf";
		$dest_path = "PDF/".$arrSchoolDetails["schoolCode"]."/".$arrSchoolDetails["id"]."/papers/".$filename.".pdf";
		
		if(constant("SERVER_TYPE") == "Live"){
			$request_type = $this->getRequestType($arrSchoolDetails["id"],$connid);
			$S3Res = $this->MoveToBucket($source_path,$dest_path);
			# As now we are deleting for all schools remvoed below conditions.
			//if($request_type=="pilot" || in_array($arrSchoolDetails["schoolCode"],$this->DataTransferSchoolCode)){	
				if($S3Res==1){
					unlink($source_path);
				}
			//}
		}
	}

	# Moving Files to Bucket
	function MoveToBucket($source_path,$dest_path){
		
		if($source_path == "" || $dest_path == "") return;
		
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3_constants.php");
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."S3.php");
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3Wrapper.php");
		
		$s3WrapperObj = new s3Wrapper(constant("awsAccessKey"),constant("awsSecretKey"));
		return $wrapper_res = $s3WrapperObj->uploadFile($source_path,constant("DA_BucketName"),$dest_path,S3::ACL_PUBLIC_READ);
	}
	
	function getRequestType($request_id,$connid)
	{
		$queryRequestType = "SELECT type from da_testRequest where id = '$request_id'";
		$dbqueryRequestType = new dbquery($queryRequestType,$connid);
		$rowRequestType = $dbqueryRequestType->getrowarray();
		return $rowRequestType["type"]; 
	}
	
	function RemoveJunk($string){

		$string = str_replace("‘","'",$string);
		$string = str_replace("’","'",$string);
		$string = str_replace("–","-",$string);
		$string = str_replace("…","...",$string);
		$string = str_replace("Æ","'",$string);
		$string = str_replace("&nbsp;"," ",$string);
		$string = str_replace("·",".",$string);
		$string = str_replace("Untitled Document","",$string);
		$string = str_ireplace("</DIV>","<br>",$string);
		$string = str_replace("�","'",$string);
		$string = str_replace("�","'",$string);
		$string = str_replace("�","-",$string);
		$string = str_replace("�","...",$string);
		$string = str_replace("�","'",$string);
		$string = str_replace("�",".",$string);
		$string = str_replace("�","&divide;",$string);
		$string = str_replace("�","&times;",$string);
		$string = str_replace("�"," ",$string);
		return $string;
	}

	function InsertPaperCourierDetails($connid,$order_id,$request_id,$paper_reuse){

		if($order_id == 0 || $request_id == 0) return;

		$studentStr = "";
		$examCodeStr = "";
		$arrStudents = array();
		# Old process query
		/*$queryExamCode = "SELECT GROUP_CONCAT(section) as sectionStr,GROUP_CONCAT(exam_code ORDER BY section) as examCodeStr,a.schoolCode,class,paper_reuse,b.year
						  FROM da_testRequest a,da_orderMaster b,da_examDetails c 
						  WHERE a.schoolCode = b.schoolCode AND a.year = b.year 
						  AND a.id = c.request_id AND a.id = '".$request_id."' 
						  AND
						  CASE 
							WHEN a.subject = 1 THEN  b.is_e_courier = '1'
							WHEN a.subject = 2 THEN  b.is_m_courier = '1'
							WHEN a.subject = 3 THEN  b.is_s_courier = '1'
						  END
						  GROUP BY request_id ";*/
		$queryExamCode = "SELECT GROUP_CONCAT(section) as sectionStr,GROUP_CONCAT(exam_code ORDER BY section) as examCodeStr,a.schoolCode,a.subject,class,order_id,
						  paper_reuse,b.year
						  FROM da_testRequest a,da_orderMaster b,da_examDetails c
						  WHERE a.schoolCode = b.schoolCode AND a.year = b.year 
						  AND a.id = c.request_id
						  AND a.id = '".$request_id."'
						  GROUP BY request_id ";
		$dbqueryExamCode = new dbquery($queryExamCode,$connid);
		$rowExamCode = $dbqueryExamCode->getrowarray();

		$arrSection = explode(",",$rowExamCode["sectionStr"]);
		$arrExamCode = explode(",",$rowExamCode["examCodeStr"]);
		$examCodeStr = $rowExamCode["examCodeStr"];
		$year = $rowExamCode["year"];
		$subject = $rowExamCode["subject"];
		$class = $rowExamCode["class"];
		
		$ClassWiseExamPrintMode = $this->getClassWiseExamAndPrintModes($rowExamCode["order_id"],$connid);
		$paper_printing = 0;
		# New Conditions Based on Additinal Order Details
		
		if ($ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets" && $subject == 1) {
			$paper_printing = 1;
		}else if ($ClassWiseExamPrintMode["EXAMMODE"][$class] != "tablets" && ($ClassWiseExamPrintMode["PRINTMODE"][$class] == "1 per child" || $ClassWiseExamPrintMode["PRINTMODE"][$class] == "Reuse Sets")) {
			$paper_printing = 1;			
		}
		
		/*if (($ClassWiseExamPrintMode["EXAMMODE"][$class] == "tablets" && $subject == 1) || 
		(($subject == 2 || $subject == 3) && ($ClassWiseExamPrintMode["PRINTMODE"][$class] == "1 per child" || $ClassWiseExamPrintMode["PRINTMODE"][$class] == "Reuse Sets"))
	    ) {*/
	    	
	    if($paper_printing == 1){	
	    	
			/*if(is_array($arrSection) && count($arrSection) >0)
				$queryStudentCnt = "SELECT COUNT(studentID),section FROM da_studentMaster WHERE schoolCode = '".$rowExamCode["schoolCode"]."' AND class = '".$rowExamCode["class"]."' AND enabled = 1  GROUP BY section ORDER BY section";
			else
				$queryStudentCnt = "SELECT COUNT(studentID) FROM da_studentMaster WHERE schoolCode = '".$rowExamCode["schoolCode"]."' AND class = '".$rowExamCode["class"]."' AND enabled = 1";*/
			if(is_array($arrSection) && count($arrSection) >0) {
				$queryStudentCnt = "SELECT COUNT(da_studAcadDetails.studentID),da_studAcadDetails.section 
									FROM da_studAcadDetails
									LEFT JOIN da_studentMaster ON da_studAcadDetails.studentID = da_studentMaster.studentID
									WHERE da_studentMaster.schoolCode = '".$rowExamCode["schoolCode"]."' 
									AND da_studAcadDetails.class = '".$rowExamCode["class"]."'
									AND da_studAcadDetails.status = 1
									AND da_studentMaster.enabled = 1
									AND da_studAcadDetails.year = '".$year."'
									GROUP BY da_studAcadDetails.section ORDER BY da_studAcadDetails.section";
			}
			else {
				$queryStudentCnt = "SELECT COUNT(da_studAcadDetails.studentID)
									FROM da_studAcadDetails
									LEFT JOIN da_studentMaster ON da_studAcadDetails.studentID = da_studentMaster.studentID
									WHERE da_studentMaster.schoolCode = '".$rowExamCode["schoolCode"]."'
									AND da_studAcadDetails.class = '".$rowExamCode["class"]."'
									AND da_studentMaster.enabled = 1
									AND da_studAcadDetails.year = '".$year."'
									AND da_studAcadDetails.status = 1";
			}
			
			$dbqueryStudentCnt = new dbquery($queryStudentCnt,$connid);
	
			while($rowStudentCnt = $dbqueryStudentCnt->getrowarray())
			{
				if(is_array($arrSection) && count($arrSection) >0)
				$arrStudents[$rowStudentCnt["section"]] = $rowStudentCnt[0];
				else
				$arrStudents[0] = $rowStudentCnt[0];
			}
	
			if(is_array($arrSection) && count($arrSection) > 0){
				foreach($arrSection as $section_key => $section_value){
					if(isset($arrStudents[$section_value]))
					$arrStud[] = $arrStudents[$section_value];
					else
					$arrStud[] = 0;
				}
			}
			else{
				$arrStud[] = $arrStudents[0];
			}
	
			//if($rowExamCode["paper_reuse"] == '1'){ # Old Condition commented
			if($ClassWiseExamPrintMode["PRINTMODE"][$class] == "Reuse Sets"){
				rsort($arrStud);
				$studentStr = $arrStud[0];
				$examCodeStr = $arrExamCode[0];
			}
			else{
				$studentStr = implode(",",$arrStud);
			}
	
			if($examCodeStr != "" && $request_id > 0 && $studentStr != "")
			{
				$query = "INSERT INTO da_paperCourier SET order_id = '".$order_id."',request_id = '".$request_id."',exam_code = '".$examCodeStr."',copies_count = '".$studentStr."'";
				$dbquery = new dbquery($query,$connid);
			}
	    }
	}

	function GetParentChildArr($connid,$qcodearr){

		if(!is_array($qcodearr) && count($qcodearr) == 0) return;
		$resultarr = array();

		$qcodestr = implode(",",$qcodearr);
		if($qcodestr != "") {

			$query = "SELECT DISTINCT e1.qcode,GROUP_CONCAT(e2.qcode) AS childques
					  FROM da_questions e1 
					  LEFT JOIN da_questions e2 on e1.qcode=e2.parent_qcode
					  WHERE e1.qcode IN($qcodestr)
					  AND e1.parent_qcode = 0
					  GROUP BY e1.qcode";
			$dbqry = new dbquery($query,$connid);
			while($result = $dbqry->getrowarray()){
				$resultarr[$result["qcode"]] = $result["childques"];
			}
		}
		return $resultarr;
	}

	function GetQcodesFromRequest($request_id,$connid){

		if($request_id == "" || $request_id == 0) return ;

		$qcodelist = "";
		$query = "SELECT da_paperDetails.qcode_list FROM da_paperDetails
				  LEFT JOIN da_testRequest ON da_paperDetails.papercode = da_testRequest.paper_code
				  WHERE da_paperDetails.version = 1 AND da_testRequest.id = '".$request_id."'";
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray($dbqry);
		$qcodelist = $result["qcode_list"];

		return $qcodelist;
	}

	function GetQuesUsedBySchools($schoolcode,$connid,$request_id=""){
		
		if($schoolcode == "") return;
		
		$condition = "";
		if($request_id != "") $condition = "AND da_testRequest.id NOT IN($request_id)";
		
		$returnarr = array();
		$qcodestr = "";
		
		$query = "SELECT da_paperDetails.qcode_list
				  FROM da_testRequest
				  LEFT JOIN da_paperDetails ON da_testRequest.paper_code = da_paperDetails.papercode
				  WHERE da_testRequest.schoolCode = '".$schoolcode."' AND da_testRequest.type = 'actual'
			 	  AND da_testRequest.status = 'Approved'
			 	  AND da_testRequest.subject = '".$this->subjectno."'
				  AND da_paperDetails.version = 1
				  AND da_paperDetails.qcode_list != ''
				  $condition";

		$dbqry = new dbquery($query,$connid);
		
		while($result = $dbqry->getrowarray()){
			$qcodestr .= $result["qcode_list"].",";
		}
		
		if($qcodestr != "")
			$returnarr = explode(",",rtrim($qcodestr,","));
			
		array_unique($returnarr);	
		asort($returnarr,SORT_NUMERIC);

		return $returnarr;
	}
	
	function validationGeneratePDF($connid)
	{
		$arrRet = array();
		$qcode_list = "";
		$qcode_meri_list = "";
		
		$queryGetDate = "SELECT lastPdfGenerated,paper_code,test_date,testName,class FROM da_testRequest WHERE id = '".$this->test_requestid."' ";
		$dbqueryGetDate = new dbquery($queryGetDate,$connid);
		$rowGetDate = $dbqueryGetDate->getrowarray();
	
		$queryCode = "SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$rowGetDate["paper_code"]."' AND version = 1";
		$dbqueryCode = new dbquery($queryCode,$connid);
		$rowCode = $dbqueryCode->getrowarray();

		// Check for unapproved questions in DA Paper before generating PDF {Naveen}

		if($rowCode["qcode_list"]!="")
		{
			$arrUnapprovedQcode = $this->getUnapprovedQuestionInPaper($connid, $rowCode["qcode_list"]);

			if(is_array($arrUnapprovedQcode) && count($arrUnapprovedQcode)> 0)
			{
				$arrRet['UnapprovedQuestions'] = "Qcode :".implode(",",$arrUnapprovedQcode). " are unapproved  Questions in paper ";
			}
		}
		// End check for unapproved papers in Da  {Naveen}

		$arrQcodes = $this->getQuesImagesValidityToFinalize($connid,$rowCode["qcode_list"]);		
		if(is_array($arrQcodes) && count($arrQcodes)>0)
		{
			$arrRet["imgAppPendingError"] = "Qcode : ".implode(",",$arrQcodes)." are having the images pending to be approved";
			$arrRet["qcodeListPending"] = implode(",",$arrQcodes);
		}
		
		#Query checking For reporting details blank qcode list	(05-07-2012)	
		$queryReportingHeadCheck = "SELECT * FROM da_reportingDetails WHERE papercode = '".$rowGetDate["paper_code"]."'";
		$dbqueryReportingHeadCheck = new dbquery($queryReportingHeadCheck,$connid);
		while($rowReportingHeadCheck = $dbqueryReportingHeadCheck->getrowarray())
		{
			if($rowReportingHeadCheck["qcode_list"]=="")
			{
				$arrRet["reportingHeadError"] = "Yes";			
			}
		}
		#Query checking For reporting details blank qcode list (05-07-2012)
		
		#Query For SchoolName Validation
		$queryGetSchoolName = "SELECT a.schoolCode,b.schoolname FROM da_testRequest a,schools b WHERE a.schoolCode = b.schoolno AND a.id = '".$this->test_requestid."' ";
		$dbqueryGetSchoolName = new dbquery($queryGetSchoolName,$connid);
		$rowGetSchoolName = $dbqueryGetSchoolName->getrowarray();
		#Query For SchoolName Validation
		
		#Query For ExamCode,Devision Validation
		$queryGetExamCodeCount = "SELECT count(*) as examcodecounter FROM da_examDetails WHERE request_id = '".$this->test_requestid."' ";
		$dbqueryGetExamCodeCount = new dbquery($queryGetExamCodeCount,$connid);
		$rowGetExamCodeCount = $dbqueryGetExamCodeCount->getrowarray();
		if($rowGetExamCodeCount["examcodecounter"]==0)
		{
			$arrRet["examcodeError"] = "Yes";			
		}
		if($rowGetExamCodeCount["examcodecounter"]>0)
		{
			$queryGetDevision = "SELECT section as examcodecounter FROM da_examDetails WHERE request_id = '".$this->test_requestid."' ";
			$dbqueryGetDevision = new dbquery($queryGetDevision,$connid);
			while($rowGetDevision = $dbqueryGetDevision->getrowarray())
			{
				if($rowGetDevision["section"]=="")
				{
					$arrRet["sectionError"] = "Yes";
					break;
				}
			}
		}
		#Query For ExamCode,Devision Validation
		
		#Query For blank row in table
		if($rowCode["qcode_list"]!="")
		{
			$arrQcodeToSearch = $this->getTableContainingQcodesForValidation($rowCode["qcode_list"],$connid);	
			if(isset($arrQcodeToSearch) && count($arrQcodeToSearch)>0)
			{
				$qcodeListTDBlank = implode(",",$arrQcodeToSearch);
				$arrRet["tdblanklist"] = $qcodeListTDBlank;
			}
		}	
		#Query For blank row in table
		
		
		#Query For Image Validation jpg image,dpi,hieght,width,missing image
		if($rowCode["qcode_list"]!="")
		{		
			$arrImageMissing = array();
			$arrImageHeightWidth = array();
			$arrImageDPI = array();
			$arrImageJPG = array();			
			$arrSetValidationChecked = array();
			
			$arrQcodeImageCheck = explode(",",$rowCode["qcode_list"]);
			foreach($arrQcodeImageCheck as $keyFetchQcode => $valueFetchQcode)
			{
				$queryForImageCheckingOther = "SELECT qcode,question,optiona,optionb,optionc,optiond,status,question_maker,group_text,a.group_id,a.subjectno,class,copied_from,parent_qcode,submit_date FROM da_questions a LEFT JOIN da_groupMaster b ON a.group_id=b.group_id WHERE 1=1 AND qcode ='$valueFetchQcode' ORDER BY qcode";
				$dbqueryForImageCheckingOther = new dbquery($queryForImageCheckingOther,$connid);
				while($rowForImageCheckingOther = $dbqueryForImageCheckingOther->getrowarray())
				{
					//$path = $_SERVER['DOCUMENT_ROOT']."/detailed_assessment/images/";
					$path = constant("PATH_IMAGES");
					$question = $rowForImageCheckingOther['question'];
					$qcode = $rowForImageCheckingOther['qcode'];
					$optiona = $rowForImageCheckingOther['optiona'];
					$optionb = $rowForImageCheckingOther['optionb'];
					$optionc = $rowForImageCheckingOther['optionc'];
					$optiond = $rowForImageCheckingOther['optiond'];
					$status = $rowForImageCheckingOther['status'];
					$group_text = $rowForImageCheckingOther['group_text'];
					$group_id = $rowForImageCheckingOther['group_id'];
					$question_maker = $rowForImageCheckingOther['question_maker'];
					$subjectno = $rowForImageCheckingOther['subjectno'];
					$copied_from = $rowForImageCheckingOther['copied_from'];
					$parent_qcode = $rowForImageCheckingOther['parent_qcode'];
					$submit_date = $rowForImageCheckingOther['submit_date'];
					$class_set = $rowForImageCheckingOther['class'];
					
					#For Question Check 
					if($question!="")
					{
						$arrSetValidationChecked = array();
						$arrSetValidationChecked = $this->SetImageChecking($qcode,$question,'Q',$path,$status,$question_maker,$subjectno,$copied_from,$parent_qcode,$submit_date,$showArr,$class_set);
						if(isset($arrSetValidationChecked) && count($arrSetValidationChecked)>0)
						{
							if($arrSetValidationChecked["imageheightwidthError"] == "Yes")
							{
								$arrImageHeightWidth[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagemissingError"] == "Yes")
							{
								$arrImageMissing[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagedpiError"] == "Yes")
							{
								$arrImageDPI[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagejpgtypeError"] == "Yes")
							{
								$arrImageJPG[$qcode] = $qcode;
							}							
						}
					}	
					#For Question Check 
					
					#For OptionA Check 
					if($optiona!="")
					{
						$arrSetValidationChecked = array();
						$arrSetValidationChecked = $this->SetImageChecking($qcode,$optiona,'A',$path,$status,$question_maker,$subjectno,$copied_from,$parent_qcode,$submit_date,$showArr,$class_set);
						if(isset($arrSetValidationChecked) && count($arrSetValidationChecked)>0)
						{
							if($arrSetValidationChecked["imageheightwidthError"] == "Yes")
							{
								$arrImageHeightWidth[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagemissingError"] == "Yes")
							{
								$arrImageMissing[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagedpiError"] == "Yes")
							{
								$arrImageDPI[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagejpgtypeError"] == "Yes")
							{
								$arrImageJPG[$qcode] = $qcode;
							}							
						}
					}	
					#For OptionA Check 
					
					#For OptionB Check 
					if($optionb!="")
					{
						$arrSetValidationChecked = array();
						$arrSetValidationChecked = $this->SetImageChecking($qcode,$optionb,'B',$path,$status,$question_maker,$subjectno,$copied_from,$parent_qcode,$submit_date,$showArr,$class_set);
						if(isset($arrSetValidationChecked) && count($arrSetValidationChecked)>0)
						{
							if($arrSetValidationChecked["imageheightwidthError"] == "Yes")
							{
								$arrImageHeightWidth[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagemissingError"] == "Yes")
							{
								$arrImageMissing[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagedpiError"] == "Yes")
							{
								$arrImageDPI[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagejpgtypeError"] == "Yes")
							{
								$arrImageJPG[$qcode] = $qcode;
							}							
						}
					}	
					#For OptionB Check 
					
					#For OptionC Check 
					if($optionc!="")
					{
						$arrSetValidationChecked = array();
						$arrSetValidationChecked = $this->SetImageChecking($qcode,$optionc,'C',$path,$status,$question_maker,$subjectno,$copied_from,$parent_qcode,$submit_date,$showArr,$class_set);
						if(isset($arrSetValidationChecked) && count($arrSetValidationChecked)>0)
						{
							if($arrSetValidationChecked["imageheightwidthError"] == "Yes")
							{
								$arrImageHeightWidth[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagemissingError"] == "Yes")
							{
								$arrImageMissing[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagedpiError"] == "Yes")
							{
								$arrImageDPI[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagejpgtypeError"] == "Yes")
							{
								$arrImageJPG[$qcode] = $qcode;
							}							
						}
					}	
					#For OptionC Check 
					
					#For OptionD Check 
					if($optiond!="")
					{
						$arrSetValidationChecked = array();
						$arrSetValidationChecked = $this->SetImageChecking($qcode,$optiond,'D',$path,$status,$question_maker,$subjectno,$copied_from,$parent_qcode,$submit_date,$showArr,$class_set);
						if(isset($arrSetValidationChecked) && count($arrSetValidationChecked)>0)
						{
							if($arrSetValidationChecked["imageheightwidthError"] == "Yes")
							{
								$arrImageHeightWidth[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagemissingError"] == "Yes")
							{
								$arrImageMissing[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagedpiError"] == "Yes")
							{
								$arrImageDPI[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagejpgtypeError"] == "Yes")
							{
								$arrImageJPG[$qcode] = $qcode;
							}							
						}
					}	
					#For OptionD Check 
					
					#For GroupText Check 
					if($group_text!="")
					{
						$arrSetValidationChecked = array();
						$arrSetValidationChecked = $this->SetImageChecking($qcode,$group_text,'GT',$path,$status,$question_maker,$subjectno,$copied_from,$parent_qcode,$submit_date,$showArr,$class_set,$group_id);
						if(isset($arrSetValidationChecked) && count($arrSetValidationChecked)>0)
						{
							if($arrSetValidationChecked["imageheightwidthError"] == "Yes")
							{
								$arrImageHeightWidth[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagemissingError"] == "Yes")
							{
								$arrImageMissing[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagedpiError"] == "Yes")
							{
								$arrImageDPI[$qcode] = $qcode;
							}
							if($arrSetValidationChecked["imagejpgtypeError"] == "Yes")
							{
								$arrImageJPG[$qcode] = $qcode;
							}							
						}
					}	
					#For GroupText Check 
					
				}
			}
			$imageheightwidth = "";
			$imagemissing = "";
			$imagedpi = "";
			$imagejpg = "";
			if(isset($arrImageHeightWidth) && count($arrImageHeightWidth)>0)
			{
				$imageheightwidth = implode(",",$arrImageHeightWidth);
				$arrRet["imageheightwidthQcodeList"] = $imageheightwidth;
			}
			if(isset($arrImageMissing) && count($arrImageMissing)>0)
			{
				$imagemissing = implode(",",$arrImageMissing);
				$arrRet["imagemissing"] = $imagemissing;
			}
			if(isset($arrImageDPI) && count($arrImageDPI)>0)
			{
				$imagedpi = implode(",",$arrImageDPI);
				$arrRet["imagedpi"] = $imagedpi;
			}
			if(isset($arrImageJPG) && count($arrImageJPG)>0)
			{
				$imagejpg = implode(",",$arrImageJPG);
				$arrRet["imagejpg"] = $imagejpg;
			}
			
		}	
		#Query For Image Validation jpg image,dpi,hieght,width,missing image
		
		#For Date of exam Validation
		if($rowGetDate["test_date"]=="0000-00-00")
		{
			$arrRet["testDateError"] = "Yes";
		}
		#For Date of exam Validation		
		
		#For Name of exam Validation
		if($rowGetDate["testName"]=="")
		{
			$arrRet["testNameError"] = "Yes";
		}		
		#For Name of exam Validation
		
		#For Class Validation
		if($rowGetDate["class"]=="" || $rowGetDate["class"]==0)
		{
			$arrRet["classError"] = "Yes";
		}		
		#For Class Validation
		
		#For No of Questions Validation
		$qcode_list_validate = "";
		$qcode_list_validate = $rowCode["qcode_list"];
		if($qcode_list_validate=="")
		{
			$arrRet["noofQuestionError"] = "Yes";
		}
		#For No of Questions Validation
		
		#For SchoolName Validation
		if($rowGetSchoolName["schoolCode"]==0 || $rowGetSchoolName["schoolname"]=="")
		{
			$arrRet["schoolnameError"] = "Yes";
		}	
		#For SchoolName Validation		
		
		return $arrRet;
	}
	
	#For table row blank validation#
	
	function getTableContainingQcodesForValidation($qcode_list,$connid)	
	{
		$arrReturnQcode = array();
		$arrGetQcode = explode(",",$qcode_list);
		foreach($arrGetQcode as $keyGetQcode => $valueGetQcode)
		{			
			$query = "select a.question,a.optiona,a.optionb,a.optionc,a.optiond,a.mcexplanation,a.remedial_instruction,b.group_text,c.description FROM da_questions a LEFT JOIN da_groupMaster b ON a.group_id = b.group_id LEFT JOIN qms_passage c ON a.passage_id = c.passage_id WHERE a.qcode = '$valueGetQcode'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$question = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["question"])));								
				$optiona = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["optiona"])));
				$optionb = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["optionb"])));
				$optionc = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["optionc"])));
				$optiond = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["optiond"])));
				$mcexplanation = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["mcexplanation"])));
				$remedial_instruction = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["remedial_instruction"])));
				$group_text = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["group_text"])));				
				$passage_text = strtolower(html_entity_decode(preg_replace("/&nbsp;/","",$row["description"])));
				
				#For Question Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($question,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}
				#For Question Check
				
				#For Optiona Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($optiona,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Optiona Check
				
				#For Optionb Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($optionb,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Optionb Check
				
				#For Optionc Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($optionc,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Optionc Check
				
				#For Optiond Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($optiond,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Optiond Check
				
				#For Misconception Text Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($mcexplanation,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Misconception Text Check
				
				#For Remidial Instruction Text Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($remedial_instruction,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Remidial Instruction Text Check
				
				#For Group Text Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($group_text,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Group Text Check
				
				#For Passage Text Check
				$get_flag = 0;
				$get_flag = $this->getComparedTD($passage_text,$connid);
				if($get_flag==1)
				{
					$arrReturnQcode[$valueGetQcode] = $valueGetQcode;
				}		
				#For Passage Text Check
			}
		}
		
		return $arrReturnQcode;
	}
	
	function getComparedTD($str,$connid)
	{
		$matches = array();
		preg_match_all("/<table[^>]*>/i", $str, $matches, PREG_SET_ORDER);				
		$count = 0;
		if(isset($matches) && count($matches)>0)
		{					
			$count = count($matches);												
		}
		$matches_td = array();			
		if($count>0)
		{			
			preg_match_all("/<tr[^>]*>(.*?)<\/tr>/s", $str, $matches_td, PREG_SET_ORDER);				
		}				
		$count_td = 0;	
		if(isset($matches_td) && count($matches_td)>0)
		{					
			$count_td = count($matches_td);	
		}						
		
		if($count_td>0)
		{					
			for($k=0;$k<$count_td;$k++)
			{
			
				$get_string = trim(strip_tags(html_entity_decode(preg_replace("/&nbsp;/","",($matches_td[$k][0])))));											
				
				if(trim($get_string)=="")
				{
					return 1;
				}							
			}
		}	
		else 
		{
			if($count>0)
			{
				return 1;		
			}		
		}
		
	    return 0;				
	}
	
	#For table row blank validation#
	
	function SetImageChecking($qcode,$str,$at,$path,$status,$question_maker,$subjectno,$copied_from,$parent_qcode,$submit_date,$showArr,$class_set,$group_id="")
	{		
		$arrReturn = array();
		
		preg_match_all("/<img[^>]*>/i", $str, $matches, PREG_SET_ORDER);
		$cnt_mathes = count($matches);
		$img = array();
		for($i=0; $i<$cnt_mathes; $i++)
		{
			$img_tag = $matches[$i][0];
			
			$srcArray = array();
			preg_match_all('/(src)=[\'"]([^"\']*)["\']/i',$img_tag, $srcArray);
	
			$srcTag = $srcArray[2][0];
			$tmpArray = explode("/",$srcTag);
			$imageName = $tmpArray[count($tmpArray)-1];
					
			$image_path = $path.$imageName;
	
			if(getimagesize($image_path))
			{
				list($width, $height, $type, $attr)= getimagesize($image_path); 
				
				if($width > 900 || $height > 1100)
				{
					$arrReturn["imageheightwidthError"] = "Yes";
				}
			}
			else 
			{
				$arrReturn["imagemissingError"] = "Yes";
			}			
			
			if(substr($imageName,-3,3)=="jpg" || substr($imageName,-3,3)=="JPG")
			{
				$dpi = $this->get_dpi2($imageName,$path);  
				if($dpi[0]!=150 ||  $dpi[1]!=150)
				{
					$arrReturn["imagedpiError"] = "Yes";
				}					
			}
			else 
			{
				$arrReturn["imagejpgtypeError"] = "Yes";
			}		
					
		}
		return $arrReturn;
	}
	
	function get_dpi2($filename,$path)
	{ 
	
	       // open the file and read first 20 bytes. 
	
	        $a = fopen($path.$filename,'r'); 
	
	        $string = fread($a,20); 
	
	        fclose($a); 
	
	        // get the value of byte 14th up to 18th 
	
	        $data = bin2hex(substr($string,14,4)); 
	
	        $x = substr($data,0,4); 
	
	        $y = substr($data,4,4); 
	
	        return array(hexdec($x),hexdec($y)); 
	} 
	
	
	function getSubSubTopicForOtherAssessment($subject,$connid)
	{
		$arrRet = array();
		$query = "SELECT c.sub_subtopic_code,c.description FROM da_topicMaster a,da_subtopicMaster b,da_subSubTopicMaster c 
				  WHERE a.topic_code = b.topic_code AND b.subtopic_code =c.subtopic_code AND  a.subjectno = '".$subject."' AND FIND_IN_SET('".$this->class."',c.class)";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$arrRet[$row["sub_subtopic_code"]] = $row["description"];
		}
		return $arrRet;
	}
	function GetRequestDetails($id,$condition="",$connid){
		
		if($id == 0) return;
		$returnarr = array();
		
		$query = "SELECT id,schoolCode,year,class,subject,testname,paper_type,paper_code,chapter_id,request_date,test_date,scoring_date,status,
						 comments,teacher_comments,unfinalize_reason,type,last_modified,optfor_device,delivery_date,imported_requestid,request_type,
						 auto_type,flag,approved_date
				  FROM da_testRequest
				  WHERE id = $id $condition";
		$dbqry = new dbquery($query,$connid);
		while($row = $dbqry->getrowarray()){
			
			$returnarr = array("id"=>$row["id"],
										    "schoolCode" => $row["schoolCode"],
										    "paper_code" => $row["paper_code"],
										    "chapter_id" => $row["chapter_id"],
										    "subject" => $row["subject"],
										    "class" => $row["class"],
										    "year" => $row["year"],
										    "paper_type" => $row["paper_type"],
										    "delivery_date"=> $row["delivery_date"],
										    "request_type"=>$row["request_type"],
										    "teacher_comments"=>$row["teacher_comments"],
										    "flag"=>$row["flag"],
										    "auto_type"=> $row["auto_type"],
										    "approved_date" => $row["approved_date"]
										    );
			
		}
		return $returnarr;
	}
	
	function SearchSameRequestOfPaper($id,$chapter_ids,$class,$subjectno,$connid){
		
		$returnarr = array();
		$query = "SELECT id,schoolCode,paper_code FROM da_testRequest
				  WHERE chapter_id = '".$chapter_ids."' AND class = '".$class."' AND subject = '".$subjectno."'
				  AND status = 'Approved' AND paper_code != '' AND type = 'actual' 
				  AND id != $id ORDER BY test_date DESC LIMIT 1";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			
			$returnarr = array("id"=>$result["id"],
							    "schoolCode" => $result["schoolCode"],
							    "paper_code" => $result["paper_code"]);
		}
		return $returnarr;
	}
	
	function importReportingDetails($newPaperCode,$referencePapercode,$connid){
		
		$query = "INSERT INTO da_reportingDetails(papercode, reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order, entered_dt, entered_by)
		          SELECT '$newPaperCode', reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order, curdate(), '".$_SESSION["username"]."' FROM da_reportingDetails WHERE papercode='$referencePapercode'";
		$dbquery = new dbquery($query,$connid);
	}
	
	function SelectCopyQuestions($PaperCode,$class,$connid,$referencePapercode=""){
		
		if($PaperCode == 0) return;
		
		$ReportingArr = array();
		
		$query = "SELECT reporting_id,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order 
				  FROM da_reportingDetails WHERE papercode = '$PaperCode' ORDER BY reporting_order";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$ReportingArr[$result["reporting_id"]] = array("reporting_id" => $result["reporting_id"],
														   "reporting_level"=>$result["reporting_level"],
														   "sst_list" => $result["sst_list"],
														   "qcode_list" => $result["qcode_list"],
														   "required_ques" => $result["required_ques"],
														   "reporting_order" => $result["reporting_order"]);
		}
		
		
		if($referencePapercode=="")
		{
			$requestDetails = $this->GetRequestDetails($this->test_requestid,"",$connid);
			$SameRequestDetails = $this->SearchSameRequestOfPaper($this->test_requestid,$requestDetails["chapter_id"],$requestDetails["class"],$requestDetails["subject"],$connid);
						
			if(is_array($SameRequestDetails) && count($SameRequestDetails) > 0){
				if($requestDetails["schoolCode"] != $SameRequestDetails["schoolCode"]){
						$referencePapercode = "";						
					}
				if($requestDetails["schoolCode"] == $SameRequestDetails["schoolCode"]){
					$referencePapercode = $SameRequestDetails["paper_code"];
					}
				
				
			}
		}
		/******************Getting old request id's qcode used***************/
		if($referencePapercode!="")
		{
			$arrOldQcodesGet = array();
			$arrOldQcodes = array();
			$query = "SELECT reporting_id,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order 
					  FROM da_reportingDetails WHERE papercode = '$referencePapercode'";
			$dbqry = new dbquery($query,$connid);
			while($result = $dbqry->getrowarray()){
				$arrOldQcodesGet = explode(",",$result["qcode_list"]);
				foreach($arrOldQcodesGet as $oldley=>$oldvalue)
				{
					$arrOldQcodes[$oldvalue] = $oldvalue; 
				}
			}

		}
				
		/******************Getting school usage for same class enough or not for question selection***************/
		if(is_array($ReportingArr) && count($ReportingArr) > 0){
			$requiredQues = 0;
			$countSet = 0;
			foreach($ReportingArr as $reporting_id => $reporting_details){
				$requiredQues += $reporting_details["required_ques"];
				$SSTArr = explode(",",$reporting_details["sst_list"]);
				
			    
				foreach($SSTArr as $key => $sstcode){
			    	
					$SSTQues[$sstcode] = $this->GetSSTQuestions($sstcode,$class,$connid);
				}			 
				
			}

			
			$setQuestionArr = array();
			$globalQcodeSelectedArray = array(); // For all reporting heads questions selected
			
			foreach($ReportingArr as $reporting_id => $reporting_details){
				
				$selectQuestionQcode = array();
				
				$SSTArr = explode(",",$reporting_details["sst_list"]);
				
				$selectCopyQuestionQcode = array();				
				$selectCopyArrQuestionQcode = array();
				$selectOriginalQuestionQcode = array();
				$selectAllQuestionQcode = array();
				$selectCopyParentQuestionQcode = array();
				foreach($SSTArr as $key => $sstcode){
					$SSTQues[$sstcode] = $this->GetSSTQuestions($sstcode,$class,$connid);
				}
				$countSet = 0;
				foreach($SSTArr as $key => $sstcode){
					foreach($SSTQues[$sstcode] as $keyQues => $valueQues){
						foreach($valueQues as $keysub=>$valuesub){
							$countSet += 1;
						}
					}
				}
				
				/******************Making Array for questions selction for further process***************/
				$child_ques_count = 0;
				foreach($SSTArr as $key => $sstcode){
					if($reporting_details["required_ques"]>$countSet){
						$SSTQues[$sstcode] = $this->GetSSTQuestions($sstcode,"",$globalQcodeSelectedArray,$connid);
					}else{
						$SSTQues[$sstcode] = $this->GetSSTQuestions($sstcode,$class,$globalQcodeSelectedArray,$connid);
					}
					
					/********** Started By Parth *************/
					/******************Getting copy questions used***************/
					
					foreach($SSTQues[$sstcode] as $sstid => $sstvalue)
					{
						$selectAllQuestionQcode[$sstcode] = $sstvalue;
						foreach($sstvalue as $key => $value)
						{
							if($value['parent_qcode']!=0)
							{
								if((!in_array($value['parent_qcode'],$selectCopyParentQuestionQcode))){
									
									$selectCopyParentQuestionQcode[$value['parent_qcode']] = $value['parent_qcode']; 
									$selectCopyQuestionQcode[$value['qcode']] = $value['qcode'];
 									
									$selectCopyArrQuestionQcode[$sstcode][$sstid][$key] = $value;
									$child_ques_count++;
								}
							}
							else 
							{								
								$selectOriginalQuestionQcode[$sstid][$key] = $value;
							}
							
						}
					}					
					
				}				

				if($child_ques_count > 0){/******If copy question found *********/
					if($child_ques_count==$reporting_details['required_ques'])
					{
						$setQuestionArr[$reporting_id] = $selectCopyQuestionQcode;
					}
					else 
					{
						if($child_ques_count<$reporting_details['required_ques'])
						{
							$diffcount = $reporting_details['required_ques'] - $child_ques_count;							
							
							$selectModifiedArray = array();
							$arrayCountForOld = array();
							foreach($selectOriginalQuestionQcode as $keyChecke  => $valueChecke)
								{
									foreach($valueChecke as $keycheckcountnew => $valuecheckcountnew)
									{
										if(!in_array($valuecheckcountnew['qcode'],$arrOldQcodes))
										{
											$arrayCountForOld[] = $valuecheckcountnew['qcode'];
											$selectModifiedArray[$keyChecke][$keycheckcountnew] = $valuecheckcountnew;
										}
									}
								}	
							
							if(count($arrayCountForOld)>=$diffcount)
							{
								$selectOriginalQuestionQcode = $selectModifiedArray;
							}
							else 
							{
								//$selectAllQuestionQcode = $selectModifiedArray;								
							}
							
							$selectArrCopyQuestionQcode = $this->selectQuestionFromTable($selectOriginalQuestionQcode,$reporting_details,$connid,$diffcount);			
							
							foreach($selectArrCopyQuestionQcode as $key=>$value)
							{
								$selectCopyQuestionQcode[$value] = $value;
							}

							$setQuestionArr[$reporting_id] = $selectCopyQuestionQcode;
						}
						else 
						{	
							if($child_ques_count>$reporting_details['required_ques'])
							{								
								$selectArrCopyQuestionQcode = $this->selectQuestionFromTable($selectCopyArrQuestionQcode,$reporting_details,$connid,$reporting_details['required_ques']);		
								
								foreach($selectArrCopyQuestionQcode as $key=>$value)
									{
										$selectCopyQuestionQcode[$value] = $value;
									}
								$setQuestionArr[$reporting_id] = $selectCopyQuestionQcode;
						
							}
						}
					}
				}
				else 
				{
					/******If copy question not found *********/					

					$selectModifiedArray = array();
					$arrayCountForOld = array();
					foreach($selectAllQuestionQcode as $keyChecke  => $valueChecke)
						{
							foreach($valueChecke as $keycheckcountnew => $valuecheckcountnew)
							{
								if(!in_array($valuecheckcountnew['qcode'],$arrOldQcodes))
								{
									$arrayCountForOld[] = $valuecheckcountnew['qcode'];
									$selectModifiedArray[$keyChecke][$keycheckcountnew] = $valuecheckcountnew;
								}
							}
						}	
					
					if(count($arrayCountForOld)>=$reporting_details["required_ques"])
					{
						
						$selectAllQuestionQcode = $selectModifiedArray;
					}
					else 
					{
						//$selectAllQuestionQcode = $selectModifiedArray;						
					}

					$selectArrCopyQuestionQcode = $this->selectQuestionFromTable($selectAllQuestionQcode,$reporting_details,$connid,$reporting_details['required_ques']);		
					foreach($selectArrCopyQuestionQcode as $key=>$value)
					{
						$selectCopyQuestionQcode[$value] = $value;
					}
					
					$setQuestionArr[$reporting_id] = $selectCopyQuestionQcode;
				}
				
				$globalQcodeSelectedArray = array_merge($globalQcodeSelectedArray,array_keys($selectCopyQuestionQcode));							
			}
			$qcode_list_whole = "";
			$qcode_list_reporting_head_set = "";
			$setArr = array();
			$setQcodeNewArr = array();

			foreach($setQuestionArr as $key=>$value)
			{		
				foreach($value as $keyT=>$valueT)
				{
					if($valueT!='')
					{
						$setQcodeNewArr[] = $valueT;
					}	
				}
				$value = array_filter($value);
				$qcode_list_reporting_head = implode(",",$value);
				$query = "Update da_reportingDetails set qcode_list = '".$qcode_list_reporting_head."' where reporting_id = '$key'";  
				$dbqry = new dbquery($query,$connid);
				if($qcode_list_reporting_head!="")
				{
				$setArr[] = $qcode_list_reporting_head;					
				}
			}
			$setArr = array_filter($setArr);
			$qcode_list_whole = implode(",",$setArr);
			
			/***************Misconception Change *************/

			$count_rp = count($setQcodeNewArr);
			$mccount = round($count_rp*0.20);
			$countProper = 0;
			if(isset($qcode_list_whole) && $qcode_list_whole!="")
			{
			$query = "SELECT sub_subtopic_code,qcode,school_usage,misconception,ips_status,status,parent_qcode,skill,group_id,approver2_status 
				  FROM da_questions 
				  WHERE qcode IN (".$qcode_list_whole.")";	
				
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$arrWithoutMisconceptionQcode = array(); 
					$arrWithMisconceptionQcode = array();
					$arrRetGRP[$row['sub_subtopic_code']][$row['qcode']] = array("qcode"=>$row['qcode'],
														 "school_usage"=>$row['school_usage'],
														 "misconception"=>$row['misconception'],
														 "ips_status"=>$row['ips_status'],
														 "status"=>$row['status'],
														 "parent_qcode"=>$row['parent_qcode'],
														 "skill"=>$row['skill'],
														 "group_id" => $row["group_id"],
														 "approver2_status" => $row["approver2_status"]);
					if($row['misconception']==1)
					{
						$countProper++;
					}
				}
			}	
			$difmcq = $mccount-$countProper;	
			if($difmcq>0)
			{
				foreach($setQuestionArr as $key=>$value)
				{		
					$countmic = 0;
					$value = array_filter($value);
					$qcode_list_reporting_head = implode(",",$value);
					$arrRetGRP = array();
					$arrWithoutMisconceptionQcode = array(); 
					$arrWithMisconceptionQcode = array();
					$arrWithMisconceptionQcodeOnly = array();
					$arrSSTSET = array();
					$query = "SELECT sub_subtopic_code,qcode,school_usage,misconception,ips_status,status,parent_qcode,skill,group_id,approver2_status 
					  FROM da_questions 
					  WHERE qcode IN (".$qcode_list_reporting_head.")";	
					
					$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray())
					{
						$arrRetGRP[$row['sub_subtopic_code']][$row['qcode']] = array("qcode"=>$row['qcode'],
															 "school_usage"=>$row['school_usage'],
															 "misconception"=>$row['misconception'],
															 "ips_status"=>$row['ips_status'],
															 "status"=>$row['status'],
															 "parent_qcode"=>$row['parent_qcode'],
															 "skill"=>$row['skill'],
															 "group_id" => $row["group_id"],
															 "approver2_status" => $row["approver2_status"]);
						if($row['misconception']==1)
						{
							$arrWithMisconceptionQcodeOnly[$row['qcode']] = $row['qcode']; 
							$arrWithMisconceptionQcode[$row['sub_subtopic_code']][$row['qcode']] = $row['qcode'];
							
							$countmic++;
						}
						else 
						{
							$arrWithoutMisconceptionQcode[$row['sub_subtopic_code']][] = $row['qcode'];
						}
						$arrSSTSET[$row['sub_subtopic_code']] = $row['sub_subtopic_code']; 
					}
					
					    $usageNew = array();
					    foreach($arrSSTSET as $keySSTSET=>$valueSSTSET)
						{
							foreach($SSTQues[$valueSSTSET] as $sstid => $sstvalue)
								{
									foreach($sstvalue as $keyValue => $valueValue)
									{
										$usageNew[$valueValue["school_usage"]] = $valueValue["school_usage"];
									}
								}
						}
						asort($usageNew);
						$count_set_sst = 0; 			
						
						foreach($arrSSTSET as $keySSTSET=>$valueSSTSET)
						{
							$i = 0;
							
							foreach($SSTQues[$valueSSTSET] as $sstid => $sstvalue)
								{
									foreach($usageNew as $keyNew=>$valueNew)
									{									
										foreach($sstvalue as $keySub => $valueSub)
										{
											if($valueSub["misconception"]==1 && !in_array($valueSub["qcode"],$arrWithMisconceptionQcodeOnly) && !in_array($valueSub["qcode"],$globalQcodeSelectedArray) && $valueSub["school_usage"]==$valueNew)
											{
												
												if(isset($arrWithoutMisconceptionQcode[$valueSSTSET][$i]))
												{
													$arrWithoutMisconceptionQcode[$valueSSTSET][$i] = $valueSub["qcode"];
													$globalQcodeSelectedArray[] = $valueSub["qcode"];
													$count_set_sst++;
													$arrQcodesUpdate = array();
													
													foreach($arrWithoutMisconceptionQcode as $keyQc=>$valueQc)
													{
														foreach($valueQc as $lowerKey=>$lowerValue)
														{
															$arrQcodesUpdate[] = $lowerValue;
														}	
													}
													foreach($arrWithMisconceptionQcode as $keyWc=>$valueWc)
													{
														foreach($valueWc as $upperKey=>$upperValue)
														{
															$arrQcodesUpdate[] = $upperValue;
														}	
													}
												}
												
											}
											else 
												{
													
													$arrQcodesUpdate = array();
													foreach($arrWithoutMisconceptionQcode as $keyQc=>$valueQc)
													{
														foreach($valueQc as $lowerKey=>$lowerValue)
														{
															$arrQcodesUpdate[] = $lowerValue;
														}	
													}
													foreach($arrWithMisconceptionQcode as $keyWc=>$valueWc)
													{
														foreach($valueWc as $upperKey=>$upperValue)
														{
															$arrQcodesUpdate[] = $upperValue;
														}	
													}
												}
										}
									}	
								}	
						}
					
					$qcode_list_final_misconception = implode(",",$arrQcodesUpdate);
				   
					if($qcode_list_final_misconception!="")
					{
						$query = "Update da_reportingDetails set qcode_list = '".$qcode_list_final_misconception."' where reporting_id = '$key'";  
						$dbqry = new dbquery($query,$connid);
						$qcodeInPaperDetails[] = $qcode_list_final_misconception;
					}				
				}
			}
			/***************Misconception Change *************/
		
			if(isset($qcodeInPaperDetails) && count($qcodeInPaperDetails)>0)
			{
			$qcode_list_whole = implode(",",$qcodeInPaperDetails);
			}
			else 
			{
				$qcode_list_whole = $qcode_list_whole;
			}
						
			$query = "Update da_paperDetails set qcode_list = '".$qcode_list_whole."' where papercode = '$PaperCode'";  			
			
			$dbqry = new dbquery($query,$connid);
			
			$queryAutoUpdate = "Update da_testRequest set flag = 'Auto' where id = '$this->test_requestid'";  
			$dbqryAutoUpdate = new dbquery($queryAutoUpdate,$connid);
			
			$requestDetails = $this->GetRequestDetails($this->test_requestid,"",$connid);
			echo "<script>window.location=\"daAdmin_createEditTest.php?papercode=".$PaperCode."&editRequestID=".$this->test_requestid."&subjectno=".$requestDetails["subject"]."&testclass=".$requestDetails["class"]."&paperType=".$this->paperType."&examCode=".$this->examCode."&showReports=".$this->showReports."&autopublish=set\"</script>";
			
		}
		
	}
	
	function selectQuestionFromTable($questionsAvailable=array(),$reporting_details=array(),$connid,$diffcount)
	{
		$countSST = array();
		$countQuestion = array();
		$countSST = explode(",",$reporting_details['sst_list']);
		$countQuestion = explode(",",$reporting_details['qcode_list']);
		$counterSST = count($countSST);
		
		$counterQuestion = count($countQuestion);
		
		$usagecount = array();
			foreach($questionsAvailable as $key  => $value)
			{
				foreach($value as $keycount => $valuecount)
				{
					$usagecount[$valuecount['school_usage']] = $valuecount['school_usage'];
				}
			}
		if($counterSST == 1)/****************IF only one sst is mapped to rh*****/
		{
			$arrQcodeSet = array();
			$qcode_list_set_skill = "";
			foreach($usagecount as $keyusagecount => $valueusagecount)
			{
				
				$arrQcodeSet[] = $this->selectSkillBaseEqualQuestion($questionsAvailable,$valueusagecount,$diffcount);
				$count = 0;
				
				foreach($arrQcodeSet as $key => $value)
				{
					foreach($value as $key3=>$value3)
					{
						$count++;
					}
				}
				
				$diffcount = $diffcount - $count;	
				if($diffcount==0)
				{
					$arrSetRet = array();
					foreach($arrQcodeSet as $key1=>$value1)
					{
						foreach($value1 as $key2=>$value2)
						{
							if($value2!='')
							{
								$arrSetRet[] = $value2;
							}
						}
						
						return $arrSetRet;
					}
					break;
				}
				else 
				{
				foreach($arrQcodeSet as $keyQcode => $valueQcode)
				{
					foreach($valueQcode as $keyQcodeSet => $valueQcodeSet)
					{
						if($valueQcodeSet!='')
						{
							$arrNewQcodeSet[$keyQcodeSet] = $keyQcodeSet;
						}	
					}	
				}	
				foreach($countSST as $row)
				{	
					foreach($questionsAvailable[$row] as $keyset=>$rowset)
					{
						if(!in_array($rowset["qcode"],$arrNewQcodeSet))
						{
							
						$newQuestionAvailable[$row][$rowset["qcode"]] = $questionsAvailable[$row][$rowset["qcode"]];
						} 
					}
					
					$arrQcodeSet[] = $this->selectSkillBaseEqualQuestion($newQuestionAvailable,$valueusagecount,$diffcount);
				}	
				}
			}

			$arrSetRet = array();
			foreach($arrQcodeSet as $key1=>$value1)
			{
				foreach($value1 as $key2=>$value2)
				{
					if($value2!='')
					{
						$arrSetRet[] = $value2;
					}	
				}
			}	

				return $arrSetRet;
			
		}
		else /****************IF only multiple sst is mapped to rh*****/
		{
			if($counterSST==$reporting_details['required_ques'])/*****If sst number is equal to question number *****/
			{				
				
				$arrQcodeSet = $this->selectQcodeBasedOnSSTMapped($questionsAvailable,$usagecount,$reporting_details['required_ques'],$reporting_details['qcode_list'],$reporting_details['sst_list'],'1',$connid);
				
				return $arrQcodeSet;
				
				
			}
			else 
			{
				if($counterSST<$reporting_details['required_ques'])/*****If sst number is less than to question number *****/
				{					
					
					$arrQcodeSet = $this->selectQcodeBasedOnSSTMapped($questionsAvailable,$usagecount,$diffcount,$reporting_details['qcode_list'],$reporting_details['sst_list'],'2',$connid);
										
					return $arrQcodeSet;
				}
				else /*****If sst number is more than to question number *****/
				{
					$sst_list_usage = $this->countPerformanseOfSSTusage($reporting_details['sst_list'],$connid); 					
					
					arsort($sst_list_usage);
					
					$arrNewSST = array();
					foreach($sst_list_usage as $key=>$row)
					{
						$arrNewSST[] = $key;
					}
					
					$sst_new_list = implode(",",$arrNewSST);
					
					$arrQcodeSet = $this->selectQcodeBasedOnSSTMapped($questionsAvailable,$usagecount,$reporting_details['required_ques'],$reporting_details['qcode_list'],$sst_new_list,'3',$connid);
					
					return $arrQcodeSet;
				}
			}
		}
	}
	
	
	function selectQcodeBasedOnSSTMapped($questionsAvailable=array(),$usage_count=array(),$required_question,$qcode_list,$sst_list,$type,$connid,$qcode_list_set)
	{
		$arrSSTMap = explode(",",$sst_list);

			$counter = 0;
			foreach ($arrSSTMap as $row)
				{
					$counter++;
					$countCounter = $counter%2;					
					
					if(count($questionsAvailable[$row])>0)
					{
					$arrQcodeSet[] = $this->selectQcodeBasedOnSST($questionsAvailable[$row],$usage_count,$countCounter,$connid);
					}
				}
			
			foreach($arrQcodeSet as $keyQcodeSeted=>$valueQcodeSeted)
					{
						foreach($valueQcodeSeted as $keyQcodeTake=>$valueQcodeTake)
						{
							if($valueQcodeTake!='')
							{
								$qcode_list_set_new .= $valueQcodeTake.",";
							}
						}
					}				
			$qcode_list_set = $qcode_list_set.$qcode_list_set_new;	
			$count_set = count($arrQcodeSet);
			$diffcount = $required_question - $count_set;
			
			if($diffcount == 0 || $diffcount<0)
			{
				$qcode_list_set = substr_replace($qcode_list_set,"",-1);
				if($diffcount<0)
				{
					$getvalue = (-$diffcount);
				}
				$arrSetting = explode(",",$qcode_list_set);
				
				$countNew = count($arrSetting);
				$arrNewSetting = array();
				for($i=0;$i<($countNew-$getvalue);$i++)
				{
					$arrNewSetting[] = $arrSetting[$i]; 
				}
				$qcode_list_set = implode(",",$arrNewSetting);
			
				$qcode_list_set;
				
				$arrQcodeFinalSet = explode(",",$qcode_list_set);
				foreach($arrQcodeFinalSet as $key=>$value)
				{
					$arrQcodeFinalArray[$value] = $value;
				}
				return $arrQcodeFinalSet;
			}
			else 
			{
				
				foreach($arrQcodeSet as $keyQcode => $valueQcode)
				{
					foreach($valueQcode as $keyQcodeSet => $valueQcodeSet)
					{
						$arrNewQcodeSet[$keyQcodeSet] = $keyQcodeSet;
					}	
				}
				if($type=='1')
				{
					$sst_new_list = $sst_list;
				}
				else 
				{
					$sst_list_usage = $this->countPerformanseOfSSTusage($sst_list,$connid); 					
					
					arsort($sst_list_usage);
					
					$arrNewSST = array();
					foreach($sst_list_usage as $key=>$row)
					{
						$arrNewSST[] = $key;
					}
					
					$sst_new_list = implode(",",$arrNewSST);
				}
				
				$newQuestionAvailable = array();
				foreach ($arrSSTMap as $row)
				{
					foreach($questionsAvailable[$row] as $keyset=>$rowset)
					{
						if(!in_array($rowset["qcode"],$arrNewQcodeSet))
						{
							
						$newQuestionAvailable[$row][$rowset["qcode"]] = $questionsAvailable[$row][$rowset["qcode"]];
						} 
					}
				}
			
				if($type=='1')
				{
					$arrQcodeSet = $this->selectQcodeBasedOnSSTMapped($newQuestionAvailable,$usage_count,$diffcount,$reporting_details['qcode_list'],$sst_new_list,'1',$connid,$qcode_list_set);
				}
				if($type=='2')
				{					
					$arrQcodeSet = $this->selectQcodeBasedOnSSTMapped($newQuestionAvailable,$usage_count,$diffcount,$reporting_details['qcode_list'],$sst_new_list,'2',$connid,$qcode_list_set);
					
				}
				if($type=='3')
				{
					$arrQcodeSet = $this->selectQcodeBasedOnSSTMapped($newQuestionAvailable,$usage_count,$diffcount,$reporting_details['qcode_list'],$sst_new_list,'3',$connid,$qcode_list_set);
				}
				return $arrQcodeSet;				
			}		
	}
	function countPerformanseOfSSTusage($sst_list,$connid)
	{
		$arrSSTUsage = explode(",",$sst_list);
		$arrSSTUsageArr = array();
		foreach($arrSSTUsage as $key=>$row)
		{
		$query = "SELECT (count( DISTINCT (
				  a.paper_code
				  ) ) ) AS usage_count 
				  FROM da_testRequest a, da_reportingDetails c
				  WHERE a.paper_code = c.papercode
				  AND a.status = 'Approved'
				  AND FIND_IN_SET( '$row', c.sst_list ) ";
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray(); 
		$arrSSTUsageArr[$row] = $result["usage_count"];
		}
		return $arrSSTUsageArr;
	}
	function selectQcodeBasedOnSST($questionsAvailable=array(),$usage_count=array(),$countCounter,$connid)
	{
	
	$qcode_set = array();
	foreach($usage_count as $keyusagecount => $valueusagecount)
		{
			
			
			foreach($questionsAvailable as $rowkey=>$rowvalue)
				{
					
					if($countCounter==0)
					{
						if(($rowvalue["skill"] == "Understanding" || $rowvalue["skill"] == "Application/Appreciation") && $rowvalue["school_usage"] == $valueusagecount)
						{
							$qcode_set[$rowvalue['qcode']] = $rowvalue['qcode'];
							return $qcode_set;
						}	
						if($rowvalue["skill"] == "Mechanical" && $rowvalue["school_usage"] == $valueusagecount)
						{
							$qcode_set[$rowvalue['qcode']] = $rowvalue['qcode'];
							
							return $qcode_set;
						}
					}
					else 
					{
						if($rowvalue["skill"] == "Mechanical" && $rowvalue["school_usage"] == $valueusagecount)
						{
							$qcode_set[$rowvalue['qcode']] = $rowvalue['qcode'];
							
							return $qcode_set;
						}
						if(($rowvalue["skill"] == "Understanding" || $rowvalue["skill"] == "Application/Appreciation") && $rowvalue["school_usage"] == $valueusagecount)
						{
							$qcode_set[$rowvalue['qcode']] = $rowvalue['qcode'];
							return $qcode_set;
						}
					}
				
				}
		}
	}
	
	function selectSkillBaseEqualQuestion($questionsAvailable=array(),$usage_count,$diffcount)
	{		
		$arrRet = array();		
		$arrQcodeType = array();
		$countskill = 0;
		foreach($questionsAvailable as $key => $value)
		{
			foreach($value as $rowkey => $rowvalue)
			{				
				$set = ""; 
				if($rowvalue["skill"] == "Mechanical" && $rowvalue["school_usage"] == $usage_count)
				{
					$arrQcodeType[$rowvalue["skill"]][$rowvalue["qcode"]] = $rowvalue["qcode"];
					$countskill++;
				}
				if(($rowvalue["skill"] == "Understanding" || $rowvalue["skill"] == "Application/Appreciation") && $rowvalue["school_usage"] == $usage_count)
				{
					$arrQcodeType[$rowvalue["skill"]][$rowvalue["qcode"]] = $rowvalue["qcode"];
					$countskill++;
				}
				if($rowvalue["school_usage"] == $usage_count && ($rowvalue["skill"] != "Understanding" && $rowvalue["skill"] != "Application/Appreciation" && $rowvalue["skill"] != "Mechanical"))
				{
					$arrQcodeType[$rowvalue["skill"]][$rowvalue["qcode"]] = $rowvalue["qcode"];
					$countskill++;
				}				
			}
		}
		$arrQcodeSelectBasedOnSkill = array();
		
		for($i=1;$i<=$diffcount;$i++)
		{
			$mod_set = $i%2;
			if($mod_set!=0)
			{
				$count = 0;
				foreach($arrQcodeType["Mechanical"] as $key=>$value)
				{
					if(!in_array($value,$arrQcodeSelectBasedOnSkill))
					{
						$arrQcodeSelectBasedOnSkill[$value] = $value;
						
						$count++;
						break;
					}
					
				}
				if($count == 0)
				{
					$count = 0;
					foreach($arrQcodeType["Understanding"] as $key=>$value)
					{
						if(!in_array($value,$arrQcodeSelectBasedOnSkill))
						{
							$arrQcodeSelectBasedOnSkill[$value] = $value;
							
							$count++;
							break;
						}
					}
					if($count==0)
					{
						foreach($arrQcodeType["Application/Appreciation"] as $key=>$value)
						{
							if(!in_array($value,$arrQcodeSelectBasedOnSkill))
							{
								$arrQcodeSelectBasedOnSkill[$value] = $value;
								
								break;
							}
						}
					}	
				}
			}
			else 
			{
				$count = 0;
				foreach($arrQcodeType["Understanding"] as $key=>$value)
				{
					if(!in_array($value,$arrQcodeSelectBasedOnSkill))
					{
						$arrQcodeSelectBasedOnSkill[$value] = $value;
						
						$count++;
						break;
					}
				}
				if($count==0)
				{
					foreach($arrQcodeType["Application/Appreciation"] as $key=>$value)
					{
						if(!in_array($value,$arrQcodeSelectBasedOnSkill))
						{
							$arrQcodeSelectBasedOnSkill[$value] = $value;
							
							$count++;
							break;
						}
					}
					if($count==0)
					{
							foreach($arrQcodeType["Mechanical"] as $key=>$value)
							{
								if(!in_array($value,$arrQcodeSelectBasedOnSkill))
								{
									$arrQcodeSelectBasedOnSkill[$value] = $value;
									
									$count++;
									break;
								}
								
							}
					}
				}	
			}
		}
		return $arrQcodeSelectBasedOnSkill;
		
	}
	function GetSSTQuestions($sstcode,$class,$globalQcodeSelectedArray,$connid)
	{
		$Exclude_Qcodes = "";
		if(is_array($globalQcodeSelectedArray) && count($globalQcodeSelectedArray) > 0){
			$globalQcodeSelectedArray = array_filter($globalQcodeSelectedArray);
			$Exclude_Qcodes = implode(",",$globalQcodeSelectedArray);
		}

		
		if($class==""){
			$condition = "";
		}
		else {
			$condition = "AND da_questions.class = '".$class."'"; 
		}
		
		if($Exclude_Qcodes != "")
			$condition .= " AND da_questions.qcode NOT IN(".rtrim($Exclude_Qcodes,",").")";
		
		$arrRet = array();		
		
		$query = "SELECT da_questions.qcode,da_questions.school_usage,da_questions.misconception,da_questions.ips_status,da_questions.status,
		          da_questions.parent_qcode,da_questions.skill,da_questions.group_id,da_questions.approver2_status 
				  FROM da_questions 
				  WHERE( da_questions.qcode NOT IN (SELECT da_questions.qcode FROM da_questions
				  LEFT JOIN da_ipsDetails ON da_questions.qcode = da_ipsDetails.qcode
				  WHERE da_questions.correct_answer != da_ipsDetails.answer
				  AND da_ipsDetails.ips_status = 0
				  AND da_questions.qcode IN (da_questions.qcode)))
				  AND da_questions.sub_subtopic_code = '".$sstcode."' $condition AND da_questions.status = 3 ORDER BY da_questions.school_usage";		
			
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$sstcode][$row['qcode']] = array("qcode"=>$row['qcode'],
													 "school_usage"=>$row['school_usage'],
													 "misconception"=>$row['misconception'],
													 "ips_status"=>$row['ips_status'],
													 "status"=>$row['status'],
													 "parent_qcode"=>$row['parent_qcode'],
													 "skill"=>$row['skill'],
													 "group_id" => $row["group_id"],
													 "approver2_status" => $row["approver2_status"]);
		}
		
		return $arrRet;
	}
	
	
	function GenNewPaperCode($connid)
	{
		$paperCodeVersion = $this->papercode;
		$testRequest = $this->test_requestid;
		
		if($this->papercode == "" && $testRequest != "")
		{
			$queryLock = "LOCK TABLES da_paperDetails WRITE";
			$dbqueryLock = new dbquery($queryLock,$connid);

			$queryMax = "SELECT IFNULL(MAX(CAST(SUBSTRING(papercode,3) AS UNSIGNED))+1,1) FROM da_paperDetails ";
			$dbqueryMax = new dbquery($queryMax,$connid);
			$rowMax = $dbqueryMax->getrowarray();
			if($this->class <= 9)
			{
				$paperCodeVersion = $this->subjectno.$this->class.$rowMax[0];
				$paperCode = $this->subjectno.$this->class.$rowMax[0];
			}
			else
			{
				$paperCodeVersion = $this->subjectno."A".$rowMax[0];
				$paperCode = $this->subjectno."A".$rowMax[0];
			}
			$query = "INSERT INTO da_paperDetails SET  papercode = '".$paperCode."',version = '1',qcode_list = '' ";
			$dbquery = new dbquery($query,$connid);

			$queryUnLock = "UNLOCK TABLES";
			$dbqueryUnLock = new dbquery($queryUnLock,$connid);

			$queryupdate = "UPDATE da_testRequest SET paper_code = '".$paperCode."' WHERE id = '".$testRequest."'  ";
			$dbqueryupdate = new dbquery($queryupdate,$connid);

			return $this->papercode = $paperCodeVersion;
		}
	}
	
	function getTextBooksToDownload($schoolCode,$class,$subjectno,$year,$connid)
	{
		$arrRet = array();
		$queryTextBook = "SELECT book_id from da_bookMapping where schoolCode = '$schoolCode' AND class = '$class' AND subject = '$subjectno' AND year = '$year'";
		$dbqueryTextBook = new dbquery($queryTextBook,$connid);
		while($rowTextBook = $dbqueryTextBook->getrowarray())
		{
			$arrRet[] = $rowTextBook['book_id'];
		}
		return $arrRet;
	}
	function getTextBookNamePDF($txtb_id,$connid)
	{
		$arrRet = array();
		// added publisher filed to display in Drop downs along with textbook name - Naveen
		$queryTextBook = "SELECT tb_id,tb_name,pdfFile,publisher from da_textbooks where tb_id = '$txtb_id'";
		$dbqueryTextBook = new dbquery($queryTextBook,$connid);
		while($rowTextBook = $dbqueryTextBook->getrowarray())
		{
			$arrRet = array("tb_id"=>$rowTextBook["tb_id"],"tb_name"=>$rowTextBook['tb_name'],"pdfFile"=>$rowTextBook['pdfFile'], 'publisher'=>$rowTextBook["publisher"]);
		}
		return $arrRet;
	}
	
	function ImportUsedPaper($connid,$newPaperCode)
	{
		
		$query1 = "INSERT INTO da_paperDetails (papercode,version,qcode_list)
				   SELECT $newPaperCode, b.version, qcode_list FROM da_testRequest a, da_paperDetails b WHERE a.paper_code = b.papercode AND id = '".$this->importRequestID."' AND version != 1"; 	
		$dbquery1 = new dbquery($query1,$connid);
		
		$query = "SELECT qcode_list, paper_code,b.version FROM da_testRequest a, da_paperDetails b
				  WHERE a.paper_code = b.papercode AND id = '".$this->importRequestID."' AND version = 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		$qcodeList = $row['qcode_list'];
		$referencePapercode = $row['paper_code'];
		
		$queryUpdate = "UPDATE da_paperDetails SET qcode_list='$qcodeList' WHERE papercode='$newPaperCode' AND version=1";
		$dbquery = new dbquery($queryUpdate,$connid);
		
		$query = "INSERT INTO da_reportingDetails(papercode, reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order, entered_dt, entered_by)
			      SELECT '$newPaperCode', reporting_level, sst_list, qcode_list, required_ques, reporting_head, reporting_order, curdate(), '".$_SESSION["username"]."' FROM da_reportingDetails WHERE papercode='$referencePapercode'";
		$dbquery = new dbquery($query,$connid);
		
		# keeping track of imported paper code
		$up_query = "UPDATE da_testRequest SET imported_requestid = '".$this->importRequestID."' WHERE id = '".$this->test_requestid."'";
		$up_dbqry = new dbquery($up_query,$connid);
		######################For same answer checking#####################
		$this->commonForReportingHeadChecking($newPaperCode,$connid);
		######################For same answer checking#####################
	}
	
	/********************************Added Start By Parth 10-04-2012 *****************************/
	function MergeReportingHeads($connid,$request_id,$paper_code,$RepDetailsString,$NewReportingHead="")
	{		
		
		$RepDetailsArr = array();
		$RepDetailsArr = explode(",",$RepDetailsString);
		
		if($request_id == 0 || $paper_code == 0) return;
		
		$NewSSTList = "";
		$NewQcodeList = "";
		$NewReportingOrder = "";
		$ExistingReportingArr = array();
		$NeedToDelReportingIds = "";
		$RequiredQues = 0;
		
		$query = "SELECT reporting_id,papercode,sst_list,qcode_list,required_ques,reporting_head,reporting_head,reporting_order
				  FROM da_reportingDetails WHERE papercode = '$paper_code'";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			
			$ExistingReportingArr[$result["reporting_id"]] = array("sst_list" => $result["sst_list"],
														           "qcode_list" => $result["qcode_list"],
														           "required_ques" => $result["required_ques"],
														           "reporting_order" => $result["reporting_order"]
														   );
		}
		
		if(is_array($RepDetailsArr) && count($RepDetailsArr) > 0){
			
			foreach($RepDetailsArr as $key => $reporting_id){
				$NeedToDelReportingIds .= $reporting_id.",";
				$NewSSTList .= $ExistingReportingArr[$reporting_id]["sst_list"].",";
				if($ExistingReportingArr[$reporting_id]["qcode_list"]!='')
				{
					$NewQcodeList .= $ExistingReportingArr[$reporting_id]["qcode_list"].",";
				}
				$RequiredQues += $ExistingReportingArr[$reporting_id]["required_ques"];
			}
		}
		
		if($NeedToDelReportingIds != ""){
			
			if(trim(strtolower($NewReportingHead)) ==='other areas')
				$NewReportingHead.='*';

			$in_query = "INSERT INTO da_reportingDetails (papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,entered_dt,entered_by)
						 VALUES ('".$paper_code."','sst','".rtrim($NewSSTList,",")."','".rtrim($NewQcodeList,",")."',$RequiredQues,'".$NewReportingHead."',NOW(),'".$_SESSION['username']."')";
			
			$in_dbqry = new dbquery($in_query,$connid);
			if($in_dbqry->affectedrows() > 0){
				
				$del_query = "DELETE FROM da_reportingDetails WHERE reporting_id IN(".rtrim($NeedToDelReportingIds,",").")";
				$del_dbqry = new dbquery($del_query,$connid);
			}
			
			$FetchedReportingID = array();
			$sel_query = "SELECT reporting_id,reporting_order FROM da_reportingDetails WHERE papercode = '".$paper_code."'";
			$sel_dbqry = new dbquery($sel_query,$connid);
			while($sel_result = $sel_dbqry->getrowarray()){
				$FetchedReportingID[] = array("reporting_id"=>$sel_result["reporting_id"],
											  "reporting_order"=>$sel_result["reporting_order"]);
			}

			asort($FetchedReportingID);
			
			if($RepDetailsArr[0]!="")
			{				
                $order_id_set = $ExistingReportingArr[$RepDetailsArr[0]]["reporting_order"];								
			}
		
			asort($FetchedReportingID);
			
			
			$i = $order_id_set;
			foreach($FetchedReportingID as $key => $value){
				echo "ReportingId:-".$value["reporting_order"]."<br/>";
				echo "OrderId:-".$order_id_set."<br/>";
				if($value["reporting_order"]>$order_id_set)
				{ 
					
					$i = $i + 1;
				
					$up_query = "UPDATE da_reportingDetails SET reporting_order = $i WHERE reporting_id = '".$value["reporting_id"]."'";
					$up_dbqry = new dbquery($up_query,$connid);
					if($this->subjectno == 1)
					{
						######################For same answer checking#####################
						$this->commonForReportingHeadChecking($paper_code,$connid,$value["reporting_id"]);
						######################For same answer checking#####################
					}	
				}	
				if($value["reporting_order"]==0)
				{
					echo $up_query = "UPDATE da_reportingDetails SET reporting_order = $order_id_set WHERE reporting_id = '".$value["reporting_id"]."'";
					$up_dbqry = new dbquery($up_query,$connid);
					if($this->subjectno == 1)
					{
						######################For same answer checking#####################
						$this->commonForReportingHeadChecking($paper_code,$connid,$value["reporting_id"]);
						######################For same answer checking#####################
					}	
				}
			}
			$qcode_list_made = "";
			$sel_query = "SELECT qcode_list FROM da_reportingDetails WHERE papercode = '".$paper_code."' ORDER BY reporting_order";
			$sel_dbqry = new dbquery($sel_query,$connid);
			while($sel_result = $sel_dbqry->getrowarray()){
				$FetchedQcodeList[] = $sel_result["qcode_list"];
			}			
		}
	}
	
	/********************************Added End By Parth 10-04-2012 *****************************/
	function GetTeacherSelGrammarSkills($connid)
	{
		$arrRet = array();		
		$queryList = "SELECT chapter_id FROM da_testRequest WHERE id = '".$this->test_requestid."' AND subject = '1'";
		$dbqueryList = new dbquery($queryList,$connid);
		$rowList = $dbqueryList->getrowarray();
		if($rowList["chapter_id"] != "")
		{
			$query = "SELECT chapter_id,chapter_name  FROM da_chapterMaster WHERE chapter_id IN (".$rowList["chapter_id"].")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["chapter_id"]] = array("chapter_id"=>$row["chapter_id"],"chapter_name"=>$row["chapter_name"]);
			}
		}
		return $arrRet;
	}
	function GetTeacherSelGrammarSkillsOld($connid)
	{
		$arrRet = array();
		$queryList = "SELECT chapter_id FROM da_testRequest WHERE id = '".$this->test_requestid."' AND subject = '1' AND paper_type IN ('1','3') ";
		$dbqueryList = new dbquery($queryList,$connid);
		$rowList = $dbqueryList->getrowarray();
		if($rowList["chapter_id"] != "")
		{
			$query = "SELECT skill_id,name,tool_tip FROM da_grammarSkillsBreakup WHERE skill_id IN (".$rowList["chapter_id"].")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["skill_id"]] = array("skill_id"=>$row["skill_id"],"name"=>$row["name"],"tool_tip"=>$row["tool_tip"]);
			}
		}
		return $arrRet;
	}
	function getGrammarSkillsByClassNew($connid,$class)
	{
		$arrRet = array();
		$query="select da_tbChapterMapping.chapter_id,da_chapterMaster.chapter_name
			from da_subtopicMaster
			left join da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
			left join da_tbChapterMapping ON da_subSubTopicMaster.sub_subtopic_code = da_tbChapterMapping.subsubtopic_code
			left join da_chapterMaster ON da_tbChapterMapping.chapter_id = da_chapterMaster.chapter_id
			left join da_textbooks ON da_chapterMaster.tb_id = da_textbooks.tb_id
			WHERE 
			da_textbooks.class = '$class' AND da_textbooks.subjectno = '1'
			ORDER BY da_subSubTopicMaster.description";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["chapter_id"]] = array("skill_id"=>$row["chapter_id"],
			"name"=>$row["chapter_name"],
			"tool_tip"=>""
			);
		}
		return $arrRet;
	}

	/***************************Added Start By Parth 02/05/2012 *******************************/
	function getQuesImagesValidityToFinalizeAutomationCheck($connid,$qcode_list)
	{
		$count = 0;
		$arrQcodes = array();
		if($qcode_list != "")
		{
			$query = "SELECT DISTINCT a.qcode FROM da_questions a,da_images b WHERE a.qcode = b.id AND where_in_question != 'GT' AND b.status < 3 AND a.qcode IN (".$qcode_list.")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if(!in_array($row["qcode"],$arrQcodes))
				$arrQcodes[] = $row["qcode"];
			}

			$queryGrp = "SELECT DISTINCT a.qcode,b.id FROM da_questions a,da_images b WHERE a.group_id = b.id AND where_in_question = 'GT' AND b.status < 3 AND a.qcode IN (".$qcode_list.")";

			$dbqueryGrp = new dbquery($queryGrp,$connid);
			while($rowGrp = $dbqueryGrp->getrowarray())
			{
				if(!in_array($row["qcode"],$arrQcodes))
				$arrQcodes[] = $rowGrp["qcode"];
			}
			foreach($this->arrGRPQustion as $key=>$value)
			{
				$this->arrGRPQustion[$key] = substr_replace($this->arrGRPQustion[$key],")",-1);
			}		
			$queryPsg = "SELECT DISTINCT a.qcode FROM da_questions a,qms_images b WHERE a.passage_id = b.id AND b.status < '6' AND where_in_question IN ('P','PID') AND a.qcode IN (".$qcode_list.")";
			$dbqueryPsg = new dbquery($queryPsg,$connid);
			while($rowPsg = $dbqueryPsg->getrowarray())
			{
				if(!in_array($rowPsg["qcode"],$arrQcodes))
				$arrQcodes[] = $rowPsg["qcode"];
			}
		}
		return $arrQcodes;
	}
	
	/***************************Added End By Parth 02/05/2012 *******************************/
	
	/**************************Added Start By Parth 21/07/2012 *****************************/	
	function getQuesImagesValidityToFinalizeAutomationCheckFinalImage($connid,$qcode_list)
	{
		$count = 0;
		$arrQcodes = array();
		if($qcode_list != "")
		{
			$query = "SELECT DISTINCT a.qcode FROM da_questions a,da_images b WHERE a.qcode = b.id AND where_in_question != 'GT' AND b.status IN(0,2) AND a.qcode IN (".$qcode_list.")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if(!in_array($row["qcode"],$arrQcodes))
				$arrQcodes[] = $row["qcode"];
			}

			$queryGrp = "SELECT DISTINCT a.qcode,b.id FROM da_questions a,da_images b WHERE a.group_id = b.id AND where_in_question = 'GT' AND b.status IN(0,2) AND a.qcode IN (".$qcode_list.")";

			$dbqueryGrp = new dbquery($queryGrp,$connid);
			while($rowGrp = $dbqueryGrp->getrowarray())
			{
				if(!in_array($row["qcode"],$arrQcodes))
				$arrQcodes[] = $rowGrp["qcode"];
			}
			foreach($this->arrGRPQustion as $key=>$value)
			{
				$this->arrGRPQustion[$key] = substr_replace($this->arrGRPQustion[$key],")",-1);
			}		
			$queryPsg = "SELECT DISTINCT a.qcode FROM da_questions a,qms_images b WHERE a.passage_id = b.id AND (b.status < '3' OR b.status = '5') AND where_in_question IN ('P','PID') AND a.qcode IN (".$qcode_list.")";
			$dbqueryPsg = new dbquery($queryPsg,$connid);
			while($rowPsg = $dbqueryPsg->getrowarray())
			{
				if(!in_array($rowPsg["qcode"],$arrQcodes))
				$arrQcodes[] = $rowPsg["qcode"];
			}
		}
		return $arrQcodes;
	}
	/**************************Added Start By Parth 21/07/2012 *****************************/
	
	
	/**************************Added Start By Parth 03/05/2012(For Displaying Pending Request IDs with our display report Assembly Jobs) ******************************/
	
	function GetAllRelatedAssemblyJobs($connid)
	{
		
		$arrRequestids = array();
		$fetchFinalArray = array();
		$finalArr = array();
		$jobsFlag =1;
		$arrRequestids = $this->getAllRequestIds($connid,$this->subjectno);
		if($this->subjectno == 1)
		{
			foreach($arrRequestids as $keyids => $valueids)
			{		
				$fetchFinalArray = $this->fetchQuestionSelectionSummary($valueids,$connid,$jobsFlag);
				
				if(isset($fetchFinalArray) && count($fetchFinalArray) > 0)
				{
					$finalArr[$valueids] = $this->finalMasterFetchingQuestionFunction($fetchFinalArray,$valueids,$connid);
				}
				
			}
		}
		else if($this->subjectno == 2 || $this->subjectno == 3)
		{	
			foreach($arrRequestids as $keyids => $valueids)
			{		
				$fetchFinalArray = $this->fetchQuestionSelectionSummary($valueids,$connid,$jobsFlag);
				
				if(isset($fetchFinalArray) && count($fetchFinalArray) > 0)
				{
					$finalArr[$valueids] = $this->finalMasterFetchingQuestionFunction($fetchFinalArray,$valueids,$connid);
				}
				
			}	
		}
		else 
		{
			foreach($arrRequestids as $keyids => $valueids)
			{		
				$fetchFinalArray = $this->fetchQuestionSelectionSummary($valueids,$connid,$jobsFlag);
				
				if(isset($fetchFinalArray) && count($fetchFinalArray) > 0)
				{
					$finalArr[$valueids] = $this->finalMasterFetchingQuestionFunction($fetchFinalArray,$valueids,$connid);
				}
				
			}	
		}
		return $finalArr;			
	}
	
	#For Fetching All Alloted Job Person 
	function getAllAllotedJobPerson($connid)
	{
		$arrRet = array();
		$query = "SELECT DISTINCT(current_alloted) FROM da_assemblyJobsAllotment";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["current_alloted"]] = $row["current_alloted"];
		}
		return $arrRet;
	}
	#For Fetching All Alloted Job Person 
	
	#For Fetching Pending Request Ids
	function getAllRequestIds($connid,$subject)
	{
		$arrReuqestIds = array();
		$condition  = '';
		if($subject != '' && $subject!="All" && $subject!='Select')
		{
			$condition = " AND subject = '$subject'";
		}
		$query = "SELECT * FROM da_testRequest where flag = 'Auto' AND status = 'pending' $condition ORDER BY delivery_date,class,paper_code";
		$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrReuqestIds[] = $row["id"];
			}	
		return $arrReuqestIds;
	}
	
	#For Papers Question Fetch For Checking
	
	#For Papers Question Fetch For Checking
	function fetachPaperCodeQcodes($request_id,$connid)
	{
	  	$arrQcodes = array();
	  	$query = "SELECT a.qcode_list FROM da_paperDetails a,da_testRequest b WHERE a.papercode = b.paper_code AND b.id = '$request_id'";
	  	$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$arrQcodes = explode(",",$row["qcode_list"]);
			}
		return 	$arrQcodes;
	}
	
	#For Making Fetching Final Qcode Master Array 
	function finalMasterFetchingQuestionFunction($fetchFinalArray,$request_id,$connid)
	{		
		$arrPaperQcodes = array();
		$arrPaperQcodes = $this->fetachPaperCodeQcodes($request_id,$connid);
		
		$arrQcodeFinal = array();
		foreach($fetchFinalArray as $keyFetch => $valueFetch)
		{
			$arrTestDetails = $this->GetRequestDetails($request_id,"",$connid);
			$org_repeatListArr = explode(",",$valueFetch["original_repeat_qcode_list"]);
			
			#For Make Copy Question / Approve a Copy Question
			if($valueFetch["unique_repeated_count"]!=0 && $valueFetch["unique_repeated_count"]>0)
			{
				$arrMakeCopy = array();
				$qcode_list = $valueFetch["unique_repeated_qcode_list"];
				$arrMakeCopy = explode(",",$qcode_list);

				foreach($arrMakeCopy as $keyMakeCopy => $valueMakeCopy)
				{
				//	if(in_array($valueMakeCopy,$arrPaperQcodes))
					{
						$sstcode = "";
						$status = 1;						
						$arrQcodeFinal[$valueMakeCopy]['subject'] = $arrTestDetails['subject'];
						$arrQcodeFinal[$valueMakeCopy]['class'] = $arrTestDetails['class'];
						$arrQcodeFinal[$valueMakeCopy]['request_id'] = $arrTestDetails['id'];
						$arrQcodeFinal[$valueMakeCopy]['paper_code'] = $arrTestDetails['paper_code'];
						$arrQcodeFinal[$valueMakeCopy]['delivery_date'] = $arrTestDetails['delivery_date'];
						$arrQcodeFinal[$valueMakeCopy]['chapter_id'] = $arrTestDetails['chapter_id'];
						$arrQcodeFinal[$valueMakeCopy]['qcode'] = $valueMakeCopy;
						$sstcode = $this->getSSTCodeForQuestion($valueMakeCopy,$connid);
						$arrQcodeFinal[$valueMakeCopy]['sstid'] = $sstcode;
						$status = $this->checkCopyAvailableOrNot($valueMakeCopy,$arrTestDetails['class'],$connid);

						// if the copy was repeated, we get its parent here so have to make status 1 to make copy of unique
						if(!in_array($valueMakeCopy,$org_repeatListArr))
						{
							$status =1;
						}
						$arrQcodeFinal[$valueMakeCopy]['original_status'] = 1;
						$arrQcodeFinal[$valueMakeCopy]['status'] = $status;					
					}	
				}
			}			
			
			#For Write ME/RI Question
			if($valueFetch["mc_copies_no_count"]!=0 && $valueFetch["mc_copies_no_count"]>0)
			{
				$arrMeRi = array();
				$qcode_list = $valueFetch["mc_copies_no_qcode_list"];
				$arrMeRi = explode(",",$qcode_list);
				foreach($arrMeRi as $keyMeRi => $valueMeRi)
				{
					if(in_array($valueMeRi,$arrPaperQcodes))
					{
						$sstcode = "";
						$status = 2;
						$arrQcodeFinal[$valueMeRi]['subject'] = $arrTestDetails['subject'];
						$arrQcodeFinal[$valueMeRi]['class'] = $arrTestDetails['class'];
						$arrQcodeFinal[$valueMeRi]['request_id'] = $arrTestDetails['id'];
						$arrQcodeFinal[$valueMeRi]['paper_code'] = $arrTestDetails['paper_code'];
						$arrQcodeFinal[$valueMeRi]['delivery_date'] = $arrTestDetails['delivery_date'];
						$arrQcodeFinal[$valueMeRi]['chapter_id'] = $arrTestDetails['chapter_id'];
						$arrQcodeFinal[$valueMeRi]['qcode'] = $valueMeRi;
						$sstcode = $this->getSSTCodeForQuestion($valueMeRi,$connid);
						$arrQcodeFinal[$valueMeRi]['sstid'] = $sstcode;
						$status = $this->checkMeRi($valueMeRi,$connid);
						$arrQcodeFinal[$valueMeRi]['original_status'] = 2;
						$arrQcodeFinal[$valueMeRi]['status'] = $status;
					}	
				}
			} 
			
			#Resolve IPS mismatch
			if($valueFetch["ips_mismatch_count"]!=0 && $valueFetch["ips_mismatch_count"]>0)
			{
				$finalMismatchQuestions = $this->getAllMismatchQcodeArr($connid);
				$arrIpsMismatch = array();
				$qcode_list = $valueFetch["ips_mismatch_qcode_list"];
				$arrIpsMismatch = explode(",",$qcode_list);
				foreach($arrIpsMismatch as $keyIpsMismatch => $valueIpsMismatch)
				{
					if(in_array($valueIpsMismatch,$arrPaperQcodes))
					{
						$sstcode = "";
						$status = 3;
						$arrQcodeFinal[$valueIpsMismatch]['subject'] = $arrTestDetails['subject'];
						$arrQcodeFinal[$valueIpsMismatch]['class'] = $arrTestDetails['class'];
						$arrQcodeFinal[$valueIpsMismatch]['request_id'] = $arrTestDetails['id'];
						$arrQcodeFinal[$valueIpsMismatch]['paper_code'] = $arrTestDetails['paper_code'];
						$arrQcodeFinal[$valueIpsMismatch]['delivery_date'] = $arrTestDetails['delivery_date'];
						$arrQcodeFinal[$valueIpsMismatch]['chapter_id'] = $arrTestDetails['chapter_id'];
						$arrQcodeFinal[$valueIpsMismatch]['qcode'] = $valueIpsMismatch;
						$sstcode = $this->getSSTCodeForQuestion($valueIpsMismatch,$connid);
						$arrQcodeFinal[$valueIpsMismatch]['sstid'] = $sstcode;
						if(!in_array($valueIpsMismatch,$finalMismatchQuestions))
						{
							$status = 6;
						}
						$arrQcodeFinal[$valueIpsMismatch]['original_status'] = 3;
						$arrQcodeFinal[$valueIpsMismatch]['status'] = $status;
					}	
				}
			} 
			
			#Approve one or more images - 1. Make Images 2. Approve Images
			if($valueFetch["unapproved_image_qcode_count"]!=0 && $valueFetch["unapproved_image_qcode_count"]>0)
			{
				$arrImagePending = array();
				$qcode_list = $valueFetch["unapproved_image_qcode_list"];
				$arrImagePending = explode(",",$qcode_list);
				$finalPendingImage = $this->getQuesImagesValidityToFinalizeAutomationCheck($connid,$qcode_list);				
				$finalPendingImageFinal = $this->getQuesImagesValidityToFinalizeAutomationCheckFinalImage($connid,$qcode_list);						
				
				foreach($arrImagePending as $keyImagePending => $valueImagePending)
				{
					if(in_array($valueImagePending,$arrPaperQcodes))
					{
						$sstcode = "";
						$status = 4;
						$arrQcodeFinal[$valueImagePending]['subject'] = $arrTestDetails['subject'];
						$arrQcodeFinal[$valueImagePending]['class'] = $arrTestDetails['class'];
						$arrQcodeFinal[$valueImagePending]['request_id'] = $arrTestDetails['id'];
						$arrQcodeFinal[$valueImagePending]['paper_code'] = $arrTestDetails['paper_code'];
						$arrQcodeFinal[$valueImagePending]['delivery_date'] = $arrTestDetails['delivery_date'];
						$arrQcodeFinal[$valueImagePending]['chapter_id'] = $arrTestDetails['chapter_id'];
						$arrQcodeFinal[$valueImagePending]['qcode'] = $valueImagePending;
						$sstcode = $this->getSSTCodeForQuestion($valueImagePending,$connid);
						$arrQcodeFinal[$valueImagePending]['sstid'] = $sstcode;
						if(!in_array($valueImagePending,$finalPendingImage))
						{
							$status = 6;
						}
						else 
						{
							if(in_array($valueImagePending,$finalPendingImageFinal))
							{
								$status = 4;
							}
							else 
							{
								$status = 9;
							}
						}
						$arrQcodeFinal[$valueImagePending]['original_status'] = 4;
						$arrQcodeFinal[$valueImagePending]['status'] = $status;
					}	
				}
			} 
			
			#Make Ubique Question For English
			if($arrTestDetails['subject']==1)
			{	
				
					$question_selected = $valueFetch["questions_selected"];
					$explode_questionSelected = explode("/",$question_selected);
					$finalcount = $explode_questionSelected[1] - $valueFetch["unique_repeated_count"];		
					if($finalcount < $explode_questionSelected[1] || $explode_questionSelected[0] < $explode_questionSelected[1])
					{
						$sstcode = "";
						$status = 5;
						$makename = "SST_".$this->countUnique;
						$this->countUnique++;
						$arrQcodeFinal[$makename]['subject'] = $arrTestDetails['subject'];
						$arrQcodeFinal[$makename]['class'] = $arrTestDetails['class'];
						$arrQcodeFinal[$makename]['request_id'] = $arrTestDetails['id'];
						$arrQcodeFinal[$makename]['paper_code'] = $arrTestDetails['paper_code'];
						$arrQcodeFinal[$makename]['delivery_date'] = $arrTestDetails['delivery_date'];
						$arrQcodeFinal[$makename]['chapter_id'] = $arrTestDetails['chapter_id'];
						$arrQcodeFinal[$makename]['qcode'] = "";
						if($valueFetch['chapter_id']==0)
						{
							$sstcode = "";
						}
						else 
						{
						$sstcode = $this->getSSTCodeForChapter($valueFetch['chapter_id'],$connid);
						}
						$arrQcodeFinal[$makename]['sstid'] = $sstcode;
						
						if($finalcount >= $explode_questionSelected[1])
						{
							$status = 6;
						}
						$status = $this->getRecordsRelatedToUniqueEnglish($arrTestDetails,$connid,$sstcode,$explode_questionSelected[1]);
						$arrQcodeFinal[$makename]['original_status'] = 5;				
						$arrQcodeFinal[$makename]['status'] = $status;
					}
				
			}
			
		}
		return $arrQcodeFinal;
		
	}
	
	function getSSTCodeForQuestion($qcode,$connid)
	{
		$sstcode = "";
		$query = "SELECT * FROM da_questions where qcode = '$qcode'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$sstcode = $row["sub_subtopic_code"];
		}
		return $sstcode;
	}
	
	function getSSTCodeForChapter($chapter_id,$connid)
	{
		$sstcode = "";
		$query = "SELECT * FROM da_tbChapterMapping where chapter_id = '$chapter_id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$sstcode = $row["subsubtopic_code"];
		}
		return $sstcode;
	}
	
	
	#Check Process OF Make Copy Question
	function checkCopyAvailableOrNot($qcode,$class,$connid)
	{
		/**********Added this for the condition related to class specific copy made (07-05-2012)******************/
		$condition = "";
		if($this->subjectno == 1)
		{
			$condition = "";
		}
		else 
		{			
			$condition = "";	
		}
		/**********Added this for the condition related to class specific copy made (07-05-2012)******************/
		
		$status = 1;
		$query = "SELECT count(*) as count FROM da_questions where parent_qcode = '$qcode' $condition AND status = '3'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row["count"]>0)
			{
				$status = 6;
			}
			else 
			{
				$queryCheck = "SELECT count(*) as count FROM da_questions where parent_qcode = '$qcode' $condition AND status IN ('0,1,2,5')";
				$dbqueryCheck = new dbquery($queryCheck,$connid);
				while($rowCheck = $dbqueryCheck->getrowarray())
				{
					if($rowCheck["count"]>0)
					{
						$status = 8;
					}
					else 
					{
						$status = 1;
					}
				}				
			}
		}
		return $status;		
	}
	
	#Check Process OF Write ME/RI Question
	function checkMeRi($qcode,$connid)
	{
		$status = 2;
		$query = "SELECT * FROM da_questions where qcode = '$qcode'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row["misconception"] == 1)
			{
				$status = 6;
			}
		}
		return $status;
	}
	
	#Check Process OF Make Unique For English
	function getRecordsRelatedToUniqueEnglish($arrTestDetails,$connid,$sub_subtopic_code_set,$explode_questionSelected)
	{
		$status = 5;
		$priorityArrForClassSelection = $this->SelectPriorityAsPerClass($arrTestDetails["class"],$connid);
		$finalMismatchQuestions = $this->getAllMismatchQcodeArr($connid);
		
			foreach($priorityArrForClassSelection as $keyclass => $valueclass)
				{
					$year_new = $arrTestDetails['year'];
					$past_year_new = $year_new - 1;
					foreach($valueclass as $keyclassset => $valueclassset)
					{
						$arrUnusedQuestions = array();
						$class_set_for_qcode = $valueclass;
						$arrUnusedQuestions = $this->getAllUnusedQuestions($valueclassset,$sub_subtopic_code_set,$arrTestDetails['schoolCode'],$year_new,$past_year_new,$connid);
						if(isset($arrUnusedQuestions) && count($arrUnusedQuestions)>0)
						{
							foreach($arrUnusedQuestions as $keyUnusedQues => $valueUnusedQues)
							{
								if(!in_array($valueUnusedQues,$finalMismatchQuestions))
								{
									$FinalQuestionsSelected[] = $valueUnusedQues;
									$counterForChapter++;
								}							
							}
						}							
					}
				}
			if($counterForChapter >= $explode_questionSelected)		
			{
				$status = 6;
			}
			return $status;
	}
	
	function subtopicDescription($sstid,$connid)
	{
		$description = "";
		$query = "SELECT description FROM da_subSubTopicMaster where sub_subtopic_code = '$sstid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$description = $row["description"];
		}
		return $description;
	}
	
	function getMonthsArray($year,$connid)
	{
		$monthArray = array();
		if($this->searchSchool != '')
		{
			$start_date = "";
			$end_date = "";
			$query = "SELECT start_date,end_date FROM da_orderMaster where schoolCode = '$this->searchSchool' AND year = '$year'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$start_date = $row["start_date"];
				$end_date = $row["end_date"];
			}				
		}		
		
		if($start_date!='' && $end_date!='')
		{		
			$starttime = strtotime($start_date);
			$endtime = strtotime($end_date);
			$my     = date('n-Y', $endtime); 			
			$monthArrayForStr = array("6"=>"June","7"=>"July","8"=>"Aug","9"=>"Sep","10"=>"Oct","11"=>"Nov","12"=>"Dec","1"=>"Jan","2"=>"Feb","3"=>"Mar","4"=>"Apr","5"=>"May");
			
			$months = array(); 
			$f = ''; 
			
			while($starttime < $endtime) { 
				if(date('n-Y', $starttime) != $f) { 
				 $f = date('n-Y', $starttime); 
				 if(date('n-Y', $starttime) != $my && ($starttime < $endtime)) { 				     			
				     $months[] = $monthArrayForStr[date('n', $starttime)];			 
				 } 
				} 
				$starttime = strtotime((date('Y-n-d', $starttime).' +15days')); 
			}
			
			$months[] = $monthArrayForStr[date('n', $endtime)];
			foreach($months as $keyMonths=>$valueMonths)
			{
				$key_array = array_search($valueMonths,$monthArrayForStr);				
				$monthArray[$key_array] = $valueMonths;
			}
		}
		return $monthArray;
	}	
	
	function getPersonsRelatedToSales($connid)
	{
		$arrPerson = array();		
		$query = "SELECT DISTINCT ps person FROM  sales_allotment_master WHERE ps<>'' UNION SELECT DISTINCT ts FROM sales_allotment_master WHERE ts<>'' ORDER BY person";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($arrPerson,$row["person"]);
		}
		return  $arrPerson;
	}		
		
	/*************************Added Start By Parth 31/05/2012 **************************/
	function saveResetManualReason($connid,$reasonSet)
	{
		$arrForResetManual = array(0=>"Select",1=>"Very few questions selected in the auto-paper",2=>"Paper balance (between chapters/topics) needs improvement",3=>"Other issue / bug - no auto-paper made");
		$reason_manual_set = $arrForResetManual[$reasonSet];
		$reason = $_SESSION["username"]."(".date("d-m-Y H:i:s")."):".$reason_manual_set;
		$query = "UPDATE da_testRequest SET reset_reason = CONCAT_WS('<br>',reset_reason,'".$reason."') WHERE id = '".$this->test_requestid."' ";
		$dbquery = new dbquery($query,$connid);
	}
	
	function fetchSSTMismatch($test_requestid,$connid)
	{
		$arrRet = array();	
		$query = "SELECT * FROM da_questionSSTMismatch where request_id = '$test_requestid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{			
			$arrRet[$row["qcode"]] = $row["qcode"];			
		}
		return $arrRet;	
	}
	
	function getSTMismatchDetailsWithChecking($keySetFinal,$valuesetFlagCheck,$connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM da_testRequest where id = $keySetFinal";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet["paper_code"] = $row["paper_code"]; 
			$arrRet["subject"] = $row["subject"];
			$arrRet["class"] = $row["class"];
			$arrRet["delivery_date"] = $row["delivery_date"];
			$arrRet["chapter_id"] = $row["chapter_id"];
			$querySST = "SELECT sub_subtopic_code FROM da_questions where qcode = '$valuesetFlagCheck'";
			$dbquerySST = new dbquery($querySST,$connid);
			while($rowSST = $dbquerySST->getrowarray())
			{
				$arrRet["sst_id"] = $rowSST["sub_subtopic_code"];				
			}
			$chapter_id = $row["chapter_id"];
			$checkSubSubTopicArr = array();
			$queryMappedSST = "SELECT DISTINCT(subsubtopic_code) as sst FROM da_tbChapterMapping where chapter_id IN($chapter_id)";
			$dbqueryMappedSST = new dbquery($queryMappedSST,$connid);
			while($rowMappedSST = $dbqueryMappedSST->getrowarray())
			{
				$checkSubSubTopicArr[$rowMappedSST["sst"]] = $rowMappedSST["sst"];			
			}
			if(in_array($arrRet["sst_id"],$checkSubSubTopicArr))
			{
				$arrRet["original_status"] = 7;
				$arrRet["status"] = 6;
			}
			else 
			{
				$arrRet["status"] = 7;
			}
				
		}
		return $arrRet;
		
	}
	/*************************Added End By Parth 31/05/2012 **************************/	

	###############For Chapter Type Check #######################
	function checkBackgroundFlag($chapter_id,$connid)
	{
		$chapter_type = 0;
		$query = "SELECT thin_chapter FROM da_chapterMaster where chapter_id = '$chapter_id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$chapter_type = $row["thin_chapter"];
		}		
		return $chapter_type;
	}
	
	
	###############For Chapter Type Check #######################
	
	##############For Save Alloter In Table######################
	function SaveRelatedAssemblyJobsAllotment($connid)
	{		
		
		if(isset($this->allotedJobArrCheckbox) && count($this->allotedJobArrCheckbox)>0)
		{
			foreach($this->allotedJobArrCheckbox as $keycheckbox => $valuecheckbox)
			{
				$arrSetNewForAlloter = array();
				$subject = "";
				$class = "";
				$request_id = "";
				$qcode = "";
				$sst_id = "";
				$task_id = "";
				$person_name = "";
				$arrSetNewForAlloter = explode("_",$valuecheckbox);
				$subject = $arrSetNewForAlloter[0];
				$class = $arrSetNewForAlloter[1];
				$request_id = $arrSetNewForAlloter[2];
				$qcode = $arrSetNewForAlloter[3];
				$sst_id = $arrSetNewForAlloter[4];
				$task_id = $arrSetNewForAlloter[5];
				$person_name = $this->assemblyJobAlloter;
				$counter_check = 0;
				$queryCheck = "SELECT count(*) as counter FROM da_assemblyJobsAllotment where subject = '$subject' AND class = '$class' AND request_id = '$request_id' 
				              AND qcode = '$qcode' AND sst_id = '$sst_id' AND task_id = '$task_id'";
				$dbqueryCheck = new dbquery($queryCheck,$connid);
				while($rowCheck = $dbqueryCheck->getrowarray())
				{
					$counter_check = $rowCheck["counter"];
				}
				$main_query_set = "";
				if($counter_check==0)
				{
					$main_query_set = "INSERT into da_assemblyJobsAllotment(subject,class,request_id,qcode,sst_id,task_id,current_alloted) VALUES($subject,$class,$request_id,'$qcode',$sst_id,$task_id,'$person_name')";
				}
				else 
				{
					$main_query_set = "UPDATE da_assemblyJobsAllotment set current_alloted = '$person_name' WHERE subject='$subject' AND class='$class' AND request_id = '$request_id' AND qcode='$qcode' AND  sst_id = '$sst_id' AND task_id = '$task_id'";
				}
				$dbqueryMainQuery = new dbquery($main_query_set,$connid);
			}				
		}
		return $this->GetAllRelatedAssemblyJobs($connid);
	}
	##############For Save Alloter In Table######################
	##############For Assembler Fetch############################
	function checkForAvailedPerson($task_id_checkbox,$connid)
	{
		$subject = "";
		$class = "";
		$request_id = "";
		$qcode = "";
		$sst_id = "";
		$task_id = "";
		$person_name = "";
		$arrSetNewForAlloter = explode("_",$task_id_checkbox);
		$subject = $arrSetNewForAlloter[0];
		$class = $arrSetNewForAlloter[1];
		$request_id = $arrSetNewForAlloter[2];
		$qcode = $arrSetNewForAlloter[3];
		$sst_id = $arrSetNewForAlloter[4];
		$task_id = $arrSetNewForAlloter[5];
		$person_name = "";
		$queryCheck = "SELECT current_alloted FROM da_assemblyJobsAllotment where subject = '$subject' AND class = '$class' AND request_id = '$request_id' 
		              AND qcode = '$qcode' AND sst_id = '$sst_id' AND task_id = '$task_id'";
		$dbqueryCheck = new dbquery($queryCheck,$connid);
		while($rowCheck = $dbqueryCheck->getrowarray())
		{
			$person_name = $rowCheck["current_alloted"];
		}
		return $person_name;
	}
	##############For Assembler Fetch############################
	
	
	##############For Change Balance Paper ######################
	function getChangeBalanceChapterDetails($chapter_id,$connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM da_chapterMaster WHERE chapter_id IN($chapter_id)";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["chapter_id"]] = $row["chapter_name"];
		}
		return $arrRet;
	}
	##############For Change Balance Paper ######################
	
	
	##############For Chapter Name For Chapter ID ###############
	function getChapterNamesByIdListAssemblyJobs($chapter_id,$connid)
	{
		$chapter_name = "";
		$arrChapters = array();
		$query = "SELECT chapter_name FROM da_chapterMaster where chapter_id IN($chapter_id)";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrChapters[] = $row["chapter_name"];
		}
		if(isset($arrChapters) && count($arrChapters)>0)
		{
			$chapter_name = implode(", ",$arrChapters);
		}	
		return $chapter_name;
	}
	##############For Chapter Name For Chapter ID ###############
	
	#############For Popup Id#############
	function getTimerForPopup($status_set,$rid,$connid)
	{
		$seconds_return = 0;
		$condition = "";
		if($status_set=="finalize")
		{
			$condition .= "seconds"; 
		}
		else 
		{
			$condition .= "approve_seconds";
		}
		$query = "SELECT $condition FROM da_timerTestRequest WHERE request_id = '$rid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$seconds_return = $row[$condition];
			if($seconds_return<0)
			{
				$seconds_return = 0;
			}
			$seconds_return = ($seconds_return/60);
			$seconds_return = round($seconds_return);
			
		}
		return $seconds_return;
	}
	
	function insertTimeIntoSystem($timetaken,$rid,$state_set,$connid)
	{
		$timetaken = $timetaken*60;
		$condition = "";
		if($state_set == "finalize")
		{
			$condition .= "seconds";
		}
		else 
		{
			$condition .= "approve_seconds";
		}
		$counter = 0;
		$flag_check = 0;
		$query = "SELECT count(*) as counter,$condition FROM da_timerTestRequest WHERE request_id = '$rid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$counter = $row["counter"];
		}
		if($counter>0)
		{
			$flag_check = 1;
		}
		if($flag_check == 0)
		{
			$querySet = "INSERT into da_timerTestRequest (request_id,$condition) VALUES('$rid','$timetaken')";
		}
		else 
		{
			$querySet = "UPDATE da_timerTestRequest set $condition = '$timetaken' WHERE request_id = '$rid'";
		}
		$dbquerySet = new dbquery($querySet,$connid);		
	}		
	#############For Popup Id#############
	
	############For Rejected Question Fetch to display on create edit test page#########
	function getRejectedQuestionAssembly($chapter_id,$connid)
	{
		$arrRet = array();
		$qcode_list = "";
		$query = "SELECT * FROM da_questionRejectedAssembly WHERE status = 0 AND qcode_status = 0 AND request_id = '$this->test_requestid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$querySubTopicCode = "SELECT sub_subtopic_code FROM da_questions WHERE qcode = '$row[qcode]'";
			$dbquerySubTopicCode = new dbquery($querySubTopicCode,$connid);
			while($rowSubTopicCode = $dbquerySubTopicCode->getrowarray())
			{
				$queryChapterMapped = "SELECT * FROM da_tbChapterMapping WHERE subsubtopic_code = '$rowSubTopicCode[sub_subtopic_code]' AND chapter_id = '$chapter_id'";
				$dbqueryChapterMapped = new dbquery($queryChapterMapped,$connid);
				while($rowChapterMapped = $dbqueryChapterMapped->getrowarray())
				{
					$arrRet[$row["qcode"]] = $row["qcode"];
				}
			}
		}
		$qcode_list = implode(",",$arrRet);
		return $qcode_list;
	}
	
	function fetchRejectedMismatch($test_requestid,$connid)
	{
		$arrRet = array();	
		$query = "SELECT * FROM da_questionRejectedAssembly where request_id = '$test_requestid' AND status = 1 AND qcode_status = 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{			
			$arrRet[$row["qcode"]] = $row["qcode"];			
		}
		return $arrRet;	
	}
	############For Rejected Question Fetch to display on create edit test page#########
	
	############For Process Of Test Ordered Count #############
	function getTestRequestedOrderCount($OrdSubject,$OrdClass,$OrdstartDate,$OrdendDate,$OrdSchool="",$OrdYear,$connid)
	{
		$startDate = "";
		$endDate = "";
		$startDate = date("Y-m-d",strtotime($OrdstartDate));
		$endDate = date("Y-m-d",strtotime($OrdendDate));
		$arrRet = array();
		$condition = "";		
		if($OrdSubject=="All")
		{
			$condition .= "";
		}
		else 
		{
			$condition .= " AND subject = '$OrdSubject'";
		}
		
		if($OrdClass=="All")
		{
			$condition .= "";
		}
		else 
		{
			$condition .= " AND class = '$OrdClass'";
		}
		
		if($OrdSchool!="")
		{
			$condition .= " AND schoolCode = '$OrdSchool'";
		}
		
		$queryRG = "select subject,class,count(*) as cnt FROM da_testRequest where request_type='RG' AND (test_date >= '$startDate' AND test_date <= '$endDate') AND year = '$OrdYear' $condition GROUP BY subject,class ORDER BY subject,class";
		$dbqueryRG = new dbquery($queryRG,$connid);
		while($rowRG = $dbqueryRG->getrowarray())
		{
			if($rowRG["class"]!=0 && $rowRG["subject"]!=0)
			{
				$arrRet[$rowRG["subject"]][$rowRG["class"]]["RG"] = $rowRG["cnt"];
			}	
		}
		
		$queryRV = "select subject,class,count(*) as cnt FROM da_testRequest where request_type='RV' AND (test_date >= '$startDate' AND test_date <= '$endDate') AND year = '$OrdYear' $condition GROUP BY subject,class ORDER BY subject,class";
		$dbqueryRV = new dbquery($queryRV,$connid);
		while($rowRV = $dbqueryRV->getrowarray())
		{
			if($rowRV["class"]!=0 && $rowRV["subject"]!=0)
			{
				$arrRet[$rowRV["subject"]][$rowRV["class"]]["RV"] = $rowRV["cnt"];
			}	
		}
		
		return $arrRet;
	}
	
	function getSchoolCodeListDisplay($OrdYear,$connid)
	{
		$arrRet = array();
		$query = "SELECT a.schoolname,b.schoolCode FROM schools a,da_orderMaster b WHERE a.schoolno = b.schoolCode AND b.year = '$OrdYear'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["schoolname"]] = $row["schoolCode"];
		}
		return $arrRet;
	}
	
	function getExpectedCountOfSchool($OrdSchool,$OrdYear,$OrdendDate,$OrdSubject="All",$OrdClass="All",$connid)
	{		
		$arrRet = array();		
		$exception = 0;
		
		$arrSubject = array();
		$arrClass = array();
		$start_date = "";
		$end_date = "";
		$term = "";
		$query = "SELECT b.*,a.test_request_exception,a.start_date,a.end_date,a.term FROM da_orderBreakup b,da_orderMaster a WHERE a.order_id = b.order_id AND a.schoolCode = ".$OrdSchool." AND a.year = ".$OrdYear." GROUP BY b.class";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{			
			$start_date = $row["start_date"];
			$end_date = $row["end_date"];			
			$exception = $row["test_request_exception"];
			$term = $row["term"];
			if($row["e"]!=0) { if($OrdSubject!="All") { if($OrdSubject==1){ $arrSubject[1] = 1; } } else { $arrSubject[1] = 1; } }
			if($row["m"]!=0) { if($OrdSubject!="All") { if($OrdSubject==2) { $arrSubject[2] = 2; } } else { $arrSubject[2] = 2; } }
			if($row["s"]!=0) { if($OrdSubject!="All") { if($OrdSubject==3) { $arrSubject[3] = 3; } } else { $arrSubject[3] = 3; } }
			if($OrdClass!="All") { if($OrdClass==$row["class"]) { $arrClass[$row["class"]] = $row["class"]; } }
			else  { $arrClass[$row["class"]] = $row["class"]; }			
		}						
		
		$start_date = strtotime($start_date);		
		$end_date = strtotime($end_date);
		
		$difference = 0;
		$difference = round(($end_date-$start_date) / 60 / 60 / 24 / 30);
		
		$difference_tilldate = 0;
		$OrdendDate = strtotime($OrdendDate);
		
		if($OrdendDate>=$start_date) { $difference_tilldate = round(($OrdendDate-$start_date) / 60 / 60 / 24 / 30); }
		else { $difference_tilldate = 0; }
		
		$percentage = 0;
		$percentage = ($difference_tilldate/$difference);
		
		if($percentage>1) { $percentage = 1; }
		
		$sci_classes_for_8papers = array(3,4,5);
		$sci_classes_gap_exceptions = array(6,7,8,9,10);
		if(isset($arrSubject) && count($arrSubject)>0)
		{
			foreach($arrSubject as $keySubject => $valusSubject)
			{				
				if(isset($arrClass) && count($arrClass)>0)
				{
					foreach($arrClass as $keyClass => $valueClass)
					{						
						if($valusSubject==1){ if($OrdendDate<=$start_date) { $arrRet[$valusSubject][$valueClass]["expected"] = 0; } else { $arrRet[$valusSubject][$valueClass]["expected"] = 8; }	$arrRet[$valusSubject][$valueClass]["expected_tilldate"] = round($percentage*8); }				
						
						if($valusSubject==2){ if($OrdendDate<=$start_date) { $arrRet[$valusSubject][$valueClass]["expected"] = 0; } else { $arrRet[$valusSubject][$valueClass]["expected"] = 8; } $arrRet[$valusSubject][$valueClass]["expected_tilldate"] = round($percentage*8); }
						
						if($valusSubject==3){
			
							if(in_array($valueClass,$sci_classes_for_8papers)) { if($OrdendDate<=$start_date) { $arrRet[$valusSubject][$valueClass]["expected"] = 0; }
							else { $arrRet[$valusSubject][$valueClass]["expected"] = 8; }
								$arrRet[$valusSubject][$valueClass]["expected_tilldate"] = round($percentage*8); 
							}
							else
							{
								$mapped_bookids = "";
								$mapped_bookidcount = 0;						
								
								$bookmapped_query = "SELECT book_id FROM da_bookMapping WHERE schoolCode = ".$OrdSchool." AND year = ".$OrdYear." AND class = ".$valueClass." AND subject = $valusSubject";
								$dbquery = new dbquery($bookmapped_query,$connid);
							    $row_book = $dbquery->getrowarray();			
								$mapped_bookids = $row_book["book_id"];															
								$mapped_bookidcount = count(explode(",",$mapped_bookids));
								
								if($mapped_bookidcount < 3){
									if($OrdendDate<=$start_date) { $arrRet[$valusSubject][$valueClass]["expected"] = 0; }
									else { $arrRet[$valusSubject][$valueClass]["expected"] = 8; }
									$arrRet[$valusSubject][$valueClass]["expected_tilldate"] = round($percentage*8); 						
								}	
								else if($mapped_bookidcount >= 3){
									if($OrdendDate<=$start_date) { $arrRet[$valusSubject][$valueClass]["expected"] = 0; }
									else { $arrRet[$valusSubject][$valueClass]["expected"] = 12; }
									$arrRet[$valusSubject][$valueClass]["expected_tilldate"] = round($percentage*12); 						
								}						
								
								if(in_array($valueClass,$sci_classes_gap_exceptions) && $exception == '1'){
									if($OrdendDate<=$start_date) { $arrRet[$valusSubject][$valueClass]["expected"] = 0; }
									else { $arrRet[$valusSubject][$valueClass]["expected"] = 12; }
									$arrRet[$valusSubject][$valueClass]["expected_tilldate"] = round($percentage*12); 						
								}
							}
						}
						
						if($term=="Half")
						{
							$arrRet[$valusSubject][$valueClass]["expected"] = ($arrRet[$valusSubject][$valueClass]["expected"]/2);
							$arrRet[$valusSubject][$valueClass]["expected_tilldate"] = round($arrRet[$valusSubject][$valueClass]["expected_tilldate"]/2);
						}
					}	
				}
			}
		}		
		return $arrRet;	
	}
	
	############For Process Of Test Ordered Count #############
	
	###########For similar chapter id mapping #################
	function getSimilarMappedChapterId($chapter_id,$connid)
	{
		$chapter_similar_id = 0;
		$query = "SELECT similar_chapter_id FROM da_chapterMaster where chapter_id = $chapter_id";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row["similar_chapter_id"]!=0)
			{
				$chapter_similar_id = $row["similar_chapter_id"];
			}
		}
		return $chapter_similar_id;
	}
	###########For similar chapter id mapping #################
	
	##########For Status Of Paper Assembly#####################
	function getDeliveryDateWiseStatusAssembly($connid,$subjectno,$startDeliverDate,$endDeliverDate)
	{
		$condition = "";
		if($startDeliverDate!="")
		{
			$start_date = date("Y-m-d",strtotime($startDeliverDate));
			$condition .= " AND delivery_date>='$start_date'";
		}
		if($endDeliverDate!="")
		{
			$end_date = date("Y-m-d",strtotime($endDeliverDate));
			$condition .= " AND delivery_date<='$end_date'";
		}
		$arrRet = array();
		$arrDeliveryDates = array();
		$query = "SELECT delivery_date FROM da_testRequest where subject = '$subjectno' AND type = 'actual' $condition ORDER BY delivery_date";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrDeliveryDates[] = $row["delivery_date"];
		}
		if($subjectno!=1)
		{
			foreach($arrDeliveryDates as $keyDeliveryDates => $valueDeliveryDates)
			{
				$countRequest = 0;
				$countPendingManual = 0;
				$countPendingAuto = 0;
				$countFinalized =0;
				$countApproved =0;
				$queryFetchRequestIds = "SELECT * FROM da_testRequest WHERE delivery_date = '$valueDeliveryDates' AND subject = '$subjectno' AND type = 'actual'";
				$dbqueryFetchRequestIds = new dbquery($queryFetchRequestIds,$connid);
				while($rowFetchRequestIds = $dbqueryFetchRequestIds->getrowarray())
				{
					$countRequest = $countRequest+1;
					if($rowFetchRequestIds["status"]=="pending")
					{
						if($rowFetchRequestIds["flag"]=="Auto")
						{
							$countPendingAuto = $countPendingAuto+1;
						}
						else 
						{
							$countPendingManual = $countPendingManual+1;
						}
					}	
					if($rowFetchRequestIds["status"]=="finalize" || $rowFetchRequestIds["status"]=="responded" || $rowFetchRequestIds["status"]=="commented")
					{
						$countFinalized = $countFinalized+1;
					}
					if($rowFetchRequestIds["status"]=="Approved")
					{
						$countApproved = $countApproved+1;
					}
				}
				$arrRet[$valueDeliveryDates] = array("no_of_test"=>$countRequest,"no_of_test_manual"=>$countPendingManual,"no_of_test_auto"=>$countPendingAuto,"no_of_test_finalize"=>$countFinalized,"no_of_test_approved"=>$countApproved);
			}
		}
		else 
		{
			foreach($arrDeliveryDates as $keyDeliveryDates => $valueDeliveryDates)
			{
				$countRequest = 0;
				$countPendingManualRC = 0;
				$countPendingManualNRC = 0;
				$countPendingAutoRC = 0;
				$countPendingAutoNRC = 0;
				$countFinalized =0;
				$countApproved =0;
				$queryFetchRequestIds = "SELECT * FROM da_testRequest WHERE delivery_date = '$valueDeliveryDates' AND subject = '$subjectno' AND type = 'actual'";
				$dbqueryFetchRequestIds = new dbquery($queryFetchRequestIds,$connid);
				while($rowFetchRequestIds = $dbqueryFetchRequestIds->getrowarray())
				{
					$countRequest = $countRequest+1;
					if($rowFetchRequestIds["status"]=="pending")
					{
						if($rowFetchRequestIds["flag"]=="Auto")
						{
							if($rowFetchRequestIds["paper_type"]==1 || $rowFetchRequestIds["paper_type"]==2 || $rowFetchRequestIds["paper_type"]==6)
							{
								$countPendingAutoRC = $countPendingAutoRC + 1;
							}
							else 
							{
								$countPendingAutoNRC = $countPendingAutoNRC + 1;
							}
							
						}
						else 
						{
							if($rowFetchRequestIds["paper_type"]==1 || $rowFetchRequestIds["paper_type"]==2 || $rowFetchRequestIds["paper_type"]==6)
							{
								$countPendingManualRC = $countPendingManualRC + 1;
							}
							else 
							{
								$countPendingManualNRC = $countPendingManualNRC + 1;
							}	
						}
					}	
					if($rowFetchRequestIds["status"]=="finalize" || $rowFetchRequestIds["status"]=="responded" || $rowFetchRequestIds["status"]=="commented")
					{
						$countFinalized = $countFinalized+1;
					}
					if($rowFetchRequestIds["status"]=="Approved")
					{
						$countApproved = $countApproved+1;
					}
				}
				$arrRet[$valueDeliveryDates] = array("no_of_test"=>$countRequest,"no_of_test_manual_rc"=>$countPendingManualRC,"no_of_test_manual_nrc"=>$countPendingManualNRC,"no_of_test_auto_rc"=>$countPendingAutoRC,"no_of_test_auto_nrc"=>$countPendingAutoNRC,"no_of_test_finalize"=>$countFinalized,"no_of_test_approved"=>$countApproved);
			}
		}		
		return $arrRet;
	}
	function getPersonWiseStatusAssembly($connid,$subjectno,$startDeliverDate,$endDeliverDate)
	{
		$condition = "";
		if($startDeliverDate!="")
		{
			$start_date = date("Y-m-d",strtotime($startDeliverDate));			
		}
		if($endDeliverDate!="")
		{
			$end_date = date("Y-m-d",strtotime($endDeliverDate));			
		}
		$arrRet = array();
		$arrPersonName = array();
		
		$query = "SELECT alloted_to,approver FROM da_testRequest where subject = '$subjectno' AND (status = 'finalize' OR status = 'responded' OR status = 'commented' OR status = 'Approved') AND type = 'actual' AND ((DATE(finalize_date) >= '$start_date' AND DATE(finalize_date) <= '$end_date') OR (DATE(approved_date) >= '$end_date' AND DATE(approved_date) <= '$end_date'))";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if(!is_null($row["alloted_to"])){
				$arrPersonName[$row["alloted_to"]] = $row["alloted_to"];
			}
			if(!is_null($row["approver"])){
				$arrPersonName[$row["approver"]] = $row["approver"];
			}	
		}
		if($subjectno!=1)
		{
			foreach($arrPersonName as $keyPersonName => $valuePersonName){
				$countNoTestAssembled = 0;
				$countNoTestAssembledAuto = 0;
				$countNoTestAssembledManual = 0;
				$countNoTestApproved = 0;
				$queryFetchPersonRequestIds = "SELECT * FROM da_testRequest WHERE (alloted_to = '$valuePersonName' OR approver = '$valuePersonName') AND (status = 'finalize' OR status = 'responded' OR status = 'commented' OR status = 'Approved') AND subject = '$subjectno' AND type = 'actual' $condition";
				$dbqueryFetchPersonRequestIds = new dbquery($queryFetchPersonRequestIds,$connid);
				while($rowFetchPersonRequestIds = $dbqueryFetchPersonRequestIds->getrowarray())
				{
					if(($rowFetchPersonRequestIds["status"]=='finalize' || $rowFetchPersonRequestIds["status"] == 'responded' || $rowFetchPersonRequestIds["status"] == 'commented' || $rowFetchPersonRequestIds["status"]=='Approved') && ($rowFetchPersonRequestIds["alloted_to"]==$valuePersonName) && (date("Y-m-d",strtotime($rowFetchPersonRequestIds["finalize_date"]))>=$start_date && date("Y-m-d",strtotime($rowFetchPersonRequestIds["finalize_date"]))<=$end_date))
					{
						$countNoTestAssembled = $countNoTestAssembled + 1;
						###############Addded For Process Change Of Display Auto And Manual#####################
						if($rowFetchPersonRequestIds["flag"]=="Auto")	
						{
							$countNoTestAssembledAuto = $countNoTestAssembledAuto + 1;
						}
						else 
						{
							$countNoTestAssembledManual = $countNoTestAssembledManual + 1;
						}
						###############Addded For Process Change Of Display Auto And Manual#####################	
					}
					if(($rowFetchPersonRequestIds["status"]=='Approved') && ($rowFetchPersonRequestIds["approver"]==$valuePersonName) && (date("Y-m-d",strtotime($rowFetchPersonRequestIds["approved_date"]))>=$start_date && date("Y-m-d",strtotime($rowFetchPersonRequestIds["approved_date"]))<=$end_date))
					{							
						$countNoTestApproved = $countNoTestApproved + 1;						
					}
				}				
				$arrRet[$valuePersonName] = array("no_of_test_assembled"=>$countNoTestAssembled,"no_of_test_assembled_auto"=>$countNoTestAssembledAuto,"no_of_test_assembled_manual"=>$countNoTestAssembledManual,"no_of_test_approved"=>$countNoTestApproved);
			}
		}
		else 
		{
			foreach($arrPersonName as $keyPersonName => $valuePersonName){
				$countTotalAssemble = 0;
				$countNoTestAssembledAutoRC = 0;
				$countNoTestAssembledAutoNRC = 0;
				$countNoTestAssembledManualRC = 0;
				$countNoTestAssembledManualNRC = 0;				
				$countNoTestApproved = 0;
				$queryFetchPersonRequestIds = "SELECT * FROM da_testRequest WHERE (alloted_to = '$valuePersonName' OR approver = '$valuePersonName') AND (status = 'finalize' OR status = 'responded' OR status = 'commented' OR status = 'Approved') AND subject = '$subjectno' AND type = 'actual' $condition";
				$dbqueryFetchPersonRequestIds = new dbquery($queryFetchPersonRequestIds,$connid);
				while($rowFetchPersonRequestIds = $dbqueryFetchPersonRequestIds->getrowarray())
				{
					if(($rowFetchPersonRequestIds["status"]=='finalize' || $rowFetchPersonRequestIds["status"] == 'responded' || $rowFetchPersonRequestIds["status"] == 'commented' || $rowFetchPersonRequestIds["status"]=='Approved') && ($rowFetchPersonRequestIds["alloted_to"]==$valuePersonName) && (date("Y-m-d",strtotime($rowFetchPersonRequestIds["finalize_date"]))>=$start_date && date("Y-m-d",strtotime($rowFetchPersonRequestIds["finalize_date"]))<=$end_date))
					{			
						$countTotalAssemble = $countTotalAssemble + 1;			
						if($rowFetchPersonRequestIds["paper_type"]==1 || $rowFetchPersonRequestIds["paper_type"]==2 || $rowFetchPersonRequestIds["paper_type"]==6)
						{						
							if($rowFetchPersonRequestIds["flag"]=="Auto")	
							{
								$countNoTestAssembledAutoRC = $countNoTestAssembledAutoRC + 1;
							}
							else 
							{
								$countNoTestAssembledManualRC = $countNoTestAssembledManualRC + 1;
							}
						}
						else 
						{
							if($rowFetchPersonRequestIds["flag"]=="Auto")	
							{
								$countNoTestAssembledAutoNRC = $countNoTestAssembledAutoNRC + 1;
							}
							else 
							{
								$countNoTestAssembledManualNRC = $countNoTestAssembledManualNRC + 1;
							}
						}						
					}
					if(($rowFetchPersonRequestIds["status"]=='Approved') && ($rowFetchPersonRequestIds["approver"]==$valuePersonName) && (date("Y-m-d",strtotime($rowFetchPersonRequestIds["approved_date"]))>=$start_date && date("Y-m-d",strtotime($rowFetchPersonRequestIds["approved_date"]))<=$end_date))
					{							
						$countNoTestApproved = $countNoTestApproved + 1;						
					}
				}				
				$arrRet[$valuePersonName] = array("no_of_test_assemble"=>$countTotalAssemble,"no_of_test_assembled_auto_rc"=>$countNoTestAssembledAutoRC,"no_of_test_assembled_manual_rc"=>$countNoTestAssembledManualRC,"no_of_test_assembled_auto_nrc"=>$countNoTestAssembledAutoNRC,"no_of_test_assembled_manual_nrc"=>$countNoTestAssembledManualNRC,"no_of_test_approved"=>$countNoTestApproved);
			}
		}
		return $arrRet;	
	}
	function getPersonWiseTestAllotmentStatusAssembly($connid,$subjectno,$startDeliverDate,$endDeliverDate)
	{
		$condition = "";
		if($startDeliverDate!="")
		{
			$start_date = date("Y-m-d",strtotime($startDeliverDate));
			$condition .= " AND delivery_date>='$start_date'";
		}
		if($endDeliverDate!="")
		{
			$end_date = date("Y-m-d",strtotime($endDeliverDate));
			$condition .= " AND delivery_date<='$end_date'";
		}
		$arrRet = array();
		$arrTestAllotmentPersonName = array();
		
		$queryAlloted = "SELECT alloted_to FROM da_testRequest where subject = '$subjectno' AND (status = 'pending' OR status = 'commented') AND type = 'actual' $condition ORDER BY delivery_date";
		$dbqueryAlloted = new dbquery($queryAlloted,$connid);
		while($rowAlloted = $dbqueryAlloted->getrowarray())
		{
			if(!is_null($rowAlloted["alloted_to"])){
				$arrTestAllotmentPersonName[$rowAlloted["alloted_to"]] = $rowAlloted["alloted_to"];
			}
		}
		
		$queryApprove = "SELECT approver FROM da_testRequest where subject = '$subjectno' AND (status = 'finalize' OR status = 'responded') AND type = 'actual' $condition ORDER BY delivery_date";
		$dbqueryApprove = new dbquery($queryApprove,$connid);
		while($rowApprove = $dbqueryApprove->getrowarray())
		{
			if(!is_null($rowApprove["approver"])){
				$arrTestAllotmentPersonName[$rowApprove["approver"]] = $rowApprove["approver"];
			}	
		}
		
			foreach($arrTestAllotmentPersonName as $keyAllotmentPersonName => $valueAllotmentPersonName)
			{				
				$countNoTestAssembl = 0;
				$countNoTestRespond = 0;
				$countNoTestApprove = 0;
				$queryFetchTestAllotmentRequestIds = "SELECT * FROM da_testRequest WHERE (alloted_to = '$valueAllotmentPersonName' OR approver = '$valueAllotmentPersonName') AND (status = 'pending' OR status = 'responded' OR status = 'commented' OR status = 'finalize') AND subject = '$subjectno' AND type = 'actual' $condition";
				$dbqueryFetchTestAllotmentRequestIds = new dbquery($queryFetchTestAllotmentRequestIds,$connid);
				while($rowFetchTestAllotmentRequestIdsRequestIds = $dbqueryFetchTestAllotmentRequestIds->getrowarray())
				{					
					if(($rowFetchTestAllotmentRequestIdsRequestIds["status"]=='pending') && $rowFetchTestAllotmentRequestIdsRequestIds["alloted_to"]==$valueAllotmentPersonName)
					{
						$countNoTestAssembl = $countNoTestAssembl + 1;
					}
					if(($rowFetchTestAllotmentRequestIdsRequestIds["status"]=='commented') && $rowFetchTestAllotmentRequestIdsRequestIds["alloted_to"]==$valueAllotmentPersonName)
					{						
						$countNoTestRespond = $countNoTestRespond + 1;						
					}
					if(($rowFetchTestAllotmentRequestIdsRequestIds["status"]=='finalize' || $rowFetchTestAllotmentRequestIdsRequestIds["status"]=='responded') && $rowFetchTestAllotmentRequestIdsRequestIds["approver"]==$valueAllotmentPersonName)
					{
						$countNoTestApprove = $countNoTestApprove + 1;
					}
				}				
				$arrRet[$valueAllotmentPersonName] = array("no_of_test_assemble"=>$countNoTestAssembl,"no_of_test_respond"=>$countNoTestRespond,"no_of_test_approve"=>$countNoTestApprove);
			}
		
		return $arrRet;		
	}
	
	function displayDeliveryDateWise($arrDisplay)
	{
			$totalRequest = 0;
			$totalRequestManual = 0;
			$totalRequestAuto = 0;
			$totalRequestFinalize = 0;
			$totalRequestApproved = 0;
			echo '<table align="center" cellpadding="4" cellspacing="1" width="50%">';			
			echo '<tr>';
				echo '<th rowspan="2">Delivery Date</th>';
				echo '<th rowspan="2">Total number of test requests</th>';
				echo '<th colspan="2">Tests pending</th>';
				echo '<th rowspan="2">Tests finalized</th>';
				echo '<th rowspan="2">Tests approved</th>';								
			echo '</tr>';	
			echo '<tr>';
				echo '<th>Manual</th>';
				echo '<th>Auto</th>';
			echo '</tr>';
			foreach($arrDisplay as $keyGetDeliveryDateWise => $valueGetDeliveryDateWise)
				{
					$totalRequest = $totalRequest + $valueGetDeliveryDateWise["no_of_test"];
					$totalRequestManual = $totalRequestManual + $valueGetDeliveryDateWise["no_of_test_manual"];
					$totalRequestAuto = $totalRequestAuto + $valueGetDeliveryDateWise["no_of_test_auto"];
					$totalRequestFinalize = $totalRequestFinalize + $valueGetDeliveryDateWise["no_of_test_finalize"];
					$totalRequestApproved = $totalRequestApproved + $valueGetDeliveryDateWise["no_of_test_approved"];
					echo '<tr>';
						echo '<td>'.date("F j, Y",strtotime($keyGetDeliveryDateWise)).'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_manual"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_auto"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_finalize"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_approved"].'</td>';
					echo '</tr>';
				}
			echo '<tr>';
				echo '<td><b>Total</b></td>';
				echo '<td>'.$totalRequest.'</td>';
				echo '<td>'.$totalRequestManual.'</td>';
				echo '<td>'.$totalRequestAuto.'</td>';
				echo '<td>'.$totalRequestFinalize.'</td>';
				echo '<td>'.$totalRequestApproved.'</td>';
			echo '</tr>';	
					
			echo '</table>';			
	}
	function displayDeliveryDateWiseEnglish($arrDisplay)
	{
			$totalRequest = 0;
			$totalRequestManualRC = 0;
			$totalRequestManualNRC = 0;
			$totalRequestAutoRC = 0;
			$totalRequestAutoNRC = 0;
			$totalRequestFinalize = 0;
			$totalRequestApproved = 0;
			echo '<table align="center" cellpadding="4" cellspacing="1" width="60%">';			
			echo '<tr>';
				echo '<th rowspan="3">Delivery Date</th>';
				echo '<th rowspan="3">Total number of test requests</th>';
				echo '<th colspan="4">Tests pending</th>';
				echo '<th rowspan="3">Tests finalized</th>';
				echo '<th rowspan="3">Tests approved</th>';								
			echo '</tr>';	
			echo '<tr>';
				echo '<th colspan="2">Type: RC</th>';
				echo '<th colspan="2">Type: NRC</th>';
			echo '</tr>';
			echo '<tr>';
				echo '<th>Auto</th>';
				echo '<th>Manual</th>';
				echo '<th>Auto</th>';
				echo '<th>Manual</th>';
			echo '</tr>';
			foreach($arrDisplay as $keyGetDeliveryDateWise => $valueGetDeliveryDateWise)
				{
					$totalRequest = $totalRequest + $valueGetDeliveryDateWise["no_of_test"];
					$totalRequestManualRC = $totalRequestManualRC + $valueGetDeliveryDateWise["no_of_test_manual_rc"];
					$totalRequestManualNRC = $totalRequestManualNRC + $valueGetDeliveryDateWise["no_of_test_manual_nrc"];
					$totalRequestAutoRC = $totalRequestAutoRC + $valueGetDeliveryDateWise["no_of_test_auto_rc"];
					$totalRequestAutoNRC = $totalRequestAutoNRC + $valueGetDeliveryDateWise["no_of_test_auto_nrc"];
					$totalRequestFinalize = $totalRequestFinalize + $valueGetDeliveryDateWise["no_of_test_finalize"];
					$totalRequestApproved = $totalRequestApproved + $valueGetDeliveryDateWise["no_of_test_approved"];
					echo '<tr>';
						echo '<td>'.date("F j, Y",strtotime($keyGetDeliveryDateWise)).'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_auto_rc"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_manual_rc"].'</td>';						
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_auto_nrc"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_manual_nrc"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_finalize"].'</td>';
						echo '<td>'.$valueGetDeliveryDateWise["no_of_test_approved"].'</td>';
					echo '</tr>';
				}
			echo '<tr>';
				echo '<td><b>Total</b></td>';
				echo '<td>'.$totalRequest.'</td>';
				echo '<td>'.$totalRequestAutoRC.'</td>';
				echo '<td>'.$totalRequestManualRC.'</td>';
				echo '<td>'.$totalRequestAutoNRC.'</td>';				
				echo '<td>'.$totalRequestManualNRC.'</td>';				
				echo '<td>'.$totalRequestFinalize.'</td>';
				echo '<td>'.$totalRequestApproved.'</td>';
			echo '</tr>';	
					
			echo '</table>';			
	}	
	
	function displayPersonWise($arrDisplay)
	{			
			
			echo '<table align="center" cellpadding="4" cellspacing="1" width="50%">';
			echo '<tr><td colspan="5" align="center"  bgcolor="#CCCCCC"><b>Person-wise table</b></td></tr>';
			echo '<tr>';
				echo '<th rowspan="2">Person</th>';
				echo '<th colspan="3">No. of tests assembled</th>';
				echo '<th rowspan="2">No. of tests approved</th>';				
			echo '</tr>';	
			echo '<tr>';				
				echo '<th>Total</th>';
				echo '<th>Auto</th>';
				echo '<th>Manual</th>';								
			echo '</tr>';
			foreach($arrDisplay as $keyGetPersonWise => $valueGetPersonWise)
				{
					
					echo '<tr>';
						echo '<td>'.$keyGetPersonWise.'</td>';
						echo '<td>'.$valueGetPersonWise["no_of_test_assembled"].'</td>';
						echo '<td>'.$valueGetPersonWise["no_of_test_assembled_auto"].'</td>';
						echo '<td>'.$valueGetPersonWise["no_of_test_assembled_manual"].'</td>';
						echo '<td>'.$valueGetPersonWise["no_of_test_approved"].'</td>';						
					echo '</tr>';
				}			
					
			echo '</table>';			
	}	
	function displayPersonWiseEnglish($arrDisplay)
	{			
			
			echo '<table align="center" cellpadding="4" cellspacing="1" width="60%">';
			echo '<tr><td colspan="7" align="center"  bgcolor="#CCCCCC"><b>Person-wise table</b></td></tr>';
			echo '<tr>';
				echo '<th rowspan="3">Person</th>';
				echo '<th colspan="5">Tests Assembled</th>';
				echo '<th rowspan="3">Tests approved</th>';				
			echo '</tr>';	
			echo '<tr>';
				echo '<th rowspan="2">Total</th>';
				echo '<th colspan="2">Type: RC</th>';
				echo '<th colspan="2">Type: NRC</th>';				
			echo '</tr>';	
			echo '<tr>';				
				echo '<th>Auto</th>';
				echo '<th>Manual</th>';				
				echo '<th>Auto</th>';				
				echo '<th>Manual</th>';				
			echo '</tr>';
			foreach($arrDisplay as $keyGetPersonWise => $valueGetPersonWise)
				{					
					
					echo '<tr>';
						echo '<td>'.$keyGetPersonWise.'</td>';
						echo '<td>'.$valueGetPersonWise["no_of_test_assemble"].'</td>';
						echo '<td>'.$valueGetPersonWise["no_of_test_assembled_auto_rc"].'</td>';						
						echo '<td>'.$valueGetPersonWise["no_of_test_assembled_manual_rc"].'</td>';						
						echo '<td>'.$valueGetPersonWise["no_of_test_assembled_auto_nrc"].'</td>';						
						echo '<td>'.$valueGetPersonWise["no_of_test_assembled_manual_nrc"].'</td>';						
						echo '<td>'.$valueGetPersonWise["no_of_test_approved"].'</td>';						
					echo '</tr>';
				}			
					
			echo '</table>';			
	}	
	
	function displayTestAllotmentWise($arrDisplay)
	{					
			
			echo '<table align="center" cellpadding="4" cellspacing="1" width="50%">';
			echo '<tr><td colspan="4" align="center" bgcolor="#CCCCCC"><b>Test request allotment</b></td></tr>';
			echo '<tr>';
				echo '<th>Person</th>';
				echo '<th>Assemble</th>';
				echo '<th>Respond</th>';				
				echo '<th>Approve</th>';				
			echo '</tr>';	
			foreach($arrDisplay as $keyGetTestAllotmentWise => $valueGetTestAllotmentWise)
				{
					
					echo '<tr>';
						echo '<td>'.$keyGetTestAllotmentWise.'</td>';
						echo '<td>'.$valueGetTestAllotmentWise["no_of_test_assemble"].'</td>';
						echo '<td>'.$valueGetTestAllotmentWise["no_of_test_respond"].'</td>';						
						echo '<td>'.$valueGetTestAllotmentWise["no_of_test_approve"].'</td>';						
					echo '</tr>';
				}			
					
			echo '</table>';			
	}	
	function displayTestAllotmentWiseEnglish($arrDisplay)
	{		
		
		echo '<table align="center" cellpadding="4" cellspacing="1" width="60%">';
		echo '<tr><td colspan="4" align="center" bgcolor="#CCCCCC"><b>Test request allotment</b></td></tr>';
		echo '<tr>';
			echo '<th>Person</th>';
			echo '<th>Assemble</th>';
			echo '<th>Respond</th>';				
			echo '<th>Approve</th>';				
		echo '</tr>';	
		foreach($arrDisplay as $keyGetTestAllotmentWise => $valueGetTestAllotmentWise)
			{				
				
				echo '<tr>';
					echo '<td>'.$keyGetTestAllotmentWise.'</td>';
					echo '<td>'.$valueGetTestAllotmentWise["no_of_test_assemble"].'</td>';
					echo '<td>'.$valueGetTestAllotmentWise["no_of_test_respond"].'</td>';						
					echo '<td>'.$valueGetTestAllotmentWise["no_of_test_approve"].'</td>';						
				echo '</tr>';
			}		
				
		echo '</table>';	
	}
	
	##########For Status Of Paper Assembly#####################
	
	##############Check test condicted or not##################
	function checkTestConducted($connid)
	{
		$counter_set = 0;
		$query = "SELECT count(*) as counter FROM da_response c INNER JOIN da_examDetails b 
				  ON c.examcode = b.exam_code INNER JOIN da_testRequest a 
				  ON b.request_id = a.id where a.id = '$this->test_requestid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$counter_set = $row["counter"];
		}
		return $counter_set;
	}
	##############Check test condicted or not##################
	
	###################For Postporing Test#######################
	function getSchoolList($connid)
	{
		$this->setpostvars();
		$arrRet = array();
	    $query = "select t.schoolCode,s.schoolname,s.city from schools s INNER JOIN da_orderMaster t on t.schoolCode = s.schoolno				  
				  AND t.year = '$this->year'	  
				  GROUP BY s.schoolno ORDER BY s.schoolname";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrRet[$row[schoolCode]]=$row;
			}
		return 	$arrRet;
	}
	function getAllDataRelatedToOrderMaster($connid)
	{
		$arrRet = array();
		$query = "SELECT b.class,b.e,b.m,b.s FROM da_orderMaster a,da_orderBreakup b WHERE a.order_id = b.order_id AND schoolCode = '$this->searchSchool' AND year = '$this->year'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrRet[] = array("class"=>$row["class"],"e"=>$row["e"],"m"=>$row["m"],"s"=>$row["s"]);
			}
		return $arrRet;	
	}
	function getDataRelatedToRequestIdPostporn($connid)
	{
		$arrRet = array();
		if($this->action=="SearchRequestIdPosporn")
		{
			$query = "SELECT * FROM da_testRequest WHERE schoolCode = '$this->searchSchool' AND year = '$this->year' AND class = '$this->searchClass' AND subject = '$this->testSubject'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if($row["chapter_id"]!="")
				{
					if($this->testSubject==1)
					{
						if($row["id"] < 6670)
						{
							$arrChapters = array();
							$query_chapters = "SELECT name FROM  da_grammarSkillsBreakup WHERE skill_id IN(".$row["chapter_id"].")";
							$dbquery_chapters = new dbquery($query_chapters,$connid);
							while($row_chapters = $dbquery_chapters->getrowarray())
							{
								if($row_chapters["name"]!="")
								{
									$arrChapters[$row_chapters["name"]] = $row_chapters["name"]; 
								}	
							}
						}
						else 
						{
							$arrChapters = array();
							$query_chapters = "SELECT chapter_name FROM da_chapterMaster WHERE chapter_id IN(".$row["chapter_id"].")";
							$dbquery_chapters = new dbquery($query_chapters,$connid);
							while($row_chapters = $dbquery_chapters->getrowarray())
							{
								if($row_chapters["chapter_name"]!="")
								{
									$arrChapters[$row_chapters["chapter_name"]] = $row_chapters["chapter_name"]; 
								}	
							}
						}
					}
					else 
					{								
						$arrChapters = array();
						$query_chapters = "SELECT chapter_name FROM da_chapterMaster WHERE chapter_id IN(".$row["chapter_id"].")";
						$dbquery_chapters = new dbquery($query_chapters,$connid);
						while($row_chapters = $dbquery_chapters->getrowarray())
						{
							if($row_chapters["chapter_name"]!="")
							{
								$arrChapters[$row_chapters["chapter_name"]] = $row_chapters["chapter_name"]; 
							}	
						}
					}
				}
				$chapter_name = "";
				if(isset($arrChapters) && count($arrChapters)>0)
				{
					$chapter_name = implode(",",$arrChapters);
				}
				$arrRet[$row["id"]] = array("chapters"=>$chapter_name,"request_date"=>$row["request_date"],"test_date"=>$row["test_date"],"delivery_date"=>$row["delivery_date"]);
			}
		}
		return $arrRet;
	}
	function checkTestConductedForPostporn($request_id,$connid)
	{
		$counter_set = 0;
		$query = "SELECT count(*) as counter FROM da_response c INNER JOIN da_examDetails b 
				  ON c.examcode = b.exam_code INNER JOIN da_testRequest a 
				  ON b.request_id = a.id where a.id = '$request_id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$counter_set = $row["counter"];
		}
		return $counter_set;
	}
	function PageAddEditPostpon($connid)
    {
        $this->setgetvars();
        $this->setpostvars();       
                	
        if($this->action == "Save"){             
           $this->savedataPostpon($this->test_requestid,$connid);
        }
        
        $this->retrivedataPostpon($this->test_requestid,$connid);
    }
    function retrivedataPostpon($request_id,$connid){
    	
    	if($request_id == 0 )    
            return;
     	
     	$query = "SELECT * FROM da_testRequest WHERE id = ".$request_id;
     	$dbqry = new dbquery($query,$connid);       	
        if($dbqry->numrows() > 0 )
        {
            $row = $dbqry->getrowarray();
            $this->test_requestid   = $row["id"];
            $this->schoolCode = $row["schoolCode"];
            $this->class = $row["class"];
            $this->subjectno = $row["subject"];
            
            $this->request_date = $row["request_date"];
            $this->deliverBy = $row["delivery_date"];
            $this->test_date = $row["test_date"];
            if($row["chapter_id"]!="")
				{
					if($row["subject"]==1)
					{
						if($row["id"] < 6670)
						{
							$arrChapters = array();
							$query_chapters = "SELECT name FROM  da_grammarSkillsBreakup WHERE skill_id IN(".$row["chapter_id"].")";
							$dbquery_chapters = new dbquery($query_chapters,$connid);
							while($row_chapters = $dbquery_chapters->getrowarray())
							{
								if($row_chapters["name"]!="")
								{
									$arrChapters[$row_chapters["name"]] = $row_chapters["name"]; 
								}	
							}
						}
						else 
						{
							$arrChapters = array();
							$query_chapters = "SELECT chapter_name FROM da_chapterMaster WHERE chapter_id IN(".$row["chapter_id"].")";
							$dbquery_chapters = new dbquery($query_chapters,$connid);
							while($row_chapters = $dbquery_chapters->getrowarray())
							{
								if($row_chapters["chapter_name"]!="")
								{
									$arrChapters[$row_chapters["chapter_name"]] = $row_chapters["chapter_name"]; 
								}	
							}
						}
					}
					else 
					{								
						$arrChapters = array();
						$query_chapters = "SELECT chapter_name FROM da_chapterMaster WHERE chapter_id IN(".$row["chapter_id"].")";
						$dbquery_chapters = new dbquery($query_chapters,$connid);
						while($row_chapters = $dbquery_chapters->getrowarray())
						{
							if($row_chapters["chapter_name"]!="")
							{
								$arrChapters[$row_chapters["chapter_name"]] = $row_chapters["chapter_name"]; 
							}	
						}
					}
				}
            	$chapter_name = "";
				if(isset($arrChapters) && count($arrChapters)>0)
				{
					$chapter_name = implode(",",$arrChapters);
				}
				$this->chapter_name = $chapter_name;
            
        }
    }
    function savedataPostpon($requestid,$connid)
    {
    	$this->getDeliveryDate($requestid,$connid);    	
    }
    function getDeliveryDate($requestid,$connid)
    {    	
    	$arrDate = explode("-",$this->newtestdate);
		$date = $arrDate[2]."-".$arrDate[1]."-".$arrDate[0];		

		# Start of delivery date calculations
		$paper_courier_flag = 0;
		
		$subject_set = "";
    	$class_set = "";
    	$schoolCode_set = "";
    	$chapter_id_set = "";
    	$schoolName_set = "";
		
		$query = "SELECT c.schoolname,a.schoolCode,a.class,a.chapter_id,a.subject,b.is_e_courier,b.is_m_courier,b.is_s_courier,b.exam_mode  
				  FROM schools c, da_testRequest a, da_orderMaster b
				  WHERE b.schoolCode = a.schoolCode AND a.year = b.year AND b.schoolCode = c.schoolno AND a.id = '".$requestid."'";
		
		$dbquery = new dbquery($query,$connid);
		
		while($row = $dbquery->getrowarray()) {
			
			if($row["subject"] == 1)
				$paper_courier_flag = $row['is_e_courier'];
			else if($row["subject"] == 2)
				$paper_courier_flag = $row['is_m_courier'];
			else if($row["subject"] == 3)
				$paper_courier_flag = $row['is_s_courier'];
			else 
				$paper_courier_flag = 0;
			
			$exam_mode = $row["exam_mode"];
			
			$subject_set = $row["subject"];			
			$class_set = $row["class"];
			$schoolCode_set = $row["schoolCode"];
			$chapter_id_set = $row["chapter_id"];	
			$schoolName_set = $row["schoolname"];			
		}
		
		if($paper_courier_flag==1 && ($exam_mode == "comprehensive" || $exam_mode == "mobile")) // tablet & mobile Paper printed by sessashai
		{
			$query = "SELECT
						IF(
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Friday' 
						  OR 
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Saturday' 
						  OR 
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Sunday',
						IF(
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Saturday'  OR 
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Friday',
						  DATE_FORMAT(DATE_SUB('$date',INTERVAL 9 DAY),'%Y-%m-%d'),
						IF(
						  DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) = 'Sunday',
						  DATE_FORMAT(DATE_SUB('$date',INTERVAL 10 DAY),'%Y-%m-%d'),
						  DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')
						)),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 8 DAY),'%Y-%m-%d')) as delivered_by";
			
		}
		else if($paper_courier_flag==0 && $exam_mode == "comprehensive"){ // tablet but paper not printed by sessashai
			
			$query = "SELECT
						IF(
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Friday'
							OR   
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Saturday'  
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Sunday',
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 5 DAY),'%Y-%m-%d'),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) as delivered_by";
		}
		else if($paper_courier_flag==0 && $exam_mode == "mobile"){
			
			$query = "SELECT
						IF(
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Monday'  
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Sunday'
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Saturday'
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 3 DAY),'%Y-%m-%d')) = 'Friday',
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 6 DAY),'%Y-%m-%d'),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 4 DAY),'%Y-%m-%d')) as delivered_by";
		}
		else 
		{
			$query = "SELECT
						IF(
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 2 DAY),'%Y-%m-%d')) = 'Saturday'  
							OR  
							DAYNAME(DATE_FORMAT(DATE_SUB('$date',INTERVAL 2 DAY),'%Y-%m-%d')) = 'Sunday',
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 4 DAY),'%Y-%m-%d'),
						DATE_FORMAT(DATE_SUB('$date',INTERVAL 2 DAY),'%Y-%m-%d')) as delivered_by";
		}
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$delivery_date = $row[0];
		# end of delivery date calculations
		
		# View & Drop link End date Calculations
		if($exam_mode == "comprehensive" || $exam_mode == "mobile"){
			$drop_end_dt_query = "SELECT 
								    IF(
										DAYNAME('$delivery_date') = 'Friday',
										DATE_FORMAT(DATE_ADD('$delivery_date',INTERVAL 3 DAY),'%Y-%m-%d'),
										DATE_FORMAT(DATE_ADD('$delivery_date',INTERVAL 1 DAY),'%Y-%m-%d')
									) as dropenddate";
			
			$drop_end_dt_dbqry = new dbquery($drop_end_dt_query,$connid);
			$drop_end_dt_row = $drop_end_dt_dbqry->getrowarray();
			$drop_end_dt = $drop_end_dt_row["dropenddate"];
		} else {
			$drop_end_dt_query = "SELECT DATE_FORMAT(DATE_SUB('$date',INTERVAL 1 DAY),'%Y-%m-%d') as dropenddate";
			$drop_end_dt_dbqry = new dbquery($drop_end_dt_query,$connid);
			$drop_end_dt_row = $drop_end_dt_dbqry->getrowarray();
			$drop_end_dt = $drop_end_dt_row["dropenddate"];
		}

		$comment_get_text = "";
		$query_comment_get_text = "SELECT comments FROM da_testRequest WHERE id  = '".$requestid."'";
		$dbquery_comment_get_text = new dbquery($query_comment_get_text,$connid);
		while($row_comment_get_text = $dbquery_comment_get_text->getrowarray()) {
			$comment_get_text = $row_comment_get_text["comments"];
		}
		
		if($comment_get_text!=""){
			if($this->comments!=""){
				$comment_get_text = $comment_get_text."<br/>".$_SESSION["username"].": ".$this->comments."<br/>";
			}	
		}
		else {
			$comment_get_text = $_SESSION["username"].": ".$this->comments."<br/>";
		}
		
		$this->saveRequestLog($connid);
		$query = "UPDATE da_testRequest SET delivery_date = '".$delivery_date."',drop_end_date = '".$drop_end_dt."',test_date = '".$date."',comments = '".$comment_get_text."' WHERE id = '".$requestid."' ";
		$dbquery = new dbquery($query,$connid);					
		if($dbquery->affectedrows()>0){
			$this->ContentForTestDateChanges($requestid,$this->comments,$_SESSION["username"],$subject_set,$class_set,$schoolCode_set,$chapter_id_set,$schoolName_set,$connid);
		}	
    }
    
    function ContentForTestDateChanges($request_id,$comment_get_text,$user_changed_name,$subject,$class,$schoolCode,$chapter_id,$schoolName,$connid)
    {    	
    	global $arrSubject;
    	$chapter_name = "";
    	$fullname = "";
    	$email_user_changer = "";
    	$html = "";
    	$asmArray = array();
		$srmArray = array();
		$pimArray = array();
		$main_array = array();
		$to = array();
		$cc = array();
		$user_name = "";
		$subject = $arrSubject[$subject];
		if($user_changed_name!=""){
			$main_array[] =  "'".$user_changed_name."'";
		}	
		
		$arrChapters = array();
	 	$query_chapters = "SELECT chapter_name FROM da_chapterMaster WHERE chapter_id IN($chapter_id)";
	 	$dbquery_chapters = new dbquery($query_chapters,$connid);
		while($row_chapters = $dbquery_chapters->getrowarray()){
			$arrChapters[$row_chapters["chapter_name"]] = $row_chapters["chapter_name"];
		}
		
		if(isset($arrChapters) && count($arrChapters)>0){
			$chapter_name = implode(",",$arrChapters);
		}
		
		$query_mail_fetcher = "SELECT DISTINCT ts,ps,schoolCode,product FROM sales_allotment_master WHERE schoolCode = '".$schoolCode."'";
		$dbquery_mail_fetcher = new dbquery($query_mail_fetcher,$connid);
		while($row_mail_fetcher = $dbquery_mail_fetcher->getrowarray()){			
			if($row_mail_fetcher['ps']!="" && $row_mail_fetcher['product']=="asset") { $asmArray[] = "'".$row_mail_fetcher['ps']."'";$main_array[] = "'".$row_mail_fetcher['ps']."'"; }
			else if($row_mail_fetcher['ps']!='' && $row_mail_fetcher['product']=="da") { $srmArray[] = "'".$row_mail_fetcher['ps']."'";$main_array[] = "'".$row_mail_fetcher['ps']."'"; }
						
			if($row_mail_fetcher['ts']!='' && !in_array($row_mail_fetcher['ps'],$pimArray)) { $pimArray[] = "'".$row_mail_fetcher['ts']."'";$main_array[] = "'".$row_mail_fetcher['ts']."'"; }
		}
				
		$cc[] = "shaji.chacko@ei-india.com";
		$cc[] = "urmila@ei-india.com";
		$cc[] = "rahul.venuraj@ei-india.com";
		$cc[] = "sindhu.deshmukh@ei-india.com";
				
		if(isset($main_array) && count($main_array)>0){			
			$user_name = implode(",",$main_array);			
			$query_fetch_email = "SELECT name,fullname,email FROM marketing WHERE name IN (".$user_name.")";
			$dbquery_fetch_email = new dbquery($query_fetch_email,$connid);
			while($row_fetch_email = $dbquery_fetch_email->getrowarray())
			{
				if($row_fetch_email["name"] == $user_changed_name)
				{
					$fullname = $row_fetch_email["fullname"];
					$email_user_changer = $row_fetch_email["email"];						
				}	
				$to[] = $row_fetch_email["email"];
			}			
		}			
		
		$html .= "<div>Dear all</div><br/>";
		$html .= "<div>Please note that the test date of the following test has been changed.</div><br/>";
		$html .= "<div><b>School: </b>$schoolName ($schoolCode)</div>";
		$html .= "<div><b>Subject: </b>$subject</div>";
		$html .= "<div><b>Class: </b>$class</div>";
		$html .= "<div><b>Request ID: </b>$request_id</div>";
		$html .= "<div><b>Chapters: </b>$chapter_name</div><br/>";
		$html .= "<div><b>Old Test Date: </b>$this->test_date</div>";
		$html .= "<div><b>New Test Date: </b>$this->newtestdate</div>";
		$html .= "<div><b>Changed by: </b>$fullname</div>";
		$html .= "<div><b>Reason for postponing: </b>$comment_get_text</div><br/>";				
				
		$subject = "Change Test Date";
		$to_send = "";
		$cc_send = "";
		
		if(isset($to) && count($to)>0)
		{
			$to_send = implode(",",$to);
		}
		if(isset($cc) && count($cc)>0)
		{
			$cc_send = implode(",",$cc);
		}
		$recipient["to"]=$to_send;
		$recipient["cc"]=$cc_send;
		$recipient["from"] = "Detailed Assessment<da@ei-india.com>";		
		$this->sendMailForTestDateChange($recipient,$subject,$html);	
    }
    
    function sendMailForTestDateChange($recipient,$subject,$message) {
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}
		
		$to=$recipient[to];
		$from=$recipient['from'];
		$cc=$recipient[cc];
		$bcc=$recipient[bcc];
		$reply_to=$recipient[reply_to];
		
		$mail_content='<html>
		<head>
		  <title>Mail</title>
		</head>
		<body>';	
		$mail_content.=$message;
		$mail_content.='</body></html>';
		
		$mail_content=wordwrap($mail_content,70,$eol);
	
		$headers = "From: $from $eol";
		if($cc!="") $headers .= "cc: $cc $eol";
		if($bcc!="") $headers .= "Bcc: $bcc $eol";
		if($reply_to!="") $headers .= "Reply-To: $reply_to $eol";
		$headers .= "MIME-Version: 1.0 $eol";		
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";			
		mail($to,$subject,$mail_content,$headers);
	}

    
	###################For Postporing Test#######################
	
	###################For Dropped Question######################
	function getDroppedQcodeDetails($qcode_list,$request_id,$connid)
	{
		$arrRet = array();
		$arrQcode = explode(",",$qcode_list);
		foreach($arrQcode as $keyQcode => $valueQcode)
		{
			$reason_id_set = 0;
			$other_reason = "";
			$query = "SELECT reason_id,other_reason FROM da_dropQuestions WHERE request_id = '$request_id' AND qcode = '$valueQcode'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$reason_id_set = $row["reason_id"];
				if($reason_id_set==5)
				{
					$other_reason = $row["other_reason"];
				}
			}
			
			$arrRet[$valueQcode] = array("reason_id"=>$reason_id_set,"other_reason"=>$other_reason);
		}
		return $arrRet;
	}
	
	function getDroppedQuestionListOfTestRequest($connid)
	{
		$qcode_list = "";
		$query = "SELECT dropped_questions FROM da_testRequest WHERE id = '$this->test_requestid'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$qcode_list = $row["dropped_questions"];
		}
		return $qcode_list;
	}
	###################For Dropped Question######################
	
	######################Repeated Reporting Heads#######################
	function getRepeatedReportingIdHighlight($connid)
	{
		$dbqueryD = $this->getTestReportingDetails($connid);
		$arrRet = array();
		$arrMakeSSTList = array();
		while($rowGetNew = $dbqueryD->getrowarray())
		{
			$arrGetSST = explode(",",$rowGetNew["sst_list"]);
			foreach($arrGetSST as $keyGetSST => $valueGetSST)
			{
				$arrMakeSSTList[$rowGetNew["reporting_id"]][] = $valueGetSST;
			}
		}
		$arrCheck = array();
		$arrMakeCheck = array();
		if(isset($arrMakeSSTList) && count($arrMakeSSTList)>0)
		{
			foreach($arrMakeSSTList as $keyMakeSSTList => $valueMakeSSTList)
			{
				foreach($valueMakeSSTList as $keyMakeSSTList1 => $valueMakeSSTList)
				{
					if(in_array($valueMakeSSTList,$arrCheck))
					{
						$arrMakeCheck[$valueMakeSSTList] = $valueMakeSSTList; 
					}
					$arrCheck[$valueMakeSSTList] = $valueMakeSSTList;
				} 
			}
		}
		
		foreach($arrMakeSSTList as $keyMakeSSTList => $valueMakeSSTList)
			{
				foreach($valueMakeSSTList as $keyMakeSSTList1 => $valueMakeSSTList)
				{
				    if(in_array($valueMakeSSTList,$arrMakeCheck))
				    {
				    	$arrRet[$keyMakeSSTList] = $keyMakeSSTList;
				    }
				}
			}			
		return $arrRet;
			
	}
	######################Repeated Reporting Heads#######################
	
	function FindGenericComment($test_requestid,$connid){
		
		$generic_comment_flag = "N";
		
		$query = "SELECT da_genericComments.id, da_genericComments.schoolCode, da_genericComments.comments
				  FROM da_genericComments
				  LEFT JOIN da_testRequest ON da_genericComments.schoolCode  = da_testRequest.schoolCode
				  						   AND da_genericComments.subjectno = da_testRequest.subject
										   AND da_genericComments.year = da_testRequest.year
				  WHERE da_testRequest.id = '$test_requestid'";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() > 0){
			while ($row = $dbquery->getrowarray()){
				if ($row['comments'] != "")
					$generic_comment_flag = "Y";
			}
		}
		return $generic_comment_flag;
	}
	
	# function to check generic or teacher comments exits or not
	function GetGenericOrTeacherCommentsFlag($request_id,$connid){
		
		$return_flag = "N";
		if($request_id == "") return "";
		
		$query = "SELECT da_testRequest.id,da_testRequest.teacher_comments,da_genericComments.comments AS genericcomments
				  FROM da_testRequest
				  LEFT JOIN da_genericComments ON da_testRequest.schoolCode  = da_genericComments.schoolCode
								AND da_testRequest.subject = da_genericComments.subjectno
								AND da_testRequest.year = da_genericComments.year
				  WHERE da_testRequest.id = '".$request_id."'";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			if($result["teacher_comments"] != "" || $result["genericcomments"] != "")
				$return_flag = "Y";
		}
		return $return_flag;
	}
	
	
	######################Related to mou flag set #######################
	function getMouFlag($year,$schoolCode,$connid)
	{
		$mou_flag = 0;
		$query = "SELECT mou_received FROM da_orderMaster WHERE year = '$year' AND schoolCode = '$schoolCode'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$mou_flag = $row["mou_received"];
		}
		return $mou_flag;
	}
	######################Related to mou flag set #######################
	
	#####################Check For Conditions############################
	function checkConditions($paper_code,$qcodePaperList,$connid,$generalTotalQuestionRequired="",$teacher_comment="")
	{
		$arrQcodes = explode(",",$qcodePaperList);
		
		##################Misconception List##################
		$counter_mc = 0;
        if(empty($qcodePaperList)){
            $qcodePaperList = "''";
        }
		$query = "SELECT count(*) as cnt FROM da_questions WHERE qcode IN($qcodePaperList) AND misconception = 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$counter_mc = $row["cnt"];
		}
		if($counter_mc<4)
		{
			$this->englishConditionCheckFlag = "N";
			$this->englishConditionCheckFlagArr[2] = 2;
		}
		##################Misconception List##################
		
		##################Checking Qcode Required Board Wise####################
		if($generalTotalQuestionRequired != count($arrQcodes))
		{
			$this->englishConditionCheckFlag = "N";
			$this->englishConditionCheckFlagArr[3] = 3;
		}
		##################Checking Qcode Required Board Wise####################
		
		##################Check Generic/Teacher Comment###################		
		if($teacher_comment!="")
		{
			$this->englishConditionCheckFlag = "N";
			$this->englishConditionCheckFlagArr[6] = 6;
		}
		$generic_comment = "N";
		$generic_comment = $this->FindGenericComment($this->test_requestid,$connid);
		if($generic_comment!="N")
		{
			$this->englishConditionCheckFlag = "N";
			$this->englishConditionCheckFlagArr[6] = 6;
		}
		##################Check Generic/Teacher Comment###################
		
		# Checking questions are new or previously used
		/*$new_ques_flag = 0;
		$new_ques_query = "SELECT GROUP_CONCAT(qcode) as newqcodelist FROM da_questions WHERE qcode IN(".$qcodePaperList.") AND school_usage = 0";
		$new_ques_dbqry = new dbquery($new_ques_query,$connid);
		if($new_ques_dbqry->numrows() > 0){
			$new_ques_result = $new_ques_dbqry->getrowarray();
			$new_qcodelist = $new_ques_result["newqcodelist"];
			if($new_qcodelist != ""){
				$this->englishConditionCheckFlag = "N";
				$this->englishConditionCheckFlagArr[8] = 8;
			}
		}*/
        $secondApprovedQuery = "SELECT qcode, approver2_status FROM da_questions"
                . " WHERE qcode IN(".$qcodePaperList.")";       
        $dbquery->executequery($secondApprovedQuery);
        while($question = $dbquery->getrowassocarray())
		{
            if($question['approver2_status'] == '0'){
                $this->englishConditionCheckFlag = "N";
                $this->englishConditionCheckFlagArr[8] = 8;
                break;
            }            
		}
		$this->commonForReportingHeadChecking($paper_code,$connid);		
	}
	
	function commonForReportingHeadChecking($paper_code,$connid,$reporting_id_pass="")
	{
		##################Check Reporting Head Check###################
		$condition = "";
		if($reporting_id_pass!="")
		{
			$condition .= " AND reporting_id='$reporting_id_pass'";
		}
		
		$query_reporting_head = "SELECT * FROM da_reportingDetails WHERE papercode = '$paper_code'$condition";		
		$dbquery_reporting_head = new dbquery($query_reporting_head,$connid);
		while($row_reporting_head = $dbquery_reporting_head->getrowarray())
		{			
            $arrQcodesRH = array();
            $arrQcodesRH = explode(",",$row_reporting_head["qcode_list"]);			
            if(isset($arrQcodesRH) && count($arrQcodesRH)>0)
            {
                $count_rh = count($arrQcodesRH);
                if($count_rh < 3)
                {
                    $this->englishConditionCheckFlag = "N";
                    $this->englishConditionCheckFlagArr[7] = 7;
                }	
                if($row_reporting_head["reporting_head"] != "Reading Comprehension")
                {
                    $arrMasterQcodes = array();
                    foreach($arrQcodesRH as $keyQcodesRH => $valueQcodesRH)
                    {
                        $query_select = "SELECT optiona,optionb,optionc,optiond,correct_answer FROM da_questions WHERE qcode = '$valueQcodesRH'";
                        $dbquery_select = new dbquery($query_select,$connid);
                        while($row_select = $dbquery_select->getrowarray())
                        {
                            $string_make = "option".strtolower($row_select["correct_answer"]);
                            $arrMasterQcodes[$valueQcodesRH] = $row_select[$string_make]; 							
                        }
                    }
                    foreach($arrMasterQcodes as $keyMasterQcodes_main => $valueMasterQcodes_main)
                    {
                        $answer_check = $valueMasterQcodes_main;			
                        foreach($arrMasterQcodes as $keyMasterQcodes => $valueMasterQcodes)
                        {
                            if($keyMasterQcodes_main != $keyMasterQcodes)
                            {
                                //if(strtolower(trim($answer_check)) == strtolower(trim($valueMasterQcodes)))
                                if(strtolower(trim(html_entity_decode(preg_replace("/[^a-zA-Z0-9]/","",$answer_check)))) == strtolower(trim(html_entity_decode(preg_replace("/[^a-zA-Z0-9]/","",$valueMasterQcodes)))))
                                {
                                    $this->englishConditionCheckFlag = "N";
                                    $this->englishConditionCheckFlagArr[5] = 5;													
                                    $query_set_reportingHead = "UPDATE da_reportingDetails set same_ans_que_flag = '1' WHERE reporting_id = '$row_reporting_head[reporting_id]'";														
                                    $dbquery_set_reportingHead = new dbquery($query_set_reportingHead,$connid);
                                }																							
                            }	
                        }
                    }
                }		
            }	
        }				
		##################Check Reporting Head Check###################
	}
	
	function checkFlagForConditions($id,$connid)
	{
		$check_flag = 0; 
		$query = "SELECT autoreport_flag FROM da_autoReport where request_id = '$id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$check_flag = $row["autoreport_flag"];
		}
		return $check_flag;
	}
	function getDataFromAutoReport($request_id,$connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM da_autoReport where request_id = '$request_id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[1] = $arrRet[2] = $arrRet[3] = $arrRet[4] = $arrRet[5] = $arrRet[6] = $arrRet[7] = 0;
			if($row["repeat_ques_flag"]==1)
			{
				$arrRet[1] = 1;
			}	
			if($row["meri_flag"]==1)
			{
				$arrRet[2] = 1;
			}	
			if($row["enough_ques_flag"]==1)
			{
				$arrRet[3] = 1;
			}	
			if($row["approved_imgs_flag"]==1)
			{
				$arrRet[4] = 1;
			}	
			if($row["same_ans_que_flag"]==1)
			{
				$arrRet[5] = 1;
			}	
			if($row["gen_teacher_comm_flag"]==1)
			{
				$arrRet[6] = 1;
			}	
			if($row["morethan_3ques_flag"]==1)
			{
				$arrRet[7] = 1;
			}
			if($row["new_ques_flag"]==1)
			{
				$arrRet[8] = 1;
			}	
		}
		return $arrRet;
	}	
	#####################Check For Conditions############################
	
	
	######################Same Ansewer replacemenr process################
	function autoCheckforSameAnswer($paper_code,$connid)
	{
		$arrMasterArray = array();
		$condition_check = 0;
		$query_reporting_head = "SELECT * FROM da_reportingDetails WHERE papercode = '$paper_code'";		
		$dbquery_reporting_head = new dbquery($query_reporting_head,$connid);
		while($row_reporting_head = $dbquery_reporting_head->getrowarray())
		{
			
				$arrQcodesRH = array();
				$arrQcodesRH = explode(",",$row_reporting_head["qcode_list"]);			
				if(isset($arrQcodesRH) && count($arrQcodesRH)>0)
				{						
					if($row_reporting_head["reporting_head"]!="Reading Comprehension")
					{
						$arrMasterQcodes = array();
						foreach($arrQcodesRH as $keyQcodesRH => $valueQcodesRH)
						{
							$query_select = "SELECT optiona,optionb,optionc,optiond,correct_answer FROM da_questions WHERE qcode = '$valueQcodesRH'";
							$dbquery_select = new dbquery($query_select,$connid);
							while($row_select = $dbquery_select->getrowarray())
							{
								$string_make = "option".strtolower($row_select["correct_answer"]);
								$arrMasterQcodes[$valueQcodesRH] = $row_select[$string_make]; 							
							}
						}
						
                        foreach($arrMasterQcodes as $keyMasterQcodes_main => $valueMasterQcodes_main)
                        {

                                $answer_check = $valueMasterQcodes_main;			
                                foreach($arrMasterQcodes as $keyMasterQcodes => $valueMasterQcodes)
                                {
                                    if($keyMasterQcodes_main!=$keyMasterQcodes)
                                    {

                                            if(strtolower(trim($answer_check)) == strtolower(trim($valueMasterQcodes)))
                                            {
                                                $arrMasterArray[$row_reporting_head["reporting_id"]][$keyMasterQcodes_main] = $keyMasterQcodes_main;
                                            }																							
                                    }	
                                }

                        }
					}		
				}	
			}
			return $arrMasterArray;
	}
	######################Same Ansewer replacemenr process################
	
	// Changed parameters for get blueprint data based on school, class, subject and year combination
	###########################Check Count Of Question Required#########################
	function checkExactlyCountRequired($schoolcode,$class,$subject,$year,$connid)
	{
		$condition = "";
		if($this->subjectno == 1)
		{
			if($this->paperType==1 || $this->paperType==2  || $this->paperType==6)
			{
				$condition .= " AND da_autoSchoolBluePrint.paper_type = 2";
			}
			else 
			{
				$condition .= " AND da_autoSchoolBluePrint.paper_type = 1";
			}			
		}
		$arrRet = array();	
		$query  ="SELECT year, no_of_questions,exactly FROM da_autoSchoolBluePrint WHERE schoolCode= '".$schoolcode."' 
					AND class ='".$class."' AND subject ='".$subject."' AND year ='".$year."' $condition ";
	
		error_log($query);
        $dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet["year"] =$row["year"];
			$arrRet["no_of_questions"] = $row["no_of_questions"];
			$arrRet["count"] = $row["no_of_questions"];
			$arrRet["exactly"] = $row["exactly"];
		}
		return $arrRet;
	}
	###########################Check Count Of Question Required#########################
	
	########################Checking For revision chapters##########################
	function getRevisionChapters($check_schoolCode,$check_year,$connid)
	{
		$arrRet = array();
		$query = "SELECT chapter_id FROM da_testRequest WHERE schoolCode = '$check_schoolCode' AND year='$check_year' AND type='actual' AND status = 'Approved'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$chapterArr = explode(",",$row["chapter_id"]);
			if(isset($chapterArr) && count($chapterArr)>0)
			{
				foreach($chapterArr as $keyArr => $valueArr)
				{
					$arrRet[] = $valueArr;
				}
			}
		}
		return array_unique($arrRet);
	}
	
	function changeForRevisionTest($connid)
	{
		$query = "DELETE FROM da_questionSelectionSummary WHERE request_id = '$this->test_requestid'";
		$dbquery = new dbquery($query,$connid);
		
		$query_update = "UPDATE da_testRequest SET flag = 'Manual',auto_type='0' WHERE id = '$this->test_requestid'";
		$dbquery_update = new dbquery($query_update,$connid);
	}
	
	########################Checking For revision chapters##########################
	
	#########################Check For update######################### 
	function updateProcessStatusFlag($connid)
	{
		$request_id = "";
		$request_id = $this->test_requestid; 
		if($this->action == "AddToTest")
		{
			$query_id = "SELECT id FROM da_testRequest WHERE paper_code = '$this->papercode'";			
			$dbquery_id = new dbquery($query_id,$connid);
			while($row_id = $dbquery_id->getrowarray())
			{
				$request_id = $row_id["id"];
			}
		}
		
		$query = "UPDATE da_testRequest SET progress_status = '1' WHERE id = '$request_id'";
		$dbquery = new dbquery($query,$connid);
	}	
	#########################Check For update######################### 
	
	###############################For process of chapter removal and set of chapters############################## 	
	function setForChaptersNotUsed($test_requestid,$connid)
	{
		$query = "SELECT a.qcode_list,b.id,b.chapter_id FROM da_paperDetails a,da_testRequest b WHERE a.papercode = b.paper_code AND  subject = '1' AND a.version = '1'  AND b.id = '$test_requestid'";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray())
		{
			$request_id = "";
			$chapter_id = "";
			$arrQuestions = array();
			$arrChapters = array();
			$arrChapterFinal = array();
			$arrSSTMapped = array();
			$arrChapterFinal = array();
			$request_id = $result["id"];
			$chapter_id = $result["chapter_id"];
			if($result["qcode_list"]!="")
			{
				$arrQuestions = explode(",",$result["qcode_list"]);
				$arrChapters = explode(",",$result["chapter_id"]);				
				if($chapter_id!="")
				{			
					$query_chapter_sst = "SELECT subsubtopic_code,chapter_id FROM da_tbChapterMapping WHERE chapter_id IN($chapter_id)";
					$dbqry_chapter_sst = new dbquery($query_chapter_sst,$connid);
					while($result_chapter_sst = $dbqry_chapter_sst->getrowarray())
					{
						$arrSSTMapped[$result_chapter_sst["chapter_id"]] = $result_chapter_sst["subsubtopic_code"];
					}								
					
					foreach($arrQuestions as $keyQuestions => $valueQuestions)
					{
						$sub_subtopic_code_questions = "";
						
						$query_sst = "SELECT sub_subtopic_code FROM da_questions WHERE qcode = '$valueQuestions'";
						$dbqry_sst = new dbquery($query_sst,$connid);
						while($result_sst = $dbqry_sst->getrowarray())
						{
							$sub_subtopic_code_questions = $result_sst["sub_subtopic_code"];
						}		
						if(in_array($sub_subtopic_code_questions,$arrSSTMapped))
						{
							$key = "";
							$key = array_search($sub_subtopic_code_questions,$arrSSTMapped);
							$arrChapterFinal[$key] = $key;
						}
						
					}								    
					
				    $arrDeleteChapters = array();
				    $arrChapterFinalKeys = array();
				    $arrChapterFinalKeys = array_keys($arrChapterFinal);
				    
				    /*$chapter_to_update = "";
				    $chapter_to_update = implode(",",$arrChapterFinalKeys);				    					    */
				    
				    foreach($arrChapters as $keyChapters => $valueChapters)
				    {	
				    	if(!(in_array($valueChapters,$arrChapterFinalKeys)))
				    	{
				    		$arrDeleteChapters[$valueChapters] = $valueChapters;
				    	} 
				    	else 
				    	{
				    		$arrNewChapters[$valueChapters] = $valueChapters;
				    	}  	
				    }   
				    
				    $chapter_to_update = "";
				    $chapter_to_update = implode(",",$arrNewChapters);  
				    
				  if(isset($arrDeleteChapters) && count($arrDeleteChapters)>0)
				   {					  
					  if($chapter_to_update!="")
					  {
					  	   $query_update = "UPDATE da_testRequest set chapter_id = '$chapter_to_update',last_modified=last_modified WHERE id = '$request_id'";
						   $dbqry_update = new dbquery($query_update,$connid);
						   
						   foreach($arrDeleteChapters as $keyDeleteChapters => $valueDeleteChapters)
						   {
						   		$quey_delete = "DELETE FROM da_questionSelectionSummary WHERE request_id = '$request_id' AND chapter_id = '$valueDeleteChapters'";
						   		$dbqry_delete = new dbquery($quey_delete,$connid);
						   }
					  }   
				   }  
				}
			}
		}	
	}
	###############################For process of chapter removal and set of chapters############################## 
	function CheckAutoApproveConditions($requestid,$connid){
		
		if($requestid == "") return;
		$autoreport_flag = 0;
		
		$query = "SELECT da_testRequest.id,da_genericComments.comments,da_paperDetails.qcode_list,da_testRequest.chapter_id,da_testRequest.paper_code
				  FROM da_testRequest 
				  LEFT JOIN da_paperDetails ON da_testRequest.paper_code = da_paperDetails.papercode AND da_paperDetails.version = 1
				  LEFT JOIN da_genericComments ON da_testRequest.schoolCode = da_genericComments.schoolCode 
				  		AND da_testRequest.subject = da_genericComments.subjectno
				  		AND da_testRequest.year = da_genericComments.year
				  WHERE da_testRequest.id = '".$requestid."'";
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray();
		
		$qcode_list = $result["qcode_list"];
		$genericComments = trim($result["comments"]);
		$papercode = $result["paper_code"];
		$chapter_ids = $result["chapter_id"];
		
		if($papercode != "" && $qcode_list != ""){
		
			# Checking generic comments attached with the paper or not
			$gen_teacher_comm_flag = 0;
			if($genericComments != "") $gen_teacher_comm_flag =1 ;
			
			# Checking Total questions in the paper
			$enough_ques_flag = 0;
			$totalQuestion = count(explode(",",$qcode_list));
			if($totalQuestion < 20) $enough_ques_flag =1;
			
			# Checking enough MC questions available or not in paper.It should be 3
			$meri_flag = 0;
			$totalmcQues = 0;
			$query1 = "SELECT COUNT(*) AS totalmcques FROM da_questions WHERE qcode IN(".$qcode_list.") AND misconception = 1";
			$dbqry1 = new dbquery($query1,$connid);
			while($result1 = $dbqry1->getrowarray()){
				$totalmcQues = $result1["totalmcques"];
			}
			if($totalmcQues < 3) $meri_flag = 1;
			
			# Checking Reporting Head wise Question Count : It should be atleast 3 per RH
			$enough_ques_rh_flag = 0;
			$query2 = "SELECT reporting_id,qcode_list FROM da_reportingDetails WHERE papercode = '".$papercode."'";
			$dbqry2 = new dbquery($query2,$connid);
			while($result2 = $dbqry2->getrowarray()){
				
				$RHwiseQcodes = count(explode(",",$result2["qcode_list"]));
				if($RHwiseQcodes < 3) {
					$enough_ques_rh_flag = 1; break;
				}
			}
			
			# Checking for Thin Chapters present or not in paper
			$thin_chapter_flag = 0;
			$query3 = "SELECT COUNT(*) AS thinchapters FROM da_chapterMaster WHERE chapter_id IN($chapter_ids) AND thin_chapter != 0";
			$dbqry3 = new dbquery($query3,$connid);
			$result3 = $dbqry3->getrowarray();
			$thinChapters = $result3["thinchapters"];
			if($thinChapters > 0) $thin_chapter_flag =1;
			
			# Checking all images are approved && Direct Questions Repeated should be 0 also chapter with no questions should be checked
			$direct_qcodelist = "";
			$unapproved_images_qcodelist = "";
			$approved_imgs_flag = 0;
			$direct_ques_flag = 0;
			$chapter_with_no_ques_flag = 0;
			$query4 = "SELECT  unique_repeated_qcode_list,unapproved_image_qcode_list,qcode_all_list FROM da_questionSelectionSummary WHERE request_id = '".$requestid."'";
			$dbqry4 = new dbquery($query4,$connid);
			while($result4 = $dbqry4->getrowarray()){
				
				if($result4["unique_repeated_qcode_list"] != "")
					$direct_qcodelist .= $result4["unique_repeated_qcode_list"].",";
				if($result4["unapproved_image_qcode_list"] != "")
					$unapproved_images_qcodelist .= $result4["unapproved_image_qcode_list"].",";
				if($result4["qcode_all_list"] == "")
					$chapter_with_no_ques_flag = 1;
			}
			
			if(rtrim($direct_qcodelist) != "") $direct_ques_flag = 1;
			if(rtrim($unapproved_images_qcodelist) != "") $approved_imgs_flag = 1;
			
			# Checking questions dropped from reporting head or not from best fit request id
			$dropques_frm_bestfit_flag = 0;
			
			# Checking questions are new or previously used
			$new_ques_flag = 0;
			$new_ques_query = "SELECT GROUP_CONCAT(qcode) as newqcodelist FROM da_questions WHERE qcode IN(".$qcode_list.") AND school_usage = 0";
			$new_ques_dbqry = new dbquery($new_ques_query,$connid);
			if($new_ques_dbqry->numrows() > 0){
				$new_ques_result = $new_ques_dbqry->getrowarray();
				$new_qcodelist = $new_ques_result["newqcodelist"];
				if($new_qcodelist != "")
					$new_ques_flag = 1;
			}
			
			// flag to text book mapped to single school
			$textBook_SingleFlag =$this->checkTextBookMappedSchool($requestid,$connid);

			if($meri_flag == 1 || $enough_ques_flag == 1 || $approved_imgs_flag == 1 || $gen_teacher_comm_flag == 1 || $enough_ques_rh_flag == 1 ||
			   $thin_chapter_flag == 1 || $dropques_frm_bestfit_flag == 1 || $chapter_with_no_ques_flag == 1 || $new_ques_flag == 1 || $textBook_SingleFlag == 1){
				$autoreport_flag = 1;
			}

			# Inserting Details in Auto Report Table
			$insert_query = "INSERT INTO da_autoReport (request_id,meri_flag,enough_ques_flag,approved_imgs_flag,gen_teacher_comm_flag,morethan_3ques_flag,
													    thin_chapter_flag,dropques_frm_bestfit_flag,direct_ques_flag,chapter_with_no_ques_flag,new_ques_flag,
													    autoreport_flag,txtbook_SchoolFlag,insert_dt)
							 VALUES ($requestid,$meri_flag,$enough_ques_flag,$approved_imgs_flag,$gen_teacher_comm_flag,$enough_ques_rh_flag,
							 		 $thin_chapter_flag,$dropques_frm_bestfit_flag,$direct_ques_flag,$chapter_with_no_ques_flag,$new_ques_flag,
							 		 $autoreport_flag,$textBook_SingleFlag,NOW())";
			$insert_dbqry = new dbquery($insert_query,$connid);
		}
	}
	
	function GetMathsScienceAutoReportData($request_id,$connid){
		
		if($request_id == 0) return ;
		$arrRet = array();
		
		$query = "SELECT request_id,gen_teacher_comm_flag,meri_flag,direct_ques_flag,approved_imgs_flag,enough_ques_flag,
						 morethan_3ques_flag,thin_chapter_flag,chapter_with_no_ques_flag,new_ques_flag,txtbook_SchoolFlag
				  FROM da_autoReport where request_id = '$request_id'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowassocarray()){
			$arrRet = $row;
		}
		return $arrRet;
	}
	
	function GetChaptersName($chapterids,$connid){
		
		if($chapterids == "") return;
		$returnArr = array();
		$query = "SELECT chapter_id,chapter_name FROM da_chapterMaster WHERE chapter_id IN($chapterids)";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$returnArr[$result["chapter_id"]] = $result["chapter_name"];
		}
		return $returnArr;
		
	}
	
	function GetChapterRequestedCount($chapter_id,$connid){
		
		if($chapter_id == "" || $chapter_id == 0) return;
		$totalRequested = 0;
		$query = "SELECT COUNT(*) as totalRequested FROM da_testRequest WHERE find_in_set($chapter_id,chapter_id) AND type = 'actual' AND schoolCode != 2387554";
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray();
		$totalRequested = $result["totalRequested"];
		return $totalRequested;
	}
	
	function GetChapterRequestedBySchoolYearWise($chapter_id,$schoolCode,$class,$connid){
		
		if($chapter_id == "" || $chapter_id == 0) return;
		$RequesetedArray = array();
		$totalRequested = 0;
		$query = "SELECT COUNT(*) as totalRequested,year 
				  FROM da_testRequest WHERE find_in_set($chapter_id,chapter_id) AND type = 'actual'
				  AND schoolCode = $schoolCode AND class = $class GROUP BY year";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$RequesetedArray[$result["year"]] = $result["totalRequested"];
			$totalRequested += $result["totalRequested"];
		}
		$RequesetedArray["TOTAL"] = $totalRequested;
		return $RequesetedArray;
	}
	
	function GetQuesUsedCount($chapter_id,$requestDetails,$connid){
		
		if($chapter_id == 0) return;
		$returnArr = array();
		$query = "SELECT group_concat(subsubtopic_code) as sstcodes FROM da_tbChapterMapping where chapter_id = '".$chapter_id."'" ;
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray();
		$sst_codes = $result["sstcodes"];
		
		$query1 = "SELECT qcode FROM da_questions WHERE sub_subtopic_code IN($sst_codes) AND status = 3 AND parent_qcode = 0";
		$dbqry1 = new dbquery($query1,$connid);
		
		$totalUniqueQues = 0;
		$totalUniqueUsed = 0;
		$totalUniqueWithCopy = 0;
		while($result1 = $dbqry1->getrowarray()){
			$qcode = $result1["qcode"];
			$totalUniqueQues++;
			
			/*$query2 = "SELECT count(*) as totalused FROM da_paperDetails
					   INNER JOIN da_testRequest ON da_paperDetails.papercode = da_testRequest.paper_code
					   WHERE find_in_set(".$qcode.",qcode_list) 
					   AND da_paperDetails.version = 1
					   AND da_testRequest.status = 'approved'
					   AND da_testRequest.type = 'actual'
					   AND da_testRequest.schoolCode != 2387554";*/
			$query2 = "SELECT school_usage FROM da_questions WHERE qcode = '".$qcode."'";
			$dbqry2 = new dbquery($query2,$connid);
			$result2 = $dbqry2->getrowarray();
			if($result2["school_usage"] > 0)
				$totalUniqueUsed ++;
				
			$query5 = "SELECT COUNT(*) as totalcopy FROM da_questions WHERE parent_qcode = '".$qcode."'";
			$dbqry5 = new dbquery($query5,$connid);
			$result5 = $dbqry5->getrowarray();
			if($result5["totalcopy"] > 0)
				$totalUniqueWithCopy++;
			
		}
		
		
		$totalCopy = 0;
		$totalCopyUsed = 0;
		$query4 = "SELECT qcode FROM da_questions WHERE sub_subtopic_code IN($sst_codes) AND status = 3 AND parent_qcode != 0";
		$dbqry4 = new dbquery($query4,$connid);
		while($result4 = $dbqry4->getrowarray()){
			$totalCopy ++;
			$qcode = $result4["qcode"];
			$query3 = "SELECT school_usage FROM da_questions WHERE qcode = '".$qcode."'";
			/*$query3 = "SELECT count(*) as totalused FROM da_paperDetails
					   INNER JOIN da_testRequest ON da_paperDetails.papercode = da_testRequest.paper_code
					   WHERE find_in_set(".$qcode.",qcode_list) 
					   AND da_paperDetails.version = 1
					   AND da_testRequest.status = 'approved'
					   AND da_testRequest.type = 'actual'
					   AND da_testRequest.schoolCode = '".$requestDetails["schoolCode"]."'
					   AND da_testRequest.class = '".$requestDetails["class"]."'";*/
			$dbqry3 = new dbquery($query3,$connid);
			$result3 = $dbqry3->getrowarray();
			if($result3["school_usage"] > 0)
				$totalCopyUsed ++;
		}	
		$returnArr["totalUnique"] = $totalUniqueQues;
		$returnArr["totalUniqueUsed"] = $totalUniqueUsed;
		$returnArr["totalUniqueWithCopy"] = $totalUniqueWithCopy;
		$returnArr["totalCopy"] = $totalCopy;
		$returnArr["totalCopyUsed"] = $totalCopyUsed;
		
		return $returnArr;
	}

	// Naveen For task 1002 drop questions based on Blue Print table
	function maxReport($finalReportingArr)
	{
		
		$max=0;
		$report ="";

		foreach($finalReportingArr as $key => $val)
		{
			$count_selected = count(explode(",", $val['qcode_list']));
			
			if( ($count_selected > $max) && ($count_selected > 3) )  
			{
				$max = $count_selected;
				$report_id = $key;
			}
		}

		if($report_id !="")
		{
			return $report_id;
		}
		
	}
	
	function dropQuestions_autoBlueprint($finalReportingArr, $reportArr, $year,$schoolCode, $class, $subjectno, $papercode,$connid)
	{
		
		$no_questions = "";
		$questions_toDropped= 0;
		$dropped_cnt = 0;
		
	//	$query ="SELECT no_of_questions FROM da_autoSchoolBluePrint WHERE schoolCode=$schoolCode and year =$year and class=$class and subject =$subjectno and exactly ='Yes' order by updated_dt desc limit 1";
		$query ="SELECT no_of_questions FROM da_autoSchoolBluePrint WHERE schoolCode=$schoolCode and year =$year and class=$class and subject =$subjectno order by updated_dt desc limit 1";
	
		$dbqry = new dbquery($query,$connid);
		if($dbqry->numrows() > 0){
			$row = $dbqry->getrowarray();
			$no_questions =$row['no_of_questions'];
		}
		# Returnt the array as it is if we haven't found auto blue print for the school
		if($no_questions == ""){
			return $finalReportingArr;
		}	

		$count_questions =0;
		$max = 0;

		foreach($finalReportingArr as $key => $value ){
			$count_questions += $value["required_ques"];
		}
		# Return the array as it is if no questions need to dropped
		$questions_toDropped = $count_questions - $no_questions ;
		if($questions_toDropped <= 0 ){
			return $finalReportingArr;
		}
		
		$i=0;
		$drop_qs_list="";

		for( $i =0; $i < $questions_toDropped ; $i++)
		{
			$reportId_DropQs = $this->maxReport($finalReportingArr);
			if($reportId_DropQs != "")
			{
				$ques_list = $finalReportingArr[$reportId_DropQs]['qcode_list'];
				$qcode = explode(",", $ques_list);
				
				// Each Reporting Head should have atleast 1 question
				$sst_list = $finalReportingArr[$reportId_DropQs]['sst_list'];
				$sst_arr = explode(",", $sst_list);
				$break_flag =0;
				if(count($qcode) > 0)
				{
					foreach($sst_arr as $key => $sst_codeValue)
					{
						if($break_flag ==1) break;
						$qry = "SELECT group_concat(qcode) qcode_lst ,count(qcode) count_qcode FROM da_questions WHERE sub_subtopic_code = '".$sst_codeValue."'
								AND qcode IN ($ques_list) AND misconception = 0";
						$dbqry = new dbquery($qry,$connid);
						while($row = $dbqry->getrowarray())
						{
							if($break_flag ==1) break;

							$cnt =$row['count_qcode'];
							$qcodelst = $row['qcode_lst'];

							if($cnt > 1){
								$qcode_sst = explode(",", $qcodelst);
								asort($qcode_sst);
								$firstelement_Drop = array_shift($qcode_sst);
								$drop_qs_list  = $drop_qs_list . ",". $firstelement_Drop; 
								$qArr = array_diff($qcode, array($firstelement_Drop ));
								$finalReportingArr[$reportId_DropQs]['qcode_list']= implode(',', $qArr);
								$finalReportingArr[$reportId_DropQs]['required_ques'] = $finalReportingArr[$reportId_DropQs]['required_ques'] - 1;
								$break_flag =1;
							}
						}
					}
				}
			}

		}
			
		$drop_qs_list = ltrim($drop_qs_list, ",");
		
		$this->drop_qcodes_frm_bestFit = $drop_qs_list ;

		if($drop_qs_list !="") 
			$dropped_cnt = count(explode(",", $drop_qs_list));
				
		$this->dropQuestions_failedCnt = $questions_toDropped - $dropped_cnt; 

		return $finalReportingArr;
	}
	

	function question_neededChapterWise($chapter_id,$connid,$class_set="",$subject_set="",$ppaer_type="",$schoolCode_set="", $year=""){		
		
		$chapter_fetch = array();
		$chapter_fetch = explode(",",$chapter_id);
		$chapterWithNumberOfPage = array();
		$total_ques = 0;
		$condition = "";		
		//$query = "SELECT total_ques from da_autoBluePrint where class = '$class' AND subjectno = '$subject' AND paper_type = '$paper_type' AND board = '$board'";
		//$query = "SELECT no_of_questions from da_autoSchoolBluePrint where class = '$class_set' AND subject = '$subject_set' AND schoolCode = '$schoolCode_set' and year ='$year' and exactly ='Yes'";
		$query = "SELECT no_of_questions from da_autoSchoolBluePrint where class = '$class_set' AND subject = '$subject_set' AND schoolCode = '$schoolCode_set' and year ='$year' ";		
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray()){
			$total_ques = $result["no_of_questions"];
		}

		$questions_needed = $total_ques;

		//$questions_needed = 25;
		$nooftotalpagesbase = 0;
		#Use ratio of total page numbers for each chapter in the request to get ratio of questions needed for each chapter in the paper of total 25 questions
		#find first ratio needed
		if($questions_needed!=0)
		{
			foreach($chapter_fetch as $keychapter=>$valuechapter){
					
					$chapterWithNumberOfPage[$valuechapter] = $this->fetchPageNumberForChapters($valuechapter,$connid);			
																	
					$nooftotalpagesbase = $nooftotalpagesbase + $chapterWithNumberOfPage[$valuechapter];
			
			}
			
			foreach($chapter_fetch as $keychapter=>$valuechapter){
				$chapterWithQuestionSelection[$valuechapter] = $this->questionsneededforChapters($chapterWithNumberOfPage[$valuechapter],$nooftotalpagesbase,$questions_needed,$connid);
			}
		}

	
		return $chapterWithQuestionSelection;
		
	
	}
	// Naveen End of task 1002 drop questions based on  Blue Print table
	
	// Oldest question {Copy or original} for school class

	function oldestUsedQuestion($qcode,$schoolCode,$year,$connid)
	{
	
		$questionArr = array();
		$idArr = array();
		$returnArr = array();
		$qtype = "";

		$priority_qcode = $qcode; 

		$questionArr[] = $qcode;
	
		$query = "SELECT parent_qcode,qcode from da_questions where qcode = '".$qcode."' AND status = 3 ORDER BY qcode";

		$dbquery = new dbquery($query,$connid);
		 	while($row = $dbquery->getrowarray()){
		 			$questionArr[] = $row["qcode"];

		 		
		 		if($row["parent_qcode"] != "")
		 		{	
		 			// this is a copy question get all copy question of its parent 
		 			if($row["parent_qcode"] != 0)
		 			{		 				
						$questionArr[] = $row["parent_qcode"];
						// Direct question priority 
						$priority_qcode = $row["parent_qcode"];

						$copies_query = "SELECT qcode from da_questions where parent_qcode = '". $row["parent_qcode"]."' AND status = 3 ORDER BY qcode";
					//	echo "$copies_query <br/>";
						$copy_dbquery = new dbquery($copies_query, $connid);

						while($copy_row = $copy_dbquery->getrowarray())
						{
							$questionArr[] = $copy_row["qcode"];
						}
		 			}
		 			// this is a unique question get all copy questions 
		 			if($row["parent_qcode"] == 0)
		 			{
		 				$cps_query = "SELECT parent_qcode,qcode from da_questions where parent_qcode = '".$qcode."' AND status = 3 ORDER BY qcode";
		 				$cps_dbquery = new dbquery($cps_query, $connid);

		 				while($cps_row = $cps_dbquery->getrowarray())
						{
							$questionArr[] = $cps_row["qcode"];
						}
		 			}
		 		}	
		 	}
	
		$questionArr = array_unique($questionArr);
	
		if(count($questionArr) == 1)
		{
			// unique question
			$unq_query = "SELECT b.id, b.test_date from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code
			AND b.schoolCode!='2387554' AND FIND_IN_SET($qcode,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode'  AND b.type = 'actual' AND b.class = '$this->class' ORDER BY b.test_date DESC, b.id ASC LIMIT 1";
			$unq_dbquery = new dbquery($unq_query,$connid);
			$cd = $unq_dbquery->numrows();
	
			if($unq_dbquery->numrows() == 0)
			{
				$qType= "unique";
				$oldestqcode =$qcode; 
			}
			else
			{
	
				// Clarify if we have to drop only question found and it was used by school or make it repeat 
			/*	$qType ="";
				$oldestqcode ="";
			*/
				$qType ="repeat";
				$oldestqcode =$qcode;
			}
		}
		else
		{	
			asort($questionArr);
		
			 foreach ($questionArr as $key => $ques)
			 {	
			 	// Latest  id of each question
			 	$idArr[$ques] = "0000-00-00";
			 	$ids_query = "SELECT b.id, b.test_date from da_paperDetails a,da_testRequest b where a.papercode = b.paper_code
			 	AND b.schoolCode!='2387554' AND FIND_IN_SET($ques,a.qcode_list) AND a.version = '1' AND b.status = 'Approved' AND b.schoolCode = '$schoolCode'  AND b.type = 'actual' AND b.class = '$this->class' ORDER BY b.test_date DESC, b.id ASC LIMIT 1";
				
				$ids_dbquery = new dbquery($ids_query,$connid);
			 		while($id_row = $ids_dbquery->getrowarray()){			 			
			 			$idArr[$ques] = $id_row["test_date"];
			 		}
			 }
	
			// if more than 1 take oldest , if 1 omit the question if 0 then unique question
			// sort the ids and  get oldest used based on test date 
			// arrange qcode in order then sort by last used date , so if same used date means earlier qcode comes first 
//			ksort($idArr);

			$idvalues = array_values($idArr);
			$idkeys = array_keys($idArr);
			array_multisort($idvalues, SORT_ASC, $idkeys, SORT_NUMERIC);
			$idArr=array_combine($idkeys, $idvalues);

			$oldestqcode = array_shift(array_keys($idArr));

			// Priority to Direct question
			if($idArr[$oldestqcode] == $idArr[$priority_qcode])
			{
				$oldestqcode = $priority_qcode;			
			}
			
			// if question is in temporary table take next from array skip qocde which are in da_autoAssmeblyQues table
			// for maths science 
			
			$assembled_QuesCnt = 0;
			$assembled_res ="";
			
			$assembled_quesQuery = "SELECT count(*) assembled_cnt FROM da_autoAssemblyQues WHERE schoolCode = '".$schoolCode."' AND request_id !='".$this->test_requestid."' AND class ='".$this->class."' AND FIND_IN_SET($oldestqcode,qcode_list)";
			$assembled_dbquery = new dbquery($assembled_quesQuery, $connid);
			
			$assembled_res = $assembled_dbquery->getrowarray();
			$assembled_QuesCnt = $assembled_res["assembled_cnt"];
			$cntIds = count($idArr);
	
			// get second element if first is in Temp table assembled 
			if($cntIds > 1 && $assembled_QuesCnt > 0)
			{
				$temp = array_splice(array_keys($idArr),1,1, true);
				$oldestqcode = $temp[0];
			}	
			
			// end temp table logic for maths and science 
			// beacuse of unique priority same question is getting picked from two reporting head so pick next
			if(!in_array($oldestqcode, $this->currentAssembledQcodeArr))
			{
				$this->currentAssembledQcodeArr[] = $oldestqcode;
			}
			else
			{
				if($cntIds > 1 )
				{
					/*
					$temp = array_splice(array_keys($idArr),1,1, true);
					$oldestqcode = $temp[0];
					*/
					// logic change for unique priority to prevent same questions coming twice
					$flag =0;
					$temp_nextQcode ="";

					foreach($idArr as $key=>$val)
					{
						// get the next question after this question which is already there
						if($flag ==1)
						{
							$temp_nextQcode = $key; break;
						}
						if($key ==$oldestqcode)
						{
							$flag =1;
						}						
					}

					$diffArr = array_diff($idArr, $this->currentAssembledQcodeArr);
			
					// if next qcode is not in assembled list
					if($temp_nextQcode !="" && !in_array($temp_nextQcode, $this->currentAssembledQcodeArr))
					{
						$oldestqcode =$temp_nextQcode;
					}	
					else
					{
						$oldestqcode = array_shift(array_keys($diffArr));
					}
				}
			}	
			
			if($oldestqcode == $qcode)
			{
				$qType ="unique";
			}
			else
			{
				$qType ="copy";	
			}
	}

		$returnArr = array("quesPickedType" => $qType, "qcode" => $oldestqcode);
		return $returnArr;
	}

	// For english check for each question if in temp table

	function checkSameQcodeEnglish($qcode, $schoolCode,$class,$connid)
	{	
		$query = "SELECT count(*) count_ques from da_autoAssemblyQues where schoolCode ='".$schoolCode."' AND request_id != '".$this->test_requestid."' AND find_in_set($qcode, qcode_list) AND subject ='1' and class ='".$this->class."'";
		$dbqry = new dbquery($query,$connid);

		$result = $dbqry->getrowarray();
		if($result["count_ques"] > 0)
		{
			 return 1;
		}
		else
		{
			return 0; 
		}	 
	}

	function checkSamePassageEnglish($qcode_list, $schoolCode,$class,$connid)
	{
		// Unused passge  check for first question is in Assembly

		$qcodeArr = explode(",", $qcode_list);

		foreach($qcodeArr as $key => $qcode)
		{	
			$query = "SELECT count(*) count_ques from da_autoAssemblyQues where schoolCode ='".$schoolCode."' AND request_id != '".$this->test_requestid."' AND find_in_set($qcode, qcode_list) AND subject ='1' and class ='".$this->class."'";
		//	echo "QCODE $qcode --> $query <br/>";
			$dbqry = new dbquery($query,$connid);

			$result = $dbqry->getrowarray();
	
			$tt = $result["count_ques"];
		
			if($result["count_ques"] > 0)
			{
				 return 1;
			}
		/*	else
			{	
				return 0;
			}	 
		
		*/
		}
		return 0;

	}	

	// End Checking for same question Assembled from table da_autoAssemblyQues

	# S-01074 DA : Last Used Date of a Question - Display
	function GetQuesLastUsedDateColor($schoolCode,$year,$lastUsedDate,$connid){
			
		if($schoolCode == 0 || $schoolCode == "" || $lastUsedDate == "") return;
		
		$query = "SELECT start_date,end_date FROM da_orderMaster WHERE schoolCode = '".$schoolCode."' AND year = '".$year."'";
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray();
		$start_date = $result["start_date"];
		$end_date = $result["end_date"];
		
		$UsedDate = DateTime::createFromFormat('Y-m-d',$lastUsedDate);
		$UsedDate = $UsedDate->format('Y-m-d');
		
		$OrderBegin = DateTime::createFromFormat('Y-m-d',$start_date);
		$OrderBegin = $OrderBegin->format('Y-m-d');
		
		$OrderEnd = DateTime::createFromFormat('Y-m-d',$end_date);
		$OrderEnd = $OrderEnd->format('Y-m-d');
		
		if ($UsedDate >= $OrderBegin && $UsedDate <= $OrderEnd){
			return "red";
		}else {
			return "black";
		}
	}

	// Naveen : function to check for unapproved questions in Paper while generating PDF
	function getUnapprovedQuestionInPaper($connid, $qcode_list)
	{
		$unApprovedQcodeArr = array();

		$query= "SELECT qcode FROM da_questions WHERE status !=3 AND qcode in($qcode_list) ";		
		$dbqry = new dbquery($query,$connid);
		
		while($row = $dbqry->getrowarray())
		{
			if(!in_array($row["qcode"],$unApprovedQcodeArr))
				$unApprovedQcodeArr[] = $row["qcode"];
		}

		return $unApprovedQcodeArr;
		 
	}

	// end function to get unapproved questions at Generate PDF

	// function to get SST of chapters requested only 
	function getSSTofChapters($connid)
	{
		$retArr =array();

		$query ="SELECT chapter_id FROM da_testRequest WHERE id ='".$this->test_requestid."' ";
		$dbqry = new dbquery($query,$connid);

		$result = $dbqry->getrowarray();
		$chapter_list = $result["chapter_id"];

		$sst_query = "SELECT subsubtopic_code FROM da_tbChapterMapping WHERE chapter_id in (".$chapter_list.")";
		$sst_dbqry = new dbquery($sst_query,$connid);
		
		while($row = $sst_dbqry->getrowarray())
		{
			$retArr[] = $row["subsubtopic_code"];
		}

		return $retArr;
	}

	// delete unfinalized PDF from bucket
	function deleteFromBucket($connid){

		$unfinalize_schoolCode ="";
		$unfinalize_examCode ="";
		$dest_path ="";

		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3_constants.php");
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."S3.php");
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3Wrapper.php");

		$s3WrapperObj = new s3Wrapper(constant("awsAccessKey"),constant("awsSecretKey"));

		$exam_query ="SELECT exam_code,schoolCode FROM da_examDetails a,da_testRequest b WHERE a.request_id = b.id AND request_id = '".$this->test_requestid."'";
	//	echo "$exam_query <br/>";

		$exam_dbquery = new dbquery($exam_query,$connid);
		
		while($exam_row = $exam_dbquery->getrowarray())
		{
			$unfinalize_schoolCode =$exam_row["schoolCode"];
			$unfinalize_examCode =$exam_row["exam_code"];


			if($unfinalize_examCode!="" && $unfinalize_schoolCode !="" )
			{
				for($index =1;$index<=4;$index++)
				{
					$filename = $unfinalize_examCode.$index;				
					$dest_path = "PDF/".$unfinalize_schoolCode."/".$this->test_requestid."/papers/".$filename.".pdf";
					$copy_path = "PDF/".$unfinalize_schoolCode."/".$this->test_requestid."/papers/".$filename."_".date("YmdHis").".pdf";
				
					if($dest_path != "")
					{
						// Copy the object with file name_time then delete the object
						$wrapper_copy =$s3WrapperObj->copyFile(constant("DA_BucketName"),$dest_path,$copy_path);
						$wrapper_res = $s3WrapperObj->deleteFile(constant("DA_BucketName"),$dest_path);
					}
				}
			}
		}

		
		// end delete from amazon pdf created file
	}
	
	# Inserting paperdetails and reportingdetails log
	function InsertPaperLog($papercode = "",$logtype = "",$connid){
		
		if($papercode == "") return ;
		
		$query = "INSERT INTO da_paperDetailsLog (papercode,version,qcode_list,lastModifiedBy, lastModifiedDate,log_entered_dt,log_type)
				  SELECT papercode,version,qcode_list,lastModifiedBy, lastModifiedDate,NOW(),'".$logtype."' FROM da_paperDetails 
				  WHERE papercode = '".$papercode."'";
		$dbqry = new dbquery($query,$connid);
		
		
		$query2 = "INSERT INTO da_reportingDetailsLog (reporting_id,papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order,entered_dt,entered_by,modified_by,lastModifiedDate,log_entered_dt,log_type)
				   SELECT reporting_id,papercode,reporting_level,sst_list,qcode_list,required_ques,reporting_head,reporting_order,entered_dt,entered_by,modified_by,lastModifiedDate,NOW(),'".$logtype."' FROM da_reportingDetails
				   WHERE papercode = '".$papercode."'";
		$dbqry2 = new dbquery($query2,$connid);
		
	}
	// function to check if text book is mapped to only one school , for making that paper as red, for further manual checking
	function checkTextBookMappedSchool($request_id,$connid)
	{
		$sel_query ="SELECT year,class,subject,chapter_id FROM da_testRequest WHERE id='".$request_id."' ";
		$sel_dbqry = new dbquery($sel_query,$connid);
		while($sel_row = $sel_dbqry->getrowarray())
		{
			$year =$sel_row["year"];
			$class =$sel_row["class"];
			$subject =$sel_row["subject"];
			$chapter_id =$sel_row["chapter_id"];
		}

		if($chapter_id != "")
		{
			$chapterArr = explode(",",$chapter_id);

			foreach($chapterArr as $key => $chap)
			{	
				$query = "SELECT  count( distinct(da_bookMapping.schoolCode)) schools
					 FROM da_textbooks LEFT JOIN da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id
					  LEFT JOIN da_bookMapping ON FIND_IN_SET(da_textbooks.tb_id,da_bookMapping.book_id)
						where da_textbooks.subjectno='".$subject."' and da_chapterMaster.chapter_id ='".$chap."'
						AND da_bookMapping.class ='".$class."'
						AND da_bookMapping.year ='".$year."'
						";

				$dbqry = new dbquery($query,$connid);
				$result = $dbqry->getrowarray();
				
				$count = $result["schools"];

			if($count > 1)
				return 0;		
			}			
		
		return 1;
		}

		return 0;

	}
	// function to check spelling errors in Reporting and test name
	function reportingDetails_spellCheck($connid)
	{
		$reportingStringArr =array();		

		$query ="SELECT da_testRequest.testName, da_reportingDetails.reporting_head FROM da_testRequest 
				 INNER JOIN  da_reportingDetails
				 ON da_testRequest.paper_code=da_reportingDetails.papercode
				 WHERE da_testRequest.id ='".$this->test_requestid."' ";
		$dbqry = new dbquery($query,$connid);

		$index = 0;
		while($result = $dbqry->getrowarray()) {

			if($index ==0)
				$reportingStringArr[] = trim($result["testName"]);

			$reportingStringArr[]=trim($result["reporting_head"]);
			$index++;
		}

		foreach($reportingStringArr as $key => $stringVal) {

			$tokens ="-,;?:!_^#@%$&*()[]{}+=/\"\t\r\n\'1234567890. ";
			$str_token = strtok($stringVal,$tokens);

			while ($str_token){
				$word1_query = "select count(*) from dictionary where word='$str_token'";
				$word1_dbqry = new dbquery($word1_query,$connid);
				$word1_result = $word1_dbqry->getrowarray();

				if($word1_result[0] == 0)
				{
					$word2_query = "select count(*) from names where name='$str_token'";
					$word2_dbqry = new dbquery($word2_query,$connid);
					$word2_result = $word2_dbqry->getrowarray();
					if($word2_result[0] == 0)
					{
						$word3_query= "select count(*) from other_names where word ='$str_token'";
						$word3_dbqry = new dbquery($word3_query,$connid);
						$word3_result = $word3_dbqry->getrowarray();
						if($word3_result[0] == 0)
						{
							$this->addDictionaryWordsArr[]=$str_token;
						}
					}
				}		
				$str_token = strtok($tokens);
			}
		}
	}
	// function to validate if the questions in the paper are second approved
	
	function validateSecondApproval($connid)
	{
		$query ="SELECT qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."' ";
		$dbqry = new dbquery($query,$connid);
		$result= $dbqry->getrowarray();
		$quesList=$result["qcode_list"];

		$secApprovedQuery = "SELECT GROUP_CONCAT(qcode) secUnapproved FROM da_questions WHERE qcode IN($quesList) AND approver2_status !=1 ";
		$secDquery = new dbquery($secApprovedQuery,$connid);
		$secResult = $secDquery->getrowarray();

		return $secResult["secUnapproved"];
	}

// function to second approve questions selected in the paper 
	function second_ApprovedQues($connid) {
		$secondApprArr =array();
		$ins_queryValues ='';
		if(is_array($this->quesNo) && count($this->quesNo) >0) {
			$qcodeList = implode(",",$this->quesNo);

			// second approve only status 3 and not already second approved questions
			$query = "SELECT qcode FROM da_questions where qcode in (".$qcodeList.") AND status = 3 and approver2_status != 1";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				$secondApprArr [] = $row['qcode'];
			}

			if(count($secondApprArr) > 0 ) {
				$secondList= implode(",",$secondApprArr);
				$upd_query = "UPDATE da_questions SET approver2_status='1',trail=concat(trail,'-','".$_SESSION['username']."'),current_alloted='', first_alloted='', lastModified = lastModified WHERE qcode in (".$secondList.") ";
				$upd_dbquery = new dbquery($upd_query,$connid);

				$ins_query = "INSERT INTO da_comments (qcode,comment,submitdate,commenter,type) VALUES  ";
				foreach($secondApprArr as $key =>$ques_code){
					$ins_queryValues .=", (".$ques_code.",'AUTO:Second Approved','".date("Y-m-d H:i:s")."','".$_SESSION['username']."','AUTO') ";
				}
				$ins_queryValues = ltrim($ins_queryValues,",");
				$ins_query .=$ins_queryValues;

				if($ins_queryValues != '')
					$ins_dbquery = new dbquery($ins_query,$connid);

			}
		}
	}
 // function to get thin chapter flag of chapters requested
	function getThinChapterFlag($chapter_str,$connid) {

		if($chapter_str != "") {
			$query ="SELECT thin_chapter FROM da_chapterMaster where chapter_id in (".$chapter_str.") ";
			$dbquery = new dbquery($query,$connid);

			while($row=$dbquery->getrowarray()) {

				if($row["thin_chapter"] > 0)
					return 1;
			}

			return 0;
		}
	}

	// get specific comments for the school and chapter
	function getChapterSpecificComments($schoolCode, $year,$chapter_ids,$connid) {
		if($chapter_ids == '') return '';
		$query = "SELECT chapter_id, comments, thin_chapter, updated_date, added_date FROM da_chapSpecificComments WHERE 
					schoolCode ='".$schoolCode."' AND class='".$this->class."' AND subjectno ='".$this->subjectno."' 
					AND year = '".$year."' AND chapter_id in (".$chapter_ids.") ";
		//echo "$query <br/> ";
		$dbquery = new dbquery($query,$connid);
		while($row=$dbquery->getrowarray()) {
			if($row['updated_date']== "0000-00-00 00:00:00")
				$mod_time = date('d-m-Y h:i:s',strtotime($row['added_date']));
			else 
				$mod_time = date('d-m-Y h:i:s',strtotime($row['updated_date']));

			$arrRet[$row['chapter_id']] = array('comments'=>$row['comments'],'thin_chapter'=>$row['thin_chapter'],'mod_time'=>$mod_time); 
		}

		return $arrRet;
	}

    //To get test request id of paper code 
    function getTestRequest($papercode,$connid){
        
    	$arrRequest=array();
        $query = "SELECT id,test_date,subject,schoolCode,year from da_testRequest a WHERE a.paper_code = '".$papercode."' AND schoolCode !=0 ORDER BY test_date desc";
        $reqQuery = new dbquery($query,$connid);
        while($row = $reqQuery->getrowarray()){
        	$arrRequest[] = array("id"=>$row['id'],"schoolCode"=>$row['schoolCode'],"year"=>$row['year']);  
	    }	
        return $arrRequest;
	}
	
	function getClassWiseExamAndPrintModes($order_id,$connid){
		
		if ($order_id == 0) return;
		$returnArr = array();
		
		$query = "select submode,printing_pages from orderAdditionalDetails where product = 'da' and order_id = '".$order_id."'";
		$dbqry = new dbquery($query,$connid);
		$result = $dbqry->getrowarray();
		$submode = $result["submode"];
		$printmode = $result["printing_pages"];
		
		if ($submode != "") {
			# Extracting exam modes - class wise
			$submode_arr = explode(",",$result["submode"]);
			foreach ($submode_arr as $key => $value){
				$tempArr = explode("#",$value);
				$returnArr["EXAMMODE"][$tempArr[0]] = $tempArr[1]; # Class as Key and Exammode as Value
			}
		}
		
		if ($printmode != "") {
			$printing_page_arr = explode(",",$printmode);
			foreach ($printing_page_arr as $key1 => $value1){
				$temp1Arr = explode("#",$value1);
				$returnArr["PRINTMODE"][$temp1Arr[0]] = $temp1Arr[1]; # Class as Key and Exammode as Value
			}
		}		
		return $returnArr;		
	}
	
    function getSelectedPassage($testRequest_id,$connid){            
        $arrRequestPassage=array();             
        $query = "Select DISTINCT(passage_id) as passageid from da_questionSelectionSummary where request_id='$testRequest_id' AND passage_id !=0";
        $dquery = new dbquery($query,$connid); 
        while($row = $dquery->getrowarray())
        {  
            $arrRequestPassage[] = $row['passageid'];  
        }
        return count($arrRequestPassage);
    }
    
    private function mergeVocabularyUnderRcReportingHead($connid, $vocabQuestions, $papercode){
        error_log(json_encode($vocabQuestions));
        $dbqueryUpdateReportingOrder = new dbquery(null,$connid);	
        $vocabPlusGroupQuestionsCount = count($vocabQuestions);
        if($vocabPlusGroupQuestionsCount > 0){                        
            $vocabPlusGroupQuestionsString = implode(",", $vocabQuestions);
            $sub_sst_list_ST = $this->getSSTByQcodesForEnglish($vocabQuestions,$connid);
            $dbqueryUpdateReportingOrder->executequery(
                    " UPDATE da_reportingDetails "
                    . " SET required_ques = required_ques + $vocabPlusGroupQuestionsCount, qcode_list = CONCAT(qcode_list,',',$vocabPlusGroupQuestionsString), sst_list = CONCAT(sst_list,',',$sub_sst_list_ST)"
                    . " WHERE papercode = '$papercode' AND reporting_level = 'Reading Comprehension'");
        }
    }
}
?>