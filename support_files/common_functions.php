<?php
include_once("constants.php");

$OfficeLocations = array("Ahmedabad","Delhi","Bangalore");
function DoTrim($string)
{
	return trim($string);
}
function redirectPageTo($URL)
{
	header("Location: $URL");
}
function DoAddSlashes($string)
{
	return addslashes($string);
}
function DoPrintArray($array,$type)
{
	if($type == 1)
	{
		print_r ($array);
	}
	else
	{
		echo "<pre>";
		print_r ($array);
		echo "</pre>";
	}
}
function randomPasswordGenerator()
{
	// Configuration definitions, move to config.php
	$CONFIG['security']['password_generator'] = array(
		"C" => array('characters' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', 'minimum' => 4, 'maximum' => 6),
		"N" => array('characters' => '1234567890', 'minimum' => 2, 'maximum' => 2)
	);
	//"S" => array('characters' => "!@()-_=+?*^&", 'minimum' => 1, 'maximum' => 2),
	// Create the meta-password
	$sMetaPassword = "";
	$ahPasswordGenerator = $CONFIG['security']['password_generator'];
	foreach ($ahPasswordGenerator as $cToken => $ahPasswordSeed)
		$sMetaPassword .= str_repeat($cToken, rand($ahPasswordSeed['minimum'], $ahPasswordSeed['maximum']));
	$sMetaPassword = str_shuffle($sMetaPassword);
	// Create the real password
	$arBuffer = array();
	for ($i = 0; $i < strlen($sMetaPassword); $i ++)
		$arBuffer[] = $ahPasswordGenerator[(string)$sMetaPassword[$i]]['characters'][rand(0, strlen($ahPasswordGenerator[$sMetaPassword[$i]]['characters']) - 1)];
	return implode("", $arBuffer);
}
function send_mail($to,$subject,$message,$headers)
{
	if($to!="")
	{
		mail($to,$subject,$message,$headers);
	}
}
function mail_noattachment($to,$subject,$message,$headers)
{
	$ok = @mail($to, $subject, $message, $headers);
	return $ok;
}
function mail_attachment ($from , $to, $subject, $message, $attachment)
{
	$fileatt = $attachment; // Path to the file
	$fileatt_type = "application/octet-stream"; // File Type
    $start=	strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
	$fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the 	attachment
	$email_from = $from; // Who the email is from
	$email_subject =  $subject; // The Subject of the email
	$email_txt = $message; // Message that the email has in it
	$email_to = $to; // Who the email is to
	$headers = "From: ".$email_from;
	$file = fopen($fileatt,'rb');
	$data = fread($file,filesize($fileatt));
	fclose($file);
	//$msg_txt="\n\nMail created using free code from 4word systems : http://4wordsystems.com";
	$msg_txt="";
	$semi_rand = md5(time());
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
	$headers .= "\nMIME-Version: 1.0\n" .
            "Content-Type: multipart/mixed;\n" .
            " boundary=\"{$mime_boundary}\"";
	$email_txt .= $msg_txt;
	$email_message .= "This is a multi-part message in MIME format.\n\n" .
                "--{$mime_boundary}\n" .
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" .
               "Content-Transfer-Encoding: 7bit\n\n" .
	$email_txt . "\n\n";
	$data = chunk_split(base64_encode($data));
	$email_message .= "--{$mime_boundary}\n" .
                  "Content-Type: {$fileatt_type};\n" .
                  " name=\"{$fileatt_name}\"\n" .
                  //"Content-Disposition: attachment;\n" .
                  //" filename=\"{$fileatt_name}\"\n" .
                  "Content-Transfer-Encoding: base64\n\n" .
                 $data . "\n\n" .
                  "--{$mime_boundary}--\n";
	$ok = @mail($email_to, $email_subject, $email_message, $headers);
	return $ok;
}
function Donumber_format($number,$dp)
{
	return number_format($number,$dp);
}
function prepareComboFromArray($comboname,$selected,$inputarray)
{
	$total = count($inputarray);
	$comboString = "";
	$found = 0;
	for($i=0; $i<$total; $i++)
	{
		if($selected == $inputarray[$i])
		{
			$comboString .= "<option value='".$inputarray[$i]."' selected>".$inputarray[$i]."</option>";
			$found = 1;
		}
		else
			$comboString .= "<option value='".$inputarray[$i]."'>".$inputarray[$i]."</option>";
	}
	$comboString = "<option value=''>&#60;".$comboname."&#62;</option>".$comboString;
	return $comboString;
}
function prepareComboFromArrayNotitle($comboname,$selected,$inputarray)
{
	$total = count($inputarray);
	$comboString = "";
	$found = 0;
	for($i=0; $i<$total; $i++)
	{
		if($selected == $inputarray[$i])
		{
			$comboString .= "<option value='".$inputarray[$i]."' selected>".$inputarray[$i]."</option>";
			$found = 1;
		}
		else
			$comboString .= "<option value='".$inputarray[$i]."'>".$inputarray[$i]."</option>";
	}
	//$comboString = "<option value=''>&#60;".$comboname."&#62;</option>".$comboString;
	return $comboString;
}
function prepareComboFromArray_Keys($comboname,$selected,$inputarray)
{
	//echo $selected."-";
	//print_r ($inputarray);
	$total = count($inputarray);
	$comboString = "";
	$found = 0;
	//for($i=0; $i<$total; $i++)
	foreach ($inputarray as $key=>$value)
	{
		if($selected == $key)
		{
			$comboString .= "<option value='".$key."' selected>".$inputarray[$key]."</option>";
			$found = 1;
		}
		else
			$comboString .= "<option value='".$key."'>".$inputarray[$key]."</option>";
	}
	$comboString = "<option value=''></option>".$comboString;
	return $comboString;
}
function Dotagtoimage($image_folder,$subject)
{
	$pattern[0] = "/\[([a-z0-9_ -\.]*),[ ]*(.*)\]/i";
	$replacement[0] = "<img src='$image_folder/\$1' height=\$2>";

	$pattern[1] = "/\[([a-z0-9_ -\.]*)\]/i";
	$replacement[1] = "<img src='$image_folder\$1'>";

	$returnsubject = preg_replace($pattern, $replacement, $subject);
	return $returnsubject;
}
function formatDate($oldformat) // function which converts yyyy-mm-dd to dd/mm/yyyy format
{
	$dateParameters=explode("-",$oldformat);
	$newformat=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
	return $newformat;
}
function check_email_address($email)
{
	// First, we check that there's one @ symbol, and that the lengths are right
	if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email))
	{
		// Email invalid because wrong number of characters in one section, or wrong number of @ symbols.
		//echo "@ is not not there so returning false <br>";
		return 0;
	}
	// Split it into sections to make life easier
	$email_array = explode("@", $email);
	//print_r($email_array);
	if (is_numeric($email_array[0]))
	{
		return 0;
	}
	$local_array = explode(".",$email_array[0]);
	//print_r($local_array);
	for ($i = 0; $i < sizeof($local_array); $i++)
	{
		if (!ereg("^(([A-Za-z0-9][A-Za-z0-9\.-_]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i]))
		{
			//echo "user id of email is wrongly entered so returning false <br>";
			return 0;
		}
	}
	if (!(ereg("^\[?[0-9\.]+\]?$", $email_array[1])))
	{
		// Check if domain is IP. If not, it should be valid domain name
		$domain_array = explode(".", $email_array[1]);
		//print_r($domain_array);
		if (sizeof($domain_array) < 2)
		{
			//echo "After @ required fields are not there so returning false <br>";
			return 0; // Not enough parts to domain
		}
		if (($domain_array[0]=="") || (!(isset($domain_array[0]))))
		{
			//echo "ip name is wrongly inserted so returnign false <br>";
			return 0;
		}
		for ($i = 0; $i < sizeof($domain_array); $i++)
		{
			if (!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i]))
			{
				//echo "Error in ip name so returnign false <br>";
				return 0;
			}
		}
		$valid_domain = array("gmail.com","hotmail.com","yahoo.com", "yahoo.co.in", "yahoo.co.uk", "ymail.in", "aol.com", "lycos.com",
							  "rocketmail.com", "live.in", "msn.com", "in.com", "rediffmail.com", "indiatimes.com", "zapakmail.com",
							  "airtelmail.com","sify.com","dataone.in","ei-india.com","zapak.com","rediff.com","VSNL.COM","SATYAM.COM");
		if (in_array($email_array[1], $valid_domain, 1))
		{
			return 1;
		}
		else
		{
			if (constant("CONNECTION")==2)
			{
				$check = checkdnsrr($email_array[1], "MX");
				if ($check)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 1;
			}
		}
	}
	return 1;
}
function prepareMultiSelectComboFromArray($comboname,$selected,$inputarray)
{
	$total = count($inputarray);
	$comboStr = "";
	$found = 0;
	for($i=0; $i<$total; $i++)
	{
		$comboStr .= "<option value='$inputarray[$i]'";
		foreach($selected as $selone)
			if(!(strcmp($selone,$inputarray[$i]))) {$comboStr .= " selected "; break;}
		$comboStr .= ">$inputarray[$i]</option>";
		$count++;
	}
	$comboString = "<option value=''";
	if($selected[0]=='') {$comboString .= " selected ";}
	$comboString .= ">&#60;".$comboname."&#62;</option>".$comboStr;
	return $comboString;
}

