<?php

/**
 * Description of eihelper
 *
 * @author hitesh
 */
class EIHelper {
    
    /** Function getYears
     * Simply returns an associative array of years, can be used by UI to populate year dropdown.
     * @param (string) ($till) Maximum year for the range. e.g. 2015
     * @param (string) ($from) Minimum year for the range. default 2010
     */
    
    public static function getYears($till = null, $from = 2010) {
        if($till === null){
            $till = date('Y');
        }
        return array_combine(range($till, $from), range($till, $from));
    }
    
    /**
    * Pluralizes a word if quantity is not one.
    *
    * @param int $quantity Number of items
    * @param string $singular Singular form of word
    * @param string $plural Plural form of word; function will attempt to deduce plural form from singular if not provided
    * @return string Pluralized word if quantity is not one, otherwise singular
    */
    public static function pluralize($quantity, $singular, $plural=null) {
        if($quantity==1 || empty($singular)) return $singular;
        if($plural!==null) return $plural;

        $last_letter = strtolower($singular[strlen($singular)-1]);
        switch($last_letter) {
            case 'y':{
                if($singular[strlen($singular)-2] === 'a'){
                    return $singular.'s';
                }
                return substr($singular,0,-1).'ies';
            }
            case 's':
                return $singular.'es';
            default:
                return $singular.'s';
        }
    }

	
    public static function formatDBDateToUIDate($date, $dbFormat = 'Y-m-d', $uiFormat = 'd-M-y'){
        $dataBaseDate = DateTime::createFromFormat($dbFormat, $date);
        if($dataBaseDate){
            return $dataBaseDate->format($uiFormat);
        }else{
            return '';
        }
    }
	
    public static function template($file, $data) {
        ob_start();
    	if(count($data) > 0) { extract($data); }
    	$filePath = $file;
    	if (is_file($filePath)){
       		include $filePath;
        }else{
	        echo "Could not load template $filePath";
    	}
    	return ob_get_clean();
    }
    
    public static function groupEntities($records,$group_by,$displayField = null){        
        $groupedEntities = array();
        foreach($records as $record){
            if(isset($record[$group_by])){
                if(isset($groupedEntities[$record[$group_by]])){            
                    array_push($groupedEntities[$record[$group_by]]['records'],$record);
                    $groupedEntities[$record[$group_by]]['count'] = sizeof($groupedEntities[$record[$group_by]]['records']);
                }else{
                    $header = $record[$group_by];
                    if(isset($record[$displayField])){
                        $header = $record[$displayField];
                    }
                    $groupedEntities[$record[$group_by]] = array('records' => array($record), 'header' => $header ,'count' => 1);
                }
            }else{
                if(isset($groupedEntities['_none'])){
                    array_push($groupedEntities['_none']['records'], $record);                
                }else{
                    $groupedEntities['_none'] = array('records' => array($record), 'header' => 'none', 'count' => 1);
                }
            }                                                            
        }
        return $groupedEntities;
    }
    
    public static function csv_to_array($filename='', $delimiter=','){
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;

        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(empty($row[0])){
                    continue;
                }
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
    
    public static function base64_url_decode($input) {
        return base64_decode(strtr($input, '-_,', '+/='));
    }
    
    public static function base64_url_encode($input) {
        return strtr(base64_encode($input), '+/=', '-_,');
    }
    
    public static function mysql_input_sanitize($input) {
        if (is_array($input)) {
            foreach($input as $var=>$val) {
                $output[$var] = self::sanitize($val);
            }
        }
        else {
            if (get_magic_quotes_gpc()) {
                $input = stripslashes($input);
            }
            $input  = self::cleanInput($input);
            $output = mysql_real_escape_string($input);
        }
        return $output;
    }
    private static function cleanInput($input) {
        $search = array(
          '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
          '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
          '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
        );
        $output = preg_replace($search, '', $input);
        return $output;
    }

}
