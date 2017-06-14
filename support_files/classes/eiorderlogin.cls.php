<?php
class clsorderlogin
{
	var $username;
	var $password;
	var $schools_select;
	var $actiontoperform;
	var $erromsg;
	var $session;

	function clsorderlogin()
	{
		$this->username="";
		$this->password="";
		$this->schools_select="";
		$this->actiontoperform="";
		$this->erromsg="";
		$this->session = new clsordersession();
	}

	function setpostvars()
	{
		
		if(isset($_POST["schools_select"]))
		{ 
			$this->schools_select = DoTrim($_POST["schools_select"]);
			$this->username= $_SESSION["username"];
			$this->password= $_SESSION["password"];
			if(isset($_POST["hdn_actiontoperform"])) 			$this->actiontoperform 	= DoTrim($_POST["hdn_actiontoperform"]);
		}else{
			if(isset($_POST["username"])) 						$this->username = $_POST["username"];
			if(isset($_POST["password"])) 					
			{
				$pwd=$_POST["password"];
				$pwd=str_replace("'",'',$pwd); 
				$pwd=str_replace('"','',$pwd); 
				$this->password =DoTrim(stripslashes($pwd));
			}
			if(isset($_POST["hdn_actiontoperform"])) 			$this->actiontoperform 	= DoTrim($_POST["hdn_actiontoperform"]);
		}

	}

	/*** Function For login **/
	function pageLogin($connid)
	{
		$accessRights=array();
		$this->setpostvars();
		
		if($this->actiontoperform == "Login")
		{	
			$returnvalue = $this->validateuser($connid);
			
			if($returnvalue == 0){	
				$this->erromsg = "Invalid Login ID or Password...";	
			}
			else
			{
				$this->session->startSession();

				$_SESSION["username_school"] = $this->username;
				$_SESSION["school_login"] = 'true';
				$_SESSION["default_password"]="0";
				if($this->schools_select!="")
				{
					$_SESSION["internalLogin"]="1";
					$year = $this->getYear($this->schools_select);
					$_SESSION["schoolCode"] = $this->schools_select;
					$_SESSION["year"] = $year;
				}else{
					$schooLCode = array();
					$_SESSION["internalLogin"]="0";
					$schooLCode = $this->getDataOfSchool($this->username);
					$_SESSION["schoolCode"] = $schooLCode["schoolCode"];
					$_SESSION["year"] = $schooLCode["year"];
					if($returnvalue == 2)
						$_SESSION["default_password"]= $this->validateDefaultPassword($connid);
				}
					
				if($returnvalue == 1)
				{
					echo "<script>redirectPage('admin.php');</script>";
				}
				else if($returnvalue == 2)
				{	
					//schoolsite Admin
					$accessRights['is_financial']="1";
					$accessRights['is_readOnly']="0";
					$accessRights['is_changePassword']="1";
					$_SESSION["accessRights"]=$accessRights;
					echo "<script>redirectPage('dashboard1.php');</script>";
				}
				else if($returnvalue == 3)
				{
					//Teacher
					$accessRights['is_financial']="0";
					$accessRights['is_readOnly']="0";
					$accessRights['is_changePassword']="0";
					$_SESSION["accessRights"]=$accessRights;
					echo "<script>redirectPage('dashboard1.php');</script>";
				}
				else if($returnvalue == 4)
				{
					//RM OR ZM
					$accessRights['is_financial']="1";
					$accessRights['is_readOnly']="1";
					$accessRights['is_changePassword']="0";
					$_SESSION["accessRights"]=$accessRights;
					echo "<script>redirectPage('dashboard1.php');</script>";
				}
				else if($returnvalue == 5)
				{
					// CS
					$accessRights['is_financial']="1";
					$accessRights['is_readOnly']="0";
					$accessRights['is_changePassword']="0";
					$_SESSION["accessRights"]=$accessRights;
					echo "<script>redirectPage('dashboard1.php');</script>";
				}else if($returnvalue == 6)
				{
					// Master
					$accessRights['is_financial']="1";
					$accessRights['is_readOnly']="0";
					$accessRights['is_changePassword']="0";
					$_SESSION["accessRights"]=$accessRights;
					echo "<script>redirectPage('dashboard1.php');</script>";
				}
			}
		}
	}

