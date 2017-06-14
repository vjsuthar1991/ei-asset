<?php
include_once dirname(__FILE__) . '/CryptoLib.php';
class eidaaccesstoken {
    
    var $connid;

    var $schoolcode;
    var $accesstoken;
    var $status;
    
    var $schoolaccesstokentable = 'da_schoolAuthenticationTokens';
    var $userAccessTokenTable = 'da_userAuthorizationTokens';
    
    var $secretKey = 'isnotsecure';
    
    public function __construct($connid) {
        $this->connid = $connid;
    }
    
    public function getWhitelistIpAddresses(){
        return array('127.0.0.1');
    }
    

    public function isVendorAPIKeyActive($api_key_obj){
        if(isset($api_key_obj['status']) && $api_key_obj['status'] === '1'){
            return true;
        }
        return false;
    }


    public function isVendorAuthorized($vendorAPIKeyObj, $studentID){
        $eidastudent = new clsdastudentmaster($this->connid);
        $student = $eidastudent->getActiveStudentDetails($studentID);       
        if($student && isset($vendorAPIKeyObj['schoolcode']) && $student['schoolCode'] == $vendorAPIKeyObj['schoolcode']){
            return true;
        }
        return false;
    }
    
    public function getVendorAPIKey($schoolcode = null, $vendor_api_key = null){
        if(!empty($schoolcode) || !empty($vendor_api_key)){
            $dbQueryObj = new dbquery(null, $this->connid);
            $accesstokenQuery = "SELECT * FROM $this->schoolaccesstokentable WHERE 1 = 1";
            if(!is_null($schoolcode)){
                $accesstokenQuery .= " AND schoolcode = '$schoolcode'";
            }
            if(!is_null($vendor_api_key)){
                $accesstokenQuery .= " AND authorization_token = '$vendor_api_key'";
            }
            $dbqry = $dbQueryObj->executequery($accesstokenQuery);
            $accessToken = $dbqry->getrowassocarray();
            return $accessToken;
        }
        return null;
    }
    
    public function addAccessToken($schoolcode, $accesstoken){
        $time = date('Y-m-d H:i:s');
        $dbQueryObj = new dbquery(null, $this->connid);
        $accesstokenQuery = "INSERT INTO $this->schoolaccesstokentable SET schoolcode = '$schoolcode', authorization_token = '$accesstoken', "
                    . " status = 1, updated_at = '$time', created_on = '$time'";
        $dbqry = $dbQueryObj->executequery($accesstokenQuery); 
        return $dbqry;
    }     
        
    public function generateUserAuthorizationToken($studentID, $expiryInMinutes, $user_category = null){
        include_once '';
        $date = new DateTime();
        $time = $date->format('Y-m-d H:i:s');
        $date->modify("+$expiryInMinutes minutes");
        $expiryTime =  $date->format('Y-m-d H:i:s');
        //$access_token =  bin2hex(openssl_random_pseudo_bytes(16));
        $access_token = CryptoLib::randomString(32);  
        $dbQueryObj = new dbquery(null, $this->connid);
        $accesstokenQuery = "INSERT INTO $this->userAccessTokenTable SET user_id = '$studentID', access_token = '$access_token', "
                    . " expires_at = '$expiryTime', issued_at = '$time', user_category = '$user_category'";
        $dbqry = $dbQueryObj->executequery($accesstokenQuery);
        if($dbqry->sqlresult === true){
            return array('access_token' => $access_token, 'expires_at' => $expiryTime);
        }
        return null;
    }
    
    public function getAuthorizationToken($token){
        if(empty($token)){
            return null;
        }
        $dbQueryObj = new dbquery(null, $this->connid);
        $accesstokenQuery = "SELECT * FROM $this->userAccessTokenTable WHERE 1 = 1";       
        $accesstokenQuery .= " AND access_token = '$token' ORDER BY expires_at DESC LIMIT 1";  
        $dbqry = $dbQueryObj->executequery($accesstokenQuery);
        $accessToken = $dbqry->getrowassocarray();
        return $accessToken;
    }
       
    public function isAccessTokenActive($access_token_obj){
        $d1 = new DateTime($access_token_obj['expires_at']);  
        $d2 = new DateTime();       
        return ($d2 <= $d1);
    }
}
