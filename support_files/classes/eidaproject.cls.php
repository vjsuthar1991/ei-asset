<?php
class clsproject
{
	var $project_id;
	var $subjectno;
	var $class;
	var $topic_code;
	var $project_name;
	var $project_desc;
	var $pdf_uploaded;
	var $created_by;
	var $created_dt;
	var $updated_by;
	var $updated_dt;
	var $submitted;
	var $action;
	var $temp_file_name;
    var $file_name;
    var $file_type;
    var $file_size;
    var $file_error;
    var $file_array;
    var $project_idarr;
	var $subjectnoarr;
	var $distributionarr;
	var $distribution;
	var $durationarr;
	var $duration_value;
	var $duration_unit;
	var $placearr;
	var $place;
	var $classarr;
	var $topic_codearr;
	var $project_namearr;
	var $project_descarr;
	var $pdf_uploadedarr;
	var $created_byarr;
	var $created_dtarr;
	var $updated_byarr;
	var $updated_dtarr;
    var $flagset;
    var $idset;
    var $file_extension;
    var $msg;
    
	function clsproject()
	{
		$this->project_id = "";
		$this->subjectno = "";
		$this->class = "";
		$this->topic_code = "";
		$this->project_name = "";
		$this->project_desc = "";
		$this->pdf_uploaded = "";
		$this->created_by = "";
		$this->created_dt = "";
		$this->updated_by = "";
		$this->updated_dt = "";
		$this->submited = "";
        $this->action = "";
        $this->temp_file_name = "";
		$this->file_name = "";
		$this->file_type = "";
		$this->file_size = "";
        $this->distributionarr = array();
        $this->durationarr = array();
        $this->placearr = array();
		$this->file_error = "";
		$this->file_array = "";
		$this->project_idarr = array();
		$this->subjectnoarr = array();
		$this->classarr = array();
		$this->topic_codearr = array();
		$this->project_namearr = array();
		$this->project_descarr = array();
		$this->pdf_uploadedarr = array();
		$this->created_byarr = array();
		$this->created_dtarr = array();
		$this->updated_byarr = array();
		$this->updated_dtarr = array();
		$this->flagset = "";
		$this->idset = "";
		$this->file_extension = "";
		$this->msg = "";
        $this->duration_value = "";
        $this->duration_unit = "";
        $this->place = "";
        $this->distribution = "";
	}
	
	function setpostvars()
	{	
		if(isset($_POST["clsproject_hdnsubmited"])) $this->submited = $_POST["clsproject_hdnsubmited"];
		if(isset($_POST["clsproject_hdnaction"])) $this->action = $_POST["clsproject_hdnaction"];
		if(isset($_POST["clsproject_subjectno"])) $this->subjectno = $_POST["clsproject_subjectno"];
		if(isset($_POST["clsproject_class"])) $this->class = $_POST["clsproject_class"];
		if(isset($_POST["clsproject_topic"])) $this->topic_code = $_POST["clsproject_topic"];
		if(isset($_POST["clsproject_project_name"])) $this->project_name = $_POST["clsproject_project_name"];
		if(isset($_POST["clsproject_project_desc"])) $this->project_desc = $_POST["clsproject_project_desc"];
		if(isset($_POST["clsproject_pdf_uploaded_hidden"])) $this->pdf_uploaded = $_POST["clsproject_pdf_uploaded_hidden"];
		if(isset($_POST["clsproject_file_extension"])) $this->file_extension = $_POST["clsproject_file_extension"];
		if(isset($_POST["clsproject_projectid"])) $this->project_id = $_POST["clsproject_projectid"];
				
		if(isset($_POST["clsproject_subjectnoarr"])) $this->subjectnoarr = $_POST["clsproject_subjectnoarr"];
		if(isset($_POST["clsproject_classarr"])) $this->classarr = $_POST["clsproject_classarr"];
		if(isset($_POST["clsproject_topicarr"])) $this->topic_codearr = $_POST["clsproject_topicarr"];
		if(isset($_POST["clsproject_project_namearr"])) $this->project_namearr = $_POST["clsproject_project_namearr"];
		if(isset($_POST["clsproject_project_descarr"])) $this->project_descarr = $_POST["clsproject_project_descarr"];
		
		if(isset($_POST["flagset"])) $this->flagset = $_POST["flagset"];
		if(isset($_POST["idset"])) $this->idset = $_POST["idset"];
                
		if(isset($_POST["clsproject_project_division_arr"])) $this->distributionarr = $_POST["clsproject_project_division_arr"];
		if(isset($_POST["clsproject_project_duration_arr"])) $this->durationarr = $_POST["clsproject_project_duration_arr"];
		if(isset($_POST["clsproject_project_place_arr"])) $this->placearr = $_POST["clsproject_project_place_arr"];
		
        if(isset($_POST["clsproject_project_division"])) $this->distribution = $_POST["clsproject_project_division"];
        if(isset($_POST["clsproject_project_place"])) $this->place = $_POST["clsproject_project_place"];

        if(isset($_POST["clsproject_project_duration"])){ 
            $durationt = explode('-',$_POST["clsproject_project_duration"]);
            if(count($durationt) > 0){
                $this->duration_unit = $durationt[1];
                $this->duration_value = $durationt[0];
            }                    
        }
	}
	function setgetvars()
	{
		 if(isset($_GET["project_id"])) $this->project_id = trim($_GET["project_id"]);
	}
        function setfilevars($inputName = "clsproject_pdf_uploaded")
        {
            $this->file_array = $_FILES[$inputName];
            $this->temp_file_name = $_FILES[$inputName]['tmp_name'];
            $this->file_error = $_FILES[$inputName]['error'];
            $this->file_name = $_FILES[$inputName]['name'];
            $this->file_type = $_FILES[$inputName]["type"];
            $this->file_size = $_FILES[$inputName]["size"];
        }
	

