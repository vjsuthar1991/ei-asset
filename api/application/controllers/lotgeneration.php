<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lotgeneration extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('dashboards');
		$this->load->model('packingslips');
		$this->load->model('schooltrackingmodel');

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
					
					$checkLot = $this->vendors->checkLotNo($round);
					print_r($checkLot);

					if(count($checkLot) > 0) {
						if($checkLot[0]->lotno == 0){
							$lotno = 1;
						}
						else {
							$lotno = $checkLot[0]->lotno + 1;
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

						// $attachFile1 = "./MIS Reports/Analysis Lot Files/".$filename;
		    //             $attachFile2 = "./MIS Reports/Analysis Lot Files/".$filename2;

		    //             $roundName = $this->packingslips->getRoundName($round);
		    //             $roundFullName = $roundName[0]->description;

		    //             $data['vendorDetails'] = $this->packingslips->getVendorDetails($vendor);
		                
		    //             $subject = "$lotno LOT OF Analysis Printing - $roundFullName";
		    //             $vendorName = $vendorEmailId[0]->vendor_contact_person_1_name;
		    //             $message = 'Hello ';
		    //             $message .= $vendorName;
		    //             $message .= ' ji,';
		    //             $message .= '<br><br>';
		    //             $message .= "Sharing the $lotno Lot packing slips for $roundFullName. It contains $schoolsCount schools.";
		    //             $message .= '<br><br>Regards,<br>';
		    //             $message .= $senderName;

		    //             $ci->setemail($attachFile1,$attachFile2,$vendorEmailId,$subject,$message);
						
						echo json_encode(array('status' => 'success','message' => 'Analysis Lot Sent To Vendor Successfully'));

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

}
