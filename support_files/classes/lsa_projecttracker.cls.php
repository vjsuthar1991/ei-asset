<?php

class clslsaprojecttracker
{
	var $project;
	var $project_header;
	var $project_other;
	var $roundyear;
	var $roundyear_other;
	var $sbu;
	var $totalcost;
	var $action;
	var $message;
	var $costid;
	var $costbreakupid;
	var $debitbreakupid;
	var $cost;
	var $description;
	var $startdate;
	var $enddate;
	var $signedstatusarray;
	var $statusarray;
	var $statusarray_lsa;
	var $statusarray_debit_lsa;
	var $statusarray_act;
	var $statusarray_debit_act;
	var $courierarray;
	var $sbuarray;
	var $showcompetedprojects;
	var $showtobesignedprojects;
	var $perwcisperpay;
	var $fiscalyear1;
	var $fiscalyear2;
	
	function clslsaprojecttracker()
	{
		$this->project="";
		$this->project_header="";
		$this->project_other="";
		$this->roundyear="";
		$this->roundyear_other="";
		$this->totalcost=0.00;
		$this->sbu="";
		$this->action="";
		$this->message="";
		$this->costid="";
		$this->costbreakupid="";
		$this->debitbreakupid="";
		$this->cost=0.00;
		$this->description="";
		$this->startdate="";
		$this->enddate="";
		$this->signedstatusarray=array("Pending Signing","Project Signed");
		$this->statusarray=array("Not started","In progress","Completed, invoice not sent yet","Invoiced","Part payment","Payment received");
		$this->statusarray_lsa=array("Not started","In progress","Completed, invoice not sent yet");
		$this->statusarray_debit_lsa=array("Not started","In progress","Completed, debit note not sent yet");
		$this->statusarray_act=array("Completed, invoice not sent yet","Invoiced","Part payment","Payment received");
		$this->statusarray_debit_act=array("Completed, debit note not sent yet","Invoiced","Part payment","Payment received");
		$this->courierarray=array("Blazeflash","Blue Dart","DHL","DTDC","First Flight","Indian Post","Maruti","SAFEXPRESS","Trackon","Hand Delivery","Soft Copy","Other");
		$this->sbuarray=array("Large Scale Assessments","Marketing");
		$this->showcompetedprojects="";
		$this->showtobesignedprojects="";
		$this->perwcisperpay="";
		$this->fiscalyear1 = 2012;
		$this->fiscalyear2 = $this->fiscalyear1 + 1;
  	}
  	
	function setpostvars()
	{
		if(isset($_POST["project"])) $this->project   								= $_POST["project"];
		if(isset($_POST["project_header"])) $this->project_header   				= $_POST["project_header"];
		if(isset($_POST["project_other"])) $this->project_other   					=  str_replace(" ","",ucwords($_POST["project_other"])); 
		if(isset($_POST["roundyear"])) $this->roundyear                    			= $_POST["roundyear"];
		if(isset($_POST["roundyear_other"])) $this->roundyear_other			        = $_POST["roundyear_other"];
		if(isset($_POST["totalcost"])) $this->totalcost       						= $_POST["totalcost"];
		if(isset($_POST["sbu"])) $this->sbu       									= $_POST["sbu"];
		if(isset($_POST["actiontoperform"])) $this->action          				= $_POST["actiontoperform"];
		if(isset($_POST["costid"])) $this->costid   								= $_POST["costid"];
		if(isset($_POST["costbreakupid"])) $this->costbreakupid   					= $_POST["costbreakupid"];
		if(isset($_POST["debitbreakupid"])) $this->debitbreakupid					= $_POST["debitbreakupid"];
		if(isset($_POST["cost"])) $this->cost   									= $_POST["cost"];
		if(isset($_POST["description"])) $this->description   						= $_POST["description"];
		if(isset($_POST["startdate"])) $this->startdate   							= $_POST["startdate"];
		if(isset($_POST["enddate"])) $this->enddate   								= $_POST["enddate"];
		if(isset($_POST["showcompetedprojects"])) $this->showcompetedprojects   	= $_POST["showcompetedprojects"];
		if(isset($_POST["showtobesignedprojects"])) $this->showtobesignedprojects   = $_POST["showtobesignedprojects"];
		if(isset($_POST["ispercwc"])) $this->perwcisperpay   						= $_POST["ispercwc"];
    }
    
    function setgetvars()
  	{
  		if(isset($_GET["project"])) $this->project   								= base64_decode($_GET["project"]);
		if(isset($_GET["roundyear"])) $this->roundyear                    			= base64_decode($_GET["roundyear"]);
		if(isset($_GET["costid"])) $this->costid   									= base64_decode($_GET["costid"]);
		if(isset($_GET["costbreakupid"])) $this->costbreakupid   					= base64_decode($_GET["costbreakupid"]);
		if(isset($_GET["debitbreakupid"])) $this->debitbreakupid					= base64_decode($_GET["debitbreakupid"]);
  	}
    
  	function addViewProjectCostBreakup($connid)
  	{
  		$this->setpostvars();
  		$this->setgetvars();
  		/*echo "<pre>";
  		print_r($_POST); //exit;
  		echo "</pre>";*/
  		//exit;
  		if($this->action == "Add Project Cost Breakup")
    	{
    		if($this->perwcisperpay != "")
    		{
    			$upquery = "UPDATE lsa_projects_totalcost SET perwcisnotperpay='Y' WHERE costid=".$this->costid;
    			$dbupquery = new dbquery($upquery,$connid);
    			//echo $upquery; exit;
    		}
    		else 
    		{
    			$upquery = "UPDATE lsa_projects_totalcost SET perwcisnotperpay='N' WHERE costid=".$this->costid;
    			$dbupquery = new dbquery($upquery,$connid);
    			//echo $upquery; exit;
    		}
    		
    		$totalcost = $this->fetchTotalCost($this->costid,$connid);
    		for($i=1; $i<=10; $i++)
    		{
    			$desc = "description".$i;
    			if(isset($_POST[$desc]) && $_POST[$desc]!="")
    			{
		    		$pdate   = "planneddate".$i;
		    		$perwc   = "perwc".$i;
		    		$perpay  = "perpay".$i;
	    			$payment = "payment".$i;
	    			$status  = "status".$i;
    				
	    			if($_POST["isperamt"] == "P")
	    			{
	    				$perpay_add  = $_POST[$perpay];
	    				$payment_add = round(($totalcost*$perpay_add)/100,2);
	    			}
	    			if($_POST["isperamt"] == "A")
	    			{
	    				$payment_add = $_POST[$payment];
	    				$perpay_add  = round(($payment_add*100)/$totalcost,2);
	    			}
	    			if(isset($_POST["ispercwc"]))
    					$perwc_add = $_POST[$perwc];
	    			else 
	    				$perwc_add = $perpay_add;

    				$insertquery  = "INSERT INTO lsa_projects_totalcost_breakup SET costid=".$this->costid.", description='".$_POST[$desc]."',";
		    		$insertquery .= "planneddate='".formatDate($_POST[$pdate])."', expecteddate='".formatDate($_POST[$pdate])."', percentage_wc=".$perwc_add.", percentage_payment=".$perpay_add;
		    		$insertquery .= ", payment=".$payment_add.", status='Not started', addedby='".$_SESSION['username']."'";
		    		//echo "<br><br>".$insertquery; //exit;
					$dbinseertquery = new dbquery($insertquery,$connid);
    			}
    		}
    		//exit;
    	}
  	}
  	
