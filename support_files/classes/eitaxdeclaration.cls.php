<?php
class clstaxdeclaration 
{
        var $declaration_id;
        var $userid;
        var $particular_id;
        var $date_of_receipt;
        var $company_name;
        var $cstyear;
        var $amount;
        var $remarks;
        var $action;
        var $error;
        var $chkdeledit;
        function clstaxdeclaration() 
        {
                //$this->clstaxparticulars = clstaxparticulars();
                $this->declaration_id = "";
                $this->userid = "";
                $this->particular_id = 0;
                $this->date_of_receipt = "0000-00-00";
                $this->cstyear = "";
                $this->amount = "";
                $this->remarks = "";
                $this->action = "";        
                $this->error = "";
                $this->chkdeledit = "";
        }
        
        function setpostvars()
        {
               if(isset($_POST["clstaxdeclaration_particular"])) $this->particular_id = $_POST["clstaxdeclaration_particular"];
               if(isset($_POST["clstaxdeclaration_date_of_receipt"])) $this->date_of_receipt = $_POST["clstaxdeclaration_date_of_receipt"];
               if(isset($_POST["clstaxdeclaration_company_name"])) $this->company_name = $_POST["clstaxdeclaration_company_name"];
               if(isset($_POST["clstaxdeclaration_amount"])) $this->amount = $_POST["clstaxdeclaration_amount"];
               if(isset($_POST["clstaxdeclaration_remarks"])) $this->remarks = $_POST["clstaxdeclaration_remarks"];
               if(isset($_POST['clstaxdeclaration_hdnaction'])) $this->action = trim($_POST['clstaxdeclaration_hdnaction']);
               if(isset($_POST["clstaxdeclaration_cstyear"])) $this->cstyear = $_POST["clstaxdeclaration_cstyear"];
               if(isset($_POST["clstaxdeclaration_userid"])) $this->userid = $_POST["clstaxdeclaration_userid"];
               if(isset($_POST["clstaxdeclaration_hdndeclarationid"])) $this->declaration_id = $_POST["clstaxdeclaration_hdndeclarationid"];
               if(isset($_POST["clstaxdeclaration_chkdeledit"])) $this->chkdeledit = $_POST["clstaxdeclaration_chkdeledit"];
        }
        
        function setgetvars()
        {
                
        }
        
        function pageAddTaxDeclarations($connid,$name)
        {
				$this->setpostvars();
                if($this->action == "SaveData")
                {
                        if($this->validation())
                        {
                   			if($this->CheckForDuplicateDeclaration($connid,$name))
                                $this->savedata($connid,$name);
                        }
                }
                if($this->action == "UpdateData")
                {
                	$this->updatedata($connid,$name);
                }
                if($this->action == "DeleteData")
                {
                	$this->deletedata($connid,$name);
                }
                /*if($this->action == "Edit")
                {
                        $this->retrieveDeclarations($connid);
                }*/
        }
        
