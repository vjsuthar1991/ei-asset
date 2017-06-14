<?

class clstaskTracker
{
	var $taskCode;
	var $taskCategory;
	var $taskSubCategory;
	var $taskTitle;
	var $taskDescription;
	var $taskType;
	var $complexity;
	var $assignedTo;
	var $assignedOn;
	var $solvedBy;
	var $solvedOn;
	var $priority;
	var $status;
	var $requestBy;
	var $requestOn;
	var $addedBy;
	var $addedOn;
	var $updatedBy;
	var $updatedOn;
	var $comments;
	var $attachDocument;
	var $message;
	var $actiontoperform;
	var $txtNewCategory;
	var $txtNewSubCategory;
	
	function clstaskTracker()
	{
		$this->taskCode="";
		$this->taskCategory="Mindspark";
		$this->taskSubCategory="";
		$this->taskTitle="";
		$this->taskDescription="";
		$this->taskType="";
		$this->complexity="";
		$this->assignedTo="";
		$this->assignedOn="";
		$this->solvedBy="";
		$this->solvedOn="00-00-0000";
		$this->priority="5";
		$this->status="Request";
		$this->requestBy=$_SESSION['username'];
		$this->requestOn=date("Y-m-d");
		$this->addedBy="";
		$this->addedOn="";
		$this->updatedBy=$_SESSION['username'];
		$this->updatedOn=date("d-m-Y");
		$this->comments="";
		$this->attachDocument="";
		$this->message="";
		$this->actiontoperform="";
		$this->txtNewCategory="";
		$this->txtNewSubCategory="";
		
	}
	
	function setpostvars()
	{
		if(isset($_REQUEST["taskCode"]))						$this->taskCode = trim($_REQUEST["taskCode"]);
		if(isset($_POST["taskCategory"])) 						$this->taskCategory = trim($_POST["taskCategory"]);
		if(isset($_POST["taskSubCategory"])) 					$this->taskSubCategory = trim($_POST["taskSubCategory"]);
		if(isset($_POST["taskTitle"])) 							$this->taskTitle = trim($_POST["taskTitle"]);
		if(isset($_POST["taskDescription"])) 					$this->taskDescription = trim($_POST["taskDescription"]);
		if(isset($_POST["taskType"]))							$this->taskType = trim($_POST["taskType"]);
		if(isset($_POST["complexity"]))							$this->complexity = trim($_POST["complexity"]);
		if(isset($_POST["assignedTo"])) 						$this->assignedTo = trim($_POST["assignedTo"]);
		if(isset($_POST["assignedOn"])) 						$this->assignedOn = trim($_POST["assignedOn"]);
		if(isset($_POST["solvedBy"])) 							$this->solvedBy = trim($_POST["solvedBy"]);
		if(isset($_POST["solvedOn"])) 							$this->solvedOn = trim($_POST["solvedOn"]);
		if(isset($_POST["priority"])) 							$this->priority = trim($_POST["priority"]);
		if(isset($_POST["status"])) 							$this->status = trim($_POST["status"]);
		if(isset($_POST["requestBy"])) 							$this->requestBy = trim($_POST["requestBy"]);
		if(isset($_POST["comments"])) 							$this->comments = trim($_POST["comments"]);
		if(isset($_FILES["attachDocument"]))					$this->attachDocument = trim($_FILES["attachDocument"]["name"]);
		if(isset($_POST["requestOn"])) 							$this->requestOn = trim($_POST["requestOn"]);
		if(isset($_REQUEST["actiontoperform"]))					$this->actiontoperform = trim($_REQUEST["actiontoperform"]);
		if(isset($_POST["txtNewCategory"]))						$this->txtNewCategory = trim($_POST["txtNewCategory"]);
		if(isset($_POST["txtNewSubCategory"]))					$this->txtNewSubCategory = trim($_POST["txtNewSubCategory"]);
		
		if(isset($_REQUEST['txtNewCategory']) && $_REQUEST['txtNewCategory']!="")
		{
			$this->taskCategory = $_REQUEST['txtNewCategory'];
		}
		if(isset($_REQUEST['txtNewSubCategory']) && $_REQUEST['txtNewSubCategory']!="")
		{
			$this->taskSubCategory = $_REQUEST['txtNewSubCategory'];
		}
	}
	
	function addNew()
	{
		if($this->txtNewSubCategory!="")
		{
			//Add new category in master list
			mysql_query("INSERT INTO issue_master SET category='".$this->taskCategory."', subcategory='".$this->txtNewSubCategory."'") or die(mysql_error());
		}
	}
	
