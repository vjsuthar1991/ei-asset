<?php
class clsdareports
{
	var $examcode;
	var $request_id;
	
	var $page_width;
	var $page_height;
	var $top_margin;
	var $left_margin;
	var $right_margin;
	var $bottom_margin;
	
	var $imagepathfrom;
	var $optionformat;
	var $questionstem;
	
	var $ansoptionarr = array();
	var $ansseqarr = array();
	var $subject_arr = array();
	
	var $font;
	var $fontsize;
	var $fontdir;
	var $fontbold;
	var $fontitalic;
	var $fontbolditalic;
	var $fontname;
	var $fontnamebold;

	
	function clsdareports()
	{
		$this->examcode = 0;
		$this->request_id = 0;
		
		$this->page_width = 595;
		$this->page_height = 842;
		$this->top_margin = 50;
		$this->bottom_margin = 50;
		$this->left_margin = 50;
		$this->right_margin = 50;
		
		$this->imagepathfrom = 1;
		$this->optionformat = 1;
		$this->questionstem = 0;
		
		$this->ansoptionarr = array("A","B","C","D");
		$this->ansseqarr = array("A"=>1,"B"=>2,"C"=>3,"D"=>4);
		$this->subject_arr = array(1 => 'English', 2=> 'Maths' , 3 => 'Science');
		
		$this->font = "";
		$this->fontbold = "";
		$this->fontitalic = "";
		$this->fontbolditalic = "";
		$this->fontname = "Dejavu";
		$this->fontnamebold = "Dejavu-Bold";
		$this->fontsize = "10";
		$this->fontdir = constant("PATH_PDFFONT");
	}

	function setpostvars()
	{
		if(isset($_POST["subjectno"])) $this->subjectno = $_POST["subjectno"];
	}

	function setgetvars()
	{
		if(isset($_GET["subjectno"])) $this->subjectno = $_GET["subjectno"];
	}
	
	function LoadpdfFont($pdf,$font="Verdana")
	{
		if($pdf == "") return;
		
		if($font == "Arial")
		{
			pdf_set_parameter($pdf, "FontOutline", "Arial=$this->fontdir/arial.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Arial-Bold=$this->fontdir/arialbd.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Arial Italic=$this->fontdir/ariali.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Arial Bold Italic=$this->fontdir/arialbi.ttf");
			
			$this->font = pdf_load_font($pdf, "Arial", "host","");
			$this->fontbold = pdf_load_font($pdf, "Arial-Bold", "host","");
			$this->fontitalic = pdf_load_font($pdf, "Arial Italic", "host","");
			$this->fontbolditalic = pdf_load_font($pdf, "Arial Bold Italic", "host","");
		}
		elseif($font == "Verdana")
		{
			
			pdf_set_parameter($pdf, "FontOutline", "Verdana=".$this->fontdir."/verdana.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Verdana-Bold=".$this->fontdir."/verdanab.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Verdana Italic=".$this->fontdir."/verdanai.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Verdana Bold Italic=".$this->fontdir."/verdanaz.ttf");
			
			$this->font = pdf_load_font($pdf, "Verdana", "host","");
			$this->fontbold = pdf_load_font($pdf, "Verdana-Bold", "host","");
			$this->fontitalic = pdf_load_font($pdf, "Verdana Italic", "host","");
			$this->fontbolditalic = pdf_load_font($pdf, "Verdana Bold Italic", "host","");
		}
		elseif($font == "Dejavu")
		{
		    pdf_set_parameter($pdf, "FontOutline", "Dejavu=$this->fontdir/DejaVuSans.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Dejavu-Bold=$this->fontdir/DejaVuSans-Bold.ttf");
		    pdf_set_parameter($pdf, "FontOutline", "Dejavu-Italic=$this->fontdir/DejaVuSans-Oblique.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Dejavu-Bold-Italic=$this->fontdir/DejaVuSans-BoldOblique.ttf");
			
		    $this->font = pdf_load_font($pdf, "Dejavu", "unicode","");
			$this->fontbold = pdf_load_font($pdf, "Dejavu-Bold", "unicode","");
			$this->fontitalic = pdf_load_font($pdf, "Dejavu-Italic", "unicode","");
			$this->fontbolditalic = pdf_load_font($pdf, "Dejavu-Bold-Italic", "unicode","");
		}	
	}
	
	
	function getTopicWisePerfoBarGraph($pdf,$ypos,$nooftopics,$noofsection,$linetype = 'dotted',$topicarr,$sectionarr,$actualheight,$buffersize=0)
	{
		
		#echo "<br> Starting Ypos".$ypos;
		$fontsize = $this->fontsize;
		$returntocalling = array();
		$ypos = $ypos - $buffersize;
		
		$assumed_height = ((($noofsection * 5) + 10) * $nooftopics) + 30 + $buffersize;
		$neededheight = $ypos - $assumed_height;
		
		if($neededheight < $this->bottom_margin) {
			
			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			
			$this->LoadpdfFont($pdf,$this->fontname);
			
			pdf_setfont($pdf, $this->font, $fontsize);

			$xpos = $this->left_margin;		   // Left margine
			$ypos = $this->page_height-$this->top_margin-$buffersize;  // Top margine
			
			$yposbefore = $ypos;
			
			if($newpageflag==0)
				$newpageflag=1;
		}
		
		########## Grid Generation ##########
		pdf_setlinewidth($pdf,0.5);
		pdf_setrgbcolor($pdf,0.0, 0.0, 0.0);
		
		if($linetype == 'dotted')
			pdf_setdashpattern($pdf,"dasharray={2 2}");
			
		$StartXgrid = 240; # Given Hardcoded as we know previousaly it was 210
		$StartYgrid = $ypos - 5;
		
		$gridExpandby = 22;
		$numb = (($noofsection * 5) + 10) * $nooftopics;
		$gridHeight = $numb;		
		
		$gridypos = $StartYgrid - $gridHeight;
		$gridxpos = $StartXgrid;
			
		for($i=0;$i<=10;$i++){
				
			pdf_moveto($pdf,$gridxpos,$StartYgrid);
			pdf_lineto($pdf,$gridxpos,$gridypos);
			pdf_stroke($pdf);
			$gridxpos += 20;
		}
		
		####### END Of Grid Generation ######
		
		######## Lables Topics Left Hand Side Of Bar Graph ##########
		$fontsize = $this->fontsize - 3;		
		if(is_array($topicarr) && count($topicarr) > 0)
		{
			pdf_setfont($pdf, $this->font, 6);
			//$pos = $StartYgrid - (((($noofsection * 5) + 10)/2) + 2.5);
			$pos = $StartYgrid;
			//pdf_show_xy($pdf,$pos,70,505); //checking the position
			foreach($topicarr as $key => $value){
				
				//pdf_show_boxed($pdf, $value, 50, $pos, 180, 12, "right",''); // previousaly it was 50,180
				//pdf_fit_textline ($pdf,$value,52,$pos,"boxsize {180 10} position={right center} fontsize=10 fitmethod=entire");
				
				$res = pdf_add_textflow($pdf,0,$value,"fontname=$this->fontname fontsize=$fontsize encoding=unicode alignment=right leading=100%");
				pdf_fit_textflow($pdf,$res, 52, $pos, 235,10, "");
				pdf_delete_textflow($pdf,$res);
				
				$pos -= (($noofsection * 5) + 10);
			}
		}
		#############################################################
		
		############### Section Display ################
		$secdispXpos = $gridxpos; // previousaly it was +10
		$secdispYpos = $StartYgrid - 10;
		
		if(is_array($sectionarr) && count($sectionarr) > 0) {
			
			if($linetype == 'dotted')
				pdf_setdashpattern($pdf,"");
			
			
			foreach($sectionarr as $arr){
					
				if($arr['Color'] == 'Dark')
					pdf_setrgbcolor($pdf,0.4, 0.4, 0.4);
				else if($arr['Color'] == 'Light')
					pdf_setrgbcolor($pdf,0.6, 0.6, 0.6);
				else	
					pdf_setrgbcolor($pdf,0.1, 0.1, 0.1);
				
				pdf_rect($pdf,$secdispXpos,$secdispYpos,5,5);
				pdf_fill_stroke($pdf);
				
				pdf_show_xy($pdf,$arr['Name'],$secdispXpos+7,$secdispYpos);
				$secdispYpos -= 15;
				
			}
		}
		
		pdf_setrgbcolor($pdf,0.0, 0.0, 0.0);
		
		if($linetype == 'dotted')
				pdf_setdashpattern($pdf,"dasharray={2 2}");
				
		###############################################
		
		## printing number section
		pdf_moveto($pdf,$StartXgrid-3,$gridypos+2);
		pdf_lineto($pdf,$gridxpos-17,$gridypos+2);
		pdf_stroke($pdf);
			
		$j = $StartXgrid-2;
		$k = $gridypos-5;
		
		for($i=0;$i<=100;$i+=10){
			pdf_show_xy($pdf,$i,$j,$k);
			$j += 20;
		}
		## printing number section end
	
		if($linetype == 'dotted')
			pdf_setdashpattern($pdf,"");
		
		pdf_setlinewidth($pdf,'5');				
		$barYpos = $ypos - 10;
		//$pos = $ypos - 5;
		//$barYpos = $pos+8;
		
		$topic = 0;
		foreach($topicarr as $key => $value) {
			foreach($sectionarr as $arr){
		
				if($arr['Color'] == 'Dark')
					pdf_setrgbcolor($pdf,0.4, 0.4, 0.4);
				else if($arr['Color'] == 'Light')
					pdf_setrgbcolor($pdf,0.6, 0.6, 0.6);
				else	
					pdf_setrgbcolor($pdf,0.1, 0.1, 0.0);
										
				pdf_moveto($pdf,$StartXgrid,$barYpos);
				pdf_lineto($pdf,$StartXgrid+$arr[$key]*2,$barYpos);
				pdf_stroke($pdf);
				$pos -= 20;
				$barYpos -= 5;
			}
			$barYpos -= 10;
		
		}
		
		# Outside Box
		$lastposition = $ypos - $barYpos;
		pdf_setlinewidth($pdf, 0.9);
		pdf_setrgbcolor($pdf,0.0, 0.0, 0.0);
		pdf_rect($pdf, 50, $barYpos-20, 495, $lastposition+40);
		pdf_stroke($pdf);
		
		$returntocalling[0] = $barYpos-30;
		$returntocalling[1] = $newpageflag;
		
		//echo "<br> Ending Ypos ::".($barYpos);
		return $returntocalling;
	}
	
	function drawStudentAnswerTable($pdf,$ypos,$studentinfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$actualheight,$buffersize){
		
		//echo "<br> Starting Ypos".$ypos;
		$returnarray = array();
		
		$fontsize = $this->fontsize -1;
		$margin = 4;
		
		$assumed_height = (count($CorrectAnswerArr) + count($reportingtopic_arr) + 1)* ($this->fontsize + $margin);
		//$assumed_height = (count($CorrectAnswerArr) + count($reportingtopic_arr) + 1)* (($fontsize * $leading)/100);
		$neededheight = $ypos - $assumed_height - $buffersize;
		
		//echo "<br> current ypos ".$ypos;
		//echo "<br> Assumed Height ::".$assumed_height;
		//echo "<br> Needed Height ::".$neededheight

		if($neededheight <= 50) {
			
			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			
		    $this->LoadpdfFont($pdf,$this->fontname);
			pdf_setfont($pdf, $this->font, $fontsize);

			$xpos = $this->left_margin;
			$ypos = $this->page_height-$this->top_margin-$buffersize;
			
			$actualpage_width = $this->page_width-$rightmargine-$xpos_str_report;
			$yposbefore = $ypos;
			
			if($newpageflag==0)
				$newpageflag=1;
		} elseif($buffersize != 0){
			$ypos = $ypos - $buffersize;
		}
		
		$tf=0; $tbl=0;
		$col = 1;
		$row = 1;
	
		$llx= 350; // TABLE WIDTH
		//$lly= $assumed_height; // TABLE HEIGHT
		$lly= 50; // TABLE HEIGHT -- Its taken 50 and its working for next page logic
		
		$urx=$this->left_margin;   //POSITION OF X
		$ury=$ypos;  //POSITION OF Y
		
		$rowmax = count($CorrectAnswerArr) + count($reportingtopic_arr);
		$colmax = 3;
		$header = array(1 =>"Q No",2=>"Correct Answer",3=>"Student Response");
		
		//$optlist = "fittextline={position=center font=" . $font . " fontsize=9} " ."colspan=" . $colmax;
		$optlist = "fittextline={position={left top} font=" . $this->font . " fontsize=$fontsize} rowheight=10 margin=$margin";
		for ($col = 1; $col <= $colmax; $col++) {
				/*pdf_rect($pdf, $this->left_margin, $ypos, 5, 5); //draw the rectangle
				pdf_stroke($pdf); */
				$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $header[$col], $optlist);
		        if ($tbl == 0) {
		            die("Error: " . PDF_get_errmsg($p));
		        }
		}
		/* ---------- Fill $row 3 and above with their numbers */
		
	    foreach($ReportingQuesArr as $reporting_id => $qcodearray){
	    	
			# Below process is for displaying the question nos in order
	    	$orderedQcodeArr = array();

	    	foreach($qcodearray as $key => $qcode)
	    	{
	    		$orderedQcodeArr[$questionSeq[$studentinfo["paperversion"]][$qcode] + 1] = $qcode;
	    	}
	    	
	    	ksort($orderedQcodeArr);
	    	# process end
	    	
	    	$row++;	$col =1;
			$optlist = "fittextline={position={left top} font=" . $this->font . " fontsize=$fontsize} rowheight=10 margin=$margin colspan = $colmax";
			
	    	$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "Sub Topic :".$reportingtopic_arr[$reporting_id], $optlist);
	    	
