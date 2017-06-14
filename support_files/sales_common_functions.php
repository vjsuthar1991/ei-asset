<?php
function getSalesPeople($category,$report_flag=0) {
	$peopleArray=array();
	$query="SELECT * FROM marketing WHERE category IN($category) ORDER BY name ";
	$result=mysql_query($query) or die("salesPeople".mysql_error());
	while($row=mysql_fetch_array($result))
		array_push($peopleArray,$row['name']);
		
	//if($report_flag == 1)
		//array_push($peopleArray,'subhamita','sunilk');
			
	return $peopleArray;
}

function getDownLine($name) {
	$tempDownLine=array($name);
	$tempDownLine1=array();
	$startDate = date("Y")."-01-01";
	$query="SELECT userID FROM emp_master WHERE adminReportingTo='$name' OR reportingTo='$name' 
		    UNION 
		    SELECT userId from old_emp_master WHERE empl_sbu_id=1 AND leftDate >= '".$startDate."' AND (adminReportingTo='$name' OR reportingTo='$name') 
		    UNION 
		    SELECT userID FROM ea_master WHERE underRM='$name' OR underZM='$name' ";
	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result)) {
		if($row[userID]!="") array_push($tempDownLine,$row[userID]);
	}
	for ($i=0;$i<sizeof($tempDownLine);$i++) {
		$query1="SELECT userID FROM emp_master WHERE adminReportingTo='$tempDownLine[$i]' OR reportingTo='$tempDownLine[$i]' UNION SELECT userId from old_emp_master WHERE empl_sbu_id=1 AND leftDate >= '".$startDate."' AND (adminReportingTo='$tempDownLine[$i]' OR reportingTo='$tempDownLine[$i]') UNION SELECT userID FROM ea_master WHERE underRM='$tempDownLine[$i]' OR underZM='$tempDownLine[$i]' OR under_NSM_ISM='$tempDownLine[$i]' ";
		$result1=mysql_query($query1) or die("getDownLine".mysql_error());
		while($row1=mysql_fetch_array($result1)) {
			if($row1[userID]!="") array_push($tempDownLine1,$row1[userID]);
		}
	}
	$mergedArray=array_merge($tempDownLine,$tempDownLine1);
	return array_unique($mergedArray);
}

function getDownLineNew($name)
{
	$tempDownLine=array();
	$tempDownLine1=array();
	$startDate = date("Y")."-01-01";
	$query="SELECT userID FROM emp_master WHERE adminReportingTo='$name' OR reportingTo='$name' union SELECT userID FROM ea_master WHERE adminReportingTo='$name' OR reportingTo='$name'";
	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result)) {
		if($row[userID]!="") array_push($tempDownLine,$row[userID]);
	}
	for ($i=0;$i<sizeof($tempDownLine);$i++) {
		$query1="SELECT userID FROM emp_master WHERE adminReportingTo='$tempDownLine[$i]' OR reportingTo='$tempDownLine[$i]'";
		$result1=mysql_query($query1) or die("getDownLine".mysql_error());
		while($row1=mysql_fetch_array($result1)) {
			if($row1[userID]!="") array_push($tempDownLine1,$row1[userID]);
		}
	}
	$mergedArray=array_merge($tempDownLine,$tempDownLine1);
	return array_unique($mergedArray);
}

function getPersonDropDown($category,$name,$salesCategory,$selected,$report_flag=0,$region="") { 
	/**
	 * $category : category of logged in user
	 * $name: user name of logged in user
	 * $salesCategory: categories of entire sales team (type = array)
	 * $selected: selected account manager
	 */
	$person=array();
	if(in_array($category,$salesCategory)) {
		$person=getDownLine($name);
		array_push($person,$name);
	}
	else {
		if($report_flag==1){
			$person=getSalesPeople("'SRM','RM'");
			//array_push($person,'subhamita','sunilk');
		}
		else{	
			
			if($category == "ZM" || $category == "SZM"){
				$person = getPersonByCategoryAndRegion("'RM','SRM','STL',SUMA','SUM'",$region);
				array_push($person,$name);
			
			}else if($category == "RM" || $category == "SRM" || $category == "STL"){
				$person = getPersonByCategoryAndRegion("'SUM','SUMA'",$region);
				array_push($person,$name);
			}else{
			$person=getSalesPeople("'EA','RM','SRM','ZM','STL','SZM','NSM','ISM','SUM','SUZM','SUMA','BDE','TC','SH'");	
			array_push($person,$name);
			}
		}
	}
	
	$nameArray=getFullName($person);
	asort($nameArray,SORT_REGULAR);
	$html.='<select name="account_manager" id="account_manager">';
		$html.='<option value="">--Person--</option>';
		foreach ($nameArray as $key=>$value) {
			$html.='<option value='.$key;
			if($key==$selected) { $html.=" selected "; }
			$html.='>'.$value.'</option>';
		}
	$html.='</select>';
	return $html;
}
function getPersonByCategoryAndRegion($category,$regions){
	
	$peopleArray=array();
	$regionsarr = explode(",",$regions);
	foreach($regionsarr as $key => $value){
		$query="SELECT * FROM marketing WHERE category IN($category) AND CONCAT(',',region,',') like '%,".$value.",%' ORDER BY name ";
		$result=mysql_query($query) or die("getPersonByCategoryAndRegion".mysql_error());
		while($row=mysql_fetch_array($result))
			array_push($peopleArray,$row['name']);
	}	
	return $peopleArray;
}
function getCategoryWisePerson($category,$selected,$report_flag=0)
{
	$nameArray = array();
	$query = "select name,fullname from marketing where category='$category'";
	$result = mysql_query($query);
	while($row=mysql_fetch_array($result))
	{
		$nameArray[$row["name"]] = $row["fullname"];
	}
	
	// remove sunilk and subhamita when this functions is called from reports
	/*if($report_flag == 1)
	{
		$remove_elements = array('sunilk'=>'Sunil K. R.','subhamita'=>'Subhamita Kakoty Sarmah');
		$nameArray = array_diff($nameArray, $remove_elements);
	}*/
	
	asort($nameArray,SORT_REGULAR);
	$html.='<select name="category_manager" id="category_manager">';
		$html.='<option value="">--Person--</option>';
		foreach ($nameArray as $key=>$value) {
			$html.='<option value='.$key;
			if($key==$selected) { $html.=" selected "; }
			$html.='>'.$value.'</option>';
		}
	$html.='</select>';
	return $html;
}

function getFullName ($personArray) {
	if(sizeof($personArray)>0) $ImplodePersonArray=implode("','",$personArray);
	//$query="SELECT userID,CONCAT(firstName,' ',lastName) as name FROM emp_master WHERE userID IN('$ImplodePersonArray') UNION  SELECT userID,CONCAT(firstName,' ',lastName) as name FROM ea_master WHERE userID IN('$ImplodePersonArray')";
	$query="SELECT name,fullname FROM marketing WHERE name IN('$ImplodePersonArray') ";
	$result=mysql_query($query) or die("getFullName".mysql_error());
	while($row=mysql_fetch_array($result)) $nameArray[$row[name]]=$row[fullname];
	return $nameArray;
}

