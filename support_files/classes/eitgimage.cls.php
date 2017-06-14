<?php
class clstgimage
{
	var $image_id;
	var $id;
	var $image_name;
	var $final_image_name;
	var $status;
	var $image_no;
	var $where_in_question;
	var $expected_date_artist;
	var $last_upload_date;
	var $subjectno;
	var $class;
	var $modified_date;
	var $current_alloted;
	var $action;
	var $approveImage;
	var $qmaker;
	var $comments;
	
	function clstgimage()
	{
		$this->clspaging = new clspaging('tgimageslist');
		$this->image_id = "";
		$this->id = "";
		$this->image_name = "";
		$this->final_image_name = "";
		$this->status = "";
		$this->image_no = "";
		$this->where_in_question = "";
		$this->expected_date_artist = "";
		$this->last_upload_date = "";
		$this->subjectno = "";
		$this->class = "";
		$this->modified_date = "";
		$this->current_alloted = "";
		$this->action = "";
		$this->approveImage = "";
		$this->qmaker = "";
		$this->comments = "";
	}
	function setpostvars()   
	{
		if(isset($_POST["clstgimage_hdnaction"])) $this->action = $_POST["clstgimage_hdnaction"];
		if(isset($_POST["clstgimage_qmaker"])) $this->qmaker = $_POST["clstgimage_qmaker"];
		if(isset($_POST["clstgimage_comments"])) $this->comments = $_POST["clstgimage_comments"];
		if(isset($_POST["clstgadminquestions_class"])) $this->class = $_POST["clstgadminquestions_class"];
		if(isset($_POST["clstgadminquestions_subject"])) $this->subjectno = $_POST["clstgadminquestions_subject"];
		if(isset($_POST["ApproveImage"])) $this->approveImage = $_POST["ApproveImage"];
	}
	function setgetvars()
	{
		if(isset($_GET["qmaker"])) $this->qmaker = $_GET["qmaker"];
		if(isset($_GET["class"])) $this->class = $_GET["class"];
		if(isset($_GET["subjectno"])) $this->subjectno = $_GET["subjectno"];
		if(isset($_GET["current_alloted"])) $this->current_alloted = $_GET["current_alloted"];
	}
	function pageImageFormatting($connid,$final_image_name,$id)
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->action == "UpdateData")
		{
			$this->setImageFilename($connid,$final_image_name,$id);
		}
		if($this->action == "SaveChanges")
		{
			$this->setComments($connid);
		}
	}
	function getAllImages($connid)
	{
		$arrRet = array();
		$this->setgetvars();
		$this->setpostvars();
		$this->clspaging->setgetvars();
                
        $this->clspaging->numofrecsperpage = 20;
		$image_desc = "";
		
		$condition = " ORDER BY lastmodifieddate DESC ";
		$queryCond = "";
		$queryCount = "SELECT count(*) FROM tg_images WHERE 1 = 1  ";
		$query = "SELECT tg_images.* FROM tg_images WHERE 1 = 1  ";
		if($this->class != "" && $this->class != 0)
			$queryCond.=" AND tg_images.class = '".$this->class."'";
		if($this->subjectno != "" && $this->subjectno != 0)
			$queryCond.=" AND tg_images.parent_subjectno = '".$this->subjectno."'";
		if($this->current_alloted != "" && !($_SESSION["username"] == 'vishnu' || $_SESSION["username"] == 'jaspreet' || $_SESSION["username"] == 'rama.naicker'))	
			$queryCond.=" AND tg_images.current_alloted = '".$this->current_alloted."'";
		if($this->qmaker != "" && !($_SESSION["username"] == 'vishnu' || $_SESSION["username"] == 'jaspreet' || $_SESSION["username"] == 'rama.naicker'))	
			$queryCond.=" AND tg_images.qmaker = '".$this->qmaker."' AND current_alloted = 'Designer' ";
		$queryCount = $queryCount." ".$queryCond." ".$condition;
		$dbqueryCount = new dbquery($queryCount,$connid);
		$rowCount = $dbqueryCount->getrowarray();
		$this->clspaging->numofrecs = $rowCount[0];
		if($this->clspaging->numofrecs >0)
        {
          $this->clspaging->getcurrpagevardb();
        }		
		$query = $query." ".$queryCond." ".$condition." ".$this->clspaging->limit;
		//echo $query;		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			/*if($row["where_in_question"] == "IDO")
			{*/
				$grpImageDesc = "";
				$queryID = "SELECT image_description FROM tg_questions WHERE qcode = '".$row["id"]."'";
				$dbqueryID = new dbquery($queryID,$connid);	
				$rowID = $dbqueryID->getrowarray();
				$image_desc = $rowID["image_description"];
			/*}*/
			if($row["where_in_question"] == "GIDO" || $row["where_in_question"] == "GT")
			{
				$queryGrpImgDesc = "SELECT groupimage_description FROM tg_groupmaster WHERE groupid = '".$row["id"]."'";
				$dbqueryGrpImgDesc = new dbquery($queryGrpImgDesc,$connid);
				$rowGrpImgDesc = $dbqueryGrpImgDesc->getrowarray();
				$grpImageDesc = $rowGrpImgDesc["groupimage_description"];
			}
			$final_image = "";
			$final_image_name = "";
			if($row["final_image_name"] != "")
			{
				$final_image = explode('.',$row["final_image_name"]);
				$final_image_name = $final_image[0].'.jpg';
			}
			$arrRet[$row["image_id"]] = array("image_id"=>$row["image_id"],
											  "id"=>$row["id"],
											  "image_name"=>$row["image_name"],
											  "final_image_name"=>$row["final_image_name"],
											  "image_no"=>$row["image_no"],
											  "status"=>$row["status"],
											  "class"=>$row["class"],
											  "where_in_question"=>$row["where_in_question"],
											  "expected_date_artist"=>$row["expected_date_artist"],
											  "last_upload_date"=>$row["last_upload_date"],
											  "current_alloted"=>$row["current_alloted"],
											  "subjectno"=>$row["subjectno"],
											  "qmaker"=>$row["qmaker"],
											  "comment"=>$row["comment"],
                                              "final_image_name_new"=>$row["final_image_name"], 
											  "image_description"=>$image_desc,
											  "groupimage_description"=>$grpImageDesc
											);
		}
		//print_r($arrRet);
		return $arrRet;
	}
	function setImageFilename($connid,$final_image_name,$id)
	{
		$query = "UPDATE tg_images SET final_image_name = '".$final_image_name."',status = '1',current_alloted='".$this->qmaker."',lastmodifieddate='".date("Y-m-d H:i:s")."' WHERE image_id = '".$id."'";
		$dbquery = new dbquery($query,$connid);
		
	}
	function getImageComments($connid)
	{
		$arrRet = array();
		$query = "SELECT qcode,comment FROM tg_comments WHERE type = 'I' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["qcode"]] = $row["comment"];
		}
		return $arrRet;
	}
	function setComments($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveChanges")
		{
			if(is_array($this->approveImage) && count($this->approveImage) >0)
			{
				foreach ($this->approveImage as $qcode)
				{
					//echo $qcode;
					$arrQcode = explode('|',$qcode);
					$id = $arrQcode[0];  
					$image_id = $arrQcode[1]; 
					
					if($this->comments[$image_id] != "" && $this->checkComments($connid,$this->comments[$image_id],$image_id))
					{
						$query = "INSERT INTO tg_comments SET qcode = '".$image_id."',comment = '".$this->comments[$image_id]."',type= 'I',commenter = '".$_SESSION["username"]."',submitdate = NOW()";
						$dbquery = new dbquery($query,$connid);
						$this->changeAllotment($connid,$image_id,$id);
					}
				}
				
			}
		}
	}
	function checkComments($connid,$comments,$image_id)
	{
		$query = "SELECT count(*) FROM tg_comments WHERE comment = '".$comments."' AND qcode = '".$image_id."' AND DATE_FORMAT(submitdate,'%Y-%m-%d') = '".date('Y-m-d')."' AND type = 'I'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] == 0)
			return true;
		else 
			return false;
	}
	function changeAllotment($connid,$image_id,$id)
	{
		$query = "UPDATE tg_images SET current_alloted = 'Designer',status = '2',lastmodifieddate='".date("Y-m-d H:i:s")."' WHERE image_id = '".$image_id."' AND id = '".$id."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		
	}
	function ApproveImages($connid)
	{
		$this->setpostvars();
		if($this->action == "Approve")
		{
			if(is_array($this->approveImage) && count($this->approveImage) >0)
			{
				foreach ($this->approveImage as $qcode)
				{
					$arrQcode = explode('|',$qcode);
					$id = $arrQcode[0];  
					$image_id = $arrQcode[1]; 
					$query = "UPDATE tg_images SET status = '3',current_alloted = '' WHERE image_id = '".$image_id."' AND id = '".$id."' LIMIT 1";
					$dbquery = new dbquery($query,$connid);	
					$this->replaceImagesInQuestion($connid,$id,$image_id);	
					
					$queryClass = "SELECT class,parent_subjectno,where_in_question FROM tg_images WHERE image_id = '".$image_id."' LIMIT 1";
					$dbqueryClass = new dbquery($queryClass,$connid);
					$rowClass = $dbqueryClass->getrowarray();
					
					if($rowClass["where_in_question"] != 'GT')
					{
						$queryStatus = "SELECT copied_from FROM tg_questions WHERE qcode = '".$id."' LIMIT 1";
						$dbqueryStatus = new dbquery($queryStatus,$connid);
						$row = $dbqueryStatus->getrowarray();
						if($row["copied_from"] != "" && $row["copied_from"] != 0)
							$this->ApproveCopiedQuestionsWithImages($connid,$id);
						else
						{
							$current_alloted = $this->calculateCurrentAlloter($connid,$rowClass["class"],$rowClass["parent_subjectno"]);
							$query1 = "UPDATE tg_questions SET current_alloted = '".$current_alloted."',status = '1' WHERE qcode = '".$id."' AND ( status = 8 OR status = 7 OR status = 3 ) AND status != 5 LIMIT 1";
							$dbquery1 = new dbquery($query1,$connid);
						}
					}	
					elseif ($rowClass["where_in_question"] == 'GT')
					{
						$queryGroup = "SELECT count(image_id) as count FROM tg_images WHERE id = '".$id."' AND where_in_question = 'GT' AND image_id != '".$image_id."' AND status < 3 ";
						$dbqueryGroup = new dbquery($queryGroup,$connid);
						$rowGroup = $dbqueryGroup->getrowarray();
						
						
						if($rowGroup["count"] == 0)
						{
							$current_alloted = $this->calculateCurrentAlloter($connid,$rowClass["class"],$rowClass["parent_subjectno"]);
							$queryGrp = "SELECT qcode FROM tg_questions WHERE groupid = '".$id."'";
							$dbqueryGrp = new dbquery($queryGrp,$connid);
							
							while($rowGrp = $dbqueryGrp->getrowarray())
							{
								$queryChk = "SELECT count(image_id) as count FROM tg_images WHERE id = '".$rowGrp["qcode"]."' and status < 3 ";
								$dbqueryChk = new dbquery($queryChk,$connid);
								$rowChk = $dbqueryChk->getrowarray();
								//exit;
								if($rowChk["count"] == 0)
								{
									//echo $current_alloted;
									$queryStatus = "SELECT copied_from FROM tg_questions WHERE qcode = '".$rowGrp["qcode"]."' LIMIT 1";
									$dbqueryStatus = new dbquery($queryStatus,$connid);
									$row = $dbqueryStatus->getrowarray();
									if($row["copied_from"] != "" && $row["copied_from"] != 0)
									{
										$this->ApproveCopiedQuestionsWithImages($connid,$rowGrp["qcode"]);
									}
									else if($current_alloted != '')
									{
										$query1 = "UPDATE tg_questions SET current_alloted = '".$current_alloted."',status = '1' WHERE qcode = '".$rowGrp["qcode"]."' AND ( status = 8 OR status = 7 OR status = 3 ) AND status != 5 LIMIT 1";
										$dbquery1 = new dbquery($query1,$connid);
									}
									
								}
							}
						}
					}
				}
			}
		}
	}
	function calculateCurrentAlloter($connid,$class,$subject)
    {
            $arrRet = array();
            $query = "SELECT userID,alloted FROM tg_allotmentmaster WHERE class = '".$class."' AND subjectno = '".$subject."' AND userID != '".$_SESSION["username"]."' AND target != 0";
            $dbquery = new dbquery($query,$connid);
            while($row = $dbquery->getrowarray())
            {
                    //echo $row["userID"];
                   $count = $this->getTotalNoOfQuesByClassSubjectQmaker($connid,$class,$subject,$row["userID"]);
                   /*if($count == 0)
                   	$count = 1;
                   $percentage = ($row["alloted"]/$count)*100;
                   $arrRet[$row["userID"]] = $percentage;*/
                   $arrRet[$row["userID"]] = $count;
             }

            asort($arrRet);
            /*echo "<pre>";
            print_r($arrRet);
            echo "</pre>";*/
            $arrNames = array_keys($arrRet);
                   return $arrNames[0];
    }
    function getTotalNoOfQuesByClassSubjectQmaker($connid,$class,$subject,$qmaker)
    {
        $arrRet = array();

        $query = "SELECT count(*) FROM tg_questions WHERE parent_subjectno = '".$subject."' AND class = '".$class."' AND current_alloted = '".$qmaker."' ";

        $dbquery = new dbquery($query,$connid);
        $row = $dbquery->getrowarray();
        return $row[0];
    }
	function ApproveCopiedQuestionsWithImages($connid,$qcode)
	{
		$status = "approved";
		$queryApprove = "UPDATE tg_questions SET status = '5' WHERE qcode = '".$qcode."' AND copied_from != '' AND copied_from != 0 LIMIT 1";
	    $dbqueryApprove = new dbquery($queryApprove,$connid);
		$query = "INSERT INTO tg_comments SET qcode = '".$qcode."',comment = 'Question $status',commenter='".$_SESSION["username"]."',type='ATUO',submitdate=NOW()";
        $dbquery = new dbquery($query,$connid);
	}
	function replaceImagesInQuestion($connid,$id,$image_id)
	{
		
		$query = "SELECT * FROM tg_images WHERE image_id = '".$image_id."' AND id = '".$id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$position = $row['where_in_question'];
		$original = "image_F"."/".$row['final_image_name'];
        if(!file_exists($original))
		{
			$arrFilename = explode('.',$row['final_image_name']);
			$original = "image_F"."/".$arrFilename[0].".".strtolower($arrFilename[1]);	
		}
		$qid = $row['id'];
		$new =	"image"."/".$row['image_name'];
		if($position!='IDO' && $row['image_name']!='' && $position != 'GIDO')
		{
			//For backup
			if(file_exists($original))	{	//Checking first because of refresh problem.
				$backup = "image_backup"."/".$row['image_name'];
				copy ($new,$backup);	//copy the original file to the backup folder
				unlink($new);			//delete the image from the original folder
				//End.
				if(!rename($original, $new)) //replace the original image with the final image uploaded by the designer
				//if(!copy($new,$original))
				{
					echo "Copy Fails!!";
					//exit;
				}
			}
		}
		else 
		{
			//Logic for image description only goes here.
			if(file_exists($original))	{	//Checking first because of refresh problem.
				$new="image/".$row['final_image_name'];
				if(!rename($original, $new)) //replace the original image with the final image uploaded by the designer
				{
					echo "Copy Fails!!";
					//exit;
				}
			}
			if($position=='IDO') 
			{

				//Check whether the question is present in the question making table or question
				$queryA = "SELECT count(*) FROM tg_questions WHERE qcode=".$qid;
				$dbqueryA = new dbquery($queryA,$connid);
				$rowA = $dbqueryA->getrowarray();
				
				if($rowA[0] > 0) //implies that the question is in the questions table.
				{
					$queryU = "UPDATE tg_questions";
					$imagestr = "<br/> <img src=http://www.educationalinitiatives.com/tgs/image/".$row['final_image_name'].">";
					$queryU .= " SET question=concat(question,'".mysql_escape_string($imagestr)."') WHERE qcode=".$qid." LIMIT 1" ;
					//echo $queryU;
					
					$dbqueryU = new dbquery($queryU,$connid);
				}
			}
			if($position=='GIDO') 
			{

				//Check whether the question is present in the question making table or question
				$queryA = "SELECT count(*) FROM tg_groupmaster WHERE groupid=".$qid;
				$dbqueryA = new dbquery($queryA,$connid);
				$rowA = $dbqueryA->getrowarray();
				
				if($rowA[0] > 0) //implies that the question is in the questions table.
				{
					$queryU = "UPDATE tg_groupmaster";
					$imagestr = "<br/> <img src=http://www.educationalinitiatives.com/tgs/image/".$row['final_image_name'].">";
					$queryU .= " SET grouptext=concat(grouptext,'".mysql_escape_string($imagestr)."') WHERE groupid=".$qid." LIMIT 1" ;
					//echo $queryU;
					
					$dbqueryU = new dbquery($queryU,$connid);
				}
			}
			/*if($row["where_in_question"] == 'Q' && $row["id"] != "")
			{
							
	
			}*/
		}// Else condition ends here
	}
	function getDesignersAllotmentTable($connid)
	{
		$arrRet = array();
	
		$condition = "AND qmaker = '".$_SESSION["username"]."'";
		if($_SESSION["username"] == 'rama.naicker' || $_SESSION["username"] == 'vishnu' || $_SESSION["username"] == 'jaspreet')
			$condition = "";
		$query = "SELECT count(*) as count,class, current_alloted,parent_subjectno
				  FROM tg_images WHERE 1 = 1 AND current_alloted = 'Designer' ".$condition." AND status != 3
				  GROUP BY class,parent_subjectno";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
				$arrRet[$row["class"]][$row["parent_subjectno"]] = array("parent_subjectno"=>$row["parent_subjectno"],
																		"class"=>$row["class"],
																		"count"=>$row["count"]);
		}
		
		return $arrRet;
	}
	function getImageFormattingDetails($connid,$subjectno,$current_alloted)
	{
		$arrRet = array();
		if($current_alloted == "Designer" || $_SESSION["username"] == 'vishnu' || $_SESSION["username"] == 'jaspreet' || $_SESSION["username"] == 'rama.naicker')
			$condition = "WHERE 1 = 1 ";
		elseif($current_alloted == 'kevin.george')
			$condition = "WHERE parent_subjectno IN ('2','".$subjectno."') ";	
		else
			$condition = "WHERE parent_subjectno = '".$subjectno."'";
			
		$condition_allot = "AND current_alloted = '".$current_alloted."'";
		if($_SESSION["username"] == 'vishnu' || $_SESSION["username"] == 'jaspreet' || $_SESSION["username"] == 'rama.naicker')
			$condition_allot = "";
		
		$query = "SELECT count(*) as count,class,current_alloted,parent_subjectno
				  FROM tg_images ".$condition.$condition_allot."  AND status != 3
				  GROUP BY class,parent_subjectno";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
					$arrRet[$row["class"]][$row["parent_subjectno"]] = array("parent_subjectno"=>$row["parent_subjectno"],
																		"class"=>$row["class"],
																		"count"=>$row["count"]);
		}
		/*echo "<pre>";
		print_r($arrRet);
		echo "</pre>";*/
		return $arrRet;
	}
}
?>
