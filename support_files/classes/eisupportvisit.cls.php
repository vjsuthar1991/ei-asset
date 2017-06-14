<?php
class clseisupportvisit
{

	var $connid;
	var $year;
	var $monthYear;
	var $month;
	var $login_user;
	var $schoolcode;
	var $action;
	var $visitTypes;
	var $visitId;
	var $superUserArr;
	var $supportID;
	var $statusArr;
	var $visitUpdateDate;
	var $visit_changeReason;
	var $userCategory;
	var $supportvisit_ccemails;
	var $statusidArr;
	var $callingFunc;
	var $visit_deleteReason;

	function clseisupportvisit($connid ="")
	{
		$this->connid = $connid; // Connection
		$this->year = "";
		$this->monthYear= "";
		$this->login_user ="";
		$this->month ="";
		$this->action = "";
		$this->schoolcode = 0;
		$this->visitTypes = array(1=>"Orientation",2=>"MYR",3=>"EYR");
		$this->statusArr = array("Requested","Confirmed","Completed");
		$this->statusidArr = array(0=>"Requested",1=>"Confirmed",2=>"Completed");
		$this->visitId=0;
		$this->superUserArr =array("urvi.shah","sudhir.prajapati","naveen.kumar","rahul.venuraj","shaji.chacko");
		$this->supportID ="";
		$this->visitUpdateDate="";
		$this->visit_changeReason ="";
		$this->userCategory ="";
		$this->supportvisit_ccemails = "sanatan.panchal@ei-india.com,dharti.thaker@ei-india.com,urvi.shah@ei-india.com,shaji.chacko@ei-india.com";
		$this->callingFunc ="";
		$this->visit_deleteReason ="";
	}

	function setpostvars()
	{

		if(isset($_POST["clsdascheduler_year"])) $this->year = $_POST["clsdascheduler_year"];
		if(isset($_POST["monthYear"])) $this->monthYear = $_POST["monthYear"];
		if(isset($_POST["clsdascheduler_zone"])) $this->zone = $_POST["clsdascheduler_zone"];

		if(isset($_POST["username"])) $this->login_user = $_POST["username"];
		
		if(isset($_POST["submit_action"])) $this->action = $_POST["submit_action"];
		if(isset($_POST["schools"])) $this->schoolcode = $_POST["schools"];
		if(isset($_POST["confirmDeleteId"])) $this->visitId = $_POST["confirmDeleteId"];

		if(isset($_POST["visitUpdateDate"])) $this->visitUpdateDate = $_POST["visitUpdateDate"];
		if(isset($_POST["visit_changeReason"])) $this->visit_changeReason =$_POST["visit_changeReason"];
		if(isset($_POST["visit_schoolCode"])) $this->schoolCode =$_POST["visit_schoolCode"];
		if(isset($_POST["edit_zone"])) $this->zone = $_POST["edit_zone"];

		if(isset($_POST["visit_deleteReason"])) $this->visit_deleteReason = $_POST["visit_deleteReason"];
	}

	function setgetvars()
	{
		if(isset($_GET["supportID"])) $this->supportID	= $_GET["supportID"];
		if(isset($_GET["edit_zone"])) $this->zone = $_GET["edit_zone"];
		if(isset($_GET["callingFunc"])) $this->callingFunc = $_GET["callingFunc"];
	}
	
