<?php
class clsdahtmlreports{
	var $examcode;
	var $subjectno;
	var $paperversion;
	var $action;
	var $connid;
	var $year;
	var $testNo;
	var $qcodeList;
	var $your_score;
	var $class_avg;
	var $class_highest;
	var $test_date;
	//var $chp_names;
	var $bestPerfArea;
	var $areaImprovement;
	var $papercode;
	var $paperwiseQueSeq;
	var $questionSeq;
	var $ansseqarr;
	var $excludeSchools; // school list to not show class average and key ideas assessed
	var $ReportingQuesArr;
	var $sectionClass;
	var $SectionWiseStudents;  // student id list of the section
	var $misconceptionque_arr_with_ans;
	var $QueFromVersionTable;
	var $reportingtopic_arr;
	var $approved_date;
	var $studentPerfoSubtopicWiseArr;
	var $hdn_action;
	var $correctAnsQues;
	var $wrongAnsQues;
	var $score_outof;
	var $schoolCode;
	var $CorrectAnswerArr;
	var $clsdareports;
	var $studentName;
	var $studentAnswerArr;
 	# we dont have to draw the comparison for student and class for below schools
	var $schoolhideSecException = array(24374,60414); // schools to hide the section compare in key ideas section
	var $correctGrpId;
	var $wrongGrpId;
	var $misconGrpId;
	var $testName;
	var $btnDisplayFlag; // to  disable , show correct or show wrong answers based on total score , 0 -display both, 1 - dont display correct, 2 -dont display wrong button
	var $scoring_date;
    static $statisticsDefaultStartDate;
    static $statisticsDefaultEndDate;
    
    function clsdahtmlreports($connid="",$noReportObject=0){
		$this->examcode="";
		$this->subjectno="";
		$this->paperversion="";
		$this->action="";
		$this->connid =$connid;
		$this->year="";
		$this->testNo="";
		$this->qcodeList ='';
		$this->your_score='';
		$this->class_avg='';
		$this->class_highest='';
		//$this->chp_names="";
		$this->bestPerfArea="";
		$this->areaImprovement="";
		$this->papercode="";
		$this->paperwiseQueSeq =array();
		$this->questionSeq=array();
		$this->ansseqarr = array("A"=>1,"B"=>2,"C"=>3,"D"=>4,''=>'','0'=>'');
		$this->excludeSchools= array(60414,395483,24374,2462519); // school list to not show class average and key ideas assessed
		$this->ReportingQuesArr = array();
		$this->sectionClass ='';
		$this->SectionWiseStudents = array();
		$this->misconceptionque_arr_with_ans = array();
		$this->QueFromVersionTable = array();
		$this->reportingtopic_arr =array(); // hold reporting head and reporting name 
		$this->approved_date='';
		$this->testName='';
		$this->studentPerfoSubtopicWiseArr =array();
		$this->hdn_action='';
		$this->correctAnsQues=array();
		$this->wrongAnsQues=array();
		$this->score_outof='';
		$this->schoolCode='';
		$this->CorrectAnswerArr= array();
		if(class_exists('clsdareports') && $noReportObject == 0)
			$this->clsdareports = new clsdareports();

		$this->studentName='';
		$this->studentAnswerArr=array();
		$this->correctGrpId=array();
		$this->wrongGrpId=array();

		$this->btnDisplayFlag=0;
		$this->scoring_date='';
	}
	function setpostvars() {
		if(isset($_POST['hdn_action'])) $this->hdn_action = $_POST['hdn_action'];
	}
	function setgetvars(){
		if(isset($_GET['examcode'])) {
			$examcode = $_GET["examcode"];
			$this->examcode = substr($examcode,0,6);
			$this->paperversion = substr($examcode,6,1);
		}	
		if(isset($_GET['testNo'])) $this->testNo = $_GET['testNo'];

	}
	function pageLoad() {
		$this->setgetvars();
		$this->setpostvars();
		
		$this->setStudentName();
		if($this->hdn_action =='generateReport')
			$this->generateSingleStudentReport();

	}
	// get exam details and any specific settings
	function getExamDetails() {
		$retArr = array();
		if($this->examcode == 0) return;

		$query = "SELECT  a.studentID,a.examcode,paperversion,testName,test_date,subject,request_id,c.schoolCode,
						  b.report_status,b.report_date,c.approved_date,
						  a.report_flag,c.scoring_date,b.display_status, a.total, b.section,
						  c.class,c.year,c.paper_code, c.chapter_id,c.subject, c.schoolCode
					FROM da_response a,da_examDetails b,da_testRequest c
					WHERE a.examcode=b.exam_code 
					AND b.request_id=c.id
					AND studentID='".$_SESSION['studentID']."' 
					AND b.exam_code = '".$this->examcode."' 
					order by c.test_date ";
        
		$dbquery = new dbquery($query,$this->connid);
        
		while($row=$dbquery->getrowarray()) {
			$class = $row['class'];		
			$test_date = $row['test_date'];
			$total = $row['total'];
			$this->approved_date = $row["approved_date"];
			$year = $row["year"];
			$this->subjectno =$row["subject"];
			$subjectid = $row["subject"];
			$chapter_ids = $row['chapter_id'];
			$this->studentids = $row['studentids'];
			$this->test_date = $test_date;
			$this->papercode = $row['paper_code'];
			$this->sectionClass = $row['class'];
			$subject = $row['subject'];
			$this->schoolCode= $row['schoolCode'];
			$request_id = $row['request_id'];
			$section =$row['section'];
			$this->testName=$row['testName'];
			$this->scoring_date=$row['scoring_date'];
		}

		if($this->testNo == '')
			$this->testNo = $this->setTestNo($subjectid,$class,$section,$year);
		
        $outOfScoreDetails = $this->getScoreOutOfDetails($_SESSION['school_code'], $year, $class);;
		$this->score_outof = $outOfScoreDetails[$class][$subject];
		$this->setPaperwiseSeq();

		// class average values 
		$qry = "SELECT AVG(total) as totalperfo, max(total) as class_highest FROM da_response WHERE examcode ='".$this->examcode."' AND da_response.paperversion IN(1,2,3,4)";
		$dbqry = new dbquery($qry,$this->connid);
		$resultrow = $dbqry->getrowarray();

		if($this->score_outof  == 0 && $this->score_outof  != "")
			$SectionOverallPerfo[$this->examcode] = round($resultrow["totalperfo"],2);
		elseif($this->score_outof  > 0 && $this->score_outof  < 100)
			$SectionOverallPerfo[$this->examcode] = $this->round_to_nearest_half((($resultrow["totalperfo"]/$this->totalQuestions) * $this->score_outof ));
		else
			$SectionOverallPerfo[$this->examcode] = round(($resultrow["totalperfo"]/$this->totalQuestions) * 100,2);

		// Naveen Display Class highest
		if($this->score_outof == 0 && $this->score_outof != "")
			$classHighestArr[$this->examcode] = $resultrow["class_highest"];
		elseif($this->score_outof > 0 && $this->score_outof < 100)
			$classHighestArr[$this->examcode] = $this->round_to_nearest_half((($resultrow["class_highest"]/$this->totalQuestions) * $this->score_outof));
		else
			$classHighestArr[$this->examcode] = round(($resultrow["class_highest"]/$this->totalQuestions) * 100);

		// end class highest display
        $StudentAvgPerfo = $this->getAverageScoreFromTotal($total, $this->totalQuestions, array('school_code' => $this->schoolcode, 'score_out_of' => $this->score_outof));
	    
	    if($this->score_outof != 100 && $this->score_outof != "")
			$SectionAvgPerfo = round($SectionOverallPerfo[$this->examcode],1);
		else {
			# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
			//$studentinfo['schoolcode'] == 2528032 || 
	    	if($this->schoolcode == 24668){
	    		$SectionOverallPerfo =round($SectionOverallPerfo[$this->examcode]);
	    		$SectionAvgPerfo = $this->clsdareports->ConvertPerfoIntoGrade($SectionOverallPerfo);	
	    	} else {	
				$SectionAvgPerfo = round($SectionOverallPerfo[$this->examcode])."%";
	    	}	
		}	

		// Class Highest calculation
		if($this->score_outof != 100 && $this->score_outof != "")
			$classHighestVal = round($classHighestArr[$this->examcode],1);
		else {
			# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
			//$studentinfo['schoolcode'] == 2528032 || 
	    	if($this->schoolcode == 24668){
	    		$classHighestVal =round($classHighestArr[$this->examcode]);
	    		$classHighestVal = $this->clsdareports->ConvertPerfoIntoGrade($classHighestVal);	
	    	} else {	
				$classHighestVal = round($classHighestArr[$this->examcode])."%";
	    	}	
		}

		$this->your_score= $StudentAvgPerfo;

		$this->class_avg = $SectionAvgPerfo;
		$this->class_highest=$classHighestVal;
	
        // call function to set array values 
        // set version correct answer and misconception arrays	
		$this->setDetails($request_id);
		return ;
	}

