<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packingslip extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('packingslips');
	}
	
	/*
		Function Name: list_Schools
		Description: Action function to List all the schools of current round
		Date Modified: 16-5-2017
	*/

	public function list_schools()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['schools'] = $this->packingslips->getSchools($inputRequest['round']);
		$data['rounds'] = $this->packingslips->getRounds();
		$data['country'] = $this->packingslips->getCountry();
		$data['zones'] = $this->packingslips->getZones();
		$data['vendors'] = $this->packingslips->getVendors();

		if(count($data['schools']) > 0)
		{
			echo json_encode(array('status' => 'success','data'=> $data['schools'],'rounds'=> $data['rounds'],'country' => $data['country'],'zones' => $data['zones'],'vendors' => $data['vendors']));
		}
		else{
			echo json_encode(array('status' => 'error','data'=> $data['schools'],'rounds'=> $data['rounds'],'country' => $data['country'],'zones' => $data['zones'],'vendors' => $data['vendors']));	
		}
		die;
	}

	/*
		Function Name: schoolfilter
		Description: Action function to filter all the schools list based on search parameters
		Date Modified: 16-5-2017
	*/

	public function schoolfilter()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['filteredschools'] = $this->packingslips->getFilteredSchools($inputRequest['round'],$inputRequest['country'],$inputRequest['zone']);
		
		if(count($data['filteredschools']) > 0) {
			echo json_encode(array('status' => 'success','data'=> $data['filteredschools']));
		}
		else{
			echo json_encode(array('status' => 'error','message'=> 'No Records Found'));
		}
		die;
	}

	/*
		Function Name: generatepackingslip
		Description: Action function to generate packing slip as CSV and send to vendor and logistic
		Date Modified: 23-5-2017
	*/
	public function generatepackingslip()
	{
		
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['packingslipschoollist'] = $this->packingslips->getPackingSlipSchoolList($inputRequest['data']);

		$data['schoolwisebreakup'] = $this->packingslips->getSchoolWiseBreakupList($inputRequest['data']);

		$data['vendorDetails'] = $this->packingslips->getVendorDetails($inputRequest['vendor']);

		function exports_data($records1,$records2,$vendorEmailId,$round,$vendorId){

			$ci = get_instance();

			$records1 = json_decode(json_encode($records1),true);
			$records2 = json_decode(json_encode($records2),true);

			$schoolsCount = count($records1);
            
            $schoolsData = json_encode($records1);
			$breakupData = json_encode($records2);

			$checkLot = $ci->packingslips->checkLotNo($round);

			if(count($checkLot) > 0) {
				if($checkLot[0]->packingslip_lotno == 0){
					$lotno = 1;
				}
				else {
					$lotno = $checkLot[0]->packingslip_lotno + 1;
				}
			}
			else {
				$lotno = 1;
			}

        	$insert_id = $ci->packingslips->insertPackingSlip($vendorId,$round,$schoolsData,$breakupData,$lotno);

        	$filename1 = $lotno."-".date('d-m-Y-H:i:s').'_schools.csv';
        	$filename2 = $lotno."-".date('d-m-Y-H:i:s').'_orders.csv';
			
			$ci->packingslips->updatePackingSlipFile($filename1,$filename2,$insert_id);

			header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=".$filename1."");
            header("Pragma: no-cache");
            header("Expires: 0");

            $handle1 = fopen("packingSlipSchoolsCSVFiles/".$filename1, 'w');

            fputcsv($handle1, array('Sr.No','School Code', 'School Name', 'City', 'Address', 'STD Code', 'Phone Nos','Principal Name','State','Pincode','Co-ordinator1 Name','Co-ordinator1 Contact No.','Co-ordinator1 Email'));

            $i = 1;



            foreach ($records1 as $data) {
            	
				$ci = get_instance();
				$ci->packingslips->updatePackLabelDate($data['schoolno'],$round,$lotno);
            	array_unshift($data, $i);
            	//$data['serial'] = $i;
                fputcsv($handle1, $data);
                $i++;
            }
            
            fclose($handle1);
            chmod("packingSlipSchoolsCSVFiles/".$filename1, 0777);

            header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=".$filename2."");
            header("Pragma: no-cache");
            header("Expires: 0");

            $handle2 = fopen("packingslipbreakupCSVFiles/".$filename2, 'w');

            fputcsv($handle2, array('Sr.No','School Code', 'School Name', 'City', 'E3', 'M3', 'S3','H3','SS3','E4', 'M4', 'S4','H4','SS4','E5', 'M5', 'S5', 'H5', 'SS5', 'E6', 'M6', 'S6','H6','SS6', 'E7', 'M7', 'S7','H7','SS7', 'E8', 'M8', 'S8','H8','SS8', 'E9', 'M9', 'S9','H9','SS9', 'E10', 'M10', 'S10','H10','SS10'));

            $i = 1;

            foreach ($records2 as $data) {
            	array_unshift($data, $i);
            	//$data['serial'] = $i;
                fputcsv($handle2, $data);
                $i++;
            }
            
                fclose($handle2);
                chmod("packingslipbreakupCSVFiles/".$filename2, 0777);
                
                $attachFile1 = "./packingSlipSchoolsCSVFiles/".$filename1;
                $attachFile2 = "./packingslipbreakupCSVFiles/".$filename2;

                $roundName = $ci->packingslips->getRoundName($round);
                $roundFullName = $roundName[0]->description;
                

                $subject = "$lotno LOT OF PACKING - $roundFullName";
                $vendorName = $vendorEmailId[0]->vendor_name;
                $message = 'Hello ';
                $message .= $vendorName;
                $message .= ' ji,';
                $message .= '<br><br>';
                $message .= "Sharing the $lotno Lot packing slips for $roundFullName. It contains $schoolsCount schools.";

                $ci->setemail($attachFile1,$attachFile2,$vendorEmailId,$subject,$message);

            exit;
        }
		
		date_default_timezone_set('Asia/Calcutta');

		exports_data($data['packingslipschoollist'],$data['schoolwisebreakup'],$data['vendorDetails'],$inputRequest['round'],$inputRequest['vendor']);

	}

	public function setemail($file1,$file2,$vendorEmailId,$subject,$message)

        {
        	$vendorEmailId = json_decode(json_encode($vendorEmailId),true);
        	$email=$vendorEmailId[0]['vendor_contact_person_1_email'];
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
	      $this->email->attach($file2);
	      
	      if($this->email->send())
	         {
	          echo json_encode(array('status' => 'success','message'=> 'Packing Slip Sent Successfully To Vendor'));
	          //unlink($file1);
	          //unlink($file2);
	          
	         }
	      else
	        {
	         //show_error($this->email->print_debugger());
	         echo json_encode(array('status' => 'error','message'=> 'Error In Sending Packing Slip To Vendor Try Again..!!'));
	        }

	    }

	public function list_packingslips()
	{
		$data['packingsliplist'] = $this->packingslips->getPackingSlipList();
		echo json_encode(array('status' => 'success','data' => $data['packingsliplist']));
		die;
	}    


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */