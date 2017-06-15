<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('dashboards');
		$this->load->model('packingslips');

	}

	function loginuser_details(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['user_details'] = $this->dashboards->getUserDetails($inputRequest['username']);

		if(count($data['user_details']) > 0)

		{
			echo json_encode(array('status' => 'success','fullname' => $data['user_details']));
		}

	}

	function adminLogout(){
		session_start();
		session_unset();
		session_destroy();
		echo json_encode(array('status' => 'success','message' => 'Admin Logout Successfully'));

	}
	
	function pppretestDashboard(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

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

		$data['zones'] = $this->vendors->getZones();
		
		$data['rounds'] = $this->vendors->getRounds();

		$data['school_registered'] = $this->dashboards->getRegisteredSchool($round,$inputRequest['zone']);

		// echo '<pre>';
		// print_r($data['school_registered']);
		// die;

		$data['ssf_recieved'] = $this->dashboards->getPreTestSSFReceived($round,$inputRequest['zone']);

		$data['ssf_pending'] = $this->dashboards->getPreTestSSFPending($round,$inputRequest['zone']);

		$data['ssf_alert'] = $this->dashboards->getPreTestSSFAlert($round,$inputRequest['zone']);

		$data['payment_recieved'] = $this->dashboards->getPreTestPaymentReceived($round,$inputRequest['zone']);

		$data['payment_pending'] = $this->dashboards->getPreTestPaymentPending($round,$inputRequest['zone']);

		$data['payment_alert'] = $this->dashboards->getPreTestPaymentAlert($round,$inputRequest['zone']);

		$data['packlabeldate_set'] = $this->dashboards->getPreTestPackLabelDateSet($round,$inputRequest['zone']);

		$data['packlabeldate_notset'] = $this->dashboards->getPreTestPackLabelDateNotSet($round,$inputRequest['zone']);

		$data['packlabeldate_alert'] = $this->dashboards->getPreTestPackLabelDateAlert($round,$inputRequest['zone']);

		$data['dispatchdate_set'] = $this->dashboards->getPreTestDispacthDateSet($round,$inputRequest['zone']);

		$data['dispatchdate_notset'] = $this->dashboards->getPreTestDispacthDateNotSet($round,$inputRequest['zone']);

		$data['dispatchdate_alert'] = $this->dashboards->getPreTestDispacthDateAlert($round,$inputRequest['zone']);

		$data['deliverydate_set'] = $this->dashboards->getPreTestDeliveryDateSet($round,$inputRequest['zone']);

		$data['deliverydate_notset'] = $this->dashboards->getPreTestDeliveryDateNotSet($round,$inputRequest['zone']);

		$data['deliverydate_alert'] = $this->dashboards->getPreTestDeliveryDateAlert($round,$inputRequest['zone']);


		echo json_encode(array('status' => 'success','rounds' => $data['rounds'],'zones' => $data['zones'],'school_registered' => $data['school_registered'],'ssf_recieved' => $data['ssf_recieved'], 'ssf_pending' => $data['ssf_pending'],'ssf_alert' => $data['ssf_alert'],'payment_recieved' => $data['payment_recieved'],'payment_pending' => $data['payment_pending'],'payment_alert' => $data['payment_alert'],'packlabeldate_set' => $data['packlabeldate_set'],'packlabeldate_notset' => $data['packlabeldate_notset'],'packlabeldate_alert' => $data['packlabeldate_alert'],'dispatchdate_set' => $data['dispatchdate_set'],'dispatchdate_notset' => $data['dispatchdate_notset'],'dispatchdate_alert' => $data['dispatchdate_alert'],'deliverydate_set' => $data['deliverydate_set'],'deliverydate_notset' => $data['deliverydate_notset'],'deliverydate_alert' => $data['deliverydate_alert'],'round_selected' => $round,'round_description' => $description));

	}

	function pppretestDashboardFilter(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$roundName = $this->packingslips->getRoundName($inputRequest['round']);

		$description = $roundName[0]->description;

		// foreach ($data['round_latest'] as $key => $value) {

		// 	$date1 = '01-08-'.date('Y');

		// 	$date2 = date('d-m-Y');

		// 	if(new DateTime($date1) > new DateTime($date2)){
		// 		if($value->description == 'Summer '.date('Y')){
		// 			$round = $value->test_edition;
		// 			$description = $value->description;
		// 		}
		// 	}
		// 	else{
		// 		if($value->description == 'Winter '.date('Y')){
		// 			$round = $value->test_edition;
		// 			$description = $value->description;
		// 		}
		// 	}
			
		// }

		$data['zones'] = $this->vendors->getZones();
		
		$data['rounds'] = $this->vendors->getRounds();

		$data['school_registered'] = $this->dashboards->getRegisteredSchool($inputRequest['round'],$inputRequest['zone']);

		$data['ssf_recieved'] = $this->dashboards->getPreTestSSFReceived($inputRequest['round'],$inputRequest['zone']);

		$data['ssf_pending'] = $this->dashboards->getPreTestSSFPending($inputRequest['round'],$inputRequest['zone']);

		$data['ssf_alert'] = $this->dashboards->getPreTestSSFAlert($inputRequest['round'],$inputRequest['zone']);

		$data['payment_recieved'] = $this->dashboards->getPreTestPaymentReceived($inputRequest['round'],$inputRequest['zone']);

		$data['payment_pending'] = $this->dashboards->getPreTestPaymentPending($inputRequest['round'],$inputRequest['zone']);

		$data['payment_alert'] = $this->dashboards->getPreTestPaymentAlert($inputRequest['round'],$inputRequest['zone']);

		$data['packlabeldate_set'] = $this->dashboards->getPreTestPackLabelDateSet($inputRequest['round'],$inputRequest['zone']);

		$data['packlabeldate_notset'] = $this->dashboards->getPreTestPackLabelDateNotSet($inputRequest['round'],$inputRequest['zone']);

		$data['packlabeldate_alert'] = $this->dashboards->getPreTestPackLabelDateAlert($inputRequest['round'],$inputRequest['zone']);

		$data['dispatchdate_set'] = $this->dashboards->getPreTestDispacthDateSet($inputRequest['round'],$inputRequest['zone']);

		$data['dispatchdate_notset'] = $this->dashboards->getPreTestDispacthDateNotSet($inputRequest['round'],$inputRequest['zone']);

		$data['dispatchdate_alert'] = $this->dashboards->getPreTestDispacthDateAlert($inputRequest['round'],$inputRequest['zone']);

		$data['deliverydate_set'] = $this->dashboards->getPreTestDeliveryDateSet($inputRequest['round'],$inputRequest['zone']);

		$data['deliverydate_notset'] = $this->dashboards->getPreTestDeliveryDateNotSet($inputRequest['round'],$inputRequest['zone']);

		$data['deliverydate_alert'] = $this->dashboards->getPreTestDeliveryDateAlert($inputRequest['round'],$inputRequest['zone']);


		echo json_encode(array('status' => 'success','rounds' => $data['rounds'],'zones' => $data['zones'],'school_registered' => $data['school_registered'],'ssf_recieved' => $data['ssf_recieved'], 'ssf_pending' => $data['ssf_pending'],'ssf_alert' => $data['ssf_alert'],'payment_recieved' => $data['payment_recieved'],'payment_pending' => $data['payment_pending'],'payment_alert' => $data['payment_alert'],'packlabeldate_set' => $data['packlabeldate_set'],'packlabeldate_notset' => $data['packlabeldate_notset'],'packlabeldate_alert' => $data['packlabeldate_alert'],'dispatchdate_set' => $data['dispatchdate_set'],'dispatchdate_notset' => $data['dispatchdate_notset'],'dispatchdate_alert' => $data['dispatchdate_alert'],'deliverydate_set' => $data['deliverydate_set'],'deliverydate_notset' => $data['deliverydate_notset'],'deliverydate_alert' => $data['deliverydate_alert'],'round_description' => $description));

	}

	function pppretestDashboardSchoolRegistered(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['school_registered'] = $this->dashboards->getRegisteredSchoolList($inputRequest['round'],$inputRequest['zone']);		

		echo json_encode(array('status' => 'success','school_registered' => $data['school_registered']));

	}

	function pppretestDashboardSchoolSSFReceived(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['ssf_recieved'] = $this->dashboards->getPreTestSSFReceivedList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','ssf_recieved' => $data['ssf_recieved']));

	}

	function pppretestDashboardSchoolSSFPending(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['ssf_pending'] = $this->dashboards->getPreTestSSFPendingList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','ssf_pending' => $data['ssf_pending']));

	}

	function pppretestDashboardSchoolSSFAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['ssf_alert'] = $this->dashboards->getPreTestSSFAlertList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','ssf_alert' => $data['ssf_alert']));

	}

	function pppretestDashboardSchoolPaymentReceived(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['payment_recieved'] = $this->dashboards->getPreTestPaymentReceivedList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','payment_recieved' => $data['payment_recieved']));

	}

	function pppretestDashboardSchoolPaymentPending(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['payment_pending'] = $this->dashboards->getPreTestPaymentPendingList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','payment_pending' => $data['payment_pending']));

	}

	function pppretestDashboardSchoolPaymentAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['payment_alert'] = $this->dashboards->getPreTestPaymentAlertList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','payment_alert' => $data['payment_alert']));

	}

	function pppretestDashboardSchoolPackLabelDateSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['packlabeldate_set'] = $this->dashboards->getPreTestPackLabelDateSetList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','packlabeldate_set' => $data['packlabeldate_set']));

	}

	function pppretestDashboardSchoolPackLabelDateNotSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['packlabeldate_notset'] = $this->dashboards->getPreTestPackLabelDateNotSetList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','packlabeldate_notset' => $data['packlabeldate_notset']));

	}

	function pppretestDashboardSchoolPackLabelDateAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['packlabeldate_alert'] = $this->dashboards->getPreTestPackLabelDateAlertList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','packlabeldate_alert' => $data['packlabeldate_alert']));

	}

	function pppretestDashboardSchoolDispatchDateSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['dispatchdate_set_list'] = $this->dashboards->getPreTestDispatchDateSetList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','dispatchdate_set_list' => $data['dispatchdate_set_list']));

	}

	function pppretestDashboardSchoolDispatchDateNotSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['dispatchdate_notset_list'] = $this->dashboards->getPreTestDispatchDateNotSetList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','dispatchdate_notset_list' => $data['dispatchdate_notset_list']));

	}

	function pppretestDashboardSchoolDispatchDateAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['dispatchdate_alert_list'] = $this->dashboards->getPreTestDispatchDateAlertList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','dispatchdate_alert_list' => $data['dispatchdate_alert_list']));

	}

	function pppretestDashboardSchoolDeliveryDateSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['deliverydate_set_list'] = $this->dashboards->getPreTestDeliveryDateSetList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','deliverydate_set_list' => $data['deliverydate_set_list']));

	}

	function pppretestDashboardSchoolDeliveryDateNotSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['deliverydate_notset_list'] = $this->dashboards->getPreTestDeliveryDateNotSetList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','deliverydate_notset_list' => $data['deliverydate_notset_list']));

	}

	function pppretestDashboardSchoolDeliveryDateAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['deliverydate_alert_list'] = $this->dashboards->getPreTestDeliveryDateAlertList($inputRequest['round'],$inputRequest['zone']);

		echo json_encode(array('status' => 'success','deliverydate_alert_list' => $data['deliverydate_alert_list']));

	}

}