	function getSchools() {
		$this->setgetvars();
		$this->setpostvars();

		if($this->action=="getSchools" || $this->action=="selSchool" || $this->action=="selMonth" || $this->action=="bookVisit" || $this->action=="delVisit" || $this->action=="complVisit") {

			$userCategory = $_SESSION["loginUser_category"];
			$userName = $_SESSION["username"];
			$schools = array();
			$schoolCodeArr =array();

			if($userCategory == "RM")
			{	
				$school_query = "SELECT distinct sales_allotment_master.schoolCode FROM sales_allotment_master, da_orderMaster 
								WHERE da_orderMaster.schoolCode = sales_allotment_master.schoolCode AND da_orderMaster.year = $this->year
								 AND keyAccount ='".addslashes($userName)."' ";
				$school_dbquery = new dbquery($school_query,$this->connid);
				
				while($school_row = $school_dbquery->getrowarray())
				{
					$schoolCodeArr []=$school_row["schoolCode"];
				}
			}
			
			$query =   "SELECT schoolCode as schoolCode, schoolname, 'DA' as product,sum(da_orderBreakup.total_students) as sum 
						FROM da_orderMaster,schools, da_orderBreakup 
						WHERE da_orderMaster.order_id=da_orderBreakup.order_id AND year=$this->year 
						AND da_orderMaster.schoolCode=schools.schoolno 
						AND schools.region ='".$this->zone."' 
						group by da_orderBreakup.order_id 
						UNION 
						SELECT schoolCode as schoolCode, schoolname, 'MS' as product,sum(ms_studentBreakup.no_of_students) as sum 
						FROM ms_orderMaster,schools, ms_studentBreakup 
						WHERE ms_orderMaster.order_id=ms_studentBreakup.order_id AND year=$this->year 
						AND ms_orderMaster.schoolCode=schools.schoolno 
						AND schools.region ='".$this->zone."'
						group by ms_studentBreakup.order_id 
						UNION
						SELECT school_code, schoolname, 'ASSET' as product, no_of_students as sum 
						FROM school_status, test_edition_details, schools 
						WHERE SUBSTRING(TRIM(test_edition_details.description),-4)='$this->year' 
						AND school_status.test_edition=test_edition_details.test_edition 
						AND school_status.school_code=schools.schoolno
						AND schools.region ='".$this->zone."'
						";		
			//echo "$query <br/>";
			
			$result = new dbquery($query,$this->connid);
			while($row = $result->getrowarray()){

				if($userCategory == "RM")
				{
					if(in_array($row["schoolCode"],$schoolCodeArr))
					{
						$schools[$row['schoolCode']][$row['product']] = 1;
						$schools[$row['schoolCode']]['name'] = $row['schoolname'];
						$schools[$row['schoolCode']][$row['product'].'_sum'] = $row['sum'];
					}	
				}
				else
				{
					$schools[$row['schoolCode']][$row['product']] = 1;
					$schools[$row['schoolCode']]['name'] = $row['schoolname'];
					$schools[$row['schoolCode']][$row['product'].'_sum'] = $row['sum'];
				}	
			}
			/*echo "<pre>";
			print_r($schools);
			echo "</pre>";*/
			return $schools;
		}
	}
	
	function showStartEndDate($schools){
		$this->setgetvars();
		$this->setpostvars();
		$dates = array();
		if(isset($schools[$this->schoolcode]['DA'])) {
			$query = "SELECT start_date, end_date, exam_mode,registration_date FROM da_orderMaster WHERE schoolCode=$this->schoolcode AND year=$this->year";                        			
                        $result = new dbquery($query,$this->connid);
			$row = $result->getrowarray();
			$dates['DA']['start']=$row['start_date'];
			$dates['DA']['end']=$row['end_date'];
			$dates["DA"]["mode"]=$row["exam_mode"];
			$dates["DA"]["order_entry_date"]=$row["registration_date"];
		}
		if(isset($schools[$this->schoolcode]['MS'])) {
			$query = "SELECT start_date, end_date, ssf_date FROM ms_orderMaster WHERE schoolCode=$this->schoolcode AND year=$this->year";
			$result = new dbquery($query,$this->connid);
			$row = $result->getrowarray();
			$dates['MS']['start']=$row['start_date'];
			$dates['MS']['end']=$row['end_date'];
			$dates['MS']['order_entry_date']=$row['ssf_date'];
		}
		if(isset($schools[$this->schoolcode]['ASSET'])) {
			$query = "SELECT LEFT(trim(description),6) as round 
			from school_status, test_edition_details 
					WHERE school_code=$this->schoolcode 
					AND school_status.test_edition=test_edition_details.test_edition
					AND description like '%$this->year%'";
			$result = new dbquery($query,$this->connid);
			//$row = $result->getrowarray();
			while($row = $result->getrowarray()){
				$dates['ASSET'][$row['round']]=1;
			}
		}
		/*echo "<pre>";
		print_r($dates);
		echo "<pre>";*/
		return $dates;
	}
	
