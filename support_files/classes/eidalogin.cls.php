<?php
class clsdalogin
{
	var $id;
	var $connid;
	var $username;
	var $master_password;
	var $ip;
	var $last_modified;
	var $action;
	var $submited;
	var $schoolcode;
	var $clspaging;
	var $from_date;
	var $to_date;
	var $year;
	var $school_code;
	var $class;
	var $section;
	var $student_id;
	var $password;
    static $statisticsDefaultStartDate;
    static $statisticsDefaultEndDate;
            
	function clsdalogin($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->id ="";
		$this->username = "";
		$this->master_password = "";
		$this->ip = "";
		$this->last_modified ="";
		$this->action = "";
		$this->submited = "";
		$this->schoolcode = "";
        if(class_exists('clspaging')){
            $this->clspaging = new clspaging('clsdalogin','');
        }
		$this->from_date = "";
		$this->to_date = "";
		$this->year = "";
		$this->school_code = "";
		$this->class = "";
		$this->section = "";
		$this->student_id = "";
		$this->password = "";
  	}
	
	function setpostvars()
	{
		if(isset($_POST["clsdalogin_hdnsubmited"])) $this->submited = $_POST["clsdalogin_hdnsubmited"];
		if(isset($_POST["clsdalogin_hdnaction"])) $this->action = $_POST["clsdalogin_hdnaction"];
		if(isset($_POST["clsdalogin_schoolcode"])) $this->schoolcode = $_POST["clsdalogin_schoolcode"];
		if(isset($_POST["clsdalogin_from_date"])) $this->from_date = $_POST["clsdalogin_from_date"];
		if(isset($_POST["clsdalogin_to_date"])) $this->to_date = $_POST["clsdalogin_to_date"];
		if(isset($_POST["clsdalogin_year"])) $this->year = $_POST["clsdalogin_year"];
		if(isset($_POST["clsdalogin_schoolcode"])) $this->school_code = $_POST["clsdalogin_schoolcode"];		
		if(isset($_POST["clsdalogin_class"])) $this->class = $_POST["clsdalogin_class"];		
		if(isset($_POST["clsdalogin_section"])) $this->section = $_POST["clsdalogin_section"];		
		if(isset($_POST["clsdalogin_password"])) $this->password = $_POST["clsdalogin_password"];						
    }
	function setgetvars()
	{
		if(isset($_GET["id"])) $this->id = trim($_GET["id"]);
		if(isset($_GET["studentid"])) $this->student_id = trim($_GET["studentid"]);
		if(isset($_GET["schoolcode"])) $this->schoolcode = trim($_GET["schoolcode"]);
		if(isset($_GET["from_date"])) $this->from_date = $_GET["from_date"];
		if(isset($_GET["to_date"])) $this->to_date = $_GET["to_date"];
		if(isset($_GET["year"])) $this->year = $_GET["year"];
		
	}
	
	# function to show the teacher login history 
	function pageTeacherLoginHistory(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
		
		$returnarr = array();
				
		$query = "SELECT da_loginHistory.username,da_loginHistory.ip,da_loginHistory.last_modified,da_loginHistory.master_password,
				  		 da_studentMaster.schoolCode,da_studentMaster.studentName,da_studAcadDetails.class,da_studAcadDetails.section,
				  		 da_studentMaster.email
				  FROM da_loginHistory
				  INNER JOIN da_studentMaster ON da_loginHistory.username = da_studentMaster.username AND da_loginHistory.year = '".$this->year."'
				  INNER JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID AND da_studAcadDetails.year = '".$this->year."'
				  WHERE 1=1 ";
		
		if(isset($this->schoolcode) && $this->schoolcode != "")
			$query.=" AND da_studentMaster.schoolCode = ".$this->schoolcode."";
		
		if($this->from_date != ""){
			$from_date = explode('-',$this->from_date);
            $frmdate = $from_date[2]."-".$from_date[1]."-".$from_date[0];
			$query .= " AND DATE_FORMAT(da_loginHistory.last_modified,'%Y-%m-%d') >= '".$frmdate."'";
		}	
			
		if($this->to_date != ""){
			$to_date = explode('-',$this->to_date);
        	$todate = $to_date[2]."-".$to_date[1]."-".$to_date[0];
			$query .= " AND DATE_FORMAT(da_loginHistory.last_modified,'%Y-%m-%d') <= '".$todate."'";
		}	
		
		if(isset($this->student_id) && $this->student_id != "")
			$query .= " AND da_studentMaster.studentId = '".$this->student_id."'";
			
		$query .= " ORDER BY da_loginHistory.id DESC";
		
		$this->clspaging->numofrecs = getQueryCount($query);
	
		if($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}
		
		$query .= $this->clspaging->limit;
		
		$dbqry = new dbquery($query,$this->connid);
		while($result = $dbqry->getrowarray()){
			$returnarr[] = array("ip" => $result["ip"],
								 "master_password" => $result["master_password"],
								 "username" => $result["username"],
								 "last_modified" => $result["last_modified"],
								 "schoolCode" => $result["schoolCode"],
								 "studentname" => $result["studentName"],
								 "class"=> $result["class"],
								 "section"=> $result["section"],
								 "email"=> $result["email"]);
		}
		
		return $returnarr;
	}

