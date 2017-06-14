<?php

class clsschoolstudentresult
{
	var $cts_number;
	var $schoolcode;
	var $schoolname;
	var $password;
	var $actiontoperform;
	var $errormsg;
	var $test_edition_array;
	var $test_edition_names_array;
	var $total_test_editions;
	var $subject;
	var $subject_array;
	var $total_subjects;
	var $class_array;
	var $total_classes;
	var $testclass_array;
	var $totaltest_classes;
	var $dzongkhagcode;
	var $gewogcode;
	var $villagecode;
	var $papercode;
	var $qno;

	function clsschoolstudentresult()
	{
		$this->cts_number="";
		$this->schoolcode="";
		$this->schoolname;
		$this->password="";
		$this->actiontoperform="";
		$this->errormsg="";
		$this->test_edition_array = array("V","W","X");
		$this->test_edition_names_array = array("V"=>"2008","W"=>"2010","X"=>"2011");
		$this->total_test_editions = count($this->test_edition_array);
		$this->subject="";
		$this->subject_array = array("English","Maths","Science");
		$this->total_subjects = count($this->subject_array);
		$this->class_array = array("3","4","5","6","7","8","9","10","11","12");
		$this->total_classes = count($this->class_array);
		$this->testclass_array = array("4","6","8");
		$this->totaltest_classes = count($this->testclass_array);
		$this->dzongkhagcode="";
		$this->gewogcode="";
		$this->villagecode="";
		$this->papercode="";
		$this->qno="";
  	}

	function setpostvars()
	{
		if(isset($_POST["cts_number"])) 						$this->cts_number = DoTrim($_POST["cts_number"]);
		if(isset($_POST["schoolcode"])) 						$this->schoolcode = DoTrim($_POST["schoolcode"]);
		if(isset($_POST["password"])) 							$this->password = DoTrim($_POST["password"]);
		if(isset($_POST["hdn_actiontoperform"])) 				$this->actiontoperform 	= DoTrim($_POST["hdn_actiontoperform"]);
	}

	function setgetvars()
	{
		if(isset($_GET["cts_number"])) 						$this->cts_number 		= DoTrim($_GET["cts_number"]);
		if(isset($_GET["schoolcode"])) 						$this->schoolcode 		= DoTrim($_GET["schoolcode"]);
		if(isset($_GET["schoolname"])) 						$this->schoolname 		= DoTrim($_GET["schoolname"]);
		if(isset($_GET["DzongkhagCode"])) 					$this->dzongkhagcode    = DoTrim($_GET["DzongkhagCode"]);
		if(isset($_GET["GewogCode"])) 						$this->gewogcode   		= DoTrim($_GET["GewogCode"]);
		if(isset($_GET["VillageCode"])) 					$this->villagecode   	= DoTrim($_GET["VillageCode"]);
		if(isset($_GET["subject"])) 						$this->subject 			= DoTrim($_GET["subject"]);
		if(isset($_GET["papercode"])) 						$this->papercode 		= DoTrim($_GET["papercode"]);
		if(isset($_GET["qno"])) 							$this->qno 				= DoTrim($_GET["qno"]);
	}

	/***
	    Function called from bt_showQuestion.php. Added by Arpit (14/03/2008) - For showing question.
    **/
	function pageShowQuestion($connid)
	{
		$this->setgetvars();
		$qimage = $this->papercode."_".$this->qno.".JPG";
		$output_string = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		//$output_string .= "<td><b><font color='#FF0000'>When actual data is provided, question details will be displayed here...</font></b></td>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><image src='images/QuestionImages_ASSL/".$qimage."'></td></tr>";
		$output_string .= "</table>";

		/*$query = "SELECT qcode FROM paper_master WHERE papercode='".$this->papercode."' AND qno=".$this->qno;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$qcode = $row['qcode'];

		$query = "SELECT * FROM questions WHERE qcode=".$qcode;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();

		$output_string = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string .= "<tr><td bgcolor='#bf0000' align='center'><b><font size='2'>Question<br>".$this->qno."</font></b></td>";
		$output_string .= "<td></td><td bgcolor='#ff9c00'><b>".$row['question']."</td>";
		$output_string .= "</tr></table><br>";

		$output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string .= "<tr><td bgcolor='#ff9c00' align='center'><b>A</b></td><td>".$row['optiona']."</td>";
		$output_string .= "<td bgcolor='#ff9c00' align='center'><b>B</b></td><td>".$row['optionb']."</td></tr>";

		$output_string .= "<tr><td align='center' colspan='4'></td></tr>";

		$output_string .= "<tr><td bgcolor='#ff9c00' align='center'><b>C</b></td><td>".$row['optionc']."</td>";
		$output_string .= "<td bgcolor='#ff9c00' align='center'><b>D</b></td><td>".$row['optiond']."</td>";
		$output_string .= "</tr></table>";*/

		return $output_string;
	}

	/***
	    Function called from bt_showStudentQuestionlevelSkillReport.php. Added by Arpit (14/03/2008) - For showing student's question level skill based report.
    **/
	function pageStudentQuestionlevelSkillReport($connid)
	{
		$this->setgetvars();

		$correctAnswers = array();
		$questionWiseSkill = array();
		$paperDetailsArray = array();
		$skill_names = array();
		$skillwise_totalquestions = array();
		$number_of_skills = array();

		$this->fetchQuestionDetails(&$correctAnswers,&$questionWiseSkill,$connid);
		$this->fetchPaperDetails(&$paperDetailsArray,$connid);
		$this->set_skill_names(&$skill_names, &$skillwise_totalquestions, &$number_of_skills, $connid);

		$subjectno = array_search($this->subject,$this->subject_array);
		$subjectno++;

		$output_string = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string .= "<tr><td bgcolor='#bf0000' align='center'><b><font size='2' color='#FFFFFF'>Question Level Details</font></b></td>";
		$output_string .= "<tr><td bgcolor='#ff9c00' align='center'><b>Student Name: </b>".$this->fetchStudentName($this->cts_number,$connid)."<b>&nbsp;&nbsp;SATS Number: </b>".$this->cts_number."</td>";
		$output_string .= "</tr></table><br>";


		for($ri=0; $ri<$this->total_test_editions; $ri++)
		{
			$test_edition = $this->test_edition_array[$ri];
			$query = "SELECT * FROM assessment".$test_edition." WHERE cts_number=".$this->cts_number." AND subjectno=".$subjectno;
			//echo $query."<br>";
			$dbquery = new dbquery($query,$connid);
			if($dbquery->numrows() == 0)
			{
				continue;
			}
			else
			{
				$totalmarks = 0;
				$row = $dbquery->getrowarray();
				$class = $row['class'];
				$schoolcode = $row['school_code'];
				$papercode = $subjectno.$class.$test_edition;
				$totalQuestions = $paperDetailsArray[$papercode];

				$stquery = "SELECT COUNT(*) FROM assessment".$test_edition." WHERE class='".$class."' AND subjectno=".$subjectno." AND school_code=".$schoolcode;
				$stdbquery = new dbquery($stquery,$connid);
				$strow = $stdbquery->getrowarray();
				$totalStudents = $strow['COUNT(*)'];

				$output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
				$output_string .= "<tr><td bgcolor='#bf0000' colspan='7' align='center'><font color='#FFFFFF'><b>Round:</b> ".$this->test_edition_names_array[$test_edition]." <b>Class:</b> ".$class." <b>Subject:</b> ".$this->subject."</font></td></tr>";
				$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Q No</b></td><td align='center'><b>Skill Tested</b></td><td align='center'><b>Selected<br>Answer</b></td><td align='center'><b>Correct<br>Answer</b></td><td align='center'><b>Result</b></td><td align='center'><b>Marks<br>Scored</b></td><td align='center'><b>% Correct<br>In Class</b></td></tr>";

				for($qno=1; $qno<=$totalQuestions; $qno++)
				{
					$skillno = $questionWiseSkill[$papercode][$qno];
					$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><a href='javascript: showquestion(\"".$papercode."\",".$qno.")'>".$qno."</a></td>";
					
					$output_string .= "<td>".$skill_names[$papercode][$skillno]."</td>";
					if($row['A'.$qno] == "")
						$output_string .= "<td align='center'>&nbsp;</td>";
					else
						$output_string .= "<td align='center'>".$row['A'.$qno]."</td>";
					$output_string .= "<td align='center'>".$correctAnswers[$papercode][$qno]."</td>";

					if($row['A'.$qno] == $correctAnswers[$papercode][$qno])
						$output_string .= "<td align='center'><image src='images/tickmark.JPG'></td>";
					else
						$output_string .= "<td align='center'><font color='#FF0000'><b>X</b></font></td>";

					$stquery = "SELECT SUM(R".$qno.") as Total FROM assessment".$test_edition." WHERE class='".$class."' AND subjectno=".$subjectno." AND school_code=".$schoolcode;
					$stdbquery = new dbquery($stquery,$connid);
					$strow = $stdbquery->getrowarray();
					$AllStudentsTotal = $strow['Total'];
					//echo $stquery."<br>";

					$percentage = Donumber_format($AllStudentsTotal/$totalStudents*100,1);
					$output_string .= "<td align='center'>".$row['R'.$qno]."</td><td align='center'>".$percentage."</td></tr>";
					$totalmarks += $row['R'.$qno];
				}
				$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='right' colspan='5'><b>Total</b></td><td align='center'><b>".$totalmarks."</b></td><td align='center'>&nbsp;</td></tr>";
				$output_string .= "</table><br>";
			}

		}
		return $output_string;
	}

