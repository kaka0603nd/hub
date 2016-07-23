<?php
    class User_model extends CI_Model{
        function __construct(){
            parent::__construct();
            $this->load->database();
        }
        
        //public $name_email = array('name','email');
        function check_user($name_email){
            if(is_array($name_email)){
                if(isset($name_email['name'])){
                    $this->db->where('name',$name_email['name']);
                    $query = $this->db->get('user');
                    $user_name = $query->num_rows()>0?true:false;
                    if($user_name){
                        return true;
                    }
                    $this->db->where('name',$name_email['name']);
                    $query = $this->db->get('store');
                    $store_name = $query->num_rows()>0?true:false;
                    
                    if($store_name){
                        return true;
                    }
                }
                if(isset($name_email['email'])){
                    $this->db->where('email',$name_email['email']);
                    $query = $this->db->get('user');
                    $user_email = $query->num_rows()>0?true:false;
                    if($user_email){
                        return true;
                    }
                    $this->db->where('email',$name_email['email']);
                    $query = $this->db->get('store');
                    $store_email = $query->num_rows()>0?true:false;
                    if($store_email){
                        return true;
                    }
                    
                }
                
            }
            
        }
        
        function check_user_change($name_email =null,$id = null){
            if(is_array($name_email)){                
                if(isset($name_email['name'])){
                    $this->db->where('name',$name_email['name']);
                    $this->db->where('id !=',$id);
                    $query = $this->db->get('user');
                    $user_name = $query->num_rows()>0?true:false;
                    if($user_name){
                        return true;
                    }
                    $this->db->where('name',$name_email['name']);
                    $this->db->where('id !=',$id);
                    $query = $this->db->get('store');
                    $store_name = $query->num_rows()>0?true:false;
                    
                    if($store_name){
                        return true;
                    }
                }
                if(isset($name_email['email'])){
                    $this->db->where('email',$name_email['email']);
                    $this->db->where('id !=',$id);
                    $query = $this->db->get('user');
                    $user_email = $query->num_rows()>0?true:false;
                    if($user_email){
                        return true;
                    }
                    $this->db->where('email',$name_email['email']);
                    $this->db->where('id !=',$id);
                    $query = $this->db->get('store');
                    $store_email = $query->num_rows()>0?true:false;
                    if($store_email){
                        return true;
                    }
                    
                }
            }
        }
        
        function insert_user($data){
            return $this->db->insert('user',$data);
        }
        
        function update_user($user_id,$data){
            $this->db->where('id',$user_id);
            return $this->db->update('user',$data);
        }
        
        function check_dangnhap($name_email){
            if(is_array($name_email)){
                if(isset($name_email['name'])){
                    $sql = "select * from user where name = '".$name_email['name']."' and password = '".$name_email['passwd']."'";
                    $query = $this->db->query($sql);
                    //var_dump($query->result_array());
                    return $query->num_rows()>0?true:false;
                }
                if(isset($name_email['email'])){
                    $sql = "select * from user where email = '".$name_email['email']."' and password = '".$name_email['passwd']."'";
                    $query = $this->db->query($sql);
                    //var_dump($query->result_array());
                    return $query->num_rows()>0?true:false;
                }
            }
        }
        
        public function thongke_thang($time){
            $sql = "select * from user where created_at like '%".$time."%'";
            $query = $this->db->query($sql);
            $result = $query->num_rows();
            return $result;
        }
        
        function user_get_by_email($email){
            $this->db->select("user.*");
            $this->db->where('hack_email',$email);
            $query = $this->db->get('user');
            $result = $query->row_array(0);
            return $result;
        }
        
        /**
         * 
         * function get user by CI
         * @param recond 
         * @param id get
         * return array
         * 
         * */
         function get_user($recond,$start){
            $this->db->select();
            $this->db->limit($recond,$start);
            $this->db->order_by('id','DESC');
            $query = $this->db->get('user');
            return $query->result_array();
        }
        
        function get_total_user(){
            $this->db->select();
            $query = $this->db->get('user');
            return $query->num_rows();
        }
        
        function get_user_id($id){
            $this->db->where('id',$id);
            return $this->db->get('user')->row_array(0);
        }
        
        
        
        function user_sanpham($user_id){
            $this->db->select('sanpham.*');
            $this->db->where('user_sanpham.user_id',$user_id);
            $this->db->where('user_sanpham.type','user');
            $this->db->from('user_sanpham');
            $this->db->join('user','user.id = user_sanpham.user_id');
            $this->db->join('sanpham','sanpham.id = user_sanpham.sanpham_id');
            $query = $this->db->get()->result_array();
            $result_danhmuc = array();
            $i =0;
            foreach($query as $row){
                $result_danhmuc[$i]= $this->get_sanpham_danhmuc($row['id']);
                $i++;
                //echo $row['id'];
            }
            return array('sanpham'=>$query,'danhmuc' =>$result_danhmuc);
        }
        
        function count_user_sp($user_id){
            $this->db->select('sanpham.*');
            $this->db->where('user_sanpham.user_id',$user_id);
            $this->db->where('user_sanpham.type','user');
            $this->db->from('user_sanpham');
            $this->db->join('user','user.id = user_sanpham.user_id');
            $this->db->join('sanpham','sanpham.id = user_sanpham.sanpham_id');
            return $query = $this->db->get()->num_rows();
        }
        
        function get_sanpham_danhmuc($sanpham_id){
            $this->load->model('Sanpham_model');
            return $this->Sanpham_model->get_name_danhmuc($sanpham_id);
        }
        
        function set_trangthai($user_id,$trangthai){
            $this->db->where('id',$user_id);
            return $this->db->update('user',array('trangthai'=>$trangthai));
        }
        
        function get_user_dangsanpham($sanpham_id){
            $user_arr = $this->get_user_type_dangsanpham($sanpham_id);
            $user_type = $user_arr['type'];
            $this->db->select($user_type.'.*');
            $this->db->where('sanpham.id',$sanpham_id);
            $this->db->from('sanpham');
            $this->db->join($user_type,$user_type.'.id = sanpham.user_id');
            $query = $this->db->get();
            return $query->row_array(0);
        }
        
        function get_user_type_dangsanpham($sanpham_id){
            $this->db->select('type');
            $this->db->where('sanpham_id',$sanpham_id);
            $query = $this->db->get('user_sanpham');
            return $query->row_array(0);
        }
    }
?>