<?php

class clsschools
{
	var $schoolid;
	var $schoolname;
	var $country;
	var $state;
	var $city;
	var $territory;
	var $stdcode;
	var $phones;
	var $email;
	var $webpage;
	var $contact_name;
	var $contact_designation;
	var $contact_stdcode;
	var $contact_phone;
	var $contact_email;
	var $address;
	var $pincode;
	var $fax;
	var $mediums;
	var $board;
	var $lower_class;
	var $highest_class;
	var $total_kids;
	var $total_3to10;
	var $total_teachers;
	var $asset_taken;
	var $comments;
	var $action;
	var $entered_by;
	var $modified_by;
	var $approved_by;
	var $entered_at;
	var $modified_at;
	var $visit_date;
	var $monitor;
	var $category;
	var $priority;
	var $region;
	
	function clsschools()
	{
                if(class_exists('clspaging')){
                    $this->clspaging = new clspaging('schoolslist');
                }
		$this->schoolid = 0;
		$this->schoolname = "";
		$this->country = "";
		$this->state = -1;
		$this->city = -1;
		$this->territory = -1;
		$this->stdcode = 0;
		$this->phones = "";
		$this->email = "";
		$this->webpage = "";
		$this->contact_name = "";
		$this->contact_designation = "";
		$this->contact_email = "";
		$this->contact_stdcode = 0;
		$this->contact_phone = 0;
		$this->address = "";
		$this->pincode = 0;
		$this->fax = 0;
		$this->mediums = "";
		$this->board = "";
		$this->lower_class = -1;
		$this->highest_class = -1;
		$this->total_kids = 0;
		$this->total_3to10 = 0;
		$this->total_teachers = 0;
		$this->asset_taken = 0;
		$this->comments = "";
		$this->entered_by = "";
		$this->approved_by = "";
		$this->modified_by = "";
		$this->entered_at = "0000-00-00 00:00:00";
		$this->modified_at = "0000-00-00 00:00:00";
		$this->visit_date = "0000-00-00";
		$this->monitor = "";
		$this->category = "";
		$this->priority = "";
		$this->region = "";
	}
	
	function setgetvars()
	{
		
	}
	
	function setpostvars()
	{
		if(isset($_POST['clsschools_schoolname'])) $this->schoolname=$_POST['clsschools_schoolname'];
		if(isset($_POST['clsschools_country'])) $this->country=$_POST['clsschools_country'];
		if(isset($_POST['clsschools_state'])) $this->state=$_POST['clsschools_state'];
		if(isset($_POST['clsschools_city'])) $this->city=$_POST['clsschools_city'];
		if(isset($_POST['clsschools_territory'])) $this->territory=$_POST['clsschools_territory'];
		if(isset($_POST['clsschools_stdcode'])) $this->stdcode=$_POST['clsschools_stdcode'];
		if(isset($_POST['clsschools_phones'])) $this->phones=$_POST['clsschools_phones'];
		if(isset($_POST['clsschools_email'])) $this->email=$_POST['clsschools_email'];
		if(isset($_POST['clsschools_webpage'])) $this->webpage=$_POST['clsschools_webpage'];
		if(isset($_POST['clsschools_contact_name'])) $this->contact_name=$_POST['clsschools_contact_name'];
		if(isset($_POST['clsschools_contact_designation'])) $this->contact_designation=$_POST['clsschools_contact_designation'];
		if(isset($_POST['clsschools_contact_email'])) $this->contact_email=$_POST['clsschools_contact_email'];
		if(isset($_POST['clsschools_contact_stdcode'])) $this->contact_stdcode=$_POST['clsschools_contact_stdcode'];
		if(isset($_POST['clsschools_contact_phone'])) $this->contact_phone=$_POST['clsschools_contact_phone'];
		if(isset($_POST['clsschools_address'])) $this->address=$_POST['clsschools_address'];
		if(isset($_POST['clsschools_pincode'])) $this->pincode=$_POST['clsschools_pincode'];
		if(isset($_POST['clsschools_region'])) $this->region=$_POST['clsschools_region'];
		if(isset($_POST['clsschools_fax'])) $this->fax=$_POST['clsschools_fax'];
		if(isset($_POST['clsschools_mediums'])) $this->mediums=$_POST['clsschools_mediums'];
		if(isset($_POST['clsschools_board'])) $this->board=$_POST['clsschools_board'];
		if(isset($_POST['clsschools_lower_class'])) $this->lower_class=$_POST['clsschools_lower_class'];
		if(isset($_POST['clsschools_highest_class'])) $this->highest_class=$_POST['clsschools_highest_class'];
		if(isset($_POST['clsschools_total_kids'])) $this->total_kids=$_POST['clsschools_total_kids'];
		if(isset($_POST['clsschools_total_3to10'])) $this->total_3to10=$_POST['clsschools_total_3to10'];
		if(isset($_POST['clsschools_total_teachers'])) $this->total_teachers=$_POST['clsschools_total_teachers'];
		if(isset($_POST['clsschools_asset_taken'])) $this->asset_taken=$_POST['clsschools_asset_taken'];
		if(isset($_POST['clsschools_comments'])) $this->comments=$_POST['clsschools_comments'];
	}
	
