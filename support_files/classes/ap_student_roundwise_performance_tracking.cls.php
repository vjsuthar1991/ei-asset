<?php

class clsstudentperformance
{
	var $district;
	var $mandal;
	var $apfschoolcode;
	var $studentcode;
	var $mathstotal;
	var $telugutotal;
	var $studenttotal;
	var $mathspercentile;
	var $telugupercentile;
	var $studentpercentile;
	var $teachercode;
	var $action;
	
	var $treatment1;
	var $treatment2;
	var $treatment3;
	var $treatment4;
	var $treatment5;
	var $treatment6;
	var $treatment7;
	var $class1;
	var $class2;
	var $class3;
	var $class4;
	var $class5;
	var $subject1;
	var $subject2;
	var $Y0_BEL;
	var $Y1_SEL;
	var $Y2_SEL;
	var $Y1_HEL;
	var $Y2_HEL;
	var $questiontype;
	var $reportlevel;
	var $reporttype;
	var $skill;
	var $clspaging;
	
	// Maths Total Condition - mtc
	var $mtc_condition;
	var $mtc_value;
	// Telugu Total Condition - ttc
	var $ttc_condition;
	var $ttc_value;
	// Student Total Condition - ttc
	var $stc_condition;
	var $stc_value;
	var $questionMechConceArray;
	var $questionMCQArray;
	var $questionOptionsArray;
	var $datatoexport;
	
	function clsstudentperformance()
	{
		$this->district="";
		$this->mandal="";
		$this->apfschoolcode=0;
		$this->studentcode="";
		$this->mathstotal="";
		$this->telugutotal="";
		$this->studenttotal="";
		$this->mathspercentile="";
		$this->telugupercentile="";
		$this->studentpercentile="";
		$this->teachercode="";
		$this->action="";
		
		$this->treatment1="";
		$this->treatment2="";
		$this->treatment3="";
		$this->treatment4="";
		$this->treatment5="";
		$this->treatment6="";
		$this->treatment7="";
		$this->class1="";
		$this->class2="";
		$this->class3="";
		$this->class4="";
		$this->class5="";
		$this->subject1="";
		$this->subject2="";
		$this->Y0_BEL="";
		$this->Y1_SEL="";
		$this->Y2_SEL="";
		$this->Y1_HEL="";
		$this->Y2_HEL="";
		$this->questiontype="";
		$this->reportlevel="";
		$this->reporttype="";
		$this->skill="";
				
		$this->clspaging = new clspaging('aprestcts');
		$this->clspaging->sortby = "APFSchoolCode"; 
		$this->clspaging->numofrecsperpage=100;
		
		$this->mtc_condition="";
		$this->mtc_value=0;
		$this->ttc_condition="";
		$this->ttc_value=0;
		$this->stc_condition="";
		$this->stc_value=0;
		$this->questionMechConceArray=array();
		$this->questionMCQArray=array();
		$this->questionOptionsArray=array();
		$this->datatoexport="";
			
  	}

  	function setgetvars()
	{
		if(isset($_GET["apfschoolcode"])) $this->apfschoolcode   = $_GET["apfschoolcode"];
		if(isset($_GET["studentcode"])) $this->studentcode       = $_GET["studentcode"];
		if(isset($_GET["schoolcode"])) $this->apfschoolcode      =  $_GET["schoolcode"];
		if(isset($_GET["subject"])) $this->subject               =  $_GET["subject"];
		if(isset($_GET["teacher_code"])) $this->teachercode      =  $_GET["teacher_code"];
		if(isset($_GET["datatoexport"])) $this->datatoexport     =  $_GET["datatoexport"];
	}

	function setpostvars()
	{
		/*echo "<pre>";
		print_r($_POST);
		echo "</pre>";*/
		//exit;
		if(isset($_POST["district"])) $this->district       			= $_POST["district"];
		if(isset($_POST["hdn_mandal"]) && $_POST["hdn_mandal"] !="") 	$this->mandal = $_POST["hdn_mandal"];
		if(isset($_POST["mandal"]) && $_POST["mandal"] != "") 			$this->mandal = $_POST["mandal"];
		if(isset($_POST["hdn_apfschoolcode"])) $this->apfschoolcode    	= $_POST["hdn_apfschoolcode"];
		if(isset($_POST["apfschoolcode"])) $this->apfschoolcode     	= $_POST["apfschoolcode"];
		if(isset($_POST["studentcode"])) $this->studentcode         	= $_POST["studentcode"];
		if(isset($_POST["mathsTotal"])) $this->mathstotal           	= $_POST["mathsTotal"];
		if(isset($_POST["teluguTotal"])) $this->telugutotal         	= $_POST["teluguTotal"];
		if(isset($_POST["studentTotal"])) $this->studenttotal       	= $_POST["studentTotal"];
		if(isset($_POST["mathsPercentile"])) $this->mathspercentile 	= $_POST["mathsPercentile"];
		if(isset($_POST["teluguPercentile"])) $this->telugupercentile   = $_POST["teluguPercentile"];
		if(isset($_POST["studentPercentile"])) $this->studentpercentile	= $_POST["studentPercentile"];
		if(isset($_POST["teacher_code"])) $this->teachercode   			= $_POST["teacher_code"];
		if(isset($_POST["actiontoperform"])) $this->action          	= $_POST["actiontoperform"];
		if(isset($_POST["treatment1"])) $this->treatment1=$_POST["treatment1"];
		if(isset($_POST["treatment2"])) $this->treatment2=$_POST["treatment2"];
		if(isset($_POST["treatment3"])) $this->treatment3=$_POST["treatment3"];
		if(isset($_POST["treatment4"])) $this->treatment4=$_POST["treatment4"];
		if(isset($_POST["treatment5"])) $this->treatment5=$_POST["treatment5"];
		if(isset($_POST["treatment6"])) $this->treatment6=$_POST["treatment6"];
		if(isset($_POST["treatment7"])) $this->treatment7=$_POST["treatment7"];
		if(isset($_POST["class1"])) $this->class1=$_POST["class1"];
		if(isset($_POST["class2"])) $this->class2=$_POST["class2"];
		if(isset($_POST["class3"])) $this->class3=$_POST["class3"];
		if(isset($_POST["class4"])) $this->class4=$_POST["class4"];
		if(isset($_POST["class5"])) $this->class5=$_POST["class5"];
		if(isset($_POST["subject1"])) $this->subject1=$_POST["subject1"];
		if(isset($_POST["subject2"])) $this->subject2=$_POST["subject2"];
		if(isset($_POST["Y0_BEL"])) $this->Y0_BEL=$_POST["Y0_BEL"];
		if(isset($_POST["Y1_SEL"])) $this->Y1_SEL=$_POST["Y1_SEL"];
		if(isset($_POST["Y2_SEL"])) $this->Y2_SEL=$_POST["Y2_SEL"];
		if(isset($_POST["Y1_HEL"])) $this->Y1_HEL=$_POST["Y1_HEL"];
		if(isset($_POST["Y2_HEL"])) $this->Y2_HEL=$_POST["Y2_HEL"];
		if(isset($_POST["questiontype"])) $this->questiontype=$_POST["questiontype"];
		if(isset($_POST["reportlevel"])) $this->reportlevel=$_POST["reportlevel"];
		if(isset($_POST["reporttype"])) $this->reporttype=$_POST["reporttype"];
		if(isset($_POST["skill"])) $this->skill=$_POST["skill"];
		
		if(isset($_POST["mtc_condition"])) $this->mtc_condition   	= $_POST["mtc_condition"];
		if(isset($_POST["mtc_value"])) $this->mtc_value   = $_POST["mtc_value"];
		if(isset($_POST["ttc_condition"])) $this->ttc_condition   	= $_POST["ttc_condition"];
		if(isset($_POST["ttc_value"])) $this->ttc_value   = $_POST["ttc_value"];
		if(isset($_POST["stc_condition"])) $this->stc_condition   	= $_POST["stc_condition"];
		if(isset($_POST["stc_value"])) $this->stc_value   = $_POST["stc_value"];
		
    }

    // Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (22/11/2007) - For fetching schoolwise student's data
    function pageCTSData($connid)
	{
		$this->clspaging->setpostvars();
		$this->questionMechConceArray = $this->prepareQuestionMechConcArray($connid);
		$this->questionMCQArray = $this->prepareQuestionMCQArray($connid);
		$this->questionOptionsArray = $this->prepareQuestionOptionsArray($connid);
		$roundarray = array("Jul2005","Feb2006","Feb2007","Mar2006","Mar2007");
		$roundNameArray = array("Y0_BEL","Y1_SEL","Y2_SEL","Y1_HEL","Y2_HEL");
		$assessmentTableNameArray = array('assessmentap_bel','assessmentap_sel','assessmentap_sel_y2','assessmentap_hel','assessmentap_hel_y2');
		$ansCodeTableNameArray = array('anscode_master_bel','anscode_master_sel','anscode_master_sel_y2','anscode_master_hel','anscode_master_hel_y2');
		
		if($this->action == "Fetch Student Performance")
		{
			$output_string_master = "";
			$schoolcodelist="";
			if($this->apfschoolcode==0)
			{
				$condition = " WHERE DistrictName='".$this->district."'";
				if($this->mandal!="")
					$condition .= " AND MandalName='".$this->mandal."'";
				$condition1 = $this->prepareTreatementCondition();
	    		if($condition1 != "")
					$condition .=$condition1;
					
				$schoolquery = "SELECT APFSchoolCode FROM school_master_allocation_y2".$condition." ORDER BY APFSchoolCode" ;
				//echo $schoolquery; //exit;
				$dbquery = new dbquery($schoolquery,$connid);
				
				while($row = $dbquery->getrowarray())
				{
					$schoolcodelist .= $row["APFSchoolCode"].",";
				}
				$schoolcodelist = substr($schoolcodelist, 0, -1);
			}
			else
			{
				$schoolcodelist = $this->apfschoolcode;
			}

	    	$condition = " WHERE APFSchoolCode IN (".$schoolcodelist.")";
	    	$condition1 = $this->prepareClassCondition();
	    	if($condition1 != "")
	    		$condition .=$condition1;
	    	
	    	$studentdataquery = "SELECT COUNT(*) FROM studentnamemasterlist_y2 ".$condition;
			//echo $studentdataquery; //exit;
	    	$dbquery = new dbquery($studentdataquery,$connid);
			$row = $dbquery->getrowarray();
			$this->clspaging->numofrecs = $row[0];
			if($this->clspaging->numofrecs >0)
			{
				$this->clspaging->getcurrpagevardb();
			}
			
			// Long report format for AllQuestions and Summary option selected
			if($this->reporttype=="long" && $this->questiontype=="AllQuestions")
			{
				//echo "YES"; exit;
				$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
		    	$output_string_header = "<tr bgcolor='#FFc682'><td><b>Sr No.</b></td><td><b>School<br>Code</b></td><td><b>Student<br>Code</b></td><td><b>Student<br>Name</b></td><td><b>Class</b></td><td><b>Round</b></td>";			
			    $columns=7;
		    	$selectFields="";
		    	
			    if($this->reportlevel=="questiondetail")
			    {
				    $mathsHeader="";
				    $teluguHeader="";
				    $mathsHeader .="<td bgcolor='#FFC682'></td>"; $columns++;
				    for($qindex=1;$qindex<=40;$qindex++)
				    {
				    	$mathsHeader .="<td><b>MQ".$qindex."</b></td>"; $columns++;
				    	$mathsHeader .="<td><b>SMQ".$qindex."</b></td>"; $columns++;
				    	$mathsHeader .="<td><b>M/C</b></td>"; $columns++;
				    	$mathsHeader .="<td><b>MCQ</b></td>"; $columns++;
				    	$mathsHeader .="<td><b>TO</b></td>"; $columns++;
				    	$mathsHeader .="<td bgcolor='#FFC682'></td>"; $columns++;
				    	
				    	$teluguHeader .="<td><b>TQ".$qindex."</b></td>"; $columns++;
				    	$teluguHeader .="<td><b>STQ".$qindex."</b></td>"; $columns++;
				    	$teluguHeader .="<td><b>M/C</b></td>"; $columns++;
				    	$teluguHeader .="<td><b>MCQ</b></td>"; $columns++;
				    	$teluguHeader .="<td><b>TO</b></td>"; $columns++;
				    	$teluguHeader .="<td bgcolor='#FFC682'></td>"; $columns++;
				    }
				    $output_string_header .=$mathsHeader.$teluguHeader;
			    }
			    
			    if($this->mathstotal=="on")
			    {
		    		$output_string_header .= "<td><b>Maths<br>Total</b></td>"; $columns++;
		    		$selectFields .= "mathsTotal,";
			    }
		    	if($this->telugutotal=="on")
			    {
		    		$output_string_header .= "<td><b>Telugu<br>Total</b></td>"; $columns++;
		    		$selectFields .= "teluguTotal,";
			    }
			    if($this->studenttotal=="on")
			    {
		    		$output_string_header .= "<td><b>Student<br>Total</b></td>"; $columns++;
		    		$selectFields .= "studentTotal,";
			    }
			    if($this->mathspercentile=="on")
			    {
		    		$output_string_header .= "<td><b>Maths<br>Percentile</b></td>"; $columns++;
		    		$selectFields .= "mathspercentile,";
			    }
			    if($this->telugupercentile=="on")
			    {
		    		$output_string_header .= "<td><b>Telugu<br>Percentile</b></td>"; $columns++;
		    		$selectFields .= "telugupercentile,";
			    }
			    if($this->studentpercentile=="on")
			    {
		    		$output_string_header .= "<td><b>Student<br>Percentile</b></td>"; $columns++;
		    		$selectFields .= "studentpercentile,";
			    }
			    
			    $selectFields .="round,";
			    $selectFields = substr($selectFields,0,-1);
			    //$output_string_header .= "<td><b>Round</b></td>"; $columns++;
			    $output_string_header .= "</tr>";
		    	
			    $output_string .= "<tr bgcolor='#FF952B'><td colspan='".$columns."'><b>Data Report For District:&nbsp;".$this->district;
			    if($this->mandal != "")
			    	$output_string .= ", Mandal:<b>&nbsp;".$this->mandal;
			    $output_string .= "</b></td></tr>";
		    	$output_string = $output_string.$output_string_header;
		    	
				$studentCodeString = $this->fetchStudentCodeList($condition,$connid);
		    	$studentperformancedata = $this->pageStudentRoundwisePerformanceLong($studentCodeString,$schoolcode,$selectFields,$connid);
		    	
		    	$srno=1;
		    	while($studentrow = $studentperformancedata->getrowarray())
		    	{
		    		$index = array_search($studentrow['round'], $roundarray);
		    		if($previousStudentCode != $studentrow['unique_student_code'])
		    		{
		    			if($bgcolor=="#FFF0F5")
		    				$bgcolor = "#FFFFFF";	
		    			else 
		    				$bgcolor = "#FFF0F5";
		    		}
		    		
		    		$previousStudentCode = $studentrow['unique_student_code'];
		    			
		    		$output_string .= "<tr bgcolor='".$bgcolor."' align='center'><td align='center'>".$srno."</td><td align='center'><a href='ap_school_observation.php?apfschoolcode=".$studentrow["APFSchoolCode"]."'>".$studentrow["APFSchoolCode"]."</a></td><td align='center'>".$studentrow['unique_student_code']."</td><td align='center'>".$studentrow["Name"]."</td><td align='center'>".$studentrow["Class"]."</td><td>".$roundNameArray[$index]."</td>";
			    	if($this->reportlevel=="questiondetail")
				    {
					    $mathsString="";
					    $teluguString="";
					    $mathsString .="<td bgcolor='#FFC682'></td>"; 
					    for($qindex=1;$qindex<=40;$qindex++)
					    {
					    	$totaloptions=""; 	$qtype="";     	$isMCQ="";
					    	$sub="Maths";     	$mcode="MQ".$qindex;    	$mscode="ScoreMQ".$qindex;
					    	$qtype = $this->questionMechConceArray[$roundNameArray[$index]][$studentrow["Class"]][$sub][$qindex];
					    	$isMCQ = $this->questionMCQArray[$roundNameArray[$index]][$studentrow["Class"]][$sub][$qindex];
					    	$totaloptions = $this->questionOptionsArray[$roundNameArray[$index]][$studentrow["Class"]][$sub][$qindex];
					    	$mathsString .="<td>".$studentrow[$mcode]."</td>";
					    	$mathsString .="<td>".number_format($studentrow[$mscode],1)."</td>";
				    		$mathsString .="<td>".$qtype."</td>";
				    		if($isMCQ=="MCQ") $isMCQ="Y";
				    		else $isMCQ="N";
				    		$mathsString .="<td>".$isMCQ."</td>";
					    	$mathsString .="<td>".$totaloptions."</td>";
					    	$mathsString .="<td bgcolor='#FFC682'></td>";
					    	
					    	$totaloptions=""; 	$qtype="";     	$isMCQ="";
					    	$sub = "Telugu";   	$tcode="TQ".$qindex;    	$tscode="ScoreTQ".$qindex;
					    	$qtype = $this->questionMechConceArray[$roundNameArray[$index]][$studentrow["Class"]][$sub][$qindex];
					    	$isMCQ = $this->questionMCQArray[$roundNameArray[$index]][$studentrow["Class"]][$sub][$qindex];
					    	$totaloptions = $this->questionOptionsArray[$roundNameArray[$index]][$studentrow["Class"]][$sub][$qindex];
					    	$teluguString .="<td>".$studentrow[$tcode]."</td>";
					    	$teluguString .="<td>".number_format($studentrow[$tscode],1)."</td>";
				    		$teluguString .="<td>".$qtype."</td>";
				    		if($isMCQ=="MCQ") $isMCQ="Y";
				    		else $isMCQ="N";
				    		$teluguString .="<td>".$isMCQ."</td>";
					    	$teluguString .="<td>".$totaloptions."</td>";
					    	$teluguString .="<td bgcolor='#FFC682'></td>";
					    }
					   	    $output_string .=$mathsString.$teluguString;
				    }
				    
		    		if($this->mathstotal=="on")
				    {
			    		$output_string .= "<td>".number_format($studentrow['mathsTotal'],1)."</td>"; 
				    }
			    	if($this->telugutotal=="on")
				    {
			    		$output_string .= "<td>".number_format($studentrow['teluguTotal'],1)."</td>"; 
				    }
				    if($this->studenttotal=="on")
				    {
			    		$output_string .= "<td>".number_format($studentrow['studentTotal'],1)."</td>"; 
				    }
				    if($this->mathspercentile=="on")
				    {
			    		$output_string .= "<td>".$studentrow['mathsPercentile']."</td>"; 
				    }
				    if($this->telugupercentile=="on")
				    {
			    		$output_string .= "<td>".$studentrow['teluguPercentile']."</td>"; 
				    }
				    if($this->studentpercentile=="on")
				    {
			    		$output_string .= "<td>".$studentrow['studentPercentile']."</td>"; 
				    }
				    
		    		$output_string .= "</tr>";
			    	$srno++;
		    	}
				$output_string .= "</table>";
				return $output_string;
			}
			// Wide report format for AllQuestions and Summary option selected
			if($this->reporttype=="wide" && $this->questiontype=="AllQuestions")
			{
				$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
		    	$output_string_header = "<tr bgcolor='#FFC682'><td><b>Sr No.</b></td><td><b>School<br>Code</b></td><td><b>Student<br>Code</b></td>";			
			    $columns=4;
		    	$columnArray = array();
			    $output_string_header .= $this->prepareRoundwiseSummaryHeaders(&$columnArray);
			    $columns = $columns + $columnArray[0];
			    $output_string_header .= "</tr>";
		    	
			    $output_string .= "<tr bgcolor='#FF952B'><td colspan='".$columns."' align='center'><b>Data Report For District:&nbsp;".$this->district;
			    if($this->mandal != "")
			    	$output_string .= ", Mandal:<b>&nbsp;".$this->mandal;
			    $output_string .= "</b></td></tr>";
			    //$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='".$columns."' align='center'><b>Data Report</b></td></tr>";
		    	$output_string = $output_string.$output_string_header;
				
				$srno=1;
				$roundsSelected = $this->fetchSelectedRounds();
				$totalSelectedRounds = count($roundsSelected);
				
				$studentCodeString = $this->fetchStudentCodeList($condition,$connid);
		    	$allrounddataArray = $this->pageStudentRoundwisePerformanceWide($studentCodeString,$schoolcode,$connid);
		    	$allroundquestionwisedataArray = $this->pageStudentRoundwiseQuestionwisePerformanceWide($studentCodeString,$connid);

		    	$totalRecords=count($allrounddataArray);
		    	$studentCodeArray = explode(",",$studentCodeString);
		    	$totalStudents=count($studentCodeArray);

		    	$questionMCArray = array();
		    	$questionSkillArray = array();
		    		
		    	for($round=0;$round<1;$round++)
		    	{   
		    		
		    		$this->fetchQuestionDetails(&$questionMCArray,&$questionSkillArray,$roundsSelected[$round],$connid);
		    	}
		    	
		    	for($arrindex=0;$arrindex<$totalStudents;$arrindex++)
		    	{
		    		$studentRoundRow=$allrounddataArray[$studentCodeArray[$arrindex]];
		    		$studentQuestionwiseRoundRow=$allroundquestionwisedataArray[$studentCodeArray[$arrindex]];
		    		
		    		//for($round=0;$round<$totalSelectedRounds;$round++)
		    		for($round=0;$round<1;$round++)
		    		{
		    			$index = array_search($roundsSelected[$round], $roundNameArray);
		    			if (!array_key_exists($roundarray[$index], $studentRoundRow)) 
		    			{
		    				$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".substr($studentCodeArray[$arrindex],0,5)."</td><td>".$studentCodeArray[$arrindex]."</td>";						
		    				$output_string .= "<td>&nbsp;</td>"; 
		    				$output_string .= "<td>&nbsp;</td>"; 
							$output_string .= "<td>&nbsp;</td>"; 
							$output_string .= "<td>&nbsp;</td>"; 
							$output_string .= "<td>&nbsp;</td>"; 
							$output_string .= "<td>&nbsp;</td>"; 
							$output_string .= "<td align='center'>".$roundsSelected[$round]."</td>"; 
		    				
		    				if($this->mathstotal=="on")
						    {
					    		$output_string .= "<td>&nbsp;</td>"; 
						    }
					    	if($this->telugutotal=="on")
						    {
					    		$output_string .= "<td>&nbsp;</td>"; 
						    }
						    if($this->studenttotal=="on")
						    {
					    		$output_string .= "<td>&nbsp;</td>"; 
						    }
						    if($this->mathspercentile=="on")
						    {
					    		$output_string .= "<td>&nbsp;</td>"; 
						    }
						    if($this->telugupercentile=="on")
						    {
					    		$output_string .= "<td>&nbsp;</td>"; 
						    }
						    if($this->studentpercentile=="on")
						    {
					    		$output_string .= "<td>&nbsp;</td>"; 
						    }
						    $output_string .= "</tr>";
						    $srno++;
		    			}
		    			else 
		    			{
			    			$studentrow = $studentRoundRow[$roundarray[$index]];
			    			$studentquestionwiserow = $studentQuestionwiseRoundRow[$roundarray[$index]];
			    			
			    			for($si=1; $si<=2; $si++)
			    			{
			    				if($si == 1) 
			    				{
			    					$scode = "TQ";
			    					$sub1 = "Telugu";
			    				}
			    				if($si == 2)
			    				{
			    					$scode = "MQ";
			    					$sub1 = "Maths";
			    				}
			    				
				    			for($qi=1; $qi<=40; $qi++)
				    			{
					    			$qcode = $scode.$qi;
					    			$sc = "Score".$scode.$qi;
				    				$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".substr($studentCodeArray[$arrindex],0,5)."</td><td>".$studentCodeArray[$arrindex]."</td>";						
					    			$output_string .= "<td align='center'>".$qcode."</td>"; 
					    			$output_string .= "<td align='center'>".$studentquestionwiserow[$qcode]."</td>"; 
					    			if($studentquestionwiserow[$qcode]=="")
					    				$output_string .= "<td align='center'>&nbsp;</td>"; 
					    			else
					    				$output_string .= "<td align='center'>".$studentquestionwiserow[$sc]."</td>"; 	
					    			
					    			$output_string .= "<td align='center'>".substr($questionSkillArray[$studentrow['class']][$sub1][$qi],5,1)."</td>";
									$output_string .= "<td align='center'>".$questionMCArray[$studentrow['class']][$sub1][$qi]."</td>"; 
									$output_string .= "<td align='center'>".$studentrow['class']."</td>"; 
									$output_string .= "<td align='center'>".$roundsSelected[$round]."</td>"; 
					    			
							    	if($this->mathstotal=="on")
								    {
							    		$output_string .= "<td align='center'>".number_format($studentrow['mathsTotal'],1)."</td>"; 
								    }
							    	if($this->telugutotal=="on")	
								    {
							    		$output_string .= "<td align='center'>".number_format($studentrow['teluguTotal'],1)."</td>"; 
								    }
								    if($this->studenttotal=="on")
								    {
							    		$output_string .= "<td align='center'>".number_format($studentrow['studentTotal'],1)."</td>"; 
								    }
								    if($this->mathspercentile=="on")
								    {
							    		$output_string .= "<td align='center'>".$studentrow['mathsPercentile']."</td>"; 
								    }
								    if($this->telugupercentile=="on")
								    {
							    		$output_string .= "<td align='center'>".$studentrow['teluguPercentile']."</td>"; 
								    }
								    if($this->studentpercentile=="on")
								    {
							    		$output_string .= "<td align='center'>".$studentrow['studentPercentile']."</td>"; 
								    }
								    $output_string .= "</tr>";
								    $srno++;
				    			}
			    			}
		    			}
		    		}
		    	}
				$output_string .= "</table>";
				return $output_string;
			}
			
			// For Mechanical and Conceptual 
			if($this->questiontype=="Mechanical" || $this->questiontype=="Conceptual" || $this->questiontype=="MCQ" || $this->skill!="")
			{
				if($this->questiontype!="MCQ")
					$code = substr($this->questiontype, 0, 1);
				else 
					$code = "MCQ";
				if($this->skill!="")	
				{
					$code=$this->skill;
					$title=$this->skill;
				}
				else
				{
					$title = $this->questiontype;
				}
				$classCondition = $this->prepareClassCondition();
				$subjectCondition = $this->prepareSubjectCondition();
				$roundCondition = $this->fetchSelectedRounds();
				
				$anscodeQuery = "SELECT * FROM ap_allround_anscode_summary";
				$qtypecondition = " WHERE MechConc='".$code."'";	
				if($classCondition!="")
					$qtypecondition .= $classCondition;	
				if($subjectCondition!="")
					$qtypecondition .= $subjectCondition;	
				if(count($roundCondition)>0)
					$qtypecondition .= " AND round IN ('".$roundCondition[0]."')";	
				
				$anscodeQuery .=$qtypecondition;
				$anscodedbquery = new dbquery($anscodeQuery,$connid);
				$anscoderow = $anscodedbquery->getrowarray();
				$questionNoString=$anscoderow['QuestionString'];
				$questionNoArray = explode(",",$questionNoString);
				$totalQuestions=count($questionNoArray);
						
				$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
		    	$output_string_header = "<tr bgcolor='#FFC682'><td><b>Sr No.</b></td><td><b>School<br>Code</b></td><td><b>Student<br>Code</b></td><td><b>Student<br>Name</b></td><td><b>Class</b></td><td><b>Subject</b></td><td><b>Round</b></td>";
		    	$columns=7;
		    	if($this->reportlevel=="questiondetail")
			    {
			    	$questionHeader="";
				    for($qindex=0;$qindex<$totalQuestions;$qindex++)
				    {
				    	$questionHeader .="<td><b>AQ".$questionNoArray[$qindex]."</b></td>"; $columns++;
				    	$questionHeader .="<td><b>SQ".$questionNoArray[$qindex]."</b></td>"; $columns++;
				    }
				    $output_string_header .=$questionHeader;
			    }
				$output_string_header .="<td><b>No. Of ".$title."<br>Questions</b></td><td><b>Score In ".$title."<br>Questions</b></td><td><b>Subject<br>Score</b></td><td><b>Total<br>Score</b></td>";						    
			    $columns +=4;
			    
		    	$output_string_header .= "</tr>";
		    	$output_string .= "<tr bgcolor='#FF952B'><td colspan='".$columns."' align='center'><b>Data Report For District:&nbsp;".$this->district;
			    if($this->mandal != "")
			    	$output_string .= ", Mandal:<b>&nbsp;".$this->mandal;
			    $output_string .= "</b></td></tr>";
		    	$output_string = $output_string.$output_string_header;
				
		    	$studentdataquery = "SELECT APFSchoolCode,Name,unique_student_code,Class FROM studentnamemasterlist_y2 ".$condition." ".$this->clspaging->limit;
		    	$dbquery = new dbquery($studentdataquery,$connid);
		    	$studentCodeString = $this->fetchStudentCodeList($condition,$connid);

		    	$assCondition = "WHERE unique_student_code IN (".$studentCodeString.")";
				$marksCondition = $this->prepareMarksCondition();
				if($marksCondition!="")
					$assCondition .=$marksCondition;
				
				if(count($roundCondition)>0)
				{
					$index = array_search($roundCondition[0], $roundNameArray);
					$assCondition .= " AND round IN ('".$roundarray[$index]."')";	
				}
				$assQuery = "SELECT * FROM ap_allround_assessmentdata ".$assCondition;
				$assdbquery = new dbquery($assQuery,$connid);
				if($assdbquery->numrows()!=0) // If no assessment data record found for a student then continue
				{
				
					$subjectString = $this->prepareSubjectString();
					if($subjectString!="")
						$subjectArray = explode(",",$subjectString);
						
					$srno=1;	
					while($assrow = $assdbquery->getrowarray())
					{
						$totalScore=0;
						$subject = $subjectArray[0];
						$subject = str_replace("'","",$subject);
						$subjectCode=substr($subject,0,1);
						$scoreString="";
						
						foreach ($questionNoArray as $qno)
						{
							$answerCode = $subjectCode."Q".$qno;
					    	$scoreString .="<td>".$assrow[$answerCode]."</td>";
							$scoreCode = "Score".$subjectCode."Q".$qno;
					    	$scoreString .="<td>".number_format($assrow[$scoreCode],1)."</td>";
							$totalScore += $assrow[$scoreCode];
						}
						if($previousStudentCode != $assrow['unique_student_code'])
			    		{
			    			if($bgcolor=="#FFF0F5")
			    				$bgcolor = "#FFFFFF";	
			    			else 
			    				$bgcolor = "#FFF0F5";
			    		}
		    			$previousStudentCode = $assrow['unique_student_code'];
						$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'><a href='ap_school_observation.php?apfschoolcode=".$assrow["APFSchoolCode"]."'>".$assrow["APFSchoolCode"]."</a></td><td align='center'>".$assrow['unique_student_code']."</td><td>".$assrow["Name"]."</td><td align='center'>".$assrow['Class']."</td><td>".$subject."</td><td  align='center'>".$roundNameArray[$index]."</td>";
						if($this->reportlevel=="questiondetail")
							$output_string .=$scoreString;
						$subjectTotal=strtolower($subject)."Total";
						$output_string .= "<td  align='center'>".$totalQuestions."</td><td  align='center'>".$totalScore."</td><td  align='center'>".number_format($assrow[$subjectTotal],1)."</td><td  align='center'>".number_format($assrow['studentTotal'],1)."</td></tr>";
						$srno++;
					}
					$output_string .= "</table>";
					return $output_string;
				}
			}
		}
		$endstring = "Started At: ".date("h:i:s");
	}
	