	function getSummaryReportCount($subject,$class,$connid)
	{
		$count = 0;
		$query = "SELECT COUNT(*) as count FROM da_projectMaster where subjectno = '$subject' AND class = '$class'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$count = $row["count"];
		}
		return $count;	
	}
	
	function PageEdit($connid)
        {
        $this->setgetvars();
        $this->setpostvars();
        $this->setfilevars("clsproject_pdf_uploaded");
        if($this->submited)
        {
        	if($this->action == "SaveMultiple")
        	{
        		$this->savedataMultiple($connid);
        	}
        	if($this->action == "Delete")
        	{
        		$this->deletePDF($connid);
        	}
        	if($this->action == "SearchList")
            {
            	return $this->retrivedataForSubjectClassTopic($connid);
            }
            if($this->action == "Save")
            {
                $this->savedata($this->project_id,$connid);
            }
            if($this->action == "DelProject"){
            	
            	$this->DeleteProject($connid);
            }
        }
        $this->retrivedata($this->project_id,$connid);
    } 
    
    
    function DeleteProject($connid){
    	
    	$this->retrivedata($this->project_id,$connid);
    	    	
    	if(constant("SERVER_TYPE") == "Live"){
    		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3_constants.php");
			include_once(constant("PATH_ABSOLUTE_S3CONFIG")."S3.php");
			include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3Wrapper.php");
			$s3WrapperObj = new s3Wrapper(constant("awsAccessKey"),constant("awsSecretKey"));
    		
			$file_path = "PDF/PROJECTS/".$this->project_id.".".$this->file_extension;
			$wrapper_res = $s3WrapperObj->deleteFile(constant("DA_BucketName"),$file_path);
    			
    	}else{
    	    $path = constant("PATH_PROJECTPDF").$this->project_id.'.'.$this->file_extension;
    		unlink($path);	
    	}	
    	
    	$query = "DELETE FROM da_projectMaster WHERE project_id = '$this->project_id'";
    	$dbqry = new dbquery($query,$connid); 
    	$this->msg = "Successfully Deleted..!";
    	
    }
    
    function deletePDF($connid)
    {    	
    	if(constant("SERVER_TYPE") == "Live"){
    		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3_constants.php");
			include_once(constant("PATH_ABSOLUTE_S3CONFIG")."S3.php");
			include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3Wrapper.php");
			$s3WrapperObj = new s3Wrapper(constant("awsAccessKey"),constant("awsSecretKey"));
    		
			$file_path = "/PDF/PROJECT/".$this->project_id.".".$this->file_extension;
			$wrapper_res = $s3WrapperObj->deleteFile(constant("DA_BucketName"),$file_path);
    			
    	}else{
    	    $path = constant("PATH_PROJECTPDF").$this->project_id.'.'.$this->file_extension;
    		unlink($path);	
    	}
    	
    	$query = "Update da_projectMaster set pdf_uploaded = 0 where project_id = '$this->project_id'";
    	$dbqry = new dbquery($query,$connid); 
    	
    	$this->retrivedata($this->project_id,$connid);
    }
    
    function retrivedata($project_id,$connid){
    	
    	if($project_id == 0 )    
            return;
     	
     	$query = "SELECT * FROM da_projectMaster WHERE project_id = ".$project_id;
     	$dbqry = new dbquery($query,$connid);       	
        if($dbqry->numrows() > 0 )
        {
            $row = $dbqry->getrowarray();
            $this->project_id   = $row["project_id"];
            $this->subjectno= $row["subjectno"];
            $this->class      = $row["class"];
            $this->distribution = $row["distribution"];
            $this->duration_value = $row["duration_value"];
            $this->duration_unit = $row["duration_unit"];
            $this->place = $row["place"];
            $this->topic_code = $row["topic_code"];
            $this->project_name = $row["project_name"]; 
            $this->project_desc = $row["project_desc"];
            $this->pdf_uploaded = $row["pdf_uploaded"];
            $this->created_by = $row["created_by"];
            $this->created_dt = $row["created_dt"];
            $this->updated_by = $row["updated_by"];
            $this->updated_dt = $row["updated_dt"];
            $this->file_extension = $row["file_extension"];
        }
    }
    
    function retrivedataForSubjectClassTopic($connid)
    {
    	$arrSet = array();
    	$condition = "";
    	if($this->topic_code != '')
    	{
    		$condition = "AND topic_code = ".$this->topic_code;
    	}
    	$query = "SELECT * FROM da_projectMaster WHERE class = ".$this->class." AND subjectno = ".$this->subjectno." $condition";
     	$dbqry = new dbquery($query,$connid);       	
        if($dbqry->numrows() > 0 )
        {
            while($row = $dbqry->getrowarray())
            {
	            $arrSet[$row["project_id"]]["project_id"]   = $row["project_id"];
	            $arrSet[$row["project_id"]]["subjectno"]= $row["subjectno"];
	            $arrSet[$row["project_id"]]["class"] = $row["class"];
	            $arrSet[$row["project_id"]]["topic_code"] = $row["topic_code"];
	            $arrSet[$row["project_id"]]["project_name"] = $row["project_name"]; 
	            $arrSet[$row["project_id"]]["project_desc"] = $row["project_desc"];
	            $arrSet[$row["project_id"]]["pdf_uploaded"] = $row["pdf_uploaded"];
                $arrSet[$row["project_id"]]["created_by"] = $row["created_by"];
                $arrSet[$row["project_id"]]["created_dt"] = $row["created_dt"];
                $arrSet[$row["project_id"]]["updated_by"] = $row["updated_by"];
                $arrSet[$row["project_id"]]["updated_dt"] = $row["updated_dt"];
                $arrSet[$row["project_id"]]["file_extension"] = $row["file_extension"];
                $arrSet[$row["project_id"]]["duration_unit"] = $row["duration_unit"];
                $arrSet[$row["project_id"]]["duration_value"] = $row["duration_value"];
                $arrSet[$row["project_id"]]["distribution"] = $row["distribution"];
                $arrSet[$row["project_id"]]["place"] = $row["place"];
            }
        }
        return $arrSet;
    }
    
	function getTopicsBySubject($connid,$subjectno,$class="",$flflag="")
	{
		$arrRet = array();
		if($subjectno != "")
		{
			$condition = " WHERE subjectno IN (".$subjectno.") ";
			if($class != "")
				$condition .= " AND find_in_set('".$class."',c.class) > 0 ";
			if($this->flflag == "Y" || $flflag == 'Y')	
				$condition .= "AND c.freelancer = '".$_SESSION["username"]."'";
					
			$query = "SELECT DISTINCT a.topic_code, a.description FROM da_topicMaster a
						LEFT JOIN da_subtopicMaster b ON a.topic_code = b.topic_code
						LEFT JOIN da_subSubTopicMaster c ON b.subtopic_code = c.subtopic_code 
                        ".$condition." ORDER BY a.subjectno,a.description";
			
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				$arrRet[$row["topic_code"]] = $row["description"];
			}
		}
		return $arrRet;
	}
	
	function savedataMultiple($connid)
	{            
            $duration_value = null;
            $duration_unit = null;
            foreach($this->project_namearr as $key => $value)
            {
                if($value != '')
                {
                    if($this->subjectnoarr[$key]!='' && $this->classarr[$key]!='' && $this->topic_codearr[$key]!='')
                    {
                        $filename = "clsproject_pdf_uploaded_".$key;
                        $this->setfilevars($filename);
                        $uploaded_filename = basename($this->file_name);
                        $uploaded_fileext = substr($uploaded_filename, strrpos($uploaded_filename, '.') + 1);
                        if((!empty($this->file_array)) && ($this->file_error == 0)) 
                        {
                            $this->pdf_uploaded = 1;
                        }
                        $durationt = explode('-', $this->durationarr[$key]);
                        if(isset($durationt[0])){
                            $duration_value = $durationt[0];
                        }
                        if(isset($durationt[1])){
                            $duration_unit = $durationt[1];
                        }
                        $distribution = $this->distributionarr[$key];
                        $place = $this->placearr[$key];
                        $main_query = "INSERT INTO da_projectMaster (place,distribution,duration_value,duration_unit,subjectno,class,topic_code,project_name,project_desc,pdf_uploaded,file_extension,created_by,created_dt) 
                                   VALUES ('$place' , '$distribution', '$duration_value', '$duration_unit', '".addslashes($this->subjectnoarr[$key])."','".addslashes($this->classarr[$key])."','".$this->topic_codearr[$key]."','".$this->project_namearr[$key]."',
                                   '".$this->project_descarr[$key]."','".$this->pdf_uploaded."','".$uploaded_fileext."','".$_SESSION["username"]."',NOW())";
                        $dbqry = new dbquery($main_query,$connid);    	    	
                        if((!empty($this->file_array)) && ($this->file_error == 0)) 
                        {	
                            $path_set = constant("PATH_PROJECTPDF");
                            $this->uploadFile($dbqry->insertid,"pdf",$this->file_type,"350000",$path_set,$filename);							
                        }
                    }
                }
            }
	}
	
        function savedata($projectid=0,$connid){  
	 		
			include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3_constants.php");
			include_once(constant("PATH_ABSOLUTE_S3CONFIG")."S3.php");
			include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3Wrapper.php");		
			$s3WrapperObj = new s3Wrapper(constant("awsAccessKey"),constant("awsSecretKey"));
			
			$path = constant("PATH_PROJECTPDF").$projectid.'.'.$this->file_extension;
			
			if($this->file_extension == ""){
				$this->setfilevars("clsproject_pdf_uploaded");
				$filename = basename($this->file_name);
			  	$this->file_extension = substr($filename, strrpos($filename, '.') + 1);
			}
			
			if((!empty($this->file_array)) && ($this->file_error == 0)) {						
				$path_set = constant("PATH_PROJECTPDF");
				$this->uploadFile($projectid,"pdf","application/pdf","350000",$path_set,"clsproject_pdf_uploaded");
			}
			$presentDateTime = date('Y-m-d H:i:s');
			$main_query = " UPDATE da_projectMaster SET 
                                        class = '".$this->class."',topic_code = '".$this->topic_code."',project_name = '".$this->project_name."',project_desc = '".$this->project_desc."',
                                        pdf_uploaded = '".$this->pdf_uploaded."',file_extension = '".$this->file_extension."',updated_by = '".$_SESSION["username"]."',updated_dt = '$presentDateTime', "
                                    . " place = '$this->place', distribution = '$this->distribution', duration_value = $this->duration_value, duration_unit = '$this->duration_unit' WHERE project_id = '".$projectid."'";	
			$dbqry = new dbquery($main_query,$connid);
    }
	
    function uploadFile($id,$ext="pdf",$type="application/pdf",$size="350000",$upload_dir='',$inputName = "clsproject_pdf_uploaded")
    {
		$this->setfilevars($inputName);
		if((!empty($this->file_array)) && ($this->file_error == 0)) {
			$filename = basename($this->file_name);
			$ext = substr($filename, strrpos($filename, '.') + 1);
			
			if((($ext == "pdf") && ($this->file_type == "application/pdf")) || (($ext == "doc" || $ext == "docx") && ($this->file_type == "application/msword" || $this->file_type  == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")))
			{			
				$newname = $upload_dir.$id.".$ext";
			    chmod($this->temp_file_name,0644);
			    if((move_uploaded_file($this->temp_file_name,$newname))) {

			       $source_path = constant("PATH_PROJECTPDF").$id.".$ext";
				   $dest_path = "PDF/PROJECTS/".$id.".$ext";
				   	
				   if(constant("SERVER_TYPE") == "Live"){
						$S3Res = $this->MoveToBucket($source_path,$dest_path);
				   }
				   $this->pdf_uploaded = 1;
				   echo "<font size=2 color=green face=verdana><b>Files Uploaded..!</font></b><br>";
			    }else{
			       echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			    }
			}else {
			 	echo "<font size=2 color=red face=verdana><b>Only pdf & word files are allowed.</font></b>";
			}
		} 
		else {
			echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
		}
    }
    function getTopicName($topiccode,$connid)
    {
    	$query = "SELECT description from da_topicMaster where topic_code = '$topiccode'";
    	$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				$topicname = $row["description"];
			}
		return $topicname;
    }
    
    # Moving Files to Bucket
    function MoveToBucket($source_path,$dest_path){

            include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3_constants.php");
            include_once(constant("PATH_ABSOLUTE_S3CONFIG")."S3.php");
            include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3Wrapper.php");

            $s3WrapperObj = new s3Wrapper(constant("awsAccessKey"),constant("awsSecretKey"));
            $wrapper_res = $s3WrapperObj->uploadFile($source_path,constant("DA_BucketName"),$dest_path,S3::ACL_PUBLIC_READ);

            if(($info = $s3WrapperObj->getFileInfo(constant("DA_BucketName"),$dest_path)) !== false){
                    if(file_exists($source_path)) unlink($source_path);
            }
            return $wrapper_res;
    }

    ############For Process Of Test Ordered Count #############
    function getProjectRequestedOrderCount($OrdSubject,$OrdClass,$OrdstartDate,$OrdendDate,$OrdSchool="",$OrdYear,$connid)
    {
            $startDate = "";
            $endDate = "";
            $startDate = date("Y-m-d",strtotime($OrdstartDate));
            $endDate = date("Y-m-d",strtotime($OrdendDate));

            $arrRet = array();
            $condition = "";		
            if($OrdSubject=="All")
            {
                    $condition .= "";
            }
            else 
            {
                    $condition .= " AND subject = '$OrdSubject'";
            }

            if($OrdClass=="All")
            {
                    $condition .= "";
            }
            else 
            {
                    $condition .= " AND class = '$OrdClass'";
            }

            if($OrdSchool!="")
            {
                    $condition .= " AND schooLCode = '$OrdSchool'";
            }

            $queryPRJ = "select subject,class,count(*) as cnt FROM da_testProjects where (requested_dt >= '$startDate' AND requested_dt <= '$endDate') AND year = '$OrdYear' $condition GROUP BY subject,class ORDER BY subject,class";
            $dbqueryPRJ = new dbquery($queryPRJ,$connid);
            while($rowPRJ = $dbqueryPRJ->getrowarray())
            {
                    if($rowPRJ["class"]!=0 && $rowPRJ["subject"]!=0)
                    {
                            $arrRet[$rowPRJ["subject"]][$rowPRJ["class"]]["PRJ"] = $rowPRJ["cnt"];
                    }	
            }	

            return $arrRet;
    }
    ############For Process Of Test Ordered Count #############
    
    public function getProjectDivisions(){
        return array(
            array(
                'label' => 'Group',
                'value' => 'GROUP'
            ),
            array(
                'label' => 'Individual',
                'value' => 'INDIVIDUAL'
            )
        );
    }
    
    public function getProjectPlaces(){
         return array(
            array(
                'label' => 'At School',
                'value' => 'SCHOOL'
            ),
            array(
                'label' => 'Out of School',
                'value' => 'OUT_OF_SCHOOL'
            )
        );
    }
    public function getProjectDuration(){
         return array(
            array(
                'label' => '1 to 2 Hours',
                'value' => 2,
                'unit' => 'HOURS'
            ),
            array(
                'label' => '2 to 4 Hours',
                'value' => 4,
                'unit' => 'HOURS'
            ),
            array(
                'label' => '1 Day',
                'value' => 1,
                'unit' => 'DAY'                
            ),
            array(
                'label' => '2 Days',
                'value' => 2,
                'unit' => 'DAY',
            ),
            array(
                'label' => '1 Week',
                'value' => 1,
                'unit' => 'WEEK'
            ),
            array(
                'label' => 'A Fortnight',
                'value' => 1,
                'unit' => 'FORTNIGHT'
            ),
            array(
                'label' => '1 Month',
                'value' => 1,
                'unit' => 'MONTH'
            )
        );
    }
	
}	
?>