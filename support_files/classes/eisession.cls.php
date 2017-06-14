<?php

class clssession
{
	var $userid;
	var $paperid;
	var $usertype;
	var $ap_datatoexport;
	var $dco_dailyreport_enteredby;
	var $dcoid;
	var $schoolcode;	// Added by Arpit for Torent system on 08/02/2012
	var $fullname;	    // Added by Arpit for Torent system on 08/02/2012
	var $visitid;		//Added by Jacky for torrent system on 20/02/2012
	
	/*$_SESSION["enteredby"] = $this->userid;
	$_SESSION["dcoid"] = "";*/
	
	function clssession()
	{
		$this->userid="";
		$this->paperid="";
		$this->usertype="";
		$this->ap_datatoexport="";
		$this->dco_dailyreport_enteredby="";
		$this->dcoid="";
		$this->schoolcode=0;
		$this->fullname = "";
		$this->visitid = "";
		session_cache_limiter('private');
		session_cache_limiter('must-revalidate');
		session_cache_expire(180);
		session_start();
  	}
  	
  	function startSession()
  	{
  		if(isset($_SESSION['paperid']) && $_SESSION['paperid'] != "") 						$this->paperid = $_SESSION['paperid'];
  		if(isset($_SESSION['userid']) && $_SESSION['userid'] != "") 						$this->userid = $_SESSION['userid'];
  		if(isset($_SESSION['usertype']) && $_SESSION['usertype'] != "")  					$this->usertype = $_SESSION['usertype'];
  		if(isset($_SESSION['ap_datatoexport']) && $_SESSION['ap_datatoexport'] != "")  		$this->ap_datatoexport = $_SESSION['ap_datatoexport'];
  		if(isset($_SESSION['dco_dailyreport_enteredby']) && $_SESSION['dco_dailyreport_enteredby'] != "")  					$this->dco_dailyreport_enteredby = $_SESSION['dco_dailyreport_enteredby'];
  		if(isset($_SESSION['dcoid']) && $_SESSION['dcoid'] != "")  							$this->dcoid = $_SESSION['dcoid'];
  		if(isset($_SESSION['schoolcode']) && $_SESSION['schoolcode'] != 0)  				$this->schoolcode = $_SESSION['schoolcode'];
  		if(isset($_SESSION['fullname']) && $_SESSION['fullname'] != "")  					$this->fullname = $_SESSION['fullname'];
  		if(isset($_SESSION['visitid']) && $_SESSION['visitid'] != "")  						$this->visitid = $_SESSION['visitid'];
  	}
  	
  	function destroySession()
  	{
  		unset($_SESSION['userid']);
  		unset($_SESSION['paperid']);
  		unset($_SESSION['usertype']);
  		unset($_SESSION['ap_datatoexport']);
  		unset($_SESSION['dcoid']);
		unset($_SESSION['loginid']);
		unset($_SESSION['schoolcode']);
  		session_destroy();
  	}
  	
  	function checkSession($redirectpage='tst_sessionErrorPage.php')
  	{
  		if(!isset($_SESSION["userid"]) || $_SESSION["userid"] == "")
  		{
  			echo "<script>redirectPage('".$redirectpage."');</script>";
		}
  		else 
  		{
  			$this->userid = $_SESSION["userid"];
  		}
  	}
}

?>