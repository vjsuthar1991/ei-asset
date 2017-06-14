<?php
class clsaqad
{
	var $class;
	var $action;
	var $date;
	var $email;
	var $school_code;
	var $error;
	var $oldpassword;
	var $newpassword;
	var $id;
	var $srno;
	function clsaqad()
	{
		$this->class = "";
		$this->action = "";
		$this->date = "";
		$this->email = "";
		$this->school_code = "";
		$this->error = "";
		$this->oldpassword = "";
		$this->newpassword = "";
		$this->id = "";
		$this->srno = "";
	}
	function setpostvars()
	{
		if(isset($_POST["clsaqad_hdnschoolcode"])) $this->school_code = trim($_POST["clsaqad_hdnschoolcode"]);
		if(isset($_POST["clsaqad_hdnsrno"])) $this->srno = trim($_POST["clsaqad_hdnsrno"]);
		if(isset($_POST["clsaqad_class"])) $this->class = trim($_POST["clsaqad_class"]);
		if(isset($_POST["clsaqad_date"])) $this->date = trim($_POST["clsaqad_date"]);
		if(isset($_POST["clsaqad_oldpassword"])) $this->oldpassword = trim($_POST["clsaqad_oldpassword"]);
		if(isset($_POST["clsaqad_newpassword"])) $this->newpassword = trim($_POST["clsaqad_newpassword"]);
		if(isset($_POST["clsaqad_hdnaction"])) $this->action = trim($_POST["clsaqad_hdnaction"]);	
		//print_r($_POST);
	}
	function setgetvars()
	{
		if(isset($_GET["date"])) $this->date = trim($_GET["date"]);
		if(isset($_GET["id"])) $this->id = trim($_GET["id"]);
		if(isset($_GET["class"])) $this->class = trim($_GET["class"]);
		if(isset($_GET["action"])) $this->action = trim($_GET["action"]);
	}
	function pageAQAD($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		$message = "";
		$date = "";
		$class = "";
		
		if($this->action == "ShowData" || $this->action == "PrintData")
		{
			if($this->validation($connid,$this->class))
			{
				$arrDate = explode("-",$this->date);
				$date = $arrDate[2]."-".$arrDate[1]."-".$arrDate[0];
				$finalname = $_SERVER['DOCUMENT_ROOT']."/aqad/PDF/".$date."-".$this->class.".pdf";
				$message = $this->generateAQADtemplate($connid,$date,$this->class);
				if($this->action == "PrintData")
				{
					if(!file_exists($finalname))
					{
						$this->generatePDFversion($connid,$date,$this->class);
					}
					echo "<script language=javascript>window.location=\"http://".$_SERVER["SERVER_NAME"]."/aqad/PDF/".$date."-".$this->class.".pdf\"</script>";
				}
					
			}
		}
		elseif($this->id != "")
		{
			$string = $this->generateClassDateByID($connid,$this->id);
			$arrStr = explode('|',$string);
			$date = $arrStr[0];
			$class = $arrStr[1];
			if($this->validation($connid,$class))
			{
				$message = $this->generateAQADtemplate($connid,$date,$class);
			}
		}
		
		return $message; 
	}
	function generateClassDateByID($connid,$id)
	{
		$query = "SELECT date,class FROM aqad_master WHERE md5(id) = '".$this->id."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$date = $row["date"];
		$class = $row["class"];
		return $date."|".$class;
	}
	function validation($connid,$cls)
	{
		if($this->class == "" && $this->action == "ShowData")
			$this->error["class"] = "Please enter the class";
		if($this->date == "" && $this->action == "ShowData")
			$this->error["date"] = "Please select the date";
		if($this->date != "")
		{
			$arrDate = explode("-",$this->date);
			$date = $arrDate[2].$arrDate[1].$arrDate[0];
			if($date > date("Ymd"))
				$this->error["futureDate"] = "Asset Question a Day is not available for future dates";
			if($this->validateDate($connid))
				$this->error["invalidDate"] = "You were not subscribed for AQAD for this date";
		}
		if($this->validSchool($connid,$cls))
				$this->error["notEligible"] = "You are not eligible for accessing AQAD";
		if(is_array($this->error) && count($this->error) > 0)
			return false;
		else 
			return true;
	}
	function validateDate($connid)
	{
		$arrDate = explode("-",$this->date);
		$date = $arrDate[2].$arrDate[1].$arrDate[0];
		$query = "SELECT DATE_FORMAT(date_added,'%Y%m%d') dateadded,date_added FROM aqad_registrationDetails_temp WHERE (studentemail = '".$_SESSION["userid"]."' OR parentemail = '".$_SESSION["userid"]."')";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row["dateadded"] == "" || $row["date_added"] == "0000-00-00" || $date < $row["dateadded"])
			return true;
		else
			return false;
	}
	function validSchool($connid,$cls)
	{
		$schoolCodeStr = $this->generateSchoolsList($connid);
		$query = "SELECT count(srno) 
				  FROM aqad_registrationDetails_temp
				  WHERE unsubscribe=0 AND (mailsent=0 OR mailsent=1) 
				  AND (studentemail = '".$_SESSION["userid"]."' OR parentemail = '".$_SESSION["userid"]."') 
				  AND class='".$cls."' 
				  AND school_code in (".$schoolCodeStr.",999999,989999,777777) AND (end_date >= CURDATE() OR end_date = '0000-00-00') ";
				  
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] > 0)
			return false;
		else
			return true;
	}
	function generateSchoolsList($connid)
	{
		$schoolCodeStr ='';
		$query = "SELECT school_code FROM school_status WHERE test_edition IN('R','S') AND (aro_form_date<>0 or paid>0 or ssf_number<>'') UNION select schoolno as school_code FROM schools WHERE region = 'Foreign' ";
		$dbquery = new dbquery($query,$connid);
		while ($row = $dbquery->getrowarray()) {
			$schoolCodeStr .= $row['school_code'].",";
		}
		$schoolCodeStr = substr($schoolCodeStr,0,-1);
		//echo $schoolCodeStr;
		return $schoolCodeStr;
	}
	function generateAQADtemplate($connid,$day,$cls)
	{
			$message = "";
			$qno = 0;
			$subject_arr = array("","English", "Maths", "Science","Social Studies");
			//$today = date("2010-06-25");
			$today = date("Y-m-d");
			
			$current_time=mktime(0,0,0,substr($day,5,2),substr($day,8,2),substr($day,0,4));
			
			# figure out what 1 days is in seconds
			$one_day = 1 * 24 * 60 * 60;
			$two_day = 2 * 24 * 60 * 60;
			$three_day = 3 * 24 * 60 * 60;
			$title = "Yesterday's Question";
			# make last day date based on a past timestamp
			if(date("D",$current_time)=="Sun")
			{
				echo "Selected date is a sunday and AQAD is not sent on sundays";
				return;
				//continue;
			}
			if($cls == "3" || $cls == "4" || $day <= '2010-06-28')
			{
				if(date("D",$current_time)=="Sat")
				{
					echo "Selected date is a saturday and AQAD is not sent on saturdays for class 3 and 4";
					return;
					//continue;
				}
				elseif(date("D",$current_time)=="Mon")
				{
					$yesterday = date( "Y-m-d", ( $current_time - $three_day ) );
					$title = "Friday's Question";
				}
				else 
				{
					$yesterday = date( "Y-m-d", ( $current_time - $one_day ) );
					$title = "Yesterday's Question";
				}	
			}
			else
			{
				if(date("D",$current_time)=="Mon")
				{
					$yesterday = date( "Y-m-d", ( $current_time - $two_day ) );
					$title = "Saturday's Question";
				}
				else 
				{
					$yesterday = date( "Y-m-d", ( $current_time - $one_day ) );
					$title = "Yesterday's Question";
				}	
			}
			
			
			$today_question_query = "SELECT id,papercode,qno FROM aqad_master where date='".$day."' and class='".$cls."'";
			$today_question_dbquery = new dbquery($today_question_query,$connid);
			$today_question = $today_question_dbquery->getrowarray();
			$papercode = $today_question['papercode'];
			$qno = $today_question['qno'];
			$srno = $today_question['id'];
			
			$strqry = "SELECT q.qcode,papercode,class,subjectno,qno,question,optiona,optionb,optionc,optiond
				FROM questions q, paper_master pm WHERE q.qcode=pm.qcode and papercode='".$papercode."' AND qno=".$qno;
		
			//echo "$str<br>";
		
			$dbqueryqry = new dbquery($strqry,$connid);
			$line=$dbqueryqry->getrowarray();
			
			// Group query
			$grpquery = "SELECT aqad_group_text FROM aqad_grouptext WHERE qcode = '".$line["qcode"]."' ";	
			$dbquerygrp = new dbquery($grpquery,$connid);
			$grouptext = $dbquerygrp->getrowarray();
			
				
			//$class=$line['class'];
			$class = substr($line['papercode'],1,1);
		
			$round=substr($line['papercode'],2,1);
		
			$subjectno = $line['subjectno'];
			// Appending the group text to the question //
			if($grouptext != "")	
				$question = $grouptext."<br>".$line['question'];
			else
				$question = $line['question'];
				
			$question = str_replace("^", "'",$question);
			$optiona = $line['optiona'];
			$optiona = str_replace("^", "'",$optiona);
			$optionb = $line['optionb'];
			$optionb = str_replace("^", "'",$optionb);
			$optionc = $line['optionc'];
			$optionc = str_replace("^", "'",$optionc);
			$optiond = $line['optiond'];
			$optiond = str_replace("^", "'",$optiond);
		
			if($this->action != 'PrintData')
					$message.="<div class='theading' align='right'>Please <a href=\"javascript:openNewWindow('".$this->formatDate($day)."','".$cls."')\">Click Here</a> to save as PDF and to take the print<br><input type=\"hidden\" name=\"clsaqad_hdnsrno\" value='".$srnumber."'></div>";
			$message.="<br>";
			$message.="<table width=\"60%\"  style=\"border: 1px solid rgb(0, 0, 0); font-family: Arial; font-size: 12pt;\" align=\"center\" bgcolor=\"#ffffff\" border=\"0\" cellspacing=\"0\">";
			$message.="<tr><td colspan=\"3\"><BLOCKQUOTE> <P><font face=\"Arial\"><BR>";
				
				if($subjectno==1)
					$imgfolder	= "Round".$round."/english_images/class".$class;
				elseif($subjectno==2)
					$imgfolder	= "Round".$round."/MATHS_IMAGES/class".$class;
				elseif($subjectno==3)
					$imgfolder	= "Round".$round."/sci_images/class".$class;
				elseif($subjectno==4)
					$imgfolder	= "Round".$round."/social_images/class".$class;
				 		          
		       	$question = $this->orig_to_html($line['question'],$imgfolder);
				$question = str_replace("^", "'",$question);
				
															
				$optiona = $this->orig_to_html($line['optiona'],$imgfolder);
				$optiona = str_replace("^", "'",$optiona);
				$optionb = $this->orig_to_html($line['optionb'],$imgfolder);
				$optionb = str_replace("^", "'",$optionb);
				$optionc = $this->orig_to_html($line['optionc'],$imgfolder);
				$optionc = str_replace("^", "'",$optionc);
				$optiond = $this->orig_to_html($line['optiond'],$imgfolder);
				$optiond = str_replace("^", "'",$optiond);
				
											
				$header ="<div align=center><img src='http://www.educationalinitiatives.com/mailers/question_a_day/images/aqad_logo_banner.jpg' BORDER=1 width='70%' align='absmiddle'></div>
				<center>Class $class | $subject_arr[$subjectno]</center><br>";
				
				$header .= $question."<br><br>";
				
				if(strpos($optiona,".jpg") || strpos($optionb,".jpg") || strpos($optionc,".jpg") || strpos($optiond,".jpg"))
				{
					$header .= "<table style='font-family: Arial; font-size: 12pt;' width=596><tr><td>A. ".$optiona."</td><td>B. ".$optionb."</td></tr><tr><td>C. ".$optionc."</td><td>D. ".$optiond."</td></tr></table><br>";
				}
				else 
				{
					$header .= "A. ".$optiona."<br>";
					$header .= "B. ".$optionb."<br>";
					$header .= "C. ".$optionc."<br>";
					$header .= "D. ".$optiond."<br>";
				}
				$message.=$header;
				
		      $message.="</FONT></P></BLOCKQUOTE>";
			  $message.="</td>";
			  $message.="</tr>";
		  
		  
		
		 	$yesterday_question_query = "SELECT papercode,qno FROM aqad_master where date='".$yesterday."' and class='".$cls."'";
			$yesterday_question_dbquery = new dbquery($yesterday_question_query,$connid) or die("Yesterday-".mysql_error());
			$yesterday_question = $yesterday_question_dbquery->getrowarray();
			$papercode = $yesterday_question['papercode'];
			$qno = $yesterday_question['qno'];
		
		  $str = "SELECT q.qcode,papercode,class,subjectno,qno,question,optiona,optionb,optionc,optiond,
			correct_answer FROM questions q, paper_master pm WHERE q.qcode=pm.qcode and papercode='".$papercode."' AND qno=".$qno;
		
			//echo "$str<br>";
		
			$dbquery =new dbquery($str,$connid);
				
			$line=$dbquery->getrowarray();
		
			$class=$line['class'];
		
			$round=substr($line['papercode'],2,1);
		
			$subjectno = $line['subjectno'];
			
			$question = $line['question'];
			$question = str_replace("^", "'",$question);
			$optiona = $line['optiona'];
			$optiona = str_replace("^", "'",$optiona);
			$optionb = $line['optionb'];
			$optionb = str_replace("^", "'",$optionb);
			$optionc = $line['optionc'];
			$optionc = str_replace("^", "'",$optionc);
			$optiond = $line['optiond'];
			$optiond = str_replace("^", "'",$optiond);
					
			$correct_answer = $line['correct_answer'];
			
			$message.="<tr> ";
			$message.="<td colspan=\"3\">";
			$message.="<BLOCKQUOTE><P><font face=\"Arial\"><BR>";
          		if($subjectno==1)
					$imgfolder	= "Round".$round."/english_images/class".$class;
				elseif($subjectno==2)
					$imgfolder	= "Round".$round."/MATHS_IMAGES/class".$class;
				elseif($subjectno==3)
					$imgfolder	= "Round".$round."/sci_images/class".$class;
				elseif($subjectno==4)
					$imgfolder	= "Round".$round."/social_images/class".$class;
							
		        $question = $this->orig_to_html($line['question'],$imgfolder);
				$question = str_replace("^", "'",$question);
				
				
				$optiona = $this->orig_to_html($line['optiona'],$imgfolder);
				$optiona = str_replace("^", "'",$optiona);
				$optionb = $this->orig_to_html($line['optionb'],$imgfolder);
				$optionb = str_replace("^", "'",$optionb);
				$optionc = $this->orig_to_html($line['optionc'],$imgfolder);
				$optionc = str_replace("^", "'",$optionc);
				$optiond = $this->orig_to_html($line['optiond'],$imgfolder);
				$optiond = str_replace("^", "'",$optiond);
				
							
				$correct_answer = $line['correct_answer'];
				
				$header = "<hr WIDTH=100% color=gray align=middle><br><center> $title | Class $class | $subject_arr[$subjectno]</center><br>"; //  | $papercode - $qno
				
				$header .= $question."<br><br>";
								
				$header .= "<table style='font-family: Arial; font-size: 12pt;' width=596><tr><td>A. ".$optiona."</td><td>B. ".$optionb."</td></tr><tr><td>C. ".$optionc."</td><td>D. ".$optiond."</td></tr></table>";
				
				$header .= "<br><div>Correct Answer : <b>".$correct_answer."</b></div>";
				
				$message.=$header;
				
				$message.="</FONT></P></BLOCKQUOTE><br></td></tr>";
				$footer = "</table><br>";
				
				$message.=$footer;
				return $message;
		       
	}
	function getClasses($connid)
	{
		$arrRet = array();
		$query = "SELECT class FROM aqad_registrationDetails_temp WHERE (studentemail = '".$_SESSION["userid"]."' OR parentemail = '".$_SESSION["userid"]."')";	
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[] = $row["class"];
		}
		return $arrRet;
	}
	function orig_to_html($orig,$img_folder)
	{	$pattern[0] = "/\[([a-z0-9_\.]*)\]/i";
		$replacement[0] = "<img src='http://www.assetonline.in/asset_online/$img_folder/\$1'>";
		//$pattern[1] = "/\[([a-z0-9_\.]*)[ ]*,[ ]*(.*)\]/i";
		$pattern[1] = "/\[([a-z0-9_\.]*)[ ]*,[ ]*(.[^\]]*)\]/i";
		$replacement[1] = "<img src='http://www.assetonline.in/asset_online/$img_folder/\$1' height=\$2>";
		$pattern[2] = "/\r\n/";
		$replacement[2] = "<br>\n";
		$html_ver = preg_replace($pattern, $replacement, $orig);
		return ($html_ver);
	}
	function formatDate($oldformat) // function which converts yyyy-mm-dd to dd/mm/yyyy format
	{
	
		$dateParameters=explode("-",$oldformat);
	
		$newformat=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
	
		return $newformat;
	
	}
	function validateChangePassword($connid)
	{
		$query = "SELECT count(*) FROM aqad_loginDetails WHERE emailid = '".$_SESSION["userid"]."' AND password = '".$this->oldpassword."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		if($row[0] > 0)
			return true;
		else
			return false;
	}
	function changePassword($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		if($this->action == "ChangePassword")
		{
			if($this->validateChangePassword($connid))
			{
				$query = "UPDATE aqad_loginDetails SET password = '".$this->newpassword."' WHERE emailid = '".$_SESSION["userid"]."' AND password = '".$this->oldpassword."' LIMIT 1";
				$dbquery = 	new dbquery($query,$connid);
				echo "<div align=center><font color=red face=arial size=2>Your Password has been updated as: ".$this->newpassword."</font></div><br>";
			}
		}
	}
	function saveUsageDetails($connid,$srno)
	{
		$query = "INSERT INTO aqad_usageDetails SET emailid = '".$_SESSION["userid"]."',aqad_id = '".$srno."',entered_dt = NOW() ";
		$dbquery = new dbquery($query,$connid);
	}
	function generatePDFversion($connid,$day,$cls)
	{
		//$message = $this->generateAQADtemplate($connid,$date,$class);
		//echo $message;
		/****Configuration***/
		$page_width = 595;
		$page_height = 842;
		$fontsize=10;
		$fontname="Dejavu";
		$right_margin = 36;
		$top_margin    = 40+$fontsize;
		$bottom_margin = 36;
		$xpos  = 63.21;
		$left_margine  = 63.21;
		$ypos  = $page_height-$top_margin;
		$break=15;
		$header_height=15;
		$header_break=30;
		$rect_width=15;
		$rect_height=12;
		$optionformat = "A";      // If A than option will be A, B, C, D. If 1 than options will be 1, 2, 3, 4
		$questionstem = 1;
		$pageno=1;
		$tblborder=0.5;
		$considerImgFactor = 0;  // 0 means 90 DPI images, 1 means 150 DPI images
		$resizedimages = array();
		$arrangeoptions=1;
		
		$subject_arr = array("","English", "Maths", "Science","Social Studies");
		//$today = date("2010-06-25");
		$today = date("Y-m-d");
		
		$current_time=mktime(0,0,0,substr($day,5,2),substr($day,8,2),substr($day,0,4));
		
		# figure out what 1 days is in seconds
		$one_day = 1 * 24 * 60 * 60;
		$two_day = 2 * 24 * 60 * 60;
		$three_day = 3 * 24 * 60 * 60;
		$title = "Yesterday's Question";
		# make last day date based on a past timestamp
		if(date("D",$current_time)=="Sun")
		{
			echo "Selected date is a sunday and AQAD is not sent on sundays";
			return;
			//continue;
		}
		if($cls == "3" || $cls == "4" || $day <= '2010-06-28')
		{
			if(date("D",$current_time)=="Sat")
			{
				echo "Selected date is a saturday and AQAD is not sent on saturdays for class 3 and 4";
				return;
				//continue;
			}
			elseif(date("D",$current_time)=="Mon")
			{
				$yesterday = date( "Y-m-d", ( $current_time - $three_day ) );
				$title = "Friday's Question";
			}
			else 
			{
				$yesterday = date( "Y-m-d", ( $current_time - $one_day ) );
				$title = "Yesterday's Question";
			}	
		}
		else
		{
			if(date("D",$current_time)=="Mon")
			{
				$yesterday = date( "Y-m-d", ( $current_time - $two_day ) );
				$title = "Saturday's Question";
			}
			else 
			{
				$yesterday = date( "Y-m-d", ( $current_time - $one_day ) );
				$title = "Yesterday's Question";
			}	
		}
		
		
		$today_question_query = "SELECT id,papercode,qno FROM aqad_master where date='".$day."' and class='".$cls."'";
		$today_question_dbquery = new dbquery($today_question_query,$connid);
		$today_question = $today_question_dbquery->getrowarray();
		$papercode = $today_question['papercode'];
		$qnumber = $today_question['qno'];
		$srnumber = $today_question['id'];
		
		$strqry = "SELECT q.qcode,papercode,class,subjectno,qno,question,optiona,optionb,optionc,optiond
			FROM questions q, paper_master pm WHERE q.qcode=pm.qcode and papercode='".$papercode."' AND qno=".$qnumber;
	
		//echo "$str<br>";
	
		$dbqueryqry = new dbquery($strqry,$connid);
		
		$line=$dbqueryqry->getrowarray();
		// Group query
		$grpquery = "SELECT aqad_group_text FROM aqad_grouptext WHERE qcode = '".$line["qcode"]."' ";	
		$dbquerygrp = new dbquery($grpquery,$connid);
		$grouptext = $dbquerygrp->getrowarray();	
		//$class=$line['class'];
		$class = substr($line['papercode'],1,1);
	
		$round=substr($line['papercode'],2,1);
	
		$subjectno = $line['subjectno'];
		
		if($grouptext["aqad_group_text"] != "")	
			$question = $grouptext["aqad_group_text"]."<br>".$line['question'];
		else
			$question = $line['question'];
			
		$question = str_replace("^", "'",$question);
		$optiona = $line['optiona'];
		$optiona = str_replace("^", "'",$optiona);
		$optionb = $line['optionb'];
		$optionb = str_replace("^", "'",$optionb);
		$optionc = $line['optionc'];
		$optionc = str_replace("^", "'",$optionc);
		$optiond = $line['optiond'];
		$optiond = str_replace("^", "'",$optiond);
		
		// PDF writing starts here //
		$pdf = pdf_new();
		PDF_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 8
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");
		$filename = $day."-".$cls;
		pdf_open_file($pdf, $_SERVER['DOCUMENT_ROOT']."/aqad/PDF/".$filename.".pdf");
		$fontdir = $_SERVER['DOCUMENT_ROOT']."/fonts";
		pdf_set_parameter($pdf, "FontOutline", "Dejavu=$fontdir/DejaVuSans.ttf");
		$font = pdf_findfont($pdf, "Dejavu", "host",1);
		pdf_set_parameter($pdf, "FontOutline", "Dejavu Bold=$fontdir/DejaVuSans-Bold.ttf");
		$font_bold = pdf_findfont($pdf, "Dejavu Bold", "host",1);
		pdf_set_parameter($pdf, "FontOutline", "Dejavu Italic=$fontdir/DejaVuSans-Oblique.ttf");
		$fontitalic_normal = pdf_load_font($pdf, "Dejavu Italic", "host","");
		pdf_begin_page($pdf, $page_width, $page_height);
		
		$prevgroupid = -1;
		$prevpassageid = 0;
		$srno = 1;
		$buffersize = 0;
		$isGroupText=0;
		//$objQuestion = new clsdaquestion();
		//$objQuestion->populateQuestion($connid,$qcode);
		$qcodestr='';
		$isFirstPassgeQuestion=0;
			$groupid=0;
			$prevpassageid=0;
			
			$prevYpos=$ypos;
			$line_width=131;
		$header_top_margin=35.7;
		$ypos-=$header_top_margin;

		//echo "<br>Version : ".$version."-- Qno : ".$qno." -- PID : ".$objQuestion->passage_id." -- GID".$groupid;
			$qcodestr = $question."##&&".$optiona."##&&".$optionb."##&&".$optionc."##&&".$optiond;
			$qcodestr = str_replace("‘","'",$qcodestr);
			$qcodestr = str_replace("’","'",$qcodestr);
			$qcodestr = str_replace("–","-",$qcodestr);
			$qcodestr = str_replace("…","...",$qcodestr);
			$qcodestr = str_replace("Æ","'",$qcodestr);
			$qcodestr = str_replace("&nbsp;"," ",$qcodestr);
			$qcodestr = str_replace("·",".",$qcodestr);
			$qcodestr = str_ireplace("</DIV>","<br>",$qcodestr);
			
			$imagepathfrom = 3;    // 1: DA questions and group text images, 2: DA passage images, 3: ASSET images
		$ypos_returned = array();
		$ypos_returned[0] = 0;
		$ypos_returned[1] = 0;
		//echo $_SERVER['DOCUMENT_ROOT']."/aqad/images/new_aqad_header.JPG";
		$logo_image = pdf_load_image($pdf, "jpeg", $_SERVER['DOCUMENT_ROOT']."/aqad/images/new_aqad_header.JPG", "");
		pdf_fit_image($pdf,$logo_image, $xpos+60, $ypos, "scale 1");
		
		$ypos-=$break;
		
		$sub_class_str = "Class ".$class." | ".$subject_arr[$subjectno];
		pdf_setfont($pdf, $font_bold, 10);
		pdf_show_xy($pdf,$sub_class_str,$xpos+190,$ypos-16);
		pdf_setrgbcolor($pdf, 0, 0, 0);
		
		$ypos-=40;
		
		$ypos_returned = autoPublishPaper($pdf,$qcodestr,$xpos,$ypos,$right_margin,$page_width,$page_height,$top_margin,$bottom_margin,$buffersize,$imagepathfrom,$optionformat,$questionstem,$fontsize,$fontname,$tblborder,$left_margine,$considerImgFactor,$resizedimages,$arrangeoptions);
		$ypos = $ypos_returned[0];
		$isNewPage=$ypos_returned[1];
		
		if($isNewPage==1) $ypos=$page_height-$top_margin; else $ypos=$prevYpos;
		$ypos+=5;
		pdf_setrgbcolor_fill($pdf, 0, 0, 0);
		
		//qno formatting
		//if($qno>9) $space=33; else $space=28;
		pdf_setfont($pdf, $font_bold, 15);
		pdf_show_xy($pdf,"Q ",$xpos-33,$ypos-108);
		pdf_setrgbcolor($pdf, 0, 0, 0);
		
		/*pdf_setlinewidth($pdf,0.5);
		   pdf_moveto($pdf,$xpos-$space,$ypos+8.5);
		pdf_lineto($pdf,$xpos-5,$ypos+8.5);
		   pdf_stroke($pdf);*/
		
		/*pdf_setlinewidth($pdf,0.5);
		   pdf_moveto($pdf,$xpos-$space,$ypos-9);
		pdf_lineto($pdf,$xpos-5,$ypos-9);
		   pdf_stroke($pdf);*/
		   $ypos=$ypos_returned[0]-10;
		pdf_setdash($pdf,0,0);
		$ypos-=$break;
		
		$yesterday_question_query = "SELECT papercode,qno FROM aqad_master where date='".$yesterday."' and class='".$cls."'";
		$yesterday_question_dbquery = new dbquery($yesterday_question_query,$connid) or die("Yesterday-".mysql_error());
		$yesterday_question = $yesterday_question_dbquery->getrowarray();
		$papercode = $yesterday_question['papercode'];
		$qnumber = $yesterday_question['qno'];
		
		$str = "SELECT q.qcode,papercode,class,subjectno,qno,question,optiona,optionb,optionc,optiond,
			correct_answer FROM questions q, paper_master pm WHERE q.qcode=pm.qcode and papercode='".$papercode."' AND qno=".$qnumber;
		
		//echo "$str<br>";
		
		$dbquery =new dbquery($str,$connid);
		$line=$dbquery->getrowarray();
		
		// Group query
		$ygrpquery = "SELECT aqad_group_text FROM aqad_grouptext WHERE qcode = '".$line["qcode"]."' ";	
		$dbquery_ygrp = new dbquery($ygrpquery,$connid);
		$ygrouptext = $dbquery_ygrp->getrowarray();
		
		$class=$line['class'];
		$round=substr($line['papercode'],2,1);
		$subjectno = $line['subjectno'];
		
		$ypos-=$break;
		
		$yes_sub_class_str = "Yesterday's Question | Class ".$class." | ".$subject_arr[$subjectno];
		
		pdf_setfont($pdf, $font_bold, 10);
		pdf_show_xy($pdf,$yes_sub_class_str,$xpos+150,$ypos-46);
		pdf_setrgbcolor($pdf, 0, 0, 0);
		$ypos-=$break;
		if($ygrouptext["aqad_group_text"] != "")
			$question = $ygrouptext["aqad_group_text"]."<br>".$line['question'];
		else
			$question = $line['question'];
		$question = str_replace("^", "'",$question);
		$optiona = $line['optiona'];
		$optiona = str_replace("^", "'",$optiona);
		$optionb = $line['optionb'];
		$optionb = str_replace("^", "'",$optionb);
		$optionc = $line['optionc'];
		$optionc = str_replace("^", "'",$optionc);
		$optiond = $line['optiond'];
		$optiond = str_replace("^", "'",$optiond);
				
		$correct_answer = $line['correct_answer'];
		pdf_setlinewidth($pdf,0.5);
	    pdf_moveto($pdf,$xpos,$ypos-9);
		pdf_lineto($pdf,$page_width-$right_margin,$ypos-9);
	   	pdf_stroke($pdf);
		$ypos-=54.58;
		//echo "<br>Version : ".$version."-- Qno : ".$qno." -- PID : ".$objQuestion->passage_id." -- GID".$groupid;
		$qcodestr = $question."##&&".$optiona."##&&".$optionb."##&&".$optionc."##&&".$optiond;
		$qcodestr = str_replace("‘","'",$qcodestr);
		$qcodestr = str_replace("’","'",$qcodestr);
		$qcodestr = str_replace("–","-",$qcodestr);
		$qcodestr = str_replace("…","...",$qcodestr);
		$qcodestr = str_replace("Æ","'",$qcodestr);
		$qcodestr = str_replace("&nbsp;"," ",$qcodestr);
		$qcodestr = str_replace("·",".",$qcodestr);
		$qcodestr = str_ireplace("</DIV>","<br>",$qcodestr);
		
		
	   		
		$ypos_returned = autoPublishPaper($pdf,$qcodestr,$xpos,$ypos,$right_margin,$page_width,$page_height,$top_margin,$bottom_margin,$buffersize,$imagepathfrom,$optionformat,$questionstem,$fontsize,$fontname,$tblborder,$left_margine,$considerImgFactor,$resizedimages,$arrangeoptions);
		$ypos = $ypos_returned[0];
		$isNewPage=$ypos_returned[1];
		$ypos=$ypos_returned[0]-10;
		// Closing the pdf parameters
		$ypos-=$break;
		
		pdf_setfont($pdf, $font_bold, 12);
		pdf_show_xy($pdf,"Correct Answer : ".$correct_answer,$xpos-33,$ypos-108);
		pdf_setrgbcolor($pdf, 0, 0, 0);
		pdf_end_page($pdf);
		pdf_close($pdf);
	}
	function getPDFforDates($connid,$day1,$day2)
	{
		$page_width = 595;
		$page_height = 842;
		$fontsize=10;
		$fontname="Dejavu";
		$right_margin = 36;
		$top_margin    = 40+$fontsize;
		$bottom_margin = 36;
		$xpos  = 63.21;
		$left_margine  = 63.21;
		$ypos  = $page_height-$top_margin;
		$break=15;
		$header_height=15;
		$header_break=30;
		$rect_width=15;
		$rect_height=12;
		$optionformat = "A";      // If A than option will be A, B, C, D. If 1 than options will be 1, 2, 3, 4
		$questionstem = 1;
		$pageno=1;
		$tblborder=0.5;
		$considerImgFactor = 0;  // 0 means 90 DPI images, 1 means 150 DPI images
		$resizedimages = array();
		$arrangeoptions=1;
		
		$subject_arr = array("","English", "Maths", "Science","Social Studies");
		//$today = date("2010-06-25");
		$today = date("Y-m-d");
		
		$current_time=mktime(0,0,0,substr($day,5,2),substr($day,8,2),substr($day,0,4));
		
		# figure out what 1 days is in seconds
		$one_day = 1 * 24 * 60 * 60;
		$two_day = 2 * 24 * 60 * 60;
		$three_day = 3 * 24 * 60 * 60;
		$title = "Yesterday's Question";
		# make last day date based on a past timestamp
		$pdf = pdf_new();
		PDF_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 8
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");
		$filename = $day1."_to_".$day2;
		//echo $filename;exit();
		pdf_open_file($pdf, $_SERVER['DOCUMENT_ROOT']."/aqad/PDF/".$filename.".pdf");
		$fontdir = $_SERVER['DOCUMENT_ROOT']."/fonts";
		pdf_set_parameter($pdf, "FontOutline", "Dejavu=$fontdir/DejaVuSans.ttf");
		$font = pdf_findfont($pdf, "Dejavu", "host",1);
		pdf_set_parameter($pdf, "FontOutline", "Dejavu Bold=$fontdir/DejaVuSans-Bold.ttf");
		$font_bold = pdf_findfont($pdf, "Dejavu Bold", "host",1);
		pdf_set_parameter($pdf, "FontOutline", "Dejavu Italic=$fontdir/DejaVuSans-Oblique.ttf");
		$fontitalic_normal = pdf_load_font($pdf, "Dejavu Italic", "host","");
		$logo_image = pdf_load_image($pdf, "jpeg", $_SERVER['DOCUMENT_ROOT']."/aqad/images/new_aqad_header.JPG", "");
		pdf_begin_page($pdf, $page_width, $page_height);
		
		for ($cls=3;$cls<=9;$cls++)
		{
		
			if(date("D",$current_time)=="Sun")
			{
				continue;
			}
			if($cls == "3" || $cls == "4" || $day <= '2010-06-28')
			{
				if(date("D",$current_time)=="Sat")
				{
					continue;
				}
			}
			$papercodearr = array();
			$qnumberarr = array();
			$srnumberarr = array();
			$today_question_query = "SELECT id,papercode,qno FROM aqad_master where date>='".$day1."' and date<='".$day2."' and class='".$cls."'";
			$today_question_dbquery = new dbquery($today_question_query,$connid);
			while ($today_question = $today_question_dbquery->getrowarray()){
				$papercodearr[$today_question['papercode']] = $today_question['papercode'];
				$qnumberarr[$today_question['papercode']] = $today_question['qno'];
				$srnumberarr[$today_question['papercode']] = $today_question['id'];
			}
			
			//print_r ($papercodearr);
			
			foreach ($papercodearr as $key=>$papercode)
			{
				$strqry = "SELECT q.qcode,papercode,class,subjectno,qno,question,optiona,optionb,optionc,optiond
					FROM questions q, paper_master pm WHERE q.qcode=pm.qcode and papercode='".$papercode."' AND qno=".$qnumberarr[$key]." LIMIT 1";
			
				//echo "$str<br>";
			
				$dbqueryqry = new dbquery($strqry,$connid);
				
				while ($line=$dbqueryqry->getrowarray()){
				//while ($line) {
					
					$query = "SELECT aqad_group_Text FROM aqad_grouptext WHERE qcode='".$line['qcode']."'";
					$result=mysql_query($query) or die(mysql_error());
					$row = mysql_fetch_array($result);
					$grouptext = $row[0];
					//echo "<br>group Text: $grouptext";
					//$class=$line['class'];
					$class = substr($line['papercode'],1,1);
				
					$round=substr($line['papercode'],2,1);
				
					$subjectno = $line['subjectno'];
						
					$question = $line['question'];
					$question = str_replace("^", "'",$question);
					$optiona = $line['optiona'];
					$optiona = str_replace("^", "'",$optiona);
					$optionb = $line['optionb'];
					$optionb = str_replace("^", "'",$optionb);
					$optionc = $line['optionc'];
					$optionc = str_replace("^", "'",$optionc);
					$optiond = $line['optiond'];
					$optiond = str_replace("^", "'",$optiond);
					
					$prevgroupid = -1;
					$prevpassageid = 0;
					$srno = 1;
					$buffersize = 1;
					$isGroupText=0;
					//$objQuestion = new clsdaquestion();
					//$objQuestion->populateQuestion($connid,$qcode);
					$qcodestr='';
					$isFirstPassgeQuestion=0;
					$groupid=0;
					$prevpassageid=0;
					
					$prevYpos=$ypos;
					$line_width=131;
					$header_top_margin=35.7;
					//$ypos-=$header_top_margin;
		
					//echo "<br>Version : ".$version."-- Qno : ".$qno." -- PID : ".$objQuestion->passage_id." -- GID".$groupid;
					/*if (!empty($grouptext) && $grouptext!='')
						$qcodestr = $grouptext."##&&".$question."##&&".$optiona."##&&".$optionb."##&&".$optionc."##&&".$optiond;
					else */
					
					if ($grouptext!='')
						$question = $grouptext."<p>".$question;
					
					$sub_class_str = "Class ".$class." | ".$subject_arr[$subjectno]." | (Qcode: ".$line['qcode'].")";
					$qcodestr = "<b>".$sub_class_str."</b><p>".$question."##&&".$optiona."##&&".$optionb."##&&".$optionc."##&&".$optiond;
					
					$qcodestr = str_replace("‘","'",$qcodestr);
					$qcodestr = str_replace("’","'",$qcodestr);
					$qcodestr = str_replace("–","-",$qcodestr);
					$qcodestr = str_replace("?","-",$qcodestr);
					$qcodestr = str_replace("?","",$qcodestr);
					$qcodestr = str_replace("…","...",$qcodestr);
					$qcodestr = str_replace("Æ","'",$qcodestr);
					$qcodestr = str_replace("á","",$qcodestr);
					$qcodestr = str_replace("&nbsp;"," ",$qcodestr);
					$qcodestr = str_replace("·",".",$qcodestr);
					$qcodestr = str_replace(" ?","&#181;",$qcodestr);
					$qcodestr = str_ireplace("</DIV>","<br>",$qcodestr);
					
					$imagepathfrom = 3;    // 1: DA questions and group text images, 2: DA passage images, 3: ASSET images
					$ypos_returned = array();
					$ypos_returned[0] = 0;
					$ypos_returned[1] = 0;
					//echo $_SERVER['DOCUMENT_ROOT']."/aqad/images/new_aqad_header.JPG";
					
					//pdf_fit_image($pdf,$logo_image, $xpos+60, $ypos, "scale 1");
					
					$ypos-=$break;
					//echo "<br><br><br>$qcodestr";
					if($ypos<=100)
					{
						pdf_end_page($pdf);
						pdf_begin_page($pdf, $page_width, $page_height);
						$ypos  = $page_height-$top_margin;
					}	
					//$sub_class_str = "Class ".$class." | ".$subject_arr[$subjectno]." | (Qcode | ".$line['qcode'].")";
					
					/*pdf_setfont($pdf, $font_bold, 10);
					pdf_show_xy($pdf,$sub_class_str,$xpos+190,$ypos-16);
					pdf_setrgbcolor($pdf, 0, 0, 0);*/
					
					pdf_setfont($pdf, $font_bold, 10);
					pdf_show_xy($pdf,"------------------------------------------------------------------------------------------------------------",$xpos,$ypos);
					pdf_setrgbcolor($pdf, 0, 0, 0);
					
					$ypos-=40;
					//echo $line['qcode']." - ".$qcodestr."<br><br>";
					//exit;
					
					
					/*pdf_setfont($pdf, $font_bold, 15);
					pdf_show_xy($pdf,"Q ",$xpos-33,$ypos);
					pdf_setrgbcolor($pdf, 0, 0, 0);*/
					
					$ypos_returned = autoPublishPaper($pdf,$qcodestr,$xpos,$ypos,$right_margin,$page_width,$page_height,$top_margin,$bottom_margin,$buffersize,$imagepathfrom,$optionformat,$questionstem,$fontsize,$fontname,$tblborder,$left_margine,$considerImgFactor,$resizedimages,$arrangeoptions);
					$ypos = $ypos_returned[0];
					$isNewPage=$ypos_returned[1];
					
					if($isNewPage==1) $ypos=$page_height-$top_margin; else $ypos=$prevYpos;
					$ypos+=5;
					pdf_setrgbcolor_fill($pdf, 0, 0, 0);
					
					//qno formatting
					//if($qno>9) $space=33; else $space=28;
					
					
					/*pdf_setlinewidth($pdf,0.5);
					   pdf_moveto($pdf,$xpos-$space,$ypos+8.5);
					pdf_lineto($pdf,$xpos-5,$ypos+8.5);
					   pdf_stroke($pdf);*/
					
					/*pdf_setlinewidth($pdf,0.5);
					   pdf_moveto($pdf,$xpos-$space,$ypos-9);
					pdf_lineto($pdf,$xpos-5,$ypos-9);
					   pdf_stroke($pdf);*/
					$ypos=$ypos_returned[0]-10;
					pdf_setdash($pdf,0,0);
					$ypos-=$break;
					//echo "in";exit();
					
				}
			}
		}
		pdf_end_page($pdf);
		pdf_close($pdf);
	}
}
?>