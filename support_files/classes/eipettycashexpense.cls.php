 <?php
class clspettycashexpense
{
        var $id;
        var $action;
        var $entered_by;
        var $entered_dt;
        var $modified_by;
        var $modified_dt;
        var $approved_by;
        var $approved_dt;
        var $supportings_sent_dt;
        var $supportings_notyet_receieved_dt;
        var $supportings_receieved_dt;
        var $status;
        var $amount;
        var $approved_amount;
        var $checked_amount;
        var $expense_type;
        var $purpose;
        var $supportings_details;
        var $supportings_sentby;
        var $supportings_date;
        var $advancetaken_date;
        var $advance_id;
        var $advance_taken;
        var $total_amount;
        var $error_amount;
        var $expense_id;
        var $approve_expense;
        var $checked_by;
        function clspettycashexpense()
        {
                $this->id = 0;
                $this->action = "";
                $this->approved_by = "";
                $this->approved_dt = "0000-00-00";
                $this->amount = "";
                $this->approved_amount = "";
                $this->checked_amount = "";
                $this->supportings_sent_dt = "0000-00-00";
                $this->supportings_notyet_receieved_dt = "0000-00-00";
                $this->supportings_receieved_dt = "0000-00-00";
                $this->entered_by = "";
                $this->modified_by = "";
                $this->entered_dt = "0000-00-00 00:00:00";
                $this->modified_dt = "0000-00-00 00:00:00";
                $this->status = "pending";
                $this->expense_type = "";
                $this->purpose = "";
                $this->supportings_details = "";
                $this->supportings_sentby = "";
                $this->advancetaken_date = "0000-00-00";
                $this->advance_id = "";
                $this->advance_taken = "";
                $this->total_amount = "";
                $this->error_amount = "";
                $this->expense_id = "";
                $this->approve_expense = "";
                $this->checked_by = "";
        }

