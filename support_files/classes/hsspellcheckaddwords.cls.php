<?php

class clsspellcheckaddwords
{
	var $checkwords;
	var $savewords;
	var $filename;
	var $action;
	var $filecontent;
	var $ucodedata;
	var $dbquery;
	var $selectedwords;
	var $whichpage;
	var $state;
	var $series;
	var $class;
	var $subject;
	var $unescapeddata;
	
	function clsspellcheckaddwords()
	{
		$this->checkwords="";
		$this->savewords="";
		$this->filename="";
		$this->action="";
		$this->filecontent="";
		$this->ucodedata="";
		$this->selectedwords="";
		$this->whichpage="";
		$this->state="";
		$this->series=0;
		$this->class=0;
		$this->subject="";
		$this->unescapeddata="";
  	}
  	
	function setpostvars()
	{
    	if(isset($_POST["clsspellchekaddwords_action"])) $this->action                     = $_POST["clsspellchekaddwords_action"];
		if(isset($_POST["clsspellchekaddwords_filetocheck"])) $this->filename              = $_POST["clsspellchekaddwords_filetocheck"];
		if(isset($_POST["clsspellchekaddwords_filecontent"])) $this->filecontent           = $_POST["clsspellchekaddwords_filecontent"];
		if(isset($_POST["clsspellchekaddwords_ucode_data"])) $this->ucodedata              = $_POST["clsspellchekaddwords_ucode_data"];
		if(isset($_POST["clsspellchekaddwords_filetocheck_totalwords"])) $this->totalwords = $_POST["clsspellchekaddwords_filetocheck_totalwords"];
		if(isset($_POST["clsspellchekaddwords_selectedwords"])) $this->selectedwords       = $_POST["clsspellchekaddwords_selectedwords"];
		if(isset($_POST["clsspellchekaddwords_whichpage"])) $this->whichpage       		   = $_POST["clsspellchekaddwords_whichpage"];
		if(isset($_POST["clsspellchekaddwords_state"])) $this->state       				   = $_POST["clsspellchekaddwords_state"];
		if(isset($_POST["clsspellchekaddwords_series"])) $this->series       			   = $_POST["clsspellchekaddwords_series"];
		if(isset($_POST["clsspellchekaddwords_class"])) $this->class       			       = $_POST["clsspellchekaddwords_class"];
		if(isset($_POST["clsspellchekaddwords_subject"])) $this->subject       			   = $_POST["clsspellchekaddwords_subject"];
		if(isset($_POST["clsspellchekaddwords_unescaped_data"])) $this->unescapeddata      = $_POST["clsspellchekaddwords_unescaped_data"];
		
    }
	