	function getMonthYear($dates){
		$this->setgetvars();
		$this->setpostvars();
		$minMonth=0; $minYear=0; $maxMonth=0; $maxYear=0;
		$finalMonths=array();
		if(isset($dates['DA']) && $dates['DA']['start']!='0000-00-00' && $dates['DA']['end']!='0000-00-00') {
			$min = new DateTime($dates['DA']['start']);
			$minMonth = $min->format('n');
			$minYear = $min->format('Y');
			$max = new DateTime($dates['DA']['end']);
			$maxMonth = $max->format('n');
			$maxYear = $max->format('Y');
		}
		if(isset($dates['MS']) && $dates['MS']['start']!='0000-00-00' && $dates['MS']['end']!='0000-00-00') {
			$min = new DateTime($dates['MS']['start']);
			if($minYear>0 && $minMonth>0) {
				if($min->format('Y')<$minYear || ($min->format('Y')==$minYear && $min->format('n')<$minMonth)) {
					$minMonth = $min->format('n');
					$minYear = $min->format('Y');
				}
			} else {
				$minMonth = $min->format('n');
				$minYear = $min->format('Y');
			}
			$max = new DateTime($dates['MS']['end']);
			if($maxYear>0 && $maxMonth>0) {
				if($max->format('Y')>$maxYear || ($max->format('Y')==$maxYear && $max->format('n')>$maxMonth)) {
					$maxMonth = $max->format('n');
					$maxYear = $max->format('Y');
				}
			} else {
				$maxMonth = $max->format('n');
				$maxYear = $max->format('Y');
			}
		}
		if(isset($dates['ASSET'])) {
			$assetmin=$this->year.'-04-01';
			$min = new DateTime($assetmin);
			if($minYear>0 && $minMonth>0) {
				if($min->format('Y')<$minYear || ($min->format('Y')==$minYear && $min->format('n')<$minMonth)) {
					$minMonth = $min->format('n');
					$minYear = $min->format('Y');
				}
			} else {
				$minMonth = $min->format('n');
				$minYear = $min->format('Y');
			}
			$assetyr=$this->year+1;
			$assetmax=$assetyr.'-03-31';
			$max = new DateTime($assetmax);
			if($maxYear>0 && $maxMonth>0) {
				if($max->format('Y')>$maxYear || ($max->format('Y')==$maxYear && $max->format('n')>$maxMonth)) {
					$maxMonth = $max->format('n');
					$maxYear = $max->format('Y');
				}
			} else {
				$maxMonth = $max->format('n');
				$maxYear = $max->format('Y');
			}
		}
		for($i=$minYear;$i<=$maxYear && $i!=0;$i++) {
		
			if($i==$minYear) $minMon=$minMonth;
			else $minMon=1;
			if($i==$maxYear) $maxMon=$maxMonth;
			else $maxMon=12;
			
			for($j=$minMon;$j<=$maxMon;$j++) {
				$monthName = date("F", mktime(0, 0, 0, $j, 10));
				$finalMonths[] = $monthName." ".$i;
			}
			
		}
		return $finalMonths;
	}
	
