<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboards extends CI_Model{
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

    }

    function getUserDetails($userName){

        $this->db->select('fullname');
        $this->db->from($this->marketingTbl);
        $this->db->where('name',$userName);
        $query = $this->db->get();
        return $query->result();


    }

    function getRegisteredSchool($round,$zone){

        $this->db->select('count(*) as "ssfcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();

        return $query->result();

    }

    function getPreTestSSFReceived($round,$zone){

        $this->db->select('count(*) as "ssfrecievedcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.ssf_number != ''");
         $this->db->where("t1.dynamic_flag != 1");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestSSFPending($round,$zone){

        $this->db->select('count(*) as "ssfpendingcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.ssf_number = ''");
         $this->db->where("t1.dynamic_flag != 1");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestSSFAlert($round,$zone){

        $this->db->select('count(*) as "ssfalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");
        $this->db->where("t1.ssf_number != ''");
         $this->db->where("t1.dynamic_flag != 1");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentReceived($round,$zone){

        $this->db->select('count(*) as "paymentrecievedcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
         $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        
        return $query->result();

    }

    function getPreTestPaymentPending($round,$zone){

        $this->db->select('count(*) as "paymentpendingcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentAlert($round,$zone){

        $this->db->select('count(*) as "paymentalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number = ''");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPackLabelDateSet($round,$zone){

        $this->db->select('count(*) as "packlabelsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t1.pack_label_date != 0000-00-00");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateNotSet($round,$zone){

        $this->db->select('count(*) as "packlabelnotsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t1.pack_label_date = 0000-00-00");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateAlert($round,$zone){

        $this->db->select('count(*) as "packlabelalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
         $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t1.pack_label_date = 0000-00-00");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number != ''");


        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestDispacthDateSet($round,$zone){

        $this->db->select('count(*) as "dispatchsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDispacthDateNotSet($round,$zone){

        $this->db->select('count(*) as "dispatchnotsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDispacthDateAlert($round,$zone){

        $this->db->select('count(*) as "dispatchalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");
        $this->db->where("CURDATE() < DATE_ADD(t2.packlabel_date, INTERVAL 7 DAY)");
        
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        
        $query = $this->db->get();
        return $query->result();

    }


    function getPreTestDeliveryDateSet($round,$zone){

        $this->db->select('count(*) as "deliverysetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date != 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDeliveryDateNotSet($round,$zone){

        $this->db->select('count(*) as "deliverynotsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    
    function getRegisteredSchoolList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.entered_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }


    function getPreTestSSFReceivedList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.SSF_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.ssf_number != ''");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }


    function getPreTestSSFPendingList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.entered_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.ssf_number = ''");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestSSFAlertList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.entered_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");
        $this->db->where("t1.ssf_number != ''");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentReceivedList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentPendingList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentAlertList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number = ''");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }


    function getPreTestPackLabelDateSetList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.pack_label_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.pack_label_date != 0000-00-00");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateNotSetList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.SSF_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.pack_label_date = 0000-00-00");
        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateAlertList($round,$zone){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.SSF_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.pack_label_date = 0000-00-00");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number != ''");


        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDispatchDateSetList($round,$zone){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.qb_despatch_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestDispatchDateNotSetList($round,$zone){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.packlabel_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDispatchDateAlertList($round,$zone){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.packlabel_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");
        $this->db->where("CURDATE() < DATE_ADD(t2.packlabel_date, INTERVAL 7 DAY)");
        
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        
        $query = $this->db->get();
        return $query->result();
    }


    function getPreTestDeliveryDateSetList($round,$zone){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.qb_delivery_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date != 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDeliveryDateNotSetList($round,$zone){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.qb_despatch_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDeliveryDateAlert($round,$zone){

        $this->db->select('count(*) as "deliveryalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");
        $this->db->where("CURDATE() < DATE_ADD(t2.qb_despatch_date, INTERVAL 7 DAY)");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestDeliveryDateAlertList($round,$zone){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.qb_despatch_date');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");
        $this->db->where("CURDATE() < DATE_ADD(t2.qb_despatch_date, INTERVAL 7 DAY)");
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }
    
}