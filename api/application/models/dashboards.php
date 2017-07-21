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
        
        $this->db->where("region != ''");
        $this->db->order_by("region","asc");
        $query = $this->db->get(); 
        
        return $query->result();
    }

    function getUserDetails($userName){

        $this->db->select('*');
        $this->db->from($this->marketingTbl);
        $this->db->where('name',$userName);
        $query = $this->db->get();
        return $query->result();


    }

    function getRegisteredSchool($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "ssfcount"');
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

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        
        $query = $this->db->get();

        return $query->result();

    }

    function getPreTestSSFReceived($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "ssfrecievedcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.ssf_number != ''");
        $this->db->where("t1.dynamic_flag != 1");
        
        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestSSFPending($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "ssfpendingcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.ssf_number = ''");
        $this->db->where("t1.dynamic_flag != 1");
        
        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestSSFAlert($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "ssfalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");
        $this->db->where("t1.ssf_number != ''");
        $this->db->where("t1.dynamic_flag != 1");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();

        return $query->result();

    }

    function getPreTestPaymentReceived($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "paymentrecievedcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        
        return $query->result();

    }

    function getPreTestPaymentPending($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "paymentpendingcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentAlert($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "paymentalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number = ''");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPackLabelDateSet($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "packlabelsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t1.pack_label_date != 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateNotSet($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "packlabelnotsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t1.pack_label_date = 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateAlert($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "packlabelalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t1.pack_label_date = 0000-00-00");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number != ''");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestDispacthDateSet($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "dispatchsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1");
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        
        return $query->result();
    }

    function getPreTestDispacthDateNotSet($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "dispatchnotsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();

        return $query->result();
    }

    function getPreTestDispacthDateAlert($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "dispatchalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");
        $this->db->where("CURDATE() > DATE_ADD(t2.packlabel_date, INTERVAL 3 DAY)");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }
        
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        
        $query = $this->db->get();
        return $query->result();

    }


    function getPreTestDeliveryDateSet($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "deliverysetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        
        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date != 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDeliveryDateNotSet($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "deliverynotsetcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    
    function getRegisteredSchoolList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.ssf_number,t1.amount_payable,t1.paid, t1.amount_payable - t1.paid as "difference"');
        $this->db->select("DATE_FORMAT(t1.SSF_date,'%d-%m-%Y') as SSF_date",FALSE);
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
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

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }


    function getPreTestSSFReceivedList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.ssf_number,t1.amount_payable,t1.paid, t1.amount_payable - t1.paid as "difference"');
        $this->db->select("DATE_FORMAT(t1.SSF_date,'%d-%m-%Y') as SSF_date",FALSE);
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.ssf_number != ''");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }


    function getPreTestSSFPendingList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid, t1.amount_payable - t1.paid as "difference"');
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.ssf_number = ''");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestSSFAlertList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid, t1.amount_payable - t1.paid as "difference"');
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");
        $this->db->where("t1.ssf_number != ''");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentReceivedList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid, t1.amount_payable - t1.paid as "difference"');
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentPendingList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid, t1.amount_payable - t1.paid as "difference"');
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 < 90 )");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestPaymentAlertList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region,t1.amount_payable,t1.paid, t1.amount_payable - t1.paid as "difference"');
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number = ''");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }


    function getPreTestPackLabelDateSetList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region');
        $this->db->select("DATE_FORMAT(t1.SSF_date,'%d-%m-%Y') as SSF_date",FALSE);
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->select("DATE_FORMAT(t1.pack_label_date,'%d-%m-%Y') as pack_label_date",FALSE);
        
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.pack_label_date != 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateNotSetList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region');
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->select("DATE_FORMAT(t1.SSF_date,'%d-%m-%Y') as SSF_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.pack_label_date,'%d-%m-%Y') as pack_label_date",FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.pack_label_date = 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();


    }

    function getPreTestPackLabelDateAlertList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region');
        $this->db->select('ROUND(t1.paid/t1.amount_payable * 100,2) as "percentage_paid"',FALSE);
        $this->db->select("DATE_FORMAT(t1.SSF_date,'%d-%m-%Y') as SSF_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.pack_label_date,'%d-%m-%Y') as pack_label_date",FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolsTbl as t2", 't1.school_code = t2.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t1.pack_label_date = 0000-00-00");
        $this->db->where("((t1.paid / t1.amount_payable) * 100 >= 90 )");
        $this->db->where("t1.ssf_number != ''");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        } 

        if($zone != ""){
            $this->db->where("t2.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDispatchDateSetList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.qb_despatch_date,t4.consignmentNo,t4.courier');
        $this->db->select("DATE_FORMAT(t1.SSF_date,'%d-%m-%Y') as SSF_date",FALSE);
        $this->db->select("DATE_FORMAT(t2.packlabel_date,'%d-%m-%Y') as pack_label_date",FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');
        $this->db->join("$this->courierDispatchDetails as t4", 't1.school_code = t4.schoolCode', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t5", 't1.school_code = t5.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t5.keyAccount = '$username' OR t5.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();

        return $query->result();


    }

    function getPreTestDispatchDateNotSetList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region');
        $this->db->select("DATE_FORMAT(t2.packlabel_date,'%d-%m-%Y') as packlabel_date",FALSE);
        
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDispatchDateAlertList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region');
        $this->db->select("DATE_FORMAT(t2.packlabel_date,'%d-%m-%Y') as packlabel_date",FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date = 0000-00-00");
        $this->db->where("CURDATE() > DATE_ADD(t2.packlabel_date, INTERVAL 3 DAY)");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }
        
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        
        $query = $this->db->get();
        return $query->result();
    }


    function getPreTestDeliveryDateSetList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region,t2.qb_delivery_status');
        $this->db->select("DATE_FORMAT(t2.qb_delivery_date,'%d-%m-%Y') as qb_delivery_date",FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date != 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDeliveryDateNotSetList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region');
        $this->db->select("DATE_FORMAT(t2.qb_despatch_date,'%d-%m-%Y') as qb_despatch_date",FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();
    }

    function getPreTestDeliveryDateAlert($round,$zone,$region,$category,$username){

        $this->db->select('count(*) as "deliveryalertcount"');
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");
        $this->db->where("CURDATE() > DATE_ADD(t2.qb_despatch_date, INTERVAL 10 DAY)");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }

        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }

    function getPreTestDeliveryDateAlertList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t3.schoolname,t3.city,t3.region');
        $this->db->select("DATE_FORMAT(t2.qb_despatch_date,'%d-%m-%Y') as qb_despatch_date",FALSE);
        $this->db->from("$this->schoolstatusTbl as t1");
        $this->db->join("$this->schoolProcessTracking as t2", 't1.school_code = t2.school_code AND t2.test_edition = "'.$round.'"', 'LEFT');
        $this->db->join("$this->schoolsTbl as t3", 't1.school_code = t3.schoolno', 'JOIN');

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t4", 't1.school_code = t4.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t4.keyAccount = '$username' OR t4.buddyAccount = '$username')");
        }

        $this->db->where('t1.test_edition',$round);
        $this->db->where("t1.status != 'cancelled'");
        $this->db->where("t1.dynamic_flag != 1"); 
        $this->db->where("t2.packlabel_date != 0000-00-00");
        $this->db->where("t2.qb_despatch_date != 0000-00-00");
        $this->db->where("t2.qb_delivery_date = 0000-00-00");
        $this->db->where("CURDATE() > DATE_ADD(t2.qb_despatch_date, INTERVAL 10 DAY)");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t3.region IN ('$region')");

        }
        
        if($zone != ""){
            $this->db->where("t3.region = '$zone'");    
        }
        $query = $this->db->get();
        return $query->result();

    }
    
}