	function GetSchools(){
			
		$this->setpostvars();
		
		$condition = "";		
		if($this->year != "ALL" && $this->year != '')
		{
			$condition .= " AND da_orderMaster.year = '$this->year'";
		}			
		
		$resultarr = array();
		$query = "SELECT DISTINCT(da_orderMaster.schoolCode),schools.schoolname
				   FROM da_orderMaster
				   INNER JOIN schools ON da_orderMaster.schoolCode = schools.schoolno
				   WHERE da_orderMaster.schoolCode != 0 $condition
				   ORDER BY schools.schoolname";
		$dbqry = new dbquery($query,$this->connid);
		if ($dbqry->numrows()>0)
        {
           while($row = $dbqry->getrowarray()){	
           		$resultarr[] = array("schoolCode" => $row["schoolCode"],
           							 "schoolname" => $row["schoolname"],
           							);
           }
        }
        return $resultarr;
		
	}
	
	function GetClasses(){
		$arrRet = array();
		$this->setpostvars();
		
		$condition = "";		
		if($this->year != "ALL" && $this->year != '')
		{
			$condition .= " AND da_orderMaster.year = '$this->year'";			
		}
		if($this->school_code != "ALL" && $this->school_code != '-1')
		{
			$condition .= " AND da_orderMaster.schoolCode = '$this->school_code'";
		}	
		$query = "SELECT DISTINCT(da_orderBreakup.class)
				   FROM da_orderBreakup
				   INNER JOIN da_orderMaster ON da_orderBreakup.order_id = da_orderMaster.order_id
				   WHERE da_orderMaster.schoolCode != 0 $condition
				   ORDER BY da_orderBreakup.class";
		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray()){	
			$arrRet[$row["class"]] = $row["class"];
		}	
		
