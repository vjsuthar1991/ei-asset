<?php
class clsdatablet
{
	var $connid;
	var $tabletid;
	var $mac_address;
	var $kitno;
	var $created_dt;
	var $created_by;
	var $action;
	var $submited;
	var $request_id;
	var $delete_request_id;
	var $delete_kitno;
	var $msg;
	
	function clsdatablet($connid = "")
	{
		$this->connid = $connid; // Connection
		$this->tabletid = 0;
		$this->mac_address = "";
		$this->kitno = "";
		$this->created_by = "";
		$this->created_dt = "";
		$this->action = "";
		$this->submited = "";
		$this->request_id = "";
		$this->delete_request_id = "";
		$this->delete_kitno = "";	
		$this->msg = "";
	}
	
	function setpostvars()
	{  
		if(isset($_POST["clsdatablet_hdnsubmited"])) $this->submited = $_POST["clsdatablet_hdnsubmited"];
		if(isset($_POST["clsdatablet_hdnaction"])) $this->action = $_POST["clsdatablet_hdnaction"];
		if(isset($_POST["clsdatablet_mac_address"])) $this->mac_address = $_POST["clsdatablet_mac_address"];
		if(isset($_POST["clsdatablet_kitno"])) $this->kitno = $_POST["clsdatablet_kitno"];
		if(isset($_POST["clsdatablet_hdndelete_kitno"])) $this->delete_kitno = $_POST["clsdatablet_hdndelete_kitno"];
		if(isset($_POST["clsdatablet_hdndelete_request_id"])) $this->delete_request_id = $_POST["clsdatablet_hdndelete_request_id"];
				
	}
	
	function setgetvars()
    {
        if(isset($_GET["tabletid"])) $this->tabletid = trim($_GET["tabletid"]);
        if(isset($_GET["macaddr"])) $this->mac_address = trim($_GET["macaddr"]);
        if(isset($_GET["requestid"])) $this->request_id = trim($_GET["requestid"]);
    }
    
    function PageEdit()
    {
        $this->setgetvars();
        $this->setpostvars();
        
        if($this->submited)
        {
            if($this->action == "Save")
            {
                $this->savedata($this->tabletid);
            }
        }
        $this->retrivedata($this->tabletid);
    } 
    
    function retrivedata($tabletid){
    	
    	if($tabletid == 0 )    
            return;
     	
     	$query = "SELECT tabletid,mac_address,kitno,created_by,created_dt FROM da_tabletmaster WHERE tabletid = ".$tabletid;
     	$dbqry = new dbquery($query,$this->connid);       	
        if($dbqry->numrows() > 0 )
        {
            $row = $dbqry->getrowarray();
            $this->tabletid   = $row["tabletid"];
            $this->mac_address= $row["mac_address"];
            $this->kitno      = $row["kitno"];
            $this->created_by = $row["created_by"];
            $this->created_dt = $row["created_dt"];            
        }
    }
    
    function savedata($tabletid=0){
    	
    	if($tabletid == 0)
 			$main_query = "INSERT INTO da_tabletmaster (mac_address,kitno,created_by,created_dt) VALUES ('".addslashes($this->mac_address)."','".addslashes($this->kitno)."','".$_SESSION["username"]."',NOW())";
    	else
		{
			$kit_no = "";
			$query = "SELECT kitno FROM da_tabletmaster WHERE tabletid = ".$tabletid;
     		$dbqry = new dbquery($query,$this->connid);       	
        	if($dbqry->numrows() > 0 )
        		$row = $dbqry->getrowarray();
        	$kit_no = $row['kitno'];
			
        	if($kit_no != $this->kitno){
				$query = "SELECT request_id,loaded_dt FROM da_tablettest WHERE tablet_id = ".$tabletid;
 				$dbqry = new dbquery($query,$this->connid);       	
    			if($dbqry->numrows() > 0 )
    			{
					while($row = $dbqry->getrowarray()){
						$query = "INSERT INTO da_tablettest_log (tablet_id, kitno, request_id, loaded_dt) VALUES ('".$tabletid."', '".$kit_no."', '".$row['request_id']."', '".$row['loaded_dt']."')";
						$dbqry_insert = new dbquery($query,$this->connid);
					}
					$query = "DELETE FROM da_tablettest WHERE tablet_id = '".$tabletid."'";
					$dbqry = new dbquery($query,$this->connid);
				}
			}
					
			$main_query = "UPDATE da_tabletmaster SET mac_address = '".$this->mac_address."',kitno = '".$this->kitno."' WHERE tabletid = '".$tabletid."'";	
		}
			
    	$dbqry = new dbquery($main_query,$this->connid);
    	return $dbqry->insertid;
    	
    }
    function PageTabletList()
    {
    	$this->setpostvars();
    	$this->setgetvars();
    	return $this->GetTabletlist();
    }
    