	function addTask(){
			
			if($_SESSION['username']=='sridhar' || $_SESSION['username']=='suchi')
			{
				$status='Open';
				
			}
			else
				$status='Request';
			if($this->priority!='5')
				$data="'".$_SESSION['username']."', '".date("Y-m-d")."',";
			else
				$data="' ', '0000-00-00',";	
				
			$ins_query =  "INSERT INTO issue_tracker (`taskCategory`,`taskSubCategory`,`taskTitle`,`taskDescription`,`taskType`,`complexity`,`assignedTo`,`assignedOn`,priority,status,
			`requestBy`,`requestOn`,`addedBy`,`addedOn`,`attachDocument`,`comments`) values 
						  ('" .$this->taskCategory."','" .$this->taskSubCategory."', '" .$this->taskTitle."', '" .$this->taskDescription."',
						  '".$this->taskType."','".$this->complexity."','".$this->assignedTo."','" .formatDate($this->assignedOn)."','" .$this->priority."','".$status."',
						  '" .$this->requestBy."', '" .formatDate($this->requestOn)."',
						  ".$data."'".$this->attachDocument."','".$this->comments."')";
			//echo $ins_query."<br>".$data;
			
			mysql_query($ins_query) or die(mysql_error());
			$this->taskCode = mysql_insert_id();
			$this->message = "Inserted successfully...Your Task Code is: ".$this->taskCode;
			
			$this->uploadFile();
			
			echo "<script>parent.history.go(0);</script>";
		
	}
	
	function updateTask(){
	
			$this->addVersion();
			
			$update_query = "UPDATE issue_tracker SET taskCategory='".$this->taskCategory."',taskSubCategory='" .$this->taskSubCategory."',taskTitle='" .$this->taskTitle."',
			taskDescription='" .$this->taskDescription."',taskType='".$this->taskType."',complexity='".$this->complexity."',assignedTo='".$this->assignedTo."',assignedOn='" .formatDate($this->assignedOn)."',solvedBy='" .$this->solvedBy."',
			solvedOn='" .formatDate($this->solvedOn)."',status='" .$this->status."',requestBy='" .$this->requestBy."',requestOn='" .formatDate($this->requestOn)."'";
			
			$querytc = "SELECT priority FROM issue_tracker WHERE taskCode=".$this->taskCode;
			$resulttc = mysql_query($querytc);
			$rowtc = mysql_fetch_array($resulttc);
			$current_priority = $rowtc['priority'];
			
			if($this->priority !='5' && $current_priority!=$this->priority)
				$update_query .= ",priority='" .$this->priority."',addedBy='" .$_SESSION['username']."',addedOn='".$this->addedOn."'";
				
			if($this->attachDocument!='')
				$update_query .= ",attachDocument='".$this->attachDocument."'";
			
			$update_query .= ",updatedBy='" .$this->updatedBy."',updatedOn='" .formatDate($this->updatedOn)."',comments='".$this->comments."' WHERE taskCode=".$this->taskCode;
			
			//echo $update_query;
			mysql_query($update_query) or die(mysql_error());
			$this->message = "Task Code ".$this->taskCode." Updated successfully...";
			
			if($this->attachDocument!='')
				$this->uploadFile();
			
			echo "<script>parent.history.go(0);</script>";
			
	}
	
	function deleteTask(){
		
		$this->addVersion();
		
		$delete_query = "DELETE FROM issue_tracker WHERE taskCode=".$this->taskCode;
				
		//echo $delete_query;
		mysql_query($delete_query) or die(mysql_error());
		$this->message = "Task Code ".$this->taskCode." Deleted successfully...";
		echo "<script>parent.history.go(0);</script>";
	}
	
	function addVersion(){
		
		$version_query = "INSERT INTO issue_tracker_history SELECT * FROM issue_tracker WHERE taskCode=".$this->taskCode;
		
		//echo $delete_query;
		mysql_query($version_query) or die(mysql_error());
	}
	
	function uploadFile(){
		
		$file_name = $this->attachDocument;
		if($file_name != '')
		{
			if ($_FILES["file"]["error"] > 0)
		    {
		    	echo "Error: " . $_FILES["file"]["error"] . "<br />";
		    }
			copy ($_FILES['attachDocument']['tmp_name'], "files/".$this->attachDocument) or die ("Upload Fail");
	
			echo "Name: ".$file_name."<br>";
	    	echo "Size: ".$_FILES['attachDocument']['size']."<br>";
	    	echo "Type: ".$_FILES['attachDocument']['type']."<br>";
	    	echo "Copy Done....<br>";
	    }
	}
	
	function populateDetails($taskID)	{
		$query = "SELECT * FROM issue_tracker WHERE taskCode=".$taskID;
		//echo $query;
		$result = mysql_query($query);
		$line = mysql_fetch_array($result);
		$this->taskCode				= $taskID;
		$this->taskCategory			= $line['taskCategory'];
		$this->taskSubCategory		= $line['taskSubCategory'];
		$this->taskTitle			= $line['taskTitle'];
		$this->taskDescription		= $line['taskDescription'];
		$this->taskType				= $line['taskType'];
		$this->complexity			= $line['complexity'];
		$this->assignedTo			= $line['assignedTo'];
		$this->assignedOn			= $line['assignedOn'];
		$this->solvedBy				= $line['solvedBy'];
		$this->solvedOn				= $line['solvedOn'];
		$this->priority				= $line['priority'];
		$this->status				= $line['status'];
		$this->requestBy			= $line['requestBy'];
		$this->requestOn			= $line['requestOn'];
		$this->comments				= $line['comments'];
	}
}

?>
