
<?php
class clsassetetas {

var $eta_username;
var $eta_passw;
var $connid;
var $action;
var $current_round;
var $subject;
var $class;
var $expPercent; // percent
var $commonWrongFlag; // 
var $commonWrongOpt;
var $clarityIndex;
var $appropriateIndex;
var $current_qno;
var $current_qcode;
var $paperCode;
var $expPerfArr;
var $reviewFlag;
var $pageName;
var $eta_startDate;
var $eta_endDate;
var $eta_totalQues;
var $eta_reportHTML;
var $passCode;
var $login_schoolCode;
var $chkPasscode;
var $loginName;
var $loginpassword;
var $loginpassword_2;
var $loginEmail;
var $loginEmail_2;
var $loginUname;
var $loginUname_2;
var $userNameType;
var $loginSubjects;
var $loginClasses;
var $loginSection;
var $loginFname;
var $loginLname;
var $loginGender;
var $loginDob;
var $sec_ques;
var $sec_ans;
var $spam_stopper;
var $eng_selClasses;
var $mat_selClasses;
var $sc_selClasses;
var $ss_selClasses;
var $hin_selClasses;
var $nationType;
var $addSchoolArr;
var $exceptionReason;
var $cnfStatus;
var $welStatus;
var $commentsArr;
var $confirmMailStatusArr;
var $welcomeMailStatusArr;
var $delPasscodeArr;
var $clarityComment;
var $appropriateComment;

var $loginUserName; // will be email or id
var $activeRound;
var $eta_statusSubject;
var $eta_statusClass;

function clsassetetas ($connid=""){

	$this->eta_username="";
	$this->eta_passwd ="";
	$this->connid =$connid;
	$this->action="";
	// change to get from asset_etaConfig table the round which is active 
	// $this->current_round ="Q"; // setting for Etas Current Round
	$this->current_round='';
	$this->subject="";
	$this->class="";
	$this->expPercent ="";
	$this->commonWrongFlag ="";
	$this->commonWrongOpt="";
	$this->clarityIndex="";
	$this->appropriateIndex="";
	$this->current_qno="";
	$this->current_qcode="";
	$this->paperCode ="";
	$this->expPerfArr =array(1=>'Less than 30%',2=>'31%-50%',3=>'50%-70%',4=>'More than 70%');
	$this->wrongOptFlagArr= array(1=>'Yes',0=>'No');
	$this->wrongOptValArr= array('A','B','C','D');
	$this->reviewFlag="";
	$this->pageName='';
	$this->eta_startDate='';
	$this->eta_endDate='';
	$this->eta_totalQues='';
	$this->eta_reportHTML='';
	$this->passcode ='';
	$this->login_schoolCode='';
	$this->chkPasscode='';
	$this->loginName='';
	$this->loginpassword='';
	$this->loginpassword_2='';
	$this->loginEmail='';
	$this->loginEmail_2='';
	$this->userNameType='';
	$this->loginUname='';
	$this->loginUname_2='';
	$this->loginFname='';
	$this->loginLname='';
	$this->loginGender='';
	$this->loginDob='';	
	$this->loginSubjects=array();
	$this->loginClasses=array();
	$this->loginSection='';
	$this->loginUserName=''; // will be email or username 
	$this->sec_ques='';
	$this->sec_ans='';
	$this->spam_stopper='';
	
	$this->eng_selClasses='';
	$this->mat_selClasses='';
	$this->sc_selClasses='';
	$this->ss_selClasses='';
	$this->hin_selClasses='';
	$this->nationType='';
	$this->addSchoolArr=array();
	$this->exceptionReason ='';
	$this->cnfStatus='';
	$this->welStatus='';
	$this->commentsArr=array();
	$this->confirmMailStatusArr =array();
	$this->welcomeMailStatusArr =array();
	$this->delPasscodeArr=array();
	$this->clarityComment='';
	$this->appropriateComment='';
	$this->activeRound='';
	$this->eta_statusSubject='';
	$this->eta_statusClass='';

	// call function to set current round from asset_etaConfig table 
	$this->setCurrentRound();
}
function setpostvars() {
	if(isset($_POST['username'])) $this->eta_username =$_POST["username"];
	if(isset($_POST['passw'])) $this->eta_passw =$_POST["passw"];
	if(isset($_POST['hdn_action'])) $this->action =$_POST['hdn_action'];
	if(isset($_POST['eta_subject'])) $this->subject =$_POST['eta_subject'];
	if(isset($_POST['eta_class'])) $this->class =$_POST['eta_class'];
	if(isset($_POST['expPerf'])) $this->expPercent =$_POST['expPerf'];
	if(isset($_POST['commonWrong'])) $this->commonWrongFlag =$_POST['commonWrong'];
	if(isset($_POST['wrongOpt'])) $this->commonWrongOpt =$_POST['wrongOpt'];
	if(isset($_POST['clarity'])) $this->clarityIndex =$_POST['clarity'];
	if(isset($_POST['appropriate'])) $this->appropriateIndex =$_POST['appropriate'];
	if(isset($_POST['current_qno'])) $this->current_qno = $_POST['current_qno'];
	if(isset($_POST['qcode'])) $this->current_qcode = $_POST['qcode'];
	if(isset($_POST['nonce'])) $this->nonce =$_POST['nonce'];
	if(isset($_POST['paperCode'])) $this->paperCode =$_POST['paperCode'];
	if(isset($_POST['reviewFlag'])) $this->reviewFlag = $_POST['reviewFlag'];
	if(isset($_POST['start_date'])) $this->eta_startDate = $_POST['start_date'];
	if(isset($_POST['end_date'])) $this->eta_endDate = $_POST['end_date'];
	if(isset($_POST['total_ques'])) $this->eta_totalQues = $_POST['total_ques'];
	if(isset($_POST['eta_reportHTML'])) $this->eta_reportHTML =$_POST['eta_reportHTML'];
	if(isset($_POST['passcode'])) $this->passcode = $_POST['passcode'];

	if(isset($_POST['login_schoolCode'])) $this->login_schoolCode = $_POST['login_schoolCode'];
	if(isset($_POST['chkPasscode'])) $this->chkPasscode = $_POST['chkPasscode'];

	if(isset($_POST['loginName'])) $this->loginName = $_POST['loginName'];
	if(isset($_POST['loginpassword'])) $this->loginpassword = $_POST['loginpassword'];
	if(isset($_POST['loginpassword_2'])) $this->loginpassword_2 = $_POST['loginpassword_2'];
	
	if(isset($_POST['loginEmail'])) $this->loginEmail = $_POST['loginEmail'];
	if(isset($_POST['loginEmail'])) $this->loginEmail_2 = $_POST['loginEmail_2'];
	if(isset($_POST['userNameType'])) $this->userNameType = $_POST['userNameType'];

	if(isset($_POST['loginUname'])) $this->loginUname = $_POST['loginUname'];
	if(isset($_POST['loginUname_2'])) $this->loginUname_2 = $_POST['loginUname_2'];

	if(isset($_POST['loginFname'])) $this->loginFname = $_POST['loginFname'];
	if(isset($_POST['loginLname'])) $this->loginLname = $_POST['loginLname'];
	if(isset($_POST['loginGender'])) $this->loginGender = $_POST['loginGender'];
	if(isset($_POST['loginDob'])) $this->loginDob = $_POST['loginDob'];

	if(isset($_POST['loginsub'])) $this->loginSubjects = $_POST['loginsub'];
	if(isset($_POST['loginclass'])) $this->loginClasses = $_POST['loginclass'];
	if(isset($_POST['loginSection'])) $this->loginSection = $_POST['loginSection'];
	if(isset($_POST['loginUserName'])) $this->loginUserName = $_POST['loginUserName'];
	if(isset($_POST['sec_ques'])) $this->sec_ques = $_POST['sec_ques'];
	if(isset($_POST['sec_ans'])) $this->sec_ans=$_POST['sec_ans'];

	if(isset($_POST['search_class'])) $this->class=$_POST['search_class'];
	if(isset($_POST['search_subject'])) $this->subject=$_POST['search_subject'];

	if(isset($_POST['spam_stopper'])) $this->spam_stopper = $_POST['spam_stopper'];

	if(isset($_POST['classSel_eng'])) $this->eng_selClasses = $_POST['classSel_eng'];
	if(isset($_POST['classSel_mat'])) $this->mat_selClasses = $_POST['classSel_mat'];
	if(isset($_POST['classSel_sc'])) $this->sc_selClasses = $_POST['classSel_sc'];
	if(isset($_POST['classSel_ss'])) $this->ss_selClasses = $_POST['classSel_ss'];
	if(isset($_POST['classSel_hin'])) $this->hin_selClasses = $_POST['classSel_hin'];

	if(isset($_POST['nationType'])) $this->nationType = $_POST['nationType'];
	if(isset($_POST['addSchoolArr'])) $this->addSchoolArr = $_POST['addSchoolArr'];
	if(isset($_POST['exceptionReason'])) $this->exceptionReason = $_POST['exceptionReason'];
	if(isset($_POST['cnfStatus'])) $this->cnfStatus = $_POST['cnfStatus'];
	if(isset($_POST['welStatus'])) $this->welStatus = $_POST['welStatus'];

	if(isset($_POST['comment'])) $this->commentsArr = $_POST['comment'];

	if(isset($_POST['resetConfirm'])) $this->confirmMailStatusArr = $_POST['resetConfirm'];
	if(isset($_POST['resetWelcome'])) $this->welcomeMailStatusArr = $_POST['resetWelcome'];

	// to delete schools from ETAS list 
	if(isset($_POST['delPasscode'])) $this->delPasscodeArr = $_POST['delPasscode'];

	if(isset($_POST['clarityComment'])) $this->clarityComment = $_POST['clarityComment'];
	if(isset($_POST['gradeComment'])) $this->appropriateComment = $_POST['gradeComment'];
	if(isset($_POST['activeRound'])) $this->activeRound = $_POST['activeRound'];

	if(isset($_POST['eta_statusSubject'])) $this->eta_statusSubject =$_POST['eta_statusSubject'];
	if(isset($_POST['eta_statusClass'])) $this->eta_statusClass =$_POST['eta_statusClass'];

}
function setgetvars() {

}
// function to set the current round of ETAS from asset_etaConfig table 
function setCurrentRound() {
	$query ="SELECT test_edition FROM asset_etaConfig WHERE active = 1 order by id desc limit 1";
	$dbquery = new dbquery($query,$this->connid);
	while($row = $dbquery->getrowarray()){
		$this->current_round = $row['test_edition'];
	}
}
function pageLoad() {
	$this->setpostvars();
	$retMsg = "";
	if($this->pageName =='logout') {
		// clear session
		$this->clearSessionVal();
		header("location:login.php");
		exit();
	}
	if($this->pageName =='login') {
		// clear Session values 
		if(isset($_SESSION['login_schoolCode']))
			unset($_SESSION['login_schoolCode']);
	}
	if($this->action ==="login") {
		$retArr = $this->validateEtaLogin();
		$retMsg = $this->setSessionVal($retArr);
		return $retMsg;		
	}
	if($this->action === 'saveReports') {
		//echo "$this->eta_reportHTML <br/> "; exit();
		//$this->saveReportHTML();
	}
	if($this->action === "showReport") {
		//checkPaperCode();
	}
	if($this->action === 'createUserName') {
		$retMsg=$this->checkUsername();
		if($retMsg !='')
			$_SESSION['error_msgUsername'] = $retMsg;

		if(isset($_SESSION['error_msgUsername']))
			return ; 
		if($this->userNameType == 'email') {
			$_SESSION['temp_username'] = $this->loginEmail;
			$_SESSION['username_type']=$this->userNameType;
		}	
		else {
			$_SESSION['temp_username'] = $this->loginUname;
			$_SESSION['username_type']=$this->userNameType;
		}	

		header('location:createLogin.php');
		exit();
	}
	if($this->action === "takeEtas") {

		list($errCode,$paperQuesCount) = $this->checkPaperCode();
		// start and end date check
		$dateVal = $this->checkDates();
		// dont check start and end date for admin login 
		if($_SESSION['eta_username'] ==='admin') 
			$dateVal =1;

		if($dateVal === 1) {
			$retMsg = $this->setPaperSession($errCode,$paperQuesCount);
		} else {
			$retMsg ='Paper Closed';
		}

		return $retMsg;
	}
	if($this->action === 'addResponse') {
		if ($_POST['nonce'] !== $_SESSION['nonce'])
    	{
			// double Submit
		} else {
			$retMsg =$this->addResponse();
		}
		$_SESSION['nonce'] = $nonce = md5('salt'.microtime());
	}
	if($this->action ==='addResponseReview') {

		$this->addResponse();
		// take to Review Screen
		header("location:eta_review.php");
		exit();
	}
	if($this->action ==='showReport') {

	}
	if($this->action ==='updateConfig') {
		$retMsg = $this->updateConfigData();
		return $retMsg;
	}
	if($this->pageName ==='eta_papers') {
		// for paper making config data check , send national data only
		$retArr = $this->getConfigData();
		$configArr = $retArr[0];
		return $configArr;
	}
	if($this->action ==='completeTest') {
		$this->completeTest();
		header("location:index.php");
		exit();
	}

	// check if question answere page and set papercode if not set
	if($this->pageName ==='home') {
		if($this->paperCode == ""){
			$this->paperCode = $_SESSION['eta_papercode'];
		}
	}

	// check pass code and redirect to login creation page
	if($this->action === 'checkPasscode') {
		$retMsg = $this->confirmPasscode();

		if($retMsg == 1) {
			$_SESSION['login_schoolCode']=$this->login_schoolCode;
			// make username then get Details
			header('location:createUserName.php');
			//header('location:createLogin.php');
			exit();
		} else {
			return $retMsg;
		}	
	}

	if($this->action === 'createLogin') {

	/*
		$retStatus = $this->createLogin();
		if($retStatus == 1)
			$_SESSION['msg'] = "Login created succesfully ";
	*/
		$retMsg = $this->createLogin();
		echo "RET MSG |$retMsg| <br>";
		if($retMsg === 'Success')
			$_SESSION['msg'] =	$retMsg;
		else 
			$_SESSION['error_msg'] = $retMsg;

		if(isset($_SESSION['error_msg']))
			return ; // to same page 

		header("location:login.php");
		exit();

	}
	if($this->action === 'resetPassword') {
		$retMsg = $this->resetPassword();
		return $retMsg;
	}
	if($this->action === 'updateMapping') {
		$retMsg = $this->insertUpdMappingData();
		return $retMsg;
	}
	if($this->action === 'addSchools') {
		$retMsg = $this->addSchools();
		return $retMsg;
	}
	if($this->action ==='generatePasscodes') {
		// function which checks and generates passcodes 
		$retMsg = $this->checkPasscodes();
		header("location:asset_etasSetupEmail.php");
		exit();
	}
	if($this->action === 'confirmEmail') {
		$this->sendConfirmEmail($this->nationType);
		header("location:asset_etasSetupEmail.php");
		exit();
	}
	if($this->action === 'welcomeEmail') {
		$this->sendWelcomeEmail($this->nationType);
		header("location:asset_etasSetupEmail.php");
		exit();
	}
	if($this->action === 'add_comments') {
		$this->addComments();
		header('location:asset_etaUserDetails.php');
		exit();
	}
	if($this->action === 'resetConfirmMail') {
	
		$this->resetConfirmMail();
	//	header('location:asset_etaUserDetails.php');
	//	exit();
	}
	if($this->action === 'resetWelcomeMail') {
		$this->resetWelcomeMail();
	//	header('location:asset_etaUserDetails.php');
	//	exit();	
	}
	if($this->action === 'goToReview') {
		header('location:eta_review.php');
		exit();
	}

	if($this->action == 'saveActiveRound') {
		$this->saveActiveRound();
		header('location:assetetas_config.php');
		exit();
	}
	if($this->action == 'delSchools'){
		$this->delSchools();
		header('location:asset_etaUserDetails.php');
		exit();	
	}
}
function validateEtaLogin() {
	
	$retArr = array();
	$nationType=0;
	$desg ='';
	$passw = $this->clean($this->eta_passw);
	$query = "SELECT * FROM asset_etaTeacherDetails WHERE username ='".addslashes($this->eta_username)."' AND password ='".md5($passw)."' AND disabled = 0";
	$dbquery = new dbquery($query,$this->connid);

	if($dbquery->numrows() > 0) {

		while($row =$dbquery->getrowarray()) {			

			// get the nation type saved in session for config data 
			$countryQuery = "SELECT schools.schoolname,schools.country FROM schools where schoolno = ".$row['schoolCode']." ";

			if (filter_var($this->eta_username, FILTER_VALIDATE_EMAIL)) {
				// a valid email , then check if he is the ASSET coordinator
				$cor_query = "SELECT designation FROM contact_details WHERE school_code = ".$row['schoolCode']." 
								AND contact_mail ='".addslashes($this->eta_username)."' ";
				$cor_dbquery = new dbquery($cor_query,$this->connid);
				$coordinatorResult = $cor_dbquery->getrowarray();
				$desg = $coordinatorResult['designation'];
			}
			
			$countryDbquery = new dbquery($countryQuery,$this->connid);
			$countryResult = $countryDbquery->getrowarray();
			$country = $countryResult['country'];
			$schoolname = $this->schoolNameCorrection($countryResult['schoolname']); 

			if($country == 'India')
				$nationType=0;
			else 
				$nationType=1;

			$retArr = array('teacher_id'=>$row['id'], 'teacher_name'=>$row['firstname']." ".$row['lastname'],'schoolCode'=>$row['schoolCode'],'username'=>$row['username'],
							'nationType'=>$nationType,'schoolname'=>$schoolname);

			// he is coordinator
			if($desg !='' && $desg == 'ASSET Coordinator')
				$retArr['coordinator'] =1;
		}
	}

	return $retArr;
}
function setSessionVal($validateArr) {
	if(count($validateArr) > 0 && isset($validateArr['schoolCode'])) {
		$_SESSION['eta_username']=$validateArr['username'];
		$_SESSION['eta_teacherName']=$validateArr['teacher_name'];
		$_SESSION['eta_schoolCode']=$validateArr['schoolCode'];
		$_SESSION['eta_teacherId']=$validateArr['teacher_id'];
		$_SESSION['nationType']=$validateArr['nationType'];
		$_SESSION['schoolname']=$validateArr['schoolname'];

		if(isset($validateArr['coordinator'])) {
			$_SESSION['coordinator'] =1;
		}

		header('location:index.php');
		exit();
	}
	else {
		$retMsg ="Incorrect username/password ";		
		return $retMsg;
	}
}
function clearSessionVal() {
	$_SESSION = array();
	session_destroy();
}
function checkResponse($qcode) {
	$retArr = array();

	$check_query = "SELECT id,expPercent,commonWrong_flag,commonWrongOption,clarity,appropriate, clarityComment, appropriateComment FROM asset_etaResponses 
					WHERE teacher_id = ".$_SESSION['eta_teacherId']." AND papercode= '".$this->paperCode."' AND qcode =".$qcode." limit 1";
	//echo "$check_query <br/> ";
	$check_dbquery = new dbquery($check_query,$this->connid);
	if($check_dbquery->numrows() > 0) {
		while($row=$check_dbquery->getrowarray()) {
			$retArr = array('expPercent'=>$row['expPercent'],'commonWrong_flag'=>$row['commonWrong_flag'],'commonWrongOption'=>$row['commonWrongOption'],'clarity'=>$row['clarity'],'appropriate'=>$row['appropriate']
							,'clarityComment'=>$row['clarityComment'],'appropriateComment'=>$row['appropriateComment']);
		}	
	} else {
		$retArr = array('expPercent'=>'','commonWrong_flag'=>'','commonWrongOption'=>'','clarity'=>'','appropriate'=>'','clarityComment'=>'','appropriateComment'=>'');
	}
		

	return $retArr;
}
function checkDates() {
	// check if the Current date is between config start and end date 
	$configArr =$this->getConfigData();	
	$configArr=$configArr[$_SESSION['nationType']];
	if(count($configArr) == 0) {
		return '';
	} else {
		$cur_date = date('Y-m-d');
		if($cur_date >= $configArr['start_date'] && $cur_date <= $configArr['end_date']) {
			return 1;
		} else {
			return '';
		}
	}
}
function checkPaperCode() {

	$status =0;	
	$paperCode = $this->subject.$this->class.$this->current_round;
	$query ="SELECT count(*) cnt FROM asset_etas WHERE papercode ='".$paperCode."' ";
	//echo "$query <br/> ";
	$dbquery = new dbquery($query,$this->connid);
	$result = $dbquery->getrowarray();

	$retVal = $result["cnt"];
	if($retVal > 0 ) {

		// check if the test has already been completed by the teacher 
		$compelete_query = "SELECT status FROM asset_etaResponses WHERE teacher_id ='".$_SESSION['eta_teacherId']."' AND papercode ='".$paperCode."'
							AND round = '".$this->current_round."'  limit 1";
		
		$comp_dbquery = new dbquery($compelete_query,$this->connid);
		while($row=$comp_dbquery->getrowarray()){
			$status = $row['status'];
		}
	}
	if($status ==1 )
		return array(2,''); // test completed

	if($retVal > 0)
		return array(1,$retVal); // can take test retval is the quest count 
	else 
		return array(0,''); // no paper assembled
}
function setPaperSession($errCode,$paperQuesCount) {
	
	if($errCode == 0) {
		$retMsg ="Cannot take ETAS for the selected class subject.";
		return $retMsg;
	} else if($errCode == 2){
		$retMsg = "Test has already been completed by you.";
		return $retMsg;
	} else {
		$paperCode = $this->subject.$this->class.$this->current_round;
		$_SESSION['eta_papercode']=$paperCode;
		$_SESSION['total_ques']=$paperQuesCount;
		header("location:home.php");
		exit();
	}
}
function populateQuestion($qcode='') {
	
	$retArr =array();
	
	if($qcode =='') {
		$query ="SELECT  questions.qcode,question, optiona,optionb,optionc,optiond,group_id, passageid, group_text, asset_etas.qno FROM questions, asset_etas 
				WHERE asset_etas.qcode = questions.qcode AND asset_etas.papercode ='".$this->paperCode."' and  asset_etas.qno = $this->current_qno ";		
	}
	else {
		$query ="SELECT  questions.qcode,question, optiona,optionb,optionc,optiond,group_id, passageid, group_text, asset_etas.qno FROM questions, asset_etas 
				WHERE asset_etas.qcode = questions.qcode AND asset_etas.papercode ='".$this->paperCode."' and  asset_etas.qcode = $qcode ";	
	}
	//echo "$query <br/> ";
	$dbquery = new dbquery($query,$this->connid);
	
	if($dbquery->numrows() == 0)
		return $retArr;
	
	$row = $dbquery->getrowarray();
	// removed Common pdf junk replace as it was not showing the symbols
//	$ques = $this->orig_to_html_frac(orig_to_html(common_pdf_junk_replace($row["question"]),'','')); // added orig_to_html_frac  for maths fractions
	$ques = $this->orig_to_html_frac(orig_to_html($this->common_pdf_junk_replace($row["question"]),'','')); // added orig_to_html_frac  for maths fractions
	$optiona = $this->orig_to_html_frac(orig_to_html($this->common_pdf_junk_replace($row["optiona"]),'',''));
	$optionb = $this->orig_to_html_frac(orig_to_html($this->common_pdf_junk_replace($row["optionb"]),'',''));
	$optionc = $this->orig_to_html_frac(orig_to_html($this->common_pdf_junk_replace($row["optionc"]),'',''));
	$optiond = $this->orig_to_html_frac(orig_to_html($this->common_pdf_junk_replace($row["optiond"]),'',''));
	if($row["group_id"]!='' && $row['group_id']!=0)
	{
		$passage_name ="";
		$passage_text ="";
		$group_text ="";
		$group_text = $this->common_pdf_junk_replace($row["group_text"]);
		if($row["passageid"] != 0 && $row['passageid']!='') {
			$grp_query ="SELECT passage_name, description FROM qms_passage WHERE passage_id = ".$row["passageid"]." ";
			$grp_dbquery = new dbquery($grp_query,$this->connid);
			$grp_row = $grp_dbquery->getrowarray();

			$passage_name= $this->common_pdf_junk_replace($grp_row['passage_name']);
			$passage_text =$this->orig_to_html_frac(orig_to_html($this->common_pdf_junk_replace($grp_row['description']),'',''));
			$subj = substr($this->paperCode,0,1);
			
			// taking only the the passage image for english			
			if($subj == 1) {
				// to recognize quotes  and image string for english			
				$passage_text = html_entity_decode($passage_text,ENT_QUOTES,"UTF-8");
				$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $passage_text, $matches);
      					
    	  		$first_img ="";
      			if(isset($matches[1][0]))
      				$first_img = $matches [1] [0];

				$passage_text = "<img src='".$first_img."' /> ";
			}

		}

	//	echo "$passage_text <br/>";
		$retArr = array('qcode'=>$row['qcode'],'qno'=>$row['qno'],"question"=>$ques,"group_text"=>$group_text,'passage_name'=>$passage_name,'passage_text'=>$passage_text,'optiona'=>$optiona,'optionb'=>$optionb,'optionc'=>$optionc,'optiond'=>$optiond);
	}
	else {
		$retArr = array('qcode'=>$row['qcode'],'qno'=>$row['qno'],"question"=>$ques,'optiona'=>$optiona,'optionb'=>$optionb,'optionc'=>$optionc,'optiond'=>$optiond);
	}
	return $retArr;
}

