<?php

class clscts
{
	var $tst_school_master;
	var $logocolor1;
	var $logocolor2;
	var $logocolor3;
	var $schoolcode;
	var $errormsg;
	var $visitid;
	var $actiontoperform;
	var $visitname;
	var $visitdate;
	var $visitsummary;
	var $subjectArray;
	var $teacherArray;
	var $actionArray;
	var $eifacultyArray;
	var $teacherToSubjectArray;
	var $teacherWiseSubjectArray;
	var $sectionArray;
	var $teacherid;
	var $classArr;
	var $subjectid;
	var $masterusers;
	var $counterCO;
	var $counterDL;
	var $dateDifference;
	var $coOrdinateTeachers;
	var $mode;
	var $charArr;
	var $chardate;
	var $studentid;
	var $intrvparamArr;
	var $deleteUserid;
	var $actionid;
	var $class;
	var $gender;
	var $keypointsteacher;
	var $keypointsteacher_maths;
	var $keypointsteacher_gujarati;
	var $totalissues;
	var $msvisitid;
	var $computerid;

	function clscts()
	{
		$this->tst_school_master 		= "tst_school_master";
		$this->logocolor1 		 		= "#FF9F40";
		$this->logocolor2 		 		= "#4A2500";
		$this->logocolor3 		 		= "#FFFFAA";
		$this->schoolcode 		 		= 0;
		$this->errormsg				 	= "";
		$this->visitid					= 0;
		$this->actiontoperform  	 	= "";
		$this->visitname			 	= "";
		$this->visitdate		 		= "";
		$this->visitsummary		 		= "";
		$this->subjectArray 			= array();
		$this->teacherArray		 		= array();
		$this->actionArray		 		= array();
		$this->eifacultyArray	 		= array();
		$this->teacherToSubjectArray	= array();
		$this->sectionArray				= array("A","B","C","D");
		$this->classArr					= array("3","4","5","6","7","8");
		$this->subjectid				= "";
		$this->masterusers				= array();
		$this->counterCO				= 5;
		$this->counterDL				= 5;
		$this->dateDifference			= 180;
		$this->coOrdinateTeachers		= array();
		$this->mode						= '';
		$this->charArr					= array();
		$this->chardate					= '';
		$this->studentid				= '';
		$this->intrvparamArr			= array();
		$this->Userid					= '';
		$this->actionid					= '';
		$this->class					= '';
		$this->gender					= '';
		$this->keypointsteacher			= '';
		$this->keypointsteacher_maths	= '';
		$this->keypointsteacher_gujarati= '';
		$this->totalissues				= 6;
		$this->msvisitid				= 0;
		$this->computerid				= '';
	}

  	function setpostvars()
	{
		if(isset($_POST["schoolcode"])) 							$this->schoolcode   = DoTrim($_POST["schoolcode"]);
		if(isset($_POST["visitid"])) 								$this->visitid   = DoTrim($_POST["visitid"]);
		if(isset($_POST["hdn_actiontoperform"])) 					$this->actiontoperform   = DoTrim($_POST["hdn_actiontoperform"]);
		if(isset($_POST["visitname"]) && $_POST["visitname"]!='' && $_POST["visitname"]!='other')
			$this->visitname   = DoTrim($_POST["visitname"]);
		if(isset($_POST["txtvisitname"]) && $_POST["txtvisitname"]!='')
			$this->visitname   = DoTrim($_POST["txtvisitname"]);
		if(isset($_POST["visitdate"])) 								$this->visitdate   = DoTrim($_POST["visitdate"]);
		if(isset($_POST["visitsummary"])) 							$this->visitsummary   = DoTrim($_POST["visitsummary"]);
		if(isset($_POST["subjectlist"])) 							$this->subjectid   = DoTrim($_POST["subjectlist"]);
		if(isset($_POST['teacherid']) )								$this->teacherid	=	DoTrim($_POST['teacherid']);
		if(isset($_POST['studentid']) )								$this->studentid	=	DoTrim($_POST['studentid']);
		if(isset($_POST['userid']))									$this->Userid	=	DoTrim($_POST['userid']);
		if(isset($_POST['actionid']))								$this->actionid	=	DoTrim($_POST['actionid']);
		if(isset($_POST['msvisitname']))							$this->visitname=	DoTrim($_POST['msvisitname']);
		if(isset($_POST["msvisitid"])) 								$this->msvisitid   = DoTrim($_POST["msvisitid"]);
		if(isset($_POST["keypoints"])) 								$this->keypointsteacher   = DoTrim($_POST["keypoints"]);
		if(isset($_POST["keypoints_maths"])) 						$this->keypointsteacher_maths   = DoTrim($_POST["keypoints_maths"]);
		if(isset($_POST["keypoints_gujarati"])) 					$this->keypointsteacher_gujarati   = DoTrim($_POST["keypoints_gujarati"]);
		if(isset($_POST["computerid"])) 							$this->computerid   = DoTrim($_POST["computerid"]);
	}

	function setgetvars()
	{
		if (isset($_GET['teacherid']) )								$this->teacherid	=	DoTrim($_GET['teacherid']);
		if (isset($_GET['mode']))									$this->mode	=	DoTrim(urldecode($_GET['mode']));
		if (isset($_GET['date']))									$this->chardate	=	DoTrim(urldecode($_GET['date']));
		if (isset($_GET['studentid']))								$this->studentid	=	DoTrim(urldecode($_GET['studentid']));
		if (isset($_GET['userid']))									$this->Userid	=	DoTrim(urldecode($_GET['userid']));
		if (isset($_GET['actionid']))								$this->actionid	=	DoTrim(urldecode($_GET['actionid']));
		if (isset($_GET['subjectid']))								$this->subjectid	=	DoTrim(urldecode($_GET['subjectid']));
		if (isset($_GET['class']))									$this->class	=	DoTrim(urldecode($_GET['class']));
		if (isset($_GET['gender']))									$this->gender	=	DoTrim(urldecode($_GET['gender']));
		if (isset($_GET['visitid']))								$this->visitid	=	DoTrim(urldecode($_GET['visitid']));
		if (isset($_GET['msvisitid']))								$this->msvisitid	=	DoTrim(urldecode($_GET['msvisitid']));
		if(isset($_GET["computerid"])) 								$this->computerid   = DoTrim($_GET["computerid"]);
	}
	
	function setmastervars($schoolcode='',$connid)
	{
		$this->subjectArray = $this->subjectArr($connid);
		$this->teacherArray = $this->teacherArr($schoolcode,$connid);
		$this->actionArray = $this->actionArr($connid);
		$this->eifacultyArray = $this->eifacultyArr($schoolcode,$connid);
		$this->coOrdinateTeachers = $this->coordinatorUsers_func($schoolcode,$connid);
		$this->charArr	= $this->fetchCharacteristics($connid);
		$this->masterusers = $this->masterUsers_func($connid);
		$this->intrvparamArr = $this->getIntrvParametets_func($connid);
	}
	
