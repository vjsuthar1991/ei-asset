<?php
class clsdaseshaasai
{
	var $connid;
	var $userid;
	var $username;
	var $email;	
	var $user_type;
	var $action;
	var $submited;
	var $created_dt;
	var $created_by;
	var $updated_dt;    
	var $updated_by;
	var $zone;
	var $disable_flag;
	var $state;
	
	function clsdaseshaasai($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->userid = 0;
		$this->username = "";
		$this->email = "";
		$this->user_type = 0;
		$this->action = "";
		$this->submited = "";		
		$this->created_dt = "";
	    $this->created_by = "";
	    $this->updated_dt = "";    
	    $this->updated_by = "";
	    $this->zone = array();
	    $this->disable_flag = 0;
	    $this->state = array();
	}
	
	function setpostvars()
	{  		
		if(isset($_POST["clsdaseshaasai_hdnsubmited"])) $this->submited = $_POST["clsdaseshaasai_hdnsubmited"];
		if(isset($_POST["clsdaseshaasai_hdnaction"])) $this->action = $_POST["clsdaseshaasai_hdnaction"];		
		if(isset($_POST["clsdaseshaasai_username"])) $this->username = $_POST["clsdaseshaasai_username"];		
		if(isset($_POST["clsdaseshaasai_email"])) $this->email = $_POST["clsdaseshaasai_email"];
		if(isset($_POST["clsdasessashai_user_type"])) $this->user_type = $_POST["clsdasessashai_user_type"];
		if(isset($_POST["clsdasessashai_zone"])) $this->zone = $_POST["clsdasessashai_zone"];
		if(isset($_POST["clsdasessashai_disable_flag"])) $this->disable_flag = $_POST["clsdasessashai_disable_flag"];
		if(isset($_POST["clsdaseshaasai_state"])) $this->state = $_POST["clsdaseshaasai_state"];
	}	
	
	function setgetvars()
    {    	
     	if(isset($_GET["userid"])) $this->userid = trim($_GET["userid"]);   
    }
    
