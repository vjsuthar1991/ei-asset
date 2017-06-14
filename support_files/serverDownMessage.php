<script language="javascript">
function changeZover(pm) {
	if(pm == "cls")
	{
		if(document.getElementById("layer1").style.display == 'inline')
			document.getElementById("layer1").style.display = 'none';
	}
	else
		document.getElementById("layer1").style.display = 'inline';	
}	
</script>

<?php
function showServerDownMessage($appear=0,$setbgcolor="#9E9E9E",$setfontcolor="#FFFFFF",$setcookie=0,$width="50")
{
	if($appear == 1)
	{
		$pm = "";
		if($setcookie == 1)
			$pm = "cls";
		echo "<script language=\"javascript\">window.document.onload = setTimeout(changeZover,10);</script>";
		echo "<br><br><center><table height=\"10\" width=\"100%\" align=\"center\" border=\"0\" id=\"layer1\" style=\"display:none\" cellpadding=\"4\" cellspacing=\"1\">";
		echo "<tr>";
		echo "<td align=\"center\"><font  color=\"#4d4d4d\" size=\"4\">Due to maintenance activity, the site will not be available for 2 hours from 24th January 11:00 p.m. till 25th January 1:00 a.m. We are sorry for the inconvenience and thank you for your understanding.&nbsp;&nbsp;<input type=\"button\" value=\" X \" onclick=\"changeZover('$pm')\" style=\"font-family:arial;font-size:11px;border:2px solid #CCBBAA; color:#FF0000; height:20px\"></font></td>";
		echo "</tr>";
		echo "</table></center><br>";
	}
	else if($appear == 2)
	{
		echo "<script>window.location=\"m23042010_downTime.htm\"</script>";	
	}

}
?>
