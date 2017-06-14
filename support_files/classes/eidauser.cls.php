<?php

/**
 * Description of eidausermaster
 *
 * @author hitesh
 */

class EIDAUser {
   
    var $userid;
	var $connid;
    public function __construct($connid) {
        $this->connid = $connid; // Connection
    }
    
    public function setUserId($userid){
        $this->userid = $userid;
    }
    
    /** Function getUserDetails
    * 
    * Returns user details for a given da user ID.
    * @param ($userid) if empty or 0 function would return with false.
    * @return (array) user details.  
    *
    */
    
    function getUserDetails(){
        if(empty($this->userid)){
            return null;
        }        
        $userDetailsQuery = "SELECT * FROM da_userMaster WHERE da_userMaster.username = '$this->userid'";       
        $dbqry = new dbquery($userDetailsQuery, $this->connid);
        $user = $dbqry->getrowassocarray();
        return $user;
    }
    
}
