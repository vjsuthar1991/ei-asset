<?php
include_once dirname(__FILE__) . "/../constants.php";
class clsdatestscheduler
{

	var $connid;
	var $year;
	var $region;
	var $regionSchools;
	var $month;
	var $typeTest;
	var $kitsRequired;
	var $piesRequired;
	var $noTestDates;
	var $school_exam_mode;
	var $bookSupportVisitDate;
	var $login_user;
	var $schoolcode;
	var $school_code;
	var $city;
	var $order_id;        
    
	function clsdatestscheduler($connid ="")
	{
		$this->connid = $connid; //Connection
		$this->year = "";
		$this->region = "";
		$this->regionSchools = "";
		$this->monthYear= "";
		$this->typeTest ="";
		$this->kitsRequired ="";
		$this->noTestDates = "";
		$this->school_exam_mode="";
		$this->bookSupportVisitDate="";
		$this->login_user ="";
		$this->month ="";
		$this->city = "";
		$this->order_id = 0;
		$this->piesRequired = "";
	}

	function setpostvars()
	{

		if(isset($_POST["clsdascheduler_year"])) $this->year = $_POST["clsdascheduler_year"];

		if(isset($_POST["city"])) $this->city = $_POST["city"];
		if(isset($_POST["region"])) $this->region = $_POST["region"];
		
		if(isset($_POST["regionSchools"])) $this->regionSchools =$_POST["regionSchools"];
		if(isset($_POST["acadYear"])) $this->year = $_POST["acadYear"];
		if(isset($_POST["monthYear"])) $this->monthYear = $_POST["monthYear"];

		if(isset($_POST["bookSupportVisitDate"])) $this->bookSupportVisitDate =$_POST["bookSupportVisitDate"];
		if(isset($_POST["username"])) $this->login_user = $_POST["username"];

		if(isset($_POST["monthKit"])) $this->month = $_POST["monthKit"];
		
	}

	function setgetvars()
	{

	}

	// 
	function GetSchoolsForRegion(){
        global $constant_da;
		$this->setpostvars();
		
		$condition = "";
			
		if($this->year != "ALL" && $this->year != '')
		{
			$condition .= " AND da_orderMaster.year = '".$this->year."' ";
		}			
		if($this->region !="")
		{
			$condition .= " AND da_kitRegions.id ='".$this->region."' ";
		}
		$resultarr = array();
		$query = "SELECT DISTINCT(da_orderMaster.schoolCode),schools.schoolname
				  FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster
				  INNER JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno
				  INNER JOIN da_regionCities ON schools.city = da_regionCities.city
				  INNER JOIN da_kitRegions ON da_regionCities.region_id = da_kitRegions.id
				  WHERE da_orderMaster.schoolCode != 0 $condition 
				  AND da_orderMaster.exam_mode ='comprehensive'
				  ORDER BY schools.schoolname";

	//	echo "$query ";
		$dbqry = new dbquery($query,$this->connid);
		if ($dbqry->numrows()>0)
        {        	
           while($row = $dbqry->getrowarray()){	
           		$resultarr[$row["schoolCode"]] =  $row["schoolname"];
           }
        }
        
        return $resultarr;
		
	}

	
	function delSchedule($delschoolCode, $cycle_number)
	{
		$dates_test = array();
		$alreadyPlannedCount =1;
		$msg_code =0;
		// check if there is entry for no Test days in planner if not delete

	// get booked dates based on cycle schoolcode and year if those dates are in plan dont delete
		$cycle_query = "SELECT distinct (booking_date) FROM da_kitBooking WHERE schoolCode ='".$delschoolCode."' AND cycle_number ='".$cycle_number."' ";
	//	echo "$cycle_query <br/>";
		$dbqry = new dbquery($cycle_query,$this->connid);

		while($row = $dbqry->getrowarray())
		{
			$dates_test[] = "'".$row["booking_date"]."'";
		}

		
		$planned_date_list = implode(",", $dates_test);

		$plan_str = rtrim($planned_date_list,",");

		if($plan_str =="") return ;

		$cond1 = "SELECT count(*) plannedCount FROM da_testPlanner WHERE schoolCode = '".$delschoolCode ."' AND planned_dt in ($plan_str)";
	//	echo "$cond1";
		$cond1_dbqry = new dbquery($cond1,$this->connid);	
		
		$cond1_result = $cond1_dbqry->getrowarray(); 

		$alreadyPlannedCount = $cond1_result["plannedCount"];

		if($alreadyPlannedCount == 0)
		{
			$del_query = "DELETE FROM da_kitBooking WHERE schoolCode ='".$delschoolCode."' AND cycle_number ='".$cycle_number."'  AND year = '".$this->year."' ";
		//	echo "$del_query ";
			$del_dbqry = new dbquery($del_query,$this->connid);	
			$del_query = "DELETE FROM da_pieBooking WHERE schoolCode ='".$delschoolCode."' AND cycle_number ='".$cycle_number."'  AND year = '".$this->year."' ";
			$del_dbqry = new dbquery($del_query,$this->connid);	
			$msg_code = 2; // Success code 
		}
		else
		{
			$msg_code = 1; // Fail code 
		}

		return $msg_code;

	}

