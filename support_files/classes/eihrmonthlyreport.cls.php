<?php
class clshrmonthlyreport
{
	function salary_bill($connid)
	{
		$data = array();
		// for previous month (ONE)
		$current_month=date('Y-m-01');
		$month=date('m');
		$year=date('Y');
		
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		if($month<10)
		{
			$month="0".$month;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$previous_month = $year."-".$month."-01";
		$last_date=$year."-".$month."-".$days;
		
		//$report_month=date('Y-m-d',strtotime(date($current_month)." -30 day"));
		//$report1_month=date('Y-m-d',strtotime(date($current_month)." -30 day"));
		
		$no_of_employees="SELECT count(emp_master.userID)as no_of_employees, 
							if(emp_master.bdate<>'',SUM(DATEDIFF('$last_date',emp_master.bdate))/365,0) as avg_age, 
							if(emp_master.joinDate<>'',SUM(DATEDIFF('$last_date',emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							emp_master where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$previous_month."' OR isnull(emp_master.leftDate)) 
							UNION SELECT count(old_emp_master.userID) as no_of_employees, 
							if(old_emp_master.bdate<>'',SUM(DATEDIFF('$last_date',old_emp_master.bdate))/365,0) avg_age, 
							if(old_emp_master.joinDate<>'',SUM(DATEDIFF('$last_date',old_emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							old_emp_master where old_emp_master.leftDate >= '".$previous_month."' ";
		/*echo	$no_of_employees = "SELECT count(emp_master.userID) as no_of_employees, 
							if(emp_master.bdate<>'',avg(DATEDIFF(CURDATE(),emp_master.bdate)),0) avg_age, 
							if(emp_master.joinDate<>'',avg(DATEDIFF(CURDATE(),emp_master.joinDate)),0) yrsOfExpBeforeEI
							FROM 
							emp_master LEFT JOIN old_emp_master  
							ON emp_master.userID=old_emp_master.userID
							WHERE (emp_master.joinDate < '".$current_month."' AND (emp_master.leftDate >= '".$report1_month."' OR isnull(emp_master.leftDate))) 
							OR
							(old_emp_master.joinDate < '".$current_month."' AND (old_emp_master.leftDate >= '".$report1_month."'))";*/
		
	   
	    $dbquery = new dbquery($no_of_employees,$connid);
		$data['no_of_employees']['one'] ="";
		$data['avg_age']['one'] = "";
		$data['yrsOfExpBeforeEI']['one']="";
		while($row = $dbquery->getrowarray()) 
		{
				$data['no_of_employees']['one']+= $row['no_of_employees'];
				$data['avg_age']['one'] += $row['avg_age'];
				$data['yrsOfExpBeforeEI']['one'] += $row['yrsOfExpBeforeEI'];
		}
		$data['no_of_employees']['one'];
		$data['avg_age']['one'] = $data['avg_age']['one']/$data['no_of_employees']['one'];
		$data['yrsOfExpBeforeEI']['one'] = $data['yrsOfExpBeforeEI']['one']/$data['no_of_employees']['one'];
		// for previous' previous month (TWO)
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		if($month<10)
		{
			$month="0".$month;
		}
		
		$month_back=$month-1;
		if($month_back<10)
		{
			$month_back="0".$month_back;
		}
		$pstart_date = $year."-".$month_back."-01";
		
		
		$days = cal_days_in_month(CAL_GREGORIAN,$month_back,$year);
		$start_date = $year."-".$month."-01";
		
		$plast_date=$year."-".$month_back."-".$days;
		$current_month = $start_date;	// set previous month with 1st date
		//$report_month = date('Y-m-d', strtotime(date($current_month)." -1 day"));	// set previous' previous month (reporting month)'s last date
		$no_of_employees="SELECT count(emp_master.userID)as no_of_employees, 
							if(emp_master.bdate<>'',SUM(DATEDIFF('$plast_date',emp_master.bdate))/365,0) as avg_age, 
							if(emp_master.joinDate<>'',SUM(DATEDIFF('$plast_date',emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							emp_master where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$pstart_date."' OR isnull(emp_master.leftDate)) 
							UNION SELECT count(old_emp_master.userID) as no_of_employees, 
							if(old_emp_master.bdate<>'',SUM(DATEDIFF('$plast_date',old_emp_master.bdate))/365,0) avg_age, 
							if(old_emp_master.joinDate<>'',SUM(DATEDIFF('$plast_date',old_emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							old_emp_master where old_emp_master.joinDate< '".$current_month."'  AND old_emp_master.leftDate >= '".$pstart_date."' ";
		/*$no_of_employees = "SELECT count(emp_master.userID) as no_of_employees, 
							if(emp_master.bdate<>'',avg(DATEDIFF(CURDATE(),emp_master.bdate)),0) avg_age, 
							if(emp_master.joinDate<>'',avg(DATEDIFF(CURDATE(),emp_master.joinDate)),0) yrsOfExpBeforeEI
							FROM 
							emp_master LEFT JOIN old_emp_master  
							ON emp_master.userID=old_emp_master.userID
							WHERE (emp_master.joinDate < '".$current_month."' AND (emp_master.leftDate > '".$report_month."' 								OR isnull(emp_master.leftDate))) 
							OR
							(old_emp_master.joinDate < '".$current_month."' AND (old_emp_master.leftDate > '".$report_month."'))";*/
		$dbquery = new dbquery($no_of_employees,$connid);
		$data['no_of_employees']['two'] ="";
		$data['avg_age']['two'] = "";
		$data['yrsOfExpBeforeEI']['two']="";
		while($row = $dbquery->getrowarray()) 
		{
				$data['no_of_employees']['two']+= $row['no_of_employees'];
				$data['avg_age']['two'] += $row['avg_age'];
				$data['yrsOfExpBeforeEI']['two'] += $row['yrsOfExpBeforeEI'];
		}
		$data['no_of_employees']['two'];
		$data['avg_age']['two'] = $data['avg_age']['two']/$data['no_of_employees']['two'];
		$data['yrsOfExpBeforeEI']['two'] = $data['yrsOfExpBeforeEI']['two']/$data['no_of_employees']['two'];

		// for previous' previous' previous month (THREE)
		$month=date('m');
		$year=date('Y');
		$month = $month-2;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		if($month<10)
		{
			$month="0".$month;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		
		$month_back2=$month-1;
		if($month_back2<10)
		{
			$month_back2="0".$month_back2;
		}
	   $days = cal_days_in_month(CAL_GREGORIAN,$month_back2,$year);
	   $ppstart_date=$year."-".$month_back2."-01";
	   $last_date=$year."-".$month_back2."-".$days;

		$current_month = $start_date;	// set previous' previous month with 1st date
	//	$report_month = date('Y-m-d', strtotime(date($current_month)." -1 day"));	// set previous' previous' previous month (reporting month)'s last date
		$no_of_employees="SELECT count(emp_master.userID)as no_of_employees, 
							if(emp_master.bdate<>'',SUM(DATEDIFF('$last_date',emp_master.bdate))/365,0) as avg_age, 
							if(emp_master.joinDate<>'',SUM(DATEDIFF('$last_date',emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							emp_master where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$ppstart_date."' OR isnull(emp_master.leftDate)) 
							UNION SELECT count(old_emp_master.userID) as no_of_employees, 
							if(old_emp_master.bdate<>'',SUM(DATEDIFF('$last_date',old_emp_master.bdate))/365,0) avg_age, 
							if(old_emp_master.joinDate<>'',SUM(DATEDIFF('$last_date',old_emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							old_emp_master where old_emp_master.joinDate< '".$current_month."'  AND old_emp_master.leftDate >= '".$ppstart_date."' ";
		/*$no_of_employees = "SELECT count(emp_master.userID) as no_of_employees, 
							if(emp_master.bdate<>'',avg(DATEDIFF(CURDATE(),emp_master.bdate)),0) avg_age, 
							if(emp_master.joinDate<>'',avg(DATEDIFF(CURDATE(),emp_master.joinDate)),0) yrsOfExpBeforeEI
							FROM 
							emp_master LEFT JOIN old_emp_master  
							ON emp_master.userID=old_emp_master.userID
							WHERE (emp_master.joinDate < '".$current_month."' AND (emp_master.leftDate > '".$report_month."' OR isnull(emp_master.leftDate))) 
							OR
							(old_emp_master.joinDate < '".$current_month."' AND (old_emp_master.leftDate > '".$report_month."'))";*/
		$dbquery = new dbquery($no_of_employees,$connid);
		$data['no_of_employees']['three'] ="";
		$data['avg_age']['three'] = "";
		$data['yrsOfExpBeforeEI']['three']="";
		while($row = $dbquery->getrowarray()) 
		{
				$data['no_of_employees']['three']+= $row['no_of_employees'];
				$data['avg_age']['three'] += $row['avg_age'];
				$data['yrsOfExpBeforeEI']['three'] += $row['yrsOfExpBeforeEI'];
		}
		$data['no_of_employees']['three'];
		$data['avg_age']['three'] = $data['avg_age']['three']/$data['no_of_employees']['three'];
		$data['yrsOfExpBeforeEI']['three'] = $data['yrsOfExpBeforeEI']['three']/$data['no_of_employees']['three'];
			
		// to get last 3 years dates		
		$month=date('m');
		$year=date('Y');
		/*$month = $month-1;
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}*/
		$year1 = $year-1;
		$year2 = $year-2;
		$year3 = $year-3;
		$one_year_back = date('Y-m-d', strtotime(date($year1.'-'.$month.'-01')));
		$two_year_back = date('Y-m-d', strtotime(date($year2.'-'.$month.'-01')));
		$three_year_back = date('Y-m-d', strtotime(date($year3.'-'.$month.'-01')));
		
		
		//FOR salary bill
		
		 
    	 $month=date('m');
	 	 $year = date('Y');
		 
		 $month = $month-1;
		 
		// include('../payroll/commonfunctions.php');
		 
		 if($month == 0){
			$month=12;
			$year = $year-1;
		 }
		

		// for previous year (FOUR)
		$current_month = $one_year_back;	// set current month with 1st date
		$report_month = date('Y-m-d', strtotime(date($current_month)." -1 month"));	// set previous month (reporting month)'s last date
		$no_of_employees="SELECT count(emp_master.userID)as no_of_employees, 
							if(emp_master.bdate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 1 YEAR),emp_master.bdate))/365,0) as avg_age, 
							if(emp_master.joinDate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 1 YEAR),emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							emp_master where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$report_month."' OR isnull(emp_master.leftDate)) 
							UNION SELECT count(old_emp_master.userID) as no_of_employees, 
							if(old_emp_master.bdate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 1 YEAR),old_emp_master.bdate))/365,0) avg_age, 
							if(old_emp_master.joinDate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 1 YEAR),old_emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							old_emp_master where old_emp_master.joinDate< '".$current_month."' AND old_emp_master.leftDate >= '".$report_month."' ";
		$dbquery = new dbquery($no_of_employees,$connid);
		$data['no_of_employees']['four'] ="";
		$data['avg_age']['four'] = "";
		$data['yrsOfExpBeforeEI']['four']="";
		while($row = $dbquery->getrowarray()) 
		{
				$data['no_of_employees']['four']+= $row['no_of_employees'];
				$data['avg_age']['four'] += $row['avg_age'];
				$data['yrsOfExpBeforeEI']['four'] += $row['yrsOfExpBeforeEI'];
		}
		$data['no_of_employees']['four'];
		$data['avg_age']['four'] = $data['avg_age']['four']/$data['no_of_employees']['four'];
		$data['yrsOfExpBeforeEI']['four'] = $data['yrsOfExpBeforeEI']['four']/$data['no_of_employees']['four'];

		// for previous' previous year (FIVE)
		$current_month = $two_year_back;	// set current month with 1st date
		$report_month = date('Y-m-d', strtotime(date($current_month)." -1 month"));	// set previous month (reporting month)'s last date
		$no_of_employees="SELECT count(emp_master.userID)as no_of_employees, 
							if(emp_master.bdate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 2 YEAR),emp_master.bdate))/365,0) as avg_age, 
							if(emp_master.joinDate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 2 YEAR),emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							emp_master where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$report_month."' OR isnull(emp_master.leftDate)) 
							UNION SELECT count(old_emp_master.userID) as no_of_employees, 
							if(old_emp_master.bdate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 2 YEAR),old_emp_master.bdate))/365,0) avg_age, 
							if(old_emp_master.joinDate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 2 YEAR),old_emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							old_emp_master where old_emp_master.joinDate< '".$current_month."' AND old_emp_master.leftDate >= '".$report_month."' ";
		$dbquery = new dbquery($no_of_employees,$connid);
		$data['no_of_employees']['five'] ="";
		$data['avg_age']['five'] = "";
		$data['yrsOfExpBeforeEI']['five']="";
		while($row = $dbquery->getrowarray()) 
		{
				$data['no_of_employees']['five']+= $row['no_of_employees'];
				$data['avg_age']['five'] += $row['avg_age'];
				$data['yrsOfExpBeforeEI']['five'] += $row['yrsOfExpBeforeEI'];
		}
		$data['no_of_employees']['five'];
		$data['avg_age']['five'] = $data['avg_age']['five']/$data['no_of_employees']['five'];
		$data['yrsOfExpBeforeEI']['five'] = $data['yrsOfExpBeforeEI']['five']/$data['no_of_employees']['five'];

		// for previous' previous' previous year (SIX)
		$current_month = $three_year_back;	// set current month with 1st date
		$report_month = date('Y-m-d', strtotime(date($current_month)." -1 month"));	// set previous month (reporting month)'s last date
		$no_of_employees="SELECT count(emp_master.userID)as no_of_employees, 
							if(emp_master.bdate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 3 YEAR),emp_master.bdate))/365,0) as avg_age, 
							if(emp_master.joinDate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 3 YEAR),emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							emp_master where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$report_month."' OR isnull(emp_master.leftDate)) 
							UNION SELECT count(old_emp_master.userID) as no_of_employees, 
							if(old_emp_master.bdate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 3 YEAR),old_emp_master.bdate))/365,0) avg_age, 
							if(old_emp_master.joinDate<>'',SUM(DATEDIFF((CURDATE() - INTERVAL 3 YEAR),old_emp_master.joinDate))/365,0) yrsOfExpBeforeEI
							FROM 
							old_emp_master where old_emp_master.joinDate< '".$current_month."' AND old_emp_master.leftDate >= '".$report_month."' ";
		$dbquery = new dbquery($no_of_employees,$connid);
		$data['no_of_employees']['six'] ="";
		$data['avg_age']['six'] = "";
		$data['yrsOfExpBeforeEI']['six']="";
		while($row = $dbquery->getrowarray()) 
		{
				$data['no_of_employees']['six']+= $row['no_of_employees'];
				$data['avg_age']['six'] += $row['avg_age'];
				$data['yrsOfExpBeforeEI']['six'] += $row['yrsOfExpBeforeEI'];
		}
		$data['no_of_employees']['six'];
		$data['avg_age']['six'] = $data['avg_age']['six']/$data['no_of_employees']['six'];
		$data['yrsOfExpBeforeEI']['six'] = $data['yrsOfExpBeforeEI']['six']/$data['no_of_employees']['six'];

		return $data;
	}
	function employees_joining_and_leaving_details($connid)
	{
		$data = array();
		
		$data['sbu'] = $this->get_all_sbu($connid);	// to get all SBUs
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)  
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;
		
		
		// to find no.of people joined in previos month
	//echo	  $no_of_people_joined="SELECT count(emp_master.userID) as no_of_people_joined from emp_master where joinDate>='".$start_date."' AND joinDate<='".$end_date."'"; 
		
		$no_of_people_joined = "SELECT sbu_master.sbu_name as sbu_name, count(emp_master.userID) as no_of_people_joined from emp_master left join sbu_master on emp_master.empl_sbu_id=sbu_master.srno WHERE (emp_master.joinDate >= '".$start_date."' AND emp_master.joinDate <= '".$end_date."') GROUP BY empl_sbu_id
		                   UNION ALL SELECT sbu_master.sbu_name as sbu_name, count(*) as no_of_people_joined from temp_emp_master a left join sbu_master on a.empl_sbu_id=sbu_master.srno WHERE (a.joinDate >= '".$start_date."' AND a.joinDate <= '".$end_date."')AND concat(firstname,'.',lastname) NOT IN (select  concat(firstName,'.',lastname) from emp_master)  GROUP BY empl_sbu_id"	;
		$dbquery = new dbquery($no_of_people_joined,$connid);
		$count=$dbquery->numrows();
		while($row = $dbquery->getrowarray()) 
			$data['no_of_people_joined'][$row['sbu_name']] += $row['no_of_people_joined'];
	
		// to find no.of people left in previos month
		$no_of_people_left = "SELECT sbu_master.sbu_name as sbu_name, count(emp_master.userID) as no_of_people_left from emp_master left join sbu_master on emp_master.empl_sbu_id=sbu_master.srno WHERE (emp_master.leftDate >= '".$start_date."' AND emp_master.leftDate <= '".$end_date."') GROUP BY empl_sbu_id
		                      UNION ALL SELECT sbu_master.sbu_name as sbu_name, count(old_emp_master.userID) as no_of_people_left from old_emp_master left join sbu_master on old_emp_master.empl_sbu_id=sbu_master.srno WHERE (old_emp_master.leftDate >= '".$start_date."' AND old_emp_master.leftDate <= '".$end_date."') GROUP BY empl_sbu_id";
		$dbquery = new dbquery($no_of_people_left,$connid);
		$data['no_of_people_left'][$row['sbu_name']]="";
		while($row = $dbquery->getrowarray())
             $data['no_of_people_left'][$row['sbu_name']]+= $row['no_of_people_left'];
			  	
		$start_date = date('Y-m-01', strtotime(date('Y-m-d')));					// set current month with 1st date
		$month = date('m',strtotime(date($start_date)));						// get current month only
		$year = date('Y',strtotime(date($start_date)));							// get current year only
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);					// to get last date of current month only
		$end_date = date('Y-m-d', strtotime(date($year.'-'.$month.'-'.$days)));	// set current month's end date
		
		// to find no.of people going to join next month (eg. if report is for feb, this code will count 'people going to join in march')
		$no_of_people_joining_next_month = "SELECT sbu_master.sbu_name as sbu_name, count(emp_master.userID) as no_of_people_joined from emp_master left join sbu_master on emp_master.empl_sbu_id=sbu_master.srno WHERE (emp_master.joinDate >= '".$start_date."' AND emp_master.joinDate <= '".$end_date."') GROUP BY empl_sbu_id
		                   UNION ALL SELECT sbu_master.sbu_name as sbu_name, count(*) as no_of_people_joined from temp_emp_master a left join sbu_master on a.empl_sbu_id=sbu_master.srno WHERE (a.joinDate >= '".$start_date."' AND a.joinDate <= '".$end_date."')AND concat(firstname,'.',lastname) NOT IN (select  concat(firstName,'.',lastname) from emp_master)  GROUP BY empl_sbu_id"	;
		$dbquery = new dbquery($no_of_people_joining_next_month,$connid);
		while($row = $dbquery->getrowarray()) 
			$data['no_of_people_joining_next_month'][$row['sbu_name']] += $row['no_of_people_joined'];

		// to find no. of people going to join after 1 month (eg. if report is for feb, this code will count 'people going to join after march')
		//$no_of_people_joining_after_next_month = "SELECT sbu_master.sbu_name as sbu_name, count(emp_master.userID) as no_of_people_joining_after_next_month from emp_master left join sbu_master on emp_master.empl_sbu_id=sbu_master.srno WHERE emp_master.joinDate > '".$end_date."' GROUP BY empl_sbu_id";
		$no_of_people_joining_after_next_month = "SELECT sbu_master.sbu_name as sbu_name, count(emp_master.userID) as no_of_people_joined from emp_master left join sbu_master on emp_master.empl_sbu_id=sbu_master.srno WHERE (emp_master.joinDate > '".$end_date."') GROUP BY empl_sbu_id
		                   UNION ALL SELECT sbu_master.sbu_name as sbu_name, count(*) as no_of_people_joined from temp_emp_master a left join sbu_master on a.empl_sbu_id=sbu_master.srno WHERE ( a.joinDate > '".$end_date."')AND concat(firstname,'.',lastname) NOT IN (select  concat(firstName,'.',lastname) from emp_master)  GROUP BY empl_sbu_id"	;
		$dbquery = new dbquery($no_of_people_joining_after_next_month,$connid);
		while($row = $dbquery->getrowarray())
			$data['no_of_people_joining_after_next_month'][$row['sbu_name']] += $row['no_of_people_joined'];
		
		  
		// to count total employees
		$current_month=date('Y-m-1');
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$previous_month = $year."-".$month."-01";
		//$report_month=date('Y-m-d',strtotime(date($current_month)." -30 day"));
		//$report1_month=date('Y-m-d',strtotime(date($current_month)." -30 day"));
		
		 $total_employees="SELECT count(emp_master.userID)as total_employees
							FROM 
							emp_master where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$previous_month."' OR isnull(emp_master.leftDate)) 
							UNION SELECT count(old_emp_master.userID) as total_employees
							FROM 
							old_emp_master where old_emp_master.leftDate >= '".$previous_month."' ";
		
		//$total_employees = "SELECT count(emp_master.userID) as total_employees FROM emp_master";
		
		$dbquery = new dbquery($total_employees,$connid);
		$data['total_employees'] = "";
		while($row = $dbquery->getrowarray())
			$data['total_employees'] += $row['total_employees'];
		return $data;
	}
	function people_joined_on_contract($connid)
	{
		$data = array();

		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;

		// to find no of people joined in previous month on contract bases(i.e. reporting month)
		$people_joined_on_contract = "SELECT userID, firstName, lastName, DATE_FORMAT(joinDate,'%d/%m/%Y') as joinDate, DATEDIFF(contract_endDate,joinDate)/30 as contractperiod, sbu_name FROM contract_master left join sbu_master on contract_master.empl_sbu_id=sbu_master.srno WHERE joinDate>='".$start_date."' AND joinDate<='".$end_date."' group by joinDate";
		
		$dbquery = new dbquery($people_joined_on_contract,$connid);
		while($row = $dbquery->getrowarray())
			$data[]=$row;
		
		return $data;
	}
	function guest_login_created($connid)
	{
		$data = array();
	

		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;

		$guest_login_created = "SELECT guest_login.fullname, guest_login.name, DATE_FORMAT(guest_login.createdon,'%d/%m/%Y') as createdon, 
								max(DATE_FORMAT(ei_login_details.loginTime,'%d/%m/%Y')) as loginTime, guest_login.company 
								FROM guest_login LEFT JOIN ei_login_details ON guest_login.name = ei_login_details.userID
								WHERE disabled = 0 AND 
								createdon >='".$start_date."' AND createdon<= '".$end_date."' group by ei_login_details.userID";
		
		$dbquery = new dbquery($guest_login_created,$connid);
		while($row = $dbquery->getrowarray())
			$data[]=$row;
		
		return $data;
       
	}
	function getSBUNames($connid)		// to get fullname of employee
	{
		$arrRet = array();
		$query = "SELECT sbu_name,srno FROM sbu_master";
					
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			$arrRet[$row["srno"]] = $row["sbu_name"];

		return $arrRet;
		
	}
	function organizational_changes($connid)
	{
		$data = array();
		
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;

		$data['result_location'] = $this->getSearchResults('location',$start_date,$end_date,$connid);			// employees whose location has changes
		$data['result_desig'] = $this->getSearchResults('desig',$start_date,$end_date,$connid);					// employees whose designation has changes
		$data['result_reporting'] = $this->getSearchResults('adminReportingTo',$start_date,$end_date,$connid);	// employees whose 'admin reporting to' has changes
		$data['result_sbu'] = $this->getSearchResults('empl_sbu_id',$start_date,$end_date,$connid);				// employees whose sbu has changes
		
		return $data;
	}
	function getSearchResults($column_name,$start_date,$end_date,$connid)
	{
		$data = array();
		$condition = " AND updated_date >= '".$start_date."' AND updated_date <= '".$end_date."' AND disp_flag='1' group by updated_date ";		// start-date and end-date condition
		
		// query for tables (emp_contract_change_log, emp_master, sbu_master)
		$query = "SELECT emp_contract_change_log.*, CONCAT(firstName,' ',lastName) as fullname, sbu_name, DATE_FORMAT(updated_date,'%d/%m/%Y') as updatedDate 
					FROM 
					emp_contract_change_log, emp_master, sbu_master
					WHERE 
					emp_contract_change_log.userID = emp_master.userID AND 
					emp_master.empl_sbu_id = sbu_master.srno AND 
					column_name = '".$column_name."' ".$condition; 
		
		// query for tables (emp_contract_change_log, old_emp_master, sbu_master)
		$query.=" UNION 
					SELECT emp_contract_change_log.*,CONCAT(firstName,' ',lastName) as fullname,sbu_name,DATE_FORMAT(updated_date,'%d/%m/%Y') as updatedDate 
					FROM 
					emp_contract_change_log, old_emp_master, sbu_master 
					WHERE 
					emp_contract_change_log.userID = old_emp_master.userID AND 
					old_emp_master.empl_sbu_id = sbu_master.srno AND 
					old_emp_master.userID NOT IN (SELECT userID FROM emp_master) AND 
					column_name = '".$column_name."' ".$condition;
		
		// query for tables (emp_contract_change_log, contract_master, sbu_master)
		$query.=" UNION 
					SELECT emp_contract_change_log.*,CONCAT(firstName,' ',lastName) as fullname,sbu_name,DATE_FORMAT(updated_date,'%d/%m/%Y') as updatedDate 
					FROM 
					emp_contract_change_log, contract_master, sbu_master
					WHERE 
					emp_contract_change_log.userID = contract_master.userID AND 
					contract_master.empl_sbu_id = sbu_master.srno AND 
					column_name = '".$column_name."' ".$condition;
		
		// query for tables (emp_contract_change_log, old_contract_master, sbu_master)
		$query.=" UNION 
					SELECT emp_contract_change_log.*,CONCAT(firstName,' ',lastName) as fullname,sbu_name,DATE_FORMAT(updated_date,'%d/%m/%Y') as updatedDate 
					FROM 
					emp_contract_change_log, old_contract_master, sbu_master
					WHERE 
					emp_contract_change_log.userID = old_contract_master.userID AND 
					old_contract_master.empl_sbu_id = sbu_master.srno AND 
					old_contract_master.userID NOT IN (SELECT userID FROM contract_master) AND 
					column_name = '".$column_name."' ".$condition;
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			$data[]=$row;
		
		return $data;
	}
	function getFullNames($connid)		// to get fullname of employee
	{
		$arrRet = array();
		$query = "SELECT userID,CONCAT(firstName,' ',lastName) as fullname 
					FROM emp_master 
					UNION 
					SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM old_emp_master 
					UNION 
					SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM contract_master 
					UNION 
					SELECT userID,CONCAT(firstName,' ',lastName) as fullname FROM old_contract_master";
					
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			$arrRet[$row["userID"]] = $row["fullname"];

		return $arrRet;
	}
	function late_coming_work_from_home_penalty($connid)
	{
		$data = array();

		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;
		
		
		$data['sbu'] = $this->get_all_sbu($connid);
		$data['dept_wise_employees'] = $this->count_employees_department_wise($connid);
		$data['working_days'] = $this->count_no_of_working_days($connid,$start_date,$end_date,$days);
		$data['work_from_home_days'] = $this->count_no_days_work_from_home($connid);
		$data['late_people'] = $this->count_late_minutes($connid);
		
		return $data;
	}
	function get_all_sbu($connid)	// to get sbu names
	{
		$sbu = array();
		
		$sbu_query = "SELECT sbu_name,srno FROM sbu_master order by sbu_name";
		
		$dbquery = new dbquery($sbu_query,$connid);
		while($row = $dbquery->getrowarray())
			$sbu[] = $row;
			
		return $sbu;
	}
	function get_sbu($connid)	// to get sbu names
	{
		$sbu = array();
		
		$sbu_query = "SELECT sbu_name,srno FROM sbu_master  WHERE srno !='1' AND srno !='16' AND srno !='19'  order by sbu_name";
		
		$dbquery = new dbquery($sbu_query,$connid);
		while($row = $dbquery->getrowarray())
			$sbu[] = $row;
			
		return $sbu;
	}
	function count_employees_department_wise($connid)// to count total employees sbu wise
	{
		$data = array();
		$current_month=date('Y-m-1');
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$previous_month = $year."-".$month."-01";
		//$total_employees_query = "SELECT sbu_master.sbu_name as sbu_name, count(emp_master.userID) as total_employees FROM emp_master left join sbu_master on emp_master.empl_sbu_id=sbu_master.srno GROUP BY empl_sbu_id";
		$total_employees_query = "SELECT sbu_master.sbu_name as sbu_name, count(emp_master.userID) as total_employees FROM emp_master left join sbu_master on emp_master.empl_sbu_id=sbu_master.srno where emp_master.joinDate< '".$current_month."' AND (emp_master.leftDate >= '".$previous_month."' OR isnull(emp_master.leftDate)) GROUP BY emp_master.empl_sbu_id 
		 UNION ALL SELECT sbu_master.sbu_name as sbu_name, count(old_emp_master.userID) as total_employees FROM old_emp_master left join sbu_master on old_emp_master.empl_sbu_id=sbu_master.srno where old_emp_master.joinDate< '".$current_month."' AND (old_emp_master.leftDate >= '".$previous_month."')  GROUP BY old_emp_master.empl_sbu_id  ";
		
		$dbquery = new dbquery($total_employees_query,$connid);
		@$data[$row['sbu_name']]="";
		while($row = $dbquery->getrowarray())
		
			@$data[$row['sbu_name']] += @$row['total_employees'];	
			
		return $data;
	}
	function count_no_of_working_days($connid,$start_date,$end_date,$days)// to count 'no of working days' sbu wise
	{
		$sundays = 0;

		// count sundays in reporting month
		$start = new DateTime($start_date);
		$end   = new DateTime($end_date);
		$interval = DateInterval::createFromDateString('1 day');
		$period = new DatePeriod($start, $interval, $end);
		foreach ($period as $dt)
		{
			if($dt->format('N') == 7)
				$sundays++;
		}
		
		// count national-holidays and saturdays for reporting month (stored in table 'holidays_master')
		$national_holidays_and_saturdays = 0;
		$national_holidays_and_saturdays = "SELECT count(*) as total_holidays FROM holiday_master WHERE holidayDate >= '".$start_date."' AND holidayDate <= '".$end_date."' ";
		$dbquery = new dbquery($national_holidays_and_saturdays,$connid);
		while($row = $dbquery->getrowarray())
			$national_holidays_and_saturdays = $row['total_holidays'];	
	        $holiday=$sundays+$national_holidays_and_saturdays;
			$total_working_days = $days-$holiday;
	return $total_working_days;
	}
	function count_no_days_work_from_home($connid)// to count 'granted leave days' sbu wise
	{
		$data = array();
		$query ="SELECT count(leave_application.leave_type) as total_wfh_days,sum(grant_days) as total_days, sbu_master.sbu_name as sbu_name,group_concat(distinct leave_application.userID)
				  	FROM 
				  	leave_application 
				 	left JOIN emp_master ON leave_application.userID = emp_master.userID 
				 	left  JOIN sbu_master ON emp_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved' 
				  	AND (leave_application.userID NOT IN (select userID from contract_master)  AND leave_application.userID NOT IN (select userID from old_emp_master)) AND MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH))
				  	GROUP BY sbu_master.sbu_name
                    UNION ALL
					SELECT count(leave_application.leave_type) as total_wfh_days,sum(grant_days) as total_days, sbu_master.sbu_name as sbu_name,group_concat(distinct leave_application.userID)
				  	FROM 
				  	leave_application 
				 	left JOIN contract_master ON leave_application.userID = contract_master.userID 
				 	left  JOIN sbu_master ON contract_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved'
				  	AND MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH))
				  	GROUP BY sbu_master.sbu_name
					UNION ALL
					SELECT count(leave_application.leave_type) as total_wfh_days,sum(grant_days) as total_days, sbu_master.sbu_name as sbu_name,group_concat(distinct leave_application.userID)
				  	FROM 
				  	leave_application 
				 	left JOIN old_emp_master ON leave_application.userID = old_emp_master.userID 
				 	left  JOIN sbu_master ON old_emp_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved'
				  	AND  MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH))
				  	GROUP BY sbu_master.sbu_name
				  	order BY  total_wfh_days";
				/*	$query ="SELECT count(leave_application.leave_type) as total_wfh_days,sum(grant_days) as total_days, sbu_master.sbu_name as sbu_name,group_concat(distinct leave_application.userID)
				  	FROM 
				  	leave_application 
				 	INNER JOIN emp_master ON leave_application.userID = emp_master.userID 
				 	INNER  JOIN sbu_master ON emp_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved' 
				  	AND MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH))
				  	GROUP BY sbu_master.sbu_name
                    UNION ALL
					SELECT count(leave_application.leave_type) as total_wfh_days,sum(grant_days) as total_days, sbu_master.sbu_name as sbu_name,group_concat(distinct leave_application.userID)
				  	FROM 
				  	leave_application 
				 	INNER JOIN contract_master ON leave_application.userID = contract_master.userID 
				 	INNER  JOIN sbu_master ON contract_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved'
				  	AND   MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH))
				  	GROUP BY sbu_master.sbu_name
					UNION ALL
					SELECT count(leave_application.leave_type) as total_wfh_days,sum(grant_days) as total_days, sbu_master.sbu_name as sbu_name,group_concat(distinct leave_application.userID)
				  	FROM 
				  	leave_application 
				 	INNER JOIN old_emp_master ON leave_application.userID = old_emp_master.userID 
				 	INNER  JOIN sbu_master ON old_emp_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved'
				  	AND  MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH))
				  	GROUP BY sbu_master.sbu_name
				  	order BY  total_wfh_days";
		*/
				
		/*$query ="SELECT count(leave_application.leave_type) as total_wfh_days, sbu_master.sbu_name as sbu_name,group_concat(distinct leave_application.userID)
				  	FROM 
				  	leave_application 
				 	LEFT  JOIN emp_master ON leave_application.userID = emp_master.userID 
				 	LEFT  JOIN sbu_master ON emp_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved'
				  	AND  MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH))
				  	GROUP BY sbu_master.sbu_name
				  	order BY  total_wfh_days";*/
					
		
		$dbquery = new dbquery($query,$connid);
		
		while($row = $dbquery->getrowarray()){
			$data[$row['sbu_name']] += $row['total_days'];
		
		}
		
		return $data;
	}
	function count_late_minutes($connid)// to count late minutes
	{
		$data = array();
		
		$query= "SELECT count(distinct lateLoginDeduction.userID) as total_late_employees,sbu_master.sbu_name as sbu_name 
					FROM 
					lateLoginDeduction 
					LEFT JOIN emp_master ON lateLoginDeduction.userID = emp_master.userID 
					LEFT JOIN sbu_master ON emp_master.empl_sbu_id = sbu_master.srno
					WHERE 
					status=0 AND 
					totalTime>=400 AND 
					month=MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND year=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH)) GROUP BY lateLoginDeduction.userID";

		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			$data[$row['sbu_name']] += $row['total_late_employees'];
		
		return $data;
	}
	function employee_speakup($connid)// to find total speakups as well as previous month's speakups
	{
		$data = array();
		
		$month=date('m');
		$year=date('Y');
	//	$date=$year."-".$month."-31";
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
	    if($month<10)
		{
			$month= "0".$month;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;
		
		// to count total speakups
	 	$query = "SELECT count(*) as total_speakups FROM employee_speakup WHERE responded ='Y'";
		$dbquery = new dbquery($query,$connid);
		$data['total_speakups'] = $dbquery->getrowarray();
		
		// to get counter of previous month's total speakups; responded or not wise
		//echo $query = "SELECT count(*) as month_speakups FROM employee_speakup where MONTH(date) = MONTH(DATE_SUB($date,INTERVAL 1 MONTH)) GROUP BY responded";
 		$query="SELECT count(*) as month_speakups FROM employee_speakup where DATE_FORMAT(date,'%Y-%m-%d') between '".$start_date."' AND '".$end_date."' GROUP BY responded";
		$dbquery = new dbquery($query,$connid);
		while($get_data = $dbquery->getrowarray())
		{
			$data['month_speakups'][] = $get_data;
		}
		return $data;
	}
	function laptop_netbook_details($connid)	// to get (company's total laptops and netbooks along with its insured-counter and not-insured-counter) & (presonal laptops uses)
	{
		$data = array();
		$LaptopNetbookData = array();
		
		$current_month = date('Y-m-1');								// set current month with 1st date
		$end_date = date('Y-m-d', strtotime(date($current_month)." -1 day"));	// set previous month (reporting month)'s last date
		
		// to get company's total laptops and netbooks along with its insured-counter and not-insured-counter.
		$query = "SELECT typeid, count(assetid) as total, SUM(if(insured_till_date>='".$end_date."',1,0)) as insured 
				  FROM fams_asset_master 
				  WHERE soldto is null 
				  AND typeid in (11,55)
				  GROUP BY typeid";
		$dbquery = new dbquery($query,$connid);
		while($get_data = $dbquery->getrowarray()){
			if ($get_data["typeid"] == 11) {
				$LaptopNetbookData["COMPANY"]["LAPTOP"]["TOTAL"] = $get_data["total"];
				$LaptopNetbookData["COMPANY"]["LAPTOP"]["INSURED"] = $get_data["insured"];
			}else if ($get_data["typeid"] == 55) {
				$LaptopNetbookData["COMPANY"]["NETBOOK"]["TOTAL"] = $get_data["total"];
				$LaptopNetbookData["COMPANY"]["NETBOOK"]["INSURED"] = $get_data["insured"];
			}
		}	
      
		$Allowance = array();
		
		// to get total personal laptops uses
		$query = "SELECT name,persons FROM payroll_list WHERE (name = 'Laptopallowance' OR name = 'Netbookallowance')";
		$dbqry = new dbquery($query,$connid);
		while ($result = $dbqry->getrowarray()) {
			$Allowance[$result["name"]] = $result["persons"];
		}
		
		if (is_array($Allowance) && count($Allowance) > 0) {
			foreach ($Allowance as $key => $value){
				if ($key == "Laptopallowance") {
					$LaptopNetbookData["PERSONAL"]["LAPTOP"]["TOTAL"] = count(explode(",",$value));
					$LaptopNetbookData["PERSONAL"]["LAPTOP"]["INSURED"] = "N/A";
				} else if ($key == "Netbookallowance") {
					$LaptopNetbookData["PERSONAL"]["NETBOOK"]["TOTAL"] = count(explode(",",$value));
					$LaptopNetbookData["PERSONAL"]["NETBOOK"]["INSURED"] = "N/A";
				}
			}
		}
		
		return $LaptopNetbookData;
	}
	function reward_recognization_details($connid)	// to fetch rewards and recognizaations
	{
		$data = array();
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;
	    $query = "SELECT employee, award_title, award_desc from hr_awardRecognization where award_dt>='".$start_date."' AND award_dt<='".$end_date."' "; 
		//$query = "SELECT employee, award_title, award_desc from hr_awardRecognization where MONTH(award_dt) = MONTH(DATE_SUB(curdate(),INTERVAL 3 MONTH)) ";
		$dbquery = new dbquery($query,$connid);
		while($get_data = $dbquery->getrowarray())
			$data['reward_recognization_details'][] = $get_data;
		return $data;
		
	}
	function training_details($connid)	// to fetch rewards and recognizaations
	{
		$data = array();
		$query = "SELECT training_title,DATE_FORMAT(training_date,'%d/%m/%Y') as training_date, date_format(training_reg_lastdate,'%d-%m-%Y') as training_reg_lastdate, training_location, training_facilitator 
					   from hr_training where MONTH(training_date) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH))";
		$dbquery = new dbquery($query,$connid);
		while($get_data = $dbquery->getrowarray())
			$data['training_details'][] = $get_data;
		
		return $data;
		
	}
	function training_planned_for_next_month($connid)	// to count number of trainings planned for next month of reporting month
	{
		$data = array();

		$start_date = date('Y-m-01', strtotime(date('Y-m-d')));					// set current month with 1st date
		$month = date('m',strtotime(date($start_date)));						// get current month only
		$year = date('Y',strtotime(date($start_date)));							// get current year only
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);					// to get last date of current month only
		$end_date = date('Y-m-d', strtotime(date($year.'-'.$month.'-'.$days)));	// set current month's end date

		$query = "SELECT count(*) as total_planned_trainings from hr_training where training_date >= '".$start_date."' and training_date <= '".$end_date."' ";
		$dbquery = new dbquery($query,$connid);
		while($get_data = $dbquery->getrowarray())
			$data['total_planned_trainings'] = $get_data;
		
		$query = "SELECT training_title, DATE_FORMAT(training_date,'%d/%m/%Y') as training_date, date_format(training_reg_lastdate,'%d-%m-%Y') as training_reg_lastdate, training_location, training_facilitator 
					   from hr_training where MONTH(training_date) = MONTH(curdate())";
		$dbquery = new dbquery($query,$connid);
		while($get_data = $dbquery->getrowarray())
			$data['training_details'][] = $get_data;	
			
		return $data;
	}
	/* following 2 functions are for award_recognization.php file */
	function award_recognization($connid,$from_date="",$to_date="")	// award and recognization function to call other function
	{ 
		$data = array();
		$data['sub'] = $this->get_all_sbu($connid); 
		$data['award_details'] = $this->award_data_display($connid,$from_date,$to_date);
		return $data;
		
	}
	function award_data_display($connid,$from_date='',$to_date='')	// to fetch award details
	{
		$details = array();
		
		if($from_date!='' && $to_date!='')
		{
			
			$from_date_array = explode('/',$from_date);
			$from_date = $from_date_array[2].'-'.$from_date_array[0].'-'.$from_date_array[1];
			
			$to_date_array = explode('/',$to_date);
			$to_date = $to_date_array[2].'-'.$to_date_array[0].'-'.$to_date_array[1];

			//$condition .= "  award_dt >= '$from_date' AND award_dt<='$to_date'";
			$query = "SELECT hr.id, hr.employee, hr.award_title, hr.award_desc, date_format(hr.award_dt,'%d-%m-%Y') as award_dt, hr.sbu_id, date_format(hr.added_dt,'%d %b %Y %l:%i %p') as added_dt, hr.added_by, s.sbu_name from hr_awardRecognization hr LEFT JOIN sbu_master s ON hr.sbu_id=s.srno WHERE  award_dt >= '$from_date' AND award_dt<='$to_date'";
		}
	 else{
	
		$query = "SELECT hr.id, hr.employee, hr.award_title, hr.award_desc, date_format(hr.award_dt,'%d-%m-%Y') as award_dt, hr.sbu_id, date_format(hr.added_dt,'%d %b %Y %l:%i %p') as added_dt, hr.added_by, s.sbu_name from hr_awardRecognization hr LEFT JOIN sbu_master s ON hr.sbu_id=s.srno WHERE 1=1";
		 }
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			$details[] = $row;
			
		
		return $details;
		
	}
	function training($connid,$from_date='',$to_date='')	/* following function is for hr-training module */
	{
		
		$data = array();
         
		if($from_date!='' && $to_date!='')
		{
			$from_date_array = explode('/',$from_date);
			$from_date = $from_date_array[2].'-'.$from_date_array[0].'-'.$from_date_array[1];
			
			$to_date_array = explode('/',$to_date);
			$to_date = $to_date_array[2].'-'.$to_date_array[0].'-'.$to_date_array[1];

//			$condition .= " AND training_date >= '$from_date' AND training_date<='$to_date'";
			$query = "SELECT id, training_title, training_description, training_location, training_place, training_facilitator, training_noofparticipants, date_format(training_date,'%d-%m-%Y') as training_date, added_dt, added_by, date_format(training_reg_lastdate,'%d-%m-%Y') as training_reg_lastdate 
				  FROM hr_training 
				  WHERE training_date >= '$from_date' AND training_date<='$to_date'
				 ";
		}
		else{
			$query = "SELECT id, training_title, training_description, training_location, training_place, training_facilitator, training_noofparticipants, 		
				  date_format(training_date,'%d-%m-%Y') as training_date, added_dt, added_by 
				  FROM hr_training 
				  WHERE 1=1 
				 ";
				 }

		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			$data[] = $row;
        
		return $data;
		
	}
    function exit_interview_details($connid)
	{
	  $data=array();
	  $month=date('m');
		$year=date('Y');
		$month = $month-1;
		
		if($month == 0)
		{
			$month=12;
			$year = $year-1;
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;
	 	$query="SELECT * from  emp_resignation_details where lastDate_manager>='".$start_date."' AND lastDate_manager<='".$end_date."'";	
		$dbquery = new dbquery($query,$connid);
		
		$total=$dbquery->numrows();
		if($total >0)
		{
			while($row=$dbquery->getrowarray()){
			$query_exit="SELECT * FROM exit_interview_details where userID='".$row["userID"]."' AND status='Completed' ";
			$dbquery1 = new dbquery($query_exit,$connid);
			
				while($row_exit=$dbquery1->getrowarray())
				{
				
					$data["userID"][] = $row_exit;

				}
			}
		}
		return $data;	
	}
	function getexitemployeedetails($connid)
	{
		$data=array();
		$data = $this->exit_interview_details($connid);
		for($i=0;$i<=sizeof($data["userID"]);$i++)
		{
		 	$query="select * from emp_master where userID='".$data["userID"][$i]["userID"]."' UNION ALL 
			 select * from old_emp_master where userID='".$data["userID"][$i]["userID"]."' order by firstName" ;
			$dbquery=new dbquery($query,$connid);
			while($row=$dbquery->getrowarray())
			{
				$data[]=$row;
			}
		 	
		}
		
		return $data;
		
	}
	
	function get_change_starttime($connid)
	{
		$data=array();
		$data['sbu'] = $this->get_sbu($connid);	// to get all SBUs except PI,sales
		$data['dept_wise_employees'] = $this->count_employees_department_wise($connid); // to get department wise all employee
	    
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		if($month == 0)  
		{
			$month=12;
			$year = $year-1;
		}
		if($month<10)
		{
		 $month="0".$month;	
		}
			$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		 	$start_date = $year."-".$month."-01";
			$end_date = $year."-".$month."-".$days;
		
		$data['working_days'] = $this->count_no_of_working_days($connid,$start_date,$end_date,$days);
		
		#Change Start Time summary
	    $query="select sbu_master.sbu_name as sbu_name, count(*) as changeTime,dl.late_reason
				from dailyLogin dl,emp_master em left join sbu_master on em.empl_sbu_id=sbu_master.srno where dl.userId=em.userID 
				and loginTime<>dl.startTime 
				and status='Approved'
				and late_reason IS NOT NULL  and dl.date>='".$start_date."' and dl.date<='".$end_date."' 
				GROUP BY em.empl_sbu_id,dl.late_reason
				UNION ALL 
				select  sbu_master.sbu_name as sbu_name,count(*) as changeTime,dl.late_reason 
				from dailyLogin dl,contract_master cm left join sbu_master on cm.empl_sbu_id=sbu_master.srno where dl.userId=cm.userID 
				and loginTime<>dl.startTime 
				and status='Approved'
				and late_reason IS NOT NULL and dl.date>='".$start_date."' and dl.date<='".$end_date."'  
				GROUP BY cm.empl_sbu_id,dl.late_reason ";
	
	   
	    
		$dbquery=new dbquery($query,$connid);
			
			while($row=$dbquery->getrowarray()){
				$data[$row['sbu_name']][$row['late_reason']] += $row['changeTime'];
			}
			#$data['change_time'][$row['late_reason']][$row['sbu_name']] = $row['changeTime'];
		
		return $data;
		
	}
	function get_late_reason($connid)
	{
		$data=array();
		$data['sbu'] = $this->get_sbu($connid);	// to get all SBUs
	    
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		if($month == 0)  
		{
			$month=12;
			$year = $year-1;
		}
		if($month<10)
		{
		 $month="0".$month;	
		}
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$start_date = $year."-".$month."-01";
		$end_date = $year."-".$month."-".$days;
	 	$query= "select DISTINCT lateLoginCause from dailyLogin where late_reason='other reason' AND date>='".$start_date."' and date='".$end_date."' ";
    	/*$query="select sbu_master.sbu_name as sbu_name,count(dl.lateLoginCause)
				from dailyLogin dl,emp_master em left join sbu_master on em.empl_sbu_id=sbu_master.srno where dl.userId=em.userID 
				and loginTime<>dl.startTime 
				and status='Approved'
				and late_reason IS NOT NULL and dl.late_reason='other reason' and (dl.date>='".$start_date."' and dl.date<='".$end_date."') 
				GROUP BY em.empl_sbu_id
				UNION ALL 
				select  sbu_master.sbu_name as sbu_name,count(dl.lateLoginCause)
				from dailyLogin dl,contract_master cm left join sbu_master on cm.empl_sbu_id=sbu_master.srno where dl.userId=cm.userID 
				and loginTime<>dl.startTime 
				and status='Approved'
				and late_reason IS NOT NULL   and dl.late_reason='other reason' and (dl.date>='".$start_date."' and dl.date<='".$end_date."')  
				GROUP BY cm.empl_sbu_id";*/
	}
	function WFH_3days($connid){
		$data = array();
		$month=date('m');
		$year=date('Y');
		$month = $month-1;
		$query_WFH = "SELECT leave_application.userID, leave_application.leave_type,grant_days,leave_application.comment, sbu_master.sbu_name as sbu_name,emp_master.firstName,emp_master.lastName
				  	FROM 
				  	leave_application 
				 	INNER JOIN emp_master ON leave_application.userID = emp_master.userID 
				 	INNER JOIN sbu_master ON emp_master.empl_sbu_id = sbu_master.srno
				  	WHERE
				  	leave_application.leave_type = 'Work Home' AND leave_reason like 'Work From - Home%' AND  leave_application.leave_status= 'Approved'
					AND leave_application.grant_days >=3 AND MONTH(grant_from) = MONTH(DATE_SUB(curdate(),INTERVAL 1 MONTH)) AND YEAR(grant_from)=YEAR(DATE_SUB(curdate(),INTERVAL 1 MONTH)) ";

		$dbquery = new dbquery($query_WFH,$connid);
		while($row = $dbquery->getrowarray()){
			$data[]=$row;
		}
		return $data;		
	}
	
}
?>