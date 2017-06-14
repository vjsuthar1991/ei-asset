<?php

class clsuserlogin
{
	var $userid;
	var $dcoid;
	var $password;
	var $usertype;
	var $actiontoperform;
	var $erromsg;
	var $session;
	var $fullname;
	var $state;
	var $district;
	var $message;
	var $subject;
	var $recordid;
	var $subjectArray;
	
	function clsuserlogin()
	{
		$this->userid="";
		$this->dcoid;
		$this->password="";
		$this->usertype="";
		$this->actiontoperform="";
		$this->erromsg="";
		$this->session = new clssession();
		$this->fullname="";
		$this->state="";
		$this->district="";
		$this->message="";
		$this->subject="";
		$this->recordid="";
		$this->subjectArray=array("Maths","Language");
  	}

	function setpostvars()
	{
		if(isset($_POST["userid"])) 							$this->userid   = DoTrim($_POST["userid"]);
		if(isset($_POST["dcoid"])) 								$this->dcoid    = DoTrim($_POST["dcoid"]);
		if(isset($_POST["password"])) 							$this->password = DoTrim($_POST["password"]);
		if(isset($_POST["usertype"])) 							$this->usertype = DoTrim($_POST["usertype"]);
		if(isset($_POST["hdn_actiontoperform"])) 				$this->actiontoperform 	= DoTrim($_POST["hdn_actiontoperform"]);
		if(isset($_POST["subject"])) 							$this->subject   = DoTrim($_POST["subject"]);
		if($this->userid == "") 								$this->userid    = $_SESSION["Userid"];
		if($this->dcoid == "") 									$this->dcoid     = $_SESSION["dcoid"];
		if($this->dcoid == "") 									$this->dcoid     = $this->userid;
		if($this->userid == "") 								$this->userid    = $this->dcoid;
		if(isset($_POST["recordid"])) 							$this->recordid = DoTrim($_POST["recordid"]);
    }
    function setgetvars()
	{
		if(isset($_GET["recordid"])) 							$this->recordid = DoTrim(base64_decode($_GET["recordid"]));
		if(isset($_GET["userid"])) 								$this->userid   = DoTrim(base64_decode($_GET["userid"]));
		if(isset($_GET["dcoid"])) 								$this->dcoid    = DoTrim(base64_decode($_GET["dcoid"]));
    }
    function setsessionvars()
    {
    	if($_SESSION["dcoid"] == "")
    	{
    		$_SESSION["dcoid"] = $this->dcoid;
    		$this->session->dcoid = $this->dcoid;
    	}
    		
    	if($_SESSION["dco_dailyreport_enteredby"] == "")
    	{
    		$_SESSION['dco_dailyreport_enteredby'] = $this->userid;
    		$this->session->dco_dailyreport_enteredby = $this->userid;
    	}    	
    }
    

