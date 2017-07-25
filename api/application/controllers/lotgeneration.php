<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lotgeneration extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('vendors');
		$this->load->model('dashboards');
		$this->load->model('packingslips');
		$this->load->model('schooltrackingmodel');

	}

	/*
	
		Function Name: getRoundAndVendorList
		Description: Fetch rounds and vendors list
		Output Format: JSON

	*/

	public function getRoundAndVendorList(){

		$data['rounds'] = $this->vendors->getRounds();

		$data['vendors'] = $this->packingslips->getVendors();

		echo json_encode(array('status' => 'success','rounds' => $data['rounds'],'vendors' => $data['vendors']));

	}

	/*
	
		Function Name: upload_lot_generation_files
		Description: Upload lot genrated QC excel and html file and send to vendor
	
	*/

	public function upload_lot_generation_files(){

		$errors= array();

		if($_FILES['LOTGENERATIONEXCELFile']['name'] != ""){
		      $file_name = $_FILES['LOTGENERATIONEXCELFile']['name'];
		      $file_size =$_FILES['LOTGENERATIONEXCELFile']['size'];
		      $file_tmp =$_FILES['LOTGENERATIONEXCELFile']['tmp_name'];
		      $file_type=$_FILES['LOTGENERATIONEXCELFile']['type'];
		      $file_ext=strtolower(end(explode('.',$_FILES['LOTGENERATIONEXCELFile']['name'])));
		      
		      $extensions= array("xlsx,xls");
		      
		      if(in_array($file_ext,$extensions)){

		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size > 2097152){
		         $errors[]='File size must be excately 2 MB';
		      }
		      
		      if(empty($errors)==true){
		         move_uploaded_file($file_tmp,"./MIS Reports/Analysis Lot Files/".$file_name);
		         $success = '1';
		          //echo "Success";
		      }else{
		          $success = '0';
		         print_r($errors);
		      }
		}

		if($_FILES['LOTGENERATIONCSVFile']['name'] != ""){
		      $file_name = $_FILES['LOTGENERATIONCSVFile']['name'];
		      $file_size =$_FILES['LOTGENERATIONCSVFile']['size'];
		      $file_tmp =$_FILES['LOTGENERATIONCSVFile']['tmp_name'];
		      $file_type=$_FILES['LOTGENERATIONCSVFile']['type'];
		      $file_ext=strtolower(end(explode('.',$_FILES['LOTGENERATIONCSVFile']['name'])));
		      
		      $extensions= array("html,csv");
		      
		      if(in_array($file_ext,$extensions)){

		         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
		      }
		      
		      if($file_size > 2097152){
		         $errors[]='File size must be excately 2 MB';
		      }
		      
		      if(empty($errors)==true){
		         move_uploaded_file($file_tmp,"./MIS Reports/Analysis Lot Files/".$file_name);
		         $success = '1';
		          //echo "Success";
		      }else{
		          $success = '0';
		         print_r($errors);
		      }
		}

	}

}
