<?php
class cls_exit_interview
{
	var $interview_id;
	var $fullname;
	var $supervisor;
	var $designation;
	var $sbu;
	var $date_of_joining;
	var $date_of_leaving;
	var $userID;
	var $parameter;
	var $action;
	var $question;
	var $answer;
	var $comments;
	var $hr_comments;
	var $manager_comments;
	var $entered_by;
	var $entered_date;
	var $status;
	var $reason;
	var $tenure;
	var $return_decision;
	var $recommend_others;
	var $publishing_decision;
	var $learning_recommendations;
	var $reason_id;
	var $assign_to;
	function cls_exit_interview()
	{
		$this->interview_id = "";
		$this->fullname = "";
		$this->date_of_joining = "";
		$this->date_of_leaving = "";
		$this->supervisor ="";
		$this->sbu = "";
		$this->userID = "";
		$this->parameter = "";
		$this->comments = "";
		$this->action = "";
		$this->status = "";
		$this->hr_comments = "";
		$this->manager_comments="";
		$this->entered_by = "";
		$this->entered_date = "";
		$this->question = "";
		$this->answer = "";
		$this->reason = array();
		$this->tenure = "";
		$this->publishing_decision = "";
		$this->learning_recommendations = "";
		$this->reason_id="";
		$this->assign_to="";
	}
	function setpostvars()
	{
		if(isset($_POST["cls_exit_interview_tenure"])) $this->tenure = $_POST["cls_exit_interview_tenure"];
		if(isset($_POST["cls_exit_interview_reason"])) $this->reason = $_POST["cls_exit_interview_reason"];
		if(isset($_POST["cls_exit_interview_parameter"])) $this->parameter = $_POST["cls_exit_interview_parameter"];
		if(isset($_POST["cls_exit_interview_comments"])) $this->comments = $_POST["cls_exit_interview_comments"];
		if(isset($_POST["cls_exit_interview_question"])) $this->question = $_POST["cls_exit_interview_question"];
		if(isset($_POST["cls_exit_interview_return_decision"])) $this->return_decision = $_POST["cls_exit_interview_return_decision"];
		if(isset($_POST["cls_exit_interview_recommend_others"])) $this->recommend_others = $_POST["cls_exit_interview_recommend_others"];
		if(isset($_POST["cls_exit_interview_publish"])) $this->publishing_decision = $_POST["cls_exit_interview_publish"];
		if(isset($_POST["cls_exit_interview_hr_comments"])) $this->hr_comments = $_POST["cls_exit_interview_hr_comments"];
		if(isset($_POST["cls_exit_interview_manager_comments"])) $this->manager_comments = $_POST["cls_exit_interview_manager_comments"];
		if(isset($_POST["cls_exit_interview_learning_recommendations"])) $this->learning_recommendations =$_POST["cls_exit_interview_learning_recommendations"];
		if(isset($_POST["assign_to"])) $this->assign_to = $_POST["assign_to"];
		if(isset($_POST["assign_manager_to"])) $this->assign_manager_to=$_POST["assign_manager_to"];
		if(isset($_POST["assign_manager_dt"])) $this->assign_manager_dt=$_POST["assign_manager_dt"];
		if(isset($_POST["assign_dt"]))$this->assign_dt=$_POST["assign_dt"];
		if(isset($_POST["cls_exit_interview_hdnaction"])) $this->action = $_POST["cls_exit_interview_hdnaction"];
	}
	function setgetvars()
	{
		if(isset($_GET["interview_id"])) $this->interview_id = $_GET["interview_id"];
		
		if(isset ($_GET["id"])) $this->userID= $_GET["id"];
	    	 $user=base64_decode($this->userID);
	   $userarray=explode("`",$user);
        	 $this->interviewid= $userarray[0]; 
        	 $this->name=$userarray[1];
	}
	function pageAddEditExitInterview($connid,$interview_id)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action == "SubmitToHR")
		{
			
			$this->saveData($connid);
			echo "<div align='center'>Exit Interview has been sucessfully submitted</div>";         
		}
	   if($this->action =="SaveData")
	    {  
		   
			$this->updateStatus($connid,$interview_id);
			header("Location:add_edit_exit_interview.php?interview_id=$interview_id");
			
			
		}
	}
	/* Assign Exit interview */
	function assignsubmit($connid,$interview_id)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action =="submit")
		{
			$this->saveassigntoHR($connid);
		}
		if($this->action=="submit_manager")
		{
			$this->saveassigntomanager($connid);
		}
	}
	/* Exit Interview Assign To Manager */ 
	function saveassigntomanager($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
	    $query="UPDATE exit_interview_details SET assign_manager = '".$this->assign_manager_to."' ,assign_manager_dt='".$this->assign_manager_dt."' where interview_id='". $this->interview_id."'";
		$dbquery = new dbquery($query, $connid);
	}
	function getGeneralInformation($connid)
	{
		$this->setgetvars();
		if(isset($this->interview_id) && $this->interview_id > 0)
		{
		 	$query = "SELECT firstName,lastName,desig,fullname,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,DATE_FORMAT(leftDate,'%d-%m-%Y') as leftDate,sbu_fullname FROM emp_master a,marketing b,sbu_master c,exit_interview_details d WHERE a.adminReportingTo = b.name AND a.empl_sbu_id = c.srno AND a.userID = d.userID AND interview_id = '".$this->interview_id."' ";	
			$query .= " UNION SELECT firstName,lastName,desig,fullname,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,DATE_FORMAT(contract_leftDate,'%d-%m-%Y') as leftDate,sbu_fullname FROM contract_master a,marketing b,sbu_master c,exit_interview_details d WHERE a.adminReportingTo = b.name AND a.empl_sbu_id = c.srno AND a.userID = d.userID AND interview_id = '".$this->interview_id."' ";	
		}
		else
		{
		
			
			$query = "SELECT firstName,lastName,desig,fullname,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,DATE_FORMAT(leftDate,'%d-%m-%Y') as leftDate,sbu_fullname FROM emp_master a,marketing b,sbu_master c WHERE a.adminReportingTo = b.name AND a.empl_sbu_id = c.srno AND userID = '".$this->name."' ";
			$query .= " UNION SELECT firstName,lastName,desig,fullname,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,DATE_FORMAT(contract_leftDate,'%d-%m-%Y') as leftDate,sbu_fullname FROM contract_master a,marketing b,sbu_master c WHERE a.adminReportingTo = b.name AND a.empl_sbu_id = c.srno AND userID = '".$this->name."' ";
		}
	//	echo $query;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->fullname = $row["firstName"]." ".$row["lastName"];
		$this->supervisor = $row["fullname"];
		$this->date_of_joining = $row["joinDate"];
		$this->date_of_leaving = $row["leftDate"];
		$this->sbu = $row["sbu_fullname"];
		$this->designation = $row["desig"];
		if($this->interview_id == "")
			$this->interview_id = $this->getInterviewID($connid);
	}
	function checkDuplication($connid)
	{
		$query = "SELECT COUNT(*) FROM exit_interview_details WHERE userID = '".$this->name."' AND status = 'pending' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getInterviewID($connid)
	{
		$this->setgetvars();
		$query = "SELECT interview_id FROM exit_interview_details WHERE userID = '".$this->name."'  ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["interview_id"];
	}
    /* Update Status */
	function updateStatus($connid,$interview_id)
	{
		$arrHR =$this->getHRlist($connid);
		$arrManager =$this->getSBUHeads($connid);
		$query="select * from exit_interview_details where interview_id='".$interview_id."'" ;
		$dbquery = new dbquery($query,$connid); 
		$row=$row = $dbquery->getrowarray();
	    if(in_array($_SESSION["username"],$arrHR))
	    {
	     	if($row['hr_comments_by']== "" && $row['exit_interview_done_by']=="")
		 	{
	  	 		$query ="UPDATE exit_interview_details SET hr_comments = '".$this->hr_comments."',hr_comments_by='".$_SESSION['username']."' WHERE interview_id = '".$interview_id."' LIMIT 1";
		 		$dbquery = new dbquery($query,$connid);
	     	}
	  		elseif($row['hr_comments_by'] =="" && $row['exit_interview_done_by']!="")
	     	{
	   	    	$query ="UPDATE exit_interview_details SET hr_comments = '".$this->hr_comments."',hr_comments_by='".$_SESSION['username']."',status='Completed' WHERE interview_id = '".$interview_id."' LIMIT 1";
		 		$dbquery = new dbquery($query,$connid);
				$this->sendMailer($connid,$interview_id);
				
	     	}
	  	}
	 	elseif(in_array($_SESSION["username"],$arrManager))
	  	{
	     	if($row['exit_interview_done_by']== "" && $row['hr_comments_by']== "")
			{
	  	 		$query ="UPDATE exit_interview_details SET  manager_comments ='".$this->manager_comments."',exit_interview_done_by='".$_SESSION['username']."' WHERE interview_id = '".$interview_id."' LIMIT 1";
		 $dbquery = new dbquery($query,$connid);
	     	}
	  		elseif($row['hr_comments_by'] !="" && $row['exit_interview_done_by']=="")
	     	{
	   	   		$query ="UPDATE exit_interview_details SET  manager_comments ='".$this->manager_comments."',exit_interview_done_by='".$_SESSION['username']."',status='Completed' WHERE interview_id = '".$interview_id."' LIMIT 1";
		 		$dbquery = new dbquery($query,$connid);
				$this->sendMailer($connid,$interview_id);
	     	}
	  	}
	}
	/* Exit Interview Assign To HR */
	function saveassigntoHR($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$query=" UPDATE exit_interview_details SET assign_to = '".$this->assign_to."',assign_dt='".$this->assign_dt."' WHERE interview_id = '". $this->interview_id."'";
		$dbquery = new dbquery($query, $connid);
		/*$this->sendMailer(); */
	}
	/* save Exit Interview Form  */
	function saveData($connid)
	{
		$query="SELECT * FROM exit_interview_details where userID='".$this->name."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$interview_id=$row["interview_id"];
		if(is_array($this->reason) && count($this->reason) >0)
		{
			$reason = implode(",",$this->reason);
		}
			$query = "UPDATE exit_interview_details  SET tenure = '".$this->tenure."',return_decision = '".$this->return_decision."',recommend_others = '".$this->recommend_others."',publishing_decision = '".$this->publishing_decision."',learning_recommendations = '".$this->learning_recommendations."',entered_date = CURDATE(),entered_by = '".$this->name."'  WHERE interview_id='".$interview_id."'  AND userID='".$this->name."' ";
			$dbquery = new dbquery($query,$connid);
			$this->saveReasons($connid,$interview_id);
			$this->saveParameters($connid,$interview_id);
			$this->saveTypeComments($connid,$interview_id);
			$this->saveQuestions($connid,$interview_id);
	}
	function saveReasons($connid,$interview_id)
	{
		if(is_array($this->reason) && count($this->reason) >0)
		{
			$this->deleteReasons($connid,$interview_id);
			foreach($this->reason as $key => $reason_id)
			{
				$query = "INSERT INTO exit_interview_reason_details SET interview_id = '".$interview_id."',reason_id = '".$reason_id."',entered_by = '".$this->name."',entered_date = CURDATE() ";
				$dbquery = new dbquery($query,$connid);	
			}
		}
	}
	function deleteReasons($connid,$interview_id)
	{
		$query_count = "SELECT COUNT(*) FROM exit_interview_reason_details WHERE interview_id = '".$interview_id."' ";
		$dbquery_count = new dbquery($query_count,$connid);
		$row_count = $dbquery_count->getrowarray();
		if($row_count[0] > 0)
		{
			$query = "DELETE FROM exit_interview_reason_details WHERE interview_id = '".$interview_id."' ";
			$result = mysql_query($query) or die(mysql_error());
		}		
	}
	function saveParameters($connid,$interview_id)
	{
		if(is_array($this->parameter) && count($this->parameter) >0 && $interview_id > 0)
		{
			foreach ($this->parameter as $parameter_id => $rating)
			{
				$query_count = "SELECT COUNT(*) FROM exit_interview_rating_details WHERE interview_id = '".$interview_id."' AND parameter_id = '".$parameter_id."' ";
				$dbquery_count = new dbquery($query_count,$connid);
				$row_count = $dbquery_count->getrowarray();
				if($row_count[0] == 0)
				{
					$query = "INSERT INTO exit_interview_rating_details SET interview_id = '".$interview_id."',parameter_id = '".$parameter_id."',rating = '".$rating."',entered_by = '".$this->name."',entered_date = CURDATE()  ";
					$dbquery = new dbquery($query,$connid);	
				}
				else
				{
					$query = "UPDATE exit_interview_rating_details SET rating = '".$rating."' WHERE interview_id = '".$interview_id."' AND parameter_id = '".$parameter_id."' ";
					$dbquery = new dbquery($query,$connid);	
				}
			}
		}
	}
	function saveTypeComments($connid,$interview_id)
	{
		if(is_array($this->comments) &&  count($this->comments) >0)
		{
			foreach($this->comments as $type_id => $comments)
			{
				$query_count = "SELECT COUNT(*) FROM exit_interview_type_comments WHERE interview_id = '".$interview_id."' AND type_id = '".$type_id."' ";
				$result_count = mysql_query($query_count) or die(mysql_error());
				$row_count = mysql_fetch_array($result_count);
				if($row_count[0] == 0)
				{
					$query = "INSERT INTO exit_interview_type_comments SET interview_id = '".$interview_id."',type_id = '".$type_id."',comments = '".$comments."' ";	
					$dbquery = new dbquery($query,$connid);
				}
				else
				{
					$query = "UPDATE exit_interview_type_comments SET comments = '".$comments."' WHERE interview_id = '".$interview_id."' AND type_id = '".$type_id."' ";
					$dbquery = new dbquery($query,$connid);	
				}
			}
		}
	}
	function saveQuestions($connid,$interview_id)
	{
		if(is_array($this->question) && count($this->question) >0)
		{
			foreach ($this->question as $question_id => $answer)
			{
				$query_count = "SELECT COUNT(*) FROM exit_interview_question_answer WHERE interview_id = '".$interview_id."' AND question_id = '".$question_id."' ";
				$result_count = mysql_query($query_count) or die(mysql_error());
				$row_count = mysql_fetch_array($result_count);
				if($row_count[0] == 0)
				{
					$query = "INSERT INTO exit_interview_question_answer SET interview_id = '".$interview_id."',question_id = '".$question_id."',answer = '".$answer."'";
					$dbquery = new dbquery($query,$connid);
				}
				else
				{
					$query = "UPDATE exit_interview_question_answer SET answer = '".$answer."' WHERE interview_id = '".$interview_id."' AND question_id = '".$question_id."' ";
					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}
	function fetchReasons($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM exit_interview_leaving_reasons WHERE 1 = 1 ORDER BY reason_id";
		$dbquery = new dbquery($query,$connid);
		$i = 1;
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["reason_id"]] = array("reason_id"=>$row["reason_id"],"reason"=>$row["reason"]);
			$i++;
		}
		return $arrRet;
	}
	function fetchTypes($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM exit_interview_parameter_type ORDER BY order_num";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["type_id"]] = array("type_id"=>$row["type_id"],
											"description"=>	$row["description"]
									);
		}
		return $arrRet;
	}
	function fetchParametersByType($connid,$type_id)
	{
		$arrRet = array();
		$query = "SELECT * FROM exit_interview_parameter_master WHERE type_id = '".$type_id."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["parameter_id"]] = $row["parameter"];
		}
		return $arrRet;		
	}
	function fetchQuestions($connid)
	{
		$arrRet = array();
		$query = "SELECT * FROM exit_questionaire_master";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["question_id"]] = $row["question"];
		}
		return $arrRet;
	}
	function getInterviewDetails($connid,$interview_id)
	{
		$this->setgetvars();
		$arrRet = array();
		if(isset($this->interview_id) && $this->interview_id > 0)
		{
			$query = "SELECT * FROM exit_interview_details WHERE interview_id='".$this->interview_id."' ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
			 $arrRet["userID"] = $row["userID"];
			 $arrRet["tenure"] = $row["tenure"];
			 $arrRet["return_decision"] = $row["return_decision"];
			 $arrRet["recommend_others"] = $row["recommend_others"];
			 $arrRet["publishing_decision"] = $row["publishing_decision"];
			 $arrRet["hr_comments"] = $row["hr_comments"];
			 $arrRet["manager_comments"] = $row["manager_comments"];
			 $arrRet["learning_recommendations"] = $row["learning_recommendations"];
			 $arrRet["exit_interview_done_by"] = $row["exit_interview_done_by"];
			 $arrRet["status"] = $row["status"];
			}
		}
		else
		{
			$query = "SELECT * FROM exit_interview_details WHERE userID='".$this->name."' ";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
			 $arrRet["userID"] = $row["userID"];
			 $arrRet["tenure"] = $row["tenure"];
			 $arrRet["return_decision"] = $row["return_decision"];
			 $arrRet["recommend_others"] = $row["recommend_others"];
			 $arrRet["publishing_decision"] = $row["publishing_decision"];
			 $arrRet["hr_comments"] = $row["hr_comments"];
			 $arrRet["manager_comments"] = $row["manager_comments"];
			 $arrRet["learning_recommendations"] = $row["learning_recommendations"];
			 $arrRet["exit_interview_done_by"] = $row["exit_interview_done_by"];
			 $arrRet["status"] = $row["status"];
			}
        }
		return $arrRet;
	
     }
	function getInterviewQuestionDetails($connid,$interview_id)
	{
		$arrRet = array();
		$query = "SELECT * FROM exit_interview_question_answer WHERE interview_id = '".$interview_id."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["question_id"]] = $row["answer"];
		}
		return $arrRet;
	}
	function getInterviewRatingDetails($connid,$interview_id)
	{
		$arrRet = array();
		$query = "SELECT * FROM exit_interview_rating_details WHERE interview_id = '".$interview_id."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["parameter_id"]] = $row["rating"];
		}
		return $arrRet;
	}
	function getInterviewReasonDetails($connid,$interview_id)
	{
		
		$query = "SELECT * FROM exit_interview_reason_details WHERE interview_id = '".$interview_id."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = $row["reason_id"];
			
		}
		return $arrRet;
	}
	function getInterviewComments($connid,$interview_id)
	{
		$arrRet = array();
		$query = "SELECT * FROM exit_interview_type_comments WHERE interview_id = '".$interview_id."'";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$arrRet[$row["type_id"]] = $row["comments"];	
		}
		return $arrRet;
	}
	function getAllreasons($connid)
	{
		$reason=array();
		$query="SELECT a.*,f.*,d.* from exit_interview_leaving_reasons f , exit_interview_reason_details d,exit_interview_details a WHERE f.reason_id=d.reason_id AND a.interview_id=d.interview_id  ";
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$reason[$row["interview_id"]][$row["reason_id"]]= $row["reason"];	
		}
		return $reason;
	}
	/* Get SBU Manager */
    function getSBUHeads($connid)
    {
	$arrSbuHeadDetails = array();
	$query_sbu = "SELECT  a.firstname,a.lastname,a.userID ,b.srno,b.sbu_head FROM  emp_master a,sbu_master b where a.userID=b.sbu_head group by sbu_head";
	$result_sbu = mysql_query($query_sbu) or die(mysql_error());
	while($row_sbu = mysql_fetch_array($result_sbu))
	{
		$arrSbuHeadDetails[$row_sbu["srno"]] = $row_sbu["sbu_head"];
	}
	return $arrSbuHeadDetails;
   }
   /* get HR list */
   function getHRlist($connid)
   {
   		$arrHR=array();
		$query_HR ="SELECT userID from emp_master where empl_sbu_id ='10' group by userID";
		$result_HR=mysql_query($query_HR) or die(mysql_error());
		while($row_HR=mysql_fetch_array($result_HR))
		{
			$arrHR[]=$row_HR["userID"];
		
		}
	    return $arrHR;
   }
   
   #Exit interview Form mail to manager 
	function sendMailer($connid,$interview_id)
	{
	$query = "SELECT a.*,firstName,lastName,emailComp,adminReportingTo FROM exit_interview_details a,emp_master b WHERE  a.interview_id='".$interview_id."' AND a.userID=b.userID";
	
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	$fullname = $row["firstName"]." ".$row["lastName"];
	
	$query_manager="SELECT firstName,lastName,emailComp from emp_master where userID='".$row["adminReportingTo"]."'";
	$result_manager=mysql_query($query_manager);
	$row_manager=mysql_fetch_array($result);
	$managerEmail=$row_manager["emailComp"];
	$managername=$row_manager["firstName"]." ".$row_manager["lastName"];
	
	
	
	$message="<table align=\"center\" cellpadding=\"5\" cellspacing=\"1\" bgcolor=\"#CCCCCC\"><tr bgcolor=\"#FFFFFF\"><td><p>Date : ".date("d-m-Y")."</p><br><br>";
	$message.="<p>Dear <b>".$managername."</b>,</p>";
	$message.="<p>  Exit interview of  '".$fullname."' is Completed <br></p>";
	$message.="<p>You can view-  <a href='".CONSTANT("SITEURL")."empdb/view_exit_interviewform.php?interview_id=".$interview_id."' target='_blank'>Exit Interview Form of '".$fullname."' </a></p>";
	//$message.="<p></p>";
	if(strtoupper(substr(PHP_OS,0,3)=='WIN')) 
	{
	  $eol="\r\n";
	} 
	elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) 
	{
	  $eol="\r";
	} 
	else 
	{
	  $eol="\n";
	}
$headers= "MIME-Version: 1.0$eol";
$headers.="Content-type: text/html; charset=iso-8859-1$eol";
$headers.= "From: System<system@ei-india.com>$eol";
$headers.= "cc: sudhir.prajapati@ei-india.com$eol";
$subject ="Exit Interview Completed";
$to = $managerEmail;
	if(mail($to,$subject,$message,$headers))
	{
		echo "Mail Sent successfully";
	}
	else
	{
		echo "Mail failed";
	}
	
	
	return $message;
}
	function getAllInterviewDetails($connid)
	{
	  	/*
	  	$query = "SELECT a.*,firstName,lastName,adminReportingTo,DATE_FORMAT(leftdate,'%d-%m-%y') as leftdate,h.sbu_fullname,DATE_FORMAT(appliedDate,'%d-%m-%Y') as appliedDate FROM exit_interview_details a,emp_master b,emp_resignation_details e,sbu_master h,exit_interview_reason_details d,exit_interview_leaving_reasons f WHERE b.empl_sbu_id = h.srno AND a.userID = b.userID AND a.userID = e.userID ";
		$query .= "UNION SELECT c.*,firstName,lastName,h.sbu_fullname,DATE_FORMAT(leftdate,'%d-%m-%y') as leftdate,adminReportingTo,DATE_FORMAT(appliedDate,'%d-%m-%Y') as appliedDate FROM exit_interview_details c,old_emp_master d,emp_resignation_details f,sbu_master h WHERE d.empl_sbu_id = h.srno AND c.userID = d.userID AND c.userID = f.userID ";
		$query .= "UNION SELECT a.*,firstName,lastName,h.sbu_fullname,DATE_FORMAT(b.contract_leftDate,'%d-%m-%y') as leftdate,adminReportingTo,DATE_FORMAT(appliedDate,'%d-%m-%Y') as appliedDate FROM exit_interview_details a,contract_master b,emp_resignation_details e,sbu_master h WHERE b.empl_sbu_id = h.srno AND a.userID = b.userID AND a.userID = e.userID ";
		$query .= "UNION SELECT c.*,firstName,lastName,h.sbu_fullname,adminReportingTo,DATE_FORMAT(d.contract_leftDate,'%d-%m-%y') as leftdate,DATE_FORMAT(appliedDate,'%d-%m-%Y') as appliedDate FROM exit_interview_details c,old_contract_master d,emp_resignation_details f, sbu_master h WHERE d.empl_sbu_id = h.srno AND c.userID = d.userID AND c.userID = f.userID ";
		*/
	  	$query = "SELECT a.*,firstName,lastName,adminReportingTo,DATE_FORMAT(leftdate,'%d-%m-%y') as leftdate,h.sbu_fullname,DATE_FORMAT(appliedDate,'%d-%m-%Y') as appliedDate FROM exit_interview_details a,emp_master b,emp_resignation_details e,sbu_master h,exit_interview_reason_details d,exit_interview_leaving_reasons f WHERE b.empl_sbu_id = h.srno AND a.userID = b.userID AND a.userID = e.userID ";
		$query .= "UNION SELECT a.*,firstName,lastName,h.sbu_fullname,DATE_FORMAT(b.contract_leftDate,'%d-%m-%y') as leftdate,adminReportingTo,DATE_FORMAT(appliedDate,'%d-%m-%Y') as appliedDate FROM exit_interview_details a,contract_master b,emp_resignation_details e,sbu_master h WHERE b.empl_sbu_id = h.srno AND a.userID = b.userID AND a.userID = e.userID ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
}
?> 