function orig_to_html_frac($orig) {

	// Commented below for the function custom_replace is in another file 
	$orig = str_ireplace("<p>","",$orig);
	$orig = str_ireplace("</p>","<br/>",$orig);

	$pattern[0] = "/{frac([^}]*)([^<])\//";
	$replacement[0] = "{frac\$1\$2|";

	$pattern[1] = "/{([a-z])}/";
	$replacement[1] = "<span class=var>\$1</span>";

	$pattern[2] = "/{exp\(([^{}]*)\)}/";
	$replacement[2] = "<span class=exp>\$1</span>";
	$pattern[3] = "/{frac\(([0-9]*)\+(.*)\)}/";
	$replacement[3] = "\$1{frac(\$2)}";
	$pattern[4] = "/{frac\(([0-9A-Za-z()+-?<>_'=\/&;^# ]*)\|([0-9A-Za-z()+-?<>_'=\/&;^# ]*)\)}/e";
	$replacement[4] = "'<span class=\"math\">'.custom_replace('\\1').' \over '.custom_replace('\\2').'</span>&nbsp;'";
	$html_ver = $orig;
	do
	{
		$orig = $html_ver;
		$html_ver = preg_replace($pattern, $replacement, $orig);
	} while ($orig!=$html_ver);
	return ($html_ver);
}

 // add  ETA Response
function addResponse(){

	if($this->paperCode =='' || $this->current_qcode == '' )
		return ;
	$addedFields ='';
	$addedValues ='';
	$updValues1 ='';
	$updValues2='';
	$this->appropriateComment = $this->cleanInput($this->appropriateComment);
	$this->clarityComment = $this->cleanInput($this->clarityComment);

	$check_query = "SELECT id,qcode,expPercent, commonWrong_flag, commonWrongOption, clarity, appropriate, clarityComment, appropriateComment FROM asset_etaResponses 
					WHERE teacher_id = ".$_SESSION['eta_teacherId']." AND papercode= '".$this->paperCode."' AND qcode =".$this->current_qcode." limit 1 ";
	$check_dbquery = new dbquery($check_query,$this->connid);

	// if exists update else add
	if($check_dbquery->numrows() == 0) {
		if( $this->clarityComment !='') {
			$addedFields .=' clarityComment,';
			$addedValues .="'".addslashes($this->clarityComment)."',";
		}
		if( $this->appropriateComment !='') {
			$addedFields .=' appropriateComment,';
			$addedValues .="'".addslashes($this->appropriateComment)."',";
		}
		$sub = substr($this->paperCode,0,1);
	$query =" INSERT INTO asset_etaResponses(teacher_id,papercode, qcode, expPercent, commonWrong_flag, commonWrongOption, clarity, appropriate, $addedFields round, added_by, added_dt, subject)
			VALUES (".$_SESSION['eta_teacherId'].",'".$this->paperCode."',$this->current_qcode,$this->expPercent,$this->commonWrongFlag,'".$this->commonWrongOpt."',
						$this->clarityIndex,$this->appropriateIndex, $addedValues '".$this->current_round."','".addslashes($_SESSION['eta_username'])."',NOW(), ".$sub.") ";
	} else {

		// id to update 
		$upd_result = $check_dbquery->getrowarray();
		// check for duplicate based on current and previous values 
		if($this->expPercent == $upd_result['expPercent'] && $this->commonWrongFlag == $upd_result['commonWrong_flag'] && $this->commonWrongOpt == $upd_result['commonWrongOption']
			&& $this->clarityIndex ==$upd_result['clarity'] && $this->appropriateIndex == $upd_result['appropriate'] && $this->clarityComment == $upd_result['clarityComment'] && $this->appropriateComment == $upd_result['appropriateComment'] ){
			// prevent duplicate update 			
			return;
		}
		$upd_id = $upd_result['id']; 

	//	if($this->clarityComment !='') {
			$updValues1 .=", clarityComment ='".addslashes($this->clarityComment)."'";
	//	}
	//	if($this->appropriateComment !='') {
			$updValues2 .=", appropriateComment ='".addslashes($this->appropriateComment)."'";
	//	}	

		$query =" UPDATE asset_etaResponses set expPercent =$this->expPercent , commonWrong_flag=$this->commonWrongFlag,
					commonWrongOption ='".$this->commonWrongOpt."', clarity =$this->clarityIndex, 
					appropriate = $this->appropriateIndex, added_by ='".addslashes($_SESSION['eta_username'])."', added_dt = NOW() $updValues1 $updValues2
					WHERE id = $upd_id ";
	}
			
	//echo "$query <br/> "; exit();
	$ins_dbquery = new dbquery($query,$this->connid);
}
// get Teacher Report 
function getTeacherReport(){

	$retArr = array();
	$query ="SELECT distinct(papercode) paper FROM asset_etaResponses WHERE teacher_id =".$_SESSION['eta_teacherId']." AND round ='".$this->current_round."' AND status =1";
	//echo "$query <br/>";
	$dbquery = new dbquery($query,$this->connid);

	while($row = $dbquery->getrowarray()) {
		$retArr[] = $row['paper']; 
	}

	return $retArr;
}

function getTestEdtionDetails(){
	$round = substr($this->paperCode,2,1);
  	$query = "SELECT description from test_edition_details where test_edition ='$round' ";
  	$dbquery = new dbquery($query,$this->connid);
  	$result = $dbquery->getrowarray();
  
	$school_query = "SELECT schoolname FROM schools WHERE schoolno = ".$_SESSION['eta_schoolCode']." ";
	$school_dbquery = new dbquery($school_query,$this->connid);
	$school_result =$school_dbquery->getrowarray();

 	return array('schoolname'=>$this->schoolNameCorrection($school_result['schoolname'] ), "desc" =>$result['description']);
}