	function savedata($connid)
	{
		if($this->schoolid == 0)
		{
			$query = "INSERT INTO schools (schoolname,contact_person_1,designation_1,contact_std_1,contact_no_1,".
					 "contact_mail_1,address,city,pincode,state,country,std_code,phones,fax,email,webpage,board,".
					 "mediums,lowest_class,highest_class,total_kids,total_teachers,kids_in_3to9,visit_date,comments,".
					 "entered_by,modified_by,approved_by,entered_at,modified_at,territory,monitor,category,priority) ".
					 "VALUES ( ".
					 "'".$this->schoolname."',".
					 "'".$this->contact_name."',".
					 "'".$this->contact_designation."',".
					 "'".$this->contact_stdcode."',".
					 "'".$this->contact_phone."',".
					 "'".$this->contact_email."',".
					 "'".$this->address."',".
					 "'".$this->city."',".
					 "'".$this->pincode."',".
					 "'".$this->state."',".
					 "'".$this->country."',".
					 "'".$this->std_code."',".
					 "'".$this->phones."',".
					 "'".$this->fax."',".
					 "'".$this->email."',".
					 "'".$this->webpage."',".
					 "'".$this->board."',".
					 "'".$this->mediums."',".
					 "'".$this->lower_class."',".
					 "'".$this->highest_class."',".
					 "'".$this->total_kids."',".
					 "'".$this->total_teachers."',".
					 "'".$this->total_3to10."',".
					 "'".$this->visit_date."',".
					 "'".$this->comments."',".
					 "'".$this->entered_by."',".
					 "'".$this->modified_by."',".
					 "'".$this->approved_by."',".					 
					 "'".$this->entered_at."',".
					 "'".$this->modified_at."',".
					 "'".$this->territory."',".
					 "'".$this->monitor."',".
					 "'".$this->category."',".
					 "'".$this->priority."' ".
					 ") ";
		}
	}
	// Server side Validations
	function validation($connid)
	{
		if($this->schoolname == "")
			$this->error["schoolname"]  = "School Name is a required field\r\n";
		if($this->city == "")
			$this->error["city"]  = "City is a required field\r\n";
		if($this->phones == "")
			$this->error["phones"]  = "Phone is a required field\r\n";
		if($this->address == "")
			$this->error["address"]  = "Address is a required field\r\n";	
		if($this->state == "")
			$this->error["state"]  = "State is a required field\r\n";
		if($this->region == "")
			$this->error["region"]  = "Region is a required field\r\n";
		if($this->territory == "")
			$this->error["territory"]  = "Territory is a required field\r\n";
	}
	function pageAddEditSchools($connid)
	{
		$this->setpostvars();
		if($this->action == "Savedata")
		{
			if($this->validation($connid))	
			{
				$this->savedata($connid);
			}
		}
	}
	
