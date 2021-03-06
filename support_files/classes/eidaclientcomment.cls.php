<?
class clsdaclientcomment
{
	var $id;
	var $action;
	var $submitted;
	var $schoolCode;
	var $user_category;
	var $coment_type;
	var $coment_category;
	var $year;
	var $message;
	var $added_by;	
	var $msg;
	var $input_category;
	var $email_id;
	var $phone_no;
	var $response;
	var $status;
	var $response_by;
	
	function clsdaclientcomment()
	{
		$this->id = "";
		$this->action = "";
		$this->submitted = 0;
		$this->schoolCode = -1;
		$this->user_category = "";
		$this->coment_type = 0;
		$this->coment_category = 0;
		$this->year = "";
		$this->message = "";
		$this->added_by = "";
		$this->msg = "";
		$this->input_category = -1;
		$this->email_id = "";
		$this->phone_no = "";
		$this->response = "";
		$this->status = -1;
		$this->response_by = "";
		$this->inputcategory = "";
		$this->commentcategory = "";
		$this->type = "";
		$this->added_dt_from = "";
		$this->added_dt_to = "";
		$this->respond_dt_from = "";
		$this->respond_dt_to = ""; 
		
	}
	
	function setpostvars()
	{
		if(isset($_POST["clsdaclientcomment_hdnsubmited"])) $this->submitted = $_POST["clsdaclientcomment_hdnsubmited"];
		if(isset($_POST["clsdaclientcomment_hdnaction"])) $this->action = $_POST["clsdaclientcomment_hdnaction"];
		if(isset($_POST["clsdaclientcomment_school_code"])) $this->schoolCode = $_POST["clsdaclientcomment_school_code"];
		if(isset($_POST["clsdaclientcomment_usercategory"])) $this->user_category = $_POST["clsdaclientcomment_usercategory"];
		if(isset($_POST["clsdaclientcomment_type"])) $this->coment_type = $_POST["clsdaclientcomment_type"];
		if(isset($_POST["clsdaclientcomment_category"])) $this->coment_category = $_POST["clsdaclientcomment_category"];
		if(isset($_POST["clsdaclientcomment_year"])) $this->year = $_POST["clsdaclientcomment_year"];
		if(isset($_POST["clsdaclientcomment_message"])) $this->message = $_POST["clsdaclientcomment_message"];
		if(isset($_POST["clsdaclientcomment_addedby"])) $this->added_by = $_POST["clsdaclientcomment_addedby"];
		if(isset($_POST["clsdaclientcomment_inputcategory"])) $this->input_category = $_POST["clsdaclientcomment_inputcategory"];
		if(isset($_POST["clsdaclientcomment_emailid"])) $this->email_id = $_POST["clsdaclientcomment_emailid"];
		if(isset($_POST["clsdaclientcomment_phoneno"])) $this->phone_no = $_POST["clsdaclientcomment_phoneno"];
		if(isset($_POST["clsdaclientcomment_response"])) $this->response = $_POST["clsdaclientcomment_response"];
		if(isset($_POST["clsdaclientcomment_status"])) $this->status = $_POST["clsdaclientcomment_status"];
		if(isset($_POST["clsdaclientcomment_response_by"])) $this->response_by = $_POST["clsdaclientcomment_response_by"];
		if(isset($_POST["clsdaclientcomment_inputcategory"])) $this->inputcategory = $_POST["clsdaclientcomment_inputcategory"];
		if(isset($_POST["clsdaclientcomment_commentcategory"])) $this->commentcategory = $_POST["clsdaclientcomment_commentcategory"];
		if(isset($_POST["clsdaclientcomment_type"])) $this->type = $_POST["clsdaclientcomment_type"];
		if(isset($_POST["clsdaclientcomment_added_dt_from"])) $this->added_dt_from = $_POST["clsdaclientcomment_added_dt_from"];
		if(isset($_POST["clsdaclientcomment_added_dt_to"])) $this->added_dt_to = $_POST["clsdaclientcomment_added_dt_to"];
		if(isset($_POST["clsdaclientcomment_respond_dt_from"])) $this->respond_dt_from = $_POST["clsdaclientcomment_respond_dt_from"];
		if(isset($_POST["clsdaclientcomment_respond_dt_to"])) $this->respond_dt_to = $_POST["clsdaclientcomment_respond_dt_to"];
	}
	function setgetvars()
	{
		if(isset($_GET["clsdaclientcomment_school_code"])) $this->schoolCode = $_GET["clsdaclientcomment_school_code"];
		if(isset($_GET["clsdaclientcomment_status"])) $this->status = $_GET["clsdaclientcomment_status"];
		if(isset($_GET["commentYear"])) $this->year = $_GET["commentYear"];
		
	}
	function CommentDetails($connid)
	{
		$this->setpostvars();
		
		if($this->action=="Save" && $this->submitted==1)
		{
			$this->saveClientComments($connid);
			
		}
		return $returndata;
	}
	function saveClientComments($connid)
	{
		$condition = "";
		
		if($this->coment_type!=""){
			$condition .= ",comment_type='$this->coment_type'";
		}
		
		$query = "INSERT INTO da_clientComments SET client_category = '$this->user_category',comment_category='$this->coment_category',schoolCode='$this->schoolCode',email_address='$this->email_id',phone='$this->phone_no',comments='$this->message',year='$this->year',added_by='$this->added_by',added_dt=NOW()$condition";
		$dbquery = new dbquery($query,$connid);
		
		if($dbquery->affectedrows()>0){
			$this->msg = "Successfully updated!";
			$this->sendMailToCST();
		}	
	}
	function showClientComments($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		
		$returnData = array();
		
		if($this->input_category == "teacher")
		{
			$returnData = $this->GetTeacherComments($connid);
		}
		else if ($this->input_category=="parent")
		{
			$returnData = $this->GetParentsComments($connid);
		}
		else if ($this->input_category=="-1")
		{
			$returnData = array_merge($this->GetParentsComments($connid),$this->GetTeacherComments($connid));
		}
		
		return $returnData;
	}
	function GetParentsComments($connid) {
		
		$returnarr = array();
		
		if ($this->schoolCode=='-1')
			$condition = "1=1";
		else 
			$condition = "da_clientComments.schoolCode = '".$this->schoolCode."'";
			
		if ($this->status!='-1'){
			$condition .= " AND da_clientComments.status = '".$this->status."'";
		}
		
		/*$query ="SELECT da_clientComments.id, da_clientComments.client_category, da_clientComments.comment_type,
						da_clientComments.comment_category, da_clientComments.comments, da_clientComments.response, da_clientComments.status,
						da_clientComments.added_dt, da_clientComments.added_by, da_clientComments.response_dt, da_clientComments.response_by,
						da_studentMaster.schoolCode, da_studentMaster.class, da_studentMaster.section, da_studentMaster.email
				 FROM da_clientComments
				 LEFT JOIN da_studentMaster ON da_clientComments.added_by = da_studentMaster.username
				 WHERE $condition AND da_clientComments.client_category = 'Parent'
				 ORDER BY da_clientComments.added_dt DESC";*/
		
		$query ="SELECT da_clientComments.id, da_clientComments.client_category, da_clientComments.comment_type,
						da_clientComments.comment_category, da_clientComments.comments, da_clientComments.response, da_clientComments.status,
						da_clientComments.added_dt, da_clientComments.added_by, da_clientComments.response_dt, da_clientComments.response_by,
						da_studentMaster.schoolCode, da_studentMaster.email, da_studentMaster.studentID, da_studAcadDetails.class,da_studAcadDetails.section
				 FROM da_clientComments
				 LEFT JOIN da_studentMaster ON da_clientComments.added_by = da_studentMaster.username
				 LEFT JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID AND da_studAcadDetails.year = '".$this->year."'							 
				 WHERE $condition AND da_clientComments.year='".$this->year."' 
				 AND da_clientComments.client_category = 'Parent' ";
        if(!empty($this->year)){
            $query .= " AND da_clientComments.year = $this->year";
        }
        $query .=" ORDER BY da_clientComments.added_dt DESC";
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows()>0) {
			while($result2 = $dbquery->getrowarray()){
				$returnarr[] = array("comment_id"=>$result2["id"],
									 "client_category" => $result2["client_category"],
									 "comment_type" => $result2["comment_type"],
									 "comment_category" => $result2["comment_category"],
									 "comments" => $result2["comments"],
									 "response" => $result2["response"],
									 "added_dt" => $result2["added_dt"],
									 "added_by" => $result2["added_by"],
									 "schoolCode"=> isset($result2["schoolCode"])?$result2["schoolCode"]:"",
									 "class" => isset($result2["class"])?$result2["class"]:"",
									 "section" => isset($result2["section"])?$result2["section"]:"",
									 "email" => isset($result2["email"])?$result2["email"]:"",
									 "first_name" => "",
									 "last_name" => "",
									 "response_dt" => $result2["response_dt"],
									 "response_by" => $result2["response_by"],
									 "status" => $result2["status"]);
			}
		}
		return $returnarr;
	}
	function GetTeacherComments($connid){
		
		$returnarr = array();
		
		if ($this->schoolCode=='-1')
			$condition = "1=1";
		else
			$condition = "da_clientComments.schoolCode = '".$this->schoolCode."'";
		if ($this->status!='-1'){
			$condition .= " AND da_clientComments.status = '".$this->status."'";
		}
		$query ="SELECT da_clientComments.id, da_clientComments.client_category, da_clientComments.comment_type, da_clientComments.comment_category, 
						da_clientComments.comments, da_clientComments.response, da_clientComments.status, da_clientComments.added_dt,
						da_clientComments.added_by, da_clientComments.response_dt, da_clientComments.response_by,
						da_userMaster.first_name,da_userMaster.last_name,da_userMaster.schoolCode,da_userMaster.email 
				 FROM da_clientComments
				 LEFT JOIN da_userMaster ON da_clientComments.added_by = da_userMaster.username
				 WHERE $condition AND da_clientComments.client_category != 'Parent'
				 AND da_clientComments.year = '".$this->year."' ";
        if(!empty($this->year)){
            $query .= " AND da_clientComments.year = $this->year";
        }
        $query .= " ORDER BY da_clientComments.added_dt DESC";
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows()>0) {
			while($result1 = $dbquery->getrowarray()){
				$returnarr[] = 	array("comment_id"=>$result1["id"],
									  "client_category" => $result1["client_category"],
									  "comment_type" => $result1["comment_type"],
									  "comment_category" => $result1["comment_category"],
								   	  "comments" => $result1["comments"],
									  "response" => $result1["response"],
									  "added_dt" => $result1["added_dt"],
								 	  "added_by" => $result1["added_by"],
									  "schoolCode" => $result1["schoolCode"],
									  "class" => "",
									  "section" =>"",
								 	  "email" => $result1["email"],
									  "first_name" => $result1["first_name"],
									  "last_name" => $result1["last_name"],
									  "response_dt" => $result1["response_dt"],
									  "response_by" => $result1["response_by"],
									  "status" => $result1["status"]);
			}
		}
		return $returnarr;
	}
	function searchClientComments ($connid){
		
		$this->setpostvars();
		$this->setgetvars();
		
		$added_dt_from = date("Y-m-d",strtotime($this->added_dt_from));
		$added_dt_to = date("Y-m-d",strtotime($this->added_dt_to));
		$respond_dt_from = date("Y-m-d",strtotime($this->respond_dt_from));
		$respond_dt_to = date("Y-m-d",strtotime($this->respond_dt_to));
		$returnarr = array();
		$condition = "1=1";
		if ($this->schoolCode !='-1')
			$condition = "da_clientComments.schoolCode = '".$this->schoolCode."'";
		if($this->status != '-1')
			$condition .= " AND da_clientComments.status = '".$this->status."' ";
		if($this->inputcategory != '-1')
			$condition .= " AND da_clientComments.client_category = '".$this->inputcategory."'";	
		if($this->commentcategory != '-1')
			$condition .= " AND da_clientComments.comment_category = '".$this-> commentcategory."' ";
		if($this->type !='-1')
			$condition .= " AND da_clientComments.comment_type = '".$this->type."' ";
		if(($this->added_dt_from != '') && ($this->added_dt_to != ''))
			$condition .= " AND (da_clientComments.added_dt >= '".$added_dt_from."' AND da_clientComments.added_dt <= '".$added_dt_to."') ";
		if($this->respond_dt_from != '' && $this->respond_dt_to != '')
			$condition .= " AND (DATE_FORMAT(da_clientComments.response_dt,'%Y-%m-%d') >='".$respond_dt_from."' AND DATE_FORMAT(da_clientComments.response_dt,'%Y-%m-%d') <= '".$respond_dt_to."') ";
			
		$query ="SELECT da_clientComments.id, da_clientComments.client_category, da_clientComments.comment_type, da_clientComments.comment_category, 
						da_clientComments.comments, da_clientComments.response, da_clientComments.status, da_clientComments.added_dt,
						da_clientComments.added_by, da_clientComments.response_dt, da_clientComments.response_by,
						da_userMaster.first_name,da_userMaster.last_name,da_userMaster.schoolCode,da_userMaster.email 
				 FROM da_clientComments
				 LEFT JOIN da_userMaster ON da_clientComments.added_by = da_userMaster.username 
				 WHERE $condition  AND da_clientComments.year='".$this->year."'";
		if(!empty($this->year)){
           $query .= " AND da_clientComments.year = $this->year";
        }
        $query .= " ORDER BY da_clientComments.added_dt DESC";
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows()>0) {
			while($result1 = $dbquery->getrowarray()){
				$returnarr[] = 	array("comment_id"=>$result1["id"],
									  "client_category" => $result1["client_category"],
									  "comment_type" => $result1["comment_type"],
									  "comment_category" => $result1["comment_category"],
								   	  "comments" => $result1["comments"],
									  "response" => $result1["response"],
									  "added_dt" => $result1["added_dt"],
								 	  "added_by" => $result1["added_by"],
									  "schoolCode" => $result1["schoolCode"],
									  "class" => "",
									  "section" =>"",
								 	  "email" => $result1["email"],
									  "first_name" => $result1["first_name"],
									  "last_name" => $result1["last_name"],
									  "response_dt" => $result1["response_dt"],
									  "response_by" => $result1["response_by"],
									  "status" => $result1["status"]);
			}
		}
		
		return $returnarr;
	}
	function viewClientComments($connid)
	{
		$returnarr = array();
		
		if ($this->schoolCode=='-1')
			$condition = "1=1";
		else
			$condition = "da_clientComments.schoolCode = '".$this->schoolCode."'";
		if ($this->status!='-1'){
			$condition .= " AND da_clientComments.status = '".$this->status."'";
		}
		$query ="SELECT da_clientComments.id, da_clientComments.client_category, da_clientComments.comment_type, da_clientComments.comment_category, 
						da_clientComments.comments, da_clientComments.response, da_clientComments.status, da_clientComments.added_dt,
						da_clientComments.added_by, da_clientComments.response_dt, da_clientComments.response_by,
						da_userMaster.first_name,da_userMaster.last_name,da_userMaster.schoolCode,da_userMaster.email 
				 FROM da_clientComments
				 LEFT JOIN da_userMaster ON da_clientComments.added_by = da_userMaster.username 
				 WHERE $condition  AND da_clientComments.year='".$this->year."'";
		if(!empty($this->year)){
           $query .= " AND da_clientComments.year = $this->year";
        }
        $query .= " ORDER BY da_clientComments.added_dt DESC";		 
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows()>0) {
			while($result1 = $dbquery->getrowarray()){
				$returnarr[] = 	array("comment_id"=>$result1["id"],
									  "client_category" => $result1["client_category"],
									  "comment_type" => $result1["comment_type"],
									  "comment_category" => $result1["comment_category"],
								   	  "comments" => $result1["comments"],
									  "response" => $result1["response"],
									  "added_dt" => $result1["added_dt"],
								 	  "added_by" => $result1["added_by"],
									  "schoolCode" => $result1["schoolCode"],
									  "class" => "",
									  "section" =>"",
								 	  "email" => $result1["email"],
									  "first_name" => $result1["first_name"],
									  "last_name" => $result1["last_name"],
									  "response_dt" => $result1["response_dt"],
									  "response_by" => $result1["response_by"],
									  "status" => $result1["status"]);
			}
		}
		return $returnarr;
	}
	function displayCommentsOfUser($connid){
		
		$returndata = array();

		$query = "SELECT * FROM da_clientComments
				  WHERE client_category = '".$_SESSION["user_category"]."'
				  AND schoolCode='".$_SESSION["school_code"]."'
				  AND added_by='".$_SESSION["username"]."'
				  AND status!='3'"; // we are not displaying junk status comments to users
		$dbquery = new dbquery($query,$connid);
		if ($dbquery->numrows()>0){
			while($result = $dbquery->getrowarray()){ 
				$returndata[] = array("comment"=>$result["comments"],
									  "comment_date"=>$result["added_dt"],
									  "response"=>$result["response"],
									  "status"=>$result["status"]);
			}					  
		}
		return $returndata;
	}
	function sendMailToCST(){
		
		global $arrCommentCategory;
		$schoolDetails=getSchoolDetailsDA($_SESSION["school_code"]);
		
		// Is the OS Windows or Mac or Linux
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}
		$toemail = "hina.joshi@ei-india.com";
		# Mail headers
		$headers  = 'From: Detailed Assessment <da@ei-india.com>'.$eol;
		$headers .= "Bcc: sudhir.prajapati@ei-india.com".$eol;
		$headers .= "Reply-To: <da@ei-india.com>".$eol;
		$headers .= "MIME-Version: 1.0 $eol";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "Cc:shweta.bhaskar@ei-india.com,bhavika.jadeja@ei-india.com,zankhana.desai@ei-india.com,trilok.trivedi@ei-india.com,sindhu.deshmukh@ei-india.com\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
		$msg = "";
		$msg .= '<!DOCTYPE html>
				<html>
				<head>
					<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
					<style>
						body,td{
							font-family : verdana !important;
						}						
					</style>
				</head>
				<body>
				<div id="container">
					<table style="font-family: verdana;font-size: 14px;">
						<tr>
							<td valign="bottom">
								<img src="http://www.educationalinitiatives.com/DA/images/DA.png" style="padding: 5px;width: 80px;">
							</td>
						</tr>
						<tr>
							<td valign="bottom"><b>We have received the following comment from school-code: '.$_SESSION[school_code].'</b></td>
						</tr>
					</table>
					<br>
					<table border="1" width="70%" cellpadding="5" style="font-family: verdana !important;font-size: 12px;border-collapse: collapse">
						<tr align="center" bgcolor="#3399CC" style="color:white;font-family: verdana !important;font-size: 14px;">
							<td colspan="2">User Details</td>
						</tr>
						<tr>
							<td width="20%">User ID</td>
							<td>'.$_SESSION["username"].'</td>
						</tr>
						<tr>
							<td> School </td>
							<td>'.$schoolDetails["schoolname"].'</td>
						</tr>
						<tr>
							<td> User Category </td>
							<td>'.$this->user_category.'</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>'.$this->email_id.'</td>
						</tr>
						<tr>
							<td>Phone</td>
							<td>'.$this->phone_no.'</td>
						</tr>
					</table>
					<br>
					<table border="1" width="70%" cellpadding="5" style="font-family: verdana !important;font-size: 12px;border-collapse: collapse">
						<tr align="center" bgcolor="#3399CC" style="color:white;">
							<td colspan="2">Comment Details</td>
						</tr>
						<tr>
							<td width="20%"> Category</td>
							<td>'.$arrCommentCategory[$this->coment_category].'</td>
						</tr>
						<tr>
							<td>Message</td>
							<td>'.$this->message.'</td>
						</tr>
					</table>
				</div>	
				</body>
			</html>';
		$subject = "DA : Client Comment - SchoolCode : ".$_SESSION["school_code"];
		if ($toemail != "") {
			mail($toemail,$subject, $msg, $headers);	
		}
	}

}


?>