  	function editProjectCostBreakup($connid)
  	{
  		$this->setpostvars();
  		$this->setgetvars();
  		/*echo "<pre>";
  		print_r($_GET); 
  		echo $this->costid;
  		echo "</pre>";*/
  		if($this->action == "Edit Project Cost Breakup")
    	{
    		if($this->perwcisperpay != "")
    		{
    			$upquery = "UPDATE lsa_projects_totalcost SET perwcisnotperpay='Y' WHERE costid=".$this->costid;
    			$dbupquery = new dbquery($upquery,$connid);
    			//echo $upquery; exit;
    		}
    		else 
    		{
    			$upquery = "UPDATE lsa_projects_totalcost SET perwcisnotperpay='N' WHERE costid=".$this->costid;
    			$dbupquery = new dbquery($upquery,$connid);
    			//echo $upquery; exit;
    		}
    		$totalcost = $this->fetchTotalCost($this->costid,$connid);
    		for($i=1; $i<=25; $i++)
    		{
    			$costbreakupid = "costbreakupid".$i;
    			$desc = "description".$i;
    			if(isset($_POST[$desc]) && $_POST[$desc]!="")
    			{
		    		$pdate   = "planneddate".$i;
		    		$edate   = "expecteddate".$i;
		    		$perwc   = "perwc".$i;
		    		$perpay  = "perpay".$i;
	    			$payment = "payment".$i;
    				
    				$perpay_add  = $_POST[$perpay];
    				$payment_add = $_POST[$payment];
					if(isset($_POST["ispercwc"]))
    					$perwc_add = $_POST[$perwc];
	    			else 
	    				$perwc_add = $perpay_add;
	    			
	    			if(isset($_POST[$costbreakupid]) && $_POST[$costbreakupid]!="")
	    			{
	    				$updatequery  = "UPDATE lsa_projects_totalcost_breakup SET description='".$_POST[$desc]."',";
			    		$updatequery .= "planneddate='".formatDate($_POST[$pdate])."', expecteddate='".formatDate($_POST[$edate])."', percentage_wc=".$perwc_add.", percentage_payment=".$perpay_add;
			    		$updatequery .= ", payment=".$payment_add.", addedby='".$_SESSION['username']."' WHERE costbreakupid=".$_POST[$costbreakupid];
			    		//echo "<br><br>".$updatequery; //exit;
						$dbupdatequery = new dbquery($updatequery,$connid);
	    			}
	    			else 
	    			{
	    				$insertquery  = "INSERT INTO lsa_projects_totalcost_breakup SET costid=".$this->costid.", description='".$_POST[$desc]."',";
			    		$insertquery .= "planneddate='".formatDate($_POST[$pdate])."', expecteddate='".formatDate($_POST[$pdate])."', percentage_wc=".$perwc_add.", percentage_payment=".$perpay_add;
			    		$insertquery .= ", payment=".$payment_add.", status='Not started', addedby='".$_SESSION['username']."'";
			    		//echo "<br><br>".$insertquery; //exit;
						$dbinseertquery = new dbquery($insertquery,$connid);
	    			}
    			}
    		}
    		//exit;
    		$url = "lsa_projecttracker_main.php";
			echo "<script>redirectPage('".$url."')</script>";
    	}
    	
    	if($this->action=="Add Edit Project Debit Breakup")
    	{
    		for($i=1; $i<=10; $i++)
    		{
    			$debitbreakupid = "debitbreakupid".$i;
    			$desc = "debitdescription".$i;
    			if(isset($_POST[$desc]) && $_POST[$desc]!="")
    			{
		    		$pdate   = "debitplanneddate".$i;
		    		$edate   = "debitexpecteddate".$i;		    		
	    			$payment = "debitpayment".$i;
    				    				
    				$payment_add = $_POST[$payment];
						   
	    			if(isset($_POST[$debitbreakupid]) && $_POST[$debitbreakupid]!="")
	    			{		    				
	    				$updatequery  = "UPDATE lsa_projects_debit_breakup SET description='".$_POST[$desc]."',";
			    		$updatequery .= "planneddate='".formatDate($_POST[$pdate])."', expecteddate='".formatDate($_POST[$edate])."'";
			    		$updatequery .= ", payment=".$payment_add.", addedby='".$_SESSION['username']."' WHERE debitbreakupid=".$_POST[$debitbreakupid];
			    		//echo "<br><br>".$updatequery; //exit;
						$dbupdatequery = new dbquery($updatequery,$connid);
	    			}
	    			else 
	    			{
	    				$insertquery  = "INSERT INTO lsa_projects_debit_breakup SET costid=".$this->costid.", description='".$_POST[$desc]."',";
			    		$insertquery .= "planneddate='".formatDate($_POST[$pdate])."', expecteddate='".formatDate($_POST[$edate])."'";
			    		$insertquery .= ", payment=".$payment_add.", status='Not started', addedby='".$_SESSION['username']."'";
			    		//echo "<br><br>".$insertquery; //exit;
						$dbinseertquery = new dbquery($insertquery,$connid);
	    			}
    			}
    			else 
    			{    				
    				if(isset($_POST[$debitbreakupid]) && $_POST[$debitbreakupid]!="")
	    			{	
	    				$pdate   = "debitplanneddate".$i;
		    			$edate   = "debitexpecteddate".$i;		    		
	    				$payment = "debitpayment".$i;
    				    				
    					$payment_add = $_POST[$payment];
    					
	    				if($_POST[$desc]=="" && ($_POST[$pdate]=="" || $_POST[$pdate]=="0000-00-00") && ($_POST[$edate]=="" || $_POST[$edate]=="0000-00-00") && ($_POST[$payment]=="" || $_POST[$payment]==0))
	    				{
	    					$deletequery = "DELETE FROM lsa_projects_debit_breakup WHERE debitbreakupid=".$_POST[$debitbreakupid];	    					
	    					$dbdeletequery = new dbquery($deletequery,$connid);
	    				}
	    			}	
    			}
    		}    		
    		//exit;
    		$url = "lsa_projecttracker_main.php";
			echo "<script>redirectPage('".$url."')</script>";
    	}
  	}
  	
