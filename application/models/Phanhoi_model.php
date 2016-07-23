<?php
    class Phanhoi_model extends CI_Model{
        public $tinhthanh;
        
        function __construct(){
            parent::__construct();
            $this->load->database();
            $this->tinhthanh = $this->session->has_userdata('tinhthanh')?$this->session->userdata('tinhthanh'):'';
        }
        
        function count_not_duyet(){
            $this->db->select();
            $this->db->where('trangthai','3');
            $query = $this->db->get('phanhoi');
            return $query->num_rows();
        }
        
        function get_ph(){
            $this->db->select();
            $this->db->where('trangthai','3');
            $query = $this->db->get('phanhoi');
            return $query->result_array();
        }
        
        function get_one($id){
            $this->db->select();
            $this->db->where('id',$id);
            $query = $this->db->get('phanhoi');
            return $query->row_array(0);
        }
        
        function insert($data){
            return $this->db->insert('phanhoi',$data);
        }
    }
?>