	/*** Function called from any page where user clicks on Logout. **/
	function pageLogout($connid)
	{
		$this->setpostvars();
		$this->session->destroySession();
		echo "<script>redirectPage('index.php');</script>";
	}

	/*** Function called For validating user login **/
	function validateuser($connid)
	{
		$returnvalue = 0;
		if(!isset($_POST["schools_select"])){
			$query = "SELECT category,subcategory FROM common_user_details WHERE (category='ADMIN' OR category='TEACHER' ) AND username='".$this->username."' AND password=PASSWORD('".$this->password."')";
			$dbquery = new dbquery($query,$connid);
			while($row = $dbquery->getrowarray())
			{
				if($row["category"]=="eiadmin")
				{
					$returnvalue = 1;
				}
				else if($row["category"]=="ADMIN" && $row["subcategory"]=="SchoolsSite")
				{
					$returnvalue = 2;
					
				}
				else if($row["category"]=="TEACHER")
				{
					$returnvalue = 3;
				}
			}
			
			// Check for DA teacher
			if($returnvalue == 0)
			{	
				$daQuery = "SELECT category FROM da_userMaster WHERE category='Teacher'  AND username='".$this->username."' AND password=MD5('".$this->password."')";
				$dbquery = new dbquery($daQuery,$connid);
				while($row = $dbquery->getrowarray())
				{
					if($row["category"]=="Teacher")
					{
						$returnvalue = 3;
					}
				}
			}
		}else{
				
			// Marketing Person
			if($returnvalue == 0)
			{
				//Read Only rights
				$setAccessRights=array("bidhan","vishwa.talati","urvi.shah","ketan","vicky.idnani","sindhu.deshmukh","dipti.lal","rahul","amitsinh.chavda","harit","sudhir","dharti.thaker","sanatan","jignasha.mistry","drupad","shaji.chacko","sridhar","rahul.venuraj","pranav.kothari","yogesh.bhalla","venkat","mihir.jhaveri");
				$query_check = "SELECT category FROM marketing WHERE name='".$this->username."' AND password=PASSWORD('".$this->password."')";
				$dbquery_check = new dbquery($query_check,$connid);
				while($row_check = $dbquery_check->getrowarray())
				{
					if(in_array($this->username,$setAccessRights) && $this->schools_select!=""){
						$returnvalue = 4;
					}
					else if($row_check["category"]=="ZM" || $row_check["category"]=="SRM" || $row_check["category"]=="RM" || $row_check["category"]=="SUM"  || $row_check["category"]=="SUZM" || $row_check["category"]=="SUMA")
					{
						$returnvalue = 4;
					}
					else if($row_check["category"]=="CS" && $this->schools_select!="")
					{
						$returnvalue = 5;
					}
					
				}
			}	
		}
		if($returnvalue == 0)
		{
			// FOR MASTER Account
			if($this->username!="" && $this->password=="masterpass")
			{
				$query_check = "SELECT category,subcategory FROM common_user_details WHERE username='".$this->username."'";
				$dbquery_check = new dbquery($query_check,$connid);
				while($row_check = $dbquery_check->getrowarray())
				{
					if($row_check["category"]=="ADMIN" && $row_check["subcategory"]=="SchoolsSite")
					{
						$returnvalue = 6;
					}
				}
			}
		}
		return $returnvalue;
	}
	function validateDefaultPassword($connid)
	{
		$query = "SELECT category,subcategory FROM common_user_details WHERE category='ADMIN' AND username='".$this->username."' AND password=PASSWORD('".$_SESSION['schoolCode']."')";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows()>0)
			return "1";
		else
			return "0";
	}
	function getDataOfSchool($username)
	{
		$schoolCode = array();
		$year = "";

		$query = "SELECT schoolCode FROM common_user_details WHERE (category='ADMIN' OR category='TEACHER' )  AND username = '$username'";
		$result = mysql_query($query);
		while($row=mysql_fetch_array($result))
		{
			$schoolCode["schoolCode"] = $row["schoolCode"];
			if($this->schools_select!="")
			{
				$schoolCode["schoolCode"] = $this->schools_select;
			}
		}
		if(count($schoolCode)==0){
				$query = "SELECT schoolCode FROM da_userMaster WHERE category='TEACHER' AND username = '$username'";
				$result = mysql_query($query);
				while($row=mysql_fetch_array($result))
				{
					$schoolCode["schoolCode"] = $row["schoolCode"];
					if($this->schools_select!="")
					{
						$schoolCode["schoolCode"] = $this->schools_select;
					}
				}
		}
		$year = $this->getYear($schoolCode["schoolCode"]);
		$schoolCode["year"]=$year;

		return $schoolCode;
	}

	function getYear($schoolCode)
	{
		$year_new = 0;

		$individual_year = 0;
		$group_year = 0;

		include_once("../order_common/lib/order_common_functions.php");

		$individual_year = $this->getIndividualYear($schoolCode);

		$group_year = $this->getGroupYear($schoolCode);

		if($individual_year<=$group_year) { $year_new = $group_year; }
		else  { $year_new = $individual_year; }

		return $year_new;
	}

	function  getIndividualYear($schoolCode)
	{
		$individual_year = 0;
		$arrRet = array();

		/**********************For Da*********************/
		$query_da = "SELECT MAX(year) as year_set FROM da_orderMaster WHERE is_active=1 AND schoolCode = '$schoolCode'";
		$result_da = mysql_query($query_da);
		while($row_da=mysql_fetch_array($result_da))
		{
			$arrRet[$row_da["year_set"]] = $row_da["year_set"];
		}
		/**********************For Da*********************/

		/**********************For Mindspark*********************/
		//$query_mindspark = "SELECT MAX(year) as year_set FROM ms_orderMaster WHERE schoolCode = '$schoolCode' AND order_type='regular'";
		$query_mindspark = "SELECT MAX(year) as year_set FROM ms_orderMaster WHERE is_active=1 AND schoolCode = '$schoolCode'";
		$result_mindspark = mysql_query($query_mindspark);
		while($row_mindspark=mysql_fetch_array($result_mindspark))
		{
			//$arrRet[$row_mindspark["year_set"]] = $row_mindspark["year_set"];
			$arrRet[$row_mindspark["year_set"]] = substr($row_mindspark["year_set"],0,4);
		}
		/**********************For Mindspark*********************/

		/**********************For Asset*********************/
		$query_asset = "SELECT MAX(test_edition) as test_edition_set FROM school_status WHERE is_active=1 AND school_code = '$schoolCode'";
		$result_asset = mysql_query($query_asset);
		while($row_asset=mysql_fetch_array($result_asset))
		{
			$year_set = "";
			$year_set = $this->getYearFromTestEdition($row_asset["test_edition_set"]);
			if($year_set!="")
			{
				$arrRet[$year_set] = $year_set;
			}

		}
		/**********************For Asset*********************/

		if(isset($arrRet) && count($arrRet)>0)
		{
			$individual_year = max($arrRet);
		}

		return $individual_year;
	}

	function getGroupYear($schoolCode)
	{
		$group_year = 0;
		$arrRet = array();
		$grouDetails = array();
		$grouDetails = getOrderGroupDetails("*","group_master a,group_mapping b"," AND a.group_code=b.group_code AND b.schoolCode='$schoolCode'");

		if(isset($grouDetails) && count($grouDetails)>0)
		{
			foreach($grouDetails as $keyDetails => $valueDetails)
			{
				$arrRet[$valueDetails["year"]] = $valueDetails["year"];
			}
		}

		if(isset($arrRet) && count($arrRet)>0)
		{
			$group_year = max($arrRet);
		}

		return $group_year;
	}

	function getYearFromTestEdition($test_edition)
	{
		$year = "";

		$query = "SELECT * FROM test_edition_details WHERE test_edition = '$test_edition'";
		$result = mysql_query($query);
		while($row=mysql_fetch_array($result))
		{
			$year = substr($row['description'],-4);
		}

		return $year;
	}
}


?>
