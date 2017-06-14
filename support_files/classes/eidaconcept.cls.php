<?php
include_once("eipaging.cls.php");
class clsdaconcept
{
	var $topic_code;	
	var $subjectno;
	var $action;
	var $class;	
	var $submitted;	
	var $subtopic_code;
	var $sub_subtopic_code;
	var $subtopic_code_combo;
	var $subsubtopic_code_combo;
	
	var $topic_assign;
	var $subtopic_assign;
	var $subsubtopic_assign;
	var $concept_assign;
	
	var $msg;
	
	var $topic_assign_all;
	var $subtopic_assign_all;
	var $subsubtopic_assign_all;
	var $concept_assign_all;
	var $questionsArr;
	var $mapped_user;

	var $concept_code;
	var $conceptsst_code;
	var $conceptsubtopic_code;
	var $topic;
	var $description;
	var $sst_description;
	var $delSST;
	var $sst_code;
	var $delConcept;
	var $topicDesc;
	var $subTopicDisp_order;
	var $sstDisp_order;
	var $conceptDisp_order;
	var $level5Disp_order;

	var $concept_cd; 
	var $level5_assign;
	var $level5_assign_all;
	var $conceptlevel5_code;
	var $delLevel5; 
	var $clsdasubtopic_concept;

	function clsdaconcept()
	{
		$this->topic_code = "";		
		$this->subjectno = "";
		$this->action = "";
		$this->class = "";				
		$this->submited = "";
		$this->subtopic_code = "";
		$this->sub_subtopic_code = "";
		$this->clspaging = new clspaging('clsdaconcept','searchflque');
		$this->subtopic_code_combo = "";
		$this->subsubtopic_code_combo = "";
		$this->subtopic_assign = array();
		$this->subsubtopic_assign = array();
		$this->concept_assign = array();
		$this->msg = "";
		$this->subtopic_assign_all = "";
		$this->subsubtopic_assign_all = "";
		$this->concept_assign_all = "";
		$this->questionsArr = array();
		$this->mapped_user = "";

		$this->concept_code="";
		$this->conceptsst_code ="";
		$this->conceptsubtopic_code="";
		$this->topic="";
		$this->description="";
		$this->sst_description="";
		$this->delSST ="";
		$this->sst_code ="";
		$this->conceptsst_code ="";
		$this->delConcept = "";
		$this->topicDesc ="";
		$this->subTopicDisp_order =array();
		$this->sstDisp_order =array();
		$this->conceptDisp_order = array();
		$this->level5Disp_order= array();

		$this->level5_assign_all="";
		$this->level5_assign="";
		$this->concept_cd ="";
		$this->conceptlevel5_code ="";
		$this->delLevel5 = "";
		$this->clsdasubtopic_concept ="";
	}
	function setpostvars()
	{
		 if(isset($_POST["clsdasubtopic_topic"])) $this->topic_code = $_POST["clsdasubtopic_topic"];
		 if(isset($_POST["clsdasubtopic_class"])) $this->class = $_POST["clsdasubtopic_class"];
		 if(isset($_POST["clsdasubtopic_subjectno"])) $this->subjectno = $_POST["clsdasubtopic_subjectno"];
		 if(isset($_POST["clsdasubtopic_subtopic"])) $this->subtopic_code = $_POST["clsdasubtopic_subtopic"];
		 if(isset($_POST["clsdaconcept_hdnaction"])) $this->action = $_POST["clsdaconcept_hdnaction"];
		 if(isset($_POST["clsdaconcept_hdnsubmited"])) $this->submited = $_POST["clsdaconcept_hdnsubmited"];
		 if(isset($_POST["clsdasubtopic_subsubtopic"])) $this->sub_subtopic_code = $_POST["clsdasubtopic_subsubtopic"];
		 if(isset($_POST["subtopic_code"])) $this->subtopic_code_combo = $_POST["subtopic_code"];	 
		 if(isset($_POST["subsubtopic_code"])) $this->subsubtopic_code_combo = $_POST["subsubtopic_code"];
		 
		 if(isset($_POST["clsdaconcept_topic_assign"])) $this->topic_assign = $_POST["clsdaconcept_topic_assign"];
		 
		 if(isset($_POST["clsdaconcept_subtopic_assign"])) $this->subtopic_assign = $_POST["clsdaconcept_subtopic_assign"];
		 if(isset($_POST["clsdaconcept_subsubtopic_assign"])) $this->subsubtopic_assign = $_POST["clsdaconcept_subsubtopic_assign"];
		 if(isset($_POST["clsdaconcept_concept_assign"])) $this->concept_assign = $_POST["clsdaconcept_concept_assign"];		 
		 
		 if(isset($_POST["clsdaconcept_topic_assign"][ALL])) $this->topic_assign_all = $_POST["clsdaconcept_topic_assign"][ALL];
		 if(isset($_POST["clsdaconcept_subtopic_assign"][ALL])) $this->subtopic_assign_all = $_POST["clsdaconcept_subtopic_assign"][ALL];
		 if(isset($_POST["clsdaconcept_subsubtopic_assign"][ALL])) $this->subsubtopic_assign_all = $_POST["clsdaconcept_subsubtopic_assign"][ALL];
		 if(isset($_POST["clsdaconcept_concept_assign"][ALL])) $this->concept_assign_all = $_POST["clsdaconcept_concept_assign"][ALL];		 		

		 if(isset($_POST["concept_code"])) $this->concept_cd = $_POST["concept_code"];

		 if(isset($_POST["clsdaconcept_level5_assign"])) $this->level5_assign = $_POST["clsdaconcept_level5_assign"];
		 if(isset($_POST["clsdaconcept_level5_assign"][ALL])) $this->level5_assign_all = $_POST["clsdaconcept_level5_assign"][ALL];


		 if(isset($_POST["clsdaconcept_check"])) $this->questionsArr = $_POST["clsdaconcept_check"];	
		 if(isset($_POST["clsdaconcept_mapped_user"])) $this->mapped_user = $_POST["clsdaconcept_mapped_user"];		



		 if(isset($_POST['clsconceptconcept_code'])) $this->concept_code = $_POST['clsconceptconcept_code'];
		 if(isset($_POST['clsconceptsst_code'])) $this->conceptsst_code = $_POST['clsconceptsst_code'];
		 if(isset($_POST['clsconceptsubtopic_code'])) $this->conceptsubtopic_code = $_POST['clsconceptsubtopic_code'];
		 if(isset($_POST['clsconcepttopic'])) $this->topic_code = $_POST['clsconcepttopic'];
		 if(isset($_POST["clseisubtopic_description"])) $this->description = $_POST["clseisubtopic_description"];
		 if(isset($_POST["clseisubtopic_hdnsubtopic"])) $this->subtopic_code = $_POST["clseisubtopic_hdnsubtopic"];
		 if(isset($_POST["clsdasubtopic_concept"])) $this->concept_code = $_POST["clsdasubtopic_concept"];

		 if(isset($_POST["clseisubsubtopic_description"])) $this->sst_description=$_POST["clseisubsubtopic_description"];

		 if(isset($_POST["concept_topic_code"])) $this->topic_code = $_POST["concept_topic_code"];
		 if(isset($_POST["delSST"])) $this->delSST =$_POST["delSST"];
		 if(isset($_POST["delConcept"])) $this->delConcept =$_POST['delConcept'];
		 if(isset($_POST["delLevel5"])) $this->delLevel5 = $_POST["delLevel5"];

		 if(isset($_POST["clsdasst_hdnaction"])) $this->action = $_POST["clsdasst_hdnaction"];

		 if(isset($_POST["conceptsst_topic_code"])) $this->topic_code = $_POST["conceptsst_topic_code"];
		 if(isset($_POST["conceptsst_subtopic_code"])) $this->conceptsubtopic_code = $_POST["conceptsst_subtopic_code"];
		 if(isset($_POST["conceptsst_code"])) $this->conceptsst_code = $_POST["conceptsst_code"];

		 if(isset($_POST["clseisubsubtopic_description"])) $this->description = $_POST["clseisubsubtopic_description"];

		  if(isset($_POST["clseisubsubtopic_hdnsubsubtopic"])) $this->sst_code = $_POST["clseisubsubtopic_hdnsubsubtopic"];

		 if(isset($_POST["clseiconcept_description"])) $this->description = $_POST["clseiconcept_description"];

		 if(isset($_POST["clsei_conceptCd"])) $this->concept_code = $_POST["clsei_conceptCd"];
		 if(isset($_POST["clsei_level5Cd"])) $this->conceptlevel5_code =$_POST["clsei_level5Cd"];

		 if(isset($_POST["clsdatopic_description"])) $this->topicDesc = $_POST["clsdatopic_description"];
		 if(isset($_POST["clsdatopic_subjectno"])) $this->subjectno =$_POST["clsdatopic_subjectno"];

		 if(isset($_POST['STdisp_order'])) $this->subTopicDisp_order = $_POST['STdisp_order'];
		 if(isset($_POST['SSTdisp_order'])) $this->sstDisp_order = $_POST['SSTdisp_order'];
		 if(isset($_POST['conceptDisp_order'])) $this->conceptDisp_order =$_POST['conceptDisp_order'];
		 if(isset($_POST['level5Disp_order'])) $this->level5Disp_order =$_POST['level5Disp_order'];

	}
	function setgetvars()
	{
		######Get variables###########
		if(isset($_GET['topic_code']))
		{
			$this->topic_code =$_GET["topic_code"];
		}
	}
	

		
	function addEditConceptSubtopic($connid)
	{

		$this->setpostvars();
			
		if($this->action =="GetData")
		{
			if(isset($_POST['clseisubtopic_topic']))	
				$this->topic_code =$_POST['clseisubtopic_topic'];

			if(isset($_POST['clsdasubtopic_subjectno']))
				$this->subjectno= $_POST["clsdasubtopic_subjectno"];

		}
		if($this->action =="SaveData")
		{
			 if($this->validation($connid))
        	{
           		$this->saveData($connid);

       		 }
		}

	}
	function addEditConcepts($connid)
	{

		$this->setpostvars();
		

		if($this->action =="GetData")
			{
				if(isset($_POST['clsdasubtopic_topic']))	
					$this->topic_code =$_POST['clsdasubtopic_topic'];

				if(isset($_POST['clsdasubtopic_subjectno']))
					$this->subjectno= $_POST["clsdasubtopic_subjectno"];

				if(isset($_POST["clsdasubtopic_subtopic"]))
					$this->conceptsubtopic_code = $_POST["clsdasubtopic_subtopic"];	

				if(isset($_POST['clsdasubtopic_SST']))
					$this->conceptsst_code= $_POST['clsdasubtopic_SST'];
			}

			if($this->action =="SaveData")
			{				        
	           $this->saveDataConcepts($connid);
			}

			if($this->action == "DeleteData")
			{
				$this->delConcept($connid);
			}

	}

