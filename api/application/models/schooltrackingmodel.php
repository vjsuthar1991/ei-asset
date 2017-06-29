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

    }

    function getRegisteredSchool($round){

        $this->db->select('t1.school_code,t2.schoolname');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        
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

        $this->db->select('t1.*,t2.school_confirm_date');
        $this->db->from("$this->schoolProcessTracking as t1");
        $this->db->join("$this->schoolstatusTbl as t2", 't1.school_code = t2.school_code', 'JOIN');
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
        $this->db->where("((t1.paid / t1.amount_payable) * 100 > 90 )");
        $query = $this->db->get();
        return $query->result_array();

    }

    
}