	function getBookedInfoForDelete()
	{
        global $constant_da;
		$condition ="";
		if($this->regionSchools != "")
		{
			$condition = " AND da_kitBooking.schoolCode ='".$this->regionSchools."' ";
		}
		if($this->region !="")
		{
			$condition .= " AND da_kitRegions.id ='".$this->region."' ";
		}

		$query ="SELECT da_kitBooking.id, schools.schoolName, group_concat(da_kitBooking.booking_date ORDER BY da_kitBooking.booking_date) booking_date ,da_kitBooking.schoolCode, da_kitBooking.cycle_number, da_orderMaster.no_of_testdays, da_orderMaster.exam_mode, da_orderMaster.no_of_kits FROM da_kitBooking LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools 
				ON da_kitBooking.schoolCode = schools.schoolno 
				LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster ON da_orderMaster.schoolCode = da_kitBooking.schoolCode  
				INNER JOIN da_regionCities ON schools.city = da_regionCities.city 
				INNER JOIN da_kitRegions ON da_kitRegions.id = da_regionCities.region_id
				WHERE da_orderMaster.year ='".$this->year."' AND da_kitBooking.year ='".$this->year ."' 
				".$condition. " 
				GROUP BY da_kitBooking.schoolCode,  da_kitBooking.cycle_number";
		$dbqry = new dbquery($query,$this->connid);	
		
		while($row=$dbqry->getrowarray())
		{
			$returnArr[] = array("booking_id" => $row["id"],
                "schoolCode"=> $row["schoolCode"],
                "schoolName"=> $row["schoolName"],
                "booking_date"=> $row["booking_date"],
                "exam_mode"=> $row["exam_mode"],
                "no_of_testdays"=>$row["no_of_testdays"],
                "no_of_kits"=>$row["no_of_kits"],
                "cycle_number"=>$row["cycle_number"]
            );		
		}
		return $returnArr;
	}
	function kitInfoForUpdate($exam_mode)
	{
        global $constant_da;

		$returnArr = array();

		/*if($exam_mode!= "")
		{
			$query = "SELECT da_orderMaster.order_id, schools.schoolno, schools.schoolName, da_orderMaster.exam_mode, da_orderMaster.year, da_orderMaster.no_of_kits, da_orderMaster.no_of_testdays 
					  FROM da_orderMaster 
					  INNER JOIN schools ON da_orderMaster.schoolCode= schools.schoolno WHERE da_orderMaster.year = '".$this->year."'
		 			  AND schools.city ='".$this->city."' 
		 			  AND da_orderMaster.exam_mode = '".$exam_mode."'";
		}
		else
		{*/
			$query = "SELECT da_orderMaster.order_id, schools.schoolno, schools.city, schools.schoolName, da_orderMaster.exam_mode, da_orderMaster.year, 
							 da_orderMaster.no_of_kits, da_orderMaster.no_of_testdays, da_orderMaster.no_of_pies
					  FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster 
					  INNER JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno
					  INNER JOIN da_regionCities ON schools.city = da_regionCities.city
					  INNER JOIN da_kitRegions ON da_regionCities.region_id = da_kitRegions.id
					  WHERE da_orderMaster.year = '".$this->year. "'
		 			  AND da_kitRegions.region ='".$this->region."'
		 			  AND da_orderMaster.exam_mode = 'comprehensive'";
		/*}*/
		//echo $query;
		$dbqry = new dbquery($query,$this->connid);	
		while($row=$dbqry->getrowarray())
		{
			$returnArr[] = array("order_id" => $row["order_id"],
								 "schoolCode"=> $row["schoolno"],
								 "city" => $row["city"], 
								 "schoolName"=> $row["schoolName"],
								 "booking_date"=> $row["booking_date"],
								 "exam_mode"=> $row["exam_mode"],
								 "no_of_testdays"=>$row["no_of_testdays"],
								 "no_of_kits"=>$row["no_of_kits"],
								 "no_of_pies"=>$row["no_of_pies"],
								 "year"=>$row["year"]
								 );
		}
		return $returnArr;
	}

	function kit_testDetailsForSchool($order_id)
	{
        global $constant_da;
		$returnArr = array();

		if($order_id != "")
		{
			$query = "SELECT da_orderMaster.schoolCode, da_orderMaster.exam_mode, schools.schoolName,  
							 da_orderMaster.year, da_orderMaster.no_of_kits, da_orderMaster.no_of_testdays ,da_orderMaster.no_of_pies
					   FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster 
					   LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno 
					   WHERE da_orderMaster.order_id = '".$order_id. "' "; 

			//	echo "$query ";
			$dbqry = new dbquery($query,$this->connid);	
		
			while($row=$dbqry->getrowarray())
			{
				$returnArr = array("schoolCode"=> $row["schoolCode"], 
									 "schoolName"=> $row["schoolName"],
									 "exam_mode"=> $row["exam_mode"],
									 "no_of_testdays"=>$row["no_of_testdays"],
									 "no_of_kits"=>$row["no_of_kits"],
									 "no_of_pies" => $row["no_of_pies"],
									 "year"=>$row["year"]);	
			}	
		}
		
		return $returnArr;
	}
	function getCountKitsZone()
	{
		$zone_query ="SELECT count(*) FROM da_kitMaster WHERE region_id ='".$this->region."' AND type='".$this->typeTest."' ";
		$dbqry = new dbquery($zone_query,$this->connid);	
		$result = $dbqry->getrowarray();
		return $result[0];
	}

	function getCountPiesZone()
	{
		$zone_query ="SELECT count(*) FROM da_kitMaster WHERE region_id ='".$this->region."' AND type='PIE' ";
		$dbqry = new dbquery($zone_query,$this->connid);	
		$result = $dbqry->getrowarray();
		return $result[0];
	}
	