    function userTableList()
    {
    	$this->setpostvars();
    	$this->setgetvars();
    	$ResultArr = array();
    	$condition = "";
    	if(isset($this->username) && $this->username != '')
    		$condition .= "AND username = '".$this->username."'";
    	if(isset($this->company) && $this->company != '')
    		$condition .= "AND email = '".$this->email."'"; 	
    	if(isset($this->user_type) && $this->user_type != '')
    		$condition .= "AND user_type = '".$this->user_type."'"; 				
    	$query = "SELECT * from da_seshaasaiUsers WHERE 1=1 $condition";
    	$dbqry = new dbquery($query,$this->connid);
    	while($result = $dbqry->getrowarray()){
    		
    		$ResultArr[] = array("userid"=> $result["id"],
    						     "username" => $result["username"],
    						     "email" => $result["email"],
    						     "user_type" => $result["user_type"],
    						     "zone_id" => $result["zone_id"],
    						     "created_dt" => $result["created_dt"],	 
    						     "created_by" => $result["created_by"],
    						     "updated_dt" => $result["updated_dt"],
    						     "updated_by" => $result["updated_by"],
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
    
    function PageAddEditZone($connid)
    {
        $this->setgetvars();
        $this->setpostvars();        	
       
        if($this->submited)
        {        
            if($this->action == "ZoneSearch")
            {
                return $this->ZoneSearch($connid);
            }
            else if($this->action == "Save")
            {
            	$this->saveState($connid);
            	return $this->ZoneSearch($connid);
            }
        }
    } 
    
    
    function retrivedata($userid){
    	
    	if($userid == 0 )    
            return;
     	
     	$query = "SELECT * FROM da_seshaasaiUsers WHERE id = ".$userid;
     	$dbqry = new dbquery($query,$this->connid);       	
        if($dbqry->numrows() > 0 )
        {
            $row = $dbqry->getrowarray();
            $arrZoneSet = "";
            if($row["zone_id"]!=0 || $row["zone_id"] != "")
            {
           		 $arrZoneSet = explode(",",$row["zone_id"]);
            } 
            $this->userid = $row["id"];
            $this->username= $row["username"];
            $this->email = $row["email"];
            $this->user_type = $row["user_type"];
            $this->zone = $arrZoneSet;
            $this->created_dt = $row["created_dt"];
		    $this->created_by = $row["created_by"];
		    $this->updated_dt = $row["updated_dt"];    
		    $this->updated_by = $row["updated_by"];  
		    $this->disable_flag = $row["disable_flag"];              
        }
    }
    
     function savedata($userid=0){
    	    	
    	if($userid == 0)
    	{
    		$query_check = "select count(id) from da_seshaasaiUsers where username = '".$this->username."'";
    		$dbqry_check = new dbquery($query_check,$this->connid);
    		$row_check = $dbqry_check->getrowarray();
    		if($row_check[0]>0)
    		{
    			$this->action = "";
    			echo "<script>alert('Same username exist in system!');</script>";
    		}	
    		else
    		{	 
    			$md5Password = md5($this->username);    		
    			if(isset($this->zone) && count($this->zone)>1)
    			{    			
    				$zone_id = implode(",",$this->zone);
    			}	
    			else 
    			{
    				$zone_id = $this->zone[0];
    			}    			
 				$main_query = "INSERT INTO da_seshaasaiUsers (username,password,email,zone_id,disable_flag,user_type,created_dt,created_by,updated_dt,updated_by) 
 							   VALUES ('".$this->username."','".$md5Password."','".$this->email."','".$zone_id."','".$this->disable_flag."','".$this->user_type."',
 							   '".date('Y-m-d')."','".$_SESSION["username"]."',NOW(),'".$_SESSION["username"]."')";
    		}	
    	}	
    	else
		{
			$md5Password = md5($this->username);
    		if(isset($this->zone) && count($this->zone)>1)
			{    			
				$zone_id = implode(",",$this->zone);
			}	
			else 
			{
				$zone_id = $this->zone[0];
			}    
			$main_query = "UPDATE da_seshaasaiUsers SET username = '".$this->username."',password = '".$md5Password."',email = '".$this->email."',
			    			   zone_id='".$zone_id."',disable_flag='".$this->disable_flag."',user_type='".$this->user_type."',created_dt='".date('Y-m-d')."',
			    			   created_by='".$_SESSION["username"]."',updated_dt=NOW(),
			    			   updated_by='".$_SESSION["username"]."' WHERE id = '".$userid."'";   
		}
			
    	$dbqry = new dbquery($main_query,$this->connid);
    	return $dbqry->insertid;
    	
    }
    
    function zoneFetch($connid)
    {
    	$arrRet = array();
    	$query = "SELECT * FROM da_seshaasaiZones ORDER BY zone_id";
    	$dbqry = new dbquery($query,$connid);  
    	while($result = $dbqry->getrowarray()){
    		
    		$arrRet[] = array("zone_id"=> $result["zone_id"],
    						  "zone_name" => $result["zone_name"]    						   
    						  );
    	}    	
    	return $arrRet;   	
    }
    
    function stateList($connid)
    {
    	$arrRet = array();
    	$query = "SELECT DISTINCT(state) FROM schools ORDER BY state";
    	$dbqry = new dbquery($query,$connid);  
    	while($result = $dbqry->getrowarray()){    		
    		if($result['state']!="")
    		{
    			$arrRet[$result['state']] = $result['state'];
    		}	
    	}    	
    	return $arrRet;   	
    }
    
    function ZoneSearch($connid)
    {
    	$arrRet = array();
    	$zone_id = $this->zone[0];
    	$counter = 0;
    	$querySelect = "SELECT * FROM da_seshaasaiZoneStateMapping WHERE zone_id IN ($zone_id)";
    	$dbqrySelect = new dbquery($querySelect,$connid);  
    	while($resultSelect = $dbqrySelect->getrowarray()){    
    		$arrRet[$resultSelect['state']] = $resultSelect['state'];
    	}   	    	
    	return $arrRet;   	
    }
    
    function saveState($connid)
    {
    	if(isset($this->state) && count($this->state)>0)
    	{
    		$counter = 0;
    		if(isset($this->zone) && count($this->zone)>1)
			{    			
				$zone_id = implode(",",$this->zone);
			}	
			else 
			{
				$zone_id = $this->zone[0];
			}    
    		$querySelect = "SELECT count(*) as counter FROM da_seshaasaiZoneStateMapping WHERE zone_id IN($zone_id)";
    		$dbqrySelect = new dbquery($querySelect,$connid);  
    		while($resultSelect = $dbqrySelect->getrowarray()){    
    			$counter = $resultSelect['counter'];
    		}	
    		if($counter != 0)
    		{
    			$queryDelete = "DELETE FROM da_seshaasaiZoneStateMapping WHERE zone_id IN($zone_id)";
    			$dbqryDelete = new dbquery($queryDelete,$connid);  
    		}
    		$arrZone = explode(",",$zone_id);
    		if(isset($arrZone) && count($arrZone)>1)
    		{
	    		foreach($arrZone as $keyZone => $valueZone)
	    		{	
		    		foreach($this->state as $keyState => $valueState)
		    		{    				
		    			$queryInsert = "INSERT into da_seshaasaiZoneStateMapping (state,zone_id,created_dt,created_by,updated_dt,updated_by) VALUES ('$valueState','$valueZone','".date('Y-m-d')."','".$_SESSION["username"]."',NOW(),'".$_SESSION["username"]."')";
		    			$dbqryInsert = new dbquery($queryInsert,$connid);  
		    		}
	    		}		
    		}
    		else 
    		{
    			foreach($this->state as $keyState => $valueState)
	    		{    				
	    			$queryInsert = "INSERT into da_seshaasaiZoneStateMapping (state,zone_id,created_dt,created_by,updated_dt,updated_by) VALUES ('$valueState','$zone_id','".date('Y-m-d')."','".$_SESSION["username"]."',NOW(),'".$_SESSION["username"]."')";
	    			$dbqryInsert = new dbquery($queryInsert,$connid);  
	    		}
    		}
    	}
    }
    
    function unrelatedstateList($connid)
    {
    	$this->setgetvars();
        $this->setpostvars();  
    	
    	$arrRet = array();
    	$zone_id = "";
    	
    	if(isset($this->zone) && count($this->zone)>1)
		{    			
			$zone_id = implode(",",$this->zone);
		}	
		else 
		{
			$zone_id = $this->zone[0];
		}    
		if($zone_id != "")
		{
			$query = "SELECT * FROM da_seshaasaiZoneStateMapping WHERE zone_id NOT IN($zone_id)";
			$dbqry = new dbquery($query,$connid);  
    		while($result = $dbqry->getrowarray()){   
    			$arrRet[$result["state"]] = $result["state"];
    		}	
		}
		return $arrRet;
    }
    
    function commonZoneList($connid)
    {
    	$arrRet = array();
    	$arrZone = $this->zoneFetch($connid);
    	foreach($arrZone as $keyZone => $valueZone)
    	{
    		$arrState = array();
    		$zone_id = $valueZone["zone_id"];
    		$state_string = "";
    		$query = "SELECT * FROM da_seshaasaiZoneStateMapping WHERE zone_id IN($zone_id)";
    		$dbqry = new dbquery($query,$connid);  
    		while($result = $dbqry->getrowarray()){   
    			$arrState[$result["state"]] = $result["state"];
    		}	
   			if(isset($arrState) && count($arrState)>0)
   			{
    			$state_string = implode(",",$arrState);
   			}	
   			if($state_string!="")
   			{
   				$arrRet[$valueZone["zone_name"]] = $state_string;
   			}
   			else 
   			{
   				$arrRet[$valueZone["zone_name"]] = "";
   			}
    	}
    	return $arrRet;
    }
}    