function clean($value)
{
	/*
    $search = array("\\",  "\x00", "\n",  "\r",  "'",  '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r", "\'", '\"', "\\Z");
	*/
	$search = array("\\",  "\x00", "\n",  "\r",   '"', "\x1a");
    $replace = array("\\\\","\\0","\\n", "\\r",  '\"', "\\Z");
    return str_replace($search, $replace, $value);
}
// section 2 of ETA Reports grade appropriateness and question clarity
function getSectionTwoDetails () {
	
	$communityArr =array();
	$teacherArr = array();
	
	$teacher_query ="SELECT avg(clarity) teacher_clarity, avg(appropriate)  teacher_gradeAppr FROM asset_etaResponses WHERE paperCode ='".$this->paperCode."' AND teacher_id = ".$_SESSION['eta_teacherId']." ";
	$teacher_dbquery = new dbquery($teacher_query,$this->connid);
	//echo " $teacher_query <br/> ";

	$commuity_query ="SELECT avg(clarity) community_clarity,  avg(appropriate)  community__gradeAppr  FROM asset_etaResponses WHERE paperCode ='".$this->paperCode."' AND teacher_id != ".$_SESSION['eta_teacherId']." ";
	$commuity_dbquery  = new dbquery($commuity_query,$this->connid);
	//echo " $commuity_query <br/> ";

	$teacherResult= $teacher_dbquery->getrowarray();
	if($teacherResult['teacher_clarity'] !="" && $teacherResult['teacher_gradeAppr'] !="") {
		$teacherArr = array('clarity_avg'=>$teacherResult["teacher_clarity"],'gradeAppr_avg'=>$teacherResult['teacher_gradeAppr']);
	}
	
	$communityResult= $commuity_dbquery->getrowarray();
	if($communityResult['community_clarity'] !="" && $communityResult['community__gradeAppr'] !="") {
		$communityArr = array('clarity_avg'=>$communityResult["community_clarity"],'gradeAppr_avg'=>$communityResult['community__gradeAppr']);
	}
	return array($teacherArr,$communityArr);
}
// get highest difference of clarity and grade appropriate 
function getEtaDiff() {

	$teacherClarityArr= array();
	$teacherApprArr = array();
	$communityClarityArr= array();
	$communityApprArr = array();
	$retArr =array();

	$teacher_query = "SELECT qcode, clarity, appropriate FROM asset_etaResponses WHERE papercode ='".$this->paperCode."'
					  AND teacher_id =".$_SESSION['eta_teacherId']." ";
	//echo "$teacher_query <br/> ";
	$teacher_dbquery = new dbquery($teacher_query,$this->connid);
	if($teacher_dbquery->numrows()> 0 ) {
		while($teacher_row = $teacher_dbquery->getrowarray()){
			$teacherClarityArr[$teacher_row['qcode']] =$teacher_row['clarity'];
			$teacherApprArr[$teacher_row['qcode']] =$teacher_row['appropriate']; 
		}		
	}

	$community_query = "SELECT qcode, avg(clarity) avg_clarity, avg(appropriate) avg_appropriate FROM asset_etaResponses WHERE papercode ='".$this->paperCode."'
					  AND teacher_id !=".$_SESSION['eta_teacherId']."  group by qcode";
	//echo "$community_query <br/> ";
	$community_dbquery = new dbquery($community_query,$this->connid);
	if($community_dbquery->numrows() > 0) {
		while($community_row = $community_dbquery->getrowarray()){
			$communityClarityArr[$community_row['qcode']] =$community_row['avg_clarity'];
			$communityApprArr[$community_row['qcode']] =$community_row['avg_appropriate']; 
		}	
	}

	/*
	print_r($teacherClarityArr);
	print_r($communityClarityArr);
	print_r($teacherApprArr);
	print_r($communityApprArr);
	*/
	//question list to compare 
	$quesClarityArr = array_keys($teacherClarityArr);
	$quesApprArr = array_keys($teacherApprArr);
	$diffClarityArr = array();
	$diffApprArr = array();
	
	/*
	print_r($quesClarityArr);
	print_r(array_keys($communityClarityArr));
	*/
	foreach($quesClarityArr as $list =>$ques ) {

		if(isset($communityClarityArr[$ques])) {
			$diffClarityArr[$ques]=$communityClarityArr[$ques] -$teacherClarityArr[$ques];			
		}
	}

	foreach($quesApprArr as $list =>$ques ) {

		if(isset($communityClarityArr[$ques])) {
			$diffApprArr[$ques]=$communityApprArr[$ques] -$teacherApprArr[$ques];
		}
	}
	//print "Difference in clarity <pre>"; print_r($diffClarityArr); print "</pre>";
	// get the lowest diff value from array 
	//print"DIFF CLARITY "; print_r($quesClarityArr);
	//print"DIFF APPROPRIATE "; print_r($quesApprArr);
	// qcodes with large difference with teacher community 
	if(count($diffClarityArr) > 0 && count($diffApprArr) > 0 )
	{
		$minClarityQcode = current(array_keys($diffClarityArr, max($diffClarityArr)));
		$minAppropriateQcode = current(array_keys($diffApprArr, max($diffApprArr)));

		// clarity values
		$retArr[0]=array('qcode'=>$minClarityQcode,'teacherVal'=>$teacherClarityArr[$minClarityQcode],'communityVal'=>$communityClarityArr[$minClarityQcode]);
		// appropriate values
		$retArr[1]=array('qcode'=>$minAppropriateQcode,'teacherVal'=>$teacherApprArr[$minAppropriateQcode],'communityVal'=>$communityApprArr[$minAppropriateQcode]);
	}
	//print " Minimum clarity value $minClarity  $minAppropriate<br/> ";
	// qcodes where there is large dicrepencies with teacher community 
	return $retArr;
}
//
function getMisconceptionPrediction() {	
	$query ="select paper_master.qcode,paper_master.papercode, paper_master.qno FROM misconception_questions INNER JOIN paper_master ON misconception_questions.papercode= paper_master.papercode
			AND paper_master.qno = misconception_questions.qno
			WHERE  misconception_questions.papercode ='".$this->paperCode."'";
	//echo "$query <br/> ";
}
// responses of ETAS 
function getResponses() {
	$this->setpostvars();
	$retArr =array();
	$query = "SELECT asset_etas.qno, asset_etaResponses.expPercent,asset_etaResponses.commonWrong_flag, asset_etaResponses.commonWrongOption,
			  asset_etaResponses.clarity,asset_etaResponses.appropriate FROM asset_etaResponses INNER JOIN 
			  asset_etas ON asset_etas.papercode = asset_etaResponses.papercode AND asset_etas.qcode = asset_etaResponses.qcode 
			  WHERE teacher_id = ".$_SESSION['eta_teacherId']." AND asset_etas.papercode ='".$_SESSION['eta_papercode']."' ";
	//echo "$query <br/> ";
	$dbquery = new dbquery($query,$this->connid);

	while($row=$dbquery->getrowarray()) {
		$retArr[$row['qno']] = array('expPercent'=>$row['expPercent'],'commonWrong_flag'=>$row['commonWrong_flag'],
					'commonWrongOption'=>$row['commonWrongOption'],'clarity'=>$row['clarity'],'appropriate'=>$row['appropriate']);
	}
	ksort($retArr);

	return $retArr;
}
function sortByOrder($a, $b) {
    return $a['qno'] - $b['qno'];
}

// function for configuratiton of Etas 
function getConfigData() {
	$retArr =array();
	$query ="SELECT total_ques, start_date, end_date,nationType FROM asset_etaConfig WHERE test_edition ='$this->current_round' ";
	//echo "$query <br/>";
	$dbquery = new dbquery($query,$this->connid);
	while($row=$dbquery->getrowarray()) {
		$retArr[$row['nationType']] = array('total_ques'=>$row['total_ques'],'start_date'=>$row['start_date'],'end_date'=>$row['end_date'], 'nationType'=>$row['nationType']);
	}
	return $retArr;
}
// update config details
function updateConfigData() {

	$start_date = date('Y-m-d',strtotime($this->eta_startDate));
	$end_date = date('Y-m-d',strtotime($this->eta_endDate));
	$current_date = date('Y-m-d');
	$retMsg ='';
	// changed to check only if the end date is not predated 
	if( $end_date < $current_date) {
		$retMsg = "Cannot set end date to a previous date";
		return $retMsg;
	}
	if($this->eta_totalQues <=0) {
		$retMsg ="Incorrect total questions value";
		return $retMsg;
	}

	// check if start and end date greater than current date
	$query ="UPDATE asset_etaConfig set total_ques =$this->eta_totalQues, start_date ='".$start_date."' , end_date ='".$end_date."',
				 modified_by ='".addslashes($_SESSION['username'])."'
				where test_edition ='$this->current_round' AND nationType =".$this->nationType." ";
	//echo "$query <br/> ";			
	$dbquery = new dbquery($query,$this->connid);
}

// question count in Etas Paper 
function eta_QuesCount($paperCode) {
	$ques_count =0;
	$query = "SELECT count(*) ques_count from asset_etas where papercode ='".$paperCode."' ";
	$dbquery = new dbquery($query,$this->connid);
	
	if($dbquery->numrows() > 0) {
		$result = $dbquery->getrowarray();
		$ques_count = $result['ques_count'];
	}
	return $ques_count;
}

