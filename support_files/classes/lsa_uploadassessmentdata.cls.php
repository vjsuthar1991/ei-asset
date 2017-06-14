<?php

class clsuploadassessmentdata
{
	var $project;
	var $round;
	var $totalpapers;
	var $action;
	var $commonfieldlist;
	var $masterfieldlist;
	var $suggestedfieldlist;
	var $formfieldlist;
	var $masterfieldlistcomments;
	var $defaultfieldlist;
	var $totalmasterfields;
	var $totaldefaultfields;
	var $totalformfields;
	var $fieldsequence;
	var $defaultsequence;
	var $fileUploadMessage;
	var $filetotablemappingArray;
	var $filetotablemappingArrayAPRESt;
	var $filetotablemappingArraySSACG1;
	var $filetotablemappingArraySSACG2;
	var $formatsaved;
	var $isfirstrawfieldnames;
	var $iserrorfound;
	var $filename;
	var $tablename;

	function clsuploadassessmentdata()
	{
		$this->project="";
		$this->round="";
		$this->totalpapers=0;
		$this->action="";
		$this->commonfieldlist = array('School-Code1','School-Code2','School-Code3','Serial1','RollNo','Serial2');
		
		$this->masterfieldlist = array('School-Code1','School-Code2','School-Code3','Unique_student_code','School-Name','Class','Serial1','RollNo','Serial2','Sex','Name1','Name2','Medium','State','Town','District','Block','Cluster','EvaluatorCode','EvaluatorCode1','Batch','projectType','Day','Month','Year','Papercode1','Papercode2','Date1','Date2');
		
		$this->suggestedfieldlist = array('School-Code1','School-Code2','School-Code3','Unique_student_code','School-Name','Class','Serial1','RollNo','Serial2','Sex','Name1','Name2','Medium','State','Town','District','Block','Cluster','EvaluatorCode','EvaluatorCode1','Batch','projectType','Day','Month','Year','Papercode1','Papercode2','Date1','Date2');
		
		$this->masterfieldlistcomments = array('SchoolCode1','SchoolCode2','SchoolCode3','Unique_student_code','SchoolName','Class','Serial1','RollNo','Serial2','Sex','Name1','Name2','Medium','State','Town','District','Block','Cluster','EvaluatorCode','EvaluatorCode1','Batch','projectType','Day','Month','Year','Papercode1','Papercode2','Date1','Date2');
		
		$this->defaultfieldlist = array('SchoolCode1','SchoolName','Class','Serial1','Sex','Name1','Medium','State');
		
		$this->totaldefaultfields = count($this->defaultfieldlist);
		$this->formfieldlist = array('SchoolCode1','SchoolCode2','SchoolCode3','Unique_student_code','SchoolName','Class','Serial1','RollNo','Serial2','Sex','Name1','Name2','Medium','State','Town','District','Block','Cluster','EvaluatorCode','EvaluatorCode1','Batch','projectType','Day','Month','Year','Papercode1','Papercode2','Date1','Date2');
		$this->totalformfields = count($this->formfieldlist);
		$this->fieldsequence="";
		$this->defaultsequence="";
		$this->fileUploadMessage="";
		$this->filetotablemappingArray = array("projectType"=>"projectType","School Code1"=>"schoolcode1","School Code2"=>"schoolcode2","School Code3"=>"schoolcode3","Unique_student_code"=>"unique_student_code","School Name"=>"schoolname","Class"=>"class","Serial1"=>"serial1","RollNo"=>"rollno","Serial2"=>"serial2","Sex"=>"sex","Name1"=>"name1","Name2"=>"name2","Medium"=>"medium","State"=>"state","Town"=>"town","District"=>"district","Block"=>"block","Cluster"=>"cluster","EvaluatorCode"=>"evaluatorcode","EvaluatorCode1"=>"evaluatorcode1","Batch"=>"batch","projectType"=>"projecttype","Day"=>"Day","Month"=>"Month","Year"=>"Year","Papercode1"=>"papercode1","Papercode2"=>"papercode2","Date1"=>"date1","Date2"=>"date2");
		$this->filetotablemappingArrayAPRESt = array("projectType"=>"projectType","School Code1"=>"APFSchoolCode","Unique_student_code"=>"unique_student_code","Class"=>"Class","Serial1"=>"SrNo","Sex"=>"Sex","Name1"=>"Name","Name2"=>"Name1","EvaluatorCode"=>"EvaluatorCode");
		$this->filetotablemappingArraySSACG1 = array("School Code1"=>"schoolcode1","School Name"=>"schoolname","Class"=>"class","Serial1"=>"serial1","Sex"=>"sex","Name1"=>"name1","State"=>"state","District"=>"district","Block"=>"block","Cluster"=>"cluster","EvaluatorCode"=>"evaluatorcode","EvaluatorCode1"=>"evaluatorcode1","Papercode1"=>"papercode1","Papercode2"=>"papercode2","Date1"=>"date1","Date2"=>"date2");
		$this->filetotablemappingArraySSACG2 = array("State"=>"state","District"=>"district","Block"=>"block","Cluster"=>"cluster","School Code1"=>"schoolcode","School Name"=>"schoolname","Class"=>"class","Serial1"=>"srno","Sex"=>"gender","Name1"=>"name","EvaluatorCode"=>"evaluatorcode","EvaluatorCode1"=>"evaluatorcode1","Papercode1"=>"papercode1","Papercode2"=>"papercode2","Date1"=>"date1","Date2"=>"date2");
		$this->formatsaved="";
		$this->isfirstrawfieldnames="";
		$this->iserrorfound=0;
		$this->filename="";
		$this->tablename="";
  	}

  	function setgetvars()
	{
		if(isset($_GET["project"])) $this->project   								= strtolower($_GET["project"]);
	}

	function setpostvars()
	{
		if(isset($_POST["project"])) $this->project   								= strtolower($_POST["project"]);
		if(isset($_POST["round"])) $this->round   									= $_POST["round"];
		if(isset($_POST["totalpapers"])) $this->totalpapers   						= $_POST["totalpapers"];
		if(isset($_POST["actiontoperform"])) $this->action          				= $_POST["actiontoperform"];
		if(isset($_POST["fieldsequence"])) $this->fieldsequence          			= $_POST["fieldsequence"];
		if(isset($_POST["defaultsequence"])) $this->defaultsequence          		= $_POST["defaultsequence"];
		if(isset($_POST["isfirstrawfieldnames"])) $this->isfirstrawfieldnames      	= $_POST["isfirstrawfieldnames"];
		if(isset($_POST["filename"])) $this->filename   							= strtolower($_POST["filename"]);
		if(isset($_POST["tablename"])) $this->tablename   							= $_POST["tablename"];
    }