	function pageGenerateSuggestList($connid)
	{
		$arrRet = array();
		$i = 0;
		$tableName = "schools";
		$this->setpostvars();
		$this->clspaging->setgetvars();
		$this->clspaging->setpostvars();
		$this->clspaging->numofrecsperpage = 500;
		//echo $this->clspaging->currentpage;
		$queryCount = "SELECT count(*) FROM $tableName ";
		$resultCount = mysql_query($queryCount) or die(mysql_error());
		$rowCount = mysql_fetch_array($resultCount);
		$this->clspaging->numofrecs = $rowCount[0];
		if($this->clspaging->numofrecs >0)
		{
			$this->clspaging->getcurrpagevardb();
		}
		
		$query = "SELECT schoolno,schoolname,city,address,state,".
				 "territory,phones,std_code,email,pincode,contact_person_1,contact_mail_1,contact_no_1,contact_std_1 FROM $tableName ORDER BY schoolname ".$this->clspaging->limit;
				 
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$duplicateStrength = 0;
			$dupString = "N";
			$returnString = $this->CheckSchoolDuplication($row["std_code"],$row["phones"],$row["address"],$row["contact_person_1"],$row["contact_std_1"],$row["contact_no_1"],$row["contact_mail_1"],$row["email"],$row["pincode"],$row["schoolno"],$row["schoolname"]);
			$arrSchoolcodes = explode('|',$returnString);
			$Schoolcodes = $arrSchoolcodes[0];
			$dupString = $arrSchoolcodes[1];
			$duplicateStrength = $arrSchoolcodes[2];
			
			/*if($duplicateStrength >= 1)
			{*/
				$arrRet[$row["schoolno"]] = array("schoolno" => $row["schoolno"],
												  "schoolname" => $row["schoolname"],
												  "city" => $row["city"],
												  "address" => $row["address"],
												  "state" => $row["state"],
												  "pincode" => $row["pincode"],
												  "territory" => $row["territory"],
												  "std_code" => $row["std_code"],
												  "phones" => $row["phones"],
												  "contact_person_1" => $row["contact_person_1"],
												  "email" => $row["email"],
												  "duplicateStrength"=>$duplicateStrength,
												  "dupString"=>$dupString,
												  "schoolmatchString"=>$Schoolcodes,
												  "contact_person_1"=>$row["contact_person_1"]
												  );
			/*}*/
		
		}
		/*echo "<pre>";
			print_r($arrRet);
		echo "<pre>";*/
		
		return $arrRet;
	}
	function ValidationCases($connid,$phone,$std_code,$address,$email,$pincode,$contact_person)
	{
		$duplicateStrength = 0;
		$dupString = "N";
		if($phone!= "" && $std_code!= "")
		{
			$phone = str_replace(" ", "", $phone);
			$phone_arr = split(",", $phone);
			// Phone Case starts here
			if(is_array($phone_arr) && count($phone_arr) >0)
			{
				$query_phone = "SELECT COUNT(*) FROM schools WHERE ";
		
				for($indx = 0; $indx <= count($phone_arr)-1; $indx++)
				{
					if(strlen($phone_arr[$indx]) >= 5)
					{
						$query_phone .= "((phones LIKE '%".trim(substr($phone_arr[$indx], 0, 5))."%' OR ";
						$query_phone .= "phones LIKE '%".trim(substr($phone_arr[$indx], 1, 5))."%') ";
						$query_phone .= "AND std_code='$std_code') OR";
					}
				}
				$query_phone = substr($query_phone, 0, -3);
				//echo $query_phone;
				$dbquery_phone = new dbquery($query_phone,$connid);
				$row_phone = $dbquery_phone->getrowarray();
				if ($row_phone[0] > 1)
				{
					$duplicateStrength++;
					$dupString.="P";
				}
			}
		}
		if($address!= "")
		{
			//$address = str_replace(" ", "", $address);
			$address_arr = split(",", $address);
			//print_r($address_arr);
			$query_address = "SELECT COUNT(*) FROM schools WHERE ";
			if(is_array($address_arr) && count($address_arr) >0)
			{

				for($indx = 0; $indx <= count($address_arr)-1; $indx++)
				{
					if(trim(addslashes($address_arr[$indx])) != "")
						$query_address .= " address LIKE '%".trim(addslashes($address_arr[$indx]))."%' OR";
				}
				$query_address = substr($query_address, 0, -3);
				//echo $query_address;
				//exit;
				$dbquery_address = new dbquery($query_address,$connid);
				$row_address = $dbquery_address->getrowarray();
				if ($row_address[0] > 1) 
				{
					$duplicateStrength++;
					$dupString.="A";
				}
			}
		}
		if($contact_person != "")
		{
			$query_contact_person = "SELECT * FROM schools WHERE contact_person_1 LIKE '%".addslashes($contact_person)."%'";
			$dbquery_contact_person = new dbquery($query_contact_person,$connid);
			if ($dbquery_contact_person->numrows() > 1)
			{
				$duplicateStrength++;
				$dupString.="E";
			}
		}
		/*if($email != "")
		{
			$query_email = "SELECT * FROM schools WHERE email LIKE '%".addslashes($email)."%'";
			$dbquery_email = new dbquery($query_email,$connid);
			if ($dbquery_email->numrows() > 1)
			{
				$duplicateStrength++;
				$dupString.="E";
			}
		}
		if($pincode != "")
		{
			$query_pincode = "SELECT * FROM schools WHERE pincode LIKE '%".$pincode."%'";
			$dbquery_pincode = new dbquery($query_pincode,$connid);
			if ($dbquery_pincode->numrows() > 1)
			{
				$duplicateStrength++;
				$dupString.="C";
			}
		}
		//echo $dupString;	
		return $duplicateStrength.",".$dupString;
	}
	function findDistance($school,$connid)
	{
		$shortest = -1;
		$arrSchool = $this->getAllSchoolNamesByCity($connid,'Delhi');
		foreach ($arrSchool as $word)
		{
			$lev = levenshtein($school, $word);
		}
		// check for an exact match
	   /* if ($lev == 0) {
	
	        // closest word is this one (exact match)
	        $closest = $word;
	        $shortest = 0;
	
	        // break out of the loop; we've found an exact match
	       // break;
	    }
	
	    // if this distance is less than the next found shortest
	    // distance, OR if a next shortest word has not yet been found
	    if ($lev <= $shortest || $shortest < 0) {
	        // set the closest match, and shortest distance
	        $closest  = $word;
	        $shortest = $lev;
	    }*/
		return  $lev;
	}
	function getAllSchoolNamesByCity($connid,$city)
	{
		$arrRet = array();
		$query = "SELECT schoolno,schoolname FROM schools ".
				 "WHERE city = '".$city."' ORDER BY schoolname ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["schoolno"]] = array("schoolname" => $row["schoolname"]);
		}
		return $arrRet;
	}
	function CheckSchoolDuplication($std_code,$officephone,$officeaddress,$contact_p1,$contact_std1,$contact_phone1,$contact_mail1,$email,$pincode,$school_code,$school_name)
	{
		$arrSchools = array();
		$flag = 0;
		$flagAddress = 0;
		$queryName = "SELECT schoolno FROM schools WHERE std_code='$std_code' AND (";
		$arrCommonwords = array("school","public","high","higher","secondary","matriculation","st","saint",
		"international","academy","hr.","st.","primary","medium","senior","junior","english","sr","convent",
		"sr.","mat.","vidyalaya","jr.","jr","mat","the","girls","boys","nursery","model");
		$School_string = "";
		$duplicateStrength = 0;
		$dupFieldArray = array();
		$address = $officeaddress;
		$officephone = str_replace(" ", "", $officephone);

		$phone_arr = split(",", $officephone);

		$str = "SELECT schoolno FROM schools WHERE ";

		for($indx = 0; $indx <= count($phone_arr)-1; $indx++)
		{

			if(strlen($phone_arr[$indx]) >= 5)
			{

				$str .= "((phones LIKE '%".trim(substr($phone_arr[$indx], 0, 7))."%' OR ";

				$str .= "phones LIKE '%".trim(substr($phone_arr[$indx], 1, 7))."%') ";

				$str .= "AND std_code='$std_code' AND schoolno != '$school_code' ) OR";

			}

		}

		$str = substr($str, 0, -3);

		$str .= " ORDER BY schoolno";
		$rs=mysql_query($str) or die(mysql_error());
		//echo mysql_num_rows($rs);
        if(mysql_num_rows($rs) > 0)
		{
			while($row_phone = mysql_fetch_array($rs))
			{
				$arrSchools[]="'".$row_phone["schoolno"]."'";
			}
			$duplicateStrength= $duplicateStrength + 3;
			$dupFieldArray[]="Phone";
		}	
		if($address!= "" && $school_name!= "")
		{
			//$address = str_replace(" ", "", $address);
			$address_arr = split(",", $address);
			$school_name = trim($school_name);
			$name_arr = split(" ", $school_name);
			foreach ($name_arr as $name)
			{
				if(!in_array(strtolower($name),$arrCommonwords))
				{
					if(strlen($name) <= 2 && strcasecmp($name,strtoupper($name)))
					{
						//$flag = 1;
						$shortform.=$name; 
						//$nameString.=$name."&nbsp;";
						
					}
					else if(strlen($name) > 2 && !strcasecmp($name,strtoupper($name)))
					{
						$flag = 1;
						$queryName.= " schoolname LIKE '%".$name."%' AND ";
					}
				}	
			}
			if($shortform != "" && strlen($shortform) > 1)
			{
				$flag = 1;
			}
				
			if($flag == 1 )
			{
				if($shortform != "" && strlen($shortform) > 1)
					$queryName.= " schoolname LIKE '%".$shortform."%' ";
				else
					$queryName = substr($queryName, 0, -4);
					
					
				$queryName.=" ) AND schoolno != '$school_code' ORDER BY schoolno " ;
				//echo $queryName;
				$result_name = mysql_query($queryName) or die(mysql_error());
				if(mysql_num_rows($result_name) > 0) 
				{
					while($row_name = mysql_fetch_array($result_name))
					{
						$arrSchoolsSameName[]="'".$row_name["schoolno"]."'";
					}
					//$duplicateStrength= $duplicateStrength + 3;
					//$dupFieldArray[]="Address";
				}
				//print_r($arrSchoolsSameName);
			}
			//echo $nameString."<br>";
			//echo $shortform."<br>";
			//print_r($name_arr);
			//print_r($address_arr);
			$query_address = "SELECT schoolno FROM schools WHERE std_code='$std_code' AND ( ";
			if(is_array($address_arr) && count($address_arr) >0)
			{
				if(substr($address, -1, 1) == ',')
				{
					$indxadd = count($address_arr)-1;
					$address_mod = count($address_arr)-1;
				}
				else 
				{
					$indxadd = count($address_arr);
					$address_mod = count($address_arr);
				}
					
				
				//echo count($address_arr);
				while ($indxadd > 0) 
				{
					for($indx = 0; $indx <= count($address_arr)-1; $indx++)
					{
						
						if(trim(addslashes($address_arr[$indx])) != "")
						{
							//echo $indxadd;
							//$indxadd--;
							//$query_address .= " address LIKE '%".trim(addslashes($address_arr[$indx]))."%' AND";
							$query_address.=" SOUNDEX(SUBSTRING_INDEX(SUBSTRING_INDEX(IF(SUBSTRING(address,-1)=',',SUBSTRING_INDEX(address,',',".$address_mod."),address),',',-".$indxadd."),',',1)) = SOUNDEX('".trim(addslashes($address_arr[$indx]))."') OR ";
						}
					}	
					$query_address = substr($query_address, 0, -3);
					$indxadd--;
					$query_address.=" ) AND ( ";
				}
				
				$query_address = substr($query_address, 0, -6);
				$query_address .= " AND schoolno != '$school_code' ORDER BY schoolno ";
				//echo $query_address;
				//exit;
				$result_address = mysql_query($query_address) or die(mysql_error());
				if(mysql_num_rows($result_address) > 0) 
				{
					while($row_address = mysql_fetch_array($result_address))
					{
						if(in_array("'".$row_address["schoolno"]."'",$arrSchoolsSameName))
						{
							//print("entered in to the condition");
							$arrSchools[]="'".$row_address["schoolno"]."'";
							$flagAddress = 1;
						}
					}
					if($flagAddress == 1)
					{
						$duplicateStrength= $duplicateStrength + 3;
						$dupFieldArray[]="Address";
					}
				}
			}
		}
		if($contact_p1 != "" && $contact_p1 != "The Principal" &&($contact_mail1 != "" || ($contact_std1 != "" && $contact_phone1 != "")))	
		{
			$query_contact_person = "SELECT schoolno FROM schools WHERE (contact_person_1 LIKE '%".addslashes($contact_p1)."%' ";
			
			if($contact_mail1 != "")
				$query_contact_person.=" OR contact_mail_1 LIKE '%".addslashes($contact_mail1)."%' ";
			
			if($contact_std1 != "" && $contact_phone1 != "")
				$query_contact_person.=" OR (contact_std_1 ='".$contact_std1."' AND contact_no_1 ='".$contact_phone1."') ";
			
			$query_contact_person .= " ) AND schoolno != '$school_code' AND std_code='$std_code' ORDER BY schoolno ";
			//echo $query_contact_person;
			$result_contact_person = mysql_query($query_contact_person) or die(mysql_error());
			if(mysql_num_rows($result_contact_person) > 0)
			{
				while($row_contact_person = mysql_fetch_array($result_contact_person))
				{
					$arrSchools[]="'".$row_contact_person["schoolno"]."'";
				}
				$duplicateStrength++;
				$dupFieldArray[]="Principal";
			}
		}
		if($email != "")
		{
			$query_email = "SELECT schoolno FROM schools WHERE email LIKE '%".addslashes($email)."%' AND schoolno != '$school_code' ORDER BY schoolno ";
			
			$result_email = mysql_query($query_email);
			if(mysql_num_rows($result_email) > 0)
			{
				while($row_email = mysql_fetch_array($result_email))
				{
					$arrSchools[]="'".$row_email["schoolno"]."'";
				}
				$duplicateStrength++;
				$dupFieldArray[]="Email";
			}
		}
		if($pincode != "")
		{
			$query_pincode = "SELECT schoolno FROM schools WHERE pincode = '".$pincode."' AND schoolno != '$school_code' ORDER BY schoolno ";
			$result_pincode = mysql_query($query_pincode);
			if(mysql_num_rows($result_pincode) > 0)
			{
				/*while($row_pincode = mysql_fetch_array($result_pincode))
				{
					$arrSchools[]=$row_pincode["schoolno"];
				}*/
				$duplicateStrength++;
				$dupFieldArray[]="Pincode";
			}
		}
		//echo "Duplicate Strength: ".$duplicateStrength;
		//print_r($dupFieldArray);
		//print_r(array_unique($arrSchools));
		if(is_array($arrSchools) && count($arrSchools) > 0)
			$arrSchoolsString = $this->Myconvert_array_to_string(array_unique($arrSchools));
		else 
			$arrSchoolsString = "";
		
		if(is_array($dupFieldArray) && count($dupFieldArray) > 0)
			$dupFieldArrayString = $this->Myconvert_array_to_string($dupFieldArray);
		else 
			$dupFieldArrayString = "";
			
		$returnString = $arrSchoolsString.'|'.$dupFieldArrayString.'|'.$duplicateStrength;
		//echo $returnString;
		return $returnString;	
			
	}
	function Myconvert_array_to_string($input)
	{
		$return_string = '';
		foreach ($input as $key => $val)
		{
			$return_string = $return_string.$input[$key].",";
		}
		$len = strlen($return_string);
		$return_string = substr($return_string,0,$len-1);
		if($return_string =='')
		{
			$return_string = '\'\'';
		}
		return $return_string;
	}
	function getSchoolDetailsFromSchoolcodes($connid,$schoolCodes)
	{
		if($schoolCodes == "")
			return;
		$arrRet = array();
		$query = " SELECT * FROM schools WHERE schoolno IN (".$schoolCodes.")";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray()) 
		{
			$arrRet[$row["schoolno"]] = array(	"schoolno"=>$row["schoolno"],
												"schoolname" =>$row["schoolname"],
												"contact_person_1"=>$row["contact_person_1"],
												"contact_mail_1"=>$row["contact_mail_1"],
												"contact_no_1"=>$row["contact_no_1"],
												"contact_std_1"=>$row["contact_std_1"],
												"city"=>$row["city"],
												"std_code"=>$row["std_code"],
												"phones"=>$row["phones"],
												"address"=>$row["address"],
												"territory"=>$row["territory"],
												"email"=>$row["email"],
												"pincode"=>$row["pincode"]																
											 );
		}
		return $arrRet;
	}
	
		/**
        * Function getSchoolsByTextFilter
        *
        * finds schools by filtering on following fields.
        * schoolcode, schoolname, city, pincode, state, phones
        *
        * @param (string) ($month) month number. date('m')
        * @param (string) ($year) year number. date('Y')
        * @return (mixed object) returns the freezed object(record from db) if data for the tuple was freezed else null
        * 
        * @author hitesh
        * @lastupdated 29-04-13 14:00
        *     
        **/
        
        
        public function getSchoolsByTextFilter($query,$projection = array(), $offset = 0, $limit = 20){
            $defaultProjection = array('schoolno');
            if(is_array($projection)){
                $defaultProjection = array_merge($defaultProjection, $projection);
            }
            $projectionStr = implode(",", $defaultProjection);
            $query_schools = "SELECT $projectionStr FROM schools WHERE "
                    . "schoolno = '$query' OR schoolname LIKE '$query%' OR city LIKE '$query%'"
                    . " OR state LIKE '$query%' OR std_code = '$query'"
                    . " LIMIT $limit OFFSET $offset";
            $results = mysql_query($query_schools);
            $schools = array();
            while($school = mysql_fetch_assoc($results)){
                $schools[] = $school;
            }
            return $schools;
        }
	
}// Class Ends here...



?>
