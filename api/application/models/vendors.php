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

    
}