function prepareMultiSelectComboFromArray_Keys($comboname,$selected,$inputarray)
{
	$total = count($inputarray);
	$comboStr = "";
	$found = 0;
	foreach ($inputarray as $key=>$value)
	{
	/*for($i=0; $i<$total; $i++)
	{*/
		$comboStr .= "<option value='$key'";
		foreach($selected as $selone)
			if(!(strcmp($selone,$inputarray[$key]))) {$comboStr .= " selected "; break;}
		$comboStr .= ">$inputarray[$key]</option>";
		$count++;
	}
	$comboString = "<option value=''";
	//if($selected[0]=='') {$comboString .= " selected ";}
	//$comboString .= ">&#60;".$comboname."&#62;</option>".$comboStr;
	$comboString .= $comboStr;
	return $comboString;
}

function orig_to_html($orig)
{
	//file_put_contents("abc.txt",$html_ver."\n");
	$pattern[0] = "/{frac([^}]*)([^<])\//";
	$replacement[0] = "{frac\$1\$2|";
	//file_put_contents("abc.txt",$html_ver."\n");
	$pattern[1] = "/{([a-z])}/";
	$replacement[1] = "<span class=var>\$1</span>";
	//file_put_contents("abc.txt",$html_ver."\n");
	$pattern[2] = "/{exp\(([^{}]*)\)}/";
	$replacement[2] = "<span class=exp>\$1</span>";
	$pattern[2] = "/{frac\(([0-9]*)\+(.*)\)}/";
	$replacement[2] = "\$1{frac(\$2)}";
	$pattern[2] = "/{frac\(([0-9A-Za-z()+-?&#<>=;\/ ]*)\|([0-9A-Za-z()+-?<>=;&#\/ ]*)\)}/";
	$replacement[2] = "<span class=num >\$1</span><span class=den >\$2</span>";
	$html_ver = $orig;
	do
	{	$orig = $html_ver;
		$html_ver = preg_replace($pattern, $replacement, $orig);
	} while ($orig!=$html_ver);
	//file_put_contents("abc.txt",$html_ver."\n");
	//for ie6 handling of symbols like angle, perpendicular, etc.
	if(ereg("msie", strtolower($_SERVER['HTTP_USER_AGENT'])))
		$ie= true;
	else
		$ie = false;
	if($ie)
	{
		/*ereg('MSIE ([0-9]\.[0-9])',$_SERVER['HTTP_USER_AGENT'],$reg);
		if(isset($reg[1]))
		{	*/
			$html_ver = str_replace("&cong;","<FONT FACE=\"Symbol\">&#64;</FONT>",$html_ver); //congruent
			$html_ver = str_replace("&#8773;","<FONT FACE=\"Symbol\">&#64;</FONT>",$html_ver); //congruent
			$html_ver = str_replace("&#8736;","<FONT FACE=\"Symbol\">&#208;</FONT>",$html_ver);//angle sign
			$html_ver = str_replace("&#8869;","<FONT FACE=\"Symbol\">&#94;</FONT>",$html_ver);//perpendicular
			$html_ver = str_replace("<span style=\"font-size:18px;\">&ne;</span>","<FONT FACE=\"Symbol\">&#185;</FONT>",$html_ver);//not equal to
			$html_ver = str_replace("&#8712;","<FONT FACE=\"Symbol\">&#206;</FONT>",$html_ver);//belongs to
			$html_ver = str_replace("&#8713;","<FONT FACE=\"Symbol\">&#207;</FONT>",$html_ver);//does not belong to
			$html_ver = str_replace("&sub;","<FONT FACE=\"Symbol\">&#204;</FONT>",$html_ver);//subset
			$html_ver = str_replace("&#8836;","<FONT FACE=\"Symbol\">&#203;</FONT>",$html_ver);//not a subset
			$html_ver = str_replace("&#8746;","<FONT FACE=\"Symbol\">&#200;</FONT>",$html_ver);//union
			$html_ver = str_replace("&#8745;","<FONT FACE=\"Symbol\">&#199;</FONT>",$html_ver);//intersection
			$html_ver = str_replace("&#8764;","<FONT FACE=\"Symbol\">&#126;</FONT>",$html_ver);//similar to
			$html_ver = str_replace("&#8741;","||",$html_ver);//parallel
		//}
	}
	$i=1;
	do
	{
		$html_ver = preg_replace("/<span class=num/","<span id=num".$i." class=num",$html_ver,1);
		$html_ver = preg_replace("/<span class=den/","<span id=den".$i." class=den",$html_ver,1);
		$i++;
	} while (strpos($html_ver, "<span class=num"));
	//file_put_contents("abc.txt",$html_ver."\n");
	return ($html_ver);
}
function scale_image($question)
{
	$forcedwidth = 500;
	$orig = $question;
	preg_match_all("/src=\"([^>]*)image\/(.*?)\"/i", $orig, $matches, PREG_SET_ORDER);
	$cnt_matches = count($matches);
	//echo "<script>alert(\"Matches - $cnt_matches\");</script>>";
	if ($cnt_matches>0)
	{
		for ($i=0; $i<count($matches);$i++)
		{
			$file_name = $matches[$i][2];
			//echo "<script>alert(\"File name - $file_name\")</script>";
			if(file_exists("tgs/image/".$file_name))
			{
				list($width, $height) = getimagesize("tgs/image/".$file_name);
				//echo "<script>alert(\"Width - $width Height - $height\");</script>";
				if ( $width > $forcedwidth )
			    {
			        $iw = 500;
					$ratio = $forcedwidth / $width;
					$ih = ceil($ratio * $height);
					$question = preg_replace("/<img src=".$file_name."/","<img src=\"".$file_name."\" height=\"$ih\" width=\"$iv\"",$question,1);
			    }
			}
		}
	}
	return $question;
}
function showServerDownMessage($appear=0,$setbgcolor="#9E9E9E",$setfontcolor="#FFFFFF",$setcookie=0,$width="50")
{
	$_COOKIE["user"] = "";
	//echo "function is called";
	if($appear == 1 && $_COOKIE["user"] == "")
	{
		$pm = "";
		if($setcookie == 1)
			$pm = "cls";
		//echo "function is called";
		echo "<script language=\"javascript\">window.document.onload = setTimeout(changeZover,10);</script>";
		echo "<table height=\"10\" width=\"$width%\" align=\"center\" border=\"0\" id=\"layer1\" style=\"display:none\" cellpadding=\"4\" cellspacing=\"1\">";
		echo "<tr bgcolor=\"$setbgcolor\">";
		echo "<td align=\"justify\"><font face=\"arial\" color=\"#FFFFFF\" size=\"2\">Our site will be down on Sunday - 20th Sept '09 from 9.00 am onwards till 1.30 pm for site maintenance and performance upgrades.We apologize for the inconvenience caused. Please check our sites after 1.30pm &nbsp;<input type=\"button\" value=\"close X\" onclick=\"changeZover('$pm')\" style=\"font-family:arial;font-size:11px;border:0px solid #CCBBAA;height:15px\"></font></td>";
		echo "</tr>";
		echo "</table>";
		//exit;
	}

}
$arrSalesCategoryList = array('NSM','ISM','AM','RM','REM','EA','ZM','SRM','BDE');
/*function generateNsmIsmBmhCheck($category,$username,$region_session='',$region_post='',$EARMAM='')
{
	if($EARMAM != '')
		$Name = $EARMAM;
	else
		$Name = $username;

	$whereClause = " ";
	if($category == "NSM")
		$whereClause = " AND ( country = 'India' OR country = 'Nepal') AND region != 'B-M-H' ";
	elseif($category == "ISM")
		$whereClause = " AND country != 'India' AND country != 'Nepal' AND country != '' ";
	elseif($category=='RM' or $category=='REM' or $category=='AM' or $category=='EA')
		$whereClause = " AND ( rm_am='".$Name."' OR ea='".$Name."' OR buddy_rm='".$Name."') ";
	elseif(($category=='ZM' or $category=='SRM') && ($region_session !='' or $region_post !=''))
		$whereClause = " AND ( region='".$region_session."' OR region='".$region_post."') "; // OR buddy_zm ='".$Name."'
	//echo $whereClause;
	return $whereClause;
}*/
function generateMailingList($category,$Name)
{
	//echo "function is called";
	$cc_list = ",harit@ei-india.com";
	$reportingTo = "";
	//echo $category;
	if($category=="AM" || $category=="RM" || $category=="SRM" || $category=="ZM" || $category=="ISM" || $category=="NSM" || $category=="BDE")
	{
		$reportingTo_result = mysql_query("SELECT adminReportingTo,category FROM emp_master,marketing WHERE emp_master.adminReportingTo = marketing.name AND userID='".$Name."'") or die("emp_master".mysql_error());
		$reportingTo_line = mysql_fetch_array($reportingTo_result);
		$reportingTo = "'".$reportingTo_line['adminReportingTo']."'";
		$categoryReportingTo = "'".$reportingTo_line['adminReportingTo']."'";
		//echo $reportingTo_line['category'];
		if($reportingTo_line['category'] == "ZM" || $reportingTo_line['category'] == "SRM")
		{
			$querySM = "SELECT adminReportingTo FROM emp_master WHERE userID = '".$reportingTo_line['adminReportingTo']."'";
			$resultSM = mysql_query($querySM) or die("emp_master2 ".mysql_error());
			$rowSM = mysql_fetch_array($resultSM);
			if($rowSM["adminReportingTo"] != "")
				$reportingTo .= ",'".$rowSM["adminReportingTo"]."'";
		}

		//if($category!='ZM' && $category!='SRM') //copy all mail to baiju, as ZM and SRM directly reporting to baiju no need to copy
		//	$cc_header .= ",baiju@ei-india.com";
	}
	if($category=="EA")
	{
		$reportingTo_result = mysql_query("SELECT underRM,underZM,under_NSM_ISM FROM ea_master WHERE userID='".$Name."'") or die("ea_master ".mysql_error());
		$reportingTo_line = mysql_fetch_array($reportingTo_result);
		if($reportingTo_line['underZM']!='')
			$reportingTo = "'".$reportingTo_line['underZM']."'";
		if($reportingTo != '' && $reportingTo_line['under_NSM_ISM']!='')
			$reportingTo .= ",'".$reportingTo_line['under_NSM_ISM']."'";

		if($reportingTo!='' && $reportingTo_line['underRM']!='')
			$reportingTo .= ",'".$reportingTo_line['underRM']."'";
		elseif($reportingTo_line['underRM']!='')
			$reportingTo .= "'".$reportingTo_line['underRM']."'";
	}

	return $reportingTo."|".$cc_list;
}
function fetchTerritories($person1)
{
		$query="SELECT distinct territory FROM territory_allotment WHERE zm_username='$person1' OR rm_username='$person1' OR ea_username='$person1' OR mse_username='$person1' OR nsm_username='$person1'";
		$result=mysql_query($query) or die(mysql_error());
		$territoryStr="";
		while($user_row=mysql_fetch_array($result))
		{
			$territoryStr.="'".$user_row['territory']."',";
		}
		if($territoryStr!="")
		{
			$territoryStr=substr($territoryStr,0,-1);
		}
		return $territoryStr;
}

