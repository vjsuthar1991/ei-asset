<?php

//level of precision at which to compare skill-wise scores; e.g. "3" means compare to the nearest thousandth    
define("PRECISION", 3);
//the number of weak skills to display
define("NUMWEAKSKILLS", 2);
//the number of strong skills to display
define("NUMSTRONGSKILLS", 2);


class clsregion
{
    var $actiontoperform;
    var $dzongkhag;
    var $gewog;
    var $schoolcode;
    var $subject_array;
    var $total_subjects;
    var $class_array;
    var $total_classes;
    var $testclass_array;
    var $test_edition_array;
    var $test_edition_names_array;
    var $total_test_editions;
	var $accessCategoryArray;
	var $accessCategoryAbrv;
	var $classArray;
	var $sectionArray;
	var $academicQualificationArray;
    var $professionalQualificationArray;
    
    	function clsregion()
	{
		$this->actiontoperform="";
                $this->dzongkhag="";
                $this->gewog="";
		$this->schoolcode="";
		$this->clsschoolresult = new clsschoolstudentresult();
		$this->subject_array = array("English","Maths","Science");
		$this->total_subjects = count($this->subject_array);
		$this->class_array = array("3","4","5","6","7","8","9","10","11","12");
		$this->total_classes = count($this->class_array);
		$this->testclass_array = array("4","6","8");
		$this->totaltest_classes = count($this->testclass_array);
		$this->test_edition_array = array("V");
		$this->test_edition_names_array = array("V"=>"2008");
		$this->total_test_editions = count($this->test_edition_array);
		$this->accessCategoryArray = array("Urban","Semi-urban","Semi-rural","Rural","Very rural","Private");
		$this->accessCategoryAbrv = array("U","SU","SR","R","VR","P");
		$this->classArray = array("PP","1","2","3","4","5","6","7","8","9","10","11","12");
		$this->sectionArray = array("A","B","C","D","E","F","G","H","I","J","K","L","M");
	    $this->academicQualificationArray = array("Cl-10","Cl-12","B.A","B.Ed","B.Sc","B.Com","BBA","BBM","M.A","M.Sc",			         "M.Com");
		$this->professionalQualificationArray = array("PTC","ZTC","PGCE","PGDE","B.Ed","B.Ed(Primary)","B.Ed(Secondary)","PGCTS","Diploma in Management");
	}

  	function setpostvars()
	{
		if(isset($_POST["hdn_actiontoperform"])) 			$this->actiontoperform 			  = DoTrim($_POST["hdn_actiontoperform"]);
        if(isset($_POST["dzongkhag"])) 						$this->dzongkhag   		          = DoTrim($_POST["dzongkhag"]);
        if(isset($_POST["gewog"])) 							$this->gewog   		              = DoTrim($_POST["gewog"]);
	}

