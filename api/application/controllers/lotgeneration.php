<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lotgeneration extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('dashboards');
		$this->load->model('packingslips');
		$this->load->model('schooltrackingmodel');
		$this->load->model('qb_mis_list_model');
		$this->load->model('analysis_mis_list_model');

	}

	/*
	
		Function Name: getRoundAndVendorList
		Description: Fetch rounds and vendors list
		Output Format: JSON

	*/

	public function getRoundAndVendorList(){

		$data['rounds'] = $this->vendors->getRounds();

		$data['vendors'] = $this->packingslips->getVendors();

		echo json_encode(array('status' => 'success','rounds' => $data['rounds'],'vendors' => $data['vendors']));

	}

	/*
	
		Function Name: upload_lot_generation_files
		Description: Upload lot genrated QC excel and html file and send to vendor
	
	*/

	public function upload_lot_generation_files(){

		function ordinal($number) {
		    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
		    if ((($number % 100) >= 11) && (($number%100) <= 13))
		        return $number. 'th';
		    else
		        return $number. $ends[$number % 10];
		}

		$errors= array();

		$round = $_REQUEST['round'];	
		$vendor = $_REQUEST['vendor_id'];
		$lot_pendrive_sent_date = $_REQUEST['lot_pendrive_sent_date'];
		$data['user_details'] = $this->dashboards->getUserDetails($_REQUEST['username']);

		if($_FILES['LOTGENERATIONEXCELFile']['name'] != ""){
		      $file_name = $_FILES['LOTGENERATIONEXCELFile']['name'];
		      $file_size = $_FILES['LOTGENERATIONEXCELFile']['size'];
		      $file_tmp = $_FILES['LOTGENERATIONEXCELFile']['tmp_name'];
		      $file_type = $_FILES['LOTGENERATIONEXCELFile']['type'];
		      $file_ext = strtolower(end(explode('.',$_FILES['LOTGENERATIONEXCELFile']['name'])));
		      
		      $extensions= array("xlsx,xls");
		      
		      if(in_array($file_ext,$extensions)){

		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size > 2097152){
		         $errors[]='File size must be excately 2 MB';
		      }
		      
		      if(empty($errors)==true){
		         move_uploaded_file($file_tmp,"./MIS Reports/Analysis Lot Files/".$file_name);
		         $success = '1';
		          //echo "Success";
		      }else{
		          $success = '0';
		         print_r($errors);
		      }
		}

		if($_FILES['LOTGENERATIONCSVFile']['name'] != ""){
		      $file_name2 = $_FILES['LOTGENERATIONCSVFile']['name'];
		      $file_size2 = $_FILES['LOTGENERATIONCSVFile']['size'];
		      $file_tmp2 = $_FILES['LOTGENERATIONCSVFile']['tmp_name'];
		      $file_type2 = $_FILES['LOTGENERATIONCSVFile']['type'];
		      $file_ext2 = strtolower(end(explode('.',$_FILES['LOTGENERATIONCSVFile']['name'])));
		      
		      $extensions= array("html,csv,htm");
		      
		      if(in_array($file_ext2,$extensions)){

		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size2 > 2097152){
		         $errors[]='File size must be excately 2 MB';
		      }
		      
		      if(empty($errors)==true){
		         move_uploaded_file($file_tmp2,"./MIS Reports/Analysis Lot Files/".$file_name2);
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

			$objPHPExcel = PHPExcel_IOFactory::load('./MIS Reports/Analysis Lot Files/'.$file_name);
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

			$requiredColumns = array('School Code');
			
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
					
					foreach ($data['values'] as $key => $value) {
					
						if($value['B'] == '')
						{
							$schoolCodeFlag = 1;
						}
					
					}
					
				}

				//$schoolContentListFlag = 0;

				if($schoolCodeFlag == 0){

					$totalSchools = count($data['values']);
					
					$checkLot = $this->vendors->checkLotNo($round);
					
					if(count($checkLot) > 0) {
						if($checkLot[0]['lotno'] == 0){
							$lotno = 1;
						}
						else {
							$lotno = $checkLot[0]['lotno'] + 1;
						}
					}
					else {
						$lotno = 1;
					}


					$insert = $this->vendors->insertAnalysisLotDetails($round,$vendor,$lotno,$file_name,$file_name2,$lot_pendrive_sent_date);


					if($insert > 0){
					
						foreach ($data['values'] as $key => $value) {
							
							$this->vendors->updateSchoolQCLot($value['B'],$round,$vendor,$lotno);
							
						}

						//Example Usage
						$lotno = ordinal($lotno);

						$attachFile1 = "./MIS Reports/Analysis Lot Files/".$file_name;
		                $attachFile2 = "./MIS Reports/Analysis Lot Files/".$file_name2;

		                $roundName = $this->packingslips->getRoundName($round);
		                $roundFullName = $roundName[0]->description;

		                $data['vendorDetails'] = $this->packingslips->getVendorDetails($vendor);
		                
		                $subject = "$lotno LOT ANALYSIS $roundFullName - QC FILES";
		                $vendorName = $data['vendorDetails'][0]->vendor_contact_person_1_name;
		                $message = 'Hello ';
		                $message .= $vendorName;
		                $message .= ' ji,';
		                $message .= '<br><br>';
		                $penDriveSentDate = date('l jS F Y',strtotime($lot_pendrive_sent_date));
		                $message .= "Sharing the qc files of $lotno lot for Analysis $roundFullName. It contains $totalSchools schools.Pen drive of reports was sent to you on $penDriveSentDate.";
		                $message .= '<br><br>Regards,<br>';
		                $message .= $data['user_details'][0]->fullname;

		                $this->setemail($attachFile1,$attachFile2,$data['vendorDetails'][0]->vendor_contact_person_1_email,$subject,$message);
						
					}
				}
				else {

						echo json_encode(array('status' => 'error','message' => 'Few Records Are Missing..!! Please Complete The Report And Upload Again.' ));								
				}
			}
			else{
				echo json_encode(array('status' => 'error','message' => 'The Format Of Excel Sheet Is Not Correct..!! Please Correct It And Upload Again.' ));					
			}
		}

	}

	public function setemail($file1,$file2,$vendorEmailId,$subject,$message)

        {
        	
        	$email=$vendorEmailId;
			$subject=$subject;
			$message=$message;
			$this->sendEmail($email,$subject,$message,$file1,$file2);
		}

		

	public function sendEmail($email,$subject,$message,$file1,$file2)
	    
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
	      //$this->email->cc('jignasha.mistry@ei-india.com,brahma.sharma@ei-india.com');
	      $this->email->subject($subject);
	      $this->email->message($message);
	      $this->email->attach($file1);
	      $this->email->attach($file2);
	      
	      if($this->email->send())
	         {
	         echo json_encode(array('status' => 'success','message' => 'Analysis Lot Sent To Vendor Successfully'));

	          //unlink($file1);
	          //unlink($file2);
	          
	         }
	      else
	        {
	         //show_error($this->email->print_debugger());
	         echo json_encode(array('status' => 'error','message'=> 'Error In Sending Analysis Lot To Vendor Try Again..!!'));
	        }

	    }

	    public function list_analysislot(){

			$inputRequest = json_decode(file_get_contents("php://input"),true);
			
			$data['analysis_lot_list'] = $this->vendors->analysisLotList();	

			if(count($data['analysis_lot_list']) > 0){
				echo json_encode(array('status' => 'success','analysis_lot_list' => $data['analysis_lot_list']));
			}
			else {
				echo json_encode(array('status' => 'error','analysis_lot_list' => $data['analysis_lot_list']));
			}
		

		}

		public function approve_analysislot(){

			$inputRequest = json_decode(file_get_contents("php://input"),true);

			$update = $this->vendors->approveAnalysisLot($inputRequest['analysislotid'],$inputRequest['status']);

			$data['analysis_lot_list'] = $this->vendors->analysisLotList();	

			if(count($data['analysis_lot_list']) > 0){
				echo json_encode(array('status' => 'success','analysis_lot_list' => $data['analysis_lot_list']));
			}
			else {
				echo json_encode(array('status' => 'error','analysis_lot_list' => $data['analysis_lot_list']));
			}

		}

		/*
	
		Function Name: analysis_mis_list
		Description: Action function to List all the analysis mis reports
		Params : @username - username of logged in user
				 @region - region of the logged in user
				 @category - category of the logged in user	
		Input Format: JSON
		Output: All the qb mis reports from analysis_lot_list table
		Output Format: JSON

	*/
	
	public function analysis_mis_list()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//get the latest round running in current session
		$data['round_latest'] = $this->packingslips->getLatestRound();

		//loop through the rounds selected
		foreach ($data['round_latest'] as $key => $value) {

			$date1 = '01-10-'.date('Y'); //date set to start winter round

			$date2 = date('d-m-Y'); //get current date

			if(new DateTime($date1) > new DateTime($date2)){
				//condition to select summer round
				if($value->description == 'Summer '.date('Y')){
					$round = $value->test_edition;
				}
			}
			else{
				//condition to select winter round
				if($value->description == 'Winter '.date('Y')){
					$round = $value->test_edition;
				}
			}
			
		}

		//call model function to return all zones as per the user region
		$data['zones'] = $this->qb_mis_list_model->getZones($inputRequest['region']);

		//call model function to get list of all the rounds from test_edition_details table
		$data['rounds'] = $this->packingslips->getRounds();
		
		//call model function to get list of all the LOtno. generated in the current round
		$data['lotnos'] = $this->analysis_mis_list_model->getAnalysisLotNos($round);
		
		//call model function to get list of all the schools whose pack label date is set with dispatch and delivery status
		$data['analysis_mis_reports'] = $this->analysis_mis_list_model->getAnalysisMisReports($round,$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);
		
		//output data in json array
		echo json_encode(array('status' => 'success','zones' => $data['zones'],'rounds' => $data['rounds'],'lotnos' => $data['lotnos'],'analysis_mis_reports' => $data['analysis_mis_reports'],'round_selected' => $round));
		die;
	}

	/*
	
		Function Name: getAnalysisMisReportsFilter
		Description: Action function to filter all the QB reports list based on search parameters
		Params : @username - username of logged in user
				 @region - region of the logged in user
				 @category - category of the logged in user
				 @round - selected round
				 @lotno - selected lotno.
				 @zone - selected zone
		Input Format: JSON
		Output: All the QB reports list based on search parameters
		Output Format: JSON

	*/    

    public function getAnalysisMisReportsFilter()
    {
        $inputRequest = json_decode(file_get_contents("php://input"),true);

        //call to model function to get list of all the schools given for packing with dispatch and delivery status details
        $data['filteredreports'] = $this->analysis_mis_list_model->getFilteredAnalysisReports($inputRequest['round'],$inputRequest['zone'],$inputRequest['lotno'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);
        
        //check if data array is not blank
        if(count($data['filteredreports']) > 0) {
            echo json_encode(array('status' => 'success','filteredanalysisreports'=> $data['filteredreports']));
        }
        else{
            echo json_encode(array('status' => 'error','filteredanalysisreports'=> $data['filteredreports']));
        }
        die;
    }

}
