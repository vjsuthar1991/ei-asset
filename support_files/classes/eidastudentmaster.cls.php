<?php
class clsdastudentmaster
{
	var $connid;
	var $clspaging;
	var $studentID;
	var $studentName;
	var $rollNo;
	var $schoolCode;
	var $class;
	var $section;
	var $submited;
	var $dob;
	var $gender;
	var $email;
	var $username;
	var $password;
	var $last_modified;
	var $security_que_id;
	var $security_ans;
	var $pan_number;
	var $enabled;
	var $created_dt;
	var $created_by;
	var $updated_dt;
	var $updated_by;
	var $year;
	var $error;
	var $msg;
	var $email_key;
	var $name_key;
	var $addRollNo;
	
	function clsdastudentmaster($connid = "")
	{
		$this->connid = $connid; // Connection
        if(class_exists('clspaging')){
            $this->clspaging = new clspaging('clsdastudentmaster','');
        }
		$this->studentID = "";
		$this->studentName = "";
		$this->rollNo = "";
		$this->schoolCode = "";
		$this->class = "";
		$this->section = "";
		$this->dob = "";
		$this->gender = "";
		$this->email = "";
		$this->username = "";
		$this->password = "";
		$this->last_modified = "";
		$this->security_que_id = "";
		$this->security_ans = "";
		$this->pan_number = "";
		$this->enabled = "";
		$this->created_dt = "";
		$this->created_by = "";
		$this->updated_dt = "";
		$this->updated_by = "";
		$this->year = "";
		$this->error = array();
		$this->msg = "";
  	}
	
	function setpostvars()
	{
		if(isset($_POST["clsdastudentmaster_hdnsubmited"])) $this->submited = $_POST["clsdastudentmaster_hdnsubmited"];
		if(isset($_POST["clsdastudentmaster_hdnaction"])) $this->action = $_POST["clsdastudentmaster_hdnaction"];
		
		if(isset($_POST["clsdastudentmaster_schoolcode"])) $this->schoolCode = $_POST["clsdastudentmaster_schoolcode"];
		if(isset($_POST["clsdastudentmaster_year"])) $this->year = $_POST["clsdastudentmaster_year"];
		if(isset($_POST["clsdastudentmaster_class"])) $this->class = $_POST["clsdastudentmaster_class"];
		//for newly added students in addStudents.php
		if(isset($_POST["add_more_student"])) {
			for($i=1;$i<=$_POST["add_more_student"];$i++) {
				if($_POST['rollno_'.$i]!='') {
					$class_key = $_POST['class_'.$i];
					$section_key = $_POST['section_'.$i];
					$this->email_key[$i] = $_POST['email_'.$i];
					$this->name_key[$i] = $_POST['name_'.$i];
					$this->addRollNo[$class_key][$section_key][$i] = $_POST['rollno_'.$i];
				}
			}
		}
    }
    
	function setgetvars()
	{
		if(isset($_GET["schoolCode"])) $this->schoolCode = $_GET["schoolCode"];
		if(isset($_GET["year"])) $this->year = $_GET["year"];
	}
	
	function GetOrderedClasses(){
        global $constant_da;

		$classArr = array();
		$this->setgetvars();
		$this->setpostvars();	
		
		if($this->schoolCode != "" && $this->schoolCode != '-1' && $this->year != ""){
			$query = "SELECT DISTINCT class FROM {$constant_da(COMMON_DATABASE)}.da_orderBreakup
					 	    LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster ON da_orderBreakup.order_id = da_orderMaster.order_id
					  		WHERE da_orderMaster.schoolCode = $this->schoolCode AND year = $this->year";
			$dbqry = new dbquery($query,$this->connid);
			while($result = $dbqry->getrowarray()){
				$classArr[] = $result["class"];	
			}
			
		}
		return $classArr;
	}
	