function fetchcategory($person1)
{
		$category_result = mysql_query("select category from marketing where name='$person1'") or die(mysql_error());
    	$category_row = mysql_fetch_array($category_result);
		return $category_row[0];
}
function fetchRMs($name)
{
	$RMArray=array();
	$testring = getYearlyRounds();
	$query="SELECT distinct rm_am FROM school_status WHERE zm='$name' and test_edition in($testring) ORDER BY rm_am";
	$result=mysql_query($query);
	while($user_row=mysql_fetch_array($result))
	{
		if($user_row['rm_am']!="")
			array_push($RMArray,$user_row['rm_am']);
	}
	return $RMArray;
}

function fetchEAs($name)
{
	$EAArray=array();
	$testring = getYearlyRounds();
	$query="SELECT distinct ea FROM school_status WHERE (zm='$name' OR rm_am='$name') and test_edition in($testring)  ORDER BY ea";
	$result=mysql_query($query);
	while($user_row=mysql_fetch_array($result))
	{
		if($user_row['ea']!="")
			array_push($EAArray,$user_row['ea']);
	}
	return $EAArray;
}

function fetchAllPeople()
{
	$marketingArray=array();
	$query = "select name from marketing where category in ('ZM','SRM')";
	$result = mysql_query($query);
	$total_zms = mysql_num_rows($result);
	while($user_row = mysql_fetch_array($result))
	{
		array_push($marketingArray,$user_row['name']);
	}

	$query = "select name from marketing where category in('RM','REM','AM','BDE')";
	$result = mysql_query($query);
	$total_rms = mysql_num_rows($result);
	while($user_row = mysql_fetch_array($result))
	{
		array_push($marketingArray,$user_row['name']);
	}

	/*$query = "select name from marketing where category = 'EA'";
	$result = mysql_query($query);
	$total_eas = mysql_num_rows($result);
	while($user_row = mysql_fetch_array($result))
	{
		array_push($marketingArray,$user_row['name']);
	}*/
	return $marketingArray;
}
function fetchEmpContract($condition="")
{
	$arrRet = array();
	$query = "SELECT firstName,lastName,userID FROM emp_master WHERE 1 = 1 ".$condition." UNION SELECT firstName,lastName,userID FROM contract_master WHERE 1 = 1 ".$condition;
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$arrRet[$row["userID"]] = $row["firstName"]." ".$row["lastName"];
	}
	return $arrRet;
}
// Function fetches the new rounds after 15 days of the first month of New year
function getYearlyRounds()
{
	$testr = array();
	$query_condition = "SELECT test_edition FROM test_edition_details WHERE 1 = 1 AND ( (YEAR(first_eng_date) =  YEAR(CURDATE()) AND DATEDIFF(CURDATE(),'".date("Y")."-01-15') > 0 ) OR (YEAR(first_eng_date) =  YEAR(CURDATE()) - 1 AND DATEDIFF(CURDATE(),'".date("Y")."-01-15') < 0)) ";
	$result_condition = mysql_query($query_condition) or die(mysql_error());
	while($row_condition = mysql_fetch_array($result_condition))
	{
		$testr[] = "'".$row_condition["test_edition"]."'";
	}
	$testring =  implode(",",$testr);
	return $testring;
}
function fetchPersonDetailsByName($Name)
{
	$arrRet = array();
	//echo $category;
	$arrSalesCategoryList = array('NSM','ISM','AM','RM','REM','EA','ZM','SRM','BDE');
	$query_cat = "SELECT category FROM marketing WHERE name = '".$Name."'";
	$result_cat = mysql_query($query_cat);
	$row_cat = mysql_fetch_array($result_cat);
	if(in_array($row_cat[0],$arrSalesCategoryList))
	{
		$query = "SELECT userID,CONCAT(firstname,' ',lastname) as fullname FROM emp_master WHERE (reportingTo = '".$Name."' OR adminReportingTo = '".$Name."') AND desig IN ('Regional Manager','Relationship Manager','Senior Relationship Manager','Zonal Manager','Sr. Regional Manager','Business Development Executive','Business Development Manager') ";
		$query.=" UNION SELECT userID,CONCAT(firstname,' ',lastname) as fullname FROM ea_master WHERE (underZM = '".$Name."' OR underRM = '".$Name."' OR under_NSM_ISM = '".$Name."') ORDER BY fullname";
	}
	else
	{
		$query = "SELECT userID,CONCAT(firstname,' ',lastname) as fullname FROM emp_master WHERE desig IN ('Regional Manager','Senior Relationship Manager','Zonal Manager','Sr. Regional Manager','Relationship Manager','Head-National Sales','Head-International Sales') ";
		$query.=" UNION SELECT userID,CONCAT(firstname,' ',lastname) as fullname FROM ea_master WHERE 1 = 1 ORDER BY fullname";
	}
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$arrRet[$row["userID"]] = $row["fullname"];
	}
	//echo count($arrRet);
	//print_r($arrRet);
	return $arrRet;
}

