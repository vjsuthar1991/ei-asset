<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vendors extends CI_Model{
    function __construct() {
        
        $this->vendorTbl = 'vendors';
        $this->schoolsTbl = 'schools';
        $this->vendorAccessTbl = 'vendor_access';
        $this->packingslipsListTbl = 'packing_slips';
        $this->testEditionTbl = 'test_edition_details';
        $this->courierCompany = 'courier';
        $this->schoolProcessTracking = 'school_process_tracking';
        $this->courierDispatchDetails = 'courier_dispatch_details';
    }

    /*
     * get rows from the schools_status table
     */
    function getZones($params = array()){
        $this->db->distinct();
        $this->db->select('region');
        $this->db->from($this->schoolsTbl);
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
        $this->db->update($this->vendorTbl,array('vendor_name' => $data['vendor_name'],'vendor_address' => $data['vendor_address'],'vendor_zone' => $data['vendor_zone'],'vendor_username' => $data['vendor_username'],'vendor_password' => $data['vendor_password'],'vendor_phone' => $data['vendor_phone'],'vendor_contact_person_1_name' => $data['vendor_contact_person_1_name'],'vendor_contact_person_1_email' => $data['vendor_contact_person_1_email'],'vendor_contact_person_1_contactno' => $data['vendor_contact_person_1_contactno'],'vendor_coo_name' => $data['vendor_coo_name'],'vendor_coo_email' => $data['vendor_coo_email'],'vendor_coo_contactno' => $data['vendor_coo_contactno'],'vendor_ceo_name' => $data['vendor_ceo_name'],'vendor_ceo_email' => $data['vendor_ceo_email'],'vendor_ceo_contactno' => $data['vendor_ceo_contactno']));
        
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
        $this->db->where('vendor_password',$vendorpassword);
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

                $this->db->update($this->schoolProcessTracking,array('qb_despatch_date' => date('Y-m-d',strtotime($despatchDate)),'qb_delivery_status' => $despatchStatus,'qb_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'qb_reciever_name' => $recieverName));
                
                return 1;        
            }
            else {
                if($check[0]->qb_delivery_date == '0000-00-00'){

                    $this->db->where("school_code",$schoolCode);
                    $this->db->where("test_edition",$edition[0]->test_edition);
                    
                    $this->db->update($this->schoolProcessTracking,array('qb_delivery_status' => $despatchStatus,'qb_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'qb_reciever_name' => $recieverName));
                
                    return false;
                }
            }
            
            
            $this->db->select('srno');
            $this->db->from($this->courierDispatchDetails);
            $this->db->where('schoolCode',$schoolCode);
            $this->db->where('test_edition',$edition[0]->test_edition);
            $query = $this->db->get();
            $check2 = $query->result();

            
            if(count($check2) == 0){

                $this->db->insert($this->courierDispatchDetails,array('department' => 'Logistics','subCategory' => 'QB Dispatch','courierTo' => 'School','courier' => $courierCompany,'mode' => $mode,'dispatchDate' => date('Y-m-d',strtotime($despatchDate)),'material' => $material,'weight' => $weight,'partyName' => $schoolName,'schoolCode' => $schoolCode,'test_edition' => $edition[0]->test_edition,'city' => $city,'contactNo' => $contactNo,'consignmentNo' => $consignmentNumber,'comment' => $remark,'addedDate' => date('Y-m-d'),'addedBy' => 'Vendor'));
             
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

            $this->db->where("school_code",$schoolCode);
            $this->db->where("test_edition",$edition[0]->test_edition);

            if($check[0]->analysis_despatch_date == "0000-00-00"){

                $this->db->update($this->schoolProcessTracking,array('analysis_despatch_date' => date('Y-m-d',strtotime($despatchDate)),'analysis_delivery_status' => $despatchStatus,'analysis_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'analysis_reciever_name' => $recieverName));
            
                return 1;
            }

            else {
                if($check[0]->analysis_delivery_date == '0000-00-00'){

                    $this->db->update($this->schoolProcessTracking,array('analysis_delivery_status' => $despatchStatus,'analysis_delivery_date' => date('Y-m-d',strtotime($deliveryDate)),'analysis_reciever_name' => $recieverName));    
                    return false;
                }
            }

            $this->db->select('srno');
            $this->db->from($this->courierDispatchDetails);
            $this->db->where('schoolCode',$schoolCode);
            $this->db->where('test_edition',$edition[0]->test_edition);
            $query = $this->db->get();
            $check = $query->result();

            if(count($check) == 0){

                $this->db->insert($this->courierDispatchDetails,array('department' => 'Logistics','subCategory' => 'Analysis Dispatch','courierTo' => 'School','courier' => $courierCompany,'mode' => $mode,'dispatchDate' => date('Y-m-d',strtotime($despatchDate)),'material' => $material,'weight' => $weight,'partyName' => $schoolName,'schoolCode' => $schoolCode,'test_edition' => $edition[0]->test_edition,'city' => $city,'contactNo' => $contactNo,'consignmentNo' => $consignmentNumber,'comment' => $remark,'addedDate' => date('Y-m-d'),'addedBy' => 'Vendor'));

            }
        }
        
    }

    
}