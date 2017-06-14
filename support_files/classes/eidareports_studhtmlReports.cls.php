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
	var $pageno;

	var $imagepathfrom;
	var $optionformat;
	var $questionstem;
	var $imagefactor;
	var $resizedimages;

	var $ansoptionarr = array();
	var $ansseqarr = array();
	var $subject_arr = array();
	var $sub_short_name = array();

	var $font;
	var $fontsize;
	var $fontdir;
	var $fontbold;
	var $fontitalic;
	var $fontbolditalic;
	var $fontname;
	var $fontnamebold;
	var $wing_font;

	var $lowperfo_studentids;
	var $exclude_schoolnames = array();
	var $DataTransferSchoolCode;

	function clsdareports()
	{
		$this->examcode = 0;
		$this->request_id = 0;

		$this->page_width = 595;
		$this->page_height = 842;

		$this->top_margin = 99.7;
		$this->bottom_margin = 36;
		$this->left_margin = 63.21;
		$this->right_margin = 36;
		$this->pageno = 0;

		$this->imagepathfrom = 1;
		$this->optionformat = 1;
		$this->questionstem = 0;
		$this->imagefactor = 1;
		$this->resizedimages = array();

		$this->ansoptionarr = array("A","B","C","D");
		$this->ansseqarr = array("A"=>1,"B"=>2,"C"=>3,"D"=>4);
		$this->subject_arr = array(1 => 'English', 2=> 'Maths' , 3 => 'Science');
		$this->sub_short_name = array(1=>'E',2 =>'M',3 =>'S');

		$this->font = "";
		$this->fontbold = "";
		$this->fontitalic = "";
		$this->fontbolditalic = "";
		$this->fontname = "Dejavu";
		$this->fontnamebold = "Dejavu-Bold";
		$this->fontsize = "10";
		$this->fontdir = constant("PATH_PDFFONT");
		$this->wing_font = "";

		$this->lowperfo_studentids = "";
		$this->exclude_schoolnames = array(2492338); //for this schoolcodes we dont have to display the schoolname in reports
		$this->DataTransferSchoolCode = array(263,3033,3598,16591,16795,16855,17925,18396,21150,23997,24060,24668,26978,27425,42625,45494,47385,54239,56490,57910,60381,68878,106496,110697,124138,149442,153271,163368,165834,169794,169963,170099,170622,172149,175250,178268,183578,185336,194456,202374,207093,209328,209447,210666,211918,220184,220284,224856,226272,226742,228121,253858,255648,258293,281366,301048,309270,343881,356995,364234,364480,371778,383080,394551,396325,408736,409494,411876,413252,416343,416821,423384,428436,437634,439410,444218,450484,451829,453926,454513,473147,495578,507090,522044,525210,525392,531041,537187,538235,539575,544871,558676,561140,577294,581418,613873,615868,617957,618511,620889,630789,632896,635870,642669,655669,658950,676882,679233,682760,690912,736050,749568,762795,790799,796828,829818,839114,891348,912899,942680,955955,994059,995778,1016991,1019428,1022191,1026343,1029466,1050151,1064665,1069653,1102950,1111355,1114788,1166254,1173541,1175495,1203680,1214217,1259649,1272564,1312595,1315210,1330320,1370988,1391497,1433396,1434746,1438430,1485826,1498877,1515967,1553466,1601346,1624382,1651476,1719827,1722766,1793670,1840381,1846185,1859083,1860140,1868729,1999271,2017322,2038645,2039560,2053321,2057359,2068567,2145276,2159059,2192996,2255292,2285293,2363620,2384771,2390367,2392614,2408274,2410118,2431574,2431622,2435098,2436444,2440186,2441783,2451822,2458794,2459111,2459475,2459540,2459656,2462023,2462519,2464812,2465923,2469043,2477115,2479616,2480996,2485722,2488010,2494212,2496391,2498840,2502777,2502830,2503225,2504537,2506817,2506942,2507029,2507661,2508220,2512661,
											  24374,2387554,2459944,2492338,415337,366777,1337028,651378,1733578,524522,10251,2436678,439385,449949,1187617,47745,60414,104187,559960,2379583,982556,764756,1666662,51820,2405521,1500777,203339,482842,20191,815613,2436678,165035,1672951,5184,63421,384445,34736,205449,45959,50110,395483,770229,50010,60573,1163014,2039326,45519,2392614,529319,496982,203718,180028,409763,365439,64811,2470230,404271,2500183,581062,60854,1596332);
	}

	function setpostvars()
	{
		if(isset($_POST["subjectno"])) $this->subjectno = $_POST["subjectno"];
	}

	function setgetvars()
	{
		if(isset($_GET["subjectno"])) $this->subjectno = $_GET["subjectno"];
	}

	function LoadpdfFont($pdf,$font="Dejavu")
	{
		if($pdf == "") return;

		if($font == "Arial")
		{
			pdf_set_parameter($pdf, "FontOutline", "Arial=$this->fontdir/arial.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Arial-Bold=$this->fontdir/arialbd.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Arial Italic=$this->fontdir/ariali.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Arial Bold Italic=$this->fontdir/arialbi.ttf");
			pdf_set_parameter($pdf, "FontOutline", "Wingdings=".$this->fontdir."/wingding.ttf");
			
			$this->font = pdf_load_font($pdf, "Arial", "host","");
			$this->fontbold = pdf_load_font($pdf, "Arial-Bold", "host","");
			$this->fontitalic = pdf_load_font($pdf, "Arial Italic", "host","");
			$this->fontbolditalic = pdf_load_font($pdf, "Arial Bold Italic", "host","");
			$this->wing_font = pdf_load_font($pdf, "Wingdings", "builtin", "");
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
			pdf_set_parameter($pdf, "FontOutline", "Wingdings=".$this->fontdir."/wingding.ttf");

		    $this->font = pdf_load_font($pdf, "Dejavu", "unicode","");
			$this->fontbold = pdf_load_font($pdf, "Dejavu-Bold", "unicode","");
			$this->fontitalic = pdf_load_font($pdf, "Dejavu-Italic", "unicode","");
			$this->fontbolditalic = pdf_load_font($pdf, "Dejavu-Bold-Italic", "unicode","");
			$this->wing_font = pdf_load_font($pdf, "Wingdings", "builtin", "embedding");
		}
	}


	function getTopicWisePerfoBarGraph($pdf,$ypos,$nooftopics,$noofsection,$linetype = 'dotted',$topicarr,$sectionarr,$actualheight,$buffersize=0)
	{

		$fontsize = $this->fontsize;
		$returntocalling = array();
		$ypos = $ypos - $buffersize;

		$assumed_height = ((($noofsection * 5) + 10) * $nooftopics) + 30 + $buffersize;
		$neededheight = $ypos - $assumed_height;

		if($neededheight < $this->bottom_margin) {

			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			$this->pageno++;
			$this->addpagenumber($pdf,$this->pageno);

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

				$res = pdf_add_textflow($pdf,0,$value,"fontname=$this->fontname fontsize=$fontsize encoding=unicode alignment=right leading=100%");
				pdf_fit_textflow($pdf,$res, $this->left_margin+2, $pos, 235,10, "");
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
				
				if(substr($arr['Name'],0,7) != "Section")
					pdf_show_xy($pdf,$this->common_pdf_junk_replace($this->GetOperatedString($arr['Name'])),$secdispXpos+7,$secdispYpos);
				else
					pdf_show_xy($pdf,$this->common_pdf_junk_replace($arr['Name']),$secdispXpos+7,$secdispYpos);
				 	
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
		
		pdf_setrgbcolor($pdf,0.0, 0.0, 0.0);
		pdf_show_xy($pdf,"% Score",340,$k-10);
		
		# Outside Box
		$lastposition = $ypos - $barYpos;
		pdf_setlinewidth($pdf, 0.9);
		pdf_setrgbcolor($pdf,0.0, 0.0, 0.0);
		pdf_rect($pdf, $this->left_margin, $barYpos-20, 495, $lastposition+40);
		pdf_stroke($pdf);

		$returntocalling[0] = $barYpos-30;
		$returntocalling[1] = $newpageflag;

		//echo "<br> Ending Ypos ::".($barYpos);
		return $returntocalling;
	}

	function drawStudentAnswerTable($pdf,$ypos,$studentinfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$actualheight,$buffersize){

		//echo "<br> Starting Ypos".$ypos;
		$returnarray = array();
		$rightans = chr(252);
		$wrongans = chr(251);
		
		$fontsize = $this->fontsize -2;
		$margin = 2;

		$assumed_height = (count($CorrectAnswerArr) + count($reportingtopic_arr) + 1)* ($this->fontsize + $margin);
		//$assumed_height = (count($CorrectAnswerArr) + count($reportingtopic_arr) + 1)* (($fontsize * $leading)/100);
		$neededheight = $ypos - $assumed_height - $buffersize;

		if($neededheight <= 50) {

			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			$this->pageno++;
		    $this->addpagenumber($pdf,$this->pageno);

		    $this->LoadpdfFont($pdf,$this->fontname);
			pdf_setfont($pdf, $this->font, $fontsize);

			$xpos = $this->left_margin;
			$ypos = $this->page_height-$this->top_margin - $buffersize;

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
		$stud_correct_ans = 0;
		$total_ques = 0;
		
		$llx = 90; // Position of X
		//$lly= $assumed_height; // TABLE HEIGHT
		$lly = $this->bottom_margin; // TABLE HEIGHT -- Its taken 50 and its working for next page logic
		
		$urx = 520; // Table width
		$ury = $ypos; // Starting Y 

		$rowmax = count($CorrectAnswerArr) + count($reportingtopic_arr);
		$colmax = 6;
		$header = array(1=>"Sr. No.",2=>"Concept Area",3 =>"Q.No.",4=>"Your Response",5=>"Correct Answer",6=>"Result");

		//$optlist = "fittextline={position=center font=" . $font . " fontsize=9} " ."colspan=" . $colmax;
		$optlist = "fittextline={position={left center} font=" . $this->fontbold . " fontsize=$fontsize} rowheight=20 colwidth=1 margin=$margin";
		for ($col = 1; $col <= $colmax; $col++) {
			$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $header[$col], $optlist);
	        if ($tbl == 0) {
	            die("Error: " . PDF_get_errmsg($pdf));
	        }
		}
	 
		$srno = 0;		
	    foreach($ReportingQuesArr as $reporting_id => $qcodearray){
	   	
            $srno++;
			
            # Below process is for displaying the question nos in order
	    	$orderedQcodeArr = array();
	    	$rowspan = count($qcodearray);	
	    	
	    	foreach($qcodearray as $key => $qcode)
	    	{
	    		$orderedQcodeArr[$questionSeq[$studentinfo["paperversion"]][$qcode] + 1] = $qcode;
	    	}

	    	ksort($orderedQcodeArr);
	    	# process end
			//$optlist = "fittextline={position={top left} font=" . $this->font . " fontsize=$fontsize} rowheight=10 margin=$margin colspan = $colmax";
			//$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "Area Tested: ".$reportingtopic_arr[$reporting_id], $optlist);
			//$optlist = "fittextline={position={top left} font=" . $this->font . " fontsize=$fontsize} rowheight=10 margin=$margin rowspan = $rowspan";
						
			$row++;		
			$col=1;

			$optlist = "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} rowheight=10 colwidth=10 margin=$margin rowspan=$rowspan margintop=5";
			$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $srno, $optlist);
			
			$col++;
			$tfoptlist = "font=".$this->font." fontsize=$fontsize leading=100% alignment=left";
		    $tf =  pdf_add_textflow($pdf,0,$reportingtopic_arr[$reporting_id], $tfoptlist);
		    $tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "", "textflow=".$tf." fittextflow={verticalalign=center} colwidth=200 rowheight=1 fittextline={position={top left} font=" . $this->font . " fontsize=$fontsize} margin=$margin rowspan=$rowspan");
			
			//$optlist = "fittextline={position={top left} font=" . $this->font . " fontsize=$fontsize} rowheight=10 colwidth=50 margin=$margin rowspan=$rowspan";
			//$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $reportingtopic_arr[$reporting_id] , $optlist);
			
			$innercount = 0;
			foreach($orderedQcodeArr as $key => $qcode){

				$innercount++;
				$col = 3;
				$optlist = "fittextline={position={center} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=$margin";
				$content = ($questionSeq[$studentinfo["paperversion"]][$qcode] + 1);
				$optlist = "fittextline={position={center} font=". $this->font ." fontsize=$fontsize} rowheight=10 colwidth=10 margin=$margin";
				$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $content, $optlist);
				
			    $col++;
				$content = isset($this->ansseqarr[$studentsAnswer[$studentinfo['studentid']][$qcode]])?$this->ansseqarr[$studentsAnswer[$studentinfo['studentid']][$qcode]]:"";
				$optlist = "fittextline={position={center} font=". $this->font ." fontsize=$fontsize} rowheight=10 colwidth=10 margin=$margin";
				$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $content, $optlist);
	
				$col++;		
				$content = isset($this->ansseqarr[$CorrectAnswerArr[$qcode]])?$this->ansseqarr[$CorrectAnswerArr[$qcode]]:"";
				$optlist = "fittextline={position={center} font=". $this->font ." fontsize=$fontsize} rowheight=10 colwidth=10 margin=$margin";
				$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $content, $optlist);
				
				$col++;		
	        	if($this->ansseqarr[$studentsAnswer[$studentinfo['studentid']][$qcode]] == $this->ansseqarr[$CorrectAnswerArr[$qcode]]){
	        		$optlist = "fittextline={position={center} font=". $this->wing_font ." fontsize=12 textformat=bytes} rowheight=10 colwidth=10 margin=$margin";
	        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $rightans, $optlist);	
	        		$stud_correct_ans++;
	    		}	
	        	else if($this->ansseqarr[$studentsAnswer[$studentinfo['studentid']][$qcode]] != "" && $this->ansseqarr[$studentsAnswer[$studentinfo['studentid']][$qcode]] != $this->ansseqarr[$CorrectAnswerArr[$qcode]]){
	        		$optlist = "fittextline={position={center} font=". $this->wing_font ." fontsize=12 textformat=bytes} rowheight=10 colwidth=10 margin=$margin";
	        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $wrongans, $optlist);	    	
	        	}
	        	else{
	        		$optlist = "fittextline={position={center} font=". $this->wing_font ." fontsize=12 textformat=bytes} rowheight=10 colwidth=10 margin=$margin";
	        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $wrongans, $optlist);
	        	}
	        	$total_ques++;
	        	if($innercount != $rowspan) $row++;

		 	}
	    }
	    
	    $row++;
	    $col = 1;	
		$optlist = "fittextline={position={right center} font=". $this->fontbold ." fontsize=$fontsize} rowheight=20 margin=$margin colspan=5";
		$content = "Your Score ";
		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $content, $optlist);
		
		$col = 6;
		$optlist = "fittextline={position={center} font=". $this->fontbold ." fontsize=$fontsize} rowheight=20 margin=$margin";
		$content = $stud_correct_ans."/".$total_ques;
	    $tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $content, $optlist);
		  
		
	    if ($tbl == 0){
			die("Error: " . PDF_get_errmsg($p));
		}
		/* Place the table instance */
		$optlist = "header=0 fill={{area=row1 fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}}";
		$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
		if ($tblresult ==  "_error") {
			die("Couldn't place table: " . PDF_get_errmsg($p));
		}
		$tblheight = pdf_info_table($pdf,$tbl,'height');
		$tblwidth = pdf_info_table($pdf,$tbl,'width');
		pdf_delete_table($pdf,$tbl,"");
		$return_arr[0] = $ypos - $tblheight;
		$return_arr[1] = $newpageflag;
		/*$returnarray[0] = $ury;
		$returnarray[1] = $newpageflag;*/
		#echo "<br> Ending Ypos ::".($ury);
		return $return_arr;
	}


	function getSubtopicWisePerfo($subtopic_arr,$questionSeq,$SectionWiseStudents,$connid){

			$subtopicperfo = array();

			foreach($subtopic_arr as $subtopicid => $subtopicques){

				$subtopicquecount = count($subtopicques);
				$AllStudentCount = 0;
				$AllTotTrue = 0;

				foreach($SectionWiseStudents as $Section => $PaperWiseStudents){

					$SectionWiseTotStudStr = '';
					$SectionWiseTotStudArr = array();
					$SectionWiseTotTrue = 0;

					foreach($PaperWiseStudents as $PaperVersion => $StudentStr){

						$SectionWiseTotStudStr .= $StudentStr.",";

						$QuesNumstr = "";
						for($i=0;$i<sizeof($subtopicques);$i++) {
							$QuesNumstr .= "R".($questionSeq[$PaperVersion][$subtopicques[$i]] + 1)."+";
						}

						$fields = rtrim($QuesNumstr,"+");
						$TotTrueQry = "SELECT SUM($fields) as total FROM da_response WHERE studentID IN($StudentStr) AND examcode = '".$Section."'";
						$ansresult = new dbquery($TotTrueQry,$connid);
						$SectionWiseTotTruecount = $ansresult->getrowarray();
						$SectionWiseTotTrue += $SectionWiseTotTruecount['total'];
					}

					$SectionWiseTotStudArr = explode(",",rtrim($SectionWiseTotStudStr,","));
					$SectionWiseTotStudCount = count($SectionWiseTotStudArr);

					$AllTotTrue += $SectionWiseTotTrue;
					$AllStudentCount += $SectionWiseTotStudCount;
					$subtopicperfo[$subtopicid][$Section] = round(($SectionWiseTotTrue * 100)/(count($SectionWiseTotStudArr)*$subtopicquecount));
				}

				$subtopicperfo[$subtopicid]['ALL'] = round(($AllTotTrue * 100)/($AllStudentCount*$subtopicquecount));
			}

			return $subtopicperfo;


		}

	function getStudentPerfoInSubtopic($examcode,$StudentID,$StudentName,$PaperVersion,$subtopic_arr,$questionSeq,$connid){

			$subtopicperfo = array();

			foreach($subtopic_arr as $subtopicid => $subtopicques){

				$totalTrueCount = 0;
				$subtopicquecount = count($subtopicques);

				$QuesNumstr = "";
				for($i=0;$i<sizeof($subtopicques);$i++) {
					$QuesNumstr .= "R".($questionSeq[$PaperVersion][$subtopicques[$i]] + 1)."+";
				}

				$fields = rtrim($QuesNumstr,"+");
				$TotTrueQry = "SELECT SUM($fields) as total FROM da_response WHERE studentID  = $StudentID AND examcode = '".$examcode."'";
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

					$query = "SELECT COUNT(*) AS TOTAL FROM da_response WHERE $questionnos = 1 AND studentID IN($students) AND examcode='".$section."'";
					$result = new dbquery($query,$connid);
					$anres = $result->getrowarray();
					$count = $anres['TOTAL'];

					if(!isset($SectionCorrectAns[$section][$qcode])) $SectionCorrectAns[$section][$qcode] = 0;
					$SectionCorrectAns[$section][$qcode] += $count;

					if(!isset($SectionCorrectAns['ALL'][$qcode])) $SectionCorrectAns['ALL'][$qcode] = 0;
					$SectionCorrectAns['ALL'][$qcode] += $count;
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

	function getMisconceptionQueToDisplay($misconceptionque_arr_with_ans,$subtopic_arr,$questionSeq,$SectionWiseStudents,$connid){


		$tempArray = array();
		$SectionWiseSortMisconQueArr = array();
		$SectionWiseMisconQue = array();

		if(is_array($misconceptionque_arr_with_ans) && count($misconceptionque_arr_with_ans) > 0) {

			/*$query="SELECT qcode, correct_answer FROM da_questions WHERE qcode IN(".implode(",",$misconceptionque_arr).") AND misconception=1";
			$dbqry = new dbquery($query,$connid);

			while($row = $dbqry->getrowarray())
			{*/
			foreach($misconceptionque_arr_with_ans as $qcode => $correct_answer){
				
				$count=0;
				$AllStudentCount = 0;
				$WrongCountForAll = 0;
				#$correct_answer = $row['correct_answer'];

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
						$questionnos = "A".($questionSeq[$paperversion][$qcode] + 1);
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
				    
				    $SectionWiseStudentsCount = count(explode(",",rtrim($SectionWiseTotStudStr,",")));
				    $SectionWiseWrongCount += $wrongtotal;
				    $SectionWiseWrongPer = ($wrongtotal/$SectionWiseStudentsCount)*100;
				    $AllStudentCount += $SectionWiseStudentsCount;
				    $WrongCountForAll += $SectionWiseWrongCount;
				    //$tempArray[$row['qcode']][$section] = $SectionWiseWrongPer;
				    $tempArray[$qcode][$section] = array("wrongper"=>$SectionWiseWrongPer,"maxwrongval"=>max($totalopt));

				}

				$AllStudentWrongPer = ($WrongCountForAll/$AllStudentCount)*100;
				//$tempArray[$row['qcode']]['ALL'] = $AllStudentWrongPer;
				$tempArray[$qcode]['ALL'] = array("wrongper"=>$AllStudentWrongPer,"maxwrongval"=>max($AllTotalOpt));
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
						$SectionWiseMisconQue[$section][$qcode] = $valueArr['wrongper']; // Earlier it was maxwrongval
						$i++;
					}
				}
			}

			foreach($SectionWiseMisconQue as $section => $qcodevalues){

				arsort($qcodevalues,SORT_NUMERIC); // Earlier it was arsort
				$SectionWiseSortMisconQueArr[$section] = $qcodevalues;
			}
		}
		return $SectionWiseSortMisconQueArr;
	}

	function GenerateStudentReport($examcode=0,$request_id=0,$reqstudentid=0,$connid,$regenerateid =0){

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
			$examcode_str .= "'".$row['exam_code']."',";
			$request_id = $row['request_id'];
		}
		
		# Checking to exclude the dropped questions (using report regenerate interface earlier) from reports
		if($regenerateid == 0){
			
			$chk_query = "SELECT regen_id FROM da_reportsRegen WHERE request_id = '".$request_id."' ORDER BY requested_dt DESC limit 1";
			$chk_dbqry = new dbquery($chk_query,$connid);
			$chk_result = $chk_dbqry->getrowarray();
			$regenerateid = $chk_result["regen_id"];
		}
			
		$examcode_arr = array();

		$query = "SELECT da_response.examcode,da_response.paperversion, group_concat( distinct(da_response.studentID) ) AS studentids,
				  da_testRequest.paper_code,B.qcode_list,da_testRequest.test_date,da_testRequest.subject,da_testRequest.class,
				  da_testRequest.schoolCode,da_testRequest.paper_code,da_testRequest.testName,da_testRequest.approved_date,
				  da_orderMaster.score_outof,da_orderMaster.order_id,da_testRequest.year
				  FROM da_examDetails
				  LEFT JOIN da_response ON da_examDetails.exam_code = da_response.examcode
				  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_orderMaster ON da_testRequest.schoolCode = da_orderMaster.schoolCode AND da_testRequest.year = da_orderMaster.year
				  LEFT JOIN da_paperDetails AS A ON da_testRequest.paper_code = A.papercode
				  LEFT JOIN da_paperDetails AS B ON da_response.paperversion = B.version AND A.papercode = B.papercode
				  WHERE da_examDetails.exam_code IN(".rtrim($examcode_str,',').")
				  AND da_response.paperversion IN(1,2,3,4)
				  GROUP BY da_examDetails.exam_code,da_response.paperversion";

		//echo $query; //".date("Y")."

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
			$subjectid = $row["subject"];
			$class = $row['class'];
			$testdate = $row['test_date'];
			$testName = $row['testName'];
			$qcodelist = $row['qcode_list'];
			//$paperwiseQueSeq[$row['paperversion']] = explode(',',$row['qcode_list']);  # question wise sequence now taking from paper_details as per below as some times they don't give all versions to students
			$SectionWiseStudents[$row['examcode']][$row['paperversion']] = $row['studentids'];
			$score_outof = $row['score_outof'];
			$order_id = $row["order_id"];
			$approved_date = $row["approved_date"];
			$year = $row["year"];
		}
		
		$questionquery = "SELECT papercode,version,qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' ORDER BY papercode";
		$dbqueqry = new dbquery($questionquery,$connid);
		while($querow = $dbqueqry->getrowarray()){

			$paperwiseQueSeq[$querow['version']] = explode(',',$querow['qcode_list']);
			# if we didn't found any questions from above loop than we need to do this
			if($qcodelist == "")
				$qcodelist = $querow['qcode_list'];
		}

		if($qcodelist == "")
			die("Reports will not be generated, Questions not found in paper!");

		# score out of query
		$ScoreOutOfDetails = array();
		
		if($order_id != '' && $order_id != 0){
			$sc_qry = "SELECT class, e_score_outof, m_score_outof, s_score_outof FROM da_orderBreakup
					   WHERE order_id = $order_id AND class = $class GROUP BY class";
			$sdbqry = new dbquery($sc_qry,$connid);
			while($score_result = $sdbqry->getrowarray()){
				$ScoreOutOfDetails[$class][1] = $score_result['e_score_outof'];
				$ScoreOutOfDetails[$class][2] = $score_result['m_score_outof'];
				$ScoreOutOfDetails[$class][3] = $score_result['s_score_outof'];
			}
		}else if($schoolcode == "2502830"){ // dummy school for DA
				$ScoreOutOfDetails[$class][1] = 100;
				$ScoreOutOfDetails[$class][2] = 100;
				$ScoreOutOfDetails[$class][3] = 100;
		}
			
		$questionSeq = array();
		foreach($paperwiseQueSeq as $paper => $quesarray){
			$questionSeq[$paper] = array_flip($quesarray);
		}

		$misconceptionque_arr = array();
		$misconceptionque_arr_with_ans = array();
		$QueFromVersionTable = array();
		$CorrectAnswerArr = array();
		
		# if we have report regenration request with quetion version than below process
		$VersionQues = array();
		$DropQuesArr = array();	
		if($regenerateid != 0){
			
			$dque_query = "SELECT drop_ques FROM da_reportsRegen WHERE regen_id = '".$regenerateid."'";
			$dque_dbqry = new dbquery($dque_query,$connid);
			$drop_result = $dque_dbqry->getrowarray();
			if($drop_result["drop_ques"] != "")
				$DropQuesArr = explode(",",$drop_result["drop_ques"]);
			
			$vquery = "SELECT qcode,version FROM da_reportsRegen_questions WHERE version != 0 AND regen_id = '".$regenerateid."'";
			$vdbqry = new dbquery($vquery,$connid);
			while($vrow = $vdbqry->getrowarray()){
				$VersionQues[$vrow["qcode"]] = $vrow["version"];
			}
			
			if(is_array($VersionQues) && count($VersionQues) > 0){
			
				foreach($VersionQues as $qcode => $version){
					$ver_query = "SELECT qcode,correct_answer,misconception FROM da_questions_versions WHERE qcode = '".$qcode."' AND version = '".$version."'";
					$ver_dbqry = new dbquery($ver_query,$connid);
					$ver_raw = $ver_dbqry->getrowarray();
					$QueFromVersionTable[$qcode] = $version;
					$CorrectAnswerArr[$ver_raw['qcode']] = $ver_raw["correct_answer"];
					
					if($ver_raw["misconception"] == 1 && !in_array($qcode,$DropQuesArr)) {
						$misconceptionque_arr[] = $ver_raw['qcode'];
						$misconceptionque_arr_with_ans[$ver_raw['qcode']] = $ver_raw['correct_answer'];
					}
				}
			}
		}
		
		# need to check whether question version is available than need to use the data from da_questions_versions table
		$clsdaquestion = new clsdaquestion();
		$query2 = "SELECT qcode,correct_answer,misconception,lastModified FROM da_questions WHERE qcode IN($qcodelist)";
		$dbquery2 = new dbquery($query2,$connid);
		while($row2 = $dbquery2->getrowarray()){

			if(!array_key_exists($row2["qcode"],$VersionQues)){ // if its in version question than we don't have to consider
			
				$QueTableResultArr = $clsdaquestion->GetQueTableAndVersion($connid,$row2["qcode"],$approved_date,$row2["lastModified"]);
				
				if($QueTableResultArr["tablename"] == "da_questions_versions"){
					
					$CorrectAnswerArr[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					$QueFromVersionTable[$row2["qcode"]] = $QueTableResultArr["version"];
					if($QueTableResultArr["misconception"] == 1 && !in_array($row2['qcode'],$DropQuesArr)){
						$misconceptionque_arr[] = $row2['qcode'];
						$misconceptionque_arr_with_ans[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					}
				}	
				else{
					$CorrectAnswerArr[$row2['qcode']] = $row2["correct_answer"];
					if($row2["misconception"] == 1 && !in_array($row2['qcode'],$DropQuesArr)) {
						$misconceptionque_arr[] = $row2['qcode'];
						$misconceptionque_arr_with_ans[$row2['qcode']] = $row2['correct_answer'];
					}
				}
			}	
		}
		
		$repqry = "SELECT reporting_id,papercode,sst_list,qcode_list,reporting_head FROM da_reportingDetails WHERE papercode = '".$papercode."' ORDER BY reporting_order";
		$repdbqry = new dbquery($repqry,$connid);
		while($reportingrow = $repdbqry->getrowarray()){
			$reportingtopic_arr[$reportingrow['reporting_id']] = $reportingrow['reporting_head'];
			$reporting_subsubtopicarr[$reportingrow['reporting_id']] = $reportingrow['sst_list'];
			$ReportingQuesArr[$reportingrow['reporting_id']] = explode(",",$reportingrow["qcode_list"]);
		}

		# calculating overall performance on the basis of answer given
		$totalQuestions = count($questionSeq[1]);
		$SectionOverallPerfo = array();
		$classHighestArr =array();
		foreach($SectionWiseStudents as $section => $paperwisestudents){

			$SectionStudents[$section] = "";
			foreach($paperwisestudents as $paperversion => $students){
				$SectionStudents[$section] .= $students.",";
			}

			$SectionStudents[$section] = rtrim($SectionStudents[$section],",");
			$SectionStudCount = count(explode(",",trim($SectionStudents[$section])));
			$qry = "SELECT AVG(total) as totalperfo, max(total) as class_highest FROM da_response WHERE examcode ='".$section."' AND studentID IN(".rtrim($SectionStudents[$section],",").")";
			$dbqry = new dbquery($qry,$connid);
			$resultrow = $dbqry->getrowarray();

			/* Old procedure where we are taking score out from da_orderMaster
			if($score_outof == 0 && $score_outof != "")
				$SectionOverallPerfo[$section] = round($resultrow["totalperfo"],2);
			elseif($score_outof > 0 && $score_outof < 100)
				$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/$totalQuestions) * $score_outof),2);
			else
				$SectionOverallPerfo[$section] = round(($resultrow["totalperfo"]/$totalQuestions) * 100,2);
			*/
			
			if($ScoreOutOfDetails[$class][$subjectid] == 0 && $ScoreOutOfDetails[$class][$subjectid] != "")
				$SectionOverallPerfo[$section] = round($resultrow["totalperfo"],2);
			elseif($ScoreOutOfDetails[$class][$subjectid] > 0 && $ScoreOutOfDetails[$class][$subjectid] < 100)
				$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/$totalQuestions) * $ScoreOutOfDetails[$class][$subjectid]),2);
			else
				$SectionOverallPerfo[$section] = round(($resultrow["totalperfo"]/$totalQuestions) * 100,2);

			// Naveen Display Class highest
			if($ScoreOutOfDetails[$class][$subjectid] == 0 && $ScoreOutOfDetails[$class][$subjectid] != "")
				$classHighestArr[$section] = $resultrow["class_highest"];
			elseif($ScoreOutOfDetails[$class][$subjectid] > 0 && $ScoreOutOfDetails[$class][$subjectid] < 100)
				$classHighestArr[$section] = round((($resultrow["class_highest"]/$totalQuestions) * $ScoreOutOfDetails[$class][$subjectid]),2);
			else
				$classHighestArr[$section] = round(($resultrow["class_highest"]/$totalQuestions) * 100);
			// end class highest display
				

			# if we are taking SUM(total) in place of AVG(total) than we have to calculate as per below
			#$SectionOverallPerfo[$section] = round(($resultrow["totalperfo"]/($totalQuestions * $SectionStudCount)) * 100);
		}

		//$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($subtopic_arr,$questionSeq,$SectionWiseStudents,$connid);
		$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);

		// This portion of converting array into some different array due to array manipulated in bar chart is different
		// We need to synchro the arrays in both the function to remove below codes

		foreach($SubTopicWisePerfoArr as $subtopicid => $perfomance){
			if($request_id != 0){
				foreach($request_arr as $requestid => $sectionarr){
					foreach($sectionarr as $section=>$sectionid){
						$classperfo[$section][$subtopicid] = $perfomance[$section];
						$classperfo[$section]['Name'] = "Section ".$sectionid;
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

		/*$studentquery = "SELECT da_studentMaster.studentID,da_studentMaster.studentName,da_studentMaster.rollNo,da_studentMaster.schoolCode,
								da_studentMaster.class,da_studentMaster.section,da_studentMaster.dob,da_studentMaster.gender,
								da_response.studentName as ResponseStudentName,da_response.paperversion,da_response.total,schools.schoolname,schools.schoolno
					  	 FROM da_studentMaster
					  	 LEFT JOIN da_response ON da_studentMaster.studentID = da_response.studentID
					  	 LEFT JOIN schools ON da_studentMaster.schoolCode = schools.schoolno
					  	 WHERE da_response.examcode = '".$examcode."' $condition
					  	 ORDER BY da_studentMaster.studentID ";*/
		$studentquery = "SELECT da_studentMaster.studentID,da_studentMaster.studentName,da_studAcadDetails.rollNo,da_studentMaster.schoolCode,
								da_studAcadDetails.class,da_studAcadDetails.section,da_studentMaster.dob,da_studentMaster.gender,
								da_response.studentName as ResponseStudentName,da_response.paperversion,da_response.total,schools.schoolname,schools.schoolno
					  	 FROM da_studentMaster
					  	 LEFT JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID AND da_studAcadDetails.year = '".$year."'
					  	 LEFT JOIN da_response ON da_studentMaster.studentID = da_response.studentID
					  	 LEFT JOIN schools ON da_studentMaster.schoolCode = schools.schoolno
					  	 WHERE da_response.examcode = '".$examcode."'
					  	 AND da_response.paperversion IN(1,2,3,4) $condition
					  	 ORDER BY da_studentMaster.studentID ";
		//echo "<br> Query ::".$studentquery;

		$dbstudquery = new dbquery($studentquery,$connid);
		while($studentrow = $dbstudquery->getrowarray()){

			$studentid = $studentrow['studentID'];
			# commented as we don't display the name passed in tab response Mantis BT:477
			/*if($studentrow["ResponseStudentName"] != "")
				$studentname = $studentrow['ResponseStudentName'];
			else 
				$studentname = $studentrow['studentName'];*/
			$studentname = $studentrow['studentName'];	
			$studentschooname = $studentrow['schoolname'];
			$schoolname =$this->schoolNameCorrection($studentschooname); 
			$studentpaperversion = $studentrow['paperversion'];
			$studentinfo = array("studentid"=>$studentrow['studentID'],"studentname"=>$studentname,"schoolname"=>$schoolname,
								 "rollno"=>$studentrow['rollNo'],"paperversion"=>$studentrow['paperversion'],"class"=>$studentrow['class'],"section"=>$studentrow['section'],
								 "subject"=>$subject,"schoolcode"=>$studentrow['schoolno'],"totalcorrectanswer"=>$studentrow["total"]);
			$studentwisemisconceptionque = $this->getStudentsMisconceptionQues($examcode,$studentid,$studentpaperversion,$misconceptionque_arr_with_ans,$questionSeq,$SectionWiseStudents[$examcode],$connid);
			$studentPerfoSubtopicWiseArr = $this->getStudentPerfoInSubtopic($examcode,$studentid,$studentname,$studentpaperversion,$ReportingQuesArr,$questionSeq,$connid);
			$studentsAnswer[$studentid] = $this->getSubtopicWiseStudentAnswer($examcode,$studentid,$studentpaperversion,$paperwiseQueSeq,$questionSeq,$connid);
			$this->createStudentReportPDF($request_id,$examcode,$subjectid,$testdate,$testName,$studentid,$studentinfo,$questionSeq,$studentwisemisconceptionque,$studentPerfoSubtopicWiseArr,$classperfo,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$SectionOverallPerfo[$examcode],$ScoreOutOfDetails[$class][$subjectid],$QueFromVersionTable,$connid,$classHighestArr[$examcode]);

		}
	}

	function getStudentsMisconceptionQues($examcode,$studentid,$studentpaperversion,$misconceptionque_arr_with_ans,$questionSeq,$SectionWiseStudents,$connid){
		
		$notmisconqueforstud = array();
		$studentmisconque = array();
		
		# Total Student Counts
		$studentids = "";
		foreach($SectionWiseStudents as $paperversion => $ids){
			$studentids .= $ids.",";
		}
		$studentids = rtrim($studentids,",");
		if($studentids != "")
			$TotalStudents = count(explode(",",$studentids));
		else 
			$TotalStudents = 0;	
			
		# Original process for finding MC Questions for Students
		foreach($misconceptionque_arr_with_ans as $que => $ans){

			$questionno = "A".($questionSeq[$studentpaperversion][$que] + 1);
			
			$query = "SELECT $questionno AS answer FROM da_response WHERE studentID = '".$studentid."' AND examcode = '".$examcode."'";
			$dbqry = new dbquery($query,$connid);
			while($row = $dbqry->getrowarray()){

				if($row['answer'] == $ans)
					$notmisconqueforstud[$que] = array('correct'=>$ans,'student'=>$row['answer']);
				elseif($row['answer'] != $ans){
					$studentmisconque[$que] = array('correct'=>$ans,'student'=>$row['answer']);
				}
			}
		}
		
		# Calculating Questions Performance for section
		foreach($studentmisconque as $qcode => $studoption){

			$correct_answer = $studoption["correct"];
			$version1seq = $questionSeq[1][$qcode] +1;
			$version2seq = $questionSeq[2][$qcode] +1;
			$version3seq = $questionSeq[3][$qcode] +1;
			$version4seq = $questionSeq[4][$qcode] +1;
				
			$query = "SELECT SUM(if((A$version1seq = '".$correct_answer."' AND paperversion = 1) OR (A$version2seq = '".$correct_answer."' AND paperversion = 2) OR (A$version3seq = '".$correct_answer."' AND paperversion = 3) OR (A$version4seq = '".$correct_answer."' AND paperversion = 4),1,0)) as total
					  FROM da_response 
					  INNER JOIN da_examDetails ON da_response.examcode = da_examDetails.exam_code
					  INNER JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
					  INNER JOIN da_studAcadDetails ON da_response.studentID = da_studAcadDetails.studentID AND da_testRequest.year = da_studAcadDetails.year
					  WHERE examcode = '".$examcode."'";
			$dbqry = new dbquery($query,$connid);
			$result = $dbqry->getrowarray();
			$studentmisconque[$qcode]["perfo"] = round(($result["total"]/$TotalStudents)*100);
		}

		# Commented as per nishchal task Mantis BT:0000405 - student has answered it correctly, it should not go in the student report.dt:06-07-2012
		/*# Added as per muntaquim instruction if student doesn't  have any misconception or less than the constant defined than we have to do this - dt: 02-06-2011
		if(count($studentmisconque) < constant("MAX_MISCON_QUE_TO_DISP")){
			$studentmisconque = $studentmisconque + $notmisconqueforstud;
		}*/
		
		# sort by que perfo
		$perfo = array();
		foreach($studentmisconque as $key => $data){
			$perfo[$key] = $data["perfo"];
		}
		$qcodekeys = array_keys($studentmisconque);
		array_multisort($perfo,SORT_DESC,$qcodekeys,SORT_ASC,$studentmisconque); // sort by perfo and also sorted keys as multisort not keeping keys
		$studentmisconque = array_combine($qcodekeys,$studentmisconque); // combine keys with values*/
		unset($perfo); unset($qcodekeys);
		return $studentmisconque;
	}

	function createStudentReportPDF($request_id,$examcode,$subjectid,$testdate,$testName,$studentid,$studentinfo,$questionSeq,$studentwisemisconceptionque,$studentPerfoSubtopicWiseArr,$classperfo,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$SectionOverallPerfo,$score_outof,$QueFromVersionTable,$connid,$classHighestVal){

		$linebreak = 14;
		$doublelinebreak = 20;
		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		$leading = 120;
		$this->pageno = 0;
		$dateParameters=explode("-",$testdate);
		$testdate=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];

		$schoolcode = $studentinfo['schoolcode'];

		$pdf = pdf_new();

		pdf_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 7.0.2
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");
		pdf_set_parameter($pdf, "glyphwarning", "true");

		$this->LoadpdfFont($pdf,$this->fontname);

		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/",0755);

		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/",0755);

		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/",0755);

		$ActualStudentReportPath = constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/";

		if(!is_dir($ActualStudentReportPath."/$examcode/"))
			mkdir($ActualStudentReportPath."/$examcode/",0755);

		pdf_begin_document($pdf,$ActualStudentReportPath."/$examcode/$studentid.pdf","");

		$this->CreateFirstPageOfStudentReport($pdf,$examcode,$subjectid,$testdate,$testName,$studentid,$studentinfo,$studentPerfoSubtopicWiseArr,$classperfo,$reportingtopic_arr,$SectionOverallPerfo,$questionSeq,$score_outof,$connid,$classHighestVal);

		pdf_begin_page($pdf, $this->page_width, $this->page_height);
		$this->pageno++;
		$this->addpagenumber($pdf,$this->pageno);

		$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
		createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
	    pdf_setfont($pdf,$this->font,$this->fontsize);

	    $ypos = $this->page_height - $this->top_margin;
	    
	    $macro ="<macro { Body {alignment=justify leading=120% fontname=$this->fontname fontsize=$this->fontsize encoding=unicode}
						   	 Body_bold {alignment=justify leading=120% fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode}
						   }>";
		# we don't have to display the student answer table for Heritage School Gurgaon as per nitesh request
		//if($schoolcode != 60414){
		# we have removed commented portion for heritage school,as per rahulv's request.	
		$yposbeforeansertbl = $ypos;
		$buffersize = 50;
		$yp_ret = $this->drawStudentAnswerTable($pdf,$ypos,$studentinfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$CorrectAnswerArr,$studentsAnswer,$actualheight,$buffersize);
		
		$newPage = $yp_ret[1];
		if($newPage == 1)
		{
			$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
			$yposbeforeansertbl = $this->page_height - $this->top_margin;
		}
		
		$text1 = "<&Body_bold>Your Test Summary\n".
				"<&Body>You attempted Version ".$studentinfo["paperversion"]." of this test. The details of your responses, and hence your score, are given below.";
				
		$nooflines1 = ceil(pdf_stringwidth($pdf,$text1,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		$expected_height1 = ($nooflines1+2) * ($this->fontsize); // expected height should be multiply by fontsize by but depends on leading also 20% more that means its 2 size more than the actual font size
		$optlist = "font=$this->font fontsize=$this->fontsize leading=100%";
		$testsummarytxt = pdf_create_textflow($pdf,$macro.$text1, $optlist);
		pdf_fit_textflow($pdf,$testsummarytxt,$this->left_margin,$yposbeforeansertbl,$this->page_width-$this->right_margin,$expected_height1,"");
		$textflow_height1 = pdf_info_textflow($pdf,$testsummarytxt,"textheight");
		pdf_delete_textflow($pdf,$testsummarytxt);
		
		$ypos = $yp_ret[0] - 10;
		$ypos -= $doublelinebreak;
		//}
	    
		$buffersize = 50;
		$orgyposbeforechart = $ypos;
		$nooftopics = count($reportingtopic_arr);
	    
	    # we dont have to draw the comparison for student and class for below schools
		if($schoolcode == 24374 || $schoolcode == 60414)
			$noofsection = count($SECTIONARRAY = $studentPerfoSubtopicWiseArr);
		else		
			$noofsection = count($SECTIONARRAY = $classperfo + $studentPerfoSubtopicWiseArr);
			
		$actualheight = $this->page_height - $this->top_margin - $this->bottom_margin;

		$returnposition = $this->getTopicWisePerfoBarGraph($pdf,$ypos,$nooftopics,$noofsection,$linetype = 'normal',$reportingtopic_arr,$SECTIONARRAY,$actualheight,$buffersize);

		$nextpage=$returnposition[1];
		$ypos = $returnposition[0];
   		if($nextpage==1){
   			$orgyposbeforechart = $this->page_height-$this->top_margin;
   			$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
   		}

   		pdf_setfont($pdf,$this->fontbold,$this->fontsize);
   		pdf_show_xy($pdf,"Key Ideas Assessed",$this->left_margin,$orgyposbeforechart);

   		pdf_setfont($pdf,$this->font,$this->fontsize);
   		$message = "You were assessed on the following concept areas. Your performance in each of these areas is given in the chart below.";
   		$textflow = PDF_create_textflow($pdf, $message, "fontname=$this->fontname fontsize=$this->fontsize encoding=winansi leading=$leading%");
		do {
		    $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $orgyposbeforechart, "");

		} while (strcmp($textflowresult, "_stop"));

		PDF_delete_textflow($pdf, $textflow);
		
		$ypos -= $doublelinebreak;
		
		$text = "<&Body_bold>Misconceptions Identified\n".
				"<&Body>This section lists misconceptions identified based on your test performance.";
				
		$nooflines = ceil(pdf_stringwidth($pdf,$text,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		
		# if misconception found then we have to print from next page  
		if(is_array($studentwisemisconceptionque) && count($studentwisemisconceptionque) > 0)
			$expected_height = ($nooflines+15) * ($this->fontsize); // expected height should be multiply by fontsize by but depends on leading also 20% more that means its 2 size more than the actual font size
		else 	
			$expected_height = ($nooflines+2) * ($this->fontsize);
		
		if(($ypos - $this->bottom_margin) < $expected_height) {

			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			$this->pageno++;
		    $this->addpagenumber($pdf,$this->pageno);

		    $this->LoadpdfFont($pdf,$this->fontname);
			pdf_setfont($pdf, $this->font, $this->fontsize);

			$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
			
			$xpos = $this->left_margin;
			$ypos = $this->page_height-$this->top_margin;
		}
		
		$optlist = "font=$this->font fontsize=$this->fontsize leading=100%";
		$paraaftertbl = pdf_create_textflow($pdf,$macro.$text, $optlist);
		pdf_fit_textflow($pdf,$paraaftertbl,$this->left_margin,$ypos,$this->page_width-$this->right_margin,$expected_height,"");
		$textflow_height = pdf_info_textflow($pdf,$paraaftertbl,"textheight");
		pdf_delete_textflow($pdf,$paraaftertbl);
		
		$ypos -= $textflow_height;
		$ypos -= $doublelinebreak;
		
		if(is_array($studentwisemisconceptionque) && count($studentwisemisconceptionque) > 0) {

			$i =0;
			foreach($studentwisemisconceptionque as $qcode => $answers){

					if(array_key_exists($qcode,$QueFromVersionTable)){
						
						$QueTblName = "da_questions_versions";
						$Condition = " AND da_questions_versions.version = '".$QueFromVersionTable[$qcode]."'";
						
					}else{
						
						$QueTblName = "da_questions";
						$Condition = "";
					}
							
					$i++;
					$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,group_id,
									 $QueTblName.passage_id,qms_passage.passage_name
							  FROM $QueTblName
							  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
							  WHERE qcode = '".$qcode."' AND misconception = 1 $Condition";
					$dbqry = new dbquery($query,$connid);
					$result = $dbqry->getrowarray();
					$mcexplanation = (isset($result['mcexplanation']) && $result['mcexplanation'] != 'NULL')?$result['mcexplanation']:"";
					$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";
					
					$concept = str_replace("<P>","",$concept);
				   	$concept = str_replace("</P>","",$concept);
				   	$concept = str_replace("<p>","",$concept);
				   	$concept = str_replace("</p>","",$concept);
					$concept = $this->common_pdf_junk_replace($concept);
					
					$nooflines = ceil(pdf_stringwidth($pdf,"Concept : $concept",$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));

					$passagenamebuffer = 0;
					$passagename = "";

					if($studentinfo['subject'] ==  "English" && $result["passage_id"] != 0 && $result['passage_name'] != ""){

						$passagename = $this->common_pdf_junk_replace($result["passage_name"]);
						$nooflinesofpsg = ceil(pdf_stringwidth($pdf,$passagename,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
						$passagenamebuffer = ($nooflinesofpsg * ($this->fontsize+1)) + $singlelinebreak;
					}

					$buffersize = ($nooflines * ($this->fontsize+1)) + $doublelinebreak + $passagenamebuffer;

					$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
					$qcodestr = $this->common_pdf_junk_replace($qcodestr);

				   	$yposbeforequestion = $ypos;
				   	# commented as per discussion with manish & muntaquim as images comes from only 1
				   	/*if($result["group_id"] != 0)
				   		$imagepathfrom = 2;
				   	else*/
				   	$imagepathfrom = $this->imagepathfrom;

				   // naveen questionStem =1 
				   //	$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
				   	$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,1,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

				   	$isNewPage=$ypos_returned[1];
				   	$yposafterque = $ypos_returned[0];

				   	if($isNewPage==1){
				   		$this->pageno++;
				   		$this->addpagenumber($pdf,$this->pageno);
	           			$yposbeforequestion = $this->page_height-$this->top_margin;
	           			$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
						pdf_setfont($pdf,$this->font,$this->fontsize);
	           		}

	           		$queno = $questionSeq[$studentinfo['paperversion']][$qcode] + 1;

	           		# Imlemented question no printing as per paper
	           		$yposforQ = $yposbeforequestion - $buffersize + 7;

	           	   	pdf_setfont($pdf, $this->fontbold, $this->fontsize);
				   	pdf_show_xy($pdf,"Q",$this->left_margin-13,$yposforQ-5);
				   	pdf_setrgbcolor($pdf, 0, 0, 0);

				   	pdf_setlinewidth($pdf,0.5);
			 	   	pdf_moveto($pdf,$this->left_margin-15,$yposforQ-$oneandhalflinebreak+6);
				   	pdf_lineto($pdf,$this->left_margin-3,$yposforQ-$oneandhalflinebreak+6);
			 	   	pdf_stroke($pdf);

			 	   	if($queno>9) $qno_position=14; else $qno_position=12;
			 	   	pdf_setfont($pdf, $this->fontbold, 8);
				   	pdf_show_xy($pdf,$queno,$this->left_margin-$qno_position,$yposforQ-17);

				   	pdf_setlinewidth($pdf,0.5);
	 	   			pdf_moveto($pdf,$this->left_margin-15,$yposforQ-19);
		   			pdf_lineto($pdf,$this->left_margin-3,$yposforQ-19);
	 	   			pdf_stroke($pdf);

				   	//pdf_show_xy($pdf,"Q ".$queno.":",$this->left_margin,$yposbeforequestion - $buffersize + 1.5); // 1.5 is added cause in new autopublish paper funciton question print slightly up

				   	################ Question End #################

				   	$buffersize = $singlelinebreak;
				    $yposbeforeconcept = $yposbeforequestion;

				    $ypos_returned = autoPublishPaper($pdf,"<b>Concept:</b> ".$concept,$this->left_margin,$yposbeforequestion,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

				    $isNewPage = $ypos_returned[1];
				    $yposafterconcept = $ypos_returned[0];

				    if($isNewPage == 1){
				    	$this->pageno++;
				    	$yposbeforeconcept = $this->top_margin - $buffersize;
				    	$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
						pdf_setfont($pdf,$this->font,$this->fontsize);
				    }

				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeconcept+3);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeconcept+3);
				    pdf_stroke($pdf);

					pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposafterconcept+8); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposafterconcept+8);
				    pdf_stroke($pdf);

				    # line above question no
				    pdf_moveto($pdf,$this->left_margin-15,$yposafterconcept+8); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->left_margin-3, $yposafterconcept+8);
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
				   	pdf_show_xy($pdf,"Your Response: ".$this->ansseqarr[$answers["student"]],$this->left_margin+125,$ypos);

				   	pdf_setfont($pdf,$this->font,$this->fontsize);

				   	$ypos -= $doublelinebreak;

				   	/*pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$ypos); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
				    pdf_stroke($pdf);

				    $ypos -= 10;*/

				   	$buffersize = 0;
				   	$mcexplanation = $this->common_pdf_junk_replace($mcexplanation);
				    $ypos_mcexplanation = autoPublishPaper($pdf,$mcexplanation,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

				    $ypos = $ypos_mcexplanation[0];
				   	$isNewPage=$ypos_mcexplanation[1];

				   	if($isNewPage==1){
	           			$this->pageno++;
	           			$this->addpagenumber($pdf,$this->pageno);
	           			$yposbeforeremedial = $this->page_height-$this->top_margin;
	           			$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
	    				pdf_setfont($pdf,$this->font,$this->fontsize);
	           		}

				   	$remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
				    //$nooflines_rm = ceil(pdf_stringwidth($pdf,$remedial_measure,$this->font,9)/($this->page_width-$this->left_margin-$this->right_margin));
	           		if($remedial_measure != ""){

		           		$yposbeforeremedial = $ypos;
					   	$buffersize = 10;
					   	$remedial_measure = $this->common_pdf_junk_replace($remedial_measure);
					   	$remedial_measure ="<hr>123</hr><br><b>Remedial Measure</b><hr>123</hr><br><br>".$remedial_measure;
					   	//$ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
					    $parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"],"pageno"=>$this->pageno,"report"=>"STUDENT");
					   	$ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages,$arrangeoptions=1,$istextpassage="Y",$optionLetters=array(),$medium="",$parameters);

					   	$isNewPage=$ypos_returned[1];
					   	$ypos = $ypos_returned[0];
		           		if($isNewPage==1){
		           			$this->pageno = $ypos_returned[2];
		           			//$this->addpagenumber($pdf,$this->pageno);
		           			$yposbeforeremedial = $this->page_height-$this->top_margin;
		           			$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"]);
							//createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","STUDENT");
		    				pdf_setfont($pdf,$this->font,$this->fontsize);
		           		}

					   /* pdf_setlinewidth($pdf,0.1);
						pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
						pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
					    pdf_stroke($pdf);

					    $yposbeforeremedial -= 10;
						
					    pdf_setfont($pdf,$this->fontbold,$this->fontsize);					
					    pdf_show_xy($pdf,"Remedial Measure",$this->left_margin,$yposbeforeremedial);
						pdf_setfont($pdf,$this->font,$this->fontsize);
					    $yposbeforeremedial -= 3;

					    pdf_setlinewidth($pdf,0.1);
						pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
						pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
					    pdf_stroke($pdf);*/
	           		}
	           		$ypos -= $doublelinebreak;
					if($i == constant("MAX_MISCON_QUE_TO_DISP")) break;

			}
		} else {
			$ypos -= $singlelinebreak;
			pdf_setfont($pdf,$this->font,$this->fontsize);
			pdf_show_xy($pdf,"No key misconceptions identified.",$this->left_margin,$ypos);
			$ypos -= $singlelinebreak;
		}

		# key ideas assessed is here
		
		pdf_end_page($pdf);
		pdf_end_document($pdf,"");
		
		# Move to bucket
		$source_path = $ActualStudentReportPath."/".$examcode."/".$studentid.".pdf";
		$dest_path = "PDF/".$schoolcode."/".$request_id."/reports/".$examcode."/".$studentid.".pdf";
		
		$request_type = $this->getRequestType($request_id,$connid);
		if(constant("SERVER_TYPE") == "Live"){
			$S3Res = $this->MoveToBucket($source_path,$dest_path);
			if($S3Res==1){
				@unlink($source_path);
			}
		}	
		
	}

	function getSubtopicWiseStudentAnswer($examcode,$studentid,$studentpaperversion,$paperwiseQueSeq,$questionSeq,$connid){

		$StudentAnswers = array();
		if(is_array($paperwiseQueSeq[$studentpaperversion]) && count($paperwiseQueSeq[$studentpaperversion]) > 0) {
			foreach($paperwiseQueSeq[$studentpaperversion] as $key => $qcode){

				$questionno = "A".($questionSeq[$studentpaperversion][$qcode] + 1);
				$query = "SELECT $questionno AS answer FROM da_response WHERE studentID = '".$studentid."' AND examcode = '".$examcode."'";
				$dbqry = new dbquery($query,$connid);
				while($studentrow = $dbqry->getrowarray()){
					$StudentAnswers[$qcode] = $studentrow['answer'];
				}
			}
		}
		return $StudentAnswers;
	}

	function GenerateSectionReport($examcode=0,$request_id=0,$connid,$regenerateid=0){

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
			$examcode_str .= "'".$row['exam_code']."',";
			if($request_id == 0)
				$request_id = $row["request_id"];
		}

		/*echo "<pre>";
		print_r($request_arr);
		echo "</pre>";*/
		
		# Checking to exclude the dropped questions (using report regenerate interface earlier) from reports
		if($regenerateid == 0){
			
			$chk_query = "SELECT regen_id FROM da_reportsRegen WHERE request_id = '".$request_id."' ORDER BY requested_dt DESC limit 1";
			$chk_dbqry = new dbquery($chk_query,$connid);
			$chk_result = $chk_dbqry->getrowarray();
			$regenerateid = $chk_result["regen_id"];
		}

		/*$query = "SELECT da_response.examcode,da_response.paperversion, group_concat( distinct(da_response.studentID) ) AS studentids,
				  da_testRequest.paper_code,B.qcode_list,da_testRequest.test_date,da_testRequest.subject,da_testRequest.class,
				  da_testRequest.schoolCode,da_testRequest.paper_code,da_testRequest.testName,da_examDetails.section,da_testRequest.alloted_to,
				  da_testRequest.approved_date,da_testRequest.year,
				  count(distinct(da_response.studentID)) as no_of_students,da_orderMaster.score_outof,da_orderMaster.order_id
				  FROM da_examDetails
				  LEFT JOIN da_response ON da_examDetails.exam_code = da_response.examcode
				  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_orderMaster ON da_testRequest.schoolCode = da_orderMaster.schoolCode AND da_testRequest.year = da_orderMaster.year
				  LEFT JOIN da_paperDetails AS A ON da_testRequest.paper_code = A.papercode
				  LEFT JOIN da_paperDetails AS B ON da_response.paperversion = B.version AND A.papercode = B.papercode
				  WHERE da_examDetails.exam_code IN(".rtrim($examcode_str,',').")
				  GROUP BY da_examDetails.exam_code,da_response.paperversion";*/

		$query = "SELECT da_response.examcode,da_response.paperversion, group_concat( distinct(da_response.studentID) ) AS studentids,
						 da_testRequest.paper_code,B.qcode_list,da_testRequest.test_date,da_testRequest.subject,da_testRequest.class,
						 da_testRequest.schoolCode,da_testRequest.paper_code,da_testRequest.testName,da_examDetails.section,da_testRequest.alloted_to,
						 da_testRequest.approved_date,da_testRequest.year,
						 count(distinct(da_response.studentID)) as no_of_students,da_orderMaster.score_outof,da_orderMaster.order_id
				  from da_studAcadDetails
				  left join da_response ON da_studAcadDetails.studentID = da_response.studentID
				  left join da_examDetails ON da_response.examcode = da_examDetails.exam_code
				  left join da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_orderMaster ON da_testRequest.schoolCode = da_orderMaster.schoolCode AND da_testRequest.year = da_orderMaster.year
				  LEFT JOIN da_paperDetails AS A ON da_testRequest.paper_code = A.papercode
				  LEFT JOIN da_paperDetails AS B ON da_response.paperversion = B.version AND A.papercode = B.papercode
				  WHERE 1=1
				  AND da_studAcadDetails.section = da_examDetails.section
				  AND da_studAcadDetails.class = da_testRequest.class
				  AND da_examDetails.exam_code IN(".rtrim($examcode_str,',').")
				  GROUP BY da_examDetails.exam_code,da_response.paperversion";
		//echo "<br> Query ::".$query;

		$dbquery = new dbquery($query,$connid);

		if($dbquery->numrows() == 0) {

			$headers = "From: <system@ei-india.com>\r\n";
			$headers .= "Reply-To: <sudhir.prajapati@ei-india.com>\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$subject = "DA - Reports Auto Generation Notice";
			$message = "DA - Auto Report Generation Failed! No Records Found!<br><br><b>Report: </b>Teacher Report<b><br><b>Exam Code:</b> ".$examcode."</b> ";

			mail(constant("DA_REPORT_FAILURE_EMAIL_TO"),$subject,$message,$headers);
			die("No Records Found For Given Request Id, Report will not be generated!");
		}

		$paperwisesequence = array();
		$AllStudentsArr = array();
		$SectionWiseStudents = array();
		$reportingtopic_arr = array();
		$TestInfo = array();
		$totalStudents = 0;

		while($row = $dbquery->getrowarray()){
			$totalStudents += $row["no_of_students"];
			$ExamCodeInfo[$row['examcode']] = array("papercode"=>$row["paper_code"],"schoolcode"=>$row["schoolCode"],"subject"=>$row['subject'],
							  						"class"=>$row["class"],"testdate"=>$row["test_date"],"testname"=>$row["testName"],
							  						"section"=>$row["section"],
							  						"totalstudents"=>$totalStudents,"approved_date"=>$row["approved_date"],"score_outof"=>$row["score_outof"],
							  						"alloted_to"=>$row["alloted_to"],"year"=>$row["year"]);

			$papercode = $row['paper_code'];
			$qcodelist = $row['qcode_list'];
			$approved_date = $row["approved_date"];
			//$paperwiseQueSeq[$row['paperversion']] = explode(',',$row['qcode_list']); # now we are taking from da_paperDetails table
			$SectionWiseStudents[$row['examcode']][$row['paperversion']] = $row['studentids'];
			
			$order_id = $row["order_id"];
			$examClass = $row["class"];
			$subjectid = $row["subject"];
			$schoolcode = $row["schoolCode"];
		}

		$questionquery = "SELECT papercode,version,qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' ORDER BY papercode";
		$dbqueqry = new dbquery($questionquery,$connid);
		while($querow = $dbqueqry->getrowarray()){

			$paperwiseQueSeq[$querow['version']] = explode(',',$querow['qcode_list']);

			if($qcodelist == "")
				$qcodelist = $querow['qcode_list'];
		}

		if($qcodelist == "") die("No Questions Found In Paper, Report will not be generated!");

		# score out of query
		$ScoreOutOfDetails = array();
		if($order_id != '' && $order_id != 0){
			$sc_qry = "SELECT class, e_score_outof, m_score_outof, s_score_outof FROM da_orderBreakup
					   WHERE order_id = $order_id AND class = $examClass GROUP BY class";
			$sdbqry = new dbquery($sc_qry,$connid);
			while($score_result = $sdbqry->getrowarray()){
				$ScoreOutOfDetails[$examClass][1] = $score_result['e_score_outof'];
				$ScoreOutOfDetails[$examClass][2] = $score_result['m_score_outof'];
				$ScoreOutOfDetails[$examClass][3] = $score_result['s_score_outof'];
			}
		}else if($schoolcode == "2502830"){ // dummy school for DA
				$ScoreOutOfDetails[$examClass][1] = 100;
				$ScoreOutOfDetails[$examClass][2] = 100;
				$ScoreOutOfDetails[$examClass][3] = 100;
		}
		
		$questionSeq = array();
		foreach($paperwiseQueSeq as $paper => $quesarray){
			$questionSeq[$paper] = array_flip($quesarray);
		}

		$misconceptionque_arr = array();
		$misconceptionque_arr_with_ans = array();
		$QueFromVersionTable = array();
		$CorrectAnswerArr = array();
		
		# if we have report regenration request with quetion version than below process
		$VersionQues = array();	
		$DropQuesArr = array();
		if($regenerateid != 0){
			
			$dque_query = "SELECT drop_ques FROM da_reportsRegen WHERE regen_id = '".$regenerateid."'";
			$dque_dbqry = new dbquery($dque_query,$connid);
			$drop_result = $dque_dbqry->getrowarray();
			if($drop_result["drop_ques"] != "")
				$DropQuesArr = explode(",",$drop_result["drop_ques"]);
			
			$vquery = "SELECT qcode,version FROM da_reportsRegen_questions WHERE version != 0 AND regen_id = '".$regenerateid."'";
			$vdbqry = new dbquery($vquery,$connid);
			while($vrow = $vdbqry->getrowarray()){
				$VersionQues[$vrow["qcode"]] = $vrow["version"];
			}
			
			if(is_array($VersionQues) && count($VersionQues) > 0){
			
				foreach($VersionQues as $qcode => $version){
					$ver_query = "SELECT qcode,correct_answer,misconception FROM da_questions_versions WHERE qcode = '".$qcode."' AND version = '".$version."'";
					$ver_dbqry = new dbquery($ver_query,$connid);
					$ver_raw = $ver_dbqry->getrowarray();
					$QueFromVersionTable[$qcode] = $version;
					$CorrectAnswerArr[$ver_raw['qcode']] = $ver_raw["correct_answer"];
					
					if($ver_raw["misconception"] == 1 && !in_array($qcode,$DropQuesArr)) {
						$misconceptionque_arr[] = $ver_raw['qcode'];
						$misconceptionque_arr_with_ans[$ver_raw['qcode']] = $ver_raw['correct_answer'];
					}
				}
			}
		}
		
		# need to check whether question version is available than need to use the data from da_questions_versions table
		$clsdaquestion = new clsdaquestion();
		$query2 = "SELECT qcode,correct_answer,misconception,lastModified FROM da_questions WHERE qcode IN($qcodelist)";
		$dbquery2 = new dbquery($query2,$connid);
		while($row2 = $dbquery2->getrowarray()){

			if(!array_key_exists($row2["qcode"],$VersionQues)){
			
				$QueTableResultArr = $clsdaquestion->GetQueTableAndVersion($connid,$row2["qcode"],$approved_date,$row2["lastModified"]);
				
				if($QueTableResultArr["tablename"] == "da_questions_versions"){
					
					$CorrectAnswerArr[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					$QueFromVersionTable[$row2["qcode"]] = $QueTableResultArr["version"];
					if($QueTableResultArr["misconception"] == 1 && !in_array($row2["qcode"],$DropQuesArr)){
						$misconceptionque_arr[] = $row2['qcode'];
						$misconceptionque_arr_with_ans[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					}
				}	
				else{
					$CorrectAnswerArr[$row2['qcode']] = $row2["correct_answer"];
					if($row2["misconception"] == 1 && !in_array($row2["qcode"],$DropQuesArr)) {
						$misconceptionque_arr[] = $row2['qcode'];
						$misconceptionque_arr_with_ans[$row2['qcode']] = $row2['correct_answer'];
					}
				}
			}	
		}
		
		$repqry = "SELECT reporting_id,papercode,sst_list,qcode_list,reporting_head FROM da_reportingDetails WHERE papercode = '".$papercode."' ORDER BY reporting_order";
		$repdbqry = new dbquery($repqry,$connid);
		while($reportingrow = $repdbqry->getrowarray()){
			$reportingtopic_arr[$reportingrow['reporting_id']] = $reportingrow['reporting_head'];
			$reporting_subsubtopicarr[$reportingrow['reporting_id']] = $reportingrow['sst_list'];
			$ReportingQuesArr[$reportingrow['reporting_id']] = explode(",",$reportingrow["qcode_list"]);
		}

		$QuesWiseStudentPerfo = $this->GettopicWiseStudentAnswer($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		$DiffEasyQuestions = $this->getDifficultAndEasiestQueArray($QuesWiseStudentPerfo);
		$MisconceptonQuestions = $this->getMisconceptionQueToDisplay($misconceptionque_arr_with_ans,$ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		
		/*if($examcode==999693 || $examcode==422933)
		    $MisconceptonQuestions["999693"] = array("5453"=>"1","5047"=>"1","3718"=>"1");*/
		$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);

		# Calculating overall perfomance
		$totalQuestions = count($questionSeq[1]);
		$SectionOverallPerfo = array();
		$SectionMinMaxPerfo = array();
		foreach($SectionWiseStudents as $section => $paperwisestudents){

			$SectionStudents[$section] = "";
			foreach($paperwisestudents as $paperversion => $students){
				$SectionStudents[$section] .= $students.",";
			}

			$SectionStudents[$section] = rtrim($SectionStudents[$section],",");
			$SectionStudCount = count(explode(",",trim($SectionStudents[$section])));

			$qry = "SELECT AVG(total) as totalperfo,MIN(total) as minperfo,MAX(total) as maxperfo FROM da_response WHERE examcode ='".$section."' AND studentID IN(".rtrim($SectionStudents[$section],",").")";
			$dbqry = new dbquery($qry,$connid);
			$resultrow = $dbqry->getrowarray();

			
			
			/*Previous process of taking the score outof from da_orderMaster table
			if($ExamCodeInfo[$section]["score_outof"] == 0 && $ExamCodeInfo[$section]["score_outof"] != "")
				$SectionOverallPerfo[$section] = round($resultrow["totalperfo"],2);
			elseif($ExamCodeInfo[$section]["score_outof"] > 0 && $ExamCodeInfo[$section]["score_outof"] < 100)
				$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/$totalQuestions) * $ExamCodeInfo[$section]["score_outof"]),2);
			else
				$SectionOverallPerfo[$section] = round(($resultrow["totalperfo"]/$totalQuestions) * 100,2);*/
			
			if($ScoreOutOfDetails[$examClass][$subjectid] == 0 && $ScoreOutOfDetails[$examClass][$subjectid] != ""){
				$SectionOverallPerfo[$section] = round($resultrow["totalperfo"],2);
				$SectionMinMaxPerfo[$section]["MIN"] = round($resultrow["minperfo"],2);
				$SectionMinMaxPerfo[$section]["MAX"] = round($resultrow["maxperfo"],2);
				
			}	
			elseif($ScoreOutOfDetails[$examClass][$subjectid] > 0 && $ScoreOutOfDetails[$examClass][$subjectid] < 100){
				$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/$totalQuestions) * $ScoreOutOfDetails[$examClass][$subjectid]),2);
				$SectionMinMaxPerfo[$section]["MIN"] = round((($resultrow["minperfo"]/$totalQuestions) * $ScoreOutOfDetails[$examClass][$subjectid]),2);
				$SectionMinMaxPerfo[$section]["MAX"] = round((($resultrow["maxperfo"]/$totalQuestions) * $ScoreOutOfDetails[$examClass][$subjectid]),2);
			}	
			else{
				$SectionOverallPerfo[$section] = round(($resultrow["totalperfo"]/$totalQuestions) * 100,2);
				$SectionMinMaxPerfo[$section]["MIN"] = round(($resultrow["minperfo"]/$totalQuestions) * 100,2);
				$SectionMinMaxPerfo[$section]["MAX"] = round(($resultrow["maxperfo"]/$totalQuestions) * 100,2);
				
			}	

		    # taking normal performance in percentage for section to check the mailer condition
			$ExamCodeInfo[$section]["performance"] = round(($resultrow["totalperfo"]/$totalQuestions) * 100,2);
			# if we take SUM(total) in place of AVG(total) in above query than we have to use below calculations
			#$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/($totalQuestions * $SectionStudCount)) * $ExamCodeInfo[$section]["score_outof"]),2);

		}
		
		foreach($request_arr as $request_id => $examcodearr){
			foreach($examcodearr as $examcode => $section){
				$this->lowperfo_studentids = "";
				$this->GenerateSectionReportPDF($request_id,$examcode,$ExamCodeInfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$QuesWiseStudentPerfo,
											    $DiffEasyQuestions,$MisconceptonQuestions,$SubTopicWisePerfoArr,$SectionWiseStudents,$SectionOverallPerfo[$examcode],$QueFromVersionTable,$CorrectAnswerArr,$ScoreOutOfDetails[$examClass][$subjectid],$SectionMinMaxPerfo,$paperwiseQueSeq,$connid);
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
			$this->pageno++;
			$this->addpagenumber($pdf,$this->pageno);

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
		$tbl = pdf_add_table_cell($pdf, $tbl, 3, 2, "All sections", $optlist);

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
		$buffersize;
		$expected_height = ((count($reportingtopic_arr)*2) * 15) + $buffersize;
		
		if($ypos - $expected_height < $this->bottom_margin) {

			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			$this->pageno++;
			$this->addpagenumber($pdf,$this->pageno);

			$this->LoadpdfFont($pdf,$this->fontname);
			pdf_setfont($pdf, $this->font,$fontsize);

			$xpos = $this->left_margin;		   // Left margine
			$ypos = $this->page_height-$this->top_margin-$buffersize;  // Top margine

			if($newpageflag==0)
				$newpageflag=1;

		} else{

			$ypos = $ypos - $buffersize;
		}

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
		# if questions exceeds more than 25 in reporting head we will reduce the column width to 12 else 15
		if($maxcolforque >= 25)
			$perforcolwidth = 12;
		else	
			$perforcolwidth = 15;
		$widthneededforques = $maxcolforque * $perforcolwidth;
		$widthforsecondcol = $this->page_width - $this->right_margin - $widthneededforques - 175;//205
		pdf_setfont($pdf, $this->font,$fontsize);

		$tf=0; $tbl=0;
		$col = 1;
		$row = 0;

		
		$llx = $this->page_width - $this->right_margin; // TABLE WIDTH
		$lly= 40;// TABLE HEIGHT
		//$lly = 650; // TABLE HEIGHT

		$urx=$this->left_margin;   //POSITION OF X
		$ury=$ypos;  //POSITION OF Y

		$rowmax = count($reportingtopic_arr)*2;
		$colmax = $maxcolforque + 3; // (3 = reporting head,question no,average)
		pdf_setlinewidth($pdf, 0.1);

			foreach($ReportingQueArrSorted as $reportingid => $questionsarray){

				$row++;

				$tbl = PDF_add_table_cell($pdf, $tbl, 1, $row, " Concept Area", "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} colwidth=140 rowheight=1 margin=2");//170
				$tbl = PDF_add_table_cell($pdf, $tbl, 2, $row, " Question No.", "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} colwidth=$widthforsecondcol rowheight=1");

		        $question = isset($questionsarray[$keyidforarr])?$questionsarray[$keyidforarr]:0;
		        $col = 3;
		        foreach($questionsarray as $key => $queno){
		        	$quesequence = $questionSeq[1][$queno] + 1;
		        	$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $quesequence, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth rowheight=1");
		        	$col ++;
		        }

		        if($col != $colmax) {
			        for ($col; $col <= $colmax; $col++) {
			        	if($col != $colmax){
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, " ", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth rowheight=1");
			        	}
			        	else{
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, " Average", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35 rowheight=1");
			        	}
			        }
		    	}else {

		    		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "Average", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35 rowheight=1");
		    	}

		    	######## Started Second Row ##############

		    	$row++;
		    	$tfoptlist = "font=".$this->font." fontsize=$fontsize leading=110%";
		    	$tf =  pdf_add_textflow($pdf,0," ".$reportingtopic_arr[$reportingid], $tfoptlist);
		    	$tbl = PDF_add_table_cell($pdf, $tbl, 1, $row, "", "textflow=".$tf." fittextflow={} colwidth= 170 rowheight =1 fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} margin=2");
		    	$tbl = PDF_add_table_cell($pdf, $tbl, 2, $row, " % of student answering correctly", "fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} colwidth=$widthforsecondcol rowheight=1");

		        $question = isset($questionsarray[$keyidforarr])?$questionsarray[$keyidforarr]:0;
		        $col = 3;
		        $totqueforsubtopic = 0;
		        $totPerfoQuewise = 0;
		        foreach($questionsarray as $key => $queno){

		        	$studentperfo = round($QuesWiseStudentPerfo[$examcode][$queno]);

		        	/*if($studentperfo >= 80)
		        		$matchbox = "matchbox={fillcolor={gray .85}}";*/
		        	if($studentperfo <= 40)
		        		$matchbox = "matchbox={fillcolor={gray .75}}";
		        	else
		        		$matchbox = "";

		        	$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $studentperfo, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth rowheight=1 $matchbox");
		        	$totPerfoQuewise += $studentperfo;
		        	$col ++;
		        	$totqueforsubtopic++;
		        }

		        $avgPerfoStud = round($totPerfoQuewise/$totqueforsubtopic);

		        if($col != $colmax) {
			        for ($col; $col <= $colmax; $col++) {
			        	if($col != $colmax)
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row," ", "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=$perforcolwidth rowheight=1");
			        	else
			        		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $avgPerfoStud, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35 rowheight=1");
			        }
		    	}
		    	else {

		    		$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $avgPerfoStud, "fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} colwidth=35 rowheight=1");
		    	}
			}


		/* Place the table instance */
		$optlist = "header=1 fill={{area=rowodd fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}} ";
		$result = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
		
    	if ($result != "_stop") {
    		if ($result ==  "_error") {
				die("Couldn't place table: " . PDF_get_errmsg($p));
			}
    	}

		$tblheight = pdf_info_table($pdf,$tbl,"height");
		pdf_delete_table($pdf,$tbl,"");

		$returntocalling[0] = $ypos - $tblheight;
		$returntocalling[1] = $newpageflag;
		return $returntocalling;
	}

	function GenerateSectionReportPDF($request_id,$examcode,$ExamCodeInfo,$questionSeq,$reportingtopic_arr,$ReportingQuesArr,$QuesWiseStudentPerfo,$DiffEasyQuestions,$MisconceptonQuestions,$SubTopicWisePerfoArr,$SectionWiseStudents,$SectionOverallPerfo,$QueFromVersionTable,$CorrectAnswerArr,$score_outof,$SectionMinMaxPerfo,$paperwiseQueSeq,$connid){

		$doublelinebreak = 20;
		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		$this->pageno = 0;
		$schoolcode = $ExamCodeInfo[$examcode]["schoolcode"];
		#$score_outof = $ExamCodeInfo[$examcode]["score_outof"]; # passed in argument dt:2011-12-23

		$schoolqry = "SELECT schoolname FROM schools WHERE schoolno = '".$schoolcode."'";
        $dbschqry = new dbquery($schoolqry,$connid);
        $schoolinfo = $dbschqry->getrowarray();
        $schoolname = $schoolinfo["schoolname"];
		$schoolname = $this->schoolNameCorrection($schoolname);

		$dateParameters=explode("-",$ExamCodeInfo[$examcode]['testdate']);
		$ExamCodeInfo[$examcode]['testdate']=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];

		$pdf = pdf_new();
		pdf_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 7.0.2
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");

		$this->LoadpdfFont($pdf,$this->fontname);

		if(!is_dir(constant("PATH_SCHOOLREPORT")."/$schoolcode/"))
			mkdir(constant("PATH_SCHOOLREPORT")."/$schoolcode/",0755);

		if(!is_dir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/"))
			mkdir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/",0755);

		if(!is_dir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/reports/"))
			mkdir(constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/reports/",0755);

		$ActualSectionReportPath = constant("PATH_SCHOOLREPORT")."/$schoolcode/$request_id/reports/";

		if(!is_dir($ActualSectionReportPath."/$examcode/"))
			mkdir($ActualSectionReportPath."/$examcode/",0755);

		pdf_begin_document($pdf,$ActualSectionReportPath."/$examcode/$examcode.pdf","");
		
		$this->CreateFirstPageOfSectionReport($pdf,$ExamCodeInfo[$examcode]["subject"],$ExamCodeInfo,$examcode,$schoolname,$SubTopicWisePerfoArr,$reportingtopic_arr,$SectionOverallPerfo,$score_outof,$SectionMinMaxPerfo,$connid);

		pdf_begin_page($pdf, $this->page_width, $this->page_height);
		$this->pageno++;
		$this->addpagenumber($pdf,$this->pageno);
		$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"],"section"=>$ExamCodeInfo[$examcode]["section"]);
		createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
	    pdf_setfont($pdf,$this->font,$this->fontsize);

	    $ypos = $this->page_height - $this->top_margin;
	    
	    $macro1 = "<macro {H1 {fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$this->fontsize encoding=unicode}}><&H1>";
	    $scd_content = "Class Scorecard\n".
	    		   	   "<&Body>The performance of the students of your class for this test is as shown below.";
	    $nooflines_scd = ceil(pdf_stringwidth($pdf,$scd_content,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		
	    $textflow = pdf_create_textflow($pdf, $macro1.$scd_content, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=100%");
		do{
		  $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, $buffersize, $this->page_width - $this->right_margin, $ypos, "");
		} while (strcmp($textflowresult, "_stop"));
		$textflow_height = pdf_info_textflow($pdf,$textflow,"textheight");
		pdf_delete_textflow($pdf, $textflow);
    
		//$buffersize = ($nooflines_scd+1) * $this->fontsize;
		$buffersize = $textflow_height + $doublelinebreak;
		$yposbeforescorecardtbl = $ypos;
		
		$TotQuesCount = count($questionSeq[1]);
		$ypos_returned = $this->DrawSectionWiseStudentsScorecard($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$buffersize,$parameters,$schoolcode,$ExamCodeInfo,$connid);

		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];
		
		/*if($newpage ==1) {
			$yposbeforescorecardtbl = $this->page_height - $this->top_margin;
			$textflow = PDF_create_textflow($pdf, $macro1.$scd_content, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=100%");
			do {
			    $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, $buffersize, $this->page_width - $this->right_margin, $yposbeforescorecardtbl, "");
			} while (strcmp($textflowresult, "_stop"));
			PDF_delete_textflow($pdf, $textflow);
		}*/
		$ypos -= $singlelinebreak;
		
		pdf_setfont($pdf,$this->fontbold,8);
		pdf_fit_textline($pdf,"A - Absent / Did not attempt", 320, $ypos, "fontsize=8");

		$ypos -= $doublelinebreak;
		pdf_setfont($pdf,$this->font,$this->fontsize);
		
		$anskey_content = "Answer Key\n".
	    		          "<&Body>The table below gives the correct answer for each question in this test across all paper versions used in your class.";
	    $nooflines_anskey = ceil(pdf_stringwidth($pdf,$anskey_content,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
	    $buffersize = ($nooflines_anskey+1) * $this->fontsize;
	    
	    $needed_height = $ypos - $buffersize;
	    if($needed_height < 150){
	    	pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			$this->pageno++;
			$this->addpagenumber($pdf,$this->pageno);
			$this->LoadpdfFont($pdf,$this->fontname);

			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
			pdf_setfont($pdf,$this->font,$this->fontsize);

			$xpos = $this->left_margin;		   // Left margine
			$ypos = $this->page_height-$this->top_margin;// Top margine
	    }
	    
	    $textflow = PDF_create_textflow($pdf, $macro1.$anskey_content, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=120%");
		do {
		    $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, $buffersize, $this->page_width - $this->right_margin, $ypos, "");

		} while (strcmp($textflowresult, "_stop"));
		$textflow_height = pdf_info_textflow($pdf,$textflow,"textheight");
		PDF_delete_textflow($pdf, $textflow);
		
		###### Answer key for the test table code start here #####
		
		$yposbeforeanswerkeytbl = $ypos;
		//$ypos -= $singlelinebreak;
		$ypos -= $textflow_height;
		
		$ypos_returned = $this->DrawAnswerKeyTable($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$questionSeq,$buffersize,$parameters,$CorrectAnswerArr,$connid);
		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];
		if($newpage ==1){
			$yposbeforeanswerkeytbl = $this->page_height - $this->top_margin;
		}
		
		
		/*if($newpage ==1){
			$yposbeforeanswerkeytbl = $this->page_height - $this->top_margin;
		}else{
			pdf_setfont($pdf,$this->fontbold,$this->fontsize);
			pdf_show_xy($pdf,"Answer Key",$this->left_margin,$yposbeforeanswerkeytbl);
		}*/
		$ypos -= $doublelinebreak*2;
		/*$perfo_content = "Performance Summary\n".
	    		         "<&Body>The table below lists the answer provided by your students for each question. We have highlighted cases (in red) where an incorrect option has been selected by more than 50% of your students.".
	    		         "The concepts related to these questions are strong candidates for remediation within the class.";*/
		$perfo_content = "Performance Summary\n".
	    		         "<&Body>The table below lists the answer provided by your students for each question. We have highlighted correct answer option in green.";
	    	
	    $nooflines_perfo = ceil(pdf_stringwidth($pdf,$perfo_content,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
	    $buffersize = ($nooflines_perfo+1) * $this->fontsize;
	    
	    $needed_height = $ypos - $buffersize;
	    if($needed_height < 150){
	    	pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			$this->pageno++;
			$this->addpagenumber($pdf,$this->pageno);
			$this->LoadpdfFont($pdf,$this->fontname);

			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
			pdf_setfont($pdf,$this->font,$this->fontsize);

			$xpos = $this->left_margin;		   // Left margine
			$ypos = $this->page_height-$this->top_margin;// Top margine
	    }
	    
	    $textflow = PDF_create_textflow($pdf, $macro1.$perfo_content, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=120%");
		do {
		    $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, $buffersize, $this->page_width - $this->right_margin, $ypos, "");
		} while (strcmp($textflowresult, "_stop"));
		$textflow_height = pdf_info_textflow($pdf,$textflow,"textheight");
		PDF_delete_textflow($pdf, $textflow);
		
		# performance summary table start here
		$ypos -= $doublelinebreak;
	    $yposbeforequeperfotbl = $ypos;
	    $buffersize = $textflow_height;
	    $ypos_returned = $this->DrawQuestionPerfoTable($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$questionSeq,$buffersize,$parameters,$CorrectAnswerArr,$ExamCodeInfo,$connid);
		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];
		if($newpage ==1){
			$yposbeforequeperfotbl = $this->page_height - $this->top_margin;
		}

		//$ypos -= $singlelinebreak;
		/*
		pdf_setfont($pdf,$this->fontbold,8);
		//pdf_fit_textline($pdf,"Note: The question numbers are based on paper version 1.These performance numbers may vary up to 2% due to rounding off.", $this->left_margin, $ypos, "fontsize=8");
		 
		$macro ="<macro {Body {alignment=justify leading=120% fontname=$this->fontname fontsize=8 encoding=unicode}
						 Body_bold {alignment=justify leading=120% fontname=$this->fontnamebold fontsize=8 encoding=unicode}}>";
		$text1 = "<&Body_bold>Note:<&Body>The question numbers are based on paper version 1.These performance numbers may vary up to 2% due to rounding off.";
		$nooflines1 = ceil(pdf_stringwidth($pdf,$text1,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		$expected_height1 = ($nooflines1+2) * ($this->fontsize); // expected height should be multiply by fontsize by but depends on leading also 20% more that means its 2 size more than the actual font size
		$optlist = "font=$this->font fontsize=$this->fontsize leading=100%";
		$notetxt = pdf_create_textflow($pdf,$macro.$text1, $optlist);
		pdf_fit_textflow($pdf,$notetxt,$this->left_margin,$ypos,$this->page_width-$this->right_margin,$expected_height1,"");
		$textflow_height1 = pdf_info_textflow($pdf,$notetxt,"textheight");
		pdf_delete_textflow($pdf,$notetxt);
		$ypos -= $textflow_height1;
		*/
		$ypos -= $doublelinebreak;
		$yposbeforetbl = $ypos;
	    $macro1 = "<macro {H1 {fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$this->fontsize encoding=unicode}}><&H1>";
	    /*$content = "Key Ideas Assessed:\n\n".
	    		   "<&Body>The following sub topics were assessed in the test. The performance of the class by each sub topic and the class performance in each question".
	    		   " of the sub topic is also available in the table.";*/
	    $content = "Key Ideas Assessed\n".
	    		   "<&Body>The following areas were assessed in the test. The performance of your class in each area and the class performance in each question are displayed below.";
	    $nooflines = ceil(pdf_stringwidth($pdf,$content,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));

	    //$buffersize = $nooflines * 20; // In Textflow we need to take lineheight = 20
	    $buffersize = ($nooflines+3) * $this->fontsize; // In Textflow we need to take lineheight = 20

	    $ypos_returned = $this->drawSubtopicWiseStudentPerfoTable($pdf,$ypos,$request_id,$examcode,$reportingtopic_arr,$ReportingQuesArr,$questionSeq,$QuesWiseStudentPerfo,$buffersize);

	    $ypos = $ypos_returned[0];
	    $isNewPage=$ypos_returned[1];

	   	if($isNewPage==1){
	   		# As we are already doing in above table function so we don't have to again.
	   		#$this->pageno++;
	   		#$this->addpagenumber($pdf,$this->pageno);
	   		$yposbeforetbl = $this->page_height - $this->top_margin;
	   		$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"],"section"=>$ExamCodeInfo[$examcode]["section"]);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
			pdf_setfont($pdf,$this->font,$this->fontsize);
		}

   		$textflow = PDF_create_textflow($pdf, $macro1.$content, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=120%");
		do {
		    $textflowresult = PDF_fit_textflow($pdf, $textflow, $this->left_margin, $buffersize, $this->page_width - $this->right_margin, $yposbeforetbl, "");

		} while (strcmp($textflowresult, "_stop"));

		PDF_delete_textflow($pdf, $textflow);

		$ypos -= $oneandhalflinebreak;

		pdf_setfont($pdf,$this->font,8);
		pdf_show_xy($pdf,"Note: The question numbers are based on paper version 1",$this->left_margin,$ypos);
		
		pdf_setcolor($pdf,"stroke", "gray",0,0,0,0);
		pdf_setcolor($pdf,"fill","gray",0.60,0,0,0);
		
		pdf_rect($pdf,400,$ypos-1,8,8);
		pdf_closepath_fill_stroke($pdf);
		
		pdf_setcolor($pdf,"stroke","rgb",0,0,0,0);
		pdf_setcolor($pdf,"fill","rgb",0,0,0,0);
		
		pdf_fit_textline($pdf,"<=40% students answered correctly", 410, $ypos, "fontsize=8");

		$ypos -= $doublelinebreak*2;
		pdf_setfont($pdf,$this->font,$this->fontsize);
		####### Below portion is commented as per muntaquim instruction on 01-06-2011 ##############
		/*$yposbeforequetbl = $ypos;

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
			$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"]);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
		}

		pdf_setfont($pdf,$this->font,$this->fontsize);
		pdf_show_xy($pdf,"Most Difficult Questions :",$this->left_margin,$yposbeforequetbl);

		pdf_setfont($pdf,$this->font,$this->fontsize-1);
		pdf_show_xy($pdf,"Question Summary",$this->left_margin,$yposbeforequetbl - 15); */

		##################################### Commented portion is end #############################
		$ypos -= $singlelinebreak;
		$yposbeforemisconception = $ypos;
		$buffersize = 10;

		/*$misconceptioncontent ="This section lists the most common misconceptions in these sub topics and your class performance on those.".
							   " Wherever the performance is below 75%, it is recommended that you address these misconceptions in class using".
							   " the remedial measures provided as guidelines. The teacher sheet numbers relevant to a particular misconception".
							   " are also mentioned. It is recommended that you refer to the teacher sheet for further information on the misconception.";*/
		$misconceptioncontent = "<b>Misconceptions Identified</b><br/>This section lists misconceptions identified among your students based on this test. It is recommended that you address these misconceptions in class using the remedial measures provided.";

		$ypos_returned = autoPublishPaper($pdf,$misconceptioncontent,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];
		if($newpage == 1){

			$this->pageno++;
			$this->addpagenumber($pdf,$this->pageno);
			$yposbeforemisconception = $this->page_width - $this->top_margin;
   			$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"],"section"=>$ExamCodeInfo[$examcode]["section"]);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
			pdf_setfont($pdf,$this->font,$this->fontsize);

		}
		/*pdf_setfont($pdf,$this->fontbold,$this->fontsize);
		pdf_show_xy($pdf,"Misconceptions Identified",$this->left_margin,$yposbeforemisconception);
		$ypos -= $singlelinebreak;*/

		##################
		$ypos -= $singlelinebreak;
		$i =0;
		if(is_array($MisconceptonQuestions[$examcode]) && count($MisconceptonQuestions[$examcode])){
		$misconception_qcode_list = "";
		foreach($MisconceptonQuestions[$examcode] as $qcode => $answers){
				$misconception_qcode_list .= $qcode.","; // To update the da_examDetails - miscon_qcode_list field - 04-08-2011
				$OptionWiseStudentPerfo = $this->getOptionWisePerfo($SectionWiseStudents,$questionSeq,$qcode,$connid);
				
				if(array_key_exists($qcode,$QueFromVersionTable)){

					$QueTblName = "da_questions_versions";
					$Condition = " AND da_questions_versions.version = '".$QueFromVersionTable[$qcode]."'";
				
				}else{
				
					$QueTblName = "da_questions";
					$Condition = "";
				}
				
				$i++;
				$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,remedial_instruction,mcexplanation,mc_ques_title,ts_file,group_id,
						 		 $QueTblName.passage_id,qms_passage.passage_name
						  FROM $QueTblName
						  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
						  WHERE qcode = '".$qcode."' AND misconception = 1 $Condition";
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
				$concept = str_replace("<P>","",$concept);
			   	$concept = str_replace("</P>","",$concept);
			   	$concept = str_replace("<p>","",$concept);
			   	$concept = str_replace("</p>","",$concept);
			   	$concept = $this->common_pdf_junk_replace($concept);
			    $nooflines = ceil(pdf_stringwidth($pdf,"Misconception: $concept",$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));

			    $buffersize = ($nooflines * ($this->fontsize)) + $singlelinebreak + $passagenamebuffer;

				$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
				$qcodestr = $this->common_pdf_junk_replace($qcodestr);

			   	$yposbeforequestion = $ypos;
				# commented as per discussion with manish & muntaquim as images comes from only 1
			   	/*if($result["group_id"] != 0)
					$imagepathfrom = 2;
				else*/

				$imagepathfrom = $this->imagepathfrom;

				// naveen question stem =1 
			   //	$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
				$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,1,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);


			   	$isNewPage=$ypos_returned[1];
			   	$yposafterque = $ypos_returned[0];
           		if($isNewPage==1){
           			$this->pageno++;
					$this->addpagenumber($pdf,$this->pageno);
           			$yposbeforequestion = $this->page_height-$this->top_margin;
           			$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"]);
					createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
					pdf_setfont($pdf,$this->font,$this->fontsize);
           		}

           		$queno = $questionSeq[1][$qcode] + 1;
           		# Imlemented question no printing as per paper
           		$yposforQ = $yposbeforequestion - $buffersize + 7;

           	   	pdf_setfont($pdf, $this->fontbold, $this->fontsize);
			   	pdf_show_xy($pdf,"Q",$this->left_margin-13,$yposforQ-5);
			   	pdf_setrgbcolor($pdf, 0, 0, 0);

			   	pdf_setlinewidth($pdf,0.5);
		 	   	pdf_moveto($pdf,$this->left_margin-15,$yposforQ-$oneandhalflinebreak+6);
			   	pdf_lineto($pdf,$this->left_margin-3,$yposforQ-$oneandhalflinebreak+6);
		 	   	pdf_stroke($pdf);

		 	   	if($queno>9) $qno_position=14; else $qno_position=12;
		 	   	pdf_setfont($pdf, $this->fontbold, 8);
			   	pdf_show_xy($pdf,$queno,$this->left_margin-$qno_position,$yposforQ-17);

			   	pdf_setlinewidth($pdf,0.5);
 	   			pdf_moveto($pdf,$this->left_margin-15,$yposforQ-19);
	   			pdf_lineto($pdf,$this->left_margin-3,$yposforQ-19);
 	   			pdf_stroke($pdf);
			   	//pdf_show_xy($pdf,"Q ".$queno.": ",$this->left_margin,$yposbeforequestion - $buffersize + 1.5); // 1.5 is added cause in new autopublish paper funciton question print slightly up

			   	################ Question End #################

			   	pdf_setlinewidth($pdf,0.1);
				pdf_moveto($pdf,$this->left_margin,$yposbeforequestion+($singlelinebreak));
				pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforequestion+$singlelinebreak);
			    pdf_stroke($pdf);
			   	
			   	$buffersize = 0;

			   	$ypos_returned = autoPublishPaper($pdf,"<b>Concept:</b> ".$concept,$this->left_margin,$yposbeforequestion,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

			    $newpage = $ypos_returned[1];
			    $yposafterconcept = $ypos_returned[0];

			    pdf_setlinewidth($pdf,0.1);
				pdf_moveto($pdf,$this->left_margin,$yposafterconcept+($singlelinebreak));
				pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposafterconcept+($singlelinebreak));
			    pdf_stroke($pdf);

			    # line above question no
			    pdf_moveto($pdf,$this->left_margin-15,$yposafterconcept+$singlelinebreak);
				pdf_lineto($pdf,$this->left_margin-3, $yposafterconcept+$singlelinebreak);
			    pdf_stroke($pdf);

			    if($passagename != ""){
					$buffersize = 0;
			    	$yposreturned_after_passagename = autoPublishPaper($pdf,"Passage: ".$this->common_pdf_junk_replace($passagename),$this->left_margin,$yposafterconcept,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
			    	$newpageafterpassage = $yposreturned_after_passagename[1];
			    	$yposafterpassage = $yposreturned_after_passagename[0];
				}
			    
			    /*if($passagename != "")
			    {
				    $textflow = PDF_create_textflow($pdf, "Passage: ".$passagename, "fontname=$this->fontname fontsize=$this->fontsize encoding=winansi leading=100%");
					do {
					    $passageres = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $yposafterconcept,"");
					} while (strcmp($passageres, "_stop"));
					PDF_delete_textflow($pdf, $textflow);
			    }*/

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

			   	if($ypos < $this->bottom_margin + 30){

			   		pdf_end_page($pdf);
					pdf_begin_page($pdf,$this->page_width,$this->page_height);
					$this->pageno++;
					$this->addpagenumber($pdf,$this->pageno);

					$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"],"section"=>$ExamCodeInfo[$examcode]["section"]);
					createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");

					$this->LoadpdfFont($pdf,$this->fontname);

					pdf_setfont($pdf, $this->font, $this->fontsize);

					$xpos = $this->left_margin;
					$ypos = $this->page_height-$this->top_margin;
			   	}

			 	$tbl=0;
				$col = 1;
				$row = 1;

				$llx= 350; // TABLE WIDTH
				$lly= 20; // TABLE HEIGHT

				$urx= $this->left_margin;   //POSITION OF X
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
			        $tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, round($performance)."%", $optlist);
			        if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    		$col++;
		        }

				/* Place the table instance */
				$optlist = "header=1 fill={{area=rowodd fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}} ";
				$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
				$tblheight = pdf_info_table($pdf,$tbl,"height");
				pdf_delete_table($pdf,$tbl,"");
				################ option wise student answer table ends ###############
			   	$ypos -= $tblheight;
			   	$ypos -= $singlelinebreak*2;

			   	$yposbeforemcexplanation = $ypos;
				$buffersize = 0;
				$mcexplanation = $this->common_pdf_junk_replace($mcexplanation);
			    $ypos_mcexplanation = autoPublishPaper($pdf,$mcexplanation,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

			    $ypos = $ypos_mcexplanation[0];
			   	$isNewPage=$ypos_mcexplanation[1];
				
			   	if($isNewPage==1){
           			$this->pageno++;
           			$this->addpagenumber($pdf,$this->pageno);
			   		$yposbeforemcexplanation = $this->page_height-$this->top_margin;
           			$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"],"section"=>$ExamCodeInfo[$examcode]["section"]);
					createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
					pdf_setfont($pdf,$this->font,$this->fontsize);
           		}

			   	$remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
			   	// if no remedial instruction are there than we don't have to show this section
			   	if($remedial_measure != ""){

			   		$ypos -= $singlelinebreak;
			   		$yposbeforeremedial = $ypos;
				   	$buffersize = 10;
				    
				   	//$nooflines_rm = ceil(pdf_stringwidth($pdf,$remedial_measure,$this->font,9)/($this->page_width-$this->left_margin-$this->right_margin));
				    $remedial_measure = $this->common_pdf_junk_replace($remedial_measure);
				    $remedial_measure ="<hr>123</hr><br><b>Remedial Measure</b><hr>123</hr><br><br>".$remedial_measure;
				    
				    #$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"],"section"=>$studentinfo["section"],"paperversion"=>$studentinfo["paperversion"],"pageno"=>$this->pageno,"report"=>"CLASS");
				    $parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"],"section"=>$ExamCodeInfo[$examcode]["section"],"pageno"=>$this->pageno,"report"=>"CLASS");
				    //$ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
				    
				    $ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages,$arrangeoptions=1,$istextpassage="Y",$optionLetters=array(),$medium="",$parameters);
				    $ypos -= $buffersize;

				    $ypos = $ypos_returned[0];
				   	$isNewPage=$ypos_returned[1];
					
				   	if($isNewPage==1){
	           			$this->pageno = $ypos_returned[2];
				   		//$this->pageno++;
	           			//$this->addpagenumber($pdf,$this->pageno);
	           			$yposbeforeremedial = $this->page_height-$this->top_margin;
	           			$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"],"section"=>$ExamCodeInfo[$examcode]["section"]);
						//createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
						pdf_setfont($pdf,$this->font,$this->fontsize);
	           		}

				   /* pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
				    pdf_stroke($pdf);
  
				    $yposbeforeremedial -= 10;
					pdf_setfont($pdf,$this->fontbold,$this->fontsize);
				    pdf_show_xy($pdf,"Remedial Measure",$this->left_margin,$yposbeforeremedial);
				    pdf_setfont($pdf,$this->font,$this->fontsize);

				    $yposbeforeremedial -= 5;

				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
				    pdf_stroke($pdf);*/
			   	}

			    if(!is_null($teacher_sheet_code) && $teacher_sheet_code != ""){
			    	$ypos -= $singlelinebreak;
			    	pdf_setfont($pdf,$this->font,$this->fontsize);
			    	pdf_show_xy($pdf,"You can also refer to the teacher sheet mentioned.",$this->left_margin,$ypos);
			    	$ypos -= $doublelinebreak;
			    	pdf_show_xy($pdf,"Teacher Sheet(s):<".$teacher_sheet_code.">",$this->left_margin,$ypos);
			    	$ypos -= 5;
			   		pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$ypos);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
				    pdf_stroke($pdf);
			    }

			    $ypos -= $doublelinebreak;

				if($i == constant("MAX_MISCON_QUE_TO_DISP")) break;
			}
			# Updating the misconception qcode list for exam code -- as we have moved this code with other fields updation at the end of this function
			/*if($misconception_qcode_list != ""){
				$up_query = "UPDATE da_examDetails SET miscon_qcode_list = '".rtrim($misconception_qcode_list,",")."' WHERE exam_code = '".$examcode."'";
				$up_dbqry = new dbquery($up_query,$connid);
			}*/

		}else{

			pdf_setfont($pdf,$this->font,$this->fontsize);
			pdf_show_xy($pdf,"No key misconceptions identified!",$this->left_margin,$ypos);
			$ypos -= $doublelinebreak;
		}
		$ypos -= $singlelinebreak;

		/*$TotQuesCount = count($questionSeq[1]);
		$buffersize = 10;
		$yposbeforescorecardtbl = $ypos;

		$ypos_returned = $this->DrawSectionWiseStudentsScorecard($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$buffersize,$parameters,$schoolcode,$ExamCodeInfo,$connid);

		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];

		if($newpage ==1){
			$yposbeforescorecardtbl = $this->page_height - $this->top_margin;
			//$parameters = array("exam_code"=>$examcode,"test_name"=>$ExamCodeInfo[$examcode]["testname"],"class"=>$ExamCodeInfo[$examcode]["class"],"subject"=>$ExamCodeInfo[$examcode]["subject"],"test_date"=>$ExamCodeInfo[$examcode]["testdate"]);
			//createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
		}else{
			pdf_setfont($pdf,$this->fontbold,$this->fontsize);
			pdf_show_xy($pdf,"Class Scorecard",$this->left_margin,$yposbeforescorecardtbl);
		}

		###### Answer key for the test table code start here #####
		$ypos -= $singlelinebreak*3;
		$buffersize = 10;
		$yposbeforeanswerkeytbl = $ypos;

		$ypos_returned = $this->DrawAnswerKeyTable($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$questionSeq,$buffersize,$parameters,$CorrectAnswerArr,$connid);

		$ypos = $ypos_returned[0];
		$newpage = $ypos_returned[1];

		if($newpage ==1){
			$yposbeforeanswerkeytbl = $this->page_height - $this->top_margin;
		}else{
			pdf_setfont($pdf,$this->fontbold,$this->fontsize-1);
			pdf_show_xy($pdf,"Answer Key",$this->left_margin,$yposbeforeanswerkeytbl);
		}*/
		#########################################################
		/* Draw a circle at position (x, y) with a radius of 40 */
		/*$xt=20; $x = 210; $y=770; $dy=90;
	    pdf_circle($pdf,$x,$dy,2);
	    pdf_closepath_fill_stroke($pdf);	*/
	    //pdf_fit_textline($pdf,"circle() and stroke()", $xt, $y, "fillcolor={gray 0}");

		pdf_end_page($pdf);
		pdf_end_document($pdf,"");
		
		# Move to bucket
		$source_path = $ActualSectionReportPath."/".$examcode."/".$examcode.".pdf";
		$dest_path = "PDF/".$schoolcode."/".$request_id."/reports/".$examcode."/".$examcode.".pdf";
		//$this->MoveToBucket($source_path,$dest_path);
		$request_type = $this->getRequestType($request_id,$connid);
		if(constant("SERVER_TYPE") == "Live"){
			$S3Res = $this->MoveToBucket($source_path,$dest_path);
			if($S3Res==1){
				@unlink($source_path);
			}
		}
		#### Mailing condition checking and mailing ####

		$bgperfo = "";
		$bgmiscon = "";
		$bgstudent = "";
		$bgquestions = "";

		$colorperfo = "#000000";
		$colormiscon = "#000000";
		$colorstudent = "#000000";
		$colorquestion = "#000000";

		$lowperfo_questions = "";
		$lowperfo_qnos = "";

		foreach($QuesWiseStudentPerfo[$examcode] as $qcode => $qperfo){

			if($qperfo < constant("LOWPERFOPER_QUESTION_FORMAIL")){
				$queSeq = $questionSeq[1][$qcode]+1;
				$lowperfo_questions .= $qcode.", ";
				$lowperfo_qnos .= $queSeq.", ";
			}
		}

		# updating the fields
		$upquery = "UPDATE da_examDetails SET class_avg = '".$ExamCodeInfo[$examcode]["performance"]."', lowperform_studrollnos = '".rtrim(preg_replace('/\s+/', '', $this->lowperfo_studentids),",")."', lowperform_qcode_list = '".rtrim(preg_replace('/\s+/', '', $lowperfo_questions),",")."', miscon_qcode_list = '".rtrim($misconception_qcode_list,",")."' WHERE exam_code = '".$examcode."'";
		$dbupqry = new dbquery($upquery,$connid);

		if($ExamCodeInfo[$examcode]["performance"] < constant("LOWPERFOPER_SECTION_FORMAIL") || $this->lowperfo_studentids != "" || $lowperfo_questions != "" || (count($MisconceptonQuestions[$examcode]) < constant("MISCONQUECOUNT_FORMAIL") && $ExamCodeInfo[$examcode]["performance"] < 50)){
		
			# instead of sending mail now we are storing in table dt:16-02-2012
			$exp_query = "INSERT INTO da_exceptionReports 
						  (schoolCode,request_id,subejectno,class,section,exam_code,testName,class_avg,
						   lowperform_studrollnos,lowperform_qcodes,lowperform_qnos,miscon_qcode_list,created_dt) VALUES 
						  ('".$schoolcode."','".$request_id."','".$ExamCodeInfo[$examcode]["subject"]."','".$ExamCodeInfo[$examcode]["class"]."',
						 	'".$ExamCodeInfo[$examcode]["section"]."','".$examcode."','".addslashes($ExamCodeInfo[$examcode]["testname"])."','".$ExamCodeInfo[$examcode]["performance"]."',
						 	'".rtrim(preg_replace('/\s+/', '', $this->lowperfo_studentids),",")."','".rtrim(preg_replace('/\s+/', '', $lowperfo_questions),",")."','".rtrim(trim($lowperfo_qnos),",")."',
						 	'".rtrim($misconception_qcode_list,",")."',NOW())";
			$exp_dbqry = new dbquery($exp_query,$connid);

			/*# Commented - 30-01-2012
			$email_qry = "SELECT email FROM marketing WHERE name = '".$ExamCodeInfo[$examcode]["alloted_to"]."'";
			$email_dbqry = new dbquery($email_qry,$connid);
			$email_res = $email_dbqry->getrowarray();
			$toemail = $email_res["email"];

			if($ExamCodeInfo[$examcode]["performance"] < constant("LOWPERFOPER_SECTION_FORMAIL")){
				$bgperfo = "style=\"background-color:#E41B17\"";
				$colorperfo = "#FFFFFF";
			}
			if(count($MisconceptonQuestions[$examcode]) < constant("MISCONQUECOUNT_FORMAIL")){
				$bgmiscon = "style=\"background-color:#E41B17\"";
				$colormiscon = "#FFFFFF";
			}
			if($this->lowperfo_studentids != ""){
				$bgstudent = "style=\"background-color:#E41B17\"";
				$colorstudent = "#FFFFFF";
			}

			if($lowperfo_questions != ""){
				$bgquestions = "style=\"background-color:#E41B17\"";
				$colorquestion = "#FFFFFF";
			}

			########## mailing task end #############
			$content = "<style>
			                BODY {
			                  font-family: verdana;
			                  font-size: 11;
			                }
			                TD {
			                  font-family: verdana;
			                  font-size: 12;
			                }
			            </style>
			            <br/>
						<table border=\"1\" cellpadding=\"5\" cellspacing=\"5\" width=\"75%\" style=\"border-collapse:collapse;border-color:#000000\">
						<tr style=\"background-color:#BC8F8F\">
							<th colspan=\"3\" >DA - Exception Report</th>
						</tr>
						<tr>
							<td colspan=\"3\"><b>School:</b> ".ucfirst(strtolower($schoolname))." (".$schoolcode.")</td>
						</tr>
						<tr>
							<td><b>Subject:</b> ".$this->subject_arr[$ExamCodeInfo[$examcode]["subject"]]."</td>
							<td><b>Class:</b> ".$ExamCodeInfo[$examcode]["class"]."</td>
							<td><b>Section:</b> ".$ExamCodeInfo[$examcode]["section"]."</td>
						</tr>
						<tr>
							<td colspan=\"3\"><b>Test Name: </b>".$ExamCodeInfo[$examcode]["testname"]."</td>
						</tr>
						<tr>
							<td><b>Exam Code: </b>".$examcode."</td><td colspan=\"2\"><b>Request ID: </b>".$request_id."</td>
						</tr>
						<tr>
							<td width=\"40%\"><b>Class Average: </b></td><td colspan=\"2\" $bgperfo><font color=\"".$colorperfo."\">".$ExamCodeInfo[$examcode]["performance"]."%</font></td>
						</tr>
						<tr>
							<td><b>Student Roll Nos whose performance in the test is < 10%: </b></td><td colspan=\"2\" $bgstudent><font color=\"".$colorstudent."\">".rtrim($this->lowperfo_studentids,",")."</font></td>
						</tr>
						<tr>
							<td rowspan=\"2\"><b>Ques with performance < 20%: </b></td><td colspan=\"2\" $bgquestions><font color=\"".$colorquestion."\">Qcodes: ".rtrim(trim($lowperfo_questions),",")."</font></td>
						</tr>
						<tr>
							<td colspan=\"2\" $bgquestions><font color=\"".$colorquestion."\">Que Nos: ".rtrim(trim($lowperfo_qnos),",")."</font></td>
						</tr>
						<tr>
							<td><b>Misconception questions:</b></td><td colspan=\"2\" $bgmiscon><font color=\"".$colormiscon."\">".rtrim($misconception_qcode_list,",")."</font></td>
						</tr>
						</table><br/><b>Notes:</b> Information's in red colored cells needs to verify. Que nos are based on paper version 1 only.<br/>";

			$this->SendEmail($ExamCodeInfo[$examcode]["subject"],$schoolcode,$examcode,$toemail,$content);
			*/
		}
	}

	function DrawSectionWiseStudentsScorecard($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$buffersize,$parameters,$schoolcode,$ExamCodeInfo,$connid){

		$tbl=0;
		$fontsize = $this->fontsize-2;
		$margin = 4;
		$firstypos = $ypos;
		$llx= 450; // TABLE WIDTH
		$lly= 50; // TABLE HEIGHT
		$urx= 145;
		//$urx= $this->left_margin;   //POSITION OF X
		
		$return_arr = array();
		$for = 0;

		/*$query = "SELECT distinct da_studentMaster.studentID,da_response.total,da_studentMaster.rollNo,da_studentMaster.studentName,
				  da_response.studentName as ResponseStudentName
				  FROM da_response
		          LEFT JOIN da_studentMaster ON da_response.studentID = da_studentMaster.studentID
		          WHERE da_response.examcode = '".$examcode."'
				  AND da_studentMaster.enabled = 1
		          ORDER BY da_studentMaster.rollNo,da_studentMaster.studentID ";*/
		/*$query = "SELECT distinct da_studentMaster.studentID,da_response.total,da_studAcadDetails.rollNo,da_studentMaster.studentName,
       			  da_response.studentName as ResponseStudentName 
				  FROM da_response
				  LEFT JOIN da_studentMaster ON da_response.studentID = da_studentMaster.studentID
				  LEFT JOIN da_studAcadDetails ON da_studentMaster.studentID = da_studAcadDetails.studentID
				  WHERE da_response.examcode = '".$examcode."'
				  AND da_studentMaster.enabled = 1
				  AND da_studAcadDetails.status = 1
				  AND da_studAcadDetails.year = '".$ExamCodeInfo[$examcode]["year"]."'
				  ORDER BY da_studAcadDetails.rollNo,da_studentMaster.studentID";*/
		
		$query = "SELECT distinct da_studentMaster.studentID,da_studAcadDetails.rollNo,da_studentMaster.studentName,da_response.total
				  FROM da_studAcadDetails
				  LEFT JOIN da_studentMaster ON da_studAcadDetails.studentID = da_studentMaster.studentID
				  LEFT JOIN da_response ON da_studentMaster.studentID = da_response.studentID AND da_response.examcode = '".$examcode."'
				  WHERE da_studAcadDetails.class = ".$ExamCodeInfo[$examcode]["class"]."
				  AND da_studAcadDetails.section = '".$ExamCodeInfo[$examcode]["section"]."'
				  AND da_studentMaster.schoolCode = '".$ExamCodeInfo[$examcode]["schoolcode"]."'
				  AND da_studAcadDetails.year = '".$ExamCodeInfo[$examcode]["year"]."'
				  AND da_studAcadDetails.status = 1
				  AND da_studentMaster.enabled = 1
				  ORDER BY da_studAcadDetails.rollNo";

		$dbqry = new dbquery($query,$connid);
		$totalrows = $dbqry->numrows();

		$expected_tbl_height = ($totalrows+1) * ($this->fontsize + $margin); # 1 for header
		$needed_height = $ypos - $expected_tbl_height - $buffersize;
		
		# Previous logic commented as some time table goes beyond the single page dt:01-07-2011
		/*if($needed_height < 50){

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
		}*/

		############### table started ##############
		# Table header
		$tblrow = 1;

		$optlist = "colwidth=15% rowheight=10 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 1, $tblrow,"Roll No.", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}


		$optlist = "colwidth=55% rowheight=10 fittextline={position={top left} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 2, $tblrow, "Student Name", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

	    $optlist = "colwidth=15% rowheight=10 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 3, $tblrow,"Score (out of ".$TotQuesCount.")", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
	    
	    $optlist = "colwidth=15% rowheight=10 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        if($score_outof != 100)
	    	$tbl = PDF_add_table_cell($pdf, $tbl, 4, $tblrow,"Score (Out of $score_outof)", $optlist);
	    else 
	    	$tbl = PDF_add_table_cell($pdf, $tbl, 4, $tblrow,"% Score", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		#########

		$tblrow++;

		while($row = $dbqry->getrowarray()){

			# commented as we don't display the name passed in tab response Mantis BT:477
			/*if($row["ResponseStudentName"] != "")
				$studentname = $row["ResponseStudentName"];
			else 
				$studentname = $row["studentName"];*/
			$studentname = $this->GetOperatedString($row["studentName"]);
			
	    	if($row["total"] != ""){
		    	
	    		$rowscore = $row["total"];
		    	$matchbox = "";
	    		if($score_outof > 0 && $score_outof < 100)
		    		$studentScore = number_format(round(($row["total"]/$TotQuesCount)*$score_outof,1),1);
		    	else {
		    		# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
		    		//$schoolcode == 2528032 || 
		    		if($schoolcode == 24668){
		    			$studentScore = $this->ConvertPerfoIntoGrade(round(($row["total"]/$TotQuesCount)*100,2));
		    		}else {
		    			$studentScore = round(($row["total"]/$TotQuesCount)*100)."%";
		    		}
		    	}
	    	}else {
	    		$studentScore = "A";
	    		$rowscore = "A";
	    		$matchbox = " matchbox={fillcolor={rgb 0.9 0.9 0.9}}";
	    	}
			if(round(($row["total"]/$TotQuesCount)*100,2) < constant("LOWPERFOPER_STUDENT_FORMAIL"))
				$this->lowperfo_studentids .= $row['rollNo'].",";

			$tblcol = 1;
			$optlist = "colwidth=15% rowheight=10 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchbox margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $row['rollNo'], $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		    $tblcol = 2;
			$optlist = "colwidth=55% rowheight=10 fittextline={position={left center} font=" . $this->font . " fontsize=$fontsize} $matchbox margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $this->common_pdf_junk_replace($studentname), $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		    $tblcol = 3;
			$optlist = "colwidth=15% rowheight=10 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchbox margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $rowscore, $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $tblcol = 4;
			$optlist = "colwidth=15% rowheight=10 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchbox margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $studentScore, $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		    $tblrow++;
		}
		
		if($needed_height < 65){

				if($firstypos < 245) {

					do{
						pdf_end_page($pdf);
						pdf_begin_page($pdf,$this->page_width,$this->page_height);
						$this->pageno++;
						$this->addpagenumber($pdf,$this->pageno);
						$this->LoadpdfFont($pdf,$this->fontname);

						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
		    			pdf_setfont($pdf,$this->font,$this->fontsize);

						$xpos = $this->left_margin;		   // Left margine
						$ypos = $this->page_height-$this->top_margin;  // Top margine

						if($totalrows > 0)
							$optlist = "header=1 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}}";
						else 	
							$optlist = "stroke={{line=other linewidth=0.1}}";
							
						$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);

						#pdf_setfont($pdf,$this->fontbold,$this->fontsize);
						#pdf_show_xy($pdf,"Class Scorecard",$this->left_margin,$this->page_height - $this->top_margin);

					}while($tblresult == "_boxfull");
				}
				else {
					$i = 0;
					do{
						if($i == 0)
							$yposforcontent = $firstypos - $buffersize;
						else
							$yposforcontent = $this->page_height - $this->top_margin;

						if($totalrows > 0)
							$optlist = "header=1 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}}";
						else 	
							$optlist = "stroke={{line=other linewidth=0.1}}";
							
						$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $yposforcontent, $optlist);

						/*pdf_setfont($pdf,$this->fontbold,$this->fontsize);
						pdf_show_xy($pdf,"Class Scorecard",$this->left_margin,$yposforcontent);*/

						if ($tblresult != "_stop") {

							pdf_end_page($pdf);
							pdf_begin_page($pdf,$this->page_width,$this->page_height);
							$this->pageno++;
							$this->addpagenumber($pdf,$this->pageno);

							$i++;
							$this->LoadpdfFont($pdf,$this->fontname);
							pdf_setfont($pdf, $this->font, $fontsize);

							createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
			    			pdf_setfont($pdf,$this->font,$this->fontsize);

							$xpos = $this->left_margin;		   // Left margine
							$ypos = $this->page_height-$this->top_margin;
						}
					}while($tblresult == "_boxfull");
				}
				if($newpageflag==0)
					$newpageflag=1;
		}else{

			$ypos = $ypos - $buffersize;
			$optlist = "header=1 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}} ";
			$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);
		}

		$tblheight = pdf_info_table($pdf,$tbl,'height');
		pdf_delete_table($pdf,$tbl,"");
		$return_arr[0] = $ypos - $tblheight;
		$return_arr[1] = $newpageflag;
		return $return_arr;
	}

	function DrawAnswerKeyTable($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$questionSeq,$buffersize,$parameters,$CorrectAnswerArr,$connid){

		$tbl=0;
		$fontsize = $this->fontsize-1;
		$margin = 2;
		$firstypos = $ypos;
		$llx= 430; // TABLE WIDTH
		$lly= 50; // TABLE HEIGHT
		$urx = 160;
		//$urx= $this->left_margin;   //POSITION OF X

		$return_arr = array();
		$version2Qcodes = array();
		$version3Qcodes = array();
		$version4Qcodes = array();
		
		$for = 0;

		# Gathering the Answers of paperversion 1 questions
		$qcode_str = "";
		foreach($questionSeq[1] as $qcode => $seq){
			$qcode_str .= $qcode.",";
		}
		
		# taking questions of other versions
		$version2Qcodes = array_keys($questionSeq[2]);
		$version3Qcodes = array_keys($questionSeq[3]);
		$version4Qcodes = array_keys($questionSeq[4]);
		
		# previous process for collecting correct answer array but now we are passing correct answer array in function
		/*$query = "SELECT qcode,correct_answer FROM da_questions
				  WHERE qcode IN(".rtrim($qcode_str,",").")";
		$dbqry = new dbquery($query,$connid);
		while($result = $dbqry->getrowarray()){
			$QueAnsArr[$result["qcode"]] = $result["correct_answer"];
		}*/

		#$expected_tbl_height = ($TotQuesCount+1) * ($fontsize + $margin); # 1 for header
		$expected_tbl_height = ($TotQuesCount+1) * 15; # Commented above line : as multiply by rawheight
		$needed_height = $ypos - $expected_tbl_height - $buffersize;

		############### table started ##############
		# Table header
		$tblrow = 1;

		$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin rowspan=2";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 1, $tblrow,"Q. No.", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		$optlist = "colwidth=80% rowheight=12 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin colspan=4";
        $tbl = PDF_add_table_cell($pdf, $tbl, 2, $tblrow, "Correct Answer", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
	    
		#########
		$tblrow++;
		
		$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 2, $tblrow,"Version 1", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 3, $tblrow, "Version 2", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
	    
	    $optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 4, $tblrow,"Version 3", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 5, $tblrow, "Version 4", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		
		$tblrow++;

		foreach($questionSeq[1] as $qcode => $seq){

			$orgseq = $seq;
			$seq = $seq + 1;
			$tblcol = 1;
			$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $seq, $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		    $tblcol = 2;
			$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $this->ansseqarr[$CorrectAnswerArr[$qcode]], $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $tblcol = 3;
			$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $this->ansseqarr[$CorrectAnswerArr[$version2Qcodes[$orgseq]]], $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $tblcol = 4;
			$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $this->ansseqarr[$CorrectAnswerArr[$version3Qcodes[$orgseq]]], $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $tblcol = 5;
			$optlist = "colwidth=20% rowheight=12 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $this->ansseqarr[$CorrectAnswerArr[$version4Qcodes[$orgseq]]], $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		    $tblrow++;
		}

		if($needed_height < 65){

				if($firstypos < 245) {

					do{
						pdf_end_page($pdf);
						pdf_begin_page($pdf,$this->page_width,$this->page_height);
						$this->pageno++;
						$this->addpagenumber($pdf,$this->pageno);
						$this->LoadpdfFont($pdf,$this->fontname);

						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
		    			pdf_setfont($pdf,$this->font,$this->fontsize);

						$xpos = $this->left_margin;		   // Left margine
						//$ypos = $this->page_height-$this->top_margin-$buffersize;  // Top margine
						$ypos = $this->page_height-$this->top_margin;  // Top margine
						$optlist = "header=2 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}} ";
						$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);

						//pdf_setfont($pdf,$this->fontbold,$this->fontsize);
						//pdf_show_xy($pdf,"Answer Key",$this->left_margin,$this->page_height - $this->top_margin);

					}while($tblresult == "_boxfull");
				}
				else {
					$i = 0;
					do{
						if($i == 0)
							$yposforcontent = $firstypos + $buffersize;
						else
							$yposforcontent = $this->page_height - $this->top_margin;

						$optlist = "header=2 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}} ";
						$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);

						//pdf_setfont($pdf,$this->fontbold,$this->fontsize);
						//pdf_show_xy($pdf,"Answer Key",$this->left_margin,$yposforcontent);

						if ($tblresult != "_stop") {

							pdf_end_page($pdf);
							pdf_begin_page($pdf,$this->page_width,$this->page_height);
							$this->pageno++;
							$this->addpagenumber($pdf,$this->pageno);
							
							$i++;
							$this->LoadpdfFont($pdf,$this->fontname);
							pdf_setfont($pdf, $this->font, $fontsize);

							createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
			    			pdf_setfont($pdf,$this->font,$this->fontsize);

							$xpos = $this->left_margin;		   // Left margine
							//$ypos = $this->page_height-$this->top_margin-$buffersize;
							$ypos = $this->page_height-$this->top_margin;
						}
						$i++;
					}while($tblresult == "_boxfull");
				}
				if($newpageflag==0)
					$newpageflag=1;
		}else{

			$ypos = $ypos - $buffersize;
			$optlist = "header=2 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}} ";
			$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);
		}
		$tblheight = pdf_info_table($pdf,$tbl,'height');
		pdf_delete_table($pdf,$tbl,"");
		$return_arr[0] = $ypos - $tblheight;
		$return_arr[1] = $newpageflag;
		return $return_arr;

	}
	
	function DrawQuestionPerfoTable($pdf,$ypos,$request_id,$examcode,$score_outof,$TotQuesCount,$questionSeq,$buffersize,$parameters,$CorrectAnswerArr,$ExamCodeInfo,$connid){
		
		$tbl=0;
		$fontsize = $this->fontsize-1;
		$margin = 2;
		$firstypos = $ypos;
		$llx= 450; // TABLE WIDTH
		$lly= 50; // TABLE HEIGHT
		$urx = 145;
		//$urx= $this->left_margin;   //POSITION OF X

		$return_arr = array();
		$version2Qcodes = array();
		$version3Qcodes = array();
		$version4Qcodes = array();
		
		$for = 0;

		# Gathering the Answers of paperversion 1 questions
		$qcode_str = "";
		foreach($questionSeq[1] as $qcode => $seq){
			$qcode_str .= $qcode.",";
		}
			
		# taking questions of other versions
		$version1Qcodes = array_keys($questionSeq[1]);
		$version2Qcodes = array_keys($questionSeq[2]);
		$version3Qcodes = array_keys($questionSeq[3]);
		$version4Qcodes = array_keys($questionSeq[4]);

		#$expected_tbl_height = ($TotQuesCount+1) * ($fontsize + $margin); # 1 for header
		$expected_tbl_height = ($TotQuesCount+1) * 15; # Commented above line : as multiply by rawheight
		$needed_height = $ypos - $expected_tbl_height - $buffersize;

		############### table started ##############
		# Table header
		$tblrow = 1;

		$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 1, $tblrow,"Q. No.", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 2, $tblrow,"Option 1", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 3, $tblrow, "Option 2", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
	    
	    $optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
	    $tbl = PDF_add_table_cell($pdf, $tbl, 4, $tblrow,"Option 3", $optlist);
		if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 5, $tblrow, "Option 4", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		
	    $optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->fontbold . " fontsize=$fontsize} margin=$margin";
        $tbl = PDF_add_table_cell($pdf, $tbl, 6, $tblrow, "Not Answered", $optlist);
	    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		$tblrow++;

		foreach($questionSeq[1] as $qcode => $seq){

			$orgseq = $seq;
			$version1seq = $seq + 1;
			$version2seq = $questionSeq[2][$qcode] +1;
			$version3seq = $questionSeq[3][$qcode] +1;
			$version4seq = $questionSeq[4][$qcode] +1;
			
			
			$query = "SELECT 
					  SUM(if((A$version1seq = 'A' AND paperversion = 1) OR (A$version2seq = 'A' AND paperversion = 2) OR (A$version3seq = 'A' AND paperversion = 3) OR (A$version4seq = 'A' AND paperversion = 4),1,0)) as A,
					  SUM(if((A$version1seq = 'B' AND paperversion = 1) OR (A$version2seq = 'B' AND paperversion = 2) OR (A$version3seq = 'B' AND paperversion = 3) OR (A$version4seq = 'B' AND paperversion = 4),1,0)) as B,
					  SUM(if((A$version1seq = 'C' AND paperversion = 1) OR (A$version2seq = 'C' AND paperversion = 2) OR (A$version3seq = 'C' AND paperversion = 3) OR (A$version4seq = 'C' AND paperversion = 4),1,0)) as C,
					  SUM(if((A$version1seq = 'D' AND paperversion = 1) OR (A$version2seq = 'D' AND paperversion = 2) OR (A$version3seq = 'D' AND paperversion = 3) OR (A$version4seq = 'D' AND paperversion = 4),1,0)) as D,
					  SUM(if(((A$version1seq = '0' OR A$version1seq is NULL) AND paperversion = 1) OR ((A$version2seq = '0' OR A$version2seq is NULL) AND paperversion = 2) 
					      OR ((A$version3seq = '0' OR A$version3seq IS NULL) AND paperversion = 3) OR ((A$version4seq = '0' OR A$version4seq IS NULL) AND paperversion = 4),1,0)) as NA
					  FROM da_response 
					  INNER JOIN da_examDetails ON da_response.examcode = da_examDetails.exam_code
					  INNER JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
					  INNER JOIN da_studAcadDetails ON da_response.studentID = da_studAcadDetails.studentID AND da_testRequest.year = da_studAcadDetails.year
					  WHERE examcode = '".$examcode."'";
			$dbqry = new dbquery($query,$connid);
			//echo "<br>".$query;
			$result = $dbqry->getrowarray();
			
			$optionAPerfo = floor(($result["A"]/$ExamCodeInfo[$examcode]["totalstudents"])*100);
			$optionBPerfo = floor(($result["B"]/$ExamCodeInfo[$examcode]["totalstudents"])*100);
			$optionCPerfo = floor(($result["C"]/$ExamCodeInfo[$examcode]["totalstudents"])*100);
			$optionDPerfo = floor(($result["D"]/$ExamCodeInfo[$examcode]["totalstudents"])*100);
			#$optionNAPerfo = round(100 - ($optionAPerfo + $optionBPerfo + $optionCPerfo + $optionDPerfo)); # Task id: S-01378 DA: Report changes contd.
			$optionNAPerfo = floor(($result["NA"]/$ExamCodeInfo[$examcode]["totalstudents"])*100);
			
			$tblcol = 1;
			$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $version1seq, $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		    $matchboxA = "";
			if($CorrectAnswerArr[$qcode] == "A") {
				$matchboxA = " matchbox={fillcolor={rgb 0.0 0.5 0.0}}";
			}else if($optionAPerfo >= 50){
				//$matchboxA = " matchbox={fillcolor={rgb 1 0.0 0.0}}"; # we stopped highlighting Task id : S-01378 DA: Report changes contd.
			}
			
		    $tblcol = 2;
			$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchboxA margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $optionAPerfo."%", $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    
		    $matchboxB = "";
			if($CorrectAnswerArr[$qcode] == "B") {
				$matchboxB = " matchbox={fillcolor={rgb 0.0 0.5 0.0}}";
			}else if($optionBPerfo >= 50){
				//$matchboxB = " matchbox={fillcolor={rgb 1 0.0 0.0}}";
			}
		    $tblcol = 3;
			$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchboxB margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $optionBPerfo."%", $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $matchboxC = "";
			if($CorrectAnswerArr[$qcode] == "C") {
				$matchboxC = " matchbox={fillcolor={rgb 0.0 0.5 0.0}}";
			}else if($optionCPerfo >= 50){
				//$matchboxC = " matchbox={fillcolor={rgb 1 0.0 0.0}}";
			}
		    $tblcol = 4;
			$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchboxC margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $optionCPerfo."%", $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $matchboxD = "";
			if($CorrectAnswerArr[$qcode] == "D"){
				$matchboxD = " matchbox={fillcolor={rgb 0.0 0.5 0.0}}";
			}else if($optionDPerfo >= 50){
				//$matchboxD = " matchbox={fillcolor={rgb 1 0.0 0.0}}";
			}
		    $tblcol = 5;
			$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchboxD margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $optionDPerfo."%", $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
		    
		    $matchboxNA = "";
		    if($optionNAPerfo > 50)  $matchboxNA = " matchbox={fillcolor={rgb 1 0.0 0.0}}";
		    
		    $tblcol = 6;
			$optlist = "colwidth=20% rowheight=15 fittextline={position={center center} font=" . $this->font . " fontsize=$fontsize} $matchboxNA margin=$margin";
	        $tbl = PDF_add_table_cell($pdf, $tbl, $tblcol, $tblrow, $optionNAPerfo."%", $optlist);
		    if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}

		    $tblrow++;
		}

		if($needed_height < 65){

				if($firstypos < 245) {

					do{
						pdf_end_page($pdf);
						pdf_begin_page($pdf,$this->page_width,$this->page_height);
						$this->pageno++;
						$this->addpagenumber($pdf,$this->pageno);
						$this->LoadpdfFont($pdf,$this->fontname);

						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
		    			pdf_setfont($pdf,$this->font,$this->fontsize);

						$xpos = $this->left_margin;		   // Left margine
						//$ypos = $this->page_height-$this->top_margin-$buffersize;  // Top margine
						$ypos = $this->page_height-$this->top_margin;  // Top margine
						$optlist = "header=1 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}} ";
						$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);

						//pdf_setfont($pdf,$this->fontbold,$this->fontsize);
						//pdf_show_xy($pdf,"Answer Key",$this->left_margin,$this->page_height - $this->top_margin);

					}while($tblresult == "_boxfull");
				}
				else {
					$i = 0;
					do{
						if($i == 0)
							$yposforcontent = $firstypos - $buffersize;
						else
							$yposforcontent = $this->page_height - $this->top_margin;

						$optlist = "header=1 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}} ";
						$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $yposforcontent, $optlist);

						//pdf_setfont($pdf,$this->fontbold,$this->fontsize);
						//pdf_show_xy($pdf,"Answer Key",$this->left_margin,$yposforcontent);

						if ($tblresult != "_stop") {

							pdf_end_page($pdf);
							pdf_begin_page($pdf,$this->page_width,$this->page_height);
							$this->pageno++;
							$this->addpagenumber($pdf,$this->pageno);
							
							$i++;
							$this->LoadpdfFont($pdf,$this->fontname);
							pdf_setfont($pdf, $this->font, $fontsize);

							createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","CLASS");
			    			pdf_setfont($pdf,$this->font,$this->fontsize);

							$xpos = $this->left_margin;		   // Left margine
							//$ypos = $this->page_height-$this->top_margin-$buffersize;
							$ypos = $this->page_height-$this->top_margin;
						}
						$i++;
					}while($tblresult == "_boxfull");
				}
				if($newpageflag==0)
					$newpageflag=1;
		}else{

			$ypos = $ypos - $buffersize;
			$optlist = "header=1 fill={{area=header fillcolor={gray 0.9}}} stroke={{line=other linewidth=0.1}} ";
			$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ypos, $optlist);
		}
		$tblheight = pdf_info_table($pdf,$tbl,'height');
		pdf_delete_table($pdf,$tbl,"");
		$return_arr[0] = $ypos - $tblheight;
		$return_arr[1] = $newpageflag;
		return $return_arr;
	}
	
	# genflag = R i.e regular report generation , F = Report generated for class in which some sections test are expired due to non conduction
	function GenerateSchoolReport($request_id=0,$connid,$regenerateid=0,$GenFlag="R"){

		$this->setgetvars();
		$this->setpostvars();

		$request_arr = array();
		$examcode_str = "";
		$section_str = "";
		$condition = "";

		if($request_id != 0)
			$condition = "WHERE request_id = '".$request_id."'";
		if($request_id==868)
		    $condition .= " AND exam_code in ('422933','999693')";
		$query = "SELECT request_id,exam_code,section FROM da_examDetails $condition ORDER BY section";
		$dbquery = new dbquery($query,$connid);

		while($row = $dbquery->getrowarray()){

			$request_arr[$row['request_id']][$row['exam_code']] = $row['section'];
			$examcode_str .= "'".$row['exam_code']."',";
			$section_str .= $row['section'].",";
			if($request_id == 0)
				$request_id = $row["request_id"];
		}

		/*
		echo "<pre>";
		print_r($request_arr);
		echo "</pre>";
		*/
		
		# Checking to exclude the dropped questions (using report regenerate interface earlier) from reports
		if($regenerateid == 0){
			
			$chk_query = "SELECT regen_id FROM da_reportsRegen WHERE request_id = '".$request_id."' ORDER BY requested_dt DESC limit 1";
			$chk_dbqry = new dbquery($chk_query,$connid);
			$chk_result = $chk_dbqry->getrowarray();
			$regenerateid = $chk_result["regen_id"];
		}

		$query = "SELECT da_response.examcode,da_response.paperversion, group_concat( distinct(da_response.studentID) ) AS studentids,
				  da_testRequest.paper_code,B.qcode_list,da_testRequest.test_date,da_testRequest.subject,da_testRequest.class,
				  da_testRequest.schoolCode,da_testRequest.paper_code,da_testRequest.testName,da_testRequest.approved_date,da_examDetails.section,
				  da_examDetails.no_of_students,count(distinct(da_response.studentID)) AS TotalStudents,da_orderMaster.score_outof,
				  da_orderMaster.order_id
				  FROM da_examDetails
				  LEFT JOIN da_response ON da_examDetails.exam_code = da_response.examcode
				  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
				  LEFT JOIN da_orderMaster ON da_testRequest.schoolCode = da_orderMaster.schoolCode AND da_testRequest.year = da_orderMaster.year
				  LEFT JOIN da_paperDetails AS A ON da_testRequest.paper_code = A.papercode
				  LEFT JOIN da_paperDetails AS B ON da_response.paperversion = B.version AND A.papercode = B.papercode
				  WHERE da_examDetails.exam_code IN(".rtrim($examcode_str,',').")
				  GROUP BY da_examDetails.exam_code,da_response.paperversion";
		// da_orderMaster.year = '".date("Y")."'
		$dbquery = new dbquery($query,$connid);

		if($dbquery->numrows() == 0) die("No Records Found For Given Request Id, Report will not be generated!");

		$paperwisesequence = array();
		$AllStudentsArr = array();
		$SectionWiseStudents = array();
		$reportingtopic_arr = array();
		$TestInfo = array();
		$totalStudentsCnt = 0;

		while($row = $dbquery->getrowarray()){

			$ExamCodeInfo[$row['examcode']] = array("papercode"=>$row["paper_code"],"schoolcode"=>$row["schoolCode"],"subject"=>$row['subject'],
							  						"class"=>$row["class"],"testdate"=>$row["test_date"],"testname"=>$row["testName"],
							  						"section"=>$row["section"],"totalstudents"=>$row["no_of_students"],"score_outof"=>$row["score_outof"]);

			$papercode = $row['paper_code'];
			$schoolcode = $row["schoolCode"];
			$subject = $row['subject'];
			$class = $row["class"];
			$testdate = $row["test_date"];
			$testName = $row["testName"];
			$qcodelist = $row['qcode_list'];
			$score_outof = $row['score_outof'];
			$order_id = $row["order_id"];
			$approved_date = $row["approved_date"];
			//$paperwiseQueSeq[$row['paperversion']] = explode(',',$row['qcode_list']); # Now we are taking from da_paperDetails table.
			if($row["examcode"] != "")
				$SectionWiseStudents[$row['examcode']][$row['paperversion']] = $row['studentids'];
				
			$totalStudentsCnt += $row['TotalStudents'];
		}

		$questionquery = "SELECT papercode,version,qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' ORDER BY papercode";
		$dbqueqry = new dbquery($questionquery,$connid);
		while($querow = $dbqueqry->getrowarray()){

			$paperwiseQueSeq[$querow['version']] = explode(',',$querow['qcode_list']);

			if($qcodelist == "")
				$qcodelist = $querow['qcode_list'];
		}
		if($qcodelist == "") die("No Questions Found In Paper, Report will not be generated!");

		
		$ScoreOutOfDetails = array();
		if($order_id != '' && $order_id != 0){
			$sc_qry = "SELECT class, e_score_outof, m_score_outof, s_score_outof FROM da_orderBreakup
					   WHERE order_id = $order_id AND class = $class GROUP BY class";
			$sdbqry = new dbquery($sc_qry,$connid);
			while($score_result = $sdbqry->getrowarray()){
				$ScoreOutOfDetails[$class][1] = $score_result['e_score_outof'];
				$ScoreOutOfDetails[$class][2] = $score_result['m_score_outof'];
				$ScoreOutOfDetails[$class][3] = $score_result['s_score_outof'];
			}
		}else if($schoolcode == "2502830"){ // dummy school for DA
			$ScoreOutOfDetails[$class][1] = 100;
			$ScoreOutOfDetails[$class][2] = 100;
			$ScoreOutOfDetails[$class][3] = 100;
		}
		
		
		$questionSeq = array();
		foreach($paperwiseQueSeq as $paper => $quesarray){
			$questionSeq[$paper] = array_flip($quesarray);
		}

		$misconceptionque_arr = array();
		$misconceptionque_arr_with_ans = array();
		$QueFromVersionTable = array();
		$CorrectAnswerArr = array();
		
		# if we have report regenration request with quetion version than below process
		$VersionQues = array();	
		$DropQuesArr = array();
		if($regenerateid != 0){
			
			$dque_query = "SELECT drop_ques FROM da_reportsRegen WHERE regen_id = '".$regenerateid."'";
			$dque_dbqry = new dbquery($dque_query,$connid);
			$drop_result = $dque_dbqry->getrowarray();
			if($drop_result["drop_ques"] != "")
				$DropQuesArr = explode(",",$drop_result["drop_ques"]);
			
			$vquery = "SELECT qcode,version FROM da_reportsRegen_questions WHERE version != 0 AND regen_id = '".$regenerateid."'";
			$vdbqry = new dbquery($vquery,$connid);
			while($vrow = $vdbqry->getrowarray()){
				$VersionQues[$vrow["qcode"]] = $vrow["version"];
			}
			
			if(is_array($VersionQues) && count($VersionQues) > 0){
			
				foreach($VersionQues as $qcode => $version){
					$ver_query = "SELECT qcode,correct_answer,misconception FROM da_questions_versions WHERE qcode = '".$qcode."' AND version = '".$version."'";
					$ver_dbqry = new dbquery($ver_query,$connid);
					$ver_raw = $ver_dbqry->getrowarray();
					$QueFromVersionTable[$qcode] = $version;
					$CorrectAnswerArr[$ver_raw['qcode']] = $ver_raw["correct_answer"];
					
					if($ver_raw["misconception"] == 1 && !in_array($qcode,$DropQuesArr)) {
						$misconceptionque_arr[] = $ver_raw['qcode'];
						$misconceptionque_arr_with_ans[$ver_raw['qcode']] = $ver_raw['correct_answer'];
					}
				}
			}
		}
		
		# need to check whether question version is available than need to use the data from da_questions_versions table
		$clsdaquestion = new clsdaquestion();
		$query2 = "SELECT qcode,correct_answer,misconception,lastModified FROM da_questions WHERE qcode IN($qcodelist)";
		$dbquery2 = new dbquery($query2,$connid);
		while($row2 = $dbquery2->getrowarray()){

			if(!array_key_exists($row2["qcode"],$VersionQues)){
			
				$QueTableResultArr = $clsdaquestion->GetQueTableAndVersion($connid,$row2["qcode"],$approved_date,$row2["lastModified"]);
				
				if($QueTableResultArr["tablename"] == "da_questions_versions"){
					
					$CorrectAnswerArr[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					$QueFromVersionTable[$row2["qcode"]] = $QueTableResultArr["version"];
					if($QueTableResultArr["misconception"] == 1 && !in_array($row2["qcode"],$DropQuesArr)){
						$misconceptionque_arr[] = $row2['qcode'];
						$misconceptionque_arr_with_ans[$row2['qcode']] = $QueTableResultArr["correct_answer"];
					}
				}	
				else{
					$CorrectAnswerArr[$row2['qcode']] = $row2["correct_answer"];
					if($row2["misconception"] == 1 && !in_array($row2["qcode"],$DropQuesArr)) {
						$misconceptionque_arr[] = $row2['qcode'];
						$misconceptionque_arr_with_ans[$row2['qcode']] = $row2['correct_answer'];
					}
				}
			}	
		}
		
		$repqry = "SELECT reporting_id,papercode,sst_list,qcode_list,reporting_head FROM da_reportingDetails WHERE papercode = '".$papercode."' ORDER BY reporting_order";
		$repdbqry = new dbquery($repqry,$connid);
		while($reportingrow = $repdbqry->getrowarray()){
			$reportingtopic_arr[$reportingrow['reporting_id']] = $reportingrow['reporting_head'];
			$reporting_subsubtopicarr[$reportingrow['reporting_id']] = $reportingrow['sst_list'];
			$ReportingQuesArr[$reportingrow['reporting_id']] = explode(",",$reportingrow["qcode_list"]);
		}

		# Calculating overall perfomance
		$totalQuestions = count($questionSeq[1]);
		$SectionOverallPerfo = array();
		$AllSectionStudCount = 0;
		$AllSetionPerfo = 0;
		foreach($SectionWiseStudents as $section => $paperwisestudents){

			$SectionStudents[$section] = "";
			foreach($paperwisestudents as $paperversion => $students){
				$SectionStudents[$section] .= $students.",";
			}

			$SectionStudents[$section] = rtrim($SectionStudents[$section],",");
			$SectionStudCount = count(explode(",",trim($SectionStudents[$section])));

			$AllSectionStudCount += $SectionStudCount;

			$qry = "SELECT AVG(total) as totalperfo FROM da_response WHERE examcode ='".$section."' AND studentID IN(".rtrim($SectionStudents[$section],",").")";
			$dbqry = new dbquery($qry,$connid);
			$resultrow = $dbqry->getrowarray();
			$AllSetionPerfo += $resultrow["totalperfo"];

			/* Prevoius process for taking score out of from da_orderMaster table
			if($ExamCodeInfo[$section]["score_outof"] == 0 && $ExamCodeInfo[$section]["score_outof"] != "")
				$SectionOverallPerfo[$section] = round($resultrow["totalperfo"],2);
			elseif($ExamCodeInfo[$section]["score_outof"] > 0 && $ExamCodeInfo[$section]["score_outof"] < 100)
				$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/$totalQuestions) * $ExamCodeInfo[$section]["score_outof"]),2);
			else
				$SectionOverallPerfo[$section] = round(($resultrow["totalperfo"]/$totalQuestions) * 100,2);*/
			
			if($ScoreOutOfDetails[$class][$subject] == 0 && $ScoreOutOfDetails[$class][$subject] != "")
				$SectionOverallPerfo[$section] = round($resultrow["totalperfo"],2);
			elseif($ScoreOutOfDetails[$class][$subject] > 0 && $ScoreOutOfDetails[$class][$subject] < 100)
				$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/$totalQuestions) * $ScoreOutOfDetails[$class][$subject]),2);
			else
				$SectionOverallPerfo[$section] = round(($resultrow["totalperfo"]/$totalQuestions) * 100,2);
		}

		/* Previous process for taking score outof from da_orderMaster table
		if($score_outof == 0 && $score_outof != "")
			$SectionOverallPerfo['ALL'] = round($AllSetionPerfo/count($SectionWiseStudents),2);
		elseif($score_outof > 0 && $score_outof < 100)
			$SectionOverallPerfo['ALL'] = round((($AllSetionPerfo/($totalQuestions*count($SectionWiseStudents))) * $score_outof),2);
		else
			$SectionOverallPerfo['ALL'] = round(($AllSetionPerfo/($totalQuestions*count($SectionWiseStudents))) * 100,2);*/
		
		if($ScoreOutOfDetails[$class][$subject] == 0 && $ScoreOutOfDetails[$class][$subject] != "")
			$SectionOverallPerfo['ALL'] = round($AllSetionPerfo/count($SectionWiseStudents),2);
		elseif($ScoreOutOfDetails[$class][$subject] > 0 && $ScoreOutOfDetails[$class][$subject] < 100)
			$SectionOverallPerfo['ALL'] = round((($AllSetionPerfo/($totalQuestions*count($SectionWiseStudents))) * $ScoreOutOfDetails[$class][$subject]),2);
		else
			$SectionOverallPerfo['ALL'] = round(($AllSetionPerfo/($totalQuestions*count($SectionWiseStudents))) * 100,2);

		# if we are taking SUM(total) in place of AVG(total) than use below calculations
		#$SectionOverallPerfo[$section] = round((($resultrow["totalperfo"]/($totalQuestions * $SectionStudCount)) * $ExamCodeInfo[$section]["score_outof"]),2);
		## calculations end

		$MisconceptonQuestions = $this->getMisconceptionQueToDisplay($misconceptionque_arr_with_ans,$ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);
		$SubTopicWisePerfoArr = $this->getSubtopicWisePerfo($ReportingQuesArr,$questionSeq,$SectionWiseStudents,$connid);# used in barchart

		if($request_id==868)
		    $MisconceptonQuestions["ALL"] = array("5453"=>"1","5047"=>"1","3718"=>"1");
		$doublelinebreak = 20;
		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;

		$pdf = pdf_new();
		pdf_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));
		pdf_set_parameter($pdf, "textformat", "utf8");
		pdf_set_parameter($pdf, "charref", "true");

		$this->LoadpdfFont($pdf,$this->fontname);

		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/",0755);

		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/",0755);

		if(!is_dir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/"))
			mkdir(constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports/",0755);

		$ActualStudentReportPath = constant("PATH_STUDENTREPORT")."/$schoolcode/$request_id/reports";

		pdf_begin_document($pdf,$ActualStudentReportPath."/$request_id.pdf","");

		$dateParameters=explode("-",$testdate);
		$newDate=$dateParameters[2]."-".$dateParameters[1]."-".$dateParameters[0];
		$this->CreateFirstPageOfSchoolReport($pdf,$schoolcode,$subject,$class,$newDate,$testName,$totalStudentsCnt,$section_str,$SubTopicWisePerfoArr,$reportingtopic_arr,$request_arr,$request_id,$ScoreOutOfDetails[$class][$subject],$SectionOverallPerfo,$GenFlag,$connid);

		pdf_begin_page($pdf,$this->page_width,$this->page_height);
		$this->pageno++;
		$this->addpagenumber($pdf,$this->pageno);

		$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
		createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
    	pdf_setfont($pdf,$this->font,$this->fontsize);

    	$ypos = $this->page_height - $this->top_margin;
    	
    	
    	$classperfo = array();
		foreach($SubTopicWisePerfoArr as $subtopicid => $perfomance){
			if($request_id != 0){
				foreach($request_arr as $requestid => $sectionarr){
					$i = 0;
					foreach($sectionarr as $section=>$classsuffx){
						if($i%2) $color = "Dark"; else $color = "Light";
						$classperfo[$section][$subtopicid] = $perfomance[$section];
						$classperfo[$section]['Name'] = "Section ".$classsuffx;
						$classperfo[$section]['Color'] = $color;
						$i++;
					}
				}
			}
		}
    	
		$macro ="<macro { Body {alignment=justify leading=120% fontname=$this->fontname fontsize=$this->fontsize encoding=unicode}
					   	 Body_bold {alignment=justify leading=120% fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode}
					   }>";
		
		$text1 = "<&Body_bold>Key Ideas Assessed - Section Summary\n".
				"<&Body>The batch was assessed in the following concept areas. The section-wise performance in each area is given in the chart below.";
				
		$nooflines1 = ceil(pdf_stringwidth($pdf,$text1,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		$expected_height1 = ($nooflines1+2) * ($this->fontsize); // expected height should be multiply by fontsize by but depends on leading also 20% more that means its 2 size more than the actual font size
		$optlist = "font=$this->font fontsize=$this->fontsize leading=100%";
		$testsummarytxt = pdf_create_textflow($pdf,$macro.$text1, $optlist);
		pdf_fit_textflow($pdf,$testsummarytxt,$this->left_margin,$ypos,$this->page_width-$this->right_margin,$expected_height1,"");
		$textflow_height1 = pdf_info_textflow($pdf,$testsummarytxt,"textheight");
		pdf_delete_textflow($pdf,$testsummarytxt);
		
		$ypos -= $textflow_height1;
		$ypos -= $doublelinebreak;
		
    	# Key Ideas Assessed – Section Summary
    	$buffersize = 10;
		$orgyposbeforechart = $ypos;

		$nooftopics = count($reportingtopic_arr);
		$noofsection = count($classperfo);
		$actualheight = $this->page_height - $this->top_margin - $this->bottom_margin;

		$returnposition = $this->getTopicWisePerfoBarGraph($pdf,$ypos,$nooftopics,$noofsection,$linetype = 'normal',$reportingtopic_arr,$classperfo,$actualheight,$buffersize);

		$nextpage=$returnposition[1];
		$ypos = $returnposition[0];

   		if($nextpage==1){
   			$orgyposbeforechart = $this->page_height-$this->top_margin;
   			$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
	    	pdf_setfont($pdf,$this->font,$this->fontsize);
   		}

   		/*pdf_setfont($pdf,$this->fontbold,9);
   		pdf_show_xy($pdf,"The batch was assessed in the following concept areas. The section-wise performance in each area is given in the chart below.",$this->left_margin,$orgyposbeforechart);
		*/
   		$ypos -= $doublelinebreak;
    	
   		$text1 = "<&Body_bold>Misconceptions Identified\n".
				"<&Body>The most common misconceptions across all sections are mentioned below.";
				
		$nooflines1 = ceil(pdf_stringwidth($pdf,$text1,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		$expected_height1 = ($nooflines1+2) * ($this->fontsize); // expected height should be multiply by fontsize by but depends on leading also 20% more that means its 2 size more than the actual font size
		$optlist = "font=$this->font fontsize=$this->fontsize leading=100%";
		$testsummarytxt = pdf_create_textflow($pdf,$macro.$text1, $optlist);
		pdf_fit_textflow($pdf,$testsummarytxt,$this->left_margin,$ypos,$this->page_width-$this->right_margin,$expected_height1,"");
		$textflow_height1 = pdf_info_textflow($pdf,$testsummarytxt,"textheight");
		pdf_delete_textflow($pdf,$testsummarytxt);
		
		$ypos -= $textflow_height1;
		$ypos -= $doublelinebreak;
   		

		/*pdf_setfont($pdf,$this->font,$this->fontsize);
		pdf_show_xy($pdf,"The most common misconceptions across all sections are mentioned below.",$this->left_margin,$ypos);*/

		$ypos -= $singlelinebreak;

		pdf_setfont($pdf,$this->font,8);
		pdf_show_xy($pdf,"Note: The question numbers are based on paper version 1",$this->left_margin,$ypos);

		$ypos -= $doublelinebreak;

		if(is_array($MisconceptonQuestions[ALL]) && count($MisconceptonQuestions[ALL]) > 0) {

			$i =0;
			foreach($MisconceptonQuestions[ALL] as $qcode => $answers){

					$OptionWiseStudentPerfo = $this->getOptionWisePerfo($SectionWiseStudents,$questionSeq,$qcode,$connid);
					
					if(array_key_exists($qcode,$QueFromVersionTable)){

						$QueTblName = "da_questions_versions";
						$Condition = " AND da_questions_versions.version = '".$QueFromVersionTable[$qcode]."'";
					
					}else{
					
						$QueTblName = "da_questions";
						$Condition = "";
					}
					
					$i++;
					$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,ts_file,group_id,
							  		 $QueTblName.passage_id,qms_passage.passage_name
							  FROM $QueTblName
							  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
							  WHERE qcode = '".$qcode."' AND misconception = 1 $Condition";
					$dbqry = new dbquery($query,$connid);
					$result = $dbqry->getrowarray();

					$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";

					$concept = str_replace("<P>","",$concept);
				   	$concept = str_replace("</P>","",$concept);
				   	$concept = str_replace("<p>","",$concept);
				   	$concept = str_replace("</p>","",$concept);
				   	$concept = $this->common_pdf_junk_replace($concept);

					$remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
					$mcexplanation = $result['mcexplanation'];
					$correct_answer = $result['correct_answer'];

					$passagenamebuffer = 0;
					$passagename = "";

					if($subject == 1 && $result["passage_id"] != 0 && $result['passage_name'] != ""){

						$passagename = $result["passage_name"];
						$nooflinesofpsg = ceil(pdf_stringwidth($pdf,$passagename,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
						$passagenamebuffer = ($nooflinesofpsg * ($this->fontsize)) + $oneandhalflinebreak;
					}

				    $nooflines = ceil(pdf_stringwidth($pdf,"Concept: $concept",$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
				    $buffersize = ($nooflines * ($this->fontsize)) + $doublelinebreak + $passagenamebuffer; // we need to add line after printing concept

					######### Question Starts #################

					$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
					$qcodestr = $this->common_pdf_junk_replace($qcodestr);
					
					//$ypos -= $singlelinebreak;
				   	$yposbeforequestion = $ypos;
				   	# commented as per discussion with manish & muntaquim as images comes from only 1
				   	/*if($result["group_id"] != 0)
						$imagepathfrom = 2;
					else*/
					
				   	$imagepathfrom = $this->imagepathfrom;
				   // naveen question stem =1 
				   	//$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
				   $ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,1,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

				   	$isNewPage = $ypos_returned[1];
				   	$yposafterque = $ypos_returned[0];

	           		if($isNewPage==1){
	           			$this->pageno++;
	           			$this->addpagenumber($pdf,$this->pageno);
	           			$yposbeforequestion = $this->page_height-$this->top_margin;
	           			$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
				    	pdf_setfont($pdf,$this->font,$this->fontsize);
	           		}

	           		$queno = $questionSeq[1][$qcode] + 1;
	           		# Imlemented question no printing as per paper
	           		$yposforQ = $yposbeforequestion - $buffersize + 7;

	           	   	pdf_setfont($pdf, $this->fontbold, $this->fontsize);
				   	pdf_show_xy($pdf,"Q",$this->left_margin-13,$yposforQ-5);
				   	pdf_setrgbcolor($pdf, 0, 0, 0);

				   	pdf_setlinewidth($pdf,0.5);
			 	   	pdf_moveto($pdf,$this->left_margin-15,$yposforQ-$oneandhalflinebreak+6);
				   	pdf_lineto($pdf,$this->left_margin-3,$yposforQ-$oneandhalflinebreak+6);
			 	   	pdf_stroke($pdf);

			 	   	if($queno>9) $qno_position=14; else $qno_position=12;
			 	   	pdf_setfont($pdf, $this->fontbold, 8);
				   	pdf_show_xy($pdf,$queno,$this->left_margin-$qno_position,$yposforQ-17);

				   	pdf_setlinewidth($pdf,0.5);
	 	   			pdf_moveto($pdf,$this->left_margin-15,$yposforQ-19);
		   			pdf_lineto($pdf,$this->left_margin-3,$yposforQ-19);
	 	   			pdf_stroke($pdf);

				   	//pdf_show_xy($pdf,"Q ".$queno.": ",$this->left_margin,$yposbeforequestion-$buffersize + 1.5); // 1.5 is added cause in new autopublish paper funciton question print slightly up

				   	################ Question End #################
					/*pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforequestion);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforequestion);
				    pdf_stroke($pdf);
				   	*/
					# line above concept
					pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforequestion);
					pdf_lineto($pdf,$this->page_width-$this->right_margin,$yposbeforequestion);
				    pdf_stroke($pdf);
					$yposbeforequestion -= $singlelinebreak;
				   	
					$buffersize = 0;
				   	$ypos_returned = autoPublishPaper($pdf,"<b>Concept:</b> ".$concept,$this->left_margin ,$yposbeforequestion,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

				    $isNewPage = $ypos_returned[1];
				    $yposafterconcept = $ypos_returned[0];

				    if($isNewPage == 1){
				    	$this->pageno++;
				    	$this->addpagenumber($pdf,$this->pageno);
				    	$ypositionbeforeconcept = $this->page_height-$this->top_margin;
				    	$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
				    	pdf_setfont($pdf,$this->font,$this->fontsize);
				    }
					
				 	if($passagename != ""){
						$buffersize = 0;
				    	$yposreturned_after_passagename = autoPublishPaper($pdf,"Passage: ".$this->common_pdf_junk_replace($passagename),$this->left_margin,$yposafterconcept,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
				    	$newpageafterpassage = $yposreturned_after_passagename[1];
				    	$yposafterpassage = $yposreturned_after_passagename[0];
					}

				    /*if($passagename != "")
				    {
					    $textflow = PDF_create_textflow($pdf, "Passage: ".$passagename, "fontname=$this->fontname fontsize=$this->fontsize encoding=unicode leading=100%");
						do {
						    $passageres = PDF_fit_textflow($pdf, $textflow, $this->left_margin, 120, 550, $yposafterconcept,"");
						} while (strcmp($passageres, "_stop"));
						PDF_delete_textflow($pdf, $textflow);
				    }*/

				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposafterconcept+$singlelinebreak);
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposafterconcept+$singlelinebreak);
				    pdf_stroke($pdf);

				    # line above question no
				    pdf_moveto($pdf,$this->left_margin-15,$yposafterconcept+$singlelinebreak);
					pdf_lineto($pdf,$this->left_margin-3, $yposafterconcept+$singlelinebreak);
				    pdf_stroke($pdf);


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
					$lly= 10; // TABLE HEIGHT

					$urx= $this->left_margin;   //POSITION OF X
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
			        	$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, round($performance)."%", $optlist);
				        if ($tbl == 0) { die("Error: " . PDF_get_errmsg($p));}
			    		$col++;
			        }

					/* Place the table instance */
					$optlist = "header=1 fill={{area=rowodd fillcolor={gray 0.9}}} " ."stroke={{line=other linewidth=0.1}} ";
					$tblresult = PDF_fit_table($pdf, $tbl, $llx, $lly, $urx, $ury, $optlist);
					$tblheight = pdf_info_table($pdf,$tbl,"height");

				   	$ypos -= $tblheight + $singlelinebreak;

				   	$yposbeforemcexplanation = $ypos;
				   	$buffersize = 0;

				   // $remedial_measure = (isset($result['mcexplanation']) && $result['mcexplanation'] != '')?$result['mcexplanation']:"";
				    //$nooflines_rm = ceil(pdf_stringwidth($pdf,$remedial_measure,$this->font,9)/($this->page_width-$this->left_margin-$this->right_margin));
					$mcexplanation = $this->common_pdf_junk_replace($mcexplanation);
				    $ypos_returned = autoPublishPaper($pdf,$mcexplanation,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);

				    $ypos = $ypos_returned[0];
				   	$isNewPage=$ypos_returned[1];

				   	if($isNewPage==1){
				   		$this->pageno++;
				   		$this->addpagenumber($pdf,$this->pageno);
	           			$yposbeforemcexplanation = $this->page_height-$this->top_margin;
	           			$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
				    	pdf_setfont($pdf,$this->font,$this->fontsize);
	           		}

	           		$ypos -= $singlelinebreak;
	           		$yposbeforeremedial = $ypos;
				   	
	           		$buffersize = 15;
					$remedial_measure = $this->common_pdf_junk_replace($remedial_measure);
				    #$ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
					$remedial_measure ="<hr>123</hr><br><b>Remedial Measure</b><hr>123</hr><br><br>".$remedial_measure;
					$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate,"pageno"=>$this->pageno,"report"=>"SCHOOL");
					$ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages,$arrangeoptions=1,$istextpassage="Y",$optionLetters=array(),$medium="",$parameters);
				    
				    $ypos = $ypos_returned[0];
				   	$isNewPage=$ypos_returned[1];

				   	if($isNewPage==1){
	           			$this->pageno = $ypos_returned[2];
				   		//$this->pageno++;
	           			//$this->addpagenumber($pdf,$this->pageno);
	           			$yposbeforeremedial = $this->page_height-$this->top_margin;
	           			/*$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
						createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
				    	pdf_setfont($pdf,$this->font,$this->fontsize);*/
	           		}

				    //$yposbeforeremedial -= 10;
				    
				   /* pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial+10); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial+10);
				    pdf_stroke($pdf);
					pdf_setfont($pdf,$this->fontbold,$this->fontsize);
				    pdf_show_xy($pdf,"Remedial Measure",$this->left_margin,$yposbeforeremedial);
					pdf_setfont($pdf,$this->font,$this->fontsize);
				    $yposbeforeremedial -= 2;

				    pdf_setlinewidth($pdf,0.1);
					pdf_moveto($pdf,$this->left_margin,$yposbeforeremedial); # above paragraph contains 13 line
					pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeremedial);
				    pdf_stroke($pdf);*/

				    $ypos -= $doublelinebreak;

					if($i == constant("MAX_MISCON_QUE_TO_DISP")) break;

			}

		} else {

			pdf_setfont($pdf,$this->font,$this->fontsize);
			pdf_show_xy($pdf,"No key misconceptions identified!",$this->left_margin,$ypos);
			$ypos -= $doublelinebreak;
		}


		/*$classperfo = array();
		foreach($SubTopicWisePerfoArr as $subtopicid => $perfomance){
			if($request_id != 0){
				foreach($request_arr as $requestid => $sectionarr){
					$i = 0;
					foreach($sectionarr as $section=>$classsuffx){
						if($i%2) $color = "Dark"; else $color = "Light";
						$classperfo[$section][$subtopicid] = $perfomance[$section];
						$classperfo[$section]['Name'] = "Section ".$classsuffx;
						$classperfo[$section]['Color'] = $color;
						$i++;
					}
				}
			}
		}*/

		/*$buffersize = 30;
		$orgyposbeforechart = $ypos;

		$nooftopics = count($reportingtopic_arr);
		$noofsection = count($classperfo);
		$actualheight = $this->page_height - $this->top_margin - $this->bottom_margin;

		$returnposition = $this->getTopicWisePerfoBarGraph($pdf,$ypos,$nooftopics,$noofsection,$linetype = 'normal',$reportingtopic_arr,$classperfo,$actualheight,$buffersize);

		$nextpage=$returnposition[1];
		$ypos = $returnposition[0];

   		if($nextpage==1){
   			$orgyposbeforechart = $this->page_height-$this->top_margin;
   			$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
	    	pdf_setfont($pdf,$this->font,$this->fontsize);
   		}

   		pdf_setfont($pdf,$this->fontbold,9);
   		pdf_show_xy($pdf,"The sub topic wise performance for each section is given in the table below.",$this->left_margin,$orgyposbeforechart);

   		$ypos -= $singlelinebreak;*/

   		$buffersize = 10;
   		$yposbeforetbl = $ypos;

   		pdf_setlinewidth($pdf,0.1);
   		pdf_setfont($pdf,$this->font,$this->fontsize);
   		$returnpos = $this->drawDASummaryReportTable($pdf,$ypos,$schoolcode,$order_id,$buffersize,$connid);

   		$ypos = $returnpos[0];
   		$newpage = $returnpos[1];
   		if($newpage == 1){
   			$yposbeforetbl = $this->page_height - $this->top_margin;
   			$parameters = array("exam_code"=>0,"test_name"=>$testName,"class"=>$class,"subject"=>$subject,"test_date"=>$newDate);
			createDAHeader($pdf,$this->left_margin,$this->page_height,$this->fontsize-4,$parameters,"R","SCHOOL");
	    	pdf_setfont($pdf,$this->font,$this->fontsize);
   		}

   		pdf_setfont($pdf,$this->fontbold,$this->fontsize);
   		pdf_show_xy($pdf,"DA Usage Summary",$this->left_margin,$yposbeforetbl);

   		pdf_end_page($pdf);
		pdf_end_document($pdf,"");
		
		# Move to bucket
		$source_path = $ActualStudentReportPath."/".$request_id.".pdf";
		$dest_path = "PDF/".$schoolcode."/".$request_id."/reports/".$request_id.".pdf";
		//$this->MoveToBucket($source_path,$dest_path);
		$request_type = $this->getRequestType($request_id,$connid);
		if(constant("SERVER_TYPE") == "Live"){
			$S3Res = $this->MoveToBucket($source_path,$dest_path);
			if($S3Res==1){
				@unlink($source_path);
			}
		}	
	}

	function drawDASummaryReportTable($pdf,$ypos,$schoolcode,$order_id,$buffersize,$connid){

		$returnarray = array();

		$fontsize = $this->fontsize;
		$returntocalling = array();
		$sci_classes_gap_exceptions = array(6,7,8,9,10);

		$query_condition = "";
		if($order_id != 0){
			$query_condition = "AND da_orderMaster.order_id = ".$order_id;
		}
		
		$query = "SELECT class,subject,count(*) as testutilized
				  FROM da_testRequest
				  LEFT JOIN da_orderMaster ON da_testRequest.schoolCode = da_orderMaster.schoolCode AND da_testRequest.year = da_orderMaster.year
				  WHERE da_testRequest.schoolCode = $schoolcode AND type = 'actual' $query_condition
				  GROUP BY class,subject";
		$dbqry = new dbquery($query,$connid);
		$totrows = $dbqry->numrows();

		$order_query = "SELECT term,test_request_exception FROM da_orderMaster WHERE schoolCode = '".$schoolcode."' AND order_id = '".$order_id."'";
		$order_dbqry = new dbquery($order_query,$connid);
		$order_result = $order_dbqry->getrowarray();
		$term = $order_result["term"];
		$test_request_exception = $order_result["test_request_exception"];
		
		$mapped_books = array();
		$max_papers_arr = array();
		
		if($order_id != "" && $order_id != 0){
			$book_query = "SELECT class,book_id,term,test_request_exception 
					  	   FROM da_bookMapping 
					       LEFT JOIN da_orderMaster ON da_bookMapping.year = da_orderMaster.year
					       WHERE da_bookMapping.schoolCode = $schoolcode AND subject = 3
					       AND class NOT IN(3,4,5)
					       AND da_orderMaster.order_id = $order_id ";
			$book_dbqry = new dbquery($book_query,$connid);
			while($book_result = $book_dbqry->getrowarray()){
				
				if($book_result["book_id"] != "")
					$mapped_books[$book_result["class"]] = count(explode(",",$book_result["book_id"]));
				else 		
					$mapped_books[$book_result["class"]] = 0;
			}
		}
		for($orderclass=3;$orderclass <= 10;$orderclass++){
			foreach($this->sub_short_name as $subject_id => $sub_short_name){
				
				$mapped_books[$orderclass] = isset($mapped_books[$orderclass])?$mapped_books[$orderclass]:0;
				
				if($term == "Full"){
					
					if($subject_id == 1 || $subject_id == 2){
						$max_papers_arr[$orderclass][$subject_id] = 8;
					}else if(($subject_id == 3 && in_array($orderclass,$sci_classes_gap_exceptions)) && ($test_request_exception == 1 || $mapped_books[$orderclass] >= 3)){
						$max_papers_arr[$orderclass][$subject_id] = 12;
					}else {
						$max_papers_arr[$orderclass][$subject_id] = 8;
					}
					
				} else if($term == "Half"){
					
					if($subject_id == 1 || $subject_id == 2){
						$max_papers_arr[$orderclass][$subject_id] = 4;
					}else if(($subject_id == 3 && in_array($orderclass,$sci_classes_gap_exceptions)) && ($test_request_exception == 1 || $mapped_books[$orderclass] >= 3)){
						$max_papers_arr[$orderclass][$subject_id] = 6;
					}else {
						$max_papers_arr[$orderclass][$subject_id] = 4;
					}	
				}
			}	
		}
		
		# Old Process commented
		/*$field_str = "";
		foreach($this->sub_short_name as $subject_id => $sub_short_name){
			$field_str .= strtolower($sub_short_name)."_max_papers AS '".$subject_id."',";
		}
		
		$max_papers_arr = array();
		if($order_id != 0){
			$order_qry = "SELECT class,".rtrim($field_str,",")." FROM da_orderBreakup WHERE order_id = '".$order_id."' GROUP BY class";
			$order_dbqry = new dbquery($order_qry,$connid);
			while($order_res = $order_dbqry->getrowarray()){

				foreach($this->sub_short_name as $subject_id => $sub_short_name){
					$max_papers_arr[$order_res["class"]][$subject_id] = $order_res[$subject_id];
				}
			}
		}*/
		
		$ypos -= $buffersize;
		$assumed_height = ($totrows + 1)* 10;
		$neededheight = $ypos - $assumed_height;

		if($neededheight <= 50) {

			pdf_end_page($pdf);
			pdf_begin_page($pdf,$this->page_width,$this->page_height);
			$this->pageno++;
			$this->addpagenumber($pdf,$this->pageno);

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
		$lly= 20; // TABLE HEIGHT -- Its taken 100 and its working for next page logic

		$urx=$this->left_margin;   //POSITION OF X
		$ury=$ypos;  //POSITION OF Y

		$rowmax = $totrows + 1;
		$colmax = 4;
		//$header = array(1 =>"S No",2=>"Class",3=>"Subject",4=>"Tests Available",5=>"Tests Utilized");
		$header = array(1=>"Class",2=>"Subject",3=>"DAs\nAvailable",4=>"DAs\nUtilized");

		//$optlist = "fittextline={position=center font=" . $this->font . " fontsize=9} " ."colspan=" . $colmax;
		$optlist = "fittextline={position={left top} font=" . $this->fontbold . " fontsize=$fontsize} rowheight=20 margin=4";
		$tf_opts = "font=$this->font alignment=center" ." fontsize={capheight=8.5} leading=120%"; 
		for ($col = 1; $col <= $colmax; $col++) {

			/*if($col == 3){
				
				$optlist3 = "alignment=center fontname=$this->fontnamebold encoding=unicode fontsize=$this->fontsize ";
				$tf = PDF_add_textflow($pdf, $tf, "DAs\nAvailable", $optlist3);
				$optlist_tbl = "margin=0 colwidth=20% rowheight=20 continuetextflow textflow=" . $tf;
				$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, "", $optlist_tbl);
		        
			}else {*/
			$tbl = PDF_add_table_cell($pdf, $tbl, $col, $row, $header[$col], $optlist);
			//}
		    if ($tbl == 0) {
	            die("Error: " . PDF_get_errmsg($pdf));
	        }
		}

		$i=1;
		while($result = $dbqry->getrowarray()){
			$row++;

			$max_papers = isset($max_papers_arr[$result["class"]][$result["subject"]])?$max_papers_arr[$result["class"]][$result["subject"]]:constant("MAX_TEST_YEAR");
			$testAvail = $max_papers - $result['testutilized'];
			if($testAvail < 0) $testAvail = 0;

			/*$optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = PDF_add_table_cell($pdf, $tbl, 1, $row, $i, $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));*/

	        $optlist = "fittextline={position={center center} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 1, $row, $result['class'], $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));

	        $optlist = "fittextline={position={left top} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 2, $row, $this->subject_arr[$result['subject']], $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));

	        $optlist = "fittextline={position={center center} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 3, $row, $testAvail, $optlist);
	        if ($tbl == 0) die("Error: " . pdf_get_errmsg($pdf));

	        $optlist = "fittextline={position={center center} font=". $this->font ." fontsize=$fontsize} rowheight=10 margin=4";
			$tbl = pdf_add_table_cell($pdf, $tbl, 4, $row, $result['testutilized'], $optlist);
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

	function CreateFirstPageOfSectionReport($pdf,$subject,$ExamCodeInfo,$examcode,$schoolname,$SubTopicWisePerfoArr,$reportingtopic_arr,$SectionOverallPerfo,$score_outof,$SectionMinMaxPerfo,$connid){

		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		$doublelinebreak = 20;

		$top_margin = 38;
		$imagefactor = 0.485;

        $headerimage = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."DA_logo.jpg", "");
		$reportlogo = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."report.jpg", "");
		
		if($subject != 100){
			$subjectlogo = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."sub_$subject.jpg", "");
			$subject_image_width = pdf_get_value($pdf, "IMAGEWIDTH", $subjectlogo);
			$subject_image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $subjectlogo);
		}
		
		$image_width = pdf_get_value($pdf, "IMAGEWIDTH", $headerimage);
		$image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $headerimage);
		$reportlogo_image_width = pdf_get_value($pdf, "IMAGEWIDTH", $reportlogo);
		$reportlogo_image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $reportlogo);
		
		$yposfor_da_logo = $this->page_height - $top_margin - 62;
        $yposfor_rightside_logos = $this->page_height - $top_margin - 77;

		pdf_begin_page($pdf, $this->page_width, $this->page_height);
		$this->pageno++;
		$this->addpagenumber($pdf,$this->pageno);

		pdf_fit_image($pdf,$headerimage, $this->left_margin, $yposfor_da_logo, "scale=0.5");

		$xpos_for_reportlogo = $this->page_width - $this->right_margin - 228;

		pdf_fit_image($pdf,$reportlogo, $xpos_for_reportlogo, $yposfor_rightside_logos, "scale=1");

		if($subject != 100){
			$xpos_sub_logo = $this->page_width - $this->right_margin - ($subject_image_width*$imagefactor);
			pdf_fit_image($pdf,$subjectlogo, $xpos_sub_logo, $yposfor_rightside_logos, "scale=1");
		}

		$ypos = $yposfor_rightside_logos - 14;

		pdf_setfont($pdf,$this->fontbold,22);
		pdf_show_xy($pdf,"CLASS", $xpos_for_reportlogo+($reportlogo_image_width * $imagefactor)+2,$this->page_height - $top_margin - 40);
		pdf_show_xy($pdf,"REPORT",$xpos_for_reportlogo+($reportlogo_image_width * $imagefactor)+2,$this->page_height - $top_margin - 65);

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak; // report suggest 8

	    pdf_setfont($pdf,$this->fontbold,12);

	    $date=explode("-",$ExamCodeInfo[$examcode]['testdate']);
		$year=$date[2];
		$month=$date[1];
		$day=$date[0];
		$newDate=date("j F Y", mktime(0, 0, 0, $month, $day, $year));

		pdf_show_xy($pdf,$newDate,$xpos_for_reportlogo,$ypos);

		$ypos -= $oneandhalflinebreak; // report suggest 8

	    pdf_setfont($pdf,$this->fontbold,10);
	    pdf_show_xy($pdf,"Exam Code ".$examcode,$xpos_for_reportlogo,$ypos);
		//pdf_show_xy($pdf,"Duration 40 mins",$xpos_for_reportlogo,$ypos);
		//pdf_show_xy($pdf,"| Examcode ".$examcode,$xpos_for_reportlogo+110,$ypos);

		$ypos -= 8; // report suggest 8

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

		$ypos -= 2*$oneandhalflinebreak; // report suggets 15

		$testNamefontsize = 15;

		if(strlen($ExamCodeInfo[$examcode]['testname']) > 173)
			$testNamefontsize = 12;

		$resscname = pdf_add_textflow($pdf,0,$this->common_pdf_junk_replace($ExamCodeInfo[$examcode]['testname']),"fontname=$this->fontnamebold fontsize=$testNamefontsize encoding=unicode alignment=justify leading=100%");
		pdf_fit_textflow($pdf,$resscname,$xpos_for_reportlogo,$ypos,$this->page_width-$this->right_margin,410,"");
		pdf_delete_textflow($pdf,$resscname);

		//pdf_show_xy($pdf,$ExamCodeInfo[$examcode]['testname'], $xpos_for_reportlogo, $ypos);

		$ypos -= 3*$doublelinebreak + $doublelinebreak; // report suggest 70

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $doublelinebreak;

	    /*$schoolqry = "SELECT schoolname FROM schools WHERE schoolno = '".$ExamCodeInfo[$examcode]["schoolcode"]."'";
        $dbschqry = new dbquery($schoolqry,$connid);
        $schoolinfo = $dbschqry->getrowarray();*/
	    ####################################################
	    
	    pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"SCHOOL", $xpos_for_reportlogo, $ypos);
		pdf_setfont($pdf,$this->font,$this->fontsize);
		//pdf_show_xy($pdf,$schoolinfo['schoolname'],$xpos_for_reportlogo, $ypos-$singlelinebreak);

		# we dont have to display the school name for schools who requested taken in array exclude_schoolnames
	    if(!in_array($ExamCodeInfo[$examcode]["schoolcode"],$this->exclude_schoolnames)){
			$res = pdf_add_textflow($pdf,0,$schoolname,"fontname=$this->fontname fontsize=12 encoding=unicode alignment=left leading=100%");
			pdf_fit_textflow($pdf,$res,$xpos_for_reportlogo,$ypos,$this->page_width-$this->right_margin,400,"");
			pdf_delete_textflow($pdf,$res);
	    }

		$ypos -= 4*$doublelinebreak + $doublelinebreak;

		pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

	    pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"CLASS ".$ExamCodeInfo[$examcode]["class"],$xpos_for_reportlogo, $ypos);

		pdf_setlinewidth($pdf,0.1);
		pdf_setdashpattern($pdf,"");
		pdf_moveto($pdf,$xpos_for_reportlogo+125, $ypos + $singlelinebreak);
		pdf_lineto($pdf,$xpos_for_reportlogo+125, $ypos - $doublelinebreak - $oneandhalflinebreak);
	    pdf_stroke($pdf);


		pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"SECTION ".$ExamCodeInfo[$examcode]["section"],$xpos_for_reportlogo+130, $ypos);

		$ypos -= 2*$doublelinebreak;

		pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

		/*pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"TEACHER",$xpos_for_reportlogo, $ypos);*/
		
		## PRINTING TEACHER NAME PROCEDURE
		$teacherqry = "SELECT da_userMaster.first_name, da_userMaster.last_name, da_userMaster.email
					   FROM da_userMaster
					   LEFT JOIN da_userMapping ON da_userMaster.id = da_userMapping.user_id
					   WHERE da_userMapping.class = '".$ExamCodeInfo[$examcode]["class"]."'
					   AND da_userMapping.subject = '".$ExamCodeInfo[$examcode]["subject"]."'
					   AND da_userMapping.section = '".$ExamCodeInfo[$examcode]["section"]."'
					   AND da_userMaster.schoolCode = '".$ExamCodeInfo[$examcode]["schoolcode"]."'
					   ORDER BY da_userMaster.id ";
        $dbteachqry = new dbquery($teacherqry,$connid);
        if($ExamCodeInfo[$examcode]["subject"] != 3){
        	
        	$teacherrow = $dbteachqry->getrowarray();
        	if($teacherrow['first_name'] != "" && $teacherrow['last_name'] != "")
	    	$teachername = ucfirst(strtolower($teacherrow['first_name']))." ".ucfirst(strtolower($teacherrow['last_name']));
		    elseif($teacherrow['first_name'] != "")
		    	$teachername = ucfirst(strtolower($teacherrow['first_name']));
		    else
		    	$teachername = "";
			
		    if($teachername != ""){	
			    pdf_setfont($pdf,$this->fontbold,12);
				pdf_show_xy($pdf,"TEACHER",$xpos_for_reportlogo, $ypos);
				pdf_setfont($pdf,$this->font,$this->fontsize);
				pdf_show_xy($pdf,$teachername,$xpos_for_reportlogo, $ypos-$singlelinebreak);
		    }
		    $ypos -= 2*$doublelinebreak;
			
        } else {
        	
        	$showteacherlable = 0;	
        	while($teacherrow = $dbteachqry->getrowarray()){
        		$teachername = ucfirst(strtolower($teacherrow['first_name']))." ".ucfirst(strtolower($teacherrow['last_name']));
        		if($teachername != "" && $showteacherlable == 0){
        			pdf_setfont($pdf,$this->fontbold,12);
					pdf_show_xy($pdf,"TEACHER",$xpos_for_reportlogo, $ypos);
					$showteacherlable = 1;
        		}
        		pdf_setfont($pdf,$this->font,$this->fontsize);
				pdf_show_xy($pdf,$teachername,$xpos_for_reportlogo, $ypos-$singlelinebreak);
				$ypos -= $singlelinebreak;
        	}
        	$ypos -= $doublelinebreak;
        }

	    pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

		pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"STUDENTS PRESENT: ".$ExamCodeInfo[$examcode]['totalstudents'], $xpos_for_reportlogo, $ypos);

		$ypos -= $singlelinebreak;

		pdf_setdashpattern($pdf,"");
		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

		###################

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

		foreach($SectionSubtopicPerfo as $section => $topicwiseperformance){

			$max = constant("MIN_SUBTOPIC_PERFO");
			$worsttopiccriteriaper = constant("MIN_SUBTOPIC_PERFO"); // 60%

			$i=1;
	    	foreach($topicwiseperformance as $topic => $performance){
	    		if(is_numeric($performance)){

	    			if(count($reportingtopic_arr) != 1){ // For reporting head one , we dont have to show top performance
		    			if($performance > $max) {
			    			$sectionbesttopic = $topic;
			    			$max = $performance;
			    		}
	    			}
		    		if($performance < $worsttopiccriteriaper){
		    			$SectionWorstTopicArr[] = array("srno"=>$i,"topicid"=>$topic,"performance"=>$performance);
		    		}
	    		}
	    		$i++;
	    	}
		}

		$RecommendedTopics = "";
		# Process to sort out the topics for improvement
		if(is_array($SectionWorstTopicArr) && count($SectionWorstTopicArr) > 0){

			foreach ($SectionWorstTopicArr as $key => $arrayrow) {
			    $srno_arr[$key]  = $arrayrow['srno'];
			    $performance_arr[$key] = $arrayrow['performance'];
			}

			array_multisort($performance_arr, SORT_ASC, $srno_arr, SORT_ASC, $SectionWorstTopicArr);

			$worsttopicdispcnt = 0;
			foreach ($SectionWorstTopicArr as $key => $arrayrow) {
			    $worsttopicdispcnt++;
				$RecommendedTopics .= $reportingtopic_arr[$arrayrow["topicid"]]."~";
		    	if($worsttopicdispcnt == constant("STUD_MAX_WORST_TOPIC"))
		    	break;
			}
		}

		$BestPerfoTopic = "";
		if($sectionbesttopic != "")
			$BestPerfoTopic = $reportingtopic_arr[$sectionbesttopic];

		/*asort($SectionSubtopicPerfo[$examcode],SORT_NUMERIC);
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
		}*/


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
			$perfostring ="The class performance is ".round($higherthanother,2)."% higher than the all class average in this topic for your school.\n\n";
		}elseif($lowerthanother > 0){
			$perfostring ="The class performance is ".round($lowerthanother,2)."% below the all class average in this topic for your school.\n\n";
		}

		//$SectionPerfo = round($OverAllPerfo[$examcode]/$subtopiccount,2);
		########## end calculation for topic performance
		
		if($score_outof != 100 && $score_outof != ""){
			$SectionPerfo = number_format(round($SectionOverallPerfo,1),1);
			$SectionMinPerfo = number_format(round($SectionMinMaxPerfo[$examcode]["MIN"],1),1);
			$SectionMaxPerfo = number_format(round($SectionMinMaxPerfo[$examcode]["MAX"],1),1);
		}	
		else {
			# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
			//$ExamCodeInfo[$examcode]["schoolcode"] == 2528032 || 
	    	if($ExamCodeInfo[$examcode]["schoolcode"] == 24668){
	    		$SectionPerfo = $this->ConvertPerfoIntoGrade($SectionOverallPerfo);
	    		$SectionMinPerfo = $this->ConvertPerfoIntoGrade($SectionMinMaxPerfo[$examcode]["MIN"]);
				$SectionMaxPerfo = $this->ConvertPerfoIntoGrade($SectionMinMaxPerfo[$examcode]["MAX"]);
	    	}else {
	    		$SectionPerfo = round($SectionOverallPerfo)."%";
	    		$SectionMinPerfo = round($SectionMinMaxPerfo[$examcode]["MIN"])."%";
				$SectionMaxPerfo = round($SectionMinMaxPerfo[$examcode]["MAX"])."%";
	    	}
		}
		$ypos -= 2* $doublelinebreak;
		
	    pdf_setfont($pdf,$this->fontbold,$this->fontsize-1);
	    pdf_show_xy($pdf,"Class Average: ".$SectionPerfo, $xpos_for_reportlogo, $ypos);
	   
		//pdf_show_xy($pdf,"YOUR CLASS PERFORMANCE IN THIS TEST: ".$SectionPerfo, $xpos_for_reportlogo, $ypos);
		//pdf_fit_textline($pdf,round($SectionPerfo)."%",$this->page_width - $this->right_margin,$ypos+7,"position={right top}"); # as first it was right align now its beside the lable
			
		$ypos -= 2*$singlelinebreak;
		
		pdf_setfont($pdf,$this->fontbold,$this->fontsize-1);
		pdf_show_xy($pdf,"Class Range: ".$SectionMinPerfo." - ".$SectionMaxPerfo, $xpos_for_reportlogo, $ypos);
		
		$ypos -= 2*$singlelinebreak;	    	

		if($score_outof != 100 && $score_outof != "" && $score_outof != 0){
			pdf_setfont($pdf,$this->font,$this->fontsize-1);
			pdf_show_xy($pdf,"(Scores are scaled to $score_outof)", $xpos_for_reportlogo, $ypos);
			$ypos -= 2*$singlelinebreak;
		}
		
		$fontsize = $this->fontsize-1;
		$macro = "<macro {H1 {fontname=$this->fontnamebold fontsize=$fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$fontsize encoding=unicode}}><&Body>";

		if($BestPerfoTopic != "")
			$textright = "<&H1>Best Performed Area:\n<&H1>- <&Body>".$BestPerfoTopic;
			//$textright = "<&H1>BEST PERFORMANCE IS IN SUBTOPIC\n<&H1>*<&Body>".$BestPerfoTopic;

		if($RecommendedTopics != ""){

			if(is_array($SectionWorstTopicArr) && count($SectionWorstTopicArr) > 1)
				$subtopiccounttext = "TOP TWO SUBTOPICS";
			else
				$subtopiccounttext = "TOP SUBTOPIC";

			//$textright .= "\n\n<&H1>$subtopiccounttext RECOMMENDED FOR REMEDIATION\n<&H1>* <&Body>".str_replace("~","\n<&H1>* <&Body>",rtrim($RecommendedTopics,"~"));
			$textright .= "\n\n<&H1>Areas Recommended for Remediation:\n\n<&H1>- <&Body>".str_replace("~","\n<&H1>- <&Body>",rtrim($RecommendedTopics,"~"));
		}

		#$nooflines2 = ceil(pdf_stringwidth($pdf,$perfostring.$textright,$this->font,$fontsize)/(($this->page_width-$this->left_margin-$this->right_margin)/2)); // commented on 01-06-2011 as per muntaquim instructions
		$nooflines2 = ceil(pdf_stringwidth($pdf,$textright,$this->font,$fontsize)/(($this->page_width-$this->left_margin-$this->right_margin)/2));

		$expected_height = $nooflines2 * 12;
		//$textflow2 = PDF_create_textflow($pdf, $macro.$perfostring.$textright, "fontname=$this->fontname fontsize=$fontsize encoding=winansi leading=100%"); // as we dont have to display section comp
   		$textflow2 = PDF_create_textflow($pdf, $macro.$textright, "fontname=$this->fontname fontsize=$fontsize encoding=winansi leading=100%");
			do {
				$result = PDF_fit_textflow($pdf, $textflow2,$xpos_for_reportlogo,$ypos,$this->page_width - $this->right_margin,$expected_height,"");
			} while (strcmp($result, "_stop"));

		PDF_delete_textflow($pdf, $textflow2);

		########################
	    pdf_end_page($pdf);
	}

	function CreateFirstPageOfStudentReport($pdf,$examcode,$subjectid,$testdate,$testName,$studentid,$studentinfo,$studentPerfoSubtopicWiseArr,$classperfo,$reportingtopic_arr,$SectionOverallPerfo,$questionSeq,$score_outof,$connid,$classHighestVal){

		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		$doublelinebreak = 20;

		$top_margin = 38;
		$imagefactor = 0.485;
		
        $headerimage = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."DA_logo.jpg", "");
		$reportlogo = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."report.jpg", "");
		
		if($subjectid != 100) {
			$subjectlogo = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."sub_$subjectid.jpg", "");
			$subject_image_width = pdf_get_value($pdf, "IMAGEWIDTH", $subjectlogo);
			$subject_image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $subjectlogo);
		}
		
		$image_width = pdf_get_value($pdf, "IMAGEWIDTH", $headerimage);
		$image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $headerimage);
		$reportlogo_image_width = pdf_get_value($pdf, "IMAGEWIDTH", $reportlogo);
		$reportlogo_image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $reportlogo);
		
		$yposfor_da_logo = $this->page_height - $top_margin - 62;
        $yposfor_rightside_logos = $this->page_height - $top_margin - 77;

		pdf_begin_page($pdf, $this->page_width, $this->page_height);
		$this->pageno++;
		$this->addpagenumber($pdf,$this->pageno);

		pdf_fit_image($pdf,$headerimage, $this->left_margin, $yposfor_da_logo, "scale=0.5");

		$xpos_for_reportlogo = $this->page_width - $this->right_margin - 228;

		pdf_fit_image($pdf,$reportlogo, $xpos_for_reportlogo, $yposfor_rightside_logos, "scale=1");

		if($subjectid != 100){
			$xpos_sub_logo = $this->page_width - $this->right_margin - ($subject_image_width*$imagefactor);
			pdf_fit_image($pdf,$subjectlogo, $xpos_sub_logo, $yposfor_rightside_logos, "scale=1");
		}

		$ypos = $yposfor_rightside_logos - 14;

		pdf_setfont($pdf,$this->fontbold,20);
		pdf_show_xy($pdf,"STUDENT", $xpos_for_reportlogo+($reportlogo_image_width * $imagefactor)+2,$this->page_height - $top_margin - 40);
		pdf_show_xy($pdf,"REPORT",$xpos_for_reportlogo+($reportlogo_image_width * $imagefactor)+2,$this->page_height - $top_margin - 65);

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak; // report suggest 8

	    pdf_setfont($pdf,$this->fontbold,12);

	    $date=explode("-",$testdate);
		$year=$date[2];
		$month=$date[1];
		$day=$date[0];
		$newDate=date("j F Y", mktime(0, 0, 0, $month, $day, $year));

		pdf_show_xy($pdf,$newDate,$xpos_for_reportlogo,$ypos);

		$ypos -= $oneandhalflinebreak; // report suggest 8

	    pdf_setfont($pdf,$this->fontbold,10);
	    pdf_show_xy($pdf,"Exam Code ".$examcode.$studentinfo["paperversion"],$xpos_for_reportlogo,$ypos);
		//pdf_show_xy($pdf,"Duration 40 mins",$xpos_for_reportlogo,$ypos);
		//pdf_show_xy($pdf,"| Examcode ".$examcode.$studentinfo["paperversion"],$xpos_for_reportlogo+110,$ypos);

		$ypos -= 8; // report suggest 8

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

		//$ypos -= 2*$oneandhalflinebreak; // report suggets 15
	    $ypos -= $oneandhalflinebreak;
	    $testNamefontsize = 15;

	    if(strlen($testName) > 173)
	    	$testNamefontsize = 12;

		$resscname = pdf_add_textflow($pdf,0,$this->common_pdf_junk_replace($testName),"fontname=$this->fontnamebold fontsize=$testNamefontsize encoding=unicode alignment=justify leading=100%");
		pdf_fit_textflow($pdf,$resscname,$xpos_for_reportlogo,$ypos,$this->page_width-$this->right_margin,410,"");
		pdf_delete_textflow($pdf,$resscname);

		//pdf_setfont($pdf,$this->font,24);
		//pdf_show_xy($pdf,$testName, $xpos_for_reportlogo, $ypos);

		$ypos -= 3*$doublelinebreak + $doublelinebreak; // report suggest 70

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $doublelinebreak;

	    ####################################################

	    pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"SCHOOL", $xpos_for_reportlogo, $ypos);

		pdf_setfont($pdf,$this->font,12);
		//pdf_show_xy($pdf,$schoolinfo['schoolname'],$xpos_for_reportlogo, $ypos-$singlelinebreak);

		# we dont have to display the school name for schools who requested taken in array exclude_schoolnames
	    if(!in_array($studentinfo["schoolcode"],$this->exclude_schoolnames)){
			$res = pdf_add_textflow($pdf,0,$studentinfo["schoolname"],"fontname=$this->fontname fontsize=12 encoding=unicode alignment=left leading=120%");
			pdf_fit_textflow($pdf,$res,$xpos_for_reportlogo,$ypos,$this->page_width-$this->right_margin,400,"");
			pdf_delete_textflow($pdf,$res);
	    }

		$ypos -= 4*$doublelinebreak + $doublelinebreak;

		pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

	    pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"CLASS ".$studentinfo["class"],$xpos_for_reportlogo, $ypos);

		pdf_setlinewidth($pdf,0.1);
		pdf_setdashpattern($pdf,"");
		pdf_moveto($pdf,$xpos_for_reportlogo+125, $ypos + $singlelinebreak);
		pdf_lineto($pdf,$xpos_for_reportlogo+125, $ypos - $doublelinebreak - $oneandhalflinebreak);
	    pdf_stroke($pdf);


		pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"SECTION ".$studentinfo["section"],$xpos_for_reportlogo+130, $ypos);

		$ypos -= 2*$doublelinebreak;

		pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

		pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"STUDENT",$xpos_for_reportlogo, $ypos);

		$studentname = "Student";
	    if(isset($studentinfo["studentname"]) && $studentinfo["studentname"] != "")
	    	$studentname = $this->common_pdf_junk_replace($this->GetOperatedString($studentinfo["studentname"]));

		pdf_setfont($pdf,$this->font,$this->fontsize);
		pdf_show_xy($pdf,$studentname,$xpos_for_reportlogo, $ypos-$singlelinebreak);


	    $ypos -= 2*$doublelinebreak;

	    pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

		pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"ROLL NO. ".$studentinfo["rollno"], $xpos_for_reportlogo, $ypos);

		$ypos -= $singlelinebreak;

		pdf_setdashpattern($pdf,"");
		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

		###################
		$StudentTotalPerfo =0;
		$StudentWorstTopicArr = array();
		$studentworsttopicstr = "";
		$studentbesttopic = "";

		foreach($studentPerfoSubtopicWiseArr as $studentid => $topicwiseperformance){
		    $topiccount =0;
			$max = constant("MIN_SUBTOPIC_PERFO");
			$worsttopiccriteriaper = constant("MIN_SUBTOPIC_PERFO"); // 67%

			$i=1;
	    	foreach($topicwiseperformance as $topic => $performance){
	    		if(is_numeric($performance)){
	    			$StudentTotalPerfo += $performance;

	    			if(count($reportingtopic_arr) != 1){ // For only one reporting head we dont need to show top performance
		    			if($performance > $max && $performance >= constant("MIN_SUBTOPIC_PERFO")) {
			    			$studentbesttopic = $topic;
			    			$max = $performance;
			    		}
	    			}
		    		if($performance < constant("MIN_SUBTOPIC_PERFO")){
		    			$StudentWorstTopicArr[] = array("srno"=>$i,"topicid"=>$topic,"performance"=>$performance);
		    		}
		    		$topiccount++;
	    		}
	    		$i++;
	    	}
		}

		# Process to sort out the topics for improvement

		if(is_array($StudentWorstTopicArr) && count($StudentWorstTopicArr) > 0){

			foreach ($StudentWorstTopicArr as $key => $arrayrow) {
			    $srno_arr[$key]  = $arrayrow['srno'];
			    $performance_arr[$key] = $arrayrow['performance'];
			}

			array_multisort($performance_arr, SORT_ASC, $srno_arr, SORT_ASC, $StudentWorstTopicArr);

			$worsttopicdispcnt = 0;
			foreach ($StudentWorstTopicArr as $key => $arrayrow) {
			    $worsttopicdispcnt++;
				$studentworsttopicstr .= $reportingtopic_arr[$arrayrow["topicid"]]." & ";
		    	if($worsttopicdispcnt == constant("STUD_MAX_WORST_TOPIC"))
		    	break;
			}
		}

	    if($score_outof == 0 && $score_outof != "")
	    	$StudentAvgPerfo = round($studentinfo["totalcorrectanswer"],1);
	    elseif($score_outof > 0 && $score_outof < 100)
	    	$StudentAvgPerfo = round((($studentinfo["totalcorrectanswer"]/count($questionSeq[1]))*$score_outof),1);
	    else {
	    	# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
	    	//$studentinfo['schoolcode'] == 2528032 || 
	    	if($studentinfo['schoolcode'] == 24668){
	    		$StudentAvgPerfo = round((($studentinfo["totalcorrectanswer"]/count($questionSeq[1]))*100));
	    		$StudentAvgPerfo = $this->ConvertPerfoIntoGrade($StudentAvgPerfo);	
	    	}else {
	    		$StudentAvgPerfo = round((($studentinfo["totalcorrectanswer"]/count($questionSeq[1]))*100))."%";
	    	}
	    }	
	    	
	    

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

	    //$SectionAvgPerfo = round($SectionTotalPerfo/$topiccount);
	    //$SectionAvgPerfo = $SectionOverallPerfo;
	    ########## end calculation for topic performance
		if($score_outof != 100 && $score_outof != "")
			$SectionAvgPerfo = round($SectionOverallPerfo,1);
		else {
			# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
			//$studentinfo['schoolcode'] == 2528032 || 
	    	if($studentinfo['schoolcode'] == 24668){
	    		$SectionOverallPerfo =round($$SectionOverallPerfo);
	    		$SectionAvgPerfo = $this->ConvertPerfoIntoGrade($SectionOverallPerfo);	
	    	} else {	
				$SectionAvgPerfo = round($SectionOverallPerfo)."%";
	    	}	
		}	

		// Class Highest calculation
		if($score_outof != 100 && $score_outof != "")
			$classHighestVal = round($classHighestVal,1);
		else {
			# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
			//$studentinfo['schoolcode'] == 2528032 || 
	    	if($studentinfo['schoolcode'] == 24668){
	    		$classHighestVal =round($classHighestVal);
	    		$classHighestVal = $this->ConvertPerfoIntoGrade($classHighestVal);	
	    	} else {	
				$classHighestVal = round($classHighestVal)."%";
	    	}	
		}	
		// End Class highest calculation

		$ypos -= 2* $doublelinebreak;
		# we dont have to display below line as per nitesh request for Heritag School Gurgaon
	    if($studentinfo["schoolcode"] != 60414 && $studentinfo["schoolcode"] != 2462519){
			pdf_setfont($pdf,$this->fontbold,$this->fontsize);
			//pdf_show_xy($pdf,"Your Performance: ".round($StudentAvgPerfo,1), $xpos_for_reportlogo, $ypos);
			pdf_show_xy($pdf,"Your Performance: ".$StudentAvgPerfo, $xpos_for_reportlogo, $ypos);
			//pdf_show_xy($pdf,"YOUR PERFORMANCE IN THE TEST: ".$StudentAvgPerfo, $xpos_for_reportlogo, $ypos);
			//pdf_fit_textline($pdf,round($StudentAvgPerfo)."%",$this->page_width - $this->right_margin,$ypos+7,"position={right top}");
	    }
		$ypos -= $singlelinebreak;

		$fontsize = $this->fontsize;

		$macrocontent ="<macro {H1 {fontname=$this->fontnamebold fontsize=$this->fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$this->fontsize encoding=winansi}}>";

	    $subtopicrecommend = "";
	    if(rtrim($studentworsttopicstr," & ") != ""){

	    	if(count($StudentWorstTopicArr) > 1)
	    		$topicshead = "TWO SUB TOPICS";
	    	else
	    		$topicshead = "SUB TOPIC";
	    	//$subtopicrecommend = "\n\n<&H1>$topicshead RECOMMENDED FOR IMPROVEMENT\n<&Body>* ".str_replace("&","\n*",rtrim($studentworsttopicstr," & ")).".\n\n";
	    	$subtopicrecommend = "\n\n<&H1>Areas for Improvement:\n<&Body>- ".str_replace("&","\n-",rtrim($studentworsttopicstr," & "))."\n\n";
	    	
	    }

	    # we dont have to display the class avg line as per deblina mail Dt:2012-07-13
	    $thetext = "";
	    if($studentinfo["schoolcode"] != 60414 && $studentinfo["schoolcode"] != 395483 && $studentinfo["schoolcode"] != 24374 && $studentinfo["schoolcode"] != 2462519){
	    	//$thetext ="The class average performance in this topic is ".$SectionAvgPerfo;
	    	//$thetext ="Class Average: ".round($SectionAvgPerfo,1);
	    	$thetext ="Class Average*: ".$SectionAvgPerfo;
	    	$thetext .="\nClass Highest*: ".$classHighestVal;
	    }
	    if($score_outof != 100 && $score_outof != "" && $score_outof != 0){
	    	$thetext .="\n\n(Scores are scaled to $score_outof)";
	    }
	    
	    if($studentbesttopic != "")
	    	$thetext .="\n\n<&H1>Best Performed Area:\n<&Body>- ".$reportingtopic_arr[$studentbesttopic]; 
	    	//$thetext .="\n\n<&H1>BEST PERFORMANCE IS IN SUBTOPIC \n<&Body>".$reportingtopic_arr[$studentbesttopic];

	    if($subtopicrecommend != "")
	    	$thetext .= $subtopicrecommend;

		$nooflines2 = ceil(pdf_stringwidth($pdf,$thetext,$this->font,$fontsize)/($this->page_width-$this->left_margin-$this->right_margin));

		$expected_height = $nooflines2 * 12;

   		$textflow2 = PDF_create_textflow($pdf, $macrocontent.$thetext, "fontname=$this->fontname fontsize=$fontsize encoding=winansi leading=100%");
			do {
				$result = PDF_fit_textflow($pdf, $textflow2,$xpos_for_reportlogo,$ypos,$this->page_width - $this->right_margin,$expected_height,"");
			} while (strcmp($result, "_stop"));

		PDF_delete_textflow($pdf, $textflow2);

		// Naveen added note at the end
		if($studentinfo["schoolcode"] != 60414 && $studentinfo["schoolcode"] != 395483 && $studentinfo["schoolcode"] != 24374 && $studentinfo["schoolcode"] != 2462519){
			$note ="*The class performance details displayed above represent that of all students present at the first conduction of the test.";
			$note2 ="Scores of absentees, taking the test at a later date, may not be included.";

			pdf_setfont($pdf, $this->fontitalic, $this->fontsize-2);
			pdf_fit_textline ($pdf,$note,$this->left_margin, $this->bottom_margin+40,"position={left top}");
			$ypos = $this->bottom_margin+40 -$singlelinebreak;
			pdf_fit_textline ($pdf,$note2,$this->left_margin,$ypos,"position={left top}");
		}
		// end of note

		########################
	    pdf_end_page($pdf);
	}

	function CreateFirstPageOfSchoolReport($pdf,$schoolcode,$subject,$class,$testDate,$testName,$totalStudentsCnt,$section_str,$SubTopicWisePerfoArr,$reportingtopic_arr,$request_arr,$request_id,$score_outof,$SectionOverallPerfo,$GenFlag,$connid){

		$expirynotes = "";
		
		# Extracting expired exam codes and we need to generate the school report.
		if($GenFlag == "F"){
			
			$PendingSections = array();
			$ExamcodePending = array();
			
			$query = "SELECT exam_code,section FROM da_examDetails
					  LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
					  WHERE request_id = '".$request_id."' 
					  AND report_status = 'pending' AND report_date = '0000-00-00'
					  AND expired_status = 1
					  AND DATEDIFF(CURDATE(),da_testRequest.test_date) > 21";
			$dbqry = new dbquery($query,$connid);
			while($result = $dbqry->getrowarray()){
				$PendingSections[$result["exam_code"]] = $result["section"];
			}
			$ExamcodePending = array_diff($PendingSections,$SectionOverallPerfo);
			$expirynotes = "Text expired for section ".implode(",",$ExamcodePending)." due to non-conduction of test.";
		}
		
		$singlelinebreak = 10;
		$oneandhalflinebreak = 15;
		$doublelinebreak = 20;

		$top_margin = 38;
		$imagefactor = 0.485;

        $headerimage = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."DA_logo.jpg", "");
		$reportlogo = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."report.jpg", "");
		
		if($subject != 100) {
			$subjectlogo = pdf_load_image($pdf,"jpeg", constant("PATH_REPORTIMAGES")."sub_$subject.jpg", "");
			$subject_image_width = pdf_get_value($pdf, "IMAGEWIDTH", $subjectlogo);
			$subject_image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $subjectlogo);
		}
		
		$image_width = pdf_get_value($pdf, "IMAGEWIDTH", $headerimage);
		$image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $headerimage);
		$reportlogo_image_width = pdf_get_value($pdf, "IMAGEWIDTH", $reportlogo);
		$reportlogo_image_height = pdf_get_value($pdf, "IMAGEHEIGHT", $reportlogo);
		


		$yposfor_da_logo = $this->page_height - $top_margin - 62;
        $yposfor_rightside_logos = $this->page_height - $top_margin - 77;

		pdf_begin_page($pdf, $this->page_width, $this->page_height);

		$this->pageno++;
		$this->addpagenumber($pdf,$this->pageno);

		pdf_fit_image($pdf,$headerimage, $this->left_margin, $yposfor_da_logo, "scale=0.5");

		$xpos_for_reportlogo = $this->page_width - $this->right_margin - 228;
		
		pdf_fit_image($pdf,$reportlogo, $xpos_for_reportlogo, $yposfor_rightside_logos, "scale=1");
		
		if($subject != 100) {
			$xpos_sub_logo = $this->page_width - $this->right_margin - ($subject_image_width*$imagefactor);
			pdf_fit_image($pdf,$subjectlogo, $xpos_sub_logo, $yposfor_rightside_logos, "scale=1");
		}

		$ypos = $yposfor_rightside_logos - 14;

		pdf_setfont($pdf,$this->fontbold,22);
		pdf_show_xy($pdf,"SCHOOL", $xpos_for_reportlogo+($reportlogo_image_width * $imagefactor)+2,$this->page_height - $top_margin - 40);
		pdf_show_xy($pdf,"REPORT",$xpos_for_reportlogo+($reportlogo_image_width * $imagefactor)+2,$this->page_height - $top_margin - 65);

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak; // report suggest 8

	    pdf_setfont($pdf,$this->fontbold,12);

	    $date=explode("-",$testDate);
		$year=$date[2];
		$month=$date[1];
		$day=$date[0];
		$newDate=date("j F Y", mktime(0, 0, 0, $month, $day, $year));

		pdf_show_xy($pdf,$newDate,$xpos_for_reportlogo,$ypos);

		$ypos -= $oneandhalflinebreak; // report suggest 8

	    pdf_setfont($pdf,$this->fontbold,10);
		//pdf_show_xy($pdf,"Duration 40 mins",$xpos_for_reportlogo,$ypos);
		//pdf_show_xy($pdf,"| Examcode ".$examcode,$xpos_for_reportlogo+110,$ypos);

		$ypos -= 8; // report suggest 8

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

		//$ypos -= 2*$oneandhalflinebreak; // report suggets 15
		$ypos -= $oneandhalflinebreak; // report suggets 15

		$testNamefontsize = 15;

	    if(strlen($testName) > 173)
	    	$testNamefontsize = 12;

		$resscname = pdf_add_textflow($pdf,0,$this->common_pdf_junk_replace($testName),"fontname=$this->fontnamebold fontsize=$testNamefontsize encoding=unicode alignment=justify leading=100%");
		pdf_fit_textflow($pdf,$resscname,$xpos_for_reportlogo,$ypos,$this->page_width-$this->right_margin,410,"");
		pdf_delete_textflow($pdf,$resscname);

		/*pdf_setfont($pdf,$this->font,24);
		pdf_show_xy($pdf,$testName, $xpos_for_reportlogo, $ypos);*/

		$ypos -= 3*$doublelinebreak + $doublelinebreak; // report suggest 70

		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $doublelinebreak;

	    $schoolqry = "SELECT schoolname FROM schools WHERE schoolno = '".$schoolcode."'";
        $dbschqry = new dbquery($schoolqry,$connid);
        $schoolinfo = $dbschqry->getrowarray();

        $schoolname =$this->schoolNameCorrection($schoolinfo["schoolname"]);

	    ####################################################

	    pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"SCHOOL", $xpos_for_reportlogo, $ypos);

		pdf_setfont($pdf,$this->font,$this->fontsize);
		//pdf_show_xy($pdf,$schoolinfo['schoolname'],$xpos_for_reportlogo, $ypos-$singlelinebreak);

		# we dont have to display the school name for schools who requested taken in array exclude_schoolnames
	    if(!in_array($schoolcode,$this->exclude_schoolnames)) {
			$res = pdf_add_textflow($pdf,0,$schoolname,"fontname=$this->fontname fontsize=12 encoding=unicode alignment=left leading=100%");
			pdf_fit_textflow($pdf,$res,$xpos_for_reportlogo,$ypos,$this->page_width-$this->right_margin,400,"");
			pdf_delete_textflow($pdf,$res);
		}

		$ypos -= 4*$doublelinebreak + $doublelinebreak;

		pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

	    pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"CLASS ".$class,$xpos_for_reportlogo, $ypos);

		pdf_setlinewidth($pdf,0.1);
		pdf_setdashpattern($pdf,"");
		pdf_moveto($pdf,$xpos_for_reportlogo+95, $ypos + $singlelinebreak);
		pdf_lineto($pdf,$xpos_for_reportlogo+95, $ypos - $doublelinebreak - $oneandhalflinebreak);
	    pdf_stroke($pdf);
		
	    /*$totSections = 0;
		$totSections = explode(",",$section_str);
		 
		if(count($totSections) <= 7) {
			
			pdf_setfont($pdf,$this->fontbold,12);
			pdf_show_xy($pdf,"SECTION ".rtrim($section_str,","),$xpos_for_reportlogo+100, $ypos);
			
		} else {
			
			pdf_setfont($pdf,$this->fontbold,12);
			pdf_show_xy($pdf,"SECTION ",$xpos_for_reportlogo+100, $ypos);
			$ypos -= $singlelinebreak;
			pdf_setfont($pdf,$this->fontbold,8);
			pdf_show_xy($pdf,rtrim($section_str,","),$xpos_for_reportlogo+100, $ypos);
			$ypos += $singlelinebreak;
		}*/

		$ypos -= 2*$doublelinebreak;

		pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

		/*pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"TEACHER",$xpos_for_reportlogo, $ypos);

		pdf_setfont($pdf,$this->font,$this->fontsize);
		pdf_show_xy($pdf,$teachername,$xpos_for_reportlogo, $ypos-$singlelinebreak);*/

	    $ypos -= 2*$doublelinebreak;

	    pdf_setlinewidth($pdf,1.0);
		pdf_setdashpattern($pdf,"dasharray={2 2}");
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

	    $ypos -= $oneandhalflinebreak;

		pdf_setfont($pdf,$this->fontbold,12);
		pdf_show_xy($pdf,"No. of Test Takers: ".$totalStudentsCnt, $xpos_for_reportlogo, $ypos);

		$ypos -= $singlelinebreak;

		pdf_setdashpattern($pdf,"");
		pdf_setlinewidth($pdf,3.0);
		pdf_moveto($pdf,$xpos_for_reportlogo, $ypos);
		pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
	    pdf_stroke($pdf);

		###################


	    ##### calculations for topic performamce
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
			$RecommendedTopics .= $reportingtopic_arr[$reporting_id]." ~ ";
			if($noofrecm == 2) break;
		}

		# previousaly calculation of highest and lowest score on base of section preformace is commented
		# now we are considering the overall perfomance for the same. Dt: 03-07-2011
		/*arsort($SectionAvgPerfo,SORT_NUMERIC);
		list($higherSection, $higherSecAvg) = each($SectionAvgPerfo);

		if($higherSection == "ALL")
			list($higherSection, $higherSecAvg) = each($SectionAvgPerfo);


		asort($SectionAvgPerfo,SORT_NUMERIC);
		list($lowersection, $lowerSecAvg) = each($SectionAvgPerfo);

		if($lowersection == "ALL")
			list($lowersection, $lowerSecAvg) = each($SectionAvgPerfo);

		$highestSecPerfo = round($higherSecAvg/$subtopiccount,2);
		$lowestSecPerfo = round($lowerSecAvg/$subtopiccount,2);
		$AllSecAvgPerfo = round($SectionAvgPerfo[ALL]/$subtopiccount,2);*/
		########## end calculation for topic performance
		
		# Calculation of highest and lowest on the basis of overall performance
		arsort($SectionOverallPerfo,SORT_NUMERIC);
		list($higherSection, $higherSecAvg) = each($SectionOverallPerfo);

		if($higherSection == "ALL")
			list($higherSection, $higherSecAvg) = each($SectionOverallPerfo);

		asort($SectionOverallPerfo,SORT_NUMERIC);
		list($lowersection, $lowerSecAvg) = each($SectionOverallPerfo);

		if($lowersection == "ALL")
			list($lowersection, $lowerSecAvg) = each($SectionOverallPerfo);

			
		
		$score_scalling = "";
		if($score_outof != 100 && $score_outof != ""){
			$highestSecPerfo = round($higherSecAvg,1);
			$lowestSecPerfo = round($lowerSecAvg,1);
			$AllSecAvgPerfo = round($SectionOverallPerfo['ALL'],1);
			$score_scalling = "\n\n(Scores are scaled to $score_outof)";
		}else{
			# converting percentage into grade as per Task id : 0000778 - for Lilavati poddar schools
			//$schoolcode == 2528032 || 
			if($schoolcode == 24668){
				$highestSecPerfo = $this->ConvertPerfoIntoGrade($higherSecAvg);
				$lowestSecPerfo = $this->ConvertPerfoIntoGrade($lowerSecAvg);
				$AllSecAvgPerfo = $this->ConvertPerfoIntoGrade($SectionOverallPerfo['ALL']);
    		}else {
    			$highestSecPerfo = round($higherSecAvg)."%";
				$lowestSecPerfo = round($lowerSecAvg)."%";
				$AllSecAvgPerfo = round($SectionOverallPerfo['ALL'])."%";
    		}
		}
		# end of calculation
		
		$section_perfo_str = "";
		if(is_array($request_arr[$request_id]) && count($request_arr[$request_id]) > 1){
			$section_perfo_str = "Class Average (across sections): ".$AllSecAvgPerfo."\n\nHighest Performance: ".$class.$request_arr[$request_id][$higherSection]." (".$highestSecPerfo.")\n\n"."Lowest Performance: ".$class.$request_arr[$request_id][$lowersection]." (".$lowestSecPerfo.")";
		}else{
			$section_perfo_str = "Class Average: ".$AllSecAvgPerfo."";	
		}
			
		$ypos -= 2* $doublelinebreak;

	    /*
	    pdf_setfont($pdf,$this->fontbold,9);
		pdf_show_xy($pdf,"TOPIC PERFORMANCE OF YOUR CLASS:", $xpos_for_reportlogo, $ypos);
		pdf_fit_textline($pdf,round($SectionPerfo)."%",$this->page_width - $this->right_margin,$ypos+7,"position={right top}");

		$ypos -= $singlelinebreak;
		*/

		$fontsize = $this->fontsize;

		$macro = "<macro {H1 {fontname=$this->fontnamebold fontsize=$fontsize encoding=unicode} Body {fontname=$this->fontname fontsize=$fontsize encoding=unicode}}><&Body>";
		/*$summarytext = "The topic test on ".$this->common_pdf_junk_replace($testName)." was taken by sections ".rtrim($section_str,",")." of class ".$class.". The average performance across all sections is $AllSecAvgPerfo, with section ".$request_arr[$request_id][$higherSection]."".
					   " scoring the highest average at $highestSecPerfo and section ".$request_arr[$request_id][$lowersection]." scoring the lowest at $lowestSecPerfo\n\n<&H1>BEST PERFORMANCE IS IN SUBTOPIC\n<&Body>".
					   "$BestPerfoTopic.\n\n<&H1>TOP TWO SUBTOPICS WITH THE LEAST AVERAGE SCORES\n* <&Body>".str_replace("~","\n*",rtrim($RecommendedTopics," ~ "));
		*/
		if($GenFlag == "F" && $expirynotes != ""){
			$summarytext = "<&H1>".$section_perfo_str.
				       	   "<&Body>".$score_scalling."<&H1>\n\n".$expirynotes."\n\nBest Performed Area:\n\n<&Body>- ".$BestPerfoTopic."\n\n<&H1>Areas Recommended for Remediation:\n\n<&Body>- ".str_replace("~","\n-",rtrim($RecommendedTopics," ~ "));
		}else {
			$summarytext = "<&H1>".$section_perfo_str.
				           "<&Body>".$score_scalling."<&H1>\n\nBest Performed Area:\n\n<&Body>- ".$BestPerfoTopic."\n\n<&H1>Areas Recommended for Remediation:\n\n<&Body>- ".str_replace("~","\n-",rtrim($RecommendedTopics," ~ "));
		}
		
		$nooflinessummary = ceil(pdf_stringwidth($pdf,$summarytext,$this->font,$this->fontsize)/(($this->page_width-$this->left_margin-$this->right_margin)/2));

   		$textflow2 = PDF_create_textflow($pdf, $macro.$summarytext, "fontname=$this->fontname fontsize=$fontsize encoding=unicode leading=100%");
			do {
				$result = PDF_fit_textflow($pdf, $textflow2,$xpos_for_reportlogo,$ypos,$this->page_width - $this->right_margin,$expected_height,"");
			} while (strcmp($result, "_stop"));

		PDF_delete_textflow($pdf, $textflow2);

		########################
	    pdf_end_page($pdf);
	}

	function addpagenumber($pdf,$pageno)
	{
		pdf_setcolor($pdf, "fill", "rgb", 0, 0, 0, 1);
		pdf_setfont($pdf,$this->font,8);
		if($pageno>9)
			pdf_show_xy($pdf,$pageno,293,20);
		else
			pdf_show_xy($pdf,$pageno,295,20);
	}

	# common function for junk replacement
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

	function SendEmail($subjectno='',$schoolcode='',$examcode='',$toemail='',$message){

		if($message == "") return;

		$to = "";
		if($subjectno == 1)
			$to = constant("ENG_MAILTO");
		elseif($subjectno == 2)
			$to = constant("MATHS_MAILTO");
		elseif($subjectno == 3)
			$to = constant("SCI_MAILTO");

		if($toemail != "")
			$to .= ",".$toemail;

		$subject = 'DA - Exception Report';
		if($examcode != "")
			$subject .= ' - Examcode: '.$examcode;
		if($schoolcode != "")
			$subject .= ' - School Code: '.$schoolcode;

		$random_hash = md5(date('r', time()));

		$headers = "";
        $headers  = "From: Detailed Assessment<da@ei-india.com>\r\n";
	    $headers .= "Reply-To: da@ei-india.com\r\n";
	    $headers .= "Cc: ".constant("REPORT_INTIMATION_EMAILIDS")."\r\n";
		$headers .= "Bcc: sudhir.prajapati@ei-india.com \r\n";
	    $headers .= "Return-Path: da@ei-india.com\r\n";
	    $headers .= "X-Mailer: DA\n";
	    $headers .= 'MIME-Version: 1.0' . "\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        $mail_sent = @mail($to, $subject, $message, $headers );
	}
	
	function GenerateMisconceptionPDF($schoolcode=0,$condition="",$connid){
		
		if($schoolcode != 0){
			
			$this->pageno = 0;
			$linebreak = 14;
			$doublelinebreak = 20;
			$singlelinebreak = 10;
			$oneandhalflinebreak = 15;
			$leading = 120;
			$MisconceptionQuestions  = array();	

			$sch_query = "SELECT schoolname FROM schools where schoolno = ".$schoolcode;
			$sch_dbqry = new dbquery($sch_query,$connid);
			$sch_result = $sch_dbqry->getrowarray();
			$schoolname = $sch_result["schoolname"];
			$schoolname =$this->schoolNameCorrection($schoolname);
					
			$pdf = pdf_new();
	
			pdf_set_parameter($pdf, "license", constant("PDF_LICENCEKEY"));// For pdflib 7.0.2
			pdf_set_parameter($pdf, "textformat", "utf8");
			pdf_set_parameter($pdf, "charref", "true");
	
			$this->LoadpdfFont($pdf,$this->fontname);
			pdf_begin_document($pdf, constant("PATH_TEMP")."".$schoolcode.".pdf","");
			
			$main_query = "SELECT da_testRequest.id,da_testRequest.paper_code,da_testRequest.subject,da_testRequest.class,da_testRequest.testName,da_examDetails.exam_code,da_examDetails.section,
							 da_examDetails.miscon_qcode_list,da_examDetails.class_avg,da_examDetails.report_status,
							 da_examDetails.lowperform_qcode_list
						 FROM da_examDetails 
						 LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
						 WHERE da_testRequest.schoolCode = '".$schoolcode."'
						 AND da_examDetails.report_status = 'generated' $condition
						 AND da_examDetails.miscon_qcode_list != ''
						 ORDER BY da_testRequest.subject,da_testRequest.class";
			$main_dbqry = new dbquery($main_query,$connid);
			if($main_dbqry->numrows() > 0){
				
				while($main_result = $main_dbqry->getrowarray()){
					
					$class = $main_result["class"];
					$subject = $main_result["subject"];
					$section = $main_result["section"];
					$testName = $main_result["testName"];
					$miscon_qcode_list = $main_result["miscon_qcode_list"];
					$papercode = $main_result["paper_code"];
					
					# fetching the question sequence in paper
					$questionquery = "SELECT papercode,version,qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' ORDER BY papercode";
					$dbqueqry = new dbquery($questionquery,$connid);
					while($querow = $dbqueqry->getrowarray()){
						$paperwiseQueSeq[$querow['version']] = explode(',',$querow['qcode_list']);
					}
					
					$questionSeq = array();
					foreach($paperwiseQueSeq as $paper => $quesarray){
						$questionSeq[$paper] = array_flip($quesarray);
					}
					
					# need to check whether question version is available than need to use the data from da_questions_versions table
					$clsdaquestion = new clsdaquestion();
					$query2 = "SELECT qcode,correct_answer,lastModified FROM da_questions WHERE qcode IN($miscon_qcode_list)";
					$dbquery2 = new dbquery($query2,$connid);
					while($row2 = $dbquery2->getrowarray()){
			
						$QueTableResultArr = $clsdaquestion->GetQueTableAndVersion($connid,$row2["qcode"],$approved_date,$row2["lastModified"]);
						
						if($QueTableResultArr["tablename"] == "da_questions_versions"){
							$QueFromVersionTable[$row2["qcode"]] = $QueTableResultArr["version"];
							$MisconceptionQuestions[$row2["qcode"]] = $QueTableResultArr["correct_answer"];
						}	
						else{
							$MisconceptionQuestions[$row2["qcode"]] = $row2["correct_answer"];
						}
					}
								
					$QueFromVersionTable = array();
					pdf_begin_page($pdf, $this->page_width, $this->page_height);
					$this->WriteMisconPDFHeader($pdf,$schoolname,$this->common_pdf_junk_replace($testName),$subject,$class,$section);
					$this->pageno++;
					$this->addpagenumber($pdf,$this->pageno);
					$ypos = $this->page_height - $this->top_margin;
			
					pdf_setfont($pdf,$this->font,$this->fontsize-2);
					pdf_fit_textline ($pdf,"Notes: Question numbers are based on paper version 1 only.",$this->left_margin,$ypos,"position={left top}");
					$ypos -= $doublelinebreak;
				    pdf_setfont($pdf,$this->fontbold,$this->fontsize);
					pdf_show_xy($pdf,"Misconceptions",$this->left_margin,$ypos);
					$ypos -= $singlelinebreak;
					
					$i =0;
					foreach($MisconceptionQuestions as $qcode => $answers){
		
						if(array_key_exists($qcode,$QueFromVersionTable)){
							$QueTblName = "da_questions_versions";
							$Condition = " AND da_questions_versions.version = '".$QueFromVersionTable[$qcode]."'";
						}else{
							$QueTblName = "da_questions";
							$Condition = "";
						}
								
						$i++;
						$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,group_id,
										 $QueTblName.passage_id,qms_passage.passage_name
								  FROM $QueTblName
								  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
								  WHERE qcode = '".$qcode."' $Condition";
						 //AND misconception = 1
						$dbqry = new dbquery($query,$connid);
						$result = $dbqry->getrowarray();
						$mcexplanation = (isset($result['mcexplanation']) && $result['mcexplanation'] != 'NULL')?$result['mcexplanation']:"";
						$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";
						
						$concept = str_replace("<P>","",$concept);
					   	$concept = str_replace("</P>","",$concept);
					   	$concept = str_replace("<p>","",$concept);
					   	$concept = str_replace("</p>","",$concept);
						$concept = $this->common_pdf_junk_replace($concept);
						
						$nooflines = ceil(pdf_stringwidth($pdf,"Concept : $concept",$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
		
						$passagenamebuffer = 0;
						$passagename = "";
		
						if($studentinfo['subject'] ==  "English" && $result["passage_id"] != 0 && $result['passage_name'] != ""){
		
							$passagename = $this->common_pdf_junk_replace($result["passage_name"]);
							$nooflinesofpsg = ceil(pdf_stringwidth($pdf,$passagename,$this->font,$this->fontsize)/($this->page_width-$this->left_margin-$this->right_margin));
							$passagenamebuffer = ($nooflinesofpsg * ($this->fontsize+1)) + $singlelinebreak;
						}
		
						$buffersize = ($nooflines * ($this->fontsize+1)) + $doublelinebreak + $passagenamebuffer;
		
						$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
						$qcodestr = $this->common_pdf_junk_replace($qcodestr);
						
					   	$yposbeforequestion = $ypos;
					   	$imagepathfrom = $this->imagepathfrom;
		
					   	$ypos_returned = autoPublishPaper($pdf,$qcodestr,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
		
					   	$isNewPage=$ypos_returned[1];
					   	$yposafterque = $ypos_returned[0];
		
					   	if($isNewPage==1){
					   		$this->pageno++;
					   		$this->addpagenumber($pdf,$this->pageno);
		           			$yposbeforequestion = $this->page_height-$this->top_margin;
							$this->WriteMisconPDFHeader($pdf,$schoolname,$testName,$subject,$class,$section);
							pdf_setfont($pdf,$this->font,$this->fontsize);
		           		}
		
		           		$queno = $questionSeq[1][$qcode] + 1; // Only taking the first version's questions
		
		           		# Imlemented question no printing as per paper
		           		$yposforQ = $yposbeforequestion - $buffersize + 7;
		
		           	   	pdf_setfont($pdf, $this->fontbold, $this->fontsize);
					   	pdf_show_xy($pdf,"Q",$this->left_margin-13,$yposforQ-5);
					   	pdf_setrgbcolor($pdf, 0, 0, 0);
		
					   	pdf_setlinewidth($pdf,0.5);
				 	   	pdf_moveto($pdf,$this->left_margin-15,$yposforQ-$oneandhalflinebreak+6);
					   	pdf_lineto($pdf,$this->left_margin-3,$yposforQ-$oneandhalflinebreak+6);
				 	   	pdf_stroke($pdf);
		
				 	   	if($queno>9) $qno_position=14; else $qno_position=12;
				 	   	pdf_setfont($pdf, $this->fontbold, 8);
					   	pdf_show_xy($pdf,$queno,$this->left_margin-$qno_position,$yposforQ-17);
		
					   	pdf_setlinewidth($pdf,0.5);
		 	   			pdf_moveto($pdf,$this->left_margin-15,$yposforQ-19);
			   			pdf_lineto($pdf,$this->left_margin-3,$yposforQ-19);
		 	   			pdf_stroke($pdf);
		
					   	//pdf_show_xy($pdf,"Q ".$queno.":",$this->left_margin,$yposbeforequestion - $buffersize + 1.5); // 1.5 is added cause in new autopublish paper funciton question print slightly up
		
					   	################ Question End #################
		
					   	$buffersize = $singlelinebreak;
					    $yposbeforeconcept = $yposbeforequestion;
		
					    $ypos_returned = autoPublishPaper($pdf,"<b>Concept:</b> ".$concept,$this->left_margin,$yposbeforequestion,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
		
					    $isNewPage = $ypos_returned[1];
					    $yposafterconcept = $ypos_returned[0];
		
					    if($isNewPage == 1){
					    	$this->pageno++;
					    	$yposbeforeconcept = $this->top_margin - $buffersize;
					    	$parameters = array("exam_code"=>$examcode,"test_name"=>$testName,"class"=>$studentinfo["class"],"subject"=>$subjectid,"test_date"=>$testdate,"rollno"=>$studentinfo["rollno"]);
							$this->WriteMisconPDFHeader($pdf,$schoolname,$this->common_pdf_junk_replace($testName),$subject,$class,$section);
							pdf_setfont($pdf,$this->font,$this->fontsize);
					    }
		
					    pdf_setlinewidth($pdf,0.1);
						pdf_moveto($pdf,$this->left_margin,$yposbeforeconcept+3);
						pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposbeforeconcept+3);
					    pdf_stroke($pdf);
		
						pdf_setlinewidth($pdf,0.1);
						pdf_moveto($pdf,$this->left_margin,$yposafterconcept+8); # above paragraph contains 13 line
						pdf_lineto($pdf,$this->page_width-$this->right_margin, $yposafterconcept+8);
					    pdf_stroke($pdf);
		
					    # line above question no
					    pdf_moveto($pdf,$this->left_margin-15,$yposafterconcept+8); # above paragraph contains 13 line
						pdf_lineto($pdf,$this->left_margin-3, $yposafterconcept+8);
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
					   	
					   	pdf_setfont($pdf,$this->font,$this->fontsize);
		
					   	$ypos -= $doublelinebreak;
		
					   	/*pdf_setlinewidth($pdf,0.1);
						pdf_moveto($pdf,$this->left_margin,$ypos); # above paragraph contains 13 line
						pdf_lineto($pdf,$this->page_width-$this->right_margin, $ypos);
					    pdf_stroke($pdf);
		
					    $ypos -= 10;*/
		
					   	$buffersize = 0;
					   	$mcexplanation = $this->common_pdf_junk_replace($mcexplanation);
					    $ypos_mcexplanation = autoPublishPaper($pdf,$mcexplanation,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
		
					    $ypos = $ypos_mcexplanation[0];
					   	$isNewPage=$ypos_mcexplanation[1];
		
					   	if($isNewPage==1){
		           			$this->pageno++;
		           			$this->addpagenumber($pdf,$this->pageno);
		           			$yposbeforeremedial = $this->page_height-$this->top_margin;
		           			$this->WriteMisconPDFHeader($pdf,$schoolname,$this->common_pdf_junk_replace($testName),$subject,$class,$section);
		    				pdf_setfont($pdf,$this->font,$this->fontsize);
		           		}
		
					   	$remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
					    
		           		if($remedial_measure != ""){
		
			           		$yposbeforeremedial = $ypos;
						   	$buffersize = 30;
						   	$remedial_measure = $this->common_pdf_junk_replace($remedial_measure);
						    $ypos_returned = autoPublishPaper($pdf,$remedial_measure,$this->left_margin,$ypos,$this->right_margin,$this->page_width,$this->page_height,$this->top_margin,$this->bottom_margin,$buffersize,$this->imagepathfrom,$this->optionformat,$this->questionstem,$this->fontsize,$this->fontname,'0.1',$this->left_margin,$this->imagefactor,$this->resizedimages);
		
						   	$isNewPage=$ypos_returned[1];
						   	$ypos = $ypos_returned[0];
			           		if($isNewPage==1){
			           			$this->pageno++;
			           			$this->addpagenumber($pdf,$this->pageno);
			           			$yposbeforeremedial = $this->page_height-$this->top_margin;
								$this->WriteMisconPDFHeader($pdf,$schoolname,$this->common_pdf_junk_replace($testName),$subject,$class,$section);
			    				pdf_setfont($pdf,$this->font,$this->fontsize);
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
		           		}
		           		$ypos -= $singlelinebreak;
					}
					pdf_end_page($pdf);
					//break;
				}
				pdf_end_document($pdf,"");
			}else{
				echo "No records found for particular selection..!<br><a href='dareports_misconceptions.php'>Back</a>";
				die();
			}
		}
	}
	
	function WriteMisconPDFHeader($pdf,$schoolname,$testName,$subject,$class,$section){
		
		$xpos = $this->left_margin;
		$ypos = $this->page_height;
		
		$line_width=131;
		$header_top_margin=35.7;
		
		$ypos-=$header_top_margin;
		$ypos-=3.68;

		$ypos-=34.58;
		
		$qmark_image = pdf_load_image($pdf, "jpeg", constant("PATH_REPORTIMAGES")."report.jpg", "");
		pdf_fit_image($pdf,$qmark_image, $xpos, $ypos, "scale 0.50");
		pdf_close_image($pdf,$qmark_image);
		
		$ypos+=34.58;
		$ypos+=3.68;
		$xpos=$xpos+50;
		/*pdf_setlinewidth($pdf,1.5);
		pdf_moveto($pdf,$xpos,$ypos);
		pdf_lineto($pdf,$xpos+$line_width,$ypos);
		pdf_stroke($pdf);*/
		
		pdf_setfont($pdf, $this->fontbolditalic, $this->fontsize-2);
		pdf_fit_textline ($pdf,"School: ".$schoolname,$xpos,$ypos-8,"position={left top}");
		pdf_fit_textline ($pdf,"Test: ".$this->common_pdf_junk_replace($testName),$xpos,$ypos-20,"position={left top}");
		//pdf_fit_textline($pdf,"Subject: ".$this->subject_arr[$subject],$this->page_width - $this->right_margin,$ypos-20,"position={right top}");
		pdf_fit_textline($pdf,"Subject: ".$this->subject_arr[$subject],$xpos,$ypos-32,"position={left top}");
		pdf_fit_textline ($pdf,"Class: ".$class,$xpos+85,$ypos-32,"position={left top}");
		pdf_fit_textline ($pdf,"Section: ".$section,$xpos+135,$ypos-32,"position={left top}");
	}
	
	function MoveToBucket($source_path,$dest_path){
		
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3_constants.php");
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."S3.php");
		include_once(constant("PATH_ABSOLUTE_S3CONFIG")."s3Wrapper.php");
		
		$s3WrapperObj = new s3Wrapper(constant("awsAccessKey"),constant("awsSecretKey"));
		return $wrapper_res = $s3WrapperObj->uploadFile($source_path,constant("DA_BucketName"),$dest_path,S3::ACL_PUBLIC_READ);
	}
	
	function getRequestType($request_id,$connid)
	{
		$queryRequestType = "SELECT type from da_testRequest where id = '$request_id'";
		$dbqueryRequestType = new dbquery($queryRequestType,$connid);
		$rowRequestType = $dbqueryRequestType->getrowarray();
		return $rowRequestType["type"]; 
	}
	
	function GenerateMisconceptionBrowse($schoolcode=0,$condition="",$connid)
	{
		if($schoolcode != 0){
			
			$this->pageno = 0;
			$leading = 120;
			$MisconceptionQuestions  = array();	

			$sch_query = "SELECT schoolname FROM schools where schoolno = ".$schoolcode;
			$sch_dbqry = new dbquery($sch_query,$connid);
			$sch_result = $sch_dbqry->getrowarray();
			$schoolname = $sch_result["schoolname"];
			$schoolname = $this->schoolNameCorrection($schoolname);
			$main_query = "SELECT da_testRequest.id,da_testRequest.paper_code,da_testRequest.subject,da_testRequest.class,da_testRequest.testName,da_examDetails.exam_code,da_examDetails.section,
							 da_examDetails.miscon_qcode_list,da_examDetails.class_avg,da_examDetails.report_status,
							 da_examDetails.lowperform_qcode_list
						 FROM da_examDetails 
						 LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
						 WHERE da_testRequest.schoolCode = '".$schoolcode."'
						 AND da_examDetails.report_status = 'generated' $condition
						 ORDER BY da_testRequest.subject,da_testRequest.class";
			$main_dbqry = new dbquery($main_query,$connid);
			if($main_dbqry->numrows() > 0){
				
				while($main_result = $main_dbqry->getrowarray()){
					
					$class = $main_result["class"];
					$subject = $main_result["subject"];
					$section = $main_result["section"];
					$testName = $main_result["testName"];
					$miscon_qcode_list = $main_result["miscon_qcode_list"];
					$papercode = $main_result["paper_code"];
					
					# fetching the question sequence in paper
					$questionquery = "SELECT papercode,version,qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' ORDER BY papercode";
					$dbqueqry = new dbquery($questionquery,$connid);
					while($querow = $dbqueqry->getrowarray()){
						$paperwiseQueSeq[$querow['version']] = explode(',',$querow['qcode_list']);
					}
					
					$questionSeq = array();
					foreach($paperwiseQueSeq as $paper => $quesarray){
						$questionSeq[$paper] = array_flip($quesarray);
					}
					
					# need to check whether question version is available than need to use the data from da_questions_versions table
					$clsdaquestion = new clsdaquestion();
					if($miscon_qcode_list!=""){
					$query2 = "SELECT qcode,correct_answer,lastModified FROM da_questions WHERE qcode IN($miscon_qcode_list)";
					$dbquery2 = new dbquery($query2,$connid);
					while($row2 = $dbquery2->getrowarray()){
			
						$QueTableResultArr = $clsdaquestion->GetQueTableAndVersion($connid,$row2["qcode"],$approved_date,$row2["lastModified"]);
						
						if($QueTableResultArr["tablename"] == "da_questions_versions"){
							$QueFromVersionTable[$row2["qcode"]] = $QueTableResultArr["version"];
							$MisconceptionQuestions[$row2["qcode"]] = $QueTableResultArr["correct_answer"];
						}	
						else{
							$MisconceptionQuestions[$row2["qcode"]] = $row2["correct_answer"];
						}
					}
					}
					$QueFromVersionTable = array();
					$this->WriteMisconBrowseHeader($pdf,$schoolname,$this->common_pdf_junk_replace($testName),$subject,$class,$section);
					
					echo "<table><tr><td>Notes: Question numbers are based on paper version 1 only.</td></tr>";
					echo "<tr><td><b><u>Misconceptions</u></b><br/><br/></td></tr></table>";
					
					$i =0;
					foreach($MisconceptionQuestions as $qcode => $answers){
						echo "<table cellpadding=2 cellspacing=2 border=1 width=100% style='border-collapse:collapse;border-color:#000;'><tr><td>";
						if(array_key_exists($qcode,$QueFromVersionTable)){
							$QueTblName = "da_questions_versions";
							$Condition = " AND da_questions_versions.version = '".$QueFromVersionTable[$qcode]."'";
						}else{
							$QueTblName = "da_questions";
							$Condition = "";
						}
								
						$i++;
						$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,group_id,
										 $QueTblName.passage_id,qms_passage.passage_name
								  FROM $QueTblName
								  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
								  WHERE qcode = '".$qcode."' $Condition";
						 //AND misconception = 1
						$dbqry = new dbquery($query,$connid);
						$result = $dbqry->getrowarray();
						$mcexplanation = (isset($result['mcexplanation']) && $result['mcexplanation'] != 'NULL')?$result['mcexplanation']:"";
						$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";
						
						$concept = str_replace("<P>","",$concept);
					   	$concept = str_replace("</P>","",$concept);
					   	$concept = str_replace("<p>","",$concept);
					   	$concept = str_replace("</p>","",$concept);
						//$concept = $this->common_pdf_junk_replace($concept);
						echo "<table><tr><td><b>Concept : </b>$concept</td></tr></table>";	
						$passagenamebuffer = 0;
						$passagename = "";

						if($studentinfo['subject'] ==  "English" && $result["passage_id"] != 0 && $result['passage_name'] != ""){

							$passagename = $result["passage_name"];
						}		
						
						$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
						//$qcodestr = $this->common_pdf_junk_replace($qcodestr);
						$qrow = explode("##&&",$qcodestr);
						$queno = $questionSeq[1][$qcode] + 1;
						
						
						echo "<table cellpadding=2 cellspacing=2 border=1 width=100% style='border-collapse:collapse;border-color:#000;'>";
						echo "<tr valign=top><td width=5%>Q-$queno</td><td>$qrow[0]</td></tr>";
						echo "<tr><td>A</td><td>$qrow[1]</td></tr>";
						echo "<tr><td>B</td><td>$qrow[2]</td></tr>";
						echo "<tr><td>C</td><td>$qrow[3]</td></tr>";
						echo "<tr><td>D</td><td>$qrow[4]</td></tr>";
						echo "</table>";
						echo "<br/>";
						
						if($passagename != "")
					    {
							
						    $textflow = "Passage: ".$passagename;
							echo  $textflow;
							do {
							    echo $passageres = $textflow;
							} while (strcmp($passageres, "_stop"));
					    }
						
						echo "<b>Correct Option: ".$this->ansseqarr[$result["correct_answer"]]."</b>";
						echo "<br/>".$mcexplanation;
						
						$remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
						
						if($remedial_measure != ""){
							//$remedial_measure = $this->common_pdf_junk_replace($remedial_measure);
							echo "<br/><br/><b>Remedial measure:</b>".$remedial_measure;
						}
						echo "</td></tr></table>";
						echo "<br/><br/><br/>";
						}
						}
							}else{
				echo "No records found for particular selection..!<br><a href='dareports_misconceptions.php'>Back</a>";
				die();
			}
		}
						
	}

	function GenerateMisconceptionBrowseSummary($schoolcode=0,$condition="",$connid,$section_poperty="")
	{
		$subjectArraySet = array("1"=>"English","2"=>"Maths","3"=>"Science","4"=>"SS");
		$globalsetArrayForDisplay = array(); 
		if($schoolcode != 0){
			
			$this->pageno = 0;
			$leading = 120;
			
			$sch_query = "SELECT schoolname FROM schools where schoolno = ".$schoolcode;
			$sch_dbqry = new dbquery($sch_query,$connid);
			$sch_result = $sch_dbqry->getrowarray();
			$schoolname = $sch_result["schoolname"];
			$schoolname = $this->schoolNameCorrection($schoolname);
			$main_query = "SELECT da_testRequest.id,da_testRequest.paper_code,da_testRequest.subject,da_testRequest.class,da_testRequest.testName,da_examDetails.exam_code,da_examDetails.section,
							 da_examDetails.miscon_qcode_list,da_examDetails.class_avg,da_examDetails.report_status,
							 da_examDetails.lowperform_qcode_list
						 FROM da_examDetails 
						 LEFT JOIN da_testRequest ON da_examDetails.request_id = da_testRequest.id
						 WHERE da_testRequest.schoolCode = '".$schoolcode."'
						 AND da_examDetails.report_status = 'generated' $condition
						 ORDER BY da_testRequest.subject,da_testRequest.class,da_testRequest.testName";
			$main_dbqry = new dbquery($main_query,$connid);
			if($main_dbqry->numrows() > 0){
				
				while($main_result = $main_dbqry->getrowarray()){ 
					$MisconceptionQuestions = array();
					$class = $main_result["class"];
					$subject = $main_result["subject"];
					$section = $main_result["section"];
					$testName = $main_result["testName"];
					$miscon_qcode_list = $main_result["miscon_qcode_list"];
					$papercode = $main_result["paper_code"];
					$display_str = "";
					if($class!="")
					{
						$display_str .= "<b>Class :-</b> ".$class;
					}
					if($subject!="")
					{
							$display_str .= "&nbsp;&nbsp;&nbsp;&nbsp;<b>Subject :-</b> ".$subjectArraySet[$subject];
					}
					if($section_poperty != "ALL")
					{	
						if(trim($section)!="")
						{
							$display_str .= "&nbsp;&nbsp;&nbsp;&nbsp;<b>Section :-</b> ".$section;
						}
					}	
					# fetching the question sequence in paper
					$questionquery = "SELECT papercode,version,qcode_list FROM da_paperDetails WHERE papercode = '".$papercode."' ORDER BY papercode";
					$dbqueqry = new dbquery($questionquery,$connid);
					while($querow = $dbqueqry->getrowarray()){
						$paperwiseQueSeq[$querow['version']] = explode(',',$querow['qcode_list']);
					}
					
					$questionSeq = array();
					foreach($paperwiseQueSeq as $paper => $quesarray){
						$questionSeq[$paper] = array_flip($quesarray);
					}
					
					# need to check whether question version is available than need to use the data from da_questions_versions table
					$clsdaquestion = new clsdaquestion();
					if($miscon_qcode_list!=""){
					$query2 = "SELECT qcode,correct_answer,lastModified FROM da_questions WHERE qcode IN($miscon_qcode_list)";
					$dbquery2 = new dbquery($query2,$connid);
					while($row2 = $dbquery2->getrowarray()){
			
						$QueTableResultArr = $clsdaquestion->GetQueTableAndVersion($connid,$row2["qcode"],$approved_date,$row2["lastModified"]);
						
						if($QueTableResultArr["tablename"] == "da_questions_versions"){
							$QueFromVersionTable[$row2["qcode"]] = $QueTableResultArr["version"];
							$MisconceptionQuestions[$row2["qcode"]] = $QueTableResultArr["correct_answer"];
						}	
						else{
							$MisconceptionQuestions[$row2["qcode"]] = $row2["correct_answer"];
						}
					}
					}
					$QueFromVersionTable = array();
					if($section_poperty == "ALL")
					{						
						if(!isset($globalsetArrayForDisplay[$class][$subject]) && count($MisconceptionQuestions)>0)
						{
							if(isset($globalsetArrayForDisplay) && count($globalsetArrayForDisplay)>0)
							{	
								echo "</table>";
								echo "<br/><br/><br/>";
							}		
							echo "<table id=newspaper-a cellpadding=2 cellspacing=2 width=100% border=1>";
							echo "<tr><td colspan=2>$display_str &nbsp;&nbsp;&nbsp;&nbsp;<b>Misconceptions</b></td></tr>";
							//echo "<tr><td colspan=2><b>Topic :- </b>$testName</td></tr>";
							//echo "<tr><td colspan=2><b><u>Misconceptions</u></b></td></tr>";
							echo "<tr><td width='5%'>Sr No</td><td>Concept</td></tr>";
							$testName_set = $testName;
							$i =0;
						}
						
						if(isset($globalsetArrayForDisplay[$class][$subject]) && $testName_set!=$testName && count($MisconceptionQuestions)>0)
						{
							$testName_set = $testName;
							//echo "<tr><td colspan=2><b>Topic :- </b>$testName</td></tr>";
							//echo "<tr><td colspan=2><b><u>Misconceptions</u></b></td></tr>";
							//echo "<tr><td width='5%'>Sr No</td><td>Concept</td></tr>";
						}
						
					}
					if($section_poperty != "ALL")
					{
						echo "<table id=newspaper-a cellpadding=2 cellspacing=2 width=100% border=1>";
						echo "<tr><td colspan=2><b>Topic :- </b>$testName &nbsp;&nbsp;&nbsp;&nbsp;$display_str</td></tr>";
						echo "<tr><td colspan=2><b><u>Misconceptions</u></b></td></tr>";
						echo "<tr><td width='5%'>Sr No</td><td>Concept</td></tr>";
					}
					
					/*if($testName!="" && count($MisconceptionQuestions)==0)
					{
						$globalsetArrayForDisplay[$class][$subject][$testName][""] = "";
					}
					if($testName=="" && count($MisconceptionQuestions)==0)
					{
						$globalsetArrayForDisplay[$class][$subject][$testName][""] = "";
					}*/
					if(isset($MisconceptionQuestions))
					{
					if($section_poperty!="ALL")
					{
						$i =0;
					}
					foreach($MisconceptionQuestions as $qcode => $answers){
						if(array_key_exists($qcode,$QueFromVersionTable)){
							$QueTblName = "da_questions_versions";
							$Condition = " AND da_questions_versions.version = '".$QueFromVersionTable[$qcode]."'";
						}else{
							$QueTblName = "da_questions";
							$Condition = "";
						}
						if($section_poperty!="ALL")
						{		
							$i++;
						}	
						$query = "SELECT question,optiona,optionb,optionc,optiond,correct_answer,skill,remedial_instruction,mcexplanation,mc_ques_title,group_id,
										 $QueTblName.passage_id,qms_passage.passage_name
								  FROM $QueTblName
								  LEFT JOIN qms_passage ON $QueTblName.passage_id = qms_passage.passage_id
								  WHERE qcode = '".$qcode."' $Condition";
						 //AND misconception = 1
						$dbqry = new dbquery($query,$connid);
						$result = $dbqry->getrowarray();
						$mcexplanation = (isset($result['mcexplanation']) && $result['mcexplanation'] != 'NULL')?$result['mcexplanation']:"";
						$concept = (isset($result['mc_ques_title']) && $result['mc_ques_title'] != 'NULL')?$result['mc_ques_title']:"";
						
						$concept = str_replace("<P>","",$concept);
					   	$concept = str_replace("</P>","",$concept);
					   	$concept = str_replace("<p>","",$concept);
					   	$concept = str_replace("</p>","",$concept);
					   	
						if($section_poperty=="ALL")
						{
							if($concept != $globalsetArrayForDisplay[$class][$subject][$testName][$concept])
							{
								$i++;
								echo "<tr><td>$i</td><td>$concept</td></tr>";	
								
							}	
						}
						if($section_poperty!="ALL")
						{
							echo "<tr><td>$i</td><td>$concept</td></tr>";
						}
						$globalsetArrayForDisplay[$class][$subject][$testName][$concept] = $concept;
						
						$passagenamebuffer = 0;
						$passagename = "";

						if($studentinfo['subject'] ==  "English" && $result["passage_id"] != 0 && $result['passage_name'] != ""){

							$passagename = $result["passage_name"];
						}		
						
						$qcodestr = $result['question']."##&&".$result['optiona']."##&&".$result['optionb']."##&&".$result['optionc']."##&&".$result['optiond'];
						$qrow = explode("##&&",$qcodestr);
						$queno = $questionSeq[1][$qcode] + 1;
												
						if($passagename != "")
					    {	
						    $textflow = "Passage: ".$passagename;
							echo  $textflow;
							do {
							    echo $passageres = $textflow;
							} while (strcmp($passageres, "_stop"));
					    }
						
						$remedial_measure = (isset($result['remedial_instruction']) && $result['remedial_instruction'] != '')?$result['remedial_instruction']:"";
						
						}
					}
						if($section_poperty != "ALL")
						{
							echo "</table>";
							echo "<br/><br/><br/>";
						}	
					}
						
							}else{
				echo "<table><tr><td>No records found for particular selection..!</td></tr></table><br>";
				die();
			}
		}
						
	}


	function WriteMisconBrowseHeader($pdf,$schoolname,$testName,$subject,$class,$section){
		
		echo "<table width='100%' bgcolor=lightgray><tr>";
		echo "<td align=left><b>School: ".$schoolname."<br/>";
		echo "Test: ".$testName."<br/>";
		echo "Subject: ".$this->subject_arr[$subject]."<br/>";
		echo "Class: ".$class."<br/>";
		echo "Section: ".$section."</b></td></tr></table>";
	}
	
	# return the student name with logic defined Mantis BT ID:742 - after single chars put "." and capitalization
	function GetOperatedString($inputStr)
	{
		if($inputStr == "") return;
		$returnString = "";
		
		# dot checking
		$arrCheckDot = explode(".",$inputStr);
		
		if(is_array($arrCheckDot) && count($arrCheckDot)>0)
		{
			$arrMakeIt = array();
			$arrCheckDot = array_filter($arrCheckDot);
			
			foreach($arrCheckDot as $keyCheckDot => $valueCheckDot){		
				$valueCheckDot = trim($valueCheckDot);
				if(strlen($valueCheckDot) == 1)
					$arrMakeIt[] = $valueCheckDot.". ";
				else
					$arrMakeIt[] = $valueCheckDot." ";
			}
			$NewStr = implode($arrMakeIt);
		}
		
		# converting to upper case
		$arrExplode = array();	
		$arrExplode = explode(' ',$NewStr);
		$arrMakeForImplode = array();
		
		foreach($arrExplode as $keyExplode => $valueExplode)
		{
			$strUpper = "";
			if(strlen($valueExplode)==1){
				$strUpper = strtoupper(strtolower($valueExplode));
				$strUpper = $strUpper.".";				
				$arrMakeForImplode[] = $strUpper;
			}
			else {
				$strUpper = ucfirst(strtolower($valueExplode));
				$arrMakeForImplode[] = $strUpper;
			}
		}
			
		if(isset($arrMakeForImplode) && count($arrMakeForImplode) > 0){
			$returnString = implode(' ',$arrMakeForImplode);
		}
		
		return $returnString;
	}
	
	function ConvertPerfoIntoGrade($perfo){
		
		if($perfo == "") return;
		
		if($perfo >= 90 && $perfo <= 100) $grade = "A+";
		else if($perfo >= 80 && $perfo < 90) $grade = "A";
		else if($perfo >= 70 && $perfo < 80) $grade = "B";
		else if($perfo >= 60 && $perfo < 70) $grade = "C";
		else if($perfo >= 50 && $perfo < 60) $grade = "D";
		else if($perfo >= 44 && $perfo < 50) $grade = "E";
		else if($perfo > 0 && $perfo < 44) $grade = "F";
		else $grade = "-";
		
		return $grade;
	}
	function schoolNameCorrection($schoolname)
	{
		$search=array("^","^^");
		$replace=array("'",'"');
		$school_name=str_replace($search,$replace,$schoolname);
		return $school_name;
	}
}
?>