	function PageExportStudentData(){
		
		$this->setgetvars();
		$this->setpostvars();	
		
		
		# Display data
		if($this->submited && $this->action == "GetStudentData"){
		
			$condition = "";
			$returnarr = array();
			
			if(isset($this->class) && $this->class != "-1")
				$condition .= "AND da_studAcadDetails.class = $this->class";
			
			$query ="SELECT da_studentMaster.studentID,da_studentMaster.schoolCode,da_studentMaster.studentName,da_studAcadDetails.class,
							da_studAcadDetails.section,da_studAcadDetails.rollNo,da_studentMaster.email,da_studAcadDetails.year,da_studAcadDetails.created_by,
							da_studAcadDetails.created_dt,da_studAcadDetails.updated_dt,da_studAcadDetails.updated_by
					 FROM da_studentMaster,da_studAcadDetails
					 WHERE da_studentMaster.studentID = da_studAcadDetails.studentID
					 AND da_studentMaster.enabled = 1
					 AND schoolCode = '".$this->schoolCode."' 
					 AND da_studAcadDetails.year = '".$this->year."'
					 AND da_studAcadDetails.status = 1
					 $condition
					 ORDER BY da_studAcadDetails.class,da_studAcadDetails.section,da_studAcadDetails.rollNo";
            $dbqry = new dbquery($query,$this->connid);
            while($result = $dbqry->getrowarray()){	
				
            $returnarr[] = array("studentID" => $result["studentID"],
                            "studentName" => $result["studentName"],
                            "schoolCode" => $result["schoolCode"],
                            "class" => $result["class"],
                            "section" => $result["section"],
                            "rollNo" => $result["rollNo"],
                            "year" => $result["year"],
                            "email" => $result["email"],
                            "created_by" => $result["created_by"],
                            "created_dt" => $result["created_dt"],
                            "updated_by" => $result["updated_by"],
                            "updated_dt" => $result["updated_dt"]
                          );
				
			}
			return $returnarr;
		}
		
		# Download Data
		if($this->submited && $this->action == "DownloadStudData"){
			$this->DownloadData($this->schoolCode,$this->year);
		}
		
	}
	
	function DownloadData($schoolCode,$year){
        global $constant_da;

		$condition = "";
		if(isset($this->class) && $this->class != "-1" && $this->class != "")
			$condition .= "AND da_studAcadDetails.class = $this->class";
		
		//echo $query = "SELECT * FROM da_studentMaster WHERE schoolCode = '".$this->schoolCode."' $condition";
		$query ="SELECT da_studentMaster.studentID,da_studentMaster.studentName,da_studAcadDetails.class,da_studAcadDetails.section,
						da_studAcadDetails.rollNo,da_studentMaster.email
				 FROM da_studentMaster,da_studAcadDetails
				 WHERE da_studentMaster.studentID = da_studAcadDetails.studentID
				 AND da_studentMaster.enabled = 1
				 AND schoolCode = '".$schoolCode."'
				 AND da_studAcadDetails.year = '".$year."'
				 $condition 
				 ORDER BY da_studAcadDetails.class,da_studAcadDetails.section,da_studAcadDetails.rollNo";
		$dbqry = new dbquery($query,$this->connid);
		
		$sch_query = "SELECT schoolname FROM {$constant_da(COMMON_DATABASE)}.schools WHERE schoolno = '".$schoolCode."'";
		$sch_dbqry = new dbquery($sch_query,$this->connid);
		$sch_result = $sch_dbqry->getrowarray();
		$schoolName = stripslashes($sch_result["schoolname"]);
		$schoolName = str_replace(" ","_",$schoolName);
		
		$filename = $schoolCode."_".$schoolName."_".$year.".csv";
		$header =array('DA ID','Student Name','Class','Section','RollNo','Email');
		$str ='DA ID, Student Name, Class, Section, RollNo, Email';
		
		$lt= explode(", ", $str);
	
		$fh = fopen($filename,'w');
		
		fputcsv($fh, $lt);
	
		while($result = $dbqry->getrowassocarray())
		{
			fputcsv($fh,$result);
		}
		fclose($fh);
	
		$this->ForceDownload($filename);
	}