    function pageEditUploadAssessmentDataFormat($connid)
    {
    	$this->setgetvars();
    	$this->setpostvars();
    	if($this->action == "Update Format Details") // Step3 - Save data upload file format
    	{
    		$defaultfieldnames = "";
    		$suggestedfieldnames = "";
    		$suggestedfieldvalues = "";

    		$fieldsequenceArray = explode(",",$this->fieldsequence);
    		$defaultfieldsequenceArray = explode(",",$this->defaultsequence);
    		$totalfields=count($fieldsequenceArray);

			for($i=0; $i<$this->totalformfields; $i++)
			{
				$suggestedformfield = "suggested_".$fieldsequenceArray[$i];
				$possibleformfield = "possiblevalues_".$fieldsequenceArray[$i];
				if(isset($_POST[$suggestedformfield]))
				{
					$defaultfieldnames .= $defaultfieldsequenceArray[$i]."-";
					$suggestedfieldnames .= $_POST[$suggestedformfield]."-";
					$suggestedfieldvalues .= $_POST[$possibleformfield]."-";
				}
			}

			$defaultfieldnames = substr($defaultfieldnames,0,-1);
			$suggestedfieldnames = substr($suggestedfieldnames,0,-1);
			$suggestedfieldvalues = substr($suggestedfieldvalues,0,-1);

			$query = "UPDATE lsa_assessment_format_details SET isfirstrawfieldnames='".$this->isfirstrawfieldnames."',defaultfieldnames='".$defaultfieldnames."',suggestedfieldnames='".$suggestedfieldnames."'";
			$query .= ",suggestedfieldvalues='".$suggestedfieldvalues."',formatsaved='Y' WHERE project='".strtolower($this->project)."'";
			$dbquery = new dbquery($query,$connid);

			//echo $query; //exit;
			echo "<script>opener.history.go(0);window.close();</script>";
			exit();
    	}
    	
    	echo "<script>makearrayempty()</script>";
    	
    	$query = "SELECT * FROM lsa_assessment_format_details WHERE project='".strtolower($this->project)."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		$totalpapers = $row["totalpapers"];
		$this->formatsaved=$row['formatsaved'];
			
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
   	 	$output_string .= "<tr bgcolor='#7EBDF1' bordercolor='7EBDF1'><td align='center' colspan='3'><b>Paperwise Details</b></td></tr>";
   	 	$output_string .= "<tr bordercolor='7EBDF1'><td align='center'><b>Paper</b></td><td align='center'><b>Paper Name</b></td><td align='center'><b>Total<br>Questions</b></td></tr>";
   	 	for($i=1; $i<=$totalpapers; $i++)
   	 	{
   	 		$papername = "p".$i."_name";
			$tq = "p".$i."_totalquestions";
   	 		$output_string .= "<tr bordercolor='7EBDF1'><td align='center'>P".$i."</td><td align='center'>".$row[$papername]."</td><td align='center'>".$row[$tq]."</td></tr>";
   	 	}
   	 	$output_string .= "</table>";
   	 	$output_string .= "<input type='hidden' name='totalpapers' value=".$totalpapers.">";
   	 	
 		$fielddesc = "";
 		$selectedfieldtable = "";
 		for($i=1; $i<=$totalpapers; $i++)
 		{
	 		$papername = "p".$i."_name";
			$tq = "p".$i."_totalquestions";
			$papercode = substr($row[$papername],0,1);
	
			$field = "Paper".$i." Absent";
			$suggestedfieldname = $row[$papername]." Absent";
			$formfieldname = "Paper".$i."Absent";
	
			array_push($this->masterfieldlist, str_replace(" ","-",$field));
			array_push($this->suggestedfieldlist, str_replace(" ","-",$suggestedfieldname));
			array_push($this->formfieldlist, str_replace(" ","-",$formfieldname));
	
			array_push($this->masterfieldlistcomments, $field);
			$fielddesc = "Paper".$i." Q1 to Q".$row[$tq];
			$suggestedfielddescname = substr($row[$papername],0,1)."Q1 to ".substr($row[$papername],0,1)."Q".$row[$tq];
			$formfielddescname = substr($row[$papername],0,1)."Q1to".substr($row[$papername],0,1)."Q".$row[$tq];
   	 	}

		$this->totalmasterfields = count($this->masterfieldlist);
   	 	$masterfieldtable = $this->prepareMasterFieldTable();

   	 	$buttonlist = "<image src='images/up_arrow.jpg' width='20' height='20' onclick='movefieldup()'><br><br>";
   	 	$buttonlist .= "<image src='images/down_arrow.jpg'  width='20' height='20' onclick='movefielddown()'><br><br>";
   	 	$buttonlist .= "<image src='images/delete_image.jpg'  width='20' hight='20' onclick='removefield()'>";

 		$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
 		$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='7EBDF1'><td align='center' colspan='4'><b>Specify Field Formats</b></td></tr>";
 		$output_string .= "<tr bordercolor='7EBDF1'><td valign='top'>".$masterfieldtable."</td>";
 		$output_string .= "<td align='center'><image src='images/right_arrow.jpg' width='40' hight='20'></td>";
 	    $output_string .= "<td valign='top'>";

 	    $output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333' id='selectedfieldstable'>";
		$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Is first row of file having field names?</b>";
		$output_string .= "&nbsp;<input type='radio' name='isfirstrawfieldnames' value='Y'";
		if($row["isfirstrawfieldnames"]=="Y")
			$output_string .=" checked>Yes";
		else 
			$output_string .=">Yes";
			
		$output_string .= "&nbsp;&nbsp;<input type='radio' name='isfirstrawfieldnames' value='N'";
		if($row["isfirstrawfieldnames"]=="N")
			$output_string .=" checked>No";
		else 
			$output_string .=">No";
		
		$output_string .= "</td></tr>";
		
	    $output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Selected Field Table</b></td></tr>";
		$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'>&nbsp;</td><td align='center'><b>Default Field<br>Name</b></td><td align='center'><b>Suggested Field<br>Name</b></td><td align='center' title='Enter allowed values which will show error if any other value entered'><b>Possible Values (Optional)<br><font color='#FF0000'>Comma (,) separated</font></b></td></tr>";
		
		$defaultfieldsArray = explode("-",$row['defaultfieldnames']);
		$suggestedfieldnameArray = explode("-",$row['suggestedfieldnames']);
		$suggestedfieldvaluesArray = explode("-",$row['suggestedfieldvalues']);
		$totalfieldinformat = count($defaultfieldsArray);
		for($i=0; $i<$totalfieldinformat; $i++)
		{
			$field=$defaultfieldsArray[$i];
			$suggestedfieldname=$suggestedfieldnameArray[$i];
			$possiblefieldvalue=$suggestedfieldvaluesArray[$i];
			$formfieldname="";
			
			if(substr($defaultfieldsArray[$i],0,5) == "Paper" && substr($defaultfieldsArray[$i],-6,6) == "Absent")
			{
				$formfieldname = str_replace(" ","",$defaultfieldsArray[$i]);
				$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><input type='checkbox' name='chk_".$formfieldname."'></td><td align='center'>".$defaultfieldsArray[$i]."</td>";
				$output_string .= "<td align='center'><input type='text' name='suggested_".$formfieldname."' value='".$suggestedfieldnameArray[$i]."'></td>";
				$output_string .= "<td align='center'><input type='text' name='possiblevalues_".$formfieldname."' value='".$suggestedfieldvaluesArray[$i]."'></td></tr>";				
			}
			elseif(substr($defaultfieldsArray[$i],0,5) == "Paper" && substr($defaultfieldsArray[$i],-6,6) != "Absent")
			{
				$paperno = substr($defaultfieldsArray[$i],5,1);
				$papername = "p".$paperno."_name";
				$tq = "p".$paperno."_totalquestions";
				$formfieldname = substr($row[$papername],0,1)."Q1to".substr($row[$papername],0,1)."Q".$row[$tq];
				$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><input type='checkbox' name='chk_".$formfieldname."'></td><td align='center'>".$defaultfieldsArray[$i]."</td>";
				$output_string .= "<td align='center'><input type='text' name='suggested_".$formfieldname."' value='".$suggestedfieldnameArray[$i]."'></td>";
				$output_string .= "<td align='center'><input type='text' name='possiblevalues_".$formfieldname."' value='".$suggestedfieldvaluesArray[$i]."'></td></tr>";				
			}
			else 
			{
				$formfieldname = str_replace(" ","",$defaultfieldsArray[$i]);
				$chkfield = array_search(str_replace(" ","-",$defaultfieldsArray[$i]),$this->masterfieldlist);
				$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><input type='checkbox' name='chk_".$this->formfieldlist[$chkfield]."'></td><td align='center'>".$defaultfieldsArray[$i]."</td>";
				$output_string .= "<td align='center'><input type='text' name='suggested_".$this->formfieldlist[$chkfield]."' value='".$suggestedfieldnameArray[$i]."' onchange='change_suggessted(\"".$i."\",\"".$this->formfieldlist[$chkfield]."\")'></td>";
				$output_string .= "<td align='center'><input type='text' name='possiblevalues_".$this->formfieldlist[$chkfield]."' value='".$suggestedfieldvaluesArray[$i]."' onchange='change_possible(\"".$i."\",\"".$this->formfieldlist[$chkfield]."\")'></td></tr>";
			}
			
			echo "<script>adddefaultfieldlist('".$field."','".$suggestedfieldname."','".$possiblefieldvalue."','".$formfieldname."')</script>";
		}
					
		$output_string .= "</table>";
		$output_string .= "</td><td align='center' valign='center'>".$buttonlist."</td></tr>";
 		$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'colspan='4'><input type='button' name='Update Format' value='Update Format' onclick='return updateformat(".$totalpapers.");'></td></tr>";
 		$output_string .= "</table>";
		return $output_string;
    }
    // Function called from lsa_uploadassessmentdata.php.	Added by Arpit (01/02/2008) - For Uploading Assessment Data
    function pageUploadAssessmentData($connid)
    {
    	$this->setgetvars();
    	$this->setpostvars();
    	//echo "<pre>"; 		print_r ($_POST); 	echo "</pre>";
    	//echo $this->project."--".$this->action;
    	if($this->action == "Enter Total Papers") // Step1 - Save total papers
    	{
    		$insQuery = "INSERT INTO lsa_assessment_format_details SET project='".strtolower($this->project)."', totalpapers=".$this->totalpapers;
    		$insdbquery = new dbquery($insQuery,$connid);
    	}
    	elseif($this->action == "Save Paperwise Total Questions") // Step2 - Save paperwise total questions
    	{
    		$updateQuery .= "UPDATE lsa_assessment_format_details SET ";
    		$setQuery = "";
    		for($i=1; $i<=$this->totalpapers; $i++)
    		{
    			$papername = "papername".$i;
    			$tq = "TQ".$i;
    			$setQuery .= "p".$i."_name='".$_POST[$papername]."', p".$i."_totalquestions=".$_POST[$tq].",";
    		}
    		$setQuery = substr($setQuery,0,-1).",totalquestionsadded='Y'";
    		$updateQuery .= $setQuery." WHERE project='".strtolower($this->project)."'";
    		//echo "<br>".$updateQuery."<br><br>";
    		$updatedbQuery = new dbquery($updateQuery,$connid);
    	}
    	elseif($this->action == "Save Format Details") // Step3 - Save data upload file format
    	{
    		$defaultfieldnames = "";
    		$suggestedfieldnames = "";
    		$suggestedfieldvalues = "";

    		$fieldsequenceArray = explode(",",$this->fieldsequence);
    		$defaultfieldsequenceArray = explode(",",$this->defaultsequence);
    		$totalfields=count($fieldsequenceArray);

			for($i=0; $i<$this->totalformfields; $i++)
			{
				$suggestedformfield = "suggested_".$fieldsequenceArray[$i];
				$possibleformfield = "possiblevalues_".$fieldsequenceArray[$i];
				if(isset($_POST[$suggestedformfield]))
				{
					$defaultfieldnames .= $defaultfieldsequenceArray[$i]."-";
					$suggestedfieldnames .= $_POST[$suggestedformfield]."-";
					$suggestedfieldvalues .= $_POST[$possibleformfield]."-";
				}
			}

			$defaultfieldnames = substr($defaultfieldnames,0,-1);
			$suggestedfieldnames = substr($suggestedfieldnames,0,-1);
			$suggestedfieldvalues = substr($suggestedfieldvalues,0,-1);

			$query = "UPDATE lsa_assessment_format_details SET isfirstrawfieldnames='".$this->isfirstrawfieldnames."',defaultfieldnames='".$defaultfieldnames."',suggestedfieldnames='".$suggestedfieldnames."'";
			$query .= ",suggestedfieldvalues='".$suggestedfieldvalues."',formatsaved='Y' WHERE project='".strtolower($this->project)."'";
			$dbquery = new dbquery($query,$connid);

			//echo $query;
			//echo "<br>".$defaultfieldnames."<br>".$suggestedfieldnames."<br>".$suggestedfieldvalues."<br>";

    	}
    	elseif($this->action == "Upload Assessment Data") // Step4 - Upload assessment data and save to database + Validations
    	{
    		$this->uploadfile($connid);
    	}

    	$query = "SELECT * FROM lsa_assessment_format_details WHERE project='".strtolower($this->project)."'";
		$dbquery = new dbquery($query,$connid);
		$count = $dbquery->numrows();
		//echo $count;
		if($count == 1) // If project is entered
		{
			$row = $dbquery->getrowarray();
			$this->formatsaved=$row['formatsaved'];
			//echo "<pre>";print_r ($row); echo "</pre>";
			$totalpapers = $row['totalpapers'];
			if($row['totalquestionsadded'] == 'N') // If totalquestions paperwise is not added
			{
				$output_string  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		   	 	$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='3'><b>Enter Following Details</b></td></tr>";
		   	 	$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><b>Paper</b></td><td align='center'><b>Paper Name</b></td><td align='center'><b>Total<br>Questions</b></td></tr>";
		   	 	for($i=1; $i<=$totalpapers; $i++)
		   	 	{
		   	 		$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'>P".$i."</td>";
		   	 		$output_string .= "<td align='center'>";
		   	 		//$output_string .= "<input type='text' name='papername".$i."' size='10'></td>";
		   	 		$output_string .= "<select name='papername".$i."'>";
		   	 		$output_string .= "<option value='Maths'>Maths</option><option value='English'>English</option><option value='Language'>Language</option>";
		   	 		$output_string .= "<option value='EVS'>EVS</option></select></td>";
		   	 		$output_string .= "<td align='center'><input type='text' name='TQ".$i."' size='2'></td></tr>";
		   	 	}
		   	 	$output_string .= "<tr bordercolor='#7EBDF1'><td align='center' colspan='3'>";
		   	 	$output_string .= "<input type='button' name='Go' value='Go' onclick='return savepaperwisetotalquestions(".$totalpapers.");'></td>";
		   	 	$output_string .= "</tr></table>";
		   	 	$output_string .= "<input type='hidden' name='totalpapers' value=".$totalpapers.">";
		   	 	return $output_string;
			}
			else // If totalquestions paperwise is added then get the format of file to upload basically field sequence and their possible values
			{
				//echo "Great";
		   	 	$output_string  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		   	 	$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='3'><b>Paperwise Details</b></td></tr>";
		   	 	$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><b>Paper</b></td><td align='center'><b>Paper Name</b></td><td align='center'><b>Total<br>Questions</b></td></tr>";
		   	 	for($i=1; $i<=$totalpapers; $i++)
		   	 	{
		   	 		$papername = "p".$i."_name";
    				$tq = "p".$i."_totalquestions";
		   	 		$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'>P".$i."</td><td align='center'>".$row[$papername]."</td><td align='center'>".$row[$tq]."</td></tr>";
		   	 	}
		   	 	$output_string .= "</table>";
		   	 	$output_string .= "<input type='hidden' name='totalpapers' value=".$totalpapers.">";
		   	 	if($row['formatsaved'] == 'N')
		   	 	{
		   	 		$fielddesc = "";
		   	 		$selectedfieldtable = "";
		   	 		for($i=1; $i<=$totalpapers; $i++)
			   	 	{
			   	 		$papername = "p".$i."_name";
	    				$tq = "p".$i."_totalquestions";
	    				$papercode = substr($row[$papername],0,1);

	    				$field = "Paper".$i." Absent";
	    				$suggestedfieldname = $row[$papername]." Absent";
	    				$formfieldname = "Paper".$i."Absent";

						array_push($this->masterfieldlist, str_replace(" ","-",$field));
						array_push($this->suggestedfieldlist, str_replace(" ","-",$suggestedfieldname));
						array_push($this->formfieldlist, str_replace(" ","-",$formfieldname));

						array_push($this->masterfieldlistcomments, $field);
						//$fielddesc .= "<tr><td align='center' colspan='4'>".$row[$papername]." questions from 1 to ".$row[$tq]."</td></tr>";
						$fielddesc = "Paper".$i." Q1 to Q".$row[$tq];
						$suggestedfielddescname = substr($row[$papername],0,1)."Q1 to ".substr($row[$papername],0,1)."Q".$row[$tq];
						$formfielddescname = substr($row[$papername],0,1)."Q1to".substr($row[$papername],0,1)."Q".$row[$tq];
						//echo $field."--".$suggestedfieldname."--".$formfieldname."<br>";
						//echo $fielddesc."--".$suggestedfielddescname."--".$formfielddescname."<br>";
						
						$possiblefieldvalue="";
						echo "<script>adddefaultfieldlist('".$field."','".$suggestedfieldname."','".$possiblefieldvalue."','".$formfieldname."')</script>";
						echo "<script>adddefaultfieldlist('".$fielddesc."','".$suggestedfielddescname."','".$possiblefieldvalue."','".$formfielddescname."')</script>";
			   	 	}
					
		   	 		$this->totalmasterfields = count($this->masterfieldlist);
			   	 	$masterfieldtable = $this->prepareMasterFieldTable();

			   	 	$buttonlist = "<image src='images/up_arrow.jpg' width='20' height='20' onclick='movefieldup()'><br><br>";
			   	 	$buttonlist .= "<image src='images/down_arrow.jpg'  width='20' height='20' onclick='movefielddown()'><br><br>";
			   	 	$buttonlist .= "<image src='images/delete_image.jpg'  width='20' hight='20' onclick='removefield()'>";

		   	 		$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		   	 		$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Specify Field Formats</b></td></tr>";
		   	 		$output_string .= "<tr bordercolor='#7EBDF1'><td valign='top'>".$masterfieldtable."</td>";
		   	 		$output_string .= "<td align='center'><image src='images/right_arrow.jpg' width='40' hight='20'></td>";
		   	 	    $output_string .= "<td valign='top'>";

		   	 	    $output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333' id='selectedfieldstable'>";
					$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Is first row of file having field names?</b>";
					$output_string .= "&nbsp;<input type='radio' name='isfirstrawfieldnames' value='Y' checked>Yes";
					$output_string .= "&nbsp;&nbsp;<input type='radio' name='isfirstrawfieldnames' value='N'>No</td></tr>";
		   	 	    $output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Selected Field Table</b></td></tr>";
					$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'>&nbsp;</td><td align='center'><b>Default Field<br>Name</b></td><td align='center'><b>Suggested Field<br>Name</b></td><td align='center' title='Enter allowed values which will show error if any other value entered'><b>Possible Values (Optional)<br><font color='#FF0000'>Comma (,) separated</font></b></td></tr>";
					$output_string .= "</table>";

					$output_string .= "</td><td align='center' valign='center'>".$buttonlist."</td></tr>";
		   	 		$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'colspan='4'><input type='button' name='Save Format' value='Save Format' onclick='return saveformat(".$totalpapers.");'></td></tr>";
		   	 		$output_string .= "</table>";
		   	 		//echo "Format not saved";
		   	 	}
		   	 	else
		   	 	{
		   	 		$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center' id='selectedfieldstable'>";
					$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Field Details</b></td></tr>";
					$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Is first row of file having field names?&nbsp;";
					if($row['isfirstrawfieldnames'] == "Y")
						$output_string .= "Yes";
					else
						$output_string .= "No";
					$output_string .= "</b></td></tr>";
					$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><b>Sr No</b></td><td align='center'><b>Default Field<br>Names</b></td><td align='center'><b>Suggested Field<br>Names</b></td><td align='center' title='Entered allowed values which will show error if any other value entered'><b>Possible Values (Optional)<br>Comma (,) separated</b></td></tr>";

					$defaultfieldsArray = explode("-",$row['defaultfieldnames']);
					$suggestedfieldnameArray = explode("-",$row['suggestedfieldnames']);
					$suggestedfieldvaluesArray = explode("-",$row['suggestedfieldvalues']);
					$totalfieldinformat = count($defaultfieldsArray);
					$srno=1;
					for($i=0; $i<$totalfieldinformat; $i++)
					{
						$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'>$srno</td><td align='center'>".$defaultfieldsArray[$i]."</td>";
						$output_string .= "<td align='center'>".$suggestedfieldnameArray[$i]."</td><td align='center'>".$suggestedfieldvaluesArray[$i]."</td></tr>";
						$srno++;
					}
					if($this->project!="ssa_unicef_chhattisgarh")
						$output_string .= "<tr bordercolor='#7EBDF1'><td align='center' colspan='4'><b><a href='javascript:editformat(\"".$this->project."\")'>Edit Format</a></b></td></tr>";
					$output_string .= "</table>";

					$output_string .= "<br>";
					$output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333' id='selectedfieldstable'>";
					$output_string .= "<tr bordercolor='7EBDF1'><td align='center' colspan='2' bgcolor='#A8D8FF'><b>Upload Assessment Data In CSV Format</b></td></tr>";
					$output_string .= "<tr bordercolor='7EBDF1'><td><b>Select round:</b></td>";
					$output_string .= "<td><select name='round'>";
					$output_string .= "<option value=''></option>";
					$roundsArray = $this->fetchProjectRounds($connid);
					$totalRounds = count($roundsArray);
					for($i=0; $i<$totalRounds; $i++)
					{
						$output_string .="<option value='".$roundsArray[$i]."'>".$roundsArray[$i]."</option>";
					}
					$output_string .= "</select></td></tr>";
					$output_string .= "<tr bordercolor='7EBDF1'><td><b>Select a file:</b></td><td><input type='file' name='uploadfilename'></td></tr>";
					$output_string .= "<tr bordercolor='7EBDF1'><td align='center' colspan='2'><input type='button' name='Upload File' value='Upload File' onclick='return uploaddata()'></td></tr>";
					$output_string .= "</table><br>";
					
					if($this->fileUploadMessage != "")
					{
						$output_string .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
						$output_string .= "<tr bordercolor='7EBDF1'><td align='center'><font color='#FF0000'><b>".$this->fileUploadMessage."</b></font></td></tr>";
						$output_string .= "</table>";
					}
		   	 	}
		   	 	return $output_string;
			}
		}
		else // If project is not entered
		{
			$output_string  = "<br><table style='border-collapse: collapse' align='center'>";
	   	 	$output_string .= "<tr bgcolor='#A8D8FF'><td><b>Each row of student data contains score of how may papers?:</b>&nbsp;";
	   	 	$output_string .= "<input type='text' size='2' name='totalpapers'>&nbsp;";
	   	 	$output_string .= "<input type='button' name='Go' value='Go' onclick='return entertotalpapers();'></td>";
	   	 	$output_string .= "</tr></table>";
	   	 	return $output_string;
		}
    }