	/***
	    Function called from bt_studentResultSummary.php. Added by Arpit (21/01/2008) - For showing student result summary
    **/
    function pageStudentResultSummary($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Show Student Result")
		{
			$paperDetailsArray = array();
			$this->fetchPaperDetails(&$paperDetailsArray,$connid);
		
			$query = "SELECT firstname,lastname FROM student_master WHERE cts_number='".$this->cts_number."'";
			$dbquery = new dbquery($query,$connid);
	    	$row = $dbquery->getrowarray();
	    	$studentname = $row['firstname']." ".$row['lastname'];
			$query = "";
			for($i=0; $i<$this->total_test_editions; $i++)
			{
				$query .= "SELECT * FROM studentwise".$this->test_edition_array[$i]." WHERE cts_number=".$this->cts_number." UNION ";
			}
			$query = substr($query, 0, -7);
			$dbquery = new dbquery($query,$connid);
			//echo $query."<br>";
			if($dbquery->numrows() == 0)
			{
				$this->errormsg = "Student has not participated in ASSL so no assessment data is found...";
				return;
			}
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
			$output_string .= "<tr><td bgcolor='#bf0000' colspan='2' align='center'><b><font size='2' color='#FFFFFF'>All Round Result - Summary Report</font></b></td></tr>";
			$srno = 1;
			$test_edition_string = "";
			$e_perc_string = "";
			$m_perc_string = "";
			$s_perc_string = "";
			$t_perc_string = "";

			$note  = "For example, if your score in English is 17/45 (17 out of 45), it means you have answered 17 questions correctly out of 45 questions asked in the paper.";
			$note .= "<br><b><u>Note:</u></b><br>Percentile score is the percentage of students’  whose score is the same or less than your score in the paper. Thus if your percentile score is 60 in Maths, it means that 60% of all those who took the Maths test scored same or less than you. Note that percentile is not the same as the percentage of your total score.<br><br>Percentage is a way of expressing a number out of 100. For example, if your score is 45% then you have scored 45 out of 100.";
	    	while($row = $dbquery->getrowarray())
			{
				if($srno == 1)
				{
					$output_string_header  = "<tr bgcolor='#ff9c00'><td colspan='2' align='center'><b>Student Name:&nbsp;</b>".$studentname." &nbsp;&nbsp;<b>SATS Number:&nbsp</b>".$this->cts_number." &nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript: viewchild(".$row['cts_number'].")'><b>View Student Details</b></a></td></tr>";
			    	$output_string_header .= "<tr><td align='top'><table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'><tr><td><b>Sr No.</b></td><td align='center'><b>Round</b></td><td align='center'><b>School<br>Code</b></td><td align='center'><b>Class</b></td><td align='center'><b>Section</b></td><td align='center'><b>English</b></td><td align='center'><b>Maths</b></td><td align='center'><b>Science</b></td><td align='center'><b>Total</b></td><td align='center'><b>English<br>Percentile</b></td><td align='center'><b>Maths<br>Percentile</b></td><td align='center'><b>Science<br>Percentile</b></td><td align='center'><b>Total<br>Percentile</b></td></tr>";
			    	$output_string .= $output_string_header;
				}

				$pce=""; $tqe=0; 
				$pcm=""; $tqm=0;
				$pcs=""; $tqs=0;
				
				$pce = "1".$row['class'].$row['test_edition'];
				$tqe = $paperDetailsArray[$pce];
				
				$pcm = "2".$row['class'].$row['test_edition'];
				$tqm = $paperDetailsArray[$pcm];
				
				$pcs = "3".$row['class'].$row['test_edition'];
				$tqs = $paperDetailsArray[$pcs];
				
				$tq = $tqe+$tqm+$tqs;
				
				$ep = Donumber_format(($row['ep']*100),1); 	$mp = Donumber_format(($row['mp']*100),1);
				$sp = Donumber_format(($row['sp']*100),1);	$tp = Donumber_format(($row['tp']*100),1);
				//echo $row['test_edition']."<br>";
				$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$this->test_edition_names_array[$row['test_edition']]."</td><td align='center'>".$row['school_code']."</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td><td align='center'>".$row['e']."/".$tqe."</td><td align='center'>".$row['m']."/".$tqm."</td><td align='center'>".$row['s']."/".$tqs."</td><td align='center'>".$row['total']."/".$tq."</td><td align='center'>".$ep."</td><td align='center'>".$mp."</td><td align='center'>".$sp."</td><td align='center'>".$tp."</td></tr>";
				$test_edition_string .= $row['test_edition'].",";
				$e_perc_string .= $ep.","; 	$m_perc_string .= $mp.",";
				$s_perc_string .= $sp.","; 	$t_perc_string .= $tp.",";
				$srno++;
			}

			$test_edition_string = substr($test_edition_string, 0, -1);
			$e_perc_string = substr($e_perc_string, 0, -1);   $m_perc_string = substr($m_perc_string, 0, -1);
			$s_perc_string = substr($s_perc_string, 0, -1);   $t_perc_string = substr($t_perc_string, 0, -1);

			$graph_params = "test_edition_string=".$test_edition_string."&e_perc_string=".$e_perc_string."&m_perc_string=".$m_perc_string."&s_perc_string=".$s_perc_string."&t_perc_string=".$t_perc_string;
			//echo $graph_params;
			$output_string .= "<tr><td colspan='15'>".$note."</td></tr>";
			$output_string .= "</table></td>";
			$output_string .= "<td align='center'><b><u>Percentile Graph</u></b><br><img src='bt_studentResultSummaryGraph.php?$graph_params'></td>";
			$output_string .= "</tr>";
			$output_string .= "</table>";

		}
		return $output_string;
	}

