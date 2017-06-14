<?php

class Helper {

    private $entity_string;

    /** Function truncateTrailingCharacter
     * simply truncates the last x character from a given string.
     */
    public static function truncateTrailingCharacter($c = -1) {
        return $this->entity_string = substr($this->entity_string, 0, $c);
    }

    /** Function formatUIDateToDBDate
     * formats the given date to database date format, usually `Y-m-d`
     * @param (string) ($date) a date string.
     * @param (string) ($format) optional format, if the date is in other format.
     * @return (date) returns formatted date or null.
     * 
     * Refer: http://php.net/manual/en/datetime.formats.date.php
     */
    
    public static function formatUIDateToDBDate($date, $format = 'd-m-Y') {
        $dataBaseDate = DateTime::createFromFormat($format, $date);
        if ($dataBaseDate)
            return $dataBaseDate->format('Y-m-d');
        return null;
    }

    public static function formatDBDateToUIDate($date) {
        $dataBaseDate = DateTime::createFromFormat('Y-m-d', $date);
        if ($dataBaseDate)
            return $dataBaseDate->format('d-m-Y');
        return null;
    }

    /** Function getYears
     * Simply returns an associative array of years, can be used by UI to populate year dropdown.
     * @param (string) ($till) Maximum year for the range. e.g. 2015
     */
    
    public function getYears($till, $from = 2010) {
        return array_combine(range($till, $from), range($till, $from));
    }

    /** Function getCalendarMonths
     * Simply returns an associative array of months, can be used by UI to populate month dropdown.
     * @return array of months. @example array(1 => 'January', 2 => 'Febuary') 
     */
    
    public static function getCalendarMonths() {
        $months = array();
        for ($i = 0; $i < 12; $i++) {
            $timestamp = mktime(0, 0, 0, date('n') - $i, 1);
            $months[date('n', $timestamp)] = date('F', $timestamp);
        }
        ksort($months);
        return $months;
    }

    /** Function getWorkingDays
     * returns the number of working days, excludes all sundays for the given month
     * @param (number) $month month number. e.g. 1,2..
     * @param (number) $year year. e.g. 2015
     * @return (number) Number of days(excluding sundays).
     * 
     */
    
    public static function getWorkingDays($month, $year) {
        $month = $month;
        $sundaysCnt = 0;
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($i = 1; $i <= $daysInMonth; $i++) {
            $current_time = mktime(0, 0, 0, $month, $i, $year);
            if (date("D", $current_time) == "Sun")
                $sundaysCnt++;
        }
        return $daysInMonth - $sundaysCnt;
    }

    
    public static function getSubjects(){
        return array('1' => 'English', '2' => 'Maths', '3' => 'Science');
    }
    
    /** Function joinObjectToString
     * fetches data from mysql result object and formats them by seperating the fields by `~`.
     * UI specific function can be used by auto populate actb fields.
     * @param (result) mysql result
     * @param (array) $fields array of field names to be considered in output.
     * @return (string) rows seperated by commas. @example 1~abc,2~xyz
     * 
     */
    
    public static function joinObjectToString($mysql_result, $fields = array()) {

        $counter = 0;
        $joined_result = '';
        if (is_resource($mysql_result)) {
            $count = mysql_num_rows($mysql_result);
            while ($row = mysql_fetch_array($mysql_result)) {
                $joined_result .= "'" . addslashes($row[$fields[0]]);
                if (isset($fields[1])) {
                    $joined_result .= "~" . $row[$fields[1]];
                }
                $joined_result.="'";
                if ($counter < $count) {
                    $joined_result.=",";
                }
                $counter += 1;
            }
            $joined_result = substr($joined_result, 0, -1);
            return $joined_result;
        } else {
            return '';
        }
    }

}

?>