function getCategoryRegion($loginUserName) {
	$query="SELECT category,region,email FROM marketing WHERE name='$loginUserName'";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	return $row;
}

function getTestEditionFromYear($year) {
	$te_query="SELECT test_edition FROM test_edition_details WHERE year='$year'";
	$te_result=mysql_query($te_query) or die("te_query".mysql_error());
	while($row=mysql_fetch_array($te_result)) {
		$test_edition.="'".$row[test_edition]."',";
	}
	$test_edition=substr($test_edition,0,-1);
	return $test_edition;
}

function getControlReportData($schoolCode,$product,$year) {
	$row_count=0;
	$visits=0;
	$calls=0;
	$currentTestEdition=getTestEditionFromYear($year);
	$query="SELECT * FROM sales_visits WHERE schoolCode='$schoolCode' AND product='$product' AND year='$year' ORDER BY visit_date";
	$result=mysql_query($query) or die("getCalculatedData".mysql_error());
	$rows=mysql_num_rows($result);
	while($row=mysql_fetch_array($result)) {
		$row_count++;
		if($row_count==1) $firstInteractionDate=$row[visit_date];
		if($row_count==$rows) $lastInteractionDate=$row[visit_date]; else $lastInteractionDate='';
		if($row[medium]=="Visit") $visits++;
		if($row[medium]=="Call") $calls++;
		if($row[exit_reason]!="") $exit_date=$row[visit_date];
	}
	$returnArray[lastInteraction]=$lastInteractionDate;
	$returnArray[visits]=$visits;
	$returnArray[calls]=$calls;
	$returnArray[firstInteraction]=$firstInteractionDate;
	if($product=="asset") {
		$returnArray['current_revenue']= 0;
		if($currentTestEdition !=''){
			$currSSQuery="SELECT SUM(amount_payable) as revenue,test_edition,school_code,aro_form_date,SSF_date,if(aro_form_date<>0,aro_form_date,if(SSF_date<>0,SSF_date,CURDATE())) as order_date FROM school_status  WHERE school_code='$schoolCode' AND test_edition IN ($currentTestEdition) ";
			$currSSResult=mysql_query($currSSQuery) or die("current school status".mysql_error());
			$currSSRow=mysql_fetch_array($currSSResult);
			if($exit_date!="") $close_date=$exit_date; else $close_date=$currSSRow[order_date];
			$returnArray[current_revenue]=$currSSRow[revenue];	
		}
	} else if($product=="mindspark") {
		$currSSQuery="SELECT net_payable as revenue, year,schoolCode,ssf_date, if(isnull(ssf_date),CURDATE(),ssf_date) as order_date FROM ms_orderMaster WHERE schoolCode='$schoolCode' AND year='$year' ";
		$currSSResult=mysql_query($currSSQuery) or die("current school status".mysql_error());
		$currSSRow=mysql_fetch_array($currSSResult);
		if($exit_date!="") $close_date=$exit_date; else $close_date=$currSSRow[order_date];
		$returnArray[current_revenue]=$currSSRow[revenue];
	} else if($product=="da") {
		$currSSQuery="SELECT amount_payable as revenue, year,schoolCode,registration_date, if(isnull(registration_date),CURDATE(),registration_date) as order_date FROM da_orderMaster WHERE schoolCode='$schoolCode' AND year='$year' ";
		$currSSResult=mysql_query($currSSQuery) or die("DA".mysql_error());
		$currSSRow=mysql_fetch_array($currSSResult);
		if($exit_date!="") $close_date=$exit_date; else $close_date=$currSSRow[order_date];
		if($close_date=="") $close_date=date('Y-m-d');
		$returnArray[current_revenue]=$currSSRow[revenue];
	}

	return $returnArray;
}

function dateDifference($startDate, $endDate) {
	if($startDate!="" && $endDate!="") {
	    $startArry = date_parse($startDate);
	    $endArry = date_parse($endDate);
	    $start_date = gregoriantojd($startArry["month"], $startArry["day"], $startArry["year"]);
	    $end_date = gregoriantojd($endArry["month"], $endArry["day"], $endArry["year"]);
	    return round(($end_date - $start_date), 0);
	}
}

function formatDateSales($date) {
	if($date!="") {
		$date=explode("-",$date);
		$date=$date[2]."-".$date[1]."-".$date[0];
	}
	return $date;
}

function getDropDownData($product,$type) {
	$dropDown=array();
	$query="SELECT * FROM sales_code_master WHERE product='$product' AND type='$type'";

	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_array($result))
		$dropDown[$row['code']]=$row['fullform'];
	return $dropDown;
}

