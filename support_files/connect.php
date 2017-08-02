<?php
	//$link = mysql_connect("www.educationalinitiatives.com","educatio_educat","ford240720")  or die ("Could not connect to localhost");
	//mysql_select_db ("educatio_educat")  or die ("Could not select database");

	$link = mysql_connect("103.21.59.165","xposeqma_asset","asset@123!")  or die (mysql_errno()."-".mysql_error()."Could not connect to localhost");
	//mysql_select_db ("educatio_mshindi")  or die ("Could not select database".mysql_error());*/
	//$link = mysql_connect("122.248.246.221","ms_analysis","sl@vedb@e!") or die("notsfvkls connect : " . mysql_error());
	mysql_select_db ("xposeqma_asset")  or die ("Could not select database".mysql_error());

	//$link = mysql_connect("hanita","root","")  or die (mysql_errno()."-".mysql_error()."Could not connect to localhost");
	//mysql_select_db ("educatio_educat")  or die ("Could not select database");
	putenv('TZ=IST-5:30');
?>