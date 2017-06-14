<?php

class clslsarawscoredata
{
	var $project;
	var $project_other;
	var $class;
	var $category;
	var $subject;
	var $totalquestions;
	var $action;
	var $qno;
	var $qcode;
	var $suggestedqno;
	var $totalvaliddescriptions;
	var $descriptions;
	var $anscodes;
	var $marks;
	var $roundyear;
	var $roundyear_other;
	var $mcq;
	var $inputmarks;
	var $optionselected;
	var $totaloptions;
	var $qnotoedit;
	var $pagetoreturn;
	var $comments;
	var $papercode;
	var $sfnsf;

	/*var $invalidanscode_desc;
	var $invalidanscode_anscode;
	var $invalidanscode_marks;*/

	var $notattempted_desc;
	var $notattempted_anscode;
	var $notattempted_marks;

	var $morethanoneoptionticked_desc;
	var $morethanoneoptionticked_anscode;
	var $morethanoneoptionticked_marks;
	var $imagefolder;
	var $skillblueprintmsg;
	var $skillblueprintno;
	var $skillblueprintbreakupno;
	var $skillblueprintno_from;
	var $subjectsarray;
	var $classesarray;
	var $subjectswithcontentarea;
	var $categoryarray;
	var $totalsubjects;
	var $totalclasses;
	var $totalcategories;
	var $classsubjectmatrix;
	var $paperdetails;
	var $tblselected;
	var $subjectasset;
	var $classasset;
	var $roundyearasset;
	var $irproject1;
	var $irroundyear1;
	var $irclasses1;
	var $srno;
	var $username;
	var $vernacularversions;
	var $totalvernacularversions;
	var $passageid;
	var $subjectda;
	var $classda;
	var $issearchverna;
	var $keyword;
	var $medium;

	function clslsarawscoredata()
	{
		$this->project="";
		$this->project_other="";
		$this->class="";
		$this->category="";
		$this->subject="";
		$this->totalquestions=0;
		$this->action="";
		$this->qno=0;
		$this->qcode=0;
		$this->suggestedqno="";
		$this->totalvaliddescriptions=0;
		$this->descriptions = array();
		$this->anscodes = array();
		$this->marks = array();
		$this->roundyear="";
		$this->roundyear_other="";
		$this->mcq="";
		$this->inputmarks="";
		$this->optionselected="";
		$this->totaloptions="";
		$this->qnotoedit=0;
		$this->pagetoreturn="";
		$this->comments="";
		$this->papercode="";
		$this->sfnsf="";
		$this->irproject1="";
		$this->irroundyear1="";
		$this->irclasses1="";

		/*$this->invalidanscode_desc="Invalid Answer Code";
		$this->invalidanscode_anscode="87";
		$this->invalidanscode_marks="0.00";*/

		$this->notattempted_desc="Not Attempted";
		$this->notattempted_anscode="88";
		$this->notattempted_marks="0.00";

		$this->morethanoneoptionticked_desc="Invalid Answer Code/More Than One Option Ticked";
		$this->morethanoneoptionticked_anscode="86";
		$this->morethanoneoptionticked_marks="0.00";
		$this->imagefolder = "images/questionimages/";
		$this->skillblueprintmsg="";
		$this->skillblueprintno=0;
		$this->skillblueprintbreakupno=0;
		$this->skillblueprintno_from=0;
		$this->subjectsarray = array('Maths','Maths Oral','Language','Language Oral','English','EVS','Reception','Production','SS','General Ability','Science','Social Studies','Civics Content','Civics Pedagogy','History','History Content','History Pedagogy','Geography','Geography Content','Geography Pedagogy','Physics','Chemistry','Biology');
		$this->classesarray = array('UKG','1','2','3','4','5','6','7','8','9','10');
		$this->subjectswithcontentarea = array('EVS','SS','Civics Content','Civics Pedagogy','History Content','History Pedagogy','Geography Content','Geography Pedagogy');
		$this->categoryarray = array('Baseline','Midline','Endline','Higher Endline');
		$this->totalsubjects = count($this->subjectsarray);
		$this->totalclasses = count($this->classesarray);
		$this->totalcategories = count($this->categoryarray);
		$this->classsubjectmatrix = array();
		$this->paperdetails = array();
		$this->tblselected="";
		$this->subjectasset="";
		$this->classasset="";
		$this->roundyearasset="";
		$this->srno=0;
		$this->username="";
		$this->vernacularversions = array("Assamese","Bengali","Gujarati","Hindi","Kannada","Malayalam","Marathi","Oriya","Punjabi","Tamil","Telugu","Urdu");
		$this->totalvernacularversions = count($this->vernacularversions);
		$this->passageid = '';
		$this->subjectda = '';
		$this->classda = '';
		$this->issearchverna = '';
		$this->keyword = '';
		$this->medium = '';
  	}

  	function setgetvars()
	{
		if(isset($_GET["project"])) $this->project   								= $_GET["project"];
		if(isset($_GET["project_other"])) $this->project_other   					= str_replace(" ","",ucwords($_GET["project_other"]));
		if(isset($_GET["classes"])) $this->class                    				= $_GET["classes"];
		if(isset($_GET["category"])) $this->category                    			= $_GET["category"];
		if(isset($_GET["subject"])) $this->subject                    				= $_GET["subject"];
		if(isset($_GET["roundyear"])) $this->roundyear                    			= $_GET["roundyear"];
		if(isset($_GET["roundyear_other"])) $this->roundyear_other		      		= $_GET["roundyear_other"];
		if(isset($_GET["actiontoperform"])) $this->action          					= $_GET["actiontoperform"];
		if(isset($_GET["qnotoedit"])) $this->qnotoedit          					= $_GET["qnotoedit"];
		if(isset($_GET["pagetoreturn"])) $this->pagetoreturn          				= $_GET["pagetoreturn"];
		if(isset($_GET["papercode"])) $this->papercode	          					= $_GET["papercode"];
		if(isset($_GET["totalquestions"])) $this->totalquestions       				= $_GET["totalquestions"];
		if(isset($_GET["qcode"])) $this->qcode          							= $_GET["qcode"];
		if(isset($_GET["skillblueprintno"])) $this->skillblueprintno          		= $_GET["skillblueprintno"];
		if(isset($_GET["skillblueprintbreakupno"])) $this->skillblueprintbreakupno  = $_GET["skillblueprintbreakupno"];
		if(isset($_GET["skillblueprintno_from"])) $this->skillblueprintno_from      = $_GET["skillblueprintno_from"];
		if(isset($_GET["subjectasset"])) $this->subjectasset                    	= $_GET["subjectasset"];
		if(isset($_GET["srno"])) $this->srno                    					= $_GET["srno"];
		if(isset($_GET["passageid"])) $this->passageid                    			= $_GET["passageid"];
		if(isset($_GET["subjectda"])) $this->subjectda                  			= $_GET["subjectda"];
		if(isset($_GET["medium"])) $this->medium                  					= $_GET["medium"];
		if(isset($_GET["qno"])) $this->qno          								= $_GET["qno"];
	}

	function setpostvars()
	{
		if(isset($_POST["project"])) $this->project   								= $_POST["project"];
		if(isset($_POST["project_other"])) $this->project_other   					= str_replace(" ","",ucwords($_POST["project_other"]));
		if(isset($_POST["classes"])) $this->class                    				= $_POST["classes"];
		if(isset($_POST["category"])) $this->category                    			= $_POST["category"];
		if(isset($_POST["subject"])) $this->subject                    				= $_POST["subject"];
		if(isset($_POST["roundyear"])) $this->roundyear                    			= $_POST["roundyear"];
		if(isset($_POST["roundyear_other"])) $this->roundyear_other			        = $_POST["roundyear_other"];
		if(isset($_POST["totalquestions"])) $this->totalquestions       			= $_POST["totalquestions"];
		if(isset($_POST["actiontoperform"])) $this->action          				= $_POST["actiontoperform"];
		if(isset($_POST["qno"])) $this->qno          								= $_POST["qno"];
		if(isset($_POST["qcode"])) $this->qcode          							= $_POST["qcode"];
		if(isset($_POST["suggestedqno"])) $this->suggestedqno          				= $_POST["suggestedqno"];
		if(isset($_POST["totalvaliddescriptions"])) $this->totalvaliddescriptions	= $_POST["totalvaliddescriptions"];
		if(isset($_POST["mcq"])) $this->mcq          								= $_POST["mcq"];
		if(isset($_POST["inputmarks"])) $this->inputmarks          					= $_POST["inputmarks"];
		if(isset($_POST["option"])) $this->optionselected          					= $_POST["option"];
		if(isset($_POST["totaloptions"])) $this->totaloptions          				= $_POST["totaloptions"];
		if(isset($_POST["qnotoedit"])) $this->qnotoedit          					= $_POST["qnotoedit"];
		if(isset($_POST["pagetoreturn"])) $this->pagetoreturn          				= $_POST["pagetoreturn"];
		if(isset($_POST["comments"])) $this->comments	          					= $_POST["comments"];
		if(isset($_POST["papercode"])) $this->papercode	          					= $_POST["papercode"];
		if(isset($_POST["sfnsf"])) $this->sfnsf	          							= $_POST["sfnsf"];
		if(isset($_POST["skillblueprintno"])) $this->skillblueprintno          		= $_POST["skillblueprintno"];
		if(isset($_POST["skillblueprintbreakupno"])) $this->skillblueprintbreakupno = $_POST["skillblueprintbreakupno"];
		if(isset($_POST["skillblueprintno_from"])) $this->skillblueprintno_from     = $_POST["skillblueprintno_from"];
		if(isset($_POST["tblselected"])) $this->tblselected          				= $_POST["tblselected"];
		if(isset($_POST["subjectasset"])) $this->subjectasset                    	= $_POST["subjectasset"];
		if(isset($_POST["classasset"])) $this->classasset                    		= $_POST["classasset"];
		if(isset($_POST["roundyearasset"])) $this->roundyearasset                   = $_POST["roundyearasset"];
		if(isset($_POST["irproject1"])) $this->irproject1                    		= $_POST["irproject1"];
		if(isset($_POST["irroundyear1"])) $this->irroundyear1                    	= $_POST["irroundyear1"];
		if(isset($_POST["irclasses1"])) $this->irclasses1                   		= $_POST["irclasses1"];
		if(isset($_POST["srno"])) $this->srno                    					= $_POST["srno"];
		if(isset($_POST["username"])) $this->username                    			= $_POST["username"];
		if(isset($_POST["subjectda"])) $this->subjectda                  			= $_POST["subjectda"];
		if(isset($_POST["classda"])) $this->classda		                  			= $_POST["classda"];
		if(isset($_POST["issearchverna"])) $this->issearchverna		                = $_POST["issearchverna"];
		if(isset($_POST["keywordlsa"])) $this->keyword		                  		= $_POST["keywordlsa"];
		if(isset($_POST["medium"])) $this->medium                  					= $_POST["medium"];
		
		$temp_descriptions = array(); $temp_anscodes = array(); $temp_marks = array();

		for($i=1; $i<=$this->totalvaliddescriptions; $i++)
		{
			$descString = "desc".$i;
			$anscodeString = "anscode".$i;
			$marksString = "marks".$i;

			array_push($temp_descriptions, $_POST[$descString]);
			array_push($temp_anscodes, $_POST[$anscodeString]);
			array_push($temp_marks, $_POST[$marksString]);
		}

		$this->descriptions = $temp_descriptions;
		$this->anscodes = $temp_anscodes;
		$this->marks = $temp_marks;
    }
    
    function prepareBlankQuery()
	{
		$blankSetString = "";
		for($i=0; $i<=9; $i++)
		{
			$index = $i+1;
			$blankSetString .= " desc".$index."='', ans_code".$index."='', marks".$index."=NULL,";
		}
		$blankSetString .= "mcq='',";
		$blankSetString .= "comments='',";
		$blankSetString = substr($blankSetString, 0, -1);
		return $blankSetString;
	}

    // Function called from lsa_editquestion.php.	Added by Arpit (28/12/2007) - For editing questions
    function pageEditQuestion($connid)
    {
    	$this->setgetvars();
    	$this->setpostvars();
    	$this->setbasevars($this->skillblueprintno,1,$connid);
    	$output_string = "";
    	//$tablename = "anscode_master_".strtolower($this->project);
    	$tablename = "anscode_master_all";    	

    	if($this->action == "Update Question")
    	{
    		//echo "<pre>";print_r($_POST);echo "</pre>";exit;
    		//$condition = "WHERE Subject='".$this->subject."' AND Class='".$this->class."' AND Qno=".$this->qnotoedit." AND roundyear='".$this->roundyear."'";
			$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$this->qnotoedit;
    		//echo "AA".$this->action."BD"; exit;
    		$setString = $this->prepareQuery();
    		if($this->mcq != "")
				$setString .= "mcq=1,";
			$setString .= "SfNsf='".$this->sfnsf."',";
			
			//echo $this->medium;
			if ($this->medium!="")
			{
				$tablename="anscode_master_verna";
				$setString .= "medium='".$this->medium."',";
			}
			$setString = substr($setString, 0, -1);
			if($setString != "")
			{
				// Make desc, anscode, marks blank for question
				$blankSetString = $this->prepareBlankQuery();
				$updatequery = "UPDATE ".$tablename." SET ".$blankSetString." ".$condition;
				//echo $updatequery."<br><br>"; 
				$dbupdatequery = new dbquery($updatequery,$connid);
			
				$updatequery = "UPDATE ".$tablename." SET ".$setString." ".$condition;
				//echo $updatequery."<br><br>";exit;
				
				$dbupdatequery = new dbquery($updatequery,$connid);
			}
			if($this->pagetoreturn == "lsa_paperwise_showallquestions.php")
				echo "<script>opener.history.go(0);window.close();</script>";
			elseif($this->pagetoreturn == "lsa_prepare_rawscorefile.php")
				echo "<script>window.close();</script>";
			
			exit();
    	}
    	
		$query = "SELECT * FROM ".$tablename." WHERE Subject='".$this->subject."' AND Class='".$this->class."' AND roundyear='".$this->roundyear."' AND project='".$this->project."' AND Qno=".$this->qnotoedit." $condition";
    	$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
    }
    // for vernacular scorecard
    function pageEditQuestionVerna($connid)
    {
    	$this->setgetvars();
    	$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,0,$connid);

    	$output_string = "";
    	//$tablename = "anscode_master_".strtolower($this->project);
    	$tablename = "anscode_master_verna";
    	$anscode_tbl = "anscode_master_all";

    	if($this->action == "Update Question")
    	{
    		$condition_eng =" WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$this->qnotoedit;
			$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$this->qnotoedit." AND Medium='".$this->medium."' AND papercode='".$this->papercode."'";
    		//echo "AA".$this->action."BD"; exit;
    		$selquery="SELECT count(*) FROM $tablename $condition";
			$selquery_res = new dbquery($selquery,$connid);
			$selrow = $selquery_res->getrowarray();
			$isScoredEntered=$selrow['count(*)'];
			
			$setString = "skillblueprintno=".$this->skillblueprintno.", project='".$this->project."', SfNsf='".$this->sfnsf."', Class='".$this->class."', Subject='".$this->subject."', Qno=".$this->qnotoedit.", SuggestedQno='".$this->qnotoedit."', roundyear='".$this->roundyear."',papercode='".$this->papercode."',";
			$setString .= $this->prepareQuery();
    		if($this->mcq != "")
				$setString .= "mcq=1,";
			
			if ($this->medium!="")
				$setString .= "medium='".$this->medium."',";

			$setString = substr($setString, 0, -1);
			if($setString != "")
			{				
				if ($isScoredEntered==1)
					$insertquery = "UPDATE ".$tablename." SET ".$setString . $condition;
				else 
				{
					$query="SELECT skillno,projectskillno from lq_questions $condition_eng";
					$result = new dbquery($query,$connid);
					$row=$result->getrowarray();
					$addstring=",skillno='".$row['skillno']."',projectskillno='".$row['projectskillno']."'";
					$insertquery = "INSERT INTO ".$tablename." SET ".$setString.$addstring;
				}
				$dbupdatequery = new dbquery($insertquery,$connid);
			}
			echo "<script>window.opener.location.reload(true);window.close();</script>";			
			exit();
    	}
    }

    // Function called from lq_prepare_questions_rawscores.php.	Added by Arpit (18/05/2010) - For adding raw scores of question from LSA QMS Screen
    function pageEditQuestion_LQ($connid)
    {
    	$this->setgetvars();
    	$this->setpostvars();
    	$this->setbasevars($this->skillblueprintno,1,$connid);
    	$output_string = "";
    	//$tablename = "anscode_master_".strtolower($this->project);
    	$tablename = "anscode_master_all";

    	if($this->action == "Validate And Insert Raw Score")
		{
			$condition = "WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$this->qnotoedit;
			//$delquery = "DELETE FROM ".$tablename." ".$condition;
			//echo $delquery."<br><br>"; //exit;
			//$delquery_res = new dbquery($delquery,$connid);
			$selquery="SELECT count(*) FROM $tablename $condition";
			$selquery_res = new dbquery($selquery,$connid);
			$selrow = $selquery_res->getrowarray();
			$isScoredEntered=$selrow['count(*)'];
				
			
			$setString = "skillblueprintno=".$this->skillblueprintno.", project='".$this->project."', SfNsf='".$this->sfnsf."', Class='".$this->class."', Subject='".$this->subject."', Qno=".$this->qnotoedit.", SuggestedQno='".$this->qnotoedit."', roundyear='".$this->roundyear."',";
			$setString .= $this->prepareQuery();
			if($this->mcq != "")
				$setString .= "mcq=1";
			else 
				$setString = substr($setString,0,-1);
				
			//echo $setString."<br>";
			if($setString != "")
			{
				$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$this->qnotoedit;
				if ($isScoredEntered==1)
					$insertquery = "UPDATE ".$tablename." SET ".$setString . $condition;
				else 
				{
					$query="SELECT skillno,projectskillno from lq_questions $condition";
					$result = new dbquery($query,$connid);
					$row=$result->getrowarray();
					$addstring=",skillno='".$row['skillno']."',projectskillno='".$row['projectskillno']."'";
					$insertquery = "INSERT INTO ".$tablename." SET ".$setString.$addstring;
				}
				//echo "<br>".$insertquery; 
				$dbinseertquery = new dbquery($insertquery,$connid);
			}
			echo "<script>window.close();</script>";
			exit();
		}

		$query = "SELECT * FROM ".$tablename." WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$this->qnotoedit;
    	//echo $query;
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	return $row;
    }
    
    function pageAssignVernacularVersions1($connid)
    {
    	$this->setgetvars();
    	$this->setpostvars();

    	/*echo "<pre>";
		print_r ($_POST);
		echo "</pre>";*/
    		
    	if($this->action=="Assign Vernacular Version Papercodes")
    	{
    		/*echo "<pre>";
    		print_r ($_POST);
    		echo "</pre>";*/
    		
    		$papercodearray = array();
    		$query = "SELECT DISTINCT papercode FROM lsa_anscode_master_details";
	    	$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				array_push($papercodearray,$row['papercode']);
			}
			
			$query = "SELECT DISTINCT papercode FROM lqv_sbpno_mapping";
	    	$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				array_push($papercodearray,$row['papercode']);
			}
			
			$ispapercodeexist = 0;
			$ispapercodeexist_str = "";
			foreach ($_POST as $key => $papercode)
    		{
    			if(substr($key,0,3)=="inp")
    			{
    				if(in_array($papercode,$papercodearray))
    				{
    					$ispapercodeexist=1;
    					$ispapercodeexist_str .= $papercode.", ";
    				}
    			}
    		}
    		$ispapercodeexist_str = substr($ispapercodeexist_str,0,-2);
    		
    		if($ispapercodeexist==1)
    		{
    			echo "<center><font color='#FF0000'><b>".$ispapercodeexist_str." Papercode/s already exist!</b></font></center>";
    			$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='4' align='center'><b>".$this->project." (".$this->roundyear.") - Assign Papercode to Vernacular Versions</a></b></td></tr>";
			    $output_string .= "<tr><td align='center'><b>Subject</b></td><td align='center'><b>Class</b></td><td align='center'><b>Medium</b></td><td align='center'><b>Papercode</b></td></tr>";
		    
	    		foreach ($_POST as $key => $value)
	    		{
	    			if(substr($key,0,3)=="inp")
	    			{
	    				$paramarray = explode("_",$key);
	    				$sbpno = $paramarray[1];
	    				$medium = $paramarray[2];
	    				
	    				/*$sbpno  = substr($key,4,3);
	    				$medium = substr($key,8);*/
	    				
	    				$this->setbasevars($sbpno,0,$connid);
	    				//echo $sbpno."".$medium."".$this->subject."".$this->class."<br>";
	    				
	    				$inputname = "inp_".$sbpno."_".$medium;
	    				$inputname_hid = "hid_".$sbpno."_".$medium;
	    				$inpvalue="";
	    				if(isset($_POST[$inputname]))
	    					$inpvalue = $_POST[$inputname];
	    					
	    				if(isset($_POST[$inputname_hid]))
	    					$inpvalue_hid = $_POST[$inputname_hid];
	    					
	    				$output_string .= "<tr><td align='center'>".$this->subject."</td><td align='center'>".$this->class."</td><td align='center'>".$medium."</td><td align='center'><input type='text' name='".$inputname."' value='".$inpvalue."'><input type='hidden' name='".$inputname_hid."' value='".$inpvalue_hid."'></td></tr>";
	    			}
	    		}
	    		
	    		$output_string .= "<tr><td align='center' colspan='4'><input type='button' name='Save' value='Save' onclick='return savevernacularversions1()'></td></tr>";
	    		$output_string .= "</table>";
	    		return $output_string;
    		}
    		else 
    		{
    			foreach ($_POST as $key => $papercode)
	    		{
	    			if(substr($key,0,3)=="inp")
	    			{
	    				$paramarray = explode("_",$key);
	    				$sbpno = $paramarray[1];
	    				$medium = $paramarray[2];
    				
	    				/*$sbpno  = substr($key,4,3);
	    				$medium = substr($key,8);*/
	    				
	    				$this->setbasevars($sbpno,1,$connid);
	    				//echo $this->project."-".$this->roundyear."-".$this->totalquestions."-".$sbpno."-".$medium."-".$papercode."<br>";
	    				
	    				$query = "SELECT COUNT(*) FROM lqv_sbpno_mapping WHERE skillblueprintno=".$sbpno." AND medium='".$medium."'";
	    				$dbquery = new dbquery($query,$connid);
						$row = $dbquery->getrowarray();
						
						if($row['COUNT(*)']==0)
						{
							$insquery = "INSERT INTO lqv_sbpno_mapping SET skillblueprintno=".$sbpno.", medium='".$medium."', papercode='".$papercode."'";
							$dbquery = new dbquery($insquery,$connid);
							//echo $query."<br>";
						
							for($qno=1; $qno<=$this->totalquestions; $qno++)
							{
								$insquery = "INSERT INTO lq_questions_vernaculars SET qno=".$qno.",SuggestedQno=".$qno.", papercode='".$papercode."', skillblueprintno=".$sbpno;
								$dbquery = new dbquery($insquery,$connid);
								//echo $insquery."<br>";
							}
						}
						else 
						{
							$oldpapercode_var = "hid_".$sbpno."_".$medium;
							$oldpapercode = $_POST[$oldpapercode_var];
							
							$upquery0 = "UPDATE lqv_sbpno_mapping SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."'";
							$upquery1 = "UPDATE lqv_ips SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."'";
							$upquery2 = "UPDATE lq_questions_vernaculars SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."'";
							$upquery3 = "UPDATE lq_questions_vernaculars_log SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."'";
							
							$dbquery = new dbquery($upquery0,$connid);
							$dbquery = new dbquery($upquery1,$connid);
							$dbquery = new dbquery($upquery2,$connid);
							$dbquery = new dbquery($upquery3,$connid);
							
						}
	    			}
	    		}
	    		
	    		$redirecturl = "lsa_paperwise_rawscore_status.php?project=".$this->project."&roundyear=".$this->roundyear;
	    		echo "<script>redirectPage(\"".$redirecturl."\");</script>";
    		}
    	}
    	
    	if($this->action == "Save Vernacular Version")
    	{
    		$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='4' align='center'><b>".$this->project." (".$this->roundyear.") - Assign Papercode to Vernacular Versions</a></b></td></tr>";
		    $output_string .= "<tr><td align='center'><b>Subject</b></td><td align='center'><b>Class</b></td><td align='center'><b>Medium</b></td><td align='center'><b>Papercode</b></td></tr>";
	    
    		foreach ($_POST as $key => $value)
    		{
    			if(substr($key,0,3)=="chk")
    			{
    				$paramarray = explode("_",$key);
    				$sbpno = $paramarray[1];
    				$medium = $paramarray[2];
    				
    				/*$sbpno  = substr($key,4,3);
    				$medium = substr($key,8);*/
    				
    				$this->setbasevars($sbpno,0,$connid);
    				//echo $key." - ".$value." - ".$sbpno."".$medium."".$this->subject."".$this->class."<br><br>";
    				
    				$inputname = "inp_".$sbpno."_".$medium;
    				$inputname_hid = "hid_".$sbpno."_".$medium;
    				$inpvalue="";
    				
    				$query = "SELECT papercode FROM lqv_sbpno_mapping WHERE skillblueprintno=".$sbpno." AND medium='".$medium."'";
    				$dbquery = new dbquery($query,$connid);
					$row = $dbquery->getrowarray();
					$inpvalue = $row['papercode'];	
    				/*if(isset($_POST[$inputname]))
    					$inpvalue = $_POST[$inputname];*/
    				
    				if($inpvalue=="")	
    					$output_string .= "<tr><td align='center'>".$this->subject."</td><td align='center'>".$this->class."</td><td align='center'>".$medium."</td><td align='center'><input type='text' name='".$inputname."' value='".$inpvalue."'><input type='hidden' name='".$inputname_hid."' value='".$inpvalue."'></td></tr>";
    			}
    		}
    		
    		$output_string .= "<tr><td align='center' colspan='4'><input type='button' name='Save' value='Save' onclick='return savevernacularversions1()'></td></tr>";
    		$output_string .= "</table>";
    		return $output_string;
    	}
    }
    
    function pageAssignVernacularVersions($connid)
    {
    	$this->setgetvars();

    	//$tablename = "anscode_master_".strtolower($this->project);
    	$tablename = "anscode_master_all";
    	$lqtablename = "lq_questions";
    	$query = "SELECT * FROM lsa_anscode_master_details WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' ORDER BY subject, cast(class as UNSIGNED)";
    	$dbquery = new dbquery($query,$connid);

    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='10' align='center'><b>".$this->project." (".$this->roundyear.") - Assign Vernacular Versions</a></b></td></tr>";
	    //$output_string .= "<tr><td colspan='11' align='center'><b>Project:</b>&nbsp;".$this->project."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Round:</b>&nbsp;".$this->roundyear."</td></tr>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td align='center'><b>Sr.<br>No.</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Class</b></td><td  align='center'><b>Papercode</b></td>";
	    $output_string .= "<td align='center'><b>Vernacular Versions</b></td></tr>";

    	$srno = 1;
		while($row = $dbquery->getrowarray())
		{
			$total_qeustions_to_enter = $row['totalquestions'];
			$total_qeustions_entered = 0;
			$activity = "";
			$status = "";

			$sbpn = $row['skillblueprintno'];
			
			$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['subject']."</td><td align='center'>".$row['class']."</td><td>".$row['papercode']."</td>";
			$output_string .= "<td align='center'>";
			
			$vernacularpapers_array = "";
			$paperquery = "SELECT * FROM lqv_sbpno_mapping WHERE skillblueprintno=".$sbpn." ORDER BY medium";
			$dbpaperquery = new dbquery($paperquery,$connid);
			while($paperrow = $dbpaperquery->getrowarray())
			{
				$vernacularpapers_array[$sbpn][$paperrow['medium']] = "Y";
			}
			
			for($vi=0; $vi<$this->totalvernacularversions; $vi++)
			{
				$checked = "";
				if(isset($vernacularpapers_array[$sbpn][$this->vernacularversions[$vi]]) && $vernacularpapers_array[$sbpn][$this->vernacularversions[$vi]]=="Y")
					$checked = "checked";
				$chkname = "chk_".$sbpn."_".$this->vernacularversions[$vi];
				$output_string .= "<input type='checkbox' name='$chkname' $checked>".$this->vernacularversions[$vi]."&nbsp;&nbsp;";
			}
			
			$output_string .= "</td></tr>";
			
			$srno++;
		}
		$output_string .= "<tr><td align='center' colspan='11'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."'>Projectwise Raw Score Status</a>&nbsp;&nbsp;<a href='lq_prepare_passages.php'>Manage Passages</a></td></tr>";
		$output_string .= "<tr><td align='center' colspan='11'><input type='button' name='Save' value='Save' onclick='return savevernacularversions()'></td></tr>";
		$output_string .= "</table>";
		return  $output_string;
    }
    
    function lqv_updatepapercode($connid)
    {
    	/*echo "<pre>";
    	print_r ($_REQUEST);
    	echo "</pre>";*/
    	
    	$this->setgetvars();
    	$this->setpostvars();
		$this->setbasevars($sbpno,1,$connid);
		
    	if($this->action=="Update LQV Papercode")
    	{
    		$papercodearray = array();
    		$query = "SELECT DISTINCT papercode FROM lsa_anscode_master_details";
	    	$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				array_push($papercodearray,$row['papercode']);
			}
			
			$query = "SELECT DISTINCT papercode FROM lqv_sbpno_mapping";
	    	$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				array_push($papercodearray,$row['papercode']);
			}
			
			$ispapercodeexist = 0;
			if(in_array($_POST['newpapercode'],$papercodearray))
				$ispapercodeexist = 1;
				
    		if($ispapercodeexist==1)
    		{
    			echo "<center><font color='#FF0000'><b>".$_POST['newpapercode']." Papercode already exist!</b></font></center>";
    			$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='4' align='center'><b>".$this->project." (".$this->roundyear.") - Change Papercode</a></b></td></tr>";
			    $output_string .= "<tr bgcolor='#DCDCDC'><td align='center'><b>Subject</b></td><td align='center'><b>Class</b></td><td align='center'><b>Old Papercode</b></td><td align='center'><b>New Papercode</b></td></tr>";
			    $output_string .= "<tr><td align='center'>".$this->subject."</td><td align='center'>".$this->class."</td><td align='center'><b>".$_POST['oldpapercode']."</b><input type='hidden' name='oldpapercode' value='".$_POST['oldpapercode']."'></td><td align='center'><input type='text' name='newpapercode' value='".$_POST['newpapercode']."'></tr>";
			    $output_string .= "<tr><td colspan='4' align='center'><input type='button' name='Save' value='Save' onclick='lqvchangepapercode()'></td></tr>";
			    $output_string .= "</table>";
			    return $output_string;
    		}
    		else 
    		{
				$oldpapercode = $_POST['oldpapercode'];
				$papercode = $_POST['newpapercode'];

				$upquery0 = "UPDATE lqv_sbpno_mapping SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."' AND skillblueprintno=$this->skillblueprintno AND Medium='".$this->medium."'";
				$upquery1 = "UPDATE lqv_ips SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."' AND skillblueprintno=$this->skillblueprintno ";
				$upquery2 = "UPDATE lq_questions_vernaculars SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."' AND skillblueprintno=$this->skillblueprintno";
				$upquery3 = "UPDATE lq_questions_vernaculars_log SET papercode='".$papercode."' WHERE papercode='".$oldpapercode."' AND skillblueprintno=$this->skillblueprintno";
				
				$dbquery = new dbquery($upquery0,$connid);
				$dbquery = new dbquery($upquery1,$connid);
				$dbquery = new dbquery($upquery2,$connid);
				$dbquery = new dbquery($upquery3,$connid);
				
				echo "<script>window.location='lsa_paperwise_rawscore_status.php?project=".$this->project."&roundyear=".$this->roundyear."';</script>";
    		}
    	}
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='4' align='center'><b>".$this->project." (".$this->roundyear.") - Change Papercode</a></b></td></tr>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td align='center'><b>Subject</b></td><td align='center'><b>Class</b></td><td align='center'><b>Old Papercode</b></td><td align='center'><b>New Papercode</b></td></tr>";
	    $output_string .= "<tr><td align='center'>".$this->subject."</td><td align='center'>".$this->class."</td><td align='center'><b>".$_GET['papercode']."</b><input type='hidden' name='oldpapercode' value='".$_GET['papercode']."'></td><td align='center'><input type='text' name='newpapercode'></tr>";
	    $output_string .= "<tr><td colspan='4' align='center'><input type='button' name='Save' value='Save' onclick='lqvchangepapercode()'></td></tr>";
	    $output_string .= "</table>";
	    return $output_string;
    }
    
    // Function called from lsa_prepare_rowscore_file.php.	Added by Arpit (10/12/2007) - For fetching projectwise status
    function pagePaperwiseRawscoreStatus($autoPublishingRights,$connid)
    {
    	$this->setgetvars();
    	$this->setpostvars();
    	
    	if($this->action=="Delete Vernacular Paper")
    	{
    		$sbpno = $_GET['skillblueprintno'];
    		$papercode = $_GET['papercode'];
    		$this->setbasevars($sbpno,1,$connid);
    		
    		$upquery0 = "DELETE FROM lqv_sbpno_mapping WHERE papercode='".$papercode."' AND skillblueprintno=".$sbpno;
			$upquery1 = "DELETE FROM lqv_ips WHERE papercode='".$papercode."' AND skillblueprintno=".$sbpno;
			$upquery2 = "DELETE FROM lq_questions_vernaculars WHERE papercode='".$papercode."' AND skillblueprintno=".$sbpno;
			$upquery3 = "DELETE FROM lq_questions_vernaculars_log WHERE papercode='".$papercode."' AND skillblueprintno=".$sbpno;
			
			/*echo $upquery0."<br>";
			echo $upquery1."<br>";
			echo $upquery2."<br>";
			echo $upquery3."<br>";*/
			
			$dbquery = new dbquery($upquery0,$connid);
			$dbquery = new dbquery($upquery1,$connid);
			$dbquery = new dbquery($upquery2,$connid);
			$dbquery = new dbquery($upquery3,$connid);					
    	}
    	
    	//$tablename = "anscode_master_".strtolower($this->project);
    	$tablename = "anscode_master_all";
    	$lqtablename = "lq_questions";
    	$query = "SELECT * FROM lsa_anscode_master_details WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' ORDER BY subject, cast(class as UNSIGNED)";
    	$dbquery = new dbquery($query,$connid);

    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='11' align='center'><b>".$this->project." (".$this->roundyear.") - Paperwise Status</a></b></td></tr>";
	    //$output_string .= "<tr><td colspan='11' align='center'><b>Project:</b>&nbsp;".$this->project."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Round:</b>&nbsp;".$this->roundyear."</td></tr>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td align='center' rowspan='2'><b>Sr.<br>No.</b></td><td align='center' rowspan='2'><b>Subject</b></td><td align='center' rowspan='2'><b>Class</b></td><td  align='center' rowspan='2'><b>Papercode</b></td>";
	    $output_string .= "<td align='center' colspan='3'><b>Questions</b></td></td><td align='center'><b>Raw Scores</b></tr>";
	    $output_string .= "<tr><td align='center'><b>Questions<br>Entered</b></td><td align='center'><b>Status</b></td><td  align='center'><b>Action</b></td><td  align='center'><b>Action</b></td></tr>";

	    $output_string_ver  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $output_string_ver .= "<tr bgcolor='#DCDCDC'><td colspan='7' align='center'><b>Vernacular Versions</b></td></tr>";
	    $output_string_ver .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Class</b></td><td align='center'><b>Medium</b></td><td align='center'><b>Action</b></td><td align='center'><b>Raw Scores</b></td><td align='center'><b>Papercode</b></td></tr>";
	    
    	$srno = 1;
    	$srno_verna = 1;
    	while($row = $dbquery->getrowarray())
		{
			$total_qeustions_to_enter = $row['totalquestions'];
			$total_qeustions_entered = 0;
			$activity = "";
			$status = "";

			$sbpn = $row['skillblueprintno'];
			
			$vernacularpapers = "";
			$paperquery = "SELECT * FROM lqv_sbpno_mapping WHERE skillblueprintno=".$sbpn." ORDER BY medium";
			$dbpaperquery = new dbquery($paperquery,$connid);
			while($paperrow = $dbpaperquery->getrowarray())
			{
				$urlstr = "isverna=".base64_encode(1)."&papercode=".base64_encode($paperrow['papercode']);
				$vernacularpapers = "<a href='lqv_showTorrentPapers.php?".$urlstr."'>".$paperrow['medium']."</a>";
				$copytoexcelverna = "<a href='lqv_copytoexcel.php?".$urlstr."' target='_blank'>Copy to excel</a>";
				$ips = "<a href='lqv_IPS.php?".$urlstr."' target='_blank'>IPS</a>";
				$ipsmismatch = "<a href='lqv_IPSMismatch.php?".$urlstr."' target='_blank'>IPS Mismatch</a>";
				$urlstr1 = "skillblueprintno=".$sbpn."&papercode=".$paperrow['papercode']."&medium=".$paperrow['medium'];
				$urlstr2 = "skillblueprintno=".base64_encode($sbpn)."&papercode=".base64_encode($paperrow['papercode'])."&project=".base64_encode($this->project);//for autopublishing papers
				$linktodownloadvernapaper    =  "<a href='Papers/".$paperrow['papercode'].".pdf' target='_blank'>Download Paper</a>";				
				
				$urlstr3 = "skillblueprintno=".base64_encode($sbpn)."&papercode=".base64_encode($paperrow['papercode'])."&medium=".$paperrow['medium'];
				$linktoaddscorecard = "<a href='lqv_addScorecard.php?$urlstr3' target='_blank'>Add Scorecard</a>";
				
				if (!file_exists("Papers/".$paperrow['papercode'].".pdf"))
					$linktoautopublishvernapaper = "<a href='lq_publishPaper.php?".$urlstr2."' target='_blank'>Autopublish Paper</a>";
				else 
					$linktoautopublishvernapaper = "<a href='lq_publishPaper.php?".$urlstr2."' target='_blank'>Regenerate Paper</a>&nbsp;&nbsp;&nbsp;$linktodownloadvernapaper";
				
				if ($_SESSION['username']=='jaikishan.keswani' || $_SESSION['username']=='rahul')
					$output_string_ver .= "<tr><td align='center'><a href='lqv_updatepapercode.php?".$urlstr1."'>".$srno_verna."</a></td><td align='center'>".$row['subject']."</td><td align='center'>".$row['class']."</td><td>".$vernacularpapers."</td><td>".$copytoexcelverna."&nbsp;&nbsp;&nbsp;".$ips."&nbsp;&nbsp;&nbsp;".$ipsmismatch."&nbsp;&nbsp;&nbsp;".$linktoautopublishvernapaper."&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript: delete_vernacularpaper(\"".$urlstr1."\")'>Delete Paper</a></td><td align='center'>$linktoaddscorecard</td><td align='center'>".$paperrow['papercode']."</td></tr>";//
				else if (in_array($_SESSION['username'],$autoPublishingRights))
					$output_string_ver .= "<tr><td align='center'><a href='lqv_updatepapercode.php?".$urlstr1."'>".$srno_verna."</a></td><td align='center'>".$row['subject']."</td><td align='center'>".$row['class']."</td><td>".$vernacularpapers."</td><td>".$copytoexcelverna."&nbsp;&nbsp;&nbsp;".$ips."&nbsp;&nbsp;&nbsp;".$ipsmismatch."&nbsp;&nbsp;&nbsp;".$linktoautopublishvernapaper."</td><td align='center'>$linktoaddscorecard</td><td align='center'>".$paperrow['papercode']."</td></tr>";
				else 
					$output_string_ver .= "<tr><td align='center'><a href='lqv_updatepapercode.php?".$urlstr1."'>".$srno_verna."</a></td><td align='center'>".$row['subject']."</td><td align='center'>".$row['class']."</td><td>".$vernacularpapers."</td><td>".$copytoexcelverna."&nbsp;&nbsp;&nbsp;".$ips."&nbsp;&nbsp;&nbsp;".$ipsmismatch."</td><td align='center'>$linktoaddscorecard</td><td align='center'>".$paperrow['papercode']."</td></tr>";
				
				$srno_verna++;
			}
			
			//$paperquery = "SELECT COUNT(*) as total_questions_entered FROM ".$lqtablename." WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND roundyear='".$this->roundyear."' AND project='".strtolower($this->project)."'";
			$paperquery = "SELECT COUNT(*) as total_questions_entered FROM ".$lqtablename." WHERE skillblueprintno=".$sbpn." AND question!=''";
			$dbpaperquery = new dbquery($paperquery,$connid);

			while($paperrow = $dbpaperquery->getrowarray())
			{
				$total_qeustions_entered = $paperrow['total_questions_entered'];
				if($total_qeustions_entered < $total_qeustions_to_enter)
				{
					$activity = "Add Questions";

					if($total_qeustions_entered != 0)
						$status = "S";
					else
						$status = "NS";
				}
				else
				{
					$status = "C";
				}
				//$queryString = "project=".$this->project."&subject=".$row['subject']."&classes=".$row['class']."&roundyear=".$this->roundyear."&papercode=".$row["papercode"]."&category=".$row['category']."&skillblueprintno=".$row['skillblueprintno'];
				//$queryString1 = "project=".$this->project."&subject=".$row['subject']."&classes=".$row['class']."&roundyear=".$this->roundyear."&papercode=".$row["papercode"]."&actiontoperform=Validate Raw Score Master Data";
				$queryString = "skillblueprintno=".$sbpn;
				$queryString1 = "skillblueprintno=".$sbpn."&actiontoperform=Validate Raw Score Master Data";
				//$queryString2 = "skillblueprintno=".base64_encode($sbpn)."&project=".base64_encode($this->project);//for autopublishing papers
				$queryString2 = "skillblueprintno=".base64_encode($sbpn)."&papercode=".base64_encode($row['papercode'])."&project=".base64_encode($this->project);//for autopublishing papers
				/*$skbquery = "SELECT COUNT(*) FROM lsa_anscode_master_details WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND roundyear='".$this->roundyear."' AND project='".strtolower($this->project)."'";
				$skbresult = new dbquery($skbquery,$connid);
				$skbrow = $skbresult->getrowarray();*/
				
				$skillblueprint = "<a href='lq_prepare_skillblueprint.php?".$queryString."'>Skill Blue Print</a>";
				
				if(isset($_GET['isframes']) && $_GET['isframes']=="Yes")
					$activity = "<a href='lq_prepare_questions.php?".$queryString1."'>Questions</a>";	
				else 
					$activity = "<a href='lq_prepare_questions_frames.php?".$queryString1."'>Questions</a>";
				
				$editQuestion =  "<a href='lq_showPaper.php?".$queryString."'>Show All Questions</a>";
				
				if(isset($_GET['isframes']) && $_GET['isframes']=="Yes")
					$commenting  =  "<a href='lq_addComments.php?".$queryString."'>Commenting</a>";
				else 
					$commenting  =  "<a href='lq_addComments_frames.php?".$queryString."'>Commenting</a>";
					
				$copytoexcel  =  "<a href='lq_copypapertoexcel.php?".$queryString."'>Copy to excel</a>";
				
				$linktoips1    =  "<a href='lq_IPS1.php?".$queryString."'>IPS1</a>";
				
				$linktoips2    =  "<a href='lq_IPS2.php?".$queryString."'>IPS2</a>";
				
				$linktoipsmismatch    =  "<a href='lq_IPSMismatch.php?".$queryString."'>IPS Mismatch</a>";
				
				$linktodownloadpaper    =  "<a href='Papers/".$sbpn.".pdf' target='_blank'>Download Paper</a>";
				if (!file_exists("Papers/".$sbpn.".pdf"))
					$linktoautopublishpaper = "<a href='lq_publishPaper.php?".$queryString2."' target='_blank'>Autopublish Paper</a>";
				else 
					$linktoautopublishpaper = "<a href='lq_publishPaper.php?".$queryString2."' target='_blank'>Regenerate Paper</a>&nbsp;&nbsp;&nbsp;$linktodownloadpaper";
				
				if ($this->project=='GunotsavDiagnostic' && ($this->roundyear=='Y0' || $this->roundyear=='Y1'))
					$linktoIRC    =  "<a href='gd_IRCGraph.php?".$queryString."'>IRC</a> &nbsp;";
				
				$scorecard = "<a href='lsa_paperwise_showscorecard.php?".$queryString1."'>Show Scorecard</a>";
				//$output_string .= "<tr><td align='center'>".$srno."</td><td>".$row['papercode']."</td><td>".$row['class']."</td><td align='center'>".$row['subject']."</td><td align='center'>".$row['totalquestions']."</td><td align='center'>".$total_qeustions_entered."</td><td align='center'>".$status."</td><td align='center'>".$activity."&nbsp;&nbsp;&nbsp;&nbsp;".$editQuestion."&nbsp;&nbsp;&nbsp;&nbsp;".$scorecard."</td></tr>";
				$output_string .= "<tr><td align='center'><a href='lsa_update_paperdetail.php?".$queryString."'>".$srno."</a></td><td align='center'>".$row['subject']."</td><td align='center'>".$row['class']."</td><td>".$row['papercode']."</td>";
				$output_string .= "<td align='center'>".$total_qeustions_entered."/".$row['totalquestions']."</td><td align='center'>".$status."</td><td>".$skillblueprint."&nbsp;&nbsp;&nbsp;".$activity."&nbsp;&nbsp;&nbsp;".$commenting."&nbsp;&nbsp;&nbsp;".$copytoexcel."&nbsp;&nbsp;&nbsp;".$linktoips1."&nbsp;&nbsp;&nbsp;".$linktoips2."&nbsp;&nbsp;&nbsp;".$linktoipsmismatch."&nbsp;&nbsp;&nbsp;".$linktoIRC;
				if (in_array($_SESSION['username'],$autoPublishingRights))
					$output_string.=$linktoautopublishpaper."</td>";
				else 
					$output_string.="</td>";
				//$output_string .= "<td align='center'>".$total_qeustions_entered."</td><td align='center'>".$status."</td><td align='center'>".$skillblueprint."&nbsp;&nbsp;&nbsp;".$activity."&nbsp;&nbsp;&nbsp;".$editQuestion."&nbsp;&nbsp;&nbsp;".$commenting."</td>";
			}
			
			$total_qeustions_entered = 0;
			$total_qeustions_to_enter = $row['totalquestions'];
			$activity = "";
			$status = "";

			//$paperquery = "SELECT COUNT(*) as total_questions_entered FROM ".$tablename." WHERE subject='".$row['subject']."' AND class='".$row['class']."' AND roundyear='".$this->roundyear."'";
			$paperquery = "SELECT COUNT(*) as total_questions_entered FROM ".$tablename." WHERE skillblueprintno=".$sbpn;
			$dbpaperquery = new dbquery($paperquery,$connid);

			while($paperrow = $dbpaperquery->getrowarray())
			{
				$total_qeustions_entered = $paperrow['total_questions_entered'];

				if($total_qeustions_entered < $total_qeustions_to_enter)
				{
					$activity = "Add Questions";

					if($total_qeustions_entered != 0)
						$status = "Started";
					else
						$status = "Not Started";
				}
				else
				{
					$status = "Completed";
				}
				$queryString = "project=".$this->project."&subject=".$row['subject']."&classes=".$row['class']."&roundyear=".$this->roundyear."&papercode=".$row["papercode"]."&actiontoperform=Validate Raw Score Master Data";
				$queryString = "skillblueprintno=".$sbpn."&&actiontoperform=Validate Raw Score Master Data";
				$activity = "<a href='lsa_prepare_rawscorefile.php?".$queryString."'>Add</a>";
				$editQuestion =  "<a href='lsa_paperwise_showallquestions.php?".$queryString."'>Scorecard 1</a>";
				$scorecard = "<a href='lsa_paperwise_showscorecard.php?".$queryString."'>Scorecard 2</a>";
				//$output_string .= "<tr><td align='center'>".$srno."</td><td>".$row['papercode']."</td><td>".$row['class']."</td><td align='center'>".$row['subject']."</td><td align='center'>".$row['totalquestions']."</td><td align='center'>".$total_qeustions_entered."</td><td align='center'>".$status."</td><td align='center'>".$activity."&nbsp;&nbsp;&nbsp;&nbsp;".$editQuestion."&nbsp;&nbsp;&nbsp;&nbsp;".$scorecard."</td></tr>";
				$output_string .= "<td align='center'>".$activity."&nbsp;&nbsp;&nbsp;".$editQuestion."&nbsp;&nbsp;&nbsp;".$scorecard."</td></tr>";
			}
						
			$srno++;
		}
		$output_string .= "<tr><td align='center' colspan='11'><b>Note:</b> Status C(Completed), S(Started), NS(Not Started)</td></tr>";
		$output_string .= "<tr><td align='center' colspan='11'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."'>Projectwise Raw Score Status</a>&nbsp;&nbsp;<a href='lq_prepare_passages.php'>Manage Passages</a>&nbsp;&nbsp;<a href='lq_prepare_grptext.php'>Manage Grouptext</a>&nbsp;&nbsp;<a href='lqv_assignVernacularVersions.php?project=".$this->project."&roundyear=".$this->roundyear."'>Assign Vernacular Versions</a>&nbsp;&nbsp;<a href='lsa_generateDataUploadFormat.php?project=".$this->project."&roundyear=".$this->roundyear."'>Data Format (CSV)</a>";
		$output_string .= "&nbsp;&nbsp;<a target=_blank href='lq_publishPaper_interface.php?project=".base64_encode($this->project)."&papercode=".base64_encode($this->papercode)."&skillblueprintno=".base64_encode($this->skillblueprintno)."'>Edit Top Label</a></td></tr>";
		$output_string .= "</table>";
		$output_string_ver .= "</table>";
		if ($_SESSION['member']=='guest' && $_SESSION['category']=='LQV')
			$output_string = $output_string_ver;
		else 
			$output_string .= "<br>".$output_string_ver;
		return  $output_string;
    }

    // Function called from lsa_prepare_rowscore_file.php.	Added by Arpit (10/12/2007) - For fetching projectwise status
    function pageProjectwiseRawscoreStatus_OLD($connid)
    {
    	$this->setgetvars();
    	$query = "SELECT project, roundyear, Count(*) as totalpapers FROM lsa_anscode_master_details GROUP BY project,roundyear";
    	$dbquery = new dbquery($query,$connid);
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='4' align='center'><b>LSA QMS - Projectwise Status</a></b></td></tr>";
	    $output_string .= "<tr><td align='center'><b>Sr. No.</b></td><td  align='center'><b>Project</b></td><td  align='center'><b>Round</b></td><td  align='center'><b>Total Papers</b></td></tr>";
    	$srno = 1;
		while($row = $dbquery->getrowarray())
		{
			$queryString = "project=".$row['project']."&roundyear=".$row['roundyear'];
			if(isset($_GET['isframes']))
				$queryString .= "&isframes=".$_GET['isframes'];
			$output_string .= "<tr><td align='center'>".$srno."</td><td>".$row['project']."</td><td align='center'>".$row['roundyear']."</td><td align='center'><a href='lsa_paperwise_rawscore_status.php?".$queryString."'>".$row['totalpapers']."</a></td></tr>";
			$srno++;
		}
		$output_string .= "<tr><td align='center' colspan='4'><a href='lsa_addproject_papers.php'>Add Project/Paper</a></td></tr>";
		//$output_string .= "<tr><td align='center' colspan='4'><a href='lsa_prepare_rawscorefile.php'>Add Paper</a></td></tr>";
		//$output_string .= "<tr><td align='center' colspan='4'><a href='lq_prepare_questions.php'>Add Paper</a></td></tr>";
		$output_string .= "</table>";
		return  $output_string;
    }
    
    function pageProjectwiseRawscoreStatus($connid,$username)
    {
    	//echo $username;
    	
    	$this->setgetvars();

    	$projectnames = "";
    	$boardexamusers = array("kirtida.shah","trilok.pandya","himanshu.bhatt");
    	
    	/*if(in_array($username,$boardexamusers))
    		$query = "SELECT DISTINCT project FROM lsa_anscode_master_details WHERE project='BoardExamReform' ORDER BY project";
	   	else*/ 
    		$query = "SELECT DISTINCT project FROM lsa_anscode_master_details ORDER BY project";
    	$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$projectnames .= $row['project'].",";
		}
		$projectnames = substr($projectnames,0,-1);
		
		/*if(in_array($username,$boardexamusers))
    		$query = "SELECT DISTINCT project FROM lsa_anscode_master_details WHERE project='BoardExamReform' ORDER BY project";
	   	else */
	    	$query = "SELECT DISTINCT project FROM lsa_anscode_master_details ORDER BY project";
    	$dbquery = new dbquery($query,$connid);
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='10' align='center'><b>LSA QMS - Projects</a></b></td></tr>";
    	$output_string .= "<tr>";
	    $srno = 0;
		while($row = $dbquery->getrowarray())
		{
			$output_string .= "<td align='center'><a href='javascript: activateproject(\"".$projectnames."\",\"".$row['project']."\")'>".$row['project']."</a></td>";
			$srno++;
			if($srno%10==0)
				$output_string .= "</tr><tr>";
		}
		if($srno%10!==0)
		{
			while (1) 
			{
				$output_string .= "<td></td>";
				$srno++;
				if($srno%10==0)
					break;
			}
			$output_string .= "</tr>";
		}
		
		$output_string .= "<tr><td align='center' colspan='10'><a href='lsa_addproject_papers.php'>Add New Project/Paper</a>&nbsp;&nbsp;<a href='lq_prepare_passages.php'>Manage Passages</a>&nbsp;&nbsp;<a href='lq_prepare_grptext.php'>Manage Grouptext</a>&nbsp;&nbsp;<a href='lq_imageFormatting.php'>Image Formatting</a>&nbsp;&nbsp;<a href='lq_listQuestions.php'>Search Questions</a>&nbsp;&nbsp;<a href='lq_compaerScorecardQMSData.php'>Status</a></td></tr>";
		$output_string .= "</table><br>";
    	
    	$preproject = "";
		$query = "SELECT project, roundyear, Count(*) as totalpapers FROM lsa_anscode_master_details GROUP BY project,roundyear";
    	$dbquery = new dbquery($query,$connid);
    	
		while($row = $dbquery->getrowarray())
		{
			if($preproject!=$row['project'])
			{
				if($preproject!="")
					$output_string .= "</table>";
					
				$output_string .= "<table border=1 style='border-collapse: collapse; display:none;' align='center' bordercolor='#333333' id='".$row['project']."'>";
			    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='3' align='center'><b>".$row['project']." - Roundwise Total Papers</a></b></td></tr>";
			    $output_string .= "<tr><td align='center'><b>Sr. No.</b></td><td  align='center'><b>Round</b></td><td  align='center'><b>Total Papers</b></td></tr>";
		    	$srno = 1;
		    	$preproject=$row['project'];
			}
			$queryString = "project=".$row['project']."&roundyear=".$row['roundyear'];
			if(isset($_GET['isframes']))
				$queryString .= "&isframes=".$_GET['isframes'];
			$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['roundyear']."</td><td align='center'><a href='lsa_paperwise_rawscore_status.php?".$queryString."'>".$row['totalpapers']."</a></td></tr>";
			$srno++;
		}
		
		$output_string .= "</table>";
		return  $output_string;
    }

    // Function called from lsa_prepare_rowscore_file.php.	Added by Arpit (07/12/2007) - For validating raw score master data
    function pageValidateRawScoreMasterData($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
		$tablename = "anscode_master_all";
		
		/*if($this->project != "")
			$tablename = "anscode_master_".strtolower($this->project);*/
		
		if($this->action == "Skip Question")
		{			
			$this->qno++;

			$condition = " WHERE project='".$this->project."' AND subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
			$query = "SELECT * FROM lsa_anscode_master_details".$condition;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->numrows();
			$rowtotalquestions = $dbquery->getrowarray();
			$this->totalquestions = $rowtotalquestions["totalquestions"];
			
			$condition1 = "WHERE subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."' AND project='".$this->project."'";
			$questionsquery = "SELECT COUNT(*) FROM ".$tablename." ".$condition1;
			$dbquestionsquery = new dbquery($questionsquery,$connid);
			$questionsrow = $dbquestionsquery->getrowarray();
			$totalquestionsentered = $questionsrow['COUNT(*)'];
			if($this->totalquestions <= $totalquestionsentered)
				$returnvalue = "All Questions Are Inserted...";
			else
				$returnvalue = "Question Data Inserted";

			return $returnvalue;
		}	
		
		if($this->action == "Validate Raw Score Master Data")
		{
			$returnvalue = "";
			if($this->project=="Other")
				$condition = " WHERE project='".$this->project_other."'";
			else
				$condition = " WHERE project='".$this->project."'";

			if($this->roundyear=="Other")
				$condition .= " AND roundyear='".$this->roundyear_other."'";
			else
				$condition .= " AND roundyear='".$this->roundyear."'";
			
			$condition .= " AND subject='".$this->subject."' AND class='".$this->class."'";

			$query = "SELECT * FROM lsa_anscode_master_details".$condition;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->numrows();
			$rowtotalquestions = $dbquery->getrowarray();
			if($row == 0 && $this->totalquestions == 0)
			{
				$returnvalue = "Total Questions Not Given";
			}
			elseif ($row == 0 && $this->totalquestions > 0)
			{
				if($this->project=="Other")
				{
					//$this->createTable($connid);
					$this->insertProject($connid);
					$this->project = $this->project_other;
				}
				if($this->roundyear=="Other")
				{
					$this->insertRound($connid);
					$this->roundyear = $this->roundyear_other;
				}

				$insertquery = "INSERT INTO lsa_anscode_master_details SET project='".$this->project."', subject='".$this->subject."', class='".$this->class."', totalquestions=".$this->totalquestions.", roundyear='".$this->roundyear."', papercode='".$this->papercode."', category='".$this->category."'";
				//echo $insertquery;
				$dbinseertquery = new dbquery($insertquery,$connid);

				$this->qno = 1;
				$returnvalue = "Master Data Inserted";
			}
			else
			{
				$condition1 = "WHERE subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."' AND project='".$this->project."'";
				$questionsquery = "SELECT Qno FROM ".$tablename." ".$condition1." ORDER BY Qno DESC";
				$dbquestionsquery = new dbquery($questionsquery,$connid);
				$questionsrow = $dbquestionsquery->getrowarray();

				$this->totalquestions = $rowtotalquestions["totalquestions"];
				$this->qno = $questionsrow["Qno"];
				$this->qno++;
				
				$questionsquery = "SELECT COUNT(*) FROM ".$tablename." ".$condition1;
				$dbquestionsquery = new dbquery($questionsquery,$connid);
				$questionsrow = $dbquestionsquery->getrowarray();
				$totalquestionsentered = $questionsrow['COUNT(*)'];
				
				if($this->totalquestions <= $totalquestionsentered)
					$returnvalue = "All Questions Are Inserted...";
				else
					$returnvalue = "Master Data Inserted";
			}
			return $returnvalue;
		} // if($this->action == "Validate Raw Score Master Data")

		if($this->action == "Validate And Insert Question")
		{
			$setString = "SfNsf='".$this->sfnsf."', Class='".$this->class."', Subject='".$this->subject."', Qno=".$this->qno.", SuggestedQno='".$this->suggestedqno."', roundyear='".$this->roundyear."',";
			if($this->mcq != "")
				$setString .= "mcq=1,";

			$setString1 = $this->prepareQuery();
			
			if($setString1 != "")
			{
				$setString .= $setString1;
				$setString = substr($setString, 0, -1);
				$insertquery = "INSERT INTO ".$tablename." SET ".$setString;
				//echo $insertquery; //exit;
				$dbinseertquery = new dbquery($insertquery,$connid);

				$condition1 = "WHERE subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."' AND project='".$this->project."'";
				$questionsquery = "SELECT Qno FROM ".$tablename." ".$condition1." ORDER BY Qno DESC";
				$dbquestionsquery = new dbquery($questionsquery,$connid);
				$questionsrow = $dbquestionsquery->getrowarray();

				$condition = " WHERE project='".$this->project."' AND subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
				$query = "SELECT * FROM lsa_anscode_master_details".$condition;
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->numrows();
				$rowtotalquestions = $dbquery->getrowarray();

				$this->totalquestions = $rowtotalquestions["totalquestions"];
				$this->qno = $questionsrow["Qno"];
				$this->qno++;
			}

			$questionsquery = "SELECT COUNT(*) FROM ".$tablename." ".$condition1;
			$dbquestionsquery = new dbquery($questionsquery,$connid);
			$questionsrow = $dbquestionsquery->getrowarray();
			$totalquestionsentered = $questionsrow['COUNT(*)'];
				
			if($this->totalquestions <= $totalquestionsentered)
				$returnvalue = "All Questions Are Inserted...";
			else
				$returnvalue = "Question Data Inserted";

			return $returnvalue;
		}
	}

	// Function called from lsa_paperwise_showallquestions.php.	Added by Arpit (03/01/2008) - For fetching projectwise all questions
    function pagePaperwiseShowAllQuestions($connid)
    {
    	$this->setgetvars();
		$this->setpostvars();
    	$this->setbasevars($this->skillblueprintno,1,$connid);
    	$tablename = "anscode_master_all";
		/*if($this->project != "")
			$tablename = "anscode_master_".strtolower($this->project);
		
		$queryString = "project=".$this->project."&subject=".$this->subject."&classes=".$this->class."&roundyear=".$this->roundyear;*/
		$queryString = "skillblueprintno=".$this->skillblueprintno;

		if($this->action == "Delete Scorecard")
		{
			$delquery = "DELETE FROM ".$tablename." WHERE srno=".$_GET['srno'];
			//echo $delquery."<br>";
			mysql_query($delquery) OR die("While Deleting: ".mysql_error());
		}
		
    	$query = "SELECT * FROM ".$tablename." WHERE skillblueprintno=".$this->skillblueprintno." ORDER BY cast(SuggestedQno as UNSIGNED)";
    	$dbquery = new dbquery($query,$connid);
    	$dbquery1 = new dbquery($query,$connid);

    	/*$papercodequery = "SELECT papercode FROM lsa_anscode_master_details WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND Class='".$this->class."' AND Subject='".$this->subject."'";
    	$papercodedbquery = new dbquery($papercodequery,$connid);
    	$papercoderow = $papercodedbquery->getrowarray();
    	$papercode = $papercoderow["papercode"];*/
    	
    	
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='29' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Papercode: </b>".$this->papercode."</font></td></tr>";
	    $output_string .= "<tr><td align='center'><b>Q No.</b></td><td align='center'><b>SfNsf</b></td>";
	    for($i=1;$i<=8;$i++)
	    {
	    	$output_string .= "<td><b>Desc".$i."</b></td><td><b>AC".$i."</b></td><td><b>M".$i."</b></td>";
	    }
	    $output_string .= "<td align='center'><b>MCQ</b></td><td align='center'><b>Comments</b></td><td align='center'><b>Action</b></td>";
	    $output_string .= "</tr>";
		while($row = $dbquery->getrowarray())
		{
			$output_string .= "<tr>";
			if(($row['Qno'] != $row['SuggestedQno']) && $row['SuggestedQno'] !="")
				$output_string .= "<td align='center'>".$row['SuggestedQno']."</td>";
			else
				$output_string .= "<td align='center'>".$row['Qno']."</td>";
			
			if($row['SfNsf'] == "S")
				$output_string .= "<td align='center'>SF</td>";
			else
				$output_string .= "<td align='center'>".$row['SfNsf']."</td>";
				
			for($i=1;$i<=8;$i++)
		    {
		    	$desc = "desc".$i; $anscode = "ans_code".$i; $marks = "marks".$i;
				$description = Dotagtoimage($this->imagefolder, $row[$desc]);
		    	$output_string .= "<td>".stripslashes($description)."</td><td align='center'>".$row[$anscode]."</td><td align='center'>".$row[$marks]."</td>";
		    }
		    $queryString1 = $queryString."&qnotoedit=".$row['Qno']."&pagetoreturn=lsa_paperwise_showallquestions.php";
		    if($row["mcq"] == 1)
		    	$output_string .= "<td align='center'>Y</td>";
		    else
		    	$output_string .= "<td align='center'>N</td>";

		    $output_string .= "<td>".$row["comments"]."</td>";
			$output_string .= "<td align='center'><a href='javascript: update_question(\"".$queryString1."\")'>Edit</a><br><a href='javascript: delete_question(\"".$queryString1."\",".$row['srno'].")'>Delete</a></td>";
		    $output_string .= "</tr>";
		}

		$scorecard = "<a href='lsa_paperwise_showscorecard.php?".$queryString."'>Show Scorecard</a>";
		$checkscorecard = "<a href='lsa_paperwise_checkscorecard.php?".$queryString."'>Check Scorecard</a>";
		$output_string .= "<tr><td align='center' colspan='29'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."'>Projectwise Raw Score Status</a>&nbsp;&nbsp;&nbsp;&nbsp;".$scorecard."&nbsp;&nbsp;&nbsp;&nbsp;".$checkscorecard."</td>";
		$output_string .= "</table><br>";
		
		$output_string  .= "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='3' align='center'><font size='2'><b><u>Answer Key</u></b><br><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Papercode: </b>".$this->papercode."</font></td></tr>";
		$output_string .= "<tr><td colspan=3><br><b>Note:</b><br>For the free response questions please refer the scorecard for detailed description of the answer codes.<br>MCQ- Multiple Choice Questions; FR- Free Response Questions</td></tr>";
		$output_string .= "<tr><td align='center'><font size='2'><b>Q.No.</b></font></td><td align='center'><font size='2'><b>MCQ/FR</b></font></td><td align='center'><font size='2'><b>Answer Key for MCQ/<br>Valid Answer Codes for FR</b></font></td></tr>";
		while($row = $dbquery1->getrowarray())
		{
			$output_string .= "<tr align='center'>";
			$output_string .= "<td align='center'>".$row['Qno']."</td>";
			if($row['mcq'] == "1")
			{
				$output_string .= "<td align='center'>MCQ</td>";
				$anscoderight="&nbsp;";							    	
				for($i=1;$i<=8;$i++)
			    {
			    	$anscode = "ans_code".$i; $marks = "marks".$i;
			    	if ($row[$marks]==1.00)
			    		$anscoderight .= $row[$anscode];
			    }
			    $output_string .= "<td>$anscoderight</td>";
			}
			else
			{
				$output_string .= "<td align='center'>FR</td>";
				$anscodestr="";
				for($i=1;$i<=8;$i++)
			    {
			    	$anscode = "ans_code".$i;
			    	if ($row[$anscode]=='')
			    		continue;
			    	$anscodestr.=$row[$anscode].",";
			    }
			    $anscodestr=substr($anscodestr,0,-1);
			    $output_string .= "<td>$anscodestr</td>";
			}				
			$output_string .= "</tr>";
		}
		$output_string .= "</table><br>";
		
		return  $output_string;
    }

    function pagePaperwiseCheckScoreCard($connid)
    {
    	$this->setgetvars();
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
    	$tablename = "anscode_master_all";
    	
    	$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
	    $outputstring .= "<tr bgcolor='#DCDCDC'><td colspan='29' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Papercode: </b>".$this->papercode."</font></td></tr></table><br>";
	    
    	$outputstring .= "<table border='1' style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><td colspan='3' align='center'>Questions where no answer code is given mark 1.00</td></tr>";
		$outputstring .= "<tr><td>Class</td><td>Subject</td><td>Qno</td></tr>";
	
		$condition = " WHERE skillblueprintno=".$this->skillblueprintno;
		$query = "SELECT * FROM ".$tablename.$condition." ORDER By Class, Subject, cast(Qno as unsigned)";
		//echo $query;
		$result = mysql_query($query) OR die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$iserror = 1;
			$class = $row["Class"];
			$subject = $row["Subject"];
			$qno = $row["Qno"];
			for($i=1; $i<=10; $i++)
			{
				$ans_code = "ans_code".$i;
				$marks = "marks".$i;
				if($row[$ans_code] != "" || $row[$ans_code] != NULL)
				{
					if(trim($row[$marks]) == "1.00")
					{
						$iserror = 0;
						break;
					}
				}
			}
			if($iserror == 1)
				$outputstring .= "<tr><td>".$class."</td><td>".$subject."</td><td>".$qno."</td></tr>";
		}
	
		$outputstring .= "</table><br>";
		
		$outputstring .= "<table border='1' style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><td colspan='4' align='center'>Questions where more than one answer codes are given mark 1.00</td></tr>";
		$outputstring .= "<tr><td>Class</td><td>Subject</td><td>Qno</td><td>Ans Codes</td></tr>";
		
		$query = "SELECT * FROM ".$tablename.$condition." ORDER By Class, Subject, cast(Qno as unsigned)";
		$result = mysql_query($query) OR die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$anscodes = "";
			$onecount = 0;
			$class = $row["Class"];
			$subject = $row["Subject"];
			$qno = $row["Qno"];
			for($i=1; $i<=10; $i++)
			{
				$ans_code = "ans_code".$i;
				$marks = "marks".$i;
				if($row[$ans_code] != "" || $row[$ans_code] != NULL)
				{
					if(trim($row[$marks]) == "1.00")
					{
						$onecount++;
						$anscodes.=$row[$ans_code].",";
					}
				}
			}
			$anscodes = substr($anscodes,0,-1);
			if($onecount > 1)
				$outputstring .= "<tr><td>".$class."</td><td>".$subject."</td><td>".$qno."</td><td>".$anscodes."</td></tr>";
		}
	
		$outputstring .= "</table><br>";
		
		$outputstring .= "<table border='1' style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><td colspan='4' align='center'>Questions where more than one answer codes are given mark 0.75</td></tr>";
		$outputstring .= "<tr><td>Class</td><td>Subject</td><td>Qno</td><td>Ans Codes</td></tr>";
	
		$query = "SELECT * FROM ".$tablename.$condition." ORDER By Class, Subject, cast(Qno as unsigned)";
		$result = mysql_query($query) OR die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$anscodes = "";
			$onecount = 0;
			$class = $row["Class"];
			$subject = $row["Subject"];
			$qno = $row["Qno"];
			for($i=1; $i<=10; $i++)
			{
				$ans_code = "ans_code".$i;
				$marks = "marks".$i;
				if($row[$ans_code] != "" || $row[$ans_code] != NULL)
				{
					if(trim($row[$marks]) == "0.75")
					{
						$onecount++;
						$anscodes.=$row[$ans_code].",";
					}
				}
			}
			$anscodes = substr($anscodes,0,-1);
			if($onecount > 1)
				$outputstring .= "<tr><td>".$class."</td><td>".$subject."</td><td>".$qno."</td><td>".$anscodes."</td></tr>";
		}
	
		$outputstring .= "</table><br>";
		
		$outputstring .= "<table border='1' style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><td colspan='4' align='center'>Questions where more than one answer codes are given mark 0.50</td></tr>";
		$outputstring .= "<tr><td>Class</td><td>Subject</td><td>Qno</td><td>Ans Codes</td></tr>";
		
		$query = "SELECT * FROM ".$tablename.$condition." ORDER By Class, Subject, cast(Qno as unsigned)";
		$result = mysql_query($query) OR die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$anscodes = "";
			$onecount = 0;
			$class = $row["Class"];
			$subject = $row["Subject"];
			$qno = $row["Qno"];
			for($i=1; $i<=10; $i++)
			{
				$ans_code = "ans_code".$i;
				$marks = "marks".$i;
				if($row[$ans_code] != "" || $row[$ans_code] != NULL)
				{
					if(trim($row[$marks]) == "0.50")
					{
						$onecount++;
						$anscodes.=$row[$ans_code].",";
					}
				}
			}
			$anscodes = substr($anscodes,0,-1);
			if($onecount > 1)
				$outputstring .= "<tr><td>".$class."</td><td>".$subject."</td><td>".$qno."</td><td>".$anscodes."</td></tr>";
		}
	
		$outputstring .= "</table><br>";
		
		$qnoarray = array();
		$outputstring .= "<table border='1' style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><td colspan='4' align='center'>Questions where more than one answer codes are given mark 0.25</td></tr>";
		$outputstring .= "<tr><td>Class</td><td>Subject</td><td>Qno</td><td>Ans Codes</td></tr>";
	
		$query = "SELECT * FROM ".$tablename.$condition." ORDER By Class, Subject, cast(Qno as unsigned)";
		$result = mysql_query($query) OR die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$anscodes = "";
			$onecount = 0;
			$class = $row["Class"];
			$subject = $row["Subject"];
			$qno = $row["Qno"];
			
			if(!in_array($qno,$qnoarray))
				array_push($qnoarray,$qno);
				
			for($i=1; $i<=10; $i++)
			{
				$ans_code = "ans_code".$i;
				$marks = "marks".$i;
				if($row[$ans_code] != "" || $row[$ans_code] != NULL)
				{
					if(trim($row[$marks]) == "0.25")
					{
						$onecount++;
						$anscodes.=$row[$ans_code].",";
					}
				}
			}
			$anscodes = substr($anscodes,0,-1);
			if($onecount > 1)
				$outputstring .= "<tr><td>".$class."</td><td>".$subject."</td><td>".$qno."</td><td>".$anscodes."</td></tr>";
		}
	
		$outputstring .= "</table><br>";
		
		$outputstring .= "<table border='1' style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><td colspan='3' align='center'>Questions where more than one scorecard existing for a question</td></tr>";
		$outputstring .= "<tr><td>Class</td><td>Subject</td><td>Qno</td></tr>";
	
		$query = "SELECT Class,Subject,Qno,count(*) FROM ".$tablename.$condition." GROUP BY Class, Subject, Qno HAVING count(*)>1";
		//echo $query;
		$result = mysql_query($query) OR die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$class = $row["Class"];
			$subject = $row["Subject"];
			$qno = $row["Qno"];
			$outputstring .= "<tr><td>".$class."</td><td>".$subject."</td><td>".$qno."</td></tr>";
			
		}
	
		$outputstring .= "</table><br>";
		
		$outputstring .= "<table border='1' style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><td colspan='3' align='center'>Score card not found for following questions</td></tr>";
		
		for($qno=1; $qno<=$this->totalquestions; $qno++)
		{
			if(!in_array($qno,$qnoarray))
				$outputstring .= "<tr><td align='center'>".$qno."</td></tr>";
		}
		$outputstring .= "</table>";
		
		return $outputstring;
		//echo "Done...";
    }
    
    // Function called from lsa_paperwise_showscorecard.php.	Added by Arpit (03/01/2008) - For preparing projectwise scorecard
    function pagePaperwiseShowScoreCard($connid)
    {
    	$this->setgetvars();
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
		$tablename = "anscode_master_all";
		$querystring ="skillblueprintno=".$this->skillblueprintno;
		
    	/*if($this->project != "")
			$tablename = "anscode_master_".strtolower($this->project);

		$queryString = "project=".$this->project."&subject=".$this->subject."&classes=".$this->class."&roundyear=".$this->roundyear;*/

    	$query = "SELECT * FROM ".$tablename." WHERE skillblueprintno=".$this->skillblueprintno." ORDER BY cast(SuggestedQno as UNSIGNED)";
    	$dbquery = new dbquery($query,$connid);

    	/*$papercodequery = "SELECT papercode FROM lsa_anscode_master_details WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND Class='".$this->class."' AND Subject='".$this->subject."'";
    	$papercodedbquery = new dbquery($papercodequery,$connid);
    	$papercoderow = $papercodedbquery->getrowarray();
    	$papercode = $papercoderow["papercode"];*/

    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
    	$output_string .= "<tr><td colspan='2'>";

    	$output_string .= "<table style='border-collapse: collapse' align='center' bordercolor='#333333' width='100%'>";
    	$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='2' align='center'><font size='2'><b><u>Score Card</u></b></font></td></tr>";
	    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='2' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Paper Code: </b>".$this->papercode."</td></font></tr>";
	    $output_string .= "<tr><td colspan='2'><b>For each of the question, refer to the table below and enter the code corresponding to the answer.</b><br><br>";
	    $output_string .= "<tr><td colspan='2'><b><u>Note: </u></b><br>";
	    $output_string .= "1. Items that have not been attempted at all should be coded as 88<br>
						   2. Invalid answers (e.g. question copied, more than one option ticked in multiple choice questions, crossed out answers, illegible answers) should be coded as 86.<br>
						   3. Spelling errors are not to be checked unless indicated specifically.<br>
						   4. Instead of ticking, if a child crosses or circles or marks an option in any other way, or rewrites, that option should be treated as child's choice.";
	    $output_string .= "</td></tr>";
	    $output_string .= "<tr><td colspan='2'>&nbsp;</td></tr>";
	    $output_string .= "</table>";

	    $output_string .= "</td></tr>";
	    /*$output_string .= "</table>";
		return $output_string;
		exit;*/
	    $optionsArray = array("A","B","C","D","E");
	    while($row = $dbquery->getrowarray())
		{
			//$output_string .= "<tr><td colspan='2' bgcolor='#FFF0F5'><b>".$row['Qno'].".</b></td></tr>";
			
			$output_string .= "<tr>";
			if(($row['Qno'] != $row['SuggestedQno']) && $row['SuggestedQno'] !="")
				$output_string .= "<td colspan='2' bgcolor='#FFF0F5'><b>".$row['SuggestedQno'].".</b></td></tr>";
			else
				$output_string .= "<td colspan='2' bgcolor='#FFF0F5'><b>".$row['Qno'].".</b></td></tr>";
				
			$option_string = "";
			if($row["mcq"] == 1)
			{
				for($i=1;$i<=10;$i++)
			    {
			    	$desc = "desc".$i; $anscode = "ans_code".$i; $marks = "marks".$i;
			    	if(in_array($row[$anscode], $optionsArray))
			    		$option_string .= $row[$anscode].",";
			    }
			    $option_string = substr($option_string,0,-1);
			    $mcq_desc = "Option ticked (enter option ".$option_string." in English)";
			    $output_string .= "<tr><td>".$mcq_desc."</td><td>&#60;Option Letter&#62;</td></tr>";
	    		if($row["comments"] !="")
	    			$output_string .= "<tr><td colspan='2'><i><b>Note:</b> ".$row["comments"]."</i></td></tr>";
			}
			else
			{
				for($i=1;$i<=10;$i++)
			    {
			    	$desc = "desc".$i; $anscode = "ans_code".$i; $marks = "marks".$i;
			    	if($row[$desc]!="" && $row[$anscode]!='86' && $row[$anscode] != '88')
			    	{
						$description = Dotagtoimage($this->imagefolder, $row[$desc]);
			    		$output_string .= "<tr><td>".stripslashes($description)."</td><td>".$row[$anscode]."</td></tr>";
			    	}
			    }
			    if($row["comments"] !="")
			    	$output_string .= "<tr><td colspan='2'><i><b>Note:</b> ".$row["comments"]."</i></td></tr>";
			}
		}

		$checkscorecard = "<a href='lsa_paperwise_checkscorecard.php?".$querystring."'>Check Scorecard</a>";
		$analysiscomments = "<a href='lsa_showevaluatorcommenst.php?".$querystring."'>Evaluator Comments</a>";
		$output_string .= "<tr><td colspan='2' align='center'><a href='lsa_projectwise_rawscore_status.php?roundyear=$this->roundyear'>Projectwise Raw Score Status</a>&nbsp&nbsp;".$checkscorecard."&nbsp&nbsp;".$analysiscomments."</td></tr>";
		$output_string .= "</table>";
		return  $output_string;
    }

    function pageShowAnalysisComments($connid)
    {
    	$this->setgetvars();
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
		$tablename = "lq_questions";
		$querystring ="skillblueprintno=".$this->skillblueprintno;

    	$query = "SELECT * FROM ".$tablename." WHERE skillblueprintno=".$this->skillblueprintno." ORDER BY cast(SuggestedQno as UNSIGNED)";
    	$dbquery = new dbquery($query,$connid);
    	
    	$output_string = "<table style='border-collapse: collapse' border='1' align='center' width='80%'>";
    	$output_string .= "<tr><th>Qno</th><th>Evaluator Comments</th></tr>";
    	
	    while($row = $dbquery->getrowarray())
		{
		    if($row["forEvaluator"] !="")
		    	$output_string .= "<tr><td align='center'>".$row['Qno']."</td><td>".$row["forEvaluator"]."</td></tr>";
		}

		$checkscorecard = "<a href='lsa_paperwise_checkscorecard.php?".$querystring."'>Check Scorecard</a>";
		$output_string .= "<tr><td colspan='2' align='center'><a href='lsa_projectwise_rawscore_status.php?roundyear=$this->roundyear'>Projectwise Raw Score Status</a></td></tr>";
		$output_string .= "</table>";
		return  $output_string;
    }
    
	// Function added by Arpit on 11/12/2007 - called from lsa_prepare_rawscorefile.php
	function pageCompletedQuestions($connid)
	{
		//$queryString = "project=".$this->project."&subject=".$this->subject."&classes=".$this->class."&roundyear=".$this->roundyear;
		$queryString ="skillblueprintno=".$this->skillblueprintno;
		//$tablename = "anscode_master_".strtolower($this->project);
		$tablename = "anscode_master_all";
		$condition = "WHERE Class='".$this->class."' AND Subject='".$this->subject."' AND roundyear='".$this->roundyear."' AND project='".$this->project."'";
		$query = "SELECT Qno,SuggestedQno FROM ".$tablename." ".$condition." ORDER BY Qno";
		$dbquery = new dbquery($query,$connid);
		$output_string = "";
		while($row = $dbquery->getrowarray())
		{
			$queryString1 = $queryString."&qnotoedit=".$row['Qno']."&pagetoreturn=lsa_prepare_rawscorefile.php";

			if(($row['Qno'] != $row['SuggestedQno']) && $row['SuggestedQno'] !="")
				$output_string .= "<td align='center'><a href='javascript: update_question(\"".$queryString1."\")'>".$row['SuggestedQno']."</a></td>";
			else
				$output_string .= "<td align='center'><a href='javascript: update_question(\"".$queryString1."\")'>".$row['Qno']."</a></td>";				
				
			
			//$output_string .= "<td><a href='lsa_editquestion.php?".$queryString1."'>".$row['Qno']."</a></td>";
		}
		return  $output_string;
	}

	// Function added by Arpit on 11/12/2007 - called from function pageValidateRawScoreMasterData($connid)
	function prepareQuery()
	{
		$optionArray = array('A','B','C','D');
		$setString1 = "";
		$index=0;
		if($this->inputmarks == "yes")
		{
			$index = 1;
			for($i=0; $i<$this->totalvaliddescriptions; $i++)
			{
				if($this->anscodes[$i] == "" || $this->marks[$i] == "")
					continue;
				else
				{
					if($this->anscodes[$i]!="86" && $this->anscodes[$i]!="88")
					{
						$setString1 .= " desc".$index."='".$this->descriptions[$i]."', ans_code".$index."='".$this->anscodes[$i]."', marks".$index."=".$this->marks[$i].",";
						$index++;
					}
				}
			}
		}
		if($this->inputmarks == "no")
		{
			$index = 1;
			for($i=0; $i<$this->totalvaliddescriptions; $i++)
			{
				if($this->descriptions[$i] == "" && $this->anscodes[$i] == "" && $this->marks[$i] == "")
					continue;
				else
				{
					if($this->anscodes[$i]!="86" && $this->anscodes[$i]!="88")
					{
						$setString1 .= " desc".$index."='".$this->descriptions[$i]."', ans_code".$index."='".$this->anscodes[$i]."',";
						$index++;
					}
				}
			}
		}

		// Invalid answer code or more than one options selected desc, anscode, marks
		$setString1 .= " desc".$index."='".$this->morethanoneoptionticked_desc."', ans_code".$index."='".$this->morethanoneoptionticked_anscode."', marks".$index."=".$this->morethanoneoptionticked_marks.",";
				
		// Not attempted desc, anscode, marks
		$index++;
		$setString1 .= " desc".$index."='".$this->notattempted_desc."', ans_code".$index."='".$this->notattempted_anscode."', marks".$index."=".$this->notattempted_marks.",";
		
		if($this->comments!="")
			$setString1 .= " comments='".$this->comments."',";

		return $setString1;
	}

	function fetchProjects($connid)
	{
		$projectNames = array();
		$query = "SELECT project FROM lsa_projects WHERE sbu='Large Scale Assessments' ORDER BY project";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectNames,$row["project"]);
		}
		return $projectNames;
	}

	function fetchProjectsLSAASSET($connid)
	{
		$projectNames = array();
		array_push($projectNames,"ASSET");
		$query = "SELECT project FROM lsa_projects WHERE sbu='Large Scale Assessments' ORDER BY project";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectNames,$row["project"]);
		}
		
		return $projectNames;
	}
	
	function fetchProjectRounds($connid)
	{
		$projectRoundNames = array();
		$query = "SELECT roundyear FROM lsa_projects_rounds ORDER BY roundyear";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectRoundNames,$row["roundyear"]);
		}
		return $projectRoundNames;
	}
	
	function fetchProjectRoundsLSAASSET($connid)
	{
		$projectRoundNames = array();
		$query = "SELECT roundyear FROM lsa_projects_rounds ORDER BY roundyear";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectRoundNames,$row["roundyear"]);
		}
		
		$query = "SELECT DISTINCT test_edition FROM educatio_educat.paper_details ORDER BY test_edition";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectRoundNames,$row["test_edition"]);
		}
		return $projectRoundNames;
	}
	
	function fetchProjectRoundsASSET($connid)
	{
		$projectRoundNames = array();
		$query = "SELECT DISTINCT test_edition FROM educatio_educat.paper_details ORDER BY test_edition";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectRoundNames,$row["test_edition"]);
		}
		return $projectRoundNames;
	}

    function insertProject($connid)
    {
    	$insQuery = "INSERT INTO lsa_projects SET project='".$this->project_other."', sbu='Large Scale Assessments'";
    	$insdbquery = new dbquery($insQuery,$connid);

    }
    function insertRound($connid)
    {
    	$insQuery = "INSERT INTO lsa_projects_rounds SET roundyear='".$this->roundyear_other."'";
    	$insdbquery = new dbquery($insQuery,$connid);
    }
    function checkForDuplicateQuestion($tablename, $connid)
	{
		$returnvalue="";
		$condition = " WHERE Class='".$this->class." AND Subject='".$this->subject."'AND Qno=".$this->qno." AND roundyear='".$this->roundyear."' AND project='".$this->project."'";
		$dupQuery = "SELECT COUNT(*) FROM ".$tablename.$condition ;
		$dupdbquery = new dbquery($dupQuery,$connid);
		$duprow = $dupdbquery->getrowarray();
		if($duprow[0] != 0)
		{
			$returnvalue = "Duplicate Question";
		}
		else
		{
			$returnvalue = "";
		}
		return $returnvalue;
	}
    function createTable($connid)
    {
    	   $tablename = "anscode_master_".strtolower($this->project_other);
    	   $createQuery = "CREATE TABLE ".$tablename." (
		  `Class` varchar(5) default NULL,
		  `Subject` varchar(15) default NULL,
		  `Qno` smallint(6) default NULL,
		  `SuggestedQno` varchar(5) NOT NULL default '',
		  `SkillNo` smallint(6) default NULL,
		  `MechConc` char(1) default NULL,
		  `SfNsf` char(3) NOT NULL default '',
		  `desc1` varchar(250) NOT NULL default '',
		  `ans_code1` char(2) default NULL,
		  `marks1` decimal(3,2) default NULL,
		  `desc2` varchar(250) NOT NULL default '',
		  `ans_code2` char(2) default NULL,
		  `marks2` decimal(3,2) default NULL,
		  `desc3` varchar(250) NOT NULL default '',
		  `ans_code3` char(2) default NULL,
		  `marks3` decimal(3,2) default NULL,
		  `desc4` varchar(250) NOT NULL default '',
		  `ans_code4` char(2) default NULL,
		  `marks4` decimal(3,2) default NULL,
		  `desc5` varchar(250) NOT NULL default '',
		  `ans_code5` char(2) default NULL,
		  `marks5` decimal(3,2) default NULL,
		  `desc6` varchar(250) NOT NULL default '',
		  `ans_code6` char(2) default NULL,
		  `marks6` decimal(3,2) default NULL,
		  `desc7` varchar(250) NOT NULL default '',
		  `ans_code7` char(2) default NULL,
		  `marks7` decimal(3,2) default NULL,
		  `desc8` varchar(250) NOT NULL default '',
		  `ans_code8` char(2) default NULL,
		  `marks8` decimal(3,2) default NULL,
		  `desc9` varchar(250) NOT NULL default '',
		  `ans_code9` char(2) default NULL,
		  `marks9` decimal(3,2) default NULL,
		  `desc10` varchar(250) NOT NULL default '',
		  `ans_code10` char(2) default NULL,
		  `marks10` decimal(3,2) default NULL,
		  `roundyear` varchar(20) NOT NULL default '',
		  `mcq` char(1) NOT NULL default '',
		  `comments` text NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;
		";
    	   $createdbquery = new dbquery($createQuery,$connid);
    }
    
    function fetchPaperVersion($sbpno,$papercode,$connid)
    {
    	$query = "SELECT medium FROM lqv_sbpno_mapping WHERE skillblueprintno=".$sbpno." AND papercode='".$papercode."'";
    	$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
    	return $row['medium'];
    }
    
    function setbasevars($skillblueprintno,$flag,$connid)
    {
    	if($this->skillblueprintno!=0)
    		$query = "SELECT * FROM lsa_anscode_master_details WHERE skillblueprintno=".$this->skillblueprintno;
    	elseif ($skillblueprintno!=0)
    		$query = "SELECT * FROM lsa_anscode_master_details WHERE skillblueprintno=".$skillblueprintno;
    		
    	$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->project = $row['project'];
		$this->roundyear = $row['roundyear'];
		$this->class = $row['class'];
		$this->subject = $row['subject'];
		if($flag==1)
		{
			$this->totalquestions = $row['totalquestions'];
			$this->papercode = $row['papercode'];
		}
		$this->category = $row['category'];
    }
    
    function updatepaperdetail($connid)
    {	
    	$this->setgetvars();	
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,0,$connid);	         
		if($this->action == "Edit Paper Details")
	    {		
			//$condition = "WHERE project='". $this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."'  AND Class='".$this->class."'";
			$query = "SELECT * FROM lsa_anscode_master_details WHERE skillblueprintno=".$this->skillblueprintno;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$oldpapercode = $row['papercode'];
			$oldTotQue = $row['totalquestions'];
			
			$condition = "WHERE skillblueprintno=".$this->skillblueprintno;
			$updatequery = "UPDATE lsa_anscode_master_details SET papercode='".$this->papercode."', totalquestions=".$this->totalquestions."  ".$condition;
			//echo $updatequery; //exit;
			$dbupdatequery = new dbquery($updatequery,$connid);
			
			$addQuestions=$this->totalquestions-$oldTotQue;
			if ($addQuestions>0)
			{				
				$query = "SELECT * FROM lqv_sbpno_mapping WHERE skillblueprintno=".$this->skillblueprintno;
	    		$dbquery = new dbquery($query,$connid);
	    		if ($dbquery->numrows()>0)
	    		{
					while ($row=$dbquery->getrowarray())
					{	
						$qno=$oldTotQue+1;
						for ($i=1;$i<=$addQuestions;$i++)
						{
							$selquery="SELECT COUNT(*) FROM lq_questions_vernaculars WHERE qno=".$qno." AND papercode='".$row['papercode']."' AND skillblueprintno=".$this->skillblueprintno;
							$seldbquery = new dbquery($selquery,$connid);
							$selrow=$seldbquery->getrowarray();
							//echo "<br>".$selrow['COUNT(*)'];
							if ($selrow['COUNT(*)']==1)
								$insquery = "UPDATE lq_questions_vernaculars SET isDeleted='N' WHERE qno=".$qno." AND papercode='".$row['papercode']."' AND skillblueprintno=".$this->skillblueprintno;
							else if ($selrow['COUNT(*)']==0)
								$insquery = "INSERT INTO lq_questions_vernaculars SET qno=".$qno.",SuggestedQno=".$qno.", papercode='".$row['papercode']."', skillblueprintno=".$this->skillblueprintno;
							//echo "<br>$insquery";
							$insdbquery = new dbquery($insquery,$connid);
							$qno++;
						}
					}
	    		}
			}
			elseif ($addQuestions<0)
			{
				$addQuestions= -($addQuestions);
				$qno=$oldTotQue;
				for ($i=1;$i<=$addQuestions;$i++)
				{
					//delete question entry
					$insquery = "DELETE FROM lq_questions WHERE qno=".$qno." AND skillblueprintno=".$this->skillblueprintno;
					//echo "<br>$insquery";
					$insdbquery = new dbquery($insquery,$connid);
					
					//delete rawscore entry
					$insquery = "DELETE FROM anscode_master_all WHERE qno=".$qno." AND skillblueprintno=".$this->skillblueprintno;
					//echo "<br>$insquery";
					$insdbquery = new dbquery($insquery,$connid);
					$qno--;
				}
				$query = "SELECT * FROM lqv_sbpno_mapping WHERE skillblueprintno=".$this->skillblueprintno;
	    		$dbquery = new dbquery($query,$connid);
	    		if ($dbquery->numrows()>0)
	    		{
	    			while ($row=$dbquery->getrowarray())
					{						
						//echo "<br>$addQuestions";
						$qno=$oldTotQue;
						for ($i=1;$i<=$addQuestions;$i++)
						{
							$updquery = "UPDATE lq_questions_vernaculars SET isDeleted='Y' WHERE qno=".$qno." AND papercode='".$row['papercode']."' AND skillblueprintno=".$this->skillblueprintno;
							//echo "<br>$updquery";
							$upddbquery = new dbquery($updquery,$connid);
							$qno--;
						}
					}
	    		}
			}
			
			$updatequery = "UPDATE lq_questions SET papercode_ref='".$this->papercode."' WHERE papercode_ref='".$oldpapercode."'";
			//echo "<br>".$updatequery; exit;
			$dbupdatequery = new dbquery($updatequery,$connid);
			
			$updatequery = "UPDATE lq_questions SET papercode1_ref='".$this->papercode."' WHERE papercode1_ref='".$oldpapercode."'";
			//echo "<br>".$updatequery; exit;
			$dbupdatequery = new dbquery($updatequery,$connid);
			echo "<script>window.location='lsa_paperwise_rawscore_status.php?project=".$this->project."&roundyear=".$this->roundyear."' ;</script>";
		}
	
    	//$query = "SELECT * FROM lsa_anscode_master_details WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."'  AND Class='".$this->class ."' ORDER BY class,subject";
    	$query = "SELECT * FROM lsa_anscode_master_details WHERE skillblueprintno=".$this->skillblueprintno ." ORDER BY class,subject";
    	$dbquery = new dbquery($query,$connid);
    	$output_string  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
        $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='8' align='center'><b>Paperwise Status</a></b></td></tr>";
        $output_string .= "<tr><td colspan='8' align='center'><b>Project:</b>&nbsp;".$this->project."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Round:</b>&nbsp;".$this->roundyear."</td></tr>";
        $output_string .= "<tr><td align='center'><b>Sr. No.</b></td><td  align='center'><b>Papercode</b></td><td align='center'><b>Class</b></td><td  align='center'><b>Subject</b></td><td  align='center'><b>Total questions<br>to enter</b></td></tr>";
    	$srno = 1;
		while($row = $dbquery->getrowarray())
		{
			$total_qeustions_to_enter = $row['totalquestions'];
			$output_string .= "<tr><td align='center'>".$srno."</td><td><input type='text' name='papercode' value='".$row['papercode']."'></td><td>".$row['class']."</td><td align='center'>".$row['subject']."</td><td align='center'><input type='text' name='totalquestions' value='".$row['totalquestions']."'></td></tr>";
			$srno++;
		}
		$output_string .= "<tr><td align='center' colspan='8'><input type='button' value='Update' onclick='return validation_paperdetails_edit(".$this->skillblueprintno.")'></td></tr>";
		$output_string .= "<tr><td align='center' colspan='8'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."'>Projectwise Raw Score Status</a></td></tr>";
		$output_string .= "</table>";
		$output_string .="<input type='hidden' name='actiontoperform' >";
		$output_string .="<input type='hidden' name='skillblueprintno' value='".$this->skillblueprintno."'>";
		return  $output_string;
    }
    
    function checkIsQuestionInserted($connid)
    {
    	$questionsinserted=array();
    	$condition  = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."' AND ";
		$condition .= "class='".$this->class."'";
		$query = "SELECT Qno FROM lq_questions".$condition;
		//echo $query."<br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($questionsinserted,$row['Qno']);
		}
		return $questionsinserted;
		
    }
    // LSA - QMS Functions Starts Here
    function pageValidateQuestionsMasterData($username,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
		
		if($this->project != "")
			$tablename = "lq_questions";
		
		if($this->action == "Skip Question")
		{
			$this->qno++;

			//$condition = " WHERE project='".$this->project."' AND subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
			/*$condition ="skillblueprintno=".$this->skillblueprintno;
			$query = "SELECT * FROM lsa_anscode_master_details".$condition;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->numrows();
			$rowtotalquestions = $dbquery->getrowarray();
			$this->totalquestions = $rowtotalquestions["totalquestions"];*/
			
			$condition1 = "WHERE subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."' AND project='".$this->project."'";
			$questionsquery = "SELECT COUNT(*) FROM ".$tablename." ".$condition1;
			$dbquestionsquery = new dbquery($questionsquery,$connid);
			$questionsrow = $dbquestionsquery->getrowarray();
			$totalquestionsentered = $questionsrow['COUNT(*)'];
			if($this->totalquestions <= $totalquestionsentered)
				$returnvalue = "All Questions Are Inserted...";
			else
				$returnvalue = "Question Data Inserted";

			return $returnvalue;
		}	
		
		if($this->action == "Validate Raw Score Master Data")
		{
			$returnvalue = "";
			if($this->project=="Other")
				$condition = " WHERE project='".$this->project_other."'";
			else
				$condition = " WHERE project='".$this->project."'";

			if($this->roundyear=="Other")
				$condition .= " AND roundyear='".$this->roundyear_other."'";
			else
				$condition .= " AND roundyear='".$this->roundyear."'";

			$condition .= " AND subject='".$this->subject."' AND class='".$this->class."'";

			$query = "SELECT * FROM lsa_anscode_master_details".$condition;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->numrows();
			$rowtotalquestions = $dbquery->getrowarray();
			if($row == 0 && $this->totalquestions == 0)
			{
				$returnvalue = "Total Questions Not Given";
			}
			elseif ($row == 0 && $this->totalquestions > 0)
			{
				if($this->project=="Other")
				{
					//$this->createTable($connid);
					$this->insertProject($connid);
					$this->project = $this->project_other;
				}
				if($this->roundyear=="Other")
				{
					$this->insertRound($connid);
					$this->roundyear = $this->roundyear_other;
				}

				$insertquery = "INSERT INTO lsa_anscode_master_details SET project='".$this->project."', subject='".$this->subject."', class='".$this->class."', totalquestions=".$this->totalquestions.", roundyear='".$this->roundyear."', papercode='".$this->papercode."'";
				//echo $insertquery;
				$dbinseertquery = new dbquery($insertquery,$connid);

				$this->qno = 1;
				$returnvalue = "Master Data Inserted";
			}
			else
			{
				//$condition1 = "WHERE subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
				$condition1 ="WHERE skillblueprintno=".$this->skillblueprintno;
				$questionsquery = "SELECT Qno FROM ".$tablename." ".$condition1." ORDER BY Qno DESC";
				$dbquestionsquery = new dbquery($questionsquery,$connid);
				$questionsrow = $dbquestionsquery->getrowarray();

				$this->totalquestions = $rowtotalquestions["totalquestions"];
				$this->qno = $questionsrow["Qno"];
				$this->qno++;
				
				$questionsquery = "SELECT COUNT(*) FROM ".$tablename." ".$condition1;
				//echo $questionsquery;
				$dbquestionsquery = new dbquery($questionsquery,$connid);
				$questionsrow = $dbquestionsquery->getrowarray();
				$totalquestionsentered = $questionsrow['COUNT(*)'];
				
				if($this->totalquestions <= $totalquestionsentered)
					$returnvalue = "All Questions Are Inserted...";
				else
					$returnvalue = "Master Data Inserted";
			}
			return $returnvalue;
		} // if($this->action == "Validate Raw Score Master Data")

		if($this->action == "Validate And Insert Question")
		{
			/*echo "<pre>";
			print_r ($_REQUEST);
			//print_r ($_FILES);
			echo "</pre>";*/
			//exit;
			//$skillblueprintno = $this->fetchSkillBlueprintNo($connid);
			//$insertedquestions = explode(",",$_POST['questionsinserted']);
			$insertedquestions = $this->checkIsQuestionInserted($connid);
			
			/*echo "<pre>";
			print_r ($_FILES);
			echo "</pre>";*/
				
			/*if($this->project=="ArpitTest")
			{
				echo "<pre>";
				print_r ($_POST);
				echo "</pre>";
				
				echo "<pre>";
				print_r ($_FILES);
				echo "</pre>";
				exit;
			}*/
			//echo $skillblueprintno."<br>";
			
			/*echo "<pre>";
			print_r ($insertedquestions);
			echo "</pre>";
			exit;*/
			
			//$anscodetablename = "anscode_master_".strtolower($this->project);
			$anscodetablename = "anscode_master_all";
			$existing_files = array();
			$existing_files_str = "";
			$toqno="";
			$gtid='';
			for($qno=1; $qno<=$this->totalquestions;$qno++)
			{				
				//if($_POST["question$qno"]!="")
				//{
				
					//group text
				//	echo "Qno $qno started - ".date("H:i:s")."<br>";
					if(isset($_POST["gt$qno"]) && $_POST["gt$qno"]!="")
					{
						$grouptext="";
						if (isset($_POST["grouptext$qno"]) && $_POST["grouptext$qno"]!="")
							$grouptext=$_POST["grouptext$qno"];
						$gtid=$_POST["gtid$qno"];
						$fromqno=$_POST["gtfrom$qno"];
						$toqno=$_POST["gtto$qno"];
						if ($gtid!='')
						{
							$query="UPDATE lq_grouptext_master SET grouptext='$grouptext',skillblueprintno='$this->skillblueprintno',qnofrom='$fromqno',qnoto='$toqno' WHERE grouptextid='$gtid'";
							//echo "<br>".$query;
							mysql_query($query) or die("group text error - ".mysql_error());
						}
						else if ($grouptext!='' && $gtid=='')
						{
							$query="INSERT INTO lq_grouptext_master SET grouptext='$grouptext',skillblueprintno='$this->skillblueprintno',qnofrom='$fromqno',qnoto='$toqno'";
							//echo "<br>".$query;
							mysql_query($query) or die("group text error - ".mysql_error());
							$gtid=mysql_insert_id();
						}
					}
					if ($gtid!='' && $qno<=$toqno)
					{
						$addgtid = ",grouptextid='$gtid'";
					}
					else 
						$addgtid=",grouptextid=0";
					//echo "$qno  --  $addgtid<br>";
					
					
					///////// Row score entry starts here for MCQ questions ////////
					
					if(isset($_POST["mcq$qno"]) && $_POST["mcq$qno"]!="")
					{
				    	$mcqcodes = array('A','B','C','D','86','88');
						$condition = "WHERE Subject='".$this->subject."' AND Class='".$this->class."' AND Qno=".$qno." AND roundyear='".$this->roundyear."' AND project='".$this->project."'";
						$delquery = "DELETE FROM ".$anscodetablename." ".$condition;
						//echo $delquery."<br><br>";// exit;
						$delquery_res = new dbquery($delquery,$connid);
							
						//$setString = "skillblueprintno=".$this->skillblueprintno.", project='".$this->project."', Class='".$this->class."', Subject='".$this->subject."', Qno=".$_POST["suggqno$qno"].",SuggestedQno='".$_POST["suggqno$qno"]."', roundyear='".$this->roundyear."', mcq='1',";
						$setString = "skillblueprintno=".$this->skillblueprintno.", project='".$this->project."', Class='".$this->class."', Subject='".$this->subject."', Qno=".$qno.",SuggestedQno='".$_POST["suggqno$qno"]."', roundyear='".$this->roundyear."', mcq='1',";
						$setString .= "desc1='Option ticked (enter option A,B,C,D in English)',";
						if(isset($_POST["sfnsf$qno"]))
						{
							if($_POST["sfnsf$qno"]=="S")
								$setString .= "SfNsf='S',";
							else 
								$setString .= "SfNsf='NSF',";
						}
							
						for($mi=0; $mi<count($mcqcodes);$mi++)
						{					
							$ai=$mi+1;
							$anscode = $mcqcodes[$mi];
							if($anscode==$_POST["correctanswer$qno"])
								$setString .= "ans_code".$ai."='".$anscode."',marks".$ai."='1.00',";
							else 
								$setString .= "ans_code".$ai."='".$anscode."',marks".$ai."='0.00',";
							
							if($anscode=="86")
								$setString .= "desc".$ai."='Invalid Answer Code/More Than One Option Ticked',";
							if($anscode=="88")
								$setString .= "desc".$ai."='Not Attempted',";
						}
						$setString = substr($setString, 0, -1);
						$insertquery = "INSERT INTO ".$anscodetablename." SET ".$setString;
						//echo $insertquery."<br>"; 
						$dbinseertquery = new dbquery($insertquery,$connid);
					}
				//	echo "rawscore entry - ".date("H:i:s")."<br>";
					///////// Row score entry ends here for MCQ questions ////////
					
					if(in_array($qno,$insertedquestions)) // Update questions
					{
						$condition  = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."' AND ";
						$condition .= "class='".$this->class."' AND Qno=".$qno;
						
						$upreference = "UPDATE lq_questions SET qno_ref=".$_POST["suggqno$qno"]." WHERE papercode_ref='".$this->papercode."' AND qno_ref=".$qno;
						mysql_query($upreference) OR die("REF Change: ".mysql_error());
						/*echo "<br>".$upreference;
						exit;*/
					//	echo "reference update - ".date("H:i:s")."<br>";
					
						$upreference1 = "UPDATE lq_questions SET qno1_ref=".$_POST["suggqno$qno"]." WHERE papercode1_ref='".$this->papercode."' AND qno1_ref=".$qno;
						mysql_query($upreference1) OR die("REF Change1: ".mysql_error());
						/*echo "<br>".$upreference;
						exit;*/
						
						// Update score card suggested qno -  Starts here
						if(!isset($_POST["mcq$qno"]) && $_POST["mcq$qno"]=="")
						{
							$condition_sc  = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."' AND class='".$this->class."' AND Qno=".$qno;
							$updquery_sc = "UPDATE ".$anscodetablename." SET SuggestedQno=".$_POST["suggqno$qno"].$condition_sc;
							$dbupd_sc = new dbquery($updquery_sc,$connid);
							//echo $updquery_sc."<br>";
						}
						// Update score card suggested qno -  Ends here
						
						for($pn=1; $pn<=4; $pn++)
						{
							$picno = "picture".$qno."_".$pn;
							if($_FILES[$picno]["tmp_name"]!="")
							{
								$picname = $_FILES[$picno]["name"];
								$uploadfile = "images/questionimages/".$picname;
								//echo $picname."<br>";
								//checkfileType($picno,1);
									
								if (file_exists("images/questionimages/".$_FILES[$picno]["name"]))
								{	
									array_push($existing_files,$_FILES[$picno]["name"]);
									if(isset($_POST['overwrite']))
									{
										move_uploaded_file($_FILES[$picno]["tmp_name"], $uploadfile);
										$existing_files_str .= "$picname, ";
										chmod($uploadfile,0644);
										//echo "<font color=red>File overwriten</font><br>";
									}
									else 
									{
										echo "<center><font color=red>".$picname." in Qustion number ".$qno." already exist.</font></center><br>";
										$picname = "";
									}
								}
								else 
								{
									move_uploaded_file($_FILES[$picno]["tmp_name"], $uploadfile);
									chmod($uploadfile,0644);
									//ho $picname." uploaded.";
								}
								/*if(!move_uploaded_file($_FILES[$picno]["tmp_name"], $uploadfile))
									echo "Possible file upload attack...";
								else
									chmod($uploadfile,0644);*/
								//$updquery .= "figure='".$picname."',";
								//echo "image upload of question $qno - ".date("H:i:s")."<br>";
							}
						}
						$repeattype=$_POST["IRSR".$qno."_t"];
						$updquery  = "UPDATE lq_questions SET skillblueprintno=".$this->skillblueprintno.", SuggestedQno=".$_POST["suggqno$qno"].",repeattype='$repeattype',";

						$questionstr = $this->removeFirstPtag($_POST["question$qno"]);
						//$updquery .= " question='".$_POST["question$qno"]."' ";
						
						for($pn=1; $pn<=4; $pn++)
						{
							$picno = "picture".$qno."_".$pn;
							if($_FILES[$picno]["name"]!="")
							{
								if (in_array($_FILES[$picno]["name"],$existing_files)  && (!isset($_POST['overwrite'])))
									continue;	
								else if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="")
									$questionstr .= "[--".$_FILES[$picno]["name"]."--] ";
								else 
									$questionstr .= "[".$_FILES[$picno]["name"]."] ";
							}
						}
						//$questionstr=addslashes($questionstr);
						$updquery .= " question='".$questionstr."',";
												
						if(isset($_POST["mcq$qno"]) && $_POST["mcq$qno"]!="")
						{
							$updquery .= "mcq='Y',";
							$updquery .= "optiona='".$this->removeFirstPtag($_POST["opa$qno"])."',optionb='".$this->removeFirstPtag($_POST["opb$qno"])."', optionc='".$this->removeFirstPtag($_POST["opc$qno"])."', optiond='".$this->removeFirstPtag($_POST["opd$qno"])."',";
						}
						else 
						{
							$updquery .= "mcq='N',";
							$updquery .= "optiona='',optionb='', optionc='', optiond='',";
						}
								
						if(isset($_POST["IR$qno"]) && $_POST["IR$qno"]!="")
							$updquery .= "repeattype='IR',";
							
						if(isset($_POST["SR$qno"]) && $_POST["SR$qno"]!="")
							$updquery .= "repeattype='SR',";
							
						/*if(isset($_POST["used$qno"]) && $_POST["used$qno"]!="")
							$updquery .= "used='Y',";
						else 
							$updquery .= "used='N',";*/
							
						if(isset($_POST["sfnsf$qno"]) && $_POST["sfnsf$qno"]!="")
							$updquery .= "sfnsf='".$_POST["sfnsf$qno"]."',";
							
						if(isset($_POST["gow$qno"]) && $_POST["gow$qno"]!="")
							$updquery .= "gow='".$_POST["gow$qno"]."',";
							
						if((isset($_POST["correctanswer$qno"]) && $_POST["correctanswer$qno"]!="") && (isset($_POST["mcq$qno"]) && $_POST["mcq$qno"]!=""))
							$updquery .= "correct_answer='".$_POST["correctanswer$qno"]."',";
						else 
							$updquery .= "correct_answer='',";
							
						if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="")
							$updquery .= "isasset='Y',";
						else 
							$updquery .= "isasset='N',";
							
						if(isset($_POST["isda$qno"]) && $_POST["isda$qno"]!="")//check if DA question
							$updquery .= "isda='Y',";
						else 
							$updquery .= "isda='N',";
							
						if(isset($_POST["isrefverna$qno"]) && $_POST["isrefverna$qno"]!="")//check if vernacular question
							$updquery .= "isrefverna='Y',";
						else 
							$updquery .= "isrefverna='N',";
							
						if(isset($_POST["iscqb$qno"]) && $_POST["iscqb$qno"]!="")
							$updquery .= "iscqb='Y',";
						else 
							$updquery .= "iscqb='N',";
							
						if(isset($_POST["passageid$qno"]) && $_POST["passageid$qno"]!="")
							$updquery .= "passageid=".$_POST["passageid$qno"].",";
						elseif(isset($_POST["passageid$qno"]) && $_POST["passageid$qno"]=="")
							$updquery .= "passageid=0,";
				
						//if(isset($_POST["forproduction$qno"]) && $_POST["forproduction$qno"]!="")
						if(isset($_POST["forproduction$qno"]))
							$updquery .= "forProduction='".$_POST["forproduction$qno"]."',";
							
						//if(isset($_POST["forevaluator$qno"]) && $_POST["forevaluator$qno"]!="")
						if(isset($_POST["forevaluator$qno"]))
							$updquery .= "forEvaluator='".$_POST["forevaluator$qno"]."',";
						
						if(isset($_POST["foranalysis$qno"]))
							$updquery .= "forAnalyser='".$_POST["foranalysis$qno"]."',";	
						
						if(isset($_POST["qcode_ref$qno"]) && $_POST["qcode_ref$qno"]!="")
						{
							$updquery .= "qcode_ref='".$_POST["qcode_ref$qno"]."',";
							if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{
								$assetref = $this->fetchAssetRef(0,$_POST["qcode_ref$qno"],$connid);
								$updquery .= $assetref.",";
							}
							else if(isset($_POST["iscqb$qno"]) && $_POST["iscqb$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{
								// Do nothing
							}
							else if(isset($_POST["isda$qno"]) && $_POST["isda$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{								
								$daref = $this->fetchDARef(0,$_POST["qcode_ref$qno"],$connid);
								$updquery .= $daref.",";
							}
							else if(isset($_POST["isrefverna$qno"]) && $_POST["isrefverna$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{								
								$vernaref = $this->fetchVernaRef(0,$_POST["qcode_ref$qno"],$connid);
								$updquery .= $vernaref.",";
							}							
							else 
							{
								$lsaref = $this->fetchLSARef(0,$_POST["qcode_ref$qno"],$connid);
								$this->importScorecardForQuestion($this->skillblueprintno,$qno,$_POST["qcode_ref$qno"],$connid);
								$updquery .= $lsaref.",";
							}
						}
						if (isset($_POST["qcode1_ref$qno"]) && $_POST["qcode1_ref$qno"]!="") // for second reference 
						{
							$updquery .= "qcode1_ref='".$_POST["qcode1_ref$qno"]."',";
							if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="")
							{
								$assetref = $this->fetchAssetRef(1,$_POST["qcode1_ref$qno"],$connid);
								$updquery .= $assetref.",";
							}
							else if(isset($_POST["iscqb$qno"]) && $_POST["iscqb$qno"]!="")
							{
								// Do nothing
							}
							else if(isset($_POST["isda$qno"]) && $_POST["isda$qno"]!="")
							{								
								$daref = $this->fetchDARef(1,$_POST["qcode1_ref$qno"],$connid);
								$updquery .= $daref.",";
							}
							else if(isset($_POST["isrefverna$qno"]) && $_POST["isrefverna$qno"]!="")
							{								
								$vernaref = $this->fetchVernaRef(1,$_POST["qcode1_ref$qno"],$connid);
								$updquery .= $vernaref.",";
							}							
							else 
							{
								$lsaref = $this->fetchLSARef(1,$_POST["qcode1_ref$qno"],$connid);
								//$this->importScorecardForQuestion($this->skillblueprintno,$qno,$_POST["qcode1_ref$qno"],$connid);
								$updquery .= $lsaref.",";
							}
						}
							
						if(isset($_POST["figdesc$qno"]))
							$updquery .= "figure_description='".addslashes($_POST["figdesc$qno"])."',";
							//$updquery .= "figure_description=IF(figure_description='','".$_POST["figdesc$qno"]."',CONCAT(figure_description,'<br>','".$_POST["figdesc$qno"]."')),";
						
						$updquery .= "modifiedby='".$username."',";
						
						$caskills = explode("UUU",$_POST["skill$qno"]);
						$updquery .= "skillno='".$caskills[0]."',";
						$updquery .= "cano='".$caskills[1]."',";
						$updquery .= "projectskillno='".$caskills[2]."'";
						$updquery .= "$addgtid ";
						$updquery .= $condition;
						/*if ($_POST["qcode_ref$qno"]==40024)*/
							//echo "A ".$updquery."<br><br>";exit;
						$dbupd = new dbquery($updquery,$connid);
						//echo "question $qno entry in database- ".date("H:i:s")."<br>";
						
						$updquery_ips  = "UPDATE lq_ips SET suggestedqno=".$_POST["suggqno$qno"]." WHERE skillblueprintno=".$this->skillblueprintno." AND qno=".$qno;
						$dbupd_ips = new dbquery($updquery_ips,$connid);
						//echo $updquery_ips."<br>";
						
						$updquery_lqv  = "UPDATE lq_questions_vernaculars SET SuggestedQno=".$_POST["suggqno$qno"]." WHERE skillblueprintno=".$this->skillblueprintno." AND qno=".$qno;
						$dbupd_lqv = new dbquery($updquery_lqv,$connid);
						//echo $updquery_lqv."<br>";
						
						$updquery_verneips  = "UPDATE lqv_ips SET SuggestedQno=".$_POST["suggqno$qno"]." WHERE skillblueprintno=".$this->skillblueprintno." AND qno=".$qno;
						$dbupd_verneips = new dbquery($updquery_verneips,$connid);
						//echo $updquery_ips."<br>";
						
					}
					else //Insert question
					{
						
						for($pn=1; $pn<=4; $pn++)
						{
							$picno = "picture".$qno."_".$pn;
							if($_FILES[$picno]["tmp_name"]!="")
							{
								$picname = $_FILES[$picno]["name"];
								$uploadfile = "images/questionimages/".$picname;
								//checkfileType($picno,1);
								if (file_exists("images/questionimages/".$_FILES[$picno]["name"]))
								{	
									array_push($existing_files,$_FILES[$picno]["name"]);
									if(isset($_POST['overwrite']))
									{
										move_uploaded_file($_FILES[$picno]["tmp_name"], $uploadfile);
										$existing_files_str .= $picname.", ";
										chmod($uploadfile,0644);
										//echo "<font color=red>File overwriten</font><br>";
									}
									else 
									{
										echo "<center><font color=red>".$picname." in Qustion number ".$qno." already exist.</font></center><br>";
										$picname = "";
									}
								}
								else 
								{
									move_uploaded_file($_FILES[$picno]["tmp_name"], $uploadfile);
									chmod($uploadfile,0644);
									//echo $picname." uploaded.";
								}
								/*if(!move_uploaded_file($_FILES[$picno]["tmp_name"], $uploadfile))
									echo "Possible file upload attack...";
								else
									chmod($uploadfile,0644);*/
								//$updquery .= "figure='".$picname."',";
							}
						}
						
						$repeattype=$_POST["IRSR".$qno."_t"];
						$insquery  = "INSERT INTO lq_questions SET skillblueprintno=".$this->skillblueprintno.", project='".$this->project."', roundyear='".$this->roundyear."',subject='".$this->subject."',";
						$insquery .= "class='".$this->class."', Qno=".$_POST["suggqno$qno"].", SuggestedQno=".$_POST["suggqno$qno"].",repeattype='$repeattype',";
						
						$questionstr = $this->removeFirstPtag($_POST["question$qno"]);
						for($pn=1; $pn<=4; $pn++)
						{
							$picno = "picture".$qno."_".$pn;
							if($_FILES[$picno]["name"]!="")
							{
								if(in_array($_FILES[$picno]["name"],$existing_files) && !(isset($_POST['overwrite'])))
									continue;
								else if (isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="")
									$questionstr .= "[--".$_FILES[$picno]["name"]."--] ";
								else 
									$questionstr .= "[".$_FILES[$picno]["name"]."] ";
							}
						}
						//$questionstr=addslashes($questionstr);
						$insquery .= " question='".$questionstr."', ";
						
						/*if($_FILES["picture$qno"]["tmp_name"]!="")
						{
							if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="")
								$insquery .= " question='".$_POST["question$qno"]." [--".$_FILES["picture$qno"]["name"]."--]',";
							else 
								$insquery .= " question='".$_POST["question$qno"]." [".$_FILES["picture$qno"]["name"]."]',";
						}
						else 
							$insquery .= " question='".$_POST["question$qno"]."',";*/
							
						if(isset($_POST["mcq$qno"]) && $_POST["mcq$qno"]!="")
						{
							$insquery .= "mcq='Y',";
							$insquery .= "optiona='".$this->removeFirstPtag($_POST["opa$qno"])."',optionb='".$this->removeFirstPtag($_POST["opb$qno"])."', optionc='".$this->removeFirstPtag($_POST["opc$qno"])."', optiond='".$this->removeFirstPtag($_POST["opd$qno"])."',";
						}
						else 
						{
							$insquery .= "mcq='N',";
							$insquery .= "optiona='',optionb='', optionc='', optiond='',";
						}
							
						if(isset($_POST["IR$qno"]) && $_POST["IR$qno"]!="")
							$insquery .= "repeattype='IR',";
							
						if(isset($_POST["SR$qno"]) && $_POST["SR$qno"]!="")
							$insquery .= "repeattype='SR',";
							
						/*if(isset($_POST["used$qno"]) && $_POST["used$qno"]!="")
							$insquery .= "used='Y',";
						else 
							$insquery .= "used='N',";*/
							
						if(isset($_POST["sfnsf$qno"]) && $_POST["sfnsf$qno"]!="")
							$insquery .= "sfnsf='".$_POST["sfnsf$qno"]."',";
							
						if(isset($_POST["gow$qno"]) && $_POST["gow$qno"]!="")
							$insquery .= "gow='".$_POST["gow$qno"]."',";	
						
						if((isset($_POST["correctanswer$qno"]) && $_POST["correctanswer$qno"]!="") && (isset($_POST["mcq$qno"]) && $_POST["mcq$qno"]!=""))
							$insquery .= "correct_answer='".$_POST["correctanswer$qno"]."',";
						else 
							$insquery .= "correct_answer='',";
							
						if(isset($_POST["qcode_ref$qno"]) && $_POST["qcode_ref$qno"]!="")
						{
							$insquery .= "qcode_ref='".$_POST["qcode_ref$qno"]."',";
							if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{
								$assetref = $this->fetchAssetRef(0,$_POST["qcode_ref$qno"],$connid);
								$insquery .= $assetref.",";
							}
							else if(isset($_POST["iscqb$qno"]) && $_POST["iscqb$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{
								// Do nothing
							}
							else if(isset($_POST["isda$qno"]) && $_POST["isda$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{								
								$daref = $this->fetchDARef(0,$_POST["qcode_ref$qno"],$connid);
								$insquery .= $daref.",";
							}
							else if(isset($_POST["isrefverna$qno"]) && $_POST["isrefverna$qno"]!="" && $_POST["qcode1_ref$qno"]=="")
							{								
								$vernaref = $this->fetchVernaRef(0,$_POST["qcode_ref$qno"],$connid);
								$insquery .= $vernaref.",";
							}							
							else 
							{
								$lsaref = $this->fetchLSARef(0,$_POST["qcode_ref$qno"],$connid);
								$this->importScorecardForQuestion($this->skillblueprintno,$qno,$_POST["qcode_ref$qno"],$connid);
								$insquery .= $lsaref.",";
							}
						}
						if (isset($_POST["qcode1_ref$qno"]) && $_POST["qcode1_ref$qno"]!="") // for second reference 
						{
							$insquery .= "qcode1_ref='".$_POST["qcode1_ref$qno"]."',";
							if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="")
							{
								$assetref = $this->fetchAssetRef(1,$_POST["qcode1_ref$qno"],$connid);
								$insquery .= $assetref.",";
							}
							else if(isset($_POST["iscqb$qno"]) && $_POST["iscqb$qno"]!="")
							{
								// Do nothing
							}
							else if(isset($_POST["isda$qno"]) && $_POST["isda$qno"]!="")
							{								
								$daref = $this->fetchDARef(1,$_POST["qcode1_ref$qno"],$connid);
								$insquery .= $daref.",";
							}
							else if(isset($_POST["isrefverna$qno"]) && $_POST["isrefverna$qno"]!="")
							{								
								$vernaref = $this->fetchVernaRef(1,$_POST["qcode1_ref$qno"],$connid);
								$insquery .= $vernaref.",";
							}							
							else 
							{
								$lsaref = $this->fetchLSARef(1,$_POST["qcode1_ref$qno"],$connid);
								$insquery .= $lsaref.",";
							}
						}
						
						if(isset($_POST["isasset$qno"]) && $_POST["isasset$qno"]!="")
							$insquery .= "isasset='Y',";
						else 
							$insquery .= "isasset='N',";
							
						if(isset($_POST["isda$qno"]) && $_POST["isda$qno"]!="")//check if DA question
							$insquery .= "isda='Y',";
						else 
							$insquery .= "isda='N',";
							
						if(isset($_POST["isrefverna$qno"]) && $_POST["isrefverna$qno"]!="")//check if vernacular question
							$insquery .= "isrefverna='Y',";
						else 
							$insquery .= "isrefverna='N',";
							
						if(isset($_POST["iscqb$qno"]) && $_POST["iscqb$qno"]!="")
							$insquery .= "iscqb='Y',";
						else 
							$insquery .= "iscqb='N',";
						
						if(isset($_POST["passageid$qno"]) && $_POST["passageid$qno"]!="")
							$insquery .= "passageid=".$_POST["passageid$qno"].",";
							
						if(isset($_POST["forproduction$qno"]) && $_POST["forproduction$qno"]!="")
							$insquery .= "forProduction='".$_POST["forproduction$qno"]."',";	
						
						if(isset($_POST["forevaluator$qno"]) && $_POST["forevaluator$qno"]!="")
							$insquery .= "forEvaluator='".$_POST["forevaluator$qno"]."',";	
						
						if(isset($_POST["foranalysis$qno"]) && $_POST["foranalysis$qno"]!="")
							$insquery .= "forAnalyser='".$_POST["foranalysis$qno"]."',";	
							
						if(isset($_POST["figdesc$qno"]))
							$insquery .= "figure_description='".addslashes($_POST["figdesc$qno"])."',";
						
						$insquery .= "addedby='".$username."',";
							
						//$insquery .= "skillno=".$_POST["skill$qno"];
						$caskills = explode("UUU",$_POST["skill$qno"]);
						$insquery .= "skillno='".$caskills[0]."',";
						$insquery .= "cano='".$caskills[1]."',";
						$insquery .= "projectskillno='".$caskills[2]."'";
						$insquery .= "$addgtid ";
						//echo "B ".$insquery."<br><br>"; //exit;
						$dbins = new dbquery($insquery,$connid);
					}
				//}
			}		
			if ($existing_files_str != "")
			{	
				$existing_files_str = substr($existing_files_str,0,-2);
				echo "<center><font color=red>Following images are overwritten<br>(".$existing_files_str.")</font></center>";
			}
			$condition  = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."' AND class='".$this->class."'";
			$suggqnoquery = "UPDATE lq_questions SET Qno=SuggestedQno ".$condition;
			$dbsuggqnoquery = new dbquery($suggqnoquery,$connid);
			
			// Update score card sugested qno -  Starts here
			$condition_sc  = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."' AND class='".$this->class."'";
			$updquery_sc = "UPDATE ".$anscodetablename." SET Qno=SuggestedQno".$condition_sc;
			$dbupd_sc = new dbquery($updquery_sc,$connid);
			//echo $updquery_sc."<br>";
			// Update score card sugested qno -  Ends here

			$upquery_skill = "UPDATE ".$anscodetablename." a, lq_questions b SET a.SkillNo=b.skillno, a.projectskillno=b.projectskillno, a.cano=b.cano WHERE a.skillblueprintno=b.skillblueprintno AND a.Qno=b.Qno AND a.skillblueprintno=".$this->skillblueprintno;
			$dbupd_skill = new dbquery($upquery_skill,$connid);
			//echo $upquery_skill;
			
			$updquery_ips  = "UPDATE lq_ips SET qno = suggestedqno WHERE skillblueprintno=".$this->skillblueprintno;
			$dbupd_ips = new dbquery($updquery_ips,$connid);
			//echo $updquery_ips."<br>";
						
			//vernacular paper's re ordering
			$suggqnoqueryverna = "UPDATE lq_questions_vernaculars SET qno=SuggestedQno WHERE skillblueprintno=$this->skillblueprintno";
			$dbsuggqnoqueryverna = new dbquery($suggqnoqueryverna,$connid);
			
			$updquery_vips  = "UPDATE lqv_ips SET qno=SuggestedQno WHERE skillblueprintno=".$this->skillblueprintno;
			$dbupd_vips = new dbquery($updquery_vips,$connid);
			//echo $updquery_ips."<br>";
			
			if($_POST['whichsave']==2)
				$returnvalue = "Question Data Inserted";
			else 
				$returnvalue = "Question Data Inserted, Dont Go!";
			return $returnvalue;
		}
	}
	
	function importScorecardForQuestion($skillblueprintno,$qno,$refqcode,$connid)
	{
		//echo "Yes...$refqcode";
		$refquery = "SELECT skillblueprintno,qno FROM lq_questions WHERE qcode=".$refqcode;
		$refdbresult = new dbquery($refquery,$connid);
		$refrow = $refdbresult->getrowarray();

		$refquery = "SELECT * FROM anscode_master_all WHERE skillblueprintno=".$refrow['skillblueprintno']." AND qno=".$refrow['qno'];
		//$refquery = "SELECT * FROM anscode_master_all WHERE skillblueprintno=".$skillblueprintno." AND qno=".$qno;
		$refdbresult = new dbquery($refquery,$connid);
		$refrow = $refdbresult->getrowarray();
		
		$scquery = "SELECT COUNT(*) FROM anscode_master_all WHERE skillblueprintno=".$skillblueprintno." AND qno=".$qno;
		$scdbresult = new dbquery($scquery,$connid);
		$scrow = $scdbresult->getrowarray();
		if($scrow['COUNT(*)']==0)
		{
			$setString = "INSERT INTO anscode_master_all SET skillblueprintno=".$skillblueprintno.", project='".$this->project."', roundyear='".$this->roundyear."', Class='".$this->class."', Subject='".$this->subject."', Qno=".$qno.",SuggestedQno='".$qno."', ";
			$setString .= "SfNsf='".$refrow['SfNsf']."',";
				
			for($index=1; $index<=10; $index++)
			{
				$setString .= " desc".$index."='".addslashes($refrow['desc'.$index])."', ans_code".$index."='".$refrow['ans_code'.$index]."', marks".$index."='".$refrow['marks'.$index]."',";
			}
		
			$setString = substr($setString, 0, -1);
			//echo $setString; //exit;
			$dbinseertquery = new dbquery($setString,$connid);
		}
	}
									
	function fetchLSARef($refno,$qcode,$connid)
	{
		$query = "SELECT project,roundyear,subject,class,Qno FROM lq_questions WHERE qcode=".$qcode;
		$dbresult = new dbquery($query,$connid);
		$row = $dbresult->getrowarray();
		$qno_ref = $row['Qno'];
		
		$condition  = " WHERE project='".$row['project']."' AND roundyear='".$row['roundyear']."' AND subject='".$row['subject']."' AND class='".$row['class']."'";
		$lsaref = "";
		$query = "SELECT papercode FROM lsa_anscode_master_details".$condition;
		//echo $query."$refno";
		$dbresult = new dbquery($query,$connid);
		$row = $dbresult->getrowarray();
		$papercode_ref = $row['papercode'];
		
		if ($refno==0)
			$lsaref = "papercode_ref='".$papercode_ref."',qno_ref='".$qno_ref."'";
		elseif ($refno==1)
			$lsaref = "papercode1_ref='".$papercode_ref."',qno1_ref='".$qno_ref."'";
		
		return $lsaref;
	}
	
	function fetchAssetRef($refno,$qcode,$connid)
	{
		$assetref = "";
		$query = "SELECT * FROM educatio_educat.paper_master WHERE qcode=".$qcode;
		//echo $query;
		$dbresult = new dbquery($query,$connid);
		$row = $dbresult->getrowarray();
		if ($refno==0)
			$assetref = "papercode_ref='".$row['papercode']."',qno_ref='".$row['qno']."'";
		elseif ($refno==1)
			$assetref = "papercode1_ref='".$row['papercode']."',qno1_ref='".$row['qno']."'";
			
		return $assetref;
	}
	function fetchDARef($refno,$qcode,$connid)
	{
		$assetref = "";
		$query = "select a.*,b.* from educatio_educat.da_paperDetails a,educatio_educat.da_testRequest b where a.papercode=b.paper_code and find_in_set('$qcode',a.qcode_list) and a.version=1 order by b.test_date desc limit 1";
		//echo $query;exit;
		$dbresult = new dbquery($query,$connid);
		$row = $dbresult->getrowarray();
		$qnoArr = explode(",",$row['qcode_list']);
		$qnoArr=array_flip($qnoArr);
		$qno_ref=$qnoArr[$qcode];
		if ($refno==0)
			$assetref = "papercode_ref='".$row['papercode']."',qno_ref='".($qno_ref+1)."'";
		elseif ($refno==1)
			$assetref = "papercode1_ref='".$row['papercode']."',qno1_ref='".($qno_ref+1)."'";
			
		return $assetref;
	}
	function fetchVernaRef($refno,$qcode,$connid)
	{
		$vernaref = "";
		$query = "SELECT * FROM lq_questions_vernaculars WHERE autono=".$qcode;
		//echo $query;
		$dbresult = new dbquery($query,$connid);
		$row = $dbresult->getrowarray();
		if ($refno==0)
			$vernaref = "papercode_ref='".$row['papercode']."',qno_ref='".$row['qno']."'";
		elseif ($refno==1)
			$vernaref = "papercode1_ref='".$row['papercode']."',qno1_ref='".$row['qno']."'";
			
		return $vernaref;
	}
	
	function fetchRowScoreForQuestion($qno,$connid)
	{
		// Question Scorecard - Starts Here
		
		//$queryString1 = "project=".$this->project."&roundyear=".$this->roundyear."&classes=".$this->class."&subject=".$this->subject;
		$queryString1 = "skillblueprintno=".$this->skillblueprintno;
		$queryString2 = $queryString1."&qnotoedit=".$qno;
									
		//$anscode_table = "anscode_master_".strtolower($this->project);
		$anscode_table = "anscode_master_all";
		$opquery = "SELECT * FROM ".$anscode_table." WHERE skillblueprintno=".$this->skillblueprintno." AND Qno='".$qno."'"; 
		//echo "<br>".$opquery;
		$opresult = mysql_query($opquery,$connid) OR die(mysql_error());
		$oprow = mysql_fetch_array($opresult);
		
		$scoretable  = "<br><table border='1' style='border-collapse: collapse; display:none;' id='scoretable".$qno."' bordercolor='black' >";
		//$scoretable .= "<tr><td colspan='2' align='center'>Scorecard</td></tr>";
		$scoretable .= "<tr><td colspan='2' align='center'><a href='javascript: lq_rawscores(\"".$queryString2."\")'>Score Card</a></td></tr>";
		//$scoretable .= "<tr><td>Description</td><td>AnsCode</td></tr>";
		
		if($oprow["mcq"]=="1")
		{
			$scoretable .= "<tr><td>Option ticked (enter option A,B,C,D in English)</td><td align='center'>A,B,C,D</td></tr>";
			$scoretable .= "<tr><td>Invalid Answer Code/More Than One Option Ticked</td><td align='center'>86</td></tr>";
			$scoretable .= "<tr><td>Not Attempted</td><td align='center'>88</td></tr>";
		}
		else 
		{
			for($aci=1; $aci<=10; $aci++)
			{
				$anscode = $oprow["ans_code".$aci];
				if($anscode!="" && $anscode!=NULL)
				{
					$scoretable .= "<tr><td>".$oprow["desc".$aci]."</td><td align='center'>".$anscode."</td></tr>";
				}
			}
		}
		$scoretable .= "</table><br>";
		//echo $scoretable;
		return $scoretable;
		// Question Scorecard - Ends Here
	}
		
	function fetchAllQuestions($connid)
	{
		//$condition = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."' AND subject='".$this->subject."'";
		$condition =" WHERE skillblueprintno=".$this->skillblueprintno;
		$query = "SELECT * FROM lq_questions".$condition." ORDER BY Qno";
		//echo "AA: ".$query;
		$dbresult = new dbquery($query,$connid);
		return $dbresult;
	}
	function fetchAnsCodesOfQuestion($qno,$connid)
	{
		$anscodes = "";
		$condition = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."' AND subject='".$this->subject."' AND Qno=".$qno;
		$query = "SELECT * FROM anscode_master_".strtolower($this->project).$condition;
		//echo $query; exit;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		for($di=1; $di<=10; $di++)
		{
			if($row["ans_code$di"]!="")
				$anscodes .= $row["ans_code$di"].",";
		}
		if($anscodes != "")
			$anscodes = substr($anscodes,0,-1);
		return $anscodes;
	}
	function prepareSkillCombo($skilllistofpaperarray,$skillno,$cano,$skillblueprintbreakupno,$connid,$skillblueprintno)
	{
		$caarray = array();
		$query = "SELECT * FROM  contentarea_master ORDER BY cano";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$caarray[$row['cano']] = $row['caname'];
		}
		
		$uskillarray = array();
		$query = "SELECT * FROM  uskill_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$uskillarray[$row['skillno']] = $row['skillname'];
		}
		
		$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$skillblueprintno;
		//echo $query."<br>";
		$dbquery = new dbquery($query,$connid);
		$skillcombo = "<option value=''></option>";
		while($row = $dbquery->getrowarray())
		{
			if($row['skillname']!="")
				$skillname = $row['skillname'];
			else 
				$skillname = $uskillarray[$row['uskill_no']];
			if($row['cano']!=0)
			{
				$skillname .= " - ".$caarray[$row['cano']];
			}
			
			$skillcode = $row['uskill_no']."UUU".$row['cano']."UUU".$row['skillblueprintbreakupno'];
			if($skillno == $row['uskill_no'] && $cano==$row['cano'] && $skillblueprintbreakupno==$row['skillblueprintbreakupno'])
				$skillcombo .= "<option value='".$skillcode."' selected>".$skillname."</option>";
			else 
				$skillcombo .= "<option value='".$skillcode."'>".$skillname."</option>";
		}
		return $skillcombo;
	}
	
	function pageMapSkillsToPaper($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action == "Map Skills To Paper")
		{
			$skills = "";
			$condition = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."' AND subject='".$this->subject."'";
			$dbquery = $this->fetchSkills($connid);
			while($row = $dbquery->getrowarray())
			{
				$sk = "S".$row['skillno'];
				if(isset($_POST[$sk]))
					$skills .= $row['skillno'].",";
			}
			$skills = substr($skills,0,-1);
			$upquery = "UPDATE lsa_anscode_master_details SET skills='".$skills."'".$condition;
			$updbquery = new dbquery($upquery,$connid);
			//echo $upquery;
			echo "<script>opener.location.reload(true);window.close();</script>";
			exit();
		}
	}
	function fetchSkills($connid)
	{
		$query = "SELECT * FROM  uskill_master ORDER BY skillno";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function fetchSkillsOfPaper($sbpno,$connid)
	{
		$skillsofpaper=array();
		$condition = " WHERE skillblueprintno=".$sbpno;
		$query = "SELECT uskill_no FROM lsa_skillblueprint_breakup".$condition." ORDER BY skillblueprintbreakupno";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($skillsofpaper,$row['uskill_no']);
		}
		return $skillsofpaper;
	}
	
	function pageShowPaper($connid)
	{
		$this->setgetvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
		
		$skillarray = array();
		$query = "SELECT * FROM uskill_master";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillno']] = $row['skillname'];
		}
		
		$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$this->skillblueprintno;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['uskill_no']] = $row['skillname'];
		}
		
		$caarray = array();
		$query = "SELECT * FROM  contentarea_master ORDER BY cano";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$caarray[$row['cano']] = $row['caname'];
		}
		
		$skillblueprint = $this->fetchSkillBlueprint_Details($this->skillblueprintno,$connid);
		$ansoptionsbalance = $this->fetchAnswerOptionsBalance($this->skillblueprintno,$connid);
		
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='9'><b>Paper</b></td></tr>";
		
	    $outputstring .= "<tr bgcolor='#DCDCDC'><td colspan='9' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Paper Code: </b>".$this->papercode."</td></font></tr>";
	    $outputstring .= "<tr><td colspan='9' align='center'><input type='checkbox' name='sbpno' onclick='showskillblueprint()'><b>Skill Blueprint</b>&nbsp;";
	    $outputstring .= "<input type='checkbox' name='aopb' onclick='showansweroptionsbalance()'><b>Answer Options Balance</b></td></tr>";
	    $outputstring .= "<tr><td colspan='9' align='center'>".$skillblueprint."<br>".$ansoptionsbalance."</td></tr>";
	    
		$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Question</b></td>";
		$outputstring .= "<td align='center'><b>SF/NSF</b></td><td align='center'><b>Go/W</b></td><td align='center'><b>Skill</b></td><td align='center'><b>Correct<br>Answer</b></td><td align='center'><b>Reference</b></td>";
		$outputstring .= "<td align='center'><b>Translator's<br>Comments</b></td><td align='center'><b>Evaluator's<br>Comments</b></td></tr>";
		
		$passagesprinted = array();
		$cntr=0;
		//$condition = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."' AND subject='".$this->subject."'";
		$condition =" WHERE skillblueprintno=".$this->skillblueprintno;
		$query = "SELECT * FROM lq_questions".$condition." ORDER BY Qno";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$passage="";
			if($row["passageid"]!=0)
				$passage = $this->fetchPassage($row["passageid"],$connid);
				
			if($row['isasset']=="Y")
			{
				if ($row['qcode1_ref']==0)
					$img_folder = $this->fetchImgPathName($row['papercode_ref']);
				else 
					$img_folder = $this->fetchImgPathName($row['papercode1_ref']);
				
				$question = $this->orig_to_html($row['question'],$img_folder);	
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);	$optionb = $this->orig_to_html($row['optionb'],$img_folder);	
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);	$optiond = $this->orig_to_html($row['optiond'],$img_folder);	
				
				$question = str_replace("[--","[",$question);	$question = str_replace("--]","]",$question);
				$optiona = str_replace("[--","[",$optiona);	$optiona = str_replace("--]","]",$optiona);
				$optionb = str_replace("[--","[",$optionb);	$optionb = str_replace("--]","]",$optionb);
				$optionc = str_replace("[--","[",$optionc);	$optionc = str_replace("--]","]",$optionc);
				$optiond = str_replace("[--","[",$optiond);	$optiond = str_replace("--]","]",$optiond);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			else 
			{
				$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
				$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
				$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder,$optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			
			$passagetext="";
			if($passage!="")
				$passagetext = Dotagtoimage($this->imagefolder, $passage);
				
			if(!in_array($row["passageid"],$passagesprinted))
			{
				$outputstring .= "<tr><td colspan='9'>".$passagetext."</td></tr>";
				array_push($passagesprinted,$row["passageid"]);
			}
			
			$outputstring .= "<tr><td align='center'>".$row['Qno']."</td><td>".$question;
				
			if($row['mcq']=="Y")
			{
				$outputstring .= "<br><table border=1 style='border-collapse: collapse' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
				$outputstring .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
				$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";
			}
			$sfnsf = "";
			if($row["SfNsf"]=="S")
				$sfnsf="SF";
			elseif($row["SfNsf"]=="N")
				$sfnsf="NSF";
				
			$skillname = $skillarray[$row['skillno']];
			if($row['cano']!=0)
				$skillname .= " - ".$caarray[$row['cano']];
			
			$outputstring .= "<td align='center'>".$sfnsf."</td><td align='center'>".$row['gow']."</td><td>".$skillname."</td><td align='center'>".$row['correct_answer']."</td>";
					
			/*if($row['papercode_ref']!="")
			{
				if($pastresult!="")
					$outputstring .= "<td align='center'><a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",".$row['iscqb'].",".$row['isda'].")'>".$row['papercode_ref']."-".$row['qno_ref']."<br>(".$pastresult.")</a></td>";
				else 
					$outputstring .= "<td align='center'><a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",".$row['iscqb'].",".$row['isda'].")'>".$row['papercode_ref']."-".$row['qno_ref']."</td></a>";
			}
			else
				$outputstring .= "<td align='center'>&nbsp;</td>";*/
				
			$pastresult="";
			if($row['isasset']=="Y" && $row['qcode1_ref']==0)
				$pastresult = $this->fetchPastResultASSET($row['papercode_ref'],$row['qno_ref'],$connid);
			else 
				$pastresult = $this->fetchPastResultLSA($row['qcode_ref'],$connid);
				
				
			$refquery  = "SELECT a.Qno,b.papercode FROM lq_questions a, lsa_anscode_master_details b WHERE a.qcode=".$row['qcode_ref']." AND a.skillblueprintno=b.skillblueprintno";
			$refresult = mysql_query($refquery) OR die("B: ".mysql_error());
			$refrow    = mysql_fetch_array($refresult);
			
			$outputstring .= "<td>";
			if($row['qcode_ref']!=0)
			{
				$outputstring .= "<b>Ref1:</b> ";
				if ($row['qcode1_ref']!=0)
				{
					$n="N";
					$imgref="ASSET";
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$n."\",".$row['qcode_ref'].",\"".$n."\",\"".$n."\",\"".$row['papercode1_ref']."\",\"".$imgref."\")';>".$refrow['papercode']."-".$refrow['Qno']." (".$pastresult.")</a><br>";
				}
				else 
				{
					if($row['iscqb']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>(CQB - ".$row['qcode_ref'].")</a><br>";
					else if($row['isasset']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode_ref']."-".$row['qno_ref']."(".$pastresult.")</a><br>";
					else if($row['isda']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode_ref']."-".$row['qno_ref']."</a><br>";
					else //if($pastresult!="")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$refrow['papercode']."-".$refrow['Qno']." (".$pastresult.")</a><br>";
				}
			}
			else
				$outputstring .= "&nbsp;<br>";
			
			if($row['qcode1_ref']!=0)
			{
				$pastresult1="";
				if($row['isasset']=="Y")
					$pastresult1 = $this->fetchPastResultASSET($row['papercode1_ref'],$row['qno1_ref'],$connid);
				else 
					$pastresult1 = $this->fetchPastResultLSA($row['qcode1_ref'],$connid);
				
				$refquery1  = "SELECT a.Qno,b.papercode FROM lq_questions a, lsa_anscode_master_details b WHERE a.qcode=".$row['qcode1_ref']." AND a.skillblueprintno=b.skillblueprintno";
				$refresult1 = mysql_query($refquery1) OR die("B: ".mysql_error());
				$refrow1 = mysql_fetch_array($refresult1);
			
				$outputstring .= "<b>Ref2:</b> ";
				if($row['iscqb']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>(CQB - ".$row['qcode1_ref'].")</a><br>";
				else if($row['isasset']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode1_ref']."-".$row['qno1_ref']."(".$pastresult1.")</a><br>";
				else if($row['isda']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode1_ref']."-".$row['qno1_ref']."</a><br>";
				else //if($pastresult!="")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$refrow1['papercode']."-".$refrow1['Qno']." (".$pastresult1.")</a><br>";
			}
			$outputstring .= "</td>";
			
			$outputstring .= "<td>".$row['forProduction']."</td><td>".$row['forEvaluator']."</td>";
			$outputstring .= "</tr>";
			$cntr++;
		}
		
		if($cntr==0)
		{
			$outputstring .= "<tr><td align='center' colspan='9'><b>No questions found...</b></td></tr>";
		}
		$outputstring .= "<tr><td align='center' colspan='9'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."'>Projectwise Raw Score Status</a></td></tr>";
		$outputstring .= "</table>";
		return $outputstring;
	}
	
	function pageShowPaperCommenting($commentator,$connid)
	 {
		$this->setgetvars();
		$this->setpostvars();
		//echo $this->skillblueprintno;
		$this->setbasevars($this->skillblueprintno,1,$connid);
		
		if($this->action=="Save Commnets")
		{
			/*echo "<pre>";
			print_r ($_GET);
			print_r ($_POST);
			echo "</pre>";*/
			$today = date("d-m-Y");
			for($qno=1; $qno<=$this->totalquestions;$qno++)
			{
				if($_POST["comment$qno"]!="")
				{
					/*$condition  = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."' AND ";
					$condition .= "class='".$this->class."' AND Qno=".$qno;*/
					
					$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$qno;
					
					$comments = $commentator." (".$today."): ".$_POST["comment$qno"]."<br>";
					$updquery  = "UPDATE lq_questions SET ";
					$updquery .= "comments=IF(comments='','".$comments."',CONCAT('".$comments."','<br>',comments))";
					$updquery .= $condition;
					//echo "A ".$updquery."<br><br>"; //exit;
					$dbupd = new dbquery($updquery,$connid);
				}
			}
		}
		
		$skillarray = array();
		/*$query = "SELECT * FROM uskill_master";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillno']] = $row['skillname'];
		}*/
		
		$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$this->skillblueprintno;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillblueprintbreakupno']] = $row['skillname'];
		}
		
		$caarray = array();
		$query = "SELECT * FROM  contentarea_master ORDER BY cano";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$caarray[$row['cano']] = $row['caname'];
		}
		
		$skillblueprint = $this->fetchSkillBlueprint_Details($this->skillblueprintno,$connid);
		$ansoptionsbalance = $this->fetchAnswerOptionsBalance($this->skillblueprintno,$connid);
		
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='9'><b>Paper</b></td></tr>";
		
	    $outputstring .= "<tr bgcolor='#DCDCDC'><td colspan='9' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Paper Code: </b>".$this->papercode."</td></font></tr>";
	    
	    $outputstring .= "<tr><td colspan='9' align='center'><input type='checkbox' name='sbpno' onclick='showskillblueprint()'><b>Skill Blueprint</b>&nbsp;";
	    $outputstring .= "<input type='checkbox' name='aopb' onclick='showansweroptionsbalance()'><b>Answer Options Balance</b></td></tr>";
	    $outputstring .= "<tr><td colspan='9' align='center'>".$skillblueprint."<br>".$ansoptionsbalance."</td></tr>";
	    
		$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Qcode</b></td><td align='center'><b>Question</b></td>";
		//$outputstring .= "<td align='center'><b>SF/NSF</b></td><td align='center'><b>Go/W</b></td><td align='center'><b>Skill</b></td><td align='center'><b>Correct<br>Answer</b></td><td align='center'><b>Reference</b></td><td align='center'><b>Comments</b></td></tr>";
		$outputstring .= "<td align='center'><b>Skill</b></td><td align='center'><b>Comments</b></td></tr>";
		
		$passagesprinted = array();
		$cntr=0;
		$qnoto=0;
		$gtflag=0;
		//$condition = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."' AND subject='".$this->subject."'";
		$condition =" WHERE skillblueprintno=".$this->skillblueprintno;
		$query = "SELECT * FROM lq_questions".$condition." ORDER BY Qno";
		//echo $query;
		//exit;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			// Question Scorecard - Starts Here
			//$anscode_table = "anscode_master_".strtolower($this->project);
			$anscode_table = "anscode_master_all";
			$opquery = "SELECT * FROM ".$anscode_table." WHERE skillblueprintno=".$this->skillblueprintno." AND Qno='".$row['Qno']."'";
			$opresult = mysql_query($opquery) OR die(mysql_error());
			//echo "<br>".$opquery;
			$oprow = mysql_fetch_array($opresult);
			$scoretable = "<br><table border='1' style='border-collapse: collapse' bordercolor='black'>";
			/*$scoretable .= "<tr><td colspan='2' align='center'>Scorecard</td></tr>";
			$scoretable .= "<tr><td>Description</td><td>AnsCode</td></tr>";*/

			if($row["mcq"]=="1")
			{
				$scoretable .= "<tr><td>Option ticked (enter option A,B,C,D in English)</td><td align='center'>A,B,C,D</td></tr>";
				$scoretable .= "<tr><td>Invalid Answer Code/More Than One Option Ticked</td><td align='center'>86</td></tr>";
				$scoretable .= "<tr><td>Not Attempted</td><td align='center'>88</td></tr>";
			}
			else 
			{
				for($aci=1; $aci<=10; $aci++)
				{
					$anscode = $oprow["ans_code".$aci];
					if($anscode!="" && $anscode!=NULL)
					{
						$scoretable .= "<tr><td>".$oprow["desc".$aci]."</td><td align='center'>".$anscode."</td></tr>";
					}
				}
			}
			$scoretable .= "</table>";
			// Question Scorecard - Ends Here

			$passage="";
			if($row["passageid"]!=0)
				$passage = $this->fetchPassage($row["passageid"],$connid);
			
			if($row['isasset']=="Y")
			{
				if ($row['qcode1_ref']==0)
					$img_folder = $this->fetchImgPathName($row['papercode_ref']);
				else 
					$img_folder = $this->fetchImgPathName($row['papercode1_ref']);
					
				$question = $this->orig_to_html($row['question'],$img_folder);	
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);	$optionb = $this->orig_to_html($row['optionb'],$img_folder);	
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);	$optiond = $this->orig_to_html($row['optiond'],$img_folder);	
				
				$question = str_replace("[--","[",$question);	$question = str_replace("--]","]",$question);
				$optiona = str_replace("[--","[",$optiona);	$optiona = str_replace("--]","]",$optiona);
				$optionb = str_replace("[--","[",$optionb);	$optionb = str_replace("--]","]",$optionb);
				$optionc = str_replace("[--","[",$optionc);	$optionc = str_replace("--]","]",$optionc);
				$optiond = str_replace("[--","[",$optiond);	$optiond = str_replace("--]","]",$optiond);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			else 
			{	
				$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
				$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
				$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			
			$question=spellcheck_function($question);
			$optiona=spellcheck_function($optiona);
			$optionb=spellcheck_function($optionb);
			$optionc=spellcheck_function($optionc);
			$optiond=spellcheck_function($optiond);
			
			$passagetext="";
			if($passage!="")
				$passagetext = Dotagtoimage($this->imagefolder, $passage);
				
			if(!in_array($row["passageid"],$passagesprinted) && $passagetext!="")
			{
				$passagetext=spellcheck_function($passagetext);
				$outputstring .= "<tr><td colspan='8'> <a href='javascript: update_passage(".$row["passageid"].")'>".$row["passageid"]."</a>. ".$passagetext;
				$outputstring.="</td></tr>";
				array_push($passagesprinted,$row["passageid"]);
			}
			
			// group text starts -- 
			//echo "$gtflag - $qnoto - ".$row['Qno']."<br>";
			if ($row['grouptextid']>0 && $gtflag==0)
			{
				$gtquery="SELECT * FROM lq_grouptext_master WHERE grouptextid='".$row['grouptextid']."'";
				$gtresult=mysql_query($gtquery) or die("group text error: ".mysql_error());
				$gtrow=mysql_fetch_array($gtresult);
				$qnoto=$gtrow['qnoto'];
				$gtrow['grouptext']=spellcheck_function($gtrow['grouptext']);
				$outputstring.="<tr><td colspan='8'><b>Group Text: </b>".Dotagtoimage($this->imagefolder,$gtrow['grouptext'])."<br><b>Qno From: </b>".$gtrow['qnofrom']."<br><b>Qno To: </b>".$gtrow['qnoto']."</td></tr>";
				$gtflag=1;
			}
			if ($row['Qno']>=$qnoto)
				$gtflag=0;
			// -- group text ends
			
			$sfnsf = "";
			if($row["SfNsf"]=="S")
				$sfnsf="SF";
			elseif($row["SfNsf"]=="N")
				$sfnsf="NSF";
			
			$pastresult="";
			if($row['isasset']=="Y" && $row['qcode1_ref']==0)
				$pastresult = $this->fetchPastResultASSET($row['papercode_ref'],$row['qno_ref'],$connid);
			else 
				$pastresult = $this->fetchPastResultLSA($row['qcode_ref'],$connid);
			
			$skillname = $skillarray[$row['projectskillno']];
			if($row['cano']!=0)
				$skillname .= " - ".$caarray[$row['cano']];
				
			//$outputstring .= "<td align='center'>".$sfnsf."</td><td align='center'>".$row['gow']."</td><td>".$skillname."</td><td align='center'>".$row['correct_answer'];
			//$outputstring .= "<br><b>SF/NSF:</b> ".$sfnsf."<br><b>Go/W:</b> ".$row['gow']."<br><b>Skill:</b> ".$skillname."<td align='center'>".$row['correct_answer'];
				
			$outputstring .= "<tr><td align='center'>".$row['Qno']."</td><td align='center' nowrap>".$row['qcode'];
			//$outputstring .= "<br><br><table border=1 cellspacing=0><tr><td><b>SF/NSF:</b></td><td>".$sfnsf."</td></tr><tr><td><b>Go/W:</b></td><td>".$row['gow']."</td></tr><tr><td><b>Reference:</b></td><td>";
			$outputstring .= "<br><br>".$sfnsf."<br>".$row['gow']."<br><b>Ref1:</b> ";
				
			$refquery  = "SELECT a.Qno,b.papercode FROM lq_questions a, lsa_anscode_master_details b WHERE a.qcode=".$row['qcode_ref']." AND a.skillblueprintno=b.skillblueprintno";
			//echo "<br><br>".$row['qno']." - ".$refquery;
			$refresult = mysql_query($refquery) OR die("B: ".mysql_error());
			$refrow    = mysql_fetch_array($refresult);					
			if($row['qcode_ref']!=0)
			{
				if ($row['qcode1_ref']!=0)
				{
					$n="N";
					$imgref="ASSET";
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$n."\",".$row['qcode_ref'].",\"".$n."\",\"".$n."\",\"".$row['papercode1_ref']."\",\"".$imgref."\")';>".$refrow['papercode']."-".$refrow['Qno']." (".$pastresult.")</a><br>";
				}
				else 
				{
					if($row['iscqb']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>(CQB - ".$row['qcode_ref'].")</a><br>";
					else if($row['isasset']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode_ref']."-".$row['qno_ref']."(".$pastresult.")</a><br>";
					else if($row['isda']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode_ref']."-".$row['qno_ref']."</a><br>";
					else //if($pastresult!="")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$refrow['papercode']."-".$refrow['Qno']." (".$pastresult.")</a><br>";
				}
			}
			else
				$outputstring .= "&nbsp;<br>";
			
			if($row['qcode1_ref']!=0)
			{
				$pastresult1="";
				if($row['isasset']=="Y")
					$pastresult1 = $this->fetchPastResultASSET($row['papercode1_ref'],$row['qno1_ref'],$connid);
				else 
					$pastresult1 = $this->fetchPastResultLSA($row['qcode1_ref'],$connid);
				
				$refquery1  = "SELECT a.Qno,b.papercode FROM lq_questions a, lsa_anscode_master_details b WHERE a.qcode=".$row['qcode1_ref']." AND a.skillblueprintno=b.skillblueprintno";
				$refresult1 = mysql_query($refquery1) OR die("B: ".mysql_error());
				$refrow1 = mysql_fetch_array($refresult1);
			
				$outputstring .= "<b>Ref2:</b> ";
				if($row['iscqb']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>(CQB - ".$row['qcode1_ref'].")</a><br>";
				else if($row['isasset']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode1_ref']."-".$row['qno1_ref']."(".$pastresult1.")</a><br>";
				else if($row['isda']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode1_ref']."-".$row['qno1_ref']."</a><br>";
				else //if($pastresult!="")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$refrow1['papercode']."-".$refrow1['Qno']." (".$pastresult1.")</a><br>";
			}
				
				
			$outputstring .= "<b>CA(%):</b> ".$row['correct_answer'];
			if($row['percent_correct']!=0.00)
				$outputstring .=  " (".sprintf("%0.1f",$row['percent_correct'])."%)";
			
			
				
			$outputstring.="<td>".$question;
			/*if($row['figure_description']!="")
				$outputstring .= "<br><b>Figure Descriptions:<br></b>".$row['figure_description'];
				*/
			/*if($row['mcq']=="Y")
			{
				$outputstring .= "<br><table border=1 style='border-collapse: collapse' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
				$outputstring .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
				$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";
			}*/
			
			if($row['mcq']=="Y")
			{
				$outputstring .= "<br><br><table border=1 style='border-collapse: collapse' bordercolor='#333333'>";
				if ($row['correct_answer']=='A')
					$outputstring .= "<tr bgcolor='lime'><td align='center'><b>A</b></td><td align='center'>".$optiona."</td></tr>";
				else 
					$outputstring .= "<tr><td align='center'><b>A</b></td><td align='center'>".$optiona."</td></tr>";
				
				if ($row['correct_answer']=='B')
					$outputstring .= "<tr bgcolor='lime'><td align='center'><b>B</b></td><td align='center'>".$optionb."</td></tr>";
				else 
					$outputstring .= "<tr><td align='center'><b>B</b></td><td align='center'>".$optionb."</td></tr>";
				
				if ($row['correct_answer']=='C')
					$outputstring .= "<tr bgcolor='lime'><td align='center'><b>C</b></td><td align='center'>".$optionc."</td></tr>";
				else 
					$outputstring .= "<tr><td align='center'><b>C</b></td><td align='center'>".$optionc."</td></tr>";
				
				if ($row['correct_answer']=='D')
					$outputstring .= "<tr bgcolor='lime'><td align='center'><b>D</b></td><td align='center'>".$optiond."</td></tr>";
				else 
					$outputstring .= "<tr><td align='center'><b>D</b></td><td align='center'>".$optiond."</td></tr>";
				$outputstring .= "</table>";
			}
			$outputstring .= "<br>".$scoretable;
			$outputstring .= "<td>$skillname</td>";
			
			$outputstring .= "<td><b>Add New Comments:</b><br><textarea WRAP=OFF rows='6' cols='40' name='comment".$row['Qno']."'></textarea><br><br><b>Comments:</b><br>".$row['comments']."</td></tr>";
				
			if($row['forProduction']!='' || $row['forEvaluator']!='' || $row['forAnalyser']!='' || $row['figure_description']!="")
			{
				$outputstring .= "<tr><td colspan='8'>";
				if($row['figure_description']!="")
					$outputstring .= "<b>Figure Descriptions: </b>".spellcheck_function($row['figure_description'])."<br>";
				if($row['forProduction']!='')
					$outputstring .= "<b>Translator's comments: </b>".spellcheck_function($row['forProduction'])."<br>";
				if($row['forEvaluator']!='')
					$outputstring .= "<b>Evaluator's comments: </b>".spellcheck_function($row['forEvaluator'])."<br>";
				if($row['forAnalyser']!='')
					$outputstring .= "<b>Analysis comments: </b>".spellcheck_function($row['forAnalyser']);
				$outputstring .= "</td></tr>";
			}
				
			$cntr++;
		}
		
		//$cntr--;
		if($cntr==0)
			$outputstring .= "<tr><td align='center' colspan='9'><b>No questions found...</b></td></tr>";
		else 
			$outputstring .= "<tr><td align='center' colspan='9'><input type='button' name='Save' value='Save' onclick='savecomments(".$cntr.")'></td></tr>";
		
		$outputstring .= "<tr><td align='center' colspan='9'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."&isframes=Yes'>Projectwise Raw Score Status</a></td></tr>";
		$outputstring .= "</table>";
		$outputstring .= "<input type='hidden' name='totalquestions' value='".$cntr."'>";
		return $outputstring;
	}
	
	function pageCopyPapertoExcel($commentator,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		//echo $this->skillblueprintno;
		$this->setbasevars($this->skillblueprintno,1,$connid);
		
		$skillarray = array();
		/*$query = "SELECT * FROM uskill_master";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillno']] = $row['skillname'];
		}*/
		
		$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$this->skillblueprintno;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillblueprintbreakupno']] = $row['skillname'];
		}
		
		$caarray = array();
		$query = "SELECT * FROM  contentarea_master ORDER BY cano";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$caarray[$row['cano']] = $row['caname'];
		}
		
		$skillblueprint = $this->fetchSkillBlueprint_Details($this->skillblueprintno,$connid);
		$ansoptionsbalance = $this->fetchAnswerOptionsBalance($this->skillblueprintno,$connid);
		
		
		if ($_POST['choice']==2)
			$colspan = "3";
		if ($_POST['choice']==3)
			$colspan = "2";
		if ($_POST['choice']==4)
			$colspan = "2";

		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		//$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='9'><b>Paper</b></td></tr>";
		$outputstring .= "<tr><td></td><td colspan=$colspan>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Paper Code: </b>".$this->papercode."</td></tr>";
		
	    /*$outputstring .= "<tr bgcolor='#DCDCDC'><td colspan='9' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Paper Code: </b>".$this->papercode."</td></font></tr>";
	    $outputstring .= "<tr><td colspan='9' align='center'><input type='checkbox' name='sbpno' onclick='showskillblueprint()'><b>Skill Blueprint</b>&nbsp;";
	    $outputstring .= "<input type='checkbox' name='aopb' onclick='showansweroptionsbalance()'><b>Answer Options Balance</b></td></tr>";
	    $outputstring .= "<tr><td colspan='9' align='center'>".$skillblueprint."<br>".$ansoptionsbalance."</td></tr>";*/
	    
		$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Question</b></td>";
		if ($_POST['choice']==2)
			$outputstring .= "<td align='center'><b>Translator's commnets</b></td><td align='center'><b>Evaluator's commnets</b></td>";
		if ($_POST['choice']==3)
			$outputstring .= "<td align='center'><b>Translator's commnets</b></td>";
		if ($_POST['choice']==4)
			$outputstring .= "<td align='center'><b>Evaluator's commnets</b></td>";
		//$outputstring.="<td align='center'><b>Skill</b></td><tr>";
		$outputstring.="<tr>";
		
		$passagesprinted = array();
		$cntr=0;
		$flag=0;
		$toqno=0;
		$condition =" WHERE skillblueprintno=".$this->skillblueprintno;
		$query = "SELECT * FROM lq_questions".$condition." ORDER BY Qno";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$passage="";
			if($row["passageid"]!=0)
				$passage = $this->fetchPassage($row["passageid"],$connid);
			
			if($row['isasset']=="Y")
			{
				if ($row['qcode1_ref']==0)
					$img_folder = $this->fetchImgPathName($row['papercode_ref']);
				else 
					$img_folder = $this->fetchImgPathName($row['papercode1_ref']);
				
				$question = $this->orig_to_html($row['question'],$img_folder);	
				$optiona  = $this->orig_to_html($row['optiona'],$img_folder);	$optionb = $this->orig_to_html($row['optionb'],$img_folder);	
				$optionc  = $this->orig_to_html($row['optionc'],$img_folder);	$optiond = $this->orig_to_html($row['optiond'],$img_folder);	
				
				$question = str_replace("[--","[",$question);	$question = str_replace("--]","]",$question);
				$optiona  = str_replace("[--","[",$optiona);	$optiona  = str_replace("--]","]",$optiona);
				$optionb  = str_replace("[--","[",$optionb);	$optionb  = str_replace("--]","]",$optionb);
				$optionc  = str_replace("[--","[",$optionc);	$optionc  = str_replace("--]","]",$optionc);
				$optiond  = str_replace("[--","[",$optiond);	$optiond  = str_replace("--]","]",$optiond);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			else 
			{
				$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
				$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
				$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			
			$passagetext="";
			if($passage!="")
				$passagetext = Dotagtoimage($this->imagefolder, $passage);
				
			if(!in_array($row["passageid"],$passagesprinted) && $passagetext!="")
			{
				$outputstring .= "<tr><td></td><td colspan='$colspan'>".$passagetext."</td></tr>";
				array_push($passagesprinted,$row["passageid"]);
			}
			
			if ($row['grouptextid']>0 && $flag==0)
			{
				$query1="SELECT * FROM lq_grouptext_master WHERE grouptextid='".$row['grouptextid']."'";
				$result1=mysql_query($query1) or die("group text query error -".mysql_error());
				$row1=mysql_fetch_array($result1);
				$outputstring .= "<tr><td></td><td  colspan='$colspan'><b>Group Text: </b>".$row1['grouptext']."<br>
				<b>From Qno: </b>".$row1['qnofrom']."<br>
				<b>To Qno: </b>".$row1['qnoto']."
				</td></tr>";
				$toqno=$row1['qnoto'];
				$flag=1;
			}
			if ($row['Qno']>=$toqno)
				$flag=0;
				
			
			$outputstring .= "<tr><td align='center'>".$row['Qno']."</td><td>".$question;
			if($row['mcq']=="Y")
			{
				$outputstring .= "<br>A. ".$optiona."<br>B. ".$optionb."<br>C. ".$optionc."<br>D. ".$optiond;
			}
			//$outputstring .= "<br>";
			$outputstring .= "</td>";
			if ($_POST['choice']==2)
				$outputstring .= "<td>&nbsp;".$row['forProduction']."</td><td>&nbsp;".$row['forEvaluator']."</td>";
			if ($_POST['choice']==3)
				$outputstring .= "<td>&nbsp;".$row['forProduction']."</td>";
			if ($_POST['choice']==4)
				$outputstring .= "<td>&nbsp;".$row['forEvaluator']."</td>";
			$skillname = $skillarray[$row['projectskillno']];
			if($row['cano']!=0)
				$skillname .= " - ".$caarray[$row['cano']];
				
			//$outputstring .= "<td>".$skillname."</td></tr>";
			$outputstring .= "</tr>";
		}
		$outputstring .= "</table>";
		return $outputstring;
	}
	
	function pageShowSelectedQuestions($commentator,$connid,$type)
	{
		$this->setgetvars();
		$this->setpostvars();
		//echo $this->skillblueprintno;
		$this->setbasevars($this->skillblueprintno,1,$connid);
		//echo $this->subject;
		
		
		$skillarray = array();
		$query = "SELECT * FROM uskill_master";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillno']] = $row['skillname'];
		}
		
		$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$this->skillblueprintno;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillblueprintbreakupno']] = $row['skillname'];
		}
		
		$caarray = array();
		$query = "SELECT * FROM  contentarea_master ORDER BY cano";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$caarray[$row['cano']] = $row['caname'];
		}
		
		//$skillblueprint = $this->fetchSkillBlueprint_Details($this->skillblueprintno,$connid);
		//$ansoptionsbalance = $this->fetchAnswerOptionsBalance($this->skillblueprintno,$connid);
		
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='9'><b>Paper</b></td></tr>";
		
	    $outputstring .= "<tr bgcolor='#DCDCDC'><td colspan='9' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Paper Code: </b>".$this->papercode."</td></font></tr>";
	    
	    //$outputstring .= "<tr><td colspan='9' align='center'><input type='checkbox' name='sbpno' onclick='showskillblueprint()'><b>Skill Blueprint</b>&nbsp;";
	    //$outputstring .= "<input type='checkbox' name='aopb' onclick='showansweroptionsbalance()'><b>Answer Options Balance</b></td></tr>";
	    //$outputstring .= "<tr><td colspan='9' align='center'>".$skillblueprint."<br>".$ansoptionsbalance."</td></tr>";
	    
		$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Qcode</b></td><td align='center'><b>Question</b></td>";
		$outputstring .= "<td align='center'><b>SF/NSF</b></td><td align='center'><b>Go/W</b></td><td align='center'><b>Skill</b></td><td align='center'><b>Correct<br>Answer</b></td><td align='center'><b>Reference</b></td><td align='center'><b>Comments</b></td></tr>";
		
		/*echo "<pre>";
		print_r ($_GET);
		echo "</pre>";
		echo $this->skillblueprintbreakupno;
		*/
		
		$passagesprinted = array();
		$cntr=0;
		$searchkeys = array_keys($_GET);
		if($type=="Content")
		{
			//if($this->subject=="EVS" || $this->subject=="SS")
			if(in_array($this->subject,$this->subjectswithcontentarea))
			{
				if($_GET[$searchkeys[0]]==0)
					$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND ".$searchkeys[1]."='".$_GET[$searchkeys[1]]."'";
				else
				{ 
					if($this->subject=="SS")
						$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND projectskillno='".$_GET[$searchkeys[0]]."' AND ".$searchkeys[1]."='".$_GET[$searchkeys[1]]."'";
					else
						$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND skillno='".$_GET[$searchkeys[0]]."' AND ".$searchkeys[1]."='".$_GET[$searchkeys[1]]."'";
						
				}
			}
			else
				$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND ".$searchkeys[0]."='".$_GET[$searchkeys[0]]."' AND ".$searchkeys[1]."='".$_GET[$searchkeys[1]]."'";
		}
		else 
		{
			if($_GET[$searchkeys[0]]=="IR")
				$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND ".$searchkeys[0]."='".$_GET[$searchkeys[0]]."' AND question!=''";// AND isasset='N'
			elseif($_GET[$searchkeys[0]]=="ASSET")
				$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND isasset='Y'";
			elseif($searchkeys[0]=="skillno")
			{
				//if($this->subject=="EVS" || $this->subject=="SS")
				if(in_array($this->subject,$this->subjectswithcontentarea))
				{
					if($this->subject=="SS")
						$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND projectskillno=".$this->skillblueprintbreakupno;
					else 
						$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND skillno=".$this->skillblueprintbreakupno;
					
				}
				else 
					$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND ".$searchkeys[0]."='".$_GET[$searchkeys[0]]."' AND projectskillno=".$this->skillblueprintbreakupno;
			}
				
			else 
				$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND ".$searchkeys[0]."='".$_GET[$searchkeys[0]]."'";
		}
		$query = "SELECT * FROM lq_questions".$condition." ORDER BY Qno";
		//echo "<br>".$query;
		//exit;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			// Question Scorecard - Starts Here
			//$anscode_table = "anscode_master_".strtolower($this->project);
			$anscode_table = "anscode_master_all";
			$opquery = "SELECT * FROM ".$anscode_table." WHERE skillblueprintno=".$this->skillblueprintno." AND Qno='".$row['Qno']."'"; 
			$opresult = mysql_query($opquery) OR die(mysql_error());
			//echo "<br>".$opquery;
			$oprow = mysql_fetch_array($opresult);
			$scoretable = "<br><table border='1' style='border-collapse: collapse' bordercolor='black'>";
			/*$scoretable .= "<tr><td colspan='2' align='center'>Scorecard</td></tr>";
			$scoretable .= "<tr><td>Description</td><td>AnsCode</td></tr>";*/
			
			if($oprow["mcq"]=="1")
			{
				$scoretable .= "<tr><td>Option ticked (enter option A,B,C,D in English)</td><td align='center'>A,B,C,D</td></tr>";
				$scoretable .= "<tr><td>Invalid Answer Code/More Than One Option Ticked</td><td align='center'>86</td></tr>";
				$scoretable .= "<tr><td>Not Attempted</td><td align='center'>88</td></tr>";
			}
			else 
			{
				for($aci=1; $aci<=10; $aci++)
				{
					$anscode = $oprow["ans_code".$aci];
					if($anscode!="" && $anscode!=NULL)
					{
						$scoretable .= "<tr><td>".$oprow["desc".$aci]."</td><td align='center'>".$anscode."</td></tr>";
					}
				}
			}
			$scoretable .= "</table>";
			// Question Scorecard - Ends Here

			$passage="";
			if($row["passageid"]!=0)
				$passage = $this->fetchPassage($row["passageid"],$connid);
			
			if($row['isasset']=="Y")
			{				
				if ($row['qcode1_ref']==0)
					$img_folder = $this->fetchImgPathName($row['papercode_ref']);
				else 
					$img_folder = $this->fetchImgPathName($row['papercode1_ref']);
				
				$question = $this->orig_to_html($row['question'],$img_folder);	
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);	$optionb = $this->orig_to_html($row['optionb'],$img_folder);	
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);	$optiond = $this->orig_to_html($row['optiond'],$img_folder);	
				
				$question = str_replace("[--","[",$question);	$question = str_replace("--]","]",$question);
				$optiona = str_replace("[--","[",$optiona);	$optiona = str_replace("--]","]",$optiona);
				$optionb = str_replace("[--","[",$optionb);	$optionb = str_replace("--]","]",$optionb);
				$optionc = str_replace("[--","[",$optionc);	$optionc = str_replace("--]","]",$optionc);
				$optiond = str_replace("[--","[",$optiond);	$optiond = str_replace("--]","]",$optiond);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			else 
			{
				$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
				$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
				$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			
			$passagetext="";
			if($passage!="")
				$passagetext = Dotagtoimage($this->imagefolder, $passage);
				
			if(!in_array($row["passageid"],$passagesprinted))
			{
				$outputstring .= "<tr><td colspan='8'>".$passagetext."</td></tr>";
				array_push($passagesprinted,$row["passageid"]);
			}
			
			$outputstring .= "<tr><td align='center'>".$row['Qno']."</td><td align='center'>".$row['qcode']."</td><td>".$question;
			if($row['figure_description']!="")
				$outputstring .= "<br><b>Image Descriptions:<br></b>".$row['figure_description'];
				
			if($row['mcq']=="Y")
			{
				$outputstring .= "<br><table border=1 style='border-collapse: collapse' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
				$outputstring .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
				$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";
			}
			
			$outputstring .= "<br>".$scoretable;
			
			$sfnsf = "";
			if($row["SfNsf"]=="S")
				$sfnsf="SF";
			elseif($row["SfNsf"]=="N")
				$sfnsf="NSF";
			
			$pastresult="";
			if($row['isasset']=="Y" && $row['qcode1_ref']==0)
				$pastresult = $this->fetchPastResultASSET($row['papercode_ref'],$row['qno_ref'],$connid);
			else 
				$pastresult = $this->fetchPastResultLSA($row['qcode_ref'],$connid);
			
			$skillname = $skillarray[$row['projectskillno']];
			if($row['cano']!=0)
				$skillname .= " - ".$caarray[$row['cano']];
				
			$outputstring .= "<td align='center'>".$sfnsf."</td><td align='center'>".$row['gow']."</td><td>".$skillname."</td><td align='center'>".$row['correct_answer']."</td>";
			
			$pastresult="";
			if($row['isasset']=="Y" && $row['qcode1_ref']==0)
				$pastresult = $this->fetchPastResultASSET($row['papercode_ref'],$row['qno_ref'],$connid);
			else 
				$pastresult = $this->fetchPastResultLSA($row['qcode_ref'],$connid);
				
			$refquery  = "SELECT a.Qno,b.papercode FROM lq_questions a, lsa_anscode_master_details b WHERE a.qcode=".$row['qcode_ref']." AND a.skillblueprintno=b.skillblueprintno";
			$refresult = mysql_query($refquery) OR die("B: ".mysql_error());
			$refrow    = mysql_fetch_array($refresult);
					
			$outputstring .= "<td>";
			if($row['qcode_ref']!=0)
			{
				$outputstring .= "<b>Ref1:</b> ";
				if ($row['qcode1_ref']!=0)
				{
					$n="N";
					$imgref="ASSET";
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$n."\",".$row['qcode_ref'].",\"".$n."\",\"".$n."\",\"".$row['papercode1_ref']."\",\"".$imgref."\")';>".$refrow['papercode']."-".$refrow['Qno']." (".$pastresult.")</a><br>";
				}
				else 
				{
					if($row['iscqb']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>(CQB - ".$row['qcode_ref'].")</a><br>";
					else if($row['isasset']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode_ref']."-".$row['qno_ref']."(".$pastresult.")</a><br>";
					else if($row['isda']=="Y")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode_ref']."-".$row['qno_ref']."</a><br>";
					else //if($pastresult!="")
						$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode_ref']."\",".$row['qno_ref'].",\"".$row['isasset']."\",".$row['qcode_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$refrow['papercode']."-".$refrow['Qno']." (".$pastresult.")</a><br>";
				}
			}
			else
				$outputstring .= "&nbsp;<br>";
			
			if($row['qcode1_ref']!=0)
			{
				$pastresult1="";
				if($row['isasset']=="Y")
					$pastresult1 = $this->fetchPastResultASSET($row['papercode1_ref'],$row['qno1_ref'],$connid);
				else 
					$pastresult1 = $this->fetchPastResultLSA($row['qcode1_ref'],$connid);
				
				$refquery1  = "SELECT a.Qno,b.papercode FROM lq_questions a, lsa_anscode_master_details b WHERE a.qcode=".$row['qcode1_ref']." AND a.skillblueprintno=b.skillblueprintno";
				$refresult1 = mysql_query($refquery1) OR die("B: ".mysql_error());
				$refrow1 = mysql_fetch_array($refresult1);
			
				$outputstring .= "<b>Ref2:</b> ";
				if($row['iscqb']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>(CQB - ".$row['qcode1_ref'].")</a><br>";
				else if($row['isasset']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode1_ref']."-".$row['qno1_ref']."(".$pastresult1.")</a><br>";
				else if($row['isda']=="Y")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$row['papercode1_ref']."-".$row['qno1_ref']."</a><br>";
				else //if($pastresult!="")
					$outputstring .= "<a href='javascript: showRefQuestion(\"".$row['papercode1_ref']."\",".$row['qno1_ref'].",\"".$row['isasset']."\",".$row['qcode1_ref'].",\"".$row['iscqb']."\",\"".$row['isda']."\")'>".$refrow1['papercode']."-".$refrow1['Qno']." (".$pastresult1.")</a><br>";
			}
			$outputstring .= "</td>";
				
			
			$outputstring .= "<td><b>Comments:</b><br>".$row['comments']."</td></tr>";
			
			if($row['forProduction']!='' || $row['forEvaluator']!='')
			{
				$outputstring .= "<tr><td colspan='8'>";
				if($row['forProduction']!='')
					$outputstring .= "Translator's comments : ".$row['forProduction']."<br>";
				if($row['forEvaluator']!='')
					$outputstring .= "Evaluator's comments : ".$row['forEvaluator'];
				$outputstring .= "</td></tr>";
			}
				
			$cntr++;
		}
		
		//$cntr--;
		if($cntr==0)
			$outputstring .= "<tr><td align='center' colspan='9'><b>No questions found...</b></td></tr>";
			
		$outputstring .= "<tr><td align='center' colspan='9'><a href='javascript:window.close()'><b>Close Window</b></a></td></tr>";
		$outputstring .= "</table>";
		return $outputstring;
	}
	
	function pageShowRefQuestion($connid)
	{
		$papercode = $_GET["papercode"];
		$papercode1 = $_GET["papercode1"];
		$qno = $_GET["qno"];
		$isasset = $_GET["isasset"];
		$iscqb = $_GET["iscqb"];
		$isda = $_GET["isda"];
		$qcode_ref = $_GET["qcode_ref"];
		$imgref="";
		if (isset($_GET['imgref']) && $_GET['imgref']!="")
			$imgref=$_GET['imgref'];
			
		if($iscqb=="Y")
		{
			$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='6'><b>Common Question Bank</b></td></tr>";
			$outputstring .= "<tr><td align='center'><b>Qcode</td><td align='center'><b>Question</b></td>";
			$outputstring .= "</tr>";
			
			$img_folder = $this->fetchImgPathName($papercode);
			
			$cntr=0;
			$condition = " WHERE a.qcode IN (".$qcodestr.")";
			$query = "SELECT qcode,question,optiona,optionb,optionc,optiond FROM educatio_educat.common_question_bank WHERE qcode=".$qcode_ref;
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$optionstr = "";
				$question = $this->orig_to_html($row['question'],$img_folder);
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);
				$optionb = $this->orig_to_html($row['optionb'],$img_folder);
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);
				$optiond = $this->orig_to_html($row['optiond'],$img_folder);
				
				$srno=$cntr+1;
				$outputstring .= "<tr><td align='center'>".$row['qcode']."</td><td>".$question."</td>";
				$outputstring .= "</tr>";
				$cntr++;
			}
			
			if($cntr==0)
			{
				$outputstring .= "<tr><td align='center' colspan='6'><b>No questions found...</b></td></tr>";
			}
			$outputstring .= "</table>";
		}
		else if(($isasset=="N" || $isasset=="") && ($isda=="N" || $isda==""))
		{
			$query = "SELECT a.Qno,b.papercode FROM lq_questions a, lsa_anscode_master_details b WHERE a.qcode=".$qcode_ref." AND a.skillblueprintno=b.skillblueprintno";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			$row = mysql_fetch_array($result);
			
			$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='6'><b>Paper Code:".$row['papercode']." Qno: ".$row['Qno']."</b></td></tr>";
			$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Qcode</b></td><td align='center'><b>Question</b></td>";
			
			$outputstring .= "<td align='center'><b>SF/NSF</b></td>";
			$outputstring .= "<td align='center'><b>Skill</b></td></tr>";
		
			/*$skillarray = array();
			$query = "SELECT * FROM uskill_master";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$skillarray[$row['skillno']] = $row['skillname'];
			}*/
			
			$query = "SELECT * FROM lsa_anscode_master_details WHERE papercode='".$papercode."'";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			$row = mysql_fetch_array($result);
			$skillblueprintno = $row["skillblueprintno"];
			
			$cntr=0;
			//$condition = " WHERE skillblueprintno=".$skillblueprintno." AND Qno=".$qno." AND a.skillno=b.skillno";
			$condition = " WHERE qcode=".$qcode_ref." AND a.skillno=b.skillno";
			$query = "SELECT a.*,b.skillname FROM lq_questions a, uskill_master b".$condition;
			//echo $query."<br>";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				if ($imgref=="ASSET")
				{
					$img_folder = $this->fetchImgPathName($papercode1);
					$question = $this->orig_to_html($row['question'],$img_folder);
					$optiona = $this->orig_to_html($row['optiona'],$img_folder);
					$optionb = $this->orig_to_html($row['optionb'],$img_folder);
					$optionc = $this->orig_to_html($row['optionc'],$img_folder);
					$optiond = $this->orig_to_html($row['optiond'],$img_folder);
				}
				else 
				{
					$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
					$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
					$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
					
					$question = Dotagtoimage($this->imagefolder, $question);
					$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
					$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
				}
				
				$outputstring .= "<tr><td align='center'>".$row['Qno']."</td><td align='center'>".$row['qcode'];
				if($row['percent_correct']!=0.00)
					$outputstring .= "<br>(".round($row['percent_correct'],1)."%)";
				$outputstring .= "</td><td>".$question;
				
				if($row['mcq']=="Y")
				{
					$outputstring .= "<br><br><table border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A<br>(%)</b></td><td align='center'><b>B<br>(%)</b></td><td align='center'><b>C<br>(%)</b></td>";
					$outputstring .= "<td align='center'><b>D<br>(%)</b></td></td></tr><tr><td align='center'>".$optiona."<br>".round($row['option_a'],1)."</td><td align='center'>".$optionb."<br>".round($row['option_b'],1)."</td>";
					$outputstring .= "<td align='center'>".$optionc."<br>".round($row['option_c'],1)."</td><td align='center'>".$optiond."<br>".round($row['option_d'],1)."</td></tr></table>";
				
					/*$outputstring .= "<br><br><table border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
					$outputstring .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
					$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";*/
				}
				
				//$outputstring .= "<td align='center'>".$row['mcq']."</td><td align='center'>".$row['used']."</td>";
				$outputstring .= "<td align='center'>".$row['SfNsf']."</td><td>".$row['skillname']."</td></tr>";
				$cntr++;
			}
			
			if($cntr==0)
			{
				$outputstring .= "<tr><td align='center' colspan='6'><b>No questions found...</b></td></tr>";
			}
			$outputstring .= "</table>";
		}
		else if($isasset=="Y")
		{
			$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='6'><b>Paper Code:".$papercode." Qno: ".$qno."</b></td></tr>";
			$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Qcode<br>(%)</b></td><td align='center'><b>Question</b></td>";
			$outputstring .= "<td align='center'><b>Skill</b></td></tr>";
			
			$img_folder = $this->fetchImgPathName($papercode);
			$smquery = "SELECT qcode FROM educatio_educat.paper_master WHERE papercode='".$papercode."' AND qno=".$qno;
			$qcodestr = "";
			$smresult = mysql_query($smquery);
			while($smrow=mysql_fetch_array($smresult))
			{
				$qcodestr .= $smrow['qcode'].",";
				//echo $smrow['qcode'];
			}
			$qcodestr = substr($qcodestr,0,-1);
			
			$cntr=0;
			$condition = " WHERE a.qcode IN (".$qcodestr.")";
			$query = "SELECT a.qcode,a.question,a.group_text,a.optiona,a.optionb,a.optionc,a.optiond,b.skillname,c.qno,d.percent_correct,d.option_a,d.option_b,d.option_c,d.option_d FROM educatio_educat.questions a,educatio_educat.unique_skill_master b, educatio_educat.paper_master c, educatio_educat.correct_answers d".$condition." AND a.u_skill_code=b.u_skill_no AND a.qcode=c.qcode AND c.papercode=d.papercode AND c.qno=d.qno ORDER BY c.Qno";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$optionstr = "";
				$question = $this->orig_to_html($row['question'],$img_folder);
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);
				$optionb = $this->orig_to_html($row['optionb'],$img_folder);
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);
				$optiond = $this->orig_to_html($row['optiond'],$img_folder);
				
				if($row['group_text']!="")
				{
					$group_text = $this->orig_to_html($row['group_text'],$img_folder);
					$question = $group_text."<br>".$question;
				}
				/*$optiona = Dotagtoimage($this->imagefolder, $row['optiona']); 		$optionb = Dotagtoimage($this->imagefolder, $row['optionb']);
				$optionc = Dotagtoimage($this->imagefolder, $row['optionc']); 		$optiond = Dotagtoimage($this->imagefolder, $row['optiond']);*/
				
				$srno=$cntr+1;
				
				$optionstr .= "<br><br><table border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A<br>(%)</b></td><td align='center'><b>B<br>(%)</b></td><td align='center'><b>C<br>(%)</b></td>";
				$optionstr .= "<td align='center'><b>D<br>(%)</b></td></td></tr><tr><td align='center'>".$optiona."<br>".round($row['option_a'],1)."</td><td align='center'>".$optionb."<br>".round($row['option_b'],1)."</td>";
				$optionstr .= "<td align='center'>".$optionc."<br>".round($row['option_c'],1)."</td><td align='center'>".$optiond."<br>".round($row['option_d'],1)."</td></tr></table>";
				
				$outputstring .= "<tr><td align='center'>".$row['qno']."</td><td align='center'>".$row['qcode']."<br>(".round($row['percent_correct'],1)."%)</td><td>".$question.$optionstr."</td>";
				$outputstring .= "<td>".$row['skillname']."</td></tr>";
				$outputstring .= "</tr>";
				$cntr++;
			}
			
			
			if($cntr==0)
			{
				$outputstring .= "<tr><td align='center' colspan='6'><b>No questions found...</b></td></tr>";
			}
			$outputstring .= "</table>";
		}
		else if($isda=="Y")
		{
			$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='6'><b>Paper Code:".$papercode." Qno: ".$qno."</b></td></tr>";
			$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Qcode<br>(%)</b></td><td align='center'><b>Question</b></td>";
			$outputstring .= "<td align='center'><b>Skill</b></td></tr>";
			
			$img_folder = $this->fetchImgPathName($papercode);
			$smquery = "SELECT qcode FROM educatio_educat.paper_master WHERE papercode='".$papercode."' AND qno=".$qno;
			$qcodestr = "";
			$smresult = mysql_query($smquery);
			while($smrow=mysql_fetch_array($smresult))
			{
				$qcodestr .= $smrow['qcode'].",";
				//echo $smrow['qcode'];
			}
			$qcodestr = substr($qcodestr,0,-1);
			
			$cntr=0;
			$query = "SELECT * FROM educatio_educat.da_questions WHERE qcode='$qcode_ref' ";
			$result = mysql_query($query) OR die("DA fetch error : ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$optionstr = "";
				$question = $row['question'];
				$optiona = $row['optiona'];
				$optionb = $row['optionb'];
				$optionc = $row['optionc'];
				$optiond = $row['optiond'];
				
				
				/*$optiona = Dotagtoimage($this->imagefolder, $row['optiona']); 		$optionb = Dotagtoimage($this->imagefolder, $row['optionb']);
				$optionc = Dotagtoimage($this->imagefolder, $row['optionc']); 		$optiond = Dotagtoimage($this->imagefolder, $row['optiond']);*/
				
				$srno=$cntr+1;
				
				$optionstr .= "<br><br><table border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A<br>(%)</b></td><td align='center'><b>B<br>(%)</b></td><td align='center'><b>C<br>(%)</b></td>";
				$optionstr .= "<td align='center'><b>D<br>(%)</b></td></td></tr><tr><td align='center'>".$optiona."<br>".round($row['option_a'],1)."</td><td align='center'>".$optionb."<br>".round($row['option_b'],1)."</td>";
				$optionstr .= "<td align='center'>".$optionc."<br>".round($row['option_c'],1)."</td><td align='center'>".$optiond."<br>".round($row['option_d'],1)."</td></tr></table>";
				
				$outputstring .= "<tr><td align='center'>".$row['qno']."</td><td align='center'>".$row['qcode']."<br>(".round($row['percent_correct'],1)."%)</td><td>".$question.$optionstr."</td>";
				$outputstring .= "<td>".$row['skill']."</td></tr>";
				$outputstring .= "</tr>";
				$cntr++;
			}
			
			
			if($cntr==0)
			{
				$outputstring .= "<tr><td align='center' colspan='6'><b>No questions found...</b></td></tr>";
			}
			$outputstring .= "</table>";
		}
		
		return $outputstring;
	}
	
	function fetchPassage($passageid,$connid)
	{
		$query = "SELECT * FROM lq_passagemaster WHERE passageid=".$passageid;
		$result = mysql_query($query) OR die("A: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row["passage"];
	}
	
	function pageShowSimilarQuestions($connid)
	{
		$this->setgetvars();
		$skillarray = array();
		$query = "SELECT * FROM uskill_master";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillno']] = $row['skillname'];
		}
		
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='16'><b>Similar Questions</b></td></tr>";
		$outputstring .= "<tr><td align='center'><b>Qcode</b></td><td align='center'><b>Project</b></td><td align='center'><b>Round</b></td>";
		$outputstring .= "<td align='center'><b>Class</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Qno</b></td>";
		$outputstring .= "<td align='center'><b>Question</b></td><td align='center'><b>A</b></td><td align='center'><b>B</b></td>";
		$outputstring .= "<td align='center'><b>C</b></td><td align='center'><b>D</b></td><td align='center'><b>MCQ</b></td>";
		$outputstring .= "<td align='center'><b>Repeat</b></td><td align='center'><b>Used</b></td><td align='center'><b>SF/NSF</b></td>";
		$outputstring .= "<td align='center'><b>Skill</b></td></tr>";
		
		$simqcodearray = array();
		$simqcodearray = $this->fetchShowSimilarQuestionsLogic2($this->qcode,$connid);
		//print_r ($simqcodearray);
		$cntr=0;
		foreach ($simqcodearray as $index => $qcode) 
		{
			$query = "SELECT * FROM lq_questions WHERE qcode=".$qcode;
			$result = mysql_query($query) OR die("A: ".mysql_error());
			$row = mysql_fetch_array($result);
			
			$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
			$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
			$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
			$question = Dotagtoimage($this->imagefolder, $question);
			$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
			$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			
			$outputstring .= "<tr><td align='center'>".$row['qcode']."</td><td align='center'>".$row['project']."</td><td align='center'>".$row['roundyear']."</td>";
			$outputstring .= "<td align='center'>".$row['class']."</td><td align='center'>".$row['subject']."</td><td align='center'>".$row['Qno']."</td>";
			$outputstring .= "<td>".$question."</td><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
			$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td><td align='center'>".$row['mcq']."</td>";
			$outputstring .= "<td align='center'>".$row['repeated']."</td><td align='center'>".$row['used']."</td><td align='center'>".$row['SfNsf']."</td>";
			$outputstring .= "<td>".$skillarray[$row['skillno']]."</td></tr>";
			
			$cntr++;
			if($cntr==5)
				break;
		}
		
		if(count($simqcodearray)==0)
		{
			$outputstring .= "<tr><td align='center' colspan='16'><b>No similar questions found...</b></td></tr>";
		}
		$outputstring .= "</table>";
		return $outputstring;
	}
	
	
	// Logic2: Count occurance of each word in full question database and make list of qcodes where more than one words are found
	function fetchShowSimilarQuestionsLogic2($qcode,$connid)
	{
		$cuttoffquestions = 5;
		$simqcodearray = array();
		$ignorewordslist = array();
		$query = "SELECT question FROM lq_questions WHERE qcode=".$qcode;
		$result = mysql_query($query) OR die("A: ".mysql_error());
		$row = mysql_fetch_array($result);
		$question = $row['question'];
		
		$query = "SELECT word FROM lq_ignorewords";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			array_push($ignorewordslist, $row['word']);
		}
		
		$question = strip_tags($question);
		$search="&nbsp;";
		$replace=" ";
		$question = str_replace($search,$replace,$question);
		
		// Count word wise total questions in complete database
		//echo "Qcode: ".$qcode." - ".$question."<br>";
		$tokenwisequestionscount = array(); 
		$tokens ="-,;?:!_^#@%$&*()[]{}+=/\"\t\r\n\'1234567890. ";
		$str_token = strtok($question,$tokens);
		while ($str_token)
		{
			if(!in_array(strtolower(trim($str_token)), $ignorewordslist) && !in_array($str_token, $tokenwisequestionscount))	
			{		
				//echo $str_token."<br>";		
				$query = "SELECT COUNT(*) FROM lq_questions WHERE question LIKE '%".$str_token."%' AND qcode!=".$qcode;
				//echo $query;
				$result = mysql_query($query) OR die("C: ".mysql_error());
				$row = mysql_fetch_array($result);
				$tokenwisequestionscount[$str_token] = $row['COUNT(*)'];
			}
			$str_token = strtok($tokens);
		}
		asort($tokenwisequestionscount);
		
		$tokensarray = array();
		$tokenwiseqcodes = array();
		foreach ($tokenwisequestionscount as $word => $count) 
		{
		   array_push($tokensarray, $word);
		   $tokenwiseqcodes[$word] = array();
		   if($count!=0)
		   {
		   		$index=0;		
		   		$query = "SELECT qcode FROM lq_questions WHERE question LIKE '%".$word."%' AND qcode!=".$qcode;
				$result = mysql_query($query) OR die("C: ".mysql_error());
				while($row = mysql_fetch_array($result))
				{
					$tokenwiseqcodes[$word][$index] = $row['qcode'];
					$index++;
				}
		   }
		}
		
		// Make list of qcodes which are common across tokens...
		$totaltokens = count($tokensarray);
		if($totaltokens>1)
		{
			for($ti=0; $ti<$totaltokens-1; $ti++)
			{
				$commoncodes = array();
				$commoncodes = array_intersect($tokenwiseqcodes[$tokensarray[$ti]], $tokenwiseqcodes[$tokensarray[$ti+1]]);
				$simqcodearray = array_merge($simqcodearray, $commoncodes);
			}
		}
		
		if(count($simqcodearray)<$cuttoffquestions)
		{
			for($ti=0; $ti<$totaltokens; $ti++)
			{
				for($qi=0; $qi<count($tokenwiseqcodes[$tokensarray[$ti]]); $qi++)
				{
					$tqcode = $tokenwiseqcodes[$tokensarray[$ti]][$qi];
					if(!in_array($tqcode, $simqcodearray))
						array_push($simqcodearray, $tqcode);
					if(count($simqcodearray)>=$cuttoffquestions)
						break;
				}
				if(count($simqcodearray)>=$cuttoffquestions)
					break;
			}
		}
		$simqcodearray = array_unique($simqcodearray);
		
		//echo "<pre>";
		//print_r ($tokenwisequestionscount);
		//echo "<br>";
		//print_r ($tokenwiseqcodes);
		//print_r ($simqcodearray);
		//echo "</pre>";
		//exit;
		return $simqcodearray;
	}
	
	// Logic1: Count occurance of each word in full question database and give priority to lowest occuring word, find atleast 5 closet matches
	function fetchShowSimilarQuestionsLogic1($connid)
	{
		$cuttoffquestions = 5;
		$simqcodearray = array();
		$ignorewordslist = array();
		$query = "SELECT question FROM lq_questions WHERE qcode=".$this->qcode;
		$result = mysql_query($query) OR die("A: ".mysql_error());
		$row = mysql_fetch_array($result);
		$question = $row['question'];
		
		$query = "SELECT word FROM lq_ignorewords";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			array_push($ignorewordslist, $row['word']);
		}
		
		$question = strip_tags($question);
		$search="&nbsp;";
		$replace=" ";
		$question = str_replace($search,$replace,$question);
		
		// Count word wise total questions in complete database
		echo "Qcode: ".$this->qcode." - ".$question."<br>";
		$tokenwisequestionscount = array(); 
		$tokens ="-,;?:!_^#@%$&*()[]{}+=/\"\t\r\n\'1234567890. ";
		$str_token = strtok($question,$tokens);
		while ($str_token)
		{
			if(!in_array(strtolower(trim($str_token)), $ignorewordslist) && !in_array($str_token, $tokenwisequestionscount))	
			{		
				//echo $str_token."<br>";		
				$query = "SELECT COUNT(*) FROM lq_questions WHERE question LIKE '%".$str_token."%' AND qcode!=".$this->qcode;
				$result = mysql_query($query) OR die("C: ".mysql_error());
				$row = mysql_fetch_array($result);
				$tokenwisequestionscount[$str_token] = $row['COUNT(*)'];
			}
			$str_token = strtok($tokens);
		}
		asort($tokenwisequestionscount);
		/*echo "<pre>";
		print_r ($tokenwisequestionscount);
		echo "</pre>";*/
		
		// Prepare list of similar questions start from least count
		foreach ($tokenwisequestionscount as $word => $count) 
		{
		   if($count!=0 && count($simqcodearray)<$cuttoffquestions)
		   {
		   		$query = "SELECT qcode FROM lq_questions WHERE question LIKE '%".$word."%' AND qcode!=".$this->qcode;
				$result = mysql_query($query) OR die("C: ".mysql_error());
				while($row = mysql_fetch_array($result))
				{
					if(!in_array($row['qcode'], $simqcodearray))
						array_push($simqcodearray, $row['qcode']);
				}
		   }
		}
		//asort($simqcodearray);
		return $simqcodearray;
	}
	
	function pageSkillBlueprint($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
		$commentator = $this->username;
		
		//$condition = " WHERE project='".$this->project."' AND subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
		$condition = " WHERE skillblueprintno=".$this->skillblueprintno;
		$skillblueprintno = $this->skillblueprintno;
		
		/*$query = "SELECT * FROM lsa_anscode_master_details".$condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->numrows();
		$rowtotalquestions = $dbquery->getrowarray();
		$this->totalquestions = $rowtotalquestions["totalquestions"];
		$skillblueprintno = $rowtotalquestions["skillblueprintno"];*/
		
		if($this->action == "Save IPS Comments")
		{
			/*echo "<pre>";
			print_r ($_POST);
			echo "</pre>";*/
			
			$this->setpostvars();
			
			$today = date("d-m-Y");
			for($qno=1; $qno<=$this->totalquestions;$qno++)
			{
				if($_POST["comment$qno"]!="")
				{
					/*$condition  = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND subject='".$this->subject."' AND ";
					$condition .= "class='".$this->class."' AND Qno=".$qno;*/
					
					$condition =" WHERE skillblueprintno=".$this->skillblueprintno." AND Qno=".$qno;
					
					$comments = $commentator." (".$today."): ".$_POST["comment$qno"]."<br>";
					$updquery  = "UPDATE lq_questions SET ";
					$updquery .= "ipsmismatch_comments=IF(ipsmismatch_comments='','".$comments."',CONCAT('".$comments."','<br>',ipsmismatch_comments))";
					$updquery .= $condition;
					//echo "A ".$updquery."<br><br>"; //exit;
					$dbupd = new dbquery($updquery,$connid);
				}
			}
		}
		
		
		if($this->action == "Resolve IPS FR Answers")
		{
			//echo "Resolve IPS FR Answers";exit;
			$this->setpostvars();
			$sbpno = $this->skillblueprintno;
			$totalquestions = $this->totalquestions;
			for($qno=1; $qno<=$totalquestions; $qno++)
			{
				$ans=$_POST["check".$qno];
				if ($ans=='')
					continue;

				$insquery  = "UPDATE lq_ips SET answer='$ans' WHERE skillblueprintno='".$sbpno."' AND qno=".$qno;
				mysql_query($insquery) OR die($insquery." - ".mysql_error());
				//echo $insquery."<br>";
			}
			$message = "Answers Resolved successfully sucessfully...";
		}

		if($this->action == "Save Skill No")
		{
			$insquery1 = "UPDATE lsa_anscode_master_details SET no_of_skills=".$_POST['noofskills'];
			$insquery1 .= $condition;
			
			//echo $insquery1."<br>";
			mysql_query($insquery1) OR die($insquery1."<br>".mysql_error());
		}
		if($this->action == "Save Skill Blueprint")
		{
			/*echo "<pre>";
			print_r ($_POST);
			echo "</pre><br><br>";*/
			//exit;
			$nonew = $this->totalquestions;
			$irno=0;
			$srno=0;
			$insquery1 = "UPDATE lsa_anscode_master_details SET ";
			if(isset($_POST['decisionmakerscomments']))
			{
				$insquery1 .= "decisionmakers_comments='".$_POST['decisionmakerscomments']."', decisionmakers_comments_submitted='".$_POST['decisionmakers_comments_submitted']."',";
			}
			if(isset($_POST['dosfnsf']))
			{
				if(isset($_POST['rdsfnsf']))
				{
					if($_POST['rdsfnsf']=="rdsfper")
					{
						$sf_no = round($_POST['persf']*$this->totalquestions/100,0); 
						$nsf_no = $this->totalquestions-$sf_no;
						$insquery1 .= "sf_per=".$_POST['persf'].", sf_no=".$sf_no.", nsf_no=".$nsf_no.",";
					}
					else 
					{
						$sf_per = round($_POST['nosf']/$this->totalquestions*100,2);
						$nsf_no = $this->totalquestions-$_POST['nosf'];
						$insquery1 .= "sf_per=".$sf_per.", sf_no=".$_POST['nosf'].", nsf_no=".$nsf_no.",";
					}
				}
			}
			if(isset($_POST['dogow']))
			{
				if(isset($_POST['rdgow']))
				{
					if($_POST['rdgow']=="rdgoper")
					{
						$go_no = round($_POST['pergo']*$this->totalquestions/100,0); 
						$w_no = $this->totalquestions-$go_no;
						$insquery1 .= "go_per=".$_POST['pergo'].", go_no=".$go_no.", w_no=".$w_no.",";
					}
					else 
					{
						$go_per = round($_POST['nogo']/$this->totalquestions*100,2);
						$w_no = $this->totalquestions-$_POST['nogo'];
						$insquery1 .= "go_per=".$go_per.", go_no=".$_POST['nogo'].", w_no=".$w_no.",";
					}
				}
			}
			
			if(isset($_POST['doirsrnew']))
			{
				if($_POST['noir']!="")
					$insquery1 .= "ir_no=".$_POST['noir'].",";
				if($_POST['nosr']!="")
					$insquery1 .= "sr_no=".$_POST['nosr'].",";
					
				/////////////////////////////////////////////////
				
				/*$delquery2 = "DELETE FROM lq_irsrsourcedetails WHERE skillblueprintno=".$skillblueprintno;
				mysql_query($delquery2) OR die($delquery2."<br>".mysql_error());
				//echo $delquery2."<br>";
						
				for($si=1; $si<=15; $si++)
				{
					$project_tmp="irproject".$si;
					$roundyear_tmp="irroundyear".$si;
					$class_tmp="irclasses".$si;
					$category_tmp="ircategory".$si;
					$noofquestions_tmp="irquestions".$si;
					
					if($_POST[$project_tmp]!="" && $_POST[$roundyear_tmp]!="" && $_POST[$class_tmp]!="")
					{
						$skillblueprintno_irsr = $this->fetchSkillBlueprintNo_IRSR($_POST[$project_tmp],$_POST[$roundyear_tmp],$_POST[$class_tmp],$this->subject,$_POST[$category_tmp],$connid);
											
						$insquery2  = "INSERT INTO lq_irsrsourcedetails SET ";
						$insquery2 .= "project='".$_POST[$project_tmp]."',roundyear='".$_POST[$roundyear_tmp]."',class='".$_POST[$class_tmp]."',";
						$insquery2 .= "subject='".$this->subject."',category='".$_POST[$category_tmp]."',repeattype='IR',";
						$insquery2 .= "skillblueprintno=".$skillblueprintno.",skillblueprintno_irsr=".$skillblueprintno_irsr;
						if($_POST[$noofquestions_tmp]!="")
						{
							$insquery2 .= ",no_of_questions=".$_POST[$noofquestions_tmp];
							$nonew-=$_POST[$noofquestions_tmp];
							$irno+=$_POST[$noofquestions_tmp];
						}
						mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
						//echo $insquery2."<br>";
					}
				}
				
				for($si=1; $si<=15; $si++)
				{
					$project_tmp="srproject".$si;
					$roundyear_tmp="srroundyear".$si;
					$class_tmp="srclasses".$si;
					$category_tmp="srcategory".$si;
					$noofquestions_tmp="srquestions".$si;
					if($_POST[$project_tmp]!="" && $_POST[$roundyear_tmp]!="" && $_POST[$class_tmp]!="")
					{
						$skillblueprintno_irsr = $this->fetchSkillBlueprintNo_IRSR($_POST[$project_tmp],$_POST[$roundyear_tmp],$_POST[$class_tmp],$this->subject,$_POST[$category_tmp],$connid);
											
						$insquery2  = "INSERT INTO lq_irsrsourcedetails SET ";
						$insquery2 .= "project='".$_POST[$project_tmp]."',roundyear='".$_POST[$roundyear_tmp]."',class='".$_POST[$class_tmp]."',";
						$insquery2 .= "subject='".$this->subject."',category='".$_POST[$category_tmp]."',repeattype='SR',";
						$insquery2 .= "skillblueprintno=".$skillblueprintno.",skillblueprintno_irsr=".$skillblueprintno_irsr;
						
						if($_POST[$noofquestions_tmp]!="")
						{
							$insquery2 .= ",no_of_questions=".$_POST[$noofquestions_tmp];
							$nonew-=$_POST[$noofquestions_tmp];
							$srno+=$_POST[$noofquestions_tmp];
						}
						mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
						//echo $insquery2."<br>";
					}
				}*/
				
				/////////////////////////////////////////////////
			}
			$insquery1 .= "new_no=".$nonew.",no_of_skills=".$_POST['noofskills'];
			$insquery1 .= $condition;
			//echo $insquery1;
			//exit;
			
			//echo $insquery1."<br>";
			mysql_query($insquery1) OR die($insquery1."<br>".mysql_error());
			
			
			//$delquery2 = "DELETE FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$skillblueprintno;
			//mysql_query($delquery2) OR die($delquery2."<br>".mysql_error());
			//echo $delquery2."<br>";
			//exit;
			$sbpbrno = array();
			$cntquery2  = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$skillblueprintno." ORDER BY skillblueprintbreakupno";	
			$cntresult2 = mysql_query($cntquery2) OR die("Cntquery2: ".mysql_error());
			while($cntrow2 = mysql_fetch_array($cntresult2))
			{
				array_push($sbpbrno,$cntrow2['skillblueprintbreakupno']);
			}
			
			/*echo "<pre>";
			print_r ($sbpbrno);
			echo "</pre>";
			exit;*/
			
			if(count($sbpbrno)==0)
			{
				for($si=1; $si<=$_POST['noofskills']; $si++)
				{
					$skillvar="skillname".$si;
					if(isset($_POST[$skillvar]) && $_POST[$skillvar]!="")
					{
						$universalskill = "unversalskill".$si;
						$noofquestions = "no_of_questions".$si;
						$caskill = "caskill".$si;
						
						$insquery2 = "INSERT INTO lsa_skillblueprint_breakup SET ";
						$insquery2 .= "skillblueprintno=".$skillblueprintno.",skillname='".$_POST[$skillvar]."',uskill_no=".$_POST[$universalskill].",no_of_questions=".$_POST[$noofquestions];
						if(isset($_POST[$caskill]) && $_POST[$caskill]!="")
						{
							$insquery2 .= ",cano=".$_POST[$caskill];
						}
						
						mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
						//echo $insquery2."<br>";
					}
				}
			}
			else 
			{
				$sbpbrnoindex=0;
				for($si=1; $si<=$_POST['noofskills']; $si++)
				{
					$skillvar="skillname".$si;
					if(isset($_POST[$skillvar]) && $_POST[$skillvar]!="")
					{
						$skillblueprintbreakupno = $sbpbrno[$sbpbrnoindex];
						$sbpbrnoindex++;
						$universalskill = "unversalskill".$si;
						$noofquestions = "no_of_questions".$si;
						$caskill = "caskill".$si;
						
						if($skillblueprintbreakupno==0)
						{
							$insquery2 = "INSERT INTO lsa_skillblueprint_breakup SET skillblueprintno=".$this->skillblueprintno.", skillname='".$_POST[$skillvar]."',uskill_no=".$_POST[$universalskill].",no_of_questions=".$_POST[$noofquestions];
							if(isset($_POST[$caskill]) && $_POST[$caskill]!="")
							{
								$insquery2 .= ",cano=".$_POST[$caskill];
							}
							mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
							//echo $insquery2."<br>";
						}
						else 
						{
							$insquery2 = "UPDATE lsa_skillblueprint_breakup SET skillname='".$_POST[$skillvar]."',uskill_no=".$_POST[$universalskill].",no_of_questions=".$_POST[$noofquestions];
							if(isset($_POST[$caskill]) && $_POST[$caskill]!="")
							{
								$insquery2 .= ",cano=".$_POST[$caskill];
							}
							$insquery2 .= " WHERE skillblueprintbreakupno=".$skillblueprintbreakupno;
							mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
							//echo $insquery2."<br>";
							
							$insquery2 = "UPDATE lq_questions SET skillno=".$_POST[$universalskill];
							if(isset($_POST[$caskill]) && $_POST[$caskill]!="")
							{
								$insquery2 .= ",cano=".$_POST[$caskill];
							}
							$insquery2 .= " WHERE projectskillno=".$skillblueprintbreakupno;
							mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
						}
						//echo $insquery2."<br>";
					}
				}
			}
			//exit;
			
			//$querystring ="project=".$this->project."&subject=".$this->subject."&classes=".$this->class."&roundyear=".$this->roundyear."&papercode=".$this->papercode."&category=".$this->category."&actiontoperform=Validate Raw Score Master Data";
			$querystring ="skillblueprintno=".$this->skillblueprintno."&actiontoperform=Validate Raw Score Master Data";
			$addquestionsurl = "lq_prepare_questions_frames.php?".$querystring;
			echo "<script>window.location='".$addquestionsurl."';</script>";
		}
	}
	
	function pageSkillBlueprintStep2($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$condition = " WHERE project='".$this->project."' AND subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
		$query = "SELECT * FROM lsa_anscode_master_details".$condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->numrows();
		$rowtotalquestions = $dbquery->getrowarray();
		$this->totalquestions = $rowtotalquestions["totalquestions"];
		$skillblueprintno = $rowtotalquestions["skillblueprintno"];
		$nonew = $this->totalquestions;
		$irno=0;
		$srno=0;
		
		if($this->action == "Save Skill Blueprint Step2")
		{
			/*echo "<pre>";
			print_r ($_POST);
			echo "</pre><br><br>";*/
			//exit;
			
			$delquery2 = "DELETE FROM lq_irsrsourcedetails WHERE skillblueprintno=".$skillblueprintno;
			mysql_query($delquery2) OR die($delquery2."<br>".mysql_error());
			//echo $delquery2."<br>";
					
			for($si=1; $si<=$rowtotalquestions['no_of_irsources']; $si++)
			{
				$project_tmp="irproject".$si;
				$roundyear_tmp="irroundyear".$si;
				$class_tmp="irclasses".$si;
				$subject_tmp="irsubject".$si;
				$category_tmp="ircategory".$si;
				$papercode_tmp="irpapercode".$si;
				$noofquestions_tmp="irquestions".$si;
				$skillblueprintno_irsr = $this->fetchSkillBlueprintNo_IRSR($_POST[$project_tmp],$_POST[$roundyear_tmp],$_POST[$class_tmp],$_POST[$subject_tmp],$_POST[$category_tmp],$connid);
									
				$insquery2  = "INSERT INTO lq_irsrsourcedetails SET ";
				$insquery2 .= "project='".$_POST[$project_tmp]."',roundyear='".$_POST[$roundyear_tmp]."',class='".$_POST[$class_tmp]."',";
				$insquery2 .= "subject='".$_POST[$subject_tmp]."',category='".$_POST[$category_tmp]."',papercode='".$_POST[$papercode_tmp]."',repeattype='IR',";
				$insquery2 .= "skillblueprintno=".$skillblueprintno.",skillblueprintno_irsr=".$skillblueprintno_irsr.",no_of_questions=".$_POST[$noofquestions_tmp];
				
				$nonew-=$_POST[$noofquestions_tmp];
				$irno+=$_POST[$noofquestions_tmp];
				mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
				//echo $insquery2."<br>";
			}
			
			for($si=1; $si<=$rowtotalquestions['no_of_srsources']; $si++)
			{
				$project_tmp="srproject".$si;
				$roundyear_tmp="srroundyear".$si;
				$class_tmp="srclasses".$si;
				$subject_tmp="srsubject".$si;
				$category_tmp="srcategory".$si;
				$papercode_tmp="srpapercode".$si;
				$noofquestions_tmp="srquestions".$si;
				$skillblueprintno_irsr = $this->fetchSkillBlueprintNo_IRSR($_POST[$project_tmp],$_POST[$roundyear_tmp],$_POST[$class_tmp],$_POST[$subject_tmp],$_POST[$category_tmp],$connid);
									
				$insquery2  = "INSERT INTO lq_irsrsourcedetails SET ";
				$insquery2 .= "project='".$_POST[$project_tmp]."',roundyear='".$_POST[$roundyear_tmp]."',class='".$_POST[$class_tmp]."',";
				$insquery2 .= "subject='".$_POST[$subject_tmp]."',category='".$_POST[$category_tmp]."',papercode='".$_POST[$papercode_tmp]."',repeattype='SR',";
				$insquery2 .= "skillblueprintno=".$skillblueprintno.",skillblueprintno_irsr=".$skillblueprintno_irsr.",no_of_questions=".$_POST[$noofquestions_tmp];
				
				$nonew-=$_POST[$noofquestions_tmp];
				$srno+=$_POST[$noofquestions_tmp];
				mysql_query($insquery2) OR die($insquery2."<br>".mysql_error());
				//echo $insquery2."<br>";
			}
			
			$insquery1 = "UPDATE lsa_anscode_master_details SET new_no=".$nonew.",ir_no=".$irno.",sr_no=".$srno;
			$insquery1 .= $condition;
			
			//echo $insquery1."<br>";
			mysql_query($insquery1) OR die($insquery1."<br>".mysql_error());
			
			$skillblueprintstep2 = "lq_listotherskillblueprints.php";
			echo "<script>window.location='".$skillblueprintstep2."';</script>";
		}
	}
	
	function fetchIRSSRMapping($skillblueprintno,$connid)
	{
		/*$output_string  = "<br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$output_string .= "<tr><td align='center'>";*/
		
		$output_string = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='11' align='center'><b>IR/SR Mapping</b></td></tr>";
		$output_string .= "<tr><th align='center' rowspan=2><b>S.No.</b></th><th align='center' rowspan=2><b>Q.No.</b></th><th align='center' rowspan=2><b>IR/SR</b></th><th colspan=4>Reference1</th><th colspan=4>Reference2</th></tr>";
		$output_string .= "<tr align='center'><td><b>Project</b></td><td align='center'><b>Round</b></td><td><b>Class</b></td><td><b>Q.No.</b></td>
		<td align='center'><b>Project</b></td><td align='center'><b>Round</b></td><td align='center'><b>Class</b></td><td align='center'><b>Q.No.</b></td></tr>";//<td align='center'><b>Papercode</b></td>
		
		$srno=1;
		//$query = "SELECT Qno,repeattype,isasset,iscqb,qcode_ref,papercode_ref,qno_ref FROM lq_questions WHERE repeattype='IR' AND skillblueprintno=".$skillblueprintno." ORDER BY Qno";
		$query = "SELECT Qno,repeattype,isasset,isda,iscqb,qcode_ref,papercode_ref,qno_ref,qcode1_ref,papercode1_ref,qno1_ref FROM lq_questions WHERE repeattype in ('IR','SR') AND skillblueprintno=".$skillblueprintno." ORDER BY Qno";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$project = ""; $round = ""; $class = "";
			$ref1="<td>".$row['repeattype']."</td>";
			$ref2="";
			
			if(($row['isasset']=="Y" || $row['isda']=="Y" || $row['iscqb']=="Y") && $row['qcode1_ref']!=0)
			{
				$pcquery  = "SELECT * FROM lq_questions WHERE qcode='".$row['qcode_ref']."'";
				$pcresult = mysql_query($pcquery) OR die("B: ".mysql_error());
				$pcrow    = mysql_fetch_array($pcresult);
				$projectref1 = $pcrow['project'];
				$roundref1   = $pcrow['roundyear'];
				$classref1   = $pcrow['class'];
				$qnoref1   = $pcrow['Qno'];
				
				$ref1 .= "<td>$projectref1</td><td>$roundref1</td><td>$classref1</td><td>$qnoref1</td>";
					
				if ($row['isasset']=="Y"){
					$project = "ASSET";
					if(strlen($row['papercode1_ref'])==3)
					{
						$round = substr($row['papercode1_ref'],2,1);
						$class = substr($row['papercode1_ref'],1,1);
					}
					$qno = $row['qno1_ref'];
					$ref2 .= "<td>$project</td><td>$round</td><td>$class</td><td>$qno</td>";
				}
				elseif ($row['isda']=="Y")
				{
					$project = "DA";
					$round = "";
					$class = "";
					$qno = $row['qno1_ref'];
										
					$ref2 .= "<td>$project</td><td>$round</td><td>$class</td><td>$qno</td>";
				}
				else if ($row['iscqb']=="Y")
				{
					$project = "CQB";
					$round = "";
					$class = "";
					$ref2 .= "<td>$project</td><td>$round</td><td>$class</td><td></td>";
				}
			}
			else if(($row['isasset']!="Y" && $row['isda']!="Y" && $row['iscqb']!="Y") && $row['qcode1_ref']!=0)
			{
				$pcquery  = "SELECT * FROM lq_questions WHERE qcode='".$row['qcode_ref']."'";
				$pcresult = mysql_query($pcquery) OR die("B: ".mysql_error());
				$pcrow    = mysql_fetch_array($pcresult);
				$projectref1 = $pcrow['project'];
				$roundref1   = $pcrow['roundyear'];
				$classref1   = $pcrow['class'];
				$qnoref1   = $pcrow['Qno'];
				
				$ref1.="<td>$projectref1</td><td>$roundref1</td><td>$classref1</td><td>$qnoref1</td>";
				
				$pcquery  = "SELECT * FROM lq_questions WHERE qcode='".$row['qcode1_ref']."'";
				$pcresult = mysql_query($pcquery) OR die("B: ".mysql_error());
				$pcrow    = mysql_fetch_array($pcresult);
				$projectref2 = $pcrow['project'];
				$roundref2   = $pcrow['roundyear'];
				$classref2   = $pcrow['class'];
				$qnoref2   = $pcrow['Qno'];
				
				$ref2.="<td>$projectref2</td><td>$roundref2</td><td>$classref2</td><td>$qnoref2</td>";
			}
			else 
			{
				$ref2.="<td></td><td></td><td></td><td></td>";
				if ($row['isasset']=="Y"){
					$project = "ASSET";
					if(strlen($row['papercode_ref'])==3)
					{
						$round = substr($row['papercode_ref'],2,1);
						$class = substr($row['papercode_ref'],1,1);
					}
					$qno = $row['qno_ref'];
					$ref1 .= "<td>$project</td><td>$round</td><td>$class</td><td>$qno</td>";
				}
				elseif ($row['isda']=="Y")
				{
					$project = "DA";
					$round = "";
					$class = "";
					$qno = $row['qno1_ref'];
										
					$ref1 .= "<td>$project</td><td>$round</td><td>$class</td><td>$qno</td>";
				}
				else if ($row['iscqb']=="Y")
				{
					$project = "CQB";
					$round = "";
					$class = "";
					$ref1 .= "<td>$project</td><td>$round</td><td>$class</td><td></td>";
				}
				else {
					$pcquery  = "SELECT * FROM lq_questions WHERE qcode='".$row['qcode_ref']."'";
					$pcresult = mysql_query($pcquery) OR die("B: ".mysql_error());
					$pcrow    = mysql_fetch_array($pcresult);
					$projectref1 = $pcrow['project'];
					$roundref1   = $pcrow['roundyear'];
					$classref1   = $pcrow['class'];
					$qnoref1   = $pcrow['Qno'];
					$ref1.="<td>$projectref1</td><td>$roundref1</td><td>$classref1</td><td>$qnoref1</td>";
				}
			}

			/*if($row['isasset']=="Y" && $row['qcode1_ref']!=0)
			{
				$project = "ASSET";
				if(strlen($row['papercode1_ref'])==3)
				{
					$round = substr($row['papercode1_ref'],2,1);
					$class = substr($row['papercode1_ref'],1,1);
				}
			}
			else if ($row['iscqb']=="Y")
			{
				$project = "CQB";
				$round = "";
				$class = "";
			}
			else 
			{
				//$pcquery  = "SELECT * FROM lsa_anscode_master_details WHERE papercode='".$row['papercode_ref']."'";
				$pcquery  = "SELECT * FROM lq_questions WHERE qcode='".$row['qcode_ref']."'";
				$pcresult = mysql_query($pcquery) OR die("B: ".mysql_error());
				$pcrow    = mysql_fetch_array($pcresult);
				$project = $pcrow['project'];
				$round   = $pcrow['roundyear'];
				$class   = $pcrow['class'];
			}*/
			
			/*$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['Qno']."</td>";
			if($row['qno_ref']!=0)
				$output_string .= "<td align='center'>".$project."</td><td align='center'>".$round."</td><td align='center'>".$class."</td><td align='center'>".$row['qno_ref']."</td><td align='center'>".$row['papercode_ref']."</td>";
			else if ($row['iscqb']=="Y")
				$output_string .= "<td align='center'>".$project."</td><td align='center'></td><td align='center'></td><td align='center'>".$row['qcode_ref']."</td><td align='center'></td>";
			else 
				$output_string .= "<td align='center'></td><td align='center'></td><td align='center'></td><td align='center'></td><td align='center'></td>";
			$output_string .= "</tr>";*/
			$output_string.="<tr><td>$srno</td><td align='center'>".$row['Qno']."</td>$ref1 $ref2</tr>";
			$srno++;
		}
		$output_string .= "</table>";
		//$output_string .= "</table></td>";
		
		/*$output_string .= "<td align='center'><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='7' align='center'><b>SR Mapping</b></td></tr>";
		$output_string .= "<tr><td align='center'><b>S.No.</b></td><td align='center'><b>Q.No.</b></td><td align='center'><b>Project</b></td><td align='center'><b>Round</b></td><td align='center'><b>Class</b></td><td align='center'><b>Q.No.</b></td><td align='center'><b>Papercode</b></td></tr>";
		
		$srno=1;
		$query = "SELECT Qno,repeattype,isasset,iscqb,qcode_ref,papercode_ref,qno_ref,qcode1_ref,papercode1_ref,qno1_ref FROM lq_questions WHERE repeattype='SR' AND skillblueprintno=".$skillblueprintno." ORDER BY Qno";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$project = ""; $round = ""; $class = "";
			if($row['isasset']=="Y" && $row['qcode1_ref']==0)
			{
				$project = "ASSET";
				if(strlen($row['papercode_ref'])==3)
				{
					$round = substr($row['papercode_ref'],2,1);
					$class = substr($row['papercode_ref'],1,1);
				}
			}
			else if($row['isasset']=="Y" && $row['qcode1_ref']!=0)
			{
				$project = "ASSET";
				if(strlen($row['papercode1_ref'])==3)
				{
					$round = substr($row['papercode1_ref'],2,1);
					$class = substr($row['papercode1_ref'],1,1);
				}
			}
			else if ($row['iscqb']=="Y")
			{
				$project = "CQB";
				$round = "";
				$class = "";
			}
			else 
			{
				//$pcquery  = "SELECT * FROM lsa_anscode_master_details WHERE papercode='".$row['papercode_ref']."'";
				$pcquery  = "SELECT * FROM lq_questions WHERE qcode='".$row['qcode_ref']."'";
				$pcresult = mysql_query($pcquery) OR die("B: ".mysql_error());
				$pcrow    = mysql_fetch_array($pcresult);
				$project = $pcrow['project'];
				$round   = $pcrow['roundyear'];
				$class   = $pcrow['class'];
			}
			
			$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['Qno']."</td>";
			if($row['qno_ref']!=0)
				$output_string .= "<td align='center'>".$project."</td><td align='center'>".$round."</td><td align='center'>".$class."</td><td align='center'>".$row['qno_ref']."</td><td align='center'>".$row['papercode_ref']."</td>";
			else if ($row['iscqb']=="Y")
				$output_string .= "<td align='center'>".$project."</td><td align='center'></td><td align='center'></td><td align='center'>".$row['qcode_ref']."</td><td align='center'></td>";
			else 
				$output_string .= "<td align='center'></td><td align='center'></td><td align='center'></td><td align='center'></td><td align='center'></td>";
			$output_string .= "</tr>";
			$srno++;			
		}
		$output_string .= "</table></td>";
		
		$output_string .= "</td></tr></table>";*/
		return $output_string;
	}
	
	function pageListOtherSkillBlueprints($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$this->setbasevars($this->skillblueprintno,1,$connid);
		//$querystring ="project=".$this->project."&subject=".$this->subject."&classes=".$this->class."&roundyear=".$this->roundyear."&papercode=".$this->papercode."&category=".$this->category;
		if($this->action=="Search Skill Blue Print")
		{
			$querystring ="skillblueprintno=".$this->skillblueprintno;
			
			$universalskills = array();
			$universalskills = $this->fetchUniversalSkillsArray($connid);
			$srno=1;
			$output_string  = "<br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='10' align='center'><b>Other Skill Blueprints</b></td></tr>";
		    //$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='14' align='center'><b>Project: </b>".$this->project."&nbsp;&nbsp;<b>Subject: </b>".$this->subject."</td></tr>";
		    $output_string .= "<tr><td align='center'><b>Sr<br>No</b></td>";
		    $output_string .= "<td align='center'><b>Class</b></td><td align='center'><b>Total<br>Questions</b></td>";
			$output_string .= "<td align='center'><b>% of<br>GO</b></td><td align='center'><b>% of<br>SF</b></td><td  align='center'><b>% of<br>IR</b></td><td align='center'><b>% of<br>Similar</b></td><td align='center'><b>% of<br>New</b></td>";
		    $output_string .= "<td align='center'><b>Skills</b></td><td align='center'><b>Action</b></td></tr>";
		    
			$query = "SELECT * FROM lsa_anscode_master_details WHERE no_of_skills!=0 AND project='".$this->irproject1."' AND roundyear='".$this->irroundyear1."' AND class='".$this->irclasses1."' AND subject='".$this->subject."' ORDER BY project,roundyear,subject,class";
			//echo $query."<br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$totalquestions  = $row["totalquestions"];
				$skillblueprintno  = $row["skillblueprintno"];
				$skillblueprint  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
				$skillblueprint .= "<tr><td align='center'><b>Sr<br>No</b></td><td align='center'><b>Skill name</b></td>";
				$skillblueprint .= "<td align='center'><b>Universal Skill</b></td><td align='center'><b># of<br>Questions</b></td></tr>";
	
				$srno_inn=1;
				$condition = " WHERE skillblueprintno=".$skillblueprintno;
				$sbquery = "SELECT * FROM lsa_skillblueprint_breakup".$condition." ORDER BY skillblueprintbreakupno";
				$sbdbquery = new dbquery($sbquery,$connid);
				while($sbrow = $sbdbquery->getrowarray())
				{		
					$skillblueprint .="<tr><td align='center'>".$srno_inn."</td>";
					$skillblueprint .="<td align='center'>".$sbrow['skillname']."</td><td>".$universalskills[$sbrow['uskill_no']]."</td>";
					$skillblueprint .="<td align='center'>".$sbrow['no_of_questions']."</td></tr>";
					$srno_inn++;
				}
				$skillblueprint .="</table>";
				
				/*$irdetails  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
				$irdetails .= "<tr><td align='center'><b>Sr<br>No</b></td><td align='center'><b>Project</b></td>";
				$irdetails .= "<td align='center'><b>Round</b></td><td align='center'><b>Class</b><td align='center'><b>Category</b></td></td><td align='center'><b># of<br>Questions</b></td></tr>";
	
				$srno_inn=1;
				$condition = " WHERE skillblueprintno=".$irdetailsno;
				$sbquery = "SELECT * FROM  lq_irsrsourcedetails WHERE skillblueprintno=".$skillblueprintno." AND repeattype='IR' ORDER BY irsrid";
				$sbdbquery = new dbquery($sbquery,$connid);
				while($sbrow = $sbdbquery->getrowarray())
				{		
					$irdetails .="<tr><td align='center'>".$srno_inn."</td>";
					$irdetails .="<td align='center'>".$sbrow['project']."</td><td>".$sbrow['roundyear']."</td><td align='center'>".$sbrow['class']."</td>";
					$irdetails .="<td align='center'>".$sbrow['category']."</td><td align='center'>".$sbrow['no_of_questions']."</td></tr>";
					$srno_inn++;
				}
				$irdetails .="</table>";
				
				$srdetails  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
				$srdetails .= "<tr><td align='center'><b>Sr<br>No</b></td><td align='center'><b>Project</b></td>";
				$srdetails .= "<td align='center'><b>Round</b></td><td align='center'><b>Class</b><td align='center'><b>Category</b></td></td><td align='center'><b># of<br>Questions</b></td></tr>";
	
				$srno_inn=1;
				$condition = " WHERE skillblueprintno=".$srdetailsno;
				$sbquery = "SELECT * FROM  lq_irsrsourcedetails WHERE skillblueprintno=".$skillblueprintno." AND repeattype='SR' ORDER BY irsrid";
				$sbdbquery = new dbquery($sbquery,$connid);
				while($sbrow = $sbdbquery->getrowarray())
				{		
					$srdetails .="<tr><td align='center'>".$srno_inn."</td>";
					$srdetails .="<td align='center'>".$sbrow['project']."</td><td>".$sbrow['roundyear']."</td><td align='center'>".$sbrow['class']."</td>";
					$srdetails .="<td align='center'>".$sbrow['category']."</td><td align='center'>".$sbrow['no_of_questions']."</td></tr>";
					$srno_inn++;
				}
				$srdetails .="</table>";*/
				
				$output_string .= "<tr><td align='center'>".$srno."</td>";
			    $output_string .= "<td align='center'>".$row['class']."</td><td align='center'>".$totalquestions."</td>";
			    $output_string .= "<td align='center'>".$row['go_per']."</td><td align='center'>".$row['sf_per']."</td><td  align='center'>".round(($row['ir_no']/$totalquestions*100),1)."</td><td align='center'>".round(($row['sr_no']/$totalquestions*100),1)."</td><td align='center'>".round(($row['new_no']/$totalquestions*100),1)."</td>";
			    $output_string .= "<td align='center' valign='top'>".$skillblueprint."</td>";
			    /*$output_string .= "<td align='center' valign='top'>".$irdetails."</td>";
			    $output_string .= "<td align='center' valign='top'>".$srdetails."</td>";*/
			    $querystring1 = $querystring."&skillblueprintno_from=".$skillblueprintno;
			    
			    $output_string .= "<td align='center'><input type='button' name='Import' value='Import' onclick='importskillblueprint(\"".$querystring1."\")'></td>";
			    $output_string .= "</tr>";
			    $output_string .= "<tr bgcolor='#DCDCDC'><td colspan='12'></td></tr>";
			    $srno++;
			}
			$output_string .= "<tr><td colspan='16' align='center'><a href='lsa_projectwise_rawscore_status.php'>Home</a></td></tr>";
			$output_string .= "</table>";		
			return $output_string;
		}
	}
	
	function fetchAnswerOptionsBalance($skillblueprintno,$connid)
	{
		$this->setgetvars();
		$this->setbasevars($skillblueprintno,1,$connid);
		$output_string = "";
		
		$output_string  = "<table border=1 style='border-collapse: collapse; display:none;' align='center' bordercolor='#333333' id='aopbtbl'>";
	    $output_string .= "<tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td><td align='center'><b>D</b></td></tr>";
		$output_string .= "<tr>";	    
	    $anscodes_opbal = array("A","B","C","D");
	    for($opi=0; $opi<count($anscodes_opbal); $opi++)
	    {
	    	$query = "SELECT COUNT(*) FROM lq_questions WHERE skillblueprintno=".$skillblueprintno." AND correct_answer='".$anscodes_opbal[$opi]."'";
	    	$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$output_string .= "<td align='center'>".$row['COUNT(*)']."</td>";
			}
	    }
		$output_string .= "</tr></table>";    
		return $output_string;
	}
	
	function fetchSkillBlueprint_Details($skillblueprintno,$connid)
	{
		//echo "Yes";
		//$querystring ="project=".$this->project."&subject=".$this->subject."&classes=".$this->class."&roundyear=".$this->roundyear."&papercode=".$this->papercode."&category=".$this->category;
		
		$this->setgetvars();
		$this->setbasevars($skillblueprintno,1,$connid);
		$output_string = "";
		
		//if($this->subject=="EVS" || $this->subject=="SS")
		if(in_array($this->subject,$this->subjectswithcontentarea))
		{
			$caarray = array();
			$query = "SELECT * FROM  contentarea_master";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$caarray[$row['cano']] = $row['caname'];
			}
			
			$uskillarray = array();
			$query = "SELECT * FROM  uskill_master";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$uskillarray[$row['skillno']] = $row['skillname'];
			}
			if($this->subject=="SS")
			{
				$uskillarray_used = array();
				$caarray_used = array();
				
				$tqarray = array();
				$tqarray_entered = array();
				$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$skillblueprintno;
				$dbquery = new dbquery($query,$connid);
				$skillcombo = "<option value=''></option>";
				while($row = $dbquery->getrowarray())
				{
					if(!in_array($row['uskill_no'],$uskillarray_used))
						array_push($uskillarray_used,$row['skillblueprintbreakupno']);
						
					if(!in_array($row['cano'],$caarray_used))
						array_push($caarray_used,$row['cano']);
						
					if($row['skillname']!="")
						$uskillarray[$row['skillblueprintbreakupno']] = $row['skillname'];
					
					$tqarray[$row['skillblueprintbreakupno']][$row['cano']]=$row['no_of_questions'];
					
					$tqquery = "SELECT COUNT(*) FROM lq_questions WHERE skillblueprintno=".$skillblueprintno." AND projectskillno=".$row['skillblueprintbreakupno']." AND skillno=".$row['uskill_no']." AND cano=".$row['cano'];
					$tqdbquery = new dbquery($tqquery,$connid);
					$tqrow = $tqdbquery->getrowarray();
					$tqarray_entered[$row['skillblueprintbreakupno']][$row['cano']] = $tqrow['COUNT(*)'];
					
				}
				$colspan = count($caarray_used)+1;
				$output_string  = "<table border=1 style='border-collapse: collapse; align='center' bordercolor='#333333'>";
				$output_string .= "<tr><td align='center' rowspan='2'><b>Skills</b></td><td align='center' colspan='".$colspan."'><b>Content Area</b></td></tr>";
				$output_string .= "<tr>";
				for($cai=0; $cai<count($caarray_used); $cai++)
				{
					$output_string .= "<td align='center'>".$caarray[$caarray_used[$cai]]."</td>";
				}
				$output_string .= "<td align='center'>Total</td>";
				$output_string .= "</tr>";
				
				for($sai=0; $sai<count($uskillarray_used); $sai++)
				{
					$skilltotal = 0;
					$output_string .= "<tr><td align='center'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"skillno\",0,".$uskillarray_used[$sai].")'>".$uskillarray[$uskillarray_used[$sai]]."</a></td>";
					//$output_string .= "<tr><td align='center'>".$uskillarray[$uskillarray_used[$sai]]."</td>";
					for($cai=0; $cai<count($caarray_used); $cai++)
					{
						if(isset($tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]]))
							$output_string .= "<td align='center'><a href='javascript: showSelectedQuestions_Content(".$this->skillblueprintno.",\"skillno\",".$uskillarray_used[$sai].",\"cano\",".$caarray_used[$cai].")'>".$tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]]."</a>/".$tqarray[$uskillarray_used[$sai]][$caarray_used[$cai]]."</td>";
						else 
							$output_string .= "<td align='center'>&nbsp;</td>";
						$skilltotal += $tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]];
					}
					$output_string .= "<td align='center'>".$skilltotal."</td>";
					$output_string .= "</tr>";
				}
				
				$finaltotal=0;
				$output_string .= "<tr><td align='center'>Total</td>";
				for($cai=0; $cai<count($caarray_used); $cai++)
				{
					$skilltotal = 0;
					
					for($sai=0; $sai<count($uskillarray_used); $sai++)
					{
						$skilltotal += $tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]];
					}
					$output_string .= "<td align='center'>".$skilltotal."</td>";
					$finaltotal+=$skilltotal;
				}
				$output_string .= "<td align='center'><b>".$finaltotal."</b></td>";
				$output_string .= "</tr>";
				
				$output_string .= "</table><br>";
			}
			else 
			{
				$uskillarray_used = array();
				$caarray_used = array();
				
				$tqarray = array();
				$tqarray_entered = array();
				$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$skillblueprintno;
				$dbquery = new dbquery($query,$connid);
				$skillcombo = "<option value=''></option>";
				while($row = $dbquery->getrowarray())
				{
					if(!in_array($row['uskill_no'],$uskillarray_used))
						array_push($uskillarray_used,$row['uskill_no']);
						
					if(!in_array($row['cano'],$caarray_used))
						array_push($caarray_used,$row['cano']);
						
					if($row['skillname']!="")
						$uskillarray[$row['uskill_no']] = $row['skillname'];
					
					$tqarray[$row['uskill_no']][$row['cano']]=$row['no_of_questions'];
					
					$tqquery = "SELECT COUNT(*) FROM lq_questions WHERE skillblueprintno=".$skillblueprintno." AND projectskillno=".$row['skillblueprintbreakupno']." AND skillno=".$row['uskill_no']." AND cano=".$row['cano'];
					$tqdbquery = new dbquery($tqquery,$connid);
					$tqrow = $tqdbquery->getrowarray();
					$tqarray_entered[$row['uskill_no']][$row['cano']] = $tqrow['COUNT(*)'];
					
				}
				$colspan = count($caarray_used)+1;
				$output_string  = "<table border=1 style='border-collapse: collapse; align='center' bordercolor='#333333'>";
				$output_string .= "<tr><td align='center' rowspan='2'><b>Skills</b></td><td align='center' colspan='".$colspan."'><b>Content Area</b></td></tr>";

				$output_string .= "<tr>";
				for($cai=0; $cai<count($caarray_used); $cai++)
				{
					$output_string .= "<td align='center'>".$caarray[$caarray_used[$cai]]."</td>";
				}
				$output_string .= "<td align='center'>Total</td>";
				$output_string .= "</tr>";
				
				for($sai=0; $sai<count($uskillarray_used); $sai++)
				{
					$skilltotal = 0;
					$output_string .= "<tr><td align='center'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"skillno\",0,".$uskillarray_used[$sai].")'>".$uskillarray[$uskillarray_used[$sai]]."</a></td>";
					//$output_string .= "<tr><td align='center'>".$uskillarray[$uskillarray_used[$sai]]."</td>";
					for($cai=0; $cai<count($caarray_used); $cai++)
					{
						if(isset($tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]]))
							$output_string .= "<td align='center'><a href='javascript: showSelectedQuestions_Content(".$this->skillblueprintno.",\"skillno\",".$uskillarray_used[$sai].",\"cano\",".$caarray_used[$cai].")'>".$tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]]."</a>/".$tqarray[$uskillarray_used[$sai]][$caarray_used[$cai]]."</td>";
						else 
							$output_string .= "<td align='center'>&nbsp;</td>";
						$skilltotal += $tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]];
					}
					//$output_string .= "<td align='center'>".$skilltotal."</td>";
					$output_string .= "<td align='center'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"skillno\",0,".$uskillarray_used[$sai].")'>".$skilltotal."</a></td>";
					$output_string .= "</tr>";
				}
				
				$finaltotal=0;
				$output_string .= "<tr><td align='center'>Total</td>";
				for($cai=0; $cai<count($caarray_used); $cai++)
				{
					$skilltotal = 0;
					
					for($sai=0; $sai<count($uskillarray_used); $sai++)
					{
						$skilltotal += $tqarray_entered[$uskillarray_used[$sai]][$caarray_used[$cai]];
					}
					//$output_string .= "<td align='center'>".$skilltotal."</td>";
					$output_string .= "<td align='center'><a href='javascript: showSelectedQuestions_Content(".$this->skillblueprintno.",\"skillno\",0,\"cano\",".$caarray_used[$cai].")'>".$skilltotal."</a></td>";
					$finaltotal+=$skilltotal;
				}
				$output_string .= "<td align='center'><b>".$finaltotal."</b></td>";
				$output_string .= "</tr>";
				
				$output_string .= "</table><br>";
			}
			
			$query = "SELECT * FROM lsa_anscode_master_details WHERE skillblueprintno=".$skillblueprintno;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$totalquestions  = $row["totalquestions"];
			
			$condition_master = " WHERE skillblueprintno=".$skillblueprintno;
			$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND isasset='Y'";
			$assetresult = new dbquery($assetquery,$connid);
			$assetrow = $assetresult->getrowarray();
			$totalasset = $assetrow['COUNT(*)'];
			$assetper = round(($totalasset/$totalquestions)*100,1);
			
			$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND repeattype='IR' ";//AND isasset='N'";
			//echo $assetquery."<br>";
			$assetresult = new dbquery($assetquery,$connid);
			$assetrow = $assetresult->getrowarray();
			$irno_entered = $assetrow['COUNT(*)'];
			
			$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND repeattype='SR'";// AND isasset='N'";
			$assetresult = new dbquery($assetquery,$connid);
			$assetrow = $assetresult->getrowarray();
			$srno_entered = $assetrow['COUNT(*)'];
			$newno_entered = $totalquestions-$irno_entered-$srno_entered;//-$totalasset;
			if ($newno_entered<0)
				$newno_entered=0;
			
			$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND SfNsf='S'";
			$assetresult = new dbquery($assetquery,$connid);
			$assetrow = $assetresult->getrowarray();
			$sfno_entered = $assetrow['COUNT(*)'];
			
			$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND SfNsf='N'";
			$assetresult = new dbquery($assetquery,$connid);
			$assetrow = $assetresult->getrowarray();
			$nsfno_entered = $assetrow['COUNT(*)'];
			
			$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND gow='W'";
			$assetresult = new dbquery($assetquery,$connid);
			$assetrow = $assetresult->getrowarray();
			$wno_entered = $assetrow['COUNT(*)'];
			
			$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND gow='GO'";
			$assetresult = new dbquery($assetquery,$connid);
			$assetrow = $assetresult->getrowarray();
			$gono_entered = $assetrow['COUNT(*)'];
			
			$irno=$row["ir_no"];
			$irnoper=round(($irno/$totalquestions)*100,1);
			$srno=$row["sr_no"];
			$srnoper=round(($srno/$totalquestions)*100,1);
			$newno=$row["new_no"];
			$newnoper=round(($newno/$totalquestions)*100,1);
			$irsrtotal=$irno+$srno+$newno+$totalasset;
			$irsrtotalper=round(($irsrtotal/$totalquestions)*100,1);
			
			$sfno=$row["sf_no"];
			$sfnoper=round(($sfno/$totalquestions)*100,1);
			$nsfno=$row["nsf_no"];
			$nsfnoper=round(($nsfno/$totalquestions)*100,1);
			$sfnsftotal=$sfno+$nsfno;
			$sfnsftotalper=round(($sfnsftotal/$totalquestions)*100,1);
			
			$wno=$row["w_no"];
			$wnoper=round(($wno/$totalquestions)*100,1);
			$gono=$row["go_no"];
			$gonoper=round(($gono/$totalquestions)*100,1);
			$wgototal=$wno+$gono;
			$wgototalper=round(($wgototal/$totalquestions)*100,1);
			
			$irsrdetails  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			
			$bgcolor='';
			if($irno_entered>$row["ir_no"])
				$bgcolor='#FF4848';
			$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#IR</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"IR\",0)'>".$irno_entered."/".$row["ir_no"]."</a></td><td>".sprintf("%.1f",$irnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#SF</td>";
			
			$bgcolor='';
			if($sfno_entered>$row["sf_no"])
				$bgcolor='#FF4848';
			$irsrdetails .= "<td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"SfNsf\",\"S\",0)'>".$sfno_entered."/".$row["sf_no"]."</a></td><td>".$sfnoper."%</td><td>&nbsp;</td>";
			
			$bgcolor='';
			if($wno_entered>$row["w_no"])
				$bgcolor='#FF4848';
			$irsrdetails .= "<td bgcolor='#DCDCDC'>#W</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"gow\",\"W\",0)'>".$wno_entered."/".$row["w_no"]."</a></td><td>".$wnoper."%</td></tr>";
			
			$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#SR</td>";
			
			$bgcolor='';
			if($srno_entered>$row["sr_no"])
				$bgcolor='#FF4848';
			$irsrdetails .= "<td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"SR\",0)'>".$srno_entered."/".$row["sr_no"]."</a></td>";
			
			$bgcolor='';
			if($nsfno_entered>$row["nsf_no"])
				$bgcolor='#FF4848';
				
			$irsrdetails .= "<td>".sprintf("%.1f",$srnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#NSF</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"SfNsf\",\"N\",0)'>".$nsfno_entered."/".$row["nsf_no"]."</a></td>";
			
			$bgcolor='';
			if($gono_entered>$row["go_no"])
				$bgcolor='#FF4848';
				
			$irsrdetails .= "<td>".$nsfnoper."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#GO</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"gow\",\"GO\",0)'>".$gono_entered."/".$row["go_no"]."</a></td><td>".$gonoper."%</td></tr>";
			
			$bgcolor='';
			if($newno_entered>$row["new_no"])
				$bgcolor='#FF4848';
			$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#New</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"\",0)'>".$newno_entered."/".$row["new_no"]."</a></td><td>".sprintf("%.1f",$newnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>Total</td><td>".$sfnsftotal."</td><td>".$sfnsftotalper."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>Total</td><td>".$wgototal."</td><td>".$wgototalper."%</td></tr>";
			$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#ASSET</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"ASSET\",0)'>".$totalasset."</a></td><td>".$assetper."%</td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td></tr>";
			/*$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#Total</td><td>".$irsrtotal."</td><td>".sprintf("%.1f",$irsrtotalper)."%</td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td></tr>";*/
			$irsrdetails .= "<tr><td bgcolor='#FF4848'>&nbsp;</td><td colspan='10'>Number of questions in this category increases then what is defined in skill blue print.</td></tr>";
			$irsrdetails .= "</table>";
				
			/*$irsrdetails  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$irsrdetails .="<tr><td bgcolor='#DCDCDC'>#IR</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"IR\")'>".$irno."</a></td><td>".sprintf("%.1f",$irnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#SF</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"SfNsf\",\"S\")'>".$sfno."</td><td>".$sfnoper."</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#W</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"gow\",\"W\")'>".$wno."</td><td>".$wnoper."</td></tr>";
			$irsrdetails .="<tr><td bgcolor='#DCDCDC'>#SR</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"SR\")'>".$srno."</a></td><td>".sprintf("%.1f",$srnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#NSF</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"SfNsf\",\"N\")'>".$nsfno."</td><td>".$nsfnoper."</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#GO</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"gow\",\"GO\")'>".$gono."</td><td>".$gonoper."</td></tr>";
			$irsrdetails .="<tr><td bgcolor='#DCDCDC'>#New</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"\")'>".$newno."</a></td><td>".sprintf("%.1f",$newnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>Total</td><td>".$sfnsftotal."</td><td>".$sfnsftotalper."</td>&nbsp;<td></td><td bgcolor='#DCDCDC'>Total</td><td>".$wgototal."</td><td>".$wgototalper."</td></tr>";
			$irsrdetails .="<tr><td bgcolor='#DCDCDC'>#ASSET</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"ASSET\")'>".$totalasset."</a></td><td>".$assetper."%</td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td></tr>";
			$irsrdetails .="<tr><td bgcolor='#DCDCDC'>#Total</td><td>".$irsrtotal."</td><td>".sprintf("%.1f",$irsrtotalper)."%</td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td></tr>";
			$irsrdetails .="</table>";*/
			//echo $irsrdetails;
			
			$output_string_main  = "<table border=1 style='border-collapse: collapse; display:none;' align='center' bordercolor='#333333' id='skillbptbl'>";
			$output_string_main .= "<tr><td align='center' valign='top'>".$output_string."</td>";
			$output_string_main .= "<td align='center' valign='top'>".$irsrdetails."</td></tr></table>";
			
			return $output_string_main;
		}
		else 
		{
			$universalskills = array();
			$universalskills = $this->fetchUniversalSkillsArray($connid);
			/*$projectskills = array();
			$projectskills = $this->fetchProjectSkillsArray($connid);*/
			$srno=1;
			$output_string  .= "<table border=1 style='border-collapse: collapse; display:none;' align='center' bordercolor='#333333' id='skillbptbl'>";
		    //$output_string .= "<tr bgcolor='#DCDCDC'><td colspan='8' align='center'><b>Skill Blueprint</b></td></tr>";
		    $output_string .= "<tr><td align='center' colspan='4'><b>Skills</b></td><td align='center' colspan='4'><b>IR/SR Details</b></td></tr>";
		    //$condition_master = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."' AND subject='".$this->subject."'";
		    $condition_master = " WHERE skillblueprintno=".$skillblueprintno;
			$query = "SELECT * FROM lsa_anscode_master_details ".$condition_master;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$totalquestions  = $row["totalquestions"];
				//$skillblueprintno  = $row["skillblueprintno"];
				$skillblueprint  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
				$skillblueprint .= "<tr><td align='center'><b>Sr<br>No</b></td><td align='center'><b>Skill</b></td>";
				$skillblueprint .= "<td align='center'><b>Questions<br>Entered</b></td><td align='center'><b>Questions<br>Remaining</b></td></tr>";
	
				$srno_inn=1;
				$condition = " WHERE skillblueprintno=".$skillblueprintno;
				$sbquery = "SELECT * FROM lsa_skillblueprint_breakup".$condition." ORDER BY skillblueprintbreakupno";
				$sbdbquery = new dbquery($sbquery,$connid);
				while($sbrow = $sbdbquery->getrowarray())
				{		
					$skillblueprint .="<tr><td align='center'>".$srno_inn."</td>";
					//$skillblueprint .="<td nowrap>".$universalskills[$sbrow['uskill_no']]."</td>";
					$skillblueprint .="<td nowrap>".$sbrow['skillname']."</td>";
					
					$skbpquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND skillno=".$sbrow['uskill_no']." AND projectskillno=".$sbrow['skillblueprintbreakupno'];
					$skbpresult = new dbquery($skbpquery,$connid);
					$skbprow = $skbpresult->getrowarray();
					$sk_entered = $skbprow['COUNT(*)'];
					$sk_remained = $sbrow['no_of_questions']-$sk_entered;
				
					$skillblueprint .="<td align='center'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"skillno\",".$sbrow['uskill_no'].",".$sbrow['skillblueprintbreakupno'].")'>".$sk_entered."</a></td><td align='center'>".$sk_remained."</td></tr>";
					$srno_inn++;
				}
				$skillblueprint .="</table>";
				
				$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND isasset='Y'";
				$assetresult = new dbquery($assetquery,$connid);
				$assetrow = $assetresult->getrowarray();
				$totalasset = $assetrow['COUNT(*)'];
				$assetper = round(($totalasset/$totalquestions)*100,1);
				
				$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND repeattype='IR'";// AND isasset='N'";
				//echo $assetquery."<br>";
				$assetresult = new dbquery($assetquery,$connid);
				$assetrow = $assetresult->getrowarray();
				$irno_entered = $assetrow['COUNT(*)'];
				
				$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND repeattype='SR'";// AND isasset='N'";
				$assetresult = new dbquery($assetquery,$connid);
				$assetrow = $assetresult->getrowarray();
				$srno_entered = $assetrow['COUNT(*)'];
				$newno_entered = $totalquestions-$irno_entered-$srno_entered;//-$totalasset;
				if ($newno_entered<0)
					$newno_entered=0;
				
				$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND SfNsf='S'";
				$assetresult = new dbquery($assetquery,$connid);
				$assetrow = $assetresult->getrowarray();
				$sfno_entered = $assetrow['COUNT(*)'];
				
				$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND SfNsf='N'";
				$assetresult = new dbquery($assetquery,$connid);
				$assetrow = $assetresult->getrowarray();
				$nsfno_entered = $assetrow['COUNT(*)'];
				
				$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND gow='W'";
				$assetresult = new dbquery($assetquery,$connid);
				$assetrow = $assetresult->getrowarray();
				$wno_entered = $assetrow['COUNT(*)'];
				
				$assetquery = "SELECT COUNT(*) FROM lq_questions ".$condition_master." AND gow='GO'";
				$assetresult = new dbquery($assetquery,$connid);
				$assetrow = $assetresult->getrowarray();
				$gono_entered = $assetrow['COUNT(*)'];
				
				$irno=$row["ir_no"];
				$irnoper=round(($irno/$totalquestions)*100,1);
				$srno=$row["sr_no"];
				$srnoper=round(($srno/$totalquestions)*100,1);
				$newno=$row["new_no"];
				$newnoper=round(($newno/$totalquestions)*100,1);
				$irsrtotal=$irno+$srno+$newno+$totalasset;
				$irsrtotalper=round(($irsrtotal/$totalquestions)*100,1);
				
				$sfno=$row["sf_no"];
				$sfnoper=round(($sfno/$totalquestions)*100,1);
				$nsfno=$row["nsf_no"];
				$nsfnoper=round(($nsfno/$totalquestions)*100,1);
				$sfnsftotal=$sfno+$nsfno;
				$sfnsftotalper=round(($sfnsftotal/$totalquestions)*100,1);
				
				$wno=$row["w_no"];
				$wnoper=round(($wno/$totalquestions)*100,1);
				$gono=$row["go_no"];
				$gonoper=round(($gono/$totalquestions)*100,1);
				$wgototal=$wno+$gono;
				$wgototalper=round(($wgototal/$totalquestions)*100,1);
				
				$irsrdetails  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
				
				$bgcolor='';
				if($irno_entered>$row["ir_no"])
					$bgcolor='#FF4848';
				$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#IR</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"IR\",0)'>".$irno_entered."/".$row["ir_no"]."</a></td><td>".sprintf("%.1f",$irnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#SF</td>";
				
				$bgcolor='';
				if($sfno_entered>$row["sf_no"])
					$bgcolor='#FF4848';
				$irsrdetails .= "<td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"SfNsf\",\"S\",0)'>".$sfno_entered."/".$row["sf_no"]."</a></td><td>".$sfnoper."%</td><td>&nbsp;</td>";
				
				$bgcolor='';
				if($wno_entered>$row["w_no"])
					$bgcolor='#FF4848';
				$irsrdetails .= "<td bgcolor='#DCDCDC'>#W</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"gow\",\"W\",0)'>".$wno_entered."/".$row["w_no"]."</a></td><td>".$wnoper."%</td></tr>";
				
				$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#SR</td>";
				
				$bgcolor='';
				if($srno_entered>$row["sr_no"])
					$bgcolor='#FF4848';
				$irsrdetails .= "<td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"SR\",0)'>".$srno_entered."/".$row["sr_no"]."</a></td>";
				
				$bgcolor='';
				if($nsfno_entered>$row["nsf_no"])
					$bgcolor='#FF4848';
					
				$irsrdetails .= "<td>".sprintf("%.1f",$srnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#NSF</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"SfNsf\",\"N\",0)'>".$nsfno_entered."/".$row["nsf_no"]."</a></td>";
				
				$bgcolor='';
				if($gono_entered>$row["go_no"])
					$bgcolor='#FF4848';
					
				$irsrdetails .= "<td>".$nsfnoper."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>#GO</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"gow\",\"GO\",0)'>".$gono_entered."/".$row["go_no"]."</a></td><td>".$gonoper."%</td></tr>";
				
				$bgcolor='';
				if($newno_entered>$row["new_no"])
					$bgcolor='#FF4848';
				$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#New</td><td bgcolor='".$bgcolor."'><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"\",0)'>".$newno_entered."/".$row["new_no"]."</a></td><td>".sprintf("%.1f",$newnoper)."%</td><td>&nbsp;</td><td bgcolor='#DCDCDC'>Total</td><td>".$sfnsftotal."</td><td>".$sfnsftotalper."%</td>&nbsp;<td></td><td bgcolor='#DCDCDC'>Total</td><td>".$wgototal."</td><td>".$wgototalper."%</td></tr>";
				$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#ASSET</td><td><a href='javascript: showSelectedQuestions(".$this->skillblueprintno.",\"repeattype\",\"ASSET\",0)'>".$totalasset."</a></td><td>".$assetper."%</td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td></tr>";
				/*$irsrdetails .= "<tr><td bgcolor='#DCDCDC'>#Total</td><td>".$irsrtotal."</td><td>".sprintf("%.1f",$irsrtotalper)."%</td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td><td></td><td bgcolor='#DCDCDC'></td><td></td><td></td></tr>";*/
				$irsrdetails .= "<tr><td bgcolor='#FF4848'>&nbsp;</td><td colspan='10'>Number of questions in this category increases then what is defined in skill blue print.</td></tr>";
				$irsrdetails .= "</table>";
				
			    $output_string .= "<tr><td align='center' valign='top' colspan='4'>".$skillblueprint."</td>";
			    $output_string .= "<td align='center' valign='top' colspan='4'>".$irsrdetails."</td></tr>";
			}
			$output_string .= "</table>";
		}
		return $output_string;
	}
	/*function fetchuniversalSkills($connid)
	{
		$query = "SELECT * FROM  uskill_master ORDER BY skillno";
		$dbquery = new dbquery($query,$connid);
		$skillcombo = "<option value=''></option>";
		while($row = $dbquery->getrowarray())
		{
			$skillcombo .= "<option value='".$row['skillno']."'>".$row['skillname']."</option>";
		}
		return $skillcombo;
	}*/
	function fetchUniversalSkillsArray($connid)
	{
		$universalskillarray = array();
		$subject="";
		$subject=$this->subject;
		if($subject=="Maths Oral")
			$subject="Maths";
		if($subject=="Language Oral")
			$subject="Language";
			
		$query = "SELECT * FROM  uskill_master WHERE subject='".$subject."' ORDER BY skillname";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$universalskillarray[$row['skillno']] = $row['skillname'];
		}
		return $universalskillarray;
	}
	
	function fetchProjectSkillsArray($connid)
	{
		$universalskillarray = array();
		$query = "SELECT * FROM  lsa_skillblueprint_breakup WHERE skillblueprintno='".$this->skillblueprintno."' ORDER BY skillblueprintbreakupno";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$universalskillarray[$row['skillblueprintbreakupno']] = $row['skillname'];
		}
		return $universalskillarray;
	}
	
	function fetchcaskilllist($connid)
	{
		$universalskillarray = array();
		$query = "SELECT * FROM  contentarea_master WHERE subject='".$this->subject."' ORDER BY caname";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$universalskillarray[$row['cano']] = $row['caname'];
		}
		return $universalskillarray;
	}
	
	function fetchSkillBlueprint($skillblueprintno,$connid)
	{
		$query = "SELECT * FROM lsa_anscode_master_details  WHERE skillblueprintno=".$skillblueprintno;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function fetchSkillBlueprintBreakup($skillblueprintno,$connid)
	{
		$query = "SELECT * FROM  lsa_skillblueprint_breakup WHERE skillblueprintno=".$skillblueprintno." ORDER BY skillblueprintbreakupno";
		$dbquery = new dbquery($query,$connid);
		//$row = $dbquery->getrowarray();
		return $dbquery;
	}
	function fetchNoOfSkills($sbpn, $connid)
	{
		//$condition = " WHERE project='".$this->project."' AND subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
		$condition = " WHERE skillblueprintno=".$sbpn;
		$query = "SELECT no_of_skills FROM  lsa_anscode_master_details".$condition;
		//echo $query."<br>";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['no_of_skills'];
	}
	function fetchSkillBlueprintNo($connid)
	{
		$condition = " WHERE project='".$this->project."' AND subject='".$this->subject."' AND class='".$this->class."' AND roundyear='".$this->roundyear."'";
		$query = "SELECT skillblueprintno FROM lsa_anscode_master_details".$condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['skillblueprintno'];
	}
	function fetchSkillBlueprintNo_IRSR($project_tmp,$roundyear_tmp,$class_tmp,$subject_tmp,$category_tmp,$connid)
	{
		$condition = " WHERE project='".$project_tmp."' AND subject='".$subject_tmp."' AND class='".$class_tmp."' AND roundyear='".$roundyear_tmp."'";
		$query = "SELECT skillblueprintno FROM  lsa_anscode_master_details".$condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row['skillblueprintno']=="")
			return 0;
		else 
			return $row['skillblueprintno'];
	}
    function pageAddProjectPapers($connid)
	{
		$returnvalue="";
		$this->setgetvars();
		$this->setpostvars();
		if($this->project != "")
			$tablename = "anscode_master_".strtolower($this->project);
		
		if($this->action=="Save Project")
		{
			//echo "Save me...";
			if($this->project=="Other")
			{
				//$this->createTable($connid);
				$this->insertProject($connid);//lsa_projects
				$this->project = $this->project_other;
			}
			if($this->roundyear=="Other")
			{
				$this->insertRound($connid);//lsa_projects_round
				$this->roundyear = $this->roundyear_other;
			}
				
			$condition = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."'";
			$condition1 = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."'";
			
			for($si=0;$si<$this->totalsubjects;$si++)
			{
				$subject = $this->subjectsarray[$si];
				for($ci=0;$ci<$this->totalclasses;$ci++)
				{
					$class = $this->classesarray[$ci];
					$cbvalue = str_replace(" ","_",$subject)."_".$class;
					if(isset($_POST[$cbvalue]) && $_POST[$cbvalue]=="on")
					{
						$condition2 = $condition1." AND subject='".$subject."' AND class='".$class."'";
						$query = "SELECT COUNT(*) FROM lsa_anscode_master_details".$condition2;
						$dbquery = new dbquery($query,$connid);
						$row = $dbquery->getrowarray();
						if($row['COUNT(*)']==0)
						{
							$insertquery = "INSERT INTO lsa_anscode_master_details SET project='".$this->project."', subject='".$subject."', class='".$class."', roundyear='".$this->roundyear."', category='".$this->category."'";
							$dbinseertquery = new dbquery($insertquery,$connid);
						}
					}
				}
			}
			
			$query = "SELECT * FROM lsa_anscode_master_details".$condition;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$this->paperdetails[$row['subject']][$row['class']]['papercode']=$row['papercode'];
				$this->paperdetails[$row['subject']][$row['class']]['totalquestions']=$row['totalquestions'];
				$this->paperdetails[$row['subject']][$row['class']]['no_of_skills']=$row['no_of_skills'];
			}
		}
		if($this->action == "Fetch Project" || $this->action=="Save Project")
		{
			if($this->project=="Other")
				$condition = " WHERE project='".$this->project_other."'";
			else
				$condition = " WHERE project='".$this->project."'";

			if($this->roundyear=="Other")
				$condition .= " AND roundyear='".$this->roundyear_other."'";
			else
				$condition .= " AND roundyear='".$this->roundyear."'";

			$query = "SELECT * FROM lsa_anscode_master_details".$condition;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$this->classsubjectmatrix[$row['subject']][$row['class']]="Y";
			}
			if($this->action == "Fetch Project")
				$returnvalue = "Project Fetched";
			if($this->action=="Save Project")
				$returnvalue = "Papers Fetched";
		}
		if($this->action=="Save Papers")
		{ 
			$condition1 = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."'";
			for($si=0;$si<$this->totalsubjects;$si++)
			{
				$subject = $this->subjectsarray[$si];
				for($ci=0;$ci<$this->totalclasses;$ci++)
				{
					$class = $this->classesarray[$ci];
					$cbname = str_replace(" ","_",$subject)."_".$class;
					$cbname_pc = $cbname."_PaperCode"; 
					$cbname_tq = $cbname."_TotalQuestions";
					$cbname_ts = $cbname."_TotalSkills";
					
					if(isset($_POST[$cbname_pc]))
					{
						
						$condition2 = $condition1." AND subject='".$subject."' AND class='".$class."'";
						$upquery = "UPDATE lsa_anscode_master_details SET papercode='".$_POST[$cbname_pc]."',totalquestions=".$_POST[$cbname_tq];
						$upquery .= ",no_of_skills=".$_POST[$cbname_ts].$condition2;
						//echo $upquery."<br>";
						$dbupquery = new dbquery($upquery,$connid);
					}
				}
			}
			echo "<script>window.location='lsa_paperwise_rawscore_status.php?project=".$this->project."&roundyear=".$this->roundyear."';</script>";
			//exit;
		}
		return $returnvalue;
	}
	function prepareClassSubjectMatrix()
	{
		for($si=0;$si<$this->totalsubjects;$si++)
		{
			for($ci=0;$ci<$this->totalclasses;$ci++)
			{
				$this->classsubjectmatrix[$this->subjectsarray[$si]][$this->classesarray[$ci]]="N";
			}
		}
	}
	
	function fetchIRDetails($repeattype,$skillblueprintno,$connid)
	{
		$query = "SELECT * FROM  lq_irsrsourcedetails WHERE skillblueprintno=".$skillblueprintno." AND repeattype='".$repeattype."' ORDER BY irsrid";
		$dbquery = new dbquery($query,$connid);
		//$row = $dbquery->getrowarray();
		return $dbquery;
	}
	function fetchPaperDetails($skillblueprintno,$connid)
	{
		$query = "SELECT * FROM lsa_anscode_master_details  WHERE skillblueprintno=".$skillblueprintno;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	function pageshowIRSRDetails($connid)
	{
		/*echo "<pre>";
		print_r ($_GET);
		echo "</pre>";*/
		$this->setgetvars();
		$irdetails  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$irdetails .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='6'><b>".$_GET['repeattype']." Details</b></td>";
		$irdetails .= "<tr><td align='center'><b>Sr<br>No</b></td><td align='center'><b>Project</b></td>";
		$irdetails .= "<td align='center'><b>Round</b></td><td align='center'><b>Class</b><td align='center'><b>Category</b></td></td><td align='center'><b># of<br>Questions</b></td></tr>";

		$srno_inn=1;
		$sbquery = "SELECT * FROM  lq_irsrsourcedetails WHERE skillblueprintno=".$this->skillblueprintno." AND repeattype='".$_GET['repeattype']."' ORDER BY irsrid";
		$sbdbquery = new dbquery($sbquery,$connid);
		while($sbrow = $sbdbquery->getrowarray())
		{		
			$irdetails .="<tr><td align='center'>".$srno_inn."</td>";
			$irdetails .="<td align='center'>".$sbrow['project']."</td><td>".$sbrow['roundyear']."</td><td align='center'>".$sbrow['class']."</td>";
			$irdetails .="<td align='center'>".$sbrow['category']."</td><td align='center'>".$sbrow['no_of_questions']."</td></tr>";
			$srno_inn++;
		}
		$irdetails .="</table>";
		return $irdetails;
	}
	function pageSearchQuestions($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		//print_r ($_REQUEST);
		
		if($this->action=="Search Questions" && $this->tblselected=="LQMS")
		{
			$outputstring  = "<br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$skillarray = array();
			$query = "SELECT * FROM uskill_master";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$skillarray[$row['skillno']] = $row['skillname'];
			}
			
			$cntr=0;
			$condition="";
			$countquestions=$_POST['countquestions'];
			if(isset($this->class) && $this->class!="")
				$condition.=" AND a.class='".$this->class."'";
			if(isset($this->subject) && $this->subject!="")
				$condition.=" AND a.subject='".$this->subject."'";
			if(isset($_POST['skill']) && $_POST['skill']!="" && $_POST['skill']!=0)
				$condition.=" AND a.skillno='".$_POST['skill']."'";
			
			if(isset($this->project) && $this->project!="")
				$condition.=" AND a.project='".$this->project."'";
			if(isset($this->roundyear) && $this->roundyear!="")
				$condition.=" AND a.roundyear='".$this->roundyear."'";
				
			$questionArray=array();
			$count=0;
			if ($this->keyword!='')
				$condition .= " AND (a.question LIKE '%".$this->keyword."%' OR a.optiona LIKE '%".$this->keyword."%' OR a.optionb LIKE '%".$this->keyword."%' OR a.optionc LIKE '%".$this->keyword."%' OR a.optiond LIKE '%".$this->keyword."%')";
			$query = "SELECT * FROM lq_questions a INNER JOIN uskill_master b ON a.skillno = b.skillno  WHERE 1=1 AND a.skillno=b.skillno ".$condition." ORDER BY a.qno,a.skillno, question";
			//echo $query."<br>";
			$result = mysql_query($query) OR die("B3: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$qno=$row['Qno'];
				$sbpno = $row['skillblueprintno'];
				foreach ($_POST['medium'] as $postmedium)
				{
					if ($postmedium=="English")
					{
						$questionArray["English"][$count]['project']   = $row['project'];
						$questionArray["English"][$count]['roundyear'] = $row['roundyear'];
						$questionArray["English"][$count]['class']     = $row['class'];
						$questionArray["English"][$count]['subject']   = $row['subject'];
						$questionArray["English"][$count]['Qno']       = $row['Qno'];
						$questionArray["English"][$count]['qcode']     = $row['qcode'];
						$questionArray["English"][$count]['question']  = $row['question'];
						$questionArray["English"][$count]['optiona']   = $row['optiona'];
						$questionArray["English"][$count]['optionb']   = $row['optionb'];
						$questionArray["English"][$count]['optionc']   = $row['optionc'];
						$questionArray["English"][$count]['optiond']   = $row['optiond'];
						$questionArray["English"][$count]['skillname'] = $row['skillname'];
						$questionArray["English"][$count]['sfnsf']     = $row['SfNsf'];
						$questionArray["English"][$count]['mcq']       = $row['mcq'];
						$questionArray["English"][$count]['gow']       = $row['gow'];
						$questionArray["English"][$count]['isasset']   = $row['isasset'];
						$questionArray["English"][$count]['papercode_ref']       = $row['papercode_ref'];
						$questionArray["English"][$count]['papercode1_ref']       = $row['papercode1_ref'];
						$questionArray["English"][$count]['qcode1_ref']       = $row['qcode1_ref'];
						$questionArray["English"][$count]['option_a']       = $row['option_a'];
						$questionArray["English"][$count]['option_b']       = $row['option_b'];
						$questionArray["English"][$count]['option_c']       = $row['option_c'];
						$questionArray["English"][$count]['option_d']       = $row['option_d'];
						$questionArray["English"][$count]['correct_answer']       = $row['correct_answer'];
						$questionArray["English"][$count]['percent_correct']       = $row['percent_correct'];
						$questionArray["English"][$count]['passageid']       = $row['passageid'];
					}
					else 
					{
						$querypapercode = "SELECT papercode from lqv_sbpno_mapping WHERE medium='$postmedium' and skillblueprintno=$sbpno;";
						//echo "<br>".$querypapercode;
						$resultpapercode = mysql_query($querypapercode) or die("papercode select error - ".mysql_error());
						$rowpapercode = mysql_fetch_array($resultpapercode);
						$papercode=$rowpapercode['papercode'];
						if ($papercode!="")
						{
							$queryverna="SELECT * FROM lq_questions_vernaculars WHERE papercode='$papercode' AND qno='$qno'";
							//echo "<br>$queryverna";
							$resultverna=mysql_query($queryverna) or die("vernacular question search error - ".mysql_error());
							$rowverna = mysql_fetch_array($resultverna);
							
							$ref_assetpc=$row['papercode_ref'];
							$paperversion=$postmedium;
							$ref_assetqn=$row['qno_ref'];
							$bgcolor="";
							$assetqn=$row['qcode_ref'];
							
							$ref_qcode=$row['qcode_ref'];
							$isasset=$row['isasset'];
							$cls=$row['class'];
							$sub=$row['subject'];
							$project=$row['project'];
							$isda=$row['isda'];
							
							$assetqn1=$row['qno1_ref'];
							$assetpc1=$row['papercode1_ref'];
							$ref_qcode1=$row['qcode1_ref'];

							if (($isasset=="Y" || $isda=="Y") && $ref_qcode1!=0)
							{
								$isasset="N";
								$isda="N";
							}
							
							$question = $rowverna['question'];
							$optiona  = $rowverna['optiona'];
							$optionb  = $rowverna['optionb'];
							$optionc  = $rowverna['optionc'];
							$optiond  = $rowverna['optiond'];
							
							if ($question=="" && $optiona=="" && $optionb=="" && $optionc=="" && $optiond=="")
							{
								$returnFetchQuestionArr = fetchVernacularQuestions($ref_assetpc,$paperversion,$ref_assetqn,$question,$optiona,$optionb,$optionc,$optiond,$bgcolor,$ref_qcode,$isasset,$cls,$sub,$project,$isda,$ref_qcode1,$assetpc1,$assetqn1);//vernacular questions fetch
								$question=$returnFetchQuestionArr['question'];
								$optiona=$returnFetchQuestionArr['optiona'];
								$optionb=$returnFetchQuestionArr['optionb'];
								$optionc=$returnFetchQuestionArr['optionc'];
								$optiond=$returnFetchQuestionArr['optiond'];
							}
							
							if ($question!="" || $optiona!="" || $optionb!="" || $optionc!="" || $optiond!="")
							{
								$questionArray[$postmedium][$count]['qcode']     = $rowverna['autono'];
								$questionArray[$postmedium][$count]['question']  = $question;
								$questionArray[$postmedium][$count]['optiona']   = $optiona;
								$questionArray[$postmedium][$count]['optionb']   = $optionb;
								$questionArray[$postmedium][$count]['optionc']   = $optionc;
								$questionArray[$postmedium][$count]['optiond']   = $optiond;
								$questionArray[$postmedium][$count]['isasset']   = $row['isasset'];
								$questionArray[$postmedium][$count]['papercode_ref'] = $row['papercode_ref'];
								$questionArray[$postmedium][$count]['papercode1_ref'] = $row['papercode1_ref'];
								$questionArray[$postmedium][$count]['passageid']       = $rowverna['passageid'];
								$questionArray[$postmedium][$count]['mcq']       = $row['mcq'];
							}
							else
							{
								unset($questionArray["English"][$count]);
								$count--;
								break;
							}
						}
						else 
						{
							unset($questionArray["English"][$count]);
							$count--;
							break;
						}
					}
				}
				$count++;
				if ($count==$countquestions)
					break;
			}
							
			/*echo "<pre>";
			print_r($questionArray);
			echo "</pre>";*/
			$outputstring .= "<tr><th>Srno</th>";
			foreach ($_POST['medium'] as $postmedium)
			{
				$outputstring .= "<th>$postmedium</th>";
			}
			$outputstring .= "</tr>";
			
			$img_folder = $this->fetchImgPathName($papercode);
			$totalQuestions = count($questionArray['English']);
			for($count = 0 ; $count<$totalQuestions; $count++)
			{
				$outputstring .= "<tr><td align='center'>".($count+1)."</td>";
				foreach ($questionArray as $medium=>$mediumquestionArray)
				{
					$question=$mediumquestionArray[$count]['question'];
					$optiona=$mediumquestionArray[$count]['optiona'];
					$optionb=$mediumquestionArray[$count]['optionb'];
					$optionc=$mediumquestionArray[$count]['optionc'];
					$optiond=$mediumquestionArray[$count]['optiond'];
					
					if ($mediumquestionArray[$count]['isasset']=="Y" && $medium=="English"){
						if ($mediumquestionArray[$count]['qcode1_ref']!=0)
							$img_folder = $this->fetchImgPathName($mediumquestionArray[$count]['papercode1_ref']);
						else 
							$img_folder = $this->fetchImgPathName($mediumquestionArray[$count]['papercode_ref']);
						
						$question = $this->orig_to_html($question,$img_folder);
						$optiona = $this->orig_to_html($optiona,$img_folder);
						$optionb = $this->orig_to_html($optionb,$img_folder);
						$optionc = $this->orig_to_html($optionc,$img_folder);
						$optiond = $this->orig_to_html($optiond,$img_folder);
					}
					else {
						$question = $this->orig_to_html_lsa($question,$this->imagefolder);	
						$optiona = $this->orig_to_html_lsa($optiona,$this->imagefolder);	$optionb = $this->orig_to_html_lsa($optionb,$this->imagefolder);	
						$optionc = $this->orig_to_html_lsa($optionc,$this->imagefolder);	$optiond = $this->orig_to_html_lsa($optiond,$this->imagefolder);
						
						$question = Dotagtoimage($this->imagefolder, $question);
						$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
						$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);			
					}
				
					
					$option_a=$mediumquestionArray[$count]['option_a'];
					$option_b=$mediumquestionArray[$count]['option_b'];
					$option_c=$mediumquestionArray[$count]['option_c'];
					$option_d=$mediumquestionArray[$count]['option_d'];
					
					$qcodelink = "";
					if ($medium=="English")
						$qcodelink = "<a href='javascript: show_editWindow(".$mediumquestionArray[$count]['qcode'].")'>Q: ".$mediumquestionArray[$count]['qcode']."</a><br>";
					$passagelink="";
					if ($mediumquestionArray[$count]['passageid']!=0 && $mediumquestionArray[$count]['passageid']!="")
					{
						//$passagelink = "<a href='javascript: update_passage(".$mediumquestionArray[$count]['passageid'].")'>P: ".$mediumquestionArray[$count]['passageid']."</a><br>";						
						$passagelink="<b>Passage:</b><br>";
						$passagelink.=Dotagtoimage($this->imagefolder,$this->fetchPassage($mediumquestionArray[$count]['passageid'],$dbconnect->connid));
						$passagelink.="<br><br>";
							
					}
					$question=$passagelink.$qcodelink.$question;
					$outputstring .= "<td>".$question;
					if($mediumquestionArray[$count]['mcq']=="Y")
					{
						$outputstring .= "<br><br><table width='60%' border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A<br>(%)</b></td><td align='center'><b>B<br>(%)</b></td><td align='center'><b>C<br>(%)</b></td>";
						$outputstring .= "<td align='center'><b>D<br>(%)</b></td></td></tr><tr><td align='center'>".$optiona."<br>".round($option_a,1)."</td><td align='center'>".$optionb."<br>".round($option_b,1)."</td>";
						$outputstring .= "<td align='center'>".$optionc."<br>".round($option_c,1)."</td><td align='center'>".$optiond."<br>".round($option_d,1)."</td></tr></table>";
					
						/*$outputstring .= "<br><br><table border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
						$outputstring .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
						$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";*/
					}
					
					//$outputstring .= "<td align='center'>".$row['mcq']."</td><td align='center'>".$row['used']."</td>";
					if ($medium=="English"){
						$outputstring .= "<br><br><b>Project:</b>".$mediumquestionArray[$count]['project']."(".$mediumquestionArray[$count]['roundyear'].") ".$mediumquestionArray[$count]['Qno']."<br><b>Sf/Nsf:</b>".$mediumquestionArray[$count]['SfNsf']."<br>";
						if ($mediumquestionArray[$count]['msq']==1)
							$outputstring .= "<b>FR/mcq:</b> MCQ<br>";
						else 
							$outputstring .= "<b>FR/mcq:</b> FR<br>";
						$outputstring.="<b>GO/W:</b>".$mediumquestionArray[$count]['gow'];
					}
				}
				$outputstring .= "</tr>";
			}
		
			if($totalQuestions==0)
			{
				$outputstring .= "<tr><td align='center' colspan='6'><b>No questions found...</b></td></tr>";
			}
			$outputstring .= "<tr><td align='center' colspan='6'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."'>Projectwise Raw Score Status</a></td></tr>";
			$outputstring .= "</table>";
		}
		if($this->action=="Search Questions" && $this->tblselected=="AQMS")
		{
			/*print_r ($_POST);
			echo "Yes...";	*/
			
			$qcodestr="";
			/*if($this->subjectasset=="Language" || $this->subjectasset=="English")
				$subjectno = 1;
			elseif($this->subjectasset=="Maths")
				$subjectno = 2;
			elseif($this->subjectasset=="Science")
				$subjectno = 3;
			elseif($this->subjectasset=="SS")
				$subjectno = 4;*/
			$subjectno=$this->subjectasset;
			
			$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$outputstring .= "<tr><td align='center' colspan='8'><b>Round: ".$this->roundyearasset." Subject: ".$this->subjectasset." Class:".$this->classasset."</b></td>";
			$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Qcode<br>(%)</b></td><td align='center'><b>Question</b></td>";
			$outputstring .= "<td align='center'><b>Skill</b></td></tr>";
			
			$papercode = $subjectno.$this->classasset.$this->roundyearasset;
			$img_folder = $this->fetchImgPathName($papercode);
			$smquery = "SELECT qcode FROM educatio_educat.paper_master WHERE papercode='".$papercode."' ORDER BY qno";
			//echo "<br>".$smquery."<br>";
			$qcodestr = "";
			$smresult = mysql_query($smquery);
			while($smrow=mysql_fetch_array($smresult))
			{
				$qcodestr .= $smrow['qcode'].",";
				//echo $smrow['qcode'];
			}
			$qcodestr = substr($qcodestr,0,-1);
			
			$cntr=0;
			$condition = " WHERE a.qcode IN (".$qcodestr.")";
			$query = "SELECT a.qcode,a.question,a.group_text,a.optiona,a.optionb,a.optionc,a.optiond,b.skillname,c.qno,d.percent_correct,d.option_a,d.option_b,d.option_c,d.option_d FROM educatio_educat.questions a,educatio_educat.unique_skill_master b, educatio_educat.paper_master c, educatio_educat.correct_answers d".$condition." AND a.u_skill_code=b.u_skill_no AND a.qcode=c.qcode AND c.papercode=d.papercode AND c.qno=d.qno AND d.class='".$this->classasset."' ORDER BY c.Qno";
			//echo "<br>".$query."<br>";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$optionstr = "";
				$question = $this->orig_to_html($row['question'],$img_folder);
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);
				$optionb = $this->orig_to_html($row['optionb'],$img_folder);
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);
				$optiond = $this->orig_to_html($row['optiond'],$img_folder);
				
				if($row['group_text']!="")
				{
					$group_text = $this->orig_to_html($row['group_text'],$img_folder);
					$question = $group_text."<br>".$question;
				}
				/*$optiona = Dotagtoimage($this->imagefolder, $row['optiona']); 		$optionb = Dotagtoimage($this->imagefolder, $row['optionb']);
				$optionc = Dotagtoimage($this->imagefolder, $row['optionc']); 		$optiond = Dotagtoimage($this->imagefolder, $row['optiond']);*/
				
				$srno=$cntr+1;
				
				$optionstr .= "<br><br><table border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A<br>(%)</b></td><td align='center'><b>B<br>(%)</b></td><td align='center'><b>C<br>(%)</b></td>";
				$optionstr .= "<td align='center'><b>D<br>(%)</b></td></td></tr><tr><td align='center'>".$optiona."<br>".round($row['option_a'],1)."</td><td align='center'>".$optionb."<br>".round($row['option_b'],1)."</td>";
				$optionstr .= "<td align='center'>".$optionc."<br>".round($row['option_c'],1)."</td><td align='center'>".$optiond."<br>".round($row['option_d'],1)."</td></tr></table>";
				
				$outputstring .= "<tr><td align='center'>".$row['qno']."</td><td align='center'>".$row['qcode']."<br>".round($row['percent_correct'],1)."</td><td>".$question.$optionstr."</td>";
				$outputstring .= "<td>".$row['skillname']."</td></tr>";
				$outputstring .= "</tr>";
				$cntr++;
			}
			
			if($cntr==0)
			{
				$outputstring .= "<tr><td align='center' colspan='6'><b>No questions found...</b></td></tr>";
			}
			$outputstring .= "<tr><td align='center' colspan='6'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."'>Projectwise Raw Score Status</a></td></tr>";
			$outputstring .= "</table>";
		}
		
		if($this->action=="Search Vernacular Questions")
		{
			/*print_r ($_POST);
			echo "Yes...";*/
			
			$query="SELECT skillblueprintno FROM lsa_anscode_master_details WHERE project='$this->project' AND roundyear='$this->roundyear' AND class='".$_POST['classes']."' AND subject='$this->subject'";
			$result=mysql_query($query) or die(" skillbluprint select error - ".mysql_error());
			$row=mysql_fetch_array($result);
			$skillblueprintno=$row['skillblueprintno'];
			
			$query="SELECT papercode FROM lqv_sbpno_mapping WHERE skillblueprintno='$skillblueprintno' AND medium='".$_POST['medium']."'";
			$result=mysql_query($query) or die(" skillbluprint select error - ".mysql_error());
			$row=mysql_fetch_array($result);
			$papercode=$row['papercode'];
			$this->papercode=$papercode;
			
			
			
			$outputstring  = "<br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$query="SELECT * FROM lqv_sbpno_mapping WHERE papercode='$this->papercode'";
			$result = mysql_query($query);
			while($row=mysql_fetch_array($result))
			{
				$outputstring  .= "<tr bgcolor='grey'><td align='center' colspan='7'><b>Papercode: $this->papercode  &nbsp;&nbsp;&nbsp;   Medium: ".$row['medium']."</b></td>";
			}
			
			$outputstring .= "<tr><td align='center'><b>autono</b></td><td align='center'><b>Qno</b></td><td align='center'><b>Question</b></td>";
			$outputstring .= "<td align='center'><b>OptionA</b></td><td align='center'><b>OptionB</b></td><td align='center'><b>OptionC</b></td>";
			$outputstring .= "<td align='center'><b>OptionD</b></td></tr>";
			
			$img_folder = $this->fetchImgPathName($papercode);
			$smquery = "SELECT * FROM lq_questions_vernaculars WHERE papercode='".$this->papercode."' ORDER BY qno";
			//echo "<br>".$smquery."<br>";
			$qcodestr = "";
			$smresult = mysql_query($smquery);
			while($smrow=mysql_fetch_array($smresult))
			{
				$qcodestr .= $smrow['qcode'].",";
				$outputstring .= "<tr><td>".$smrow['autono']."</td><td>".$smrow['qno']."</td><td>".$smrow['question']."</td><td>".$smrow['optiona']."</td><td>".$smrow['optionb']."</td><td>".$smrow['optionc']."</td><td>".$smrow['optiond']."</td></tr>";
				//echo $smrow['qcode'];
			}
			$outputstring .= "</table>";
		}
		if($this->action=="Search Questions" && $this->tblselected=="DAQMS")
		{
			/*print_r ($_POST);
			echo "Yes...";*/
			
			$subjectno=$this->subjectda;
			
			$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$outputstring .= "<tr align='center'><th>Qno</th><th>Qcode</th><th>Question</th><th>Skill</th></tr>";
			
			$img_folder = $this->fetchImgPathName($papercode);
			$cntr=1;
			$condition="";
			if (isset($_POST['classda']) && $_POST['classda']!='')
				$condition .= " AND a.class=".$this->classda;
			if (isset($_POST['subjectda']) && $_POST['subjectda']!='')
				$condition .= " AND a.subjectno='$this->subjectda'";
			if (isset($_POST['datopic']) && $_POST['datopic']!='')
				$condition .= " AND c.topic_code=".$_POST['datopic'];
			if (isset($_POST['dasubtopic']) && $_POST['dasubtopic']!='')
				$condition .= " AND b.subtopic_code=".$_POST['dasubtopic'];
			if (isset($_POST['dasubsubtopic']) && $_POST['dasubsubtopic']!='')
				$condition .= " AND a.sub_subtopic_code=".$_POST['dasubsubtopic'];
			if (isset($_POST['daskill']) && $_POST['daskill']!='')
				$condition .= " AND a.skill='".$_POST['daskill']."'";
			if (isset($_POST['keyword']) && $_POST['keyword']!='')
				$condition .= " AND (a.question LIKE ('%".$_POST['keyword']."%') OR a.optiona LIKE ('%".$_POST['keyword']."%') OR a.optionb LIKE ('%".$_POST['keyword']."%') OR a.optionc LIKE ('%".$_POST['keyword']."%') OR a.optiond LIKE ('%".$_POST['keyword']."%') )";
				
			$query = "SELECT a.*,b.description as subtopic,c.description as topic, d.description as subsubtopic, a.sub_subtopic_code
			          FROM   educatio_educat.da_questions a, educatio_educat.da_subSubTopicMaster d, educatio_educat.da_subtopicMaster b,educatio_educat.da_topicMaster c
			          WHERE  a.sub_subtopic_code=d.sub_subtopic_code AND d.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code $condition";
		
			//$query = "SELECT * FROM educatio_educat.da_questions WHERE $condition";
			//echo "<br>".$query."<br>";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$optionstr = "";
				$question = $this->orig_to_html($row['question'],$img_folder);
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);
				$optionb = $this->orig_to_html($row['optionb'],$img_folder);
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);
				$optiond = $this->orig_to_html($row['optiond'],$img_folder);
				
				$srno=$cntr+1;				
				$optionstr .= "<br><br><table border=1 style='border-collapse: collapse' align='left' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
				$optionstr .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
				$optionstr .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";
				$qcode = $row['qcode'];
				$outputstring .= "<tr><td align='center'>".$cntr."</td><td align='center'><a href='#' onclick='StatusQuestionView($qcode,$qcode)'>".$row['qcode']."</td><td>".$question.$optionstr."</td>";
				$outputstring .= "<td>".$row['skill']."</td></tr>";
				$outputstring .= "</tr>";
				$cntr++;
			}
			
			if($cntr==0)
			{
				$outputstring .= "<tr><td align='center' colspan='6'><b>No questions found...</b></td></tr>";
			}
			$outputstring .= "</table>";
		}
		
		return $outputstring;
	}
	
	function orig_to_html($orig,$img_folder)
	{
        $pattern[0] = "/\[([a-z0-9_\.]*)\]/i";
        //$replacement[0] = "<img src='..//asset_online/$img_folder/\$1'>";
        $replacement[0] = "<img src='http://www.assetonline.in/asset_online/$img_folder/\$1'>";
        $pattern[1] = "/\[([a-z0-9_\.]*)[ ]*,[ ]*(.*)\]/i";
        //$replacement[1] = "<img src='..//asset_online/$img_folder/\$1' height=\$2>";
        $replacement[1] = "<img src='http://www.assetonline.in/asset_online/$img_folder/\$1' height=\$2>";
        $pattern[2] = "/\r\n/";
        $replacement[2] = "<br>\n";
        //$pattern[3] = "/{frac(.*)([^<])\//";
        $pattern[3] = "/{frac([^}]*)([^<])\//";
        $replacement[3] = "{frac\$1\$2|";
        $pattern[4] = "/{([a-z])}/";
        $replacement[4] = "<span class=var>\$1</span>";

        $pattern[5] = "/{exp\(([^{}]*)\)}/";
        $replacement[5] = "<span class=exp>\$1</span>";
        $pattern[6] = "/{frac\(([0-9]*)\+(.*)\)}/";
        $replacement[6] = "\$1{frac(\$2)}";

        /*$pattern[7] = "/{frac\(([-.0-9a-z()+<>=\/ ]*)\|([-.0-9a-z()+<>=\/ ]*)\)}/";
        $replacement[7] = "<span class='math' >\$1 \over \$2</span>";//<span class='den' style=''></span>
        */
        
        // DA regexp..
        $pattern[7] = "/{frac\(([0-9A-Za-z()+-?<>_'=\/&;^# ]*)\|([0-9A-Za-z()+-?<>_'=\/&;^# ]*)\)}/e";
		$replacement[7] = "'<span class=\"math\">'.$this->custom_replace('\\1').' \over '.$this->custom_replace('\\2').'</span>&nbsp;'";
        
		$html_ver = preg_replace($pattern, $replacement, $orig);
        $html_ver = str_replace("^^","\"", $html_ver);
        $html_ver = str_replace("^","'", $html_ver);

        return ($html_ver);
	}
	function orig_to_html_lsa($orig,$img_folder)
	{       
        $pattern[2] = "/\r\n/";
        $replacement[2] = "<br>\n";
        $pattern[3] = "/{frac([^}]*)([^<])\//";
        $replacement[3] = "{frac\$1\$2|";
        $pattern[4] = "/{([a-z])}/";
        $replacement[4] = "<span class=var>\$1</span>";

        $pattern[5] = "/{exp\(([^{}]*)\)}/";
        $replacement[5] = "<span class=exp>\$1</span>";
        $pattern[6] = "/{frac\(([0-9]*)\+(.*)\)}/";
        $replacement[6] = "\$1{frac(\$2)}";

        /*$pattern[7] = "/{frac\(([-.0-9a-z()+<>=\/ ]*)\|([-.0-9a-z()+<>=\/ ]*)\)}/";
        $replacement[7] = "<span class='math' >\$1 \over \$2</span>";//<span class='den' style=''></span>
        */
        
        // DA regexp..
        $pattern[7] = "/{frac\(([0-9A-Za-z()+-?<>_'=\/&;^# ]*)\|([0-9A-Za-z()+-?<>_'=\/&;^# ]*)\)}/e";
		$replacement[7] = "'<span class=\"math\">'.$this->custom_replace('\\1').' \over '.$this->custom_replace('\\2').'</span>&nbsp;'";
        
		$html_ver = preg_replace($pattern, $replacement, $orig);
        $html_ver = str_replace("^^","\"", $html_ver);
        $html_ver = str_replace("^","'", $html_ver);

        return ($html_ver);
	}
	function custom_replace($str)
	{
		$str = str_replace(' ','&nbsp;',$str);
		$pattern[0] = "/#([^#]*)\#/i";
		$replacement[0] = "{\$1}";
		$str = preg_replace($pattern,$replacement,$str);
		return $str;
	}

	function fetchImgPathName($quesline)
	{
		//echo $quesline;
		//exit;
		$imgnamepath="Round".strtoupper(substr($quesline,2,1));
		$subcode = substr($quesline,0,1);
		if($subcode=="1")
			$imgnamepath.="/english_images";
		elseif ($subcode=="2")
			$imgnamepath.="/MATHS_IMAGES";
		elseif ($subcode=="3")
			$imgnamepath.="/sci_images";
		elseif ($subcode=="4")
			$imgnamepath.="/social_images";
		elseif ($subcode=="5")
			$imgnamepath.="/hindi_images";

		$imgnamepath .= "/class".substr($quesline,1,1);
		//echo $imgnamepath." - ".$quesline."<br>";
		//exit;
		return $imgnamepath;
	}
	
	function fetchQuestionDetails($qcode,$connid)
	{
		$questr="";
		$query = "SELECT * FROM lq_questions WHERE qcode=".$qcode;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		$questr.="question##".$row['question']."&&qcode##".$row['qcode']."&&";
		$questr.="optiona##".$row['optiona']."&&optionb##".$row['optionb']."&&";
		$questr.="optionc##".$row['optionc']."&&optiond##".$row['optiond']."&&";
		$questr.="mcq##".$row['mcq']."&&correct_answer##".$row['correct_answer']."&&figure##".$row['figure']."&&repeattype##".$row['repeattype']."&&";
		$questr.="used##".$row['used']."&&SfNsf##".$row['SfNsf']."&&GoW##".$row['gow']."&&";
		$questr.="skillno##".$row['skillno']."&&passageid##".$row["passageid"];
		$questr.="&&forProduction##".$row['forProduction']."&&forEvaluator##".$row['forEvaluator'];//."&&mcq##Y&&correct_answer##".$row['correct_answer'];
		
		//columns for reference check (if asset, DA, Vernaculars or CQB)
		$questr.="&&isasset##".$row['isasset']."&&isda##".$row['isda']."&&isrefverna##".$row['isrefverna']."&&iscqb##".$row["iscqb"]."&&qcode_ref##".$row['qcode_ref'];
		if (($row['isasset']=="Y" || $row['isda']=="Y") && $row['qcode1_ref']!=0)
			$questr.="&&qcode_ref##".$row['qcode1_ref']."&&papercode_ref##".$row['papercode1_ref']."&&qno_ref##".$row['qno1_ref'];
		else 
			$questr.="&&qcode_ref##".$row['qcode_ref']."&&papercode_ref##".$row['papercode_ref']."&&qno_ref##".$row['qno_ref'];

		return $questr;
	}
	function fetchVernacularQuestionDetails($qcode,$connid)
	{
		$questr="";
		$query = "SELECT * FROM lq_questions_vernaculars WHERE autono=".$qcode;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		$questr.="questiondiv##".$row['question']."&&";
		$questr.="optionadiv##".$row['optiona']."&&optionbdiv##".$row['optionb']."&&";
		$questr.="optioncdiv##".$row['optionc']."&&optionddiv##".$row['optiond']."&&";
		$questr.="commentsdiv##".$row['comments']."&&passageiddiv##".$row['passageid'];
		
		return $questr;
	}
	function fetchVernacularQuestionDetails1($qcode,$connid)//for fetching vernacular questions in english version LSA QMS
	{
		$questr="";
		$query = "SELECT * FROM lq_questions_vernaculars WHERE autono=".$qcode;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		$questr.="question##".$row['question']."&&qcode##".$row['autono']."&&";
		$questr.="optiona##".$row['optiona']."&&optionb##".$row['optionb']."&&";
		$questr.="optionc##".$row['optionc']."&&optiond##".$row['optiond'];
		
		return $questr;
	}
	function fetchQuestionDetails_ASSET($qcode,$connid)
	{
		$questr="";
		$query = "SELECT * FROM educatio_educat.questions WHERE qcode=".$qcode;
		//$questr=$query;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		$questr.="question##".$row['question']."&&qcode##".$row['qcode']."&&";
		$questr.="optiona##".$row['optiona']."&&optionb##".$row['optionb']."&&";
		$questr.="optionc##".$row['optionc']."&&optiond##".$row['optiond']."&&mcq##Y&&correct_answer##".$row['correct_answer']."&&grouptext##".$row["group_text"];
		
		return $questr;
	}
	function fetchQuestionDetails_DA($qcode,$connid)
	{
		$questr="";
		$query = "SELECT * FROM educatio_educat.da_questions WHERE qcode=".$qcode;
		//$questr=$query;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		$query="SELECT comment FROM educatio_educat.da_comments WHERE qcode=$qcode AND commenter='System' AND type='AUTO' AND comment like '%Added from ASSET%'";
		$result=mysql_query($query) or die("DA comments fetch error - ".mysql_error());
		$rowcomment=mysql_fetch_array($result);
		
		$questr.="question##".$row['question'];
		
		$comment=$rowcomment['comment'];
		if ($comment!="")
		{
			$commentArr = explode(":",$comment);
			$assetqcode=$commentArr[1];
			$assetqcode=substr($assetqcode,0,-1);
			$questr.="&&qcode##".$assetqcode."&&isasset##Y&&isda##N&&";
		}
		else 
			$questr.="&&qcode##".$row['qcode']."&&";
		
		$questr.="optiona##".$row['optiona']."&&optionb##".$row['optionb']."&&";
		$questr.="optionc##".$row['optionc']."&&optiond##".$row['optiond']."&&mcq##Y&&correct_answer##".$row['correct_answer'];//."&&grouptext##".$row["group_text"];
		
		return $questr;
	}
	function fetchQuestionDetails_CQB($qcode,$connid)
	{
		$questr="";
		$query = "SELECT * FROM educatio_educat.common_question_bank WHERE qcode=".$qcode;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		
		$questr.="question##".$row['question']."&&qcode##".$row['qcode']."&&";
		$questr.="optiona##".$row['optiona']."&&optionb##".$row['optionb']."&&";
		$questr.="optionc##".$row['optionc']."&&optiond##".$row['optiond']."&&mcq##Y&&correct_answer##".$row['correct_answer'];
		$questr.="&&forProduction##".$row['forProduction']."&&forEvaluator##".$row['forEvaluator'];//."&&mcq##Y&&correct_answer##".$row['correct_answer'];
		
		return $questr;
	}
	
	function fetchPastResultASSET($papercode_ref,$qno_ref,$connid)
	{
		$percent_correct="";
		
		$query = "SELECT percent_correct FROM educatio_educat.correct_answers WHERE papercode='".$papercode_ref."' AND qno=".$qno_ref;
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows()!=0)
		{			
			$row = $dbquery->getrowarray();
			$percent_correct = round($row["percent_correct"],1)."%";
		}		
		return $percent_correct;
	}
	function fetchPastResultLSA($qcode_ref,$connid)
	{
		$percent_correct="";
		
		if($qcode_ref!=0 && $qcode_ref!="")
		{
			$query = "SELECT percent_correct FROM lq_questions WHERE qcode='".$qcode_ref."'";
			$dbquery = new dbquery($query,$connid);
			if($dbquery->numrows($dbquery)!=0)
			{
				$row = $dbquery->getrowarray();
				$percent_correct = round($row["percent_correct"],1)."%";
			}
		}
		return $percent_correct;
	}
	
	function fetchRound($project,$connid)//This function is now fetchin mediums for QMS search screen :: added Jacky on 28/01/2013
	{
		$rounds = "";
		if($project=="ASSET")
		{
			$query = "SELECT test_edition FROM educatio_educat.test_edition_details";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$rounds .= $row['test_edition'].",";
			}
			$rounds = substr($rounds, 0, -1);
			$returnstr=$rounds;
		}
		else 
		{
			$query = "SELECT DISTINCT roundyear FROM lsa_anscode_master_details WHERE project='".$project."'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$rounds .= $row['roundyear'].",";
			}
			$rounds = substr($rounds, 0, -1);
			
			if ($project!="")
			{$query = "SELECT DISTINCT medium FROM lqv_sbpno_mapping WHERE skillblueprintno IN (SELECT DISTINCT skillblueprintno FROM lsa_anscode_master_details WHERE project='$project') ORDER BY medium";}
			else 
			{	$query = "SELECT DISTINCT medium FROM lqv_sbpno_mapping ORDER BY medium";}
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$mediums .= $row['medium'].",";
			}
			$mediums = substr($mediums, 0, -1);
			
			$returnstr=$rounds."###".$mediums;
		}
		return $returnstr;
	}
	
	function prepareRoundCombo($roundyear,$connid)
	{
		$roundcombo = "";
		$query = "SELECT DISTINCT roundyear FROM lsa_anscode_master_details WHERE project='".$this->project."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($roundyear == $row["roundyear"])
				$roundcombo .= "<option value=".$row["roundyear"]." selected>".$row["roundyear"]."</option>";
			else
				$roundcombo .= "<option value=".$row["roundyear"].">".$row["roundyear"]."</option>";
		}
		return $roundcombo;
	}
	function prepareClassCombo($class,$connid)
	{
		$clscombo = "";
		$condition="";
		if (isset($this->project) && $this->project!="" && isset($this->roundyear) && $this->roundyear!="")
			$condition="WHERE project='".$this->project."' AND roundyear='".$this->roundyear."'";
		$query = "SELECT DISTINCT class FROM lsa_anscode_master_details $condition ORDER BY class";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($class == $row["class"])
				$clscombo .= "<option value=".$row["class"]." selected>".$row["class"]."</option>";
			else
				$clscombo .= "<option value=".$row["class"].">".$row["class"]."</option>";
		}
		return $clscombo;
	}
	function prepareSubjectCombo($subject,$connid)
	{
		$subcombo = "";
		$condition="";
		if (isset($this->project) && $this->project!="" && isset($this->roundyear) && $this->roundyear!="" && $this->class!="")
			$condition="WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."'";
		$query = "SELECT DISTINCT subject FROM lsa_anscode_master_details $condition ORDER BY subject";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($subject == $row["subject"])
				$subcombo .= "<option value=".$row["subject"]." selected>".$row["subject"]."</option>";
			else
				$subcombo .= "<option value=".$row["subject"].">".$row["subject"]."</option>";
		}
		return $subcombo;
	}
	
	function pageUpdateASSETReference($connid)
	{
		$query = "SELECT qcode,qcode_ref FROM lq_questions WHERE isasset='Y' AND (papercode_ref='' OR qno_ref=0)";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$qcode=$row['qcode'];
			$qcode_ref=$row['qcode_ref'];
			if($qcode_ref!=0)
			{
				$query_ref = "SELECT * FROM educatio_educat.paper_master WHERE qcode='".$qcode_ref."'";
				$dbquery_ref = new dbquery($query_ref,$connid);
				$row_ref = $dbquery_ref->getrowarray();
				
				if($row_ref['papercode']!="")
				{
					$upquery = "UPDATE lq_questions SET papercode_ref='".$row_ref['papercode']."',qno_ref=".$row_ref['qno']." WHERE qcode=".$qcode;
					$updbquery = new dbquery($upquery,$connid);
					//echo $qcode." - ".$upquery."<br>";
				}
			}
		}
	}
	
	function prepareUserCombo_LQMS($connid,$username)
	{
		$usercombo  = "<select name='commentassignto'>";
		$usercombo .= "<option value=''></option>";
		$query = "SELECT name FROM educatio_educat.marketing WHERE appRights LIKE '%LQMS%' ORDER BY name";
		$result = mysql_query($query,$connid) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			if($username!=$row['name'])
				$usercombo .= "<option value='".$row['name']."'>".$row['name']."</option>";
		}
		$usercombo .= "</select>";
		return $usercombo;
	}
	
	function pageGeneralComments($connid,$username)
	{
		$this->setpostvars();
		if($this->action=="Add General Comment")
		{
			$insquery = "INSERT INTO lqv_generalcomments SET";
				
			$insquery .= " generalcomment='".$_POST["generalcomment"]."',comment_givenby='".$username."', comment_givento='".$_POST['commentassignto']."', status='Open'";
			//echo $insquery."<br>";			
			mysql_query($insquery) OR die("A: ".mysql_error());
		}
		
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center'><b>SrNo</b></td><td align='center'><b>Comment</b></td><td align='center'><b>Comment<br>Given By</b></td>";
		$outputstring .= "<td align='center'><b>Comment<br>Given To</b></td><td align='center'><b>Comment<br>Status</b></td><td align='center'><b>Comment<br>Time</b></td></tr>";
		
		$srno=1;
		$query = "SELECT id,generalcomment,comment_givenby,DATE_FORMAT(comment_giventime,'%d-%m-%Y %H:%i:%S') as CTIME,comment_givento,status FROM lqv_generalcomments WHERE status='Open' ORDER BY id";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$outputstring .= "<tr>";
			
			if($username==$row['comment_givenby'] || $username==$row['comment_givento'])
				$outputstring .= "<td align='center'><a href='javascript: update_generalcomment(".$row['id'].")'>".$srno."</a></td>";
			else 
				$outputstring .= "<td align='center'>".$srno."</td>";
			
			$outputstring .= "<td>".$row['generalcomment']."</td>";
			$outputstring .= "<td>".$row['comment_givenby']."</td><td>".$row['comment_givento']."</td><td>".$row['status']."</td><td>".$row['CTIME']."</td></tr>";
			$srno++;
		}
		return $outputstring;
	}
	
	function pageAddPassage($connid)
	{
		$flag = 0;
		$this->setpostvars();
		$this->username=$_SESSION['username'];

		if($this->action=="Add Passage")
		{
			for ($i=1;$i<=5;$i++)
			{
				if($_FILES["picture$i"]["tmp_name"]!="")
				{
					$picname = $_FILES["picture$i"]["name"];
					$uploadfile = "images/questionimages/".$picname;
					//checkfileType("picture$i",1);
					
					if (file_exists("images/questionimages/".$_FILES["picture$i"]["name"]))
					{
						if (isset($_POST['overwrite']))
						{
							move_uploaded_file($_FILES["picture$i"]["tmp_name"], $uploadfile);
							chmod($uploadfile,0644);
						}
						else 
						{
							echo "<center><font color=red>The image ".$picname." is already exist.</center>";
							$_FILES["picture$i"]["tmp_name"] = "";
							$flag = 1;
						}
					}
					else 
					{
						move_uploaded_file($_FILES["picture$i"]["tmp_name"], $uploadfile);
						chmod($uploadfile,0644);
					}
					/*if(!move_uploaded_file($_FILES["picture"]["tmp_name"], $uploadfile))
						echo "Possible file upload attack...";
					else
						chmod($uploadfile,0644);*/
					//$updquery .= "figure='".$picname."',";
				}
			}
			if ($flag == 0)
			{
				$images="";
				for ($i=1;$i<=5;$i++)
				{
					if($_FILES["picture$i"]["tmp_name"]!="")
						$images .= "[".$_FILES["picture$i"]["name"]."]<br>";
				}
				
				$passagetext = striptags_func($_POST["passagetext"]);
				$insquery = "INSERT INTO lq_passagemaster SET passage='".$passagetext."$images'";
				
				/*if($_FILES["picture"]["tmp_name"]!="")
					$insquery .= " passage='".$_POST["passage"]."<br>[".$_FILES["picture$i"]["name"]."]'";
				else 
					$insquery .= " passage='".$_POST["passage"]."'";*/
				//echo $insquery."<br>";			
				
				if(isset($_POST['figdesc']))
				{
					$figdesc = striptags_func($_POST["figdesc"]);
					$insquery .= ", figure_description='".addslashes($figdesc)."'";
				}
				if(isset($_POST['passagetitle']))
				{
					$passagetitle = striptags_func($_POST["passagetitle"]);
					$insquery .= ", passage_title='".addslashes($passagetitle)."'";
				}
				if(isset($_POST['passage_trns']))
					$insquery .= ", translation_medium='".$_POST["passage_trns"]."'";
				
				$insquery .= ",addedon=now(),addedby='$this->username',lastmodifiedby='$this->username'";
				//echo $insquery;
				mysql_query($insquery) OR die("A: ".mysql_error());
				echo "<p align='center'><font color=red><b>Passage Has been Entered in the system. Passage id is ".mysql_insert_id()."</b></font></p>";
				//$_POST['passage'] = "";
			}
		}
		
		
		if ($this->action=='search passage versions')
		{
			if (isset($_POST['searchpassageid']) && $_POST['searchpassageid']!='')
			{
				$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333' width='90%'>";
				$outputstring .= "<tr><td align='center' colspan='5'><b>Passages</b></td></tr>";
				$outputstring .= "<tr><td align='center'><b>Passage<br>ID</b></td><td align='center'><b>Passage Title</b></td><td align='center'><b>Passage</b></td><td align='center'><b>Action</b></td></tr>";
				$query = "SELECT * FROM lq_passagemaster WHERE passageid='".$_POST['searchpassageid']."' OR passageid_ref='".$_POST['searchpassageid']."' ORDER BY passageid";
				//echo $query;
				$result = mysql_query($query) OR die("select all error - : ".mysql_error());
				while($row = mysql_fetch_array($result))
				{
					$passagetext = Dotagtoimage($this->imagefolder, $row['passage']);
					$passagetext = strip_tags(substr($passagetext,0,175))."...";
					$outputstring .= "<tr><td align='center'>".$row['passageid']."</td><td>".$row['passage_title']."</td><td>".$passagetext."</td><td align='center'><a href='javascript: view_passage(".$row['passageid'].")'>View</a>&nbsp;&nbsp;<a href='javascript: update_passage(".$row['passageid'].")'>Edit</a></td></tr>";
				}
				$outputstring  .= "</table>";
				return $outputstring;
			}
		}
		if ($this->action=='search passages')
		{
			$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333' width='90%'>";
			$srno=1;			
			$condition="";
			if (isset($_POST['projectname']) && $_POST['projectname']!='')
				$condition.="AND a.project='".$_POST['projectname']."' ";
			if (isset($_POST['searchclass']) && $_POST['searchclass']!='')
				$condition.="AND a.class='".$_POST['searchclass']."' ";
			if (isset($_POST['searchsubject']) && $_POST['searchsubject']!='')
				$condition.="AND a.subject='".$_POST['searchsubject']."' ";
			if (isset($_POST['searchkeyword']) && $_POST['searchkeyword']!='')
				$condition.="AND (b.passage LIKE '%".$_POST['searchkeyword']."%' OR b.passage_title LIKE '%".$_POST['searchkeyword']."%')";
			
			//$mediumArr=array("Gujarati");
			$passagaidarr = array();
			//$query = "SELECT distinct passageid FROM lq_questions WHERE 1=1 $condition AND passageid!=0 ORDER BY passageid";
			//$query = "SELECT a.passageid,a.skillblueprintno,a.qno FROM lq_questions a, lq_passagemaster b WHERE 1=1 $condition AND a.passageid!=0 AND a.passageid=b.passageid ORDER BY a.passageid";
			$query = "SELECT DISTINCT a.passageid FROM lq_questions a, lq_passagemaster b WHERE 1=1 $condition AND a.passageid!=0 AND a.passageid=b.passageid ORDER BY a.passageid";
			$outputstring .= "<tr><td align='center'><b>Passage<br>ID</b></td><td align='center'><b>Passage Title</b></td><td align='center'><b>Passage</b></td><td align='center'><b>Questions</b></td><td align='center'><b>Action</b></td></tr>";
			//echo $query;
			$result = mysql_query($query) OR die("B: ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				//$passagetext = Dotagtoimage($this->imagefolder, $row['passage']);
				/*if($row['figure_description']!="")
					$passagetext .= "<br><br><b>Figure Description: </b><br>".$row['figure_description'];*/
				//$outputstring .= "<tr><td align='center'>".$row['passageid']."</td></tr>";
				
				/*$passageid=$row['passageid'];
				$sbpno=$row['skillblueprintno'];
				$qno=$row['qno'];
				echo "$passageid - $sbpno - $qno<br>";
				foreach ($mediumArr as $medium)
				{
					
				}*/
				
				if ($condition!='')
				{
					$query1 = "SELECT count(distinct qno) as totque FROM lq_questions WHERE passageid='".$row['passageid']."'";
					$result1=mysql_query($query1) or die("select error - ".mysql_error());
					$row1=mysql_fetch_array($result1);
					$totque=$row1['totque'];
					
					$query1 = "SELECT * FROM lq_passagemaster WHERE passageid='".$row['passageid']."'";
					$result1=mysql_query($query1) or die("select error - ".mysql_error());
					$row1=mysql_fetch_array($result1);
					
					$passagetext = Dotagtoimage($this->imagefolder, $row1['passage']);
					$passagetext = strip_tags(substr($passagetext,0,175))."...";
					$outputstring .= "<tr><td align='center'>".$row['passageid']."</td><td>".$row1['passage_title']."</td><td>".$passagetext."</td><td align='center'><a href='javascript: view_passagequestions(".$row['passageid'].")'>$totque</a></td><td align='center'><a href='javascript: view_passage(".$row['passageid'].")'>View</a>&nbsp;&nbsp;<a href='javascript: update_passage(".$row['passageid'].")'>Edit</a></td></tr>";
				}
				/*else 
				{
					$passagetext = Dotagtoimage($this->imagefolder, $row['passage']);
					$passagetext = strip_tags(substr($passagetext,0,175))."...";
					$outputstring .= "<tr><td align='center'>".$row['passageid']."</td><td>".$row['passage_title']."</td><td>".$passagetext."</td><td align='center'><a href='javascript: view_passage(".$row['passageid'].")'>View</a>&nbsp;&nbsp;<a href='javascript: update_passage(".$row['passageid'].")'>Edit</a></td></tr>";
				}*/
				$srno++;
			}

			$outputstring  .= "</table>";
			/*$outputstring  .= "</table><br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333' width='90%'>";
			$outputstring .= "<tr><td align='center' colspan='5'><b>Passages not linked to any question</b></td></tr>";
			$outputstring .= "<tr><td align='center'><b>Passage<br>ID</b></td><td align='center'><b>Passage Title</b></td><td align='center'><b>Passage</b></td><td align='center'><b>Action</b></td></tr>";
			$query = "SELECT * FROM lq_passagemaster WHERE passageid NOT IN (SELECT DISTINCT passageid from lq_questions) AND passageid NOT IN (SELECT DISTINCT passageid from lq_questions_vernaculars) ORDER BY passageid";
			$result = mysql_query($query) OR die("select all error - : ".mysql_error());
			while($row = mysql_fetch_array($result))
			{
				$passagetext = Dotagtoimage($this->imagefolder, $row['passage']);
				$passagetext = strip_tags(substr($passagetext,0,175))."...";
				$outputstring .= "<tr><td align='center'>".$row['passageid']."</td><td>".$row['passage_title']."</td><td>".$passagetext."</td><td align='center'><a href='javascript: view_passage(".$row['passageid'].")'>View</a>&nbsp;&nbsp;<a href='javascript: update_passage(".$row['passageid'].")'>Edit</a></td></tr>";
			}*/
		}
		return $outputstring;
	}
	
	function fetchPassageQustions($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$passageid=$this->passageid;
		
		
		$srno=1;
		$outpitstr="<table border='1' cellspacing=0><tr><th>SrNo</th><th>Question</th><th>Optiona</th><th>Optionb</th><th>Optionc</th><th>Optiond</th></tr>";
		
		$query = "SELECT * FROM lq_questions WHERE passageid='$passageid'";
		$result=mysql_query($query) or die("select error - ".mysql_error());
		while ($row=mysql_fetch_array($result))
		{
			if($row['isasset']=="Y")
			{				
				if ($row['qcode1_ref']==0)
					$img_folder = $this->fetchImgPathName($row['papercode_ref']);
				else 
					$img_folder = $this->fetchImgPathName($row['papercode1_ref']);
				
				$question = $this->orig_to_html($row['question'],$img_folder);	
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);	$optionb = $this->orig_to_html($row['optionb'],$img_folder);	
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);	$optiond = $this->orig_to_html($row['optiond'],$img_folder);	
				
				$question = str_replace("[--","[",$question);	$question = str_replace("--]","]",$question);
				$optiona = str_replace("[--","[",$optiona);	$optiona = str_replace("--]","]",$optiona);
				$optionb = str_replace("[--","[",$optionb);	$optionb = str_replace("--]","]",$optionb);
				$optionc = str_replace("[--","[",$optionc);	$optionc = str_replace("--]","]",$optionc);
				$optiond = str_replace("[--","[",$optiond);	$optiond = str_replace("--]","]",$optiond);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
				
				if ($row['option_a']!=0)
					$optiona.="(".$row['option_a'].")";
				if ($row['option_b']!=0)
					$optiona.="(".$row['option_b'].")";
				if ($row['option_c']!=0)
					$optiona.="(".$row['option_c'].")";
				if ($row['option_d']!=0)
					$optiona.="(".$row['option_d'].")";
			}
			else 
			{
				$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
				$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
				$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
				
				if ($row['option_a']!=0)
					$optiona.="(".$row['option_a'].")";
				if ($row['option_b']!=0)
					$optiona.="(".$row['option_b'].")";
				if ($row['option_c']!=0)
					$optiona.="(".$row['option_c'].")";
				if ($row['option_d']!=0)
					$optiona.="(".$row['option_d'].")";
			}

			if ($row['mcq']=='N')
				$outpitstr.="<tr align=center><td>$srno</td><td>$question</td><td colspan='4'>&nbsp;</td></tr>";//".$row['percent_correct']."
			else 
				$outpitstr.="<tr align=center><td>$srno</td><td>$question</td><td>$optiona</td><td>$optionb</td><td>$optionc</td><td>$optiond</td></tr>";
			$srno++;
		}
		$outpitstr.="</table>";
		return $outpitstr;
	}
	
	function pageEditGeneralComments($connid,$username)
	{
		//print_r ($_REQUEST);
		$this->setgetvars();
		$this->setpostvars();
		if($this->action=="Edit Comment")
		{
			if($_POST['commentstatus']=="Close")
			{
				$updquery = "UPDATE lqv_generalcomments SET status='".$_POST['commentstatus']."', comment_closedby='".$username."'";
				$updquery .= " WHERE id=".$_POST["commentid"];	
				mysql_query($updquery) OR die("A: ".mysql_error());
			}
			echo "<script>opener.location.reload(true);window.close();</script>";
			exit();
		}
		
		$query = "SELECT id,generalcomment,comment_givenby,DATE_FORMAT(comment_giventime,'%d-%m-%Y %H:%i:%S') as CTIME,comment_givento,status FROM lqv_generalcomments WHERE id=".$_GET["commentid"];
		//echo $query;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row;
	}
	
	function pageEditPassage($connid)
	{
		//print_r($_POST);
		$flag = 0;
		$this->setgetvars();
		$this->setpostvars();
		$this->username=$_SESSION['username'];

		if($this->action!="")
		{
			for ($i=1;$i<=5;$i++)
			{
				if($_FILES["picture".$i]["tmp_name"]!="")
				{
					$picname = $_FILES["picture".$i]["name"];
					$uploadfile = "images/questionimages/".$picname;
					//checkfileType("picture".$i,1);
					if (file_exists("images/questionimages/".$_FILES["picture".$i]["name"]))
					{
						if (isset($_POST['overwrite']))
						{
							move_uploaded_file($_FILES["picture".$i]["tmp_name"], $uploadfile);
							chmod($uploadfile,0644);
						}
						else 
						{
							echo "<center><font color=red>The image ".$picname." is already exist.</center>";
							$_FILES["picture".$i]["tmp_name"] = "";
							$flag = 1;
						}
					}
					else 
					{
						move_uploaded_file($_FILES["picture".$i]["tmp_name"], $uploadfile);
						chmod($uploadfile,0644);
					}
				}
			}
		
			if($this->action!="")
			{
				$images="";
				for ($i=1;$i<=5;$i++)
				{
					if($_FILES["picture$i"]["tmp_name"]!="")
						$images .= "[".$_FILES["picture$i"]["name"]."]<br>";
				}
			}
			if($this->action=="Edit Passage")
			{			
				$passagetext = striptags_func($_POST["passagetext"]);
				$passagetitle = striptags_func($_POST["passagetitle"]);
				
				$updquery = "UPDATE lq_passagemaster SET passage='".$passagetext."$images'";				
				if(isset($_POST['figdesc']))
				{
					$figdesc = striptags_func($_POST["figdesc"]);
					$updquery .= ", figure_description='".addslashes($figdesc)."'";
				}
				
				$updquery .= ",passage_title='".$passagetitle."',translation_medium='".$_POST["passage_trns"]."',passageid_ref=".$_POST["passageid"].",lastmodifiedby='$this->username' WHERE passageid=".$_POST["passageid"];
				
			}
			
			if($this->action=="add passage version")
			{
				$passagetext = striptags_func($_POST["passagetext"]);
				$passagetitle = striptags_func($_POST["passagetitle"]);
				
				$updquery = "INSERT INTO lq_passagemaster SET passage='".$passagetext."$images'";
				$updquery.=",passage_title='".$passagetitle."',translation_medium='".$_POST["passage_trns"]."',passageid_ref='".$_POST["passageid"]."'";
				$updquery .= ",addedon=now(),addedby='$this->username',lastmodifiedby='$this->username'";
								
				if(isset($_POST['figdesc']))
				{
					$figdesc = striptags_func($_POST["figdesc"]);
					$updquery .= ", figure_description='".addslashes($figdesc)."'";
				}
			}
			if($this->action=="add passage translation")
			{
				$query="select count(*) from lq_passagemaster WHERE passageid_ref='".$_POST['passageidref']."' AND translation_medium='".$_POST['passage_trns']."'";
				//echo $query;//exit;
				$result=mysql_query($query) OR die("Select reference passageid error - : ".mysql_error());
				$row=mysql_fetch_array($result);
				if ($row['count(*)']==1)
				{
					echo "<center><font color=red>This translation is already exists.</font></center>";
					exit; 
				}
				else 
				{
					$passagetext = striptags_func($_POST["passagetext"]);
					$passagetitle = striptags_func($_POST["passagetitle"]);
					
					$updquery = "INSERT INTO lq_passagemaster SET passage='".$passagetext."$images'";
					$updquery.=",passage_title='".$passagetitle."',translation_medium='".$_POST["passage_trns"]."',passageid_ref='".$_POST["passageid"]."'";
					$updquery .= ",addedon=now(),addedby='$this->username',lastmodifiedby='$this->username'";
										
					if(isset($_POST['figdesc']))
					{
						$figdesc = striptags_func($_POST["figdesc"]);
						$updquery .= ", figure_description='".addslashes($figdesc)."'";
					}
				}
			}
			if ($updquery!='' && $flag == 0)
			{
				//echo $updquery;exit;
				mysql_query($updquery) OR die("A: ".mysql_error());
				if ($flag == 0)
				{
					echo "<script>window.opener.document.forms[0].actiontoperform.value='search passages'</script>";
					echo "<script>window.opener.document.forms[0].submit();window.close();</script>";
					//echo "<script>opener.location.reload(true);window.close();</script>";
					exit();
				}
			}
		}
		
		$query = "SELECT * FROM lq_passagemaster WHERE passageid=".$_REQUEST["passageid"];
		//echo $query;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row;
	}
	
	function pageViewPassage($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$query = "SELECT * FROM lq_passagemaster WHERE passageid=".$_GET["passageid"];
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row;
	}
	
	function fetchIPSComments($sbpno,$qno,$connid)
	{
		$ipcomments = "";
		$query = "SELECT ipsperson,ipscomments,ipscommentstime FROM lqv_ips WHERE skillblueprintno=".$sbpno." AND qno=".$qno;
		$result = mysql_query($query,$connid);
		while($row = mysql_fetch_array($result))
		{
			if($row['ipscomments']!="")
			{
				$ipcommentstime = formatDate(substr($row['ipscommentstime'],0,10));
				if($ipcommentstime=="00-00-0000")
					$ipcomments .= $row['ipsperson'].": ".$row['ipscomments']."<br><br>";
				else 
					$ipcomments .= $row['ipsperson']."(".$ipcommentstime."): ".$row['ipscomments']."<br><br>";
			}
		}
		return $ipcomments;
	}
	
	function fetchTorrentComments($papercode,$qno,$connid)
	{
		$torrentcomments = "";
		$query = "SELECT * FROM lqv_torrentcomments WHERE papercode='".$papercode."' AND qno=".$qno;
		$result = mysql_query($query,$connid);
		while($row = mysql_fetch_array($result))
		{
			if($row['torrentcomments']!="")
				$torrentcomments .= "Torrent: ".$row['torrentcomments']."<br>";
			if($row['aparnaji_1']!="")
				$torrentcomments .= "aparna: ".$row['aparnaji_1']."<br>";	
			if($row['aparnaji_2']!="")
				$torrentcomments .= "aparna: ".$row['aparnaji_2']."<br>";	
			if($row['vs']!="")
				$torrentcomments .= "vs: ".$row['vs']."<br>";	
			if($row['correctiontobedone']!="")
				$torrentcomments .= "correction to be done: ".$row['correctiontobedone'];	
			
		}
		return $torrentcomments;
	}
	
	function fetchTranslatorComments($papercode,$qno,$medium,$connid)
	{
		$translatorcomments = "";
		$query = "SELECT skillblueprintno FROM lqv_sbpno_mapping WHERE papercode='".$papercode."' AND medium='".$medium."'";
		$result = mysql_query($query,$connid);
		while($row = mysql_fetch_array($result))
		{
			$skillbluprintno=$row['skillblueprintno'];
			$query1 = "SELECT forProduction FROM lq_questions WHERE skillblueprintno='".$skillbluprintno."' AND qno='".$qno."'";
			$result1 = mysql_query($query1,$connid);
			$row1=mysql_fetch_array($result1);
			$translatorcomments=$row1['forProduction'];
		}
		return $translatorcomments;
	}
	
	function fetchLastComment($sbpno,$papercode,$qno,$connid)
	{
		//$lastcomment = "";
		$retArr = array();
		//$query = "SELECT comments FROM lq_questions_vernaculars WHERE skillblueprintno=".$sbpno." AND papercode='".$papercode."' AND qno=".$qno;
		$query = "SELECT * FROM lq_questions_vernaculars WHERE skillblueprintno=".$sbpno." AND papercode='".$papercode."' AND qno=".$qno;
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		$retArr['question']=$row['question'];
		$retArr['optiona']=$row['optiona'];
		$retArr['optionb']=$row['optionb'];
		$retArr['optionc']=$row['optionc'];
		$retArr['optiond']=$row['optiond'];
		$retArr['comments']=$row['comments'];
		/*$lastcomment = $row['comments'];
		$lastcommentarray = explode(":",$lastcomment);
		$lastcomment = trim($lastcommentarray[count($lastcommentarray)-1]);
		return $lastcomment;*/
		return $retArr;
	}
	function compareScorecardQMSData($connid)
	{
		$srno=1;
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#FFCC09'><th>SrNo</th><th>Project</th><th>Round</th><th>Class</th><th>Subject</th>";
		$outputstring .= "<th>Total Questions<br>(Scorecard)</th><th>Total Questions<br>(LSA QMS)</th><th>Comments</th></tr>";
		$bgcolor = "#FFFFFF";
		$query = "SELECT * FROM lsa_anscode_master_details ORDER BY project,roundyear,class,subject";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$query1 = "SELECT COUNT(*) FROM lq_questions WHERE skillblueprintno=".$row['skillblueprintno'];
			$result1 = mysql_query($query1) OR die("B: ".mysql_error());
			while($row1 = mysql_fetch_array($result1))
			{
				if($row['totalquestions']!=$row1['COUNT(*)'])
				{
					if($row['questionsmismatch_comments']=='')
						$bgcolor = "#FFFF66";
					else
						$bgcolor = "#FFFFFF";
				}
				else 
					$bgcolor = "#FFFFFF";
				$outputstring .= "<tr bgcolor='".$bgcolor."'><td>".$srno."</td><td>".$row['project']."</td><td>".$row['roundyear']."</td><td>".$row['class']."</td><td>".$row['subject']."</td>";
				$outputstring .= "<td>".$row['totalquestions']."</td><td>".$row1['COUNT(*)']."</td><td>".$row['questionsmismatch_comments']."</td></tr>";
				$srno++;
			}
		}
		
		$outputstring .= "</table>";
		return $outputstring;
	}
	
	function clearReference($skillblueprintno,$qno,$connid)
	{
		$query = "UPDATE lq_questions SET qcode_ref=0,papercode_ref='',qno_ref=0,qcode1_ref=0,papercode1_ref='',qno1_ref=0 WHERE skillblueprintno=".$skillblueprintno." AND Qno=".$qno;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$questr="Reference Deleted...";
		return $questr;
	}
	
	function pageDecisionMakersComments($commentator,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		if($this->action=="Lock Decision Makers Comments")
		{
			$condition =" WHERE skillblueprintno=".$this->skillblueprintno;
			$updquery  = "UPDATE lsa_anscode_master_details SET ";
			$updquery .= "decisionmakers_comments_submitted='Y'";
			$updquery .= $condition;
			$dbupd = new dbquery($updquery,$connid);
			//echo "<script>window.close();</script>";
			//exit();
		}
		
		if($this->action=="Save Decision Makers Comments")
		{
			$today = date("d-m-Y");
			if($_POST["dmcomments"]!="" && $_SESSION['refreshcomment']==0)
			{
				$condition =" WHERE skillblueprintno=".$this->skillblueprintno;
				$comments = $commentator." (".$today."): ".$_POST["dmcomments"];
				$updquery  = "UPDATE lsa_anscode_master_details SET ";
				$updquery .= "decisionmakers_comments=IF(decisionmakers_comments='','".$comments."',CONCAT(decisionmakers_comments,'<br>','".$comments."'))";
				$updquery .= $condition;
				$dbupd = new dbquery($updquery,$connid);
				//echo "<script>window.close();</script>";
				//exit();
			}
		}
		
		$outputstring  = "<br><table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#DCDCDC'><th colspan='2'>Previously Given Comments by Decision Makers</th></tr>";
		$outputstring .= "<tr><th>SrNo</th><th>Comments</th></tr>";
		
		$srno=1;
		$query = "SELECT decisionmakers_comments,decisionmakers_comments_submitted FROM lsa_anscode_master_details WHERE skillblueprintno=".$this->skillblueprintno;
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		if($row['decisionmakers_comments']!="")
		{
			$dmcommentsarray = explode("<br>",$row['decisionmakers_comments']);
			for($ci=0; $ci<count($dmcommentsarray); $ci++)
			{
				if($dmcommentsarray[$ci]!="")
				{
					$outputstring .= "<tr>";
					
					if($row['decisionmakers_comments_submitted']=="N")
						$outputstring .= "<td align='center'><a href='javascript:editdecimakerscomments(".$this->skillblueprintno.",".$srno.")'>".$srno."</a></td>";
					else 
						$outputstring .= "<td align='center'>".$srno."</td>";
					
					$outputstring .= "<td>".$dmcommentsarray[$ci]."</td></tr>";
					$srno++;
				}
			}
		}
		else 
		{
			$outputstring .= "<tr><td align='center' colspan='2'><b><font color='#FF0000'>No decision maker's comments found for this paper.</font></b></td></tr>";
		}
		$outputstring .= "<tr><td align='center' colspan='2'><a href='javascript:window.close()'><b>Close Window</b></a></td></tr>";
		$outputstring .= "</table>";
		
		return $outputstring;
	}
	
	function pageEditDecisionMakersComments($commentator,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->action=="Edit Decision Makers Comments")
		{
			$today = date("d-m-Y");
			if($_POST["dmcomments"]!="")
			{
				$newdmcomments = "";
				$query = "SELECT decisionmakers_comments FROM lsa_anscode_master_details WHERE skillblueprintno=".$this->skillblueprintno;
				$result = mysql_query($query,$connid);
				$row = mysql_fetch_array($result);
				if($row['decisionmakers_comments']!="")
				{
					$dmcommentsarray = explode("<br>",$row['decisionmakers_comments']);
					/*echo "<pre>";
						print_r ($dmcommentsarray);
					echo "</pre>";*/
					for($ci=0; $ci<count($dmcommentsarray); $ci++)
					{
						if($this->srno==($ci+1))
						{
							if($ci==count($dmcommentsarray)-1)
								$newdmcomments .= $_POST['dmcomments'];
							else 
								$newdmcomments .= $_POST['dmcomments']."<br>";
						}
						else 
						{
							if($ci==count($dmcommentsarray)-1)
								$newdmcomments .= $dmcommentsarray[$ci];
							else 
								$newdmcomments .= $dmcommentsarray[$ci]."<br>";
						}
							
					}
					$updquery  = "UPDATE lsa_anscode_master_details SET ";
					$updquery .= "decisionmakers_comments='".addslashes($newdmcomments)."' WHERE skillblueprintno=".$this->skillblueprintno;
					//echo $updquery;
					
					$dbupd = new dbquery($updquery,$connid);
					
					$updquery  = "UPDATE lsa_anscode_master_details SET ";
					$updquery .= "decisionmakers_comments=REPLACE(decisionmakers_comments,'<br><br>','<br>') WHERE skillblueprintno=".$this->skillblueprintno;
					//echo $updquery;
					
					$dbupd = new dbquery($updquery,$connid);
					echo "<script>opener.location.reload(true);window.close();</script>";
					exit();
				}
				
			}
		}
		
		$outputstring = "";
		$query = "SELECT decisionmakers_comments FROM lsa_anscode_master_details WHERE skillblueprintno=".$this->skillblueprintno;
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		if($row['decisionmakers_comments']!="")
		{
			$dmcommentsarray = explode("<br>",$row['decisionmakers_comments']);
			for($ci=0; $ci<count($dmcommentsarray); $ci++)
			{
				if($this->srno==($ci+1))
					$outputstring .= $dmcommentsarray[$ci];
			}
		}
		return $outputstring;
	}
	
	function fetchQcode_LQV($sbpno,$qno,$connid)
	{
		$query = "SELECT qcode FROM lq_questions WHERE skillblueprintno=".$sbpno." AND qno=".$qno;
		//echo $query."<br>";
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		return $row['qcode'];
	}
	
	function fetchSBPNo_LQV($papercode,$qno,$connid)
	{
		//$query = "SELECT skillblueprintno FROM lq_questions_vernaculars WHERE papercode='".$papercode."' AND qno=".$qno;
		$query = "SELECT skillblueprintno FROM lq_questions_vernaculars WHERE papercode='".$papercode."' LIMIT 1";
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		return $row['skillblueprintno'];
	}
	function fetchCorrectAnswer_LQV($sbpno,$qno,$connid)
	{
		$query = "SELECT mcq,correct_answer FROM lq_questions WHERE skillblueprintno=".$sbpno." AND qno=".$qno;
		//echo $query."<br>";
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		if($row['mcq']=="Y")
			return $row['correct_answer'];
		else 
		{
			$rsquery = "SELECT * FROM anscode_master_all WHERE skillblueprintno=".$sbpno." AND qno=".$qno;
			//echo $rsquery."<br>";
			$rsresult = mysql_query($rsquery,$connid);
			$rsrow = mysql_fetch_array($rsresult);
			for($ac=1; $ac<=10; $ac++)
			{
				$anscode = "ans_code".$ac;
				$desc = "desc".$ac;
				if($rsrow[$anscode]=="01")
				{
					return $rsrow[$desc];
				}
			}
		}
	}
	
	function pageShowQuestion_LQV($skillblueprintno,$qno,$connid)
	{
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr><th colspan='3'>English Version of Question</th></tr>";
		$outputstring .= "<tr><th>Question</th><th>Scorecard</th><th>Correct<br>Answer</th></tr>";
		
		$condition =" WHERE skillblueprintno=".$skillblueprintno." AND qno=".$qno;
		$query = "SELECT * FROM lq_questions".$condition;
		//echo $query;
		//exit;
		$cntr=0;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			// Question Scorecard - Starts Here
			$anscode_table = "anscode_master_all";
			$opquery = "SELECT * FROM ".$anscode_table." WHERE skillblueprintno=".$skillblueprintno." AND Qno='".$row['Qno']."'"; 
			$opresult = mysql_query($opquery) OR die(mysql_error());
			//echo "<br>".$opquery;
			$oprow = mysql_fetch_array($opresult);
			$scoretable = "<br><table border='1' style='border-collapse: collapse' bordercolor='black'>";
			
			if($oprow["mcq"]=="1")
			{
				$scoretable .= "<tr><td>Option ticked (enter option A,B,C,D in English)</td><td align='center'>A,B,C,D</td></tr>";
				$scoretable .= "<tr><td>Invalid Answer Code/More Than One Option Ticked</td><td align='center'>86</td></tr>";
				$scoretable .= "<tr><td>Not Attempted</td><td align='center'>88</td></tr>";
			}
			else 
			{
				for($aci=1; $aci<=10; $aci++)
				{
					$anscode = $oprow["ans_code".$aci];
					if($anscode!="" && $anscode!=NULL)
					{
						$scoretable .= "<tr><td>".$oprow["desc".$aci]."</td><td align='center'>".$anscode."</td></tr>";
					}
				}
			}
			$scoretable .= "</table>";
			// Question Scorecard - Ends Here

			$passage="";
			if($row["passageid"]!=0)
				$passage = $this->fetchPassage($row["passageid"],$connid);
			
			if($row['isasset']=="Y")
			{				
				if ($row['qcode1_ref']==0)
					$img_folder = $this->fetchImgPathName($row['papercode_ref']);
				else 
					$img_folder = $this->fetchImgPathName($row['papercode1_ref']);
				
				$question = $this->orig_to_html($row['question'],$img_folder);	
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);	$optionb = $this->orig_to_html($row['optionb'],$img_folder);	
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);	$optiond = $this->orig_to_html($row['optiond'],$img_folder);	
				
				$question = str_replace("[--","[",$question);	$question = str_replace("--]","]",$question);
				$optiona = str_replace("[--","[",$optiona);	$optiona = str_replace("--]","]",$optiona);
				$optionb = str_replace("[--","[",$optionb);	$optionb = str_replace("--]","]",$optionb);
				$optionc = str_replace("[--","[",$optionc);	$optionc = str_replace("--]","]",$optionc);
				$optiond = str_replace("[--","[",$optiond);	$optiond = str_replace("--]","]",$optiond);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			else 
			{
				$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
				$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
				$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona  = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc  = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			
			$passagetext="";
			if($passage!="")
				$passagetext = Dotagtoimage($this->imagefolder, $passage);
				
			if($passagetext!="")
				$question = $passagetext."<br><br>".$question;
			
			$outputstring .= "<tr><td valign='top'>".$question;
				
			if($row['mcq']=="Y")
			{
				$outputstring .= "<br><table border=1 style='border-collapse: collapse' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
				$outputstring .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
				$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";
			}
			$outputstring .= "</td><td valign='top'>".$scoretable."</td><td align='center' valign='top'>".$row['correct_answer']."</td>";
			$cntr++;
		}
		
		if($cntr==0)
			$outputstring .= "<tr><td align='center'><b>No questions found...</b></td></tr>";
		
		$outputstring .= "</table><br><br>";
		
		$outputstring .= "<table style='border-collapse: collapse' align='center' border='1'>";
		$outputstring .= "<tr><th colspan='8'>Previous versions of question</th>";
		$outputstring .= "<tr><th>Ver. No</th><th>Question</th><th>Option A</th><th>Option B</th><th>Option C</th><th>Option D</th><th>Modified By</th><th>Modified Time</th></tr>";
		
		$condition =" WHERE skillblueprintno=".$skillblueprintno." AND qno=".$qno;
		$query = "SELECT question,optiona,optionb,optionc,optiond,comments,modifiedby,DATE_FORMAT(modifiedtime,'%d-%m-%Y %H:%i:%S') as MD FROM lq_questions_vernaculars_log".$condition." ORDER by modifiedtime";
		//echo $query;
		$verno=1;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($pcrow = mysql_fetch_array($result))
		{
			$question = $this->orig_to_html_lsa($pcrow['question'],$this->imagefolder);	
			$optiona = $this->orig_to_html_lsa($pcrow['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($pcrow['optionb'],$this->imagefolder);	
			$optionc = $this->orig_to_html_lsa($pcrow['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($pcrow['optiond'],$this->imagefolder);				
					
			$question = Dotagtoimage($this->imagefolder, spellChk($question,""));
			$optiona  = Dotagtoimage($this->imagefolder, spellChk($optiona,""));
			$optionb  = Dotagtoimage($this->imagefolder, spellChk($optionb,""));
			$optionc  = Dotagtoimage($this->imagefolder, spellChk($optionc,""));
			$optiond  = Dotagtoimage($this->imagefolder, spellChk($optiond,""));
			
			$outputstring .= "<tr><td align='center'>".$verno."</td><td>".$question["strWithSpellCheck"]."</td><td>".$optiona["strWithSpellCheck"]."</td><td>".$optionb["strWithSpellCheck"]."</td>";
			$outputstring .= "<td>".$optionc["strWithSpellCheck"]."</td><td>".$optiond["strWithSpellCheck"]."</td>";
			$outputstring .= "<td>".$pcrow['modifiedby']."</td><td>".$pcrow['MD']."</td></tr>";
			$verno++;
		}
		$outputstring .= "</table>";
		return $outputstring;
	}
	
	function fetchCorrectAnswer($sbpno,$qno,$connid)
	{
		$condition =" WHERE skillblueprintno=".$sbpno." AND qno=".$qno;
		
		$query = "SELECT correct_answer,isasset,papercode_ref,qno_ref,qcode_ref,isda,papercode1_ref,qno1_ref,qcode1_ref FROM lq_questions".$condition;
		//echo $query."<br>";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row["correct_answer"]."##".$row["isasset"]."##".$row["papercode_ref"]."##".$row["qno_ref"]."##".$row["qcode_ref"]."##".$row["isda"]."##".$row["papercode1_ref"]."##".$row["qno1_ref"]."##".$row["qcode1_ref"];
	}
	
	function fetchIPSForPaper($papercode,$username,$connid)
	{
		$ipsarray = array();
		$query = "SELECT * FROM lqv_ips WHERE papercode='".$papercode."' AND ipsperson='".$username."' ORDER BY qno";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$ipsarray[$row['qno']]['correctans'] = $row['answer'];
			$ipsarray[$row['qno']]['comments'] = $row['ipscomments'];
		}
		return $ipsarray;
	}
	
	function fetchIPSPersonsOfPaper($papercode,$connid)
	{
		$ipsarray = array();
		$query = "SELECT DISTINCT ipsperson FROM lqv_ips WHERE papercode='".$papercode."' ORDER BY ipsperson";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			array_push($ipsarray,$row['ipsperson']);
		}
		return $ipsarray;
	}
	
	function fetchIPSOfPaper($papercode,$connid)
	{
		$ipsarray = array();
		$query = "SELECT * FROM lqv_ips WHERE papercode='".$papercode."' ORDER BY ipsperson,qno";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$ipsarray[$row['ipsperson']][$row['qno']]['correctans'] = $row['answer'];
			$ipsarray[$row['ipsperson']][$row['qno']]['comments'] = $row['ipscomments'];
		}
		return $ipsarray;
	}
	
	function checkForMCQ_LQV($sbpno,$qno,$connid)
	{
		$query = "SELECT mcq FROM lq_questions WHERE skillblueprintno='".$sbpno."' AND qno=".$qno;
		//echo $query."<br>";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row['mcq'];
	}

	function fetchIgnoreWords_LQV($qcode,$connid)
	{
		$ignore_words = "";
		if($qcode!='' || $qcode!=0)
		{
			$query = "SELECT ignore_words FROM lq_questions WHERE qcode=".$qcode;
			//echo $query."<br>";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			$row = mysql_fetch_array($result);
			$ignore_words = $row['ignore_words'];
		}
		return $ignore_words;
	}
	
	function fetchIgnoreWordsPSG_LQV($passageid,$connid)
	{
		$query = "SELECT ignore_words FROM lq_passagemaster WHERE passageid=".$passageid;
		//echo $query."<br>";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row['ignore_words'];
	}
	
	function fetchFullUserName($username,$connid)
	{
		$fullname = "";
		$query = "SELECT fullname FROM educatio_educat.marketing WHERE name='".$username."'";
		//echo $query."<br>";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		$fullname = $row['fullname'];
		
		if($row['fullname']=="")
		{
			$query = "SELECT fullname FROM educatio_educat.guest_login WHERE name='".$username."'";
			//echo $query."<br>";
			$result = mysql_query($query) OR die("B: ".mysql_error());
			$row = mysql_fetch_array($result);
			$fullname = $row['fullname'];
		}
		
		return $fullname;
	}
	
	// LSA - QMSS Functions Ends Here
	
	//LSA functions start here -- nitin
	function fetchIPSOfPaper_lq($sbpno,$connid)
	{
		$ipsarray = array();
		$query = "SELECT * FROM lq_ips WHERE skillblueprintno='".$sbpno."' ORDER BY ipsperson,qno";
		$result = mysql_query($query) OR die("selecting all from lq_ips by ipsperson,qno ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$ipsarray[$row['ipsperson']][$row['qno']]['correctans'] = $row['answer'];
			$ipsarray[$row['ipsperson']][$row['qno']]['comments'] = $row['ipscomments'];
		}
		return $ipsarray;
	}
	/*function fetchIPSOfPaper2_lq($sbpno,$connid)
	{
		$ipsarray = array();
		$query = "SELECT * FROM lq_ips WHERE skillblueprintno='".$sbpno."' ORDER BY qno";
		$result = mysql_query($query) OR die("selecting all from lq_ips by qno ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$ipsarray[$row['qno']]['correctans'] = $row['answer'];
			$ipsarray[$row['qno']]['comments'] = $row['ipscomments'];
		}
		return $ipsarray;
	}*/
	function checkForMCQ_lq($sbpno,$qno,$connid)
	{
		$query = "SELECT mcq FROM lq_questions WHERE skillblueprintno='".$sbpno."' AND qno=".$qno;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		$row = mysql_fetch_array($result);
		return $row['mcq'];
	}
	
	function fetchIPSPersonsOfPaper_lq($sbpno,$connid)
	{
		$ipsarray = array();
		$query = "SELECT DISTINCT ipsperson FROM lq_ips WHERE skillblueprintno='".$sbpno."' ORDER BY ipsperson";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			array_push($ipsarray,$row['ipsperson']);
		}
		return $ipsarray;
	}
	function fetchCorrectAnswer_lq($sbpno,$qno,$connid)
	{
		$query = "SELECT mcq,correct_answer FROM lq_questions WHERE skillblueprintno=".$sbpno." AND qno=".$qno;
		//echo $query."<br>";
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		if($row['mcq']=="Y")
			return $row['correct_answer'];
		else 
		{
			$rsquery = "SELECT * FROM anscode_master_all WHERE skillblueprintno=".$sbpno." AND qno=".$qno;
			//echo $rsquery."<br>";
			$rsresult = mysql_query($rsquery,$connid);
			$rsrow = mysql_fetch_array($rsresult);
			for($ac=1; $ac<=10; $ac++)
			{
				$anscode = "ans_code".$ac;
				$desc = "desc".$ac;
				if($rsrow[$anscode]=="01")
				{
					return $rsrow[$desc];
				}
			}
		}
	}
	/*function gdPapers($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		//echo $this->skillblueprintno;
		$this->setbasevars($this->skillblueprintno,1,$connid);
		
		$table="<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'><tr><th>SrNo.</th><th>Subject</th><th>Class</th><th>IRC link</th></tr>";
		
		$srno=1;
		$query="SELECT DISTINCT class,subject from correct_answers_mcq";// WHERE project='".$this->project."' AND test_edition='".$this->roundyear."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$table.="<tr align=center><td>$srno</td><td>".$row['subject']."</td><td>".$row['class']."</td><td><a href='gd_IRCGraph.php?subject=".$row['subject']."&classes=".$row['class']."' target='_blank'>IRCGraph</a></td></tr>";
			$srno++;
		}
		echo $table;
	}*/

	
	function pageShowPaperIRCGraph($commentator,$connid) //addedd by jakee 7/4/2012
	{
		$this->setgetvars();
		$this->setpostvars();
		//echo $this->skillblueprintno;
		$this->setbasevars($this->skillblueprintno,1,$connid);
		
		$skillarray = array();
		/*$query = "SELECT * FROM uskill_master";
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillno']] = $row['skillname'];
		}*/
		
		$query = "SELECT * FROM lsa_skillblueprint_breakup WHERE skillblueprintno=".$this->skillblueprintno;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$skillarray[$row['skillblueprintbreakupno']] = $row['skillname'];
		}
		
		$caarray = array();
		$query = "SELECT * FROM  contentarea_master ORDER BY cano";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$caarray[$row['cano']] = $row['caname'];
		}
		
		$skillblueprint = $this->fetchSkillBlueprint_Details($this->skillblueprintno,$connid);
		$ansoptionsbalance = $this->fetchAnswerOptionsBalance($this->skillblueprintno,$connid);
		
		$outputstring  = "<table border=1 style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		$outputstring .= "<tr bgcolor='#DCDCDC'><td align='center' colspan='9'><b>Paper</b></td></tr>";
		
	    $outputstring .= "<tr bgcolor='#DCDCDC'><td colspan='9' align='center'><font size='2'><b>Project: </b>".$this->project." <b>Round: </b>".$this->roundyear." <b>Subject: </b>".$this->subject." <b>Class: </b>".$this->class." <b>Paper Code: </b>".$this->papercode."</td></font></tr>";
	    
	    $outputstring .= "<tr><td colspan='9' align='center'>".$skillblueprint."<br>".$ansoptionsbalance."</td></tr>";
	    
		$outputstring .= "<tr><td align='center'><b>Qno</b></td><td align='center'><b>Question</b></td><td align='center'><b>Correct Answer</b></td>";
		$outputstring .= "<td align='center'><b>Option A</b></td><td align='center'><b>Option B</b></td><td align='center'><b>Option C</b></td><td align='center'><b>Option D</b></td><td align='center'><b>IRC Graph</b></td>";//<td align='center'><b>Comments</b></td></tr>";
		
		$optionPercentageArr = $this->optionPercentageArr_func($connid);
		$passagesprinted = array();
		$cntr=0;
		//$condition = " WHERE project='".$this->project."' AND roundyear='".$this->roundyear."' AND class='".$this->class."' AND subject='".$this->subject."'";
		$condition =" WHERE skillblueprintno=".$this->skillblueprintno;
		$query = "SELECT * FROM lq_questions".$condition." ORDER BY Qno";
		//echo $query;//exit;
		$result = mysql_query($query) OR die("B: ".mysql_error());
		while($row = mysql_fetch_array($result))
		{
			/*if($row['mcq']!="Y")
				continue;*/
				
			$anscode_table = "anscode_master_all";
			$opquery = "SELECT * FROM ".$anscode_table." WHERE skillblueprintno=".$this->skillblueprintno." AND Qno='".$row['Qno']."'"; 
			$opresult = mysql_query($opquery) OR die(mysql_error());
			//echo "<br>".$opquery;
			$oprow = mysql_fetch_array($opresult);
			/*$scoretable = "<br><table border='1' style='border-collapse: collapse' bordercolor='black'>";
			
			if($oprow["mcq"]=="1")
			{
				$scoretable .= "<tr><td>Option ticked (enter option A,B,C,D in English)</td><td align='center'>A,B,C,D</td></tr>";
				$scoretable .= "<tr><td>Invalid Answer Code/More Than One Option Ticked</td><td align='center'>86</td></tr>";
				$scoretable .= "<tr><td>Not Attempted</td><td align='center'>88</td></tr>";
			}
			else 
			{
				for($aci=1; $aci<=10; $aci++)
				{
					$anscode = $oprow["ans_code".$aci];
					if($anscode!="" && $anscode!=NULL)
					{
						$scoretable .= "<tr><td>".$oprow["desc".$aci]."</td><td align='center'>".$anscode."</td></tr>";
					}
				}
			}
			$scoretable .= "</table>";*/
			// Question Scorecard - Ends Here

			$passage="";
			if($row["passageid"]!=0)
				$passage = $this->fetchPassage($row["passageid"],$connid);
			
			if($row['isasset']=="Y")
			{
				if ($row['qcode1_ref']==0)
					$img_folder = $this->fetchImgPathName($row['papercode_ref']);
				else 
					$img_folder = $this->fetchImgPathName($row['papercode1_ref']);
					
				$question = $this->orig_to_html($row['question'],$img_folder);
				$optiona = $this->orig_to_html($row['optiona'],$img_folder);	$optionb = $this->orig_to_html($row['optionb'],$img_folder);	
				$optionc = $this->orig_to_html($row['optionc'],$img_folder);	$optiond = $this->orig_to_html($row['optiond'],$img_folder);	
				
				$question = str_replace("[--","[",$question);	$question = str_replace("--]","]",$question);
				$optiona = str_replace("[--","[",$optiona);	$optiona = str_replace("--]","]",$optiona);
				$optionb = str_replace("[--","[",$optionb);	$optionb = str_replace("--]","]",$optionb);
				$optionc = str_replace("[--","[",$optionc);	$optionc = str_replace("--]","]",$optionc);
				$optiond = str_replace("[--","[",$optiond);	$optiond = str_replace("--]","]",$optiond);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder, $optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			else 
			{
				$question = $this->orig_to_html_lsa($row['question'],$this->imagefolder);	
				$optiona = $this->orig_to_html_lsa($row['optiona'],$this->imagefolder);	$optionb = $this->orig_to_html_lsa($row['optionb'],$this->imagefolder);	
				$optionc = $this->orig_to_html_lsa($row['optionc'],$this->imagefolder);	$optiond = $this->orig_to_html_lsa($row['optiond'],$this->imagefolder);
				
				$question = Dotagtoimage($this->imagefolder, $question);
				$optiona = Dotagtoimage($this->imagefolder, $optiona); 		$optionb = Dotagtoimage($this->imagefolder,$optionb);
				$optionc = Dotagtoimage($this->imagefolder, $optionc); 		$optiond = Dotagtoimage($this->imagefolder, $optiond);
			}
			
			$passagetext="";
			if($passage!="")
				$passagetext = Dotagtoimage($this->imagefolder, $passage);
				
			if(!in_array($row["passageid"],$passagesprinted) && $passagetext!="")
			{
				$outputstring .= "<tr><td colspan='8'>".$passagetext."</td></tr>";
				array_push($passagesprinted,$row["passageid"]);
			}
			
			$outputstring .= "<tr><td align='center'>".$row['Qno']."</td><td>".$question;//<td align='center'>".$row['qcode']."</td>
			if($row['figure_description']!="")
				$outputstring .= "<br><b>Image Descriptions:<br></b>".$row['figure_description'];
				
			/*if($row['mcq']=="Y")
			{
				$outputstring .= "<br><table border=1 style='border-collapse: collapse' bordercolor='#333333'><tr><td align='center'><b>A</b></td><td align='center'><b>B</b></td><td align='center'><b>C</b></td>";
				$outputstring .= "<td align='center'><b>D</b></td></td></tr><tr><td align='center'>".$optiona."</td><td align='center'>".$optionb."</td>";
				$outputstring .= "<td align='center'>".$optionc."</td><td align='center'>".$optiond."</td></tr></table>";
			}*/
			
			if($row['mcq']=="Y")
			{
				$outputstring .= "<br><br><table border=1 style='border-collapse: collapse' bordercolor='#333333'>";
				$outputstring .= "<tr><td align='center'><b>A</b></td><td align='center'>".$optiona."</td></tr>";
				$outputstring .= "<tr><td align='center'><b>B</b></td><td align='center'>".$optionb."</td></tr>";
				$outputstring .= "<tr><td align='center'><b>C</b></td><td align='center'>".$optionc."</td></tr>";
				$outputstring .= "<tr><td align='center'><b>D</b></td><td align='center'>".$optiond."</td></tr>";
				$outputstring .= "</table>";
			}
			
			//$outputstring .= "<br>".$scoretable;
			
			$sfnsf = "";
			if($row["SfNsf"]=="S")
				$sfnsf="SF";
			elseif($row["SfNsf"]=="N")
				$sfnsf="NSF";
			
			$skillname = $skillarray[$row['projectskillno']];
			if($row['cano']!=0)
				$skillname .= " - ".$caarray[$row['cano']];
			
			/*echo "<pre>";
			print_r ($optionPercentageArr);
			echo "</pre>";
			exit;*/
			
			
			$outputstring .= "<td align='center'>".$optionPercentageArr[$this->subject][$this->class][$row['Qno']]['correct_answer']."</td><td align='center'>".$optionPercentageArr[$this->subject][$this->class][$row['Qno']]['optiona']."</td><td>".$optionPercentageArr[$this->subject][$this->class][$row['Qno']]['optionb']."</td><td align='center'>".$optionPercentageArr[$this->subject][$this->class][$row['Qno']]['optionc'];
			/*if($row['percent_correct']!=0.00)
			{
				$outputstring .=  "<br>(".sprintf("%0.1f",$row['percent_correct'])."%)";	
			}*/
			$outputstring .= "</td><td align='center'>".$optionPercentageArr[$this->subject][$this->class][$row['Qno']]['optiond']."</td>";
			if ($this->roundyear=="Y1")
				$outputstring .= "<td><img src='../GujaratDiagnostic/images/IRC_y1/".$this->subject.$this->class."_".$row['Qno'].".png'></td></tr>";
			else 
				$outputstring .= "<td><img src='../GujaratDiagnostic/images/IRC/".$this->subject.$this->class."_".$row['Qno'].".png'></td></tr>";
			$cntr++;
		}
		
		//$cntr--;
		if($cntr==0)
			$outputstring .= "<tr><td align='center' colspan='9'><b>No questions found...</b></td></tr>";
		
		$outputstring .= "<tr><td align='center' colspan='9'><a href='lsa_projectwise_rawscore_status.php?roundyear=".$this->roundyear."&isframes=Yes'>Projectwise Raw Score Status</a></td></tr>";
		$outputstring .= "</table>";
		$outputstring .= "<input type='hidden' name='totalquestions' value='".$cntr."'>";
		return $outputstring;
	}
	
	function optionPercentageArr_func($connid) //addedd by jakee 7/4/2012
	{
		$this->setgetvars();
		$this->setpostvars();
		//echo $this->skillblueprintno;
		$this->setbasevars($this->skillblueprintno,1,$connid);
		
		$optionArr = array();
		$query="SELECT * FROM correct_answers_mcq WHERE project='".$this->project."' AND test_edition='".$this->roundyear."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$optionArr[$row['Subject']][$row['Class']][$row['Qno']]['correct_answer'] = $row['correct_answer'];
			$optionArr[$row['Subject']][$row['Class']][$row['Qno']]['optiona'] = $row['option_a'];
			$optionArr[$row['Subject']][$row['Class']][$row['Qno']]['optionb'] = $row['option_b'];
			$optionArr[$row['Subject']][$row['Class']][$row['Qno']]['optionc'] = $row['option_c'];
			$optionArr[$row['Subject']][$row['Class']][$row['Qno']]['optiond'] = $row['option_d'];
		}
		return $optionArr;
	}
	
	function fetchVernacularPaperCode($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$papercodeArr = array();
		$query="SELECT DISTINCT papercode FROM lq_questions_vernaculars";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($papercodeArr,$row['papercode']);
		}
		return $papercodeArr;
	}

	//LSA functions ends here -- nitin
	
	function fetchDATopics($connid,$subjectno,$cls="")
	{
		$this->setgetvars();
		$this->setpostvars();
		$arrRet = array();
		
		/*$condition = " WHERE subjectno IN ('".$subjectno."')";
		if($cls!='')
			$condition .= " AND find_in_set('".$cls."',c.class)>0 ";
		*/		
		$query = "SELECT DISTINCT a.topic_code, a.description FROM educatio_educat.da_topicMaster a
					LEFT JOIN educatio_educat.da_subtopicMaster b ON a.topic_code = b.topic_code
					LEFT JOIN educatio_educat.da_subSubTopicMaster c ON b.subtopic_code = c.subtopic_code 
					 ORDER BY a.subjectno,a.description";
		//echo "<br>$query";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$arrRet[$row["topic_code"]] = $row["description"];
		}
		return $arrRet;
	}
	function fetchDASubTopics($connid,$topic_code,$cls="")
	{
		$this->setgetvars();
		$this->setpostvars();
	
		$condition = "";

		/*if($cls != "")
		   $condition = " AND find_in_set('".$cls."',b.class) > 0 ";
		*/
        $query = "SELECT DISTINCT a.description,a.subtopic_code, a.expected_questions FROM educatio_educat.da_subtopicMaster a LEFT JOIN educatio_educat.da_subSubTopicMaster b ON a.subtopic_code = b.subtopic_code WHERE a.topic_code = '".$topic_code."' ";//$condition
        //echo $query;
        $dbquery = new dbquery($query,$connid);
        while ($row = $dbquery->getrowarray())
        {
                $arrRet[$row["subtopic_code"]] = $row['description'];
        }
        return $arrRet;
	}
	function fetchDASubSubTopics($connid,$subtopic_code,$cls="")
	{
		$this->setgetvars();
		$this->setpostvars();

		/*$condition = "";
		if($cls != "")
			$condition = " AND find_in_set('".$cls."',class) > 0 ";
		*/	
		$query = "SELECT * FROM educatio_educat.da_subSubTopicMaster WHERE subtopic_code = '".$subtopic_code."' ";//$condition
		//echo "<br>$query";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["sub_subtopic_code"]] = $row["description"];
		}
		return $arrRet;
	}
	
	function getEnglishVersionQuestions($sbpno,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$arrRet = array();
		$query = "SELECT * FROM lq_questions WHERE skillblueprintno=$sbpno ORDER BY Qno";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet['qno'] = $row["Qno"];
			$arrRet[$row["Qno"]]['question'] = $row["question"];
			$arrRet[$row["Qno"]]['optiona'] = $row["optiona"];
			$arrRet[$row["Qno"]]['optionb'] = $row["optionb"];
			$arrRet[$row["Qno"]]['optionc'] = $row["optionc"];
			$arrRet[$row["Qno"]]['optiond'] = $row["optiond"];
			$arrRet[$row["Qno"]]['passageid'] = $row["passageid"];
			$arrRet[$row["Qno"]]['grouptextid'] = $row["grouptextid"];
		}
		return $arrRet;
	}
	function getQuestionsByPapercode($papercode,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$arrRet = array();
		$query = "SELECT * FROM lq_questions_vernaculars WHERE papercode='$papercode' ORDER BY qno";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet['qno'] = $row["qno"];
			$arrRet[$row["qno"]]['question'] = $row["question"];
			$arrRet[$row["qno"]]['optiona'] = $row["optiona"];
			$arrRet[$row["qno"]]['optionb'] = $row["optionb"];
			$arrRet[$row["qno"]]['optionc'] = $row["optionc"];
			$arrRet[$row["qno"]]['optiond'] = $row["optiond"];
			$arrRet[$row["qno"]]['passageid'] = $row["passageid"];
			$arrRet[$row["qno"]]['grouptextid'] = $row["grouptextid"];
		}
		return $arrRet;
	}
	
	function pageAddGrouptext($connid)
	{
		$flag = 0;
		$this->setpostvars();
		if($this->action=="Add Grouptext")
		{
			if($_FILES["picture$i"]["tmp_name"]!="")
			{
				$picname = $_FILES["picture"]["name"];
				$uploadfile = "images/questionimages/".$picname;
				//checkfileType("picture$i",1);
				
				if (file_exists("images/questionimages/".$_FILES["picture"]["name"]))
				{
					if (isset($_POST['overwrite']))
					{
						move_uploaded_file($_FILES["picture$i"]["tmp_name"], $uploadfile);
						chmod($uploadfile,0644);
					}
					else 
					{
						echo "<center><font color=red>The image ".$picname." is already exist.</center>";
						$_FILES["picture"]["tmp_name"] = "";
						$flag = 1;
					}
				}
				else 
				{
					move_uploaded_file($_FILES["picture"]["tmp_name"], $uploadfile);
					chmod($uploadfile,0644);
				}
			}
			
			if ($flag == 0)
			{
				$images="";
				if($_FILES["picture"]["tmp_name"]!="")
					$images .= "[".$_FILES["picture"]["name"]."]<br>";
				
				$qnofrom=$_POST["qnofrom"];
				$qnoto=$_POST["qnoto"];
				
				$selquery="SELECT * FROM lq_grouptext_master WHERE grouptext='".$_POST["grouptext"]."'";
				$selresult = mysql_query($selquery) OR die("gt sel error: ".mysql_error());
				$selrow=mysql_fetch_array($selresult);
				$isinserted = mysql_num_rows($selresult);
				if ($isinserted==0)
				{
					$grptext= striptags_func($_POST["grouptext"]);
					if (isset($_POST['grouptextid']) && $_POST['grouptextid']!=0)
						$insquery = "UPDATE lq_grouptext_master SET grouptext='".$grptext."$images',qnofrom='$qnofrom',qnoto='$qnoto' WHERE grouptextid='".$_POST['grouptextid']."'";
					else 
						$insquery = "INSERT INTO lq_grouptext_master SET grouptext='".$grptext."$images', qnofrom='$qnofrom', qnoto='$qnoto'";
					//echo $insquery;				
					mysql_query($insquery,$connid) OR die("gt insert error: ".mysql_error());
					if (isset($_POST['grouptextid']) && $_POST['grouptextid']!=0)
					{
						echo "<script>window.opener.location.reload(true);window.close();</script>";
						echo "<p align='center'><font color=red><b>Grouptext Has been Updated in the system. grouptext id is ".$_POST['grouptextid']."</b></font></p>";
					}
					else 
						echo "<p align='center'><font color=red><b>Grouptext Has been Entered in the system. grouptext id is ".mysql_insert_id()."</b></font></p>";
				}
				else 
				{
					echo "<p align='center'><font color=red><b>Grouptext with same stem exists. grouptext id is ".$selrow['grouptextid']."</b></font></p>";
				}
				//$_POST['passage'] = "";
			}
		}
	}
	
	function fetchGroupText($grouptextid,$connid)
	{
		$gtquery="SELECT * FROM lq_grouptext_master WHERE grouptextid='$grouptextid'";
		$gtresult=mysql_query($gtquery,$connid) or die("group text error: ".mysql_error());
		$gtrow=mysql_fetch_array($gtresult);
		return $gtrow;
	}
	
	function removeFirstPtag($str)
	{
		$str = preg_replace('/^<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $str);//remove <p> tag at the begining
		return $str;
	}
	
	function getAllMediums($connid)
	{
		$this->setpostvars();
		$condition="";
		if ($this->skillblueprintno!="" && $this->skillblueprintno!=0)
			$condition=" skillblueprintno=$this->skillblueprintno";
		$mediumArray = array();
		$query = "SELECT DISTINCT medium
				FROM lqv_sbpno_mapping WHERE 1=1 AND $condition ORDER BY medium";
		$result = mysql_query($query,$connid) OR die("medium select error - ". $query);
		while($row = mysql_fetch_array($result))
		{
			array_push($mediumArray,$row['medium']);
		}
		return $mediumArray;
	}
}
?>