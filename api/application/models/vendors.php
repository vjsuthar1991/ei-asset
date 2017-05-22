<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendors extends CI_Model{
    function __construct() {
        
        $this->vendorTbl = 'vendors';
        $this->schoolsTbl = 'schools';
    }

    /*
     * get rows from the schools_status table
     */
    function getZones($params = array()){
        $this->db->distinct();
        $this->db->select('region');
        $this->db->from($this->schoolsTbl);
        $this->db->order_by("region","asc");
        $query = $this->db->get(); 
        return $query->result();
    }

    /*
     * inser vendor data in database
     */
    function insertVendor($data = array()){
        //insert user data to users table
        $insert = $this->db->insert($this->vendorTbl, $data);
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }

    }

    function getVendors($params = array()){
        
        $this->db->select('*');
        $this->db->from($this->vendorTbl);
        $this->db->order_by("vendor_name","asc");
        $query = $this->db->get(); 
        return $query->result();
    }

    function getVendorDetails($params = array()){
        
        $this->db->select('*');
        $this->db->from($this->vendorTbl);
        $this->db->where('vendor_id',$params);
        $query = $this->db->get();
        return $query->result();
    }

    function editVendor($data = array())
    {

        $this->db->where('vendor_id', $data['vendor_id']);
        $this->db->update($this->vendorTbl,array('vendor_name' => $data['vendor_name'],'vendor_address' => $data['vendor_address'],'vendor_zone' => $data['vendor_zone'],'vendor_username' => $data['vendor_username'],'vendor_password' => $data['vendor_password'],'vendor_phone' => $data['vendor_phone'],'vendor_contact_person_1_name' => $data['vendor_contact_person_1_name'],'vendor_contact_person_1_email' => $data['vendor_contact_person_1_email'],'vendor_contact_person_1_contactno' => $data['vendor_contact_person_1_contactno'],'vendor_coo_name' => $data['vendor_coo_name'],'vendor_coo_email' => $data['vendor_coo_email'],'vendor_coo_contactno' => $data['vendor_coo_contactno'],'vendor_ceo_name' => $data['vendor_ceo_name'],'vendor_ceo_email' => $data['vendor_ceo_email'],'vendor_ceo_contactno' => $data['vendor_ceo_contactno']));
        
        return $data['vendor_id'];            
    }

    
}