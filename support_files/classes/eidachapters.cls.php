<?php
class clsdachapter
{
	var $chapterIdArr;
	var $chapterNameArr;
	var $tb_id;
	var $subjectno;
	var $tbclass;
	var $action;
	var $chapterArr;//2D array to store chapterid, chaptername when fetching from database
	var $delChapter;
	var $chapterNoArr;
	var $year;
	var $schoolCode;
	var $hideChapterId;
	var $hideTextBookId;
	var $msg;
	var $chapterCommentIds;
	var $commentChapterId;  // specific comment chapter id 
	var $commentAction;
	var $specCommentId;  // specific comment id for partial chapter , for particular school chapter
	var $specificComment; // Comment for the specific comment
	var $specificThinChapter; // thin chapter flag for the specific comment
	var $thinChapterArr ;

	function clsdachapter()
	{
		$this->chapterIdArr = array();
		$this->chapterNameArr = array();
		$this->tb_id = "";
		$this->subjectno = "";
		$this->tbclass = "";
		$this->action = "";
		$this->chapterArr = array();
		$this->delChapter = array();
		$this->chapterNoArr = array();
		$this->year = "";
		$this->schoolCode = "";
		$this->hideChapterId = array();
		$this->hideTextBookId = array();
		$this->msg = "";
		$this->chapterCommentIds= array();
		$this->commentChapterId ="";  // chapter id for specific comment for a school chapter , to help partial chapter tests
		$this->commentAction =''; // action of specific comment
		$this->specCommentId ='';
		$this->specificComment ='';
		$this->specificThinChapter ='';
		$this->thinChapterArr= array("None","Thin chapter","Extremely thin chapter","Not to be tested");
	}

	function setpostvars()
	{
		if(isset($_POST["clsdachapter_chaptername"])) $this->chapterNameArr = $_POST["clsdachapter_chaptername"];
		if(isset($_POST["clsdachapter_hdnchapterid"])) $this->chapterIdArr = $_POST["clsdachapter_hdnchapterid"];
		if(isset($_POST["clsdachapter_hdnaction"])) $this->action = $_POST["clsdachapter_hdnaction"];
		if(isset($_POST["clsdachapter_delChapter"])) $this->delChapter = $_POST["clsdachapter_delChapter"];
		if(isset($_POST["clsdachapter_chapterno"])) $this->chapterNoArr = $_POST["clsdachapter_chapterno"];
		
		if(isset($_POST["clsdachapter_chapter_id"])) $this->hideChapterId = $_POST["clsdachapter_chapter_id"];
		if(isset($_POST["clsdachapter_textbooks_id"])) $this->hideTextBookId = $_POST["clsdachapter_textbooks_id"];	
		if(isset($_POST["clsdachapter_chapterCommentId"])) $this->chapterCommentIds = $_POST["clsdachapter_chapterCommentId"];

		if(isset($_POST['commentAction'])) $this->commentAction = $_POST['commentAction'];
		if(isset($_POST['specCommentId'])) $this->specCommentId = $_POST['specCommentId'];
		if(isset($_POST['specificComment'])) $this->specificComment= $_POST['specificComment'];
		if(isset($_POST['specificThinChapter'])) $this->specificThinChapter = $_POST['specificThinChapter'];

	}
	function setgetvars()
	{
		if(isset($_GET["tb_id"])) $this->tb_id = $_GET["tb_id"];
		if(isset($_GET["class"])) $this->tbclass = $_GET["class"];
		if(isset($_GET["subject"])) $this->subjectno = $_GET["subject"];
		if(isset($_GET["year"])) $this->year = $_GET["year"];
		if(isset($_GET["schoolCode"])) $this->schoolCode = $_GET["schoolCode"];

		if(isset($_GET['commentChapterId'])) $this->commentChapterId = $_GET['commentChapterId'];

	}