### function for relacing common junk chars from question to print in pdf ###
function common_pdf_junk_replace($string){

		$string = str_replace("â€˜","'",$string);
		$string = str_replace("â€™","'",$string);
		$string = str_replace("â€“","-",$string);
		$string = str_replace("â€¦","...",$string);
		$string = str_replace("Ã†","'",$string);
		$string = str_replace("&nbsp;"," ",$string);
		$string = str_replace("Â·",".",$string);
		$string = str_ireplace("</DIV>","<br>",$string);
		$string = str_replace("‘","'",$string);
	   	$string = str_replace("’","'",$string);
	   	$string = str_replace("–","-",$string);
	   	$string = str_replace("…","...",$string);
	   	$string = str_replace("Æ","'",$string);
	   	$string = str_replace("·",".",$string);
		$string = str_replace("÷","&divide;",$string);
		$string = str_replace("×","&times;",$string);
		$string = str_replace("á"," ",$string);
		$string = iconv("UTF-8","UTF-8//IGNORE",$string); // removed Invalid UTF8 chars
		//$string = preg_replace('/[^(\x20-\x7F)]*/','', $string); // removed non ASCII chars
   		return $string;
}

function replace_asset_images($orig,$img_folder)
{
	$pattern[0] = "/\[([a-z0-9_\.]*)\]/i";
	$replacement[0] = "<img src='http://www.assetonline.in/asset_online/$img_folder/\$1'>";
	//$pattern[1] = "/\[([a-z0-9_\.]*)[ ]*,[ ]*(.*)\]/i";
	$pattern[1] = "/\[([a-z0-9_\.]*)[ ]*,[ ]*(.[^\]]*)\]/i";
	$replacement[1] = "<img src='http://www.assetonline.in/asset_online/$img_folder/\$1' height=\$2>";
	$pattern[2] = "/\r\n/";
	$replacement[2] = "<br>\n";
	$html_ver = preg_replace($pattern, $replacement, $orig);
	return ($html_ver);
}
/*function getAdminOnLeave()
{
	$arrRet = array();
	$arrAdminReporting = array();
	$query = "SELECT b.adminReportingTo FROM leave_application a,emp_master b WHERE a.userID = b.adminReportingTo AND leave_type not in('Work Home','Tour') AND grant_from <= CURDATE() AND grant_until > CURDATE() AND grant_days >= 10 AND leave_status != 'Rejected' GROUP BY b.adminReportingTo ";
	$query.= "UNION SELECT d.adminReportingTo FROM leave_application c,contract_master d WHERE c.userID = d.adminReportingTo AND leave_type not in('Work Home','Tour') AND grant_from <= CURDATE() AND grant_until > CURDATE() AND grant_days >= 10 AND leave_status != 'Rejected' GROUP BY d.adminReportingTo ";
	$query.= "UNION SELECT f.adminReportingTo FROM leave_application e,ea_master f WHERE e.userID = f.adminReportingTo AND leave_type not in('Work Home','Tour') AND grant_from <= CURDATE() AND grant_until > CURDATE() AND grant_days >= 10  AND leave_status != 'Rejected' GROUP BY f.adminReportingTo";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$arrAdminReporting[] = $row["adminReportingTo"];
	}
	/*$queryContract = "SELECT b.adminReportingTo,COUNT(DISTINCT srno) FROM leave_application a,contract_master b WHERE a.userID = b.adminReportingTo AND grant_until > CURDATE() AND grant_days >= 10 AND leave_type IN ('Leave Without Pay') GROUP BY b.adminReportingTo";
	$resultContract = mysql_query($queryContract);
	while($rowContract = mysql_fetch_array($resultContract))
	{
		$arrAdminReporting[] = $rowContract["adminReportingTo"];
	}
	if(isset($arrAdminReporting) && count($arrAdminReporting) > 0)
	{
		$str = implode("','",$arrAdminReporting);
		$query_str = "SELECT userID FROM emp_master WHERE adminReportingTo IN ('".$str."') ";
		$query_str.= "UNION SELECT userID FROM contract_master WHERE adminReportingTo IN ('".$str."') ";
		$query_str.= "UNION SELECT userID FROM ea_master WHERE adminReportingTo IN ('".$str."') ";
			
		$result_str = mysql_query($query_str) or die(mysql_error());
		while($row_str = mysql_fetch_array($result_str))
		{
			$arrRet[] = $row_str["userID"];
		}
	}
	return $arrRet;
}*/
function getOnlyAdminOnLeave()
{
	$arrAdminReporting = array();
	$query = "SELECT b.adminReportingTo FROM leave_application a,emp_master b WHERE a.userID = b.adminReportingTo AND grant_from <= CURDATE() AND grant_until > CURDATE() AND grant_days >= 10 AND leave_type IN ('Privilege Leave','Leave Without Pay') AND leave_status != 'Rejected' GROUP BY b.adminReportingTo ";
	$query.= "UNION SELECT d.adminReportingTo FROM leave_application c,contract_master d WHERE c.userID = d.adminReportingTo AND grant_from <= CURDATE() AND grant_until > CURDATE() AND grant_days >= 10 AND leave_type IN ('Privilege Leave','Leave Without Pay') AND leave_status != 'Rejected' GROUP BY d.adminReportingTo ";
	$query.= "UNION SELECT f.adminReportingTo FROM leave_application e,ea_master f WHERE e.userID = f.adminReportingTo AND grant_from <= CURDATE() AND grant_until > CURDATE() AND grant_days >= 10 AND leave_type IN ('Privilege Leave','Leave Without Pay') AND leave_status != 'Rejected' GROUP BY f.adminReportingTo";

	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		$arrAdminReporting[] = $row["adminReportingTo"];
	}
	return $arrAdminReporting;
}

