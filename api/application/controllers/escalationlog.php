<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escalationlog extends CI_Controller {

	/*
		Controller to control the MIS Upload status page data and functionality
	*/


	function __construct()
	{
		//load required models
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('packingslips');
		$this->load->model('qb_mis_list_model');
		$this->load->model('escalationlogmodel');

	}

	/*
	
		Function Name: pretest_escalation_log_list
		Description: Action function to List all the pre test escalation log
		Params : NULL
		Output: All the pre test escalation log from escalation_mail_log table
		Output Format: JSON

	*/
	
	public function pretest_escalation_log_list()
	{
		
		//get the latest round running in current session
		$data['round_latest'] = $this->packingslips->getLatestRound();

		//loop through the rounds selected
		foreach ($data['round_latest'] as $key => $value) {

			$date1 = '01-08-'.date('Y'); //date set to start winter round

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

		
		//call model function to get list of all the schools whose pack label date is set with dispatch and delivery status
		$data['pre_test_escalation_log'] = $this->escalationlogmodel->getPreTestEscalationLogList($round);
		
		//output data in json array
		echo json_encode(array('status' => 'success','pre_test_escalation_log' => $data['pre_test_escalation_log'],'round_selected' => $round));
		die;
	}

	
}
