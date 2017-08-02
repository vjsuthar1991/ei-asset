<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mis_system extends CI_Controller {

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
	}

	/*
	
		Function Name: qb_mis_list
		Description: Action function to List all the qb mis reports
		Params : @username - username of logged in user
				 @region - region of the logged in user
				 @category - category of the logged in user	
		Input Format: JSON
		Output: All the qb mis reports from school_process_tracking table
		Output Format: JSON

	*/
	
	public function qb_mis_list()
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
		$data['lotnos'] = $this->qb_mis_list_model->getPackingLotNos($round);
		
		//call model function to get list of all the schools whose pack label date is set with dispatch and delivery status
		$data['qb_mis_reports'] = $this->qb_mis_list_model->getQbMisReports($round,$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);
		
		//output data in json array
		echo json_encode(array('status' => 'success','zones' => $data['zones'],'rounds' => $data['rounds'],'lotnos' => $data['lotnos'],'qb_mis_reports' => $data['qb_mis_reports'],'round_selected' => $round));
		die;
	}

	/*
	
		Function Name: vendor_qb_mis_list
		Description: Action function to List all the qb mis reports of schools given to vendor
		Params : @vendor_id - vendor ID
		Input Format: JSON
		Output: All the qb mis reports from school_process_tracking table
		Output Format: JSON

	*/
	
	public function vendor_qb_mis_list()
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
		$data['zones'] = $this->qb_mis_list_model->getZones(NULL);

		//call model function to get list of all the rounds from test_edition_details table
		$data['rounds'] = $this->packingslips->getRounds();
		
		//call model function to get list of all the LOtno. generated in the current round
		$data['lotnos'] = $this->qb_mis_list_model->getPackingLotNos($round);
		
		
		$data['vendor_lotnos'] = $this->qb_mis_list_model->getVendorLotNos($round,$inputRequest['vendor_id']);
		
		foreach ($data['vendor_lotnos'] as $key => $value) {
		
			 $lotnoList[] = $value['packingslip_lotno'];	
		
		}

		$lotnolist = implode(',', $lotnoList);

		$data['qb_mis_reports'] = $this->qb_mis_list_model->getQbMisVendorReports($round,$lotnolist);

		//output data in json array
		echo json_encode(array('status' => 'success','zones' => $data['zones'],'rounds' => $data['rounds'],'lotnos' => $lotnoList,'qb_mis_reports' => $data['qb_mis_reports'],'round_selected' => $round));
		die;
	}


    /*
	
		Function Name: getQbMisReportsFilter
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

    public function getQbMisReportsFilter()
    {
        $inputRequest = json_decode(file_get_contents("php://input"),true);

        //call to model function to get list of all the schools given for packing with dispatch and delivery status details
        $data['filteredreports'] = $this->qb_mis_list_model->getFilteredQbReports($inputRequest['round'],$inputRequest['zone'],$inputRequest['lotno'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);
        
        //check if data array is not blank
        if(count($data['filteredreports']) > 0) {
            echo json_encode(array('status' => 'success','filteredqbreports'=> $data['filteredreports']));
        }
        else{
            echo json_encode(array('status' => 'error','message'=> 'No Records Found'));
        }
        die;
    }

    /*
	
		Function Name: getQbMisVendorReportsFilter
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

    public function getQbMisVendorReportsFilter()
    {
        $inputRequest = json_decode(file_get_contents("php://input"),true);

        $data['vendor_lotnos'] = $this->qb_mis_list_model->getVendorLotNos($inputRequest['round'],$inputRequest['vendor_id']);
		
		$lotnoList = array();

		foreach ($data['vendor_lotnos'] as $key => $value) {
		
			 $lotnoList[] = $value['packingslip_lotno'];	
		
		}

		if(count($lotnoList) > 0){

			$lotnolist = implode(',', $lotnoList);

		}
		else {
			$lotnolist = 0;
		}

		//call to model function to get list of all the schools given for packing with dispatch and delivery status details
        $data['filteredvendorreports'] = $this->qb_mis_list_model->getFilteredVendorQbReports($inputRequest['round'],$inputRequest['zone'],$inputRequest['lotno'],$inputRequest['vendor_id'],$lotnolist);
        
        //check if data array is not blank
        if(count($data['filteredvendorreports']) > 0) {
            echo json_encode(array('status' => 'success','filteredqbreports'=> $data['filteredvendorreports']));
        }
        else{
            echo json_encode(array('status' => 'error','message'=> 'No Records Found'));
        }
        die;
    }

    /*
	
		Function Name: omr_receipt_status_list
		Description: Action function to List OMR receipt status of all the schools
		Params : @username - username of logged in user
				 @region - region of the logged in user
				 @category - category of the logged in user	
		Input Format: JSON
		Output: All the OMR receipt status from omr_receipt_reports table
		Output Format: JSON

	*/
	
	public function omr_receipt_status_list()
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
		
		//call model function to get list of all the schools whose pack label date is set with dispatch and delivery status
		$data['omr_receipt_list'] = $this->vendors->getOmrReceiptStatusList($round,$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);
		
		//output data in json array
		echo json_encode(array('status' => 'success','zones' => $data['zones'],'rounds' => $data['rounds'],'omr_receipt_list' => $data['omr_receipt_list'],'round_selected' => $round));
		die;
	}

	/*
	
		Function Name: omr_receipt_status_listFilter
		Description: Action function to filter all the List OMR receipt status of all the schools based on search parameters
		Params : @username - username of logged in user
				 @region - region of the logged in user
				 @category - category of the logged in user
				 @round - selected round
				 @zone - selected zone
		Input Format: JSON
		Output: All the OMR receipt status list based on search parameters
		Output Format: JSON

	*/    

    public function omr_receipt_status_listFilter()
    {
        
        $inputRequest = json_decode(file_get_contents("php://input"),true);

        $data['filteredomrreceiptreports'] = $this->vendors->getFilteredOmrReceiptStatusList($inputRequest['round'],$inputRequest['zone'],$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);
        
        //check if data array is not blank
        if(count($data['filteredomrreceiptreports']) > 0) {

            echo json_encode(array('status' => 'success','filteredomrreceiptreports'=> $data['filteredomrreceiptreports']));

        }
        else{

            echo json_encode(array('status' => 'error','message'=> 'No Records Found'));
            
        }
        die;
    }

}
