<?php
class eiclearance{
	
	var $type ;
	var $pending_clearance_approval ;
	
	function eiclearance()
	{
		//$this->type = "";
	}	
	function setpostvars()
	{
		if(isset($_POST["hdnaction"])) $this->action = $_POST["hdnaction"];
		if(isset($_POST["txtRemarks"])) $this->txtRemarks = $_POST["txtRemarks"];
		if(isset($_POST["txtAdminRemarks"])) $this->txtAdminRemarks = $_POST["txtAdminRemarks"];
		
	}
	function setgetvars()
	{
		if(isset($_GET["type"])) $this->type = $_GET["type"];
		if(isset($_GET["clearance_id"])) $this->clearance_id = $_GET["clearance_id"];
	}
	function getSBUnames($connid)
	{
		$arrRet = array();
		$query = "SELECT srno,sbu_name FROM sbu_master ";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			$arrRet[$row["srno"]] = $row["sbu_name"];
		}
		return $arrRet;
	}
	function getEmpClearanceApproval($connid)
	{
		$this->setgetvars();
		$arrRet = array();
	
		$condition = " AND approver1_status = 'pending' AND adminReportingTo = '".$_SESSION["username"]."' ";
		if(isset($this->type) && base64_decode($this->type) == 2)
			$condition = " AND (approver1_status = 'approved' OR approver1_status = 'pending')  AND approver2_status = 'pending' ";
			
		$query = "SELECT a.userID,empl_sbu_id,clearance_id,firstName,lastName,desig,DATE_FORMAT(leftDate,'%d-%m-%Y') as left_date,DATE_FORMAT(joinDate,'%d-%m-%Y') as join_date  FROM emp_master a,emp_clearance_details b WHERE a.userID = b.userID AND leftDate IS NOT NULL AND DATEDIFF(leftDate,CURDATE()) <= 30 ".$condition." 
					UNION SELECT c.userID,empl_sbu_id,clearance_id,firstName,lastName,desig,DATE_FORMAT(contract_leftDate,'%d-%m-%Y') as left_date,DATE_FORMAT(joinDate,'%d-%m-%Y') as join_date FROM contract_master c,emp_clearance_details d WHERE c.userID = d.userID AND contract_leftDate IS NOT NULL AND DATEDIFF(contract_leftDate,CURDATE()) <= 30 ".$condition;
		
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() > 0)
		{
			while($row = $dbquery->getrowarray())
			{
				$arrRet[$row["userID"]] = array("clearance_id"=>$row["clearance_id"],
												"desig"=>$row["desig"],
												"empl_sbu_id"=>$row["empl_sbu_id"],
												"join_date"=>$row["join_date"],
												"left_date"=>$row["left_date"],
												"firstName"=>$row["firstName"],
												"lastName"=>$row["lastName"]
												);
			}
		}
		return $arrRet;		
	}
	function getClearanceStatus($connid)
	{
		$this->setgetvars();
		
		$query = "SELECT * FROM emp_clearance_details WHERE clearance_id = '".base64_decode($this->clearance_id)."'";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray(); 
		
		return $row;
	}
	function approveClearance($connid)
	{
		$this->setpostvars();
		$this->setgetvars();
		
		if(isset($this->action) && $this->action == 'Approve')
		{
			if(base64_decode($this->type) == 2)
			{
				$remarks = $_POST["txtAdminRemarks"];
				$query = "UPDATE emp_clearance_details SET approver2 = '".$_SESSION["username"]."',approver2_date = CURDATE(),approver2_status = 'approved',approver2_remarks = '". $this->txtAdminRemarks ."' WHERE clearance_id = '".base64_decode($this->clearance_id)."'  ";	
			}
			else
			{
				$remarks = $_POST["txtRemarks"];
				$query = "UPDATE emp_clearance_details SET approver1 = '".$_SESSION["username"]."',approver1_date = CURDATE(),approver1_status = 'approved',approver1_remarks = '". $this->txtRemarks ."' WHERE clearance_id = '".base64_decode($this->clearance_id)."'  ";	
			}
			$dbquery = new dbquery($query,$connid);
			return 1;
		}
	}
	function getDetails($connid)
	{
		$this->setgetvars();
		
		$arrRet = array();
		$query = "SELECT a.userID,firstName,lastName,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,DATE_FORMAT(leftDate,'%d-%m-%Y') as leftDate,adminReportingTo FROM emp_master a,emp_clearance_details b WHERE a.userID = b.userID AND clearance_id  = '".base64_decode($this->clearance_id)."' ";
		$query.=" UNION SELECT c.userID,firstName,lastName,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,DATE_FORMAT(contract_leftDate,'%d-%m-%Y') as leftDate,adminReportingTo FROM contract_master c,emp_clearance_details d WHERE c.userID = d.userID AND clearance_id  = '".base64_decode($this->clearance_id)."' ";
	         $query.=" UNION SELECT e.userID,firstName,lastName,DATE_FORMAT(joinDate,'%d-%m-%Y') as joinDate,DATE_FORMAT(leftDate,'%d-%m-%Y') as leftDate,adminReportingTo FROM old_emp_master e,emp_clearance_details f WHERE e.userID = f.userID AND clearance_id  = '".base64_decode($this->clearance_id)."' ";
		//echo $query;
		$dbquery = new dbquery($query,$connid);
		
		$row = $dbquery->getrowarray();
		
		$query_asset = "SELECT assetid code FROM  fams_asset_posession_status WHERE posession='".$row["userID"]."'  or (status='partiallyAlloted' AND updated_by='".$row["userID"]."')";
		$dbquery_asset = new dbquery($query_asset,$connid);
		
		$assetCode = "";
		while($row_asset = $dbquery_asset->getrowarray())
	          {
	                $assetCode .= $row_asset["code"].", ";
	          }
		$assetCode = substr($assetCode,0,-2);
	          
		$arrRet["empName"] = $row["firstName"]." ".$row["lastName"];
		$arrRet["joinDate"] = $row["joinDate"];
		$arrRet["leftDate"] = $row["leftDate"];
		$arrRet["adminReportingTo"] = $row["adminReportingTo"];
		$arrRet["userID"] = $row["userID"];
		$arrRet["code"] = $assetCode;         
		
		return $arrRet;
	}
	function getFullname($name,$connid)
	{
		$query = "SELECT fullname FROM marketing WHERE name = '".$name."' ";
		$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		
		return $row["fullname"];
	}
	function getadminmanager($connid)
	{
		$query = "SELECT  userID FROM emp_master WHERE empl_sbu_id = '12' and desig = 'Assistant Manager - Administration'";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() > 0)
		{
			$row = $dbquery->getrowarray();
			return $row["userID"];
		}
	}
	function getmanagersIDs($connid)
	{
		$arrRet = array();
		$query = "SELECT DISTINCT adminReportingTo from emp_master UNION SELECT DISTINCT adminReportingTo FROM contract_master";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() > 0)
		{
			while($row = $dbquery->getrowarray())
			{
				$arrRet[] = $row["adminReportingTo"];
			}
		}
	
		return $arrRet;
	}
	function clearanceapporvalmanagerCount($connid)
	{
		$pending_clearance_approval = 0;
        $query_clearance_apporval = "SELECT COUNT(*) FROM emp_clearance_details a,emp_master b WHERE a.userID = b.userID AND approver1_status = 'pending' AND adminReportingTo = '".$_SESSION["username"]."' AND DATEDIFF(leftDate,CURDATE()) <= 7 ";
       	$dbquery_clearance_approval = new dbquery($query_clearance_apporval,$connid);
		$row_clearance_approval = $dbquery_clearance_approval->getrowarray();

        $query_clearance_apporval_contract = "SELECT COUNT(*) FROM emp_clearance_details a,contract_master b WHERE a.userID = b.userID AND approver1_status = 'pending' AND adminReportingTo = '".$_SESSION["username"]."' AND DATEDIFF(contract_leftDate,CURDATE()) <= 7 ";
      	$dbquery_clearance_approval_contract = new dbquery($query_clearance_apporval_contract,$connid);
		$row_clearance_approval_contract = $dbquery_clearance_approval_contract->getrowarray();

        $pending_clearance_approval = $row_clearance_approval[0] + $row_clearance_approval_contract[0];
		
		return $pending_clearance_approval;
	}
	function clearanceapprovaladminCount($connid)
	{
		$pending_admin_clearance_approval = 0;
        $query_clearance_apporval = "SELECT COUNT(*) FROM emp_clearance_details a,emp_master b WHERE a.userID = b.userID AND  approver2_status = 'pending' AND leftDate IS NOT NULL AND DATEDIFF(leftDate,CURDATE()) <= 7";
        $dbquery_admin_clearance_approval = new dbquery($query_clearance_apporval,$connid);
		$row_admin_clearance_approval = $dbquery_admin_clearance_approval->getrowarray(); 
		
		$query_clearance_apporval_contract = "SELECT COUNT(*) FROM emp_clearance_details a,contract_master b WHERE a.userID = b.userID  AND approver2_status = 'pending' AND contract_leftDate IS NOT NULL AND DATEDIFF(contract_leftDate,CURDATE()) <= 7";
        $dbquery_admin_clearance_approval_contract = new dbquery($query_clearance_apporval_contract,$connid);
		$row_admin_clearance_approval_contract = $dbquery_admin_clearance_approval_contract->getrowarray();
		
        $pending_admin_clearance_approval = $row_admin_clearance_approval[0] + $row_admin_clearance_approval_contract[0];
		
		return $pending_admin_clearance_approval ;
	}
	function getresignedemp($connid)
	{
		$arrUsers = array();
		$query = "SELECT userID FROM emp_master WHERE leftDate IS NOT NULL  AND DATEDIFF(leftDate,CURDATE()) <= 3";
		$dbquery = new dbquery($query,$connid);
		if($dbquery->numrows() > 0)
		{
			while($row = $dbquery->getrowarray()){
				$arrUsers[] = $row["userID"]; 
			}
		}
		return $arrUsers;
	}
}
?>