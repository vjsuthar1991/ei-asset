<?php

class clsordersession
{
	var $username;
	var $password;
	var $schoolCode;
	var $year;
	var $school_login;
	var $cst_category;
	
	function clsordersession()
	{
		$this->username="";
		$this->password="";
		$this->schoolCode="";
		$this->year="";
		$this->school_login="";		
		$this->cst_category="";		
		// session_cache_limiter('private');
		// session_cache_limiter('must-revalidate');
		// session_cache_expire(180);
		session_start();
  	}
  	
  	function startSession()
  	{
  		if(isset($_SESSION['username_school']) && $_SESSION['username_school'] != "") 			$this->username = $_SESSION['username_school'];
  		if(isset($_SESSION['password']) && $_SESSION['password'] != "") 						$this->password = $_SESSION['password'];
  		if(isset($_SESSION['schoolCode']) && $_SESSION['schoolCode'] != "") 					$this->schoolCode = $_SESSION['schoolCode'];
  		if(isset($_SESSION['year']) && $_SESSION['year'] != "") 						        $this->year = $_SESSION['year'];
  		if(isset($_SESSION['school_login']) && $_SESSION['school_login'] != "")  				$this->school_login = $_SESSION['school_login'];  		
  		if(isset($_SESSION['cst_category']) && $_SESSION['cst_category'] != "")  				$this->cst_category = $_SESSION['cst_category'];  		  		
  	}
  	
  	function destroySession()
  	{
  		unset($_SESSION['username_school']);
  		unset($_SESSION['password']);
  		unset($_SESSION['schoolCode']);
  		unset($_SESSION['year']);
  		unset($_SESSION['school_login']);  	
  		unset($_SESSION['cst_category']);  		
  		session_destroy();
  	}
  	
  	function checkSession($redirectpage='sessionErrorPage.php')
  	{
  		if(!isset($_SESSION["username_school"]) || $_SESSION["username_school"] == "")
  		{
  			echo "<script>redirectPage('".$redirectpage."');</script>";
		}
  		else 
  		{
  			$this->username = $_SESSION["username_school"];
  		}
  	}
}