	function getIntrvParametets_func($connid)
	{
		
		$arr = array();
		$query = "SELECT * from tst_intervention_parameters";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray()) {
			//array_push($arr,$row['userid']);
			$arr[$row['intrvid']] = $row['intrvparam'];
		}
		return $arr;
	}
	
	function masterUsers_func($connid)
	{
		$arr = array();
		$query = "SELECT userid from tst_users WHERE usertype='AD'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray()) {
			array_push($arr,$row['userid']);
		}
		return $arr;
	}

	function fetchSchoolGeneralDetails($schoolcode,$connid)
	{
		$schquery  = "SELECT * FROM ".$this->tst_school_master." WHERE SchoolCode=".$schoolcode."";
		$dbquery = new dbquery($schquery,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	
	function getFullName($userid,$connid)
	{
		$query = "SELECT fullname FROM tst_users WHERE userid='$userid'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['fullname'];
	}
	
	function pageTSTMain($usertype,$connid)
	{
		$schooldetails  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='14'><b>Shiksha Setu Schools</b></td></tr>";
		$schooldetails .= "<tr><th>SrNo</th><th>School Name</th><th>District</th><th>Medium</th></tr>";//<th>School Category</th>
		
		$srno = 1;
		$schquery  = "SELECT * FROM ".$this->tst_school_master." ORDER BY District, Medium, SchoolName";
		$dbquery = new dbquery($schquery,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schooldetails .= "<tr><td align='center'><a href='javascript: schoolprofilepage(".$row['SchoolCode'].")'>".$srno."</a></td><td>".$row['SchoolName']."</td><td align='center'>".$row['District']."</td><td align='center'>".$row['Medium']."</td></tr>";//<td align='center'>".$row['SchoolCategory']."</td>
			$srno++;
		}
		
		$schooldetails .= "</table>";
		return $schooldetails;
	}
	
	function schoolPerformance($schoolcode,$connid)
	{
		$yearArr = $this->getYears($connid);
		$colspan = count($yearArr)+4;
		$schooldetails  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='$colspan'><b>Shiksha Setu School Performance Reports</b></td></tr>";
		$schooldetails .= "<tr><th>SrNo</th><th>School Name</th><th>District</th><th>Medium</th>";
		
		foreach ($yearArr as $year)
		{
			$schooldetails .= "<th>$year</th>";
		}
		$schooldetails .= "<tr>";
		$srno = 1;
		$schquery  = "SELECT * FROM ".$this->tst_school_master." ORDER BY District, Medium, SchoolName";
		$dbquery = new dbquery($schquery,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schooldetails .= "<tr><td align='center'>".$srno."</td><td>".$row['SchoolName']."</td><td align='center'>".$row['District']."</td><td align='center'>".$row['Medium']."</td>";
			foreach ($yearArr as $year)
			{
				$schooldetails .= "<td align='center'><a href='assessmentreports/$year/SchoolReport_".$row['SchoolCode'].".pdf' target=_blank><img title='View Report' src='images/view.png'></a></td>";
			}
			$schooldetails .= "</tr>";
			$srno++;
		}
		
		$schooldetails .= "</table>";
		return $schooldetails;
	}
	
	function editSchoolDetails($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schooldetails .= "";
		$schooldetails  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>Edit School Details</font></b></td></tr>";	
		
		$schooldetails .= "<tr><td><b>School Name: </b></td><td><input name='email' type='text' id='email' value='".$schrow['SchoolName']."' readonly></td></tr>";
		$schooldetails .= "<tr><td><b>Medium: </b></td><td><input name='email' type='text' id='email' value='".$schrow['Medium']."' readonly></td></tr>";
		$schooldetails .= "<tr><td><b>District: </b></td><td><input name='email' type='text' id='email' value='".$schrow['District']."' readonly></td></tr>";
		$schooldetails .= "<tr><td><b>Location: </b></td><td><input name='location' type='text' id='location' value='".$schrow['location']."'></td></tr>";
		$schooldetails .= "<tr><td><b>School Category: </b></td><td><input name='schcategory' type='text' id='schcategory' value='".$schrow['SchoolCategory']."'></td></tr>";
		$schooldetails .= "<tr><td><b>Principal Name: </b></td><td><input name='principal' type='text' id='principal' value='".$schrow['principal_name']."'></td></tr>";
		$schooldetails .= "<tr><td><b>Phone: </b></td><td><input name='phone' type='text' id='phone' value='".$schrow['phone']."'></td></tr>";
		$schooldetails .= "<tr><td><b>Email Address: </b></td><td><input name='email' type='text' id='email' value='".$schrow['email']."'></td></tr>";
		
		
		$schooldetails .= "<tr align=center><td colspan=2><input type=button name=save id=save value=Save onclick='editSchool($schoolcode)'></td></tr>";
		$schooldetails .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'><br>";
		$schooldetails .= "<p align='center'><b><a href='javascript:window.close();'>Close</a></b></p>";
			
		echo $schooldetails;		
	}
	
	function getYears($connid)
	{
		$arr = array();
		$query = "SELECT DISTINCT year FROM tst_assessmentyears ";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{	
			array_push($arr,$row['year']);
		}
		return $arr;
	}
	
	function setSchoolCode()
	{
		$this->setpostvars();
		if($this->schoolcode==0)
			$this->errormsg = "<font color='#FF0000'><b>Invalid school...</b></font>";
		else 
			$_SESSION['schoolcode'] = $this->schoolcode;
	}
	function eifacultySubjectArr_func($schoolcode,$eifaculty,$connid)
	{
		$eifacultySubjectArr = array();
		$query = "SELECT DISTINCT subjectid FROM tst_eifaculty WHERE schoolcode=$schoolcode AND eifacultyid='$eifaculty'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{	
			array_push($eifacultySubjectArr,$row['subjectid']);
		}
		return $eifacultySubjectArr;
	}
	
	function teacherWiseSubjectArr($teacherid,$connid,$grade)
	{
		$condition = '';
		if ($grade!='')
			$condition=" AND class IN ($grade)";
		$teacherWiseSubjectArr = array();
		$query = "SELECT DISTINCT subjectid FROM tst_teacher_subjectclassmapping WHERE teacherid=$teacherid $condition";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{	
			array_push($teacherWiseSubjectArr,$row['subjectid']);
		}
		return $teacherWiseSubjectArr;
	}
	
	function schoolsArr_func($connid)
	{
		$schoolsArr = array();
		$query = "SELECT * FROM tst_school_master ";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$schoolsArr[$row['SchoolCode']] = $row['SchoolName'];
		}
		return $schoolsArr;
	}

	function subjectArr($connid)
	{
		$subArr = array();
		$query = "SELECT * FROM tst_subjectmaster";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$subArr[$row['subjectid']] = $row['subject'];
		}
		return $subArr;
	}
	
	function teacherArr($schoolcode,$connid)
	{
		$teacherArr = array();
		$query = "SELECT * FROM tst_teachermaster WHERE SchoolCode=$schoolcode AND status='A'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$teacherArr[$row['teacherid']][$schoolcode] = $row['name'];
		}
		return $teacherArr;
	}
	
	function actionArr($connid)
	{
		$actionArr = array();
		$query = "SELECT * FROM tst_actionpoints_master WHERE status='A'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$actionArr[$row['subjectid']][$row['actionid']] = $row['actionpoint'];
			//$actionArr['actionid'][$row['actionid']]=$row['actionpoint'];
		}
		return $actionArr;
	}
	
	function teachertoactionArr($teacherid,$subjectid,$connid)
	{
		$teachertoactionArr = array();
		$query = "SELECT a.* FROM tst_teachertoaction a, tst_actionpoints_master b WHERE a.teacherid=$teacherid AND b.subjectid=$subjectid AND a.actionid=b.actionid";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			//$teachertoactionArr[$row['teacherid']] = $row['actionid'];
			array_push($teachertoactionArr,$row['actionid']);
		}
		return $teachertoactionArr;
	}
	
	function eifacultyArr($schoolcode,$connid)
	{
		$eifacultyArr[$schoolcode] = array();
		$query = "SELECT * FROM tst_eifaculty WHERE SchoolCode=$schoolcode";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$eifacultyArr[$row['subjectid']]=$row['eifacultyid'];
		}
		return $eifacultyArr;
	}
	
	function fetchCharacteristics($connid)
	{
		$charArr = array();
		$query = "SELECT * FROM  tst_characteristics ";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			//array_push($charArr,$row['teacherid']);
			$charArr[$row['charid']] = $row['chardescription'];
		}
		return $charArr;
	}
	
	function coordinatorUsers_func($schoolcode,$connid)
	{
		$users = array();
		$query = "SELECT DISTINCT eifacultyid FROM tst_eifaculty WHERE SchoolCode=$schoolcode AND subjectid=0";
		$dbquery = new dbquery($query,$connid);
		while ($row=$dbquery->getrowarray()) 
		{
			array_push($users,$row['eifacultyid']);
		}
		return $users;
	}
	
	function fetchSchoolVisits($schoolcode,$userid,$connid,$usertype)
	{
		$this->setpostvars();
		$this->setmastervars($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		if (in_array($userid,$this->masterusers))
			$colspan= '6';
		else 
			$colspan= '5';
			
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schooldetails  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='$colspan'><b>School Visits</b></td></tr>";
		if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
			$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='$colspan'><b><a style='color:white' href='tst_allSchoolVisits.php' target='_blank'>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</a></b></td></tr>";
		else 
			$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='$colspan'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		$schooldetails .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Visit Name</b></td><td align='center'><b>Visit Date</b></td><td align='center'><b>Visit Summary</b></td><td align='center'><b>Entered By</b></td>";
		$schooldetails .= "<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		if (in_array($userid,$this->masterusers))
			$schooldetails .= "<td><b>Actions</b></td>";
		$schooldetails .= "</tr>";
		
		$srno = 1;
		//$schquery  = "SELECT * FROM tst_schoolvisitmaster WHERE schoolcode=".$schoolcode." ORDER BY visitdate DESC";
		$schquery  = "SELECT * FROM tst_schoolvisitmaster WHERE schoolcode=".$schoolcode." ORDER BY visitid";
		$dbquery = new dbquery($schquery,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schooldetails .= "<tr><td align='center'><a href='javascript: viewschoolvisit(".$row['visitid'].")'>".$srno."</a></td><td>".$row['visitname']."</td><td align='center' nowrap>".formatDate($row['visitdate'])."</td><td>".$row['visit_summary']."</td><td>".$this->getFullName($row['enteredby'],$connid)."</td>";
			if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
				$schooldetails .= "<td align='center'><img src='images/delete.png' onclick='return deleteVisit(".$row['visitid'].");'>  |  <img title='View Log' src='images/view.png' onclick=javascript:browse_window(".$row['visitid'].",11);></td>";
			$schooldetails .= "</tr>";
			$srno++;
		}
		if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{
			$schooldetails .= "<tr><td align='center' colspan='$colspan'><a href='tst_addSchoolVisit.php'><b>Add New School Visit</b></td></tr></a>";
		}
		$schooldetails .= "</table>";
		
		
		if($this->visitid!=0)
		{
			$_SESSION['visitid'] = $this->visitid;
			//visit view log - added on 9/5/2012
			$query="INSERT INTO  tst_visitviewlog SET visitid='$this->visitid',viewedby='$userid',viewedon=now(),visittype='TS'";
			$dbquery = new dbquery($query,$connid);
			
			
			if($this->actiontoperform == "Delete Visit")
			{
				$query = "DELETE FROM tst_schoolvisitmaster WHERE visitid=$this->visitid";
				$dbquery = new dbquery($query,$connid);
				$query = "DELETE FROM tst_actionpoints_details WHERE visitid=$this->visitid";
				$dbquery = new dbquery($query,$connid);
				$query = "DELETE FROM tst_schoolvisit_generalreport WHERE visitid=$this->visitid";
				$dbquery = new dbquery($query,$connid);
				$query = "DELETE FROM tst_visitparameter_details WHERE visitid=$this->visitid AND visittype='TR'";
				$dbquery = new dbquery($query,$connid);
				$query = "DELETE FROM tst_classroomobservation_demolesson WHERE visitid=$this->visitid";
				$dbquery = new dbquery($query,$connid);
				echo "<script>redirectPage('tst_schoolVisits.php');</script>";
			}
			else 
			{
				$schvisitrow = $this->fetchSchoolVisitDetails($this->visitid,$connid);
				$enteredDate = explode(" ",$schvisitrow['enteredon']);
				$enteredDate = $enteredDate[0];
				$today = date("Y-m-d");
				$dateDiff= abs(strtotime($today)) - strtotime($enteredDate);
				/*echo $enteredDate;
				echo $today;
				echo "<br>".$dateDiff/(24*60*60);*/

				$schooldetails .= "<br><table width='100%'border=1 style='border-collapse: collapse' align='center'>";
				if(($dateDiff/(24*60*60)<=$this->dateDifference))
					$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>Visit - <a style='color:white' href='tst_addSchoolVisitDetails.php?mode=update'>".$schvisitrow['visitname']." (".formatDate($schvisitrow['visitdate']).")</a></font></b></td></tr>";
				else 
					$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>Visit - ".$schvisitrow['visitname']." (".formatDate($schvisitrow['visitdate']).")</font></b></td></tr>";
				$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td align='center'><b>Visit Parameter</b></td><td align='center'><b>Yes/No</b></td>";
				$schooldetails .= "<td><b>Duration</b></td><td><b>Discussion</b></td><td><b>Other Members Present</b></td></tr>";
				$parameterDetails = $this->fetchVisitParameters($connid);
				
				$srno = 1;
				$query="SELECT a.*,b.* FROM tst_visitparameter_details a,tst_schoolvisitmaster b WHERE a.visitid='$this->visitid' AND a.visitid=b.visitid AND a.visittype='TR'";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					if ($row['paramid']==3 || $row['paramid']==5 || $row['paramid']==6)
						continue;
						
					if($row['paramflag']=='Y')
						$row['paramflag']="Yes";
					if($row['paramflag']=='N')
						$row['paramflag']="No";
						
					$duration='';
					$comments='';
					$teacherNames = '';
					$teachersPresentArr = '';
					$sr = 1;
					
					if ($row['paramid']==1)
					{
						$duration=$row['principal_duration'];
						$comments=$row['principal_discussion'];
						$teacherNames = 'NA';
					}
					elseif ($row['paramid']==2)
					{
						$duration=$row['coreteam_duration'];
						$comments=$row['coreteam_discussion'];
						$teachersPresentArr = explode(",",$row['coreteamteachers_present']);
						if(count($teachersPresentArr)>=1)
						{
							foreach ($teachersPresentArr as $teacherid)
							{
								if ($teacherid!='')
								{
									$teacherNames .= "$sr. ".$this->teacherArray[$teacherid][$schoolcode]."<br>";
									$sr++;
								}
							}
						}
					}
					elseif ($row['paramid']==4)
					{
						$duration=$row['groupteam_duration'];
						$comments=$row['groupteam_discussion'];
						$teachersPresentArr = explode(",",$row['groupteam_present']);
						//print_r($teachersPresentArr);
						if(count($teachersPresentArr)>=1)
						{
							foreach ($teachersPresentArr as $teacherid)
							{
								if ($teacherid!='')
								{
									$teacherNames .= "$sr. ".$this->teacherArray[$teacherid][$schoolcode]."<br>";
									$sr++;
								}
							}
						}
					}
					if ($duration=='0')
						$duration='';
					
					$schooldetails .= "<tr><td align='center'>$srno</td><td>".$parameterDetails[$row['paramid']]."</td><td align='center'>".$row['paramflag']."</td>";
					$schooldetails .= "<td align='center'>".$duration."</td><td>$comments</td><td>$teacherNames</td></tr>";
					$srno++;
				}
				$schooldetails .= "</table><br>";
				
				$srnoCO = 0;
				$query=" SELECT a.paramid,a.paramflag,b.* FROM tst_visitparameter_details a,tst_classroomobservation_demolesson b WHERE a.visitid='$this->visitid' AND a.visittype='TR' AND a.visitid=b.visitid AND a.paramid IN (5) AND b.isCODL='CO'";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					if ($srnoCO==0)
					{
						$parameterDetails = $this->fetchVisitParameters($connid);
						$paramflag = $parameterDetails[$row['paramid']];
						$schooldetails .= "<table width='100%'border=1 style='border-collapse: collapse' align='center'>";
						$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='10'><font color='#FFFFFF'><b>".$paramflag."</font></b></td></tr>";
						$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>Class</b></td><td><b>Section</b></td>";
						$schooldetails .= "<td><b>Subject</b></td><td><b>Teacher Name</b></td><td><b>Which Lesson</b></td>";
						$schooldetails .= "<td><b>From Time</b></td><td><b>To Time</b></td><td><b>Comments</b></td><td><b>Added By</b></td></tr>";
						$srnoCO++;
					}
					//print_r($this->teacherArray[$row['teacherid']]);	
					$schooldetails .= "<tr><td align='center'>$srnoCO</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
					$schooldetails .= "<td align='center'>".$this->subjectArray[$row['subjectid']]."</td><td>".$this->teacherArray[$row['teacherid']][$schoolcode]."</td><td>".$row['whichlesson']."</td>";
					$schooldetails .= "<td align='center'>".$row['from_time']."</td><td align='center'>".$row['to_time']."</td><td>".$row['comments']."</td><td nowrap>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
					$srnoCO++;
				}
				
				$srnoDL = 0;
				$query=" SELECT a.paramid,a.paramflag,b.* FROM tst_visitparameter_details a,tst_classroomobservation_demolesson b WHERE a.visitid='$this->visitid' AND a.visittype='TR' AND a.visitid=b.visitid AND a.paramid IN (6) AND b.isCODL='DL'";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					if ($srnoDL==0)
					{
						$parameterDetails = $this->fetchVisitParameters($connid);
						$paramflag = $parameterDetails[$row['paramid']];
						$schooldetails .= "</table><br><table width='100%'border=1 style='border-collapse: collapse' align='center'>";
						$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='10'><font color='#FFFFFF'><b>".$paramflag."</font></b></td></tr>";
						$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>Class</b></td><td><b>Section</b></td>";
						$schooldetails .= "<td><b>Subject</b></td><td><b>Teacher Name</b></td><td><b>Which Lesson</b></td>";
						$schooldetails .= "<td><b>From Time</b></td><td><b>To Time</b></td><td><b>Comments</b></td><td><b>Added By</b></td></tr>";
						$srnoDL++;
					}
					
					$schooldetails .= "<tr><td align='center'>$srnoDL</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
					$schooldetails .= "<td align='center'>".$this->subjectArray[$row['subjectid']]."</td><td>".$this->teacherArray[$row['teacherid']][$schoolcode]."</td><td>".$row['whichlesson']."</td>";
					$schooldetails .= "<td align='center'>".$row['from_time']."</td><td align='center'>".$row['to_time']."</td><td>".$row['comments']."</td><td nowrap>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
					$srnoDL++;
				}
				
				$schooldetails .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
				if ((in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers)) && ($dateDiff/(24*60*60)<=$this->dateDifference))
					$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>".$schvisitrow['visitname']." - <a style='color:white;' href='tst_taskDetails.php?mode=update'>Task Details</a></font></b></td></tr>";
				else 
					$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>".$schvisitrow['visitname']." - Task Details</font></b></td></tr>";
				
				$schooldetails .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Task</b></td><td align='center'><b>Planned Sub Tasks</b></td><td align='center'><b>Planned Sub Tasks - Done Details</b></td><td align='center'><b>Planned But Not Done</b></td><td align='center'><b>Tasks Not Planned But Done</b></td></tr>";
				
				$srno = 1;
				$schquery  = "SELECT b.*, a.* FROM tst_schoolvisittaskmaster as a, tst_schoolvisit_generalreport as b WHERE visitid=".$this->visitid." AND a.taskid=b.taskid ORDER BY b.taskid,b.subtaskid";
				//echo $schquery;
				$dbquery = new dbquery($schquery,$connid);
				while($row = $dbquery->getrowarray())
				{
					$subtasksArr = $this->fetchVisitSubTasks($row['taskid'],$connid);
					//print_r($subtasksArr);
					$schooldetails .= "<tr><td align='center'>".$srno."</td><td>".$row['task']."</td><td>".$subtasksArr[$row['subtaskid']][$row['taskid']]."</td><td>".$row['plannedsubtasks_donedetails']."</td><td>".$row['plannedbutnotdone']."</td><td>".$row['tasksnotplannedbutdone']."</td></tr>";
					$srno++;
				}
				
				$schooldetails .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
				if ($dateDiff/(24*60*60)<=$this->dateDifference) //(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers)) && 
					$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='5'><font color='#FFFFFF'><b>".$schvisitrow['visitname']." - <a style='color:white;' href='tst_actionPointDetails.php?mode=update'>Teacher Wise Action Points</a></font></b></td></tr>";
				else
					$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='5'><font color='#FFFFFF'><b>".$schvisitrow['visitname']." - Teacher Wise Action Points</font></b></td></tr>";
				
				foreach ($this->teacherArray as $teacherid=>$teacher)
				{
					$teacherWiseSubArr = $this->teacherWiseSubjectArr($teacherid,$connid);
					foreach ($teacherWiseSubArr as $subjectid)
					{	
						//print_r($this->eifacultyArray);
						$grade = $this->getGrade($teacherid,$connid,$subjectid);
						$faculty = $this->getFullName($this->eifacultyArray[$subjectid],$connid);
						$facultyid = $this->eifacultyArray[$subjectid];
						$subject = $this->subjectArray[$subjectid];
						$duration = $this->getDuration($this->visitid,$teacherid,$facultyid,$connid);
						
						$query = "SELECT * FROM tst_actionpoints_details WHERE visitid=$this->visitid AND teacherid=$teacherid AND subjectid=$subjectid AND classes='$grade' ORDER BY actionid";
						$dbquery = new dbquery($query,$connid);
						if ($dbquery->numrows()>0)
						{
						
							$schooldetails .= "<tr bgcolor='".$this->logocolor3."' align='center'><td colspan='4'><b>Teacher:</b> $teacher[$schoolcode] &nbsp;&nbsp;&nbsp;<b>Subject:</b> ".$subject."&nbsp;&nbsp;&nbsp;<b>Grade:</b> $grade&nbsp;&nbsp;&nbsp;<b>EI Faculty:</b> ".$faculty."&nbsp;&nbsp;&nbsp;<b>Duration (mins):</b> ".$duration."</td></tr>";
							$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>ActionPoints</b></td><td><b>Status/Steps taken</b></td></tr>";
							$srno=1;
						
							/*$teacherToActionArr = $this->teachertoactionArr($teacherid,$subjectid,$connid);
							foreach ($teacherToActionArr as $actionid)
							*/
							while ($row = $dbquery->getrowarray())
							{
								$actionid = $row['actionid'];
								$schooldetails .= "<tr><td  align='center'>".$srno."</td><td>".$this->actionArray[$subjectid][$actionid]."</td>";
								//$detailsarr = $this->fetchActionDetails($this->visitid,$teacherid,$actionid,$connid);
								//$details = explode("~",$detailsarr[$this->visitid][$teacherid][$actionid]);
								$date = $row['date'];
								$stepstaken = $row['stepstaken'];
								/*if ($date == '0000-00-00')
									$schooldetails .= "<td nowrap>&nbsp;</td>";
								else
									$schooldetails .= "<td nowrap>".formatDate($date)."</td>";*/
								$schooldetails .= "<td width='50%'>$stepstaken</td></tr>";
								$srno++;
							}
						}
					}
				}
				$schooldetails .= "</table>";
			}
		}
		return $schooldetails;
	}
	
	function getDuration($visitid,$teacherid,$faculty,$connid)
	{
		$query = "SELECT duration FROM tst_actionpoints_details WHERE visitid=$visitid AND teacherid=$teacherid AND eifacultyid='$faculty' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['duration'];
	}
	
	function fetchActionDetails($visitid,$teacherid,$actionid,$connid)
	{
		$actionDetailsArr = array();
		$query = "SELECT date,stepstaken FROM  tst_actionpoints_details WHERE visitid=$visitid AND teacherid=$teacherid AND actionid=$actionid";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$actionDetailsArr[$visitid][$teacherid][$actionid] = $row['date']."~".$row['stepstaken'];
		}
		return $actionDetailsArr;
	}
	
	function fetchSchoolVisitDetails($visitid,$connid)
	{
		$schquery  = "SELECT * FROM tst_schoolvisitmaster WHERE visitid=".$visitid."";
		$dbquery = new dbquery($schquery,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	
	function getVisitNames($connid)
	{
		$visitArr = array();
		$query = "SELECT DISTINCT visitname FROM tst_schoolvisitmaster ORDER BY visitname";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			array_push($visitArr,$row['visitname']);
		}
		return $visitArr;
	}
	
	function addNewVisit($schoolcode,$connid)
	{
		$this->setpostvars();
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		
		$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>Add School Visit</b></td></tr>";
		$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		//$outputstr="<table align='center' border='1' cellspacing='0' cellpadding='2'>";
		$outputstr.="<tr><td>Visit Name:</td><td><select name='visitname' id='visitname' onchange='javascript:addNewVisitName();'><option value=''>Select</option>";
		$visitarr = $this->getVisitNames($connid);
		foreach ($visitarr as $visitname)
		{
			$outputstr.="<option value='$visitname'>$visitname</option>";
		}
		$outputstr.="<option value='other'>Other</option>";
		$outputstr.="</select><input type='text' name='txtvisitname' id='txtvisitname' style='display:none'>";
		//$outputstr.="<a id='link' href='javascript:addNewVisitName();'>Add New Name</a></td></tr>";
		$outputstr.="<tr><td>Visit Date: </td><td><input name='visitdate' type='text' id='visitdate' onfocus='showCalendarControl(this);' value='".$_POST['visitdate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
		$outputstr.="<tr><td>Visit Summary: </td><td><textarea rows='3' cols='25' name='visitsummary' value='".$_POST['visitsummary']."'></textarea></td></tr>";
		
		$visitparams = $this->fetchVisitParameters($connid);
		foreach ($visitparams as $paramid => $visit_parameter)
		{
				$outputstr.="<tr><td>".$visit_parameter.": </td>";
				$outputstr.="<td><input type='radio' name='".$paramid."' value='Y' checked>Yes";
				$outputstr.="<input type='radio' name='".$paramid."' value='N'>No</td></tr>";
		}
		$outputstr.="<tr><td colspan='2' align='center'><input type='button' name='Save' id='Save'  class='button' value='Save' onclick='return addVisitDetails()'></td></tr></table>";
		$outputstr.="<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		return $outputstr;
	}
	
	function getTecherid($schoolcode,$subjectid,$section,$class,$connid)
	{
		$query="SELECT a.teacherid as id FROM tst_teacher_subjectclassmapping a,tst_teachermaster b WHERE b.schoolcode=$schoolcode AND a.subjectid=$subjectid AND a.section='$section' AND a.class='$class' AND a.teacherid=b.teacherid";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['id'];
	}
	
	function insertVisitDetails($schoolcode,$userid,$connid,$sessionvisitid,$mode)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		if($this->actiontoperform == "Insert Visit")
		{
			$visitdate = formatDate($this->visitdate);
			$query="INSERT INTO tst_schoolvisitmaster SET SchoolCode=$schoolcode,visitname='".$this->visitname."',visitdate='".$visitdate."',visit_summary='".$this->visitsummary."',enteredon=CURDATE(),enteredby='$userid'";
			$dbquery = new dbquery($query,$connid);
			$visitid = mysql_insert_id($connid);
			$_SESSION['visitid'] = $visitid;
			
			//Parameter Entry
			$parameterArr = $this->fetchVisitParameters($connid);
			foreach ($parameterArr as $key => $value)
			{
				$this->insertVisitParameter($visitid,$key,$_POST[$key],$connid);
			}
			//Tasks Entry
			$tasksArr = $this->fetchVisitTasks($connid);
			foreach ($tasksArr as $key=>$value)
			{
				/*$subtasksArr = $this->fetchVisitSubTasks($key,$connid);
				foreach ($subtasksArr as $subtaskid=>$subtasks)
				{
					$pstd = "";
					$tpbnd = "";
					$tnpbd = "";
					$this->insertVisitTask($visitid,$key,$subtaskid,$pstd,$tpbnd,$tnpbd,$connid,$this->actiontoperform);
				}*/
				$subtaskid="";
				$pstd = "";
				$tpbnd = "";
				$tnpbd = "";
				$this->insertVisitTask($visitid,$key,$subtaskid,$pstd,$tpbnd,$tnpbd,$connid,$this->actiontoperform);
			}
			//Actions Entry
			foreach ($this->teacherArray as $teacherid=>$teacherArr)
			{
				$teacherWiseSubArr = $this->teacherWiseSubjectArr($teacherid,$connid);
				foreach ($teacherWiseSubArr as $subjectid)
				{	
					//print_r($this->eifacultyArray);
					$grade = $this->getGrade($teacherid,$connid,$subjectid);
					$faculty = $this->eifacultyArray[$subjectid];
					$subject = $this->subjectArray[$subjectid];
					$teacherToActionArr = $this->teachertoactionArr($teacherid,$subjectid,$connid);
					
					foreach ($teacherToActionArr as $actionid)
					{
						$duration = "";
						$steps = "";
						$this->insertVisitActions($visitid,$teacherid,$faculty,$actionid,$subjectid,$grade,$steps,$duration,$connid,$this->actiontoperform);
					}
				}
			}
			echo "<script>redirectPage('tst_addSchoolVisitDetails.php');</script>";
		}
		elseif ($this->actiontoperform == "Insert Visit Details")
		{
			$parameterArr = $this->getVisitParameterDetails($sessionvisitid,$connid);
			$coreTeachersArr = $this->fetchCoreTeam($schoolcode,$connid);
			$allTeachers = $this->teacherArray;
			if (isset($_POST['visitsummary']))
			{
				$summary_query = "UPDATE  tst_schoolvisitmaster SET visit_summary='".$_POST['visitsummary']."' WHERE visitid=$sessionvisitid";
				$dbquery = new dbquery($summary_query,$connid);
			}
			
			
			foreach ($parameterArr as $paramid=>$paramflag)
			{
				if(in_array($userid,$this->coOrdinateTeachers))
				{
					if ($paramid==1 && $paramflag == 'Y')
					{
						$update_query = "UPDATE  tst_schoolvisitmaster SET ";
						if (isset($_POST['DurationPrincipal']) && $_POST['DurationPrincipal']!='')
							$update_query.= " principal_duration=".$_POST['DurationPrincipal'].",";
						if (isset($_POST['DiscussionPrincipal']) && $_POST['DiscussionPrincipal']!='')
							$update_query.="principal_discussion='".$_POST['DiscussionPrincipal']."',";
							
						$update_query = substr($update_query,0,-1);
						$update_query.=" WHERE visitid='$sessionvisitid'";
						//echo "<br>".$update_query;
						$dbquery = new dbquery($update_query,$connid);
					}
					if (($paramid==2 && $paramflag == 'Y') || ($paramid==4 && $paramflag == 'Y'))
					{
						$update_query = "UPDATE  tst_schoolvisitmaster SET ";
						
						$coreTeachers = '';
						$duration = '';
						$comment = '';
						
						if ($paramid==2)
							$isCTGT = 'CT';
						if ($paramid==4)
							$isCTGT = 'GT';
						
						if (isset($_POST[$isCTGT.'DurationCore']) && $_POST[$isCTGT.'DurationCore']!='')
							$duration=$_POST[$isCTGT.'DurationCore'];
							//$update_query.= "coreteam_duration=".$_POST[$isCTGT.'DurationCore'].",";
						if (isset($_POST[$isCTGT.'DiscussionCore']) && $_POST[$isCTGT.'DiscussionCore']!='')
							$comment = $_POST[$isCTGT.'DiscussionCore'];
							//$update_query.="coreteam_discussion='".$_POST[$isCTGT.'DiscussionCore']."',";
						
						$no = 1;
						if ($paramid==2)
						{
							foreach ($coreTeachersArr as $teacherid)
							{
								if (isset($_POST[$isCTGT."teacher".$no]) && $_POST[$isCTGT."teacher".$no]=='on')
									$coreTeachers .= $teacherid.",";
									
								$no++;
							}
						}
						elseif ($paramid==4)
						{
							foreach ($allTeachers as $teacherid=>$teacher)
							{
								if (isset($_POST[$isCTGT."teacher".$no]) && $_POST[$isCTGT."teacher".$no]=='on')
									$coreTeachers .= $teacherid.",";
									
								$no++;
							}
						}
						$coreTeachers = substr($coreTeachers,0,-1);
						if ($paramid==2)
							$update_query.="coreteam_duration='$duration',coreteam_discussion='$comment',coreteamteachers_present='$coreTeachers',";
						if ($paramid==4)
							$update_query.="groupteam_duration='$duration',groupteam_discussion='$comment',groupteam_present='$coreTeachers',";
						
						$update_query = substr($update_query,0,-1);
						$update_query.=" WHERE visitid=$sessionvisitid";
						//echo "<br>".$update_query;
						$dbquery = new dbquery($update_query,$connid);
					}
				}
				if (($paramid==5 && $paramflag == 'Y') || ($paramid==6 && $paramflag == 'Y'))
				{
					$insert_query='';
					if($paramid==5)
						$isCODL='CO';
					if($paramid==6)
						$isCODL='DL';
						
					$condition='';
					//if (!in_array($userid,$coOrdinateTeachers) && !in_array($userid,$this->masterusers))
					$condition = " AND enteredby='".$userid."'";
					
					$query = "DELETE FROM tst_classroomobservation_demolesson WHERE visitid=$sessionvisitid AND isCODL='$isCODL' $condition";
					$dbquery = new dbquery($query,$connid);
					
					for ($i=1;$i<=$this->counterCO;$i++)
					{
						$insert_query = "INSERT INTO tst_classroomobservation_demolesson SET visitid=$sessionvisitid,";
						if (isset($_POST[$isCODL.'class'.$i]) && $_POST[$isCODL.'class'.$i]!='')
							$insert_query.="class=".$_POST[$isCODL.'class'.$i].",";
						
						if (isset($_POST[$isCODL.'section'.$i]) && $_POST[$isCODL.'section'.$i]!='')
							$insert_query.="section='".$_POST[$isCODL.'section'.$i]."',";
						
						if (isset($_POST[$isCODL.'subject'.$i]) && $_POST[$isCODL.'subject'.$i]!='')
							$insert_query.="subjectid=".$_POST[$isCODL.'subject'.$i].",";
						
						if ($_POST[$isCODL.'class'.$i]!='' && $_POST[$isCODL.'section'.$i]!='' && $_POST[$isCODL.'subject'.$i]!='')
						{
							$saveTeacherid = $this->getTecherid($schoolcode,$_POST[$isCODL.'subject'.$i],$_POST[$isCODL.'section'.$i],$_POST[$isCODL.'class'.$i],$connid);
						}
						
						if (isset($_POST[$isCODL.'teacherName'.$i]) && $_POST[$isCODL.'teacherName'.$i]!='')
							$insert_query.="teacherid=".$saveTeacherid.",";
						
						if (isset($_POST[$isCODL.'lesson'.$i]) && $_POST[$isCODL.'lesson'.$i]!='')
							$insert_query.="whichlesson='".$_POST[$isCODL.'lesson'.$i]."',";
						
						if (isset($_POST[$isCODL.'hh'.$i]) && $_POST[$isCODL.'hh'.$i]!='' && isset($_POST[$isCODL.'mm'.$i]) && $_POST[$isCODL.'mm'.$i]!='')
							$insert_query.="from_time='".$_POST[$isCODL.'hh'.$i].":".$_POST[$isCODL.'mm'.$i].":00',";
						
						if (isset($_POST[$isCODL.'durationhh'.$i]) && $_POST[$isCODL.'durationhh'.$i]!='' && isset($_POST[$isCODL.'durationmm'.$i]) && $_POST[$isCODL.'durationmm'.$i]!='')
							$insert_query.="to_time='".$_POST[$isCODL.'durationhh'.$i].":".$_POST[$isCODL.'durationmm'.$i].":00',";
						
						if (isset($_POST[$isCODL.'comments'.$i]) && $_POST[$isCODL.'comments'.$i]!='')
							$insert_query.="comments='".$_POST[$isCODL.'comments'.$i]."',";
						
						if ($paramid==5)
							$insert_query.="isCODL='$isCODL',enteredby='".$userid."'";
						if ($paramid==6)
							$insert_query.="isCODL='$isCODL',enteredby='".$userid."'";
							
						if ($_POST[$isCODL.'class'.$i]!='' && $_POST[$isCODL.'section'.$i]!='' && $_POST[$isCODL.'subject'.$i]!='')
						{
							//$insert_query = substr($insert_query,0,-1);
							//echo "<br>".$insert_query;
							$dbquery = new dbquery($insert_query,$connid);
						}
					}
				}
			}
			
			$sr=1;
			foreach ($parameterArr as $paramid=>$paramflag)
			{
				if(isset($_POST[$paramid.$sr]) && $_POST[$paramid.$sr]!="")
				{
					$postflag=$_POST[$paramid.$sr];
					$updtParamquery = "UPDATE tst_visitparameter_details SET paramflag='".$postflag."' WHERE paramid=$paramid AND visitid=$sessionvisitid";
					//echo "<br>$updtParamquery";
					$dbquery = new dbquery($updtParamquery,$connid);
					if ($dbquery)
					{
						if ($paramid==1 && $postflag == 'N')
						{
							$upd_query = "UPDATE tst_schoolvisitmaster SET principal_duration='',principal_discussion='' WHERE visitid=$sessionvisitid";
							//echo "<br>$upd_query";
							$dbquery = new dbquery($upd_query,$connid);
						}
						if ($paramid==2 && $postflag == 'N')
						{
							$upd_query = "UPDATE tst_schoolvisitmaster SET coreteam_duration='',coreteam_discussion='',coreteamteachers_present='' WHERE visitid=$sessionvisitid";
							//echo "<br>$upd_query";
							$dbquery = new dbquery($upd_query,$connid);
						}
						if ($paramid==3 && $postflag == 'N')
						{
							$upd_query = "UPDATE tst_schoolvisitmaster SET groupteam_duration='',groupteam_discussion='',groupteam_present='' WHERE visitid=$sessionvisitid";
							//echo "<br>$upd_query";
							$dbquery = new dbquery($upd_query,$connid);
						}
						if (($paramid==5 || $paramid==6) && $postflag=='N')
						{
							$CODL='';
							if ($paramid==5)
								$CODL='CO';
							elseif ($paramid==6)
								$CODL='DL';
							$delete_query = "DELETE FROM tst_classroomobservation_demolesson WHERE visitid=$sessionvisitid AND isCODL='$CODL'";
							//echo "<br>$delete_query";
							$dbquery = new dbquery($delete_query,$connid);
						}
					}
					$sr++;
				}
			}
			//exit;
			
			if ($this->mode=='update')
				echo "<script>redirectPage('tst_schoolVisits.php');</script>";
			else
				echo "<script>redirectPage('tst_taskDetails.php');</script>";
		}
		elseif($this->actiontoperform == "Insert Task")
		{
			/*echo "VI - ".$sessionvisitid;
			echo "Data is saved..";*/
			$tasksArr = $this->fetchVisitTasks($connid);
			foreach ($tasksArr as $key=>$value)
			{
				$subtasksArr = $this->fetchVisitSubTasks($key,$connid);
				/*foreach ($subtasksArr as $subtaskid=>$subtasks)
				{
					$pstd = $key."1";
					$tpbnd = $key."2";
					$tnpbd = $key."3";
					$this->insertVisitTask($sessionvisitid,$key,$subtaskid,$_POST[$pstd],$_POST[$tpbnd],$_POST[$tnpbd],$connid,$this->actiontoperform);
				}*/
				$subtaskid = $_POST['task'.$key];
				$pstd = $key."1";
				$tpbnd = $key."2";
				$tnpbd = $key."3";
				$this->insertVisitTask($sessionvisitid,$key,$subtaskid,$_POST[$pstd],$_POST[$tpbnd],$_POST[$tnpbd],$connid,$this->actiontoperform);
			}
			if ($this->mode=='update')
				echo "<script>redirectPage('tst_schoolVisits.php');</script>";
			else
				echo "<script>redirectPage('tst_actionPointDetails.php');</script>";
		}
		elseif ($this->actiontoperform == "Insert Actions")
		{
			//print_r($_POST);
			$dur = 1;
			foreach ($this->teacherArray as $teacherid=>$teacherArr)
			{
				$teacherWiseSubArr = $this->teacherWiseSubjectArr($teacherid,$connid);
				//$eifacultySubjectArr = $this->eifacultySubjectArr_func($schoolcode,$userid,$connid);
				foreach ($teacherWiseSubArr as $subjectid)
				{	
					/*echo $teacherid;
					print_r($teacherArr);*/
					$grade = $this->getGrade($teacherid,$connid,$subjectid);
					$faculty = $this->eifacultyArray[$subjectid];
					$subject = $this->subjectArray[$subjectid];
					$teacherToActionArr = $this->teachertoactionArr($teacherid,$subjectid,$connid);
					//print_r($teacherToActionArr);
					//if($faculty==$userid || in_array($userid,$this->masterusers))
					if($faculty==$userid)
					{
						$delquery = "DELETE FROM tst_actionpoints_details WHERE visitid=$sessionvisitid AND teacherid=$teacherid AND subjectid=$subjectid";
						$dbquery = new dbquery($delquery,$connid);
						
						$duration = $_POST["duration".$dur.$teacherid];
						foreach ($teacherToActionArr as $actionid)
						{
							//$date = formatDate($_POST['date'.$teacherid.$actionid]);
							$steps = $_POST['steps'.$teacherid.$actionid];
							if(isset($_POST['steps'.$teacherid.$actionid]))
								$this->insertVisitActions($sessionvisitid,$teacherid,$faculty,$actionid,$subjectid,$grade,$steps,$duration,$connid,$this->actiontoperform);
						}
						$dur++;
					}
				}
			}
			echo "<script>redirectPage('tst_schoolVisits.php');</script>";
		}
		elseif ($this->actiontoperform == "Insert Mapping")
		{
			//echo "mappping saved..";
			$teacherid = $this->teacherid;
			//echo $teacherid;
			$query="DELETE FROM tst_teacher_subjectclassmapping WHERE teacherid=$teacherid";
			$dbquery = new dbquery($query,$connid);
			
			foreach ($this->subjectArray as $subjectid=>$subject)
			{
				//for ($cls=$this->minClass;$cls<=$this->maxClass;$cls++)
				foreach ($this->classArr as $cls)
				{
					foreach ($this->sectionArray as $section)
					{
						$map = $_POST[$teacherid."_".$subjectid."_".$cls."_".$section];
						if(isset($map) && $map=='on')
						{
							//echo "<br>set";
							$query="INSERT INTO tst_teacher_subjectclassmapping SET teacherid=$teacherid,subjectid=$subjectid,class='$cls',section='$section',mappedby='$userid'";
							//echo "<br>".$query;
							$dbquery = new dbquery($query,$connid);
						}
					}
				}
				//$outputStr .= "</tr>";
			}
			echo "<script>window.opener.location.reload(true);window.close();</script>";
		}
		elseif ($this->actiontoperform == "Save ActionPoints")
		{
			//echo "Action Point mappping saved..";
			$teacherid = $this->teacherid;
			//echo $teacherid;
			
			$query="SELECT GROUP_CONCAT(actionid) as actions FROM tst_actionpoints_master WHERE subjectid=$this->subjectid AND status='A'";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray($dbquery);
			$actionids = $row['actions'];
			
			$query="DELETE FROM tst_teachertoaction WHERE teacherid=$this->teacherid AND actionid IN ($actionids)";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			
			foreach ($this->actionArray[$this->subjectid] as $actionid=>$action)
			{
				$checkaction = $_POST[$teacherid."_".$this->subjectid."_".$actionid];
				if (isset($checkaction) && $checkaction=='on')
				{
					$query="INSERT INTO tst_teachertoaction SET teacherid=$teacherid,actionid=$actionid,mappedby='$userid'";
					//echo "<br>".$query;
					$dbquery = new dbquery($query,$connid);
				}
			}
			echo "<script>selfClose('".$teacherid."');</script>";
			echo "<script>window.opener.document.userlogin.submit();window.close();</script>";
		}
		elseif ($this->actiontoperform == "Map Teachers")
		{
			$query="UPDATE tst_teachermaster SET coreteammember='' WHERE schoolcode=$schoolcode";
			$dbquery = new dbquery($query,$connid);
			
			$teacherArr = $this->teacherArray;
			foreach ($teacherArr as $teacherid=>$nameArr)
			{
				if (isset($_POST['teacher'.$teacherid]))
					$this->updateCoreTeacher($schoolcode,$teacherid,$connid);
			}
			echo "<script>window.opener.location.reload(true);window.close();</script>";
		}
		elseif ($this->actiontoperform == "Save Characteristics")
		{				
			$charArr = $this->charArr;
			$date = $this->chardate;
			$modeins = "Insert";
			if ($date!=0)
				$modeins='Update';
				
			if (isset($_POST['chardate']))
				$postdate = formatDate($_POST['chardate']);
			else 
				$postdate = $date;
			
			if ($modeins=='Insert')
			{
				$query="SELECT COUNT(*) as total FROM tst_characteristics_details WHERE date='$postdate' AND intrvid='".$_POST['intrvid']."'";
				$dbquery = new dbquery($query,$connid);
				$row=$dbquery->getrowarray();
				if ($row['total']>0)
				{
					echo "<p align=center><font color=red><b>The characteristics details for ".formatDate($postdate)." and for the paramete ".$this->intrvparamArr[$_POST['intrvid']]." are already entered.</b></font></p>";exit;
				}
				else 
				{
					foreach ($charArr as $charid=>$charvalue)
					{
						if (isset($_POST['char'.$charid]))
							$this->insertCharacteristics($schoolcode,$_POST['intrvid'],$charid,$_POST['char'.$charid],$modeins,$postdate,$connid);
					}
				}
			}
			elseif ($modeins=='Update')
			{
				foreach ($charArr as $charid=>$charvalue)
				{
					if (isset($_POST['char'.$charid]))
						$this->insertCharacteristics($schoolcode,$_POST['intrvid'],$charid,$_POST['char'.$charid],$modeins,$postdate,$connid);
				}
			}
			echo "<script>window.opener.location.reload(true);window.close();</script>";
		}
		elseif ($this->actiontoperform == "Update Teacher")
		{
			$teacherid = $this->teacherid;
			//echo $schoolcode;
			$saveschoolcode = $_POST['school'];
			$name = $_POST['teacher'];
			$dob = '0000-00-00';
			$join = '0000-00-00';
			$rtmdate = '0000-00-00';
			if ($_POST['birthdate']!='')
				$dob = formatDate($_POST['birthdate']);
			if ($_POST['joindate'])
				$join = formatDate($_POST['joindate']);
			if ($_POST['rtmdate'])
				$rtmdate = formatDate($_POST['rtmdate']);
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$qualification = $_POST['qualification'];
			$expr = $_POST['expr'];
			$gender = $_POST['gender'];
			$iscoreteammember = $_POST['iscore'];
			
			if ($teacherid==0)
			{
				$update_query = "INSERT INTO tst_teachermaster SET name='$name',SchoolCode=$saveschoolcode,date_of_birth='$dob',qualification='$qualification',phone='$phone',email='$email',joiningdate='$join',retirementdate='$rtmdate',experience='$expr',gender='$gender',modifiedby='$userid',coreteammember='$iscoreteammember'";
				//echo "<br>".$update_query;
				$dbquery = new dbquery($update_query,$connid);
			}
			else 
			{
				$update_query = "UPDATE tst_teachermaster SET name='$name',SchoolCode=$saveschoolcode,date_of_birth='$dob',qualification='$qualification',phone='$phone',email='$email',joiningdate='$join',retirementdate='$rtmdate',experience='$expr',gender='$gender',modifiedby='$userid',coreteammember='$iscoreteammember' WHERE teacherid=$teacherid";
				//echo "<br>".$update_query;
				$dbquery = new dbquery($update_query,$connid);
				if ($saveschoolcode!=$schoolcode)
				{
					$query = "INSERT INTO tst_teacher_schoolchange_history SET teacherid=$teacherid,old_schoolcode=$schoolcode,new_schoolcode=$saveschoolcode,schoolchange_date=CURDATE(),changedby='$userid'";
					//echo $query;
					$newdbquery = new dbquery($query,$connid);
				}
			}
			if (isset($_FILES['teacherpic']))
			{
				//echo $_POST['studentpic'];
				if ($_FILES["teacherpic"]["error"] > 0)
			    {
			   	 echo "Error: " . $_FILES["teacherpic"]["error"] . "<br />";
			    }
			    else 
			    {
					$uploadfile = "images/teachers/".basename($_FILES['teacherpic']['name']);
					$picname = $_FILES['teacherpic']['tmp_name'];
					$newname = "images/teachers/".$teacherid.".jpg";
					if(!move_uploaded_file($picname,$uploadfile))
						echo "File upload error..";
					rename($uploadfile,$newname);
			    }
			}
			echo "<script>window.opener.location.reload(true);window.close();</script>";
		}
		elseif ($this->actiontoperform == "Delete Teacher")
		{
			$hdnteacherid = $this->teacherid;
			$query = "UPDATE tst_teachermaster SET status='D' WHERE teacherid=$hdnteacherid";
			//echo $query;
			$newdbquery = new dbquery($query,$connid);
		}
		
		elseif ($this->actiontoperform == "Update Student")
		{
			//print_r($_POST);
			$studentid = $this->studentid;
			//echo $schoolcode;
			$saveschoolcode = $_POST['school'];
			$name = $_POST['student'];
			$dob = formatDate($_POST['birthdate']);
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			$gender = $_POST['gender'];
			$class = $_POST['cls'];
			$section = $_POST['section'];
			
			if ($studentid==0)
			{
				$update_query = "INSERT INTO tst_studentmaster SET name='$name',SchoolCode=$saveschoolcode,date_of_birth='$dob',phone='$phone',email='$email',gender='$gender',class='$class',section='$section',modifiedby='$userid'";
				//echo "<br>".$update_query;
				$dbquery = new dbquery($update_query,$connid);
			}
			else 
			{
				$update_query = "UPDATE tst_studentmaster SET name='$name',SchoolCode=$saveschoolcode,date_of_birth='$dob',phone='$phone',email='$email',gender='$gender',class='$class',section='$section',modifiedby='$userid' WHERE studentid=$studentid";
				//echo "<br>".$update_query;
				$dbquery = new dbquery($update_query,$connid);
				if ($saveschoolcode!=$schoolcode)
				{
					$query = "INSERT INTO tst_student_schoolchange_history SET studentid=$studentid,old_schoolcode=$schoolcode,new_schoolcode=$saveschoolcode,schoolchange_date=CURDATE(),changedby='$userid'";
					//echo $query;
					$newdbquery = new dbquery($query,$connid);
				}
			}
			if (isset($_FILES['studentpic']))
			{
				//echo $_POST['studentpic'];
				if ($_FILES["studentpic"]["error"] > 0)
			    {
			   	 echo "Error: " . $_FILES["studentpic"]["error"] . "<br />";
			    }
			    else 
			    {
					$uploadfile = "images/students/".basename($_FILES['studentpic']['name']);
					$picname = $_FILES['studentpic']['tmp_name'];
					$newname = "images/students/".$studentid.".jpg";
					if(!move_uploaded_file($picname,$uploadfile))
						echo "File upload error..";
					rename($uploadfile,$newname);
			    }
			}
			echo "<script>window.opener.location.reload(true);window.close();</script>";
		}
		
		elseif ($this->actiontoperform == "Delete Student")
		{
			$hdnstudentid = $this->studentid;
			$query = "UPDATE tst_studentmaster SET status='D' WHERE studentid=$hdnstudentid";
			//echo $query;
			$newdbquery = new dbquery($query,$connid);
		}
		elseif ($this->actiontoperform == "Edit School")
		{
			$location = $_POST['location'];
			$schoolcategory = $_POST['schcategory'];
			$principalname = $_POST['principal'];
			$phone = $_POST['phone'];
			$email = $_POST['email'];
			
			$query = "UPDATE tst_school_master SET location='$location',SchoolCategory='$schoolcategory',principal_name='$principalname',phone='$phone',email='$email' WHERE SchoolCode=$schoolcode";
			//echo $query;
			$newdbquery = new dbquery($query,$connid);
			if ($newdbquery)
			{
				echo "<script>window.opener.document.ctsform.schoolcode.value = $schoolcode</script>";
				echo "<script>window.opener.document.ctsform.submit();window.close();</script>";
			}
		}
		
		elseif ($this->actiontoperform == "Insert MS Visit")
		{
			//print_r($_POST);//exit;
			$msparameters = $this->fetchMSVisitParameters($connid);
			$keypoints_teacher=$this->keypointsteacher;
			$keyconcerns_maths=$this->keypointsteacher_maths;
			$keyconcerns_guj=$this->keypointsteacher_gujarati;
			$remarks_principalmeetin_start = $_POST['remarks7'];//7 is the parameter id of pricipal meeting at the start of the day
			$remarks_principalmeetin_end = $_POST['remarks8'];//8 is the parameter id of pricipal meeting at the end of the day
			/*$classes="";
			foreach ($this->classArr as $class)
			{
				foreach ($this->sectionArray as $section)
				{
					if (isset($_POST[$class."_".$section]))
						$classes.=$class.$section.",";
				}
			}
			if ($classes!='')
				$classes=substr($classes,0,-1);
				
			if (isset($_POST['fromtimeh']) && $_POST['fromtimeh']!='' && isset($_POST['fromtimem']) && $_POST['fromtimem']!='')
				$fromtime=$_POST['fromtimeh'].":".$_POST['fromtimem'].":00";
				
			if (isset($_POST['totimeh']) && $_POST['totimeh']!='' && isset($_POST['totimem']) && $_POST['totimem']!='')
				$totimem=$_POST['totimeh'].":".$_POST['totimem'].":00";
			*/
							
			$visitdate = formatDate($this->visitdate);
			$query="INSERT INTO tst_msvisitmaster SET SchoolCode=$schoolcode,msvisitdate='".$visitdate."',principalmeetingremarks_start='$remarks_principalmeetin_start',principalmeetingremarks_end='$remarks_principalmeetin_end',keypoints_teacher='$keypoints_teacher',keyconcerns_teacher_maths='$keyconcerns_maths',keyconcerns_teacher_gujarati='$keyconcerns_guj',enteredon=now(),enteredby='$userid'";//visitname='".$this->visitname."',
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			$msvisitid = mysql_insert_id($connid);
			
			foreach ($msparameters as $paramid=>$param)
			{
				$paramflag=$_POST['flag'.$paramid];
				$paraminsquery="INSERT INTO tst_visitparameter_details SET visitid=$msvisitid,paramid=$paramid,paramflag='$paramflag',visittype='MS'";
				//echo "<br>$paraminsquery";
				$dbquery = new dbquery($paraminsquery,$connid);
			}
			
			for ($i=1;$i<=$this->totalissues;$i++)
			{
				$cls=$_POST['sessionclass'.$i];
				$sub=$_POST['sessionsubject'.$i];
				$issue=$_POST['sessionissue'.$i];
				$status=$_POST['sessionstatus'.$i];
				$failyrereason=$_POST['failure'.$i];
				if ($cls=='' && $sub=='' && $issue=='')
					continue;
				$insert_query="INSERT INTO tst_mssession_issues SET msvisitid=$msvisitid,class='$cls',subject='$sub',status='$status',failurereason='$failyrereason',issue='$issue'";
				//echo "<br>$insert_query";
				$dbquery = new dbquery($insert_query,$connid);
			}
			echo "<script>redirectPage('tst_msvisits.php');</script>";
		}
		elseif ($this->actiontoperform == "Edit MS Visit")
		{
			//print_r($_POST);exit;
			$msparameters = $this->fetchMSVisitParameters($connid);
			$keypoints_teacher=$this->keypointsteacher;
			$keyconcerns_maths=$this->keypointsteacher_maths;
			$keyconcerns_guj=$this->keypointsteacher_gujarati;
			$remarks_principalmeetin_start = $_POST['remarks7'];//7 is the parameter id of pricipal meeting at the start of the day
			$remarks_principalmeetin_end = $_POST['remarks8'];//8 is the parameter id of pricipal meeting at the end of the day
			$visitdate = formatDate($this->visitdate);
			
			$query="UPDATE tst_msvisitmaster SET SchoolCode=$schoolcode,msvisitdate='".$visitdate."',principalmeetingremarks_start='$remarks_principalmeetin_start',principalmeetingremarks_end='$remarks_principalmeetin_end',keypoints_teacher='$keypoints_teacher',keyconcerns_teacher_maths='$keyconcerns_maths',keyconcerns_teacher_gujarati='$keyconcerns_guj' WHERE msvisitid=$this->msvisitid";//visitname='".$this->visitname."',
			//echo $query."<br>";exit;
			$dbquery = new dbquery($query,$connid);
			$msvisitid = mysql_insert_id($connid);
			foreach ($msparameters as $paramid=>$param)
			{
				$paramflag=$_POST['flag'.$paramid];
				$paraminsquery="UPDATE tst_visitparameter_details SET paramflag='$paramflag' WHERE visitid=$this->msvisitid AND paramid=$paramid AND visittype='MS'";
				//echo "<br>$paraminsquery";
				$dbquery = new dbquery($paraminsquery,$connid);
			}
			
			$query="DELETE FROM tst_mssession_issues WHERE msvisitid=$this->msvisitid";
			$dbquery = new dbquery($query,$connid);
			for ($i=1;$i<=$this->totalissues;$i++)
			{
				$cls=$_POST['sessionclass'.$i];
				$sub=$_POST['sessionsubject'.$i];
				$issue=$_POST['sessionissue'.$i];
				$status=$_POST['sessionstatus'.$i];
				$failyrereason=$_POST['failure'.$i];
				if ($cls=='' && $sub=='' && $issue=='')
					continue;
				$insert_query="INSERT INTO tst_mssession_issues SET class='$cls',subject='$sub',status='$status',issue='$issue',failurereason='$failyrereason',msvisitid=$this->msvisitid";
				//echo "<br>$insert_query";
				$dbquery = new dbquery($insert_query,$connid);
			}
			echo "<script>window.opener.location.reload(true);window.close();</script>";		
		}
		
		elseif ($this->actiontoperform == "Update Computer")
		{
			$computerid=$this->computerid;
			if ($computerid==0)
			{
				if ($_POST['server']=='Y')
					$query="INSERT INTO tst_schoolwisecomputers SET SchoolCode='$schoolcode',isserver='Y',label_computer='".$_POST['computer']."',desc_computer='".$_POST['comp_desc']."',lastmodified=now(),modifiedby='$userid'";
				else if($_POST['server']=='N' && $_POST['comp_server']=='other')
					$query="INSERT INTO tst_schoolwisecomputers SET SchoolCode='$schoolcode',isserver='N',server_computer='".$_POST['other_server']."',label_computer='".$_POST['computer']."',desc_computer='".$_POST['comp_desc']."',lastmodified=now(),modifiedby='$userid'";
				else if($_POST['server']=='N')
					$query="INSERT INTO tst_schoolwisecomputers SET SchoolCode='$schoolcode',isserver='N',server_computer='".$_POST['comp_server']."',label_computer='".$_POST['computer']."',desc_computer='".$_POST['comp_desc']."',lastmodified=now(),modifiedby='$userid'";
			}
			elseif ($computerid>0)
			{
				if($_POST['comp_server']=='other')
					$query="UPDATE tst_schoolwisecomputers SET server_computer='".$_POST['other_server']."',label_computer='".$_POST['computer']."',desc_computer='".$_POST['comp_desc']."',modifiedby='$userid' WHERE computerid=$computerid";
				else 
					$query="UPDATE tst_schoolwisecomputers SET server_computer='".$_POST['comp_server']."',label_computer='".$_POST['computer']."',desc_computer='".$_POST['comp_desc']."',modifiedby='$userid' WHERE computerid=$computerid";
			}
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			if ($dbquery)
				echo "<script>window.opener.location.reload(true);window.close();</script>";
		}
	}
	
	function insertCharacteristics($schoolcode,$intrvid,$charid,$chardetails,$modeins,$date,$connid)
	{
		//echo $modeins;exit();
		if ($modeins=='Insert')
			$query="INSERT INTO tst_characteristics_details SET SchoolCode=$schoolcode,intrvid=$intrvid,charid=$charid,chardetails='$chardetails',date='$date'";
		elseif ($modeins=='Update')
			$query="UPDATE tst_characteristics_details SET chardetails='$chardetails',intrvid=$intrvid WHERE date='$date' AND SchoolCode=$schoolcode AND charid=$charid";
		
		//echo "<br>".$query;
		$dbquery = new dbquery($query,$connid);
	}
	
	function updateCoreTeacher($schoolcode,$teacherid,$connid)
	{
		$query="UPDATE tst_teachermaster SET coreteammember='Y' WHERE teacherid=$teacherid AND schoolcode=$schoolcode";
		//echo "<br>".$query;
		$dbquery = new dbquery($query,$connid);
	}
	
	function fetchVisitParameters($connid)
	{
		$paramarr = array();
		$query="SELECT * FROM tst_visitparameter_master WHERE visittype='TR'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$paramarr[$row['paramid']] = $row['visit_parameter'];
		}
		return $paramarr;
	}
	
	function fetchMSVisitParameters($connid)
	{
		$paramarr = array();
		$query="SELECT * FROM tst_visitparameter_master WHERE visittype='MS'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$paramarr[$row['paramid']] = $row['visit_parameter'];
		}
		return $paramarr;
	}
	
	function getVisitParameterDetails($visitid,$connid)
	{
		$paramarr = array();
		$query="SELECT * FROM tst_visitparameter_details WHERE visitid=".$visitid;
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$paramarr[$row['paramid']] = $row['paramflag'];
		}
		return $paramarr;
	}
	
	function insertVisitParameter($visitid,$paramid,$paramflag,$connid)
	{
		$insquery = "INSERT INTO tst_visitparameter_details SET visitid=$visitid,paramid=$paramid,paramflag='$paramflag'";
		//echo $insquery."<br>";
		$dbquery = new dbquery($insquery,$connid);
	}
	function insertVisitTask($visitid,$taskid,$subtaskid,$pstd,$tpbnd,$tnpbd,$connid,$actiontoperform)
	{
		if ($actiontoperform=='Insert Visit')
			$insquery = "INSERT INTO tst_schoolvisit_generalreport SET visitid=$visitid,taskid=$taskid,subtaskid='$subtaskid',plannedsubtasks_donedetails='$pstd',plannedbutnotdone='$tpbnd',tasksnotplannedbutdone='$tnpbd'";
		elseif ($actiontoperform=='Insert Task')
			$insquery = "UPDATE tst_schoolvisit_generalreport SET subtaskid='$subtaskid',plannedsubtasks_donedetails='$pstd',plannedbutnotdone='$tpbnd',tasksnotplannedbutdone='$tnpbd' WHERE visitid=$visitid AND taskid=$taskid";
		
		//echo $insquery."<br>";
		//exit;
		$dbquery = new dbquery($insquery,$connid);
	}
	
	function insertVisitActions($visitid,$teacherid,$faculty,$actionid,$subjectid,$grade,$steps,$duration,$connid,$actiontoperform)
	{
		if ($actiontoperform=='Insert Visit' || $actiontoperform=='Insert Actions'){
			if($steps!='')
			{
				$query = "INSERT INTO tst_actionpoints_details SET visitid=$visitid,teacherid=$teacherid,eifacultyid='$faculty',actionid=$actionid,subjectid=$subjectid,classes='$grade',duration='".$duration."',stepstaken='".$steps."'";//date='".$date."',
				//echo "<br>".$query;
				$dbquery = new dbquery($query,$connid);
			}
		}
		/*elseif ($actiontoperform=='Insert Actions'){
			$query = "UPDATE tst_actionpoints_details SET date='".$date."',stepstaken='".$steps."' WHERE visitid=$visitid AND teacherid=$teacherid AND actionid=$actionid";
			//echo "<br>".$query;
			$dbquery = new dbquery($query,$connid);
			$num = $dbquery->affectedrows();
			if ($num == 0)
			{
				$query = "SELECT COUNT(*) FROM tst_actionpoints_details WHERE visitid=$visitid AND teacherid=$teacherid AND actionid=$actionid";
				//echo "<br>".$query;
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				$count = $row['COUNT(*)'];
				//echo "<br>".$count;
				if ($count==0)
				{
					$query = "INSERT INTO tst_actionpoints_details SET visitid=$visitid,teacherid=$teacherid,eifacultyid='$faculty',actionid=$actionid,subjectid=$subjectid,classes='".$grade."',date='".$date."',stepstaken='".$steps."'";
					$dbquery = new dbquery($query,$connid);
				}
			}
		}*/
	}
	
	function addVisitTaskDetails($schoolcode,$visitid,$connid)
	{
		$this->setpostvars();
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schvisitrow = $this->fetchSchoolVisitDetails($visitid,$connid);
		
		$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='6'><b>".$schvisitrow['visitname']." - Task Details</b></td></tr>";
		$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		$outputstr .= "<tr><th>Task No.</th><th>Task</th><th>Planned Sub-Tasks</th></tr>";
		//$outputstr .= "<tr><th>Planned Sub-Tasks Details</th><th>Task Not Done Details</th><th>Not Planned But Task Done Details</th>";
		
		$tasksArr = $this->fetchVisitTasks($connid);
		//print_r($tasksArr);
		$taskDetailsArr = $this->fetchTaskDetails($visitid,$connid);
		$srno=1;
		foreach ($tasksArr as $taskid=>$task)
		{
			$outputstr .= "<tr><td>".$srno."</td><td>".$task."</td><td><select name='task$taskid'>";
			$outputstr .= "<option></option>";
			$subtasksArr = $this->fetchVisitSubTasks($taskid,$connid);
			foreach ($subtasksArr as $subtaskid=>$subtasks)
			{
				$checked='';
				if($taskDetailsArr[$visitid][$taskid]['subtaskid']==$subtaskid)
					$checked='selected';
				$outputstr .= "<option title='".$subtasks[$taskid]."' value='".$subtaskid."' $checked>".substr($subtasks[$taskid],0,75)."</option>";
			}
			$outputstr .= "</select></td></tr>";
			$outputstr .= "<tr><td>Planned Subtask Details: </td><td colspan='2'><textarea rows='3' cols='100' name='".$taskid."1'>".$taskDetailsArr[$visitid][$taskid]['pstd']."</textarea></td></tr>";
			$outputstr .= "<tr><td>Task Planned But Not Done Details</td><td colspan='2'><textarea rows='3' cols='100' name='".$taskid."2'>".$taskDetailsArr[$visitid][$taskid]['tpbnd']."</textarea></td></tr>";
			$outputstr .= "<tr><td>Task Not Planned But Done Details</td><td colspan='2'><textarea rows='3' cols='100' name='".$taskid."3'>".$taskDetailsArr[$visitid][$taskid]['tnpbd']."</textarea></td></tr>";
			$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td colspan='3'>&nbsp</tr>";
			$srno++;
		}
		/*foreach ($tasksArr as $taskid=>$task)
		{
			$subtasksArr = $this->fetchVisitSubTasks($taskid,$connid);
			foreach ($subtasksArr as $subtaskid=>$subtasks)
			{
				$outputstr .= "<tr><td>".$taskid."</td><td>".$task."</td><td>".$subtasks[$taskid]."</td></tr>";
				$outputstr .= "<tr><td>Planned Subtask Details: </td><td colspan='2'><textarea rows='3' cols='100' name='".$taskid.$subtaskid."1'>".$taskDetailsArr[$visitid][$taskid][$subtaskid]['pstd']."</textarea></td></tr>";
				$outputstr .= "<tr><td>Task Planned But Not Done Details</td><td colspan='2'><textarea rows='3' cols='100' name='".$taskid.$subtaskid."2'>".$taskDetailsArr[$visitid][$taskid][$subtaskid]['tpbnd']."</textarea></td></tr>";
				$outputstr .= "<tr><td>Task Not Planned But Done Details</td><td colspan='2'><textarea rows='3' cols='100' name='".$taskid.$subtaskid."3'>".$taskDetailsArr[$visitid][$taskid][$subtaskid]['tnpbd']."</textarea></td></tr>";
				$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td colspan='3'>&nbsp</tr>";
			}
		}*/
		$outputstr .= "<tr><td colspan='6' align='center'><input type='button' name='save' id='save' value='Save' onclick=addVisitTasks('$this->mode') ></td></tr>";
		$outputstr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		return $outputstr;
	}
	function fetchVisitTasks($connid)
	{
		$taskarr = array();
		$query="SELECT * FROM  tst_schoolvisittaskmaster";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$taskarr[$row['taskid']] = $row['task'];
		}
		return $taskarr;
	}
	function fetchVisitSubTasks($taskid,$connid)
	{
		$subtaskarr = array();
		$query="SELECT * FROM  tst_schoolvisitsubtaskmaster WHERE taskid=$taskid";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$subtaskarr[$row['subtaskid']][$taskid] = $row['subtask'];
		}
		return $subtaskarr;
	}
	function actionPointDetails($schoolcode,$userid,$visitid,$connid)
	{
		$this->setpostvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schvisitrow = $this->fetchSchoolVisitDetails($visitid,$connid);
		//print_r($this->subjectArray);
		
		$outputstr  = "<br><table width='100%' border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='4'><b>".$schvisitrow['visitname']." - Teacher Wise Action Points</b></td></tr>";
		$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='4'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		//$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='5'><font color='#FFFFFF'><b>Teacher-wise Visit Report</font></b></td></tr>";
		
		//$count = 0;
		$dur = 1;
		foreach ($this->teacherArray as $teacherid=>$teacher)
		{
			//print_r($this->teacherToSubjectArray);
			
			
			$teacherWiseSubArr = $this->teacherWiseSubjectArr($teacherid,$connid);
			//$eifacultySubjectArr = $this->eifacultySubjectArr_func($schoolcode,$userid,$connid);
			foreach ($teacherWiseSubArr as $subjectid)
			{	
				$grade = $this->getGrade($teacherid,$connid,$subjectid);
				$facultyid = $this->eifacultyArray[$subjectid];
				$faculty = $this->getFullName($this->eifacultyArray[$subjectid],$connid);
				$subject = $this->subjectArray[$subjectid];
			
				if($facultyid==$userid || in_array($userid,$this->masterusers))
				{
					$outputstr .= "<tr bgcolor='".$this->logocolor3."' align='center'><td colspan='4'><b>Teacher:</b> $teacher[$schoolcode] &nbsp;&nbsp;&nbsp;<b>Subject:</b> ".$subject."&nbsp;&nbsp;&nbsp;<b>Grade:</b> $grade&nbsp;&nbsp;&nbsp;<b>EI Faculty:</b> ".$faculty."</td></tr>";
					$outputstr .= "<tr align='center'><td><b>SrNo</b></td><td><b>ActionPoints</b></td><td><b>Status/Steps taken</b></td></tr>";
					$srno=1;
					$teacherToActionArr = $this->teachertoactionArr($teacherid,$subjectid,$connid);
					$duration = $this->getDuration($visitid,$teacherid,$facultyid,$connid);
					//print_r($teacherToActionArr);
					foreach ($teacherToActionArr as $actionid)
					{
						$fetchActionPointDetailsArr = $this->fetchActionPointDetails($visitid,$teacherid,$actionid,$connid);
						$outputstr .= "<tr><td align='center'>".$srno."</td><td>".$this->actionArray[$subjectid][$actionid]."</td>";
						
						$dateValue = formatDate($fetchActionPointDetailsArr[$visitid][$teacherid][$actionid]['date']);
						if ($dateValue=='00-00-0000')
							$dateValue='';
						 
						//$outputstr .= "<td><input type='text' name='date".$teacherid.$actionid."' onfocus='showCalendarControl(this);' onkeyup='showCalendarControl(this);' value='".$dateValue."'></td>";
						$outputstr .= "<td width='50%'><textarea rows='2' cols='60' name='steps".$teacherid.$actionid."'>".$fetchActionPointDetailsArr[$visitid][$teacherid][$actionid]['stepstaken']."</textarea></td></tr>";
						$srno++;
					}
					$outputstr .= "<tr><td colspan=2 align='center'><b>Duration (mins):</b> <input type='text' name='duration".$dur."$teacherid' id='duration".$dur."$teacherid' value=$duration></td><td><a href='javascript:browse_window($teacherid,2);'>Change Action Points</a></td></tr>";
					$dur++;
				}
			}
		}
		$outputstr .= "<tr><td align='center' colspan='4'><input type='button' name='save' id='save' value='Save' onclick='return addVisitActions();'></td></tr>";
		$outputstr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		echo $outputstr;
	}
	
	function getGrade($teacherid,$connid,$subjectid)
	{
		if ($subjectid!='')
			$condition = " AND subjectid=$subjectid";
		else 
			$condition = '';
		$query = "SELECT group_concat(distinct class) as grade FROM tst_teacher_subjectclassmapping WHERE teacherid=$teacherid $condition";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$grade=$row['grade'];
		return $grade;
	}
	
	function getActionPointCount($teacherid,$connid)
	{
		$query = "SELECT COUNT(*) FROM tst_teachertoaction WHERE teacherid=$teacherid";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['COUNT(*)'];
	}
	
	function fetchTaskDetails($visitid,$connid)
	{
		$taskDetailsArr = array();
		$query = "SELECT * FROM tst_schoolvisit_generalreport WHERE visitid=$visitid";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$taskDetailsArr[$visitid][$row['taskid']]['pstd'] = $row['plannedsubtasks_donedetails'];
			$taskDetailsArr[$visitid][$row['taskid']]['tpbnd'] = $row['plannedbutnotdone'];
			$taskDetailsArr[$visitid][$row['taskid']]['tnpbd'] = $row['tasksnotplannedbutdone'];//[$row['subtaskid']]
			$taskDetailsArr[$visitid][$row['taskid']]['subtaskid'] = $row['subtaskid'];
		}
		return $taskDetailsArr;
	}
	
	function fetchActionPointDetails($visitid,$teacherid,$actionid,$connid)
	{
		$actionPointDetails = array();
		$query = "SELECT * FROM tst_actionpoints_details WHERE visitid=$visitid AND teacherid=$teacherid AND actionid=$actionid";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$actionPointDetails[$visitid][$row['teacherid']][$row['actionid']]['date'] = $row['date'];
			$actionPointDetails[$visitid][$row['teacherid']][$row['actionid']]['stepstaken'] = $row['stepstaken'];
		}
		return $actionPointDetails;
	}
	
	function fetchTeacherDetails($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		
		$teacherList  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$teacherList .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='7'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$teacherList .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='7'><font color='#FFFFFF'><b>Teacher List</font></b></td></tr>";
		$teacherList .= "<tr align='center'><td><b>SrNo</b></td><td><b>Teacher Name</b></td><td><b>Date of Birth</b></td><td><b>Contact Details</b></td><td><b>Qualifications</b></td><td><b>Classes-Subjects</b></td>";
		if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{
			$teacherList .= "<td><b>Actions</b></td>";
		}
		$teacherList.="</tr>";
		
		$srno = 1;
		$query = "SELECT * FROM tst_teachermaster WHERE SchoolCode=$schoolcode AND status='A'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$teacherid = $row['teacherid'];
			//$subjectClasses = "<table border=1 style='border-collapse: collapse' align='center'><tr align='center'><td><b>Class</b></td><td colspan=$colspan><b>Subject</b></td></tr>";
			$subjectClasses = "";
			$grade = $this->getGrade($teacherid,$connid);
			//echo $grade;
			$grade = explode(",",$grade);
			foreach ($grade as $cls)
			{	
				$teacherWiseSubArr = $this->teacherWiseSubjectArr($teacherid,$connid,$cls);
				//$subjectClasses.="<tr><td align='center'>$cls</td><td nowrap>";
				$subjectClasses.=$cls." - ";
				foreach ($teacherWiseSubArr as $subjectid)
				{
					$subject = $this->subjectArray[$subjectid];
					$subjectClasses.=$subject.", ";
				}
				$subjectClasses = substr($subjectClasses,0,-2);
				$subjectClasses .= "<br>";
				//$subjectClasses.="</td></tr>";
			}
			//$subjectClasses .= "</table>";
			$dob = formatDate($row['date_of_birth']);
			if ($dob=='00-00-0000')
				$dob='';
				
			$totalActions = $this->getActionPointCount($teacherid,$connid);
			$bgcolor ='';
			if ($row['coreteammember']=='Y')
				$bgcolor='#80FF80';
			$teacherList .= "<tr bgcolor=$bgcolor><td align='center'>".$srno."</td><td nowrap>".$row['name']."</td><td nowrap>".$dob."</td><td>".$row['phone']."<br>".$row['email']."</td><td>".$row['qualification']."</td><td nowrap>$subjectClasses</td>";
			if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
			{
				$teacherList .= "<td nowrap valign=center><a href='javascript:browse_window($teacherid,1);' >Map Subject</a>&nbsp;|&nbsp;<a href='javascript:mapActions($teacherid)' >Action Points ($totalActions)</a> | ";
				$teacherList .= "<img title='Edit' src='images/edit.png' onclick='javascript:browse_window($teacherid,5)' > | ";
				$teacherList .= "<img title='Delete' src='images/delete.png' onclick=deleteTeacher($teacherid)> | ";
				$teacherList .= "<img title='See Photograph' src='images/teachers/$teacherid.jpg' height=20 width=20 onmouseover=showStudentImage($teacherid,event) onmouseout=hideStudentImage($teacherid)>";
				$teacherList .= "<img style='display:none' id='img$teacherid' src='images/teachers/$teacherid.jpg' height=150 width=150 title='' alt='Photograph not found'></td>";
			}
			$teacherList .="</tr>";
			$srno++;
		}
		if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{
			$teacherList .= "<tr><td align='center' colspan='7'><a href='javascript:browse_window(0,5);'>Add New Teacher</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:browse_window(0,3);'>Map Core Team members</a></td></tr>";
		}
		$teacherList .="</table><br><table cellspacing=4><tr><td width='10%' height='20%' bgcolor='#80FF80'></td><td>Core team members<td></tr></table>";
		$teacherList .= "<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		echo $teacherList;
	}
	
	function updateTeacherDetails($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$teacherid = $this->teacherid;
		$schoolsArr = $this->schoolsArr_func($connid);
		//print_r($_POST);
		$teacherList  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$teacherList .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$teacherList .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>Teacher List</font></b></td></tr>";	
			
		$query = "SELECT * FROM tst_teachermaster WHERE teacherid=$teacherid";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		//{
			$dob = '';
			$joindate = '';
			$rtrmdae = '';
			if ($row['date_of_birth']=='0000-00-00' || $row['date_of_birth']=='')
				$dob='';
			else 
				$dob=formatDate($row['date_of_birth']);
			
			if ($row['joiningdate']=='0000-00-00' || $row['joiningdate']=='')
				$joindate='';
			else 
				$joindate=formatDate($row['joiningdate']);
			
			if ($row['retirementdate']=='0000-00-00' || $row['retirementdate']=='')
				$rtrmdae='';
			else 
				$rtrmdae=formatDate($row['retirementdate']);
				
			$male='';
			$femalemale='';
			if ($row['gender'] == 'M')
				$male='selected';
			if ($row['gender'] == 'F')
				$female='selected';
			
			$teacherList .= "<tr><td><b>Teacher Name:</b></td><td><input type=text name=teacher id=teacher value='".$this->teacherArray[$teacherid][$schoolcode]."'></td></tr>";
			$teacherList .= "<tr><td><b>School Name:</b></td><td><select name='school' id='school'><option value=''>Select</option>";
			
			foreach ($schoolsArr as $schcode=>$schname)
			{
				$selected='';
				if ($schcode==$schoolcode)
					$selected = 'selected';
				$teacherList .= "<option value=$schcode $selected>$schname</option>";
			}
			$teacherList .=	"</select></td></tr>";
				
			$teacherList .= "<tr><td><b>Gender:</b></td><td><select name='gender' id='gender'><option value=''>Select</option>";
			$teacherList .= "<option value='Male' $male>Male</option><option value='Female' $female>Female</option></td></tr>";
			$teacherList .= "<tr><td><b>Date of Birth:</b></td>";
			$teacherList .= "<td><input name='birthdate' type='text' id='birthdate' value='".$dob."' onfocus='showCalendarControl(this);' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
			$teacherList .= "<tr><td><b>Qualifications:</b></td><td><input type=text name=qualification id=qualification value='".$row['qualification']."'></td></tr>";
			$teacherList .= "<tr><td><b>Phone No:</b></td><td><input type=text name=phone id=phone value='".$row['phone']."'></td></tr>";
			$teacherList .= "<tr><td><b>Email Address:</b></td><td><input type=text name=email id=email value='".$row['email']."'></td></tr>";
			//$teacherList .= "<tr><td><b></b></td><td></td></tr>";
			$teacherList .= "<tr><td><b>Joining Date:</b></td>";
			$teacherList .= "<td><input name='joindate' type='text' id='joindate' value='".$joindate."' onfocus='showCalendarControl(this);' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
			$teacherList .= "<tr><td><b>Retirement Date:</b></td>";
			$teacherList .= "<td><input name='rtmdate' type='text' id='rtmdate' value='".$rtrmdae."' onfocus='showCalendarControl(this);' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
			$teacherList .= "<tr><td><b>Experience:</b></td><td><input type=text name=expr id=expr value='".$row['experience']."'></td></tr>";
			$teacherList .= "<tr><td><b>Upload Image:</b></td><td><input type=file name='teacherpic' id='teacherpic'></td>";
			
			$iscorey='';
			$iscoren='';
			if ($row['coreteammember'] == 'Y')
				$iscorey='selected';
			if ($row['coreteammember'] == 'N')
				$iscoren='selected';
				
			$teacherList .= "<tr><td><b>Is Core TeamMember:</b></td><td><select name='iscore' id='iscore'>";
			$teacherList .= "<option value='N' $iscoren>No</option><option value='Y' $iscorey>Yes</option></td></tr>";
			
		//}
		$teacherList .= "<tr align=center><td colspan=2><input type=button name=save id=save value=Save onclick='updateTeacher($teacherid)'></td></tr>";
		
		$teacherList .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'><br>";
		$teacherList .= "<p align='center'><b><a href='javascript:window.close();'>Close</a></b></p>";
		echo $teacherList;
	}
	
	function mapTeacher($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		
		$teacherList  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$teacherList .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='7'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$teacherList .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='7'><font color='#FFFFFF'><b>Teacher List</font></b></td></tr>";
		$teacherList .= "<tr align='center'><td><b>SrNo</b></td><td><b>&nbsp;</b></td><td><b>Teacher Name</b></td></tr>";
		
		$srno = 1;
		$teachersArr = $this->teacherArray;
		$query = "SELECT * FROM tst_teachermaster WHERE SchoolCode=$schoolcode AND status='A'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{	
			$checked='';
			if($row['coreteammember']=='Y')
				$checked = 'checked';
			$teacherList .= "<tr><td align='center'>$srno</td><td align='center'><input type='checkbox' name='teacher".$row['teacherid']."' $checked></td><td>".$row['name']."</td></tr>";
			$srno++;
		}
		$teacherList .= "<tr align='center'><td colspan='3'><input type='button' name='save' id='save' value='Save' onclick='mapteachers()'></td></tr>";
		$teacherList .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'><br>";
		$teacherList .= "<p align='center'><b><a href='javascript:window.close();'>Close</a></b></p>";
		echo $teacherList;
	}
	
	function fetchSubjectClassMapping($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$teacherid = $this->teacherid;
		
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr align='center' bgcolor='".$this->logocolor2."'><td colspan='25'><font color='white'><b>".$this->teacherArray[$teacherid][$schoolcode]." - Subject Wise Class Wise Mapping</b></font></td></tr>";
		$outputStr .="<tr><td rowspan='2'><b>Subject/Class</b></td>";
		//for ($cls=$this->minClass;$cls<=$this->maxClass;$cls++)
		foreach ($this->classArr as $cls)
		{
			$colspan=count($this->sectionArray);
			$outputStr .= "<td align='center' colspan='$colspan'><b>$cls</b></td>";
		}
		$outputStr .="</tr><tr>";
		//for ($cls=$this->minClass;$cls<=$this->maxClass;$cls++)
		foreach ($this->classArr as $cls)
		{
			foreach ($this->sectionArray as $section)
			{
				$outputStr .= "<td align='center'><b>$section</b></td>";
			}
		}
		$outputStr .="</tr><tr>";
		$outputStr .="<tr>";
		foreach ($this->subjectArray as $subjectid=>$subject)
		{
			$outputStr .= "<tr><td>$subject</td>";
			//for ($cls=$this->minClass;$cls<=$this->maxClass;$cls++)
			foreach ($this->classArr as $cls)
			{
				$colspan=count($this->sectionArray);
				//$outputStr .= "<td align='center' colspan='$colspan'><b>$cls</b></td>";
				foreach ($this->sectionArray as $section)
				{
					$query="SELECT * FROM  tst_teacher_subjectclassmapping WHERE teacherid=$teacherid AND subjectid=$subjectid AND class=$cls AND section='$section'";
					//echo "<br>".$query;
					$dbquery = new dbquery($query,$connid);
					$num = $dbquery->numrows($dbquery);
					//echo $num."<br>";
					if ($num == '1')
						$checked = 'checked';
					else 
						$checked = '';
					$outputStr .= "<td align='center'><input type='checkbox' name='".$teacherid."_".$subjectid."_".$cls."_".$section."' $checked></td>";
				}
			}
			$outputStr .= "</tr>";
		}
		$outputStr .= "<tr align='center'><td colspan='25'><input type='button' name='save' id='save' value='Save' onclick='return savemapping($teacherid);'></td></tr>";
		$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		$outputStr .= "<p align='center'><br><b><a href='javascript:window.close();'>Close</a></b></p>";
		echo $outputStr;
	}
	
	function fetchActionPointsMapping($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$teacherid = $this->teacherid;
		//echo $this->subjectid;
		
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='7'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr align='center' bgcolor='".$this->logocolor2."'><td colspan='25'><font color='white'><b>".$this->teacherArray[$teacherid][$schoolcode]." - Action Points Mapping</b></font></td></tr>";
		$outputStr .= "<tr align='center'><td colspan='3'><b>Select subject to map Action Points: </b><select name='subjectlist' onchange='javasctiot:document.userlogin.submit();'><option value=''>Select</option>";
		
		$subjectsArr = $this->teacherWiseSubjectArr($teacherid,$connid);
		//print_r($subjects);
		$count = count($subjectsArr);
		if ($count==0)
			$msg = "<p align='center'><font color='red'><b>Please map class and subject first to map action points.</b></font></p>";
		else 
			$msg='';
		foreach ($subjectsArr as $subjectid)
		{
			//echo "in";
			if ($this->subjectid == $subjectid)
				$checked = 'selected';
			else 
				$checked = '';
			$outputStr .= "<option value='$subjectid' $checked>".$this->subjectArray[$subjectid]."</option>";
		}
		$outputStr .= "</select></td></tr>";
		
		if (isset($this->subjectid) && !empty($this->subjectid))
		{
			//foreach ($this->te)
			$outputStr .= "<tr align='center'><td><b>SrNo</b></td><td><b>Action Point</b></td><td><b>&nbsp</b></td></tr>";
			$srno = 1;
			foreach ($this->actionArray[$this->subjectid] as $actionid=>$action)
			{
				$query="SELECT * FROM  tst_teachertoaction WHERE teacherid=$teacherid AND actionid=$actionid";
				//echo "<br>".$query;
				$dbquery = new dbquery($query,$connid);
				$num = $dbquery->numrows($dbquery);
				if ($num == '1')
					$checked = 'checked';
				else 
					$checked = '';
				$outputStr .= "<tr><td>$srno<td>".$action."</td><td><input type='checkbox' name='".$teacherid."_".$this->subjectid."_".$actionid."' $checked></td></tr>";
				$srno++;
			}
			$outputStr .= "<tr align='center'><td colspan='3'><input type='button' name='save' id='save' value='Save' onclick='return saveActionPoints($teacherid);'></td></tr>";
		}
		$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		$outputStr .= $msg;
		$outputStr .= "<p align='center'><br><b><a href='javascript:window.close();'>Close</a></b></p>";
		echo $outputStr;
	}
	
	function mapActionPoints($schoolcode,$connid)
	{
		//print_r ($_REQUEST);
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$teacherid = $this->teacherid;
		//echo "AA: ".$teacherid;
		
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		//$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='7'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr align='center' bgcolor='".$this->logocolor1."'><td colspan='25'><font color='white'><b>".$this->teacherArray[$teacherid][$schoolcode]." - Action Points Mapping</b></font></td></tr>";
		//$outputStr .= "<tr align='center'><td colspan='3'><b>Select subject to map Action Points: </b><select name='subjectlist' onchange='javasctiot:document.userlogin.submit();'><option value=''>Select</option>";
		
		$subjectsArr = $this->teacherWiseSubjectArr($teacherid,$connid);
		//print_r($subjects);
		$count = count($subjectsArr);
		if ($count==0)
			$msg = "<p align='center'><font color='red'><b>Please map class and subject first to map action points.</b></font></p>";
		else 
			$msg='';
		$srno = 1;
		$outputStr .= "<tr align='center'><td><b>Srno</b></td><td><b>Action Point</b></td><td><b>Subject</b></td></tr>";
		foreach ($subjectsArr as $subjectid)
		{
			/*if ($this->subjectid == $subjectid)
				$checked = 'selected';
			else 
				$checked = '';*/
			//$outputStr .= "<tr align='center'><th colspan='2'>".$this->subjectArray[$subjectid]."</th></tr>";
			$teacherToActionsArr = $this->teachertoactionArr($teacherid,$subjectid,$connid);
			/*if (count($teacherToActionsArr) != 0)
				$outputStr .= "<tr align='center'><td><b>Srno</b></td><td><b>Action Point</b></td><td><b>Subject</b></td></tr>";*/
			foreach ($teacherToActionsArr as $actionid)
			{
				$outputStr .= "<tr><td align='center'>$srno</td><td>".$this->actionArray[$subjectid][$actionid]."</td><td>".$this->subjectArray[$subjectid]."</td></tr>";
				$srno++;
			}
		}
		$outputStr .= "<tr><td align='center' colspan='3'><a href='javascript:browse_window($teacherid,2);'>Map Action Points</a></td></tr>";
		$outputStr .= "</table>";
		echo $outputStr;
	}
	
	function addNewVisitDetails($schoolcode,$visitid,$connid,$userid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schvisitrow = $this->fetchSchoolVisitDetails($visitid,$connid);
		
		//echo $this->mode;
		$coOrdinateTeachers = $this->coOrdinateTeachers;
		//print_r($coOrdinateTeachers);
		$parameterNames = $this->fetchVisitParameters($connid);
		$teacherNames = $this->teacherArray;
		
		$allTeachers = $this->teacherArray;
		$totalAllTeachers = count($allTeachers);
		$coreTeachers = $this->fetchCoreTeam($schoolcode,$connid);
		$totalCoreTeachers = count($coreTeachers);
		
		$parameterArr = $this->getVisitParameterDetails($visitid,$connid);
		$parametes = $this->fetchVisitParameters($connid);
		//print_r($schvisitrow);
		
		$flag1 = 'N';
		$flag2 = 'N';
		$flag3 = 'N';
		$flag4 = 'N';
		$flag5 = 'N';
		$flag6 = 'N';
		
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='2' align='center'><b>".$schvisitrow['visitname']." (Details)</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='2' align='center'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor2."'><td colspan='2' align='center'><font color='white'><b>Visit Summary</b><font></td></tr>";
		
		if(in_array($userid,$this->coOrdinateTeachers) || in_array($userid,$this->masterusers))
			$outputStr .= "<tr><td><textarea name='visitsummary' rows=3 cols=50>".$schvisitrow['visit_summary']."</textarea></td></tr>";
		
		$outputStr .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
		if(in_array($userid,$this->coOrdinateTeachers) || in_array($userid,$this->masterusers))
		{
			$outputStr .= "<tr align=center><th colspan=3><b>Visit Parameter Details</b></th></tr>";
			$outputStr .= "<tr align=center><td><b>SrNo</b></td><td><b>Parameter</b></td><td><b>Yes/No (Y/N)</b></td></tr>";
			$sr=1;
			foreach ($parameterArr as $paramid=>$paramflag)
			{
				$checkedY='';
				$checkedN='';
				if ($paramflag=='Y')
					$checkedY='checked';
				if ($paramflag=='N')
					$checkedN='checked';
				
					$outputStr .= "<tr><td>$sr</td><td>".$parametes[$paramid]."</td>";
				$outputStr.="<td><input type='radio' name='".$paramid.$sr."' value='Y' $checkedY>Yes";
				$outputStr.="<input type='radio' name='".$paramid.$sr."' value='N' $checkedN>No</td></tr>";
				$sr++;
			}
			$outputStr .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
		}
		
		foreach ($parameterArr as $paramid=>$paramflag)
		{
			if(in_array($userid,$this->coOrdinateTeachers) || in_array($userid,$this->masterusers))
			{
				if ($paramid==1 && $paramflag == 'Y')// Meeting with the Principal
				{
					$principalDetailsArr = $this->getPrincipalDetails($visitid,$connid,$paramid);
					if($principalDetailsArr['dur']==0)
						$principalDetailsArr['dur'] ='';
					
					$outputStr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='white'><b>".$parameterNames[$paramid]."</b></font></td></tr>";
					$outputStr .= "<tr><td align='center'><b>Duration</b></td><td align='center'><b>Points Discussed/Comments</b></td></tr>";
					$outputStr .= "<tr><td><input type='text' size='2' name='DurationPrincipal' id='DurationPrincipal' value='".$principalDetailsArr['dur']."'> (mins)</td>";
					$outputStr .= "<td><textarea name='DiscussionPrincipal' id='DiscussionPrincipal' rows=3 cols=25>".$principalDetailsArr['disc']."</textarea></td></tr></table><br>";
					$flag1 = 'Y';
				}
				if (($paramid==2 && $paramflag == 'Y') || ($paramid==4 && $paramflag == 'Y'))// Meeting with Core Team and group teachers
				{
					if ($paramid==2)
						$isCTGT = 'CT';
					if ($paramid==4)
						$isCTGT = 'GT';
					
					$meetingDetailsArr = $this->getPrincipalDetails($visitid,$connid,$paramid);
					if($meetingDetailsArr['dur']==0)
						$meetingDetailsArr['dur'] ='';
					$ids = explode(",",$meetingDetailsArr['ids']);
					//print_r($ids);
					$outputStr .= "<table border=1 style='border-collapse: collapse' align='center'><tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='white'><b>".$parameterNames[$paramid]."</b></font></td></tr>";
					$outputStr .= "<tr><td colspan='2'>Please select other team members present:</td></tr>";
					$no = 1;
					
					if ($paramid==2)
					{
						foreach ($coreTeachers as $teacherid)
						{
							$checked = '';
							if (in_array($teacherid,$ids))
								$checked = 'checked';
							
							$outputStr .="<tr><td align='center'><input type='checkbox' name='".$isCTGT."teacher$no' id='".$isCTGT."teacher$no' $checked></td><td>".$teacherNames[$teacherid][$schoolcode]."</td></tr>";
							$no++;
						}
					}
					elseif ($paramid==4)
					{
						foreach ($allTeachers as $teacherid=>$teacher)
						{
							$checked = '';
							if (in_array($teacherid,$ids))
								$checked = 'checked';
							
							$outputStr .="<tr><td align='center'><input type='checkbox' name='".$isCTGT."teacher$no' id='".$isCTGT."teacher$no' $checked></td><td>".$teacherNames[$teacherid][$schoolcode]."</td></tr>";
							$no++;
						}
					}
					$outputStr .= "<tr><td align='center'><b>Duration</b></td><td align='center'><b>Points Discussed/Comments</b></td></tr>";
					$outputStr .= "<tr><td><input type='text' size='2' name='".$isCTGT."DurationCore' id='".$isCTGT."DurationCore' value='".$meetingDetailsArr['dur']."'> (mins)</td>";
					$outputStr .= "<td><textarea name='".$isCTGT."DiscussionCore' id='".$isCTGT."DiscussionCore' rows=3 cols=25>".$meetingDetailsArr['disc']."</textarea></td></tr></table><br>";
					if ($paramid==2)
						$flag2 = 'Y';
					if ($paramid==4)
						$flag4 = 'Y';
				}
			}
			if (($paramid==5 && $paramflag=='Y') || ($paramid==6 && $paramflag=='Y'))// Class room observation and Demo lesson
			{
				if ($paramid==5)
					$isCODL = 'CO';
				if ($paramid==6)
					$isCODL = 'DL';
				
				$outputStr .= "</table><br><table border=1 style='border-collapse: collapse' align='center'><tr bgcolor='".$this->logocolor2."'><td align='center' colspan='9'><font color='white'><b>".$parameterNames[$paramid]."</b></font></td></tr>";
				$outputStr .= "<tr><td><b>Srno</b></td><td><b>Class</v></td><td><b>Section</b></td><td><b>Subject</b></td><td><b>Teacher Name</b></td><td><b>Which Lesson</b></td><td><b>From Time<br>(hh:mm)</b></td><td><b>To Time<br>(hh:mm)</b></td><td><b>Comments</b></td></tr>";
				
				$srno = 1;
				$condition='';
				
				//print_r ($coOrdinateTeachers);
				//if (!in_array($userid,$coOrdinateTeachers) && !in_array($userid,$this->masterusers))
				$condition = " AND enteredby='".$userid."'";
					
				$query="SELECT * FROM tst_classroomobservation_demolesson WHERE visitid=$visitid AND isCODL='$isCODL' $condition";
				
				//echo $query."<br>";
				$dbquery = new dbquery($query,$connid);
				while ($row = $dbquery->getrowarray())
				{
					$fromtime = explode(":",$row['from_time']);
					$totime = explode(":",$row['to_time']);
					$parameters = $srno.",'".$isCODL."'";
					$outputStr .= "<tr align='center'><td>$srno</td><td><select name='".$isCODL."class$srno' id='".$isCODL."class$srno' onchange=getteachername($parameters)><option value=''>Select</option>";
					foreach ($this->classArr as $class)
					{
						if ($row['class']==$class)
							$selected = 'selected';
						else 
							$selected='';
						$outputStr .= "<option value='$class' $selected>$class</option>";
					}
					$outputStr .= "</select></td><td><select name='".$isCODL."section$srno' id='".$isCODL."section$srno' onchange=getteachername($parameters)><option value=''>Select</option>";
					foreach ($this->sectionArray as $section)
					{
						if ($row['section']==$section)
							$selected = 'selected';
						else 
							$selected='';
							
						$outputStr .= "<option value='$section' $selected>$section</option>";
					}
					$outputStr .= "</select></td><td><select name='".$isCODL."subject$srno' id='".$isCODL."subject$srno' onchange=getteachername($parameters)><option value=''>Select</option>";
					foreach ($this->subjectArray as $subjectid=>$subject)
					{
						if ($row['subjectid']==$subjectid)
							$selected = 'selected';
						else 
							$selected='';
						$outputStr .= "<option value='$subjectid' $selected>$subject</option>";
					}
					$teacherName = $this->teacherArray;
					$outputStr .= "</select></td><td><input type='text' name='".$isCODL."teacherName$srno' id='".$isCODL."teacherName$srno' value='".$teacherName[$row['teacherid']][$schoolcode]."' readonly></td>";
					$outputStr .= "<td><input type='text' name='".$isCODL."lesson$srno' id='".$isCODL."lesson$srno' value='".$row['whichlesson']."'></td>";
					$outputStr .= "<td nowrap><input type='text' name='".$isCODL."hh$srno' id='".$isCODL."hh$srno' size=1  value='$fromtime[0]'>:<input type='text' name='".$isCODL."mm$srno' id='".$isCODL."mm$srno' size=1 value='$fromtime[1]'></td>";
					$outputStr .= "<td nowrap><input type='text' name='".$isCODL."durationhh$srno' id='".$isCODL."durationhh$srno' size=1 value='".$totime[0]."'>:<input type='text' name='".$isCODL."durationmm$srno' id='".$isCODL."durationmm$srno' size=1 value='".$totime[1]."'></td>";
					$outputStr .= "<td><textarea name='".$isCODL."comments$srno' id='".$isCODL."comments$srno' rows=3 cols=20>".$row['comments']."</textarea></td></tr>";
					//$outputStr .= "</table><br>";
					if ($paramid==5)
						$flag5 = 'Y';
					if ($paramid==6)
						$flag6 = 'Y';
						
					$srno++;
				}
				if ($srno>$this->counterCO)
					$this->counterCO = $srno;
				
				for ($i=$srno;$i<=$this->counterCO;$i++)
				{
					$parameters = $srno.",'".$isCODL."'";
					$outputStr .= "<tr align='center'><td>$srno</td><td><select name='".$isCODL."class$srno' id='".$isCODL."class$srno' onchange=getteachername($parameters)><option value=''>Select</option>";
					foreach ($this->classArr as $class)
					{
						$outputStr .= "<option value='$class'>$class</option>";
					}
					$outputStr .= "</select></td><td><select name='".$isCODL."section$srno' id='".$isCODL."section$srno' onchange=getteachername($parameters)><option value=''>Select</option>";
					foreach ($this->sectionArray as $section)
					{
						$outputStr .= "<option value='$section'>$section</option>";
					}
					$outputStr .= "</select></td><td><select name='".$isCODL."subject$srno' id='".$isCODL."subject$srno' onchange=getteachername($parameters)><option value=''>Select</option>";
					foreach ($this->subjectArray as $subjectid=>$subject)
					{
						$outputStr .= "<option value='$subjectid'>$subject</option>";
					}
					$teacherName = $this->teacherArray;
					$outputStr .= "</select></td><td><input type='text' name='".$isCODL."teacherName$srno' id='".$isCODL."teacherName$srno' readonly></td><td><input type='text' name='".$isCODL."lesson$srno' id='".$isCODL."lesson$srno'></td>";
					$outputStr .= "<td nowrap><input type='text' name='".$isCODL."hh$srno' id='".$isCODL."hh$srno' size=1>:<input type='text' name='".$isCODL."mm$srno' id='".$isCODL."mm$srno' size=1></td>";
					$outputStr .= "<td nowrap><input type='text' name='".$isCODL."durationhh$srno' id='".$isCODL."durationhh$srno' size=1>:<input type='text' name='".$isCODL."durationmm$srno' id='".$isCODL."durationmm$srno' size=1></td>";
					$outputStr .= "<td><textarea name='".$isCODL."comments$srno' id='".$isCODL."comments$srno' rows=3 cols=20></textarea></td></tr>";

					
					$srno++;
				}
				$outputStr .= "</table><br>";
				if ($paramid==5)
					$flag5 = 'Y';
				if ($paramid==6)
					$flag6 = 'Y';
			}
		}
		$ct = 'CT';
		$gt = 'GT';
		//$outputStr .= "<tr align='center'><td colspan='2'><input type='button' name='save' id='save' value='Save' onclick='return saveVisitDetails($totalCoreTeachers,`$flag1`,`$flag2`)'></td></tr>";
		$pass = $totalCoreTeachers.",$totalAllTeachers,'".$ct."','".$gt."','$flag1','$flag2','$flag4','$flag5','$flag6',$this->counterCO,$this->counterCO,'$this->mode'";
		$outputStr .= '<p align=center><input type=button name=save id=save value=Save onclick="return saveVisitDetails('.$pass.')">';
		//$outputStr .= '<p align=center><input type=button name=save id=save value=Save onclick="return saveVisitDetails1()">';
		
		$outputStr .= "<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		echo $outputStr;
	}
	
	function getPrincipalDetails($visitid,$connid,$flag)
	{
		$arr = array();
		if ($flag==1)
			$query="SELECT principal_duration as dur,principal_discussion as disc FROM tst_schoolvisitmaster WHERE visitid=$visitid";
		elseif ($flag==2)
			$query="SELECT coreteam_duration as dur,coreteam_discussion as disc,coreteamteachers_present as ids FROM tst_schoolvisitmaster WHERE visitid=$visitid";
		elseif ($flag==4)
			$query="SELECT groupteam_duration as dur,groupteam_discussion as disc,groupteam_present as ids FROM tst_schoolvisitmaster WHERE visitid=$visitid";
		
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$arr['dur'] = $row['dur'];
			$arr['disc'] = $row['disc'];
			$arr['ids']  = $row['ids'];
		}
		return $arr;
	}
	
	function getTeacherid($schoolcode,$subjectid,$class,$section,$connid)
	{
		/*$query="SELECT teacherid FROM tst_teacher_subjectclassmapping WHERE subjectid='$subjectid' AND class='$class' AND section='$section'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$getTeacherArr[$row['subjectid']][$row['class']][$row['section']] = $row['teacherid'];
		}*/
		$query="SELECT a.teacherid AS TID FROM tst_teacher_subjectclassmapping a, tst_teachermaster b WHERE b.SchoolCode=$schoolcode AND a.teacherid=b.teacherid AND a.class=$class AND a.section='$section' AND a.subjectid=$subjectid";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$teacherid=$row['TID'];
		return $teacherid;
	}
	
	function fetchCoreTeam($schoolcode,$connid)
	{
		$coreteamArr = array();
		$query = "SELECT * FROM  tst_teachermaster WHERE SchoolCode=$schoolcode AND coreteammember='Y'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			array_push($coreteamArr,$row['teacherid']);
		}
		return $coreteamArr;
	}
	
	function fetchCharacteristicDetails($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		$intrvParamArr = $this->intrvparamArr;
		$charDetailsArr = $this->getCharacteristicsDetails($schoolcode,$connid);
		$datesArr = $this->characteristicDates($schoolcode,$connid);
		//print_r($intrvParamArr);
		$colspan = count($datesArr)+2;
		//$colspan = 2;
		
		$charArr = $this->charArr;
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='$colspan' align='center'><b>School Characteristics Details</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='$colspan' align='center'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr align='center'><td><b>SrNo</b></td><td><b>Characteristic</b></td>";//<td><b>Details</b></td></tr>";
		
		foreach ($datesArr as $date)
		{
			$intrvid = $this->getIntrvId($schoolcode,$date,$connid);
			if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
				$outputStr .= "<td nowrap><b>".$intrvParamArr[$intrvid]."<br>(<a href=javascript:browse_window('$date',4);>".formatDate($date)."</a>)</b></td>";
			else 
				$outputStr .= "<td><b>".formatDate($date)."</b></td>";
		}
		$outputStr .= "</tr>";
		$srno =1;
		foreach ($charArr as $charid=>$charValue)
		{
			$outputStr .= "<tr><td align='center'>$srno</td><td>$charValue</td>";
			//$outputStr .= "<tr><td align=center colspan=2><b>Details</b></td></tr>";
			foreach ($datesArr as $date)
			{
				$outputStr .= "<td>".$charDetailsArr[$schoolcode][$charid][$date]."</td>";//<td>".formatDate($date)."</td>
			}
			$outputStr .= "</tr>";
			$srno++;
		}
		if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{
			$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='$colspan' align='center'><b><a href='javascript:browse_window(0,4);'>Add Details</a></b></td></tr>";
		}
		$outputStr .= "</table>";
		echo $outputStr;
	}
	
	function AddCharacteristicDetails($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$date = $this->chardate;
		$intrvParamArr = $this->intrvparamArr;
		if ($date!='' && $date!='0')
		{
			$dateValue = formatDate($date);
			$intrvidValue = $this->getIntrvId($schoolcode,$date,$connid);
		}
		$detailsArr = $this->getCharacteristicDetails($schoolcode,$date,$connid);
		
		$charArr = $this->charArr;
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='3' align='center'><b>Characteristic Details</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='3' align='center'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr align='center'><td colspan=3><b>Date: </b><input name='chardate' type='text' id='chardate' onfocus='showCalendarControl(this);' onkeyup='showCalendarControl(this);' size='15' maxlength='10' value='".$dateValue."'>";
		$outputStr .= "&nbsp;&nbsp;&nbsp;&nbsp;<b>Intervention Parameter: </b><select name='intrvid' id='intrvid'><option value=''>Select</option>";
		foreach ($intrvParamArr as $intrvid=>$intrvparam)
		{
			$selected = '';
			if ($intrvid==$intrvidValue)
				$selected='selected';
			$outputStr .= "<option value='$intrvid' $selected>$intrvparam</option>";
		}
		$outputStr .= "</select></td></tr>";
		$outputStr .= "<tr align='center'><td><b>SrNo</b></td><td><b>Characteristic</b></td><td><b>Details</b></td></tr>";
		
		$srno = 1;
		foreach ($charArr as $charid=>$charValue)
		{
			$outputStr .= "<tr><td align=center>$srno</td><td>$charValue</td><td><textarea name='char$charid' id='char$charkey' rows=2 cols=30>".$detailsArr[$charid]."</textarea></td></tr>";
			$srno++;
		}
		$outputStr .= "<tr><td colspan='3' align='center'><input type=button name=save id=save value=Save onclick=saveChar('$date')></td></tr>";
		$outputStr .= "</table><br><p align=center><b><a href='javascript:window.close();'>Close</a></b></p><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		echo $outputStr;
	}
	
	function getCharacteristicDetails($schoolcode,$date,$connid)
	{
		$detailsArr = array();
		$query = "SELECT * FROM tst_characteristics_details WHERE SchoolCode=$schoolcode AND date='$date'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			//array_push($detailsArr,$row['date']);
			$detailsArr[$row['charid']] = $row['chardetails'];
		}
		return $detailsArr;
	}
	
	function characteristicDates($schoolcode,$connid)
	{
		$datesArr = array();
		$query = "SELECT DISTINCT date FROM tst_characteristics_details WHERE SchoolCode=$schoolcode";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			array_push($datesArr,$row['date']);
		}
		return $datesArr;
	}
	
	function getIntrvId($schoolcode,$date,$connid)
	{
		$query = "SELECT DISTINCT intrvid FROM tst_characteristics_details WHERE SchoolCode=$schoolcode AND date='$date'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['intrvid'];
	}
	
	function getCharacteristicsDetails($schoolcode,$connid)
	{
		$detailsArr = array();
		$query = "SELECT * FROM tst_characteristics_details WHERE SchoolCode=$schoolcode ORDER BY date";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			//array_push($detailsArr[$schoolcode],$row['date']);
			$detailsArr[$schoolcode][$row['charid']][$row['date']] = $row['chardetails'];
		}
		return $detailsArr;
	}
	
	function fetchStudentDetails($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='7' align='center'><b>Students Details</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='7' align='center'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr align='center'><td><b>SrNo</b></td><td><b>Student Name</b></td><td><b>MS userid</b></td><td><b>Date of Birth</b></td><td><b>Gender</b></td><td><b>Class</b></td><td><b>Section</b></td>";
		/*if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{
			$outputStr .= "<td><b>Actions</b></td>";
		}*/
		$outputStr .= "</tr>";
		
		$msschoolcode=$this->getMSschoolcode($schoolcode,$connid);
		
		$srno=1;
		//$query = "SELECT * FROM tst_studentmaster WHERE SchoolCode=$schoolcode AND status='A' ORDER BY class,section";
		$query = "SELECT * FROM educatio_msguj.adepts_userDetails WHERE schoolCode=$msschoolcode AND category='STUDENT' AND subcategory='School' AND enabled=1 ORDER BY childClass,childSection";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			//$studentid = $row['studentid'];
			$dob = formatDate($row['childDob']);
			if ($dob=='00-00-0000')
				$dob='';
			$gender = $row['gender'];
			/*if ($gender=='B')
				$gender='Boy';
			elseif ($gender=='G')
				$gender='Girl';*/
				
			//$outputStr .= "<tr align='center'><td align='center'>".$srno."</td><td nowrap align='left'>".$row['name']."</td><td nowrap>".$dob."</td><td>".$gender."</td><td>".$row['class']."</td><td>".$row['section']."</td>";
			$outputStr .= "<tr align='center'><td align='center'>".$srno."</td><td nowrap align='left'>".$row['childName']."</td><td>".$row['userID']."</td><td nowrap>&nbsp;".$dob."</td><td>&nbsp;".$gender."</td><td>".$row['childClass']."</td><td>&nbsp;".$row['childSection']."</td>";
			/*if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
			{
				$outputStr .= "<td nowrap><img title='Edit' src='images/edit.png' onclick='javascript:browse_window($studentid,6)' > | ";
				$outputStr .= "<img title='Delete' src='images/delete.png' onclick=deleteStudent($studentid)>  |  ";
				$outputStr .= "<img title='See Photograph' src='images/students/$studentid.jpg' height=20 width=20 onmouseover=showStudentImage($studentid,event) onmouseout=hideStudentImage($studentid)>";
				$outputStr .= "<img style='display:none' id='img$studentid' src='images/students/$studentid.jpg' height=150 width=150 title='' alt='Photograph not found'></td>";
			}*/
			$outputStr .= "</tr>";
			$srno++;
		}
		/*if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{
			$outputStr .= "<tr><td colspan='7' align='center'><a href='javascript:browse_window(0,6)'>Add New Student</a></td></tr>";
		}*/
		$outputStr.="</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		echo $outputStr;
	}
	
	function updateStudentDetails($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$studentid = $this->studentid;
		$schoolsArr = $this->schoolsArr_func($connid);
		//print_r($_POST);
		$outputStr  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>Student Details</font></b></td></tr>";
			
		$query = "SELECT * FROM tst_studentmaster WHERE studentid=$studentid";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		//{
			$dob = '';
			if ($row['date_of_birth']=='0000-00-00' || $row['date_of_birth']=='')
				$dob='';
			else 
				$dob=formatDate($row['date_of_birth']);
			
			$male='';
			$femalemale='';
			if ($row['gender'] == 'B')
				$male='selected';
			if ($row['gender'] == 'G')
				$female='selected';
			
			$outputStr .= "<tr><td><b>Student Name:</b></td><td><input type=text name=student id=student value='".$row['name']."'></td></tr>";
			$outputStr .= "<tr><td><b>School Name:</b></td><td><select name='school' id='school'><option value=''>Select</option>";
			
			foreach ($schoolsArr as $schcode=>$schname)
			{
				$selected='';
				if ($schcode==$schoolcode)
					$selected = 'selected';
				$outputStr .= "<option value=$schcode $selected>$schname</option>";
			}
			$outputStr .=	"</select></td></tr>";
				
			$outputStr .= "<tr><td><b>Gender:</b></td><td><select name='gender' id='gender'><option value=''>Select</option>";
			$outputStr .= "<option value='Boy' $male>Boy</option><option value='Girl' $female>Girl</option></td></tr>";
			$outputStr .= "<tr><td><b>Date of Birth:</b></td>";
			$outputStr .= "<td><input name='birthdate' type='text' id='birthdate' value='".$dob."' onfocus='showCalendarControl(this);' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
			$outputStr .= "<tr><td><b>Phone No:</b></td><td><input type=text name=phone id=phone value='".$row['phone']."'></td></tr>";
			$outputStr .= "<tr><td><b>Email Address:</b></td><td><input type=text name=email id=email value='".$row['email']."'></td></tr>";
			$outputStr .= "<tr><td><b>Class:</b></td><td><select name='cls' id='cls'><option value=''>Select</option>";
			foreach ($this->classArr as $cls)
			{
				$selected = '';
				if ($row['class']==$cls)
					$selected='selected';
				$outputStr .= "<option value='$cls' $selected>$cls</option>";
			}
			$outputStr .= "</select></td></tr>";
			$outputStr .= "<tr><td><b>Section:</b></td><td><select name='section' id='section'><option value=''>Select</option>";
			foreach ($this->sectionArray as $section)
			{
				$selected = '';
				if ($row['section']==$section)
					$selected='selected';
				$outputStr .= "<option value='$section' $selected>$section</option>";
			}
			$outputStr .= "</select></td></tr>";
			$outputStr .= "<tr><td><b>Upload Image:</b></td><td><input type=file name='studentpic' id='studentpic'></td>";
			
		//}
		$outputStr .= "<tr align=center><td colspan=2><input type=button name=save id=save value=Save onclick='updateStudent($studentid)'></td></tr>";
		
		$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'><br>";
		$outputStr .= "<p align='center'><b><a href='javascript:window.close();'>Close</a></b></p>";
		echo $outputStr;
	}
	
	function fetchEnrollmentData($schoolcode,$connid,$ms)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$msschoolcode=$this->getMSschoolcode($schoolcode,$connid);
		$classArr = $this->getClasses_func($msschoolcode,$connid);
		$colspan = count($classArr)+1;
		
		$outputStr  = "<table border=1 width=100% style='border-collapse: collapse'>";
		if($ms=='MS')
			$outputStr .= "<tr align=center bgcolor=$this->logocolor2><td colspan='$colspan'><b><font color='#FFFFFF'>Mindspark Registration Details</font></b></td></tr><tr align=center><td rowspan=2></td><td colspan=$colspan>Class</td></tr>";
		else 
			$outputStr .= "<tr align=center bgcolor=$this->logocolor2><td colspan='$colspan'><b><font color='#FFFFFF'>Enrollment Details</font></b></td></tr><tr align=center><td rowspan=2></td><td colspan=$colspan>Class</td></tr>";
		$outputStr.="<tr align=center>";
		foreach ($classArr as $cls)
		{
			$outputStr .= "<td>$cls</td>";
		}
		$outputStr .="</tr><tr  align=center><td>Girls</td>";
		foreach ($classArr as $cls)
		{
			$totalGirls = $this->getClassesStudentsCount($schoolcode,$cls,$connid,'G',$ms);
			$outputStr .= "<td><a href=javascript:browse_window('G',10,$cls)>".$totalGirls."</a></td>";
		}
		$outputStr .="</tr><tr align=center><td>Boys</td>";
		foreach ($classArr as $cls)
		{
			$totalBoys = $this->getClassesStudentsCount($schoolcode,$cls,$connid,'B',$ms);
			$outputStr .= "<td><a href=javascript:browse_window('B',10,$cls)>".$totalBoys."</a></td>";
		}
		$outputStr .="</tr><tr  align=center><td>Total</td>";
		foreach ($classArr as $cls)
		{
			$total = $this->getClassesStudentsCount($schoolcode,$cls,$connid,$ms);
			$outputStr .= "<td><a href=javascript:browse_window('',10,$cls)>".$total."</a></td>";
		}
		$outputStr .= "</tr></table>";
		echo $outputStr;
	}
	
	function getClasses_func($msschoolcode,$connid)
	{
		$arr = array();
		$query = "SELECT DISTINCT childClass FROM educatio_msguj.adepts_userDetails WHERE schoolcode=$msschoolcode AND childClass!='' ORDER BY childClass";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			array_push($arr,$row['childClass']);
		}
		return 	$arr;
	}
	function getClassesStudentsCount($schoolcode,$class,$connid,$gender,$ms)
	{
		if ($gender=='B')
			$condition=" AND gender='Boy'";
		elseif ($gender=='G')
			$condition=" AND gender='Girl'";
		else 
			$condition ='';
			
		/*if ($ms='MS')
			$condition .= " AND (msuserID!=0 OR msuserID!='')";*/
			
		$msschoolcode=$this->getMSschoolcode($schoolcode,$connid);
		//$query = "SELECT count(*) as total FROM tst_studentmaster WHERE schoolcode=$schoolcode AND class=$class AND status='A' $condition";
		$query = "SELECT count(*) as total FROM educatio_msguj.adepts_userDetails WHERE schoolcode=$msschoolcode AND category='STUDENT' AND subcategory='School' AND enabled=1 AND childClass=$class $condition";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return 	$row['total'];
	}
	
	function addNewUser($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$userid = $this->Userid;
		$usertypeArr = array("AD"=>"Admin User","EF"=>"EI Faculty","EI"=>"EI User","TO"=>"Torrent User","OT"=>"Other User");
		if ($userid!='')
		{
			$query="SELECT * FROM tst_users WHERE userid='$userid'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if (isset($_POST['userid']))
				$getuserid= $_POST['userid'];
			else 
				$getuserid= $row['userid'];
			if (isset($_POST['flname']))
				$flname= $_POST['flname'];
			else 
				$flname= $row['fullname'];
			if (isset($_POST['email']))
				$email=$_POST['email'];
			else 
				$email=$row['email'];
			if (isset($_POST['usertype']))
				$rowusertype=$_POST['usertype'];
			else 
				$rowusertype=$row['usertype'];
			
			$outputStr  = "<table border=1 style='border-collapse: collapse' align=center>";
			
			$outputStr .= "<tr><th colspan=2><b>Add Nem User</b></th></tr>";
			$outputStr .= "<tr><td><b>Userid:</b></td><td><input type=text name=userid id=userid value='".$getuserid."'></td></tr>";
			$outputStr .= "<tr><td><b>Fullname:</b></td><td><input type=text name=flname id=flname value='".$flname."'></td></tr>";
			$outputStr .= "<tr><td><b>Email:</b></td><td><input type=text name=email id=email value='".$email."'></td></tr>";
			$outputStr .= "<tr><td><b>Usertype:</b></td><td><select name=usertype id=usertype><option value=''>Select</option>";
			foreach ($usertypeArr as $usertype=>$value)
			{
				$selected='';
				if ($usertype==$rowusertype)
					$selected='selected';
				$outputStr .= "<option value='$usertype' $selected>$value</option>";
			}
			$outputStr .= "</select></td></tr>";
			$outputStr .= "<tr align=center><td colspan=2><input type=button name=save id=save value=Save onclick=addUser('$userid')></td></tr>";
			$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
			$outputStr .= "<p align=center><a href='javascript:window.close();'><b>Close</b></a></p>";
			
			echo $outputStr;
		}
	}
	
	function insertNewUser($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$userid = $this->Userid;
		$userdetailsArr = $this->getUserDetails($userid,$connid);
		$headers  = "MIME-Version: 1.0\r\n";
		$headers .= "From: system@ei-india.com\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		//$headers .= "Bcc: \r\n";
					
		if ($this->actiontoperform == "Add User")
		{
			$adduserid = $_POST['userid'];
			$fullname = $_POST['flname'];
			$password = randomPasswordGenerator();
			$email = $_POST['email'];
			$utype = $_POST['usertype'];
		
			if ($userid!='' && $userid!='0')
			{
				$query = "UPDATE tst_users SET userid='$adduserid',fullname='$fullname',email='$email',usertype='$utype' WHERE userid='$userid'";
				//echo $query;
				$dbquery = new dbquery($query,$connid);
				echo "<script>window.opener.location.reload(true);window.close();</script>";
			}
			else 
			{
				$query = "SELECT COUNT(*) FROM tst_users WHERE userid='$adduserid'";
				//echo $query;
				$dbquery = new dbquery($query,$connid);
				$row=$dbquery->getrowarray();
				if ($row['COUNT(*)']>0)
					echo "<p align=center><font color=red><b>Userid '$adduserid' Already exists.</b></font></p>";
				else
				{
					$query = "INSERT INTO tst_users SET userid='$adduserid',fullname='$fullname',password=password('$password'),email='$email',usertype='$utype'";
					//echo $query;
					$dbquery = new dbquery($query,$connid);
					if ($dbquery)
					{					
						$msg = "Dear $fullname,<br><br>Your account has been created with Torrent System. Your user name is $adduserid and password is $password.<br><br>This is auto generated mail.";
						if (mail($email,"Torrent System - Login Details",$msg,$headers))
							echo "<p align=center><b><font color=red>The new user named $fullname is created and the login details has been sent to his/her email address.</font></b></p>";
					}
					echo "<script>window.opener.location.reload(true);window.close();</script>";
				}
			}
		}
		if ($this->actiontoperform == "Delete User")
		{
			$query="DELETE FROM tst_users WHERE userID='".$this->Userid."'";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
		}
		if ($this->actiontoperform == "Reset PWD")
		{
			$password = randomPasswordGenerator();
			$email = $userdetailsArr['email'];
			$fullname = $userdetailsArr['fullname'];
			$query="UPDATE tst_users SET password=password('$password') WHERE userID='".$this->Userid."'";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			if ($dbquery)
			{
				$msg = "Dear $fullname,<br><br>Your password has been changed with Torrent System. Your user name is $this->Userid and password is $password.<br><br>This is auto generated mail.";
				if (mail($email,"Torrent System - Password Reset",$msg,$headers))
					echo "<p align=center><b><font color=red>The password for $fullname is reset and sent to his/her email address.</font></b></p>";
			}
		}
		if ($this->actiontoperform == "Delete Action Point")
		{
			$query="UPDATE tst_actionpoints_master SET status='D' WHERE actionid='".$this->actionid."'";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
		}
		if ($this->actiontoperform == "Add Action Point")
		{
			$actionid=$this->actionid;
			if ($actionid==0)
				$query="INSERT INTO tst_actionpoints_master SET actionpoint='".$_POST['actionsummary']."',subjectid='".$_POST['actionpoints']."' ";
			else if($actionid!=0)
				$query="UPDATE tst_actionpoints_master SET actionpoint='".$_POST['actionsummary']."' WHERE actionid=$actionid";
			
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			if ($dbquery)
				echo "<script>window.opener.location.reload(true);window.close();</script>";
		}
	}
	
	function viewUser($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$outputStr = "<br><table border=1 style='border-collapse: collapse' align=center>";
		$outputStr .= "<tr align=center><th><b>SrNo</b></th><th><b>Full Name</b></th><th><b>UserID</b></th><th><b>Email Address</b></th><th><b>Usertype</b></th><th>Action</th></tr>";
		
		$srno=1;
		$query="SELECT * FROM tst_users";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$userid = $row['userid'];
			$usertype = "";
			if ($row['usertype']=='AD')
				$usertype='Admin';
			if ($row['usertype']=='EF')
				$usertype='EI Faculty';
			if ($row['usertype']=='EI')
				$usertype='EI';
			if ($row['usertype']=='TO')
				$usertype='Torrent';
			if ($row['usertype']=='OT')
				$usertype='Other';
			
			$outputStr .= "<tr><td align=center>$srno</td><td>".$row['fullname']."</td><td>".$row['userid']."</td><td>".$row['email']."</td><td align=center>".$usertype."</td>";
			$outputStr .= "<td><img src='images/edit.png' onclick=javascript:browse_window('$userid',8); title='Edit'> | <img src='images/delete.png' onclick=javascript:deleteUser('$userid') title='Delete'>";
			$outputStr .= " | <img src='images/reset.png' onclick=javascript:resetPassword('$userid'); title='Reset Password'></td></tr>";
			$srno++;
		}
		$outputStr.="<tr><td colspan=6 align=center><a href='javascript:browse_window(0,8);'><b>Add New User</b></a></td></tr>";
		$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		echo $outputStr;
	}
	
	function getUserDetails($userid,$connid)
	{
		$userDetailsArr = array();
		$query="SELECT * FROM tst_users WHERE userid='$userid'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$userDetailsArr['fullname'] = $row['fullname'];
			$userDetailsArr['email'] = $row['email'];
		}
		return $userDetailsArr;
	}
	
	function viewActionPoints($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$subjectArr = $this->subjectArr($connid);
		$actionPointsArr = $this->actionArr($connid);
		//print_r($this->subjectArray);
		
		$outputStr="<table border=1 style='border-collapse: collapse' align=center>";
		$outputStr .= "<tr align=center><td colspan=3>Select Subject: <select name='actionpoints' id='actionpoints' onchange='javasctiot:document.actionpoints.submit();'><option value=''>Select</option>";
		foreach ($subjectArr as $subjectid=>$subject)
		{
			$checked = "";
			if ($_POST['actionpoints']==$subjectid)
				$checked="selected";
			$outputStr.="<option value=$subjectid $checked>$subject</option>";
		}
		$outputStr .= "</td></tr>";

		$subjectid=$_POST['actionpoints'];
		$srno=1;
		if (isset($subjectid) && $subjectid!='')
		{
			$outputStr .= "<tr><th>SrNo</th><th>Action points of subject $subjectArr[$subjectid]</th><th>Actions</th></tr>";
			foreach ($actionPointsArr[$subjectid] as $actionid=>$action)
			{
				$outputStr .= "<tr><td>$srno</td><td>".$action."</td>";
				$outputStr .= "<td nowrap align=center><img src='images/edit.png' onclick=javascript:browse_window($actionid,9,$subjectid); title='Edit'>";// | <a href=javascript:deleteActionPoint($actionid);><img src='images/delete.png' title='Delete this action point'></a></td></tr>";
				$srno++;
			}
		}
		$outputStr .= "<tr align=center><td colspan=3><a href=javascript:browse_window(0,9);><b>Add New</b></a></td></tr>";
		$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		echo $outputStr;
	}
	
	function addeditActionPoint($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$subjectArr = $this->subjectArr($connid);
		$actionid = $this->actionid;
		$subjectid = $this->subjectid;
		$actionArr = $this->actionArr($connid);
		//print_r($subjectArr);
		
		$outputStr="<table border=1 style='border-collapse: collapse' align=center>";
		if ($actionid==0)
		{
		  	$outputStr .= "<tr><td><b>Select Subject: </b></td><td><select name='actionpoints' id='actionpoints'><option value=''>Select</option>";
			
			foreach ($subjectArr as $subjectid=>$subject)
			{
				$checked = "";
				if ($_POST['actionpoints']==$subjectid)
					$checked="selected";
				$outputStr.="<option value=$subjectid $checked>$subject</option>";
			}
			$outputStr .= "</td></tr>";
		}
		else 
		{
			$outputStr .= "<tr><td><b>Action Point: </b></td><td><input name='actionpoints' id='actionpoints' value='".$subjectArr[$subjectid]."' readonly></td></tr>";
		}
		
		$outputStr .= "<tr><td><b>Action Point: </b></td><td><textarea name='actionsummary' id='actionsummary' rows=4 cols=60>".$actionArr[$subjectid][$actionid]."</textarea></td></tr>";
		$outputStr .= "<tr align=center><td colspan=2><input type=button name=save id=save value=Save onclick=addActionPoint($actionid,$subjectid)></td></tr>";
		$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		$outputStr .= "<br><p align=center><a href='javascript:window.close();'><b>Close</b></a></p>";
		echo $outputStr;
	}
	
	function fetchStudents($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$classArr = $this->getClasses_func($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$gender = $this->gender;
		$class = $this->class;
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='7' align='center'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='7' align='center'><b>Students Details</b></td></tr>";
		$outputStr .= "<tr align='center'><td><b>SrNo</b></td><td><b>Student Name</b></td><td><b>MS userid</b></td><td><b>Date of Birth</b></td><td><b>Gender</b></td><td><b>Class</b></td><td><b>Section</b></td>";
		
		$msschoolcode=$this->getMSschoolcode($schoolcode,$connid);
		
		$condition="";
		if ($gender!='')
			$condition=" AND gender='$gender'";
		$srno=1;
		//$query = "SELECT * FROM tst_studentmaster WHERE SchoolCode=$schoolcode AND status='A' AND class=$class $condition ORDER BY class,section";
		$query = "SELECT * FROM educatio_msguj.adepts_userDetails WHERE SchoolCode=$msschoolcode AND childClass=$class AND enabled=1 $condition ORDER BY childClass,childSection";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			//$studentid = $row['studentid'];
			$dob = formatDate($row['childDob']);
			if ($dob=='00-00-0000')
				$dob='';
			$genderview = $row['gender'];
			/*if ($genderview=='B')
				$genderview='Boy';
			elseif ($genderview=='G')
				$genderview='Girl';*/
				
			$outputStr .= "<tr align='center'><td align='center'>".$srno."</td><td nowrap align='left'>".$row['childName']."</td><td>".$row['userID']."</td><td nowrap>".$dob."</td><td>".$genderview."</td><td>".$row['childClass']."</td><td>".$row['childSection']."</td>";
			/*if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
			{
				$outputStr .= "<td nowrap><img title='Edit' src='images/edit.png' onclick='javascript:browse_window($studentid,6)' > | ";
				$outputStr .= "<img title='Delete' src='images/delete.png' onclick=deleteStudent($studentid)></td>";
			}*/
			$outputStr .= "</tr>";
			$srno++;
		}
		$outputStr.="</table>";
		$outputStr .= "<br><p align=center><a href='javascript:window.close();'><b>Close</b></a></p>";
		echo $outputStr;
	}
	
	function fetchFailureReason($connid)
	{
		$arr=array();
		$query="SELECT * FROM tst_msvisit_failurereasons";
		$dbquery = new dbquery($query,$connid);
		while ($row=$dbquery->getrowarray())
		{
			$arr[$row['failureid']]=$row['failurereason'];
		}
		return $arr;
	}
	function addNewMSVisit($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$msparameters = $this->fetchMSVisitParameters($connid);
		$subjectsArr = $this->subjectArray;
		$classArr = $this->classArr;
		$failurereasonsArr = $this->fetchFailureReason($connid);
		
		$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>Add MS School Visit</b></td></tr>";
		$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		//$outputstr="<table align='center' border='1' cellspacing='0' cellpadding='2'>";
		
		$outputstr.="<tr><td>EI MS Coordinator: </td><td>".$this->getFullName($userid,$connid)."</td></tr>";
		//$outputstr.="<tr><td>Visit Name: </td><td><input type='text' name='msvisitname' id='msvisitname'></td></tr>";
		//$outputstr.="<tr><td>From Time:(hh:mm) </td><td><input type='text' name='fromtimeh' id='fromtimeh' size=1>:<input type='text' name='fromtimem' id='fromtimem' size=1></td></tr>";
		//$outputstr.="<tr><td>To Time:(hh:mm) </td><td><input type='text' name='totimeh' id='totimeh' size=1>:<input type='text' name='totimem' id='totimem' size=1></td></tr>";
		//$outputstr.="<a id='link' href='javascript:addNewVisitName();'>Add New Name</a></td></tr>";
		$outputstr.="<tr><td>Date: </td><td><input name='visitdate' type='text' id='visitdate' onfocus='showCalendarControl(this);' value='".$_POST['visitdate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
		foreach ($msparameters as $paramid=>$visit_parameter)
		{
			$outputstr.="<tr><td>".$visit_parameter.": </td>";
			$outputstr.="<td><input type='radio' name='flag".$paramid."' value='Y' checked>Yes";
			$outputstr.="<input type='radio' name='flag".$paramid."' value='N'>No";
			$outputstr.="<br>Remarks: <input type='text' name='remarks$paramid' size=50></td></tr>";
			//<textarea rows=2 cols=50 name='remarks$paramid'></textarea></td></tr>";
		}
		
		$outputstr.="<tr><td>Key Points (if any) discussed with the teachers: </td><td><textarea rows='3' cols='25' name='keypoints' value='".$_POST['visitsummary']."'></textarea></td></tr>";
		$outputstr.="<tr><td>Key Concerns Observed in MS Lab. (Maths): </td><td><textarea rows='3' cols='25' name='keypoints_maths' value='".$_POST['visitsummary']."'></textarea></td></tr>";
		$outputstr.="<tr><td>Key Concerns Observed in MS Lab. (Gujarati): </td><td><textarea rows='3' cols='25' name='keypoints_gujarati' value='".$_POST['visitsummary']."'></textarea></td></tr>";
		$outputstr.="<tr><td colspan=2>Session Details </td></tr>";
		$outputstr.="<tr><td colspan=2><table width='100%' border=1 cellspacing=0><tr><th>Session No.</th><th>Class</th><th>Subject</th><th>Status</th><th>Issues</th><th>Comments</th></tr>";
		for ($i=1;$i<=$this->totalissues;$i++)
		{
			$outputstr.="<tr><td align='center'>$i</td><td><select name='sessionclass$i' id='sessionclass$i'><option value=''>Select</option>";
			foreach ($classArr as $cls)
			{
				$outputstr.="<option value=$cls>$cls</option>";
			}
			$outputstr.="</select></td><td><select name='sessionsubject$i' id='sessionsubject$i'><option value=''>Select</option>";
			foreach ($subjectsArr as $sub)
			{
				$outputstr.="<option value=$sub>$sub</option>";
			}
			$outputstr.="</select></td><td><input type=radio name='sessionstatus$i' id='sessionstatus$i' value='Success' onclick='disableReasons($i)' checked>Succes<br>";
			$outputstr.="<input type=radio name='sessionstatus$i' id='sessionstatus$i' onclick='enableReasons($i)' value='Fail'>Fail</td>";
			$outputstr.="<td><select name='failure$i' id='failure$i' disabled><option value=''>Select</option>";
			foreach ($failurereasonsArr as $failureid=>$reason)
			{
				$outputstr.="<option value='$reason'>$reason</option>";
			}
			$outputstr.="</td><td><textarea rows=2 cols=50 name='sessionissue$i' id='sessionissue$i'></textarea></td></tr>";
		}
		
		$outputstr.="</table></td></tr>";
		
		/*$outputstr.="<tr><td>Classes Visited: </td><td><table width='100%' border=1 style='border-collapse: collapse' align='center'><tr align=center><td></td>";
		foreach ($this->sectionArray as $section)
		{
			$outputstr.="<td><b>$section</b></td>";
		}
		$outputstr.="<tr>";
		foreach ($this->classArr as $class)
		{
			$outputstr.="<tr align=center><td><b>$class</b></th>";
			foreach ($this->sectionArray as $section)
			{
				$outputstr.="<td><input type=checkbox name='$class.$section' id='$class.$section'></td>";
			}
			$outputstr.="</tr>";
		}
		$outputstr.="</table></td</tr>";*/
		
		$outputstr.="<tr><td colspan='2' align='center'><input type='button' name='Save' id='Save'  class='button' value='Save' onclick='return addeditMSVisitDetails(".$this->totalissues.",1)'></td></tr></table>";
		$outputstr.="<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		return $outputstr;
	}
	
	function editMSVisit($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$msparameters = $this->fetchMSVisitParameters($connid);
		$subjectsArr = $this->subjectArray;
		$classArr = $this->classArr;
		$failurereasonsArr = $this->fetchFailureReason($connid);
		
		$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>Add MS School Visit</b></td></tr>";
		$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		//$outputstr="<table align='center' border='1' cellspacing='0' cellpadding='2'>";
		
		$query="SELECT * FROM tst_msvisitmaster WHERE msvisitid=$this->msvisitid";
		$dbquery = new dbquery($query,$connid);
		$row=$dbquery->getrowarray();
		
		$outputstr.="<tr><td>EI MS Coordinator: </td><td>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
		//$outputstr.="<tr><td>Visit Name: </td><td><input type='text' name='msvisitname' id='msvisitname' value='".$row['visitname']."'></td></tr>";
		//$outputstr.="<tr><td>From Time:(hh:mm) </td><td><input type='text' name='fromtimeh' id='fromtimeh' size=1>:<input type='text' name='fromtimem' id='fromtimem' size=1></td></tr>";
		//$outputstr.="<tr><td>To Time:(hh:mm) </td><td><input type='text' name='totimeh' id='totimeh' size=1>:<input type='text' name='totimem' id='totimem' size=1></td></tr>";
		//$outputstr.="<a id='link' href='javascript:addNewVisitName();'>Add New Name</a></td></tr>";
		$outputstr.="<tr><td>Date: </td><td><input name='visitdate' type='text' id='visitdate' onfocus='showCalendarControl(this);' value='".formatDate($row['msvisitdate'])."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
		foreach ($msparameters as $paramid=>$visit_parameter)
		{
			$query1="select paramflag from tst_visitparameter_details WHERE paramid=$paramid AND visitid=$this->msvisitid AND visittype='MS'";
			$dbquery1 = new dbquery($query1,$connid);
			$row1=$dbquery1->getrowarray();
			
			$ychk="";
			$nchk="";
			if ($row1['paramflag']=='Y')
				$ychk="checked";
			else 
				$nchk="checked";
			$outputstr.="<tr><td>".$visit_parameter.": </td>";
			$outputstr.="<td><input type='radio' name='flag".$paramid."' value='Y' $ychk>Yes";
			$outputstr.="<input type='radio' name='flag".$paramid."' value='N' $nchk>No";
			if ($paramid==7)
				$val=$row['principalmeetingremarks_start'];
			elseif ($paramid==8)
				$val=$row['principalmeetingremarks_end'];
				
			$outputstr.="<br>Remarks: <input type='text' name='remarks$paramid' size=50 value='$val'></td></tr>";
		}
		
		$outputstr.="<tr><td>Key Points (if any) discussed with the teachers: </td><td><textarea rows='3' cols='25' name='keypoints'>".$row['keypoints_teacher']."</textarea></td></tr>";
		$outputstr.="<tr><td>Key Concerns Observed in MS Lab. (Maths): </td><td><textarea rows='3' cols='25' name='keypoints_maths'>".$row['keyconcerns_teacher_maths']."</textarea></td></tr>";
		$outputstr.="<tr><td>Key Concerns Observed in MS Lab. (Gujarati): </td><td><textarea rows='3' cols='25' name='keypoints_gujarati'>".$row['keyconcerns_teacher_gujarati']."</textarea></td></tr>";
		$outputstr.="<tr><td colspan=2>Session Details </td></tr>";
		$outputstr.="<tr><td colspan=2><table width='100%' border=1 cellspacing=0><tr><th>Session No.</th><th>Class</th><th>Subject</th><th>Status</th><th>Issues</th><th>Comments</th></tr>";
		
		//for ($i=1;$i<=$this->totalissues;$i++)
		$i=1;
		$query2="SELECT * FROM  tst_mssession_issues WHERE msvisitid=$this->msvisitid";
		$dbquery2 = new dbquery($query2,$connid);
		while ($row2=$dbquery2->getrowarray())
		{
			$outputstr.="<tr><td align='center'>$i</td><td><select name='sessionclass$i' id='sessionclass$i'><option value=''>Select</option>";
			foreach ($classArr as $cls)
			{
				$checked="";
				if ($row2['class']==$cls)
					$checked="selected";
				$outputstr.="<option value='$cls' $checked>$cls</option>";
			}
			$outputstr.="</select></td><td><select name='sessionsubject$i' id='sessionsubject$i'><option value=''>Select</option>";
			foreach ($subjectsArr as $sub)
			{
				$checked="";
				if ($row2['subject']==$sub)
					$checked="selected";
				$outputstr.="<option value='$sub' $checked>$sub</option>";
			}
			if ($row2['status']=='Success')
			{
				$outputstr.="</select></td><td><input type=radio name='sessionstatus$i' id='sessionstatus$i' value='Success' onclick='disableReasons($i)' checked>Succes<br>";
				$outputstr.="<input type=radio name='sessionstatus$i' id='sessionstatus$i' value='Fail' onclick='enableReasons($i)'>Fail</td>";
			}
			else 
			{
				$outputstr.="</select></td><td><input type=radio name='sessionstatus$i' id='sessionstatus$i' value='Success' onclick='disableReasons($i)'>Succes<br>";
				$outputstr.="<input type=radio name='sessionstatus$i' id='sessionstatus$i' value='Fail' onclick='enableReasons($i)' checked>Fail</td>";
			}
			
			if ($row2['status']=='Success')
				$outputstr.="<td><select name='failure$i' id='failure$i' disabled><option value=''>Select</option>";
			else 
				$outputstr.="<td><select name='failure$i' id='failure$i'><option value=''>Select</option>";
			foreach ($failurereasonsArr as $failureid=>$reason)
			{
				$checked="";
				if ($row2['failurereason']==$reason)
					$checked="selected";
				$outputstr.="<option value='$reason' $checked>$reason</option>";
			}
			$outputstr.="<td><textarea rows=2 cols=50 name='sessionissue$i' id='sessionissue$i'>".$row2['issue']."</textarea></td></tr>";
			$i++;
		}
		$totalsessions=$i-1;
		$outputstr.="</table></td></tr>";
		
		/*$outputstr.="<tr><td>Classes Visited: </td><td><table width='100%' border=1 style='border-collapse: collapse' align='center'><tr align=center><td></td>";
		foreach ($this->sectionArray as $section)
		{
			$outputstr.="<td><b>$section</b></td>";
		}
		$outputstr.="<tr>";
		foreach ($this->classArr as $class)
		{
			$outputstr.="<tr align=center><td><b>$class</b></th>";
			foreach ($this->sectionArray as $section)
			{
				$outputstr.="<td><input type=checkbox name='$class.$section' id='$class.$section'></td>";
			}
			$outputstr.="</tr>";
		}
		$outputstr.="</table></td</tr>";*/
		
		$outputstr.="<tr><td colspan='2' align='center'><input type='button' name='Save' id='Save' class='button' value='Update Details' onclick='return addeditMSVisitDetails(".$totalsessions.",2,$this->msvisitid)'></td></tr></table>";
		$outputstr.="<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		return $outputstr;
	}
	
	function fetchMSVisits($schoolcode,$userid,$connid,$usertype)
	{
		$this->setpostvars();
		$this->setmastervars($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		/*if (in_array($userid,$this->masterusers))
			$colspan= '9';
		else */
			$colspan= '4';
			
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schooldetails  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='$colspan'><b>MS School Visits</b></td></tr>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='$colspan'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		$schooldetails .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Visit Date</b></td><td align='center'><b>Entered By</b></td>";//<td align='center'><b>From Time</b></td><td align='center'><b>To Time</b></td><td align='center'><b>Classes Visited</b></td><td align='center'><b>Summary/Comments</b></td><td align='center'><b>Visit Name</b></td>
		$schooldetails .= "<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		if (in_array($userid,$this->masterusers))
			$schooldetails .= "<td><b>Delete</b></td>";
		$schooldetails .= "</tr>";
		
		$srno = 1;
		//$schquery  = "SELECT * FROM tst_schoolvisitmaster WHERE schoolcode=".$schoolcode." ORDER BY visitdate DESC";
		$schquery  = "SELECT * FROM tst_msvisitmaster WHERE schoolcode=".$schoolcode." ORDER BY msvisitid";
		$dbquery = new dbquery($schquery,$connid);
		while($row = $dbquery->getrowarray())
		{
			//$schooldetails .= "<tr><td align='center'><a href='javascript: viewschoolvisit(".$row['msvisitid'].")'>".$srno."</a></td><td>".$row['visitname']."</td><td align='center' nowrap>".formatDate($row['msvisitdate'])."</td><td>".$row['comments']."</td><td>".$this->getFullName($row['enteredby'],$connid)."</td>";
			$schooldetails .= "<tr><td align='center'><a href='javascript: viewMSschoolvisit(".$row['msvisitid'].")'>".$srno."</a></td><td align='center' nowrap>".formatDate($row['msvisitdate'])."</td><td>".$this->getFullName($row['enteredby'],$connid)."</td>";//<td>".$row['from_time']."</td><td>".$row['to_time']."</td><td>".$row['classesvisited']."</td><td>".$row['comments']."</td><td>".$row['visitname']."</td>
			if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
				$schooldetails .= "<td align='center'><img src='images/delete.png' onclick='return deleteMSVisit(".$row['msvisitid'].");'></td>";
			$schooldetails .= "</tr>";
			$srno++;
		}
		/*if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{*/
			$schooldetails .= "<tr><td align='center' colspan='$colspan'><a href='tst_addmsvisit.php'><b>Add New MS School Visit</b></td></tr></a>";
		//}
		$schooldetails .= "</table>";
		
		if($this->msvisitid!=0)
		{
			if($this->actiontoperform == "Delete MS Visit")
			{
				$query = "DELETE FROM tst_msvisitmaster WHERE msvisitid=$this->msvisitid";
				$dbquery = new dbquery($query,$connid);
				
				$query = "DELETE FROM tst_visitparameter_details WHERE visitid=$this->msvisitid AND visittype='MS'";
				$dbquery = new dbquery($query,$connid);
				
				$query = "DELETE FROM tst_mssession_issues WHERE msvisitid=$this->msvisitid";
				$dbquery = new dbquery($query,$connid);
				//echo "deleted";
				echo "<script>redirectPage('tst_msvisits.php');</script>";
			}
			else 
			{
				$query="SELECT * FROM tst_msvisitmaster WHERE msvisitid=$this->msvisitid";
				$dbquery = new dbquery($query,$connid);
				while ($row=$dbquery->getrowarray())
				{
					$schooldetails .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
					if (in_array($userid,$this->masterusers))
						$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b><a href='javascript:browse_window($this->msvisitid,12)'>Visit Details</a></b></td></tr>";
					else 
						$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>Visit Details</a></b></td></tr>";
					//$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
					$schooldetails.="<tr><td>EI MS Coordinator: </td><td>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
					//$schooldetails.="<tr><td>Visit Name: </td><td><input type='text' name='msvisitname' id='msvisitname'></td></tr>";
					$schooldetails.="<tr><td>Date: </td><td>".formatDate($row['msvisitdate'])."</td></tr>";
					foreach ($msparameters as $paramid=>$visit_parameter)
					{
						$schooldetails.="<tr><td>".$visit_parameter.": </td>";
						$schooldetails.="<td></td></tr>";
					}
					
					$schooldetails.="<tr><td>Key Points discussed with the teachers: </td><td>".$row['keypoints_teacher']."</td></tr>";
					$schooldetails.="<tr><td>Key Concerns Observed in MS Lab. (Maths): </td><td>".$row['keyconcerns_teacher_maths']."</td></tr>";
					$schooldetails.="<tr><td>Key Concerns Observed in MS Lab. (Gujarati): </td><td>".$row['keyconcerns_teacher_gujarati']."</td></tr>";
					$schooldetails.="<tr><td colspan=2>Session Details </td></tr>";
					$schooldetails.="<tr><td colspan=2><table width='100%' border=1 cellspacing=0><tr><th>Session No.</th><th>Class</th><th>Subject</th><th>Status</th><th>Issues</th><th>comments</th></tr>";
					
					$sno=1;
					$querysession="SELECT * FROM  tst_mssession_issues WHERE msvisitid=$this->msvisitid";
					$dbquerysession = new dbquery($querysession,$connid);
					while ($rowsession=$dbquerysession->getrowarray())
					{
						$schooldetails.="<tr><td align='center'>$sno</td><td>".$rowsession['class']."</td><td>".$rowsession['subject']."</td><td>".$rowsession['status']."</td><td>&nbsp;".$rowsession['failurereason']."</td><td>".$rowsession['issue']."</td></tr>";
						$sno++;
					}
					
					$schooldetails.="</table></td></tr>";
					
					$schooldetails.="</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
				}
			}		
		}
		echo $schooldetails;
	}
	
	function WeeklyMSVisitReport($userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();	
		//$this->setmastervars($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		
		$outputstr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr><td><b>Start Date</b></td><td><b>End Date</b></td></tr>";
		$outputstr .= "<tr><td><input type='text' name='msstdate' id='msstdate' onfocus='showCalendarControl(this);' value='".$_POST['msstdate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td>";
		$outputstr .= "<td><input type='text' name='msenddate' id='msenddate' onfocus='showCalendarControl(this);' value='".$_POST['msenddate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td>";
		$outputstr .= "</tr><tr><td colspan='2' align='center'><input type='submit' name='go' value='GO'></td></tr>";
		$outputstr .= "</table><br>";
		
		if ($_POST)
		{
			$startdate=formatDate($_POST['msstdate']);
			$enddate=formatDate($_POST['msenddate']);
			
			$query="SELECT COUNT(DISTINCT SchoolCode) FROM tst_msvisitmaster WHERE msvisitdate BETWEEN '$startdate' AND '$enddate' order by msvisitdate";
			$dbquery = new dbquery($query,$connid);
			$row=$dbquery->getrowarray();
			$schoolscovered=$row[0];
			
			$query="SELECT * FROM tst_msvisitmaster WHERE msvisitdate BETWEEN '$startdate' AND '$enddate' order by msvisitdate";
			$dbquery = new dbquery($query,$connid);
			//$row=$dbquery->getrowarray();
			if ($dbquery->numrows()==0)
				echo "<p align='center'><font color='red' size='3'><b>No visits found.. (*_*)</b></font></p>";
			else 
			{
				$outputstr.="<table border=1 style='border-collapse: collapse' align='center' width='100%'>";
				$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='7'><b>Weekly System Generated Report</b></td></tr>";
				$outputstr .= "<tr align='center'><td><b>School Name</b></td><td nowrap><b>Visit Date</b></td><td><b>Session Details</b></td><td><b>EI MS Coordinator</b></td><td><b>Teacher Interface usage details</b></td><td><b>Teacher MS Usage Details</b></td><td><b>Student MS usage Status</b></td></tr>";
				$outputstr .= "<tr><td colspan='7'><b>Schools Covered: ".$schoolscovered."</b></td></tr>";
			}			
			while ($row=$dbquery->getrowarray())
			{				
				$sessiondetails="<table width='100%' border=1 cellspacing=0><tr><th>Session No.</th><th>Class</th><th>Subject</th><th>Status</th><th>Issues</th><th>comments</th></tr>";
					
				$sno=1;
				$querysession="SELECT * FROM  tst_mssession_issues WHERE msvisitid='".$row['msvisitid']."'";
				$dbquerysession = new dbquery($querysession,$connid);
				while ($rowsession=$dbquerysession->getrowarray())
				{
					$sessiondetails.="<tr><td align='center'>$sno</td><td>".$rowsession['class']."</td><td>".$rowsession['subject']."</td><td>".$rowsession['status']."</td><td>&nbsp;".$rowsession['failurereason']."</td><td>".$rowsession['issue']."</td></tr>";
					$sno++;
				}
				
				$sessiondetails.="</table>";
				$schrow = $this->fetchSchoolGeneralDetails($row['SchoolCode'],$connid);
				$outputstr .= "<tr align='center'><td nowrap>".$schrow['SchoolName']."</td><td nowrap>".formatDate($row['msvisitdate'])."</td><td>$sessiondetails</td><td>".$this->getFullname($row['enteredby'],$connid)."</td><td><b>&nbsp;</b></td><td><b>&nbsp;</b></td><td><b>&nbsp;</b></td></tr>";
			}
			$outputstr.="</table>";
		}
		echo $outputstr;
	}
	
	function viewVisitHistory($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		
		
		$query="SELECT visitname FROM tst_schoolvisitmaster WHERE visitid='$this->visitid'";
		$dbquery = new dbquery($query,$connid);
		$row=$dbquery->getrowarray();
		$visitname = $row['visitname'];
		
		$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan=3><b>".$visitname."</b></td></tr>";
		$outputstr .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Viewed By</b></td><td align='center'><b>Viewed On</b></td></tr>";
		
		$srno=1;
		$query="SELECT * FROM tst_visitviewlog WHERE visitid='$this->visitid' AND visittype='TS'";
		$dbquery = new dbquery($query,$connid);
		while ($row=$dbquery->getrowarray())
		{
			$viewedon = $row['viewedon'];
			$vieweddate = substr($viewedon,0,10);
			$vieweddate = formatDate($vieweddate);
			$viewedtime = substr($viewedon,11,8);
			$outputstr.= "<tr><td align='center'>$srno</td><td>".$this->getFullname($row['viewedby'],$connid)."</td><td>".$vieweddate." ".$viewedtime."</td></tr>";
			$srno++;
		}
		$outputstr .= "</table>";
		$outputstr .= "<br><p align=center><a href='javascript:window.close();'><b>Close</b></a></p>";
		echo $outputstr;
	}
	
	function searchAllVisits($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$coordinatorUsers = $this->coOrdinateTeachers;
		$this->setmastervars(0,$connid);
		$visitnameArr = $this->getVisitNames($connid);
		$schoolArr = $this->schoolsArr_func($connid);
		
		$userstr = "";
	    $query="SELECT DISTINCT userid FROM tst_users ";
	    $result=mysql_query($query) or die(mysql_error());
	    while ($row = mysql_fetch_array($result)) {
	    	$userstr .= "'".$row['userid']."',";
	    }
	    $userstr=substr($userstr,0,-1);
    
    
		$outputstr = "<table border=1 style='border-collapse: collapse' align=center><tr><th colspan=4>Search Visit/s</th></tr>";
		$outputstr.="<tr><td>Visit Name: </td><td><select name=visitname id=visitname><option value=''>Select</option>";
		foreach ($visitnameArr as $name)
		{
			$selected="";
			if ($_POST['visitname']==$name)
				$selected="selected";
			$outputstr.="<option value='$name' $selected>$name</option>";
		}
		$outputstr.="</select></td><td>Visited by: </td><td><input type=text name='userid' id='userid' value='".$_POST['userid']."' autocomplete=off></td></tr>";
		$outputstr .= "<tr><td>From Date: </td><td><input name='fromdate' type='text' id='fromdate' onfocus='showCalendarControl(this);' value='".$_POST['fromdate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td>";
		$outputstr .= "<td>To Date: </td><td><input name='todate' type='text' id='todate' onfocus='showCalendarControl(this);' value='".$_POST['todate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td></tr>";
		$outputstr .= "<tr><td>School: </td><td colspan=3><select name=schoolname id=schoolname><option value=''>Select</option>";
		$outputstr .= "<script language='javascript' type='text/javascript'>
	                        var customarray1=new Array($userstr);
	                        var custom1 = new Array('something','randomly','different');
	                        var ob1 = new actb(document.getElementById('userid'),customarray1);
                        </script>";
		
		foreach ($schoolArr as $schoolcode=>$schoolname)
		{
			$selected="";
			if ($_POST['schoolname']==$schoolcode)
				$selected="selected";
			$outputstr.="<option value='$schoolcode' $selected>$schoolname</option>";
		}
		$outputstr.="</select></td></tr>";
		$outputstr .= "<tr align=center><td colspan=4><input type=button name=search id=search value=Search onclick=searchAllVisits();></td></tr>";
		$outputstr.="</table>";
		echo $outputstr;
		$condition="";
		if (isset($_POST['visitname']) && $_POST['visitname']!='')
			$condition.=" AND visitname='".$_POST['visitname']."'";
		if (isset($_POST['userid']) && $_POST['userid']!='')
			$condition.=" AND enteredby='".$_POST['userid']."'";
		if (isset($_POST['schoolname']) && $_POST['schoolname']!='')
			$condition.=" AND SchoolCode='".$_POST['schoolname']."'";
		if (isset($_POST['fromdate']) && isset($_POST['todate']) && $_POST['fromdate']!='' && $_POST['todate']!='')
			$condition.=" AND enteredon between '".formatDate($_POST['fromdate'])."' AND '".formatDate($_POST['todate'])."'";
		
		if ($_POST)
		{
			if (in_array($userid,$this->masterusers))
				$colspan= '7';
			else 
				$colspan= '6';
			$schooldetails  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
			$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='$colspan'><b>School Visits</b></td></tr>";
			$schooldetails .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Visit Name</b></td><td align='center'><b>Visit Date</b></td><td align='center'><b>Visit Summary</b></td><td align='center'><b>Entered By</b></td><td align='center'><b>School Name</b></td>";
			$schooldetails .= "<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
			if (in_array($userid,$this->masterusers))
				$schooldetails .= "<td><b>Actions</b></td>";
			$schooldetails .= "</tr>";
		
			$srno = 1;
			//$schquery  = "SELECT * FROM tst_schoolvisitmaster WHERE schoolcode=".$schoolcode." ORDER BY visitdate DESC";
			$schquery  = "SELECT * FROM tst_schoolvisitmaster WHERE 1=1 $condition ORDER BY visitid";
			$dbquery = new dbquery($schquery,$connid);
			while($row = $dbquery->getrowarray())
			{
				$visitschcode = $this->getSchoolFromVisit($row['visitid'],$connid);
				$schrow = $this->fetchSchoolGeneralDetails($visitschcode,$connid);
				$schooldetails .= "<tr><td align='center'><a href='javascript: viewsearchvisit(".$row['visitid'].")'>".$srno."</a></td><td>".$row['visitname']."</td><td align='center' nowrap>".formatDate($row['visitdate'])."</td><td>".$row['visit_summary']."</td><td>".$this->getFullName($row['enteredby'],$connid)."</td><td>".$schrow['SchoolName']."</td>";
				if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
					$schooldetails .= "<td align='center'><img src='images/delete.png' onclick='return deleteVisit(".$row['visitid'].");'>  |  <img title='View visit history' src='images/view.png' onclick=javascript:browse_window(".$row['visitid'].",11);></td>";
				$schooldetails .= "</tr>";
				$srno++;
			}
			$schooldetails.="</table><br>";
			if ($this->visitid)
			{
				$_SESSION['visitid'] = $this->visitid;
				$schoolcode = $this->getSchoolFromVisit($this->visitid,$connid);
				$this->teacherArray = $this->teacherArr($schoolcode,$connid);
				$this->eifacultyArray = $this->eifacultyArr($schoolcode,$connid);
				//visit view log - added on 9/5/2012
				/*$query="INSERT INTO  tst_visitviewlog SET visitid='$this->visitid',viewedby='$userid',viewedon=now(),visittype='TS'";
				$dbquery = new dbquery($query,$connid);*/
	
				
				$schvisitrow = $this->fetchSchoolVisitDetails($this->visitid,$connid);
				$enteredDate = explode(" ",$schvisitrow['enteredon']);
				$enteredDate = $enteredDate[0];
				$today = date("Y-m-d");
				$dateDiff= abs(strtotime($today)) - strtotime($enteredDate);
				/*echo $enteredDate;
				echo $today;
				echo "<br>".$dateDiff/(24*60*60);*/

				$schooldetails .= "<br><table width='100%'border=1 style='border-collapse: collapse' align='center'>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>Visit - ".$schvisitrow['visitname']." (".formatDate($schvisitrow['visitdate']).")</font></b></td></tr>";
				$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td align='center'><b>Visit Parameter</b></td><td align='center'><b>Yes/No</b></td>";
				$schooldetails .= "<td><b>Duration</b></td><td><b>Discussion</b></td><td><b>Other Members Present</b></td></tr>";
				$parameterDetails = $this->fetchVisitParameters($connid);
				
				$srno = 1;
				$query="SELECT a.*,b.* FROM tst_visitparameter_details a,tst_schoolvisitmaster b WHERE a.visitid='$this->visitid' AND a.visitid=b.visitid AND visittype='TR'";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					if ($row['paramid']==3 || $row['paramid']==5 || $row['paramid']==6)
						continue;
						
					if($row['paramflag']=='Y')
						$row['paramflag']="Yes";
					if($row['paramflag']=='N')
						$row['paramflag']="No";
						
					$duration='';
					$comments='';
					$teacherNames = '';
					$teachersPresentArr = '';
					$sr = 1;
					
					if ($row['paramid']==1)
					{
						$duration=$row['principal_duration'];
						$comments=$row['principal_discussion'];
						$teacherNames = 'NA';
					}
					elseif ($row['paramid']==2)
					{
						$duration=$row['coreteam_duration'];
						$comments=$row['coreteam_discussion'];
						$teachersPresentArr = explode(",",$row['coreteamteachers_present']);
						if(count($teachersPresentArr)>=1)
						{
							foreach ($teachersPresentArr as $teacherid)
							{
								if ($teacherid!='')
								{
									$teacherNames .= "$sr. ".$this->teacherArray[$teacherid][$schoolcode]."<br>";
									$sr++;
								}
							}
						}
					}
					elseif ($row['paramid']==4)
					{
						$duration=$row['groupteam_duration'];
						$comments=$row['groupteam_discussion'];
						$teachersPresentArr = explode(",",$row['groupteam_present']);
						//print_r($teachersPresentArr);
						if(count($teachersPresentArr)>=1)
						{
							foreach ($teachersPresentArr as $teacherid)
							{
								if ($teacherid!='')
								{
									$teacherNames .= "$sr. ".$this->teacherArray[$teacherid][$schoolcode]."<br>";
									$sr++;
								}
							}
						}
					}
					if ($duration=='0')
						$duration='';
					
					$schooldetails .= "<tr><td align='center'>$srno</td><td>".$parameterDetails[$row['paramid']]."</td><td align='center'>".$row['paramflag']."</td>";
					$schooldetails .= "<td align='center'>".$duration."</td><td>$comments</td><td>$teacherNames</td></tr>";
					$srno++;
				}
				$schooldetails .= "</table><br>";
				
				$srnoCO = 0;
				$query=" SELECT a.paramid,a.paramflag,b.* FROM tst_visitparameter_details a,tst_classroomobservation_demolesson b WHERE a.visitid='$this->visitid' AND a.visitid=b.visitid AND a.paramid IN (5) AND b.isCODL='CO' AND visittype='TR'";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					if ($srnoCO==0)
					{
						$parameterDetails = $this->fetchVisitParameters($connid);
						$paramflag = $parameterDetails[$row['paramid']];
						$schooldetails .= "<table width='100%'border=1 style='border-collapse: collapse' align='center'>";
						$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='10'><font color='#FFFFFF'><b>".$paramflag."</font></b></td></tr>";
						$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>Class</b></td><td><b>Section</b></td>";
						$schooldetails .= "<td><b>Subject</b></td><td><b>Teacher Name</b></td><td><b>Which Lesson</b></td>";
						$schooldetails .= "<td><b>From Time</b></td><td><b>To Time</b></td><td><b>Comments</b></td><td><b>Added By</b></td></tr>";
						$srnoCO++;
					}
					//print_r($this->teacherArray[$row['teacherid']]);	
					$schooldetails .= "<tr><td align='center'>$srnoCO</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
					$schooldetails .= "<td align='center'>".$this->subjectArray[$row['subjectid']]."</td><td>".$this->teacherArray[$row['teacherid']][$schoolcode]."</td><td>".$row['whichlesson']."</td>";
					$schooldetails .= "<td align='center'>".$row['from_time']."</td><td align='center'>".$row['to_time']."</td><td>".$row['comments']."</td><td nowrap>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
					$srnoCO++;
				}
				
				$srnoDL = 0;
				$query=" SELECT a.paramid,a.paramflag,b.* FROM tst_visitparameter_details a,tst_classroomobservation_demolesson b WHERE a.visitid='$this->visitid' AND a.visitid=b.visitid AND a.paramid IN (6) AND b.isCODL='DL' AND visittype='TR'";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					if ($srnoDL==0)
					{
						$parameterDetails = $this->fetchVisitParameters($connid);
						$paramflag = $parameterDetails[$row['paramid']];
						$schooldetails .= "</table><br><table width='100%'border=1 style='border-collapse: collapse' align='center'>";
						$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='10'><font color='#FFFFFF'><b>".$paramflag."</font></b></td></tr>";
						$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>Class</b></td><td><b>Section</b></td>";
						$schooldetails .= "<td><b>Subject</b></td><td><b>Teacher Name</b></td><td><b>Which Lesson</b></td>";
						$schooldetails .= "<td><b>From Time</b></td><td><b>To Time</b></td><td><b>Comments</b></td><td><b>Added By</b></td></tr>";
						$srnoDL++;
					}
					
					$schooldetails .= "<tr><td align='center'>$srnoDL</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
					$schooldetails .= "<td align='center'>".$this->subjectArray[$row['subjectid']]."</td><td>".$this->teacherArray[$row['teacherid']][$schoolcode]."</td><td>".$row['whichlesson']."</td>";
					$schooldetails .= "<td align='center'>".$row['from_time']."</td><td align='center'>".$row['to_time']."</td><td>".$row['comments']."</td><td nowrap>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
					$srnoDL++;
				}
				
				$schooldetails .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>".$schvisitrow['visitname']." - Task Details</font></b></td></tr>";
				$schooldetails .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Task</b></td><td align='center'><b>Planned Sub Tasks</b></td><td align='center'><b>Planned Sub Tasks - Done Details</b></td><td align='center'><b>Planned But Not Done</b></td><td align='center'><b>Tasks Not Planned But Done</b></td></tr>";
				
				$srno = 1;
				$schquery  = "SELECT b.*, a.* FROM tst_schoolvisittaskmaster as a, tst_schoolvisit_generalreport as b WHERE visitid=".$this->visitid." AND a.taskid=b.taskid ORDER BY b.taskid,b.subtaskid";
				//echo $schquery;
				$dbquery = new dbquery($schquery,$connid);
				while($row = $dbquery->getrowarray())
				{
					$subtasksArr = $this->fetchVisitSubTasks($row['taskid'],$connid);
					//print_r($subtasksArr);
					$schooldetails .= "<tr><td align='center'>".$srno."</td><td>".$row['task']."</td><td>".$subtasksArr[$row['subtaskid']][$row['taskid']]."</td><td>".$row['plannedsubtasks_donedetails']."</td><td>".$row['plannedbutnotdone']."</td><td>".$row['tasksnotplannedbutdone']."</td></tr>";
					$srno++;
				}
				
				$schooldetails .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='5'><font color='#FFFFFF'><b>".$schvisitrow['visitname']." - Teacher Wise Action Points</font></b></td></tr>";
				
				foreach ($this->teacherArray as $teacherid=>$teacher)
				{
					$teacherWiseSubArr = $this->teacherWiseSubjectArr($teacherid,$connid);
					foreach ($teacherWiseSubArr as $subjectid)
					{	
						//print_r($this->eifacultyArray);
						$grade = $this->getGrade($teacherid,$connid,$subjectid);
						$faculty = $this->getFullName($this->eifacultyArray[$subjectid],$connid);
						$facultyid = $this->eifacultyArray[$subjectid];
						$subject = $this->subjectArray[$subjectid];
						$duration = $this->getDuration($this->visitid,$teacherid,$facultyid,$connid);
						
						$query = "SELECT * FROM tst_actionpoints_details WHERE visitid=$this->visitid AND teacherid=$teacherid AND subjectid=$subjectid AND classes='$grade' ORDER BY actionid";
						$dbquery = new dbquery($query,$connid);
						if ($dbquery->numrows()>0)
						{
						
							$schooldetails .= "<tr bgcolor='".$this->logocolor3."' align='center'><td colspan='4'><b>Teacher:</b> $teacher[$schoolcode] &nbsp;&nbsp;&nbsp;<b>Subject:</b> ".$subject."&nbsp;&nbsp;&nbsp;<b>Grade:</b> $grade&nbsp;&nbsp;&nbsp;<b>EI Faculty:</b> ".$faculty."&nbsp;&nbsp;&nbsp;<b>Duration (mins):</b> ".$duration."</td></tr>";
							$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>ActionPoints</b></td><td><b>Status/Steps taken</b></td></tr>";
							$srno=1;
						
							/*$teacherToActionArr = $this->teachertoactionArr($teacherid,$subjectid,$connid);
							foreach ($teacherToActionArr as $actionid)
							*/
							while ($row = $dbquery->getrowarray())
							{
								$actionid = $row['actionid'];
								$schooldetails .= "<tr><td  align='center'>".$srno."</td><td>".$this->actionArray[$subjectid][$actionid]."</td>";
								//$detailsarr = $this->fetchActionDetails($this->visitid,$teacherid,$actionid,$connid);
								//$details = explode("~",$detailsarr[$this->visitid][$teacherid][$actionid]);
								$date = $row['date'];
								$stepstaken = $row['stepstaken'];
								/*if ($date == '0000-00-00')
									$schooldetails .= "<td nowrap>&nbsp;</td>";
								else
									$schooldetails .= "<td nowrap>".formatDate($date)."</td>";*/
								$schooldetails .= "<td width='50%'>$stepstaken</td></tr>";
								$srno++;
							}
						}
					}
				}
				$schooldetails .= "</table>";
			}
			echo "<br>".$schooldetails;
		}
	}
	
	function getSchoolFromVisit($visitid,$connid)
	{
		$query = "SELECT schoolcode FROM tst_schoolvisitmaster WHERE visitid=$visitid ";
		$dbquery = new dbquery($query,$connid);
		$row=$dbquery->getrowarray();
		return $row['schoolcode'];
	}
	
	function getAllSchoolVisits($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$coordinatorUsers = $this->coOrdinateTeachers;
		$this->setmastervars($schoolcode,$connid);
		$visitnameArr = $this->getVisitNames($connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schooldetails="";
		
		$visitsrno=1;
		$allvisitquery="SELECT distinct visitid FROM tst_schoolvisitmaster WHERE SchoolCode=$schoolcode";
		$dbquery = new dbquery($allvisitquery,$connid);
		while ($allvisitrow=$dbquery->getrowarray())
		{
			$visitid = $allvisitrow['visitid'];
			$this->visitid = $visitid;
			//echo "<br>$visitid";
			
			$query="SELECT * FROM tst_schoolvisitmaster WHERE visitid=$visitid";
			$dbquery1 = new dbquery($query,$connid);
			while ($rowall=$dbquery1->getrowarray())
			{
				$schooldetails .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='5'><b>School Visits</b></td></tr>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='5'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
				$schooldetails .= "<tr><td align='center'><b>Visit No.</b></td><td align='center'><b>Visit Name</b></td><td align='center'><b>Visit Date</b></td><td align='center'><b>Visit Summary</b></td><td align='center'><b>Entered By</b></td></tr>";
				
				$schooldetails .= "<tr><td align='center'>$visitsrno</a></td><td>".$rowall['visitname']."</td><td align='center' nowrap>".formatDate($rowall['visitdate'])."</td><td>".$rowall['visit_summary']."</td><td>".$this->getFullName($rowall['enteredby'],$connid)."</td></tr>";
				$schooldetails .= "</table><br>";
				$visitsrno++;
				
				$schooldetails .= "<br><table width='100%'border=1 style='border-collapse: collapse' align='center'>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>Visit - ".$rowall['visitname']." (".formatDate($rowall['visitdate']).")</font></b></td></tr>";
				$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td align='center'><b>Visit Parameter</b></td><td align='center'><b>Yes/No</b></td>";
				$schooldetails .= "<td><b>Duration</b></td><td><b>Discussion</b></td><td><b>Other Members Present</b></td></tr>";
				$parameterDetails = $this->fetchVisitParameters($connid);
				
				$srno = 1;
				$query="SELECT a.*,b.* FROM tst_visitparameter_details a,tst_schoolvisitmaster b WHERE a.visitid='$this->visitid' AND a.visitid=b.visitid AND visittype='TR'";
				$dbquery2 = new dbquery($query,$connid);
				while($row = $dbquery2->getrowarray())
				{
					if ($row['paramid']==3 || $row['paramid']==5 || $row['paramid']==6)
						continue;
						
					if($row['paramflag']=='Y')
						$row['paramflag']="Yes";
					if($row['paramflag']=='N')
						$row['paramflag']="No";
						
					$duration='';
					$comments='';
					$teacherNames = '';
					$teachersPresentArr = '';
					$sr = 1;
					
					if ($row['paramid']==1)
					{
						$duration=$row['principal_duration'];
						$comments=$row['principal_discussion'];
						$teacherNames = 'NA';
					}
					elseif ($row['paramid']==2)
					{
						$duration=$row['coreteam_duration'];
						$comments=$row['coreteam_discussion'];
						$teachersPresentArr = explode(",",$row['coreteamteachers_present']);
						if(count($teachersPresentArr)>=1)
						{
							foreach ($teachersPresentArr as $teacherid)
							{
								if ($teacherid!='')
								{
									$teacherNames .= "$sr. ".$this->teacherArray[$teacherid][$schoolcode]."<br>";
									$sr++;
								}
							}
						}
					}
					elseif ($row['paramid']==4)
					{
						$duration=$row['groupteam_duration'];
						$comments=$row['groupteam_discussion'];
						$teachersPresentArr = explode(",",$row['groupteam_present']);
						//print_r($teachersPresentArr);
						if(count($teachersPresentArr)>=1)
						{
							foreach ($teachersPresentArr as $teacherid)
							{
								if ($teacherid!='')
								{
									$teacherNames .= "$sr. ".$this->teacherArray[$teacherid][$schoolcode]."<br>";
									$sr++;
								}
							}
						}
					}
					if ($duration=='0')
						$duration='';
					
					$schooldetails .= "<tr><td align='center'>$srno</td><td>".$parameterDetails[$row['paramid']]."</td><td align='center'>".$row['paramflag']."</td>";
					$schooldetails .= "<td align='center'>".$duration."</td><td>$comments</td><td>$teacherNames</td></tr>";
					$srno++;
				}
				$schooldetails .= "</table><br>";
				
				$srnoCO = 0;
				$query=" SELECT a.paramid,a.paramflag,b.* FROM tst_visitparameter_details a,tst_classroomobservation_demolesson b WHERE a.visitid='$this->visitid' AND a.visitid=b.visitid AND a.paramid IN (5) AND b.isCODL='CO' AND visittype='TR'";
				$dbquery3 = new dbquery($query,$connid);
				while($row = $dbquery3->getrowarray())
				{
					if ($srnoCO==0)
					{
						$parameterDetails = $this->fetchVisitParameters($connid);
						$paramflag = $parameterDetails[$row['paramid']];
						$schooldetails .= "<table width='100%'border=1 style='border-collapse: collapse' align='center'>";
						$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='10'><font color='#FFFFFF'><b>".$paramflag."</font></b></td></tr>";
						$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>Class</b></td><td><b>Section</b></td>";
						$schooldetails .= "<td><b>Subject</b></td><td><b>Teacher Name</b></td><td><b>Which Lesson</b></td>";
						$schooldetails .= "<td><b>From Time</b></td><td><b>To Time</b></td><td><b>Comments</b></td><td><b>Added By</b></td></tr>";
						$srnoCO++;
					}
					//print_r($this->teacherArray[$row['teacherid']]);	
					$schooldetails .= "<tr><td align='center'>$srnoCO</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
					$schooldetails .= "<td align='center'>".$this->subjectArray[$row['subjectid']]."</td><td>".$this->teacherArray[$row['teacherid']][$schoolcode]."</td><td>".$row['whichlesson']."</td>";
					$schooldetails .= "<td align='center'>".$row['from_time']."</td><td align='center'>".$row['to_time']."</td><td>".$row['comments']."</td><td nowrap>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
					$srnoCO++;
				}
				
				$srnoDL = 0;
				$query=" SELECT a.paramid,a.paramflag,b.* FROM tst_visitparameter_details a,tst_classroomobservation_demolesson b WHERE a.visitid='$this->visitid' AND a.visitid=b.visitid AND a.paramid IN (6) AND b.isCODL='DL' AND visittype='TR'";
				$dbquery4 = new dbquery($query,$connid);
				while($row = $dbquery4->getrowarray())
				{
					if ($srnoDL==0)
					{
						$parameterDetails = $this->fetchVisitParameters($connid);
						$paramflag = $parameterDetails[$row['paramid']];
						$schooldetails .= "</table><br><table width='100%'border=1 style='border-collapse: collapse' align='center'>";
						$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='10'><font color='#FFFFFF'><b>".$paramflag."</font></b></td></tr>";
						$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>Class</b></td><td><b>Section</b></td>";
						$schooldetails .= "<td><b>Subject</b></td><td><b>Teacher Name</b></td><td><b>Which Lesson</b></td>";
						$schooldetails .= "<td><b>From Time</b></td><td><b>To Time</b></td><td><b>Comments</b></td><td><b>Added By</b></td></tr>";
						$srnoDL++;
					}
					
					$schooldetails .= "<tr><td align='center'>$srnoDL</td><td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
					$schooldetails .= "<td align='center'>".$this->subjectArray[$row['subjectid']]."</td><td>".$this->teacherArray[$row['teacherid']][$schoolcode]."</td><td>".$row['whichlesson']."</td>";
					$schooldetails .= "<td align='center'>".$row['from_time']."</td><td align='center'>".$row['to_time']."</td><td>".$row['comments']."</td><td nowrap>".$this->getFullName($row['enteredby'],$connid)."</td></tr>";
					$srnoDL++;
				}
				
				$schooldetails .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='6'><font color='#FFFFFF'><b>".$rowall['visitname']." - Task Details</font></b></td></tr>";
				$schooldetails .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Task</b></td><td align='center'><b>Planned Sub Tasks</b></td><td align='center'><b>Planned Sub Tasks - Done Details</b></td><td align='center'><b>Planned But Not Done</b></td><td align='center'><b>Tasks Not Planned But Done</b></td></tr>";
				
				$srno = 1;
				$schquery  = "SELECT b.*, a.* FROM tst_schoolvisittaskmaster as a, tst_schoolvisit_generalreport as b WHERE visitid=".$this->visitid." AND a.taskid=b.taskid ORDER BY b.taskid,b.subtaskid";
				//echo $schquery;
				$dbquery5 = new dbquery($schquery,$connid);
				while($row = $dbquery5->getrowarray())
				{
					$subtasksArr = $this->fetchVisitSubTasks($row['taskid'],$connid);
					//print_r($subtasksArr);
					$schooldetails .= "<tr><td align='center'>".$srno."</td><td>".$row['task']."</td><td>".$subtasksArr[$row['subtaskid']][$row['taskid']]."</td><td>".$row['plannedsubtasks_donedetails']."</td><td>".$row['plannedbutnotdone']."</td><td>".$row['tasksnotplannedbutdone']."</td></tr>";
					$srno++;
				}
				
				$schooldetails .= "</table><br><table border=1 style='border-collapse: collapse' align='center'>";
				$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='5'><font color='#FFFFFF'><b>".$rowall['visitname']." - Teacher Wise Action Points</font></b></td></tr>";
				
				foreach ($this->teacherArray as $teacherid=>$teacher)
				{
					$teacherWiseSubArr = $this->teacherWiseSubjectArr($teacherid,$connid);
					foreach ($teacherWiseSubArr as $subjectid)
					{	
						//print_r($this->eifacultyArray);
						$grade = $this->getGrade($teacherid,$connid,$subjectid);
						$faculty = $this->getFullName($this->eifacultyArray[$subjectid],$connid);
						$facultyid = $this->eifacultyArray[$subjectid];
						$subject = $this->subjectArray[$subjectid];
						$duration = $this->getDuration($this->visitid,$teacherid,$facultyid,$connid);
						
						$query = "SELECT * FROM tst_actionpoints_details WHERE visitid=$this->visitid AND teacherid=$teacherid AND subjectid=$subjectid AND classes='$grade' ORDER BY actionid";
						$dbquery6 = new dbquery($query,$connid);
						if ($dbquery6->numrows()>0)
						{
						
							$schooldetails .= "<tr bgcolor='".$this->logocolor3."' align='center'><td colspan='4'><b>Teacher:</b> $teacher[$schoolcode] &nbsp;&nbsp;&nbsp;<b>Subject:</b> ".$subject."&nbsp;&nbsp;&nbsp;<b>Grade:</b> $grade&nbsp;&nbsp;&nbsp;<b>EI Faculty:</b> ".$faculty."&nbsp;&nbsp;&nbsp;<b>Duration (mins):</b> ".$duration."</td></tr>";
							$schooldetails .= "<tr align='center'><td><b>SrNo</b></td><td><b>ActionPoints</b></td><td><b>Status/Steps taken</b></td></tr>";
							$srno=1;
						
							/*$teacherToActionArr = $this->teachertoactionArr($teacherid,$subjectid,$connid);
							foreach ($teacherToActionArr as $actionid)
							*/
							while ($row = $dbquery6->getrowarray())
							{
								$actionid = $row['actionid'];
								$schooldetails .= "<tr><td  align='center'>".$srno."</td><td>".$this->actionArray[$subjectid][$actionid]."</td>";
								//$detailsarr = $this->fetchActionDetails($this->visitid,$teacherid,$actionid,$connid);
								//$details = explode("~",$detailsarr[$this->visitid][$teacherid][$actionid]);
								$date = $row['date'];
								$stepstaken = $row['stepstaken'];
								/*if ($date == '0000-00-00')
									$schooldetails .= "<td nowrap>&nbsp;</td>";
								else
									$schooldetails .= "<td nowrap>".formatDate($date)."</td>";*/
								$schooldetails .= "<td width='50%'>$stepstaken</td></tr>";
								$srno++;
							}
						}
					}
				}
				$schooldetails .= "</table><br><br><hr width='100%' height='200'><br>";
			}
		}
		echo $schooldetails;
	}
	
	function fetchCTSSchoolVisits($schoolcode,$userid,$connid,$usertype)
	{
		$this->setpostvars();
		$this->setmastervars($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		$teachersArr=$this->teacherArray;
		
		if ($this->actiontoperform=='Delete CTS Visit')
		{
			//echo "deleting...";
			$query="DELETE FROM tst_ctsvisit_master WHERE ctsvisitid='$this->visitid'";
			mysql_query($query) or die("delete error - ".mysql_error());
			$query="DELETE FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$this->visitid'";
			mysql_query($query) or die("delete error - ".mysql_error());
			$query="DELETE FROM tst_ctsvisit_demos WHERE ctsvisitid='$this->visitid'";
			mysql_query($query) or die("delete error - ".mysql_error());
		}
		
		
		if (in_array($userid,$this->masterusers))
			$colspan= '4';
		else 
			$colspan= '3';
			
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$schooldetails  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$schooldetails .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='$colspan'><b>CTS Visits</b></td></tr>";
		if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
			$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='$colspan'><b><a style='color:white' href='tst_allSchoolVisits.php' target='_blank'>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</a></b></td></tr>";
		else 
			$schooldetails .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='$colspan'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		$schooldetails .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Visit Date</b></td><td align='center'><b>Entered By</b></td>";//<td align='center'><b>Visit Summary</b></td><td align='center'><b>Visit Name</b></td>
		$schooldetails .= "<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		if (in_array($userid,$this->masterusers))
			$schooldetails .= "<td align='center'><b>Actions</b></td>";
		$schooldetails .= "</tr>";
		
		$srno = 1;
		//$schquery  = "SELECT * FROM tst_schoolvisitmaster WHERE schoolcode=".$schoolcode." ORDER BY visitdate DESC";
		$schquery  = "SELECT * FROM tst_ctsvisit_master WHERE schoolcode=".$schoolcode." ORDER BY ctsvisitid";
		$dbquery = new dbquery($schquery,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schooldetails .= "<tr><td align='center'><a href='javascript:viewCTSschoolvisit(".$row['ctsvisitid'].")'>$srno</a></td><td align='center' nowrap>".formatDate($row['visitdate'])."</td><td>".$this->getFullName($row['enteredby'],$connid)."</td>";//<td>&nbsp;</td><td>&nbsp;</td>
			if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
				$schooldetails .= "<td align='center'><img src='images/delete.png' onclick='return deleteCTSVisit(".$row['ctsvisitid'].");'></td>";
			$schooldetails .= "</tr>";
			$srno++;
		}
		if (in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{
			$schooldetails .= "<tr><td align='center' colspan='$colspan'><a href='tst_addCTSVisit.php'><b>Add New School Visit</b></td></tr></a>";
		}
		$schooldetails .= "</table>";
		
		if ($this->actiontoperform=='CTS Visit Details')
		{
			//echo "displaying visit details...";
			$query="SELECT * FROM tst_ctsvisit_master WHERE ctsvisitid='$this->visitid'";
			$dbquery = new dbquery($query,$connid);
			while ($row = $dbquery->getrowarray())
			{
				$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center' width='80%'>";
				if (in_array($userid,$this->masterusers))
					$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='4'><font color='#FFFFFF'><b><a href='javascript:browse_window(".$this->visitid.",13);'>Visit Details</a></b></font></td></tr>";
				else 
					$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='4'><font color='#FFFFFF'>Visit Details</b></font></td></tr>";
				$outputstr.="<tr><th>Particulars</th><th>Yes/No</th><th>Time(in mins)</th><th>Comments</th></tr>";
				
				$eifaultypresentArr=explode(",",$row['eifaculty_present']);
				$eifaultyArr=$this->getEiFacultys($connid);
				$outputstr.="<tr><td>EI Faculty Present:</td><td colspan='3'>";
				foreach ($eifaultyArr as $num=>$faculty)
				{
					if (in_array($faculty,$eifaultypresentArr))
						$outputstr.=$this->getFullName($faculty,$connid).",";
				}
				$outputstr=substr($outputstr,0,-1);
				//$outputstr.="<tr><td>EI Faculty Name:</td><td width='10%'>".$this->getFullName($row['enteredby'],$connid)."</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
				$outputstr.="&nbsp;</td></tr><tr><td>Teachers Present:</td><td width='10%' colspan='3'>";
				
				$teacherspresent=explode(",",$row['teachers_present']);
				foreach ($teachersArr as $tid=>$nameArr)
				{
					if (in_array($tid,$teacherspresent))
						$outputstr.=$nameArr[$schoolcode].", ";
				}
				if ($row['teachers_present']!='')
					$outputstr=substr($outputstr,0,-2);
				$outputstr.="&nbsp;</td></tr>";//<td>&nbsp;</td><td>&nbsp;</td>
				$outputstr.="<tr><td>Visit Date: </td><td align='center' width='10%'>".formatDate($row['visitdate'])."</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
								
				$paramdetailsArr=array();
				$query1="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$this->visitid'";
				$dbquery1 = new dbquery($query1,$connid);
				while ($row1=$dbquery1->getrowarray())
				{
					if ($row1['paramflag']=='Y')
						$row1['paramflag']='YES';
					if ($row1['paramflag']=='N')
						$row1['paramflag']='NO';
						
					$paramdetailsArr[$row1['paramid']]['flag']=$row1['paramflag'];
					$paramdetailsArr[$row1['paramid']]['time']=$row1['time'];
				}

				$visitparams = $this->fetchCTSVisitParameters($connid);
				foreach ($visitparams as $paramid => $visit_parameter)
				{
					$outputstr.="<tr><td>".$visit_parameter.": </td>";
					//$outputstr.="<td align='center' width='10%'>".$paramdetailsArr[$paramid]['flag']."</td>";
					
					if ($paramid=='10' || $paramid=='11')
					{
						$ctsquery="SELECT ctsvisitid FROM  tst_ctsvisit_master WHERE schoolcode=$schoolcode AND ctsvisitid<'$this->visitid' ORDER BY ctsvisitid DESC LIMIT 1";
						$ctsresult=mysql_query($ctsquery) or die(mysql_error());
						$ctsrow=mysql_fetch_array($ctsresult);
						$prectsvisitid=$ctsrow[0];
						
						$prevtasks="";
						if ($paramid=='10')
							$ctsquery="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$prectsvisitid' AND paramid=8";
						else				
							$ctsquery="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$prectsvisitid' AND paramid=9";
						$ctsresult=mysql_query($ctsquery) or die(mysql_error());
						$ctsrow1=mysql_fetch_array($ctsresult);
						$prevtasks=$ctsrow1['paramflag'];
						$outputstr.="<td align='center' width='10%'>".$ctsrow1['paramflag']."</td>";
					}
					else 
						$outputstr.="<td align='center' width='10%'>".$paramdetailsArr[$paramid]['flag']."</td>";
					
					$outputstr.="<td align='center'>".$paramdetailsArr[$paramid]['time']."</td>";
					$outputstr.="<td width='30%'>".$row['parameter'.$paramid]."</td></tr>";
				}
				$outputstr.="<tr><td colspan='4' align='center'>Demo/Workshop delivered by EI faculty / Teacher (mention class and topic details)</td></tr>";
				$outputstr.="<tr><td colspan='4' align='center'><table border='1' cellspacing='0' style='border-collapse: collapse'>";
				$outputstr.="<tr align='center'><td><b>Demo/Workshop</b></td><td><b>Class</b></td><td><b>Subject</b></td><td><b>Topic</b></td><td><b>Demo Taken By</b></td><td><b>Name</b></td><td><b>Time(in mints)</b></td><td><b>Post demo discussion commnets</b></td></tr>";
				
				$query1="SELECT * FROM tst_ctsvisit_demos WHERE ctsvisitid='$this->visitid'";
				$dbquery1 = new dbquery($query1,$connid);
				while ($row1=$dbquery1->getrowarray())
				{
					$outputstr.="<tr><td>".ucfirst($row1['demo_workshop'])."</td><td>".$row1['class']."</td><td>".$row1['subject']."</td><td>".$row1['topic']."</td>";
					$outputstr.="<td>".$row1['eifaculty_teacher']."</td>";
					$outputstr.="<td>".$row1['name']."</td>";
					$outputstr.="<td>".$row1['time']."</td>";
					$outputstr.="<td>".$row1['keypoints_discussed']."</td>";
				}
				$outputstr.="</table></td></tr></table>";
			}
		}
		
		return $schooldetails.$outputstr;
	}
	
	function fetchCTSVisitParameters($connid)
	{
		$paramarr = array();
		$query="SELECT * FROM tst_ctsvisit_parameters";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$paramarr[$row['paramid']] = $row['param'];
		}
		return $paramarr;
	}
	
	function fetchTeacherTasks($connid)
	{
		$taskarr = array();
		$query="SELECT * FROM tst_ctsteachertasks";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$taskarr[$row['taskid']] = $row['task'];
		}
		return $taskarr;
	}
	
	function getEiFacultys($connid)
	{
		$eifacultyArr = array();
		$query = "SELECT distinct eifacultyid  FROM tst_eifaculty";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			array_push($eifacultyArr,$row['eifacultyid']);
		}
		return $eifacultyArr;
	}
	
	function addCTSVisit($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$teachersArr = $this->teacherArray;
		
		$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='4'><b>Add School Visit</b></td></tr>";
		$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='4'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		//$outputstr="<table align='center' border='1' cellspacing='0' cellpadding='2'>";		
		$outputstr.="<tr><th>Particulars</th><th>Yes/No</th><th>Time(in mins)</th><th>Comments</th></tr>";
		//$outputstr.="<tr><td>EI Faculty Name:</td><td>".$this->getFullName($userid,$connid)."</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		
		$eifaultyArr=$this->getEiFacultys($connid);
		$outputstr.="<tr><td>EI Faculty Name:</td><td>";
		foreach ($eifaultyArr as $num=>$faculty)
		{
			$outputstr.="<input type='checkbox' name='eid$num'>".$this->getFullName($faculty,$connid)."<br>";
		}
		$outputstr.="</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		
		$outputstr.="<tr><td>Teachers Present:</td><td>";
		foreach ($teachersArr as $tid=>$nameArr)
		{
			$outputstr.="<input type='checkbox' name='tid$tid'>".$nameArr[$schoolcode]."<br>";
		}
		$outputstr.="</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		
		$outputstr.="<tr><td>Visit Date: </td><td><input name='visitdate' type='text' id='visitdate' onfocus='showCalendarControl(this);' value='".$_POST['visitdate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td><td>&nbsp;</td><td>&nbsp;</td></tr>";
		$visitparams = $this->fetchCTSVisitParameters($connid);
		foreach ($visitparams as $paramid => $visit_parameter)
		{
				$outputstr.="<tr><td>".$visit_parameter.": </td>";
				if ($paramid=='8' || $paramid=='9' || $paramid=='10' || $paramid=='11')
				{
					$taskarr= $this->fetchTeacherTasks($connid);
					$outputstr.="<td>";
					//for ($i=1;$i<=4;$i++)
					if ($paramid=='10' || $paramid=='11')
					{
						$query="SELECT ctsvisitid FROM  tst_ctsvisit_master WHERE schoolcode=$schoolcode ORDER BY ctsvisitid DESC LIMIT 1";
						$result=mysql_query($query) or die(mysql_error());
						$row=mysql_fetch_array($result);
						$prectsvisitid=$row[0];
						
						if ($paramid=='10')
							$query="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$prectsvisitid' AND paramid=8";
						else				
							$query="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$prectsvisitid' AND paramid=9";
						$result=mysql_query($query) or die(mysql_error());
						$row1=mysql_fetch_array($result);
						$prevtasks=explode(",",$row1['paramflag']);
						
						foreach ($taskarr as $id=>$task)
						{
							$chk="";
							if (in_array($task,$prevtasks))
								$chk="checked";
							$outputstr.="<input type='checkbox' name='task".$paramid.$id."' value='$task' $chk disabled>$task <br>";
						}
					}
					else 
					{
						foreach ($taskarr as $id=>$task)
						{
							$outputstr.="<input type='checkbox' name='task".$paramid.$id."' value='$task'>$task <br>";
						}
						$outputstr.="<input type='checkbox' name='taskother".$paramid."' id='taskother".$paramid."' value='other' onclick='javascript:showother($paramid);'>Other<br>";
						$outputstr.="<input type='text' name='task".$paramid."' id='task".$paramid."' style='display:none'>";
					}
					$outputstr.="</td>";
				}
				else 
				{
					$outputstr.="<td><input type='radio' name='".$paramid."' value='Y' checked>Yes";
					$outputstr.="<input type='radio' name='".$paramid."' value='N'>No</td>";
				}
				
				$outputstr.="<td><input type='text' name='time$paramid'></td>
				<td><textarea name='comments$paramid' rows=2 cols=50></textarea></td>";
		}
		$outputstr.="<tr><td colspan='4' align='center'>Demo/Workshop delivered by EI faculty / Teacher (mention class and topic details)</td></tr>";
		$outputstr.="<tr><td colspan='4' align='center'><table border='1'>";
		$outputstr.="<tr align='center'><td><b>Demo/<br>Workshop</b></td><td><b>Class</b></td><td><b>Subject</b></td><td><b>Topic</b></td><td><b>Demo Taken By</b></td><td><b>Name</b></td><td><b>Time(in mints)</b></td><td><b>Post demo discussion commnets</b></td></tr>";
		
		for ($i=1;$i<=3;$i++)
		{
			$outputstr.="<tr><td><select name='demoworkshop$i'><option value=''>Select</option>";
			$outputstr.="<option value='demo'>Demo</option>";
			$outputstr.="<option value='workshop'>Workshop</option>";
			$outputstr.="</select></td><td><select name='class$i'><option value=''>Select</option>";
			foreach ($this->classArr as $cls)
			{
				$outputstr.="<option value=$cls>$cls</option>";
			}
			$outputstr.="</select></td><td><select name='subject$i'><option value=''>Select</option>";
			foreach ($this->subjectArray as $sub)
			{
				$outputstr.="<option value='$sub'>$sub</option>";
			}
			$outputstr.="</select></td><td><input type='text' name='topic$i'></td>";
			$outputstr.="<td><input type='radio' name='check$i' value='Eifaculty'>Eifaculty<br>";
			$outputstr.="<input type='radio' name='check$i' value='Teacher'>Teacher</td>";
			$outputstr.="<td><input type='text' name='name$i'></td>";
			$outputstr.="<td><input type='text' name='demotime$i'></td>";
			$outputstr.="<td><textarea name='democomments$i' rows=2 cols=50></textarea></td>";
		}
		$outputstr.="</table></td></tr>";
		$outputstr.="<tr><td colspan='4' align='center'><input type='button' name='Save' id='Save'  class='button' value='Save' onclick='return addCTSVisitDetails()'></td></tr></table>";
		$outputstr.="<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		return $outputstr;
	}
	
	function insertCTSVisitDetails($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		$teachersArr = $this->teacherArray;
		//print_r($_POST);
		
		if($this->actiontoperform == "Insert CTS Visit")
		{
			//print_r($_POST);
			//exit();
			$visitdate=formatDate($this->visitdate);
			
			$eifaultyArr=$this->getEiFacultys($connid);
			$eifaculty="";
			foreach ($eifaultyArr as $num=>$faculty)
			{
				if (isset($_POST['eid'.$num]) && $_POST['eid'.$num]=='on')
					$eifaculty.="$faculty,";
			}
			if ($eifaculty!="")
				$eifaculty=substr($eifaculty,0,-1);
				
			$teachers="";
			foreach ($teachersArr as $tid=>$nameArr)
			{
				if (isset($_POST['tid'.$tid]) && $_POST['tid'.$tid]=='on')
					$teachers.="$tid,";
			}
			if ($teachers!="")
				$teachers=substr($teachers,0,-1);
			
			$ctsvisitid='';
			$insertquery="INSERT INTO tst_ctsvisit_master SET SchoolCode=$schoolcode,visitdate='$visitdate',enteredby='$userid',enteredon=now(),teachers_present='$teachers',eifaculty_present='$eifaculty',";
			$visitparams = $this->fetchCTSVisitParameters($connid);
			foreach ($visitparams as $paramid => $visit_parameter)
			{
				if (isset($_POST['comments'.$paramid]) && $_POST['comments'.$paramid]!='')
					$insertquery.="parameter$paramid='".$_POST['comments'.$paramid]."',";
			}
			$insertquery=substr($insertquery,0,-1);
			//echo "<br><br>".$insertquery;
			$result=mysql_query($insertquery) or die("CTS Insert error - ".mysql_error());
			$ctsvisitid=mysql_insert_id();

			if ($ctsvisitid!='')
			{
				foreach ($visitparams as $paramid => $visit_parameter)
				{
					if ($paramid=='8' || $paramid=='9' || $paramid=='10' || $paramid=='11')
					{
						$taskarr= $this->fetchTeacherTasks($connid);
						$tasks="";
						foreach ($taskarr as $id=>$task)
						{
							if ($_POST['task'.$paramid.$id]!='')
								$tasks.=$_POST['task'.$paramid.$id].",";
						}
						
						if (isset($_POST['task'.$paramid]) && $_POST['task'.$paramid]!='')
						{
							$insquery="INSERT INTO tst_ctsteachertasks SET task='".$_POST['task'.$paramid]."'";
							$insresult=mysql_query($insquery) or die("task enter error - ".mysql_error());
							$tasks.=$_POST['task'.$paramid].",";
						}
						
						if ($tasks!="")
							$tasks=substr($tasks,0,-1);
							
						$paramquery="INSERT INTO  tst_ctsvisit_parameters_details SET ctsvisitid='$ctsvisitid',paramid='$paramid',paramflag='$tasks',time='".$_POST['time'.$paramid]."'";
						//echo "<br>$paramquery";
						mysql_query($paramquery) or die("paramete error - ".mysql_error());
					}
					else
					{
						$paramquery="INSERT INTO  tst_ctsvisit_parameters_details SET ctsvisitid='$ctsvisitid',paramid='$paramid',paramflag='".$_POST[$paramid]."',time='".$_POST['time'.$paramid]."'";
						//echo "<br>$paramquery";
						mysql_query($paramquery) or die("paramete error - ".mysql_error());
					}
				}
				for ($i=1;$i<=3;$i++)
				{
					$no=1;
					if ($_POST['class'.$i]!='' && $_POST['subject'.$i]!='' && $_POST['topic'.$i]!='')
					{
						$demoworkshop=$_POST['demoworkshop'.$i];
						$cls=$_POST['class'.$i];
						$sub=$_POST['subject'.$i];
						$topic=$_POST['topic'.$i];
						$demotakenby=$_POST['check'.$i];
						$name=$_POST['name'.$i];
						$demotime=$_POST['demotime'.$i];
						$democomments=$_POST['democomments'.$i];
						
						$demoquery="INSERT INTO tst_ctsvisit_demos SET demono=$no,demo_workshop='$demoworkshop',ctsvisitid='$ctsvisitid',class='$cls',subject='$sub',topic='$topic',eifaculty_teacher='$demotakenby',name='$name',time='$demotime',keypoints_discussed='$democomments'";
						//echo "<br>$demoquery";
						mysql_query($demoquery) or die("demo enter error - ".mysql_error());
						$no++;
					}
				}
				echo "<script>window.location='tst_ctsschoolvisit.php'</script>";
			}
		}
		
		if($this->actiontoperform == "Edit CTS Visit")
		{
			$ctsvisitid=$this->visitid;
			$visitdate=formatDate($this->visitdate);
			/*echo "<pre>";
			print_r($_POST);
			echo "</pre>";*/
			
			$eifaultyArr=$this->getEiFacultys($connid);
			$eifaculty="";
			foreach ($eifaultyArr as $num=>$faculty)
			{
				if (isset($_POST['eid'.$num]) && $_POST['eid'.$num]=='on')
					$eifaculty.="$faculty,";
			}
			if ($eifaculty!="")
				$eifaculty=substr($eifaculty,0,-1);

			$teachers="";
			foreach ($teachersArr as $tid=>$nameArr)
			{
				if (isset($_POST['tid'.$tid]) && $_POST['tid'.$tid]=='on')
					$teachers.="$tid,";
			}
			if ($teachers!="")
				$teachers=substr($teachers,0,-1);
			
			$insertquery="UPDATE tst_ctsvisit_master SET SchoolCode=$schoolcode,visitdate='$visitdate',enteredon=now(),eifaculty_present='$eifaculty',teachers_present='$teachers',";
			$visitparams = $this->fetchCTSVisitParameters($connid);
			foreach ($visitparams as $paramid => $visit_parameter)
			{
				if (isset($_POST['comments'.$paramid]) && $_POST['comments'.$paramid]!='')
					$insertquery.="parameter$paramid='".$_POST['comments'.$paramid]."',";
			}
			$insertquery=substr($insertquery,0,-1);
			$insertquery.=" WHERE ctsvisitid='$ctsvisitid'";
			//echo "<br><br>".$insertquery;
			$result=mysql_query($insertquery) or die("CTS Insert error - ".mysql_error());

			if ($ctsvisitid!='')
			{
				$query="DELETE FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$ctsvisitid'";
				mysql_query($query) or die("delete error -- ".mysql_error());
				foreach ($visitparams as $paramid => $visit_parameter)
				{
					if ($paramid=='8' || $paramid=='9' || $paramid=='10' || $paramid=='11')
					{
						$taskarr= $this->fetchTeacherTasks($connid);
						$tasks="";
						//print_r($taskarr);
						foreach ($taskarr as $id=>$task)
						{
							//echo "in".$_POST['task'.$paramid.$id];
							if ($_POST['task'.$paramid.$id]!='')
								$tasks.=$_POST['task'.$paramid.$id].",";
						}
						if ($tasks!="")
							$tasks=substr($tasks,0,-1);
							
						$paramquery="INSERT INTO  tst_ctsvisit_parameters_details SET ctsvisitid='$ctsvisitid',paramid='$paramid',paramflag='$tasks',time='".$_POST['time'.$paramid]."'";
						//echo "<br>$paramquery";
						mysql_query($paramquery) or die("paramete error - ".mysql_error());
					}
					else
					{
						$paramquery="INSERT INTO tst_ctsvisit_parameters_details SET ctsvisitid='$ctsvisitid',paramid='$paramid',paramflag='".$_POST[$paramid]."',time='".$_POST['time'.$paramid]."'";
						//echo "<br>$paramquery";
						mysql_query($paramquery) or die("paramete error - ".mysql_error());
					}
				}
				for ($i=1;$i<=3;$i++)
				{
					//echo $_POST['class3']."-".$_POST['subject'.$i]."-".$_POST['topic'.$i];exit;
					if ($_POST['class'.$i]!='' && $_POST['subject'.$i]!='' && $_POST['topic'.$i]!='')
					{
						$demoworkshop=$_POST['demoworkshop'.$i];
						$cls=$_POST['class'.$i];
						$sub=$_POST['subject'.$i];
						$topic=$_POST['topic'.$i];
						$demotakenby=$_POST['check'.$i];
						$name=$_POST['name'.$i];
						$demotime=$_POST['demotime'.$i];
						$democomments=$_POST['democomments'.$i];
						
						$query="SELECT COUNT(*) FROM tst_ctsvisit_demos WHERE ctsvisitid='$ctsvisitid' AND demono=$i";
						$result = mysql_query($query) or die("demo count error: ".mysql_error());
						$row=mysql_fetch_array($result);
						if ($row['COUNT(*)']>0)
						{
							$demoquery="UPDATE tst_ctsvisit_demos SET demo_workshop='$demoworkshop',class='$cls',subject='$sub',topic='$topic',eifaculty_teacher='$demotakenby',name='$name',time='$demotime',keypoints_discussed='$democomments' WHERE ctsvisitid='$ctsvisitid' AND demono=$i";
							//echo "<br>$demoquery";
							$result = mysql_query($demoquery) or die("demo error: ".mysql_error());
						}
						else
						{
							$demoquery="INSERT INTO tst_ctsvisit_demos SET ctsvisitid='$ctsvisitid',demono=$i,demo_workshop='$demoworkshop',class='$cls',subject='$sub',topic='$topic',eifaculty_teacher='$demotakenby',name='$name',time='$demotime',keypoints_discussed='$democomments'";
							//echo "<br>$demoquery";
							mysql_query($demoquery) or die("demo insert error: ".mysql_error());
						}
					}
				}
				echo "<script>window.opener.location.reload(true);window.close();</script>";
			}
		}
	}
	
	function editCTSVisit($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$teachersArr = $this->teacherArray;
		
		$outputstr  = "<br><table border=1 style='border-collapse: collapse' align='center' width='50%'>";
		$outputstr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='4'><b>Edit School Visit</b></td></tr>";
		$outputstr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='4'><font color='#FFFFFF'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</font></b></td></tr>";
		//$outputstr="<table align='center' border='1' cellspacing='0' cellpadding='2'>";		
		$outputstr.="<tr><th>Particulars</th><th>Yes/No</th><th>Time(in mins)</th><th>Comments</th></tr>";
		
		$query="SELECT * FROM tst_ctsvisit_master WHERE ctsvisitid='$this->visitid'";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			
			$eifaultypresentArr=explode(",",$row['eifaculty_present']);
			$eifaultyArr=$this->getEiFacultys($connid);
			$outputstr.="<tr><td>EI Faculty Present:</td><td>";
			foreach ($eifaultyArr as $num=>$faculty)
			{
				if (in_array($faculty,$eifaultypresentArr))
					$outputstr.="<input type='checkbox' name='eid$num' checked>".$this->getFullName($faculty,$connid)."<br>";
				else 
					$outputstr.="<input type='checkbox' name='eid$num'>".$this->getFullName($faculty,$connid)."<br>";
			}
			$outputstr.="&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
			$outputstr.="<tr><td>Teachers Present:</td><td>";
			
			$teachers=explode(",",$row['teachers_present']);
			foreach ($teachersArr as $tid=>$nameArr)
			{
				$chk="";
				if (in_array($tid,$teachers))
					$chk="checked";
				$outputstr.="<input type='checkbox' name='tid$tid' $chk>".$nameArr[$schoolcode]."<br>";
			}
			$outputstr.="</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
			
			$outputstr.="<tr><td>Visit Date: </td><td><input name='visitdate' type='text' id='visitdate' onfocus='showCalendarControl(this);' value=".formatDate($row['visitdate'])." onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td><td>&nbsp;</td><td>&nbsp;</td></tr>";
			
			$paramdetailsArr=array();
			$query1="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$this->visitid'";
			$dbquery1 = new dbquery($query1,$connid);
			while ($row1=$dbquery1->getrowarray())
			{					
				$paramdetailsArr[$row1['paramid']]['flag']=$row1['paramflag'];
				$paramdetailsArr[$row1['paramid']]['time']=$row1['time'];
			}
			$visitparams = $this->fetchCTSVisitParameters($connid);
			foreach ($visitparams as $paramid => $visit_parameter)
			{
				$outputstr.="<tr><td>".$visit_parameter.": </td>";
				if ($paramid=='8' || $paramid=='9' || $paramid=='10' || $paramid=='11')
				{
					$taskarr= $this->fetchTeacherTasks($connid);
					$tasksdoneArray=explode(",",$paramdetailsArr[$paramid]['flag']);
					$outputstr.="<td>";
					if ($paramid=='10' || $paramid=='11')
					{
						$ctsquery="SELECT ctsvisitid FROM  tst_ctsvisit_master WHERE schoolcode=$schoolcode AND ctsvisitid!='$this->visitid' ORDER BY ctsvisitid DESC LIMIT 1";
						$ctsresult=mysql_query($ctsquery) or die(mysql_error());
						$ctsrow=mysql_fetch_array($ctsresult);
						$prectsvisitid=$ctsrow[0];
						
						if ($paramid=='10')
							$ctsquery="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$prectsvisitid' AND paramid=8";
						else				
							$ctsquery="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$prectsvisitid' AND paramid=9";
						$ctsresult=mysql_query($ctsquery) or die(mysql_error());
						$ctsrow1=mysql_fetch_array($ctsresult);
						$prevtasks=explode(",",$ctsrow1['paramflag']);
						
						foreach ($taskarr as $id=>$task)
						{
							$chk="";
							if (in_array($task,$prevtasks))
								$chk="checked";
							$outputstr.="<input type='checkbox' name='task".$paramid.$id."' value='$task' $chk disabled>$task <br>";
						}
					}
					else 
					{
						foreach ($taskarr as $id=>$task)
						{						
							$chk="";
							if (in_array($task,$tasksdoneArray))
								$chk="checked";
							$outputstr.="<input type='checkbox' name='task".$paramid.$id."' value='$task' $chk>$task <br>";
						}
					}
					
					$outputstr.="</td>";
				}
				else 
				{
					$flag=$paramdetailsArr[$paramid]['flag'];
					
					$ychk="";$nchk="";
					if ($flag=='Y')
						$ychk = "checked";
					elseif ($flag=='N')
						$nchk="checked";
					$outputstr.="<td><input type='radio' name='".$paramid."' value='Y' $ychk>Yes";
					$outputstr.="<input type='radio' name='".$paramid."' value='N' $nchk>No</td>";
				}					
				$outputstr.="<td><input type='text' name='time$paramid' value='".$paramdetailsArr[$paramid]['time']."'></td>
				<td><textarea name='comments$paramid' rows=2 cols=30>".$row['parameter'.$paramid]."</textarea></td>";
			}
			$outputstr.="<tr><td colspan='4' align='center'>Demo/Workshop delivered by EI faculty / Teacher (mention class and topic details)</td></tr>";
			$outputstr.="<tr><td colspan='4' align='center'><table border='1'>";
			$outputstr.="<tr align='center'><td><b>Demo/<br>Workshop</b></td><td><b>Class</b></td><td><b>Subject</b></td><td><b>Topic</b></td><td><b>Demo Taken By</b></td><td><b>Name</b></td><td><b>Time(in mints)</b></td><td><b>Post demo discussion commnets</b></td></tr>";
			
			$i=1;
			$query1="SELECT * FROM tst_ctsvisit_demos WHERE ctsvisitid='$this->visitid' ORDER BY demono";
			$dbquery1 = new dbquery($query1,$connid);
			while ($row1=$dbquery1->getrowarray())
			//for ($i=1;$i<=3;$i++)
			{
				$dmchk="";
				$wrchk="";
				if ($row1['demo_workshop']=='demo')
					$dmchk="selected";
				if ($row1['demo_workshop']=='workshop')
					$wrchk="selected";
				$outputstr.="<tr><td><select name='demoworkshop$i'><option value=''>Select</option>";
				$outputstr.="<option value='demo' $dmchk>Demo</option>";
				$outputstr.="<option value='workshop' $wrchk>Workshop</option>";
				$outputstr.="</select></td><td><select name='class$i'><option value=''>Select</option>";
				foreach ($this->classArr as $cls)
				{
					$chk="";
					if ($cls==$row1['class'])
						$chk="selected";
					$outputstr.="<option value='$cls' $chk>$cls</option>";
				}
				$outputstr.="</select></td><td><select name='subject$i'><option value=''>Select</option>";
				foreach ($this->subjectArray as $sub)
				{
					$chk="";
					if ($sub==$row1['subject'])
						$chk="selected";
					$outputstr.="<option value='$sub' $chk>$sub</option>";
				}
				$outputstr.="</select></td><td><input type='text' name='topic$i' value=".$row1['topic']."></td>";
				
				$eichk="";
				$tchr="";
				if ($row1['eifaculty_teacher']=='Eifaculty')
					$eichk="checked";
				elseif ($row1['eifaculty_teacher']=='Teacher')
					$tchr="checked";
				$outputstr.="<td><input type='radio' name='check$i' value='Eifaculty' $eichk>Eifaculty<br>";
				$outputstr.="<input type='radio' name='check$i' value='Teacher' $tchr>Teacher</td>";
				$outputstr.="<td><input type='text' name='name$i' value='".$row1['name']."'></td>";
				$outputstr.="<td><input type='text' name='demotime$i' value='".$row1['time']."'></td>";
				$outputstr.="<td><textarea name='democomments$i' rows=2 cols=50>".$row1['keypoints_discussed']."</textarea></td>";
				$i++;
			}
			
			for ($i=$i;$i<=3;$i++)
			{
				$outputstr.="<tr><td><select name='demoworkshop$i'><option value=''>Select</option>";
				$outputstr.="<option value='demo'>Demo</option>";
				$outputstr.="<option value='workshop'>Workshop</option>";
				$outputstr.="</select></td><td><select name='class$i'><option value=''>Select</option>";
				foreach ($this->classArr as $cls)
				{
					$outputstr.="<option value=$cls>$cls</option>";
				}
				$outputstr.="</select></td><td><select name='subject$i'><option value=''>Select</option>";
				foreach ($this->subjectArray as $sub)
				{
					$outputstr.="<option value='$sub'>$sub</option>";
				}
				$outputstr.="</select></td><td><input type='text' name='topic$i'></td>";
				$outputstr.="<td><input type='radio' name='check$i' value='Eifaculty'>Eifaculty<br>";
				$outputstr.="<input type='radio' name='check$i' value='Teacher'>Teacher</td>";
				$outputstr.="<td><input type='text' name='name$i'></td>";
				$outputstr.="<td><input type='text' name='demotime$i'></td>";
				$outputstr.="<td><textarea name='democomments$i' rows=2 cols=50></textarea></td>";
			}
			$outputstr.="</table></td></tr>";
			$outputstr.="<tr><td colspan='4' align='center'><input type='button' name='Save' id='Save'  class='button' value='Save' onclick='return editCTSVisitDetails($this->visitid)'></td></tr></table>";
			$outputstr.="<input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		}
		return $outputstr;
	}
	
	function monthlyCTSVisitReport($userid,$connid,$usertype)
	{
		$this->setpostvars();
		$this->setgetvars();
		
		$visaitparamets = $this->fetchCTSVisitParameters($connid);
		//$this->setmastervars($schoolcode,$connid);
		$schoolcodeArr = $this->getAllSchools($connid);
		
		$query="SELECT * FROM tst_ctsvisit_master WHERE ctsvisitid='$this->visitid'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
			
		$srno=1;
		$outputstr ="<table border=1 style='border-collapse: collapse' align='center'>";
		$outputstr .= "<tr><td colspan=2 align='center'><b>CTS Monthly Rpeort</b></td></tr>";
		$outputstr .= "<tr><td><b>Start Date</b></td><td><b>End Date</b></td></tr>";
		$outputstr .= "<tr><td><input type='text' name='msstdate' id='msstdate' onfocus='showCalendarControl(this);' value='".$_POST['msstdate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td>";
		$outputstr .= "<td><input type='text' name='msenddate' id='msenddate' onfocus='showCalendarControl(this);' value='".$_POST['msenddate']."' onkeyup='showCalendarControl(this);' size='15' maxlength='10'></td>";
		$outputstr .= "</tr><tr><td colspan='2' align='center'><input type='submit' name='go' value='GO'></td></tr>";
		$outputstr .= "</table><br>";
		
		if ($_POST)
		{
			$startdate=formatDate($_POST['msstdate']);
			$enddate=formatDate($_POST['msenddate']);
			
			//table header
			$outputstr.="<table border=1 style='border-collapse: collapse' align='center' width='50%'>";
			$outputstr.="<tr><th>SrNo</th><th>SchoolName</th>";
			foreach ($visaitparamets as $paramid=>$parameter){
				if ($paramid>9)
					continue;
				$outputstr.="<th>$parameter</th>";
			}
			$outputstr.="<th>Demo/Workshop Details</th><th>Total time (mins)</th></tr>";
			
			//school wise loop
			foreach ($schoolcodeArr as $schoolcode=>$schoolname)
			{
				//query to get school visitid
				$query="SELECT ctsvisitid FROM tst_ctsvisit_master WHERE SchoolCode='$schoolcode' AND visitdate BETWEEN '$startdate' AND '$enddate' order by ctsvisitid DESC LIMIT 1";
				//echo "<br>".$query;
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				$visitid=$row['ctsvisitid'];
				
				$outputstr.="<tr><td align='center'>$srno</td><td>$schoolname</td>";
				
				//query to get details of visit from master table
				$query="SELECT * FROM tst_ctsvisit_master WHERE ctsvisitid='$visitid'";
				$dbquery = new dbquery($query,$connid);
				if ($dbquery->numrows()==0){   //if 0 row then blank cells
					foreach ($visaitparamets as $paramid=>$parameter){
						if ($paramid>9)
							continue;
						$outputstr.="<td>&nbsp;</td>";
					}
					$outputstr.="<td>&nbsp;</td><td>&nbsp;</td>";
				}
				while ($row = $dbquery->getrowarray())
				{
					$totaltime=0;
					$paramdetailsArr=array();
					$query1="SELECT * FROM tst_ctsvisit_parameters_details WHERE ctsvisitid='$visitid'";
					$dbquery1 = new dbquery($query1,$connid);
					while ($row1=$dbquery1->getrowarray())
					{
						if ($row1['paramflag']=='Y')
							$row1['paramflag']='YES';
						if ($row1['paramflag']=='N')
							$row1['paramflag']='NO';
							
						$paramdetailsArr[$row1['paramid']]['flag']=$row1['paramflag'];
						$totaltime+=$row1['time'];
					} 
					$paramdetailsArr[$visitid]['time']=$totaltime;
						
					foreach ($visaitparamets as $paramid=>$parameter){
						if ($paramid>9)
							continue;
					
						if ($paramid==8 || $paramid==9)
							$outputstr.="<td>".$paramdetailsArr[$paramid]['flag']."</td>";
						else 
							$outputstr.="<td>".$row['parameter'.$paramid]."</td>";
					}
				
					$querydemo="SELECT * FROM tst_ctsvisit_demos WHERE ctsvisitid='$visitid'";
					$dbquerydemo = new dbquery($querydemo,$connid);
					if ($dbquerydemo->numrows()==0){
						$outputstr.="<td>&nbsp;</td>";
					}
					else {
						$outputstr.="<td>";
						while ($rowdemo = $dbquerydemo->getrowarray())
						{
							if ($rowdemo['demo_workshop']=='demo')
								$outputstr.="<b>Demo Details</b><br>";
							if ($rowdemo['demo_workshop']=='workshop')
								$outputstr.="<b>Workshop Details</b>:<br>";
							
							$outputstr.="Class: ".$rowdemo['class']."<br>Subject: ".$rowdemo['subject']."<br>Topic: ".$rowdemo['topic']."<br>Duration (mins): ".$rowdemo['time']."<br>Keypoints discussed: ".$rowdemo['keypoints_discussed']."<br>";
							
							$totaltime+=$rowdemo['time'];
						}
						$outputstr.="</td>";
					}
					$outputstr.="<td>$totaltime</td>";
				}
				$outputstr.="</tr>";
				$srno++;
			}
			$outputstr.="</table>";
		}
		return $outputstr;
	}
	
	function getAllSchools($connid)
	{
		$schoolarr = array();
		$query="SELECT * FROM tst_school_master order by schoolcode";
		$dbquery = new dbquery($query,$connid) or die(mysql_error());
		while ($row = $dbquery->getrowarray())
		{
			$schoolarr[$row['SchoolCode']] = $row['SchoolName'];
		}
		return $schoolarr;
	}
	
	function getMSschoolcode($schoolcode,$connid)
	{
		$msschoolcode='';
		$query="SELECT MSSchoolCode FROM tst_school_master WHERE SchoolCode='$schoolcode'";
		$dbquery = new dbquery($query,$connid);
		$row=$dbquery->getrowarray();
		$msschoolcode=$row[0];
		return $msschoolcode;
	}

	function fetchComputerDetails($schoolcode,$userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$coordinatorUsers = $this->coOrdinateTeachers;
		$computerid=$this->computerid;		
		$servernames=$this->getServerNames($schoolcode,$connid);
		
		if ($this->actiontoperform=='Delete Computer' && $computerid!='')
		{
			$query="DELETE FROM tst_schoolwisecomputers WHERE computerid=$computerid";
			$dbquery = new dbquery($query,$connid);
		}
		$outputStr = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='5' align='center'><b>Computer Details</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td colspan='5' align='center'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr align='center'><td><b>SrNo</b></td><td><b>Computer Label</b></td><td><b>Connected Server</b></td><td><b>Computer Description</b></td>";
		/*if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{*/
			$outputStr .= "<td><b>Actions</b></td>";
		//}
		$outputStr .= "</tr>";
		
		$srno=1;
		//$query = "SELECT * FROM tst_studentmaster WHERE SchoolCode=$schoolcode AND status='A' ORDER BY class,section";
		$query = "SELECT * FROM tst_schoolwisecomputers WHERE schoolCode=$schoolcode ORDER BY computerid";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$color='';
			if ($row['isserver']=='Y')
				$color='#80FF80';
			$outputStr .= "<tr align='center'><td>".$srno."</td><td nowrap align='left' style='background-color:$color;'>".$row['label_computer']."</td><td>".$servernames[$row['server_computer']]."</td><td>".$row['desc_computer']."</td>";
			/*if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
			{
			*/	$rowcomputerid=$row['computerid'];
				$outputStr .= "<td nowrap><img title='Edit' src='images/edit.png' onclick='javascript:browse_window($rowcomputerid,14)' > | ";
				$outputStr .= "<img title='Delete' src='images/delete.png' onclick=deleteComputer($rowcomputerid)></td>";
			//}
			$outputStr .= "</tr>";
			$srno++;
		}
		/*if(in_array($userid,$this->masterusers) || in_array($userid,$coordinatorUsers))
		{*/
			$outputStr .= "<tr><td colspan='5' align='center'><a href='javascript:browse_window(0,14)'>Add New Computer</a></td></tr>";
		//}
		$outputStr.="</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'>";
		$outputStr.="<table cellspacing='4'><tbody><tr><td width='10%' height='20%' bgcolor='#80FF80'></td><td>Server machines</td><td></td></tr></tbody></table>";
		echo $outputStr;
	}
	
	function updateComputerDetails($schoolcode,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$this->setmastervars($schoolcode,$connid);
		$schrow = $this->fetchSchoolGeneralDetails($schoolcode,$connid);
		$computerid = $this->computerid;
		//print_r($_POST);
		$outputStr  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$outputStr .= "<tr bgcolor='".$this->logocolor1."'><td align='center' colspan='2'><b>School Name: ".$schrow['SchoolName']." (".$schrow['District'].")</b></td></tr>";
		$outputStr .= "<tr bgcolor='".$this->logocolor2."'><td align='center' colspan='2'><font color='#FFFFFF'><b>Computer Details</b></font></td></tr>";
		
		$servernames=$this->getServerNames($schoolcode,$connid);
		if ($computerid!=0)
		{
			$query = "SELECT * FROM tst_schoolwisecomputers WHERE computerid=$computerid";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
		}
		//{			
		$outputStr .= "<tr><td><b>Computer Label:</b></td><td><input type=text name='computer' id='computer' value=\"".$row['label_computer']."\"></td></tr>";
			
		if ($computerid!=0)
		{
			if ($row['isserver']=='N')
				$outputStr .= "<tr><td><b>Select server of this computer:</b></td><td><select name='comp_server' id='comp_server' onchange=showothertextbox()><option value=''>Select</option>";
			foreach ($servernames as $serverid=>$server)
			{
				$checked='';
				if ($serverid==$row['server_computer'])
					$checked='selected';
				$outputStr.="<option value=\"".$serverid."\" $checked>$server</option>";
			}
			$outputStr.="<option value='other'>Other</option></select><br><input type='text' name='other_server' id='other_server' style='display:none'></td></tr>";
		}
		else 
		{
			$outputStr .= "<tr><td><b>Is Server?</b></td><td><input type=radio name='server' id='server' value='Y' checked onchange=showservers($schoolcode,'Y')>Yes    &nbsp;&nbsp;<input type=radio name='server' id='server' value='N' onchange=showservers($schoolcode,'N')>No<br></td></tr>";
			$outputStr .= "<tr id='serverselect' style='display:none;'><td><b>Select server of this computer:</b></td><td><select name='comp_server' id='comp_server' onchange=showothertextbox()><option value=''>Select</option>";
			foreach ($servernames as $serverid=>$server)
			{
				$outputStr.="<option value=\"".$serverid."\">$server</option>";
			}
			$outputStr.="<option value='other'>Other</option></select><br><input type='text' name='other_server' id='other_server' style='display:none'></td></tr>";
		}
		$outputStr .= "<tr><td><b>Computer Descripton:</b></td><td><textarea name='comp_desc' id='comp_desc' rows='3' cols='25'>".$row['desc_computer']."</textarea></tr>";
		//}
		$outputStr .= "<tr align=center><td colspan=2><input type=button name=save id=save value=Save onclick='updateComputer($computerid)'></td></tr>";
		
		$outputStr .= "</table><input type='hidden' name='hdn_actiontoperform' id='hdn_actiontoperform'><br>";
		$outputStr .= "<p align='center'><b><a href='javascript:window.close();'>Close</a></b></p>";
		echo $outputStr;
	}
	
	function getServerNames($schoolcode,$connid)
	{
		$servernamesArr=array();
		$query="SELECT DISTINCT computerid,label_computer FROM tst_schoolwisecomputers WHERE SchoolCode='$schoolcode' AND isserver='Y' ORDER BY computerid";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$servernamesArr[$row['computerid']] = $row['label_computer'];
		}
		return $servernamesArr;
	}
}
?>