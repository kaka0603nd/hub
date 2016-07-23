<?php
    class Danhmuc_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        function insert_danhmuc($data = null){
            //$this->db->insert('');
        }
        function get_danhmuc(){
            $this->db->select();
            return $this->db->get('danhmuc')->result_array();
        }
        
        function get_danhmuc_id($danhmuc_id){
            $this->db->select('danhmuc.danhmuc_sanpham as danhmuc_sanpham');
            $this->db->where('danhmuc.id',$danhmuc_id);
            $result = $this->db->get('danhmuc');
            $data = $result->row_array(0);
            return $data['danhmuc_sanpham'];
        }
        
        function update_danhmuc($id,$table,$data){
            $this->db->where('id',$id);
            return $this->db->update($table,$data);
        }
    }
?>