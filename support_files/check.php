<?php
	//strstr(strtoupper(substr($_SERVER["OS"], 0, 3)), "WIN") ? $sep = "\\" : $sep = "/";
	$appRights = array();
	include_once("constants.php");
	include_once("connect.php");
	
	function checkPermission($right,$_nextPage=null)
	{
        global $appRights;
		$Name=isset($_SESSION['username'])?$_SESSION['username']:"";
		$query="SELECT appRights from marketing where name='$Name'"; 
		$result = mysql_query($query);
		$user_row=mysql_fetch_array($result);
		$rows_marketing = mysql_num_rows($result);
		if($rows_marketing!=1)//Not in marketing search in Guest
		{
			$query="SELECT appRights from guest_login where name='$Name'";
			$result = mysql_query($query);
			$user_row = @mysql_fetch_array($result);
			$rows_marketing = @mysql_num_rows($result);
			if($rows_marketing==1)
				$_SESSION['member']='guest';
		}
		else
			$_SESSION['member']='ei';
		
		global $_SESSION;
		$D=1;
		$TIMEOUT = 24*60*60;

		if($_SESSION['member']=='ei')
			$mktpeople = mysql_query("select name,password from marketing");
		else
			$mktpeople = mysql_query("select name,password from guest_login");

		$rows1 = mysql_num_rows($mktpeople);
		
		$m = 0;
		while($fetch_array = mysql_fetch_array($mktpeople))
		{
			$names[$m] = $fetch_array[0];
			$pass[$m] = $fetch_array[1];
			//$login_active = $fetch_array[2];
			$m++;
		}
		$encryted_result = mysql_query("select password('".$_SESSION['password']."') as pass") or die("Query failed : " . mysql_error());
		$encryted_line = mysql_fetch_array($encryted_result);
		$encrypted_input = $encryted_line['pass'];
		
		for($k=0; $k <= $rows1-1; $k++)
		{ 
			if($names[$k]==$_SESSION['username'] && $pass[$k]==$encrypted_input)
			{
				$query="SELECT login_active from marketing where name='".$_SESSION['username']."' ";
				$result=mysql_query($query);
				$row=mysql_fetch_array($result);
				$login_active=$row["login_active"];
				//($names[$k]==$_SESSION['username'] && $_SESSION['password']=="test123") || ($names[$k]==$_SESSION['username'] && $_SESSION['password']=="guestlogin")
				$found = true;
				break;
			}
		}
		if($found)
		{
			if($_SESSION['time'] < (time() - $TIMEOUT))
			{
				if($D)
					print "checkPermission:ENDofTIME<BR>\n";
				endSession();
				echo "Session Timeout<br>";
				echo "<a href='index.htm'>Re-login</a>";
				exit;
			}
			else 
			{
				$_SESSION['time']=time();
				if($_nextPage=="main.php" && $_SESSION['username']==$_SESSION['password'])
					echo "<script language='JavaScript'>window.location='ChangePassword.php?source=sameUnamePwd'</script>";
				if($_nextPage=="main.php" && $login_active == "N")
				{	
					echo "<script language='JavaScript'>window.location='empdb/upload_offerletter.php'</script>";
				}
				if($_nextPage)
					echo "<script language='JavaScript'>window.location='".$_nextPage."'</script>";
			}
		}
		else
		{
			
			echo "<center>Wrong User name or Password<br>";
			echo "<a href='index.php'>Re-login</a></center>";
			exit;
		}
		$appRights=explode(",",$user_row['appRights']);
		if(in_array($right,$appRights)==FALSE)
		{
			echo "<h5 align='center'>You are not authorised to access this page</h5>";
			echo "<br>";
			echo "<h5 align='center'>Return to <a href='/main.php'>Main Menu</a></h5>";
			exit;
		}
	}

	function endSession()
	{
		global $_SESSION;
		$_SESSION['user']=null;
		session_destroy();
	}

	ini_set('session.gc_maxlifetime',86400);
	/*$sessdir = ini_get('session.save_path').$sep."my_sessions";
	if (!is_dir($sessdir)) { mkdir($sessdir, 0777); }
	ini_set('session.save_path', $sessdir);*/
	session_cache_limiter('private');
	session_cache_limiter('must-revalidate');
	session_cache_expire(30);
	session_start();
	
?>
