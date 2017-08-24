<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escalationlogmodel extends CI_Model{
    function __construct() {
        $this->schoolstatusTbl = 'school_status';
        $this->schoolsTbl = 'schools';
        $this->escalationLogTbl = 'escalation_mail_log';
        
    }

    function getPreTestEscalationLogList($round){


        $this->db->select('t1.mail_to,t1.escalation_type,t1.priority_flag,t1.school_code,t1.test_edition');
        $this->db->select("DATE_FORMAT(t1.mail_sent_date,'%d-%c-%Y') as mail_sent_date",FALSE);
        $this->db->select('REPLACE(schoolname,"^","'."'".'") as schoolname',FALSE);
        $this->db->from("$this->escalationLogTbl as t1");
        $this->db->join("$this->schoolsTbl as t2","t1.school_code = t2.schoolno",'LEFT');
        $this->db->where('t1.test_edition',$round);
        $this->db->order_by("t1.escalation_id","desc");


        $query = $this->db->get();

        return $query->result();

    }

}