    /***
	    Function called from bt_userLogin.php. Added by Arpit (18/12/2007) - For validationg user login
    **/
    function pageUserLogin($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "User Login")
		{
			$returnvalue = $this->validateuser($connid);
			if($returnvalue == 0)
				$this->erromsg = "Invalid Login ID or Password...";
			else 
			{
				$this->session->startSession();
				$_SESSION["userid"] = $this->userid;
				$_SESSION["usertype"] = $this->usertype;
				if($this->usertype != "DCO")
				{
					$url = "ggl_select_dco.php";
					$_SESSION["dco_dailyreport_enteredby"] = $this->userid;
					$_SESSION["dcoid"] = "";
				}
				else
				{
					$url="ggl_dco_reporting_add.php";
					$_SESSION["dco_dailyreport_enteredby"] = $this->userid;
					$_SESSION["dcoid"] = $this->userid;
					
				}
				echo "<script>redirectPage('".$url."');</script>";
			}
		}
	}
	
	/***
	    Function called from pageUserLogin() function. Added by Arpit (18/12/2007) - For validationg user login
    **/
	function validateuser($connid)
	{
		$returnvalue = 0;
		//echo $query."A<br>";
		$query = "SELECT * FROM marketing WHERE name='".$this->userid."' AND password=password('".$this->password."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($dbquery->numrows())
		{
			$returnvalue=1;
			$this->usertype=$row["category"];
		}
			
		return $returnvalue;
	}
	
	/***
	    Function called from any page where user clicks on Logout. Added by Arpit (23/12/2007)
    **/
    function pageUserLogout($connid)
	{
		echo "<script>redirectPage('bt_userLogin.php');</script>";
	}
	
	function preparedcocombo_master($connid)
	{
		$output_string = "<select name='dcoid'><option value=''></option>";
		$query = "SELECT District, Userid FROM ggl_dco_state_district_mapping WHERE Userid!='' AND Designation='DCO' ORDER BY District";
		//echo $query;
		$result = new dbquery($query,$connid);
		while($row = $result->getrowarray())
		{
			$output_string .= "<option value='".$row['Userid']."'>".$row['District']."</option>";
			//echo $output_string;
		}
		$output_string .= "</select>";
		return $output_string;
		
	}
	function preparedcocombo($connid,$userid,$usertype)
	{
		$dcoarray = array();
		if($usertype=="GZM")
		{
			$query = "SELECT id FROM google_zm WHERE userid='".$userid."'";
			$result = new dbquery($query,$connid);
			$row = $result->getrowarray();
			$id = $row["id"];
			
			$query = "SELECT * FROM google_dco WHERE zm_id=".$id;
			$result = new dbquery($query,$connid);
			while($row = $result->getrowarray())
			{
				array_push($dcoarray,$row['userid']);
			}
		}
		elseif ($usertype=="SCO")
		{
			$query = "SELECT id FROM google_sco WHERE userid='".$userid."'";
			$result = new dbquery($query,$connid);
			$row = $result->getrowarray();
			$id = $row["id"];
			
			$query = "SELECT * FROM google_dco WHERE sco_id=".$id;
			$result = new dbquery($query,$connid);
			while($row = $result->getrowarray())
			{
				array_push($dcoarray,$row['userid']);
			}
		}
		return $dcoarray;
	}
	
	function pageAddDCoDailyReport($connid)
	{
		if($this->actiontoperform == "Submit DCo Daily Report")
		{
			/*echo "<pre>";
			print_r ($_POST);
			echo "</pre>";*/
			
			$ins_query =  "INSERT INTO ggl_dco_daily_reporting (`State`, `District`, `DCo_id`, `ReportDate`, `EI_SchoolCode`, `Subject`,`SE_cls4`, `SE_cls6`, `SE_cls8`, 
						  `SP_cls4`, `SP_cls6`, `SP_cls8`, `PI_cls4`, `PI_cls6`, `PI_cls8`, `PU_cls4`, `PU_cls6`, `PU_cls8`, `PD_cls4`, `PD_cls6`, `PD_cls8`, 
						  `EP_cls4`, `EP_cls6`, `EP_cls8`,`EC_cls4`, `EC_cls6`, `EC_cls8`, `Remarks`, `Entered_By`) values 
						  ('" .$this->state."', '" .$this->district."', '" .$this->dcoid."', '" .formatDate($_POST["reportdate"])."','" .dotrim($_POST["eischoolcode"])."', '" .dotrim($_POST["subject"])."', 
						  '" .dotrim($_POST["SE_cls4"])."', '" .dotrim($_POST["SE_cls6"])."', '" .dotrim($_POST["SE_cls8"])."', 
						  '" .dotrim($_POST["SP_cls4"])."', '" .dotrim($_POST["SP_cls6"])."', '" .dotrim($_POST["SP_cls8"])."', 
						  '" .dotrim($_POST["PI_cls4"])."', '" .dotrim($_POST["PI_cls6"])."', '" .dotrim($_POST["PI_cls8"])."', 
						  '" .dotrim($_POST["PU_cls4"])."', '" .dotrim($_POST["PU_cls6"])."', '" .dotrim($_POST["PU_cls8"])."', 
						  '" .dotrim($_POST["PD_cls4"])."', '" .dotrim($_POST["PD_cls6"])."', '" .dotrim($_POST["PD_cls8"])."', 
						  '" .dotrim($_POST["EP_cls4"])."', '" .dotrim($_POST["EP_cls6"])."', '" .dotrim($_POST["EP_cls8"])."',
						  '" .dotrim($_POST["EC_cls4"])."', '" .dotrim($_POST["EC_cls6"])."', '" .dotrim($_POST["EC_cls8"])."', 
						  '" .dotrim($_POST["remarks"])."', '" .dotrim($this->userid)."')";
			//echo $ins_query;
			$ins_result = new dbquery($ins_query,$connid);
			$this->message = $this->subject." data for EI scchool code ".$_POST['eischoolcode']." inserted successfully...";
		}
	}
	
	function pageEditDCoDailyReport($connid)
	{
		//echo $this->userid." -- ".$this->dcoid."<br>";
		if($this->actiontoperform == "Update DCo Daily Report")
		{
			$up_query = "UPDATE `ggl_dco_daily_reporting` SET 
						`State`='" .$this->state."', `District`='" .$this->district."', `DCo_id`='" .$this->dcoid."', 
						`ReportDate`='" .formatDate($_POST["reportdate"])."', `EI_SchoolCode`='" .DoTrim($_POST["eischoolcode"])."', `Subject`='" .DoTrim($_POST["subject"])."', 
						`SE_cls4`='" .DoTrim($_POST["SE_cls4"])."', `SE_cls6`='" .DoTrim($_POST["SE_cls6"])."', `SE_cls8`='" .DoTrim($_POST["SE_cls8"])."', 
						`SP_cls4`='" .DoTrim($_POST["SP_cls4"])."', `SP_cls6`='" .DoTrim($_POST["SP_cls6"])."', `SP_cls8`='" .DoTrim($_POST["SP_cls8"])."', 
						`PI_cls4`='" .DoTrim($_POST["PI_cls4"])."', `PI_cls6`='" .DoTrim($_POST["PI_cls6"])."', `PI_cls8`='" .DoTrim($_POST["PI_cls8"])."', 
						`PU_cls4`='" .DoTrim($_POST["PU_cls4"])."', `PU_cls6`='" .DoTrim($_POST["PU_cls6"])."', `PU_cls8`='" .DoTrim($_POST["PU_cls8"])."', 
						`PD_cls4`='" .DoTrim($_POST["PD_cls4"])."', `PD_cls6`='" .DoTrim($_POST["PD_cls6"])."', `PD_cls8`='" .DoTrim($_POST["PD_cls8"])."', 
						`EP_cls4`='" .DoTrim($_POST["EP_cls4"])."', `EP_cls6`='" .DoTrim($_POST["EP_cls6"])."', `EP_cls8`='" .DoTrim($_POST["EP_cls8"])."', 
						`EC_cls4`='" .DoTrim($_POST["EC_cls4"])."', `EC_cls6`='" .DoTrim($_POST["EC_cls6"])."', `EC_cls8`='" .DoTrim($_POST["EC_cls8"])."', 
						`Remarks`='" .DoTrim($_POST["remarks"])."' WHERE id='".$this->recordid."'";
			$up_result = new dbquery($up_query,$connid);
			//echo $up_query; //exit;
			//echo $this->userid." -- ".$this->dcoid;
			//exit;
			$querystring = "userid=".base64_encode($this->userid)."&dcoid=".base64_encode($this->dcoid);
			$url="ggl_dco_reporting_add.php?".$querystring;
			echo "<script>gobacktoaddpage('".$url."')</script>";
		}
	}
	function fetchDailyReportRecord($connid)
	{
		$query = "SELECT * FROM ggl_dco_daily_reporting WHERE id=".$this->recordid;
		$result = new dbquery($query,$connid);
		$row = $result->getrowarray();
		return $row;
	}
	function fetchDcoInfo($connid)
	{
		//$this->setpostvars();
		//$this->setsessionvars();
		
		$query = "SELECT * FROM ggl_dco_state_district_mapping WHERE Userid='".$this->dcoid."' AND Designation='DCO'";
		$result = new dbquery($query,$connid);
		$row = $result->getrowarray();
		$this->fullname = $row["Fullname"];
		$this->state = $row["State"];
		$this->district = $row["District"];
	}
	
	function summaryreport2($connid)
	{
		$output_string = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='7' align='center'><b><font size='3'>Summary Report 2</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>Subject</b></td>";
		$output_string .= "<td align='center'><b>Class 4<br>Expected</b></td><td align='center'><b>Class 4<br>Tested</b></td><td align='center'><b>Class 6<br>Expected</b></td>";
		$output_string .= "<td align='center'><b>Class 6<br>Tested</b></td><td align='center'><b>Class 8<br>Expected</b></td><td align='center'><b>Class 8<br>Tested</b></td></tr>";
		
		for($si=0; $si<count($this->subjectArray); $si++)
		{
			$subject = $this->subjectArray[$si];
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$subject."</td>";
			for($cls=4; $cls<=8; $cls+=2)
			{
				$se = "SE_cls".$cls;
				$sp = "SP_cls".$cls;
				
				$query = "SELECT SUM(".$se.") AS SE FROM ggl_dco_daily_reporting WHERE DCo_id='".$this->dcoid."' AND Subject='".$subject."'";
				//echo $query."<br>";
				$result = new dbquery($query,$connid);
				$row = $result->getrowarray();
				$output_string .= "<td align='center'>".$row['SE']."</td>";
				
				$query = "SELECT SUM(".$sp.") AS SP FROM ggl_dco_daily_reporting WHERE DCo_id='".$this->dcoid."' AND Subject='".$subject."'";
				$result = new dbquery($query,$connid);
				$row = $result->getrowarray();
				$output_string .= "<td align='center'>".$row['SP']."</td>";
			}
			$output_string .= "</tr>";
		}
		
		/*$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>Total</b></td>";
		for($cls=4; $cls<=8; $cls+=2)
		{
			$se = "SE_cls".$cls;
			$sp = "SP_cls".$cls;
			
			$query = "SELECT SUM(".$se.") AS SE FROM ggl_dco_daily_reporting WHERE DCo_id='".$this->dcoid."'";
			//echo $query."<br>";
			$result = new dbquery($query,$connid);
			$row = $result->getrowarray();
			$output_string .= "<td align='center'><b>".$row['SE']."</b></td>";
			
			$query = "SELECT SUM(".$sp.") AS SP FROM ggl_dco_daily_reporting WHERE DCo_id='".$this->dcoid."'";
			$result = new dbquery($query,$connid);
			$row = $result->getrowarray();
			$output_string .= "<td align='center'><b>".$row['SP']."</b></td>";
		}
		$output_string .= "</tr>";*/
		
		$output_string .= "</table>";
		return $output_string;
	}
	
	function viewalldcodailyreporting($connid)
	{
		$output_string = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='4' align='center'><b><font size='3'>Summary Report 1</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td></td><td align='center'><b>Class 4</b></td><td align='center'><b>Class 6</b></td><td align='center'><b>Class 8</b></td></tr>";
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>Total no of classrooms tested so far in the District</b></td>";
		for($cls=4; $cls<=8; $cls+=2)
		{
			$query = "SELECT COUNT(*) FROM ggl_dco_daily_reporting WHERE DCo_id='".$this->dcoid."' AND SP_cls".$cls.">0";
			$result = new dbquery($query,$connid);
			$row = $result->getrowarray();
			$output_string .= "<td align='center'>".number_format($row['COUNT(*)']/2,1)."</td>";
		}
		$output_string .= "</tr>";
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>Total no of classrooms tested for the day</b></td>";
		for($cls=4; $cls<=8; $cls+=2)
		{
			$query = "SELECT COUNT(*) FROM ggl_dco_daily_reporting WHERE DCo_id='".$this->dcoid."' AND SP_cls".$cls.">0 AND ReportDate='".date('Y-m-d')."'";
			//echo $query;
			$result = new dbquery($query,$connid);
			$row = $result->getrowarray();
			$output_string .= "<td align='center'>".number_format($row['COUNT(*)']/2,1)."</td>";
		}
		$output_string .= "</tr>";
		
		$output_string .= "</table><br>";
		
		$summaryreport2 = $this->summaryreport2($connid);
		$output_string .= $summaryreport2."<br>";
		
		$output_string .= "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='29' align='center'><b><font size='3'>Previously Added Entries</font></b></td></tr>";
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center' colspan='6'><b>&nbsp;</b></td><td align='center' colspan='3'><b>Students Expected</b></td>";
		$output_string .= "<td align='center' colspan='3'><b>Students Present</b></td><td align='center' colspan='3'><b>Papers Issued</b></td>";
		$output_string .= "<td align='center' colspan='3'><b>Papers Used</b></td><td align='center' colspan='3'><b>Papers Damaged</b></td>";
		$output_string .= "<td align='center' colspan='3'><b>Evaluation Pending</b></td><td align='center' colspan='3'><b>Evaluation Completed</b></td>";
		$output_string .= "<td align='center' colspan='2'><b>&nbsp;</b></td></tr>";
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b> Sr No</b></td>
		<td align='center'><b> State</b></td> <td align='center'><b> District</b></td> <td align='center'><b> Report Date</b></td> <td align='center'><b> EI_SchoolCode</b></td> <td align='center'><b> Subject</b></td><td align='center'><b>4</b></td> <td align='center'><b>6</b></td> <td align='center'><b>8</b></td> <td align='center'><b>4</b></td> <td align='center'><b>6</b></td> 
		<td align='center'><b> 8</b></td> <td align='center'><b> 4</b></td> <td align='center'><b> 6</b></td> <td align='center'><b> 8</b></td> <td align='center'><b> 4</b></td> <td align='center'><b> 6</b></td> <td align='center'><b> 8</b></td> <td align='center'><b> 4</b></td> <td align='center'><b> 6</b></td> <td align='center'><b> 8</b></td> 
		<td align='center'><b> 4</b></td> <td align='center'><b> 6</b></td> <td align='center'><b> 8</b></td> <td align='center'><b> 4</b></td> <td align='center'><b> 6</b></td> <td align='center'><b> 8</b></td> <td align='center'><b> Remarks</b></td> <td align='center'><b> Entered By</b></td> </tr>";

		$srno=1;
		$query = "SELECT * FROM ggl_dco_daily_reporting WHERE DCo_id='".$this->dcoid."' ORDER BY ReportDate DESC, EI_SchoolCode, Subject";
		$result = new dbquery($query,$connid);
		while($row = $result->getrowarray())
		{
			$query_string = "recordid=".base64_encode($row['id'])."&userid=".base64_encode($this->userid)."&dcoid=".base64_encode($this->dcoid);
			$url = "ggl_dco_reporting_edit.php?".$query_string;
			
			//$url = "ggl_dco_reporting_edit.php?recordid=".$row['id']."&userid=".$this->userid."&dcoid=".$this->dcoid;
			$output_string .=   "<tr bordercolor='#FFFFFF'>
								<td align='center'><a href='".$url."'>".$srno."</a></td>
								<td align='center' nowrap>".$row["State"]."</td>
								<td align='center' nowrap>".$row["District"]."</td>
								<td align='center'>".formatDate($row["ReportDate"])."</td>
								<td align='center'>".$row["EI_SchoolCode"]."</td><td align='center'>".$row["Subject"]."</td>
								<td align='center'>".$row["SE_cls4"]."</td><td align='center'>".$row["SE_cls6"]."</td><td align='center'>".$row["SE_cls8"]."</td><td align='center'>".$row["SP_cls4"]."</td>
								<td align='center'>".$row["SP_cls6"]."</td><td align='center'>".$row["SP_cls8"]."</td><td align='center'>".$row["PI_cls4"]."</td><td align='center'>".$row["PI_cls6"]."</td>
								<td align='center'>".$row["PI_cls8"]."</td><td align='center'>".$row["PU_cls4"]."</td><td align='center'>".$row["PU_cls6"]."</td><td align='center'>".$row["PU_cls8"]."</td>
								<td align='center'>".$row["PD_cls4"]."</td><td align='center'>".$row["PD_cls6"]."</td><td align='center'>".$row["PD_cls8"]."</td><td align='center'>".$row["EP_cls4"]."</td>
								<td align='center'>".$row["EP_cls6"]."</td><td align='center'>".$row["EP_cls8"]."</td><td align='center'>".$row["EC_cls4"]."</td><td align='center'>".$row["EC_cls6"]."</td>
								<td align='center'>".$row["EC_cls8"]."</td><td align='center' nowrap>".$row["Remarks"]."</td><td align='center'>".$row["Entered_By"]."</td>
								</tr>";
			$srno++;
		}
		$output_string .= "</table>";
		return $output_string;
	}
	
	function overallsummaryreport($connid)
	{
		$output_string = "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='7' align='center'><b><font size='3'>Overall Summary Report</font></b></td></tr>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>Subject</b></td>";
		$output_string .= "<td align='center'><b>Class 4<br>Expected</b></td><td align='center'><b>Class 4<br>Tested</b></td><td align='center'><b>Class 6<br>Expected</b></td>";
		$output_string .= "<td align='center'><b>Class 6<br>Tested</b></td><td align='center'><b>Class 8<br>Expected</b></td><td align='center'><b>Class 8<br>Tested</b></td></tr>";
		
		for($si=0; $si<count($this->subjectArray); $si++)
		{
			$subject = $this->subjectArray[$si];
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$subject."</td>";
			for($cls=4; $cls<=8; $cls+=2)
			{
				$se = "SE_cls".$cls;
				$sp = "SP_cls".$cls;
				
				$query = "SELECT SUM(".$se.") AS SE FROM ggl_dco_daily_reporting WHERE Subject='".$subject."'";
				//echo $query."<br>";
				$result = new dbquery($query,$connid);
				$row = $result->getrowarray();
				$output_string .= "<td align='center'>".$row['SE']."</td>";
				
				$query = "SELECT SUM(".$sp.") AS SP FROM ggl_dco_daily_reporting WHERE Subject='".$subject."'";
				$result = new dbquery($query,$connid);
				$row = $result->getrowarray();
				$output_string .= "<td align='center'>".$row['SP']."</td>";
			}
			$output_string .= "</tr>";
		}
		
		$output_string .= "</table><br>";
		
		$stateArray = array();
		$st_query = "SELECT DISTINCT State FROM ggl_dco_daily_reporting ORDER BY State";
		$st_result = new dbquery($st_query,$connid);
		while($st_row = $st_result->getrowarray())
		{
			array_push($stateArray,$st_row['State']);
		}
		
		$totalStates = count($stateArray);
		$output_string .= "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='8' align='center'><b><font size='3'>State Wise Summary Report</font></b></td></tr>";
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>State</b></td><td align='center'><b>Subject</b></td>";
		$output_string .= "<td align='center'><b>Class 4<br>Expected</b></td><td align='center'><b>Class 4<br>Tested</b></td><td align='center'><b>Class 6<br>Expected</b></td>";
		$output_string .= "<td align='center'><b>Class 6<br>Tested</b></td><td align='center'><b>Class 8<br>Expected</b></td><td align='center'><b>Class 8<br>Tested</b></td></tr>";		
		
		for($st=0; $st<$totalStates; $st++)
		{
			$state = $stateArray[$st];			
			for($si=0; $si<count($this->subjectArray); $si++)
			{
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$state."</td>";
				$subject = $this->subjectArray[$si];
				$output_string .= "<td align='center'>".$subject."</td>";
				for($cls=4; $cls<=8; $cls+=2)
				{
					$se = "SE_cls".$cls;
					$sp = "SP_cls".$cls;
					
					$query = "SELECT SUM(".$se.") AS SE FROM ggl_dco_daily_reporting WHERE Subject='".$subject."' AND State='".$state."'";
					//echo $query."<br>";
					$result = new dbquery($query,$connid);
					$row = $result->getrowarray();
					$output_string .= "<td align='center'>".$row['SE']."</td>";
					
					$query = "SELECT SUM(".$sp.") AS SP FROM ggl_dco_daily_reporting WHERE Subject='".$subject."' AND State='".$state."'";
					$result = new dbquery($query,$connid);
					$row = $result->getrowarray();
					$output_string .= "<td align='center'>".$row['SP']."</td>";
				}
				$output_string .= "</tr>";
			}
		}
		$output_string .= "</table><br>";
		
		$stateArray = array();
		$st_query = "SELECT DISTINCT State FROM ggl_dco_daily_reporting ORDER BY State";
		$st_result = new dbquery($st_query,$connid);
		while($st_row = $st_result->getrowarray())
		{
			array_push($stateArray,$st_row['State']);
		}
		
		$totalStates = count($stateArray);
		$output_string .= "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='9' align='center'><b><font size='3'>District Wise Summary Report</font></b></td></tr>";
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>State</b></td><td align='center'><b>District</b></td><td align='center'><b>Subject</b></td>";
		$output_string .= "<td align='center'><b>Class 4<br>Expected</b></td><td align='center'><b>Class 4<br>Tested</b></td><td align='center'><b>Class 6<br>Expected</b></td>";
		$output_string .= "<td align='center'><b>Class 6<br>Tested</b></td><td align='center'><b>Class 8<br>Expected</b></td><td align='center'><b>Class 8<br>Tested</b></td></tr>";		
		
		for($st=0; $st<$totalStates; $st++)
		{
			$state = $stateArray[$st];			
			$distArray = array();
			$dt_query = "SELECT DISTINCT District FROM ggl_dco_daily_reporting WHERE State='".$state."' ORDER BY District";
			$dt_result = new dbquery($dt_query,$connid);
			while($dt_row = $dt_result->getrowarray())
			{
				$district = $dt_row['District'];
				for($si=0; $si<count($this->subjectArray); $si++)
				{
					$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$state."</td><td align='center'>".$district."</td>";
					$subject = $this->subjectArray[$si];
					$output_string .= "<td align='center'>".$subject."</td>";
					for($cls=4; $cls<=8; $cls+=2)
					{
						$se = "SE_cls".$cls;
						$sp = "SP_cls".$cls;
						
						$query = "SELECT SUM(".$se.") AS SE FROM ggl_dco_daily_reporting WHERE Subject='".$subject."' AND District='".$district."'";
						//echo $query."<br>";
						$result = new dbquery($query,$connid);
						$row = $result->getrowarray();
						$output_string .= "<td align='center'>".$row['SE']."</td>";
						
						$query = "SELECT SUM(".$sp.") AS SP FROM ggl_dco_daily_reporting WHERE Subject='".$subject."' AND District='".$district."'";
						$result = new dbquery($query,$connid);
						$row = $result->getrowarray();
						$output_string .= "<td align='center'>".$row['SP']."</td>";
					}
					$output_string .= "</tr>";
				}
			}
		}
		$output_string .= "</table><br>";
		
		$output_string .= "<table border=1 align='center' bordercolor='#333333' style='border-collapse: collapse'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='6' align='center'><b><font size='3'>District Wise Summary Report - Classrooms</font></b></td></tr>";
		
		$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'><b>State</b></td><td align='center'><b>District</b></td>";
		$output_string .= "<td align='center'><b>Expected<br>Classrooms</td>";		
		$output_string .= "<td align='center'><b>Class 4</b></td><td align='center'><b>Class 6</b></td>";
		$output_string .= "<td align='center'><b>Class 8</td></tr>";		
		for($st=0; $st<$totalStates; $st++)
		{
			$state = $stateArray[$st];			
			$distArray = array();
			$dt_query = "SELECT DISTINCT District FROM ggl_dco_daily_reporting WHERE State='".$state."' ORDER BY District";
			$dt_result = new dbquery($dt_query,$connid);
			while($dt_row = $dt_result->getrowarray())
			{
				$district = $dt_row['District'];
				$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$state."</td><td align='center'>".$district."</td>";
				$subject = $this->subjectArray[$si];
				$output_string .= "<td align='center'>&nbsp;</td>";
				for($cls=4; $cls<=8; $cls+=2)
				{
					$query = "SELECT COUNT(*) FROM ggl_dco_daily_reporting WHERE District='".$district."' AND SP_cls".$cls.">0";
					$result = new dbquery($query,$connid);
					$row = $result->getrowarray();
					$output_string .= "<td align='center'>".number_format($row['COUNT(*)']/2,1)."</td>";
				}
				$output_string .= "</tr>";
			}
		}
		$output_string .= "</table>";
		return $output_string;
	}
}
?>
