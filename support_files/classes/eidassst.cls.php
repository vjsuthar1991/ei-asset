<?php
class clsdassst
{
	var $ssst_code;
	var $description;
	var $what_it_covers;
	var $sub_subtopic_code;
	var $created_by;
	var $created_dt;
	var $updated_by;
	var $updated_dt;
	
	var $subjectno;
	var $topic_code;
	var $subtopic_code;
	var $delSSST;
	
	var $action;
	var $error;
	var $msg;
	
	function clsdasubsubtopic()
	{
		$this->ssst_code = "";
		$this->description = "";
		$this->what_it_covers = "";
		$this->sub_subtopic_code = "";
		
		$this->created_by = "";
		$this->created_dt = "";
		
		$this->subjectno = "";
		
		$this->topic_code = "";
		$this->subtopic_code = "";
		$this->delSSST = array();
		
		$this->action = "";
		$this->error = "";
		$this->msg = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsdassst_ssst_code"])) $this->ssst_code = $_POST["clsdassst_ssst_code"];
		if(isset($_POST["clsdassst_hdnaction"])) $this->action = $_POST["clsdassst_hdnaction"];
		if(isset($_POST["clsdassst_description"])) $this->description = $_POST["clsdassst_description"];
		if(isset($_POST["clsdassst_whatitcovers"])) $this->what_it_covers = $_POST["clsdassst_whatitcovers"];
		
		if(isset($_POST["clsdasubtopic_subjectno"])) $this->subjectno = $_POST["clsdasubtopic_subjectno"];
		if(isset($_POST["clsdasubtopic_topic"])) $this->topic_code = $_POST["clsdasubtopic_topic"];
		if(isset($_POST["clsdasubtopic_subtopic"])) $this->subtopic_code = $_POST["clsdasubtopic_subtopic"];
		if(isset($_POST["clsdasubtopic_subsubtopic"])) $this->sub_subtopic_code = $_POST["clsdasubtopic_subsubtopic"];
		if(isset($_POST["delSSST"])) $this->delSSST = $_POST["delSSST"];
		
		if(isset($_POST["clsdassst_hdnaction"])) $this->action = $_POST["clsdassst_hdnaction"];
		//print_r($_POST);
	}
	function setgetvars()
    {
      
    }
	
	function checkDuplicate($connid)
    {
        if(is_array($this->description) && count($this->description) >0)
		{
			for($i=0;$i<count($this->description);$i++)
			{
				if($this->description[$i] != "" && (!isset($this->ssst_code[$i]) || $this->ssst_code[$i] == ""))
				{
					$query = "SELECT count(*) FROM da_ssstMaster WHERE description = '".$this->description[$i]."' AND ssst_code = '".$this->ssst_code."'";
        			$dbquery = new dbquery($query,$connid);
        			$row = $dbquery->getrowarray();
					//echo $row[0];
					if($row[0] > 0)
					{
						$this->setcolor[$i] = "#FFFF99";
						return true;
					}
					else
						return false;
				}
			}
		}
    }
	
	function validation($connid)
    {
       
		if($this->sub_subtopic_code == "")
        	$this->error["sub_subtopic_code"] = "Please enter the sub sub topic for ssstcode";
        if($this->description == "")
        	$this->error["description"] = "Please enter the subtopic";
        if($this->checkDuplicate($connid))
        	$this->error["duplicate"] = "This ssst code is already entered in database";

        if(is_array($this->error) && count($this->error) >0)
        	return false;
        else
        	return true;
    }
    
    function saveData($connid)
    {
		if(is_array($this->description) && count($this->description) >0)
		{
			for($i=0;$i<count($this->description);$i++)
			{
				if($this->description[$i] != "")
				{
					if($this->ssst_code[$i] > 0){
						$query = "UPDATE da_ssstMaster SET sub_subtopic_code = '".$this->sub_subtopic_code."',
								  description = '".$this->description[$i]."',what_it_covers = '".$this->what_it_covers[$i]."',
								  updated_dt = NOW(),updated_by = '".$_SESSION["username"]."'
								  WHERE ssst_code = '".$this->ssst_code[$i]."' LIMIT 1";
					}	
					else{
						$query = "INSERT INTO da_ssstMaster 
								  SET sub_subtopic_code = '".$this->sub_subtopic_code."',description = '".$this->description[$i]."',
								  what_it_covers = '".$this->what_it_covers[$i]."',created_by = '".$_SESSION["username"]."',
								  created_dt = NOW()";
					}	
        			$dbquery = new dbquery($query,$connid);
				}
			}
			$this->action = "SuccessfullyAdded";
			//echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";
		}
	}
	
	function retrieveSSSTDetails($connid)
    {
        $this->description = "";
        $this->ssst_code = "";
        $this->what_it_covers = "";
        
        $this->setgetvars();
        
        $query = "SELECT a.description,a.ssst_code,a.what_it_covers 
                       FROM da_ssstMaster a, da_subSubTopicMaster b 
                       WHERE a.sub_subtopic_code = b.sub_subtopic_code 
        	      	   AND a.sub_subtopic_code = '".$this->sub_subtopic_code."' ORDER BY ssst_code";
        $dbquery = new dbquery($query,$connid);
        $i = 0;
		while($row = $dbquery->getrowarray())
		{
			$this->description[$i] = $row["description"];
			$this->ssst_code[$i] = $row["ssst_code"];
            $this->what_it_covers[$i] = $row["what_it_covers"];
			$i++;
		}
    }
    
    function delSSTCode($connid)
	{
		if(count($this->delSSST) > 0)
		{
			foreach($this->delSSST as $key =>$ssstcode)
			{
				$qcount = $this->SSTWithQues($connid,$ssstcode);
				if($qcount == 0){
					
					$query = "DELETE FROM da_ssstMaster WHERE ssst_code = '".$ssstcode."' ";
					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}
    
	function SSTWithQues($connid,$ssstcode)
	{
		$query = "SELECT count(*) FROM da_questions WHERE ssst_code = '".$ssstcode."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	
	function pageAddEditSSST($connid)
    {
        $this->setpostvars();
		$this->setgetvars();
		
        if($this->action == "SaveData")
        {
        	if($this->validation($connid)){
	          $this->saveData($connid);
			}
        }
		if($this->action == "DeleteData"){
			$this->delSSTCode($connid);
		}
    }
    
    function getSSSTBySST($connid,$subsubtopic_code="")
	{
		
		$this->setpostvars();
		$condition = "";
		if($subsubtopic_code == "")
			$sst_code = $this->sub_subtopic_code;
		else
			$sst_code = $subsubtopic_code;
			
		/*if($this->flflag == "Y" || $flflag == "Y")
			$condition .= "AND freelancer = '".$_SESSION["username"]."'";	*/

		$query = "SELECT * FROM da_ssstMaster WHERE sub_subtopic_code = '".$sst_code."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	
	function getAllSSST($connid){
		
		$resultarr = array();
		$query = "SELECT * FROM da_ssstMaster WHERE 1=1";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$resultarr[$result["ssst_code"]] = $result["description"];
		}
		
		return $resultarr;
	}
	
}
?>
