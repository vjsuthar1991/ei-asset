<?php
class clsfileupload{

    var $temp_file_name;
    var $file_name;
    var $file_type;
    var $file_size;
    var $file_error;
    var $upload_dir;
    var $upload_log_dir;
    var $max_file_size;
    var $banned_array;
    var $ext_array;
    var $file_array;
    var $action;
    var $file_contents;
    var $image_ext_array;
    var $mailtype;
    var $type;
    var $original_imagename;
    var $id;
    var $question_code;
    var $position;
	var $qmaker;
	var $image_id;
	var $fileupload_ajax;
	var $uploadfilename;
	
	function clsfileupload()
	{
		$this->temp_file_name = "";
		$this->file_name = "";
		$this->file_type = "";
		$this->file_size = "";
		$this->file_error = "";
		$this->upload_dir = "";
		$this->upload_log_dir = "";
		$this->max_file_size = "";
		$this->banned_array = "";
		$this->ext_array = "";
		$this->file_array = "";
		$this->action = "";
		$this->file_contents = "";
		$this->image_ext_array = array("jpeg","gif","jpg","png","JPG","pjpeg");
		$this->mailtype = "ASSETscopeNewsletter";
		$this->type = "";
		$this->original_imagename = "";
		$this->id = "";
		$this->question_code = "";
		$this->position = "";
		$this->qmaker = "";
		$this->image_id = "";
		$this->fileupload_ajax = "";
		$this->uploadfilename = "";
		
	}
	function setpostvars()
	{
		if(isset($_POST['clsfileupload_hdnaction'])) $this->action=$_POST['clsfileupload_hdnaction'];
		if(isset($_POST['clsfileupload_hdnoriginalimage'])) $this->original_imagename=$_POST['clsfileupload_hdnoriginalimage'];
		if(isset($_POST['clsfileupload_hdnid'])) $this->id=$_POST['clsfileupload_hdnid'];
		if(isset($_POST['clsfileupload_hdnposition'])) $this->position=$_POST['clsfileupload_hdnposition'];
		if(isset($_POST['clsfileupload_hdnquestioncode'])) $this->question_code=$_POST['clsfileupload_hdnquestioncode'];
		if(isset($_POST['clsfileupload_mailtype'])) $this->mailtype=$_POST['clsfileupload_mailtype'];
		if(isset($_POST['clsfileupload_hdnqmaker'])) $this->qmaker=$_POST['clsfileupload_hdnqmaker'];
		if(isset($_POST['clsfileupload_hdnimageid'])) $this->image_id=$_POST['clsfileupload_hdnimageid'];
		if(isset($_POST['clsfileupload_ajax'])) $this->fileupload_ajax = $_POST['clsfileupload_ajax'];
		if(isset($_POST['clsfileupload'])) $this->uploadfilename = $_POST['clsfileupload'];
		if(isset($_POST['type'])) $this->type=$_POST['type'];
	}
	function setgetvars()
	{
		if(isset($_GET['image_name'])) $this->original_imagename=$_GET['image_name'];
		if(isset($_GET['id'])) $this->id=$_GET['id'];
		if(isset($_GET['questioncode'])) $this->question_code = $_GET['questioncode'];
		if(isset($_GET['position'])) $this->position=$_GET['position'];
	}
    function setfilevars($inputName = "clsfileupload")
    {
		$this->file_array = $_FILES[$inputName];
    	$this->temp_file_name = $_FILES[$inputName]['tmp_name'];
    	$this->file_error = $_FILES[$inputName]['error'];
    	$this->file_name = $_FILES[$inputName]['name'];
    	$this->file_type = $_FILES[$inputName]["type"];
    	$this->file_size = $_FILES[$inputName]["size"];
    }
    function validate_extension()
    {
	    //SECTION #1
	    $file_name = trim($this->file_name);
	    $extension = strtolower(strrchr($file_name,"."));
	    $ext_array = $this->ext_array;
	    $ext_count = count($ext_array);

	    //SECTION #2
	    if (!$file_name)
	    {
	        return false;
	    }
	    else
	    {
	        if (!$ext_array)
	       		return true;
	        else
	        {
	            foreach ($ext_array as $value)
	            {
	                $first_char = substr($value,0,1);
	                    if ($first_char <> ".")
	                   		$extensions[] = ".".strtolower($value);
	                    else
	                 		$extensions[] = strtolower($value);
	            }
				//SECTION #3
	            foreach ($extensions as $value)
	            {
	                if ($value == $extension)
	                	$valid_extension = "TRUE";

	            }
				//SECTION #4
	            if ($valid_extension)
	            	return true;
	             else
	            	return false;
	          }
    	}
	} // Function 1 ends here