	/***
	    Function called from bt_studentResultSummary.php. Added by Arpit (21/01/2008) - For showing student skill summary
    **/
    function pageStudentSkillSummary($connid)
    {
    	$this->setpostvars();
		if($this->actiontoperform == "Show Student Result")
    	{
    		$skill_names = array();
    		$skillwise_totalquestions = array();
			$number_of_skills = array();
			$this->set_skill_names(&$skill_names, &$skillwise_totalquestions, &$number_of_skills, $connid);
			$output_string_master = "<br>";

	    	for($subjectno=1; $subjectno<=$this->total_subjects; $subjectno++)
			{
	    		$roundwise_assessmentdata = array();
				$test_rounds = array();

				$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8ff'>";

				$isSkillsPrinted = 0;

				$query = "";
				for($ri=0; $ri<$this->total_test_editions; $ri++)
				{
					$test_edition = $this->test_edition_array[$ri];
					$query .= "SELECT * FROM assessment".$test_edition." WHERE cts_number=".$this->cts_number." AND subjectno=".$subjectno." UNION ";
				}

				$query = substr($query, 0, -7);
				//echo $query."<br><br>";
				$dbquery = new dbquery($query,$connid);
		    	while($row = $dbquery->getrowarray())
				{
					$roundwise_assessmentdata[$row['test_edition']] = $row;
					array_push($test_rounds, $row['test_edition']);
					$current_papercode = $row['papercode'];
 				}

 				$totalRoundsParticipated = count($test_rounds);
 				$colspan = $totalRoundsParticipated*2 + 3;
 				//$output_string .= "<tr><td bgcolor='#ff9c00' colspan='".$colspan."' align='center'><b>Skill Based Report - ".$this->subject_array[$subjectno-1]." &nbsp;&nbsp;<a href='bt_showStudentQuestionlevelSkillReport.htm'>Show Question Level Skill Report</a></b></td></tr>";
 				$output_string .= "<tr><td bgcolor='#ff9c00' colspan='".$colspan."' align='center'><b>Skill Based Report - ".$this->subject_array[$subjectno-1]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript: studentquestionlevelskillreport(".$this->cts_number.",\"".$this->subject_array[$subjectno-1]."\")'>Show Question Level Skill Report</a></b></td></tr>";
 				$output_string .= "<tr><td align='center'><b>Sr No.</b></td><td align='center'><b>Skill</b></td>";
 				for($te=0; $te<$totalRoundsParticipated; $te++)
 				{
 					$output_string .= "<td align='center'><b>".$this->test_edition_names_array[$test_rounds[$te]]." Number of Questions<br>in Skill</b></td>";
 					$output_string .= "<td align='center'><b>".$this->test_edition_names_array[$test_rounds[$te]]."<br>%</b></td>";
 				}
 				$output_string.= "<td align='center'><b>Graph</b></td></tr>";

				$totalSkillsInPaper = $number_of_skills[$current_papercode];
				for($sk=1; $sk<=$totalSkillsInPaper; $sk++)
				{
					$output_string .= "<tr><td align='center'>".$sk."</td><td>".$skill_names[$current_papercode][$sk]."</td>";
					$test_rounds_string = "";
					$test_rounds_percentage_string = "";

					for($te=0; $te<$totalRoundsParticipated; $te++)
	 				{
	 					$row = $roundwise_assessmentdata[$test_rounds[$te]];
	 					$papercode = $row['papercode'];
	 					if($skillwise_totalquestions[$papercode][$sk] != 0)
	 						$percentage = Donumber_format($row["RS".$sk]*100/$skillwise_totalquestions[$papercode][$sk], 1);
	 					else
	 						$percentage = 0.0;

	 					$output_string .= "<td align='center'>".$skillwise_totalquestions[$papercode][$sk]."</td>";
	 					$output_string .= "<td align='center'>".$percentage."</td>";
	 					//$output_string .= "<td align='center'>".$papercode."--".$row["RS".$sk]."--".$skillwise_totalquestions[$papercode][$sk]."--".Donumber_format($row["RS".$sk]*100/$skillwise_totalquestions[$papercode][$sk], 1)."</td>";
	 					$test_rounds_string .= $test_rounds[$te].",";
	 					$test_rounds_percentage_string .= $percentage.",";
	 				}

	 				$test_rounds_string = substr($test_rounds_string, 0, -1);
	 				$test_rounds_percentage = substr($test_rounds_percentage, 0, -1);
	 				$graph_params = "test_rounds=".$test_rounds_string."&test_rounds_percentage=".$test_rounds_percentage_string;

	 				//$output_string .= "<td><a href='bt_studentResultSummaryGraph.php?$graph_params'>Image</a></td></tr>";
	 				$output_string .= "<td><img src='bt_studentResultSummarySkillGraph.php?$graph_params'></td></tr>";
				}

				$output_string .= "</table><br>";
				$output_string_master .= $output_string;
    		}
    		return $output_string_master;
    	}
    }

    /***
	    Function called from bt_schoolResultSummary.php. Added by Arpit (24/01/2008) - For showing school result summary
    **/
    function pageSchoolResultSummary($connid)
	{
		$this->setpostvars();
		$this->setgetvars();

		$query = "SELECT schoolname FROM school_master WHERE schoolcode=".$this->schoolcode;
		//echo $query;
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$schoolname = $row['schoolname'];

    	$colspan = $this->total_subjects + 2;
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
    	$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td colspan='".$colspan."' align='center'><b><font size='2' color='#FFFFFF'>School Performance Report</font></b></td></tr>";
    	$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td colspan='".$colspan."' align='center'><b>School Name: </b>".$schoolname."  <b>School Code:</b> ".$this->schoolcode."</td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td colspan='".$colspan."' align='center'><b>Averaged Student Performance (%) - Overall</td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No.</b></td><td align='center'><b>Round</b></td>";
		for($j=0; $j<$this->total_subjects; $j++)
		{
			$output_string .= "<td align='center'><b>".$this->subject_array[$j]."<br>%</b></td>";
		}
		$output_string .= "</tr>";

		$srno = 1;
		for($i=0; $i<$this->total_test_editions; $i++)
		{
			$test_edition = $this->test_edition_array[$i];
			$output_string .= "<tr bordercolor='#FFFFFF' ><td align='center'>".$srno."</td><td align='center'>".$this->test_edition_names_array[$this->test_edition_array[$i]]."</td>";
			for($j=0; $j<$this->total_subjects; $j++)
			{
				$subjectcode = strtolower(substr($this->subject_array[$j], 0 ,1));
				$caQuery = "SELECT test_edition, avg(".$subjectcode.") as AVG_SCORE FROM schoolwise_classwise_correctanswers WHERE schoolcode=".$this->schoolcode." AND $subjectcode!='' AND test_edition='".$test_edition."' GROUP BY test_edition";
				//echo $caQuery."<br>";
				$cadbquery = new dbquery($caQuery,$connid);
				$carow = $cadbquery->getrowarray();
				if($carow['AVG_SCORE'] != "")
					$output_string .= "<td align='center'>".Donumber_format($carow['AVG_SCORE'],1)."</td>";
				else
					$output_string .= "<td align='center'>--</td>";
			}
			$srno++;

			$output_string .= "</tr>";
		}
		//$output_string .="<tr><td colspan='".$colspan."' align='center'><a href='bt_schoolResultSummaryClasswise.php?schoolcode=".$this->schoolcode."&schoolname=".$schoolname."'><b>Show Classwise</b></td></tr>";
		$output_string .= "</table><br>";
		
		$output_string = "";
		$output_string1 = $this->pageSchoolResultSummaryClasswise($connid);
		$output_string .=$output_string1;
		return $output_string;
	}

	/***
	    Function called from bt_schoolResultSummaryClasswise.php. Added by Arpit (25/01/2008) - For showing school result summary
    **/
    function pageSchoolResultSummaryClasswise($connid)
	{
		$this->setgetvars();

    	$colspan = $this->total_subjects + 3;
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
    	$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td colspan='".$colspan."' align='center'><font color='#FFFFFF'><b>School Name: </b>".$this->schoolname."  <b>School Code:</b> ".$this->schoolcode."</font></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td colspan='".$colspan."' align='center'><b>Averaged Student Performance (%) - Class wise<br></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No.</b></td><td align='center'><b>Class</b></td><td align='center'><b>Round</b></td>";
		for($j=0; $j<$this->total_subjects; $j++)
		{
			$output_string .= "<td align='center'><b>".$this->subject_array[$j]."<br>%</b></td>";
		}
		$output_string .= "</tr>";

		$srno = 1;
		$previousclass="";
		$color1="#FFFFFF";
		$color2="#DDEBFF";
		$bgcolor=$color1;
		$clQuery = "SELECT * FROM schoolwise_classwise_correctanswers WHERE schoolcode=".$this->schoolcode." ORDER BY class,test_edition";
		$cldbquery = new dbquery($clQuery,$connid);
		while($clrow = $cldbquery->getrowarray())
		{
			if($previousclass != $clrow['class'])
			{
				if($bgcolor == $color1)
					$bgcolor = $color2;
				else
					$bgcolor = $color1;
				$bgcolor = "#DCDCDC";
				$previousclass = $clrow['class'];
			}
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'>".$clrow['class']."</td><td align='center'>".$this->test_edition_names_array[$clrow['test_edition']]."</td>";
			for($j=0; $j<$this->total_subjects; $j++)
			{
				$subjectcode = strtolower(substr($this->subject_array[$j], 0 ,1));
				if($clrow[$subjectcode] != "")
					$output_string .= "<td align='center'>".$clrow[$subjectcode]."</td>";
				else
					$output_string .= "<td align='center'>--</td>";
			}
			$output_string .= "</tr>";
			$srno++;
		}
		$output_string .= "</table><br>";
		return $output_string;
	}

	/***
	    Function called from bt_studentResultSummary.php. Added by Arpit (21/01/2008) - For showing student skill summary
    **/
    function pageSchoolSkillSummary($connid)
    {
    	$this->setpostvars();
    	$this->setgetvars();
		$skill_names = array();
		$skillwise_totalquestions = array();
		$number_of_skills = array();
		$this->set_skill_names(&$skill_names, &$skillwise_totalquestions, &$number_of_skills, $connid);

		$squery = "SELECT * FROM school_master WHERE schoolcode='".$this->schoolcode."'";
		$sdbquery = new dbquery($squery,$connid);
		$srow = $sdbquery->getrowarray();
		$schoolname = $srow['schoolname'];
		$schoolcode = $srow['schoolcode'];

		$output_string_master  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string_master .= "<tr><td bgcolor='#bf0000' align='center'><b><font size='2' color='#FFFFFF'>Skill Wise Report</font></td></tr>";
		$output_string_master .= "<tr><td bgcolor='#ff9c00'><b>School:</b> ".$schoolname."&nbsp;&nbsp;<b>School Code:</b> ".$schoolcode."</td></tr>";
		$output_string_master .= "</table><br>";

		//$output_string_master= "";

		for($class=0; $class<$this->totaltest_classes; $class++)
		{
			$actualclass = $this->testclass_array[$class];
			for($subjectno=1; $subjectno<=$this->total_subjects; $subjectno++)
			{
				$output_string = "";
				$roundwise_skillwise_data = array();

				for($i=0; $i<$this->total_test_editions; $i++)
				{
					$test_edition = $this->test_edition_array[$i];
					$current_papercode = $subjectno.$actualclass.$test_edition;
					$totalSkillsInPaper = $number_of_skills[$current_papercode];
					//echo $totalSkillsInPaper."<br>";
					for($sk=1; $sk<=$totalSkillsInPaper; $sk++)
					{
						$skillfield = "AvgS".$sk;
						$skQuery = "SELECT avg(".$skillfield.") as AVG_SCORE FROM schoolwise_classwise_skillwise_performance WHERE schoolcode=".$this->schoolcode." AND subjectno=".$subjectno." AND class='".$actualclass."' AND test_edition='".$test_edition."' AND ".$skillfield." != ''";
						//echo $skQuery."<br>"; //exit;
						$skdbquery = new dbquery($skQuery,$connid);
						$skRow = $skdbquery->getrowarray();

						$roundwise_skillwise_data[$sk][$test_edition] = $skRow['AVG_SCORE'];
					}
				}

				//echo "<pre>";
				//print_r ($roundwise_skillwise_data);
				//echo "</pre>";
				// Print here
				$tsquery = "SELECT COUNT(*) AS N FROM assessment".$test_edition." WHERE school_code='".$this->schoolcode."' AND class=".$actualclass." AND subjectno=".$subjectno;
				$tsdbquery = new dbquery($tsquery,$connid);
				$tsrow = $tsdbquery->getrowarray();
				$totalstudents = $tsrow['N'];
				if($totalstudents>0)
				{
					$colspan = $this->total_test_editions + 2;
					$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
					$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td colspan='".$colspan."' align='center'><b><font color='#FFFFFF'>Class: ".$actualclass." Subject: ".$this->subject_array[$subjectno-1]."</font></b></td></tr>";
						$output_string .= "<tr bordercolor='#FFFFFF'  bgcolor='#ff9c00'><td align='center'><b>Sr No.</b></td><td align='center'><b>Skill</b></td>";
					for($te=0; $te<$this->total_test_editions; $te++)
	 				{
	 					$output_string .= "<td align='center'><b>".$this->test_edition_names_array[$this->test_edition_array[$te]]."<br>%</b></td>";
	 				}
	 				$output_string .= "</tr>";
	 				$srno = 1;
					for($sk=1; $sk<=$totalSkillsInPaper; $sk++)
					{
						$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
						for($i=0; $i<$this->total_test_editions; $i++)
						{
							$test_edition = $this->test_edition_array[$i];
							if($i == 0)
							{
								$papercode = $subjectno.$actualclass.$test_edition;
								$output_string .= "<td>".$skill_names[$papercode][$sk]."</td>";
							}
							if($roundwise_skillwise_data[$sk][$test_edition] == "")
								$avg_skill = "--";
							else
								$avg_skill = Donumber_format($roundwise_skillwise_data[$sk][$test_edition],1);
							$output_string .= "<td align='center'>".$avg_skill."</td>";
						}
						$srno++;
						$output_string .= "</tr>";
					}
					$output_string .= "</table><br>";
					$output_string_master .= $output_string;
				}
			}
		}
		return $output_string_master;
    }

    function prepareNationLevelHeader($type)
	{
		$output_string = "<tr bgcolor='#ff9c00'>";
		if($type != "G")
			$output_string .= "<td align='center'><b>Round</b></td>";

		for($i=0; $i<$this->totaltest_classes; $i++)
		{
			$colspan = $this->total_subjects * 3 + $this->total_subjects - 1;
			$output_string .= "<td colspan='".$colspan."' align='center'><b>Class ".$this->testclass_array[$i]."</b></td>";
			$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
		}
		$output_string .= "</tr>";

		$output_string .= "<tr bgcolor='#ff9c00'>";

		if($type != "G")
			$output_string .= "<td><b>&nbsp;</b></td>";
		for($i=0; $i<$this->totaltest_classes; $i++)
		{
			for($j=0; $j<$this->total_subjects; $j++)
			{
				$colspan = 3;
				$output_string .= "<td align='center' colspan='".$colspan."'><b>".$this->subject_array[$j]."</b></td>";
				if($j!=$this->total_subjects-1)
					$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
			}
			$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
		}
		$output_string .= "</tr>";

		if($type != "G")
		{
			$output_string .= "<tr bgcolor='#ff9c00'><td><b>&nbsp;</b></td>";
			for($i=0; $i<$this->totaltest_classes; $i++)
			{
				for($j=0; $j<$this->total_subjects; $j++)
				{
					$output_string .= "<td align='center'><b>N</b></td>";
					$output_string .= "<td align='center'><b>AVG</b></td>";
					$output_string .= "<td align='center'><b>SD</b></td>";
					if($j!=$this->total_subjects-1)
						$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
				}
				$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
			}
			$output_string .= "</tr>";
		}
		return $output_string;
	}

	function fetchNationalResultSummary($test_edition,$connid)
	{
		$resultArray = array();
		$tablename = "studentwise".$test_edition;
		for($i=0; $i<$this->total_subjects; $i++)
		{
			$query  = "SELECT class";
			$subject = strtolower(substr($this->subject_array[$i],0,1));
			$query .= ",COUNT(*),".$subject.",AVG(".$subject.") AS AVERAGE,STDDEV(".$subject.") AS STD";
			$query .= " FROM ".$tablename." WHERE !isnull(".$subject.") GROUP BY class";
			//echo $query."<br>"; //exit;

			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$subject = strtolower(substr($this->subject_array[$i],0,1));
				$resultArray[$row['class']][$subject]['N'] = $row['COUNT(*)'];
				$resultArray[$row['class']][$subject]['AVG'] = $row['AVERAGE'];
				$resultArray[$row['class']][$subject]['STD'] = $row['STD'];
			}
		}
		/*echo "<pre>";
		print_r ($resultArray);
		echo "</pre>";
		exit;*/
		return $resultArray;
	}