        function validation()
        {
                $status = "false";
                $i = 0;
                if(is_array($this->amount) && count($this->amount) > 0)
                {
                        $arrAmountKeys = array_keys($this->amount);
                        foreach ($arrAmountKeys as $amount)
                        {
                                $i = $i + 1;
                        		/*echo $amount;
                                echo "<br>";
                                echo $this->amount[$amount];
                                echo "<br>";*/
                                if($this->amount[$amount] != "" && $this->amount[$amount] != 0)
                                {
                                        $status = "true";
                                        break;
                                }
                        }
                        
                }
                if($this->particular_id == 0)
                        $status = "false";
                        
                if($status == "false" && $this->particular_id == 0)
                        $this->error["particular_status"] = "Please select the particular from the list";
                elseif($status == "false" && $this->particular_id != 0)
                                $this->error["status"] = "Please enter the amount for atleast one declaration";
                        
                return $status;
        }
        function CheckForDuplicateDeclaration($connid,$name)
        {
            if(is_array($this->amount) && count($this->amount) >0)
			{
				$arrAmountKeys = array_keys($this->amount);
	            foreach ($arrAmountKeys as $amount)
	            {
	                if($amount != "" && $amount != 0 && $this->particular_id != 0 && $this->company_name[$amount] != "")
	                {
	                    $query = "SELECT * FROM payroll_taxdeclarations WHERE userid = '".$name."' AND particularid = '".$this->particular_id."' AND company_name = '".$this->company_name[$amount]."' ";
	                        $dbquery = new dbquery($query,$connid);
	                    if($dbquery->numrows() > 0)
	                                $this->error["duplicate"] = "The tax declaration no $amount is already declared";
	                }
	            } 	
			}
			
			if(is_array($this->error) && count($this->error) > 0)               
                    return false;
            else
                    return true;
        }
        function savedata($connid,$name)
        {
              	$currentFinancialYear = $this->getLatestFiniancialYear($connid);
                if(is_array($this->amount) && count($this->amount) > 0)
                {
                        $arrAmountKeys = array_keys($this->amount);
                        foreach ($arrAmountKeys as $amount)
                        {
                           		$date_of_rcpt = "";
                                $date_of_receipt = "0000-00-00";
                                
                                if($this->amount[$amount] != "" && $this->amount[$amount] != 0 && $this->particular_id != 0)
                                {
                                        if($this->date_of_receipt[$amount] != "" && $this->date_of_receipt[$amount] != "0")
		                                {
		                                   $date_of_rcpt = explode('-',$this->date_of_receipt[$amount]);
		                                   $date_of_receipt = $date_of_rcpt[2]."-".$date_of_rcpt[1]."-".$date_of_rcpt[0];
		                                }
                                		$query = "INSERT INTO payroll_taxdeclarations(userid,particularid,cstyear,date_of_receipt,company_name,amount,remarks) VALUES('".$name."','".$this->particular_id."','".$currentFinancialYear."','".$date_of_receipt."','".$this->company_name[$amount]."','".$this->amount[$amount]."','".addslashes($this->remarks[$amount])."')";
                                        $dbquery = new dbquery($query,$connid);
                                        $this->action = "Successfull";
                                }
                                
                        }
                }
        }
        function updatedata($connid,$name)
        {
        	
        	$currentFinancialYear = $this->getLatestFiniancialYear($connid);
                if(is_array($this->amount) && count($this->amount) > 0)
                {
                        $arrAmountKeys = array_keys($this->amount);
                        foreach ($arrAmountKeys as $amount)
                        {
                           		$date_of_rcpt = "";
                                $date_of_receipt = "0000-00-00";
                                
                                if($this->amount[$amount] != "" && $this->amount[$amount] != 0)
                                {
                                        if($this->date_of_receipt[$amount] != "" && $this->date_of_receipt[$amount] != "0")
		                                {
		                                   $date_of_rcpt = explode('-',$this->date_of_receipt[$amount]);
		                                   $date_of_receipt = $date_of_rcpt[2]."-".$date_of_rcpt[1]."-".$date_of_rcpt[0];
		                                }
							        	if($this->declaration_id[$amount] != "" )
							            {
							                    $query = "UPDATE payroll_taxdeclarations SET date_of_receipt='".$date_of_receipt."', company_name = '".$this->company_name[$amount]."',amount = '".$this->amount[$amount]."', remarks='".addslashes($this->remarks[$amount])."' WHERE declarationid ='".$this->declaration_id[$amount]."' AND userid = '".$name."' AND cstyear = '".$currentFinancialYear."' ";
							                    $dbquery = new dbquery($query,$connid);
                                       			$this->action = "SuccessfullUpdated";
							            }	
                                }
                        }
                }               
        }
        function deletedata($connid,$name)
        {
        	if(is_array($this->chkdeledit) && count($this->chkdeledit) >0)
        	{
        		foreach($this->chkdeledit as $delete)
        		{
        			$query = "DELETE FROM payroll_taxdeclarations WHERE declarationid = '".$delete."' ";
        			$dbquery = new dbquery($query,$connid);
        		}
        	}
        }
        function getLatestFiniancialYear($connid)
        {
                $query = "SELECT financialYear FROM payroll_periodmaster ORDER BY period DESC";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                return $row["financialYear"];
        }
        function getCstYears($connid)
        {
                $arrRet = array();
                $query = "SELECT period,financialYear,calendarYear FROM payroll_periodmaster ORDER BY period DESC";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray()) 
                {
                        $arrRet[$row['period']]=array('financialYear'=>$row['financialYear'],
                                                                                  'calendarYear'=>$row['calendarYear'],
                                                                                  'period'=>$row['period']
                                                                                  );
                }
                
