<?php
    class Phuongtien extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function insert_sp($data = null){
            return $this->db->insert('phuongtien',$data);
        }
    }
?>