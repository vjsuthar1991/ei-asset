<?php
	$todays_date=date("Y-m-d");
	$todaysLogin=false;
	$optionalForCategory = array("C_F","ZM","SRM","ISM","NA","SUM","SUZM","SUMA");
	$office_time="";

	$category_result = mysql_query("SELECT category from marketing where name='$Name'") or die(mysql_error());
	$category_line = mysql_fetch_array($category_result);
	$category = $category_line[0];

	$islogin = 0;
	$query="SELECT * FROM dailyLogin WHERE userID='$Name' and date='$todays_date' and startTime<>'0000-00-00 00:00:00'";
	$result=mysql_query($query) or die(mysql_error());
	$user_row = mysql_fetch_array($result);
	$islogin=mysql_num_rows($result);
	
	# Checking if employee has joined yet or not
	$isjoined=0;
   	$query = "SELECT joinDate FROM emp_master WHERE userID='$Name'";
	$result=mysql_query($query);
	$row=mysql_fetch_array($result);
	$current_date=strtotime($todays_date);
	$joinDate = strtotime($row['joinDate']);
	if($current_date>=$joinDate){
		$isjoined=1;
	}
	
	if($_SESSION['password']!='test123' &&  $_SESSION['password']!="guest456")
	{
		if(!in_array($category,$optionalForCategory)){
			include("reporting/logout_time.php");
		}
		
 		#Start For pending reports
		$Name = $_SESSION["username"];
  		$query = "SELECT userID,firstname,lastname,joinDate, emailComp, empl_sbu_id, adminReportingTo 
			  	  FROM emp_master
			  	  LEFT JOIN marketing ON emp_master.userID = marketing.name
			  	  WHERE (emp_master.leftDate is NULL OR emp_master.leftDate >= CURDATE())
			  	  AND marketing.category NOT IN('SUM','SUMA','SUZM','ZM','RM')
			  	  AND emp_master.userID='".$Name."'";
		  
		$user_result = mysql_query($query);
		$line = mysql_fetch_array($user_result);
		$userID = $line["userID"];
		$EmplEmail = $line["emailComp"];
		$EmplSbuId = $line["empl_sbu_id"];
		$fullname = $line["firstname"]." ".$line["lastname"];
		$EmplManager = $line["adminReportingTo"];
		$joindate= $line["joinDate"];
		$pendingcount = 0;
  		for($i=5;$i>=0;$i--){
			$str = "SELECT date from dailyLogin where userID='".$userID."' and date NOT IN (select holidayDate from holiday_master) and date >= '".$joindate."' order by date desc limit $i,1";
			$result = mysql_query($str) or die(mysql_error());
			$user_row = mysql_fetch_array($result);
	 		$dayOnCheck = $user_row['date'];
		
			$query="SELECT count(*) FROM dailyLogin WHERE userID='$userID' AND date='$dayOnCheck'";
			$result = mysql_query($query) or die(mysql_error());
			$user_row=mysql_fetch_array($result);
			$records=$user_row['count(*)'];
		
			$query="SELECT count(*) FROM nonlogin_cause WHERE userID='$userID' AND noLoginDate='$dayOnCheck' AND (cause='Other Reason' OR cause='Forgot to Login' OR cause='Tour')"; //OR cause='Tour' NO need to fill in case of tour
			$result = mysql_query($query) or die(mysql_error());
			$user_row=mysql_fetch_array($result);
			$nonLoginRecords=$user_row['count(*)'];
			
			$dayOnCheckWeekDay=date( "D", strtotime($dayOnCheck));
			if($dayOnCheckWeekDay=='Sun'){
				$checksunDay=1;
			}else{
				$checksunDay=0;
			}	
		
			if(($records==1 || $dayOnCheck==date("Y-m-d") || $nonLoginRecords >= 1) && $checksunDay == 0){ 		
			
				$query="SELECT * FROM leave_application WHERE userID='$userID' AND (want_from<='$dayOnCheck' and want_until>='$dayOnCheck') AND leave_status<>'Rejected'";
				$result = mysql_query($query) or die(mysql_error());
				$tourLeaveApplicationRecords=mysql_num_rows($result);
			
				if(($nonLoginRecords == 0 && $tourLeaveApplicationRecords ==0)){
				
				$query="SELECT done FROM costcentre_breakup WHERE name='$userID' AND which_date='$dayOnCheck'";
				$result = mysql_query($query) or die(mysql_error());
				$user_row=mysql_fetch_array($result);
				$filled=$user_row['done'];
					if($filled ==0 && $dayOnCheck !== date("Y-m-d")){
						$pendingcount++;
					}
				}
			}
		}
		if($pendingcount >= 3 && basename($_SERVER["REQUEST_URI"]) == 'main.php'){	
			include_once("reporting/report_pending.php");
			exit;
		}
		
		#End pending report
		$flag=1;
		$date=date("Y-m-d");
		$year=substr($date,0,4);
		$month=substr($date,5,2);
		$day=substr($date,8,2);
		$current_time=mktime(0,0,0,$month,$day,$year);
		$float_time = 1 * 24 * 60 * 60;
		
		$causeSubmitReqd=false;
		$pendingcount=0;
		for($i=1;$i<=5;$i++){
			$str = "SELECT date,weekday(date) day from dailyLogin where userID='".$Name."' and date<>'".date("Y-m-d")."' order by date desc limit $i,1";
			//echo $str;
			$result = mysql_query($str) or die(mysql_error());
			$user_row = mysql_fetch_array($result);
			$dayOnCheck = $user_row['date'];
		
			$query="SELECT count(*) FROM holiday_master WHERE holidayDate='$dayOnCheck'";
			$result = mysql_query($query) or die(mysql_error());
			$user_row=mysql_fetch_array($result);
			$records=$user_row['count(*)'];
			if($records==1){
				continue;
			}

			$dayOnCheckWeekDay=date( "D", strtotime($dayOnCheck));

			if($dayOnCheckWeekDay!="Sun")
			{
				$query="SELECT count(*) FROM dailyLogin WHERE userID='$Name' AND date='$dayOnCheck'";
				$result = mysql_query($query) or die(mysql_error());
				$user_row=mysql_fetch_array($result);
				$records=$user_row['count(*)'];

				if($records > 0|| $dayOnCheck==date("Y-m-d"))
				{
					$query="SELECT * FROM leave_application WHERE userID='$Name' AND NOT (leave_type='Work Home' OR leave_type='Half Day Part1' OR leave_type='Half Day Part2' OR  leave_type='Half Sick Leave Part1' OR leave_type='Half Sick Leave Part2') AND (want_from<='$dayOnCheck' and want_until>='$dayOnCheck') AND leave_status<>'Rejected'";
					$result = mysql_query($query) or die(mysql_error());
					$tourLeaveApplicationRecords=mysql_num_rows($result);

					if(($tourLeaveApplicationRecords==0) && (!in_array($category,$optionalForCategory))) //Added and condition on 09/07/2008 for other category $nonLoginRecords==0 ||
					{
						$query="SELECT done FROM costcentre_breakup WHERE name='$Name' AND which_date='$dayOnCheck'";
						$result = mysql_query($query) or die(mysql_error());
						$user_row=mysql_fetch_array($result);
						
						$filled=$user_row['done'];
						if($filled ==0 || $dayOnCheck==date("Y-m-d")){
							$pendingcount++;
							$causeSubmitReqd=true;
							if($islogin == 0){
								$msg ="For Attendance,please fill your past pending work report of ".indianDate($dayOnCheck);
							}else {
								$msg ="Please fill your past pending work report of ".indianDate($dayOnCheck);
							}
							if(basename($_SERVER['REQUEST_URI'])=='/main.php' && $msg != ""){
								 echo $msg ;						
							}else{
								echo "<center><font face='Arial' color='blue'><b>$msg</b></font></center>";
							}	
							$flag=0;
							break;
						}
					}
				}
			}
		}
		
		if ($flag==1){
			//$validIp = array("59.165.","123.237","122.172","122.171","122.170","122.169","115.108","59.144.","219.64.","59.164.","192.168","122.160","122.167","117.192","122.179"); //"122.171", "122.172" all are used by BLR office //added "122.167" for Khushaal (Bagalore MS Center) //added 117.192 new ip for bng off vishnu
			//Above array Commented for Reference //
			//Removed airtel lines "122.179","122.169" //"117.192","122.167","115.108","122.170","117.96","122.179",1.23.11
			//$validIp = array("203.88.","59.165.","122.166","122.176","59.178.","120.56.","59.177.","202.83.","1.22.17","120.59.","202.83.16.198");
			//$validIp = array("27.109.14.74","122.166.232.176","122.176.75.41","59.178.","120.56.","59.177.","1.22.17","120.59.","202.83.17.227","103.224.145.112"); 
			$validIp = array("27.109.14.74","122.166.232.176","122.176.75.41","202.83.17.227","103.224.145.112","::1","192.168.0.117",'192.168.0.162'); 
			$HOlist = array("Ahmedabad","Bangalore","Delhi","New Delhi");
			/*$logfromIP = substr($_SERVER['REMOTE_ADDR'],0,7);
			$logfromIP = $_SERVER['REMOTE_ADDR'];*/
			$logfromIP = substr(checkIPAdd(),0,7);
			$fullIp = checkIPAdd();
			$exception_emp = array();
			$exception_result = mysql_query("select userID from emp_master where checkIP<>'Y' UNION select userID from contract_master where checkIP<>'Y'") or die(mysql_error());
			while ($exception_line = mysql_fetch_array($exception_result)) {
				array_push($exception_emp,$exception_line['userID']);
			}
			$location_result = mysql_query("select startTime,location,adminReportingTo,firstName,emailComp from emp_master where userID='".$Name."' UNION select startTime,location,adminReportingTo,firstName,emailPer from contract_master where userID='".$Name."'") or die(mysql_error());
			$location_line = mysql_fetch_array($location_result);
			$location = $location_line['location'];
			$office_time = $location_line['startTime'];
			$adminReportingTo = $location_line['adminReportingTo'];
			$firstName = $location_line['firstName'];
			$emailComp = $location_line['emailComp'];
	
			if(in_array($location,$HOlist)){
				if(!in_array($logfromIP,$validIp) && !in_array($Name,$exception_emp) && !in_array($fullIp,$validIp))
				{
					if(!in_array($category,$optionalForCategory)){
						$query="SELECT count(*) FROM leave_application WHERE userID='$Name' AND (want_from<='".date("Y-m-d")."' and want_until>='".date("Y-m-d")."') AND leave_type='Work Home' AND leave_status<>'Rejected'";
						$result = mysql_query($query) or die(mysql_error());
						$leave_line = mysql_fetch_array($result);
	
						if($leave_line[0] > 0)
							$flag=1;
						else{	
							if($islogin==0){
								echo "<html><head><script>function workHome(){ window.open(\"/reporting/Workfromhome.php\",\"workFromHome\",\"left=20,top=20,width=750,height=300,toolbar=0,resizable=1,scrollbars=yes\"); }</script></head><body>";
								echo "<center><font face='Arial' color='blue'>For Attendance, please connect to Office LAN (Error: Invalid IP ".checkIPAdd().")";
								echo "<br>OR<br><a href='javascript:workHome()'>Click here if you are working from home or non-office location today.</a></font></center>";
								echo "</body></html>";
								$flag=0;
							}	
						}
					}
				}
			}
		}
		# Not needed and commented
		/*$lateby_result = mysql_query("select TIMESTAMPDIFF(MINUTE,concat(date,' ','".$office_time."'),loginTime) mins from dailyLogin where date='$todays_date' and userId='$Name'") or die(mysql_error());
		$lateby_line = mysql_fetch_array($lateby_result);
		$lateMins = $lateby_line['mins'];*/
		
		if($flag==1 && $isjoined==1){
			$domain = checkIPAdd();
			
			
			if($islogin == 0){
				$query_holiday="SELECT count(*) from holiday_master where holidayDate='$todays_date'";
				$result=mysql_query($query_holiday);
				$row_holiday=mysql_fetch_array($result);
				$record = $row_holiday['count(*)'];

				$dayOnCheckWeekDay=date( "D", strtotime($todays_date)); 
					if($dayOnCheckWeekDay=='Sun')
					{
						$checksunDay=1;
					}
					else
					{
						$checksunDay=0;
					}
						if($record > 0 || $checksunDay==1)
						{
 							$time=$todays_date." ".$office_time; 
							$query="INSERT INTO dailyLogin SET userID='$Name',date='$todays_date',startTime='$time',loginTime='$time',late_mins='0',hostip='$domain',CookieValue='".@$_COOKIE["EILogin"]."'";
							mysql_query($query) or die(mysql_error());	
						}
						else
						{	
							#check any leaves on day
							$query_leave = "SELECT * FROM leave_application where userID= '$Name' AND ('$todays_date' between want_from and want_until) AND leave_status ='Approved' ";
							$result_leave= mysql_query($query_leave);
							$row_leave = mysql_fetch_array($result_leave);
							
							$leave_type = $row_leave['leave_type'];
							$leaves = mysql_num_rows($result_leave);
							
							$minutes = 0;
							$minutes_halfday=0;
							$current_date_time=date("Y-m-d H:i:s");
							$datetime1 = strtotime($office_time);
							$datetime2 = strtotime($current_date_time);
							
							$half_Time = date('H:i:s', strtotime($office_time) + 60 * 60 * 4.5);
							$current_time = date('H:i:s'); 
							$minutes_halfday = timeDiff($half_Time,$current_time);
							
							$interval  = $datetime2 - $datetime1;
							$minutes   = floor($interval / 60);
							
							#if leave,do not count late minutes
							if($leaves >=1 && $leave_type !='Half Day Part1'  )
							{
								$lateminutes = 0;
							}
							else if($leaves >=1 && $leave_type !='Half Sick Leave Part1'  )
							{
								$lateminutes = 0;
							}
							# if half day,count late minutes according to office time
							else if($leave_type == 'Half Day Part1')
							{
								$lateminutes = $minutes_halfday;
							}
							# if half day,count late minutes according to office time
							else if($leave_type == 'Half Sick Leave Part1')
							{
								$lateminutes = $minutes_halfday;
							}
							else{
								$lateminutes = $minutes;
							}
							$query="INSERT INTO dailyLogin SET userID='$Name',date='$todays_date',startTime='$current_date_time',loginTime='$current_date_time', late_mins='$lateminutes',hostip='$domain',CookieValue='".@$_COOKIE["EILogin"]."'";
							mysql_query($query) or die(mysql_error());
						
								#mail for late login start here 
								$login_result = mysql_query("select substring(loginTime,12) logTime from dailyLogin where userId='".$Name."' and date='".$todays_date."' and loginTime > DATE_ADD(concat('".$todays_date."',' ','".$office_time."'), INTERVAL 30 MINUTE)") or die(mysql_error());
								$login_line = mysql_fetch_array($login_result);
								$loginTime = $login_line['logTime'];
								
								$lateby_result = mysql_query("select TIMESTAMPDIFF(MINUTE,concat(date,' ','".$office_time."'),loginTime) mins from dailyLogin where date='$todays_date' and userId='$Name'") or die(mysql_error());
								$lateby_line = mysql_fetch_array($lateby_result);
								$lateMins = $lateby_line['mins'];
								
								
								
				    			$str = "select count(*) from dailyLogin where userId='$Name' and date like '".substr($todays_date,0,7)."-__' AND TIMESTAMPDIFF(MINUTE,concat(date,' ','".$office_time."'),loginTime) > 9  ";
								$lateCount_result = mysql_query($str) or die(mysql_error());
								$lateCount_line = mysql_fetch_array($lateCount_result);
							
								if($lateCount_line['count(*)']>=3)
								{
								  if($lateMins > 9 )
								  {
									
										$loginTime = '';
										$login_result = mysql_query("select substring(loginTime,12) logTime from dailyLogin where userId='".$Name."' and date='".$todays_date."' and loginTime > DATE_ADD(concat('".$todays_date."',' ','".$office_time."'), INTERVAL 90 MINUTE)") or die(mysql_error());
										$login_line = mysql_fetch_array($login_result);
										$loginTime = $login_line['logTime'];

										
										include_once($_SERVER["DOCUMENT_ROOT"]."/reporting/leave_functions.php");
										
										$sendLateLoginMail = 0;
										$sendLateLoginMail = getApplicableLeaveDeduction();
										if($sendLateLoginMail > 0)
										{
											getLateLoginDeductionDetails(date("m"),date("Y"),$lateMins,$todays_date,$loginTime);
										}
								   }
							    }																																															
								#mail for latelogin end here
						  }
			   }
			# not needed and commented
			/*$lateby_result = mysql_query("select TIMESTAMPDIFF(MINUTE,concat(date,' ','".$office_time."'),loginTime) mins from dailyLogin where date='$todays_date' and userId='$Name'") or die(mysql_error());
			$lateby_line = mysql_fetch_array($lateby_result);
			$lateMins = $lateby_line['mins'];*/
			
			if($islogin == 0){
				$msg= "Your Attendance is marked for today!";
				if($minutes > 10){
					$msg .= "<br>You are logging in late.";
					if(basename($_SERVER['REQUEST_URI'])!=="report.php"){						
						$msg .= "If you have a valid reason, please <a href='/reporting/report.php'>click here</a> NOW.";
					}
					else {
						$msg .= "If you have a valid reason, please enter NOW.";
					}
				}
				echo "<center><font face='Arial' color='blue'><b>$msg</b></font></center>";
			}
		}
	}

