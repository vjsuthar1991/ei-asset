<?php
class clsdaoptdevice
{
	var $connid;
	var $id;
	var $schoolCode;
	var $year;
	var $searchSchool;
	var $request_id;
	var $action;
	var $submited;
	
	function clsdaoptdevice($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->id = 0;
		$this->schoolCode = 0;
		$this->year = "";
		$this->searchSchool = "";
		$this->request_id = "";	
		$this->action = "";
		$this->submited = "";
	}
	
	
	function setpostvars()
	{
		if(isset($_POST["clsdaoptdevice_hdnsubmited"])) $this->submited = $_POST["clsdaoptdevice_hdnsubmited"];
		if(isset($_POST["clsdaoptdevice_hdnaction"])) $this->action = $_POST["clsdaoptdevice_hdnaction"];
		if(isset($_POST["clsdaoptdevice_school"])) $this->searchSchool = $_POST["clsdaoptdevice_school"];
		if(isset($_POST["clsdaoptdevice_request_id"])) $this->request_id = $_POST["clsdaoptdevice_request_id"];
	}
	
	
	function setgetvars()
    {
        if(isset($_GET["id"])) $this->id = $_GET["id"];
    }
    
    function getSchoolList($connid)
	{
		$arrRet = array();
		$query = "select t.schoolCode,s.schoolname,s.city from schools s INNER JOIN da_testRequest t on t.schoolCode = s.schoolno
				  where t.type = 'actual'  	  
				  GROUP BY s.schoolno ORDER BY s.schoolname";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrRet[$row[schoolCode]]=$row;
			}
		return 	$arrRet;
	}
    
	function getActualList($connid,$school)
	{
		if(isset($school))
		{
		$this->setpostvars();
		$this->setgetvars();
			
		if($this->submited && $this->action == "ChangeOptdevice"){
			
			if(!is_array($this->request_id) || count($this->request_id) == 0)
				return;
				
			$this->UpdateOptDevice();
		}
		
			$ResultArr = array();
	    	$query = "SELECT da_testRequest.id,da_testRequest.schoolCode,schools.schoolname,
	    			  da_testRequest.type,da_testRequest.subject,da_testRequest.class,
					  da_testRequest.testName,da_testRequest.test_date,da_testRequest.request_date,da_testRequest.requested_by
					  FROM da_testRequest 
					  LEFT JOIN schools ON da_testRequest.schoolCode = schools.schoolno
					  WHERE da_testRequest.type = 'actual' AND da_testRequest.schoolCode = '".$school."' 
					  AND da_testRequest.optfor_device = '0'
					  ORDER BY da_testRequest.request_date,da_testRequest.subject DESC";
	    				  
			$dbqry = new dbquery($query,$this->connid);
			while($result = $dbqry->getrowarray()){
				
				$ResultArr["SCHOOLDETAILS"][$result["id"]] = array("id"=>$result["id"],
																   "type"=>$result["type"],	
														  		   "schoolCode" => $result["schoolCode"],
														  		   "schoolname" => $result["schoolname"],
														  		   "subject" => $result["subject"],
														  		   "class" => $result["class"],
														  		   "testName" => $result["testName"],
														  		   "test_date" => $result["test_date"],
														  		   "requested_by" => $result["requested_by"],
														  		   "requested_date" => $result["request_date"]
														  		   );													  		   
				
			}
			return $ResultArr;
		}
	}
	function UpdateOptDevice()
	{
		$RequestId = implode(",",$this->request_id);
		$query = "select optfor_device,id from da_testRequest where id IN ($RequestId)";
		$dbqry = new dbquery($query,$this->connid);	
		while($result = $dbqry->getrowarray())
		{
		if($result[optfor_device]!=4)
			{	
				$query_set = "Update da_testRequest set optfor_device = '4',last_modified = NOW() where id = '$result[id]'";
				$dbqry_set = new dbquery($query_set,$this->connid);
			}
		}		
	}
	
}    