<?php
    class Store_model extends CI_Model{
        public $tinhthanh;
        
        function __construct(){
            parent::__construct();
            $this->load->database();
            $this->tinhthanh = $this->session->has_userdata('tinhthanh')?$this->session->userdata('tinhthanh'):'';
        }
        //public $name_email = array('name','email');
        function check_store($name_email){
            if(is_array($name_email)){
                if(isset($name_email['name'])){
                    $this->db->where('name',$name_email['name']);
                    if($this->session->has_userdata('id')){
                        $this->db->where('id !=',$this->session->userdata('id'));
                    }
                    $query = $this->db->get('user');
                    
                    $user_name = $query->num_rows()>0?true:false;
                    if($user_name){
                        return true;
                    }
                    $this->db->where('name',$name_email['name']);
                    if($this->session->has_userdata('id')){
                        $this->db->where('id !=',$this->session->userdata('id'));
                    }
                    $query = $this->db->get('store');
                    $store_name = $query->num_rows()>0?true:false;
                    
                    if($store_name){
                        return true;
                    }
                }
                if(isset($name_email['email'])){
                    $this->db->where('email',$name_email['email']);
                    if($this->session->has_userdata('id')){
                        $this->db->where('id !=',$this->session->userdata('id'));
                    }
                    $query = $this->db->get('user');
                    $user_email = $query->num_rows()>0?true:false;
                    if($user_email){
                        return true;
                    }
                    $this->db->where('email',$name_email['email']);
                    if($this->session->has_userdata('id')){
                        $this->db->where('id !=',$this->session->userdata('id'));
                    }
                    $query = $this->db->get('store');
                    $store_email = $query->num_rows()>0?true:false;
                    if($store_email){
                        return true;
                    }
                }
            }
            
        }
        
        function insert_store($data){
            return $this->db->insert('store',$data);
        }
        
        function update_store($id,$data){
            $this->db->where('id',$id);
            return $this->db->update('store',$data);
        }
        
        public function thongke_thang($time){
            $sql = "select * from store where created_at like '%".$time."%'";
            $query = $this->db->query($sql);
            $result = $query->num_rows();
            return $result;
        }
        
        function check_dangnhap($name_email){
            if(is_array($name_email)){
                if(isset($name_email['name'])){
                    $sql = "select * from store where name = '".$name_email['name']."' and password = '".$name_email['passwd']."'";
                    $query = $this->db->query($sql);
                    //var_dump($query->result_array());
                    return $query->num_rows()>0?true:false;
                }
                if(isset($name_email['email'])){
                    $sql = "select * from store where email = '".$name_email['email']."' and password = '".$name_email['passwd']."'";
                    $query = $this->db->query($sql);
                    //var_dump($query->result_array());
                    return $query->num_rows()>0?true:false;
                }
            }
        }
        
        function get_sanpham_store($id){
            $this->db->select('sanpham.*,store.*,store.id as store_id,sanpham.id as sanpham_id,sanpham.hinhanh as sanpham_hinhanh,sanpham.tinhthanh as sanpham_tinhthanh,store.trangthai as store_trangthai,sanpham.trangthai as sanpham_trangthai');
            $this->db->where(array('user_sanpham.user_id'=>$id,'user_sanpham.type' => 'store','sanpham.show_or_hide' => 1,'sanpham.trangthai' => 1));
            $this->db->order_by('sanpham.view','desc');
            //$this->db->where(array('show_or_hide' => 1,'trangthai' => 1));
            $this->db->from('user_sanpham');
            $this->db->join('sanpham','sanpham.id = user_sanpham.sanpham_id');
            $this->db->join('store','store.id = user_sanpham.user_id');
            $query = $this->db->get();
            return $query->result_array();
        }
        
        function get_danhmuc_sanpham($danhmuc){
            $this->db->select('store.*,count(*) as sosanpham');
            $where = array(
                'sanpham.danhmuc_id'=>$danhmuc,
                'user_sanpham.type' => 'store',
                'sanpham.show_or_hide' => 1,
                'sanpham.trangthai' => 1
            );
            if(!empty($this->tinhthanh)){
                if($this->tinhthanh != 1){
                    $where['sanpham.tinhthanh'] = $this->tinhthanh;
                }                
            }
            $this->db->where($where);
            //$this->db->where(array('show_or_hide' => 1,'trangthai' => 1));
            $this->db->from('user_sanpham');
            $this->db->join('sanpham','sanpham.id = user_sanpham.sanpham_id');
            $this->db->join('store','store.id = user_sanpham.user_id');
            $this->db->group_by("store.id");
            $query = $this->db->get();
            return $query->result_array();
        }
        
        /**
         * 
         * function get user by CI
         * @param recond 
         * @param id get
         * return array
         * 
         * */
         function get_store($recond,$start){
            $this->db->select();
            $this->db->limit($recond,$start);
            $this->db->order_by('id','DESC');
            $query = $this->db->get('store');
            return $query->result_array();
        }
        
        function get_total_store(){
            $this->db->select();
            $query = $this->db->get('store');
            return $query->num_rows();
        }
        
        function get_store_id($id){
            $this->db->where('id',$id);
            return $this->db->get('store')->row_array(0);
        }
        
        function store_sanpham($store_id){
            $this->db->select('sanpham.*');
            $this->db->where('user_sanpham.user_id',$store_id);
            $this->db->where('user_sanpham.type','store');
            $this->db->from('user_sanpham');
            $this->db->join('store','store.id = user_sanpham.user_id');
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
        
        function count_store_sp($store_id){
            $this->db->select('sanpham.*');
            $this->db->where('user_sanpham.user_id',$store_id);
            $this->db->where('user_sanpham.type','store');
            $this->db->from('user_sanpham');
            $this->db->join('store','store.id = user_sanpham.user_id');
            $this->db->join('sanpham','sanpham.id = user_sanpham.sanpham_id');
            return $query = $this->db->get()->num_rows();
        }
        
        function get_sanpham_danhmuc($sanpham_id){
            $this->load->model('Sanpham_model');
            return $this->Sanpham_model->get_name_danhmuc($sanpham_id);
        }
        
        function set_trangthai($store_id,$trangthai){
            $this->db->where('id',$store_id);
            return $this->db->update('store',array('trangthai'=>$trangthai));
        }
    }
?>