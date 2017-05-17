<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packingslips extends CI_Model{
    function __construct() {
        $this->schoolstatusTbl = 'school_status';
        $this->schoolsTbl = 'schools';
        $this->testEditionTbl = 'test_edition_details';
    }
    /*
     * get rows from the schools_status table
     */
    function getSchools($params = array()){
        $this->db->select('t1.school_code, t1.no_of_students, t1.amount_payable, t1.paid, t1.advance_per_paid,t2.schoolname, t2.city, t2.region');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'LEFT');
        $this->db->where("t1.ssf_number !=","");
        $this->db->where("t1.status !=","cancelled");
        $this->db->where("t1.test_edition","V");
        $this->db->order_by("t1.school_code","asc");
        $query = $this->db->get(); 
        return $query->result();
    }

    /*
     * get round from the test_edition_details table
     */
    function getRounds($params = array()){
        $this->db->select('test_edition');
        $this->db->from($this->testEditionTbl);
        $this->db->order_by("test_edition","desc");
        $query = $this->db->get(); 
        return $query->result();
    }

    /*
     * get round from the test_edition_details table
     */
    function getCountry($params = array()){
        $this->db->distinct();
        $this->db->select('country');
        $this->db->from($this->schoolsTbl);
        $this->db->order_by('country',"asc");
        $query = $this->db->get(); 
        return $query->result();
    }

    /*
     * get rows from the schools_status table based on the filters
     */
    function getFilteredSchools($round,$paidpercentage,$country,$vendor){
        
       
        $this->db->select('t1.school_code, t1.no_of_students, t1.amount_payable, t1.paid, t1.advance_per_paid,t2.schoolname, t2.city, t2.region');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'LEFT');
        $this->db->where("t1.ssf_number !=","");
        $this->db->where("t1.status !=","cancelled");
        if($round != '')
        {
            $this->db->where("t1.test_edition",$round);    
        }
        
        if($paidpercentage != ""){
            $this->db->where("t1.advance_per_paid",$paidpercentage);    
        }

        if($country != ""){
            $this->db->where("t2.country",$country);       
        }

        if($vendor != ""){
            
        }

        $this->db->order_by("t1.school_code","asc");
        $query = $this->db->get(); 
        return $query->result();
    }

    
}