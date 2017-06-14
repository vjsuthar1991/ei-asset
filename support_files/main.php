<?php
set_time_limit (0);   //Otherwise quits with "Fatal error: Maximum execution time of 30 seconds exceeded"
error_reporting(E_ERROR);
/**
 * This functionality to compress page contents and  increase speed significantly
 * @author Kirti Kumar <kirti.nayak@ei-india.com>
 */
//@ini_set('zlib.output_compression', 'on');
ob_start();

include("check.php");
include("reporting/library.php");
include_once("common_functions.php");
include_once("assetCheck.php");
checkPermission("MNU");

$Name=$_SESSION["username"];
/*if(isset($_SESSION['username']) && $_SESSION['username']!="" && $_SESSION['password']!='checksystem' && $_SESSION['password']!="guestlogin")
trackCokies($_SESSION['username'],$link);*/
//@include("trackUsage.php");

#authorized users for Admin menu
$AuthorizedAdmin = array("ishwar","shirish.patel","shaji.chacko","archana.katara","sudhir.prajapati","hardik.jani");
$AuthorizedSSFViewUsers = array("RM","ZM","SRM","EA","NSM");
$AuthorizedPricingViewUsers = array("ZM","NSM");

function format_date($date1)
{
	$date1 = substr($date1,8,2)."/".substr($date1,5,2)."/".substr($date1,0,4);
	return $date1;
}

function getEmpNo($userID)
{
	$empNo= "";
	$query="SELECT empNo FROM emp_master WHERE userID='$userID'";
	$result=mysql_query($query) or die(mysql_error());
	$user_row=mysql_fetch_array($result);
	$empNo = $user_row['empNo'];

	return $empNo;
}
$query="SELECT name, fullname, category, appRights, email, region FROM marketing WHERE name='$Name' UNION SELECT name, fullname, category, appRights, email, region FROM guest_login WHERE name='$Name'";
$result=mysql_query($query) or die(mysql_error());
$user_row=mysql_fetch_array($result);
$fullname=$user_row['fullname'];
$rights=$user_row['appRights'];
$category = $user_row['category'];
$appRights = explode(",",$rights);

/**********************************Popup Pending Test*************************************/
$region = $user_row['region'];
if(($category=="RM" || $category=="REM" || $category=="ZM") && $_REQUEST["hdnaction"]!="UserLogout")
{

	$schoolsSelected = array();
	$whereClause.=" AND b.start_date <= '".date('Y-m-d')."' AND b.end_date >= '".date('Y-m-d')."'";

	if($category=='RM' || $category=='REM')
	$whereClause.=" AND ( keyAccount='".$Name."' OR buddyAccount='".$Name."') ";
	elseif($category=="ZM" || $category=="SRM")
	$whereClause.=" AND ( region='".$region."')";

	$whereClause.=" ORDER BY schoolname ";

	$joinCategory=array("RM","REM");

	if(in_array($category,$joinCategory))
	$queryGetschoolDetails="SELECT b.schoolCode FROM schools a, sales_allotment_master  c, da_orderMaster  b  WHERE 1=1 AND a.schoolno=b.schoolCode AND a.schoolno=c.schoolCode AND b.schoolCode=c.schoolCode AND product='da' ".$whereClause;
	else $queryGetschoolDetails="SELECT b.schoolCode FROM schools  a LEFT JOIN sales_allotment_master c ON (a.schoolno=c.schoolCode AND product='da') , da_orderMaster  b  WHERE 1=1 AND a.schoolno=b.schoolCode ".$whereClause;

	$resultGetschoolDetails = mysql_query($queryGetschoolDetails) or die(mysql_error());
	while($rowGetschoolDetails = mysql_fetch_array($resultGetschoolDetails))
	{
		$schoolsSelected[$rowGetschoolDetails["schoolCode"]] = $rowGetschoolDetails["schoolCode"];
	}
	/*echo '<pre>';
	print_r($schoolsSelected);
	echo '</pre>';*/
	$getArray = array();
	foreach($schoolsSelected as $keyschool=>$valueschool)
	{
		$queryFinal = "SELECT SUM(IF(status = 'Approved',1,0)) as delivered,SUM(IF((status = 'Approved' AND response_received = 0),1,0)) as test_not_taken
                  FROM da_testRequest a,da_examDetails b,schools c
                  WHERE a.id = b.request_id AND a.schoolCode = c.schoolno AND schoolCode != '2387554'
                  AND schoolCode != '0' AND type = 'actual' AND schoolCode = $valueschool AND
                  a.delivery_date <= DATE_SUB(CURDATE(),INTERVAL 1 MONTH) GROUP BY schoolCode";
		$resultFinal = mysql_query($queryFinal) or die(mysql_error());
		if($rowFinal = mysql_fetch_array($resultFinal))
		{
			$percentage = round(($rowFinal["test_not_taken"]*100)/($rowFinal["delivered"]));
			if($percentage >= 15)
			{
				$getArray[$valueschool] = array("delivered"=>$rowFinal["delivered"],"test_not_taken"=>$rowFinal["test_not_taken"]);
			}
		}
	}

	if(isset($getArray) && count($getArray)>0){
    ?>
        <script language="Javascript">
        //window.setTimeout("openPopupWindow()",5000);
        function openPopupWindow()
        {
        	window.open("popupPendingTest.php?region="+'<?php echo $region;?>'+"&Name="+'<?php echo $Name;?>'+"&category="+'<?php echo $category;?>',"Pending_Delivered_Test_Report","height=250,width=350,left=200,top=100,scrollbars=yes,resizable=no");
        }
        </script>
 <?php
		//echo "<a href='popupPendingTest.php?region=".$region."&Name=".$Name."&category=".$category."' target=_blank>View Pending Tests Schools</a>";
		echo "<a href='javascript:openPopupWindow()'>View Pending Tests Schools</a>";
	}

}

/**
 * function to save user selected menu items customized and sent by ajax
 * @author Kirti Kumar <kirti.nayak@ei-india.com>
 * @return string Success or Failure message
 * @param string $menu HTML notation for the ul/li menu
 */
if (!function_exists('saveCustomMenu')) {
	function saveCustomMenu($menu) {
		if (!isset($menu) or (trim($menu) === '')) {
			return 'Sorry, You can\'t save a blank menu';
		}
		// CAUTION:: please replace the session index where it can find out the username
		// sql to check whether or not the user has previously stored some menu
		$checkMenuSql='select userid from custom_menu where userid = "'. $_SESSION['username'] . '"';
		$checkRes = mysql_query($checkMenuSql) or die(mysql_error());
		// if the result returns minimum one row, then user already has one custom menu
		// so we must edit that to save space
		// else we have to insert a new row for the user
		if (mysql_num_rows($checkRes) < 1) {
			$menuSaveSql = 'insert into custom_menu values ("", "'. $_SESSION['username'] .'", "'. trim($menu) .'")';
		} else {
			$menuSaveSql = 'update custom_menu set menu_pref = "'. trim($menu) .'" where userid = "'. $_SESSION['username'] .'"';
		}
		$menuSaveRes = mysql_query($menuSaveSql);
		// if the query has been successful, return a success message else error with cause
		if ($menuSaveRes) {
			return 'Your menu preference has been successfully saved';
		} else {
			return 'Some error occured while saving\nDetails: '.  mysql_error();
		}
	}
}

// check whether option for saving customized menu has been set;
// if so, then check if the data required has been set or print an error message
if (isset($_POST['option']) and ($_POST['option'] === 'saveCustomMenu') and isset($_POST['customMenuHtml'])) {
	// call the predefined function to handle the option
	echo saveCustomMenu($_POST['customMenuHtml']);
	exit();
}

/**********************************Popup Pending Test *************************************/

$arrMarketingTelecallingRights = array("heena.kohli","bindu","ovais.ajmeri");
$queryGettourDetails = "SELECT tour_no,start_date,end_date FROM tour_expense_master WHERE tour_status = 'running' AND name='".$_SESSION['username']."' ORDER BY tour_no asc";
$resultGettourDetails = mysql_query($queryGettourDetails) or die(mysql_error());
$rowGettourDetails = mysql_fetch_array($resultGettourDetails);
if(mysql_num_rows($resultGettourDetails) > 0)
{
	if(date('Ymd') >= str_replace('-','',$rowGettourDetails['end_date']) && str_replace('-','',$rowGettourDetails['start_date']) >= '20080325')
	{
		echo "Your tour(".$rowGettourDetails['tour_no'].") from date: ".format_date($rowGettourDetails['start_date'])." to date: ".format_date($rowGettourDetails['end_date'])." is pending to be claimed in to the system.";
	}
}
if(in_array('DRE',$appRights))
{
	require("valid_login.php");
}
$querySSFUsers = "SELECT userID FROM emp_master WHERE desig in('Academic and School Relationship Head','Asst. Manager - Accounts','Asst. Manager - Marketing Communications','AVP - Mindspark','AVP - Test Development','Chief Operating Officer','Chief Technology Officer','Director - Marketing','EA to Director','Data Analyst',
															   'Head - Programme Implementation','Head-International Sales','Head-National Sales','Logistics Executive','Manager - Logistics','Manager - Sales Training And Development','Managing Director','Sales Coordination Executive','Sr. Public Relations Executive','Vice President - Language Products','VP - Assessments','VP - Product Marketing','VP - Sales','VP - Strategic Relationships','Zonal Head - North and East','Zonal Head - South','Zonal Manager','Zonal Manager - Gujarat, West & Mumbai','Financial Controller','Executive Assistant','Assistant Manager - Sales Coordination') 
				  UNION SELECT userId FROM contract_master WHERE  desig IN ('Director')";
