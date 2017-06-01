<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mis_system extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('packingslips');
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
		$data['packing_date'] = $this->qb_mis_list_model->getPackingDate();
		echo json_encode(array('status' => 'success','zones' => $data['zones'],'rounds' => $data['rounds']));
		die;
	}

}