		return $arrRet;
	}
	
	function GetSections(){
		$arrRet = array();
		$this->setpostvars();
		
		$condition = "";		
		if($this->year != "ALL" && $this->year != '')
		{
			$condition .= " AND da_orderMaster.year = '$this->year'";			
		}
		if($this->school_code != "ALL" && $this->school_code != '-1')
		{
			$condition .= " AND da_orderMaster.schoolCode = '$this->school_code'";
		}	
		if($this->class != "ALL" && $this->class != '')
		{
			$condition .= " AND da_orderBreakup.class = '$this->class'";
		}	
		
		$query = "SELECT DISTINCT(da_orderBreakup.section)
				   FROM da_orderBreakup
				   INNER JOIN da_orderMaster ON da_orderBreakup.order_id = da_orderMaster.order_id
				   WHERE da_orderMaster.schoolCode != 0 $condition
				   ORDER BY da_orderBreakup.class";
		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray()){	
			$arrRet[$row["section"]] = $row["section"];
		}	
		
		return $arrRet;
	}
	
	function resetPassword()
	{
		$this->setgetvars();
        $this->setpostvars();
        
        if($this->submited)
        {        	
            if($this->action == "Save")
            {
                $this->savedata($this->student_id);
            }
        }        
	}
	
	function savedata($student_id)
	{
		$password = "";
		$to = array();
		$bcc = array();
		if($this->password!="")
		{
			$password = md5($this->password);
			
			$query = "UPDATE da_studentMaster set password = '$password' WHERE studentID = '$student_id'";
			$dbqry = new dbquery($query,$this->connid);
			
			# updation in common user details
			$query2 = "UPDATE common_user_details SET DA_password = '".$password."',updated_by = '".$_SESSION["username"]."',updated_dt = NOW()
					   WHERE DA_userID ='".$student_id."'";
			$dbqry2 = new dbquery($query2,$this->connid);
			
			$counter_check = 0;
			$query_select = "SELECT count(*) as cnt FROM da_studentPasswords WHERE studentID = '$student_id'";
			$dbqry_select = new dbquery($query_select,$this->connid);
			while($row_select = $dbqry_select->getrowarray()){	
				$counter_check = $row_select["cnt"];
			}	
			if($counter_check>0)
			{
				$query_delete = "DELETE FROM da_studentPasswords WHERE studentID = '$student_id'";
				$dbqry_delete = new dbquery($query_delete,$this->connid);
			}
			
			$email_id = "";
			$email_reseter = "";
			$user_name = "";
			
			$query_fetch = "SELECT username,email FROM da_studentMaster WHERE studentID = '$student_id'";
			$dbqry_fetch = new dbquery($query_fetch,$this->connid);
			while($row_fetch = $dbqry_fetch->getrowarray()){	
				$email_id = $row_fetch["email"];
				$user_name = $row_fetch["username"];
			}	
			
			$query_reseter = "SELECT email FROM marketing WHERE name = '".$_SESSION["username"]."'";
			$dbqry_reseter = new dbquery($query_reseter,$this->connid);
			while($row_reseter = $dbqry_reseter->getrowarray()){	
				$email_reseter = $row_reseter["email"];
			}	
			
			
			if($email_id!="")
			{
				$to[] = $email_id;
				$bcc[] = $email_reseter;
				$bcc[] = "sudhir.prajapati@ei-india.com";
			}
			else 
			{				
				$to[] = $email_reseter;
				$bcc[] = "sudhir.prajapati@ei-india.com";
			}
			
			
			$html = '';
			$html .= 'Your login information for Datailed Assessment as per below,<br/><br/><br/>';
			$html .= '<b>Username:</b>&nbsp;'.$user_name.'<br/>';
			$html .= '<b>Password:</b>&nbsp;'.$this->password.'<br/><br/>';
			$html .= 'Login URL: http://www.educationalinitiatives.com/DA/index.php<br/><br/><br/><br/>';
			$html .= 'Regards,<br/>Detailed Assessment';			
							
					
			$subject = "DA - Your password has been reset!";
			$to_send = "";
			$cc_send = "";
			
			
			if(isset($to) && count($to)>0)
			{
				$to_send = implode(",",$to);
			}
			if(isset($bcc) && count($bcc)>0)
			{
				$bcc_send = implode(",",$bcc);
			}
			$recipient["to"]=$to_send;
			$recipient["bcc"]=$bcc_send;
			$recipient["from"] = "Detailed Assessment<da@ei-india.com>";		
			$this->sendMail($recipient,$subject,$html);		
			}
		
	}
	
	
	function getDataRelatedToStudentLogin()
	{
		$arrRet = array();
		$this->setpostvars();
		
		if($this->school_code != "ALL" && $this->school_code != '-1')
		{
			$condition .= " AND da_studentMaster.schoolCode = '$this->school_code'";
		}	
		if($this->class != "ALL" && $this->class != '')
		{
			$condition .= " AND da_studAcadDetails.class = '$this->class'";
		}	
		if($this->section != "ALL" && $this->section != '')
		{
			$condition .= " AND da_studAcadDetails.section = '$this->section'";	
		}

		$query = "SELECT * FROM da_studentMaster 
				  LEFT JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID
				  WHERE da_studentMaster.enabled = 1 
				  AND da_studAcadDetails.year = '".$this->year."'
				  $condition";

		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray()){	
			$arrRet[$row["studentID"]] = array("studentID"=>$row["studentID"],
											   "studentName"=>$row["studentName"],
											   "rollNo"=>$row["rollNo"],	
											   "schoolCode"=>$row["schoolCode"],
											   "class"=>$row["class"],
											   "section"=>$row["section"],
											   "dob"=>$row["dob"],
											   "gender"=>$row["gender"],
											   "email"=>$row["email"],
											   "username"=>$row["username"],
											   "security_que_id"=>$row["security_que_id"],
											   "security_ans"=>$row["security_ans"],
											   "pan_number"=>$row["pan_number"]											   
												);
		}	
		
		return $arrRet;
	}

	function sendMail($recipient,$subject,$message) {
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3) =='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}
		
		$to=$recipient[to];
		$from=$recipient['from'];
		$cc=$recipient[cc];
		$bcc=$recipient[bcc];
		$reply_to=$recipient[reply_to];
		
		$mail_content='<html>
		<head>
		  <title>DA - Password Reset</title>
		  <style>
		  body{
		  	font-size: 12px;
			font-family: Verdana, Arial, Helvetica, sans-serif;	
		  }
		  </style>
		</head>
		<body>';	
		$mail_content.=$message;
		$mail_content.='</body></html>';
		
		$mail_content=wordwrap($mail_content,70,$eol);
	
		$headers = "From: $from $eol";
		if($cc!="") $headers .= "cc: $cc $eol";
		if($bcc!="") $headers .= "Bcc: $bcc $eol";
		if($reply_to!="") $headers .= "Reply-To: $reply_to $eol";
		$headers .= "MIME-Version: 1.0 $eol";		
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";			
		mail($to,$subject,$mail_content,$headers);
	}
	
	function PageParentsLogin(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
		
		$returnarr = array();

		//Change the Query to display count of login history on details page	
		$query = "SELECT da_loginHistory.username,da_studentMaster.schoolCode,da_studentMaster.studentName,da_studAcadDetails.class,da_studAcadDetails.section,
						 da_loginHistory.master_password,da_studentMaster.email,count(*) as total,schools.schoolname,da_studentMaster.studentID
				  FROM da_loginHistory
				  LEFT JOIN da_studentMaster ON da_loginHistory.username = da_studentMaster.username AND da_loginHistory.year = '".$this->year."'
				  LEFT JOIN schools ON da_studentMaster.schoolCode = schools.schoolno
				  LEFT JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID AND da_studAcadDetails.year = '".$this->year."'
				  WHERE 1=1 ";
                
		/*$query = "SELECT da_loginHistory.username,da_studentMaster.schoolCode,da_studentMaster.studentName,da_studAcadDetails.class,da_studAcadDetails.section,
						 da_loginHistory.master_password,da_studentMaster.email,count(*) as total,schools.schoolname,da_studentMaster.studentID
				  FROM da_loginHistory
				  INNER JOIN da_studentMaster ON da_loginHistory.username = da_studentMaster.username AND da_loginHistory.year = '".$this->year."'
				  LEFT JOIN schools ON da_studentMaster.schoolCode = schools.schoolno
				  INNER JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID AND da_studAcadDetails.year = '".$this->year."'
				  WHERE 1=1 "; */
				
		if(isset($this->schoolcode) && $this->schoolcode != "-1" && $this->schoolcode != "")
			$query.=" AND da_studentMaster.schoolCode = ".$this->schoolcode."";
				  
		if($this->from_date != ""){
			$from_date = explode('-',$this->from_date);
            $frmdate = $from_date[2]."-".$from_date[1]."-".$from_date[0];
			$query .= " AND DATE_FORMAT(da_loginHistory.last_modified,'%Y-%m-%d') >= '".$frmdate."'";
		}	
			
		if($this->to_date != ""){
			$to_date = explode('-',$this->to_date);
        	$todate = $to_date[2]."-".$to_date[1]."-".$to_date[0];
			$query .= " AND DATE_FORMAT(da_loginHistory.last_modified,'%Y-%m-%d') <= '".$todate."'";
		}	
			
		$query .= " GROUP BY da_loginHistory.username ORDER BY da_loginHistory.id DESC";
		
		$this->clspaging->numofrecs = getQueryCount($query);
	
		if($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}
		
		$query .= $this->clspaging->limit;
		$dbqry = new dbquery($query,$this->connid);
		while($result = $dbqry->getrowarray()){
			$returnarr[] = array("master_password" => $result["master_password"],
								 "studentID" => $result["studentID"],
								 "username" => $result["username"],
								 "schoolname" => $result["schoolname"],
								 "schoolCode" => $result["schoolCode"],
								 "studentname" => $result["studentName"],
								 "class"=> $result["class"],
								 "section"=> $result["section"],
								 "email"=> $result["email"],
								 "totallogin" => $result["total"]);
		}
               
		return $returnarr;
	}
	
	function GetTestRequestedSchools(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		$schoolList = array();
		$clsdatestrequest = new clsdatestrequest($this->connid);
		$clsdatestrequest->year = $this->year;
		$schoolList = $clsdatestrequest->GetTestRequestedSchools();
		return $schoolList;
	}
	
	function PageSchoolWiseLogin(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
		
		$returnarr = array();

		if($this->submited && $this->action == "GetSchoolWiseLogins") {	
			
			$query = "SELECT da_studentMaster.schoolCode,schools.schoolname,count(distinct da_loginHistory.username) as total 
					  FROM da_orderMaster
					  LEFT JOIN schools ON da_orderMaster.schoolCode = schools.schoolno
					  LEFT JOIN da_studentMaster ON schools.schoolno = da_studentMaster.schoolCode
					  LEFT JOIN da_loginHistory ON da_studentMaster.username = da_loginHistory.username AND da_loginHistory.year = '".$this->year."'
					  WHERE da_orderMaster.year = $this->year ";
			
			if(isset($this->schoolcode) && $this->schoolcode != "-1" && $this->schoolcode != "")
				$query.=" AND da_studentMaster.schoolCode = ".$this->schoolcode."";
					  
			if($this->from_date != ""){
				$from_date = explode('-',$this->from_date);
	            $frmdate = $from_date[2]."-".$from_date[1]."-".$from_date[0];
				$query .= " AND DATE_FORMAT(da_loginHistory.last_modified,'%Y-%m-%d') >= '".$frmdate."'";
			}	
				
			if($this->to_date != ""){
				$to_date = explode('-',$this->to_date);
	        	$todate = $to_date[2]."-".$to_date[1]."-".$to_date[0];
				$query .= " AND DATE_FORMAT(da_loginHistory.last_modified,'%Y-%m-%d') <= '".$todate."'";
			}	
				
			$query .= " GROUP BY da_studentMaster.schoolCode ORDER BY schools.schoolname ";
			
			$this->clspaging->numofrecs = getQueryCount($query);
		
			if($this->clspaging->numofrecs > 0) {
				$this->clspaging->getcurrpagevardb();
			}
			
			$query .= $this->clspaging->limit;
			$dbqry = new dbquery($query,$this->connid);
			while($result = $dbqry->getrowarray()){
				$returnarr[] = array("schoolname" => $result["schoolname"],
									 "schoolCode" => $result["schoolCode"],
									 "totallogin" => $result["total"]);
			}
		}
               
		return $returnarr;
		
	}
	    
    /** Function getHighestLoginCount
    * 
    * Returns Highest number of login times by any student
    * @param ($schoolcode) if empty or 0 function would return with false.
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @param ($year) e.g. 2015 if ignored current year will be taken.
    * @return (number) highest login count.  
    *
    */
    
    function getHighestLoginCount($year, $schoolcode, $class = null, $section = null, $date_range = array()){
        if(empty($schoolcode)){
           return false;
        }
        if(empty($year)){
            $year = date('Y');
        }        
        if(empty($date_range['from'])){
           $date_range['from'] =  self::$statisticsDefaultStartDate;
        }
        if(empty($date_range['till'])){
            $date_range['till'] = self::$statisticsDefaultEndDate;
        }
                     
        $highestCountQuery = 
                "SELECT MAX(counts) as highest_login_count FROM "
                . "(SELECT count(da_loginHistory.username) as counts, da_studentMaster.studentID "
                . " FROM da_loginHistory "
                . " INNER JOIN da_studentMaster ON da_loginHistory.username = da_studentMaster.username AND da_studentMaster.enabled = 1"
                . " INNER JOIN da_studAcadDetails ON  da_studAcadDetails.studentID = da_studentMaster.studentID AND da_studAcadDetails.year = '$year' AND da_studAcadDetails.status = 1 WHERE 1=1 AND da_loginHistory.master_password = '0' AND da_loginHistory.last_modified >= '$date_range[from] 23:59:59' AND da_loginHistory.last_modified <= '$date_range[till] 23:59:59' AND da_studentMaster.schoolCode = '$schoolcode'";      
        
        if(!is_null($class) && $class != ''){
            $highestCountQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section) && $section != ''){
            $highestCountQuery .= " AND da_studAcadDetails.section = '$section'";
        }
        $highestCountQuery .= " GROUP by da_loginHistory.username) as view";
        
        $dbqry = new dbquery($highestCountQuery,$this->connid);
        $row = $dbqry->getrowassocarray();
        if(is_null($row['highest_login_count'])){
            return 0;
        }
        return $row['highest_login_count'];    
    }
    
    
    /** Function getStudentCountWithAtleastOneLogin
    * 
    * Returns number of students with atleast one login
    * @param ($schoolcode) if empty or 0 function would return with false.
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @param ($year) e.g. 2015 if ignored current year will be taken.
    * @return (number) highest login count.  
    *
    */
    
    function getStudentCountWithAtleastOneLogin($year, $schoolcode, $class = null, $section = null, $date_range = array()){
        if(empty($schoolcode)){
           return false;
        }
        if(empty($year)){
            $year = date('Y');
        }   
        if(empty($date_range['from'])){
           $date_range['from'] =  self::$statisticsDefaultStartDate;
        }
        if(empty($date_range['till'])){
            $date_range['till'] = self::$statisticsDefaultEndDate;
        }
        $atleastOneLoginQuery = 
                "SELECT count(DISTINCT da_loginHistory.username) as atleast_once_logged_in_count FROM da_loginHistory "
            . " INNER JOIN da_studentMaster ON ( da_loginHistory.username = da_studentMaster.username )"
            . " AND da_studentMaster.schoolCode = '$schoolcode'"
            . " INNER JOIN da_studAcadDetails ON (da_studentMaster.studentID = da_studAcadDetails.studentID "
            . " AND da_studAcadDetails.year = '$year' AND da_studAcadDetails.status = 1) "            
            . " WHERE da_loginHistory.master_password = '0' AND da_loginHistory.last_modified >= '$date_range[from]' AND da_loginHistory.last_modified <= '$date_range[till] 23:59:59'";        
        if(!is_null($class) && $class != ''){
            $atleastOneLoginQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section)  && $section != ''){
            $atleastOneLoginQuery .= " AND da_studAcadDetails.section = '$section'";
        }       
        $dbqry = new dbquery($atleastOneLoginQuery,$this->connid);
        $row = $dbqry->getrowassocarray();
        return $row['atleast_once_logged_in_count'];    
    }
    
    
    
    /** Function getStudentParentLogins
    * 
    * Returns Students or parents who logged in with number of times the user logged in
    * @param ($schoolcode) if empty or 0 function would return with false.
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @param ($year) e.g. 2015 if ignored current year will be taken.
    * @return (number) highest login count.  
    *
    */
    
    function getStudentParentLogins($schoolcode, $class = null, $section = null, $date_range = array(), $year = null){
        if(empty($schoolcode)){
           return false;
        }
        if(empty($year)){
            $year = date('Y');
        }   
        if(empty($date_range['from'])){
           $date_range['from'] =  self::$statisticsDefaultStartDate;
        }
        if(empty($date_range['till'])){
            $date_range['till'] = self::$statisticsDefaultEndDate;
        }
        $studentsLoginQuery = 
                "SELECT da_loginHistory.username, da_studAcadDetails.rollNo, da_studentMaster.studentName,da_studAcadDetails.class, da_studAcadDetails.section, "
                . " da_studentMaster.email,count(da_loginHistory.username) as total,da_studentMaster.studentID "
                . " FROM da_loginHistory "
                . " INNER JOIN da_studentMaster ON da_loginHistory.username = da_studentMaster.username AND da_studentMaster.enabled = 1"
                . " INNER JOIN da_studAcadDetails ON  da_studAcadDetails.studentID = da_studentMaster.studentID AND da_studAcadDetails.year = '$year' AND da_studAcadDetails.status = 1 WHERE 1=1 AND da_loginHistory.master_password = '0' AND da_loginHistory.last_modified >= '$date_range[from]' AND da_loginHistory.last_modified <= '$date_range[till] 23:59:59' AND da_studentMaster.schoolCode = '$schoolcode'";      
        
        if(!is_null($class) && $class != ''){
            $studentsLoginQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section) && $section != ''){
            $studentsLoginQuery .= " AND da_studAcadDetails.section = '$section'";
        }
        $studentsLoginQuery.= " GROUP BY da_loginHistory.username";

        $studentsLoginQuery .= " ORDER BY da_studAcadDetails.class, da_studAcadDetails.section, da_studAcadDetails.rollNo"; 
        $dbqry = new dbquery($studentsLoginQuery,$this->connid);
        $studs = array();        
        while($row = $dbqry->getrowassocarray()){
            $studs[] = $row;
        }
        return $studs;                        
    }
        
    private function generateStudentLoggedInQuery($identifier, $schoolcode, $class = null, $section = null, $date_range = array(), $year = null){
        $studentsWhoLoggedInQuery = 
                " SELECT DISTINCT da_loginHistory.username as username FROM da_loginHistory "
            . " INNER JOIN da_studentMaster ON ( da_loginHistory.username = da_studentMaster.username )"
            . " AND da_studentMaster.schoolCode = '$schoolcode'"
            . " INNER JOIN da_studAcadDetails ON (da_studentMaster.studentID = da_studAcadDetails.studentID "
            . " AND da_studAcadDetails.year = '$year' AND da_studAcadDetails.status = 1) "            
            . " WHERE da_loginHistory.master_password = '0' AND da_loginHistory.last_modified >= '$date_range[from]' AND da_loginHistory.last_modified <= '$date_range[till] 23:59:59'";        
        
        if(!is_null($class) && $class != ''){
            $studentsWhoLoggedInQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section) && $section != ''){
            $studentsWhoLoggedInQuery .= " AND da_studAcadDetails.section = '$section'";
        }    
        return $studentsWhoLoggedInQuery;
    }
    
    function getStudentParentWhoDidNotLogin($schoolcode, $class = null, $section = null, $date_range = array(), $year = null){
        
        if(empty($schoolcode)){
           return false;
        }
        if(empty($year)){
            $year = date('Y');
        }   
        if(empty($date_range['from'])){
           $date_range['from'] =  self::$statisticsDefaultStartDate;
        }
        if(empty($date_range['till'])){
            $date_range['till'] = self::$statisticsDefaultEndDate;
        }                
        
        $usernameLoggedInQuery = $this->generateStudentLoggedInQuery('username',$schoolcode, $class, $section , $date_range , $year);        
        $dbqry = new dbquery($usernameLoggedInQuery, $this->connid);
        $studs = array(); 
        while($row = $dbqry->getrowassocarray()){
            $studs[] = $row['username'];
        }
        $loggedInStudsString = "'". implode("','", $studs) . "'";        
        $schoolStudentQuery  = "SELECT da_studentMaster.studentID, da_studentMaster.studentName, da_studAcadDetails.rollNo, da_studentMaster.email, da_studentMaster.class, da_studentMaster.section FROM da_studentMaster "
                . " INNER JOIN da_studAcadDetails ON da_studAcadDetails.studentID = da_studentMaster.studentID "
                . " AND da_studAcadDetails.year = '$year' AND da_studentMaster.enabled = 1 AND schoolcode = '$schoolcode' "
                . " AND da_studAcadDetails.status = 1 AND da_studentMaster.username NOT IN ($loggedInStudsString)";
        
        if(!is_null($class) && $class != ''){
            $schoolStudentQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section) && $section != ''){
            $schoolStudentQuery .= " AND da_studAcadDetails.section = '$section'";
        }
        $schoolStudentQuery .= " ORDER BY da_studAcadDetails.class, da_studAcadDetails.section, da_studAcadDetails.rollNo"; 
        $dbqry->executequery($schoolStudentQuery);                       
        $studs = array();
        while($row = $dbqry->getrowassocarray()){
            $studs[] = $row;
        }
        return $studs;
    }
    
        
    //To display registered student Count which are active students and the students of the academic year selected
	function GetStudentCount($schoolcode,$year){		
		if($schoolcode == "" || $schoolcode == 0) return 0;		
		$total_students = 0;
		/*change query to display registered student Count which are active students and the students of the academic year selected
		/$query = "SELECT COUNT(*) as total FROM da_studentMaster WHERE schoolCode = '".$schoolcode."' AND enabled = 1"; */
        $query = "SELECT COUNT(m.studentID) as total FROM da_studentMaster m LEFT JOIN da_studAcadDetails d ON m.studentID = d.studentID where 
                d.year = $year AND m.enabled=1 AND d.status =1 AND m.schoolCode = $schoolcode";
		$dbqry = new dbquery($query,$this->connid);
		$result = $dbqry->getrowarray();
		$total_students = $result["total"];
		
		return $total_students;
	}
    //add funciton to display count of valid email of students
    function GetStudentvalidemailcount($schoolcode,$year){
        if($schoolcode == "" || $schoolcode == 0) return 0;

        $total_emails = 0;
        $query = "SELECT COUNT(m.email) as totalemail FROM da_studentMaster m LEFT JOIN da_studAcadDetails d ON m.studentID = d.studentID where 
            d.year = '$year' AND m.enabled=1 AND d.status = 1 AND m.schoolCode = '$schoolcode' AND m.email REGEXP '(.*)@(.*)\.(.*)'";
        $dbqry = new dbquery($query,$this->connid);
        $result = $dbqry->getrowarray();
        $total_emails = $result["totalemail"];

        return $total_emails;

    }

    //add funciton to display count of invalid email of students
    function GetStudentInvalidemailcount($schoolcode,$year, $class = null, $section = null){
        if($schoolcode == "" || $schoolcode == 0) return 0;

        $total_invalidemails = 0;
        $query = "select count(m.email) as totalinvalidemail from da_studentMaster m left JOIN da_studAcadDetails d ON m.studentID = d.studentID where 
            d.year = '$year' AND m.enabled=1 AND d.status = 1 AND m.schoolCode = '$schoolcode' AND m.email NOT REGEXP '(.*)@(.*)\.(.*)'";
        if(!empty($class)){
            $query .= " AND d.class = '$class'";
        }if(!empty($section)){
            $query .= " AND d.section = '$section'";
        }
        $dbqry = new dbquery($query,$this->connid);
        $result = $dbqry->getrowarray();
        $total_invalidemails = $result["totalinvalidemail"];
        return $total_invalidemails;

    }
    
     
    /** Function getStudentLoginsBasedOnLastReportDateInRespectiveSections
   
    */
    public function getStudentLoginsBasedOnLastReportDateInRespectiveSections($schoolcode,$year = null){
        $totallogincounts = 0;
        if(!empty($schoolcode)){
            $today = new DateTime();
            if(empty($year)){
                $year = $today->format('Y');
            }
            $dbQueryObj = new dbquery(null, $this->connid);
            $getSectionWiseLastReportDate = 
                    "SELECT max(report_date) as last_report_date, class, section "
                    . " FROM da_examDetails  "
                    . " INNER  JOIN da_testRequest ON da_testRequest.id = da_examDetails.request_id "
                    . " WHERE da_testRequest.schoolCode = '$schoolcode' "
                    . " AND da_testRequest.year = '$year' AND da_examDetails.report_status = 'generated' "
                    . " GROUP BY class, section ORDER BY class, section";
            $dbqry = $dbQueryObj->executequery($getSectionWiseLastReportDate);  
            while($sectionreporttime = $dbqry->getrowassocarray()){
                //$sectionwiselastreporttimes[] = $sectionreporttime;
                $lastReportDate = new DateTime($sectionreporttime['last_report_date']);
                $interval = 0;
                if($lastReportDate){
                    $interval = $lastReportDate->diff($today);
                }
                if((int)$interval->format("%r%a") <= 30){
                    $daterange['from'] = new DateTime("first day of last month");
                }else{
                    $daterange['from'] = $lastReportDate;
                }
                $daterange['till'] = $today;
                $totallogincounts = $totallogincounts +  (int) $this->getStudentCountWithAtleastOneLogin($today->format('Y'),$schoolcode, $sectionreporttime['class'], $sectionreporttime['section']);
            }
        }
        //echo $totallogincounts;
        return $totallogincounts;
    }

}
clsdalogin::$statisticsDefaultStartDate = date('Y-m-01');
clsdalogin::$statisticsDefaultEndDate = date('Y-m-t');
?>