    function pageQueryInterface($username,$usertype,$connid)
	{
		$this->setpostvars();
            
        $clscts = new clscts();
                
		$clscts->setpostvars();
		$output_string = "";
		$schoolcode_string = "";
		//echo "User Name: ".$username." - ".$usertype."<br>";
                
		if($this->actiontoperform == "Query Data")
		{
			$schoolcode_string = $clscts->queryResult_SchoolCodeString($username,$usertype,$connid);
			$this->schoolcode=$schoolcode_string;
			//echo "School Code String: ".$schoolcode_string."<br>";
			if($schoolcode_string == "")
			{
				$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr></table>";
			}
			else
			{
//			    $output_string = $this->queryResult_FR($username,$usertype,$trn_editSchool,$userTransactionRightsArray,$schoolcode_string,$connid);
			    $output_string = $this->queryResult_FR($schoolcode_string,$connid,$clscts,$username,$usertype);
			}

		}
		return $output_string;
	}
        
//Should it not display values of 0? eg: No students in class 8, don't display that; Don't display class 8 skill strengths if no class 8 students
        function queryResult_FR($schoolcode_string,$connid,$clscts,$username,$usertype)
	{
		$region = $this->reportRegion($connid);
                
                $output_string = "<table style='border-collapse: collapse' align='center' bordercolor='#333333'>";
				$output_string .= "<tr><td colspan='2' align='center' bgcolor='#bf0000'><b><font size='2' color='#FFFFFF'>";
                $output_string .= $region.' Statistical Report';
                $output_string .= "</font></b></td></tr><tr><td>&nbsp;</td></tr>";
                
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Total number of schools';
                $output_string .= "</b></td><td></td></tr><tr><td>";
		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"school_master")."</b></td></tr>";

                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'No. of schools by type';
                $output_string .= "</b></td><td></td></tr><tr><td>";
                $output_string .= "Community Primary School</td><td>";
		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"school_master","schooltype","CPS")."</b></td></tr><tr><td>";
                $output_string .= "Primary School</td><td>";
		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"school_master","schooltype","PS")."</b></td></tr><tr><td>";                
                $output_string .= "Lower Secondary School</td><td>";
		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"school_master","schooltype","LSS")."</b></td></tr><tr><td>";
                $output_string .= "Middle Secondary School</td><td>";
		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"school_master","schooltype","MSS")."</b></td></tr><tr><td>";
                $output_string .= "Higher Secondary School</td><td>";
		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"school_master","schooltype","HSS")."</b></td></tr>";
            //Number of schools by Access Category  
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'No. of schools by access category';
                $output_string .= "</b></td><td></td></tr><tr><td>";
				for ($ci=0;$ci<count($this->accessCategoryArray);$ci++)
				{
					$output_string .= $this->accessCategoryArray[$ci]."</td><td>";
	                $output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"school_master","accesscategory",$this->accessCategoryAbrv[$ci])."</b></td></tr><tr><td>";
				}
          //Number of students by Class
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Number of students by class';
                $output_string .= "</b></td><td></td></tr><tr><td>";
                $output_string .= "Total students in ".$region."</td><td>";
		        $output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"student_master")."</b></td></tr><tr><td>";
		       for ($ci=0;$ci<count($this->classArray);$ci++)
				{
					$output_string .= "Class ".$this->classArray[$ci]."</td><td>";
             		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"student_master","class",$this->classArray[$ci])."</b></td></tr><tr><td>";
				 }
             
    //Average class size
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Average class size';
                $output_string .= "</b></td><td></td></tr><tr><td>";
				for ($ci=0;$ci<count($this->classArray);$ci++)
				{
					$output_string .= "Class ".$this->classArray[$ci]."</td><td>";
					$avg1=$this->countFromTableByAttribute($schoolcode_string,$connid,"student_master","class",$this->classArray[$ci])/$this->numberOfSectionsInaRegion($connid,$ci);
					if ($avg1!= 0)
					
		        	$output_string .= "<b>".round($avg1)."</b></td></tr><tr><td>";
					
					else
						$output_string .= "<b>0</b></td></tr><tr><td>";
				}
                $output_string .= "</td></tr>"; #filler
              //number of teachers by academic qualification  
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Number of teachers by Academic qualification';
		        $output_string .= "</b></td><td></td></tr><tr><td>";
				for ($ci=0;$ci<count($this->academicQualificationArray);$ci++)
				{
					$output_string .= $this->academicQualificationArray[$ci]."</td><td>";
					$output_string .= "<b>".$this->countFromTableByQualification($schoolcode_string,$connid,"teacher_master","qualification_academic",$this->academicQualificationArray[$ci])."</b></td></tr><tr><td>";
				}
				$output_string .= "Unknown</td><td>";
				$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"teacher_master","qualification_academic","")."</b></td></tr><tr><td>";
				
                $output_string .= "</td></tr>"; #filler
     
	 //number of teachers by professional qualification
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Number of teachers by Professional qualification';
                $output_string .= "</b></td><td></td></tr><tr><td>";
				for ($ci=0;$ci<count($this->professionalQualificationArray);$ci++)
				{
					$output_string .= $this->professionalQualificationArray[$ci]."</td><td>";
					$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"teacher_master","qualification_professional",$this->professionalQualificationArray[$ci])."</b></td></tr><tr><td>";
				}
				$output_string .= "M.Ed</td><td>";
				$output_string .= "<b>".$this->countFromTableByQualification($schoolcode_string,$connid,"teacher_master","qualification_professional","M.Ed")."</b></td></tr><tr><td>";
				$output_string .= "Unknown</td><td>";
				$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"teacher_master","qualification_professional","")."</b></td></tr><tr><td>";
				
				
                $output_string .= "</td></tr>"; #filler
                
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Number of teachers by age group';
                $output_string .= "</b></td><td></td></tr><tr><td>";
		$output_string .= "Age 25 or younger</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,0,25)."</b></td></tr><tr><td>";
		$output_string .= "Age 26-30</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,26,30)."</b></td></tr><tr><td>";
		$output_string .= "Age 31-35</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,31,35)."</b></td></tr><tr><td>";
		$output_string .= "Age 36-40</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,36,40)."</b></td></tr><tr><td>";
		$output_string .= "Age 41-45</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,41,45)."</b></td></tr><tr><td>";
		$output_string .= "Age 46-50</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,46,50)."</b></td></tr><tr><td>";
		$output_string .= "Age 51-55</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,51,55)."</b></td></tr><tr><td>";
		$output_string .= "Age 56-60</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,56,60)."</b></td></tr><tr><td>";
		$output_string .= "Over 60</td><td>";
		$output_string .= "<b>".$this->numberTeacherByAge($schoolcode_string,$connid,61)."</b></td></tr><tr><td>";
		$output_string .= "Unknown</td><td>";
		$output_string .= "<b>".$this->countFromTableByAttribute($schoolcode_string,$connid,"teacher_master","date_of_birth","00-00-0000")."</b></td></tr>";
          /*      
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Number of teachers by trainings provided';
                $output_string .= "</b></td><td></td></tr><tr><td>";
                $output_string .= "</td></tr>"; #filler
                
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Number of teachers by recent trainings (last 1-3yrs)';
                $output_string .= "</b></td><td></td></tr><tr><td>";
                $output_string .= "</td></tr>"; #filler */
 /*               
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'ASSL performance of students by class and subject';
                $output_string .= "</b></td><td></td></tr><tr><td>";
//		if ($region=="Bhutan")
//		    $output_string .= $this->clsschoolresult->pageNationalResultSummary($dbconnect->connid);
//		    $output_string .= $this->clsschoolresult->prepareNationLevelHeader("D");
			//prints in the second cell?
//		    $output_string .= $this->pageRegionResultsSummary($regiontype,$regioncode,$connid);
//Don't have any of these vars at the moment...
		$output_string .= "</td></tr>"; #filler
 */                
                $output_string .= "<tr bgcolor='#ff9c00'><td><b>";
                $output_string .= 'Strong and weak skills by class and subject, based on the ASSL';
                $output_string .= "</b></td><td></td></tr><tr><td>";
		$output_string .= $this->regionalSkillSummary($connid);
		$output_string .= "</td></tr></table>"; #filler, end
