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
		$data['schools'] = $this->packingslips->getSchools();
		$data['rounds'] = $this->packingslips->getRounds();
		$data['country'] = $this->packingslips->getCountry();

		if(count($data['schools']) > 0)
		{
			echo json_encode(array('status' => 'success','data'=> $data['schools'],'rounds'=> $data['rounds'],'country' => $data['country']));
		}
		else{
			echo json_encode(array('status' => 'error','message' => 'No Records Found'));	
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

		$data['filteredschools'] = $this->packingslips->getFilteredSchools($inputRequest['round'],$inputRequest['paidPercentage'],$inputRequest['country'],$inputRequest['vendor']);
		
		if(count($data['filteredschools']) > 0) {
			echo json_encode(array('status' => 'success','data'=> $data['filteredschools']));
		}
		else{
			echo json_encode(array('status' => 'error','message'=> 'No Records Found'));
		}
		die;
	}

	public function generatepackingslip()
	{
		/*
		Function Name: generatepackingslip
		Description: Action function to generate packing slip as CSV and send to vendor and logistic
		Date Modified: 18-5-2017
	*/
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['packingslipschoollist'] = $this->packingslips->getPackingSlipSchoolList($inputRequest);

		$data['schoolwisebreakup'] = $this->packingslips->getSchoolWiseBreakupList($inputRequest);

		function exports_data($records1,$records2,$filename1,$filename2){

			$records1 = json_decode(json_encode($records1),true);
			$records2 = json_decode(json_encode($records2),true);

			
			header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=".$filename1."");
            header("Pragma: no-cache");
            header("Expires: 0");

            $handle1 = fopen($filename1, 'w');

            fputcsv($handle1, array('Sr.No','School Code', 'School Name', 'City', 'Address', 'STD Code', 'Phone Nos','Principal Name','State','Pincode','Co-ordinator1 Name','Co-ordinator1 Contact No.','Co-ordinator1 Email'));

            $i = 1;

            foreach ($records1 as $data) {
            	array_unshift($data, $i);
            	//$data['serial'] = $i;
                fputcsv($handle1, $data);
                $i++;
            }
            
            fclose($handle1);
            chmod($filename1, 0777);

            header("Content-type: application/csv");
            header("Content-Disposition: attachment; filename=".$filename2."");
            header("Pragma: no-cache");
            header("Expires: 0");

            $handle2 = fopen($filename2, 'w');

            fputcsv($handle2, array('Sr.No','School Code', 'School Name', 'City', 'E3', 'M3', 'S3','H3','SS3','E4', 'M4', 'S4','H4','SS4','E5', 'M5', 'S5', 'H5', 'SS5', 'E6', 'M6', 'S6','H6','SS6', 'E7', 'M7', 'S7','H7','SS7', 'E8', 'M8', 'S8','H8','SS8', 'E9', 'M9', 'S9','H9','SS9', 'E10', 'M10', 'S10','H10','SS10'));

            $i = 1;

            foreach ($records2 as $data) {
            	array_unshift($data, $i);
            	//$data['serial'] = $i;
                fputcsv($handle2, $data);
                $i++;
            }
            
                fclose($handle2);
                chmod($filename2, 0777);
                $ci = get_instance();
                $ci->setemail($filename1,$filename2);

            exit;
        }
		
		date_default_timezone_set('Asia/Calcutta');
        
        $filename1 = "1-".date('d-m-Y-H:i:s').'_schools.csv';
        $filename2 = "2-".date('d-m-Y-H:i:s').'_orders.csv';
        exports_data($data['packingslipschoollist'],$data['schoolwisebreakup'],$filename1,$filename2);

	}

	public function setemail($file1,$file2)

        {
			$email="vijay.suthar@ei-india.com";
			$subject="Test";
			$message="This is testing";
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
	          unlink($file1);
	          unlink($file2);
	         }
	      else
	        {
	         //show_error($this->email->print_debugger());
	         echo json_encode(array('status' => 'error','message'=> 'Error In Sending Packing Slip To Vendor Try Again..!!'));
	        }

	    }


	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */