<?
class clstgfeedback
{
	var $id;
	var $feedback;
	var $response;
	var $approve;
    var $entered_dt;
	var $action;
	var $status;
	function setpostvars()
	{
		if(isset($_POST["clstgfeedback_hdnaction"])) $this->action = $_POST["clstgfeedback_hdnaction"];
		if(isset($_POST["clstgfeedback_feedback"])) $this->feedback = $_POST["clstgfeedback_feedback"];
		if(isset($_POST["clstgfeedback_approve"])) $this->approve = $_POST["clstgfeedback_approve"];
		if(isset($_POST["clstgfeedback_response"])) $this->response = $_POST["clstgfeedback_response"];
	}
	function setgetvars()
	{
		if(isset($_GET["status"])) $this->status = $_GET["status"];
	}
	function pageFeedBack($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action == "savedata")
		{
			$this->savedata($connid);
			$this->mailFeedBack($connid);
		}
		if($this->action == "SaveResponse" || $this->action == "SaveApprove")
		{
			$this->saveResponse($connid);
		}
		if($this->action == "Approve")
		{
			$this->ApproveResponses($connid);
		}
		//print_r($this->approve);
		//print_r($this->response);
	}
	function saveResponse($connid)
	{
		if(is_array($this->approve) && count($this->approve)>0)
		{
			foreach($this->approve as $id)
			{
				if($this->response[$id] != "")
				{
					if($this->action == "SaveResponse")
					{
						$query = "UPDATE tg_feedback SET response = '".$this->response[$id]."',status = '1',entered_by='".$_SESSION["username"]."',response_date = NOW() WHERE id = '".$id."' LIMIT 1";		
					}
					elseif($this->action == "SaveApprove")
					{
						$query = "UPDATE tg_feedback SET response = '".$this->response[$id]."',modified_by='".$_SESSION["username"]."',modified_date = NOW() WHERE id = '".$id."' LIMIT 1";		
					}
					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}
	function savedata($connid)
	{
		$query = "INSERT INTO tg_feedback SET feedback = '".$this->feedback."',teacher_userid = '".$_SESSION["userid"]."',entered_date = NOW() ";
		$dbquery = new dbquery($query,$connid);
	}
	function mailFeedBack($connid)
	{
		$message = "";
		$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers.= "From: system@ei-india.com\r\n";
		$headers.= "Cc: vishnu@ei-india.com,nishchal@ei-india.com,jaspreet.chhabra@ei-india.com,kevin.george@ei-india.com\r\n";
		$subject="TG User Feedback";
		$to = "ts@ei-india.com"; 
		//$to = "jaspreet.chhabra@ei-india.com"; 
		$username = $this->getTeacherUsername($connid);
		$schoolname = $this->getSchoolNameByUsrename($connid);
		$message= "<table border=1><tr><td colspan=2>TG User Feed Back</td></tr>";
		$message.="<tr><td>Username</td><td>".$username."</td></tr>";
		$message.="<tr><td>School Name (City)</td><td>".$schoolname."</td></tr>";
		$message.="<tr><td>FeedBack</td><td>".$this->feedback."</td></tr>"; 
		$message.="</table>";
		if(mail($to,$subject,$message,$headers))
		{
			echo "Mail Sent successfully";
		}
		else 
		{
			echo "Mail failed";
		}
	}
	function getTeacherUsername($connid)
    {
      $query = "SELECT username FROM tg_teacherdetails WHERE teacher_id =  '".$_SESSION["userid"]."'";
      $dbquery = new dbquery($query,$connid);
      $row = $dbquery->getrowarray();
      return $row["username"];
    }
	function getTeacherFeedBack($connid)
	{
		$arrRet = array();
		$query = "SELECT *,DATE_FORMAT(entered_date,'%d-%m-%Y') as entereddt FROM tg_feedback WHERE teacher_userid = '".$_SESSION["userid"]."' ORDER BY id DESC";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["id"]] = array("id"=>$row["id"],
										"feedback"=>$row["feedback"],		
										"response"=>$row["response"],
										"entereddt"=>$row["entereddt"],
										"status"=>$row["status"]
			);
		}
		return $arrRet;
	}
	function getAllTeacherFeedBack($connid)
	{
		$arrRet = array();
		$condition = "AND status = '".$this->status."'";
		if($this->status == "All")
			$condition = "";
		$query = "SELECT id,feedback,response,seen,username,status,school_code,schoolname,email,DATE_FORMAT(entered_date,'%d-%m-%Y') as entereddt FROM tg_feedback,tg_teacherdetails,schools WHERE 1 = 1 ".$condition." AND tg_feedback.teacher_userid = tg_teacherdetails.teacher_id AND tg_teacherdetails.school_code = schools.schoolno ORDER BY tg_feedback.id DESC";
		//$query = "SELECT id,feedback,response,seen FROM tg_feedback WHERE 1 = 1 ".$condition;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["id"]] = array("id"=>$row["id"],
										"username"=>$row["username"],
										"school_code"=>$row["school_code"],
										"schoolname"=>$row["schoolname"],
										"email"=>$row["email"],
										"feedback"=>$row["feedback"],
										"response"=>$row["response"],
										"status"=>$row["status"],
										"entereddt"=>$row["entereddt"],
										"seen"=>$row["seen"]
			);
			
		}
		return $arrRet;
	}
	function ApproveResponses($connid)
	{
		if(is_array($this->approve) && count($this->approve)>0)
		{
			foreach($this->approve as $id)
			{
				if($this->response[$id] != "")
				{
					$query = "UPDATE tg_feedback SET status = '2' WHERE id = '".$id."' AND status = '1' AND response != '' LIMIT 1";
					$dbquery = new dbquery($query,$connid);		
				}
			}
		}
	}
	function getCountByFeedbackStatus($connid)
	{
		/*$condition = "WHERE status = '".$status."'";
		if($status == "All")
			$condition = "";*/
		$arrRet = array();
		$query = "SELECT status,count(*) as count FROM tg_feedback WHERE teacher_userid != 0 GROUP BY status";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["status"]] = $row["count"];
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function markAsRead($connid)
	{
		$query = "UPDATE tg_feedback SET seen = 1 WHERE teacher_userid = '".$_SESSION["userid"]."' AND status = 2 AND seen = 0 AND response != '' ";
		$dbquery = new dbquery($query,$connid);
	}
	function getSchoolNameByUsrename($connid)
	{
		$query = "SELECT schoolname,city FROM schools,tg_teacherdetails WHERE schools.schoolno = tg_teacherdetails.school_code AND teacher_id =  '".$_SESSION["userid"]."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$string = $row["schoolname"]." (".$row["city"].")";
		return $string;
	}
}
?>