function getInteractionHistory($schoolCode,$row_count=20) {
	//sales reporting
	$count=0;
	$sales_query="SELECT * FROM sales_visits WHERE schoolCode='$schoolCode' ORDER BY visit_date DESC LIMIT $row_count";
	$sales_result=mysql_query($sales_query) or die("getPastHistory sales_query".mysql_error());
	while($sales_row=mysql_fetch_array($sales_result)) {
		// four additional fields added to help edit and change activity in view Interaction page
		$tempArray[$count]['visit_id']=$sales_row['id'];
		$tempArray[$count]['sale_cycle_stage']=$sales_row['sale_cycle_stage'];
		$tempArray[$count]['activity_code']=$sales_row['activity'];
		$tempArray[$count]['prodName']=$sales_row['product'];
		$tempArray[$count]['probability']= is_null($sales_row['probability']) ? '' : $sales_row['probability'];

		$tempArray[$count]['visit_date']=$sales_row['visit_date'];
		$tempArray[$count]['visited_by']=$sales_row['visited_by'];
		$tempArray[$count]['year'] = $sales_row['year'];
		$tempArray[$count]['product']=$sales_row['product']." ".getFullForm('SB',$sales_row['implementation'],$sales_row[product]);
		$tempArray[$count]['contact_person']=$sales_row['contact_person'];
		$tempArray[$count]['medium']=$sales_row['medium'];
		$tempArray[$count]['interaction']=$sales_row['interaction'];
		if($sales_row[activity]=="100") $tempArray[$count]['activity']="Other"; else $tempArray[$count]['activity']=getFullForm('AC',$sales_row[activity],$sales_row[product]);
		if($sales_row[next_action]=="100") $tempArray[$count]['next_action']=$sales_row[next_action_other]; else $tempArray[$count]['next_action']=getFullForm('NA',$sales_row[next_action],$sales_row[product]);
		$tempArray[$count]['next_action_date']=formatDateSales($sales_row[next_action_date]);
		$tempArray[$count]['stage']=getFullForm('ST',$sales_row[sale_cycle_stage],$sales_row[product]);
		$tempArray[$count]['buying_temperature']=getFullForm('BT',$sales_row['buying_temperature'],$sales_row[product]);
		if($sales_row[exit_reason]=="100") $tempArray[$count]['exit_reason']="Other"; else $tempArray[$count]['exit_reason']=getFullForm('EX',$sales_row[exit_reason],$sales_row[product]);
		$tempArray[$count]['system']='Sales Reporting';

		$count++;
	}
	//presales
	$presales_query="SELECT * FROM presales_visits WHERE schoolCode='$schoolCode' ORDER BY entryDate DESC LIMIT $row_count";
	$presales_result=mysql_query($presales_query) or die("getPastHistory presales_query".mysql_error());
	while($presales_row=mysql_fetch_array($presales_result)) {

		$tempArray[$count]['visit_date']=$presales_row['visitDate'];
		$tempArray[$count]['visited_by']=$presales_row['visitorID'];
		$tempArray[$count]['product']='ASSET '.$presales_row['typeCode'];
		$tempArray[$count]['contact_person']=$presales_row['personMet'];
		$tempArray[$count]['medium']=$presales_row['contactMediumCode'];
		$tempArray[$count]['interaction']=$presales_row['visitComments'];
		$tempArray[$count]['activity']=$presales_row['activity'];
		$tempArray[$count]['next_action']=$presales_row['nextAction'];
		$tempArray[$count]['next_action_date']=formatDateSales($presales_row['nextActionDate']);
		$tempArray[$count]['stage']='';
		$tempArray[$count]['concern']='';
		$tempArray[$count]['buying_temperature']='';
		$tempArray[$count]['exit_reason']='';
		$tempArray[$count]['system']='Presales';

		$count++;
	}

	//telecalling
	$tele_query="SELECT * FROM telecalling_school_details WHERE schoolno='$schoolCode' ORDER BY entry_date DESC LIMIT $row_count";
	$tele_result=mysql_query($tele_query) or die("getPastHistory tele_query".mysql_error());
	while($tele_row=mysql_fetch_array($tele_result)) {

		$visitDate=explode(" ",$tele_row[entry_date]);
		$tempArray[$count]['visit_date']=$visitDate[0];
		$tempArray[$count]['visited_by']=$tele_row[telecaller];
		$tempArray[$count]['year']=$tele_row[year];
		$tempArray[$count]['product']='';
		$tempArray[$count]['contact_person']=$tele_row[contacted];
		$tempArray[$count]['medium']='Call';
		$tempArray[$count]['interaction']=$tele_row[comments];
		$tempArray[$count]['activity']='';
		$tempArray[$count]['next_action']='';
		$tempArray[$count]['next_action_date']=formatDateSales($tele_row[next_action_date]);
		$tempArray[$count]['stage']=getSaleCycleStageTelecalling($tele_row[sale_cycle_stage]);
		$tempArray[$count]['concern']='';
		$tempArray[$count]['buying_temperature']=getBuyingTemperature($tele_row[buying_temperature]);
		$tempArray[$count]['exit_reason']=getExitAnalysisTelecalling($tele_row[exit_analysis]);
		$tempArray[$count]['system']='Telecalling';
		$count++;
	}

	//school interaction
	$school_query="SELECT * FROM school_interactions WHERE school_code='$schoolCode' ORDER BY interaction_date  DESC LIMIT $row_count ";
	$school_result=mysql_query($school_query) or die("getPastHistory school_query".mysql_error());
	while($school_row=mysql_fetch_array($school_result)) {

		$tempArray[$count]['visit_date']=$school_row[interaction_date];
		$tempArray[$count]['visited_by']=$school_row[userID];
		$product='';
		if($school_row[purpose_asset]==1) $product.='ASSET,';  if($school_row[purpose_mindspark]==1) $product.='MS,'; if($school_row[purpose_cce]==1) $product.='CCE';
		$tempArray[$count]['product']=substr($product,0,-1);
		$tempArray[$count]['contact_person']=getContactPersonSchoolInteraction($school_row[id],$schoolCode);
		$tempArray[$count]['medium']=$school_row['contact_medium'];
		$tempArray[$count]['interaction']=$school_row['interaction_desc'];
		$tempArray[$count]['activity']='';
		$nextAction=getNextActionFromSchoolInteraction($school_row[id]);
		$tempArray[$count]['next_action']=$nextAction['next_action'];
		$tempArray[$count]['next_action_date']=$nextAction['next_action_date'];
		$tempArray[$count]['stage']='';
		$tempArray[$count]['concern']='';
		$tempArray[$count]['buying_temperature']='';
		$tempArray[$count]['exit_reason']='';
		$tempArray[$count]['system']='School Interaction';

		$count++;
	}
	
	//MSI Interactions
	
	$sq = "SELECT schoolCode, calledBy, calledDate, contactPerson, nextCalldate, interaction FROM educatio_educat.msiInteractions 
			WHERE schoolCode='$schoolCode' AND interaction<>'No response.' ORDER BY calledDate DESC LIMIT $row_count";
	$rs = mysql_query($sq);
	while($rw = mysql_fetch_array($rs))
	{
		$visitDate=explode(" ",$rw["calledDate"]);
		$tempArray[$count]['visit_date']=$visitDate[0];
		$tempArray[$count]['visited_by']=$rw["calledBy"];
		$tempArray[$count]['product']="mindspark";
		$tempArray[$count]['contact_person']=$rw["contactPerson"];
		$tempArray[$count]['medium']="Call";
		$tempArray[$count]['interaction']=$rw["interaction"];
		$tempArray[$count]['activity']='Call';
		$next_action_date=explode(" ",$rw["nextCalldate"]);
		$tempArray[$count]['next_action_date']=formatDateSales($next_action_date[0]);
		$tempArray[$count]['stage']="";
		$tempArray[$count]['concern']='';
		$tempArray[$count]['buying_temperature']="";
		$tempArray[$count]['exit_reason']="";
		$tempArray[$count]['system']='MSI Interaction';
		$tempArray[$count]['year']=getAcademicYear($rw["schoolCode"],$rw["calledDate"]);
		$count++;
	}
	
	//new telecalling
	$callResponse=getDropDownData('','CR');
	$tele_query="SELECT * FROM telecalling_interactions a LEFT JOIN telecalling_interactions_product b ON a.id=b.interaction_id WHERE schoolCode='$schoolCode' ORDER BY date DESC LIMIT $row_count";
	$tele_result=mysql_query($tele_query) or die("getPastHistory tele_query".mysql_error());
	while($tele_row=mysql_fetch_array($tele_result)) {

		$visitDate=explode(" ",$tele_row[date]);
		$tempArray[$count]['visit_date']=$visitDate[0];
		$tempArray[$count]['visited_by']=$tele_row[telecaller];
		$tempArray[$count]['product']=$tele_row[product];
		$tempArray[$count]['contact_person']=$tele_row[contact_person];
		$tempArray[$count]['medium']=$tele_row[medium];
		$tempArray[$count]['interaction']=$callResponse[$tele_row[call_response]]."<br>".$tele_row[interaction];
		$tempArray[$count]['activity']='';
		$next_action_date=explode(" ",$tele_row[next_action_date]);
		$tempArray[$count]['next_action_date']=formatDateSales($next_action_date[0]);
		$tempArray[$count]['stage']=getFullForm('ST',$tele_row[sale_cycle_stage],$tele_row[product]);
		$tempArray[$count]['concern']='';
		$tempArray[$count]['buying_temperature']=getBuyingTemperature($tele_row[buying_temperature]);
		$tempArray[$count]['exit_reason']=getFullForm('EX',$tele_row[exit_reason],'asset');
		$tempArray[$count]['system']='Telecalling';
		$count++;
	}

	for ($i=0;$i<$count;$i++) {
		$dateArray[$i]=$tempArray[$i][visit_date];
	}

	if(sizeof($dateArray)>0) {
		arsort($dateArray);
		$j=0;
		foreach ($dateArray as $key => $val) {
	   		$indexArray[$j]=$key;
			$j++;
			if($j==$row_count) break;
		}
	}

	for ($i=0;$i<sizeof($indexArray);$i++) {
		// for edit purpose of the sales entry to correct wrongly added activity as session activity
		if(isset($tempArray[$indexArray[$i]]['visit_id'])) {
			$historyArray[$i]['visit_id']=$tempArray[$indexArray[$i]]['visit_id'];
			$historyArray[$i]['sale_cycle_stage']=$tempArray[$indexArray[$i]]['sale_cycle_stage'];
			$historyArray[$i]['activity_code']=$tempArray[$indexArray[$i]]['activity_code'];
			$historyArray[$i]['prodName']=$tempArray[$indexArray[$i]]['prodName'];
			$historyArray[$i]['probability']=$tempArray[$indexArray[$i]]['probability'];
		}

		$historyArray[$i]['visit_date']=$tempArray[$indexArray[$i]]['visit_date'];
		$historyArray[$i]['visited_by']=$tempArray[$indexArray[$i]]['visited_by'];
		$historyArray[$i]['year']=$tempArray[$indexArray[$i]]['year'];
		$historyArray[$i]['product']=$tempArray[$indexArray[$i]]['product'];
		$historyArray[$i]['contact_person']=$tempArray[$indexArray[$i]]['contact_person'];
		$historyArray[$i]['medium']=$tempArray[$indexArray[$i]]['medium'];
		$historyArray[$i]['interaction']=$tempArray[$indexArray[$i]]['interaction'];
		$historyArray[$i]['activity']=$tempArray[$indexArray[$i]]['activity'];
		$historyArray[$i]['next_action']=$tempArray[$indexArray[$i]]['next_action'];
		$historyArray[$i]['next_action_date']=$tempArray[$indexArray[$i]]['next_action_date'];
		$historyArray[$i]['stage']=$tempArray[$indexArray[$i]]['stage'];
		$historyArray[$i]['concern']=$tempArray[$indexArray[$i]]['concern'];
		$historyArray[$i]['buying_temperature']=$tempArray[$indexArray[$i]]['buying_temperature'];
		$historyArray[$i]['exit_reason']=$tempArray[$indexArray[$i]]['exit_reason'];
		$historyArray[$i]['system']=$tempArray[$indexArray[$i]]['system'];
	}

	return $historyArray;
}