// Accuracy Performance Functions 
// first ca chosen as misconception option
// second based on highest difference between prediction
// third if the misconcepiton option chosen is wrong 
 function assessmentSummary() {
	
	$predictDiffArr =array();
	$caFieldArr = array('A'=>'optionA_cnt','B'=>'optionB_cnt','C'=>'optionC_cnt','D'=>'optionD_cnt');
	$percentMapArr = array('1'=>15,'2'=>40,'3'=>60,'4'=>85);
	$tableName = 'asset_etaConsolidateResponses'.$this->current_round;
	$caChosenMisconceptionArr= array();
	$perfQuesArr=array();
	// question perf count 
	$outPerf_cnt =0;
	$underPerf_cnt =0;
	$accurate_cnt =0;
	$totalNotableExamples =2;

	$teacher_query = "SELECT asset_etaResponses.qcode, asset_etaResponses.expPercent, asset_etaResponses.commonWrongOption ,questions.correct_answer FROM asset_etaResponses  INNER JOIN questions ON 
						asset_etaResponses.qcode= questions.qcode WHERE asset_etaResponses.papercode ='".$this->paperCode."'
					  AND asset_etaResponses.teacher_id =".$_SESSION['eta_teacherId']." ";
	//echo "$teacher_query <br/> ";
	$teacher_dbquery = new dbquery($teacher_query,$this->connid);
	while($teacher_row = $teacher_dbquery->getrowarray()) {
		$teacherExpectArr[$teacher_row['qcode']] =array('expPercent'=>$teacher_row['expPercent'],'ca'=>$teacher_row['correct_answer'],
														 'misconception_chosen'=>$teacher_row['commonWrongOption']);
		
		// if they have chosen correct answer as misconception, priority to them so save 
		if($teacher_row['commonWrongOption'] == $teacher_row['correct_answer']) {
			$caChosenMisconceptionArr[]=$teacher_row['qcode'];
		}
	}
	// qcodes to check performance in response table
	$quesArr= array_keys($teacherExpectArr);
	$quesArr = array_unique($quesArr);
	$quesList = implode(',',$quesArr);

	$actual_query ="SELECT qcode,optionA_cnt, optionB_cnt, optionC_cnt, optionD_cnt, option_invalid, option_skipped 
					FROM $tableName
					WHERE papercode ='".$this->paperCode."' AND schoolCode= ".$_SESSION['eta_schoolCode']." AND qcode in ($quesList)";
	//echo "$actual_query <br/> ";
	$actual_dbquery = new dbquery($actual_query, $this->connid);

	if($actual_dbquery->numrows() > 0) {
		while($actual_row = $actual_dbquery->getrowarray()) {
			$totalResponse = $actual_row['optionA_cnt'] + $actual_row['optionB_cnt']+ $actual_row['optionC_cnt']+$actual_row['optionD_cnt']+$actual_row['option_invalid']+$actual_row['option_skipped'];

			$correctAnsResponse = $actual_row[$caFieldArr[$teacherExpectArr[$actual_row['qcode']]['ca']]];
			
			if($totalResponse != 0) {
				$percentPerf =  round(($correctAnsResponse/$totalResponse) *100,2);
				$optionA_percent = round(($actual_row['optionA_cnt']/$totalResponse) *100,2);
				$optionB_percent = round(($actual_row['optionB_cnt']/$totalResponse) *100,2);
				$optionC_percent = round(($actual_row['optionC_cnt']/$totalResponse) *100,2);
				$optionD_percent = round(($actual_row['optionD_cnt']/$totalResponse) *100,2);
			}	
			else {
				$percentPerf = 0;
				$optionA_percent =0;
				$optionB_percent =0;
				$optionC_percent =0;
				$optionD_percent =0;
			}

			$predictPerf = $percentMapArr[$teacherExpectArr[$actual_row['qcode']]['expPercent']];

			$predict = $teacherExpectArr[$actual_row['qcode']]['expPercent'];
			$typePerf = $this->getPerformanceType($actual_row['qcode'],$predict,$percentPerf);
			if($typePerf ==0 ) {
				$accurate_cnt++;
			} else if($typePerf ==1 ) {
				$outPerf_cnt++;
			} else {
				$underPerf_cnt++;
			}

			$optionValArr =array('A'=>$optionA_percent,'B'=>$optionB_percent,'C'=>$optionC_percent,'D'=>$optionD_percent);
			unset($optionValArr[$teacherExpectArr[$actual_row['qcode']]['ca']]);
			$max_wrongOptionArr = array_keys($optionValArr, max($optionValArr));

			$predictDiffArr[$actual_row['qcode']]= array('actual'=>$percentPerf,'prediction'=> $teacherExpectArr[$actual_row['qcode']]['expPercent'],'qcode'=>$actual_row['qcode']
													,'option_a'=>$optionA_percent,'option_b'=>$optionB_percent,'option_c'=>$optionC_percent,'option_d'=>$optionD_percent
													,'ca'=>$teacherExpectArr[$actual_row['qcode']]['ca'], 'maxWrongOptionValArr'=>$max_wrongOptionArr);
			
			// absolute difference  and not in already selected question step 1 
			if(!in_array($actual_row['qcode'],$caChosenMisconceptionArr))
				$diffArr[$actual_row['qcode']] = abs($percentPerf-$predictPerf);
			//echo " Exp percent ".$teacherExpectArr[$actual_row['qcode']]['expPercent']." $correctAnsResponse <br/> ";
		}

//	print"<pre>"; print_r($predictDiffArr);print "</pre>";
 	
 	// revere sort and pick two with highest difference
	if(count($diffArr) > 0)
		arsort($diffArr);

	// first step from ca chosen as misconception 
	foreach($caChosenMisconceptionArr as $qKey => $quesCode) {
		if(count($perfQuesArr) >= $totalNotableExamples) break;

		$perfQuesArr[$quesCode] = $predictDiffArr[$quesCode];
	}
	// second step out perform or under perform with diff greater than 15 
	if(count($perfQuesArr) < $totalNotableExamples) {
		foreach($diffArr as $dCode =>$dPercent) {
			
			if(count($perfQuesArr) >= $totalNotableExamples ) break;

			// if diff percent is greater or equal to 15 
			if($dPercent >= 15)
				$perfQuesArr[$dCode]=$predictDiffArr[$dCode];
		}
	}

	// third step wrong option selected as misconception but its not national max wrong option -- changed the logic 
	// not school max wrong option 
	if(count($perfQuesArr) < $totalNotableExamples) {
		// get count and find remaining notable example based on max wrong option chosen
	// previous logic of Natinal max wrong option comapare 
	/*	$retQcodeArr = $this->getRemainingExample($diffArr,$teacherExpectArr,count($perfQuesArr));
		foreach($retQcodeArr as $qcKey => $qcMaxWrongOptionArr) {
			$predictDiffArr[$qcKey]['maxWrongOptionValArr']	=$qcMaxWrongOptionArr;			
			
			$perfQuesArr[$qcKey] = $predictDiffArr[$qcKey];			
		}
	*/
		$cntToGet = $totalNotableExamples - count($perfQuesArr);
		foreach($diffArr as $dQcode =>$dValue){
			if(count($perfQuesArr) >=$totalNotableExamples) break;

			// if teacher chosen misconception not equal to national misconception option take the qcode
			if(!in_array($teacherExpectArr[$dQcode]['misconception_chosen'], $predictDiffArr[$dQcode]['maxWrongOptionValArr'])) {
				$perfQuesArr[$dQcode] =$predictDiffArr[$dQcode];
			}
		}
		
	}

//	print"<pre>"; print_r($perfQuesArr); print "</pre>";
//	print"<pre>"; print_r($perfQuesArr);print "</pre>";	
	reset($perfQuesArr);
	$firstQuesKey = key($perfQuesArr);
	end($perfQuesArr);
	$secondQuesKey = key($perfQuesArr);

	$total_cnt = $underPerf_cnt+$outPerf_cnt+$accurate_cnt;
	$underPerf_percent = round(($underPerf_cnt/$total_cnt) *100,2);
	$outPerf_percent = round(($outPerf_cnt/$total_cnt) *100,2);
	$accuratePerf_percent = round(($accurate_cnt/$total_cnt) *100,2);

	//echo "$total_cnt $underPerf_cnt $outPerf_cnt  $accurate_cnt<br/> ";
	$nationalAverage= $this->getNationalAvg($firstQuesKey,$secondQuesKey);

	$quesNationalMisconArr[$firstQuesKey] =$predictDiffArr[$firstQuesKey]['maxWrongOptionValArr'];
	$quesNationalMisconArr[$secondQuesKey] =$predictDiffArr[$secondQuesKey]['maxWrongOptionValArr'];

	//print_r($nationalAverage);
/*	$misconceptionArr = $this->getMisconceptionData($firstQuesKey,$secondQuesKey,
							$predictDiffArr[$firstQuesKey]['maxWrongOptionValArr'],$predictDiffArr[$secondQuesKey]['maxWrongOptionValArr'],
							$predictDiffArr[$firstQuesKey]['ca'],$predictDiffArr[$secondQuesKey]['ca']);
*/

	$misconceptionArr = $this->getMisconceptionData($firstQuesKey,$secondQuesKey,$quesNationalMisconArr,
										$predictDiffArr[$firstQuesKey]['ca'],$predictDiffArr[$secondQuesKey]['ca']);
	
		$otherDetailsArr =array('underPerf_percent'=>$underPerf_percent,'outPerf_percent'=>$outPerf_percent,
			'accurate_percent'=>$accuratePerf_percent);
		return array($perfQuesArr,$otherDetailsArr,$nationalAverage,$misconceptionArr);
	}

	return array('',array('underPerf_percent'=>0,'outPerf_percent'=>0,'accurate_percent'=>0),'','');
	// first is under preform last is over performing

 }

 function getPerformanceType($qcode,$predict,$percentPerf) {

 	$retVal ='';
 	// 0 - accurate 1- out perform 2 - under perform 
 	if($predict == 1) {
 		if($percentPerf <30) {
 			$retVal =0;
 		} else  {
 			$retVal =1;
 		}
 	}
 	if($predict ==2) {
 		if($percentPerf >=30 && $percentPerf <= 50) {
 			$retVal =0;
 		} else  if($percentPerf < 30 ) {
 			$retVal =2;
 		} else {
 			$retVal =1;
 		}
 	}
 	if($predict ==3) {
 		if($percentPerf >=50 && $percentPerf <= 70) {
 			$retVal =0;
 		} else  if($percentPerf < 50 ) {
 			$retVal =2;
 		} else {
 			$retVal =1;
 		}
 	}
 	if($predict ==4) {
 		if($percentPerf >= 70) {
 			$retVal =0;
 		} else {
 			$retVal =2;
 		}
 	}

 	return $retVal;
 }

 function getNationalAvg($firstQuesKey,$secondQuesKey) {

 	$nationalAvg = array();
 	$tableName = 'asset_etaConsolidateResponses'.$this->current_round;
 	// query changed from correct answer table to the response 
 /*	$query ="SELECT paper_master.qcode, option_a,option_b,option_c,option_d FROM correct_answers, paper_master where correct_answers.qno = paper_master.qno 
 			 AND correct_answers.papercode = '".$this->paperCode."'  and paper_master.qcode in ($firstQuesKey,$secondQuesKey) ORDER BY FIELD (paper_master.qcode,$outPerfQcode,$underPerfQcode ) ";
 	 echo "$query <br/> ";
 */
 	 $query = "SELECT qcode, SUM(optionA_cnt) optionA_sum, SUM(optionB_cnt) optionB_sum, SUM(optionC_cnt) optionC_sum, SUM(optionD_cnt) optionD_sum, SUM(option_invalid) optionInvalid_sum, SUM(option_skipped) optionSkipped_sum
  	 			FROM $tableName where papercode = '".$this->paperCode."' AND qcode in ($firstQuesKey,$secondQuesKey) 
  	 			GROUP BY qcode "; 
 	//echo "$query <br/>";
 	$dbquery = new dbquery($query,$this->connid);
 	while($nationalRow = $dbquery->getrowarray()) {
 		$total_sum = $nationalRow['optionA_sum']+$nationalRow['optionB_sum']+$nationalRow['optionC_sum']+$nationalRow['optionD_sum']+$nationalRow['optionInvalid_sum']+$nationalRow['optionSkipped_sum'];
 		if($total_sum !=0 ) {
 			$optiona_perf = round($nationalRow['optionA_sum']/$total_sum * 100,2);
 			$optionb_perf = round($nationalRow['optionB_sum']/$total_sum * 100,2);
 			$optionc_perf = round($nationalRow['optionC_sum']/$total_sum * 100,2);
 			$optiond_perf = round($nationalRow['optionD_sum']/$total_sum * 100,2);

 		}else {
			$optiona_perf = $optionb_perf = $optionc_perf = $optiond_perf = 0;
 		}
 		// comment not required to get National max worng option values
	/*	$optionValArr =array('A'=>$optiona_perf,'B'=>$optionb_perf,'C'=>$optionc_perf,'D'=>$optiond_perf);
		unset($optionValArr[$teacherExpectArr[$nationalRow['qcode']]['ca']]);
		$max_wrongOptionArr = array_keys($optionValArr, max($optionValArr));			
	*/
	//	echo "NAVEEN CA ".$nationalRow['qcode']." ".$teacherExpectArr[$nationalRow['qcode']]['ca']."  <br>";
	//	print"<pre>"; print_r($optionValArr); print "</pre>";

		$nationalAvg[$nationalRow['qcode']] = array("qcode"=>$nationalRow['qcode'],'option_a'=>$optiona_perf,'option_b'=>$optionb_perf,
 			'option_c'=>$optionc_perf,'option_d'=>$optiond_perf);
 	}

 	return $nationalAvg;
 }
 function getMisconceptionDetails() {

	$incorrectPredict =0;
	$inaccuratePercent =0;
	$correctAnsPercent =0;
	$accuratePercent=0;
	$etaArr =array();
	$misArr =array();
	$inaccuratePredictQues =array();

 	$paper_query ="select group_concat(qcode) ques from asset_etas where papercode = '".$this->paperCode."' ";
 	$paper_dbquery = new dbquery($paper_query,$this->connid);
 	$paper_row = $paper_dbquery->getrowarray();
 	$quesList =$paper_row['ques'];
 	
 	$query ="SELECT group_concat(qcode) ques FROM asset_etaResponses where papercode ='".$this->paperCode."' AND 
 				teacher_id = ".$_SESSION['eta_teacherId']." AND commonWrong_flag =1";
 	$eta_dbquery = new dbquery($query,$this->connid);
 	$eta_row = $eta_dbquery->getrowarray();
 	$eta_quesList = $eta_row['ques'];

 	if($quesList != ''){
 		$quesArr = explode(",",$quesList);
 	}
 	if($eta_quesList !='') {
 		$etaArr = explode(",",$eta_quesList);
 	}
 	$mis_query ="SELECT paper_master.qcode FROM misconception_questions , paper_master where paper_master.papercode = misconception_questions.papercode AND paper_master.qno = misconception_questions.qno and 
 					paper_master.papercode ='".$this->paperCode."'  AND misconception_questions.papercode ='".$this->paperCode."' "; 					
 	//echo "$mis_query <br/> ";
 	$mis_dbquery = new dbquery($mis_query,$this->connid);
 	while($mis_row = $mis_dbquery->getrowarray()) {
 		$misArr[] = $mis_row['qcode'];
 	}
	
 	foreach($etaArr as $key => $eta_ques) {
 		if(!in_array($eta_ques,$misArr)) {
 			$incorrectPredict++;
 			$inaccuratePredictQues[] = $eta_ques;
 		}
 	}

 	//echo "$incorrectPredict <br/> ";
 	// misconception option chose but its correct answer 
 	$correctAnsChosen =0 ;
 	if(count($inaccuratePredictQues) > 0 ){
 		$inaccurate_ques = implode($inaccuratePredictQues,',');

 		$sameAns_query ="SELECT COUNT(*) cnt FROM asset_etaResponses INNER JOIN questions ON asset_etaResponses.qcode = questions.qcode 
 						  WHERE questions.qcode in ($inaccurate_ques) AND questions.correct_answer = asset_etaResponses.commonWrongOption 
 						  AND asset_etaResponses.teacher_id = '".$_SESSION['eta_teacherId']."' ";
 		//echo " SAME $sameAns_query <br/> ";
 		$same_dbquery = new dbquery($sameAns_query,$this->connid);
 		$same_row = $same_dbquery->getrowarray();
 		$correctAnsChosen = $same_row['cnt'];
 	}
 	$total_ques = count($quesArr);

 	//echo "$total_ques $incorrectPredict $correctAnsChosen <br/> ";
 	if($total_ques != 0) {
 		$inaccuratePercent = ($incorrectPredict /$total_ques) * 100;
 		$correctAnsPercent = ($correctAnsChosen /$total_ques) * 100;
 		$accuratePercent = 100 - ($inaccuratePercent+$correctAnsPercent);
 	}	

 	//echo "<br/> $inaccuratePercent $correctAnsPercent $accuratePercent <br/> ";

 	return array('accuratePercent'=>$accuratePercent,'inaccuratePercent'=>$inaccuratePercent,'ca_chosen'=>$correctAnsPercent,);
 }
 function getMisconceptionData($firstQuesKey,$secondQuesKey,$quesNationalMisconArr,$firstQuesCA,$secondQuesCA) {
	
 	$remarkArr = array("","Your prediction is accurate.","Your prediction is inaccurate. ","You chose the correct answer as the misconception!",
 					"This question has indeed shown a  common misconception.");
 	$retArr =array();
 	$caArr = array();
 	$remarkIndex = 0;
 	$actual ='';

 	$remark ='';
 	$misc_exp = "SELECT paper_master.qcode, misconception_questions.explanation, questions.correct_answer from misconception_questions , paper_master,questions where paper_master.papercode = misconception_questions.papercode AND paper_master.qno = misconception_questions.qno
 					AND paper_master.qcode = questions.qcode AND paper_master.papercode ='".$this->paperCode."'  AND misconception_questions.papercode ='".$this->paperCode."'
 					AND paper_master.qcode in ($firstQuesKey,$secondQuesKey) ";
 	//echo "$misc_exp <br/>";
 	$misc_dbquery = new dbquery($misc_exp,$this->connid);
 	while($misc_row = $misc_dbquery->getrowarray()) {
 		$misArr[$misc_row['qcode']] = $misc_row['explanation'];
 		$caArr[$misc_row['qcode']] =$misc_row['correct_answer'];
 	}

 	$query = "SELECT qcode, commonWrongOption from asset_etaResponses WHERE papercode ='".$this->paperCode."' AND 
 			teacher_id = ".$_SESSION['eta_teacherId']." AND qcode in ($firstQuesKey,$secondQuesKey) ";
 	//echo "$query <br>";		
 	$dbquery = new dbquery($query,$this->connid);
 	while($row =$dbquery->getrowarray()) {
 		if($row['commonWrongOption'] === '') {
 			$str ='No Misconception ';
 			$actual = $quesNationalMisconArr[$row['qcode']][0];

 			$remarkIndex =4;
 		}	
 		else {
 			// $str ='Yes, Option '.$row['commonWrongOption']. " " ;
 			if( $row['qcode'] === $firstQuesKey ) {
 				if($row['commonWrongOption'] === $firstQuesCA)
 					$remarkIndex = 3;
 				else if(in_array($row['commonWrongOption'],$quesNationalMisconArr[$row['qcode']])) 
 					$remarkIndex = 1;
 				else 
 					$remarkIndex = 2;

 				$actual = $quesNationalMisconArr[$row['qcode']][0];
 			} else {

 				if($row['commonWrongOption'] === $secondQuesCA)
 					$remarkIndex = 3;
 				else if(in_array($row['commonWrongOption'],$quesNationalMisconArr[$row['qcode']])) 
 					$remarkIndex = 1;
 				else 
 					$remarkIndex = 2;

 				$actual = $quesNationalMisconArr[$row['qcode']][0];
 			}

 			$str = $row['commonWrongOption'];
 		}	
 		$expl = isset($misArr[$row['qcode']]) ? $misArr[$row['qcode']] :'';
 		$retArr[$row['qcode']] = array('qcode'=>$row['qcode'],'msg'=>$str,'actual'=>$actual,'remark'=>$remarkArr[$remarkIndex],'explanation'=>$expl);
 	}
 //	print"<pre>"; print_r($retArr); print "</pre>";
 	return $retArr;
 }
 function saveReportHTML() {

 	$this->eta_reportHTML = html_entity_decode($this->eta_reportHTML);
 	$handle = fopen("file.html", "w");
    fwrite($handle, $this->eta_reportHTML);
    fclose($handle);

    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename('file.html'));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize('file.html'));
    readfile('file.html');
    exit;
 }
 // get clarity and appropriate sentance
 function commentSentance($index,$teacherVal,$communityVal) {
 	// index 1 - Clarity 2- Appripriateness
 	$sentance ="";
 	
 	if($index ==0 ) {
 		$sectionVal ='clarity';
 		$sectionVal2='to be clear';
 		$sectionVal3 ='ambiguous';
 		$sectionVal4 ='considers';
 	}	
 	else { 
 		$sectionVal ='grade appropriateness';
 		$sectionVal2 ='grade appropriate';
 		$sectionVal3 ='grade appropriate';
 		$sectionVal4 ='does not consider ';
 	}	

 	if($teacherVal < 3 && $communityVal >= 3 ){
 		$diff = $communityVal - $teacherVal;

 		if($diff > 1.5 ) {
 			$sentance = "The general consensus within the teacher community on the ".$sectionVal." of this question seems to be significantly higher in comparison to your feedback.
 			 			 If there are any specific inputs you would like to share with us, please write to feedback@ei-india.com.";
 		}	 			 
 		else  {
 			$sentance =" The general consensus within the teacher community on the ".$sectionVal." of this question seems to be slightly higher in comparison to your feedback.
 						If there are any specific inputs you would like to share with us, please write to feedback@ei-india.com.";
 		}

 	} else if($teacherVal >=3 && $communityVal < 3) {
 		$diff = $teacherVal - $communityVal;

 		if($diff > 1.5 ) {
 			$sentance = "The general consensus within the teacher community on the ".$sectionVal." of this question seems to be significantly lower in comparison to your feedback. 
 						We will review this question internally to eliminate any sort of ambiguity in such questions in future rounds. Such feedback is highly appreciated, thank you.";
 		}	 			 
 		else  {
 			$sentance =" The general consensus within the teacher community on the ".$sectionVal." of this question seems to be slightly lower in comparison to your feedback. 
 						We will review this question internally to eliminate any sort of ambiguity in such questions in future rounds. Such feedback is highly appreciated, thank you.";
 		}

 	} else if($teacherVal >= 3 && $communityVal >= 3){
 		$sentance = "It seems clear that the teacher community, including you, considers this question ".$sectionVal2.". Your feedback is highly appreciated, thank you.";
 	} else if($teacherVal < 3 && $communityVal < 3) {
 		
 		$sentance = " It seems clear that the teacher community, including you, ".$sectionVal4." this question ".$sectionVal3.". We will review this question internally to improve and prevent the presence of such questions in future rounds. Such feedback is highly appreciated, thank you.";
 	} else {
 		$sentance ="";
 	}

 	return $sentance;
 }
 
 // function to get tests in progress for the current user
 	function getOngoingTests(){

 		$retArr = array();
		$query ="SELECT distinct(papercode) paper FROM asset_etaResponses WHERE teacher_id =".$_SESSION['eta_teacherId']."
				 AND round ='".$this->current_round."'  AND status =0 ";
		//echo "$query <br/>";
		$dbquery = new dbquery($query,$this->connid);

		while($row = $dbquery->getrowarray()) {
			$retArr[] = $row['paper']; 
		}

		return $retArr;
 	}
 	// function get ongoing and report generated papers for a teacher 
 	function getTeacherTestDetails() {
 		$ongoingArr = array();
 		$reportArr = array();
		$query ="SELECT distinct(papercode) paper, status FROM asset_etaResponses WHERE teacher_id =".$_SESSION['eta_teacherId']."
				 AND round ='".$this->current_round."'  ";
		//echo "$query <br/>";
		$dbquery = new dbquery($query,$this->connid);

		while($row = $dbquery->getrowarray()) {
			// $retArr[] = $row['paper']; 
			if($row['status'] == 0)
				$ongoingArr[] = $row['paper'];
			else 
				$reportArr[] = $row['paper'];
		}

		return array($reportArr, $ongoingArr); 
 	}
 	// function to make complete test for the paper code 
 	function completeTest() {
 		$retMsg ='';
 		if($this->paperCode == '' )
 			return;
 		if(isset($_SESSION['eta_teacherId'])) {
 			$query = "UPDATE asset_etaResponses set status =1 WHERE teacher_id = '".$_SESSION['eta_teacherId']."' 
 				 AND round ='".$this->current_round."' AND papercode ='".$this->paperCode."'	";
 			$dbquery = new dbquery($query,$this->connid);
 		}	
 		
 	}
 	// function to start a test , from where they left previously
 	function getLastUnAnsweredQuestion() {

 		// if the current_qno is already set , then no need to load last answered question
 		if($this->current_qno !='') 
 			return;

 		$papercode = $_SESSION['eta_papercode'];

 		if($papercode =='')
 			return 1;
 		$current_qno =1;
 		$query = "SELECT asset_etas.qno FROM asset_etas INNER JOIN asset_etaResponses 
 				  ON asset_etas.papercode= asset_etaResponses.papercode AND asset_etas.qcode = asset_etaResponses.qcode
 				  WHERE asset_etaResponses.teacher_id ='".$_SESSION['eta_teacherId']."' AND asset_etaResponses.round ='".$this->current_round."'
 				  AND asset_etaResponses.papercode= '".$papercode."'  order by asset_etas.qno desc limit 1";
 		//echo "$query <br/>";
 		$dbquery = new dbquery($query,$this->connid);
 		while($row= $dbquery->getrowarray()){
 			$current_qno = $row['qno'];
 		}
 		return $current_qno;
 		
 	}

 	// to form the remark based on actual and prediction data
 	function getperfRemark($predictedVal,$actualVal){
 		$sentanceArr = array('indeed performed as expected.','outperformed in relation to the expectation.','underperformed in relation to the expectation.');
 		$sentanceIndex=0;
 		$remark ="Your students have ";
 		
 		$sentanceIndex = $this->getPerformanceType('',$predictedVal,$actualVal);

 		return $remark.$sentanceArr[$sentanceIndex];
 	}

 	// function to check passacode and create logins  	
 	function getSchools($schoolId ='') {
 		$data =array();

 		$cond ='';
 		if($schoolId !='')
 			$cond = " AND asset_etaPasscodes.schoolcode =".$schoolId." ";
		$query = "SELECT schools.schoolname, schools.city, schools.schoolno FROM asset_etaPasscodes 
					INNER JOIN schools ON asset_etaPasscodes.schoolCode = schools.schoolno 
					WHERE asset_etaPasscodes.round = '$this->current_round' $cond ORDER BY schoolname";
		//echo "$query <br/> ";
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowassocarray()) {
			$data[$row['schoolno']] = $this->schoolNameCorrection($row['schoolname']). " (".$row['city'].")";
		}
		return $data;
 	}
 	// get PBC data for the questons in the paper
 	function getPBCdata($paper_code) {

 		$query ="select paper_master.qcode,paper_master.qno,pbc_option_a,pbc_option_b,pbc_option_c,pbc_option_d,pbc_option_invalid,pbc_option_skipped,difficulty,guessing,discrimination,
 				 correct_answers.option_a, correct_answers.option_b, correct_answers.option_c, correct_answers.option_d, correct_answers.option_invalid,correct_answers.option_skipped	
 				 from questionwise_performance INNER JOIN 
 				 paper_master ON questionwise_performance.papercode = paper_master.papercode  AND  questionwise_performance.qno = paper_master.qno
 				 INNER JOIN correct_answers ON questionwise_performance.papercode=  correct_answers.papercode AND  correct_answers.qno = paper_master.qno
 				 where questionwise_performance.papercode='$paper_code' ";
 		//echo "$query <br/>";
 		$dbquery = new dbquery($query,$this->connid);
 		while($row=$dbquery->getrowarray()){

 			$retArr[$row['qcode']] =array('qno'=>$row['qno'],'pbc_optiona'=>$row['pbc_option_a'],'pbc_optionb'=>$row['pbc_option_b']
 										,'pbc_optionc'=>$row['pbc_option_c'],'pbc_optiond'=>$row['pbc_option_d'],'pbc_option_skipped'=>$row['pbc_option_skipped']
 										,'pbc_option_invalid'=>$row['pbc_option_invalid'],
 										'pc_optiona'=>$row['option_a'],'pc_optionb'=>$row['option_b'],'pc_optionc'=>$row['option_c'],'pc_optiond'=>$row['option_d'],
 										'pc_option_invalid'=>$row['option_invalid'],'pc_option_skipped'=>$row['option_skipped']
 										);
 		}

 		return $retArr;
 	}

 	// function to send mail for etas
 	function checkPasscodes() {

 		$schoolArr=$this->getAllSchools();
 		if(count($schoolArr) == 0 ) return;
 		$alreadyArr =array();
 		$schoolList= implode(",",$schoolArr);

 		// get all school codes having no passcode
 		$alreadyArr = $this->getAddedEtaSchools();

 		// insert for diff of two 

 		$newSchoolsArr = array_diff($schoolArr,$alreadyArr);
 		if(count($newSchoolsArr) > 0 )
 			$this->insertPasscode($newSchoolsArr);

 	}
 	function getAllSchools(){
 		$data =array();
 		
 		$query = "SELECT DISTINCT schoolno  FROM schools a,school_status b WHERE a.schoolno = b.school_code AND 
 				  b.test_edition='$this->current_round'
 					AND b.amount_payable>0 AND b.ssf_number > 0 
 					AND b.fcfs in ('FC','FS') "; 	
 		//echo "$query <br/> ";
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowarray()) {
			$data[] = $row['schoolno'];
		}
	
		return $data;
 	}
 	// function to create and insert a passcode -- old with charactes , changed to digits only 
 	function insertPasscode_old($newSchoolsArr){

 		$ins_str ='';
 		foreach($newSchoolsArr as $ky => $schoolCode) {
	 		// create random string 
	 		$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
	 		$passcode=''; 		
	 		$len = strlen($characters) - 1;
			$random_string_length = 10;

			for ($i = 0; $i < $random_string_length; $i++) {
			     $passcode .= $characters[rand(0, $len)];
			}

			$ins_str .= ", ('".$schoolCode."','$this->current_round','".$passcode."','".$_SESSION['eta_username']."',NOW())";
		//	echo "$ins_query <br/>";
	 		// end creation of random string
	 	}

	 	$ins_str = ltrim($ins_str,',');
		$ins_query ="INSERT INTO asset_etaPasscodes (schoolCode,round,passcode,added_by,added_dt)
					 VALUES $ins_str ";
		//echo "$ins_query <br/> ";
		$ins_dbquery = new dbquery($ins_query,$this->connid);
	
 	}
 	// new passcode insert 8-digit 
	function insertPasscode($newSchoolsArr){

		foreach($newSchoolsArr as $ky => $schoolCode) {

			$passcode =$this->generatePasscode();
			$ins_query ="INSERT INTO asset_etaPasscodes (schoolCode,round,passcode,added_by,added_dt)
					 VALUES ('".$schoolCode."','$this->current_round','".$passcode."','".$_SESSION['eta_username']."',NOW()) ";
			//echo "$ins_query <br/> ";
			$ins_dbquery = new dbquery($ins_query,$this->connid);

		}	
	}

 	// send Confirm email to Principal and coordinator 
 	function sendConfirmEmail($nationType) {

 		if($nationType == '') return ; // if they have not provided nation type then 
 		if(!in_array($nationType,array(0,1))) return ;

 		$subject = "Action required - ETAS: Contact details confirmation";
	 		// Is the OS Windows or Mac or Linux
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}