    /* 
    	Function called from hsspellcheckaddwords.php
    	Adde by Arpit (12/10/2007), to find misspelled hindi words
    */ 
    function pageSpellcheckaddwords($connid)
    {
    	$this->setpostvars();
		$filename = $this->filename;
		
		if($this->action == "Insert Words")
		{
			$this->insertwords($connid);
		}
		
		if($this->action == "Check Words")
		{
			$words = $this->parseString();
			$filecon = trim($this->filecontent);
			//echo $filecon;
			$filewords = split(' ',$filecon);
			$outval = "";
			
			//$fp = fopen("C:/Program Files/Apache Group/Apache2/htdocs/hindispellcheck/hindifiles/status/status.html","w");
			$output_string  = "<form name='frminsertwords' method='POST' action='hsspellcheckaddwords.php'>";
			$output_string .= "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr><td align='center'><b>Filename:</b>&nbsp;".str_replace("\\\\","\\",$filename)."</td></tr></table>";
			$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr><td colspan='4' align='center'><b>Misspelled words</b></td></tr>";
			$output_string .= "<tr><td>&nbsp;</td><td><b>Sr. No.</b></td><td><b>Wrong Word</b><td><b>Pattern</b></td></tr>";
			
			$word_array = array();
			$word_counter = 0;
			for($i=0;$i<count($words);$i++)
			{
				$words[$i] = str_replace("%","\\\\",$words[$i]);
				$words[$i] = trim($words[$i]);
				
				$junkcharater = $this->resolveJunkCharacters($words[$i]);
				if($junkcharater==1) // If junk words coming from text file then ignore them
					continue;
				
				if ($words[$i] <> "")
				{	
					$tmpWord = $this->replaceDaDot($words[$i]);
					$query = "SELECT ucode,word FROM hindi_dictionary WHERE lang_code=3 AND (word='$words[$i]' OR word='$tmpWord')";
					
					$dbquery = new dbquery($query,$connid);
					
					if ($dbquery->numrows() == 0)
					{	
						if(!in_array($words[$i],$word_array))
						{
							array_push($word_array, $words[$i]);
							$words[$i] = str_replace("\\\\","\\",$words[$i]);
							$outval .= "  ".$words[$i];
							if($i >= 2 && $i <= (count($words)-2))
								$otherword = $filewords[$i-2]." ".$filewords[$i-1]." <font color='red'>".$filewords[$i]."</font> ".$filewords[$i+1]." ".$filewords[$i+2];
							else $otherword = "<font color='red'>".$filewords[$i]."</font> ";
							//echo $query."--".$filewords[$i]."---".$word_counter."---".$words[$i]."<br><br>";
							
							$word_counter++;
							$output_string .= "<tr><td><input type='checkbox' name='".str_replace("\\","",$words[$i])."'></td><td align='center'>".$word_counter."</td><td><font color='red'>".$filewords[$i]."</font></td><td>".$otherword."</td></tr>";
						}
					}
				}
			}
			
			$word_string = "";
			for($j=0;$j<count($word_array);$j++)
			{
				$word_string .=$word_array[$j]."-";
			}
			$word_string = substr($word_string,0,-1);
			
			if($word_counter >= 1)
				$output_string .= "<tr><td colspan='4' align='center'><input type='button' name='Insert Words' value='Insert Words' onclick='return insertwords()';></td></tr>";
				//$output_string .= "<tr><td colspan='4' align='center'><input type='button' name='Insert Words' value='Insert Words' onclick=return insertwords('".$word_string."')></td></tr>";
			
			$output_string .= "</table>";
			$output_string .="<input type='hidden' name='clsspellchekaddwords_action'>";
			$output_string .="<input type='hidden' name='clsspellchekaddwords_allwords' value='".str_replace("\\","",$word_string)."'>";
			$output_string .="<input type='hidden' name='clsspellchekaddwords_selectedwords'></form>";
			//fwrite($fp,$output_string);
			echo "<br>".$output_string;
		}
    }
    
    
    /* 
    	Function called from hsaddfrequencyofwords.php
    	Added by Arpit (19/10/2007), to find set frequency of words from a hindi text file
    */ 
    function pageAddfrequencyOfWords($connid)
    {
    	$this->setpostvars();
    	if($this->action == "Add frequency of Words")
		{
			$filename = $this->filename;
	    	$slashIndex = strrpos($filename,"\\\\");
	    	$fileShortname = substr($filename, $slashIndex+1);
	    	$strings = trim($this->ucodedata);
	    	
	    	$indexoftxt = strpos($fileShortname,".txt");
	    	$statusfile = substr($fileShortname, 0, $indexoftxt);
	    	$statusfile = "Digitized Hindi Text Books/FrequencyCountStatus/status_".$statusfile.".html";
	    	
	    	$fp = fopen($statusfile,"w");
			
			$query = "SELECT count(*) FROM hindi_word_frequency WHERE filename like '%".$fileShortname."%'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($row["count(*)"]>0)
			{			
				echo "<center><font color='red' face='verdana' size='1'>Frequency count of file (".$fileShortname.") already done, please select another file.</font></center>"; exit;				
			}
			$words = $this->parseString();
			$filecon = trim($this->filecontent);
			$filewords = split(' ',$filecon);
			$outval = "";
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr><td align='center'><b>Filename:</b>&nbsp;".str_replace("\\\\","\\",$filename)."</td></tr></table>";
			$output_string .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr><td align='center' colspan='4'><b>Updated frequency of file words</b></td></tr>";
			$output_string .= "<tr><td><b>Sr. No.</b></td><td><b>Word</b><td><b>Frequency in file</b></td><td><b>Overall Frequency</b></td></tr>";
			
			$word_array = array();
			$unique_words = array();
			$unique_words_infilefrequency = array();
			$unique_words_totalfrequency = array();
			
			for($i=0;$i<count($words);$i++)
			{
				$words[$i] = str_replace("%","\\\\",$words[$i]);
				$words[$i] = trim($words[$i]);

				$junkcharater = $this->resolveJunkCharacters($words[$i]);
				if($junkcharater==1) // If junk words coming from text file then ignore them 
					continue;
				
				if ($words[$i] <> "")
				{	
					$tmpWord = $this->replaceDaDot($words[$i]);
					$condition = "WHERE (word='$words[$i]' OR word='$tmpWord') AND class=$this->class  AND subject='$this->subject' AND state='$this->state' AND series='$this->series'";
					$query = "SELECT frequency,filename FROM hindi_word_frequency ".$condition;
					$dbquery = new dbquery($query,$connid);
					$row = $dbquery->getrowarray();
					$frequency = $row["frequency"];
					$frequency++;
					
					if (($frequency-1) == 0)
						$query = "INSERT INTO hindi_word_frequency SET word='$words[$i]',frequency=$frequency,class=$this->class,subject='$this->subject',state='$this->state',series='$this->series',filename='$fileShortname'";
					else
					{
						$filename_array = explode(",",$row["filename"]);
						if(!in_array($fileShortname,$filename_array))
							$updatedfilename = $row["filename"].",".$fileShortname;
						else 
							$updatedfilename = $row["filename"];
						$query = "UPDATE hindi_word_frequency SET frequency=$frequency,filename='$updatedfilename' ".$condition;
					}
					//echo $query."<br>";
					$dbquery = new dbquery($query,$connid);
					
					if(!in_array($filewords[$i],$unique_words))
					{
						array_push($unique_words, $filewords[$i]);
						$unique_words_infilefrequency[$filewords[$i]] = 1;
						$unique_words_totalfrequency[$filewords[$i]] = $frequency;
					}
					else 
					{
						$unique_words_infilefrequency[$filewords[$i]] += 1;
						$unique_words_totalfrequency[$filewords[$i]] = $frequency;
					}
				}
			}
			
			$word_counter = 1;
			for($wordindex=0;$wordindex<count($unique_words);$wordindex++)
			{
				$uniqueword = $unique_words[$wordindex];
				$output_string .= "<tr><td align='center'>".$word_counter."</td><td>".$uniqueword."</td><td align='center'>".$unique_words_infilefrequency[$uniqueword]."</td><td align='center'>".$unique_words_totalfrequency[$uniqueword]."</td></tr>";
				$word_counter++;
			}
			echo $output_string;
			fwrite($fp,$output_string);
			
			$totalwords = count($words);
			$query = "SELECT totalwords from hindi_stateclasswise_totalwords WHERE state='$this->state' AND class='$this->class' AND subject='$this->subject'";
			$dbquery = new dbquery($query,$connid);
			if ($dbquery->numrows() == 0)
			{	
				$query = "INSERT INTO hindi_stateclasswise_totalwords SET state='$this->state',series='$this->series',class='$this->class',subject='$this->subject',totalwords=$totalwords";
			}
			else 
			{
				$row = $dbquery->getrowarray();
				$totalwords = $totalwords + $row["totalwords"];	
				$query = "UPDATE hindi_stateclasswise_totalwords SET totalwords=$totalwords WHERE state='$this->state' AND series='$this->series' AND class='$this->class' AND subject='$this->subject'";
			}
			$dbquery = new dbquery($query,$connid);
					
			$newfilename = $this->filename.".DONE";
			rename($this->filename, $newfilename);
		}
    }
    
