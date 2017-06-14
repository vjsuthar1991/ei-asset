<?php

class clsusertransactions
{
	var $trn_listusers;
	var $trn_addnewuser;
	var $trn_deleteuser;
	var $trn_assignrightstouser;
	var $trn_uploadrowscoredata;
	var $trn_schoolavgandstddev;
	var $trn_edituser;
	var $trn_uploadassessmentdata;
	var $trn_changepassword;
	var $trn_approveChild;
	var $trn_schoolResultSummary;
	var $trn_editChild;
	var $trn_regionwiseResultSummary;
	var $trn_editTeacher;
	var $trn_approveTeacher;
	var $trn_findChild;
	var $trn_findTeacher;
	var $trn_approveSchool;
	var $trn_findSchool;
	var $trn_editSchool;
	var $trn_queryinterface;
	var $trn_assl2008;
	var $trn_studentsbulkupload;
	var $trn_retrieveTeachers;
	var $trn_promoteDemoteClass;
	var $trn_regionalStatistics;
	var $trn_schoolmodule;
	var $trn_nationalholidaysmanager;
	var $trn_teachertrainingmodule;
	var $trn_linktnaassldata;
	var $trn_advancedquerymodule;
	var $trn_learningimprovementtracking;

	function clsusertransactions()
	{
		$this->trn_listusers=1;
		$this->trn_addnewuser=2;
		$this->trn_deleteuser=3;
		$this->trn_assignrightstouser=4;
		$this->trn_uploadrowscoredata=5;
		$this->trn_schoolavgandstddev=6;
		$this->trn_edituser=7;
		$this->trn_uploadassessmentdata=8;
		$this->trn_changepassword=9;
		$this->trn_approveChild=10;
		$this->trn_schoolResultSummary=11;
		$this->trn_editChild=12;
		$this->trn_regionwiseResultSummary=13;
		$this->trn_editTeacher=14;
		$this->trn_approveTeacher=15;
		$this->trn_findChild=16;
		$this->trn_findTeacher=17;
		$this->trn_approveSchool=18;
		$this->trn_findSchool=19;
		$this->trn_editSchool=20;
		$this->trn_queryinterface=21;
		$this->trn_assl2008=22;
		$this->trn_studentsbulkupload=23;
		$this->trn_retrieveTeachers=24;
		$this->trn_promoteDemoteClass=25;
		$this->trn_regionalStatistics=26;
		$this->trn_schoolmodule=27;
		$this->trn_nationalholidaysmanager=28;
		$this->trn_teachertrainingmodule=29;
		$this->trn_linktnaassldata=30;
		$this->trn_advancedquerymodule=31;
		$this->trn_learningimprovementtracking=32;
  	}

	function checkUserTransactionRights($userid,$transaction_id,$connid)
	{
		$trnQuery = "SELECT COUNT(*) FROM bt_userrights WHERE userid='".$userid."' AND transaction_id=".$transaction_id;
		//echo $trnQuery; //exit;
		$trnResult = new dbquery($trnQuery,$connid);
		$trnRow = $trnResult->getrowarray();
		//echo "<br>".$trnRow['COUNT(*)'];
		if($trnRow['COUNT(*)'] == 0)
		{
			echo "<script>redirectPage('bt_accessRightsDeniedPage.php');</script>";
			exit;
		}
	}
	function fetchUsertransactionRights($userid,$connid)
	{
		$trnArray=array();
		$trnQuery = "SELECT * FROM bt_userrights WHERE userid='".$userid."'";
		$trnResult = new dbquery($trnQuery,$connid);
		while($trnRow = $trnResult->getrowarray())
		{
			array_push($trnArray,$trnRow['transaction_id']);
		}
		return $trnArray;
	}
	function checkUserTransactionRights_QI($userid,$transaction_id,$connid)
	{
		$trnQuery = "SELECT COUNT(*) FROM bt_userrights WHERE userid='".$userid."' AND transaction_id=".$transaction_id;
		//echo $trnQuery; exit;
		$trnResult = new dbquery($trnQuery,$connid);
		$trnRow = $trnResult->getrowarray();
		return $trnRow[0];
	}
}