//		$schoolEmailsArr = $this->getSchoolEmails();
//		$salesEmailArr = $this->getSalesTeamEmails();

		$headers_start = 'From: ASSET ETAS <info@ei-india.com>'.$eol;
		$headers_start .= "Bcc:sudhir.prajapati@ei-india.com,naveen.kumar@ei-india.com".$eol;
		$headers_start .= "Reply-To: <info@ei-india.com>".$eol;
		$headers_start .= "MIME-Version: 1.0 $eol";
		$headers_start .= "Content-type: text/html; charset=iso-8859-1\r\n";
 		
 		$message_start ="Dear Coordinator,  <br/><br/>";
 		$message_start.="Greetings from Educational Initiatives! <br/><br/>";
 		$message_start.="We welcome you and your institution to undertake the ETAS initiative in a quest towards assessment excellence! <br/>";
 		$message_start.="We request you to confirm the following contact details. <br/><br/>";

 		$message_end="All further communication regarding ETAS will be sent to these IDs. <br/>";
 		$message_end.="Important Note: If you do not reply to this email, these contact details will be treated as confirmed. <br/><br/>";
 		$message_end.="Regards, <br/>";
 		$message_end.="Team EI <br/>";

		$message ='';

		$cond ='';
 		if($nationType == 0 )
 			$cond = " AND schools.country = 'India'";
 		else 
 			$cond = "AND schools.country != 'India'";

 		$query = "SELECT asset_etaPasscodes.id, asset_etaPasscodes.schoolCode, asset_etaPasscodes.passcode, asset_etaPasscodes.principal_mail, 
 					asset_etaPasscodes.coordinator_mail,schools.schoolname, schools.city FROM asset_etaPasscodes INNER JOIN schools
 					ON asset_etaPasscodes.schoolCode  = schools.schoolno
 					WHERE round ='$this->current_round' AND confirmEmail_sent =0 $cond ";
 		//echo "$query <br>";
 		$dbquery = new dbquery($query,$this->connid);
 		$index =0;
 		while($row=$dbquery->getrowarray()) {
 			$index++;
 			$sent =0;
 			//$principal_mail = $schoolEmailsArr[$row['schoolCode']]['principal'];
 			//$coordinator_mail = $schoolEmailsArr[$row['schoolCode']]['coordinator'];
 			$principal_mail = $row['principal_mail'];
 			$coordinator_mail =$row['coordinator_mail'];

 	//		if($row['principal_mail'] !=""  && $row['coordinator_mail'] !="") {
 			if($principal_mail !="" && $coordinator_mail !="" ) {
	 			$message=$message_start;
	 			$message.="<b>School Name: </b> ".$this->schoolNameCorrection($row['schoolname'])." (".$row['city'].") <br/>";
	 		/*	$message.="<b>Principal Email - </b>".$row['principal_mail']." <br/>";
	 			$message.="<b>Coordinator Email - </b>".$row['coordinator_mail']." <br/><br/>";
	 		*/	
	 			$message.="<b>Principal Email - </b>".$principal_mail." <br/>";
	 			$message.="<b>Coordinator Email - </b>".$coordinator_mail." <br/><br/>";
	 			$message.=$message_end;

	 	// Uncomment after DRY RUN		
	 	/*
	 			if(isset($salesEmailArr[$row['schoolCode']])) {
	 				$ccList = $salesEmailArr[$row['schoolCode']]['rm_mail'] .",". $salesEmailArr[$row['schoolCode']]['asm_mail'];
	 				$ccList =ltrim($ccList,',');
	 				$ccList =rtrim($ccList,',');
	 			}	
		
	 			if($ccList != '')
	 				$headers = $headers_start ."cc: $ccList $eol";
	 			else 
	 				$headers = $headers_start;
		*/
	 			$headers = $headers_start;	
	 		//	$toemails = $row['principal_mail'] . ",".$row['coordinator_mail'];
	 			$toemails = $principal_mail . ",".$coordinator_mail;
	 			$sent = mail($toemails, $subject, $message, $headers);

	 			if($sent == 1) {
	 				$upd_query = "UPDATE asset_etaPasscodes set confirmEmail_sent =1 WHERE id= '".$row['id']."' ";
	 				$upd_dbquery = new dbquery($upd_query,$this->connid);
	 			}
	 		/*	echo "---------------------------- <br>";
	 			echo nl2br($message); echo nl2br($headers);  echo " <br> TO EMAILS | $toemails | <br/>";
	 			echo "---------------------------- <br>";
	 		*/
	 		}	
		}
 	}
 	// send Welcome email with passcodes
 	function sendWelComeEmail($nationType) {

 		if($nationType == '') return ;
 		if(!in_array($nationType,array(0,1))) return ;

 		$subject = "Action required: Welcome to ETAS!";
 		// Is the OS Windows or Mac or Linux
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}
		$org_configData = $this->getConfigData();
		$configData = $org_configData[$nationType];