	function insertBookingDetails($kit_id_str, $piesToInsert ,$booking_date, $typeTest, $noDays, $monthYear){
		
        global $constant_da;

		$this->setpostvars();

		if($noDays == 0 || $kit_id_str == "") { $error_str = "Enter test days and kit no required for school"; return $error_str; }
		
	//	$kit_idArr = explode(",",$kit_id_str);
	//	$pie_idArr = explode(",",$piesToInsert);
		
		$error_str ="";
		$dates_test  = array();
		$start = new DateTime("$booking_date");
		
		// Get first and last date of the booking to insert exclude sundays the dates_test array hold all dates to insert in table		
		for($i=0; $i<$noDays; $i++){
		    $weekday = $start->format('w');
		    if($weekday != 0 ){ // 0 for Sunday and 6 for Saturday
		    	$dates_test[]= $start->format("Y-m-d");
		    }else{
		     	$i--;
		    }
		 	$modif = $start->modify('+1 day');
		}
		$first_date= $dates_test[0];
		$last_date = end($dates_test);

		// kits available based on kits in region and kits already booked in the date range
		$kit_bookedArr =array();
		$pie_bookedArr = array();
		$kit_idArr =array();
		$pie_idArr =array();

		$kit_query ="SELECT group_concat(id) kits from da_kitMaster WHERE region_id ='".$this->region."' AND type='".$typeTest."'";
		$kit_dbqry = new dbquery($kit_query,$this->connid);
		$kit_result = $kit_dbqry->getrowarray();
		$kit_region_str = $kit_result["kits"];

		if($kit_region_str == "")
		{
			$error_str ="No Kits allocated in region <br/>";
			return $error_str;
		}
		// Server side validation, kit has been booked in Next month
		$check_query = "SELECT da_kitBooking.kit_id, da_kitBooking.schoolCode FROM da_kitBooking WHERE  year = '".$this->year."' AND  booking_date BETWEEN '".$first_date."' AND '".$last_date."' ";
		$check_dbqry = new dbquery($check_query,$this->connid);
		while($cond1_row = $check_dbqry->getrowarray())
		{
			if($cond1_row["schoolCode"] == $this->regionSchools )
			{
				$error_str ="A kit has been booked by same school in the date range<br/>";
				return $error_str;
			}

			if(!in_array($cond1_row["kit_id"],$kit_bookedArr))
			$kit_bookedArr[] = $cond1_row["kit_id"];
		/*	else if(in_array($cond1_row["kit_id"], $kit_idArr)){
				$error_str ="Kit has already been booked!<br/>";
				return $error_str;
			}	
		*/
		}

		$kit_regionArr = explode(",",$kit_region_str);

		$kit_available  = array_diff($kit_regionArr,$kit_bookedArr);
	//	print_r($kit_available);print "<br/> ";print "<br/>";
		
		$index =0;
		foreach($kit_available as $key => $kitID)
		{
			if($index == $this->kitsRequired) 
				break;
			
			$kit_idArr[]= $kitID; 
			$index++;
		}

		if(count($kit_idArr) != $this->kitsRequired)
		{
			$error_str ="Required Kits are not available on the requested days.<br/>";
			return $error_str;
		}

		$pie_query ="SELECT group_concat(id) pies from da_kitMaster WHERE region_id ='".$this->region."' AND type='PIE'";
		$pie_dbqry = new dbquery($pie_query,$this->connid);
		$pie_result = $pie_dbqry->getrowarray();
		$pie_region_str = $pie_result["pies"];

		if($pie_region_str == "")
		{
			$error_str ="No pies allocated in region <br/> ";
			return $error_str;
		}

		# pie booking validation ( if same pie id is booked or not)
		$check_query1 = "SELECT pie_id,schoolCode FROM da_pieBooking WHERE year = '".$this->year."' AND booking_date BETWEEN '".$first_date."' AND '".$last_date."'";
		$check_dbqry1 = new dbquery($check_query1,$this->connid);
		while($row2 = $check_dbqry1->getrowarray())
		{
		/*	if(in_array($row2["pie_id"], $pie_idArr)){
				$error_str ="Pie has already been booked!<br/>";
				return $error_str;
			}
		*/
			if(!in_array($row2["pie_id"],$pie_bookedArr))
				$pie_bookedArr[] = $row2["pie_id"];
		}

		$pie_regionArr = explode(",",$pie_region_str);

		$pie_available  = array_diff($pie_regionArr,$pie_bookedArr);
		
		$index =0;
		foreach($pie_available as $key => $pieID)
		{
			if($index == $this->piesRequired) 
				break;
			
			$pie_idArr[]= $pieID; 
			$index++;
		}

	//	echo "KIT range $kit_region_str <br/> KIT booked in Range $kit_booked_str <br/> ";
		if(count($pie_idArr) != $this->piesRequired)
		{
			$error_str ="Required pies are not available on the requested days.<br/>";
			return $error_str;
		}
			
		//Condition 2 check if booking date is greater than start date and bookDate + noDays less than end date
			
		//echo "End date Order --> $end_dateOrder ";
		$cond2_query ="SELECT count(*) cnt FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster WHERE schoolCode ='".$this->regionSchools."' AND year ='".$this->year."' AND end_date >= '".$last_date."' AND start_date <= '".$first_date."' ";
		$cond2_dbqry = new dbquery($cond2_query,$this->connid);
		$result = $cond2_dbqry->getrowarray();
		$returnVal = $result["cnt"];

		if($returnVal == 0){
			$error_str ="You are trying to book before Start date or past the End date <br/>";
			return $error_str;
		}	
				
		// Condition 3 to check there is 20 days gap from start date and end date - after change in logic we are storing all the days 
		// $prevgap_day = date("Y-m-d", strtotime("$first_date - 10 days"));
		// $nextgap_day = date("Y-m-d", strtotime("$last_date + 10 days"));

		// Changed gap between booking to be 3 days as per URVI
		 $prevgap_day = date("Y-m-d", strtotime("$first_date - 3 days"));
		 $nextgap_day = date("Y-m-d", strtotime("$last_date + 3 days"));
	
		$cond3_query = "SELECT booking_date FROM da_kitBooking WHERE schoolCode = '".$this->regionSchools."' AND year = '".$this->year."' AND  booking_date  BETWEEN '".$prevgap_day."' AND '".$nextgap_day."' order by booking_date";
		$cond3_dbqry = new dbquery($cond3_query,$this->connid);
		while($cond3_row = $cond3_dbqry->getrowarray())
		{
			// date of booking in range is less than last first date then then prev booking else next booking msg 
			if($cond3_row["booking_date"] <= $first_date)
			{				
				$disp_date = date('d-m-Y', strtotime($cond3_row["booking_date"]));
				$error_str ="There should be 3 days gap between current and prev booking. Previous booking is on ".$disp_date."";
				return $error_str;

			}
			else
			{
				$disp_date = date('d-m-Y', strtotime($cond3_row["booking_date"]));
				$error_str ="There should be 3 days gap between current and next booking! Next booking is on '".$disp_date."' ";
				return $error_str;
			}	

		}	

		$userName = $_SESSION["username"];

		// get cycle no 
		$cycle_query = "SELECT max(cycle_number) cycle FROM da_kitBooking WHERE schoolCode = '".$this->regionSchools."' AND year ='".$this->year."' ";
		$cycle_dbqry = new dbquery($cycle_query,$this->connid);

		$cycle_result = $cycle_dbqry->getrowarray();
		$cycleNo = $cycle_result["cycle"];

		if($cycleNo =="" || $cycleNo == 0) 
			$cycleNo= 1;
		else
			$cycleNo +=1;

		# inserting in kit booking table
		$insert_str = "";
		foreach($kit_idArr as $key => $kit_id)
		{
			foreach($dates_test as $keyDt => $BookDateVal){
				$insert_str.= ",('".$kit_id."','".$BookDateVal."','".$this->regionSchools."', '".$this->year."' ,NOW(), '".$userName."', '".$cycleNo."' ) ";
			}
		}
		$insert_stem = "INSERT INTO da_kitBooking(kit_id,booking_date,schoolCode,year,booked_dt,booked_by, cycle_number) VALUES ";
		$insert_str =ltrim($insert_str , ",");
		$insert_qry = $insert_stem.$insert_str;
		$ins_dbqry = new dbquery($insert_qry,$this->connid);			

		# inserting in pie booking table
		$in_str = "";
		foreach($pie_idArr as $key => $pie_id)
		{
			foreach($dates_test as $keyDt => $BookDateVal){
				$in_str.= ",('".$pie_id."','".$BookDateVal."','".$this->regionSchools."', '".$this->year."' ,NOW(), '".$userName."', '".$cycleNo."' ) ";
			}
		}
		$in_stem = "INSERT INTO da_pieBooking(pie_id,booking_date,schoolCode,year,booked_dt,booked_by,cycle_number) VALUES ";
		$in_str =ltrim($in_str , ",");
		$in_qry = $in_stem.$in_str;
		$in_dbqry = new dbquery($in_qry,$this->connid);
		
		
		return $error_str;	
	}
	function checkif15days($booking_date) {
		$now = strtotime(date('Y-m-d')); // or your date as well
		$booking_date = strtotime($booking_date);
		$datediff = $booking_date - $now;
		return $datediff/(60*60*24);
	}
	
