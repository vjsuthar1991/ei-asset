<?php
class clsaqadlogin
{
	var $password;
	var $email;
	var $action;
	var $error;
	var $class;
	var $session;
	var $id;
	function clsaqadlogin()
	{
		$this->email="";
		$this->password="";
		$this->action="";
		$this->error="";
		$this->class="";
		$this->session = new clssession();
		$this->id = "";
  	}
	
	function setpostvars()
	{
		if(isset($_POST["clsaqadlogin_email"])) $this->email = trim($_POST["clsaqadlogin_email"]);
		if(isset($_POST["clsaqadlogin_password"])) $this->password = trim($_POST["clsaqadlogin_password"]);
		if(isset($_POST["clsaqadlogin_hdnaction"])) $this->action = trim($_POST["clsaqadlogin_hdnaction"]);
		if(isset($_POST["clsaqadlogin_hdnclass"])) $this->class = trim($_POST["clsaqadlogin_hdnclass"]);
    }
	function setgetvars()
	{
		if(isset($_GET["id"])) $this->id = trim($_GET["id"]);
		if(isset($_GET["class"])) $this->class = trim($_GET["class"]);
		//print_r($_GET);
	}
	function pageUserLogin($connid)
	{
		$this->setgetvars();
		$this->setpostvars();
		if($this->action == "UserLogin")
		{
			$returnvalue = $this->validateuser($connid);
			if($returnvalue == "")
				$this->error = "Invalid Login ID or Password...";
			else 
			{
				$this->session->startSession();
				$_SESSION["userid"] = $returnvalue;
				$this->saveLoginDetails($connid);
				if($returnvalue != "")
					echo "<script>window.location= 'http://".DOMAIN."/aqad/asset_question_a_day.php?id=".$this->id."'</script>";
			}
		}
		elseif($this->action == "SendPassword" && $this->email != "")
		{
			$this->sendUserPassword($connid);
		}
	}
	function savedata($connid)
	{
		$queryCheck = "SELECT count(*),school_code FROM aqad_registrationDetails_temp WHERE (studentemail = '".$this->email."' OR parentemail = '".$this->email."') AND mailsent IN (0,1)";
		$dbqueryCheck = new dbquery($queryCheck,$connid);
		$rowCheck = $dbqueryCheck->getrowarray();
		
		$query = "SELECT count(*) FROM aqad_loginDetails WHERE emailid = '".$this->email."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($rowCheck[0] > 0 && $row[0] == 0)
		{
			$password = $this->generatePassword(5);
			$queryInsert = "INSERT INTO aqad_loginDetails SET emailid = '".$this->email."',password = '".$password."',school_code = '".$rowCheck["school_code"]."',entered_dt = NOW(),entered_by = 'user'";
			$dbqueryInsert = new dbquery($queryInsert,$connid);
		}
	}
	//Function to store the login details....
	function saveLoginDetails($connid)
	{
		$query = "INSERT INTO aqad_signinlogDetails SET emailid = '".$_SESSION["userid"]."',start_time = NOW() ";
		$dbquery = new dbquery($query,$connid);
		$_SESSION['loginid'] = $dbquery->insertid;
	}
	function saveLogoutDetails($connid)
	{
		$query = "UPDATE aqad_signinlogDetails SET end_time = NOW() WHERE id = '".$_SESSION["loginid"]."' AND emailid = '".$_SESSION["userid"]."' LIMIT 1";
		$dbquery = new dbquery($query,$connid);
		//exit;
	}
	function sendUserPassword($connid)
	{
		$this->savedata($connid);
		$query = "SELECT password FROM aqad_loginDetails WHERE emailid = '".$this->email."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		$to = $this->email;
		//$to = "jaspreet.chhabra@ei-india.com";
		if($row["password"] != "" && $to != "")
		{
			$headers = "MIME-Version: 1.0\r\n";
			$headers.= "From: AQAD<aqad@ei-india.com>\r\n";
			$headers.= "Bcc: aqad@ei-india.com,ovais.ajmeri@ei-india.com\r\n";
			$headers.= "Reply-To: <aqad@ei-india.com>\r\n";
			//$headers.= "Return-Path: asset@ei-india.com\r\n";
			//$headers.= "Return-Receipt-To: asset@ei-india.com\r\n";
			$headers.= "Content-type: text/html; charset=iso-8859-1\r\n";
			$message = "Dear User,<br>";
			$message.="Your Password to access ASSET Question a Day details is :<b>".$row["password"]."</b><br>";
			$message.="Please <a href='http://".DOMAIN."/aqad/login.php?id=".$this->id."'>Click Here</a> to login with the given password<br>";
			$message.="<br>With Warm Regards,<br>ASSET Team.";
			$subject = "Password to Check ASSET Question a Day Details";
			//echo $message;
			if(mail($to, $subject, $message, $headers, "-f bounce@ei-india.com"))
			{
				echo "<div align=center>Your Password has been mailed to you</div><br>";
			}
			else
			{
				echo "<div align=center>Mail could not be sent. Please try again</div><br>";
			}
		}
		else
		{
			echo "<div align=center>You are not eligible for accessing AQAD or your email id not found to be registered with us</div><br>";
		}
	}
	/***
	    Function called from any page where user clicks on Logout. Added by Arpit (23/12/2007)
    **/
    function pageUserLogout($connid)
	{
		$this->setpostvars();
		$this->saveLogoutDetails($connid);
		$this->session->destroySession();
		echo header("Location:http://".DOMAIN."/aqad/login.php");
	}
	
	/***
	    Function called from pageUserLogin() function. Added by Arpit (18/12/2007) - For validationg user login
    **/
	function validateuser($connid)
	{
		$returnvalue = "";
		//echo $query."A<br>";
		//$query = "SELECT COUNT(*) FROM qmc_registrationdetails WHERE email='".$this->email."' AND password=password('".$this->password."')";
		$query = "SELECT * FROM aqad_loginDetails WHERE emailid='".trim($this->email)."' AND password='".$this->password."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		if($dbquery->numrows() > 0)
		{
			$returnvalue=$row["emailid"];
		}
		
		return $returnvalue;
	}
	function getDecryptedEmail($email,$connid)
	{
		$decrypted_email = "";
		if(isset($email))
		{
			$query = "SELECT emailid FROM aqad_loginDetails WHERE md5(emailid) = '".$email."'";
			$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			$decrypted_email = $row["emailid"];
		}
		return $decrypted_email;
	}
	function generatePassword($plength)
    {
		$pwd="";

		if(!is_numeric($plength) || $plength <= 0)
        {
            		$plength = 8;
        }
        if($plength > 32)
        {
            		$plength = 32;
        }


		$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

		mt_srand(microtime() * 1000000);


		for($i = 0; $i < $plength; $i++)
		{
				$key = mt_rand(0,strlen($chars)-1);
				$pwd = $pwd . $chars{$key};
		}

		for($i = 0; $i < $plength; $i++)
		{
				$key1 = mt_rand(0,strlen($pwd)-1);
				$key2 = mt_rand(0,strlen($pwd)-1);

				$tmp = $pwd{$key1};
				$pwd{$key1} = $pwd{$key2};
				$pwd{$key2} = $tmp;
		}

       return $pwd;
    }
}
?>