//		$schoolEmailsArr = $this->getSchoolEmails();
//		$salesEmailArr = $this->getSalesTeamEmails();
		//print_r($salesEmailArr);

		$headers_start = 'From: ASSET ETAS <info@ei-india.com>'.$eol;
	//	$headers_start .= "Bcc:sudhir.prajapati@ei-india.com,naveen.kumar@ei-india.com".$eol;
		$headers_start .= "Reply-To: <info@ei-india.com>".$eol;
		$headers_start .= "MIME-Version: 1.0 $eol";
		$headers_start .= "Content-type: text/html; charset=iso-8859-1\r\n"; 		

 		$message_start ="Dear Coordinator, <br/><br/>";
 		$message_start .="We welcome you and your institution to undertake the ETAS initiative in a quest towards assessment excellence! <br/>";
 		$message_start .="In this email, is a unique 8-digit access code. This access code will help you and your teachers create logins in order to take the ETAS. <br/><br/>";
 		
 		$message_end ="";
 		$message_end.="Please do not hesitate to get in touch with us at info@ei-india.com for any questions/clarifications. We would be glad to help. <br/><br/>";
 		$message_end.="Regards, <br/>";
 		$message_end.="Team EI  <br/>"; 		

 		$message='';

 		$cond ='';
 		if($nationType == 0 )
 			$cond = " AND schools.country = 'India'";
 		else 
 			$cond = "AND schools.country != 'India'";

 		$query = "SELECT asset_etaPasscodes.id, asset_etaPasscodes.schoolCode, asset_etaPasscodes.passcode, asset_etaPasscodes.principal_mail, 
 					asset_etaPasscodes.coordinator_mail,schools.schoolname, schools.city  FROM asset_etaPasscodes INNER JOIN schools
 					ON asset_etaPasscodes.schoolCode  = schools.schoolno
 					WHERE round ='$this->current_round' AND welcomeEmail_sent =0 $cond ";
 		//echo "$query <br/>";
 		$dbquery = new dbquery($query,$this->connid);
 		$index =0;
 		while($row=$dbquery->getrowarray()) {
 			$index++;
 			$sent =0;
 			$ccList ='';

 			$toemails = $row['coordinator_mail'];
 			// un comment on Live 
 			//$toemails = $schoolEmailsArr[$row['schoolCode']]['coordinator'];
 			
 			if($toemails == "") { 			
 				$toemails = $row['principal_mail'];
 			// uncomment after dry run 
 			//	$toemails = $schoolEmailsArr[$row['schoolCode']]['principal'];
 			}	

 			if($toemails !="" ) {
	 			$message=$message_start;
	 			$message.="<b>School Name:</b> ".$this->schoolNameCorrection($row['schoolname'])." (".$row['city'].") <br/>";
	 			$message.="<b>Access Code: ".$row['passcode']."</b> <br/><br/>";
		 		$message.="Please forward this email to your teachers so that they can conveniently copy paste the access code in the sign-up page. <br/><br/>";
	 			$message.="<a href='http://educationalinitiatives.com/asset_etas/login.php'>ASSET ETAS</a> <br/><br/>";
	 			$message.="ETAS will be open for teachers to record their responses on ".date('d-m-Y',strtotime($configData['start_date']))." till ".date('d-m-Y',strtotime($configData['end_date'])).". $eol We recommend that you and your teachers create logins before the start date. In this login, you will be able to track the progress and status of ETAS in your school. <br/>";
	 			$message.=$message_end;

	 			if($row['principal_mail'] != "")
	 				$headers =$headers_start. "Bcc: ".$row['principal_mail'].", sudhir.prajapati@ei-india.com,naveen.kumar@ei-india.com ".$eol;
	 			else {
	 				$headers = $headers_start;
	 			}
				

	 		// uncomment after the DRY Run
/*
	 			if($schoolEmailsArr[$row['schoolCode']]['principal'] != "")
	 				$headers =$headers_start. "Bcc: ". $schoolEmailsArr[$row['schoolCode']]['principal'].", sudhir.prajapati@ei-india.com,naveen.kumar@ei-india.com ".$eol;
	 			else {
	 				$headers = $headers_start ."Bcc:sudhir.prajapati@ei-india.com,naveen.kumar@ei-india.com".$eol;
	 			}



	 			if(isset($salesEmailArr[$row['schoolCode']])) {
	 				$ccList = $salesEmailArr[$row['schoolCode']]['rm_mail'] .",". $salesEmailArr[$row['schoolCode']]['asm_mail'];
	 				$ccList =ltrim($ccList,',');
	 				$ccList =rtrim($ccList,',');
	 			}	

	 			if($ccList != '')
	 				$headers .= "cc: $ccList $eol";
*/
	// 			$message=wordwrap($message,70,$eol);

	 			if($toemails !="")
	 				$sent = mail($toemails, $subject, $message, $headers);

	 			if($sent == 1) {
	 				$upd_query = "UPDATE asset_etaPasscodes set welcomeEmail_sent =1 WHERE id= '".$row['id']."' ";
	 				$upd_dbquery = new dbquery($upd_query,$this->connid);
	 			}
	 		/*	echo "---------------------------- <br>";
	 			echo "$index <br>";	echo nl2br($message);	echo nl2br($headers);  echo " <br> TO EMAILS | $toemails | <br/>";
	 			echo "---------------------------- <br>";
	 		*/
	 		}

		}
		
 	}

 	// function to check for passcode and redirect to login creation page 
 	function confirmPasscode() {

 		$passcode ='';
 		$chk_query = "SELECT schoolCode, passcode FROM asset_etaPasscodes WHERE schoolCode= $this->login_schoolCode ";
 		//echo "$chk_query <br/> ";
 		$dbquery = new dbquery($chk_query,$this->connid);
 		while($row= $dbquery->getrowarray()){
 			$passcode = $row['passcode'];
 		}

 		if($passcode == $this->chkPasscode)
 			return 1;
 		else 
 			return 'Passcode is incorrect. Please try again!';
 	}
 	// function to save login details
 	function createLogin() {
 		
 		$retMsg='';
 		$this->loginFname= trim($this->cleanInput($this->loginFname));
 		$this->loginLname= trim($this->cleanInput($this->loginLname)); 		
 		$this->loginpassword = trim($this->cleanInput($this->loginpassword));
 		$this->loginpassword_2  =trim($this->cleanInput($this->loginpassword_2));
 		$this->loginGender =$this->loginGender;
 		$this->loginDob =date("Y-m-d",strtotime($this->loginDob));
 //		$this->loginSection = $this->cleanInput($this->loginSection);
 		$this->sec_ans = trim($this->cleanInput($this->sec_ans));

 		$this->loginFname =$this->formatName($this->loginFname);
 		$this->loginLname =$this->formatName($this->loginLname);
 		
 		//print_r($_REQUEST ) ; exit();
 		if(isset($_SESSION['temp_username']))
 			$this->loginUserName = $_SESSION['temp_username'];

 		if(isset($_SESSION['username_type']) && $_SESSION['username_type'] == 'email') {
 			if (!filter_var($this->loginUserName, FILTER_VALIDATE_EMAIL)) {
			    $msg = "Invalid Email given";
			    return $msg;
			}	
 		}

		if( $this->loginpassword == "") {
			$msg ="Error in Creating login ";
			return $msg;
		}
		if($this->spam_stopper !=='DO NOT CHANGE THIS') {
			$msg ="Cannot Create login ";
			return $msg;
		}

 		$chk_query = "SELECT id FROM asset_etaTeacherDetails WHERE username='".addslashes($this->loginUserName)."' ";
 		$dbquery = new dbquery($chk_query,$this->connid);
 		if($dbquery->numrows() > 0 ) {
 			$msg ="Username already in use, please select a different user name";
 			return $msg;
 		}
 		if($this->loginpassword !== $this->loginpassword_2) {
 			$msg ="Password and the re entered password do not match";
 			return $msg;
 		}
 	//  class and subject not added in create login page
 	//	$loginCls= implode(',',$this->loginClasses);
 	//	$loginSub= implode(',',$this->loginSubjects);
 	/*	$ins_query = "INSERT INTO asset_etaTeacherDetails (teacher_name,username,password,schoolCode,email,security_que_id,security_ans,added_on) VALUES 
 						('".addslashes($this->loginName)."','".addslashes($this->loginUserName)."','".md5($this->loginpassword)."', $this->login_schoolCode,
 							'".$this->loginEmail."',$this->sec_ques,'".addslashes($this->sec_ans)."',NOW())";
 	*/
 		$ins_query = "INSERT INTO asset_etaTeacherDetails (username,password,schoolCode,security_que_id,security_ans,added_on,firstname,lastname,gender,dob) VALUES 
 						('".addslashes($this->loginUserName)."', '".md5($this->loginpassword)."', $this->login_schoolCode,
 							$this->sec_ques,'".addslashes($this->sec_ans)."',NOW(), '".$this->loginFname."','".$this->loginLname."','".$this->loginGender."','".$this->loginDob."')";
 		//echo "$ins_query <br/>";
 		$ins_dbquery = new dbquery($ins_query,$this->connid);
 		$teacher_id = $ins_dbquery->insertid;
 
 /*		$ins2_query = "INSERT INTO asset_etaUserMapping (teacher_id,classes,section, subjects,test_edition) VALUES
 						 ($teacher_id,'".$loginCls."','".$this->loginSection."','".$loginSub."','$this->current_round')";
 		$ins2_dbquery = new dbquery($ins2_query,$this->connid);
*/
 		// save passwords
 		if(isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARTDED_FOR'] != '') {
		    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
		    $ip_address = $_SERVER['REMOTE_ADDR'];
		}
 		$ins3_query = "INSERT INTO asset_etaPasswords(teacher_id,password,ip_address) 
 						VALUES ('$teacher_id','".addslashes($this->loginpassword)."','".$ip_address."') ";
 		$ins3_dbquery = new dbquery($ins3_query,$this->connid);

 		if(isset($_SESSION['username_type']) && $_SESSION['username_type'] == 'email') {
	 		$retStatus = $this->sendLoginCreationMail();

	 		if($retStatus == 1)
	 			$retMsg = "Success";
	 		else 
	 			$retMsg = "Login created Email sending failed ";
	 	}	else {
	 		$retMsg = "Success";
	 	}
 	
 		return $retMsg;
 	}

 	// check if total login count is already taken
 	function getTotalStudentCount($condition) {

 		$tableName ='studentwise'.$this->current_round;

		$query = "SELECT count(*) totalStudents FROM $tableName WHERE schoolCode = '".$this->login_schoolCode."' ";
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowassocarray()) {
			$totalStudents = $row['totalStudents'];
		} 

		// check if already created logins are greater than this count / 20  {student count}
		return $totalStudents;
	}

	// clean the input 
	function cleanInput($text)
	{
		$text = strip_tags($text);
	//	$text = htmlspecialchars($text, ENT_QUOTES);
		
	    return ($text); //output clean text
	}
	// format names 
	function formatName($name)
	{
		// remove junk characters from name
		
		$name = preg_replace('/[^a-zA-Z0-9_ %\[\]\(\)%&-\']/s', ' ', $name); // remove junk characters
		$name = preg_replace( "!\s+!", " ", $name );  // replace multiple space with single space 
		$name = ucwords(strtolower($name));
		$name =trim($name);

		return $name;
	}
	function schoolNameCorrection($schoolname)
	{
		$search=array("^","^^");
		$replace=array("'",'"');
		$school_name=str_replace($search,$replace,$schoolname);
		return $school_name;
	}

	// function to reset password and send Email 
	function resetPassword() {
		$retmsg='';

		$this->loginUserName =trim($this->cleanInput($this->loginUserName));
		$this->sec_ans=trim($this->cleanInput($this->sec_ans));
/*
		if (!filter_var($this->loginEmail, FILTER_VALIDATE_EMAIL)) {
			$retmsg = 'incorrect values provided';
			return $retmsg;
		}
*/
		//$this->sec_ans = ($this->sec_ans);
		$dob_format = date("Y-m-d",strtotime($this->loginDob));
		$query ="SELECT id,username,security_que_id, security_ans FROM asset_etaTeacherDetails 
				 WHERE username='".addslashes($this->loginUserName)."' AND security_que_id=$this->sec_ques AND 
				 security_ans = '".addslashes($this->sec_ans)."' AND dob ='".$dob_format."' ";
		//echo "QUERY | $query|  <br/>";
		$dbquery = new dbquery($query,$this->connid);
		if($dbquery->numrows()> 0) {
			while($row = $dbquery->getrowarray()) {
				$this->loginpassword = trim($this->cleanInput($this->loginpassword));
 				$this->loginpassword_2  =trim($this->cleanInput($this->loginpassword_2));

 				if($this->loginpassword !== $this->loginpassword_2) {
		 			$msg ="Password and the re entered password do not match";
		 			return $msg;
		 		}
				$upd_query = "UPDATE asset_etaTeacherDetails SET password = '".md5($this->loginpassword)."' 
								WHERE id = ".$row['id']." ";
				$upd_dbquery = new dbquery($upd_query,$this->connid);

				$upd2_query = "UPDATE asset_etaPasswords SET old_password = password, password ='".addslashes($this->loginpassword)."' 
								WHERE teacher_id =".$row['id']." ";
				$upd2_dbquery = new dbquery($upd2_query,$this->connid);
				
				if (filter_var($this->loginUserName, FILTER_VALIDATE_EMAIL)) {
					$this->sendPasswordResetmail();
				}
			}				
			$retmsg = 'Success';

		} else  {
			$retmsg = "Incorrect values provided <br/>";
		}

		return $retmsg;
	}
	// login creation mail 
	function sendLoginCreationMail() {

		$retStatus = 0;
		$sent =0;
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}

		$subject ="ASSET ETAS info";

		$headers = 'From: ASSET ETAS <info@ei-india.com>'.$eol;
		$headers .= "Bcc:sudhir.prajapati@ei-india.com,naveen.kumar@ei-india.com".$eol;
		$headers .= "Reply-To: <info@ei-india.com>".$eol;
		$headers .= "MIME-Version: 1.0 $eol";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 		

 		$message ="Dear $this->loginName, <br/><br/>";
 		$message .="We welcome you to undertake the ETAS initiative in a quest towards assessment excellence! <br/>";
 		$message .="Please find details about your login below <br/>";
 		$message .="UserName: ".$this->loginUserName." <br/>";
 		$message .="Password: ".$this->loginpassword." <br/><br/>";
 		$message .="Thank you for registering. <br/>";

 		$toemails = $this->loginEmail;
 		if($toemails !='') {
 			$sent = mail($toemails,$subject,$message,$headers);
 		}
 	//	echo nl2br($message);
 		if($sent == 1)
 			$retStatus = 1;

 		return $retStatus;

	}
	// password reset email 
	function sendPasswordResetmail() {

		$retStatus = 0;
		$sent =0;
		if (strtoupper(substr(PHP_OS,0,3)=='WIN')) {
		  $eol="\r\n";
		} elseif (strtoupper(substr(PHP_OS,0,3)=='MAC')) {
		  $eol="\r";
		} else {
		  $eol="\n";
		}

		$subject ="ASSET ETAS info";

		$headers = 'From: ASSET ETAS <info@ei-india.com>'.$eol;
		$headers .= "Bcc:sudhir.prajapati@ei-india.com,naveen.kumar@ei-india.com".$eol;
		$headers .= "Reply-To: <info@ei-india.com>".$eol;
		$headers .= "MIME-Version: 1.0 $eol";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 		

 		$message  ="Your password has been reset <br/>";
 		$message .="Please find details about your login below <br/>";
 		$message .="UserName: ".$this->loginUserName." <br/>";
 		$message .="Password: ".$this->loginpassword." <br/><br/>";
 		$message .="Thank you. <br/>";

 		$toemails = $this->loginEmail;
 		if($toemails !='') {
 			$sent = mail($toemails,$subject,$message,$headers);
 		}

 		if($sent == 1)
 			$retStatus = 1;

 		return $retStatus;
	}

	// function to get user details of the ETAS Round 
	function getUserDetails($schoolName){
		$this->setpostvars();
		$retArr = array();
		$cond ='';
		if($schoolName !='') {
			$cond .= " AND schools.schoolname like '".addslashes($schoolName)."%' ";
		}

		// 0- National 1 - Internatioanl
		if($this->nationType != '' && $this->nationType == 0 ) {
			$cond .= " AND schools.country = 'India' ";
		}
		if($this->nationType == 1 ) {
			$cond .= " AND schools.country != 'India' ";
		}
		if($this->cnfStatus != '' ) {
			$cond .= " AND asset_etaPasscodes.confirmEmail_sent = $this->cnfStatus ";
		}
		if($this->welStatus != '' ) {
			$cond .= " AND asset_etaPasscodes.welcomeEmail_sent = $this->welStatus ";
		}
		$schoolEmailsArr = $this->getSchoolEmails();
		//print"<pre>"; print_r($schoolEmailsArr); print "</pre>";
		$query = "SELECT asset_etaPasscodes.id, asset_etaPasscodes.schoolCode , asset_etaPasscodes.passcode, schools.schoolname, schools.city, 
						principal_mail,coordinator_mail,confirmEmail_sent, welcomeEmail_sent, school_status.fcfs,school_status.no_of_students,
					asset_etaPasscodes.exception, asset_etaPasscodes.comment, school_status.group_code FROM asset_etaPasscodes INNER JOIN 
					schools on asset_etaPasscodes.schoolCode = schools.schoolno 
					INNER JOIN school_status ON schools.schoolno = school_status.school_code AND 
					school_status.test_edition = '".$this->current_round."'
					WHERE asset_etaPasscodes.round ='".$this->current_round."' $cond ORDER BY asset_etaPasscodes.exception , schools.schoolname   ";
		//echo "$query <br>";
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowarray()){
	/*		$retArr[] = array('schoolCode'=>$row['schoolCode'],'schoolname'=>$row['schoolname'],'city'=>$row['city'],'passcode'=>$row['passcode'],
							'principal_mail'=>$row['principal_mail'],'coordinator_mail'=>$row['coordinator_mail'],
							'confirmMail_status'=>$row['confirmEmail_sent'],'welcomeMail_status'=>$row['welcomeEmail_sent'],'fcfs'=>$row['fcfs'],'no_of_students'=>$row['no_of_students']);
	*/

		$retArr[$row['schoolCode']] = array('schoolCode'=>$row['schoolCode'],'schoolname'=>$row['schoolname']. " (".$row['city'].") ",'city'=>$row['city'],'passcode'=>$row['passcode'],
							'principal_mail'=>$schoolEmailsArr[$row['schoolCode']]['principal'],'coordinator_mail'=>$schoolEmailsArr[$row['schoolCode']]['coordinator'],
							'confirmMail_status'=>$row['confirmEmail_sent'],'welcomeMail_status'=>$row['welcomeEmail_sent'],'fcfs'=>$row['fcfs'],
							'no_of_students'=>$row['no_of_students'], 'exception'=>$row['exception'], 'passcode_id'=>$row['id'], 'comment'=>$row['comment']);


		if($row['group_code'] != 0 )
			$retArr[$row['schoolCode']]['group_code'] = $row['group_code'];

		}

		return $retArr;
	}
	// function to get Remaining example  diffarr is sorted based on max diff between prediticion and it comes here if that is less than 15 
	function getRemainingExample($diffArr,$teacherExpectArr,$cntGot) {

		$retArr =array();
		$selectedArr =array();
		$cntToGet = 2-$cntGot;
		$qcodeList = implode(",",array_keys($diffArr));
		$tableName = 'asset_etaConsolidateResponses'.$this->current_round;
	 	 $query = "SELECT qcode, SUM(optionA_cnt) optionA_sum, SUM(optionB_cnt) optionB_sum, SUM(optionC_cnt) optionC_sum, SUM(optionD_cnt) optionD_sum, SUM(option_invalid) optionInvalid_sum, SUM(option_skipped) optionSkipped_sum
	  	 			FROM $tableName where papercode = '".$this->paperCode."' AND qcode in ($qcodeList) 	  	 			
	  	 			GROUP BY qcode ";
	// 	echo "Remaining $query <br/>";
	 	$dbquery = new dbquery($query,$this->connid);
	 	while($nationalRow = $dbquery->getrowarray()) {

	 		
		 	$total_sum = $nationalRow['optionA_sum']+$nationalRow['optionB_sum']+$nationalRow['optionC_sum']+$nationalRow['optionD_sum']+$nationalRow['optionInvalid_sum']+$nationalRow['optionSkipped_sum'];
	 		if($total_sum !=0 ) {
	 			$optiona_perf = round($nationalRow['optionA_sum']/$total_sum * 100,2);
	 			$optionb_perf = round($nationalRow['optionB_sum']/$total_sum * 100,2);
	 			$optionc_perf = round($nationalRow['optionC_sum']/$total_sum * 100,2);
	 			$optiond_perf = round($nationalRow['optionD_sum']/$total_sum * 100,2);

	 		}else {
				$optiona_perf = $optionb_perf = $optionc_perf = $optiond_perf = 0;
	 		}

	 		$optionValArr =array('A'=>$optiona_perf,'B'=>$optionb_perf,'C'=>$optionc_perf,'D'=>$optiond_perf);
			unset($optionValArr[$teacherExpectArr[$nationalRow['qcode']]['ca']]);
			$max_wrongOptionArr = array_keys($optionValArr, max($optionValArr));			
	//		echo "MAX CA ".$teacherExpectArr[$nationalRow['qcode']]['ca']." ".print_r($optionValArr)."<br>";			
			
			$retArr[$nationalRow['qcode']] = $max_wrongOptionArr;
	 	}

	 	foreach($diffArr as $dQcode => $dValue) {

	 		if(count($selectedArr) >=$cntToGet) break;

	 	// if teacher chosen misconception not equal to national misconception option take the qcode
			if(!in_array($teacherExpectArr[$dQcode]['misconception_chosen'], $retArr[$dQcode])) {
				$selectedArr[$dQcode] =$retArr[$dQcode];
			}
		}		

	// print "RET ARR <pre>";  print_r($retArr); print "</pre> ";
	 return $selectedArr;


	}

	// function to get status of etas completion
	function  testCompletionStatus() {
		$retArr= array();
		$statusArr = array('On Going','Completed');

		$cond = '';
		if($this->subject !='' && $this->class !='')
			$cond = " AND asset_etaResponses.papercode like '".$this->subject.$this->class."_' ";
		else if ($this->subject !== '' && $this->class === '')
			$cond = " AND asset_etaResponses.papercode like '".$this->subject."__' ";
		else if($this->subject === '' && $this->class != '')
			$cond = " AND asset_etaResponses.papercode like '_".$this->class."_' ";
/*
		$query = "SELECT asset_etaResponses.teacher_id, asset_etaResponses.papercode, asset_etaResponses.status, asset_etaTeacherDetails.added_on,
				asset_etaTeacherDetails.teacher_name FROM asset_etaTeacherDetails 
				 INNER JOIN asset_etaResponses ON 
				 asset_etaResponses.teacher_id = asset_etaTeacherDetails.id  AND asset_etaTeacherDetails.schoolCode ='".$_SESSION['eta_schoolCode']."'
				 where asset_etaResponses.round = '".$this->current_round."'  $cond
				 group by asset_etaResponses.teacher_id, asset_etaResponses.papercode ";
*/
		$query =" SELECT asset_etaResponses.teacher_id, asset_etaResponses.papercode, asset_etaResponses.status, asset_etaTeacherDetails.added_on,
				asset_etaTeacherDetails.firstname, asset_etaTeacherDetails.lastname FROM asset_etaTeacherDetails 
				 INNER JOIN asset_etaResponses ON 
				 asset_etaResponses.teacher_id = asset_etaTeacherDetails.id  AND asset_etaTeacherDetails.schoolCode ='".$_SESSION['eta_schoolCode']."'
				 where asset_etaResponses.teacher_id = ".$_SESSION['eta_teacherId']." AND asset_etaResponses.round = '".$this->current_round."'  $cond
				 group by asset_etaResponses.papercode ";
		//echo "$query <br />";
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()) {
			$added_date = date('d-M-Y',strtotime($row['added_on']));
			$retArr[] = array('teacher_name'=>$row['firstname']." ".$row['lastname'],'status'=>$statusArr[$row['status']],'papercode'=>$row['papercode'],'creation_time'=>$added_date);
		}

		return $retArr;
	}

	// function to classes taken ASSET 
	function getTakenClasses() {
		$retArr = array();
		$condition ='';

		// for admin login give all subjects and classes
		if($_SESSION['eta_username'] === 'admin') {
			for($j=1;$j<=5;$j++)
				$retArr[$j] =array(3,4,5,6,7,8,9,10);

			return $retArr;
		}
		for($i=3;$i<=10;$i++)
			$condition .= " e".$i.", m".$i.", s".$i.", h".$i.", ss".$i.",";
		$engClasses =$matClasses=$scClasses=$ssClasses=$hinClasses='';
		
		$condition = rtrim($condition,",");
		$query ="SELECT test_edition, $condition  FROM school_status WHERE test_edition ='".$this->current_round."' AND school_code =".$_SESSION['eta_schoolCode']." ";
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowarray()){

			for($i=3;$i<=10;$i++) {
				$val = 'e'.$i;
				if($row[$val] != 0)
					$engClasses .=",".$i;

				$val = 'm'.$i;
				if($row[$val] != 0)
					$matClasses .=",".$i;

				$val = 's'.$i;
				if($row[$val] != 0)
					$scClasses .=",".$i;

				$val = 'h'.$i;
				if($row[$val] != 0)
					$hinClasses .=",".$i;

				$val = 'ss'.$i;
				if($row[$val] != 0)
					$ssClasses .=",".$i;				
			}
			
		}

		// eng ,maths sc ss hin classes taken array 
		for($j=1;$j<=5;$j++)
			$retArr[$j] =array();

		if($engClasses !='')
			$retArr[1]=explode(',',ltrim($engClasses,','));

		if($matClasses !='')
			$retArr[2]=explode(',',ltrim($matClasses,','));

		if($scClasses !='')
			$retArr[3]=explode(',',ltrim($scClasses,','));

		if($ssClasses !='')
			$retArr[4]=explode(',',ltrim($ssClasses,','));

		if($hinClasses !='')
			$retArr[5]=explode(',',ltrim($hinClasses,','));

		return $retArr;

	}
	// function to get Selected  classes 
	function getAlreadySelectedClasses() {
		$alreadySel =array();

		// for admin login give all subjects and classes
		if($_SESSION['eta_username'] === 'admin') {
			for($sub =1;$sub<=5;$sub++)
				$alreadySel[$sub] = "3,4,5,6,7,8,9,10";

			return $alreadySel;
		}

		$query = "SELECT subject,classes FROM asset_etaUserMapping WHERE teacher_id = ".$_SESSION['eta_teacherId']." AND test_edition ='".$this->current_round."' ";
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()){
			if($row['classes'] !='')
				$alreadySel[$row['subject']]=$row['classes'];
		}
		return $alreadySel;
	}
	// function to insert or update a teachers subject class mapping data 
	function insertUpdMappingData() {
		
		$postValStr = '';
		$retMsg ='';
		$mapArr = array('1'=>'eng_selClasses','2'=>'mat_selClasses','3'=>'sc_selClasses','4'=>'ss_selClasses','5'=>'hin_selClasses');
		
		$alreadySel = $this->getAlreadySelectedClasses();
		// foreach subject add or update based on already selected 
		foreach($mapArr as $subCode => $sub_text) {

			if(!isset($alreadySel[$subCode])) { 
				// insert
				if(isset($this->$mapArr[$subCode]))
					$postValStr = implode(",",$this->$mapArr[$subCode]);
				else
					$postValStr ='';
				
				if($postValStr != '') {
					$ins_query = "INSERT INTO asset_etaUserMapping(teacher_id,subject,classes,test_edition) VALUES(".$_SESSION['eta_teacherId'].",$subCode,'".$postValStr."','".$this->current_round."' )";
					$insDbquery = new dbquery($ins_query,$this->connid);

					$_SESSION['profile']='Profile updated';
				}
			} else  {
				// check if same as old then dont update else update 

				if(isset($this->$mapArr[$subCode]))
					$postValStr = implode(",",$this->$mapArr[$subCode]);
				else
					$postValStr ='';

				if($postValStr === $alreadySel[$subCode]) {

				} else {
					// update
					if($_SESSION['eta_teacherId'] != '') {
						// all classes removed then delete
						if($postValStr == '') {
							$del_query = " DELETE FROM asset_etaUserMapping where teacher_id ='".$_SESSION['eta_teacherId']."' AND subject= '".$subCode."' AND test_edition ='".$this->current_round."' ";
							$del_dbquery = new dbquery($del_query,$this->connid);
						} else {
							$upd_query = "UPDATE asset_etaUserMapping set classes ='".$postValStr."' WHERE teacher_id= '".$_SESSION['eta_teacherId']."' AND subject= '".$subCode."' AND test_edition ='".$this->current_round."' ";
							$upd_dbquery = new dbquery($upd_query,$this->connid);
						}
						//$retMsg = 'Profile updated';
						$_SESSION['profile']='Profile updated';
					}
				}

			}

		}

		return $retMsg;
	}

	// function to get checkboxes to disable in the profile tab 
	function getCheckBoxesToDisb($reportArr,$ongoingArr) {
		$retArr =array();
		foreach($reportArr as $key => $pCode) {
			$subCode = substr($pCode,0,1);

			$classVal = substr($pCode,1,1);
			$classVal = $classVal == 'A'? 10 : $classVal;
			$retArr[$subCode][]= $classVal;
		}

		foreach($ongoingArr as $key => $pCode) {
			$subCode = substr($pCode,0,1);

			$classVal = substr($pCode,1,1);
			$classVal = $classVal == 'A'? 10 : $classVal;
			$retArr[$subCode][]= $classVal;
		}

		return $retArr;
	}

	// function to generate a 8 digit passcode 
	function generatePasscode() {
		$true=1;
		while($true) {
			$passcode=rand(10000000,99999999);
			$query="SELECT id FROM asset_etaPasscodes WHERE passcode='$passcode'";
			$dbquery = new dbquery($query,$this->connid);
			if($dbquery->numrows() ==0) $true=0;
		}
		return $passcode;
	}

	// get principal and coordinator Emails 
	function getSchoolEmails() {
		$retArr = array();
		$alreadyArr = $this->getAddedEtaSchools();
		if(count($alreadyArr) == 0) return $retArr;
		$schoolList = implode(",",$alreadyArr);

		$query = "SELECT schools.schoolno,schools.contact_person_1,schools.designation_1, schools.contact_mail_1,
					contact_details.contact_person, contact_details.designation, contact_details.contact_mail 
					FROM schools inner join contact_details 
					ON schools.schoolno = contact_details.school_code 
					WHERE contact_details.designation ='ASSET Coordinator' 
					AND schools.schoolno in (".$schoolList.")" ;
	//	echo "$query <br>";			
		$dbquery = new dbquery($query,$this->connid);

		while($row= $dbquery->getrowarray()){

			if(!isset($retArr[$row['schoolno']])) {
				$retArr[$row['schoolno']] = array('principal' => $row['contact_mail_1'], 'coordinator'=>$row['contact_mail']);
			}
			else {
				if($row['contact_mail'] != '')
					$retArr[$row['schoolno']]['coordinator'] .=','.$row['contact_mail'];
			}
		}

		return $retArr;
	}

	// function to add schools to be added as Exception
	function getOtherSchools($schoolName) {
		$allSchoolsArr=array();
		$alreadyAddedSchoolsArr = array();
		$otherSchoolsArr = array();
		$schoolDetailsArr =array();

		$cond ='';
		if($schoolName !='') {
			$cond .= " AND schools.schoolname like '".addslashes($schoolName)."%' ";
		}

		// 0- National 1 - Internatioanl
		if($this->nationType != '' && $this->nationType == 0 ) {
			$cond .= " AND schools.country = 'India' ";
		}
		if($this->nationType == 1 ) {
			$cond .= " AND schools.country != 'India' ";
		}

		$allSchoolQuery  = "SELECT DISTINCT schoolno  FROM schools a,school_status b WHERE a.schoolno = b.school_code AND 
 				  b.test_edition='$this->current_round'
 					AND b.amount_payable>0 AND b.ssf_number > 0 ";
 		$allSchoolDbquery = new dbquery ($allSchoolQuery,$this->connid);
 		while($allRow = $allSchoolDbquery->getrowarray()){
 			$allSchoolsArr [] = $allRow['schoolno'];
 		}

 		$alreadyAddedSchoolsArr = $this->getAddedEtaSchools();

 		$otherSchoolsArr =array_diff($allSchoolsArr,$alreadyAddedSchoolsArr);
 		$otherSchoolList = implode(",",$otherSchoolsArr);

 		if($otherSchoolList != '') {
	 		$schoolQuery = "SELECT schools.schoolno, schools.schoolname, schools.city, schools.region,schools.country,school_status.fcfs, school_status.no_of_students
	 						FROM schools INNER JOIN school_status ON schools.schoolno = school_status.school_code AND school_status.test_edition ='".$this->current_round."'
	 						WHERE schools.schoolno in (".$otherSchoolList.") $cond
	 						order by schools.schoolname";
	 		//echo "$schoolQuery <br>";				
	 		$schoolDbquery = new dbquery($schoolQuery,$this->connid);
	 		while($row=$schoolDbquery->getrowarray()){
	/*
	 			if($row['country'] == 'India')
	 				$indexStr ='national';
	 			else 
	 				$indexStr ='international';

	 			$schoolDetailsArr[$indexStr][] = array('schoolCode'=>$row['schoolno'],'schoolname'=>$row['schoolname'],'city'=>$row['city'],'region'=>$row['region']
	 											,'fcfs'=>$row['fcfs'],'no_of_students'=>$row['no_of_students']);
	*/
				$schoolDetailsArr[] = array('schoolCode'=>$row['schoolno'],'schoolname'=>$row['schoolname'],'city'=>$row['city'],'region'=>$row['region'],'country'=>$row['country']
												,'fcfs'=>$row['fcfs'],'no_of_students'=>$row['no_of_students']);
	 		}
	 	}	
 		return $schoolDetailsArr;
	}

	// function to add Schools as a Exception for ETAS
	function addSchools() {
		
		if(count($this->addSchoolArr) <=0) return ;
		$alreadyAddedSchools=array();
		$schoolList = implode(',',$this->addSchoolArr);
		
		$check_query = "SELECT schoolCode FROM asset_etaPasscodes WHERE schoolCode in ($schoolList)";
		$checkDbquery = new dbquery($check_query,$this->connid);
		while($chk_row = $checkDbquery->getrowarray()){
			$alreadyAddedSchools [] = $chk_row['schoolCode'];
		}
		$this->addSchoolArr = array_diff($this->addSchoolArr,$alreadyAddedSchools);
	//	print "AFTER DIFF "; print_r($this->addSchoolArr);
		foreach($this->addSchoolArr as $key => $schoolCd) {
			
			$passcode =$this->generatePasscode();
			// developer end page , so session username 
			$ins_query ="INSERT INTO asset_etaPasscodes(schoolCode,round,passcode,exception,exceptionReason,added_by,added_dt)
						 VALUES (".$schoolCd.",'".$this->current_round."','".$passcode."',1,'".addslashes($this->exceptionReason)."','".$_SESSION['username']."',
						 		NOW())";
		//	echo "$ins_query <br/> ";
			$ins_dbquery = new dbquery($ins_query,$this->connid);
		}	
	}

	// function to get group names 
	function getGroupNames($groupCodeArr){
		$retArr = array();
		if(count($groupCodeArr) <=0)  return $retArr;
		
		$groupList = implode(',',$groupCodeArr);

		$query = "SELECT group_code, group_name FROM group_master where group_code in (".$groupList.") ";
		//echo "$query <br/>";
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()){
			$retArr[$row['group_code']]=$row['group_name'];
		}

		return $retArr;
	}

	// function to add comments for Mail 
	function addComments() {
		foreach($this->commentsArr as $passCodeId => $comment ) {
			if(trim($comment) != '') {
				$upd_query = "UPDATE asset_etaPasscodes SET comment = '".addslashes($comment)."' WHERE id = $passCodeId ";
				//echo "$upd_query <br>";
				$upd_dbquery = new dbquery($upd_query,$this->connid);
			}
		}
	}
	// function to reset confirm mail
	function resetConfirmMail() {
		foreach($this->confirmMailStatusArr as $passCodeId => $resetId ) {			
			$upd_query = "UPDATE asset_etaPasscodes SET confirmEmail_sent =0 WHERE id = $passCodeId ";
			//echo "$upd_query <br>";
			$upd_dbquery = new dbquery($upd_query,$this->connid);
		}
	}
	// function to reset welcome mail
	function resetWelcomeMail() {
		foreach($this->welcomeMailStatusArr as $passCodeId => $resetId ) {			
			$upd_query = "UPDATE asset_etaPasscodes SET welcomeEmail_sent =0 WHERE id = $passCodeId ";
			//echo "$upd_query <br>";
			$upd_dbquery = new dbquery($upd_query,$this->connid);
		}
	}
	// function to get added school Codes for ETAS 
	function getAddedEtaSchools() {
		$alreadyArr = array();
		$query = "SELECT schoolCode FROM  asset_etaPasscodes WHERE round = '$this->current_round' ";
 		$dbquery = new dbquery($query,$this->connid);
 		while($row = $dbquery->getrowarray()){
 			$alreadyArr[]=$row['schoolCode'];
 		}

 		return $alreadyArr;
	}
	// function get RM ASM emails for schools of ETAS
	function getSalesTeamEmails(){
		$schoolArr = $this->getAddedEtaSchools();
		if(count($schoolArr) == 0) return array();
		$schoolList =implode(",",$schoolArr);
		$userNames=array();
		$emailArr=array();
		// RM ans ASM 
		$query = "SELECT schoolCode,keyAccount, ps FROM sales_allotment_master WHERE schoolCode in (".$schoolList.") AND product ='asset' ";		
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()){
			if($row['keyAccount'] !='')
				$userNames [] = "'".$row['keyAccount']."'";

			if($row['ps'] !='')
				$userNames [] = "'".$row['ps']."'";

			$retArr[$row['schoolCode']] = array('RM'=>$row['keyAccount'],'ASM'=>$row['ps']);
		}

		if(isset($userNames) && count($userNames)>0){
			$user_name = implode(",",$userNames);			
			$query_fetch_email = "SELECT name,fullname,email FROM marketing WHERE name IN (".$user_name.")";
			$dbquery_fetch_email = new dbquery($query_fetch_email,$this->connid);
			while($row_fetch_email = $dbquery_fetch_email->getrowarray()) {
				$emailArr[$row_fetch_email['name']] = $row_fetch_email["email"];
			}
		}

		foreach($retArr as $schCode => $valueArr) {
			if($valueArr['RM']!='' && isset($emailArr[$valueArr['RM']]))
				$retArr[$schCode]['rm_mail']= $emailArr[$valueArr['RM']];

			if($valueArr['ASM']!='' && isset($emailArr[$valueArr['ASM']]))
				$retArr[$schCode]['asm_mail']= $emailArr[$valueArr['ASM']];
		}
		return $retArr;
	}

	// function to check if username exists ajax call 
	function checkUserNameExists($userName,$field =''){

		if($field == 'email') {
			if (!filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		    $msg = "Invalid Email given";
		    return $msg;
			}
		}

		$query = "SELECT username FROM asset_etaTeacherDetails WHERE username ='".addslashes($userName)."' ";
		$dbquery = new dbquery($query,$this->connid);
		if($dbquery->numrows()> 0) {
			$retMsg ="&#10008; Sorry, this username has already been taken!";
			return $retMsg;
		} else {
			return '';
		}
		return '';
	}
	function checkUserNameExists_server($userName,$field =''){

		if($field == 'email') {
			if (!filter_var($userName, FILTER_VALIDATE_EMAIL)) {
		    $msg = "Invalid Email given";
		    return $msg;
			}
		}

		$query = "SELECT username FROM asset_etaTeacherDetails WHERE username ='".addslashes($userName)."' ";
		$dbquery = new dbquery($query,$this->connid);
		if($dbquery->numrows()> 0) {
			$retMsg ="The $field has already been taken!";
			return $retMsg;
		} else {
			return '';
		}
		return '';
	}

	// function to get info of the passacode and sent status 
	function getInfoArr(){
		$totalSchoolCnt=0;
		$con_SentNational=0;
		$wel_SentNational=0;
		$con_SentInternational=0;
		$wel_SentInternational=0;
		$con_totalNational=0;
		$wel_totalNational=0;
		$con_totalInternational=0;
		$wel_totalInternational=0;

		$query = "SELECT COUNT(asset_etaPasscodes.schoolCode) sch_cnt, count(asset_etaPasscodes.confirmEmail_sent) cnt_cnfrm, SUM( asset_etaPasscodes.confirmEmail_sent)  con_cntSent, 
					COUNT( asset_etaPasscodes.welcomeEmail_sent) cnt_wel ,SUM( asset_etaPasscodes.welcomeEmail_sent)  wel_cntSent , schools.country
					FROM asset_etaPasscodes INNER JOIN schools on asset_etaPasscodes.schoolCode =schools.schoolno 
					WHERE asset_etaPasscodes.round = '".$this->current_round."' 
					GROUP by schools.country ";
	//	echo "$query <br>";			
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowarray()){
			$totalSchoolCnt += $row['sch_cnt'];

			if($row['country'] == 'India') {
				$con_SentNational = $row['con_cntSent'];
				$wel_SentNational = $row['wel_cntSent'];
				$con_totalNational = $row['cnt_cnfrm'];
				$wel_totalNational = $row['cnt_wel'];
			}	

			if($row['country'] != 'India') {
				$con_SentInternational += $row['con_cntSent'];
				$wel_SentInternational += $row['wel_cntSent'];
				$con_totalInternational += $row['cnt_cnfrm'];
				$wel_totalInternational += $row['cnt_wel'];
			}

		}
		$retArr = array('totalSchoolCnt'=>$totalSchoolCnt,'con_totalNational'=>$con_totalNational,'wel_totalNational'=>$wel_totalNational,
						'con_totalInternational'=>$con_totalInternational,'wel_totalInternational'=>$wel_totalInternational,
						'con_SentNational'=>$con_SentNational,'wel_SentNational'=>$wel_SentNational,'con_SentInternational'=>$con_SentInternational,
						'wel_SentInternational'=>$wel_SentInternational);

		return $retArr;
	}

	// local junk char replace 
	function common_pdf_junk_replace($string ){
		$string = str_replace("^^","\"",$string);
		$string = str_replace("^","'",$string);
	// 	$string = html_entity_decode($string,ENT_QUOTES,"UTF-8");

		return $string;
	}
	// function to check for uname/ email exists already to move to get details page.
	function checkUsername(){
		$this->loginEmail=$this->cleanInput($this->loginEmail);
		$this->loginUname=$this->cleanInput($this->loginUname);

		if($this->userNameType == 'email')
			$retMsg = $this->checkUserNameExists_server($this->loginEmail,$this->userNameType);
		else 
			$retMsg = $this->checkUserNameExists_server($this->loginUname,$this->userNameType);

		return $retMsg;
	}

	// function to get all the marked ETAS of the teacher 
	function getAllMarkedEtas(){
		$etaArr =array();
		$query = "SELECT subject,classes FROM asset_etaUserMapping WHERE teacher_id =".$_SESSION['eta_teacherId']." 
					AND test_edition ='$this->current_round' order by subject";
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()){
			$etaArr[$row['subject']] =explode(',',$row['classes']);
		}
		return $etaArr;
	}
	// function to get status of all the teachers of the school
	function getCoordinatorStatus(){
		$teachArr =array();
		$retArr = array();
		$cond ='';
		if($this->eta_statusSubject != '')
			$cond .="AND asset_etaUserMapping.subject =".$this->eta_statusSubject." ";
		$query = "SELECT asset_etaTeacherDetails.id, asset_etaTeacherDetails.firstname, asset_etaTeacherDetails.lastname, asset_etaTeacherDetails.schoolCode,
					asset_etaUserMapping.subject, asset_etaUserMapping.classes FROM asset_etaTeacherDetails
					INNER JOIN asset_etaUserMapping ON asset_etaTeacherDetails.id = asset_etaUserMapping.teacher_id
					WHERE asset_etaTeacherDetails.schoolCode =".$_SESSION['eta_schoolCode']." AND asset_etaUserMapping.test_edition ='".$this->current_round."'  $cond ";
		//echo "QUERY $query <br>";
		$dbquery = new dbquery($query,$this->connid);
		while($row=$dbquery->getrowarray()){
			$teachArr[$row['id']][$row['subject']] = array('teacher_name'=>$row['firstname']." ".$row['lastname'], 'classes'=>$row['classes']);
		}

		// teacher id of this school 
		$teacher_idArr = array_keys($teachArr);

		if(count($teacher_idArr) > 0 ) {
			$teacher_ids = implode(',',$teacher_idArr);
			$cond2 ='';
			if($this->eta_statusSubject != '')
				$cond2 .=" AND subject =$this->eta_statusSubject";
			$teacher_query ="SELECT  teacher_id, papercode, status, subject FROM asset_etaResponses WHERE teacher_id  in (".$teacher_ids." )
				 AND round ='".$this->current_round."' $cond2  group by teacher_id , papercode ";
			//echo"<br/>$teacher_query <br>";
			$teacher_dbquery = new dbquery($teacher_query,$this->connid);
			while($teacher_row = $teacher_dbquery->getrowarray()){
				$statusArr[$teacher_row['teacher_id']][$teacher_row['subject']][$teacher_row['papercode']] =  $teacher_row['status'];
			}


		
			foreach($teachArr as $tid => $tValArr) {
				foreach($tValArr as $sid => $valArr) {
					if(isset($statusArr[$tid][$sid]))
						$teachArr[$tid][$sid]['statusArr'] = $statusArr[$tid][$sid];
				}
			}

			// not started update 
			//print_r($statusArr);
			foreach($teachArr as $teachTid => $teachValArr) {
				foreach($teachValArr as $teachSid =>$subValArr) {
					$classtaken= explode(",",$teachArr[$teachTid][$teachSid]['classes']);

					foreach($classtaken as $key =>$classVal) {
						$teachClass = ($classVal ==10) ? 'A': $classVal;
						$papercode =$teachSid.$teachClass.$this->current_round;

						if(!isset($teachArr[$teachTid][$teachSid]['statusArr'][$papercode]))
							$teachArr[$teachTid][$teachSid]['statusArr'][$papercode] ='';
					}
				}
			}

		}

		//print"<pre>"; print_r($teachArr);print"</pre>";
		return $teachArr;
	}

	// function get the rounds 
	function getConfigRounds() {
		$retArr =array();
		$query = "SELECT distinct(test_edition) round FROM asset_etaConfig order by test_edition";
		$dbquery = new dbquery($query,$this->connid);
		while($row = $dbquery->getrowarray()){
			$retArr[] = $row['round'];
		}
		return $retArr;
	}
	// function to change the active round 
	function saveActiveRound(){
		if($this->activeRound != '') {
			// dont update the last mod time
			$upd_query = 'UPDATE asset_etaConfig SET active = 0, lastModified = lastModified ';
			$upd_dbquery = new dbquery($upd_query,$this->connid);

			$query = "UPDATE asset_etaConfig SET active = 1 WHERE test_edition ='".$this->activeRound."' ";
			$dbquery = new dbquery($query,$this->connid);
		}
	}

	// function to delete schools from ETAS List 
	function delSchools(){
		if(count($this->delPasscodeArr) > 0){
			$del_idArr = array_keys($this->delPasscodeArr);
			$del_ids = implode(",",$del_idArr);
			if($del_ids != '') {
				$del_query = "DELETE FROM asset_etaPasscodes WHERE id in (".$del_ids.") ";
				$del_dbquery = new dbquery($del_query,$this->connid);
			}
		}
	}
}



?>