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

		$data['zones'] = $this->vendors->getZones();
		$data['rounds'] = $this->packingslips->getRounds();
		$data['lotnos'] = $this->qb_mis_list_model->getPackingLotNos($inputRequest['round']);
		
		$data['qb_mis_reports'] = $this->qb_mis_list_model->getQbMisReports($inputRequest['round']);
		
		echo json_encode(array('status' => 'success','zones' => $data['zones'],'rounds' => $data['rounds'],'lotnos' => $data['lotnos'],'qb_mis_reports' => $data['qb_mis_reports']));
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