	function existing_file()
	{
	    $file_name = trim($this->file_name);
	    $upload_dir = $this->get_upload_directory();

	    if ($upload_dir == "ERROR")
	   		return true;
	    else
	    {
	        $file = $upload_dir . $file_name;
	        if (file_exists($file))
	        	return true;
	        else
	        	return false;

	    }
	} // Function 2 ends here

	function get_file_size()
	{
	    //SECTION #1
	    $temp_file_name = trim($this->temp_file_name);
	    $kb = 1024;
	    $mb = 1024 * $kb;
	    $gb = 1024 * $mb;
	    $tb = 1024 * $gb;

	        //SECTION #2
	        if ($temp_file_name)
	        {
	            $size = filesize($temp_file_name);
	            if ($size < $kb)
	            {
	                $file_size = "$size Bytes";
	            }
	            elseif ($size < $mb)
	            {
	                $final = round($size/$kb,2);
	                $file_size = "$final KB";
	            }
	            elseif ($size < $gb)
	            {
	                $final = round($size/$mb,2);
	                $file_size = "$final MB";
	            }
	            elseif($size < $tb)
	            {
	                $final = round($size/$gb,2);
	                $file_size = "$final GB";
	            }else
	            {
	                $final = round($size/$tb,2);
	                $file_size = "$final TB";
	            }
	        }
	        else
	        {
	            $file_size = "ERROR: NO FILE PASSED TO get_file_size()";
	        }

	        return $file_size;
	} // Function 3 ends here

	function get_max_size()
	{
	    $max_file_size = trim($this->max_file_size);
	    $kb = 1024;
	    $mb = 1024 * $kb;
	    $gb = 1024 * $mb;
	    $tb = 1024 * $gb;

	    if ($max_file_size)
	    {
	        if ($max_file_size < $kb) {
	            $max_file_size = "max_file_size Bytes";
	        }
	        elseif ($max_file_size < $mb) {
	            $final = round($max_file_size/$kb,2);
	            $max_file_size = "$final KB";
	        }
	        elseif ($max_file_size < $gb) {
	            $final = round($max_file_size/$mb,2);
	            $max_file_size = "$final MB";
	        }
	        elseif($max_file_size < $tb) {
	            $final = round($max_file_size/$gb,2);
	                $max_file_size = "$final GB";
	        } else {
	            $final = round($max_file_size/$tb,2);
	            $max_file_size = "$final TB";
	        }
	    }
	    else
	    {
	        $max_file_size = "ERROR: NO SIZE PARAMETER PASSED TO  get_max_size()";
	    }

	    return $max_file_size;
	} // Function 4 ends here


