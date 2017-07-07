<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Schooltrackingmodel extends CI_Model{
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
        $this->marketingTbl = 'marketing';
        $this->courierDispatchDetails = 'courier_dispatch_details';
        $this->salesAllotmentMasterTbl = 'sales_allotment_master';

    }

    function getRegisteredSchool($round,$region,$category,$username){


        $this->db->select('t1.school_code,t2.schoolname');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        
        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        $query = $this->db->get();

        return $query->result();

    }

    function getSchoolName($schoolCode){

        $this->db->select('schoolname');
        $this->db->from($this->schoolsTbl);
        $this->db->where('schoolno',$schoolCode);
        $query = $this->db->get();
        return $query->result_array();

    }

    function getSchoolPaymentDetails($data){

        $this->db->select('amount_payable,paid,ROUND((paid/amount_payable) * 100) as "percentage_paid", amount_payable - paid as "difference"');
        $this->db->from($this->schoolstatusTbl);
        $this->db->where('school_code',$data['school']);
        $this->db->where('test_edition',$data['round']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSchoolProcessTrackingDetails($data){

        $round = $data['round'];
        $this->db->select('t1.order_id,t1.lot_no,t1.school_code,t1.planned_test_date,t1.test_edition,t1.qb_delivery_status,t1.qb_reciever_name');
        $this->db->select("DATE_FORMAT(t1.packlabel_date,'%d-%m-%Y') as packlabel_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.qb_despatch_date,'%d-%m-%Y') as qb_despatch_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.qb_delivery_date,'%d-%m-%Y') as qb_delivery_date",FALSE);
        $this->db->from("$this->schoolProcessTracking as t1");
        $this->db->join("$this->schoolstatusTbl as t2", "t1.school_code = t2.school_code AND t2.test_edition = '$round'", 'JOIN');
        $this->db->where('t1.school_code',$data['school']);
        $this->db->where('t1.test_edition',$data['round']);
        $query = $this->db->get();
    
        return $query->result_array();
    }

    function getSchoolDispacthCourierDetails($data){

        $this->db->select('*');
        $this->db->from($this->courierDispatchDetails);
        $this->db->where('schoolCode',$data['school']);
        $this->db->where('test_edition',$data['round']);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getFinalBreakupStatus($data){

        $this->db->select('count(*) as "ssfrecievedcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->where('t1.school_code',$data['school']);
        $this->db->where('t1.test_edition',$data['round']);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.ssf_number != ''");
        $this->db->where("t1.dynamic_flag != 1");
        $query = $this->db->get();
        return $query->result_array();

    }

    function getPaymentStatus($data){

        $this->db->select('count(*) as "paymentcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->where('t1.school_code',$data['school']);
        $this->db->where('t1.test_edition',$data['round']);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.ssf_number != ''");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("((t1.paid / t1.amount_payable) * 100) > 90");
        $query = $this->db->get();
        return $query->result_array();

    }

    
}