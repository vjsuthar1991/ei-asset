<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Packingslips extends CI_Model{
    function __construct() {
        $this->schoolstatusTbl = 'school_status';
        $this->schoolsTbl = 'schools';
        $this->testEditionTbl = 'test_edition_details';
        $this->contactDetails = 'contact_details';
        $this->exceptionList = 'exception_list';
        $this->regionMaster = 'region_master';
        $this->vendorsTbl = 'vendors';
        $this->packingslipsListTbl = 'packing_slips';
        $this->schoolProcessTracking = 'school_process_tracking';

    }
    /*
     * get rows from the schools_status table
     */
    function getSchools($params = array()){

        $this->db->select('t1.school_code, t1.no_of_students, t1.amount_payable, t1.paid, t1.dynamic_class, t2.schoolname, t2.city, t2.region');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->join("$this->exceptionList as t3", "t1.school_code = t3.school_code AND t3.exception_type_id=5 AND t3.offering='asset' AND t3.test_edition = 'V'", 'LEFT');
        $this->db->where("t1.ssf_number !=","");
        $this->db->where("t1.status !=","cancelled");
        $this->db->where("t1.test_edition",$params);
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 OR (t3.test_edition = 'V' AND t3.status = 'approved'))");
        $this->db->where("t1.pack_label_date","0000-00-00");
        
        
        $this->db->order_by("t1.school_code","asc");
        $query = $this->db->get(); 
        $schools = $query->result();
        //echo $this->db->last_query();
        
        $schools = json_decode(json_encode($schools),true);
        
        return $this->filterClasses($schools,$params);
        
        die;
    }

    function filterClasses($schools,$round){

        $classArray = array('3','4','5','6','7','8','9','10');

        $selectedFinalSchools = array();

        $selectedschool = array();


        foreach ($schools as $key => $school) {
            
              
            if($school['dynamic_class'] != "" && $school['dynamic_class'] != NULL)
            {
                

                $classes = explode(",",$school['dynamic_class']);
                $pnpclasses = array_diff($classArray,$classes);
                

                if(count($pnpclasses) > 0){
                    

                    foreach ($pnpclasses as $key => $value) {
                        
                        
                        $this->db->select("e$value,m$value,s$value,h$value,ss$value");
                        $this->db->from($this->schoolstatusTbl);
                        $this->db->where("school_code",$school['school_code']);
                        $this->db->where("test_edition",$round);
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
                                    $this->db->where("t1.test_edition",$round);
                                    $query = $this->db->get();
                                    $schools = $query->result();
                                    $schools = json_decode(json_encode($schools),true);

                                    $selectedFinalSchools[$school['school_code']] = $schools[0];
                                    break;
                                   

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
                $this->db->where("t1.test_edition",$round);

                $query = $this->db->get(); 
                $schools = $query->result();
                $schools = json_decode(json_encode($schools),true);
                
                $selectedFinalSchools[$school['school_code']] = $schools[0];

                
            } 
            
            
        }
        
        return $selectedFinalSchools;

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
     * get all zones from the schools table
     */
    function getZones(){
        $this->db->distinct();
        $this->db->select('region');
        $this->db->from($this->regionMaster);
        $this->db->order_by('region',"asc");
        $query = $this->db->get(); 
        return $query->result();
    }


    /*
     * get rows from the schools_status table based on the filters
     */
    function getFilteredSchools($round,$country,$zone){
        
       
        $this->db->select('t1.school_code, t1.no_of_students, t1.amount_payable, t1.paid, t1.advance_per_paid, t1.dynamic_class, t2.schoolname, t2.city, t2.region');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'LEFT');
        $this->db->join("$this->exceptionList as t3", "t1.school_code = t3.school_code AND t1.advance_per_paid < 90", 'LEFT');
        $this->db->where("t1.ssf_number !=","");
        $this->db->where("t1.status !=","cancelled");
        $this->db->where("((t1.advance_per_paid / t1.amount_payable) * 100 OR (t3.test_edition = $round AND t3.exception_type_id = 5 AND t3.status = 'approved' AND t3.year = '2016'))");
        $this->db->where("t1.pack_label_date","0000-00-00");
        if($round != '')
        {
            $this->db->where("t1.test_edition",$round);    
        }
        
        if($country != ""){
            $this->db->where("t2.country",$country);       
        }

        if($zone != ""){
            $this->db->where("t2.region",$zone);          
        }

        $this->db->order_by("t1.school_code","asc");
        $query = $this->db->get(); 
        //echo $this->db->last_query();
        $schools = $query->result();
        $schools = json_decode(json_encode($schools),true);
        
        return $this->filterClasses($schools,$round);
        
        die;
        


    }

    function getPackingSlipSchoolList($schools)
    {
        $schoolIds = implode(",",$schools);
        
        $this->db->select("t1.schoolno, t1.schoolname, t1.city, t1.address, t1.std_code, t1.phones, t1.contact_person_1, t1.state, t1.pincode, t2.contact_person, t2.mobile_no, t2.contact_mail");
        $this->db->from("$this->schoolsTbl as t1");
        $this->db->join("$this->contactDetails as t2", "t1.schoolno = t2.school_code AND t2.designation = 'ASSET COORDINATOR'", 'LEFT');
        $this->db->where("t1.schoolno IN ($schoolIds)");
        $this->db->group_by("t1.schoolno");
        $this->db->order_by("t1.schoolno","asc");
        $query = $this->db->get();

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

    function getVendors()
    {
        $this->db->select('vendor_id, vendor_name');
        $this->db->from($this->vendorsTbl);
        $this->db->order_by("vendor_name","asc");
        $query = $this->db->get(); 
        return $query->result();
    }

    function getVendorDetails($vendorId)
    {
        $this->db->select('vendor_contact_person_1_email');
        $this->db->from($this->vendorsTbl);
        $this->db->where('vendor_id',$vendorId);
        $query = $this->db->get();
        return $query->result();
    }

    function updatePackLabelDate($schoolCode,$round)
    {
        $this->db->where('school_code', $schoolCode);
        $this->db->where('test_edition', $round);
        $this->db->update($this->schoolstatusTbl,array('pack_label_date' => date('Y-m-d')));

        $this->db->select('t1.sno,t2.schoolname,t2.city,t2.region');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", "t1.school_code = t2.schoolno", 'LEFT');
        $this->db->where('t1.school_code', $schoolCode);
        $this->db->where('t1.test_edition', $round);
        $query = $this->db->get();
        $output = $query->result();

        $insert = $this->db->insert($this->schoolProcessTracking, array('order_id' => $output[0]->sno,'school_code' => $schoolCode,'school_name' => $output[0]->schoolname,'school_city' => $output[0]->city,'school_region' => $output[0]->region,'packlabel_date' => date('Y-m-d'),'test_edition' => $round));
         
    }

    function getPackingSlipList()
    {
        $this->db->select('t1.packingslip_id,t1.packingslip_sentdate,t1.packingslip_schools_data_csv,t1.packingslip_breakup_data_csv,t1.packingslip_acknowledge_date,t2.vendor_name');
        $this->db->from("$this->packingslipsListTbl as t1");
        $this->db->join("$this->vendorsTbl as t2", "t1.packingslip_vendorid = t2.vendor_id", 'LEFT');
        $this->db->order_by('packingslip_id','desc');
        $query = $this->db->get();
        return $query->result();
    }

    function insertPackingSlip($vendorId,$testEdition,$schoolData,$breakupData)
    {
        $insert = $this->db->insert($this->packingslipsListTbl, array('test_edition' => $testEdition,'packingslip_schools_data' => $schoolData,'packingslip_breakup_data' => $breakupData,'packingslip_vendorid' => $vendorId));
        if($insert) 
        {

            return $this->db->insert_id();
        }
        else
        {
            return false;
        } 
    }

    function updatePackingSlipFile($file1,$file2,$id)
    {
        $this->db->where('packingslip_id', $id);
        $this->db->update($this->packingslipsListTbl,array('packingslip_schools_data_csv' => $file1,'packingslip_breakup_data_csv' => $file2));
    }

    
}