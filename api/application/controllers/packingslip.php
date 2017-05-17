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

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */