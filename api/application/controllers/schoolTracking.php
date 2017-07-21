<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schooltracking extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('dashboards');
		$this->load->model('packingslips');
		$this->load->model('schooltrackingmodel');

	}

	function loadSchoolTrackingFilters(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['rounds'] = $this->vendors->getRounds();

		$data['round_latest'] = $this->packingslips->getLatestRound();

		foreach ($data['round_latest'] as $key => $value) {

			$date1 = '01-08-'.date('Y');

			$date2 = date('d-m-Y');

			if(new DateTime($date1) > new DateTime($date2)){
				if($value->description == 'Summer '.date('Y')){
					$round = $value->test_edition;
					$description = $value->description;
				}
			}
			else{
				if($value->description == 'Winter '.date('Y')){
					$round = $value->test_edition;
					$description = $value->description;
				}
			}
			
		}

		$data['school_registered'] = $this->schooltrackingmodel->getRegisteredSchool($round,$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		echo json_encode(array('status' => 'success','rounds' => $data['rounds'],'round_selected' => $round,'school_registered' => $data['school_registered'],'round_description' => $description));

	}

	function loadSchoolTrackingSchoolDetails(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['schoolName'] = $this->schooltrackingmodel->getSchoolName($inputRequest['school']);

		$data['schoolName'] = $data['schoolName'][0]['schoolname'].' - '.$inputRequest['school'];

		$data['paymentDetails'] = $this->schooltrackingmodel->getSchoolPaymentDetails($inputRequest);

		$data['processTracking'] = $this->schooltrackingmodel->getSchoolProcessTrackingDetails($inputRequest);

		$data['courierDetails'] = $this->schooltrackingmodel->getSchoolDispacthCourierDetails($inputRequest);

		$data['finalbreakupflag'] = $this->schooltrackingmodel->getFinalBreakupStatus($inputRequest);

		$data['paymentflag'] = $this->schooltrackingmodel->getPaymentStatus($inputRequest);

		$description = $this->schooltrackingmodel->getRoundDescription($inputRequest['round']);

		$fileExist = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$description[0]['description'].'/QB/'.$inputRequest['school'].'.tif');
								
		$fileExtension = '';
		
		if($fileExist != 1 || $fileExist == ''){
			
			$fileExist2 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$description[0]['description'].'/QB/'.$inputRequest['school'].'.pdf');
			
			if($fileExist2 != 1 || $fileExist2 == ''){
			
				$fileExist3 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$description[0]['description'].'/QB/'.$inputRequest['school'].'.jpg');

				if($fileExist3 != 1 || $fileExist3 == ''){
					
				}
				else{
					$fileExtension = '.jpg';
				}		

			}
			else{
				$fileExtension = '.pdf';
			}		

		}
		else{
			$fileExtension = '.tif';
		}

		echo json_encode(array('status' => 'success','schoolName' => $data['schoolName'],'paymentDetails' => $data['paymentDetails'],'processTracking' => $data['processTracking'],'courierDetails' => $data['courierDetails'],'finalbreakupflag' => $data['finalbreakupflag'][0]['ssfrecievedcount'],'paymentflag' => $data['paymentflag'][0]['paymentcount'],'fileExtension' => $fileExtension));
	}

}