	// function draw student answer key table
	function drawStudentAnswerTable() {
	
	$rightans = '&#10004;';
	$wrongans = '&#10008;';
	$stud_correct_ans =0;

	$studentinfo = array("studentid"=>$_SESSION['studentID'],"paperversion"=>$this->paperversion,"totalcorrectanswer"=>$this->your_score);

    $reportingDetails = $this->getReportingDetails($this->papercode);
    $this->reportingtopic_arr = $reportingDetails['reporting_topics'];
    $this->ReportingQuesArr = $reportingDetails['reporting_questions'];
    
	$questionSeq = array();
	
	$this->studentAnswerArr = $this->getSubtopicWiseStudentAnswer();	
	$tableStr = "<table border=1 style='border-collapse:collapse;'>";
	$header = array(1=>"Sr. No.",2=>"Concept Area",3 =>"Q.No.",4=>"Your Response",5=>"Correct Answer",6=>"Result");
	$countCol = count($header);
	$tableStr .="<tr style='font-weight:bold;text-align:center'>";
	foreach($header as $key =>$heading) {
		$tableStr .="<td>&nbsp; $heading &nbsp;</td>";
	}
	$tableStr .="</tr>";
	$totalQues=0;
	foreach($this->ReportingQuesArr as $reporting_id => $qcodearray) {
		$srno++;

		$orderedQcodeArr = array();
    	$rowspan = count($qcodearray);	
    	
    	$tableStr .="<tr>";
    	$tableStr .="<td rowspan='$rowspan' align='center'>$srno</td>";
    	$tableStr .="<td rowspan='$rowspan'> &nbsp;".$this->reportingtopic_arr[$reporting_id]."&nbsp; </td>";
    	foreach($qcodearray as $key => $qcode)
    	{
    		$orderedQcodeArr[$this->questionSeq[$this->paperversion][$qcode] + 1] = $qcode;
    	}

    	ksort($orderedQcodeArr);
    	foreach($orderedQcodeArr as $key => $qcode){

    		$content = ($this->questionSeq[$this->paperversion][$qcode] + 1);
    		$tableStr .="<td align='center'>".$content."</td>";
    		$tableStr .="<td align='center'>".$this->ansseqarr[$this->studentAnswerArr[$qcode]]."</td>";
    		$tableStr .="<td align='center'>".$this->ansseqarr[$this->CorrectAnswerArr[$qcode]]."</td>";

    		if($this->ansseqarr[$this->studentAnswerArr[$qcode]] == "" || $this->ansseqarr[$this->studentAnswerArr[$qcode]] != $this->ansseqarr[$this->CorrectAnswerArr[$qcode]]){
    			$tableStr .="<td align='center'>$wrongans</td>";
    			$this->wrongAnsQues []=$qcode;
    		} else {
    			$tableStr .="<td align='center'>$rightans</td>";
    			$stud_correct_ans++;
    			$this->correctAnsQues []=$qcode;
    		}
    		$tableStr .="</tr>";
    	$totalQues++;
    	}

	}
	$colVal = $countCol-1;
	$tableStr .="<tr style='font-weight:bold;'><td colspan='$colVal' style='text-align:right;'> &nbsp; Correct Answers &nbsp;</td><td style='text-align:center'>$stud_correct_ans/$totalQues</td></tr>";
	$tableStr .="</table>";

	if($stud_correct_ans == 0)
		$this->btnDisplayFlag =1;
	else if($stud_correct_ans == $totalQues)
		$this->btnDisplayFlag =2;

	return $tableStr;
	}

	// get student Answer Details 
	function getSubtopicWiseStudentAnswer(){
		$StudentAnswers = array();
		if(is_array($this->paperwiseQueSeq[$this->paperversion]) && count($this->paperwiseQueSeq[$this->paperversion]) > 0) {
			$query = "SELECT * FROM da_response WHERE studentID = '".$_SESSION["studentID"]."' AND examcode = '".$this->examcode."'";
			$dbqry = new dbquery($query,$this->connid);
			while($studentrow = $dbqry->getrowarray()){
				foreach($this->paperwiseQueSeq[$this->paperversion] as $key => $qcode) {
					$questionno = "A".($this->questionSeq[$this->paperversion][$qcode] + 1);
					$StudentAnswers[$qcode] = $studentrow[$questionno];
				}				
			}
		}
		return $StudentAnswers;
	}
	
