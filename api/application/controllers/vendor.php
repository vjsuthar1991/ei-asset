<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
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

			// echo '<pre>';
			// print_r($sheetData);
			// die;

			//get only the Cell Collection
			
			//$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();


			//extract to a PHP readable array format
			$row = 1;
			foreach ($sheetData as $key => $cell) {
			 //    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
			 //    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
			 //    $cel = $objPHPExcel->getActiveSheet()->getCell($cell);
			    // $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
			   
			    
    // 			 //echo date('d-M-Y H:i:s', $unixTimeStamp), PHP_EOL;
			 //     //echo $phpDateTimeObject = PHPExcel_Shared_Date::ExcelToPHPObject($cell);
				// //echo phpDateTimeObject->format('Y-m-d');


			 //    //header will/should be in row 1 only. of course this can be modified to suit your need.
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
								$fileExist = file_exists('/Applications/XAMPP/xamppfiles/htdocs/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.tif');
								
								if($fileExist != 1 || $fileExist == ''){
									$schoolContentListFlag = 1;
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
							$message .= '<table><tr><td><b>School Code:</b></td><td>'.$value['B'].'</td></tr><tr><td><b>School:</b></td><td>'.$value['C'].'</td></tr><tr><td><b>City:</b></td><td>'.$value['D'].'</td></tr><tr><td><b>Phone:</b></td><td>'.$value['F'].'</td></tr><tr><td><b>Despatch Mode:</b></td><td>'.$value['V'].'</td></tr><tr><td><b>Despatch Date:</b></td><td>'.$value['Q'].'</td></tr><tr><td><b>Consignment Number:</b></td><td>'.$value['S'].'</td></tr><tr><td><b>Courier Company:</b></td><td>'.$value['R'].'</td></tr><tr><td><b>Boxes Details:</b></td><td>'.$value['T'].'</td></tr></table>';
							$message .= '<br><br>';
							$message .= 'The material has been dispatched from our Vendor office at Mumbai and will take few days to reach the school.May we request your representative to contact us or the local courier branch to track the shipment. Please find below the table mentioning contact details of the local courier to track the shipment.';
							$message .= '<br><br>';
							$message .= 'With Best Wishes and Warm Regards,</n>The ASSET Team';
							$message .= '<br><br>';
							$message .= '<div style="font-weight:bold;text-align:center;">| B - Big Box | SB - Small Box | C - Green Cover |</div>';
							$message .= '<br><br>';

							$courierCompanyDetails = $this->vendors->courierCompanyDetails($value['R'],$value['H'],$value['D']);
							
							if(count($courierCompanyDetails) > 0) {

								$message .= '<table><tr><td><b>Main Branch Office Number:</b></td><td>'.$courierCompanyDetails[0]->phone_no_1.'</td></tr><tr><td><b>Contact Person:</b></td><td>'.$courierCompanyDetails[0]->contact_person.'</td></tr><tr><td><b>Contact Person Email-ID:</b></td><td>'.$courierCompanyDetails[0]->email_Id.'</td></tr><tr><td><b>Website:</b></td><td>'.$courierCompanyDetails[0]->website.'</td></tr><tr><td><b>Contact No. from where the material is Despatched:</b></td><td></td></tr></table>';
							}

							$ci = get_instance();

							$school_email = $this->vendors->getSchoolEmailId($value['B']);

							$schoolEmail = $school_email[0]['email'];

							if($schoolEmail == ''){
								$schoolEmail = 'harit@ei-india.com';
							}

							$filename1 = '';
							$filename1 = '/Applications/XAMPP/xamppfiles/htdocs/PackingSlips/'.$value['O'].'/'.$value['P'].'/'.$value['B'].'.tif';
							$ci->setemail($filename1,'vijay.suthar@ei-india.com',$subject,$message);
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

	public function setemail($file1,$schoolEmailId,$subject,$message)

        {
        	
        	$email = $schoolEmailId;
			$subject = $subject;
			$message = $message;
			$this->sendEmail($email,$subject,$message,$file1);
		}

		

	public function sendEmail($email,$subject,$message,$file1)
	    
	    {
	    	
	    $config = Array(
	      'protocol' => 'smtp',
	      'smtp_host' => 'ssl://smtp.googlemail.com',
	      'smtp_port' => 465,
	      'smtp_user' => 'suthar67@gmail.com', 
	      'smtp_pass' => 'sumansuthar1991', 
	      'mailtype' => 'html',
	      'charset' => 'iso-8859-1',
	      'wordwrap' => TRUE
	    );



	      $this->load->library('email', $config);
	      $this->email->set_newline("\r\n");
	      $this->email->from('abc@gmail.com');
	      $this->email->to($email);
	      $this->email->subject($subject);
	      $this->email->message($message);
	      $this->email->attach($file1);
	      
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

}
