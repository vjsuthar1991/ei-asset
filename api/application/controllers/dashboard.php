<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Controller to control the pre test dashboard page functionality 	
*/

class Dashboard extends CI_Controller {

	//load models required
	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('dashboards');
		$this->load->model('packingslips');

	}

	/*
	
		Function Name: loginuser_details
		Description: Fetch logged in user details from server
		Params : @username - username of logged in user
		Input Format: JSON
		Output: All the user details stored in marketing table
		Output Format: JSON

	*/

	function loginuser_details(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call the model function to get the details from marketing table
		$data['user_details'] = $this->dashboards->getUserDetails($inputRequest['username']);

		if(count($data['user_details']) > 0) //check if the user details exist in marketing table
		{
			//output user details in JSON format
			echo json_encode(array('status' => 'success','fullname' => $data['user_details']));
		}

	}

	/*
	
		Function Name: adminLogout
		Description: Logout user from the system and destroy all user session
		Params : NULL
		Input Format: NULL
		Output: NULL
		Output Format: NULL

	*/

	function adminLogout(){
		
		session_start();
		session_unset();
		session_destroy();
		
		echo json_encode(array('status' => 'success','message' => 'Admin Logout Successfully'));

	}

	/*
	
		Function Name: pppretestDashboard
		Description: Fetch all the pre test information like school registered,school final breakup,payment,packlabel,dispatch and delivery information
		Params : @zone - zone selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the rounds,zones,school registered,school final breakup,payment,packlabel,dispatch and delivery information
		Output Format: JSON

	*/
	
	function pppretestDashboard(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//get the latest round running in current session
		$data['round_latest'] = $this->packingslips->getLatestRound();

		//loop through the rounds selected
		foreach ($data['round_latest'] as $key => $value) {

			$date1 = '01-10-'.date('Y'); //date set to start winter round

			$date2 = date('d-m-Y'); //get current date

			//compare current date with winter round date
			if(new DateTime($date1) > new DateTime($date2)){
				//condition to select summer round
				if($value->description == 'Summer '.date('Y')){
					$round = $value->test_edition;
					$description = $value->description;
				}
			}
			else{
				//condition to select winter round
				if($value->description == 'Winter '.date('Y')){
					$round = $value->test_edition;
					$description = $value->description;
				}
			}
			
		}
		//call model function to return all zones as per the user region
		$data['zones'] = $this->dashboards->getZones($inputRequest['region']);

		//call model function to get list of all the rounds from test_edition_details table 
		$data['rounds'] = $this->vendors->getRounds();

		//call model function to get count of all the registered school for the current round running
		$data['school_registered'] = $this->dashboards->getRegisteredSchool($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose ssf is recieved
		$data['ssf_recieved'] = $this->dashboards->getPreTestSSFReceived($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose ssf is pending
		$data['ssf_pending'] = $this->dashboards->getPreTestSSFPending($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose ssf is not recieved but payment is recieved more than 90%
		$data['ssf_alert'] = $this->dashboards->getPreTestSSFAlert($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose more than 90% payment is received
		$data['payment_recieved'] = $this->dashboards->getPreTestPaymentReceived($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose more than 90% payment is pending
		$data['payment_pending'] = $this->dashboards->getPreTestPaymentPending($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose breakup is received but payment is pending 
		$data['payment_alert'] = $this->dashboards->getPreTestPaymentAlert($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of schools whose pack label date is set and given for packing
		$data['packlabeldate_set'] = $this->dashboards->getPreTestPackLabelDateSet($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of schools whose pack label date is not set
		$data['packlabeldate_notset'] = $this->dashboards->getPreTestPackLabelDateNotSet($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of schools whose pack label date is not set but payment and breakup is received
		$data['packlabeldate_alert'] = $this->dashboards->getPreTestPackLabelDateAlert($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose dispatch date is set
		$data['dispatchdate_set'] = $this->dashboards->getPreTestDispacthDateSet($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose dispatch date is not set
		$data['dispatchdate_notset'] = $this->dashboards->getPreTestDispacthDateNotSet($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose dispatch date is set for more than 7 days
		$data['dispatchdate_alert'] = $this->dashboards->getPreTestDispacthDateAlert($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose delivery date is set
		$data['deliverydate_set'] = $this->dashboards->getPreTestDeliveryDateSet($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose delivery date is not set
		$data['deliverydate_notset'] = $this->dashboards->getPreTestDeliveryDateNotSet($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose delivery date is not set for more than 10 days
		$data['deliverydate_alert'] = $this->dashboards->getPreTestDeliveryDateAlert($round,$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output data in json array
		echo json_encode(array('status' => 'success','rounds' => $data['rounds'],'zones' => $data['zones'],'school_registered' => $data['school_registered'],'ssf_recieved' => $data['ssf_recieved'], 'ssf_pending' => $data['ssf_pending'],'ssf_alert' => $data['ssf_alert'],'payment_recieved' => $data['payment_recieved'],'payment_pending' => $data['payment_pending'],'payment_alert' => $data['payment_alert'],'packlabeldate_set' => $data['packlabeldate_set'],'packlabeldate_notset' => $data['packlabeldate_notset'],'packlabeldate_alert' => $data['packlabeldate_alert'],'dispatchdate_set' => $data['dispatchdate_set'],'dispatchdate_notset' => $data['dispatchdate_notset'],'dispatchdate_alert' => $data['dispatchdate_alert'],'deliverydate_set' => $data['deliverydate_set'],'deliverydate_notset' => $data['deliverydate_notset'],'deliverydate_alert' => $data['deliverydate_alert'],'round_selected' => $round,'round_description' => $description));

	}

	/*
	
		Function Name: pppretestDashboardFilter
		Description: Filter and Fetch all the pre test information like school registered,school final breakup,payment,packlabel,dispatch and delivery information
		Params : @zone - zone selected
				 @round: round selected 	
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the rounds,zones,school registered,school final breakup,payment,packlabel,dispatch and delivery information
		Output Format: JSON

	*/

	function pppretestDashboardFilter(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call to model function to get selected round name
		$roundName = $this->packingslips->getRoundName($inputRequest['round']);

		$description = $roundName[0]->description;//round description

		//call model function to return all zones as per the user region
		$data['zones'] = $this->vendors->getZones($inputRequest['region']);
		
		//call model function to get list of all the rounds from test_edition_details table 
		$data['rounds'] = $this->vendors->getRounds();

		//call model function to get count of all the registered school for the current round running
		$data['school_registered'] = $this->dashboards->getRegisteredSchool($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose ssf is recieved
		$data['ssf_recieved'] = $this->dashboards->getPreTestSSFReceived($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose ssf is pending
		$data['ssf_pending'] = $this->dashboards->getPreTestSSFPending($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose ssf is not recieved but payment is recieved more than 90%
		$data['ssf_alert'] = $this->dashboards->getPreTestSSFAlert($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose more than 90% payment is received
		$data['payment_recieved'] = $this->dashboards->getPreTestPaymentReceived($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose more than 90% payment is pending
		$data['payment_pending'] = $this->dashboards->getPreTestPaymentPending($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of all the schools whose breakup is received but payment is pending 
		$data['payment_alert'] = $this->dashboards->getPreTestPaymentAlert($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of schools whose pack label date is set and given for packing
		$data['packlabeldate_set'] = $this->dashboards->getPreTestPackLabelDateSet($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of schools whose pack label date is not set
		$data['packlabeldate_notset'] = $this->dashboards->getPreTestPackLabelDateNotSet($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call model function to get count of schools whose pack label date is not set but payment and breakup is received
		$data['packlabeldate_alert'] = $this->dashboards->getPreTestPackLabelDateAlert($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose dispatch date is set
		$data['dispatchdate_set'] = $this->dashboards->getPreTestDispacthDateSet($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose dispatch date is not set
		$data['dispatchdate_notset'] = $this->dashboards->getPreTestDispacthDateNotSet($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose dispatch date is set for more than 7 days
		$data['dispatchdate_alert'] = $this->dashboards->getPreTestDispacthDateAlert($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose delivery date is set
		$data['deliverydate_set'] = $this->dashboards->getPreTestDeliveryDateSet($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose delivery date is not set
		$data['deliverydate_notset'] = $this->dashboards->getPreTestDeliveryDateNotSet($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//call to model function to get count of schools whose delivery date is not set for more than 10 days
		$data['deliverydate_alert'] = $this->dashboards->getPreTestDeliveryDateAlert($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output data in json array
		echo json_encode(array('status' => 'success','rounds' => $data['rounds'],'zones' => $data['zones'],'school_registered' => $data['school_registered'],'ssf_recieved' => $data['ssf_recieved'], 'ssf_pending' => $data['ssf_pending'],'ssf_alert' => $data['ssf_alert'],'payment_recieved' => $data['payment_recieved'],'payment_pending' => $data['payment_pending'],'payment_alert' => $data['payment_alert'],'packlabeldate_set' => $data['packlabeldate_set'],'packlabeldate_notset' => $data['packlabeldate_notset'],'packlabeldate_alert' => $data['packlabeldate_alert'],'dispatchdate_set' => $data['dispatchdate_set'],'dispatchdate_notset' => $data['dispatchdate_notset'],'dispatchdate_alert' => $data['dispatchdate_alert'],'deliverydate_set' => $data['deliverydate_set'],'deliverydate_notset' => $data['deliverydate_notset'],'deliverydate_alert' => $data['deliverydate_alert'],'round_description' => $description));

	}

	/*
	
		Function Name: pppretestDashboardSchoolRegistered
		Description: Fetch the list of schools registered for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools registered for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolRegistered(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call model function to get registered school list
		$data['school_registered'] = $this->dashboards->getRegisteredSchoolList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);		

		//output school list in JSON array
		echo json_encode(array('status' => 'success','school_registered' => $data['school_registered']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolSSFReceived
		Description: Fetch the list of schools whose SSF is received for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose SSF is received for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolSSFReceived(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call model function to get SSF received school list
		$data['ssf_recieved'] = $this->dashboards->getPreTestSSFReceivedList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','ssf_recieved' => $data['ssf_recieved']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolSSFPending
		Description: Fetch the list of schools whose SSF is Pending for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose SSF is Pending for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolSSFPending(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call model function to get SSF pending school list
		$data['ssf_pending'] = $this->dashboards->getPreTestSSFPendingList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','ssf_pending' => $data['ssf_pending']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolSSFAlert
		Description: Fetch the list of schools whose SSF is Pending but payment more than 90% is received for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose SSF is Pending but payment more than 90% is received for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolSSFAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call model function to get list of schools whose SSF is Pending but payment more than 90% is received for the current round or selected round
		$data['ssf_alert'] = $this->dashboards->getPreTestSSFAlertList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','ssf_alert' => $data['ssf_alert']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolPaymentReceived
		Description: Fetch the list of schools whose more than 90% payment is received for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose more than 90% payment is received for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolPaymentReceived(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call to model function to get list of schools whose more than 90% payment is received for the current round or selected round
		$data['payment_recieved'] = $this->dashboards->getPreTestPaymentReceivedList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','payment_recieved' => $data['payment_recieved']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolPaymentPending
		Description: Fetch the list of schools whose Payment is Pending for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose Payment is Pending for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolPaymentPending(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call to model function to get list of schools whose Payment is Pending for the current round or selected round
		$data['payment_pending'] = $this->dashboards->getPreTestPaymentPendingList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','payment_pending' => $data['payment_pending']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolPaymentAlert
		Description: Fetch the list of schools whose Payment is Pending but SSF is received for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose Payment is Pending but SSF is received for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolPaymentAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call to model function to get list of schools whose Payment is Pending but SSF is received 
		$data['payment_alert'] = $this->dashboards->getPreTestPaymentAlertList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','payment_alert' => $data['payment_alert']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolPackLabelDateSet
		Description: Fetch the list of schools whose pack label date is set for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose pack label date is set for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolPackLabelDateSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call to model function to get list of schools whose pack label date is set
		$data['packlabeldate_set'] = $this->dashboards->getPreTestPackLabelDateSetList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','packlabeldate_set' => $data['packlabeldate_set']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolPackLabelDateNotSet
		Description: Fetch the list of schools whose pack label date is not set for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose pack label date is not set for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolPackLabelDateNotSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call to model function to get list list of schools whose pack label date is not set
		$data['packlabeldate_notset'] = $this->dashboards->getPreTestPackLabelDateNotSetList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','packlabeldate_notset' => $data['packlabeldate_notset']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolPackLabelDateAlert
		Description: Fetch the list of schools whose Packlabel date is not set but payment more than 90% is received for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose Packlabel date is not set but payment more than 90% is received for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolPackLabelDateAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		//call to model function to get list of schools whose Packlabel date is not set but payment more than 90% is received
		$data['packlabeldate_alert'] = $this->dashboards->getPreTestPackLabelDateAlertList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','packlabeldate_alert' => $data['packlabeldate_alert']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolDispatchDateSet
		Description: Fetch the list of schools whose dispatch date is set for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose dispatch date is set for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolDispatchDateSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		
		$data['dispatchdate_set_list'] = $this->dashboards->getPreTestDispatchDateSetList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','dispatchdate_set_list' => $data['dispatchdate_set_list']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolDispatchDateNotSet
		Description: Fetch the list of schools whose dispatch date is not set for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose dispatch date is not set for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolDispatchDateNotSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['dispatchdate_notset_list'] = $this->dashboards->getPreTestDispatchDateNotSetList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','dispatchdate_notset_list' => $data['dispatchdate_notset_list']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolDispatchDateAlert
		Description: Fetch the list of schools whose dispatch date is not set for more than 7 days from the date of given to packing for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose dispatch date is not set for more than 7 days from the date of given to packing for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolDispatchDateAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['dispatchdate_alert_list'] = $this->dashboards->getPreTestDispatchDateAlertList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','dispatchdate_alert_list' => $data['dispatchdate_alert_list']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolDeliveryDateSet
		Description: Fetch the list of schools whose delivery date is set for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose delivery date is set for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolDeliveryDateSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['deliverydate_set_list'] = $this->dashboards->getPreTestDeliveryDateSetList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','deliverydate_set_list' => $data['deliverydate_set_list']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolDeliveryDateNotSet
		Description: Fetch the list of schools whose delivery date is not set for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose delivery date is not set for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolDeliveryDateNotSet(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['deliverydate_notset_list'] = $this->dashboards->getPreTestDeliveryDateNotSetList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','deliverydate_notset_list' => $data['deliverydate_notset_list']));

	}

	/*
	
		Function Name: pppretestDashboardSchoolDeliveryDateAlert
		Description: Fetch the list of schools whose delivery date is not set for more than 10 days from date of dispatch for the current round or selected round
		Params : @zone - zone selected
				 @round - round selected
				 @region - logged in user region
				 @category - logged in user category
				 @username - logged in user username	
		Input Format: JSON
		Output: List of all the schools whose delivery date is not set for more than 10 days from date of dispatch for the current round or selected round
		Output Format: JSON

	*/

	function pppretestDashboardSchoolDeliveryDateAlert(){

		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['deliverydate_alert_list'] = $this->dashboards->getPreTestDeliveryDateAlertList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);

		//output school list in JSON array
		echo json_encode(array('status' => 'success','deliverydate_alert_list' => $data['deliverydate_alert_list']));

	}

}