function getMultipleSchoolDetails($schoolCode,$select) {
	$query="SELECT $select FROM schools WHERE schoolno IN ($schoolCode)";
	$result=mysql_query($query) or die("getMultipleSchoolDetails ".mysql_error());
	while($row=mysql_fetch_array($result)) $return[$row[schoolno]]=$row;
	return $return;
}

function getNextActionFromSchoolInteraction($id) {
	$query="SELECT * FROM school_interaction_actions WHERE interaction_id='$id'";
	$result=mysql_query($query) or die("getNextActionFromSchoolInteraction".mysql_error());
	while($row=mysql_fetch_array($result)) {
		$actionArray['next_action'].=$row['action'].",";
		$actionArray['next_action_date'].=$row['action_date'].",";
	}
	$actionArray['next_action'].=substr($actionArray['next_action'],0,-1);
	$actionArray['next_action_date'].=substr(formatDateSales($actionArray['next_action_date']),0,-1);
	return $actionArray;
}

function getContactPersonSchoolInteraction($id,$schoolCode) {
	$query="SELECT * FROM school_interaction_contact WHERE interaction_id='$id'";
	$result=mysql_query($query) or die("getContactPersonSchoolInteraction".mysql_error());
	while($row=mysql_fetch_array($result)) {
		if($row[is_primary_contact]=='1') $primary_contact=1;
		if($row[contact_id]!="") $sec_contact=$row[contact_id].",";
	}
	if($primary_contact==1){
		$query_1="SELECT contact_person_1 FROM schools WHERE schoolno='$schoolCode'";
		$result_1=mysql_query($query_1) or die("getContactPersonSchoolInteraction schools".mysql_error());
		$row_1=mysql_fetch_assoc($result_1);
		$contact_person=$row_1[contact_person_1].",";
	}
	if($sec_contact!="") {
		$sec_contact=substr($sec_contact,0,-1);
		$query_2="SELECT contact_person FROM contact_details WHERE contact_id IN($sec_contact)";
		$result_2=mysql_query($query_2) or die("getContactPersonSchoolInteraction contact".mysql_error());
		while($row_2=mysql_fetch_assoc($result_2)) $contact_person.=$row_2[contact_person].",";
	}
	return substr($contact_person,0,-1);
}

function getExitAnalysisTelecalling($exit) {
	switch($exit) {
		case '' :
			$exit="";
			break;
		case 0:
			$exit="Fees High";
			break;
		case 2 :
			$exit="Competition";
			break;
		case 4 :
			$exit="No pvt tie up";
			break;
		case 6 :
			$exit="No Optional";
			break;
		case 8 :
			$exit="Dead Contact";
			break;
		case 10 :
			$exit="No external Test";
			break;
		case 12 :
			$exit="Not Qualified";
			break;
		case 14 :
			$exit="Low Interest";
			break;
		case 16 :
			$exit="Not Interested";
			break;
		case 18 :
			$exit="Next Year";
			break;
		case 20 :
			$exit="Payment Received";
			break;
		case 22:
			$exit="Other";
			break;
		case 24:
			$exit="Visit Required";
			break;
		case 26:
			$exit="All Closed";
			break;

	}
	return $exit;
}

function getFullForm($type,$code,$product) {
	$query="SELECT fullform FROM sales_code_master WHERE type='$type' AND code='$code' AND product='$product' ";
	$result=mysql_query($query) or die(mysql_error());
	$row=mysql_fetch_array($result);
	return $row['fullform'];
}

function getBuyingTemperature($buying_temperature) {
	switch($buying_temperature) {
		case '':
			$buying_temperature="";
			break;
		case 0:
			$buying_temperature="Red";
			break;
		case 1:
			$buying_temperature="Amber";
			break;
		case 2:
			$buying_temperature="Green";
			break;
	}
	return $buying_temperature;
}

