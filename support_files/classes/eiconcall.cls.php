<?

class clsConCall
{
	 var $schoolCode;
	 var $schoolName;
	 var $city;
	 var $aro_expected_stud;
	 var $cat09;
	 var $TE;
	 var $PA_done_date;
	 var $PA_pending_date;
	 var $EB_advance_date;
	 var $EB_advance_amount;
	 var $SSF_received_date;
	 var $advance_exp_date;
	 var $EB_confirmation;
	 var $EB_confirm_students;
	 var $EB_exp_students;
	 var $ARO_confirm_students;
	 var $ARO_exp_payment_date;
	 var $ZM_help;
	 var $STM_help;
	 var $seminar_date;
	 var $seminar_place;
	 var $dropped_reason;
	 var $comments;
	 var $updated_by;
	 var $actiontoperform;
	 
	 function clsConCall()
	 {
	 	$this->schoolCode="";
	 	$this->schoolName="";
	 	$this->city="";
	 	$this->aro_expected_stud=0;
	 	$this->cat09="";
	 	$this->TE="";
	 	$this->PA_done_date="0000-00-00";
		$this->PA_pending_date="0000-00-00";
		$this->EB_advance_date="0000-00-00";
		$this->EB_advance_amount=0;
		$this->SSF_received_date="0000-00-00";
		$this->advance_exp_date="0000-00-00";
		$this->EB_confirmation="";
		$this->EB_confirm_students=0;
		$this->EB_exp_students=0;
		$this->ARO_confirm_students=0;
		$this->ARO_exp_payment_date="0000-00-00";
		$this->ZM_help="";
		$this->STM_help="";
		$this->seminar_date="0000-00-00";
		$this->seminar_place="";
		$this->dropped_reason="";
		$this->comments="";
		$this->updated_by=$_SESSION['username'];
		$this->actiontoperform="";
	 }
	 
	 function setpostvars()
	 {
		if(isset($_REQUEST["schoolCode"]))				$this->schoolCode = trim($_REQUEST["schoolCode"]);
		if(isset($_REQUEST["TE"]))						$this->TE = trim($_REQUEST["TE"]);
	 	if(isset($_REQUEST["PA_done_date"]) && $_REQUEST["PA_done_date"]!='')			$this->PA_done_date = formatDate(trim($_REQUEST["PA_done_date"]));
		if(isset($_REQUEST["PA_pending_date"]) && $_REQUEST["PA_pending_date"]!='')		$this->PA_pending_date = formatDate(trim($_REQUEST["PA_pending_date"]));
		if(isset($_REQUEST["EB_advance_date"]) && $_REQUEST["EB_advance_date"]!='')	$this->EB_advance_date = formatDate(trim($_REQUEST["EB_advance_date"]));
		if(isset($_REQUEST["EB_advance_amount"]))		$this->EB_advance_amount = trim($_REQUEST["EB_advance_amount"]);
		if(isset($_REQUEST["SSF_received_date"]) && $_REQUEST["SSF_received_date"]!='')		$this->SSF_received_date = formatDate(trim($_REQUEST["SSF_received_date"]));
		if(isset($_REQUEST["advance_exp_date"]) && $_REQUEST["advance_exp_date"]!='')		$this->advance_exp_date = formatDate(trim($_REQUEST["advance_exp_date"]));
		if(isset($_REQUEST["EB_confirmation"]))			$this->EB_confirmation = trim($_REQUEST["EB_confirmation"]);
		if(isset($_REQUEST["EB_confirm_students"]))		$this->EB_confirm_students = trim($_REQUEST["EB_confirm_students"]);
		if(isset($_REQUEST["EB_exp_students"]))			$this->EB_exp_students = trim($_REQUEST["EB_exp_students"]);
		if(isset($_REQUEST["ARO_confirm_students"]))	$this->ARO_confirm_students = trim($_REQUEST["ARO_confirm_students"]);
		if(isset($_REQUEST["ARO_exp_payment_date"]) && $_REQUEST["ARO_exp_payment_date"]!='')	$this->ARO_exp_payment_date = formatDate(trim($_REQUEST["ARO_exp_payment_date"]));
		if(isset($_REQUEST["ZM_help"]))					$this->ZM_help = trim($_REQUEST["ZM_help"]);
		if(isset($_REQUEST["STM_help"]))				$this->STM_help = trim($_REQUEST["STM_help"]);
		if(isset($_REQUEST["seminar_date"]) && $_REQUEST["seminar_date"]!='')			$this->seminar_date = formatDate(trim($_REQUEST["seminar_date"]));
		if(isset($_REQUEST["seminar_place"]))			$this->seminar_place = trim($_REQUEST["seminar_place"]);
		if(isset($_REQUEST["dropped_reason"]))			$this->dropped_reason = trim($_REQUEST["dropped_reason"]);
		if(isset($_REQUEST["comments"]))				$this->comments = trim($_REQUEST["comments"]);
		if(isset($_REQUEST["actiontoperform"]))			$this->actiontoperform = trim($_REQUEST["actiontoperform"]);
	}
	