	// function to get Key Ideas Assessed String 
	function getKeyConceptsAssessed(){

		$keyIdeaStr ='';
		
		$nooftopics = count($this->reportingtopic_arr);	    
	   
		$query = "SELECT request_id,exam_code,section FROM da_examDetails WHERE exam_code = '".$this->examcode."' ";
		//echo "$query <br/> ";
		$dbquery = new dbquery($query,$this->connid);

		while($row = $dbquery->getrowarray()){

			$request_arr[$row['request_id']][$row['exam_code']] = $row['section'];
			//$examcode_str .= "'".$row['exam_code']."',";
			$request_id = $row['request_id'];
		}

		$studentID_query = "SELECT group_concat(studentID) student_ids ,paperversion FROM da_response WHERE examcode ='".$this->examcode."' GROUP BY paperversion";
		//echo "$query <br/>";
		$student_dbquery = new dbquery($studentID_query,$this->connid);

		while($studentrow = $student_dbquery->getrowarray()) {
			$this->SectionWiseStudents[$this->examcode][$studentrow['paperversion']] = $studentrow['student_ids'];
		}	
		//$clsdareports= new clsdareports();
		$SubTopicWisePerfoArr = $this->clsdareports->getSubtopicWisePerfo($this->ReportingQuesArr,$this->questionSeq, $this->SectionWiseStudents,$this->connid);
		//print_r($SubTopicWisePerfoArr);
		$classperfo = array();
		foreach($SubTopicWisePerfoArr as $subtopicid => $perfomance){
			if($request_id != 0){
				foreach($request_arr as $requestid => $sectionarr){
					$i = 0;
					foreach($sectionarr as $section=>$classsuffx){
						if($i%2) $color = "Dark"; else $color = "Light";
						$classperfo[$section][$subtopicid] = $perfomance[$section];
						$classperfo[$section]['Name'] = "Section ".$classsuffx;
						$classperfo[$section]['Color'] = $color;
						$i++;
					}
				}
			}
		}
        
		$this->studentPerfoSubtopicWiseArr = $this->clsdareports->getStudentPerfoInSubtopic($this->examcode,$_SESSION['studentID'],'',$this->paperversion,$this->ReportingQuesArr,$this->questionSeq,$this->connid);
		//$schoolcode = 24374;
		 # we dont have to draw the comparison for student and class for below schools
		if($schoolcode == 24374 || $schoolcode == 60414)
			$noofsection = count($SECTIONARRAY = $this->studentPerfoSubtopicWiseArr);
		else		
			$noofsection = count($SECTIONARRAY = $classperfo + $this->studentPerfoSubtopicWiseArr);

		//$keyIdeaStr .="<div class='graph'>";
		$nooftopics = count($this->reportingtopic_arr);
		//$noofsection = count($classperfo);

		return $SECTIONARRAY;
	}
	// get student misconception questions list 
	function studentMisconceptionQues() {
		
		$studentMisconceptionQues = $this->clsdareports->getStudentsMisconceptionQues($this->examcode,$_SESSION['studentID'],$this->paperversion,$this->misconceptionque_arr_with_ans,$this->questionSeq,$this->SectionWiseStudents,$this->connid);

		//print_r($studentMisconceptionQues);
		if(is_array($studentMisconceptionQues) && count($studentMisconceptionQues) > 0) {
			$index = -1;
			foreach($studentMisconceptionQues as $qcode =>$answer) {

					if($i == constant("MAX_MISCON_QUE_TO_DISP")) break;

					if(array_key_exists($qcode,$this->QueFromVersionTable)){
						
						$QueTblName = "da_questions_versions";
						$Condition = " AND da_questions_versions.version = '".$this->QueFromVersionTable[$qcode]."'";
					}else{
						$QueTblName = "da_questions";
						$Condition = "";
					}

					$i++;
					$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,group_id,
									 $QueTblName.passage_id,qms_passage.passage_name,qms_passage.description
							  FROM $QueTblName
							  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
							  WHERE qcode = '".$qcode."' AND misconception = 1 $Condition";
					$dbqry = new dbquery($query,$this->connid);
					$result = $dbqry->getrowarray();
					$mcexplanation = (isset($result['mcexplanation']) && $result['mcexplanation'] != 'NULL')?$result['mcexplanation']:"";
					$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";
					
					$concept = str_replace("<P>","",$concept);
				   	$concept = str_replace("</P>","",$concept);
				   	$concept = str_replace("<p>","",$concept);
				   	$concept = str_replace("</p>","",$concept);
					//$concept = $this->common_pdf_junk_replace($concept);

					$passagenamebuffer = 0;
					$passagename = "";

					$question = parseImageTagAll((orig_to_html($result['question'])));
					$optiona = parseImageTagAll((orig_to_html($result['optiona'])));
					$optionb = parseImageTagAll((orig_to_html($result['optionb'])));
					$optionc = parseImageTagAll((orig_to_html($result['optionc'])));
					$optiond = parseImageTagAll((orig_to_html($result['optiond'])));

					$mcexplanation = parseImageTagAll((orig_to_html($mcexplanation)));

					$retArr[] =array('qno'=>($this->questionSeq[$this->paperversion][$qcode]+1),'question'=>$question,'optiona'=>$optiona,'optionb'=>$optionb,
									  'optionc'=>$optionc,'optiond'=>$optiond,'ca'=>$answer['correct'],'yourResponse'=>$answer['student'],'mcexplanation'=>$mcexplanation,
									  'concept'=>$concept);

				// add passage and group details to current
				$index++;
				$group_id =$result['group_id'];
				
				if($result['passage_id']!=0) {
					$retArr[$index]['passage_id'] =$result['passage_id'];
					$retArr[$index]['passage_name']=$result['passage_name'];
				}	

				if($group_id !=0 )
					$retArr[$index]['group_id'] = $group_id;

				if(!in_array($group_id,$this->misconGrpId) && $group_id !=0) {
					$this->misconGrpId[]=$group_id;
					$group_text = $this->getGrouptext($group_id);
					$passage_id = $result['passage_id'];
				
					$retArr[$index]['group_text']=parseImageTagAll((orig_to_html($group_text)));
					if($passage_id !=0) {
						$retArr[$index]['passage']= orig_to_html(html_entity_decode($result['description']));
					}
				}
			}
		}

		$qnoOrder =array();
		foreach($retArr as $key => $valArr) {
			$qnoOrder[$key]=$valArr['qno'];
		}
		array_multisort($qnoOrder,SORT_ASC,$retArr);

		$retArr = $this->resetQuestionPassageOrder($retArr);
		return$retArr;
	}

	// function to get Best Performed area 
	function getPerformanceAreas() {
		// best and worst performed area 
		foreach($this->studentPerfoSubtopicWiseArr as $studentid => $topicwiseperformance){
		    $topiccount =0;
			$max = constant("MIN_SUBTOPIC_PERFO");
			$worsttopiccriteriaper = constant("MIN_SUBTOPIC_PERFO"); // 67%

			$i=1;
	    	foreach($topicwiseperformance as $topic => $performance){
	    		if(is_numeric($performance)){
	    			$StudentTotalPerfo += $performance;

	    			if(count($this->reportingtopic_arr) != 1){ // For only one reporting head we dont need to show top performance
		    			if($performance > $max && $performance >= constant("MIN_SUBTOPIC_PERFO")) {
			    			$studentbesttopic = $topic;
			    			$max = $performance;
			    		}
	    			}
		    		if($performance < constant("MIN_SUBTOPIC_PERFO")){
		    			$StudentWorstTopicArr[] = array("srno"=>$i,"topicid"=>$topic,"performance"=>$performance);
		    		}
		    		$topiccount++;
	    		}
	    		$i++;
	    	}
		}

		# Process to sort out the topics for improvement

		if(is_array($StudentWorstTopicArr) && count($StudentWorstTopicArr) > 0){

			foreach ($StudentWorstTopicArr as $key => $arrayrow) {
			    $srno_arr[$key]  = $arrayrow['srno'];
			    $performance_arr[$key] = $arrayrow['performance'];
			}

			array_multisort($performance_arr, SORT_ASC, $srno_arr, SORT_ASC, $StudentWorstTopicArr);

			$worsttopicdispcnt = 0;
			foreach ($StudentWorstTopicArr as $key => $arrayrow) {
			    $worsttopicdispcnt++;
				$studentworsttopicstr .="- ".$this->reportingtopic_arr[$arrayrow["topicid"]]." <br/> ";
		    	if($worsttopicdispcnt == constant("STUD_MAX_WORST_TOPIC"))
		    	break;
			}
		}
		if($studentworsttopicstr != "")
			$studentworsttopicstr =" <br/>".$studentworsttopicstr;
		if($this->reportingtopic_arr[$studentbesttopic] != '')
			$bestArea = " <br/>- ".$this->reportingtopic_arr[$studentbesttopic];
		//$studentworsttopicstr=rtrim($studentworsttopicstr,'& ');
		return array($bestArea,$studentworsttopicstr );
	}

	function generateSingleStudentReport(){

		$subArr = array('','English','Maths','Science');
		$schoolcode ='';
		$request_id ='';
		$clsdareports = new clsdareports();
		$result = $clsdareports->GenerateStudentReport($this->examcode,'',$_SESSION['studentID'],$this->connid,'');
		$query = "SELECT da_testRequest.schoolCode, da_testRequest.id,da_testRequest.year,da_testRequest.subject, da_testRequest.class,
					da_examDetails.section FROM da_testRequest INNER JOIN da_examDetails 
				  ON da_testRequest.id=da_examDetails.request_id WHERE da_examDetails.exam_code='".$this->examcode."' ";
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowarray()){
			$schoolcode= $row['schoolCode'];
			$request_id = $row['id'];
			$testYear = $row['year'];
			$subjectVal = $row['subject'];
			$classVal = $row['class'];
			$sectionVal= $row['section'];			
		}
			$studentid = $_SESSION['studentID'];

			if($schoolcode =='' || $request_id == '' || $studentid == '') 
				return ;
			if($this->testNo == '')
				$this->testNo = $this->setTestNo($subjectVal,$classVal,$sectionVal,$testYear);

			$ActualStudentReportPath = constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/";
			$bucket_url = "http://detailed-assessment.s3.amazonaws.com/";
			$bucket_path = $bucket_url."PDF/$schoolcode/$request_id/reports";
			$bucket_file = $bucket_path."/$this->examcode/$studentid.pdf";

			$file = $ActualStudentReportPath."/$this->examcode/$studentid.pdf";
			// bucket file or local path 

			if(file_exists($file)) {
				$file_name = basename($file);
				$file_name = "DA".$this->testNo."_".$subArr[$subjectVal]."_".$classVal.$sectionVal.".pdf";
				ob_end_clean();
				header('Content-Type: application/octet-stream');
				header("Content-Transfer-Encoding: Binary"); 
				header("Content-disposition: attachment; filename=\"".$file_name."\""); 
				@readfile($file);
				exit;
			} else {
				$file_headers = @get_headers($bucket_file);
				$fileStatus = $file_headers[0];
				if(strpos($fileStatus,"200")) {
					$file_name = basename($bucket_file);
					$file_name = "DA".$this->testNo."_".$subArr[$subjectVal]."_".$classVal.$sectionVal.".pdf";
					ob_end_clean();
					header('Content-Type: application/octet-stream');
					header("Content-Transfer-Encoding: Binary"); 
					header("Content-disposition: attachment; filename=\"".$file_name."\""); 
					@readfile($bucket_file);
					exit;
				}
			}
		}

	// get correct answere questions and wrong answer questions 
	function getQuestionData(){
		$correctFlag=1;
		foreach($this->correctAnsQues as $key =>$correctQcode) {
			$correctAnsDetailsArr [] = $this->getindivisualQuesData($correctQcode,$correctFlag);
		}

		// sort in ascending order qno
		$qnoOrder =array();
		foreach($correctAnsDetailsArr as $key => $valArr) {
			$qnoOrder[$key]=$valArr['qno'];
		}
		array_multisort($qnoOrder,SORT_ASC,$correctAnsDetailsArr);

		$correctFlag=0;
		foreach($this->wrongAnsQues as $key =>$wrongQcode) {
			$wrongAnsDetailsArr [] = $this->getindivisualQuesData($wrongQcode,$correctFlag);	
		}

		// sort in ascending order qno
		$qnoOrder =array();
		foreach($wrongAnsDetailsArr as $key => $valArr) {
			$qnoOrder[$key]=$valArr['qno'];
		}
		array_multisort($qnoOrder,SORT_ASC,$wrongAnsDetailsArr);

		return array($correctAnsDetailsArr,$wrongAnsDetailsArr);
	}

	//function to get indivisual question data
	function getindivisualQuesData($qcode,$correctFlag) {
		if(array_key_exists($qcode,$this->QueFromVersionTable)){
					
			$QueTblName = "da_questions_versions";
			$Condition = " AND da_questions_versions.version = '".$this->QueFromVersionTable[$qcode]."'";
		}else{
			$QueTblName = "da_questions";
			$Condition = "";
		}

		$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,group_id,
						 $QueTblName.passage_id,qms_passage.passage_name, qms_passage.description
				  FROM $QueTblName
				  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
				  WHERE qcode = '".$qcode."' $Condition";
		//echo "$query <br/> ";
		$dbqry = new dbquery($query,$this->connid);
		$result = $dbqry->getrowarray();
		$passagenamebuffer = 0;
		$passagename = "";

		$question = parseImageTagAll((orig_to_html($result['question'])));
		$optiona = parseImageTagAll((orig_to_html($result['optiona'])));
		$optionb = parseImageTagAll((orig_to_html($result['optionb'])));
		$optionc = parseImageTagAll((orig_to_html($result['optionc'])));
		$optiond = parseImageTagAll((orig_to_html($result['optiond'])));

	//	$mcexplanation = parseImageTagAll((orig_to_html($mcexplanation)));
		$group_id = $result['group_id'];

		$retArr =array('qno'=>($this->questionSeq[$this->paperversion][$qcode]+1),'question'=>$question,'optiona'=>$optiona,'optionb'=>$optionb,
						  'optionc'=>$optionc,'optiond'=>$optiond, 'correct_answer'=>$result['correct_answer'],'qcode'=>$qcode);

		if($result['passage_id']!=0)
			$retArr['passage_id'] =$result['passage_id'];

		if($group_id !=0 )
			$retArr['group_id'] = $group_id;

		// add Group 
		if($correctFlag == 1 && !in_array($group_id,$this->correctGrpId) && $group_id !=0) {

			$this->correctGrpId[]=$group_id;
			$group_text = $this->getGrouptext($group_id);
			$passage_id = $result['passage_id'];
			$retArr['group_text']=parseImageTagAll((orig_to_html($group_text)));
			if($passage_id !=0) {

				$retArr['passage'] = orig_to_html(html_entity_decode($result['description']));
			}
		}
		if($correctFlag == 0 && !in_array($group_id,$this->wrongGrpId) && $group_id !=0) {
			$this->wrongGrpId[]=$group_id;
			$group_text = $this->getGrouptext($group_id);
			$passage_id = $result['passage_id'];
		
			$retArr['group_text']=parseImageTagAll((orig_to_html($group_text)));
			if($passage_id !=0) {
				$retArr['passage']= orig_to_html(html_entity_decode($result['description']));
			}
		}

		return $retArr;
	}

	// set studentName 
	function setStudentName() {

		$query = "SELECT studentName FROM da_studentMaster where studentID 	='".$_SESSION['studentID']."' ";
		$dbquery = new dbquery($query,$this->connid);
		$result = $dbquery->getrowarray();

		$this->studentName = $this->clsdareports->GetOperatedString($result['studentName']);

	}
	// function to set scale out of 
	function setScaleValues($class,$subject,$year) {
		$sc_qry = "SELECT class, e_score_outof, m_score_outof, s_score_outof FROM da_orderBreakup INNER JOIN da_orderMaster
					ON da_orderMaster.order_id = da_orderBreakup.order_id
					WHERE da_orderMaster.schoolCode = '".$_SESSION['school_code']."' AND da_orderMaster.year=$year AND class = '".$class."' GROUP BY da_orderBreakup.class";
		$sdbqry = new dbquery($sc_qry,$this->connid);
		while($score_result = $sdbqry->getrowarray()){

				$ScoreOutOfDetails[$class][1] = $score_result['e_score_outof'];
				$ScoreOutOfDetails[$class][2] = $score_result['m_score_outof'];
				$ScoreOutOfDetails[$class][3] = $score_result['s_score_outof'];
		}
		$this->score_outof = $ScoreOutOfDetails[$class][$subject];
	}
	// function to scale the scores 
	function scaleScore($exam_code,$papercode,$score,$year,$class,$subject) {
		
		if($papercode == '') return '';
		$scaledScore ='';
		$$qcodeList='';

		$totalQues_query = "SELECT da_testRequest.schoolCode,qcode_list from da_examDetails 
							INNER JOIN da_testRequest ON da_testRequest.id =da_examDetails.request_id
							INNER JOIN da_paperDetails ON da_testRequest.paper_code=da_paperDetails.papercode 
							WHERE da_examDetails.exam_code ='".$exam_code."' AND
							da_paperDetails.papercode ='".$papercode."' ";
		$total_dbquery = new dbquery($totalQues_query,$this->connid);
		while($row=$total_dbquery->getrowarray()){
			$qcodeList = $row['qcode_list'];
			$this->schoolcode = $row['schoolCode'];
		}
		$this->totalQuestions = count(explode(',',$qcodeList));
	
		$scaledScore =$this->scaleVal($score);
		return $scaledScore;
	}
	// only scale value got 
	function scaleVal($score) {

		 if($this->score_outof == 0 && $this->score_outof != "")
	    	$scaledScore = round($score,2);
	    elseif($this->score_outof > 0 && $this->score_outof < 100)
	    	$scaledScore = $this->round_to_nearest_half((($score/$this->totalQuestions)*$this->score_outof));
	    else {
	    	# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
	    	//$studentinfo['schoolcode'] == 2528032 || 
	    	if($this->schoolcode == 24668){	    	
	    		$scaledScore = round((($score/$this->totalQuestions)*100));
	    		
	    		// this function is also in eidareports ,same as that
	    		$scaledScore = $this->ConvertPerfoIntoGrade($scaledScore);	
	    	}else {
	    		$scaledScore = round((($score/$this->totalQuestions)*100))."%";
	    	}
	    }

	    return $scaledScore;

	}
	function round_to_nearest_half($number) {

		// currently rounded to 1 digit to be same as eidareports but, need to change to round to nearest half 
    	//return round($number,1);
    	//return number_format((float)$number,1);
    	// changed to round to nearest .5
    	return round($number * 2) / 2;
	}
	function getGrouptext($group_id) {
		$query ="SELECT group_text FROM da_groupMaster WHERE group_id = '".$group_id."' ";
		$dbquery = new dbquery($query,$this->connid);
		$result = $dbquery->getrowarray();
		$group_text = $result['group_text'];

		return $group_text;
	}
	function setTestNo($subjectid,$class,$section,$year){

		$examarr = array();
		$query = "SELECT da_examDetails.exam_code FROM da_examDetails INNER JOIN da_testRequest
					ON da_testRequest.id = da_examDetails.request_id 
					WHERE da_testRequest.year ='$year' 
					 AND  da_testRequest.schoolCode = '".$_SESSION['school_code']."' AND 
					da_testRequest.subject='$subjectid' AND da_testRequest.class='$class'					
					AND da_examDetails.section ='".$section."'
					ORDER by da_testRequest.test_date ";
		//echo "$query <br/>";
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()){
			$examarr[] = $row['exam_code'];
		}

		$retVal = array_search($this->examcode,$examarr);
		return ($retVal+1);

	}