	function getDayAvailable($month, $year)
	{
		$timestamp = mktime(0,0,0,$month,1,$year);

		$maxday    = date("t",$timestamp);
		$thismonth = getdate ($timestamp);
		$startday  = $thismonth['wday'];	

		$available_dayArr = array();
		
		// To remove sat and sunday

		for ($i=0; $i<($maxday+$startday); $i++) {
		
			$cur_date =($i - $startday + 1);

			if(($i% 7 == 0) )
			{

			}
			else
			{
				if($cur_date >=1)
					$available_dayArr[]=$cur_date;
			}	

		}	
		return $available_dayArr;
	}	
	
	function getOverlappedData()
	{
        global $constant_da;

		$this->setpostvars();
		$overlapArr =array();

		list($split_mnt, $split_yr) =explode("-", $this->monthYear);

		$start_date ="$split_yr-$split_mnt-01";
	
	    $start_date= date('Y-m-d', strtotime($start_date." -1 month"));
	

        // End date will not work properly as it might be sunday or saturday
	
	    $mnt = date("m", strtotime($start_date));
	    $yr = date("Y", strtotime($start_date));
	    $availabledayArr = $this->getDayAvailable($mnt, $yr);
	    $end_day = end($availabledayArr);
	
	    $end_date= "".$yr."-".$mnt."-".$end_day."";
	    
        // Get last booking dates of previous whose data overlap to current date 
	
	    $booked_query = "SELECT schools.schoolname, da_kitBooking.schoolCode, da_kitBooking.booking_date, da_kitBooking.kit_id,
							da_orderMaster.exam_mode, da_orderMaster.no_of_kits, da_orderMaster.no_of_testdays FROM da_kitBooking 
					 LEFT JOIN da_kitMaster on da_kitMaster.id =da_kitBooking.kit_id AND da_kitMaster.type='".$this->typeTest."'
					 LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster on da_kitBooking.schoolCode =da_orderMaster.schoolCode AND da_orderMaster.year ='".$this->year."' AND da_orderMaster.exam_mode ='".$this->school_exam_mode ."'
					 LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools on da_kitBooking.schoolCode =schools.schoolno
					 WHERE da_kitBooking.booking_date >= '".$start_date."' and da_kitBooking.booking_date <='".$end_date."'
					 AND da_kitMaster.region_id ='".$this->region."' ";

//	echo "$booked_query <br/>";
	$count_kitsBooked =0;				 
	$dbqry = new dbquery($booked_query,$this->connid);
	if ($dbqry->numrows()>0)
       {

          while($row = $dbqry->getrowarray()){	

				$resultarr[$row["booking_date"]][] = array("schoolCode" =>$row["schoolCode"],
        													"schoolname" => $row["schoolname"],
        													"booking_date" => $row["booking_date"],
        													"kit_id" =>  $row["kit_id"]	,
						        							"no_of_kits" => $row["no_of_kits"],
						        							"no_of_testdays" => $row["no_of_testdays"],
						        							);

         	}
        } 

        foreach($resultarr as $keyBooked => $valueArr)
        {
        	foreach($valueArr as $key => $detailArr)
			{
				$daysTest = $detailArr["no_of_testdays"] -1;
				$countDate = $detailArr["booking_date"];
				date_default_timezone_set('Asia/Calcutta');

				$check_date = date('Y-m-d', strtotime($countDate ."+".$daysTest." days"));

				$check_dt =strtotime($check_date);
				$end_dt = strtotime($end_date);
	
				$dayDiff = $check_dt - $end_dt ;
		
				$days = floor($dayDiff/(60*60*24));
		
				if($check_date > $end_date)
				{
					$overlapArr["booking_date"][] = array("schoolCode" =>$detailArr["schoolCode"],
        													"schoolname" => $detailArr["schoolname"],
        													"booking_date" => $detailArr["booking_date"],
        													"kit_id" =>  $detailArr["kit_id"]	,
						        							"no_of_kits" => $detailArr["no_of_kits"],
						        							"no_of_testdays" => $detailArr["no_of_testdays"],
						        							"dayOverlapped" => $days,
						        							); 
				}
			}	
        }	

        return $overlapArr;

	}