	function saveDetails()
	{
		$query = "SELECT school_code FROM conCallDetails WHERE school_code=".$this->schoolCode." AND test_edition='".$this->TE."'";
		$result = mysql_query($query) or die(mysql_error());
		$count = mysql_num_rows($result);
		
			$query = " conCallDetails SET school_code=".$this->schoolCode.",test_edition='".$this->TE."',PA_done_date='".$this->PA_done_date."',
			PA_pending_date='".$this->PA_pending_date."',EB_advance_date='".$this->EB_advance_date."',
			EB_advance_amount='".$this->EB_advance_amount."',SSF_received_date='".$this->SSF_received_date."',
			advance_exp_date='".$this->advance_exp_date."',EB_confirmation='".$this->EB_confirmation."',
			EB_confirm_students='".$this->EB_confirm_students."',EB_exp_students='".$this->EB_exp_students."',ARO_confirm_students='".$this->ARO_confirm_students."',
			ARO_exp_payment_date='".$this->ARO_exp_payment_date."',ZM_help='".$this->ZM_help."',STM_help='".$this->STM_help."',
			seminar_date='".$this->seminar_date."',seminar_place='".$this->seminar_place."',
			dropped_reason='".$this->dropped_reason."',comments='".$this->comments."',updated_by='".$this->updated_by."'";			
			
		if($count==0)
			$query = "INSERT INTO ".$query;
		else 
			$query = "UPDATE ".$query. " WHERE school_code=".$this->schoolCode." AND test_edition='".$this->TE."'";
		
		//echo $query."<br>";
		mysql_query($query) or die(mysql_error());
		
		echo "<script>opener.history.go(0);window.close();</script>";	
	}
	
	function populateDetails($schoolCode,$TE)
	{
		$query = "SELECT schoolno,schoolname,city,aro_expected_stud,category,ss.test_edition,
		PA_done_date,PA_pending_date,EB_advance_date,EB_advance_amount,SSF_received_date,advance_exp_date,
		EB_confirmation,EB_confirm_students,EB_exp_students,ARO_confirm_students,ARO_exp_payment_date,
		ZM_help,STM_help,seminar_date,seminar_place,dropped_reason,cc.comments
		
		FROM schools s, school_status ss 
			
		LEFT JOIN conCallDetails as cc ON cc.school_code=ss.school_code AND cc.test_edition=ss.test_edition
		
		WHERE  s.schoolno=ss.school_code AND ss.test_edition='".$TE."' AND ss.school_code=".$schoolCode; 
		//echo $query;
		$result = mysql_query($query);
		$line = mysql_fetch_array($result);
		
		$this->schoolName			= $line['schoolname'];
		$this->city					= $line['city'];
		$this->aro_expected_stud	= $line['aro_expected_stud'];
		$this->cat09				= $line['category'];
		$this->PA_done_date			= $line['PA_done_date'];
		$this->PA_pending_date		= $line['PA_pending_date'];
		$this->EB_advance_date		= $line['EB_advance_date'];
		$this->EB_advance_amount	= $line['EB_advance_amount'];
		$this->SSF_received_date	= $line['SSF_received_date'];
		$this->advance_exp_date		= $line['advance_exp_date'];
		$this->EB_confirmation		= $line['EB_confirmation'];
		$this->EB_confirm_students	= $line['EB_confirm_students'];
		$this->EB_exp_students		= $line['EB_exp_students'];
		$this->ARO_confirm_students	= $line['ARO_confirm_students'];
		$this->ARO_exp_payment_date	= $line['ARO_exp_payment_date'];
		$this->ZM_help				= $line['ZM_help'];
		$this->STM_help				= $line['STM_help'];
		$this->seminar_date			= $line['seminar_date'];
		$this->seminar_place		= $line['seminar_place'];
		$this->dropped_reason		= $line['dropped_reason'];
		$this->comments				= $line['comments'];
		//print_r($this);
	}
}