    function fetchProjectRounds($connid)
	{
		$projectRoundNames = array();
		if($this->project=="aprest")
		{
			array_push($projectRoundNames,"Y5EL");
			array_push($projectRoundNames,"Y5HEL");
		}
		else 
		{
			$query = "SELECT roundyear FROM lsa_projects_rounds ORDER BY roundyear";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				array_push($projectRoundNames,$row["roundyear"]);
			}
		}
		return $projectRoundNames;
	}
	
	function unzipfile($zipfile,$filename,$timestamp)
	{
		$zip = zip_open($zipfile);
		if ($zip) 
		{
		    while ($zip_entry = zip_read($zip)) 
		    {
			    $fp = fopen(constant("UPLOADEDFILES").zip_entry_name($zip_entry), "w");
			    if (zip_entry_open($zip, $zip_entry, "r")) 
			    {
			      $buf = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
			      //echo "<br>".$fp."--".zip_entry_name($zip_entry)."<br>";
			      fwrite($fp,$buf);
			      zip_entry_close($zip_entry);
			      fclose($fp);
			    }
		  }
		  zip_close($zip);
		}
		else 
		{
			echo "File Not found";
		}
		
		$filename = constant("UPLOADEDFILES").substr($filename,0,-4).".csv";
		$newfilename = substr($filename,0,-4)."_".$timestamp.".csv";
		rename($filename,$newfilename);
		return $newfilename;
	}
    function uploadfile($connid)
	{
	    $filename = basename($_FILES['uploadfilename']['name']);				
		$extension = substr($filename,-3,3);
	   // echo $filename."AA: ".$extension; //exit;
		
	    $timestamp = date('YmdHis');
		$uploadfile = constant("UPLOADEDFILES").substr($filename,0,-4)."_".$timestamp.".".$extension;
		//echo "<br>".$uploadfile."<br>";
		
		if(move_uploaded_file($_FILES['uploadfilename']['tmp_name'], $uploadfile))
		{
		    $this->fileUploadMessage = "File uploaded successfully...\n";
		    
		    if($extension == "zip" || $extension == "ZIP")
		    {
		    	$uploadfile = $this->unzipfile($uploadfile,$filename,$timestamp);
		    }
		    // Code to import data from uploaded csv file starts here
   			
		    $query = "SELECT * FROM lsa_assessment_format_details WHERE project='".strtolower($this->project)."'";
		    $dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$totalpapers = $row['totalpapers'];
			$fieldsequenceArray = explode("-",$row["defaultfieldnames"]); 
			$totalfields = count($fieldsequenceArray);
			
			$tablename = $this->createTable($timestamp,$connid);	
			
			$insString = "INSERT INTO ".$tablename." (";
			$qno=1;
			$totalfieldscsv=0;
			//echo $totalfields."<br>";
			for($fi=0; $fi<$totalfields; $fi++)
			{
				$filefield = $fieldsequenceArray[$fi];
				$tablefield = $this->filetotablemappingArray[$filefield];
				
				if(substr($filefield,0,5) == "Paper" && substr($filefield,-6,6) == "Absent")
				{
					$paperno = substr($filefield,5,1);
					$field = "p".$paperno."Absent";
					$insString .= "".$field.",";
					$totalfieldscsv++;
				}
				elseif(substr($filefield,0,5) == "Paper" && substr($filefield,-6,6) != "Absent" && substr($filefield,0,9) != "Papercode")
				{
					$paperno = substr($filefield,5,1);
					$field = "p".$paperno."_totalquestions";
					$paper_totalquestions = $row[$field];
					for($pqno=1; $pqno<=$paper_totalquestions; $pqno++)
					{
						$insString .= "Q".$qno.",";
						$qno++;
						$totalfieldscsv++;
					}
				}
				else 
				{
					$insString .= $tablefield.",";
					$totalfieldscsv++;
				}
			}
			
			$insString = substr($insString,0,-1).")";	
		    $rowindex = 0;
    		$handle = fopen($uploadfile, "r");
    		
   			while(($arr = fgetcsv($handle, 2000, ",")) !== FALSE)
			{
				$valuesString = " VALUES (";
				if($rowindex == 0 && $totalfieldscsv != count($arr) && $row["isfirstrawfieldnames"] == "Y")
				{
					//echo $totalfieldscsv."--".count($arr);
					//exit;
					$this->fileUploadMessage = "Invalid field sequence or some fields are missing in CSV file...";
					return;
				}
				
				if($rowindex == 0 && $row["isfirstrawfieldnames"] == "Y")
				{
					$rowindex++; 	continue;
				}
				
				$inscheck=0;
	        	for($i=0; $i<$totalfieldscsv; $i++)
	        	{
	        		$valuesString .= "'".DoAddSlashes($arr[$i])."',";
	        		if(trim($arr[$i])!="0" && trim($arr[$i])!="")
	        			$inscheck=1;
	        	}
	        	
	        	$valuesString = substr($valuesString,0,-1);
	        	$valuesString .= ")";
	        	
	        	if($valuesString != " VALUES (" && $inscheck==1)
	        	{
	        		$insertQuery = $insString.$valuesString;
   					$dbqry = new dbquery($insertQuery,$connid);
   					$rowindex++;	
	        	}
   			}
   			if($row["isfirstrawfieldnames"] == "Y")
   				$rowindex = $rowindex - 1;

   			$dataValidationReport = $this->validateAssessmentData($this->project,$this->round,$tablename,$connid);
   			$this->saveFormatFileTableNames($row,$uploadfile,$tablename,$connid);
   			
   			if($this->iserrorfound == 1)
   			{
				$errorfile = "errorreports/error_".$timestamp.".htm";
   				$fp = fopen($errorfile,"w");
   				$erroreport  = "<table border=1 style='border-collapse: collapse' align='center'>";
				$erroreport .= "<tr bordercolor='7EBDF1'><td align='center'><font color='#FF0000'><b>Data upload failed because of following errors in data...</b></font></td></tr>";
				$erroreport .= "<tr bordercolor='7EBDF1'><td align='center'>".$dataValidationReport."</td></tr>";
				$erroreport .= "</table>";
   				fwrite($fp, $erroreport);
   				fclose($fp);
   				
   				$this->fileUploadMessage  = "<table border=1 style='border-collapse: collapse' align='center'>";
				$this->fileUploadMessage .= "<tr bordercolor='7EBDF1'><td align='center'><font color='#FF0000'><b>Some errors are there in data...</b></font></td></tr>";
				$this->fileUploadMessage .= "<tr bordercolor='7EBDF1'><td align='center'>";
				$this->fileUploadMessage .= "<a href='".$errorfile."'>Click Here To Download Error Report</a></td></tr>";
				$this->fileUploadMessage .= "</table>";
   				//$this->fileUploadMessage = $dataValidationReport;
   			}
			else   			
   				$this->fileUploadMessage .= "<br>".$rowindex." records inserted succussfully...";	   			
        	//echo $dataValidationReport;
   			// Code to import data from uploaded csv file ends here
		}
		else
		{
		    $this->fileUploadMessage = "Possible file upload attack!\n";
		}
	}
	
	function saveFormatFileTableNames($row,$filename,$tablename,$connid)
	{
		if($this->iserrorfound == 1)
			$iserror = "Y";
		else 
			$iserror = "N";
		
		$query = "INSERT INTO lsa_assessment_format_details_used SET project='".$row['project']."',roundyear='".$this->round."',totalpapers='".$row['totalpapers']."',";
		$query .= "p1_name='".$row['p1_name']."',p1_totalquestions='".$row['p1_totalquestions']."',";
		$query .= "p2_name='".$row['p2_name']."',p2_totalquestions='".$row['p2_totalquestions']."',";
		$query .= "p3_name='".$row['p3_name']."',p3_totalquestions='".$row['p3_totalquestions']."',";
		$query .= "p4_name='".$row['p4_name']."',p4_totalquestions='".$row['p4_totalquestions']."',";
		$query .= "p5_name='".$row['p5_name']."',p5_totalquestions='".$row['p5_totalquestions']."',";
		$query .= "fieldsequence='".$row['fieldsequence']."',isfirstrawfieldnames='".$row['isfirstrawfieldnames']."',";
		$query .= "totalquestionsadded='".$row['totalquestionsadded']."',formatsaved='".$row['formatsaved']."',";
		$query .= "defaultfieldnames='".$row['defaultfieldnames']."', suggestedfieldnames='".$row['suggestedfieldnames']."',";
		$query .= "suggestedfieldvalues='".$row['suggestedfieldvalues']."',filename='".$filename."',";
		$query .= "tablename='".$tablename."',iserror='".$iserror."'";
		
		//echo $query;
		$dbquery = new dbquery($query,$connid);
	}
	
	function validateAssessmentData($project,$round,$tablename,$connid)
	{
		$anscodeTable = "anscode_master_".$project;
		$super_condition = " WHERE roundyear='".$round."'";
		$errorreport = "<table border=1 style='border-collapse: collapse' align='center' width='100%'>";
		$errorreport .= "<tr bgcolor='#7EBDF1' bordercolor='#7EBDF1'><td colspan='4' align='center'><b>ERROR REPORT</b></td></tr>";
		$errorreport .= "</table><br>";
		$errorreport .= "<table border=1 style='border-collapse: collapse' align='center' width='100%'>";
		
		$master_query = "SELECT * FROM lsa_assessment_format_details WHERE project='".strtolower($project)."'";
		$master_dbquery = new dbquery($master_query,$connid);
		$master_row = $master_dbquery->getrowarray();
		
		$totalpapers = $master_row['totalpapers'];
		$defaultFieldsArray = explode("-",$master_row["defaultfieldnames"]); 
		$suggestedFieldsArray = explode("-",$master_row["suggestedfieldnames"]); 
		$suggestedFieldValuesArray = explode("-",$master_row["suggestedfieldvalues"]); 
		
		$totalfields = count($defaultFieldsArray);
		$schoolfield = ""; $sugg_schoolfield="";
		$serialfield = ""; $sugg_serialfield="";
		
		// Duplicate/Triplicate Errors starts here
		for($i=0; $i<count($this->commonfieldlist); $i++)
		{
			
			$field = str_replace("-"," ",$this->commonfieldlist[$i]);
			if(in_array($field,$defaultFieldsArray))
			{
				$pos = array_search($field,$defaultFieldsArray);
				if($i<3 && $schoolfield == "")
				{
					$schoolfield = strtolower(str_replace(" ","",$field));
					$sugg_schoolfield = $suggestedFieldsArray[$pos];
				}
				if($i>=3 && $serialfield == "")
				{
					$serialfield = strtolower(str_replace(" ","",$field));
					$sugg_serialfield = $suggestedFieldsArray[$pos];
				}
			}
		}
		
		$errorreport .= "<tr bordercolor='#7EBDF1' bgcolor='#A8D8FF'><td colspan='4' align='center'><b>ERROR TYPE: Duplicates/Triplicates</b></td></tr>";
		$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$sugg_schoolfield."</td><td>Class</td><td>".$sugg_serialfield."</td><td>Occurences</td></tr>";
		
		$query="SELECT COUNT(*),".$schoolfield.",class,".$serialfield." FROM $tablename GROUP BY ".$schoolfield.",Class,".$serialfield." HAVING COUNT(*)>1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$row[$schoolfield]."</td><td>".$row['class']."</td><td>".$row[$serialfield]."</td><td>".$row['COUNT(*)']."</td></tr>";
			$this->iserrorfound = 1;
		}
		// Duplicate/Triplicate Errors ends here
		
		// Error in sex field starts here 
		if(in_array("Sex",$defaultFieldsArray))
		{
			$field = "Sex";
			$pos = array_search($field,$defaultFieldsArray);
			$sugg_field = $suggestedFieldsArray[$pos];
			$sugg_field_values = $suggestedFieldValuesArray[$pos];
			if($sugg_field_values == "")
				$sugg_field_values_string = "'0','1'";
			else 
			{
				$sugg_field_array = explode(",",$sugg_field_values);
				for($j=0; $j<count($sugg_field_array); $j++)
				{
					$sugg_field_values_string .= "'".$sugg_field_array[$j]."',";
				}
				$sugg_field_values_string = substr($sugg_field_values_string,0,-1);
			}
			$errorreport .= "<tr bordercolor='#7EBDF1' bgcolor='#A8D8FF'><td colspan='4' align='center'><b>ERROR TYPE: Invalid ".$sugg_field." Field</b></td></tr>";
			$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$sugg_schoolfield."</td><td>Class</td><td>".$sugg_serialfield."</td><td>".$sugg_field."<br>(".str_replace("'","",$sugg_field_values_string).")</td></tr>";
			
			$query="SELECT * FROM $tablename WHERE sex NOT IN (".$sugg_field_values_string.")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$row[$schoolfield]."</td><td>".$row['class']."</td><td>".$row[$serialfield]."</td><td>".$row['sex']."</td></tr>";
				$this->iserrorfound = 1;
			}
		}
		// Error in sex field ends here 
		
		// Error in class field starts here
		$query="SELECT DISTINCT Class FROM ".$anscodeTable.$super_condition." ORDER BY Class";
		$dbquery = new dbquery($query,$connid);
		$classString = "";
		while($row = $dbquery->getrowarray())
		{
			$classString .= "'".$row['Class']."',";
		}
		$classString = substr($classString,0,-1);
		//echo $classString;
		$errorreport .= "<tr bordercolor='#7EBDF1' bgcolor='#A8D8FF'><td colspan='4' align='center'><b>ERROR TYPE: Invalid Class Field</b><br>Valid Classes: (".str_replace("'","",$classString).")</td></tr>";
		$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$sugg_schoolfield."</td><td>Class</td><td colspan='2'>".$sugg_serialfield."</td></tr>";
		
		$query="SELECT * FROM $tablename WHERE class NOT IN (".$classString.")";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$row[$schoolfield]."</td><td>".$row['class']."</td><td colspan='2'>".$row[$serialfield]."</td></tr>";
			$this->iserrorfound = 1;
		}
		// Error in class field ends here
		
		// Error in Absent field starts here
		for($i=1; $i<=$totalpapers; $i++)
		{
			$field = "Paper".$i." Absent";
			$dbfield = "p".$i."Absent";
			$sugg_field_values_string = "";
			$pos = array_search($field,$defaultFieldsArray);
			$sugg_field = $suggestedFieldsArray[$pos];
			$sugg_field_values = $suggestedFieldValuesArray[$pos];
			if($sugg_field_values == "")
				$sugg_field_values_string = "'0','1'";
			else 
			{
				$sugg_field_array = explode(",",$sugg_field_values);
				for($j=0; $j<count($sugg_field_array); $j++)
				{
					$sugg_field_values_string .= "'".$sugg_field_array[$j]."',";
				}
				$sugg_field_values_string = substr($sugg_field_values_string,0,-1);
			}
			
			$errorreport .= "<tr bordercolor='#7EBDF1' bgcolor='#A8D8FF'><td colspan='4' align='center'><b>ERROR TYPE: Invalid ".$sugg_field." Field</b></td></tr>";
			$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$sugg_schoolfield."</td><td>Class</td><td>".$sugg_serialfield."</td><td>".$sugg_field."<br>(".str_replace("'","",$sugg_field_values_string).")</td></tr>";
			
			$query="SELECT * FROM $tablename WHERE ".$dbfield." NOT IN (".$sugg_field_values_string.")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$row[$schoolfield]."</td><td>".$row['class']."</td><td>".$row[$serialfield]."</td><td>".$row[$dbfield]."</td></tr>";
				$this->iserrorfound = 1;
			}
		}
		$errorreport .= "</table><br>";
		// Error in Absent field ends here
		
		// Fetch paper order and paper details starts here
		$paperlist = array();
		$papernamelist = array();
		$papertotalquestions = array();
		$paperAbsentFieldValues = array();
		for($p=1; $p<=$totalpapers; $p++)
		{
			$field_totalquestion = "p".$p."_totalquestions";
			$totalquestions = $master_row[$field_totalquestion];
			$field = "Paper".$p." Q1 to Q".$totalquestions;
			$paperfield = "p".$p."_name";
			$pos = array_search($field,$defaultFieldsArray);
			$paperlist[$pos] = $field;
			$papernamelist[$pos] = $master_row[$paperfield];
			$papertotalquestions[$pos] = $totalquestions;
			
			$paperAbsentField = "Paper".$p." Absent";
			$pos1 = array_search($paperAbsentField,$defaultFieldsArray);
			$paperAbsentFieldValues[$pos] = $suggestedFieldValuesArray[$pos1];
		}
		ksort($paperlist);
		ksort($papernamelist);
		ksort($papertotalquestions);
		ksort($paperAbsentFieldValues);
		// Fetch paper order and paper details ends here
		
		/*echo "<pre>";
		print_r($suggestedFieldValuesArray);
		print_r ($paperlist);
		print_r ($papernamelist);
		print_r ($papertotalquestions);
		print_r ($paperAbsentFieldValues);
		echo "AA</pre>";*/
		
		// Student absent in paper yet answer code marked starts here
		$inner_qno=1;
		$inner_qnoup=1;
		$errorreport .= "<table border=1 style='border-collapse: collapse' align='center' width='100%'>";
		foreach ($papernamelist as $key => $value)
		{
			//echo $key."--".$value."--".$papertotalquestions[$key]."--".$paperlist[$key]."<br>";
			$papercode = substr($paperlist[$key],5,1);
			$absentvalues = $paperAbsentFieldValues[$key];
			if($absentvalues == "")
			{
				$p="0"; $a="1";
			}
			else 
			{
				$absentvaluesarray = explode(",",$absentvalues);
				$p=$absentvaluesarray[0]; $a=$absentvaluesarray[1];
			}
			
			$errorreport .= "<tr bordercolor='#7EBDF1' bgcolor='#A8D8FF'><td colspan='5' align='center'><b>ERROR TYPE: Student Absent in ".$papernamelist[$key]." Yet Anscodes Marked</b></td></tr>";
			$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$sugg_schoolfield."</td><td>Class</td><td>".$sugg_serialfield."</td><td>Qno</td><td>Answer Code</td></tr>";
			
			// Set 1 to 01 && 2 to 02 - Starts here
			for($qnoup=1; $qnoup<=$papertotalquestions[$key]; $qnoup++)
			{
				$upquery1 = "UPDATE ".$tablename." SET Q$inner_qnoup='01' WHERE Q$inner_qnoup='1'";
				$upquery2 = "UPDATE ".$tablename." SET Q$inner_qnoup='02' WHERE Q$inner_qnoup='2'";
				$upquery3 = "UPDATE ".$tablename." SET Q$inner_qnoup='03' WHERE Q$inner_qnoup='3'";
				
				//echo $upquery1."<br>";
				//echo $upquery2."<br>";
				
				$updbquery1 = new dbquery($upquery1,$connid);
				$updbquery2 = new dbquery($upquery2,$connid);
				$updbquery3 = new dbquery($upquery3,$connid);
				
				$inner_qnoup++;
			}
			// Set 1 to 01 && 2 to 02 - Ends here
			
			for($qno=1; $qno<=$papertotalquestions[$key]; $qno++)
			{
				$query = "SELECT * FROM ".$tablename." WHERE p".$papercode."Absent='$a' AND Q$inner_qno<>''";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$anscode = $row['Q'.$inner_qno];
					$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$row[$schoolfield]."</td><td>".$row['class']."</td><td>".$row[$serialfield]."</td><td>".$inner_qno."</td><td>".$anscode."</td></tr>";
					$this->iserrorfound = 1;
				}
				$inner_qno++;
			}
		}
		$errorreport .= "</table><br>";
		// Student absent in paper yet answer code marked ends here
		
		// Invalid code in any subject starts here
		$classArray = explode(",",$classString);
		$totalClasses = count($classArray);
		foreach ($papernamelist as $key => $value)
		{
			$papercode = substr($paperlist[$key],5,1);
			$papername = $value;

			//echo $papercode."--".$papername."<br>";
			for($ci=0; $ci<$totalClasses; $ci++)
			{
				$cls = $classArray[$ci];
				${$papername."QuesArr".$cls} = array();
				$query="SELECT Qno FROM ".$anscodeTable.$super_condition." AND Class=$cls AND Subject='".$papername."' ORDER BY Qno";
				$dbquery = new dbquery($query,$connid);
				while($user_row = $dbquery->getrowarray())
				{
					array_push(${$papername."QuesArr".$cls},$user_row['Qno']);
				}
				${$papername."QuesCount".$cls}=count(${$papername."QuesArr".$cls});
			}
		}
		
		$outer_qo=1;
		$errorreport .= "<table border=1 style='border-collapse: collapse' align='center'>";
		foreach ($papernamelist as $key => $value)
		{
			$papercode = substr($paperlist[$key],5,1);
			$papername = $value;
			$absentvalues = $paperAbsentFieldValues[$key];
			$errorreport .= "<tr bordercolor='#7EBDF1' bgcolor='#A8D8FF'><td colspan='6' align='center'><b>ERROR TYPE: Invalid code in ".$papername."</b></td></tr>";
			$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$sugg_schoolfield."</td><td>Class</td><td>".$sugg_serialfield."</td><td>Qno</td><td>Answer Code</td><td>Valid Code</td></tr>";
			if($absentvalues == "")
			{
				$p="0"; $a="1";
			}
			else 
			{
				$absentvaluesarray = explode(",",$absentvalues);
				$p=$absentvaluesarray[0]; $a=$absentvaluesarray[1];
			}
			//echo $papercode."--".$papername."<br>";
			$totstu = 0;
			$totcells = 0;
			$cellerr = 0;
			$pererr = 0.00;
			for($ci=0; $ci<$totalClasses; $ci++)
			{
				$cls = $classArray[$ci];
				$inner_qno = $outer_qo;
				
				$query = "SELECT COUNT(*) FROM ".$tablename." WHERE class=$cls AND p".$papercode."Absent='".$p."'";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				$totstu += $row['COUNT(*)'];
				$totcells += $totstu*${$papername."QuesCount".$cls};
					
				for($index=0;$index<${$papername."QuesCount".$cls};$index++)
		  		{
		  			$qno = ${$papername."QuesArr".$cls}[$index];
		  			$anscodesStr="";
		  			$query="SELECT * FROM ".$anscodeTable.$super_condition." AND Class=$cls AND Subject='".$papername."' AND Qno=$qno";
		  			//echo $query."<br>";
		  			$dbquery = new dbquery($query,$connid);
		  			$user_row = $dbquery->getrowarray();
	  				for($i=1;$i<=10;$i++)
	  				{
	  					if($user_row["ans_code$i"]!="")
	  						$anscodesStr.="'".$user_row["ans_code$i"]."',";
	  				}
	  				$anscodesStr=substr($anscodesStr,0,-1);
			
		  			$query="SELECT * FROM ".$tablename." WHERE class=$cls AND p".$papercode."Absent='".$p."' AND Q".$inner_qno." NOT IN ($anscodesStr)";
		  			//echo $query."<br>"; exit;
		  			$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray())
		  			{
		  				$anscode=$row["Q".$inner_qno];
						//$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$row[$schoolfield]."</td><td>".$row['class']."</td><td>".$row[$serialfield]."</td><td>".$inner_qno."</td><td>".$anscode."</td><td>".str_replace("'","",$anscodesStr)."</td></tr>";
						$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td>".$row[$schoolfield]."</td><td>".$row['class']."</td><td>".$row[$serialfield]."</td><td>".$qno."</td><td>".$anscode."</td><td>".str_replace("'","",$anscodesStr)."</td></tr>";
						$this->iserrorfound = 1;
						$cellerr++;
		  			}
  					$inner_qno++;
				}
			}
			$outer_qo += $papertotalquestions[$key];
			$pererr = round($cellerr*100/$totcells,2);
			$errorreport .= "<tr bordercolor='#7EBDF1' align='center'><td colspan='5'>% of Errors</td><td>".$pererr."</td></tr>";
		}
		$errorreport .= "</table><br>";
	  	// Invalid code in any subject ends here
		return $errorreport;
	}
	
    function prepareMasterFieldTable()
    {
    	$output_string = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center'><b>Master Field Table</b></td></tr>";
		for($mi=0; $mi<$this->totalmasterfields; $mi++)
		{
			$mastervalue = $this->masterfieldlist[$mi];
			$suggestedvalue = $this->suggestedfieldlist[$mi];
			$formfieldvalue = $this->formfieldlist[$mi];
			//echo $mastervalue."--".$suggestedvalue."--".$formfieldvalue."<br>";
			$output_string .= "<tr bordercolor='#7EBDF1'><td align='center' title='".str_replace("-"," ",$this->masterfieldlistcomments[$mi])."' ondblclick=addfield('$mastervalue','$suggestedvalue','$formfieldvalue')>".str_replace("-"," ",$this->masterfieldlist[$mi])."</td></tr>";
		}
		$output_string .= "</table>";
		return $output_string;
    }

    function prepareSelectedFieldTable()
    {
    	$output_string = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$output_string .= "<tr bgcolor='#DCDCDC' bordercolor='#7EBDF1'><td align='center' colspan='3'><b>Selected Field Table</b></td></tr>";
		$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><b>Default Field<br>Name</b></td><td align='center'><b>Suggested Field<br>Name</b></td><td align='center' title='Enter allowed values which will show error if any other value entered'><b>Possible<br>Values (Optional)</b></td></tr>";
		for($di=0; $di<$this->totaldefaultfields; $di++)
		{
			$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'>".$this->defaultfieldlist[$di]."</td>";
			$output_string .= "<td align='center'><input type='text' size='15' value='".$this->defaultfieldlist[$di]."'></td>";
			$output_string .= "<td align='center'><input type='text' size='15'></td></tr>";
		}
		return $output_string;
    }
    
    function pageResetUploadAssessmentDataFormat($connid)
    {
   	 	
    	if($this->action == "Reset Format")
    	{
    		$query = "DELETE FROM lsa_assessment_format_details WHERE project='".strtolower($this->project)."'";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			$url = "http://".constant("DOMAIN")."/lsa/lsa_uploadassessmentdata.php?project=".$this->project;
			echo "<script>javascript: redirectPage('".$url."')</script>";
   	 		
    	}
    	$query = "SELECT * FROM lsa_assessment_format_details WHERE project='".strtolower($this->project)."'";
		//echo $query;
   	 	$dbquery = new dbquery($query,$connid);
		$count = $dbquery->numrows();
		$output_string = "";
		if($count == 1) // If project is entered
		{
			$row = $dbquery->getrowarray();
			$this->formatsaved=$row['formatsaved'];
			$totalpapers = $row['totalpapers'];	
		
	    	$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center' id='selectedfieldstable'>";
			$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Field Details</b></td></tr>";
			$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='4'><b>Is first row of file having field names?&nbsp;";
			if($row['isfirstrawfieldnames'] == "Y")
				$output_string .= "Yes";
			else
				$output_string .= "No";
			$output_string .= "</b></td></tr>";
			$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'><b>Sr No</b></td><td align='center'><b>Default Field<br>Names</b></td><td align='center'><b>Suggested Field<br>Names</b></td><td align='center' title='Entered allowed values which will show error if any other value entered'><b>Possible Values (Optional)<br>Comma (,) separated</b></td></tr>";
	
			$defaultfieldsArray = explode("-",$row['defaultfieldnames']);
			$suggestedfieldnameArray = explode("-",$row['suggestedfieldnames']);
			$suggestedfieldvaluesArray = explode("-",$row['suggestedfieldvalues']);
			$totalfieldinformat = count($defaultfieldsArray);
			$srno=1;
			for($i=0; $i<$totalfieldinformat; $i++)
			{
				$output_string .= "<tr bordercolor='#7EBDF1'><td align='center'>$srno</td><td align='center'>".$defaultfieldsArray[$i]."</td>";
				$output_string .= "<td align='center'>".$suggestedfieldnameArray[$i]."</td><td align='center'>".$suggestedfieldvaluesArray[$i]."</td></tr>";
				$srno++;
			}
			$output_string .= "<tr bordercolor='7EBDF1'><td align='center' colspan='4'><input type='button' name='Reset Format' value='Reset Format' onclick='return resetformat()'></td></tr>";
			$output_string .= "</table><br>";
		}
	   	return $output_string;
    }
    
    function pageViewUploadedFiles($connid)
    {
		if($this->action == "Delete File")
		{
			if (file_exists($this->filename)) 
			{
			   unlink($this->filename);
			}
			   
			$err_filename = "errorreports/error_".substr($this->tablename,-14,14).".htm";
			if (file_exists($err_filename)) 
			{
			   unlink($err_filename);
			}
			
			$query = "DROP TABLE ".$this->tablename;
   	 		$dbquery = new dbquery($query,$connid);
   	 		
   	 		$query = "DELETE FROM lsa_assessment_format_details_used WHERE filename='".$this->filename."' AND tablename='".$this->tablename."'";
   	 		$dbquery = new dbquery($query,$connid);
		}
		
    	$srno = 1;
    	$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'><td align='center' colspan='7'><b>Details About Uploaded Files</b></td></tr>";
		$output_string .= "<tr bgcolor='#A8D8FF' bordercolor='#7EBDF1'>";
		$output_string .= "<td align='center'><b>Sr. No.</b></td><td align='center'><b>File Name</b></td><td align='center'><b>Total Records</b></td><td align='center'><b>Uploaded On</b></td>";
		$output_string .= "<td align='center'><b>Errors?</b></td><td align='center'><b>Action</b></td><td align='center'><b>Round</b></td></tr>";
    	$query = "SELECT * FROM lsa_assessment_format_details_used WHERE project='".$this->project."'";
    	$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$filename_org = $row['filename'];
			$tablename_org = $row['tablename'];
			//echo $filename_org."--".$tablename_org."<br>";
			
			$filename = $row['filename'];
			$filepath = "http://".constant("DOMAIN")."/lsa/".$filename;
			$timestamp = substr($filename,-18,-4);
			$timedate = $this->convert_timestamptotimedate($timestamp);			
			
			$tablename = "lsa_assessmentdata_".$this->project."_".$timestamp;
			$countquery = "SELECT COUNT(*) AS totalrecords FROM ".$tablename;
	    	$countdbquery = new dbquery($countquery,$connid);
			$countrow = $countdbquery->getrowarray();
			
			$filename = substr($filename,14,-18);
			$len = strlen($filename);
			if(strrpos($filename,"_") == $len-1)
				$filename = substr($filename,0,$len-1);
			$filename = $filename.".csv";
			
			if($row['iserror'] == "Y")
				$iserrors = "YES";
			else 
				$iserrors = "NO";
			
			if($iserrors == "NO")
				$output_string .= "<tr bgcolor='#A8D8FF'>";
			else
				$output_string .= "<tr>";
			$output_string .= "<td align='center'>".$srno."</td><td>".$filename."</td><td align='center'>".$countrow['totalrecords']."</td><td align='center'>".$timedate."</td>";
			$output_string .= "<td align='center'>".$iserrors."</b></td>";
			
			if($row['iserror'] == "Y")
			{
				$errorreport = "http://".constant("DOMAIN")."/lsa/errorreports/error_".$timestamp.".htm";
				$output_string .= "<td><a href='".$filepath."'>Download</a>&nbsp;&nbsp;<a href='javascript: deletefile(\"".$filename_org."\",\"".$tablename_org."\")'>Delete</a>&nbsp&nbsp;<a href='".$errorreport."'>Show Error Report</a></td>";
			}
			else 
			{
				$output_string .= "<td><a href='".$filepath."'>Download</a>&nbsp;&nbsp;<a href='javascript: deletefile(\"".$filename_org."\",\"".$tablename_org."\")'>Delete</a></td>";
			}
			
			$output_string .= "<td align='center'>".$row['roundyear']."</a></td>";
			$output_string .="</tr>";
			$srno++;
		}
		$output_string .= "</table>";
		return $output_string;
    }
    
    function pageLoadUploadedDataAPRESt($srcTable,$destTable,$connid)
    {
    	$insert_string = "INSERT INTO ".$destTable." (";
    	$query = "SELECT * FROM lsa_assessment_format_details_used WHERE tablename = '$srcTable'";
    	$dbquery = new dbquery($query,$connid);
		$format_row = $dbquery->getrowarray();
		$totalpapers = $format_row['totalpapers'];
		$fieldsequence = $format_row['defaultfieldnames'];
		$fieldsequenceArray = explode("-",$fieldsequence);
		$totalfields = count($fieldsequenceArray);
		for($i=0; $i<$totalfields; $i++)
		{
			if(array_key_exists($fieldsequenceArray[$i],$this->filetotablemappingArrayAPRESt))
			{
				$insert_string .= $this->filetotablemappingArrayAPRESt[$fieldsequenceArray[$i]].",";
			}
		}
		
 		for($i=1; $i<=$totalpapers; $i++)
 		{
	 		$papername_str = "p".$i."_name";
			$tq_str = "p".$i."_totalquestions";
			
			$papername = $format_row[$papername_str];
			$tq = $format_row[$tq_str];
			
			if($papername == "Language")
				$papername = "Telugu";
			
			if($papername == "English")
				$papercode = "N";
			else
				$papercode = substr($papername,0,1);
			
			$insert_string .= $papername."Absent,";
			for($qno=1; $qno<=$tq; $qno++)
			{
				$insert_string .= $papercode."Q".$qno.",";
			}
   	 	}
		$insert_string = substr($insert_string,0,-1).") ";	
		//echo $insert_string."<br><br>"; //exit;
		echo "Students Entered:<br><br>";
		$studentsentered = 0;
		$query = "SELECT * FROM ".$srcTable;
		$dbquery = new dbquery($query,$connid);
		while($srcRow = $dbquery->getrowarray())
		{
			//$this->filetotablemappingArray = array("projectType"=>"projectType","School Code1"=>"schoolcode1","School Code2"=>"schoolcode2","School Code3"=>"schoolcode3","Unique_student_code"=>"unique_student_code","School Name"=>"schoolname","Class"=>"class","Serial1"=>"serial1","RollNo"=>"rollno","Serial2"=>"serial2","Sex"=>"sex","Name1"=>"name1","Name2"=>"name2","Medium"=>"medium","State"=>"state","Town"=>"town","District"=>"district","Block"=>"block","Cluster"=>"cluster","EvaluatorCode"=>"evaluatorcode","EvaluatorCode1"=>"evaluatorcode1","Batch"=>"batch","projectType"=>"projecttype","Day"=>"Day","Month"=>"Month","Year"=>"Year","Papercode1"=>"papercode1","Papercode2"=>"papercode2","Date1"=>"date1","Date2"=>"date2");
			//$this->filetotablemappingArrayAPRESt = array("projectType"=>"projectType","School Code1"=>"APFSchoolCode","Unique_student_code"=>"unique_student_code","Class"=>"Class","Serial1"=>"SrNo","Sex"=>"Sex","Name1"=>"Name","Name2"=>"Name1","EvaluatorCode"=>"EvaluatorCode");
		
			$question_no = 1;
			$values_string = " VALUES (";
			for($i=0; $i<$totalfields; $i++)
			{
				if(array_key_exists($fieldsequenceArray[$i],$this->filetotablemappingArrayAPRESt))
				{
					$key = $this->filetotablemappingArray[$fieldsequenceArray[$i]];
					//echo "<br>AAA: ".$key."<br>";
					
					if($key == "unique_student_code")
					{
						$key = "Unique_Student_Code";
						//echo "<br>BBB: ".$key."<br>";
					}
					$values_string .= "'".str_replace("'","",$srcRow[$key])."',";
				}
			}
			
			for($i=1; $i<=$totalpapers; $i++)
	 		{
	 			$paperabsent_str = "p".$i."Absent";
				$tq_str = "p".$i."_totalquestions";
				$tq = $format_row[$tq_str];
				
				$values_string .= $srcRow[$paperabsent_str].",";
				for($qno=1; $qno<=$tq; $qno++)
				{
					$qno_str = "Q".$question_no;
					$values_string .= "'".$srcRow[$qno_str]."',";
					$question_no++;
				}
	   	 	}
	   	 	
			$values_string = substr($values_string,0,-1).")";
			$insert_query = $insert_string.$values_string;
			$ins_dbquery = new dbquery($insert_query,$connid);
			$studentsentered++;
			echo $studentsentered."<br>";
			//echo $insert_query."<br><br>"; exit;
		}
    }
    
    function pageLoadUploadedDataSSACG($srcTable,$destTable,$connid)
    {
    	$insert_string = "INSERT INTO ".$destTable." (";
    	$query = "SELECT * FROM lsa_assessment_format_details_used WHERE tablename = '$srcTable'";
    	$dbquery = new dbquery($query,$connid);
		$format_row = $dbquery->getrowarray();
		$totalpapers = $format_row['totalpapers'];
		$fieldsequence = $format_row['defaultfieldnames'];
		$fieldsequenceArray = explode("-",$fieldsequence);
		$totalfields = count($fieldsequenceArray);
		for($i=0; $i<$totalfields; $i++)
		{
			if(array_key_exists($fieldsequenceArray[$i],$this->filetotablemappingArraySSACG2))
			{
				$insert_string .= $this->filetotablemappingArraySSACG2[$fieldsequenceArray[$i]].",";
			}
		}
		
 		for($i=1; $i<=$totalpapers; $i++)
 		{
	 		$papername_str = "p".$i."_name";
			$tq_str = "p".$i."_totalquestions";
			
			$papername = $format_row[$papername_str];
			$tq = $format_row[$tq_str];
			
			if($papername == "English")
				$papercode = "N";
			else
				$papercode = substr($papername,0,1);
			
			$insert_string .= $papername."Absent,";
			for($qno=1; $qno<=$tq; $qno++)
			{
				$insert_string .= $papercode."Q".$qno.",";
			}
   	 	}
		$insert_string = substr($insert_string,0,-1).") ";	
		//echo $insert_string."<br><br>"; //exit;
		echo "Students Entered:<br><br>";
		$studentsentered = 0;
		$query = "SELECT * FROM ".$srcTable;
		$dbquery = new dbquery($query,$connid);
		while($srcRow = $dbquery->getrowarray())
		{
			//$this->filetotablemappingArraySSACG1 = array("School Code1"=>"schoolcode1","School Name"=>"schoolname","Class"=>"class","Serial1"=>"serial1","Sex"=>"sex","Name1"=>"name1","State"=>"state","District"=>"district","Block"=>"block","Cluster"=>"cluster","EvaluatorCode"=>"evaluatorcode","EvaluatorCode1"=>"evaluatorcode1","Papercode1"=>"papercode1","Papercode2"=>"papercode2","Date1"=>"date1","Date2"=>"date2");
			//$this->filetotablemappingArraySSACG2 = array("State"=>"state","District"=>"district","Block"=>"block","Cluster"=>"cluster","School Code1"=>"schoolcode","School Name"=>"schoolname","Class"=>"class","Serial1"=>"srno","Sex"=>"gender","Name1"=>"name","EvaluatorCode"=>"evaluatorcode","EvaluatorCode1"=>"evaluatorcode1","Papercode1"=>"papercode1","Papercode2"=>"papercode2","Date1"=>"date1","Date2"=>"date2");
			
			$question_no = 1;
			$values_string = " VALUES (";
			for($i=0; $i<$totalfields; $i++)
			{
				if(array_key_exists($fieldsequenceArray[$i],$this->filetotablemappingArraySSACG2))
				{
					$key = $this->filetotablemappingArraySSACG1[$fieldsequenceArray[$i]];
					//echo "<br>AAA: ".$key."<br>";
					
					if($key == "unique_student_code")
					{
						$key = "Unique_Student_Code";
						//echo "<br>BBB: ".$key."<br>";
					}
					$values_string .= "'".str_replace("'","",$srcRow[$key])."',";
				}
			}
			
			for($i=1; $i<=$totalpapers; $i++)
	 		{
	 			$paperabsent_str = "p".$i."Absent";
				$tq_str = "p".$i."_totalquestions";
				$tq = $format_row[$tq_str];
				
				if($srcRow[$paperabsent_str] == "P")
					$values_string .= "'0',";
				else if($srcRow[$paperabsent_str] == "A")
					$values_string .= "'1',";
				else
					$values_string .= "'',";
					
				for($qno=1; $qno<=$tq; $qno++)
				{
					$qno_str = "Q".$question_no;
					$values_string .= "'".$srcRow[$qno_str]."',";
					$question_no++;
				}
	   	 	}
	   	 	
			$values_string = substr($values_string,0,-1).")";
			$insert_query = $insert_string.$values_string;
			$ins_dbquery = new dbquery($insert_query,$connid);
			$studentsentered++;
			//echo $studentsentered."<br>";
			//echo $insert_query."<br><br>"; exit;
		}
    }
    
    function convert_timestamptotimedate($timestamp)
    {
    	$year = substr($timestamp,0,4);
    	$month = substr($timestamp,4,2);
    	$day = substr($timestamp,6,2);
    	
    	$hours = substr($timestamp,8,2);
    	$mins = substr($timestamp,10,2);
    	$seconds = substr($timestamp,12,2);
    	
    	$timedate = $day."-".$month."-".$year."&nbsp;&nbsp;".$hours.":".$mins.":".$seconds;
    	return $timedate;
    }
    
    function createTable($timestamp,$connid)
    {
    	//$timestamp = date('YmdHis');
    	$tablename = "lsa_assessmentdata_".strtolower($this->project)."_".$timestamp;

    	$query = "create table ".$tablename."(
    			schoolcode1 varchar(15),
				schoolcode2 varchar(15),
				schoolcode3 varchar(15),
				schoolname varchar(100),
				Unique_Student_Code varchar(10),
				class varchar(5) default NULL,
				serial1 smallint(4),
				rollno smallint(4),
				serial2 smallint(4),
				sex varchar(5),
				name1 varchar(50),
				name2 varchar(50),
				Day varchar(2),
				Month varchar(10),
				Year varchar(4),
				medium varchar(15),
				state varchar(50),
				town varchar(50),
				district varchar(50),
				block varchar(50),
				cluster varchar(50),
				evaluatorcode varchar(5),
				evaluatorcode1 varchar(5),
				batch varchar(6),
				projecttype varchar(25),
				p1Absent varchar(2),
				p2Absent varchar(2),
				p3Absent varchar(2),
				p4Absent varchar(2),
				p5Absent varchar(2),
				papercode1 varchar(15),
				papercode2 varchar(15),
				date1 varchar(15),
				date2 varchar(15),
				Q1 char(2),
				Q2 char(2),
				Q3 char(2),
				Q4 char(2),
				Q5 char(2),
				Q6 char(2),
				Q7 char(2),
				Q8 char(2),
				Q9 char(2),
				Q10 char(2),
				Q11 char(2),
				Q12 char(2),
				Q13 char(2),
				Q14 char(2),
				Q15 char(2),
				Q16 char(2),
				Q17 char(2),
				Q18 char(2),
				Q19 char(2),
				Q20 char(2),
				Q21 char(2),
				Q22 char(2),
				Q23 char(2),
				Q24 char(2),
				Q25 char(2),
				Q26 char(2),
				Q27 char(2),
				Q28 char(2),
				Q29 char(2),
				Q30 char(2),
				Q31 char(2),
				Q32 char(2),
				Q33 char(2),
				Q34 char(2),
				Q35 char(2),
				Q36 char(2),
				Q37 char(2),
				Q38 char(2),
				Q39 char(2),
				Q40 char(2),
				Q41 char(2),
				Q42 char(2),
				Q43 char(2),
				Q44 char(2),
				Q45 char(2),
				Q46 char(2),
				Q47 char(2),
				Q48 char(2),
				Q49 char(2),
				Q50 char(2),
				Q51 char(2),
				Q52 char(2),
				Q53 char(2),
				Q54 char(2),
				Q55 char(2),
				Q56 char(2),
				Q57 char(2),
				Q58 char(2),
				Q59 char(2),
				Q60 char(2),
				Q61 char(2),
				Q62 char(2),
				Q63 char(2),
				Q64 char(2),
				Q65 char(2),
				Q66 char(2),
				Q67 char(2),
				Q68 char(2),
				Q69 char(2),
				Q70 char(2),
				Q71 char(2),
				Q72 char(2),
				Q73 char(2),
				Q74 char(2),
				Q75 char(2),
				Q76 char(2),
				Q77 char(2),
				Q78 char(2),
				Q79 char(2),
				Q80 char(2),
				Q81 char(2),
				Q82 char(2),
				Q83 char(2),
				Q84 char(2),
				Q85 char(2),
				Q86 char(2),
				Q87 char(2),
				Q88 char(2),
				Q89 char(2),
				Q90 char(2),
				Q91 char(2),
				Q92 char(2),
				Q93 char(2),
				Q94 char(2),
				Q95 char(2),
				Q96 char(2),
				Q97 char(2),
				Q98 char(2),
				Q99 char(2),
				Q100 char(2),
				Q101 char(2),
				Q102 char(2),
				Q103 char(2),
				Q104 char(2),
				Q105 char(2),
				Q106 char(2),
				Q107 char(2),
				Q108 char(2),
				Q109 char(2),
				Q110 char(2),
				Q111 char(2),
				Q112 char(2),
				Q113 char(2),
				Q114 char(2),
				Q115 char(2),
				Q116 char(2),
				Q117 char(2),
				Q118 char(2),
				Q119 char(2),
				Q120 char(2),
				Q121 char(2),
				Q122 char(2),
				Q123 char(2),
				Q124 char(2),
				Q125 char(2),
				Q126 char(2),
				Q127 char(2),
				Q128 char(2),
				Q129 char(2),
				Q130 char(2),
				Q131 char(2),
				Q132 char(2),
				Q133 char(2),
				Q134 char(2),
				Q135 char(2),
				Q136 char(2),
				Q137 char(2),
				Q138 char(2),
				Q139 char(2),
				Q140 char(2),
				Q141 char(2),
				Q142 char(2),
				Q143 char(2),
				Q144 char(2),
				Q145 char(2),
				Q146 char(2),
				Q147 char(2),
				Q148 char(2),
				Q149 char(2),
				Q150 char(2),
				Q151 char(2),
				Q152 char(2),
				Q153 char(2),
				Q154 char(2),
				Q155 char(2),
				Q156 char(2),
				Q157 char(2),
				Q158 char(2),
				Q159 char(2),
				Q160 char(2),
				Q161 char(2),
				Q162 char(2),
				Q163 char(2),
				Q164 char(2),
				Q165 char(2),
				Q166 char(2),
				Q167 char(2),
				Q168 char(2),
				Q169 char(2),
				Q170 char(2),
				Q171 char(2),
				Q172 char(2),
				Q173 char(2),
				Q174 char(2),
				Q175 char(2),
				Q176 char(2),
				Q177 char(2),
				Q178 char(2),
				Q179 char(2),
				Q180 char(2),
				Q181 char(2),
				Q182 char(2),
				Q183 char(2),
				Q184 char(2),
				Q185 char(2),
				Q186 char(2),
				Q187 char(2),
				Q188 char(2),
				Q189 char(2),
				Q190 char(2),
				Q191 char(2),
				Q192 char(2),
				Q193 char(2),
				Q194 char(2),
				Q195 char(2),
				Q196 char(2),
				Q197 char(2),
				Q198 char(2),
				Q199 char(2),
				Q200 char(2));";

    	//echo "<br><br>".$query;
		$dbquery = new dbquery($query,$connid);
		return $tablename;
    }
}
?>