	function getTotalStudents()
	{   global $constant_da;
		$totalStudents = 0;
		$this->setpostvars();

		$returnArr =array();

		$query = "SELECT SUM(da_orderBreakup.total_students) totalStudents FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderBreakup ON da_orderMaster.order_id = da_orderBreakup.order_id 
				  WHERE da_orderMaster.schoolCode ='".$this->regionSchools."' AND da_orderMaster.year='".$this->year."' ";
		$dbqry = new dbquery($query,$this->connid);

		if ($dbqry->numrows()>0)
    	{
    		$row = $dbqry->getrowarray();
			if($row["totalStudents"]!=NULL)
				$totalStudents = $row["totalStudents"];
		}
		
		return $totalStudents;

	}
	function getStartEndofOrder()
	{
        global $constant_da;
		$this->setpostvars();

		$returnArr =array();

		$query = "SELECT start_date, end_date FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster WHERE schoolCode ='".$this->regionSchools."' AND year='".$this->year."' ";
		// echo "QUERY -- >$query "; 

		$dbqry = new dbquery($query,$this->connid);
		if ($dbqry->numrows()>0)
    	{
    		$row = $dbqry->getrowarray();
			$returnArr["start_date"] =$row["start_date"];
			$returnArr["end_date"] =$row["end_date"]; 
		}

		return $returnArr;
	}
	function insertSupportVisit($status)
	{
        global $constant_da;
		$this->setpostvars();
		$cond2Arr = array();
		$error_str ="";
		//bookSupportVisitDate
		// Checck if a entry is there 
		$con_query = "SELECT count(*) count_visits from da_supportVisit LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools on da_supportVisit.schoolCode = schools.schoolno
					  WHERE schools.city = (select city from schools where schoolno='".$this->regionSchools."' ) AND  
					  da_supportVisit.visit_dt = '".$this->bookSupportVisitDate."'  ";
	//	echo "$con_query";
		$con_dbqry = new dbquery($con_query, $this->connid);

		$result = $con_dbqry->getrowarray();
		$cnt = $result["count_visits"];

		if($cnt >= 1)
		{
			return;
		}
		
		// Condition 2 check if support visit is before start and end date for the school
		$cond2Arr = $this->getStartEndofOrder();
		if($cond2Arr["start_date"] > $this->bookSupportVisitDate || $cond2Arr["end_date"] < $this->bookSupportVisitDate)
		{
			$error_str = "You are trying to book Before/After Start and End date of School";
			return $error_str;
		}
		// Condition 3 check if support visit days 1 visit per month
		// Start date End date fetch in 1 visit per month

		//check for any entry between start and end date of that month
		list($split_yr,	$split_mnt, $split_day) =explode("-", $this->bookSupportVisitDate);
		$gap1_date ="$split_yr-$split_mnt-01";
		$gap2_date = date('Y-m-t',strtotime($gap1_date));

		$cond3_query  = "SELECT count(*) cnt FROM da_supportVisit where schoolCode ='".$this->regionSchools. "' AND
					visit_dt BETWEEN '".$gap1_date."' AND '".$gap2_date."'  "; 
	//	echo "$cond3_query <br/>";
		$cond3_dbqry = new dbquery($cond3_query, $this->connid);

		$cond3_result = $cond3_dbqry->getrowarray();
		
		
		if($cond3_result["cnt"]  >= 1)
		{
			$error_str = "Only one request for a support visit can be made in a month";
			return $error_str;
		}	
		
		$query= "INSERT INTO da_supportVisit(schoolCode,visit_dt,request_dt,requested_by,status,year) VALUES(
				'".$this->regionSchools."',
				'".$this->bookSupportVisitDate."',
					CURDATE(),
				'".$this->login_user."',
				'".$status."',
				'".$this->year."' )";