function getSaleCycleStageTelecalling($stage) {
	switch($stage) {
		case '' :
			$stage="";
			break;
		case 0:
			$stage="Potential Opportunity";
			break;
		case 2:
			$stage="On Gatekeeper";
			break;
		case 4:
			$stage="Initial Communication";
			break;
		case 6:
			$stage="Send Broucher";
			break;
		case 8:
			$stage="Product Benefits";
			break;
		case 10:
			$stage="Discussing with other stake holders";
			break;
		case 12:
			$stage="Commitment Taken";
			break;
		case 14:
			$stage="Send PL";
			break;
		case 16:
			$stage="Recived PL";
			break;
		case 18:
			$stage="Distributed PL";
			break;
		case 20:
			$stage="Response Collected";
			break;
		case 22:
			$stage="SSF Sent";
			break;

	}
	return $stage;
}

function getSchoolDetails($schoolCode) {
	$schoolQuery="SELECT * FROM schools WHERE schoolno='".$schoolCode."'" ;
	$schoolResult=mysql_query($schoolQuery) or die(mysql_error());
	$schoolArray=mysql_fetch_array($schoolResult);
	return $schoolArray;
}

function getOtherContacts($schoolCode) {
	$query="SELECT * FROM contact_details WHERE school_code='$schoolCode'";
	$result=mysql_query($query) or die("getOtherContacts".mysql_error());
	while($row=mysql_fetch_array($result)) $returnArray[]=$row;
	return $returnArray;
}

function getProductOrderDetails($product,$schoolCode) {
	foreach($product as $product_name=>$year) :
		if($product_name=="asset") :
			$query = "SELECT school_code FROM school_status WHERE school_code='$schoolCode' AND test_edition='$year'";
		elseif($product_name=="da"):
			$query = "SELECT schoolCode FROM da_orderMaster WHERE schoolCode='$schoolCode' AND year='$year'";
		elseif($product_name=="mindspark"):
			$query = "SELECT schoolCode FROM ms_orderMaster WHERE schoolCode='$schoolCode' AND year='$year' ";
		elseif($product_name=="mindsparkEng"):
			$query = "SELECT schoolCode FROM msEng_orderMaster WHERE schoolCode='$schoolCode' AND year='$year' ";
		endif;
		
		$result=mysql_query($query) or die("getOrderDetails $product_name".mysql_error());
		$order[$product_name]=mysql_num_rows($result);
	endforeach;
	
	return $order;
}

function generateNsmIsmBmhCheck($category,$username,$region,$view='') {
	if($region!="")
	{
		$arrRegion = explode(",",$region);
		$region = implode("','",$arrRegion);		
	}
	
	if($category=='EA' || $category=='RM' || $category=='STL' || $category=='SRM' || $category=='BDE')
		$whereClause=" AND ( keyAccount='".$username."' OR buddyAccount='".$username."') ";
	elseif($category=="SUM")
		$whereClause=" AND ( ts='".$username."' OR ps='".$username."') ";
	elseif($category=="ZM" || $category=="SZM" || $category=='SUZM' || $category=='SUMA')
		$whereClause=" AND ( region IN ('".$region."'))";
	elseif($category=="NSM"){
		$whereClause=" AND ( country = 'India' OR country = 'Nepal') ";
		//$whereClause=" AND ( country = 'India' OR country = 'Nepal') AND region != 'B-M-H' ";
	}	
	elseif($category=="ISM")
		$whereClause=" AND country != 'India' AND country != 'Nepal' AND country != '' ";
	return $whereClause;
}

function getCity($loginUserName) {
	$query=getSchoolSelectionQuery($loginUserName," DISTINCT city ");
	$query.=" ORDER BY city ";
	$cityArray = array();

	$result = mysql_query($query) or die("getCity : ".mysql_error());
	while ($row=mysql_fetch_array($result)){
		array_push($cityArray, $row['city']);
	}
	return $cityArray;
}

function getSchoolSelectionQuery($loginUserName,$select) {
	include 'relationshipReport/lib/constants.php';
	$categoryRegion=getCategoryRegion($loginUserName);
	$whereClause=generateNsmIsmBmhCheck($categoryRegion[0],$loginUserName,$categoryRegion[1]);
	if(!in_array($categoryRegion[0], $seniorCategory) && $categoryRegion[0]!="") {
		$query="SELECT $select FROM schools as s,sales_allotment_master as m WHERE  s.schoolno=m.schoolCode $whereClause ";
	} else {
		$query="SELECT $select FROM schools as s WHERE 1=1 $whereClause";
	}
	return $query;
}

function getSchoolAccount($condition) {
	$query="SELECT keyAccount,buddyAccount,ts,ps,schoolCode FROM sales_allotment_master WHERE 1=1 $condition";
	$result=mysql_query($query) or die(mysql_error());
	while($row=mysql_fetch_assoc($result))
	   $returnArray[$row[schoolCode]]=$row; 
	return $returnArray;
}

function getDropDown($array,$name,$selected,$event) {
	
	$html.='<select name="'.$name.'" id="'.$name.'" '.$event.'>';
	$html.='<option value="" ';
		if($selected=='') $html.=" selected ";
	$html.='>--Select--</option>';
	foreach ($array as $key=>$value) {
		$html.='<option value="'.$key.'" ';
		if("$key"=="$selected") { $html.=" selected "; }
		$html.='>'.$value.'</option>';
	}
	$html.="</select>";
	return $html;
}


function sendMail($recipient,$subject,$message) {
	if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
	  $eol="\r\n";
	} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
	  $eol="\r";
	} else {
	  $eol="\n";
	}
	
	$to=$recipient[to];
	$from=$recipient['from'];
	$cc=$recipient[cc];
	$bcc=$recipient[bcc];
	$reply_to=$recipient[reply_to];
	
	$mail_content='<html>
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	  <title>Mail</title>
	  <style>
		BODY {
		font-family: verdana,sans-serif;
		font-size: 12;
		}
		</style>
	</head>
	<body>';	
	$mail_content.=$message;
	$mail_content.='</body></html>';
	
	$mail_content=wordwrap($mail_content,70,$eol);

	$headers = "From: $from $eol";
	if($cc!="") $headers .= "cc: $cc $eol";
	if($bcc!="") $headers .= "Bcc: $bcc $eol";
	if($reply_to!="") $headers .= "Reply-To: $reply_to $eol";
	$headers .= "MIME-Version: 1.0 $eol";
	//$headers .= "Content-type: text/html; charset=iso-8859-1 $eol";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	mail($to,$subject,$mail_content,$headers);
}

