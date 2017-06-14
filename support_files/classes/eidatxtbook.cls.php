<?php
include_once dirname(__FILE__) . "/../constants.php";

class clstxtbook
{
	var $class;
	var $tbclass;
	var $subjectno;
	var $name;
	var $publisher;
	var $board;
	var $chapter;
	var $topic;
	var $subtopic;
	var $sub_subtopic;
	var $tb_id;
	var $action;
	var $chapter_summary;
	var $map_id;
	var $textbook_name;
	var $export_class;
	var $export_text_book;
	var $export_chapter;
	var $hdnexportchapter;
	var $pdfFile;
	
	#Thin Chpater 
	var $thinchapter_startpageno;
	var $thinchapter_endpageno;
	var $thinchapter_id;
	var $summary_pages;
	var $startUnmappedDate;
	var $endUnmappedDate;
	
	var $year;
	var $thinchapters_checked;
	
	var $similarchapterclass;
	var $similarChapterTextBook;
	var $similarChapters;

	var $activeYear;
	var $showtosales;
	var $bookids;
	var $thinChangePopupMsg;
	function clstxtbook()
	{
		$this->class = "";
		$this->subjectno = "";
		$this->textbook_name = "";
		$this->tb_id = "";
		$this->chapter = "";
		$this->publisher = "";
		$this->board = "";
		$this->tbclass = "";
		$this->topic = "";
		$this->subtopic = "";
		$this->sub_subtopic = "";
		$this->action = "";
		$this->chapter_summary = "";
		$this->map_id = "";
		$this->export_class = array();
		$this->export_text_book = array();
		$this->export_chapter = array();
		$this->hdnexportchapter = "";
		$this->pdfFile = "";
		#Thin Chpater 
		$this->thinchapter_startpageno = "";
		$this->thinchapter_endpageno = "";
		$this->thinchapter_id = array();
		$this->summary_pages = array();
		$this->startUnmappedDate = "";
		$this->endUnmappedDate = "";
		$this->year = "";
		$this->thinchapters_checked = 0;
		
		$this->similarchapterclass = array();
		$this->similarChapterTextBook = array();
		$this->similarChapters = array();
		$this->activeYear ="";
		$this->showtosales = array();
		$this->bookids = array();
		$this->thinChangePopupMsg ="";	
	}
	function setpostvars()
	{
		if(isset($_POST["clstxtbook_class"])) $this->tbclass = $_POST["clstxtbook_class"];
		if(isset($_POST["clstxtbook_board"])) $this->board = $_POST["clstxtbook_board"];
		if(isset($_POST["clstxtbook_publisher"])) $this->publisher = $_POST["clstxtbook_publisher"];
		if(isset($_POST["clstxtbook_subjectno"])) $this->subjectno = $_POST["clstxtbook_subjectno"];
		if(isset($_POST["clstxtbook_description"])) $this->textbook_name = $_POST["clstxtbook_description"];
		if(isset($_POST["clstxtbook_tbid"])) $this->tb_id = $_POST["clstxtbook_tbid"];
		if(isset($_POST["clstxtbook_hdntbid"])) $this->tb_id = $_POST["clstxtbook_hdntbid"];
		if(isset($_POST["clstxtbook_hdnaction"])) $this->action = $_POST["clstxtbook_hdnaction"];
		if(isset($_POST["topic"])) $this->topic = $_POST["topic"];
		if(isset($_POST["subtopic"])) $this->subtopic = $_POST["subtopic"];
		if(isset($_POST["subsubtopic"])) $this->subsubtopic = $_POST["subsubtopic"];
		if(isset($_POST["class"])) $this->class = $_POST["class"];
		if(isset($_POST["clstxtbook_comment"])) $this->comments = $_POST["clstxtbook_comment"];
		if(isset($_POST["chapter_summary"])) $this->chapter_summary = $_POST["chapter_summary"];
		if(isset($_POST["clstxtbook_hdnmapid"])) $this->map_id = $_POST["clstxtbook_hdnmapid"];
		if(isset($_POST["exportclass"])) $this->export_class = $_POST["exportclass"];
		if(isset($_POST["exportTextBook"])) $this->export_text_book = $_POST["exportTextBook"];
		if(isset($_POST["exportChapters"])) $this->export_chapter = $_POST["exportChapters"];
		if(isset($_POST["clstxtbook_hdnexportchapter"])) $this->hdnexportchapter = $_POST["clstxtbook_hdnexportchapter"];
		#Thin Chpater 
		if(isset($_POST["thinchapter"])) $this->thinchapter_id = $_POST["thinchapter"];
		if(isset($_POST["startpageno"])) $this->thinchapter_startpageno = $_POST["startpageno"];
		if(isset($_POST["endpageno"])) $this->thinchapter_endpageno = $_POST["endpageno"];
		if(isset($_POST["summary_pages"])) $this->summary_pages = $_POST["summary_pages"];
		
		if(isset($_POST["clstxtbook_start_unmapped_date"])) $this->startUnmappedDate = $_POST["clstxtbook_start_unmapped_date"];
		if(isset($_POST["clstxtbook_end_unmapped_date"])) $this->endUnmappedDate = $_POST["clstxtbook_end_unmapped_date"];
		
		if(isset($_POST["clstxtbook_year"])) $this->year = $_POST["clstxtbook_year"];
		if(isset($_POST["clstxtbook_thinchapters_checked"])) $this->thinchapters_checked = $_POST["clstxtbook_thinchapters_checked"];
		
		if(isset($_POST["similarchapterclass"])) $this->similarchapterclass = $_POST["similarchapterclass"];
		if(isset($_POST["similarchapterTextBook"])) $this->similarChapterTextBook = $_POST["similarchapterTextBook"];
		if(isset($_POST["similarChapters"])) $this->similarChapters = $_POST["similarChapters"];

		if(isset($_POST["clstxtbook_activeYear"])) $this->activeYear = $_POST["clstxtbook_activeYear"];
		if(isset($_POST["clstxtbook_showtosales"])) $this->showtosales = $_POST["clstxtbook_showtosales"];
		if(isset($_POST["clstxtbook_hdnbookids"])) $this->bookids = $_POST["clstxtbook_hdnbookids"];
		
		
	}
	function setgetvars()
	{
		if(isset($_GET["tb_id"])) $this->tb_id = $_GET["tb_id"];
		if(isset($_GET["class"])) $this->tbclass = $_GET["class"];
		if(isset($_GET["subject"])) $this->subjectno = $_GET["subject"];
		if(isset($_GET["action"])) $this->action = $_GET["action"];
	}
	
