<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mis_system extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('packingslips');
		$this->load->model('qb_mis_list_model');
	}
	
	/*
		Function Name: qb_mis_list
		Description: Action function to List all the qb mis reports
		Date Modified: 31-5-2017
	*/

	public function qb_mis_list()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$data['round_latest'] = $this->packingslips->getLatestRound();

		foreach ($data['round_latest'] as $key => $value) {

			$date1 = '01-08-'.date('Y');

			$date2 = date('d-m-Y');

			if(new DateTime($date1) > new DateTime($date2)){
				if($value->description == 'Summer '.date('Y')){
					$round = $value->test_edition;
				}
			}
			else{
				if($value->description == 'Winter '.date('Y')){
					$round = $value->test_edition;
				}
			}
			
		}

		$data['zones'] = $this->qb_mis_list_model->getZones($inputRequest['region']);

		$data['rounds'] = $this->packingslips->getRounds();
		
		$data['lotnos'] = $this->qb_mis_list_model->getPackingLotNos($round);
		
		$data['qb_mis_reports'] = $this->qb_mis_list_model->getQbMisReports($round,$inputRequest['region'],$inputRequest['category'],$inputRequest['username']);
		
		echo json_encode(array('status' => 'success','zones' => $data['zones'],'rounds' => $data['rounds'],'lotnos' => $data['lotnos'],'qb_mis_reports' => $data['qb_mis_reports'],'round_selected' => $round));
		die;
	}

	/*
        Function Name: getQbMisReportsFilter
        Description: Action function to filter all the QB reports list based on search parameters
        Date Modified: 03-6-2017
    */

    public function getQbMisReportsFilter()
    {
        $inputRequest = json_decode(file_get_contents("php://input"),true);

        $data['filteredreports'] = $this->qb_mis_list_model->getFilteredQbReports($inputRequest['round'],$inputRequest['zone'],$inputRequest['lotno']);
        
        if(count($data['filteredreports']) > 0) {
            echo json_encode(array('status' => 'success','filteredqbreports'=> $data['filteredreports']));
        }
        else{
            echo json_encode(array('status' => 'error','message'=> 'No Records Found'));
        }
        die;
    }

}