function generateMailingListSales($name,$mail_type,$schoolCode="") { 
	include('relationshipReport/lib/constants.php'); 
	if(sizeof($name)>0) $mail_list = array_merge(array($_SESSION[username]),$name); else $mail_list=array($_SESSION[username]);

	$query="SELECT marketing.category,marketing.region,marketing.email,marketing.name,emp_master.leftDate, emp_master.empl_sbu_id,
			(leftDate is NULL or leftDate = '0000-00-00' or leftDate >= CURDATE()) leftDateCond 
			FROM marketing 
			LEFT JOIN emp_master ON marketing.name = emp_master.userID
			WHERE name IN('".implode("','",$mail_list)."')";
	$result=mysql_query($query) or die("mailingList marketing" .mysql_error());
	while($row=mysql_fetch_assoc($result)) { 
		$details[$row['name']] = $row;
		if($row["leftDateCond"] ==  1){
			$ccEmail[]=$row['email'];
		}
	}

	$reporting=array();
	$zmArr =array();
	foreach($name as $person) {

		if($mail_type=="reporting" || $mail_type=="planning") {
			if($details[$person]['empl_sbu_id'] == CONSTANT('SALES_SBU_NATIONAL')){
				// new function to get ZM 
				$zmArr = getZMArr();
				$personRegion = $details[$person]['region'];
			}
		}	
		if($details[$person]['category']=="EA") {
			$query="SELECT underRM,underZM,under_NSM_ISM FROM ea_master WHERE userID='$person' ";
			$result=mysql_query($query) or die("admin reporting ea".mysql_error());
			while($row=mysql_fetch_assoc($result)) { 
				if($row['underRM']!="") array_push($reporting,$row['underRM']); 
				if($row['underZM']!="") array_push($reporting,$row['underZM']); 
				if($row['under_NSM_ISM']!="") array_push($reporting,$row['under_NSM_ISM']); 
			}
		} else {
			$query="SELECT reportingTo,adminReportingTo FROM emp_master WHERE userID='$person' 
				    UNION SELECT reportingTo,adminReportingTo FROM contract_master WHERE userID='$person'";
			$result=mysql_query($query) or die("mailingList admin reporting".mysql_error());
			if(mysql_num_rows($result) == 0)
			{
				$query="SELECT underRM,underZM,under_NSM_ISM FROM ea_master WHERE userID='$person' ";
				$result=mysql_query($query) or die("admin reporting ea".mysql_error());
				while($row=mysql_fetch_assoc($result)) { 
					if($row['underRM']!="") array_push($reporting,$row['underRM']); 
					if($row['underZM']!="") array_push($reporting,$row['underZM']); 
					if($row['under_NSM_ISM']!="") array_push($reporting,$row['under_NSM_ISM']); 
				}	
			}
			else {
				while($row=mysql_fetch_array($result)) {
					array_push($reporting,$row['adminReportingTo']);

					if($mail_type=="reporting" || $mail_type=="planning") {
						// for national sales SBU add ZM if not added and send for admin reporting only 	
						if($details[$person]['empl_sbu_id'] != CONSTANT("SALES_SBU_NATIONAL"))	{
							array_push($reporting,$row['reportingTo']);
						} else {
							if(isset($zmArr[$personRegion]) && !in_array($zmArr[$personRegion],$reporting) 
								&& !in_array($zmArr[$personRegion],$ccEmail)){
								array_push($reporting,$zmArr[$personRegion]);
							}
						}
					} else {
						// for the other type of mails kept it as it was 
						array_push($reporting,$row['reportingTo']);
					}	
				}
			}
		}
	}	
	if(sizeof($reporting)>0) $copyMail = $reporting;
		
	if(sizeof($copyMail)>0) {
		
		$query="SELECT marketing.email,marketing.name FROM marketing 
			    LEFT JOIN emp_master ON marketing.name = emp_master.userID
				WHERE name IN ('".implode("','",$copyMail)."') AND (leftDate is null OR leftDate = '0000-00-00' OR leftDate >= CURDATE())";
		$result= mysql_query($query) or die("mailingList email ".mysql_error());
		while($row=mysql_fetch_assoc($result)) $reportingMails[]=$row[email];
	}	

	if($mail_type=="reporting" || $mail_type=="planning") {
            /*
             * Old Logic with Condition for Foreign && B-M-H Region skipping in Mail CC to Harish Wadhwa
             * Removing Condition for B-M-H region will help to send CC mail to Harish for this Region - Amit Shah - 07-06-2014
             * REMOVED CONDITION FOR REQUEST - DAILY VISIT REPORTS BANGALORE AND ROK TEAM - $details[$_SESSION[username]][region]=="B-M-H"
             * Removed condition -  && in_array($details[$_SESSION[username]][category],array_diff($salesCategory,$supportCategory)) (In order to send Bcc Email to Bidhan for Support People - Requested by Sanatan : 5-9-2014)
             * 
             * Removed Reporting Email CC to Bidhan and Harit based on Urvi's request on 16-9-14 by keeping Support category intersaction 
             */
            //&& $mail_type=='reporting'
		
                if(!($details[$_SESSION[username]][region]=="Foreign" || $details[$_SESSION[username]][region]=="") && in_array($details[$_SESSION[username]][category],array_diff($salesCategory,$supportCategory)) ){
			$ccEmail[]=",harit@ei-india.com";
		}

        if(!isset($_SESSION['username']))
        	$recipient['from'] = 'system@ei-india.com';
        else 
        	$recipient['from'] = $details[$_SESSION[username]][email];

		$recipient['to'] = implode(",",$reportingMails);
		// removed sanatan from mail for daily plan and report email
		$recipient['bcc'] = 'harit@ei-india.com';
 	} else {
		$recipient['from']='system@ei-india.com';
		$recipient['to']='drupad@ei-india.com';
		$recipient['reply_to']='drupad@ei-india.com';
		$recipient['cc'] = implode(",",$reportingMails);
				
		//if($mail_type=="mindspark_order") array_push($ccEmail,'sudhir@ei-india.com');
		if($mail_type=="da_order" || $mail_type=="mindspark_order" || $mail_type=="mindsparkEng_order")
		{
			array_push($ccEmail,'urvi.shah@ei-india.com');
			array_push($ccEmail,'rahul@ei-india.com');
			if($mail_type=="da_order")
			{
				//array_push($ccEmail,'sindhu.deshmukh@ei-india.com');				
			}
			if($mail_type=="mindsparkEng_order")
			{
				array_push($ccEmail,'dev.dutta@ei-india.com');
				array_push($ccEmail,'aarushi.prabhakar@ei-india.com');								
			}
		}
		array_push($ccEmail,'jignasha.mistry@ei-india.com');
		array_push($ccEmail,'harit@ei-india.com');
		//array_push($ccEmail,'shaji.chacko@ei-india.com');
		array_push($ccEmail,'sudhir@ei-india.com');
	}
	
	 // STARTED : to remove sridhar sir's name (a mail received from sanatant do this on 21-04-2014) by semin firasta
    if($mail_type=="reporting")
    {
        $tmp = array();
        $tmp = explode(",",$recipient['to']);
        
        $sridhar_array = array("sridhar@ei-india.com","srini.raghavan@ei-india.com");
        $new_tmp = array_diff($tmp,$sridhar_array);
        
        $recipient['to'] = implode(",",$new_tmp);
    }
    // ENDED : to remove sridhar sir's name (a mail received from sanatant do this on 21-04-2014) by semin firasta

    // STARTED : to remove Bidhan Sarkar's name (a mail received from sanatant do this on 30-6-2014 for harish) by semin firasta
    if($mail_type=="planning")
    {
        $tmp = array();
        $tmp = explode(",",$recipient['to']);
        
        $NSM_array = array("bidhan@ei-india.com");
        $new_tmp = array_diff($tmp,$NSM_array);
        
        $recipient['to'] = implode(",",$new_tmp);
    }
    // ENDED : to remove Bidhan Sarkar's name (a mail received from sanatant do this on 30-6-2014 for harish) by semin firasta


	// STARTED : add 'mollins.turner@ei-india.com', 'thaker.urmila@gmail.com' to cc when person from ASM category fills the report - 13-8-14 - based on Sanatan Email
	if($mail_type=="reporting")
	{
		$people_of_ASM = array();
		$query = mysql_query("SELECT name FROM marketing WHERE category IN ('SUM','SUZM')");
		while($result = mysql_fetch_assoc($query))
			$people_of_ASM[] = $result['name'];
                        
		if(in_array($name[0],$people_of_ASM)) {
                    if($name[0] != 'thaker.urmila') {
			array_push($ccEmail,'shekhar.hardikar@ei-india.com');
			// removed urmila from mail list for asm as per harit request
			// array_push($ccEmail,'thaker.urmila@gmail.com');
			//array_push($ccEmail,'bidhan@ei-india.com');
                    }
                }
	}
	// ENDED : add 'mollins.turner@ei-india.com','thaker.urmila@gmail.com' to cc when person from ASM category fills the report - 13-8-14 - based on Sanatan Email

	// STARTED : add 'vega@edukonnectsolutions.com' to cc when person from EA (as listed in below array) category fills the report by semin firasta
	$EAPeopleArray = array("ranbir.singh","rahul.sharma","gautam.sood","sandeep.sharma");
	if($mail_type=="reporting" && in_array($name[0],$EAPeopleArray))
	{
		array_push($ccEmail,'vega@edukonnectsolutions.com');
	}
	// ENDED : add 'vega@edukonnectsolutions.com' to cc when person from EA (as listed in below array) category fills the report by semin firasta
        
        // STARTED : add 'subhamita@ei-india.com' to cc when Reporting from sudeshna.roy@ei-india.com - 24-09-2014
        
	$NorthEastPeopleArray = array("sudeshna.roy","ratnabali.mukherjee");
	if($mail_type=="reporting" && in_array($name[0],$NorthEastPeopleArray))
	{
		array_push($ccEmail,'subhamita@ei-india.com');
	}
        
	// ENDED : 
        
	
	// STARTED : to add few static names (task received from sanatant do this on 14-05-2014) by semin firasta
	$preSales_telecallers = array("maruf.shaikh","ciciliya.pereira","bhaumik.dalwadi");
	if($mail_type=="reporting")
	{
		if(in_array($name[0],$preSales_telecallers)){
			$static_email = array();
			$static_email = getEmail(AddExceptionEmails($name[0]));
			$recipient['to'] = $recipient['to'].",".implode(",",$static_email);
		}
	}
	// ENDED : to add few static names (task received from sanatant do this on 14-05-2014) by semin firasta
	
	if($mail_type=="asset_order" || $mail_type=="mindspark_order" || $mail_type=="da_order" || $mail_type=="mindsparkEng_order") {
		if($schoolCode!="")
		{			
			$query_cc = '';
			if($mail_type=="asset_order")
				$query_cc = "select b.name,b.email FROM schools a,marketing b, emp_master where userId=name AND FIND_IN_SET(a.region,b.region) AND schoolno='$schoolCode' AND b.category='SUMA' AND b.email IS NOT NULL AND b.email!='' AND desig NOT LIKE '%Programme%'";
			else if($mail_type=="da_order") 
				$query_cc = "select b.name,b.email FROM schools a,marketing b where FIND_IN_SET(a.region,b.region) AND schoolno='$schoolCode' AND b.category in('SUMA','CS') AND b.email IS NOT NULL AND b.email!=''";
			else if($mail_type=="mindspark_order")
				$query_cc = "select b.name,b.email FROM schools a,marketing b where FIND_IN_SET(a.region,b.region) AND schoolno='$schoolCode' AND b.category in('CS') AND b.email IS NOT NULL AND b.email!=''";
			else if($mail_type=="mindsparkEng_order")
				$query_cc = "select b.name,b.email FROM schools a,marketing b where FIND_IN_SET(a.region,b.region) AND schoolno='$schoolCode' AND b.category in('CS') AND b.email IS NOT NULL AND b.email!=''";
				
			
			if($query_cc!='')
			{
				$result_cc=mysql_query($query_cc) or die("email".mysql_error());
				while($row_cc=mysql_fetch_assoc($result_cc)) 
				{
					array_push($ccEmail,$row_cc[email]);				
				}
			}	
		}
		//array_push($ccEmail,'ketan@ei-india.com');
		array_push($ccEmail,'mihir.jhaveri@ei-india.com');
		//array_push($ccEmail,'bidhan@ei-india.com');
	}
	$ccEmail = array_unique($ccEmail); 
	$recipient['cc'].= ",".implode(",",$ccEmail); 

	return $recipient;	
}