function fetchAllSbuDetails()
{
	$arrRet = array();
	$query = "SELECT * FROM sbu_master ";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$arrRet[$row["srno"]] = $row["sbu_name"];
	}
	return $arrRet;
}

function getReportingToOnLeave($username){
		$noofdays = 7;
		$arrAdminReporting = array();
		$directorName = getdirectorname();
		$arrHR = getAllHR();
		$query = "";
		#In case of Srini - leave application only those cases should go to HR where direct reportees to Srini are on leave for more than 7 days.
		if(in_array($username,$arrHR))
		{
			$query = "SELECT b.userID FROM leave_application a,emp_master b WHERE (b.adminReportingTo = '".$directorName."' OR b.adminReportingTo = '".$username."') AND a.userID = b.userID 
				  AND grant_from <= CURDATE() AND grant_until >= CURDATE() AND grant_days >= $noofdays AND leave_type NOT IN ('Tour','Work Home')  AND leave_status != 'Rejected'";
			$query.= "UNION SELECT d.userID FROM leave_application c,contract_master d WHERE (d.adminReportingTo = '".$directorName."' OR d.adminReportingTo = '".$username."') AND c.userID = d.userID AND grant_from <= CURDATE() AND grant_until >= CURDATE() AND grant_days >= $noofdays AND leave_type NOT IN ('Tour','Work Home')  AND leave_status != 'Rejected' ";
			$query.= "UNION SELECT f.userID FROM leave_application e,ea_master f WHERE (f.adminReportingTo = '".$directorName."' OR f.adminReportingTo = '".$username."') AND e.userID = f.userID AND grant_from <= CURDATE() AND grant_until >= CURDATE() AND grant_days >= $noofdays AND leave_type NOT IN ('Tour','Work Home')  AND leave_status != 'Rejected' ";
		}
		else if($username != $directorName){
			$query = "SELECT b.userID FROM leave_application a,emp_master b WHERE b.adminReportingTo = '".$username."' AND a.userID = b.userID 
				      AND grant_from <= CURDATE() AND grant_until >= CURDATE() AND grant_days >= $noofdays AND leave_type NOT IN ('Tour','Work Home')  AND leave_status != 'Rejected'";
			$query.= "UNION SELECT d.userID FROM leave_application c,contract_master d WHERE d.adminReportingTo = '".$username."' AND c.userID = d.userID AND grant_from <= CURDATE() AND grant_until >= CURDATE() AND grant_days >= $noofdays AND leave_type NOT IN ('Tour','Work Home')  AND leave_status != 'Rejected' ";
			$query.= "UNION SELECT f.userID FROM leave_application e,ea_master f WHERE f.adminReportingTo = '".$username."' AND e.userID = f.userID AND grant_from <= CURDATE() AND grant_until >= CURDATE() AND grant_days >= $noofdays AND leave_type NOT IN ('Tour','Work Home')  AND leave_status != 'Rejected' ";
		}
		
		if($query != ""){
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result)){
				$arrAdminReporting[] = $row["userID"];
			}
		}
		return $arrAdminReporting;
		
	}