    function GetTabletlist(){
    	
    	$ResultArr = array();
    	$condition = "";
    	if(isset($this->mac_address) && $this->mac_address != '')
    		$condition .= "AND mac_address = '".$this->mac_address."'";
    		
    	if(isset($this->kitno) && $this->kitno != '')
    		$condition .= "AND kitno = '".$this->kitno."'";

    	$query = "SELECT tabletid,mac_address,kitno,created_dt,created_by,group_concat(da_tablettest.request_id ORDER BY da_tablettest.request_id SEPARATOR ', ') AS requestids
				  FROM da_tabletmaster
				  LEFT JOIN da_tablettest ON da_tabletmaster.tabletid = da_tablettest.tablet_id
				  WHERE 1=1 $condition
				  GROUP BY tabletid";
    	$dbqry = new dbquery($query,$this->connid);
    	
    	
    	while($result = $dbqry->getrowarray()){
    		
    		$ResultArr[] = array("tabletid"=> $result["tabletid"],
    						     "mac_address" => $result["mac_address"],
    						     "kitno" => $result["kitno"],
    						     "created_dt" => $result["created_dt"],
    						     "created_by" => $result["created_by"],
    						     "requestids" => rtrim($result["requestids"],", ")	 
    						     );
    	}
    	
    	return $ResultArr;    	
    }
    
    function GetTabletId(){
    	
    	$this->setpostvars();
    	$this->setgetvars();
    	
    	if($this->mac_address == "") return;
    	
    	$query = "SELECT tabletid FROM da_tabletmaster
				  WHERE mac_address = '".$this->mac_address."'";
    	$dbqry = new dbquery($query,$this->connid);
    	if($dbqry->numrows() > 0){
    		$result = $dbqry->getrowarray();
    		return $result["tabletid"];
    	}else {
    		return $this->savedata();
    	}
    }
    
    function getkitnos(){
    	$this->setgetvars();
        $this->setpostvars();
		if($this->submited)
        {
            if($this->action == "Save"){
                $this->assign_kit_toTablet($this->request_id,$this->kitno);
            }
			if($this->action == "Delete"){
				$this->delete_assign_kit_toTablet($this->delete_request_id,$this->delete_kitno);			
			}
        }
        
    	$ResultArr = array();
    	$query = "SELECT distinct(kitno) FROM da_tabkitmappingtorequest where request_id = '".$this->request_id."' ORDER BY kitno ASC";
    	$dbqry = new dbquery($query,$this->connid);
    	while($result = $dbqry->getrowarray()){
    		$ResultArr[] = $result["kitno"];
    	}
    	return $ResultArr;
    }
	
	function allGetKitnos(){
		$ResultArr = array();
		$query = "SELECT distinct(kitno) FROM da_tabletmaster WHERE kitno != '' ORDER BY kitno ASC";
    	$dbqry = new dbquery($query,$this->connid);
    	while($result = $dbqry->getrowarray()){
    		$ResultArr[] = $result["kitno"];
    	}
    	return $ResultArr;		
	}
	
	function assign_kit_toTablet($requestid,$kitnos){	    
 			$query = "INSERT INTO da_tabkitmappingtorequest (request_id,kitno,assigned_by,assigned_dt) VALUES ('".$requestid."','".$kitnos."','".$_SESSION["username"]."',NOW())";
			$dbqry = new dbquery($query,$this->connid);
		 ?>
    	<script language="javascript">    			
			window.opener.location.href='daAdmin_tablettestlisting.php';
			self.close();
			document.formmain.clsdatablet_hdnaction.value = "GetList";
		</script>	
		<?	
    }
	
	function delete_assign_kit_toTablet($requestid,$kitno){
		
		$removetabletids = "";
		$query = "SELECT GROUP_CONCAT(tabletid) AS tabletids FROM da_tabletmaster where kitno='".$kitno."'";
		$dbqry = new dbquery($query,$this->connid);
		if($dbqry->numrows() > 0) {
			$result = $dbqry->getrowarray();
			$removetabletids = $result["tabletids"];
		}
		
		if($removetabletids != ""){
			
			$query = "INSERT INTO da_tablettest_log (tablettest_id,tablet_id,kitno,request_id,loaded_dt)
					  SELECT id,tablet_id,'".$kitno."','".$requestid."',loaded_dt FROM da_tablettest WHERE request_id= '".$requestid."' AND tablet_id IN($removetabletids)";
			$dbqry_insert = new dbquery($query,$this->connid);
			
			$query = "DELETE FROM da_tablettest WHERE tablet_id IN ($removetabletids) AND request_id = '".$requestid."'";
			$dbqry_delete = new dbquery($query,$this->connid);
		}
			
		$query = "DELETE FROM da_tabkitmappingtorequest WHERE kitno = '".$kitno."' AND request_id = '".$requestid."'";
		$dbqry = new dbquery($query,$this->connid);
		
		$this->msg = "Successfully Deleted Assigned kit!!!";				
	}
	
    function RemoveTabletIDFromLoadedList(){
    	
    	$this->setpostvars();
    	$this->setgetvars();
    
    	if($this->tabletid == 0 || $this->tabletid == "") return;
    	
    	if(isset($this->request_id) && $this->request_id != 0) $condition = "AND request_id = '".$this->request_id."'";
    	
    	$query = "DELETE FROM da_tablettest WHERE tablet_id = '".$this->tabletid."' $condition";
    	$dbqry = new dbquery($query,$this->connid);
    	if($dbqry->affectedrows() > 0){
    		return "Successfully Deleted!";
    	}else { return "Tablet Id Not Found OR Already Deleted!"; } 
    		
    }
       
}	
?>