// to set few basic names to whom 'presales report' need to send
function AddExceptionEmails($loginPersonName)
{
	$people_array = array();
	
	if($loginPersonName == "maruf.shaikh")
	{
		$people_array[] = "bidhan";
	}	
	else if($loginPersonName == "ciciliya.pereira")
	{
		$people_array[] = "subroto.b";
	}
	else if($loginPersonName == "bhaumik.dalwadi")
	{
		$people_array[] = "vikasrai";
	}
	
	return $people_array;
}

// to fetch email id based on username passed
function getEmail($names)
{
	$email = array();
	$query = "SELECT emailComp FROM emp_master WHERE userID IN ('".implode("','",$names)."')";
	$result = mysql_query($query) or die(mysql_error());	
	while($row=mysql_fetch_assoc($result))
		$email[] = $row['emailComp'];
	return $email;
}

function checkIsUserLogin($loginUserName){
	if(empty($loginUserName)){
		echo '<p align="center" > You are not authorised to access this page , please login';
		exit;
	}
}

function getCommmonSelectArray($select,$condition="")
{	
	$arrRet = array();
	$query = "SELECT $select FROM region_master WHERE 1=1 $condition";
	$result = mysql_query($query) or die(mysql_error());	
	while($row=mysql_fetch_array($result))  { if(!is_null($row[$select])) { $arrRet[$row[$select]]=$row[$select]; }	}	
	return $arrRet;		
}

function getSchoolBasedOnDistrict($select,$district)
{
	$schoolList = "";
	$arrSchool = array();
	$cityArray = array();
	$query = "SELECT $select FROM region_master WHERE district IN ('$district')";
	$result = mysql_query($query) or die(mysql_error());	
	while($row=mysql_fetch_array($result))  { if(!is_null($row[$select])) { $cityArray[$row[$select]]=$row[$select]; }	}	
	if(isset($cityArray) && count($cityArray)>0)
	{
		$city = "";
		$city = implode("','",$cityArray);
		$city = "'".$city."'";
		$query_city = "SELECT schoolno FROM schools WHERE city IN ($city)";
		$result_city = mysql_query($query_city) or die(mysql_error());	
		while($row_city=mysql_fetch_array($result_city))  { if(!is_null($row_city[schoolno])) { $arrSchool[$row_city[schoolno]]=$row_city[schoolno]; }	}	
		
	}
	if(isset($arrSchool) && count($arrSchool)>0)
	{
		$schoolList = implode(",",$arrSchool);
	}
	return $schoolList;
}

