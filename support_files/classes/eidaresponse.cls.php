<?php
class clsdaresponse
{
	var $connid;
	var $schoolCode;
	var $examcode;
	var $action;
	var $submited;
	var $msg;
	var $respStatusArr = array() ;
	var $noofstudents;
    var $studentID;
	var $rollnos;
	var $ids;
		
	function clsdaresponse($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->schoolCode = "";
		$this->examcode = "";	
		$this->action = "";
		$this->submited = "";
		$this->respStatusArr = array('0'=>"Not Checked",'1'=>"OK",'2'=>"Duplicate",'3'=>"Error-RollNosNotMatched",'4'=>"Error-RollNosWithDiffResponses",
									 '5'=>"Submitted",'6'=>"ReceivedAgain",'7'=>"MissingRollno",'8'=>"Operated",'9'=>"AvoidedDueToCSVPref",
									 '11' => "InvalidPaperVersion", '12'=>'Null Responses');
		$this->noofstudents = "";
		$this->rollnos = "";
		$this->ids = "";
	
	}
    
    public function setExamCode($examcode){
        $this->examcode = $examcode;
    }
    
    public function setStudentID($studentid){
        $this->studentID = $studentid;
    }
            
	function setpostvars()
	{		
		if(isset($_POST["clsdaresponse_hdnsubmited"])) $this->submited = $_POST["clsdaresponse_hdnsubmited"];
		if(isset($_POST["clsdaresponse_hdnaction"])) $this->action = $_POST["clsdaresponse_hdnaction"];
		if(isset($_POST["clsdaresponse_examcode"])) $this->examcode = $_POST["clsdaresponse_examcode"];
		if(isset($_POST["clsdaresponse_noofstudents"])) $this->noofstudents = $_POST["clsdaresponse_noofstudents"];
		if(isset($_POST["clsdaresponse_ids"])) $this->ids = $_POST["clsdaresponse_ids"];
		if(isset($_POST["clsdaresponse_rollNos"])) $this->rollnos = $_POST["clsdaresponse_rollNos"];
	}
	
	function setgetvars()
    {
        if(isset($_GET["id"])) $this->id = $_GET["id"];
        if(isset($_GET["examcode"])) $this->examcode = $_GET["examcode"];
        
    }
    