	function ForceDownload($filename){
		
		ob_end_clean();
	    header('Content-Description: File Transfer');
	    //header("Content-type: application/csv");
		header("Content-Type: text/csv; charset=utf-8");
	    header('Content-Disposition: attachment; filename="'.$filename);
	    header('Content-Transfer-Encoding: binary');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($filename));
	    readfile($filename);
		@unlink($filename);
	}
	
	function GetSchoolsWithOrders(){
        global $constant_da;

		$this->setpostvars();
		$this->setgetvars();
		$resultarr = array();
		$condition = "";		
		
		if($this->year != "ALL" && $this->year != '')
		{
		
			$resultarr = array();
			$query2 = "SELECT DISTINCT(da_orderMaster.schoolCode),schools.schoolname
					   FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster 
					   LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_orderMaster.schoolCode = schools.schoolno
					   WHERE da_orderMaster.schoolCode != 0 
					   AND da_orderMaster.year = '".$this->year."'
					   ORDER BY schools.schoolname";
			$dbqry2 = new dbquery($query2,$this->connid);
			if ($dbqry2->numrows()>0)
	        {
	           while($row = $dbqry2->getrowarray()){	
	           		$resultarr[] = array("schoolCode" => $row["schoolCode"],
	           							 "schoolname" => $row["schoolname"],
	           							);
	           }
	        }
		}
        
        return $resultarr;
		
	}
	
	function PageImportStudentData(){
		
		$this->setgetvars();
		$this->setpostvars();
		
		# Display data
		if($this->submited && $this->action == "GetStudentData"){
		
			$condition = "";
			$returnarr = array();
			
			if(isset($this->class) && $this->class != "-1" && $this->class != "")
				$condition .= "AND class = $this->class";
			
			$query ="SELECT da_studentMaster.studentID,da_studentMaster.schoolCode,da_studentMaster.studentName,da_studAcadDetails.class,
							da_studAcadDetails.section,da_studAcadDetails.rollNo,da_studentMaster.email,da_studAcadDetails.year
					 FROM da_studentMaster,da_studAcadDetails
					 WHERE da_studentMaster.studentID = da_studAcadDetails.studentID
					 AND schoolCode = '".$this->schoolCode."' 
					 AND da_studAcadDetails.year = '".$this->year."'
					 $condition
					 AND da_studentMaster.enabled = 1 AND da_studAcadDetails.status != 0
					 ORDER BY da_studAcadDetails.class,da_studAcadDetails.section,da_studAcadDetails.rollNo";
			$dbqry = new dbquery($query,$this->connid);
			while($result = $dbqry->getrowarray()){	
				
				$returnarr[] = array("studentID" => $result["studentID"],
									  "studentName" => $result["studentName"],
									  "schoolCode" => $result["schoolCode"],
									  "class" => $result["class"],
									  "section" => $result["section"],
									  "rollNo" => $result["rollNo"],
									  "year" => $result["year"],
									  "email" => $result["email"]
									);
				
			}
			return $returnarr;
		}
		
		if($this->submited && $this->action == "UploadStudentData"){
			
				$import_file = $_FILES['studentdatafile']['tmp_name'];
				$file = $_FILES['studentdatafile']['name'];
				$fp = fopen($import_file, "r") or die("Error opening File");
				$ext = substr($file, -4, 4);
				
				if(($ext==".csv" || $ext==".CSV")) {
					
					$studentIDs = array();
					while ($line[] = fgetcsv($fp,1024));
					$num_row=count($line);
					$num_column=sizeof($line[0]);
					//$error=checkFields($line,$schoolCode, $cls, $year);
					
					# checking if students exists than we wont allow them to upload because its first time
					$cnt_query = "SELECT COUNT(*) AS existing FROM da_studAcadDetails
								  left join da_studentMaster ON da_studAcadDetails.studentID = da_studentMaster.studentID
								  WHERE da_studentMaster.schoolCode = '".$this->schoolCode."' AND da_studAcadDetails.year = '".$this->year."'
								  AND da_studentMaster.enabled = 1 AND da_studAcadDetails.status = 1";
					$cnt_dbqry = new dbquery($cnt_query,$this->connid);
					$cnt_result = $cnt_dbqry->getrowarray();
					if($cnt_result["existing"] > 0){
						$this->error[] = "There are already students registered for this school and this academic year..! You need to use add more from admin interface!";
						return;
					}
					
				
					#checking valid student if of that school
					foreach($line as $key => $values){
						if($key == 0) continue;
						if($values[0] != "")
							$studentIDs[] = $values[0];
					}
					if(is_array($studentIDs) && count($studentIDs) > 0){
						
						$studentidstr = implode(",",$studentIDs);
						$chk_query = "SELECT COUNT(*) as total FROM da_studentMaster WHERE studentID IN($studentidstr) AND schoolCode != $this->schoolCode";
						$chk_dbqry = new dbquery($chk_query,$this->connid);
						$chk_result = $chk_dbqry->getrowarray();
						if($chk_result["total"] > 0) {
							$this->error[] = "Some of the student IDs are of another school! Please check and upload again..!";
							return;
						}
					}
					
					$this->CheckingCSVFields($line);
					if(count($this->error) > 0) return;
					else {
						$this->AddStudents($line);
					}
					
				} else {
					$this->error[] = "Upload CSV file only";
				}
		}
		
	}
	
	function NewStudentsUpload() {
        global $constant_da;
        
		if($this->submited && $this->action == "NewStudentsUpload"){				
			$temp_filename=$_FILES['studentdatafile']['tmp_name'];
			$filename=$_FILES['studentdatafile']['name'];
			$fp = fopen($temp_filename, "r") or die("Error in opening file");
			//check if extension is valid
			$extension = substr($filename, -4, 4);
			if(($extension==".csv" || $extension==".CSV")) {
				while ($line[] = fgetcsv($fp,1024));
				$num_row=count($line);
				$num_column=sizeof($line[0]);
				$this->checkForError($line);
				if(count($this->error) > 0) return;
				else {
					$query = "SELECT DISTINCT class FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster  a, {$constant_da(COMMON_DATABASE)}.da_orderBreakup b WHERE a.order_id=b.order_id AND schoolCode='$this->schoolCode' AND year='". $this->year ."'";
					$dbqry = new dbquery($query,$this->connid);
					$classes = array();
					while($row = $dbqry->getrowarray()) {
						$classes[] = $row['class'];
					}
					foreach($classes as $cls) {
						$limit[$cls]=$this->orderLimitReached($this->schoolCode,$cls,$this->year);
					}
					for ($i=1;$i<$num_row-1;$i++) {
						$rollno=trim($line[$i][0]);
						$name=trim($line[$i][1]);
						$class=trim($line[$i][2]);
						$section=trim($line[$i][3]);
						$email=trim($line[$i][4]);
						$gender=trim($line[$i][5]);
						if(trim($line[$i][6]) != "")
							$dob=date('Y/m/d',strtotime(trim($line[$i][6])));
						else 
							$dob = "";	
						$section =strtoupper($section);
						$password=generatePassword(6);

						$name=$this->formatStudentName($name);
						
						$statusCond="";
						if($limit[$class]<=0) {
							$statusCond=", status=2";
						}
						
						$query=" INSERT INTO da_studentMaster (schoolCode,studentName, email,gender,dob,password,created_dt,created_by) VALUES
								 ('$this->schoolCode', '".addslashes($name)."','$email','$gender','$dob','".md5($password)."',NOW(),'$_SESSION[username]')";
						$dbqry = new dbquery($query,$this->connid);
						$insertID = $dbqry->insertid;
						
						$query1 ="INSERT INTO da_studAcadDetails SET studentID= '".$insertID."', class='".$class."',section='".$section."',rollNo='".$rollno."', year='".$this->year."' , created_by='".$_SESSION['username']."',created_dt= NOW() ".$statusCond;
						$dbqry1 = new dbquery($query1,$this->connid);
						
						$query2 = "INSERT INTO da_studentPasswords (studentID,password) VALUES ('$insertID','$password')";
						$dbqry2 = new dbquery($query2,$this->connid);
						
						$limit[$class]--;
					}
					
					$query="UPDATE da_studentMaster SET username=studentID WHERE username='' AND schoolCode='$this->schoolCode'";
					$dbqry = new dbquery($query,$this->connid);
					$this->msg .= "<br/>Student data uploaded successfully.";
				}
			} else {
				$this->error[] = "Upload CSV file only";
			}
		}
	}
	
	function checkForError($line) {
	// active order
    global $constant_da;

	$query = "SELECT class,section FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster a,{$constant_da(COMMON_DATABASE)}.da_orderBreakup b WHERE a.order_id=b.order_id AND schoolCode='$this->schoolCode' AND year='". $this->year ."'";
	$dbqry = new dbquery($query,$this->connid);
	$orderBreakup = array(array());
	while($row = $dbqry->getrowarray()) {
		$orderBreakup[] = $row['class'].$row["section"];	
	}
	
	$uniqueClassSection = array();
	$field=array("Roll No","Student Name","Class");
	$num_row=count($line);
	$num_column=sizeof($line[0]);
	for ($i=1;$i<$num_row-1;$i++) { 
		$class = trim($line[$i][2]);
		$section = trim($line[$i][3]);
		$email = trim($line[$i][4]);
		$rollno = trim($line[$i][0]);
		
		$section =strtoupper($section);
		
		if(!in_array($class.$section,$uniqueClassSection)) {
			$uniqueClassSection[] = $class.$section;
			if(!in_array($class.$section,$orderBreakup)) $this->error[]="Class ".$class.$section." has not been registered.<br> ";
		}
		if(isset($uniqueRollNo[$class][$section])) {
				if(in_array($rollno,$uniqueRollNo[$class][$section]) && $line[$i][0]!="") {
					$this->error[] = $rollno." roll no is duplicate, line no:".($i+1)." in excel sheet.<br>";
				}
				else {$uniqueRollNo[$class][$section][] = $rollno;}
		}
		else $uniqueRollNo[$class][$section][] = $rollno;
		
		foreach ($field as $key=>$value) {
			if($line[$i][$key]=="") $this->error[]=$field[$key]." is missing in line ".($i+1)."<br>";
		}
		
		if(!is_numeric($rollno)) $this->error[]="Roll No should be numeric in line ".($i+1)."<br>";
		if(!is_numeric($class)) $this->error[]="Class should be numeric in line ".($i+1)."<br>";
		if($email!="" && !filter_var($email, FILTER_VALIDATE_EMAIL)) $this->error[]="Email is not valid in line ".($i+1)."<br>";
		
		if($rollno!="") {
			
			$query1="SELECT da_studentMaster.studentID 
					 FROM da_studentMaster 
					 LEFT JOIN da_studAcadDetails on da_studentMaster.studentID = da_studAcadDetails.studentID
					 WHERE da_studentMaster.schoolCode='$this->schoolCode' 
					 AND da_studAcadDetails.class='$class' 
					 AND da_studAcadDetails.section='$section' 
					 AND da_studAcadDetails.rollNo='$rollno' 
					 AND da_studentMaster.enabled='1' 
					 AND da_studAcadDetails.year ='".$this->year."'
					 AND da_studAcadDetails.status != 0";
			$dbqry1 = new dbquery($query1,$this->connid);
			if($dbqry1->numrows()>0) $this->error[]=$line[$i][0]." roll no already exists in line ".($i+1).".<br>";
		}
	}
}
	
	function CheckingCSVFields($line){
        global $constant_da;
        
		if(!is_array($line) || count($line) == 0) return "No Data Found!";
		
		$uniqueClassSection = array();
		$uniqueRollNo = array();
		$orderBreakup = array();
		
		# active order
		$totalStudents = 0;
		$query = "SELECT class,section FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster a,{$constant_da(COMMON_DATABASE)}.da_orderBreakup b WHERE a.order_id=b.order_id AND schoolCode='$this->schoolCode' AND year = $this->year";
		$dbqry = new dbquery($query,$this->connid);
		while($row= $dbqry->getrowassocarray()) {
			$orderBreakup[] = $row['class'].$row["section"];
		}
		
		$num_row=count($line);
		$num_column=sizeof($line[0]);
		for ($i=1;$i<$num_row-1;$i++) { 
			
			$student_id = trim($line[$i][0]);
			$student_name = trim($line[$i][1]);
			$class = trim($line[$i][2]);
			$section = trim($line[$i][3]);
			$rollno = trim($line[$i][4]);
			$email = trim($line[$i][5]);
			
			$section = strtoupper($section);
	
			if(!in_array($class.$section,$uniqueClassSection)) {
				$uniqueClassSection[] = $class.$section;
				if(!in_array($class.$section,$orderBreakup)) $this->error[] ="Class ".$class.$section." has not been registered.<br> ";
			}
			
			if(isset($uniqueRollNo[$class][$section])) {
				if(in_array($rollno,$uniqueRollNo[$class][$section]) && $line[$i][0]!="") {
					$this->error[] = $rollno." roll no is duplicate, line no:".($i+1)." in excel sheet.<br>";
				}
				else {$uniqueRollNo[$class][$section][] = $rollno;}
			}
			else $uniqueRollNo[$class][$section][] = $rollno;

			if(isset($UniqueStudentID[$student_id])) {
				if(in_array($student_id,$UniqueStudentID) && $line[$i][0]!="") $this->error[] = $student_id." DA ID is duplicate, line no:".($i+1)." in excel sheet.<br>";
			}
			else $UniqueStudentID[$student_id] = $student_id;
			
			
			if($line[$i][4]=="") $this->error[] = " Roll No is missing in line ".($i+1)."<br>";
			
			if(!is_numeric($rollno)) $this->error[] = "Roll No should be numeric in line ".($i+1)."<br>";
		
			if($email!="" && !filter_var($email, FILTER_VALIDATE_EMAIL)) $this->error[] = "Email is not valid in line ".($i+1)."<br>";
		}
		
	}
	
	function AddStudents($line){

        global $constant_da;

		# active order
		$totalStudents = 0;
		$query = "SELECT SUM(b.total_students) AS total FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster a,{$constant_da(COMMON_DATABASE)}.da_orderBreakup b WHERE a.order_id=b.order_id AND schoolCode='$this->schoolCode' AND year = $this->year";
		$dbqry = new dbquery($query,$this->connid);
		$result = $dbqry->getrowarray();
		$total_students = $result["total"];
		
		$num_row = count($line);
		$num_column = sizeof($line[0]);
		$total_inserted = 0;
		for ($i=1;$i<$num_row-1;$i++) {
			
			$student_id = trim($line[$i][0]);
			$student_name = trim($line[$i][1]);
			$class = trim($line[$i][2]);
			$section = trim($line[$i][3]);
			$rollno = trim($line[$i][4]);
			$email = trim($line[$i][5]);
			$section = strtoupper($section);
			$status = 1;
			if($total_inserted > $total_students)
				$status = 2;
			
			$check_query = "SELECT count(*) as total FROM da_studentMaster WHERE studentID = '".$student_id."' AND schoolCode ='".$this->schoolCode."'";
			$check_dbqry = new dbquery($check_query,$this->connid);
			$check_result = $check_dbqry->getrowarray();
			if($check_result["total"] > 0) {
				
				$insert_query = "INSERT INTO da_studAcadDetails (studentID,class,section,rollNo,year,status,created_dt,created_by)
								 VALUES ('".$student_id."','".$class."','".$section."','".$rollno."','".$this->year."',$status,NOW(),'".$_SESSION["username"]."')";
				$insert_dbqry = new dbquery($insert_query,$this->connid);
				if($insert_dbqry->affectedrows() > 0) $total_inserted++;
				
			}else {
				$this->msg .= "<br/>DA Id :".$student_id." not exist for schoolcode!";
			}
		}
		
		if($total_inserted > 0) $this->msg .= "<br/>Total Records Inserted ::".$total_inserted;
		else $this->error[] = "Unexpected Error Occurred ..! Please try again after some time..!";
	}
	
	function PageUploadStudents(){
		
        global $constant_da;

		$this->setpostvars();
		$this->setgetvars();
		
		if($this->submited && $this->action == "DownloadLastYearData"){
			
			$query = "SELECT order_id,year FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster WHERE year < '".$this->year."' ORDER BY order_id DESC LIMIT 1";
			$dbqry = new dbquery($query,$this->connid);
			$result = $dbqry->getrowarray();
			$lastYear = $result["year"];
			$this->DownloadData($this->schoolCode,$lastYear);
		}
		
	}
	# Anas
	function addNewStudents(){
		$this->setpostvars();
		if($this->submited=="1") {
			
			$schoolCode=$this->schoolCode;
			$year=$this->year;
			
			//query to add new students - if duplicate exists then stop
			foreach($this->addRollNo as $class_key=>$class_value) {
				$limit=$this->orderLimitReached($schoolCode,$class_key,$year);
				foreach($class_value as $section_key=>$rollnoArray) {
					foreach($rollnoArray as $studentID=>$rollno) {
						if(!$this->isStudentExists($schoolCode,$class_key,$section_key,$rollno,$year)) {
							$statusCond="";
							if($limit<=0) {
								$statusCond=", status=2";
							}
							
							$email = $this->email_key[$studentID];
							$name = $this->name_key[$studentID];
							$password=generatePassword(6);

							$name=$this->formatStudentName($name);
							
							$query = "INSERT INTO da_studentMaster SET studentName='".addslashes($name)."',schoolCode='".$schoolCode."',password='".md5($password)."',email='".$email."',created_by='".$_SESSION[username]."',created_dt='".date('Y-m-d H:i:s')."'";
							$dbqry = new dbquery($query,$this->connid);
							
							$insertID = $dbqry->insertid;
							
							$query ="INSERT INTO da_studAcadDetails SET studentID= '".$insertID."', class='".$class_key."',section='".$section_key."',rollNo='".$rollno."', year='".$year."' , created_by='".$_SESSION[username]."',created_dt='".date('Y-m-d H:i:s')."' ".$statusCond;
							$dbqry->dbquery($query,$this->connid);

							$query = "INSERT INTO da_studentPasswords SET studentID='".$insertID."',password='".$password."'";
							$dbqry->dbquery($query,$this->connid);
							
							$limit--;
						} else {
							$errorInAdd[$class_key][$section_key][] = $rollno;
						}
					}
				}
			}
			$query="UPDATE da_studentMaster SET username=studentID WHERE username='' AND schoolCode='".$schoolCode."'";
			$dbqry=new dbquery($query,$this->connid);
		}
		if(sizeof($errorInAdd)) {
			$msg.="<p>Error in adding following students:</p>";
			foreach($errorInAdd as $class_key=>$class_value) {
				foreach($class_value as $section_key=>$rollnoArray) $msg.="<br>In class ".$class_key.$section_key." roll no ".implode(", ",$rollnoArray). " is/are duplicate(s)";
			}
		}
		return $msg;
	}

	function isStudentExists($schoolCode,$class,$section,$rollno, $order_year){
	//	$query = "SELECT COUNT(*) as count FROM da_studentMaster WHERE schoolCode='$schoolCode' AND class='$class' AND section='$section' AND rollNo='$rollno' AND enabled=1";
		$query = "SELECT COUNT(*) as count FROM da_studentMaster left join da_studAcadDetails on da_studentMaster.studentID =da_studAcadDetails.studentID WHERE da_studentMaster.schoolCode='".$schoolCode."' AND da_studAcadDetails.class='".$class."' AND da_studAcadDetails.section='".$section."' AND da_studAcadDetails.rollNo='".$rollno."' AND da_studentMaster.enabled=1 AND da_studAcadDetails.year='".$order_year."'";
		$dbqry = new dbquery($query,$this->connid);
		$row = $dbqry->getrowarray();
		if($row[count]>0) return TRUE;
		else return FALSE;
	}

	function orderLimitReached($schoolCode,$class,$order_year){
		global $constant_da;
        
		$query="SELECT count(*)	FROM da_studentMaster a 
				LEFT JOIN da_studAcadDetails c on a.studentID=c.studentID 
				WHERE a.schoolCode='".$schoolCode."' AND c.class='".$class."' AND a.enabled=1 
				AND c.status != 0
				AND c.year='".$order_year."'";
		$dbqry = new dbquery($query,$this->connid);
		
		$actualcount=$dbqry->getrowarray();
		$actualcount=$actualcount[0];
		$query="SELECT SUM(a.total_students) FROM {$constant_da(COMMON_DATABASE)}.da_orderBreakup a, {$constant_da(COMMON_DATABASE)}.da_orderMaster b 
		 		WHERE b.schoolCode='".$schoolCode."' AND b.year='".$order_year."' AND b.order_id=a.order_id 
		 		AND a.class='".$class."'";
		$dbqry->dbquery($query,$this->connid);
		$totalcount = $dbqry->getrowarray();
		$totalcount = $totalcount[0];
		return ($totalcount - $actualcount);
	}
	
	function PageActivateStudents() {
        global $constant_da;
		$this->setpostvars();
		
		if($this->submited=="trueOne") {
			$this->studentID = $this->action;
			$query = "UPDATE da_studAcadDetails SET status = 1 WHERE studentID = $this->studentID AND year = $this->year";
			$dbqry = new dbquery($query,$this->connid);
			$this->msg = "Student Activated!";
		}
		if($this->submited=="trueAll") {
			$cond = "";
			if(isset($this->schoolCode) && $this->schoolCode!='') {
				$cond = " AND da_studAcadDetails.studentID=da_studentMaster.studentID AND da_studentMaster.schoolCode=$this->schoolCode";
			}
			$query = "UPDATE da_studAcadDetails, da_studentMaster SET da_studAcadDetails.status = 1 WHERE da_studAcadDetails.year = $this->year AND da_studAcadDetails.status = 2".$cond;
			$dbqry = new dbquery($query,$this->connid);
			$this->msg = "All Students Activated!";
		}
		
		$cond="";
		if(isset($this->schoolCode) && $this->schoolCode!='') {
			$cond = " AND da_studentMaster.schoolCode=$this->schoolCode";
		}
		$query = "SELECT schools.schoolname, da_studAcadDetails.studentID, da_studentMaster.studentName, da_studAcadDetails.class, da_studAcadDetails.section, da_studAcadDetails.rollNo, da_studentMaster.email 
				FROM da_studAcadDetails, da_studentMaster, {$constant_da(COMMON_DATABASE)}.schools 
				WHERE da_studAcadDetails.studentID=da_studentMaster.studentID AND da_studentMaster.schoolCode=schools.schoolno 
				AND da_studAcadDetails.status=2 AND da_studAcadDetails.year=$this->year".$cond;
		$dbqry = new dbquery($query,$this->connid);
		$studentInfo = array();
		while($result=$dbqry->getrowarray()) {
			$studentInfo[] = $result;
		}
		return $studentInfo;
	}
	
	function getClassRegisteredActualCount() {
        global $constant_da;
		if(isset($this->schoolCode) && $this->schoolCode!='') {
			$classes = array();
			$query = "SELECT DISTINCT(class) from {$constant_da(COMMON_DATABASE)}.da_orderBreakup a, {$constant_da(COMMON_DATABASE)}.da_orderMaster b
					  WHERE b.order_id=a.order_id AND b.schoolCode=".$this->schoolCode." AND b.year=".$this->year;
			$dbqry = new dbquery($query,$this->connid);
			while($result=$dbqry->getrowarray()) {
				$classes[] = $result['class'];
			}
			$final_count = array();
			foreach ($classes as $class) {
				$query = "SELECT SUM(a.total_students) FROM {$constant_da(COMMON_DATABASE)}.da_orderBreakup a, {$constant_da(COMMON_DATABASE)}.da_orderMaster b 
						  WHERE b.schoolCode=".$this->schoolCode." AND b.year=".$this->year." AND b.order_id=a.order_id 
						  AND a.class=".$class;
				$dbqry = new dbquery($query,$this->connid);
				$totalcount = $dbqry->getrowarray();
				$totalcount = $totalcount[0];

				$query1="SELECT count(*) FROM da_studentMaster a 
						LEFT JOIN da_studAcadDetails c on a.studentID=c.studentID 
						WHERE a.schoolCode=".$this->schoolCode." AND c.class=".$class." AND a.enabled=1 
						AND c.status != 0
						AND c.year=".$this->year;
				$dbqry1 = new dbquery($query1,$this->connid);
				$actualcount=$dbqry1->getrowarray();
				$actualcount = $actualcount[0];
				
				$final_count[$class]['reg'] = $totalcount;
				$final_count[$class]['actual'] = $actualcount;
			}
			return $final_count;
		}
	}

	// format student name 
	function formatStudentName($student_name)
	{
		// remove junk characters from name
		
		$student_name = preg_replace('/[^a-zA-Z0-9_ %\[\]\(\)%&-\']/s', ' ', $student_name); // remove junk characters
		$student_name = preg_replace( "!\s+!", " ", $student_name );  // replace multiple space with single space 
		$student_name = ucwords(strtolower($student_name));
		$student_name =trim($student_name);

		return $student_name;
	}
    
    /** Function getYearlyStudentCount
    * 
    * Returns the number of active students for the given school for the given year
    * To get the list @funtion getDataRelatedToStudentLogin
    * @param ($schoolcode) if empty or 0 function would return with false.
    * @param ($class) optional class. if ignored, count will consider all the classes of the school
    * @param ($section) optional section. if ignored, count will consider data of all the sections of a class
    * @param ($year) e.g. 2015 if ignored current year will be taken.
    * @return (number) student count.  
    *
    */
    
    function getYearlyStudentCount($year, $schoolcode, $class = null, $section = null){
        if(empty($schoolcode)){
           return false;
        }
        if(empty($year)){
            $year = date('Y');
        }
        $studentCountQuery = "SELECT count(da_studentMaster.studentID) as student_count FROM da_studentMaster "
                    . " INNER JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID "
                        . " AND da_studAcadDetails.status = 1 AND da_studentMaster.enabled = 1 AND da_studAcadDetails.year = '$year' "
                    . " AND da_studentMaster.schoolCode = '$schoolcode' WHERE 1 = 1";       
        if(!is_null($class) && $class != ''){
            $studentCountQuery .= " AND da_studAcadDetails.class = '$class'";
        }
        if(!is_null($section) && $section != '' ){
            $studentCountQuery .= " AND da_studAcadDetails.section = '$section'";
        }
        $dbqry = new dbquery($studentCountQuery,$this->connid);
        $row = $dbqry->getrowassocarray();
        return $row['student_count'];    
    }
    
    /** Function getActiveStudentDetails
    * 
    * Returns student details for a given student ID.
    * @param ($studentID) if empty or 0 function would return with false.
    * @return (array) student details.  
    *
    */
    
    function getActiveStudentDetails($studentID, $year = null){
        if(empty($studentID)){
            return null;
        }        
        $studentDetailsQuery = "SELECT da_studentMaster.studentID, da_studentMaster.schoolCode, da_studentMaster.studentName, "
                . " da_studentMaster.dob, da_studentMaster.username, da_studentMaster.email,da_studentMaster.gender,"
                . " da_studAcadDetails.class, da_studAcadDetails.section, da_studAcadDetails.rollNo, "
                . " da_studAcadDetails.year, da_studAcadDetails.status, da_studAcadDetails.updated_dt, da_studAcadDetails.created_dt "
                . " FROM da_studentMaster INNER JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID"
                . " AND da_studentMaster.enabled = 1 AND da_studAcadDetails.status = 1"
                . " WHERE da_studentMaster.studentID = '$studentID'";
        if(!empty($year)){
            $studentDetailsQuery .= " AND year = '$year'";
        }else{
            $studentDetailsQuery .= " ORDER BY year DESC LIMIT 1";
        }
        $dbqry = new dbquery($studentDetailsQuery,$this->connid);
        $student = $dbqry->getrowassocarray();
        return $student;
    }       
    
    function setStudentID($studentId){
        $this->studentID = $studentId;
    }
    
    function setYear($year){
        $this->year = $year;
    }
    
    function getStudentCommonOrderDetailsByDAID($activeCheck = false){
        if(!empty($this->studentID)){
            $studentCommonOrderDetailQuery = "SELECT client_userid, DA_userID, first_name, last_name, DA_username, dob, gender, schoolCode"
                    . " FROM common_user_details"
                    . " WHERE DA_userID = '$this->studentID'";
            if($activeCheck === true){
                $studentCommonOrderDetailQuery .= " AND DA_enabled = 1";
            }
            $dbqry = new dbquery($studentCommonOrderDetailQuery,$this->connid);
            $student = $dbqry->getrowassocarray();
            return $student;
        }
        return null;
    }
}
?>