function sanitizeHTML($input) {
    $search = array(
      '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
      '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
      '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
      //'@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
    );
    $output = preg_replace($search, '', $input);
    return $output;
}
    
function get_ip_address(){
    foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key)
    {
        if (array_key_exists($key, $_SERVER) === true)
        {
            foreach (explode(',', $_SERVER[$key]) as $ip)
            {
                $ip = trim($ip); // just to be safe

                if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                    return $ip;
                }
            }
        }
    }
}
function call_hooks($name,$data){
    if(empty($name)){
        return false;       
    }
    $get_hooks_for_category_query = "SELECT * FROM ei_webhooks "
            . " WHERE hook_name = '$name' AND status = 1";
    $result = mysql_query($get_hooks_for_category_query) or die(mysql_error());
    $hooks = array();
	while($hook = mysql_fetch_assoc($result)){		
		$hooks[] = $hook;
	}
    $sql = array();
    foreach($hooks as $hook){
        $service_response = ei_curl($hook['web_url'],$data);
        $sql[] = '("'.mysql_real_escape_string($hook['hook_name']).'", "'.mysql_real_escape_string($service_response).'")';
    }
    mysql_query('INSERT INTO ei_webhooksExceutionLog (hook_name, service_response) VALUES '.implode(',', $sql));
}
function _is_curl_enabled(){
    return function_exists('curl_version');
}

function ei_curl($url,$data){ 
    if(!_is_curl_enabled()){
        return array(json_encode(array('msg' => 'curl is not enabled.')));
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1);
    $data_params = http_build_query($data);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$data_params);  
    // receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $server_output = curl_exec ($ch);
    curl_close ($ch);
    return $server_output;
}

function add_loginLog($name="",$pageName="",$project=""){
	if($name==""){
		$name=$_SESSION['username'];
	}
	if($pageName==""){
		$pageName = $_SERVER['REQUEST_URI'];
	}
	if($project==""){
		$project = "Intranet";
	}
	$ip = getenv('HTTP_CLIENT_IP')?:getenv('HTTP_X_FORWARDED_FOR')?:getenv('HTTP_X_FORWARDED')?:getenv('HTTP_FORWARDED_FOR')?:getenv('HTTP_FORWARDED')?:getenv('REMOTE_ADDR');
	$query = mysql_query("INSERT INTO eiLogin_log (userID,ipAdd,pageURL,project) VALUES ('".$name."','".$ip."','".$pageName."','".$project."')");
}

