<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Vendor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('schooltrackingmodel');
	}
	
	/*
		Function Name: get_zones
		Description: Action function to List all the zones
		Date Modified: 19-5-2017
	*/

	public function get_zones()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$data['zones'] = $this->vendors->getZones();
		echo json_encode(array('status' => 'success','zones' => $data['zones']));
		die;
	}



	/*
		Function Name: add_vendor
		Description: Action function to add vendor
		Date Modified: 19-5-2017
	*/

	public function add_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		foreach ($inputRequest as $key => $value) {
			$data[$key] = strip_tags(preg_replace('/\s+/', ' ', trim($value)));
		}
		$vendorData = array('vendor_name' => $data['vendor_name'],'vendor_address' => $data['vendor_address'],'vendor_zone' => $data['vendor_zone'],'vendor_username' => $data['vendor_username'],'vendor_password' => $data['vendor_password'],'vendor_phone' => $data['vendor_phone'],'vendor_contact_person_1_name' => $data['vendor_contact_person_1_name'],'vendor_contact_person_1_email' => $data['vendor_contact_person_1_email'],'vendor_contact_person_1_contactno' => $data['vendor_contact_person_1_contact_no'],'vendor_coo_name' => $data['vendor_coo_name'],'vendor_coo_email' => $data['vendor_coo_email'],'vendor_coo_contactno' => $data['vendor_coo_contactno'],'vendor_ceo_name' => $data['vendor_ceo_name'],'vendor_ceo_email' => $data['vendor_ceo_email'],'vendor_ceo_contactno' => $data['vendor_ceo_contact_no'],'vendor_status' => '1');
		$insert = $this->vendors->insertVendor($vendorData);

		if($insert)
		{
			echo json_encode(array('status' => 'success','message' => 'Vendor Added Successfully'));
		}
		else
		{
			echo json_encode(array('status' => 'error','message' => 'There Is Some Error Please Try Again..!!'));	
		}
		die;
	}

	/*
		Function Name: list_vendors
		Description: Action function to list all the vendor
		Date Modified: 19-5-2017
	*/

	public function list_vendors()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$data['vendors'] = $this->vendors->getVendors();
		echo json_encode(array('status' => 'success','vendors' => $data['vendors']));
		die;
	}

	/*
		Function Name: get_vendor
		Description: Action function to get vendor details
		Date Modified: 19-5-2017
	*/

	public function get_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$vendorID = $inputRequest['vendor_id'];

		$vendorData = $this->vendors->getVendorDetails($vendorID);

		echo json_encode(array('status' => 'success','data' => $vendorData));
		die;
	}

	/*
		Function Name: edit_vendor
		Description: Action function to edit vendor details
		Date Modified: 22-5-2017
	*/

	public function edit_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		foreach ($inputRequest as $key => $value) {
			$data[$key] = strip_tags(preg_replace('/\s+/', ' ', trim($value)));
		}

		$vendorData = array('vendor_id' => $data['vendor_id'],'vendor_name' => $data['vendor_name'],'vendor_address' => $data['vendor_address'],'vendor_zone' => $data['vendor_zone'],'vendor_username' => $data['vendor_username'],'vendor_password' => $data['vendor_password'],'vendor_phone' => $data['vendor_phone'],'vendor_contact_person_1_name' => $data['vendor_contact_person_1_name'],'vendor_contact_person_1_email' => $data['vendor_contact_person_1_email'],'vendor_contact_person_1_contactno' => $data['vendor_contact_person_1_contact_no'],'vendor_coo_name' => $data['vendor_coo_name'],'vendor_coo_email' => $data['vendor_coo_email'],'vendor_coo_contactno' => $data['vendor_coo_contactno'],'vendor_ceo_name' => $data['vendor_ceo_name'],'vendor_ceo_email' => $data['vendor_ceo_email'],'vendor_ceo_contactno' => $data['vendor_ceo_contact_no'],'vendor_status' => '1');
		
		$update = $this->vendors->editVendor($vendorData);

		if($update)
		{
			echo json_encode(array('status' => 'success','message' => 'Vendor Details Edited Successfully'));
		}
		else
		{
			echo json_encode(array('status' => 'error','message' => 'There Is Some Error Please Try Again..!!'));	
		}
		die;

	}

	/*
		Function Name: delete_vendor
		Description: Action function to delete vendor
		Date Modified: 22-5-2017
	*/

	public function delete_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$delete = $this->vendors->deleteVendor($inputRequest);
		//$delete = 1;
		
		$data['vendors'] = $this->vendors->getVendors();

		if($delete)
		{
			echo json_encode(array('status' => 'success','message' => 'Vendor Deleted Successfully','vendors' => $data['vendors']));
		}
		else
		{
			echo json_encode(array('status' => 'success','message' => 'There Is Some Error Please Try Again..!!'));
		}


	}

	/*
		Function Name: vendor_login
		Description: Action function for vendor login
		Date Modified: 24-5-2017
	*/

	public function vendor_login()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$login = $this->vendors->loginVendor($inputRequest['vendor_username'],$inputRequest['vendor_password']);
		if(count($login) > 0){
			
			$authtoken = $this->vendors->registerVendorLogin($login[0]->vendor_id);


			echo json_encode(array('status' => 'success', 'data' => $login,'authtoken' => $authtoken));
		}
		else{
			echo json_encode(array('status' => 'error', 'message' => 'Incorrect Username Or Password..Please Try Again!!'));	
		}
		die;
	}

	public function unregisterVendor(){
		
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$this->vendors->unregister($inputRequest['vendor_authtoken']);
	
	}

	public function list_vendor_packingslips(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);
		
		$data['packing_slips'] = $this->vendors->listVendorPackingSlips($inputRequest['vendor_id'],$inputRequest['vendor_authtoken']);

		if(count($data['packing_slips']) > 0){
			echo json_encode(array('status' => 'success','data' => $data['packing_slips']));
		}
		else{
			echo json_encode(array('status' => 'error','data' => $data['packing_slips']));	
		}


	}

	public function acknowledge_packingslip(){
		
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$update = $this->vendors->acknowledgeVendorPackingslip($inputRequest['packingslip_id']);
		if($update)
		{
			$data['packing_slips'] = $this->vendors->listVendorPackingSlips($inputRequest['vendor_id']);
			
			if(count($data['packing_slips']) > 0){
				echo json_encode(array('status' => 'success','data' => $data['packing_slips']));
			}
			else {
				echo json_encode(array('status' => 'error','data' => $data['packing_slips']));	
			}
			
		}

	}

	public function qb_mis(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$data['rounds'] = $this->vendors->getRounds();
		echo json_encode(array('status' => 'success','rounds' => $data['rounds']));
	}

	public function upload_qb_mis(){
		$errors= array();

		if($_FILES['QBMISCsv']['name'] != ""){
		      $file_name = $_FILES['QBMISCsv']['name'];
		      $file_size =$_FILES['QBMISCsv']['size'];
		      $file_tmp =$_FILES['QBMISCsv']['tmp_name'];
		      $file_type=$_FILES['QBMISCsv']['type'];
		      $file_ext=strtolower(end(explode('.',$_FILES['QBMISCsv']['name'])));
		      
		      $extensions= array("xlsx,xls");
		      
		      if(in_array($file_ext,$extensions)){

		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size > 2097152){
		         $errors[]='File size must be excately 2 MB';
		      }
		      
		      if(empty($errors)==true){
		         move_uploaded_file($file_tmp,"./MIS Reports/".$file_name);
		         $success = '1';
		          //echo "Success";
		      }else{
		          $success = '0';
		         print_r($errors);
		      }
		}

		if ($file_ext == "xlsx" || $file_ext == "xls") {
    		//load the excel library
			$this->load->library('excel');
			//read file from path
			$objPHPExcel = PHPExcel_IOFactory::load('./MIS Reports/'.$file_name);
			$worksheet = $objPHPExcel->getSheet(0);
			$sheetData = $worksheet->toArray(null,true,true,true);

			//extract to a PHP readable array format
			$row = 1;
			foreach ($sheetData as $key => $cell) {
			 
			    if ($row == 1) {
			        $header[$row] = $cell;
			    } else {
			        $arr_data[$row] = $cell;
			    }
			    $row++;
			}
			
			//send the data in an array format
			$data['header'] = $header;
			$data['values'] = $arr_data;

			$requiredColumns = array('Sr.No','School Code','School','City','Address','Phone Nos','Principal Name','State','Pincode','Co-ordinator1 Name','Co-ordinator1 Contact No.','Co-ordinator2 Name','Co-ordinator2 Contact No.','Lot','Round','Type','Dispatch Date','Courier','AWB Number','Boxes Qty','Weight','Mode','Status','Delivery Date','Receive Name','Remarks','Urgent');
			
			//$courierCompany = array('Indian Post,DTDC,Seshasai Bangalore,Seshasai Ahmedabad,Seshasai Hyderabad,Seshasai Kolkata,Seshasai Mumbai,Aramex,Deccan 360,Cargo Escort,Blue Dart,Blazeflash,TNT,Spot-on,Overnite,SAFEXPRESS,Srichakra Trans Tech,Gati Courier,TRACKON,First Flight');
			
			$columnFlag = 0;
			foreach ($requiredColumns as $key => $column) {
				if(in_array($column, $data['header'][1]))
				{
					$columnFlag = 0;
				}
 				else {
					$columnFlag = 1;
				}
			}
			
			if($columnFlag != 1){
				if(count($data['values']) > 0){
					$schoolCodeFlag = 0;
					$schoolRecordFlag = 0;
					$schoolContentListFlag = 0;

					foreach ($data['values'] as $key => $value) {
						if($value['B'] == '')
						{
							$schoolCodeFlag = 1;
						}
						else{
							if($value['O'] != '' && $value['P'] != '' && $value['Q'] != '' && $value['R'] != '' && $value['S'] != '' && $value['T'] != '' && $value['U'] != '' && $value['V'] != '' && $value['W'] != ''){
								//echo 'PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.tif';
								$fileExist = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.tif');
								
								if($fileExist != 1 || $fileExist == ''){
									
									$fileExist2 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.pdf');
									
									if($fileExist2 != 1 || $fileExist2 == ''){
									
										$fileExist3 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.jpg');

										if($fileExist3 != 1 || $fileExist3 == ''){
											$schoolContentListFlag = 1;
										}

									}	

									
								}

								if($value['W'] == 'DELIVERED'){
									if($value['X'] != "" && $value['Y'] != ""){

									}
									else{
										$schoolRecordFlag = 1;
									}
								}
							}
							else {
								$schoolRecordFlag = 1;
							}
						}
					}
					
				}

				//$schoolContentListFlag = 0;

				if($schoolCodeFlag == 0 && $schoolRecordFlag == 0 && $schoolContentListFlag == 0){
					

					foreach ($data['values'] as $key => $value) {
						
					if($value['P'] == 'QB') {

						$mailFlag = $this->vendors->updateDespatchDate($value['B'],$value['O'],$value['P'],$value['Q'],$value['W'],$value['X'],$value['Y'],$value['R'],$value['V'],$value['T'],$value['U'],$value['C'],$value['D'],$value['F'],$value['S'],$value['Z']);
						
						if($mailFlag == 1){
							$message = '';
							$subject = '';

							if($value['V'] == 'SFC'){
								
								$value['V'] = 'Surface';
								 
							}

							$subject .= 'Despatch details : '.$value['C'].' of '.$value['O'];
							$message .= 'Respected Sir/ Madam,' ;
							$message .= '<br><br>';
							$message .= 'Greetings from Educational Initiatives!';
							$message .= '<br><br>';
							$message .= 'We Thank you for participating in the ASSET Test.';
							$message .= '<br><br>';
							$message .= 'As per your order we have despatched the Question papers along with other Test materials.';
							$message .= '<br><br>';
							$message .= 'We would humbly request for your kind support for the smooth conduct of the Test, by getting the number of boxes, question booklets for each subject and answers sheets (OMR) checked, with reference to the registered count of students. Answer Sheets can be counted by the number printed on it.';
							$message .= '<br><br>';
							$message .= 'In case of any discrepancy regarding Question Papers/ Test Material, may we request the concerned person to inform us for expeditious corrective action on the e-mail - <a href="mailto:jignasha.mistry@ei-india.com">jignasha.mistry@ei-india.com</a> or <a href="mailto:mitul.patel@ei-india.com">mitul.patel@ei-india.com</a> or call us on toll free no. – 1800 102 8885.';
							$message .= '<br><br>';
							$message .= 'The dispatch details are mentioned below for your kind reference.';
							$message .= '<table><tr><td><b>School Code:</b></td><td>'.$value['B'].'</td></tr><tr><td><b>School:</b></td><td>'.$value['C'].'</td></tr><tr><td><b>City:</b></td><td>'.$value['D'].'</td></tr><tr><td><b>Phone:</b></td><td>'.$value['F'].'</td></tr><tr><td><b>Despatch Mode:</b></td><td>'.$value['V'].'</td></tr><tr><td><b>Despatch Date:</b></td><td>'.date('d-m-Y',strtotime($value['Q'])).'</td></tr><tr><td><b>Consignment Number:</b></td><td>'.$value['S'].'</td></tr><tr><td><b>Courier Company:</b></td><td>'.$value['R'].'</td></tr><tr><td><b>Boxes Details:</b></td><td>'.$value['T'].'</td></tr></table>';
							$message .= '<br><br>';
							$message .= 'The material has been dispatched from our Vendor office at Mumbai and will take few days to reach the school.May we request your representative to contact us or the local courier branch to track the shipment. Please find below the table mentioning contact details of the local courier to track the shipment.';
							$message .= '<br><br>';
							$message .= 'With Best Wishes and Warm Regards,</br>The ASSET Team';
							$message .= '<br><br>';
							

							$courierCompanyDetails = $this->vendors->courierCompanyDetails($value['R'],$value['H'],$value['D']);
							
							if(count($courierCompanyDetails) > 0) {

								$message .= '<table><tr><td><b>Main Branch Office Number:</b></td><td>'.$courierCompanyDetails[0]->phone_no_1.'</td></tr><tr><td><b>Contact Person:</b></td><td>'.$courierCompanyDetails[0]->contact_person.'</td></tr><tr><td><b>Contact Person Email-ID:</b></td><td>'.$courierCompanyDetails[0]->email_Id.'</td></tr><tr><td><b>Website:</b></td><td>'.$courierCompanyDetails[0]->website.'</td></tr><tr><td><b>Contact No. from where the material is Despatched:</b></td><td></td></tr></table>';
							}

							$ci = get_instance();

							$toEmail = array();
							$school_email = $this->vendors->getSchoolEmailId($value['B']);
							$school_principal_email = $this->vendors->getSchoolPrincipalEmailId($value['B']);
							$school_assetcoordinator_email = $this->vendors->getSchoolAssetCoordinatorEmailId($value['B']);

							if(count($school_email) > 0){
								$schoolEmail = $school_email[0]['email'];	
							}
							else{
								$schoolEmail = '';
							}

							if(count($school_principal_email) > 0){
								$school_principal_email = $school_principal_email[0]['contact_mail_1'];
							}
							else{
								$school_principal_email = '';
							}

							if(count($school_assetcoordinator_email) > 0){
								$school_assetcoordinator_email = $school_assetcoordinator_email[0]['contact_mail'];
							}
							else{
								$school_assetcoordinator_email = '';
							}


							if($schoolEmail == ''){
								$schoolEmail = 'harit@ei-india.com';
								array_push($toEmail, $schoolEmail);
								$message .= '<br><br><b>Note:</b> We do not have schools email.';
							}
							else{
								array_push($toEmail, $schoolEmail);
							}

							if($school_principal_email != ''){
								array_push($toEmail, $school_principal_email);
								
							}

							if($school_assetcoordinator_email != ''){
								array_push($toEmail, $school_assetcoordinator_email);
								
							}
							
							$toEmail = array_unique($toEmail);

							$toEmail = implode(',', $toEmail);

							$ccEmail = array();

							array_push($ccEmail, 'jignasha.mistry@ei-india.com');
							array_push($ccEmail, 'mitul.patel@ei-india.com');

							$schoolRegion = $this->vendors->getSchoolRegion($value['B']);

							if($schoolRegion[0]['region'] == 'B-M-H'){
								array_push($ccEmail, 'sherkhan.ei@gmail.com');
								array_push($ccEmail, 'akbarshariff.ei@gmail.com');
								array_push($ccEmail, 'harishkumar.ei@gmail.com');
								array_push($ccEmail, 'kalpanarajan.ei@gmail.com');
							}

							$schoolKeyAccountRM = $this->vendors->getSchoolkeyAccountRM($value['B']);



							if(count($schoolKeyAccountRM) > 0){
								
								$keyaccountrmEmailID = $this->vendors->getSchoolkeyAccountRMEmailID($schoolKeyAccountRM[0]['keyAccount']);

								array_push($ccEmail, $keyaccountrmEmailID[0]['email']);
									
							}

							$schoolBuddyAccountRM = $this->vendors->getSchoolBuddyAccountRM($value['B']);

							if(count($schoolBuddyAccountRM) > 0){
								
								$BuddyrmEmailID = $this->vendors->getSchoolBuddyRMEmailID($schoolBuddyAccountRM[0]['buddyAccount']);

								array_push($ccEmail, $BuddyrmEmailID[0]['email']);
									
							}

							$schoolZMEmail = $this->vendors->getSchoolZMEmailID($schoolRegion[0]['region']);
							
							if(count($schoolZMEmail) > 0){
								array_push($ccEmail, $schoolZMEmail[0]['email']);
							}

							$ccEmail = array_unique($ccEmail);
							
							$ccEmail = implode(',', $ccEmail);
							
							$filename1 = '';

							$fileExist = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.tif');
								
								if($fileExist != 1 || $fileExist == ''){
									
									$fileExist2 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.pdf');
									
									if($fileExist2 != 1 || $fileExist2 == ''){
									
										$fileExist3 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.jpg');

										if($fileExist3 == 1 || $fileExist3 != ''){
											$filename1 = $_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.jpg';
										}

									}
									else{
										$filename1 = $_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.pdf';
									}	

									
								}
								else{
									$filename1 = $_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.tif';		
								}

							$ci->setemail($filename1,$toEmail,$subject,$message,$ccEmail);
						}
					}
					else {

						//Analysis code here
					}

					}
					echo json_encode(array('status' => 'success','message' => 'Dispatch Details Sent Successfully To Logistic..Thank You!!' ));
				}
				else {

					if($schoolContentListFlag == 1){
						echo json_encode(array('status' => 'error','message' => 'Content List Of Few Records Are Missing..!! Please Upload All The School Content List First.' ));								
					}
					else{
						echo json_encode(array('status' => 'error','message' => 'Few Records Are Missing..!! Please Complete The Report And Upload Again.' ));								
					}
					
				}
			}
			else{
				echo json_encode(array('status' => 'error','message' => 'The Format Of Excel Sheet Is Not Correct..!! Please Correct It And Upload Again.' ));					
			}

		}
        die;
	}

	public function setemail($file1,$schoolEmailId,$subject,$message,$ccEmail)

        {
        	
        	$email = $schoolEmailId;
			$subject = $subject;
			$message = $message;
			$this->sendEmail($email,$subject,$message,$file1,$ccEmail);
		}

		

	public function sendEmail($email,$subject,$message,$file1,$ccEmail)
	    
	    {
	    	
	    $config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.googlemail.com',
	      'smtp_port' => 465,
	      'smtp_user' => 'billingdesk@ei-india.com', 
	      'smtp_pass' => 'billing123', 
	      'mailtype' => 'html',
	      'charset' => 'iso-8859-1',
	      'wordwrap' => TRUE
	    );

	      $this->load->library('email', $config);
	      $this->email->set_newline("\r\n");
	      $this->email->from('jignasha.mistry@ei-india.com');
	      //$this->email->to($email);
	      //$this->email->cc($ccEmail);
	      $this->email->subject($subject);
	      $this->email->message($message);
	      if($file1 != null){
	      	$this->email->attach($file1);	
	      }
	      
	      
	      if($this->email->send())
	         {
	          //echo json_encode(array('status' => 'success','message'=> 'Despatch Details Sent Successfully..!!'));
	          //unlink($file1);
	          //unlink($file2);
	          
	         }
	      else
	        {
	         //show_error($this->email->print_debugger());
	         //echo json_encode(array('status' => 'error','message'=> 'Error In Sending Despatch Details Try Again..!!'));
	        }
	      $this->email->clear(TRUE);

	    }


    public function setOMRReceiptemail($schoolEmailId,$subject,$message,$ccEmail)

    {
    	
    	$email = $schoolEmailId;
		$subject = $subject;
		$message = $message;
		$this->sendEmail($email,$subject,$message,$ccEmail);
	}

		

	public function sendOMRReceiptEmail($email,$subject,$message,$ccEmail)
	    
	    {
	    	
	    $config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.googlemail.com',
	      'smtp_port' => 465,
	      'smtp_user' => 'billingdesk@ei-india.com', 
	      'smtp_pass' => 'billing123', 
	      'mailtype' => 'html',
	      'charset' => 'iso-8859-1',
	      'wordwrap' => TRUE
	    );

	      $this->load->library('email', $config);
	      $this->email->set_newline("\r\n");
	      $this->email->from('jignasha.mistry@ei-india.com');
	      //$this->email->to($email);
	      //$this->email->cc($ccEmail);
	      $this->email->subject($subject);
	      $this->email->message($message);
	      
	      if($this->email->send())
	         {
	          //echo json_encode(array('status' => 'success','message'=> 'Despatch Details Sent Successfully..!!'));
	          //unlink($file1);
	          //unlink($file2);
	          
	         }
	      else
	        {
	         //show_error($this->email->print_debugger());
	         //echo json_encode(array('status' => 'error','message'=> 'Error In Sending Despatch Details Try Again..!!'));
	        }
	      $this->email->clear(TRUE);

	    }

	public function setemailVendor($vendorEmailId,$subject,$message)

        {
        	
        	$email = $vendorEmailId;
			$subject = $subject;
			$message = $message;
			$this->sendEmailVendor($email,$subject,$message);
		}

		

	public function sendEmailVendor($email,$subject,$message)
	    
	    {
	    	
	    $config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.googlemail.com',
	      'smtp_port' => 465,
	      'smtp_user' => 'billingdesk@ei-india.com', 
	      'smtp_pass' => 'billing123', 
	      'mailtype' => 'html',
	      'charset' => 'iso-8859-1',
	      'wordwrap' => TRUE
	    );



	      $this->load->library('email', $config);
	      $this->email->set_newline("\r\n");
	      $this->email->from('jignasha.mistry@ei-india.com');
	      $this->email->to($email);
	      $this->email->subject($subject);
	      $this->email->message($message);
	      
	      if($this->email->send())
	         {
	          //echo json_encode(array('status' => 'success','message'=> 'Despatch Details Sent Successfully..!!'));
	          //unlink($file1);
	          //unlink($file2);
	          
	         }
	      else
	        {
	         //show_error($this->email->print_debugger());
	         //echo json_encode(array('status' => 'error','message'=> 'Error In Sending Despatch Details Try Again..!!'));
	        }
	      $this->email->clear(TRUE);

	    }
    

	public function vendor_changepassword(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['checkpassword'] = $this->vendors->checkVendorPassword($inputRequest);

		if(count($data['checkpassword']) > 0){
			
			$update = $this->vendors->updatePasswordFlag($data['checkpassword'][0]['vendor_id'],1,$inputRequest['vendor_new_password']);

			$ci = get_instance();

			$subject = 'Password Reset Link';

			$message = 'Click on the below link to change password';

			$message .= '<br><a href="'.base_url().'vendor/resetVendorPassword?vendor_id='.$data['checkpassword'][0]['vendor_id'].'">Click Here</a>';

			$ci->setemailVendor($data['checkpassword'][0]['vendor_contact_person_1_email'],$subject,$message);

			if($update != ''){
				echo json_encode(array('status' => 'success','message' => 'Check Your Email-ID To Update Password Successfully!!'));

			}
			else{
				echo json_encode(array('status' => 'error','message' => 'There was some error please try again!!'));
			}
		}	
		else{
			echo json_encode(array('status' => 'error','message' => 'Entered Old Password Is Not Correct!!'));
		}	
	}

	public function resetVendorPassword(){

		$vendorId = $_GET['vendor_id'];

		$data['checkauth'] = $this->vendors->checkVendorPasswordResetAuth($vendorId);

		if($data['checkauth'][0]['vendor_password_flag'] == 1){

			$updatePassword = $this->vendors->updatePasswordFlagWithPassword($data['checkauth'][0]['vendor_id'],0,$data['checkauth'][0]['vendor_update_password']);

			unset($_COOKIE['vendor_id']);
			unset($_COOKIE['vendor_authtoken']);

			setcookie('vendor_id', null, -1, '/');
			setcookie('vendor_authtoken', null, -1, '/');

			echo 'Your Password Updated Successfully!!';
			echo '<br>';
			echo 'Please Click <a href="'.str_replace('/api','',base_url()).'vendor-login">Here</a> to Login Again';
			die;
		
		}
		else{
			
			unset($_COOKIE['vendor_id']);
			unset($_COOKIE['vendor_authtoken']);

			setcookie('vendor_id', null, -1, '/');
			setcookie('vendor_authtoken', null, -1, '/');

			echo 'Your Password Cannot be Updated, This LInk Is Already Used!!';
			echo '<br>';
			echo 'Please Click <a href="'.str_replace('/api','',base_url()).'vendor-login">Here</a> to Login Again';

			die;
		}

	}    

	public function upload_omr_receipt_mis(){

		$errors= array();

		$round = $_REQUEST['round'];

		$vendorId = $_REQUEST['vendor_id'];

		if($_FILES['OMRRECEIPTMISCsv']['name'] != ""){

		      $file_name = $_FILES['OMRRECEIPTMISCsv']['name'];
		      $file_size =$_FILES['OMRRECEIPTMISCsv']['size'];
		      $file_tmp =$_FILES['OMRRECEIPTMISCsv']['tmp_name'];
		      $file_type=$_FILES['OMRRECEIPTMISCsv']['type'];
		      $file_ext=strtolower(end(explode('.',$_FILES['OMRRECEIPTMISCsv']['name'])));
		      
		      $extensions= array("xlsx,xls");
		      
		      if(in_array($file_ext,$extensions)){

		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size > 2097152){
		         $errors[]='File size must be excately 2 MB';
		      }
		      
		      if(empty($errors)==true){
		         move_uploaded_file($file_tmp,"./MIS Reports/OMR Receipt/".$file_name);
		         $success = '1';
		          //echo "Success";
		      }else{
		          $success = '0';
		         print_r($errors);
		      }
		}

		if ($file_ext == "xlsx" || $file_ext == "xls") {
    		//load the excel library
			$this->load->library('excel');
			//read file from path
			$objPHPExcel = PHPExcel_IOFactory::load('./MIS Reports/OMR Receipt/'.$file_name);
			$worksheet = $objPHPExcel->getSheet(0);
			$sheetData = $worksheet->toArray(null,true,true,true);

			//extract to a PHP readable array format
			$row = 1;
			foreach ($sheetData as $key => $cell) {
			 
			    if ($row == 1) {
			        $header[$row] = $cell;
			    } else {
			        $arr_data[$row] = $cell;
			    }
			    $row++;
			}
			
			//send the data in an array format
			$data['header'] = $header;
			$data['values'] = $arr_data;

			$requiredColumns = array('Sr.no.','School Code','Courier-POD no, No of PKT','Total PKT','Test Date','Date of Inward(PROPOSED)','Date of scan','QC Done date','Data given to EI Date','NO of Records','POD NO / Date','Remark');
			
			//$courierCompany = array('Indian Post,DTDC,Seshasai Bangalore,Seshasai Ahmedabad,Seshasai Hyderabad,Seshasai Kolkata,Seshasai Mumbai,Aramex,Deccan 360,Cargo Escort,Blue Dart,Blazeflash,TNT,Spot-on,Overnite,SAFEXPRESS,Srichakra Trans Tech,Gati Courier,TRACKON,First Flight');
			
			$columnFlag = 0;
			foreach ($requiredColumns as $key => $column) {
				if(in_array($column, $data['header'][1]))
				{
					$columnFlag = 0;
				}
 				else {
					$columnFlag = 1;
				}
			}
			
			if($columnFlag != 1){
				if(count($data['values']) > 0){
					$schoolCodeFlag = 0;
					$schoolRecordFlag = 0;
					
					foreach ($data['values'] as $key => $value) {
						
						if($value['B'] == '')
						{
							// echo $value['B'];
							// echo $schoolCodeFlag = 1;
						}
						else{
							if($value['C'] != '' && $value['D'] != '' && $value['E'] != '' && $value['F'] != '' && $value['G'] != '' && $value['H'] != '' && $value['I'] != '' && $value['J'] != '' && $value['K'] != ''){
							
								//echo 'PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.tif';
							
							}
							else {
								$schoolRecordFlag = 1;
							}
						}
					}
					
				}

				if($schoolCodeFlag == 0 && $schoolRecordFlag == 0){
					
					foreach ($data['values'] as $key => $value) {
						
					$mailFlag = $this->vendors->updateSchoolStatusOmrReceiptInfo($value,$round,$vendorId);
					
						if($mailFlag > 0) {
							$message = '';
							$subject = '';
							$schoolDetails = $this->schooltrackingmodel->getSchoolName($value['B']);
							$roundDescription = $this->schooltrackingmodel->getRoundDescription($round);
							$resultDate = date('F Y', strtotime("+35 days", strtotime($value['F'])));
							$totalOrder = $this->vendors->getTotalOrder($value['B'],$round);
							
							$subject .= 'Receipt of ASSET OMR sheets: '.$schoolDetails[0]['schoolname'].' - '.$value['B'].'';
							$message .= 'Respected Sir/ Madam,' ;
							$message .= '<br><br>';
							$message .= 'Greetings from Educational Initiatives!';
							$message .= '<br><br>';
							$message .= 'We are writing this mail to confirm that we have received the ASSET answer sheets from your school. Please let us know if there is any discrepancies.';
							$message .= '<br><br>';
							$message .= '<b>Number of registered papers: '.$totalOrder.'</b>';
							$message .= '<br>';
							$message .= '<b>Number of OMR sheets received: '.$value['J'].'</b>';
							$message .= '<br><br>';
							$message .= 'We would like to take this opportunity to thank you for participating in ASSET. The results of '.$roundDescription[0]['description'].' will be sent to you in the month of '.$resultDate.'.';
							$message .= '<br><br>';
							$message .= 'The School Name will appear on all the certificates and reports as below:';
							$message .= '<br><br>';
							$message .= '<b>'.$schoolDetails[0]['schoolname'].' ('.$schoolDetails[0]['city'].')</b><br><br>';
							$message .= 'If there is any change in the school name, please contact us at the earliest. You can write to us at <a href="mailto:info@ei-india.com">info@ei-india.com</a> or at our mailing address. The city name in bracket at the end cannot be removed.';
							$message .= '<br><br>';
							$message .= 'We require a written mail from the school to change the school name.';
							$message .= '<br><br>';
							$message .= 'Thank you for your cooperation. We look forward to your continuous support and keen interest in all activities of EI.';
							$message .= '<br><br>';
							$message .= 'Thanking you with warm regards,<br>';
							$message .= 'Customer Support<br>';							
							$message .= 'Educational Initiatives Pvt. Ltd.<br>';
							$message .= '<a href="mailto:info@ei-india.com">info@ei-india.com</a><br>';
							$message .= 'Customer Support Toll Free: 1800-102-8885<br><br>';
							
							//echo $message;

							$ci = get_instance();

							$toEmail = array();
							$school_email = $this->vendors->getSchoolEmailId($value['B']);
							$school_principal_email = $this->vendors->getSchoolPrincipalEmailId($value['B']);
							$school_assetcoordinator_email = $this->vendors->getSchoolAssetCoordinatorEmailId($value['B']);

							if(count($school_email) > 0){
								$schoolEmail = $school_email[0]['email'];	
							}
							else{
								$schoolEmail = '';
							}

							if(count($school_principal_email) > 0){
								$school_principal_email = $school_principal_email[0]['contact_mail_1'];
							}
							else{
								$school_principal_email = '';
							}

							if(count($school_assetcoordinator_email) > 0){
								$school_assetcoordinator_email = $school_assetcoordinator_email[0]['contact_mail'];
							}
							else{
								$school_assetcoordinator_email = '';
							}


							if($schoolEmail == ''){
								$schoolEmail = 'harit@ei-india.com';
								array_push($toEmail, $schoolEmail);
								$message .= '<br><br><b>Note:</b> We do not have schools email.';
							}
							else{
								array_push($toEmail, $schoolEmail);
							}

							if($school_principal_email != ''){
								array_push($toEmail, $school_principal_email);
								
							}

							if($school_assetcoordinator_email != ''){
								array_push($toEmail, $school_assetcoordinator_email);
								
							}
							
							$toEmail = array_unique($toEmail);

							$toEmail = implode(',', $toEmail);

							$ccEmail = array();

							array_push($ccEmail, 'jignasha.mistry@ei-india.com');
							array_push($ccEmail, 'mitul.patel@ei-india.com');

							$schoolRegion = $this->vendors->getSchoolRegion($value['B']);

							if($schoolRegion[0]['region'] == 'B-M-H'){
								array_push($ccEmail, 'sherkhan.ei@gmail.com');
								array_push($ccEmail, 'akbarshariff.ei@gmail.com');
								array_push($ccEmail, 'harishkumar.ei@gmail.com');
								array_push($ccEmail, 'kalpanarajan.ei@gmail.com');
							}

							$schoolKeyAccountRM = $this->vendors->getSchoolkeyAccountRM($value['B']);

							if(count($schoolKeyAccountRM) > 0){
								
								$keyaccountrmEmailID = $this->vendors->getSchoolkeyAccountRMEmailID($schoolKeyAccountRM[0]['keyAccount']);

								array_push($ccEmail, $keyaccountrmEmailID[0]['email']);
									
							}

							$schoolBuddyAccountRM = $this->vendors->getSchoolBuddyAccountRM($value['B']);

							if(count($schoolBuddyAccountRM) > 0){
								
								$BuddyrmEmailID = $this->vendors->getSchoolBuddyRMEmailID($schoolBuddyAccountRM[0]['buddyAccount']);

								array_push($ccEmail, $BuddyrmEmailID[0]['email']);
									
							}

							$schoolZMEmail = $this->vendors->getSchoolZMEmailID($schoolRegion[0]['region']);
							
							if(count($schoolZMEmail) > 0){
								array_push($ccEmail, $schoolZMEmail[0]['email']);
							}

							$ccEmail = array_unique($ccEmail);
							
							$ccEmail = implode(',', $ccEmail);
							
							$ci->setOMRReceiptemail($toEmail,$subject,$message,$ccEmail);
						}
					
					}
					echo json_encode(array('status' => 'success','message' => 'Dispatch Details Sent Successfully To Logistic..Thank You!!' ));
				}
				
			}
			else{
				echo json_encode(array('status' => 'error','message' => 'The Format Of Excel Sheet Is Not Correct..!! Please Correct It And Upload Again.' ));					
			}

		}
        die;

	}

	public function list_vendor_analysislot(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['analysis_lot_list'] = $this->vendors->analysisVendorLotList($inputRequest['vendor_id']);

		echo json_encode(array('status' => 'success','analysis_lot_list' => $data['analysis_lot_list']));

		die;

	}

	public function acknowledge_analysislot(){
		
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		
		
		$update = $this->vendors->acknowledgeAnalysisLot($inputRequest['analysislotid'],$inputRequest['printingDate'],$inputRequest['kittingDate'],$inputRequest['estimatedDisptachDate']);
		
		if($update)
		{
			$data['analysis_lot_list'] = $this->vendors->analysisVendorLotList($inputRequest['vendor_id']);
			
			if(count($data['analysis_lot_list']) > 0){
				echo json_encode(array('status' => 'success','analysis_lot_list' => $data['analysis_lot_list']));
			}
			else {
				echo json_encode(array('status' => 'error','analysis_lot_list' => $data['analysis_lot_list']));
			}
			
		}

	}

	

	

}
