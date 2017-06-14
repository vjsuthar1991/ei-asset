<?php

class clsadminpanel
{
	var $userid;
	var $useridtoassignrights;
	var $fullname;
	var $password;
	var $oldpassword;
	var $confirmpassword;
	var $email;
	var $actiontoperform;
	var $msg;
	var $forgotpassmsg;
	var $rightsassign_message;

	function clsadminpanel()
	{
		$this->userid="";
		$this->useridtoassignrights="";
		$this->fullname;
		$this->password="";
		$this->oldpassword="";
		$this->confirmpassword="";
		$this->email="";
		$this->actiontoperform="";
		$this->msg="";
		$this->forgotpassmsg="";
		$this->rightsassign_message="";
  	}

	function setpostvars()
	{
		if(isset($_POST["userid"])) 							$this->userid   = DoTrim($_POST["userid"]);
		if(isset($_POST["useridtoassignrights"])) 				$this->useridtoassignrights   = DoTrim($_POST["useridtoassignrights"]);
		if(isset($_POST["fullname"])) 							$this->fullname   = DoTrim($_POST["fullname"]);
		if(isset($_POST["password"])) 							$this->password = DoTrim($_POST["password"]);
		if(isset($_POST["oldpassword"])) 						$this->oldpassword = DoTrim($_POST["oldpassword"]);
		if(isset($_POST["confirmpassword"])) 					$this->confirmpassword = DoTrim($_POST["confirmpassword"]);
		if(isset($_POST["email"])) 								$this->email 	= DoTrim($_POST["email"]);
		if(isset($_POST["hdn_actiontoperform"])) 				$this->actiontoperform 	= DoTrim($_POST["hdn_actiontoperform"]);
	}
    /***
	    Function called from bt_adminPanel.php. Added by Arpit (18/12/2007) - For creating admin panel
    **/
    function pageAdminPanel($userid,$usertype,$schoolname,$connid)
	{
		$group_id = 0;
		$output_string  = "<table style='border-collapse: collapse' align='center' bordercolor='#333333'>";
		if($usertype=="School")
		{
			$output_string .= "<tr><td colspan='2' align='center' bgcolor='#bf0000'><b><font size='2' color='#FFFFFF'>SATS Features for ".$schoolname." (School Code: ".ucfirst($userid).")</font></b></td></tr>";
			$output_string .= "<tr><td colspan='2' align='center'><a href='javascript: viewschool(".$userid.")'>View School Profile</a>";
			$output_string .= "&nbsp;&nbsp;<a href='javascript: editschool(".$userid.")'>Edit School Profile</a></td></tr>";
		}
		else 
			$output_string .= "<tr><td colspan='2' align='center' bgcolor='#bf0000'><b><font size='2' color='#FFFFFF'>SATS Features for ".ucfirst($userid)."</font></b></td></tr>";

		$subQuery = "SELECT transaction_id FROM bt_userrights WHERE userid='".$userid."'";
		$rightsQuery = "SELECT * FROM bt_transactions WHERE transaction_id IN (".$subQuery.") AND islistingpage='Y' ORDER BY group_id, transaction_id";
		//echo $rightsQuery; exit;
		$rightsResult = new dbquery($rightsQuery,$connid);
		$srno=0;
		$subsrno=1;
		while($rightsRow = $rightsResult->getrowarray())
		{
			if($group_id != $rightsRow["group_id"])
			{
				$group_id = $rightsRow["group_id"];
				$groupQuery = "SELECT group_name FROM bt_groups WHERE group_id=".$group_id;
				$groupResult = new dbquery($groupQuery,$connid);
				$groupRow = $groupResult->getrowarray();
				$srno++;
				$subsrno=1;

				$output_string .= "<tr><td>&nbsp;</td></tr>";
				$output_string .= "<tr bgcolor='#ff9c00'><td><b>".$srno."</b></td><td><b>".$groupRow["group_name"]."</b></td></tr>";
			}
			$innerSrNo = $srno.".".$subsrno;

			if($rightsRow['transaction_id'] == "11")
			{
			 	if($usertype == "School")
			 	{
					$output_string .= "<tr><td>".$innerSrNo."</td><td>&nbsp;<a href='javascript: showschoolresult(\"".$userid."\")'>".$rightsRow["page_title"]."</a></td></tr>";
					$subsrno++;
			 	}

			}
			elseif($rightsRow['transaction_id'] == "27")
			{
			 	if($usertype == "School")
			 	{
					//$output_string .= "<tr><td>".$innerSrNo."</td><td>&nbsp;<a href='javascript: showschoolresult(\"".$userid."\")'>".$rightsRow["page_title"]."</a></td></tr>";
					//$output_string .= "<tr><td>".$srno."</td><td>&nbsp;School Management</td></tr>";
					
					$innerSrNo++;
					$srno++;
					$output_string .= "<tr><td>&nbsp;</td></tr>";
					$output_string .= "<tr bgcolor='#ff9c00'><td><b>".$srno."</b></td><td><b>School Management</b></td></tr>";
					
					$srno_inn = 1;
					$output_string .= "<tr><td>".$srno.".".$srno_inn."</td><td>&nbsp;<a href='bt_schooltimetableplanner_main.php'>Time Table Planner</a></td></a></td></tr>";
					$srno_inn++;
					$output_string .= "<tr><td>".$srno.".".$srno_inn."</td><td>&nbsp;<a href='bt_schoolholidaysmanager.php'>School Holiday Manager</a></td></a></td></tr>";
					$srno_inn++;
					$output_string .= "<tr><td>".$srno.".".$srno_inn."</td><td>&nbsp;<a href='bt_schoolreportcard.php'>Student Report Card</a></td></a></td></tr>";
					$srno_inn++;
					$output_string .= "<tr><td>".$srno.".".$srno_inn."</td><td>&nbsp;<a href='bt_schoolidentifyweakstudents.php'>Students Who Need Support</a></td></a></td></tr>";
					$srno_inn++;
					$output_string .= "<tr><td>".$srno.".".$srno_inn."</td><td>&nbsp;<a href='bt_schoolextracurricularactivities.php'>Extra - Curricular Activities</a></td></a></td></tr>";
			 	}
			}
			elseif($rightsRow['transaction_id'] == "6")
			{
			 	if($usertype == "Child")
			 	{
					$output_string .= "<tr><td>".$innerSrNo."</td><td>&nbsp;<a href='javascript: viewchild(\"".$userid."\")'>".$rightsRow["page_title"]."</a></td></tr>";
					$subsrno++;
			 	}
			}
			elseif($rightsRow['transaction_id'] == "22") 
			{
				$output_string .= "<tr><td>".$innerSrNo."</td><td>&nbsp;<a href='".$rightsRow['page_link']."' target='_blank'>".$rightsRow["page_title"]."</a></td></tr>";
				$subsrno++;
			}
			elseif($rightsRow['transaction_id'] == "8") 
			{
				if($usertype == "School")
			 	{
					$output_string .= "<tr><td>".$innerSrNo."</td><td>&nbsp;<a href='bt_uploadschooltestdata.php'>".$rightsRow["page_title"]."</a></td></tr>";
					$subsrno++;
			 	}
			 	else 
			 	{
			 		$output_string .= "<tr><td>".$innerSrNo."</td><td>&nbsp;<a href='".$rightsRow['page_link']."'>".$rightsRow["page_title"]."</a></td></tr>";
					$subsrno++;
			 	}
			}
			else
			{
				$output_string .= "<tr><td>".$innerSrNo."</td><td>&nbsp;<a href='".$rightsRow['page_link']."'>".$rightsRow["page_title"]."</a></td></tr>";
				$subsrno++;
			}
		}
		if($srno == 0)
		{
			$output_string  = "<table style='border-collapse: collapse' align='center' bordercolor='#333333'>";
			$output_string .= "<tr><td colspan='2' align='center' bgcolor='#bf0000'><b><font size='2' color='#FFFFFF'>No rights assigned to ".ucfirst($userid)."</font></b></td></tr>";
		}
		$output_string .= "</table>";
		return $output_string;
	}