//tickets approvals now go to sbu hed no to ceo , for that made new functions
function get_sbu_id_of_users($user_string,$date_of_booking)
{
    $array_userid_count_array = array();
    $explode_users = explode(',', $user_string);
    $explode_users = array_map('trim', $explode_users);
    
    foreach ($explode_users as $userID) {
        $sbu_id = get_sbu_id_of_user($userID,$date_of_booking);
        if(isset($array_userid_count_array[$sbu_id]))
        $array_userid_count_array[$sbu_id] ++;
        else
         $array_userid_count_array[$sbu_id] = 1;
    }

    $array_userid_count_array = array_keys($array_userid_count_array, max($array_userid_count_array));
    if(isset($array_userid_count_array[0]))
    return $array_userid_count_array[0];
    else
    return 0;
}
 function is_user_sbu_head($user_array,$sbu_head)
{
	$user_array = array_map('trim', $user_array);
	$send_approval_to = '';
	$sbu_head_array = array_intersect($user_array, $sbu_head);
	if(!empty($sbu_head_array))
	{
		$sbu_head_id = $sbu_head_array[0];
		$query = "select adminReportingTo from emp_master where userID = '$sbu_head_id'";
    	$result = mysql_query($query) or die(mysql_error());
    	$row = mysql_fetch_row($result);
        $send_approval_to = $row[0];
	}
	return $send_approval_to;
}
function get_sbu_id_of_user($userID,$date_of_ticket)
{
    $query = "SELECT sbu_id FROM emp_sbu_mapping WHERE username='$userID' AND  effective_from<='$date_of_ticket' and  (effective_till='0000-00-00' or effective_till>= '$date_of_ticket')";	
	$result = mysql_query($query) or die(mysql_error());
	if($row = mysql_fetch_array($result))
	{
		$empl_sbu_id = $row["sbu_id"];
	}
    else
    {
        $query = "SELECT empl_sbu_id FROM emp_master WHERE userID='$userID'";	
        $result = mysql_query($query) or die(mysql_error());
        if($row = mysql_fetch_array($result))
        {
        	$empl_sbu_id = $row["empl_sbu_id"];
        }
    }
    return $empl_sbu_id;
}
/*
$query = "SELECT sbu_id FROM emp_sbu_mapping WHERE username='$userID' AND  (effective_till='0000-00-00' or effective_till>= '$date_of_ticket')";	
	$result = mysql_query($query) or die(mysql_error());
	if($row = mysql_fetch_array($result))
	{
		$empl_sbu_id = $row["sbu_id"];
	}
    else
    {
        $query = "SELECT empl_sbu_id FROM emp_master WHERE userID='$userID'";	
        $result = mysql_query($query) or die(mysql_error());
        if($row = mysql_fetch_array($result))
        {
        	$empl_sbu_id = $row["empl_sbu_id"];
        }
    }
*/
function get_all_tickets($Name,$sbu_head)
{
    $return_array = array();
    $query = "select * from ticket_details 
      where need_approval='Y' and approved1_by=''
      AND eligible_amount !='' AND no_of_passengers !='' 
      AND entered_date != '0000-00-00' 
      AND date_of_journey !='0000-00-00' 
      AND date_of_booking !='0000-00-00' 
      ";
    $srno = 1;
    $result = mysql_query($query) or die(mysql_error());
    while ($line = mysql_fetch_array($result)) {
    	// if sbu head claims beyond elegibility then its go to its reporting head
    	$check_sbu_head = is_user_sbu_head(explode(',',$line['name_of_passengers']),$sbu_head);
   		if($check_sbu_head != '')
   		{
   			$sbu_head_user_id = $check_sbu_head;
   		}
   		else
   		{
   			$date_of_booking = $line['date_of_booking'];
   			$sbu_id = get_sbu_id_of_users($line['name_of_passengers'],$date_of_booking);
      		$sbu_head_user_id = $sbu_head[$sbu_id];
   		}
        if($sbu_head_user_id == $Name)
        {
            $line['srno'] = $srno;
            $return_array[] = $line;
            $srno ++;
        }
    }
    return $return_array;
}

#get eligible date of employees for appraisal
function geteligibleDate()
{
	$query = "SELECT start_date, id,eligible_dt FROM pa_master where start_date<=CURDATE()  ORDER BY id DESC LIMIT 1";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		$date = $row["eligible_dt"];
	}
	return $date;
}
function getMDuserIDArray()
{
	$director = array();
	$query = "SELECT sbu_head FROM sbu_master WHERE srno = '14' and sbu_name = 'Corporate office'";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$director[] = $row["sbu_head"];
	}
	return $director;
}
#get srini's name
function getdirectorname()
{
	$query_user = "SELECT userID FROM emp_master WHERE empl_sbu_id = '14' and desig = 'Chief Executive Officer'";
	$result_user = mysql_query($query_user) or die(mysql_error());
	$row_user = mysql_fetch_array($result_user);
	
	$directorName = $row_user["userID"];
	
	return $directorName;
}
#get employees who are direct reporting to srini 
function getReportingtoCEOusers($directorname)
{
	$userArr = array();
	$query = "SELECT userID  FROM emp_master WHERE adminReportingTo = '".$directorname."' ";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$userArr[] = $row["userID"]; 
	}
	return $userArr;
}
#get all HR people
function getAllHR()
{
	$arrHR = array();
	$query = "SELECT userID from emp_master where empl_sbu_id = '10'";
	$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
		$arrHR[] = $row["userID"];
	}
	return $arrHR;
}
#get employees' location and category
function getcategoryandlocation($userID)
{
	$arrRet = array();
	$query = "SELECT name,reporting_office_location,category  from marketing WHERE name = '".$userID."'";
	$result = mysql_query($query) or die(mysql_error());
	$row = mysql_fetch_array($result);
	
	$arrRet["reporting_office_location"] = $row["reporting_office_location"];
	$arrRet["category"] = $row["category"];
	
	return $arrRet;
} 

####### DA Auto BluePrint - Adding Tasks Related Functions Task Id #0015835 Start ########################

