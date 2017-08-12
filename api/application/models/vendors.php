<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendors extends CI_Model{
    function __construct() {
        
        $this->vendorTbl = 'vendors';
        $this->schoolsTbl = 'schools';
        $this->schoolstatusTbl = 'school_status';
        $this->vendorAccessTbl = 'vendor_access';
        $this->packingslipsListTbl = 'packing_slips';
        $this->testEditionTbl = 'test_edition_details';
        $this->courierCompany = 'courier';
        $this->schoolProcessTracking = 'school_process_tracking';
        $this->courierDispatchDetails = 'courier_dispatch_details';
        $this->contactDetailsTbl = 'contact_details';
        $this->salesAllotmentMasterTbl = 'sales_allotment_master';
        $this->marketingTbl = 'marketing';
        $this->omrReceiptReports = 'omr_receipt_reports';
        $this->analysisLotListTbl = 'analysis_lot_list';

    }

    /*
     * get rows from the schools_status table
     */
    function getZones(){
        $this->db->distinct();
        $this->db->select('region');
        $this->db->from($this->schoolsTbl);
        $this->db->where("region != ''");
        $this->db->order_by("region","asc");
        $query = $this->db->get(); 
        return $query->result();
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
     * inser vendor data in database
     */
    function insertVendor($data = array()){

        $data['vendor_password'] = md5($data['vendor_password']);
        //insert user data to users table
        $insert = $this->db->insert($this->vendorTbl, $data);
        //return the status
        if($insert){
            return $this->db->insert_id();
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

    function editVendor($data = array())
    {

        $this->db->where('vendor_id', $data['vendor_id']);
        $this->db->update($this->vendorTbl,array('vendor_name' => $data['vendor_name'],'vendor_address' => $data['vendor_address'],'vendor_zone' => $data['vendor_zone'],'vendor_username' => $data['vendor_username'],'vendor_password' => md5($data['vendor_password']),'vendor_phone' => $data['vendor_phone'],'vendor_contact_person_1_name' => $data['vendor_contact_person_1_name'],'vendor_contact_person_1_email' => $data['vendor_contact_person_1_email'],'vendor_contact_person_1_contactno' => $data['vendor_contact_person_1_contactno'],'vendor_coo_name' => $data['vendor_coo_name'],'vendor_coo_email' => $data['vendor_coo_email'],'vendor_coo_contactno' => $data['vendor_coo_contactno'],'vendor_ceo_name' => $data['vendor_ceo_name'],'vendor_ceo_email' => $data['vendor_ceo_email'],'vendor_ceo_contactno' => $data['vendor_ceo_contactno']));
        
        return $data['vendor_id'];            
    }

    function deleteVendor($vendor_id)
    {
        $this->db->where('vendor_id', $vendor_id);
        $this->db->delete($this->vendorTbl);
        
        return $vendor_id;
    }

    function loginVendor($vendorusername,$vendorpassword)
    {
        $this->db->select('*');
        $this->db->from($this->vendorTbl);
        $this->db->where('vendor_username',$vendorusername);
        $this->db->where('vendor_password',md5($vendorpassword));
        $query = $this->db->get();
        
        return $query->result();
    }

    function registerVendorLogin($vendorId)
    {
        $randomNum = rand();
        $authtoken = $vendorId.$randomNum.date('dmYHis');

        $insert = $this->db->insert($this->vendorAccessTbl, array('vendor_id' => $vendorId,'vendor_authtoken' => $authtoken));

        if($insert){
            return $authtoken;
        }else{
            return false;
        }
    }

    function unregister($token)
    {
        $this->db->where('vendor_authtoken', $token);
        $this->db->delete($this->vendorAccessTbl);
    }

    function listVendorPackingSlips($vendorId)
    {
        $this->db->select('*');
        $this->db->select("DATE_FORMAT(packingslip_sentdate,'%d-%c-%Y') as packingslip_sentdate",FALSE);
        //$this->db->select("DATE_FORMAT(packingslip_acknowledge_date,'%d-%c-%Y %h:%i:%s %p') as packingslip_acknowledge_date",FALSE);
        $this->db->from($this->packingslipsListTbl);
        $this->db->where('packingslip_vendorid',$vendorId);
        $this->db->order_by("packingslip_id","desc");
        $query = $this->db->get();
        return $query->result();
    }

    function acknowledgeVendorPackingslip($packingslipId)
    {
        
        $this->db->where("packingslip_id",$packingslipId);
        
        $this->db->update($this->packingslipsListTbl,array('packingslip_acknowledge_date' => date('Y-m-d H:i:s')));
         
        return $packingslipId;
    }

    function courierCompanyDetails($companyname,$state,$city)
    {
        
        $this->db->select('*');
        $this->db->from($this->courierCompany);
        $this->db->where("courier_company",$companyname);
        $this->db->where("state",$state);
        $this->db->where("city",$city);
        $query = $this->db->get();
        return $query->result();

    }

    function updateDespatchDate($schoolCode,$round,$contentType,$despatchDate,$despatchStatus,$deliveryDate,$recieverName,$courierCompany,$mode,$material,$weight,$schoolName,$city,$contactNo,$consignmentNumber,$remark)
    {

        $this->db->select('test_edition');
        $this->db->from($this->testEditionTbl);
        $this->db->where("description",$round);
        $query = $this->db->get();
        $edition = $query->result();

        if($contentType == "QB") {

            $this->db->select('qb_despatch_date,qb_delivery_date');
            $this->db->from($this->schoolProcessTracking);
            $this->db->where('school_code',$schoolCode);
            $this->db->where('test_edition',$edition[0]->test_edition);
            $query = $this->db->get();
            
            $check = $query->result();

            if($deliveryDate == ''){
                $deliveryDate = '0000-00-00';
            }

            if($check[0]->qb_despatch_date == "0000-00-00"){

                $this->db->where("school_code",$schoolCode);
                $this->db->where("test_edition",$edition[0]->test_edition);

                $editionTest = $edition[0]->test_edition;

                $this->db->update($this->schoolProcessTracking,array('qb_despatch_date' => date('Y-m-d',strtotime($despatchDate)),'qb_delivery_status' => $despatchStatus,'qb_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'qb_reciever_name' => $recieverName));
                
                
                $this->db->where("school_code",$schoolCode);
                $this->db->where("test_edition",$edition[0]->test_edition);      

                $this->db->update($this->schoolstatusTbl,array('despatch_date' => date('Y-m-d',strtotime($despatchDate))));
                
                
                $this->db->query("insert into asset_breakup_log (school_code,test_edition,all_compulsory,accurate_breakup,aro_form_date,
            e3,m3,s3,e4,m4,s4,e5,m5,s5,e6,m6,s6,e7,m7,s7,e8,m8,s8,e9,m9,s9,e10,m10,s10,h4,h5,h6,h7,h8,ss5,ss6,ss7,ss8,ss9,ss10,
            no_of_students,no_of_papers,order_date,dynamic_class,type) select school_code,test_edition,all_compulsory,accurate_breakup,aro_form_date,
            e3,m3,s3,e4,m4,s4,e5,m5,s5,e6,m6,s6,e7,m7,s7,e8,m8,s8,e9,m9,s9,e10,m10,s10,h4,h5,h6,h7,h8,ss5,ss6,ss7,ss8,ss9,ss10,
            no_of_students,no_of_papers,order_date,dynamic_class,'Final' from school_status where test_edition='$editionTest' and school_code=$schoolCode");
                
                $this->db->select('srno');
                $this->db->from($this->courierDispatchDetails);
                $this->db->where('schoolCode',$schoolCode);
                $this->db->where('test_edition',$edition[0]->test_edition);
                $query = $this->db->get();
                $check2 = $query->result();
                
                
                if(count($check2) == 0){

                    $this->db->insert($this->courierDispatchDetails,array('department' => 'Logistics','subCategory' => 'QB Dispatch','courierTo' => 'School','courier' => $courierCompany,'mode' => $mode,'dispatchDate' => date('Y-m-d',strtotime($despatchDate)),'material' => $material,'weight' => $weight,'partyName' => $schoolName,'schoolCode' => $schoolCode,'test_edition' => $edition[0]->test_edition,'city' => $city,'contactNo' => $contactNo,'consignmentNo' => $consignmentNumber,'comment' => $remark,'addedDate' => date('Y-m-d'),'addedBy' => 'Vendor'));
                 
                }
                return 1;        
            }
            else {
                if($check[0]->qb_delivery_date == '0000-00-00'){

                    $this->db->where("school_code",$schoolCode);
                    $this->db->where("test_edition",$edition[0]->test_edition);
                    
                    $this->db->update($this->schoolProcessTracking,array('qb_delivery_status' => $despatchStatus,'qb_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'qb_reciever_name' => $recieverName));
                
                    return 0;
                }
            }
            
            
            

        }
        elseif($contentType == "Analysis"){
            
            $this->db->select('analysis_despatch_date,analysis_delivery_date');
            $this->db->from($this->schoolProcessTracking);
            $this->db->where('school_code',$schoolCode);
            $this->db->where('test_edition',$edition[0]->test_edition);
            $query = $this->db->get();
            $check = $query->result();

            if($deliveryDate == ''){
                $deliveryDate = '0000-00-00';
            }

            

            if($check[0]->analysis_despatch_date == "0000-00-00"){

                $this->db->where("school_code",$schoolCode);
                
                $this->db->where("test_edition",$edition[0]->test_edition);

                $editionTest = $edition[0]->test_edition;

                $this->db->update($this->schoolProcessTracking,array('analysis_despatch_date' => date('Y-m-d',strtotime($despatchDate)),'analysis_delivery_status' => $despatchStatus,'analysis_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'analysis_reciever_name' => $recieverName));
                
                $this->db->where("school_code",$schoolCode);
                
                $this->db->where("test_edition",$edition[0]->test_edition);

                $this->db->update($this->schoolstatusTbl,array('reports_despatched_date' => date('Y-m-d',strtotime($despatchDate))));
                
                $this->db->query("insert into asset_breakup_log (school_code,test_edition,all_compulsory,accurate_breakup,aro_form_date,
            e3,m3,s3,e4,m4,s4,e5,m5,s5,e6,m6,s6,e7,m7,s7,e8,m8,s8,e9,m9,s9,e10,m10,s10,h4,h5,h6,h7,h8,ss5,ss6,ss7,ss8,ss9,ss10,
            no_of_students,no_of_papers,order_date,dynamic_class,type) select school_code,test_edition,all_compulsory,accurate_breakup,aro_form_date,
            e3,m3,s3,e4,m4,s4,e5,m5,s5,e6,m6,s6,e7,m7,s7,e8,m8,s8,e9,m9,s9,e10,m10,s10,h4,h5,h6,h7,h8,ss5,ss6,ss7,ss8,ss9,ss10,
            no_of_students,no_of_papers,order_date,dynamic_class,'Actual' from school_status where test_edition='$editionTest' and school_code=$schoolCode");

                $this->db->select('srno');
                $this->db->from($this->courierDispatchDetails);
                $this->db->where('schoolCode',$schoolCode);
                $this->db->where('test_edition',$edition[0]->test_edition);
                $query = $this->db->get();
                $check = $query->result();

                if(count($check) == 0){

                    $this->db->insert($this->courierDispatchDetails,array('department' => 'Logistics','subCategory' => 'Analysis Dispatch','courierTo' => 'School','courier' => $courierCompany,'mode' => $mode,'dispatchDate' => date('Y-m-d',strtotime($despatchDate)),'material' => $material,'weight' => $weight,'partyName' => $schoolName,'schoolCode' => $schoolCode,'test_edition' => $edition[0]->test_edition,'city' => $city,'contactNo' => $contactNo,'consignmentNo' => $consignmentNumber,'comment' => $remark,'addedDate' => date('Y-m-d'),'addedBy' => 'Vendor'));

                }

                return 1;
            }

            else {
                if($check[0]->analysis_delivery_date == '0000-00-00'){

                    $this->db->where("school_code",$schoolCode);
                    $this->db->where("test_edition",$edition[0]->test_edition);
                    
                    $this->db->update($this->schoolProcessTracking,array('analysis_delivery_status' => $despatchStatus,'analysis_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'analysis_reciever_name' => $recieverName));    
                    return 0;
                }
            }

            
        }
        
    }

    function getSchoolEmailId($schoolCode){

        $this->db->select('email');
        $this->db->from($this->schoolsTbl);
        $this->db->where('schoolno',$schoolCode);
        $query = $this->db->get();
        return $query->result_array();

    }

    function getSchoolRegion($schoolCode){

        $this->db->select('region');
        $this->db->from($this->schoolsTbl);
        $this->db->where('schoolno',$schoolCode);
        $query = $this->db->get();
        return $query->result_array();

    }

    function getSchoolPrincipalEmailId($schoolCode){

        $this->db->select('contact_mail_1');
        $this->db->from($this->schoolsTbl);
        $this->db->where('schoolno',$schoolCode);
        $this->db->where('designation_1','Principal');
        $query = $this->db->get();
        return $query->result_array();

    }

    

    function getSchoolAssetCoordinatorEmailId($schoolCode){

        $this->db->select('contact_mail');
        $this->db->from($this->contactDetailsTbl);
        $this->db->where('school_code',$schoolCode);
        $this->db->where('designation','ASSET Coordinator');
        $query = $this->db->get();
        return $query->result_array();

    }


    function getSchoolkeyAccountRM($schoolCode){

        $this->db->select('keyAccount');
        $this->db->from($this->salesAllotmentMasterTbl);
        $this->db->where('schoolCode',$schoolCode);
        $this->db->where('product','asset');
        $query = $this->db->get();
        return $query->result_array();

    }

    function getSchoolkeyAccountRMEmailID($rmname){

        $this->db->select('email');
        $this->db->from($this->marketingTbl);
        $this->db->where('name',$rmname);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSchoolBuddyAccountRM($schoolCode){

        $this->db->select('buddyAccount');
        $this->db->from($this->salesAllotmentMasterTbl);
        $this->db->where('schoolCode',$schoolCode);
        $this->db->where('product','asset');
        $query = $this->db->get();
        return $query->result_array();

    }

    function getSchoolBuddyRMEmailID($rmname){

        $this->db->select('email');
        $this->db->from($this->marketingTbl);
        $this->db->where('name',$rmname);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getSchoolZMEmailID($region){
        $this->db->select('email');
        $this->db->from($this->marketingTbl);
        $this->db->where('category','ZM');
        $this->db->where("FIND_IN_SET('$region',region)");
        $query = $this->db->get();
        return $query->result_array();
    }

    function checkVendorPassword($data){

        $this->db->select('vendor_id,vendor_contact_person_1_email');
        $this->db->from($this->vendorTbl);
        $this->db->where('vendor_password',$data['vendor_old_password']);
        $query = $this->db->get();
        return $query->result_array();

    }

    function updatePassword($data,$vendorId){

        $this->db->where('vendor_id',$vendorId);
        $this->db->update($this->vendorTbl,array('vendor_password' => $data['vendor_new_password']));
        return $vendorId;
    }

    function updatePasswordFlag($vendorId,$flag,$password){

        $this->db->where('vendor_id',$vendorId);
        $this->db->update($this->vendorTbl,array('vendor_password_flag' => $flag,'vendor_update_password' => $password));
        return $vendorId;

    }

    function checkVendorPasswordResetAuth($vendorId){

        $this->db->select('vendor_id,vendor_update_password,vendor_password_flag');
        $this->db->from($this->vendorTbl);
        $this->db->where('vendor_id',$vendorId);
        $query = $this->db->get();
        return $query->result_array();

    }

    function updatePasswordFlagWithPassword($vendorId,$flag,$password){

        $this->db->where('vendor_id',$vendorId);
        $this->db->update($this->vendorTbl,array('vendor_password_flag' => $flag,'vendor_password' => $password));
        return $vendorId;

    }

    function updateSchoolStatusOmrReceiptInfo($data,$round,$vendorId){

        $this->db->select('omr_received');
        $this->db->from($this->schoolstatusTbl);
        $this->db->where('school_code',$data['B']);
        $this->db->where('test_edition',$round);
        $this->db->where('answers_date',date('Y-m-d',strtotime($data['F'])));
        $query = $this->db->get();
        $result = $query->result_array();    

        if(count($result) == 0){

            $this->db->select('omr_received');
            $this->db->from($this->schoolstatusTbl);
            $this->db->where('school_code',$data['B']);
            $this->db->where('test_edition',$round);
            
            $query = $this->db->get();
            $omrResult = $query->result_array();    
            
            if($omrResult[0]['omr_received'] != NULL){
                $initialOMRCount = $omrResult[0]['omr_received'];
                $totalOMRCount = $initialOMRCount + $data['J'];
            }
            else{
                $totalOMRCount = $data['J'];
            }


            $this->db->where('school_code',$data['B']);
            $this->db->where('test_edition',$round);
            $this->db->update($this->schoolstatusTbl,array('eng_test_date' => date('Y-m-d',strtotime($data['E'])),'answers_date' => date('Y-m-d',strtotime($data['F'])),'omr_received' => $totalOMRCount,'ans_sent_date' => date('Y-m-d',strtotime($data['G'])),'scan_party' => $vendorId));
            
            $update = $this->db->affected_rows();

            if($update > 0){

                $insertIntoOMRReceipt = $this->db->insert($this->omrReceiptReports,array('school_code' => $data['B'],'test_edition' => $round,'courier_details' => $data['C'],'total_packets' => $data['D'],'test_date' => date('Y-m-d',strtotime($data['E'])),'inward_date' => date('Y-m-d',strtotime($data['F'])),'scan_date' => date('Y-m-d',strtotime($data['G'])),'qc_done_date' => date('Y-m-d',strtotime($data['H'])),'data_to_ei_date' => date('Y-m-d',strtotime($data['I'])),'no_of_records' => $data['J'],'pod_no' => $data['K'],'remarks' => $data['L']));
                
                $insert_id = $this->db->insert_id();

                return $insert_id;

            }

        }
        else {
            return 0;
        }

        

    }

    function getTotalOrder($schoolCode,$round){
        
        $this->db->select('e3,m3,s3,h3,ss3,e4,m4,s4,h4,ss4,e5,m5,s5,h5,ss5,e6,m6,s6,h6,ss6,e7,m7,s7,h7,ss7,e8,m8,s8,h8,ss8,e9,m9,s9,h9,ss9,e10,m10,s10,h10,ss10,dynamic_class');
        $this->db->from($this->schoolstatusTbl);
        $this->db->where('school_code',$schoolCode);
        $this->db->where('test_edition',$round);
        $this->db->where('dynamic_flag',0);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $result = $query->result_array();
        
        if(count($result) > 0){
            
            return $this->filterClasses($result,$round,$schoolCode);

        }

    }

    function filterClasses($result,$round,$schoolCode){

         $classArray = array('3','4','5','6','7','8','9','10');
    
  
         $selectedFinalSchools = array();
     
  
         $selectedschool = array();
     
  
         if($result[0]['dynamic_class'] != "" && $result[0]['dynamic_class'] != NULL)
             
             {
                 $classes = explode(",",$result[0]['dynamic_class']);
                 $pnpclasses = array_diff($classArray,$classes);
                  
                    if(count($pnpclasses) > 0){
     
                     foreach ($pnpclasses as $key => $value) {
     
                         $this->db->select("e$value+m$value+s$value+h$value+ss$value as total",FALSE);
                         $this->db->from($this->schoolstatusTbl);
                         $this->db->where("school_code",$schoolCode);
                         $this->db->where("test_edition",$round);
                         $query = $this->db->get(); 
                         $schoolResult = $query->result_array();
                         $total[] = $schoolResult[0]['total'];
                         
                     }
                     
                     return array_sum($total);
                 }
    
             }
             else {
                  unset($result[0]['dynamic_class']);
                  
                  return array_sum($result[0]);
                  
             } 
     
              
     }

     function getOmrReceiptStatusList($round,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region');
        $this->db->select("DATE_FORMAT(t1.test_date,'%d-%m-%Y') as test_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.inward_date,'%d-%m-%Y') as inward_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.scan_date,'%d-%m-%Y') as scan_date",FALSE);
        $this->db->select("SUM(t1.no_of_records) as sum");

        $this->db->from("$this->omrReceiptReports as t1");
        $this->db->join("$this->schoolsTbl as t2","t1.school_code = t2.schoolno","LEFT");
        $this->db->join("$this->schoolstatusTbl as t3","t1.school_code = t3.school_code AND t3.test_edition = 'X'","LEFT");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        if($round != ""){
            $this->db->where('t1.test_edition',$round);
        }

        $this->db->group_by('t1.school_code');

        $query = $this->db->get();

        //echo $this->db->last_query();

        $results = $query->result_array();


        foreach ($results as $key => $result) {

            $schoolCode = $result['school_code'];
            $totalPapers = $this->filterOMRReceiptClasses($round,$schoolCode);
            $results[$key]['totalPapers'] = $totalPapers;
            $difference = $totalPapers - $result['sum'];    
            $results[$key]['difference'] = $difference;
            $percentage = round(($result['sum']/$totalPapers) * 100);
            $results[$key]['percentage'] = $percentage;

        }
        
        return $results;

         
     }

     function filterOMRReceiptClasses($round,$schoolCode){

         $classArray = array('3','4','5','6','7','8','9','10');
    
  
         $selectedFinalSchools = array();
     
  
         $selectedschool = array();

         $this->db->select("e3,m3,s3,h3,ss3,e4,m4,s4,h4,ss4,e5,m5,s5,h5,ss5,e6,m6,s6,h6,ss6,e7,m7,s7,h7,ss7,e8,m8,s8,h8,ss8,e9,m9,s9,h9,ss9,e10,m10,s10,h10,ss10,dynamic_class");
         $this->db->from($this->schoolstatusTbl);
         $this->db->where("school_code",$schoolCode);
         $this->db->where("test_edition",$round);
         $query = $this->db->get();
         $result = $query->result_array();
         
         if(count($result) > 0){ 

             if($result[0]['dynamic_class'] != "" && $result[0]['dynamic_class'] != NULL)
                 
                 {
                     $classes = explode(",",$result['dynamic_class']);
                     $pnpclasses = array_diff($classArray,$classes);
                      
                        if(count($pnpclasses) > 0){
         
                         foreach ($pnpclasses as $key => $value) {
         
                             $this->db->select("e$value+m$value+s$value+h$value+ss$value as total",FALSE);
                             $this->db->from($this->schoolstatusTbl);
                             $this->db->where("school_code",$schoolCode);
                             $this->db->where("test_edition",$round);
                             $query = $this->db->get(); 
                             $schoolResult = $query->result_array();
                             $total[] = $schoolResult[0]['total'];
                             
                         }
                         
                         return array_sum($total);
                     }
        
                 }
                 else {

                      unset($result[0]['dynamic_class']);
                      
                      return array_sum($result[0]);
                      
                 } 
        }
     
              
     }
    
    function getFilteredOmrReceiptStatusList($round,$zone,$region,$category,$username){

        $this->db->select('t1.school_code,t2.schoolname,t2.city,t2.region');
        $this->db->select("DATE_FORMAT(t1.test_date,'%d-%m-%Y') as test_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.inward_date,'%d-%m-%Y') as inward_date",FALSE);
        $this->db->select("DATE_FORMAT(t1.scan_date,'%d-%m-%Y') as scan_date",FALSE);
        $this->db->select("SUM(t1.no_of_records) as sum");

        $this->db->from("$this->omrReceiptReports as t1");
        $this->db->join("$this->schoolsTbl as t2","t1.school_code = t2.schoolno","LEFT");
        $this->db->join("$this->schoolstatusTbl as t3","t1.school_code = t3.school_code AND t3.test_edition = 'X'","LEFT");

        if($region != '' && $region != 'NULL'){

            $region = str_replace(',', "','", $region);

            $this->db->where("t2.region IN ('$region')");

        }

        if($category == 'RM' || $category == 'SRM' || $category == 'STL' || $category == 'EA'){
            $this->db->join("$this->salesAllotmentMasterTbl as t3", 't1.school_code = t3.schoolCode AND product = "asset"', 'JOIN');
            $this->db->where("(t3.keyAccount = '$username' OR t3.buddyAccount = '$username')");
        }

        if($round != ""){
            $this->db->where('t1.test_edition',$round);
        }

        if($zone != ""){
            $this->db->where('t2.region',$zone);
        }

        $this->db->group_by('t1.school_code');

        $query = $this->db->get();

        //echo $this->db->last_query();

        $results = $query->result_array();


        foreach ($results as $key => $result) {

            $schoolCode = $result['school_code'];
            $totalPapers = $this->filterOMRReceiptClasses($round,$schoolCode);
            $results[$key]['totalPapers'] = $totalPapers;
            $difference = $totalPapers - $result['sum'];    
            $results[$key]['difference'] = $difference;
            $percentage = round(($result['sum']/$totalPapers) * 100);
            $results[$key]['percentage'] = $percentage;

        }
        
        return $results;

    }

    function updateSchoolQCLot($schoolCode,$round,$vendor,$lotno){

        $this->db->where('school_code',$schoolCode);
        $this->db->where('test_edition',$round);
        $this->db->update($this->schoolProcessTracking,array('analysis_lotno' => $lotno,'analysis_vendorid' => $vendor,'analysis_sentdate' => date('Y-m-d')));

    }

    function checkLotNo($round){

        $this->db->select('lotno');
        $this->db->from($this->analysisLotListTbl);
        $this->db->where('test_edition',$round);
        $this->db->order_by('lotno','desc');

        
        $query = $this->db->get();

        return $query->result_array();

    }

    function insertAnalysisLotDetails($round,$vendor,$lotno,$file1,$file2,$lot_pendrive_sent_date){

        $this->db->insert($this->analysisLotListTbl,array('lotno' => $lotno,'test_edition' => $round,'vendor_id' => $vendor,'lot_sent_date' => date('Y-m-d'),'lot_pendrive_sent_date' =>  date('Y-m-d',strtotime($lot_pendrive_sent_date)),'lot_qc_file_path' => $file1,'lot_qc_html_file_path' => $file2,'lot_approve_status' => 0));
        
        $insert_id = $this->db->insert_id();

        return $insert_id;

    }

    function analysisVendorLotList($vendorId){

        $this->db->select('*');
        $this->db->from($this->analysisLotListTbl);
        $this->db->where('vendor_id',$vendorId);
        $this->db->order_by("lotno","desc");
        $query = $this->db->get();

        return $query->result_array();

    }

    function acknowledgeAnalysisLot($analysislotid,$printingDate,$kittingDate,$estimatedDisptachDate){

        $this->db->where("id",$analysislotid);
        
        $this->db->update($this->analysisLotListTbl,array('lot_acknowledge_date' => date('Y-m-d'),'lot_printing_date' => $printingDate,'lot_kittingpacking_date' => $kittingDate,'lot_expected_dispatch_date' => $estimatedDisptachDate,'lot_approve_status' => 1));
         
        return $analysislotid;
    
    }

    function analysisLotList(){

        $this->db->select('t1.*,t2.vendor_name');
        $this->db->from("$this->analysisLotListTbl as t1");
        $this->db->join("$this->vendorTbl as t2", 't1.vendor_id = t2.vendor_id',
            'LEFT');
        $this->db->order_by("t1.lotno","desc");

        $this->db->last_query();
        $query = $this->db->get();

        return $query->result_array();

    }

    function approveAnalysisLot($analysislotid,$status){

        

        if($status == 2){

            $this->db->where("id",$analysislotid);
            $this->db->update($this->analysisLotListTbl,array('lot_approve_status' => $status));

        }
        else if($status == 0){

            $this->db->where("id",$analysislotid);
            $this->db->update($this->analysisLotListTbl,array('lot_approve_status' => $status,'lot_acknowledge_date' => '0000-00-00','lot_printing_date' => '0000-00-00','lot_kittingpacking_date' => '0000-00-00','lot_expected_dispatch_date' => '0000-00-00'));            

        }
        
        return $analysislotid;
    
    }

}