	/***
	    Function called from pageRegionwiseResultSummary.php. Added by Arpit (26/02/2008) - For fetching nation level result summary report
    **/
	function pageNationalResultSummary($connid)
	{
		$paperDetailsArray = array();
		$this->fetchPaperDetails(&$paperDetailsArray,$connid);
		$totalColumns = $this->totaltest_classes * $this->total_subjects * 3 + 1 + $this->totaltest_classes + ($this->totaltest_classes * $this->total_subjects * 2);
		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		//$output_string  .= "<tr><td bgcolor='#bf0000' colspan='".$totalColumns."' align='left'><b><font size='2' color='#FFFFFF'>National Level All Round Result - Summary Report</font>&nbsp;&nbsp;&nbsp;<a class='Links' href='bt_regionwiseResultSummaryGraph.php'>(Show Graphically)</a></b></td></tr>";
		$output_string  .= "<tr><td bgcolor='#bf0000' colspan='".$totalColumns."' align='left'><b><font size='2' color='#FFFFFF'>National Level All Round Result - Summary Report</font></b></td></tr>";

		$output_string_header = $this->prepareNationLevelHeader("D");
		$output_string .= $output_string_header;

		for($te=0; $te<$this->total_test_editions; $te++)
		{
			$test_edition = $this->test_edition_array[$te];
			$resultArray = $this->fetchNationalResultSummary($test_edition,$connid);
			if($te%2 == 1)
				$bgcolor = "#FFDDDD";
			else
				$bgcolor = "#DDEBFF";
			$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$this->test_edition_names_array[$test_edition]."</td>";
			for($i=0; $i<$this->totaltest_classes; $i++)
			{
				$class = $this->testclass_array[$i];
				for($j=0; $j<$this->total_subjects; $j++)
				{
					$subject = $this->subject_array[$j];
					$subjectcode = $j+1;
					$subjectchar = strtolower(substr($this->subject_array[$j],0,1));
					$papercode = $subjectcode.$class.$test_edition;
					
					$droppedquestion=0;
					$droppedquestion = $this->countdroppedquestion_ASSL($papercode,$connid);
					$totalQuestion = $paperDetailsArray[$papercode]-$droppedquestion;
					
					if($totalQuestion == "")
					{
						$output_string .= "<td align='center'>--</td>";
						$output_string .= "<td align='center'>--</td>";
						$output_string .= "<td align='center'>--</td>";
					}
					else
					{
						$N = $resultArray[$class][$subjectchar]['N'];
						$AVG = Donumber_format(($resultArray[$class][$subjectchar]['AVG']/$totalQuestion)*100,1);
						$STD = Donumber_format(($resultArray[$class][$subjectchar]['STD']/$totalQuestion)*100,1);
						$output_string .= "<td align='center'>".$N."</td>";
						$output_string .= "<td align='center'>".$AVG."</td>";
						$output_string .= "<td align='center'>".$STD."</td>";
					}
					if($j!=$this->total_subjects-1)
						$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
				}
				$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
			}
			$output_string .= "</tr>";
		}

		$output_string  .= "<tr><td colspan='".$totalColumns."' align='center'><b>N:</b> Total Students, <b>AVG:</b> Average <b>SD:</b> Standard Deviation</td></tr>";
		$output_string .= "</table>";
		return $output_string;
	}