$resultSSFUsers = mysql_query($querySSFUsers) or die(mysql_error());
while ($rowSSFUsers = mysql_fetch_array($resultSSFUsers)) {
	$arraySSFUsers[] = $rowSSFUsers["userID"];
}
function logout()
{
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	session_destroy();
	echo "<script language='javascript'>window.location.href='index.php'</script>";
}
if($_POST["hdnaction"] == "UserLogout"){
	logout();
}
$msg = ob_get_contents();
//ob_end_flush();
ob_end_clean();
//$msg= str_replace(array('<html>', '<body>', '</html>', '</body>', '<head>', '</head>',"<font face='Arial' color='blue'>",'<b>','</b>','</font>','<center>','</center>','<!--','-->','<br/>','<br>','\n', '\r','\r\n','\r\n\r\n'),'',$msg);
$msg= str_replace(array('<html>', '<body>', '</html>', '</body>', '<head>', '</head>',"<font face='Arial' color='blue'>",'<b>','</b>','</font>','<center>','</center>'),'',$msg);
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>Educational Initiatives User Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="ei-erp/css/metro-bootstrap.css" type="text/css">
        <link rel="stylesheet" href="ei-erp/css/icons.min.css" type="text/css">
        <link rel="stylesheet" href="ei-erp/css/custom.min.css" type="text/css">
        <link rel="stylesheet" href="ei-erp/css/jquerytour.min.css" type="text/css">
        <link rel="stylesheet" href="ei-erp/css/jquery-ui.css" type="text/css">
        <link rel="stylesheet" href="ei-erp/css/metro-bootstrap-responsive.css" type="text/css">
        <!-- Javascript libs -->
        <script src="ei-erp/js/jquery/jquery.min.js"></script>
        <script src="ei-erp/js/jquery/jquery.ui.min.js"></script>
        <!-- Metro UI CSS JavaScript plugins -->
        <script src="ei-erp/js/metro/mins/metro-pkd.min.js"></script>
        <script src="ei-erp/js/custom.min.js"></script>
        <script src="shashanka/apr.js"></script>
		<link rel="stylesheet" href="ei-erp/css/intranet_alert.css" />
		<!-- /Javascript links ended -->
		<script>
			function event_close(){

				document.getElementById('event_div').style.display='none';
				document.getElementById('event_fade').style.display='none';
			}
	   </script>
    </head>
    <body class="metro">
        <!-- Top fixed position notification -->
         <div class="topnotice">
            <div class="noticecontents" <?php if(isset($msg) && trim($msg) != '') echo 'style="display:block"'; else echo 'style="display:none !important"'; ?>>
                <span id="msg"><?php if(isset($msg) && (trim($msg) !== '')) echo $msg; ?></span>
                <a href="javascript:void(0);" class="cancel place-right"><i class="icon-cancel"></i></a>
            </div>
        </div>
		<script type="text/javascript">
			(function(){
				var $msg  = $('#msg');
				var msgContent = $("#msg").clone().find("script,noscript,style,form,br").remove().end().html()
				//var msgContent = $msg.html().find('script').find('form').remove();
				if($.trim(msgContent) === ''){
					$msg.closest('.topnotice').css("display", "none");
				}

			})();
		</script>
        <!-- /end Top fixed position notice -->
        <!-- Nav Bar Starts -->
        <nav class="navigation-bar" id="topnav">
            <nav class="navigation-bar-content">
                <div class="element no-padding">
                    <div id="logo">
                        <h2>Welcome to Educational Initiatives!</h2>
                    </div>
                </div>
                <div class="element place-right profile">
                    <a class="dropdown-toggle" href="#">
                        <span class="profileicon">
                        <?php
                        $empNo = getEmpNo($Name);
                        if ($empNo != ""){
                        	$empNo = str_replace('-', '', $empNo);
                        	$photoPath = "empdb/photos/".$empNo.".jpg";
                        	if (file_exists($photoPath))
                        	echo "<img src='".$photoPath."' alt='Profile Image' />";
                        }
                        ?>
                        </span>
                        <span class="profile-name">
                        <?php
                        $fullnameArray = explode(" ",$fullname);
                        echo 'Hi &nbsp;' . $fullnameArray[0];
                        ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu place-right tour_1" data-role="dropdown">
                        <li><a href="empdb/edit_personal_info.php">Edit Profile</a></li>
                        <li><a href='/ChangePassword.php'>Change Password </a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </div>

                <span class="element-divider place-right"></span>
                <a class="element place-right tour_2" style="padding: 11px;background-color: #f26724" href="kudos/home.php" data-hint="KUDOS|Click Here to go to KUDOS" data-hint-position="bottom">
                    <span style="font-size: 24px !important;" class="icon-thumbs-up"></span>
                </a>
                <span class="element-divider place-right"></span>
                <a class="element place-right tour_3" style="padding: 11px;background-color: #b0d466" href="pa/speak_up/speakup.php" data-hint="Speak Up|Click Here to go for a speak up" data-hint-position="bottom">
                    <span style="font-size: 24px !important;" class="icon-mic"></span>
                </a>
                <span class="element-divider place-right"></span>
                <!-- <a class="element place-right  tour_4" href="javascript:void(0);" style="padding: 13px;background-color: #fbd30f" data-hint="U &amp; I|Coming Soon" data-hint-position="bottom">-->
                <a class="element place-right  tour_4" href="forum/" style="padding: 13px;background-color: #fbd30f" data-hint="U &amp; I|Click Here to go to U &amp; I forum" data-hint-position="bottom">
                    <span style="font-size: 20px !important;" class="icon-comments-4"></span>
                </a>
                <span class="element-divider place-right"></span>
            </nav>
        </nav>
        <!-- /End Nav Bar -->
        <!-- Download bar and breadcrumb under Nav Bar -->
        <div class="grid fluid" id="breadcrumb">
            <div class="row" style="background-color: #EBEBEB;">
                <div class="span2">
                    <div class="row tour_5">
                        <a class="button span3" style="background-color: #33abdf" data-hint="Employee Manual|Click Here to download employee manual" data-hint-position="right" href="hr_manuals/EI_Employee_Manual.pdf" target="_blank">
                            <i class="ms_sample_letter_grey_scale iconSmall"></i>
                        </a>
                        <a class="button span3" style="background-color: #fbd30f" data-hint="ASSET Brochure|Click Here to download ASSET Brochure" data-hint-position="right" href="hr_manuals/ASSET_V2_2016.pdf" target="_blank">
                            <i class="ASSET_brouchere iconSmall"></i>
                        </a>
                        <a class="button span3" style="background-color: #b0d466" data-hint="Detailed Asessment Brochure|Click Here to download Detailed Asessment Brochure" data-hint-position="right" href="hr_manuals/DA_V2_2016.pdf" target="_blank">
                            <i class="DA_brouchere iconSmall"></i>
                        </a>
                        <a class="button span3" style="background-color: #f26724" data-hint="Mindspark Brochure|Click Here to download Mindspark Brochure" data-hint-position="right" href="hr_manuals/MINDSPARK_V2_2016.pdf" target="_blank">
                            <i class="Mindspark_brouchere iconSmall"></i>
                        </a>
                    </div>
                </div>
                <div class="span10">
                    <nav class="breadcrumbs">
                        <ul>
                            <li><a href="#"><i class="icon-home"></i>Home</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- /End Download bar and breadcrumb under Nav Bar -->

        <div class="grid fluid" style="background-color: #EBEBEB;">
            <div class="row">
                <!-- left bar start -->
                <div class="span2">
                    <!-- Left Nav Bar -->
                    <div class="accordion span12 sidemenu left-scroll" id="sideMenu">
                        <div class="accordion-frame">
                            <a class="heading tour_6" href="#"><i class="Asset-Development iconBig"></i>ASSET</a>
                            <div class="content no-margin no-padding tour_7">
                                <ul class="dropmenu no-bullet no-margin">
                                    <?php
                                    // codes from previous home page
                                    $arrFreelancers = array(
                                    'jayashree.suresh',
                                    'rahul.raveendran',
                                    'samuel.raghavan',
                                    'benjamin.talreja',
                                    'hardik.shah',
                                    'deepanti.khatri',
                                    'hardik.radia',
                                    'catherine.raghavan',
                                    'anuradha.muthu',
                                    'regina.talreja',
                                    'lari.dkhar',
                                    'siraj.ahmed',
                                    'prabha.ignatius',
                                    'lavanya.lakshminarayan',
                                    'christine.charanghat',
                                    'simi.thomas',
                                    'harasu.infotech',
                                    'jean.monisse',
                                    'outsource.india',
                                    'susanna.athaide',
                                    'leah.levillard',
                                    'roshika.talreja',
                                    'dinah.levillard',
                                    'daniel.talreja',
                                    'vijayavani.samuel',
                                    'pritish.reddy',
                                    'srikavya.ravilla',
                                    'remya.guruviah',
                                    'rudra.naik',
                                    'shraddha.dey',
                                    'priyam.liz',
                                    'aureen.mary'
                                    );
                                    if(!in_array($_SESSION["username"],$arrFreelancers) ){
                                    ?>
                                    <li><a href='/questions/select.php'><i class="question_bank_grey_scale iconSmall"></i>Question Bank</a></li>
                                    <li><a href='/QMS/qms_home.php'><i class="question_making_system_grey_scale iconSmall"></i>Question Making System</a></li>
                                    <li><a href='/questions/select_questions.php'><i class="ei_manual_upload_grey_scale iconSmall"></i>Paper Making System</a></li>
                                    <li><a href='/questions/add_correct_answers.php'><i class="correct_answers_greyscale iconSmall"></i>Correct Answers</a></li>
                                    <li><a href='/questions/misconception.php'><i class="misconceptions_greyscale iconSmall"></i>Misconception</a></li>
                                    <li><a href='/questions/show_pbc.php'><i class="pbc_search_greyscale iconSmall"></i>PBC Search</a></li>
                                    <li><a href='/questions/formatting.php'><i class="formating_greyscale iconSmall"></i>Formatting</a></li>
                                    <li><a href='/QMS/imageformatting.php'><i class="image_formating_greyscale iconSmall"></i>Image Formatting</a></li>
                                    <li><a href='/QMS/search_passage.php'><i class="search_passage_grey_scale iconSmall"></i>Search Passage</a></li>
                                    <li><a href='/questions/mapping.php'><i class="topic_subtopic_mapping_grey_scale iconSmall"></i>Topic-Subtopic Mapping</a></li>
                                    <?php } ?>
            						<li><a href='<?=constant("SITEURL");?>aqadci/'><i class="aqad_social iconSmall"></i>AQAD- Social</a></li>
                                    <li><a href='/quesbank/search_question.php'><i class="icon-database"></i>Common Question Bank</a></li>
                                    <li><a href='/tgs/tgadmin_main.php'><i class="icon-printer"></i>Test Generation System</a></li>
                                    <li><a href='/questions/teacher_sheet/'><i class="icon-new"></i>Teacher Sheet Digitization</a></li>

                                    <li><a href='http://www.assetonline.in' target='_blank'><i class="asset_order_system_grey_scale iconSmall"></i>Assetonline Website</a></li>
                                </ul>
                            </div>
                        </div>
                        <?php if($category != 'SCO' && $category != 'DCO'){ ?>
                        <div class="accordion-frame">
                            <a class="heading collapsed" href="#"><i class="detailed_assessment iconBig"></i>Detailed Assessment</a>
                            <div class="content no-margin no-padding">
                                <ul class="dropmenu no-bullet no-margin">
                                    <li><a href='/detailed_assessment/daAdmin_main.php'><i class="da_development_grey_scale iconSmall"></i>DA - Development</a></li>

                                    <li><a href='/detailed_assessment/dareports_index.php'><i class="da_reports_grey_scale iconSmall"></i>DA - Reports</a></li>
                                    <li><a href='/detailed_assessment/daAdmin_testRequestSummary.php'><i class="da_test_request_summary_grey_scale iconSmall"></i>DA - Test Request Summary</a></li>
                                    <li><a href='/detailed_assessment/daAdmin_tabletlisting.php'><i class="da_tablet_grey_scale iconSmall"></i>DA - Tablet</a></li>
                                    <li><a href='/detailed_assessment/daAdmin_todaysTestSchool.php'><i class="da_todays_test_school_grey_scale iconSmall"></i>DA - Todays Test Schools</a></li>
                                    <li><a href='/detailed_assessment/daAdmin_support.php'><i class="da_support_grey_scale iconSmall"></i>DA - Support</a></li>
                                    <!--<li><a href='#' onClick="submitForm('da')"><i class="task_tracker_grey_scale iconSmall"></i>Task Tracker</a></li>-->
                               </ul>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="accordion-frame">
                            <a class="heading collapsed" href="#"><i class="lsa iconBig"></i> LSA</a>
                            <div class="content no-margin no-padding">
                                <ul class="dropmenu no-bullet no-margin">
                                    <li><a href='/new_Guj.php'><i class="gujarat_irs_grey_scale iconSmall"></i>Gujarat - IRC</a></li>
                                    <li><a href='/biharWebsite/bhr_login.php'><i class="gujarat_irs_grey_scale iconSmall"></i>Bihar - IRC</a></li>
                                    <li><a href='/GujaratGunotsav/questionPerformance.php'><i class="gunotsav_performance_grey_scale iconSmall"></i>Gunotsav Performance</a></li>
                                    <li><a href='#' onClick="submitAddressDBForm('lsa')"><i class="lsa_bd_interaction_system_grey_scale iconSmall"></i>LSA BD - Interaction System</a></li>
                                    <li><a href='/lsa/lsa_projecttracker_main.php'><i class="project_milestone_system_grey_scale iconSmall"></i>Project Milestone System</a></li>
                                    <?php if(in_array('LQMS',$appRights)) { ?>
                                    <li><a href='/lsa/lqv_showTorrentPapers.php'><i class="torrent_systems_grey_scale iconSmall"></i>Torrent Gujarati Papers</a></li>
                                    <?php if($category!="Guest") { ?>
                                    <li><a href='/lsa/lsa_projectwise_rawscore_status.php'><i class="question_making_system_grey_scale iconSmall"></i>Question Making System (old)</a></li>
                                    <?php } ?>
                                    <?php } ?>

									<?php
                                        echo "<li><a href='http://54.251.245.119/lsa_systems/LIS/login/makeSession/".$_SESSION["username"]."/".base64_encode($_COOKIE["PHPSESSID"])."' target='_blank'><i class='question_making_system_grey_scale iconSmall'></i>LIS</a></li>";
                                    ?>
                                    <li><a href='/msb/index.htm'><i class="msb_reports_grey_scale iconSmall"></i>MSB Reports</a></li>
                                    <li><a href='/msbonline/msb_main_screen.php'><i class="msb_analysis_grey_scale iconSmall"></i>MSB Analysis</a></li>
                                    <li><a href='/indiatoday/show_schools.php'><i class="india_today_school_grey_scale iconSmall"></i>India Today Schools</a></li>
                                    <li><a href='http://www.ei-india.com/student-learning-in-the-metros-study/'><i class="india_today_on_ei_grey_scale iconSmall"></i>India Today - On EI</a></li>
                                    <li><a href='http://www.ei-india.com/projects/metrostudy/metro.php'><i class="india_today_irc_grey_scale iconSmall"></i>India Today - IRC</a></li>
                                    <li><a href=' http://www.ei-india.com/wp-content/uploads/2012/07/India_Today_Full_Report.pdf' target="_blank"><i class="india_today_reports_grey_scale iconSmall"></i>India Today Reports</a></li>
                                    <li><a href='/QES/show_schools.php'><i class="qes_irc_grey_scale iconSmall"></i>QES Schools</a></li>
                                    <li><a href='/WiproQES/qes_StudyGraph_Display.php'><i class="qes_irc_grey_scale iconSmall"></i>QES - IRC</a></li>
                                    <li><a href='/bhutan/bt_userLogin.php'><i class="bhutan_sats_grey_scale iconSmall"></i>Bhutan SATS</a></li>
                                    <li><a href='/bhutan/ASSL_StudyGraph_Display_V.php'><i class="assl_2008_grey_scale iconSmall"></i>ASSL 2008 - IRC</a></li>
                                    <li><a href='/bhutan/ASSL_StudyGraph_Display_W.php'><i class="assl_2010_grey_scale iconSmall"></i>ASSL 2010 - IRC</a></li>
                                    <li><a href='/bhutan/ASSL_StudyGraph_Display_X.php'><i class="assl_2011_grey_scale iconSmall"></i>ASSL 2011 - IRC</a></li>
                                    <li><a href='/bhutan/ASSL_DataReports_2008/'><i class="assl_2008_reports_grey_scale iconSmall"></i>ASSL 2008 - Reports</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-frame">
                            <a class="heading collapsed" href="#"><i class="mindspark iconBig"></i> Mindspark</a>
                            <div class="content no-margin no-padding">
                                <ul class="dropmenu no-bullet no-margin">
                                    <li><a href='http://www.mindspark.in' target='_blank'><i class="icon-chrome"></i>Mindspark Website</a></li>
                                    <li><a href="/mindspark/top_links.php"><i class="development_interface_grey_scale iconSmall"></i>Development Interface</a></li>
                                    <li><a href="/mindspark/report_search.php"><i class="report_sections_grey_scale iconSmall"></i>Reports Section</a></li>
                                    <li><a href="/mindspark/TT_clusterList.php?msAsStudent=true"><i class="do_as_a_student_grey_scale iconSmall"></i>Do as a student</a></li>
                                    <li><a href="/mindspark/teacherForum.php"><i class="do_as_a_student_grey_scale iconSmall"></i>Teacher Forum</a></li>
                                    <!--<li><a href="javascript:void(0);" onClick="submitForm('Mindspark')"><i class="task_tracker_grey_scale iconSmall"></i>Task Tracker</a></li>-->

                                    <li><a href="/mindspark/school_registration/school_summary_table.php"><i class="school_registration_system_grey_scale iconSmall"></i>School Registration System</a></li>
                                    <li><a href="/mindspark/performance_analysis_menu.php"><i class="performance_analysis_grey_scale iconSmall"></i>Performance Analysis</a></li>
                                    <li><a href="/mindspark/school_time_holiday_view.php"><i class="ms_school_timings_grey_scale iconSmall"></i>MS School Timings</a></li>
                                    <li><a href="hr_manuals/ms_guide.html" target="_blank"><i class="ms_teacher_manual_grey_scale iconSmall"></i>MS User Manual</a></li>
                                    <li><a href="shashanka/ms_training/" target="_blank"><i class="ms_support_manual_grey_scale iconSmall"></i>MS Training Module</a></li>

                                    <li><a href="https://sites.google.com/a/ei-india.com/mindsparktasks-compilation/mindspark-math---topic-owners" target="_blank"><i class="icon-file"></i>MS Topic Owners</a></li>
                                    <li><a href="https://sites.google.com/a/ei-india.com/mindsparktasks-compilation/ms-features-ownership" target="_blank"><i class="icon-file"></i>MS Feature Owners</a></li>

                                    <li><a href="https://sites.google.com/a/ei-india.com/mindsparktasks-compilation/home/mindspark-roadmap" target="_blank"><i class="ms_road_map_grey_scale iconSmall"></i>MS Road Map</a></li>
                                    <li><a href="/mindspark/gamesMasterList.php"><i class="sign_off_systems_grey_scale iconSmall"></i>Sign Off System</a></li>
                                    <li><a href="https://sites.google.com/site/eihtml5/home/games" target="_blank"><i class="icon-file"></i>HTML5 Repository</a></li>
                                    <!--<li><a href="http://mindspark.in/mindspark/reportError.php" target="_blank"><i class="report_error_grey_scale iconSmall"></i>Report Error</a></li>-->
                                    <li><a href="/mantisbt/login_page.php"><i class="report_error_grey_scale iconSmall"></i>IT Task Tracker</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-frame">
                            <a class="heading" href='/MS_center/index.php' onclick="window.location=$(this).attr('href')"><i class="icon-lamp iconBig" style="margin-left: 2px;margin-right: 1px;color: #f9d10f;font-size: 20px;"></i> Mindspark Center</a>
                        </div>
                        <div class="accordion-frame">
                            <a class="heading collapsed" href="#"><i class="mindspark_language iconBig"></i> Mindspark Language</a>
                            <div class="content no-margin no-padding">
                                <ul class="dropmenu no-bullet no-margin">
                                    <li><a href='/MSLang_guj/allotment.php'><i class="development_interface_grey_scale iconSmall"></i>Development Interface</a></li>
                                    <li><a href="/MSLang_guj/doMSStudent.php?msAsStudent=true"><i class="do_as_a_student_grey_scale iconSmall"></i>Do Bhasha as a student</a></li>
                                    <li><a href='MSMath_translation/time.php'><i class="icon-file"></i>MS Math Translation</a></li>
                                    <li><a href="/MSMath_translation/TT_clusterList.php?msAsStudent=true"><i class="do_as_a_student_grey_scale iconSmall"></i>Do Maths as a student</a></li>
                                    <li><a href='/MSLang_guj/report/performance_analysis_menu.php'><i class="performance_analysis_grey_scale iconSmall"></i>Performance Analysis</a></li>
                                    <li><a href='/MSLang_guj/report/school_time_holiday_view.php'><i class="ms_school_timings_grey_scale iconSmall"></i>MS School Timings</a></li>
                                    <?php
                                    $arrAllRights = array("sridhar","muntaquim","anand.mishra","arpit","chirag.vijay","devpal","dhaval.chavda","hemant.dige");
                                    if(in_array($_SESSION['username'],$arrAllRights)) {
                                    ?>
                                    <li><a href='/MSLang_guj/sync/syncSchools.php' target="_blank"><i class="icon-file"></i>Synchronize Data</a></li>
                                    <?php } ?>
                                    <li><a href='/torrentst/tst_userLogin.php'><i class="torrent_systems_grey_scale iconSmall"></i>Torrent System</a></li>
                                    <li><a href='/mslanguage/src/allotment.php'><i class="development_interface_grey_scale iconSmall"></i>MS English</a></li>
								</ul>
                            </div>
                        </div>
                        <?php
                        $approverList = array();
                        $specificApproverList = array();
                        $queryApprover = "select authority1,authority2 from sbu_master";
                        $approver_result = mysql_query($queryApprover) or die(mysql_error());
                        while($approver_line = mysql_fetch_array($approver_result))
                        {
                        	array_push($approverList,$approver_line['authority1']);
                        	array_push($approverList,$approver_line['authority2']);
                        }
                        $approverUniqueList = array_unique($approverList);

                        $querySpecificSbuhead = "select authority1,authority2,sbu_head,authority4,authority6 from sbu_master ";
                        $specificapprover_result = mysql_query($querySpecificSbuhead) or die(mysql_error());
                        while($spapprover_line = mysql_fetch_array($specificapprover_result))
                        {
                        	array_push($specificApproverList,$spapprover_line['authority1']);
                        	array_push($specificApproverList,$spapprover_line['authority2']);
                        	if($spapprover_line['authority4'] != "") {
                        		array_push($specificApproverList,$spapprover_line['authority4']);
                        	}
                        	if($spapprover_line['authority6'] != ""){
                        		array_push($specificApproverList,$spapprover_line['authority6']);
                        	}
                        	array_push($specificApproverList,$spapprover_line['sbu_head']);
                        }
                        $spapproverUniqueList = array_unique($specificApproverList);
                         ?>
                        <div class="accordion-frame">
                            <a class="heading" href="#"><i class="accounts iconBig"></i>Accounts</a>
                            <div class="content no-margin no-padding">
                            <?php
                            if(in_array('AFS',$appRights)
                            || $Name == "muntaquim"
                            || $Name == "archana.katara"
                            || $Name == "rahul"
                            || $Name == "charisma"
                            || in_array($Name,$approverUniqueList)
                            || $Name == "harit"
                            || $Name == "rashi.gupta"
                            || $Name == "manoj.michael"
                            || $Name == "aditya.agarwal"
                            || $Name == "sudhir.prajapati"
                            || in_array($Name,$spapproverUniqueList)) {
                               ?>
                                <ul class="dropmenu no-bullet no-margin">
                                    <li><a href='/payroll/index.php'><i class="payroll_systems_grey_scale iconSmall"></i>Payroll System</a></li>
                                    <li><a href='/accounts/ffs_system'><i class="payroll_systems_grey_scale iconSmall"></i>FFS System</a></li>
                                    <li><a href='/FAMS/AssetRegister.php'><i class="asset_registration_grey_scale iconSmall"></i>Asset Register</a></li>
                                    <li><a href='/bill_expense/BillRegister.php'><i class="bill_registration_grey_scale iconSmall"></i>Bill Register</a></li>

                                    <?php
                                    if($Name == 'mihir.jhaveri'
                                    || $Name == "rupande.shah"
                                    || $Name == "ketan") {
                                    ?>
                                    <li><a href='/MS_center/enrollmentPaymentReport.php'><i class="report_sections_grey_scale iconSmall"></i>MS Center - Enrollment Payment Report</a></li>
                                    <?php } ?>
                                    <?php
                                    if($Name == "ketan"
                                    || $Name == "rupande.shah"
                                    || $Name == "sridhar"
                                    || $Name == "charisma") {
                                    ?>
                                    <li><a href='/cheque_writing/contract_salaryDetails.php'><i class="icon-file"></i>Contract Payroll</a></li>
                                    <?php } ?>
                                    <?php if(in_array('AFS',$appRights)) { ?>
                                    <li><a href='/cheque_writing/makeCheque.php'><i class="icon-file"></i>Cheque Writing System</a></li>
                                    <li><a href='/bill_expense/showtdslist.php'><i class="icon-file"></i>Show TDS List</a></li>
                                    <?php } ?>
                                    <?php
                                    if($Name == "ketan"
                                    || $Name == "rahul"){
                                    ?>
                                    <li><a href='/payroll/payroll_allowanceApproveRequest.php'><i class="icon-file"></i>Allowance Request Details</a></li>
                                    <?php } ?>
                                    <?php
                                    if($Name == "ketan"
                                    || $Name == "rupande.shah"
                                    || $Name == "sridhar"
                                    || $Name == "charisma"
                                    || $Name == "kavita.jain") {
                                    ?>
                                    <li><a href='/expenseAdvanceAdjustment.php'><i class="icon-file"></i>Advance Adjustment</a></li>
                                    <li><a href='/receipt_system/receipt_listing.php'><i class="icon-file"></i>Receipt System</a></li>
                                    <li><a href='/cheque_writing/contract_adjustments.php'><i class="icon-file"></i>Contract Adjustment</a></li>
                                    <li><a href='/budget_system/editSbuDetails.php'><i class="icon-file"></i>Sbu Details</a></li>
                                    <?php } ?>

                                    <?php
                                    if(in_array('AFS',$appRights)
                                    || $Name == "dharti.thaker"
                                    || $Name == "charisma"
                                    || $Name == "rahul"
                                    || in_array($Name,$spapproverUniqueList)) {
                                    ?>
                                    <li><a href='/budget_system_v2/summary_budget.php'><i class="icon-file"></i>Budget System Summary</a></li>
                                    <?php } ?>
                                    <li><a href='/lsa_interactions/cad_list.php'><i class="address_database_grey_scale iconSmall"></i>Address Database</a></li>
                                </ul>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="accordion-frame">
                            <a class="heading collapsed" href="#"><i class="marketing iconBig"></i> Marketing</a>
                            <div class="content no-margin no-padding">
                                <ul class="dropmenu no-bullet no-margin">
                                	<li><a href='/dashboard/index.php'><i class="marketing_dashboard iconSmall"></i>Dashboard</a></li>
                                    <li><a href='/mailers/question_a_day/search_records.php'><i class="icon-help"></i>ASSET Question-a-day(AQAD)</a></li>
                                    <li><a href='/marketing_telecalling/school_list.php'><i class="telecaller_system_grey_scale iconSmall"></i>Telecaller System</a></li>
                                    <li><a href='/ask_expert/questionListView.php'><i class="ask_an_expert_grey_scale iconSmall"></i>Ask an Expert</a></li>
                                    <?php
                                    if($Name == "bindu"
                                    || $Name == "sudhir.prajapati"
                                    || $Name == "pankhuri.nigam"
                                    || $Name == "rahul"
                                    || $Name == "mitul.patel"
                                    || $Name == "raj.padhiar"
                                    || $Name == "chetan.ranja"
                                    || $Name == "chandni.soni"
                                    || $Name == "antara.sangani"
                                    || $Name == "shrikant.patil"
                                    || $Name == "bhaumik.dalwadi"
                                    || $Name == "mitul.gohel"
                                    || $Name == "bhumi.darji"
                                    || $Name == "nisha.rawal"
                                    || $Name == "pranav.tripathi"
                                    ) { ?>
                                    <li><a href='duke_tip/duke_tip_admin_panel.php'><i class="duke_grey_scale iconSmall"></i>ATS Admin Panel</a></li>
                                    <?php } ?>
                                    <li><a href='duke_tip/ats_summary.php'><i class="duke_grey_scale iconSmall"></i>ATS - Summary</a></li>
                                    <?php if($Name == "bindu" || $Name == "sudhir.prajapati" || $Name == "rahul") { ?>
                                    <li><a href='http://www.assetonline.in/asset_online/eiaddhinduquizdetails.php'><i class="hindu_quiz_grey_scale iconSmall"></i>Hindu Quiz Details Entry</a></li>
                                    <?php } ?>
                                    <?php if(in_array('PRM',$appRights)){ ?>
				<li><a href='/mailers/einewsletter_file_upload.php'><i class="icon-upload"></i>Upload Newsletter / MediaWatch</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-frame">
                            <a class="heading collapsed" href="#"><i class="other_systems iconBig"></i> Sales &amp; Support</a>
                            <div class="content no-margin no-padding">
                                <ul class="dropmenu no-bullet no-margin">
                                    <li><a href='relationshipReport/index.php'><i class="school_relationship iconSmall"></i>School Relationship</a></li>
                                    <li><a href="aos_new/schools.php"><i class="school_databases_grey_scale iconSmall"></i>School Database</a></li>
                                    <!--<li><a href='/aos_new/summary.php'><i class="da_order_system_grey_scale iconSmall"></i>ASSET - Order System</a></li>-->
                                    <!--<li><a href='/detailed_assessment_new/os_orderList.php'><i class="da_order_system_grey_scale iconSmall"></i>DA - Order System</a></li>-->
                                    <!--<li><a href="/mos_new/orderList.php"><i class="ms_order_system_grey_scale iconSmall"></i>MS Order System</a></li>-->
                                    <li><a href="/mindspark/sales%20report/salesReports.php"><i class="school_profile_grey_scale iconSmall"></i>MS Usage Monitoring</a></li>
                                    <li><a href='https://sites.google.com/a/ei-india.com/ei-support/' target="_blank"><i class="support_visit_grey_scale iconSmall"></i>Ei-Support Portal</a></li>
                                    <li><a href="/schoolSite/internalLogin.php"><i class="school_profile_grey_scale iconSmall"></i>Order System/ School Site</a></li>
                                    <li><a href='/exceptions/Dashboard.php'><i class="support_visit_details_grey_scale iconSmall"></i>Exception Request System</a></li>
                                    <li><a href='/SIS/'><i class="school_information_system_grey_scale iconSmall"></i>School Information System</a></li>

                                    <li><a href="relationshipReport/viewInteractionHistory.php"><i class="school_profile_grey_scale iconSmall"></i>School Profile</a></li>
                                    <li><a href="relationshipReport/supportSchoolList.php"><i class="school_support_grey_scale iconSmall"></i>School Support</a></li>

                                    <li><a href='/school_support/support_visit.php'><i class="support_visit_grey_scale iconSmall"></i>Support Visit</a></li>
                                    <li><a href='/school_support/support_visit_listing.php'><i class="support_visit_details_grey_scale iconSmall"></i>Support Visit Details</a></li>
                                    <!--<li><a href='/relationshipReport/exception_summary.php'><i class="support_visit_details_grey_scale iconSmall"></i>Exception Request System</a></li>-->
   	                                <li><a href='/activity_planner/index.php'><i class="school_profile_grey_scale iconSmall"></i>Activity Planner</a></li>
    								<li><a href='/mindspark/MSIScripts/schoolAlertSystem.php'><i class="school_mis_grey_scale iconSmall"></i>MSI Alerts</a></li>
                                    <?php
                                    if(in_array($category,$AuthorizedSSFViewUsers) || in_array($_SESSION["username"],$arraySSFUsers))
                                    {
                                    ?>
	                                   	<li><a href='/uploads/Mindspark Pilots Process.pdf' target="_blank"><i class="icon-file-pdf"></i>Mindspark Pilots Process</a></li>
	                                    <li><a href='/uploads/Standard DD Declaration Form.doc' target=_blank><i class="icon-file"></i>Standard DD Declaration Form</a></li>
	                                    <li><a href='/uploads/ms_pilot_feedback_form.pdf' target=_blank><i class="icon-file-pdf"></i>Mindspark Pilot Feedback Form</a></li>
                                    <?
                                    }
                                    if(in_array($category,$AuthorizedPricingViewUsers) || in_array($_SESSION["username"],$arraySSFUsers))
                                    {
                                    ?>
                                    	<li><a href='/uploads/Consolidated_Rates_2016.pdf' target="_blank"><i class="icon-file"></i>All Product Pricing Document 2016 - India</a></li>
                                    <?
                                    }
                                    if(in_array($category,$AuthorizedSSFViewUsers) || in_array($_SESSION["username"],$arraySSFUsers))
                                    {
                                   	?>
	                                    <li><a href='/uploads/ASSET-SSF-2016.pdf' target="_blank"><i class="asset_ssf_2013_grey_scale iconSmall"></i>ASSET SSF ARO 2016</a></li>
	                                    <li><a href='/uploads/ASSET_NARO_SSF_2016.pdf' target="_blank"><i class="asset_ssf_2013_grey_scale iconSmall"></i>ASSET SSF NARO 2016</a></li>
	                                    <li><a href='/uploads/DA-SSF-2016.pdf' target="_blank"><i class="asset_ssf_2013_grey_scale iconSmall"></i>DA SSF 2016</a></li>
	                                    <li><a href='/uploads/MS-MATHS -SSF-2016.pdf' target="_blank"><i class="asset_ssf_2013_grey_scale iconSmall"></i>MS Maths SSF 2016</a></li>
	                                    <li><a href='/uploads/MS-ENG-SSF-2016.pdf' target="_blank"><i class="asset_ssf_2013_grey_scale iconSmall"></i>MS English SSF 2016</a></li>
                                    <?
                                    }
                                    ?>
									<!--<li><a href='/uploads/Consolidated_Rates_2015.pdf' target="_blank"><i class="icon-file"></i>All Product Pricing Document 2015 - India</a></li>
                                    <li><a href='/uploads/International_Rates_2014.pdf' target="_blank"><i class="icon-file"></i>All Product Pricing Document 2014 - International</a></li>-->
                                    <?php
                                    
                                    if(in_array($_SESSION["username"],$arraySSFUsers))
                                    {
                                    ?>
	                                    <li><a href='/uploads/Mindspark - Pilot Intent letter for School.doc' target="_blank"><i class="icon-file-word"></i>Mindspark - Pilot Intent letter for School</a></li>
	                                    <li><a href='/uploads/Mindspark- Pilot Intent form for Zonal Manager.doc' target="_blank"><i class="icon-file-word"></i>Mindspark- Pilot Intent form for Zonal Manager</a></li>
                                    <?php
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
							<div class="accordion-frame">
	                            <a class="heading collapsed" href="#"><i class="admin iconBig"></i> Admin</a>
	                            <div class="content no-margin no-padding">
	                                <ul class="dropmenu no-bullet no-margin">
									<?php if(in_array($Name,$AuthorizedAdmin)){ ?>
	                                    <li><a href='/deskallotment/search_desk.php'><i class="desk iconSmall"></i>Assign Desk-Extn</a></li>
	                                    <li><a href='/empdb/logReport.php'><i class="login iconSmall"></i>Login Log</a></li>
	                                <?php } ?>
										<li><a href='/request/addRequest.php'><i class="request iconSmall"></i>Request System</a></li>
                                        <li><a href='/hr_manuals/FAQs_New_ID_Card.pdf' target='_blank'><i class="idCard iconSmall"></i>FAQ's For New ID Card</a></li>
										<li><a href='/complaint/complaint.php'><i class="complain iconSmall"></i>Complaint System</a></li>
                                        <li><a href="/courier_system/search_records.php"><i class="courier iconSmall"></i>Courier System</a></li>
                                        <li><a href='/FAMS/deviceDetails.php'><i class="track iconSmall"></i>Device Tracking System</a></li>
										<li><a href='/deskallotment/EI-Extensions_HO.pdf' target="_blank"><i class="extension iconSmall"></i> HO Extension List</a></li>
										<li><a href='/deskallotment/EI-Extensions_Bangalore.pdf' target="_blank"><i class="extension iconSmall"></i> Bangalore Extension List</a></li>
									</ul>
	                            </div>
	                        </div>
						<?php if(in_array('HRP',$appRights)) { ?>
							<div class="accordion-frame">
	                            <a class="heading collapsed" href="#"><i class="hrVerticalTab iconBig"></i>HR</a>
	                            <div class="content no-margin no-padding">
	                                <ul class="dropmenu no-bullet no-margin">
	                                    <!--<li><a href='/deskallotment/search_desk.php'><i class="desk iconSmall"></i>Employee Database</a></li>
	                                    pa/speak_up/speakupentry.php<li><a href='/empdb/logReport.php'><i class="desk iconsmall"></i>Job Applications</a></li>-->

                                        <li><a href='/hr_manuals/upload_hr_manuals.php'><i class="manual iconSmall"></i>EI Manual Upload</a></li>
                                        <li><a href='/hr_manuals/edit_noticeboard.php'><i class="noticeboard iconSmall"></i>EI Noticeboard Editor</a></li>
                                        <li><a href='/pa/speak_up/speakupentry.php'><i class="speakup iconSmall"></i>Speak Up Responses</a></li>
										<li><a href='/empdb/exit_interview_details.php'><i class="exitinterviews iconSmall"></i>Exit Interviews</a></li>
	                                </ul>
	                            </div>
	                        </div>

					<?php } ?>
						<div class="accordion-frame">
                            <a class="heading"  onclick="document.getElementById('event_div').style.display='block';document.getElementById('event_fade').style.display='block'" href='javascript:void(0);'   ><i class="event iconBig" ></i>Event Calendar</a>
						</div>
						
                       </div>
                    <!-- /End left Nav bar -->
                </div>
                <!-- /end left bar -->
                <!-- right contents -->
                <div class="span10" id="fixedcontainer">
                    <!-- top menu start -->
                    <div id="tileContainer">
                        <nav class="navigation-bar bg-transparent tour_9">
                            <nav class="navigation-bar-content row">
                                <div class="element span3 topmenu blue" style="width: 30% !important">

									<a class="dropdown-toggle bigmenu" href="#">
                                        Employee Quick Links
                                    </a>
                                    <ul class="dropdown-menu" data-role="dropdown">
										<?php if(in_array('DRE',$appRights)) { ?>
                                    	 <li><a href="/reporting/report.php">Attendance and Work Report</a></li>
                                        <?php } ?>
										<li><a href='/empdb/EmployeeListView.php'>Employee Database</a></li>
                                        <li><a href="/reporting/applyForLeave.php">Leave/Tour Application</a></li>
                                        <li><a href='/ticket_booking/show_records.php'>Ticket Booking System</a></li>
                                        <li><a href='/tour_expense/tour_expense.php'>Tour Expense</a></li>
                                        <li><a href='/local_expense/local_expense.php'>Local Expense</a></li>
                                        <li><a href="/claimPaymentDetails.php">Claim Summary</a></li>
                                        <li><a href='/task_tracker/home.php'>Task Tracker</a></li>
                          				<li><a href = '/media_repository/media_summary.php'>Media Repository</a></li>
                                        <li><a href='/insideei_issues/iei_updates.php'>Inside EI Updates</a></li>
                                        <li><a href='/empdb/addEditRecruitmentRequest.php'>Add Recruitment Request</a></li>
                                        <li><a href= '/pa/pa_summary.php'>Performance Appraisal</a></li>
                                        <li><a href= '/reporting/resignationApplication.php'>Resignation</a></li>
										<li><a href='/payroll/payroll_allowanceAddRequest.php'>Place Laptop Allowance Request</a></li>
										<li><a href='/performance_incentives/pi_summary.php'>Performance Incentives</a></li>
										<li><a href='/request/addRequest.php?onlyConf=1'>Meeting Room Bookings</a></li>
										<li><a href='/tax_module'>My Tax Summary</a></li>
										<?php 

										if (in_array($Name, array("shashanka.kundu","muntaquim","archana.katara","rashi.dave","rashi.gupta","jinal.bhatt","divya.shah","manoj.michael"))){ ?>
                                        <li><a href='/RT/userListRT.php'>Recruitment test  - Access Page</a></li>
                                        <?php }?>
                                        
										<!--
                                        <li><a href='/request/addRequest.php'>Request System</a></li>
                                        <li><a href='/complaint/complaint.php'>Complaint System</a></li>
                                        <li><a href='/FAMS/deviceSummary.php'>Device Tracking System</a></li>
                                        <li><a href="/courier_system/search_records.php">Courier System</a></li>
                                        -->
                                    </ul>
                                </div>
                                <div class="element span3 topmenu dpgreen" style="width:30% !important">
                                    <a class="dropdown-toggle bigmenu" href="#">
                                        EI Policies
                                    </a>
                                    <ul class="dropdown-menu span12 topmenu span3 no-padding no-margin" data-role="dropdown" data-show="hover">
										<li>
											<a class="policymenu" href="#">Travel Policies</a>
											<ul class="ddmenu dropdown-menu dropdown-right no-padding no-margin dpgreen" data-role="dropdown" data-show="hover">
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=50" target="_blank">Claims and Reimbursements</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=51" target="_blank">Food Allowance Policy</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=34" target="_blank">Guesthouse Policy</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=9" target="_blank">Laundry Policy</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=14" target="_blank">Lodging and Boarding Policy</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=17" target="_blank">EI Systems</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=19" target="_blank">Travel and Conveyance Policy</a></li>
											</ul>
										</li>

										<li>
											<a class="policymenu" href="#">Leave Policies</a>
											<ul class="ddmenu dropdown-menu dropdown-right no-padding no-margin dpgreen" data-role="dropdown" data-show="hover">
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=10" target="_blank">Leave Policies and Procedures</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=11" target="_blank">Leave Travelling Allowance (LTA)</a></li>
											</ul>
										</li>

										<li>
											<a class="policymenu" href="#">Recruitment Policies</a>
											<ul class="ddmenu dropdown-menu dropdown-right no-padding no-margin dpgreen" data-role="dropdown" data-show="hover">
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=32" target="_blank">Employee Referral Scheme</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=7" target="_blank">Hiring Policy</a></li>
											</ul>
										</li>

										<li>
											<a class="policymenu" href="#">Joining Formalities</a>
											<ul class="ddmenu dropdown-menu dropdown-right no-padding dpgreen no-margin" data-role="dropdown" data-show="hover">
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=18" target="_blank">Terms of Employment</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=20" target="_blank">Business Card Policy</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=21" target="_blank">Working Hours</a></li>
											</ul>
										</li>

										<li>
											<a class="policymenu" href="#">Other Benefits</a>
											<ul class="ddmenu dropdown-menu dropdown-right dpgreen no-padding no-margin" data-role="dropdown" data-show="hover">
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=8" target="_blank">Laptop, Netbook & Desktop Policy</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=13" target="_blank">Loans/Advances</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=16" target="_blank">Relocation Policy</a></li>
											</ul>
										</li>

										<li>
											<a class="policymenu" href="#">Other Policies</a>
											<ul class="ddmenu dropdown-menu dropdown-right dpgreen no-padding no-margin" data-role="dropdown" data-show="hover">
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=31" target="_blank">Eating Paan/Gutka in Office Premises</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=33" target="_blank">Grievances Handling</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=12" target="_blank">List of Holidays</a></li>
												<li><a class="submenu" href="/hr_manuals/design/manual/manual.php?title=15" target="_blank">Performance Appraisal</a></li>
											</ul>
										</li>


                                        <!--/ei-erp/docs/Leave-Policy.pdf-->
										<!--/ei-erp/docs/List-of-holidays.pdf
										/ei-erp/docs/Loans-Advances-policies.pdf
										/performance_incentives/pi_summary.php-->

										<!--<li><a href='/tour_expense/advanceRequest.php'>Advances-Tour and General</a></li>-->
                                    </ul>
                                </div>
                                <div class="element span3 topmenu tporange tour_8" id="customizable" style="width: 30% !important">
                                    <a class="dropdown-toggle bigmenu" style="width:80%;display: inline" href="#">
                                        My Menu
                                    </a>
                                    <a id="edit" class="place-right" title="Edit Links"><span class="icon-pencil"></span></a>
                                    <a id="save" class="place-right" title="Save Links"><span class="icon-floppy"></span></a>

                                    <ul class="dropdown-menu span12 no-padding no-margin mymenu" data-role="dropdown" data-show="hover">
                                        <?php
                                        // CAUTION:: please replace the session index where it can find out the username
                                        // sql to check whether or not the user has previously stored some menu
                                        $checkMenuSql='select menu_pref from custom_menu where userid = "'. $_SESSION['username'] . '"';
                                        $checkRes = mysql_query($checkMenuSql) or die(mysql_error());
                                        $menuItems = mysql_fetch_array($checkRes);
                                        echo $menuItems['menu_pref'];
                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </nav>
                    </div>
                    <!-- /end top menu -->

                    <div class="row">
                        <!-- center container start -->
                        <div class="span9" id="bgimg">
                            <div id="centercontainer">
                            	<div id='centerScrollArea' style="position:relative;overflow:auto;height:493px" >
                                <div id='marginDiv'>
								</div>

								<div align="center">
										<?  include_once('banner.php'); ?>
								</div>
								<br>
								<div class="centercont-heading">Welcome to Educational Initiatives<br></div>
                                    <?php
                                    $queryManager = "SELECT DISTINCT adminReportingTo FROM emp_master ";
                                    $resultManager = mysql_query($queryManager);
                                    while($rowManager = mysql_fetch_array($resultManager))
                                    {
                                    	$arrManager[] = $rowManager["adminReportingTo"];
                                    }
                                    #For Display Speakup-Responses
									include("speakup_noticeboard.php");
                                	#For Display other messages
                                    include("hr_manuals/noticeBoard.htm");
                               		 echo "<br/>";
                                    include("empdb/noticeBoardTraining.php");
                                    echo "<br/>";
                                    include("hr_manuals/ontimeincentivedata.inc");
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- /center contents -->

                        <!-- notification Area -->
                        <div class="span3">
                            <div id="rightcontainer">
                                <!-- Some Confusing elements from previous home page -->
                                <form action="/taskTracker/index.php" method="post" name="taskTrackerForm" id="taskTrackerForm" >
                                    <input type="hidden" name="mode" value="">
                                </form>
                                <form action="/lsa_interactions/cad_list.php" method="POST" name="addressDBForm">
                                    <input type="hidden" name="mode" id="mode" value="">
                                </form>
                                <!-- /end confusing elements -->

                                <div id="notificationArea" class="fg-red">
                                    <h3 style="color:#f26724"><strong>Notifications</strong><i class="icon-warning blink-notify"></i></h3>
                                    <div id="Alerts"></div>
                                </div>
                                <div class="fg-lightGreen" id="highLightArea">
                                    <h3 style="color:#b0d466"><strong>Recent Kudos</strong></h3>
                                    <div id="recentkudos">
                                        <ul class="no-bullet">
                                            <?php
                                            // sql to fetch kudos data from kudos and marketing
                                            $kudoSql = 'select fullname, kudo_type from marketing as a, kudos_master as b where b.receiver = a.name order by kudo_id desc limit 5';
                                            $kudoRes = mysql_query($kudoSql) or die(mysql_error());
                                            while ($kudoRow = mysql_fetch_array($kudoRes)) {
                                            	$kudoType = 'a '.$kudoRow['kudo_type'];
                                            ?>
                                            <li>
                                                <a href="/kudos/home.php" class="notifyLink">
                                                    <i class="icon-thumbs-up" style="margin-right: 5px;"></i>
                                                    <?php echo $kudoRow['fullname']; ?> received <?php echo preg_replace('/\b(a)\s+([aeiou])/i', '$1n $2', $kudoType); ?>
                                                </a>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /end Notification area -->
                    </div>
                </div>
                <!-- /end right contents -->
            </div>
        </div>

        <!-- Pending Profiile Details Popup on home page -->
		<?php include_once("pending_profile_reminder.php"); ?>
        <!-- End Pending Profiile Details Popup on home page -->

		<!-- If user late more then 1 hour then it asks for compulsory reason -->
		<?php include_once("latelogin.php"); ?>
        <!--  End of include file -->

        <!-- Pradhan mantri schemes Popup on home page -->
		<?php /*include_once("pending_pmsbyDetails.php");*/ ?>
        <!-- End Pradhan mantri schemes Popup on home page -->

        <!-- Pop Up contents start -->
       <?php if(isset($assetShow) and !empty($assetShow)){
        	ob_start();
        ?>
        <div id="popup-content" style="font-size: 10pt;">
            <form name="assetCheckForm" method="POST" action="">
            <input type="hidden" name="remindmelater" id="remindmelater" value="">
            <input type="hidden" name="butsubmit" id="butsubmit" value="">
            <!--<input type="text" name="username" value="<?=$user?>"> <input type="submit" name="butuser" value="Go">-->
            <div >
                <br/>
                <?php if(is_array($ownassets) && count($ownassets) > 0){
                	$schoolList = array();
                	$locationList = array();
                	foreach($ownassets as $row)
                	{
                		array_push($schoolList,$row['schoolname']);
                		array_push($locationList,$row['location']);
                	}
                	$schoolList = array_unique($schoolList);

                	$locationList = array_unique($locationList);
                ?>
                <span style="text-align: left">Dear <?php echo $fullnameArray[0];?>,</span><br/><br/>
                <span style="text-align: left">As per our records you have the following devices in your possession. Please go to <a href="javascript:void(0);" onclick="window.open('../FAMS/manageAssetDetails.php', 'ManageAssetDetails', 'resizable=1,scrollbars=1,left=200px,top=100px,height=360,width=900');"><u>"Device Status Change"</u></a> in the intranet menu and correct any details about these devices.</span><br/><br/>
                <table>
                <tr><td>
                * <b><font color="red"><blink>Confirmed: </b><?php echo$confirmed_count_row['count'];?> out of <?php echo $count_row['total'];?>.</blink></font>
                <table class="striped bordered bg-transparent" cellspacing="4" cellpadding="4" border="1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Asset Code</th>
                            <? if(count($schoolList) > 1 || $row['schoolname']!='With You') { ?>
                            <th>With You / School</th>
                            <? } ?>
                            <? if(count($locationList) > 1) { ?>
                            <th>Location</th>
                            <? } ?>
                            <th nowrap title="This is selected when device is in your posession">I Confirm</th>
                            <th nowrap title="This should normally not be selected. It should be selected only if device is missing or it has not been able to be physically verified in spite of best efforts. (Example: The school is closed or some other serious matter)">Unable to confirm</th>
                            <th title="Add comments ONLY if there is any issue">Comments <font size="-2">(Add comments ONLY if there is any issue)</font></th>
                            <!--<font size="-2">(Add comments ONLY if there is any issue</font> (<u><b title="No sticker on device&#10;Status is wrong&#10;School mapped is wrong&#10;Location is wrong&#10;Reported missing&#10;Duplication issue etc">Example</b></u>)) -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php $srno = 0; foreach($ownassets as $row) { $srno ++;?>
                    <tr>
                        <td><?php echo $srno;?></td>

                        <td nowrap><?php echo $row['code'];?></td>

                        <? if(count($schoolList) > 1 || $row['schoolname']!='With You') { ?>
                        	<td><?php echo $row['schoolname'];?></td>
                        <? } ?>

                        <? if(count($locationList) > 1) { ?>
                        <td><?php echo $row['location'];?></td>
                        <? } ?>

                        <td align="center"><input type="checkbox" name="cchk[]" id="cchk_<?=$row['assetid']?>" value='<?=$row['assetid']?>' <? if($row['confirmed']==1) echo " checked disabled "; ?> onclick='check(this)'></td>

                        <td align="center"><input type="checkbox" name="uchk[]" id="uchk_<?=$row['assetid']?>" value='<?=$row['assetid']?>' <? if($row['unableToConfirmed']==1) echo " checked disabled ";?> onclick='check(this)'></td>

                        <td><? if($row['actionComments']!='') echo $row['actionComments']."<br>"; ?>
                        <? if($row['confirmed']==0) { ?>
                        <textarea cols="50" rows="1" name="txt_<?=$row['assetid']?>" id="txt_<?=$row['assetid']?>" onblur="addReason(this)"></textarea>
                        <? } ?>
                        </td>

                    </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </td></tr>
                <tr><td><b>Notes:</b><br/>
                    * <b>Remind Me Later</b> option can only be available for 7 days after your first viewing of this list.
                </td></tr>
                </table>
                <?php } ?>
                <br/>Please confirm the same by clicking below checkboxes. Please read the points below carefully!
                <br/><br/>
                <table class="striped bordered bg-transparent">
                    <tr>
                        <td colspan="2">I confirm the following:<br/></td>
                    </tr>
                    <tr style="font-weight:bold;">
                        <td valign="top">
                        	<input type="checkbox" name="asset0" id="asset0" onClick="disp0()"/>
                        </td>
                        <td>
                            I have in my possession&nbsp;

                                    <?php if($count_row['tabletCount']>0) { ?>
                                        <?php echo $count_row['tabletCount'];?> Tablets <?php if($count_row['notworkingtabletCount'] > 0) echo "(".$count_row['notworkingtabletCount']." not working),";?> <?php } ?>
                                    <?php if($count_row['netbookCount']>0) { ?>
                                    	<?php echo $count_row['netbookCount'];?> Netbooks <?php if($count_row['notworkingnetbookCount'] > 0) echo "(".$count_row['notworkingnetbookCount']." not working),";?> <?php } ?>
                                    <?php if($count_row['laptopCount']>0) { ?>
                                    	<?php echo $count_row['laptopCount'];?> Laptops <?php if($count_row['notworkinglaptopCount'] > 0) echo "(".$count_row['notworkinglaptopCount']." not working),"?> <?php } ?>
                                    <?php if($count_row['cpuCount']>0) { ?>
                                    	<?php echo $count_row['cpuCount'];?> Desktops <?php if($count_row['notworkingcpuCount'] > 0) echo "(".$count_row['notworkingcpuCount']." not working),"?> <?php } ?>
                                    <?php if($count_row['mobileCount']>0) { ?>
                                    	<?php echo $count_row['mobileCount'];?> Mobile kits <?php } ?>
                                   <?
                                   		$count_row['workingtabletCount'] = $count_row['tabletCount'] - $count_row['notworkingtabletCount'];
                                   		$count_row['workingnetbookCount'] = $count_row['netbookCount'] - $count_row['notworkingnetbookCount'];
                                   		$count_row['workinglaptopCount'] = $count_row['laptopCount'] - $count_row['notworkinglaptopCount'];
                                   		$count_row['workingcpuCount'] = $count_row['cpuCount'] - $count_row['notworkingcpuCount'];
                                   		$count_total_working = $count_row['workingtabletCount'] + $count_row['workingnetbookCount'] +
                                   		$count_row['workinglaptopCount'] + $count_row['workingcpuCount'] + $count_row['mobileCount'];
                                   ?>
                                   <?php if($count_row['tabletCount']>0) {
	                                   	echo "&nbsp;(totally <b>".$count_row['total']." devices</b>";
	                                    if($count_row['total'] == $count_total_working) {
	                                    	echo ",&nbsp;all in working order).";
	                                    }else {
	                                   		echo ",&nbsp;".$count_total_working." in working order).";
	                                    }
                                   } ?>
                        </td>
                    </tr>
                    <tr id="cb1">
                        <td valign="top">
                            <input type="checkbox" name="asset1" id="asset1" onClick="disp1()"/>
                        </td>
                        <td>
                            I have <b>physically checked</b> that I have these devices. For devices I could not check physically, I have ensured someone (eg. from the school) has checked and confirmed.
                        </td>
                    </tr>
                    <tr id="cb2">
                        <td valign="top">
                            <input type="checkbox" name="asset2" id="asset2" onClick="disp2()"/>
                        </td>
                        <td>
                            In case there is any issue (eg. device id not clearly marked on device, location wrong, school details wrong or anything else) I have <b>added a clear comment</b> above mentioning this.
                        </td>
                    </tr>
                    <tr id="cb3">
                        <td valign="top">
                            <input type="checkbox" name="asset3" id="asset3" onClick="disp3()"/>
                        </td>
                        <td>
                            I fully understand that I am responsible and liable for the safety and security of the above devices <b>including financially</b> and to record any devices I receive or transfer or whose status changes immediately on the system.
                        </td>
                    </tr>
                    <tr id="cb5">
                        <td colspan="2">
                            I have some suggestions on how the way we manage devices in EI can be improved - and am sharing them by describing them.
                        </td>
                    </tr>
                    <tr id="ta1">
                        <td colspan="2">
                            <textarea name="assetSuggestion" id="assetSuggestion" rows="3" cols="100"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            </form>
        </div>

        <div id="dialog-form" style="display:none;">
		    <form>
		        <label for="name">Please describe why you are unable to confirm</label> <textarea name="txt2" id="txt2" cols="40" rows="3"></textarea>
		    </form>
		</div>

        <?php
        $popUp = ob_get_contents();
        $popUp = str_replace(array('    ', '   ', "\r", "\r\n", "\n"), '', $popUp);
        ob_end_clean();
        echo $popUp;
        ?>

       <script>
        function addReason(obj)
        {
        	var assetid = obj.name.substring(4);

        	if(obj.value=='' && document.getElementById('uchk_'+assetid).checked)
        	{
        		alert("Please add reason for unable to confirm");
        		obj.focus();
        	}
        }
        function check(obj)
        {
        	var assetid = obj.value;

        	if(obj.name.substring(0,1)=="u")
        		chkassetid = 'cchk_'+assetid;
        	else
        		chkassetid = 'uchk_'+assetid;

        	if(obj.checked)
        	{
        		document.getElementById(chkassetid).checked= false;
        		if(obj.name.substring(0,1)=="u")
        		{
        			//document.getElementById('txt_'+assetid).focus();
        			//dialog.dialog('open');
        			document.getElementById('txt2').value='';
        			showDialog(assetid);
        		}
        		if(obj.name.substring(0,1)=="c")
        		{
        			document.getElementById('txt2').value='';
        			document.getElementById('txt_'+assetid).value='';
        		}
        	}
        }
        function showDialog(id)
		{
	        $("#dialog-form").data("id",id).dialog({
					title: "Unable to confirm",
					height: 225,
	        		width: 450,
	        		modal: true,
	        		closeOnEscape: false,
					buttons: {
	        		'Cancel' : function(){
	        			document.getElementById('uchk_'+id).checked= false;
	        			$(this).dialog('close');
	        		}
	        		,'Okay' : function() {
	        			if($("#txt2").val()=='')
	        			{
	        				document.getElementById('uchk_'+id).checked= false;
	        				document.getElementById('cchk_'+id).checked= true;
	        			}
	        			else
	        			{
	        				$("#txt_"+id).val('Unable to Confirm - ' + $("#txt2").val());
	        				$("#txt_"+id).attr('readonly', true);
	        			}

	        			$(this).dialog('close');
	        		}
	        		}
				});
				$(".ui-dialog-titlebar-close").remove();
		}

        $(document).ready(function(){

        	$( "#popup-content" ).dialog({
        		autoOpen: true,
        		title: "Device Allocation",
        		height: 500,
        		width: 900,
        		modal: true,
        		closeOnEscape: false,
        		buttons: {
        		'Submit' : function(){
        			var frm = document.assetCheckForm;
        			var rows = document.getElementsByName('uchk[]');
        			for (var i = 0; i < rows.length; i++) {
        			  var assetid = rows[i].value;

				      if(rows[i].checked && document.getElementById('txt_'+assetid).value=='')
				      {
				      	alert('Please enter reason for unable to confirm');
				      	document.getElementById('txt_'+assetid).focus();
				      	return false;
				      }
				    }
        			if(document.getElementById('asset0') != undefined)
        			{
	        			if(document.getElementById('asset0').checked==true
	        			&& document.getElementById('asset1').checked==true
	        			&& document.getElementById('asset2').checked==true
	        			&& document.getElementById('asset3').checked==true
	        			) {
	        				document.getElementById('butsubmit').value='Y';
	        				document.assetCheckForm.submit();
	        			} else {
	        				alert("You must agree to all the points");
	        				return false;
	        			}
        			}
        			else
        			{
        				document.getElementById('butsubmit').value='Y';
	        			document.assetCheckForm.submit();
        			}
        		}
        		<?php if(!isset($laterShow)) { ?>
        		,'Remind Me Later' : function() {
        			document.getElementById('remindmelater').value='Y';
        			$(this).dialog('close');
        		}<?php } ?>
        		}

        	});
        	$(".ui-dialog-titlebar-close").remove();

        });
        </script>

        <?php } ?>

        <!-- /end Pop up Contents -->

        <footer>
            <a href="#" class="place-left help-tour fg-white" data-hint="Want Help?|Click Here to Take a tour" data-hint-position="top" id="activatetour">
                <i class="icon-help"></i>
            </a>
            Copyright &copy; <?php echo date('Y'); ?> Educational Initiatives Pvt. Ltd.
        </footer>

        <!-- Load javascript files at the end of the file so that page load time decreases -->
        <script src="ei-erp/js/jquery.tour.min.js"></script>
        <script>
		var mousein=false;
        $(document).ready(function(){
			var t = $("#centercontainer").css("height");
			$("#marginDiv").css("height",2*parseInt(t)/3+"px");
			$("#centerScrollArea").css("height",parseInt(t)-20+"px");
			$("#centerScrollArea").append("<div style='height:"+t+"'></div>");
			//alert($("#centerScrollArea")[0].scrollHeight);
			function autoScroll() {
			    //alert();
			    if (mousein) return;
				if($('#centerScrollArea') [0].scrollTop + parseInt($("#centercontainer").css("height")) >= $("#centerScrollArea")[0].scrollHeight){
					$('#centerScrollArea') [0].scrollTop = -parseInt($("#centercontainer").css("height"));
				}
			    $('#centerScrollArea') [0].scrollTop++;
			}
			//console.log($("#centerScrollArea"));
			$('#centerScrollArea').bind('mouseout', function(){mousein = false;})
			$('#centerScrollArea').bind('mouseover', function(){mousein = true;})
			setInterval(autoScroll, 35);

        	if($('#frmLogout').children().find('table').length < 1)
        	{
        		$('#frmLogout').hide();
        	}

			$(".submenu").click(function(){
				/*alert();
				console.log($(this).parent().parent());
				alert();*/
				var a =	$(this).parent().parent();
				setTimeout(function(){
					//alert();
					a.removeAttr("style");
					//$("#id123").removeAttr("style");
				},500);
			});
			$(".policymenu").bind("mouseover",function(){
				$($(this).parent()[0]).children($("ul")).removeAttr("style");
			})
        });
        </script>

    </body>
<!--start event calendar popup -->	
<div id="event_div" class="white_content"> <div align="right"><a href = "javascript:void(0)" onclick = "event_close()">Close</a></div>
	<img src="<?=constant("SITEURL");?>hr_manuals/images/Event_Calendar.jpg" />
</div>	
<div id="event_fade" class="black_overlay"></div>
<!--end event calendar popup -->
</html>
<?php
// get the buffered contents
$pageContents = ob_get_contents();
ob_end_clean();
//$pageContents = str_replace(array('    ', '   ', "\r\n", "\n"), '', $pageContents);
echo $pageContents;