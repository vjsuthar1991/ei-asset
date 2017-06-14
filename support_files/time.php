<?php
	set_time_limit (0);   //Otherwise quits with "Fatal error: Maximum execution time of 30 seconds exceeded"
	error_reporting(7);
	
	@include("check.php");
	
	echo $_REQUEST['username'];
	
	require_once("common_functions.php");
	
	
	if($_REQUEST['username'])
	{
		$_SESSION['username']=$_REQUEST['username'];
		if(!isset($_SESSION['time']))
			$_SESSION['time']=time();
	}
	if($_REQUEST['password'])
	{
		$_SESSION['password']=$_REQUEST['password'];
		if(!isset($_SESSION['time']))
			$_SESSION['time']=time();
	}
	if(isset($_SESSION['username']) && isset($_SESSION['password']))
	{
		
		checkPermission("MNU","main.php");
		//add_loginLog();
	}
	else
	{
		echo "Wrong User name or Password<br>";
		echo "<a href='index.php'>Re-login</a>";
	}
?>

<?php
	mysql_close();
?>