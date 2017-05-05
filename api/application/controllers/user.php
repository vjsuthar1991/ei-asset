<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function add_user()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		foreach ($inputRequest as $key => $value) {
			$data[$key] = strip_tags(preg_replace('/\s+/', ' ', trim($value)));
		}
		$userData = array('user_name' => $data['user_firstname'],'user_lastname' => $data['user_lastname'],'user_email' => $data['user_email'],'user_password' => $data['user_password']);

		 $insert = $this->users->insert($userData);
                if($insert){
                    echo json_encode(array('status' => 'success','message' => 'User Added Successfully'));
                    
                }else{
                    echo json_encode(array('status' => 'error','message' => 'User not added try again'));
                }

		

	}

	public function list_users()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$data['user'] = $this->users->getRows();

		if(count($data['user']) > 0)
		{
			echo json_encode(array('status' => 'success','data'=> $data['user']));
		}
		else{
			echo json_encode(array('status' => 'error','data' => $data['user']));	
		}
	}

	public function get_user()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$userID = $inputRequest['user_id'];

		$userData = $this->users->get_row($userID);

		echo json_encode(array('status' => 'success','data' => $userData));
		
	}

	public function edit_user()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		foreach ($inputRequest as $key => $value) {
			$data[$key] = strip_tags(preg_replace('/\s+/', ' ', trim($value)));
		}
		$userData = array('user_id' => $data['user_id'],'user_name' => $data['user_firstname'],'user_lastname' => $data['user_lastname'],'user_email' => $data['user_email'],'user_password' => $data['user_password']);

		$update = $this->users->update($userData);

		if($update){
			echo json_encode(array('status' => 'success','message' => 'Details edited Successfully'));
		}
		else {
			echo json_encode(array('error' => 'success','message' => 'Try Again!!'));
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */