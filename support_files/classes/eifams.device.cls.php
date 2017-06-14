<?php

/**
 * Description of Device
 *
 * @author hitesh
 */
class Device {

  private $clspaging;
  private $assetid;
  
  public function setClspaging($clspaging) {
    $this->clspaging = $clspaging;
  }
 
  
  public function getDeviceCodes() {
    $result1 = $this->getDevices($arrAdmin);
    while ($row1 = mysql_fetch_array($result1)) {
      $codestr.="'" . $row1["code"] . "',";
    }
    $this->setEntity_string($codestr);
    return $this->truncateTrailingCharacter();
  }

  public function getAssets($fields = array('assetid')){
    $projection = implode(',', $fields);
    $query = "SELECT $projection from fams_asset_master";
    $result = mysql_query($query);
    return $result;
  }
  
  public function getDevices($fields=array('code')) {
    $projection = implode(', ', $fields);
    $query = "SELECT $projection FROM fams_asset_posession_status,fams_asset_master WHERE fams_asset_posession_status.assetid = fams_asset_master.assetid ";    
    try{
      $result = mysql_query($query);
    }catch(Exception $e){
      error_log($e->getMessage());
    }
    return $result;
  }

  public function getAssetid() {
    return $this->assetid;
  }

  public function setAssetid($assetid) {
    $this->assetid = $assetid;
  }
  
  
  public function allot($asset, $operation, $arrEmpList){    
      $location = getLocation($this->assetid);
      $logresult = showAssetStatusLog($this->assetid); 
      while ($record = mysql_fetch_assoc($logresult)) {
        $log_results[] = $record;
      } 
      try {
         $loader = new Twig_Loader_Filesystem('templates/twig/dts');
         $twig = new Twig_Environment($loader);
         $template = $twig->loadTemplate('action_allotment_custody.html.twig');
         echo $template->render(array(         
             'row' => $asset,
             'arrEmpList' => $arrEmpList,
             'location' => $location,
             'log_results' => $log_results,
             'operation' => $operation
         ));
       } catch (Exception $e) {
         //error_log($e->getMessage());
         die('ERROR: ' . $e->getMessage());
       }       
    
  }
  
  public function markAsDamaged($asset,$arrUserDeptartment){      
    $logresult = showAssetStatusLog($this->assetid); 
    while ($record = mysql_fetch_assoc($logresult)) {
      $log_results[] = $record;
    } 
    $location = getLocation($this->assetid);

    try {
      $loader = new Twig_Loader_Filesystem('templates/twig/dts');
      $twig = new Twig_Environment($loader);
      $template = $twig->loadTemplate('action_mark_as_damaged.html.twig');
      echo $template->render(array(         
          'row' => $asset,
          'arrUserDeptartment' => $arrUserDeptartment,
          'location' => $location,
          'log_results' => $log_results,
          'assetid' => $this->assetid
      ));
    } catch (Exception $e) {
      //error_log($e->getMessage());
      die('ERROR: ' . $e->getMessage());
    }            
  }

  public function upgradeConfiguration() {
    $resultbrand = getUniqueConfigurationDetails("brand");
    $result_processor = getUniqueConfigurationDetails("cpu_processor");

    $brands = array();
    $processors = array();
    while ($record = mysql_fetch_assoc($resultbrand)) {
      $brands[] = $record;
    }
    while ($record = mysql_fetch_assoc($result_processor)) {
      $processors[] = $record;
    }
    $result_memorytype = getUniqueConfigurationDetails("memory_type");
    while ($record = mysql_fetch_assoc($result_memorytype)) {
      $memory_types[] = $record;
    }
    $result_harddisktype = getUniqueConfigurationDetails("hdd_type");
    while ($record = mysql_fetch_assoc($result_harddisktype)) {
      $hdd_types[] = $record;
    }
    $logresult = showAssetStatusLog($this->assetid);
    while ($record = mysql_fetch_assoc($logresult)) {
      $log_results[] = $record;
    }

    try {
      $loader = new Twig_Loader_Filesystem('templates/twig/dts');
      $twig = new Twig_Environment($loader);
      $template = $twig->loadTemplate('action_upgrade_config.twig');
      echo $template->render(array(
          'brands' => $brands,
          'processors' => $processors,
          'memory_types' => $memory_types,
          'hdd_types' => $hdd_types,
          'row' => $row,
          'hidmode' => $_POST['hidmode'],
          'log_results' => $log_results,
          'assetid' => $this->assetid
      ));
    } catch (Exception $e) {
      //error_log($e->getMessage());
      die('ERROR: ' . $e->getMessage());
    }
    /* $location = getLocation($assetID);
      $readonly='';
      if ($_SESSION['username']=='jaikishan.keswani')
      $readonly='readonly'; */
  }

  public function searchAllotedDevices($formAttributes) {
    if (isset($formAttributes["txtSchoolCode"]) && $formAttributes["txtSchoolCode"] != "") {
      $schoolCode = explode("~", $formAttributes["txtSchoolCode"]);
    }
    $query = "SELECT a.*,code,d.description,IF(b.category != 'DA','MS','DA') as product,    
      serialno,IF(insured_till_date > CURDATE(),DATE_FORMAT(insured_till_date,'%d-%m-%Y'),0) 
      as insurance_status,e.modelno, e.brand as brand FROM fams_asset_posession_status a
			INNER JOIN fams_asset_master b ON a.assetid = b.assetid                        
                        LEFT JOIN emp_master c ON a.posession = c.userID AND c.userID NOT IN (select userID from old_emp_master)
                        LEFT JOIN old_emp_master on a.posession = old_emp_master.userID AND old_emp_master.userID not IN (select userID from emp_master)
			INNER JOIN fams_asset_type d ON b.typeid = d.typeid
			LEFT JOIN fams_system_list e ON a.assetid = e.assetid 
			WHERE lost_deactive = '0' ";

    if (isset($formAttributes["txtLabelSearch"]) && $formAttributes["txtLabelSearch"] != "") {
      $query.=" AND code IN ('" . $formAttributes['txtLabelSearch'] . "') ";
    }
    if(isset($formAttributes['assetID']) && $formAttributes['assetID'] != ''){
      $query.= ' AND b.assetid = \'' . $formAttributes['assetID'] . '\'';
    }    
    
    if(isset($formAttributes['brandName']) && $formAttributes['brandName'] != ''){
      $query.=  ' AND e.brand = \'' . $formAttributes['brandName'] . '\'';
    }  
    
    if(isset($formAttributes['priceFrom']) && $formAttributes['priceFrom'] != ''){
      $query.=  ' AND b.cost > ' . $formAttributes['priceFrom'] ;
    }    
    if(isset($formAttributes['purchasedFrom']) && $formAttributes['purchasedFrom'] != ''){           
      $mySqlDate = date_format(date_create_from_format('d-m-Y', $formAttributes['purchasedFrom']), 'Y-m-d');     
      $query.=  ' AND b.purchasedate > \'' . $mySqlDate . '\'';
    }  
    
    if(isset($formAttributes['purchasedTill']) && $formAttributes['purchasedTill'] != ''){
      $mySqlDate = date_format(date_create_from_format('d-m-Y', $formAttributes['purchasedTill']), 'Y-m-d');           
      $query.=  ' AND b.purchasedate < \'' . $mySqlDate . '\'';
    }
    
    if(isset($formAttributes['allotedBy']) && $formAttributes['allotedBy'] != ''){
      preg_match("/\((.*?)\)/", $formAttributes['allotedBy'],$matches);      
      $query.= ' AND a.updated_by = \'' . $matches[1] . '\'';
    }
    
    if (isset($formAttributes['setStatus']) && $formAttributes['setStatus'] != "") {
      if ($formAttributes['setStatus'] == "withSchool") {
        $query.=" AND a.schoolCode > 0 ";
      } else if ($formAttributes['setStatus'] == "showDecline") {
        $query.=" AND a.decline_status = 1 ";
      } else {
        $query.=" AND status = '" . $formAttributes['setStatus'] . "' ";
      }
    }
    if (isset($formAttributes["lstModelNo"]) && $formAttributes["lstModelNo"] != "")
      $query.=" AND e.modelno = '" . $formAttributes["lstModelNo"] . "' ";
    if (isset($schoolCode) && count($schoolCode) > 0)
      $query.=" AND a.schoolCode = '" . $schoolCode[1] . "' ";
    if (isset($formAttributes["txtEmployeeUserId"]) && $formAttributes["txtEmployeeUserId"] != "") {
      $strUserID = explode("(", $formAttributes["txtEmployeeUserId"]);
      $arrUserID = explode(")", $strUserID[1]);
      $posession = $arrUserID[0];
      $query.=" AND a.posession = '" . $posession . "' ";
    }
    if (isset($formAttributes["txtAssetType"]) && $formAttributes["txtAssetType"] != "") {
      $query.=" AND b.typeid = '" . $formAttributes["txtAssetType"] . "' ";
    }

    if ($formAttributes["chkInsured"] == 1) {
      $query.=" AND insured_till_date >= CURDATE() ";
    }else if(isset($formAttributes['insuredTill']) && $formAttributes['insuredTill'] != ''){
      $mySqlDate = date_format(date_create_from_format('d-m-Y', $formAttributes['insuredTill']), 'Y-m-d');     
      $query.= ' AND insured_till_date < \'' . $mySqlDate . '\''; 
    }
    
    if(isset($formAttributes['serialNumber']) && trim($formAttributes['serialNumber'] != '')){
      $query.= ' AND b.serialno LIKE\'%'.$formAttributes['serialNumber'] . '%\'' ;
    }
       
    if (isset($formAttributes["txtCategory"]) && $formAttributes["txtCategory"] != "") {
      if ($formAttributes["txtCategory"] == "MS")
        $query.=" AND category != 'DA' ";
      else
        $query.=" AND category = '" . $formAttributes["txtCategory"] . "' ";
    }
    if (isset($formAttributes["txtLocation"]) && $formAttributes["txtLocation"] != "")
      $query.=" AND (a.location = '" . $formAttributes["txtLocation"] . "' OR old_emp_master.location = '" . $formAttributes['txtLocation'] . "'  OR  c.location = '" . $formAttributes["txtLocation"] . "') ";
    if (isset($formAttributes["txtVendorId"]) && $formAttributes["txtVendorId"]) {
      $vendorID = explode("~", $formAttributes["txtVendorId"]);
      if (is_array($vendorID) && count($vendorID) > 0)
        $query.=" AND a.vendorId = '  " . $vendorID[1] . "' ";
    }
    $result = mysql_query($query) or die(mysql_error());
    $this->clspaging->numofrecs = mysql_num_rows($result);
    if ($this->clspaging->numofrecs > 0) {
      $this->clspaging->getcurrpagevardb();
    }
    $query .= " ORDER BY assetid DESC " . $this->clspaging->limit;

    $result = mysql_query($query) or die(mysql_error());
    $alloted_devices = null;
    while ($row = mysql_fetch_assoc($result)) {
      $alloted_devices[] = $row;
    }
    return $alloted_devices;
  }

}
