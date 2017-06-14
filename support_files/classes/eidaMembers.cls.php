<?php
/*
	Class File to Handle Team and Memebers in DA 
*/
class eidaMembers{

	var $id;
	var $subject;
	var $connid;
	var $member_type; // type of member logged in
	var $member_sub;
	var $action;
	var $addMemberType;
	var $addMemberSubject;
	var $addMemberName;
	var $superUserArr = array();
	var $subjectArr = array(); 
	var $memberTypeArr = array();
	var $subjectLeads =array();
	var $delIds = array();
	var $checkedMemberArr = array();

	function eidaMembers($connid ="") {
		$this->superUserArr = array("naveen.kumar","sudhir.prajapati","rahul.venuraj");
		$this->subjectArr = array("","English", "Maths","Science");
		$this->memberTypeArr =  array("Super User","Team Lead", "Member");
		$this->connid= $connid;
		$this->member_type=""; // member by default
		$this->member_sub= array();
		$this->action ="";
		$this->addMemberType="";
		$this->addMemberSubject="";
		$this->addMemberName="";
	}

	function setpostvars() {
		if(isset($_POST["action"])) $this->action =$_POST["action"];
		if(isset($_POST["member_del"])) $this->delIds=$_POST["member_del"];
		if(isset($_POST["addMemberType"])) $this->addMemberType=$_POST["addMemberType"];
		if(isset($_POST["addMemberSubject"])) $this->addMemberSubject=$_POST["addMemberSubject"];
		if(isset($_POST["addMemberName"])) $this->addMemberName=$_POST["addMemberName"];

		if(isset($_POST["getMemberData"])) $this->action =$_POST["getMemberData"];
		if(isset($_POST["memberLoad"])) $this->checkedMemberArr =$_POST["memberLoad"];
	}
	function setgetvars() {

	}	
	function setUserType($user) {
		
		$this->setpostvars();

		$query ="SELECT name,subject,member_type FROM da_teamMembers WHERE name ='".addslashes($user)."' AND member_type in (0,1)";
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()) {
			$this->member_sub[]=$row["subject"];
			$this->member_type=$row["member_type"];
		}