	function pageAddEditTextBook($connid)
	{
		$this->setpostvars();
		//$this->setgetvars();
		if($this->action == "SaveData")
		{
			if($this->validation($connid))
			{
				if($this->tb_id == "")
					$this->enterTextBookDetails($connid);
				else if($this->tb_id != "" && $this->tb_id != 0)
					$this->updateData($connid);
			}
		}
	}
	function retrieveTextBookDetails($connid)
	{
		$this->setgetvars();
		if(isset($this->tb_id)){
			$query = "SELECT tb_name,class,subjectno,board,publisher,pdfFile,thinchapters_checked FROM da_textbooks WHERE tb_id = '".$this->tb_id."' ";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$this->textbook_name = $row["tb_name"];
			$this->tbclass = $row["class"];
			$this->subjectno = $row["subjectno"];
			$this->board = $row["board"];
			$this->publisher = $row["publisher"];
			$this->pdfFile   = $row["pdfFile"];
			$this->thinchapters_checked = $row["thinchapters_checked"];
		}
		
	}

	function pageTxtBookChapterMapping($connid)
	{
		$this->setpostvars();
		if($this->action == "SaveData")
		{
			$this->saveData($connid);
		}
		if($this->action == "DeleteData" && $this->map_id > 0)
		{
			$this->deleteMapping($connid);
		}
		if($this->action == "ExportData")
		{
			$this->saveExportData($connid);
		}
	}
	function getTextBooksByClassSubject($connid,$class="",$subject="")
	{
		$this->setgetvars();
		$this->setpostvars();
		
		$condition = "";
		$subjectno = "";
		
		if($this->subjectno != "")
			$subjectno = $this->subjectno;
		else if($subject != "")
			$subjectno = $subject;
		
		if($this->tbclass != ""){
			$condition .= " AND da_textbooks.class = '".$this->tbclass."'";
		}else if($class != ""){
			$condition .= " AND da_textbooks.class = '".$class."'";
		}
		
		if($this->subjectno != ""){
			$condition .= " AND da_textbooks.subjectno = $this->subjectno";
		}else if($subject != ""){
			$condition .= " AND da_textbooks.subjectno = $subject";	
		}
		
		if($this->board != "")
			$condition .= " AND da_textbooks.board = '".$this->board."'";

		//  added year filtering to display only those text books mapped in that year
		if($this->activeYear !="ALL" && $this->activeYear !="")
			$condition .=" AND da_bookMapping.year ='".$this->activeYear."' AND da_bookMapping.schoolCode != 2387554";
		
		if($subjectno != ""){		
		$query ="SELECT  da_textbooks.tb_id,da_textbooks.tb_name,count(chapter_id) as chapters,da_textbooks.board,da_textbooks.publisher,
			     da_textbooks.pdfFile,da_textbooks.class,da_textbooks.thinchapters_checked,da_textbooks.show_tosales
				 FROM da_textbooks LEFT JOIN da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id ";

		// joined with book mapping to display textbooks mapped in that year		 
		if($this->activeYear!="ALL" && $this->activeYear !="")
		$query .= " LEFT JOIN da_bookMapping ON FIND_IN_SET(da_textbooks.tb_id,da_bookMapping.book_id) ";
			
					 
		$query .=" WHERE 1=1 ".$condition."
				 GROUP BY da_textbooks.tb_id ORDER BY da_textbooks.class,da_textbooks.tb_name";

	//	echo "$query <br/>";
				 
		$dbquery = new dbquery($query,$connid);
		
		return $dbquery;
		}else {return 0;}
		
	}
	/*Added By Parth 20/12/2011 */
	function getTextBooksByClassSubjectSchool($connid,$class="",$subject="",$book="")
	{
        global $constant_da;
		$this->setgetvars();
		$this->setpostvars();
		
		$resultArr = array();
		$condition = "";
		$mapping_condition = "";
		
		if($this->year != "")
			$condition .= " AND {$constant_da(COMMON_DATABASE)}.da_orderMaster.year = $this->year";
		
		if($this->tbclass != ""){
			$condition .= " AND da_textbooks.class = '".$this->tbclass."'";
			$mapping_condition .= " AND da_textbooks.class = '".$this->tbclass."'";
			
		}else if($class != ""){
			$condition .= " AND da_textbooks.class = '".$class."'";
			$mapping_condition .= " AND da_textbooks.class = '".$class."'";
		}
		
		if($this->subjectno != ""){
			$condition .= " AND da_textbooks.subjectno = $this->subjectno";
		}else if($subject != ""){
			$condition .= " AND da_textbooks.subjectno = $subject";
		}
		
		$query = "SELECT schools.schoolname, schools.city, da_bookMapping.schoolCode
				  FROM da_textbooks
				  LEFT JOIN da_bookMapping ON FIND_IN_SET( da_textbooks.tb_id, da_bookMapping.book_id )
				  LEFT JOIN {$constant_da(COMMON_DATABASE)}.da_orderMaster ON da_bookMapping.schoolCode = {$constant_da(COMMON_DATABASE)}.da_orderMaster.schoolCode AND da_bookMapping.year = {$constant_da(COMMON_DATABASE)}.da_orderMaster.year
				  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON {$constant_da(COMMON_DATABASE)}.da_orderMaster.schoolCode = schools.schoolno
                  WHERE da_textbooks.tb_id = '".$book."'
                  AND da_bookMapping.schoolCode NOT IN(2387554,2492338)
                  $condition
                  GROUP BY da_textbooks.tb_id, da_bookMapping.schoolCode
                  ORDER BY schools.schoolname";
		$dbquery = new dbquery($query,$connid);
		while($result = $dbquery->getrowarray()){
			$resultArr["SCHOOLS"][] = array("schoolname"=>$result["schoolname"],"city"=>$result["city"],"schoolCode"=>$result["schoolCode"]);
		}
		
		$query2 = "select da_chapterMaster.tb_id,group_concat(da_chapterMaster.chapter_id) as unmapped_chapters 
				   from da_textbooks
				   left join da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id
				   left join da_tbChapterMapping ON da_chapterMaster.chapter_id = da_tbChapterMapping.chapter_id
				   where da_textbooks.tb_id = $book
				   $mapping_condition
				   AND (da_tbChapterMapping.chapter_id is null OR da_chapterMaster.chapter_id IS NULL)
				   group by da_chapterMaster.tb_id";
		$dbquery2 = new dbquery($query2,$connid);
		while($result2 = $dbquery2->getrowarray()){
			if($result2["unmapped_chapters"] == NULL){
				$resultArr["UNMAPPED"] = array("unmapped_chapters"=>0);
			}else {
				$resultArr["UNMAPPED"] = array("unmapped_chapters"=>$result2["unmapped_chapters"]);
			}
		}		
		return $resultArr;
	}
	
