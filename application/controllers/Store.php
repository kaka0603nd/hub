<?php
    class Store extends CI_Controller{
        private $name;
        private $email;
        private $password;
        private $password_again;
        private $name_store;
        //private $fullho,$gioitinh,$date,$month,$year,$yourpage,$ngaysinh;
        private $hinhanh;
        private $trangthai,$diachi,$tinhthanh,$sochungminh;
        private $created_at;
        private $sodienthoai;
        private $type;
        
        public $CI;
        function __construct(){
            parent::__construct();
            $this->load->model('Store_model');
            $this->load->helper(array('url','cookie'));
            // load thu vien open
            $this->CI =& get_instance();
            $this->load->library(array('check','session'));
            
        }
        
        function index(){
            $this->loadview('page/store/form_store');
        }
        
        function dangki(){
            if(isset($_POST['btnsub'])){
                $this->name = $this->input->post('name',TRUE);
                $this->email = $this->input->post('email',TRUE);
                $this->password = $this->input->post('password',TRUE);
                $this->password_again = $this->input->post('password_again',TRUE);
                $this->name_store = $this->input->post('name_store',TRUE);
                $this->hinhanh = '';
                $this->diachi = $this->input->post('diachi');
                $this->tinhthanh = $this->input->post('tinhthanh',TRUE);
                $this->sodienthoai = $this->input->post('sodienthoai',TRUE);
                $this->type = 'store';
                $this->sochungminh = $this->input->post('sochungminh',TRUE);
                $this->trangthai = 3;
                $this->created_at = date('Y-m-d');
                
                // insert input
                $insert = array(
                    'name' =>$this->name,
                    'email' =>$this->email,
                    'password' => md5($this->password),
                    'name_store' => $this->name_store,
                    'diachi' => $this->diachi,
                    'hinhanh' => $this->hinhanh,
                    'trangthai' => $this->trangthai,
                    'tinhthanh' => $this->tinhthanh,
                    'sodienthoai' => $this->sodienthoai,
                    'sochungminh' => $this->sochungminh,
                    'created_at' => $this->created_at,
                    'hack_email'=> md5($this->email),
                    'type' => $this->type
                );
                
                // test
                $this->CI->load->library('Check');
                $err = array(
                    'name' => (!$this->CI->check->check_name($this->name) || empty($this->name))?false:$this->name,
                    'email' => (!$this->CI->check->check_email($this->email) || empty($this->email))?false:$this->email,
                    'password' => (empty($this->password)|| strlen($this->password)<6)?false:$this->password,
                    'password_again' => ($this->password_again != $this->password)?false:$this->password_again,
                    'name_store' => empty($this->name_store)?false:$this->name_store,
                    'diachi' => empty($this->diachi)?false:$this->diachi,
                    'tinhthanh' => empty($this->tinhthanh)?false:$this->tinhthanh,
                    'sodienthoai' => (!$this->CI->check->check_num($this->sodienthoai) || empty($this->sodienthoai) || strlen($this->sodienthoai)>12)?false:$this->sodienthoai,
                    'sochungminh' => (!$this->CI->check->check_num($this->sochungminh) || empty($this->sochungminh)|| strlen($this->sochungminh)>9)?false:$this->sochungminh,
                    
                );
                if(!empty($this->name)){
                    $err['math_name'] = $this->Store_model->check_store(['name' => $this->name])?false:$this->name;
                }
                if(!empty($this->email)){
                    $err['math_email'] = $this->Store_model->check_store(['email' => $this->email])?false:$this->email;
                }
                
                // test insert
                $data = array(
                    'check' =>$err,
                    'insert' => $insert
                );
                if(array_search(false,$err)){
                    //var_dump($err);
                    return $this->loadview('page/store/form_store',$data);
                }
                else{
                    if($this->Store_model->insert_store($insert)){
                        echo '<script>alert("Đăng kí thành công vui lognf kiểm tra lại email")</script>';
                        redirect(base_url().'home');
                    }
                    else{
                        echo '<script>alert("Có lỗi trong quá trình đăng kí")</script>';
                        redirect(base_url().'home');
                    }
                }
            }           
        }
        
        function my_store($id = null){
            if(empty($id)){
                return redirect(base_url().'home');
            }
            $result = $this->Store_model->get_sanpham_store($id);
            $data['sanpham'] = $result;
            //var_dump($result);
            $this->loadview('page/store/my_store',$data);
        }
        
        function all_store(){
            
            $this->loadview('page/store/all_store');
        }
        
        function delete_sanpham($id = null){
            $this->load->model('Sanpham_model');
            if(empty($id)){
                return redirect(base_url().'home');
            }
            
            $id = $this->Sanpham_model->get_id_mahoa($id);
            if(!$this->Sanpham_model->del_sp($id,'')){
                echo 'Xoa thanh cong';
            }
            else{
                echo 'Xoa thanh cong';
            }
        }
        
        function panel_store($id = null){
            if(!$this->session->has_userdata('id')){
                return redirect(base_url().'home');
            }
            $id = $this->session->userdata('id');
            if(empty($id)){
                return redirect(base_url().'home');
            }
            $extend = $this->get_info_extend();
            
            $result = $this->Store_model->get_sanpham_store($id);
            $d = 0;
            
            foreach($result as $key => $row){
                $extend[$row['danhmuc_id']][0]++;
                $d++;
                //echo $key;
                //var_dump($row) ;
            }
            
            $s = array();
            foreach($extend as $key => $row){
                if($row[0] != 0){
                    $s[$row[1]] = $row[0];
                }
            }
            $data['thongtin_form'] = $s;
            $data['sanpham'] = $result;
            $data['total_sanpham'] = $d;
            //var_dump($data);
            //var_dump($extend);
            //var_dump($result);
            $this->loadview('page/store/panel_store',$data);
        }
        
        function store_danhmuc($id){
            try{
                if(empty($id)){
                    return redirect(base_url().'home');
                }
                $result = $this->Store_model->get_danhmuc_sanpham($id);
                //var_dump($result);
                $data['store'] = $result;
                $this->loadview('page/store/store_danhmuc',$data);
            }
            catch(Exception $e){
                echo 'Caught exception: ',  $e->getMessage(), "\n";
                
            }
        }
        
        function form_store(){
            
            $this->loadview('page/store/form_store');
        }
        
        function get_info_extend(){
            $result = array(
                '101' => array(0,'Xe máy'),
                '102' => array(0,'Ô tô'),
                '103' => array(0,'Xe đạp'),
                '104' => array(0,'Xe tải'),
                '105' => array(0,'Xe khác'),
                '106' => array(0,'Phụ tùng, Phụ kiện xe'),
                '201' => array(0,'Căn hộ/Chung cư'),
                '202' => array(0,'Nhà ở'),
                '203' => array(0,'Đất'),
                '204' => array(0,'Văn phòng, Mặt bằng kinh doanh'),
                '301' => array(0,'Điện thoại di động'),
                '302' => array(0,'Máy tính bảng'),
                '303' => array(0,'Máy tính, Laptop'),
                '304' => array(0,'Máy ảnh, Máy quay'),
                '305' => array(0,'Tivi, Loa, Amply, Máy nghe nhạc'),
                '306' => array(0,'Phụ kiện, Linh kiện'),
                '401' => array(0,'Quần áo'),
                '402' => array(0,'Giày dép'),
                '403' => array(0,'Túi xách'),
                '404' => array(0,'Mẹ và bé, Phụ kiện'),
                '501' => array(0,'Tủ lạnh, Máy lạnh, Máy giặt'),
                '502' => array(0,'Nội ngoại thất, Cây cảnh'),
                '503' => array(0,'Đồ gia dụng gia đình khác'),
                '601' => array(0,'Vật nuôi, Thú cưng'),
                '602' => array(0,'Sách'),
                '603' => array(0,'Âm nhạc, Phim'),
                '604' => array(0,'Đồ thể thao, Dã ngoại'),
                '605' => array(0,'Sưu tầm, Game, Sở thích khác'),
                '701' => array(0,'Đồ dùng văn phòng'),
                '702' => array(0,'Đồ chuyên dụng, Giống nuôi trồng'),
                '801' => array(0,'Các loại khác')
            );
            return $result;
        }
        
        /**
         * @param url call
         * @param data input
         * @return
         * */
        function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('page/main',$datas);
        }
}
?>