?>

<?php
function getLateLoginDeductionDetails($month,$year,$mins,$todays_date,$loginTime)
	{
		$message = "";
		$subject = "Late Login";
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "From: system@ei-india.com\r\n";
		$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
		if($lastmonth == 12)
			$year = $year - 1;
		//$headers .= "Reply-To: charisma@ei-india.com\r\n";
		//$headers .= "Cc: $ccList\r\n";
		//$headers .= "BCc: rahul@ei-india.com\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
		$query = "SELECT CONCAT(firstName,' ',lastName) as fullname,emailComp FROM emp_master WHERE userID = '".$_SESSION["username"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row = mysql_fetch_array($result);
		
		/*$query = "SELECT a.*,CONCAT(fistName,'',lastName) as fullname,emailComp FROM lateLoginDeduction a,emp_master b WHERE a.userID = b.userID AND a.userID = '".$_SESSION["username"]."' AND month = '".$lastmonth."' AND year = '".$year."' AND applicable = '1' ";
		$result = mysql_query($query) or die("Query latloginmessage".mysql_error());
		$row = mysql_fetch_array($result);
		if(mysql_num_rows($result) > 0)
		{*/
			$message = "Dear ".$row["fullname"].",<br>
									<br>
									Your login time of ".indianDate($todays_date)." was ".$loginTime."<br>
									<br>
									As per the attendance rule communicated to you, a 1/3rd CL will be cut if you are late by 10 mins (first two instances in a month are ignored). 1/2 CL will be cut if you are late by 30 mins or more.<br>
									<br>
									Please note that deduction calculations will be based on LOGIN time and not START time.<br>
									<br>
									<br>";
		
		
		
		
			//$message = "Dear ".$row["fullname"].",<br>";
			/*$message.= "Since you has crossed the limit of 400 mins for late coming in the past month, you are under the penalty system for the next 3 months. This is irreversible.<br>";
			$message.= "Remember for the next 3 months now,<br>";
			$message.= "1. Whenever you will be late for more than 10 mins, a 1/3rd leave will be deducted and<br>";
			$message.= "2. More than 30 mins, 1/2 leave will be deducted<br>";*/
			// Minutes and type of lot login leave deduction //
			if($mins > 10 && $mins <= 30)
				$leave_text = "1/3rd leave";
			else 
				$leave_text = "1/2 leave";
			$message.= "TODAY you have been late by <b>".$mins." mins </b> and hence <b>".$leave_text."</b> has been deducted.";
			
			echo "<br>".$message."</br>" ; 
			echo "<br>".$headers."</br>";
			echo "<br>".$row["emailComp"]."<br>"; exit;
			mail($row["emailComp"],$subject,$message,$headers);
			
		/*}*/
	}
	function getApplicableLeaveDeduction()
	{
		$count = 0;
		$current_day=date("d");
		$current_month=date("m");
		$current_year=date("Y");
		$year_upper_limit=$current_year;
		$year_lower_limit=$current_year;
		
		if($current_month==1)
		{
			$month_upper_limit=12;
			$month_lower_limit=12;
			$year_lower_limit=$current_year-1;
			$year_upper_limit=$current_year-1;
		}
		else
		{
			if($current_month-1 <=0 )
			{
				$month_upper_limit=12;
				$month_lower_limit=12;
				$year_lower_limit=$current_year-1;
				$year_upper_limit=$current_year-1;
			}
			else
			{
				$month_upper_limit=$current_month-1;
				$month_lower_limit=$current_month-1;
			}
		}
		$flag=0;
		for($i=2;$i>0;$i--)
		{
			if($month_lower_limit==1)
			{
				$month_lower_limit=12;
				$year_lower_limit=$current_year-1;
				$flag=1;
			}
			else
				$month_lower_limit--;
		}
	
		if($flag==1)
		{
			$query=" SELECT COUNT(*) FROM lateLoginDeduction  WHERE  totalTime>400 AND  month>=".$month_lower_limit." AND  (status=1 or status=0) AND userID = '".$_SESSION["username"]."' AND year=".$year_lower_limit." and applicable = 1  ";
			$result=mysql_query($query);
			$row=mysql_fetch_array($result);
			$count = $row[0];
			
			$query_2="SELECT COUNT(*) FROM lateLoginDeduction WHERE totalTime>400 AND  month<=".$month_upper_limit." AND (status=1 or status=0) AND userID = '".$_SESSION["username"]."' AND year=".$year_upper_limit."  and applicable = 1 ";
			$result_2=mysql_query($query_2);
			$row_2=mysql_fetch_array($result_2);	
			$count = $row_2[0];
		
		}
		else
		{
			/*$query="SELECT DISTINCT userID FROM lateLoginDeduction  WHERE totalTime>500 AND  month>=2 AND month<=2 AND (status=1 or status=0) AND year=".$year_upper_limit;
		    $result=mysql_query($query);
			while($row=mysql_fetch_array($result))
				$userName.="'".$row['userID']."',";	*/
			
			//".$month_lower_limit."
			$query = "SELECT COUNT(*) FROM lateLoginDeduction WHERE totalTime > 400 AND month>=".$month_lower_limit." AND month <= ".$month_upper_limit." AND (status = 1 or status = 0) AND userID = '".$_SESSION["username"]."' AND year = ".$year_upper_limit." and applicable = '1' ";
			//$query="SELECT COUNT(*) FROM lateLoginDeduction  WHERE totalTime>400 AND  month>=".$month_lower_limit." AND month<=".$month_upper_limit." AND (status=1 or status=0) AND userID = '".$_SESSION["username"]."' AND year=".$year_upper_limit."  and  applicable = '1'";
		    $result=mysql_query($query);
			$row=mysql_fetch_array($result);
			$count = $row[0];
			
		}
		
		return $count;
	}
function checkIPAdd(){
	  	return getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR');
}
?>