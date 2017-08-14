<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Analysis_mis_list_model extends CI_Model{
    
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
        $this->analysisLotListTbl = 'analysis_lot_list';
        
    }

   
    function getAnalysisLotNos($round){

        $this->db->distinct();
        $this->db->select('lotno');
        $this->db->from($this->analysisLotListTbl);
        $this->db->where('test_edition',$round);
        $this->db->order_by('lotno','asc');
        $query = $this->db->get();
        return $query->result();    
    }

    function getAnalysisMisReports($round,$region,$category,$username)
    {
        $this->db->select('t1.order_id,t1.analysis_lotno,t1.school_code,t1.planned_test_date,t1.test_edition,t1.analysis_delivery_status,t1.analysis_reciever_name,t2.courier,t2.mode,t2.material,t2.weight,t2.consignmentNo,t3.schoolname,t3.city,t3.region');
        $this->db->select("DATE_FORMAT(t1.analysis_sentdate,'%d-%m-%Y') as analysis_sentdate",FALSE);
        $this->db->select("DATE_FORMAT(t1.analysis_despatch_date,'%d-%m-%Y') as analysis_despatch_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.analysis_delivery_date,'%d-%m-%Y') as analysis_delivery_date",FALSE);
        $this->db->select("DATEDIFF(t1.analysis_despatch_date,t1.analysis_sentdate) as 'processingtat'",FALSE);
        $this->db->select("DATEDIFF(t1.analysis_delivery_date,t1.analysis_despatch_date) as 'analysistat'",FALSE);
        $this->db->from("$this->schoolProcessTracking as t1");
        $this->db->join("$this->courierDispatchDetails as t2", "t1.school_code = t2.schoolCode AND t2.test_edition = '".$round."' AND t2.subCategory = 'Analysis Dispatch'", 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", "t1.school_code = t3.schoolno", 'JOIN');
        
        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        
        $this->db->where('t1.test_edition',$round);
        $this->db->where('t1.analysis_sentdate != 0000-00-00');



        $this->db->order_by('t1.analysis_sentdate','desc');
        $query = $this->db->get();
        return $query->result(); 
    }

    
    function getFilteredAnalysisReports($round,$zone,$lotno,$region,$category,$username)
    {
        $this->db->select('t1.order_id,t1.analysis_lotno,t1.school_code,t1.planned_test_date,t1.test_edition,t1.analysis_delivery_status,t1.analysis_reciever_name,t2.courier,t2.mode,t2.material,t2.weight,t2.consignmentNo,t3.schoolname,t3.city,t3.region');
        $this->db->select("DATE_FORMAT(t1.analysis_sentdate,'%d-%m-%Y') as analysis_sentdate",FALSE);
        $this->db->select("DATE_FORMAT(t1.analysis_despatch_date,'%d-%m-%Y') as analysis_despatch_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.analysis_delivery_date,'%d-%m-%Y') as analysis_delivery_date",FALSE);
        $this->db->select("DATEDIFF(t1.analysis_despatch_date,t1.analysis_sentdate) as 'processingtat'",FALSE);
        $this->db->select("DATEDIFF(t1.analysis_delivery_date,t1.analysis_despatch_date) as 'analysistat'",FALSE);
        $this->db->from("$this->schoolProcessTracking as t1");
        $this->db->join("$this->courierDispatchDetails as t2", "t1.school_code = t2.schoolCode AND t2.test_edition = '".$round."' AND t2.subCategory = 'Analysis Dispatch'", 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", "t1.school_code = t3.schoolno", 'JOIN');
       
        if($region != '' && $region != 'NULL'){

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
            $this->db->where('t3.region',$zone);
        }

        if($lotno != ""){
            $this->db->where('t1.analysis_lotno',$lotno);
        }

        $this->db->where('t1.analysis_sentdate != 0000-00-00');
        $this->db->order_by('t1.analysis_sentdate','desc');
        $query = $this->db->get();

        return $query->result(); 

    }

    function getVendorAnalysisLotNos($round,$vendor_id){

        $this->db->select('lotno');
        $this->db->from($this->analysisLotListTbl);
        $this->db->where('vendor_id',$vendor_id);
        $this->db->where('test_edition',$round);
        $this->db->order_by('lot_sent_date','desc');
        $query = $this->db->get();
        return $query->result_array(); 

    }

    function getAnalysisVendorReports($round,$vendor_id){

        $this->db->select('t1.order_id,t1.analysis_lotno,t1.school_code,t1.planned_test_date,t1.test_edition,t1.analysis_delivery_status,t1.analysis_reciever_name,t2.courier,t2.mode,t2.material,t2.weight,t2.consignmentNo,t3.schoolname,t3.city,t3.region');
        $this->db->select("DATE_FORMAT(t1.analysis_sentdate,'%d-%m-%Y') as analysis_sentdate",FALSE);
        $this->db->select("DATE_FORMAT(t1.analysis_despatch_date,'%d-%m-%Y') as analysis_despatch_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.analysis_delivery_date,'%d-%m-%Y') as analysis_delivery_date",FALSE);
        $this->db->select("DATEDIFF(t1.analysis_despatch_date,t1.analysis_sentdate) as 'processingtat'",FALSE);
        $this->db->select("DATEDIFF(t1.analysis_delivery_date,t1.analysis_despatch_date) as 'analysistat'",FALSE);
        $this->db->from("$this->schoolProcessTracking as t1");
        $this->db->join("$this->courierDispatchDetails as t2", "t1.school_code = t2.schoolCode AND t2.test_edition = '".$round."' AND t2.subCategory = 'Analysis Dispatch'", 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", "t1.school_code = t3.schoolno", 'JOIN');
        
        $this->db->where('t1.test_edition',$round);
        $this->db->where('t1.analysis_sentdate != 0000-00-00');
        $this->db->where('t1.analysis_vendorid',$vendor_id);
        $this->db->order_by('t1.analysis_sentdate','desc');
        $query = $this->db->get();
        // echo $this->db->last_query();
        return $query->result_array(); 

    }

    
}