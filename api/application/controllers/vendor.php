<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendor extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
	}
	
	/*
		Function Name: get_zones
		Description: Action function to List all the zones
		Date Modified: 19-5-2017
	*/

	public function get_zones()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$data['zones'] = $this->vendors->getZones();
		echo json_encode(array('status' => 'success','zones' => $data['zones']));
		die;
	}

	/*
		Function Name: add_vendor
		Description: Action function to add vendor
		Date Modified: 19-5-2017
	*/

	public function add_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		foreach ($inputRequest as $key => $value) {
			$data[$key] = strip_tags(preg_replace('/\s+/', ' ', trim($value)));
		}
		$vendorData = array('vendor_name' => $data['vendor_name'],'vendor_address' => $data['vendor_address'],'vendor_zone' => $data['vendor_zone'],'vendor_username' => $data['vendor_username'],'vendor_password' => $data['vendor_password'],'vendor_phone' => $data['vendor_phone'],'vendor_contact_person_1_name' => $data['vendor_contact_person_1_name'],'vendor_contact_person_1_email' => $data['vendor_contact_person_1_email'],'vendor_contact_person_1_contactno' => $data['vendor_contact_person_1_contact_no'],'vendor_coo_name' => $data['vendor_coo_name'],'vendor_coo_email' => $data['vendor_coo_email'],'vendor_coo_contactno' => $data['vendor_coo_contactno'],'vendor_ceo_name' => $data['vendor_ceo_name'],'vendor_ceo_email' => $data['vendor_ceo_email'],'vendor_ceo_contactno' => $data['vendor_ceo_contact_no'],'vendor_status' => '1');
		$insert = $this->vendors->insertVendor($vendorData);

		if($insert)
		{
			echo json_encode(array('status' => 'success','message' => 'Vendor Added Successfully'));
		}
		else
		{
			echo json_encode(array('status' => 'error','message' => 'There Is Some Error Please Try Again..!!'));	
		}
		die;
	}

	/*
		Function Name: list_vendors
		Description: Action function to list all the vendor
		Date Modified: 19-5-2017
	*/

	public function list_vendors()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);
		$data['vendors'] = $this->vendors->getVendors();
		echo json_encode(array('status' => 'success','vendors' => $data['vendors']));
		die;
	}

	/*
		Function Name: get_vendor
		Description: Action function to get vendor details
		Date Modified: 19-5-2017
	*/

	public function get_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$vendorID = $inputRequest['vendor_id'];

		$vendorData = $this->vendors->getVendorDetails($vendorID);

		echo json_encode(array('status' => 'success','data' => $vendorData));
		die;
	}

	/*
		Function Name: edit_vendor
		Description: Action function to edit vendor details
		Date Modified: 22-5-2017
	*/

	public function edit_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		foreach ($inputRequest as $key => $value) {
			$data[$key] = strip_tags(preg_replace('/\s+/', ' ', trim($value)));
		}

		$vendorData = array('vendor_id' => $data['vendor_id'],'vendor_name' => $data['vendor_name'],'vendor_address' => $data['vendor_address'],'vendor_zone' => $data['vendor_zone'],'vendor_username' => $data['vendor_username'],'vendor_password' => $data['vendor_password'],'vendor_phone' => $data['vendor_phone'],'vendor_contact_person_1_name' => $data['vendor_contact_person_1_name'],'vendor_contact_person_1_email' => $data['vendor_contact_person_1_email'],'vendor_contact_person_1_contactno' => $data['vendor_contact_person_1_contact_no'],'vendor_coo_name' => $data['vendor_coo_name'],'vendor_coo_email' => $data['vendor_coo_email'],'vendor_coo_contactno' => $data['vendor_coo_contactno'],'vendor_ceo_name' => $data['vendor_ceo_name'],'vendor_ceo_email' => $data['vendor_ceo_email'],'vendor_ceo_contactno' => $data['vendor_ceo_contact_no'],'vendor_status' => '1');
		
		$update = $this->vendors->editVendor($vendorData);

		if($update)
		{
			echo json_encode(array('status' => 'success','message' => 'Vendor Details Edited Successfully'));
		}
		else
		{
			echo json_encode(array('status' => 'error','message' => 'There Is Some Error Please Try Again..!!'));	
		}
		die;

	}

	/*
		Function Name: delete_vendor
		Description: Action function to delete vendor
		Date Modified: 22-5-2017
	*/

	public function delete_vendor()
	{
		$inputRequest = json_decode(file_get_contents("php://input"),true);

		$delete = $this->vendors->deleteVendor($inputRequest);
		//$delete = 1;
		
		$data['vendors'] = $this->vendors->getVendors();

		if($delete)
		{
			echo json_encode(array('status' => 'success','message' => 'Vendor Deleted Successfully','vendors' => $data['vendors']));
		}
		else
		{
			echo json_encode(array('status' => 'success','message' => 'There Is Some Error Please Try Again..!!'));
		}


	}

}
