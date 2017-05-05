<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Users extends CI_Model{
    function __construct() {
        $this->userTbl = 'users';
    }
    /*
     * get rows from the users table
     */
    function getRows($params = array()){
        $this->db->select('*');
        $this->db->from($this->userTbl);
        $this->db->order_by("user_id","desc");
        $query = $this->db->get(); 
        return $query->result();
    }
    
    /*
     * Insert user information
     */
    public function insert($data = array()) {
        //add created and modified data if not included
        // if(!array_key_exists("created", $data)){
        //     $data['created'] = date("Y-m-d H:i:s");
        // }
        // if(!array_key_exists("modified", $data)){
        //     $data['modified'] = date("Y-m-d H:i:s");
        // }
        
        //insert user data to users table
        $insert = $this->db->insert($this->userTbl, $data);
        
        //return the status
        if($insert){
            return $this->db->insert_id();;
        }else{
            return false;
        }
    }

    public function get_row($params = array()){


        $this->db->select('*');
        $this->db->from($this->userTbl);
        $this->db->where('user_id',$params);
        $query = $this->db->get();
        return $query->result();
    }

    public function update($data = array()){
        
        $this->db->where('user_id', $data['user_id']);
        $this->db->update($this->userTbl,array('user_name' => $data['user_name']));
        
        return $data['user_id'];
        // if($update){
        //     return $data['user_id'];
        // }
        // else {
        //     return false;
        // }
       
    }

}