	/*Added By Parth 20/12/2011*/
	function getExportTextBooks($connid,$cls,$sjt)
	{
		if($cls >0 && $sjt > 0)
		{
			$query ="SELECT  da_textbooks.tb_id,da_textbooks.tb_name,count(chapter_id) as chapters,da_textbooks.board,da_textbooks.publisher
					FROM da_textbooks LEFT JOIN da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id
					WHERE da_textbooks.class = '".$cls."' AND da_textbooks.subjectno = '".$sjt."'
					GROUP BY da_textbooks.tb_id";
			$dbquery = new dbquery($query,$connid);
			return $dbquery;
		}
		else
			return 0;
	}
	function saveData($connid)
	{
		# updating the textbook is checked for thin chapters or not
		if($this->tb_id != "" && $this->tb_id != 0){
			$up_book_query = "UPDATE da_textbooks SET thinchapters_checked = $this->thinchapters_checked WHERE tb_id = ".$this->tb_id;
			$up_book_dbqry = new dbquery($up_book_query,$connid);
		}
	
		$arrChaptersByTextBook = $this->getChapters($connid,$this->tb_id);
		
		if(is_array($arrChaptersByTextBook) && count($arrChaptersByTextBook) >0)
		{
			foreach($arrChaptersByTextBook as $cid =>$cname)
			{
				if(isset($this->chapter_summary[$cid]) && $this->chapter_summary[$cid] != "")
					$this->updateChapterSummary($connid,$this->chapter_summary[$cid],$cid);
					
				if(is_array($this->subsubtopic[$cid]) && count($this->subsubtopic[$cid]) > 0)
				{
					foreach($this->subsubtopic[$cid] as $key => $value)
					{
						$count = $this->checkMapping($connid,$cid,$value);
						if($value == '-1' || ($value != "" && $count == 0))
						{
							$query = "INSERT INTO da_tbChapterMapping SET chapter_id = '".$cid."',subsubtopic_code = '".$value."',
							          class = '".$this->class[$cid][$key]."',comments = '".$this->comments[$cid][$key]."',
							          entered_by = '".$_SESSION["username"]."',entered_dt =  CURDATE() ";
							$dbquery = new dbquery($query,$connid);
						}
					}
				}
				
				# updating the start page
				if(isset($this->thinchapter_startpageno[$cid]) && $this->thinchapter_startpageno[$cid]!="")
				{
					$query_start = "Update da_chapterMaster set start_pageno = '".$this->thinchapter_startpageno[$cid]."'";
					$query_start .= " Where chapter_id = '".$cid."'";
					$dbquery_start = new dbquery($query_start,$connid);
				}
				else 
				{
					$query_start = "Update da_chapterMaster set start_pageno = '0' Where chapter_id = '".$cid."'";
					$dbquery_start = new dbquery($query_start,$connid);
				}
				
				# updating the end page
				if(isset($this->thinchapter_endpageno[$cid]) && $this->thinchapter_endpageno[$cid]!="")
				{
					$query_end = "Update da_chapterMaster set end_pageno = '".$this->thinchapter_endpageno[$cid]."'";
					$query_end .= " Where chapter_id = '".$cid."'";
					$dbquery_end = new dbquery($query_end,$connid);
				}
				else 
				{
					$query_end = "Update da_chapterMaster set end_pageno = '0' Where chapter_id = '".$cid."'";
					$dbquery_end = new dbquery($query_end,$connid);
				}
				
				# updating the summary pages
				if(isset($this->summary_pages[$cid]) && $this->summary_pages[$cid] != ""){
					
					$query_summary = "UPDATE da_chapterMaster SET summary_pages = '".$this->summary_pages[$cid]."' WHERE chapter_id = '".$cid."'";
					$dbquery_summary = new dbquery($query_summary,$connid);
				}
				else {
					$query_summary = "UPDATE da_chapterMaster SET summary_pages = '0' WHERE chapter_id = '".$cid."'";
					$dbquery_summary = new dbquery($query_summary,$connid);
				}				
				
			}
			
			#updating similar chapter
			if(is_array($this->similarChapters) && count($this->similarChapters) > 0){	
				foreach($this->similarChapters as $sim_chapter_id => $sim_chapter_value){
					$up_query_similar = "UPDATE da_chapterMaster SET  similar_chapter_id = '".$sim_chapter_value."' WHERE chapter_id = '".$sim_chapter_id."'";
					$up_dbqry_similar = new dbquery($up_query_similar,$connid);
				}
			}				
			#updating similar chapter
			# new query for updating the value from combo box
			if(is_array($this->thinchapter_id) && count($this->thinchapter_id) > 0){	
				$counter_thin_check = 0;

				foreach($this->thinchapter_id as $chapter_id => $thin_value){
					/*if($thin_value==1 || $thin_value==2)
					{
						$counter_thin_check = 1;
					}*/
					$up_query = "UPDATE da_chapterMaster SET thin_chapter = '".$thin_value."' WHERE chapter_id = '".$chapter_id."'";
					$up_dbqry = new dbquery($up_query,$connid);

				}

				// check when chapter mapping is tagged , to change a specific schools tagging also
				if($this->subjectno == 2 || $this->subjectno == 3)
					$this->checkSpecificComments($connid);

				/*if($counter_thin_check==1)
				{
					$up_book_query = "UPDATE da_textbooks SET thinchapters_checked = 1 WHERE tb_id = ".$this->tb_id;
					$up_book_dbqry = new dbquery($up_book_query,$connid);
				}*/
			}
		}
	}
	function enterTextBookDetails($connid)
	{
		$query = "INSERT INTO da_textbooks SET tb_name = '".$this->textbook_name."',publisher = '".$this->publisher."',board = '".$this->board."',class = '".$this->tbclass."',subjectno = '".$this->subjectno."',entered_by = '".$_SESSION["username"]."',entered_dt =  CURDATE() ";
		$dbquery = new dbquery($query,$connid);
		echo "<script language='javascript'>window.location=\"daAdmin_viewTextBookDetails.php?class=".$this->tbclass."&subject=".$this->subjectno."\"</script>";
	}
	function updateData($connid)
	{
		$query = "UPDATE da_textbooks SET tb_name = '".$this->textbook_name."',publisher = '".$this->publisher."',board = '".$this->board."',class = '".$this->tbclass."',subjectno = '".$this->subjectno."' WHERE  tb_id = '".$this->tb_id."' LIMIT 1 ";
		$dbquery = new dbquery($query,$connid);
		echo "<script language='javascript'>window.location=\"daAdmin_viewTextBookDetails.php?class=".$this->tbclass."&subject=".$this->subjectno."\"</script>";
	}
	function checkDuplicate($connid,$tb_id)
	{
		$condition = "";
		if($tb_id > 0)
			$condition = " AND tb_id != '".$tb_id."' ";

		$query = "SELECT COUNT(*) FROM da_textbooks WHERE tb_name = '".$this->textbook_name."' 
				  AND subjectno = '".$this->subjectno."' AND class = '".$this->tbclass."'
				  AND publisher = '".$this->publisher."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		//echo $row[0];
		if($row[0] > 0)
			return true;
		else
			return false;
	}
	function validation($connid)
	{
		if($this->textbook_name == "")
			$this->error["description"] = "Please enter the text book name\r\n";
		if($this->subjectno == "")
			$this->error["subjectno"]= "Please enter the subject for the text book\r\n";
		if($this->tbclass == "")
			$this->error["class"]= "Please enter the class\r\n";
		if($this->checkDuplicate($connid,$this->tb_id))
			$this->error["duplicate"] = "This textbook has already been entered in the system";
		if(is_array($this->error) && count($this->error) >0)
	        return false;
	    else
	       	return true;
	}
	function updateChapterSummary($connid,$summary,$chapterid)
	{
		$query = "UPDATE da_chapterMaster SET summary = '".addslashes($summary)."' WHERE chapter_id = '".$chapterid."'  ";
		$dbquery = new dbquery($query,$connid);
	}
	function getChapters($connid,$tb_id)
	{
		$arrRet = array();
		$query = "SELECT * FROM da_chapterMaster WHERE tb_id = '".$tb_id."' ORDER BY chapter_no";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			//$arrRet[$row["chapter_id"]] = array("chapter_name"=>$row["chapter_name"],"summary"=>$row["summary"]);
			$arrRet[$row["chapter_id"]] = array("chapter_name"=>$row["chapter_name"],
												"summary"=>$row["summary"],
												"thin_chapter"=>$row["thin_chapter"],
												"start_pageno"=>$row["start_pageno"],
												"end_pageno"=>$row["end_pageno"],
												"summary_pages"=>$row["summary_pages"],
												"similar_chapter_id"=>$row["similar_chapter_id"]
												);
		}
		return $arrRet;
	}
	function checkMapping($connid,$cid,$sst)
	{
		$query = "SELECT count(*) FROM da_tbChapterMapping WHERE chapter_id = '".$cid."' AND subsubtopic_code = '".$sst."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function subSubtopicsByChapterId($connid,$cid)
	{
		$query = "SELECT map_id,b.description as subsubtopic,c.description as subtopic,d.description as topic,a.class,a.comments FROM da_tbChapterMapping a,da_subSubTopicMaster b,da_subtopicMaster c,da_topicMaster d WHERE a.subsubtopic_code = b.sub_subtopic_code AND b.subtopic_code = c.subtopic_code AND c.topic_code = d.topic_code AND a.chapter_id = '".$cid."' ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function deleteMapping($connid)
	{
		/*************Added and commented by Parth 01/02/2012 *********************/
		//$query = "DELETE FROM da_tbChapterMapping WHERE map_id = '".$this->map_id."'";
		$query = "DELETE FROM da_tbChapterMapping WHERE map_id IN (".$this->map_id.")";
		$dbquery = new dbquery($query,$connid);
	}
	function sstByChapterId($connid,$cid)
	{
		$query = "SELECT map_id,b.description as subsubtopic,c.description as subtopic,d.description as topic,a.class,a.comments FROM da_tbChapterMapping a
		LEFT JOIN da_subSubTopicMaster b ON a.subsubtopic_code = b.sub_subtopic_code
		LEFT JOIN da_subtopicMaster c ON b.subtopic_code = c.subtopic_code
		LEFT JOIN da_topicMaster d ON c.topic_code = d.topic_code
		WHERE a.chapter_id = '".$cid."' ORDER BY a.map_id";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getUnMappedSSTdetails($connid,$tb_id)
	{
		$arrRet = array();
		$query = "SELECT a.class,b.chapter_name,b.chapter_no,c.tb_name,comments FROM da_tbChapterMapping a,da_chapterMaster b,da_textbooks c WHERE a.chapter_id = b.chapter_id AND b.tb_id = c.tb_id AND subsubtopic_code = '-1' AND b.tb_id = '".$tb_id."' ORDER BY b.chapter_no";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function getMappingTrail($connid)
	{
		$arrRet = array();
		$this->setgetvars();
		$this->setpostvars();
		$query = "SELECT DISTINCT a.entered_by FROM da_tbChapterMapping a,da_chapterMaster b WHERE a.chapter_id = b.chapter_id AND tb_id = '".$this->tb_id."' ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = $row["entered_by"];
		}
		$str = implode(",",$arrRet);
		return $str;
	}
	function saveExportData($connid)
	{
		$this->setpostvars();
		$chapter_id = $this->hdnexportchapter;
		$query = "SELECT * FROM da_tbChapterMapping WHERE chapter_id = '".$this->export_chapter[$chapter_id]."' ";
		$dbquery = new dbquery($query,$connid);

		$querySummary = "SELECT * FROM da_chapterMaster WHERE chapter_id = '".$this->export_chapter[$chapter_id]."' ";
		$dbquerySummary = new dbquery($querySummary,$connid);
		$rowSummary = $dbquerySummary->getrowarray();
		
		if($rowSummary["summary"] != "")
		{
			$queryUpdate = "UPDATE da_chapterMaster SET summary = CONCAT_WS('\r\n',summary,'".addslashes($rowSummary["summary"])."') WHERE chapter_id = '".$chapter_id."' ";
			$dbqueryUpdate = new dbquery($queryUpdate,$connid);
		}

		while($row = $dbquery->getrowarray())
		{
			$querySelect = "SELECT count(*) FROM da_tbChapterMapping WHERE subsubtopic_code = '".$row["subsubtopic_code"]."' AND chapter_id = '".$chapter_id."'";
			$dbquerySelect = new dbquery($querySelect,$connid);
			$rowSelect = $dbquerySelect->getrowarray();
			if($rowSelect[0] == 0)
			{
				$queryInsert = "INSERT INTO da_tbChapterMapping SET
						chapter_id = '".$chapter_id."',
						subsubtopic_code = '".$row["subsubtopic_code"]."',
						class = '".$row["class"]."',
						comments = '".addslashes($row["comments"])."',
						entered_dt = CURDATE(),
						entered_by = '".$_SESSION["username"]."'
						";
				$dbqueryInsert = new dbquery($queryInsert,$connid);
				//$rowInsert = $dbqueryInsert->getrowarray();
			}
		}
	}
	/********************************Added Start By Parth 28/12/2011********************/
	function checkSimilarBookNames($connid,$tb_id)
	{
		$searchStr = "";
		$wordArr = split(" ",$this->textbook_name);
		foreach($wordArr as $key => $word){
			$searchStr .= " tb_name like '%".$word."%' OR";
		}
		
		$text_book = "";
		#$query = "SELECT tb_id,tb_name FROM da_textbooks WHERE ".rtrim($searchStr," OR")." AND subjectno = '".$this->subjectno."' AND class = '".$this->tbclass."'";
		$query = "SELECT tb_id,tb_name FROM da_textbooks WHERE tb_name LIKE '%".$this->textbook_name."%' AND subjectno = '".$this->subjectno."' AND class = '".$this->tbclass."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			if(($row["tb_name"] != "") && ($row['tb_id']!=$this->tb_id)){
				$text_book .= $row['tb_id'].". ".$row["tb_name"]."\n";
			}
		}
		echo $text_book;
	}
	/********************************Added End By Parth 28/12/2011**********************/
	
	/******************************Added Start By Parth 07/01/2012***********************/
	function getSelectBoardsArr($connid)
	{
		$boardArr = array();
		$query = "SELECT DISTINCT(board) FROM da_textbooks ORDER BY board";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			if($row[0]!="")
				$boardArr[] = $row[0];
		}
		return $boardArr;
	}
	/******************************Added End By Parth 07/01/2012*************************/
	
	/******************************Added Start By Parth 13/01/2012***********************/
	function getAllTextBooks($connid)
	{
		$textbooknameArr = array();
		$query = "SELECT DISTINCT(tb_name) FROM da_textbooks ORDER BY tb_name";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			if($row[0]!="")
				$textbooknameArr[] = $row[0];
		}
		return $textbooknameArr;
	}
	
	function getTextBooksUnmapped($connid)
	{
        global $constant_da;
		$countSrNo = 0;
		$arrRet = array();
		$this->setgetvars();
		$this->setpostvars();
		$condition = "";
		if($this->subjectno!='')
		{
			$condition .= " AND da_textbooks.subjectno = '$this->subjectno'";
		}
		
		$NotMappedBooks = array();
		$query = "SELECT schools.schoolno,schools.schoolname,da_textbooks.tb_id,da_textbooks.tb_name,da_textbooks.publisher,
				  		 da_textbooks.board,da_textbooks.class,da_textbooks.subjectno,da_textbooks.entered_by,da_textbooks.entered_dt,DATE_FORMAT(da_textbooks.lastModified,'%Y-%m-%d') AS lastModified,
				  		 IF(da_tbChapterMapping.chapter_id IS NULL,da_chapterMaster.chapter_id,'') AS unmapped_chapters
				  FROM da_textbooks
				  LEFT JOIN da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id
				  LEFT JOIN da_tbChapterMapping ON da_chapterMaster.chapter_id = da_tbChapterMapping.chapter_id
				  LEFT JOIN da_bookMapping ON da_textbooks.tb_id = da_bookMapping.book_id
				  LEFT JOIN {$constant_da(COMMON_DATABASE)}.schools ON da_bookMapping.schoolCode = schools.schoolno
				  WHERE (
				   da_textbooks.entered_dt >= '".daformatDate($this->startUnmappedDate)."' AND da_textbooks.entered_dt <= '".daformatDate($this->endUnmappedDate)."' 
				  ) $condition 
				  GROUP BY da_textbooks.tb_id ORDER BY da_textbooks.tb_id desc";
		
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			
			if(is_null($result["unmapped_chapters"]) || $result["unmapped_chapters"] != ""){
				if(!in_array($result["tb_id"],$NotMappedBooks))
					$NotMappedBooks[] = $result["tb_id"];	
			}
			
			$BooksArr[$result["subjectno"]][$result["tb_id"]] = array("schoolCode"=>$result["schoolno"],
																	 "schoolname"=>$result["schoolname"],
																	 "class"=>$result["class"],
																	"tb_id"=>$result["tb_id"],
																	"tb_name"=>$result["tb_name"],
																	"publisher"=>$result["publisher"],
																	"board"=>$result["board"],
																	"entered_by"=>$result["entered_by"],
																	"entered_dt"=>$result["entered_dt"],
																	"lastModified"=>$result["lastModified"]
																	);
		}
			
		if(is_array($BooksArr[2]) && count($BooksArr[2]) > 0) {

			foreach($BooksArr[2] as $book_id => $bookDetails){
				
				$bgcolor = "";
				
				if(in_array($book_id,$NotMappedBooks)) 
					$bgcolor = "bgcolor='#F76541'";
				
				$countSrNo = $countSrNo+1;		
				$content = "<tr $bgcolor>
								<td>".$countSrNo."</td>
								<td>".$bookDetails["class"]."</td>
								<td>".$bookDetails["tb_id"]."</td>
								<td>".$bookDetails["tb_name"]."</td>
								<td>".$bookDetails["publisher"]."</td>
								<td>".$bookDetails["board"]."</td>
								<td>".$bookDetails["schoolCode"]."</td>
								<td>".$bookDetails["schoolname"]."</td>
								<td>".$bookDetails["entered_by"]."</td>
								<td>".$bookDetails["entered_dt"]."</td>
								<td>".$bookDetails["lastModified"]."</td>
								<td>";
								if(in_array($book_id,$NotMappedBooks)){
									$content .= "<a href='daAdmin_tbChapterMapping.php?tb_id=$book_id&class=$bookDetails[class]&subject=2&action=GetData' target='_blank'>Map Textbook</a>";
								}
							
								$content .= "</td></tr>";	
			
				$MathsContent .= $content;
			}
		
		}

		if(is_array($BooksArr[3]) && count($BooksArr[3]) > 0) {
		
			foreach($BooksArr[3] as $book_id => $bookDetails){
				
				$bgcolor = "";
				
				if(in_array($book_id,$NotMappedBooks)) 
					$bgcolor = "bgcolor='#F76541'";
				
				$countSrNo = $countSrNo+1;
				$content = "<tr $bgcolor>
								<td>".$countSrNo."</td>
								<td>".$bookDetails["class"]."</td>
								<td>".$bookDetails["tb_id"]."</td>
								<td>".$bookDetails["tb_name"]."</td>
								<td>".$bookDetails["publisher"]."</td>
								<td>".$bookDetails["board"]."</td>
								<td>".$bookDetails["schoolCode"]."</td>
								<td>".$bookDetails["schoolname"]."</td>
								<td>".$bookDetails["entered_by"]."</td>
								<td>".$bookDetails["entered_dt"]."</td>
								<td>".$bookDetails["lastModified"]."</td>
								<td>";
								if(in_array($book_id,$NotMappedBooks)){
									$content .= "<a href='daAdmin_tbChapterMapping.php?tb_id=$book_id&class=$bookDetails[class]&subject=3&action=GetData'  target='_blank'>Map Textbook</a>";
								}
							
								$content .= "</td></tr>
							</tr>";	
			
				$SciContent .= $content;
			}
		
		}
		if($MathsContent!="")
		{
			$arrRet[] = $MathsContent;
		}
		if($SciContent!="")
		{
			$arrRet[] = $SciContent;
		}		
		
		return $arrRet;										
	}
	
	function getAllBoards($connid)
	{
		$boardArr = array();
		$query = "SELECT DISTINCT(board) FROM da_textbooks ORDER BY board";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			if($row[0]!="")
				$boardArr[] = $row[0];
		}
		return $boardArr;
	}
	
	function getAllPublisher($connid)
	{
		$publisherArr = array();
		$query = "SELECT DISTINCT(publisher) FROM da_textbooks ORDER BY board";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			if($row[0]!="")
				$publisherArr[] = $row[0];
		}
		return $publisherArr;
	}
	
	
	
	/*****************************Added End By Parth 27/04/2012 **********************/
	
	###########################For Textbooks all selection option #####################
	function getAllTextBooksForListOut($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$arrRet = array();
		$condition = "";		
		
		if($this->tbclass != ""){
			$condition .= " AND class = '".$this->tbclass."'";
		}
		
		if($this->subjectno != ""){
			$condition .= " AND subjectno = $this->subjectno";
		}
		
		if($this->board != "")
			$condition .= " AND board = '".$this->board."'";
		
		#$query = "SELECT * FROM da_textbooks WHERE 1=1 $condition ORDER BY class,tb_name";
		$query = "SELECT  da_textbooks.*,count(chapter_id) as chapters
				  FROM da_textbooks 
				  LEFT JOIN da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id
				  WHERE 1=1 $condition
				  GROUP BY da_textbooks.tb_id
				  ORDER BY da_textbooks.class,da_textbooks.tb_name";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$arrRet[$row["tb_id"]]["tb_id"] = $row["tb_id"];
			$arrRet[$row["tb_id"]]["tb_name"] = $row["tb_name"];
			$arrRet[$row["tb_id"]]["class"] = $row["class"];
			$arrRet[$row["tb_id"]]["board"] = $row["board"];
			$arrRet[$row["tb_id"]]["publisher"] = $row["publisher"];
			$arrRet[$row["tb_id"]]["chapters"] = $row["chapters"];
			$arrRet[$row["tb_id"]]["thinchapters_checked"] = $row["thinchapters_checked"];
			$year_arr_list = $this->getTextBookYearUsed($row["tb_id"],$connid); 
			if($year_arr_list!="")
			{
				$arrRet[$row["tb_id"]]["used_in"] = $year_arr_list;
			}
			else 
			{
				$arrRet[$row["tb_id"]]["used_in"] = "Not Used";
			}
			
		}
		return $arrRet;
	}
	
	function getTextBookYearUsed($tb_id,$connid)
	{
		$arrRet = array();
		$year_list = "";
		$querySet = "SELECT year FROM da_bookMapping where FIND_IN_SET($tb_id,book_id)";
		$dbquerySet = new dbquery($querySet,$connid);
		while($rowSet = $dbquerySet->getrowarray()){
			$arrRet[$rowSet["year"]] = $rowSet["year"];
		}
		$year_list = implode(",",$arrRet);
		return $year_list;
	}
	###########################For Textbooks all selection option #####################
	
	###########################For Similar Chapter mapping#############################
	function getSimilarChapterTextBooks($connid,$cls,$sjt)
	{
		if($cls >0 && $sjt > 0)
		{
			$query ="SELECT  da_textbooks.tb_id,da_textbooks.tb_name,count(chapter_id) as chapters,da_textbooks.board,da_textbooks.publisher
					FROM da_textbooks LEFT JOIN da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id
					WHERE da_textbooks.class = '".$cls."' AND da_textbooks.subjectno = '".$sjt."'
					GROUP BY da_textbooks.tb_id";
			$dbquery = new dbquery($query,$connid);
			return $dbquery;
		}
		else
			return 0;		
	}
	function getSimilarChapters($connid,$tb_id)
	{
		$arrRet = array();
		$query = "SELECT * FROM da_chapterMaster WHERE tb_id = '".$tb_id."' ORDER BY chapter_no";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			//$arrRet[$row["chapter_id"]] = array("chapter_name"=>$row["chapter_name"],"summary"=>$row["summary"]);
			$arrRet[$row["chapter_id"]] = array("chapter_name"=>$row["chapter_name"],
												"summary"=>$row["summary"],
												"thin_chapter"=>$row["thin_chapter"],
												"start_pageno"=>$row["start_pageno"],
												"end_pageno"=>$row["end_pageno"],
												"summary_pages"=>$row["summary_pages"]);
		}
		return $arrRet;
	}
	
	function getDataAboutSimilarChapter($sim_set_chapter_id,$connid)
	{
		$arrRet = array();
		$query ="SELECT  da_textbooks.class,da_textbooks.tb_id
					FROM da_textbooks INNER JOIN da_chapterMaster ON da_textbooks.tb_id = da_chapterMaster.tb_id
					WHERE da_chapterMaster.chapter_id = '".$sim_set_chapter_id."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$sim_set_chapter_id] = array("class"=>$row["class"],
												 "tb_id"=>$row["tb_id"]
												);
		}
		return $arrRet;
	}
	
	###########################For Similar Chapter mapping#############################
	
	function ShowToSales($connid){
		
		if(is_array($this->bookids) && is_array($this->showtosales)){
			
			$nottodisp = array();
			$nottodisp = array_diff($this->bookids,$this->showtosales);	
			
			if(is_array($this->showtosales) && count($this->showtosales) > 0){
				$showtosales_str = implode(",",$this->showtosales);
				$query = "UPDATE da_textbooks SET show_tosales =  1 WHERE tb_id IN($showtosales_str)";
				$dbqry = new dbquery($query,$connid);
			}
			
			if(is_array($nottodisp) && count($nottodisp) > 0){
				$nottodisp_str = implode(",",$nottodisp);
				$query = "UPDATE da_textbooks SET show_tosales =  0 WHERE tb_id IN($nottodisp_str)";
				$dbqry = new dbquery($query,$connid);
			}
		}
		
	}
	
	function pageViewTextBooks($connid){
		
		$this->setpostvars();
		$this->setgetvars();
		
		if($this->action == "ShowToSales"){
			$this->ShowToSales($connid);
		}
		
	}
	
	function getTextBookListForSales($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		$arrRet = array();
		$condition = "";		
		
		if($this->tbclass != "" && $this->tbclass != "ALL"){
			$condition .= " AND class = '".$this->tbclass."'";
		}
		
		if($this->subjectno != ""){
			$condition .= " AND subjectno = $this->subjectno";
		}
		
		#$query = "SELECT * FROM da_textbooks WHERE 1=1 $condition ORDER BY class,tb_name";
		$query = "SELECT da_textbooks.tb_id,da_textbooks.tb_name,da_textbooks.class,da_textbooks.publisher,da_textbooks.indexpage_name
				  FROM da_textbooks 
				  WHERE da_textbooks.show_tosales = 1
				  AND da_textbooks.subjectno != 1 $condition
				  ORDER BY da_textbooks.class,da_textbooks.tb_name";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$arrRet[$row["tb_id"]]["tb_id"] = $row["tb_id"];
			$arrRet[$row["tb_id"]]["tb_name"] = $row["tb_name"];
			$arrRet[$row["tb_id"]]["class"] = $row["class"];
			$arrRet[$row["tb_id"]]["publisher"] = $row["publisher"];
			$arrRet[$row["tb_id"]]["indexpage_name"] = $row["indexpage_name"];
		}
		return $arrRet;
	}
	// function check for a particular comment and chapter tagging related to this chapter and send mail
	function checkSpecificComments($connid){
        global $constant_da;
		$matchArr = array();
		$listArr = array();
		$cond ='';
		$schoolCodeArr = array();
		$thinArr = array("None","Thin chapter","Extremely thin chapter","Not to be tested");
		$subArr = array(1=>'English',2=>'Maths',3=>'Science',4=>'SS',5=>'General Assessment');

		if($this->activeYear == "ALL") {
			if(date('m')<6)
				$year_set = (date('Y')-1);
			else 
				$year_set = date('Y');

			$cond = " AND year = $year_set ";

		} else if($this->activeYear != '' ) {			
			$cond = "AND year = $this->activeYear ";
		}

		$chapterList = array_keys($this->thinchapter_id);
		$chapStr = implode(",",$chapterList);
		$query ="SELECT schoolCode,chapter_id, thin_chapter FROM da_chapSpecificComments 
				 WHERE chapter_id in ($chapStr) $cond ";
		//echo "$query <br/> ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			$matchArr[$row['chapter_id']][] = array('schoolCode'=>$row['schoolCode'],'thin_chapter'=>$row['thin_chapter']);
		}
		// send mail with chapter name and chapter type for a school
		
		if(count($matchArr) > 0 ) {

			foreach($matchArr as $chapVal =>$detailArr) {
				foreach($detailArr as $key => $valArr ) {

					if($valArr['thin_chapter'] != $this->thinchapter_id[$chapVal]) {
						$listArr[$chapVal][] =  array('schoolCode'=>$valArr['schoolCode'],'thin_chapter'=>$valArr['thin_chapter']);
						
						$schoolCodeArr[]=$valArr['schoolCode'];
					}
				}	
			}
		}

		$message ="<b style='color:red'> Below is the list of discrepancies in the Thin Chapter tagging </b><br/><br/>";
		if(count($listArr) > 0) {
			$chapIDArr = array_keys($listArr);
			$chapIDstr =implode(",",$chapIDArr);
			$chapNameValArr= array();
			$schoolNameArr =array();
			$schoolCodeArr =array_unique($schoolCodeArr);
			
			$chpName_query = "SELECT chapter_id, chapter_name from da_chapterMaster WHERE chapter_id in(".$chapIDstr.") ";
			//echo "$chpName_query <br/> ";
			$chap_dbquery = new dbquery($chpName_query,$connid);
			while($chap_row = $chap_dbquery->getrowarray()){
				$chapNameValArr[$chap_row['chapter_id']] = $chap_row['chapter_name'];
			}

			$schoolCodeStr = implode(",",$schoolCodeArr);
			$schoolName_query = "SELECT schoolno,schoolname FROM {$constant_da(COMMON_DATABASE)}.schools where schoolno in (".$schoolCodeStr.") ";
			$school_dbquery = new dbquery($schoolName_query,$connid);
			while($school_row = $school_dbquery->getrowarray()){
				$schoolNameArr[$school_row['schoolno']] = $school_row['schoolname'];
			}

			$message .="<div align='center'><table border='1' style='border-collapse:collapse;border-color:#000000;' align='left' width='50%'>";

			foreach($listArr as $chapterList => $chapDetailArr){
				$message.="<tr style='background-color:#98AFC7;font-weight:bold;'><td colspan=3> Chapter: ".$chapNameValArr[$chapterList]."<br/>
									Class: ".$this->tbclass."<br/> Subject:".$subArr[$this->subjectno]." </td></tr>";
				$message.="<tr style='background-color:#98AFC7;font-weight:bold;'><td >School Name</td><td>Text Book Thin Chapter tagging</td><td> School Thin Chapter tagging</td></tr>";
				foreach($chapDetailArr as $keyd => $schoolInfo) {
					$message .="<tr><td>".$schoolNameArr[$schoolInfo['schoolCode']]."</td><td>".$thinArr[$this->thinchapter_id[$chapterList]]."</td><td>".$thinArr[$schoolInfo['thin_chapter']]."</td></tr>";
				}
				$message.="<tr ><td colspan=3>&nbsp;</td></tr>";
			}
			$message .="</table></div><div style='clear:both'></div><br/><br/>";
			//echo "$message <br/> ";
			$this->thinChangePopupMsg = $message;

			// send mail
			$subjectValue ="";
			
			$headers = "";
			$emailsubject = "DA - Thin Chapter Tagging change Alert !";
			
			// Is the OS Windows or Mac or Linux
			if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
			  $eol="\r\n";
			} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
			  $eol="\r";
			} else {
			  $eol="\n";
			}

			$message=wordwrap($message,70,$eol);
			$headers = 'From: Detailed Assessment <da@ei-india.com>'.$eol;
			$headers .= "Reply-To: <da@ei-india.com>".$eol;
			$headers .= "MIME-Version: 1.0 $eol";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			
			$toemails = "dipti.lal@ei-india.com,sindhu.deshmukh@ei-india.com";
			
			$email_query ="SELECT email from {$constant_da(COMMON_DATABASE)}.marketing where name ='".$_SESSION['username']."' ";
			$email_dbquery = new dbquery($email_query,$connid);
			
			if($email_dbquery->numrows() > 0) {
				$email_row = $email_dbquery->getrowarray();
				$toemails .=",".$email_row['email']." ";
			}

			//echo "TO $toemails <br/> $emailsubject <br/> $message <br/>";
			# SEND THE EMAIL
			if($toemails != "")
				$sent = mail($toemails, $emailsubject, $message, $headers);
		} 
	}
}
?>