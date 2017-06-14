<?php
class clsdaimage
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
	var $mode;
	var $searchqcode;
	var $checkstatus;
	var $subtopic_code;
	var $image_list;
	var $sub_subtopic_code;
	var $imageArray;
	var $imagenameArray;
	var $type;
	function clsdaimage()
	{
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
		$this->mode = "";
		$this->searchqcode = "";
		$this->checkstatus = "";
		$this->image_list = "";
		$this->sub_subtopic_code = "";
		$this->imageArray = array();
		$this->imagenameArray = array();
		$this->type = "";
	}

	function setpostvars()
	{
		if(isset($_POST["clsdaimage_hdnaction"])) $this->action = $_POST["clsdaimage_hdnaction"];
		if(isset($_POST["clsdaimage_qmaker"])) $this->qmaker = $_POST["clsdaimage_qmaker"];
		if(isset($_POST["clsdaimage_comments"])) $this->comments = $_POST["clsdaimage_comments"];
		if(isset($_POST["clsdaimage_class"])) $this->class = $_POST["clsdaimage_class"];
		if(isset($_POST["clsdaimage_subjectno"])) $this->subjectno = $_POST["clsdaimage_subjectno"];
		if(isset($_POST["clsdaimage_approve"])) $this->approveImage = $_POST["clsdaimage_approve"];
		if(isset($_POST["clsdaimage_qcode"])) $this->id = $_POST["clsdaimage_qcode"];
		if(isset($_POST["clsdaimage_searchqcode"])) $this->searchqcode = $_POST["clsdaimage_searchqcode"];
		if(isset($_POST["clsdaimage_mode"])) $this->mode = $_POST["clsdaimage_mode"];
		if(isset($_POST["clsdaimage_status"])) $this->status = $_POST["clsdaimage_status"];
		if(isset($_POST["clsdaimage_hdnstatus"])) $this->checkstatus = $_POST["clsdaimage_hdnstatus"];
		if(isset($_POST["clsdaimage_resend"])) $this->imageArray = $_POST["clsdaimage_resend"];
		if(isset($_POST["clsdaimage_resendimagename"])) $this->imagenameArray = $_POST["clsdaimage_resendimagename"];
		//print_r($_POST);
	}
	function setgetvars()
	{
		if(isset($_GET["action"])) $this->action = $_GET["action"];
		if(isset($_GET["image_id"])) $this->image_id = $_GET["image_id"];
		if(isset($_GET["subjectno"])) $this->subjectno = $_GET["subjectno"];
		if(isset($_GET["class"])) $this->class = $_GET["class"];
		if(isset($_GET["subtopic_code"])) $this->subtopic_code = $_GET["subtopic_code"];
		if(isset($_GET["sub_subtopic_code"])) $this->sub_subtopic_code = $_GET["sub_subtopic_code"];
		if(isset($_GET["mode"])) $this->mode = $_GET["mode"];
		if(isset($_GET["image_list"])) $this->image_list = $_GET["image_list"];
		if(isset($_GET["id"])) $this->id = $_GET["id"];
		if(isset($_GET["type"])) $this->type = $_GET["type"];
		if(isset($_GET["status"])) $this->status = $_GET["status"];
		if(isset($_GET["searchqcode"])) $this->searchqcode = $_GET["searchqcode"];
	}
	function getAllImages($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->mode == "GetImages")
		{
			if($this->status != "3" && $this->status != "4" && $_GET["mode"] == "GetImages" && $_POST['clsdaimage_mode']=="")
				$condition = " AND a.status != '3' AND a.status != '4' ";
			else
				$condition = "";
			if($this->status != "")
				$condition.= " AND a.status = '".$this->status."' ";
			if($this->class != "")
				$condition.= " AND a.class = '".$this->class."' ";
			if($this->subjectno != "")
				$condition.= " AND a.subjectno IN (".$this->subjectno.") ";
			if($this->searchqcode != "")
				$condition.=" AND qcode IN (".$this->searchqcode.") ";
			if($this->image_list != "")
				$condition.=" AND image_id IN (".$this->image_list.") ";
			$userType = checkUserType();

			/* Modified By Parth 20/12/2011 */
			if($userType > 0 && $this->status != "1" && $this->status != "3" && $this->status != "4" && $this->status != "")
			{
				$condition.=" AND a.current_alloted = 'Designer' ";
			}
			else if($this->action != "fromSSTstatus" && $_GET["mode"] == "GetImages" && $userType==0)
			{
				$condition.=" AND a.current_alloted = '".$_SESSION["username"]."' ";
			}
			else if($this->action != "fromSSTstatus" && $_GET["mode"] == "GetImages" && $userType>0)
			{
					$condition.=" AND a.current_alloted = 'Designer' ";
			}
			/*if($userType > 0 && $this->status != "1" && $this->status != "3" && $this->status != "4")
			{
				$condition.=" AND a.current_alloted = 'Designer' ";
			}
			else if($this->status != "1" && $this->action != "fromSSTstatus" && $this->status != "3" && $this->status != "4")
			{
				$condition.=" AND a.current_alloted = '".$_SESSION["username"]."' ";
			}*/
			/* Modified Ended By Parth 20/12/2011 */

			if($this->sub_subtopic_code>0)
			    $condition.= " AND sub_subtopic_code=".$this->sub_subtopic_code;
			$query = "SELECT a.*,question_maker,image_description,qcode,'' as  groupDesgn_imageDesc, b.group_id group_id FROM da_images a,da_questions b WHERE a.id = b.qcode AND where_in_question<>'GT' ".$condition;
			$query .= " UNION SELECT DISTINCT a.*,entered_by as question_maker,'',qcode, groupDesgn_imageDesc, b.group_id group_id FROM da_images a, da_groupMaster b, da_questions c WHERE a.id = b.group_id AND b.group_id=c.group_id AND where_in_question='GT' ".$condition;
			
		//	echo "$query ";
			$dbquery = new dbquery($query,$connid);
			return $dbquery;
		}
		return 0;
	}
	function updateData($connid,$final_image_name,$image_id,$qmaker,$reuploaded)
	{
		$query = "UPDATE da_images SET status = '1',final_image_name = '".$final_image_name."',current_alloted = '".$qmaker."', last_uploaded_by='".addslashes($_SESSION["username"])."' ,last_upload_date = NOW() WHERE image_id = '".$image_id."' AND status < 3";
		$dbquery = new dbquery($query,$connid);
		if($reuploaded == 1)
		{
			$query = "UPDATE da_images SET final_image_name ='".$final_image_name."',status = '4', last_uploaded_by='".addslashes($_SESSION["username"])."' ,last_upload_date = NOW() WHERE image_id = '".$image_id."' AND (status = '3' OR status = '4') LIMIT 1";
			$dbquery = new dbquery($query,$connid);

			$this->replaceImagesInQuestion($connid,$this->id,$image_id,$reuploaded);

			$query = "UPDATE da_images SET image_name ='".$final_image_name."',final_image_name = '',  last_uploaded_by='".addslashes($_SESSION["username"])."' ,last_upload_date = NOW() WHERE image_id = '".$image_id."' LIMIT 1 ";
			$dbquery = new dbquery($query,$connid);
		}
	}
	function sendToDesigner($connid)
	{
		foreach($this->comments as $key => $value)
		{
			$this->saveComments($connid,$key,$this->comments[$key]);
			//echo $this->qmaker[$key];
			if(checkUserType() >0 && $this->comments[$key] != ""){
				$query = "UPDATE da_images SET status = '1',current_alloted = '".$this->qmaker[$key]."' WHERE image_id = '".$key."' AND current_alloted = 'Designer' AND (status = '2' OR status = '0') LIMIT 1";
			}else if($this->comments[$key] != ""){
				$query = "UPDATE da_images SET status = '2',current_alloted = 'Designer' WHERE image_id = '".$key."' AND current_alloted = '".$this->qmaker[$key]."' AND status = '1' LIMIT 1";
                    }

			$dbquery = new dbquery($query,$connid);

		}
	}
	function saveComments($connid,$image_id,$cmnt)
	{
		//$query = "INSERT INTO da_comments SET comment = '".$this->comments."',submitdate = NOW(),type = 'I',commenter = '".$_SESSION["username"]."' ";
		if($cmnt != "")
		{
			$comments = "<b>".$_SESSION["username"]."</b>(".date("d-m-Y")."):".$cmnt;
			$query_cd = "SELECT count(*) FROM da_images WHERE comments LIKE '%".$comments."%' ";
			$dbquery_cd = new dbquery($query_cd,$connid);
			$row = $dbquery_cd->getrowarray();
			if($row[0] == 0)
			{
				$query = "UPDATE da_images SET comments = CONCAT_WS('<br>',comments,'".$comments."') WHERE image_id = '".$image_id."' LIMIT 1 ";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	function retrieveDetailsByImageId($connid)
	{
		$this->setgetvars();
		$query = "SELECT * FROM da_images WHERE image_id = '".$this->image_id."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$this->id = $row["id"];
		$this->image_name = $row["image_name"];
		$this->final_image_name = $row["final_image_name"];
		$this->where_in_question = $row["where_in_question"];
		$this->current_alloted = $row["current_alloted"];
		$this->qmaker = $this->getQmaker($connid,$row["id"],$this->where_in_question);
	}
	function getQmaker($connid,$qcode,$whereInQues)
	{
		if($whereInQues == 'GT')
			$query = "SELECT question_maker FROM da_questions WHERE group_id = '".$qcode."' LIMIT 1";
		else
			$query = "SELECT question_maker FROM da_questions WHERE qcode = '".$qcode."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["question_maker"];
	}
	function pageImageFormatting($connid,$final_image_name="",$qmaker="",$reuploaded="")
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->action == "UpdateData" && $final_image_name != "" && $this->image_id >0)
		{
			$file = "image_F/".$final_image_name;
			$arrResize = show_thumbnail($file);
			$this->updateData($connid,$final_image_name,$this->image_id,$qmaker,$reuploaded);
			$status = $this->getStatus($connid,$this->image_id);
			/*echo "<script language='javascript'>window.opener.childClose('".$this->image_id."','".$final_image_name."','".$arrResize["width"]."','".$arrResize["height"]."','".$status."')</script>";*/
		}
		if($this->action == "SaveComments")
		{
			$this->sendToDesigner($connid);
		}
		if($this->action == "ApproveImage")
		{
			$this->saveMultipleComments($connid);
			$this->approveImage($connid);
		}
		if($this->action == "RemoveImage")
		{
			//$this->removeImage($connid);
		}
		if($this->action == "ImageReSend")
		{
			$this->resendImage($connid,$this->id);
		}
	}
	function resendImage($connid,$qcode)
	{
		/*echo "<pre>";
		print_r($this->imagenameArray);
		print_r($this->imageArray);
		echo "</pre>";*/
		if(is_array($this->imageArray) && count($this->imageArray) > 0)
		{
			foreach($this->imageArray as $key => $image_id)
			{
				$query = "UPDATE da_images SET status = '2',current_alloted = 'Designer',final_image_name = '".$this->imagenameArray[$image_id]."'  WHERE image_id = '".$image_id."' AND id = '".$this->id."'  ";
				$dbquery = new dbquery($query,$connid);
				$this->saveComments($connid,$image_id,$this->comments);
			}
		}
	}
	function approveImage($connid)
	{
		if(is_array($this->approveImage) && count($this->approveImage) >0)
		{
			foreach($this->approveImage as $key => $value)
			{
				// add comment
				$approveFlag =1;
				if($this->getStatus($connid,$value,$approveFlag) != "3")
				{
					$this->replaceImagesInQuestion($connid,$this->id[$key],$value);
					$query = "UPDATE da_images SET status = '3',image_name= final_image_name WHERE image_id = '".$value."' AND status != '3' LIMIT 1";
					$dbquery = new dbquery($query,$connid);
					$query2 = "UPDATE da_images SET final_image_name = '',current_alloted = '' WHERE image_id = '".$value."' AND status = '3' LIMIT 1";
					$dbquery2 = new dbquery($query2,$connid);
				}
			}
		}
	}
	function saveMultipleComments($connid)
	{
		if(is_array($this->comments) && count($this->comments) >0)
		{
			foreach($this->comments as $key => $value)
			{
				if($this->comments[$key] != "")
				{
					$this->saveComments($connid,$key,$this->comments[$key]);
					if(checkUserType() >0 && $this->comments[$key] != "")
					{
						$query = "UPDATE da_images SET status = '1',current_alloted = '".$this->qmaker[$key]."' WHERE image_id = '".$key."' AND current_alloted = 'Designer' AND (status = '2' OR status = '0') LIMIT 1";
					}
					else if($this->comments[$key] != "")
					{
						$query = "UPDATE da_images SET status = '2',current_alloted = 'Designer' WHERE image_id = '".$key."' AND current_alloted = '".$this->qmaker[$key]."' AND status = '1' LIMIT 1";
                    }
					$dbquery = new dbquery($query,$connid);
				}
			}
		}
	}
	function getStatus($connid,$image_id, $approveFlag=0)
	{
		$query = "SELECT status, id,where_in_question FROM da_images WHERE image_id = '".$image_id."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();

		if($approveFlag ==1 && $row["where_in_question"] !="GT")
		{
			//add entry in comments table saying image approved for question
			$this->addComment($connid,$row["id"]);
		}
		return $row["status"];
	}
	function replaceImagesInQuestion($connid,$id,$image_id,$reupload=0)
	{
		$query = "SELECT * FROM da_images WHERE image_id = '".$image_id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$position = $row['where_in_question'];
		$original = "image_F"."/".$row['final_image_name'];
		$oldImage = $row['image_name'];
		$newImage = $row['final_image_name'];
        if(!file_exists($original))
		{
			$arrFilename = explode('.',$row['final_image_name']);
			$original = "image_F"."/".$arrFilename[0].".".strtolower($arrFilename[1]);
		}
		$qid = $row['id'];
		$new =	"images"."/".$row['image_name'];
		//echo $new;exit;
		if($position!='IDO' && $row['image_name']!='' && $position != 'GIDO' && $reupload == 0)
		{
			//For backup
			if(file_exists($original))	{	//Checking first because of refresh problem.
				$backup = "image_backup"."/".$row['image_name'];
				copy ($new,$backup);	//copy the original file to the backup folder
				unlink($new);			//delete the image from the original folder
				//End.


				$finalLocation = "images/".$row['final_image_name'];
				if(!rename($original, $finalLocation)) //replace the original image with the final image uploaded by the designerif(copy($original,$finalLocation))
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
			if($reupload == 0){
				if(file_exists($original))	{	//Checking first because of refresh problem.
					$new="images/".$row['final_image_name'];
					if(!rename($original, $new)) //replace the original image with the final image uploaded by the designer
					{
						echo "Copy Fails!!";
						//exit;
					}
				}
			}
			if($position=='IDO')
			{

				//Check whether the question is present in the question making table or question
				$queryA = "SELECT count(*) FROM da_questions WHERE qcode=".$qid;
				$dbqueryA = new dbquery($queryA,$connid);
				$rowA = $dbqueryA->getrowarray();

				if($rowA[0] > 0) //implies that the question is in the questions table.
				{
					$queryU = "UPDATE da_questions";
					/*if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")

						$servername = $_SERVER['SERVER_NAME'];
					else
						$servername = "programserver";*/
					$servername = "www.educationalinitiatives.com";
					
					$imagestr = "<br/> <img src=http://".$servername."/detailed_assessment/images/".$row['final_image_name'].">";
					$queryU .= " SET question=concat(question,'".mysql_escape_string($imagestr)."') WHERE qcode=".$qid." LIMIT 1" ;
					//echo $queryU;

					$dbqueryU = new dbquery($queryU,$connid);
				}
			}
			/*if($row["where_in_question"] == 'Q' && $row["id"] != "")
			{


			}*/
		}// Else condition ends here
		$this->replace_image($connid,$oldImage, $newImage, $qid);
	}
	function replace_image($connid,$oldImage, $newImage, $qcode)
	{
	    /*$oldImage = "Blue_hills.jpg";
		$newImage = "New.png";
		$orig = 'test<br/>dfs<IMG style="WIDTH: 246px; HEIGHT: 71px" src="http://programserver/quesbank/images/Blue_hills.jpg" width=772 height=442><br/>dfsdfsf<br/><img src="images/test.png">';*/

	    $arrReplace = array("question","optiona","optionb","optionc","optiond","group_text","mcexplanation","remedial_instruction");
		foreach($arrReplace as $fieldname)
		{
			if($fieldname == "group_text")
			{
				/*echo $queryGrp= "SELECT group_id FROM da_questions WHERE qcode = '".$qcode."'";
				$dbqueryGrp = new dbquery($queryGrp,$connid);
				$rowGrp = $dbqueryGrp->getrowarray();*/
				$query = "SELECT $fieldname FROM da_groupMaster WHERE group_id = '".$qcode."'";
			}
			else
			{
				$query = "SELECT $fieldname FROM da_questions WHERE qcode = '".$qcode."'";
			}
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$orig = $row[0];
			preg_match_all("/<img[^>]*>/i", $orig, $matches, PREG_SET_ORDER);
			$cnt_mathes = count($matches);
			$img = array();
			for($i=0; $i<$cnt_mathes; $i++)
			{
				$img_tag = $matches[$i][0];
				//echo $img_tag;
				$srcArray = array();
				preg_match_all('/(src)=[\'"]([^"\']*)["\']/i',$img_tag, $srcArray);

				$srcTag = $srcArray[2][0];
				$tmpArray = explode("/",$srcTag);
				$imageName = $tmpArray[count($tmpArray)-1];
				//exit;
				if($oldImage==$imageName)
				{
					/****Added By Parth *****/
					/*if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")
						$servername = $_SERVER['SERVER_NAME'];
					else
						$servername = "programserver";*/
					$servername = "www.educationalinitiatives.com";

					$replaceStr = '<img src="http://'.$servername.'/detailed_assessment/images/'.$newImage.'">';

					//$replaceStr = '<img src="images/'.$newImage.'">';
					$orig = str_replace($img_tag, $replaceStr, $orig);
				}
			}
			if($fieldname == "group_text")
				$queryUpdate = "UPDATE da_groupMaster SET $fieldname = '".str_replace("'","\'",$orig)."' WHERE group_id = '".$qcode."' LIMIT 1";
			else
				$queryUpdate = "UPDATE da_questions SET $fieldname = '".str_replace("'","\'",$orig)."' WHERE qcode = '".$qcode."' LIMIT 1";
			$dbqueryUpdate = new dbquery($queryUpdate,$connid);
		}
		//echo "<pre>$orig</pre>"; //Replace this with update query on da_questions table.
	}
	function getQuestionsByGroup($connid)
	{
		$arrRet = array();
		$query = "SELECT qcode,group_id,question_maker FROM da_questions WHERE status = '3' AND group_id != 0 GROUP BY group_id";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["group_id"]] = array("qcode"=>$row["qcode"],"question_maker"=>$row["question_maker"]);
		}
		return $arrRet;
	}
	function getImageStatus($connid)
	{
		$this->setgetvars();
		$query = "SELECT status FROM da_images WHERE image_id = '".$this->image_id."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getImagesByQcode($connid)
	{
		$this->setgetvars();
		$qcode = $this->id;
		$arrRet = array();
		if($this->type == "GT")
			$query = "SELECT image_id,id,where_in_question,image_name FROM da_images WHERE id = '".$qcode."' AND where_in_question = 'GT' AND status >= 3 ";
		else
			$query = "SELECT image_id,id,where_in_question,image_name FROM da_images WHERE id = '".$qcode."' AND where_in_question != 'GT' AND status >= 3 ";

		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["image_id"]] = array("image_name"=>$row["image_name"],"where_in_question"=>$row["where_in_question"]);
		}
		return $arrRet;
	}
	function addComment($connid,$qid)
	{
		$query_insert = "INSERT into da_comments (qcode,commenter,comment,type,submitdate) 
						 VALUES ('".$qid."','".$_SESSION["username"]."','Image Approved','IMAGE_APPROVED',NOW())";
		$insert_dbquery = new dbquery($query_insert,$connid);
	}
}
?>