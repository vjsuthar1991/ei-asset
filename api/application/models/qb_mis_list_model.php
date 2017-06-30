<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Qb_mis_list_model extends CI_Model{
    
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
        $this->courierDispatchDetails = 'courier_dispatch_details';
        $this->salesAllotmentMasterTbl = 'sales_allotment_master';

    }

    /*
     * get rows from the schools_status table
     */
    function getZones($region){
        $this->db->distinct();
        $this->db->select('region');
        $this->db->from($this->schoolsTbl);

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("region IN ('$region')");

        }
        
        $this->db->order_by("region","asc");
        $query = $this->db->get(); 
        
        return $query->result();
    }

    function getSchoolDetails($round)
    {

        $this->db->select('school_code,school_name');
        $this->db->from($this->schoolProcessTracking);
        $this->db->where('test_edition',$round);
        $query = $this->db->get();
        return $query->result();
    }

    function getPackLabelDate($round)
    {
        $this->db->distinct();
        $this->db->select('packlabel_date');
        $this->db->from($this->schoolProcessTracking);
        $this->db->where('test_edition',$round);
        $query = $this->db->get();
        return $query->result(); 
    }

    function getSchoolCity($round)
    {
        $this->db->distinct();
        $this->db->select('school_city');
        $this->db->from($this->schoolProcessTracking);
        $this->db->where('test_edition',$round);
        $this->db->order_by('school_city','asc');
        $query = $this->db->get();
        return $query->result(); 
    }

    function getPackingLotNos($round){

        $this->db->distinct();
        $this->db->select('lot_no');
        $this->db->from($this->schoolProcessTracking);
        $this->db->where('test_edition',$round);
        $this->db->order_by('lot_no','asc');
        $query = $this->db->get();
        return $query->result();    
    }

    function getQbMisReports($round,$region,$category,$username)
    {
        $this->db->select('t1.*,t2.courier,t2.mode,t2.material,t2.weight,t2.consignmentNo');
        $this->db->from("$this->schoolProcessTracking as t1");
        $this->db->join("$this->courierDispatchDetails as t2", "t1.school_code = t2.schoolCode AND t2.test_edition = '".$round."'", 'LEFT');

        if($region != '' && $region != 'NULL'){

            $this->db->join("$this->schoolsTbl as t3", "t1.school_code = t3.schoolno", 'JOIN');

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        
        $this->db->where('t1.test_edition',$round);



        $this->db->order_by('t1.packlabel_date','desc');
        $query = $this->db->get();
        return $query->result(); 
    }

    function getFilteredQbReports($round,$zone,$lotno,$region,$category,$username)
    {
        $this->db->select('t1.*,t2.courier,t2.mode,t2.material,t2.weight,t2.consignmentNo');
        $this->db->from("$this->schoolProcessTracking as t1");
        $this->db->join("$this->courierDispatchDetails as t2", "t1.school_code = t2.schoolCode AND t2.test_edition = '".$round."'", 'LEFT');
        
        if($region != '' && $region != 'NULL'){

            $this->db->join("$this->schoolsTbl as t3", "t1.school_code = t3.schoolno", 'JOIN');

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        if($round != ""){
            $this->db->where('t1.test_edition',$round);
        }

        if($zone != ""){
            $this->db->where('t1.school_region',$zone);
        }

        if($lotno != ""){
            $this->db->where('t1.lot_no',$lotno);
        }

        $this->db->order_by('t1.packlabel_date','desc');
        $query = $this->db->get();

        return $query->result(); 

    }

    
}