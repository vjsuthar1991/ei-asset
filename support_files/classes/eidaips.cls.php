<?php
class clsdaips
{
	var $ips_id;
	var $subjectno;
	var $topic_code;
	var $class;
	var $userid;
	var $qcode;
	var $answer;
	var $action;
	var $fromDate;
	var $toDate;
	var $qlist;
	var $setcolor;
	var $level;
	var $error;
	var $current_alloted;
	var $owner;
	var $notipsed;
	var $answered;
	var $commented;
	var $resolved;
	
	function clsdaips()
	{
		$this->ips_id = "";
		$this->subjectno = "";
		$this->topic_code = "";
		$this->class = "";
		$this->userid = "";
		$this->qcode = "";
		$this->answer = "";
		$this->action = "";
		$this->fromDate = "";
		$this->toDate = "";
		$this->qlist = "";
		$this->setcolor = array();
		$this->level = "";
		$this->error = "";
		$this->current_alloted = "";
		$this->owner = "";
		$this->notipsed = "";
		$this->answered = "";
		$this->commented = "";
		$this->resolved = "";
	}
	function setgetvars()
	{
		if(isset($_GET["topic"])) $this->topic_code = $_GET["topic"];
		if(isset($_GET["class"])) $this->class = $_GET["class"];
		if(isset($_GET["subjectno"])) $this->subjectno = $_GET["subjectno"];
		if(isset($_GET["qlist"])) $this->qlist= $_GET["qlist"];
		if(isset($_GET["ips_id"])) $this->ips_id = $_GET["ips_id"];
		if(isset($_GET["current_alloted"])) $this->current_alloted = $_GET["current_alloted"];
		if(isset($_GET["userid"])) $this->userid = $_GET["userid"];
		if(isset($_GET["level"])) $this->level = $_GET["level"];
		if(isset($_GET["notipsed"])) $this->notipsed = $_GET["notipsed"];
		if(isset($_GET["answered"])) $this->answered = $_GET["answered"];
		if(isset($_GET["commented"])) $this->commented = $_GET["commented"];
		if(isset($_GET["resolved"])) $this->resolved = $_GET["resolved"];
	}
	function setpostvars()
	{
		if(isset($_POST["clsdaips_subjectno"])) $this->subjectno = $_POST["clsdaips_subjectno"];
		if(isset($_POST["clsdaips_topic"])) $this->topic_code = $_POST["clsdaips_topic"];
		if(isset($_POST["clsdaips_class"])) $this->class = $_POST["clsdaips_class"];
		if(isset($_POST["clsdaips_userid"])) $this->userid = $_POST["clsdaips_userid"];
		if(isset($_POST["clsdaips_hdnaction"])) $this->action = $_POST["clsdaips_hdnaction"];
		if(isset($_POST["clsdaips_level"])) $this->level = $_POST["clsdaips_level"];
		if(isset($_POST["clsdaips_userid"])) $this->userid = $_POST["clsdaips_userid"];
		if(isset($_POST["clsdaips_owner"])) $this->owner = $_POST["clsdaips_owner"];
		if(isset($_POST["clsdaips_fromDate"])) $this->fromDate = $_POST["clsdaips_fromDate"];
		if(isset($_POST["clsdaips_toDate"])) $this->toDate = $_POST["clsdaips_toDate"];
		//print_r($_POST);
	}
	function pageAllotForIps($connid)
	{
		$this->setpostvars();
		if($this->action == "allotIPS")
		{
			$this->saveData($connid);
		}
	}
	function saveData($connid)
	{
		$topicCode = 0;
		//$topicCode = $this->sameAllotmentCheck();
		
		if($topicCode == 0)
		{
			foreach($this->userid as $level => $users)
			{
				if(is_array($users) && count($users) >0)
				{
					foreach($users as $key => $value)
					{
						
						if($this->owner[$key] != "")
							$this->saveOwnerDetails($connid,$level,$key);
							
						if($value != "")
						{
							
							$count = $this->checkDuplicate($connid,$this->topic_code[$key],$value,$level);
							$countUpdate = $this->updateCheck($connid,$this->topic_code[$key],$level);
							$checkIPSstatus =$this->checkIPSstatus($connid,$this->topic_code[$key],$level);
							
							if($countUpdate >= 1)
							{
								if($checkIPSstatus != "")
								{
									$query_ca = "SELECT userid,ips_id FROM da_ipsMaster WHERE topic_code = '".$this->topic_code[$key]."' AND class = '".$this->class."' AND level = '".$level."' AND userid != '".$value."'";
									$dbquery_ca = new dbquery($query_ca,$connid);
									if($dbquery_ca->numrows() > 0)
									{
										$row_ca = $dbquery_ca->getrowarray();
										$queryUpdate = "UPDATE da_ipsDetails SET current_alloted = '".$value."' WHERE ips_id = '".$row_ca["ips_id"]."' AND current_alloted = '".$row_ca["userid"]."' ";
										$dbqueryUpdate = new dbquery($queryUpdate,$connid);
									}
								}
								$query = "UPDATE da_ipsMaster SET userid = '".$value."'  WHERE topic_code = '".$this->topic_code[$key]."' AND class = '".$this->class."' AND level = '".$level."' ";
								$dbquery = new dbquery($query,$connid);
							}
							else if($countUpdate == 0)
							{
								$query = "INSERT INTO da_ipsMaster SET userid = '".$value."',topic_code = '".$this->topic_code[$key]."',class = '".$this->class."',alloted_by = '".$_SESSION["username"]."',alloted_date = CURDATE(),level = '".$level."' ";
								$dbquery = new dbquery($query,$connid);
							}
							/*else if($checkIPSstatus != "" && $value != $checkIPSstatus)
							{
								echo "<div align='center'><b>This topic-class is already alloted to a user for IPS</b></div>";
								$this->setcolor[] = $this->topic_code[$key];
							}*/
						}		
					}		
				}
			}
		}
		else
		{
			$topicName = $this->getTopicNames($connid,$topicCode);
			$this->error = "<div align='center'><b>IPS allotment 1 and 2 cannot be alloted to same person for the topic - ".$topicName."</b></div>";
		}
	}
	function saveOwnerDetails($connid,$level,$key)
	{
		$this->changeAllotment($connid,$this->owner[$key],$this->topic_code[$key],$this->class,$level);
		$query = "UPDATE da_ipsMaster SET ips_owner = '".$this->owner[$key]."' WHERE topic_code = '".$this->topic_code[$key]."' AND class = '".$this->class."' AND level = '".$level."' ";
		$dbquery = new dbquery($query,$connid);
	}
	function changeAllotment($connid,$owner,$topic_code,$class,$level)
	{
		$query = "SELECT ips_id,ips_owner,userid FROM da_ipsMaster WHERE topic_code = '".$topic_code."' AND class = '".$class."' AND level = '".$level."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row["ips_id"] > 0 && $owner != "" && $owner != $row["userid"] && $owner != $row["ips_owner"])
		{
			//$queryAllot = "UPDATE da_ipsDetails SET current_alloted = '".$owner."',alloted_date = CURDATE(),lastModified = NOW() WHERE ips_id = '".$row["ips_id"]."' AND ips_status = 0 AND current_alloted != '' ";
			$queryAllot = "UPDATE da_ipsDetails SET current_alloted = '".$owner."',alloted_date = CURDATE(),lastModified = NOW() WHERE ips_id = '".$row["ips_id"]."' AND ips_status = 0 AND current_alloted = '".$row["ips_owner"]."' ";
			$dbqueryAllot = new dbquery($queryAllot,$connid);
		}
	}
	function sameAllotmentCheck()
	{
		foreach($this->topic_code as $key => $value)
		{
			if($this->userid[1][$key] != "" && $this->userid[2][$key]!= "" && $this->userid[1][$key] == $this->userid[2][$key])
				return $value;
		}
		return 0;
	}
	function checkDuplicate($connid,$topic_code,$userid,$level)
	{
		$query = "SELECT count(*) FROM da_ipsMaster WHERE userid = '".$userid."' AND topic_code = '".$topic_code."' AND class = '".$this->class."' AND level='".$level."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function updateCheck($connid,$topic_code,$level)
	{
		$query = "SELECT count(*) FROM da_ipsMaster WHERE topic_code = '".$topic_code."' AND class = '".$this->class."' AND level = '".$level."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function checkIPSstatus($connid,$topic_code,$level)
	{
		$query = "SELECT userid FROM da_ipsMaster a,da_ipsDetails b WHERE a.ips_id = b.ips_id AND topic_code = '".$topic_code."' AND class = '".$this->class."' AND level= '".$level."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getIPSstatusByTopicClass($connid,$status="")
	{
		$arrRet = array();
		$condition = "";
		if($status > 0)
			$condition = " AND da_ipsDetails.ips_status = '".$status."' ";
		
		/*$query = "SELECT da_ipsMaster.topic_code,da_ipsMaster.class,da_ipsMaster.level,count(DISTINCT da_questions.qcode) as qcount 
				  FROM da_ipsMaster
				  LEFT JOIN da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id
				  LEFT JOIN da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
				  LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				  LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				  LEFT JOIN da_questions ON da_ipsDetails.qcode = da_questions.qcode AND da_questions.sub_subtopic_code = da_subSubTopicMaster.sub_subtopic_code
				  WHERE da_questions.status = 3 ".$condition." GROUP BY da_ipsMaster.topic_code,da_ipsMaster.class,da_ipsMaster.level";*/
			
		/*$query = "SELECT a.topic_code,a.class,level,count(DISTINCT b.qcode) as qcount 
				  FROM da_ipsMaster a,da_ipsDetails b,da_questions c,da_topicMaster d,da_subtopicMaster e,da_subSubTopicMaster f 
				  WHERE a.ips_id = b.ips_id AND b.qcode = c.qcode AND c.status = 3
				  AND a.class = c.class
				  AND a.topic_code = d.topic_code AND d.topic_code = e.topic_code 
				  AND e.subtopic_code = f.subtopic_code AND c.sub_subtopic_code = f.sub_subtopic_code 
				  ".$condition." GROUP BY a.topic_code,a.class,level";*/
		
		$query = "SELECT da_ipsMaster.class,da_ipsMaster.topic_code,da_topicMaster.description,
					count(distinct(da_ipsDetails.qcode)) as ips1resolved
					from da_ipsMaster
					left join da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
					left join da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
					left join da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
					left join da_questions ON (
						da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
						AND
						da_ipsMaster.class = da_questions.class
					)
					left join da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id AND da_ipsDetails.qcode = da_questions.qcode
					WHERE da_ipsDetails.ips_status = 1
					AND da_questions.status = 3
					AND da_ipsMaster.level = 1
					AND da_questions.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode) 
					AND da_questions.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
					group by da_ipsMaster.class,da_ipsMaster.topic_code";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["class"]][$row["topic_code"]] = array("qcount"=>$row["ips1resolved"]);
		}
		return $arrRet;
	}
	
	function getIPS2ResolvedByTopicClass($connid){
		
		$arrRet = array();
		$query = "SELECT da_ipsMaster.class,da_ipsMaster.topic_code,da_topicMaster.description,
					count(distinct(da_ipsDetails.qcode)) as ips2resolved
					from da_ipsMaster
					LEFT JOIN da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
					LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
					LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
					LEFT JOIN da_questions ON (
						da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
						AND
						da_ipsMaster.class = da_questions.class
					)
					LEFT JOIN da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id AND da_ipsDetails.qcode = da_questions.qcode
					WHERE da_ipsDetails.ips_status = 1
					AND da_questions.status = 3
					AND da_ipsMaster.level = 2
					AND da_questions.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode) 
					AND da_questions.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
					GROUP BY da_ipsMaster.class,da_ipsMaster.topic_code";
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["class"]][$row["topic_code"]] = array("qcount"=>$row["ips2resolved"]);
		}
		return $arrRet;
	}
	
	function getIPStopicsBySubjectClass($connid)
	{
		$this->setpostvars();
		$query = "SELECT da_topicMaster.topic_code,da_topicMaster.description as topic,count(DISTINCT(da_questions.qcode)) AS qcount
				  FROM da_topicMaster
				  LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				  LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				  LEFT JOIN da_questions ON da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
				  WHERE da_topicMaster.subjectno = '".$this->subjectno."' 
				  AND da_questions.class = '".$this->class."' 
				  AND da_questions.status = '3' 
				  GROUP BY da_topicMaster.topic_code";
		//$query = "SELECT d.topic_code,d.description as topic,count(DISTINCT qcode) as qcount FROM da_questions a,da_subSubTopicMaster b,da_subtopicMaster c,da_topicMaster d WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = c.subtopic_code AND c.topic_code = d.topic_code AND a.subjectno = '".$this->subjectno."' AND a.class = '".$this->class."' AND a.status = '3' GROUP BY d.topic_code ";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	function retrieveAllotmentDetails($connid,$owner="")
	{
		$arrRet = array();
		$query = "SELECT a.topic_code,a.class,userid,level,ips_owner
		          FROM da_ipsMaster a  INNER JOIN da_topicMaster b ON  a.topic_code = b.topic_code
		          WHERE b.subjectno = '".$this->subjectno."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($owner == "Y")
				$arrRet[$row["topic_code"]][$row["class"]][$row["level"]]	= $row["ips_owner"];
			else 
				$arrRet[$row["topic_code"]][$row["class"]][$row["level"]]	= $row["userid"];
		}
		return $arrRet;
	}
	function getAllotedTopicsByUser($connid)
	{
		$arrRet = array();
		$this->setgetvars();
		$this->setpostvars();
		$condition = "WHERE (userid = '".$_SESSION["username"]."' OR current_alloted = '".$_SESSION["username"]."') ";
		$arrPaperAssemblyAdmin = array("aarthi.muralidharan","jaspreet","muntaquim","vishnu","asmi","arpit","jayasree.ts","meghna.kumar","nishchal","sudhir.prajapati","rama.naicker","rahul","rahul.venuraj","bindu.balan");
		if(in_array($_SESSION["username"],$arrPaperAssemblyAdmin))
			$condition = "WHERE 1 = 1 ";
			
		$arrLevelValidation = $this->getIPSstatusLevel1($connid);
		$query = "SELECT a.topic_code,description as topic,subjectno,a.class,a.level 
				FROM da_ipsMaster a 
				LEFT JOIN da_topicMaster b ON a.topic_code = b.topic_code 
				LEFT JOIN da_ipsDetails c ON a.ips_id = c.ips_id ".$condition."
				GROUP BY a.class,subjectno,a.topic_code";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if($row["level"] == "2" && isset($arrLevelValidation[$row["class"]][$row["topic_code"]]))
			{
				if($arrLevelValidation[$row["class"]][$row["topic_code"]] == "resolved")
					$arrRet[$row["class"]][$row["subjectno"]][$row["topic_code"]] = $row["topic"];	
			}
			else
			{
				$arrRet[$row["class"]][$row["subjectno"]][$row["topic_code"]] = $row["topic"];	
			}
		}
		return $arrRet;
	}
	function getIPSstatusLevel1($connid)
	{
		$arrRet = array();
		$query = "SELECT topic_code,class,status FROM da_ipsMaster WHERE level = 1";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["class"]][$row["topic_code"]] = $row["status"];
		}
		return $arrRet;
	}
	function getAllotedClassByUser($connid)
	{
		$arrRet = array();
		$condition = "";
		$arrPaperAssemblyAdmin = array("aarthi.muralidharan","jaspreet","muntaquim","vishnu","rahul","arpit","asmi","jayasree.ts","meghna.kumar","nishchal","sudhir.prajapati","rama.naicker","rahul.venuraj","bindu.balan");
		$condition = "WHERE (userid = '".$_SESSION["username"]."' OR current_alloted = '".$_SESSION["username"]."') ";
		$arrPaperAssemblyAdmin = array("aarthi.muralidharan","jaspreet","muntaquim","vishnu","rahul","arpit","asmi","jayasree.ts","meghna.kumar","nishchal","sudhir.prajapati","rama.naicker","rahul.venuraj","bindu.balan");
		
		if(in_array($_SESSION["username"],$arrPaperAssemblyAdmin))
			$condition = "WHERE 1 = 1 ";
		$query = "SELECT DISTINCT class FROM da_ipsMaster a LEFT JOIN da_ipsDetails b ON a.ips_id = b.ips_id ".$condition." ORDER BY class";

		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = $row["class"];
		}
		return $arrRet;
	}
	function getApprovedQcount($connid)
	{
		$arrRet = array();
		$condition = "";
		//$query = "SELECT a.class,d.topic_code,d.description as topic,count(qcode) as qcount,group_concat(qcode) as qlist FROM da_questions a,da_subSubTopicMaster b,da_subtopicMaster c,da_topicMaster d WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = c.subtopic_code AND c.topic_code = d.topic_code  AND a.status = '3' ".$condition." GROUP BY a.class,d.topic_code ";
		$queryforglobal = "SET SESSION group_concat_max_len = 1000000";
		$dbquery_for_global = new dbquery($queryforglobal,$connid);
		
		$query = "SELECT a.class,d.topic_code,d.description as topic,count(qcode) as qcount,group_concat(qcode) as qlist 
				  FROM da_questions a,da_subSubTopicMaster b,da_subtopicMaster c,da_topicMaster d 
				  WHERE a.sub_subtopic_code = b.sub_subtopic_code AND b.subtopic_code = c.subtopic_code 
				  AND c.topic_code = d.topic_code  AND a.status = '3' ".$condition." GROUP BY a.class,d.topic_code ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["class"]][$row["topic_code"]] = array("qcount"=>$row["qcount"],"qlist"=>$row["qlist"]);
		}
		return $arrRet;
	}
	
	function getTopicWiseImagePendingCount($connid){
		
		$ImagePendingTopicWiseQcount = array();
		
		$query = "select da_topicMaster.topic_code,count(distinct(id)) as qcount from da_images
				  left join da_questions ON da_images.id = da_questions.qcode
				  left join da_subSubTopicMaster ON da_questions.sub_subtopic_code = da_subSubTopicMaster.sub_subtopic_code
				  left join da_subtopicMaster ON da_subSubTopicMaster.subtopic_code = da_subtopicMaster.subtopic_code
				  left join da_topicMaster ON da_subtopicMaster.topic_code = da_topicMaster.topic_code
				  WHERE da_images.status < 3
				  group by da_topicMaster.topic_code";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$ImagePendingTopicWiseQcount[$result["topic_code"]]	= $result["qcount"];
		}
		return $ImagePendingTopicWiseQcount;
	}
	
	function getIPS1mainDetails($connid)
	{
		$this->setpostvars();
		$condition = "";
		if(isset($this->class) && $this->class > 0)
			$condition.="AND da_ipsMaster.class = '".$this->class."'";
		if(isset($this->userid) && $this->userid != "")
			$condition.= "AND (da_ipsMaster.userid = '".$this->userid."')"; //OR da_ipsDetails.current_alloted = '".$this->userid."')
		if(isset($this->fromDate) && $this->fromDate != "")
			$condition.=" AND DATE(da_ipsDetails.lastModified) >= '".daformatDate($this->fromDate)."'";
		if(isset($this->toDate) && $this->toDate != "")
			$condition.=" AND DATE(da_ipsDetails.lastModified) <= '".daformatDate($this->toDate)."'";	
				
			
		$query = "SELECT da_ipsMaster.ips_id,da_ipsMaster.class,da_ipsMaster.topic_code,da_topicMaster.description as topic,da_ipsMaster.level,
			      da_ipsMaster.ips_owner,da_ipsMaster.userid,
				  count(distinct(da_questions.qcode)) as total_questions,
				  SUM(IF(da_ipsDetails.current_alloted = da_ipsMaster.userid,1,0)) as current_alloted,
				  SUM(IF(da_ipsDetails.qcode is null,1,0)) as  unanswerd,
				  SUM(IF(da_ipsDetails.ips_status = 0 AND da_ipsDetails.answer != da_questions.correct_answer AND da_questions.qcode is not null,1,0)) as mismatched_count,
				  SUM(IF(da_ipsDetails.ips_status = 1,1,0)) as resolvedbycount,
				  SUM(IF(da_ipsDetails.ips_status = 0 AND da_ipsDetails.answer = da_questions.correct_answer ,1,0)) as commented_count,
				  SUM(IF(da_ipsDetails.ips_status = 1,1,0)) as resolvedcount
				  from da_ipsMaster
				  left join da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
				  left join da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				  left join da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				  left join da_questions ON (
					da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
					AND
					da_ipsMaster.class = da_questions.class
				 ) 
				 left join da_ipsDetails ON (
							da_ipsMaster.ips_id = da_ipsDetails.ips_id 
							AND 
							da_ipsDetails.qcode = da_questions.qcode
							)
				 WHERE da_topicMaster.subjectno = '".$this->subjectno."' $condition
				 AND da_questions.status = 3
				 AND da_topicMaster.topic_code IS NOT NULL
				 AND da_questions.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode) 
				 AND da_questions.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
				 group by da_ipsMaster.class,da_ipsMaster.topic_code,da_ipsMaster.level,da_ipsMaster.userid
				 having level =1";
		
		/*$query = "SELECT da_ipsMaster.ips_id,da_ipsMaster.topic_code,da_ipsMaster.class,da_ipsMaster.userid,da_topicMaster.description AS topic,
				  COUNT(DISTINCT(da_ipsDetails.qcode)) as qcount,GROUP_CONCAT(DISTINCT(da_ipsDetails.qcode)) as qlist,
				  da_ipsMaster.level,da_ipsMaster.ips_owner
				  FROM da_ipsMaster
				  LEFT JOIN da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id
				  LEFT JOIN da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
				  LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				  LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				  LEFT JOIN da_questions ON da_ipsDetails.qcode = da_questions.qcode AND da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
				  WHERE da_topicMaster.subjectno = '".$this->subjectno."' AND da_ipsMaster.class = da_subSubTopicMaster.class $condition
				  GROUP BY da_topicMaster.topic_code,da_ipsMaster.class,da_ipsMaster.level";	*/
		/*$query = "SELECT a.ips_id,a.topic_code,a.class,userid,description as topic,COUNT(DISTINCT qcode) as qcount,GROUP_CONCAT(DISTINCT qcode) as qlist,level,ips_owner FROM da_ipsMaster a
		LEFT JOIN da_ipsDetails b ON a.ips_id = b.ips_id
		LEFT JOIN da_topicMaster c ON a.topic_code = c.topic_code WHERE subjectno = '".$this->subjectno."' ".$condition." GROUP BY a.topic_code,class,level";*/
		//echo $query;
		//$query = "SELECT a.ips_id,a.topic_code,a.class,userid,description as topic,count(qcode) as qcount FROM da_ipsMaster a,da_ipsDetails b,da_topicMaster c WHERE a.ips_id = b.ips_id AND a.topic_code = c.topic_code GROUP BY a.topic_code,class,userid";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	
	function getIPS2mainDetails($connid)
	{
		$this->setpostvars();
		$condition = "";
		if(isset($this->class) && $this->class > 0)
			$condition.="AND da_ipsMaster.class = '".$this->class."'";
		/*if(isset($this->class) && $this->class > 0)
			$condition.=" AND FIND_IN_SET($this->class,da_subSubTopicMaster.class)";*/
		if(isset($this->userid) && $this->userid != "")
			$condition.= "AND (da_ipsMaster.userid = '".$this->userid."')";// OR da_ipsDetails.current_alloted = '".$this->userid."')
		if(isset($this->fromDate) && $this->fromDate != "")
			$condition.=" AND DATE(da_ipsDetails.lastModified) >= '".daformatDate($this->fromDate)."'";
		if(isset($this->toDate) && $this->toDate != "")
			$condition.=" AND DATE(da_ipsDetails.lastModified) <= '".daformatDate($this->toDate)."'";
				
			
		$query = "SELECT  da_ipsMaster.ips_id,da_ipsMaster.class,da_ipsMaster.topic_code,da_topicMaster.description as topic,
				da_ipsMaster.userid,da_ipsMaster.level,da_ipsMaster.ips_owner,
				count(distinct(da_ipsDetails.qcode)) as total_questions,
				SUM(IF(da_ipsDetails.current_alloted = da_ipsMaster.userid,1,0)) as current_alloted,
				SUM(IF(da_ipsDetails.ips_status = 0 AND da_ipsDetails.answer != da_questions.correct_answer AND da_questions.qcode is not null,1,0)) as mismatched_count,
				SUM(IF(da_ipsDetails.ips_status = 1 AND da_ipsDetails.resolved_by = da_ipsMaster.userid,1,0)) as resolvedbycount,
				SUM(IF(da_ipsDetails.ips_status = 0 AND da_ipsDetails.answer = da_questions.correct_answer,1,0)) as commented_count,
				SUM(IF(da_ipsDetails.ips_status = 1,1,0)) as resolvedcount
				from da_ipsMaster
				left join da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
				left join da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				left join da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				left join da_questions ON (
					da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
					AND
					da_ipsMaster.class = da_questions.class
				)
				left join da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id AND da_ipsDetails.qcode = da_questions.qcode
				where da_topicMaster.topic_code is not null 
				AND da_topicMaster.subjectno = '".$this->subjectno."'
				AND da_questions.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode) 
				AND da_questions.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
				$condition
				group by da_ipsMaster.class,da_ipsMaster.topic_code,da_ipsMaster.level,da_ipsMaster.userid
				having da_ipsMaster.level = 2";
		
		/*$query = "SELECT da_ipsMaster.ips_id,da_ipsMaster.topic_code,da_ipsMaster.class,da_ipsMaster.userid,da_topicMaster.description AS topic,
				  COUNT(DISTINCT(da_ipsDetails.qcode)) as qcount,GROUP_CONCAT(DISTINCT(da_ipsDetails.qcode)) as qlist,
				  da_ipsMaster.level,da_ipsMaster.ips_owner
				  FROM da_ipsMaster
				  LEFT JOIN da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id
				  LEFT JOIN da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
				  LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				  LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				  LEFT JOIN da_questions ON da_ipsDetails.qcode = da_questions.qcode AND da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
				  WHERE da_topicMaster.subjectno = '".$this->subjectno."' AND da_ipsMaster.class = da_subSubTopicMaster.class $condition
				  GROUP BY da_topicMaster.topic_code,da_ipsMaster.class,da_ipsMaster.level";	*/
		/*$query = "SELECT a.ips_id,a.topic_code,a.class,userid,description as topic,COUNT(DISTINCT qcode) as qcount,GROUP_CONCAT(DISTINCT qcode) as qlist,level,ips_owner FROM da_ipsMaster a
		LEFT JOIN da_ipsDetails b ON a.ips_id = b.ips_id
		LEFT JOIN da_topicMaster c ON a.topic_code = c.topic_code WHERE subjectno = '".$this->subjectno."' ".$condition." GROUP BY a.topic_code,class,level";*/
		//echo $query;
		//$query = "SELECT a.ips_id,a.topic_code,a.class,userid,description as topic,count(qcode) as qcount FROM da_ipsMaster a,da_ipsDetails b,da_topicMaster c WHERE a.ips_id = b.ips_id AND a.topic_code = c.topic_code GROUP BY a.topic_code,class,userid";
		$dbquery = new dbquery($query,$connid);
		return $dbquery;
	}
	
	
	function getMisMatchDetails($connid,$flag="")
	{
		$condition = "";
		$this->setpostvars();
		if(isset($this->userid) && $this->userid != "")
			$condition = " AND userid = '".$this->userid."' ";
		if($flag == 1){
			$query = "SELECT a.ips_id,count(DISTINCT a.qcode) as qcount,group_concat(DISTINCT a.qcode) as qlist 
				      FROM da_ipsDetails a,da_questions b,da_comments c,da_ipsMaster d,da_topicMaster e,da_subtopicMaster f,da_subSubTopicMaster g  
				      WHERE a.qcode = b.qcode AND a.qcode = c.qcode AND a.ips_id = d.ips_id AND type = 'IPS' 
				      AND b.class = d.class
				      AND a.ips_status = 0 AND b.status = '3' 
				      AND d.topic_code = e.topic_code
				      AND f.topic_code = e.topic_code
				      AND g.subtopic_code = f.subtopic_code
				      AND b.sub_subtopic_code = g.sub_subtopic_code
				      AND a.answer = b.correct_answer 
				      AND b.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = b.qcode) 
				      AND b.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = b.group_id)
				      ".$condition." GROUP BY ips_id";
			//$query = "SELECT a.ips_id,count(DISTINCT a.qcode) as qcount,group_concat(DISTINCT a.qcode) as qlist FROM da_ipsDetails a,da_questions b,da_comments c,da_ipsMaster d WHERE a.qcode = b.qcode AND a.qcode = c.qcode AND a.ips_id = d.ips_id AND type = 'IPS' AND ips_status = 0 AND b.status = '3' AND a.answer = b.correct_answer ".$condition." GROUP BY ips_id";
		}	
		else {
			$query = "SELECT a.ips_id,count(DISTINCT a.qcode) as qcount,group_concat(DISTINCT a.qcode) as qlist 
					  FROM da_ipsDetails a,da_questions b,da_ipsMaster d,da_topicMaster e,da_subtopicMaster f,da_subSubTopicMaster g
					  WHERE a.qcode = b.qcode AND a.answer != b.correct_answer AND a.ips_id = d.ips_id AND b.status = '3' 
					  AND b.class = d.class
					  AND d.topic_code = e.topic_code
				      AND f.topic_code = e.topic_code
				      AND g.subtopic_code = f.subtopic_code
				      AND b.sub_subtopic_code = g.sub_subtopic_code
					  AND a.ips_status = 0 
					  AND b.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = b.qcode) 
					  AND b.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = b.group_id)
					  ".$condition." GROUP BY ips_id";			
			//$query = "SELECT a.ips_id,count(DISTINCT a.qcode) as qcount,group_concat(DISTINCT a.qcode) as qlist FROM da_ipsDetails a,da_questions b,da_ipsMaster d WHERE a.qcode = b.qcode AND a.answer != b.correct_answer AND a.ips_id = d.ips_id AND b.status = '3' AND ips_status = 0 ".$condition." GROUP BY ips_id";			
		}
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray())
		{
			$arrRet[$row["ips_id"]] = array("qcount"=>$row["qcount"],"qlist"=>$row["qlist"]);
		}
		return $arrRet;
	}
	function getSolvedQnCountByIPSid($connid)
	{
		$arrRet = array();
		//$query = "SELECT COUNT(DISTINCT a.qcode) as qcount,GROUP_CONCAT(DISTINCT a.qcode) as qlist,a.ips_id FROM da_ipsDetails a,da_questions b,da_ipsMaster c,da_topicMaster d,da_subtopicMaster e,da_subSubTopicMaster f WHERE a.qcode = b.qcode AND a.ips_id = c.ips_id AND c.topic_code = d.topic_code AND d.topic_code = e.topic_code AND e.subtopic_code = f.subtopic_code AND b.sub_subtopic_code = f.sub_subtopic_code AND ips_status = 1 AND b.status = '3' AND b.class = c.class GROUP BY a.ips_id ";
		$query = "SELECT COUNT(DISTINCT a.qcode) as qcount,GROUP_CONCAT(DISTINCT a.qcode) as qlist,a.ips_id 
				  FROM da_ipsDetails a,da_questions b,da_ipsMaster c,da_topicMaster d,da_subtopicMaster e,da_subSubTopicMaster f 
				  WHERE a.qcode = b.qcode AND a.ips_id = c.ips_id AND c.topic_code = d.topic_code AND d.topic_code = e.topic_code 
				  AND e.subtopic_code = f.subtopic_code AND b.sub_subtopic_code = f.sub_subtopic_code AND a.ips_status = 1 AND b.status = '3' 
				  AND b.class = c.class GROUP BY a.ips_id ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["ips_id"]] = array("qcount"=>$row["qcount"],"qlist"=>$row["qlist"]);
		}
		return $arrRet;
	}
	function getDetailsByQcodes($connid,$ips_id,$arrQcodes)
	{
		$arrRet = array();
		$qcodelist = implode(",",$arrQcodes);
		$query = "SELECT a.qcode,question,optiona,optionb,optionc,optiond,b.answer,correct_answer 
				  FROM da_questions a 
				  LEFT JOIN da_ipsDetails b ON (a.qcode = b.qcode AND ips_id = '".$ips_id."') 
				  WHERE a.qcode IN (".$qcodelist.") 
				  AND a.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = a.qcode) 
				  AND a.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = a.group_id)";
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$bgcolor = "#FFFFFF";
			$answer = $row["answer"];
			if($row["answer"] == "")
				$answer = "?";
			if($row["answer"] != "" && $row["correct_answer"] != $row["answer"])
				$bgcolor = "mistyrose";

			$arrRet[$row["qcode"]]=array("qcode"=>$row["qcode"],"correct_answer"=>$row["correct_answer"],"answer"=>$answer,"question"=>$row["question"],"optiona"=>$row["optiona"],"optionb"=>$row["optionb"],"optionc"=>$row["optionc"],"optiond"=>$row["optiond"],"bgcolor"=>$bgcolor);
		}
		return $arrRet;
	}
	function getTopicNames($connid,$topic_code)
	{
		$query = "SELECT description FROM da_topicMaster WHERE topic_code = '".$topic_code."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[0];
	}
	function getIPSallotmentTopicsAndQcount($connid,$main)
	{
		$arrRet = array();
		//$arrTotalQns = $this->getApprovedQcount($connid);
		
		/*$condition = "AND (da_ipsMaster.userid = '".$_SESSION["username"]."' OR da_ipsDetails.current_alloted = '".$_SESSION["username"]."')";
		$query = "SELECT da_ipsMaster	.class,da_ipsMaster.topic_code,da_ipsMaster.level,
					SUM(IF(da_ipsDetails.current_alloted !='' AND da_ipsDetails.current_alloted = '".$_SESSION["username"]."' AND da_questions.qcode > 0,1,0)) as alloted_count,
					COUNT(DISTINCT da_ipsDetails.qcode) as answered,
					SUM(IF(da_ipsDetails.ips_status > 0,1,0)) as resolved,
					da_topicMaster.description as topic,da_ipsDetails.ips_id,da_topicMaster.subjectno,
					da_ipsMaster.userid 
					FROM da_ipsMaster
					LEFT JOIN da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id
					LEFT JOIN da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
					LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
					LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
					LEFT JOIN da_questions ON (da_ipsDetails.qcode = da_questions.qcode 
								   AND 
								   da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
								   AND 
								   da_topicMaster.class = da_questions.class
								   )
					WHERE 1 = 1 AND da_questions.status = 3 ".$condition." 
					GROUP BY da_topicMaster.topic_code,da_topicMaster.class,da_ipsMaster.level";
		echo "<br>".$query;*/
		$query = "SELECT da_ipsMaster.ips_id,da_ipsMaster.ips_owner,da_ipsMaster.class,da_ipsMaster.topic_code,da_topicMaster.description as topic,
				  da_ipsMaster.level,da_ipsMaster.userid,da_topicMaster.subjectno,
				  count(distinct(da_questions.qcode)) as total_questions,
				  SUM(IF(da_ipsDetails.current_alloted = '".$_SESSION["username"]."',1,0)) as current_alloted,
				  SUM(IF(da_ipsDetails.qcode is null AND da_ipsMaster.userid = '".$_SESSION["username"]."',1,0)) as  unanswerd,
				  SUM(IF(da_ipsDetails.qcode is not null,1,0)) as answerd,
				  SUM(IF(da_ipsDetails.ips_status = 0 AND da_ipsDetails.answer != da_questions.correct_answer AND da_questions.qcode is not null,1,0)) as mismatched_count,
				  SUM(IF(da_ipsDetails.ips_status = 1 AND da_ipsDetails.resolved_by = '".$_SESSION["username"]."',1,0)) as resolvedbycount,
				  SUM(IF(da_ipsDetails.ips_status = 0 AND da_ipsDetails.answer = da_questions.correct_answer,1,0)) as commented_count,
				  SUM(IF(da_ipsDetails.ips_status = 1,1,0)) as resolvedcount
				  FROM da_ipsMaster
				  LEFT JOIN da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
				  LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				  LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				  LEFT JOIN da_questions ON (
					  da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
					  AND
					  da_ipsMaster.class = da_questions.class
				  ) 
				  LEFT JOIN da_ipsDetails ON (
					  da_ipsMaster.ips_id = da_ipsDetails.ips_id 
					  AND 
					  da_ipsDetails.qcode = da_questions.qcode
				  )
				  WHERE (da_ipsMaster.userid = '".$_SESSION["username"]."' OR da_ipsDetails.current_alloted = '".$_SESSION["username"]."' OR da_ipsMaster.ips_owner = '".$_SESSION["username"]."')
				  AND da_questions.qcode NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode)
				  AND da_questions.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
				  AND da_questions.status = 3
				  GROUP BY da_ipsMaster.class,da_ipsMaster.topic_code,da_ipsMaster.level
				  HAVING level =1";
		
		//echo "<br> Query ::".$query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			//$arrRet[$row["class"]][$row["topic_code"]][$row["level"]]["total"] = $arrTotalQns[$row["class"]][$row["topic_code"]]["qcount"];
			$arrRet[$row["class"]][$row["topic_code"]]["total"] = $row["total_questions"];
			$arrRet[$row["class"]][$row["topic_code"]]["answeredcount"] = $row["answerd"];
			$arrRet[$row["class"]][$row["topic_code"]]["unansweredcount"] = $row["unanswerd"];
			$arrRet[$row["class"]][$row["topic_code"]]["resolvedcount"] = $row["resolvedbycount"];
			$arrRet[$row["class"]][$row["topic_code"]]["current_alloted"] = $row["current_alloted"];
			$arrRet[$row["class"]][$row["topic_code"]]["topic"] = $row["topic"];
			$arrRet[$row["class"]][$row["topic_code"]]["ips_id"] = $row["ips_id"];
			$arrRet[$row["class"]][$row["topic_code"]]["userid"] = $row["userid"];
			$arrRet[$row["class"]][$row["topic_code"]]["subjectno"] = $row["subjectno"];
		}
		/*echo "<pre>";
		print_r($arrRet);
		echo "</pre>";*/
		return $arrRet;
	}
	
	function getIPS2Allotment($connid){
		
		$arrRet = array();
		$query = "SELECT da_ipsMaster.ips_id,da_ipsMaster.class,da_ipsMaster.topic_code,da_topicMaster.description as topic,
				  da_ipsMaster.userid,da_topicMaster.subjectno,
		 		  SUM(IF(da_ipsDetails.current_alloted = '".$_SESSION["username"]."',1,0)) as current_alloted,
				  SUM(IF(da_ipsDetails.ips_status = 0,1,0)) as answeredcount,
				  SUM(IF(da_ipsDetails.ips_status = 1 AND da_ipsDetails.resolved_by = '".$_SESSION["username"]."',1,0)) as resolvedbycount,
				  SUM(IF(da_ipsDetails.ips_status = 1,1,0)) as resolvedcount
				  FROM da_ipsMaster
				  LEFT JOIN da_topicMaster ON da_ipsMaster.topic_code = da_topicMaster.topic_code
				  LEFT JOIN da_subtopicMaster ON da_topicMaster.topic_code = da_subtopicMaster.topic_code
				  LEFT JOIN da_subSubTopicMaster ON da_subtopicMaster.subtopic_code = da_subSubTopicMaster.subtopic_code
				  LEFT JOIN da_questions ON (
					  da_subSubTopicMaster.sub_subtopic_code = da_questions.sub_subtopic_code
					  AND
					  da_ipsMaster.class = da_questions.class
				  )
				  LEFT JOIN da_ipsDetails ON da_ipsMaster.ips_id = da_ipsDetails.ips_id AND da_ipsDetails.qcode = da_questions.qcode
				  WHERE (da_ipsDetails.current_alloted = '".$_SESSION["username"]."' OR da_ipsMaster.userid ='".$_SESSION["username"]."' OR da_ipsMaster.ips_owner = '".$_SESSION["username"]."')
				  AND da_questions.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode)
				  AND da_questions.group_id NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
				  GROUP BY da_ipsMaster.class,da_ipsMaster.topic_code,da_ipsMaster.level
				  HAVING da_ipsMaster.level = 2";
		//echo "<br> Query ::".$query;
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()){
			
			$arrRet[$row["class"]][$row["topic_code"]]["answeredcount"] = $row["answeredcount"];
			$arrRet[$row["class"]][$row["topic_code"]]["resolvedcount"] = $row["resolvedcount"];
			$arrRet[$row["class"]][$row["topic_code"]]["resolvedbycount"] = $row["resolvedbycount"];
			$arrRet[$row["class"]][$row["topic_code"]]["current_alloted"] = $row["current_alloted"];
			$arrRet[$row["class"]][$row["topic_code"]]["topic"] = $row["topic"];
			$arrRet[$row["class"]][$row["topic_code"]]["ips_id"] = $row["ips_id"];
			$arrRet[$row["class"]][$row["topic_code"]]["userid"] = $row["userid"];
			$arrRet[$row["class"]][$row["topic_code"]]["subjectno"] = $row["subjectno"];
		}
		return $arrRet;
	}
	
	
	function getIPSlevel1QnStatus($connid,$topic_code,$class)
	{
		$arrRet = array();
		$query = "SELECT qcode,b.ips_status FROM da_ipsMaster a,da_ipsDetails b 
		          WHERE a.ips_id = b.ips_id AND topic_code = '".$topic_code."' 
		          AND class = '".$class."' AND level = '1'";
		
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["qcode"]]	= $row["ips_status"];	
		}
		return $arrRet;
	}
	function getGroupShowHideStatus($connid,$ips_id,$group_id,$type)
	{
		$arrRet = array();
		if($type == "grp")
			$condition = "AND group_id = '".$group_id."'";
		else
			$condition = "AND passage_id = '".$group_id."'";

		$query = "SELECT SUM(b.ips_status) as total,COUNT(a.qcode) as qcount FROM da_questions a,da_ipsDetails b WHERE a.qcode = b.qcode AND b.ips_id = '".$ips_id."' ".$condition;
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row["total"] == $row["qcount"])
			return 1;
		else
			return 0;
	}
	function getAllotedSubject($connid)
	{
		$arrRet = array();
		$query_main = "SELECT DISTINCT subjectno FROM da_topicMaster a,da_ipsMaster b WHERE a.topic_code = b.topic_code AND userid = '".$_SESSION["username"]."'";
		$dbquery_main = new dbquery($query_main,$connid);
		while($row_main = $dbquery_main->getrowarray())
		{
			$arrRet[] = $row_main["subjectno"];
		}
		$query = "SELECT DISTINCT subjectno FROM da_topicMaster a,da_ipsMaster b,da_ipsDetails c WHERE a.topic_code = b.topic_code AND b.ips_id = c.ips_id AND current_alloted = '".$_SESSION["username"]."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			if(!in_array($row["subjectno"],$arrRet))
				$arrRet[] = $row["subjectno"];
		}
		return $arrRet;
	}
}
?>