	function get_upload_directory()
	{
	    //SECTION #1
	    $upload_dir = trim($this->upload_dir);

	    //SECTION #2
	    if ($upload_dir) {
	        $ud_len = strlen($upload_dir);
	        $last_slash = substr($upload_dir,$ud_len-1,1);
	            if ($last_slash <> "/") {
	                $upload_dir = $upload_dir."/";
	            } else {
	                    $upload_dir = $upload_dir;
	            }

	        //SECTION #3
	        $handle = @opendir($upload_dir);
	            if ($handle) {
	                $upload_dir = $upload_dir;
	                closedir($handle);
	            } else {
	                $upload_dir = "ERROR";
	            }
	    } else {
	        $upload_dir = "ERROR";
	    }
	    return $upload_dir;
	}
	function get_upload_log_directory()
	{
	    $upload_log_dir = trim($this->upload_log_dir);
	    if ($upload_log_dir)
	    {
	        $ud_len = strlen($upload_log_dir);
	        $last_slash = substr($upload_log_dir,$ud_len-1,1);
	            if ($last_slash <> "/")
	            {
	                $upload_log_dir = $upload_log_dir."/";
	            } else
	            {
	                $upload_log_dir = $upload_log_dir;
	            }
	            $handle = @opendir($upload_log_dir);
                if ($handle)
                {
                    $upload_log_dir = $upload_log_dir;
                    closedir($handle);
                } else
                {
                    $upload_log_dir = "ERROR";
                }
	    } else
	    {
	        $upload_log_dir = "ERROR";
	    }
	    return $upload_log_dir;
	}
	function upload_file_with_validation()
	{
	    //SECTION #1
	    $temp_file_name = trim($this->temp_file_name);
	    $file_name = trim(strtolower($this->file_name));
	    $upload_dir = $this->get_upload_directory();
	    $upload_log_dir = $this->get_upload_log_directory();
	    $file_size = $this->get_file_size();
	    $ip = trim($_SERVER['REMOTE_ADDR']);
	    $cpu = gethostbyaddr($ip);
	    $m = date("m");
	    $d = date("d");
	    $y = date("Y");
	    $date = date("m/d/Y");
	    $time = date("h:i:s A");
	    $existing_file = $this->existing_file();    //<-Add On
	    $valid_size = $this->validate_size();        //<-Add On
	    $valid_ext = $this->validate_extension();    //<-Add On

	    //SECTION #2
	    if (($upload_dir == "ERROR") OR ($upload_log_dir == "ERROR")) {
	        return false;
	    }
	    elseif ((((!$valid_size) OR (!$valid_ext) OR ($existing_file))))
	    {
	        return false;
	    }
	    else
	    {
	        if (is_uploaded_file($temp_file_name))
	        {
	            if (move_uploaded_file($temp_file_name,$upload_dir . $file_name))
	            {
	                $log = $upload_log_dir.$y."_".$m."_".$d.".txt";
	                $fp = fopen($log,"a+");
	                fwrite($fp,"$ip-$cpu | $file_name | $file_size | $date | $time");
	                fclose($fp);
	                return true;
	            } else
	            {
	                return false;
	            }
	        }
	        else
	        {
	            return false;
	        }
	    }
	} // Upload Function ends here.
	function secureFileUpload_newsletter($ext="htm",$type="text/html",$type2="text/plain",$size="350000",$upload_dir='mailers/',$inputName = "clsfileupload")
	{
		$this->setpostvars();
		$targetpath = "../";
		if($this->action == "Upload")
		{
			$this->setfilevars($inputName);
			if((!empty($this->file_array)) && ($this->file_error == 0)) 
			{
			  $filename = basename($this->file_name);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
			  //echo $this->file_type;
			  if (($ext == "htm" || $ext == "html") && ($this->file_type == $type || $this->file_type == $type2) && ($this->file_size < $size)) 
			   {
				 $newname = $targetpath.$upload_dir.$filename;
				 if(eregi("ASSETscope-".date('F')."-".date('Y'),$filename) || eregi("EducatorsWatch-".date('F')."-".date('Y'),$filename)) 
			     {
				     /*if (!file_exists($newname)) 
				     {*/
				 		chmod($this->temp_file_name,0644);
                        if ((move_uploaded_file($this->temp_file_name,$newname))) 
				 		{
				           
						   echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
				           $this->file_contents = file_get_contents($this->file_name);
				           //echo "<div>$contents</div>";
				        } 
				        else 
				        {
				           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
				        }
				     /* } 
				      else 
				      {
				         echo "<font size=2 color=red face=verdana><b>File ".$this->file_name." already exists</font></b>";
				         //$fp = fopen($this->file_name,'r');
				         //$contents = file_get_contents($this->file_name);
				         //echo "<div>$contents</div>";
				      }*/
			      }
			     else 
			      {
			         echo "<font size=2 color=red face=verdana><b>File Name format is not proper</font></b>";
			         //$fp = fopen($this->file_name,'r');
			         //$contents = file_get_contents($this->file_name);
			         //echo "<div>$contents</div>";
			      }
			  } 
			  else 
			  {
			     echo "<font size=2 color=red face=verdana><b>Only .html images under 350Kb are accepted for upload</font></b>";
			  }
			} 
			else 
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
		}
	}
	function secureFileUpload($ext="htm",$type="text/html",$type2="text/plain",$size="350000",$upload_dir='\\mailers\\',$inputName = "clsfileupload",$specifiedFile="")
	{
		$this->setpostvars();
		//$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		$targetpath = "../";
		$allowedExtentions = array("htm","html","pdf");
		$allowedTypes = array("text/html","application/pdf","text/plain");
		if($this->action == "Upload")
		{
			$this->setfilevars($inputName);
			if((!empty($this->file_array)) && ($this->file_error == 0))
			{
			  $filename = basename($this->file_name);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
			  //echo $this->file_type;
			  if (in_array($ext,$allowedExtentions) && (in_array($this->file_type,$allowedTypes)) && ($this->file_size < $size))
			   {
				 $newname = $targetpath.$upload_dir.$filename;
			     if (isset($specifiedFile) && $specifiedFile != "" && $filename==$specifiedFile)
			     {
			 		chmod($this->temp_file_name,0644);
			     	if ((move_uploaded_file($this->temp_file_name,$newname))) 
			 		{
			           //chmod($newname,0775);
			 		   echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
			           //$this->file_contents = file_get_contents($this->file_name);
			           //echo "<div>$contents</div>";
			        } 
			        else
			        {
			           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			        }
			      }
			      else
			      {
			          echo "<font size=2 color=red face=verdana><b>Only EI employee manual or Notice Board Contents can be uploaded</font></b>";
			         //$fp = fopen($this->file_name,'r');
			         //$contents = file_get_contents($this->file_name);
			         //echo "<div>$contents</div>";
			      }
			  }
			  else
			  {
			     echo "<font size=2 color=red face=verdana><b>Extention not proper</font></b>";
			  }
			}
			else
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
		}
	}
	function securePdfFileUpload($size="350000",$upload_dir='detailed_assessment\\uploads\\',$inputName = "clsfileupload",$filename)
	{
		if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")
			$targetpath = "../";
		else
			$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		$status = 0;
		if($this->action == "Upload")
		{
			$this->setfilevars($inputName);
				//echo "File Error ".print_r($this->file_array);
			if((!empty($this->file_array)) && ($this->file_error == 0))
			{
				if($this->file_type == "application/pdf" && $filename != "")
				{
					$newname = $targetpath.$upload_dir.$filename;
					chmod($this->temp_file_name,0664);
			 		if ((move_uploaded_file($this->temp_file_name,$newname)))
			 		{
			           $status = 1;
					   echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
			           $this->file_contents = file_get_contents($this->file_name);
			           //echo "<div>$contents</div>";
			        }
			        else
			        {
			           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			        }
				}
				else
				{
					echo "Only PDF file is allowed for upload";
				}
			}
			else
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
		}
		return $status;
	}
	