        function setpostvars()
        {
                if(isset($_POST["clspettycashexpense_purpose"])) $this->purpose = $_POST["clspettycashexpense_purpose"];
                if(isset($_POST["clspettycashexpense_amount"])) $this->amount = $_POST["clspettycashexpense_amount"];
                if(isset($_POST["clspettycashexpense_type"])) $this->expense_type = $_POST["clspettycashexpense_type"];
                if(isset($_POST["clspettycashexpense_approvedamount"])) $this->approved_amount = $_POST["clspettycashexpense_approvedamount"];
                if(isset($_POST["clspettycashexpense_hdnaction"])) $this->action = $_POST["clspettycashexpense_hdnaction"];
                if(isset($_POST["clspettycashexpense_hdnadvanceid"])) $this->advance_id = $_POST["clspettycashexpense_hdnadvanceid"];
                if(isset($_POST["clspettycashexpense_hdnexpenseid"])) $this->expense_id = $_POST["clspettycashexpense_hdnexpenseid"];
                if(isset($_POST["clspettycashexpense_totalamount"])) $this->total_amount = $_POST["clspettycashexpense_totalamount"];
                if(isset($_POST["clspettycashexpense_approve"])) $this->approve_expense = $_POST["clspettycashexpense_approve"];
                if(isset($_POST["clspettycashexpense_searchstatus"])) $this->status = $_POST["clspettycashexpense_searchstatus"];
                if(isset($_POST["clspettycashexpense_checkedamount"])) $this->checked_amount = $_POST["clspettycashexpense_checkedamount"];
                if(isset($_POST["clspettycashexpense_supportingdetails"])) $this->supportings_details = $_POST["clspettycashexpense_supportingdetails"];
                if(isset($_POST["clspettycashexpense_sentby"])) $this->supportings_sentby = $_POST["clspettycashexpense_sentby"];
                if(isset($_POST["clspettycashexpense_supportingsdate"])) $this->supportings_date = $_POST["clspettycashexpense_supportingsdate"];
                if(isset($_POST["clspettycashexpense_supportingsnyr"])) $this->supportings_notyet_receieved_dt = $_POST["clspettycashexpense_supportingsnyr"];
                if(isset($_POST["clspettycashexpense_supportingsrec"])) $this->supportings_receieved_dt = $_POST["clspettycashexpense_supportingsrec"];
               //print_r($_POST);
        }
        function setgetvars()
        {
                if(isset($_GET["expense_id"])) $this->expense_id = $_GET["expense_id"];
                if($this->action != "Search")
                        if(isset($_GET["status"])) $this->status = $_GET["status"];
        }
        function getLatestApprovedAdvance($connid)
        {
                $arrRet = array();
                $query = "SELECT * FROM petty_cash_advance WHERE status = 'Paid' AND entered_by = '".$_SESSION["username"]."'
                                AND id NOT IN (SELECT DISTINCT advance_id FROM petty_cash_expense) ORDER BY id DESC LIMIT 1";

                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                $this->advancetaken_date = $row["date"];
                $this->advance_taken = $row["approved_amount"];
                $this->advance_id = $row["id"];
        }
        function pageAddPettyCashExpense($connid)
        {
                $this->setpostvars();
                $this->setgetvars();
                if($this->action == "SaveData")
                {
                    if($this->validation($connid))
                    {
                            $this->savedata($connid);
                            $this->action = "SuccessfullyAdded";
                    }
                }
                if($this->action == "Approve")
                {
                   $this->approveExpense($connid);
                }
                if($this->action == "CheckExpense")
                {
                        $this->checkExpense($connid);
                }
                if($this->action == "SaveSupportingsDetails")
                {
                                $this->saveSupportingsDetails($connid);                
                }
                }
        function savedata($connid)
        {
            if($this->supportings_date != "0000-00-00" && $this->supportings_date !="")
            {
                            $arrDate = explode('-',$this->supportings_date);
                            $supportings_date = $arrDate[2]."-".$arrDate[1]."-".$arrDate[0];
            }
            $query = "INSERT INTO petty_cash_expense (entered_by,entered_dt,amount,advance_id,supportings_details,
            supportings_sent_by,supportings_sent_dt) VALUES('".$_SESSION["username"]."',NOW(),'".$this->total_amount."','".$this->advance_id."','".$this->supportings_details."','".$this->supportings_sentby."','".$supportings_date."')";
            $dbquery = new dbquery($query,$connid);
            $expense_id = $dbquery->insertid;
            $this->saveActualExpenses($connid,$expense_id);
        }
        function saveActualExpenses($connid,$expense_id)
        {
            if(is_array($this->expense_type) && count($this->expense_type) > 0)
            {
                    $arrExpenseTypeKeys = array_keys($this->expense_type);
                    foreach($arrExpenseTypeKeys as $id)
                    {
                            if(isset($this->expense_type[$id]) && $this->expense_type[$id] != "")
                            {
                                    $query = "INSERT INTO petty_cash_expense_items (expense_type,purpose,amount,entered_by,entered_dt,expense_id) VALUES ('".$this->expense_type[$id]."','".$this->purpose[$id]."','".$this->amount[$id]."','".$_SESSION["username"]."',NOW(),'".$expense_id."')";
                                    $dbquery = new dbquery($query,$connid);
                            }
                    }
            }
        }
        function validation($connid)
        {
                if(is_array($this->expense_type) && count($this->expense_type) > 0)
                {
                        for($i=1;$i<=count($this->expense_type);$i++)
                        {
                                if($this->expense_type[$i] == '' && $i == 0)
                                        $this->error["expense_type"][$i] = "Please enter the expense type of the expense for the record ".$i;
                                else if($this->expense_type[$i] != '')
                                {
                                        if($this->purpose[$i] == '')
                                                $this->error["purpose"][$i] = "Please enter the purpose of the expense";
                                        if($this->amount[$i] == '')
                                                $this->error["amount"][$i] = "Please enter the amount of the expenses done";
                                }
                        }
                        if($this->total_amount == '')
                                $this->error_amount = "Total amount of the expenses is invalid";
                }

                if((is_array($this->error) && count($this->error) >0) || ($this->error_amount != ""))
                        return false;
                else
                        return true;
        }
        function getFullname($connid,$name)
        {
                $query = "SELECT fullname FROM marketing WHERE name = '".$name."'";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                return $row["fullname"];
        }
        function getAllPettyCashExpenses($connid)
        {
                $arrRet = array();
                $this->setpostvars();
                if($this->action != "Search")
                {
                        $this->setgetvars();
                }
                $strAdmin = $this->getAdminAuthority($connid);
                $arrAdmin = explode(',',$strAdmin);
                                
                if($this->status == "pending")                        
                                        $conditionAdmin = " AND status = '".$this->status."' AND (checked_amount = '' OR checked_amount = '0.00') AND checked_by = '' ";
                                else if($this->status == "checked")
                                        $conditionAdmin = " AND status = 'pending' AND checked_amount <> '' AND checked_by <> '' ";
                                else 
                                        $conditionAdmin = " AND status = '".$this->status."' AND checked_amount <> '' AND checked_by <> '' ";        
                                        
                $conditionDefault = "";
                $condtitionAcc = "";

                $arrCheck = array($arrAdmin[0],$arrAdmin[1],'ketan','sheel.shastri','rupande.shah');
                if(!in_array($_SESSION["username"],$arrCheck))
                        $conditionDefault = " AND petty_cash_advance.entered_by = '".$_SESSION["username"]."' ";

                if($_SESSION["username"] == $arrAdmin[1])
                {
                        if(isset($_POST["clspettycashexpense_searchstatus"]))
                                $conditionAdmin = " AND approved1_by <> '' AND status = '".$this->status."' ";
                        else
                                $conditionAdmin = " AND approved1_by <> '' AND status = 'approved1' ";
                }

                //if($_SESSION["username"] == 'ketan' || $_SESSION["username"] == 'sheel.shastri' || $_SESSION["username"] == 'rupande.shah')


                $query = "SELECT petty_cash_expense.*,fullname,DATE_FORMAT(entered_dt,'%d-%m-%Y') as expense_date FROM petty_cash_expense,marketing WHERE petty_cash_expense.entered_by = marketing.name ".$conditionDefault." ".$conditionAdmin." ".$condtitionAcc;
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $bill_office_number = $this->getOfficeNumber($connid,$row["advance_id"]);
                        $queryAdv = "SELECT purpose,entered_by,DATE_FORMAT(entered_dt,'%d-%m-%Y') as advance_date from petty_cash_advance WHERE id = '".$row["advance_id"]."' ";
                        $dbqueryAdv = new dbquery($queryAdv,$connid);
                        $rowAdv = $dbqueryAdv->getrowarray();



                        $arrRet[$row["id"]] = array("id"=>$row["id"],
                                                    "purpose"=>$rowAdv["purpose"],
                                                    "amount"=>$row["amount"],
                                                    "bill_office_number"=>$bill_office_number,
                                                    "approved_amount"=>$row["approved_amount"],
                                                    "checked_amount"=>$row["checked_amount"],
                                                    "expense_date"=>$row["expense_date"],
                                                    "advance_date"=>$rowAdv["advance_date"],
                                                    "fullname"=>$row["fullname"],
                                                    "status"=>$row["status"],
                                                    "supportings_notyet_received_date"=>$row["supportings_notyet_received_date"],
                                                    "supportings_received_dt"=>$row["supportings_received_dt"]
                                                    );

                }
                return $arrRet;
        }
        function getOfficeNumber($connid,$advance_id)
        {
                $office_number = "";
                if($advance_id != "" && $advance_id != 0)
                {
                        $query1 = "SELECT office_id FROM petty_cash_advance WHERE id = '".$advance_id."' ";
                        $dbquery1 = new dbquery($query1,$connid);
                        $row1 = $dbquery1->getrowarray();
                        if($row1["office_id"] != "")
                        {
                                $query2 = "SELECT bill_office_number FROM office_master WHERE id = '".$row1["office_id"]."' ";
                                $dbquery2 = new dbquery($query2,$connid);
                                $row2 = $dbquery2->getrowarray();
                                $office_number = $row2["bill_office_number"];
                        }
                }
                return $office_number;
        }
        function getAllDetailsOfExpenseById($connid)
        {
                $this->setgetvars();
                $query = "SELECT petty_cash_expense.*,DATE_FORMAT(entered_dt,'%d-%m-%Y') as entered_date FROM petty_cash_expense WHERE id = '".$this->expense_id."' ";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();

                $queryAdv = "SELECT *,DATE_FORMAT(entered_dt,'%d-%m-%Y') as entered_date FROM petty_cash_advance WHERE id = '".$row["advance_id"]."' ";
                $dbqueryAdv = new dbquery($queryAdv,$connid);
                $rowAdv = $dbqueryAdv->getrowarray();
                $this->purpose = $rowAdv["purpose"];
                $this->advance_id = $row["advance_id"];
                $this->advancetaken_date = $rowAdv["entered_date"];
                $this->advance_taken = $rowAdv["approved_amount"];
                $this->entered_dt = $row["entered_date"];
                $this->checked_amount = $row["checked_amount"];
                $this->checked_by = $row["checked_by"];
        }
        function getAllExpenseItems($connid)
        {
                $arrRet = array();
                $this->setgetvars();
                $query = "SELECT * FROM petty_cash_expense_items WHERE expense_id = '".$this->expense_id."' ";
                $dbquery = new dbquery($query,$connid);
                while($row = $dbquery->getrowarray())
                {
                        $arrRet[$row["id"]] = array("id"=>$row["id"],
                                                    "expense_type"=>$row["expense_type"],
                                                    "purpose"=>$row["purpose"],
                                                    "amount"=>$row["amount"],
                                                    "checked_amount"=>$row["checked_amount"]
                                                    );
                }
                return $arrRet;
        }
        function approveExpense($connid)
        {
            if(is_array($this->approve_expense) && count($this->approve_expense) > 0)
            {
                $strAdmin = $this->getAdminAuthority($connid);
                $arrAdmin = explode(',',$strAdmin);

                foreach($this->approve_expense as $expense)
                {
                        if(in_array($_SESSION["username"],$arrAdmin))
                        {
                                if($_SESSION["username"] == $arrAdmin[0])
                                        $query = "UPDATE petty_cash_expense SET approved1_by = '".$_SESSION["username"]."', status = 'approved1' WHERE id = '".$expense."' AND checked_amount <> '' AND checked_amount <> '0.00' AND checked_by <> '' LIMIT 1";
                                else
                                        $query = "UPDATE petty_cash_expense SET approved2_by = '".$_SESSION["username"]."', status = 'approved2' WHERE id = '".$expense."' AND checked_amount <> '' AND checked_amount <> '0.00' AND checked_by <> '' AND approved1_by <> '' AND status = 'approved1' LIMIT 1";

                                $dbquery = new dbquery($query,$connid);
                        }
                }
            }
        }
        function getAdminAuthority($connid)
        {
                $str = "";
                $query = "SELECT authority1,authority2 FROM project_master WHERE projectno = '10' ";
                $dbquery = new dbquery($query,$connid);
                $row = $dbquery->getrowarray();
                $str = $row["authority1"].",".$row["authority2"];
                return $str;
        }
        function checkExpense($connid)
        {
                $amount = 0;
                if(is_array($this->checked_amount) && count($this->checked_amount) > 0)
                {
                        $arrExpenses = array_keys($this->checked_amount);

                        foreach($arrExpenses as $expenseid)
                        {
                            if($this->checked_amount[$expenseid] != "" && $this->checked_amount[$expenseid] != 0)
                            {
                                $query = "UPDATE petty_cash_expense_items SET checked_amount = '".$this->checked_amount[$expenseid]."' WHERE id = '".$expenseid."' LIMIT 1";
                                $dbquery = new dbquery($query,$connid);
                                $amount = $amount + $this->checked_amount[$expenseid];
                            }
                        }
                        if($amount > 0 && $this->expense_id != "")
                        {
                                $queryAmount = "UPDATE petty_cash_expense SET checked_amount = '".$amount."',checked_by='".$_SESSION["username"]."' WHERE id ='".$this->expense_id."' LIMIT 1";
                                $dbqueryAmount = new dbquery($queryAmount,$connid);
                        }
                }

        }
        function saveSupportingsDetails($connid)
        {
                
                if(is_array($this->supportings_notyet_receieved_dt) && count($this->supportings_notyet_receieved_dt) >0)
                {
                        foreach($this->supportings_notyet_receieved_dt as $nyrexpenseid)
                        {
                                $querynyr = "UPDATE petty_cash_expense SET supportings_notyet_received_date = CURDATE(),modified_dt = NOW(),modified_by = '".$_SESSION["username"]."' WHERE id =  '".$nyrexpenseid."' LIMIT 1 ";
                                $dbquerynyr = new dbquery($querynyr,$connid);
                        }
                }
                if(is_array($this->supportings_receieved_dt) && count($this->supportings_receieved_dt) >0)
                {
                        foreach($this->supportings_receieved_dt as $recexpenseid)
                        {
                                $queryrec = "UPDATE petty_cash_expense SET supportings_received_dt = CURDATE(),modified_dt = NOW(),modified_by = '".$_SESSION["username"]."' WHERE id =  '".$recexpenseid."' LIMIT 1 ";
                                $dbqueryrec = new dbquery($queryrec,$connid);
                        }
                }
                
        }
}
?>