function addAutoBluePrintAutomatically($schoolCode,$year,$subjectStudentCntArr,$class,$board,$connid)
{
	$subshortnamearry = array(1=>"e",2=>"m",3=>"s");
	$arrlastyeardata = array();
	$previous_year = $year - 1;
	$query = "SELECT  da_orderBreakup.e , da_orderBreakup.m,da_orderBreakup.s,da_orderBreakup.class,
				      da_orderMaster.schoolCode,da_orderMaster.year 
			  FROM  da_orderMaster 
			  LEFT JOIN da_orderBreakup ON da_orderMaster.order_id = da_orderBreakup.order_id
			  WHERE  schoolCode ='".$schoolCode."' AND year ='".$previous_year."' 
			  AND da_orderMaster.board = '".$board."'
			  AND da_orderBreakup.class = '".$class."'
			  GROUP BY da_orderMaster.schoolCode, da_orderBreakup.class";
	$dbquery = new dbquery($query,$connid);
	while($row = $dbquery->getrowassocarray()){
		$arrlastyeardata = $row;
	}
	
	#$OrderedsubjectArr = getorderdedSubject($subjectStudentCntArr,$connid); # Fetching Current Year Order Details
	$questioncontdetais = getquestioncntandpassageDetails($class,$board,$connid); # Fetching Blue Print Details
	
	#If it repeated school than take previous year autoblueprint details and add same autoblueprint details for new year 
	if(isset($arrlastyeardata) && sizeof($arrlastyeardata) > 0){
		foreach($subjectStudentCntArr as $subkey => $totalstudent){
			
			if($subjectStudentCntArr[$subkey] > 0 && $arrlastyeardata[$subshortnamearry[$subkey]] > 0 ){
				AddAutoblueprintformexistdata($arrlastyeardata,$schoolCode,$class,$questioncontdetais,$subkey,$year,$connid);
			}else if($subjectStudentCntArr[$subkey] > 0){	
				AddautoSchoolBluePrint($subkey,$schoolCode,$class,$year,$questioncontdetais,$connid);
			}
		}
		
	}
	else{  // Considering new school
		
		foreach($subjectStudentCntArr AS $subjectkey=>$count){
			if($count > 0){
				$OrderedsubjectArr[] = $subjectkey;
			}
		}
		foreach($OrderedsubjectArr AS $orderSubkey => $orderSubVal){
			$CurAutoBluePrint = CheckBluePrintExists($schoolCode,$class,$year,$orderSubVal,$connid);
			if($CurAutoBluePrint == False){
				AddautoSchoolBluePrint($orderSubVal,$schoolCode,$class,$year,$questioncontdetais,$connid);
			}	
		}
	}
}
# Fetching English - No passage and no questions details for blueprint
function getquestioncntandpassageDetails($class,$valueBoard,$connid)
{
	if($class == "") return;
	$EngPaperTypeArray= array("1","2");
	$returnArr  = array();
	
	foreach($EngPaperTypeArray As $paperkey =>$papervalue)
	{
		$query = "SELECT paper_type,total_ques,no_of_passage FROM da_autoBluePrint WHERE class = '".$class."' AND paper_type = '".$papervalue."' AND board = '".$valueBoard."'";
		$dbquery = new dbquery($query,$connid);
		
		while($row = $dbquery->getrowassocarray()){
			$returnArr[$row["paper_type"]] = $row;
		}
	}
	return $returnArr;
}

#function for add autoblueprint details for current year
function  AddautoSchoolBluePrint($subjectno,$schoolCode,$class,$year,$questioncontdetais,$connid)
{
	if(!is_array($questioncontdetais)) return;
	
	if($subjectno == 1){
		foreach($questioncontdetais AS $paper_type=>$questioncnt){
			
			$query = "INSERT INTO da_autoSchoolBluePrint SET schoolCode = '".$schoolCode."',class = '".$class."',
					  subject = '".$subjectno."',paper_type = '".$paper_type."',no_of_questions = '".$questioncontdetais[$paper_type]["total_ques"]."',
					  no_of_passage = '".$questioncontdetais[$paper_type]["no_of_passage"]."', year = '".$year."',added_by='SYSTEM' ,added_dt = NOW(),exactly = 'Yes'";
			$dbquery = new dbquery($query,$connid);	
		}
	}
	else{
		$query = "INSERT INTO da_autoSchoolBluePrint SET schoolCode = '".$schoolCode."',class = '".$class."',
				  subject = '".$subjectno."',paper_type = 'N/A',no_of_questions = '25',
				  no_of_passage = 'N/A', year = '".$year."',added_by='SYSTEM' ,added_dt = NOW(),exactly = 'No'";
		$dbquery = new dbquery($query,$connid);
	}
}
	
#function for check current year autoblueprint exist or not
function CheckBluePrintExists($schoolCode,$class,$year,$subjectval,$connid)
{
	$query_curYearAutoBluePrint = "SELECT * FROM da_autoSchoolBluePrint WHERE schoolCode = '".$schoolCode."' AND class = '".$class."' AND year = '".$year."' AND subject = '".$subjectval."' ";
	$dbquery_curYearAutoBluePrint =  new dbquery($query_curYearAutoBluePrint,$connid);
	if($dbquery_curYearAutoBluePrint->numrows() > 0){
		return True;
	}
	else{
		return False;
	}
} 
function AddAutoblueprintformexistdata($arrlastyeardata,$schoolCode,$class,$questioncontdetais,$subject,$year,$connid)
{
	$CurAutoBluePrint = CheckBluePrintExists($arrlastyeardata["schoolCode"],$arrlastyeardata["class"],$year,$subject,$connid);
	if($CurAutoBluePrint == False)
	{
		$query_autoblueprint = "SELECT * FROM  da_autoSchoolBluePrint WHERE schoolCode = '".$arrlastyeardata["schoolCode"]."' AND year = '".($year-1)."'AND subject = '".$subject."' AND class = '".$arrlastyeardata["class"]."' ";
		$dbquery_autoblueprint = new dbquery($query_autoblueprint,$connid);
		if($dbquery_autoblueprint->numrows() > 0){
			while($row_auotblueprint = $dbquery_autoblueprint->getrowarray())
			{
				$query = "INSERT INTO da_autoSchoolBluePrint SET schoolCode = '".$arrlastyeardata["schoolCode"]."',class = '".$row_auotblueprint["class"]."',
						  subject = '".$row_auotblueprint["subject"]."',paper_type = '".$row_auotblueprint["paper_type"]."',no_of_questions = '".$row_auotblueprint["no_of_questions"]."',
						  no_of_passage = '".$row_auotblueprint["no_of_passage"]."', year = '".$year."',added_by='SYSTEM' ,added_dt = NOW(),exactly = '".$row_auotblueprint["exactly"]."'";
				$dbquery = new dbquery($query,$connid);
			}
		}
		else{
			AddautoSchoolBluePrint($subject,$schoolCode,$class,$year,$questioncontdetais,$connid);
		}
	}
}
####### DA Auto BluePrint - Adding Tasks Related Functions Task Id #0015835 End ########################
?>