	function secureImageFileUpload($size="350000",$upload_dir='asset_online\\quiz_winner_images\\',$inputName = "clsfileupload")
	{
		$this->setpostvars();
		if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")
			$targetpath = "../";
		else
			$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		if($this->action == "Upload" || $this->action == "ImageUpload")
		{
			$this->setfilevars($inputName);
			if((!empty($this->file_array)) && ($this->file_error == 0))
			{
			  $filename = basename($this->file_name);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
			  echo "Image File extension is: ".$this->file_type."<br><br>";
			  if (in_array($ext,$this->image_ext_array) && ($this->file_type == "image/gif" || $this->file_type == "image/jpg" || $this->file_type == "image/png" || $this->file_type == "image/jpeg" || $this->file_type == "image/pjpeg") && ($this->file_size < $size)) 
			   {
				 $newname = $targetpath.$upload_dir.$filename;
			     /*if (!file_exists($newname))
			     {*/
			     	chmod($newname,0775);
			 		if ((move_uploaded_file($this->temp_file_name,$newname)))
			 		{
			           echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
			           $this->file_contents = $newname;
			           //echo "<div>$contents</div>";
			        }
			        else
			        {
			           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			        }
			      /*}
			      else
			      {
			         echo "<font size=2 color=red face=verdana><b>File ".$this->file_name." already exists</font></b>";
			         //$fp = fopen($this->file_name,'r');
			         //$contents = file_get_contents($this->file_name);
			         //echo "<div>$contents</div>";
			      }*/
			  }
			  else
			  {
			     echo "<font size=2 color=red face=verdana><b>Only . images under 350Kb are accepted for upload</font></b>";
			  }
			}
			else
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
		}
	}
	function secureTGImageFileUpload($size="350000",$upload_dir='asset_online\\quiz_winner_images\\',$inputName = "clsfileupload")
	{
		$this->setpostvars();
		if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")
			$targetpath = "../";
		else
			$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		$ext = "";
		if($this->action == "Upload" || $this->action == "ImageUpload")
		{
			$this->setfilevars($inputName);
			if((!empty($this->file_array)) && ($this->file_error == 0))
			{
			  $filename = basename($this->file_name);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
			  //echo $this->file_type;
			  if (in_array($ext,$this->image_ext_array) && ($this->file_type== "image/pjpeg" || $this->file_type == "image/gif" || $this->file_type == "image/jpg" || $this->file_type == "image/png" || $this->file_type == "image/bmp") && ($this->file_size < $size))
			   {
				 $newname = $targetpath.$upload_dir.$filename;
			     /*if (!file_exists($newname))
			     {*/
			     	
			     	if($this->position == "IDO" || $this->position == "GIDO")
		     		{
		     			$onlyname = $this->question_code."_F.".$ext;
		  				$newname = $targetpath.$upload_dir.$onlyname;
		     		}
			     	else if($this->original_imagename != "")
			     	{
			     		$arrFilename = explode('.',$this->original_imagename);
		  				$onlyname = $arrFilename[0]."_F.".$arrFilename[1];
		  				$newname = $targetpath.$upload_dir.$onlyname;
			     	}

			     	if ((move_uploaded_file($this->temp_file_name,$newname)))
			 		{
			           echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
			           $this->file_contents = $newname;
			           //echo "<div>$contents</div>";
			           chmod($newname,0644);
			           					
			        }
			        else
			        {
			           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			        }
			      /*}
			      else
			      {
			         echo "<font size=2 color=red face=verdana><b>File ".$this->file_name." already exists</font></b>";
			         //$fp = fopen($this->file_name,'r');
			         //$contents = file_get_contents($this->file_name);
			         //echo "<div>$contents</div>";
			      }*/
			  }
			  else
			  {
			     echo "<font size=2 color=red face=verdana><b>Only . images under 350Kb are accepted for upload</font></b>";
			  }
			}
			else
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
		}
		return $ext;
	}
	function secureDaImageFileUpload($size="350000",$upload_dir='image_F/',$inputName = "clsfileupload")
	{
		$this->setpostvars();
		//$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		if($this->fileupload_ajax == 'ajax'){
			$this->CheckSimilarImages();
			exit;
		}
		$targetpath = "";
		$ext = "";
		
