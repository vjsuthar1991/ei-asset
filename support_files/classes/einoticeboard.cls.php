<?php
class clsnoticeboard{
	
	var $id;
	var $content;
	var $created_by;
	var $created_dt;
	var $updated_by;
	var $updated_dt;
	var $connid;
	
	var $action;
	var $submited;
	var $msg;
	
	function clsnoticeboard($connid = "")
	{
		$this->connid = $connid;
		$this->id = "";
		$this->content = "";
		$this->created_by = "";
		$this->created_dt = "";
		$this->updated_by = "";
		$this->updated_dt = "";
		$this->submited = "";
		$this->action = "";
		$this->msg = "";
	}

	function setpostvars()
	{
		if(isset($_POST['clsnoticeboard_content'])) $this->content=$_POST['clsnoticeboard_content'];
		if(isset($_POST['clsnoticeboard_hdnsubmited'])) $this->submited=$_POST['clsnoticeboard_hdnsubmited'];
		if(isset($_POST['clsnoticeboard_hdnaction'])) $this->action=$_POST['clsnoticeboard_hdnaction'];
	
	}
	
	function setgetvars()
	{
		#if(isset($_GET['image_name'])) $this->original_imagename=$_GET['image_name'];
	
	}
	
	function PageEditNoticeboard(){
		
		$this->setpostvars();
		$this->setgetvars();
		
		if($this->submited)
		{
			if($this->action == "Save"){
				
				$username = isset($_SESSION["username"])?$_SESSION["username"]:"";
		echo		$query = "UPDATE ei_noticeboard SET content = '".$this->DBVarConv($this->content)."',updated_by = '".$username."' WHERE id = 1";
				$dbqry = new dbquery($query,$this->connid);
				if($dbqry->affectedrows() > 0)
				{
					/*$log_qry = "INSERT INTO ei_noticeboard_log (content,created_by,created_dt,updated_by,updated_dt)
								SELECT content,created_by,created_dt,updated_by,updated_dt FROM ei_noticeboard WHERE id = 1";
					$log_dbqry = new dbquery($log_qry,$this->connid);*/
					
					if(!is_dir(constant("PATH_NOTICEBOARDFILE")))
						mkdir(constant("PATH_NOTICEBOARDFILE"),0755);
					
					$filename = constant("PATH_NOTICEBOARDFILE")."noticeBoard.htm";
								
					$fp=fopen($filename,"w");
					fwrite($fp,stripslashes($this->content));
					fclose($fp);
					chmod($filename,0755);
					
					$this->msg = "Content Updated Successfully!";
				}	
			}
			
		}
		
		$query = "SELECT content,created_by,created_dt,updated_by,updated_dt FROM ei_noticeboard";
		$dbqry = new dbquery($query,$this->connid);
		while($row = $dbqry->getrowarray()){
			$this->content = $row["content"];
		}
		return $this->content;
	}
	
	function HTMLVarConv($var)
	{
		return stripslashes(htmlspecialchars($var,ENT_COMPAT,"UTF-8"));
	}

	function DBVarConv($var)
	{
		if(is_array($var) || $var=='')
			return $var;
		else
			return addslashes($var);
	}

}// class ends here //
?>
