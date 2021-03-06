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

		$ci = get_instance();

		$roundDetails = getLatestRoundDetails();

		$round = $roundDetails['round'];

		$description = $roundDetails['description'];

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

		$analysisfileExist = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$description[0]['description'].'/Analysis/'.$inputRequest['school'].'.tif');
								
		$analysisfileExtension = '';
		
		if($analysisfileExist != 1 || $analysisfileExist == ''){
			
			$analysisfileExist2 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$description[0]['description'].'/Analysis/'.$inputRequest['school'].'.pdf');
			
			if($analysisfileExist2 != 1 || $analysisfileExist2 == ''){
			
				$analysisfileExist3 = file_exists($_SERVER['DOCUMENT_ROOT'].'/PackingSlips/'.$description[0]['description'].'/Analysis/'.$inputRequest['school'].'.jpg');

				if($analysisfileExist3 != 1 || $analysisfileExist3 == ''){
					
				}
				else{
					$analysisfileExtension = '.jpg';
				}		

			}
			else{
				$analysisfileExtension = '.pdf';
			}		

		}
		else{
			$analysisfileExtension = '.tif';
		}

		$data['omr_status_data'] = $this->schooltrackingmodel->getOMRStatusData($inputRequest);

		$data['omr_dispatch_data'] = $this->schooltrackingmodel->getOMRDispatchData($inputRequest);

		$data['analysis_courier_details'] = $this->schooltrackingmodel->getAnalysisCourierDetails($inputRequest);

		echo json_encode(array('status' => 'success','schoolName' => $data['schoolName'],'paymentDetails' => $data['paymentDetails'],'processTracking' => $data['processTracking'],'courierDetails' => $data['courierDetails'],'finalbreakupflag' => $data['finalbreakupflag'][0]['ssfrecievedcount'],'paymentflag' => $data['paymentflag'][0]['paymentcount'],'fileExtension' => $fileExtension,'omr_status_data' => $data['omr_status_data'],'omr_dispatch_data' => $data['omr_dispatch_data'],'analysis_courier_details' => $data['analysis_courier_details'],'analysisfileExtension' => $analysisfileExtension));
	}

}