function setDetails($request_id){
	$chk_query = "SELECT regen_id FROM da_reportsRegen WHERE request_id = '".$request_id."' ORDER BY requested_dt DESC limit 1";
		$chk_dbqry = new dbquery($chk_query,$this->connid);
		$chk_result = $chk_dbqry->getrowarray();
		$regenerateid = $chk_result["regen_id"];

		# if we have report regenration request with quetion version than below process
		$VersionQues = array();
		$DropQuesArr = array();
		if($regenerateid != 0){
			
			$dque_query = "SELECT drop_ques FROM da_reportsRegen WHERE regen_id = '".$regenerateid."'";
			$dque_dbqry = new dbquery($dque_query,$this->connid);
			$drop_result = $dque_dbqry->getrowarray();
			if($drop_result["drop_ques"] != "")
				$DropQuesArr = explode(",",$drop_result["drop_ques"]);

			$vquery = "SELECT qcode,version FROM da_reportsRegen_questions WHERE version != 0 AND regen_id = '".$regenerateid."'";
			$vdbqry = new dbquery($vquery,$this->connid);
			while($vrow = $vdbqry->getrowarray()){
				$VersionQues[$vrow["qcode"]] = $vrow["version"];
			}
			
			if(is_array($VersionQues) && count($VersionQues) > 0){
			
				foreach($VersionQues as $qcode => $version){
					$ver_query = "SELECT qcode,correct_answer,misconception FROM da_questions_versions WHERE qcode = '".$qcode."' AND version = '".$version."'";
					$ver_dbqry = new dbquery($ver_query,$this->connid);
					$ver_raw = $ver_dbqry->getrowarray();
					$this->QueFromVersionTable[$qcode] = $version;
					$this->CorrectAnswerArr[$ver_raw['qcode']] = $ver_raw["correct_answer"];
					
					if($ver_raw["misconception"] == 1 && !in_array($qcode,$DropQuesArr)) {
						$misconceptionque_arr[] = $ver_raw['qcode'];
						$this->misconceptionque_arr_with_ans[$ver_raw['qcode']] = $ver_raw['correct_answer'];
					}
				}
			}
		}

		$clsdaquestion = new clsdaquestion();
		$query2 = "SELECT qcode,correct_answer,misconception,lastModified FROM da_questions WHERE qcode IN($this->qcodelist)";
		$dbquery2 = new dbquery($query2,$this->connid);
		while($row2 = $dbquery2->getrowarray()){

			if(!array_key_exists($row2["qcode"],$VersionQues)){ // if its in version question than we don't have to consider

				$QueTableResultArr = $clsdaquestion->GetQueTableAndVersion($this->connid,$row2["qcode"],$this->approved_date,$row2["lastModified"]);

				if($QueTableResultArr["tablename"] == "da_questions_versions"){
					
					$this->CorrectAnswerArr[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					$this->QueFromVersionTable[$row2["qcode"]] = $QueTableResultArr["version"];
					if($QueTableResultArr["misconception"] == 1 && !in_array($row2['qcode'],$DropQuesArr)){
						$misconceptionque_arr[] = $row2['qcode'];
						$this->misconceptionque_arr_with_ans[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					}
				}
				else{
					$this->CorrectAnswerArr[$row2['qcode']] = $row2["correct_answer"];
					if($row2["misconception"] == 1 && !in_array($row2['qcode'],$DropQuesArr)) {
						$misconceptionque_arr[] = $row2['qcode'];
						$this->misconceptionque_arr_with_ans[$row2['qcode']] = $row2['correct_answer'];
					}
				}
			}	
		}
	}
	function ajaxGetQuestionData($exam_code,$qcodeList,$paperversion,$correctFlag) {

		if($exam_code =='') return ;
		$qcodeList = str_replace(":",",",$qcodeList);
		$this->qcodelist = $qcodeList;
		$this->paperversion =$paperversion;
		$this->examcode = $exam_code;
		

		$qcodeArr = explode(",",$qcodeList);
		$req_query = "SELECT da_examDetails.request_id,da_testRequest.approved_date,da_testRequest.paper_code FROM da_examDetails 
					  INNER JOIN da_testRequest ON da_testRequest.id = da_examDetails.request_id 
					  WHERE exam_code='".$exam_code."' ";					  
		$dbquery = new dbquery($req_query,$this->connid);
		while($row = $dbquery->getrowarray()) {
			$this->approved_date = $row['approved_date'];
			$request_id = $row['request_id'];
			$this->papercode= $row['paper_code'];
		}
		$this->setPaperwiseSeq();
		$this->setDetails($request_id);
		$this->studentAnswerArr = $this->getSubtopicWiseStudentAnswer();
		foreach($qcodeArr as $key =>$Qcode) {
			$AnsDetailsArr [] = $this->getindivisualQuesData($Qcode,$correctFlag);
		}

		// sort in ascending order qno
		$qnoOrder =array();
		foreach($AnsDetailsArr as $key => $valArr) {
			$qnoOrder[$key]=$valArr['qno'];
		}
		array_multisort($qnoOrder,SORT_ASC,$AnsDetailsArr);

		// passage re assigned to the re ordered Questions and also the Group
		$AnsDetailsArr = $this->resetQuestionPassageOrder($AnsDetailsArr);

		// build the string to display questions 
		return $AnsDetailsArr;

	}

	// function to set paperwise question sequence 
	function setPaperwiseSeq() {
		$questionquery = "SELECT papercode,version,qcode_list FROM da_paperDetails WHERE papercode = '".$this->papercode."' ORDER BY papercode";
		$dbqueqry = new dbquery($questionquery,$this->connid);
		while($querow = $dbqueqry->getrowarray()){
			$this->paperwiseQueSeq[$querow['version']] = explode(",",$querow['qcode_list']);			
			$qcodelist = $querow['qcode_list'];
		}

		$totalQuestions = 0;
		if($qcodelist !='')
		{
			$this->totalQuestions = count(explode(",",$qcodelist));
			$this->qcodelist= $qcodelist;

		}

		foreach($this->paperwiseQueSeq as $paper => $quesarray){
			$this->questionSeq[$paper] = array_flip($quesarray);
		}
	}

	// function to convert perf to grade , same as eidareports
	function ConvertPerfoIntoGrade($perfo){
		
		if($perfo == "") return;
		
		if($perfo >= 90 && $perfo <= 100) $grade = "A+";
		else if($perfo >= 80 && $perfo < 90) $grade = "A";
		else if($perfo >= 70 && $perfo < 80) $grade = "B";
		else if($perfo >= 60 && $perfo < 70) $grade = "C";
		else if($perfo >= 50 && $perfo < 60) $grade = "D";
		else if($perfo >= 44 && $perfo < 50) $grade = "E";
		else if($perfo > 0 && $perfo < 44) $grade = "F";
		else $grade = "-";
		
		return $grade;
	}
	
	// function to get all questions of a paper for Revision taking 
	function ajaxGetRevisionQuesData($request_id){
		$retArr =array();
		$paperversion =1;
		$query ="SELECT da_paperDetails.qcode_list, da_testRequest.approved_date,da_testRequest.subject FROM da_testRequest INNER JOIN da_paperDetails 
				ON da_testRequest.paper_code = da_paperDetails.papercode
				WHERE da_testRequest.id = $request_id AND da_paperDetails.version = $paperversion";
		//echo "$query <br>";
		$dbquery = new dbquery($query,$this->connid);
		while($row= $dbquery->getrowarray()){
			$qcodeList = $row['qcode_list'];
			$approved_date = $row['approved_date'];
			$subject = $row['subject'];
		}
		// get the latest Question Version 
		if($qcodeList !='') {
			$quesArr = explode(',',$qcodeList);

			// get Latest Version of the questions approved 
			list($retArr,$qcodeList) = $this->getLatestVerQues($qcodeList,$subject);

			return array($retArr,$qcodeList);

		}		
	}

	// function to get Latest version of the questions for revision screen
	function getLatestVerQues($qcodeList,$subject) {

		$groupQues= array();
		$index =0;
		$prevGroupId=0;
	    $prevgroupid = -1;
        $prevpassageid = 0;
        $prevGrpid ="";
        $quesArr = array();
		//$condition =" AND da_questions.status =3 ";
		$condition =" ";
		$query = "SELECT qcode,question,optiona,optionb,optionc,optiond,correct_answer,group_id,da_questions.status,
						 da_questions.passage_id,qms_passage.passage_name, qms_passage.description
				  FROM da_questions
				  LEFT JOIN qms_passage ON da_questions.passage_id = qms_passage.passage_id
				  WHERE qcode in (".$qcodeList.") $condition
				  ORDER BY FIELD (qcode,".$qcodeList." )";
		$dbqry = new dbquery($query,$this->connid);

		while($result_row = $dbqry->getrowarray()) {
			$index++;
			$passagenamebuffer = 0;
			$passagename = "";
			$addBoxFlag= 0;
			if($prevpassageid!=$result_row['passage_id'] && $prevpassageid!=0) {
				$addBoxFlag=1;
			}
		
			$dbString= 'result_row';
			if($result_row['status'] != 3 ) {
				$dbString = 'version_row';
				$version_query = "SELECT qcode,question,optiona,optionb,optionc,optiond,correct_answer,group_id,da_questions_versions.status,
						 da_questions_versions.passage_id,qms_passage.passage_name, qms_passage.description
				  FROM da_questions_versions
				  LEFT JOIN qms_passage ON da_questions_versions.passage_id = qms_passage.passage_id
				  WHERE qcode =".$result_row['qcode']." and da_questions_versions.status =3 order by version desc limit 1 ";
				  $version_dbquery = new dbquery($version_query,$this->connid);
				  $version_row = $version_dbquery->getrowarray(); //exit();
			}

			$question = parseImageTagAll((orig_to_html(${$dbString}['question'])));
			$optiona = parseImageTagAll((orig_to_html(${$dbString}['optiona'])));
			$optionb = parseImageTagAll((orig_to_html(${$dbString}['optionb'])));
			$optionc = parseImageTagAll((orig_to_html(${$dbString}['optionc'])));
			$optiond = parseImageTagAll((orig_to_html(${$dbString}['optiond'])));

		//	$mcexplanation = parseImageTagAll((orig_to_html($mcexplanation)));
			$group_id = ${$dbString}['group_id'];
			$prevGrpid = ${$dbString}['group_id'];

			$retArr[${$dbString}['qcode']] =array('qno'=>$index,'question'=>$question,'optiona'=>$optiona,'optionb'=>$optionb,
							  'optionc'=>$optionc,'optiond'=>$optiond, 'correct_answer'=>${$dbString}['correct_answer'],'qcode'=>${$dbString}['qcode']);
	
			if(${$dbString}['passage_id']!=0)
				$retArr[${$dbString}['qcode']]['passage_id'] =${$dbString}['passage_id'];

			if($group_id !=0 )
				$retArr[${$dbString}['qcode']]['group_id'] = $group_id;

			$quesArr [] = ${$dbString}['qcode'];
			// add Group 
			if( !in_array($group_id,$groupQues) && $group_id !=0) {

				$groupQues[]=$group_id;
				$group_text = $this->getGrouptext($group_id);
				$passage_id = ${$dbString}['passage_id'];
				$retArr[${$dbString}['qcode']]['group_text']=parseImageTagAll((orig_to_html($group_text)));
				if($passage_id !=0) {

					$retArr[${$dbString}['qcode']]['passage'] = orig_to_html(html_entity_decode(${$dbString}['description']));
				}
			}
			

			if($addBoxFlag == 1 ) {
				$retArr[${$dbString}['qcode']]['addBox'] =1;
			}

			 if(${$dbString}['group_id']!="" && ${$dbString}['group_id']!=0) {

		       $group_id = ${$dbString}['group_id'];
			    if($prevgroupid==-1 || $prevgroupid!=$group_id) { //If first question in the group, print group text.
			    	$prevgroupid = $group_id;

			        if(${$dbString}['passage_id']!=0 && $prevpassageid!=${$dbString}['passage_id'])  {  
			    		$prevpassageid = ${$dbString}['passage_id'];
			        }
			      }
			  } else {
			  		$group_id=0;
           			$prevpassageid=0;
			  }			 
	
		} // end While 

		$queslist =implode(",",$quesArr);

		return array($retArr,$queslist);
	}

	// reset Questions passage order and group order so the first question has the passage text 
	function resetQuestionPassageOrder($AnsDetailsArr) {
		$passageStoredQues=array();
		$passagesStartQues=array();
		$groupStartQues=array();
		$groupStoredQues=array();
		$passageEndQues=array();

		foreach($AnsDetailsArr as $id => $listArr){
			if(isset($listArr['passage_id']) && $listArr['passage_id'] !=0){
				if(!isset($passagesStartQues[$listArr['passage_id']]))
					$passagesStartQues[$listArr['passage_id']]=$id;

				if(isset($listArr['passage'])){
					if(!isset($passageStoredQues[$listArr['passage_id']])){
						$passageStoredQues[$listArr['passage_id']]=$id;
					}
				}

				$passageEndQues[$listArr['passage_id']]=$id;
			}
			if(isset($listArr['group_id']) && $listArr['group_id'] !=0){	
				if(!isset($groupStartQues[$listArr['group_id']]))
					$groupStartQues[$listArr['group_id']]=$id;

				if(isset($listArr['group_text'])){
					if(!isset($groupStoredQues[$listArr['group_id']])){
						$groupStoredQues[$listArr['group_id']]=$id;
					}
				}
			}
		}
			
		foreach($passageStoredQues as $passid => $index	) {
			if($index != $passagesStartQues[$passid]) {
				$AnsDetailsArr[$passagesStartQues[$passid]]['passage']=$AnsDetailsArr[$index]['passage'];
				unset($AnsDetailsArr[$index]['passage']);
			}
		}
		foreach($groupStoredQues as $groupid => $Arrindex	) {
			if($Arrindex != $groupStartQues[$groupid]) {
				$AnsDetailsArr[$groupStartQues[$groupid]]['group_text']=$AnsDetailsArr[$Arrindex]['group_text'];
				unset($AnsDetailsArr[$Arrindex]['group_text']);
			}
		}
		foreach($passageEndQues as $passid => $orgIndex) {
			// to add end of passage box
			$AnsDetailsArr[$orgIndex]['addBox']	=1;
		}

		return $AnsDetailsArr;
	}

	// function to get exam score  for display in Try at Home 
	function getExamScore($examCode) {
		$score =0;
		$query = "SELECT total FROM da_response WHERE studentID =".$_SESSION['studentID']." AND examcode ='".$examCode."' ";
		$dbquery = new dbquery($query,$this->connid); 
		while($row = $dbquery->getrowarray()){
			$score = $row['total'];
		}
		return $score;
	}
	// function to insert retest score if studentid and exam row exist replace 
	function insertScore($examCode,$retestScore){
		$query = "REPLACE INTO da_hometryScore SET studentID =".$_SESSION['studentID']." , examcode ='".$examCode."', score = ".$retestScore.",
					attempted_dt = NOW() ";
		$dbquery = new dbquery($query,$this->connid);
	}
	// function to get Exam result for student
	function getRevisionStatus($examCodeArr) {
		$examCodeStr = '';
		$retestArr =array();
		foreach($examCodeArr as $eKey =>$examCode) {
			$examCodeStr .="'".$examCode."',";
		}
		if($examCodeStr == '') 
			return $retestArr;

		$examCodeStr = rtrim($examCodeStr,',');

		$query = "SELECT examcode, score, attempted_dt FROM da_hometryScore WHERE 
					studentID = ".$_SESSION['studentID']." AND examcode in  (".$examCodeStr.")";
		$dbquery = new dbquery($query,$this->connid);
		while($row= $dbquery->getrowarray()) {
			$retestArr[$row['examcode']] = array('retestScore'=>$row['score'], 'entered_date'=>$row['attempted_dt']); 
		}
		return $retestArr;
	}

	// function to get rev exam details for subject selected 
	function getRevTestDetails($studentDetails,$year,$revClass) {

		$query = "SELECT da_testRequest.id,da_testRequest.subject,da_testRequest.test_date, da_testRequest.scoring_date,
					da_examDetails.exam_code, da_examDetails.report_status, da_examDetails.display_status,
					da_testRequest.testName, da_response.studentID, da_response.paperversion,da_testRequest.paper_code,
					da_testRequest.class,da_testRequest.year, da_testRequest.chapter_id, da_response.total		
					FROM da_testRequest INNER JOIN da_examDetails 
					ON da_testRequest.id=da_examDetails.request_id 
					LEFT JOIN da_response ON da_examDetails.exam_code = da_response.examcode AND da_response.studentID ='".$_SESSION['studentID']."'
					WHERE da_testRequest.year='".$year."' AND da_testRequest.schoolCode ='".$_SESSION['school_code']."'
					AND da_testRequest.class ='".$studentDetails['class']."'
					AND da_examDetails.section ='".$studentDetails['section']."'
					AND da_examDetails.report_status='generated' AND da_testRequest.subject =$revClass
					ORDER by test_date ";
		$dbquery = new dbquery($query,$this->connid);
		return $dbquery;
	}
    
    /** Function getStudentsWhoHaveDoneRevision
    * 
    * Returns the number of active students for the given school for the given year
    * @param ($date_range) array should have from and till key. @example array('from' => '2014-08-31', 'till' => null)
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @return (number) count of students who have given atleast one revision test.  
    *
    */
    
    function getStudentsWhoHaveDoneRevision($date_range, $class = null,$section = null,$schoolcode = null, $year = null){ 
        if(empty($year)){
            $year = date('Y');
        }
        $studentRevisionQuery = 
                "SELECT COUNT(da_studentMaster.studentID) as count,  da_testRequest.subject , da_studAcadDetails.rollNo, da_studentMaster.studentName, da_studentMaster.studentID,da_studAcadDetails.class, da_studAcadDetails.section FROM da_hometryScore "
                . " INNER JOIN da_examDetails ON da_hometryScore.examcode = da_examDetails.exam_code "
                . " INNER JOIN da_testRequest ON da_testRequest.id = da_examDetails.request_id "
                . " INNER JOIN da_studentMaster ON da_hometryScore.studentID = da_studentMaster.studentID AND da_studentMaster.enabled = 1"
                . " INNER JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID AND da_studAcadDetails.status = 1 AND da_studAcadDetails.year = '$year' "
                . " WHERE  1 = 1";        
        if(empty($date_range['from'])){
           $date_range['from'] =  date('Y-m-01');
        }
        if(empty($date_range['till'])){
            $date_range['till'] = date('Y-m-t');
        }
       
        if(!empty($class)){
            $studentRevisionQuery .= " AND da_testRequest.class = '$class'";
        }
        if(!empty($section)){
            $studentRevisionQuery .= " AND da_examDetails.section = '$section'";
        }
        if(!empty($schoolcode)){
            $studentRevisionQuery .= " AND da_testRequest.schoolCode = '$schoolcode'";
        }
        $studentRevisionQuery .= " AND da_hometryScore.attempted_dt >= '$date_range[from]' AND da_hometryScore.attempted_dt <= '$date_range[till]'"
                . " GROUP BY da_studentMaster.studentID, da_testRequest.subject";
        $studentRevisionQuery .= " ORDER BY da_studAcadDetails.class, da_studAcadDetails.section, da_studAcadDetails.rollNo";
        $dbqry = new dbquery($studentRevisionQuery,$this->connid);
        $studs = array();
        $subjectwiseGroupedStuds = array();
        while($row = $dbqry->getrowassocarray()){
            $row['subject'] = $this->getSubjectName($row['subject']);
            if(!isset($subjectwiseGroupedStuds[$row['studentID']])){
                $row[$row['subject']] = $row['count'];
                unset($row['count']);
                unset($row['subject']);
                $subjectwiseGroupedStuds[$row['studentID']] = $row;               
            }else{
                $subjectwiseGroupedStuds[$row['studentID']][$row['subject']] = $row['count'];
            }
            $studs[] = $row;
        }
        usort($subjectwiseGroupedStuds,
            function ($a, $b) {
                $c = strcmp($a['class'], $b['class']);
                if($c != 0) {
                    return $c;
                }

                $c = strcmp($a['section'], $b['section']);
                if($c != 0) {
                    return $c;
                }                
                return (int)$a['rollNo'] > (int)$b['rollNo'];
            }
        );
        return $subjectwiseGroupedStuds;    
    }
                
    
    private function generateTryFromHomeQuery($identifier, $date_range, $class,$section,$schoolcode, $year){
        $tryAtHomeQuery = "SELECT DISTINCT(da_hometryScore.studentID) as studentID FROM da_hometryScore "
                . " INNER JOIN da_studentMaster ON (da_studentMaster.$identifier = da_hometryScore.studentID AND da_studentMaster.schoolCode = '$schoolcode') "
                . " INNER JOIN da_studAcadDetails ON (da_studAcadDetails.studentID = da_hometryScore.studentID AND da_studAcadDetails.status = 1 AND da_studAcadDetails.year = '$year') "
                . " WHERE da_hometryScore.attempted_dt >= '$date_range[from]' AND da_hometryScore.attempted_dt <= '$date_range[till]' ";                
        
        if(!is_null($class) && $class != ''){
            $tryAtHomeQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section) && $section != ''){
            $tryAtHomeQuery .= " AND da_studAcadDetails.section = '$section'";
        }    
        return $tryAtHomeQuery;
    }
    
    
    /** Function getStudentsWhoHaveNotDoneRevision
    * 
    * Returns the number of active students for the given school for the given year
    * @param ($date_range) array should have from and till key. @example array('from' => '2014-08-31', 'till' => null)
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @return (number) count of students who have given atleast one revision test.  
    *
    */
    
    
    function getStudentsWhoHaveNotDoneRevision($date_range, $class = null,$section = null,$schoolcode = null, $year = null){ 
        if(empty($year)){
            $year = date('Y');
        }
        if(empty($date_range['from'])){
           $date_range['from'] =  date('Y-m-01');
        }
        if(empty($date_range['till'])){
            $date_range['till'] = date('Y-m-t');
        }        
        if(empty($schoolcode)){
            return false;
        }
        $studentIdsTryFromQuery = $this->generateTryFromHomeQuery('studentID',$date_range, $class,$section,$schoolcode, $year);
        $dbqry = new dbquery($studentIdsTryFromQuery,$this->connid);
        $studids = array();        
        while($row = $dbqry->getrowassocarray()){
            $studids[] = $row['studentID'];
        }
        $studIDsString = "'". implode("','", $studids) . "'";
               
        $schoolStudentQuery  = "SELECT da_studentMaster.studentID, da_studAcadDetails.rollNo, da_studentMaster.studentName, da_studentMaster.email, da_studentMaster.class, da_studentMaster.section FROM da_studentMaster "
                . " INNER JOIN da_studAcadDetails ON da_studAcadDetails.studentID = da_studentMaster.studentID "
                . " AND da_studAcadDetails.year = '$year' AND da_studentMaster.enabled = 1 AND schoolcode = '$schoolcode' "
                . " AND da_studAcadDetails.status = 1 WHERE  da_studentMaster.studentID NOT IN ($studIDsString)";
        
        if(!is_null($class) && $class != ''){
            $schoolStudentQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section) && $section != ''){
            $schoolStudentQuery .= " AND da_studAcadDetails.section = '$section'";
        }
        $schoolStudentQuery .= " ORDER BY da_studAcadDetails.class, da_studAcadDetails.section, da_studAcadDetails.rollNo";
        $dbqry->executequery($schoolStudentQuery);                       
        $studs = array();
        while($row = $dbqry->getrowassocarray()){
            $studs[] = $row;
        }
        return $studs;
    }
            
    /** Function getStudentCountWhoHaveDoneRevision
    * 
    * Returns the number of active students for the given school for the given year
    * @param ($date_range) array should have from and till key. @example array('from' => '2014-08-31', 'till' => null)
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @return (number) count of students who have given atleast one revision test.  
    *
    */
    
    function getStudentCountWhoHaveDoneRevision($date_range, $class = null,$section = null,$schoolcode = null){ 
        $studentRevisionCountQuery = "SELECT COUNT(DISTINCT(studentID)) as count FROM da_hometryScore "
                . " INNER JOIN da_examDetails ON da_hometryScore.examcode = da_examDetails.exam_code "
                . " INNER JOIN da_testRequest ON da_testRequest.id = da_examDetails.request_id "
                . " WHERE  1 = 1";        
        if(empty($date_range['from'])){
           $date_range['from'] =  date('Y-m-01');
        }
        if(empty($date_range['till'])){
            $date_range['till'] = date('Y-m-t');
        }
        if(!empty($class)){
            $studentRevisionCountQuery .= " AND da_testRequest.class = '$class'";
        }
        if(!empty($section)){
            $studentRevisionCountQuery .= " AND da_examDetails.section = '$section'";
        }
        if(!empty($schoolcode)){
            $studentRevisionCountQuery .= " AND da_testRequest.schoolCode = '$schoolcode'";
        }
        $studentRevisionCountQuery .= " AND da_hometryScore.attempted_dt >= '$date_range[from]' AND da_hometryScore.attempted_dt <= '$date_range[till]'";
        $dbqry = new dbquery($studentRevisionCountQuery,$this->connid);
        $row = $dbqry->getrowassocarray();
        return $row['count'];    
    }
    
    
    /** Function getMaximumTryFromHome
    * 
    * Returns the number of active students for the given school for the given year
    * @param ($date_range) array should have from and till key. @example array('from' => '2014-08-31', 'till' => null)
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @return (number) count of students who have given atleast one revision test.  
    *
    */
    
    function getMaximumTryFromHome($date_range, $class = null,$section = null, $schoolcode = null){ 
        $highestTryFromHomeCountByAnyStudent = "SELECT MAX(view.count) as count FROM (SELECT COUNT(da_hometryScore.studentID) as count FROM da_hometryScore "
                . " INNER JOIN da_examDetails ON da_hometryScore.examcode = da_examDetails.exam_code "
                . " INNER JOIN da_testRequest ON da_testRequest.id = da_examDetails.request_id "
                . " WHERE  1 = 1";        
        if(empty($date_range['from'])){
           $date_range['from'] =  date('Y-m-01');
        }
        if(empty($date_range['till'])){
            $date_range['till'] = date('Y-m-t');
        }
        if(!empty($class)){
            $highestTryFromHomeCountByAnyStudent .= " AND da_testRequest.class = '$class'";
        }
        if(!empty($section)){
            $highestTryFromHomeCountByAnyStudent .= " AND da_examDetails.section = '$section'";
        }
        if(!empty($schoolcode)){
            $highestTryFromHomeCountByAnyStudent .= " AND da_testRequest.schoolCode = '$schoolcode'";
        }
        $highestTryFromHomeCountByAnyStudent .= " AND da_hometryScore.attempted_dt >= '$date_range[from]' AND da_hometryScore.attempted_dt <= '$date_range[till]'"
                . " GROUP BY da_hometryScore.studentID, da_testRequest.subject) as view";
        $dbqry = new dbquery($highestTryFromHomeCountByAnyStudent,$this->connid);
        $row = $dbqry->getrowassocarray();
        if(is_null($row['count'])){
            return 0;
        }
        return $row['count'];    
    }
    
    private function getSubjectName($subjectcode){
        $subjects = array(
            '1' => 'English',
            '2' => 'Maths',
            '3' => 'Science',
            '4' => 'SS',
            '100' => 'General Assessments'
        );
        return isset($subjects[$subjectcode]) ? $subjects[$subjectcode] : $subjectcode;
    }
    
    
    public function getScoreOutOfDetails($schoolcode, $year, $class, $sdbqry = null){
        $scoreOutOfDetails = array();
        $sc_qry = "SELECT class, e_score_outof, m_score_outof, s_score_outof "
                . " FROM da_orderBreakup "
                . " INNER JOIN da_orderMaster"
                . " ON da_orderMaster.order_id = da_orderBreakup.order_id"
                . " WHERE da_orderMaster.schoolCode = '$schoolcode' AND da_orderMaster.year = '$year' AND class = '$class' "
                . " GROUP BY da_orderBreakup.class";
        if($sdbqry === null){
            $sdbqry = new dbquery(null, $this->connid);
        }
        $sdbqry->executequery($sc_qry);
        while($score_result = $sdbqry->getrowarray()){
            $scoreOutOfDetails[$class][1] = $score_result['e_score_outof'];
            $scoreOutOfDetails[$class][2] = $score_result['m_score_outof'];
            $scoreOutOfDetails[$class][3] = $score_result['s_score_outof'];
        }    
        return $scoreOutOfDetails;
    }
    
    public function getReportingDetails($papercode){
        $reportingDetails = array();        
        $repqry = "SELECT reporting_id, papercode, sst_list, qcode_list, reporting_head FROM da_reportingDetails WHERE papercode = '$papercode' ORDER BY reporting_order";
        $repdbqry = new dbquery($repqry,$this->connid);
        $reportingQuesArr = array();
        $reportingTopicArr = array();
        while($reportingrow = $repdbqry->getrowarray()){
            $reportingTopicArr[$reportingrow['reporting_id']] = $reportingrow['reporting_head'];
            $reportingQuesArr[$reportingrow['reporting_id']] = explode(",",$reportingrow['qcode_list']);
        }
        $reportingDetails['reporting_questions'] = $reportingQuesArr;
        $reportingDetails['reporting_topics'] = $reportingTopicArr;
        return $reportingDetails;
    }


    public function getAverageScoreFromTotal($total, $totalQuestions, $orderDetails){
        
        $scoreOutOf = $orderDetails['score_out_of'];
        $schoolCode = $orderDetails['school_code'];
        
        $studentAvgPerfo = null;
		// end class highest display
        if($scoreOutOf == 0 && $scoreOutOf != "")
	    	$studentAvgPerfo = round($total,1);
	    elseif($scoreOutOf > 0 && $scoreOutOf < 100)
	    	$studentAvgPerfo = $this->round_to_nearest_half((($total / $totalQuestions) * $scoreOutOf));
	    else {
	    	# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
	    	if($schoolCode == 24668){
	    		$studentAvgPerfo = $this->clsdareports->ConvertPerfoIntoGrade($studentAvgPerfo);	
	    	}else {
	    		$studentAvgPerfo = round((($total / $totalQuestions)*100))."%";
	    	}
	    }
        return $studentAvgPerfo;
    }
    
}


clsdahtmlreports::$statisticsDefaultStartDate = date('Y-m-01');
clsdahtmlreports::$statisticsDefaultEndDate = date('Y-m-t');
?>
