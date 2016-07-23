<?php
    class Tintuc_model extends CI_Model{
        
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        
        function insert($data = null){
            return $this->db->insert('tintuc',$data);
        }
        
        /**
         * void lấy thông tin bài đăng limit
         * @param số record trong 1 trang 
         * @param vị trí trang cần lấy
         * @return info by id or bool
         * 
         * */
        function get_show($sotrang = null,$trangcanlay = null){
            $this->db->select();
            $this->db->order_by('ngaydang','DESC');
            $this->db->limit($sotrang,$trangcanlay);
            $query = $this->db->get('tintuc');
            return $query->result_array();
        }
        
        /**
         * void đếm số bài đăng trong database
         * @return số bài đăng
         * 
         * */
        function get_all_show(){
            $query = $this->db->get('tintuc');
            return $query->num_rows();
        }
        
        /**
         * void lấy thông tin bài đăng theo id
         * @param id bài đăng
         * @return info by id or bool
         * 
         * */
        function get_info_id($id){
            $this->db->where(array('id' => $id));
            $query = $this->db->get('tintuc');
            if($query->num_rows() != 1){
                return false;
            }
            else{
                return $query->row_array(0);
            }
        }
        
        function delete_by_id($id){
            $this->db->where(array('id' => $id));
            return $this->db->delete('tintuc');
        }
        
        /**
         * void update thông tin bài đăng theo id
         * @param id bài đăng
         * 
         * */
        function update_info($id,$data){
            $this->db->where(array('id' => $id));
            return $this->db->update('tintuc',$data);
        }
    }
?>