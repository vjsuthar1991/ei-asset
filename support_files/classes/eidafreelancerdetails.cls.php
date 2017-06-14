<?php
class clsdafreelancer
{
	var $connid;
	var $userid;
	var $username;
	var $fullname;
	var $company;
	var $type;
	var $entered_dt;
	var $entered_by;
	var $lastModified;
	var $action;
	var $submitted;
	var $disable_flag;
	
	function clsdafreelancer($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->userid = 0;
		$this->username = "";
		$this->fullname = "";
		$this->company = "";
		$this->type = "";
		$this->action = "";
		$this->submited = "";
		$this->entered_dt = "";
		$this->entered_by = "";
		$this->lastModified = "";	
		$this->disable_flag = 0;
	}
	
	function setpostvars()
	{  
		if(isset($_POST["clsdafreelancer_hdnsubmited"])) $this->submited = $_POST["clsdafreelancer_hdnsubmited"];
		if(isset($_POST["clsdafreelancer_hdnaction"])) $this->action = $_POST["clsdafreelancer_hdnaction"];		
		if(isset($_POST["clsdafreelancer_username"])) $this->username = $_POST["clsdafreelancer_username"];		
		if(isset($_POST["clsdafreelancer_fullname"])) $this->fullname = $_POST["clsdafreelancer_fullname"];
		if(isset($_POST["clsdafreelancer_company"])) $this->company = $_POST["clsdafreelancer_company"];
		if(isset($_POST["clsdafreelancer_type"])) $this->type = $_POST["clsdafreelancer_type"];
		if(isset($_POST["clsdafreelancer_disable_flag"])) $this->disable_flag = $_POST["clsdafreelancer_disable_flag"];
	}	
	
	function setgetvars()
    {
     	if(isset($_GET["userid"])) $this->userid = trim($_GET["userid"]);   
    }
    
    function freelancerTableList()
    {
    	$this->setpostvars();
    	$this->setgetvars();
    	$ResultArr = array();
    	$condition = "";
    	if(isset($this->username) && $this->username != '')
    		$condition .= "AND username = '".$this->username."'";
    	if(isset($this->company) && $this->company != '')
    		$condition .= "AND company = '".$this->company."'"; 	
    	if(isset($this->type) && $this->type != '')
    		$condition .= "AND type = '".$this->type."'"; 				
    	$query = "SELECT * from da_freelancerDetails WHERE 1=1 $condition";
    	$dbqry = new dbquery($query,$this->connid);
    	while($result = $dbqry->getrowarray()){
    		
    		$ResultArr[] = array("userid"=> $result["id"],
    						     "username" => $result["username"],
    						     "fullname" => $result["fullname"],
    						     "company" => $result["company"],
    						     "type" => $result["type"],
    						     "entered_dt" => $result["entered_dt"],	 
    						     "entered_by" => $result["entered_by"],
    						     "lastModified" => $result["lastModified"],
    						     "disable_flag" => $result["disable_flag"]
    						     );
    	}    	
    	return $ResultArr;        	  	
    }
    
    function PageAddEdit()
    {
        $this->setgetvars();
        $this->setpostvars();
        
        if($this->submited)
        {
            if($this->action == "Save")
            {
                $this->savedata($this->userid);
            }
        }
        $this->retrivedata($this->userid);
    } 
    
    function retrivedata($userid){
    	
    	if($userid == 0 )    
            return;
     	
     	$query = "SELECT * FROM da_freelancerDetails WHERE id = ".$userid;
     	$dbqry = new dbquery($query,$this->connid);       	
        if($dbqry->numrows() > 0 )
        {
            $row = $dbqry->getrowarray();
            $this->userid = $row["id"];
            $this->username= $row["username"];
            $this->fullname = $row["fullname"];
            $this->company = $row["company"];
            $this->type = $row["type"];
            $this->entered_dt = $row["entered_dt"];
		    $this->entered_by = $row["entered_by"];
		    $this->lastModified = $row["lastModified"];    
		    $this->disable_flag = $row["disable_flag"];        
        }
    }
    
     function savedata($userid=0){
    	
    	if($userid == 0)
    	{
    		$query_check = "select count(id) from da_freelancerDetails where username = '".$this->username."'";
    		$dbqry_check = new dbquery($query_check,$this->connid);
    		$row_check = $dbqry_check->getrowarray();
    		if($row_check[0]>0)
    		{
    			$this->action = "";
    			echo "<script>alert('Same username exist in system!');</script>";
    		}	
    		else
    		{	 
 				$main_query = "INSERT INTO da_freelancerDetails (username,password,fullname,company,type,entered_dt,entered_by,lastModified,disable_flag) 
 							   VALUES ('".$this->username."',password('".$this->username."'),'".$this->fullname."','".$this->company."','".$this->type."',
 							   '".date('Y-m-d')."','".$_SESSION["username"]."',NOW(),'".$this->disable_flag."')";
    		}	
    	}	
    	else
		{
			/*$query_check = "select count(id) from da_freelancerDetails where username = '".$this->username."'";
			$dbqry_check = new dbquery($query_check,$this->connid);
    		$row_check = $dbqry_check->getrowarray();
    		$query_check_id = "select username from da_freelancerDetails where id = '".$this->userid."'";
    		$dbqry_check_id = new dbquery($query_check_id,$this->connid);
    		$row_check_id = $dbqry_check_id->getrowarray();
    		if($row_check[0]>0 && $row_check_id[0]!=$this->username)
    		{	
    			$this->action = "";
    			echo "<script>alert('Same username exist in system!');</script>";
    		}	
    		else
    		{*/	 	
			    $main_query = "UPDATE da_freelancerDetails SET username = '".$this->username."',password = password('".$this->username."'),fullname = '".$this->fullname."',
			    			   company='".$this->company."',type='".$this->type."',entered_dt='".date('Y-m-d')."',entered_by='".$_SESSION["username"]."',lastModified=NOW(),
			    			   disable_flag='".$this->disable_flag."' WHERE id = '".$userid."'";
    		/*}*/    
		}
			
    	$dbqry = new dbquery($main_query,$this->connid);
    	return $dbqry->insertid;
    	
    }
    
}    