		$dbqry = new dbquery($query,$this->connid);

	}
	
	# collect all data booked during the month-year selected in schedule test interface
	function getBookedDates()
	{
        global $constant_da;
	    $start_date ="";
	    $end_date = ""; 
		$resultarr = array();
		
		$this->setpostvars();
	
		$type_query = "SELECT exam_mode, no_of_kits, no_of_testdays, order_id, no_of_pies
					   FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster WHERE year ='".$this->year."' AND schoolCode='".$this->regionSchools."'";
		$dbqry = new dbquery($type_query,$this->connid);
		
		if ($dbqry->numrows()>0){
	    	$row = $dbqry->getrowarray();
	    	$exam_mode = $row[0];
	    	$noKits = $row[1];
	    	$noTestdays = $row[2];
	
	    	if($exam_mode == "mobile"){
	    		$type ="MOB";
	    	}
	    	else if($exam_mode == "comprehensive"){
	    		$type="TAB";
	    	}
	
	    	$this->school_exam_mode =$exam_mode;
	    	$this->typeTest =$type;
			$this->kitsRequired =$row[1];
			$this->noTestDates = $row[2];
			$this->order_id = $row[3];
			$this->piesRequired = $row[4];
	    }
		
	
		list($split_mnt, $split_yr) =explode("-", $this->monthYear);
		$start_date ="$split_yr-$split_mnt-01";
		$end_date = date('Y-m-t',strtotime($start_date));    
	
		$booked_query = "SELECT schools.schoolname, da_kitBooking.schoolCode, da_kitBooking.booking_date, group_concat(da_kitBooking.kit_id) as bookedkitids,
								da_orderMaster.exam_mode, da_orderMaster.no_of_kits, da_orderMaster.no_of_testdays 
			   			 FROM da_kitBooking 
						 LEFT JOIN da_kitMaster on da_kitMaster.id =da_kitBooking.kit_id AND da_kitMaster.type='".$this->typeTest."'
						 LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster on da_kitBooking.schoolCode =da_orderMaster.schoolCode AND da_orderMaster.year ='".$this->year."' AND da_orderMaster.exam_mode ='".$exam_mode ."'
						 LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools on da_kitBooking.schoolCode =schools.schoolno
						 WHERE da_kitBooking.booking_date >= '".$start_date."' and da_kitBooking.booking_date <='".$end_date."' 
						 AND da_kitMaster.region_id ='".$this->region."'  AND da_kitBooking.year= '".$this->year."'
						 group by schoolCode,booking_date ";
		//echo "<br/>Book Query ".$booked_query;
		$dbqry = new dbquery($booked_query,$this->connid);
		if ($dbqry->numrows()>0){
	        while($row = $dbqry->getrowarray()){	
					$resultarr[$row["booking_date"]][$row["schoolCode"]] = array("schoolCode" =>$row["schoolCode"],
	        													"schoolname" => $row["schoolname"],
	        													"booking_date" => $row["booking_date"],
	        													"kit_id" =>  $row["bookedkitids"]	,
							        							"no_of_kits" => $row["no_of_kits"],
							        							"no_of_testdays" => $row["no_of_testdays"],
							        							);
			}
	    }
	    
	    #collecting the pies booking during the date
		$booked_query2 = "SELECT schools.schoolname, da_pieBooking.schoolCode, da_pieBooking.booking_date, group_concat(da_pieBooking.pie_id) as bookedpies,
								da_orderMaster.exam_mode, da_orderMaster.no_of_pies, da_orderMaster.no_of_testdays 
			   			 FROM da_pieBooking 
						 LEFT JOIN da_kitMaster on da_kitMaster.id = da_pieBooking.pie_id AND da_kitMaster.type='PIE'
						 LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster on da_pieBooking.schoolCode = da_orderMaster.schoolCode AND da_orderMaster.year ='".$this->year."' AND da_orderMaster.exam_mode ='".$exam_mode ."'
						 LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_pieBooking.schoolCode =schools.schoolno
						 WHERE da_pieBooking.booking_date >= '".$start_date."' and da_pieBooking.booking_date <='".$end_date."' 
						 AND da_kitMaster.region_id ='".$this->region."'  AND da_pieBooking.year= '".$this->year."'
						 group by schoolCode,booking_date ";
		//echo "<br/>Book Query ".$booked_query2;
		$dbqry2 = new dbquery($booked_query2,$this->connid);
		if ($dbqry2->numrows()>0){
	        while($row2 = $dbqry2->getrowarray()){	
	        	$resultarr[$row2["booking_date"]][$row2["schoolCode"]]["pie_id"] = $row2["bookedpies"];
				$resultarr[$row2["booking_date"]][$row2["schoolCode"]]["no_of_pies"] = $row2["no_of_pies"];
	        }
	    }
	    return $resultarr; 	
	    
	}
	
	function getSupportVistDatesofSchool($monthYearOrder)
	{
		$resultArr =array();

		$start_date = $monthYearOrder["start_date"];
		$end_date = $monthYearOrder["end_date"];
		$query ="SELECT visit_dt,schoolCode,status,request_dt, requested_by FROM da_supportVisit WHERE schoolCode ='".$this->regionSchools."' AND visit_dt >= '".$start_date."' AND visit_dt <= '".$end_date."' AND year = ".$this->year." ORDER BY status DESC, visit_dt";
		$dbqry = new dbquery($query,$this->connid);
		if ($dbqry->numrows()>0)
        {
           while($row = $dbqry->getrowarray()){	
           		$resultArr[]= array("schoolCode" => $row["schoolCode"],
           							 "visit_dt" => $row["visit_dt"],
           							 "status" => $row["status"],
           							 "requested_by"=>$row["requested_by"],
           							 "request_dt"=>$row["request_dt"]
           							);

           }
         } 

         return $resultArr; 
	}
	function getSupportVisitDates()
	{	
        global $constant_da;

		$resultArr = array();
		list($split_mnt, $split_yr) =explode("-", $this->monthYear);
		$start_date ="$split_yr-$split_mnt-01";
		$end_date = date('Y-m-t',strtotime($start_date));   
		
		$query ="SELECT visit_dt,schoolCode,status FROM da_supportVisit LEFT JOIN schools on da_supportVisit.schoolCode = schools.schoolno
		WHERE schools.city = (select city from {$constant_da(COMMON_DATABASE)}.schools where schoolno='".$this->regionSchools."' ) AND  
		visit_dt >= '".$start_date."' AND visit_dt <= '".$end_date."' AND year= ".$this->year."";		

//		echo "$query <br/>";

		$dbqry = new dbquery($query,$this->connid);
		if ($dbqry->numrows()>0)
        {
           while($row = $dbqry->getrowarray()){
           	
           		if($row["schoolCode"] == $this->regionSchools)
           		{
           		
           		/*	if($row["status"] == 1)
           			{
	           			$resultArr[$row["visit_dt"]] = 2;
	           		}
	           		else
	           		{	
	           			$resultArr[$row["visit_dt"]] = 3;
	           		}
	           	*/	
	           		$resultArr[$row["visit_dt"]] = 2;
	           	}
	           	else
	           	{
	           		$resultArr[$row["visit_dt"]] = 1;
	           	}
	          }
         }

		return $resultArr;
	}
	function getSupportVisitAllDetails()
	{
        global $constant_da;

		$condition ="";
		$resultArr = array();
		$status_str ="";
		
		$start_date ="$this->year-01-01";
		$end_date ="$this->year-12-31";

		if($this->regionSchools !="")
		{
			$condition = "AND schoolCode ='".$this->regionSchools ."' ";
		}
		
		$query ="SELECT da_supportVisit.id, da_supportVisit.visit_dt, da_supportVisit.schoolCode, schools.schoolname, da_supportVisit.status, da_supportVisit.updated_by FROM da_supportVisit 
				 LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools on da_supportVisit.schoolCode = schools.schoolno 
				 WHERE da_supportVisit.visit_dt >= '".$start_date."' AND da_supportVisit.visit_dt <= '".$end_date."' 
				 AND schools.city ='".$this->city."' AND year = " . $this->year . " " . $condition ." ORDER BY status desc , id";
	//	echo "$query <br/>";
				 
		$dbqry = new dbquery($query,$this->connid);
		if ($dbqry->numrows()>0)
        {
           while($row = $dbqry->getrowarray()){	
        		
	          	$resultArr[] = array("id"=>$row["id"],
	          						 "schoolCode"=> $row["schoolCode"],
	          						 "schoolname"=> $row["schoolname"],
	          						 "status"=> $row["status"],
	          						 "visit_dt"=> $row["visit_dt"],
	          						 "updated_by"=>$row["updated_by"],
	          						 	);
           }
         }

		return $resultArr;

	}

	function approveSupportVisit($visit_id)
	{

		$query ="UPDATE da_supportVisit SET status =1, updated_by='".$_SESSION["username"]."', updated_dt=CURDATE() WHERE id='".$visit_id."' AND status =0 ";
	//	echo "$query";
		$dbqry = new dbquery($query,$this->connid);

	}

	function getZonesScheduler()
	{
        global $constant_da;

		$this->setpostvars();
		$this->setgetvars();

		$arrRet = array();
		$query = "SELECT DISTINCT region FROM {$constant_da(COMMON_DATABASE)}.region_master";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$arrRet[] = $row["region"];
		}
		return $arrRet;
	}