	function addEditLevel5($connid)
	{
		$this->setpostvars();
		
		if($this->action =="GetData")
			{
				if(isset($_POST['clsdasubtopic_topic']))	
					$this->topic_code =$_POST['clsdasubtopic_topic'];

				if(isset($_POST['clsdasubtopic_subjectno']))
					$this->subjectno= $_POST["clsdasubtopic_subjectno"];

				if(isset($_POST["clsdasubtopic_subtopic"]))
					$this->conceptsubtopic_code = $_POST["clsdasubtopic_subtopic"];	

				if(isset($_POST['clsdasubtopic_SST']))
					$this->conceptsst_code= $_POST['clsdasubtopic_SST'];

				if(isset($_POST["cladasubtopic_concept"]))
					$this->concept_code = $_POST["cladasubtopic_concept"];
				
			}

			if($this->action =="SaveData")
			{				        
	           $this->saveDataLevel5($connid);
			}

			if($this->action == "DeleteData")
			{
				$this->deleteLevel5($connid);
			}

	}
	  function deleteLevel5($connid)
	{
		
		if(count($this->delConcept) > 0)
		{
			foreach($this->delLevel5 as $key =>$level5_code)
			{
			//	$qcount = $this->sstWithQues($connid,$sstcode);
			//	if($qcount == 0)
				$qcount = $this->codeMappedQues($connid, $level5_code, 5);
				if($qcount == 0)
				{
					$query = "DELETE FROM ei_level5Master WHERE level5_code = '".$level5_code."' ";

					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}

	  function delConcept($connid)
	{
		
		if(count($this->delConcept) > 0)
		{
			foreach($this->delConcept as $key =>$sstcode)
			{
				$qcount = $this->codeMappedQues($connid,$sstcode,4);
				if($qcount == 0)
				{
					$query = "DELETE FROM ei_conceptsMaster WHERE concept_code = '".$sstcode."' ";

					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}

	function addEditConceptSST($connid)
    {


        $this->setpostvars();
		
		if($this->action =="GetData")
			{
				
				if(isset($_POST['clsdasubtopic_topic']))	
					$this->topic_code =$_POST['clsdasubtopic_topic'];

				if(isset($_POST['clsdasubtopic_subjectno']))
					$this->subjectno= $_POST["clsdasubtopic_subjectno"];

				if(isset($_POST["clsdasubtopic_subtopic"]))
					$this->conceptsubtopic_code = $_POST["clsdasubtopic_subtopic"];	

			}


        if($this->action == "SaveData")
        {
        	
	  //      if($this->validationForSST($connid))
	        {
	   			
	           $this->saveDataSST($connid);
			}
			//else
			{
			//	echo "<html><body><head><script>function pageSubmit(){document.hdform.action='daAdmin_addEditSubtopic.php';document.hdform.submit();}</script></head><form name='hdform' method='POST'><input type='hidden' name='clsdasubtopic_error[]' value='".$this->error."'><input type='hidden' name='clsdasubtopic_class' value='".$this->class."'><input type='hidden' name='clsdasubtopic_subjectno' value='".$this->subjectno."'><input type='hidden' name='clsdasubtopic_topic' value='".$this->topic_code."'><input type='hidden' name='clsdasubtopic_hdnaction' value='GetData'><script language='javascript'>pageSubmit();</script></form></body></html>";
			}
        }
		if($this->action == "DeleteData")
		{
		
			$this->delSubSubTopic($connid);
		}

		
    }

    function saveDataLevel5($connid)
    {
    	if(is_array($this->description) && count($this->description) >0)
		{
			for($i=0;$i<count($this->description);$i++)
			{
				if($this->description[$i] != "")
				{					
					$this->description[$i] = addslashes($this->description[$i]);	
					if($this->conceptlevel5_code[$i] > 0)
						$query = "UPDATE ei_level5Master SET concept_code = '".$this->concept_code."',description = '".$this->description[$i]."', disp_order = '".$this->level5Disp_order[$i]."' WHERE level5_code = '".$this->conceptlevel5_code[$i]."' LIMIT 1";
					else
						$query = "INSERT INTO ei_level5Master SET concept_code = '".$this->concept_code."',description = '".$this->description[$i]."', disp_order = '".$this->level5Disp_order[$i]."' ,entered_by = '".$_SESSION["username"]."'";
        		
        	
        			$dbquery = new dbquery($query,$connid);
				}
			}
			$this->action = "SuccessfullyAdded";
   		 }
    }
function saveDataConcepts($connid)
    {

    	

    	if(is_array($this->description) && count($this->description) >0)
		{
			for($i=0;$i<count($this->description);$i++)
			{
				if($this->description[$i] != "")
				{					
					$this->description[$i] = addslashes($this->description[$i]);	
					if($this->concept_code[$i] > 0)
						$query = "UPDATE ei_conceptsMaster SET sub_subtopic_code = '".$this->conceptsst_code."',description = '".$this->description[$i]."', disp_order = '".$this->conceptDisp_order[$i]."' WHERE concept_code = '".$this->concept_code[$i]."' LIMIT 1";
					else
						$query = "INSERT INTO ei_conceptsMaster SET sub_subtopic_code = '".$this->conceptsst_code."',description = '".$this->description[$i]."', disp_order = '".$this->conceptDisp_order[$i]."' ,entered_by = '".$_SESSION["username"]."'";
        		
        	
        			$dbquery = new dbquery($query,$connid);
				}
			}
			$this->action = "SuccessfullyAdded";
    }
}
    function saveDataSST($connid)
    {

    	if(is_array($this->description) && count($this->description) >0)
		{
			for($i=0;$i<count($this->description);$i++)
			{
				if($this->description[$i] != "")
				{					
					$this->description[$i] = addslashes($this->description[$i]);
					if($this->sst_code[$i] > 0)
						$query = "UPDATE ei_subSubTopicMaster SET subtopic_code = '".$this->conceptsubtopic_code."',description = '".$this->description[$i]."', disp_order = '".$this->sstDisp_order[$i]."' WHERE sub_subtopic_code = '".$this->sst_code[$i]."' LIMIT 1";
					else
						$query = "INSERT INTO ei_subSubTopicMaster SET subtopic_code = '".$this->conceptsubtopic_code."',description = '".$this->description[$i]."' , disp_order = '".$this->sstDisp_order[$i]."' ,entered_by = '".$_SESSION["username"]."'";

        			$dbquery = new dbquery($query,$connid);
				}
			}
			$this->action = "SuccessfullyAdded";
    }

	}
	function delSubSubTopic($connid)
	{
		
		if(count($this->delSST) > 0)
		{
			foreach($this->delSST as $key =>$sstcode)
			{
				$qcount = $this->codeMappedQues($connid,$sstcode,3);
				if($qcount == 0)
				{
					$query = "DELETE FROM ei_subSubTopicMaster WHERE sub_subtopic_code = '".$sstcode."' ";

			
					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}

	function validationForSST($connid)
    {
        /*if($this->class == "")
			$this->error["class"] = "Please enter the class";*/
		/*if($this->subjectno == "")
			$this->error["sujectno"] = "Please enter the subject";*/
		if($this->subtopic_code == "")
        	$this->error["subtopic"] = "Please enter the subtopic for the sub subtopic";
        if($this->description == "")
        	$this->error["description"] = "Please enter the subtopic";
       
       //  Have to check for duplicates

        if(is_array($this->error) && count($this->error) >0)
        	return false;
        else
        	return true;
    }

	 function validation($connid)
    {
        /*if($this->class == "")
			$this->error["class"] = "Please enter the class";*/
		if($this->subjectno == "")
			$this->error["sujectno"] = "Please enter the subject";
		if($this->topic_code == "")
        	$this->error["topic"] = "Please enter the topic for the subtopic";
        if($this->description == "")
        	$this->error["description"] = "Please enter the subtopic";
      
        // Have to validate for same description

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
					$this->description[$i] = addslashes($this->description[$i]);

					if($this->subtopic_code[$i] > 0)
						$query = "UPDATE ei_subtopicMaster SET topic_code = '".$this->topic_code."',description = '".$this->description[$i]."' , disp_order = '".$this->subTopicDisp_order[$i]."' WHERE subtopic_code = '".$this->subtopic_code[$i]."' LIMIT 1";
					else
						$query = "INSERT INTO ei_subtopicMaster SET topic_code = '".$this->topic_code."',description = '".$this->description[$i]."',entered_by = '".$_SESSION["username"]."' , disp_order = '". $this->subTopicDisp_order[$i]. "'";
        		
        			$dbquery = new dbquery($query,$connid);
					

				}

			}
			$this->action = "SuccessfullyAdded";
			//echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";

		}
	}
	

	function PageQuestionConceptMapping($connid){
		
		$arrRet = array();
		$this->setpostvars();
		$this->setgetvars();
		
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
					
		if(isset($this->submited) && $this->submited == 1 && $this->action == "SaveMapping"){
			
			$this->SaveMapping($connid);
			$this->action = "SearchData";
		}
		
		if(isset($this->submited) && $this->submited == 1 && $this->action == "SaveMappingAll"){			
			$this->SaveMappingAll($connid);
			$this->action = "SearchData";
		}
		
		
		if($this->action == "SearchData"){
			$arrRet = $this->SearchQuestionForMapping($connid,'Y');
		}
		
		if($this->action == "SearchMappedQuestions")
			$arrRet = $this->SearchQuestionForMappingByUsers($connid,'Y');
		
		return $arrRet;
	}
	
	function SaveMappingAll($connid)
	{
		$QcodesArr  = array();
		$QcodeStr = "";
		$NeedtoUpdateQcodeArr = array();	

		if(is_array($this->questionsArr) && count($this->questionsArr) > 0){
			
			foreach($this->questionsArr as $keyQcode => $valueCode)
			{				
				if($valueCode!="" && $valueCode!="ALL")
				{
					$counter_check = 0;
					$query = "SELECT id FROM ei_queConceptMapping WHERE qcode = '$valueCode' AND mapped_by = '".$_SESSION["username"]."' AND project = 'DA'";					
					$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray())
					{
						$counter_check = $row["id"];
					}

					if($this->topic_assign_all !="")
					{
						$level_number =1;
						$level_code = $this->topic_assign_all;
					}

					if($this->subtopic_assign_all!="")
					{
						$level_number =2;
						$level_code = $this->subtopic_assign_all;
					}	
					if($this->subsubtopic_assign_all !="")
					{
						$level_number =3;
						$level_code = $this->subsubtopic_assign_all;

					}
					if($this->concept_assign_all!="")
					{
						$level_number =4;
						$level_code = $this->concept_assign_all;
					}
					if($this->level5_assign_all!="")
					{
						$level_number =5;
						$level_code = $this->level5_assign_all;						
					}

					
					if($counter_check!=0)
					{						
					//	$main_query = "UPDATE ei_queConceptMapping SET ei_topic_code = '".$topic_code."',ei_subtopic_code = '".$st_code."',ei_sub_subtopic_code = '".$sst_code."',ei_concept_code = '".$conceptCode."',updated_by='".$_SESSION["username"]."',updated_dt=NOW() WHERE id = '$counter_check'";
						$main_query = "UPDATE ei_queConceptMapping SET level_number='".$level_number."', level_code = '".$level_code."',updated_by='".$_SESSION["username"]."',updated_dt=NOW() WHERE id = '$counter_check'";
					}
					else 
					{
					//	$main_query = "INSERT into ei_queConceptMapping (qcode,ei_topic_code,ei_subtopic_code,ei_sub_subtopic_code,ei_concept_code,mapped_by,mapped_dt,updated_dt) VALUES('$valueCode','$topic_code','$st_code','$sst_code','$conceptCode','".$_SESSION["username"]."',NOW(),'0000-00-00 00:00:00')";
					$main_query = "INSERT into ei_queConceptMapping (qcode,level_number, level_code, mapped_by,mapped_dt,updated_dt) VALUES('$valueCode','$level_number','$level_code','".$_SESSION["username"]."',NOW(),'0000-00-00 00:00:00')";
					}
					
					$dbquery = new dbquery($main_query,$connid);
				}	
			}			
			
			$this->msg = "Successfully Updated!";			
		}
	}
	
	
	function SaveMapping($connid){

		$QcodesArr  = array();
		$QcodeStr = "";
		$NeedtoUpdateQcodeArr = array();	
		$level_number= 0;
	//subtopic_assign
		if(is_array($this->topic_assign) && count($this->topic_assign) > 0){
			
			foreach($this->topic_assign as $keyQcode => $subCode)
			{
				if($subCode!="" && $keyQcode!="ALL")
				{
					$counter_check = 0;
					$level_number = 1 ;
					$level_code = $this->topic_assign[$keyQcode];

					$query = "SELECT id FROM ei_queConceptMapping WHERE qcode = '$keyQcode' AND mapped_by = '".$_SESSION["username"]."' AND project = 'DA'";
					$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray()){
						$counter_check = $row["id"];
					}	
				
					if($this->subtopic_assign[$keyQcode]!=""){
						$level_number =2;
						$level_code = $this->subtopic_assign[$keyQcode];
					}
					
					if($this->subsubtopic_assign[$keyQcode]!=""){
						$level_number =3;
						$level_code = $this->subsubtopic_assign[$keyQcode];
					}	

					if($this->concept_assign[$keyQcode]!=""){
						$level_number =4;
						$level_code = $this->concept_assign[$keyQcode];
					}
					
					if($this->level5_assign[$keyQcode]!=""){
						$level_number =5;
						$level_code = $this->level5_assign[$keyQcode];						
					}
					
					if($counter_check!=0)
					{					
						//$main_query = "UPDATE ei_queConceptMapping SET ei_topic_code = '".$topic_code."',ei_subtopic_code = '".$st_code."',ei_sub_subtopic_code = '".$sst_code."',ei_concept_code = '".$conceptCode."',updated_by='".$_SESSION["username"]."',updated_dt=NOW() WHERE id = '$counter_check'";
						$main_query = "UPDATE ei_queConceptMapping SET level_number='".$level_number."', level_code = '".$level_code."',updated_by='".$_SESSION["username"]."',updated_dt=NOW() WHERE id = '$counter_check'";
					}
					else 
					{
						//$main_query = "INSERT into ei_queConceptMapping (qcode,ei_topic_code,ei_subtopic_code,ei_sub_subtopic_code,ei_concept_code,mapped_by,mapped_dt,updated_dt) VALUES('$keyQcode','$topic_code','$st_code','$sst_code','$conceptCode','".$_SESSION["username"]."',NOW(),'0000-00-00 00:00:00')";
						$main_query = "INSERT into ei_queConceptMapping (qcode,level_number, level_code, mapped_by,mapped_dt,updated_dt) VALUES('$keyQcode','$level_number','$level_code','".$_SESSION["username"]."',NOW(),'0000-00-00 00:00:00')";
					}
					
					
					$dbquery = new dbquery($main_query,$connid);
				}	
			}			
			
			$this->msg = "Successfully Updated!";			
		}
	}
	
	
	function SearchQuestionForMapping($connid,$paging="N"){
		
		$qcodes_list = "";
		$arrRet = array();
		
		if(is_array($arrQcodes) && count($arrQcodes) > 0)
			$qcodes_list = implode($arrQcodes,",");
		$arrRet = array();
		$arrPassageDetails = $this->getPassageDetails($connid);
		
		$query = "SELECT a.*,b.description as subtopic,c.description as topic, d.description as subsubtopic, a.sub_subtopic_code
		          FROM  da_questions a, da_subSubTopicMaster d, da_subtopicMaster b,da_topicMaster c
		          WHERE  a.sub_subtopic_code=d.sub_subtopic_code AND d.subtopic_code = b.subtopic_code AND b.topic_code = c.topic_code";
		
		if($this->class != "" && $this->class > 0)
			$query.=" AND a.class = '".$this->class."' ";
		
		if($this->subjectno != "" && $this->subjectno > 0)
		{			
			$query.=" AND a.subjectno IN (".$this->subjectno.") ";
		}
		if($this->subjectno == ""){
			$query.=" AND a.subjectno IN (2) ";
		}
		if($this->topic_code != "" && $this->topic_code > 0)
			$query.=" AND c.topic_code = '".$this->topic_code."' ";
		if($this->subtopic_code != "" && $this->subtopic_code > 0)
			$query.=" AND b.subtopic_code = '".$this->subtopic_code."' ";
		if($this->sub_subtopic_code != "" && $this->sub_subtopic_code > 0)
			$query.=" AND a.sub_subtopic_code = '".$this->sub_subtopic_code."' ";
			
		if($this->topic_code == ""){
			$query.=" AND c.topic_code = '335'";
		}
			
		$query.=" ORDER BY a.sub_subtopic_code,group_id,qcode";
		
		$this->clspaging->numofrecs = getQueryCount($query);
		
		if($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}
		
		if($paging == "Y")
			$query .= $this->clspaging->limit;
		
		if($_SESSION["username"] == "jaspreet" || $_SESSION["username"] == "sudhir.prajapati" || $_SESSION["username"] == "tb.test")
			echo $query;
				
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["qcode"]] = array("question"=>$row["question"],
										"class"=>$row["class"],
										"subjectno"=>$row["subjectno"],
										"topic"=>$row["topic"],
										"subtopic"=>$row["subtopic"],
										"subsubtopic"=>$row["subsubtopic"],
										"sub_subtopic_code"=>$row["sub_subtopic_code"],
										"optiona"=>$row["optiona"],
										"optionb"=>$row["optionb"],
										"optionc"=>$row["optionc"],
										"optiond"=>$row["optiond"],
										"correct_answer"=>$row["correct_answer"],
										"question_maker"=>$row["question_maker"],
										"status"=>$row["status"],
										"first_alloted"=>$row["first_alloted"],
										"current_alloted"=>$row["current_alloted"],
										"skill"=>$row["skill"],
										"misconception"=>$row["misconception"],
										"tag_ques"=>$row["tag_ques"],
										"question_testing"=>$row["question_testing"],
										"passage_name"=>isset($arrPassageDetails[$row["passage_id"]])?$arrPassageDetails[$row["passage_id"]]:"",
										"approver2_status"=>$row["approver2_status"],
										"parent_qcode" => $row["parent_qcode"],
										"ips_status"=>$row["ips_status"]);
		}
		
		return $arrRet;
	}
	
	function getPassageDetails($connid="",$class="")
	{
		$arrRet = array();
		$query = "SELECT count( b.qcode ) AS qcount,a.passage_id,a.passage_name,a.subjectno FROM qms_passage a LEFT JOIN da_questions b ON a.passage_id = b.passage_id WHERE a.project = 'DA' AND a.status = 'A'";
		if($class != "")
			$query.=" AND a.class = '".$class."' ";
		$query.=" GROUP BY a.passage_id ORDER BY a.passage_name " ;
		//echo $query;
		$result = mysql_query($query) or die(mysql_error());
		while($row = mysql_fetch_array($result))
		{
			$concatpassagecount = "";
			if($row["subjectno"]==1)
			{
				if($row['qcount']!=0 && $row['qcount']!="")
				{
					$concatpassagecount = " (".$row['qcount'].")";
				}
			}
			 $arrRet[$row["passage_id"]] = $row["passage_name"].$concatpassagecount;
		}
		return $arrRet;
	}
	
	function getSubtopicConcept($connid)
	{		
		$condition = "where topic_code =" . $this->topic_code ;		

		$query = "SELECT description,subtopic_code,disp_order FROM ei_subtopicMaster ".$condition . " order by  disp_order";
      

        $dbquery = new dbquery($query,$connid);
	
          $i=0;	
        while($row= $dbquery->getrowarray())
        {
        	$i++;
        	$arrRet[$i]['subTopic_code']= $row['subtopic_code'];
        	$arrRet[$i]["description"] =$row['description'];
        	$arrRet[$i]['disp_order'] = $row['disp_order'];
        }
        return $arrRet;
	}

	function getTopic($connid,$subjectno = "")
	{		
		$condition = "1=1";
		if($subjectno != "") $condition .= " AND subjectno = $subjectno";
		$query = "SELECT description,topic_code FROM ei_topicMaster WHERE ".$condition;
        
        $dbquery = new dbquery($query,$connid);
        while ($row = $dbquery->getrowarray())
        {
                $arrRet[$row["topic_code"]] = array("topic_code"=>$row["topic_code"],
                                                        "description"=>$row["description"]                                                        
                                                        );
        }
        return $arrRet;
	}
	function getSubtopic($connid, $topic_code ="")
	{		
		$condition = "WHERE topic_code = '".$topic_code."' order by topic_code";		
		$query = "SELECT description,subtopic_code FROM ei_subtopicMaster ".$condition;
        
        $dbquery = new dbquery($query,$connid);
        while ($row = $dbquery->getrowarray())
        {
                $arrRet[$row["subtopic_code"]] = array("subtopic_code"=>$row["subtopic_code"],
                                                        "description"=>$row["description"]                                                        
                                                        );
        }
        return $arrRet;
	}

	function getleve5ofConcept($connid, $cpt_code="")
	{

		$condition = "";
		
		if($cpt_code == "")
		{
				
			$st_code = $this->subtopic_code_combo;
		}

		$query = "SELECT * FROM ei_level5Master WHERE concept_code = '".$cpt_code."' ".$condition . ' order by disp_order ';
		
		$dbquery = new dbquery($query,$connid);
	
        $i=0;	
        while($row= $dbquery->getrowarray())
        {
        	$i++;
        	$arrRet[$i]['level5_code'] =$row['level5_code'];
        	$arrRet[$i]["description"] =$row['description'];
        	$arrRet[$i]["disp_order"] = $row["disp_order"];
        }
        return $arrRet;
	}

	function getsubSubtopicBySubtopicConcept($connid, $st_code ="")
	{
		$condition = "";
		
		if($st_code == "")
		{				
			$st_code = $this->subtopic_code_combo;
		}

		$query = "SELECT * FROM ei_subSubTopicMaster WHERE subtopic_code = '".$st_code."' ".$condition . ' order by disp_order ';
	
		$dbquery = new dbquery($query,$connid);
	
        $i=0;	
        while($row= $dbquery->getrowarray())
        {
        	$i++;
        	$arrRet[$i]['sst_code'] =$row['sub_subtopic_code'];
        	$arrRet[$i]["description"] =$row['description'];
        	$arrRet[$i]["disp_order"] = $row["disp_order"];
        }
      
        return $arrRet;
	}
	function getsubSubtopicBySubtopic($connid,$st_code="")
	{
		$this->setpostvars();
		$condition = "";
		if($st_code=="")
		{
			$st_code = $this->subtopic_code_combo;
		}	
		$query = "SELECT * FROM ei_subSubTopicMaster WHERE subtopic_code = '".$st_code."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	
	function getConceptBySST($connid,$sst_code="")
	{
		
		$condition = " order by disp_order";
		if($sst_code=="")
		{
			$sst_code = $this->subsubtopic_code_combo;
		}	
		$query = "SELECT concept_code, description, disp_order FROM ei_conceptsMaster WHERE sub_subtopic_code = '".$sst_code."' ".$condition;
	
		$dbquery = new dbquery($query,$connid);
	//	return $dbquery;

		 $i=0;	
        while($row= $dbquery->getrowarray())
        {
        	$i++;
        	$arrRet[$i]['concept_code'] =$row['concept_code'];
        	$arrRet[$i]["description"] =$row['description'];
        	$arrRet[$i]["disp_order"] = $row["disp_order"];
        }
  //      print_r($arrRet);
      
        return $arrRet;

	}

	function pageAddEditTopic($connid)
	{
		$this->setpostvars();
		$this->setgetvars();

		if($this->action == "SaveData")
		{
			$this->saveDataTopic($connid);
		}
	}
	function saveDataTopic($connid)
	{
		
		if($this->topic_code == "")
		{
			$query ="insert into ei_topicMaster set description='".$this->topicDesc. "', subjectno =". $this->subjectno .",  entered_by = '".$_SESSION["username"]."'";
			
			$dbquery = new dbquery($query,$connid);
		}	
		else if($this->topic_code != "" && $this->topic_code != 0)
		{
			$query ="update ei_topicMaster set description='".$this->topicDesc. "', subjectno =". $this->subjectno .",  entered_by = '".$_SESSION["username"]."' where topic_code =". $this->topic_code ;
			
			$dbquery = new dbquery($query,$connid);
		}	
	}


	function retrieveTopicDetailsConcept($connid)
	{
		$this->setgetvars();
		
		$query = "SELECT * FROM ei_topicMaster WHERE topic_code = '".$this->topic_code."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		return $row;
	}


	function getConceptBysubSubtopic($connid,$sst_code="")
	{
		$this->setpostvars();
		$condition = "";
		
		if($sst_code=="")
		{
			$sst_code = $this->subsubtopic_code_combo;
		}	

		$query = "SELECT * FROM ei_conceptsMaster WHERE sub_subtopic_code = '".$sst_code."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		
		return $dbquery;
	}
	
	function getLevel5ByConcept($connid,$sst_code = "")
	{	
		
		$this->setpostvars();
		
		if($sst_code=="")
		{
			$sst_code = $this->concept_cd;
		}
		
		$query = "SELECT * FROM ei_level5Master WHERE concept_code = '".$sst_code."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		return $dbquery;

	}
	function getDataForMapping($current_user,$key,$connid)
	{
		$arrRet = array();
		
		$level_query = "select level_number,level_code from ei_queConceptMapping where qcode ='$key'";
		$dbquery = new dbquery($level_query, $connid);
		while ($res = $dbquery->getrowarray())
		{
			$level_depth = $res['level_number'];
			$level_code =$res['level_code'];
		}	

		if($level_depth == 1)
		{
			 $arrRet["qcode"] = $key;
	         $arrRet["ei_topic_code"] =$level_code;

	         return $arrRet;
		}
		
		if($level_depth == 2)
		{
			 $arrRet["qcode"] = $key;
	         $arrRet["ei_subtopic_code"] =$level_code;
	         
	          $sub_topicQuery= "select subtopic_code,topic_code from ei_subtopicMaster
	        				  	where subtopic_code ='".$level_code."'";

	        $dbquery = new dbquery($sub_topicQuery,$connid);
	        while($rw = $dbquery->getrowarray())
	        {
	        	$arrRet["ei_topic_code"]=$rw['topic_code'];
	        }

	         return $arrRet;
		}
		if($level_depth == 3)
		{
			$arrRet["qcode"] = $key;
	        $arrRet["ei_sub_subtopic_code"] =$level_code;

	        $sub_topicQuery= "select ei_subtopicMaster.subtopic_code,ei_topicMaster.topic_code from ei_subSubTopicMaster
	        				  left join ei_subtopicMaster ON ei_subSubTopicMaster.subtopic_code = ei_subtopicMaster.subtopic_code
	        				  left join ei_topicMaster ON ei_subtopicMaster.topic_code = ei_topicMaster.topic_code
	        				  where ei_subSubTopicMaster.sub_subtopic_code ='".$level_code."'";

	        $dbquery = new dbquery($sub_topicQuery,$connid);
	        while($rw = $dbquery->getrowarray())
	        {
	        	$arrRet["ei_subtopic_code"]=$rw['subtopic_code'];
	        	$arrRet["ei_topic_code"]=$rw['topic_code'];
	        }

	        return $arrRet;
		}

		if($level_depth == 4)
		{
			$arrRet["qcode"] = $key;
			 $arrRet["ei_concept_code"] =$level_code;

			 $sub_subQuery = "select ei_subSubTopicMaster.sub_subtopic_code,ei_subtopicMaster.subtopic_code,ei_topicMaster.topic_code 
			 				  from ei_conceptsMaster 
			 		          left join ei_subSubTopicMaster ON ei_conceptsMaster.sub_subtopic_code = ei_subSubTopicMaster.sub_subtopic_code
			 		          left join ei_subtopicMaster ON ei_subSubTopicMaster.subtopic_code = ei_subtopicMaster.subtopic_code
			 		          left join ei_topicMaster ON ei_subtopicMaster.topic_code = ei_topicMaster.topic_code
			 				  where ei_conceptsMaster.concept_code = $level_code";
			 $dbquery = new dbquery($sub_subQuery,$connid);

			 while($rs = $dbquery->getrowarray())
			 {
			 	 $arrRet["ei_sub_subtopic_code"] = $rs["sub_subtopic_code"];
			 	 $arrRet["ei_subtopic_code"] =$rs['subtopic_code'];
			 	 $arrRet["ei_topic_code"] =$rs['topic_code'];
			 }

			 return $arrRet;

		}

		if($level_depth == 5)
		{
			$arrRet["qcode"] = $key;
			$arrRet["ei_level5_code"]= $level_code;
			
			 $sub_subQuery = "select ei_conceptsMaster.concept_code,ei_subSubTopicMaster.sub_subtopic_code,ei_subtopicMaster.subtopic_code,ei_topicMaster.topic_code 
			 				  from ei_level5Master 
			 				  left join ei_conceptsMaster ON ei_level5Master.concept_code = ei_conceptsMaster.concept_code
			 		          left join ei_subSubTopicMaster ON ei_conceptsMaster.sub_subtopic_code = ei_subSubTopicMaster.sub_subtopic_code
			 		          left join ei_subtopicMaster ON ei_subSubTopicMaster.subtopic_code = ei_subtopicMaster.subtopic_code
			 		          left join ei_topicMaster ON ei_subtopicMaster.topic_code = ei_topicMaster.topic_code
			 				  where ei_level5Master.level5_code = $level_code";
			 $dbquery = new dbquery($sub_subQuery,$connid);
			 while($result = $dbquery->getrowarray()){

			 	 $arrRet["ei_concept_code"] = $result["concept_code"];
				 $arrRet["ei_sub_subtopic_code"] = $result["sub_subtopic_code"];
				 $arrRet["ei_subtopic_code"]=$result['subtopic_code'];
				 $arrRet["ei_topic_code"]=$result['topic_code'];
			 }

			return $arrRet;
		}
	
        return $arrRet;
	}
	
	function getTopicsBySubjectTree($connid,$subjectno)
	{
		$arrRet = array();
		if($subjectno != "")
		{
			$condition = " WHERE subjectno IN (".$subjectno.") ";			
					
			$query = "SELECT topic_code, description FROM ei_topicMaster". $condition ." ORDER BY description"; 

			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray()){
				$arrRet[$row["topic_code"]] = $row["description"];
			}
		}
		return $arrRet;
	}
	
	
	function getTopicSTSSTCount($connid,$subjectno)
	{
	    $arrTopicCount = array();
	    $arrTopicCount["T"] = $arrTopicCount["ST"] = $arrTopicCount["SST"] = $arrTopicCount["C"] = 0;	    
	    if($subjectno!="")
	    {	      
	      $query = "SELECT count(distinct a.topic_code) as T, count(distinct b.subtopic_code) as ST, count(distinct c.sub_subtopic_code) as SST, count(distinct d.concept_code) as C, count(distinct e.level5_code ) as level5
	                  FROM   ei_topicMaster a LEFT JOIN ei_subtopicMaster b ON a.topic_code=b.topic_code
	                             LEFT JOIN ei_subSubTopicMaster c ON b.subtopic_code=c.subtopic_code
	                             LEFT JOIN ei_conceptsMaster d ON c.sub_subtopic_code=d.sub_subtopic_code
	                             LEFT JOIN ei_level5Master e ON d.concept_code = e.concept_code";
	        $result = mysql_query($query) or die("Error in fetching the count of T/ST/SST".mysql_error());
	        $line = mysql_fetch_array($result);
	        $arrTopicCount["T"] = $line['T'];
	        $arrTopicCount["ST"] = $line['ST'];
	        $arrTopicCount["SST"] = $line['SST'];
	        $arrTopicCount["C"] = $line['C'];
	        $arrTopicCount["level5"] = $line['level5'];
	    }
	    return $arrTopicCount;
	}
	
	function getSubtopicByTopicTree($connid,$topic_code)
    {
        $arrRet = array();
		$condition = "";		
		
        $query = "SELECT DISTINCT description,subtopic_code FROM ei_subtopicMaster WHERE topic_code = '".$topic_code."' ".$condition;
        //echo $query;
        $dbquery = new dbquery($query,$connid);
        while ($row = $dbquery->getrowarray())
        {
                $arrRet[$row["subtopic_code"]] = array("subtopic_code"=>$row["subtopic_code"],
                                                        "description"=>$row["description"],                                                        
                                                        );
        }
        return $arrRet;
    }
    
    function getSubtopicByTopic($connid,$topic_code = "")
	{	
		$this->setpostvars();
		$query = "SELECT * FROM ei_subtopicMaster WHERE topic_code = '".$topic_code."'";
	
		$dbquery = new dbquery($query,$connid);
		
		return $dbquery;
	}
    
    function getsubSubtopicBySubtopicTree($connid,$subtopic_code="")
	{	
		$this->setpostvars();			
	
		$query = "SELECT * FROM ei_subSubTopicMaster WHERE subtopic_code = '".$subtopic_code."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	
	function getConceptBySSTTree($connid,$subsubtopic_code)
	{
		$this->setpostvars();			
	
		$query = "SELECT * FROM ei_conceptsMaster WHERE sub_subtopic_code = '".$subsubtopic_code."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getlevel5Tree($connid, $concept_code)
	{
		$this->setpostvars();			
	
		$query = "SELECT * FROM ei_level5Master WHERE concept_code = '".$concept_code."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;

	}
	
	function getMappedUsers($connid)
	{
		$this->setpostvars();		
		
		$query ="SELECT DISTINCT(mapped_by) as mapped_by FROM ei_queConceptMapping WHERE project = 'DA'";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	
	function SearchQuestionForMappingByUsers($connid,$paging="N"){
		
		$qcodes_list = "";
		$arrRet = array();
		
		if(is_array($arrQcodes) && count($arrQcodes) > 0)
			$qcodes_list = implode($arrQcodes,",");
		$arrRet = array();
	//	$arrPassageDetails = $this->getPassageDetails($connid);


//		$query ="SELECT qcode, level_number,level_code from ei_queConceptMapping where project = 'DA' and mapped_by = '".$this->mapped_user."' order by qcode";	
		$query ="SELECT qcode, level_number, level_code from ei_queConceptMapping  where project = 'DA' and mapped_by='".$this->mapped_user."' ";

		$condition ="";

		if($this->topic_assign_all !="" && $this->topic_assign_all > 0)
		{
			$condition = " AND level_number = 1 AND level_code ='". $this->topic_assign_all."'";
		}
		if($this->subtopic_assign_all != "" && $this->subtopic_assign_all > 0)
			$condition = "AND level_number = 2  AND level_code ='".$this->subtopic_assign_all."' ";
		if($this->subsubtopic_assign_all != "" && $this->subsubtopic_assign_all > 0)
			$condition = "AND level_number = 3  AND level_code ='".$this->subsubtopic_assign_all."' ";
		if($this->concept_assign_all != "" && $this->concept_assign_all > 0)
			$condition = "AND level_number = 4 AND level_code ='".$this->concept_assign_all."' ";
		if($this->level5_assign_all != "" && $this->level5_assign_all > 0)
		{
			$condition = "AND level_number = 5  AND level_code ='".$this->level5_assign_all."'";
		} 		
		
		$query.= $condition. " ORDER by qcode";

		$this->clspaging->numofrecs = getQueryCount($query);
		
		if($this->clspaging->numofrecs > 0) {
			$this->clspaging->getcurrpagevardb();
		}
		
		if($paging == "Y")
			$query .= $this->clspaging->limit;		
			
		if($_SESSION["username"] == "jaspreet" || $_SESSION["username"] == "sudhir.prajapati" || $_SESSION["username"] == "tb.test")
			echo $query;	

		$dbquery = new dbquery($query,$connid);

		while($levelRs = $dbquery->getrowarray())
		{
			$level_depth = $levelRs["level_number"];
			$level_code = $levelRs["level_code"];

			$topic = "";
			$subtopic = "";
			$subsubtopic = "";
			$concept = "";
			$level5 = "";

			if($level_depth == 1)
			{
				$query_topic ="SELECT description from ei_topicMaster where topic_code ='".$level_code."'";
				$dbquery_topic = new dbquery($query_topic, $connid);
				while($row_topic = $dbquery_topic->getrowarray())
				{
					$topic= $row_topic["description"];
				}

			}
			if($level_depth == 2)
			{

			  	$sub_topicQuery= "select a.description subtopic, b.description topic from ei_subtopicMaster  a left join ei_topicMaster b ON a.topic_code = b.topic_code
        				  	where a.subtopic_code ='".$level_code."'";

		        $dbquery_subtopic = new dbquery($sub_topicQuery,$connid);
		        while($rw = $dbquery_subtopic->getrowarray())
		        {
		        	$topic=$rw['topic'];
		        	$subtopic=$rw['subtopic'];
		        }

			}
			if($level_depth == 3)
			{
				$sst_query = "select a.description sub_subtopic, b.description subtopic,c.description topic from ei_subSubTopicMaster a
	        				  left join ei_subtopicMaster b ON a.subtopic_code = b.subtopic_code
	        				  left join ei_topicMaster c  ON b.topic_code = c.topic_code
	        				  where a.sub_subtopic_code = '".$level_code."'";

	        	$dbquery_sst = new dbquery($sst_query, $connid);
	        	while($sst_rs = $dbquery_sst->getrowarray())
	        	{
	        		$topic = $sst_rs["topic"];
	        		$subtopic = $sst_rs["subtopic"];
	        		$subsubtopic = $sst_rs["sub_subtopic"]; 
	        	}			  	

			}
			if($level_depth == 4)
			{
				$concept_query = "select a.description concept, b.description sub_subtopic, c.description subtopic, d.description topic  
			 				  from ei_conceptsMaster a
			 		          left join ei_subSubTopicMaster b ON a.sub_subtopic_code = b.sub_subtopic_code
			 		          left join ei_subtopicMaster c ON b.subtopic_code = c.subtopic_code
			 		          left join ei_topicMaster d ON c.topic_code = d.topic_code
			 				  where a.concept_code ='".$level_code."'";

			 	$dbquery_concept = new dbquery($concept_query, $connid);

			 	while($concept_rs = $dbquery_concept->getrowarray())
			 	{
			 		$topic =$concept_rs["topic"];
			 		$subtopic = $concept_rs["subtopic"];
	        		$subsubtopic = $concept_rs["sub_subtopic"];
	        		$concept = $concept_rs["concept"]; 
			 	}
			}
			if($level_depth == 5)
			{
				$level5_query = "select a.description level5 , b.description concept, c.description sub_subtopic,d.description subtopic, e.description topic 
			 				  from ei_level5Master a
			 				  left join ei_conceptsMaster b ON a.concept_code = b.concept_code
			 		          left join ei_subSubTopicMaster  c ON b.sub_subtopic_code = c.sub_subtopic_code
			 		          left join ei_subtopicMaster d ON c.subtopic_code = d.subtopic_code
			 		          left join ei_topicMaster e ON d.topic_code = e.topic_code
			 				  where a.level5_code ='".$level_code."'";

			 	$dbquery_level5 = new dbquery($level5_query, $connid);

			 	while($level5_rs = $dbquery_level5->getrowarray())
			 	{
			 		$topic =$level5_rs["topic"];
			 		$subtopic = $level5_rs["subtopic"];
	        		$subsubtopic = $level5_rs["sub_subtopic"];
	        		$concept = $level5_rs["concept"]; 
	        		$level5 = $level5_rs["level5"];	

			 	} 			  
			}

				$query_ques ="SELECT * from da_questions where qcode = '".$levelRs['qcode']."'";
				$db_ques = new dbquery($query_ques, $connid);

				while($row = $db_ques->getrowarray())
				{
					$arrRet[$row["qcode"]] = array("question"=>$row["question"],
										"class"=>$row["class"],
										"subjectno"=>$row["subjectno"],
										"topic"=>$topic,										
										"subtopic"=>$subtopic,
										"subsubtopic"=>$subsubtopic,
										"concept"=>$concept,
										"level5"=>$level5,
										"sub_subtopic_code"=>$row["sst_code"],
										"optiona"=>$row["optiona"],
										"optionb"=>$row["optionb"],
										"optionc"=>$row["optionc"],
										"optiond"=>$row["optiond"],
										"correct_answer"=>$row["correct_answer"],
										"question_maker"=>$row["question_maker"],
										"status"=>$row["status"],
										"first_alloted"=>$row["first_alloted"],
										"current_alloted"=>$row["current_alloted"],
										"skill"=>$row["skill"],
										"misconception"=>$row["misconception"],
										"tag_ques"=>$row["tag_ques"],
										"question_testing"=>$row["question_testing"],										
										"approver2_status"=>$row["approver2_status"],
										"parent_qcode" => $row["parent_qcode"],
										"ips_status"=>$row["ips_status"]);
				}
			}

		return $arrRet;
	}
	
	function getAllDataRelatedToMappedUsers($arrSearchDetails,$arrMappedUsers,$connid)
	{
		$arrRet = array();
		$changeFlagSet = 0;

		foreach($arrSearchDetails as $key =>$value){
			foreach($arrMappedUsers as $keyMappedUsers => $valueMappedUsers)
			{
				$topic ="";
				$subtopic ="";
				$subsubtopic ="";
				$concept= "";
				$level5 ="";

				$query ="SELECT qcode, level_number, level_code from ei_queConceptMapping  where project = 'DA' and qcode = '".$key."' and mapped_by= '".$valueMappedUsers."' ";
				$dbquery = new dbquery($query, $connid);

				while($row = $dbquery->getrowarray())
				{
					$level_depth = $row["level_number"];
					$level_code =$row["level_code"];

					if($level_depth == 1)
					{
						$query_topic ="SELECT description from ei_topicMaster where topic_code ='".$level_code."'";
						$dbquery_topic = new dbquery($query_topic, $connid);
						while($row_topic = $dbquery_topic->getrowarray())
						{
							$topic= $row_topic["description"];
						}
					}
					if($level_depth ==  2)
					{
						$sub_topicQuery= "select a.description subtopic, b.description topic from ei_subtopicMaster  a left join ei_topicMaster b ON a.topic_code = b.topic_code
        				  	where a.subtopic_code ='".$level_code."'";

				        $dbquery_subtopic = new dbquery($sub_topicQuery,$connid);
				        while($rw = $dbquery_subtopic->getrowarray())
				        {
				        	$topic=$rw['topic'];
				        	$subtopic=$rw['subtopic'];
				        }
					}
					if($level_depth == 3)
					{
						$sst_query = "select a.description sub_subtopic, b.description subtopic,c.description topic from ei_subSubTopicMaster a
	        				  left join ei_subtopicMaster b ON a.subtopic_code = b.subtopic_code
	        				  left join ei_topicMaster c  ON b.topic_code = c.topic_code
	        				  where a.sub_subtopic_code = '".$level_code."'";

			        	$dbquery_sst = new dbquery($sst_query, $connid);
			        	while($sst_rs = $dbquery_sst->getrowarray())
			        	{
			        		$topic = $sst_rs["topic"];
			        		$subtopic = $sst_rs["subtopic"];
			        		$subsubtopic = $sst_rs["sub_subtopic"]; 
			        	}
					}
					if($level_depth == 4)
					{
						$concept_query = "select a.description concept, b.description sub_subtopic, c.description subtopic, d.description topic  
					 				  from ei_conceptsMaster a
					 		          left join ei_subSubTopicMaster b ON a.sub_subtopic_code = b.sub_subtopic_code
					 		          left join ei_subtopicMaster c ON b.subtopic_code = c.subtopic_code
					 		          left join ei_topicMaster d ON c.topic_code = d.topic_code
					 				  where a.concept_code ='".$level_code."'";

					 	$dbquery_concept = new dbquery($concept_query, $connid);

					 	while($concept_rs = $dbquery_concept->getrowarray())
					 	{
					 		$topic =$concept_rs["topic"];
					 		$subtopic = $concept_rs["subtopic"];
			        		$subsubtopic = $concept_rs["sub_subtopic"];
			        		$concept = $concept_rs["concept"]; 
					 	}
					}
					if($level_depth == 5)
					{
						$level5_query = "select a.description level5 , b.description concept, c.description sub_subtopic,d.description subtopic, e.description topic 
					 				  from ei_level5Master a
					 				  left join ei_conceptsMaster b ON a.concept_code = b.concept_code
					 		          left join ei_subSubTopicMaster  c ON b.sub_subtopic_code = c.sub_subtopic_code
					 		          left join ei_subtopicMaster d ON c.subtopic_code = d.subtopic_code
					 		          left join ei_topicMaster e ON d.topic_code = e.topic_code
					 				  where a.level5_code ='".$level_code."'";

					 	$dbquery_level5 = new dbquery($level5_query, $connid);

					 	while($level5_rs = $dbquery_level5->getrowarray())
					 	{
					 		$topic =$level5_rs["topic"];
					 		$subtopic = $level5_rs["subtopic"];
			        		$subsubtopic = $level5_rs["sub_subtopic"];
			        		$concept = $level5_rs["concept"]; 
			        		$level5 = $level5_rs["level5"];	

					 	} 			  
					}
				
			
					$arrRet[$key][$valueMappedUsers] = array("topic"=>$topic,"subtopic"=>$subtopic,"subsubtopic"=>$subsubtopic,"concept"=>$concept, "level5"=>$level5);
				}			
			}	
		}
		return $arrRet;
	}
	
	function getChangedQcodes($arrMappedUserDataRelated,$connid)
	{		
		$arrRet = array();
		
		foreach($arrMappedUserDataRelated as $keyMappedUserDataRelated => $valueMappedUserDataUsed)
		{
			$arrSubtopic = array();
			$arrSubsubtopic = array();
			$arrConcepts = array();
			foreach($valueMappedUserDataUsed as $keyMapped => $valueMapped)
			{
				if(count($arrSubtopic)==0){					
					$arrSubtopic[$valueMapped["subtopic"]] = $valueMapped["subtopic"];
				}else {
					if(isset($arrSubtopic) && count($arrSubtopic)>0)
					{
						if(!in_array($valueMapped["subtopic"],$arrSubtopic))
						{
							$arrRet[$keyMappedUserDataRelated] = $keyMappedUserDataRelated;
						}
					}	
				}
				
				if(count($arrSubsubtopic)==0){					
					$arrSubtopic[$valueMapped["subsubtopic"]] = $valueMapped["subsubtopic"];
				}else {
					if(isset($arrSubsubtopic) && count($arrSubsubtopic)>0)
					{
						if(!in_array($valueMapped["subsubtopic"],$arrSubsubtopic))
						{
							$arrRet[$keyMappedUserDataRelated] = $keyMappedUserDataRelated;
						}
					}	
				}
				
				if(count($arrConcepts)==0){					
					$arrConcepts[$valueMapped["concept"]] = $valueMapped["concept"];
				}else {
					if(isset($arrConcepts) && count($arrConcepts)>0)
					{
						if(!in_array($valueMapped["concept"],$arrConcepts))
						{
							$arrRet[$keyMappedUserDataRelated] = $keyMappedUserDataRelated;
						}
					}	
				}
				
			}
			
		}
		return $arrRet;
	}

	function codeMappedQues($connid,$code="", $level)
	{
		$condition =" and level_number ='".$level."' ";	
		$query = "SELECT count(*) FROM ei_queConceptMapping WHERE level_code = '".$code."' ". $condition;

		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];

	}
	// get questions mapped to the level 
	function getCountQuestionsMapped ($level_code, $level_number, $connid)
	{
		$query ="SELECT count(distinct qcode) cnt FROM ei_queConceptMapping WHERE level_code='".$level_code."' AND level_number ='".$level_number."' AND project = 'DA'";
		
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["cnt"];
	}
	function getQuestionsMapped($level_code, $level_number,  $connid)
	{
		$tableName_condition ="";
		$tableName_field ="";
		$arrRet = array();

		$tableArr = array("", "ei_topicMaster", "ei_subtopicMaster", "ei_subSubTopicMaster", "ei_conceptsMaster", "ei_level5Master");
		$fieldArr = array("", "topic_code", "subtopic_code", "sub_subtopic_code", "concept_code", "level5_code");
	
		if($level_number >0 && $level_number <= 5)
		{
			$tableName_field = " ".$tableArr[$level_number].".description  ";
			$tableName_condition = " LEFT JOIN ".$tableArr[$level_number]. " ON ".$tableArr[$level_number].".".$fieldArr[$level_number]." = ei_queConceptMapping.level_code " ;
		

		$query = "SELECT ei_queConceptMapping.qcode, da_questions.question, da_questions.subjectno, da_questions.optiona, da_questions.optionb, da_questions.optionc, da_questions.optiond,
				  da_questions.correct_answer, da_questions.status,ei_queConceptMapping.mapped_by, da_questions.class, da_questions.question_maker ,".$tableName_field." 
				  FROM ei_queConceptMapping 
				  ".$tableName_condition."
				  LEFT JOIN da_questions ON ei_queConceptMapping.qcode = da_questions.qcode
				  WHERE ei_queConceptMapping.level_code = '".$level_code."' 
				  AND ei_queConceptMapping.level_number ='".$level_number."'
				  AND ei_queConceptMapping.project = 'DA'";

		//echo "$query <br/>";
		$dbquery = new dbquery($query, $connid);

			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["qcode"]] = array("question"=>$row["question"],
											"class"=>$row["class"],
											"subjectno"=>$row["subjectno"],
											"optiona"=>$row["optiona"],
											"optionb"=>$row["optionb"],
											"optionc"=>$row["optionc"],
											"optiond"=>$row["optiond"],
											"correct_answer"=>$row["correct_answer"],
											"question_maker"=>$row["question_maker"],
											"status"=>$row["status"],
											"description" =>$row["description"],
											"mapped_by" =>$row["mapped_by"],
											);
			}
		return $arrRet;
		}

		return $arrRet;
	}
}	
?>	