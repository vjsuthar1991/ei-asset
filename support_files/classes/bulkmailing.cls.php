<?php

class bulkmailing
{
	var $to;
	var $subject;
	var $attachment;
	var $message;
	var $action;
	var $fileUploadMessage;
	
	function bulkmailing()
	{
		$this->to = "";
		$this->subject = "";
		$this->attachment = "";
		$this->message = "";
		$this->action = "";
		$this->fileUploadMessage = "";
	}
	
	function setpostvars()
	{
		if(isset($_POST["to"])) 				$this->to   		= DoTrim($_POST["to"]);
		if(isset($_POST["subject"])) 			$this->subject      = DoTrim($_POST["subject"]);
		if(isset($_POST["attachment"])) 		$this->attachment   = DoTrim($_POST["attachment"]);
		if(isset($_POST["message"])) 			$this->message  		= DoTrim($_POST["message"]);
		if(isset($_POST["actiontoperform"])) 	$this->action  		= DoTrim($_POST["actiontoperform"]);
		$this->attachment = $_FILES["attachment"]['name'];
	}
		
	function pageSendBulkMail()
	{
		$this->setpostvars();
		if($this->action == "Send Bulk Mail")
		{
			$timestamp = date('YmdHis');
			$filename = "attachments/".$timestamp."_".$this->attachment;
			if($this->attachment != "")
			{
				if(move_uploaded_file($_FILES['attachment']['tmp_name'], $filename))
				{
					$from = "system@ei-india.com";
					$subject = $this->subject;
					$message = $this->message;
					
					$toArray = explode(",",$this->to);
					$total = count($toArray);
					$mailfailure = "";
					for($i=0; $i<$total; $i++)
					{
						$to = $toArray[$i];
						if($to != "")
						{
							$sentstatus = mail_attachment ($from , $to, $subject, $message, $filename);
							if(!$sentstatus)
							{
								$mailfailure .= $to."<br>";
							}
						}
					}
					if($mailfailure != "")
						echo "Mail Failure: <br>".$mailfailure;
				}
				else 
				{
				    $this->fileUploadMessage = "Possible file upload attack!<br>Please try again...\n";
				}
			}
			else 
			{
				$from = "system@ei-india.com";
				$subject = $this->subject;
				$message = $this->message;
				
				$toArray = explode(",",$this->to);
				$total = count($toArray);
				$mailfailure = "";
				for($i=0; $i<$total; $i++)
				{
					$to = $toArray[$i];
					if($to != "")
					{
						
						$headers = "From: <system@ei-india.com>\r\n";
						$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
						$sentstatus = mail_noattachment($to,$subject,$message,$headers);	
						
						if(!$sentstatus)
						{
							$mailfailure .= $to."<br>";
						}
					}
				}
				if($mailfailure != "")
					echo "Mail Failure: <br>".$mailfailure;
			}
		}
	}
}


?>