function getPointArray($select,$condition)
{
	$pointArray = array();
	$query = "SELECT $select FROM sales_code_master WHERE $condition";
	$result = mysql_query($query) or die(mysql_error());	
	while($row=mysql_fetch_array($result))  
	{ 
		$pointArray[$row[0]] = $row[1];
	}	
	return $pointArray;
}

function getDropDownForNecessaryFields($name,$id,$selected,$condition,$selecttype,$disabled)
{
	$arrSelect = array();
	if($selected!="")
	{
		$arrSelect = explode(",",$selected);
	}
	$arrFields = array();
	$query = "SELECT name,label,type FROM sales_data_fields WHERE 1=1 $condition";
	$result = mysql_query($query);
	while($row=mysql_fetch_array($result)){
		$arrFields[$row["name"]."#".$row["type"]] = $row["label"];
	}
	
	$html.='<select class ="'.$id.' "name="'.$name.'" id="'.$id.'" '.$event.$selecttype.$disabled.' >';
	$html.='<option value="" ';
		if(count($arrSelect)==0) $html.=" selected ";
	$html.='>--Select--</option>';
	foreach ($arrFields as $key=>$value) {
		$html.='<option value="'.$key.'" ';
		if(in_array("$key",$arrSelect)) { $html.=" selected "; }
		$html.='>'.$value.'</option>';
	}
	$html.="</select>";
	return $html;
}

function getUnallotedSchools($masterSchools,$allotedSchools)
{
	$arrRet = array();
	foreach($masterSchools as $keySchools => $valueSchools)
	{
		$counter_check = 0;
		foreach($allotedSchools as $keyallotedSchools => $valueallotedSchools)
		{			
			if($valueSchools["schoolno"]==$valueallotedSchools["schoolno"])
			{
				$counter_check = 1;
			}
		}	
		if($counter_check==0) { $arrRet[$valueSchools["schoolno"]] = $valueSchools["schoolno"]; }
	}	
	return $arrRet;
}

// to fetch history based on schoolcode and product by semin firasta
function school_history($product, $schoolCode)
{
    $data = array();
    if($product == 'asset'){
        $query = "SELECT no_of_students as no_of_students, amount_payable as amount_payable, core_rate, test_edition
                  FROM school_status 
                  LEFT JOIN aos_classWiseRate ON school_status.sno = aos_classWiseRate.sno
                  WHERE (amount_payable > 0 OR ssf_number<>'') 
                  AND test_edition IN ('B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W')
                  AND school_code = '".$schoolCode."' 
                  GROUP BY 
	                  CASE
	                  WHEN test_edition IN ('B','C') THEN '2006'
	                  WHEN test_edition IN ('D','E') THEN '2007'
	                  WHEN test_edition IN ('F','G') THEN '2008'
	                  WHEN test_edition IN ('H','I') THEN '2009'
	                  WHEN test_edition IN ('J','K') THEN '2010'
	                  WHEN test_edition IN ('L','M') THEN '2011'
	                  WHEN test_edition IN ('N','O') THEN '2012'
	                  WHEN test_edition IN ('P','Q') THEN '2013'
	                  WHEN test_edition IN ('R','S') THEN '2014'
	                  WHEN test_edition IN ('T','U') THEN '2015'
	                  WHEN test_edition IN ('V','W') THEN '2016'
	                  END 
                  ORDER BY test_edition";
        $execute_query = mysql_query($query);
        
        $year = array('B'=>'2006','C'=>'2006','D'=>'2007','E'=>'2007','F'=>'2008','G'=>'2008','H'=>'2009','I'=>'2009',
        			'J'=>'2010','K'=>'2010','L'=>'2011','M'=>'2011','N'=>'2012','O'=>'2012','P'=>'2013','Q'=>'2013',
        			'R'=>'2014','S'=>'2014','T'=>'2015','U'=>'2015','V'=>'2016','W'=>'2016');
        
        while($get_data = mysql_fetch_array($execute_query)){
            $data['asset'][$year[$get_data['test_edition']]] = $get_data;
        }
    }
    else if($product == 'da'){
        $query = "SELECT year,amount_payable,total_students FROM da_orderMaster WHERE schoolCode='".$schoolCode."' order by year";
        $execute_query = mysql_query($query);
        while($get_data = mysql_fetch_array($execute_query))
            $data['da'][$get_data['year']] = $get_data;
    }
    else if($product == 'ms'){
        $query = "SELECT year,net_payable,total_students FROM ms_orderMaster WHERE schoolCode='".$schoolCode."' order by year";
        $execute_query = mysql_query($query);
        while($get_data = mysql_fetch_array($execute_query))
            $data['ms'][$get_data['year']] = $get_data;
    }
        
    return $data;
}

// function to return zm as a array 
	function getZMArr(){
		$zmArr =array();
		$query = "SELECT name, region FROM marketing where CATEGORY ='".CONSTANT('ZM_CATEGORY')."' ";
		$execute_query = mysql_query($query);
 		while($row = mysql_fetch_array($execute_query)){
 			$regionArr = explode(",",$row['region']);
 			foreach($regionArr as $ky => $region){
 				$zmArr[$region] = $row['name'];
 			}
 		}

 		if(isset($zmArr[CONSTANT('SPL_REGION')])){
 			$zmArr[CONSTANT('SPL_REGION')] = CONSTANT('B-M-H_ZM');
 		}
 		return $zmArr;
	}
	
	function getAcademicYear($schoolCode,$calledDate)
	{
		$sq = "SELECT year FROM educatio_educat.ms_orderMaster WHERE start_date<='$calledDate' AND end_date>='$calledDate' AND schoolCode=$schoolCode";
		$rs = mysql_query($sq);
		$rw = mysql_fetch_array($rs);
		return $rw[0];
	}
	
function getConditionAccordingToLoggedIn($category,$name,$salesCategory,$selected,$report_flag=0,$region="")
{
	$person=array();
	if(in_array($category,$salesCategory)) {
		$person=getDownLine($name);
		array_push($person,$name);
	}
	else {
		if($report_flag==1){
			$person=getSalesPeople("'STL',SRM','RM'");
			//array_push($person,'subhamita','sunilk');
		}
		else{	
			
			if($category == "ZM" || $category == "SZM"){
				$person = getPersonByCategoryAndRegion("'RM','SRM','STL',SUMA','SUM'",$region);
				array_push($person,$name);
			
			}else if($category == "RM" || $category == "SRM" || $category == "STL"){
				$person = getPersonByCategoryAndRegion("'SUM','SUMA'",$region);
				array_push($person,$name);
			}else{
				$person=getSalesPeople("'EA','RM','STL','ZM','SZM',SRM','SZM','NSM','ISM','SUM','SUZM','SUMA','BDE','TC','SH'");	
				array_push($person,$name);
			}
		}
	}
	return $person;
}
?>