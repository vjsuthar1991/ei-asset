<?php
class clsdamanagementreports
{
	var $year = '';
	function clsdamanagementreports()
	{
		
		$this->year = '';
			
	}
	function setpostvars()
	{
		if(isset($_POST["year"])) $this->year = $_POST["year"];
	}
        function setYear($year){
            $this->year = $year;
        }
        
	/*function getSchoolList($connid)
	{
		$this->setpostvars();
		$arrRet = array();
		$query = "select t.schoolCode,s.schoolname,s.city from schools s INNER JOIN da_testRequest t on t.schoolCode = s.schoolno
				  where t.type = 'actual'  
				  AND t.year = '$this->year'	  
				  GROUP BY s.schoolno ORDER BY s.schoolname";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrRet[$row[schoolCode]]=$row;
			}
		return 	$arrRet;
	}*/
	function getSchoolList($connid)
	{
		$this->setpostvars();
		$arrRet = array();
		$query = "select t.schoolCode,s.schoolname,s.city,t.board from schools s INNER JOIN da_orderMaster t on t.schoolCode = s.schoolno				  
				  AND t.year = '$this->year'	  
				  GROUP BY s.schoolno ORDER BY s.schoolname";
		  
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				$arrRet[$row[schoolCode]]=$row;
			}
		return 	$arrRet;
	}
	function classSubject($connid,$school)
	{
		$arrRet = array();	
	    $query = "select a.class,a.e,a.m,a.s from da_orderBreakup a inner join da_orderMaster b on a.order_id = b.order_id where b.schoolCode = '".$school."' AND b.year = '".$this->year."' order by a.class";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row['class']]["class"] = $row['class'];
			$arrRet[$row['class']]["e"] =  $row['e'];
			$arrRet[$row['class']]["m"] =  $row['m'];
			$arrRet[$row['class']]["s"] =  $row['s'];
		}
		return $arrRet;
	}
	function classSection($connid,$subject,$class,$school)
	{
		$arrRet = array();
		$setSectionArray = array();
		foreach($subject as $row_subject)
		{
			foreach($class as $row_class)
			{
				$query = "SELECT e.section,t.class,t.subject FROM da_examDetails e inner join da_testRequest t on t.id = e.request_id where 
						  t.type = 'actual' AND  t.class = '".$row_class."' AND t.subject = '".$row_subject."' AND t.schoolCode = '".$school."' AND t.year = '".$this->year."' AND e.report_status = 'generated' GROUP BY e.section ORDER BY e.section"; 
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{					
					if(!in_array($row,$setSectionArray[$row['subject']]))
					{
						$setSectionArray[$row['subject']][$row['section']] = $row['section'];
					} 
				}
			}
		}
		return $setSectionArray;
	}
	function getCountTestUsageDetail($connid,$class,$subject,$section,$school)
	{
		$countforsection = array();
		$query = "select id from da_testRequest where type = 'actual' AND  class = '".$class."' AND subject = '".$subject."' AND schoolCode = '".$school."' AND year = '".$this->year."'";
		$dbquery = new dbquery($query,$connid);
		$count = 1;
		$sum_class_avg = 0;
		while($row = $dbquery->getrowarray())
			{ 
				$query = "select count(*) as count_section,class_avg,section from da_examDetails where section = '".$section."' AND report_status = 'generated' AND request_id = '".$row[id]."'";
				$dbquery_section = new dbquery($query,$connid);				
				if($dbquery_section->numrows()>0)
				{
				$row_count = $dbquery_section->getrowarray();		
				$countforsection['count'] += $row_count[count_section];
				if($row_count[count_section]>0)
					{
					$sum_class_avg += $row_count['class_avg'];  	
					$count++;
					}
				}
			}
			$countforsection['class_avg'] = round(($sum_class_avg)/($count-1));
		return $countforsection;
	}
	function classSectionByClass($connid,$subject,$class,$school)
	{
		$arrRet = array();
		$setSectionArray = array();
		foreach($class as $row_class)
			{
				foreach($subject as $row_subject)
				{
				$query = "SELECT e.section,t.class,t.subject FROM da_examDetails e inner join da_testRequest t on t.id = e.request_id 
						  where t.type = 'actual' AND t.class = '".$row_class."' AND t.subject = '".$row_subject."' AND t.schoolCode = '".$school."' AND t.year = '".$this->year."' AND e.report_status = 'generated' GROUP BY e.section ORDER BY e.section"; 
				$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray())
					{
						if(!in_array($row,$setSectionArray[$row['class']]))
						{
							$setSectionArray[$row['class']][$row['section']] = $row['section'];
						} 
					}		
				}
		}		
		return $setSectionArray;
	}
	function countSectionBySubject($connid,$subject,$school,$class)
	{
		$query = "select e.* from da_examDetails e inner join da_testRequest t on e.request_id = t.id where 
				  t.type = 'actual' AND 
				  t.schoolCode = '".$school."' AND t.subject = '".$subject."' AND t.class = '".$class."' AND e.report_status = 'generated' AND t.year = '".$this->year."' GROUP BY e.section ORDER BY e.section"; 
		$dbquery = new dbquery($query,$connid);
		$count = 0;
		while($row = $dbquery->getrowarray())
		{
			$count++;
		}
		//echo $count;
		return $count;
	}
	function countBySubject($connid,$subject,$school,$class="")
	{
		if($class!="")
		{
			$condition = "AND class = $class";
		}
		$query = "SELECT count(*) AS qcount FROM da_examDetails e INNER JOIN da_testRequest t ON e.request_id = t.id WHERE 
				  t.type = 'actual' AND t.schoolCode = '".$school."' AND t.subject = '".$subject."' AND e.report_status = 'generated' AND t.year = '".$this->year."' $condition";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row[qcount];
	}
	
	/***********************************Added Start By Parth 23/01/2012 ***********************************/
	function getCountTestUsageDetailModified($connid,$class,$subject,$section,$school,$board="",$startDate="",$endDate="")######This function is used at 2 pages school performance report and management report#######
	{
		$condition = "";
		$countforsection = array();
		if($school!="")
		{
			$condition .= "AND a.schoolCode = '".$school."'"; 
		}
		if($board!="")
		{
			$condition .= "AND b.board = '".$board."'"; 
		}
		if($startDate!="")
		{
			$start_date = "";
			$start_date = date('Y-m-d',strtotime($startDate));
			$condition .= "AND a.test_date >= '$start_date'";
		}
		if($endDate!="")
		{
			$end_date = "";
			$end_date = date('Y-m-d',strtotime($endDate));
			$condition .= "AND a.test_date <= '$end_date'";
		}
		//$query = "select id from da_testRequest where type = 'actual' AND  class = '".$class."' AND subject = '".$subject."' AND year = '".$this->year."' $condition";
		//$query = "select a.id from da_testRequest a,schools b where a.schoolCode = b.schoolno AND a.type = 'actual' AND  a.class = '".$class."' AND a.subject = '".$subject."' AND a.year = '".$this->year."' $condition";
		$query = "select a.id from da_testRequest a inner join da_orderMaster b on a.schoolCode = b.schoolCode and b.year ='".$this->year."' where a.schoolCode = b.schoolCode AND a.type = 'actual' AND  a.class = '".$class."' AND a.subject = '".$subject."' AND a.year = '".$this->year."' $condition";
		$dbquery = new dbquery($query,$connid);
		$count = 0;
		$sum_class_avg = 0;
		while($row = $dbquery->getrowarray())
			{ 				
				$query = "select a.class_avg, a.section, b.testName, b.test_date from da_examDetails a,da_testRequest b WHERE a.request_id = b.id AND section = '".$section."' AND report_status = 'generated' AND request_id = '".$row[id]."'";
				$dbquery_section = new dbquery($query,$connid);				
				if($dbquery_section->numrows()>0)
				{					
					while($row_count = $dbquery_section->getrowarray())
					{
						$countforsection[] = array("request_id"=>$row[id],"class"=>$class,"subject"=>$subject,"section"=>$row_count['section'],"class_avg"=>$row_count['class_avg'],"testName"=>$row_count['testName'],"test_date"=>$row_count['test_date']);
					}
				}
			}
			
		return $countforsection;
	}
	/***********************************Added End By Parth 23/01/2012 ***********************************/
	
	function getExceptionFlag($school,$year,$connid)
	{
		$gap_exception = 0;
		$courier_query = "SELECT test_request_exception FROM da_orderMaster WHERE schoolCode = ".$school." AND year = ".$year;
		$dbquery = new dbquery($courier_query,$connid);
		while($row = $dbquery->getrowarray())
			{ 				
				$gap_exception = $row["test_request_exception"];
			}
		return $gap_exception;	
	}
	
	function getCountMappedBooks($school,$year,$class,$subject,$connid)
	{
			$bookmapped_query = "SELECT book_id FROM da_bookMapping WHERE schoolCode = ".$school." AND year = ".$year." AND class = ".$class." AND subject = $subject";
			$dbquery = new dbquery($bookmapped_query,$connid);
		    $row = $dbquery->getrowarray();			
			$mapped_bookids = $row["book_id"];
			return $mapped_bookids;
	}
	
	function getMaxAllotedCount($school,$year,$class,$subject,$gap_exception,$connid)
	{
		$sci_classes_for_8papers = array(3,4,5);
		$sci_classes_gap_exceptions = array(6,7,8,9,10);
		
		$maxallowed_test = 0;
		if($subject==1){ $maxallowed_test = 8; }				
		if($subject==2){ $maxallowed_test = 8; }
		if($subject==3){
		
			if(in_array($class,$sci_classes_for_8papers))
			{
				$maxallowed_test = 8;
			}
			else
			{
				$mapped_bookids = "";
				$mapped_bookidcount = 0;						
				
				$mapped_bookids = $this->getCountMappedBooks($school,$year,$class,$subject,$connid);
				$mapped_bookidcount = count(explode(",",$mapped_bookids));
				
				if($mapped_bookidcount < 3){
					$maxallowed_test = 8;							
				}	
				else if($mapped_bookidcount >= 3){
					$maxallowed_test = 12;							
				}						
				
				if(in_array($class,$sci_classes_gap_exceptions) && $gap_exception == '1'){
					$maxallowed_test = 12;							
				}
			}
		}
		
		$term = "Full";
		$query = "SELECT term FROM da_orderMaster where schoolCode = '$school' AND year = '$year'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
			{
				if($row["term"]=="Half")
				{
					$term = "Half";
				}
			}
		
		if($term=="Half")
		{
			$maxallowed_test = ($maxallowed_test/2);
		}
			
		return $maxallowed_test;
	}	
	
	#####################################School Performance##################################
	function classSubjectSchoolPerformance($connid,$school,$board)
	{
		$condition = "";
		if($school!="")
		{
			$condition .= "AND b.schoolCode = '".$school."'";
		}		
		$arrRet = array();	
	    $query = "select a.class,a.e,a.m,a.s,b.schoolCode from da_orderBreakup a inner join da_orderMaster b on a.order_id = b.order_id where b.year = '".$this->year."' $condition order by a.class";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$checker = 1;
			if($board!="")
			{				
			//	$board_set = $this->checkBoard($row["schoolCode"],$connid);
				$board_set = $this->checkBoard($row["schoolCode"],$this->year,$connid);
				if($board_set != $board)
				{
					$checker = 0;
				}
				
			}
			if($checker == 1)
			{
				$arrRet[$row['class']]["class"] = $row['class'];
				$arrRet[$row['class']]["e"] =  $row['e'];
				$arrRet[$row['class']]["m"] =  $row['m'];
				$arrRet[$row['class']]["s"] =  $row['s'];
			}	
		}
		return $arrRet;
	}
	
	function classSectionSchoolPerformance($connid,$subject,$class,$school,$board)
	{
		$arrRet = array();
		$setSectionArray = array();
		foreach($subject as $row_subject)
		{
			foreach($class as $row_class)
			{
				$condition = "";
				if($school!="")
				{
					 $condition = "AND t.schoolCode = '".$school."'"; 
				}		
				else 
				{
					if($board!="")
					{
						$school_list = "";
						$arrSchoolCodeSet = array();
						$query = "SELECT schoolno FROM schools a INNER JOIN da_orderMaster b WHERE a.schoolno = b.schoolCode AND b.year = '".$this->year."' AND b.board = '$board'";
						$dbquery = new dbquery($query,$connid);
						while($row = $dbquery->getrowarray())
						{
							$arrSchoolCodeSet[$row["schoolno"]] = $row["schoolno"];
						}
						$school_list = implode(",",$arrSchoolCodeSet);
						if($school_list!="")
						{
							$condition = "AND t.schoolCode IN ($school_list)"; 
						}
					}
				}
						
				$query = "SELECT e.section,t.class,t.subject,t.schoolCode FROM da_examDetails e inner join da_testRequest t on t.id = e.request_id where 
						  t.type = 'actual' AND  t.class = '".$row_class."' AND t.subject = '".$row_subject."' AND t.year = '".$this->year."' AND e.report_status = 'generated' $condition GROUP BY e.section ORDER BY e.section"; 
				$dbquery = new dbquery($query,$connid);
				while($row = $dbquery->getrowarray())
				{	
					/*$checker = 1;
					if($board!="")
					{		
						echo $board;		
						echo $board_set = $this->checkBoard($row["schoolCode"],$connid);
						if($board_set != $board)
						{
							$checker = 0;
						}
						
					}
					if($checker == 1)
					{								
						if(!in_array($row,$setSectionArray[$row['subject']]))
						{*/
							$setSectionArray[$row['subject']][$row['section']] = $row['section'];
						/*} 
					}	*/
				}
			}
		}
		return $setSectionArray;
	}
		
	function checkBoard($schoolCode,$year,$connid)
	{
		$board = "";
		//$query = "SELECT board FROM schools WHERE schoolno = '$schoolCode'";
		$query = "SELECT board FROM da_orderMaster WHERE schoolCode = '$schoolCode' AND year ='".$year."'";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$board = $row["board"];
		}		
		return $board;			
	}
	
	#####################################School Performance##################################
        
        function updateReportConfiguration($schoolcode,$config,$connid){
            $currentUser  = $_SESSION["username"];                
            $query = "SELECT order_id,schoolCode,year FROM da_orderMaster WHERE schoolCode = '$schoolcode' AND year ='".$this->year."' ORDER by order_id LIMIT 1";            
            $dbquery = new dbquery($query,$connid);
            $orderId = null;
            $respDAMaster = false;
            while($row = $dbquery->getrowarray()){
                $orderId = $row["order_id"];
            }       
            error_log($orderId);
            if($orderId != null){                
                foreach($config as $class => $data){
                    $toCompare = 0;
                    if(isset($data['is_compare_report_set']) && $data['is_compare_report_set'] === 'on'){
                        $toCompare = 1;
                    }                    
                                       
                    $updateQuery  = "UPDATE da_orderBreakup SET e_score_outof = $data[max_score], m_score_outof = $data[max_score], "
                            . " s_score_outof = $data[max_score], modified_by = '$currentUser', is_compare_report_set = $toCompare"
                            . " WHERE order_id = '$orderId' AND class= '$class'";
                    $respDABreakUp = $dbquery = new dbquery($updateQuery,$connid);
                }
                $showHideConfigValue = isset($_POST['show_hide_config']) ? ($_POST['show_hide_config'] == 'on') ? 1 : 0 : 0;
                $mailReport = isset($_POST['mail_report']) ? ($_POST['mail_report'] == 'on') ? "'1'" : "'0'" : "'0'";
				$viewdrop_ques = isset($_POST['viewdrop_ques']) ? ($_POST['viewdrop_ques'] == 'on') ? "'1'" : "'0'" : "'0'";
                
				if(!empty($orderId)){
                    $updateQuery = "UPDATE da_orderMaster SET showhide_tests = $showHideConfigValue, mail_report = $mailReport,viewdrop_ques =$viewdrop_ques WHERE order_id = '$orderId'";
                    $respDAMaster = $dbquery = new dbquery($updateQuery,$connid);                    
                    error_log($updateQuery);
                }
                return $respDABreakUp->sqlresult && $respDAMaster->sqlresult;
            }
        }
        function getReportConfiguration($schoolcode, $year,$connid){
            $query = " SELECT class,  e_score_outof as common_score,is_compare_report_set, V2.mail_report, V2.showhide_tests ,V2.viewdrop_ques FROM da_orderBreakup".
                    "  INNER JOIN (SELECT order_id, showhide_tests, mail_report,viewdrop_ques FROM da_orderMaster WHERE schoolCode = '$schoolcode' AND year = '$year' ORDER by order_id LIMIT 1) AS V2"
                    . " ON da_orderBreakup.order_id = V2.order_id".
                    "  GROUP BY class";
            $dbquery = new dbquery($query,$connid);
            error_log($query);
            $config = array('report_config' => array(), 'showhide_tests' => false,'mail_report' => false,'viewdrop_ques' =>false);            
            while($row = $dbquery->getrowassocarray()){
                array_push($config['report_config'],$row);
                $config['showhide_tests'] = $row['showhide_tests'];
                $config['mail_report'] = $row['mail_report'];
				$config['viewdrop_ques'] = $row['viewdrop_ques'];
            }
            return $config;
        }                      
}
