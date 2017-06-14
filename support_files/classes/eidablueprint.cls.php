<?php
include_once dirname(__FILE__) . "/../constants.php";

class clsdablueprint
{
	var $connid;
	var $year;
	var $searchSchool;
	var $searchClass;
	var $searchSubject;
	var $action;
	var $id;
	var $schoolCode;
	var $schoolName;
	var $subject;
	var $class;
	var $paper_type;
	var $no_of_questions;
	var $no_of_passage;
	var $exactly;
	var $submitted;
	var $class_to_insert;
		
	function clsdablueprint($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->year = "";
		$this->searchSchool ="";
		$this->searchClass ="";
		$this->searchSubject ="";
		$this->action ="";
		$this->schoolCode = "";
		$this->schoolName = "";
		$this->subject = "";
		$this->class = "";
		$this->paper_type = "";
		$this->no_of_questions = "";
		$this->no_of_passage = "";
		$this->exactly = "";
		$this->submitted = "";
		$this->class_to_insert = "";
	}
	
	
	function setpostvars()
	{		
		if(isset($_POST["clsdablueprint_year"])) $this->year = $_POST["clsdablueprint_year"];
		if(isset($_POST["clsdablueprint_searchschool"])) $this->searchSchool = $_POST["clsdablueprint_searchschool"];
		if(isset($_POST["clsdablueprint_searchclass"])) $this->searchClass = $_POST["clsdablueprint_searchclass"];
		if(isset($_POST["clsdablueprint_subject"])) $this->searchSubject = $_POST["clsdablueprint_subject"];
		if(isset($_POST["hdnaction"])) $this->action = $_POST["hdnaction"];
		if(isset($_POST["hdnsubmited"])) $this->submitted = $_POST["hdnsubmited"];
		if(isset($_POST["clsdablueprint_noofquestions"])) $this->no_of_questions = $_POST["clsdablueprint_noofquestions"];
		if(isset($_POST["clsdablueprint_noofpassage"])) $this->no_of_passage = $_POST["clsdablueprint_noofpassage"];
		if(isset($_POST["clsdablueprint_exactly"])) $this->exactly = $_POST["clsdablueprint_exactly"];		
		if(isset($_POST["clsdablueprint_school"])) $this->schoolCode = $_POST["clsdablueprint_school"];		
		if(isset($_POST["clsdablueprint_classupdate"])) $this->class = $_POST["clsdablueprint_classupdate"];		
		if(isset($_POST["clsdablueprint_subjectupdate"])) $this->subject = $_POST["clsdablueprint_subjectupdate"];						
		if(isset($_POST["clsdablueprint_paper_typeupdate"])) $this->paper_type = $_POST["clsdablueprint_paper_typeupdate"];				
		if(isset($_POST["class_to_insert"])) $this->class_to_insert = $_POST["class_to_insert"];
	}
	
	
	function setgetvars()
    {
    	if(isset($_GET["id"])) $this->id = trim($_GET["id"]); 
    	if(isset($_GET["year"])) $this->year = trim($_GET["year"]); 
    	       
    }
    
    function getSchoolList($connid)
	{		
        global $constant_da;
		$this->setpostvars();
		$this->setgetvars();
		
		$arrRet = array();
		$current_date = date("Y-m-d");
	   	$query = "SELECT t.schoolCode,s.schoolname,s.city from {$constant_da(COMMON_DATABASE)}.schools s 
	   			 INNER JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster t on t.schoolCode = s.schoolno				  
				 AND t.year = '$this->year'
				 GROUP BY s.schoolno ORDER BY s.schoolname";
	   // AND (t.start_date <= '$current_date' AND t.end_date >= '$current_date')	  
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
        {
            $arrRet[$row["schoolCode"]]=$row;
        }
		return 	$arrRet;
	}
	