	function pageAddEditChapters($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		//$this->getsubjectName();
		if($this->action == "SaveData" ){
			 $this->saveData($connid);
		}
		if($this->action=="Delete") {
		    $this->deleteData($connid);
		}
		

		$query = "SELECT chapter_id,chapter_name,chapter_no FROM da_chapterMaster WHERE tb_id = '".$this->tb_id."' ORDER BY chapter_no ";
		$dbquery = new dbquery($query,$connid);
		$j=0;
		while($row = $dbquery->getrowarray())
		{
			$this->chapterArr[$row['chapter_no']][0] = $row['chapter_id'];
			$this->chapterArr[$row['chapter_no']][1] = $row['chapter_name'];
			$this->chapterArr[$row['chapter_no']][2] = $row['chapter_no'];
			$j++;
		}

	}
	function saveData($connid)
    {

		if(is_array($this->chapterNameArr) && count($this->chapterNameArr) >0)
		{
			for($i=0;$i<count($this->chapterNameArr);$i++)
			{
				if($this->chapterNameArr[$i] != "" && $this->chapterNoArr != "")
				{

					if($this->chapterIdArr[$i] != ""){
						$query = "UPDATE da_chapterMaster SET chapter_name = '".$this->chapterNameArr[$i]."',chapter_no = '".$this->chapterNoArr[$i]."' WHERE chapter_id = '".$this->chapterIdArr[$i]."' LIMIT 1";
					}

					else{
						$query = "INSERT INTO da_chapterMaster SET chapter_name = '".$this->chapterNameArr[$i]."',chapter_no = '".$this->chapterNoArr[$i]."',tb_id = '".$this->tb_id."',entered_dt =  CURDATE(),entered_by = '".$_SESSION["username"]."'";
					}
					$dbquery = new dbquery($query,$connid);
				}
			}
			$this->action = "SuccessfullyAdded";
			//echo "<script language='javascript'>window.location=\"daAdmin_tree.php?action=view&class=".$this->class."&subject=".$this->subjectno."\"</script>";
		}
	}