                return $arrRet;
        }
        function retrieveDeclarations($connid,$name,$particularid=0)
        {
                $arrRet = array();
                $currentFinancialYear = $this->getLatestFiniancialYear($connid);
                $query = "SELECT * FROM payroll_taxdeclarations WHERE userid='".$name."' AND cstyear='".$currentFinancialYear."' AND particularid = '".$particularid."' ";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray())
                {
                                $arrRet[$row["declarationid"]] = array("declarationid"=>$row["declarationid"],
                                                                       "particularid"=>$row["particularid"],
                                                                       "userid"=>$row["userid"],
                                                                       "amount"=>$row["amount"],
                                                                       "cstyear"=>$row["cstyear"],
                                                                       "date_of_receipt"=>$row["date_of_receipt"],
                                                                       "company_name"=>$row["company_name"],
                                                                       "remarks"=>$row["remarks"]);
                }
                return $arrRet;
        }
        function retriveParticulars($connid,$name)
        {
                $arrRet = array();
                $currentFinancialYear = $this->getLatestFiniancialYear($connid);
                $query = "SELECT payroll_taxparticulars.* FROM payroll_taxparticulars,payroll_taxdeclarations WHERE payroll_taxparticulars.particularid = payroll_taxdeclarations.particularid AND  payroll_taxdeclarations.cstyear = '".$currentFinancialYear."' AND userid = '".$name."' ";
                $dbquery = new dbquery($query,$connid);
                while ($row = $dbquery->getrowarray())
                {
                                $arrRet[$row["particularid"]] = array("particularid"=>$row["particularid"],
                                                                                                          "name"=>$row["name"],
                                                                                                          "section"=>$row["section"],
                                                                                                          "cap"=>$row["cap"]);
                                                                                                          
                }
               return $arrRet;                                
        }
        function getUsersWithDeclarations($connid)
        {
                $arrRet = array();
                $query = "SELECT DISTINCT name,fullname FROM marketing,payroll_taxdeclarations WHERE marketing.name = payroll_taxdeclarations.userid GROUP BY userid ";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["name"]] = array("fullname"=>$row["fullname"],
                                                                                  "name"=>$row["name"]                                
                                                                                );
                }
                return $arrRet;
        }
        
        function searchDeclarations($connid,$name)
        {
                $this->setpostvars();
                
                $arrRet = array();
                
                $query = "SELECT declarationid,userid,name,cstyear,amount,section,cap,payroll_taxdeclarations.remarks,payroll_taxparticulars.remarks as description FROM payroll_taxdeclarations ".
                                 "LEFT JOIN payroll_taxparticulars ON payroll_taxparticulars.particularid = payroll_taxdeclarations.particularid ".
                                 "WHERE 1 = 1 ";
                if($name != "ketan" && $name != "sheel.shastri")
                        $query.= "AND userid = '".$name."' ";
                if($this->cstyear != "")                
                        $query.= "AND payroll_taxdeclarations.cstyear = '".$this->cstyear."'";
                if($this->userid != "")
                        $query.= "AND payroll_taxdeclarations.userid = '".$this->userid."'";
                //echo $query;
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["declarationid"]] = array("declarationid" => $row["declarationid"],
                                                                                                   "userid"=>$row["userid"],
                                                                                                   "name"=>$row["name"],
                                                                                                   "cstyear"=>$row["cstyear"],
                                                                                                   "amount"=>$row["amount"],
                                                                                                   "section"=>$row["section"],
                                                                                                   "cap"=>$row["cap"],
                                                                                                   "description"=>$row["description"],
                                                                                                   "remarks"=>$row["remarks"]
                                                                                                );
                }
                
                return $arrRet;
        }
}