  	function editProjectMilestone($connid)
  	{
  		$this->setpostvars();
  		$this->setgetvars();
  		if($this->action == "Edit Project Milestone")
    	{
			$upquery  = "UPDATE lsa_projects_totalcost_breakup SET ";
    		$upquery .= "expecteddate='".formatDate($_POST['expecteddate'])."', ";
    		
    		if($_POST['comments'] !="")
    		{
    			$comm_string = $_SESSION['username'].": ".$_POST['comments']."<br>";
    			$upquery .= "comments=concat('".$comm_string."', comments), ";
    		}
    		
    		$upquery .= "modifiedby='".$_SESSION['username']."' ";
    		$upquery .= "WHERE costbreakupid=".$this->costbreakupid;
    		//echo $upquery."<br>";
			$dbupquery = new dbquery($upquery,$connid);
			
			$querystring = "costid=".base64_encode($this->costid);
			$url = "lsa_projecttracker_costbreakup_addview.php?".$querystring;
			echo "<script>redirectPage('".$url."')</script>";
    	}
    	
    	if($this->action == "Upload Invoice Milestone")
    	{
    		//echo "Yeah...";
			$filename = basename($_FILES['invoicefilename']['name']);				
			$extension = substr($filename,-3,3);
			$uploadfile = constant("UPLOADEDFILES")."pms_invoicefiles/".$_POST["invoiceno"].".".$extension;
			//echo "<br>".$uploadfile."<br>";
			if(file_exists($uploadfile))
				unlink($uploadfile);
			checkfileType('photograph',5);	
			if(move_uploaded_file($_FILES['invoicefilename']['tmp_name'], $uploadfile))
			{
			    chmod($uploadfile,0644);
				echo "<center>File uploaded successfully...</center>";
			}
			else 
			{
				echo "<center>Error in uploading file...</center>";
			}
			
			$upquery = "UPDATE lsa_projects_totalcost_breakup SET invoicefilename='".$uploadfile."' WHERE costbreakupid=".$this->costbreakupid;
			$dbupquery = new dbquery($upquery,$connid);
			$url = "lsa_projecttracker_costbreakup_addview.php?costid=".base64_encode($this->costid);
			echo "<script>redirectPage('".$url."')</script>";
    	}
    	
    	if($this->action == "Upload Debit Note")
    	{
    		//echo "Yeah...";
			$filename = basename($_FILES['debitfilename']['name']);				
			$extension = substr($filename,-3,3);
			$uploadfile = constant("UPLOADEDFILES")."pms_debitnotefiles/".$_POST["debitnoteno"].".".$extension;
			//echo "<br>".$uploadfile."<br>";
			if(file_exists($uploadfile))
				unlink($uploadfile);
			checkfileType('photograph',5);	
			if(move_uploaded_file($_FILES['debitfilename']['tmp_name'], $uploadfile))
			{
			    chmod($uploadfile,0644);
				echo "<center>File uploaded successfully...</center>";
			}
			else 
			{
				echo "<center>Error in uploading file...</center>";
			}
			
			$upquery = "UPDATE lsa_projects_debit_breakup SET debitfilename='".$uploadfile."' WHERE debitbreakupid=".$this->debitbreakupid;
			$dbupquery = new dbquery($upquery,$connid);
			$url = "lsa_projecttracker_costbreakup_addview.php?costid=".base64_encode($this->costid);
			echo "<script>redirectPage('".$url."')</script>";
    	}
  	}
  	
