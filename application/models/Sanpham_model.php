<?php
    class Sanpham_model extends CI_Model{
        public $tinhthanh;
        
        function __construct(){
            parent::__construct();
            $this->load->database();
            $this->tinhthanh = $this->session->has_userdata('tinhthanh')?$this->session->userdata('tinhthanh'):'';
        }
        
        // ------------ user -----------
        
        // 2 ham nay lien quan toi nhau
        function get_id($arr_list){
            $this->db->where($arr_list);
            $query = $this->db->get('sanpham');
            if($query->num_rows()<1){
                return false;
            }
            $result = $query->row_array(0);
            if(!$this->update_mahoa($result['id'])){
                return false;
            }
            return $result['id'];
        }
        
        function update_mahoa($id = null){
            if(empty($id)){
                return false;
            }
            $this->db->where('id',$id);
            return $this->db->update('sanpham',array('md5_id'=>md5($id)));
        }
        
        function insert_sp($data){
            if($this->db->insert('sanpham',$data)){
                return true;
            }
            return false;
        }
        
        function set_danhmuc($data){
            if($this->db->insert('user_sanpham',$data)){
                return true;
            }
            return false;
        }
        
        /**
         * 
         * get sp by id
         * @param $id
         * @return array
         * 
         * */
        function get_sp_id($id){
            $this->db->select();
            $this->db->where(['id'=>$id]);
            $query = $this->db->get('sanpham');
            if($query->num_rows() < 1){
                return false;
            }
            else{
                return $query->row_array(0);
            }
        }
        
        function get_sp_full($id){
            if(empty($id)){
                return false;
            }
            
            $name_table_danhmuc = '';
            $sql1 = 'select danhmuc.danhmuc_sanpham as danhmuc_sp from sanpham join danhmuc on sanpham.danhmuc_id = danhmuc.id where sanpham.id = '.$id;
            $query1 = $this->db->query($sql1);
            $result1 = $query1->row_array(0);
            $name_table_danhmuc = $result1['danhmuc_sp'];
            
            $type_user = '';
            $sql3 = 'select user_sanpham.type as type from sanpham join user_sanpham on sanpham.id = user_sanpham.sanpham_id where sanpham.id = '.$id;
            $query3 = $this->db->query($sql3);
            $result3 = $query3->row_array(0);
            $type_user = $result3['type'];
            
            $sql2 = 'select sanpham.id as sanpham_id ,sanpham.user_id as user_id,sanpham.hinhanh as sanpham_hinhanh,sanpham.ngaydang as sanpham_ngaydang ,sanpham.tinhtrang as sanpham_tinhtrang, sanpham.trangthai as sanpham_trangthai,sanpham.tinhthanh as sanpham_tinhthanh,sanpham.* ,danhmuc.name as danhmuc_name,danhmuc.danhmuc_sanpham as danhmuc_sanpham ,'.$name_table_danhmuc.'.*,'.$type_user.'.* 
                    from sanpham 
                    left join danhmuc on sanpham.danhmuc_id = danhmuc.id 
                    left join '.$name_table_danhmuc.' on '.$name_table_danhmuc.'.id = sanpham.id 
                    left join '.$type_user.' on '.$type_user.'.id = sanpham.user_id 
                    where sanpham.id = '.$id;
            $query2 = $this->db->query($sql2);
            $result2 = $query2->row_array(0);
            
            return $result2;
        }
        
        function set_view($sanpham_id = null){
            $sql = 'update sanpham set view=view+1  where id ='.$sanpham_id;
            $this->db->query($sql);
        }
        
        // ------------ enduser --------
        
        function show_sp(){
            $sql = 'select * from sanpham';
            $query = $this->db->query($sql);
            return $query->result_array();
        }
        
        function show_all($recond,$start){
            $this->db->select('sanpham.*,danhmuc.name as danhmuc_name, danhmuc.danhmuc_sanpham');
            $this->db->limit($recond,$start);
            $this->db->from('sanpham');
            $this->db->order_by('sanpham.update','asc');
            $this->db->join('danhmuc','sanpham.danhmuc_id = danhmuc.id');
            $query = $this->db->get();
            return $query->result_array(); 
        }
        
        function count_sp(){
            $this->db->select();
            $this->db->from('sanpham');
            
            $query = $this->db->get();
            return $query->num_rows(); 
        }
        
        
        function id_max(){
            $this->db->select_max('idsanpham');
            $query = $this->db->get('sanpham');
            $result = $query->row_array(0);
            return $result['idsanpham'];
        }
        function insert_danhmuc($table =null,$data = null){
            return $this->db->insert($table,$data);
        }
        function show_by_sanpham($id,$danhmuc_sanpham){
            $this->db->select('sanpham.*,danhmuc.name as danhmuc_name,danhmuc.danhmuc_sanpham, sanpham.id as sanpham_id, '.$danhmuc_sanpham.'.*');
            $this->db->from('sanpham');
            $this->db->where('sanpham.id',$id);
            $this->db->join('danhmuc','sanpham.danhmuc_id = danhmuc.id');
            $this->db->join($danhmuc_sanpham,'sanpham.id ='.$danhmuc_sanpham.'.id');
            
            /*
            $this->db->join('batdongsan','sanpham.id = batdongsan.id');
            $this->db->join('dodientu','sanpham.id = dodientu.id');
            $this->db->join('giaitri_sothich','sanpham.id = giaitri_sothich.id');
            $this->db->join('ngoaithat_giadung','sanpham.id = ngoaithat_giadung.id');
            $this->db->join('phuongtien','sanpham.id = phuongtien.id');
            $this->db->join('quanao','sanpham.id = quanao.id');
            $this->db->join('sanphamkhac','sanpham.id = sanphamkhac.id');
            
            $this->db->join('thoitrang','sanpham.id = thoitrang.id');
            $this->db->join('vanphong','sanpham.id = vanphong.id');
            */
            $query = $this->db->get();
            //echo $this->db->get_compiled_select();
            return $query->row_array(0);
        }
        function show_by_sanpham_morong($id,$danhmuc_sanpham){
            $this->db->select($danhmuc_sanpham.'.*');
            $this->db->from('sanpham');
            $this->db->where('sanpham.id',$id);
            $this->db->join('danhmuc','sanpham.danhmuc_id = danhmuc.id');
            $this->db->join($danhmuc_sanpham,'sanpham.id ='.$danhmuc_sanpham.'.id');
            $query = $this->db->get();
            return $query->row_array(0);
        }
        function update_duyetform($id,$show,$user_admin_id){
            $updates = array('trangthai'=>1,'show_or_hide' => $show,'admin_id' => $user_admin_id);
            $this->db->where('id',$id);
            return $this->db->update('sanpham',$updates);
        }
        function update_choduyet($id){
            $updates = array('trangthai'=>2);
            $this->db->where('id',$id);
            return $this->db->update('sanpham',$updates);
        }
        
        /**
         * 
         * void delete sanpham by id
         * @param sanpham_id
         * @param sanpham_danhmuc
         * @return bool
         * 
         * */
        function del_sp($sanpham_id = null,$sanpham_danhmuc = null){
            $danhmucsp = $this->get_name_danhmuc($sanpham_id);
            
            $this->db->where('id',$sanpham_id);
            if(!$this->db->delete('sanpham')){
                return false;
            }
            
            $this->db->where('sanpham_id',$sanpham_id);
            $this->db->delete('user_sanpham');
            
            //$form_need_del = $this->get_name_danhmuc($sanpham_id);
            $this->db->where('id',$sanpham_id);
            return $this->db->delete($danhmucsp);
        }
        
        function get_id_mahoa($value){
            $this->db->where('md5_id',$value);
            $query = $this->db->get('sanpham');
            $result = $query->row_array(0);
            return $result['id'];
        }
        
        function update_sanpham($id,$data){
            $this->db->where('id',$id);
            return $this->db->update('sanpham',$data);
        }
        
        /**
         * 
         * get type danh muc bang sanpham_id
         * @param sanpham_id
         * @return type sanpham
         * 
         * */
        function get_name_danhmuc($sanpham_id){
            $this->db->select('danhmuc.danhmuc_sanpham as danhmuc_sanpham');
            $this->db->where('sanpham.id',$sanpham_id);
            $this->db->from('sanpham');
            $this->db->join('danhmuc','sanpham.danhmuc_id = danhmuc.id');
            $query = $this->db->get();
            $result = $query->row_array(0);
            return $result['danhmuc_sanpham'];
        }
        
        
        
        /**
         * 
         * show người dùng bằng id sản phẩm đăng thông qua bảng user_sanpham
         * @param id sản phẩm đăng
         * @return thông tin user
         * 
         * */
        function show_user_by($sanpham_id){
            $this->db->select('*');
            $this->db->where(array('sanpham_id'=> $sanpham_id));
            $query = $this->db->get('user_sanpham');
            $result = $query->row_array(0);
            $type_user= $result['type'];    // return type user or store
            
            //echo $type_user;
            
            $this->db->select($type_user.'.*,'.$type_user.'.hack_email as hack_email');
            $this->db->from('user_sanpham');
            $this->db->where(array('sanpham_id'=> $sanpham_id));
            $this->db->join($type_user,'user_sanpham.user_id = '.$type_user.'.id');
            $query2 = $this->db->get();
            $result = $query2->row_array(0);
            return $result;   
        }
        
        /**
         * 
         * model get san pham da duyet
         * @return array
         * 
         * */
         function show_sp_trangthai($trangthai,$show =null,$recond =null,$start =null){
            $this->db->select('sanpham.*,danhmuc.name as danhmuc_name, danhmuc.danhmuc_sanpham');
            $this->db->from('sanpham');
            if(!empty($recond) || !empty($start)){
                $this->db->limit($recond,$start);                
            }
            $this->db->join('danhmuc','sanpham.danhmuc_id = danhmuc.id');
            $this->db->order_by('sanpham.update','asc');
            $this->db->where('trangthai',$trangthai);
            if(!empty($show)){
                $this->db->where('show_or_hide',$show);
            }
            $query = $this->db->get();
            return $query->result_array();
         }
         
         function count_sp_trangthai($trangthai,$show = null){
            $this->db->select();
            $this->db->where('trangthai',$trangthai);
            if(!empty($show)){
                $this->db->where('show_or_hide',$show);
            }
            $query = $this->db->get('sanpham');
            return $query->num_rows();
         }
         
         function get_user_store_session($id,$table){
            $this->db->where('id',$id);
            return $this->db->get($table)->row_array(0);
         }
         
         // ------------- search --------------------
         function get_search($type,$value,$recond =null,$start =null){
            $count = count($value);
            $sql = "SELECT * FROM sanpham where ".$type." like '%".$value[0]."%'";
            if($count>1){
                for($i =1;$i < $count;$i++){
                    $sql .= "or ".$type." like '%".$value[$i]."%'";
                }
            }
            if(!empty($recond)){
                $sql .= "LIMIT ".$start.",".$recond;
            }
            //echo $sql;
            //$sql = 'SELECT * FROM sanpham where tensanpham like %'.$value.'% or tensanpham like %'.$value.'% ';      
            $query = $this->db->query($sql);      
            //$query = $this->db->get('sanpham');
            if($query->num_rows() == 0){
                return false;
            }
            else{
                $result = $query->result_array();
                $search = '';
                $i =0;
                foreach($result as $row){
                    $search[$i] = $this->get_danhmuc_search($row['id']);
                    $i++;
                }
                return $search;
            }
         }
         
         function count_search($type,$value){
            $count = count($value);
            $sql = "SELECT * FROM sanpham where ".$type." like '%".$value[0]."%'";
            if($count>1){
                for($i =1;$i < $count;$i++){
                    $sql .= "or ".$type." like '%".$value[$i]."%'";
                }
            }
            //echo '<br/>'.$sql;
            $query = $this->db->query($sql); 
            //echo ' - '.$query->num_rows().' - so hang';
            return $query->num_rows();
         }
         
         public function get_danhmuc_search($sanpham_id){
            $this->db->select('sanpham.*,danhmuc.name as danhmuc_name, danhmuc.danhmuc_sanpham');
            $this->db->where('sanpham.id',$sanpham_id);
            $this->db->from('sanpham');
            $this->db->join('danhmuc','sanpham.danhmuc_id = danhmuc.id');
            $query = $this->db->get();
            $result = $query->row_array(0);
            return $result;
        }
        
        public function thongke_thang($time){
            $sql = "select * from sanpham where sanpham.update like '%".$time."%'";
            $query = $this->db->query($sql);
            $result = $query->num_rows();
            return $result;
        }
        
        public function get_search_auto($key,$limit =null,$param = null){
            
            $this->db->like('tag',$key,'both');
            $where = array(
                'show_or_hide' => 1,
                'trangthai' => 1
            );
            if(!empty($this->tinhthanh)){
                if($this->tinhthanh != 1){
                    $where['sanpham.tinhthanh'] = $this->tinhthanh;
                }                
            }
            $this->db->where($where);
            if(!empty($param)){
                $select = array(
                    'view'=> array('view','desc'),
                    'update' => array('update','desc'),
                    'priceup' => array('gia','asc'),
                    'pricedown' => array('gia' , 'desc')
                );
            
                $param_list = $select[$param];
                //var_dump($param_list);
                $this->db->order_by($param_list[0],$param_list[1]);
            }
            else{
                $this->db->order_by('update','desc');
            }
            
            
            
            if(!empty($limit)){
                $this->db->limit($limit['recond'],$limit['start']);
            }
            
            $result = $this->db->get('sanpham');
            return $result->result_array();
            
            /*
            $this->db->select('sanpham.id as sanpham_id');
            $this->db->from('danhmuc');
            $this->db->join('sanpham','sanpham.danhmuc_id = danhmuc.id');
            $this->db->like('danhmuc.tag',$key,'both');
            $this->db->where(array('sanpham.show_or_hide' => 1,'sanpham.trangthai' => 1));
            $this->db->order_by('sanpham.view','desc');
            $this->db->limit(6,0);
            $query = $this->db->get();
            $result = $query->result_array();
            $arr_id = $result;
            return $arr_id;
            //return $result;
            
            $sql = "SELECT DISTINCT sanpham.id as sanpham_id,sanpham.* 
                    FROM danhmuc 
                    JOIN sanpham ON sanpham.danhmuc_id = danhmuc.id 
                    WHERE 
                        danhmuc.tag LIKE '%".$key."%' ESCAPE '!' 
                        OR sanpham.tensanpham LIKE '%".$key."%' ESCAPE '!' 
                        AND sanpham.show_or_hide = 1 AND sanpham.trangthai = 1 
                        ORDER BY sanpham.view DESC LIMIT 6";
            $result = $this->db->query($sql);
            */
        }
        
        function count_get_search($key){
            $this->db->like('tag',$key,'both');
            $where = array(
                'show_or_hide' => 1,
                'trangthai' => 1
            );
            if(!empty($this->tinhthanh)){
                if($this->tinhthanh != 1){
                    $where['sanpham.tinhthanh'] = $this->tinhthanh;
                }                
            }
            $this->db->order_by('view','desc');
            if(!empty($limit)){
                $this->db->limit($limit['recond'],$limit['start']);
            }
            
            $result = $this->db->get('sanpham');
            return $result->num_rows();
        }
        
        
        
        // -------------- end search -----------------
        
        // -------------- Home -----------------------
        
        function get_sp_by_danhmuc($danhmuc,$limit = null,$update =null){
            /*$this->db->select('danhmuc.id as id');
            $this->db->where(array('danhmuc.id' => $danhmuc));
            $query1 = $this->db->get('danhmuc');
            $result1 = $query1->row_array(0);
            */
            $where = array(
                'sanpham.danhmuc_id' => $danhmuc,
                'sanpham.trangthai' => 1,
                'sanpham.show_or_hide' => 1
            );
            
            if(!empty($this->tinhthanh)){
                if($this->tinhthanh != 1){
                    $where['sanpham.tinhthanh'] = $this->tinhthanh;
                }                
            }
            
            /*if($this->session->has_userdata('tinhthanh')){
                if($this->session->userdata('tinhthanh')!=1){
                    $where['sanpham.tinhthanh'] = $this->session->userdata('tinhthanh');
                }
                
            }
            */
            $this->db->distinct();
            $this->db->select('sanpham.*');
            
            $this->db->where($where);
            if(!empty($update)){
                $this->db->order_by('update','desc');
            }
            if(!empty($limit)){
                $this->db->limit($limit['recond'],$limit['start']);                
            }
            $query = $this->db->get('sanpham');
            
            if($query->num_rows() < 1){
                return false;
            }
            return $query->result_array();
        }
        
        function get_sp_by_num($danhmuc,$limit = null,$update =null,$extend = null,$table_join = null){
            
            $where = array(
                'sanpham.danhmuc_id' => $danhmuc,
                'sanpham.trangthai' => 1,
                'sanpham.show_or_hide' => 1
            );
            if(!empty($this->tinhthanh)){
                if($this->tinhthanh != 1){
                    $where['sanpham.tinhthanh'] = $this->tinhthanh;
                }                
            }
            if(!empty($extend)){
                foreach($extend as $key => $row){
                    $where[$key] = $row;
                }
            }
            
            //var_dump($where);
            $this->db->distinct();
            $this->db->select('sanpham.*');
            $this->db->from('sanpham');
            if(!empty($table_join)){
                $this->db->join($table_join,$table_join.'.id = sanpham.id');
            }
            $this->db->where($where);
            if(!empty($update)){
                $this->db->order_by('update','desc');
            }
            if(!empty($limit)){
                $this->db->limit($limit['recond'],$limit['start']);                
            }
            $query = $this->db->get();
            //var_dump($query->result_array());
            //echo $query;
            if($query->num_rows() < 1){
                return false;
            }
            return $query->result_array();
        }
        
        // -------------- Endhome --------------------
        
    }
?>