    /* 
    	Function called from hsconverhinditoescape.php
    	Added by Arpit (12/10/2007), to find convert hindi words to javascript escape characters
    */ 
    function pageconverhinditoescape()
    {
    	$this->setpostvars();
		$file = $this->filename;
		$finalcontent = "";
		$file_word_count = " ";
		
		$a=strpos(strrev($file), "txt.");
		if (($a!==false) && ($a==0))
		{	
			$this_file_words=0;
			$filecontents = file_get_contents($file);
			$words = split("[ \n\r?!:.,%()_\t#/\";-]",$filecontents);
			
			foreach ($words as $key => $word)
			{	
				$word = chop($word);
				if (preg_match("/^[0-9]*$/", $word))  // Skip numbers
					$word="";		
				if(preg_match("/^[0-9]*1st$/", $word))	
					continue;
				elseif (preg_match("/^[0-9]*2nd$/", $word))
					continue;
				elseif (preg_match("/^[0-9]*3rd$/", $word))
					continue;
				elseif (preg_match("/^[0-9]*[04-9]+th$/", $word))
					continue;
				else
				{	
					if (substr($word, 0,1) == "'")	$word = substr($word, 1);	// Strip leading '
					if (substr($word, -1) == "'")	$word = substr($word, 0, strlen($word)-1); // Strip trailing '
				}
				
				if (strlen($word) > 1)
				{	
					$finalcontent .= " ".$word;
					$this_file_words++;
				}
			}
			$file_word_count .= " ".$this_file_words;
		}
		else 
		{
			echo "<center><font color='red' face='verdana' size='1'>Please select only .txt file.</font></center>"; exit;				
		}
		echo "<form name='hindicheck' method='POST'>";
		echo "<input type='hidden' name='clsspellchekaddwords_action'>";
		echo "<input type='hidden' name='clsspellchekaddwords_filecontent' value='$finalcontent'>";
		echo "<input type='hidden' name='clsspellchekaddwords_ucode_data'>";
		echo "<input type='hidden' name='clsspellchekaddwords_filetocheck' value='$file'>";
		echo "<input type='hidden' name='clsspellchekaddwords_filetocheck_totalwords' value='$file_word_count'>";
		if($this->whichpage==1)
		{
			echo "<input type='hidden' name='clsspellchekaddwords_state' value='$this->state'>";
			echo "<input type='hidden' name='clsspellchekaddwords_series' value='$this->series'>";
			echo "<input type='hidden' name='clsspellchekaddwords_class' value='$this->class'>";
			echo "<input type='hidden' name='clsspellchekaddwords_subject' value='$this->subject'>";
		}
		echo "</form><script>spellcheck(".$this->whichpage.")</script>";
    }
    
    /* 
    	Function called from hscountfrequencyofwords.php
    	Added by Arpit (24/10/2007), to count frequency of words (words given from specified file)
    */ 
    function pageCountFrequencyOfWords($connid)
    {
    	$this->setpostvars();
    	if($this->action == "Count Frequency of Words")
		{
			$filename = $this->filename;
	    	$slashIndex = strrpos($filename,"\\\\");
	    	$fileShortname = substr($filename, $slashIndex+1);
			$words_tmp = $this->parseString();
			$filecon = trim($this->filecontent);
			$filewords_tmp = split(' ',$filecon);
			$words = array();
			$filewords = array();
			$this->make_unique_array($words_tmp,$filewords_tmp,$words,$filewords); 
			$totalwords_file = count($words);
			$distintstates = $this->fetchdistinctstates($connid);
			$distintclasses = $this->fetchdistinctclasses($connid);
			$totalclasses = count($distintclasses);
			$totalstates = count($distintstates);
			//$totalcolumns = $totalclasses*$totalstates + $totalclasses-1;
			//$colspan = $totalcolumns/$totalstates;
			//$totalcolumns+=3;
			$stateshortname = array();
			$stateshortname["Bihar"] = "BH"; $stateshortname["Uttaranchal"] = "UT"; $stateshortname["Chhatisgarh"] = "CSG"; 
			$stateshortname["Madhya Pradesh"] = "MP"; $stateshortname["Rajasthan"] = "RJ";
			
			$output_string  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr><td align='center' colspan='25'><b><u>Frequency count of words in file ".$fileShortname."</u></b></td><tr>";
			$output_string_class = "<tr><td>&nbsp;</td><td>&nbsp;</td>";
			$output_string_state = "<tr><td><b>Sr. No.</b></td><b><td><b>Word</b></td>";
			
			$query = "SELECT state,class,totalwords FROM hindi_stateclasswise_totalwords";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$totalwords = $row["totalwords"];	
				$state = str_replace(" ","",$row["state"]); 
				$class = $row["class"];		
				${$state.$class."_totalwords"} = $totalwords;
			}
			
			$bgcolor = "#EEE9E9";
			
			$query = "SELECT sum(totalwords) as overalltotalwords FROM hindi_stateclasswise_totalwords";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$overalltotalwords = $row["overalltotalwords"];
					
			$output_string_class .= "<td colspan='5' align='center' bgcolor='#EEE9E9'><b>2</b></td>";
			$output_string_class .= "<td colspan='4' align='center' bgcolor='#FFFFFF'><b>3</b></td>";
			$output_string_class .= "<td colspan='4' align='center' bgcolor='#EEE9E9'><b>4</b></td>";
			$output_string_class .= "<td colspan='4' align='center' bgcolor='#FFFFFF'><b>5</b></td>";
			$output_string_class .= "<td colspan='3' align='center' bgcolor='#EEE9E9'><b>6</b></td>";
			$output_string_class .= "<td colspan='2' align='center' bgcolor='#FFFFFF'><b>7</b></td>";
			$output_string_class .= "<td rowspan='2' align='center' bgcolor='#FFBBFF'><b>Overall<br>(".$overalltotalwords.")</b></td>";
			
			for($index=0;$index<$totalclasses;$index++)
			{
				$class = $distintclasses[$index];
				${"total_".$class} = 0;
				//$output_string_class .= "<td colspan=".$colspan." align='center' bgcolor='$bgcolor'><b>".$class."</b><td bgcolor='#FFE1FF'>&nbsp;</td></td>";
				for($j=0;$j<$totalstates;$j++)
				{
					$state = str_replace(" ","",$distintstates[$j]);
					${$state.$class} = 0;
					${$state.$class."_total"} = 0;
					if(${$state.$class."_totalwords"}==0) continue; // Don't consider states where no words are there
					$output_string_state .= "<td align='center' bgcolor='$bgcolor'>".$stateshortname[$distintstates[$j]]."<br>(".${$state.$class."_totalwords"}.")</td>";
				}
				
				$query = "SELECT sum(totalwords) as classwisetotalwords FROM hindi_stateclasswise_totalwords WHERE class=$class";
				$dbquery = new dbquery($query,$connid);
				$row = $dbquery->getrowarray();
				${"classwisetotalwords".$class} = $row["classwisetotalwords"];
				
				$output_string_state .="<td bgcolor='#FFE1FF' align='center'>OA<br>(".${"classwisetotalwords".$class}.")</td>";
				if($bgcolor=="#FFFFFF")
					$bgcolor="#EEE9E9";
				else 
					$bgcolor="#FFFFFF";
			}
			
			
			
			$output_string_state .= "</tr>";
			$output_string_class .= "</tr>";
			$output_string .= $output_string_class;
			$output_string .= $output_string_state;
			$srno=1; $overall_total = 0;
			
			for($i=0;$i<$totalwords_file;$i++)
			{
				$words[$i] = str_replace("%","\\\\",$words[$i]);
				$words[$i] = trim($words[$i]);
				${"wordwise_total".$i} = 0;

				$junkcharater = $this->resolveJunkCharacters($words[$i]);
				if($junkcharater==1) // If junk words coming from text file then ignore them 
					continue;
				
				if ($words[$i] <> "")
				{	
					$tmpWord = $this->replaceDaDot($words[$i]);
					$query  = "SELECT frequency,class,state FROM hindi_word_frequency WHERE (word='".$words[$i]."' OR word='".$tmpWord."') GROUP BY class,state "; 
					//echo $query."<br><br>";
					$dbquery = new dbquery($query,$connid);
					while($row = $dbquery->getrowarray())
					{
						$freqency = $row["frequency"];	
						$state = str_replace(" ","",$row["state"]); 
						$class = $row["class"];		
														
						${$state.$class} = $freqency;
						${$state.$class."_total"} += $freqency;
					}
					
					$output_string .= "<tr><td align='center'>".$srno."</td><td>".$filewords[$i]."</td>";
					$srno++; $bgcolor = "#EEE9E9";
					for($index=0;$index<$totalclasses;$index++)
					{
						$class = $distintclasses[$index];
						$class_word_total = 0;
						for($j=0;$j<$totalstates;$j++)
						{
							$state = str_replace(" ","",$distintstates[$j]);
							if(${$state.$class."_totalwords"}==0) continue; // Don't consider states where no words are there
							if(${$state.$class."_totalwords"} !=0)
								$freqency_percentage = round((${$state.$class}/${$state.$class."_totalwords"})*10000,2);
							else 
								$freqency_percentage = 0;
							//$class_word_total += $freqency_percentage;
							$output_string .="<td align='center' bgcolor='$bgcolor'>".$freqency_percentage."</td>";
							${$state.$class} = 0;
						}
						$query = "SELECT sum(frequency) as classwisefrequency FROM hindi_word_frequency WHERE word='$words[$i]' AND class=$class";
						$dbquery = new dbquery($query,$connid);
						$row = $dbquery->getrowarray();
						$class_word_total = round(($row["classwisefrequency"]/${"classwisetotalwords".$class})*10000,2);
						
						$output_string .="<td bgcolor='#FFE1FF' align='center'>".$class_word_total."</td>";
						${"wordwise_total".$i} += $class_word_total;
						${"total_".$class} += $class_word_total;
						$overall_total += $class_word_total;
						if($bgcolor=="#FFFFFF")
							$bgcolor="#EEE9E9";
						else 
							$bgcolor="#FFFFFF";
					}
					
					$query = "SELECT sum(frequency) as overallfrequency FROM hindi_word_frequency WHERE word='$words[$i]'";
					$dbquery = new dbquery($query,$connid);
					$row = $dbquery->getrowarray();
					${"wordwise_total".$i} = round(($row["overallfrequency"]/$overalltotalwords)*10000,2);
					$output_string .="<td bgcolor='#FFBBFF' align='center'>${"wordwise_total".$i}</td></tr>";
				}
			} // for($i=0;$i<$totalwords;$i++)
			
			
			// Row for total starts here
			$bgcolor = "#EEE9E9";
			$output_string .= "<tr><td colspan='2' align='center'><b>Total</b></td>";
			for($index=0;$index<$totalclasses;$index++)
			{
				$class = $distintclasses[$index];
				for($j=0;$j<$totalstates;$j++)
				{
					$state = str_replace(" ","",$distintstates[$j]);
					if(${$state.$class."_totalwords"}==0) continue; // Don't consider states where no words are there
					
					/*if(${$state.$class."_totalwords"} !=0)
						$freqency_percentage = round((${$state.$class."_total"}/${$state.$class."_totalwords"})*10000,2);
					else 
						$freqency_percentage = 0;
					
					$output_string .="<td align='center' bgcolor='$bgcolor'><b>".$freqency_percentage."</b></td>";
					$output_string .="<td align='center' bgcolor='$bgcolor'><b>".${$state.$class."_total"}."</b></td>";
					*/
					
					$output_string .="<td align='center' bgcolor='$bgcolor'>&nbsp;</b></td>";
					
				}
				$output_string .= "<td bgcolor='#FFE1FF' align='center'><b>".${"total_".$class}."</b></td>";
				if($bgcolor=="#FFFFFF")
					$bgcolor="#EEE9E9";
				else 
					$bgcolor="#FFFFFF";
			}
			$output_string .= "<td align='center' bgcolor='#FFBBFF'>&nbsp;</b></td>";
			//$output_string .= "<td align='center' bgcolor='#FFBBFF'><b>".$overall_total."</b></td>";
			// Row for total ends here
			
			$output_string .= "</tr></table>";
			echo $output_string;
			
			// Most commonly used words orderwise
			$output_string  = "<br><br><table border=1 style='border-collapse: collapse' align='center'>";
			$output_string .= "<tr><td align='center' colspan='3'><b><u>Most Commonly Used Words</u></b></td><tr>";
			$output_string .= "<tr><td><b>Sr. No.</b></td><td><b>Word</b></td><td><b>Frequency Count</b></td></tr>";
			$mostcommonwords_array = array();				
			for($i=0;$i<$totalwords_file;$i++)
			{
				$junkcharater = $this->resolveJunkCharacters($words[$i]);
				if($junkcharater==1) // If junk words coming from text file then ignore them 
					continue;
				$mostcommonwords_array[$i] = ${"wordwise_total".$i};
			}
			arsort($mostcommonwords_array);
			$srno=1;
			foreach ($mostcommonwords_array as $key => $value)
			{
				$output_string .= "<tr><td align='center'>".$srno."</td><td>".$filewords[$key]."</td><td align='center'>".$value."</td></tr>";
				$srno++;
			}
			
			//print_r ($mostcommonwords_array);
			$output_string .= "</table>";
			echo $output_string;
		} // if($this->action == "Count Frequency of Words")
    }
    
    /* 
    	Function called from hsconvertesacpetohindi.php
    	Added by Arpit (26/10/2007), to convert escaped words in database to unicode (Hindi words annd write them in excel file)
    */ 
    function pageConvertEscapeToHindi($connid)
    {
    	$this->setpostvars();
    	if($this->action == "Convert Escape To Hindi")
    	{
    		$escapedString = "";
    		$query  = "SELECT DISTINCT word FROM hindi_word_frequency"; 
			//echo $query."<br><br>";
			
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$escapedWord = $row["word"];
				$escapedString .= $escapedWord.",";
			}
			$escapedString = substr($escapedString,0,-1);
			$escapedString = str_replace("\\","%",$escapedString);
			
			echo "<form name='unescapestring' method='POST'>";
			echo "<input type='hidden' name='clsspellchekaddwords_action'>";
			echo "<input type='hidden' name='clsspellchekaddwords_unescaped_data'>";
			echo "<input type='hidden' name='clsspellchekaddwords_ucode_data'>";
			echo "<script>unescapestring('".$escapedString."')</script></form>";
    	}
 	    
    	if($this->action == "Write Hindi Words To Excel")
    	{
			
    		$distinctwordsfileXLS = "Digitized Hindi Text Books/DistinctHindiWords/distinctwords.xls";
			$distinctwordsfileHTML = "Digitized Hindi Text Books/DistinctHindiWords/distinctwords.html";
			$fp1 = fopen($distinctwordsfileHTML,"w");
			$hindiwordsArray = explode(",",$this->unescapeddata);
			$ucodewordsArray = explode(",",$this->ucodedata);
			
			$stateshortname = array();
			$stateshortname["Bihar"] = "BH"; $stateshortname["Uttaranchal"] = "UT"; $stateshortname["Chhatisgarh"] = "CSG"; 
			$stateshortname["Madhya Pradesh"] = "MP"; $stateshortname["Rajasthan"] = "RJ";
			
			$totalHindiWords = count($hindiwordsArray);
			$distintstates = $this->fetchdistinctstates($connid);
			$distintclasses = $this->fetchdistinctclasses($connid);
			$totalclasses = count($distintclasses);
			$totalstates = count($distintstates);
			$totalcolumns = $totalclasses * $totalstates + 2;
			$colspan = $totalcolumns / $totalclasses;
			
			$output_class_row = "<tr><td>&nbsp;</td><td>&nbsp;</td>";
			$output_state_row = "<tr><td>Sr. No.</td><td>Word</td>";
			$fileDataHTML  = "<table border=1 style='border-collapse: collapse' align='center'>";
			$fileDataHTML .= "<tr><td colspan='".$totalcolumns."' align='center'><b><u>Distinct Hindi Words</u></b></td></tr>";
			
			for($ic=0;$ic<$totalclasses;$ic++)
			{
				$output_class_row .= "<td colspan='".$colspan."' align='center'><b>".$distintclasses[$ic]."</b></td>";
				for($is=0;$is<$totalstates;$is++)
				{
					$output_state_row .= "<td align='center'>".$stateshortname[$distintstates[$is]]."</td>";
				}
			}
			
			$output_class_row .= "</tr>";
			$output_state_row .= "</tr>";
			$fileDataHTML .= $output_class_row.$output_state_row;
			$srno=1;
			
			for($index=0;$index<$totalHindiWords;$index++)
			{
				$wordwiserow = "<tr><td align='center'>".$srno."</td><td>".$hindiwordsArray[$index]."</td>";
				$ucodeword = str_replace("%","\\\\",$ucodewordsArray[$index]);
				$query = "SELECT frequency, class, state FROM hindi_word_frequency WHERE word='".$ucodeword."' GROUP BY class,state";
				$dbquery = new dbquery($query,$connid);
				for($ic=0;$ic<$totalclasses;$ic++)
				{
					$class = $distintclasses[$ic];
					for($is=0;$is<$totalstates;$is++)
					{
						$state = $distintstates[$is];	
						${$state.$class} = 0;
					}
				}
				while($row = $dbquery->getrowarray())
				{
					${$row["state"].$row["class"]} = $row["frequency"];
				}
				
				for($ic=0;$ic<$totalclasses;$ic++)
				{
					for($is=0;$is<$totalstates;$is++)
					{
						$wordwiserow .= "<td align='center'>".${$distintstates[$is].$distintclasses[$ic]}."</td>";
					}
				}

				$wordwiserow .= "</tr>";
				$fileDataHTML .= $wordwiserow;
				$srno++;
				
				if($index==5) break;
			}	
			
			$fileDataHTML .= "</table>";
			$fileDataHTML .= "<br><table border=1 style='border-collapse: collapse' align='center'>";
			$fileDataHTML .= "<tr><td colspan='4' align='center'><b><u>Total number of words in each book</u></b></td></tr>";
			$fileDataHTML .= "<tr><td align='center'><b>Sr. No.</b></td><td align='center'><b>Class</b></td><td align='center'><b>State</b></td><td align='center'><b>Total Words</b></td></tr>";
			
			$srno=1;
			$query  = "SELECT state,class,totalwords FROM hindi_stateclasswise_totalwords ORDER BY state,class"; 
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				$fileDataHTML .= "<tr><td align='center'>".$srno."</td><td align='center'>".$row["class"]."</td><td>".$row["state"]."</td><td align='center'>".$row["totalwords"]."</td></tr>";
				$srno++;
			}
			
			$fileDataHTML .= "</table>";
			echo $fileDataHTML;
			fwrite($fp1,"$fileDataHTML");
			echo "<center><br><font face='verdena' size='2' color='red'>".$distinctwordsfileHTML." created successfully...</font></cener>";
    	}
    }
    	
    function parseString()
    {
    	$strings = trim($this->ucodedata);
		$words = split('%20',$strings);
		$strings = str_replace("%20"," ",$strings);
		
		// Interlinear annotation
		$strings = str_replace("%uFFF9"," ",$strings); // marks start of annotated text
		$strings = str_replace("%uFFFA"," ",$strings); // marks start of annotating character(s)
		$strings = str_replace("%uFFFB"," ",$strings); // marks end of annotation block
		
		// Replacement characters
		$strings = str_replace("%uFFFC"," ",$strings); // used as placeholder in text for an otherwise unspecified object
		$strings = str_replace("%uFFFD"," ",$strings); // used to replace an incoming character whose value is unknown or unrepresentable 
		                                               // in Unicode compare the use of 001A  as a control
		                                               // character to indicate the substitute function
		// Not character codes                                               
		$strings = str_replace("%uFFFE"," ",$strings); // the value FFFE  is guaranteed not to be a Unicode character at all
		$strings = str_replace("%uFEFF"," ",$strings); // may be used to detect byte order by contrast with FEFF  which is a character? FEFF  zero width no-break space
		$strings = str_replace("%uFFFF"," ",$strings); // the value FFFF  is guaranteed not to be a Unicode character at all
		$strings = trim($strings);
		$words = split(' ',$strings);
		return $words;
    }
    
    function replaceDaDot($tmpWord)
    {
    	$tmpWord = str_replace("\\\\u0921\\\\u093C","\\\\u095C",$tmpWord); // d
		$tmpWord = str_replace("\\\\u0958","\\\\u0915",$tmpWord); // k
		$tmpWord = str_replace("\\\\u0959","\\\\u0916",$tmpWord); // kh
		$tmpWord = str_replace("\\\\u095A","\\\\u0917",$tmpWord); // g
		$tmpWord = str_replace("\\\\u095D","\\\\u0922",$tmpWord); // dh
		$tmpWord = str_replace("\\\\u095E","\\\\u092B",$tmpWord); // ph
		$tmpWord = str_replace("\\\\u095F","\\\\u092F",$tmpWord); // y
		return $tmpWord;
    }
    
    function insertwords($connid)
    {
    	$selectedwords = array();
    	$this->selectedwords = substr($this->selectedwords,0,-1);
    	$this->selectedwords = str_replace("u","\\\\u",$this->selectedwords);
    	$selectedwords = explode("-",$this->selectedwords);
    	
    	for($index=0;$index<count($selectedwords);$index++)
    	{
	    	$query = "INSERT INTO hindi_dictionary SET lang_code=3,word='$selectedwords[$index]',ucode='',new='1'";
			$dbquery = new dbquery($query,$connid);
    	}
    	if($index>0)
    		echo "<br><center><font color='red' face='verdana' size='1'>".$index." new word/s added to dictionary.</font></center>";
    }
    
    /*
    Function to ignore junk words coming from hindi text file starts here - Arpit 24/10/2007
    */
    function resolveJunkCharacters($word)
	{
		$charatersArray = array();
		$charatersArray = explode("\\\\",$word);
		$junkcharater = 0;
		for($charIndex=1;$charIndex<count($charatersArray);$charIndex++)
		{
			if(substr($charatersArray[$charIndex],0,2)!='u0')
			{
				$junkcharater=1; break;						
			}
		}
		return $junkcharater;
	}
	
	function make_unique_array($words_tmp,$filewords_tmp,&$words,&$filewords)
	{	
		$unique_array = array();
		for($i=0;$i<count($words_tmp);$i++)
		{
			if(!in_array($words_tmp[$i],$words))
			{
				array_push($words,$words_tmp[$i]);
				array_push($filewords,$filewords_tmp[$i]);
			}
		}
	}
	function fetchdistinctstates($connid)
	{
		$query = "SELECT DISTINCT state FROM hindi_word_frequency";
		$dbquery = new dbquery($query,$connid);
		$statearray = array();
		while($row = $dbquery->getrowarray())
		{
			array_push($statearray,$row["state"]);
		}
		return $statearray;
	}
	
	function fetchdistinctclasses($connid)
	{
		$query = "SELECT DISTINCT class FROM hindi_word_frequency";
		$dbquery = new dbquery($query,$connid);
		$classarray = array();
		while($row = $dbquery->getrowarray())
		{
			array_push($classarray,$row["class"]);
		}
		return $classarray;
	}
}
?>