    function GetResponses(){
    	
    	$returnData = array();
    	$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->submited){
    		
    		if($this->action == "GetData" ){    		
	    		$returnData = $this->RetrieveData();
    		}
			if($this->action == "GetExportData" || $this->action == "ExportToFile"){
				$returnData = $this->GetExportData();
			}
    		if($this->action == "CheckData"){
    			
    			 if($this->examcode == "") return;
    			 $this->checkData();
    			 $returnData = $this->RetrieveData();
    		}
    		if($this->action == "ExportAllData" || $this->action == "ExportErrorData"){
    			
    			if($this->examcode == "") return;
    			$this->ExportData();
    			$returnData = $this->RetrieveData();
    		}
			if ($this->action=="SaveStudents"){
				if($this->examcode == "") return;
				$this->UpdateStudents();
				$returnData = $this->RetrieveData();
			}
			
    		return $returnData;
    	}
    	
    }
    function checkData(){
    	
    	$trn_query = "START TRANSACTION;";
		$trn_dbqry = new dbquery($trn_query,$this->connid);
		
		
		# Marking the reponses as received again after report generation
		$chk_query = "SELECT COUNT(*) AS total_submited FROM da_tabletResponses WHERE status = 5 AND examcode = '".$this->examcode."'";
		$chk_dbqry = new dbquery($chk_query,$this->connid);
		if($chk_dbqry->numrows() > 0){
			
			/*$up_sm_query = "UPDATE da_tabletResponses a,da_tabletResponses b SET a.status = IF(a.insert_medium != 'CSV',6,a.status),b.status = IF(a.insert_medium != 'CSV',b.status,9)
							WHERE a.status = 0 and a.rollNo = b.rollNo and a.examcode = '".$this->examcode."'
							and b.examcode = '".$this->examcode."' and (b.status = 5 OR b.status = 1)";*/
			$up_sm_query = "UPDATE da_tabletResponses a,da_tabletResponses b SET a.status = IF(a.insert_medium != 'CSV',6,a.status),b.status = IF(a.insert_medium != 'CSV',b.status,9)
							WHERE a.status = 0 and a.studentID = b.studentID and a.examcode = '".$this->examcode."'
							and b.examcode = '".$this->examcode."' and (b.status = 5 OR b.status = 1)";
			$up_sm_dbqry = new dbquery($up_sm_query,$this->connid);
		}
		 
		 // logic to check for null response and set there state to 11 - Null response -- Naveen
		 $chk_query2 = "SELECT group_concat(id) null_id FROM da_tabletResponses WHERE examcode = '".$this->examcode."' 
		 				AND status != 12 AND response REGEXP '^[0]*$' ";
		//echo " CHK QUERY $chk_query2 <br>";
		 $chk_dbqry2 = new dbquery($chk_query2,$this->connid);
		 if($chk_dbqry2->numrows() > 0){
		 	$null_result = $chk_dbqry2->getrowarray();
		 	$null_responseIds = $null_result['null_id'];

		 	if($null_responseIds !='') {
		 		$up_query6 = "UPDATE da_tabletResponses SET status =12 WHERE examcode ='".$this->examcode."' AND id in( ".$null_responseIds.")";
		 		$up_dbqry6= new dbquery($up_query6,$this->connid);
		 	}	
		 }	
		// 	end logic to set null response status

		# Marking the duplicate responses if more than one found for same roll no, exam code, version, student name, response
		/*$up_query1 = "UPDATE da_tabletResponses c
					   INNER JOIN
					   (
						  SELECT rollNo, examcode, version, studentName, response, attended_date, MIN(id) as keep
						  FROM da_tabletResponses WHERE status = 0 AND examcode = '".$this->examcode."'
						  AND insert_medium != 'CSV'
						  GROUP BY rollNo, examcode, version, studentName, response 
						  HAVING count(*) > 1
						) k
						ON c.rollNo=k.rollNo AND c.examcode=k.examcode AND c.version = k.version AND trim(lower(c.studentName)) = trim(lower(k.studentName)) AND
						c.response = k.response AND c.examcode = '".$this->examcode."' AND status = 0
						AND insert_medium != 'CSV'
						SET status = IF(id = keep,0,2)";*/
		$up_query1 = "UPDATE da_tabletResponses c
					   INNER JOIN
					   (
						  SELECT studentID,rollNo, examcode, version, studentName, response, attended_date, MIN(id) as keep
						  FROM da_tabletResponses WHERE status = 0 AND examcode = '".$this->examcode."'
						  AND insert_medium != 'CSV'
						  GROUP BY studentID, examcode, version, studentName, response 
						  HAVING count(*) > 1
						) k
						ON c.studentID=k.studentID AND c.examcode=k.examcode AND c.version = k.version AND trim(lower(c.studentName)) = trim(lower(k.studentName)) AND
						c.response = k.response AND c.examcode = '".$this->examcode."' AND status = 0
						AND insert_medium != 'CSV'
						SET status = IF(id = keep,0,2)";
		 $up_dbqry1 = new dbquery($up_query1,$this->connid);
		 // excluded attended_time
		 
		 # Giving priorities to CSV responses
		/* $csvRollnos = "";
		 $query = "select distinct rollNo from da_tabletResponses where examcode = '".$this->examcode."' AND insert_medium = 'CSV' AND status = 0";
		 $dbqry = new dbquery($query,$this->connid);
		 while($result = $dbqry->getrowarray()){
		 	$csvRollnos .= $result["rollNo"].",";
		 }
		 
		 if($csvRollnos != ""){
		 	$query = "UPDATE da_tabletResponses SET status = 9, updated_dt = NOW(), updated_by = 'SYSTEM' 
		 			  WHERE insert_medium != 'CSV' AND rollNo IN(".rtrim($csvRollnos,",").") AND examcode = '".$this->examcode."'";
		 	$dbqry = new dbquery($query,$this->connid);
		 }
		 */
		 $csvStudentID = "";
		 $query = "select distinct studentID from da_tabletResponses where examcode = '".$this->examcode."' AND insert_medium = 'CSV' AND status = 0";
		 $dbqry = new dbquery($query,$this->connid);
		 while($result = $dbqry->getrowarray()){
		 	$csvStudentID .= $result["studentID"].",";
		 }
		 
		 if($csvStudentID != ""){
		 	$query = "UPDATE da_tabletResponses SET status = 9, updated_dt = NOW(), updated_by = 'SYSTEM' 
		 			  WHERE insert_medium != 'CSV' AND studentID IN(".rtrim($csvStudentID,",").") AND examcode = '".$this->examcode."'";
		 	$dbqry = new dbquery($query,$this->connid);
		 }
		 
		 /*
		 // Responses marked as error having same roll no with diff responses. in case of mobile/tablet/ibt
		 $chk_query1 = "SELECT count(*),group_concat(id) AS errorids FROM da_tabletResponses
						WHERE STATUS = 0 AND examcode = '".$this->examcode."' AND insert_medium != 'CSV' 
						GROUP BY rollNo having count(*) > 1";
		 $chk_dbqry1 = new dbquery($chk_query1,$this->connid);
		 if($chk_dbqry1->numrows() > 0){
		 	while($chk_result = $chk_dbqry1->getrowarray()){
			 	if($chk_result["errorids"] != ""){
			 		$up_query2 = "UPDATE da_tabletResponses SET status = 4 WHERE id IN(".$chk_result["errorids"].") AND examcode = '".$this->examcode."' AND da_tabletResponses.status = 0";
			 		$up_dbqry2 = new dbquery($up_query2,$this->connid);
			 	}
		 	}
		 }
		 */
		 // Response marked same student id with diff response 
		 $chk_query1 = "SELECT count(*),group_concat(id) AS errorids FROM da_tabletResponses
						WHERE STATUS = 0 AND examcode = '".$this->examcode."' AND insert_medium != 'CSV' 
						GROUP BY studentID having count(*) > 1";
		 $chk_dbqry1 = new dbquery($chk_query1,$this->connid);
		 if($chk_dbqry1->numrows() > 0){
		 	while($chk_result = $chk_dbqry1->getrowarray()){
			 	if($chk_result["errorids"] != ""){
			 		$up_query2 = "UPDATE da_tabletResponses SET status = 4 WHERE id IN(".$chk_result["errorids"].") AND examcode = '".$this->examcode."' AND da_tabletResponses.status = 0";
			 		$up_dbqry2 = new dbquery($up_query2,$this->connid);
			 	}
		 	}
		 }

		 // Updating CSV responses, considering the last one is correct one 
		 /*$up_query5 = "UPDATE da_tabletResponses c
					   INNER JOIN
					   (
						  SELECT rollNo, examcode, version, studentName, response, attended_date, MAX(id) as keep
						  FROM da_tabletResponses WHERE status = 0 AND examcode = '".$this->examcode."' AND insert_medium = 'CSV'
						  GROUP BY rollNo, examcode
						  HAVING count(*) > 1
						) k
						ON c.rollNo=k.rollNo AND c.examcode=k.examcode AND c.examcode = '".$this->examcode."' AND status = 0 AND insert_medium = 'CSV'
						SET status = IF(id = keep,1,9)";*/
		 $up_query5 = "UPDATE da_tabletResponses c
					   INNER JOIN
					   (
						  SELECT studentID,rollNo, examcode, version, studentName, response, attended_date, MAX(id) as keep 
						  FROM da_tabletResponses WHERE status = 0 AND examcode = '".$this->examcode."' AND insert_medium = 'CSV'
						  GROUP BY studentID, examcode
						  HAVING count(*) > 1
						) k
						ON c.studentID=k.studentID AND c.examcode=k.examcode AND c.examcode = '".$this->examcode."' AND status = 0 AND insert_medium = 'CSV'
						SET status = IF(id = keep,1,9)";
		 $up_dbqry5 = new dbquery($up_query5,$this->connid);
		 
		/* 
		 $up_query3 = "UPDATE da_tabletResponses,da_examDetails,da_testRequest,da_studentMaster,da_studAcadDetails
					   SET da_tabletResponses.status = 1
					   WHERE
					   da_tabletResponses.examcode = da_examDetails.exam_code
						AND 
						da_examDetails.request_id = da_testRequest.id
						AND
						da_studentMaster.studentID = da_studAcadDetails.studentID
						AND
						da_testRequest.year = da_studAcadDetails.year
						AND 
						da_tabletResponses.rollNo = da_studAcadDetails.rollNo 
						AND 
						da_studentMaster.schoolCode = da_testRequest.schoolCode
						AND 
						da_studAcadDetails.class = da_testRequest.class
						AND 
						da_studAcadDetails.section = da_examDetails.section
						AND	 
						da_tabletResponses.examcode = '".$this->examcode."'
						AND da_tabletResponses.status = 0
						";
		 */
		$up_query3 = "UPDATE da_tabletResponses,da_examDetails,da_testRequest,da_studentMaster,da_studAcadDetails
					   SET da_tabletResponses.status = 1
					   WHERE
					   da_tabletResponses.examcode = da_examDetails.exam_code
						AND 
						da_examDetails.request_id = da_testRequest.id
						AND
						da_studentMaster.studentID = da_studAcadDetails.studentID
						AND
						da_testRequest.year = da_studAcadDetails.year
						AND 
						da_tabletResponses.studentID = da_studAcadDetails.studentID 
						AND 
						da_studentMaster.schoolCode = da_testRequest.schoolCode
						AND 
						da_studAcadDetails.class = da_testRequest.class
						AND 
						da_studAcadDetails.section = da_examDetails.section
						AND	 
						da_tabletResponses.examcode = '".$this->examcode."'
						AND da_tabletResponses.status = 0
						";
		 $up_dbqry3 = new dbquery($up_query3,$this->connid);
		 /*
	  	 $up_query4 = "UPDATE da_tabletResponses,da_examDetails,da_testRequest,da_studentMaster,da_studAcadDetails
				       SET da_tabletResponses.status = 3
				       WHERE da_tabletResponses.examcode = da_examDetails.exam_code
				       AND da_examDetails.request_id = da_testRequest.id
				       AND da_testRequest.year = da_studAcadDetails.year
				       AND da_studentMaster.schoolCode = da_testRequest.schoolCode
				       AND da_studentMaster.studentID = da_studAcadDetails.studentID
				       AND trim(da_tabletResponses.rollNo) != trim(da_studAcadDetails.rollNo) 
				       AND da_studAcadDetails.class = da_testRequest.class
				       AND da_studAcadDetails.section = da_examDetails.section
				       AND da_tabletResponses.examcode = '".$this->examcode."'
				       AND da_tabletResponses.status = 0";
	  	 */
		// not required to check this -- Naveen
		/*		       
		$up_query4 = "UPDATE da_tabletResponses,da_examDetails,da_testRequest,da_studentMaster,da_studAcadDetails
				       SET da_tabletResponses.status = 3
				       WHERE da_tabletResponses.examcode = da_examDetails.exam_code
				       AND da_examDetails.request_id = da_testRequest.id
				       AND da_testRequest.year = da_studAcadDetails.year
				       AND da_studentMaster.schoolCode = da_testRequest.schoolCode
				       AND da_studentMaster.studentID = da_studAcadDetails.studentID
				       AND trim(da_tabletResponses.rollNo) != trim(da_studAcadDetails.rollNo) 
				       AND da_studAcadDetails.class = da_testRequest.class
				       AND da_studAcadDetails.section = da_examDetails.section
				       AND da_tabletResponses.examcode = '".$this->examcode."'
				       AND da_tabletResponses.status = 0";

		 $up_dbqry4 = new dbquery($up_query4,$this->connid);
		 */

		 
		 $trn_query = "COMMIT;";
		 $trn_dbqry = new dbquery($trn_query,$this->connid);
    }
    
    function RetrieveData(){
    	
    	$returnData = array();
    	$class = "";
    	$schoolCode = "";
    	$RollNos = array();
    	$response_received_rollnos = "";
    	
    	$check_query = "SELECT * FROM da_tabletResponses WHERE examcode = '".$this->examcode."' AND insert_date <= NOW() - INTERVAL 1 HOUR ORDER BY id LIMIT 1";
		$check_dbqry = new dbquery($check_query,$this->connid);
		if($check_dbqry->numrows() > 0) {    		
			
			# fetching responses
    		//$query = "SELECT * FROM da_tabletResponses WHERE examcode = '".$this->examcode."'";
    		/*$query = "SELECT da_tabletResponses.*,da_studentMaster.studentName as namefrommaster,da_examDetails.section,
    						 da_testRequest.schoolCode,da_testRequest.class 
					  FROM da_tabletResponses
					  LEFT JOIN da_examDetails ON da_tabletResponses.examcode = da_examDetails.exam_code
					  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
					  LEFT JOIN da_studAcadDetails ON da_tabletResponses.rollNo = da_studAcadDetails.rollNo 
					  							  AND da_testRequest.year = da_studAcadDetails.year 
					  							  AND da_examDetails.section = da_studAcadDetails.section
					  							  AND da_testRequest.class = da_studAcadDetails.class
					  							  AND da_studAcadDetails.status = 1
					  LEFT JOIN da_studentMaster ON da_testRequest.schoolCode = da_studentMaster.schoolCode 
					  							AND da_studAcadDetails.studentID = da_studentMaster.studentID
					  							AND da_studentMaster.enabled = 1
					  WHERE da_tabletResponses.examcode = '".$this->examcode."'
					  GROUP BY da_tabletResponses.id
					  ORDER BY da_tabletResponses.rollNo";*/
    		
    		
    		$query = "SELECT da_tabletResponses.*,da_studAcadDetails.rollNo,da_studentMaster.studentName as namefrommaster,date_format(da_studentMaster.dob,'%d%m') as dobfrommaster,da_tabletResponses.dob as dobfromtest,
    						 da_examDetails.section,da_testRequest.schoolCode,da_testRequest.class 
    				  FROM da_tabletResponses,da_examDetails,da_testRequest,da_studentMaster,da_studAcadDetails
					  WHERE da_tabletResponses.examcode = da_examDetails.exam_code
					  AND da_examDetails.request_id = da_testRequest.id
					  AND da_studentMaster.studentID = da_studAcadDetails.studentID
					  AND da_testRequest.year = da_studAcadDetails.year
					  AND da_tabletResponses.studentID = da_studAcadDetails.studentID
					  AND da_studentMaster.schoolCode = da_testRequest.schoolCode
					  AND da_studAcadDetails.class = da_testRequest.class
					  AND da_studAcadDetails.section = da_examDetails.section
					  AND da_studAcadDetails.status = 1
					  AND da_studentMaster.enabled = 1
					  AND da_tabletResponses.examcode = '".$this->examcode."'
					  ORDER BY da_tabletResponses.rollNo,da_tabletResponses.id DESC";

    		$dbqry = new dbquery($query,$this->connid);
    		while($result = $dbqry->getrowarray()){
    			
    			$returnData["RESPONSE"][] = array("id"=>$result["id"],
    											  "rollNo"=>$result["rollNo"],
    											  "dobfrommaster" => $result["dobfrommaster"],
    											  "dobfromtest" => $result["dobfromtest"],
    											  "studentID" => $result["studentID"],
			    								  "examcode" => $result["examcode"],
			    								  "version" => $result["version"],
			    								  "studentName" => $result["studentName"],
			    								  "namefrommaster" => $result["namefrommaster"],
			    								  "response"=> $result["response"],
			    								  "attended_date" => $result["attended_date"],
			    								  "insert_date" => $result["insert_date"],
			    								  "insert_medium" => $result["insert_medium"],
			    								  "status"=> $result["status"],
			    								  "updated_by" => $result["updated_by"],
			    								  "updated_dt" => $result["updated_dt"],
			    								  "tabletid" => $result["tabletid"],
			    								  "appVersion" => $result["appVersion"],
			    								  "csv_uploaded_by" => $result["csv_uploaded_by"]
			    								  );
			    $RollNos[] = $result["rollNo"];
    		}
    		
    		# Fetching all Students from Student AcadDetails
    		$RollNos = array_unique($RollNos);
    		$response_received_rollnos = implode(",",$RollNos);
    		if($response_received_rollnos != "") $condition =  " AND da_studAcadDetails.rollNo NOT IN($response_received_rollnos)";
    		
    		$query2 = "SELECT da_studentMaster.studentName as namefrommaster,date_format(da_studentMaster.dob,'%m%y') as dobfrommaster,da_studAcadDetails.rollNo,da_studentMaster.studentID
					   FROM da_examDetails,da_testRequest,da_studentMaster,da_studAcadDetails
					   WHERE da_examDetails.request_id = da_testRequest.id
					   AND da_testRequest.schoolCode = da_studentMaster.schoolCode 
					   AND da_testRequest.year = da_studAcadDetails.year
					   AND da_testRequest.class = da_studAcadDetails.class
					   AND da_examDetails.section = da_studAcadDetails.section
					   AND da_studentMaster.studentID = da_studAcadDetails.studentID
					   AND da_examDetails.exam_code = '".$this->examcode."'
					   AND da_studAcadDetails.status = 1
					   AND da_studentMaster.enabled = 1
					   $condition
					   ORDER BY da_studAcadDetails.rollNo";
    		$dbqry2 = new dbquery($query2,$this->connid);
    		while($result2 = $dbqry2->getrowarray()){
    			
    			$returnData["RESPONSE"][] = array("id"=>"",
    											  "rollNo"=>$result2["rollNo"],
    											  "dobfrommaster" => $result2["dobfrommaster"],
			    								  "dobfromtest" => "",
    											  "studentID"=>"",
			    								  "examcode" => "",
			    								  "version" => "",
			    								  "studentName" => "",
			    								  "namefrommaster" => $result2["namefrommaster"],
			    								  "response"=> "",
			    								  "attended_date" => "",
			    								  "insert_date" => "",
			    								  "insert_medium" => "",
			    								  "status"=> "10",
			    								  "updated_by" => "",
			    								  "updated_dt" => "",
			    								  "tabletid" => "",
			    								  "appVersion" => "",
			    								  "csv_uploaded_by" => ""
			    								  );
    		}
    		
    		# fetching present/abseentees
    		$returnData["COUNT"]["PRESENT"] = 0;
    		$returnData["PRESENTROLLNOS"] = array();
    		$returnData["SYSTEMABSENT"] = array();
    		
    		$chk_query = "SELECT exam_code,group_concat(present_rollnos) as present_rollnos,group_concat(teacher_marked_rollnos) as teacher_marked_rollnos FROM da_conductTestDetails WHERE exam_code = '".$this->examcode."' GROUP BY exam_code";
    		$chk_dbqry = new dbquery($chk_query,$this->connid);
    		if($chk_dbqry->numrows()> 0) { 
    			$returnData["COUNT"]["PRESENT"] = $chk_dbqry->numrows();
	    		$chk_result = $chk_dbqry->getrowarray();
	    		if($chk_result["present_rollnos"] != ""){
	    			$returnData["PRESENTROLLNOS"] = explode(",",$chk_result["present_rollnos"]);
	    			$returnData["TEACHERMARKEDNOS"] = explode(",",$chk_result["teacher_marked_rollnos"]);
	    			$returnData["SYSTEMABSENT"] = array_diff($returnData["TEACHERMARKEDNOS"],$returnData["PRESENTROLLNOS"]);
	    		}	
	    		else
	    			$returnData["COUNT"]["PRESENT"] = 0;
    		}
    		# fetching status wise
    		$status_query = "SELECT status,count(*) AS total FROM da_tabletResponses WHERE examcode = '".$this->examcode."' GROUP BY status";
    		$status_dbqry = new dbquery($status_query,$this->connid);
    		while($status_result = $status_dbqry->getrowarray()){
    			$returnData["STATUS"][$status_result["status"]] =  $status_result["total"];
    		}
    		
    		$returnData["COUNT"]["EXAMDETAILS"] = 0;
    		$returnData["COUNT"]["STUDENTMASTER"] = 0;
    		$returnData["COUNT"]["REPORTS"] = 0;
    		
			# fetching count
			$details_query = "SELECT da_testRequest.schoolCode,da_testRequest.class,da_examDetails.section,da_examDetails.no_of_students,da_testRequest.year
						      FROM da_examDetails 
					          LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
					          WHERE da_examDetails.exam_code = '".$this->examcode."'";
			$details_dbqry = new dbquery($details_query,$this->connid);
			while ($details_result = $details_dbqry->getrowarray()) {
				$returnData["COUNT"]["EXAMDETAILS"] = $details_result["no_of_students"];
				$class = $details_result["class"];
				$section = $details_result["section"];
				$schoolCode = $details_result["schoolCode"];
				$year = $details_result["year"];
			}
			
			if($class != "" && $schoolCode != ""){
				$count_query2 = "SELECT COUNT(distinct da_studAcadDetails.studentID) AS tot_students 
								 FROM da_studentMaster
								 LEFT JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID 
								 		AND da_studentMaster.schoolCode = $schoolCode 
								 WHERE 
								 da_studAcadDetails.class = $class 
								 AND da_studAcadDetails.section = '".$section."'
								 AND da_studAcadDetails.year = $year
								 AND da_studentMaster.enabled = 1
								 AND da_studAcadDetails.status = 1";
				$count_dbqry2 = new dbquery($count_query2,$this->connid);
				$count_result2 = $count_dbqry2->getrowarray();
				
				$returnData["COUNT"]["STUDENTMASTER"] = $count_result2["tot_students"];
			}
			
			$resp_query = "SELECT COUNT(*) AS tot_response FROM da_response WHERE examcode = '".$this->examcode."'";
			$resp_dbqry = new dbquery($resp_query,$this->connid);
			$resp_result = $resp_dbqry->getrowarray();
			$returnData["COUNT"]["REPORTS"] = $resp_result["tot_response"];
			
			$query3 ="SELECT schoolCode,schoolname,subject,class,section FROM da_examDetails
					  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
					  LEFT JOIN schools ON da_testRequest.schoolCode = schools.schoolno
					  WHERE da_examDetails.exam_code = '".$this->examcode."'";
			$dbqry3 = new dbquery($query3,$this->connid);
			$result3 = $dbqry3->getrowarray();
			$returnData["EXAMDETAILS"]= array("schoolCode"=>$result3["schoolCode"],
												"schoolname"=>$result3["schoolname"],
												"subject"=>$result3["subject"],
												"class"=>$result3["class"],
												"section"=>$result3["section"]
												);
												
			
		}
		return $returnData;
    }
    
    function GetResponseLog(){
    	
    	$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->submited){
    		
    		if($this->examcode != 0 && $this->examcode != "" && $this->action == "GetData"){
    		
	    		$examcode_query ="SELECT COUNT(*) AS total FROM da_examDetails WHERE exam_code = '".$this->examcode."'";
	    		$examcode_dbqry = new dbquery($examcode_query,$this->connid);
	    		$examcode_result = $examcode_dbqry->getrowarray();
	    		if($examcode_result["total"] == 0) $this->msg = "Invalid Examcode!";
	    		else {
    			
	    			$tab_qry = "SELECT response FROM da_responseLog
							    WHERE response LIKE '%".$this->examcode."%'";
		    		$tabdbqry = new dbquery($tab_qry,$this->connid);
		    		if($tabdbqry->numrows() == 0) {$this->msg = "No Response Received!";}
		    		else{ 
		    			
		    			$content = "";
		    			while($tabresult = $tabdbqry->getrowarray()){
		    				$content .= $tabresult["response"]."\r\n";
		    			}
		    			
		    			$txtfile = "responseLog_$this->examcode.txt";
				    	$handler = fopen(constant("PATH_TEMP").$txtfile, "w");
						fwrite($handler,trim($content));
						fclose($handler);
						
						$this->ForceDownload($txtfile);
				    	@unlink(constant("PATH_TEMP").$txtfile);
				    	ob_end_flush();
				    	return;
		    		}
	    		}
    		}	
    	}	
    }
    
    function ForceDownload($filename,$apptype="application/text"){
		
		ob_end_clean();
	    header('Content-Description: File Transfer');
	    header('Content-Type: '.$apptype.'');
	    header('Content-Disposition: attachment; filename="'.$filename);
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize(constant("PATH_TEMP").$filename));
	    readfile(constant("PATH_TEMP").$filename);
		@unlink(constant("PATH_TEMP").$filename);
	}
	
	function ExportData(){
	
		if ($this->action=="ExportAllData"){
			$clsdageneratexls = new clsdageneratexls();
			ob_start();
			$fileName = "Responses_AllData_".$this->examcode.".xls";
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");;
			header("Content-Disposition: attachment;filename= $fileName");
			header("Content-Transfer-Encoding: binary ");
			$today = date("d-m-Y");
			$xlsRow=1;
			$clsdageneratexls->xlsBOF();
			$clsdageneratexls->xlsWriteLabel(0,0,"S.No.");
			$clsdageneratexls->xlsWriteLabel(0,1,"Roll No");
			$clsdageneratexls->xlsWriteLabel(0,2,"ExamCode");
			$clsdageneratexls->xlsWriteLabel(0,3,"Version");
			$clsdageneratexls->xlsWriteLabel(0,4,"Student Name (Tablet)");
			$clsdageneratexls->xlsWriteLabel(0,5,"Student Name (System)");
			$clsdageneratexls->xlsWriteLabel(0,6,"Response");
			$clsdageneratexls->xlsWriteLabel(0,7,"Attended Date");
			$clsdageneratexls->xlsWriteLabel(0,8,"Status");
			$returnData = $this->RetrieveData();
			if(isset($returnData["RESPONSE"]) && count($returnData["RESPONSE"])>0){
				foreach($returnData["RESPONSE"] as $keyreturnData => $valuereturnData){
					if ($valuereturnData["status"]!=2){
						$clsdageneratexls->xlsWriteNumber($xlsRow,0,$xlsRow);
						$clsdageneratexls->xlsWriteNumber($xlsRow,1,$valuereturnData["rollNo"]);
						$clsdageneratexls->xlsWriteNumber($xlsRow,2,$valuereturnData["examcode"]);
						$clsdageneratexls->xlsWriteNumber($xlsRow,3,$valuereturnData["version"]);					
						$clsdageneratexls->xlsWriteLabel($xlsRow,4,$valuereturnData["studentName"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,5,$valuereturnData["namefrommaster"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,6,$valuereturnData["response"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,7,$valuereturnData["attended_date"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,8,$this->respStatusArr[$valuereturnData["status"]]);
						$xlsRow++;
					}
				}
			}
			
			$clsdageneratexls->xlsEOF();
			file_put_contents(constant("PATH_TEMP").$fileName, ob_get_clean());
			$this->ForceDownload($fileName,"application/xls");
			@unlink(constant("PATH_TEMP").$fileName);
			ob_end_flush();
			return;
		}
		else
		if ($this->action=="ExportErrorData"){
			$clsdageneratexls = new clsdageneratexls();
			ob_start();
			$fileName = "Responses_ErrorData_".$this->examcode.".xls";
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");;
			header("Content-Disposition: attachment;filename= $fileName");
			header("Content-Transfer-Encoding: binary ");
			$today = date("d-m-Y");
			$xlsRow=1;
			$clsdageneratexls->xlsBOF();
			$clsdageneratexls->xlsWriteLabel(0,0,"S.No.");
			$clsdageneratexls->xlsWriteLabel(0,1,"Roll No");
			$clsdageneratexls->xlsWriteLabel(0,2,"ExamCode");
			$clsdageneratexls->xlsWriteLabel(0,3,"Version");
			$clsdageneratexls->xlsWriteLabel(0,4,"Student Name (Tablet)");
			$clsdageneratexls->xlsWriteLabel(0,5,"Student Name (System)");
			$clsdageneratexls->xlsWriteLabel(0,6,"Response");
			$clsdageneratexls->xlsWriteLabel(0,7,"Attended Date");
			$clsdageneratexls->xlsWriteLabel(0,8,"Status");
			$returnData = $this->RetrieveData();
			if(isset($returnData["RESPONSE"]) && count($returnData["RESPONSE"])>0){
				foreach($returnData["RESPONSE"] as $keyreturnData => $valuereturnData){
					if ($valuereturnData["status"]==3 || $valuereturnData["status"]==4){
						$clsdageneratexls->xlsWriteNumber($xlsRow,0,$xlsRow);
						$clsdageneratexls->xlsWriteNumber($xlsRow,1,$valuereturnData["rollNo"]);
						$clsdageneratexls->xlsWriteNumber($xlsRow,2,$valuereturnData["examcode"]);
						$clsdageneratexls->xlsWriteNumber($xlsRow,3,$valuereturnData["version"]);					
						$clsdageneratexls->xlsWriteLabel($xlsRow,4,$valuereturnData["studentName"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,5,$valuereturnData["namefrommaster"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,6,$valuereturnData["response"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,7,$valuereturnData["attended_date"]);
						$clsdageneratexls->xlsWriteLabel($xlsRow,8,$this->respStatusArr[$valuereturnData["status"]]);
						$xlsRow++;
					}
				}
			}
			
			$clsdageneratexls->xlsEOF();
			file_put_contents(constant("PATH_TEMP").$fileName, ob_get_clean());
			$this->ForceDownload($fileName,"application/xls");
			@unlink(constant("PATH_TEMP").$fileName);
			ob_end_flush();
			return;
		}
		
	}
  
	function GetStatusColor($status) {
		
		if($status == "") return "";
		
		switch ($status) {
		case 0 :
			$colour="#FFFFFF";
			break;
		case 1 :
			$colour="#7FFFD4";
			break;
		case 2 :
			$colour="#808080";
			break;
		case 3 :
			$colour="#FFFF00";
			break;
		case 4 :
			$colour="#FFFF00";
			break;
		case 5 :
			$colour="#5CB3FF";
			break;
		case 6 :
			$colour="#FFFF00";
			break;
		case 8 :
			$colour="#ECE5B6";
			break;
		case 9 :
			$colour="#ECE5B6";
			break;
		case 10:
			$colour= "#C48189";
			break;
		case 11: 
			$colour= "#E88050";
			break;
		case 12:
			$colour= '#BDAEC6';
			break;
		}	
		return $colour;
	}
	
	function UpdateStudents(){
		
		$query = "UPDATE da_examDetails SET no_of_students = '$this->noofstudents' WHERE exam_code='$this->examcode'";
		$dbqry = new dbquery($query,$this->connid);
		$this->msg = "No. of Students Appeared Updated Successfully!";
		
	}
	
	function GetErrorResponses(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		if ($this->action=="ProcessData"){
			
			# updating the responses
			if(is_array($this->ids) && count($this->ids) > 0){
				
				foreach($this->ids as $key => $value){

					$chk_query = "SELECT id FROM da_tabletResponses WHERE rollNo = '".$this->rollnos[$value]."' AND status IN(1,5) AND examcode = '".$this->examcode."'";
					$chk_dbqry = new dbquery($chk_query,$this->connid);
					if($chk_dbqry->numrows() > 0){
						$chk_result = $chk_dbqry->getrowarray();
						# update existing
						$up_query = "UPDATE da_tabletResponses SET status = 8,updated_by = '".$_SESSION["username"]."',updated_dt = NOW() WHERE id = '".$chk_result["id"]."' AND rollNo = '".$this->rollnos[$value]."'";
						$up_dhqry = new dbquery($up_query,$this->connid);
					}
					# update with ok status
					$up_query1 = "UPDATE da_tabletResponses SET rollNo = '".$this->rollnos[$value]."', status = 1,updated_by = '".$_SESSION["username"]."',updated_dt = NOW() WHERE id = '".$value."'";
					$up_dbqry1 = new dbquery($up_query1,$this->connid);
				}
				$this->msg = "Successfully Updated!";	
			}
			
		}
		
		$returnData = array();
		
		/*$query = "SELECT da_tabletResponses.*,da_studentMaster.studentName as namefrommaster,da_examDetails.section,
    						 da_testRequest.schoolCode,da_testRequest.class 
					  FROM da_tabletResponses
					  LEFT JOIN da_examDetails ON da_tabletResponses.examcode = da_examDetails.exam_code
					  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
					  LEFT JOIN da_studentMaster ON da_testRequest.schoolCode = da_studentMaster.schoolCode AND da_studentMaster.enabled = 1
					  LEFT JOIN da_studAcadDetails ON da_tabletResponses.rollNo = da_studAcadDetails.rollNo 
					  							  AND da_testRequest.year = da_studAcadDetails.year 
					  							  AND da_studentMaster.studentID = da_studAcadDetails.studentID
					  							  AND da_examDetails.section = da_studAcadDetails.section
					  							  AND da_testRequest.class = da_studAcadDetails.class
					  							  AND da_studAcadDetails.status = 1
					  WHERE da_tabletResponses.examcode = '".$this->examcode."'  AND da_tabletResponses.status IN(3,4,6)
					  GROUP BY da_tabletResponses.id
					  ORDER BY da_tabletResponses.rollNo";*/
		
		/*$query = "SELECT da_tabletResponses.*,da_studentMaster.studentName as namefrommaster,da_examDetails.section,
					  	 da_testRequest.schoolCode,da_testRequest.class
				  FROM da_tabletResponses
				  LEFT JOIN da_examDetails ON da_tabletResponses.examcode = da_examDetails.exam_code
				  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_studentMaster ON da_tabletResponses.rollNo = da_studentMaster.rollNo
											AND da_examDetails.section = da_studentMaster.section			      
				  							AND da_testRequest.schoolCode = da_studentMaster.schoolCode
								      		AND da_testRequest.class = da_studentMaster.class 
								      		AND da_studentMaster.enabled = 1
				  WHERE da_tabletResponses.examcode = '".$this->examcode."' AND da_tabletResponses.status IN(3,4,6)
				  GROUP BY da_tabletResponses.id
				  ORDER BY da_tabletResponses.rollNo";*/
		$query = "SELECT da_tabletResponses.*,da_studentMaster.studentName as namefrommaster,da_examDetails.section,
    					 da_testRequest.subject,da_testRequest.schoolCode,da_testRequest.class,da_testRequest.year,schools.schoolname 
				  FROM da_tabletResponses,da_examDetails,da_testRequest,da_studentMaster,da_studAcadDetails, schools
				  WHERE da_tabletResponses.examcode = da_examDetails.exam_code
				  AND da_examDetails.request_id = da_testRequest.id
				  AND da_studentMaster.studentID = da_studAcadDetails.studentID
				  AND da_testRequest.year = da_studAcadDetails.year
				  AND da_tabletResponses.rollNo = da_studAcadDetails.rollNo 
				  AND da_studentMaster.schoolCode = da_testRequest.schoolCode
				  AND schools.schoolno = da_testRequest.schoolCode
				  AND da_studAcadDetails.class = da_testRequest.class
				  AND da_studAcadDetails.section = da_examDetails.section
				  AND da_studAcadDetails.status = 1
				  AND da_studentMaster.enabled = 1
				  AND da_tabletResponses.examcode = '".$this->examcode."' 
				  AND da_tabletResponses.status IN(3,4,6)
				  ORDER BY da_tabletResponses.rollNo, da_tabletResponses.id DESC";
		$dbqry = new dbquery($query,$this->connid);
		while($result = $dbqry->getrowarray()){
			
			$returnData["ERRORRESPONSES"][] = array("id"=>$result["id"],
    											    "rollNo"=>$result["rollNo"],
    											    "studentID" => $result["studentID"],
			    								    "examcode" => $result["examcode"],
			    								    "version" => $result["version"],
			    								    "studentName" => $result["studentName"],
			    								    "namefrommaster" => $result["namefrommaster"],
			    								    "response"=> $result["response"],
			    								    "attended_date" => $result["attended_date"],
			    								    "insert_date" => $result["insert_date"],
			    								    "insert_medium" => $result["insert_medium"],
			    								    "status"=> $result["status"],
			    								    "updated_by" => $result["updated_by"],
			    								    "updated_dt" => $result["updated_dt"],
			    								    "tabletid" => $result["tabletid"],
			    								    "appVersion" => $result["appVersion"],
			    								    "csv_uploaded_by" => $result["csv_uploaded_by"]
			    								   );
			$returnData["EXAMDETAILS"] = array("examcode" => $result["examcode"],
											   "subject" => $result["subject"],	 
											   "class" => $result["class"],
											   "section" => $result["section"],
											   "schoolCode" => $result["schoolCode"],
											   "schoolname" => $result["schoolname"],
											   "year" => $result["year"]);
										  
			
		}
		return $returnData;	
			
	}
	
	function GetExportData(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		$returnData = array();
		
		$query = "SELECT da_studAcadDetails.rollNo,da_response.*
				  FROM da_response
				  left join da_examDetails ON da_response.examcode = da_examDetails.exam_code
				  left join da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  left join da_studentMaster ON da_response.studentID = da_studentMaster.studentID AND da_testRequest.schoolCode = da_studentMaster.schoolCode
				  LEFT JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID 
				  							  AND da_testRequest.year = da_studAcadDetails.year
				  							  AND da_testRequest.class = da_studAcadDetails.class
				  							  AND da_examDetails.section = da_studAcadDetails.section
				  WHERE da_response.examcode = '".$this->examcode."'
				  ORDER BY da_studAcadDetails.rollNo";
		$dbqry = new dbquery($query,$this->connid);
		while($result = $dbqry->getrowarray()){
			
			$returnData[] = array("rollno"=>$result["rollNo"],
								  "examcode"=>$result["examcode"],
								  "version"=>$result["paperversion"],
								  "A1"=>$result["A1"],
								  "A2"=>$result["A2"],
								  "A3"=>$result["A3"],
								  "A4"=>$result["A4"],
								  "A5"=>$result["A5"],
								  "A6"=>$result["A6"],
								  "A7"=>$result["A7"],
								  "A8"=>$result["A8"],
								  "A9"=>$result["A9"],
								  "A10"=>$result["A10"],
								  "A11"=>$result["A11"],
								  "A12"=>$result["A12"],
								  "A13"=>$result["A13"],
								  "A14"=>$result["A14"],
								  "A15"=>$result["A15"],
								  "A16"=>$result["A16"],
								  "A17"=>$result["A17"],
								  "A18"=>$result["A18"],
								  "A19"=>$result["A19"],
								  "A20"=>$result["A20"],
								  "A21"=>$result["A21"],
								  "A22"=>$result["A22"],
								  "A23"=>$result["A23"],
								  "A24"=>$result["A24"],
								  "A25"=>$result["A25"],
								  "A26"=>$result["A26"],
								  "A27"=>$result["A27"],
								  "A28"=>$result["A28"],
								  "A29"=>$result["A29"],
								  "A30"=>$result["A30"],
								  "A31"=>$result["A31"],
								  "A32"=>$result["A32"],
								  "A33"=>$result["A33"],
								  "A34"=>$result["A34"],
								  "A35"=>$result["A35"],
								  "A36"=>$result["A36"],
								  "A37"=>$result["A37"],
								  "A38"=>$result["A38"],
								  "A39"=>$result["A39"],
								  "A40"=>$result["A40"],
								  "A41"=>$result["A41"],
								  "A42"=>$result["A42"],
								  "A43"=>$result["A43"],
								  "A44"=>$result["A44"],
								  "A45"=>$result["A45"],
								  "A46"=>$result["A46"],
								  "A47"=>$result["A47"],
								  "A48"=>$result["A48"],
								  "A49"=>$result["A49"],
								  "A50"=>$result["A50"],
								  "A51"=>$result["A51"],
								  "A52"=>$result["A52"],
								  "A53"=>$result["A53"],
								  "A54"=>$result["A54"],
								  "A55"=>$result["A55"],
								  "A56"=>$result["A56"],
								  "A57"=>$result["A57"],
								  "A58"=>$result["A58"],
								  "A59"=>$result["A59"],
								  "A60"=>$result["A60"],
								  "A61"=>$result["A61"],
								  "A62"=>$result["A62"],
								  "A63"=>$result["A63"],
								  "A64"=>$result["A64"],
								  "A65"=>$result["A65"],
								  "A66"=>$result["A66"],
								  "A67"=>$result["A67"],
								  "A68"=>$result["A68"],
								  "A69"=>$result["A69"],
								  "A70"=>$result["A70"],
								  "A71"=>$result["A71"],
								  "A72"=>$result["A72"],
								  "A73"=>$result["A73"],
								  "A74"=>$result["A74"],
								  "A75"=>$result["A75"]
								  );
		}
		return $returnData;
	}
	
	function ExportToFile(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		if ($this->action=='ExportToFile'){
			$returnData = $this->GetExportData();
			$csv_output = "Roll No".","."Examcode".",";	
			for($i=1;$i<=75;$i++){
				$csv_output .= "Q".$i.",";
			}
			$csv_output .= "\n";
			foreach ($returnData as $value){
				$csv_output .= $value['rollno'].",".$value['examcode'].$value['version'].",";
				for($i=1;$i<=75;$i++){
					$csv_output .= $value["A$i"].",";
				}
				$csv_output .= "\n";
			}
			$filename = "Response_".$this->examcode;
			header("Content-type: application/vnd.ms-excel");
			header("Content-disposition: csv" . date("d-m-Y") . ".csv");
			header("Content-disposition: filename=".$filename.".csv");
			print $csv_output;
			exit;
		}
	}
    
    public function getResponseForStudent(){
        if(empty($this->studentID)){
            return null;
        }
        $responseQuery = "SELECT studentID, examcode, paperversion, report_flag FROM da_response WHERE 1 = 1";
        $responseQuery.= " AND studentID = '$this->studentID'";       
        if(!empty($this->examcode)){
            $responseQuery .= " AND examcode = '$this->examcode'";
        }
        $dbQueryObj = new dbquery(null, $this->connid);
        $dbqry = $dbQueryObj->executequery($responseQuery);
        $responses = array();
        while($response = $dbqry->getrowassocarray()){
            $responses[] = $response;
        }
        return $responses;
    }
}	
?>