  	function fetchMilestoneBreakupCombo_lsa($sbu,$connid)
  	{
  		$this->setpostvars();
  		$milestonecombo = "<option value=''></option>"; 
    	if(!in_array($sbu,$this->sbuarray))
    	{	
	    	$query  = "SELECT a.project_header, a.project, a.roundyear, b.costid as PCOSTID, b.costbreakupid, b.description FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Not started','In progress') AND b.payment!=0.00 ORDER BY a.project, a.roundyear, b.costid, b.costbreakupid";
  		}
  		else 
  		{
  			$query  = "SELECT a.project_header, a.project, a.roundyear, b.costid as PCOSTID, b.costbreakupid, b.description FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Not started','In progress') AND b.payment!=0.00 AND a.sbu='".$sbu."' ORDER BY a.project, a.roundyear, b.costid, b.costbreakupid";
  		}
    	//echo $query."<br>";
    	$pre_costid=0;
    	$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			/*if($pre_costid == $row['PCOSTID'])
				continue;
			else 
				$pre_costid = $row['PCOSTID'];*/
			//echo $row['project']."<br>";
			$projectstr = $row['project_header']." - ".$row['description'];
			if($this->action == "Fetch Cost Breakup Details")
			{
				if($this->costbreakupid == $row['costbreakupid'])
					$milestonecombo .= "<option value='".$row['costbreakupid']."' selected>".$projectstr."</option>"; 
				else 
					$milestonecombo .= "<option value='".$row['costbreakupid']."'>".$projectstr."</option>"; 
			}
			else 
			{
				$milestonecombo .= "<option value='".$row['costbreakupid']."'>".$projectstr."</option>"; 
			}
		}
		return $milestonecombo;
  	}

  	function fetchDebitBreakupCombo_lsa($sbu,$connid)
  	{
  		$this->setpostvars();
  		$debitcombo = "<option value=''></option>"; 
    	if(!in_array($sbu,$this->sbuarray))
    	{	
	    	$query  = "SELECT a.project_header, a.project, a.roundyear, b.costid as PCOSTID, b.debitbreakupid, b.description FROM lsa_projects_totalcost a, lsa_projects_debit_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Not started','In progress') AND b.payment!=0.00 ORDER BY a.project, a.roundyear, b.costid, b.debitbreakupid";
  		}
  		else 
  		{
  			$query  = "SELECT a.project_header, a.project, a.roundyear, b.costid as PCOSTID, b.debitbreakupid, b.description FROM lsa_projects_totalcost a, lsa_projects_debit_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Not started','In progress') AND b.payment!=0.00 AND a.sbu='".$sbu."' ORDER BY a.project, a.roundyear, b.costid, b.debitbreakupid";
  		}
    	//echo $query."<br>";
    	$pre_costid=0;
    	$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			/*if($pre_costid == $row['PCOSTID'])
				continue;
			else 
				$pre_costid = $row['PCOSTID'];*/
			//echo $row['project']."<br>";
			$projectstr = $row['project_header']." - ".$row['description'];
			if($this->action == "Fetch Debit Breakup Details")
			{
				if($this->debitbreakupid == $row['debitbreakupid'])
					$debitcombo .= "<option value='".$row['debitbreakupid']."' selected>".$projectstr."</option>"; 
				else 
					$debitcombo .= "<option value='".$row['debitbreakupid']."'>".$projectstr."</option>"; 
			}
			else 
			{
				$debitcombo .= "<option value='".$row['debitbreakupid']."'>".$projectstr."</option>"; 
			}
		}
		return $debitcombo;
  	}
  	
  	function fetchMilestoneBreakupCombo_act($connid)
  	{
  		$this->setpostvars();
  		$milestonecombo = "<option value=''></option>"; 
    	$query  = "SELECT a.project_header, a.project, a.roundyear, b.costid, b.costbreakupid, b.description FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Completed, invoice not sent yet','Invoiced','Part payment') ORDER BY a.project, a.roundyear";
    	//echo $query."<br>";
    	$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			//echo $row['project']."<br>";
			$projectstr = $row['project_header']." - ".$row['description'];
			if($this->action == "Fetch Cost Breakup Details")
			{
				if($this->costbreakupid == $row['costbreakupid'])
					$milestonecombo .= "<option value='".$row['costbreakupid']."' selected>".$projectstr."</option>"; 
				else 
					$milestonecombo .= "<option value='".$row['costbreakupid']."'>".$projectstr."</option>"; 
			}
			else 
			{
				$milestonecombo .= "<option value='".$row['costbreakupid']."'>".$projectstr."</option>"; 
			}
		}
		return $milestonecombo;
  	}
  	
  	function fetchDebitBreakupCombo_act($connid)
  	{
  		$this->setpostvars();
  		$debitcombo = "<option value=''></option>"; 
    	$query  = "SELECT a.project_header, a.project, a.roundyear, b.costid, b.debitbreakupid, b.description FROM lsa_projects_totalcost a, lsa_projects_debit_breakup b ";
    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Completed, debit note not sent yet','Invoiced','Part payment') ORDER BY a.project, a.roundyear";
    	//echo $query."<br>";
    	$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			//echo $row['project']."<br>";
			$projectstr = $row['project_header']." - ".$row['description'];
			if($this->action == "Fetch Debit Breakup Details")
			{
				if($this->debitbreakupid == $row['debitbreakupid'])
					$debitcombo .= "<option value='".$row['debitbreakupid']."' selected>".$projectstr."</option>"; 
				else 
					$debitcombo .= "<option value='".$row['debitbreakupid']."'>".$projectstr."</option>"; 
			}
			else 
			{
				$debitcombo .= "<option value='".$row['debitbreakupid']."'>".$projectstr."</option>"; 
			}
		}
		return $debitcombo;
  	}
  	
  	function editProjectCostBreakup_lsa($connid)
  	{
  		$this->setpostvars();
  		$this->setgetvars();
  		if($this->action == "Edit Project Cost Breakup")
    	{
			$upquery  = "UPDATE lsa_projects_totalcost_breakup SET ";
    		$upquery .= "status='".$_POST['status']."', ";
    		
    		if($_POST['status'] == "Completed, invoice not sent yet")
    		{
    			$upquery .= "expecteddate='".date("Y-m-d")."', ";
    		}
    		
    		if($_POST['comments'] !="")
    		{
    			$comm_string = $_SESSION['username'].": ".$_POST['comments']."<br>";
    			$upquery .= "comments=concat('".$comm_string."', comments), ";
    		}
    		
    		$upquery .= "modifiedby='".$_SESSION['username']."' ";
    		$upquery .= "WHERE costbreakupid=".$this->costbreakupid;
    		//echo $upquery."<br>"; exit;
			$dbupquery = new dbquery($upquery,$connid);
			$this->message = "Status updated successfully...";
    	}
    	
    	if($this->action == "Edit Project Debit Breakup")
    	{
    		$upquery  = "UPDATE lsa_projects_debit_breakup SET ";
    		$upquery .= "status='".$_POST['debitstatus']."', ";
    		
    		if($_POST['debitstatus'] == "Completed, invoice not sent yet")
    		{
    			$upquery .= "expecteddate='".date("Y-m-d")."', ";
    		}
    		
    		if($_POST['debitcomments'] !="")
    		{
    			$comm_string = $_SESSION['username'].": ".$_POST['debitcomments']."<br>";
    			$upquery .= "comments=concat('".$comm_string."', comments), ";
    		}
    		
    		$upquery .= "modifiedby='".$_SESSION['username']."' ";
    		$upquery .= "WHERE debitbreakupid=".$this->debitbreakupid;
    		//echo $upquery."<br>"; exit;
			$dbupquery = new dbquery($upquery,$connid);
			$this->message = "Status updated successfully...";
    	}
    	
  		if($this->action == "Fetch Cost Breakup Details")
    	{
    		$query  = "SELECT * FROM lsa_projects_totalcost_breakup WHERE costbreakupid=".$this->costbreakupid;
	    	$dbquery = new dbquery($query,$connid);
			return $dbquery;
    	}
    	
    	if($this->action == "Fetch Debit Breakup Details")
    	{
    		$query  = "SELECT * FROM lsa_projects_debit_breakup WHERE debitbreakupid=".$this->debitbreakupid;
	    	$dbquery = new dbquery($query,$connid);
			return $dbquery;
    	}
  	}
  	
  	function editProjectCostBreakup_act($connid)
  	{
  		$this->setpostvars();
  		$this->setgetvars();
  		/*echo "<pre>";
  		print_r ($_POST);
  		echo "</pre>";*/
  		
  		if($this->action == "Edit Project Cost Breakup")
    	{
			$upquery  = "UPDATE lsa_projects_totalcost_breakup SET ";
    		$upquery .= "status='".$_POST['status']."', invoiceno='".$_POST['invoiceno']."', ";
    		if($_POST['invoicedate'] != "")
    			$upquery .= "invoicedate='".formatDate($_POST['invoicedate'])."', ";
    		else 
    			$upquery .= "invoicedate='', ";
    		
    		if($_POST['dispatchdate'] != "")
    			$upquery .= "dispatchdate='".formatDate($_POST['dispatchdate'])."', ";
    		else 
    			$upquery .= "dispatchdate='', ";
    		
    		if(isset($_POST['status']) && $_POST['status']=="Invoiced")
    			$upquery .= "expecteddate='".formatDate($_POST['invoicedate'])."', ";
    			
    		$upquery .= "couriercompany='".$_POST['couriercompany']."', consignmentno='".$_POST['consignmentno']."', ";
    		
    		if($_POST['chequeno'] !="")
    			$upquery .= "chequeno=concat(chequeno,'".$_POST['chequeno']."',','), ";
    		if($_POST['chequedate'] !="")
    			$upquery .= "chequedate=concat(chequedate,'".$_POST['chequedate']."',','), ";
    		if($_POST['amountreceived'] !="")
    			$upquery .= "amountreceived=amountreceived+".$_POST['amountreceived'].", ";
			if($_POST['nagetiveamount'] !="")
    			$upquery .= "nagetiveamount=nagetiveamount+".$_POST['nagetiveamount'].", ";
			if($_POST['nagetiveservicetax'] !="")
    			$upquery .= "nagetiveservicetax=nagetiveservicetax+".$_POST['nagetiveservicetax'].", ";
    		
    		if($_POST['comments_act'] !="")
    		{
    			$comm_string = $_SESSION['username'].": ".$_POST['comments_act']."<br>";
    			$upquery .= "comments=concat('".$comm_string."', comments), ";
    		}
    		
			//$comm_string = $_SESSION['username'].": ".$_POST['comments_act']."<br>";
			//$upquery .= "comments=concat('".$comm_string."', comments), ";
			
    		if($_POST["status"] == "Invoiced")
    		{
    			$servicetax = round($_POST["payment"]*$_POST["servicetax_per"]/100,2);
    			$upquery .= "servicetax_per=".$_POST["servicetax_per"].", ";
    			$upquery .= "servicetax=".$servicetax.", ";
    		}
			
    		if($_POST["status"] == "Payment received")
    		{
				$servicetax = round($_POST["payment"]*$_POST["servicetax_per"]/100,2);
	    		$grossamount = $_POST["payment"]+$servicetax;
	    		if($_POST["tdsamount"]!="")
	    		{
	    			$tds_per = round($_POST["tdsamount"]*100/$grossamount,2);
	    			$upquery .= "tds=".$_POST["tdsamount"].", ";
		    		$upquery .= "tds_per=".$tds_per.", ";
	    		}
	    		if($_POST["tdsamount"]=="" && $_POST["tds_per"]!="")
	    		{
	    			$tds = round($grossamount*$_POST["tds_per"]/100,2);
	    			$upquery .= "tds=".$tds.", ";
	    			$upquery .= "tds_per=".$_POST["tds_per"].", ";
	    		}
    		}
    		
    		$upquery .= "modifiedby='".$_SESSION['username']."' ";
    		$upquery .= "WHERE costbreakupid=".$this->costbreakupid;
    		//echo $upquery."<br><br>"; //exit;
			$dbupquery = new dbquery($upquery,$connid);
			$this->message = "Status updated successfully...";
    	}
    	    	
    	if($this->action == "Edit Project Debit Breakup")
    	{    		
			$upquery  = "UPDATE lsa_projects_debit_breakup SET ";
    		$upquery .= "status='".$_POST['debitstatus']."', debitnoteno='".$_POST['debitnoteno']."', ";
    		$upquery .= "debitnoteamount='".$_POST['debitnoteamount']."', ";
    		if($_POST['debitnotedate'] != "")
    			$upquery .= "debitnotedate='".formatDate($_POST['debitnotedate'])."', ";
    		else 
    			$upquery .= "debitnotedate='', ";
    		
    		if($_POST['debitdispatchdate'] != "")
    			$upquery .= "dispatchdate='".formatDate($_POST['debitdispatchdate'])."', ";
    		else 
    			$upquery .= "dispatchdate='', ";
    		
    		if(isset($_POST['debitstatus']) && $_POST['debitstatus']=="Invoiced")
    			$upquery .= "expecteddate='".formatDate($_POST['debitnotedate'])."', ";
    			
    		$upquery .= "couriercompany='".$_POST['debitcouriercompany']."', consignmentno='".$_POST['debitconsignmentno']."', ";
    		
    		if($_POST['debitchequeno'] !="")
    			$upquery .= "chequeno=concat(chequeno,'".$_POST['debitchequeno']."',','), ";
    		if($_POST['debitchequedate'] !="")
    			$upquery .= "chequedate=concat(chequedate,'".$_POST['debitchequedate']."',','), ";
    		if($_POST['debitamountreceived'] !="")
    			$upquery .= "amountreceived=amountreceived+".$_POST['debitamountreceived'].", ";
    		
    		if($_POST['debitcomments_act'] !="")
    		{
    			$comm_string = $_SESSION['username'].": ".$_POST['debitcomments_act']."<br>";
    			$upquery .= "comments=concat('".$comm_string."', comments), ";
    		}
    		
			//$comm_string = $_SESSION['username'].": ".$_POST['comments_act']."<br>";
			//$upquery .= "comments=concat('".$comm_string."', comments), ";
			
    		if($_POST["debitstatus"] == "Invoiced")
    		{
    			$servicetax = round($_POST["debitpayment"]*$_POST["debit_servicetax_per"]/100,2);
    			$upquery .= "servicetax_per=".$_POST["debit_servicetax_per"].", ";
    			$upquery .= "servicetax=".$servicetax.", ";
    		}
			
    		if($_POST["debitstatus"] == "Payment received")
    		{
				$servicetax = round($_POST["debitpayment"]*$_POST["debit_servicetax_per"]/100,2);
	    		$grossamount = $_POST["debitpayment"]+$servicetax;
	    		if($_POST["debittdsamount"]!="")
	    		{
	    			$tds_per = round($_POST["debittdsamount"]*100/$grossamount,2);
	    			$upquery .= "tds=".$_POST["debittdsamount"].", ";
		    		$upquery .= "tds_per=".$tds_per.", ";
	    		}
	    		if($_POST["debittdsamount"]=="" && $_POST["debit_tds_per"]!="")
	    		{
	    			$tds = round($grossamount*$_POST["debit_tds_per"]/100,2);
	    			$upquery .= "tds=".$tds.", ";
	    			$upquery .= "tds_per=".$_POST["debit_tds_per"].", ";
	    		}
    		}
    		
    		$upquery .= "modifiedby='".$_SESSION['username']."' ";
    		$upquery .= "WHERE debitbreakupid=".$this->debitbreakupid;
    		//echo $upquery."<br><br>"; exit;
			$dbupquery = new dbquery($upquery,$connid);
			$this->message = "Status updated successfully...";
    	}
    	    	
  		if($this->action == "Fetch Cost Breakup Details")
    	{
    		$query  = "SELECT * FROM lsa_projects_totalcost_breakup WHERE costbreakupid=".$this->costbreakupid;
	    	$dbquery = new dbquery($query,$connid);
			return $dbquery;
    	}
    	
    	if($this->action == "Fetch Debit Breakup Details")
    	{
    		$query  = "SELECT * FROM lsa_projects_debit_breakup WHERE debitbreakupid=".$this->debitbreakupid;
	    	$dbquery = new dbquery($query,$connid);
			return $dbquery;
    	}
  	}
  	
  	function editProjectCost($connid)
  	{
  		$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->action == "Edit Project Status")
    	{
    		//echo "Yeah...";
			$filename = basename($_FILES['contractfilename']['name']);				
			$extension = substr($filename,-3,3);
			$uploadfile = constant("UPLOADEDFILES")."pms_contractfiles/"."contract_".$this->costid.".".$extension;
			//echo "<br>".$uploadfile."<br>";
			if(file_exists($uploadfile))
				unlink($uploadfile);
			checkfileType('photograph',5);	
			if(move_uploaded_file($_FILES['contractfilename']['tmp_name'], $uploadfile))
			{
			    chmod($uploadfile,0644);
				echo "<center>File uploaded successfully...</center>";
			}
			else 
			{
				echo "<center>Error in uploading file...</center>";
			}
			
			$upquery = "UPDATE lsa_projects_totalcost SET signingstatus='".$_POST["signingstatus"]."', contractfilename='".$uploadfile."' WHERE costid=".$this->costid;
			$dbupquery = new dbquery($upquery,$connid);
			$url = "lsa_projecttracker_main.php";
			echo "<script>redirectPage('".$url."')</script>";
    	}
  	}
  	
  	function checkForBreakup($costid,$connid)
  	{
  		$query = "SELECT COUNT(*) FROM lsa_projects_totalcost_breakup WHERE costid=".$costid;
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$cnt_breakups = $row["COUNT(*)"];
    	return $cnt_breakups;
  	}
  	
  	function fetchTotalCostReceived($costid,$connid)
  	{
  		$query = "SELECT SUM(amountreceived) AS TotalAmountReceived FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND status IN ('Part payment','Payment received')";
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_received = $row["TotalAmountReceived"];
    	return $totalamount_received;
  	}
  	
	function checkIfNagetivePayment($costid,$connid)
  	{
  		$ifnagetivepayment = 0;
		$query = "SELECT COUNT(*) FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND (nagetiveamount>0 OR nagetiveservicetax>0)";
    	//echo $query;
				
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	if($row['COUNT(*)']!=0)
			$ifnagetivepayment = 1;
		
		//echo " - ".$ifnagetivepayment."<br><br>";
    	return $ifnagetivepayment;
  	}
	
  	function checkProjectCompleted($costid,$connid)
  	{
  		$projectcompleted=0;
  		
  		$query1 = "SELECT COUNT(*) FROM lsa_projects_totalcost_breakup WHERE costid=".$costid;
    	$dbquery1 = new dbquery($query1,$connid);
    	$row1 = $dbquery1->getrowarray();
    	if($row1['COUNT(*)']!=0)
    	{
	  		$query = "SELECT COUNT(*) FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND status!='Payment received'";
	    	$dbquery = new dbquery($query,$connid);
	    	$row = $dbquery->getrowarray();
	    	if($row['COUNT(*)']==0)
	    		$projectcompleted=1;
    	}	
    	return $projectcompleted;
  	}
  	
  	function fetchTotalCostInvoiced_before08($costid,$connid)
	{
		$date1 = $this->fiscalyear1."-03-31";
		$query  = "SELECT SUM(payment) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		$query .= "(invoicedate<='$date1' AND invoicedate!='' AND invoicedate!='0000-00-00')";
		//echo $query."<br>";
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchTotalCostInvoiced_0809($costid,$connid)
	{
		$query  = "SELECT SUM(payment) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		$query .= "(invoicedate>='2008-04-01' AND invoicedate<='2009-03-31' AND invoicedate!='' AND invoicedate!='0000-00-00')";
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchTotalCostInvoiced_0910($costid,$connid)
	{
		$query  = "SELECT SUM(payment) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		$query .= "(invoicedate>='2009-04-01' AND invoicedate<='2010-03-31' AND invoicedate!='' AND invoicedate!='0000-00-00')";
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchTotalCostInvoiced_1011($costid,$connid)
	{
		$query  = "SELECT SUM(payment) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		$query .= "(invoicedate>='".$this->fiscalyear1."-04-01' AND invoicedate<='".$this->fiscalyear2."-03-31' AND invoicedate!='' AND invoicedate!='0000-00-00')";
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchTotalCostPlanned_0809($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		//$query .= "(planneddate>='2008-04-01' AND planneddate<='2009-03-31' AND planneddate!='' AND planneddate!='0000-00-00') AND (invoicedate='' OR invoicedate='0000-00-00' OR isnull(invoicedate))";
		$query .= "(expecteddate>='2008-04-01' AND expecteddate<='2009-03-31' AND expecteddate!='' AND expecteddate!='0000-00-00')";
    	//echo $query."<br>";
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchTotalCostPlanned_0910($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		//$query .= "(planneddate>='2008-04-01' AND planneddate<='2009-03-31' AND planneddate!='' AND planneddate!='0000-00-00') AND (invoicedate='' OR invoicedate='0000-00-00' OR isnull(invoicedate))";
		$query .= "(expecteddate>='2009-04-01' AND expecteddate<='2010-03-31' AND expecteddate!='' AND expecteddate!='0000-00-00')";
    	//echo $query."<br>";
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchTotalCostPlanned_1011($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		//$query .= "(planneddate>='2008-04-01' AND planneddate<='2009-03-31' AND planneddate!='' AND planneddate!='0000-00-00') AND (invoicedate='' OR invoicedate='0000-00-00' OR isnull(invoicedate))";
		$query .= "(expecteddate>='".$this->fiscalyear1."-04-01' AND expecteddate<='".$this->fiscalyear2."-03-31' AND expecteddate!='' AND expecteddate!='0000-00-00')";
    	//echo $query."<br>";
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchTotalCostPlanned_after10($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		//$query .= "expecteddate>='2009-04-01' AND (invoicedate='' OR invoicedate='0000-00-00' OR isnull(invoicedate))";
		$query .= "expecteddate>='".$this->fiscalyear2."-04-01'";
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}

	function fetchPerWC($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		$query .= "expecteddate>='2008-04-01' AND expecteddate<='2009-03-31'";
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchPerWC0910($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		$query .= "expecteddate>='2009-04-01' AND expecteddate<='2010-03-31'";
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function fetchPerWC1011($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalAmountInvoiced FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND ";
		$query .= "expecteddate>='".$this->fiscalyear1."-04-01' AND expecteddate<='".$this->fiscalyear2."-03-31' AND status='Invoiced'";
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalamount_invoiced = $row["TotalAmountInvoiced"];
    	return $totalamount_invoiced;
	}
	
	function checkPerWC100($costid,$connid)
	{
		$query  = "SELECT SUM(percentage_wc) AS TotalWC FROM lsa_projects_totalcost_breakup WHERE costid=".$costid;
		$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$totalwc = $row["TotalWC"];
    	return $totalwc;
    	
    	/*if($totalwc<=99.8 && $totalwc>=100.2)
    		return "N";
    	else 
    		return "Y";*/
	}
	
  	function fetchTotalCostBreakup($costid,$connid)
  	{
  		$query = "SELECT * FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." ORDER BY costbreakupid";
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;
  	}
  	
  	function fetchTotalDebitBreakup($costid,$connid)
  	{
  		$query = "SELECT * FROM lsa_projects_debit_breakup WHERE costid=".$costid." ORDER BY debitbreakupid";
    	$dbquery = new dbquery($query,$connid);    	
    	return $dbquery;
  	}
  	
  	function fetchMilestoneDetails($costbreakupid,$connid)
  	{
  		$query = "SELECT * FROM lsa_projects_totalcost_breakup WHERE costbreakupid=".$costbreakupid;
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;
  	}
  	
  	function fetchMilestoneDebitDetails($debitbreakupid,$connid)
  	{
  		$query = "SELECT * FROM lsa_projects_debit_breakup WHERE debitbreakupid=".$debitbreakupid;
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;
  	}
  	
  	function fetchTotalCostBreakup_lsa($costid,$connid)
  	{
  		$query = "SELECT * FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND status IN ('Not started','In progress')";
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;
  	}
  	
  	function fetchTotalCostBreakup_act($costid,$connid)
  	{
  		$query = "SELECT * FROM lsa_projects_totalcost_breakup WHERE costid=".$costid." AND status IN ('Completed, invoice not sent yet','Invoiced','Payment received')";
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;
  	}
  	
  	function fetchTotalCost($costid,$connid)
  	{
  		$query = "SELECT totalcost FROM lsa_projects_totalcost WHERE costid=".$costid;
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	if($row['totalcost'] == "")
    		$row['totalcost'] = "0.00";
    	return $row['totalcost'];
  	}
  	
    function addNewProjectCost($connid)
    {
    	$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->action == "Add New Project Cost")
    	{
    		$query = "SELECT COUNT(*) FROM lsa_projects_totalcost WHERE project='".$this->project."' AND roundyear='".$this->roundyear."'";
    		$dbquery = new dbquery($query,$connid);
			$row = $dbquery->getrowarray();
			if($row['COUNT(*)'] > 0)
			{
				$this->message = "Project ".$this->project." with round ".$this->roundyear." already exists!";
			}
			else 
			{
				if($this->project=="Other")
				{
					$this->insertProject($connid);
					$this->project = $this->project_other;
				}
				if($this->roundyear=="Other")
				{
					$this->insertRound($connid);
					$this->roundyear = $this->roundyear_other;
				}
				
				$insertquery  = "INSERT INTO lsa_projects_totalcost SET project_header='".$this->project_header."', project='".$this->project."', roundyear='".$this->roundyear."', sbu='".$this->sbu."',";
				$insertquery .= " startdate='".formatDate($this->startdate)."', enddate='".formatDate($this->enddate)."', totalcost=".$this->totalcost.", signingstatus='Pending Signing', ";
				$insertquery .= " addedby='".$_SESSION['username']."'";
				//echo $insertquery; exit;
				$dbinseertquery = new dbquery($insertquery,$connid);
				$url = "lsa_projecttracker_main.php";
				echo "<script>redirectPage('".$url."')</script>";
			}
    	}
    }
    
    function fetchProjectRoundAmountFromCostID($costid,$connid)
  	{
  		$query = "SELECT * FROM lsa_projects_totalcost WHERE costid=".$costid;
    	$dbquery = new dbquery($query,$connid);
    	$row = $dbquery->getrowarray();
    	$returnstring = $row['project_header']."**".$row['roundyear']."**".$row['totalcost']."**".$row["signingstatus"]."**".$row["perwcisnotperpay"];
    	return $returnstring;
  	}
  	
    function fetchProjectCostDetails($sbu,$connid)
    {
    	$this->setpostvars();
    	if(!in_array($sbu,$this->sbuarray))
    		$query = "SELECT * FROM lsa_projects_totalcost ORDER BY startdate, project, roundyear";
    	else 
    		$query = "SELECT * FROM lsa_projects_totalcost WHERE sbu='".$sbu."' ORDER BY startdate, project, roundyear";
    	
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;
    }
    
    function fetchInvoicesPendingPayment($sbu,$connid)
    {
   		if(!in_array($sbu,$this->sbuarray))
   		{
    		$query  = "SELECT a.*, b.* FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
    		$query .= "WHERE a.costid=b.costid AND b.status IN ('Invoiced','Part payment') ORDER BY a.sbu, a.project, a.roundyear";
    	}
    	else 
    	{
    		$query  = "SELECT a.*, b.* FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
    		$query .= "WHERE a.costid=b.costid AND b.status IN ('Invoiced','Part payment') AND a.sbu='".$sbu."' ORDER BY a.sbu, a.project, a.roundyear";
    	}
    
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;	
    }
    
    function fetchInvoicesTobeRaised($sbu,$connid)
    {
   		if(!in_array($sbu,$this->sbuarray))
   		{
	   		$query  = "SELECT a.*, b.* FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Completed, invoice not sent yet') ORDER BY a.sbu, a.project, a.roundyear";
   		}
   		else 
   		{
   			$query  = "SELECT a.*, b.* FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Completed, invoice not sent yet') AND a.sbu='".$sbu."' ORDER BY a.sbu, a.project, a.roundyear";
   		}
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;	
    }

    function fetchInvoicesTobeRaisedDateBased($sbu,$connid)
    {
   		$today = date('Y-m-d');
    	if(!in_array($sbu,$this->sbuarray))
   		{
	   		$query  = "SELECT a.*, b.* FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Not started', 'In progress') AND b.expecteddate<='".$today."' AND b.payment!=0.00 ORDER BY a.sbu, a.project, a.roundyear";
   		}
   		else 
   		{
   			$query  = "SELECT a.*, b.* FROM lsa_projects_totalcost a, lsa_projects_totalcost_breakup b ";
	    	$query .= "WHERE a.costid=b.costid AND b.status IN ('Not started', 'In progress') AND b.expecteddate<='".$today."' AND b.payment!=0.00 AND a.sbu='".$sbu."' ORDER BY a.sbu, a.project, a.roundyear";
   		}
   		//echo $query;
    	$dbquery = new dbquery($query,$connid);
    	return $dbquery;	
    }
    
    function fetchSBUOfUser($connid)
    {
    	//$query = "SELECT dept FROM emp_master WHERE userID='".$_SESSION['username']."'";
    	$query = "SELECT sbu_fullname FROM sbu_master a, emp_master b WHERE userID='".$_SESSION['username']."' AND b.empl_sbu_id=a.srno";
    	$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["sbu_fullname"];
    }
    
    function numberformat_indian($number)
    {
    	$number = round($number);
    	if(strlen($number)<=3)
			return "";
			
    	$pos = strpos($number, ".");
    	if($pos===false)
    		$number .= ".00";
    	$org_num = $number;
    	
		$len = strlen($number); 
		if($number == ".00")
			return "";   	
    	$number = substr($number,0,$len-3);
    	$len = strlen($number);    	
    	$number = substr($number,0,$len-3).",".substr($number,$len-3);
    	//echo $org_num."--".$number."<br>";
    	
    	$number_array = explode(",",$number);
    	$pnumber = $number_array[0];
    	$len = strlen($pnumber);    	
    	if($len>=3)
    	{
	    	$len1 = strlen($pnumber);    	
	    	$pnumber = substr($pnumber,0,$len1-2).",".substr($pnumber,$len-2);
	    	$number = $pnumber.",".$number_array[1];
    	}
    	//echo $org_num."--".$number."<br>";
    	
    	$number_array = explode(",",$number);
    	$pnumber = $number_array[0];
    	$len = strlen($pnumber);    	
    	if($len>=3)
    	{
	    	$len1 = strlen($pnumber);    	
	    	$pnumber = substr($pnumber,0,$len1-2).",".substr($pnumber,$len-2);
	    	$number = $pnumber.",".$number_array[1].",".$number_array[2];
    	}
    	//echo $org_num."--".$number."<br>";
    	
    	$number_array = explode(",",$number);
    	$pnumber = $number_array[0];
    	$len = strlen($pnumber);    	
    	if($len>=3)
    	{
	    	$len1 = strlen($pnumber);    	
	    	$pnumber = substr($pnumber,0,$len1-2).",".substr($pnumber,$len-2);
	    	$number = $pnumber.",".$number_array[1].",".$number_array[2].",".$number_array[3];
    	}
    	
    	//echo $org_num."--".$number."<br>"; //exit;
    	$number_array = explode(",",$number);
    	$pnumber = $number_array[0];
    	$len = strlen($pnumber);    	
    	if($len>=3)
    	{
	    	$len1 = strlen($pnumber);    	
	    	$pnumber = substr($pnumber,0,$len1-2).",".substr($pnumber,$len-2);
	    	$number = $pnumber.",".$number_array[1].",".$number_array[2].",".$number_array[3].",".$number_array[4];
    	}

    	//echo $org_num."--".$number; exit;
    	$number_array = explode(",",$number);
    	$pnumber = $number_array[0];
    	$len = strlen($pnumber);    	
    	if($len>=3)
    	{
	    	$len1 = strlen($pnumber);    	
	    	$pnumber = substr($pnumber,0,$len1-2).",".substr($pnumber,$len-2);
	    	$number = $pnumber.",".$number_array[1].",".$number_array[2].",".$number_array[3].",".$number_array[4].",".$number_array[5];
    	}

    	//echo $org_num."--".$number; exit;
    	return $number;
    	
    }
    function fetchProjects($connid)
	{
		$projectNames = array();
		$query = "SELECT project FROM lsa_projects ORDER BY project";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectNames,$row["project"]);
		}
		return $projectNames;
	}

	function fetchProjectRounds($connid)
	{
		$projectRoundNames = array();
		$query = "SELECT roundyear FROM lsa_projects_rounds ORDER BY roundyear";
		$dbquery = new dbquery($query,$connid);
		while($row = $dbquery->getrowarray())
		{
			array_push($projectRoundNames,$row["roundyear"]);
		}
		return $projectRoundNames;
	}

	function insertProject($connid)
    {
    	$insQuery = "INSERT INTO lsa_projects SET project='".$this->project_other."', sbu='".$this->sbu."'";
    	$insdbquery = new dbquery($insQuery,$connid);
    }
    function insertRound($connid)
    {
    	$insQuery = "INSERT INTO lsa_projects_rounds SET roundyear='".$this->roundyear_other."'";
    	$insdbquery = new dbquery($insQuery,$connid);
    }
    
    function fetchServiceTax($connid)
    {
    	$query = "SELECT * FROM lsa_projects_servicetaxdetails ORDER BY effectivefrom DESC LIMIT 1";
    	$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["percentage"];
    }
    
    function fetchTDS($connid)
    {
    	$query = "SELECT * FROM lsa_projects_tdsdetails ORDER BY effectivefrom DESC LIMIT 1";
    	$dbquery = new dbquery($query,$connid);
		$row = $dbquery->getrowarray();
		return $row["percentage"];
    }
    
    function createTable($connid)
    {
    	   $tablename = "anscode_master_".strtolower($this->project_other);
    	   $createQuery = "CREATE TABLE ".$tablename." (
		  `Class` varchar(5) default NULL,
		  `Subject` varchar(15) default NULL,
		  `Qno` smallint(6) default NULL,
		  `SuggestedQno` varchar(5) NOT NULL default '',
		  `SkillNo` smallint(6) default NULL,
		  `MechConc` char(1) default NULL,
		  `SfNsf` char(3) NOT NULL default '',
		  `desc1` varchar(250) NOT NULL default '',
		  `ans_code1` char(2) default NULL,
		  `marks1` decimal(3,2) default NULL,
		  `desc2` varchar(250) NOT NULL default '',
		  `ans_code2` char(2) default NULL,
		  `marks2` decimal(3,2) default NULL,
		  `desc3` varchar(250) NOT NULL default '',
		  `ans_code3` char(2) default NULL,
		  `marks3` decimal(3,2) default NULL,
		  `desc4` varchar(250) NOT NULL default '',
		  `ans_code4` char(2) default NULL,
		  `marks4` decimal(3,2) default NULL,
		  `desc5` varchar(250) NOT NULL default '',
		  `ans_code5` char(2) default NULL,
		  `marks5` decimal(3,2) default NULL,
		  `desc6` varchar(250) NOT NULL default '',
		  `ans_code6` char(2) default NULL,
		  `marks6` decimal(3,2) default NULL,
		  `desc7` varchar(250) NOT NULL default '',
		  `ans_code7` char(2) default NULL,
		  `marks7` decimal(3,2) default NULL,
		  `desc8` varchar(250) NOT NULL default '',
		  `ans_code8` char(2) default NULL,
		  `marks8` decimal(3,2) default NULL,
		  `desc9` varchar(250) NOT NULL default '',
		  `ans_code9` char(2) default NULL,
		  `marks9` decimal(3,2) default NULL,
		  `desc10` varchar(250) NOT NULL default '',
		  `ans_code10` char(2) default NULL,
		  `marks10` decimal(3,2) default NULL,
		  `roundyear` varchar(20) NOT NULL default '',
		  `mcq` char(1) NOT NULL default '',
		  `comments` text NOT NULL
		) ENGINE=MyISAM DEFAULT CHARSET=latin1;
		";
    	   $createdbquery = new dbquery($createQuery,$connid);
    }
}
?>