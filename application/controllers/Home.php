<?php
    class Home extends CI_Controller{
        private $sp_id;
        private $sp_name;
        private $sp_danhmuc;
        private $extend_info;
        public $CI;
        public $message;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Sanpham_model');
            
        }
        
        function index(){
            $limit = array('recond'=>6,'start' =>0);
            $result = array(
                // do dien tu
                'dienthoai' =>$this->Sanpham_model->get_sp_by_danhmuc(301,$limit,'update'),
                'maytinhbang' => $this->Sanpham_model->get_sp_by_danhmuc(302,$limit,'update'),
                'maytinh' =>$this->Sanpham_model->get_sp_by_danhmuc(303,$limit,'update'),
                'mayanh' => $this->Sanpham_model->get_sp_by_danhmuc(304,$limit,'update'),
                'tivi' =>$this->Sanpham_model->get_sp_by_danhmuc(305,$limit,'update'),
                'phukien_dientu' => $this->Sanpham_model->get_sp_by_danhmuc(306,$limit,'update'),
                
                // noithat
                'dienlanh' =>$this->Sanpham_model->get_sp_by_danhmuc(501,$limit,'update'),
                'noithat' => $this->Sanpham_model->get_sp_by_danhmuc(502,$limit,'update'),
                'dogiadung' =>$this->Sanpham_model->get_sp_by_danhmuc(503,$limit,'update'),
                
                // thoi trang
                'quanao' =>$this->Sanpham_model->get_sp_by_danhmuc(401,$limit,'update'),
                'giaydep' => $this->Sanpham_model->get_sp_by_danhmuc(402,$limit,'update'),
                'tuixach' =>$this->Sanpham_model->get_sp_by_danhmuc(403,$limit,'update'),
                'mebe' => $this->Sanpham_model->get_sp_by_danhmuc(404,$limit,'update'),
                
                // phuong tien
                'xemay' =>$this->Sanpham_model->get_sp_by_danhmuc(101,$limit,'update'),
                'oto' => $this->Sanpham_model->get_sp_by_danhmuc(102,$limit,'update'),
                'xedap' =>$this->Sanpham_model->get_sp_by_danhmuc(103,$limit,'update'),
                'xetai' => $this->Sanpham_model->get_sp_by_danhmuc(104,$limit,'update'),
                'xekhac' =>$this->Sanpham_model->get_sp_by_danhmuc(105,$limit,'update'),
                'phutungxe' => $this->Sanpham_model->get_sp_by_danhmuc(106,$limit,'update'),
                
                // bat dong san
                'canho' =>$this->Sanpham_model->get_sp_by_danhmuc(201,$limit,'update'),
                'nhao' => $this->Sanpham_model->get_sp_by_danhmuc(202,$limit,'update'),
                'dat' =>$this->Sanpham_model->get_sp_by_danhmuc(203,$limit,'update'),
                'matbang' => $this->Sanpham_model->get_sp_by_danhmuc(204,$limit,'update'),
                
                // giai tri so thich
                'vatnuoi' =>$this->Sanpham_model->get_sp_by_danhmuc(601,$limit,'update'),
                'sach' => $this->Sanpham_model->get_sp_by_danhmuc(602,$limit,'update'),
                'thethao' =>$this->Sanpham_model->get_sp_by_danhmuc(603,$limit,'update'),
                'suutam' => $this->Sanpham_model->get_sp_by_danhmuc(604,$limit,'update'),
                
                // van phong
                'dodungvanphong' =>$this->Sanpham_model->get_sp_by_danhmuc(701,$limit,'update'),
                'dodungchuyendung' => $this->Sanpham_model->get_sp_by_danhmuc(702,$limit,'update'),
                
                // cacloaikhac
                'cacloaikhac' =>$this->Sanpham_model->get_sp_by_danhmuc(801,$limit,'update'),
            );
            //$result = $this->Sanpham_model->get_sp_by_danhmuc('ĐIỆN THOẠI');
            //var_dump($result);
            $this->loadview('page/home/home',$result);
            
        }
        
        function set_tinhthanh($tinhthanh_id = null){
            $this->CI = &get_instance();
            $this->CI->load->library('Check');
            $check_id = $this->CI->check->check_num($tinhthanh_id)?$tinhthanh_id:'';
            if(empty($check_id) && $check_id > 66){
                echo 'Vui lòng chọn tỉnh thành';
                redirect(base_url().'home');
            }
            $this->session->set_userdata(array('tinhthanh'=> $check_id));
            
            redirect(base_url().'home');
        }
        
        function show_all($id){
            var_dump($this->Sanpham_model->get_sp_full($id));
        }
        
        function get_info_extend(){
            $result = array(
                '101' => array('namdangki' => 'Năm đăng kí','sokm' => 'Số km'),
                '102' => array('namdangki' => 'Năm đăng kí','sokm' => 'Số km','hopso' =>'Hộp số','loainhienlieu' => 'Loại nhiên liệu'),
                '103' => array('loaixe' => 'Loại xe','namdangki' => 'Năm đăng kí'),
                '104' => array('trongluong' => 'Trọng lượng','trongtai' => 'Trọng tải'),
                '105' => array(),
                '106' => array(),
                '201' => array('diachi' => 'Địa chỉ','sophong' => 'Số phòng','dientich' => 'Diện tích'),
                '202' => array('diachi' => 'Địa chỉ','sophong' => 'Số phòng','dientich' => 'Diện tích'),
                '203' => array('diachi' => 'Địa chỉ','dientich' => 'Diện tích'),
                '204' => array('diachi' => 'Địa chỉ','dientich' => 'Diện tích'),
                '301' => array('xuatsu' => 'Xuất xứ','thuonghieu' => 'Thương hiệu','khuyenmai' => 'Khuyến mãi'),
                '302' => array('xuatsu' => 'Xuất xứ','thuonghieu' => 'Thương hiệu','khuyenmai' => 'Khuyến mãi'),
                '303' => array('xuatsu' => 'Xuất xứ','thuonghieu' => 'Thương hiệu','khuyenmai' => 'Khuyến mãi'),
                '304' => array('xuatsu' => 'Xuất xứ','thuonghieu' => 'Thương hiệu','khuyenmai' => 'Khuyến mãi'),
                '305' => array('xuatsu' => 'Xuất xứ','thuonghieu' => 'Thương hiệu','khuyenmai' => 'Khuyến mãi'),
                '306' => array(),
                '401' => array('kichthuoc' => 'Kích thước','chatlieu' => 'Chất liệu','mausac' => 'Màu sắc'),
                '402' => array('thuonghieu' => 'Thương hiệu','loaigiay' => 'Loại giầy','kichthuoc' => 'Kích thước'),
                '403' => array('thuonghieu' => 'Thương hiệu','loaigiay' => 'Loại giầy','kichthuoc' => 'Kích thước'),
                '404' => array(),
                '501' => array('thuonghieu' => 'Thương hiệu','dungtich' => 'Dung tích','kieutu' => 'Kiểu tủ'),
                '502' => array('donoithat' => 'Đồ nội thất'),
                '503' => array(),
                '601' => array('vethucung' => 'Về thú cưng'),
                '602' => array('danhmucsach' => 'Danh mục sách'),
                '603' => array(),
                '604' => array('dothethao_dangoai' => 'Đồ thể thao dã ngoại'),
                '605' => array(),
                '701' => array('dovanphong' => 'Đồ văn phòng'),
                '702' => array(),
                '801' => array()
            );
            return $result;
        }
        
        function get_info_user(){
            
        }
        
        /**
         * show sp by id
         * @return view
         * */
        function sanpham($sanpham_id = null){
            //$this->sp_id = $this->uri->segment(3);
            $this->sp_id = $sanpham_id;
            $this->extend_info = $this->get_info_extend();
            
            if(empty($this->sp_id)){
                return redirect(base_url().'home');
            }
            
            $result = $this->Sanpham_model->get_sp_full($this->sp_id);
            $danhmuc_id = $result['danhmuc_id'];
            $extend = $this->extend_info[$danhmuc_id];  // lay thong tin mo rong phan danh muc
            //var_dump($result);
            //var_dump($extend);
            
            $sanpham['sanpham'] = $result;
            $sanpham['extend'] = $extend;
            $sanpham['sp_tuongtu'] = $this->show_sp_tuongtu($danhmuc_id);
            $this->Sanpham_model->set_view($this->sp_id);
            //var_dump($sanpham['sp_tuongtu']);
            $this->loadview('page/sanpham/sanpham',$sanpham);
        }
        
        function show_sp_tuongtu($danhmuc_id){
            $result = $this->Sanpham_model->get_sp_by_danhmuc($danhmuc_id,array('recond' =>4,'start' =>0),1);
            if(count($result) <1){
                return false;
            }
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