	function getAllDataRelatedToOrderMaster($connid)
	{
        global $constant_da;
		$arrRet = array();
		$condition = "";
		if($this->searchSchool!="")
		{
			$condition .= " AND schoolCode = '$this->searchSchool'";
		}
		$query = "SELECT b.class,b.e,b.m,b.s FROM {$constant_da(COMMON_DATABASE)}.da_orderMaster a, {$constant_da(COMMON_DATABASE)}.da_orderBreakup b WHERE a.order_id = b.order_id $condition AND year = '$this->year'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrRet[] = array("class"=>$row["class"],"e"=>$row["e"],"m"=>$row["m"],"s"=>$row["s"]);
			}
		return $arrRet;	
	}

	function getDataRelatedToSchollBluePrint($connid)
	{
        global $constant_da;

		$arrRet = array();
		$condition = "";
		if($this->searchSubject != "ALL")
		{
			$condition .= " AND b.subject = '$this->searchSubject'";
		}
		if($this->searchSchool != "")
		{
			$condition .= " AND b.schoolCode = '$this->searchSchool'";
		}
		if($this->searchClass != "ALL")
		{
			$condition .= " AND b.class = '$this->searchClass'";
		}
		$query = "SELECT a.schoolname,b.* FROM {$constant_da(COMMON_DATABASE)}.schools a, da_autoSchoolBluePrint b where a.schoolno = b.schoolCode AND b.year = '$this->year' $condition ORDER By b.class,b.subject";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["id"]] = array("schoolCode"=>$row["schoolCode"],"schoolName"=>$row["schoolname"],
										"subject"=>$row["subject"],"class"=>$row["class"],"paper_type"=>$row["paper_type"],
										"no_of_questions"=>$row["no_of_questions"],"no_of_passage"=>$row["no_of_passage"],
										"exactly"=>$row["exactly"],"added_by"=>$row["added_by"],"added_dt"=>$row["added_dt"],
										"updated_by"=>$row["updated_by"],"updated_dt"=>$row["updated_dt"],"year"=>$row["year"]);
		}
		return $arrRet;
	}
	
	function PageAddEdit()
    {
        $this->setgetvars();
        $this->setpostvars();
        if($this->submitted)
        {
            if($this->action == "Save")
            { 
                $this->savedata($this->id);
            }
        }
        $this->retrivedata($this->id);
    } 
    
    function retrivedata($id){
        global $constant_da;
    	if($id == 0 )    
            return;
     	
     	$query = "SELECT a.schoolname,b.* FROM {$constant_da(COMMON_DATABASE)}.schools a,da_autoSchoolBluePrint b WHERE a.schoolno = b.schoolCode AND b.id = '".$id."'";     	
     	$dbqry = new dbquery($query,$this->connid);       	
        if($dbqry->numrows() > 0 )
        {
            $row = $dbqry->getrowarray();
            $this->id = $row["id"];
            $this->schoolCode = $row["schoolCode"];
            $this->schoolName = $row["schoolname"];
            $this->subject = $row["subject"];
            $this->class = $row["class"];
            $this->paper_type = $row["paper_type"];            
            $this->no_of_questions = $row["no_of_questions"];            
			$this->no_of_passage = $row["no_of_passage"];            
			$this->exactly = $row["exactly"];       
			$this->year = $row["year"];      
        }
    }
    
    function saveData($id)
    {
    	if($id == 0)
    	{
    		if($this->class_to_insert!="")
    		{
    			if($this->class=="ALL")
    			{
    				$arrClassToInsert = explode(",",$this->class_to_insert);
    			}
    			else 
    			{
    				$arrClassToInsert = explode(",",$this->class);
    			}
    			if(isset($arrClassToInsert) && count($arrClassToInsert)>0)
    			{
    				foreach($arrClassToInsert as $keyClassToInsert => $valueClassToInsert) {
    					$check_counter = 0;
    					if($this->subject==1)
    					{
    						$id_set = "";
    						$query = "SELECT id FROM da_autoSchoolBluePrint 
    								  WHERE subject = '$this->subject' AND class = '$valueClassToInsert' 
    								  AND schoolCode = '$this->schoolCode' 
    								  AND paper_type = '$this->paper_type'
    								  AND year = '".$this->year."'";
    						$dbquery = new dbquery($query,$this->connid);
							while($row = $dbquery->getrowarray())
								{
									$id_set = $row["id"];
								}
							if($id_set!="")
							{
								$main_query = "UPDATE da_autoSchoolBluePrint SET no_of_questions = '".$this->no_of_questions."',no_of_passage = '".$this->no_of_passage."',paper_type='".$this->paper_type."',updated_by = '".$_SESSION["username"]."',updated_dt = NOW(),exactly='".$this->exactly."' WHERE id = '".$id_set."'";		
								$dbqry = new dbquery($main_query,$this->connid);		 			 			
							}
							else 
							{
								$main_query = "INSERT INTO da_autoSchoolBluePrint(schoolCode,class,subject,paper_type,no_of_questions,no_of_passage,exactly,year,added_by,added_dt)
								 			   VALUES ('".$this->schoolCode."','".$valueClassToInsert."','".$this->subject."','".$this->paper_type."','".$this->no_of_questions."','".$this->no_of_passage."','".$this->exactly."','".$this->year."','".$_SESSION["username"]."',NOW())"; 	
								$dbqry = new dbquery($main_query,$this->connid);		 			 	
							}
    					}
    					else 
    					{   
    						$id_set = "";
    						$query = "SELECT id FROM da_autoSchoolBluePrint 
    								  WHERE subject = '$this->subject' AND class = '$valueClassToInsert' 
    								  AND schoolCode = '$this->schoolCode' AND year = '".$this->year."'";
    						$dbquery = new dbquery($query,$this->connid);
							while($row = $dbquery->getrowarray())
								{
									$id_set = $row["id"];
								} 	
							if($id_set!="")
							{
								$main_query = "UPDATE da_autoSchoolBluePrint SET no_of_questions = '".$this->no_of_questions."',no_of_passage = '".$this->no_of_passage."',updated_by = '".$_SESSION["username"]."',updated_dt = NOW(),exactly='".$this->exactly."' WHERE id = '".$id_set."'";		
								$dbqry = new dbquery($main_query,$this->connid);		 			 			
							}
							else 
							{
	    						$main_query = "INSERT INTO da_autoSchoolBluePrint (schoolCode,class,subject,paper_type,no_of_questions,no_of_passage,exactly,year,added_by,added_dt) VALUES ('".$this->schoolCode."','".$valueClassToInsert."','".$this->subject."','N/A','".$this->no_of_questions."','".$this->no_of_passage."','".$this->exactly."','".$this->year."','".$_SESSION["username"]."',NOW())"; 	
				 				$dbqry = new dbquery($main_query,$this->connid);		 			 	
							}    						
    					}    
    				}		
    			}	
    		}
    	}	
    	else
		{
			$main_query = "UPDATE da_autoSchoolBluePrint SET no_of_questions = '".$this->no_of_questions."',no_of_passage = '".$this->no_of_passage."',updated_by = '".$_SESSION["username"]."',updated_dt = NOW(),exactly='".$this->exactly."' WHERE id = '".$id."'";				
			$dbqry = new dbquery($main_query,$this->connid);
		}
		
    	return $dbqry->insertid;
    }
    
    function getSchoolListNotInTable($connid)
    {
        global $constant_da;

    	$arrRet = array();
    	$current_date = date("Y-m-d");
    	
    	$query = "SELECT a.*,b.schoolCode,b.year FROM {$constant_da(COMMON_DATABASE)}.da_orderBreakup a, {$constant_da(COMMON_DATABASE)}.da_orderMaster b WHERE a.order_id = b.order_id AND b.year = '".$this->year."' GROUP BY b.schoolCode,a.class";
    	// (b.start_date <= '$current_date' AND b.end_date >= '$current_date')
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$schoolCode_check = 0;
				$query_check_school = "SELECT schoolname FROM {$constant_da(COMMON_DATABASE)}.schools WHERE schoolno  = '".$row["schoolCode"]."'";
				$dbquery_check_school = new dbquery($query_check_school,$connid);
				while($row_check_school = $dbquery_check_school->getrowarray())
				{
					$schoolCode_check = 1;
				}
				if($schoolCode_check==1)
				{
					$arrSubject = array();
					$class_set = "";
					$class_set = $row["class"];
					$schoolCode_set = "";
					$schoolCode_set = $row["schoolCode"];
					$schoolname = "";
					$query_schoolname = "SELECT schoolname FROM {$constant_da(COMMON_DATABASE)}.schools WHERE schoolno = '$schoolCode_set'";
					$dbquery_schoolname = new dbquery($query_schoolname,$connid);
					
					while($row_schoolname = $dbquery_schoolname->getrowarray()){
						$schoolname = $row_schoolname["schoolname"];
					}
					
					if($row["e"]!=0)
					{
						$arrSubject["1"] = "1";
					}
					if($row["m"]!=0)
					{
						$arrSubject["2"] = "2";
					}
					if($row["s"]!=0)
					{
						$arrSubject["3"] = "3";
					}
					$subject_made = "";
					if(isset($arrSubject) && count($arrSubject)>0)
					{
						$subject_made = implode(",",$arrSubject);
					}
					
					foreach($arrSubject as $keySubject => $valueSubject)
					{
						$counter = 0;
						$append="";
						if($valueSubject==1)
						{
							$append .= " ,GROUP_CONCAT(paper_type) as type";
						}
						if($valueSubject==1)
						{
							$arrPapertype = array();
						}	
						$query_check = "SELECT count(*) as cnt $append FROM da_autoSchoolBluePrint WHERE subject = '$valueSubject' AND class = '$class_set' AND schoolCode = '$schoolCode_set'";
						$dbquery_check = new dbquery($query_check,$connid);
						while($row_check = $dbquery_check->getrowarray())
							{
								$counter = $row_check["cnt"];							
								if($valueSubject==1)
								{
									$arrPapertype = explode(",",$row_check["type"]);
								}	
							}					
						if($counter==0)
						{
							$arrRet[$schoolCode_set] = array("yaer"=>$row["year"],"schoolname"=>$schoolname);
						}	
						else 
						{
							if($valueSubject==1)
							{		
								$counter_check_passage = 0;
								$counter_check_passage = count($arrPapertype);						
								if($counter_check_passage<=1)
								{
									$arrRet[$schoolCode_set] = array("yaer"=>$row["year"],"schoolname"=>$schoolname);								
								}
							}
						}
					}
				}
			}
		return 	$arrRet;
    }
    
    function getAllDataRelatedToOrderMasterEdit($connid)
	{
        global $constant_da;

		$arrRet = array();
		$current_date = date("Y-m-d");
		$query = "SELECT b.class,b.e,b.m,b.s,a.year,a.schoolCode FROM {$constant_da(COMMON_DATABASE)}.da_orderBreakup b, {$constant_da(COMMON_DATABASE)}.da_orderMaster a WHERE a.order_id = b.order_id 
				  AND a.schoolCode = '$this->schoolCode' AND year = '".$this->year."' GROUP BY b.class";
		//(a.start_date <= '$current_date' AND a.end_date >= '$current_date') 
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrSubject = array();
				$class_set = "";
				$class_set = $row["class"];
				$schoolCode_set = "";
				$schoolCode_set = $row["schoolCode"];
				$year = $row["year"];
				
				if($row["e"]!=0)
				{
					$arrSubject["1"] = "1";
				}
				if($row["m"]!=0)
				{
					$arrSubject["2"] = "2";
				}
				if($row["s"]!=0)
				{
					$arrSubject["3"] = "3";
				}
				$subject_made = "";
				if(isset($arrSubject) && count($arrSubject)>0)
				{
					$subject_made = implode(",",$arrSubject);
				}
				
				foreach($arrSubject as $keySubject => $valueSubject)
				{
					$counter = 0;
					$append="";
					if($valueSubject==1)
					{
						$append .= " ,GROUP_CONCAT(paper_type) as type";
					}
					if($valueSubject==1)
					{
						$arrPapertype = array();
					}	
					$query_check = "SELECT count(*) as cnt $append FROM da_autoSchoolBluePrint WHERE subject = '$valueSubject' AND class = '$class_set' AND schoolCode = '$schoolCode_set' AND year = $year";
					$dbquery_check = new dbquery($query_check,$connid);
					while($row_check = $dbquery_check->getrowarray())
						{
							$counter = $row_check["cnt"];
							if($valueSubject==1)
							{
								if($row_check["type"]!="")
								{
									$arrPapertype = explode(",",$row_check["type"]);
								}	
							}	
						}						
					if($counter==0)
					{
						if($valueSubject==1)
						{
							$arrRet[$class_set]["e"] = $row["e"];							 
							$arrRet[$class_set][1] = 1;	
							$arrRet[$class_set][2] = 2;	
						}
						if($valueSubject==2)
						{
							$arrRet[$class_set]["m"] = $row["m"];							 
						}
						if($valueSubject==3)
						{
							$arrRet[$class_set]["s"] = $row["s"];							 
						}
						$arrRet[$class_set]["class"] = $class_set;
						
						$this->year = $row["year"];							 
					}
					else 
					{
						if($valueSubject==1)
						{				
							if(isset($arrPapertype) && count($arrPapertype)>0)
							{								
							$counter_check_passage = 0;
							$counter_check_passage = count($arrPapertype);						
								if($counter_check_passage<=1)
								{								
									foreach($arrPapertype as $keyPaperType => $valuePapertype)
									{
										$counter_check = 0;
										if($valuePapertype==1)
										{
											$counter_check = 1;
											$arrRet[$class_set]["e"] = $row["e"];							 
										    $arrRet[$class_set][2] = 2;	
										    $arrRet[$class_set]["class"] = $class_set;
										    $this->year = $row["year"];		
										}
										if($valuePapertype==2)
										{
											$counter_check = 1;
											$arrRet[$class_set]["e"] = $row["e"];							 
										    $arrRet[$class_set][1] = 1;	
										    $arrRet[$class_set]["class"] = $class_set;
										    $this->year = $row["year"];		
										}									
									}								
								}	
							}							
						}
					}
				}
				
				
			}		
		return $arrRet;	
	}
}
?>

    