	function pageNationalResultSummary_XML($schoolcodes,$connid)
	{
		$perform_array = array();
		$paperDetailsArray = array();
		$this->fetchPaperDetails(&$paperDetailsArray,$connid);

		for($te=0; $te<$this->total_test_editions; $te++)
		{
			$test_edition = $this->test_edition_array[$te];
			$resultArray = $this->fetchNationalResultSummary_XML($test_edition,$schoolcodes,$connid);
			for($j=0; $j<$this->total_subjects; $j++)
			{
				$subject = $this->subject_array[$j];
				$subjectcode = $j+1;
				$subjectchar = strtolower(substr($this->subject_array[$j],0,1));
				for($i=0; $i<$this->totaltest_classes; $i++)
				{
					$class = $this->testclass_array[$i];
					$papercode = $subjectcode.$class.$test_edition;
					$droppedquestion=0;
					$droppedquestion = $this->countdroppedquestion_ASSL($papercode,$connid);
					$totalQuestion = $paperDetailsArray[$papercode]-$droppedquestion;
					
					//$N = $resultArray[$class][$subjectchar]['N'];
					//$STD = Donumber_format(($resultArray[$class][$subjectchar]['STD']/$totalQuestion)*100,1);
					
					$AVG = Donumber_format(($resultArray[$class][$subjectchar]['AVG']/$totalQuestion)*100,1);
					$perform_array[$papercode] = $AVG;
				}
			}
		}
		return $perform_array;
	}
	
	function countdroppedquestion_ASSL($papercode,$connid)
	{
		$dropquestion=0;
		$query = "SELECT COUNT(*) FROM drop_questions_w WHERE papercode='".$papercode."'";
		//echo $query."<br>";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$dropquestion=$row['COUNT(*)'];
		return $dropquestion;
	}
	
	function fetchNationalResultSummary_XML($test_edition,$schoolcodes,$connid)
	{
		$resultArray = array();
		$tablename = "studentwise".$test_edition;
		for($i=0; $i<$this->total_subjects; $i++)
		{
			$subject = strtolower(substr($this->subject_array[$i],0,1));
			$condition = "";
			if($schoolcodes!="")
				$condition = " WHERE !isnull(".$subject.") AND school_code IN (".$schoolcodes.") GROUP BY class";
			else 
				$condition = " WHERE !isnull(".$subject.") GROUP BY class";
				
			$query  = "SELECT class";
			$query .= ",COUNT(*),".$subject.",AVG(".$subject.") AS AVERAGE,STDDEV(".$subject.") AS STD";
			$query .= " FROM ".$tablename.$condition;
			//echo $query."<br>"; exit;

			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$subject = strtolower(substr($this->subject_array[$i],0,1));
				$resultArray[$row['class']][$subject]['N'] = $row['COUNT(*)'];
				$resultArray[$row['class']][$subject]['AVG'] = $row['AVERAGE'];
				$resultArray[$row['class']][$subject]['STD'] = $row['STD'];
			}
		}
		/*echo "<pre>";
		print_r ($resultArray);
		echo "</pre>";
		exit;*/
		return $resultArray;
	}
	
	function prepareRegionLevelHeader($regionname,$type)
	{

		$output_string = "<tr bgcolor='#ff9c00'>";

		if($type!="G")
			$output_string .= "<td>&nbsp;</td><td><b>&nbsp;</b></td>";

		for($i=0; $i<$this->totaltest_classes; $i++)
		{
			$colspan = $this->total_subjects * 3 + $this->total_subjects - 1;
			$output_string .= "<td colspan='".$colspan."' align='center'><b>Class ".$this->testclass_array[$i]."</b></td>";
			$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
		}
		$output_string .= "</tr>";
		$output_string .= "<tr bgcolor='#ff9c00'>";
		if($type!="G")
			$output_string .= "<td><b>&nbsp;</b></td><td><b>&nbsp;</b></td>";
		for($i=0; $i<$this->totaltest_classes; $i++)
		{
			for($j=0; $j<$this->total_subjects; $j++)
			{
				$colspan = 3;
				$output_string .= "<td align='center' colspan='".$colspan."'><b>".$this->subject_array[$j]."</b></td>";
				if($j!=$this->total_subjects-1)
					$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
			}
			$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
		}
		$output_string .= "</tr>";


		if($type!="G")
		{
			$output_string .= "<tr bgcolor='#ff9c00'><td><b>".$regionname."</b></td>";
			$output_string .= "<td><b>Round</b></td>";
			for($i=0; $i<$this->totaltest_classes; $i++)
			{
				for($j=0; $j<$this->total_subjects; $j++)
				{
					$output_string .= "<td align='center'><b>N</b></td>";
					$output_string .= "<td align='center'><b>AVG</b></td>";
					$output_string .= "<td align='center'><b>SD</b></td>";
					if($j!=$this->total_subjects-1)
						$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
				}
				$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
			}
		}
		else
		{
			$totalColumns = $this->totaltest_classes * $this->total_subjects * 3 + $this->totaltest_classes + ($this->totaltest_classes * $this->total_subjects * 2) + 1;
			$output_string .= "<tr bgcolor='#ff9c00'><td colspan='".$totalColumns."'><b>".$regionname."</b></td>";
		}
		$output_string .= "</tr>";
		return $output_string;
	}

	function fetchRegionResultSummary($regiontype,$regioncode,$test_edition,$connid)
	{
		$schoolcodestr = "";
		if($regiontype == "D")
		{
			$regionname = "Dzongkhag";
			$fieldname = "DzongkhagCode";
		}
		elseif($regiontype == "G")
		{
			$regionname = "Gewog";
			$fieldname = "GewogCode";
		}
		elseif($regiontype == "V")
		{
			$regionname = "Village";
			$fieldname = "VillageCode";
		}
		elseif($regiontype == "S")
		{
			$regionname = "School";
			$fieldname = "schoolcode";
		}
		elseif($regiontype == "C")
		{
			$regionname = "Student";
			$fieldname = "cts_number";
		}

		if($regiontype == "V")
		{
			$villagecodestr = $regioncode;
		}
		elseif($regiontype != "S" && $regiontype != "C")
		{
			$villagecodestr = "";
			$regionQuery = "SELECT VillageCode FROM bt_village_master WHERE ".$fieldname."=".$regioncode;
			//echo $regionQuery."<br><br>"; exit;
			$dbquery = new dbquery($regionQuery,$connid);
			while($row = $dbquery->getrowarray())
			{
				$villagecodestr .= $row['VillageCode'].",";
			}
			$villagecodestr = substr($villagecodestr,0,-1);
		}
		
		if($regiontype != "S" && $regiontype != "C" && $villagecodestr!="")
		{
			$regionQuery = "SELECT schoolcode FROM school_master WHERE VillageCode IN (".$villagecodestr.")";
			//echo $regionQuery."<br><br>"; //exit;
			$dbquery = new dbquery($regionQuery,$connid);
			while($row = $dbquery->getrowarray())
			{
				$schoolcodestr .= $row['schoolcode'].",";
			}
			$schoolcodestr = substr($schoolcodestr,0,-1);

			$ctsnumberstr = "";
			if($schoolcodestr != "")
			{
				$regionQuery = "SELECT cts_number FROM student_master WHERE schoolcode IN (".$schoolcodestr.")";
				//echo $regionQuery."<br><br>"; exit;
				$dbquery = new dbquery($regionQuery,$connid);
				while($row = $dbquery->getrowarray())
				{
					$ctsnumberstr .= $row['cts_number'].",";
				}
				$ctsnumberstr = substr($ctsnumberstr,0,-1);
			}
		}
		elseif($regiontype == "S")
		{
			$ctsnumberstr = "";
			$regionQuery = "SELECT cts_number FROM student_master WHERE schoolcode IN (".$regioncode.")";
			//echo $regionQuery."<br><br>";
			$dbquery = new dbquery($regionQuery,$connid);
			while($row = $dbquery->getrowarray())
			{
				$ctsnumberstr .= $row['cts_number'].",";
			}
			$ctsnumberstr = substr($ctsnumberstr,0,-1);
			$schoolcodestr=$regioncode;
		}

		$resultArray = array();
		$tablename = "studentwise".$test_edition;
		if($schoolcodestr != "")
		{
			//echo $villagecodestr." - ".$schoolcodestr."<br>";
			for($i=0; $i<$this->total_subjects; $i++)
			{
				$subject = strtolower(substr($this->subject_array[$i],0,1));
				$query  = "SELECT class, COUNT(*)";
				$query .= ",".$subject.",AVG(".$subject.") AS AVERAGE,STDDEV(".$subject.") AS STD";
				$query .= " FROM ".$tablename." WHERE !isnull(".$subject.") AND school_code IN (".$schoolcodestr.") GROUP BY class ";
				//$query .= " FROM ".$tablename." WHERE !isnull(".$subject.") AND cts_number IN (".$ctsnumberstr.") GROUP BY class ";
				//$query .= " FROM ".$tablename." WHERE !isnull(".$subject.") GROUP BY class";
				//echo $query."<br><br>"; exit;

				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$subject = strtolower(substr($this->subject_array[$i],0,1));
					$resultArray[$row['class']][$subject]['N'] = $row['COUNT(*)'];
					$resultArray[$row['class']][$subject]['AVG'] = $row['AVERAGE'];
					$resultArray[$row['class']][$subject]['STD'] = $row['STD'];
					//break;
				}
				//break;
			}
		}
		//print_r ($resultArray);
		//exit;
		return $resultArray;
	}

	/***
	    Function called from pageRegionwiseResultSummary.php. Added by Arpit (26/02/2008) - For fetching region wise result summary report
    **/
	function pageRegionResultSummary($regiontype,$regioncode,$covertype,$connid)
	{
		if($regiontype == "D")
		{
			$regionname = "Dzongkhag";
			$fieldname = "DzongkhagNameEn";
			$fieldcode = "DzongkhagCode";
			if($regioncode==0)
			{
				$regionQuery = "SELECT * FROM bt_dzongkhag_master";
				$link = "bt_gewogwiseResultSummary.php?DzongkhagCode=";
			}
			else 
			{
				$regionQuery = "SELECT * FROM bt_dzongkhag_master WHERE DzongkhagCode=".$regioncode;
				$link = "";
			}
		}
		elseif($regiontype == "G")
		{
			$regionname = "Gewog";
			$fieldname = "GewogNameEn";
			$fieldcode = "GewogCode";
			if($covertype==1)
				$regionQuery = "SELECT * FROM bt_gewog_master WHERE GewogCode=".$regioncode;
			else 
				$regionQuery = "SELECT * FROM bt_gewog_master WHERE DzongkhagCode=".$regioncode;
			$link = "bt_villagewiseResultSummary.php?GewogCode=";
		}
		elseif($regiontype == "V")
		{
			$regionname = "Village";
			$fieldname = "VillageNameEn";
			$fieldcode = "VillageCode";
			if($covertype==1)
				$regionQuery = "SELECT * FROM bt_village_master WHERE VillageCode=".$regioncode;	
			else 
				$regionQuery = "SELECT * FROM bt_village_master WHERE GewogCode=".$regioncode;	
			$link = "bt_schoolwiseResultSummary.php?VillageCode=";
		}
		elseif($regiontype == "S")
		{
			$regionname = "School";
			$fieldname = "schoolname";
			$fieldcode = "schoolcode";
			if($covertype==1)
				$regionQuery = "SELECT * FROM school_master WHERE schoolcode=".$regioncode;
			else 
				$regionQuery = "SELECT * FROM school_master WHERE VillageCode=".$regioncode;
			//echo $regionQuery;
			$link = "bt_schoolResultSummary.php?schoolcode=";
		}

		//echo $regionQuery."<br>"; 
		$paperDetailsArray = array();
		$this->fetchPaperDetails(&$paperDetailsArray,$connid);

		$totalColumns = $this->totaltest_classes * $this->total_subjects * 3 + 1 + $this->totaltest_classes + ($this->totaltest_classes * $this->total_subjects * 2) + 1;
		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string  .= "<tr><td bgcolor='#bf0000' colspan='".$totalColumns."' align='Left'><b><font size='2' color='#FFFFFF'>".$regionname." Level All Round Result - Summary Report</font></b></td></tr>";

		$output_string_header = $this->prepareRegionLevelHeader($regionname,"D");
		$output_string .= $output_string_header;

		$dbquery = new dbquery($regionQuery,$connid);
		while($row = $dbquery->getrowarray())
		{
			for($te=0; $te<$this->total_test_editions; $te++)
			{
				$test_edition = $this->test_edition_array[$te];
				$resultArray = $this->fetchRegionResultSummary($regiontype,$row[$fieldcode],$test_edition,$connid);
				if($te%2 == 1)
					$bgcolor = "#FFDDDD";
				else
					$bgcolor = "#DDEBFF";

				if($te==0)
					$output_string .= "<tr><td colspan='".$totalColumns."'><b><a href='".$link.$row[$fieldcode]."'>".$row[$fieldname]."</a></b></td></tr>";

				$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>&nbsp;</td><td align='center'>".$this->test_edition_names_array[$test_edition]."</td>";

				for($i=0; $i<$this->totaltest_classes; $i++)
				{
					$class = $this->testclass_array[$i];
					for($j=0; $j<$this->total_subjects; $j++)
					{
						$subject = $this->subject_array[$j];
						$subjectcode = $j+1;
						$subjectchar = strtolower(substr($this->subject_array[$j],0,1));
						$papercode = $subjectcode.$class.$test_edition;
						
						$droppedquestion=0;
						$droppedquestion = $this->countdroppedquestion_ASSL($papercode,$connid);
						$totalQuestion = $paperDetailsArray[$papercode]-$droppedquestion;
					
						if($totalQuestion == "")
						{
							$output_string .= "<td align='center'>-</td>";
							$output_string .= "<td align='center'>-</td>";
							$output_string .= "<td align='center'>-</td>";
						}
						else
						{
							if(isset($resultArray[$class][$subjectchar]['N']) && $resultArray[$class][$subjectchar]['N'] != "")
							{
								$N = $resultArray[$class][$subjectchar]['N'];
								$AVG = Donumber_format(($resultArray[$class][$subjectchar]['AVG']/$totalQuestion)*100,1);
								$STD = Donumber_format(($resultArray[$class][$subjectchar]['STD']/$totalQuestion)*100,1);
								$output_string .= "<td align='center'>".$N."</td>";
								$output_string .= "<td align='center'>".$AVG."</td>";
								$output_string .= "<td align='center'>".$STD."</td>";
							}
							else
							{
								$output_string .= "<td align='center'>-</td>";
								$output_string .= "<td align='center'>-</td>";
								$output_string .= "<td align='center'>-</td>";
							}
						}
						if($j!=$this->total_subjects-1)
							$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
					}
					$output_string .= "<td align='center' bgcolor='#bf0000'></td>";
				}
				$output_string .= "</tr>";
			}
			//break;
		}
		$output_string .= "</table>";
		//echo $output_string; exit;
		return $output_string;
	}

	// Function called from bt_studentwiseResultSummary.php - Added by Arpit on 27/02/2008 - To show school's studentwise all round result summary
	function pageStudentwiseResultSummary($schoolcode, $connid)
	{
		$squery = "SELECT * FROM school_master WHERE schoolcode='".$schoolcode."'";
		$sdbquery = new dbquery($squery,$connid);
		$srow = $sdbquery->getrowarray();
		$schoolname = $srow['schoolname'];

		$squery = "SELECT * FROM student_master WHERE schoolcode='".$schoolcode."'";
		$sdbquery = new dbquery($squery,$connid);

		$output_string_main  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string_main .= "<tr><td bgcolor='#bf0000' align='center'><b><font size='2' color='#FFFFFF'>All Round Result - Summary Report</font></b></td></tr>";
    	$output_string_main .= "<tr bgcolor='#ff9c00'><td align='center'><b>School Name:&nbsp;</b>".$schoolname." &nbsp;&nbsp;<b>School Code:&nbsp</b>".$schoolcode." &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript: showschoolskillreport(".$schoolcode.")'><b>Show Skill Wise Report</b></a></td></tr>";
    	$output_string_main .= "<tr><td align='top'><table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'><tr><td><b>Sr No.</b></td><td align='center'><b>Round</b></td><td align='center'><b>SATS Number</b></td><td align='center'><b>Student<br>Name</b></td><td align='center'><b>Class</b></td><td align='center'><b>Section</b></td><td align='center'><b>English</b></td><td align='center'><b>Maths</b></td><td align='center'><b>Science</b></td><td align='center'><b>Total</b></td><td align='center'><b>English<br>Percentile</b></td><td align='center'><b>Maths<br>Percentile</b></td><td align='center'><b>Science<br>Percentile</b></td><td align='center'><b>Total<br>Percentile</b></td></tr>";
		$srno = 1;

		while($srow = $sdbquery->getrowarray())
		{
	    	$studentname = $srow['firstname']." ".$srow['lastname'];
			$query = "";
			for($i=0; $i<$this->total_test_editions; $i++)
			{
				$query .= "SELECT * FROM studentwise".$this->test_edition_array[$i]." WHERE cts_number=".$srow['cts_number']." UNION ";
			}
			$query = substr($query, 0, -7);
			$dbquery = new dbquery($query,$connid);

	    	while($row = $dbquery->getrowarray())
			{

				$ep = Donumber_format(($row['ep']*100),1); 	$mp = Donumber_format(($row['mp']*100),1);
				$sp = Donumber_format(($row['sp']*100),1);	$tp = Donumber_format(($row['tp']*100),1);
				$output_string_main .= "<tr><td align='center'>".$srno."</td><td align='center'>".$this->test_edition_names_array[$row['test_edition']]."</td><td align='center'><a href='javascript: showstudentresult(".$row['cts_number'].")'>".$row['cts_number']."</a></td><td>".$studentname."</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td><td align='center'>".$row['e']."</td><td align='center'>".$row['m']."</td><td align='center'>".$row['s']."</td><td align='center'>".$row['total']."</td><td align='center'>".$ep."</td><td align='center'>".$mp."</td><td align='center'>".$sp."</td><td align='center'>".$tp."</td></tr>";
				$srno++;
				$output_string_main .= "<tr bgcolor='#ff9c00'><td colspan='14'></td></tr>";
			}
			
		}
		$output_string_main .= "</table></td></tr></table><br>";
		return $output_string_main;
	}

	function set_skill_names($skill_names, $skillwise_totalquestions, $number_of_skills, $connid)
	{
		$query = "SELECT * FROM skill_table";
		$dbquery = new dbquery($query,$connid);
		while($line = $dbquery->getrowarray())
		{
			$current_papercode = $line['papercode'];
			$skill_names[$current_papercode] = array();
			$i = 1;

			while ($line['S'.$i])
			{
				$skill_names[$current_papercode][$i] = $line['S'.$i];
				$skillwise_totalquestions[$current_papercode][$i] = $line['ns'.$i];
				$i++;
			}
			$number_of_skills[$current_papercode] = $i-1;
		}
	}
	/***
	    Function called from pageStudentSkillSummary.php. Added by Arpit (22/01/2008) - For fetching paperwise skills
    **/
	function fetchPaperDetails($paperDetails, $connid)
	{
		$query = "SELECT * FROM paper_details";
		$dbquery = new dbquery($query,$connid);
		while($line = $dbquery->getrowarray())
		{
			$current_papercode = $line['papercode'];
			$paperDetails[$current_papercode] = $line['total_questions'];
		}
	}

	/***
	    Function called from bt_showStudentQuestionlevelSkillReport.php. Added by Arpit (14/03/2008) - For fetching question wise correct answers and skills.
    **/
	function fetchQuestionDetails($correctAnswers,$questionWiseSkill, $connid)
	{
		$query = "SELECT * FROM correct_answers";
		$dbquery = new dbquery($query,$connid);
		while($line = $dbquery->getrowarray())
		{
			$current_papercode = $line['papercode'];
			$qno = $line['qno'];
			$correctAnswers[$current_papercode][$qno] 	 = $line['correct_answer'];
			$questionWiseSkill[$current_papercode][$qno] = $line['skill_no'];
		}
	}

	/***
	    Function called from pageStudentResultSummary() function. Added by Arpit (21/01/2008) - For validationg PAN and Password
    **/
	function validateuser($connid)
	{
		$isvalideuser=0;
		$query = "SELECT COUNT(*) FROM student_master WHERE cts_number=".$this->cts_number." AND password=password('".$this->password."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] != 0)
		{
			$isvalideuser=1;
		}
		return $isvalideuser;
	}
	/***
	    Function called from pageSchoolResultSummary() function. Added by Arpit (24/01/2008) - For validationg School Code and Password
    **/
	function validateschool($connid)
	{
		$isvalideuser=0;
		$query = "SELECT COUNT(*) FROM school_master WHERE schoolcode=".$this->schoolcode." AND password=password('".$this->password."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] != 0)
		{
			$isvalideuser=1;
		}
		return $isvalideuser;
	}


	// New functions - Representing regionwise data graphically - Starts here
	/***
	    Function called from pageRegionwiseResultSummaryGraph.php. Added by Arpit (28/02/2008) - For fetching nation level result summary report
    **/
	function pageNationalResultSummaryGraph($connid)
	{
		$totalColumns = $this->totaltest_classes * $this->total_subjects * 3 + 1 + $this->totaltest_classes + ($this->totaltest_classes * $this->total_subjects * 2);
		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string  .= "<tr><td bgcolor='#bf0000' colspan='".$totalColumns."' align='left'><b><font size='2' color='#FFFFFF'>National Level All Round Result - Summary Report</font></b></td></tr>";

		$output_string_header = $this->prepareNationLevelHeader("G");
		$output_string .= $output_string_header;
		$output_string .= "<tr>";
		$srno=1;
		$paperDetailsArray = array();
		$this->fetchPaperDetails(&$paperDetailsArray,$connid);

		$resultArray = array();
		for($te=0; $te<$this->total_test_editions; $te++)
		{
			$test_edition = $this->test_edition_array[$te];
			$resultArray[$test_edition] = $this->fetchNationalResultSummary($test_edition,$connid);
		}
		for($i=0; $i<$this->totaltest_classes; $i++)
		{
			$class = $this->testclass_array[$i];
			$classcode = $i+1;
			for($j=0; $j<$this->total_subjects; $j++)
			{
				$subject = $this->subject_array[$j];
				$subjectcode = $j+1;
				$subjectchar = strtolower(substr($this->subject_array[$j],0,1));

				$row1 = "array(''"; $row2 = "array('N'"; $row3 = "array('AVG'"; $row4 = "array('SD'";
				for($te=0; $te<$this->total_test_editions; $te++)
				{
					$test_edition = $this->test_edition_array[$te];

					$dataArray1 = $resultArray[$test_edition];
					$dataArray2 = $dataArray1[$class];
					$dataArray  = $dataArray2[$subjectchar];

					$papercode = $subjectcode.$class.$test_edition;
					$totalQuestion = $paperDetailsArray[$papercode];

					$row1 .= ",".$this->test_edition_names_array[$test_edition];
					if(isset($dataArray['N']))
					{
						$N = $dataArray['N'];
						$row2 .= ",".$N;
					}
					else
					{
						$row2 .= ",''";
					}

					if(isset($dataArray['AVG']))
					{
						if($totalQuestion == "")
						{
							$row3 .= ",''";
						}
						else
						{
							$AVG = Donumber_format(($dataArray['AVG']/$totalQuestion)*100,1);
							$row3 .= ",".$AVG;
						}
					}
					else
					{
						$row3 .= ",''";
					}

					if(isset($dataArray['STD']))
					{
						if($totalQuestion == "")
						{
							$row4 .= ",''";
						}
						else
						{
							$STD = Donumber_format(($dataArray['STD']/$totalQuestion)*100,1);
							$row4 .= ",".$STD;
						}
					}
					else
					{
						$row4 .= ",''";
					}
				}

				$row1 .= "),"; $row2 .= "),"; $row3 .= "),"; $row4 .= ")";
				$master_row = "array(".$row1.$row2.$row3.$row4.")";
				$filename = "graphfiles/bt_sendgraphdata".$srno.".php";
				$this->writeGraphFile($filename,$master_row);
				$graph = InsertChart( "charts.swf", "charts_library", $filename, 300, 200 );
				//echo $output_string;
				$output_string .= "<td colspan='3'>".$graph."</td><td></td>";
				$srno++;
			}
		}
		$output_string .= "</tr></table>";
		return $output_string;
	}

	/***
	    Function called from pageRegionwiseResultSummaryGraph.php. Added by Arpit (29/02/2008) - For fetching region wise result summary report
    **/
	function pageRegionResultSummaryGraph($regiontype,$regioncode,$connid)
	{
		if($regiontype == "D")
		{
			$regionname = "Dzongkhag";
			$fieldname = "DzongkhagNameEn";
			$fieldcode = "DzongkhagCode";
			$regionQuery = "SELECT * FROM bt_dzongkhag_master";
			$link = "bt_gewogwiseResultSummary.php?DzongkhagCode=";
		}
		elseif($regiontype == "G")
		{
			$regionname = "Gewog";
			$fieldname = "GewogNameEn";
			$fieldcode = "GewogCode";
			$regionQuery = "SELECT * FROM bt_gewog_master WHERE DzongkhagCode=".$regioncode;
			$link = "bt_villagewiseResultSummary.php?GewogCode=";
		}
		elseif($regiontype == "V")
		{
			$regionname = "Village";
			$fieldname = "VillageNameEn";
			$fieldcode = "VillageCode";
			$regionQuery = "SELECT * FROM bt_village_master WHERE GewogCode=".$regioncode;
			$link = "bt_schoolwiseResultSummary.php?VillageCode=";
		}
		elseif($regiontype == "S")
		{
			$regionname = "School";
			$fieldname = "schoolname";
			$fieldcode = "schoolcode";
			$regionQuery = "SELECT * FROM school_master WHERE VillageCode=".$regioncode;
			//echo $regionQuery;
			$link = "bt_schoolResultSummary.php?schoolcode=";
		}

		$paperDetailsArray = array();
		$this->fetchPaperDetails(&$paperDetailsArray,$connid);

		$totalColumns = $this->totaltest_classes * $this->total_subjects * 3 + 1 + $this->totaltest_classes + ($this->totaltest_classes * $this->total_subjects * 2) + 1;
		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string  .= "<tr><td bgcolor='#bf0000' colspan='".$totalColumns."' align='left'><b><font size='2'>".$regionname." Level All Round Result - Summary Report</font></b></td></tr>";

		$output_string_header = $this->prepareRegionLevelHeader($regionname,"G");
		$output_string .= $output_string_header;

		$dbquery = new dbquery($regionQuery,$connid);
		while($row = $dbquery->getrowarray())
		{
			$resultArray = array();
			for($te=0; $te<$this->total_test_editions; $te++)
			{
				$test_edition = $this->test_edition_array[$te];
				$resultArray[$test_edition] = $this->fetchRegionResultSummary($regiontype,$row[$fieldcode],$test_edition,$connid);
			}
			/*echo "<pre>";
			print_r ($resultArray);
			echo "</pre>";
			exit;*/

			for($i=0; $i<$this->totaltest_classes; $i++)
			{
				$class = $this->testclass_array[$i];
				$classcode = $i+1;
				for($j=0; $j<$this->total_subjects; $j++)
				{
					$subject = $this->subject_array[$j];
					$subjectcode = $j+1;
					$subjectchar = strtolower(substr($this->subject_array[$j],0,1));

					$row1 = "array(''"; $row2 = "array('N'"; $row3 = "array('AVG'"; $row4 = "array('SD'";
					for($te=0; $te<$this->total_test_editions; $te++)
					{
						$test_edition = $this->test_edition_array[$te];

						$dataArray1 = $resultArray[$test_edition];
						$dataArray2 = $dataArray1[$class];
						$dataArray  = $dataArray2[$subjectchar];
						/*echo "<pre>";
						print_r ($dataArray2);
						echo "</pre>";
						exit;*/
						$papercode = $subjectcode.$class.$test_edition;
						$totalQuestion = $paperDetailsArray[$papercode];

						$row1 .= ",".$this->test_edition_names_array[$test_edition];
						if(isset($dataArray['N']))
						{
							$N = $dataArray['N'];
							$row2 .= ",".$N;
						}
						else
						{
							$row2 .= ",''";
						}

						if(isset($dataArray['AVG']))
						{
							if($totalQuestion == "")
							{
								$row3 .= ",''";
							}
							else
							{
								$AVG = Donumber_format(($dataArray['AVG']/$totalQuestion)*100,1);
								$row3 .= ",".$AVG;
							}
						}
						else
						{
							$row3 .= ",''";
						}

						if(isset($dataArray['STD']))
						{
							if($totalQuestion == "")
							{
								$row4 .= ",''";
							}
							else
							{
								$STD = Donumber_format(($dataArray['STD']/$totalQuestion)*100,1);
								$row4 .= ",".$STD;
							}
						}
						else
						{
							$row4 .= ",''";
						}
					}

					$row1 .= "),"; $row2 .= "),"; $row3 .= "),"; $row4 .= ")";
					$master_row = "array(".$row1.$row2.$row3.$row4.")";
					$filename = "graphfiles/bt_sendgraphdata".$srno.".php";
					$this->writeGraphFile($filename,$master_row);
					$graph = InsertChart( "bt_charts.swf", "charts_library", $filename, 300, 200 );
					//echo $output_string;
					$output_string .= "<td colspan='3'>".$graph."</td><td></td>";
					$srno++;
					//if($srno==3) exit;
				}
			}

		}
		$output_string .= "</table>";
		return $output_string;
	}

	function writeGraphFile($filename,$master_row)
	{
		$fp = fopen($filename,"w");
		$filedata = "<?php\ninclude_once('../charts.php');\n";
		$filedata .= "$"."chart['chart_data'] = ".$master_row.";\n";
		$filedata .= "$"."chart['chart_type'] = 'column';\n";
		//send the new data to charts.swf
		$filedata .= "SendChartData("."$"."chart);\n?>";
		fwrite($fp,$filedata);
		fclose($fp);
	}
	// New functions - Representing regionwise data graphically - Ends here

	function exporttoexcel($data)
	{
		//echo $data; exit;
		$datafile = "data_".date('YmdHis').".csv";
		$filename = "exporteddatafiles/".$datafile;

		// Adjust cells for class field in exported excel file.
		$pattern1 = array();
		$replacement1 = array();
		for($i=0; $i<=$this->total_classes; $i++)
		{
			$class = $this->class_array[$i];
			$pattern1[$i] = "<td colspan='11' align='center'><b>Class ".$class."</b></td>";
			$replacestring = "";
			for($j=1; $j<=11; $j++)
			{
				if($j==6)
					$replacestring .= "<td>Class ".$class."</td>";
				else
					$replacestring .= "<td></td>";
			}
			$replacement1[$i] = $replacestring;
		}
		$replaced_data = str_replace($pattern1,$replacement1,$data);
		$data = $replaced_data;

		// Adjust cells for subject field in exported excel file.
		$pattern2 = array();
		$replacement2 = array();
		for($i=0; $i<=$this->total_subjects; $i++)
		{
			$subject = $this->subject_array[$i];
			$pattern2[$i] = "<td align='center' colspan='3'><b>".$subject."</b></td>";
			$replacestring = "";
			for($j=1; $j<=3; $j++)
			{
				if($j==2)
					$replacestring .= "<td>".$subject."</td>";
				else
					$replacestring .= "<td></td>";
			}
			$replacement2[$i] = $replacestring;
		}
		$replaced_data = str_replace($pattern2,$replacement2,$data);
		$data = $replaced_data;

		// Replace , with - to avoid cell shifting in CSV file.
		$pattern3 = ",";
		$replacement3 = "-";
		$replaced_data = str_replace($pattern3,$replacement3,$data);
		$data = $replaced_data;

		// Replace <table> tag with blank, tr with & and td with , - CSV compatible format.
		$pattern4[0] = "/<table([^>]*)>/i";
		$replacement4[0] = "";

		$pattern4[1] = "/<\/table>/i";
		$replacement4[1] = "";

		$pattern4[2] = "/<tr([^>]*)>/i";
		$replacement4[2] = "";

		$pattern4[3] = "/<\/tr>/i";
		$replacement4[3] = "&";

		$pattern4[4] = "/<td([^>]*)>/i";
		$replacement4[4] = "";

		$pattern4[5] = "/<\/td>/i";
		$replacement4[5] = ",";

		// Ignore all HTML tags.
		$replaced_data = preg_replace($pattern4, $replacement4, $data);
		$data = strip_tags($replaced_data);
		$replaced_data = str_replace("&nbsp;","",$data);

		// Write row by row data to CSV file.
		$filedata = "";
		$dataArray = explode("&",$replaced_data);
		$totalRows = count($dataArray);
		for($i=0; $i<$totalRows; $i++)
		{
			$filedata .= $dataArray[$i]."\n";
		}

		//echo $filedata; exit;
		$fp = fopen($filename,"w");
		fwrite($fp,$filedata);
		fclose($fp);

		$output_string = "<center><font face='verdana' size='1'>Data exported successfully in file <b><a href='".$filename."'>".$datafile."</a></b>.";
		$output_string .= "<br><br>Right click on file name and select save as option to save the file.</font></center>";
		return $output_string;
	}

	function fetchStudentName($cts_number,$connid)
	{
		$query = "SELECT firstname,lastname FROM student_master WHERE cts_number=".$this->cts_number;
		$dbquery = new dbquery($query,$connid);
		$row=$dbquery->getrowarray();
		$studentname = ucfirst($row['firstname'])." ".ucfirst($row['lastname']);
		return $studentname;
	}
	
	function fetchDzongkhagFromGewog($gewogcode,$connid)
	{
		$query = "SELECT DzongkhagCode FROM bt_gewog_master WHERE GewogCode='".$gewogcode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['DzongkhagCode'];
	}
	
	function fetchGewogFromVillage($villagecode,$connid)
	{
		$query = "SELECT GewogCode FROM bt_village_master WHERE VillageCode='".$villagecode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['GewogCode'];
	}
}
?>