// DATS Mail to SSM , PIM,  SALES {keyaccount, buddyAccount}
function GetEmailsForDATS()
{
    global $constant_da;

	if($this->regionSchools == "") return;

	$mailArr = array();

	$query = "SELECT keyAccount,buddyAccount,ts,ps FROM {$constant_da(COMMON_DATABASE)}.sales_allotment_master WHERE product = 'DA' AND schoolCode = '".$this->regionSchools."'";
	$dbqry = new dbquery($query,$this->connid);
	while($result =$dbqry->getrowarray()){
		
		if($result["keyAccount"] != ""){
			$mailArr[] = $result["keyAccount"];
		}	
			
		if($result["ps"] != ""){			
			$mailArr[] = $result["ps"];
		}	
			
		if($result["ts"] != ""){			
			$mailArr[] = $result["ts"];
		}
		if($result["buddyAccount"] !="")
		{
			$mailArr[] = $result["buddyAccount"];
		}
	}

	if(is_array($mailArr) && count($mailArr) > 0){
		$getzsmforsm = "'".implode("','",$mailArr)."'";
		$personstr .= $getzsmforsm;
	}

	if($personstr != ""){
		
		$mail_query = "select emailComp from {$constant_da(COMMON_DATABASE)}.emp_master WHERE userID IN($personstr)";
		$mail_dbqry = mysql_query($mail_query);
		while($mail_result = mysql_fetch_array($mail_dbqry)){
			$toEmailsArr[] = $mail_result["emailComp"];
		}
	}
	return $toEmailsArr;
}

