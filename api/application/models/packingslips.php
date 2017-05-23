<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packingslips extends CI_Model{
    function __construct() {
        $this->schoolstatusTbl = 'school_status';
        $this->schoolsTbl = 'schools';
        $this->testEditionTbl = 'test_edition_details';
        $this->contactDetails = 'contact_details';
        $this->exceptionList = 'exception_list';
    }
    /*
     * get rows from the schools_status table
     */
    function getSchools($params = array()){
        $this->db->select('t1.school_code, t1.no_of_students, t1.amount_payable, t1.paid, t1.advance_per_paid, t1.dynamic_class, t2.schoolname, t2.city, t2.region');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'LEFT');
        $this->db->join("$this->exceptionList as t3", "t1.school_code = t3.school_code AND t1.advance_per_paid < 90", 'LEFT');
        $this->db->where("t1.ssf_number !=","");
        $this->db->where("t1.status !=","cancelled");
        $this->db->where("(t1.advance_per_paid >= 90 OR (t3.test_edition = 'V' AND t3.exception_type_id = 5 AND t3.status = 'approved'))");
        $this->db->where("t1.test_edition","V");
        $this->db->order_by("t1.school_code","asc");
        $query = $this->db->get(); 

        $schools = $query->result();
        $schools = json_decode(json_encode($schools),true);
        
        $classArray = array('3','4','5','6','7','8','9','10');

        $selectedFinalSchools = array();

        $selectedschool = array();

        foreach ($schools as $key => $school) {
            //checkforAD($school); 
              
            if($school['dynamic_class'] != "" && $school['dynamic_class'] != NULL)
            {
                

                $classes = explode(",",$school['dynamic_class']);
                $pnpclasses = array_diff($classArray,$classes);

                if(count($pnpclasses) > 0){
                    
                    foreach ($pnpclasses as $key => $value) {
                        
                        $this->db->select("e$value,m$value,s$value,h$value,ss$value");
                        $this->db->from($this->schoolstatusTbl);
                        $this->db->where("school_code",$school['school_code']);
                        $this->db->where("test_edition","V");
                        $query = $this->db->get(); 
                        $breakup = $query->result();
                        $breakup = json_decode(json_encode($breakup),true);
                        

                        foreach($breakup as $key2 => $break)
                        {
                            foreach ($break as $key3 => $val) {
                                if($val > 0){
                                   
                                    $this->db->select('t1.school_code, t1.no_of_students, t1.amount_payable, t1.paid, t1.advance_per_paid, t1.dynamic_class, t2.schoolname, t2.city, t2.region');
                                    $this->db->from("$this->schoolstatusTbl as t1");
                                    $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'LEFT');    
                                    $this->db->where("t1.school_code",$school['school_code']);
                                    $this->db->where("t1.test_edition","V");
                                    $query = $this->db->get(); 
                                    $schools = $query->result();
                                    $schools = json_decode(json_encode($schools),true);
                                    $selectedFinalSchools[] = $schools[0];
                                   

                                }
                            }
                        }


                    }
                }

            }
            else {

                $this->db->select('t1.school_code, t1.no_of_students, t1.amount_payable, t1.paid, t1.advance_per_paid, t1.dynamic_class, t2.schoolname, t2.city, t2.region');
                $this->db->from("$this->schoolstatusTbl as t1");
                $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'LEFT');    
                $this->db->where("t1.school_code",$school['school_code']);
                $this->db->where("t1.test_edition","V");

                $query = $this->db->get(); 
                $schools = $query->result();
                $schools = json_decode(json_encode($schools),true);


                $selectedFinalSchools[] = $schools[0];
            } 
            
            
        }
        
        return $selectedFinalSchools;

        
        die;
    }

    /*
     * get round from the test_edition_details table
     */
    function getRounds($params = array()){
        $this->db->select('test_edition, description');
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
            $percentbar = explode("-",$paidpercentage);
            
            $this->db->where("t1.advance_per_paid BETWEEN $percentbar[0] AND $percentbar[1]",NULL,FALSE);    
        }

        if($country != ""){
            $this->db->where("t2.country",$country);       
        }

        if($vendor != ""){
            
        }

        $this->db->order_by("t1.school_code","asc");
        $query = $this->db->get(); 
        //echo $this->db->last_query();
        return $query->result();
    }

    function getPackingSlipSchoolList($schools)
    {
        $schoolIds = implode(",",$schools);
        
        $this->db->select("t1.schoolno, t1.schoolname, t1.city, t1.address, t1.std_code, t1.phones, t1.contact_person_1, t1.state, t1.pincode, t2.contact_person, t2.mobile_no, t2.contact_mail");
        $this->db->from("$this->schoolsTbl as t1");
        $this->db->join("$this->contactDetails as t2", "t1.schoolno = t2.school_code", 'LEFT');
        $this->db->where("t1.schoolno IN ($schoolIds)");
        $this->db->where("t2.designation","ASSET COORDINATOR");
        $this->db->order_by("t1.schoolno","asc");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result();
    }

    function getSchoolWiseBreakupList($schools)
    {
       $schoolIds = implode(",",$schools);
        
        $this->db->select("t1.school_code, t2.schoolname, t2.city, t1.e3, t1.m3, t1.s3, t1.h3, t1.ss3, t1.e4, t1.m4, t1.s4, t1.h4, t1.ss4, t1.e5, t1.m5, t1.s5, t1.h5, t1.ss5, t1.e6, t1.m6, t1.s6, t1.h6, t1.ss6, t1.e7, t1.m7, t1.s7, t1.h7, t1.ss7, t1.e8, t1.m8, t1.s8, t1.h8, t1.ss8, t1.e9, t1.m9, t1.s9, t1.h9, t1.ss9, t1.e10, t1.m10, t1.s10, t1.h10, t1.ss10");
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", "t1.school_code = t2.schoolno", 'LEFT');
        $this->db->where("t1.school_code IN ($schoolIds)");
        $this->db->where("t1.test_edition","V");
        $this->db->order_by("t1.school_code","asc");
        $query = $this->db->get();
        //echo $this->db->last_query();
        return $query->result(); 
    }

    
}