#Resolve ties if tie between 2nd and 3rd position (or 2nd to last and 3rd to last)
#make no of skills for strong and weak skills a variable (instead of static int)                
		return $output_string;
	}
        
    function reportRegion($connid)
	{
       if ($this->dzongkhag != null && $this->gewog != null) {
			$query = "SELECT * FROM bt_gewog_master WHERE GewogCode=".$this->gewog;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			return $row['GewogNameEn'];
		}
		else if ($this->dzongkhag != null) {
			$query = "SELECT * FROM bt_dzongkhag_master WHERE DzongkhagCode=".$this->dzongkhag;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			return $row['DzongkhagNameEn'];
		}
		else
			return "Bhutan";
	}

	function countFromTableByAttribute($schoolcode_string,$connid,$table, $field, $attributeValue) {
		if ($field != null) {
			$query = "SELECT COUNT(*) FROM ".$table." WHERE ".$field." = '".$attributeValue."' AND schoolcode IN (".$schoolcode_string.")";
		} else {
			$query = "SELECT COUNT(*) FROM ".$table." WHERE schoolcode IN (".$schoolcode_string.")";
		}
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
//function to get the number of teachers by qualification

function countFromTableByQualification($schoolcode_string,$connid,$table, $field, $attributeValue) {
		if ($field != null) {
			$query = "SELECT COUNT(*) FROM ".$table." WHERE ".$field." LIKE '".$attributeValue."%' AND schoolcode IN (".$schoolcode_string.")";
		} else {
			$query = "SELECT COUNT(*) FROM ".$table." WHERE schoolcode IN (".$schoolcode_string.")";
		}
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}



	function numberTeacherByAge($schoolcode_string,$connid,$agemin,$agemax) {
	    if ($agemax=="")
		$agemax=100;
	    if ($agemin=="")
		$agemin=0;
	
	    $countquery = "SELECT COUNT(*) FROM teacher_master";
	    $query = "SELECT * FROM teacher_master";
	    $condition = "";
	    $today = date("Y-m-d");
	    $condition .= " AND (((DATEDIFF('".$today."',date_of_birth)/365) <=".$agemax.")";
	    $condition .= " AND (DATEDIFF('".$today."',date_of_birth)/365) >=".$agemin.")";
	    $condition .= " AND schoolcode IN (".$schoolcode_string.")";
	    if($condition != "")
	    {
		    $condition = " WHERE ".substr($condition,4);
	    }
	    $countquery .= $condition;
	    $dbquery = new dbquery($countquery,$connid);
	    $row = $dbquery->getrowarray();
	    return $row[0];
	}

/*
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

		$resultArray = array();
		$tablename = "studentwise".$test_edition;
		if($schoolcodestr != "")
		{
			//echo $villagecodestr." - ".$schoolcodestr."<br>";
			for($i=0; $i<$this->total_subjects; $i++)
			{
				$query  = "SELECT class, COUNT(*)";
				$subject = strtolower(substr($this->subject_array[$i],0,1));
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

    	function pageRegionResultSummary($regiontype,$regioncode,$connid)
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

		//echo $regionQuery."<br>"; 
		$paperDetailsArray = array();
		$this->fetchPaperDetails(&$paperDetailsArray,$connid);

		$totalColumns = $this->totaltest_classes * $this->total_subjects * 3 + 1 + $this->totaltest_classes + ($this->totaltest_classes * $this->total_subjects * 2) + 1;
		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#A8D8FF'>";
		$output_string  .= "<tr><td bgcolor='#bf0000' colspan='".$totalColumns."' align='left'><b><font size='2' color='#FFFFFF'>".$regionname." Level All Round Result - Summary Report</font></b></td></tr>";

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
						$totalQuestion = $paperDetailsArray[$papercode];
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
*/
   function regionalSkillSummary($connid)
    {
    	$this->setpostvars();
 //   	$this->setgetvars();
	
	$skill_names = array();
//	$skillwise_totalquestions = array();
	$number_of_skills = array();
	$this->set_skill_names(&$skill_names, &$number_of_skills, $connid);

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
			    $this->findSkillsByRegion($subjectno, $actualclass, $number_of_skills, $test_edition, $current_papercode, $totalSkillsInPaper, &$roundwise_skillwise_data, $connid, $i);
			    sort($roundwise_skillwise_data[$test_edition]);
		    //check that num strong and weak skills constants were appropriately set
		   		 if(NUMSTRONGSKILLS>$totalSkillsInPaper)
				echo '<script language="javascript">confirm("Trying to output more strong skills than total skills in papercode '.$current_papercode.'")</script>';
		   		 if(NUMWEAKSKILLS>$totalSkillsInPaper)
		        echo '<script language="javascript">confirm("Trying to output more weak skills than total skills in papercode '.$current_papercode.'")</script>';
			}
			for($i=0; $i<$this->total_test_editions; $i++)
			{
		    //only tries to output non-null data
		   	 if (!is_array($roundwise_skillwise_data[$this->test_edition_array[$i]][1])) {
				$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#B07575'><td align='center'><b>Class: ".$actualclass." Subject: ".$this->subject_array[$subjectno-1]."</b></td>";
				$output_string .= "<td align='center'><b>".$this->test_edition_names_array[$this->test_edition_array[$i]]."<br />%</b></td></tr>";				
				$this->resolveTies($totalSkillsInPaper, $roundwise_skillwise_data, $test_edition);
	
				$output_string .= "<tr bordercolor='#FFFFFF'  bgcolor='#ff9c00'><td align='center'><b>Strong Skills</b></td>";
				$output_string .= "<td></td></tr>";
				$output_string .= $this->strongSkills($totalSkillsInPaper, $roundwise_skillwise_data, $skill_names, $current_papercode);
			
				$output_string .= "<tr bordercolor='#FFFFFF'  bgcolor='#ff9c00'><td align='center'><b>Weak Skills</b></td>";
				$output_string .= "<td></td></tr>";
				$output_string .= $this->weakSkills($totalSkillsInPaper, $roundwise_skillwise_data, $skill_names, $current_papercode);
		    }
		}
		$output_string_master .= $output_string;
	    }
	}
	return $output_string_master;
    }
    
    function set_skill_names($skill_names, $number_of_skills, $connid)
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
//			$skillwise_totalquestions[$current_papercode][$i] = $line['ns'.$i];
			$i++;
		}
		$number_of_skills[$current_papercode] = $i-1;
	}
    }
    
    function findSkillsByRegion($subjectno, $actualclass, $number_of_skills, $test_edition, $current_papercode, $totalSkillsInPaper, $roundwise_skillwise_data, $connid, $i)
    {
	for($sk=1; $sk<=$totalSkillsInPaper; $sk++)
	{
		$skillfield = "AvgS".$sk;
		$skQuery = "SELECT avg(".$skillfield.") as AVG_SCORE FROM schoolwise_classwise_skillwise_performance WHERE subjectno=".$subjectno;
		$skQuery .= " AND class='".$actualclass."' AND test_edition='".$test_edition."' AND ".$skillfield." != ''";
		$skQuery .= "AND schoolcode IN (".$this->schoolcode.")";
//		echo $skQuery."<br>"; //exit;
		$skdbquery = new dbquery($skQuery,$connid);
		$skRow = $skdbquery->getrowarray();
		$roundwise_skillwise_data[$test_edition][$sk] = $skRow['AVG_SCORE'];
		$roundwise_skillwise_data[$test_edition][$sk][10] = $sk;
	}
    }
    
    function strongSkills($totalSkillsInPaper, $roundwise_skillwise_data, $skill_names, $current_papercode)
    {
	$output_string="";
	for($sk=$totalSkillsInPaper-1; $sk>=$totalSkillsInPaper-NUMSTRONGSKILLS; $sk--)
	{
	    $output_string .= "<tr bordercolor='#FFFFFF'>";
	    for($i=0; $i<$this->total_test_editions; $i++)
	    {
		    $test_edition = $this->test_edition_array[$i];
		    if(!is_array($roundwise_skillwise_data[$test_edition][$sk]))
		    {
			$skillnumber = $roundwise_skillwise_data[$test_edition][$sk][10];
			$output_string .= "<td>".$skill_names[$current_papercode][$skillnumber]."</td>";
		    }
		    if(is_array($roundwise_skillwise_data[$test_edition][$sk]))
			    $avg_skill = "--";
		    else
			    $avg_skill = Donumber_format($roundwise_skillwise_data[$test_edition][$sk],1);
		    $output_string .= "<td align='center'>".$avg_skill."</td>";
	    }
	    $output_string .= "</tr>";
	}
	    
	return $output_string;
    }
    
    function weakSkills($totalSkillsInPaper, $roundwise_skillwise_data, $skill_names, $current_papercode)
    {
	$output_string="";
	for($sk=0; $sk<=NUMWEAKSKILLS-1; $sk++)
	{
	    $output_string .= "<tr bordercolor='#FFFFFF'>";
	    for($i=0; $i<$this->total_test_editions; $i++)
	    {
		    $test_edition = $this->test_edition_array[$i];
		    if($i == 0 && !is_array($roundwise_skillwise_data[$test_edition][$sk]))
		    {
			$skillnumber = $roundwise_skillwise_data[$test_edition][$sk][10];
			$output_string .= "<td>".$skill_names[$current_papercode][$skillnumber]."</td>";
		    }
		    if(is_array($roundwise_skillwise_data[$test_edition][$sk]))
			    $avg_skill = "--";
		    else
			    $avg_skill = Donumber_format($roundwise_skillwise_data[$test_edition][$sk],1);
		    $output_string .= "<td align='center'>".$avg_skill."</td>";
	    }
	    $output_string .= "</tr>";
	}
	return $output_string;
    }
    function numberOfSectionsInaRegion($connid,$ci)
	{
	    
	// $classcounter = array();
//		echo $ci;
		$classcounter = 0;
		for($si=0; $si<count($this->sectionArray); $si++)
		{
			$query = "SELECT COUNT(DISTINCT schoolcode) AS TC FROM student_master WHERE schoolcode IN (".$this->schoolcode.") AND class='".$this->classArray[$ci]."' AND section='".$this->sectionArray[$si]."'";
			//Counts the number of schools  which have the particular class and section
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$classcounter += $row['TC'];
			//adds this number to the array
		}
		
		$query = "SELECT COUNT(DISTINCT schoolcode) AS TC FROM student_master WHERE schoolcode IN (".$this->schoolcode.") AND class='".$this->classArray[$ci]."' AND section=''";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$classcounter += $row['TC'];
		return $classcounter;
	}
	
	
    /* Detects any "tie" for strong and weak skills (i.e. same average for second and third highest/lowest scores) and
    resolves the tie by reordering the array. The skill that is strongest/weakest nationally "wins" the tie */
    function resolveTies($totalSkillsInPaper, $roundwise_skillwise_data, $test_edition) {
//Testing with Barp, Punakha school: 7102584, sci 8
	$avgA = Donumber_format($roundwise_skillwise_data[$test_edition][$totalSkillsInPaper-2],PRECISION)."<br />";
	$avgB = Donumber_format($roundwise_skillwise_data[$test_edition][$totalSkillsInPaper-3],PRECISION)."<br />";
	if ($avgA == $avgB)
	{
//	    echo "there's a tie for strongest skills!";
	    //populate an array with all of the tied skills
	    $arr = array ();
	    for ($i=2; $i<=$totalSkillsInPaper; $i++) {
		if (Donumber_format($roundwise_skillwise_data[$test_edition][$totalSkillsInPaper-$i])==Donumber_format($roundwise_skillwise_data[$test_edition][$totalSkillsInPaper-$i-1])) {
		    $arr[] = Donumber_format($roundwise_skillwise_data[$test_edition][$totalSkillsInPaper-$i-1]);
		}
		else
		    break;
	    }
//	    echo "numbers of ties-".count($arr);
	    //displaying "1", two-way tie, though; so should be displaying 2? need to update
	    /*
		find the skills array for the same papercode nationally (can use regionwiseresultssummary function?)
		sort the national array
		for (lastvalue -> firstvalue)
		    for (each skill in tieArray)
			if nationalskill at val == skill in tieArray
			    that skill "wins"
		skillArray[totalSkills - 2] (i.e. second position) = winning skillVal (and associated skill);
	    */
	}
	$avgC = Donumber_format($roundwise_skillwise_data[$test_edition][1],1)."<br />";
	$avgD = Donumber_format($roundwise_skillwise_data[$test_edition][2],1)."<br />";
	if ($avgD==$avgC)
	{
	    echo "there's a tie for weakest skills!";
	    //tie for strong skills	    
	}
    }

}