		if($this->member_type == 0)
			$this->member_sub = array(1,2,3);
	}

        
        /**
        * Function getMemberById
        *
        * Gets the member by specified USER ID and option subject. 
        * If the subject is skipped, all entries for the member will get returned.
        *
        * @param (string) ($memberId) @example 'john.doe'
        * @param (array) ($subjects) subjects array.
        * @return (mixed object) returns array of TD members with `member_type`,'name','subject' information.
        * 
        * @author hitesh
        * @lastupdated 09-04-13 11:00
        *     
        **/
        
        function getMemberById($memberId,$subjects=array()){
            $condition = "name = '$memberId'";
            if(count($subjects) > 0){
               $condition .=" AND subject in (".implode(",",$subjects).") ";
            }
            $query = "SELECT id,name,subject,member_type FROM da_teamMembers WHERE $condition";
            $dbquery = new dbquery($query,$this->connid);
            $memberArr = array();
            while($row=$dbquery->getrowarray()) {
                $memberArr[] =array("id"=>$row["id"],"name"=>$row["name"],"subject"=>$row["subject"],"member_type"=>$row["member_type"]);
            }
            return $memberArr;
        }        
        
	function getMembers($subject=array(),$type="") {

		$condition ="";
		if(count($subject) >0)
			$condition .=" AND subject in (".implode(",",$subject).") ";
		if($type !="" && $type != 0)
			$condition .=" AND member_type='".$type."' ";

		$memberArr =array();

		$query = "SELECT id,name,subject,member_type FROM da_teamMembers WHERE 1=1 $condition";
		//echo "$query <br/> ";
		$dbquery = new dbquery($query,$this->connid);

		while($row=$dbquery->getrowarray()) {

			$memberArr[] =array("id"=>$row["id"],"name"=>$row["name"],"subject"=>$row["subject"],"member_type"=>$row["member_type"]);
		}

		return $memberArr;
	}

	function deleteMember() {
		
		$delIds = implode(",",$this->delIds);
		$query = "delete from da_teamMembers where id in ($delIds) ";
		$dbquery = new dbquery($query,$this->connid);
	}
	function addMember() {

		if($this->member_type == 1)
			$this->addMemberType='2';
                $query ="INSERT INTO da_teamMembers (name,subject,member_type,entered_date,entered_by)
				VALUES ('".$this->addMemberName."','".$this->addMemberSubject."','".$this->addMemberType."',NOW(),'".$_SESSION["username"]."' )";
		//echo "$query <br/> ";
		$dbquery = new dbquery($query,$this->connid);
	}

	function getTestAllotmentData() {
		$finalArr =array();
		foreach($this->checkedMemberArr as $key => $username) {
			$arrRet =array();

			$queryAlloter = "SELECT count(*) as testcount,subject,status FROM da_testRequest
					WHERE alloted_to = '".$username."' AND status IN ('pending','commented')
					AND status != 'Approved' AND schoolCode != '0' AND type != 'demo' GROUP BY status,subject ";
			$dbquery = new dbquery($queryAlloter,$this->connid);
		    while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["subject"]][$row["status"]] = $row["testcount"];
			}
			$queryApprover = "SELECT count(*) as testcount,subject,status FROM da_testRequest
						WHERE approver = '".$username."' AND status IN ('finalize','responded')
						AND status != 'Approved' AND schoolCode != '0' AND type != 'demo' GROUP BY status,subject ";
			$dbquery_2 = new dbquery($queryApprover,$this->connid);
		    while($rowApprover = $dbquery_2->getrowarray())
			{
				$arrRet[$rowApprover["subject"]][$rowApprover["status"]] = $rowApprover["testcount"];
			}

			if(isset($arrRet))
				$finalArr[$username] = $arrRet;
		}

		return$finalArr;
	}
	function getIPS1Data() {

		$retArr = array();

		foreach($this->checkedMemberArr as $key => $username) {

		$query =" SELECT da_ipsMaster.ips_id,da_ipsMaster.ips_owner, da_ipsMaster.level,da_ipsMaster.userid,da_topicMaster.subjectno,
				  count(distinct(da_questions.qcode)) as total_questions, group_concat(distinct da_topicMaster.topic_code) topics,
				  group_concat(distinct da_questions.class) classes,
				  SUM(IF(da_ipsDetails.current_alloted = '".$username."',1,0)) as current_alloted,
				  SUM(IF(da_ipsDetails.qcode is null AND da_ipsMaster.userid = '".$username."',1,0)) as  unanswerd,
				  SUM(IF(da_ipsDetails.qcode is not null,1,0)) as answerd,
				  SUM(IF(da_ipsDetails.ips_status = 0 AND da_ipsDetails.answer != da_questions.correct_answer AND da_questions.qcode is not null,1,0)) as mismatched_count,
				  SUM(IF(da_ipsDetails.ips_status = 1 AND da_ipsDetails.resolved_by = '".$username."',1,0)) as resolvedbycount,
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
				  WHERE (da_ipsMaster.userid = '".$username."' OR da_ipsDetails.current_alloted = '".$username."' OR da_ipsMaster.ips_owner = '".$username."')
				  AND da_questions.qcode NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode)
				  AND da_questions.group_id NOT IN(SELECT distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
				  AND da_questions.status = 3 AND level =1 ";
		
		//echo "$query <br/><br/> ";

		$dbquery = new dbquery($query,$this->connid);
			while($row = $dbquery->getrowarray())
			{				
				$arrRet[$username]["total"] = $row["total_questions"];
				$arrRet[$username]["answeredcount"] = $row["answerd"];
				$arrRet[$username]["unansweredcount"] = $row["unanswerd"];
				$arrRet[$username]["resolvedcount"] = $row["resolvedbycount"];
				$arrRet[$username]["current_alloted"] = $row["current_alloted"];
				$arrRet[$username]["ips_id"] = $row["ips_id"];
				$arrRet[$username]["userid"] = $row["userid"];
				$arrRet[$username]["subjectno"] = $row["subjectno"];
				$arrRet[$username]["topics"] = $row["topics"];
				$arrRet[$username]["classes"] = $row["classes"];
			}

		}
		//print"<pre>".print_r($arrRet)." </pre> <br/> ";
		return $arrRet;
	}
	function getIPS2Data() {

		$arrRet = array();
		foreach($this->checkedMemberArr as $key => $username) {

		$query = "SELECT da_ipsMaster.ips_id,da_ipsMaster.class, da_ipsMaster.userid,da_topicMaster.subjectno,
		 		  SUM(IF(da_ipsDetails.current_alloted = '".$username."',1,0)) as current_alloted,
				  SUM(IF(da_ipsDetails.ips_status = 0,1,0)) as answeredcount,
				  SUM(IF(da_ipsDetails.ips_status = 1 AND da_ipsDetails.resolved_by = '".$username."',1,0)) as resolvedbycount,
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
				  WHERE (da_ipsDetails.current_alloted = '".$username."' OR da_ipsMaster.userid ='".$username."' OR da_ipsMaster.ips_owner = '".$username."')
				  AND da_questions.qcode NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question != 'GT' AND da_images.id = da_questions.qcode)
				  AND da_questions.group_id NOT IN(select distinct(id) from da_images where status < 3 AND where_in_question = 'GT' AND da_images.id = da_questions.group_id)
				  AND da_ipsMaster.level = 2";
		//echo  "$query <br/> <br/> ";				  
		//echo "<br> Query ::".$query;
		$dbquery = new dbquery($query,$this->connid);
			while($row = $dbquery->getrowarray()){
				
				$arrRet[$username]["answeredcount"] = $row["answeredcount"];
				$arrRet[$username]["resolvedcount"] = $row["resolvedcount"];
				$arrRet[$username]["resolvedbycount"] = $row["resolvedbycount"];
				$arrRet[$username]["current_alloted"] = $row["current_alloted"];			
				$arrRet[$username]["ips_id"] = $row["ips_id"];
				$arrRet[$username]["userid"] = $row["userid"];
			}
		}
		return $arrRet;
	}
	function getQuestionPendingAllotment() {

		$retArr = array();

		foreach($this->checkedMemberArr as $key => $username) {

			// initialize
			$retArr[$username]["own_ques"]="";
			$retArr[$username]["other_ques"] ="";
			$retArr[$username]["own_ques_count"]=0;
			$retArr[$username]["other_ques_count"]=0;

		// Current alloted questions display in main page	
			$query = "SELECT qcode, question_maker 
			          FROM da_questions
			          WHERE status < 3 AND current_alloted = '".$username."' ";
			$dbquery = new dbquery($query,$this->connid);
			while($row=$dbquery->getrowarray()) {
				if($row["question_maker"] == $username) {
					$retArr[$username]["own_ques"].=",".$row["qcode"];
					$retArr[$username]["own_ques_count"]++;
				}
				else {
					$retArr[$username]["other_ques"].=",".$row["qcode"];
					$retArr[$username]["other_ques_count"]++;
				}	
			}          
		//  images count that needs to be approved displayed in main page
		
			// Image in question           
			$image_query1 = "SELECT count(image_id) as imgcount, a.class, a.subjectno
		          FROM   da_images a, da_questions d
		          WHERE  a.id=d.qcode AND where_in_question in ('Q','A','B','C','D','IDO') AND a.current_alloted = '".$username."' ";

			$image_dbquery1 = new dbquery($image_query1,$this->connid);
			$image_row1 =$image_dbquery1->getrowarray();
			$image_cnt1 = $image_row1["imgcount"];
			$retArr[$username]["imgcount"] = $image_cnt1;

			$image_query2 = "SELECT count(image_id) as imgcount, a.class, a.subjectno
		          FROM   da_images a, da_questions d
		          WHERE  a.id=d.group_id AND where_in_question in ('GT') AND a.current_alloted = '".$username."' ";

			$image_dbquery2 = new dbquery($image_query2,$this->connid);
			$image_row2 =$image_dbquery2->getrowarray();
			$image_cnt2 = $image_row2["imgcount"];
			$retArr[$username]["imgcount"] += $image_cnt2;
		}	
		return $retArr;
		

	}
	function getIps1Status($class_list,$topic_codes,$status="") {

		$retVal = 0;

		$condition = "";
		if($status > 0)
			$condition = " AND da_ipsDetails.ips_status = '".$status."' ";

		if($topic_codes != "") {
			$condition =" AND da_topicMaster.topic_code in (".$topic_codes.") ";
		}
		if($class_list!= "") {
			$condition .=" AND da_questions.class in (".$class_list.") ";
		}
			
		
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
					$condition ";
		
		//echo "$query <br/> <br/>";
		$dbquery = new dbquery($query,$this->connid);
		
		if($dbquery->numrows() > 0) {
			$row = $dbquery->getrowarray();
			$retVal = $row["ips1resolved"];
		}
		
		//echo "Ret IPS1 resolved cnt $retVal <br/> ";
		return $retVal;
	}

}

?>