	function deleteData($connid)
	{
	    if(count($this->delChapter) > 0)
		{
			foreach($this->delChapter as $key =>$chapter_id)
			{
                $query = "DELETE FROM da_tbChapterMapping WHERE chapter_id=$chapter_id";

                $dbquery = new dbquery($query,$connid);
			    $query = "DELETE FROM da_chapterMaster WHERE chapter_id=$chapter_id";
				$dbquery = new dbquery($query,$connid);
			}
		}
	}
	
	
	function retrieveChapterDetails($connid)
	{
		$this->setpostvars();
		$query = "SELECT chapter_name FROM da_chaptermaster WHERE tb_id = '".$this->tb_id."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	
	function showHideChapters($connid)
	{
		$this->setpostvars();
		$this->setgetvars();		
		
		/*echo $this->action;
		exit;*/
		if($this->action=="HideChapter")
		{
			$this->hideChapters($connid);
		}
		
		return $this->fetchShowHideChapterData($connid);
	}
	
	function fetchShowHideChapterData($connid)
	{
		$arrRet = array();
		$query = " select * FROM da_bookMapping where year = '$this->year' AND schoolCode = '$this->schoolCode' AND class='$this->tbclass' AND subject = '$this->subjectno'";
		$dbquery = new dbquery($query,$connid);		
		while($row = $dbquery->getrowarray())
		{
			if($row["book_id"]!="")
			{
				$arrBooksArray = explode(",",$row["book_id"]);
				foreach($arrBooksArray as $keyBooksArray => $valueBooksArray)
				{
					$queryFetchChapters = "SELECT * FROM da_chapterMaster WHERE tb_id = '$valueBooksArray'";
					$dbqueryFetchChapters = new dbquery($queryFetchChapters,$connid);		
					while($rowFetchChapters = $dbqueryFetchChapters->getrowarray())
					{
						$arrRet[$valueBooksArray][$rowFetchChapters["chapter_id"]]["chapter_name"] = $rowFetchChapters["chapter_name"];
					}
				}
				
			}
		}
		return $arrRet; 
	}
	
	function textbookname($tb_id,$connid)
	{
		//$textbookname = "";
		$arrRet = array();
		$queryTextBookName = "SELECT tb_name,class,subjectno FROM da_textbooks WHERE tb_id = '$tb_id'";
		$dbqueryTextBookName = new dbquery($queryTextBookName,$connid);		
		while($rowTextBookName = $dbqueryTextBookName->getrowarray())
		{
			//$textbookname = $rowTextBookName["tb_name"];
			$arrRet["tb_name"] = $rowTextBookName["tb_name"];
			$arrRet["class"] = $rowTextBookName["class"];
			$arrRet["subject"] = $rowTextBookName["subjectno"];
		}
		//return $textbookname;
		return $arrRet;
	}
	
	function hideChapters($connid)
	{
		if(isset($this->hideChapterId) && count($this->hideChapterId)>0)
		{
			$queryRemoveFirst = "DELETE FROM da_hideChapters where class='$this->tbclass' AND subject='$this->subjectno' AND schoolCode = '$this->schoolCode' AND year = '$this->year'";
			$dbqueryRemoveFirst = new dbquery($queryRemoveFirst,$connid);		
			foreach($this->hideChapterId as $keyChapterId => $valueChapterId)
			{
				$tb_id_set = $this->hideTextBookId[$valueChapterId];
				$queryInsert = "INSERT into da_hideChapters (schoolCode,year,class,subject,chapter_id,book_id) VALUES ('$this->schoolCode','$this->year','$this->tbclass','$this->subjectno','$valueChapterId','$tb_id_set')";
				$dbqueryInsert = new dbquery($queryInsert,$connid);		
				$this->msg = "Updated Successfully!";
			}
		}
		else 
		{
			$queryRemoveFirst = "DELETE FROM da_hideChapters where class='$this->tbclass' AND subject='$this->subjectno' AND schoolCode = '$this->schoolCode' AND year = '$this->year'";
			$dbqueryRemoveFirst = new dbquery($queryRemoveFirst,$connid);
		}
	}
	
	function getHideChaptersMaster($connid)
	{
		$this->setpostvars();
		$this->setgetvars();		
		
		$arrRet = array();
		$querySelect = "SELECT * FROM da_hideChapters where class='$this->tbclass' AND subject='$this->subjectno' AND schoolCode = '$this->schoolCode' AND year = '$this->year'";
		$dbquerySelect = new dbquery($querySelect,$connid);		
		while($rowSelect = $dbquerySelect->getrowarray())
		{
			$arrRet[] = $rowSelect["chapter_id"];
		}
		return $arrRet;
	}

	// function to set post vars and get comments if exists
	function getCommentDetails($connid) {
		$this->setpostvars();
		$this->setgetvars();
		$arrRet = array();		
		if($this->commentAction == "UpdateComment" || $this->commentAction == "AddComment" || $this->commentAction == "DeleteComment") {
			$this->actionComment($connid);
			echo "<script type='text/javascript'> window.opener.location.reload(); window.close();</script>";
			exit();
		}
		
		$school_query = "SELECT schoolname from schools where schoolno ='".$this->schoolCode."' ";
		$school_dbquery = new dbquery($school_query,$connid);
		$schoolResult = $school_dbquery->getrowarray();
		$schoolName = $schoolResult['schoolname'];

		$chapter_query = "SELECT chapter_name,thin_chapter from da_chapterMaster where chapter_id ='".$this->commentChapterId."' ";
		$chapter_dbquery = new dbquery($chapter_query,$connid);
		$chapterResult = $chapter_dbquery->getrowarray();
		$chapterName = $chapterResult['chapter_name'];
		$thinChapter = $chapterResult['thin_chapter'];

		$query ="SELECT * from da_chapSpecificComments WHERE schoolCode = '".$this->schoolCode."' AND year = '$this->year' AND 
				subjectno ='$this->subjectno' and class = '$this->tbclass' AND chapter_id ='$this->commentChapterId' limit 1";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() > 0 ) {
			while($row=$dbquery->getrowarray()){
				$arrRet= array('commentId'=>$row['id'],'chapter_id'=>$this->commentChapterId,"comments"=>$row['comments'],'thin_chapterType'=>$row['thin_chapter'],"schoolName"=>$schoolName,'chapterName'=>$chapterName);
			}
		} else {
			$arrRet= array('chapter_id'=>$this->commentChapterId,"schoolName"=>$schoolName,'chapterName'=>$chapterName, 'thin_chapterType' => $thinChapter);
		}	

		return $arrRet;
	}
	//function to add , edit or delete a comment 
	function actionComment($connid){

		if($this->commentAction == 'AddComment') {
			$query = "INSERT INTO da_chapSpecificComments(chapter_id,year,schoolCode,subjectno,class,comments,thin_chapter,added_by,added_date)
						VALUES ($this->commentChapterId,$this->year,$this->schoolCode,$this->subjectno,$this->tbclass,'".addslashes($this->specificComment)."',
							$this->specificThinChapter, '".$_SESSION['username']."',NOW()) ";
		} else if($this->commentAction == "UpdateComment"){
			if($this->specCommentId == '')
				return;

			// update the comment ID
			$query = "UPDATE da_chapSpecificComments set comments ='".addslashes($this->specificComment)."' , thin_chapter ='".$this->specificThinChapter."'  
						, updated_by ='".$_SESSION['username']."'
						WHERE id = ".$this->specCommentId." ";
		} else if ($this->commentAction == 'DeleteComment') {
			if($this->specCommentId == '')
				return;

			$query = "DELETE FROM da_chapSpecificComments where id = '".$this->specCommentId."' ";
		}
		$dbquery = new dbquery($query,$connid);
	}
	// function to get chapter specific comments for the school 
	function getChapterComments($connid){

		$arrRet = array();
		$query = "SELECT * from da_chapSpecificComments WHERE schoolCode = '".$this->schoolCode."' AND year = '$this->year' AND subjectno = '$this->subjectno' 
					AND class = $this->tbclass ";
		$dbquery = new dbquery($query,$connid);
		//echo "$query <br/> ";
		
		while($row = $dbquery->getrowarray()) {
			$arrRet[$row['chapter_id']] = array("comments"=>$row['comments'],'thin_chapterType'=>$row['thin_chapter']);
		}

		return $arrRet;
	}
	
}

?>