	/***
	    Function called from bt_listUsers.php. Added by Arpit (23/12/2007) - For showing list of users
    **/
    function pageListUsers($connid)
	{
		$output_string  = "<table style='border-collapse: collapse' align='center' bordercolor='#333333' border='1'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='4' align='center' bgcolor='#bf0000'><b><font color='#FFFFFF'>List Of Current Admin Users</font></b></td></tr>";
		$output_string .= "<tr  bordercolor='#FFFFFF' bgcolor='#ff9c00'><td><b>Sr. No.</b></td><td><b>User Name</b></td><td><b>Full Name</b></td><td><b>Email Address</b></td></tr>";

		$userQuery = "SELECT * FROM bt_users";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td><td>".$userRow['userid']."</td><td>".$userRow['fullname']."</td><td>".$userRow['email']."</td></tr>";
			$srno++;
		}

		$output_string .= "</table>";
		return $output_string;
	}

	/***
	    Function called from bt_deleteUsers.php. Added by Arpit (22/02/2008) - For removing user from the system.
    **/
    function pageDeleteUser($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Delete User")
		{
			if($this->userid != "")
			{
				$query = "DELETE FROM bt_users WHERE userid='".$this->userid."'";
				//echo $query;
				$result = new dbquery($query,$connid);

				$query = "DELETE FROM bt_userrights WHERE userid='".$this->userid."'";
				//echo "<br>".$query;
				$result = new dbquery($query,$connid);
			}
		}

		$output_string  = "<table style='border-collapse: collapse' align='center' bordercolor='#333333' border='1'>";
		$output_string .= "<tr bordercolor='#FFFFFF'><td colspan='5' align='center' bgcolor='#bf0000'><b><font color='#FFFFFF'>List Of Current Admin Users</font></b></td></tr>";
		$output_string .= "<tr  bordercolor='#FFFFFF' bgcolor='#ff9c00'><td><b>Sr. No.</b></td><td><b>User Name</b></td><td><b>Full Name</b></td><td><b>Email Address</b></td><td><b>Action</b></td></tr>";

		$userQuery = "SELECT * FROM bt_users";
		$userResult = new dbquery($userQuery,$connid);
		$srno=1;
		while($userRow = $userResult->getrowarray())
		{
			$output_string .= "<tr bordercolor='#FFFFFF'><td align='center'>".$srno."</td><td>".$userRow['userid']."</td><td>".$userRow['fullname']."</td><td>".$userRow['email']."</td>";
			$output_string .= "<td><a href='javascript: deleteUser(\"".$userRow['userid']."\")'>Delete</a></td></tr>";
			$srno++;
		}

		$output_string .= "</table>";
		return $output_string;
	}

	/***
	    Function called from bt_addUser.php. Added by Arpit (23/12/2007) - For adding new users
    **/
    function pageAddUser($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Add User")
		{
			$userQuery = "SELECT COUNT(*) FROM bt_users WHERE userid='".$this->userid."'";
			$userResult = new dbquery($userQuery,$connid);
			$userRow = $userResult->getrowarray();
			if($userRow[0] == 1)
				$this->msg = "<b>User ".$this->userid." already exist!</b>";
			else
			{
				$insertUserQuery = "INSERT INTO bt_users SET userid='".$this->userid."',fullname='".$this->fullname."',password=password('".$this->password."'),email='".$this->email."'";
				$insertUserResult = new dbquery($insertUserQuery,$connid);
				$this->msg="<b>User created...</b>";
			}
		}
	}

	/***
	    Function called from bt_addUser.php. Added by Arpit (23/12/2007) - For adding new users
    **/
    function pagechangePassword($userid,$usertype,$connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Change Password")
		{
			if($usertype == "Admin")
			{
				$tablename = "bt_users";
				$fieldname = "userid";
			}
			elseif($usertype == "Child")
			{
				$tablename = "student_master";
				$fieldname = "cts_number";
			}
			elseif($usertype == "School")
			{
				$tablename = "school_master";
				$fieldname = "schoolcode";
			}

			$userQuery = "SELECT COUNT(*) FROM ".$tablename." WHERE ".$fieldname."='".$userid."' AND password=password('".$this->oldpassword."')";
			echo $userQuery;
			$userResult = new dbquery($userQuery,$connid);
			$userRow = $userResult->getrowarray();
			if($userRow[0] == 0)
				$this->msg = "Old password is wrong!";
			else
			{
				$updatePassQuery = "UPDATE ".$tablename." SET password=password('".$this->password."') WHERE ".$fieldname."='".$userid."'";
				$updatePassResult = new dbquery($updatePassQuery,$connid);
				$this->msg="Password changed successfully.";
				echo "<script>redirectPage('bt_passwordChangeMessage.php');</script>";
			}
		}
	}

	/***
	    Function called from bt_forgotPassword.php. Added by Arpit (23/12/2007) - For issuing new password to user, send by email
    **/
    function pageForgotPassword($connid)
	{
		$this->setpostvars();
		if($this->actiontoperform == "Forgot Password")
		{
			$userFound=0;
			$tablename="";
			$email="";

			$userQuery = "SELECT * FROM bt_users WHERE userid='".$this->userid."'";
			$userResult = new dbquery($userQuery,$connid);
			$numofrows = $userResult->numrows();
			$userRow = $userResult->getrowarray();
			if($numofrows == 0)
			{
				$userQuery = "SELECT * FROM student_master WHERE cts_number=".$this->userid."";
				$userResult = new dbquery($userQuery,$connid);
				$numofrows = $userResult->numrows();
				$userRow = $userResult->getrowarray();
				if($numofrows == 0)
				{
					$userQuery = "SELECT * FROM school_master WHERE schoolcode=".$this->userid;
					$userResult = new dbquery($userQuery,$connid);
					$numofrows = $userResult->numrows();
					$userRow = $userResult->getrowarray();
					if($numofrows != 0)
					{
						$userFound = 1;
						$tablename = "school_master";
						$fieldname = "schoolcode";
						$email=$userRow['email'];
					}
				}
				else
				{
					$userFound = 1;
					$tablename = "student_master";
					$fieldname = "cts_number";
					$email=$userRow['email'];
				}
			}
			else
			{
				$userFound = 1;
				$tablename = "bt_users";
				$fieldname = "userid";
				$email=$userRow['email'];
			}

			if($userFound == 0)
				$this->msg = "Login ID ".$this->userid." does not exists!";
			else
			{
				if($email == "")
				{
					$this->forgotpassmsg = "Dear ".$this->userid.", We issue you a new password by mail, you have not registered with any valid email address.";
				}
				else
				{
					$newpassword = randomPasswordGenerator();
					//echo $newpassword."<br>";
					$updatePassQuery = "UPDATE ".$tablename." SET password=password('".$newpassword."') WHERE ".$fieldname."='".$this->userid."'";
					//echo $updatePassQuery."<br><br>";
					$updatePassResult = new dbquery($updatePassQuery,$connid);

					// Send mail
					$headers = "From: <system@ei-india.com>\r\n";
					$headers .= "Reply-To: <arpit.metaliya@ei-india.com>\r\n";
					$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
					$subject = "New Password For Bhutan SATS";

					$message = "Dear ".ucfirst($this->userid).",<br><br>Your new password for BHUTAN SATS is ";
					$message .= "<b>".$newpassword."</b>.<br>Kindly log in and change your password at the earliest.";
					$message .= "<br><br>-- Bhutan SATS";
					//echo $message."<br><br>";
					send_mail($email,$subject,$message,$headers);
					$this->forgotpassmsg="New password sent on ".$email.". <a href='bt_userLogin.php'>Please login</a>";
				}
			}
		}
	}

	/***
	    Function called from bt_assignRightsToUsers.php. Added by Arpit (23/12/2007) - For fetching list of users
    **/
	function fetchUsers($connid)
	{
		$userString = "";
		$userQuery = "SELECT userid FROM bt_users ORDER BY userid";
		$userResult = new dbquery($userQuery,$connid);
		while($userRow = $userResult->getrowarray())
		{
			$userString .= $userRow['userid'].",";
		}
		$userString = substr($userString, 0, -1);
		return $userString;
	}

	/***
	    Function called from bt_assignRightsToUsers.php. Added by Arpit (23/12/2007) - For fetching list of users
    **/
	function fetchUserRights($connid)
	{
		$trnString = array();
		$trnQuery = "SELECT transaction_id FROM bt_userrights WHERE userid='".$this->useridtoassignrights."'";
		$trnResult = new dbquery($trnQuery,$connid);
		while($trnRow = $trnResult->getrowarray())
		{
			array_push($trnString, $trnRow['transaction_id']);
		}
		return $trnString;
	}

	/***
	    Function called from bt_assignRightsToUsers.php. Added by Arpit (23/12/2007) - For fetching list of all transactions
    **/
	function fetchAllTransactionsGroupwise($connid)
	{
		$this->setpostvars();
		$userRights = array();
		if($this->useridtoassignrights != "")
			$userRights = $this->fetchUserRights($connid);

		$group_id = 0;
		$output_string = "";
		$rightsQuery = "SELECT * FROM bt_transactions WHERE transaction_id NOT IN (5,27) ORDER BY group_id, transaction_id";
		$rightsResult = new dbquery($rightsQuery,$connid);
		while($rightsRow = $rightsResult->getrowarray())
		{
			if($group_id != $rightsRow["group_id"])
			{
				$group_id = $rightsRow["group_id"];
				$groupQuery = "SELECT group_name FROM bt_groups WHERE group_id=".$group_id;
				$groupResult = new dbquery($groupQuery,$connid);
				$groupRow = $groupResult->getrowarray();
				$output_string .= "<tr><td>&nbsp;</td></tr>";
				$output_string .= "<tr bgcolor='#ff9c00'><td>&nbsp;</td><td><b>".$groupRow["group_name"]."</b></td></tr>";
			}
			if(in_array($rightsRow["transaction_id"], $userRights))
				$output_string .= "<tr><td><input type='checkbox' name='T".$rightsRow["transaction_id"]."' checked></td><td>".$rightsRow["page_title"]."</td></tr>";
			else
				$output_string .= "<tr><td><input type='checkbox' name='T".$rightsRow["transaction_id"]."'></td><td>".$rightsRow["page_title"]."</td></tr>";
		}
		$output_string .= "<tr><td colspan='2' align='center'>&nbsp;</td></tr>";
		$output_string .= "<tr bgcolor='#ff9c00'><td colspan='2' align='center'><input type='button' name='Assing Rights' value='Assign Rights' onclick='assingrigths();'></td></tr>";
		return $output_string;
	}
	/***
	    Function called from bt_assignRightsToUsers.php. Added by Arpit (23/12/2007) - For fetching/assigning transaction rights of/to users
    **/
    function pageAssignRightsToUser($connid)
	{
		$this->setpostvars();

		if($this->actiontoperform == "Assign Rights To User")
		{
			$userRights = $this->fetchUserRights($connid);
			$trnQuery = "SELECT COUNT(*) FROM bt_transactions";
			$trnResult = new dbquery($trnQuery,$connid);
			$trnRow = $trnResult->getrowarray();

			for($index=1;$index<=$trnRow[0]; $index++)
			{
				$var = "T".$index;
				if(isset($_POST[$var]) && !in_array($index,$userRights))
				{
					$insQuery = "INSERT INTO bt_userrights SET userid='".$this->useridtoassignrights."',transaction_id=".$index;
					//echo $insQuery."<br>";
					$insResult = new dbquery($insQuery,$connid);
				}
				elseif (!isset($_POST[$var]) && in_array($index,$userRights))
				{
					$delQuery = "DELETE FROM bt_userrights WHERE userid='".$this->useridtoassignrights."' AND transaction_id=".$index;
					//echo $delQuery."<br>";
					$delResult = new dbquery($delQuery,$connid);
				}
			}
			$this->rightsassign_message = "Rights updated successfully...";
		}
	}
}
?>