function generateEmailContentDATS($kitBooking_date, $typeTest,$noDays)
{
    global $constant_da;

	$schoolName ="";
	$format_date = date('d-m-Y', strtotime($kitBooking_date));

	$query ="SELECT schoolName FROM {$constant_da(COMMON_DATABASE)}.schools WHERE schoolno ='".$this->regionSchools."' ";
	$dbqry = new dbquery($query,$this->connid);
	while($result =$dbqry->getrowarray()){
		$schoolName = $result["schoolName"];
	}


	$htmlcontent = "<table style='text-align:center; width:80%;' cellspacing=\"1\" cellpadding=\"1\" border=\"1\" style=\"border-collapse:collapse;border-color:#000000;\">
					<tr><td>SchoolCode</td><td>SchoolName</td><td>Kit booking date</td>
					<td>Type Test</td>
					<td>No days</td>	
					</tr>
					<tr>
					<td>".$this->regionSchools."</td>
					<td>".$schoolName."</td>
					<td>".$format_date."</td>
					<td>".$typeTest."</td>
					<td>".$noDays."</td>
					</tr></table>";

	return $htmlcontent;					
}

    function sendScheulerMail($toMailArr, $content) {
    $body = $content;
	$headers = "";
//	$emailsubject = "DA - Test Scheduler ";
	$emailIdentifier ="da-test-scheduler";
	// Is the OS Windows or Mac or Linux
	if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
	  $eol="\r\n";
	} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
	  $eol="\r";
	} else {
	  $eol="\n";
	}
	

    
	$body=wordwrap($body,70,$eol);
	/*$headers = 'From: Detailed Assessment <da@ei-india.com>'.$eol;
	$headers .= "Bcc:sudhir.prajapati@ei-india.com".$eol;
	$headers .= "Reply-To: <da@ei-india.com>".$eol;
	$headers .= "MIME-Version: 1.0 $eol";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";	
	$toemails = "naveen.kumar@ei-india.com"; */
    //email configuration template
    $emailConfiguration = new clsdaemailconfiguration($dbconnect->connid);
    $configuration = $emailConfiguration->getConfigurationByIdentifier($emailIdentifier);  
    $bcc = $configuration['bcc_email_ids'];    
            $emailsubject .= $configuration['subject_line'];
            $headers .= 'From: Detailed Assessment <da@ei-india.com>'.$eol;
            $headers .= $configuration['cc_email_ids'].$eol;
            $headers .= 'Bcc: '.$bcc.$eol;
            $headers .= 'Cc: '.$configuration['cc_email_ids'].$eol;
            $headers .= "Reply-To: <da@ei-india.com>".$eol;
            $headers .= "MIME-Version: 1.0 $eol";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $toemails = $configuration['primary_email_ids'];
            
            
        if(is_array($toMailArr) && count($toMailArr) > 0){
            $toemails = implode(",",$toMailArr);
        }
        $toemails=$toemails;
	# SEND THE EMAIL
	if($toemails != "")
		mail($toemails, $emailsubject, $body, $headers);	
	}
	
	function getCities(){	
        global $constant_da;

		$returnarr = array();
		$query = "SELECT distinct schools.city FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster
				  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno
				  GROUP BY da_orderMaster.schoolCode";
		$dbqry = new dbquery($query,$this->connid);
		while($result= $dbqry->getrowarray()){
			$returnarr[] = $result["city"];
		}
		return $returnarr;
	}
	
	function getCitiesForScheduler()
	{
        global $constant_da;

		$this->setpostvars();
		$this->setgetvars();

		$arrRet = array();

		/* Distinct cities from kitMaster  
		$query = "SELECT DISTINCT region FROM da_kitMaster";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$arrRet[] = $row["region"];
		}*/
		
		$query = "SELECT distinct city FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster
				  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno
				  WHERE ( exam_mode = 'comprehensive' OR exam_mode = 'mobile')";
		$result = new dbquery($query,$this->connid);
		while($row = $result->getrowarray()){
			$arrRet[] = $row["city"];
		}
		return $arrRet;
	
	}
	
	function GetKitRegions(){
		
		$this->setpostvars();
		$this->setgetvars();

		$arrRet = array();

		$query = "SELECT distinct region,id FROM da_kitRegions";
		$result = new dbquery($query,$this->connid);
		while($row = $result->getrowarray()){
			$arrRet[$row["id"]] = $row["region"];
		}
		return $arrRet;
		
	}
	
	function getCitiesForSupportVisit()
	{
        global $constant_da;

		$this->setpostvars();
		
		$arrRet = array();

		$query = "SELECT DISTINCT schools.city FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno 
					AND da_orderMaster.year = '".$this->year."' ";

		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray())
		{
			if($row["city"] != "")
			$arrRet[] = $row["city"];
		}
		return $arrRet;
	}

	function UpdateKitForSchool($no_of_kits, $no_of_testdays, $no_of_pies, $order_id)
	{
        global $constant_da;

		if($no_of_kits == "" || $no_of_testdays == "" || $order_id == "" || $no_of_pies == "")
			return ;

		$query = "UPDATE {$constant_da(COMMON_DATABASE)}.da_orderMaster SET no_of_kits ='".$no_of_kits."',  no_of_testdays = '".$no_of_testdays."',
				  no_of_pies = '".$no_of_pies."', modified_by = '".$_SESSION["username"]."',last_modified = NOW() WHERE order_id = '".$order_id."'";
		
		$dbqry = new dbquery($query,$this->connid);
	
	}

	function getBookingAll()
	{           
        global $constant_da;

		$this->setpostvars();	
		if($this->monthYear =="") return;
		$arrRet = array();

		list($month,$year) = explode("-",$this->monthYear);

		$query = "SELECT da_orderMaster.no_of_kits, da_orderMaster.no_of_testdays, da_orderMaster.no_of_pies,da_kitBooking.schoolCode, da_kitBooking.cycle_number,
					 da_kitBooking.year, da_kitBooking.booked_by, da_kitBooking.booked_dt, da_kitBooking.year, da_kitBooking.cycle_number, da_orderMaster.exam_mode, schools.schoolname
					FROM da_kitBooking 
					INNER JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster ON da_kitBooking.schoolCode = da_orderMaster.schoolCode  AND  da_kitBooking.year = da_orderMaster.year
					INNER JOIN {$constant_da(COMMON_DATABASE)}.schools on da_kitBooking.schoolCode =schools.schoolno 					
					WHERE date_format(da_kitBooking.booking_date,'%m-%Y') ='".$this->monthYear."' 					
					AND  da_orderMaster.year = $year
					group by da_kitBooking.schoolCode, da_kitBooking.cycle_number ";
		//echo "$query <br/>";
		$dbqry = new dbquery($query,$this->connid);
		while($row =$dbqry->getrowarray())
		{
			$dates_query = "SELECT group_concat(distinct booking_date order by booking_date) booking_dates FROM da_kitBooking WHERE schoolCode = '".$row["schoolCode"]."' 
							AND cycle_number = '".$row["cycle_number"]."'  AND year = '".$row["year"]."'";
		 //	echo "<br/> $dates_query <br/>";				
			$dates_dbqry = new dbquery($dates_query,$this->connid);
			
			while($dates_row=$dates_dbqry->getrowarray())
			{
				$datesArr = $dates_row["booking_dates"];
			}

			$bookingDateArr = explode(",",$datesArr);

			$start_date = $bookingDateArr[0];
			$cnt_DateVal = count($bookingDateArr);
			if($cnt_DateVal > 1)
			{
				$end_date =$bookingDateArr[$cnt_DateVal-1];
			}
			else
			{
				$end_date =	$start_date;
			}

			$arrRet[]=array("schoolCode"=>$row["schoolCode"], "schoolname"=>$row["schoolname"], "cycle_number"=>$row["cycle_number"],"no_of_kits"=>$row["no_of_kits"],
							"no_of_testdays"=>$row["no_of_testdays"],"no_of_pies"=>$row["no_of_pies"], "booked_by"=>$row["booked_by"],
							"start_date"=>$start_date,"end_date"=>$end_date, "cycle_number"=>$row["cycle_number"], "exam_mode"=>$row["exam_mode"]
							,"booked_dt"=>$row["booked_dt"]);
		}

		// sort based on start dates 
		$start_datesArr = array();
		foreach ($arrRet as $key => $row)
		{
		    $start_datesArr[$key] = $row['start_date'];
		}
		array_multisort($start_datesArr, SORT_ASC, $arrRet);


		return $arrRet;
	}
}
?>