	function getBookedVisitDates() {

		$this->setgetvars();
		$this->setpostvars();
		
		if($this->action=="selMonth" || $this->action=="bookVisit"  || $this->action=="delVisit" || $this->action=="complVisit") {

			$bookedDates = array();
			$monYear=explode(" ",$this->monthYear);
			$monYear[0] = date('n', strtotime($monYear[0]));
			$month=$monYear[0];
			$year=$monYear[1];
			$query="SELECT id, DAY(visit_dt) as day, visit_dt, da_visit, da_visit_type, ms_visit, ms_visit_type, asset_visit, schoolCode, schoolname, requested_by, request_dt, status, updated_by, updated_dt, 
					 if(status=0,1,0) as del, if(status=1,1,0) as compl , ei_supportVisit.reason, ei_supportVisit.prev_visitDate
					 FROM ei_supportVisit, schools
					 WHERE MONTH(visit_dt)= '".$month."' 
					 AND YEAR(visit_dt)= '".$year."'
					 AND schools.region = '".$this->zone."'
					 AND ei_supportVisit.schoolCode=schools.schoolno
					 ORDER BY visit_dt";
			$result = new dbquery($query,$this->connid);
			while($row = $result->getrowarray()){
				
				$bookedDates[$row['day']][$row['schoolCode']]['id']=$row['id'];
				$bookedDates[$row['day']][$row['schoolCode']]['schoolname']=$row['schoolname'];
				$bookedDates[$row['day']][$row['schoolCode']]['da_visit']=$row['da_visit'];
				$bookedDates[$row['day']][$row['schoolCode']]['da_visit_type']=$row['da_visit_type'];
				$bookedDates[$row['day']][$row['schoolCode']]['ms_visit']=$row['ms_visit'];
				$bookedDates[$row['day']][$row['schoolCode']]['ms_visit_type']=$row['ms_visit_type'];
				$bookedDates[$row['day']][$row['schoolCode']]['asset_visit']=$row['asset_visit'];
				$bookedDates[$row['day']][$row['schoolCode']]['visit_dt']=$row['visit_dt'];
				$bookedDates[$row['day']][$row['schoolCode']]['requested_by']=$row['requested_by'];
				$bookedDates[$row['day']][$row['schoolCode']]['request_dt']=$row['request_dt'];
				$bookedDates[$row['day']][$row['schoolCode']]['status']=$row['status'];
				$bookedDates[$row['day']][$row['schoolCode']]['updated_by']=$row['updated_by'];
				$bookedDates[$row['day']][$row['schoolCode']]['updated_dt']=$row['updated_dt'];
				$bookedDates[$row['day']][$row['schoolCode']]['del']=$row['del'];
				$bookedDates[$row['day']][$row['schoolCode']]['compl']=$row['compl'];
				$bookedDates[$row['day']][$row['schoolCode']]['prev_visitDate']=$row['prev_visitDate'];
				$bookedDates[$row['day']][$row['schoolCode']]['reason']=$row['reason'];
			}
			return $bookedDates;
		}
		
		if($this->action == "export_data"){
			
			
			$bookedDates = array();
			$monYear=explode(" ",$this->monthYear);
			$monYear[0] = date('n', strtotime($monYear[0]));
			$month=$monYear[0];
			$year=$monYear[1];
			
			$xlsheader = array("School Code","School Name","Visit Date","DA Visit","DA Visit Type","MS Visit","MS Visit Type","ASSET Visit","Added By","Added Date","Status","Updated By","Updated Date","Reason","Previous Visit Date");
			$xlsfilename = $this->zone;
			$objPHPExcel = new PHPExcel();
			
			// Set document properties                                                                                                                                                                                                                               
			$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
										 ->setLastModifiedBy("Maarten Balliauw")
										 ->setTitle("Support Visit")
										 ->setSubject("Support Visit")
										 ->setDescription("Support Visit Details")
										 ->setKeywords("office 2007 openxml php")
										 ->setCategory("Support Visit");
			
			$query="SELECT ei_supportVisit.schoolCode,schools.schoolname,ei_supportVisit.visit_dt, if(ei_supportVisit.da_visit =1,'YES','NO') as da_visit, ei_supportVisit.da_visit_type,
						   IF(ei_supportVisit.ms_visit =1,'YES','NO') as ms_visit,ei_supportVisit.ms_visit_type,IF(ei_supportVisit.asset_visit = 1,'YES','NO'),
						   ei_supportVisit.requested_by,ei_supportVisit.request_dt,
						   ei_supportVisit.status,ei_supportVisit.updated_by,ei_supportVisit.updated_dt, 
					 	   ei_supportVisit.reason,ei_supportVisit.prev_visitDate
					 FROM ei_supportVisit, schools
					 WHERE MONTH(visit_dt)= '".$month."' 
					 AND YEAR(visit_dt)= '".$year."'
					 AND schools.region = '".$this->zone."'
					 AND ei_supportVisit.schoolCode = schools.schoolno
					 ORDER BY visit_dt";
			$result = new dbquery($query,$this->connid);
			
			$row = 1; // 1-based index
			$col = 0;
			foreach($xlsheader as $key => $value){
		        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
		        $col++;
			}
			$objPHPExcel->getActiveSheet()->getStyle('A1:O1')->getFont()->setBold(true);
			$row++;
			
			while($row_data = $result->getrowassocarray()){
			    $col = 0;
			    foreach($row_data as $key=>$value) {
			    	if($col == 10) $value = isset($this->statusidArr[$value])?$this->statusidArr[$value]:"";
			    	if($col == 4 || $col == 6){
			    		$VisitTypes = "";
			    		if($value != ''){
				    		$typesOfVisits = explode(",",$value);
							foreach($typesOfVisits as $rowval) {
								$VisitTypes .= $this->visitTypes[$rowval].",";
							}
							$VisitTypes = rtrim($VisitTypes,",");
			    		}
						$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $VisitTypes);
			    	}else {
			    		$objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow($col, $row, $value);
			    	}
			        $col++;
			    }
			    $row++;
			}
			$objPHPExcel->getActiveSheet()->setTitle($xlsfilename);
			$objPHPExcel->setActiveSheetIndex(0);
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename="'.$xlsfilename.'.xlsx"');
			header('Cache-Control: max-age=0');
			$objWriter->save('php://output');
			exit;
		}
	}
	
	function bookVisit() {
		$this->setgetvars();
		$this->setpostvars();
		if($this->action=="bookVisit") {
			$daCond="";$msCond="";$assetCond="";
			if(isset($_POST['DAchk'])) {
				if(isset($_POST['DA_orChk'])) $daCond.="1";
				if(isset($_POST['DA_myrChk'])) {
					if(isset($_POST['DA_orChk'])) $daCond.=",2";
					else $daCond.="2";
				}
				if(isset($_POST['DA_eyrChk'])) {
					if(isset($_POST['DA_orChk']) || isset($_POST['DA_myrChk'])) $daCond.=",3";
					else $daCond.="3";
				}
			}
			if($daCond!="") $daCond=" da_visit=1, da_visit_type='$daCond',";
			if(isset($_POST['MSchk'])) {
				if(isset($_POST['MS_orChk'])) $msCond.="1";
				if(isset($_POST['MS_myrChk'])) {
					if(isset($_POST['MS_orChk'])) $msCond.=",2";
					else $msCond.="2";
				}
				if(isset($_POST['MS_eyrChk'])) {
					if(isset($_POST['MS_orChk']) || isset($_POST['MS_myrChk'])) $msCond.=",3";
					else $msCond.="3";
				}
			}
			if($msCond!="") $msCond=" ms_visit=1, ms_visit_type='$msCond',";
			if(isset($_POST['ASSETchk'])) {
				$assetCond="1";
			}

			if($assetCond!="") $assetCond=" asset_visit=1,";
			
			$query = "INSERT INTO ei_supportVisit
					  SET $daCond $msCond $assetCond schoolCode=$this->schoolcode, status=0, year=$this->year, 
					  visit_dt='".$_POST['date']."', request_dt=NOW(), requested_by='".$_SESSION['username']."'";
			$result = new dbquery($query,$this->connid);
			
			$this->sendBookingEmail(1,$result->insertid);
		} else if($this->action=="delVisit") {
			
			$this->sendBookingEmail(2,$this->visitId);
			$query = "DELETE FROM ei_supportVisit WHERE id=$this->visitId";
			$result = new dbquery($query,$this->connid);
			
		} else if($this->action=="complVisit") {
			$query = "UPDATE ei_supportVisit SET status=2 WHERE id=$this->visitId";
			$result = new dbquery($query,$this->connid);
			$this->sendBookingEmail(3,$this->visitId);
		}
	}
	
	function getConfirmedVisits() {
		if($this->action=="selMonth" || $this->action=="bookVisit" || $this->action=="delVisit" || $this->action=="complVisit") {
			$confirmedVisits=array();
			$query = "SELECT schoolCode,if(locate('1',ms_visit_type),1,0) ms1, 
					  if(locate('2',ms_visit_type),1,0) ms2, 
					  if(locate('3',ms_visit_type),1,0) ms3, 
					  if(locate('1',da_visit_type),1,0) da1, 
					  if(locate('2',da_visit_type),1,0) da2, 
					  if(locate('3',da_visit_type),1,0) da3, 
					  asset_visit 
					  FROM ei_supportVisit 
					  WHERE schoolCode=$this->schoolcode and year=$this->year and status=1 or status=2";
			$result = new dbquery($query,$this->connid);
			while($row = $result->getrowarray()){
				if(!isset($confirmedVisits['da1']) || $confirmedVisits['da1']==0) $confirmedVisits['da1']=$row['da1'];
				if(!isset($confirmedVisits['da2']) || $confirmedVisits['da2']==0) $confirmedVisits['da2']=$row['da2'];
				if(!isset($confirmedVisits['da3']) || $confirmedVisits['da3']==0) $confirmedVisits['da3']=$row['da3'];
				if(!isset($confirmedVisits['ms1']) || $confirmedVisits['ms1']==0) $confirmedVisits['ms1']=$row['ms1'];
				if(!isset($confirmedVisits['ms2']) || $confirmedVisits['ms2']==0) $confirmedVisits['ms2']=$row['ms2'];
				if(!isset($confirmedVisits['ms3']) || $confirmedVisits['ms3']==0) $confirmedVisits['ms3']=$row['ms3'];
				if(!isset($confirmedVisits['asset_visit']) || $confirmedVisits['asset_visit']==0) $confirmedVisits['asset_visit']=$row['asset_visit'];
				if($confirmedVisits['da1']!=0 && $confirmedVisits['da2']!=0 && $confirmedVisits['da3']!=0) $confirmedVisits['da']=1;
				if($confirmedVisits['ms1']!=0 && $confirmedVisits['ms2']!=0 && $confirmedVisits['ms3']!=0) $confirmedVisits['ms']=1;
				if($confirmedVisits['asset_visit']!=0) $confirmedVisits['av']=1;
			}
			return $confirmedVisits;
		}
	}

	function getZonesUser()
	{
		$zoneArr =array();

		if(in_array($_SESSION["username"],$this->superUserArr))
		{
			$query ="SELECT distinct region from marketing ";
		}
		else
			$query = "SELECT region from marketing where name ='".addslashes($_SESSION["username"])."' ";

		$dbquery =new dbquery($query,$this->connid);
		while($row = $dbquery->getrowarray())
		{
			if($row["region"] != "" )
			{
				$zoneCur = explode(",",$row["region"]);

				if(count($zoneCur) > 0)
					$zoneArr= array_merge($zoneArr,$zoneCur);
			}	
		}

		$zoneArr = array_unique($zoneArr);

		return $zoneArr;
	}

	function displayVisit()
	{
		$this->setgetvars();
		$this->setpostvars();

		$visitValueArr =array();
		$support_visit_str = "";

		if($this->action =="deleteVisit")
		{
			$this->deleteVisit();
			return ;
		}

		if($this->supportID != "")
		{
			$query="SELECT id, DAY(visit_dt) as day, date_format(visit_dt,'%d-%m-%Y') visit_dt, da_visit, da_visit_type, ms_visit, ms_visit_type, asset_visit,
						 schoolCode, schoolname, requested_by, date_format(request_dt,'%d-%m-%Y') request_dt, status, updated_by,
						 date_format(updated_dt,'%d-%m-%Y') updated_dt , date_format(prev_visitDate,'%d-%m-%Y') prev_visitDate
						 FROM ei_supportVisit, schools
						 WHERE  ei_supportVisit.schoolCode=schools.schoolno AND ei_supportVisit.id =".$this->supportID." ";
			$result = new dbquery($query,$this->connid);
			while($row = $result->getrowarray()){
				
				if($row["da_visit"] ==1 )
				{
					$support_visit_str .="DA"." - ". $this->visitTypes[$row["da_visit_type"]];
				}	
				if($row["ms_visit"] ==1)
				{
						$support_visit_str .="<br/> MS"." - ". $this->visitTypes[$row["ms_visit_type"]];
				}		
				if($row["asset_visit"] ==1)
					$support_visit_str .="<br/> ASSET - Post ASSET";

				$visitValueArr = array("supportID"=> $row["id"], "schoolname"=> $row["schoolname"],
									"schoolCode"=>$row["schoolCode"],
									"visit_date"=>$row["visit_dt"],"status"=>$this->statusArr[$row["status"]],
									"requested_by"=>$row["requested_by"],
									"requested_date"=>$row["request_dt"],
									"updated_by"=>$row["updated_by"],
									"updated_date"=>$row["updated_dt"],
									"support_str"=>$support_visit_str,
									"prev_visitDate"=>$row["prev_visitDate"]
									);
			}

			if($this->action =="updateVisit")
			{
				$this->updateSupportVisit($visitValueArr);
			}

		}
		return $visitValueArr;
	}

	function updateSupportVisit($visitArr)
	{
		if($this->supportID =="") return;

		// check if a visit for same date has been planned 
		$visit_dt = date("Y-m-d",strtotime($this->visitUpdateDate));

		$check_query ="SELECT id FROM ei_supportVisit WHERE schoolCode ='".$this->schoolCode."' AND visit_dt ='".$visit_dt."' ";
		$check_dbqry = new dbquery($check_query,$this->connid);

		if($check_dbqry->numrows() == 0)
		{
			$visit_changeReason = "<br>".trim(addslashes($this->visit_changeReason))."(".$_SESSION["username"]." - ".date("d-m-Y").")";		
			
			$upd_query = "UPDATE ei_supportVisit SET prev_visitDate = visit_dt, visit_dt ='".$visit_dt."', 
								 updated_by ='".addslashes($_SESSION["username"])."', reason = concat(IFNULL(reason,''),'".$visit_changeReason."')
						  WHERE id ='".$this->supportID."' ";
			$upd_dbqry = new dbquery($upd_query,$this->connid);

			$subject ="EI - Support Visit Date change";
			$body ="";

			$body .="<br/> Support visit Details<br/><br/>";

			$body .="<table border='1' style='border-collapse:collapse;border-color:#000000;font-size:10pt;' align='left' width='90%'>
						<tr bgcolor='#DDDDDD'>
						<td><b>School Code</b></td>
						<td><b>School Name</b></td>
						<td><b>Region</b></td>
						<td><b>Visit date</b></td>
						<td><b>Status</b></td>
						<td><b>Support Type</b></td>
						<td><b>Requested By</b></td>
						<td><b>Requested Date</b></td>
						<td><b>Updated By</b></td>
						<td><b>Updated Date</b></td>
						<td><b>Previous Date</b></td>
						<td><b>Change Reason</b></td>
						</tr>";
			$body .= "<tr style='text-indent:3px;'>
						<td style='width:7%;'>".$visitArr["schoolCode"]."</b></td>
						<td>".$visitArr["schoolname"]."</b></td>
						<td style='width:7%;'>".$this->zone."</td>
						<td style='width:6%;'>".$visitArr["visit_date"]."</td>
						<td style='width:7%;'>".$visitArr["status"]."</td>
						<td>".$visitArr["support_str"]."</td>
						<td>".$visitArr["requested_by"]."</td>
						<td style='width:6%;'>".$visitArr["requested_date"]."</td>
						<td >".$visitArr["updated_by"]."</td>
						<td style='width:6%;'>".$visitArr["updated_date"]."</td>
						<td style='width:6%;'>".$visitArr["prev_visitDate"]."</td>
						<td>".$visit_changeReason."</td>
					 </tr>";
			$body .="</table><br/>";

			$this->sendVisitMail($this->schoolCode,$subject,$body);
		}
	}

	function sendVisitMail($schoolCode,$subject,$body)
	{
		$email_str ="";
		$salesRM_arr = array();
		$ZM_array = array();
		$asm_arr = array();

		$headers = "";
	      if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}
		
		$body=wordwrap($body,70,$eol);

		$headers = 'From: Educational Initiatives <system@ei-india.com>'.$eol;
		$headers .= "Bcc:sudhir.prajapati@ei-india.com".$eol;
		$headers .= "Reply-To: <system@ei-india.com>".$eol;
		$headers .= "Cc: ".$this->supportvisit_ccemails.$eol;
		$headers .= "MIME-Version: 1.0 $eol";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

		# RM & ASM
		$sales_query = "SELECT keyAccount,ps FROM sales_allotment_master WHERE schoolCode = '".$schoolCode."' ";
		$sales_dbqry = new dbquery ($sales_query, $this->connid);
		while($sales_row = $sales_dbqry->getrowarray()){
			if($sales_row["keyAccount"] != "")
				$salesRM_arr[] = $sales_row["keyAccount"];
			if($sales_row["ps"] != "")	
				$asm_arr[] = $sales_row["ps"];
		}
		
		$salesRM_arr = array_unique($salesRM_arr);
		$asm_arr = array_unique($asm_arr);

		# ZM	
		$email_query = "SELECT name FROM marketing WHERE CONCAT(',',region,',') LIKE '%,".$this->zone.",%' 
						AND category IN ('ZM','SUMA')";
		$email_dbqry = new dbquery($email_query,$this->connid);
		while($row = $email_dbqry->getrowarray()){
			$ZM_array[] = $row["name"];
		}
		
		$ZM_array = array_unique($ZM_array);
		
		$toNames = array_merge($salesRM_arr,$asm_arr);
		$toNames = array_merge($toNames,$ZM_array);
		
		$names = implode("','",$toNames);
		# collecting emails
		$toEmails = "";
		$query2 = "SELECT email FROM marketing WHERE name IN('".$names."','".$_SESSION["username"]."')";
		$dbqry2 = new dbquery($query2,$this->connid);
		while($result2 = $dbqry2->getrowarray()){
			if($result2["email"] != "")
				$toEmails .= $result2["email"].",";
		}
		
		$toEmails = ltrim($toEmails,",");
		if($toEmails != ""){
			mail($toEmails, $subject, $body, $headers);
		}
	}

	function sendBookingEmail($mailType, $visitId, $delete_reason="")
	{
		$subject ="";

		$query ="SELECT id, date_format(visit_dt,'%d-%m-%Y') visit_dt, da_visit, da_visit_type, ms_visit, ms_visit_type, asset_visit,
						 schoolCode, schoolname, requested_by, date_format(request_dt,'%d-%m-%Y') request_dt, status, updated_by,
						 date_format(updated_dt,'%d-%m-%Y') updated_dt , date_format(prev_visitDate,'%d-%m-%Y') prev_visitDate, region
						 FROM ei_supportVisit, schools
						 WHERE  ei_supportVisit.schoolCode=schools.schoolno AND ei_supportVisit.id =".$visitId." ";
		$result = new dbquery($query,$this->connid);
		while($row = $result->getrowarray())
		{
			if($row["da_visit"] ==1 )
			{
				$support_visit_str ="DA"." - ". $this->visitTypes[$row["da_visit_type"]];
			}	
			else if($row["ms_visit"] ==1)
			{
					$support_visit_str ="MS"." - ". $this->visitTypes[$row["ms_visit_type"]];
			}		
			else if($row["asset_visit"] ==1)
				$support_visit_str ="ASSET - Post ASSET";

			$schoolCode = $row["schoolCode"];
			$schoolName = $row["schoolname"];
			$zone = $row["region"];
			$visit_dt = $row["visit_dt"];
			$request_by = $row["requested_by"];
			$request_date = $row["request_dt"];
			$updated_by =$row["updated_by"];
			$updated_date =$row["updated_dt"];

		}	
		$body = "<style>
	            BODY {
	              font-family: verdana,sans-serif;
	              font-size: 12;
	            }
	            TD {
	              font-family: verdana, sans-serif;
	              font-size: 12;
	            }
	            .header{
	              font-weight:bold;
	            }
	        </style>";
		$body .= "<body><head></head><html>";
		$content_default =$body."<br/><table border='1' style='border-collapse:collapse;border-color:#000000;font-size:10pt;text-indent:3px;' align='left' width='80%'>
								<tr bgcolor='#DDDDDD'>
								<td><b>School Code</b></td>
								<td><b>School Name</b></td>
								<td><b>Region</b></td>
								<td><b>Visit date</b></td>						
								<td><b>Support Type</b></td>
								<td><b>Requested By</b></td>
								<td><b>Requested Date</b></td>";

		if($mailType ==1)
		{
			$subject =" Support Visit Booking";

			$firstLine ="This is to inform that a support visit is booked for the school $schoolName as presented below.<br/>
						 For further details, please log on to www.educationalinitiatives.com, go to School Relationship -> School Support -> Other Links -> Support Visit Planner.";
			
			$content =$firstLine.$content_default ."</tr>
						<tr>
						<td>".$schoolCode."</td>
						<td>".$schoolName."</td>
						<td>".$zone."</td>
						<td>".$visit_dt."</td>
						<td>".$support_visit_str."</td>
						<td>".$request_by."</td>
						<td>".$request_date."</td>
						</tr>";
		}
		else if($mailType ==2)
		{
			$delete_reason = str_replace(array("\r","\n"),array(" "," "),$delete_reason);

			$subject ="Support Visit Deletion";
			$firstLine ="This is to inform that the support visit for the school $schoolName has been deleted.<br/>";
			$content =$firstLine.$content_default ."
						<td><b>Reason to delete</b></td>
						</tr>
						<tr>
						<td>".$schoolCode."</td>
						<td>".$schoolName."</td>
						<td>".$zone."</td>
						<td>".$visit_dt."</td>
						<td>".$support_visit_str."</td>
						<td>".$request_by."</td>
						<td>".$request_date."</td>
						<td>".trim($delete_reason)."</td>
						</tr>";
		}	
		else if($mailType ==3)
		{
			$subject ="Support Visit Completion";
			$firstLine ="This is to inform that the support visit for the school $schoolName has been completed.<br/>";
			$content =$firstLine.$content_default ."
						<td><b>Updated By</b></td>
						<td><b>Updated Date</b></td>
						</tr>
						<tr>
						<td>".$schoolCode."</td>
						<td>".$schoolName."</td>
						<td>".$zone."</td>
						<td>".$visit_dt."</td>
						<td>".$support_visit_str."</td>
						<td>".$request_by."</td>
						<td>".$request_date."</td>
						<td>".$updated_by."</td>
						<td>".$updated_date."</td>
						</tr>";

		}	

		$content .="</table> <br/></body></html>";
		$this->sendVisitMail($schoolCode,$subject,$content);
	}

	function deleteVisit() {

		if($this->supportID == "") return ;

		$this->sendBookingEmail(2,$this->supportID, $this->visit_deleteReason);
		$query = "DELETE FROM ei_supportVisit WHERE id=$this->supportID";
		$result = new dbquery($query,$this->connid);
	}

}
?>