	function prepareQuestionMechConcArray($connid)
    {
    	$questionDetails = array();
    	$query = "SELECT * FROM ap_allround_anscode_summary WHERE MechConc IN ('M','C')";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$questionTypeString = $row['QuestionString'];
			$questionTypeArray = explode(",",$questionTypeString);
			$totalElements = count($questionTypeArray);
			for($i=0; $i<$totalElements; $i++)
			{
				$questionDetails[$row['round']][$row['Class']][$row['Subject']][$questionTypeArray[$i]]= $row['MechConc'];
			}
		}
		return $questionDetails;
    }
    
    function prepareQuestionMCQArray($connid)
    {
    	$questionDetails = array();
    	$query = "SELECT * FROM ap_allround_anscode_summary WHERE MechConc IN ('MCQ')";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$questionTypeString = $row['QuestionString'];
			$questionTypeArray = explode(",",$questionTypeString);
			$totalElements = count($questionTypeArray);
			for($i=0; $i<$totalElements; $i++)
			{
				$questionDetails[$row['round']][$row['Class']][$row['Subject']][$questionTypeArray[$i]]= $row['MechConc'];
			}
		}
		//echo "<pre>"; print_r ($questionDetails); echo "</pre>";
		return $questionDetails;
    }
    
    function prepareQuestionOptionsArray($connid)
    {
    	$questionDetails = array();
    	$query = "SELECT * FROM ap_allround_anscode_summary WHERE MechConc IN ('MCQ')";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$questionTypeString = $row['QuestionString'];
			$questionTypeArray = explode(",",$questionTypeString);
			$totalElements = count($questionTypeArray);
			
			$optionString = $row['OptionString'];
			$optionArray = explode(",",$optionString);
			
			for($i=0; $i<$totalElements; $i++)
			{
				$questionDetails[$row['round']][$row['Class']][$row['Subject']][$questionTypeArray[$i]]= $optionArray[$i];
			}
		}
		//echo "<pre>"; print_r ($questionDetails); echo "</pre>";
		return $questionDetails;
    }
	
    function fetchStudentCodeList($condition,$connid)
	{
		$studentdataquery = "SELECT APFSchoolCode,Name,unique_student_code,Class FROM studentnamemasterlist_y2 ".$condition." ".$this->clspaging->limit;
		$dbquery = new dbquery($studentdataquery,$connid);
		$studentCodeString="";
		while($row = $dbquery->getrowarray())
		{
			$studentCodeString .= $row["unique_student_code"].",";
		}
		$studentCodeString = substr($studentCodeString, 0, -1);
		return $studentCodeString;
	}
		    	
	// Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (21/11/2007) - For individual student roundwise performance report
    function pageStudentRoundwisePerformanceWide($studentcode,$schoolcode,$connid)
	{
		$allrounddataArray = array();
		$condition = $this->prepareConditions($studentcode);
		$studenrperformanceQuery = "SELECT * FROM ap_allround_assessment_summarydata".$condition;
		$studentperformancedbquery = new dbquery($studenrperformanceQuery,$connid);
		while($studentperformancerow = $studentperformancedbquery->getrowarray())
		{
			$allrounddataArray[$studentperformancerow['unique_student_code']][$studentperformancerow['round']] = $studentperformancerow;
		}
		return $allrounddataArray;
	}
	function pageStudentRoundwiseQuestionwisePerformanceWide($studentCodeString,$connid)
	{
		$allrounddataArray = array();
		$studenrperformanceQuery = "SELECT * FROM ap_allround_assessmentdata WHERE unique_student_code IN (".$studentCodeString.")";
		$studentperformancedbquery = new dbquery($studenrperformanceQuery,$connid);
		while($studentperformancerow = $studentperformancedbquery->getrowarray())
		{
			$allrounddataArray[$studentperformancerow['unique_student_code']][$studentperformancerow['round']] = $studentperformancerow;
		}
		return $allrounddataArray;
	}
	
	function fetchQuestionDetails($questionMCArray,$questionSkillArray,$round,$connid)
	{
		$questionDetailArray = array();
		$query = "SELECT * FROM ap_allround_anscode_summary WHERE round='".$round."'";
		//echo $query; exit;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$qcodes = explode(",",$row['QuestionString']);
			$totalcodes = count($qcodes);
			for($i=0;$i<$totalcodes;$i++)
			{
				if($row['MechConc'] == "M" || $row['MechConc'] == "C")
					$questionMCArray[$row['Class']][$row['Subject']][$qcodes[$i]] = $row['MechConc'];	
				else 
					$questionSkillArray[$row['Class']][$row['Subject']][$qcodes[$i]] = $row['MechConc'];	
			}
		}
	}
	// Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (21/11/2007) - For individual student roundwise performance report
    function pageStudentRoundwisePerformanceLong($studentcode,$schoolcode,$selectFields,$connid)
	{
		$condition = $this->prepareConditions($studentcode);
    	if($this->reportlevel=="summary")
    		$studenrperformanceQuery = "SELECT APFSchoolCode, Name, unique_student_code, Class,".$selectFields." FROM ap_allround_assessmentdata".$condition." ORDER BY unique_student_code";
    	else 
    		$studenrperformanceQuery = "SELECT * FROM ap_allround_assessmentdata".$condition." ORDER BY unique_student_code";
		$studentperformancedbquery = new dbquery($studenrperformanceQuery,$connid);
		return $studentperformancedbquery;
	}
	// Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (21/11/2007) - For individual student roundwise performance report
    function pageStudentRoundwisePerformanceQuestionDetailLong($studentcode,$schoolcode,$connid)
	{
		$condition = $this->prepareConditions($studentcode);
    	$studenrperformanceQuery = "SELECT * FROM ap_allround_assessmentdata".$condition." ORDER BY unique_student_code";
		$studentperformancedbquery = new dbquery($studenrperformanceQuery,$connid);
		return $studentperformancedbquery;
	}
	function prepareConditions($studentcode)
	{
    	$condition = " WHERE unique_student_code IN (".$studentcode.")";
		$condition1 = $this->prepareRoundCondition();
		$condition2 = $this->prepareMarksCondition();
    	if($condition1 != "")
			$condition .=$condition1;
		if($condition2 != "")
			$condition .=$condition2;
		return $condition;
	}
    function prepareTreatementCondition()
    {
    	$treatmentString="";
     	$condtion = "";
     	if($this->treatment1=="on")
     		$treatmentString .= "1,";
     	if($this->treatment2=="on")
     		$treatmentString .= "2,";
     	if($this->treatment3=="on")
     		$treatmentString .= "3,";
     	if($this->treatment4=="on")
     		$treatmentString .= "4,";
     	if($this->treatment5=="on")
     		$treatmentString .= "5,";
     	if($this->treatment6=="on")
     		$treatmentString .= "6,";
     	if($this->treatment7=="on")
     		$treatmentString .= "7,";
     	$treatmentString = substr($treatmentString,0,-1);
     	if($treatmentString != "")
     		$condtion = " AND Treatment IN (".$treatmentString.")";
     	return $condtion;
    }
    function prepareClassCondition()
    {
     	$classString="";
     	$condtion = "";
     	if($this->class1=="on")
     		$classString .= "1,";
     	if($this->class2=="on")
     		$classString .= "2,";
     	if($this->class3=="on")
     		$classString .= "3,";
     	if($this->class4=="on")
     		$classString .= "4,";
     	if($this->class5=="on")
     		$classString .= "5,";
     	$classString = substr($classString,0,-1);
     	if($classString != "")
     		$condtion .= " AND Class IN (".$classString.")";

     	return $condtion;
    }
    function prepareSubjectCondition()
    {
     	$subjectString="";
     	if($this->subject1=="on")
     		$subjectString .= "'Telugu',";
     	if($this->subject2=="on")
     		$subjectString .= "'Maths',";
     	$subjectString = substr($subjectString,0,-1);
     	if($subjectString != "")
     		$condtion .= " AND Subject IN (".$subjectString.")";
     		
     	return $condtion;
    }
    function prepareSubjectString()
    {
     	$subjectString="";
     	if($this->subject1=="on")
     		$subjectString .= "'Telugu',";
     	if($this->subject2=="on")
     		$subjectString .= "'Maths',";
     	$subjectString = substr($subjectString,0,-1);
     	return $subjectString;
    }
    function prepareRoundCondition()
    {
    	$roundString="";
     	$condtion = "";
     	if($this->Y0_BEL=="on")
     		$roundString .= "'Jul2005',";
     	if($this->Y1_SEL=="on")
     		$roundString .= "'Feb2006',";
     	if($this->Y2_SEL=="on")
     		$roundString .= "'Feb2007',";
     	if($this->Y1_HEL=="on")
     		$roundString .= "'Mar2006',";
     	if($this->Y2_HEL=="on")
     		$roundString .= "'Mar2007',";
     	$roundString = substr($roundString,0,-1);
     	if($roundString != "")
     		$condtion .= " AND round IN (".$roundString.")";

     	return $condtion;
    }
    function prepareMarksCondition()
    {
    	$marksConditionString="";
     	if($this->mtc_condition!="" && $this->mtc_value!="")
     		$marksConditionString .= " AND mathsTotal ".$this->mtc_condition." ".$this->mtc_value;
     	if($this->ttc_condition!="" && $this->ttc_value!="")
     		$marksConditionString .= " AND teluguTotal ".$this->ttc_condition." ".$this->ttc_value;
     	if($this->stc_condition!="" && $this->stc_value!="")
     		$marksConditionString .= " AND studentTotal ".$this->stc_condition." ".$this->stc_value;

     	return $marksConditionString;
    }
	function fetchSelectedRounds()
	{
		$roundsSelected = array();
		if($this->Y0_BEL=="on")
			array_push($roundsSelected,"Y0_BEL");
		if($this->Y1_SEL=="on")
			array_push($roundsSelected,"Y1_SEL");
		if($this->Y2_SEL=="on")
			array_push($roundsSelected,"Y2_SEL");		
		if($this->Y1_HEL=="on")
			array_push($roundsSelected,"Y1_HEL");
		if($this->Y2_HEL=="on")
			array_push($roundsSelected,"Y2_HEL");
		return $roundsSelected;
	}
	
	function prepareRoundwiseSummaryHeaders($columnArray)
	{
		$roundsSelected = $this->fetchSelectedRounds();
		$output_string_header = "";
		$columns = 0;
		
		//for($i=0; $i<count($roundsSelected); $i++)
		for($i=0; $i<1; $i++)
		{
			$output_string_header .= "<td><b>Qno</b></td>"; $columns++;
			$output_string_header .= "<td><b>Answer<br>Code</b></td>"; $columns++;
			$output_string_header .= "<td><b>Score</b></td>"; $columns++;
			$output_string_header .= "<td><b>Skill</b></td>"; $columns++;
			$output_string_header .= "<td><b>M/C</b></td>"; $columns++;
			$output_string_header .= "<td><b>Class</b></td>"; $columns++;
			$output_string_header .= "<td><b>Round</b></td>"; $columns++;
			
			if($this->mathstotal=="on")
		    {
	    		$output_string_header .= "<td><b>Maths_Total</b></td>"; $columns++;
		    }
	    	if($this->telugutotal=="on")
		    {
	    		$output_string_header .= "<td><b>Telugu_Total</b></td>"; $columns++; 
		    }
		    if($this->studenttotal=="on")
		    {
	    		$output_string_header .= "<td><b>Student_Total</b></td>"; $columns++;
		    }
		    if($this->mathspercentile=="on")
		    {
	    		$output_string_header .= "<td><b>Maths_Percentile</b></td>"; $columns++;
		    }
		    if($this->telugupercentile=="on")
		    {
	    		$output_string_header .= "<td><b>Telugu_Percentile</b></td>"; $columns++;
		    }
		    if($this->studentpercentile=="on")
		    {
	    		$output_string_header .= "<td><b><br>Student Percentile</b></td>"; $columns++;
		    }
		}
		$columnArray[0]=$columns;
		return $output_string_header;
	}

    // Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (21/11/2007) - For individual student roundwise questionwise report
    function pageStudentRoundwiseQuestionwiseReport($connid)
    {
    	$this->setgetvars();
    	$allrounddataArray = array();
    	$subjectcode = ucwords(substr($this->subject,0,1));
    	$studentname = $this->fetchstudentname($this->studentcode,$connid);

    	$fieldlist = "";
    	for($i=1; $i<=40; $i++)
    	{
    		$fieldlist .= "Score".$subjectcode."Q".$i.",";
    	}
    	$fieldlist = substr($fieldlist, 0, -1);

    	$tablelistArray = array("assessmentap_bel","assessmentap_sel","assessmentap_sel_y2","assessmentap_hel","assessmentap_hel_y2");
		$totaltables = count($tablelistArray);
		for($i=0; $i<$totaltables; $i++)
		{
			$tablename = $tablelistArray[$i];
			$studenrperformanceQuery = "SELECT ".$fieldlist." FROM ".$tablename." WHERE unique_student_code=".$this->studentcode;
			$dbquery = new dbquery($studenrperformanceQuery,$connid);
			if($dbquery->numrows()>0)
			{
				$row = $dbquery->getrowarray();
				$allrounddataArray[$tablename] = $row;
			}
			${$tablename."Total"} = 0;
			${$tablename."isAbsent"} = 0;
		}

		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
    	$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='6' align='center'><b>Roundwise questionwise ".$studentname."'s (".$this->studentcode.") score</b></td></tr>";
    	$output_string .= "<tr><td align='center'><b>Question. No</b></td><td><b>Y0_BEL</b></td><td><b>Y1_EL</b></td><td><b>Y2_EL</b></td><td><b>Y1_HEL</b></td><td><b>Y2_HEL</b></td></tr>";
    	$srno=1;
    	$fieldlistArray = explode(",",$fieldlist);
    	$totalfields = count($fieldlistArray);
		for($i=0; $i<$totalfields; $i++)
		{
			$field = $fieldlistArray[$i];
			$output_string .= "<tr><td align='center'>".$srno."</td>";

			for($j=0; $j<$totaltables; $j++)
			{
				$rounddata = $allrounddataArray[$tablelistArray[$j]];
				if($rounddata[$field]!="")
				{
					$output_string .= "<td align='center'>".number_format($rounddata[$field],1)."</td>";
					${$tablelistArray[$j]."Total"} += $rounddata[$field];
					${$tablelistArray[$j]."isAbsent"} = 1;
				}
				else
					$output_string .= "<td align='center'>&nbsp;</td>";
			}
			$output_string .= "</tr>";
			$srno++;
		}

		$output_string .= "<tr><td align='center'><b>Total Score</b></td>";
		for($i=0; $i<$totaltables; $i++)
		{
			$tablename = $tablelistArray[$i];
			if(${$tablename."isAbsent"} == 1)
				$output_string .= "<td align='center'><b>".number_format(${$tablename."Total"},1)."</b></td>";
			else
				$output_string .= "<td align='center'><b>&nbsp</b></td>";
		}

		$output_string .= "</tr></table>";
		echo $output_string;
    }

    // Function called from ap_school_observation.php.	Added by Arpit (23/11/2007) - For fetching school observation data
    function pageSchoolObservation($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->apfschoolcode != 0)
		{
			// School basic information
			$query = "SELECT * FROM school_master_allocation_y2 WHERE apfschoolcode=".$this->apfschoolcode;
			$dbquery = new dbquery($query,$connid);
			if($dbquery->numrows()>0)
			{	
				$row = $dbquery->getrowarray();
				$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
		    	$output_string .= "<tr bgcolor='#FF952B' align='center'><td><b><font size='2'>School Information</font></b></td></tr>";
		    	$output_string .= "<tr bgcolor='#FFC682' align='center'><td><b>School Code:</b>&nbsp;".$this->apfschoolcode."&nbsp;&nbsp;";
		    	$output_string .= "<b>Village Name:</b>&nbsp;".$row['VillageNmae']."&nbsp;&nbsp;";
		    	$output_string .= "<b>Mandal Name:</b>&nbsp;".$row['MandalName']."&nbsp;&nbsp;";
		    	$output_string .= "<b>District Name:</b>&nbsp;".$row['DistrictName']."&nbsp;&nbsp;";
		    	$output_string .= "</td></tr>";
		    	
		    	$output_string .= "<tr><td>";
		    	$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
		    	$output_string .= "<tr bgcolor='#FF952B'><td colspan='4' align='center'><b>Teacher Information</b></td></tr>";
				$output_string .= "<tr bgcolor='#FFC682'><td><b>Teacher Code</b></td><td><b>Teacher Name</b></td><td><b>Teacher Degree</b></td></tr>";
					
		    	$teacher_query = "SELECT * FROM teacher_master WHERE apfschoolcode=".$this->apfschoolcode;
				$dbquery = new dbquery($teacher_query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$output_string .= "<tr><td align='center'><a href='ap_teacher_observation.php?teacher_code=".$row["teacher_code"]."'>".$row["teacher_code"]."</td><td align='center'>".$row["teacher_name"]."</td><td align='center'>".$row["degree"]."</td></tr>";
				}
				$output_string .= "</table>";
		    	$output_string .= "</td></tr></table><br>";
			}
			
			// School observation data - short
			$query = "SELECT * FROM school_short WHERE apfschoolcode=".$this->apfschoolcode." ORDER BY year,rounds";
			$dbquery = new dbquery($query,$connid);
			if($dbquery->numrows()>0)
			{
		    	$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
		    	$output_string .= "<tr bgcolor='#FF952B'><td colspan='53'><b>School Observation Data - Short</b></td></tr>";
				$output_string .= "<tr bgcolor='#FFC682'>";

				$fieldquery = "SHOW COLUMNS FROM school_short";
				$fielddbquery = new dbquery($fieldquery,$connid);
				$columns = 0;
				while($row = $fielddbquery->getrowarray())
				{
					$output_string .= "<td><b>".$row["Field"]."</b></td>";
					$columns++;
				}
				$output_string .= "</tr>";

				while($row = $dbquery->getrowarray())
				{
					$output_string .= "<tr>";
					for($i=0; $i<$columns; $i++)
					{
						$output_string .= "<td nowrap>".$row[$i]."</td>";
					}
					$output_string .= "</tr>";
				}
				$output_string .= "</table><br>";
			}
			
			// School observation data - long
			$query = "SELECT * FROM school_long WHERE apfschoolcode=".$this->apfschoolcode." ORDER BY year";
			$dbquery = new dbquery($query,$connid);
			if($dbquery->numrows()>0)
			{
		    	$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
		    	
				$output_string_header2 .= "<tr bgcolor='#FFC682'>";

				$fieldquery = "SHOW COLUMNS FROM school_short";
				$fielddbquery = new dbquery($fieldquery,$connid);
				$columns = 0;
				while($row = $fielddbquery->getrowarray())
				{
					$output_string_header2 .= "<td><b>".$row["Field"]."</b></td>";
					$columns++;
				}
				$output_string_header2 .= "</tr>";
				$output_string_header1 .= "<tr bgcolor='#FF952B'><td colspan='".$columns."'><b>School Observation Data - Long</b></td></tr>";
				$output_string .= $output_string_header1.$output_string_header2;
							
				while($row = $dbquery->getrowarray())
				{
					$output_string .= "<tr>";
					for($i=0; $i<$columns; $i++)
					{
						$output_string .= "<td nowrap>".$row[$i]."</td>";
					}
					$output_string .= "</tr>";
				}
				$output_string .= "</table>";
				return $output_string;
			}
			else
			{
				echo "<center><font face='verdana' size='2' color='red'>No school observation data found for school code: ".$this->apfschoolcode."</center></font>";
			}
		}
	}
 
	// Function called from ap_teacher_information.php.	Added by Arpit (05/12/2007) - For fetching teacher information
    function pageTeacherInformation($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$teacher_query = "SELECT * FROM teacher_master WHERE teacher_code=".$this->teachercode;
		$dbquery = new dbquery($teacher_query,$connid);
		$row = $dbquery->getrowarray();
		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
		$output_string .= "<tr bgcolor='#FF952B'><td colspan='4' align='center'><b>Teacher Information</b></td></tr>";
		$output_string .= "<tr bgcolor='#FFC682'><td><b>School Code</b></td><td><b>Teacher Code</b></td><td><b>Teacher Name</b></td><td><b>Teacher Degree</b></td></tr>";
		$output_string .= "<tr><td align='center'><a href='ap_school_observation.php?apfschoolcode=".$row['apfschoolcode']."'>".$row["apfschoolcode"]."</a></td><td align='center'>".$row["teacher_code"]."</td><td align='center'>".$row["teacher_name"]."</td><td align='center'>".$row["degree"]."</td></tr>";
		$output_string .= "</table><br>";
		
		// Teacher observation data - short
		$query = "SELECT * FROM teacher_short WHERE teacher_code=".$this->teachercode." ORDER BY year,rounds";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows()>0)
		{
	    	$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
	    	
			$output_string_header2 .= "<tr bgcolor='#FFC682'>";

			$fieldquery = "SHOW COLUMNS FROM teacher_short";
			$fielddbquery = new dbquery($fieldquery,$connid);
			$columns = 0;
			while($row = $fielddbquery->getrowarray())
			{
				$output_string_header2 .= "<td><b>".$row["Field"]."</b></td>";
				$columns++;
			}
			$output_string_header2 .= "</tr>";
			$output_string_header1 .= "<tr bgcolor='#FF952B'><td colspan='".$columns."'><b>Teacher Observation Data - Short</b></td></tr>";
			$output_string .= $output_string_header1.$output_string_header2;
						
			while($row = $dbquery->getrowarray())
			{
				$output_string .= "<tr>";
				for($i=0; $i<$columns; $i++)
				{
					$output_string .= "<td nowrap>".$row[$i]."</td>";
				}
				$output_string .= "</tr>";
			}
			$output_string .= "</table><br>";
		}
		
		// Teacher observation data - Interview
		$query = "SELECT * FROM teacher_interview WHERE teacher_code=".$this->teachercode." ORDER BY year";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows()>0)
		{
	    	$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
	    	
			$output_string_header2 = "<tr bgcolor='#FFC682'>";

			$fieldquery = "SHOW COLUMNS FROM teacher_interview";
			$fielddbquery = new dbquery($fieldquery,$connid);
			$columns = 0;
			while($row = $fielddbquery->getrowarray())
			{
				$output_string_header2 .= "<td><b>".$row["Field"]."</b></td>";
				$columns++;
			}
			$output_string_header2 .= "</tr>";
			$output_string_header1 = "<tr bgcolor='#FF952B'><td colspan='".$columns."'><b>Teacher Interview Data</b></td></tr>";
			$output_string .= $output_string_header1.$output_string_header2;
						
			while($row = $dbquery->getrowarray())
			{
				$output_string .= "<tr>";
				for($i=0; $i<$columns; $i++)
				{
					$output_string .= "<td nowrap>".$row[$i]."</td>";
				}
				$output_string .= "</tr>";
			}
			$output_string .= "</table>";
		}
		return $output_string;
	}
	
	// Function called from ap_students_taughtbysameteacher_inbothroounds.php.	Added by Arpit (05/12/2007) - For getting list of students who taught by same teacher in more than one year
    function pageStudentsTaughtBySameTeacherInBothRounds($connid)
   	{
   		//echo "Start Time:".date("H:i:s")."<br>";
   		
   		//$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
		 
   		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
		$output_string .= "<tr bgcolor='#FF952B'><td align='center' colspan='6'><b>List of students taught by same teacher in both years</b></td></tr>";
   		$output_string .= "<tr bgcolor='#FFC682'><td align='center'><b>Sr No.</b></td>";
		
   		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='APFSchoolCode' and $this->clspaging->sorttype=='ASC') 
			$output_string .= "<img src=images/down_arrow.GIF height=12 border=0>&nbsp;";
		else if($this->clspaging->sortby=='APFSchoolCode' and $this->clspaging->sorttype=='DESC') 
			$output_string .= "<img src=images/up_arrow.GIF height=12 border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('APFSchoolCode')><b>School Code</b></a></b></td>";
		
		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='unique_student_code' and $this->clspaging->sorttype=='ASC') 
			$output_string .= "<img src=images/down_arrow.GIF height=12 border=0>&nbsp;";
		else if($this->clspaging->sortby=='unique_student_code' and $this->clspaging->sorttype=='DESC') 
			$output_string .= "<img src=images/up_arrow.GIF height=12 border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('unique_student_code')><b>Student Code</b></a></b></td>";
		
		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='Name' and $this->clspaging->sorttype=='ASC') 
			$output_string .= "<img src=images/down_arrow.GIF height=12 border=0>&nbsp;";
		else if($this->clspaging->sortby=='Name' and $this->clspaging->sorttype=='DESC') 
			$output_string .= "<img src=images/up_arrow.GIF height=12 border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('Name')><b>Student Name</b></a></b></td>";
		
		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='Class' and $this->clspaging->sorttype=='ASC') 
			$output_string .= "<img src=images/down_arrow.GIF height=12 border=0>&nbsp;";
		else if($this->clspaging->sortby=='Class' and $this->clspaging->sorttype=='DESC') 
			$output_string .= "<img src=images/up_arrow.GIF height=12 border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('Class')><b>Current Class</b></a></b></td>";
		$output_string .= "<td align='center'><b>Teacher Code</b></td></tr>";
					
   		$srno=1;
   		$query = "SELECT COUNT(*) FROM studentnamemasterlist_y2";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->clspaging->numofrecs = $row[0];
		if($this->clspaging->numofrecs >0)
		{
			$this->clspaging->getcurrpagevardb();
		}
		
		//$query = $querySelect.$queryFrom.$queryLeftJoin." ".$queryWhere." ".$condition." "."ORDER BY $this->sortby $this->sorttype"." ".$this->clspaging->limit;
   		$query = "SELECT APFSchoolCode, Class, Name, unique_student_code FROM studentnamemasterlist_y2 ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
 		//echo $query."<br>"; //exit;
   		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$class_y1 = $row["Class"] - 1;
			$class_y2 = $row["Class"];
			
			$queryyear1 = "SELECT teacher_code FROM teacher_class_mapping_y1 WHERE apfschoolcode=".$row["APFSchoolCode"]." AND class=".$class_y1;
			$queryyear2 = "SELECT teacher_code FROM teacher_class_mapping_y2 WHERE apfschoolcode=".$row["APFSchoolCode"]." AND class=".$class_y2;

			$dbquery_y1 = new dbquery($queryyear1,$connid);
			$dbquery_y2 = new dbquery($queryyear2,$connid);
			$row_y1 = $dbquery_y1->getrowarray();
			$row_y2 = $dbquery_y2->getrowarray();
			$teachercode_y1 = $row_y1["teacher_code"];
			$teachercode_y2 = $row_y2["teacher_code"];
			if($teachercode_y1 == $teachercode_y2)
			{
				$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'><a href='ap_school_observation.php?apfschoolcode=".$row["APFSchoolCode"]."'>".$row["APFSchoolCode"]."</a></td><td align='center'>".$row["unique_student_code"]."</td><td>".$row["Name"]."</td><td align='center'>".$class_y2."</td><td align='center'><a href='ap_teacher_observation.php?teacher_code=".$teachercode_y1."'>".$teachercode_y1."</a></td></tr>";
				$srno++;
			}
		} 		
		$output_string .= "</table>";
		return $output_string;
		
		//echo "End Time:".date("H:i:s");
   	}

	// Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (17/11/2007) - For group of students roundwise performance report
    function pageAllStudentRoundwisePerformance($connid)
    {
    	echo "Start time: ".date("h:i:s");
    	$handle = fopen ("reports_CTS/trace.txt", "w");
    	$handle1 = fopen ("reports_CTS/studentwiseperformancefile2.html", "w");
    	$srno = 1;
		$roundarray = array("Jul2005","Feb2006","Mar2006","Feb2007","Mar2007");
		$totalrounds = count($roundarray);
    	$output_string_schoolclass  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
    	$output_string_schoolclass .= "<tr bgcolor='#DCDCDC'><td colspan='12' align='center'><b>Roundwise student's school and class</b></td></tr>";
    	$output_string_schoolclass .= "<tr><td rowspan='2'><b>Sr. No</b></td><td  rowspan='2'><b>Student Code</b></td><td colspan='2'><b>Jul-2005</b></td><td  colspan='2'><b>Feb-2006</b></td><td  colspan='2'><b>Mar-2006</b></td><td  colspan='2'><b>Feb-2007</b></td><td  colspan='2'><b>Mar-2007</b></td></tr>";
    	$output_string_schoolclass .= "<tr><td><b>SchoolCode</b></td><td><b>Class</b></td><td><b>SchoolCode</b></td><td><b>Class</b></td><td><b>SchoolCode</b></td><td><b>Class</b></td><td><b>SchoolCode</b></td><td><b>Class</b></td><td><b>SchoolCode</b></td><td><b>Class</b></td></tr>";

    	$output_string_mathsperformance  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
    	$output_string_mathsperformance .= "<tr bgcolor='#DCDCDC'><td colspan='7' align='center'><b>Roundwise student's maths total</b></td></tr>";
    	$output_string_mathsperformance .= "<tr><td><b>Sr. No</b></td><td><b>Student Code</b></td><td><b>Jul-2005</b></td><td><b>Feb-2006</b></td><td><b>Mar-2006</b></td><td><b>Feb-2007</b></td><td><b>Mar-2007</b></td></tr>";

		$studentcode_query = "SELECT unique_student_code FROM studentnamemasterlist_y2 ORDER BY unique_student_code LIMIT 5001,10000";
		//$studentcode_query = "SELECT unique_student_code FROM studentnamemasterlist_y2 ORDER BY unique_student_code";
		$dbquery = new dbquery($studentcode_query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$previousschoolcode = 0;
			$previousclass = 0;
			$studentcode = $row["unique_student_code"];
			$output_string_schoolclass .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['unique_student_code']."</td>";
			$output_string_mathsperformance .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['unique_student_code']."</td>";

			$studentperformancequery = "SELECT * from ap_allround_assessment_summarydata WHERE unique_student_code=".$studentcode;
			$studentperformancedbquery = new dbquery($studentperformancequery,$connid);
			$recordcount = $studentperformancedbquery->numrows();
			$i=0;
			$roundwisedataarray = array();
			while($studentperformancerow = $studentperformancedbquery->getrowarray())
			{
				$roundwisedataarray[$studentperformancerow['round']] = $studentperformancerow;
			}

			for($i=0;$i<$totalrounds;$i++)
			{
				if(isset($roundwisedataarray[$roundarray[$i]]))
				{
					$studentperformancerow = array();
					$studentperformancerow = $roundwisedataarray[$roundarray[$i]];
					if(($previousschoolcode !=0 && ($previousschoolcode != $studentperformancerow['APFSchoolCode'])) || ($previousclass !=0 && ($previousclass > $studentperformancerow['class'])))
						$output_string_schoolclass .= "<td align='center' bgcolor='#FFBBFF'><a href='ap_school_observation.php?apfschoolcode=".$studentperformancerow["APFSchoolCode"]."'>".$studentperformancerow['APFSchoolCode']."</a></td><td align='center'>".$studentperformancerow['class']."</td>";
					else
						$output_string_schoolclass .= "<td align='center'><a href='ap_school_observation.php?apfschoolcode=".$studentperformancerow["APFSchoolCode"]."'>".$studentperformancerow['APFSchoolCode']."</a></td><td align='center'>".$studentperformancerow['class']."</td>";
					$output_string_mathsperformance .= "<td align='center'>".number_format($studentperformancerow['mathsTotal'],1)."</td>";
					$previousschoolcode = $studentperformancerow['APFSchoolCode'];
					$previousclass = $studentperformancerow['class'];
				}
				else
				{
					$output_string_schoolclass .= "<td align='center'>-</td><td align='center'>-</td>";
					$output_string_mathsperformance .= "<td align='center'>-</td>";
				}
			}
			$filestring = $srno."-".$studentcode."\r\n";
			fwrite($handle,$filestring);
			$output_string_schoolclass .= "</tr>";
			$srno++;

		}
		$output_string_schoolclass .= "</table><br>";
		$output_string_mathsperformance .= "</table>";

		fwrite($handle1,$output_string_schoolclass);
		fwrite($handle1,$output_string_mathsperformance);
		fclose($handle1);
		fclose($handle);

		echo "<br><br>End time: ".date("h:i:s");
		echo "<br><br>Done...";

		//echo $output_string_schoolclass."<br>";
		//echo $output_string_mathsperformance;
    }

	function pageSummaryReport($connid)
	{
		echo "Start time: ".date("h:i:s");

		// Number of students participated 1,2,3,4,5 times starts here
		$output_string = "<center><font face='verdana' size='2'><b><u>Summary Report</u></b></center><br>";
		$output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
    	$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='2' align='center'><b>Number of students participated 1,2,3,4,5 times</b></td></tr>";
    	$output_string .= "<tr><td><b>Number of times student participated</b></td><td><b>Number of students</b></td></tr>";
		$handle = fopen ("reports_CTS/summaryreport.html", "w");
		$total = 0;
		for($round=1;$round<=5;$round++)
		{
			$studentcode_query = "SELECT unique_student_code, count( unique_student_code ) FROM ap_allround_assessment_summarydata
								  GROUP BY unique_student_code HAVING count( unique_student_code )=".$round;

			$dbquery = new dbquery($studentcode_query,$connid);
			$totalstudents = $dbquery->numrows();
			$total += $totalstudents;
			$output_string .= "<tr><td align='center'>".$round."</td><td align='center'>".$totalstudents."</td></tr>";
		}
		$output_string .= "<tr><td align='center'><b>Total</b></td><td align='center'><b>".$total."</b></td></tr>";
		$output_string .= "</table>";
		// Number of students participated 1,2,3,4,5 times ends here

		fwrite($handle,$output_string);
		fclose($handle);

		echo "<br><br>End time: ".date("h:i:s");
		echo "<br><br>Done...";
	}

	function fetchstudentname($studentcode,$connid)
	{
		$studentnamequery = "SELECT Name FROM studentnamemasterlist_y2 WHERE unique_student_code=".$studentcode;
		$dbquery = new dbquery($studentnamequery,$connid);
		$row = $dbquery->getrowarray();
		return $row["Name"];
	}

	function fetchDistrictNames($connid)
	{
		$districtnames = array();
		$query = "SELECT DISTINCT DistrictName FROM school_master_allocation_y2 ORDER BY DistrictName";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($districtnames,$row["DistrictName"]);
		}
		return $districtnames;
	}

	function fetchMandalNames($districtname, $connid)
	{
		$mandalnames = "";
		$query = "SELECT DISTINCT MandalName FROM school_master_allocation_y2 WHERE DistrictName='".$districtname."' ORDER BY MandalName";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$mandalnames .= $row["MandalName"].",";
		}
		$mandalnames = substr($mandalnames, 0, -1);
		return $mandalnames;
	}
	
	function fetchSchoolCodes($mandalname, $connid)
	{
		$schoolcodes = "";
		$query = "SELECT DISTINCT APFSchoolCode FROM school_master_allocation_y2 WHERE MandalName='".$mandalname."' ORDER BY APFSchoolCode";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schoolcodes .= $row["APFSchoolCode"].",";
		}
		$schoolcodes = substr($schoolcodes, 0, -1);
		return $schoolcodes;
	}

	function fetchTreatments($connid)
	{
		$treatments = array();
		$query = "SELECT DISTINCT Treatment FROM school_master_allocation_y2 ORDER BY Treatment";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($treatments,$row["Treatment"]);
		}
		return $treatments;
	}
	
	function exporttoexcel($data)
	{
		$datafile = "data_".date('YmdHis').".csv";
		$filename = "exporteddatafiles/".$datafile;
		
		$pattern[0] = "/<table([^>]*)>/i";
		$replacement[0] = "";
		
		$pattern[1] = "/<\/table>/i";
		$replacement[1] = "";
		
		$pattern[2] = "/<tr([^>]*)>/i";
		$replacement[2] = "";
		
		$pattern[3] = "/<\/tr>/i";
		$replacement[3] = "&";
		
		$pattern[4] = "/<td([^>]*)>/i";
		$replacement[4] = "";
		
		$pattern[5] = "/<\/td>/i";
		$replacement[5] = ",";
		
		$replaced_data = preg_replace($pattern, $replacement, $data);
		$data = strip_tags($replaced_data);
		$replaced_data = str_replace("&nbsp;","",$data);
		
		$filedata = "";
		$dataArray = explode("&",$replaced_data);
		$totalRows = count($dataArray);
		for($i=0; $i<$totalRows; $i++)
		{
			$filedata .= $dataArray[$i]."\n";
		}
		
		$fp = fopen($filename,"w");
		fwrite($fp,$filedata);
		fclose($fp);
		
		$output_string = "<center><font face='verdana' size='1'>Data exported successfully in file <b><a href='".$filename."'>".$datafile."</a></b>.";
		$output_string .= "<br><br>Right click on file name and select save as option to save the file.</font></center>";
		return $output_string;
	}
	
	/*
	// Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (22/11/2007) - For fetching schoolwise student's data
    function pageSchoolwiseStudentData($connid)
	{
		//$fp = fopen("performancetime.txt","w");
		//$startstring = "Started At: ".date("h:i:s")."\r\n";
		//fwrite($fp, $startstring);
		
		if($this->action == "Fetch Student Performance")
		{
			$output_string_master = "";
			$schoolcodelist="";
			if($this->apfschoolcode==0)
			{
				$condition = " WHERE DistrictName='".$this->district."'";
				if($this->mandal!="")
					$condition .= " AND MandalName='".$this->mandal."'";
				if($this->treatment!="")
					$condition .= " AND Treatment='".$this->treatment."'";
				$schoolquery = "SELECT APFSchoolCode FROM school_master_allocation_y2".$condition." ORDER BY APFSchoolCode" ;
				$dbquery = new dbquery($schoolquery,$connid);
				while($row = $dbquery->getrowarray())
				{
					$schoolcodelist .= $row["APFSchoolCode"].",";
				}
				$schoolcodelist = substr($schoolcodelist, 0, -1);
			}
			else
			{
				$schoolcodelist = $this->apfschoolcode;
			}

			$schoolcodelistArray = explode(",",$schoolcodelist);
			$totalschoolcodes = count($schoolcodelistArray);
			for($index=0;$index<$totalschoolcodes;$index++)
			{
				$schoolcode = $schoolcodelistArray[$index];
				$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
			    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='3' align='center'><b>School Code: <a href='ap_school_observation.php?schoolcode=".$schoolcode."'>".$schoolcode."</a></b></td></tr>";
		    	$output_string .= "<tr bgcolor='#DCDCDC'><td><b>Sr No.</b></td><td><b>Student Code</b></td><td><b>Student's Roundwise Performance</b></td></tr>";

		    	$condition = " WHERE APFSchoolCode=".$schoolcode;
		    	if($this->class != 0)
		    		$condition .= " AND Class=".$this->class;

		    	$studentdataquery = "SELECT APFSchoolCode,Name,unique_student_code,Class FROM studentnamemasterlist_y2 ".$condition;
		    	//echo $studentdataquery; exit;
		    	$dbquery = new dbquery($studentdataquery,$connid);
				$srno=1;
				while($row = $dbquery->getrowarray())
				{
					$studentcode = $row["unique_student_code"];
					$class = $row["Class"];
			    	$studentperformancedata = $this->pageStudentRoundwisePerformance($studentcode,$schoolcode,$connid);
			    	if($studentperformancedata != "")
			    	{
						$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$studentcode."</td>";
				    	$output_string .= "<td align='center'>".$studentperformancedata."</td></tr>";
				    	$filestring = $srno."-".$schoolcode."-".$studentcode."\r\n";
				    	//fwrite($fp,$filestring);
				    	$srno++;
			    	}
				}
				$output_string .= "</table><br>";
				//echo $output_string;
				$output_string_master .= $output_string;
			}
			return $output_string_master;
		}
		$endstring = "Started At: ".date("h:i:s");
		//fwrite($fp, $endstring);
	}
	
	// Function called from ap_student_roundwise_performance_tracking.php.	Added by Arpit (21/11/2007) - For individual student roundwise performance report
    function pageStudentRoundwisePerformance($studentcode,$schoolcode,$connid)
	{
		$allrounddataArray = array();
		$fieldlist = "";
		$fieldlist1 = "";
		$fieldlistArray = array("APFSchoolCode","Class","mathsTotal","teluguTotal","studentTotal","mathsPercentile","teluguPercentile","studentPercentile");
		$totalfields = count($fieldlistArray);
		for($i=0; $i<$totalfields; $i++)
		{
			if(isset($_POST[$fieldlistArray[$i]]))
				$fieldlist .= $fieldlistArray[$i].",";
			$fieldlist1 .= $fieldlistArray[$i].",";
		}
		if($fieldlist != "")
			$fieldlist = substr($fieldlist, 0, -1);
		else
			$fieldlist1 = substr($fieldlist1, 0, -1);

		if($fieldlist == "")
			$fieldlist = $fieldlist1;

		$allrounddataArray = array();
		$roundarray = array("Jul2005","Feb2006","Feb2007","Mar2006","Mar2007");
		$totalrounds = count($roundarray);
    	$condition = " WHERE unique_student_code=".$studentcode;
		if($this->subject!="")
		{
			$subjectcode = ucwords(substr($this->subject,0,1));
			if($subjectcode == "T")
				$condition .= " AND teluguTotal".$this->markscondition.$this->marksincondition;
			if($subjectcode == "M")
				$condition .= " AND mathsTotal".$this->markscondition.$this->marksincondition;
		}
		
		$pos = strpos($fieldlist, "Class");
		if($pos)
		{
			$studenrperformanceQuery = "SELECT ".$fieldlist.",round FROM ap_allround_assessment_summarydata".$condition;
		}
		else 
		{
			$studenrperformanceQuery = "SELECT ".$fieldlist.",Class,round FROM ap_allround_assessment_summarydata".$condition;
		}
		//echo $studenrperformanceQuery."<br>"; exit;
		$studentperformancedbquery = new dbquery($studenrperformanceQuery,$connid);
		while($studentperformancerow = $studentperformancedbquery->getrowarray())
		{
			$allrounddataArray[$studentperformancerow['round']] = $studentperformancerow;
		}

		$output_string = "";
		if(count($allrounddataArray)>0)
		{
			$output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#FF952B'>";
	    	$output_string .= "<tr><td><b>Sr No.</b></td><td><b>Field</b></td><td><b>Y0_BEL</b></td><td><b>Y1_EL</b></td><td><b>Y2_EL</b></td><td><b>Y1_HEL</b></td><td><b>y2_HEL</b></td></tr>";
	    	$srno=1;
	    	$fieldlistArray = explode(",",$fieldlist);
	    	$totalfields = count($fieldlistArray);
			for($i=0; $i<$totalfields; $i++)
			{
				$field = $fieldlistArray[$i];
				$output_string .= "<tr><td align='center'>".$srno."</td>";

				if($field == "mathsTotal" || $field == "teluguTotal")
					$output_string .="<td><a href='ap_showallquestionsscoreofallrounds.php?subject=".$field."&studentcode=".$studentcode."'>".$field."</td>";
				else
					$output_string .="<td>".$field."</td>";

				for($j=0; $j<$totalrounds; $j++)
				{
					$rounddata = $allrounddataArray[$roundarray[$j]];
					$output_string .= "<td align='center'>".$rounddata[$field]."</td>";
				}
				$output_string .= "</tr>";
				$srno++;
			}
			$class1=0; $class2=0;
			for($j=1; $j<$totalrounds; $j++)
			{
				$rounddata = $allrounddataArray[$roundarray[$j]];
				if($j==1) 
					if($rounddata["Class"]!="")
						$class1 = $rounddata["Class"];
				if($j==2) 
					if($rounddata["Class"]!="")
						$class2 = $rounddata["Class"];
			}
			if((isset($this->teachercode) && $this->teachercode != "0") || $fieldlist == $fieldlist1)
			{
				//echo "Inside"; exit;
				$tquery1 = "SELECT teacher_code FROM teacher_class_mapping_y1 WHERE apfschoolcode=".$schoolcode." AND class=".$class1;
				$tquery2 = "SELECT teacher_code FROM teacher_class_mapping_y2 WHERE apfschoolcode=".$schoolcode." AND class=".$class2;
				//echo $tquery1."<br>";
				$tdbquery1 = new dbquery($tquery1,$connid);
				//echo $tquery2; exit;
				$tdbquery2 = new dbquery($tquery2,$connid);
				
				$tcode1 = ""; $tcode2 = "";
				if($tdbquery1->numrows()>0)
				{
					$tcode1row = $tdbquery1->getrowarray();
					$tcode1 = $tcode1row["teacher_code"];
				}
				if($tdbquery2->numrows()>0)
				{
					$tcode2row = $tdbquery2->getrowarray();
					$tcode2 = $tcode2row["teacher_code"];
				}
				$output_string .= "<tr><td align='center'>".$srno."</td><td>Teacher Code</td>";
				for($j=0;$j<$totalrounds;$j++)
				{
					if($j==0)
						$output_string .= "<td>&nbsp;</td>";
					if($j==1 || $j==3)  
					{
						if($tcode1 == "")
							$output_string .= "<td>".$tcode1."</td>";
						else
							$output_string .= "<td><a href='ap_teacher_information.php?teacher_code=".$tcode1."'>".$tcode1."</a></td>";
					}
					if($j==2 || $j==4)  
					{
						if($tcode2 == "")
							$output_string .= "<td>".$tcode2."</td>";
						else
							$output_string .= "<td><a href='ap_teacher_information.php?teacher_code=".$tcode2."'>".$tcode2."</a></td>";
					}
				}
			}
			$output_string .= "</table>";
		}
		return $output_string;
	}
	*/
}
?>