<?php
require_once dirname(__FILE__) . '/../classes/hsdbconnect.cls.php';
require_once dirname(__FILE__) . '/../classes/eihelper.cls.php';
define('MYSQL_CODE_DUPLICATE_KEY',1062);

/**
 * Description of eidaemailconfiguration
 *
 * @author hitesh
 */

class clsdaemailconfiguration {
    var $connid;
    var $emailConfiguration;
    static $emailConfigurationTable = 'da_emailConfigurations';
   
    public function __construct($connid) {  
        $this->connid = $connid;     
        $this->emailConfiguration = array();
    }
    
    public function setEmailConfiguration($config){
        foreach($config as &$c){
            $c = EIHelper::mysql_input_sanitize($c);
        }
        $this->emailConfiguration['email_title'] = $config['email_title'];
        $this->emailConfiguration['subject_line'] = $config['subject_line'];
        $this->emailConfiguration['primary_email_ids'] = $config['primary_email_ids'];
        $this->emailConfiguration['pre_email_content'] = $config['pre_email_content'];
        $this->emailConfiguration['post_email_content'] = $config['post_email_content'];
        $this->emailConfiguration['cc_email_ids'] = $config['cc_email_ids'];
        $this->emailConfiguration['bcc_email_ids'] = $config['bcc_email_ids'];
        $this->emailConfiguration['id'] = isset($config['id']) ? $config['id'] : null;
    }
    
    public function getConfigurations(){
        $table = self::$emailConfigurationTable;
        $emailConfigurationQuery  = "SELECT * FROM $table";
        $dbQueryObj = new dbquery(null, $this->connid);
        $dbqry = $dbQueryObj->executequery($emailConfigurationQuery);
        $configs = array();
        while($config = $dbqry->getrowassocarray()){
            $configs[] = $config;
        }
        return $configs;
    }
    
    public function getConfigurationById($id){
        $id = addslashes($id);
        $table = self::$emailConfigurationTable;
        $emailConfigurationQuery  = "SELECT * FROM $table WHERE id = '$id'";
        $dbQueryObj = new dbquery(null, $this->connid);
        $dbqry = $dbQueryObj->executequery($emailConfigurationQuery);        
        $config = $dbqry->getrowassocarray();        
        return $config;
    }
    
    public function addConfiguration(){
        $dbResponse = false;
        $table = self::$emailConfigurationTable;   
        $config = $this->emailConfiguration;
        if($this->validate($config) === true){
            $datetime = date('Y-m-d H:i:s');        
            $configurationIdentifier = preg_replace("![^a-z0-9]+!i", '-', strtolower($config['email_title']));
            $configurationIdentifier = trim($configurationIdentifier, '-');
            $addEmailConfigurationQuery  = "INSERT INTO $table SET email_title = '$config[email_title]', email_identifier = '$configurationIdentifier'"
                    . ", subject_line = '$config[subject_line]', pre_email_content = '$config[subject_line]'"
                    . ", post_email_content = '$config[post_email_content]', primary_email_ids = '$config[primary_email_ids]'"
                    . ", cc_email_ids = '$config[cc_email_ids]', bcc_email_ids = '$config[bcc_email_ids]',created_on = '$datetime', updated_on='$datetime'";
            $dbQueryObj = new dbquery(null, $this->connid);
            $dbqry = $dbQueryObj->executequery($addEmailConfigurationQuery);   
            if ($dbqry->errortext() == MYSQL_CODE_DUPLICATE_KEY) {                            
                throw new Exception('Configuration Already Exists!');
            }else{
                $dbResponse = $dbqry->insertid;
            }         
        }
        return $dbResponse;
    }
    
    public function validate($config){        
        if(empty($config['email_title']) || empty($config['subject_line']) || empty($config['primary_email_ids'])){
            throw new Exception("Missing required details");
        }       
        return true;
    }
    
    public function updateConfiguration(){
        $dbResponse = false;
        $table = self::$emailConfigurationTable;   
        $config = $this->emailConfiguration;
        error_log(json_encode($config));
        if($this->validate($config) === true){
            $configurationIdentifier = preg_replace("![^a-z0-9]+!i", "-", strtolower($config['email_title']));
            $datetime = date('Y-m-d H:i:s');
            $addEmailConfigurationQuery  = "UPDATE $table SET email_title = '$config[email_title]'"
                    . ", subject_line = '$config[subject_line]', pre_email_content = '$config[subject_line]'"
                    . ", post_email_content = '$config[post_email_content]', primary_email_ids = '$config[primary_email_ids]'"
                    . ", cc_email_ids = '$config[cc_email_ids]', bcc_email_ids = '$config[bcc_email_ids]', updated_on='$datetime'"
                    . " WHERE id = $config[id]";
            $dbQueryObj = new dbquery(null, $this->connid);
            $dbqry = $dbQueryObj->executequery($addEmailConfigurationQuery);   
            if ($dbqry->errortext() == MYSQL_CODE_DUPLICATE_KEY) {                            
                throw new Exception('Configuration Already Exists!');
            }else{
                $dbResponse = $dbqry->sqlresult;
            }  
        }
        return $dbResponse;
    }
    
    
    public function getConfigurationByIdentifier($emailIdentifier){
        $id = addslashes($id);
        $table = self::$emailConfigurationTable;
        $emailConfigurationQuery  = "SELECT * FROM $table WHERE email_identifier = '$emailIdentifier'";
        $dbQueryObj = new dbquery(null, $this->connid);
        $dbqry = $dbQueryObj->executequery($emailConfigurationQuery);        
        $config = $dbqry->getrowarray();        
        return $config;
    }
}