	    	foreach($orderedQcodeArr as $key => $qcode){
			    $row++;
		    	//$optlist = "fittextline={position=left font=" . $this->font . " fontsize=8} margin=4";
		    	//$optlist = "fittextline={position={left center} font=" . $this->font . " fontsize=8} margin=4 colwidth = 20";
		    	$optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 colwidth=80 margin=$margin";
				for ($col = 1; $col <= $colmax; $col++) {
					
					if($col == 1)
						$content = ($questionSeq[$studentinfo["paperversion"]][$qcode] + 1);
					if($col == 2)	
						$content = isset($this->ansseqarr[$CorrectAnswerArr[$qcode]])?$this->ansseqarr[$CorrectAnswerArr[$qcode]]:"";
					if($col == 3)	
						$content = isset($this->ansseqarr[$studentsAnswer[$studentinfo['studentid']][$qcode]])?$this->ansseqarr[$studentsAnswer[$studentinfo['studentid']][$qcode]]:"";	
						
			        $tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $content, $optlist);
		        	if ($tbl == 0) {
		            die("Error: " . PDF_get_errmsg($p));
		        	}
			    }
	    	}
	    }
		
		/* Place the table instance */
		$optlist = "header=1 fill={{area=rowodd fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}}";
		$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
		
		if ($tblresult ==  "_error") {
			die("Couldn't place table: " . PDF_get_errmsg($p));
		}
		
		$returnarray[0] = $ury;
		$returnarray[1] = $newpageflag;
		
		#echo "<br> Ending Ypos ::".($ury);
		return $returnarray;
	}
	

	function getSubtopicWisePerfo($subtopic_arr,$questionSeq,$SectionWiseStudents,$connid){
			 
			$subtopicperfo = array();
				
			foreach($subtopic_arr as $subtopicid => $subtopicques){
				
				$subtopicquecount = count($subtopicques);
				$AllStudentCount = 0;
				$AllTotTrue = 0;
				
				foreach($SectionWiseStudents as $Section => $PaperWiseStudents){
					
					//echo "<br> ----------::  Started For Section :: --------".$Section;
					
					$SectionWiseTotStudStr = '';
					$SectionWiseTotStudArr = array();
					$SectionWiseTotTrue = 0;
										
					foreach($PaperWiseStudents as $PaperVersion => $StudentStr){
						
						$SectionWiseTotStudStr .= $StudentStr.",";
						//echo "<br> <br> For Paper ::".$PaperVersion;
						//echo "<br> Students for this paper ::".$PaperWiseStudents[$PaperVersion];
						//echo "<br> Students for this paper ::".$StudentStr;
						
						$QuesNumstr = "";
						for($i=0;$i<sizeof($subtopicques);$i++) {
							$QuesNumstr .= "R".($questionSeq[$PaperVersion][$subtopicques[$i]] + 1)."+";
						}
						
						$fields = rtrim($QuesNumstr,"+");
						$TotTrueQry = "SELECT SUM($fields) as total FROM da_response WHERE studentID IN($StudentStr) ";
						//echo "<br> Query ::".$TotTrueQry;
						$ansresult = new dbquery($TotTrueQry,$connid);
						$SectionWiseTotTruecount = $ansresult->getrowarray();
						$SectionWiseTotTrue += $SectionWiseTotTruecount['total'];
						
						 
					}
					
					$SectionWiseTotStudArr = explode(",",rtrim($SectionWiseTotStudStr,","));
					$SectionWiseTotStudCount = count($SectionWiseTotStudArr);
					
					$AllTotTrue += $SectionWiseTotTrue;
					$AllStudentCount += $SectionWiseTotStudCount;
															
					/*echo "<br> Total True Answers For Subtopic  ::".$subtopicid;
					echo "<br> Total Correct ::".$SectionWiseTotTrue;
					echo "<br> Total Student ::".count($SectionWiseTotStudArr);
					echo "<br> Total Percentage ::".($SectionWiseTotTrue * 100)/(count($SectionWiseTotStudArr)*$subtopicquecount);*/
					
					$subtopicperfo[$subtopicid][$Section] = round(($SectionWiseTotTrue * 100)/(count($SectionWiseTotStudArr)*$subtopicquecount));
				}
				
				/*echo "<br> All total true ::".$AllTotTrue;
				echo "<br> All Student Count ::".$AllStudentCount;*/
								
				$subtopicperfo[$subtopicid]['ALL'] = round(($AllTotTrue * 100)/($AllStudentCount*$subtopicquecount));
			}
			
			return $subtopicperfo;
			
			
		}
		
	function getStudentPerfoInSubtopic($StudentID,$StudentName,$PaperVersion,$subtopic_arr,$questionSeq,$connid){
			
			$subtopicperfo = array();
				
			foreach($subtopic_arr as $subtopicid => $subtopicques){
				
				$totalTrueCount = 0;
				$subtopicquecount = count($subtopicques);
			
				$QuesNumstr = "";
				for($i=0;$i<sizeof($subtopicques);$i++) {
					$QuesNumstr .= "R".($questionSeq[$PaperVersion][$subtopicques[$i]] + 1)."+";
				}
				
				$fields = rtrim($QuesNumstr,"+");
				$TotTrueQry = "SELECT SUM($fields) as total FROM da_response WHERE studentID  = $StudentID";
				// echo "<br>".$TotTrueQry;
				$dbquery = new dbquery($TotTrueQry,$connid);
				$result = $dbquery->getrowarray();
				$totalTrueCount += $result['total'];
				$subtopicperfo[$StudentID][$subtopicid] = round(($totalTrueCount * 100)/(count($subtopicques)));
				$subtopicperfo[$StudentID]['Name'] = isset($StudentName) && $StudentName != ""?$StudentName:'Student';
				$subtopicperfo[$StudentID]['Color'] = "Light";
						 
			}
			return $subtopicperfo;
	}	
		
	function GettopicWiseStudentAnswer($subtopic_arr,$questionSeq,$SectionWiseStudents,$connid){
	
		foreach($subtopic_arr as $subtopicid => $subtopicques){
			foreach($subtopicques as $key => $qcode){
				$AllStudentCount = 0;
				foreach($SectionWiseStudents as $section => $studentsarr){
					$SectionWiseStudentsCount = 0;
					$StudentStr = "";
					foreach($studentsarr as $paperversion => $students){
					
					$StudentStr .= $students.",";
					$questionnos = "R".($questionSeq[$paperversion][$qcode] + 1);
					
					//echo "<br> Subtopicid ::".$subtopicid;
					//echo "<br> Qcode ::".$qcode;
					//echo "<br> Section ::".$section;
					//echo "<br> Paperversion ::".$paperversion;
					
					$query = "SELECT COUNT(*) AS TOTAL FROM da_response WHERE $questionnos = 1 AND studentID IN($students)";
					$result = new dbquery($query,$connid);
					$anres = $result->getrowarray();
					$count = $anres['TOTAL'];
					
					if(!isset($SectionCorrectAns[$section][$qcode])) $SectionCorrectAns[$section][$qcode] = 0;
					$SectionCorrectAns[$section][$qcode] += $count;
					
					if(!isset($SectionCorrectAns['ALL'][$qcode])) $SectionCorrectAns['ALL'][$qcode] = 0;
					$SectionCorrectAns['ALL'][$qcode] += $count;
					//echo "<br> --------------------------------------- <br>";
					
					}
					
					$SectionWiseStudentsCount = count(explode(",",rtrim($StudentStr,",")));
					$SectionWiseQcodePerfo[$section][$qcode] = ($SectionCorrectAns[$section][$qcode]/$SectionWiseStudentsCount) * 100;
					$AllStudentCount += $SectionWiseStudentsCount; 														
			    }
				
			    $SectionWiseQcodePerfo['ALL'][$qcode] = ($SectionCorrectAns['ALL'][$qcode]/$AllStudentCount) * 100;
			}
		 }
		 
	 	 return $SectionWiseQcodePerfo;
	}

	function getDifficultAndEasiestQueArray($queWisePerfoArr){
		
		foreach($queWisePerfoArr as $section => $quesperfo){
		
			$EasyDiffQueArr[$section] = array();
			arsort($quesperfo,SORT_NUMERIC);
			
			foreach($quesperfo as $question => $perfo)
			{
				if($perfo >= constant("EASY_PERFO_AVG"))
					$EasyDiffQueArr[$section]['EASY'][$question] = $perfo;
				if($perfo <= constant("DIFF_PERFO_AVG"))
					$EasyDiffQueArr[$section]['DIFF'][$question] = $perfo;
			}
		}
		return $EasyDiffQueArr;
		
	}
		

	function getOptionWisePerfo($SectionWiseStudents,$questionSeq,$question,$connid){
		
		$ansarray = array("A","B","C","D");
		
		$AllStudentcount = 0;
		
		foreach($SectionWiseStudents as $section => $studentsarr){
			
			$SectionWiseStudentsCount = 0;
			$SectionWiseTotStudStr = "";
			$StudentStr = "";
	
			foreach($studentsarr as $paperversion => $students){
								
				$SectionWiseTotStudStr .= $students.",";
				$questionnos = "A".($questionSeq[$paperversion][$question] + 1);
				$query = "SELECT $questionnos,count(*) as total FROM da_response WHERE examcode = '".$section."' AND studentID IN($students) GROUP BY $questionnos";
				$dbqry = new dbquery($query,$connid);
				while($row = $dbqry->getrowarray()){
					foreach($ansarray as $key => $value){
						
						if(!isset($OptionPerfo[$section][$value])) $OptionPerfo[$section][$value] = 0;
						if(!isset($OptionPerfo['ALL'][$value])) $OptionPerfo['ALL'][$value] = 0;
						
						if($value == $row[$questionnos]) {
							$OptionPerfo[$section][$value] += $row['total'];
							$OptionPerfo['ALL'][$value] += $row['total'];
						}
						
					}
				}
			}
			
			$SectionWiseStudentsCount = count(explode(",",rtrim($SectionWiseTotStudStr,",")));
			$AllStudentcount += $SectionWiseStudentsCount;
			
			foreach($ansarray as $key => $value){
				$OptionWiseStudPerfo[$section][$value] = round((($OptionPerfo[$section][$value]*100)/$SectionWiseStudentsCount),2);
			}
			
		}
		
		foreach($ansarray as $key => $value){
			$OptionWiseStudPerfo['ALL'][$value] = round((($OptionPerfo['ALL'][$value]*100)/$AllStudentcount),2);
		}
		
		return $OptionWiseStudPerfo;
		
	}
	
	function getMisconceptionQueToDisplay($misconceptionque_arr,$subtopic_arr,$questionSeq,$SectionWiseStudents,$connid){
		
		
		$tempArray = array();
		
		$query="SELECT qcode, correct_answer FROM da_questions WHERE qcode IN(".implode(",",$misconceptionque_arr).") AND misconception=1";
		$dbqry = new dbquery($query,$connid);
		
		while($row = $dbqry->getrowarray())
		{
			$count=0;
			$AllStudentCount = 0;
			$WrongCountForAll = 0;
			$correct_answer = $row['correct_answer'];
			
			$AllTotalOpt[A] = 0;
			$AllTotalOpt[B] = 0;
			$AllTotalOpt[C] = 0;
			$AllTotalOpt[D] = 0;
				
			foreach($SectionWiseStudents as $section => $studentsarr){
				
				$SectionWiseStudentsCount = 0;
				$SectionWiseWrongCount = 0;
				$SectionWiseTotStudStr = "";

				$StudentStr = "";
				$wrongtotal = 0;
				
				$totalopt[A] = 0;
				$totalopt[B] = 0;
				$totalopt[C] = 0;
				$totalopt[D] = 0;
				
				foreach($studentsarr as $paperversion => $students){
					
					$SectionWiseTotStudStr .= $students.",";
					$questionnos = "A".($questionSeq[$paperversion][$row['qcode']] + 1);
					$response_query="SELECT  ".$questionnos." as opt, count(*) AS total from da_response where examcode='".$section."' and studentID in ($students) GROUP BY opt";
					$respdbqry = new dbquery($response_query,$connid);
					
					while($response_row = $respdbqry->getrowarray())
					{			
					
						if($response_row['opt']==$correct_answer) continue;
						else if($response_row['opt'] != ""){
							
							if($response_row['opt'] == "A"){
								$totalopt[A] += $response_row['total'];
								$AllTotalOpt[A] += $response_row['total'];
							}	
							if($response_row['opt'] == "B"){
								$totalopt[B] += $response_row['total'];
								$AllTotalOpt[B] += $response_row['total'];
							}	
							if($response_row['opt'] == "C"){
								$totalopt[C] += $response_row['total'];
								$AllTotalOpt[C] += $response_row['total'];
							}	
							if($response_row['opt'] == "D"){
								$totalopt[D] += $response_row['total'];
								$AllTotalOpt[D] += $response_row['total'];
							}
								
							$wrongtotal += $response_row['total']; 
						}
					}
			    }
			    
			/*    echo "<br> Qcode ::".$row['qcode'];
				echo "<pre>";
				print_r($totalopt);
				echo "</pre>";*/
			    
			    $SectionWiseStudentsCount = count(explode(",",rtrim($SectionWiseTotStudStr,",")));
			    $SectionWiseWrongCount += $wrongtotal; 
			    $SectionWiseWrongPer = ($wrongtotal/$SectionWiseStudentsCount)*100;
			    $AllStudentCount += $SectionWiseStudentsCount;
			    $WrongCountForAll += $SectionWiseWrongCount;
			    //$tempArray[$row['qcode']][$section] = $SectionWiseWrongPer;
			    $tempArray[$row['qcode']][$section] = array("wrongper"=>$SectionWiseWrongPer,"maxwrongval"=>max($totalopt));
			    
			}
			
			/*echo "<br> Qcode ::".$row['qcode'];
			echo "<pre>";
			print_r($AllTotalOpt);
			echo "</pre>";*/
			
			$AllStudentWrongPer = ($WrongCountForAll/$AllStudentCount)*100;
			//$tempArray[$row['qcode']]['ALL'] = $AllStudentWrongPer;
			$tempArray[$row['qcode']]['ALL'] = array("wrongper"=>$AllStudentWrongPer,"maxwrongval"=>max($AllTotalOpt));
		}
	
		
		foreach($tempArray as $qcode => $sectionwisevaluearr){
			$i = 0;
			foreach($sectionwisevaluearr as $section => $valueArr){
				
				/*if($value > constant("MISCON_DISP_WRNG_PER")){
					if(!isset($SectionWiseMisconQue[$section])) $SectionWiseMisconQue[$section] = "";
					$SectionWiseMisconQue[$section][$qcode] = $value; 
					$i++;
					if($i == 5) break;
				}*/	
				
				if($valueArr['wrongper'] > constant("MISCON_DISP_WRNG_PER")){
					if(!isset($SectionWiseMisconQue[$section])) $SectionWiseMisconQue[$section] = array();
					$SectionWiseMisconQue[$section][$qcode] = $valueArr['maxwrongval']; 
					$i++;
				}			
			}
		}
				
		
		foreach($SectionWiseMisconQue as $section => $qcodevalues){
			
			arsort($qcodevalues,SORT_NUMERIC);
			$SectionWiseSortMisconQueArr[$section] = $qcodevalues; 
		}
		
		return $SectionWiseSortMisconQueArr;
	}
	
	function GenerateStudentReport($examcode=0,$request_id=0,$reqstudentid=0,$connid){
		
		if($examcode == 0) return;
		
		$this->setgetvars();
		$this->setpostvars();
		
		$request_arr = array();
		
		$examcode_str = "";
		$condition = "WHERE exam_code = '".$examcode."'";
		
		if($request_id != 0)
			$condition = "WHERE request_id = '".$request_id."'";
		
		$query = "SELECT request_id,exam_code,section FROM da_examDetails $condition";
		$dbquery = new dbquery($query,$connid);
		 
		while($row = $dbquery->getrowarray()){
				
			$request_arr[$row['request_id']][$row['exam_code']] = $row['section'];
			$examcode_str .= $row['exam_code'].",";
			$request_id = $row['request_id'];
		}
		
		$examcode_arr = array();
		
		$query = "SELECT da_response.examcode,da_response.paperversion, group_concat( distinct(da_response.studentID) ) AS studentids,
				  da_testRequest.paper_code,B.qcode_list,da_testRequest.test_date,da_testRequest.subject,da_testRequest.class,
				  da_testRequest.schoolCode,da_testRequest.paper_code,da_testRequest.testName
				  FROM da_examDetails 
				  LEFT JOIN da_response ON da_examDetails.exam_code = da_response.examcode
				  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_paperDetails AS A ON da_testRequest.paper_code = A.papercode
				  LEFT JOIN da_paperDetails AS B ON da_response.paperversion = B.version AND A.papercode = B.papercode
				  WHERE da_examDetails.exam_code IN(".rtrim($examcode_str,',').")
				  GROUP BY da_examDetails.exam_code,da_response.paperversion";
		
		//echo $query;

		$dbquery = new dbquery($query,$connid);
		
		if($dbquery->numrows() == 0)
			die("No Records Found For Given Examcode, Report Will Not Be Generated!");
			
		$paperwisesequence = array();
		$SectionWiseStudents = array();
		$reportingtopic_arr = array();
		
		while($row = $dbquery->getrowarray()){
			
			$papercode = $row['paper_code'];
			$schoolcode = $row['schoolCode'];
			$subject = $this->subject_arr[$row['subject']];
			$class = $row['class'];
			$testdate = $row['test_date'];
			$testName = $row['testName'];
			$qcodelist = $row['qcode_list'];
			$paperwiseQueSeq[$row['paperversion']] = explode(',',$row['qcode_list']);
			$SectionWiseStudents[$row['examcode']][$row['paperversion']] = $row['studentids'];
		}
		
		if($qcodelist == "")
			die("Reports will not be generated, Questions not found in paper!");
			
		$questionSeq = array();
		foreach($paperwiseQueSeq as $paper => $quesarray){
			$questionSeq[$paper] = array_flip($quesarray);
		}
			
		//echo $examcode_arr[2511][1]['qcodelist']; 
		$misconceptionque_arr = array();
		$misconceptionque_arr_with_ans = array();
		
		$query2 = "SELECT qcode,subtopic_code,sub_subtopic_code,correct_answer,if(misconception = 1,'Y','N') as misconceptionque 
				   FROM da_questions WHERE qcode IN($qcodelist)";
		$dbquery2 = new dbquery($query2,$connid);
		while($row2 = $dbquery2->getrowarray()){
			
			$subsubtopic_arr[$row2['sub_subtopic_code']][] = $row2['qcode'];
			$subtopic_arr[$row2['subtopic_code']][] = $row2['qcode'];
			
			$subsubtopicQue_str[$row2['sub_subtopic_code']] .= $row2['qcode'].",";
			$subtopicQue_str[$row2['subtopic_code']] .= $row2['qcode'].",";
			
			$CorrectAnswerArr[$row2['qcode']] = $row2['correct_answer'];
			 
			if($row2['misconceptionque'] == 'Y') {
				$misconceptionque_arr[] = $row2['qcode'];
				$misconceptionque_arr_with_ans[$row2['qcode']] = $row2['correct_answer'];
			}	
		}
		
		
		$repqry = "SELECT reporting_id,papercode,sst_list,reporting_head FROM da_reportingDetails WHERE papercode = '".$papercode."'";
		$repdbqry = new dbquery($repqry,$connid);
		while($reportingrow = $repdbqry->getrowarray()){
			$reportingtopic_arr[$reportingrow['reporting_id']] = $reportingrow['reporting_head'];
			$reporting_subsubtopicarr[$reportingrow['reporting_id']] = $reportingrow['sst_list'];
		}

		##### Generating Array For Reporting purpose ########
		foreach($reporting_subsubtopicarr as $reportingid => $subsubtopicids){
			
			$ReportingQuesArr[$reportingid] = array();
			if(strpos($subsubtopicids,",") === false){
				//$ReportingQuesArr[$reportingid] = $subtopic_arr[$subsubtopicids];
				$ReportingQuesArr[$reportingid] = $subsubtopic_arr[$subsubtopicids];
			}else{
				foreach(explode(",",$subsubtopicids) as $key => $subsubtopicid){
					//for($i=0;$i<sizeof($subtopic_arr[$subsubtopicid]);$i++)
					for($i=0;$i<sizeof($subsubtopic_arr[$subsubtopicid]);$i++)
					{
						//array_push($ReportingQuesArr[$reportingid],$subtopic_arr[$subsubtopicid][$i]);
						array_push($ReportingQuesArr[$reportingid],$subsubtopic_arr[$subsubtopicid][$i]);
						
					}
				}
			}
		}
		/*echo "<pre>";
		print_r($ReportingQuesArr);
		echo "</pre>";*/
		
		//$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($subtopic_arr,$questionSeq,$SectionWiseStudents,$connid);
		$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		
		// This portion of converting array into some different array due to array manipulated in bar chart is different 
		// We need to synchro the arrays in both the function to remove below codes
		
		foreach($SubTopicWisePerfoArr as $subtopicid => $perfomance){
			if($request_id != 0){
				foreach($request_arr as $requestid => $sectionarr){
					foreach($sectionarr as $section=>$class){
						$classperfo[$section][$subtopicid] = $perfomance[$section];
						$classperfo[$section]['Name'] = "Section ".$class;
						$classperfo[$section]['Color'] = "Dark";
					}
				}
			}elseif($examcode != 0){
				$classperfo[$examcode][$subtopicid] = $perfomance[$examcode];
				$classperfo[$examcode]['Name'] = "Class";
				$classperfo[$examcode]['Color'] = "Dark";
			}
		}
		
		$condition = "";
		
		if($reqstudentid != 0)
			$condition = "AND da_response.studentID = $reqstudentid ";
			
		$studentquery = "SELECT da_studentMaster.studentID,da_studentMaster.studentName,da_studentMaster.rollNo,da_studentMaster.schoolCode,										 						da_studentMaster.class,da_studentMaster.section,da_studentMaster.dob,da_studentMaster.gender,
								da_response.paperversion,schools.schoolname,schools.schoolno
					  	 FROM da_studentMaster 
					  	 LEFT JOIN da_response ON da_studentMaster.studentID = da_response.studentID
					  	 LEFT JOIN schools ON da_studentMaster.schoolCode = schools.schoolno
					  	 WHERE da_response.examcode = '".$examcode."' $condition ";
		//echo "<br> Query ::".$studentquery;
		
		$dbstudquery = new dbquery($studentquery,$connid);
		while($studentrow = $dbstudquery->getrowarray()){
			
			$studentid = $studentrow['studentID'];
			$studentname = $studentrow['studentName'];
			$studentschooname = $studentrow['schoolname'];
			$studentpaperversion = $studentrow['paperversion'];
			$studentinfo = array("studentid"=>$studentrow['studentID'],"studentname"=>$studentrow['studentName'],"schoolname"=>$studentrow['schoolname'],
								 "rollno"=>$studentrow['rollNo'],"paperversion"=>$studentrow['paperversion'],"class"=>$studentrow['class'],"section"=>$studentrow['section'],
								 "subject"=>$subject,"schoolcode"=>$studentrow['schoolno']);
			$studentwisemisconceptionque = $this->getStudentsMisconceptionQues($examcode,$studentid,$studentpaperversion,$misconceptionque_arr_with_ans,$questionSeq,$connid);
			//$studentPerfoSubtopicWiseArr = $this->getStudentPerfoInSubtopic($studentid,$studentpaperversion,$subtopic_arr,$questionSeq,$connid);
			$studentPerfoSubtopicWiseArr = $this->getStudentPerfoInSubtopic($studentid,$studentname,$studentpaperversion,$ReportingQuesArr,$questionSeq,$connid);
			$studentsAnswer[$studentid] = $this->getSubtopicWiseStudentAnswer($examcode,$studentid,$studentpaperversion,$paperwiseQueSeq,$questionSeq,$connid);
			$this->createStudentReportPDF($request_id,$examcode,$testdate,$testName,$studentid,$studentinfo,$questionSeq,$studentwisemisconceptionque,$studentPerfoSubtopicWiseArr,$classperfo,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$connid);
			
		}
	}
	
	function getStudentsMisconceptionQues($examcode,$studentid,$studentpaperversion,$misconceptionque_arr_with_ans,$questionSeq,$connid){
		
		foreach($misconceptionque_arr_with_ans as $que => $ans){
		
			$questionno = "A".($questionSeq[$studentpaperversion][$que] + 1);
			$query = "SELECT $questionno AS answer FROM da_response WHERE studentID = '".$studentid."' AND examcode = '".$examcode."'";
			$dbqry = new dbquery($query,$connid);
			while($row = $dbqry->getrowarray()){
				
				if($row['answer'] == $ans)
					continue;	
				elseif($row['answer'] != $ans){
					$studentmisconque[$que] = array('correct'=>$ans,'student'=>$row['answer']);
				}		
			}
		}
		return $studentmisconque;
		
	}
	
	function createStudentReportPDF($request_id,$examcode,$testdate,$testName,$studentid,$studentinfo,$questionSeq,$studentwisemisconceptionque,$studentPerfoSubtopicWiseArr,$classperfo,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$connid){
		
		$linebreak = 14;
		$doublelinebreak = 20;
		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		$leading = 120;
		$schoolcode = $studentinfo['schoolcode'];
		
		$pdf = pdf_new();
		
		pdf_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 7.0.2
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");
		
		$this->LoadpdfFont($pdf,$this->fontname);
		
		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/",0777);
			
		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/",0777);	
			
		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/",0777);	
			
		$ActualStudentReportPath = constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/";
			
		if(!is_dir($ActualStudentReportPath."/$examcode/"))
			mkdir($ActualStudentReportPath."/$examcode/",0777);
				
		pdf_begin_document($pdf,$ActualStudentReportPath."/$examcode/$studentid.pdf","");
				
		$headerimage = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."/report_logo.jpg", "");
		
		$image_width = pdf_get_value($pdf, "IMAGEWIDTH", $headerimage);
		$image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $headerimage);
		
	    // Need to check with the arpit
        $ypos = $this->page_height-139;
        $xpos = $this->left_margin + 10;
        $pageheaderypos = $ypos;
        //$xpos = 50;
		//$ypos = $this->page_height - 100;
		
		############### Header #######################
		
		pdf_begin_page_ext($pdf, $this->page_width, $this->page_height,"");
		pdf_fit_image($pdf,$headerimage,$xpos,$ypos, "scale 1");
		
		pdf_setlinewidth($pdf,0.1);
		pdf_moveto($pdf,$this->left_margin,$ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);
	    
	    $xpos = $this->left_margin+$image_width+10;
	    $ypos = $this->page_height-70;
	    
	    pdf_setfont($pdf,$this->fontbold,$this->fontsize);
	    pdf_show_xy($pdf,"STUDENT REPORT : (".ucfirst($studentinfo["schoolname"]).")",$xpos,$ypos);
	    
	    $xpos = $xpos - 10;	
	    $ypos = $ypos - $doublelinebreak - $singlelinebreak;
	    
	    pdf_setfont($pdf,$this->font,$this->fontsize);
	    pdf_show_xy($pdf,"Test :".$testName,$xpos,$ypos);
	    
	    $ypos -= $oneandhalflinebreak;
	    pdf_show_xy($pdf,"Class : ".$studentinfo["class"],$xpos,$ypos);
	    pdf_fit_textline($pdf , "Section : ".$studentinfo["section"], $this->page_width-($this->right_margin) , $ypos ,"position={right bottom}");
	    
	    $ypos -= $oneandhalflinebreak;
	    
	    $dateParameters=explode("-",$testdate);
		$newDate=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
		
	    pdf_show_xy($pdf,"Test Date :".$newDate,$xpos,$ypos);
	    pdf_fit_textline($pdf , "Student Roll No : ".$studentinfo["rollno"] , $this->page_width-($this->right_margin) , $ypos ,"position={right bottom}");
	    
	    ##############################################
	    
	    
	    $StudentTotalPerfo =0;
	    $studentworsttopic = array();
	    $studentworsttopicstr = "";
	   
	    
	    foreach($studentPerfoSubtopicWiseArr as $studentid => $topicwiseperformance){
	    	$topiccount =0;
	    	$max =0;
	    	foreach($topicwiseperformance as $topic => $performance){
	    		
	    		if(is_numeric($performance)){
		    		$StudentTotalPerfo += $performance;
		    		if($performance > $max) {
		    			$studentbesttopic = $topic;
		    			$max = $performance;
		    		}
		    		if($performance < constant("STUD_IMPROVEMENT_PER")){
		    			$studentworsttopic[$topic] = $performance;
		    			//$studentworsttopicstr .= $reportingtopic_arr[$topic]." & "; // If we have to display all topics than uncommented this portion and comment below portion
		    		}
		    		
		    		$topiccount++;
	    		}
	    	}
	    }
	    
	    # Process to sort out the topics for improvement
	    asort($studentworsttopic,SORT_NUMERIC);
	    $worsttopicdispcnt = 0;
	    foreach($studentworsttopic as $topicid => $perfo){
    		$worsttopicdispcnt++;
	    	$studentworsttopicstr .= $reportingtopic_arr[$topicid]." & ";
    		if($worsttopicdispcnt == constant("STUD_MAX_WORST_TOPIC"))
    			break;
	    }
	    
	    $StudentAvgPerfo = round($StudentTotalPerfo/$topiccount);
	    	    
	    $SectionTotalPerfo =0;
	    $sectionworsttopic = array();
	   	    
	    foreach($classperfo as $examcode => $topicwiseperformance){
	    	$topiccount =0;
	    	$max =0;
	    	foreach($topicwiseperformance as $topic => $performance){
	    		if(is_numeric($performance)){
		    		$SectionTotalPerfo += $performance;
		    		if($performance > $max) {
		    			$sectionbesttopic = $topic;
		    			$max = $performance;
		    		}
		    		if($performance < constant("STUD_IMPROVEMENT_PER")){
		    			$sectionworsttopic[$topic] = $performance;
		    		}
		    		$topiccount++;
	    		}	
	    		
	    	}
	    }
	    
	    $SectionAvgPerfo = round($SectionTotalPerfo/$topiccount);
	    	    
	    $ypos = $pageheaderypos - 2*$doublelinebreak;
	    
	    $studentname = "Student";
	    if(isset($studentinfo["studentname"]) && $studentinfo["studentname"] != "")
	    	$studentname = $studentinfo["studentname"];
	    	
	    pdf_show_xy($pdf,"Dear ".ucfirst(strtolower($studentname)).",",$this->left_margin,$ypos);
	    
	    $ypos -= $singlelinebreak;
	    
	    $macrocontent ="<macro {H1 {fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$this->fontsize encoding=winansi}}>";
	    
	    $subtopicrecommend = "";
	    if(rtrim($studentworsttopicstr," & ") != "")
	    	$subtopicrecommend = "<&Body>Sub topics recommended for improvement are <&H1>".rtrim($studentworsttopicstr," & ").".\n\n";
	    	
	    $thetext ="The topic perfomance in the test is $StudentAvgPerfo%. The class average performance in this topic is $SectionAvgPerfo%. The subtopic where you have performed the best is <&H1>$reportingtopic_arr[$studentbesttopic].\n\n".$subtopicrecommend."<&H1>Misconceptions:\n\n<&Body>This Section lists the most common misconception in this topic. Your performance against each is mentioned below along with best practices that help understand these concepts best";
	    
	    //$optlist = "parindent=20 alignment=justify leading=100% fontname=Helvetica fontsize=8 encoding=unicode";
		$textflow = PDF_create_textflow($pdf, $macrocontent.$thetext, "fontname=$this->fontname fontsize=$this->fontsize encoding=winansi leading=$leading%");
		do {
		    $tflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $ypos, "");
		    
		} while (strcmp($tflowresult, "_stop"));
		
		PDF_delete_textflow($pdf, $textflow);
		
		$nooflines = ceil(pdf_stringwidth($pdf,$thetext,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		
		$linespacing = ($this->fontsize * $leading)/100; //$font_size*leading/100
		$totallines = ($nooflines + 5) * $linespacing; // There are 6 \n in the above string and textflow always put one line extra where its ends.
		$ypos -= $totallines;  // 
		
		//$buffersize = 10;
		if(is_array($studentwisemisconceptionque) && count($studentwisemisconceptionque) > 0) {
			
			$i =0;
			foreach($studentwisemisconceptionque as $qcode => $answers){
			
					$i++;
					$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,group_id,
									 da_questions.passage_id,qms_passage.passage_name
							  FROM da_questions 
							  LEFT JOIN qms_passage ON da_questions.passage_id = qms_passage.passage_id
							  WHERE qcode = '".$qcode."' AND misconception = 1";
					$dbqry = new dbquery($query,$connid);
					$result = $dbqry->getrowarray();
					
					$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != "")?$result['mc_ques_title']:"";
					$nooflines = ceil(pdf_stringwidth($pdf,"Concept : $concept",$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
					
					$passagenamebuffer = 0;
					$passagename = "";
					
					if($studentinfo['subject'] ==  "English" && $result["passage_id"] != 0 && $result['passage_name'] != ""){
						
						$passagename = $result["passage_name"];
						$nooflinesofpsg = ceil(pdf_stringwidth($pdf,$passagename,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
						$passagenamebuffer = ($nooflinesofpsg * ($this->fontsize+1)) + $singlelinebreak;
					}
					
					$buffersize = ($nooflines * ($this->fontsize+1)) + $doublelinebreak + $passagenamebuffer;
					
					$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
					
					$qcodestr = str_replace("‘","'",$qcodestr);
				   	$qcodestr = str_replace("’","'",$qcodestr);
				   	$qcodestr = str_replace("–","-",$qcodestr);
				   	$qcodestr = str_replace("…","...",$qcodestr);
				   	$qcodestr = str_replace("Æ","'",$qcodestr);
				   	$qcodestr = str_replace("&nbsp;"," ",$qcodestr);
				   	$qcodestr = str_replace("·",".",$qcodestr);
				   	
				   	$yposbeforequestion = $ypos;
				   	
				   	if($result["group_id"] != 0)
				   		$imagepathfrom = 2;
				   	else 	
				   		$imagepathfrom = $this->imagepathfrom;
				   		
				   	$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin+27,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin+27);
				   	
				   	$isNewPage=$ypos_returned[1];
				   	$yposafterque = $ypos_returned[0];
				   	
				   	if($isNewPage==1){
	           			$yposbeforequestion = $this->page_height-$this->top_margin;
	           		}	
	           		           		
	           		$queno = $questionSeq[$studentinfo['paperversion']][$qcode] + 1;
				   	pdf_show_xy($pdf,"Q ".$queno.":",50,$yposbeforequestion - $buffersize + 1.5); // 1.5 is added cause in new autopublish paper funciton question print slightly up
				   	
				   	################ Question End #################
				   	
				   	$buffersize = $singlelinebreak;
				    $yposbeforeconcept = $yposbeforequestion;
				    
				    $ypos_returned = autoPublishPaper($pdf,"<b>Concept:</b> ".$concept,$this->left_margin,$yposbeforequestion,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin);
				    
				    $isNewPage = $ypos_returned[1];
				    $yposafterconcept = $ypos_returned[0];
				    
				    if($isNewPage == 1){
				    	$yposbeforeconcept = $this->top_margin - $buffersize;
				    }
				    
				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeconcept+2);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeconcept+2);
				    pdf_stroke($pdf);
				    
					pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposafterconcept+$singlelinebreak); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposafterconcept+$singlelinebreak);
				    pdf_stroke($pdf);
					
				    if($passagename != "")
				    {
					    $textflow = PDF_create_textflow($pdf, "Passage: ".$passagename, "fontname=$this->fontname fontsize=$this->fontsize encoding= unicode leading=100%");
						do {
						    $passageres = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $yposafterconcept,"");
						} while (strcmp($passageres, "_stop"));
						PDF_delete_textflow($pdf, $textflow);
				    }
				    
				   	$ypos = $yposafterque; // As we are printing question first
				   	
				   	$ypos -= 20;
				   	
				   	pdf_setfont($pdf,$this->fontbold,$this->fontsize);
				   	pdf_show_xy($pdf,"Correct Option: ".$this->ansseqarr[$result["correct_answer"]],$this->left_margin,$ypos);
				   	pdf_show_xy($pdf,"Student Selection: ".$this->ansseqarr[$answers["student"]],$this->left_margin+100,$ypos);
				   	
				   	pdf_setfont($pdf,$this->font,$this->fontsize);
				   	
				   	$ypos -= 10;
				   	
				   	/*pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$ypos); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
				    pdf_stroke($pdf);
				    
				    $ypos -= 10;*/
				    
				   	$yposbeforeremedial = $ypos;
				   	$buffersize = 30;
				    
				    $remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
				    //$nooflines_rm = ceil(pdf_stringwidth($pdf,$remedial_measure,$this->font,9)/($this->page_width-$this->left_margin-$this->right_margin));
				    
				    $ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin);
				    
				    //$ypos -= $buffersize;
				   	
				   	$isNewPage=$ypos_returned[1];
				   	$ypos = $ypos_returned[0];
	           		if($isNewPage==1){
	           			$yposbeforeremedial = $this->page_height-$this->top_margin;
	           		}	
				    
				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
				    pdf_stroke($pdf);
				    
				    $yposbeforeremedial -= 10;
				    
				    pdf_show_xy($pdf,"Remedial measure:",$this->left_margin,$yposbeforeremedial);
				    
				    $yposbeforeremedial -= 3;
				    
				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
				    pdf_stroke($pdf);
				    			    
				    /*$textflow1 = PDF_create_textflow($pdf, $remedial_measure, "fontname=Verdana fontsize=9 encoding=winansi leading=100%");
					do {
					    $textflowresult1 = PDF_fit_textflow($pdf, $textflow1, $this->left_margin, 120, 550, $ypos, "");
					    
					} while (strcmp($textflowresult1, "_stop"));
					
					PDF_delete_textflow($pdf, $textflow1);
					
					$ypos -= ($nooflines_rm+1)*10;
					
				   	pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$ypos); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
				    pdf_stroke($pdf);*/
				    
				    $ypos -= $doublelinebreak;
				    
					if($i == 5) break;
					
			}
		} else {
			$ypos -= $singlelinebreak;
			pdf_setfont($pdf,$this->font,$this->fontsize);
			pdf_show_xy($pdf,"No Misconception Questions Found !",$this->left_margin,$ypos);
			$ypos -= $singlelinebreak;
		}
		
		$ypos -= 10;
		$buffersize = 50;
		$orgyposbeforechart = $ypos;			
		$nooftopics = count($reportingtopic_arr);
		$noofsection = count($SECTIONARRAY = $classperfo + $studentPerfoSubtopicWiseArr);
		$actualheight = $this->page_height - $this->top_margin - $this->bottom_margin;
		
		$returnposition = $this->getTopicWisePerfoBarGraph($pdf,$ypos,$nooftopics,$noofsection,$linetype = 'normal',$reportingtopic_arr,$SECTIONARRAY,$actualheight,$buffersize);
		
		$nextpage=$returnposition[1];
		$ypos = $ypos_returned[0];
   		if($nextpage==1){
   			$orgyposbeforechart = $this->page_height-$this->top_margin;
   		}
		
   		pdf_setfont($pdf,$this->fontbold,$this->fontsize);
   		pdf_show_xy($pdf,"Key Ideas Assessed:",$this->left_margin,$orgyposbeforechart);
		
   		pdf_setfont($pdf,$this->font,$this->fontsize);
   		$message = "The Student was assessed on the following sub topics. The Student performance in each of the sub topics is given in the chart.";
   		$textflow = PDF_create_textflow($pdf, $message, "fontname=$this->fontname fontsize=$this->fontsize encoding=winansi leading=$leading%");
		do {
		    $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $orgyposbeforechart, "");
		    
		} while (strcmp($textflowresult, "_stop"));
		
		PDF_delete_textflow($pdf, $textflow);
		
		$ypos = $returnposition[0] - 10;
		
		$buffersize = 0;
		
		$this->drawStudentAnswerTable($pdf,$ypos,$studentinfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$actualheight,$buffersize);
		   				
		pdf_end_page($pdf);
		pdf_end_document($pdf,"");
	}
	
	function getSubtopicWiseStudentAnswer($examcode,$studentid,$studentpaperversion,$paperwiseQueSeq,$questionSeq,$connid){
		
		$StudentAnswers = array();
				
		foreach($paperwiseQueSeq[$studentpaperversion] as $key => $qcode){
			
			$questionno = "A".($questionSeq[$studentpaperversion][$qcode] + 1);
			$query = "SELECT $questionno AS answer FROM da_response WHERE studentID = '".$studentid."' AND examcode = '".$examcode."'";
			$dbqry = new dbquery($query,$connid);
			while($studentrow = $dbqry->getrowarray()){
				$StudentAnswers[$qcode] = $studentrow['answer'];			
			}
		}
		return $StudentAnswers;
	}
	
	function GenerateSectionReport($examcode=0,$request_id=0,$connid){
		
		$this->setgetvars();
		$this->setpostvars();
		
		$request_arr = array();
		$examcode_str = "";
		
		$condition = "WHERE exam_code = '".$examcode."'";
		
		if($request_id != 0)
			$condition = "WHERE request_id = '".$request_id."'";
		
		$query = "SELECT request_id,exam_code,section FROM da_examDetails $condition";
		$dbquery = new dbquery($query,$connid);
		 
		while($row = $dbquery->getrowarray()){
				
			$request_arr[$row['request_id']][$row['exam_code']] = $row['section'];
			$examcode_str .= $row['exam_code'].",";
		}
		
		/*echo "<pre>";
		print_r($request_arr);
		echo "</pre>";*/
	
		$query = "SELECT da_response.examcode,da_response.paperversion, group_concat( distinct(da_response.studentID) ) AS studentids,
				  da_testRequest.paper_code,B.qcode_list,da_testRequest.test_date,da_testRequest.subject,da_testRequest.class,
				  da_testRequest.schoolCode,da_testRequest.paper_code,da_testRequest.testName,da_examDetails.section,da_examDetails.no_of_students
				  FROM da_examDetails 
				  LEFT JOIN da_response ON da_examDetails.exam_code = da_response.examcode
				  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_paperDetails AS A ON da_testRequest.paper_code = A.papercode
				  LEFT JOIN da_paperDetails AS B ON da_response.paperversion = B.version AND A.papercode = B.papercode
				  WHERE da_examDetails.exam_code IN(".rtrim($examcode_str,',').")
				  GROUP BY da_examDetails.exam_code,da_response.paperversion";

		$dbquery = new dbquery($query,$connid);
		
		if($dbquery->numrows() == 0) die("No Records Found For Given Request Id, Report will not be generated!");
		
		$paperwisesequence = array();
		$AllStudentsArr = array();
		$SectionWiseStudents = array();
		$reportingtopic_arr = array();
		$TestInfo = array();
		
		while($row = $dbquery->getrowarray()){
			
			$ExamCodeInfo[$row['examcode']] = array("papercode"=>$row["paper_code"],"schoolcode"=>$row["schoolCode"],"subject"=>$row['subject'],
							  						"class"=>$row["class"],"testdate"=>$row["test_date"],"testname"=>$row["testName"],
							  						"section"=>(isset($row["section"]) && $row["section"] != "")?$row["section"]:"Section",
							  						"totalstudents"=>$row["no_of_students"]);
							  
			$papercode = $row['paper_code'];
			$qcodelist = $row['qcode_list'];
			$paperwiseQueSeq[$row['paperversion']] = explode(',',$row['qcode_list']);
			$SectionWiseStudents[$row['examcode']][$row['paperversion']] = $row['studentids'];
		}
		
		if($qcodelist == "") die("No Questions Found In Paper, Report will not be generated!");
		
		$questionSeq = array();
		foreach($paperwiseQueSeq as $paper => $quesarray){
			$questionSeq[$paper] = array_flip($quesarray);
		}
			
		$misconceptionque_arr = array();
		$misconceptionque_arr_with_ans = array();
		$query2 = "SELECT qcode,subtopic_code,sub_subtopic_code,correct_answer,if(misconception = 1,'Y','N') as misconceptionque 
				   FROM da_questions WHERE qcode IN($qcodelist)";
		
		$dbquery2 = new dbquery($query2,$connid);
		while($row2 = $dbquery2->getrowarray()){
			
			$subsubtopic_arr[$row2['sub_subtopic_code']][] = $row2['qcode'];
			$subtopic_arr[$row2['subtopic_code']][] = $row2['qcode'];
			
			$subsubtopicQue_str[$row2['sub_subtopic_code']] .= $row2['qcode'].",";
			$subtopicQue_str[$row2['subtopic_code']] .= $row2['qcode'].",";
			
			$CorrectAnswerArr[$row2['qcode']] = $row2['correct_answer'];
			 
			if($row2['misconceptionque'] == 'Y') {
				$misconceptionque_arr[] = $row2['qcode'];
				$misconceptionque_arr_with_ans[$row2['qcode']] = $row2['correct_answer'];
			}	
		}
		
		$repqry = "SELECT reporting_id,papercode,sst_list,reporting_head FROM da_reportingDetails WHERE papercode = '".$papercode."'";
		$repdbqry = new dbquery($repqry,$connid);
		while($reportingrow = $repdbqry->getrowarray()){
			$reportingtopic_arr[$reportingrow['reporting_id']] = $reportingrow['reporting_head'];
			$reporting_subsubtopicarr[$reportingrow['reporting_id']] = $reportingrow['sst_list'];
		}

		##### Generating Array For Reporting purpose ########
		foreach($reporting_subsubtopicarr as $reportingid => $subsubtopicids){
			
			$ReportingQuesArr[$reportingid] = array();
			if(strpos($subsubtopicids,",") === false){
				//$ReportingQuesArr[$reportingid] = $subtopic_arr[$subsubtopicids];
				$ReportingQuesArr[$reportingid] = $subsubtopic_arr[$subsubtopicids];
			}else{
				foreach(explode(",",$subsubtopicids) as $key => $subsubtopicid){
					//for($i=0;$i<sizeof($subtopic_arr[$subsubtopicid]);$i++)
					for($i=0;$i<sizeof($subsubtopic_arr[$subsubtopicid]);$i++)
					{
						//array_push($ReportingQuesArr[$reportingid],$subtopic_arr[$subsubtopicid][$i]);
						array_push($ReportingQuesArr[$reportingid],$subsubtopic_arr[$subsubtopicid][$i]);
					}
				}
			}
		}
						
		$QuesWiseStudentPerfo = $this->GettopicWiseStudentAnswer($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		$DiffEasyQuestions = $this->getDifficultAndEasiestQueArray($QuesWiseStudentPerfo);
		$MisconceptonQuestions = $this->getMisconceptionQueToDisplay($misconceptionque_arr,$ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		
		/*echo "<pre>";
		print_r($MisconceptonQuestions);
		echo "</pre>";
		exit;*/
		
		foreach($request_arr as $request_id => $examcodearr){
			foreach($examcodearr as $examcode => $section){
				$this->GenerateSectionReportPDF($request_id,$examcode,$ExamCodeInfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$QuesWiseStudentPerfo,
											   $DiffEasyQuestions,$MisconceptonQuestions,$SubTopicWisePerfoArr,$SectionWiseStudents,$connid);
			}
		}
		
	}

	
	function DrawDiffEasyQueTable($pdf,$ypos,$examcode,$section,$DiffEasyQuestions,$questionSeq,$buffersize){
		
		
		#### Creating String for Easy and Diffcult question no for section and all sections
		foreach($DiffEasyQuestions[$examcode] as $difficulty => $qcodearr){
			//$QuestionStrArr[$examcode][$difficulty] = "";
			$QuestionArr[$examcode][$difficulty] = array();
			foreach($qcodearr as $qcode => $avgperfo){
					$QuestionArr[$examcode][$difficulty][] = ($questionSeq[1][$qcode]+1);
					//$QuestionStr[$examcode][$difficulty] .= ($questionSeq[1][$qcode]+1).",";
				}
		}
		
		
		foreach($DiffEasyQuestions[ALL] as $difficulty => $qcodearr){
			//$QuestionStrArr[ALL][$difficulty] = "";
			$QuestionArr[ALL][$difficulty] = array();
			foreach($qcodearr as $qcode => $avgperfo){
					$QuestionArr[ALL][$difficulty][] = ($questionSeq[1][$qcode]+1);
					//$QuestionStrArr[ALL][$difficulty] .= ($questionSeq[1][$qcode]+1).",";
				}
		}
		
		# PROCESS FOR DISPLYAING DIFF EASY QUESTION SERIALLY
		$QuestionStr[$examcode][DIFF] = "";
		$QuestionStr[$examcode][EASY] = "";
		$QuestionStr[ALL][DIFF] = "";
		$QuestionStr[ALL][EASY] = "";
		
		if(is_array($QuestionArr[$examcode][DIFF]) && count($QuestionArr[$examcode][DIFF]) > 0){
			sort($QuestionArr[$examcode][DIFF],SORT_NUMERIC);
			$QuestionStr[$examcode][DIFF] = implode(",",$QuestionArr[$examcode][DIFF]);
		}
		
		
		if(is_array($QuestionArr[$examcode][EASY]) && count($QuestionArr[$examcode][EASY]) > 0){
			sort($QuestionArr[$examcode][EASY],SORT_NUMERIC);
			$QuestionStr[$examcode][EASY] = implode(",",$QuestionArr[$examcode][EASY]);
		}
		
		if(is_array($QuestionArr[ALL][DIFF]) && count($QuestionArr[ALL][DIFF]) > 0) {
			sort($QuestionArr[ALL][DIFF],SORT_NUMERIC);
			$QuestionStr[ALL][DIFF] = implode(",",$QuestionArr[ALL][DIFF]);
		}
		
		if(is_array($QuestionArr[ALL][EASY]) && count($QuestionArr[ALL][EASY]) > 0) {
			sort($QuestionArr[ALL][EASY],SORT_NUMERIC);
			$QuestionStr[ALL][EASY] = implode(",",$QuestionArr[ALL][EASY]);
		}
		
		########### PROCESS END #####################
		
		
		$tbl=0;
		$col = 1;
		$row = 1;
		$noofrows = 4;
		$fontsize = 8;
		$returnarr = array();
		
		$assumed_height = ($noofrows * 10) + $buffersize;
		
		if($ypos + $assumed_height < $this->bottom_margin){
			
			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			
		    $this->LoadpdfFont($pdf,$this->fontname);
			
			pdf_setfont($pdf, $this->font, $this->fontsize);

			$xpos = $this->left_margin;
			$ypos = $this->page_height-$this->top_margin-$buffersize;
			
			if($newpageflag==0)
				$newpageflag=1;
		} else{
			$ypos = $ypos - $buffersize;
		}
		
		$llx= $this->page_width - $this->right_margin; // TABLE WIDTH
		$lly= $assumed_height; // TABLE HEIGHT
		
		$urx= $this->left_margin;   //POSITION OF X
		$ury= $ypos;  //POSITION OF Y
		
		########## 	GENERATING TABLE FOR DIFFICULT AND EASY QUESTIONS ###########################################
		
		$optlist = "fittextline={position=center font=" . $this->font . " fontsize=$fontsize boxsize={30 10}} rowspan=2 colwidth=30% rowheight=10 matchbox={fillcolor={gray .92}}";
		$tbl = pdf_add_table_cell($pdf, $tbl, 1, 1, "Question(s) that the students found", $optlist);
		
		$optlist = "fittextline={position=center font=" . $this->font . " fontsize=$fontsize} rowheight=10 matchbox={fillcolor={gray .92}}";
		$tbl = pdf_add_table_cell($pdf, $tbl, 1, 3, "most difficult", $optlist);
		
		$tbl = pdf_add_table_cell($pdf, $tbl, 1, 4, "easiest", $optlist." matchbox={fillcolor={gray .75}}");
		
		$optlist = "fittextline={position={center center} font= $this->font fontsize=$fontsize} colspan=2 matchbox={fillcolor={gray .92}}";
		$tbl = pdf_add_table_cell($pdf, $tbl, 2, 1, "Question no.", $optlist);
		
		$optlist = "fittextline={position=center font=" . $this->font . " fontsize=$fontsize} colwidth=35% rowheight=10";
		$tbl = pdf_add_table_cell($pdf, $tbl, 2, 2, "Section ".$section, $optlist);
		
		$optlist = "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} colwidth=35% rowheight=10";
		$tbl = pdf_add_table_cell($pdf, $tbl, 2, 3, $QuestionStr[$examcode][DIFF], $optlist);
		$tbl = pdf_add_table_cell($pdf, $tbl, 2, 4, $QuestionStr[$examcode][EASY], $optlist." matchbox={fillcolor={gray .75}}");
		
		$optlist = "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} "."colwidth=35% rowheight=10";		
		$tbl = pdf_add_table_cell($pdf, $tbl, 3, 2, "All section", $optlist);
		
		$optlist = "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} ";		
		$tbl = pdf_add_table_cell($pdf, $tbl, 3, 3, $QuestionStr['ALL'][DIFF], $optlist);
		$tbl = pdf_add_table_cell($pdf, $tbl, 3, 4, $QuestionStr['ALL'][EASY], $optlist." matchbox={fillcolor={gray .75}}");
		
		/* Place the table instance */
		$optlist = "stroke={{line=other linewidth=0.1}} ";
		$result = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
		
		###################### TABLE END #######################################################
		
		if ($result ==  "_error") {
			die("Couldn't place table: " . PDF_get_errmsg($p));
		}
		
		$returnarr[0] = $ury - $assumed_height;
		$returnarr[1] = $newpageflag;
		return $returnarr;
		
		
	}
	
	function drawSubtopicWiseStudentPerfoTable($pdf,$ypos,$request_id,$examcode,$reportingtopic_arr,$ReportingQuesArr,$questionSeq,$QuesWiseStudentPerfo,$buffersize){
		
		if(!is_array($reportingtopic_arr) || count($reportingtopic_arr) == 0)
			return;
				
		$returntocalling = array();
		$fontsize = 7;
				
		$expected_height = (count($reportingtopic_arr)*2) * 15;
		$remaining_height = $ypos + $buffersize + $this->bottom_margin;
		
		if(($expected_height) > $remaining_height) {
			
			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			
			$this->LoadpdfFont($pdf,$this->fontname);
			
			pdf_setfont($pdf, $this->font,$fontsize);

			$xpos = $this->left_margin;		   // Left margine
			$ypos = $this->page_height-$this->top_margin-$buffersize;  // Top margine
			
			if($newpageflag==0)
				$newpageflag=1;
				
		} else{
			
			$ypos = $ypos - $buffersize;
		}	
				
		/*echo "<pre>";
		print_r($reportingtopic_arr);
		echo "</pre>"; 
		
		echo "<pre>";
		print_r($ReportingQuesArr);
		echo "</pre>";
		
		echo "<pre>";
		print_r($questionSeq);
		echo "</pre>";*/
		
		$ReportingQueArrSorted = array();
		foreach($ReportingQuesArr as $reporting_id => $quearr)
		{
			foreach($quearr as $key => $question) {
			
				$position = $questionSeq[1][$question] + 1;
				$ReportingQueArrSorted[$reporting_id][$position] = $question;
			}
			ksort($ReportingQueArrSorted[$reporting_id],SORT_NUMERIC); // if we have to take only the questions of subtopic in sorting order than use this
		}
		//arsort($ReportingQueArrSorted,SORT_NUMERIC); // if we want all question should be sorted that might be change the reporting topic order
		
		$maxcolforque = 0;
		foreach($ReportingQueArrSorted as $reportingid => $questionsarray){
			
			if(count($questionsarray) > $maxcolforque)
				$maxcolforque = count($questionsarray);
		}
		
		// 155 = 125 -> for first column fixed + 30 for last column fixed
		//echo "<br> Width for question ".$widthneededforques = $maxcolforque * 15;
		//echo "<br> width for second colm:".$widthforsecondcol = $this->page_width - $this->right_margin - $widthneededforques - 185;
		$perforcolwidth = 20;
		$widthneededforques = $maxcolforque * $perforcolwidth;
		$widthforsecondcol = $this->page_width - $this->right_margin - $widthneededforques - 205;
		pdf_setfont($pdf, $this->font,$fontsize);
		
		$tf=0; $tbl=0;
		$col = 1;
		$row = 0;
		
		$llx = $this->page_width - $this->right_margin; // TABLE WIDTH
		$lly= (count($reportingtopic_arr)*2) * 15; // TABLE HEIGHT
		//$lly = 650; // TABLE HEIGHT
		
		$urx=$this->left_margin;   //POSITION OF X
		$ury=$ypos;  //POSITION OF Y
		
		$rowmax = count($reportingtopic_arr)*2;
		$colmax = $maxcolforque + 3; // (3 = reporting head,question no,average)
		pdf_setlinewidth($pdf, 0.1);
			
			foreach($ReportingQueArrSorted as $reportingid => $questionsarray){
				
				$row++;
				
				$tbl = PDF_add_table_cell($pdf, $tbl, 1, $row, "", "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} colwidth=170 margin=2");
				$tbl = PDF_add_table_cell($pdf, $tbl, 2, $row, "Question No", "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} colwidth=$widthforsecondcol rowheight=10");
				
		        $question = isset($questionsarray[$keyidforarr])?$questionsarray[$keyidforarr]:0;
		        $col = 3;
		        foreach($questionsarray as $key => $queno){
		        	$quesequence = $questionSeq[1][$queno] + 1;
		        	$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $quesequence, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth");
		        	$col ++;
		        }
		    	
		        if($col != $colmax) {
			        for ($col; $col <= $colmax; $col++) {    	
			        	if($col != $colmax){
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, " ", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth");
			        	}
			        	else{
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "Average", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35");
			        	}
			        }	
		    	}else {
		    		
		    		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "Average", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35");
		    	}
		    	
		    	######## Started Second Row ##############
		    	
		    	$row++;
		    	$tfoptlist = "font=".$this->font." fontsize=$fontsize leading=110%";
		    	$tf =  pdf_add_textflow($pdf,0,$reportingtopic_arr[$reportingid], $tfoptlist);
		    	$tbl = PDF_add_table_cell($pdf, $tbl, 1, $row, "", "textflow=".$tf." fittextflow={firstlinedist=capheight} colwidth= 170 rowheight =15 fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} margin=2");
		    	$tbl = PDF_add_table_cell($pdf, $tbl, 2, $row, "% of student answering correctly", "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} colwidth=$widthforsecondcol rowheight=15");
				
		        $question = isset($questionsarray[$keyidforarr])?$questionsarray[$keyidforarr]:0;
		        $col = 3;
		        $totqueforsubtopic = 0;
		        $totPerfoQuewise = 0;
		        foreach($questionsarray as $key => $queno){
		        	
		        	$studentperfo = round($QuesWiseStudentPerfo[$examcode][$queno]);
		        	
		        	if($studentperfo >= 80)
		        		$matchbox = "matchbox={fillcolor={gray .85}}";
		        	elseif($studentperfo <= 35)
		        		$matchbox = "matchbox={fillcolor={gray .75}}";
		        	else
		        		$matchbox = "";
		        		
		        	$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $studentperfo, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth rowheight=15 $matchbox");
		        	$totPerfoQuewise += $studentperfo;
		        	$col ++;
		        	$totqueforsubtopic++;
		        }
		    	
		        $avgPerfoStud = round($totPerfoQuewise/$totqueforsubtopic);
		        
		        if($col != $colmax) {
			        for ($col; $col <= $colmax; $col++) {    	
			        	if($col != $colmax)  
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row," ", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth rowheight=15");
			        	else
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $avgPerfoStud, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35 rowheight=15");
			        }	
		    	}
		    	else {
		    		
		    		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $avgPerfoStud, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35");
		    	}
			}
		
		
		/* Place the table instance */
		$optlist = "header=1 fill={{area=rowodd fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}} ";
		$result = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
		
		
		if ($result ==  "_error") {
			die("Couldn't place table: " . PDF_get_errmsg($p));
		}
		
		$returntocalling[0] = $ury - $expected_height;
		$returntocalling[1] = $newpageflag;
		return $returntocalling;
	}
	
	function GenerateSectionReportPDF($request_id,$examcode,$ExamCodeInfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$QuesWiseStudentPerfo,$DiffEasyQuestions,$MisconceptonQuestions,$SubTopicWisePerfoArr,$SectionWiseStudents,$connid){
		
		/*echo "<pre>";
		print_r($ExamCodeInfo);
		echo "</pre>";
		exit;*/
		
		$doublelinebreak = 20;
		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		$schoolcode = $ExamCodeInfo[$examcode]["schoolcode"];
		
		$pdf = pdf_new();
		pdf_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 7.0.2
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");
		
		$this->LoadpdfFont($pdf,$this->fontname);
		
		if(!is_dir(constant("PATH_SCHOOLREPORT")."/$schoolcode/"))
			mkdir(constant("PATH_SCHOOLREPORT")."/$schoolcode/",0777);
			
		if(!is_dir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/"))
			mkdir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/",0777);	
			
		if(!is_dir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/reports/"))
			mkdir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/reports/",0777);
			
		$ActualSectionReportPath = constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/reports/";
			
		if(!is_dir($ActualSectionReportPath."/$examcode/"))
			mkdir($ActualSectionReportPath."/$examcode/",0777);
				
		pdf_begin_document($pdf,$ActualSectionReportPath."/$examcode/$examcode.pdf","");
				
		$headerimage = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."/report_logo.jpg", "");
		
		$image_width = pdf_get_value($pdf, "IMAGEWIDTH", $headerimage);
		$image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $headerimage);
		
	    // Need to check with the arpit
        $ypos = $this->page_height-139;
        $xpos = $this->left_margin + 10;
        $pageheaderypos = $ypos;
        
        ############### Header #######################
        
        $schoolqry = "SELECT schoolname FROM schools WHERE schoolno = '".$ExamCodeInfo[$examcode]["schoolcode"]."'";
        $dbschqry = new dbquery($schoolqry,$connid);
        $schoolinfo = $dbschqry->getrowarray();
        
        $teacherqry = "SELECT da_userMaster.first_name, da_userMaster.last_name, da_userMaster.email
					   FROM da_userMaster
					   LEFT JOIN da_userMapping ON da_userMaster.id = da_userMapping.user_id
					   WHERE da_userMapping.class = '".$ExamCodeInfo[$examcode]["class"]."'
					   AND da_userMapping.subject = '".$ExamCodeInfo[$examcode]["subject"]."'
					   AND da_userMapping.section = '".$ExamCodeInfo[$examcode]["section"]."'";
        $dbteachqry = new dbquery($teacherqry,$connid);
        $teacherrow = $dbteachqry->getrowarray();
		
		pdf_begin_page($pdf, $this->page_width, $this->page_height);
		pdf_fit_image($pdf,$headerimage,$xpos,$ypos, "scale 1");
		
		pdf_setlinewidth($pdf,0.1);
		pdf_moveto($pdf,$this->left_margin,$ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);
	    
	    $xpos = $this->left_margin+$image_width+10;
	    $ypos = $this->page_height-70;
	    
	    pdf_setfont($pdf,$this->fontbold,$this->fontsize);
	    pdf_show_xy($pdf,"CLASS REPORT : (".ucfirst($schoolinfo['schoolname']).")",$xpos,$ypos);
	    
	    $xpos = $xpos - 10;	
	    $ypos = $ypos - $doublelinebreak - $singlelinebreak;
	    
	    pdf_setfont($pdf,$this->font,$this->fontsize);
	    pdf_show_xy($pdf,"Test: ".$ExamCodeInfo[$examcode]['testname'],$xpos,$ypos);
	    
	    		
		$dateParameters=explode("-",$ExamCodeInfo[$examcode]['testdate']);
		$newDate=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
	    
		pdf_fit_textline($pdf , "Date: ".$newDate, $this->page_width-($this->right_margin) , $ypos ,"position={right bottom}");
	    
	    $ypos -= $oneandhalflinebreak;
	    pdf_show_xy($pdf,"Class: ".$ExamCodeInfo[$examcode]['class'],$xpos,$ypos);
	    
	    if(isset($ExamCodeInfo[$examcode]['section']) && $ExamCodeInfo[$examcode]['section'] != "")
	    	pdf_fit_textline($pdf , "Section: ".$ExamCodeInfo[$examcode]['section'], $this->page_width-($this->right_margin) , $ypos ,"position={right bottom}");
	    
	    $ypos -= $oneandhalflinebreak;
	    
	    if($teacherrow['first_name'] != "" && $teacherrow['last_name'] != "")
	    	$teachername = $teacherrow['first_name']." ".$teacherrow['last_name'];
	    elseif($teacherrow['first_name'] != "")
	    	$teachername = $teacherrow['first_name'];
	    else 	
	    	$teachername = "";	
	    	
	    pdf_show_xy($pdf,"Number of Students: ".$ExamCodeInfo[$examcode]['totalstudents'],$xpos,$ypos);
	    if($teachername != "")
	    	pdf_fit_textline($pdf , "Teacher Name: ".$teachername, $this->page_width-($this->right_margin) , $ypos ,"position={right bottom}");
	    
	    ####################################################
	    
	    ##### calculations for topic performamce 
		$subtopiccount = 0;
		$SectionMaxPerfo[$examcode] = 0;
		foreach($SubTopicWisePerfoArr as $subtopic => $sectionwiseperfoarr){
			$subtopiccount++;
			foreach($sectionwiseperfoarr as $section => $perfo){
				$OverAllPerfo[$section] += $perfo;
				$SectionSubtopicPerfo[$examcode][$subtopic] = $perfo;
				//$SectionSubtopicPerfo[$section][$subtopic] = $perfo;
			}
		}
		
		asort($SectionSubtopicPerfo[$examcode],SORT_NUMERIC);
		$RecommendedArr = $SectionSubtopicPerfo[$examcode];
		
		
		arsort($SectionSubtopicPerfo[$examcode],SORT_NUMERIC);
		$BestPerfoArr = $SectionSubtopicPerfo[$examcode];
		
		$BestPerfoTopic = "";
		foreach($BestPerfoArr as $reporting_id => $perfo){
			$BestPerfoTopic = $reportingtopic_arr[$reporting_id];
			break;
		}
		
		$noofrecm = 0;
		$RecommendedTopics = "";
		foreach($RecommendedArr as $reporting_id => $perfo){
			$noofrecm++;
			$RecommendedTopics .= $reportingtopic_arr[$reporting_id]."&";
			if($noofrecm == 2) break;
		}
		
		/*echo "<pre>";
        print_r($RecommendedArr);
        echo "</pre>";*/
		
		$higherthanother = 0;
		$lowerthanother = 0;
		
		foreach($OverAllPerfo as $section => $perfo){
			
			if(($OverAllPerfo[$examcode]/$subtopiccount) > ($OverAllPerfo[ALL]/$subtopiccount)){
				$higherthanother = ($OverAllPerfo[$examcode]/$subtopiccount) - ($OverAllPerfo[ALL]/$subtopiccount);
			}elseif(($OverAllPerfo[$examcode]/$subtopiccount) < ($OverAllPerfo[ALL]/$subtopiccount)){
				$lowerthanother = ($OverAllPerfo[ALL]/$subtopiccount) - ($OverAllPerfo[$examcode]/$subtopiccount);
			}
		}
		$perfostring = "";
		if($higherthanother > 0){
			$perfostring ="The class performance is ".round($higherthanother,2)."% higher than the all class average in this topic for your school";
		}elseif($lowerthanother > 0){
			$perfostring ="The class performance is ".round($lowerthanother,2)."% below than the all class average in this topic for your school";
		}
		
		$SectionPerfo = round($OverAllPerfo[$examcode]/$subtopiccount,2);
		########## end calculation for topic performance
	    
	    $ypos = $pageheaderypos - $singlelinebreak;
	    
	    //pdf_show_xy($pdf,"Dear Teacher,",$this->left_margin,$ypos);
		//$ypos -= $singlelinebreak;
		
		$lineHeight = 20; 
		if($teachername == "")
			$teachername = "Teacher";
		
		$textleft = "Dear ".$teachername."\n\nThe topic performance of your class in the test is $SectionPerfo%.$perfostring ";
		$nooflines1 = ceil(pdf_stringwidth($pdf,$textleft,$this->font,$this->fontsize)/(($this->page_width-$this->left_margin-$this->right_margin)/2));
	
   		$textflow1 = PDF_create_textflow($pdf, $textleft, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=100%");
			do {
				$result = PDF_fit_textflow($pdf, $textflow1, $this->left_margin,$ypos,297,$nooflines1*20,"");
				
			} while (strcmp($result, "_stop"));
			
		PDF_delete_textflow($pdf, $textflow1);
		//PDF_rect ($pdf , $this->left_margin , $ypos , ($this->page_width-$this->left_margin-$this->right_margin)/2,$nooflines1*20);
		//pdf_stroke($pdf);
	
		$macro = "<macro {H1 {fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$this->fontsize encoding=unicode}}><&Body>";
		$textright = "Best Performance is in subtopic\n<&H1>* $BestPerfoTopic.\n\n<&Body>Top two subtopics recommended for remediation\n<&H1>* ".str_replace("&","\n* ",rtrim($RecommendedTopics,"&"));
		
		$nooflines2 = ceil(pdf_stringwidth($pdf,$textright,$this->font,$this->fontsize)/(($this->page_width-$this->left_margin-$this->right_margin)/2));
		
   		$textflow2 = PDF_create_textflow($pdf, $macro.$textright, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=100%");
			do {
				$result = PDF_fit_textflow($pdf, $textflow2,(($this->page_width)/2)+5,$ypos,545,500,"");
			} while (strcmp($result, "_stop"));
			
		PDF_delete_textflow($pdf, $textflow2);
		//PDF_rect ($pdf ,($this->page_width)/2, $ypos ,($this->page_width-$this->right_margin-$this->left_margin)/2,$nooflines2*20);
		//pdf_stroke($pdf);	
		
		if($nooflines1 > $nooflines2)
			$drawlineheight = $nooflines1 *20;
		else 	
			$drawlineheight = $nooflines2 *20;
		
		$ypos -= $drawlineheight;
				
	  	pdf_setlinewidth($pdf,0.1);
		pdf_moveto($pdf,$this->left_margin,$ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin,$ypos);
	    pdf_stroke($pdf);
	    
		pdf_moveto($pdf,($this->page_width)/2,$pageheaderypos);
		pdf_lineto($pdf,($this->page_width)/2,$ypos);
	    pdf_stroke($pdf);
	    
	    $ypos -= $singlelinebreak;
	    $yposbeforetbl = $ypos;
	    
	    $macro1 = "<macro {H1 {fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$this->fontsize encoding=unicode}}><&H1>";
	    $content = "Key ideas assessed:\n".
	    		   "<&Body>The following sub topics were assessed in the test. The perfomance of the class by each sub topic and the class performance in each question".
	    		   " of the sub topic is also available in the table.";
	    $nooflines = ceil(pdf_stringwidth($pdf,$content,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));	
	    
	    $buffersize = $nooflines * 20; // In Textflow we need to take lineheight = 20
	    
	    $ypos_returned = $this->drawSubtopicWiseStudentPerfoTable($pdf,$ypos,$request_id,$examcode,$reportingtopic_arr,$ReportingQuesArr,$questionSeq,$QuesWiseStudentPerfo,$buffersize);
	   	
	    $ypos = $ypos_returned[0];
	    
	    $isNewPage=$ypos_returned[1];
	   	
	   	if($isNewPage==1){
	   		$yposbeforetbl = $this->page_height - $this->top_margin;
		}	
	    					  
   		$textflow = PDF_create_textflow($pdf, $macro1.$content, "fontname=$this->fontname fontsize=$this->fontsize encoding=winansi leading=100%");
		do {
		    $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, $buffersize, $this->page_width - $this->right_margin, $yposbeforetbl, "");
		    
		} while (strcmp($textflowresult, "_stop"));
		
		PDF_delete_textflow($pdf, $textflow);
		
		if($this->fontname == "Verdana")
			$ypos -= $singlelinebreak;
		
		pdf_setfont($pdf,$this->font,8);
		pdf_show_xy($pdf,"* Notes: All the question numbers are only based on paper version 1",$this->left_margin,$ypos);
		
		$ypos -= $doublelinebreak;
		pdf_setfont($pdf,$this->font,$this->fontsize);
	
		$yposbeforequetbl = $ypos;
		
		$nooflines1 = ceil(pdf_stringwidth($pdf,"Most Difficult Questions :",$this->font,$this->fontsize)/(($this->page_width-$this->left_margin-$this->right_margin)));
		$nooflines2 = ceil(pdf_stringwidth($pdf,"Question Summary",$this->font,$this->fontsize-1)/(($this->page_width-$this->left_margin-$this->right_margin)));
		
		$totnooflines = $nooflines1+$nooflines2;
		
		$buffersize = (($totnooflines-1) * 8) + 10;
		
		$returnypos = $this->DrawDiffEasyQueTable($pdf,$ypos,$examcode,$ExamCodeInfo[$examcode]['section'],$DiffEasyQuestions,$questionSeq,$buffersize);
		
		$ypos = $returnypos[0];
		$newpage = $returnypos[1];
		
		if($newpage == 1)
		{
			$yposbeforequetbl = $this->page_height - $this->top_margin;
		}
		
		pdf_setfont($pdf,$this->font,$this->fontsize);		
		pdf_show_xy($pdf,"Most Difficult Questions :",$this->left_margin,$yposbeforequetbl);
		
		pdf_setfont($pdf,$this->font,$this->fontsize-1);
		pdf_show_xy($pdf,"Question Summary",$this->left_margin,$yposbeforequetbl - 15);
		
		$yposbeforemisconception = $ypos;
		
		$buffersize = 20;
		
		$misconceptioncontent ="This section lists the most common misconceptions in these sub topics and your class performance on those.".
							   " Wherever the performance is below 75%, it is recommended that you address these misconceptions in class using".
							   " the remedial measures provided as guidelines. The teacher sheet numbers relevant to a particular misconceptions".
							   " are also mentioned. It is recommended that you refer to the teacher sheet for further information on the misconception.";
							   
		
		$ypos_returned = autoPublishPaper($pdf,$misconceptioncontent,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin);
		
		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];
		if($newpage == 1){
			$yposbeforemisconception = $this->page_width - $this->top_margin;
		}
		
		pdf_show_xy($pdf,"Misconceptions:",$this->left_margin,$yposbeforemisconception);
		$ypos -= $singlelinebreak;
		
		##################
		
		$i =0;
		foreach($MisconceptonQuestions[$examcode] as $qcode => $answers){
		
				$OptionWiseStudentPerfo = $this->getOptionWisePerfo($SectionWiseStudents,$questionSeq,$qcode,$connid);
				
				$i++;
				$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,remedial_instruction,mcexplanation,mc_ques_title,ts_file,group_id,
						 		 da_questions.passage_id,qms_passage.passage_name
						  FROM da_questions 
						  LEFT JOIN qms_passage ON da_questions.passage_id = qms_passage.passage_id
						  WHERE qcode = '".$qcode."' AND misconception = 1";
				$dbqry = new dbquery($query,$connid);
				$result = $dbqry->getrowarray();
				$correct_answer = $result['correct_answer'];
				$teacher_sheet_code = $result['ts_file'];
				$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";
				$mcexplanation = (isset($result['mcexplanation']) && $result['mcexplanation'] != 'NULL')?$result['mcexplanation']:"";
				
				$passagenamebuffer = 0;
				$passagename = "";
				
				if($ExamCodeInfo[$examcode]['subject'] ==  1 && $result["passage_id"] != 0 && $result['passage_name'] != ""){
					$passagename = $result["passage_name"];
					$nooflinesofpsg = ceil(pdf_stringwidth($pdf,$passagename,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
					$passagenamebuffer = ($nooflinesofpsg * ($this->fontsize)) + $singlelinebreak;
				}
								
			    $nooflines = ceil(pdf_stringwidth($pdf,"Misconception: $concept",$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
			    
			    $buffersize = ($nooflines * ($this->fontsize)) + $singlelinebreak + $passagenamebuffer;
			    
				$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
				
				$qcodestr = str_replace("‘","'",$qcodestr);
			   	$qcodestr = str_replace("’","'",$qcodestr);
			   	$qcodestr = str_replace("–","-",$qcodestr);
			   	$qcodestr = str_replace("…","...",$qcodestr);
			   	$qcodestr = str_replace("Æ","'",$qcodestr);
			   	$qcodestr = str_replace("&nbsp;"," ",$qcodestr);
			   	$qcodestr = str_replace("·",".",$qcodestr);
			   	
			   	$yposbeforequestion = $ypos;
			   	
			   	if($result["group_id"] != 0)
					$imagepathfrom = 2;
				else 	
					$imagepathfrom = $this->imagepathfrom;
			   	
			   	$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin + 27,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin + 27);
			   	
		   	
			   	$isNewPage=$ypos_returned[1];
			   	$yposafterque = $ypos_returned[0];
           		if($isNewPage==1){
           			$yposbeforequestion = $this->page_height-$this->top_margin;
           		}	
           		           		
           		$queno = $questionSeq[1][$qcode] + 1;
			   	pdf_show_xy($pdf,"Q ".$queno.":",50,$yposbeforequestion - $buffersize + 1.5); // 1.5 is added cause in new autopublish paper funciton question print slightly up
			   	
			   	################ Question End #################
			   
			   	$buffersize = 0;
			   	
			   	$ypos_returned = autoPublishPaper($pdf,"Misconception : ".$concept,$this->left_margin,$yposbeforequestion,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin);
			    
			    $newpage = $ypos_returned[1];
			    $yposafterconcept = $ypos_returned[0];
			  
			    pdf_setlinewidth($pdf,0.1);
				pdf_moveto($pdf,$this->left_margin,$yposafterconcept+($singlelinebreak));
				pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposafterconcept+($singlelinebreak));
			    pdf_stroke($pdf);
			    
			    if($passagename != "")
			    {
				    $textflow = PDF_create_textflow($pdf, "Passage: ".$passagename, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=100%");
					do {
					    $passageres = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $yposafterconcept,"");
					} while (strcmp($passageres, "_stop"));
					PDF_delete_textflow($pdf, $textflow);
			    }
			    
			    $ypos = $yposafterque; // As we are printing question first
			    
			   	$ypos -= $singlelinebreak;
			   	
			   	$highestmisconception = 0;
			   	$HighestMisConc = "";
			   	foreach($OptionWiseStudentPerfo[$examcode] as $option => $performance){
			   		
			   		if($performance > $highestmisconception && $option != $correct_answer){
			   			$HighestMisConc = $option;
			   			$highestmisconception = $performance;
			   		}	
			   		
			   	}
			   	
			   	################# option wise student answer table starts ###########################	
			 	$tbl=0;
				$col = 1;
				$row = 1;
				
				$llx= 350; // TABLE WIDTH
				$lly= 15; // TABLE HEIGHT
				
				$urx= $this->left_margin + 25;   //POSITION OF X
				$ury= $ypos;  //POSITION OF Y
				
				$rowmax = 2;
				$colmax = 4;
				
				/* ---------- Fill $row 3 and above with their numbers */
				
				foreach($this->ansoptionarr as $key => $value){
		    		$key++;
			    	$optlist = "colwidth=25% rowheight=10 fittextline={font=" . $this->font . " fontsize=8} margin=4";
			        $tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "Option ".$key, $optlist);
			        if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    		$col++;
		    	}
		    	
		        $row++;
		        $col = 1;
		        $highestmisconception = 0;
		        foreach($OptionWiseStudentPerfo[$examcode] as $option => $performance){
		        	$matchbox = "";
		        	$matchbox1 = "";
		        	if($option == $correct_answer) $matchbox = " matchbox={fillcolor={rgb 0.0 0.5 0.0}}";
		        	if($option == $HighestMisConc) $matchbox1 = " matchbox={fillcolor={rgb 1.0 0.0 0.0}}";
		        	$optlist = "colwidth=25% rowheight=10 fittextline={font=" . $this->font . " fontsize=8}".$matchbox.$matchbox1." margin=4";
			        $tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $performance."%", $optlist);
			        if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    		$col++;
		        }
				    
				/* Place the table instance */
				$optlist = "header=1 fill={{area=rowodd fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}} ";
				$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);	  	
				################ option wise student answer table ends ###############
			   	
			   	$ypos -= $lly*2 + $singlelinebreak;
			   	
			   	$yposbeforemcexplanation = $ypos;
				$buffersize = 0;
				
			    $ypos_mcexplanation = autoPublishPaper($pdf,$mcexplanation,$this->left_margin+25,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize-1,$this->fontname,'0.1',$this->left_margin+25);
			    
			    $ypos = $ypos_mcexplanation[0];
			   	$isNewPage=$ypos_mcexplanation[1];
           		
			   	if($isNewPage==1){
           			$yposbeforemcexplanation = $this->page_height-$this->top_margin;
           		}	
			   	
			   	$ypos -= $singlelinebreak;
			   	
			   	$yposbeforeremedial = $ypos;
			   	$buffersize = 30;
			    
			    $remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
			    //$nooflines_rm = ceil(pdf_stringwidth($pdf,$remedial_measure,$this->font,9)/($this->page_width-$this->left_margin-$this->right_margin));
			    
			    $ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin);
			    
			    $ypos -= $buffersize;
			   	
			    $ypos = $ypos_returned[0];
			   	$isNewPage=$ypos_returned[1];
           		
			   	if($isNewPage==1){
           			
           			$yposbeforeremedial = $this->page_height-$this->top_margin;
           		}	
			    
			   /* pdf_setlinewidth($pdf,0.1);
				pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial);
				pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
			    pdf_stroke($pdf);*/
			    
			    $yposbeforeremedial -= 10;
			    
			    pdf_show_xy($pdf,"Remedial measure:",$this->left_margin,$yposbeforeremedial);
			    
			    $yposbeforeremedial -= 5;
			    			    
			    pdf_setlinewidth($pdf,0.1);
				pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
				pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
			    pdf_stroke($pdf);
			    
			    if(!is_null($teacher_sheet_code) && $teacher_sheet_code != ""){
			    	$ypos -= $singlelinebreak;
			    	pdf_setfont($pdf,$this->font,$this->fontsize);
			    	pdf_show_xy($pdf,"Teacher Sheet(s):<".$teacher_sheet_code.">",$this->left_margin,$ypos);
			    	$ypos -= 5;
			   		pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$ypos);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
				    pdf_stroke($pdf);
			    }
			    
			    $ypos -= $doublelinebreak;
			    
				if($i == 5) break;
				
		}
		$ypos -= $singlelinebreak;
		
		$TotQuesCount = count($questionSeq[1]);
		$buffersize = 10;
		$yposbeforescorecardtbl = $ypos;
		
		$ypos_returned = $this->DrawSectionWiseStudentsScorecard($pdf,$ypos,$request_id,$examcode,$TotQuesCount,$buffersize,$connid);
		
		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];
		
		if($newpage ==1){
			$yposbeforescorecardtbl = $this->page_height - $this->top_margin;
		}
		
		pdf_setfont($pdf,$this->fontbold,$this->fontsize);
		pdf_show_xy($pdf,"Student Score Card",$this->left_margin,$yposbeforescorecardtbl);
		
		/* Draw a circle at position (x, y) with a radius of 40 */
		/*$xt=20; $x = 210; $y=770; $dy=90;
	    pdf_circle($pdf,$x,$dy,2);
	    pdf_closepath_fill_stroke($pdf);	*/
	    //pdf_fit_textline($pdf,"circle() and stroke()", $xt, $y, "fillcolor={gray 0}");
		
		pdf_end_page($pdf);
		pdf_end_document($pdf,"");
	}
	
	function DrawSectionWiseStudentsScorecard($pdf,$ypos,$request_id,$examcode,$TotQuesCount,$buffersize,$connid){
		
		$tbl=0;
		$fontsize = $this->fontsize;
		$margin = 4;
		
		$llx= 350; // TABLE WIDTH
		$lly= 50; // TABLE HEIGHT
		
		$urx= $this->left_margin;   //POSITION OF X
		
		$return_arr = array();
		
		$query = "SELECT da_studentMaster.studentID,da_response.total,da_studentMaster.rollNo,da_studentMaster.studentName
				  FROM da_response
		          LEFT JOIN da_studentMaster ON da_response.studentID = da_studentMaster.studentID
		          WHERE da_response.examcode = $examcode
		          ORDER BY da_studentMaster.rollNo,da_studentMaster.studentID ";
		
		$dbqry = new dbquery($query,$connid);
		$totalrows = $dbqry->numrows();
		
		$expected_tbl_height = ($totalrows+1) * ($this->fontsize + $margin); # 1 for header
		$needed_height = $ypos - $expected_tbl_height - $buffersize;
		
		if($needed_height < 50){
			
			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			
			$this->LoadpdfFont($pdf,$this->fontname);	
			
			pdf_setfont($pdf, $this->font, $fontsize);

			$xpos = $this->left_margin;		   // Left margine
			$ypos = $this->page_height-$this->top_margin-$buffersize;  // Top margine
			
			if($newpageflag==0)
				$newpageflag=1;
			
		}else{
			
			$ypos = $ypos - $buffersize;
		}
		
		############### table started ##############
		# Table header
		$tblrow = 1;
		
		$optlist = "colwidth=20% rowheight=10 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 1, $tblrow,"Roll No", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
			
		
		$optlist = "colwidth=60% rowheight=10 fittextline={position={top left} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 2, $tblrow, "Student Name", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
	    
	    $optlist = "colwidth=20% rowheight=10 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 3, $tblrow,"Score", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
			
			
		##
		
		$tblrow++;
		while($row = $dbqry->getrowarray()){

			
			$studentScore = round(($row["total"]/$TotQuesCount)*100,2);
			
			$tblcol = 1;
			$optlist = "colwidth=20% rowheight=10 fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $row['rollNo'], $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
			
		    $tblcol = 2;
			$optlist = "colwidth=60% rowheight=10 fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, ucfirst(strtolower($row['studentName'])), $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
			
		    $tblcol = 3;
			$optlist = "colwidth=20% rowheight=10 fittextline={position={right center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $studentScore."%", $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $tblrow++;
		}
		
		$optlist = "stroke={{line=other linewidth=0.1}} ";
		$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);
		
		$return_arr[0] = $ypos - $expected_tbl_height;
		$return_arr[1] = $newpageflag;
		return $return_arr;	
	}
	
	function GenerateSchoolReport($request_id=0,$connid){
		
		$this->setgetvars();
		$this->setpostvars();
		
		$request_arr = array();
		$examcode_str = "";
		$section_str = "";
		
		if($request_id != 0)
			$condition = "WHERE request_id = '".$request_id."'";
		
		$query = "SELECT request_id,exam_code,section FROM da_examDetails $condition";
		$dbquery = new dbquery($query,$connid);
		 
		while($row = $dbquery->getrowarray()){
				
			$request_arr[$row['request_id']][$row['exam_code']] = $row['section'];
			$examcode_str .= $row['exam_code'].",";
			$section_str .= $row['section'].",";
		}
		
		/*echo "<pre>";
		print_r($request_arr);
		echo "</pre>";*/
		
		$query = "SELECT da_response.examcode,da_response.paperversion, group_concat( distinct(da_response.studentID) ) AS studentids,
				  da_testRequest.paper_code,B.qcode_list,da_testRequest.test_date,da_testRequest.subject,da_testRequest.class,
				  da_testRequest.schoolCode,da_testRequest.paper_code,da_testRequest.testName,da_examDetails.section,da_examDetails.no_of_students
				  FROM da_examDetails 
				  LEFT JOIN da_response ON da_examDetails.exam_code = da_response.examcode
				  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_paperDetails AS A ON da_testRequest.paper_code = A.papercode
				  LEFT JOIN da_paperDetails AS B ON da_response.paperversion = B.version AND A.papercode = B.papercode
				  WHERE da_examDetails.exam_code IN(".rtrim($examcode_str,',').")
				  GROUP BY da_examDetails.exam_code,da_response.paperversion";

		$dbquery = new dbquery($query,$connid);
		
		if($dbquery->numrows() == 0) die("No Records Found For Given Request Id, Report will not be generated!");
		
		$paperwisesequence = array();
		$AllStudentsArr = array();
		$SectionWiseStudents = array();
		$reportingtopic_arr = array();
		$TestInfo = array();
		
		while($row = $dbquery->getrowarray()){
			
			$ExamCodeInfo[$row['examcode']] = array("papercode"=>$row["paper_code"],"schoolcode"=>$row["schoolCode"],"subject"=>$row['subject'],
							  						"class"=>$row["class"],"testdate"=>$row["test_date"],"testname"=>$row["testName"],
							  						"section"=>$row["section"],"totalstudents"=>$row["no_of_students"]);
							  
			$papercode = $row['paper_code'];
			$schoolcode = $row["schoolCode"];
			$subject = $row['subject'];
			$class = $row["class"];
			$testdate = $row["test_date"];
			$testName = $row["testName"];
			$qcodelist = $row['qcode_list'];
			$paperwiseQueSeq[$row['paperversion']] = explode(',',$row['qcode_list']);
			$SectionWiseStudents[$row['examcode']][$row['paperversion']] = $row['studentids'];
		}
		
		if($qcodelist == "") die("No Questions Found In Paper, Report will not be generated!");
		
		$questionSeq = array();
		foreach($paperwiseQueSeq as $paper => $quesarray){
			$questionSeq[$paper] = array_flip($quesarray);
		}
			
		$misconceptionque_arr = array();
		$misconceptionque_arr_with_ans = array();
		$query2 = "SELECT qcode,subtopic_code,sub_subtopic_code,correct_answer,if(misconception = 1,'Y','N') as misconceptionque 
				   FROM da_questions WHERE qcode IN($qcodelist)";
		
		$dbquery2 = new dbquery($query2,$connid);
		while($row2 = $dbquery2->getrowarray()){
			
			$subsubtopic_arr[$row2['sub_subtopic_code']][] = $row2['qcode'];
			$subtopic_arr[$row2['subtopic_code']][] = $row2['qcode'];
			
			$subsubtopicQue_str[$row2['sub_subtopic_code']] .= $row2['qcode'].",";
			$subtopicQue_str[$row2['subtopic_code']] .= $row2['qcode'].",";
			
			$CorrectAnswerArr[$row2['qcode']] = $row2['correct_answer'];
			 
			if($row2['misconceptionque'] == 'Y') {
				$misconceptionque_arr[] = $row2['qcode'];
				$misconceptionque_arr_with_ans[$row2['qcode']] = $row2['correct_answer'];
			}	
		}
		
		$repqry = "SELECT reporting_id,papercode,sst_list,reporting_head FROM da_reportingDetails WHERE papercode = '".$papercode."'";
		$repdbqry = new dbquery($repqry,$connid);
		while($reportingrow = $repdbqry->getrowarray()){
			$reportingtopic_arr[$reportingrow['reporting_id']] = $reportingrow['reporting_head'];
			$reporting_subsubtopicarr[$reportingrow['reporting_id']] = $reportingrow['sst_list'];
		}

		##### Generating Array For Reporting purpose ########
		foreach($reporting_subsubtopicarr as $reportingid => $subsubtopicids){
			
			$ReportingQuesArr[$reportingid] = array();
			if(strpos($subsubtopicids,",") === false){
				//$ReportingQuesArr[$reportingid] = $subtopic_arr[$subsubtopicids];
				$ReportingQuesArr[$reportingid] = $subsubtopic_arr[$subsubtopicids];
			}else{
				foreach(explode(",",$subsubtopicids) as $key => $subsubtopicid){
					//for($i=0;$i<sizeof($subtopic_arr[$subsubtopicid]);$i++)
					for($i=0;$i<sizeof($subsubtopic_arr[$subsubtopicid]);$i++)
					{
						//array_push($ReportingQuesArr[$reportingid],$subtopic_arr[$subsubtopicid][$i]);
						array_push($ReportingQuesArr[$reportingid],$subsubtopic_arr[$subsubtopicid][$i]);
					}
				}
			}
		}

		$MisconceptonQuestions = $this->getMisconceptionQueToDisplay($misconceptionque_arr,$ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);# used in barchart
		
		/*echo "<pre>";
		print_r($SubTopicWisePerfoArr);
		echo "</pre>";*/
		
		$subtopiccount = 0;
		foreach($SubTopicWisePerfoArr as $subtopic => $perfoArr){
			$subtopiccount++;
			foreach($perfoArr as $section => $perfo){
				
				$SectionAvgPerfo[$section] += $perfo;
				$SectionSubtopicPerfo[$section][$subtopic] = $perfo;
				
			}
		}
		
		asort($SectionSubtopicPerfo[ALL],SORT_NUMERIC);
		$RecommendedArr = $SectionSubtopicPerfo[ALL];
		
		arsort($SectionSubtopicPerfo[ALL],SORT_NUMERIC);
		$BestPerfoArr = $SectionSubtopicPerfo[ALL];
		
		$BestPerfoTopic = "";
		foreach($BestPerfoArr as $reporting_id => $perfo){
			$BestPerfoTopic = $reportingtopic_arr[$reporting_id];
			break;
		}
		
		$noofrecm = 0;
		$RecommendedTopics = "";
		foreach($RecommendedArr as $reporting_id => $perfo){
			$noofrecm++;
			$RecommendedTopics .= $reportingtopic_arr[$reporting_id]." & ";
			if($noofrecm == 2) break;
		}

		arsort($SectionAvgPerfo,SORT_NUMERIC);
		list($higherSection, $higherSecAvg) = each($SectionAvgPerfo);
		
		asort($SectionAvgPerfo,SORT_NUMERIC);
		list($lowersection, $lowerSecAvg) = each($SectionAvgPerfo);
		
		$highestSecPerfo = round($higherSecAvg/$subtopiccount,2);
		$lowestSecPerfo = round($lowerSecAvg/$subtopiccount,2);
		$AllSecAvgPerfo = round($SectionAvgPerfo[ALL]/$subtopiccount,2);
		
				
		$doublelinebreak = 20;
		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		
		$pdf = pdf_new();
		pdf_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");
		
		$this->LoadpdfFont($pdf,$this->fontname);
		
		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/",0777);
			
		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/",0777);	
			
		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/",0777);	
			
		$ActualStudentReportPath = constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports";
			
		pdf_begin_document($pdf,$ActualStudentReportPath."/$request_id.pdf","");
				
		$headerimage = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."/report_logo.jpg", "");
		
		$image_width = pdf_get_value($pdf, "IMAGEWIDTH", $headerimage);
		$image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $headerimage);
		
	    // Need to check with the arpit
        $ypos = $this->page_height-139;
        $xpos = $this->left_margin + 10;
        $pageheaderypos = $ypos;
        
        ############### Header #######################
        
		pdf_begin_page($pdf, $this->page_width, $this->page_height);
		pdf_fit_image($pdf,$headerimage,$xpos,$ypos, "scale 1");
		
		pdf_setlinewidth($pdf,0.1);
		pdf_moveto($pdf,$this->left_margin,$ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);
	    
	    $xpos = $this->left_margin+$image_width+10;
	    $ypos = $this->page_height-70;
	    
	    pdf_setfont($pdf,$this->fontbold,$this->fontsize);
	    pdf_show_xy($pdf,"School Report For a Test (Class:$class - ".count($request_arr[$request_id])." Sections)",$xpos,$ypos);
	   
	    $dateParameters=explode("-",$testdate);
		$newDate=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0]; 
	    $thetext = "Report Date: ".$newDate;
	    
	    $strwidth = pdf_stringwidth($pdf,$thetext,$this->fontbold,$this->fontsize)/(($this->page_width-$this->left_margin-$this->right_margin));
	    
	    $availablelength = $this->page_width - $this->left_margin - $image_width - $this->right_margin;
	    $xpos = $this->left_margin + $image_width + ($availablelength - $strwidth)/2;
	    
	    $ypos = $ypos - $doublelinebreak - $singlelinebreak;
	    
	  	pdf_fit_textline($pdf , $thetext, $xpos , $ypos ,"position={right bottom}");
	  	
	    ####################################################
	    
	    $ypos = $pageheaderypos - $doublelinebreak;
	    
	    pdf_show_xy($pdf,"Summary:",$this->left_margin,$ypos);

	    pdf_setfont($pdf,$this->font,$this->fontsize);
		
		$ypos -= $singlelinebreak;
		$leading = 120;
		
		$summarytext = "The topic test on ".$testName." was taken by the sections ".rtrim($section_str,",")." of class ".$class.". The average performance acros all sections is $AllSecAvgPerfo%, with section ".$request_arr[$request_id][$higherSection]."".
					   " scoring the highest average at $highestSecPerfo% and section ".$request_arr[$request_id][$lowersection]." scroing the lowest at $lowestSecPerfo%. Across all sections the sub topic with the best performance is".
					   " $BestPerfoTopic. The lowest two sub topics with the least average scores are ".rtrim($RecommendedTopics," & ").".";

		$nooflinessummary = ceil(pdf_stringwidth($pdf,$summarytext,$this->font,$this->fontsize)/(($this->page_width-$this->left_margin-$this->right_margin)));

		$textflow = pdf_create_textflow($pdf, $summarytext, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=$leading%");
		do {
		    $txtflowresult = pdf_fit_textflow($pdf, $textflow, $this->left_margin, 120, $this->page_width-$this->right_margin, $ypos, "");
		    
		} while (strcmp($txtflowresult, "_stop"));
		
		pdf_delete_textflow($pdf, $textflow);
		
		$linespacing = ($this->fontsize * $leading)/100;
		$ypos -= ($nooflinessummary+1) * $linespacing; // $font_size*leading/100
		
		$ypos -= $doublelinebreak;
		
		if($this->fontname == "Verdana" && $this->fontsize > 9)
			$ypos -= $singlelinebreak;
		
		
		pdf_setfont($pdf,$this->fontbold,$this->fontsize);
		pdf_show_xy($pdf,"Misconceptions:",$this->left_margin,$ypos);
		
		$ypos -= $doublelinebreak;
		
		pdf_setfont($pdf,$this->font,$this->fontsize);
		pdf_show_xy($pdf,"The most common misconceptions across all sections are mentioned in the next section:",$this->left_margin,$ypos);
		
		$ypos -= $doublelinebreak;
		
		if(is_array($MisconceptonQuestions[ALL]) && count($MisconceptonQuestions[ALL]) > 0) {
			
			$i =0;
			foreach($MisconceptonQuestions[ALL] as $qcode => $answers){
			
					$OptionWiseStudentPerfo = $this->getOptionWisePerfo($SectionWiseStudents,$questionSeq,$qcode,$connid);
					
					$i++;
					$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,ts_file,group_id,
							  		 da_questions.passage_id,qms_passage.passage_name
							  FROM da_questions 
							  LEFT JOIN qms_passage ON da_questions.passage_id = qms_passage.passage_id
							  WHERE qcode = '".$qcode."' AND misconception = 1";
					$dbqry = new dbquery($query,$connid);
					$result = $dbqry->getrowarray();
					
					$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";
					$remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
					$mcexplanation = $result['mcexplanation'];
					$correct_answer = $result['correct_answer'];
					
					$passagenamebuffer = 0;
					$passagename = "";
					
					if($subject == 1 && $result["passage_id"] != 0 && $result['passage_name'] != ""){
						
						$passagename = $result["passage_name"];
						$nooflinesofpsg = ceil(pdf_stringwidth($pdf,$passagename,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
						$passagenamebuffer = ($nooflinesofpsg * ($this->fontsize)) + $singlelinebreak;
					}
									
				    $nooflines = ceil(pdf_stringwidth($pdf,"Concept: $concept",$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
				    $buffersize = ($nooflines * ($this->fontsize)) + $singlelinebreak + $passagenamebuffer; // we need to add line after printing concept
				    
				    /*$ypos_returned = autoPublishPaper($pdf,"Concept: ".$concept,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname);
				    
				    $isNewPage = $ypos_returned[1];
				    $ypos = $ypos_returned[0];
				    
					pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$ypos+8);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos+8);
				    pdf_stroke($pdf);
				    
				    $ypos -= $singlelinebreak;*/
					//$buffersize = ($nooflines+1) * 10 + (10*2);
					
					######### Question Starts #################
					
					$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
					
					$qcodestr = str_replace("‘","'",$qcodestr);
				   	$qcodestr = str_replace("’","'",$qcodestr);
				   	$qcodestr = str_replace("–","-",$qcodestr);
				   	$qcodestr = str_replace("…","...",$qcodestr);
				   	$qcodestr = str_replace("Æ","'",$qcodestr);
				   	$qcodestr = str_replace("&nbsp;"," ",$qcodestr);
				   	$qcodestr = str_replace("·",".",$qcodestr);
				   	
				   	$yposbeforequestion = $ypos;
				   	
				   	if($result["group_id"] != 0)
						$imagepathfrom = 2;
					else 	
						$imagepathfrom = $this->imagepathfrom;
				   	
				   	$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin + 27,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin + 27);
				   	
				   	$isNewPage = $ypos_returned[1];
				   	$yposafterque = $ypos_returned[0];
				   	
	           		if($isNewPage==1){
	           			$yposbeforequestion = $this->page_height-$this->top_margin;
	           		}
	           		          		
	           		$queno = $questionSeq[1][$qcode] + 1;
				   	pdf_show_xy($pdf,"Q ".$queno.":",50,$yposbeforequestion-$buffersize + 1.5); // 1.5 is added cause in new autopublish paper funciton question print slightly up
				   	
				   	################ Question End #################
				   	
				   	$buffersize = 0;
				   	$ypos_returned = autoPublishPaper($pdf,"<b>Concept:</b> ".$concept,$this->left_margin ,$yposbeforequestion,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin);
				    
				    $isNewPage = $ypos_returned[1];
				    $yposafterconcept = $ypos_returned[0];
				    
				    if($isNewPage == 1){
				    	$ypositionbeforeconcept = $this->page_height-$this->top_margin;
				    }
					
				    if($passagename != "")
				    {
					    $textflow = PDF_create_textflow($pdf, "Passage: ".$passagename, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=100%");
						do {
						    $passageres = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $yposafterconcept,"");
						} while (strcmp($passageres, "_stop"));
						PDF_delete_textflow($pdf, $textflow);
				    }
				    
				    /*pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposafterconcept+$singlelinebreak);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposafterconcept+$singlelinebreak);
				    pdf_stroke($pdf);*/
				    
				    $ypos = $yposafterque; // because we are printing question first
				   	//$ypos -= $singlelinebreak;
				   	
				   	$highestmisconception = 0;
				   	$HighestMisConc = "";
				   	foreach($OptionWiseStudentPerfo[ALL] as $option => $performance){
				   		
				   		if($performance > $highestmisconception && $option != $correct_answer){
				   			$HighestMisConc = $option;
				   			$highestmisconception = $performance;
				   		}	
				   		
				   	}
				   	
				   	################# option wise student perfo ###########################	
				 	$tbl=0;
					$col = 1;
					$row = 1;
					$tblfontsize = $this->fontsize -1;
					
					$llx= 350; // TABLE WIDTH
					$lly= 15; // TABLE HEIGHT
					
					$urx= $this->left_margin + 30;   //POSITION OF X
					$ury= $ypos;  //POSITION OF Y
					
					$rowmax = 2;
					$colmax = 4;
					
					/* ---------- Fill $row 3 and above with their numbers */
					
					foreach($this->ansoptionarr as $key => $value){
			    		$key++; // As answer key start from 0 we need to increment by one
				    	$optlist = "colwidth=25% rowheight=10 fittextline={font=" . $this->font . " fontsize=$tblfontsize} margin=4";
				        $tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "Option ".$key, $optlist);
				        if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
			    		$col++;
			    	}
			    	
			        $row++;
			        $col = 1;
			        foreach($OptionWiseStudentPerfo[ALL] as $option => $performance){
			        	$matchbox = "";
			        	$matchbox1 = "";
			        	if($option == $correct_answer) $matchbox = " matchbox={fillcolor={rgb 0.0 0.5 0.0}}";
			        	if($option == $HighestMisConc) $matchbox1 = " matchbox={fillcolor={rgb 1.0 0.0 0.0}}";
			        	
				        $optlist = "colwidth=25% rowheight=10 fittextline={font=" . $this->font . " fontsize=$tblfontsize} $matchbox $matchbox1 margin=4";
			        	$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $performance."%", $optlist);
				        if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
			    		$col++;
			        }
					    
					/* Place the table instance */
					$optlist = "header=1 fill={{area=rowodd fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}} ";
					$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);	  	
				   	
				   	
				   	$ypos -= $lly*2 + $singlelinebreak;
				   	
				   	$yposbeforemcexplanation = $ypos;
				   	$buffersize = 0;
				    
				   // $remedial_measure = (isset($result['mcexplanation']) && $result['mcexplanation'] != '')?$result['mcexplanation']:"";
				    //$nooflines_rm = ceil(pdf_stringwidth($pdf,$remedial_measure,$this->font,9)/($this->page_width-$this->left_margin-$this->right_margin));
				    
				    $ypos_returned = autoPublishPaper($pdf,$mcexplanation,$this->left_margin + 25,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize-1,$this->fontname,'0.1',$this->left_margin + 25);
				    
				    $ypos = $ypos_returned[0];
				   	$isNewPage=$ypos_returned[1];
	           		
				   	if($isNewPage==1){
	           			$yposbeforemcexplanation = $this->page_height-$this->top_margin;
	           		}	
				    
	           		$ypos -= $singlelinebreak;
				    
				    $yposbeforeremedial = $ypos;
				   	$buffersize = 15;
				    
				    $ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin);
				    
				    $ypos = $ypos_returned[0];
				   	$isNewPage=$ypos_returned[1];
	           		
				   	if($isNewPage==1){
	           			
	           			$yposbeforeremedial = $this->page_height-$this->top_margin;
	           		}	
				    
				    //$yposbeforeremedial -= 10;
				    
				    pdf_show_xy($pdf,"Remedial measure:",$this->left_margin,$yposbeforeremedial);
				    
				    $yposbeforeremedial -= 2;
				    			    
				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
				    pdf_stroke($pdf);
				    
				    $ypos -= $doublelinebreak;
				    
					if($i == 5) break;
					
			}
			
		} else {
			
			pdf_setfont($pdf,$this->font,$this->fontsize);
			pdf_show_xy($pdf,"No Misconception Questions Found!",$this->left_margin,$ypos);
			$ypos -= $doublelinebreak;
		}
		
		
		$classperfo = array();
		foreach($SubTopicWisePerfoArr as $subtopicid => $perfomance){
			if($request_id != 0){
				foreach($request_arr as $requestid => $sectionarr){
					$i = 0;
					foreach($sectionarr as $section=>$class){
						if($i%2) $color = "Dark"; else $color = "Light";
						$classperfo[$section][$subtopicid] = $perfomance[$section];
						$classperfo[$section]['Name'] = "Section ".$class;
						$classperfo[$section]['Color'] = $color;
						$i++;
					}
				}
			}
		}
		
		$buffersize = 30;
		$orgyposbeforechart = $ypos;
		
		$nooftopics = count($reportingtopic_arr);
		$noofsection = count($classperfo);
		$actualheight = $this->page_height - $this->top_margin - $this->bottom_margin;
		
		$returnposition = $this->getTopicWisePerfoBarGraph($pdf,$ypos,$nooftopics,$noofsection,$linetype = 'normal',$reportingtopic_arr,$classperfo,$actualheight,$buffersize);
		
		$nextpage=$returnposition[1];
		$ypos = $returnposition[0];
		
   		if($nextpage==1){
   			$orgyposbeforechart = $this->page_height-$this->top_margin;
   		}
   		
   		pdf_setfont($pdf,$this->fontbold,9);
   		pdf_show_xy($pdf,"The sub topic wise performance for each section is given in the table below.",$this->left_margin,$orgyposbeforechart);
   		
   		$ypos -= $singlelinebreak;
   		
   		$buffersize = 10;
   		$yposbeforetbl = $ypos;
   		
   		pdf_setlinewidth($pdf,0.1);
   		pdf_setfont($pdf,$this->font,$this->fontsize);
   		$returnpos = $this->drawDASummaryReportTable($pdf,$ypos,$schoolcode,$buffersize,$connid);
   		
   		$ypos = $returnpos[0];
   		$newpage = $returnpos[1];
   		if($newpage == 1){
   			$yposbeforetbl = $this->page_height - $this->top_margin;
   		}
   		
   		pdf_setfont($pdf,$this->fontbold,$this->fontsize);
   		pdf_show_xy($pdf,"DA Summary report on usage:",$this->left_margin,$yposbeforetbl);
   		
   		
   		pdf_end_page($pdf);
		pdf_end_document($pdf,"");
	}
	
	function drawDASummaryReportTable($pdf,$ypos,$schoolcode,$buffersize,$connid){
		
		$returnarray = array();
		
		$fontsize = $this->fontsize;
		$returntocalling = array();
		
		$query = "SELECT class,subject,count(*) as testutilized FROM da_testRequest
				  WHERE schoolCode = '".$schoolcode."' AND year = '".date('Y')."' GROUP BY class,subject";
		$dbqry = new dbquery($query,$connid);
		$totrows = $dbqry->numrows();
		
		
		$ypos -= $buffersize;
		$assumed_height = ($totrows + 1)* 10;
		$neededheight = $ypos - $assumed_height;

		if($neededheight <= 50) {
			
			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			
		    $this->LoadpdfFont($pdf,$this->fontname);
		    
			pdf_setfont($pdf, $this->font, $fontsize);
	
			$xpos = $this->left_margin;
			$ypos = $this->page_height-$this->top_margin-$buffersize;
			
			if($newpageflag==0)
				$newpageflag=1;
		}
		
		
		$tf=0; $tbl=0;
		$col = 1;
		$row = 1;
	
		$llx= 350; // TABLE WIDTH
		$lly= 100; // TABLE HEIGHT -- Its taken 100 and its working for next page logic
		
		$urx=$this->left_margin;   //POSITION OF X
		$ury=$ypos;  //POSITION OF Y
		
		$rowmax = $totrows + 1; 
		$colmax = 5;
		$header = array(1 =>"S No",2=>"Class",3=>"Subject",4=>"Tests Available",5=>"Tests Utilized");
		
		//$optlist = "fittextline={position=center font=" . $this->font . " fontsize=9} " ."colspan=" . $colmax;
		$optlist = "fittextline={position={left top} font=" . $this->font . " fontsize=$fontsize} rowheight=10 margin=4";
		for ($col = 1; $col <= $colmax; $col++) {
				
			$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $header[$col], $optlist);
		        if ($tbl == 0) {
		            die("Error: " . PDF_get_errmsg($p));
		        }
		}
		
		$i=1;
		while($result = $dbqry->getrowarray()){
			$row++;
			
			$testAvail = constant("MAX_TEST_YEAR") - $result['testutilized'];
			
			$optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = PDF_add_table_cell($pdf, $tbl, 1, $row, $i, $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));
		    
	        $optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 2, $row, $result['class'], $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));
	        
	        $optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 3, $row, $this->subject_arr[$result['subject']], $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));
	        
	        $optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 4, $row, $testAvail, $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));
	        
	        $optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 5, $row, $result['testutilized'], $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));
	        
		    $i++;
		}
		
	   
		/* Place the table instance */
		$optlist = "stroke={{line=other linewidth=0.1}}";
		$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
		
		if ($tblresult ==  "_error") {
			die("Couldn't place table: " . PDF_get_errmsg($p));
		}
		
		$returnarray[0] = $ury;
		$returnarray[1] = $newpageflag;
		
		return $returnarray;
	}
}
?>