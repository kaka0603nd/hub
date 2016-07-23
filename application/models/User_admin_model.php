<?php
    class User_admin_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function get_user($recond,$start){
            $this->db->select();
            $this->db->limit($recond,$start);
            $this->db->order_by('id','DESC');
            $this->db->get('user_admin');
        }
        
        
        
    }
?>