<?php

class clscts
{
	var $cts_number;
	var $cid_number;
	var $firstname;
	var $secondname;
	var $lastname;
	var $fathername;
	var $mothername;
	var $guardinname;
	var $gender;
	var $dob;
	var $phone;
	var $email;
	var $isphisicallychallenged;
	var $occupation_of_father;
	var $occupation_of_mother;
	var $address;
	var $dzongkhag;
	var $gewog;
	var $village;
	var $school;
	var $schoolsugg;
	var $schoolcode;
	var $class;
	var $section;
	var $mother_tongue;
	var $nationality;
	var $hobby1;
	var $hobby2;
	var $hobby3;
	var $strength1;
	var $strength2;
	var $strength3;
	var $weakness1;
	var $weakness2;
	var $weakness3;
	var $boader;
	var $repeater;
	var $wfp;
	var $otheractivities_comments;
	var $photograph;
	var $actiontoperform;
	var $classArray;
	var $sectionArray;
	var $motherTongueArray;
	var $totalClasses;
	var $totalSections;
	var $totalMotherTongue;
	var $message;
	var $childcodestoapprove;
	var $clspaging;
	var $hobbyarray;
	var $strengthsarray;
	var $weaknessarray;
	var $yesnoarray;
	var $conditionarray;
	var $agecondition;
	var $agevalue;

	// Teacher specific variables
	var $teacher_id;
	var $designationArray;
	var $statusArray;
	var $designation;
	var $status;
	var $qualification;
	var $dofa;
	var $doca;
	var $dolp;
	var $experience;
	var $teachercodestoapprove;
	var $responsibilities_comments;
	var $remain_evaluator_times;
	var $teacher_subjects_fullname;
	var $teacher_subjects_shortname;

	// Upload test data specific variables
	var $isquestionwisemarks;
	var $iscommontest;
	var $totalsubjects;
	var $test_type;
	var $upload_id;
	var $fileUploadMessage;

	// School related variables
	var $schoolCategoryArray;
	var $schoolAccessCategoryArray;
	var $schoolTypeArray;
	var $schoolname;
	var $schoolcategory;
	var $schoolaccesscategory;
	var $schooltype;
	var $dateofschooleshtablishment;
	var $totalboys;
	var $totalgirls;
	var $principalname;
	var $schoolcodestoapprove;
	var $schoollist_array;
	var $villagelistwithgewog_array;

	var $access_motor_road;
	var $ifno_howfarinKM;
	var $howlongtowalk_HRSDays;
	var $kindofroad_nearest;
	var $areaofcompound_acres;
	var $isresource_center;

	// Query Interface
	var $queryselected;
	var $studentname;
	var $teachername;
	var $subjectstaught;
	var $subjectscanteach;
	var $totalstudentcondition;
	var $totalstudentvalue;

	var $st_searchtext;
	var $st_agecondition;
	var $st_agevalue;
	var $st_gender;
	var $tc_agecondition;
	var $tc_agevalue;
	var $tc_searchtext;
	var $tc_gender;

	//Promote/Demote class variables...
	var $pddate;
	var $pdallschools;
	var $pdsatsids;

	//add by sumita 20/4/2009
	var $maritual_status;
	var $maritual_status_array;
	var $grade_pcs;
	var $employeeid;
	var $classestaught;
	var $classescanteach;
	var $taughtcount;
	var $cantaughtcount;
	
	// Advanced Query Variables - Starts Here
	var $aq_field1;
	var $aq_condition1;
	var $aq_condition1_value;
	
	var $aq_field2;
	var $aq_condition2;
	var $aq_condition2_value;
	
	var $andor_radio;
	var $student_master_fields;
	var $student_master_fields_datatypes;
	var $aq_name;
	var $numericdatatypes;
	var $savedqueriesforuser;
	// Advanced Query Variables - Ends Here
	
	// School Module Variables - Starts Here
	var $schooltestyears;
	var $schooltestnames;
	var $schooltestcurrentyear;
	var $schooltest_insertedpaperids;
	var $holiday;
	var $holidaydate;
	var $holidaydesc;
	var $testcounter;
	var $student_reportcardcomments_old;
	// School Module Variables - Ends Here
	
	// Variables for time table starts here - Nitin
	var $academicsession_startdate;
	var $academicsession_enddate;
	var $isweekdayshavesametimings;
	var $MonToSat_TotalPeriods;
	var $MonToSat_TotalBreaks;
	var $MonToFri_TotalPeriods;
	var $MonToFri_TotalBreaks;
	var $Sat_TotalPeriods;
	var $Sat_TotalBreaks;
	var $periodlength;
	var $timetablecode;
	var $weekdays = array();
	var $classe;
	var $sectione;
	var $hour_array;
	var $min_array;
    var $current_day;
    var $day_array;
    var $color_array;
	// Variables for time table ends here - Nitin
	
	// Variables for teacher training module starts here - Arpit
	var $ttsubject;
	var $ttsubject_section;
	var $ttsubjects_array;
	var $ttsubjects_sections_array;
	var $ttshowskillno;
	// Variables for teacher training module ends here - Arpit
	
	//variables for teacher training module by vishak
	var $training_Name_add;
	var $training_Description_add;
	var $trainingCode;
	var $trainigLevels = array();
	var $trainigOrganizer = array();
	var $trainingDetailCode;
	var $searchTeacherReportsYearArr = array();
	var $regionCount = '';
	var $delTxCode;
	var $total_days;
	//variables for teacher module by vishak ends here.
	
	//variables for change in Child module by vishak
	var $guardianType = array();
	var $nationalityType = array();
	var $guardian_secondname = '';
	var $new_enrollment = '';
	var $rejoin = '';
	var $skill = '';
	
	
	// Advanced Query Module - Starts Here
	var $asslsubjectsarray;	
	var $subject;	
	var $adqno;
	// Advanced Query Module - Starts Here
	
	//Add Child Modification - Vishak
	var $daycare_stat;
	var $daycare_years;
	var $qualification_pro;
	var $incomelevel_guardian;
	var $incomelevel_guardian_array;
	var $xmlfilestatus;
	var $stwk_string;
	//Add Child Modification ends here
	
	
	function clscts()
	{
		$this->cts_number=0;
		$this->cid_number=0;
		$this->firstname="";
		$this->secondname='';
		$this->lastname="";
		$this->fathername="";
		$this->mothername="";
		$this->guardinname="";
		$this->gender="";
		$this->dob="";
		$this->phone=0;
		$this->email="";
		$this->isphisicallychallenged="";
		$this->occupation_of_father="";
		$this->occupation_of_mother="";
		$this->address="";
		$this->dzongkhag="";
		$this->gewog="";
		$this->village="";
		$this->school="";
		$this->schoolsugg="";
		$this->schoolcode="";
		$this->class="";
		$this->section="";
		$this->mother_tongue="";
		$this->nationality="";
		$this->hobby1="";
		$this->hobby2="";
		$this->hobby3="";
		$this->strength1="";
		$this->strength2="";
		$this->strength3="";
		$this->weakness1="";
		$this->weakness2="";
		$this->weakness3="";
		$this->boader="";
		$this->repeater="";
		$this->wfp="";
		$this->otheractivities_comments="";
		$this->photograph="";
		$this->actiontoperform="";
		$this->classArray=array("PP","1","2","3","4","5","6","7","8","9","10","11","12");
		$this->sectionArray=array("A","B","C","D","E","F","G");
		$this->motherTongueArray=array("Dzongkha","English","Sharchop","Nepali/Lhotsamkha","Bumthangkha");
		$this->totalClasses=count($this->classArray);
		$this->totalSections=count($this->sectionArray);
		$this->totalMotherTongue=count($this->motherTongueArray);
		$this->message="";
		$this->childcodestoapprove="";
		$this->yesnoarray = array("Y","N");
		$this->conditionarray = array("<","<=",">",">=","=");
		$this->agecondition="";
		$this->agevalue="";

		$this->clspaging = new clspaging('bhutancts');
		$this->clspaging->sortby = "firstname";
		$this->clspaging->sorttype = "ASC";
		$this->clspaging->numofrecsperpage=25;

		$this->hobbyarray = array("Playing and watching cricket.","Reading books.","Listning music.");
		$this->strengthsarray = array("Sharp memory.","Time management in my home work.","Having good speech.");
		$this->weaknessarray = array("Getting bored by reading same books.","Home sickness.","Weak in maths.");

		$this->teacher_id="";
		$this->designationArray = array("Principal","Vice Principal","Teacher");
		$this->statusArray = array("Regular","Contract","Intern","Temp/Grad","Volunteer","Other");
		$this->designation="";
		$this->status="";
		$this->qualification="";
		$this->dofa="";
		$this->doca="";
		$this->dolp="";
		$this->experience="";
		$this->teachercodestoapprove="";
		$this->responsibilities_comments="";
		$this->remain_evaluator_times="";
		$this->teacher_subjects_fullname = array("ACCOUNTS","ARTS","BIOLOGY","CHEMISTRY","COMMERCE","COMPUTER APPLICATIONS",
												 "DZONGKHA","ECONOMICS","ENGLISH","EVS","GENERAL","GEOGRAPHY",
												 "HEALTH & POPULATION EDUCATION","HISTORY","IT","MATHS","MORAL AND VALUE EDUCATION",
												 "PHYSICS","SCIENCE","SOCIAL STUDIES");
		$this->teacher_subjects_shortname = array("ACC","ART","BIO","CHE","COM","COA","DZO","ECO","ENG","EVS","GEN","GEO",
												  "HPE","HIS","IT","MAT","VED","PHY","SCI","SS");
		/*$this->teacher_subjects_shortname = array("AC","AR","BI","CH","CO","CA","DZ","EC","EN","EV","GN","GE",
												  "HP","HS","IT","MA","VE","PH","SC","SS");*/

		$this->isquestionwisemarks="";
		$this->iscommontest="";
		$this->totalsubjects=0;
		$this->test_type="";
		$this->upload_id="";
		$this->fileUploadMessage="";

		$this->schoolCategoryArray = array("Private","Public","NFE","BS","AFS");
		$this->schoolAccessCategoryArray = array("U"=>"Urban","SU"=>"Semi Urban","SR"=>"Semi Remote","R"=>"Remote","VR"=>"Very Remote","D"=>"Difficult");
		$this->schoolTypeArray = array("CPS","PS","LSS","MSS","HSS","ECR");
		$this->schoolname = "";
		$this->schoolcategory="";
		$this->schoolaccesscategory="";
		$this->schooltype = "";
		$this->dateofschooleshtablishment = "";
		$this->totalboys = "";
		$this->totalgirls = "";
		$this->principalname = "";
		$this->schoolcodestoapprove = "";
		$this->schoollist_array = array();
		$this->villagelistwithgewog_array = array();
		$this->access_motor_road = "";
		$this->ifno_howfarinKM = "";
		$this->howlongtowalk_HRSDays = "";
		$this->kindofroad_nearest = "";
		$this->areaofcompound_acres = "";
		$this->isresource_center = "";

		$this->queryselected="";
		$this->studentname="";
		$this->teachername="";
		$this->subjectstaught;
		$this->subjectscanteach;
		$this->totalstudentcondition="";
		$this->totalstudentvalue="";

		$this->st_agecondition="";
		$this->st_agevalue="";
		$this->st_searchtext="";
		$this->st_gender="";
		$this->tc_agecondition="";
		$this->tc_agevalue="";
		$this->tc_searchtext="";
		$this->tc_gender="";
		$this->pddate="";
		$this->pdallschools="";
		$this->pdsatsids="";
		
		//add by sumita 20/4/2009
		$this->maritual_status;
		$this->maritual_status_array = array("","Married","Unmarried","Widow");
		$this->grade_pcs;
		$this->employeeid;
		$this->classestaught="";
		$this->classescanteach="";
		$this->taughtcount="";
		$this->cantaughtcount="";
		
		// Advanced Query Variables - Starts Here
		$this->aq_field1="";
		$this->aq_condition1="";
		$this->aq_condition1_value="";
		
		$this->aq_field2="";
		$this->aq_condition2="";
		$this->aq_condition2_value="";
		
		$this->andor_radio="";
		$this->student_master_fields = array("cts_number","schoolcode","class","section","srno","firstname","lastname","fathername","mothername","gender","date_of_birth","phone","email","isphisicallychallenged","mother_tongue","nationality","occupation_of_father","occupation_of_mother","address","boader","repeater","wfp","cid_number");
		$this->student_master_fields_datatypes = array("bigint","bigint","varchar","char","int","varchar","varchar","varchar","varchar","enum","date","varchar","varchar","enum","varchar","varchar","varchar","varchar","varchar","enum","enum","enum","bigint");
		$this->aq_name="";
		$this->numericdatatypes = array("tinyint","smallint","mediumint","int","bigint","float","double","decimal");
		$this->savedqueriesforuser = array();
		// Advanced Query Variables - Ends Here
		
		// School Module Variables - Starts Here
		$currentyear = date('Y');
		$previousyear = $currentyear-1;
		$nextyear = $currentyear+1;
		$this->schooltestyears = array($previousyear,$currentyear,$nextyear);
		$this->schooltestnames = array("Term 1","Term 2","Term 3","Term 4","Final");
		$this->schooltestcurrentyear = 	date("Y");
		$this->schooltest_insertedpaperids = array();
		$this->holiday="";
		$this->holidaydate="";
		$this->holidaydesc="";
		$this->testcounter=0;
		$this->student_reportcardcomments_old="";
		// School Module Variables - Ends Here
		
		//timetable variables starts here - Nitin
		$this->academicsession_startdate="";
		$this->academicsession_enddate="";
		$this->isweekdayshavesametimings="";
		$this->MonToFri_TotalPeriods="";
		$this->MonToFri_TotalBreaks="";
		$this->Sat_TotalPeriods="";
		$this->Sat_TotalBreaks="";
		$this->MonToSat_TotalPeriods="";
		$this->MonToSat_TotalBreaks="";
		$this->periodlength = 40;
		$this->timetablecode="";
		$this->weekdays=array(1 => 'Monday',2 => 'Tuesday',3 => 'Wednesday',4 => 'Thursday',5 => 'Friday',6 => 'Saturday');
		$this->classe='';
		$this->sectione='';
		$this->hour_array=array( '01', '02', '03', '04', '05', '06', '07', '08', '09', '10','11', '12');
		$this->min_array=array('00', '05', '10',  '15', '20', '25', '30', '35', '40', '45','50', '55');
		$this->color_array=array('0'=>'CCC','1'=>'red','2'=>'orange','3'=>'pink','4'=>'yellow','5'=>'blue','6'=>'DCDC');
		$this->currentday = date('w');
		for($i = 0; $i <= 6; $i++)
		{
			$this->day_array[$i] = array('day_no'=>date("w",mktime(0, 0, 0, date("m")  , (date("d")-$this->currentday)+$i, date("Y"))),
									'date'=>date("Y-m-d",mktime(0, 0, 0, date("m")  , (date("d")-$this->currentday)+$i, date("Y"))),
									'day'=>date("D",mktime(0, 0, 0, date("m")  , (date("d")-$this->currentday)+$i, date("Y"))),
									'color'=>$this->color_array[$i],
									);
		}
		//timetable variables ends here - Nitin
		
		// Variables for teacher training module starts here - Arpit
		$this->ttsubject = "";
		$this->ttsubject_section = "";
		$this->ttsubjects_array = array("Content","Pedagogy");
		$this->ttsubjects_sections_array = array("English","Maths","Science");
		$this->ttsubjects_sections_array_keys = array("E"=>"English","M"=>"Maths","S"=>"Science");
		$this->ttshowskillno=0;
		// Variables for teacher training module ends here - Arpit
		
		// Teacher module -Vishak
		$this->training_Name_add='';
		$this->training_Description_add='';
		$this->trainingCode='';
		$this->trainigLevels=array("National","Dzongkhag","Gewog","Village","School");
		$this->trainigOrganizer=array("REC","HR","MOE");
		$this->trainingDetailCode='';
		$this->searchTeacherReportsYearArr=array(date("Y"), (date('Y')-1), (date('Y')-2));
		$this->regionCount = '';
		$this->delTxCode=0;
		$this->total_days = '';
		// Teacher module ends -Vishak
		
		// Advanced Query Module - Starts Here
		$this->asslsubjectsarray = array("English","Maths","Science");
		$this->subject = "";
		$this->adqno;
		// Advanced Query Module - Starts Here
		
		//Add child Changes -Vishak
		$this->guardianType = array("Father","Mother","Brother","Sister","Uncle","Aunty");
		$this->nationalityType = array("Y"=>"BHUTANESE","N"=>"NON-BHUTANESE");
		$this->guardian_secondname = '';
		$this->new_enrollment = '';
		$this->rejoin = '';
		$this->skill = '';
		$this->daycare_stat = "";
		$this->daycare_years = "";
		$this->qualification_pro = "";
		$this->incomelevel_guardian = "";
		$this->incomelevel_guardian_array = array("Below 1 lac","1-2 lac","2-3 lac","3-4 lac","Above 4 lac");
		$this->xmlfilestatus = 0;
		$this->stwk_string = "";
		//Add child Changes -Vishak

	}

  	function setpostvars()
	{
		if(isset($_POST["cts_number"])) 						$this->cts_number  				  = DoTrim($_POST["cts_number"]);
		if(isset($_POST["cid_number"])) 						$this->cid_number  				  = DoTrim($_POST["cid_number"]);
		if(isset($_POST["firstname"])) 							$this->firstname  				  = DoTrim($_POST["firstname"]);
		if(isset($_POST["secondname"])) 						$this->secondname  				  = DoTrim($_POST["secondname"]);
		if(isset($_POST["lastname"])) 							$this->lastname   				  = DoTrim($_POST["lastname"]);
		if(isset($_POST["fathername"])) 						$this->fathername   			  = DoTrim($_POST["fathername"]);
		if(isset($_POST["mothername"])) 						$this->mothername   			  = DoTrim($_POST["mothername"]);
		if(isset($_POST["guardinname"])) 						$this->guardinname   			  = DoTrim($_POST["guardinname"]);
		if(isset($_POST["guard_second_name"])) 					$this->guardian_secondname   	  = DoTrim($_POST["guard_second_name"]);
		if(isset($_POST["gender"])) 							$this->gender  					  = DoTrim($_POST["gender"]);
		if(isset($_POST["dob"]) && $_POST["dob"] !="") 			$this->dob   					  = DoTrim(formatDate($_POST["dob"]));
		if(isset($_POST["phone"])) 								$this->phone   					  = DoTrim($_POST["phone"]);
		if(isset($_POST["email"])) 								$this->email 					  = DoTrim($_POST["email"]);
		if(isset($_POST["isphisicallychallenged"])) 			$this->isphisicallychallenged     = DoTrim($_POST["isphisicallychallenged"]);
		if(isset($_POST["occupation_of_father"])) 				$this->occupation_of_father  	  = DoTrim($_POST["occupation_of_father"]);
		if(isset($_POST["occupation_of_mother"])) 				$this->occupation_of_mother   	  = DoTrim($_POST["occupation_of_mother"]);
		if(isset($_POST["address"])) 							$this->address   				  = DoTrim($_POST["address"]);
		if(isset($_POST["dzongkhag"])) 							$this->dzongkhag   				  = DoTrim($_POST["dzongkhag"]);
		if(isset($_POST["gewog"])) 								$this->gewog   					  = DoTrim($_POST["gewog"]);
		if(isset($_POST["village"])) 							$this->village   				  = DoTrim($_POST["village"]);
		if(isset($_POST["school"])) 							$this->school   				  = DoTrim($_POST["school"]);
		if(isset($_POST["schoolsugg"])) 						$this->schoolsugg   			  = DoTrim($_POST["schoolsugg"]);
		if(isset($_POST["new_enrollment"])) 					$this->new_enrollment   		  = DoTrim($_POST["new_enrollment"]);
		if(isset($_POST["rejoin"])) 							$this->rejoin   		  		  = DoTrim($_POST["rejoin"]);

		if($this->schoolsugg!="")
		{
			$schtemparr = explode("-",$this->schoolsugg);
			$this->school = Dotrim($schtemparr[1]);
			//echo $this->schoolsugg." - ".$this->school;
		}

		if(isset($_POST["childclass"])) 						$this->class   					  = DoTrim($_POST["childclass"]);
		if(isset($_POST["section"])) 							$this->section   				  = DoTrim($_POST["section"]);
		if(isset($_POST["mother_tongue"])) 						$this->mother_tongue   			  = DoTrim($_POST["mother_tongue"]);
		if(isset($_POST["nationality"])) 						$this->nationality   			  = DoTrim($_POST["nationality"]);
		if(isset($_POST["hobby1"])) 							$this->hobby1   				  = DoTrim($_POST["hobby1"]);
		if(isset($_POST["hobby2"])) 							$this->hobby2   				  = DoTrim($_POST["hobby2"]);
		if(isset($_POST["hobby3"])) 							$this->hobby3   				  = DoTrim($_POST["hobby3"]);
		if(isset($_POST["strength1"])) 							$this->strength1   				  = DoTrim($_POST["strength1"]);
		if(isset($_POST["strength2"])) 							$this->strength2   				  = DoTrim($_POST["strength2"]);
		if(isset($_POST["strength3"])) 							$this->strength3   				  = DoTrim($_POST["strength3"]);
		if(isset($_POST["weakness1"])) 							$this->weakness1   				  = DoTrim($_POST["weakness1"]);
		if(isset($_POST["weakness2"])) 							$this->weakness2   				  = DoTrim($_POST["weakness2"]);
		if(isset($_POST["weakness3"])) 							$this->weakness3   			      = DoTrim($_POST["weakness3"]);
		if(isset($_POST["boader"])) 							$this->boader      				  = DoTrim($_POST["boader"]);
		if(isset($_POST["repeater"])) 							$this->repeater    				  = DoTrim($_POST["repeater"]);
		if(isset($_POST["wfp"])) 								$this->wfp   	   				  = DoTrim($_POST["wfp"]);
		if(isset($_POST["otheractivities_comments"])) 			$this->otheractivities_comments   = DoTrim($_POST["otheractivities_comments"]);
		if(isset($_POST["photograph"])) 						$this->photograph   			  = DoTrim($_POST["photograph"]);
		if(isset($_POST["actiontoperform"])) 					$this->actiontoperform   		  = DoTrim($_POST["actiontoperform"]);
		if(isset($_POST["hdn_actiontoperform"])) 				$this->actiontoperform 			  = DoTrim($_POST["hdn_actiontoperform"]);
		if(isset($_POST["childcodestoapprove"])) 				$this->childcodestoapprove 		  = DoTrim($_POST["childcodestoapprove"]);
		if(isset($_POST["agecondition"])) 						$this->agecondition 			  = DoTrim($_POST["agecondition"]);
		if(isset($_POST["agevalue"])) 							$this->agevalue 				  = DoTrim($_POST["agevalue"]);

		if(isset($_POST["teacher_id"])) 						$this->teacher_id 	 			  = DoTrim($_POST["teacher_id"]);
		if(isset($_POST["designation"])) 						$this->designation  			  = DoTrim($_POST["designation"]);
		if(isset($_POST["status"])) 							$this->status   	 			  = DoTrim($_POST["status"]);
		if(isset($_POST["qualification"])) 						$this->qualification 			  = DoTrim($_POST["qualification"]);
		if(isset($_POST["dofa"]) && $_POST["dofa"]!="") 		$this->dofa   		 			  = DoTrim(formatDate($_POST["dofa"]));
		if(isset($_POST["doca"]) && $_POST["doca"]!="") 		$this->doca   		 			  = DoTrim(formatDate($_POST["doca"]));
		if(isset($_POST["dolp"]) && $_POST["dolp"]!="") 		$this->dolp   		 			  = DoTrim(formatDate($_POST["dolp"]));
		if(isset($_POST["experience"])) 						$this->experience    			  = DoTrim($_POST["experience"]);
		if(isset($_POST["teachercodestoapprove"])) 				$this->teachercodestoapprove 	  = DoTrim($_POST["teachercodestoapprove"]);
		if(isset($_POST["responsibilities_comments"])) 			$this->responsibilities_comments  = DoTrim($_POST["responsibilities_comments"]);
		if(isset($_POST["remain_evaluator_times"])) 			$this->remain_evaluator_times 	  = DoTrim($_POST["remain_evaluator_times"]);

		if(isset($_POST["isquestionwisemarks"])) 				$this->isquestionwisemarks   	  = DoTrim($_POST["isquestionwisemarks"]);
		if(isset($_POST["iscommontest"])) 						$this->iscommontest   		 	  = DoTrim($_POST["iscommontest"]);
		if(isset($_POST["totalsubjects"])) 						$this->totalsubjects   		 	  = DoTrim($_POST["totalsubjects"]);
		if(isset($_POST["test_type"])) 							$this->test_type   		 	 	  = DoTrim($_POST["test_type"]);
		if(isset($_POST["upload_id"])) 							$this->upload_id   		 	 	  = DoTrim($_POST["upload_id"]);

		if(isset($_POST["schoolname"])) 						$this->schoolname   		 		= DoTrim($_POST["schoolname"]);
		if(isset($_POST["schoolcategory"])) 					$this->schoolcategory  				= DoTrim($_POST["schoolcategory"]);
		if(isset($_POST["schoolaccesscategory"])) 				$this->schoolaccesscategory			= DoTrim($_POST["schoolaccesscategory"]);
		if(isset($_POST["schooltype"])) 						$this->schooltype   				= DoTrim($_POST["schooltype"]);
		if(isset($_POST["dateofschooleshtablishment"])) 		$this->dateofschooleshtablishment   = DoTrim(formatDate($_POST["dateofschooleshtablishment"]));
		if(isset($_POST["totalboys"])) 							$this->totalboys   		 	 		= DoTrim($_POST["totalboys"]);
		if(isset($_POST["totalgirls"])) 						$this->totalgirls   		 		= DoTrim($_POST["totalgirls"]);
		if(isset($_POST["principalname"])) 						$this->principalname   	 			= DoTrim($_POST["principalname"]);
		if(isset($_POST["schoolcodestoapprove"])) 				$this->schoolcodestoapprove 		= DoTrim($_POST["schoolcodestoapprove"]);
		if(isset($_POST["schoolcode"])) 						$this->schoolcode 					= DoTrim($_POST["schoolcode"]);

		if(isset($_POST["access_motor_road"]))					$this->access_motor_road     		= DoTrim($_POST["access_motor_road"]);
		if(isset($_POST["ifno_howfarinKM"]))					$this->ifno_howfarinKM      		= DoTrim($_POST["ifno_howfarinKM"]);
		if(isset($_POST["howlongtowalk_HRSDays"]))				$this->howlongtowalk_HRSDays 		= DoTrim($_POST["howlongtowalk_HRSDays"]);
		if(isset($_POST["kindofroad_nearest"]))					$this->kindofroad_nearest    		= DoTrim($_POST["kindofroad_nearest"]);
		if(isset($_POST["areaofcompound_acres"]))				$this->areaofcompound_acres  		= DoTrim($_POST["areaofcompound_acres"]);
		if(isset($_POST["isresource_center"]))					$this->isresource_center     		= DoTrim($_POST["isresource_center"]);

		if(isset($_POST["queryselected"])) 						$this->queryselected 		 		= DoTrim($_POST["queryselected"]);
		if(isset($_POST["studentname"])) 						$this->studentname 			 		= DoTrim($_POST["studentname"]);
		if(isset($_POST["teachername"])) 						$this->teachername 			 		= DoTrim($_POST["teachername"]);
		if(isset($_POST["subjectstaught"])) 					$this->subjectstaught 		 		= DoTrim($_POST["subjectstaught"]);
		if(isset($_POST["subjectscanteach"])) 					$this->subjectscanteach 	 		= DoTrim($_POST["subjectscanteach"]);
		if(isset($_POST["totalstudentcondition"])) 				$this->totalstudentcondition 		= DoTrim($_POST["totalstudentcondition"]);
		if(isset($_POST["totalstudentvalue"])) 					$this->totalstudentvalue 	 		= DoTrim($_POST["totalstudentvalue"]);

		if(isset($_POST["st_agecondition"])) 					$this->st_agecondition  			= DoTrim($_POST["st_agecondition"]);
		if(isset($_POST["st_agevalue"])) 						$this->st_agevalue 					= DoTrim($_POST["st_agevalue"]);
		if(isset($_POST["st_searchtext"])) 						$this->st_searchtext 				= DoTrim($_POST["st_searchtext"]);
		if(isset($_POST["st_gender"])) 							$this->st_gender 					= DoTrim($_POST["st_gender"]);
		if(isset($_POST["tc_agecondition"])) 					$this->tc_agecondition 				= DoTrim($_POST["tc_agecondition"]);
		if(isset($_POST["tc_agevalue"])) 						$this->tc_agevalue 					= DoTrim($_POST["tc_agevalue"]);
		if(isset($_POST["tc_searchtext"])) 						$this->tc_searchtext 				= DoTrim($_POST["tc_searchtext"]);
		if(isset($_POST["tc_gender"])) 							$this->tc_gender 					= DoTrim($_POST["tc_gender"]);
		if(isset($_POST["pddate"]) && $_POST["pddate"]!="")     $this->pddate 					    = formatDate(DoTrim($_POST["pddate"]));
		//if(isset($_POST["pdallschools"])) 					$this->pdallschools 				= DoTrim($_POST["pdallschools"]);
		if(isset($_POST["pdsatsids"])) 							$this->pdsatsids	 				= DoTrim($_POST["pdsatsids"]);
		
		//add by sumita 20/4/2009
		if(isset($_POST["maritual_status"])) 					$this->maritual_status				= DoTrim($_POST["maritual_status"]);
		if(isset($_POST["grade_pcs"])) 							$this->grade_pcs					= DoTrim($_POST["grade_pcs"]);
		if(isset($_POST["employeeid"])) 						$this->employeeid					= DoTrim($_POST["employeeid"]);
		if(isset($_POST["classestaught"])) 						$this->classestaught				= DoTrim($_POST["classestaught"]);
		if(isset($_POST["classescanteach"])) 					$this->classescanteach				= DoTrim($_POST["classescanteach"]);
		if(isset($_POST["taughtcount"])) 						$this->taughtcount					= DoTrim($_POST["taughtcount"]);
		if(isset($_POST["cantaughtcount"])) 					$this->cantaughtcount				= DoTrim($_POST["cantaughtcount"]);

		// Advanced Query Variables - Starts Here
		if(isset($_POST["aq_field1"])) 							$this->aq_field1					= DoTrim($_POST["aq_field1"]);
		if(isset($_POST["aq_condition1"])) 						$this->aq_condition1				= DoTrim($_POST["aq_condition1"]);
		if(isset($_POST["aq_condition1_value"])) 				$this->aq_condition1_value			= DoTrim($_POST["aq_condition1_value"]);
		
		if(isset($_POST["aq_field2"])) 							$this->aq_field2					= DoTrim($_POST["aq_field2"]);
		if(isset($_POST["aq_condition2"])) 						$this->aq_condition2				= DoTrim($_POST["aq_condition2"]);
		if(isset($_POST["aq_condition2_value"])) 				$this->aq_condition2_value			= DoTrim($_POST["aq_condition2_value"]);
		
		if(isset($_POST["andor_radio"])) 						$this->andor_radio					= DoTrim($_POST["andor_radio"]);
		if(isset($_POST["aq_name"])) 							$this->aq_name						= DoTrim($_POST["aq_name"]);
		// Advanced Query Variables - Ends Here
		if(isset($_POST["holiday"])) 							$this->holiday						= DoTrim($_POST["holiday"]);
		if(isset($_POST["holidaydate"])) 						$this->holidaydate					= DoTrim($_POST["holidaydate"]);
		if(isset($_POST["holidaydesc"])) 						$this->holidaydesc					= DoTrim($_POST["holidaydesc"]);
		
		//Time table values are stored from here - Nitin
		if(isset($_POST["academicsession_startdate"]))			$this->academicsession_startdate	= DoTrim($_POST["academicsession_startdate"]);
		if(isset($_POST["academicsession_enddate"])) 			$this->academicsession_enddate		= DoTrim($_POST["academicsession_enddate"]);
		if(isset($_POST["week_timings"]))						$this->isweekdayshavesametimings	= DoTrim($_POST["week_timings"]);
		if(isset($_POST["no_periods_mon_to_sat"])) 				$this->MonToSat_TotalPeriods		= DoTrim($_POST["no_periods_mon_to_sat"]);
		if(isset($_POST["no_breaks_mon_to_sat"])) 				$this->MonToSat_TotalBreaks			= DoTrim($_POST["no_breaks_mon_to_sat"]);
		if(isset($_POST["no_periods_mon_to_fri"])) 				$this->MonToFri_TotalPeriods		= DoTrim($_POST["no_periods_mon_to_fri"]);
		if(isset($_POST["no_breaks_mon_to_fri"])) 				$this->MonToFri_TotalBreaks			= DoTrim($_POST["no_breaks_mon_to_fri"]);
		if(isset($_POST["no_periods_sat"])) 					$this->Sat_TotalPeriods				= DoTrim($_POST["no_periods_sat"]);
		if(isset($_POST["no_breaks_sat"])) 						$this->Sat_TotalBreaks				= DoTrim($_POST["no_breaks_sat"]);
		if(isset($_POST['timetablecode']))						$this->timetablecode 				= $_POST['timetablecode'];
		if(isset($_POST['class_names']))                        $this->classe                       = DoTrim($_POST['class_names']);
		if(isset($_POST['section_names']))                      $this->sectione                     = DoTrim($_POST['section_names']);
		//Time table values storation ends here - Starts Here
		
		// Variables for teacher training module starts here - Arpit
		if(isset($_POST['ttsubject']))                      	$this->ttsubject                     = DoTrim($_POST['ttsubject']);
		if(isset($_POST['ttsubject_section']))                  $this->ttsubject_section             = DoTrim($_POST['ttsubject_section']);
		if(isset($_POST['ttshowskillno']))                      $this->ttshowskillno             	 = DoTrim($_POST['ttshowskillno']);
		// Variables for teacher training module ends here - Arpit
		
		// Teacher Training Exercise values start here - Vishak
		if(isset($_POST['training_name']))						$this->training_name 				= $_POST['training_name'];
		if(isset($_POST['training_description']))					$this->training_description 		= $_POST['training_description'];
		if(isset($_POST['addnew_trainingcode']))					$this->trainingcode 				= $_POST['addnew_trainingcode'];
		if(isset($_POST['trainingstartdate']))						$this->trainingstartdate 			= $_POST['trainingstartdate'];
		if(isset($_POST['trainingenddate']))						$this->trainingenddate 			= $_POST['trainingenddate'];
		if(isset($_POST['participant_count']))					$this->participant_count 			= $_POST['participant_count'];
		if(isset($_POST['level_of_training']))						$this->level_of_training 			= $_POST['level_of_training'];
		if(isset($_POST['training_organizer']))					$this->training_organizer 			= $_POST['training_organizer'];
		if(isset($_POST['training_conductor']))					$this->training_conductor 		= $_POST['training_conductor'];
		if(isset($_POST['venue']))								$this->venue 					= $_POST['venue'];
		if(isset($_POST['organizer_comments']))					$this->organizer_comments 		= $_POST['organizer_comments'];
		if(isset($_POST['totalInputs']))							$this->totalTeacherInputs 		= $_POST['totalInputs'];
		if(isset($_POST['trainingDetailCode']))					$this->trainingDetailCode 		= $_POST['trainingDetailCode'];
		if(isset($_POST['regionCount']))							$this->regionCount 				= $_POST['regionCount'];
		if(isset($_POST['transaction_detail_id']))					$this->delTxCode 				= $_POST['transaction_detail_id'];
		if(isset($_POST['skill']))								$this->skill 					= $_POST['skill'];
		if(isset($_POST['total_days']))							$this->total_days 				= $_POST['total_days'];
		if(isset($_POST['daycare_years']))						$this->daycare_years 			= $_POST['daycare_years'];
		if(isset($_POST['daycare_stat']))						$this->daycare_stat 				= $_POST['daycare_stat'];
		if(isset($_POST['qualification_pro']))						$this->qualification_pro 		= $_POST['qualification_pro'];
		if(isset($_POST['incomelevel_guardian']))					$this->incomelevel_guardian 	= $_POST['incomelevel_guardian'];	
		
		// Teacher Training Exercise values ends here - Vishak
		
		// Advanced Query Module - Starts Here
		if(isset($_POST['subject']))							$this->subject 						= $_POST['subject'];
		if(isset($_POST['adqno']))								$this->adqno 						= $_POST['adqno'];
		// Advanced Query Module - Starts Here
	}

	function setgetvars()
	{
		if(isset($_GET["firstname"])) 							$this->firstname    	= DoTrim($_GET["firstname"]);
		if(isset($_GET["lastname"])) 							$this->lastname     	= DoTrim($_GET["lastname"]);
		if(isset($_GET["dob"])) 								$this->dob   			= DoTrim(formatDate($_GET["dob"]));

		if(isset($_GET["cts_number"])) 							$this->cts_number 		= DoTrim($_GET["cts_number"]);
		if(isset($_GET["cid_number"])) 							$this->cid_number 		= DoTrim($_GET["cid_number"]);
		if(isset($_GET["teacher_id"])) 							$this->teacher_id 		= DoTrim($_GET["teacher_id"]);
		if(isset($_GET["schoolcode"])) 							$this->schoolcode 		= DoTrim($_GET["schoolcode"]);
		if(isset($_GET["childclass"])) 							$this->class   			= DoTrim($_GET["childclass"]);
		if(isset($_GET["hdn_actiontoperform"])) 				$this->actiontoperform 	= DoTrim($_GET["hdn_actiontoperform"]);

		if(isset($_GET["schoolcode"])) 							$this->schoolcode   	= DoTrim($_GET["schoolcode"]);
		if(isset($_GET["schoolname"])) 							$this->schoolname   	= DoTrim($_GET["schoolname"]);
		if(isset($_GET["schoolcategory"])) 						$this->schoolcategory   = DoTrim($_GET["schoolcategory"]);
		if(isset($_GET["schooltype"])) 							$this->schooltype   	= DoTrim($_GET["schooltype"]);
		if(isset($_GET["village"])) 							$this->village   		= DoTrim($_GET["village"]);
		if(isset($_GET["queryselected"])) 						$this->queryselected 	= DoTrim($_GET["queryselected"]);
		if(isset($_GET["timetablecode"])) 						$this->timetablecode 	= DoTrim($_GET["timetablecode"]);
		if(isset($_GET["classes"])) 							$this->classe 	        = DoTrim($_GET["classes"]);
		if(isset($_GET["section"])) 						    $this->sectione 	    = DoTrim($_GET["section"]);
		
		if(isset($_REQUEST["classes"])) 							$this->classe 	        		= DoTrim($_REQUEST["classes"]);
		if(isset($_REQUEST["section"])) 						    $this->sectione 	    		= DoTrim($_REQUEST["section"]);
		if(isset($_REQUEST["hdn_actiontoperform"])) 				$this->actiontoperform 			= DoTrim($_REQUEST["hdn_actiontoperform"]);
		if(isset($_GET['incomelevel_guardian']))					$this->incomelevel_guardian 	= $_GET['incomelevel_guardian'];	
		if(isset($_GET['subject']))									$this->subject 					= $_GET['subject'];
	}

	function pageAddSchool($userid,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>"; exit;
		$this->setpostvars();
		if($this->actiontoperform == "Add School")
		{
			$totalstudents = $this->totalboys + $this->totalgirls;
			$insertQuery  = "INSERT INTO bt_tellusaboutschool SET ";
			$insertQuery .= "schoolname='".DoAddSlashes($this->schoolname)."',";
			$insertQuery .= "schoolcategory='".DoAddSlashes($this->schoolcategory)."',";
			$insertQuery .= "schooltype='".DoAddSlashes($this->schooltype)."',";
			$insertQuery .= "date_of_eshtablishment='".$this->dateofschooleshtablishment."',";
			if($this->totalboys!="")
				$insertQuery .= "totalboys='".DoAddSlashes($this->totalboys)."',";
			if($this->totalgirls!="")
				$insertQuery .= "totalgirls='".DoAddSlashes($this->totalgirls)."',";
			if($totalstudents!="")
				$insertQuery .= "totalstudents='".$totalstudents."',";
			$insertQuery .= "address='".DoAddSlashes($this->address)."',";
			$insertQuery .= "VillageCode='".$this->village."',";
			$insertQuery .= "phone='".$this->phone."',";
			$insertQuery .= "email='".$this->email."',";
			$insertQuery .= "principal_name='".DoAddSlashes($this->principalname)."',";
			$insertQuery .= "access_motor_road='".DoAddSlashes($this->access_motor_road)."',";
			$insertQuery .= "ifno_howfarinKM='".DoAddSlashes($this->ifno_howfarinKM)."',";
			$insertQuery .= "howlongtowalk_HRSDays='".DoAddSlashes($this->howlongtowalk_HRSDays)."',";
			$insertQuery .= "kindofroad_nearest='".DoAddSlashes($this->kindofroad_nearest)."',";
			$insertQuery .= "areaofcompound_acres='".DoAddSlashes($this->areaofcompound_acres)."',";
			$insertQuery .= "isresource_center='".DoAddSlashes($this->isresource_center)."',";
			$insertQuery .= "approval_status='Pending',";
			$insertQuery .= "addedby='".$userid."'";

			//echo $insertQuery;
			$dbquery = new dbquery($insertQuery,$connid);
			$this->message = "School data inserted successfully...<br>Once school data approved it will be online.";
		}
	}

	function pageApproveSchool($userid,$clsuserrights,$connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Approve School")
		{
			$schoolcodesArray = explode(",",$this->schoolcodestoapprove);
			$totalschoolcodes = count($schoolcodesArray);
			for($i=0; $i<$totalschoolcodes; $i++)
			{
				$schoolcode = substr($schoolcodesArray[$i],1);
				$status = $_POST[$schoolcodesArray[$i]];
				if($status != "Pending")
				{
					if($status == "Approve")
					{
						$schoolcode_master = $this->generateNewSchoolCode($connid);
						$password = randomPasswordGenerator();

						$query = "SELECT * FROM bt_tellusaboutschool WHERE schoolcode='".$schoolcode."'";
						$dbquery = new dbquery($query,$connid);
						$row = $dbquery->getrowarray();

						$villagerow = $this->fetchVillageDetails($row["VillageCode"],$connid);
						
						$insertQuery  = "INSERT INTO school_master SET ";
						$insertQuery .= "schoolcode='".$schoolcode_master."',";
						$insertQuery .= "password=password('".$password."'),";
						$insertQuery .= "password_text='".$password."',";
						$insertQuery .= "schoolname='".$row['schoolname']."',";
						$insertQuery .= "schoolcategory='".$row['schoolcategory']."',";
						$insertQuery .= "schooltype='".$row['schooltype']."',";
						$insertQuery .= "date_of_eshtablishment='".$row['date_of_eshtablishment']."',";
						$insertQuery .= "totalboys='".$row['totalboys']."',";
						$insertQuery .= "totalgirls='".$row['totalgirls']."',";
						$insertQuery .= "totalstudents='".$row['totalstudents']."',";
						$insertQuery .= "address='".$row['address']."',";
						$insertQuery .= "VillageCode='".$row['VillageCode']."',";
						$insertQuery .= "VillageNameEn='".$villagerow["VillageNameEn"]."',";
						$insertQuery .= "GewogNameEn='".$villagerow["GewogNameEn"]."',";
						$insertQuery .= "DzongkhagNameEn='".$villagerow["DzongkhagNameEn"]."',";
						$insertQuery .= "DzongkhagCode='".$villagerow["DzongkhagCode"]."',";
						$insertQuery .= "phone='".$row['phone']."',";
						$insertQuery .= "email='".$row['email']."',";
						$insertQuery .= "access_motor_road='".$row['access_motor_road']."',";
						$insertQuery .= "ifno_howfarinKM='".$row['ifno_howfarinKM']."',";
						$insertQuery .= "howlongtowalk_HRSDays='".$row['howlongtowalk_HRSDays']."',";
						$insertQuery .= "kindofroad_nearest='".$row['kindofroad_nearest']."',";
						$insertQuery .= "areaofcompound_acres='".$row['areaofcompound_acres']."',";
						$insertQuery .= "isresource_center='".$row['isresource_center']."',";
						$insertQuery .= "principal_name='".$row['principal_name']."',";
						$insertQuery .= "addedby='".$row['addedby']."'";

						//echo $insertQuery."<br><br>";
						$dbquery = new dbquery($insertQuery,$connid);

						$updateQuery = "UPDATE bt_tellusaboutschool SET approval_status='Approved' WHERE schoolcode='".$schoolcode."'";
						//echo $updateQuery."<br><br>";
						$dbquery = new dbquery($updateQuery,$connid);

						//$this->assignRightsToChild($cts_number,$clsuserrights,$connid);
						//$this->sendUserActivationMail($row['email'],$row['firstname'],$cts_number,$password);
					}
					elseif($status == "Reject")
					{
						$updateQuery = "UPDATE bt_tellusaboutschool SET approval_status='".$status."' WHERE schoolcode='".$schoolcode."'";
						$dbquery = new dbquery($updateQuery,$connid);
						//echo $updateQuery."<br><br>";
					}
				}
			}
		}

		$output_string  = "<table style='border-collapse: collapse' align='left'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td bgcolor='#FFC0CB'><b>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td><td align='left'><b>Duplicate School - School might exist in master list. View it by clicking link on School Name.</b></td></tr>";
		$output_string .= "</table><br>";

		$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td align='center' colspan='14'><b><font color='#FFFFFF'>Approve School</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>Status</b></td>";
		$output_string .= "<td align='center'><b>School Name</b></td><td align='center'><b>School Category</b></td><td align='center'><b>School Type</b></td>";
		$output_string .= "<td align='center'><b>Address</b></td><td align='center'><b>Village</b></td>";
		$output_string .= "<td align='center'><b>Gewog</b></td>";
		$output_string .= "<td align='center'><b>School phone number</b></td><td align='center'><b>Principal's Email</b></td>";
		$output_string .= "<td align='center'><b>Total Boys<br>(As per form F)</b></td><td align='center'><b>Total Girls<br> (As per form F)</b></td>";
		$output_string .= "<td align='center'><b>Date Of<br>Establishment</b></td><td align='center'><b>Principal's Name</b></td>";
		$output_string .= "</tr>";

		$srno=1;
		$query = "SELECT * FROM bt_tellusaboutschool WHERE approval_status='Pending'";
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		$totalschools = $dbquery->numrows();
		$schoolcodestring = "";
		while($row = $dbquery->getrowarray())
		{
			$schoolcodestring .= "S".$row['schoolcode'].",";
			$statuscombo  = "<select name='S".$row['schoolcode']."'>";
			$statuscombo .= "<option value='Pending'>Pending</option>";
			$statuscombo .= "<option value='Approve'>Approve</option>";
			$statuscombo .= "<option value='Reject'>Reject</option>";
			$statuscombo .= "</select>";

			if($row['date_of_eshtablishment'] == "0000-00-00")
				$dose = "NA";
			else
				$dose = formatDate($row['date_of_eshtablishment']);

			$vquery = "SELECT * FROM bt_village_master WHERE VillageCode=".$row['VillageCode'];
			$vdbquery = new dbquery($vquery,$connid);
			$vrow = $vdbquery->getrowarray();

			$dupQuery = "SELECT COUNT(*) FROM school_master";
			$condition = " WHERE schoolname like '%".$row['schoolname']."%' AND schooltype like '%".$row['schooltype']."%' AND VillageCode='".$row['VillageCode']."'";
			$dupQuery .= $condition;
			$dupdbquery = new dbquery($dupQuery,$connid);
			$duprow = $dupdbquery->getrowarray();

			if($duprow[0] > 0)
				$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#FFC0CB'><td align='center'>".$srno."</td>";
			else
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";

			$output_string .= "<td align='center'>".$statuscombo."</td>";

			if($duprow[0] > 0)
			{
				$queryString = "schoolname=".$row['schoolname']."&schooltype=".$row['schooltype']."&village=".$row['VillageCode'];
				//$output_string .= "<td><a href='bt_showDuplicateChild.php?".$queryString."'>".$row['firstname']."</a></td>";
				$output_string .= "<td><a href='javascript: showDuplicateSchool(\"".$queryString."\")'>".$row['schoolname']."</a></td>";
			}
			else
				$output_string .= "<td>".$row['schoolname']."</td>";

			$output_string .= "<td>".$row['schoolcategory']."</td>";
			$output_string .= "<td>".$row['schooltype']."</td>";
			$output_string .= "<td>".$row['address']."</td>";
			$output_string .= "<td>".$vrow['VillageNameEn']."</td>";
			$output_string .= "<td>".$vrow['GewogNameEn']."</td>";
			$output_string .= "<td align='center'>".$row['phone']."</td>";
			$output_string .= "<td align='center'>".$row['email']."</td>";
			$output_string .= "<td align='center'>".$row['totalboys']."</td>";
			$output_string .= "<td align='center'>".$row['totalgirls']."</td>";
			$output_string .= "<td align='center'>".$dose."</td>";
			$output_string .= "<td>".$row['principal_name']."</td>";
			$output_string .= "</tr>";
			$srno++;
		}

		if($totalschools == 0)
		{
			$output_string .= "<tr><td align='center' colspan='14'><font color='#FF0000'><b>No school data to approve...</b></font></td></tr>";
		}
		else
		{
			$output_string .= "<tr><td align='center' colspan='14'><input type='button' value='Change Status' name='Change Status' onclick='approveschool()'></td></tr>";
		}
		//$output_string .= "</table>";

		if($schoolcodestring != "")
			$schoolcodestring = substr($schoolcodestring, 0, -1);
		$output_string .= "</table>";
		$output_string .= "<input type='hidden' name='schoolcodestoapprove' value='".$schoolcodestring."'>";
		return  $output_string;
	}

	function pageFetchSchoolDetails($userid,$tablename,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();

		$query = "SELECT * FROM ".$tablename;
		$condition = " WHERE schoolname like '%".$this->schoolname."%' AND schooltype like '%".$this->schooltype."%' AND VillageCode=".$this->village;
		$query .= $condition;
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

	function pageFindSchool($userid,$usertype,$trn_editSchool,$userTransactionRightsArray,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>"; //exit;
		$this->setpostvars();
		$this->clspaging->setpostvars();
		if($this->actiontoperform == "Find School")
		{
			$countquery = "SELECT COUNT(*) FROM school_master";
			$query = "SELECT * FROM school_master";
			$condition = "";

			if($this->schoolname != "")
				$condition .= " AND schoolname like '%".DoAddSlashes($this->schoolname)."%'";
			if($this->schoolcategory != "")
				$condition .= " AND schoolcategory like '%".DoAddSlashes($this->schoolcategory)."%'";
			if($this->schooltype != "")
				$condition .= " AND schooltype like '%".DoAddSlashes($this->schooltype)."%'";
			if($this->principalname != "")
				$condition .= " AND principal_name like '%".DoAddSlashes($this->principalname)."%'";
			if($this->email != "")
				$condition .= " AND email='".$this->email."'";
			if($this->dzongkhag != "" && $this->gewog == "")
			{
				$villagesingewog = $this->fetchVillagesInDzongkhag($this->dzongkhag,$connid);
				if($villagesingewog != "")
				{
					$condition .= " AND VillageCode IN (".$villagesingewog.")";
				}
			}
			if($this->gewog != "" && $this->village == "")
			{
				$villagesingewog = $this->fetchVillagesinGewog($this->gewog,$connid);
				if($villagesingewog != "")
				{
					$condition .= " AND VillageCode IN (".$villagesingewog.")";
				}
			}
			if($this->village != "")
				$condition .= " AND VillageCode='".$this->village."'";
			if($condition != "")
			{
				$condition = " WHERE ".substr($condition,4);
			}
			//echo $condition."AA<br>";
			$countquery .= $condition;
			//echo $countquery; exit;
			$dbquery = new dbquery($countquery,$connid);
			$row = $dbquery->getrowarray();
			$this->clspaging->numofrecs = $row[0];
			if($this->clspaging->numofrecs >0)
			{
				$this->clspaging->getcurrpagevardb();
			}

			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('schoolname','school')><b>School Name</b></a></b></td>";

			/*$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='schooltype' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='schooltype' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('schooltype','school')><b>School Type</b></a></b></td>";*/

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='date_of_eshtablishment' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='date_of_eshtablishment' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('date_of_eshtablishment','school')><b>Date Of<br>Establishment</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='totalboys' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='totalboys' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('totalboys','school')><b>Total Boys</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='totalgirls' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='totalgirls' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('totalgirls','school')><b>Total Girls</b></a></b></td>";

			$output_string .= "<td align='center'><b>Address</b></td><td align='center'><b>Village</b></td>";
			$output_string .= "<td align='center'><b>Gewog</b></td>";
			$output_string .= "<td align='center'><b>Phone</b></td><td align='center'><b>Email</b></td>";
			$output_string .= "<td align='center'><b>Name Of Principal</b></td><td align='center'><b>Action</b></td>";
			$output_string .= "</tr>";

			$srno=1;
			if($this->clspaging->sortby == "firstname")
				$this->clspaging->sortby = "schoolname";

			$query .= $condition." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
			//echo $query."<br><br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if($row['date_of_eshtablishment'] == "0000-00-00")
					$dose = "NA";
				else
					$dose = formatDate($row['date_of_eshtablishment']);

				$vquery = "SELECT * FROM bt_village_master WHERE VillageCode='".$row['VillageCode']."'";
				$vdbquery = new dbquery($vquery,$connid);
				$vrow = $vdbquery->getrowarray();

				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
				$output_string .= "<td>".$row['schoolname']."</td>";
				//$output_string .= "<td>".$row['schooltype']."</td>";
				$output_string .= "<td align='center' nowrap>".$dose."</td>";
				$output_string .= "<td align='center' nowrap>".$row['totalboys']."</td><td align='center' nowrap>".$row['totalgirls']."</td>";
				$output_string .= "<td>".$row['address']."</td><td>".$vrow['VillageNameEn']."</td>";
				$output_string .= "<td>".$vrow['GewogNameEn']."</td>";
				$output_string .= "<td>".$row['phone']."</td><td>".$row['email']."</td><td>".$row['principal_name']."</td>";
				$output_string .= "<td>";

				if($usertype == "Admin")
				{
					if(in_array($trn_editSchool,$userTransactionRightsArray))
			  		{
			  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editschool(".$row['schoolcode'].")'>Edit</a></td>";
			  		}
			  		else
			  		{
			  			$output_string .= "</td>";
			  		}
				}
				elseif($usertype == "School")
				{
					if($userid == $row['schoolcode'])
			  		{
			  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editschool(".$row['schoolcode'].")'>Edit</a></td>";
			  		}
			  		else
			  		{
			  			$output_string .= "</td>";
			  		}
				}

				$output_string .= "</tr>";
				$srno++;
			}
			$output_string .= "</table>";
			return  $output_string;
		}
	}

	function pageEditSchool($userid,$connid)
	{
		if($this->actiontoperform == "Edit School")
		{
			$totalstudents = $this->totalboys + $this->totalgirls;

			// Track teacher's school change history - starts here
			$query = "SELECT schoolcode,totalboys,totalgirls,totalstudents FROM school_master WHERE schoolcode='".$this->schoolcode."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();

			$old_totalboys = $row['totalboys'];
			$old_totalgirls = $row['totalgirls'];
			$old_totalstudents = $row['totalstudents'];

			$new_totalboys = $this->totalboys;
			$new_totalgirls = $this->totalgirls;
			$new_totalstudents = $totalstudents;

			if($old_totalboys != $this->totalboys || $old_totalgirls != $this->totalgirls || $old_totalstudents != $totalstudents )
			{
				$enrolmentchange_date = date("Y-m-d");
				$query  = "INSERT INTO bt_school_enrollment_history SET schoolcode=".$this->schoolcode.",";
				$query .= "old_totalboys='".$old_totalboys."', old_totalgirls='".$old_totalgirls."',old_totalstudents='".$old_totalstudents."',";
				$query .= "new_totalboys='".$new_totalboys."', new_totalgirls='".$new_totalgirls."',new_totalstudents='".$new_totalstudents."',";
				$query .= "enrolmentchange_date='".$enrolmentchange_date."'";
				//echo $query; exit;
				$dbquery = new dbquery($query,$connid);
			}
			// Track teacher's school change history - ends here

			$villagerow = $this->fetchVillageDetails($this->village,$connid);
			
			$updateQuery  = "UPDATE school_master SET ";
			$updateQuery .= "schoolname='".DoAddSlashes($this->schoolname)."',";
			$updateQuery .= "schoolcategory='".DoAddSlashes($this->schoolcategory)."',";
			$updateQuery .= "schooltype='".DoAddSlashes($this->schooltype)."',";
			$updateQuery .= "date_of_eshtablishment='".$this->dateofschooleshtablishment."',";
			$updateQuery .= "totalboys='".DoAddSlashes($this->totalboys)."',";
			$updateQuery .= "totalgirls='".DoAddSlashes($this->totalgirls)."',";
			$updateQuery .= "totalstudents='".$totalstudents."',";
			$updateQuery .= "address='".DoAddSlashes($this->address)."',";
			$updateQuery .= "VillageCode='".$this->village."',";
			$updateQuery .= "VillageNameEn='".$villagerow["VillageNameEn"]."',";
			$updateQuery .= "GewogNameEn='".$villagerow["GewogNameEn"]."',";
			$updateQuery .= "DzongkhagNameEn='".$villagerow["DzongkhagNameEn"]."',";
			$updateQuery .= "phone='".$this->phone."',";
			$updateQuery .= "email='".$this->email."',";
			$updateQuery .= "access_motor_road='".DoAddSlashes($this->access_motor_road)."',";
			$updateQuery .= "ifno_howfarinKM='".DoAddSlashes($this->ifno_hbt_queowfarinKM)."',";
			$updateQuery .= "howlongtowalk_HRSDays='".DoAddSlashes($this->howlongtowalk_HRSDays)."',";
			$updateQuery .= "kindofroad_nearest='".DoAddSlashes($this->kindofroad_nearest)."',";
			$updateQuery .= "areaofcompound_acres='".DoAddSlashes($this->areaofcompound_acres)."',";
			$updateQuery .= "isresource_center='".DoAddSlashes($this->isresource_center)."',";
			$updateQuery .= "principal_name='".DoAddSlashes($this->principalname)."'";

			$updateQuery .= " WHERE schoolcode='".$this->schoolcode."'";
			//echo $updateQuery."<br><br>"; exit;
			$dbquery = new dbquery($updateQuery,$connid);
			echo "<script>opener.location.reload(true);window.close();</script>";
			exit();
		}
		$query = "SELECT * FROM school_master WHERE schoolcode=".$this->schoolcode;
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

	function pageAddTeacher($userid,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>"; exit;
		$this->setpostvars();

		if($this->actiontoperform == "Add Teacher")
		{
			//added by sumita 20/4/2009
			 for($k=1;$k<=$this->taughtcount;$k++){
	
				$sujbectclass .=$_POST["subjectstaught".$k].":".$_POST["classestaught".$k];
				$this->classestaught.=$_POST["classestaught".$k];
				$this->subjectstaught.=$_POST["subjectstaught".$k];
				if($k<>(($this->taughtcount))){
	
					$sujbectclass .="|";
					$this->classestaught.=",";
					$this->subjectstaught.=",";
				}
			 }
			 for($k=1;$k<=$this->cantaughtcount;$k++){
	
				$cansujbectclass .=$_POST["subjectscanteach".$k].":".$_POST["classescanteach".$k];
				$this->subjectscanteach.=$_POST["subjectscanteach".$k];
				$this->classescanteach.=$_POST["classescanteach".$k];
				if($k<>(($this->cantaughtcount))){
	
					$cansujbectclass .="|";
					$this->subjectscanteach.=",";
					$this->classescanteach.=",";
				}
			 }
		//end by sumita
		
			$uploadimagename = "";
			if($_FILES['photograph']['name'] != "")
			{
				$maxQuery = "SELECT MAX(teacher_id) FROM bt_tellusaboutteacher";
				$maxdbquery = new dbquery($maxQuery,$connid);
				$maxrow = $maxdbquery->getrowarray();
				$newchildcode = $maxrow['MAX(teacher_id)'] + 1;

				$imagename = "T_".$newchildcode."_".basename($_FILES['photograph']['name']);
				$uploadfile = constant("PATH_CHILDRENPHOTOS").$imagename;
				checkfileType('photograph',1);
				if(!move_uploaded_file($_FILES['photograph']['tmp_name'], $uploadfile))
				{
					echo "Possible file upload attack...";
				}
			}

			$insertQuery  = "INSERT INTO bt_tellusaboutteacher SET ";
			$insertQuery .= "firstname='".DoAddSlashes($this->firstname)."',";
			$insertQuery .= "lastname='".DoAddSlashes($this->lastname)."',";
			$insertQuery .= "gender='".$this->gender."',";
			$insertQuery .= "date_of_birth='".$this->dob."',";
			$insertQuery .= "photograph='".DoAddSlashes($imagename)."',";
			$insertQuery .= "isphisicallychallenged='".$this->isphisicallychallenged."',";
			if($this->cid_number!='')
				$insertQuery .= "cid_number='".DoAddSlashes($this->cid_number)."',";
			$insertQuery .= "address='".DoAddSlashes($this->address)."',";
			$insertQuery .= "VillageCode='".$this->village."',";
			$insertQuery .= "phone='".$this->phone."',";
			$insertQuery .= "email='".$this->email."',";
			$insertQuery .= "schoolcode='".$this->school."',";
			$insertQuery .= "designation='".$this->designation."',";
			$insertQuery .= "status='".$this->status."',";
			$insertQuery .= "qualification_academic='".$this->qualification."',";
			$insertQuery .= "qualification_professional='".$this->qualification_pro."',";
			$insertQuery .= "secondname='".$this->secondname."',";
			
			
			if($this->dofa!='')
				$insertQuery .= "first_date_of_appointment='".$this->dofa."',";
			if($this->doca!='')
				$insertQuery .= "current_date_of_appointment='".$this->doca."',";
			if($this->dolp!='')
				$insertQuery .= "date_of_lastpromotion='".$this->dolp."',";
			if($this->remain_evaluator_times!='')
				$insertQuery .= "remain_evaluator_times='".DoAddSlashes($this->remain_evaluator_times)."',";
			$insertQuery .= "experience='".DoAddSlashes($this->experience)."',";
			//added by sumita 21-4-2009
			$insertQuery .= "subjectstaught='".DoAddSlashes($this->subjectstaught)."',";
			$insertQuery .= "classestaught='".DoAddSlashes($this->classestaught)."',";
			$insertQuery .= "subjects_classes_taught='".$sujbectclass."',";
			$insertQuery .= "subjectscanteach='".DoAddSlashes($this->subjectscanteach)."',";
			$insertQuery .= "classescanteach='".DoAddSlashes($this->classescanteach)."',";
			$insertQuery .= "subjects_classes_can_teach='".$cansujbectclass. "',";
			//end
			$insertQuery .= "mother_tongue='".DoAddSlashes($this->mother_tongue)."',";
			$insertQuery .= "nationality='".DoAddSlashes($this->nationality)."',";
			$insertQuery .= "hobby1='".DoAddSlashes($this->hobby1)."',";
			$insertQuery .= "hobby2='".DoAddSlashes($this->hobby2)."',";
			$insertQuery .= "hobby3='".DoAddSlashes($this->hobby3)."',";
			$insertQuery .= "strength1='".DoAddSlashes($this->strength1)."',";
			$insertQuery .= "strength2='".DoAddSlashes($this->strength2)."',";
			$insertQuery .= "strength3='".DoAddSlashes($this->strength3)."',";
			$insertQuery .= "weakness1='".DoAddSlashes($this->weakness1)."',";
			$insertQuery .= "weakness2='".DoAddSlashes($this->weakness2)."',";
			$insertQuery .= "weakness3='".DoAddSlashes($this->weakness3)."',";
			$insertQuery .= "responsibilities_comments='".DoAddSlashes($this->responsibilities_comments)."',";
			$insertQuery .= "approval_status='Pending',";
			$insertQuery .= "addedby='".$userid."',";
			//added by sumita 21-4-2009
			$insertQuery .= "employee_id='".$this->employeeid."',";
			$insertQuery .= "grade_pcs='".$this->grade_pcs."',";
			$insertQuery .= "maritual_status='".$this->maritual_status."'";
			//end by sumita


			//echo $insertQuery;
			$dbquery = new dbquery($insertQuery,$connid);
			$this->message = "Teacher data inserted successfully...<br>Once teacher data approved it will be online.";
		}
	}

	function pageApproveTeacher($userid,$clsuserrights,$connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Approve Teacher")
		{
			$teachercodesArray = explode(",",$this->teachercodestoapprove);
			$totalteachercodes = count($teachercodesArray);
			for($i=0; $i<$totalteachercodes; $i++)
			{
				$teachercode = substr($teachercodesArray[$i],1);
				$status = $_POST[$teachercodesArray[$i]];
				if($status != "Pending")
				{
					if($status == "Approve")
					{
						$teacher_id = $this->generateNewTeacherID($connid);
						//echo $teacher_id; exit;
						//$password = randomPasswordGenerator();

						$query = "SELECT * FROM bt_tellusaboutteacher WHERE teacher_id='".$teachercode."'";
						$dbquery = new dbquery($query,$connid);
						$row = $dbquery->getrowarray();

						$schoolname = $this->fetchSchoolName($row["schoolcode"],$connid);
						
						$insertQuery  = "INSERT INTO teacher_master SET ";
						$insertQuery .= "teacher_id='".$teacher_id."',";
						$insertQuery .= "cid_number='".$row["cid_number"]."',";
						//$insertQuery .= "password=password('".$password."'),";
						$insertQuery .= "firstname='".$row["firstname"]."',";
						$insertQuery .= "lastname='".$row["lastname"]."',";
						$insertQuery .= "gender='".$row["gender"]."',";
						$insertQuery .= "date_of_birth='".$row["date_of_birth"]."',";
						$insertQuery .= "photograph='".$row["photograph"]."',";
						$insertQuery .= "isphisicallychallenged='".$row["isphisicallychallenged"]."',";
						$insertQuery .= "address='".$row["address"]."',";
						$insertQuery .= "VillageCode='".$row["VillageCode"]."',";
						$insertQuery .= "phone='".$row["phone"]."',";
						$insertQuery .= "email='".$row["email"]."',";
						$insertQuery .= "schoolcode='".$row["schoolcode"]."',";
						$insertQuery .= "schoolname='".$schoolname."',";
						$insertQuery .= "designation='".$row['designation']."',";
						$insertQuery .= "status='".$row['status']."',";
						$insertQuery .= "qualification_academic='".$row['qualification_academic']."',";
						$insertQuery .= "qualification_professional='".$row['qualification_professional']."',";
						$insertQuery .= "secondname='".$row['secondname']."',";
						$insertQuery .= "first_date_of_appointment='".$row['first_date_of_appointment']."',";
						$insertQuery .= "current_date_of_appointment='".$row['current_date_of_appointment']."',";
						$insertQuery .= "date_of_lastpromotion='".$row['date_of_lastpromotion']."',";
						$insertQuery .= "remain_evaluator_times='".$row['remain_evaluator_times']."',";
						$insertQuery .= "experience='".$row['experience']."',";
						//added by sumita 21-4-2009
						$insertQuery .= "subjectstaught='".$row['subjectstaught']."',";
						$insertQuery .= "classestaught='".$row['classestaught']."',";
						$insertQuery .= "subjects_classes_taught='".$row['subjects_classes_taught']."',";
						$insertQuery .= "subjectscanteach='".$row['subjectscanteach']."',";
						$insertQuery .= "classescanteach='".$row['classescanteach']."',";
						$insertQuery .= "subjects_classes_can_teach='".$row['subjects_classes_can_teach']."',";
						//end
						$insertQuery .= "mother_tongue='".$row["mother_tongue"]."',";
						$insertQuery .= "nationality='".$row["nationality"]."',";
						$insertQuery .= "hobby1='".$row["hobby1"]."',";
						$insertQuery .= "hobby2='".$row["hobby2"]."',";
						$insertQuery .= "hobby3='".$row["hobby3"]."',";
						$insertQuery .= "strength1='".$row["strength1"]."',";
						$insertQuery .= "strength2='".$row["strength2"]."',";
						$insertQuery .= "strength3='".$row["strength3"]."',";
						$insertQuery .= "weakness1='".$row["weakness1"]."',";
						$insertQuery .= "weakness2='".$row["weakness2"]."',";
						$insertQuery .= "weakness3='".$row["weakness3"]."',";
						$insertQuery .= "responsibilities_comments='".$row['responsibilities_comments']."',";
						$insertQuery .= "addedby='".$row["addedby"]."',";
						$insertQuery .= "employee_id='".$row["employee_id"]."',";
						$insertQuery .= "grade_pcs='".$row["grade_pcs"]."',";
						$insertQuery .= "maritual_status='".$row["maritual_status"]."'";

						//echo $insertQuery."<br><br>";
						$dbquery = new dbquery($insertQuery,$connid);

						$updateQuery = "UPDATE bt_tellusaboutteacher SET approval_status='Approved' WHERE teacher_id='".$teachercode."'";
						//echo $updateQuery."<br><br>";
						$dbquery = new dbquery($updateQuery,$connid);

						//$this->assignRightsToChild($cts_number,$clsuserrights,$connid);
						//$this->sendUserActivationMail($row['email'],$row['firstname'],$cts_number,$password);
					}
					elseif($status == "Reject")
					{
						//echo $childcode."--".$status."<br>";
						$updateQuery = "UPDATE bt_tellusaboutteacher SET approval_status='".$status."' WHERE teacher_id='".$teachercode."'";
						$dbquery = new dbquery($updateQuery,$connid);
						//echo $updateQuery."<br><br>";
					}
				}
			}
		}

		$output_string  = "<table style='border-collapse: collapse' align='left'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td bgcolor='#FFC0CB'><b>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td><td align='left'><b>Duplicate Teacher - Teacher might exist in master list. View it by clicking link on First Name.</b></td></tr>";
		$output_string .= "</table><br>";

		$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td align='center' colspan='22'><b><font color='#FFFFFF'>Approve Teacher</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>Status</b></td><td align='center'><b>Photograph</b></td>";
		$output_string .= "<td align='center'><b>Citizenship ID</b></td>";
		$output_string .= "<td align='center'><b>First Name</b></td><td align='center'><b>Last Name</b></td>";
		$output_string .= "<td align='center'><b>Gender</b></td><td align='center'><b>DOB</b></td>";
		$output_string .= "<td align='center'><b>Is Physically<br>Challenged?</b></td>";
		$output_string .= "<td align='center'><b>Address</b></td><td align='center'><b>Village</b></td>";
		$output_string .= "<td align='center'><b>Gewog</b></td><td align='center'><b>School</b></td>";
		$output_string .= "<td align='center'><b>Mother Tongue</b></td><td align='center'><b>Nationality</b></td>";
		$output_string .= "<td align='center'><b>Phone</b></td><td align='center'><b>Email</b></td>";
		$output_string .= "</tr>";


		$srno=1;
		$query = "SELECT * FROM bt_tellusaboutteacher WHERE approval_status='Pending'";
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		$totalteachers = $dbquery->numrows();
		$teachercodestring = "";
		while($row = $dbquery->getrowarray())
		{
			$teachercodestring .= "T".$row['teacher_id'].",";
			$statuscombo  = "<select name='T".$row['teacher_id']."'>";
			$statuscombo .= "<option value='Pending'>Pending</option>";
			$statuscombo .= "<option value='Approve'>Approve</option>";
			$statuscombo .= "<option value='Reject'>Reject</option>";
			$statuscombo .= "</select>";

			if($row['gender'] == "M") $gender = "Male";
			else $gender = "Female";

			if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
			else $ipc = "No";

			if($row['date_of_birth'] == "0000-00-00")
				$dob = "NA";
			else
				$dob = formatDate($row['date_of_birth']);

			$villagename = "";
			$gewogname = "";
			if($row['VillageCode'] != "")
			{
				$vquery = "SELECT * FROM bt_village_master WHERE VillageCode=".$row['VillageCode'];
				$vdbquery = new dbquery($vquery,$connid);
				$vrow = $vdbquery->getrowarray();
				$villagename=$vrow['VillageNameEn'];
				$gewogname=$vrow['GewogNameEn'];
			}

			$scquery = "SELECT * FROM school_master WHERE schoolcode=".$row['schoolcode'];
			$scdbquery = new dbquery($scquery,$connid);
			$scrow = $scdbquery->getrowarray();

			$dupQuery = "SELECT COUNT(*) FROM teacher_master";
			$condition = " WHERE firstname like '%".$row['firstname']."%' AND lastname like '%".$row['lastname']."%' AND date_of_birth='".$row['date_of_birth']."'";
			$dupQuery .= $condition;
			$dupdbquery = new dbquery($dupQuery,$connid);
			$duprow = $dupdbquery->getrowarray();

			if($duprow[0] > 0)
				$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#FFC0CB'><td align='center'>".$srno."</td>";
			else
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";

			$output_string .= "<td align='center'>".$statuscombo."</td>";
			if($row['photograph'] != "")
				$output_string .= "<td align='center'><img src='".constant("PATH_CHILDRENPHOTOS").$row['photograph']."' width='70' height='75'></td>";
			else
				$output_string .= "<td align='center'>NA</td>";
				
			if($row['cid_number']!=0)
				$output_string .= "<td>".$row['cid_number']."</td>";
			else 
				$output_string .= "<td>&nbsp;</td>";
				
			if($duprow[0] > 0)
			{
				$queryString = "firstname=".$row['firstname']."&lastname=".$row['lastname']."&dob=".$row['date_of_birth'];
				//$output_string .= "<td><a href='bt_showDuplicateChild.php?".$queryString."'>".$row['firstname']."</a></td>";
				$output_string .= "<td><a href='javascript: showDuplicateTeacher(\"".$queryString."\")'>".$row['firstname']."</a></td>";
			}
			else
				$output_string .= "<td>".$row['firstname']."</td>";

			$output_string .= "<td>".$row['lastname']."</td>";
			$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
			$output_string .= "<td align='center'>".$ipc."</td>";
			$output_string .= "<td nowrap>".$row['address']."</td><td>".$villagename."</td>";
			$output_string .= "<td>".$gewogname."</td><td nowrap>".substr($scrow['schoolname'],0,25)."</td>";
			$output_string .= "<td>".$row['mother_tongue']."</td><td>".$row['nationality']."</td>";
			$output_string .= "<td>".$row['phone']."</td><td nowrap>".$row['email']."</td>";
			$output_string .= "</tr>";
			$srno++;
		}

		if($totalteachers == 0)
		{
			$output_string .= "<tr><td align='center' colspan='20'><font color='#FF0000'><b>No teacher data to approve...</b></font></td></tr>";
		}
		else
		{
			$output_string .= "<tr><td align='center' colspan='20'><input type='button' value='Change Status' name='Change Status' onclick='approveteacher()'></td></tr>";
		}
		//$output_string .= "</table>";

		if($teachercodestring != "")
			$teachercodestring = substr($teachercodestring, 0, -1);
		$output_string .= "</table>";
		$output_string .= "<input type='hidden' name='teachercodestoapprove' value='".$teachercodestring."'>";
		return  $output_string;
	}

	function pageFetchTeacherDetails($userid,$tablename,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();

		$query = "SELECT * FROM ".$tablename;
		$condition = " WHERE firstname like '%".$this->firstname."%' AND lastname like '%".$this->lastname."%' AND date_of_birth='".formatDate($this->dob)."'";
		$query .= $condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

	function pageEditTeacher($userid,$connid)
	{
		if($this->actiontoperform == "Edit Teacher")
		{
			 //added by sumita 20/4/2009
			 for($k=1;$k<=$this->taughtcount;$k++){
	
				$sujbectclass .=$_POST["subjectstaught".$k].":".$_POST["classestaught".$k];
				$this->classestaught.=$_POST["classestaught".$k];
				$this->subjectstaught.=$_POST["subjectstaught".$k];
				if($k<>(($this->taughtcount))){
	
					$sujbectclass .="|";
					$this->classestaught.=",";
					$this->subjectstaught.=",";
				}
			 }
			 for($k=1;$k<=$this->cantaughtcount;$k++){
	
				$cansujbectclass .=$_POST["subjectscanteach".$k].":".$_POST["classescanteach".$k];
				$this->subjectscanteach.=$_POST["subjectscanteach".$k];
				$this->classescanteach.=$_POST["classescanteach".$k];
				if($k<>(($this->cantaughtcount))){
	
					$cansujbectclass .="|";
					$this->subjectscanteach.=",";
					$this->classescanteach.=",";
				}
			 }
			//end by sumita

			$uploadimagename = "";
			if($_FILES['photograph']['name'] != "")
			{
				$query = "SELECT photograph FROM student_master WHERE cts_number='".$this->cts_number."'";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				$old_imagename = constant("PATH_CHILDRENPHOTOS").$row['photograph'];
				if($old_imagename != "")
				{
					unlink($old_imagename);  // Remove old photo
				}

				$imagename = $this->cts_number."_".basename($_FILES['photograph']['name']);
				$uploadfile = constant("PATH_CHILDRENPHOTOS").$imagename;
				if(!move_uploaded_file($_FILES['photograph']['tmp_name'], $uploadfile))
				{
					echo "Possible file upload attack...";
				}
			}

			// Track teacher's school change history - starts here
			$query = "SELECT firstname,lastname,schoolcode FROM teacher_master WHERE teacher_id='".$this->teacher_id."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$old_schoolcode = $row['schoolcode'];
			$name = ucfirst($row['firstname'])." ".ucfirst($row['lastname']);
			$new_schoolcode = $this->school;
			$new_schoolname = $this->fetchSchoolName($new_schoolcode,$connid);
			if(($old_schoolcode != "") && ($old_schoolcode != $new_schoolcode))
			{
				$schoolchanged_date = date("Y-m-d");
				$query  = "INSERT INTO bt_teacher_schoolchange_history SET teacher_id=".$this->teacher_id.",";
				$query .= "old_schoolcode=".$old_schoolcode.", new_schoolcode=".$new_schoolcode.",schoolchange_date='".$schoolchanged_date."'";
				//echo $query; exit;
				$dbquery = new dbquery($query,$connid);
			}
			// Track teacher's school change history - ends here

			$updateQuery  = "UPDATE teacher_master SET ";
			$updateQuery .= "firstname='".DoAddSlashes($this->firstname)."',";
			$updateQuery .= "lastname='".DoAddSlashes($this->lastname)."',";
			$updateQuery .= "gender='".$this->gender."',";
			$updateQuery .= "date_of_birth='".$this->dob."',";
			if(basename($_FILES['photograph']['name']!=""))
				$updateQuery .= ",photograph='".DoAddSlashes($imagename)."'";
			$updateQuery .= "cid_number='".$this->cid_number."',";
			$updateQuery .= "isphisicallychallenged='".$this->isphisicallychallenged."',";
			$updateQuery .= "address='".DoAddSlashes($this->address)."',";
			$updateQuery .= "VillageCode='".$this->village."',";
			$updateQuery .= "phone='".$this->phone."',";
			$updateQuery .= "email='".$this->email."',";
			$updateQuery .= "schoolcode='".$this->school."',";
			$updateQuery .= "schoolname='".$new_schoolname."',";
			$updateQuery .= "designation='".$this->designation."',";
			//add by sumita 20/4/2009
			$updateQuery .= "classestaught='".$this->classestaught."',";
			$updateQuery .= "subjectstaught='".$this->subjectstaught."',";
			$updateQuery .= "subjects_classes_taught='".$sujbectclass."',";
			$updateQuery .= "classescanteach='".$this->classescanteach."',";
			$updateQuery .= "subjectscanteach='".$this->subjectscanteach."',";
			$updateQuery .= "subjects_classes_can_teach='".$cansujbectclass."',";
			$updateQuery .= "employee_id='".$this->employeeid."',";
			$updateQuery .= "grade_pcs='".$this->grade_pcs."',";
			$updateQuery .= "maritual_status='".$this->maritual_status."',";
			//end
			$updateQuery .= "status='".$this->status."',";
			$updateQuery .= "qualification_academic='".$this->qualification."',";
			$updateQuery .= "qualification_professional='".$this->qualification_pro."',";
			$updateQuery .= "secondname='".$this->secondname."',";
			
			
			if($this->dofa!='')
				$updateQuery .= "first_date_of_appointment='".$this->dofa."',";
			if($this->doca!='')
				$updateQuery .= "current_date_of_appointment='".$this->doca."',";
			if($this->dolp!='')	
				$updateQuery .= "date_of_lastpromotion='".$this->dolp."',";
			$updateQuery .= "remain_evaluator_times='".DoAddSlashes($this->remain_evaluator_times)."',";
			$updateQuery .= "experience='".DoAddSlashes($this->experience)."',";
			$updateQuery .= "mother_tongue='".DoAddSlashes($this->mother_tongue)."',";
			$updateQuery .= "nationality='".DoAddSlashes($this->nationality)."',";
			$updateQuery .= "hobby1='".DoAddSlashes($this->hobby1)."',";
			$updateQuery .= "hobby2='".DoAddSlashes($this->hobby2)."',";
			$updateQuery .= "hobby3='".DoAddSlashes($this->hobby3)."',";
			$updateQuery .= "strength1='".DoAddSlashes($this->strength1)."',";
			$updateQuery .= "strength2='".DoAddSlashes($this->strength2)."',";
			$updateQuery .= "strength3='".DoAddSlashes($this->strength3)."',";
			$updateQuery .= "weakness1='".DoAddSlashes($this->weakness1)."',";
			$updateQuery .= "weakness2='".DoAddSlashes($this->weakness2)."',";
			$updateQuery .= "weakness3='".DoAddSlashes($this->weakness3)."',";
			$updateQuery .= "responsibilities_comments='".DoAddSlashes($this->responsibilities_comments)."'";
			$updateQuery .= " WHERE teacher_id='".$this->teacher_id."'";
			//echo $updateQuery."<br><br>"; exit;
			$dbquery = new dbquery($updateQuery,$connid);
			echo "<script>opener.location.reload(true);window.close();</script>";
			exit();
		}
		$query = "SELECT * FROM teacher_master WHERE teacher_id=".$this->teacher_id;
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

	function pageDeleteTeacher($userid,$connid)
	{
		$this->setgetvars();
		if($this->actiontoperform == "Delete Teacher")
		{
			$updateQuery = "UPDATE teacher_master SET deletedby='".$userid."' WHERE teacher_id=".$this->teacher_id;
			$dbquery = new dbquery($updateQuery,$connid);
			//echo $updateQuery."<br>";

			$insQuery = "INSERT INTO teacher_master_deleted (SELECT * FROM teacher_master WHERE teacher_id=".$this->teacher_id.")";
			$dbquery = new dbquery($insQuery,$connid);
			//echo $insQuery."<br>";

			$delQuery = "DELETE FROM teacher_master WHERE teacher_id=".$this->teacher_id;
			$dbquery = new dbquery($delQuery,$connid);
			//echo $delQuery."<br>";

			echo "<table align='center' bordercolor='#333333' style='border-collapse: collapse'>
				 <tr bordercolor='#FFFFFF'><td align='center' colspan='2'><b>Teacher deleted successfully...</b></td></tr>
				 <tr bordercolor='#FFFFFF'><td align='center' colspan='2'><a href='javascript:opener.location.reload(true);window.close()'><b>Close Window</b></a></td></tr>
				 </table>";
			//<tr bordercolor='#FFFFFF'><td align='center' colspan='2'><a href='javascript:opener.history.go(0);window.close()'><b>Close Window</b></a></td></tr>
			/*echo "<script>opener.history.go(0);window.close();</script>";*/
			exit();
		}
	}

	function pageFindTeacher($userid,$usertype,$trn_editTeacher,$userTransactionRightsArray,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>"; //exit;
		$this->setpostvars();
		$this->clspaging->setpostvars();
		if($this->actiontoperform == "Find Teacher")
		{
			$countquery = "SELECT COUNT(*) FROM teacher_master";
			$query = "SELECT * FROM teacher_master";
			$condition = "";

			if($this->firstname != "")
				$condition .= " AND firstname like '%".DoAddSlashes($this->firstname)."%'";
			if($this->lastname != "")
				$condition .= " AND lastname like '%".DoAddSlashes($this->lastname)."%'";
			if($this->dob != "")
				$condition .= " AND date_of_birth='".$this->dob."'";
			if($this->status != "")
				$condition .= " AND status like '%".$this->status."%'";
			if($this->email != "")
				$condition .= " AND email='".$this->email."'";
			if($this->dzongkhag != "" && $this->gewog == "")
			{
				$villagesingewog = $this->fetchVillagesinGewog($this->dzongkhag,$connid);
				if($villagesingewog != "")
				{
					$condition .= " AND VillageCode IN (".$villagesingewog.")";
				}
			}
			if($this->gewog != "" && $this->village == "")
			{
				$villagesingewog = $this->fetchVillagesinGewog($this->gewog,$connid);
				if($villagesingewog != "")
				{
					$condition .= " AND VillageCode IN (".$villagesingewog.")";
				}
			}
			if($this->village != "")
				$condition .= " AND VillageCode='".$this->village."'";
			if($this->school != "")
				$condition .= " AND schoolcode='".$this->school."'";
			if($condition != "")
			{
				$condition = " WHERE ".substr($condition,4);
			}
			//echo $condition."AA<br>";
			$countquery .= $condition;
			//echo $countquery;
			$dbquery = new dbquery($countquery,$connid);
			$row = $dbquery->getrowarray();
			$this->clspaging->numofrecs = $row[0];
			if($this->clspaging->numofrecs >0)
			{
				$this->clspaging->getcurrpagevardb();
			}

			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('firstname','teacher')><b>Firstname</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('lastname','teacher')><b>lastname</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('gender','teacher')><b>gender</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('date_of_birth','teacher')><b>DOB</b></a></b></td>";

			$output_string .= "<td align='center'><b>Village</b></td>";
			$output_string .= "<td align='center'><b>Gewog</b></td><td align='center'><b>School</b></td>";
			$output_string .= "<td align='center'><b>Qualification</b></td><td align='center'><b>Designation</b></td>";
			$output_string .= "<td align='center'><b>Action</b></td>";
			$output_string .= "</tr>";

			$srno=1;
			$query .= $condition." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
			//echo $query."<br><br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if($row['gender'] == "M") $gender = "Male";
				else $gender = "Female";

				if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
				else $ipc = "No";

				if($row['date_of_birth'] == "0000-00-00")
					$dob = "NA";
				else
					$dob = formatDate($row['date_of_birth']);

				$villagename = "";
				$gewogname = "";
				if($row['VillageCode'] != "")
				{
					$vquery = "SELECT * FROM bt_village_master WHERE VillageCode=".$row['VillageCode'];
					$vdbquery = new dbquery($vquery,$connid);
					$vrow = $vdbquery->getrowarray();
					$villagename=$vrow['VillageNameEn'];
					$gewogname=$vrow['GewogNameEn'];
				}
				/*$vquery = "SELECT * FROM bt_village_master WHERE VillageCode='".$row['VillageCode']."'";
				$vdbquery = new dbquery($vquery,$connid);
				$vrow = $vdbquery->getrowarray();*/

				$scquery = "SELECT * FROM school_master WHERE schoolcode='".$row['schoolcode']."'";
				$scdbquery = new dbquery($scquery,$connid);
				$scrow = $scdbquery->getrowarray();

				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
				$output_string .= "<td>".$row['firstname']."</td><td>".$row['lastname']."</td>";
				$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
				$output_string .= "<td>".$villagename."</td>";
				$output_string .= "<td>".$gewogname."</td><td nowrap>".substr($scrow['schoolname'],0,25)."</td>";
				$output_string .= "<td align='center'>".$row['qualification']."</td><td align='center'>".$row['designation']."</td>";
				$output_string .= "<td><a href='javascript: viewteacher(\"".$row['teacher_id']."\")'>View</a>";

				if($usertype == "Admin")
				{
					if(in_array($trn_editTeacher,$userTransactionRightsArray))
			  		{
			  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editteacher(".$row['teacher_id'].")'>Edit</a></td>";
			  		}
			  		else
			  		{
			  			$output_string .= "</td>";
			  		}
				}
				elseif($usertype == "School")
				{
					if($userid == $row['schoolcode'])
			  		{
			  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editteacher(".$row['teacher_id'].")'>Edit</a></td>";
			  		}
			  		else
			  		{
			  			$output_string .= "</td>";
			  		}
				}

				$output_string .= "</tr>";
				$srno++;
			}
			$output_string .= "</table>";
			return  $output_string;
		}
	}

	function pageViewTeacher($userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->actiontoperform == "View Teacher")
		{
			$query = "SELECT * FROM teacher_master WHERE teacher_id='".$this->teacher_id."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			return $row;
		}
	}

	function pageAddChild($userid,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>";
		$this->setpostvars();
		if($this->actiontoperform == "Add Child")
		{
			$uploadimagename = "";
			if($_FILES['photograph']['name'] != "")
			{
				$maxQuery = "SELECT MAX(childcode) FROM bt_tellusaboutchild";
				$maxdbquery = new dbquery($maxQuery,$connid);
				$maxrow = $maxdbquery->getrowarray();
				$newchildcode = $maxrow['MAX(childcode)'] + 1;

				$imagename = $newchildcode."_".basename($_FILES['photograph']['name']);
				$uploadfile = constant("PATH_CHILDRENPHOTOS").$imagename;
				checkfileType('photograph',1);
				if(!move_uploaded_file($_FILES['photograph']['tmp_name'], $uploadfile))
				{
					echo "Possible file upload attack...";
				}
			}

			$insertQuery  = "INSERT INTO bt_tellusaboutchild SET ";
			$insertQuery .= "firstname='".DoAddSlashes($this->firstname)."',";
			$insertQuery .= "secondname='".DoAddSlashes($this->secondname )."',";
			$insertQuery .= "lastname='".DoAddSlashes($this->lastname)."',";
			$insertQuery .= "guardian_firstname='".DoAddSlashes($this->fathername)."',";
			$insertQuery .= "guardian_secondname='".DoAddSlashes($this->guardian_secondname)."',";
			$insertQuery .= "guardian_lastname='".DoAddSlashes($this->mothername)."',";
			$insertQuery .= "gender='".$this->gender."',";
			$insertQuery .= "date_of_birth='".$this->dob."',";
			$insertQuery .= "phone='".$this->phone."',";
			$insertQuery .= "email='".$this->email."',";
			$insertQuery .= "isphisicallychallenged='".$this->isphisicallychallenged."',";
			$insertQuery .= "occupation_of_guardian='".DoAddSlashes($this->occupation_of_father)."',";
			$insertQuery .= "relation_with_guardian='".DoAddSlashes($this->occupation_of_mother)."',";
			$insertQuery .= "guardian_incomelevel='".DoAddSlashes($this->incomelevel_guardian)."',";
			if($this->cid_number!='')
				$insertQuery .= "cid_number='".DoAddSlashes($this->cid_number)."',";
			$insertQuery .= "address='".DoAddSlashes($this->address)."',";
			$insertQuery .= "VillageCode='".$this->village."',";
			$insertQuery .= "schoolcode='".$this->school."',";
			$insertQuery .= "class='".$this->class."',";
			$insertQuery .= "section='".$this->section."',";
			$insertQuery .= "mother_tongue='".DoAddSlashes($this->mother_tongue)."',";
			$insertQuery .= "nationality='".DoAddSlashes($this->nationality)."',";
			$insertQuery .= "boader='".DoAddSlashes($this->boader)."',";
			$insertQuery .= "repeater='".DoAddSlashes($this->repeater)."',";
			$insertQuery .= "wfp='".DoAddSlashes($this->wfp)."',";
			$insertQuery .= "new_enrollment='".DoAddSlashes($this->new_enrollment)."',";
			$insertQuery .= "rejoin='".DoAddSlashes($this->rejoin)."',";
			$insertQuery .= "isdaycareattended='".DoAddSlashes($this->daycare_stat)."',";
			$insertQuery .= "daycareyears='".DoAddSlashes($this->daycare_years)."',";
						
			$insertQuery .= "hobby1='".DoAddSlashes($this->hobby1)."',";
			$insertQuery .= "hobby2='".DoAddSlashes($this->hobby2)."',";
			$insertQuery .= "hobby3='".DoAddSlashes($this->hobby3)."',";
			$insertQuery .= "strength1='".DoAddSlashes($this->strength1)."',";
			$insertQuery .= "strength2='".DoAddSlashes($this->strength2)."',";
			$insertQuery .= "strength3='".DoAddSlashes($this->strength3)."',";
			$insertQuery .= "weakness1='".DoAddSlashes($this->weakness1)."',";
			$insertQuery .= "weakness2='".DoAddSlashes($this->weakness2)."',";
			$insertQuery .= "weakness3='".DoAddSlashes($this->weakness3)."',";
			$insertQuery .= "otheractivities_comments='".DoAddSlashes($this->otheractivities_comments)."',";
			$insertQuery .= "photograph='".DoAddSlashes($imagename)."',";
			$insertQuery .= "status='Pending',";
			$insertQuery .= "addedby='".$userid."'";

			/*echo $insertQuery."<br>";
			exit;*/
			$dbquery = new dbquery($insertQuery,$connid);
			$this->message = "Child data inserted successfully...<br>Once child data approved it will be online.";
		}
	}

	function sendUserActivationMail($email,$firstname,$cts_number,$password)
	{
		$headers = "From: <system@ei-india.com>\r\n";
		$headers .= "Reply-To: <arpit.metaliya@ei-india.com>\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$subject = "Login Information For Bhutan SATS";
		$message = "Dear ".ucfirst($firstname).",<br><br>Your Login ID/SATS Number for BHUTAN SATS is <b>".$cts_number."</b> ";
		$message .= "and password is <b>".$password."</b>.<br>Kindly log in and change your password ASAP.";
		$message .= "<br><br>-- Bhutan SATS";
		//echo $message;
		if($email != "")
			send_mail($email,$subject,$message,$headers);
	}

	function assignRightsToChild($cts_number,$clsuserrights,$connid)
	{
		$query = "INSERT INTO `bt_userrights` (`userid`, `transaction_id`) VALUES ('".$cts_number."', '".$clsuserrights->trn_editChild."'), ('".$cts_number."', '".$clsuserrights->trn_changepassword."'), ('".$cts_number."', '".$clsuserrights->trn_schoolavgandstddev."'), ('".$cts_number."', '".$clsuserrights->trn_findChild."'), ('".$cts_number."', '".$clsuserrights->trn_findTeacher."')";
		//echo $query;
		$dbquery = new dbquery($query,$connid);

	}

	function pageApproveChild($userid,$clsuserrights,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>"; //exit;
		$this->setpostvars();
		if($this->actiontoperform == "Approve Child")
		{
			$childcodesArray = explode(",",$this->childcodestoapprove);
			$totalchildcodes = count($childcodesArray);
			//echo $totalchildcodes; exit;
			for($i=0; $i<$totalchildcodes; $i++)
			{
				$childcode = substr($childcodesArray[$i],1);
				$status = $_POST[$childcodesArray[$i]];
				if($status != "Pending")
				{
					if($status == "Approve")
					{
						$cts_number = $this->generateNewCTSNumber($connid);
						$password = randomPasswordGenerator();

						$query = "SELECT * FROM bt_tellusaboutchild WHERE childcode='".$childcode."'";
						$dbquery = new dbquery($query,$connid);
						$row = $dbquery->getrowarray();

						$schoolname = $this->fetchSchoolName($row["schoolcode"],$connid);
						$villagerow = $this->fetchVillageDetails($row["VillageCode"],$connid);

						$insertQuery  = "INSERT INTO student_master SET ";
						$insertQuery .= "cts_number='".$cts_number."',";
						$insertQuery .= "cid_number='".$row["cid_number"]."',";
						$insertQuery .= "password=password('".$password."'),";
						$insertQuery .= "password_text='".$password."',";
						$insertQuery .= "firstname='".$row["firstname"]."',";
						$insertQuery .= "secondname='".$row["secondname"]."',";
						$insertQuery .= "lastname='".$row["lastname"]."',";
						$insertQuery .= "guardian_firstname='".$row["guardian_firstname"]."',";
						$insertQuery .= "guardian_secondname='".$row["guardian_secondname"]."',";
						$insertQuery .= "guardian_lastname='".$row["guardian_lastname"]."',";
						$insertQuery .= "gender='".$row["gender"]."',";
						$insertQuery .= "date_of_birth='".$row["date_of_birth"]."',";
						$insertQuery .= "phone='".$row["phone"]."',";
						$insertQuery .= "email='".$row["email"]."',";
						$insertQuery .= "isphisicallychallenged='".$row["isphisicallychallenged"]."',";
						$insertQuery .= "occupation_of_guardian='".$row["occupation_of_guardian"]."',";
						$insertQuery .= "relation_with_guardian='".$row["relation_with_guardian"]."',";
						$insertQuery .= "address='".$row["address"]."',";
						$insertQuery .= "VillageCode='".$row["VillageCode"]."',"; 
						$insertQuery .= "guardian_present_VillageNameEn='".$villagerow["VillageNameEn"]."',";
						$insertQuery .= "guardian_present_GewogNameEn='".$villagerow["GewogNameEn"]."',";
						$insertQuery .= "guardian_present_DzongkhagNameEn='".$villagerow["DzongkhagNameEn"]."',"; 
						$insertQuery .= "guardian_incomelevel='".$row["guardian_incomelevel"]."',"; 
						$insertQuery .= "schoolcode='".$row["schoolcode"]."',";
						$insertQuery .= "schoolname='".$schoolname."',";
						$insertQuery .= "class='".$row["class"]."',";
						$insertQuery .= "section='".$row["section"]."',";
						$insertQuery .= "mother_tongue='".$row["mother_tongue"]."',";
						$insertQuery .= "nationality='".$row["nationality"]."',";
						$insertQuery .= "boader='".$row['boader']."',";
						$insertQuery .= "repeater='".$row['repeater']."',";
						$insertQuery .= "wfp='".$row['wfp']."',";
						$insertQuery .= "new_enrollment='".$row['new_enrollment']."',";
						$insertQuery .= "rejoin='".$row['rejoin']."',";
						$insertQuery .= "hobby1='".$row["hobby1"]."',";
						$insertQuery .= "hobby2='".$row["hobby2"]."',";
						$insertQuery .= "hobby3='".$row["hobby3"]."',";
						$insertQuery .= "strength1='".$row["strength1"]."',";
						$insertQuery .= "strength2='".$row["strength2"]."',";
						$insertQuery .= "strength3='".$row["strength3"]."',";
						$insertQuery .= "weakness1='".$row["weakness1"]."',";
						$insertQuery .= "weakness2='".$row["weakness2"]."',";
						$insertQuery .= "weakness3='".$row["weakness3"]."',";
						$insertQuery .= "photograph='".$row["photograph"]."',";
						$insertQuery .= "otheractivities_comments='".$row['otheractivities_comments']."',";
						$insertQuery .= "addedby='".$row["addedby"]."', ";
						$insertQuery .= "isdaycareattended='".$row["isdaycareattended"]."', ";
						$insertQuery .= "daycareyears='".$row["daycareyears"]."'";

						$insertQuery."<br><br>";
						
						$dbquery = new dbquery($insertQuery,$connid);
						//exit;
						$updateQuery = "UPDATE bt_tellusaboutchild SET status='Approved' WHERE childcode='".$childcode."'";
						//echo $updateQuery."<br><br>";
						$dbquery = new dbquery($updateQuery,$connid);

						$this->assignRightsToChild($cts_number,$clsuserrights,$connid);
						$this->sendUserActivationMail($row['email'],$row['firstname'],$cts_number,$password);
					}
					elseif($status == "Reject")
					{
						//echo $childcode."--".$status."<br>";
						$updateQuery = "UPDATE bt_tellusaboutchild SET status='".$status."' WHERE childcode='".$childcode."'";
						$dbquery = new dbquery($updateQuery,$connid);
						//echo $updateQuery."<br><br>";
					}
				}
			}
		}

		$output_string  = "<table style='border-collapse: collapse' align='left'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td bgcolor='#FFC0CB'><b>&nbsp;&nbsp;&nbsp;</td><td>&nbsp;</td><td align='left'><b>Duplicate Child - Child might exist in master list. View it by clicking link on First Name.</b></td></tr>";
		$output_string .= "</table><br>";

		$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td align='center' colspan='24'><b><font color='#FFFFFF'>Approve Child</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>Status</b></td><td align='center'><b>Photograph</b></td>";
		$output_string .= "<td align='center'><b>Citizenship ID</b></td>";
		$output_string .= "<td align='center'><b>First Name</b></td><td align='center'><b>Second Name</b></td><td align='center'><b>Last Name</b></td>";
		$output_string .= "<td align='center'><b>Gender</b></td><td align='center'><b>DOB</b></td>";
		$output_string .= "<td align='center'><b>Is Physically<br>Challenged?</b></td>";
		$output_string .= "<td align='center'><b>Guardian's<br>First Name</b></td>";
		$output_string .= "<td align='center'><b>Guardian's<br>Second Name</b></td>";
		$output_string .= "<td align='center'><b>Guardian's<br>Last Name</b></td>";
		$output_string .= "<td align='center'><b>Guardian's<br>Occupation</b></td>";
		$output_string .= "<td align='center'><b>Address</b></td><td align='center'><b>Village</b></td>";
		$output_string .= "<td align='center'><b>Gewog</b></td><td align='center'><b>School</b></td>";
		$output_string .= "<td align='center'><b>Class</b></td><td align='center'><b>Section</b></td>";
		$output_string .= "<td align='center'><b>Mother Tongue</b></td><td align='center'><b>Nationality</b></td>";
		$output_string .= "<td align='center'><b>Phone</b></td><td align='center'><b>Email</b></td>";
		$output_string .= "</tr>";


		$srno=1;
		$query = "SELECT * FROM bt_tellusaboutchild WHERE status='Pending'";
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		$totalchildren = $dbquery->numrows();
		$childcodestring = "";
		while($row = $dbquery->getrowarray())
		{
			$childcodestring .= "C".$row['childcode'].",";
			$statuscombo  = "<select name='C".$row['childcode']."'>";
			$statuscombo .= "<option value='Pending'>Pending</option>";
			$statuscombo .= "<option value='Approve'>Approve</option>";
			$statuscombo .= "<option value='Reject'>Reject</option>";
			$statuscombo .= "</select>";

			if($row['gender'] == "B") $gender = "Boy";
			else $gender = "Girl";

			if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
			else $ipc = "No";

			if($row['date_of_birth'] == "0000-00-00")
				$dob = "NA";
			else
				$dob = formatDate($row['date_of_birth']);

			$vquery = "SELECT * FROM bt_village_master WHERE VillageCode=".$row['VillageCode'];
			$vdbquery = new dbquery($vquery,$connid);
			$vrow = $vdbquery->getrowarray();

			$scquery = "SELECT * FROM school_master WHERE schoolcode=".$row['schoolcode'];
			$scdbquery = new dbquery($scquery,$connid);
			$scrow = $scdbquery->getrowarray();

			$dupQuery = "SELECT COUNT(*) FROM student_master";
			//$condition = " WHERE firstname like '%".$row['firstname']."%' AND lastname like '%".$row['lastname']."%' AND date_of_birth='".$row['date_of_birth']."'";
			$condition = " WHERE firstname like '%".$row['firstname']."%' AND lastname like '%".$row['lastname']."%' AND schoolcode='".$row['schoolcode']."' AND class='".$row['class']."'";
			$dupQuery .= $condition;
			//echo $dupQuery."<br>";
			$dupdbquery = new dbquery($dupQuery,$connid);
			$duprow = $dupdbquery->getrowarray();

			if($duprow[0] > 0)
				$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#FFC0CB'><td align='center'>".$srno."</td>";
			else
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";

			$output_string .= "<td align='center'>".$statuscombo."</td>";
			if($row['photograph'] != "")
				$output_string .= "<td align='center'><img src='".constant("PATH_CHILDRENPHOTOS").$row['photograph']."' width='70' height='75'></td>";
			else
				$output_string .= "<td align='center'>NA</td>";
			
			if($row['cid_number']!=0)
				$output_string .= "<td>".$row['cid_number']."</td>";
			else 
				$output_string .= "<td>&nbsp;</td>";
			
			if($duprow[0] > 0)
			{
				$queryString = "firstname=".$row['firstname']."&lastname=".$row['lastname']."&schoolcode=".$row['schoolcode']."&childclass=".$row['class'];
				//$output_string .= "<td><a href='bt_showDuplicateChild.php?".$queryString."'>".$row['firstname']."</a></td>";
				$output_string .= "<td><a href='javascript: showDuplicateChild(\"".$queryString."\")'>".$row['firstname']."</a></td>";
			}
			else
				$output_string .= "<td>".$row['firstname']."</td>";

			$output_string .= "<td>".$row['secondname']."</td>";
			$output_string .= "<td>".$row['lastname']."</td>";
			$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
			$output_string .= "<td align='center'>".$ipc."</td>";
			$output_string .= "<td>".$row['guardian_firstname']."</td>";
			$output_string .= "<td>".$row['guardian_secondname']."</td>";
			$output_string .= "<td>".$row['guardian_firstname']."</td>";
			$output_string .= "<td>".$row['occupation_of_guardian']."</td>";
			$output_string .= "<td nowrap>".$row['address']."</td><td>".$vrow['VillageNameEn']."</td>";
			$output_string .= "<td>".$vrow['GewogNameEn']."</td><td nowrap>".substr($scrow['schoolname'],0,25)."</td>";
			$output_string .= "<td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
			$output_string .= "<td>".$row['mother_tongue']."</td><td>".$this->nationalityType[$row['nationality']]."</td>";
			$output_string .= "<td>".$row['phone']."</td><td nowrap>".$row['email']."</td>";
			$output_string .= "</tr>";
			$srno++;
		}

		if($totalchildren == 0)
		{
			$output_string .= "<tr><td align='center' colspan='22'><font color='#FF0000'><b>No child data to approve...</b></font></td></tr>";
		}
		else
		{
			$output_string .= "<tr><td align='center' colspan='22'><input type='button' value='Change Status' name='Change Status' onclick='approvechild()'></td></tr>";
		}
		//$output_string .= "</table>";

		if($childcodestring != "")
			$childcodestring = substr($childcodestring, 0, -1);
		$output_string .= "</table>";
		$output_string .= "<input type='hidden' name='childcodestoapprove' value='".$childcodestring."'>";
		return  $output_string;
	}

	function pageFetchChildDetails($userid,$tablename,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();

		$query = "SELECT * FROM ".$tablename;
		$condition = " WHERE firstname like '%".$this->firstname."%' AND lastname like '%".$this->lastname."%' AND schoolcode='".$this->schoolcode."' AND class='".$this->class."'";
		$query .= $condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

	function pageLearningImprovementTracking($username,$usertype,$clsschoolresult,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$output_string  = "";
		
		/*echo "<pre>";
		print_r ($_POST);
		echo "</pre>";*/
		
		$schoolcode_string = "";
		
		if($this->actiontoperform == "Learning Improvement Tracking")
		{
			$colorarray = array("F6BD0F","8BBA00","AFD8F8","FF8E46","008E8E","D64646","8E468E","A186BE");
			$colorindex = 0;
					
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr></table>";
		
			$schoolcode_string = $this->queryResult_SchoolCodeString($username,$usertype,$connid);
			//echo $schoolcode_string."<br>";
			if($schoolcode_string != "")
			{
				if($this->adqno==1)
				{
					$nationalperf = array();
					for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$ti];
						$tablename = "studentwise".$test_edition;
						if($schoolcode_string != "")
						{
							$subcode = strtolower(substr($this->subject,0,1));
							for($cl=0; $cl<count($clsschoolresult->testclass_array); $cl++)
							{
								$class = $clsschoolresult->testclass_array[$cl];
								$condition = " AND class='".$class."'";
								
								$eavg = 0.0; $mavg=0.0; $savg=0.0;
								$resquery = "SELECT avg(".$subcode.") AS AVGSUB FROM ".$tablename." WHERE !isnull(".$subcode.")".$condition;
								//echo $resquery."<br>";
								$resdb = new dbquery($resquery,$connid);
								$resrow = $resdb->getrowarray();
								$subavg = number_format($resrow['AVGSUB'],1);
								$nationalperf[$test_edition][$class] = $subavg;
							}
						}
					}
					/*echo "<pre>";
					print_r ($nationalperf);
					echo "</pre>";*/
					
					$performancediff = array();
					$regionperf = array();
					for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$ti];
						$tablename = "studentwise".$test_edition;
						if($schoolcode_string != "")
						{
							$subcode = strtolower(substr($this->subject,0,1));
							for($cl=0; $cl<count($clsschoolresult->testclass_array); $cl++)
							{
								$class = $clsschoolresult->testclass_array[$cl];
								$condition = " AND class='".$class."' AND school_code IN (".$schoolcode_string.")";
								
								$eavg = 0.0; $mavg=0.0; $savg=0.0;
								$resquery = "SELECT count(*) AS N, avg(".$subcode.") AS AVGSUB FROM ".$tablename." WHERE !isnull(".$subcode.")".$condition;
								//echo $resquery."<br>";
								$resdb = new dbquery($resquery,$connid);
								$resrow = $resdb->getrowarray();
								$subavg = number_format($resrow['AVGSUB'],1);
								$regionperf[$test_edition][$class] = $subavg;
								
								
								//$performancediff[$test_edition][$class] = round($subavg-$nationalperf[$test_edition][$class],1);
								//echo $subavg." - ".$nationalperf[$test_edition][$class]." - ".$performancediff[$test_edition][$class]."<br>";
								
								if($resrow['N']==0)
									$performancediff[$test_edition][$class] = 0.0;
								else 
								{
									$innvalue = (($subavg*100)/$nationalperf[$test_edition][$class])-100;
									$performancediff[$test_edition][$class] = round($innvalue,1);
								}
								//echo $subavg." - ".$nationalperf[$test_edition][$class]." - ".$performancediff[$test_edition][$class]."<br>";
							}
						}
					}
					
					/*echo "<pre>";
					print_r ($regionperf);
					echo "</pre>";
					
					echo "<pre>";
					print_r ($performancediff);
					echo "</pre>";*/
					
					$xmlfilename = "fusioncharts/MSBar3D1ASSL.xml";
					$xmldata  = "<chart palette='2' caption='".$this->subject." Performance Compare to National Average (Figures in %)' showLabels='1' showvalues='0' decimals='1' numberPrefix=''>";
					$xmldata .= "<categories>";
					for($cl=0; $cl<count($clsschoolresult->testclass_array); $cl++)
					{
						$class = $clsschoolresult->testclass_array[$cl];
						$xmldata .= "<category label='Class ".$class."' />";
					}
					$xmldata .= "</categories>";
						
					for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$ti];
						$round = $clsschoolresult->test_edition_names_array[$test_edition];
						$xmldata .= "<dataset seriesName='".$round."' color='".$colorarray[$colorindex]."' showValues='0'>";
						$colorindex++;
						for($cl=0; $cl<count($clsschoolresult->testclass_array); $cl++)
						{
							$class = $clsschoolresult->testclass_array[$cl];
							$xmldata .= "<set value='".$performancediff[$test_edition][$class]."' />";
						}
						$xmldata .= "</dataset>";
						
					}
					$xmldata .= "</chart>";
					$fp = fopen($xmlfilename,"w");
					fwrite($fp,$xmldata);
					fclose($fp);
					$this->xmlfilestatus = 1;
				}
				else if($this->adqno==2)
				{
					$nationalperf = array();
					for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$ti];
						$tablename = "studentwise".$test_edition;
						if($schoolcode_string != "")
						{
							if($this->class!="") 
								$condition = " AND class='".$this->class."'";
							
							$eavg = 0.0; $mavg=0.0; $savg=0.0;
							$resquery = "SELECT avg(e) AS AVGE FROM ".$tablename." WHERE !isnull(e)".$condition;
							//echo $resquery."<br>";
							$resdb = new dbquery($resquery,$connid);
							$resrow = $resdb->getrowarray();
							$eavg = number_format($resrow['AVGE'],1);
							
							$resquery = "SELECT avg(m) AS AVGM FROM ".$tablename." WHERE !isnull(m)".$condition;
							$resdb = new dbquery($resquery,$connid);
							$resrow = $resdb->getrowarray();
							$mavg = number_format($resrow['AVGM'],1);
							
							$resquery = "SELECT avg(s) AS AVGS FROM ".$tablename." WHERE !isnull(s)".$condition;
							$resdb = new dbquery($resquery,$connid);
							$resrow = $resdb->getrowarray();
							$savg = number_format($resrow['AVGS'],1);
							
							$dzavg = ($eavg+$mavg+$savg)/3;
							$nationalperf[$test_edition] = $dzavg;
							
						}
					}
					/*echo "<pre>";
					print_r ($nationalperf);
					echo "</pre>";*/
					
					$dzogkhagnames = array();
					$dzongkhagwiseperf = array();
					$dzquery = "SELECT * FROM bt_dzongkhag_master";
					$dzresult = mysql_query($dzquery) OR die("DZQuery: ".mysql_error());
					while($dzrow = mysql_fetch_array($dzresult))
					{
						$schoolcode_string = "";
						$dzogkhagnames[$dzrow['DzongkhagCode']] = substr($dzrow['DzongkhagNameEn'],0,10);
						
						$scquery = "SELECT schoolcode FROM school_master WHERE DzongkhagCode='".$dzrow['DzongkhagCode']."'";
						$scdbquery = new dbquery($scquery,$connid);
						while($scrow = $scdbquery->getrowarray())
						{
							$schoolcode_string .= $scrow['schoolcode'].",";
						}
						$schoolcode_string = substr($schoolcode_string,0,-1);
			
						
						for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
						{
							$test_edition = $clsschoolresult->test_edition_array[$ti];
							$tablename = "studentwise".$test_edition;
							if($schoolcode_string != "")
							{
								$condition = " WHERE school_code IN (".$schoolcode_string.")";
								if($this->class!="") 
									$condition .= " AND class='".$this->class."'";
								
								$eavg = 0.0; $mavg=0.0; $savg=0.0;
								$resquery = "SELECT avg(e) AS AVGE FROM ".$tablename.$condition." AND !isnull(e)";
								//echo $resquery."<br>";
								$resdb = new dbquery($resquery,$connid);
								$resrow = $resdb->getrowarray();
								$eavg = number_format($resrow['AVGE'],1);
								
								$resquery = "SELECT avg(m) AS AVGM FROM ".$tablename.$condition." AND !isnull(m)";
								$resdb = new dbquery($resquery,$connid);
								$resrow = $resdb->getrowarray();
								$mavg = number_format($resrow['AVGM'],1);
								
								$resquery = "SELECT avg(s) AS AVGS FROM ".$tablename.$condition." AND !isnull(s)";
								$resdb = new dbquery($resquery,$connid);
								$resrow = $resdb->getrowarray();
								$savg = number_format($resrow['AVGS'],1);
								
								$dzavg = ($eavg+$mavg+$savg)/3;
								$dzongkhagwiseperf[$test_edition][$dzrow['DzongkhagCode']] = round($dzavg-$nationalperf[$test_edition],1);
								
							}
						}
					}

					
					for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$ti];
						$round = $clsschoolresult->test_edition_names_array[$test_edition];
						arsort($dzongkhagwiseperf[$test_edition]);
						$xmlfilename = "fusioncharts/Col3D5ASSL_".$test_edition.".xml";
						$xmldata = "<chart caption='Composite Performance ".$round."' subCaption='' yAxisName='' xAxisName='Dzongkhag' palette='2' animation='1' showValues='0' formatNumberScale='1' numberSuffix='' labelDisplay='ROTATE' numDivLines='6' slantLabels='1'><styles><definition><style type='font' name='CaptionFont' size='15' color='666666' /><style type='font' name='SubCaptionFont' bold='0' /></definition><application><apply toObject='caption' styles='CaptionFont' /><apply toObject='SubCaption' styles='SubCaptionFont' /></application></styles>";
						
						foreach ($dzongkhagwiseperf[$test_edition] as $key => $value)
						{
							$xmldata .= "<set label='".$dzogkhagnames[$key]."' value='".$value."' />";
						}
						$xmldata .= "</chart>";
						$fp = fopen($xmlfilename,"w");
						fwrite($fp,$xmldata);
						fclose($fp);
						$this->xmlfilestatus = 1;
					}
					
					/*echo "<pre>";
					print_r ($dzongkhagwiseperf);
					echo "</pre>";*/
				}
				else if($this->adqno==3)
				{
					$this->setpostvars();
			    	$this->setgetvars();
			    	
					$skill_names = array();
					$skillwise_totalquestions = array();
					$number_of_skills = array();
					$clsschoolresult->set_skill_names(&$skill_names, &$skillwise_totalquestions, &$number_of_skills, $connid);
			
					$actualclass = $this->class;
					$subject = strtolower(substr($this->subject,0,1));
					$subjectno=0;
					if($subject=="e")
						$subjectno=1;
					elseif($subject=="m")
						$subjectno=2;
					elseif($subject=="s")
						$subjectno=3;
			
					$roundwise_skillwise_data = array();
					$skillwise_roundwise_avgs = array();
	
					for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$i];
						$current_papercode = $subjectno.$actualclass.$test_edition;
						//echo $current_papercode."<br>";
						$totalSkillsInPaper = $number_of_skills[$current_papercode];
						//echo $totalSkillsInPaper."<br>";
						for($sk=1; $sk<=$totalSkillsInPaper; $sk++)
						{
							$skillfield = "AvgS".$sk;
							$skQuery = "SELECT avg(".$skillfield.") as AVG_SCORE FROM schoolwise_classwise_skillwise_performance WHERE schoolcode IN (".$schoolcode_string.") AND subjectno=".$subjectno." AND class='".$actualclass."' AND test_edition='".$test_edition."' AND ".$skillfield." != ''";
							//echo $skQuery."<br>"; //exit;
							$skdbquery = new dbquery($skQuery,$connid);
							$skRow = $skdbquery->getrowarray();
	
							$roundwise_skillwise_data[$sk][$test_edition] = $skRow['AVG_SCORE'];
							$skillwise_roundwise_avgs[$test_edition][$sk] = $skRow['AVG_SCORE'];
						}
					}
	
					/*echo "<pre>";
					print_r ($number_of_skills);
					echo "</pre>";*/
					
					$xmldata  = "<chart caption='Skill Wise Performance In ".ucfirst($this->subject)."' subCaption='' numdivlines='9' lineThickness='2' showValues='0' numVDivLines='22' formatNumberScale='1' labelDisplay='' slantLabels='1' anchorRadius='3' anchorBgAlpha='50' showAlternateVGridColor='1' anchorAlpha='100' animation='1' limitsDecimalPrecision='0' divLineDecimalPrecision='1'>";
					$xmldata .= "<categories >";
		
					for($te=0; $te<$clsschoolresult->total_test_editions; $te++)
	 				{
	 					$round = $clsschoolresult->test_edition_names_array[$clsschoolresult->test_edition_array[$te]];
	 					$xmldata .= "<category label='".$round."' />";
	 				}
	 				$xmldata .= "</categories >";
	 				
	 				//echo "A:: ".$totalSkillsInPaper;
	 				
					for($sk=1; $sk<=$totalSkillsInPaper; $sk++)
					{
						for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
						{
							$test_edition = $clsschoolresult->test_edition_array[$i];
							
							$papercode = $subjectno.$actualclass.$test_edition;
							if($i==$clsschoolresult->total_test_editions-1)
								$xmldata .= "<dataset seriesName='".$skill_names[$papercode][$sk]."' color='".$colorarray[$colorindex]."' anchorBorderColor='".$colorarray[$colorindex]."' >";
						}
			
						for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
						{
							$test_edition = $clsschoolresult->test_edition_array[$i];
							$avg_skill = 0.00;
							
							if(isset($roundwise_skillwise_data[$sk][$test_edition]))
								$avg_skill = Donumber_format($roundwise_skillwise_data[$sk][$test_edition],1);
							$xmldata .= "<set value='".$avg_skill."' />";
						}
						$xmldata .= "</dataset>";
						$colorindex++;
					}
					$xmldata .= "</chart>";
					
					$xmlfilename = "fusioncharts/SkillPerformanceInSubject.xml";
					$fp = fopen($xmlfilename,"w");
					fwrite($fp,$xmldata);
					fclose($fp);
					$this->xmlfilestatus = 1;
					
					// Strong & Weak skills -Starts Here
					$this->stwk_string = "<table border=1 style='border-collapse: collapse' align='center'>";
					for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$i];
						$round = $clsschoolresult->test_edition_names_array[$test_edition];
						$papercode = $subjectno.$actualclass.$test_edition;
						$skillperround = count($skillwise_roundwise_avgs[$test_edition]);
						
						asort($skillwise_roundwise_avgs[$test_edition]);
						$cntr=1;
						$this->stwk_string .= "<tr><td colspan='2'><b>Two weak skills in ASSL ".$round."</b></td></tr>";
						foreach ($skillwise_roundwise_avgs[$test_edition] as $key => $value) 
						{
							$this->stwk_string .= "<tr><td align='center'>".$cntr."</td><td>".$skill_names[$papercode][$key]."</td></tr>";
							$cntr++;
							if($cntr==3)
								break;
						}
						$this->stwk_string .= "<tr><td align='center' colspan='7'></td></tr>";
						
						arsort($skillwise_roundwise_avgs[$test_edition]);
						$cntr=1;
						$this->stwk_string .= "<tr><td colspan='2'><b>Two strong skills in ASSL ".$round."</b></td></tr>";
						foreach ($skillwise_roundwise_avgs[$test_edition] as $key => $value) 
						{
							$this->stwk_string .= "<tr><td align='center'>".$cntr."</td><td>".$skill_names[$papercode][$key]."</td></tr>";
							$cntr++;
							if($cntr==3)
								break;
						}
						if($i!=($clsschoolresult->total_test_editions-1))
							$this->stwk_string .= "<tr><td align='center' colspan='7'>&nbsp;</td></tr>";
					}
					$this->stwk_string .= "</table>";
					// Strong & Weak skills -Etarts Here
				}
				else if($this->adqno==4)
				{
					$regionname = $this->fetchRegionName($connid);
					//echo $this->adqno." - ".$regionname;
					$nationalPerformace = $clsschoolresult->pageNationalResultSummary_XML("",$connid);
					$regionPerformace   = $clsschoolresult->pageNationalResultSummary_XML($schoolcode_string,$connid);
					
					/*echo "<pre>";
					print_r ($nationalPerformace);
					print_r ($regionPerformace);
					echo "</pre>";*/
					
					for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$i];
						$round = $clsschoolresult->test_edition_names_array[$test_edition];
						$xmlfilename = "fusioncharts/MSCol3D3ASSL_".$test_edition.".xml";
						$xmldata = "<chart palette='5' caption='Overall Performance ".$round."' xAxisName='' yAxisName='Performance (%)' numberPrefix=''  rotateValues='1' placeValuesInside='1' forceYAxisValueDecimals='0'  yAxisValueDecimals='1'>";
						
						$xmldata .= "<categories>";
						$query = "SELECT * FROM paper_details WHERE test_edition='".$test_edition."' ORDER BY subjectno,class";
						$result = mysql_query($query) OR die(mysql_error());
						while($line = mysql_fetch_array($result))
						{
							$subject = "";
							if($line['subjectno']==1)
								$subject = "English";
							else if($line['subjectno']==2)
								$subject = "Maths";
							else if($line['subjectno']==3)
								$subject = "Science";
								
							$xmldata .= "<category label='".$subject." ".$line['class']."' />";
						}
						$xmldata .= "</categories>";
						
						$xmldata .= "<dataset seriesname='National' color='F0807F' showValues='1'>";
						mysql_data_seek($result,0);
						while($line = mysql_fetch_array($result))
						{
							$xmldata .= "<set value='".$nationalPerformace[$line['papercode']]."' />";
						}
						$xmldata .= "</dataset>";
						
						$xmldata .= "<dataset seriesname='".$regionname."' color='F1C7D2' showValues='1'>";
						mysql_data_seek($result,0);
						while($line = mysql_fetch_array($result))
						{
							$xmldata .= "<set value='".$regionPerformace[$line['papercode']]."' />";
						}
						$xmldata .= "</dataset>";
						$xmldata .= "</chart>";
						
						$fp = fopen($xmlfilename,"w");
						fwrite($fp,$xmldata);
						fclose($fp);
					}
					$this->xmlfilestatus = 1;
				}
				else if($this->adqno==5)
				{
					$this->setpostvars();
			    	$this->setgetvars();
			    	
			    	//echo $this->adqno." - ".$schoolcode_string."<br>";
			    	
			    	$colorarray = array("0000FF","FF0000","8BBA00","9966CC","000000");
					$colorindex = 0;
			
			    	$benchmarkdata = array();
			    	for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
					{
						$test_edition = $clsschoolresult->test_edition_array[$i];
						$round = $clsschoolresult->test_edition_names_array[$test_edition];
						
						$subjectno = 0;
						$class = $this->class;
				    	if($this->subject=="English")
				    		$subjectno = 1;
				    	else if($this->subject=="Maths")
				    		$subjectno = 2;
				    	else if($this->subject=="Science")
				    		$subjectno = 3;

				    	if($this->class!="" && $subjectno!=0)
							$query = "SELECT * FROM paper_details WHERE test_edition='".$test_edition."' AND subjectno=".$subjectno." AND class=".$class." ORDER BY subjectno,class";
						else 
							$query = "SELECT * FROM paper_details WHERE test_edition='".$test_edition."' ORDER BY subjectno,class";
						$result = mysql_query($query) OR die(mysql_error());
						while($line = mysql_fetch_array($result))
						{
							$totalstudents=0;
							$papercode = $line['papercode'];
						
							if($this->dzongkhag!="")
								$dzquery = "SELECT DzongkhagNameEn FROM bt_dzongkhag_master WHERE DzongkhagCode='".$this->dzongkhag."' ORDER BY DzongkhagNameEn";	
							else 
								$dzquery = "SELECT DzongkhagNameEn FROM bt_dzongkhag_master ORDER BY DzongkhagNameEn";
								
							$dzresult = mysql_query($dzquery) OR die(mysql_error());
							while($dzrow=mysql_fetch_array($dzresult))
							{
								$belowlow = 0;
								$dzongkhag = $dzrow["DzongkhagNameEn"];
								$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND DzongkhagNameEn='".$dzongkhag."'";
								//echo $query1; exit;
								$result1 = mysql_query($query1) OR die("1: ".mysql_error());
								$row1=mysql_fetch_array($result1);
								$totalstudents = $row1[0];
					
								$perstu=0.0;
								$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND round(percentile*100,1)>=88.0 AND DzongkhagNameEn='".$dzongkhag."'";
								//echo $query1; exit;
								$result1 = mysql_query($query1) OR die("1: ".mysql_error());
								$row1=mysql_fetch_array($result1);
								$perstu = round(($row1[0]*100)/$totalstudents,1);
								$benchmarkdata[$papercode]['AB'][$dzongkhag] = $perstu;
								$belowlow += $perstu;
								
								$perstu=0.0;
								$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=73.0 AND round(percentile*100,1)<88.0) AND DzongkhagNameEn='".$dzongkhag."'";
								//echo $query1; exit;
								$result1 = mysql_query($query1) OR die("1: ".mysql_error());
								$row1=mysql_fetch_array($result1);
								$perstu = round(($row1[0]*100)/$totalstudents,1);
								$benchmarkdata[$papercode]['HB'][$dzongkhag] = $perstu;
								$belowlow += $perstu;
								
								$perstu=0.0;
								$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=48.0 AND round(percentile*100,1)<73.0) AND DzongkhagNameEn='".$dzongkhag."'";
								//echo $query1; exit;
								$result1 = mysql_query($query1) OR die("1: ".mysql_error());
								$row1=mysql_fetch_array($result1);
								$perstu = round(($row1[0]*100)/$totalstudents,1);
								$benchmarkdata[$papercode]['IB'][$dzongkhag] = $perstu;
								$belowlow += $perstu;
								
								$perstu=0.0;
								$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=23.0 AND round(percentile*100,1)<48.0) AND DzongkhagNameEn='".$dzongkhag."'";
								//echo $query1; exit;
								$result1 = mysql_query($query1) OR die("1: ".mysql_error());
								$row1=mysql_fetch_array($result1);
								$perstu = round(($row1[0]*100)/$totalstudents,1);
								$benchmarkdata[$papercode]['LB'][$dzongkhag] = $perstu;
								$belowlow += $perstu;
								
								$benchmarkdata[$papercode]['BB'][$dzongkhag] = 100-$belowlow;
								//echo $belowlow." - ".$benchmarkdata[$papercode]['BB'][$dzongkhag]." - ".$belowlow+$benchmarkdata[$papercode]['BB'][$dzongkhag]."<br>";
							}
							
							$belowlow = 0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."'";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$totalstudents = $row1[0];
					
							$perstu=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND round(percentile*100,1)>=88.0";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$benchmarkdata[$papercode]['AB']["National"] = $perstu;
							$belowlow += $perstu;
							
							$perstu=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=73.0 AND round(percentile*100,1)<88.0)";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$benchmarkdata[$papercode]['HB']["National"] = $perstu;
							$belowlow += $perstu;
							
							$perstu=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=48.0 AND round(percentile*100,1)<73.0)";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$benchmarkdata[$papercode]['IB']["National"] = $perstu;
							$belowlow += $perstu;
							
							$perstu=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=23.0 AND round(percentile*100,1)<48.0)";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$benchmarkdata[$papercode]['LB']["National"] = $perstu;
							$belowlow += $perstu;
							
							$benchmarkdata[$papercode]['BB']["National"] = 100-$belowlow;
						}
					}
					
					/*echo "<pre>";
					print_r ($benchmarkdata['14V']['AB']);
					asort($benchmarkdata['14V']['AB']);
					print_r ($benchmarkdata['14V']['AB']);
			    	echo "</pre>";*/
					
			    	
					if($this->dzongkhag=="")
					{
						$subjectno = 0;
						$class = $this->class;
				    	if($this->subject=="English")
				    		$subjectno = 1;
				    	else if($this->subject=="Maths")
				    		$subjectno = 2;
				    	else if($this->subject=="Science")
				    		$subjectno = 3;
				    	
				    	for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
						{
							$colorindex=0;
							$test_edition = $clsschoolresult->test_edition_array[$i];
							$round = $clsschoolresult->test_edition_names_array[$test_edition];
							$papercode = $subjectno.$class.$test_edition;
							
							asort($benchmarkdata[$papercode]['BB']);
							
							$xmldata  = "<chart palette='2' caption='Knowledge and Ability Benchmarks for Class ".$class." ".$this->subject." (".$round.")' showLabels='1' showvalues='0'  numberPrefix='' showSum='0' decimals='1' useRoundEdges='1' legendBorderAlpha='0'>";
							$xmldata .= "<categories>";
							foreach ($benchmarkdata[$papercode]['BB'] AS $key_dzo => $value_dzo)
							{
								$xmldata .= "<category label='".$key_dzo."' />";
							}
							$xmldata .= "</categories>";
							
							$categoryarray = array('AB','HB','IB','LB','BB');
							$categoryarray_names = array('Advanced Benchmark','High Benchmark','Intermediate Benchmark','Low Benchmark','Below Low Benchmark');
							
							for($ci=0; $ci<count($categoryarray); $ci++)
							{
								$category = $categoryarray[$ci];
								$xmldata .= "<dataset seriesName='".$categoryarray_names[$ci]."' color='".$colorarray[$colorindex]."' showValues='0'>\r\n";
								$colorindex++;
								foreach ($benchmarkdata[$papercode]['BB'] AS $key_dzo => $value_dzo)
								{
									$xmldata .= "<set value='".$benchmarkdata[$papercode][$category][$key_dzo]."' />";
								}
								$xmldata .= "</dataset>";
							}
							
							$xmldata .= "</chart>";
							
							$xmlfilename = "fusioncharts/StBar3D1ASSL_".$test_edition.".xml";
							$fp = fopen($xmlfilename,"w");
							fwrite($fp,$xmldata);
							fclose($fp);
						}
						$this->xmlfilestatus = 1;
					}
					else 
					{
						$dzongkhag = $this->fetchRegionName($connid);
						for($i=0; $i<$clsschoolresult->total_test_editions; $i++)
						{
							$test_edition = $clsschoolresult->test_edition_array[$i];
							$round = $clsschoolresult->test_edition_names_array[$test_edition];
							$xmldata  = "<chart palette='2' caption='Knowledge and Ability Benchmarks for ".$dzongkhag." (".$round.")' showLabels='1' showvalues='0'  numberPrefix='' showSum='0' decimals='1' useRoundEdges='1' legendBorderAlpha='0'>";
							$xmldata .= "<categories>";
							for($si=0; $si<$clsschoolresult->total_subjects; $si++)
							{
						    	for($ci=0; $ci<$clsschoolresult->totaltest_classes; $ci++)
								{
									$class = $clsschoolresult->testclass_array[$ci];
									$xmldata .= "<category label='".$clsschoolresult->subject_array[$si]." ".$class."' />";
								}
							}
							$xmldata .= "</categories>";
							
							$colorindex=0;
							$categoryarray = array('AB','HB','IB','LB','BB');
							$categoryarray_names = array('Advanced Benchmark','High Benchmark','Intermediate Benchmark','Low Benchmark','Below Low Benchmark');
							
							for($ct=0; $ct<count($categoryarray); $ct++)
							{
								$category = $categoryarray[$ct];
								$xmldata .= "<dataset seriesName='".$categoryarray_names[$ct]."' color='".$colorarray[$colorindex]."' showValues='0'>\r\n";
								$colorindex++;
								for($si=0; $si<$clsschoolresult->total_subjects; $si++)
								{
							    	$subjectno = 0;
							    	if($clsschoolresult->subject_array[$si]=="English")
							    		$subjectno = 1;
							    	else if($clsschoolresult->subject_array[$si]=="Maths")
							    		$subjectno = 2;
							    	else if($clsschoolresult->subject_array[$si]=="Science")
							    		$subjectno = 3;
						    		
									for($ci=0; $ci<$clsschoolresult->totaltest_classes; $ci++)
									{
										$class = $clsschoolresult->testclass_array[$ci];
										$papercode = $subjectno.$class.$test_edition;
										$xmldata .= "<set value='".$benchmarkdata[$papercode][$category][$dzongkhag]."' />";
									}
								}
								$xmldata .= "</dataset>";
							}
							
							$xmldata .= "</chart>";
							
							$xmlfilename = "fusioncharts/StBar3D1ASSL_".$test_edition.".xml";
							$fp = fopen($xmlfilename,"w");
							fwrite($fp,$xmldata);
							fclose($fp);
						}
						$this->xmlfilestatus = 1;
					}
				}
			}
		}
		return $output_string;
	}
	
	function pageQueryInterface($username,$usertype,$trn_editChild,$trn_editTeacher,$trn_editSchool,$userTransactionRightsArray,$clsschoolresult,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		//print_r ($_POST);
		$this->clspaging->setpostvars();
		$output_string = "";
		$schoolcode_string = "";
		//echo "User Name: ".$username." - ".$usertype."<br>";
		if($this->actiontoperform == "Query Data")
		{
			$schoolcode_string = $this->queryResult_SchoolCodeString($username,$usertype,$connid);
			//echo "School Code String: ".$schoolcode_string."<br>";
			if($schoolcode_string == "")
			{
				$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr></table>";
			}
			else
			{
				$this->schoollist_array = $this->prepareSchoolList($connid);
				$this->villagelistwithgewog_array = $this->prepareVillageWithGewogList($connid);
				if ($this->queryselected == "LOST")
				{
					$output_string = $this->queryResult_LOST($username,$usertype,$trn_editChild,$userTransactionRightsArray,$schoolcode_string,$clsschoolresult,$connid);
				}
				elseif ($this->queryselected == "LOTC")
				{
					$output_string = $this->queryResult_LOTC($username,$usertype,$trn_editTeacher,$userTransactionRightsArray,$schoolcode_string,$connid);
				}
				elseif ($this->queryselected == "LOSC")
				{
					$output_string = $this->queryResult_LOSC($username,$usertype,$trn_editSchool,$userTransactionRightsArray,$schoolcode_string,$connid);
				}
			}

		}
		return $output_string;
	}

	function fetchRegionName($connid)
	{
		$regionname = "";
		if($this->school != "")
		{
			$query = "SELECT schoolname FROM school_master WHERE schoolcode=".$this->school;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$regionname = $row['schoolname'];
		}
		else if ($this->village != "")
		{
			$query = "SELECT VillageNameEn FROM bt_village_master WHERE VillageCode=".$this->village;
			echo $query;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$regionname = $row['VillageNameEn'];
		}
		else if ($this->gewog != "")
		{
			$query = "SELECT GewogNameEn FROM bt_gewog_master WHERE GewogCode=".$this->gewog;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$regionname = $row['GewogNameEn'];
		}
		else if ($this->dzongkhag != "")
		{
			$query = "SELECT DzongkhagNameEn FROM bt_dzongkhag_master WHERE DzongkhagCode=".$this->dzongkhag;
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$regionname = $row['DzongkhagNameEn'];
		}
		return $regionname;
	}
	
	function queryResult_SchoolCodeString($username,$usertype,$connid)
	{
		$schoolcode_string = "";
		if($this->school != "" || $usertype == "School")
		{
			if($this->school != "")
				$schoolcode_string = $this->school;
			elseif($_SESSION["usertype"] == "School")
			{
				$this->school = $username;
				$schoolcode_string = $this->school;
			}
		}
		elseif ($this->village != "")
		{
			$schoolcode_string = $this->fetchSchoolsInVillage($this->village,"V",$connid);
		}
		elseif ($this->gewog != "")
		{
			$villagecodes = $this->fetchVillagesInGewog($this->gewog,$connid);
			$schoolcode_string = $this->fetchSchoolsInVillage($villagecodes,"G",$connid);
		}
		elseif ($this->dzongkhag != "")
		{
			$villagecodes = $this->fetchVillagesInDzongkhag($this->dzongkhag,$connid);
			$schoolcode_string = $this->fetchSchoolsInVillage($villagecodes,"D",$connid);
		}
		else
		{
			$villagecodes = $this->fetchAllVillages($connid);
			$schoolcode_string = $this->fetchSchoolsInVillage($villagecodes,"A",$connid);
		}
		return $schoolcode_string;
	}

	function fetchSchoolsInVillage($villagecodes,$region,$connid)
	{
		$schoolcodes = "";
		if($region == "V" || $region == "G")
		{
			$query = "SELECT schoolcode FROM school_master WHERE VillageCode IN (".$villagecodes.")";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$schoolcodes .= $row['schoolcode'].",";
			}
		}
		elseif($region == "D")
		{
			$query = "SELECT schoolcode FROM school_master WHERE DzongkhagCode='".$this->dzongkhag."'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$schoolcodes .= $row['schoolcode'].",";
			}
		}
		elseif ($region == "A")
		{
			$query = "SELECT schoolcode FROM school_master";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$schoolcodes .= $row['schoolcode'].",";
			}
		}
		//echo "AA".$query;
		$schoolcodes = substr($schoolcodes, 0, -1);
		return $schoolcodes;
	}

	function queryResult_LOST($username,$usertype,$trn_editChild,$userTransactionRightsArray,$schoolcode_string,$clsschoolresult,$connid)
	{
		$countquery = "SELECT COUNT(*) FROM student_master";
		$query = "SELECT * FROM student_master";
		$condition = "";

		if($this->studentname != "")
		{
			$condition .= " AND (firstname like '%".DoAddSlashes($this->studentname)."%'";
			$condition .= " OR lastname like '%".DoAddSlashes($this->studentname)."%')";
		}

		if($this->class != "")
			$condition .= " AND class='".$this->class."'";
		if($this->st_gender != "")
			$condition .= " AND gender='".$this->st_gender."'";
		if($this->st_agecondition != "")
		{
			$today = date("Y-m-d");
			$condition .= " AND ((DATEDIFF('".$today."',date_of_birth)/365) ".$this->st_agecondition." ".$this->st_agevalue.")";
		}
		
		if($this->st_searchtext != "")
		{
			$condition .= " AND (hobby1 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR hobby2 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR hobby3 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR strength1 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR strength2 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR strength3 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR weakness1 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR weakness2 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR weakness3 like '%".DoAddSlashes($this->st_searchtext)."%'";
			$condition .= " OR otheractivities_comments like '%".DoAddSlashes($this->st_searchtext)."%')";

		}
		
		
		$condition .= " AND schoolcode IN (".$schoolcode_string.")";
		if($condition != "")
		{
			$condition = " WHERE ".substr($condition,4);
		}

		if($this->cts_number != "" && $this->cid_number != "")
		{
			$condition = " WHERE cts_number=".$this->cts_number." AND cid_number=".$this->cid_number;
		}
		if($this->cts_number != "" && $this->cid_number == "")
		{
			$condition = " WHERE cts_number=".$this->cts_number;
		}
		if($this->cts_number == "" && $this->cid_number != "")
		{
			$condition = " WHERE cid_number=".$this->cid_number;
		}
		//echo $this->cts_number." - ".$this->cid_number."<br>";
		//echo $condition."AA<br>";
		$countquery .= $condition;
		//echo $countquery; //exit;
		$dbquery = new dbquery($countquery,$connid);
		$row = $dbquery->getrowarray();
		$this->clspaging->numofrecs = $row[0];
		if($this->clspaging->numofrecs >0)
		{
			$this->clspaging->getcurrpagevardb();
		}

		$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' ><td colspan='13' align='right'><a href='bt_retrievedeletedstudents.php'>Retrieve deleted students</a></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('firstname','QI')><b>Firstname</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('lastname','QI')><b>lastname</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('gender','QI')><b>gender</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('date_of_birth','QI')><b>DOB</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('schoolname','QI')><b>School</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='class' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='class' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('class','QI')><b>Class</b></a></b></td>";

		$output_string .= "<td align='center'><b>Section</b></td>";
		$output_string .= "<td align='center'><b>SATS Number</b></td>";
		$output_string .= "<td align='center'><b>Citizenship ID</b></td>";
		$output_string .= "<td align='center'><b>Village</b></td>";
		$output_string .= "<td align='center'><b>Gewog</b></td>";

		$output_string .= "<td align='center'><b>Action</b></td>";
		$output_string .= "</tr>";

		//$output_string .= "<td align='center'><b>Is Physically<br>Challenged?</b></td><td align='center'><b>Father's<br>Name</b></td>";
		//$output_string .= "<td align='center'><b>Mother's<br>Name</b></td><td align='center'><b>Father's<br>Occupation</b></td>";
		//$output_string .= "<td align='center'><b>Address</b></td><td align='center'><b>Village</b></td>";
		//$output_string .= "<td align='center'><b>Mother Tongue</b></td><td align='center'><b>Nationality</b></td>";
		//$output_string .= "<td align='center'><b>Phone</b></td><td align='center'><b>Email</b></td>";


		$srno=1;
		if($this->clspaging->sortby == "firstname")
			$query .= $condition." ORDER BY firstname ".$this->clspaging->sorttype.",lastname ".$this->clspaging->limit;
		elseif($this->clspaging->sortby == "lastname")
			$query .= $condition." ORDER BY lastname ".$this->clspaging->sorttype.",firstname ".$this->clspaging->limit;
		else
			$query .= $condition." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row['gender'] == "B") $gender = "Boy";
			else $gender = "Girl";

			if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
			else $ipc = "No";

			if($row['date_of_birth'] == "0000-00-00")
				$dob = "NA";
			else
				$dob = formatDate($row['date_of_birth']);
			
			$isassdata = $this->isassessmentdatathere($row['cts_number'],$clsschoolresult,$connid);
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
			$output_string .= "<td>".$row['firstname']."</td><td>".$row['lastname']."</td>";
			$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
			$output_string .= "<td nowrap>".substr($this->schoollist_array[$row['schoolcode']],0,25)."</td>";
			$output_string .= "<td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
			//$output_string .= "<td>".$this->villagelistwithgewog_array[DoTrim($row['VillageCode'])]['Village']."</td>";
			//$output_string .= "<td>".$this->villagelistwithgewog_array[DoTrim($row['VillageCode'])]['Gewog']."</td>";
			$output_string .= "<td>".$row['cts_number']."</td>";
			if($row['cid_number']!=0)
				$output_string .= "<td>".$row['cid_number']."</td>";
			else
				$output_string .= "<td>&nbsp;</td>";
			$output_string .= "<td>".$row['VillageNameEn']."</td>";
			$output_string .= "<td>".$row['GewogNameEn']."</td>";
			if($isassdata==1)
				$output_string .= "<td><a href='javascript: viewchild(\"".$row['cts_number']."\")'>View*</a>";
			else 
				$output_string .= "<td><a href='javascript: viewchild(\"".$row['cts_number']."\")'>View</a>";

			if($usertype == "Child")
			{
				if($username == $row['cts_number'])
				{
					$output_string .= "&nbsp;&nbsp;<a href='javascript: editchild(".$row['cts_number'].")'>Edit</a></td>";
				}
				else
				{
					$output_string .= "</td>";
				}
			}
			elseif($usertype == "Admin")
			{
				if(in_array($trn_editChild,$userTransactionRightsArray))
		  		{
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editchild(".$row['cts_number'].")'>Edit</a>";
					$output_string .= "&nbsp;&nbsp;<a href='javascript: deletechild(".$row['cts_number'].",\"".$row['firstname']."\",\"".$row['lastname']."\")'>Delete</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= "</td>";
		  		}
			}
			elseif($usertype == "School")
			{
				if($username == $row['schoolcode'])
		  		{
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editchild(".$row['cts_number'].")'>Edit</a>";
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: deletechild(".$row['cts_number'].",\"".$row['firstname']."\",\"".$row['lastname']."\")'>Delete</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= "</td>";
		  		}
			}

			$output_string .= "</tr>";
			$srno++;

			//$output_string .= "<td align='center'>".$ipc."</td><td>".$row['fathername']."</td>";
			//$output_string .= "<td>".$row['mothername']."</td><td>".$row['occupation_of_father']."</td>";
			//$output_string .= "<td>".$row['address']."</td><td>".$vrow['VillageNameEn']."</td>";
			//$output_string .= "<td>".$row['mother_tongue']."</td><td>".$row['nationality']."</td>";
			//$output_string .= "<td>".$row['phone']."</td><td>".$row['email']."</td>";
		}
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='13' align='center'><font color='#FF0000'><b>* - Has ASSL Assessment data</b></font></td></tr>";
		
		if($srno == 1)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr>";
		}
		$output_string .= "</table>";
		return  $output_string;
	}

	function isassessmentdatathere($cts_number,$clsschoolresult,$connid)
	{
		$returnval=0;
		for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
		{
			$test_edition = $clsschoolresult->test_edition_array[$ti];
			$countquery = "SELECT COUNT(*) FROM studentwise".$test_edition." WHERE cts_number=".$cts_number;
			$dbquery = new dbquery($countquery,$connid);
			$row = $dbquery->getrowarray();
			if($row['COUNT(*)'] !=0)
			{
				$returnval = 1;
				return $returnval;
			}
		}
		return $returnval;
	}
	function queryResult_LOTC($username,$usertype,$trn_editTeacher,$userTransactionRightsArray,$schoolcode_string,$connid)
	{
		$this->setpostvars();
		$this->clspaging->setpostvars();

		$countquery = "SELECT COUNT(*) FROM teacher_master";
		$query = "SELECT * FROM teacher_master";
		$condition = "";

		if($this->teachername != "")
		{
			$condition .= " AND (firstname like '%".DoAddSlashes($this->teachername)."%'";
			$condition .= " OR lastname like '%".DoAddSlashes($this->teachername)."%')";
		}

		if($this->tc_gender != "")
			$condition .= " AND gender='".$this->tc_gender."'";
		if($this->tc_agecondition != "")
		{
			$today = date("Y-m-d");
			$condition .= " AND ((DATEDIFF('".$today."',date_of_birth)/365) ".$this->tc_agecondition." ".$this->tc_agevalue.")";
		}
		if($this->tc_searchtext != "")
		{
			$condition .= " AND (hobby1 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR hobby2 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR hobby3 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR strength1 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR strength2 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR strength3 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR weakness1 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR weakness2 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR weakness3 like '%".DoAddSlashes($this->tc_searchtext)."%'";
			$condition .= " OR responsibilities_comments like '%".DoAddSlashes($this->tc_searchtext)."%')";
		}

		if($this->qualification != "")
			$condition .= " AND qualification like '%".DoAddSlashes($this->qualification)."%'";
		if($this->experience != "")
			$condition .= " AND experience='".DoAddSlashes($this->experience)."'";
		if($this->status != "")
				$condition .= " AND status like '%".$this->status."%'";
		if($this->subjectstaught != "")
		{
			$subjectsTaughtArrray = explode(",",$this->subjectstaught);
			$subCondition = "";
			for($index=0; $index<count($subjectsTaughtArrray); $index++)
			{
				$subCondition .= "subjects_classes_taught like '%".DoAddSlashes($subjectsTaughtArrray[$index])."%' OR ";
			}
			$subCondition = substr($subCondition,0,-4);
			$condition .= " AND (".$subCondition.")";
		}

		if($this->subjectscanteach != "")
		{
			$subjectsCanTeachArrray = explode(",",$this->subjectscanteach);
			$subCondition = "";
			for($index=0; $index<count($subjectsCanTeachArrray); $index++)
			{
				$subCondition .= "subjects_classes_can_teach like '%".DoAddSlashes($subjectsCanTeachArrray[$index])."%' OR ";
			}
			$subCondition = substr($subCondition,0,-4);
			$condition .= " AND (".$subCondition.")";
		}

		$condition .= " AND schoolcode IN (".$schoolcode_string.")";
		if($condition != "")
		{
			$condition = " WHERE ".substr($condition,4);
		}

		//echo $condition."AA<br>";
		$countquery .= $condition;
		//echo $countquery."<br><br>"; exit;
		$dbquery = new dbquery($countquery,$connid);
		$row = $dbquery->getrowarray();
		$this->clspaging->numofrecs = $row[0];
		if($this->clspaging->numofrecs >0)
		{
			$this->clspaging->getcurrpagevardb();
		}

		$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' ><td colspan='12' align='right'><a href='bt_retrievedeletedteachers.php'>Retrieve deleted teachers</a></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('firstname','QI')><b>Firstname</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('lastname','QI')><b>lastname</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('gender','QI')><b>gender</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('date_of_birth','QI')><b>DOB</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('schoolname','QI')><b>School</b></a></b></td>";

		$output_string .= "<td align='center'><b>SATS Number</b></td>";
		$output_string .= "<td align='center'><b>Citizenship ID </b></td>";
		$output_string .= "<td align='center'><b>Qualification</b></td>";
		$output_string .= "<td align='center'><b>Subjects Taught</b></td>";
		$output_string .= "<td align='center'><b>Subjects Can Teach</b></td>";
		$output_string .= "<td align='center'><b>Action</b></td>";
		$output_string .= "</tr>";

		$srno=1;
		if($this->clspaging->sortby == "firstname")
			$query .= $condition." ORDER BY firstname ".$this->clspaging->sorttype.",lastname ".$this->clspaging->limit;
		elseif($this->clspaging->sortby == "lastname")
			$query .= $condition." ORDER BY lastname ".$this->clspaging->sorttype.",firstname ".$this->clspaging->limit;
		else
			$query .= $condition." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
		//$query .= $condition." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row['gender'] == "M") $gender = "Male";
			else $gender = "Female";

			if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
			else $ipc = "No";

			if($row['date_of_birth'] == "0000-00-00")
				$dob = "NA";
			else
				$dob = formatDate($row['date_of_birth']);

			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
			$output_string .= "<td>".$row['firstname']."</td><td>".$row['lastname']."</td>";
			$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
			$output_string .= "<td nowrap>".substr($this->schoollist_array[$row['schoolcode']],0,25)."</td>";
			$output_string .= "<td>".$row['teacher_id']."</td>";
			if($row['cid_number']!=0)
				$output_string .= "<td>".$row['cid_number']."</td>";
			else
				$output_string .= "<td>&nbsp;</td>";
			$output_string .= "<td>".$row['qualification']."</td>";
			$output_string .= "<td>".$this->teacher_subject_long_to_short($row['subjects_classes_taught'])."</td>";
			$output_string .= "<td>".$this->teacher_subject_long_to_short($row['subjects_classes_can_teach'])."</td>";

			$output_string .= "<td><a href='javascript: viewteacher(\"".$row['teacher_id']."\")'>View</a>";
			if($usertype == "Admin")
			{
				if(in_array($trn_editTeacher,$userTransactionRightsArray))
		  		{
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editteacher(".$row['teacher_id'].")'>Edit</a>";
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: deleteteacher(".$row['teacher_id'].",\"".$row['firstname']."\",\"".$row['lastname']."\")'>Delete</a></td>";
		  			//showDuplicateSchool(\"".$queryString."\")'
		  		}
		  		else
		  		{
		  			$output_string .= "</td>";
		  		}
			}
			elseif($usertype == "School")
			{
				if($username == $row['schoolcode'])
		  		{
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editteacher(".$row['teacher_id'].")'>Edit</a>";
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: deleteteacher(".$row['teacher_id'].",\"".$row['firstname']."\",\"".$row['lastname']."\")'>Delete</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= "</td>";
		  		}
			}

			$output_string .= "</tr>";
			$srno++;
		}

		if($srno == 1)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr>";
		}
		$output_string .= "</table>";
		return  $output_string;
	}

	function queryResult_LOSC($username,$usertype,$trn_editSchool,$userTransactionRightsArray,$schoolcode_string,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>"; //exit;
		$this->setpostvars();
		$this->clspaging->setpostvars();
		$countquery = "SELECT COUNT(*) FROM school_master";
		$query = "SELECT * FROM school_master";
		$condition = "";

		if($this->schoolname != "")
			$condition .= " AND schoolname like '%".DoAddSlashes($this->schoolname)."%'";
		if($this->schoolcategory != "")
			$condition .= " AND schoolcategory like '%".DoAddSlashes($this->schoolcategory)."%'";
		if($this->schooltype != "")
			$condition .= " AND schooltype like '%".DoAddSlashes($this->schooltype)."%'";
		if($this->principalname != "")
			$condition .= " AND principal_name like '%".DoAddSlashes($this->principalname)."%'";
		if($this->totalstudentcondition != "")
			$condition .= " AND (totalstudents ".$this->totalstudentcondition." ".$this->totalstudentvalue.")";

		$condition .= " AND schoolcode IN (".$schoolcode_string.")";
		if($condition != "")
		{
			$condition = " WHERE ".substr($condition,4);
		}
		//echo $condition."AA<br>";
		$countquery .= $condition;
		//echo $countquery; exit;
		$dbquery = new dbquery($countquery,$connid);
		$row = $dbquery->getrowarray();
		$this->clspaging->numofrecs = $row[0];
		if($this->clspaging->numofrecs >0)
		{
			$this->clspaging->getcurrpagevardb();
		}

		$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='schoolname' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('schoolname','QI')><b>School Name</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='schoolcategory' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='schoolcategory' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('schoolcategory','QI')><b>School<br>Category</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='schooltype' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='schooltype' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('schooltype','QI')><b>School<br>Type</b></a></b></td>";

		/*$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='schooltype' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='schooltype' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('schooltype','school')><b>School Type</b></a></b></td>";*/

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='date_of_eshtablishment' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='date_of_eshtablishment' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('date_of_eshtablishment','QI')><b>Date Of<br>Establishment</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='totalboys' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='totalboys' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('totalboys','QI')><b>Total Boys (As per form F)</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='totalgirls' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='totalgirls' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('totalgirls','QI')><b>Total Girls (As per form F)</b></a></b></td>";

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='totalstudents' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='totalstudents' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('totalstudents','QI')><b>Total Students (As per form F)</b></a></b></td>";

		$output_string .= "<td align='center'><b>Total Boys<br>(As per student data)</b></td>";
		$output_string .= "<td align='center'><b>Total Girls<br>(As per student data)</b></td>";
		$output_string .= "<td align='center'><b>Total Students<br>(As per student data)</b></td>";
		
		$output_string .= "<td align='center'><b>Address</b></td>";
		/*$output_string .= "<td align='center'><b>Village</b></td>";
		$output_string .= "<td align='center'><b>Gewog</b></td>";*/

		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='VillageNameEn' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='VillageNameEn' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('VillageNameEn','QI')><b>Village</b></a></b></td>";
		
		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='GewogNameEn' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='GewogNameEn' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('GewogNameEn','QI')><b>Gewog</b></a></b></td>";
		
		$output_string .= "<td align='center'>";
		if($this->clspaging->sortby=='DzongkhagNameEn' and $this->clspaging->sorttype=='ASC')
			$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
		else if($this->clspaging->sortby=='DzongkhagNameEn' and $this->clspaging->sorttype=='DESC')
			$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
		$output_string .= "<a href=javascript:sortby('DzongkhagNameEn','QI')><b>Dzongkhag</b></a></b></td>";

		//$output_string .= "<td align='center'><b>Dzongkhag</b></td>";
		$output_string .= "<td align='center'><b>School Phone Number</b></td><td align='center'><b>Principal's Email</b></td>";
		$output_string .= "<td align='center'><b>Name of Principal</b></td><td align='center'><b>Action</b></td>";
		$output_string .= "</tr>";

		$srno=1;
		if($this->clspaging->sortby == "firstname")
			$this->clspaging->sortby = "schoolname";

		$query .= $condition." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row['date_of_eshtablishment'] == "0000-00-00")
				$dose = "NA";
			else
				$dose = formatDate($row['date_of_eshtablishment']);

			$schoolenrlmnt = array();
			$schoolenrlmnt = $this->fetchSchoolEnrollment($row['schoolcode'],$connid);
			
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
			$output_string .= "<td>".$row['schoolname']."</td>";
			$output_string .= "<td>".$row['schoolcategory']."</td>";
			$output_string .= "<td>".$row['schooltype']."</td>";
			$output_string .= "<td align='center' nowrap>".$dose."</td>";
			$output_string .= "<td align='center' nowrap>".$row['totalboys']."</td><td align='center' nowrap>".$row['totalgirls']."</td>";
			$output_string .= "<td align='center'><a href='javascript: showenrollmenthistory(".$row['schoolcode'].")'>".$row['totalstudents']."</a>";
			//$output_string .= "<td align='center' nowrap>".$row['totalstudents']."</td>";
			
			$output_string .= "<td align='center' nowrap>".$schoolenrlmnt['B']."</td><td align='center' nowrap>".$schoolenrlmnt['G']."</td><td align='center' nowrap>".$schoolenrlmnt['T']."</td>";
			
			$output_string .= "<td>".$row['address']."</td>";
			$output_string .= "<td>".$this->villagelistwithgewog_array[DoTrim($row['VillageCode'])]['Village']."</td>";
			$output_string .= "<td>".$this->villagelistwithgewog_array[DoTrim($row['VillageCode'])]['Gewog']."</td>";
			//$output_string .= "<td>".$this->villagelistwithgewog_array[$row['VillageCode']]['Dzongkhag']."</td>";
			$output_string .= "<td>".$row['DzongkhagNameEn']."</td>";
			$output_string .= "<td>".$row['phone']."</td><td>".$row['email']."</td><td>".$row['principal_name']."</td>";
			$output_string .= "<td><a href='javascript: viewschool(".$row['schoolcode'].")'>View</a>";
			//$output_string .= "<td><a href='javascript: showenrollmenthistory(".$row['schoolcode'].")'>History</a>";

			if($usertype == "Admin")
			{
				if(in_array($trn_editSchool,$userTransactionRightsArray))
		  		{
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editschool(".$row['schoolcode'].")'>Edit</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= "</td>";
		  		}
			}
			elseif($usertype == "School")
			{
				if($username == $row['schoolcode'])
		  		{
		  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editschool(".$row['schoolcode'].")'>Edit</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= "</td>";
		  		}
			}

			$output_string .= "</tr>";
			$srno++;
		}

		if($srno == 1)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr>";
		}
		$output_string .= "</table>";
		return  $output_string;
	}
	
	function fetchSchoolEnrollment($schoolcode,$connid)
	{
		$schoolenrlmnt_array = array();
		$totalstudents = 0;
		$query = "SELECT gender,COUNT(*) AS N FROM student_master where schoolcode=".$schoolcode." GROUP BY gender";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schoolenrlmnt_array[$row['gender']] = $row['N'];
			$totalstudents += $row['N'];
		}
		$schoolenrlmnt_array['T'] = $totalstudents;
		return $schoolenrlmnt_array;
	}

	function generateNewCTSNumber($connid)
	{
		//$query = "SELECT * FROM student_master LIMIT ".$total.",1";
		$query = "SELECT MAX(SUBSTRING(cts_number,2,8)) as cts_number FROM student_master";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();

		$last_cts_number = $row['cts_number'];
		$inner_cts_number = $last_cts_number;
		$r1 = rand(1,9);
		$r2 = rand(1,9);
		$inner_cts_number++;
		$new_cts_number = $r1.$inner_cts_number.$r2;

		return $new_cts_number;
	}

	function generateNewTeacherID($connid)
	{
		//$query = "SELECT * FROM teacher_master LIMIT ".$total.",1";
		$query = "SELECT MAX(SUBSTRING(teacher_id,2,6)) as teacher_id FROM teacher_master";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();

		$last_teacher_id = $row['teacher_id'];
		$inner_teacher_id = $last_teacher_id;
		$r1 = rand(1,9);
		$r2 = rand(1,9);
		$inner_teacher_id++;
		$new_teacher_id = $r1.$inner_teacher_id.$r2;

		return $new_teacher_id;
	}

	function generateNewSchoolCode($connid)
	{
		//$query = "SELECT * FROM school_master LIMIT ".$total.",1";
		$query = "SELECT MAX(SUBSTRING(schoolcode,2,5)) as schoolcode FROM school_master";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();

		$last_schoolcode = $row['schoolcode'];
		$inner_schoolcode = $last_schoolcode;
		$r1 = rand(1,9);
		$r2 = rand(1,9);
		$inner_schoolcode++;
		$new_schoolcode = $r1.$inner_schoolcode.$r2;

		return $new_schoolcode;
	}

	function pageViewChild($userid,$connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->actiontoperform == "View Child")
		{
			$query = "SELECT * FROM student_master WHERE cts_number='".$this->cts_number."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			return $row;
		}
	}

	function pageViewSchool($userid,$connid)
	{
		if($this->actiontoperform == "View School")
		{
			$query = "SELECT * FROM school_master WHERE schoolcode='".$this->schoolcode."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			return $row;
		}
	}

	function pageFindChild($userid,$usertype,$trn_editChild,$userTransactionRightsArray,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>"; //exit;
		$this->setpostvars();
		$this->clspaging->setpostvars();
		if($this->actiontoperform == "Find Child")
		{
			$countquery = "SELECT COUNT(*) FROM student_master";
			$query = "SELECT * FROM student_master";
			$condition = "";

			if($this->firstname != "")
				$condition .= " AND firstname like '%".DoAddSlashes($this->firstname)."%'";
			if($this->lastname != "")
				$condition .= " AND lastname like '%".DoAddSlashes($this->lastname)."%'";
			if($this->guardinname != "")
			{
				$condition .= " AND (fathername like '%".DoAddSlashes($this->guardinname)."%'";
				$condition .= " OR mothername like '%".DoAddSlashes($this->guardinname)."%')";
			}
			if($this->dob != "")
				$condition .= " AND date_of_birth='".$this->dob."'";
			if($this->email != "")
				$condition .= " AND email='".$this->email."'";
			if($this->dzongkhag != "" && $this->gewog == "")
			{
				$villagesingewog = $this->fetchVillagesInDzongkhag($this->dzongkhag,$connid);
				if($villagesingewog != "")
				{
					$condition .= " AND VillageCode IN (".$villagesingewog.")";
				}
			}
			if($this->gewog != "" && $this->village == "")
			{
				$villagesingewog = $this->fetchVillagesinGewog($this->gewog,$connid);
				if($villagesingewog != "")
				{
					$condition .= " AND VillageCode IN (".$villagesingewog.")";
				}
			}
			if($this->village != "")
				$condition .= " AND VillageCode='".$this->village."'";
			if($this->school != "")
				$condition .= " AND schoolcode='".$this->school."'";
			if($this->class != "")
				$condition .= " AND class='".$this->class."'";
			if($this->gender != "")
				$condition .= " AND gender='".$this->gender."'";
			if($this->agecondition != "")
			{
				$today = date("Y-m-d");
				$condition .= " AND ((DATEDIFF('".$today."',date_of_birth)/365) ".$this->agecondition." ".$this->agevalue.")";
			}

			if($condition != "")
			{
				$condition = " WHERE ".substr($condition,4);
			}
			//echo $condition."AA<br>";
			$countquery .= $condition;
			//echo $countquery;
			$dbquery = new dbquery($countquery,$connid);
			$row = $dbquery->getrowarray();
			$this->clspaging->numofrecs = $row[0];
			if($this->clspaging->numofrecs >0)
			{
				$this->clspaging->getcurrpagevardb();
			}

			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='firstname' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('firstname','child')><b>Firstname</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='lastname' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('lastname','child')><b>lastname</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='gender' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('gender','child')><b>gender</b></a></b></td>";

			$output_string .= "<td align='center'>";
			if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='ASC')
				$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
			else if($this->clspaging->sortby=='date_of_birth' and $this->clspaging->sorttype=='DESC')
				$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
			$output_string .= "<a href=javascript:sortby('date_of_birth','child')><b>DOB</b></a></b></td>";

			$output_string .= "<td align='center'><b>Village</b></td>";
			$output_string .= "<td align='center'><b>Gewog</b></td><td align='center'><b>School</b></td>";
			$output_string .= "<td align='center'><b>Class</b></td><td align='center'><b>Section</b></td>";
			$output_string .= "<td align='center'><b>Action</b></td>";
			$output_string .= "</tr>";

			//$output_string .= "<td align='center'><b>Is Physically<br>Challenged?</b></td><td align='center'><b>Father's<br>Name</b></td>";
			//$output_string .= "<td align='center'><b>Mother's<br>Name</b></td><td align='center'><b>Father's<br>Occupation</b></td>";
			//$output_string .= "<td align='center'><b>Address</b></td><td align='center'><b>Village</b></td>";
			//$output_string .= "<td align='center'><b>Mother Tongue</b></td><td align='center'><b>Nationality</b></td>";
			//$output_string .= "<td align='center'><b>Phone</b></td><td align='center'><b>Email</b></td>";


			$srno=1;
			$query .= $condition." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
			//echo $query."<br><br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if($row['gender'] == "B") $gender = "Boy";
				else $gender = "Girl";

				if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
				else $ipc = "No";

				if($row['date_of_birth'] == "0000-00-00")
					$dob = "NA";
				else
					$dob = formatDate($row['date_of_birth']);

				$vquery = "SELECT * FROM bt_village_master WHERE VillageCode='".$row['VillageCode']."'";
				$vdbquery = new dbquery($vquery,$connid);
				$vrow = $vdbquery->getrowarray();

				$scquery = "SELECT * FROM school_master WHERE schoolcode='".$row['schoolcode']."'";
				$scdbquery = new dbquery($scquery,$connid);
				$scrow = $scdbquery->getrowarray();

				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
				$output_string .= "<td>".$row['firstname']."</td><td>".$row['lastname']."</td>";
				$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
				$output_string .= "<td>".$vrow['VillageNameEn']."</td>";
				$output_string .= "<td>".$vrow['GewogNameEn']."</td><td nowrap>".substr($scrow['schoolname'],0,25)."</td>";
				$output_string .= "<td align='center'>".$row['class']."</td><td align='center'>".$row['section']."</td>";
				$output_string .= "<td><a href='javascript: viewchild(\"".$row['cts_number']."\")'>View</a>";

				if($usertype == "Child")
				{
					if($userid == $row['cts_number'])
					{
						$output_string .= "&nbsp;&nbsp;<a href='javascript: editchild(".$row['cts_number'].")'>Edit</a></td>";
					}
					else
					{
						$output_string .= "</td>";
					}
				}
				elseif($usertype == "Admin")
				{
					if(in_array($trn_editChild,$userTransactionRightsArray))
			  		{
			  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editchild(".$row['cts_number'].")'>Edit</a></td>";
			  		}
			  		else
			  		{
			  			$output_string .= "</td>";
			  		}
				}
				elseif($usertype == "School")
				{
					if($userid == $row['schoolcode'])
			  		{
			  			$output_string .= "&nbsp;&nbsp;<a href='javascript: editchild(".$row['cts_number'].")'>Edit</a></td>";
			  		}
			  		else
			  		{
			  			$output_string .= "</td>";
			  		}
				}

				$output_string .= "</tr>";
				$srno++;

				//$output_string .= "<td align='center'>".$ipc."</td><td>".$row['fathername']."</td>";
				//$output_string .= "<td>".$row['mothername']."</td><td>".$row['occupation_of_father']."</td>";
				//$output_string .= "<td>".$row['address']."</td><td>".$vrow['VillageNameEn']."</td>";
				//$output_string .= "<td>".$row['mother_tongue']."</td><td>".$row['nationality']."</td>";
				//$output_string .= "<td>".$row['phone']."</td><td>".$row['email']."</td>";
			}
			$output_string .= "</table>";
			return  $output_string;
		}
	}

	function pageEditChild($userid,$connid)
	{
		//echo "<pre>"; 	print_r ($_POST); 	echo "</pre><br>";
		//$this->setpostvars();
		//$this->setgetvars();
		if($this->actiontoperform == "Edit Child")
		{
			$uploadimagename = "";
			if($_FILES['photograph']['name'] != "")
			{
				$query = "SELECT photograph FROM student_master WHERE cts_number='".$this->cts_number."'";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				$old_imagename = constant("PATH_CHILDRENPHOTOS").$row['photograph'];
				if($old_imagename != "")
				{
					unlink($old_imagename);  // Remove old photo
				}

				$imagename = $this->cts_number."_".basename($_FILES['photograph']['name']);
				$uploadfile = constant("PATH_CHILDRENPHOTOS").$imagename;
				if(!move_uploaded_file($_FILES['photograph']['tmp_name'], $uploadfile))
				{
					echo "Possible file upload attack...";
				}
			}

			// If student has changed school than send mail to admin people. - starts here
			$query = "SELECT firstname,lastname,schoolcode FROM student_master WHERE cts_number='".$this->cts_number."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$old_schoolcode = $row['schoolcode'];
			$name = ucfirst($row['firstname'])." ".ucfirst($row['lastname']);
			$new_schoolcode = $this->school;
			if(($old_schoolcode != "") && ($old_schoolcode != $new_schoolcode))
			{
				$schoolchanged_date = date("Y-m-d");
				$query  = "INSERT INTO bt_student_schoolchange_history SET cts_number=".$this->cts_number.",";
				$query .= "old_schoolcode=".$old_schoolcode.", new_schoolcode=".$new_schoolcode.",schoolchange_date='".$schoolchanged_date."'";
				//echo $query; exit;
				$dbquery = new dbquery($query,$connid);
				$adminuseremails = $this->fetchAdminUserEmails($connid);
				$totalemails = count($adminuseremails);
				$to = "";
				$cclist = "";
				for($i=0; $i<$totalemails; $i++)
				{
					if($adminuseremails[$i] != "")
					{
						if($i==0)
							$to = $adminuseremails[$i];
						else
							$cclist .= $adminuseremails[$i].",";
					}
				}
				$cclist = substr($cclist,0,-1);

				// Send mail
				$old_schoolname = $this->fetchSchoolName($old_schoolcode,$connid);
				$new_schoolname = $this->fetchSchoolName($new_schoolcode,$connid);
				$headers = "From: <system@ei-india.com>\r\n";
				//$headers .= "Reply-To: <arpit.metaliya@ei-india.com>\r\n";
				if($cclist != "")
					$headers .= "Cc: ".$cclist;
				$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
				$subject = "Student's School Change Alert";

				$message = "Student <b>".$name."</b> (SATS Number: ".$this->cts_number.") has changed school.<br>";
				$message .= "Previous school: ".$old_schoolname." (School code: ".$old_schoolcode.")<br>";
				$message .= "New school: ".$new_schoolname." (School code: ".$new_schoolcode.")";
				$message .= "<br><br>-- Bhutan SATS";

				//echo $to."<br>";
				//echo $cclist."<br>";
				//echo $message."<br><br>"; exit;

				send_mail($to,$subject,$message,$headers);
			}
			// If student has changed school than send mail to admin people. - ends here

			$villagerow = $this->fetchVillageDetails($this->village,$connid);

			$updateQuery  = "UPDATE student_master SET ";
			$updateQuery .= "firstname='".DoAddSlashes($this->firstname)."',";
			$updateQuery .= "secondname='".DoAddSlashes($this->secondname )."',";
			$updateQuery .= "lastname='".DoAddSlashes($this->lastname)."',";
			$updateQuery .= "guardian_firstname='".DoAddSlashes($this->fathername)."',";
			$updateQuery .= "guardian_secondname='".DoAddSlashes($this->guardian_secondname)."',";
			$updateQuery .= "guardian_lastname='".DoAddSlashes($this->mothername)."',";
			$updateQuery .= "gender='".$this->gender."',";
			$updateQuery .= "date_of_birth='".$this->dob."',";
			$updateQuery .= "phone='".$this->phone."',";
			$updateQuery .= "email='".$this->email."',";
			$updateQuery .= "isphisicallychallenged='".$this->isphisicallychallenged."',";
			$updateQuery .= "occupation_of_guardian='".DoAddSlashes($this->occupation_of_father)."',";
			$updateQuery .= "relation_with_guardian='".DoAddSlashes($this->occupation_of_mother)."',";
			$updateQuery .= "cid_number='".DoAddSlashes($this->cid_number)."',";
			$updateQuery .= "address='".DoAddSlashes($this->address)."',";
			$updateQuery .= "VillageCode='".$this->village."',";
			$updateQuery .= "guardian_present_VillageNameEn='".$villagerow["VillageNameEn"]."',";
			$updateQuery .= "guardian_present_GewogNameEn='".$villagerow["GewogNameEn"]."',";
			$updateQuery .= "guardian_present_DzongkhagNameEn='".$villagerow["DzongkhagNameEn"]."',"; 
			$updateQuery .= "guardian_incomelevel='".$this->incomelevel_guardian."',"; 
			$updateQuery .= "schoolcode='".$this->school."',";
			$updateQuery .= "schoolname='".$new_schoolname."',";
			$updateQuery .= "class='".$this->class."',";
			$updateQuery .= "section='".$this->section."',";
			$updateQuery .= "mother_tongue='".DoAddSlashes($this->mother_tongue)."',";
			$updateQuery .= "nationality='".DoAddSlashes($this->nationality)."',";
			$updateQuery .= "boader='".DoAddSlashes($this->boader)."',";
			$updateQuery .= "repeater='".DoAddSlashes($this->repeater)."',";
			$updateQuery .= "wfp='".DoAddSlashes($this->wfp)."',";
			$updateQuery .= "new_enrollment='".DoAddSlashes($this->new_enrollment)."',";
			$updateQuery .= "rejoin='".DoAddSlashes($this->rejoin)."',";
			$updateQuery .= "isdaycareattended='".DoAddSlashes($this->daycare_stat)."',";
			$updateQuery .= "daycareyears='".DoAddSlashes($this->daycare_years)."',";

			
			
			$updateQuery .= "hobby1='".DoAddSlashes($this->hobby1)."',";
			$updateQuery .= "hobby2='".DoAddSlashes($this->hobby2)."',";
			$updateQuery .= "hobby3='".DoAddSlashes($this->hobby3)."',";
			$updateQuery .= "strength1='".DoAddSlashes($this->strength1)."',";
			$updateQuery .= "strength2='".DoAddSlashes($this->strength2)."',";
			$updateQuery .= "strength3='".DoAddSlashes($this->strength3)."',";
			$updateQuery .= "weakness1='".DoAddSlashes($this->weakness1)."',";
			$updateQuery .= "weakness2='".DoAddSlashes($this->weakness2)."',";
			$updateQuery .= "weakness3='".DoAddSlashes($this->weakness3)."',";
			$updateQuery .= "otheractivities_comments='".DoAddSlashes($this->otheractivities_comments)."'";

			if(basename($_FILES['photograph']['name']!=""))
				$updateQuery .= ",photograph='".DoAddSlashes($imagename)."'";

			$updateQuery .= " WHERE cts_number='".$this->cts_number."'";
			//echo $updateQuery."<br><br>"; //exit;
			$dbquery = new dbquery($updateQuery,$connid);
			echo "<script>opener.location.reload(true);window.close();</script>";
			exit();
		}
		$query = "SELECT * FROM student_master WHERE cts_number=".$this->cts_number;
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

		//added by sumita 1/5/2009
	function pageDeleteChild($userid,$connid)
	{
		$this->setgetvars();
		if($this->actiontoperform == "Delete Student")
		{
			$updateQuery = "UPDATE student_master SET deletedby='".$userid."' WHERE cts_number=".$this->cts_number;
			$dbquery = new dbquery($updateQuery,$connid);
			//echo $updateQuery."<br>";

			$insQuery = "INSERT INTO student_master_deleted (SELECT * FROM student_master WHERE cts_number=".$this->cts_number.")";
			$dbquery = new dbquery($insQuery,$connid);
			//echo $insQuery."<br>";

			$delQuery = "DELETE FROM student_master WHERE cts_number=".$this->cts_number;
			$dbquery = new dbquery($delQuery,$connid);
			//echo $delQuery."<br>";

			echo "<table align='center' bordercolor='#333333' style='border-collapse: collapse'>
				 <tr bordercolor='#FFFFFF'><td align='center' colspan='2'><b>Student deleted successfully...</b></td></tr>
				 <tr bordercolor='#FFFFFF'><td align='center' colspan='2'><a href='javascript:opener.location.reload(true);window.close()'><b>Close Window</b></a></td></tr>
				 </table>";
			//<tr bordercolor='#FFFFFF'><td align='center' colspan='2'><a href='javascript:opener.history.go(0);window.close()'><b>Close Window</b></a></td></tr>
			/*echo "<script>opener.history.go(0);window.close();</script>";*/
			exit();
		}
	}
	//end by sumita

	function fetchAdminUserEmails($connid)
	{
		$emailarray = array();
		$userQuery = "SELECT email FROM bt_users";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			array_push($emailarray, $userRow['email']);
		}
		return $emailarray;
	}

	function fetchSchoolCode($school,$connid)
	{
		$query = "SELECT * FROM school_master WHERE schoolname='".DoTrim($school)."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['schoolcode'];
	}

	function fetchVillageCode($village,$connid)
	{
		$query = "SELECT * FROM bt_village_master WHERE VillageNameEn='".DoTrim($village)."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['VillageCode'];
	}

	function prepareDzongkhagCombo($dzongkhagcode,$connid)
	{
		$dzongkhagcombo = "";
		$query = "SELECT * FROM bt_dzongkhag_master ORDER BY DzongkhagNameEn";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($dzongkhagcode == $row["DzongkhagCode"])
				$dzongkhagcombo .= "<option value=".$row["DzongkhagCode"]." selected>".$row["DzongkhagNameEn"]."</option>";
			else
				$dzongkhagcombo .= "<option value=".$row["DzongkhagCode"].">".$row["DzongkhagNameEn"]."</option>";
		}
		return $dzongkhagcombo;
	}

  	function prepareGewogCombo($gewogcode,$connid)
	{
		$gewogcombo = "";
		$query = "SELECT * FROM bt_gewog_master ORDER BY GewogNameEn";
		//echo "<br>".$gewogcode."--".$query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($gewogcode == $row["GewogCode"])
				$gewogcombo .= "<option value=".$row["GewogCode"]." selected>".$row["GewogNameEn"]."</option>";
			else
				$gewogcombo .= "<option value=".$row["GewogCode"].">".$row["GewogNameEn"]."</option>";
		}
		return $gewogcombo;
	}

	function prepareSchoolCombo_QI($schoolcode,$connid)
	{
		$schoolcombo = "";
		$query = "SELECT VillageCode FROM school_master WHERE schoolcode='".$schoolcode."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$villagecode=$row['VillageCode'];

		if($villagecode != "")
		{
			$query = "SELECT * FROM school_master WHERE VillageCode='".$villagecode."' ORDER BY schoolname";
			//echo "<br>".$query;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if($schoolcode == $row["schoolcode"])
					$schoolcombo .= "<option value=".$row["schoolcode"]." selected>".$row["schoolname"]."</option>";
				else
					$schoolcombo .= "<option value=".$row["schoolcode"].">".$row["schoolname"]."</option>";
			}
		}
		return $schoolcombo;
	}

	function prepareGewogCombo_QI($gewogcode,$connid)
	{
		$gewogcombo = "";
		$query = "SELECT DzongkhagCode FROM bt_gewog_master WHERE GewogCode='".$gewogcode."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$dzongkhagcode=$row['DzongkhagCode'];

		$query = "SELECT * FROM bt_gewog_master WHERE DzongkhagCode='".$dzongkhagcode."' ORDER BY GewogNameEn";
		//echo "<br>".$query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($gewogcode == $row["GewogCode"])
				$gewogcombo .= "<option value=".$row["GewogCode"]." selected>".$row["GewogNameEn"]."</option>";
			else
				$gewogcombo .= "<option value=".$row["GewogCode"].">".$row["GewogNameEn"]."</option>";
		}
		return $gewogcombo;
	}

	function prepareVillageCombo($villagecode,$connid)
	{
		$villagecombo = "";
		$query = "SELECT GewogCode FROM bt_village_master WHERE VillageCode='".$villagecode."' LIMIT 1";
		//echo "<br>".$villagecode."--".$query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$gewogcode=$row['GewogCode'];

		$query = "SELECT * FROM bt_village_master WHERE GewogCode='".$gewogcode."' ORDER BY VillageNameEn";
		//echo "<br>".$query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($villagecode == $row["VillageCode"])
				$villagecombo .= "<option value=".$row["VillageCode"]." selected>".$row["VillageNameEn"]."</option>";
			else
				$villagecombo .= "<option value=".$row["VillageCode"].">".$row["VillageNameEn"]."</option>";
		}
		return $villagecombo;
	}

	function prepareClassCombo($class,$connid)
	{
		$classcombo;
		for($i=0;$i<$this->totalClasses;$i++)
		{
			if($class == $this->classArray[$i])
				$classcombo .= "<option value='".$this->classArray[$i]."' selected>".$this->classArray[$i]."</option>";
			else
				$classcombo .= "<option value='".$this->classArray[$i]."'>".$this->classArray[$i]."</option>";
		}
		return $classcombo;
	}

	function prepareSectionCombo($section,$connid)
	{
		$sectioncombo;
		for($i=0;$i<$this->totalSections;$i++)
		{
			if($section == $this->sectionArray[$i])
				$sectioncombo .= "<option value='".$this->sectionArray[$i]."' selected>".$this->sectionArray[$i]."</option>";
			else
				$sectioncombo .= "<option value='".$this->sectionArray[$i]."'>".$this->sectionArray[$i]."</option>";
		}
		return $sectioncombo;
	}

	function prepareMotherTongueCombo($section,$connid)
	{
		$mothertonguecombo;
		for($i=0;$i<$this->totalSections;$i++)
		{
			if($mothertongue == $this->motherTongueArray[$i])
				$mothertonguecombo .= "<option value=".$this->motherTongueArray[$i]." selected>".$this->motherTongueArray[$i]."</option>";
			else
				$mothertonguecombo .= "<option value=".$this->motherTongueArray[$i].">".$this->motherTongueArray[$i]."</option>";
		}
		return $mothertonguecombo;
	}

	function prepareSchoolCombo($schoolcode,$connid)
	{
		$schoolcombo = "";
		$query = "SELECT * FROM school_master ORDER BY schoolname";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schoolname = substr($row["schoolname"],0,25);
			if($schoolcode == $row["schoolcode"])
				$schoolcombo .= "<option value=".$row["schoolcode"]." selected>".$schoolname."</option>";
			else
				$schoolcombo .= "<option value=".$row["schoolcode"].">".$schoolname."</option>";
		}
		return $schoolcombo;
	}


	function fetchSchoolDetails($schoolcode,$connid)
	{
		$query = "SELECT * FROM school_master WHERE schoolcode='".$schoolcode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

	function fetchVillageDetails($villagecode,$connid)
	{
		$query = "SELECT * FROM bt_village_master WHERE VillageCode='".$villagecode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}

	function fetchGewogName($villagecode,$connid)
	{
		$query = "SELECT * FROM bt_village_master WHERE VillageCode='".$villagecode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['GewogNameEn'];
	}

	function fetchVillageName($villagecode,$connid)
	{
		$query = "SELECT * FROM bt_village_master WHERE VillageCode='".$villagecode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['VillageNameEn'];
	}

	function fetchSchoolName($schoolcode,$connid)
	{
		$query = "SELECT * FROM school_master WHERE schoolcode='".$schoolcode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row['schoolname'];
	}

	function fetchGewogOfVillage($villagecode, $connid)
	{
		$gewogcode="";
		$query = "SELECT GewogCode FROM bt_village_master WHERE VillageCode='".$villagecode."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$gewogcode .= $row['GewogCode'];
		return $gewogcode;
	}

	function fetchVillagesInGewog($gewogcode, $connid)
	{
		$villagecodes = "";
		$query = "SELECT VillageCode FROM bt_village_master WHERE GewogCode='".$gewogcode."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$villagecodes .= $row['VillageCode'].",";
		}
		$villagecodes = substr($villagecodes, 0, -1);
		return $villagecodes;
	}

	function fetchVillagesInDzongkhag($dzongkhagcode, $connid)
	{
		$villagecodes = "";
		$query = "SELECT VillageCode FROM bt_village_master WHERE DzongkhagCode='".$dzongkhagcode."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$villagecodes .= $row['VillageCode'].",";
		}
		$villagecodes = substr($villagecodes, 0, -1);
		return $villagecodes;
	}

	function fetchAllVillages($connid)
	{
		$villagecodes = "";
		$query = "SELECT VillageCode FROM bt_village_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$villagecodes .= $row['VillageCode'].",";
		}
		$villagecodes = substr($villagecodes, 0, -1);
		return $villagecodes;
	}

	function fetchGewogNames($dzongkhagcode, $connid)
	{
		$gewognames = "";
		$query = "SELECT GewogCode,GewogNameEn FROM bt_gewog_master WHERE DzongkhagCode=".$dzongkhagcode." ORDER BY GewogNameEn";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$gewognames .= $row['GewogCode']."#".$row["GewogNameEn"].",";
		}
		$gewognames = substr($gewognames, 0, -1);
		return $gewognames;
	}

	function fetchVillageNames($gewogcode, $connid)
	{
		$villagenames = "";
		if($gewogcode != "")
		{
			$query = "SELECT VillageCode,VillageNameEn FROM bt_village_master WHERE GewogCode=".$gewogcode." ORDER BY VillageNameEn";
			//echo $query;
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$villagenames .= $row['VillageCode']."#".$row["VillageNameEn"].",";
			}
			$villagenames = substr($villagenames, 0, -1);
		}
		return $villagenames;
	}

	function fetchSchoolNames($villagecode, $connid)
	{
		$schoolnames = "";
		if($villagecode != "")
		{
			$query = "SELECT schoolcode,schoolname FROM school_master WHERE VillageCode='".$villagecode."'";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$schoolnames .= $row["schoolcode"]."#".$row["schoolname"].",";
			}
			$schoolnames = substr($schoolnames, 0, -1);
		}
		return $schoolnames;
	}

	function checkSchoolChanged($cts_number,$connid)
	{
		$isschoolchanged="N";
		$query = "SELECT COUNT(*) FROM bt_student_schoolchange_history WHERE cts_number=".$cts_number;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row['COUNT(*)'] > 0)
			$isschoolchanged = "Y";
		return $isschoolchanged;
	}

	function checkSchoolChangedteacher($teacher_id,$connid)
	{
		$isschoolchanged="N";
		$query = "SELECT COUNT(*) FROM bt_teacher_schoolchange_history WHERE teacher_id=".$teacher_id;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row['COUNT(*)'] > 0)
			$isschoolchanged = "Y";
		return $isschoolchanged;
	}

	function fetchSchoolChangeHistory($connid)
	{
		$this->setgetvars();
		$studentname = $this->fetchStudentName($this->cts_number,$connid);

		$output_string = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td align='center' colspan='4'><font color='#FFFFFF'><b>School Change History For ".$studentname." (".$this->cts_number.")</b></font></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>From</b></td><td align='center'><b>To</b></td>";
		$output_string .= "<td align='center'><b>Change Date</b></td></tr>";

		$srno=1;
		$query = "SELECT * FROM bt_student_schoolchange_history WHERE cts_number=".$this->cts_number;
		$dbquery = new dbquery($query,$connid);
		$totalchanges = $dbquery->numrows();
		if($totalchanges == 0)
		{
			$output_string = "<br><table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No school change history found...</b></font></td></tr>";
		}
		else
		{
			while($row=$dbquery->getrowarray())
			{
				$old_schoolname = $this->fetchSchoolName($row['old_schoolcode'],$connid);
				$new_schoolname = $this->fetchSchoolName($row['new_schoolcode'],$connid);

				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
				$output_string .= "<td>".$old_schoolname." (".$row['old_schoolcode'].")</td><td>".$new_schoolname." (".$row['new_schoolcode'].")</td>";
				$output_string .= "<td align='center'>".formatDate($row['schoolchange_date'])."</td></tr>";
				$srno++;
			}
		}
		$output_string .= "<table>";
		return $output_string;
	}

	function fetchSchoolChangeHistoryTeacher($connid)
	{
		$this->setgetvars();
		//$studentname = $this->fetchStudentName($this->cts_number,$connid);
		$teachername = $this->fetchTeacherName($this->teacher_id,$connid);

		$output_string = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td align='center' colspan='4'><font color='#FFFFFF'><b>School Change History For ".$teachername." (".$this->teacher_id.")</b></font></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>From</b></td><td align='center'><b>To</b></td>";
		$output_string .= "<td align='center'><b>Change Date</b></td></tr>";

		$srno=1;
		$query = "SELECT * FROM bt_teacher_schoolchange_history WHERE teacher_id=".$this->teacher_id;
		$dbquery = new dbquery($query,$connid);
		$totalchanges = $dbquery->numrows();
		if($totalchanges == 0)
		{
			$output_string = "<br><table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No school change history found...</b></font></td></tr>";
		}
		else
		{
			while($row=$dbquery->getrowarray())
			{
				$old_schoolname = $this->fetchSchoolName($row['old_schoolcode'],$connid);
				$new_schoolname = $this->fetchSchoolName($row['new_schoolcode'],$connid);

				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
				$output_string .= "<td>".$old_schoolname." (".$row['old_schoolcode'].")</td><td>".$new_schoolname." (".$row['new_schoolcode'].")</td>";
				$output_string .= "<td align='center'>".formatDate($row['schoolchange_date'])."</td></tr>";
				$srno++;
			}
		}
		$output_string .= "<table>";
		return $output_string;
	}

	function fetchSchoolEnrollmentHistory($connid)
	{
		$this->setgetvars();
		$schoolname = $this->fetchSchoolName($this->schoolcode,$connid);

		$output_string = "<br><table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000'><td align='center' colspan='8'><font color='#FFFFFF'><b>Enrollment History For ".$schoolname."</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>Previous<br>Total Boys</b></td><td align='center'><b>Previous<br>Total Girls</b></td>";
		$output_string .= "<td align='center'><b>Previous<br>Total Students</b></td><td align='center'><b>Total Boys</b></td>";
		$output_string .= "<td align='center'><b>Total Girls</b></td><td align='center'><b>Total Students</b></td>";
		$output_string .= "<td align='center'><b>Change Date</b></td></tr>";

		$srno=1;
		$query = "SELECT * FROM bt_school_enrollment_history WHERE schoolcode=".$this->schoolcode." ORDER BY enrolmentchange_date";
		$dbquery = new dbquery($query,$connid);
		$totalchanges = $dbquery->numrows();
		if($totalchanges == 0)
		{
			$output_string = "<br><table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No school enrollment history data found...</b></font></td></tr>";
		}
		else
		{
			while($row=$dbquery->getrowarray())
			{
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
				$output_string .= "<td align='center'>".$row['old_totalboys']."</td><td align='center'>".$row['old_totalgirls']."</td><td align='center'>".$row['old_totalstudents']."</td>";
				$output_string .= "<td align='center'>".$row['new_totalboys']."</td><td align='center'>".$row['new_totalgirls']."</td><td align='center'>".$row['new_totalstudents']."</td>";
				$output_string .= "<td align='center'>".formatDate($row['enrolmentchange_date'])."</td></tr>";
				$srno++;
			}
		}
		$output_string .= "<table>";
		return $output_string;
	}

	function fetchStudentName($cts_number,$connid)
	{
		$query = "SELECT firstname,lastname FROM student_master WHERE cts_number=".$cts_number;
		$dbquery = new dbquery($query,$connid);
		$row=$dbquery->getrowarray();
		$studentname = ucfirst($row['firstname'])." ".ucfirst($row['lastname']);
		return $studentname;
	}

	function fetchTeacherName($teacher_id,$connid)
	{
		$query = "SELECT firstname,lastname FROM teacher_master WHERE teacher_id=".$teacher_id;
		$dbquery = new dbquery($query,$connid);
		if($row=$dbquery->getrowarray())
		{	$teacherName = ucfirst($row['firstname'])." ".ucfirst($row['lastname']); }
		else
        {	$teacherName = '';}
        return $teacherName;
	}

	function uploadtestdatastep2($connid)
	{
		$this->setpostvars();

		if($this->isquestionwisemarks == "N" && $this->iscommontest == "Y") $this->test_type = "BT";
		if($this->isquestionwisemarks == "Y" && $this->iscommontest == "Y") $this->test_type = "AT";
		if($this->isquestionwisemarks == "N" && $this->iscommontest == "N") $this->test_type = "ST";
		//echo "AAA".$this->test_type;
		//print_r($_POST); //exit;
	}

	function uploadtestdatastep3($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Upload Data Step2")
		{
			$this->upload_id = $this->fetchUploadId($connid) + 1;
			$insQuery = "INSERT INTO bt_uploaddata_format SET upload_id=".$this->upload_id.", test_type='".$this->test_type."',totalsubjects=".$this->totalsubjects;
			for($i=1; $i<=$this->totalsubjects; $i++)
			{
				$subject = "subject".$i;
				$insQuery .= ",subject".$i."='".$_POST[$subject]."'";

				if($this->test_type == "AT")
				{
					$totalquestions = "totalquestions".$i;
					$insQuery .= ",tq_subject".$i."=".$_POST[$totalquestions];
				}
			}
			$dbquery = new dbquery($insQuery,$connid);
			if($this->test_type == "BT" || $this->test_type == "ST")
			{
				$csvformat_string = "SATS ID,Student Name, School Code, School Name, Class, Serial No";
				for($i=1; $i<=$this->totalsubjects; $i++)
				{
					$subject = "subject".$i;
					$csvformat_string .= ", ".$_POST[$subject]." Achieved Marks";
					$csvformat_string .= ", ".$_POST[$subject]." Total Marks";
				}
			}
			else
			{
				$csvformat_string = "SATS ID,Student Name, School Code, School Name, Class, Serial No";
				for($i=1; $i<=$this->totalsubjects; $i++)
				{
					$subject = "subject".$i;
					$totalquestions = "totalquestions".$i;
					$csvformat_string .= ", ".$_POST[$subject]." Absent";
					$csvformat_string .= ", ".$_POST[$subject]." Q1 To Q".$_POST[$totalquestions];
				}
			}
			return $csvformat_string;
			//echo $insQuery;
		}
	}

	function uploadtestdatastep4($connid)
	{
		$this->setpostvars();
		//print_r($_POST); //exit;
		if($this->actiontoperform == "Upload Data Step3")
		{
			//echo "Upload file...";
			$this->uploadfile($connid);
		}
	}

	function uploadfile($connid)
	{
	    $fcontents = file($_FILES['uploadfilename']['name']);
		$filename = basename($_FILES['uploadfilename']['name']);
		//$timestamp = date('YmdHis');
		$uploadfile = constant("UPLOADEDFILES").substr($filename,0,-4)."_".$this->test_type."_".$this->upload_id.".csv";
		//echo $uploadfile;
	    if(sizeof($fcontents) == 0)
		{
			$this->fileUploadMessage = "File should not be empty...";
			return;
		}

		if(move_uploaded_file($_FILES['uploadfilename']['tmp_name'], $uploadfile))
		{
		    $this->fileUploadMessage = "File uploaded successfully...\n";
			$tablename = $this->createTable($connid);
			$this->loaddataintable($tablename,$uploadfile,$connid);
		}
		else
		{
		    $this->fileUploadMessage = "Possible file upload attack!\n";
		}
	}

	function loaddataintable($tablename,$uploadfile,$connid)
	{
		//echo "Yeah...";
		if($this->test_type == "BT" || $this->test_type == "ST")
		{
			$query = "SELECT * FROM bt_uploaddata_format WHERE upload_id=".$this->upload_id;
		    $dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$totalsubjects = $row['totalsubjects'];

			$insString = "INSERT INTO ".$tablename." (cts_number,student_name,schoolcode,schoolname,class,serialno";
			$totalfieldscsv = 6;
			for($si=1; $si<=$totalsubjects; $si++)
			{
				$insString .= ",subject".$si."_achievedmarks,subject".$si."_totalmarks";
				$totalfieldscsv += 2;
			}
			$insString .= ")";
		    $rowindex = 0;
    		$handle = fopen($uploadfile, "r");

   			while(($arr = fgetcsv($handle, 2000, ",")) !== FALSE)
			{
				$valuesString = " VALUES (";
				if($rowindex == 0)
				{
					$rowindex++;
					continue;
				}

	        	for($i=0; $i<$totalfieldscsv; $i++)
	        	{
	        		$valuesString .= "'".DoAddSlashes($arr[$i])."',";
	        	}

	        	$valuesString = substr($valuesString,0,-1);
	        	$valuesString .= ")";

	        	if($valuesString != " VALUES (")
	        	{
   					$insertQuery = $insString.$valuesString;
   					//echo $insertQuery; exit;
   					$dbqry = new dbquery($insertQuery,$connid);

	        	}
   				$rowindex++;
   			}
			$rowindex = $rowindex - 1;
			$this->fileUploadMessage .= "<br>Data of ".$rowindex." records uploaded succussfully...";
		}
		if($this->test_type == "AT")
		{
			$query = "SELECT * FROM bt_uploaddata_format WHERE upload_id=".$this->upload_id;
		    $dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$totalsubjects = $row['totalsubjects'];

			$insString = "INSERT INTO ".$tablename." (cts_number,student_name,schoolcode,schoolname,class,serialno";
			$totalfieldscsv = 6;
			$qno=1;
			for($si=1; $si<=$totalsubjects; $si++)
			{
				$tq = "tq_subject".$si;
				$totalquestions = $row[$tq];
				$insString .= ",s".$si."Absent";
				$totalfieldscsv++;
				for($qi=1; $qi<=$totalquestions; $qi++)
				{
					$insString .= ",Q".$qno;
					$qno++;
					$totalfieldscsv++;
				}

			}
			$insString .= ")";
		    $rowindex = 0;
    		$handle = fopen($uploadfile, "r");

   			while(($arr = fgetcsv($handle, 2000, ",")) !== FALSE)
			{
				$valuesString = " VALUES (";
				if($rowindex == 0)
				{
					$rowindex++;
					continue;
				}

	        	for($i=0; $i<$totalfieldscsv; $i++)
	        	{
	        		$valuesString .= "'".DoAddSlashes($arr[$i])."',";
	        	}

	        	$valuesString = substr($valuesString,0,-1);
	        	$valuesString .= ")";

	        	if($valuesString != " VALUES (")
	        	{
   					$insertQuery = $insString.$valuesString;
   					//echo $insertQuery; exit;
   					$dbqry = new dbquery($insertQuery,$connid);

	        	}
   				$rowindex++;
   			}
			$rowindex = $rowindex - 1;
			$this->fileUploadMessage .= "<br>Data of ".$rowindex." records uploaded succussfully...";
		}
	}

	function createTable($connid)
    {
    	//$timestamp = date('YmdHis');
    	$tablename = "bt_data_".$this->test_type."_".$this->upload_id;

    	if($this->test_type == "BT" || $this->test_type == "ST")
    	{
    		$query =  "CREATE TABLE ".$tablename." (
					  `cts_number` BIGINT( 10 ) NOT NULL ,
					  `student_name` VARCHAR( 100 ) NOT NULL ,
					  `schoolcode` BIGINT( 7 ) NOT NULL ,
					  `schoolname` VARCHAR( 100 ) NOT NULL ,
					  `class` VARCHAR( 4 ) NOT NULL ,
					  `serialno` SMALLINT( 3 ) NOT NULL ,
					  `subject1_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject1_totalmarks` SMALLINT( 2 ) NOT NULL ,
					  `subject2_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject2_totalmarks` SMALLINT( 2 ) NOT NULL ,
					  `subject3_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject3_totalmarks` SMALLINT( 2 ) NOT NULL ,
					  `subject4_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject4_totalmarks` SMALLINT( 2 ) NOT NULL ,
					  `subject5_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject5_totalmarks` SMALLINT( 2 ) NOT NULL ,
					  `subject6_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject6_totalmarks` SMALLINT( 2 ) NOT NULL ,
					  `subject7_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject7_totalmarks` SMALLINT( 2 ) NOT NULL ,
					  `subject8_achievedmarks` DECIMAL( 3, 2 ) NOT NULL ,
					  `subject8_totalmarks` SMALLINT( 2 ) NOT NULL) ENGINE = MYISAM" ;
    	}
    	else
    	{
    		$query =
    			"CREATE TABLE ".$tablename." (
				cts_number BIGINT( 10 ) NOT NULL ,
				student_name VARCHAR( 100 ) NOT NULL ,
				schoolcode BIGINT( 7 ) NOT NULL ,
				schoolname VARCHAR( 100 ) NOT NULL ,
				class VARCHAR( 4 ) NOT NULL ,
				serialno SMALLINT( 3 ) NOT NULL ,
				s1Absent varchar(2),
				s2Absent varchar(2),
				s3Absent varchar(2),
				s4Absent varchar(2),
				s5Absent varchar(2),
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
    	}

    	//echo "<br><br>".$query;
		$dbquery = new dbquery($query,$connid);
		return $tablename;
    }

	function fetchUploadId($connid)
	{
		$query = "SELECT upload_id FROM bt_uploaddata_format ORDER BY upload_id DESC LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row=$dbquery->getrowarray();
		return $row['upload_id'];
	}

	function prepareSubjectCombo()
	{
		//$subjectsArray = array("English","Maths","Science","SS","Drawing");
		if($this->test_type == "BT" || $this->test_type == "ST")
			$subjectsArray = array("ACCOUNTS","ARTS","BIOLOGY","CHEMISTRY","COMMERCE","COMPUTER APPLICATIONS",
								   "DZONGKHA","ECONOMICS","ENGLISH","EVS","GENERAL","GEOGRAPHY",
								   "HEALTH & POPULATION EDUCATION","HISTORY","IT","MATHS","MORAL AND VALUE EDUCATION",
								   "PHYSICS","SCIENCE","SOCIAL STUDIES");
		else
			$subjectsArray = array("English","Maths","Science");

		$totalSubjects = count($subjectsArray);
		//echo $totalSubjects;
		$subjectsCombo = "";
		for($j=0; $j<$totalSubjects; $j++)
		{
			$subjectsCombo .= "<option value='".$subjectsArray[$j]."'>".$subjectsArray[$j]."</option>";
		}
		return $subjectsCombo;
	}

	function prepareSchoolList($connid)
	{
		$schoolist = array();
		$query = "SELECT schoolcode,schoolname FROM school_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$schoolist[$row['schoolcode']] = $row['schoolname'];
		}
		return $schoolist;
	}

	function prepareVillageWithGewogList($connid)
	{
		$villagelist = array();
		$query = "SELECT * FROM bt_village_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$villagelist[$row['VillageCode']]['Village'] = $row['VillageNameEn'];
			$villagelist[$row['VillageCode']]['Gewog'] = $row['GewogNameEn'];
			$villagelist[$row['VillageCode']]['Dzongkhag'] = $row['DzongkhagNameEn'];
		}
		return $villagelist;
	}

	function teacher_subject_long_to_short($subjectclass_string)
	{
		$subjectclass_string = str_replace($this->teacher_subjects_fullname,$this->teacher_subjects_shortname,$subjectclass_string);
		$number = 24;
		if(strlen($subjectclass_string) > $number)
		{
			$subjectclass_string = substr($subjectclass_string,0,$number)."<br>".substr($subjectclass_string,$number);
		}
		//$subjectclass_string = str_replace("|","~",$subjectclass_string);
		return $subjectclass_string;
	}

	function prepareSuggestiveSchoollist($connid)
	{
		$srcStr = "";
		$query = "SELECT * FROM school_master ORDER BY DzongkhagNameEn, schoolname";
		//echo "A".$query."<br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$srcStr .=  "\"".$row['schoolname']."(".$row["DzongkhagNameEn"].")-".$row["schoolcode"]."\",";
		}
		$srcStr = substr($srcStr,0,-1);
		return $srcStr;
	}

	function prepareSuggestiveSchoollistForschool($schoolid, $connid)
	{
		$srcStr = "";
		$query = "SELECT * FROM school_master  WHERE schoolcode=".$schoolid. " ORDER BY DzongkhagNameEn, schoolname";
		//echo "B".$query."<br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$srcStr .=  "\"".$row['schoolname']."(".$row["DzongkhagNameEn"].")-".$row["schoolcode"]."\",";
		}
		$srcStr = substr($srcStr,0,-1);
		return $srcStr;
	}
	
	function pageRetrieveDeletedTeachers($username,$usertype,$trn_editTeacher,$userTransactionRightsArray,$connid)
	{
		$this->setpostvars();
		$this->schoollist_array = $this->prepareSchoolList($connid);

		if($this->actiontoperform=="Retrieve Teacher")
		{
			$teacherids = "";
			$keys = array_keys($_POST);
			$totalkeys = count($keys);
			for($k=0; $k<$totalkeys; $k++)
			{
				if(substr($keys[$k],0,8) == "rettech_")
				{
					$teacherids .= trim(substr($keys[$k],8)).",";
				}
			}
			$teacherids = substr($teacherids,0,-1);
			//echo "<br>".$teacherids."<br>";
			if($teacherids != "")
			{
				$updateQuery = "UPDATE teacher_master_deleted SET deletedby='".$username."' WHERE teacher_id IN (".$teacherids.")";
				$dbquery = new dbquery($updateQuery,$connid);
				//echo $updateQuery."<br>";

				$insQuery = "INSERT INTO teacher_master (SELECT * FROM teacher_master_deleted WHERE teacher_id IN (".$teacherids."))";
				$dbquery = new dbquery($insQuery,$connid);
				//echo $insQuery."<br>";

				$delQuery = "DELETE FROM teacher_master_deleted WHERE teacher_id IN (".$teacherids.")";
				$dbquery = new dbquery($delQuery,$connid);
				//echo $delQuery."<br>";
			}
		}

		$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000' ><td align='center' colspan='11'><b><font color='#FFFFFF'>Deleted Teachers</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";

		$output_string .= "<td align='center'><b>Firstname</b></a></b></td>";
		$output_string .= "<td align='center'><b>lastname</b></a></b></td>";
		$output_string .= "<td align='center'><b>gender</b></a></b></td>";
		$output_string .= "<td align='center'><b>DOB</b></a></b></td>";
		$output_string .= "<td align='center'><b>School</b></a></b></td>";
		$output_string .= "<td align='center'><b>Qualification</b></td>";
		$output_string .= "<td align='center'><b>Subjects Taught</b></td>";
		$output_string .= "<td align='center'><b>Subjects Can Teach</b></td>";
		$output_string .= "<td align='center'><b>Deleted By</b></td>";
		$output_string .= "<td align='center'><b>Deleted On</b></td>";
		$output_string .= "</tr>";

		$srno=1;
		if($usertype == "School")
			$query = "SELECT * FROM teacher_master_deleted WHERE schoolcode=".$username;
		else 
			$query = "SELECT * FROM teacher_master_deleted";	
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{

			if($row['gender'] == "M") $gender = "Male";
			else $gender = "Female";

			if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
			else $ipc = "No";

			if($row['date_of_birth'] == "0000-00-00")
				$dob = "NA";
			else
				$dob = formatDate($row['date_of_birth']);

			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>";
			if($usertype == "Admin")
			{
				if(in_array($trn_editTeacher,$userTransactionRightsArray))
		  		{
		  			$output_string .= "<input type='checkbox' name='rettech_".$row['teacher_id']."'>".$srno."</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= $srno."</td>";
		  		}
			}
			elseif($usertype == "School")
			{
				if($username == $row['schoolcode'])
		  		{
		  			$output_string .= "<input type='checkbox' name='rettech_".$row['teacher_id']."'>".$srno."</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= $srno."</td>";
		  		}
			}

			$output_string .= "<td>".$row['firstname']."</td><td>".$row['lastname']."</td>";
			$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
			$output_string .= "<td nowrap>".substr($this->schoollist_array[$row['schoolcode']],0,25)."</td>";
			$output_string .= "<td>".$row['qualification']."</td>";
			$output_string .= "<td>".$this->teacher_subject_long_to_short($row['subjects_classes_taught'])."</td>";
			$output_string .= "<td>".$this->teacher_subject_long_to_short($row['subjects_classes_can_teach'])."</td>";
			$output_string .= "<td>".$row['deletedby']."</td>";
			$output_string .= "<td>".formatDate(substr($row['deletedon'],0,10)).substr($row['deletedon'],10)."</td>";
			$output_string .= "</tr>";

			$srno++;
		}

		if($srno == 1)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr>";
		}
		else
		{
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='10'><input type='button' name='Retrieve' value='Retrieve' onclick='retrieveteacher();'></td></tr>";
		}
		$output_string .= "</table>";
		return  $output_string;
	}
	
		//added by sumita 1/5/2009
	function pageRetrieveDeletedStudents($username,$usertype,$trn_editTeacher,$userTransactionRightsArray,$connid)
	{
		$this->setpostvars();
		$this->schoollist_array = $this->prepareSchoolList($connid);

		if($this->actiontoperform=="Retrieve Students")
		{
			$studentids = "";
			$keys = array_keys($_POST);
			$totalkeys = count($keys);
			for($k=0; $k<$totalkeys; $k++)
			{
				if(substr($keys[$k],0,8) == "rettech_")
				{
					$studentids .= trim(substr($keys[$k],8)).",";
				}
			}
			$studentids = substr($studentids,0,-1);
			//echo "<br>".$teacherids."<br>";
			if($studentids != "")
			{
				$updateQuery = "UPDATE student_master_deleted SET deletedby='".$username."' WHERE cts_number IN (".$studentids.")";
				$dbquery = new dbquery($updateQuery,$connid);
				//echo $updateQuery."<br>";

				$insQuery = "INSERT INTO student_master (SELECT * FROM student_master_deleted WHERE cts_number IN (".$studentids."))";
				$dbquery = new dbquery($insQuery,$connid);
				//echo $insQuery."<br>";

				$delQuery = "DELETE FROM student_master_deleted WHERE cts_number IN (".$studentids.")";
				$dbquery = new dbquery($delQuery,$connid);
				//echo $delQuery."<br>";
			}
		}

		$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000' ><td align='center' colspan='12'><b><font color='#FFFFFF'>Deleted Students</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>Firstname</b></a></b></td>";
		$output_string .= "<td align='center'><b>Lastname</b></a></b></td>";
		$output_string .= "<td align='center'><b>Gender</b></a></b></td>";
		$output_string .= "<td align='center'><b>DOB</b></a></b></td>";
		$output_string .= "<td align='center'><b>School</b></a></b></td>";
		$output_string .= "<td align='center'><b>Class</b></td>";
		$output_string .= "<td align='center'><b>Section</b></td>";
		$output_string .= "<td align='center'><b>Village</b></td>";
		$output_string .= "<td align='center'><b>Gewog</b></td>";
		$output_string .= "<td align='center'><b>Deleted By</b></td>";
		$output_string .= "<td align='center'><b>Deleted On</b></td>";
		$output_string .= "</tr>";
		$srno=1;
		if($usertype == "School")
			$query = "SELECT * FROM student_master_deleted WHERE schoolcode=".$username;
		else
			$query = "SELECT * FROM student_master_deleted";
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{

			if($row['gender'] == "M") $gender = "Male";
			else $gender = "Female";

			if($row['isphisicallychallenged'] == "Y") $ipc = "Yes";
			else $ipc = "No";

			if($row['date_of_birth'] == "0000-00-00")
				$dob = "NA";
			else
				$dob = formatDate($row['date_of_birth']);

			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>";
			if($usertype == "Admin")
			{
				if(in_array($trn_editTeacher,$userTransactionRightsArray))
		  		{
		  			$output_string .= "<input type='checkbox' name='rettech_".$row['cts_number']."'>".$srno."</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= $srno."</td>";
		  		}
			}
			elseif($usertype == "School")
			{
				if($username == $row['schoolcode'])
		  		{
		  			$output_string .= "<input type='checkbox' name='rettech_".$row['cts_number']."'>".$srno."</a></td>";
		  		}
		  		else
		  		{
		  			$output_string .= $srno."</td>";
		  		}
			}

			$output_string .= "<td>".$row['firstname']."</td><td>".$row['lastname']."</td>";
			$output_string .= "<td align='center'>".$gender."</td><td align='center' nowrap>".$dob."</td>";
			$output_string .= "<td nowrap>".substr($this->schoollist_array[$row['schoolcode']],0,25)."</td>";
			$output_string .= "<td>".$row['class']."</td>";
			$output_string .= "<td>".$row['section']."</td>";
			$output_string .= "<td>".$row['VillageNameEn']."</td>";
			$output_string .= "<td>".$row['GewogNameEn']."</td>";
			$output_string .= "<td>".$row['deletedby']."</td>";
			$output_string .= "<td>".formatDate(substr($row['deletedon'],0,10)).substr($row['deletedon'],10)."</td>";
			$output_string .= "</tr>";
			$srno++;
		}

		if($srno == 1)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>No data found...</b></font></td></tr>";
		}
		else
		{
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='12'><input type='button' name='Retrieve' value='Retrieve' onclick='retrievechild();'></td></tr>";
		}
		$output_string .= "</table>";
		return  $output_string;
	}
	//end by sumita

	function pagePromoteDemoteClass($userid,$connid)
	{
		$this->setpostvars();
		//print_r ($_POST);
		//echo "<br><br>";
		//echo $this->pdallschools." - ".$this->school." - ".$this->pddate." - ".$this->pdsatsids;
		if($this->actiontoperform=="Promote Class" || $this->actiontoperform=="Demote Class")
		{
			$entity="";
			$pdon="";
			$totaleffected = 0;
			$condition = " WHERE ";
			
			/*if($this->pdallschools!="")
			{
				$condition .= "";
				$entity = "All schools";
			}
			else*/
			
			if($this->school!="")
			{
				$condition .= "schoolcode=".$this->school." AND ";
				$entity = $this->school;
			}
			
			if($this->pdsatsids!="")
			{
				$condition .= "cts_number NOT IN (".$this->pdsatsids.") AND ";
				//$entity = $this->pdsatsids;
			}

			$classarray1=array("PP","1","2","3","4","5","6","7","8","9","10","11","12");
			$classarray2=array("1","2","3","4","5","6","7","8","9","10","11","12","EOS");
			$totalclasses = count($classarray1);
			$process="";

			if($this->actiontoperform == "Promote Class")
			{
				$process = "Promoted";
				$fromclass = $classarray1;
				$toclass = $classarray2;
				for($ci=$totalclasses-1; $ci>=0; $ci--)
				{
					$condition1="";
					if($this->pddate=="")
						$pdon = date("Y-m-d");
					else
					{
						$pdon = $this->pddate;
						$condition1 = " AND (pdon='0000-00-00' OR pdon<'".$this->pddate."')";
					}

					$upquery = "UPDATE student_master SET class='".$toclass[$ci]."', pdfromclass='".$fromclass[$ci]."',pdby='".$userid."', pdon='".$pdon."'".
					$upquery .= $condition." class='".$fromclass[$ci]."'".$condition1;
					//$dbquery = new dbquery($upquery,$connid);
					$totaleffected += $dbquery->affectedrows();
					//echo $fromclass[$ci]." - ".$toclass[$ci]."<br>".$upquery."<br>";
					$upquery = "";
				}
			}
			if($this->actiontoperform == "Demote Class")
			{
				$process = "Demoted";
				$fromclass = $classarray2;
				$toclass = $classarray1;
				for($ci=0; $ci<$totalclasses; $ci++)
				{
					$condition1="";
					if($this->pddate=="")
						$pdon = date("Y-m-d");
					else
					{
						$pdon = $this->pddate;
						$condition1 = " AND (pdon='0000-00-00' OR pdon<'".$this->pddate."')";
					}

					$upquery = "UPDATE student_master SET class='".$toclass[$ci]."', pdfromclass='".$fromclass[$ci]."',pdby='".$userid."', pdon='".$pdon."'".
					$upquery .= $condition." class='".$fromclass[$ci]."'".$condition1;
					//$dbquery = new dbquery($upquery,$connid);
					$totaleffected += $dbquery->affectedrows();
					//echo $fromclass[$ci]." - ".$toclass[$ci]."<br>".$upquery."<br>";
					$upquery = "";
				}
			}

			$inslog  = "INSERT INTO bt_classpromotedemotehistory SET entity='".$entity."', except='".$this->pdsatsids."', action='".$process."', effectivefrom='".$pdon."', actiondoneby='".$userid."'";
			$inslog .= ", totaleffected=".$totaleffected;
			//$dbquery = new dbquery($inslog,$connid);
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><font color='#FF0000'><b>Classes of ".$totaleffected." Students' ".$process." Successfully...</b></font></td></tr>";
			$output_string .= "</table>";
			return  $output_string;
			//echo $this->actiontoperform."<br>";
			//echo $condition."<br>";
		}
	}
	function fetchPromoteDemoteClassHistory($connid)
	{
		$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#bf0000' ><td align='center' colspan='11'><b><font color='#FFFFFF'>Promote/Demote Class History</font></b></td></tr>";

		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>Sr No</b></td>";
		$output_string .= "<td align='center'><b>Entity</b></a></b></td>";
		$output_string .= "<td align='center'><b>Except</b></a></b></td>";
		$output_string .= "<td align='center'><b>Action Done</b></a></b></td>";
		$output_string .= "<td align='center'><b>Effective From</b></a></b></td>";
		$output_string .= "<td align='center'><b>Action Done By</b></a></b></td>";
		$output_string .= "<td align='center'><b>Action Done On</b></a></b></td>";
		$output_string .= "<td align='center'><b>Total Students Effected</b></td>";
		$output_string .= "</tr>";

		$srno=1;
		$query = "SELECT * FROM bt_classpromotedemotehistory";
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$output_string .= "<td>".$srno."</td>";
			$output_string .= "<td>".$row['entity']."</td><td>".$row['except']."</td>";
			$output_string .= "<td>".$row['action']."</td>";
			$output_string .= "<td>".formatDate($row['effectivefrom'])."</td><td>".$row['actiondoneby']."</td>";
			$output_string .= "<td>".formatDate(substr($row['actiondoneon'],0,10)).substr($row['actiondoneon'],10)."</td>";
			$output_string .= "<td>".$row['totaleffected']."</td>";
			$output_string .= "</tr>";

			$srno++;
		}
		$output_string .= "</table><br>";
		return $output_string;
	}
	
	// Advanced Query Module - Starts Here 
	function pageAdvancedQueryInterface($username,$usertype,$trn_editChild,$trn_editTeacher,$trn_editSchool,$userTransactionRightsArray,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$this->clspaging->setpostvars();
		$output_string = "";
		
		if($this->actiontoperform == "Fetch Data" || $this->actiontoperform == "Save Expression As" || $this->actiontoperform == "Query Data")
		{
			/*echo "<pre>";
			print_r ($_POST);
			echo "</pre>";*/
			$savedqueryrow1 = array();
			$savedqueryrow2 = array();
			$fieldstaken = array('cts_number','firstname','lastname');
			$fieldstoselect = "";
			if(in_array($this->aq_field1,$this->savedqueriesforuser))
			{
				$savedqueryrow1 = $this->fetchSavedQueryDetails($username,$this->aq_field1,$connid);
				$fieldsarray = explode(",",$savedqueryrow1['selectfields']);
				for($fi=0; $fi<count($fieldsarray); $fi++)
				{
					if(!in_array($fieldsarray[$fi],$fieldstaken))
					{
						array_push($fieldstaken,$fieldsarray[$fi]);
						if($fi==count($fieldsarray)-1)
							$fieldstoselect .= $fieldsarray[$fi];
						else 
							$fieldstoselect .= $fieldsarray[$fi].",";
					}
				}
			}
			else
			{
				$fieldstoselect .= $this->aq_field1;
				if(!in_array($this->aq_field1,$fieldstaken))
				{
					array_push($fieldstaken,$this->aq_field1);
				}
			}
			
			if($this->aq_field2!="")
			{
				if(in_array($this->aq_field2,$this->savedqueriesforuser))
				{
					$savedqueryrow2 = $this->fetchSavedQueryDetails($username,$this->aq_field2,$connid);
					$fieldsarray = explode(",",$savedqueryrow2['selectfields']);
					$commaattached=0;
					for($fi=0; $fi<count($fieldsarray); $fi++)
					{
						if(!in_array($fieldsarray[$fi],$fieldstaken))
						{
							array_push($fieldstaken,$fieldsarray[$fi]);
							if($commaattached==0)
							{
								$fieldstoselect .= ",".$fieldsarray[$fi].",";
								$commaattached=1;
							}
							else 
								$fieldstoselect .= $fieldsarray[$fi].",";
						}
					}
					$fieldstoselect = substr($fieldstoselect,0,-1);
				}
				else
				{
					$fieldstoselect .= ",".$this->aq_field2;
					if(!in_array($this->aq_field2,$fieldstaken))
					{
						array_push($fieldstaken,$this->aq_field2);
					}
					
				}
			}
			
			$wherecondition = "";
			if(in_array($this->aq_field1,$this->savedqueriesforuser))
			{
				$pos1 = strpos($savedqueryrow1['whereconditions'],") AND (");
				$pos2 = strpos($savedqueryrow1['whereconditions'],") OR (");
				if($pos1!==false || $pos2!==false)
					$wherecondition .= "(".$savedqueryrow1['whereconditions'].")";
				else 
					$wherecondition .= $savedqueryrow1['whereconditions'];
			}
			else 
			{
				$keypos = array_search($this->aq_field1,$this->student_master_fields);
				if(in_array($this->student_master_fields_datatypes[$keypos],$this->numericdatatypes))
					$wherecondition .= "(".$this->aq_field1.$this->aq_condition1.$this->aq_condition1_value;
				else 
					$wherecondition .= "(".$this->aq_field1.$this->aq_condition1."'".$this->aq_condition1_value."'";	
			}
			
			
			if($this->aq_field2!="")
			{
				if(in_array($this->aq_field2,$this->savedqueriesforuser))
				{
					if(!in_array($this->aq_field1,$this->savedqueriesforuser))
						$wherecondition .= ") ".$this->andor_radio." ";	
					else 
						$wherecondition .= " ".$this->andor_radio." ";
					
					$pos1 = strpos($savedqueryrow2['whereconditions'],") AND (");
					$pos2 = strpos($savedqueryrow2['whereconditions'],") OR (");
					if($pos1!==false || $pos2!==false)
						$wherecondition .= "(".$savedqueryrow2['whereconditions'].")";
					else 
						$wherecondition .= $savedqueryrow2['whereconditions'];
				}
				else 
				{
					$keypos = array_search($this->aq_field2,$this->student_master_fields);
					$wherecondition .= " ".$this->andor_radio." ";
					if(in_array($this->aq_field1,$this->savedqueriesforuser))
						$wherecondition .= "(";
						
					if(in_array($this->student_master_fields_datatypes[$keypos],$this->numericdatatypes))
						$wherecondition .= $this->aq_field2.$this->aq_condition2.$this->aq_condition2_value.")";
					else 
						$wherecondition .= $this->aq_field2.$this->aq_condition2."'".$this->aq_condition2_value."')";
				}
			}
			else 
			{
				if(!in_array($this->aq_field1,$this->savedqueriesforuser) && !in_array($this->aq_field2,$this->savedqueriesforuser))
					$wherecondition .= ")";
			}
			
			if($this->actiontoperform == "Save Expression As")
			{
				$insquery = "INSERT INTO bt_savedadvancedqueries SET userid=\"".$username."\", aqname=\"".$this->aq_name."\",selectfields=\"".$fieldstoselect."\",";
				$insquery .= "fromtables=\"student_master\", whereconditions=\"".$wherecondition."\"";
				
				//echo $insquery."<br>";
				mysql_query($insquery,$connid) OR die("INS Query: ".$insquery." - ".mysql_error());
			}
				
			$countquery = "SELECT COUNT(*) FROM student_master WHERE ".$wherecondition;
			//echo $countquery."<br>";
			$query .= "SELECT cts_number,firstname,lastname,".$fieldstoselect." FROM student_master WHERE ".$wherecondition;
			//echo $query."<br>";
			
			$dbquery = new dbquery($countquery,$connid);
			$row = $dbquery->getrowarray();
			$this->clspaging->numofrecs = $row[0];
			if($this->clspaging->numofrecs >0)
			{
				$this->clspaging->getcurrpagevardb();
			}
			
			/*echo "<pre>";
			print_r ($fieldstaken);
			echo "</pre>";*/
			$colspan = count($fieldstaken);
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF' ><td colspan='".$colspan."' align='right'></td></tr>";
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center'><b>Sr No</b></td>";
	
			for($ci=0; $ci<count($fieldstaken);$ci++)
			{
				$output_string .= "<td align='center'>";
				if($this->clspaging->sortby==$fieldstaken[$ci] and $this->clspaging->sorttype=='ASC')
					$output_string .= "<img src=images/up_arrow.GIF border=0>&nbsp;";
				else if($this->clspaging->sortby==$fieldstaken[$ci] and $this->clspaging->sorttype=='DESC')
					$output_string .= "<img src=images/down_arrow.GIF border=0>&nbsp;";
				$output_string .= "<a href=javascript:sortby('".$fieldstaken[$ci]."','QI')><b>".ucfirst($fieldstaken[$ci])."</b></a></b></td>";
			}
			$output_string .= "</tr>";
			
			$srno=1;
			$query = $query." ORDER BY ".$this->clspaging->sortby." ".$this->clspaging->sorttype." ".$this->clspaging->limit;
			echo $query."<br><br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td>";
				for($ci=0; $ci<count($fieldstaken);$ci++)
				{
					$output_string .= "<td>".$row[$fieldstaken[$ci]]."</td>";
				}
				$output_string .= "</tr>";
				$srno++;
			}
		}
		$output_string .= "</table>";
		return  $output_string;
	}
	
	function fetchSavedQueriesForUser($userid,$connid)
	{
		$query = "SELECT * FROM bt_savedadvancedqueries WHERE userid='".$userid."'";
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			//array_push($this->savedqueriesforuser,$row['aqname']);
			$this->savedqueriesforuser[$row['aqno']] = $row['aqname'];
		}
	}
	
	function fetchSavedQueryDetails($userid,$aqname,$connid)
	{
		$query = "SELECT * FROM bt_savedadvancedqueries WHERE userid='".$userid."' AND aqname='".$aqname."'";
		//echo $query."<br><br>";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row;
	}
	
	function pageSeeSavedExpressions($userid,$connid)
	{
		$output_string  = "<table style='border-collapse: collapse' align='center' bordercolor='#333333' border='1'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='5' align='center' bgcolor='#bf0000'><b><font color='#FFFFFF'>Your Saved Expressions</font></b></td></tr>";
		$output_string .= "<tr  bordercolor='#FFFFFF' bgcolor='#ff9c00'><td><b>Sr. No.</b></td><td><b>Expression Name</b></td><td><b>Fields</b></td><td><b>Entity</b></td><td><b>Conditions</b></td></tr>";

		$userQuery = "SELECT * FROM bt_savedadvancedqueries WHERE userid='".$userid."'";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td><td>".$userRow['aqname']."</td>";
			$output_string .= "<td>".$userRow['selectfields']."</td><td>".$userRow['fromtables']."</td><td>".$userRow['whereconditions']."</td></tr>";
			$srno++;
		}
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='5'><a href='javascript:window.close()'><b>Close Window</b></a></td></tr>";
		$output_string .= "</table>";
		return $output_string;
	}
	// Advanced Query Module - Ends Here 
	
	
	// School Module Function - Starts Here
	
	function pageFetchSchoolCompetitionDetails($userid,$usertype,$connid)
	{
		$this->setpostvars();
		$schoolname = $this->fetchSchoolName($userid,$connid);
		if($this->actiontoperform=="Delete School Competition")
		{
			$delquery1 = "DELETE FROM bt_schoolcompetition_winners WHERE competitioncode=".$_POST['competitioncode'];
			$delquery2 = "DELETE FROM bt_schoolcompetition_master WHERE competitioncode=".$_POST['competitioncode'];
			
			mysql_query($delquery1) OR die($delquery1." - ".mysql_error());
			mysql_query($delquery2) OR die($delquery2." - ".mysql_error());
		}
		
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='7' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>School Competition Details</font></b></td></tr>";
		$output_string .= "<tr bgcolor='#ff9c00'><td align='center' colspan='7'><b>School Name: </b>".$schoolname." &nbsp;<b>School Code:</b> ".$userid."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='bt_addnewschoolcompetition.php'><b>Add New Competition</b></a></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' align='center'><td><b>Sr. No.</b></td><td align='center'><b>Competition Name</b></td><td align='center'><b>Description</b></td><td align='center'><b>Type</b></td><td align='center'><b>Period</b></td><td align='center'><b>Winners/Runners Up</b></td><td align='center'><b>Action</b></td></tr>";
	
		$userQuery = "SELECT * FROM bt_schoolcompetition_master WHERE schoolcode='".$userid."' ORDER BY competitioncode";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			$winnersstr = $this->fetchSchoolCompetitionWinners($userRow['competitioncode'],$userRow['isgroupcompetition'],$connid);
			
			$comptype="";
			if($userRow['isgroupcompetition']=="Y")
				$comptype = "Group";
			else 
				$comptype = "Individual";
				
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td><td>".$userRow['comp_name']."</td>";
			$output_string .= "<td>".$userRow['comp_desc']."</td><td align='center'>".$comptype."</td><td align='center'>".formatDate($userRow['comp_startdate'])."<br>to<br>".formatDate($userRow['comp_enddate'])."</td><td>".$winnersstr."</td><td align='center'><a href='javascript: editschoolcompetition(".$userRow['competitioncode'].")'>Edit</a>&nbsp;&nbsp;<a href='javascript: deleteschoolcompetition(".$userRow['competitioncode'].")'>Delete</a></td></tr>";
			$srno++;
		}
		$output_string .= "</table>";
		return $output_string;
	}
	
	function pageSchoolTimeTablePlanner($userid,$usertype,$connid)
	{
		$this->setpostvars();
		$schoolname = $this->fetchSchoolName($userid,$connid);
		
		if($this->actiontoperform=="Delete Class Time Table")
		{
			$delquery = "DELETE FROM bt_schooltimetable_classsectionwise WHERE timetablecode=".$_POST['timetablecode']." AND class='".$_POST['classes']."' AND section= '".$_POST['section']."'";
			mysql_query($delquery,$connid) OR die(mysql_error());
		}
		
		$userQuery = "SELECT * FROM bt_schooltimetable_master WHERE schoolcode='".$userid."' ORDER BY timetablecode DESC LIMIT 1";
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		$timetablecode = $userRow['timetablecode'];
		$label = "";
		$timecntr = 0;
		$istimeslotnoofMonToFri = "";
		
		if(isset($userRow['isweekdayshavesametimings']))
		{
			if($userRow['isweekdayshavesametimings']=="Y")
				$timecntr=1;
			else 
				$timecntr=2;
		}
		
		$output_string_final  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			
		$output_string_main  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string_main .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='7' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>School Timings Details</font></b></td></tr>";
		$output_string_main .= "<tr bgcolor='#ff9c00'><td align='center' colspan='7'><b>School Name: </b>".$schoolname." &nbsp;<b>School Code:</b> ".$userid."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='bt_schooltimetableplanner.php'><b>Add New Timings</b></a></td></tr>";
		
		if($timecntr==0)
			$output_string_main .= "<tr><td align='center' colspan='7'><b><font size='3' color='#FF0000'>No School Timings Details Found...</font></b></td></tr>";
		
		$output_string_main .= "</table><br>";
		
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		for($ti=1; $ti<=$timecntr; $ti++)
		{
			$periodcntr=1;
			$breakcntr=1;
			if($ti==1)
			{
				$istimeslotnoofMonToFri="Y";
				if($timecntr==1)
					$label = "School Timings From Monday to Saturday";
				else 
					$label = "School Timings From Monday to Friday";
			}
			else 
			{
				$istimeslotnoofMonToFri="N";
				$label = "School Timings For Saturday";
			}
			
			$srno=1;
			$output_string .= "<tr bgcolor='#ff9c00'><td align='center' colspan='5'><b>".$label."</b></td></tr>";
			$output_string .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Period/Break</b></td><td align='center'><b>From</b></td><td align='center'><b>To</b></td><td align='center'><b>Length<br>(In Minutes)</b></td></tr>";
			
			$userQuery = "SELECT * FROM bt_schooltimetable_timings WHERE timetablecode='".$timetablecode."' AND istimeslotnoofMonToFri='".$istimeslotnoofMonToFri."' ORDER BY timeslotno";
			$userResult = new dbquery($userQuery,$connid);
			$srno=1;
			while($userRow = $userResult->getrowarray())
			{
				$bgcolor='';
				$isperiodbreak = $userRow['istimeslotnobreak'];
				if($userRow['istimeslotnobreak']=="N")
				{
					$isperiodbreak = "Period ".$periodcntr;
					$periodcntr++;
				}
				else 
				{
					$isperiodbreak = "Break ".$breakcntr;
					$breakcntr++;
					$bgcolor="#00FF00";
				}
				$from = $userRow['timeslotno_starttime']." ".$userRow['timeslotno_starttime_ampm'];
				$to = $userRow['timeslotno_endtime']." ".$userRow['timeslotno_endtime_ampm'];
				$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'>".$isperiodbreak."</td><td align='center'>".$from."</td><td align='center'>".$to."</td><td align='center'>".$userRow['timeslotno_length']."</td></tr>";
				$srno++;
			}
		}
		if($timecntr!=0)
			$output_string .= "<tr><td align='center' colspan='5'><a href='javascript: editschooltimings(".$timetablecode.")'><b>Edit School Timings</b></a></td></tr>";
		$output_string .= "</table>";
		
		$output_string_classwise  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string_classwise .= "<tr bgcolor='#ff9c00'><td align='center' colspan='4'><b>Class wise Section wise Time Table&nbsp;&nbsp;&nbsp;<a href='javascript: addnewclasssectiontimetable(".$timetablecode.")'>Add New</a></b></td></tr>";
		$output_string_classwise .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Class</b></td><td align='center'><b>Section</b></td><td align='center'><b>Action</b></td></tr>";
		
		$userQuery = "SELECT DISTINCT class,section FROM bt_schooltimetable_classsectionwise WHERE timetablecode='".$timetablecode."' ORDER BY CAST(class as UNSIGNED), section";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			$output_string_classwise .= "<tr><td align='center'>".$srno."</td><td align='center'>".$userRow['class']."</td><td align='center'>".$userRow['section']."</td><td align='center'><a href=\"javascript: classsectiontimetable('".$timetablecode."','".$userRow['class']."','".$userRow['section']."','V');\">View</a>&nbsp;&nbsp;<a href=\"javascript: classsectiontimetable('".$timetablecode."','".$userRow['class']."','".$userRow['section']."','E');\">Edit</a>&nbsp;&nbsp;<a href=\"javascript: classsectiontimetable('".$timetablecode."','".$userRow['class']."','".$userRow['section']."','D');\">Delete</a></td></tr>";
			$srno++;
		}
		$output_string_classwise .= "<tr><td colspan=4 align='center'><a href='bt_teachertimetable.php' style='color:#'><b>View Teacher Time Table</b></a></td></tr>";
		$output_string_classwise .= "</table>";
		
		$output_string_final .= "<tr bordercolor='#FFFFFF'><td align='center' valign='top'>".$output_string."</td><td>&nbsp;&nbsp;</td><td align='center' valign='top'>".$output_string_classwise."";
		
		$output_string_final .= "</td></tr></table>";
		
		
		
		$output_string_final = $output_string_main.$output_string_final;
		
		return $output_string_final;
	}
	
	function fetchSchoolCompetitionWinners($competitioncode,$isgroupcompetition,$connid)
	{
		$winnersstr = "";
		
		if($isgroupcompetition=="Y")
		{
			$winners  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$winners .= "<tr><td align='center' colspan='4'><b>Winners</b></td>";
			$winners .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>SATS ID</b></td><td align='center'><b>Class</b></td><td align='center'><b>Name</b></td>";
			$userQuery = "SELECT a.cts_number,a.winnerrank,b.firstname,b.lastname,b.class FROM bt_schoolcompetition_winners a, student_master b WHERE a.competitioncode=".$competitioncode." AND a.cts_number=b.cts_number AND a.iswinnerorrunnersup='W' ORDER BY a.winnerrank";
			$userResult = new dbquery($userQuery,$connid);
			$srno=1;
			while($userRow = $userResult->getrowarray())
			{
				$winners .= "<tr><td align='center'>".$srno."</td><td>".$userRow['cts_number']."</td><td align='center'>".$userRow['class']."</td><td>".$userRow['firstname']." ".$userRow['lastname']."</td>";
				$srno++;
			}
			$winners .= "</table>";	
			
			$runnersup  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$runnersup .= "<tr><td align='center' colspan='4'><b>Runners Up</b></td>";
			$runnersup .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>SATS ID</b></td><td align='center'><b>Class</b></td><td align='center'><b>Name</b></td>";
			$userQuery = "SELECT a.cts_number,a.winnerrank,b.firstname,b.lastname,b.class FROM bt_schoolcompetition_winners a, student_master b WHERE a.competitioncode=".$competitioncode." AND a.cts_number=b.cts_number AND a.iswinnerorrunnersup='R' ORDER BY a.winnerrank";
			$userResult = new dbquery($userQuery,$connid);
			$srno=1;
			while($userRow = $userResult->getrowarray())
			{
				$runnersup .= "<tr><td align='center'>".$srno."</td><td>".$userRow['cts_number']."</td><td align='center'>".$userRow['class']."</td><td>".$userRow['firstname']." ".$userRow['lastname']."</td>";
				$srno++;
			}
			$runnersup .= "</table>";	
			
			$winnersstr  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$winnersstr .= "<tr><td align='center'>".$winners."</td><td align='center'>".$runnersup."</td></tr>";
			$winnersstr .= "<tr><td align='center' colspan='2'><a href='javascript: showotherparticipants(".$competitioncode.")'><b>Show other participants</b></a></td></tr>";
			$winnersstr .= "</table>";
			
		}
		else 
		{
			$winnersstr  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$winnersstr .= "<tr><td align='center'><b>Rank</b></td><td align='center'><b>SATS ID</b></td><td align='center'><b>Class</b></td><td align='center'><b>Name</b></td>";
			$userQuery = "SELECT a.cts_number,a.winnerrank,b.firstname,b.lastname,b.class FROM bt_schoolcompetition_winners a, student_master b WHERE a.competitioncode=".$competitioncode."  AND a.iswinnerorrunnersup IN ('W','R') AND a.cts_number=b.cts_number ORDER BY a.winnerrank";
			$userResult = new dbquery($userQuery,$connid);
			while($userRow = $userResult->getrowarray())
			{
				$winnersstr .= "<tr><td align='center'>".$userRow['winnerrank']."</td><td>".$userRow['cts_number']."</td><td align='center'>".$userRow['class']."</td><td>".$userRow['firstname']." ".$userRow['lastname']."</td>";
			}
			$winnersstr .= "<tr><td align='center' colspan='4'><a href='javascript: showotherparticipants(".$competitioncode.")'><b>Show other participants</b></a></td></tr>";
			$winnersstr .= "</table>";
		}
		return $winnersstr;
		
	}
	
	function fetchSchoolCompetition_OtherParticipants($userid,$usertype,$competitioncode,$connid)
	{
		$winners  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$userQuery = "SELECT a.cts_number,winnerrank,firstname,lastname,class FROM bt_schoolcompetition_winners a, student_master b WHERE a.competitioncode=".$competitioncode." AND a.cts_number=b.cts_number AND a.iswinnerorrunnersup='P' ORDER BY CAST(class as UNSIGNED), section";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		if($userResult->numrows()==0)
		{
			$winners .= "<tr><td align='center' colspan='4'><b><font color='#FF0000'>No participants data found for this competition.</font></b></td></tr>";
		}
		else 
		{
			$winners .= "<tr bgcolor='#ff9c00'><td align='center' colspan='4'><b>Competition Participants Except Winners/Runners Up</b></td>";
			$winners .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>SATS ID</b></td><td align='center'><b>Class</b></td><td align='center'><b>Name</b></td>";
			while($userRow = $userResult->getrowarray())
			{
				$winners .= "<tr><td align='center'>".$srno."</td><td>".$userRow['cts_number']."</td><td align='center'>".$userRow['class']."</td><td>".$userRow['firstname']." ".$userRow['lastname']."</td>";
				$srno++;
			}
		}
		$winners .= "<tr><td align='center' colspan='4'><a href='javascript:window.close()'><b>Close Window</b></a></td></tr>";
		$winners .= "</table>";	
		return $winners;
	}
	
	function pageAddSchoolCompetition($userid,$usertype,$connid)
	{
		$this->setpostvars();
		
		if($this->actiontoperform=="Add Competition")
		{
			$insquery  = "INSERT INTO bt_schoolcompetition_master SET schoolcode=".$userid.",comp_name='".$_POST['compname']."',comp_desc='".$_POST['compdesc']."',";
			$insquery .= "comp_startdate='".formatDate($_POST['compstartdate'])."',	comp_enddate='".formatDate($_POST['compenddate'])."',isgroupcompetition='".$_POST['comptype']."',";
			$insquery .= "totalparticipants=".$_POST['totalparticipants'].","; 
			
			if($_POST['comptype']=="Y")
				$insquery .= "totalwinners=".$_POST['totalwinners'].",totalrunnersup=".$_POST['totalrunnersup'];
			else
				$insquery .= "totalwinners=1,totalrunnersup=2"; 
			
			mysql_query($insquery) OR die($insquery." - ".mysql_error());
			$competitioncode = mysql_insert_id();
				
			return $competitioncode;
		}
		else if($this->actiontoperform=="Edit Competition")
		{
			$upquery  = "UPDATE bt_schoolcompetition_master SET schoolcode=".$userid.",comp_name='".$_POST['compname']."',comp_desc='".$_POST['compdesc']."',";
			$upquery .= "comp_startdate='".formatDate($_POST['compstartdate'])."', comp_enddate='".formatDate($_POST['compenddate'])."',isgroupcompetition='".$_POST['comptype']."',";
			$upquery .= "totalparticipants=".$_POST['totalparticipants'].","; 
			
			if($_POST['comptype']=="Y")
				$upquery .= "totalwinners=".$_POST['totalwinners'].",totalrunnersup=".$_POST['totalrunnersup'];
			else
				$upquery .= "totalwinners=1,totalrunnersup=2"; 
			
			$upquery .= " WHERE competitioncode=".$_POST['competitioncode'];
			mysql_query($upquery) OR die($upquery." - ".mysql_error());
			
			$delquery1 = "DELETE FROM bt_schoolcompetition_winners WHERE competitioncode=".$_POST['competitioncode'];
			mysql_query($delquery1) OR die($delquery1." - ".mysql_error());
			
			return $_POST['competitioncode'];
		}
		else if($this->actiontoperform=="Add Competition Winners")
		{
			$competitiondetails = $this->fetchCompetitionDetails($_POST['competitioncode'],$connid);
			$competitioncode = $competitiondetails['competitioncode'];
			
			/*echo "<pre>";
			print_r ($_POST);
			print_r ($competitiondetails);
			echo "</pre>";*/
			//exit;
			
			if($competitiondetails['isgroupcompetition']=="Y")
			{
				// Add winners group - starts here
				$insquery = "INSERT INTO bt_schoolcompetition_winners (competitioncode,winnerrank,iswinnerorrunnersup,cts_number) VALUES ";
				for($rankno=1; $rankno<=$competitiondetails['totalwinners']; $rankno++)
				{
					$cts_number_rank = 'cts_number'.$rankno;
					$iswinnerorrunnersup="W";
						
					$insquery .= "(".$competitioncode.",".$rankno.",'".$iswinnerorrunnersup."',".$_POST[$cts_number_rank]."),";
				}
				$insquery = substr($insquery,0,-1);
				mysql_query($insquery) OR die($insquery." - ".mysql_error());
				// Add winners group - ends here
				
				// Add runners up group - starts here
				$insquery = "INSERT INTO bt_schoolcompetition_winners (competitioncode,winnerrank,iswinnerorrunnersup,cts_number) VALUES ";
				for($pi=1; $pi<=$competitiondetails['totalrunnersup']; $pi++)
				{
					$cts_number_rank = 'cts_number'.$rankno;
					$iswinnerorrunnersup="R";
						
					$insquery .= "(".$competitioncode.",".$rankno.",'".$iswinnerorrunnersup."',".$_POST[$cts_number_rank]."),";
					$rankno++;
				}
				$insquery = substr($insquery,0,-1);
				mysql_query($insquery) OR die($insquery." - ".mysql_error());
				
				// Add participants except winners and runners up - starts here
				$insquery = "INSERT INTO bt_schoolcompetition_winners (competitioncode,winnerrank,iswinnerorrunnersup,cts_number) VALUES ";
				for($rankno_new=$rankno; $rankno_new<=$competitiondetails['totalparticipants']; $rankno_new++)
				{
					$cts_number_rank = 'cts_number'.$rankno_new;
					$iswinnerorrunnersup="P";
					$insquery .= "(".$competitioncode.",".$rankno_new.",'".$iswinnerorrunnersup."',".$_POST[$cts_number_rank]."),";
				}
				
				$insquery = substr($insquery,0,-1);
				mysql_query($insquery) OR die($insquery." - ".mysql_error());
				// Add runners up group - ends here
			}
			else 
			{
				$insquery = "INSERT INTO bt_schoolcompetition_winners (competitioncode,winnerrank,iswinnerorrunnersup,cts_number) VALUES ";
				for($rankno=1; $rankno<=3; $rankno++)
				{
					$iswinnerorrunnersup="";
					$cts_number_rank = 'cts_number'.$rankno;
					if($rankno==1)
						$iswinnerorrunnersup="W";
					else 
						$iswinnerorrunnersup="R";
						
					$insquery .= "(".$competitioncode.",".$rankno.",'".$iswinnerorrunnersup."',".$_POST[$cts_number_rank]."),";
				}
				
				for($rankno_new=$rankno; $rankno_new<=$competitiondetails['totalparticipants']; $rankno_new++)
				{
					$cts_number_rank = 'cts_number'.$rankno_new;
					$iswinnerorrunnersup="P";
					$insquery .= "(".$competitioncode.",".$rankno_new.",'".$iswinnerorrunnersup."',".$_POST[$cts_number_rank]."),";
				}
				
				$insquery = substr($insquery,0,-1);
				mysql_query($insquery) OR die($insquery." - ".mysql_error());
			}
			$redirecturl = "bt_schoolcompetitiondetails.php";
			echo "<script>window.location='".$redirecturl."';</script>";
		}	
	}
	
	function pageAddSchoolTestDetails($userid,$usertype,$connid)
	{
		$this->setpostvars();
		
		if($this->actiontoperform=="Add School Test")
		{
			$insquery  = "INSERT INTO bt_schooltest_master SET schoolcode=".$userid.",test_year='".$_POST['test_year']."', test_name='".$_POST['test_name']."',test_desc='".$_POST['test_desc']."',";
			$insquery .= "test_startdate='".formatDate($_POST['test_startdate'])."', test_enddate='".formatDate($_POST['test_enddate'])."'";
			mysql_query($insquery) OR die($insquery." - ".mysql_error());
			$redirecturl = "bt_uploadschooltestdata.php";
			echo "<script>window.location='".$redirecturl."';</script>";
		}
		else if($this->actiontoperform=="Edit School Test")
		{
			$upquery  = "UPDATE bt_schooltest_master SET schoolcode=".$userid.", test_year='".$_POST['test_year']."', test_name='".$_POST['test_name']."',test_desc='".$_POST['test_desc']."',";
			$upquery .= "test_startdate='".formatDate($_POST['test_startdate'])."',	test_enddate='".formatDate($_POST['test_enddate'])."'";
			$upquery .= " WHERE testcode=".$_POST['testcode'];
			mysql_query($upquery) OR die($upquery." - ".mysql_error());
			$redirecturl = "bt_uploadschooltestdata.php";
			echo "<script>window.location='".$redirecturl."';</script>";
		}
	}
	
	function fetchCompetitionDetails($competitioncode,$connid)
	{
		$competitiondetails = array();
		$userQuery = "SELECT * FROM bt_schoolcompetition_master WHERE competitioncode=".$competitioncode;
		$userResult = mysql_query($userQuery,$connid) OR die($userQuery." - ".mysql_error());;
		$userRow = mysql_fetch_array($userResult);
		foreach ($userRow as $key=>$value)
		{
			if(is_numeric($key))
				continue;
			$competitiondetails[$key]=$value;
		}
		return $competitiondetails;
	}
	
	function fetchTestDetails($testcode,$connid)
	{
		$testdetails = array();
		$userQuery = "SELECT * FROM bt_schooltest_master WHERE testcode=".$testcode;
		$userResult = mysql_query($userQuery,$connid) OR die($userQuery." - ".mysql_error());;
		$userRow = mysql_fetch_array($userResult);
		foreach ($userRow as $key=>$value)
		{
			if(is_numeric($key))
				continue;
			$testdetails[$key]=$value;
		}
		return $testdetails;
	}

	function fetchTestPaperDetails($testpapercode,$connid)
	{
		$testpaperdetails = array();
		$userQuery = "SELECT * FROM bt_schooltest_paperdetails WHERE testpapercode=".$testpapercode;
		$userResult = mysql_query($userQuery,$connid) OR die($userQuery." - ".mysql_error());;
		$userRow = mysql_fetch_array($userResult);
		foreach ($userRow as $key=>$value)
		{
			if(is_numeric($key))
				continue;
			$testpaperdetails[$key]=$value;
		}
		return $testpaperdetails;
	}
	
	function editestPaper($userid,$usertype,$connid)
	{
		$this->setpostvars();
		if($this->actiontoperform=="Update Max Marks")
		{
			$upquery = "UPDATE bt_schooltest_paperdetails SET maxmarks=".$_POST['maxmarks'].", testpaperdate='".formatDate($_POST['testpaperdate'])."' WHERE testpapercode=".$_POST['testpapercode'];
			mysql_query($upquery) OR die($upquery." - ".mysql_error());
			
			echo "<script>opener.location.reload(true);window.close();</script>";
			exit();
		}
	}
	
	function pageFetchSchoolTestDetails($userid,$usertype,$connid)
	{
		$this->setpostvars();
		$schoolname = $this->fetchSchoolName($userid,$connid);
		if($this->actiontoperform=="Delete School Test")
		{
			$delquery1 = "DELETE FROM bt_schooltest_data WHERE testcode=".$_POST['testcode'];
			$delquery2 = "DELETE FROM bt_schooltest_paperdetails WHERE testcode=".$_POST['testcode'];
			$delquery3 = "DELETE FROM bt_schooltest_master WHERE testcode=".$_POST['testcode'];
			
			/*echo $delquery1."<br>";
			echo $delquery2."<br>";
			echo $delquery3."<br>";*/
			
			mysql_query($delquery1) OR die($delquery1." - ".mysql_error());
			mysql_query($delquery2) OR die($delquery2." - ".mysql_error());
			mysql_query($delquery3) OR die($delquery3." - ".mysql_error());
		}
		
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='6' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>School Test Details</font></b></td></tr>";
		$output_string .= "<tr bgcolor='#ff9c00'><td align='center' colspan='6'><b>School Name: </b>".$schoolname." &nbsp;<b>School Code:</b> ".$userid."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='bt_addnewschooltest.php'><b>Add New School Test</b></a></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' align='center'><td><b>Sr. No.</b></td><td align='center'><b>Year</b><td align='center'><b>Test Name</b></td><td align='center'><b>Description</b></td><td align='center'><b>Period</b></td><td align='center'><b>Action</b></td></tr>";
	
		$userQuery = "SELECT * FROM bt_schooltest_master WHERE schoolcode='".$userid."' ORDER BY test_startdate";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td><td>".$userRow['test_year']."</td><td>".$userRow['test_name']."</td>";
			$output_string .= "<td>".$userRow['test_desc']."</td><td align='center'>".formatDate($userRow['test_startdate'])."<br>to<br>".formatDate($userRow['test_enddate'])."</td>";
			$output_string .= "<td align='center'><a href='javascript: editschooltest(".$userRow['testcode'].")'>Edit Test</a>&nbsp;&nbsp;<a href='javascript: deleteschooltest(".$userRow['testcode'].")'>Delete Test</a>&nbsp;&nbsp;";
			$output_string .= "<a href='javascript: viewschooltesttimetable(".$userRow['testcode'].")'>View Test Time Table</a>&nbsp;&nbsp;<a href='javascript: uploadschooltest(".$userRow['testcode'].")'>Upload Test Data</a></td></tr>";
			$srno++;
		}
		$output_string .= "</table>";
		return $output_string;
	}
	
	function pageFetchSchoolTestDetails_step2($userid,$usertype,$connid)
	{
		$output_string = "";
		$this->setpostvars();
		$schoolname = $this->fetchSchoolName($userid,$connid);
		
		if($this->actiontoperform=="Save Paper Details")
		{
			$class = "selclass";
			for($ln=1; $ln<=8; $ln++)
			{
				$subject = "subject_".$ln;
				$maxmarks = "maxmarks_".$ln;
				$testpaperdate = "testpaperdate_".$ln;
				if(isset($_POST[$subject]) && $_POST[$subject]!="")
				{
					$cntquery = "SELECT * FROM bt_schooltest_paperdetails WHERE testcode=".$_POST['testcode']." AND class='".$_POST[$class]."' AND subject='".$_POST[$subject]."'";
					$cntresult = mysql_query($cntquery) OR die($cntquery." - ".mysql_error());
					if(mysql_num_rows($cntresult)!=0)
					{
						$cntrow = mysql_fetch_array($cntresult);
						$upquery = "UPDATE bt_schooltest_paperdetails SET maxmarks=".$_POST[$maxmarks].", testpaperdate='".formatDate($_POST[$testpaperdate])."' WHERE testpapercode=".$cntrow['testpapercode'];
						mysql_query($upquery) OR die($upquery." - ".mysql_error());
						$testpapercode = $cntrow['testpapercode'];
						array_push($this->schooltest_insertedpaperids, $testpapercode);
						
						$delquery2 = "DELETE FROM bt_schooltest_data WHERE testpapercode=".$testpapercode;
						mysql_query($delquery2) OR die($delquery2." - ".mysql_error());
						
					}
					else 
					{
						$insquery = "INSERT INTO bt_schooltest_paperdetails SET testcode=".$_POST['testcode'].", class='".$_POST[$class]."', subject='".$_POST[$subject]."', maxmarks=".$_POST[$maxmarks].", testpaperdate='".formatDate($_POST[$testpaperdate])."'";
						mysql_query($insquery) OR die($insquery." - ".mysql_error());
						$testpapercode = mysql_insert_id();
						array_push($this->schooltest_insertedpaperids, $testpapercode);
					}
				}
			}
		}
		
		if($this->actiontoperform=="Save Test Result")
		{
			$testcode = $_POST['testcode'];
			$satsidstr = $_POST['satsidsstr'];
			$testpapercodestr = $_POST['testpaercodestr'];
			$testpapercodestr_new = str_replace("-",",",$testpapercodestr);
			
			$satsidsarray = explode("-",$satsidstr);
			$testpapercodearray = explode("-",$testpapercodestr);
			
			$delquery1 = "DELETE FROM bt_schooltest_data WHERE testcode=".$_POST['testcode']." AND testpapercode IN (".$testpapercodestr_new.")";
			//echo $delquery1."<br>";
			mysql_query($delquery1) OR die($delquery1." - ".mysql_error());
			
			
			$insquery = "INSERT INTO bt_schooltest_data (testcode, testpapercode, cts_number, obtainedmarks) VALUES ";
			for($si=0; $si<count($satsidsarray); $si++)
			{
				for($pi=0; $pi<count($testpapercodearray); $pi++)
				{
					$obtmarks = "obt_".$satsidsarray[$si]."_".$testpapercodearray[$pi];
					if($_POST[$obtmarks]=="A" || $_POST[$obtmarks]=="a")
						$obtvalues = 999;
					else 
						$obtvalues = $_POST[$obtmarks];
					$insquery .= "(".$testcode.",".$testpapercodearray[$pi].",".$satsidsarray[$si].",".$obtvalues."),";
				}	
			}
			$insquery = substr($insquery,0,-1);
			mysql_query($insquery) OR die($insquery." - ".mysql_error());
			$redirecturl = "bt_uploadschooltestdata_step1.php?testcode=".$testcode;
			echo "<script>window.location='".$redirecturl."';</script>";
		}
		
		$userQuery = "SELECT * FROM bt_schooltest_master WHERE testcode=".$_POST['testcode'];
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>School Test Details</font></b></td></tr>";
		$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>School Name: </b>".$schoolname." &nbsp;<b>School Code:</b> ".$userid."</td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' align='center'><td align='center'><b>Year: </b>".$userRow['test_year']."&nbsp;&nbsp;<b>Test Name: </b>".$userRow['test_name']."&nbsp;&nbsp;<b>Description: </b>".$userRow['test_desc']."&nbsp;&nbsp;<b>Start Date: </b>".formatDate($userRow['test_startdate'])."&nbsp;&nbsp;<b>End Date: </b>".formatDate($userRow['test_enddate'])."</td></tr>";
		$output_string .= "</table><br>";
		
		return $output_string;
	}
		
	function pageFetchSchoolTestDetails_step1($userid,$usertype,$connid)
	{
		$output_string_final = "";
		$this->setpostvars();
		$schoolname = $this->fetchSchoolName($userid,$connid);
		
		if($this->actiontoperform=="Delete Test Paper")
		{
			$delquery1 = "DELETE FROM bt_schooltest_data WHERE testpapercode=".$_POST['testpapercode'];
			$delquery2 = "DELETE FROM bt_schooltest_paperdetails WHERE testpapercode=".$_POST['testpapercode'];
			
			mysql_query($delquery1) OR die($delquery1." - ".mysql_error());
			mysql_query($delquery2) OR die($delquery2." - ".mysql_error());
		}
		
		$userQuery = "SELECT * FROM bt_schooltest_master WHERE testcode=".$_POST['testcode'];
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>School Test Details</font></b></td></tr>";
		$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>School Name: </b>".$schoolname." &nbsp;<b>School Code:</b> ".$userid."</td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' align='center'><td align='center'><b>Year: </b>".$userRow['test_year']."&nbsp;&nbsp;<b>Test Name: </b>".$userRow['test_name']."&nbsp;&nbsp;<b>Description: </b>".$userRow['test_desc']."&nbsp;&nbsp;<b>Start Date: </b>".formatDate($userRow['test_startdate'])."&nbsp;&nbsp;<b>End Date: </b>".formatDate($userRow['test_enddate'])."</td></tr>";
		$output_string .= "</table><br>";
		$output_string_final = $output_string;
		
		// ---------------- Details of uploaded test data -----------//
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='8' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>Paper wise Details of Uploaded Test Data</font></b></td></tr>";
		$output_string .= "<tr bgcolor='#ff9c00' align='center'><td><b>Sr. No.</b></td><td align='center'><b>Class</b><td align='center'><b>Subject</b></td><td align='center'><b>Test Date</b></td><td align='center'><b>Max Marks</b></td><td align='center'><b>Data uploaded for<br>Students</b></td><td align='center'><b>Total Students</b></td><td align='center'><b>Action</b></td></tr>";
	
		$userQuery = "SELECT * FROM bt_schooltest_paperdetails WHERE testcode=".$_POST['testcode']." ORDER BY CAST(class as UNSIGNED), testpaperdate";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			$testpaperdate="";
			if($userRow['testpaperdate']!="0000-00-00")
				$testpaperdate = formatDate($userRow['testpaperdate']);
			$totalstudentsinclass = $this->fetchTotalStudentsInSchoolClass($userid,$userRow['class'],$connid);
			$datauploadedfor = $this->fetchTotalStudentsForWhomDataUploaded($userRow['testpapercode'],$connid);
			$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$userRow['class']."</td><td>".$userRow['subject']."</td>";
			$output_string .= "<td align='center'>".$testpaperdate."</td><td align='center'>".$userRow['maxmarks']."</td><td align='center'>".$datauploadedfor."</td><td align='center'>".$totalstudentsinclass."</td>";
			$output_string .= "<td align='center'><a href='javascript: edittestpaper(".$userRow['testcode'].",".$userRow['testpapercode'].")'>Edit</a>&nbsp;&nbsp;<a href='javascript: deletetestpaper(".$userRow['testpapercode'].")'>Delete</a></td></tr>";
			$srno++;
		}
		if($srno!=1)
			$output_string .= "<tr><td colspan='8' align='center'><b><a href='javascript: edittestdata();'>View/Edit Uploaded Test Data</a></b></td></tr>";
		$output_string .= "</table>";
		
		$output_string_final .= $output_string;
		return $output_string_final;
	}
	
	function fetchUploadedTestData($testcode,$connid)
	{
		$uploadedtestdata = array();
		$userQuery = "SELECT * FROM bt_schooltest_data WHERE testcode=".$_POST['testcode'];
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$uploadedtestdata[$userRow['testpapercode']][$userRow['cts_number']] = $userRow['obtainedmarks'];
		}
		
		$userQuery = "SELECT testpapercode FROM bt_schooltest_paperdetails WHERE testcode=".$_POST['testcode'];
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			if(!in_array($userRow['testpapercode'],$this->schooltest_insertedpaperids))
				array_push($this->schooltest_insertedpaperids, $userRow['testpapercode']);
		}
		return $uploadedtestdata;
	}
	
	function pageViewSchoolTestTimeTable($userid,$usertype,$connid)
	{
		$output_string_final = "";
		$this->setpostvars();
		$schoolname = $this->fetchSchoolName($userid,$connid);
		
		$userQuery = "SELECT * FROM bt_schooltest_master WHERE testcode=".$_POST['testcode'];
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>School Test Details</font></b></td></tr>";
		$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>School Name: </b>".$schoolname." &nbsp;<b>School Code:</b> ".$userid."</td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF' align='center'><td align='center'><b>Year: </b>".$userRow['test_year']."&nbsp;&nbsp;<b>Test Name: </b>".$userRow['test_name']."&nbsp;&nbsp;<b>Description: </b>".$userRow['test_desc']."&nbsp;&nbsp;<b>Start Date: </b>".formatDate($userRow['test_startdate'])."&nbsp;&nbsp;<b>End Date: </b>".formatDate($userRow['test_enddate'])."</td></tr>";
		$output_string .= "</table><br>";
		$output_string_final = $output_string;
		
		// ---------------- Details of uploaded test data -----------//
		$output_string  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='6' bgcolor='#bf0000'><b><font size='4' color='#FFFFFF'>School Test Time Table</font></b></td></tr>";
		
		$preclass = "";
		$userQuery = "SELECT * FROM bt_schooltest_paperdetails WHERE testcode=".$_POST['testcode']." ORDER BY CAST(class as UNSIGNED), testpaperdate";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			if($preclass=="")
			{
				$preclass = $userRow['class'];
				$output_string .= "<tr bgcolor='#ff9c00' align='center'><td colspan='6'><b>Class ".$userRow['class']."</b></td></tr>";
				$output_string .= "<tr align='center'><td><b>Sr. No.</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Test Date</b></td><td align='center'><b>Max Marks</b></td><td align='center'><b>Test data uploaded?</b></td></tr>";
			}
				
			if($preclass != $userRow['class'])
			{
				$preclass = $userRow['class'];
				$output_string .= "<tr bgcolor='#ff9c00' align='center'><td colspan='6'><b>Class ".$userRow['class']."</b></td></tr>";
				$output_string .= "<tr align='center'><td><b>Sr. No.</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Test Date</b></td><td align='center'><b>Max Marks</b></td><td align='center'><b>Is data uploaded?</b></td></tr>";
			}
			$testpaperdate="";
			if($userRow['testpaperdate']!="0000-00-00")
				$testpaperdate = formatDate($userRow['testpaperdate']);
			
			$totalstudentsinclass = $this->fetchTotalStudentsInSchoolClass($userid,$userRow['class'],$connid);
			$datauploadedfor = $this->fetchTotalStudentsForWhomDataUploaded($userRow['testpapercode'],$connid);
			
			$istestdatauploaded = "No";
			$bgcolor = "#FF0000";
			if($datauploadedfor==$totalstudentsinclass)
			{
				$istestdatauploaded = "Yes";
				$bgcolor = "#00FF00";
			}
			
			//<td align='center'>".$userRow['class']."</td>
			$output_string .= "<tr><td align='center'>".$srno."</td><td>".$userRow['subject']."</td>";
			$output_string .= "<td align='center'>".$testpaperdate."</td><td align='center'>".$userRow['maxmarks']."</td><td align='center' bgcolor='".$bgcolor."'>".$istestdatauploaded."</td></tr>";
			$srno++;
		}
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='6'><a href='javascript:window.close()'><b>Close Window</b></a></td></tr>";
		$output_string .= "</table>";
		
		$output_string_final .= $output_string;
		return $output_string_final;
	}
	
	function fetchTotalStudentsInSchoolClass($schoolcode,$class,$connid)
	{
		$totalstudentsinclass = 0;
		$userQuery = "SELECT COUNT(*) FROM student_master WHERE schoolcode=".$schoolcode." AND class='".$class."'";
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		return $userRow['COUNT(*)'];
	}
	
	function fetchTotalStudentsForWhomDataUploaded($testpapercode,$connid)
	{
		$totalstudentsinclass = 0;
		$userQuery = "SELECT COUNT(*) FROM bt_schooltest_data WHERE testpapercode=".$testpapercode;
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		return $userRow['COUNT(*)'];
	}
	
	function fetchSchoolTestStudentList($schoolcode,$schooltestclass,$connid)
	{
		$studentlist = array();
		$userQuery = "SELECT cts_number,firstname,lastname,date_of_birth,section,reportcard_comments FROM student_master WHERE schoolcode=".$schoolcode." AND class='".$schooltestclass."' ORDER BY section";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$reportcard_comments_array = explode("**",$userRow['reportcard_comments']);
			$totalcomments = count($reportcard_comments_array);
			$lastcommentsdate = $reportcard_comments_array[$totalcomments-1];
			$lastcommentsdate = str_replace("(","",$lastcommentsdate);
			$lastcommentsdate = str_replace(")","",$lastcommentsdate);
			$lastcommentsdate_array = explode(":",$lastcommentsdate);
			
			$stuname = $userRow['firstname']." ".$userRow['lastname'];
			$studentlist[$userRow['cts_number']] = $stuname."**".formatDate($userRow['date_of_birth'])."**".$userRow['section']."**".$lastcommentsdate_array[0]; 
		}
		return $studentlist;
	}
	
	function fetchSchoolTestStudentDetails($satsid,$connid)
	{
		$studentlist = array();
		$userQuery = "SELECT cts_number,firstname,lastname,date_of_birth,section,reportcard_comments FROM student_master WHERE cts_number=".$satsid;
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$stuname = $userRow['firstname']." ".$userRow['lastname'];
			$studentlist[$userRow['cts_number']] = $stuname."**".formatDate($userRow['date_of_birth'])."**".$userRow['section']; 
			$this->student_reportcardcomments_old = str_replace("**","<br>",$userRow['reportcard_comments']);
		}
		return $studentlist;
	}
	
	function pageExtraCurricularActivities_Students($userid,$usertype,$connid)
	{
		$output_string = "";
		$schoolcode = $userid;
		$this->setpostvars();
		if($this->actiontoperform=="Extra Curricular Activity Students")
		{
			$ecaname = $this->fetchECAName($_POST['seleca'],$connid);
			
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center' colspan='6'><b>List of Students Interested In ".$ecaname."</b></td></tr>";
			$output_string .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>SATS ID</b></td>";
			$output_string .= "<td align='center'><b>Name</b></td><td align='center'><b>Class</b></td><td align='center'><b>Section</b></td><td align='center'><b>Date of Birth</b></td></tr>";
			
			$srno=1;
			$selquery = "SELECT a.cts_number,firstname, lastname, date_of_birth, class, section FROM student_master a, bt_extracurricularactivities_students b";
			$selquery .= " WHERE a.cts_number=b.cts_number AND b.ecacode=".$_POST['seleca']." ORDER BY CAST(class as UNSIGNED), section";
			$userResult = new dbquery($selquery,$connid);
			while($userRow = $userResult->getrowarray())
			{
				$dob = "";
				if($userRow['date_of_birth']!="0000-00-00")
					$dob = formatDate($userRow['date_of_birth']);
					
				$name = $userRow['firstname']." ".$userRow['lastname'];
				$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$userRow['cts_number']."</td><td>".$name."</td>";
				$output_string .= "<td align='center'>".$userRow['class']."</td><td align='center'>".$userRow['section']."</td><td align='center'>".$dob."</td></tr>";
				$srno++;
			}
		}
		$output_string .= "<table>";
		return $output_string;
	}
	
	function fetchECAName($ecacode,$connid)
	{
		$userQuery = "SELECT * FROM bt_extracurricularactivities WHERE ecacode=".$ecacode;
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		return $userRow['ecaname'];
	}
	
	function pageExtraCurricularActivities($userid,$usertype,$connid)
	{
		$schoolcode = $userid;
		$this->setpostvars();
		if($this->actiontoperform=="Save Extra Curricular Activities")
		{
			$ecakeys = array_keys($_POST);
			for($ki=0; $ki<count($ecakeys); $ki++)
			{
				$ecatokens = explode("_",$ecakeys[$ki]);
				if($ecatokens[0]=="eca")
				{
					$insquery = "INSERT IGNORE INTO bt_extracurricularactivities_students SET cts_number=".$ecatokens[1].", ecacode=".$ecatokens[2];
					mysql_query($insquery) OR die($insquery." - ".mysql_error());
					//echo $insquery."<br>";
				}
			}
			$this->actiontoperform="Extra Curricular Activities";
		}
		
		if($this->actiontoperform=="Extra Curricular Activities")
		{
			$noofrows = 1;
			$ecaarray = $this->fetchECA($connid);
			$ecatosudentmapping = $this->fetchECAToStudentMapping($connid);
			$maxecaperline = ceil((count($ecaarray)/$noofrows));
			//$comparray = $this->fetchSchoolCompetition($schoolcode,$connid);
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td><td align='center'><b>SATS ID</b></td>";
			$output_string .= "<td align='center'><b>Name</b></td><td align='center'><b>Section</b></td><td align='center'><b>Date of Birth</b></td><td align='center'><b>Extra Curricular<br>Activities</b></td></tr>";
			$studentlist = $this->fetchSchoolTestStudentList($schoolcode,$_POST['selclass'],$connid);
			$srno=1;
			foreach ($studentlist as $key => $value)
			{
				$namedobsection = explode("**",$value);
				if($namedobsection[1]=="00-00-0000")
					$namedobsection[1]="";
					
				$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$key."</td>";
				$output_string .= "<td>".$namedobsection[0]."</td><td align='center'>".$namedobsection[2]."</td><td align='center'>".$namedobsection[1]."</td>";
				$output_string .= "<td>";
				
				$ecachecks = "<table style='border-collapse: collapse' align='center'>";
				for($cai=1; $cai<=count($ecaarray); $cai++)
				{
					$ecasel = "eca_".$key."_".$cai;
					if($cai==1)
						$ecachecks .= "<tr>";
						
					$checked = "";
					if(isset($ecatosudentmapping[$cai][$key]) && $ecatosudentmapping[$cai][$key]==1)
						$checked = "checked";
					$ecachecks .= "<td><input type='checkbox' name='".$ecasel."' $checked>".$ecaarray[$cai]."</td>";
					if($cai%$maxecaperline==0)
						$ecachecks .= "</tr><tr>";
				}
				$cai--;
				if($cai%$maxecaperline!=0)
					$ecachecks .= "</tr>";
				
				$ecachecks .= "</table>";
				$output_string .= $ecachecks;
				$output_string .= "</td></tr>";
				$srno++;
			}
			$output_string .= "<tr><td colspan='6' align='center'><input type='button' name='Save' value='Save' onclick='saveextracurricularactivities();'></td></tr>";
			$output_string .= "<table>";
			return $output_string;
		}
	}
	
	function fetchECA($connid)
	{
		$ecarrray = array();
		$userQuery = "SELECT * FROM bt_extracurricularactivities ORDER BY ecacode";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$ecarrray[$userRow['ecacode']] = $userRow['ecaname'];
		}
		return $ecarrray;
	}
	
	function fetchECAToStudentMapping($connid)
	{
		$ecarrray = array();
		$userQuery = "SELECT * FROM bt_extracurricularactivities_students";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$ecarrray[$userRow['ecacode']][$userRow['cts_number']] = 1;
		}
		return $ecarrray;
	}
	
	function fetchSchoolCompetition($schoolcode,$connid)
	{
		$ecarrray = array();
		$userQuery = "SELECT * FROM bt_schoolcompetition_master ORDER BY comp_name";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$ecarrray[$userRow['competitioncode']] = $userRow['comp_name'];
		}
		return $ecarrray;
	}
	
	function fetchSchoolCompetitionDetails($competitioncode,$connid)
	{
		$ecarrray = array();
		$userQuery = "SELECT * FROM bt_schoolcompetition_master WHERE competitioncode=".$competitioncode;
		$userResult = new dbquery($userQuery,$connid);
		foreach ($userRow as $key => $value)
		{
			$ecarrray[$key] = $value;
		}
		return $ecarrray;
	}
	
	function pageFetchSchoolReportCard($userid,$usertype,$connid)
	{
		$schoolcode = $userid;
		$this->setpostvars();
		if($this->actiontoperform=="Fetch School Report Card")
		{
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td><td align='center'><b>SATS ID</b></td>";
			$output_string .= "<td align='center'><b>Name</b></td><td align='center'><b>Section</b></td><td align='center'><b>Date of Birth</b></td><td align='center'><b>Last Comment Date</b></td><td align='center'><b>Action</b></td></tr>";
			$studentlist = $this->fetchSchoolTestStudentList($schoolcode,$_POST['selclass'],$connid);
			$srno=1;
			foreach ($studentlist as $key => $value)
			{
				$namedobsection = explode("**",$value);
				if($namedobsection[1]=="00-00-0000")
					$namedobsection[1]="";
				
				$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$key."</td>";
				$output_string .= "<td>".$namedobsection[0]."</td><td align='center'>".$namedobsection[2]."</td><td align='center'>".$namedobsection[1]."</td>";
				$output_string .= "<td align='center'>".$namedobsection[3]."</td><td><a href='javascript: studentreportcard(".$key.")'>View Report Card</a></td></tr>";
				$srno++;
			}
			$output_string .= "<table>";
			return $output_string;
		}
	}
	
	function pageFetchStudentReportCard($userid,$usertype,$satsid,$connid)
	{
		$schoolcode = $userid;
		$this->setpostvars();
		
		$ecaarray = $this->fetchECA($connid);
		if($this->actiontoperform=="Save Report Card Comments")
		{
			$rccomments = "(".date('d-m-Y')."): ".$_POST['reportcard_comments'];
			$upquery = "UPDATE student_master SET reportcard_comments=IF(reportcard_comments='','".$rccomments."',CONCAT(reportcard_comments,'**','".$rccomments."')) WHERE cts_number=".$satsid;
			mysql_query($upquery, $connid) OR die(mysql_error());
			$this->actiontoperform="Fetch Student Report Card";
		}
		
		if($this->actiontoperform=="Fetch Student Report Card")
		{
			$testnamearray = array();
			$testcodestr = "";
			$userQuery = "SELECT * FROM bt_schooltest_master WHERE schoolcode=".$schoolcode." AND test_year='".$this->schooltestcurrentyear."' ORDER BY test_startdate";
			$userResult = new dbquery($userQuery,$connid);
			while($userRow = $userResult->getrowarray())
			{
				$testnamearray[$userRow['testcode']] = $userRow['test_name'];
				$testcodestr .= $userRow['testcode'].",";
			}
			$testcodestr = substr($testcodestr,0,-1);
			if($testcodestr=="")
			{
				$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>No test data uploaded... </b></td></tr>";
				$output_string .= "</table>";
				return $output_string;
			}
			else 
			{
				$testpapercodestr = "";
				$subjectsarray = array();
				$testpapersubjectdetails = array();
				$testpapermaxmarks = array();
				$userQuery = "SELECT * FROM bt_schooltest_paperdetails WHERE class='".$_POST['selclass']."' AND testcode IN (".$testcodestr.") ORDER BY testpapercode";
				$userResult = new dbquery($userQuery,$connid);
				while($userRow = $userResult->getrowarray())
				{
					if(!in_array($userRow['subject'],$subjectsarray))
						array_push($subjectsarray,$userRow['subject']);
						
					$testpapersubjectdetails[$userRow['testcode']][$userRow['subject']] = $userRow['testpapercode'];
					$testpapermaxmarks[$userRow['testpapercode']] = $userRow['maxmarks'];
					
					$testpapercodestr .= $userRow['testpapercode'].",";
				}
				$testpapercodestr = substr($testpapercodestr,0,-1);
				
				$studentmarks = array();
				$userQuery = "SELECT * FROM bt_schooltest_data WHERE testpapercode IN (".$testpapercodestr.")";
				$userResult = new dbquery($userQuery,$connid);
				while($userRow = $userResult->getrowarray())
				{
					$studentmarks[$userRow['testcode']][$userRow['testpapercode']][$userRow['cts_number']] = $userRow['obtainedmarks'];
				}
				
				$output_string_final = "";
				$studentlist = $this->fetchSchoolTestStudentDetails($satsid,$connid);
				$colspan = count($testnamearray)*2+1;
				foreach ($studentlist as $key => $value)
				{
					$testcode_maxmarks_total = array();
					$testcode_obtmarks_total = array();
					
					$namedobsection = explode("**",$value);
					if($namedobsection[1]=="00-00-0000")
						$namedobsection[1]="";
						
					$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
					$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00'><td align='center' colspan='".$colspan."'><b>Name: </b>".$namedobsection[0];
					$output_string .= "&nbsp;&nbsp;<b>SATS ID: </b>".$key."&nbsp;&nbsp;<b>Class: </b>".$_POST['selclass']."&nbsp;&nbsp;<b>Section: </b>".$namedobsection[2]."&nbsp;&nbsp;<b>DOB: </b>".$namedobsection[1]."</td></tr>";
				
					$output_string .= "<tr><td rowspan='2' align='center'><b>Subject</b></td>";
					$output_string_inn = "";
					foreach ($testnamearray as $testcode => $testname)
					{
						$output_string .= "<td align='center' colspan='2'><b>".$testname."</b></td>";
						$output_string_inn .= "<td align='center'><b>Max<br>Marks</b></td><td align='center'><b>Scored</b></td>";
						$testcode_maxmarks_total[$testcode]=0;
						$testcode_obtmarks_total[$testcode]=0;
					}
					$output_string .= "</tr>";
					$output_string .= "<tr>".$output_string_inn."</tr>";
					
					for($si=0; $si<count($subjectsarray); $si++)
					{
						$output_string .= "<tr><td><b>".$subjectsarray[$si]."</b></td>";
						foreach ($testnamearray as $testcode => $testname)
						{
							$papercode = $testpapersubjectdetails[$testcode][$subjectsarray[$si]];
							$maxmarks = $testpapermaxmarks[$papercode];
							$obtmarks = $studentmarks[$testcode][$papercode][$key];
							$bgcolor="";
							if($obtmarks==999)
							{
								$obtmarks = "Absent";
								$bgcolor="#FF0000";
							}
							$output_string .= "<td align='center'>".$maxmarks."</td><td align='center' bgcolor='".$bgcolor."'>".$obtmarks."</td>";
							
							if($obtmarks!="Absent")
							{
								$testcode_maxmarks_total[$testcode]+=$maxmarks;
								$testcode_obtmarks_total[$testcode]+=$obtmarks;
							}
						}
						$output_string .= "</tr>";
					}
					
					$output_string .= "<tr><td align='center'><b>Percentage (%)</b></td>";
					foreach ($testnamearray as $testcode => $testname)
					{
						$percentage = ($testcode_obtmarks_total[$testcode]/$testcode_maxmarks_total[$testcode])*100;
						$output_string .= "<td align='center' colspan='2'><b>".sprintf("%.1f",$percentage)."%</b></td>";
					}
					$output_string .= "</tr>";
					
					// Report card comments - Starts Here
					if($this->student_reportcardcomments_old!="")
					{
						$output_string .= "<tr bgcolor='#ff9c00'><td colspan='".$colspan."'></td></tr>";
						$output_string .= "<tr><td colspan='".$colspan."'><b><u>Report card comments:</u><br><br></b>".$this->student_reportcardcomments_old."</td></tr>";
					}
					// Report card comments - Ends Here
				
					
					// Extra curricular - Starts Here
					$ecacodearray = array();
					$ecastr = "";
					$ecaQuery = "SELECT ecacode FROM bt_extracurricularactivities_students WHERE cts_number=".$key;
					$ecaResult = new dbquery($ecaQuery,$connid);
					while($ecaRow = $ecaResult->getrowarray())
					{
						if(!in_array($ecaRow['ecacode'],$ecacodearray))
						{
							array_push($ecacodearray,$ecaRow['ecacode']);
							$ecastr .= $ecaarray[$ecaRow['ecacode']].", ";
						}
					}
					$ecastr = substr($ecastr,0,-2);
					if($ecastr!=="")
					{
						$output_string .= "<tr bgcolor='#ff9c00'><td colspan='".$colspan."'></td></tr>";
						$output_string .= "<tr><td colspan='".$colspan."'><b><u>Extra Curricular Activities:</u><br><br></b>You are actively take part in ".$ecastr."</td></tr>";
					}
					// Extra curricular - Ends Here
					
					// Competition - Starts Here
					$compcntr = 1;
					$compstr = "";
					$compQuery = "SELECT * FROM bt_schoolcompetition_winners WHERE cts_number=".$key;
					$compResult = new dbquery($compQuery,$connid);
					while($compRow = $compResult->getrowarray())
					{
						$compstr .= $compcntr." ";
						$compcode = $compRow['competitioncode'];
						$compdetails = $this->fetchCompetitionDetails($compcode,$connid);
						if($compdetails['isgroupcompetition'] == "Y")
						{
							if($compRow['iswinnerorrunnersup']=="W")
								$compstr .= "Winning team memeber of ".$compdetails['comp_name']."<br>";
							else if($compRow['iswinnerorrunnersup']=="R")
								$compstr .= "Runnders up team memeber of ".$compdetails['comp_name']."<br>";
							else 
								$compstr .= "Participated in ".$compdetails['comp_name']."<br>";
						}
						else 
						{
							if($compRow['iswinnerorrunnersup']=="W")
								$compstr .= "Got 1<sup>st</sup> rank in ".$compdetails['comp_name']."<br>";
							else if($compRow['iswinnerorrunnersup']=="R")
							{
								if($compRow['winnerrank']==2)
									$compstr .= "Got 2<sup>nd</sup> rank in ".$compdetails['comp_name']."<br>";
								else 
									$compstr .= "Got 3<sup>rd</sup> rank in ".$compdetails['comp_name']."<br>";
							}
							else 
								$compstr .= "Participated in ".$compdetails['comp_name']."<br>";
						}
						$compcntr++;
					}
					$compstr = substr($compstr,0,-4);
					
					if($compstr!=="")
					{
						$output_string .= "<tr bgcolor='#ff9c00'><td colspan='".$colspan."'></td></tr>";
						$output_string .= "<tr><td colspan='".$colspan."'><b><u>Competitions in which you have participated:</u><br><br></b>".$compstr."</td></tr>";
					}
					// Competition - Ends Here
					
					$output_string .= "</table>";
					$output_string_final .= $output_string."<br>";
					$this->testcounter = count($testnamearray);
				}
				return $output_string_final;
			}
		}
	}
	
	function pageIdentifyWeakStudents($userid,$usertype,$connid)
	{
		$schoolcode = $userid;
		$this->setpostvars();
		if($this->actiontoperform=="Identify Weak Students")
		{
			$testnamearray = array();
			$testcodestr = "";
			$userQuery = "SELECT * FROM bt_schooltest_master WHERE schoolcode=".$schoolcode." AND test_year='".$this->schooltestcurrentyear."' ORDER BY test_startdate";
			$userResult = new dbquery($userQuery,$connid);
			while($userRow = $userResult->getrowarray())
			{
				$testnamearray[$userRow['testcode']] = $userRow['test_name'];
				$testcodestr .= $userRow['testcode'].",";
			}
			$testcodestr = substr($testcodestr,0,-1);
			
			if($testcodestr!="")
			{
				$testpapercodestr = "";
				$subjectsarray = array();
				$testpapersubjectdetails = array();
				$testpapermaxmarks = array();
				$userQuery = "SELECT * FROM bt_schooltest_paperdetails WHERE class='".$_POST['selclass']."' AND subject='".$_POST['selsubject']."' AND testcode IN (".$testcodestr.") ORDER BY testpapercode";
				$userResult = new dbquery($userQuery,$connid);
				while($userRow = $userResult->getrowarray())
				{
					if(!in_array($userRow['subject'],$subjectsarray))
						array_push($subjectsarray,$userRow['subject']);
						
					$testpapersubjectdetails[$userRow['testcode']][$userRow['subject']] = $userRow['testpapercode'];
					$testpapermaxmarks[$userRow['testpapercode']] = $userRow['maxmarks'];
					
					$testpapercodestr .= $userRow['testpapercode'].",";
				}
				$testpapercodestr = substr($testpapercodestr,0,-1);
				
				$studentmarks = array();
				$userQuery = "SELECT * FROM bt_schooltest_data WHERE testpapercode IN (".$testpapercodestr.")";
				$userResult = new dbquery($userQuery,$connid);
				while($userRow = $userResult->getrowarray())
				{
					$studentmarks[$userRow['testcode']][$userRow['testpapercode']][$userRow['cts_number']] = $userRow['obtainedmarks'];
				}
				
				$student_testwiseperformace = array();
				$student_overallperformace = array();
				
				$colspan = count($testnamearray)+6;
				$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
				$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center' colspan='".$colspan."'><b>List of students in class ".$_POST['selclass']." subject ".$_POST['selsubject']." who need more attention</b></td></tr>";
				$output_string .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>SATS ID</b></td><td align='center'><b>Name</b></td>";
				$output_string .= "<td align='center'><b>Section</b></td><td align='center'><b>Date of Birth</b></td>";
				
				foreach ($testnamearray as $testcode => $testname)
				{
					$output_string .= "<td align='center'><b>".$testname."</b></td>";
				}
				$output_string .= "<td align='center'><b>Overall</b></td></tr>";
					
				$studentlist = $this->fetchSchoolTestStudentList($schoolcode,$_POST['selclass'],$connid);
				foreach ($studentlist as $key => $value)
				{
					$testcode_maxmarks_total = array();
					$testcode_obtmarks_total = array();
					
					$namedobsection = explode("**",$value);
					if($namedobsection[1]=="00-00-0000")
						$namedobsection[1]="";
						
					foreach ($testnamearray as $testcode => $testname)
					{
						$testcode_maxmarks_total[$testcode]=0;
						$testcode_obtmarks_total[$testcode]=0;
					}
					
					$absentintest_array = array();
					$absentintest = 0;
					for($si=0; $si<count($subjectsarray); $si++)
					{
						foreach ($testnamearray as $testcode => $testname)
						{
							$papercode = $testpapersubjectdetails[$testcode][$subjectsarray[$si]];
							$maxmarks = $testpapermaxmarks[$papercode];
							$obtmarks = $studentmarks[$testcode][$papercode][$key];
							if($obtmarks==999)
							{
								$obtmarks = "Absent";
								$absentintest++;
								array_push($absentintest_array,$testcode);
							}
							
							if($obtmarks!="Absent")
							{	
								$testcode_maxmarks_total[$testcode]+=$maxmarks;
								$testcode_obtmarks_total[$testcode]+=$obtmarks;
							}
						}
					}
					
					$overallperformance = 0;
					foreach ($testnamearray as $testcode => $testname)
					{
						if(!in_array($testcode,$absentintest_array))
						{
							$percentage = ($testcode_obtmarks_total[$testcode]/$testcode_maxmarks_total[$testcode])*100;
							$student_testwiseperformace[$key][$testcode] = $percentage;
							$overallperformance +=$percentage; 
						}
						else
						{
							$student_testwiseperformace[$key][$testcode] = "Absent";
						}
					}
					$student_overallperformace[$key] = $overallperformance/(count($testnamearray)-$absentintest);
				}
				
				asort($student_overallperformace);
				$totalstudents = count($student_overallperformace);
				$totalstudents_13rd = round($totalstudents/3,0);
					
				$srno=1;
				$btcntr=0;
				$avgdataset_13rd = array();
				foreach ($student_overallperformace as $key => $value) 
				{
					$valuenamedob = $studentlist[$key];
					$namedobsection = explode("**",$valuenamedob);
					if($namedobsection[1]=="00-00-0000")
						$namedobsection[1]="";
						
					$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$key."</td><td>".$namedobsection[0]."</td>";
					$output_string .= "<td align='center'>".$namedobsection[2]."</td><td align='center'>".$namedobsection[1]."</td>";
					foreach ($testnamearray as $testcode => $testname)
					{
						if($student_testwiseperformace[$key][$testcode] == "Absent")
							$output_string .= "<td align='center' bgcolor='#FF0000'>Absent</td>";
						else
							$output_string .= "<td align='center'>".sprintf("%.1f",$student_testwiseperformace[$key][$testcode])."%</td>";
					}
					$output_string .= "<td align='center'>".sprintf("%.1f",$student_overallperformace[$key])."%</td></tr>";
				
					$srno++;
					$btcntr++;
					if($btcntr==$totalstudents_13rd)
						break;   
				}
				$output_string .= "<tr><td colspan='".$colspan."' align='center'><b><font color='#FF0000'>* This is the bottom 1/3<sup>rd</sup> list of students based on their overall performance.</b></td></tr>";
				$output_string .= "</table>";
			}
			else 
			{
				$output_string .= "<table align='center'><tr><td colspan='".$colspan."' align='center'><b><font color='#FF0000'>Please first upload test data than see students who need support...</b></td></tr>";
				$output_string .= "</table>";
			}
			return $output_string;
		}
	}
	
	function pageNationalHolidays($userid,$usertype,$connid)
	{
		$this->setpostvars();
		$output_string = "";
		if($this->actiontoperform=="Delete National Holiday")
		{
			$delquery1 = "DELETE FROM bt_nationalholidaysmaster WHERE ntholiday_code=".$_POST['holidaycode'];
			mysql_query($delquery1) OR die($delquery1." - ".mysql_error());
		}
		
		$isholidaythere = 0;
		if($this->actiontoperform=="Add National Holiday")
		{
			$userQuery = "SELECT COUNT(*) FROM bt_nationalholidaysmaster WHERE ntholiday_date='".formatDate($this->holidaydate)."'";
			$userResult = new dbquery($userQuery,$connid);
			$userRow = $userResult->getrowarray();
			if($userRow['COUNT(*)']!=0)
			{
				$this->message = "Entered holiday date already exists.";
				$isholidaythere=1;
			}
			else 
			{
				$holidaydate = formatDate($this->holidaydate);
				$date=explode("-",$holidaydate);
				$h = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
				$holiday_day= date("l", $h) ;
				
				$insquery  = "INSERT INTO bt_nationalholidaysmaster SET ntholiday_name='".$this->holiday."', ntholiday_date='".$holidaydate."',";
				$insquery .= "ntholiday_day='".$holiday_day."', ntholiday_comments='".$this->holidaydesc."'";
				mysql_query($insquery,$connid) OR die($insquery." - ".mysql_error());
			}
		}
		
		$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center' colspan='6'><b>List of National Holidays</b></td></tr>";
		$output_string .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Date</b></td><td align='center'><b>Holiday</b></td>";
		$output_string .= "<td align='center'><b>Day</b></td><td align='center'><b>Coments</b></td><td align='center'><b>Action</b></td></tr>";

		$srno=1;
		$userQuery = "SELECT * FROM bt_nationalholidaysmaster WHERE SUBSTR(ntholiday_date,1,4)='".$this->schooltestcurrentyear."' ORDER BY ntholiday_date";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$bgcolor="";
			if($isholidaythere==1 && $userRow['ntholiday_date']==formatDate($this->holidaydate))
				$bgcolor='#FF0000';
			$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'>".formatDate($userRow['ntholiday_date'])."</td><td>".$userRow['ntholiday_name']."</td>";
			$output_string .= "<td align='center'>".$userRow['ntholiday_day']."</td><td align='center'>".$userRow['ntholiday_comments']."</td>";
			$output_string .= "<td><a href='javascript: deletenationalholiday(".$userRow['ntholiday_code'].")'>Delete</a></td></tr>";
			$srno++;
		}
		$output_string .= "</table>";
		return $output_string;
	}
	
	function pageSchoolHolidays($userid,$usertype,$connid)
	{
		$this->setpostvars();
		$schoolcode=$userid;
		$output_string = "";
		if($this->actiontoperform=="Delete School Holiday")
		{
			$delquery1 = "DELETE FROM bt_schoolholidaysmaster WHERE scholiday_code=".$_POST['holidaycode'];
			mysql_query($delquery1) OR die($delquery1." - ".mysql_error());
		}
		
		$isholidaythere = 0;
		if($this->actiontoperform=="Add School Holiday")
		{
			$userQuery = "SELECT COUNT(*) FROM bt_schoolholidaysmaster WHERE schoolcode=".$schoolcode." AND scholiday_date='".formatDate($this->holidaydate)."'";
			$userResult = new dbquery($userQuery,$connid);
			$userRow = $userResult->getrowarray();
			if($userRow['COUNT(*)']!=0)
			{
				$this->message = "Entered holiday date already exists.";
				$isholidaythere=1;
			}
			
			$userQuery = "SELECT COUNT(*) FROM bt_nationalholidaysmaster WHERE ntholiday_date='".formatDate($this->holidaydate)."'";
			$userResult = new dbquery($userQuery,$connid);
			$userRow = $userResult->getrowarray();
			if($userRow['COUNT(*)']!=0)
			{
				$this->message = "Entered holiday date already exists in national holiday list.";
				$isholidaythere=1;
			}
			
			if($isholidaythere==0) 
			{
				$holidaydate = formatDate($this->holidaydate);
				$date=explode("-",$holidaydate);
				$h = mktime(0, 0, 0, $date[1], $date[2], $date[0]);
				$holiday_day= date("l", $h) ;
				
				$insquery  = "INSERT INTO bt_schoolholidaysmaster SET schoolcode=".$schoolcode.", scholiday_name='".$this->holiday."', scholiday_date='".$holidaydate."',";
				$insquery .= "scholiday_day='".$holiday_day."', scholiday_comments='".$this->holidaydesc."'";
				mysql_query($insquery,$connid) OR die($insquery." - ".mysql_error());
			}
		}
		
		$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center' colspan='6'><b>List of School Holidays</b></td></tr>";
		$output_string .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Date</b></td><td align='center'><b>Holiday</b></td>";
		$output_string .= "<td align='center'><b>Day</b></td><td align='center'><b>Coments</b></td><td align='center'><b>Action</b></td></tr>";

		$srno=1;
		$userQuery = "SELECT * FROM bt_schoolholidaysmaster WHERE SUBSTR(scholiday_date,1,4)='".$this->schooltestcurrentyear."' AND schoolcode=".$userid." ORDER BY scholiday_date";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$bgcolor="";
			if($isholidaythere==1 && $userRow['scholiday_date']==formatDate($this->holidaydate))
				$bgcolor='#FF0000';
			$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'>".formatDate($userRow['scholiday_date'])."</td><td>".$userRow['scholiday_name']."</td>";
			$output_string .= "<td align='center'>".$userRow['scholiday_day']."</td><td align='center'>".$userRow['scholiday_comments']."</td>";
			$output_string .= "<td><a href='javascript: deleteschoolholiday(".$userRow['scholiday_code'].")'>Delete</a></td></tr>";
			$srno++;
		}
		
		$userQuery = "SELECT * FROM bt_nationalholidaysmaster WHERE SUBSTR(ntholiday_date,1,4)='".$this->schooltestcurrentyear."' ORDER BY ntholiday_date";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$bgcolor='#00FF00';
			$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'>".formatDate($userRow['ntholiday_date'])."</td><td>".$userRow['ntholiday_name']."</td>";
			$output_string .= "<td align='center'>".$userRow['ntholiday_day']."</td><td align='center'>".$userRow['ntholiday_comments']."</td>";
			$output_string .= "<td>&nbsp;</td></tr>";
			$srno++;
		}
		$output_string .= "</table><br>";
		
		$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
		$output_string .= "<tr><td bgcolor='#00FF00'>&nbsp;</td><td><b>National Holidays</b></td></tr></table>";
		
		return $output_string;
	}
	
	function fetchTNAASSLMapping($username,$usertype,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$_SESSION['ttsubject'] = $this->ttsubject;
		$_SESSION['ttsubject_section'] = $this->ttsubject_section;
		
		$outputstring = "";
		if($this->actiontoperform == "TNA ASSL Data")
		{
			$test_edition = "V";
			$paperheader = $this->ttsubject;
			if($paperheader=="Content")
				$papercodearray = array("Y1BCON0104");
			else 
				$papercodearray = array("Y1BPED0104");
				
			$totalpapercodes = count($papercodearray);
			
			$schoolarray = array();
			$stquery = "SELECT * FROM school_master";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				$schoolarray[$strow['schoolcode']] = $strow['schoolname'].", ".$strow['DzongkhagNameEn']." (".$strow['schoolcode'].")";
			}
			
			$skillarray = array();
			$stquery = "SELECT * FROM skill_table";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				for($sk=1; $sk<=25; $sk++)
				{
					$skill = "S".$sk;
					
					if($strow[$skill]!="")
						$skillarray[$strow['papercode']][$skill] = $strow[$skill];
				}
			}
			
			$skillarray_teacher = array();
			$skillsuggessionsarray_teacher = array();
			$skillwisetotalteachers = array();
			$stquery = "SELECT * FROM skill_table_teacher";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				for($sk=1; $sk<=7; $sk++)
				{
					$skill = "S".$sk;
					$skillsugg = "S".$sk."_Suggessions";
					if($strow[$skill]!="")
					{
						$skillarray_teacher[$strow['papercode']][$strow['subjectno']][$skill] = $strow[$skill];
						$skillsuggessionsarray_teacher[$strow['papercode']][$skill] = $strow[$skillsugg];
						$skillwisetotalteachers[$strow['papercode']][$skill] = 0;
					}
				}
			}
			
			$skillwisetqarray_teacher = array();
			$stquery = "SELECT papercode,subjectno,skill_no,count(*) FROM correct_answers_teacher GROUP BY papercode,subjectno,skill_no";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				$skillwisetqarray_teacher[$strow['papercode']][$strow['subjectno']][$strow['skill_no']] = $strow['count(*)'];
			}
			
			$tablename     = "assessment".$test_edition."_teacher";
			$tablename_org = "assessment".$test_edition."_teacher_org";
			
			$srno=1;
			$outputstring = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$outputstring .= "<tr bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td><td align='center'><b>Teacher</b></td><td align='center'><b>School</b></td>";
			$outputstring .= "<td align='center'><b>Class</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Students' Strengths</b></td>";
			$outputstring .= "<td align='center'><b>Students' Weaknesses</b></td><td align='center'><b>".$paperheader." Strengths</b></td><td align='center'><b>".$paperheader." Weaknesses</b></td></tr>";

			$srno_tech=1;
			$outputstring_tech  = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$outputstring_tech .= "<tr bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td><td align='center'><b>Teacher</b></td><td align='center'><b>School &nbsp;&nbsp;&nbsp;<a href='javascript: fetchTNAASSLData_Details()'>Show Details</b></a></td></tr>";
			
			$schoolcode_string = $this->queryResult_SchoolCodeString($username,$usertype,$connid);
			$_SESSION['schoolcode_string'] = $schoolcode_string;
			$_SESSION['ttshowskillno'] = $this->ttshowskillno;
			
			$teachertaken = array();
			$stquery = "SELECT school_code, name, cts_number,subjectstaught,classestaught,uniqueno FROM ".$tablename_org." WHERE school_code IN (".$schoolcode_string.") GROUP BY school_code, name";
			//echo $stquery."<br>";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				//$subjectarray = $this->subjectstobeconsidered($strow['subjectstaught']);
				$subjectarray[0] = substr($this->ttsubject_section,0,1); 
				$classesarray = $this->classestobeconsidered($strow['classestaught']);
				
				for($ci=0; $ci<count($classesarray); $ci++)
				{
					$class = $classesarray[$ci];
					for($si=0; $si<count($subjectarray); $si++)
					{
						$subject = $subjectarray[$si];
						$stustrength = "Did not appear in the test";
						$stuweakness = "Did not appear in the test";
						
						$subjectno = 0;
						$subname = "";
						if($subject=="E")
						{
							$subjectno = 1;
							$subname = "English";
						}
						elseif($subject=="M")
						{
							$subjectno = 2;
							$subname = "Maths";
						}
						elseif($subject=="S")
						{
							$subjectno = 3;
							$subname = "EVS";
						}
						
						$papercode = $subjectno.$class.$test_edition;
							
						$stuskillwiseperformance = $this->fetchstudentperformanceinskills($strow['school_code'],$class,$subjectno,$test_edition,$connid);
						$totalskills = count($stuskillwiseperformance);
						if($totalskills>0)
						{
							$stustrength = "1. ".$skillarray[$papercode]["S".$stuskillwiseperformance[$totalskills-1]]."<br><br>2. ".$skillarray[$papercode]["S".$stuskillwiseperformance[$totalskills-2]];
							$stuweakness = "1. ".$skillarray[$papercode]["S".$stuskillwiseperformance[0]]."<br><br>2. ".$skillarray[$papercode]["S".$stuskillwiseperformance[1]];
						}
						
						$outputstring .= "<tr><td align='center'>".$srno."</td><td>".$strow['name']."</td><td>".$schoolarray[$strow['school_code']]."</td>";
						$outputstring .= "<td align='center'>".$class."</td><td align='center'>".$subname."</td>";
						if($stustrength!="Did not appear in the test")
							$outputstring .= "<td>".$stustrength."</td>";
						else 
							$outputstring .= "<td align='center'><font color='#FF0000'>".$stustrength."</font></td>";
							
						if($stuweakness!="Did not appear in the test")
							$outputstring .= "<td>".$stuweakness."</td>";
						else 
							$outputstring .= "<td align='center'><font color='#FF0000'>".$stuweakness."</font></td>";
						
						for($pc=0; $pc<$totalpapercodes; $pc++)
						{
							$tecstrength = "Did not appear in the test";
							$tecweakness = "Did not appear in the test";
							$suggessions = "";
							
							$stuskillwiseperformance = $this->fetchteacherperformanceinskills($strow['school_code'],$strow['name'],$papercodearray[$pc],$subjectno,$skillwisetqarray_teacher,$connid);
							$totalskills = count($stuskillwiseperformance);
							if($totalskills>0)
							{
								$tecstrength = "1. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[$totalskills-1]]."<br><br>2. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[$totalskills-2]];
								$tecweakness = "1. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[0]]."<br><br>2. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[1]];
								$suggessions = $skillsuggessionsarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[0]];
								
								$techschool = $strow['school_code'].str_replace(" ","",$strow['name']);
								if(!in_array($techschool,$teachertaken))
								{
									$skillwisetotalteachers[$papercodearray[$pc]]["S".$stuskillwiseperformance[0]] = $skillwisetotalteachers[$papercodearray[$pc]]["S".$stuskillwiseperformance[0]]+1;
									array_push($teachertaken,$techschool);
									
									if($this->ttshowskillno==$stuskillwiseperformance[0])
									{
										$outputstring_tech .= "<tr><td align='center'>".$srno_tech."</td><td>".$strow['name']."</td><td>".$schoolarray[$strow['school_code']]."</td></tr>";
										$srno_tech++;
									}
								}
								
								$suggessions = "Dummy Suggessions";
							}
							if($tecstrength!="Did not appear in the test")
								$outputstring .= "<td>".$tecstrength."</td>";
							else 
								$outputstring .= "<td align='center'><font color='#FF0000'>".$tecstrength."</font></td>";
								
							if($tecweakness!="Did not appear in the test")
								$outputstring .= "<td title='".$suggessions."'>".$tecweakness."</td>";
							else 
								$outputstring .= "<td align='center'><font color='#FF0000'>".$tecweakness."</font></td>";
						}
						$outputstring .= "</tr>";
						$srno++;
					}	
				}
			}
			$outputstring .= "</table>";
			$outputstring_tech .= "</table><br>";
			
			$outputstring_skill = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$outputstring_skill .= "<tr bgcolor='#ff9c00'><td align='center' colspan='3'><b>Skill Wise Total Teachers Who Needs Training</b></td></tr>";
			$outputstring_skill .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Skill</b></td><td align='center'><b>Total</b></td></tr>";
			
			$srno=1;
			$papercode_tec = $papercodearray[0];
			for($ski=1; $ski<=count($skillwisetotalteachers[$papercode_tec]); $ski++)
			{
				if($skillarray_teacher[$papercode_tec][$subjectno]["S".$ski]!="")
				{
					$outputstring_skill .= "<tr><td align='center'>".$srno."</td><td>".$skillarray_teacher[$papercode_tec][$subjectno]["S".$ski]."</td><td align='center'><a href='javascript: fetchTNAASSLData(".$ski.")'>".$skillwisetotalteachers[$papercode_tec]["S".$ski]."</a></td></tr>";
					$srno++;
				}
			}
			$outputstring_skill .= "</table><br>";
			
			if($srno_tech!=1)
				$outputstring_skill .= $outputstring_tech;
		}
		
		/*echo "<pre>";
		print_r ($skillwisetotalteachers);
		echo "</pre>";*/
		return $outputstring_skill;
	}
	
	function fetchTNAASSLMapping_Details($username,$usertype,$connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$this->ttsubject 		 = $_SESSION['ttsubject'];
		$this->ttsubject_section = $_SESSION['ttsubject_section'];
		$schoolcode_string 		 = $_SESSION['schoolcode_string'];
		$this->ttshowskillno 	 = $_SESSION['ttshowskillno'];
		$outputstring = "";
		if($this->actiontoperform == "TNA ASSL Data Details")
		{
			$test_edition = "V";
			$paperheader = $this->ttsubject;
			if($paperheader=="Content")
				$papercodearray = array("Y1BCON0104");
			else 
				$papercodearray = array("Y1BPED0104");
				
			$totalpapercodes = count($papercodearray);
			
			$schoolarray = array();
			$stquery = "SELECT * FROM school_master";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				$schoolarray[$strow['schoolcode']] = $strow['schoolname'].", ".$strow['DzongkhagNameEn']." (".$strow['schoolcode'].")";
			}
			
			$skillarray = array();
			$stquery = "SELECT * FROM skill_table";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				for($sk=1; $sk<=25; $sk++)
				{
					$skill = "S".$sk;
					
					if($strow[$skill]!="")
						$skillarray[$strow['papercode']][$skill] = $strow[$skill];
				}
			}
			
			$skillarray_teacher = array();
			$skillsuggessionsarray_teacher = array();
			$skillwisetotalteachers = array();
			$stquery = "SELECT * FROM skill_table_teacher";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				for($sk=1; $sk<=7; $sk++)
				{
					$skill = "S".$sk;
					$skillsugg = "S".$sk."_Suggessions";
					if($strow[$skill]!="")
					{
						$skillarray_teacher[$strow['papercode']][$strow['subjectno']][$skill] = $strow[$skill];
						$skillsuggessionsarray_teacher[$strow['papercode']][$skill] = $strow[$skillsugg];
						$skillwisetotalteachers[$strow['papercode']][$skill] = 0;
					}
				}
			}
			
			$skillwisetqarray_teacher = array();
			$stquery = "SELECT papercode,subjectno,skill_no,count(*) FROM correct_answers_teacher GROUP BY papercode,subjectno,skill_no";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				$skillwisetqarray_teacher[$strow['papercode']][$strow['subjectno']][$strow['skill_no']] = $strow['count(*)'];
			}
			
			$tablename     = "assessment".$test_edition."_teacher";
			$tablename_org = "assessment".$test_edition."_teacher_org";
			
			$srno=1;
			$outputstring = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
			$outputstring .= "<tr bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td><td align='center'><b>Teacher</b></td><td align='center'><b>School</b></td>";
			$outputstring .= "<td align='center'><b>Class</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Students' Strengths<br>(ASSL)</b></td>";
			$outputstring .= "<td align='center'><b>Students' Weaknesses<br>(ASSL)</b></td><td align='center'><b>".$paperheader." Strengths<br>(TNA)</b></td><td align='center'><b>".$paperheader." Weaknesses<br>(TNA)</b></td></tr>";

			$teachertaken = array();
			$stquery = "SELECT school_code, name, cts_number,subjectstaught,classestaught,uniqueno FROM ".$tablename_org." WHERE school_code IN (".$schoolcode_string.") GROUP BY school_code, name";
			//echo $stquery."<br>";
			$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
			while($strow = mysql_fetch_array($stresult))
			{
				$subjectarray[0] = substr($this->ttsubject_section,0,1); 
				$classesarray = $this->classestobeconsidered($strow['classestaught']);
				
				for($ci=0; $ci<count($classesarray); $ci++)
				{
					$class = $classesarray[$ci];
					for($si=0; $si<count($subjectarray); $si++)
					{
						$subject = $subjectarray[$si];
						$stustrength = "Did not appear in the test";
						$stuweakness = "Did not appear in the test";
						
						$subjectno = 0;
						$subname = "";
						if($subject=="E")
						{
							$subjectno = 1;
							$subname = "English";
						}
						elseif($subject=="M")
						{
							$subjectno = 2;
							$subname = "Maths";
						}
						elseif($subject=="S")
						{
							$subjectno = 3;
							$subname = "EVS";
						}
						
						$papercode = $subjectno.$class.$test_edition;
							
						$stuskillwiseperformance = $this->fetchstudentperformanceinskills($strow['school_code'],$class,$subjectno,$test_edition,$connid);
						$totalskills = count($stuskillwiseperformance);
						if($totalskills>0)
						{
							$stustrength = "1. ".$skillarray[$papercode]["S".$stuskillwiseperformance[$totalskills-1]]."<br><br>2. ".$skillarray[$papercode]["S".$stuskillwiseperformance[$totalskills-2]];
							$stuweakness = "1. ".$skillarray[$papercode]["S".$stuskillwiseperformance[0]]."<br><br>2. ".$skillarray[$papercode]["S".$stuskillwiseperformance[1]];
						}
						
						$pc=0;
						$tecstrength = "Did not appear in the test";
						$tecweakness = "Did not appear in the test";
						$suggessions = "";
						
						$stuskillwiseperformance = $this->fetchteacherperformanceinskills($strow['school_code'],$strow['name'],$papercodearray[$pc],$subjectno,$skillwisetqarray_teacher,$connid);
						$totalskills = count($stuskillwiseperformance);
						if($totalskills>0)
						{
							$tecstrength = "1. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[$totalskills-1]]."<br><br>2. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[$totalskills-2]];
							$tecweakness = "1. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[0]]."<br><br>2. ".$skillarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[1]];
							$suggessions = $skillsuggessionsarray_teacher[$papercodearray[$pc]][$subjectno]["S".$stuskillwiseperformance[0]];
							$suggessions = "Dummy Suggessions";
						}
						
						if($this->ttshowskillno==$stuskillwiseperformance[0])
						{
							$outputstring .= "<tr><td align='center'>".$srno."</td><td>".$strow['name']."</td><td>".$schoolarray[$strow['school_code']]."</td>";
							$outputstring .= "<td align='center'>".$class."</td><td align='center'>".$subname."</td>";
							if($stustrength!="Did not appear in the test")
								$outputstring .= "<td>".$stustrength."</td>";
							else 
								$outputstring .= "<td align='center'><font color='#FF0000'>".$stustrength."</font></td>";
								
							if($stuweakness!="Did not appear in the test")
								$outputstring .= "<td>".$stuweakness."</td>";
							else 
								$outputstring .= "<td align='center'><font color='#FF0000'>".$stuweakness."</font></td>";
							
							if($tecstrength!="Did not appear in the test")
								$outputstring .= "<td>".$tecstrength."</td>";
							else 
								$outputstring .= "<td align='center'><font color='#FF0000'>".$tecstrength."</font></td>";
								
							//$outputstring .= "<td title='".$suggessions."'>".$tecweakness."</td>";
							if($tecweakness!="Did not appear in the test")
								$outputstring .= "<td>".$tecweakness."</td>";
							else 
								$outputstring .= "<td align='center'><font color='#FF0000'>".$tecweakness."</font></td>";
								
							$outputstring .= "</tr>";
							$srno++;
						}
					}	
				}
			}
			$outputstring .= "<tr><td align='center' colspan='9'><a href='javascript:window.close()'><b>Close Window</b></a></td></tr>";
			$outputstring .= "</table>";
		}
		return $outputstring;
	}
	
	function fetchteacherperformanceinskills($schoolcode,$name,$papercode,$subjectno,$skillwisetqarray_teacher,$connid)
	{
		$stuskillwiseperformance = array();
		$skillwiseperf = array();
		$stquery = "SELECT * FROM assessmentV_teacher WHERE school_code=".$schoolcode." AND teachername='".$name."' AND subjectno=".$subjectno." AND papercode='".$papercode."'";
		$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
		$strow = mysql_fetch_array($stresult);
		
		for($sk=1; $sk<=10; $sk++)
		{
			$skill = "RS".$sk;
			if($strow[$skill]!="")
			{
				$skillwiseperf[$sk] = round(($strow[$skill]/$skillwisetqarray_teacher[$papercode][$subjectno][$sk])*100,1);
			}
		}
		asort($skillwiseperf);
		$stuskillwiseperformance = array_keys($skillwiseperf);
		return $stuskillwiseperformance;
	}
	
	function fetchstudentperformanceinskills($schoolcode,$class,$subjectno,$test_edition,$connid)
	{
		$stuskillwiseperformance = array();
		$skillwiseperf = array();
		$stquery = "SELECT * FROM schoolwise_classwise_skillwise_performance WHERE schoolcode=".$schoolcode." AND class='".$class."' AND subjectno=".$subjectno." AND test_edition='".$test_edition."'";
		$stresult = mysql_query($stquery,$connid) OR die("1: ".mysql_error());
		$strow = mysql_fetch_array($stresult);
		
		for($sk=1; $sk<=25; $sk++)
		{
			$skill = "AvgS".$sk;
			if($strow[$skill]!="")
			{
				$skillwiseperf[$sk] = $strow[$skill];
			}
		}
		asort($skillwiseperf);
		$stuskillwiseperformance = array_keys($skillwiseperf);
		return $stuskillwiseperformance;
	}
	
	function subjectstobeconsidered($subjectstr)
	{
		$subjectarray = array();
		$subjectstr_array = explode(",",$subjectstr);
		for($si=0; $si<count($subjectstr_array); $si++)
		{
			if($subjectstr_array[$si]=="E" || $subjectstr_array[$si]=="M" || $subjectstr_array[$si]=="S")
				array_push($subjectarray,$subjectstr_array[$si]);
		}
		return $subjectarray;
	}
	
	function classestobeconsidered($classesstr)
	{
		$classesarray = array();
		$classesstr_array = explode(",",$classesstr);
		for($si=0; $si<count($classesstr_array); $si++)
		{
			if($classesstr_array[$si]=="4" || $classesstr_array[$si]=="6")
				array_push($classesarray,$classesstr_array[$si]);
		}
		return $classesarray;
	}
	// School Module Function - Ends Here
	
	//Shgool timing details starts here - Nitin
	function setTimeTable($userid,$clsuserrights,$connid,$get_structure_from_db){//CHANGED HERE THE THIRD PM
	
		$this->setpostvars();
		//----Get time table structure from database starts
		
		//echo $get_structure_from_db;
		if($get_structure_from_db == 'yes'){
			$this->setgetvars();
			$this->getTimeTableStructure($userid, $connid );
			$slot_array = $this->getTimeTable($connid)	;
		}
		
		//----Get time table structure from database ends
		if($this->isweekdayshavesametimings=="Yes" || $this->isweekdayshavesametimings=="No"){
		//store timetable structure into database
		$this->academicsession_startdate=formatDate($this->academicsession_startdate);
		$this->academicsession_enddate=formatDate($this->academicsession_enddate);
		//for mon-sat
		if($this->isweekdayshavesametimings=="Yes" )
		{
			
			$query="INSERT INTO bt_schooltimetable_master (schoolcode,academicsession_startdate,academicsession_enddate,isweekdayshavesametimings,MonToFri_TotalPeriods,MonToFri_TotalBreaks,Sat_TotalPeriods,Sat_TotalBreaks)
				VALUES('$userid','$this->academicsession_startdate','$this->academicsession_enddate','$this->isweekdayshavesametimings','$this->MonToSat_TotalPeriods','$this->MonToSat_TotalBreaks','$this->MonToSat_TotalPeriods','$this->MonToSat_TotalBreaks')";	
		}
		else if($this->isweekdayshavesametimings=="No" )
		{
			//for mon-fri and sat
			$query="INSERT INTO bt_schooltimetable_master(schoolcode,academicsession_startdate,academicsession_enddate,isweekdayshavesametimings,MonToFri_TotalPeriods,MonToFri_TotalBreaks,Sat_TotalPeriods,Sat_TotalBreaks)
				VALUES ('$userid','$this->academicsession_startdate','$this->academicsession_enddate','$this->isweekdayshavesametimings','$this->MonToFri_TotalPeriods','$this->MonToFri_TotalBreaks','$this->Sat_TotalPeriods','$this->Sat_TotalBreaks')";
		}
		
		//INSERT INTO DATABASE ONLY WHILE CREATING NEW STRUCTURE
		if( $get_structure_from_db != 'yes'){
			$result = mysql_query($query,$connid);
			$this->timetablecode = mysql_insert_id();
			$this->msg="<b>timetable structure generated...</b>";	
		
		}
		
		//prepare timetable according to the structure submitted....
		$output_string = "";
		//echo "break slot 1 = ".$slot_array["duration_break_ms_1"];
		//SHOWS THE TIME TABLE MASTER 
		if($this->isweekdayshavesametimings=="Yes"){
				$output_string.="<table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
				<tr><td colspan=\"3\" align=\"center\"><strong> Timing Details for Periods and Breaks From Monday To Saturday</strong>
					</td>
				</tr>
				<tr>
					<td>
						School Start Time
					</td>
					<td>
						<table align='center'width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
							<tr>
								<td align='center'>
									Hours
								</td>
								<td align='center'>
									Minutes
								</td>
								<td align='center'>
									AM/PM
								</td>
							</tr>
							<tr>
								<td align='center'>
									<select name='school_start_ms_hr' id='school_start_ms_hr' onchange='return validateHour(this.value)'>"; if(isset($slot_array))
			{
				$hour = $slot_array['school_start_ms_hr'];	
			}
			else
			{
				$hour = '';	
			}
			//$hour_array=array( '01', '02', '03', '04', '05', '06', '07', '08', '09', '10','11', '12');
			$output_string.= prepareComboFromArray('Hour',$hour,$this->hour_array);
							$output_string.= "</select><input type = 'hidden' name = 'timetablecode' value=\"$this->timetablecode\" /> 
								</td>
								<td align='center'>
									<select name='school_start_ms_min' id='school_start_ms_min' onchange='return validateMin(this.value)'>"; if(isset($slot_array))
			{
				$min = $slot_array['school_start_ms_min'];	
			}
			else
			{
				$min = '';	
			}
			//$min_array=array('00', '05', '10',  '15', '20', '25', '30', '35', '40', '45','50', '55');
			$output_string.= prepareComboFromArray('Min',$min,$this->min_array);
							$output_string.= "</select> 
								</td>
								<td align='center'>
									<select name='school_start_ms_ampm' size='1'>
										<option name='am' value='AM' >AM</option>
										<option name='pm' value='PM' >PM</option>
									</select>	
								</td>
								
							</tr>
						</table>
					</td>
				</tr>";
				for($i=1;$i<=$this->MonToSat_TotalBreaks;$i++){
					$output_string.="<tr>
										<td>
											After which period break $i comes? 
										</td>
										<td align='center'>
											<input type='text' name='period_before_break_ms_$i' id='period_before_break_ms_$i' size='5' maxlength='2' onchange=\"return validatePeriodBeforeBreak(this.name,$this->MonToSat_TotalPeriods)\" value='";if(isset($slot_array)){$output_string.=$slot_array["period_before_break_ms_$i"];}$output_string.="'/>
										</td>
										</tr>";	
				}	
				$output_string.="<tr>";	
				$output_string.=	"<th scope=\"col\">Periods</th>
									<th scope=\"col\">Period/Break length(in minutes)</th>
								</tr><input name='total_periods_ms' type='hidden' value=\"$this->MonToSat_TotalPeriods\" /><input name='total_breaks_ms' type='hidden' value=\"$this->MonToSat_TotalBreaks\" />";
			for($i=1;$i<=$this->MonToSat_TotalPeriods;$i++){
			$output_string.="<tr>
				<td align='center'>Period$i</td>
				<td align='center'><input name=\"duration_period_ms_$i\" type=\"text\" value='";if(isset($slot_array)){$output_string.=$slot_array["duration_period_ms_$i"];}else{$output_string.=$this->periodlength;} $output_string.="' size=\"5\" maxlength=\"2\"  onchange=\"validateDuration(this.name);\" /></td>
				</tr>";
									
			}
			for($i=1;$i<=$this->MonToSat_TotalBreaks;$i++){
			$count = $i+$this->MonToSat_TotalPeriods;

			$output_string.="<tr>
					<td align='center'>Break$i</td>
					<td align='center'><input name=\"duration_break_ms_$i\" type=\"text\" value='";if(isset($slot_array)){$output_string.=$slot_array["duration_break_ms_$i"];}$output_string.="' size=\"5\" maxlength=\"2\" onchange=\"validateDuration(this.name); \"/></td>
					</tr>";
			}
			$output_string.="<tr><td colspan=\"3\" align=\"center\"><input name=\"Submit\" value=\"Save\" type=\"submit\"/></td></tr>";
			$output_string.="</table>";
		}else{// for mon to fri and sat
			$output_string.="<table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
				<tr><td colspan=\"3\" align=\"center\"><strong> Timing Details for Periods and Breaks From Monday To Friday</strong>
					</td>
				</tr>
				<tr>
					<td >
						School Start Time
					</td>
					<td>
						<table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
							<tr>
								<td align=\"center\">
									Hours
								</td>
								<td align=\"center\">
									Minutes
								</td>
								<td align=\"center\">
									AM/PM
								</td>
							</tr>
							<tr>
								<td align=\"center\">
									 <select name='school_start_mf_hr' id='school_start_mf_hr' onchange='return validateHour(this.value)'>"; if(isset($slot_array))
			{
				$hour = $slot_array['school_start_mf_hr'];	
			}
			else
			{
				$hour = '';	
			}
			//$hour_array=array( '01', '02', '03', '04', '05', '06', '07', '08', '09', '10','11', '12');
			$output_string.= prepareComboFromArray('Hour',$hour,$this->hour_array);
							$output_string.= "</select></td>
								<td align=\"center\">
									<select name='school_start_mf_min' id='school_start_mf_min' onchange='return validateMin(this.value)'>"; if(isset($slot_array))
			{
				$min = $slot_array['school_start_mf_min'];	
			}
			else
			{
				$min = '';	
			}
			//$min_array=array('00', '05', '10',  '15', '20', '25', '30', '35', '40', '45','50', '55');
			$output_string.= prepareComboFromArray('Min',$min,$this->min_array);
							$output_string.= "</select> <input type = 'hidden' name = 'timetablecode' value=\"$this->timetablecode\"/> 
								</td>
								<td align=\"center\"> 
									<select name='school_start_mf_ampm' size='1'>
										<option name='am' value='AM' >AM</option>
										<option name='pm' value='PM' >PM</option>
									</select>	
								</td>
								
							</tr>
						</table>
					</td>
				</tr>";
		for($i=1;$i<=$this->MonToFri_TotalBreaks;$i++){
					$output_string.="<tr>
										<td>
											After which period break $i comes? 
										</td>
										<td align='center'>
											<input type='text' name='period_before_break_mf_$i' id='period_before_break_mf_$i' size='5' maxlength='2' onchange=\"return validatePeriodBeforeBreak(this.name,$this->MonToFri_TotalPeriods)\"  value='";if(isset($slot_array)){$output_string.=$slot_array["period_before_break_mf_$i"];}$output_string.="'/>
										</td>
										</tr>";	
				}
				
		$output_string.="<tr>";	
		$output_string.=	"<th scope=\"col\">Periods</th>
									<th scope=\"col\">Period/Break length(in minutes)</th>
								</tr><input name='total_periods_mf' type='hidden' value=\"$this->MonToFri_TotalPeriods\" /><input name='total_breaks_mf' type='hidden' value=\"$this->MonToFri_TotalBreaks\" />";
		for($i=1;$i<=$this->MonToFri_TotalPeriods;$i++){
			$output_string.="<tr>
				<td align='center'>Period$i</td>
				<td align='center'><input name=\"duration_period_mf_$i\"type=\"text\" value='";if(isset($slot_array)){$output_string.=$slot_array["duration_period_mf_$i"];}else{$output_string.=$this->periodlength;}$output_string.="' size=\"5\" maxlength=\"2\"  onchange=\"validateDuration(this.name);\" /></td>
				</tr>";
									
		}
		for($i=1;$i<=$this->MonToFri_TotalBreaks;$i++){
			$count = $i+$this->MonToFri_TotalPeriods;

			$output_string.="<tr>
					<td align='center'>Break$i</td>
					<td align='center'><input name=\"duration_break_mf_$i\" type=\"text\" value='";if(isset($slot_array)){$output_string.=$slot_array["duration_break_mf_$i"];}$output_string.="' size=\"5\" maxlength=\"2\" onchange=\"validateDuration(this.name); \"/></td>
					</tr>";
		}
		//sat data starts here		
		$output_string.="<table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
				<tr><td colspan=\"3\" align=\"center\"><strong> Timing Details for Periods and Breaks For Saturday</strong>
					</td>
				</tr>
				<tr>
					<td>
						School Start Time
					</td>
					<td>
						<table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
							<tr>
								<td align=\"center\">
									Hours
								</td >
								<td align=\"center\">
									Minutes
								</td>
								<td align=\"center\">
									AM/PM
								</td>
							</tr>
							<tr>
								<td align=\"center\">
									<select name='school_start_s_hr' id='school_start_s_hr' onchange='return validateHour(this.value)'>"; if(isset($slot_array))
			{
				$hour = $slot_array['school_start_s_hr'];	
			}
			else
			{
				$hour = '';	
			}
			//$hour_array=array( '01', '02', '03', '04', '05', '06', '07', '08', '09', '10','11', '12');
			$output_string.= prepareComboFromArray('Hour',$hour,$this->hour_array);
							$output_string.= "</select> 
								</td>
								<td align=\"center\">
									<select name='school_start_s_min' id='school_start_s_min' onchange='return validateMin(this.value)'>"; if(isset($slot_array))
			{
				$min = $slot_array['school_start_s_min'];	
			}
			else
			{
				$min = '';	
			}
			//$min_array=array('00', '05', '10',  '15', '20', '25', '30', '35', '40', '45','50', '55');
			$output_string.= prepareComboFromArray('Min',$min,$this->min_array);
							$output_string.= "</select><input type = 'hidden' name = 'timetablecode' value=\"$this->timetablecode\"/> 
								</td>
								<td align=\"center\">
									<select name='school_start_s_ampm' size='1'>
										<option name='am' value='AM' >AM</option>
										<option name='pm' value='PM' >PM</option>
									</select>	
								</td>
								
							</tr>
						</table>
					</td>
				</tr>";
		for($i=1;$i<=$this->Sat_TotalBreaks;$i++){
			$output_string.="<tr>
								<td>
									After which period break $i comes? 
								</td>
								<td align='center'>
									<input type='text' name='period_before_break_s_$i' id='period_before_break_s_$i' onchange=\"return validatePeriodBeforeBreak(this.name,$this->Sat_TotalPeriods)\"size='5' maxlength='2' value='";if(isset($slot_array)){$output_string.= $slot_array["period_before_break_s_$i"];}$output_string.="'/>
								</td>
							</tr>";	
				}
				
		$output_string.="<tr>";	
		$output_string.=	"<th scope=\"col\">Periods</th>
									<th scope=\"col\">Period/Break length(in minutes)</th>
								</tr><input name='total_periods_s' type='hidden' value=\"$this->Sat_TotalPeriods\" /><input name='total_breaks_s' type='hidden' value=\"$this->Sat_TotalBreaks\" />";
		for($i=1;$i<=$this->Sat_TotalPeriods;$i++){
			$output_string.="<tr>
				<td align='center'>Period$i</td>
				<td align='center'><input name=\"duration_period_s_$i\"type=\"text\" value='";if(isset($slot_array)){$output_string.=$slot_array["duration_period_s_$i"];}else{$output_string.=$this->periodlength;}$output_string.="' size=\"5\" maxlength=\"2\"  onchange=\"validateDuration(this.name);\"/></td>
				</tr>";
									
		}
		for($i=1;$i<=$this->Sat_TotalBreaks;$i++){
			$count = $i+$this->Sat_TotalPeriods;

			$output_string.="<tr>
					<td align='center'>Break$i</td>
					<td align='center'><input name=\"duration_break_s_$i\" type=\"text\" value='";if(isset($slot_array)){$output_string.=$slot_array["duration_break_s_$i"];}$output_string.="' size=\"5\" maxlength=\"2\" onchange=\"validateDuration(this.name);\"/></td>
					</tr>";
		}
		
			$output_string.="<tr><td colspan=\"3\" align=\"center\"><input name=\"Submit\" value=\"Save\" type=\"submit\"/></td></tr>";		
			$output_string.="</table>";
		}	
		return $output_string;
		}
	}
	
	function storeTimeTable($userid,$clsuserrights,$connid , $mode )//changed here by Nitin Gopi
	{
		
		if(isset($_POST['Submit'])){
			//echo "POST DATA  GIVEN TO storetimetable<br>";
			//echo "<pre>";
			//print_r($_POST);
			//echo "<br>mode is ".$mode;
			//echo "<br>timetablecode from storetimetable is  ".$this->timetablecode;
			$query="SELECT isweekdayshavesametimings
						FROM bt_schooltimetable_master
						WHERE timetablecode = $this->timetablecode";
			$result = mysql_query($query,$connid);
			$isweekdayshavesametimings = "";
			while($row = mysql_fetch_array($result)){
				$isweekdayshavesametimings = $row['isweekdayshavesametimings'];
				//echo "WEEK DAY TIMINGS ".$isweekdayshavesametimings;
			}
			
			if($isweekdayshavesametimings == 'Y'){
				$total_periods = $_POST['total_periods_ms'];
				$total_breaks = $_POST['total_breaks_ms'];
				$slots = $total_periods + $total_breaks;
				$break_array[] = array();
				for($bi = 1 ; $bi <= $total_breaks  ; $bi++){
					array_push($break_array,$_POST["period_before_break_ms_$bi"]);
				}
				$start_time = "";
				$end_time = "";
				$slot_no = 1;
				for($pi = 1 ; $pi <= $total_periods ; $pi++){
					if($pi==1){
						$start_time = $_POST['school_start_ms_hr'].':'.$_POST['school_start_ms_min'].':00';
						$interval   = $_POST["duration_period_ms_$pi"];
						$starttime_arr = explode(":",$start_time);
						$time = mktime($starttime_arr[0],$starttime_arr[1],$starttime_arr[2]);
						$end_time = date("H:i:s", ($time + ($interval * 60)));
						$timeslotno = $slot_no;
						$istimeslotnoofMonToFri = 'Y';
						$istimeslotnobreak = 'N';
						$timeslotno_starttime = $start_time;
						$timeslotno_endtime = $end_time;
						$timeslotno_starttime_ampm = $_POST['school_start_ms_ampm'];
						$timeslotno_endtime_ampm = $_POST['school_start_ms_ampm'];
						
						//check for start time 24->12 
						$starttime_arr = explode(":",$timeslotno_starttime);
						$start_hr = $starttime_arr[0];
						if($start_hr>=12){
							$timeslotno_starttime_ampm = 'PM';
						}
						if($start_hr>12){
							$start_hr=$start_hr-12;	
						}	
						$starttime_arr[0] = $start_hr;
						$timeslotno_starttime=implode(":",$starttime_arr);
						//check for start time 24->12 
						$endtime_arr = explode(":",$timeslotno_endtime);
						$end_hr = $endtime_arr[0];
						if($end_hr>=12){
							$timeslotno_endtime_ampm = 'PM';
						}
						if($end_hr>12){
							$end_hr=$end_hr-12;	
						
						}	
						$endtime_arr[0] = $end_hr;
						$timeslotno_endtime=implode(":",$endtime_arr);
						if($mode == 'edit')
						{
							
							//echo "<BR>INSIDE THE EDIT MODE";
							//echo "<br>connection id is ".$connid;
							//echo "<br><br>";
							$query_update="UPDATE bt_schooltimetable_timings SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no";
							
							//echo $query_update."<br>";
							mysql_query($query_update) OR die($query_update."<br>"."Query 1 Failed");
														
						}else{			
							$query_insert = "INSERT INTO bt_schooltimetable_timings
								(timetablecode,timeslotno,istimeslotnoofMonToFri,istimeslotnobreak,timeslotno_starttime,timeslotno_starttime_ampm,timeslotno_endtime,timeslotno_endtime_ampm,timeslotno_length)
								VALUES('$this->timetablecode','$timeslotno','$istimeslotnoofMonToFri','$istimeslotnobreak','$timeslotno_starttime','$timeslotno_starttime_ampm','$timeslotno_endtime','$timeslotno_endtime_ampm','$interval')";
							$result_new = mysql_query($query_insert,$connid);
						
						
						}
						$slot_no = $slot_no+1;
						
					}else{
						$start_time = $end_time;
						$interval = $_POST["duration_period_ms_$pi"];
						$starttime_arr = explode(":",$start_time);
						$time = mktime($starttime_arr[0],$starttime_arr[1],$starttime_arr[2]);
						$end_time = date("H:i:s", ($time + ($interval * 60)));
						$timeslotno = $slot_no;
						$istimeslotnoofMonToFri = 'Y';
						$istimeslotnobreak = 'N';
						$timeslotno_starttime = $start_time;
						$timeslotno_endtime = $end_time;
						$timeslotno_starttime_ampm = $_POST['school_start_ms_ampm'];
						$timeslotno_endtime_ampm = $_POST['school_start_ms_ampm'];
						//check for start time 24->12 
						$starttime_arr = explode(":",$timeslotno_starttime);
						$start_hr = $starttime_arr[0];
						if($start_hr>=12){
							$timeslotno_starttime_ampm = 'PM';
						}
						if($start_hr>12){
							$start_hr=$start_hr-12;	
						}	
						$starttime_arr[0] = $start_hr;
						$timeslotno_starttime=implode(":",$starttime_arr);
						//check for start time 24->12 
						$endtime_arr = explode(":",$timeslotno_endtime);
						$end_hr = $endtime_arr[0];
						if($end_hr>=12){
							$timeslotno_endtime_ampm = 'PM';
						}
						if($end_hr>12){
							$end_hr=$end_hr-12;	
						
						}	
						$endtime_arr[0] = $end_hr;
						$timeslotno_endtime=implode(":",$endtime_arr);
						if($mode == 'edit')
						{
							$query_update="UPDATE bt_schooltimetable_timings
											SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no";
							$result_new = mysql_query($query_update,$connid);								
						}else{
							$query_insert = "INSERT INTO bt_schooltimetable_timings
								(timetablecode,timeslotno,istimeslotnoofMonToFri,istimeslotnobreak,timeslotno_starttime,timeslotno_starttime_ampm,timeslotno_endtime,timeslotno_endtime_ampm,timeslotno_length)
								VALUES('$this->timetablecode','$timeslotno','$istimeslotnoofMonToFri','$istimeslotnobreak','$timeslotno_starttime','$timeslotno_starttime_ampm','$timeslotno_endtime','$timeslotno_endtime_ampm','$interval')";
							if($result_new = mysql_query($query_insert,$connid)){
								//echo "SUCCESS";
							}
						}
						$slot_no = $slot_no+1;
					
					
					
					}
						if($keypos = array_search($pi,$break_array)){
		
							$timeslotno = $slot_no;
							$start_time = $end_time;
							$break_no = $break_array[$keypos];
							$interval = $_POST["duration_break_ms_$keypos"];
							$starttime_arr = explode(":",$start_time);
							$time = mktime($starttime_arr[0],$starttime_arr[1],$starttime_arr[2]);
							$end_time = date("H:i:s", ($time + ($interval * 60)));
							$timeslotno = $slot_no;
							$istimeslotnoofMonToFri = 'Y';
							$istimeslotnobreak = 'Y';
							$timeslotno_starttime = $start_time;
							$timeslotno_endtime = $end_time;
							$timeslotno_starttime_ampm = $_POST['school_start_ms_ampm'];
							$timeslotno_endtime_ampm = $_POST['school_start_ms_ampm'];
							//check for start time 24->12 
						$starttime_arr = explode(":",$timeslotno_starttime);
						$start_hr = $starttime_arr[0];
						if($start_hr>=12){
							$timeslotno_starttime_ampm = 'PM';
						}
						if($start_hr>12){
							$start_hr=$start_hr-12;	
						}	
						$starttime_arr[0] = $start_hr;
						$timeslotno_starttime=implode(":",$starttime_arr);
						//check for start time 24->12 
						$endtime_arr = explode(":",$timeslotno_endtime);
						$end_hr = $endtime_arr[0];
						if($end_hr>=12){
							$timeslotno_endtime_ampm = 'PM';
						}
						if($end_hr>12){
							$end_hr=$end_hr-12;	
						
						}	
						$endtime_arr[0] = $end_hr;
						$timeslotno_endtime=implode(":",$endtime_arr);
						if($mode == 'edit')
						{
							$query_update="UPDATE bt_schooltimetable_timings
											SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no";
							$result_new = mysql_query($query_update,$connid);								
						}else{
							$query_insert = "INSERT INTO bt_schooltimetable_timings
									(timetablecode,timeslotno,istimeslotnoofMonToFri,istimeslotnobreak,timeslotno_starttime,timeslotno_starttime_ampm,timeslotno_endtime,timeslotno_endtime_ampm,timeslotno_length)
									VALUES('$this->timetablecode','$timeslotno','$istimeslotnoofMonToFri','$istimeslotnobreak','$timeslotno_starttime','$timeslotno_starttime_ampm','$timeslotno_endtime','$timeslotno_endtime_ampm','$interval')";
							if($result_new = mysql_query($query_insert,$connid)){
								//echo "SUCCESS";
							}
						}	
						$slot_no = $slot_no+1;		
					}
					
					
				}
			}else{ // for mon to fri and sat part

				$counter=0;
				for($i=1;$i<=2;$i++){
					$flag = 'mf';
					if($i == 2){
						$flag = 's';
						unset($break_array);
					}
					$total_periods = $_POST["total_periods_$flag"];
					$total_breaks = $_POST["total_breaks_$flag"];
					$slots = $total_periods + $total_breaks;
					
					$break_array[] = array();
					for($bi = 1 ; $bi <= $total_breaks  ; $bi++){
						array_push($break_array,$_POST["period_before_break_".$flag."_$bi"]);
					}
					$start_time = "";
					$end_time = "";
					$slot_no = 1;

					for($pi = 1 ; $pi <= $total_periods ; $pi++){
						if($pi==1){
							$start_time = $_POST["school_start_".$flag."_hr"].':'.$_POST["school_start_".$flag."_min"].':00';
							$interval   = $_POST["duration_period_".$flag."_$pi"];
							$starttime_arr = explode(":",$start_time);
							$time = mktime($starttime_arr[0],$starttime_arr[1],$starttime_arr[2]);
							$end_time = date("H:i:s", ($time + ($interval * 60)));
							$timeslotno = $slot_no;
							
							if($flag == 's'){
								$istimeslotnoofMonToFri = 'N';
							}else{
								$istimeslotnoofMonToFri = 'Y';
							}
							
							$istimeslotnobreak = 'N';
							$timeslotno_starttime = $start_time;
							$timeslotno_endtime = $end_time;
							$timeslotno_starttime_ampm = $_POST["school_start_".$flag."_ampm"];
							$timeslotno_endtime_ampm = $_POST["school_start_".$flag."_ampm"];
							//check for start time 24->12 
							$starttime_arr = explode(":",$timeslotno_starttime);
							$start_hr = $starttime_arr[0];
							if($start_hr>=12){
								$timeslotno_starttime_ampm = 'PM';
							}
							if($start_hr>12){
								$start_hr=$start_hr-12;	
							}
							$starttime_arr[0] = $start_hr;
							$timeslotno_starttime=implode(":",$starttime_arr);
							//check for start time 24->12 
							$endtime_arr = explode(":",$timeslotno_endtime);
							$end_hr = $endtime_arr[0];
							if($end_hr>=12){
								$timeslotno_endtime_ampm = 'PM';
							}
							if($end_hr>12){
								$end_hr=$end_hr-12;	
							
							}
							$endtime_arr[0] = $end_hr;
							$timeslotno_endtime=implode(":",$endtime_arr);
							if($mode == 'edit')
							{
								if($counter==1)
								{
									$query_update="UPDATE bt_schooltimetable_timings SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no AND istimeslotnoofMonToFri = 'N'";
									
								}else
								{
									$query_update="UPDATE bt_schooltimetable_timings SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no ";	
								}
								//echo "<br>UPDATE QUERY IS ".$query_update."COUNTER VALUE IS ".$counter;							
								$result_new = mysql_query($query_update,$connid);								
							}else{								
								$query_insert = "INSERT INTO bt_schooltimetable_timings
										(timetablecode,timeslotno,istimeslotnoofMonToFri,istimeslotnobreak,timeslotno_starttime,timeslotno_starttime_ampm,timeslotno_endtime,timeslotno_endtime_ampm,timeslotno_length)
										VALUES('$this->timetablecode','$timeslotno','$istimeslotnoofMonToFri','$istimeslotnobreak','$timeslotno_starttime','$timeslotno_starttime_ampm','$timeslotno_endtime','$timeslotno_endtime_ampm','$interval')";
								if($result_new = mysql_query($query_insert,$connid)){
									//echo "SUCCESS";
								}
							}	
							$slot_no = $slot_no+1;	
						}else{
							$start_time = $end_time;
							$interval = $_POST["duration_period_".$flag."_$pi"];
							$starttime_arr = explode(":",$start_time);
							$time = mktime($starttime_arr[0],$starttime_arr[1],$starttime_arr[2]);
							$end_time = date("H:i:s", ($time + ($interval * 60)));
							$timeslotno = $slot_no;
							if($flag == 's'){
								$istimeslotnoofMonToFri = 'N';
							}else{
								$istimeslotnoofMonToFri = 'Y';
							}
							
							$istimeslotnobreak = 'N';
							$timeslotno_starttime = $start_time;
							$timeslotno_endtime = $end_time;
							$timeslotno_starttime_ampm = $_POST["school_start_".$flag."_ampm"];
							$timeslotno_endtime_ampm = $_POST["school_start_".$flag."_ampm"];
							//check for start time 24->12 
							$starttime_arr = explode(":",$timeslotno_starttime);
							$start_hr = $starttime_arr[0];
							if($start_hr>=12){
								$timeslotno_starttime_ampm = 'PM';
							}
							if($start_hr>12){
								$start_hr=$start_hr-12;	
							}
							$starttime_arr[0] = $start_hr;
							$timeslotno_starttime=implode(":",$starttime_arr);
							//check for start time 24->12 
							$endtime_arr = explode(":",$timeslotno_endtime);
							$end_hr = $endtime_arr[0];
							if($end_hr>=12){
								$timeslotno_endtime_ampm = 'PM';
							}
							if($end_hr>12){
								$end_hr=$end_hr-12;	
							
							}
							$endtime_arr[0] = $end_hr;
							$timeslotno_endtime=implode(":",$endtime_arr);
							if($mode == 'edit')
							{
								if($counter==1)
								{
									$query_update="UPDATE bt_schooltimetable_timings SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no AND istimeslotnoofMonToFri = 'N'";
									
								}else
								{
									$query_update="UPDATE bt_schooltimetable_timings SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no ";	
								}
								$result_new = mysql_query($query_update,$connid);
								//echo "<BR>UPDATE QUERY IS ".$query_update."COUNTER VALUE IS ".$counter;								
							}else{
								$query_insert = "INSERT INTO bt_schooltimetable_timings
										(timetablecode,timeslotno,istimeslotnoofMonToFri,istimeslotnobreak,timeslotno_starttime,timeslotno_starttime_ampm,timeslotno_endtime,timeslotno_endtime_ampm,timeslotno_length)
										VALUES
				('$this->timetablecode','$timeslotno','$istimeslotnoofMonToFri','$istimeslotnobreak','$timeslotno_starttime','$timeslotno_starttime_ampm','$timeslotno_endtime','$timeslotno_endtime_ampm','$interval')";
								if($result_new = mysql_query($query_insert,$connid)){
									//echo "SUCCESS";
								}
							}	
							$slot_no = $slot_no+1;
						}
						if($keypos = array_search($pi,$break_array)){
							$timeslotno = $slot_no;
							$start_time = $end_time;
							$break_no = $break_array[$keypos];
							$interval = $_POST["duration_break_".$flag."_$keypos"];
							$starttime_arr = explode(":",$start_time);
							$time = mktime($starttime_arr[0],$starttime_arr[1],$starttime_arr[2]);
							$end_time = date("H:i:s", ($time + ($interval * 60)));
							$timeslotno = $slot_no;
							if($flag == 's'){
								$istimeslotnoofMonToFri = 'N';
							}else{
								$istimeslotnoofMonToFri = 'Y';
							}
							$istimeslotnobreak = 'Y';
							$timeslotno_starttime = $start_time;
							$timeslotno_endtime = $end_time;
							$timeslotno_starttime_ampm = $_POST["school_start_".$flag."_ampm"];
							$timeslotno_endtime_ampm = $_POST["school_start_".$flag."_ampm"];
							//check for start time 24->12 
							$starttime_arr = explode(":",$timeslotno_starttime);
							$start_hr = $starttime_arr[0];
							if($start_hr>=12){
								$timeslotno_starttime_ampm = 'PM';
							}
							if($start_hr>12){
								$start_hr=$start_hr-12;	
							}	
							$starttime_arr[0] = $start_hr;
							$timeslotno_starttime=implode(":",$starttime_arr);
							//check for start time 24->12 
							$endtime_arr = explode(":",$timeslotno_endtime);
							$end_hr = $endtime_arr[0];
							if($end_hr>=12){
								$timeslotno_endtime_ampm = 'PM';
							}
							if($end_hr>12){
								$end_hr=$end_hr-12;	
							
							}	
							$endtime_arr[0] = $end_hr;
							$timeslotno_endtime=implode(":",$endtime_arr);
							if($mode == 'edit')
							{
								if($counter==1)
								{
									$query_update="UPDATE bt_schooltimetable_timings SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no AND istimeslotnoofMonToFri = 'N'";
									
								}else
								{
									$query_update="UPDATE bt_schooltimetable_timings SET istimeslotnobreak='$istimeslotnobreak', timeslotno_starttime='$timeslotno_starttime',timeslotno_starttime_ampm='$timeslotno_starttime_ampm',timeslotno_endtime='$timeslotno_endtime',timeslotno_endtime_ampm='$timeslotno_endtime_ampm',timeslotno_length='$interval' WHERE timetablecode=$this->timetablecode AND timeslotno = $slot_no ";	
								}
								//echo "<br>UPDATE QUERY IS ".$query_update."COUNTER VALUE IS ".$counter;
								$result_new = mysql_query($query_update,$connid);								
							}else{
								$query_insert = "INSERT INTO bt_schooltimetable_timings
									(timetablecode,timeslotno,istimeslotnoofMonToFri,istimeslotnobreak,timeslotno_starttime,timeslotno_starttime_ampm,timeslotno_endtime,timeslotno_endtime_ampm,timeslotno_length)
									VALUES('$this->timetablecode','$timeslotno','$istimeslotnoofMonToFri','$istimeslotnobreak','$timeslotno_starttime','$timeslotno_starttime_ampm','$timeslotno_endtime','$timeslotno_endtime_ampm','$interval')";
									$result_new = mysql_query($query_insert,$connid);
							}		
								$slot_no = $slot_no+1;		
						}
						if($slot_no > ($_POST["total_periods_mf"]+$_POST["total_breaks_mf"]))
						{
							$counter = 1;
						}	
					}
				}
			}
			echo "<script>schooltimingssaved();</script>";
		}
	}
	//Shgool timing details ends here - Nitin
	
	//NEW FUNCTIONS ADDED BY NITIN
	function getTimeTableStructure($userid,$connid)
	{
		$query_get_structure = "SELECT *
								FROM bt_schooltimetable_master
								WHERE timetablecode = $this->timetablecode ";
		if($result_get_structure = mysql_query($query_get_structure,$connid)){
			while($row_structure=mysql_fetch_array($result_get_structure)){
							
				if($row_structure['isweekdayshavesametimings'] == 'Y')
				{
					$this->isweekdayshavesametimings = 'Yes';	
					$this->MonToSat_TotalPeriods      = $row_structure['MonToFri_TotalPeriods'];
					$this->MonToSat_TotalBreaks       = $row_structure['MonToFri_TotalBreaks'];
				}else{
					$this->isweekdayshavesametimings = 'No'	;
				}
				
				$this->academicsession_startdate  = $row_structure['academicsession_startdate'];
				$this->academicsession_enddate    = $row_structure['academicsession_enddate'];
				$this->MonToFri_TotalPeriods      = $row_structure['MonToFri_TotalPeriods'];
				$this->MonToFri_TotalBreaks       = $row_structure['MonToFri_TotalBreaks'];
				$this->Sat_TotalPeriods           = $row_structure['Sat_TotalPeriods'];
				$this->Sat_TotalBreaks            = $row_structure['Sat_TotalBreaks'];
			}
		}
	}
	
	function getTimeTable($connid)
	{
		$query_timetable = "SELECT * FROM bt_schooltimetable_timings
							WHERE timetablecode = $this->timetablecode";
		if($result_timetable = mysql_query($query_timetable,$connid))
		{
			$slot_array[]=array();
			
			if($this->isweekdayshavesametimings == "Yes"){
				$flag = 'ms';
				$slots = $this->MonToSat_TotalPeriods + $this->MonToSat_TotalBreaks;
				$break_no =1;
				$period_no = 1;
				for($i = 1 ; $i <= $slots ; $i++){
					$row_timetable = mysql_fetch_array($result_timetable);
					if($i == 1){// for period 1
						$school_start_time = $row_timetable['timeslotno_starttime'];
						$starttime_arr = explode(":",$school_start_time);
						$slot_array['school_start_ms_hr']   = $starttime_arr[0];
						$slot_array['school_start_ms_min']  = $starttime_arr[1];
						$slot_array['school_start_ms_ampm'] = $row_timetable['timeslotno_starttime_ampm'];  
						$slot_array['duration_period_ms_1'] = $row_timetable['timeslotno_length'];	
						$period_no = $period_no + 1;
					}else{ //get for other periods and breaks
						
						if($row_timetable['istimeslotnobreak']== 'Y') //for breaks
						{
							$slot_array["period_before_break_".$flag."_".$break_no] = $period_no-1;
							$slot_array["duration_break_".$flag."_".$break_no] = $row_timetable['timeslotno_length'];
							$break_no = $break_no + 1;
						}else // for periods
						{
							$slot_array["duration_period_".$flag."_".$period_no] = $row_timetable['timeslotno_length'];
							$period_no = $period_no + 1;
						}
						
					}
				}
			}//if for mon to sat ends here
			else//for mon to fri and sat starts here
			{
				for($j=1;$j<=2;$j++){
					$flag = 'mf';
					if($j == 2){
						$flag = 's';
					}
					if($flag == 'mf'){
						$slots = $this->MonToFri_TotalPeriods + $this->MonToFri_TotalBreaks;
						
					}else{
						$slots = $this->Sat_TotalPeriods + $this->Sat_TotalBreaks;
					}
					$break_no =1;
					$period_no = 1;
					
					for($i = 1 ; $i <= $slots ; $i++){
						
						$row_timetable = mysql_fetch_array($result_timetable);
						if($i == 1){// for period 1
							$school_start_time = $row_timetable['timeslotno_starttime'];
							$starttime_arr = explode(":",$school_start_time);
							$slot_array["school_start_".$flag."_hr"]   = $starttime_arr[0];
							$slot_array["school_start_".$flag."_min"]  = $starttime_arr[1];
							$slot_array['school_start_'.$flag.'_ampm'] = $row_timetable['timeslotno_starttime_ampm'];  
							$slot_array['duration_period_'.$flag.'_1'] = $row_timetable['timeslotno_length'];	
							$period_no = $period_no + 1;
						}else{ //get for other periods and breaks

							if($row_timetable['istimeslotnobreak'] == 'Y') //for breaks
							{
								$slot_array["period_before_break_".$flag."_".$break_no] = $period_no-1;
								$slot_array["duration_break_".$flag."_".$break_no] = $row_timetable['timeslotno_length'];
								$break_no = $break_no + 1;
							}else // for periods
							{
								$slot_array["duration_period_".$flag."_".$period_no] = $row_timetable['timeslotno_length'];
								$period_no = $period_no + 1;

							}
						}
					}	
				}
			}
			return $slot_array;
		}//end if 
	}//end function gettimetable	
	
	function getClassWiseTimeTable($userid,$connid)
	{
		$this->setpostvars();
		if(isset($_POST['submit_class_section']) || (isset($this->classe) && isset($this->sectione)))
		{
			$query ="SELECT * FROM bt_schooltimetable_master WHERE timetablecode=".$this->timetablecode;
			$timeslot_result = new dbquery($query,$connid);
			$timeslot_row = $timeslot_result->getrowarray();
			
			$total_periods = array();
			if($timeslot_row['isweekdayshavesametimings'] == 'Y')
			{
				$total_periods[1] =  $timeslot_row['MonToFri_TotalPeriods'];
				$this->Sat_TotalPeriods          = $timeslot_row['Sat_TotalPeriods'];
				$this->Sat_TotalBreaks           = $timeslot_row['Sat_TotalBreaks'];
				$this->isweekdayshavesametimings = "Yes";
				
			}else
			{ 
				if($timeslot_row['MonToFri_TotalPeriods'] > $timeslot_row['Sat_TotalPeriods'])
				{ 
					$total_periods[1] =  $timeslot_row['MonToFri_TotalPeriods'];
					$total_periods[2] =  $timeslot_row['Sat_TotalPeriods'];
				}else 
				{
					$total_periods[1] =  $timeslot_row['Sat_TotalPeriods'];
					$total_periods[2] =  $timeslot_row['MonToFri_TotalPeriods'];
				}
				$this->MonToFri_TotalPeriods      = $timeslot_row['MonToFri_TotalPeriods'];
				$this->MonToFri_TotalBreaks       = $timeslot_row['MonToFri_TotalBreaks'];
				$this->Sat_TotalPeriods           = $timeslot_row['Sat_TotalPeriods'];
				$this->Sat_TotalBreaks            = $timeslot_row['Sat_TotalBreaks'];
				$this->isweekdayshavesametimings  = "No";
				
			}
			return $total_periods;
		}
	}
	function getAllTeachers($userid,$connid)
	{
		$query = "SELECT teacher_id,firstname,lastname FROM teacher_master WHERE schoolcode=".$userid;
		$result_teachers = mysql_query($query,$connid);
		$teachers = array();
		while($row = mysql_fetch_array($result_teachers))
		{
			$teachers[$row['teacher_id']]=$row['firstname']." ".$row['lastname'];
		}
		return $teachers;
	}
	
	function saveClassTimeTable($userid,$connid)
	{
		if(isset($_POST['submit_class_timetable']))
		{
			$mode="";
			$timetablecode    = $_POST['timetablecode'];
			$class            = $_POST['classe'];
			$section          = $_POST['sectione'];
			$timetabledetails = $this->fetchTimeTableDetails($timetablecode,$connid);
			$slots1 = $timetabledetails['MonToFri_TotalPeriods']; 
			
			$query_delete = "DELETE FROM bt_schooltimetable_classsectionwise WHERE timetablecode=".$timetablecode." AND class='".$class."' AND section='".$section."'";
			$result_delete = mysql_query($query_delete,$connid) OR die(mysql_error());
			 
			for($period=1 ; $period <= $slots1 ; $period++ )
			{
				
				$query = "INSERT INTO bt_schooltimetable_classsectionwise VALUES ('$timetablecode','$class','$section','$period',";
				for($di=0; $di<count($this->weekdays); $di++)
				{
					$period_subject = 'subject_period_'.$period.'_'.$this->weekdays[$di+1];
					$period_teacher = 'teacher_period_'.$period.'_'.$this->weekdays[$di+1];
					$query .= "'".$_POST[$period_subject]."','".$_POST[$period_teacher]."',";	
				}
				$query = substr($query,0,-1).")";
				$result_insert = mysql_query($query,$connid) OR die(mysql_error());
			}
			echo "<script>classtimetablesaved();</script>";
		}
	}
	
	function fetchTimeTableDetails($timetablecode, $connid)
	{
		$query       = "SELECT * FROM bt_schooltimetable_master WHERE timetablecode=".$timetablecode;
		$result      = mysql_query($query, $connid);
		$row         = mysql_fetch_array($result);
		$table_array = array();
		foreach ($row as $key => $value)
		{
			$table_array[$key] = $value;
		}
		return $table_array;
	}
	
	//GET THE SAVED CLASS TIME TABLE FROM bt_schooltimetable_classsectionwise
	function fetchClassTimeTableDetails($connid)
	{
		if($this->actiontoperform == "Edit Class Time Table")
		{	
			//echo "<BR> THIS class = ".$this->classe;
			$query       = "SELECT * FROM bt_schooltimetable_classsectionwise WHERE timetablecode=".$this->timetablecode." AND class='".$this->classe."' AND section= '$this->sectione' ORDER BY periodno" ;
			$timetable_result      = mysql_query($query, $connid) or die(mysql_error());
				
			return $timetable_result;
		}	
	}
	
	//ADDED ON 9 DEC
	function fetchSchoolcodeForStudent($cts_number,$connid)
	{
		$query       = "SELECT schoolcode FROM student_master WHERE cts_number=".$cts_number;
		$result      = mysql_query($query, $connid) OR die(mysql_error());
		$row         = mysql_fetch_array($result);
		return $row['schoolcode'];
	}
	
	function fetchClassTimeTable($userid,$usertype,$class,$section,$connid)
	{
		if($usertype=="School")
			$schoolcode = $userid;
		else
			$schoolcode = $this->fetchSchoolcodeForStudent($userid,$connid);
		
		$query = "SELECT * from bt_schooltimetable_master WHERE schoolcode = '".$schoolcode."' ORDER BY timetablecode DESC LIMIT 1";
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		$this->timetablecode = $row['timetablecode'];
		$this->classe = $class;
		$this->sectione = $section; 
		$this->isweekdayshavesametimings = $row['isweekdayshavesametimings'];
		if($this->isweekdayshavesametimings == "Y")
		{
			$this->MonToSat_TotalPeriods  = $row['MonToFri_TotalPeriods'];
			$this->MonToSat_TotalBreaks  = $row['MonToFri_TotalBreaks'];
		}else
		{
			$this->MonToFri_TotalPeriods     = $row['MonToFri_TotalPeriods'];
			$this->MonToFri_TotalBreaks      = $row['MonToFri_TotalBreaks'];
			$this->Sat_TotalPeriods          = $row['Sat_TotalPeriods'];
			$this->Sat_TotalBreaks           = $row['Sat_TotalBreaks'];
		}	
		
		
		$query = "SELECT * from bt_schooltimetable_classsectionwise WHERE timetablecode = '".$this->timetablecode."' AND class = '".$class."' AND section = '".$section."' ORDER BY periodno";
		$result = mysql_query($query,$connid);

		$classtimetable_array[] = array();
		$count = 1;
		while($row = mysql_fetch_array($result))
		{
			$classtimetable_array[$count] = $row;
			$count++;
		}
		//------>starts*********************************************
		if($this->isweekdayshavesametimings == "Y")
		{
			$timings_array = $this->getTimingsArray($this->timetablecode,$connid,'yes');
		}else 
		{
			$timings_array1 = $this->getTimingsArray($this->timetablecode,$connid,'yes');
			$timings_array2 = $this->getTimingsArray($this->timetablecode,$connid,'no');
		}

		$weekdays = $this->weekdays;
		$slots    = $this->getTotalSlots();
	

		$classTimeTableView .= "<table border= \"1\" align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
			<tr bordercolor='#FFFFFF'>
				<td>
					
					<table width=\"100%\" border=\"1\" cellspacing=\"2\" cellpadding=\"2\"  align=\"\" style=\"border-collapse: collapse\" class=\"noprint\">
					  <tr><table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
					  <tr bordercolor=''><td align='center' colspan='' bgcolor='#bf0000'><font color='#FFFFFF'><b>School Code&nbsp;:&nbsp;";$classTimeTableView.= $schoolcode; $classTimeTableView.="&nbsp;&nbsp;&nbsp; Class &nbsp;:&nbsp;";$classTimeTableView.= $class; $classTimeTableView.="&nbsp;&nbsp;&nbsp; Section &nbsp;:&nbsp;"; $classTimeTableView.= $section;$classTimeTableView.= "</b></font></td></tr>
					  
					  </table>
					  <table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
					  <tr bordercolor=''><!--<td align='' colspan='1' bgcolor='#bf0000'><font color='#FFFFFF'><b>Days</b></font></td>--><td align=\"center\" colspan='";$classTimeTableView.= $slots+2; $classTimeTableView.= "' bgcolor='#bf0000'><font color='#FFFFFF'><b>TimeTable Details<b></font></td></tr>";
						if($this->isweekdayshavesametimings == "Y"){
							$classTimeTableView.=	"<tr><td><b>Days</b></td>";
								$b=1;
								$p=1;
							  	for($n=1 ; $n <= $slots; $n++ )
								{							  
									if($timings_array[$n]['istimeslotnobreak'] == 'Y')
									{
										$classTimeTableView.= "<td><b>Break ".$b."</b>";
										$classTimeTableView.= "<br>";
										$time = substr($timings_array[$n]['timeslotno_starttime'],0,5);
										$classTimeTableView.= "<b>".$time."</b>";	
										"</td>" ;
										$b++;		
									}else
									{
										$classTimeTableView.= "<td><b>Period ".$p."</b>";
										$classTimeTableView.= "<br>";
										$time = substr($timings_array[$n]['timeslotno_starttime'],0,5);
										$classTimeTableView.= "<b>".$time."</b>";	
										$classTimeTableView.= "</td>" ;
										$p++;
									}
								}
								$classTimeTableView.=	"</tr>";
							for ($i = 1 ; $i <= count($weekdays) ; $i++)
							{	
							  	$day = strtolower($weekdays[$i]);
								$day_new = substr($day,0,3);
							  	$national_holiday = $this->checkNationalHoliday($schoolcode,$this->day_array[$i]['date'],$connid);		
								$school_holiday = $this->checkSchoolHoliday($schoolcode,$this->day_array[$i]['date'],$connid);		
							  	$classTimeTableView.= "<tr>
								<td><b>"; $classTimeTableView.= $weekdays[$i];
							  	$flag = 'No';
								if($this->day_array[$i]['day_no'] != 0)
								{
									//$classTimeTableView.= "<br>".date('d-m-Y',strtotime($this->day_array[$i]['date']));
									if(($national_holiday > 0) || ($school_holiday > 0))
									{
										$flag = 'Yes';
									}
									//$classTimeTableView.= $flag;
								}	
								$classTimeTableView.= "</b></td>";
								$k = 1;
					 			for( $j = 1; $j <= $slots ; $j++)
					 			{	 
										if($timings_array[$j]['istimeslotnobreak'] == 'Y')
										{		
												if($flag == "Yes")
												{											
													$classTimeTableView.= "<td bgcolor='".$this->day_array[$i]['color']."' colspan='".$slots."' align='center'>";
													if($national_holiday > 0)
														$classTimeTableView.=  "<b>".$national_holiday['ntholiday_name']."</b>";
													if($school_holiday > 0)
														$classTimeTableView.=  "<b>".$school_holiday['scholiday_name']."</b>";	
													$classTimeTableView.=	"</td>";
													break;											
												}else
												{		
													$classTimeTableView.= "<td bgcolor=\"Lime\">";		
													$time = substr($timings_array[$j]['timeslotno_starttime'],0,5);	
													//$classTimeTableView.= $time;
													/*echo "";
													echo "-";
													echo "";
													echo $timings_array[$j]['timeslotno_endtime'];*/
													/*echo "";
													echo "-";
													echo "";
													$time = substr($timings_array[$j]['timeslotno_endtime'],0,5);
													echo $time;*/
													//$classTimeTableView.= "<br><br>";
													//$classTimeTableView.= "<b>BREAK</b>";
													$classTimeTableView.=	"</td>";	
												}
											
										
										}else 
										{	
											if($flag == "Yes")
											{											
												$classTimeTableView.= "<td bgcolor='".$this->day_array[$i]['color']."' colspan='".($slots+1)."' align='center'>";
												if($national_holiday > 0)
													$classTimeTableView.=  "<b>".$national_holiday['ntholiday_name']."</b>";
												if($school_holiday > 0)
													$classTimeTableView.=  "<b>".$school_holiday['scholiday_name']."</b>";	
												$classTimeTableView.=	"</td>";
												break;											
											}else
											{
												$classTimeTableView.=	"<td title='Teacher Name: ";
												if($classtimetable_array[$k][$day_new."_teacher"]>0)
													$classTimeTableView.= $this->fetchTeacherName($classtimetable_array[$k][$day_new."_teacher"],$connid);
												$classTimeTableView.= "'>"; 
												//$time = substr($timings_array[$j]['timeslotno_starttime'],0,5);
												//$classTimeTableView.= $time;
												/*echo "";
												echo "-";
												echo "";
												echo $timings_array[$j]['timeslotno_endtime'];*/
												/*echo "";
												echo "-";
												echo "";
												$time = substr($timings_array[$j]['timeslotno_endtime'],0,5);
												echo $time;*/
												//$classTimeTableView.= "<br><br>";
												$subject = $this->getFullSubjectName($classtimetable_array[$k][$day_new."_subject"]);
												$classTimeTableView.= $subject;
												$classTimeTableView.=	"</td>";
												$k++;		
											
											}
										}
									
								}
							$classTimeTableView.=	"</tr>";
						}
						}	
						else
						{
							$classTimeTableView.=	"<tr><td><b>Days</b></td>";
								$b=1;
								$p=1;
							  	for($n=1 ; $n <= $slots; $n++ )
								{							  
									if($timings_array1[$n]['istimeslotnobreak'] == 'Y')
									{
										$classTimeTableView.= "<td><b>Break ".$b."</b>";
										$classTimeTableView.= "<br>";
										$time = substr($timings_array1[$n]['timeslotno_starttime'],0,5);
										$classTimeTableView.= "<b>".$time."</b>";	
										"</td>" ;
										$b++;		
									}else
									{
										$classTimeTableView.= "<td><b>Period ".$p."</b>";
										$classTimeTableView.= "<br>";
										$time = substr($timings_array1[$n]['timeslotno_starttime'],0,5);
										$classTimeTableView.= "<b>".$time."</b>";	
										$classTimeTableView.= "</td>" ;
										$p++;
									}
								}
								$classTimeTableView.=	"</tr>";
		     				for ($i = 1 ; $i < count($weekdays) ; $i++)
						  {	
							  	$day = strtolower($weekdays[$i]);
								$day_new = substr($day,0,3);
							  	$national_holiday = $this->checkNationalHoliday($schoolcode,$this->day_array[$i]['date'],$connid);		
								$school_holiday = $this->checkSchoolHoliday($schoolcode,$this->day_array[$i]['date'],$connid);		
							  	$classTimeTableView.= "<tr>
								<td><b>"; $classTimeTableView.= $weekdays[$i];
							  	$flag = 'No';
								if($this->day_array[$i]['day_no'] != 0)
								{
									//$classTimeTableView.= "<br>".date('d-m-Y',strtotime($this->day_array[$i]['date']));
									if(($national_holiday > 0) || ($school_holiday > 0))
									{
										$flag = 'Yes';
									}
									//$classTimeTableView.= $flag;
								}	
								$classTimeTableView.= "</b></td>";
								$k = 1;
					 			for( $j = 1; $j <= $slots ; $j++)
					 			{	
					 					if($i == count($weekdays))
											$timings_array1 = $timings_array2;
										if($timings_array1[$j]['istimeslotnobreak'] == 'Y')
										{	
												$classTimeTableView.=	"<td bgcolor=\"Lime\">"; 
												$time = substr($timings_array1[$j]['timeslotno_starttime'],0,5);
												//$classTimeTableView.= $time;	
												//echo $timings_array1[$j]['timeslotno_starttime'];
												/*echo "";
												echo "-";
												echo "";
												echo $timings_array1[$j]['timeslotno_endtime'];*/
												/*echo "";
												echo "-";
												echo "";
												$time = substr($timings_array1[$j]['timeslotno_endtime'],0,5);
												echo $time;*/
												//$classTimeTableView.= "<br><br>";
												//$classTimeTableView.= "<b>BREAK</b>";
												$classTimeTableView.=	"</td>";	
											
											
										}else 
										{
											if($flag == "Yes")
											{											
												$classTimeTableView.= "<td bgcolor='".$this->day_array[$i]['color']."' colspan='".($slots+1)."' align='center'>";
												if($national_holiday > 0)
													$classTimeTableView.=  "<b>".$national_holiday['ntholiday_name']."</b>";
												if($school_holiday > 0)
													$classTimeTableView.=  "<b>".$school_holiday['scholiday_name']."</b>";	
												$classTimeTableView.=	"</td>";
												break;											
											}else
											{
												$classTimeTableView.= "<td title='Teacher Name: ";
												if($classtimetable_array[$k][$day_new."_teacher"]>0)
													$classTimeTableView.= $this->fetchTeacherName($classtimetable_array[$k][$day_new."_teacher"],$connid);
												$classTimeTableView.= "'>";
												$time = substr($timings_array1[$j]['timeslotno_starttime'],0,5);
												//$classTimeTableView.= $time;	
												//echo $timings_array1[$j]['timeslotno_starttime'];
												/*echo "";
												echo "-";
												echo "";
												$time = substr($timings_array1[$j]['timeslotno_endtime'],0,5);
												echo $time;*/
												//echo $timings_array1[$j]['timeslotno_endtime'];
												//$classTimeTableView.= "<br><br>";
												$subject = $this->getFullSubjectName($classtimetable_array[$k][$day_new."_subject"]);
												$classTimeTableView.= $subject;
												//$classTimeTableView.= "<b>".$classtimetable_array[$k][$day_new."_subject"]."</b>";
												$classTimeTableView.=	"</td>";
												$k++;	
											}
										}
									}
							  }
							  //for saturday
							  	$classTimeTableView.=	"<tr bgcolor = 'yellow'><td colspan=".($slots+1)."></td>";
							  	$classTimeTableView.=	"<tr><td><b>Day</b></td>";
								$b=1;
								$p=1;
							  	for($n=1 ; $n <= ($this->Sat_TotalPeriods+$this->Sat_TotalBreaks); $n++ )
								{							  
									if($timings_array2[$n]['istimeslotnobreak'] == 'Y')
									{
										$classTimeTableView.= "<td><b>Break ".$b."</b>";
										$classTimeTableView.= "<br>";
										$time = substr($timings_array2[$n]['timeslotno_starttime'],0,5);
										$classTimeTableView.= "<b>".$time."</b>";	
										$classTimeTableView.= "</td>" ;
										$b++;		
									}else
									{
										$classTimeTableView.= "<td><b>Period ".$p."</b>";
										$classTimeTableView.= "<br>";
										$time = substr($timings_array2[$n]['timeslotno_starttime'],0,5);
										$classTimeTableView.= "<b>".$time."</b>";	
										$classTimeTableView.= "</td>" ;
										$p++;
									}
								}
								$classTimeTableView.=	"</tr>";
								$i = 6;
							  	$day = strtolower($weekdays[$i]);
								$day_new = substr($day,0,3);
							  	$national_holiday = $this->checkNationalHoliday($schoolcode,$this->day_array[$i]['date'],$connid);		
								$school_holiday = $this->checkSchoolHoliday($schoolcode,$this->day_array[$i]['date'],$connid);		
							  	$classTimeTableView.= "<tr>
								<td><b>"; $classTimeTableView.= $weekdays[$i];
							  	$flag = 'No';
								if($this->day_array[$i]['day_no'] != 0)
								{
									//$classTimeTableView.= "<br>".date('d-m-Y',strtotime($this->day_array[$i]['date']));
									if(($national_holiday > 0) || ($school_holiday > 0))
									{
										$flag = 'Yes';
									}
									//$classTimeTableView.= $flag;
								}	
								$classTimeTableView.= "</b></td>";
								$k = 1;
					 			for( $j = 1; $j <= ($this->Sat_TotalPeriods+$this->Sat_TotalBreaks) ; $j++)
					 			{	
					 					if($i == count($weekdays))
											$timings_array1 = $timings_array2;
										if($timings_array1[$j]['istimeslotnobreak'] == 'Y')
										{	
												$classTimeTableView.=	"<td bgcolor=\"Lime\">"; 
												$time = substr($timings_array1[$j]['timeslotno_starttime'],0,5);
												//$classTimeTableView.= $time;	
												//echo $timings_array1[$j]['timeslotno_starttime'];
												/*echo "";
												echo "-";
												echo "";
												echo $timings_array1[$j]['timeslotno_endtime'];*/
												/*echo "";
												echo "-";
												echo "";
												$time = substr($timings_array1[$j]['timeslotno_endtime'],0,5);
												echo $time;*/
												//$classTimeTableView.= "<br><br>";
												//$classTimeTableView.= "<b>BREAK</b>";
												$classTimeTableView.=	"</td>";	
											
											
										}else 
										{
											if($flag == "Yes")
											{											
												$classTimeTableView.= "<td bgcolor='".$this->day_array[$i]['color']."' colspan='".($this->Sat_TotalPeriods+$this->Sat_TotalBreaks)."' align='center'>";
												if($national_holiday > 0)
													$classTimeTableView.=  "<b>".$national_holiday['ntholiday_name']."</b>";
												if($school_holiday > 0)
													$classTimeTableView.=  "<b>".$school_holiday['scholiday_name']."</b>";	
												$classTimeTableView.=	"</td>";
												break;											
											}else
											{
												$classTimeTableView.= "<td title='Teacher Name: ";
												if($classtimetable_array[$k][$day_new."_teacher"]>0)
													$classTimeTableView.= $this->fetchTeacherName($classtimetable_array[$k][$day_new."_teacher"],$connid);
												$classTimeTableView.= "'>";
												$time = substr($timings_array1[$j]['timeslotno_starttime'],0,5);
												//$classTimeTableView.= $time;	
												//echo $timings_array1[$j]['timeslotno_starttime'];
												/*echo "";
												echo "-";
												echo "";
												$time = substr($timings_array1[$j]['timeslotno_endtime'],0,5);
												echo $time;*/
												//echo $timings_array1[$j]['timeslotno_endtime'];
												//$classTimeTableView.= "<br><br>";
												$subject = $this->getFullSubjectName($classtimetable_array[$k][$day_new."_subject"]);
												$classTimeTableView.= $subject;
												//$classTimeTableView.= "<b>".$classtimetable_array[$k][$day_new."_subject"]."</b>";
												$classTimeTableView.=	"</td>";
												$k++;	
											}
										}
									}
							  
						}
					 	$classTimeTableView.=	"</tr>
					  	</table>
					  </tr>			    		  
					</table>
				</td>
			</tr>
		</table>";
		
		$classTimeTableView.= "<div align=\"center\" ><a href='javascript:window.close()'><b>Close Window</b></a></div>";
		//--------->ends*********************************************
		return $classTimeTableView;
	}

	//fetch class time table in format  2
	function fetchClassTimeTable2($userid,$class,$section,$connid)
	{
		$query = "SELECT * from bt_schooltimetable_master WHERE schoolcode = '".$userid."'  ORDER BY timetablecode DESC LIMIT 1";
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		$this->timetablecode = $row['timetablecode'];
		$this->classe = $class;
		$this->sectione = $section; 
		$this->isweekdayshavesametimings = $row['isweekdayshavesametimings'];
		if($this->isweekdayshavesametimings == "Y")
		{
			$this->MonToSat_TotalPeriods  = $row['MonToFri_TotalPeriods'];
			$this->MonToSat_TotalBreaks  = $row['MonToFri_TotalBreaks'];
		}else
		{
			$this->MonToFri_TotalPeriods     = $row['MonToFri_TotalPeriods'];
			$this->MonToFri_TotalBreaks      = $row['MonToFri_TotalBreaks'];
			$this->Sat_TotalPeriods          = $row['Sat_TotalPeriods'];
			$this->Sat_TotalBreaks           = $row['Sat_TotalBreaks'];
		}	
		
		
		$query = "SELECT * from bt_schooltimetable_classsectionwise WHERE timetablecode = '".$this->timetablecode."' AND class = '".$class."' AND section = '".$section."' ORDER BY periodno";
		$result = mysql_query($query,$connid);

		$classtimetable_array[] = array();
		$count = 1;
		while($row = mysql_fetch_array($result))
		{
			$classtimetable_array[$count] = $row;
			$count++;
		}
		
		//------>starts*********************************************
		if($this->isweekdayshavesametimings == "Y")
		{
			$timings_array = $this->getTimingsArray($this->timetablecode,$connid,'yes');
		}else 
		{
			$timings_array1 = $this->getTimingsArray($this->timetablecode,$connid,'yes');
			$timings_array2 = $this->getTimingsArray($this->timetablecode,$connid,'no');
		}
		$weekdays = $this->weekdays;
		$slots    = $this->getTotalSlots();
		$classTimeTableView = "";
		
		$classTimeTableView .= "<table border= \"1\" align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
			<tr bordercolor='#FFFFFF'>
				<td>
					
					<table width=\"100%\" border=\"1\" cellspacing=\"2\" cellpadding=\"2\"  align=\"\" style=\"border-collapse: collapse\" class=\"noprint\">
					  <tr><table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
					  <tr bordercolor=''><td align='center' colspan='' bgcolor='#bf0000'><font color='#FFFFFF'><b>School Code&nbsp;:&nbsp;";$classTimeTableView.= $userid; $classTimeTableView.="&nbsp;&nbsp;&nbsp; Class &nbsp;:&nbsp;";$classTimeTableView.= $class; $classTimeTableView.="&nbsp;&nbsp;&nbsp; Section &nbsp;:&nbsp;"; $classTimeTableView.= $section;$classTimeTableView.= "</b></font></td></tr>
					  
					  </table>
					  <table width=\"100%\" border=\"1\"   cellspacing=\"2\" cellpadding=\"2\"  align=\"center\" style=\"border-collapse: collapse\" class=\"noprint\">
					  <tr bordercolor=''><!--<td align='' colspan='1' bgcolor='#bf0000'><font color='#FFFFFF'><b>Days</b></font></td>--><td align=\"center\" colspan='";$classTimeTableView.= count($this->weekdays)+1; $classTimeTableView.= "' bgcolor='#bf0000'><font color='#FFFFFF'><b>TimeTable Details<b></font></td></tr>";
						$classTimeTableView.= "<tr><td><b>Days</b></td>";  
						for ($days = 1 ; $days <= count($weekdays) ; $days++)
						{
					  	
							$classTimeTableView.="<td><b>"; $classTimeTableView.= $weekdays[$days]; $classTimeTableView.= "</b></td>";
								
					  	}
					  	$classTimeTableView.="</tr>";
						$period_a = 1;
						$period_b = 1;
						$period = 1;
 						for( $i = 1; $i <= $slots ; $i++)
						{				 		
					 		$classTimeTableView.= "<tr><td><b>Time<br><br>Subject</b></td>";	
					 		for ($j = 1 ; $j <= count($weekdays) ; $j++)
					 		{	
					 			$day = strtolower($weekdays[$j]);
								$day_new = substr($day,0,3);
								if($this->isweekdayshavesametimings == "Y")
								{ 
									if($timings_array[$i]['istimeslotnobreak'] == 'Y')
									{		
										$classTimeTableView.= "<td bgcolor=\"Lime\">";		
										$time = substr($timings_array[$i]['timeslotno_starttime'],0,5);																	
										$classTimeTableView.= $time;
											/*echo "";
											echo "-";
											echo "";
											echo $timings_array[$j]['timeslotno_endtime'];*/
											/*echo "";
											echo "-";
											echo "";
											$time = substr($timings_array[$j]['timeslotno_endtime'],0,5);
											echo $time;*/
										$classTimeTableView.= "<br><br>";
										$classTimeTableView.= "<b>BREAK</b>";
										$classTimeTableView.=	"</td>";
									}else 
									{	
										$classTimeTableView.=	"<td title='Teacher Name: ";
										if($classtimetable_array[$period][$day_new."_teacher"]>0)
											$classTimeTableView.= $this->fetchTeacherName($classtimetable_array[$period][$day_new."_teacher"],$connid);
										$classTimeTableView.= "'>"; 
										$time = substr($timings_array[$i]['timeslotno_starttime'],0,5);
										$classTimeTableView.= $time;
											/*echo "";
											echo "-";
											echo "";
											echo $timings_array[$j]['timeslotno_endtime'];*/
											/*echo "";
											echo "-";
											echo "";
											$time = substr($timings_array[$j]['timeslotno_endtime'],0,5);
											echo $time;*/
										$classTimeTableView.= "<br><br>";
										$classTimeTableView.= "<b>".$classtimetable_array[$period][$day_new."_subject"]."</b>";
										$classTimeTableView.=	"</td>";
										if($j == 6)
										{
											$period = $period +1;
										}
									}
								}
								else
								{
									$temp[] = array();
									if($j == count($weekdays))
									{
										$temp = $timings_array2;
										$period = $period_b;
									}	
									else
									{ 
										$temp = $timings_array1;
										$period = $period_a;
									}		
									if($temp[$i]['istimeslotnobreak'] == 'Y')
									{	
										$classTimeTableView.=	"<td bgcolor=\"Lime\">"; 
										$time = substr($temp[$i]['timeslotno_starttime'],0,5);
										$classTimeTableView.= $time;	
											//echo $timings_array1[$j]['timeslotno_starttime'];
											/*echo "";
											echo "-";
											echo "";
											echo $timings_array1[$j]['timeslotno_endtime'];*/
											/*echo "";
											echo "-";
											echo "";
											$time = substr($timings_array1[$j]['timeslotno_endtime'],0,5);
											echo $time;*/
										$classTimeTableView.= "<br><br>";
										$classTimeTableView.= "<b>BREAK</b>";
										$classTimeTableView.=	"</td>";
									}else 
									{
										$classTimeTableView.= "<td title='Teacher Name: ";
										if($classtimetable_array[$period][$day_new."_teacher"]>0)
											$classTimeTableView.= $this->fetchTeacherName($classtimetable_array[$period][$day_new."_teacher"],$connid);
										$classTimeTableView.= "'>";
										$time = substr($temp[$i]['timeslotno_starttime'],0,5);
										$classTimeTableView.= $time;	
											//echo $timings_array1[$j]['timeslotno_starttime'];
											/*echo "";
											echo "-";
											echo "";
											$time = substr($timings_array1[$j]['timeslotno_endtime'],0,5);
											echo $time;*/
										//echo $timings_array1[$j]['timeslotno_endtime'];
										$classTimeTableView.= "<br><br>";
										$classTimeTableView.= "<b>".$classtimetable_array[$period][$day_new."_subject"]."</b>";
										$classTimeTableView.=	"</td>";
										if($j == 5)
										{
											$period_a = $period_a +1;
										}
										if($j == 6)
										{
											$period_b = $period_b +1;
										}
									}
								}
								
							}
					  }
					  
						$classTimeTableView.=	"</tr>
					  	</table>
					  </tr>			    		  
					</table>
				</td>
				
		
			</tr>
			
		</table>	
		<div align=\"center\" ><a href='javascript:window.close()'><b>Close Window</b></a></div>";
		//--------->ends*********************************************
		return $classTimeTableView;
	}

	
	function getTimingsArray($timetablecode,$connid,$mode)
	{
		if($mode == 'yes'){
			$query = "SELECT * FROM bt_schooltimetable_timings WHERE timetablecode = '".$timetablecode."' AND istimeslotnoofMonToFri = 'Y'";
		}else 
		{	
			$query = "SELECT * FROM bt_schooltimetable_timings WHERE timetablecode = '".$timetablecode."' AND istimeslotnoofMonToFri = 'N'";
		}
		
		
		//echo "<BR> The query is ".$query;
		$timings_result = mysql_query($query,$connid);
		$timings_array[] = array();
		$count = 1;
		while($row = mysql_fetch_array($timings_result))
		{
			$timings_array[$count] = $row;
			$count++;
		}
		return $timings_array;
	}

	
	function getTotalSlots()
	{
		if($this->isweekdayshavesametimings == "Y")
		{
			$slots = $this->MonToSat_TotalPeriods + $this->MonToSat_TotalBreaks;
		}
		else 
		{
			if(($this->MonToFri_TotalPeriods + $this->MonToFri_TotalBreaks) > ($this->Sat_TotalPeriods + $this->Sat_TotalBreaks))
			{
				$slots = $this->MonToFri_TotalPeriods + $this->MonToFri_TotalBreaks;
			}else 
			{
				$slots = $this->Sat_TotalPeriods + $this->Sat_TotalBreaks;
			}
		}
		return $slots;
	}
	function checkNationalHoliday($userid,$date,$connid)
	{
		$query = "SELECT * FROM bt_nationalholidaysmaster WHERE ntholiday_date = '".$date."'";
		$result = mysql_query($query,$connid);
		$n_row = mysql_fetch_array($result);
		return $n_row;
	}
	function checkSchoolHoliday($userid,$date,$connid)
	{
		$query = "SELECT * FROM bt_schoolholidaysmaster WHERE scholiday_date = '".$date."' AND schoolcode = '".$userid."'";
		$result = mysql_query($query,$connid);
		$s_row = mysql_fetch_array($result);
		return $s_row;
	}
	
	function getClassFromSchool($schoolid,$connid)
	{
		$query = "SELECT DISTINCT class FROM student_master WHERE schoolcode = '".$schoolid."' ORDER BY CAST(class as UNSIGNED)";
		$result = mysql_query($query,$connid);
		$count = 0;
		$classforschool = array();
		while($row = mysql_fetch_array($result))
		{
			$classforschool[$count]=$row['class'];
			$count++;
		}
		return $classforschool;
	}
	
	function getSectionFromClass($class,$schoolcode,$connid)
	{
		$query = "SELECT DISTINCT section FROM student_master WHERE schoolcode = '".$schoolcode."' and class = '".$class."' ORDER BY section";
		$result = mysql_query($query,$connid) or die(mysql_error());
		$count = 0;
		$sectionforclass = array();
		while($row = mysql_fetch_array($result))
		{
			$sectionforclass[$count]=$row['section'];
			$count++;
		}
		return $sectionforclass;
	}
	
	function getFullSubjectName($short_subj)
	{
		$key = array_search($short_subj,$this->teacher_subjects_shortname);
		$full_subj = $this->teacher_subjects_fullname[$key];
		return $full_subj;
		
	}

	//Shoool timing details ends here - Nitin
	
	//*****************************************************************************************************************************************	
	// Functions for Teacher Training Module starts here (by Vishak)
	
	function getData($query, $connid)
	{
		$query."<br>";	 
		$retVal = '';
		$userResult = new dbquery($query,$connid);	
		while($userRow = $userResult->getrowarray())
		{   $retVal[] = $userRow; 
		}
		return $retVal;
	}
	
	function getTeacherTrainerCombo($connid)
	{
		$query = "SELECT * FROM bt_teachertraining_trainers"; 
		$trainerArr = $this->getData($query,$connid);
		$retStr = '<option value="">&#60;Select&#62;</option>';
		for($i=0; $i<sizeof($trainerArr); $i++)
		{
			$retStr.= '<option value="'.$trainerArr[$i]['trainer_code'].'">'.$trainerArr[$i]['trainer_name'].'</option>';
		}
		return $retStr; 	
		
	}
	
	function getSkillsofSubjectforTeacher($sub,$connid)
	{	
		$query = "Select * from skill_table_teacher where subject = '".$sub."' ";
		$userResult = new dbquery($query,$connid);
		$retArr = array();
		while($row = $userResult->getrowarray())
		{	
			$excl = substr($row['papercode'],3,3);
			$index = $row['papercode']."-".$sub."-";
			if($excl!='GAB')
			{	
				if(!in_array($row['S1'], $retArr) && $row['S1']!='') { $retArr[$index.'S1'] = $row['S1']." - ".$excl;} 
				if(!in_array($row['S2'], $retArr) && $row['S2']!='') { $retArr[$index.'S2'] = $row['S2']." - ".$excl;} 
				if(!in_array($row['S3'], $retArr) && $row['S3']!='') { $retArr[$index.'S3'] = $row['S3']." - ".$excl;} 
				if(!in_array($row['S4'], $retArr) && $row['S4']!='') { $retArr[$index.'S4'] = $row['S4']." - ".$excl;} 
				if(!in_array($row['S5'], $retArr) && $row['S5']!='') { $retArr[$index.'S5'] = $row['S5']." - ".$excl;} 
				if(!in_array($row['S6'], $retArr) && $row['S6']!='') { $retArr[$index.'S6'] = $row['S6']." - ".$excl;} 
				//if(!in_array($row['S7'], $retArr)) { $retArr[] = $row['S7'];} 
			}
		}
		
		$query = "Select * from bt_teachertraining_skills where subject = '".$sub."' ";
		$result = mysql_query($query) OR die(mysql_error());
		while($row = mysql_fetch_array($result))
		{	
			$excl = "";
			$index = "-".$sub."-";
			$skillno = $row['skill_no'];
			if(!in_array($row['skill_no'], $retArr) && $row[$skillno]!='') { $retArr[$index."S".$row['skill_no']] = $row['skillname']." - ".$excl;} 
		}
		
		return $retArr;
	}
	
	function calculateTotalTeachersInRegion($level, $regionArrcode, $connid)
	{
		$userQry2 = '';
		switch($level)
		{
			case "Dzongkhag":
			case "National":
				$userQry2 = "	SELECT count(*)FROM 
									teacher_master as a,
									school_master as b,
									bt_dzongkhag_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.DzongkhagCode in (".$regionArrcode.")";
			break;	
			
			case "Village":
				$userQry2 = "	SELECT count(*)FROM 
									teacher_master as a,
									school_master as b,
									bt_village_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.VillageCode in (".$regionArrcode.")";
			break;	
			
			case "School":
				$userQry2 = "	SELECT count(*) FROM 
									teacher_master as a,
									school_master as b
								WHERE
									a.schoolcode = b.schoolcode and
									b.schoolcode in (".$regionArrcode.")";
			break;
			
			case "Gewog":
				$userQry2 = "SELECT count(*) FROM 
									teacher_master as a,
									school_master as b,
									bt_gewog_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.GewogCode in (".$regionArrcode.")";
			break;
				
		}
		//echo $userQry2;
		$userResult2 = new dbquery($userQry2,$connid);	
			$row = $userResult2->getrowarray();
			$cnt4pc = $row[0];
			return $cnt4pc;
			
	}
	
	function fetchTrainingEventDetails($transactionCode,$connid)
	{	$userQuery1 = "SELECT * FROM 
							bt_teachertraining_transaction as a,
							bt_dzongkhag_master as b
						WHERE 
							a.DzongkhagCode_where_training_held_at = b.DzongkhagCode and
							a.training_transaction_code = '".$transactionCode."'";
		$userResult = new dbquery($userQuery1,$connid);
		$retArr = array();
		while($row = $userResult->getrowarray())
			{	$retArr = $row; }
		
		$userQry2 = '';
		switch($retArr['level_of_training'])
		{
			case "Dzongkhag":
				$userQry2 = "	SELECT count(*) as count  FROM 
									teacher_master as a,
									school_master as b,
									bt_dzongkhag_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.DzongkhagCode in ('".$retArr['RegionCode_training_done_for']."')";
				$userQry3 = "";
			break;	
			
			case "Village":
				$userQry2 = "	SELECT count(*) as count FROM 
									teacher_master as a,
									school_master as b,
									bt_village_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.VillageCode = '".$retArr['RegionCode_training_done_for']."'";
			break;	
			
			case "School":
				$userQry2 = "	SELECT count(*) as count FROM 
									teacher_master as a,
									school_master as b
								WHERE
									a.schoolcode = b.schoolcode and
									b.schoolcode = '".$retArr['RegionCode_training_done_for']."'";
			break;
			
			case "National":
				$userQry2 = "	SELECT count(*) as count FROM 
									teacher_master ";
								
			break;
			
			case "Gewog":
				$userQry2 = "SELECT count(*) as count FROM 
									teacher_master as a,
									school_master as b,
									bt_gewog_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.GewogCode = '".$retArr['RegionCode_training_done_for']."'";
			break;
				
		}
		
		$regionCode = $retArr['RegionCode_training_done_for'];
		$regionCodeArr = explode(',',$regionCode);
		$regionNameArr = array();
		for($h=0;$h<sizeof($regionCodeArr);$h++)
		{	$regionNameArr[] = $this->getRegionName($retArr['level_of_training'],$regionCodeArr[$h],$connid); }
		$regionName = implode(', ',$regionNameArr);
		
		$teacherDetails = $this->getTeacherDetailsFromTrainingTransaction($retArr['training_transaction_code'],$connid);
		
		$userResult2 = new dbquery($userQry2,$connid);	
			$row = $userResult2->getrowarray();
			$cnt4pc = $row[0];
			$retArr['region'] = $regionName;
			$retArr['teachers_in_region'] = $cnt4pc;
			$retArr['teacherDetails'] = $teacherDetails;

		//return here
		$masterDet = $this->getData("select * from bt_teachertraining_master where training_code = '".$retArr['training_code']."'",$connid);
		//echo "<pre>"; print_r($masterDet);
		$masterDetArr = $masterDet[0];
		if($masterDetArr['skill']!='')
			{// echo "trest";
			$skill = $this->getOne("select ".$masterDetArr['skill']." from ".skill_table_teacher." where papercode = '".$masterDetArr['papercode']."' and subject ='".$masterDetArr['subject']."'",$connid);
			$skillType = substr($masterDetArr['papercode'],3,3);
		 }
			$retArr['skillFull'] = $skill;
			$retArr['skillType'] = $skillType;
			$retArr['subject'] = $this->ttsubjects_sections_array_keys[$masterDetArr['subject']];
 			
		return $retArr;
	}
	
	function getTeacherDetailsFromTrainingTransaction($trainingTxCode,$connid)
	{
		$userQuery = " SELECT * FROM
							bt_teachertraining_participants as a,
							teacher_master as b,
							school_master as c
						WHERE
							a.teacher_id = b.teacher_id and
							b.schoolcode = c.schoolcode and
							a.training_transaction_code = ' ".$trainingTxCode."'
						";
		$userResult = new dbquery($userQuery,$connid);
		$retArr1 = array();
		while($row = $userResult->getrowarray())
			{	$retArr1[] = $row; }
		return $retArr1;
	}
	
	function getRegionName($level,$regionCode,$connid)
	{		$heldAt = $level;
				if($heldAt=='Dzongkhag' || $heldAt=='National')
				{ 	$userQuery1 = "SELECT DzongkhagNameEn FROM bt_dzongkhag_master where DzongkhagCode = '".$regionCode."'";
				}
				else if($heldAt=='Gewog')
				{	$userQuery1 = "SELECT GewogNameEn FROM bt_gewog_master where GewogCode = '".$regionCode."'";
				}
				else if($heldAt=='Village')
				{	$userQuery1 = "SELECT VillageNameEn FROM bt_village_master where VillageCode = '".$regionCode."'";
				}
				else if($heldAt=='School')
				{	$userQuery1 = "SELECT schoolname FROM school_master where schoolcode = '".$regionCode."'";
				}
				$userResult1 = new dbquery($userQuery1,$connid);
				$userRow1 = $userResult1->getrowarray();
				$trainedFor=$userRow1[0];
				return $trainedFor;
				
	}
	
	
	function fetchTrainingEventsCombo($training_level,$from_year,$connid)
	{	$userQuery = "SELECT * FROM 
						bt_teachertraining_transaction as a, 
						bt_dzongkhag_master as b
					  where 
					  	a.level_of_training = '".$training_level."' and 
						a.start_date > '".$from_year.'-01-01'."' and
						a.DzongkhagCode_where_training_held_at = b.DzongkhagCode";
		$userResult = new dbquery($userQuery,$connid);
		$opString = '';
		while($row = $userResult->getrowarray())
			{	$heldAt = $row['level_of_training'];
				if($heldAt=='Dzongkhag')
				{ 	$userQuery1 = "SELECT DzongkhagNameEn FROM bt_dzongkhag_master where DzongkhagCode = '".$row['RegionCode_training_done_for']."'";
				}
				else if($heldAt=='Gewog')
				{	$userQuery1 = "SELECT GewogNameEn FROM bt_gewog_master where GewogCode = '".$row['RegionCode_training_done_for']."'";
				}
				else if($heldAt=='Village')
				{	$userQuery1 = "SELECT VillageNameEn FROM bt_village_master where VillageCode = '".$row['RegionCode_training_done_for']."'";
				}
				else if($heldAt=='School')
				{	$userQuery1 = "SELECT schoolname FROM school_master where schoolcode = '".$row['RegionCode_training_done_for']."'";
				}
				$userResult1 = new dbquery($userQuery1,$connid);
				$userRow1 = $userResult1->getrowarray();
				$trainedFor=$userRow1[0];
				$opString .=  "<option value='".$row['training_transaction_code']."'>".$row['DzongkhagNameEn']."-".$row['training_venue']."</option>";
			}
		if($opString!='')
		{	return "<option value=''>Select Session</option>".$opString;}
		else
		{	return "<option value=''>None Found</option>";}
	}
	
	function showTeacherTrainingTransaction($userid,$usertype,$connid)
	{	
		//echo "<pre>";
		//print_r($_REQUEST);
		
		$this->setgetvars();
		$this->setpostvars();
		$this->trainingcode;
		$userQuery = "SELECT * FROM bt_teachertraining_master where training_code = '".$this->trainingcode."'";
		$userResult = new dbquery($userQuery,$connid);
		$userRow = $userResult->getrowarray();
		$this->training_Name_add=$userRow['training_name'];
		$this->training_Description_add=$userRow['training_description'];
		//echo "<pre>";
		//print_r($_FILES);
		//$this->regionCount;
		$this->schoolsugg = $_REQUEST['schoolsugg1'];
		$rgnArr = array();
		$allTeacherInRegion = array();
		//echo "AA".$_REQUEST['schoolsugg1']."<br>";
		$allTeacherInRegion[] =$this->getAllTeachersinRegion($this->level_of_training,DoAddSlashes($_REQUEST['schoolsugg1']),$connid);
		
		
		for($m=2;$m<=$this->regionCount;$m++)
		{	$this->schoolsugg.= ','.$_REQUEST['schoolsugg'.$m];
			$allTeacherInRegion[] =$this->getAllTeachersinRegion($this->level_of_training,DoAddSlashes($_REQUEST['schoolsugg'.$m]),$connid);
		}
				
		if($this->actiontoperform=='Add New Training Transaction')
		{	$up_file = "";

			
			$trainingPeriod = $this->getOne("select total_days from bt_teachertraining_master where training_code = '".DoAddSlashes($this->trainingcode)."'",$connid);
			
			$endDate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(DoAddSlashes(formatDate($this->trainingstartdate)))) . " +".$trainingPeriod." days"));
			$totalTeachers = $this->calculateTotalTeachersInRegion($this->level_of_training,DoAddSlashes($this->schoolsugg),$connid);			
			
			$totaltrainers = $_REQUEST['totalTrainers'];
			$trainers = '';
			for($h=1;$h<$totaltrainers;$h++)
			{	$trainers.=$_REQUEST['trainers'.$h].",";	
			}
			$trainers.=$_REQUEST['trainers'.$totaltrainers];	
			
			$insertQuery  = "INSERT INTO bt_teachertraining_transaction SET ";
			$insertQuery .= "training_code='".DoAddSlashes($this->trainingcode)."',";
			$insertQuery .= "start_date='".DoAddSlashes(formatDate($this->trainingstartdate))."',";
			$insertQuery .= "end_date='".$endDate."',";
			$insertQuery .= "no_of_participants='".DoAddSlashes($this->participant_count)."',";
			$insertQuery .= "total_teachers_in_region='".$totalTeachers."',";
			$insertQuery .= "level_of_training='".DoAddSlashes($this->level_of_training)."',";
			$insertQuery .= "training_organizer='".DoAddSlashes($this->training_organizer)."',";
			$insertQuery .= "training_conducted_by='".DoAddSlashes($this->training_conductor)."',";
			$insertQuery .= "DzongkhagCode_where_training_held_at='".DoAddSlashes($this->dzongkhag)."',";
			$insertQuery .= "training_venue='".DoAddSlashes($this->venue)."',";
			$insertQuery .= "RegionCode_training_done_for='".DoAddSlashes($this->schoolsugg)."',";
			$insertQuery .= "trainers='".DoAddSlashes($trainers)."',";
			//$insertQuery .= "training_report='".DoAddSlashes($up_file)."',";
			$insertQuery .= "comments='".DoAddSlashes($this->organizer_comments)."'";
			
			//echo $insertQuery;
			$dbquery = new dbquery($insertQuery,$connid);
			$this->trainingDetailCode = mysql_insert_id();
			
			if($_FILES['upload_report']['name'] != "")
			{
				$nameArr = explode('.',$_FILES['upload_report']['name']);
				$ext = $nameArr[(sizeof($nameArr)-1)];				
				//$up_file_name = PATH_UPLOADEDTEACHER_REPORTS.$_FILES['upload_report']['name'];
				$up_file_name = PATH_UPLOADEDTEACHER_REPORTS.'Training_Report_'.$this->trainingDetailCode.".".$ext;
				if(!move_uploaded_file($_FILES['upload_report']['tmp_name'], $up_file_name))
				{
					echo "Possible file upload attack...";
				}
				$up_file = 'Training_Report_'.$this->trainingDetailCode.".".$ext;
				$updateQuery = "update bt_teachertraining_transaction set training_report='".DoAddSlashes($up_file)."' where 	training_transaction_code = '".$this->trainingDetailCode."'";
				$dbquery = new dbquery($updateQuery,$connid);
			}
		}
		return $allTeacherInRegion;
	}
	
	function getAllTeachersinRegion($level,$regionArrcode,$connid)
	{$userQry2 = '';
		switch($level)
		{
			case "Dzongkhag":
			case "National":
				$userQry3 = "	SELECT * FROM 
									teacher_master as a,
									school_master as b,
									bt_dzongkhag_master as c						
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.DzongkhagCode in (".$regionArrcode.")";
				$fieldName = 'DzongkhagNameEn';
			break;	
			
			case "Village":
				$userQry3 = "	SELECT * FROM 
									teacher_master as a,
									school_master as b,
									bt_village_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.VillageCode in (".$regionArrcode.")";
				$fieldName = 'VillageNameEn';
			break;	
			
			case "School":
				$userQry3 = "	SELECT * FROM 
									teacher_master as a,
									school_master as b
								WHERE
									a.schoolcode = b.schoolcode and
									b.schoolcode in (".$regionArrcode.")";
				$fieldName = 'schoolname';
			break;
			
			case "National(Old)":
				$userQry3 = "	SELECT * FROM 
									teacher_master ";
				$fieldName = 'DzongkhagNameEn';
								
			break;
			
			case "Gewog":
				$userQry3 = "SELECT * FROM 
									teacher_master as a,
									school_master as b,
									bt_gewog_master as c
								WHERE
									a.schoolcode = b.schoolcode and
									b.DzongkhagCode = c.DzongkhagCode and
									c.GewogCode in (".$regionArrcode.")";
				$fieldName = 'GewogNameEn';
			break;
				
		}
		//echo $userQry3;
		$userResult3 = new dbquery($userQry3,$connid);		
		$retArr = array();	
		
		while($userRow = $userResult3->getrowarray())
		{   $retArr[] = $userRow; }
		//print_r(sizeof($retArr));
		$retArr['local_region_name'] =  $retArr[0][$fieldName];
		return $retArr;
	}
	
	function getOne($query,$connid)
	{
		//echo $query."<br>";	
		$retVal = '';
		$userResult = new dbquery($query,$connid);	
		while($userRow = $userResult->getrowarray())
		{   $retVal = $userRow[0]; 
		}
		
		return $retVal;
	}
	
	function showTeacherTrainingMain($userid,$usertype,$connid)
	{	
		$this->setgetvars();
		$this->setpostvars();
		
		if($this->actiontoperform=='Add New Training Exercise')
		{	
		
			//echo "<pre>";
			//print_r($_REQUEST);		
			
			$valAr1 = explode("-",$this->skill);
			
			$insertQuery  = "INSERT INTO bt_teachertraining_master SET ";
			$insertQuery .= "training_name='".DoAddSlashes($this->training_name)."',";
			$insertQuery .= "training_description='".DoAddSlashes($this->training_description)."',";
			$insertQuery .= "papercode='".DoAddSlashes($valAr1[0])."',";
			$insertQuery .= "subject='".DoAddSlashes($valAr1[1])."',";
			$insertQuery .= "skill='".DoAddSlashes($valAr1[2])."',";
			$insertQuery .= "total_days='".DoAddSlashes($this->total_days)."'";
			
			//echo $insertQuery;
		$dbquery = new dbquery($insertQuery,$connid);
			$this->message = "Training course inserted successfully...";
		}
		
		if($this->actiontoperform=='Add Trained Teacher Details')
		{	$this->message = "Add Teachers...";
			//echo "<pre>";
			//print_r($_REQUEST);
			$teacherIdArr = array();
			$t=0;	
			for($k=0;$k<$this->totalTeacherInputs;$k++)
			{	
				while(!isset($_REQUEST['teacherid_'.$t]))
				{ $t++; }
				 $teacherIdArr[] = $_REQUEST['teacherid_'.$t];
				$t++;
				$insertQuery  = "INSERT INTO bt_teachertraining_participants SET ";
				$insertQuery .= "training_transaction_code='".DoAddSlashes($this->trainingDetailCode)."',";
				$insertQuery .= "teacher_id='".DoAddSlashes($teacherIdArr[$k])."'";
			
			//echo $insertQuery;
			$dbquery = new dbquery($insertQuery,$connid);
			}
			$this->message = "Training Details Submited successfully...";
		}
		
		if($this->actiontoperform=='Delete Training')
		{	
			$query1 = "select training_transaction_code from bt_teachertraining_transaction where training_code = '".$this->trainingcode."'";
			$result1 = new dbquery($query1,$connid);
			$txCodeArr = array();
			while($row = $result1->getrowarray())
			{	$query2 = "delete from bt_teachertraining_participants where training_transaction_code	= '".$row['training_transaction_code']."'";
				$result2 = new dbquery($query2,$connid);
			}
			$query3 = "delete from bt_teachertraining_transaction where training_code	= '".$this->trainingcode."'";
			$result3 = new dbquery($query3,$connid);
			$query4 = "delete from bt_teachertraining_master where training_code	= '".$this->trainingcode."'";
			$result4 = new dbquery($query4,$connid);
			$this->message = "Training Details Deleted successfully...";
		}

		$output_string .= "<table border=1 style='border-collapse: collapse' align='center' cellpadding='1'>";
		$output_string .= "<tr bordercolor='#FFFFFF' bgcolor='#ff9c00' ><td align='center' colspan='6'><b> Course </b></td></tr>";
		$output_string .= "<tr><td align='center'><b>SrNo</b></td><td align='center'><b>Course Name</b></td><td align='center'><b>Description</b></td><td align='center'><b>Subject</b></td><td align='center'><b>Skill</b></td>";
		$output_string .= "<td align='center'><b>Action</b></td></tr>";
		
		$srno=1;
		$userQuery = "SELECT * FROM bt_teachertraining_master";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			if($userRow['skill']!='')
			$skill = $this->getOne("select ".$userRow['skill']." from ".skill_table_teacher." where papercode = '".$userRow['papercode']."' and subject ='".$userRow['subject']."'",$connid);
			$skillType = substr($userRow['papercode'],3,3);
			$totalTx = $this->getOne("select count(*) from bt_teachertraining_transaction where training_code = '".$userRow['training_code']."'",$connid);
		
			$bgcolor="";
			if($userRow['papercode']!="")
			{
				$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'>".$userRow['training_name']."</td><td>".$userRow['training_description']."</td><td>".$skillType." - ".$this->ttsubjects_sections_array_keys[$userRow['subject']]."</td><td>".$skill."</td>";
				$output_string .= "<td><a href='javascript:addNewTrainingTx(\"".$userRow['training_code']."\")'>Add New Session</a> &nbsp; &nbsp; <a href='javascript:viewTrainingTx(\"".$userRow['training_code']."\")'>View Sessions</a> &nbsp; &nbsp; <a href=\"javascript:deleteTraining('".$userRow['training_code']."','".$totalTx."')\">Delete Course</a></td></tr>";
			}
			else 
			{
				$skillno = substr($userRow['skill'],1);
				$skill = $this->getOne("select skillname from bt_teachertraining_skills where subject ='".$userRow['subject']."' AND skill_no='".$skillno."'",$connid);
				$output_string .= "<tr bgcolor='".$bgcolor."'><td align='center'>".$srno."</td><td align='center'>".$userRow['training_name']."</td><td>".$userRow['training_description']."</td><td>".$this->ttsubjects_sections_array_keys[$userRow['subject']]."</td><td>".$skill."</td>";
				$output_string .= "<td><a href='javascript:addNewTrainingTx(\"".$userRow['training_code']."\")'>Add New Session</a> &nbsp; &nbsp; <a href='javascript:viewTrainingTx(\"".$userRow['training_code']."\")'>View Sessions</a> &nbsp; &nbsp; <a href=\"javascript:deleteTraining('".$userRow['training_code']."','".$totalTx."')\">Delete Course</a></td></tr>";
			}
			$srno++;
		}
		$output_string .= "</table>";
		return $output_string;
	}
	
	function showTeacherTrainingMainDetails($userid,$usertype,$connid)
	{	$this->setgetvars();
		$this->setpostvars();
		//print_r($_REQUEST);
		
		if($this->actiontoperform=='Delete Transaction Details')
		{	$delID = $this->delTxCode;
			$query2 = "delete from bt_teachertraining_participants where training_transaction_code	= '".$delID."'";
			$result2 = new dbquery($query2,$connid);
			$query3 = "delete from bt_teachertraining_transaction where training_transaction_code	= '".$delID."'";
			$result3 = new dbquery($query3,$connid);
			$this->message = 'Transaction deleted successfully!';
		}
		$query = "SELECT * FROM 
					bt_teachertraining_transaction as a,
					bt_dzongkhag_master as b
				WHERE
					a.DzongkhagCode_where_training_held_at = b.DzongkhagCode and
					a.training_code	= '".$this->trainingcode."'";
		
		
		//echo $insertQuery;
		$dbquery = new dbquery($query,$connid);
			$optString = '<table align="center" border="1" style="border-collapse:collapse">
								<tr bgcolor="#ff9c00">
									<td align="center"><b>&nbsp;SrNo&nbsp;</b></td>
									<td align="center"><b>&nbsp;Trainig Venue&nbsp;</b></td>
									<td align="center"><b>&nbsp;Level Of<br>&nbsp; Training&nbsp;</b></td>
									<td align="center"><b>&nbsp;Number Of <br>&nbsp;Participants&nbsp;</b></td>
									<td align="center"><b>&nbsp;Training Period&nbsp;</b></td>
									<td align="center"><b>&nbsp;Training <br>&nbsp;Organized By&nbsp;</b></td>
									<td align="center"><b>&nbsp;Training <br>&nbsp;Conducted By&nbsp;</b></td>
									<td align="center"><b>&nbsp;Training Report&nbsp;</b></td>
									<td align="center"><b>&nbsp;Action&nbsp;</b></td>
								</tr>
			';
		$k=0;
		while($row = $dbquery->getrowarray())
			{	$k++;
				$optString.= "	<tr>
									<td align='center'>".$k."</td>
									<td>&nbsp;&nbsp;".$row['training_venue'].", ".$row['DzongkhagNameEn']."&nbsp;&nbsp;</td>
									<td>".$row['level_of_training']."</td>
									<td align='center'>".$row['no_of_participants']."</td>
									<td>&nbsp;&nbsp;".formatDate($row['start_date'])." to ".formatDate($row['end_date'])."&nbsp;&nbsp;</td>
									<td>".$row['training_organizer']."</td>
									<td>".$row['training_conducted_by']."</td>
									<td><a href='".PATH_UPLOADEDTEACHER_REPORTS.$row['training_report']."'>".$row['training_report']."</td>
									<td align='center'><a href='javascript:deleteTransaction(\"".$row['training_transaction_code']."\")'>Delete</a>
									&nbsp;&nbsp;<a onClick = \"window.open('trainingTransactionParticipants.php?code=".$row['training_transaction_code']."','mywindow','resizable=1,scrollbars=1,width=1000,height=500')\" href='javascript:void(0)'>View Participants</a>
									</td>
								</tr>	
				";
			}
		$optString.= '</table>';
			return $optString;
	}
	
	function prepareSuggestiveList($connid,$level)
	{
		if($level=='School')
		{	$srcStr = "";
			$query = "SELECT * FROM school_master ORDER BY DzongkhagNameEn, schoolname";
			//echo "A".$query."<br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$srcStr .=  "\"".$row['schoolname']."(".$row["DzongkhagNameEn"].")-".$row["schoolcode"]."\",";
			}
			$srcStr = substr($srcStr,0,-1);
		}
		else if($level=='Dzongkhag')
		{	$srcStr = "";
			$query = "SELECT * FROM bt_dzongkhag_master ORDER BY DzongkhagNameEn";
			//echo "A".$query."<br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$srcStr .=  "\"".$row['DzongkhagNameEn']."-".$row['DzongkhagCode']."\",";
			}
			$srcStr = substr($srcStr,0,-1);
			
		}
		else if($level=='Gewog')
		{	$srcStr = "";
			$query = "SELECT * FROM bt_gewog_master ORDER BY GewogNameEn";
			//echo "A".$query."<br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$srcStr .=  "\"".$row['GewogNameEn']."-".$row['GewogCode']."\",";
			}
			$srcStr = substr($srcStr,0,-1);
			
		}
		else if($level=='Village')
		{	$srcStr = "";
			$query = "SELECT * FROM bt_village_master ORDER BY VillageNameEn";
			//echo "A".$query."<br>";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$srcStr .=  "\"".$row['VillageNameEn']."-".$row['VillageCode']."\",";
			}
			$srcStr = substr($srcStr,0,-1);
			
		}
		
		
		return $srcStr;


	}
	
	function getTrainingSubjects($connid)
	{	
		echo $query = 'Select distinct subject from skill_table_teacher';
		$dbquery = new dbquery($query,$connid);
		$retArr = array();
			while($row = $dbquery->getrowarray())
			{
				$retArr[] =  $row['subject'];
				//print_r($row);
			}
			echo "<pre>";
			print_r($retArr);
		return $retArr;
	}
	
	//*****************************************************************************************************************************************	
	// Functions for Teacher Training Module ends here (by Vishak)
	
	function fetchQuerywiseResult($userid,$usertype,$clsschoolresult,$connid)
	{
		$finaloutput = "";
		if($_POST['fetchsaveadvancequeryresult']==1)
		{
			$fetchquery = "SELECT * FROM bt_savedadvancedqueries WHERE userid='".$userid."'";
			//echo $fetchquery;
			$fetchdbquery = new dbquery($fetchquery,$connid);
			while($fetchrow = $fetchdbquery->getrowarray())
			{
				$aqno = "aqno".$fetchrow['aqno'];
				if(isset($_POST[$aqno]) && $_POST[$aqno]!="")
				{
					$datafields = explode("**",$fetchrow['selectfields']);
					for($dfi=0; $dfi<count($datafields); $dfi++)
					{
						$setfields = explode("&&",$datafields[$dfi]);
						if($setfields[0]=="aq_field1" || $setfields[0]=="fetchsaveadvancequeryresult")
							continue;
						elseif($setfields[0]=="dosaveadvancequery")
							$_POST[$setfields[0]] = 0;
						else 
							$_POST[$setfields[0]] = $setfields[1];
					}
					$this->setpostvars();
					$advancedqueryresult = $this->pageAdvancedQueryModule($userid,$usertype,$clsschoolresult,$connid);
					$finaloutput .= $advancedqueryresult."<br>";
				}
			}
		}
		return $finaloutput;
	}
	// Advanced Query Module - Starts Here
	function pageAdvancedQueryModule($userid,$usertype,$clsschoolresult,$connid)
	{
		if($_POST['fetchsaveadvancequeryresult']!=1)
			$this->setpostvars();
		
		if(isset($_POST['dosaveadvancequery']) && $_POST['dosaveadvancequery']==1)
		{
			$querydata = "";
			foreach ($_POST as $key => $value) 
			{
				$querydata .= $key."&&".$value."**";
			}
			$querydata = substr($querydata,0,-2);
			
			$insquery = "INSERT INTO bt_savedadvancedqueries SET aqname='".$_POST['aq_name']."',userid='".$userid."',selectfields='".$querydata."'";
			//echo $insquery;
			$ibsdbquery = new dbquery($insquery,$connid);
		}
		
		/*if(isset($_POST['fetchsaveadvancequeryresult']) && $_POST['fetchsaveadvancequeryresult']==1)
		{
			$fetchquery = "SELECT * FROM bt_savedadvancedqueries WHERE userid='".$userid."' AND aqname='".$_POST['aq_field1']."'";
			//echo $fetchquery;
			$fetchdbquery = new dbquery($fetchquery,$connid);
			$fetchrow = $fetchdbquery->getrowarray();
			$datafields = explode("**",$fetchrow['selectfields']);
			
			for($dfi=0; $dfi<count($datafields); $dfi++)
			{
				$setfields = explode("&&",$datafields[$dfi]);
				if($setfields[0]=="aq_field1")
					continue;
				else 
					$_POST[$setfields[0]] = $setfields[1];
			}
			$this->setpostvars();
			echo "<pre>";
			print_r ($_POST);
			echo "</pre>";
			exit;
		}*/
		
		$schoolcodestr = $this->queryResult_SchoolCodeString($username,$usertype,$connid);
		$schoolcodestr_old = $schoolcodestr;
		
		$query = "SELECT * FROM school_master";
		$condition = "";

		if($this->schoolcategory != "")
			$condition .= " AND schoolcategory ='".DoAddSlashes($this->schoolcategory)."'";
		if($this->schoolaccesscategory != "")
			$condition .= " AND accesscategory ='".DoAddSlashes($this->schoolaccesscategory)."'";
		if($this->schooltype != "")
			$condition .= " AND schooltype ='".DoAddSlashes($this->schooltype)."'";
		
		$condition .= " AND schoolcode IN (".$schoolcodestr.")";
		
		if($condition != "")
			$condition = " WHERE ".substr($condition,4);
			
		$query .= $condition;
		
		$schoolcodearray = array();
		$schoolcodestr = "";
		$schoollistarray = array();
		
		if($schoolcodestr_old!="")
		{
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$schoolcodestr .= $row['schoolcode'].",";
				$schoollistarray[$row['schoolcode']]['name'] = $row['schoolname'];
				$schoollistarray[$row['schoolcode']]['Dzongkhag'] = $row['DzongkhagNameEn'];
				$schoollistarray[$row['schoolcode']]['schoolcategory'] = $row['schoolcategory'];
				$schoollistarray[$row['schoolcode']]['schooltype'] = $row['schooltype'];
				$schoollistarray[$row['schoolcode']]['accesscategory'] = $row['accesscategory'];
				array_push($schoolcodearray,$row['schoolcode']);
			}
			$schoolcodestr = substr($schoolcodestr,0,-1);
		}
			
		if($this->adqno==1)
		{
			$resultArray = array();
			for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
			{
				$test_edition = $clsschoolresult->test_edition_array[$ti];
				$tablename = "studentwise".$test_edition;
				if($schoolcodestr != "")
				{
					for($i=0; $i<$clsschoolresult->total_subjects; $i++)
					{
						$subject = strtolower(substr($clsschoolresult->subject_array[$i],0,1));
						$query  = "SELECT class, COUNT(*)";
						$query .= ",".$subject.",AVG(".$subject.") AS AVERAGE,STDDEV(".$subject.") AS STD";
						$query .= " FROM ".$tablename." WHERE !isnull(".$subject.") AND school_code IN (".$schoolcodestr.") GROUP BY class ";
						$dbquery = new dbquery($query,$connid);
						while($row = $dbquery->getrowarray())
						{
							$subject = strtolower(substr($clsschoolresult->subject_array[$i],0,1));
							$resultArray[$test_edition][$row['class']][$subject]['N'] = $row['COUNT(*)'];
							$resultArray[$test_edition][$row['class']][$subject]['AVG'] = $row['AVERAGE'];
							$resultArray[$test_edition][$row['class']][$subject]['STD'] = $row['STD'];
						}
					}
				}
			}
			
			$output_string = "<table border=1 style='border-collapse: collapse' align='center' cellpadding='1'>";
			$output_string .= "<tr bgcolor='bf0000'><td align='center' colspan='29'><b><font color='#FFFFFF'>Overall Performance on ASSL</font></b></td></tr>";
			$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td>";
			$output_string .= "<td align='center'><b>Round</b></td>";
			$output_string .= "<td align='center' colspan='3'><b>Class 4<br>English</b></td><td align='center' colspan='3'><b>Class 4<br>Maths</b></td><td align='center' colspan='3'><b>Class 4<br>Science</b></td>";
			$output_string .= "<td align='center' colspan='3'><b>Class 6<br>English</b></td><td align='center' colspan='3'><b>Class 6<br>Maths</b></td><td align='center' colspan='3'><b>Class 6<br>Science</b></td>";
			$output_string .= "<td align='center' colspan='3'><b>Class 8<br>English</b></td><td align='center' colspan='3'><b>Class 8<br>Maths</b></td><td align='center' colspan='3'><b>Class 8<br>Science</b></td></tr>";
			
			$output_string .= "<tr><td align='center'><b></b></td><td align='center'><b></b></td>";
			for($cn=1; $cn<=9; $cn++)
			{
				$output_string .= "<td align='center'><b>N</b></td><td><b>AVG</b></td><td><b>SD</b></td>";
			}
			$output_string .= "</tr>";

			$paperDetailsArray = array();
			$clsschoolresult->fetchPaperDetails(&$paperDetailsArray,$connid);
			
			$srno=1;
			for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
			{
				$test_edition = $clsschoolresult->test_edition_array[$ti];
				$output_string .= "<tr><td align='center'>".$srno."</td>";
				$output_string .= "<td align='center'>".$clsschoolresult->test_edition_names_array[$test_edition]."</td>";
				for($ci=0; $ci<count($clsschoolresult->testclass_array); $ci++)
				{
					for($i=0; $i<$clsschoolresult->total_subjects; $i++)
					{
						$subjectcode=0;
						$subject = strtolower(substr($clsschoolresult->subject_array[$i],0,1));
						if($subject=="e")
							$subjectcode=1;
						else if($subject=="m")
							$subjectcode=2;
						else if($subject=="s")
							$subjectcode=3;
							
						$papercode = $subjectcode.$clsschoolresult->testclass_array[$ci].$test_edition;
						$totalQuestion = $paperDetailsArray[$papercode];
						$N   = $resultArray[$test_edition][$clsschoolresult->testclass_array[$ci]][$subject]['N'];
						$AVG = Donumber_format(($resultArray[$test_edition][$clsschoolresult->testclass_array[$ci]][$subject]['AVG']/$totalQuestion)*100,1);
						$STD = Donumber_format(($resultArray[$test_edition][$clsschoolresult->testclass_array[$ci]][$subject]['STD']/$totalQuestion)*100,1);
						$output_string .= "<td align='center'>".$N."</td>";
						$output_string .= "<td align='center'>".sprintf("%.1f",$AVG)."</td>";
						$output_string .= "<td align='center'>".sprintf("%.1f",$STD)."</td>";
					}
				}
				$output_string .= "</tr>";
				$srno++;
			}
			return $output_string;
		}
		
		if($this->adqno==2)
		{
			//echo "AAA";
		}
		
		if($this->adqno==3)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center' cellpadding='1'>";
			$output_string .= "<tr bgcolor='bf0000'><td align='center' colspan='11'><b><font color='#FFFFFF'>Average age of students</font></b></td></tr>";
			$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td><td align='center'><b>Class</b></td><td align='center'><b>AVG Age</b></td></tr>";

			if($schoolcodestr!="")
			{
				$srno=1;
				$today = date('Y-m-d');
				$query = "SELECT class, AVG((( TO_DAYS('".$today."') - TO_DAYS(date_of_birth))/365)) AS AVGAge FROM student_master WHERE schoolcode IN (".$schoolcodestr.") AND date_of_birth!='0000-00-00' GROUP BY class ORDER BY CAST(class as UNSIGNED)";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['class']."</td><td align='center'>".sprintf("%.1f",$row['AVGAge'])."</td></tr>";
					$srno++;
				}
			}
					
			$output_string .= "</table>";
			return $output_string;
		}
		
		if($this->adqno==4)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center' cellpadding='1'>";
			$output_string .= "<tr bgcolor='bf0000'><td align='center' colspan='11'><b><font color='#FFFFFF'>Proportion of students based on mother tongue</font></b></td></tr>";
			$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>SrNo</b></td><td align='center'><b>Mother Tongue</b></td><td align='center'><b>% of Students</b></td></tr>";
			
			if($schoolcodestr!="")
			{
				$srno=1;
				$today = date('Y-m-d');
			
				$query = "SELECT COUNT(*) FROM student_master WHERE schoolcode IN (".$schoolcodestr.")";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				$totalstudent = $row['COUNT(*)'];
				
				$query = "SELECT mother_tongue,COUNT(*) FROM student_master WHERE schoolcode IN (".$schoolcodestr.") GROUP BY mother_tongue";
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{
					$perstd = ($row['COUNT(*)']/$totalstudent)*100;
					$output_string .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row['mother_tongue']."</td><td align='center'>".sprintf("%.2f",$perstd)."</td></tr>";
					$srno++;
				}
			}			
			$output_string .= "</table>";
			return $output_string;
		}
		
		if($this->adqno==5)
		{
			$output_string = "<table border=1 style='border-collapse: collapse' align='center' cellpadding='1'>";
			$output_string .= "<tr bgcolor='bf0000'><td align='center' colspan='11'><b><font color='#FFFFFF'>Number of Students by Class</font></b></td></tr>";
			$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>Class</b></td><td align='center'><b>AVG Class Strength</b></td></tr>";

			if($schoolcodestr!="")
			{
				$classcounter = array();
				for($ci=0; $ci<count($this->classArray); $ci++)
				{
					$classcounter[$this->classArray[$ci]] = 0;
					for($si=0; $si<count($this->sectionArray); $si++)
					{
						$query = "SELECT COUNT(DISTINCT schoolcode) AS TC FROM student_master WHERE schoolcode IN (".$schoolcodestr.") AND class='".$this->classArray[$ci]."' AND section='".$this->sectionArray[$si]."'";
						$dbquery = new dbquery($query,$connid);
						$row = $dbquery->getrowarray();
						$classcounter[$this->classArray[$ci]] += $row['TC'];
					}
					
					$query = "SELECT COUNT(DISTINCT schoolcode) AS TC FROM student_master WHERE schoolcode IN (".$schoolcodestr.") AND class='".$this->classArray[$ci]."' AND section=''";
					$dbquery = new dbquery($query,$connid);
					$row = $dbquery->getrowarray();
					$classcounter[$this->classArray[$ci]] += $row['TC'];
				}

				$srno=1;
				for($ci=0; $ci<count($this->classArray); $ci++)
				{
					$query = "SELECT COUNT(*) AS TS FROM student_master WHERE schoolcode IN (".$schoolcodestr.") AND class='".$this->classArray[$ci]."'";
					$dbquery = new dbquery($query,$connid);
					$row = $dbquery->getrowarray();
					$totalstudents = $row['TS'];
					
					$avgstu = $totalstudents/$classcounter[$this->classArray[$ci]];
					if($avgstu!=0.0)
						$output_string .= "<tr><td align='center'>".$this->classArray[$ci]."</td><td align='center'>".sprintf("%.2f",$avgstu)."</td></tr>";
					$srno++;
				}
			}
					
			$output_string .= "</table><br>";
			
			$output_string .= "<table border=1 style='border-collapse: collapse' align='center' cellpadding='1'>";
			$output_string .= "<tr bgcolor='#bf0000'><td align='center' colspan='2'><b><font color='#FFFFFF'>Number of Students Without Section<br>Listed by Class</font></b></td></tr>";
			$output_string .= "<tr bgcolor='#ff9c00'><td align='center'><b>Class</b></td><td align='center'><b>Total Students</b></td></tr>";

			if($schoolcodestr!="")
			{
				for($ci=0; $ci<count($this->classArray); $ci++)
				{
					$query = "SELECT COUNT(*) AS TS FROM student_master WHERE schoolcode IN (".$schoolcodestr.") AND class='".$this->classArray[$ci]."' AND section=''";
					$dbquery = new dbquery($query,$connid);
					$row = $dbquery->getrowarray();
					$totalstudents = $row['TS'];
					if($totalstudents!=0)
						$output_string .= "<tr><td align='center'>".$this->classArray[$ci]."</td><td align='center'>".$totalstudents."</td></tr>";
				}
			}
			$output_string .= "<tr><td colspan='2' align='center'><b>The higher this number, the more inaccurate the average</b></td></tr>";		
			$output_string .= "</table>";
			
			return $output_string;
		}
		if($this->adqno==6)
		{
			$output_string .= "<table>";
			$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>
				<tr bgcolor='#bf0000'><td align='center' colspan='6'><b><font color='#FFFFFF'>Overall proportion of students in low, medium, high and advanced benchmark</font></b></td></tr>
				<tr bgcolor='#ff9c00'><td align='center'><b>Round</b></td>
				<td align='center'><b>Advanced<br>Benchmark</b></td>
				<td align='center'><b>Hign<br>Benchmark</b></td>
				<td align='center'><b>Intermediate<br>Benchmark</b></td>
				<td align='center'><b>Low<br>Benchmark</b>	
				<td align='center'><b>Below Low<br>Benchmark</b></td></tr>";	
			
			for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
			{
				$subjecno=0;
				$test_edition = $clsschoolresult->test_edition_array[$ti];
				if($this->subject=="English")
					$subjecno=1;
				elseif($this->subject=="Maths")
					$subjecno=2;
				elseif($this->subject=="Sciecne")
					$subjecno=3;	
					
				$papercode = $subjecno.$this->class.$test_edition;
				if($schoolcodestr != "")
				{
					$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND school_code IN (".$schoolcodestr.")";
					//echo $query1; exit;
					$result1 = mysql_query($query1) OR die("1: ".mysql_error());
					$row1=mysql_fetch_array($result1);
					$totalstudents = $row1[0];
		
					if($totalstudents==0)
						continue;
						
					$output_string .= "<tr><td align='center'><b>".$clsschoolresult->test_edition_names_array[$test_edition]."</b></td>";
					
					$perstu=0.0;
					$perstu_total=0.0;
					$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND round(percentile*100,1)>=88.0 AND school_code IN (".$schoolcodestr.")";
					//echo $query1; exit;
					$result1 = mysql_query($query1) OR die("1: ".mysql_error());
					$row1=mysql_fetch_array($result1);
					$perstu = round(($row1[0]*100)/$totalstudents,1);
					$perstu_total+=$perstu;
					$output_string .= "<td align='center'>".$perstu."</td>";
					
					$perstu=0.0;
					$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=73.0 AND round(percentile*100,1)<88.0) AND school_code IN (".$schoolcodestr.")";
					//echo $query1; exit;
					$result1 = mysql_query($query1) OR die("1: ".mysql_error());
					$row1=mysql_fetch_array($result1);
					$perstu = round(($row1[0]*100)/$totalstudents,1);
					$perstu_total+=$perstu;
					$output_string .= "<td align='center'>".$perstu."</td>";
					
					$perstu=0.0;
					$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=48.0 AND round(percentile*100,1)<73.0) AND school_code IN (".$schoolcodestr.")";
					//echo $query1; exit;
					$result1 = mysql_query($query1) OR die("1: ".mysql_error());
					$row1=mysql_fetch_array($result1);
					$perstu = round(($row1[0]*100)/$totalstudents,1);
					$perstu_total+=$perstu;
					$output_string .= "<td align='center'>".$perstu."</td>";
					
					$perstu=0.0;
					$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=23.0 AND round(percentile*100,1)<48.0) AND school_code IN (".$schoolcodestr.")";
					//echo $query1; exit;
					$result1 = mysql_query($query1) OR die("1: ".mysql_error());
					$row1=mysql_fetch_array($result1);
					$perstu = round(($row1[0]*100)/$totalstudents,1);
					$perstu_total+=$perstu;
					$output_string .= "<td align='center'>".$perstu."</td>";
					$perstu_total=100-$perstu_total;
					$output_string .= "<td align='center'>".$perstu_total."</td></tr>";
				}
			}
			$output_string .= "</table>";
			return $output_string;
		}
		
		if($this->adqno==7)
		{
			$output_string .= "<table>";
			//$schoollistarray[$row['schoolcode']]['name']
			$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>
				<tr bgcolor='#bf0000'><td align='center' colspan='9'><b><font color='#FFFFFF'>List of schools in low, medium, high and advanced benchmark</font></b></td></tr>
				<tr bgcolor='#ff9c00'><td align='center'><b>School Code</b></td><td align='center'><b>School Name</b></td><td align='center'><b>Dzongkhag</b></td><td align='center'><b>Round</b></td>
				<td align='center'><b>Advanced<br>Benchmark</b></td>
				<td align='center'><b>Hign<br>Benchmark</b></td>
				<td align='center'><b>Intermediate<br>Benchmark</b></td>
				<td align='center'><b>Low<br>Benchmark</b>	
				<td align='center'><b>Below Low<br>Benchmark</b></td></tr>";	
			
			$preschoolcode=0;
			for($sci=0; $sci<count($schoolcodearray); $sci++)
			{
				$schoolcodestr = $schoolcodearray[$sci];
				for($ti=0; $ti<$clsschoolresult->total_test_editions; $ti++)
				{
					$subjecno=0;
					$test_edition = $clsschoolresult->test_edition_array[$ti];
					if($this->subject=="English")
						$subjecno=1;
					elseif($this->subject=="Maths")
						$subjecno=2;
					elseif($this->subject=="Sciecne")
						$subjecno=3;	
						
					$papercode = $subjecno.$this->class.$test_edition;
					if($schoolcodestr != "")
					{
						$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND school_code IN (".$schoolcodestr.")";
						//echo $query1; exit;
						$result1 = mysql_query($query1) OR die("1: ".mysql_error());
						$row1=mysql_fetch_array($result1);
						$totalstudents = $row1[0];
						
						if($totalstudents>0)
						{
							if($preschoolcode!=0 && $preschoolcode!=$schoolcodestr)
								$output_string .= "<tr bgcolor='#ff9c00'><td align='center' colspan='9'></td></tr>";
								
							$preschoolcode = $schoolcodestr;
							$output_string .= "<tr><td align='center'>".$schoolcodestr."</td><td>".$schoollistarray[$schoolcodestr]['name']."</td><td>".$schoollistarray[$schoolcodestr]['Dzongkhag']."</td>";
							$output_string .= "<td align='center'><b>".$clsschoolresult->test_edition_names_array[$test_edition]."</b></td>";
							
							$perstu=0.0;
							$perstu_total=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND round(percentile*100,1)>=88.0 AND school_code IN (".$schoolcodestr.")";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$perstu_total+=$perstu;
							$output_string .= "<td align='center'>".$perstu."</td>";
							
							$perstu=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=73.0 AND round(percentile*100,1)<88.0) AND school_code IN (".$schoolcodestr.")";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$perstu_total+=$perstu;
							$output_string .= "<td align='center'>".$perstu."</td>";
							
							$perstu=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=48.0 AND round(percentile*100,1)<73.0) AND school_code IN (".$schoolcodestr.")";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$perstu_total+=$perstu;
							$output_string .= "<td align='center'>".$perstu."</td>";
							
							$perstu=0.0;
							$query1 = "select count(*) from irt_sco where papercode='".$papercode."' AND (round(percentile*100,1)>=23.0 AND round(percentile*100,1)<48.0) AND school_code IN (".$schoolcodestr.")";
							//echo $query1; exit;
							$result1 = mysql_query($query1) OR die("1: ".mysql_error());
							$row1=mysql_fetch_array($result1);
							$perstu = round(($row1[0]*100)/$totalstudents,1);
							$perstu_total+=$perstu;
							$output_string .= "<td align='center'>".$perstu."</td>";
							if($perstu_total<100)
								$perstu_total=100-$perstu_total;
							else 
								$perstu_total= 0;
							$output_string .= "<td align='center'>".$perstu_total."</td></tr>";
						}
					}
				}
			}
			$output_string .= "</table>";
			return $output_string;
		}
	}
	// Advanced Query Module - Ends Here
	
	//Teacher Time Table Module Starts Here
	
	
	function fetchTeacherTimeTable($userid, $connid)
	{	$schoolcode = $userid;
		$query = "select * from teacher_master where schoolcode = ".$userid."";
		$teacherMasterArr = $this->getData($query, $connid);
		$optString = '';
		$dayArr = array("mon"=>"Monday","tue"=>"Tuesday","wed"=>"Wednesday","thu"=>"Thursday","fri"=>"Friday");
		$dayArrSat = array("sat"=>"Saturday");
		
		
		for($i=0;$i<sizeof($teacherMasterArr);$i++)
		{	
			$teacherSats = $teacherMasterArr[$i]['teacher_id'];
			$teacherName = $teacherMasterArr[$i]['firstname']." ".$teacherMasterArr[$i]['lastname'];
			$optString.= '</td></tr><tr><td bgcolor="#bf0000" style="color:#ffffff"><b>Teacher Name: '.$teacherName."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".'Teacher Id: '.$teacherSats."</b></td></tr><tr><td>";
			$optString.= "<table border=1 style='border-collapse:collapse' width='100%'><tr bgcolor='#ff9c00'><td><b>Days</b></td>";
			$query = "select * from bt_schooltimetable_master where schoolcode = '".$schoolcode."' and timetablecode = (select max(timetablecode) from bt_schooltimetable_master where schoolcode = '1100655')";
			$ttMasterArr = $this->getData($query, $connid);
			
			$query = "select * from bt_schooltimetable_timings where timetablecode = '".$ttMasterArr[0]['timetablecode']."' order by timeslotno";
			$ttTimingsArr = $this->getData($query, $connid);
			$ttCode = $ttMasterArr[0]['timetablecode'];
			
			$br=1;
			$p=1;
			for($y=0;$y<sizeof($ttTimingsArr);$y++)
			{		if($ttTimingsArr[$y]['istimeslotnoofMonToFri'] == 'Y')
					{	if($ttTimingsArr[$y]['istimeslotnobreak'] == 'N')
						{	$optString.= "<td align='center'><b>Period ".$p."<br />".substr($ttTimingsArr[$y]['timeslotno_starttime'],0,5)."</b></td>"; $p++; }
						else
						{	$optString.= "<td align='center'><b>Break ".$br."<br />".substr($ttTimingsArr[$y]['timeslotno_starttime'],0,5)."</b></td>"; $br++;}
					}
			}
			$optString.= "</tr>";
			
			foreach($dayArr as $key=>$value)
			{	$partHdr = $key;
				$optString.="<tr><td><b>".$value."</b></td>";
				$br=1;
				$p=1;
				for($y=0;$y<sizeof($ttTimingsArr);$y++)
				{		if($ttTimingsArr[$y]['istimeslotnoofMonToFri'] == 'Y')
						{	if($ttTimingsArr[$y]['istimeslotnobreak'] == 'N')
							{	$returnCount = $this->getOne("select count(*) from bt_schooltimetable_classsectionwise where timetablecode = ".$ttCode." and ".$partHdr."_teacher = ".$teacherSats." and periodno = '".$p."'", $connid);
								$query ="select * from bt_schooltimetable_classsectionwise where timetablecode = ".$ttCode." and ".$partHdr."_teacher = ".$teacherSats." and periodno = '".$p."'";
								$p++;
								$subjectTaughtArr = $this->getData($query, $connid);
								if($returnCount=='1')
								{
									//echo sizeof($subjectTaughtArr).$query;
									$fieldName = $partHdr."_subject";
									//echo "<pre>"; print_r($subjectTaughtArr); exit;
									$subjectTaught = $subjectTaughtArr[0][$fieldName];
									$classT = $subjectTaughtArr[0]['class'];
									$sectionT = $subjectTaughtArr[0]['section'];
									if($sectionT != '') { $sectionT = " Section:".$sectionT;}
									$optString.= "<td>".$subjectTaught." (Class:".$classT.$sectionT.")</td>"; 
								}
								else
								{	$optString.= "<td></td>";}
							}
							else
							{	$optString.= "<td bgcolor='#00FF00'></td>";}
						}
				}
				
				$optString.="</tr>";
			}
			
			$optString.= "</table>";
			
			
			$optString.= "<table border=1 style='border-collapse:collapse'><tr bgcolor='#ff9c00'><td><b>Day</b></td>";
						
			$br=1;
			$p=1;
			for($y=0;$y<sizeof($ttTimingsArr);$y++)
			{		if($ttTimingsArr[$y]['istimeslotnoofMonToFri'] == 'N')
					{	if($ttTimingsArr[$y]['istimeslotnobreak'] == 'N')
						{	$optString.= "<td align='center'><b>Period ".$p."<br />".substr($ttTimingsArr[$y]['timeslotno_starttime'],0,5)."</b></td>"; $p++; }
						else
						{	$optString.= "<td align='center'><b>Break ".$br."<br />".substr($ttTimingsArr[$y]['timeslotno_starttime'],0,5)."</b></td>"; $br++;}
					}
			}
			$optString.= "</tr>";
			
			foreach($dayArrSat as $key=>$value)
			{	$partHdr = $key;
				$optString.="<tr><td><b>".$value."</b></td>";
				$br=1;
				$p=1;
				for($y=0;$y<sizeof($ttTimingsArr);$y++)
				{		if($ttTimingsArr[$y]['istimeslotnoofMonToFri'] == 'N')
						{	if($ttTimingsArr[$y]['istimeslotnobreak'] == 'N')
							{	$returnCount = $this->getOne("select count(*) from bt_schooltimetable_classsectionwise where timetablecode = ".$ttCode." and ".$partHdr."_teacher = ".$teacherSats." and periodno = '".$p."'", $connid);
								$query ="select * from bt_schooltimetable_classsectionwise where timetablecode = ".$ttCode." and ".$partHdr."_teacher = ".$teacherSats." and periodno = '".$p."'";
								$p++;
								$subjectTaughtArr = $this->getData($query, $connid);
								if($returnCount=='1')
								{
									//echo sizeof($subjectTaughtArr).$query;
									$fieldName = $partHdr."_subject";
									//echo "<pre>"; print_r($subjectTaughtArr); exit;
									$subjectTaught = $subjectTaughtArr[0][$fieldName];
									$classT = $subjectTaughtArr[0]['class'];
									$sectionT = $subjectTaughtArr[0]['section'];
									if($sectionT != '') { $sectionT = " Section:".$sectionT;}
									$optString.= "<td>".$subjectTaught." (Class:".$classT.$sectionT.")</td>"; 
								}
								else
								{	$optString.= "<td></td>";}
							}
							else
							{	$optString.= "<td bgcolor='#00FF00'></td>";}
						}
				}
				
				$optString.="</tr>";
			}
			
			$optString.= "</table><br /><br/>";
			
		
		}
		return $optString;
		
	}
	
	//Teacher Time Table Module Ends Here
	
	//Added by nitin on june 15
	function fetchStudentDetailsFromSchoolClass($userid,$connid)
	{
		$this->setpostvars();
		$class = $this->class;
		$school = $this->school;
		if($class != '' && $school != '')
		{
			$studentArray = array();
			$count = 0;
			$query = "SELECT cts_number, firstname, secondname, lastname,guardian_firstname,guardian_secondname,guardian_lastname,date_of_birth 
					FROM student_master
					WHERE class = '".$class."' and schoolcode = '".$school."'	";
			$result = mysql_query($query,$connid);
			while($row = mysql_fetch_array($result))
			{
				$studentArray[$count]['satid'] = $row['cts_number'];
				$studentArray[$count]['name'] = $row['firstname']." ".$row['secondname']." ".$row['lastname'];
				$studentArray[$count]['guardian_name'] = $row['guardian_firstname']." ".$row['guardian_secondname']." ".$row['guardian_lastname'];
				$studentArray[$count]['dob'] = $row['date_of_birth'];
				$count++;
			}
			return $studentArray;
		}	
	}
	function changeSchoolClassOfStudent($userid,$connid)
	{
		if(isset($_POST['loop']) && $_POST['loop'] != '' )
		{
			$loop = $_POST['loop'];
			for($sc = 0; $sc < $loop ; $sc++ )
			{
				$school = $_POST["schoolsugg".$sc];
				$schtemparr = explode("-",$school);
				$schoolcode = Dotrim($schtemparr[1]);
				$schoolname = Dotrim($schtemparr[0]);
				$cts = $_POST["student".$sc];
				$promote = $_POST["to_promote".$sc];
				$this->updateStudent($cts,$schoolcode,$schoolname,$promote,$userid,$connid);
			}
		}
	}
	function updateStudent($cts,$schoolcode,$schoolname,$promote,$userid,$connid)
	{
		$oldClassSchoolArray = $this->fetchSchoolClassFromCts($cts,$userid,$connid);
		$oldClass = $oldClassSchoolArray['class'];
		$oldSchoolCode = $oldClassSchoolArray['school'];
		if($oldSchoolCode != $schoolcode)
		{
			if($promote == 'Y')
			{
				if($oldClass == 'PP')
					$newClass = 1;
				else if($oldClass == 12)
					$newClass = 'EOS';
				else 
					$newClass = $oldClass +1;
			}else 
				$newClass = $oldClass;		
				
			//UPDATE THE student_master table			
			$query = "UPDATE student_master
					SET schoolcode = '".$schoolcode."' , schoolname = '".$schoolname."', class = '".$newClass."' 
					WHERE cts_number = '".$cts."' ";
			$result = mysql_query($query,$connid) or die('updating student class and school'.mysql_error());
	
			//enter into log table
			$query = "INSERT INTO bt_logSchoolTransfer
					SET cts_number = '".$cts."', old_schoolcode = '".$oldSchoolCode."', old_class = '".$oldClass."',new_schoolcode = '".$schoolcode."', new_class = '".$newClass."', added_by = '".$userid."'	";
			$result = mysql_query($query,$connid) or die('updating log table'.mysql_error());
		}	
	}
	function fetchSchoolClassFromCts($cts,$userid,$connid)
	{
		$class_school_array = array();
		$query = "SELECT class,schoolcode from student_master
				WHERE cts_number = '".$cts."'";
		$result = mysql_query($query,$connid);
		$row = mysql_fetch_array($result);
		$class_school_array['school'] = $row['schoolcode'];
		$class_school_array['class'] = $row['class'];
		return $class_school_array;
	}
	function addSkillToSubject($userid,$connid)
	{
		$message = '';	
		if(isset($_POST['action']) && $_POST['action'] == 'AddSkillToSubject')
		{
			$this->setpostvars();
			if(!$this->checkDuplicateSubjectAndSkill($this->subject,$this->skill,$connid))
			{
				$query = "INSERT INTO bt_teachertraining_skills
						SET skillname = '".$this->skill."', subject = '".substr($this->subject,0,1)."',added_by = '".$userid."'	";
				$result = mysql_query($query,$connid) or die('inserting skill and subject'.mysql_error());
				$numrows = mysql_affected_rows();
				if($numrows > 0)
				{
					echo "<script>opener.location.reload(true);window.close();</script>";
					exit();	
					//$message = "<center><b><font color='#FF0000' >The subject and skill were added successfully.</font></b></center>";
				}
			}
			else 
				$message = 	"<center><b><font color='#FF0000' >Entered subject and skill already exist!</font></b></center>";
		}
		return $message;
	}
	function checkDuplicateSubjectAndSkill($subject,$skill,$connid)
	{
		$query = "SELECT count(*) as count FROM bt_teachertraining_skills
				WHERE subject = '".substr($subject,0,1)."' and skillname = '".$skill."'";
		
		$result = mysql_query($query,$connid)or die('selecting skill and subject'.mysql_error());
		$row = mysql_fetch_array($result);
		$numrows = $row['count'];
		if($numrows > 0)
			return true;
		else 
			return false;	
	}
}
?>