		if($this->action == "Upload")
		{
			$this->setfilevars($inputName);
			/*print_r($this->file_array);
			echo "Error: ".$this->file_error;*/
			
			if((!empty($this->file_array)) && ($this->file_error == 0))
			{
				$filename = basename($this->file_name);
				list($width, $height, $type, $attr) = getimagesize($this->temp_file_name);
				//echo "Width : ".$width."<br>";
				//echo "Height : ".$height."<br>";
				
				if($width <= 900 && $height <= 1100)
				{
					$ext = substr($filename, strrpos($filename, '.') + 1);
					
					//if(in_array(strtolower($ext),$this->image_ext_array) && ($this->file_type== "image/pjpeg" || $this->file_type == "image/gif" || $this->file_type == "image/jpg" || $this->file_type == "image/jpeg" || $this->file_type == "image/png" || $this->file_type == "image/bmp") && ($this->file_size < $size))
					if(in_array(strtolower($ext),$this->image_ext_array) && ($this->file_type== "image/pjpeg" || $this->file_type == "image/jpg" || $this->file_type == "image/jpeg") && ($this->file_size < $size))
					{
						$dpi = $this->get_dpi($this->temp_file_name);
						$x_coordinat = $dpi[0];
						$y_coordinat = $dpi[1];
						if($x_coordinat==150 && $y_coordinat==150)
						{											
					 	/*if($this->position == "IDO")
				     	{
				     		$onlyname = $this->image_id.".".$ext;
				  			$newname = $targetpath.$upload_dir.$onlyname;
				     	}
						else
						{*/
								$arrFilename = explode('.',$this->original_imagename);
								$uploadedImagename = explode('.',$filename);
								$onlyname = $uploadedImagename[0].".".$ext;
								//$onlyname = $arrFilename[0].".".$ext; // commented by sudhir
							//}
							$newname = $targetpath.$upload_dir.$onlyname;
							
							/*if($this->position == "IDO" || $this->position == "GIDO")
				     		{
				     			$onlyname = $this->question_code."_F.".$ext;
				  				$newname = $targetpath.$upload_dir.$onlyname;
				     		}
					     	else if($this->original_imagename != "")
					     	{
					     		$arrFilename = explode('.',$this->original_imagename);
				  				$onlyname = $arrFilename[0]."_F.".$arrFilename[1];
				  				$newname = $targetpath.$upload_dir.$onlyname;
					     	}*/
							
							if((copy($this->temp_file_name,$newname)))
					 		{
					 		   chmod($newname,0644);
					           echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
					           $this->file_contents = $newname;
					           //echo "<div>$this->file_contents</div>";					        
					        }
					        else
					        {
	
							   echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
							   exit;
					        }
				        }
						else 
						{
							echo "<font size=2 color=red face=verdana><b>Upload image with 150 dpi!</font></b>";							
						}
					}
					else
				  	{
				    	if($this->file_size > $size)
							echo "<font size=2 color=red face=verdana><b>Only . images under 350Kb are accepted for upload</font></b>";
						else
							echo "<font size=2 color=red face=verdana><b>The file type is not allowed";
						exit;
				  	}
				}
				else
				{
					echo "<font size=2 color=red face=verdana><b>Image height/width is exceeding the maximum limit</font></b>";
					exit;
				}

			}
			else
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
				 exit;
			}
		}
		return $filename;
		//return $ext;
	}
	function secureMultipleImageFileUpload($size="350000",$upload_dir='mailers/images/',$inputName = "clsfileupload")
	{
		$this->setpostvars();
		if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")
			$targetpath = "../";
		else
			$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		if($this->action == "UploadImages")
		{
			$this->setfilevars($inputName);
			for($i=0;$i<count($this->file_array);$i++)
			{
			if($this->file_error[$i] == 0)
			{
			$filename = basename($this->file_name[$i]);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
				echo $this->file_type[$i];
			  if (in_array($ext,$this->image_ext_array) && ($this->file_type[$i]== "image/jpeg" || $this->file_type[$i]== "image/pjpeg" || $this->file_type[$i] == "image/gif" || $this->file_type[$i] == "image/jpg" || $this->file_type[$i] == "image/png" || $this->file_type[$i] == "image/x-png" || $this->file_type[$i] == "image/bmp") && ($this->file_size[$i] < $size)) 
			   {
				 $newname = $targetpath.$upload_dir.$filename;
				  if(eregi(date('My')."_",$filename)){
			     /*if (!file_exists($newname)) 
			     {*/
			     	chmod($this->temp_file_name[$i],0644);
					if((move_uploaded_file($this->temp_file_name[$i],$newname)))
			 		{

					   echo "<font size=2 color=green face=verdana><b>The file ".$filename." has been uploaded</font></b><br>";
			           $this->file_contents[$i] = $newname;
			           //echo "<div>$contents</div>";
			        }
			        else
			        {
			           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			        }
			     /*}
			      else
			      {
			         echo "<font size=2 color=red face=verdana><b>File ".$this->file_name." already exists</font></b>";
			         //$fp = fopen($this->file_name,'r');
			         //$contents = file_get_contents($this->file_name);
			         //echo "<div>$contents</div>";
			      }*/
				 }
				 else
				 {
				 	echo "<font size=2 color=red face=verdana><b>File Name is not in proper format</b></font>";
				 }
			  }
			  else
			  {
			     echo "<font size=2 color=red face=verdana><b>Only . images under 350Kb are accepted for upload</font></b>";
			  }
			}
			else
			{
				 //echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
			}
		}
	}

	// XLS file upload interface
	function secureCSVFileUpload($size="2000000",$upload_dir='cheque_writing/uploads/',$inputName = "clsfileupload",$arrUploadedFiles)
	{
		$this->setpostvars();
		if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")
			$targetpath = "../";
		else
			$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		$newname = "";
		if($this->action == "Upload")
		{
			$this->setfilevars($inputName);
			if((!empty($this->file_array)) && ($this->file_error == 0))
			{
			  $filename = basename($this->file_name);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
			  $rename_filename = explode('.',$filename);
			  echo $this->file_type;
			  echo $ext;
			  if($ext == 'csv' && ($this->file_type == "application/octet-stream" || $this->file_type == "application/vnd.ms-excel"))
			   {
				 $newname = $targetpath.$upload_dir.$filename;
				 //echo $newname;
			     /*if (!(is_array($arrUploadedFiles) && in_array($rename_filename[0],$arrUploadedFiles)))
			     {*/
			 		if ((move_uploaded_file($this->temp_file_name,$newname)))
			 		{
			           echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
			           $this->file_contents = $newname;

			           //echo "<div>$contents</div>";
			        }
			        else
			        {
			           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			        }
			     /* }
			      else
			      {
			         echo "<font size=2 color=red face=verdana><b>File ".$filename." has already been entered in to master</font></b>";

			      }*/
			  }
			  else
			  {
			     echo "<font size=2 color=red face=verdana><b>File Type is not correct</font></b>";
			  }
			}
			else
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
		}
		return $newname;
	}
	function uploadTGSchoolLogo($size="2000000",$upload_dir='tgs/school_images/',$inputName = "clsfileupload",$paper_id)
	{
		$this->setpostvars();
		if($_SERVER['SERVER_NAME'] == "www.educationalinitiatives.com")
			$targetpath = "../";
		else
			$targetpath = "C:\\Program Files\\Apache Group\\Apache2\\htdocs\\";
		if($this->action == "Upload")
		{
			$this->setfilevars($inputName);
			if((!empty($this->file_array)) && ($this->file_error == 0))
			{
			  $filename = basename($this->file_name);
			  $ext = substr($filename, strrpos($filename, '.') + 1);
			  //echo $this->file_type;
			  $fileReName = $paper_id.".gif";
			  if (in_array($ext,$this->image_ext_array) && ($this->file_type== "image/pjpeg" || $this->file_type == "image/gif" || $this->file_type == "image/jpg" || $this->file_type == "image/png" || $this->file_type == "image/bmp") && ($this->file_size < $size))
			   {
				 $newname = $targetpath.$upload_dir.$fileReName;
			     /*if (!file_exists($newname))
			     {*/
			     	//chmod($newname,644);
			     	if ((move_uploaded_file($this->temp_file_name,$newname)))
			 		{
			           echo "<font size=2 color=green face=verdana><b>The file has been uploaded</font></b><br>";
			           $this->file_contents = $newname;
			           //echo "<div>$contents</div>";
			           chmod($newname,0644);
			        }
			        else
			        {
			           echo "<font size=2 color=red face=verdana><b>A problem occurred during file upload!</font></b>";
			        }
			      /*}
			      else
			      {
			         echo "<font size=2 color=red face=verdana><b>File ".$this->file_name." already exists</font></b>";
			         //$fp = fopen($this->file_name,'r');
			         //$contents = file_get_contents($this->file_name);
			         //echo "<div>$contents</div>";
			      }*/
			  }
			  else
			  {
			     echo "<font size=2 color=red face=verdana><b>Only . images under 350Kb are accepted for upload</font></b>";
			  }
			}
			else
			{
				 echo "<font size=2 color=red face=verdana><b>Error: No file uploaded</font></b>";
			}
		}
	}
	
	function CheckSimilarImages()
	{
		if(file_exists('../images/'.basename($this->uploadfilename))){
			echo basename($this->uploadfilename);
			exit;
		}else{
			echo "";
		}
	}

	function get_dpi($filename)
	{ 
	
	       // open the file and read first 20 bytes. 
	
	        $a = fopen($filename,'r'); 
	
	        $string = fread($a,20); 
	
	        fclose($a); 
	
	        // get the value of byte 14th up to 18th 
	
	        $data = bin2hex(substr($string,14,4)); 
	
	        $x = substr($data,0,4); 
	
	        $y = substr($data,4,4); 
	
	        return array(hexdec($x),hexdec($y)); 
	} 
}// class ends here //
?>
