<?php
    //session_start();
    class Dangsanpham extends CI_Controller{
        public $CI;
        public $id;
        public $tensanpham;
        public $tieude,$danhmuc,$ngaydang,$update,$thanhpho,$tinhtrang,$gia,$lienhe,$noidung,$vanchuyen;
        public $hinhanh;
        public $conhang;
        public $trangthai;
        public $tag;
        public $md5_id;
        
        public $user_id;
        public $sanpham_id;
        public $type;
        
        function __construct(){
            parent::__construct();
            $this->load->helpers(array('url','form'));
            $this->load->library('session');
            $this->load->model('Sanpham_model');
            
            if(!$this->session->has_userdata('id')){
                echo 'Không được phép';
                $this->session->set_flashdata('message', 'Bạn phải đăng nhập vào tài khoản ...');
                    
                return redirect(base_url().'dangnhap');
            }
            $trangthai_ok = $this->Sanpham_model->get_user_store_session($this->session->userdata('id'),$this->session->userdata('type'));
            if($trangthai_ok['trangthai'] == 2){
                echo 'Chưa xác nhận';
                $this->session->set_flashdata('message', 'Hãy vào email để xác nhận tài khoản ...');
                return redirect(base_url().'dangnhap');
            }
            else{
                if($trangthai_ok['trangthai'] == 3){
                    $this->session->set_flashdata('message', 'Tài khoản này đã bị chặn vui lòng quay lại sau ...');
                    return redirect(base_url().'dangnhap');
                }
            }
            
            $this->load->library('form_validation');    // load validate data
            $this->lang->load('vi', 'vietnamese');  // load bo ngon ngu tieng viet
            
            //$this->session->set_userdata(array('id' => 1,'type' => 'user'));
            $this->user_id = $this->session->userdata('id');
            $this->type = $this->session->userdata('type');
            $this->CI = &get_instance();
            $this->CI->load->library('Danhmuc');
        }
        
        function index(){
            $this->loadview('page/sanpham/dangsanpham');
            /*
            $data = array();
            echo count($data);
            $data2 = null;
            echo count($data2);
            */
        }
        
        function arr_danhmuc(){
            $result = array(
                // do dien tu
                '301' =>'dien thoai điện thoại dienthoai',
                '302' => 'may tinh bang maytinh maytinhbang máy tính bảng',
                '303' =>'máy tính may tinh maytinh ',
                '304' => 'máy ảnh may anh mayanh ',
                '305' =>'ti vi tivi ',
                '306' => 'phụ kiện điện tử phu kien dien tu phukien dientu',
                
                // noithat
                '501' =>'điện lạnh dien lanh dienlanh',
                '502' => 'nội thất noi that noithat',
                '503' =>'đồ gia dụng do gia dung dogiadung giadung',
                
                // thoi trang
                '401' =>'quần áo quan ao quanao',
                '402' => 'giày dép giay dep giaydep',
                '403' =>'túi xách tui xach tuixach',
                '404' => 'mẹ bé me be mebe',
                
                // phuong tien
                '101' =>'xe may mo to xe máy xemay',
                '102' => 'ô tô o to oto ôto ôtô xe hơi xehoi',
                '103' =>'xe đạp đ dap xedap',
                '104' => 'xe tai xetai xe tải',
                '105' =>'xe',
                '106' => 'phu tung xe phutungxe phutung phụ tùng xe',
                
                // bat dong san
                '201' =>'căn hộ canho can ho',
                '202' => 'nhà ở nha o nhao',
                '203' =>'đất dat ',
                '204' => 'văn phòng mặt bằng van phong mat bang vanphong matbang',
                
                // giai tri so thich
                '601' =>'động vật nuôi cảnh dong vat nuoi canh ',
                '602' => 'sách sach book',
                '603' =>'đồ thể thao do the thao thethao',
                '604' => 'sưu tầm suu tam suutam',
                
                // van phong
                '701' =>'đồ dùng văn phòng do dung van phong dodung vanphong',
                '702' => 'đồ dùng chuyên dụng do dung chuyen dung dodung chuyendung',
                
                // cacloaikhac
                '801' =>'san pham khac sản phẩm',
            );
            //$result = $this->Sanpham_model->get_sp_by_danhmuc('ĐIỆN THOẠI');
            //var_dump($result);
            return $result;
            
        }
        
        function captcha_show(){
            echo '<img src="http://localhost:8080/Boxshop/public/captcha.php" />';
            echo $this->session->userdata('captcha');
            echo $_SESSION['captcha'];
        }
        
        function convert_image($input){
            //$this->hinhanh = $this->input->post('hinhanh');
            $s = '';
            foreach($input as $row){
                if(!empty($row)){
                    if(empty($s)){
                        $s .= $row;
                    }
                    else{
                        $s .= ','.$row;
                    }
                    
                }
            }
            //$this->hinhanh = $s;
            //echo $this->hinhanh;
            return $s;
        }
        
        function edit($id = null){
            //$s['full_s'] = array('id'=>1,'name' => 'hello');
            //$this->session->set_userdata($s);
            //var_dump($this->session->userdata('full_s'));
            
            
            
            $this->id = $this->Sanpham_model->get_id_mahoa($id);
            //echo '<script>alert('.$this->id.')</script>';
            $result = $this->Sanpham_model->get_sp_full($this->id);
            //var_dump($result);
            $extend_info = $this->get_info_extend();
            $extend = $extend_info[$result['danhmuc_id']];
            foreach($extend as $key => $row){
                $extend[$key] = $result[$key];
                $this->session->set_userdata(array($key => $result[$key]));
                //echo $key.'-'.$this->session->userdata($key);
            }
            //var_dump($extend);
            
            
            $data['insert'] = $result;
            //var_dump($data);
            $this->loadview('page/sanpham/edit',$data);
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
        
        function action_edit(){
            $this->id = $this->input->input_stream('id_mahoa',true);
            $this->id = $this->Sanpham_model->get_id_mahoa($this->id);
            if(empty($this->id)){
                echo 'Không tìm thấy sản phẩm bạn muốn cập nhập';
                return ;
            }
            $err_test = true;
            $err = array();
            $this->tensanpham = $this->input->input_stream('tensanpham',TRUE);
            $this->tieude = $this->input->input_stream('tieude',TRUE);
            $this->danhmuc = $this->input->input_stream('danhmuc',TRUE);
            $this->thanhpho = $this->input->input_stream('thanhpho',TRUE);
            $this->tinhtrang = $this->input->input_stream('tinhtrang',TRUE);
            $this->gia = $this->input->input_stream('gia');
            $this->lienhe = $this->input->input_stream('lienhe',TRUE);
            $this->noidung = $this->input->input_stream('noidung',true);
            $this->vanchuyen = $this->input->input_stream('vanchuyen',TRUE);
            $this->hinhanh = $this->convert_image($this->input->post('hinhanh',TRUE));
            $this->update = date('Y-m-d H-i-s');
            $this->trangthai = 3;
            $this->conhang = $this->input->input_stream('conhang',TRUE);
            
            $this->CI = &get_instance();
            $this->CI->load->library('Vnkey');
            $str_name = $this->CI->vnkey->vn_str_filter($this->tensanpham);
            
            $add_tag = $this->arr_danhmuc();
            $this->tag = $add_tag[$this->danhmuc].' '.$str_name;
            //echo $this->tinhtrang;
            $insert = array(
                'tensanpham' =>$this->tensanpham,
                'tieude' =>$this->tieude,
                'danhmuc_id' =>$this->danhmuc,
                'tinhthanh' =>$this->thanhpho,
                'tinhtrang' =>$this->tinhtrang,
                'gia' =>$this->gia,
                'lienhe' =>$this->lienhe,
                'noidung' =>$this->noidung,
                'update'=> $this->update,
                'vanchuyen' =>$this->vanchuyen,
                'hinhanh' =>$this->hinhanh,
                'trangthai' =>$this->trangthai,
                'conhang' => $this->conhang,
                'user_id' =>$this->user_id,
                'tag' => $this->tag,
                'admin_id' => '',
                'show_or_hide' => 2
            );
            
            
            
            $CI =& get_instance();
            $CI->load->library('Check');
            
            $err['tensanpham'] = (!$this->check->check_name_sp($this->tensanpham)|| empty($this->tensanpham))?false:true; 
            $err['tieude'] = (empty($this->tieude))?false:true; 
            $err['danhmuc'] = (!$this->check->check_num($this->danhmuc)|| empty($this->danhmuc))?false:true; 
            $err['gia'] = (!$this->check->check_num($this->gia)|| empty($this->gia))?false:true;
            //$err['thanhpho'] = (empty($this->thanhpho)|| $this->thanhpho !=0)?false:true;
            $err['tinhtrang'] = (empty($this->tinhtrang) || !$this->check->check_num_one($this->tinhtrang))?false:true;
            
            $err['lienhe'] = empty($this->lienhe)?false:true;
            $err['noidung'] = empty($this->noidung)?false:true;
            $err['hinhanh'] = empty($this->hinhanh)?false:true;
            $err['vanchuyen'] = empty($this->vanchuyen)?false:true;
            
            
            // test danh muc
            $full_err['danhmuc'] = '';
            if(!$this->test_danhmuc('test',$this->danhmuc)){
                $full_err['danhmuc'] = 'Vui lòng nhập đầy đủ danh mục phần thông tin mở rộng';
                $err['danhmuc_thongtin'] = false;
            }
            // end test danh muc
                
            $full_err['full_err'] = $err;
            $full_err['insert'] = $insert;
            
            
            
            if(array_search(false,$err)){
                var_dump($err);
                return $this->loadview('page/sanpham/dangsanpham',$full_err);
            }
            else{
                
                $id = null;
                if($this->Sanpham_model->update_sanpham($this->id,$insert)){
                    // cap nhap phan mo rong
                    $extend_info = $this->get_info_extend();
                    $extend = $extend_info[$this->danhmuc];
                    $data_danhmuc = array();
                    foreach($extend as $key => $row){
                        $data_danhmuc[$key] = $this->input->input_stream($key,true);
                    }
                    $this->load->model('Danhmuc_model');
                    $table = $this->Danhmuc_model->get_danhmuc_id($this->danhmuc);
                    echo $this->id.'-'.$table;
                    if(!empty($data_danhmuc)){
                        var_dump($data_danhmuc);
                        if($this->Danhmuc_model->update_danhmuc($this->id,$table,$data_danhmuc)){
                            redirect(base_url().'home');
                        }
                        else{
                            $this->loadview('page/sanpham/dangsanpham',$insert);
                            return;
                        }
                    }
                    
                } 
                else{
                    $this->loadview('page/sanpham/dangsanpham',$insert);
                    return;
                }
                
                
            }
            
        }
        
        function sub_dang(){
            $err_test = true;
            $err = array();
            $this->tensanpham = $this->input->input_stream('tensanpham',TRUE);
            $this->tieude = $this->input->input_stream('tieude',TRUE);
            $this->danhmuc = $this->input->input_stream('danhmuc',TRUE);
            $this->thanhpho = $this->input->input_stream('thanhpho',TRUE);
            //echo $this->thanhpho;
            $this->tinhtrang = $this->input->input_stream('tinhtrang',TRUE);
            $this->gia = $this->input->input_stream('gia');
            $this->lienhe = $this->input->input_stream('lienhe',TRUE);
            $this->noidung = $this->input->input_stream('noidung',true);
            $this->vanchuyen = $this->input->input_stream('vanchuyen',TRUE);
            $this->hinhanh = $this->convert_image($this->input->post('hinhanh',TRUE));
            $this->ngaydang = date('Y-m-d H-i-s');
            $this->update = date('Y-m-d H-i-s');
            $this->trangthai = 3;
            $this->conhang = 1;
            
            $this->CI = &get_instance();
            $this->CI->load->library('Vnkey');
            $str_name = $this->CI->vnkey->vn_str_filter($this->tensanpham);
            
            $add_tag = $this->arr_danhmuc();
            $this->tag = $add_tag[$this->danhmuc].' '.$str_name;
            //echo $this->tinhtrang;
            $insert = array(
                'tensanpham' =>$this->tensanpham,
                'tieude' =>$this->tieude,
                'danhmuc_id' =>$this->danhmuc,
                'tinhthanh' =>$this->thanhpho,
                'tinhtrang' =>$this->tinhtrang,
                'gia' =>$this->gia,
                'lienhe' =>$this->lienhe,
                'noidung' =>$this->noidung,
                'ngaydang'=> $this->ngaydang,
                'vanchuyen' =>$this->vanchuyen,
                'hinhanh' =>$this->hinhanh,
                'trangthai' =>$this->trangthai,
                'conhang' => $this->conhang,
                'user_id' =>$this->user_id,
                'tag' => $this->tag,
                'update'=> $this->update,
            );
            //$mausac = '';
            //$tag = '';
            
            
            $CI =& get_instance();
            $CI->load->library('Check');
            
            $err['tensanpham'] = (!$this->check->check_name_sp($this->tensanpham)|| empty($this->tensanpham))?false:true; 
            $err['tieude'] = (empty($this->tieude))?false:true; 
            $err['danhmuc'] = (!$this->check->check_num($this->danhmuc)|| empty($this->danhmuc))?false:true; 
            $err['gia'] = (!$this->check->check_num($this->gia)|| empty($this->gia))?false:true;
            $err['thanhpho'] = (empty($this->thanhpho))?false:true;
            $err['tinhtrang'] = (empty($this->tinhtrang) || !$this->check->check_num_one($this->tinhtrang))?false:true;
            
            $err['lienhe'] = empty($this->lienhe)?false:true;
            $err['noidung'] = empty($this->noidung)?false:true;
            $err['hinhanh'] = empty($this->hinhanh)?false:true;
            $err['vanchuyen'] = empty($this->vanchuyen)?false:true;
            
            
            // test danh muc
            $full_err['danhmuc'] = '';
            if(!$this->test_danhmuc('test',$this->danhmuc)){
                var_dump($err);
                $full_err['danhmuc'] = 'Vui lòng nhập đầy đủ danh mục phần thông tin mở rộng';
                $err['danhmuc_thongtin'] = false;
            }
            // end test danh muc
                
            $full_err['full_err'] = $err;
            $full_err['insert'] = $insert;
            if(array_search(false,$err)){
                var_dump($full_err);
                $this->session->set_flashdata('message', 'Có lỗi xảy ra.');
                return $this->loadview('page/sanpham/dangsanpham',$full_err);
            }
            else{
                $id = null;
                if($this->Sanpham_model->insert_sp($insert)){
                    // lua chon sp co nguoi dang va time nhu tren se luu vao bang id max
                    // redirect to quan ly gian hang cho duyet
                    $array_list = array('user_id'=>$this->user_id,'ngaydang'=>$this->ngaydang);
                    $id = $this->Sanpham_model->get_id($array_list)== false?false:$this->Sanpham_model->get_id($array_list);
                    if(!$id){
                        echo 'Have an erro';
                        return ;
                    }
                    $inser_danhmuc = array(
                        'user_id' => $this->session->userdata('id'),
                        'sanpham_id' => $id,
                        'type' => $this->session->userdata('type')
                    );
                    if(!$this->Sanpham_model->set_danhmuc($inser_danhmuc)){
                        echo 'Have an erro';
                        return;
                    }
                }
                else{
                    $this->loadview('page/sanpham/dangsanpham',$insert);
                    return;
                }
                
                switch($this->danhmuc){
                    case 101:{
                        $this->ham_101($id);
                        break;
                    }
                    case 102:{
                        $this->ham_102($id);
                        break;
                    }
                    case 103:{
                        $this->ham_103($id);
                        break;
                    }
                    case 104:{
                        $this->ham_104($id);
                        break;
                    }
                    case 105:{
                        $this->ham_105($id);
                        break;
                    }
                    case 106:
                    {
                        $this->ham_106($id);
                        //echo 'chon 104';
                        break;
                    }
                    
                    case 201:
                    {
                        $this->ham_201($id);
                        //echo 'chon 101';
                        break;
                    }
                        
                    case 202:
                    {
                        $this->ham_202($id);
                        //echo 'chon 102';
                        break;
                    }
                        
                    case 203:
                    {
                        $this->ham_203($id);
                        //echo 'chon 103';
                        break;
                    }
                        
                    case 204:
                    {
                        $this->ham_204($id);
                        //echo 'chon 104';
                        break;
                    }
                        
                    case 301:
                    {
                        $this->ham_301($id);
                        //echo 'chon 101';
                        break;
                    }
                        
                    case 302:
                    {
                        $this->ham_301($id);
                        //echo 'chon 102';
                        break;
                    }
                        
                    case 303:
                    {
                        $this->ham_301($id);
                        //echo 'chon 103';
                        break;
                    }
                        
                    case 304:
                    {
                        $this->ham_301($id);
                        //echo 'chon 104';
                        break;
                    }
                        
                    case 305:
                    {
                        $this->ham_301($id);
                        //echo 'chon 105';
                        break;
                    }
                        
                    case 306:
                    {
                        $this->ham_306($id);
                        //echo 'chon 105';
                        break;
                    }
                    case 401:{
                        $this->ham_401($id);
                        break;
                    }
                    case 402:{
                        $this->ham_402($id);
                        break;
                    }
                    case 403:{
                        $this->ham_403($id);
                        break;
                    }
                    case 404:{
                        $this->ham_404($id);
                        break;
                    }
                    case 501:{
                        $this->ham_501($id);
                        break;
                    }
                    case 502:{
                        $this->ham_502($id);
                        break;
                    }
                    case 503:{
                        $this->ham_503($id);
                        break;
                    }
                    case 601:{
                        $this->ham_601($id);
                        break;
                    }
                    case 602:{
                        $this->ham_602($id);
                        break;
                    }
                    case 603:{
                        $this->ham_603($id);
                        break;
                    }
                    case 604:{
                        $this->ham_604($id);
                        break;
                    }
                    case 605:{
                        $this->ham_605($id);
                        break;
                    }
                    case 701:{
                        $this->ham_701($id);
                        break;
                    }
                    case 702:{
                        $this->ham_702($id);
                        break;
                    }
                    case 801:{
                        $this->ham_801($id);
                        break;
                    }
                }
                $this->session->set_flashdata('message', 'Thêm sản phẩm thành công ...');
                redirect(base_url().'home');
            }
            
        }
        
        function show_captcha(){
            $this->load->helper('captcha');
            $word = strtoupper(md5((microtime())));
            $word = substr($word,0,6);
            $this->session->set_userdata(['captcha'=>$word]);
            
            $vals = array(
                'word'          => $word,
                'img_path'      => './public/captcha/',
                'img_url'       => base_url().'public/captcha/',
                'font_path'     => './public/fonts/verdanab.ttf',
                'img_width'     => '120',
                'img_height'    => 30,
                'expiration'    => 5,   // thoi gian ton tai trong file
                'word_length'   => 6,
                'font_size'     => 16,
                'img_id'        => 'Imageid',
                'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
        
                // White background and border, black text and red grid
                'colors'        => array(
                        'background' => array(255, 255, 255),
                        'border' => array(255, 255, 255),
                        'text' => array(0, 0, 0),
                        'grid' => array(255, 40, 40)
                )
                );
                
                $cap = create_captcha($vals);
                echo $cap['image'];
        }
        
        function xacthuc_captcha(){
            $input = $_POST['input'];
            if($input != $this->session->userdata('captcha')){
                echo 'NOT';
                //return false;
            }
            else{
                echo 'MATCH';
            }
            //echo 'captcha '.$this->session->userdata('captcha');s
        }
        
        function test_danhmuc($id,$danhmuc){
            switch($danhmuc){
                    case 101:{
                        return $this->ham_101($id);
                        break;
                    }
                    case 102:{
                        return $this->ham_102($id);
                        break;
                    }
                    case 103:{
                        return $this->ham_103($id);
                        break;
                    }
                    case 104:{
                        return $this->ham_104($id);
                        break;
                    }
                    case 105:{
                        return $this->ham_105($id);
                        break;
                    }
                    case 106:
                    {
                        return $this->ham_106($id);
                        //echo 'chon 104';
                        break;
                    }
                    
                    case 201:
                    {
                        return $this->ham_201($id);
                        //echo 'chon 101';
                        break;
                    }
                        
                    case 202:
                    {
                        return $this->ham_202($id);
                        //echo 'chon 102';
                        break;
                    }
                        
                    case 203:
                    {
                        return $this->ham_203($id);
                        //echo 'chon 103';
                        break;
                    }
                        
                    case 204:
                    {
                        return $this->ham_204($id);
                        //echo 'chon 104';
                        break;
                    }
                        
                    case 301:
                    {
                        return $this->ham_301($id);
                        //echo 'chon 101';
                        break;
                    }
                        
                    case 302:
                    {
                        return $this->ham_301($id);
                        //echo 'chon 102';
                        break;
                    }
                        
                    case 303:
                    {
                        return $this->ham_301($id);
                        //echo 'chon 103';
                        break;
                    }
                        
                    case 304:
                    {
                        return $this->ham_301($id);
                        //echo 'chon 104';
                        break;
                    }
                        
                    case 305:
                    {
                        return $this->ham_301($id);
                        //echo 'chon 105';
                        break;
                    }
                        
                    case 306:
                    {
                        return $this->ham_306($id);
                        //echo 'chon 105';
                        break;
                    }
                    case 401:{
                        return $this->ham_401($id);
                        break;
                    }
                    case 402:{
                        return $this->ham_402($id);
                        break;
                    }
                    case 403:{
                        return $this->ham_403($id);
                        break;
                    }
                    case 404:{
                        return $this->ham_404($id);
                        break;
                    }
                    case 501:{
                        return $this->ham_501($id);
                        break;
                    }
                    case 502:{
                        return $this->ham_502($id);
                        break;
                    }
                    case 503:{
                        return $this->ham_503($id);
                        break;
                    }
                    case 601:{
                        return $this->ham_601($id);
                        break;
                    }
                    case 602:{
                        return $this->ham_602($id);
                        break;
                    }
                    case 603:{
                        return $this->ham_603($id);
                        break;
                    }
                    case 604:{
                        return $this->ham_604($id);
                        break;
                    }
                    case 605:{
                        return $this->ham_605($id);
                        break;
                    }
                    case 701:{
                        return $this->ham_701($id);
                        break;
                    }
                    case 702:{
                        return $this->ham_702($id);
                        break;
                    }
                    case 801:{
                        return $this->ham_801($id);
                        break;
                    }
            }
        }
        
        function ham_101($id = null){
            //$this->CI->danhmuc->ham_101($id);
            
            if($id == 'test'){
                $namdangki = $sokm = '';
                return $this->insert_table_test(array('namdangki','sokm'));
            }
            else{
                if(empty($id)){
                    $nam = $sokm = '';
                    for($i = 1980 ; $i <= date('Y'); $i++){
                        $nam .= '<option value="'.$i.'"> '.$i.' </option>';
                    }
                    $kmdau = 0;
                    $kmsau = 0;
                    for($i = 0 ; $i <= 48; $i++){
                        $kmsau =$kmdau+4999;
                        $sokm .= '<option value="'.$kmdau.'-'.$kmsau.'"> '.$kmdau.' - '.$kmsau.' </option>';
                        $kmdau += 5000;
                    }
                    $this->ham_center('Năm đăng kí',$nam,'namdangki','Số km đã đi',$sokm,'sokm');
                }
                else{
                    $namdangki = $sokm = '';
                    return $this->insert_table_danhmuc('phuongtien',array('namdangki','sokm'),$id);
                }
            }    
                
        }
        function ham_102($id = null){
            if($id == 'test'){
                return $this->insert_table_test(array('namdangki','sokm','hopso','loainhienlieu'));
            }
            else{
                if(empty($id)){
                $this->ham_101();
                $hopso = $loainhienlieu = '';
                $arr_hopso = array('Tự động','Số tay','Cả tự động và số tay');
                $arr_nhienlieu = array('Xăng','Diesel','Hybrid xăng và điện');
                $hopso .= '<option value="1">Tự động</option>';
                $hopso .= '<option value="2">Số tay</option>';
                $hopso .= '<option value="3">Cả tự động và số tay</option>';
                $loainhienlieu .= '<option value="1">Xăng</option>';
                $loainhienlieu .='<option value="2">Diesel</option>';
                $loainhienlieu .='<option value="3">Hybrid xăng và điện</option>';
                $this->ham_center('Hộp số',$hopso,'hopso','Loại nhiên liệu',$loainhienlieu,'loainhienlieu');
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array('namdangki','sokm','hopso','loainhienlieu'),$id);
                }
            }
        }
        function ham_103($id = null){
            if($id == 'test'){
                return $this->insert_table_test(array('loaixe','namdangki'));
            }
            else{
                if(empty($id)){
                    $loaixe = $namdangki = '';
                    $arr_loaixe = array('Mini nhật','Xe cao','Xe đạp điện','Chưa đăng kí');
                    $loaixe .= '<option value="1">Mini nhật</option>';
                    $loaixe .= '<option value="2">Xe cao</option>';
                    $loaixe .= '<option value="3">Xe đạp điện</option>';
                    $namdangki .= '<option value="4">Chưa đăng kí</option>';
                    for($i = 1 ; $i <= 10; $i++){
                        $namdangki .= '<option value="'.($i+1).'"> '.$i.' </option>';
                    }
                    $this->ham_center('Loại xe',$loaixe,'loaixe','Thời gian sử dụng',$namdangki,'namdangki');
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array('namdangki','loaixe'),$id);
                }
            }
        }
        function ham_104($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('trongluong','trongtai'));
            }
            else{
                if(empty($id)){
                    $this->ham_center3('Trọng Lượng','trongluong');
                    $this->ham_center3('Trọng tải','trongtai');
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array('trongluong','trongtai'),$id);
                }
            }
        }
        function ham_105($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array(),$id);
                }
            }
        }
        function ham_106($id = null){
            $this->ham_105($id);
        }
        function ham_201($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('diachi','sophong','dientich'));
            }
            else{
                if(empty($id)){
                    $this->ham_center3('Địa chỉ','diachi');
                    $sophong = '';
                    for($i = 1 ; $i <= 10; $i++){
                        $sophong .= '<option value="'.$i.'"> '.$i.' </option>';
                    }
                    $this->ham_center2('Số phòng',$sophong,'sophong','Diện tích(m2)','dientich');
                }
                else{
                    return $this->insert_table_danhmuc('batdongsan',array('diachi','sophong','dientich'),$id);
                }
            }
        }
        function ham_202($id = null){
            $this->ham_201($id);
        }
        function ham_203($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('diachi','dientich'));
            }
            else{
                if(empty($id)){
                    $this->ham_center3('Địa chỉ','diachi');
                    $this->ham_center3('Diện tích','dientich');
                }
                else{
                    return $this->insert_table_danhmuc('batdongsan',array('diachi','dientich'),$id);
                }
            }            
        }
        function ham_204($id = null){
            $this->ham_203($id);
        }
        function ham_301($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('xuatsu','khuyenmai','thuonghieu'));
            }
            else{
                if(empty($id)){
                    $xuatsu = $thuonghieu = '';
                    
                    $arr_xuatsu = array('Xách tay','Chính hãng','Không rõ xuất xứ');
                    $xuatsu .= '<option value="1">Xách tay</option>';
                    $xuatsu .= '<option value="2">Chính hãng</option>';
                    $xuatsu .= '<option value="3">Không rõ xuất xứ</option>';
                    
                    $arr_thuonghieu = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Obi','Wiko','Lenovo','HTC','Sony','MAC','ASUS','ACER','DELL','HP','Thương hiệu khác');
                    foreach($arr_thuonghieu as $key => $row){
                        $thuonghieu .= '<option value="'.($key+1).'">'.$row.'</option>';
                    }
                    $this->ham_center('Xuất xứ',$xuatsu,'xuatsu','Thương hiệu',$thuonghieu,'thuonghieu');
                    $this->ham_congnghe('khuyenmai');
                }
                else{
                    return $this->insert_table_danhmuc('dodientu',array('xuatsu','khuyenmai','thuonghieu'),$id);
                }
            }      
        }
        function ham_306($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('dodientu',array(),$id);
                }
            }
        }
        function ham_401($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('kichthuoc','chatlieu','mausac'));
            }
            else{
                if(empty($id)){
                    $kichthuoc = $chatlieu = $kieudang = $mausac = '';
                    $arr_kichthuoc = array(1,2,3,4,5,6,7,8,9,10,11,'F','L','M','S','XL','XS','XXL','XXS','XXXL');
                    
                    for($i = 0 ; $i < 11; $i++){
                        $kichthuoc .= '<option value="'.($i+1).'"> '.($i+1).' </option>';
                    }
                    $kichthuoc2 = array('F','L','M','S','XL','XS','XXL','XXS','XXXL');
                    $i = 12;
                    foreach($kichthuoc2 as $row){
                        $kichthuoc .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    }
                    // chat lieu
                    $chatlieu2 = array('Cotton','Thô','Kaki','Kate','Dạ / Nỉ','Jeans / Bò / Denim','Lanh / linen / tone ','Lụa',
                    'Lụa tơ tằm','Nilon / Nylon','Voan','Da','Ren','Len','Thun','Lưới','Nhung','Polyester','Chất liệu khác');
                    $j = 1;
                    foreach($chatlieu2 as $row){
                        $chatlieu .='<option value="'.$j.'">'.$row.'</option>';
                        $j++;
                    }
                    $this->ham_center('Kích thước',$kichthuoc,'kichthuoc','Chất liệu',$chatlieu,'chatlieu');
                    $arr_mausac = array('ffffff','000000','ff0000','112c4e','999999','0080ff','ffff00','800080','ffc0cb','ff8040','cccccc','fef1ce','804000','ffffff');
                    // mau sac
                    $mausac .= '<option value="1" style="background-color: #ffffff;">Trắng</option>';
                    $mausac .= '<option value="2" style="background-color: #000000;">Đen</option>';
                    $mausac .= '<option value="3" style="background-color: #ff0000;">Đỏ</option>';
                    $mausac .= '<option value="4" style="background-color: #112c4e;">Xanh đen</option>';
                    $mausac .= '<option value="5" style="background-color: #999999;">Xám</option>';
                    $mausac .= '<option value="6" style="background-color: #0080ff;">Xanh nước biển</option>';
                    $mausac .= '<option value="7" style="background-color: #ffff00;">Vàng</option>';
                    $mausac .= '<option value="8" style="background-color: #800080;">Tím</option>';
                    $mausac .= '<option value="9" style="background-color: #ffc0cb;">Hồng phấn</option>';
                    $mausac .= '<option value="10" style="background-color: #ff8040;">Cam</option>';
                    $mausac .= '<option value="11" style="background-color: #cccccc;">Bạc</option>';
                    $mausac .= '<option value="12" style="background-color: #fef1ce;">Kem</option>';
                    $mausac .= '<option value="13" style="background-color: #804000;">Nâu</option>';
                    $mausac .= '<option value="14" style="background-color: #ffffff;">Màu Khác</option>';
                    $this->ham_center4('Màu sắc',$mausac,'mausac');
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array('kichthuoc','chatlieu','mausac'),$id);
                }
            }     
        }
        function ham_402($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('thuonghieu','loaigiay','kichthuoc'));
            }
            else{
                if(empty($id)){
                    $thuonghieu = $loaigiay = $kichthuoc ='';
                    $i = 1;
                    $thuonghieu2 = array('Zara','Chaco','Tuvi\'s','Nike','Adidas','Massimo Dutti','Thương hiệu khác');
                    foreach($thuonghieu2 as $row){
                        $thuonghieu .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    } 
                    $j = 1;
                    $loaigiay2 = array('Giày da','Giày bệt','Giày cao','Giày lừa','Giày khác');
                    foreach($loaigiay2 as $row){
                        $loaigiay .='<option value="'.$j.'">'.$row.'</option>';
                        $j++;
                    }
                    $arr_kichthuoc = array();
                    for($i = 5 ; $i <= 50; $i++){
                        $arr_kichthuoc[$i-5] = $i;
                    }
                                
                    for($i = 5 ; $i <= 50; $i++){
                        $kichthuoc .= '<option value="'.$i.'"> '.$i.' </option>';
                    }
                    $this->ham_center('Thương hiệu',$thuonghieu,'thuonghieu','Loại giầy',$loaigiay,'loaigiay');
                    $this->ham_center4('Kích thước',$kichthuoc,'kichthuoc');
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array('thuonghieu','loaigiay','kichthuoc'),$id);
                }
            }      
            
        }
        function ham_403($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('thuonghieu','loaitui','kichthuoc'));
            }
            else{
                if(empty($id)){
                    $thuonghieu = $loaitui = $kichthuoc ='';
                    $i = 1;
                    $thuonghieu2 = array('Zara','Chaco','Tuvi\'s','Nike','Adidas','Massimo Dutti','Thương hiệu khác');
                    foreach($thuonghieu2 as $row){
                        $thuonghieu .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    } 
                    $j = 1;
                    $loaitui2 = array('Túi da','Zara','Zara','Zara','Zara','Zara','Loại khác');
                    foreach($loaitui2 as $row){
                        $loaitui .='<option value="'.$j.'">'.$row.'</option>';
                        $j++;
                    }            
                    for($i = 5 ; $i <= 50; $i++){
                        $kichthuoc .= '<option value="'.$i.'"> '.$i.' </option>';
                    }
                    $this->ham_center('Thương hiệu',$thuonghieu,'thuonghieu','Loại túi',$loaitui,'loaitui');
                    $this->ham_center4('Kích thước',$kichthuoc,'kichthuoc');
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array('thuonghieu','loaitui','kichthuoc'),$id);
                }
            }    
        }
        function ham_404($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array(),$id);
                }
            }
        }
        function ham_501($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('thuonghieu','dungtich','kieutu'));
            }
            else{
                if(empty($id)){
                    $thuonghieu = $kieutu = $dungtich ='';
                    $i = 1;
                    $thuonghieu2 = array('Sanyo','Panasonic','Sharp','Samsung(Hàn Quốc)','LG(Hàn Quốc)','Electrolux','Midea','Toshiba','Hitachi','Mitsubishi Electric','Aqua','Thương hiệu khác');
                    foreach($thuonghieu2 as $row){
                        $thuonghieu .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    }
                    
                    $j = 1;
                    $dungtich2 = array('Dưới 120 lít','120 -> 150 lít','150 -> 300 lít','300 -> 450 lít','Trên 450 lít');
                    foreach($dungtich2 as $rows){
                        $dungtich .='<option value="'.$j.'">'.$rows.'</option>';
                        $j++;
                    }
                    
                    $this->ham_center('Thương hiệu',$thuonghieu,'thuonghieu','Dung tích',$dungtich,'dungtich');
                    
                    $j = 1;
                    $kieutu2 = array('Mini','Ngăn đá trên','Ngăn đá dưới','Tủ lớn','Loại khác');
                    foreach($kieutu2 as $rows){
                        $kieutu .='<option value="'.$j.'">'.$rows.'</option>';
                        $j++;
                    }
                    $this->ham_center4('Kiểu tủ',$kieutu,'kieutu');
                }
                else{
                    return $this->insert_table_danhmuc('ngoaithat_giadung',array('thuonghieu','dungtich','kieutu'),$id);
                }
            }
        }
        function ham_502($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('donoithat'));
            }
            else{
                if(empty($id)){
                    $donoithat = '';
                    $i = 1;
                    $donoithat2 = array('Bàn ghế','Giường','Tủ','Đồ trang trí','Thiết bị vệ sinh','Tiểu cảnh sân vườn','Tiểu cảnh ban công');
                    foreach($donoithat2 as $row){
                        $donoithat .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    }
                    
                    $this->ham_center4('Đồ nội thất, cây cảnh',$donoithat,'donoithat');
                }
                else{
                    return $this->insert_table_danhmuc('ngoaithat_giadung',array('donoithat'),$id);
                }
            }
        }
        function ham_503($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('ngoaithat_giadung',array(),$id);
                }
            }
        }
        function ham_601($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('vethucung'));
            }
            else{
                if(empty($id)){
                    $vethucung = '';
                    $i = 1;
                    $vethucung2 = array('Chó cảnh','Mèo cảnh','Dịch vụ thú cưng','Phụ kiện thú cưng','Thực phẩm thú cưng','Thú cưng khác');
                    foreach($vethucung2 as $row){
                        $vethucung .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    }
                    
                    $this->ham_center4('Về thú cưng',$vethucung,'vethucung');
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array('vethucung'),$id);
                }
            }
        }
        function ham_602($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('danhmucsach'));
            }
            else{
                if(empty($id)){
                    $danhmucsach = '';
                    $i = 1;
                    $danhmucsach2 = array('Sách ngoại văn','Sách kinh tế','Sách văn học trong nước','Sách văn học nước ngoài','Sách thường thức đời sống','Sách thiếu nhi','Sách phát triển bản thân','Sách tin học ngoại ngữ','Sách chuyên ngành','Sách giáo khoa- giáo trình','Tạp chí văn phòng phẩm','Sách khác');
                    foreach($danhmucsach2 as $row){
                        $danhmucsach .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    }
                    
                    $this->ham_center4('Danh mục sách',$danhmucsach,'danhmucsach');
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array('danhmucsach'),$id);
                }
            }
        }
        function ham_603($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array(),$id);
                }
            }
        }
        function ham_604($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('dothethao_dangoai'));
            }
            else{
                if(empty($id)){
                    $dothethao_dangoai = '';
                    $i = 1;
                    $dothethao_dangoai2 = array('Vật dụng cần thiết','Quần áo','Đồ dùng cá nhân','Dụng cụ nấu nướng','Thực phẩm','Dụng cụ cắm trại,nghỉ ngơi','Dụng cụ cầu cứu','Dụng cụ leo núi','Túi “mưu sinh”','Túi cứu thương');
                    foreach($dothethao_dangoai2 as $row){
                        $dothethao_dangoai .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    }
                    
                    $this->ham_center4('Loại đồ thể thao/ dã ngoại',$dothethao_dangoai,'dothethao_dangoai');
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array('dothethao_dangoai'),$id);
                }
            }
        }
        function ham_605($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array(),$id);
                }
            }
        }
        function ham_701($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('dovanphong'));
            }
            else{
                if(empty($id)){
                    $dovanphong = '';
                    $i = 1;
                    $dovanphong2 = array('giấy in','bìa các loại','băng keo','tập, vở, sổ','văn phòng phẩm khác','Nhu yếu phẩm');
                    foreach($dovanphong2 as $row){
                        $dovanphong .='<option value="'.$i.'">'.$row.'</option>';
                        $i++;
                    }
                    
                    $this->ham_center4('Đồ dùng văn phòng',$dovanphong,'dovanphong');
                }
                else{
                    return $this->insert_table_danhmuc('vanphong',array(),$id);
                }
            }
        }
        function ham_702($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('vanphong',array(),$id);
                }
            }
        }
        function ham_801($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('sanphamkhac',array(),$id);
                }
            }
        }
        function ham_congnghe($name =null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>Khuyến mãi</p>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="'.$name.'" style="width: 100%;" rows="10" class="form-control" id="editor1"></textarea>
                                    <script>
                                           CKEDITOR.replace( "editor1" );
                                    </script> 
                                </div>';
            echo $a;
        }
        function ham_center($one = null,$two = null,$name1 =null,$three = null,$four = null,$name2 =null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <select class="form-control" name="'.$name1.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$one.'»</option>
                                        '.$two.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p>'.$three.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <select  class="form-control" name="'.$name2.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$three.'»</option>
                                        '.$four.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                            </div>';
            echo $a;
            
        }
        function ham_center2($one = null,$two = null,$name1 = null,$three = null,$four = null,$name2 =null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <select class="form-control" name="'.$name1.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$one.'»</option>
                                        '.$two.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p>'.$three.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <input class="form-control" type="text" placeholder="Không được để trống" name="'.$name2.'"/>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                            </div>';
            echo $a;
            
        }
        function ham_center3($one = null,$name1){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="text_input">
                                        <input class="form-control" type="text" placeholder="Không được để trống" name="'.$name1.'"/>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                            </div>';
            echo $a;
        }
        function ham_center4($one = null,$two = null,$name1 = null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="text_input">
                                        <select class="form-control" name="'.$name1.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$one.'»</option>
                                        '.$two.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                                
                            </div>';
            echo $a;
        }
        
        /**
         * 
         * fun save data into table is pram
         * @pram table: danhmucsp, data = array(fiel danhmucsp), id is insert
         * @return true or false
         * 
         * */
        function insert_table_danhmuc($table =null,$data = null,$id =null){
            $thongso = array('id' =>$id);
            if(count($data)>0){
               foreach($data as $row){
                   if(!isset($_POST[$row])){
                        return false;
                   }
                   $thongso[$row] = $this->input->input_stream($row,TRUE);
                } 
            }
            
            //$this->load->model('Sanpham_model');
            return $this->Sanpham_model->insert_danhmuc($table,$thongso);            
        }
        
        /**
         * 
         * fun test null data
         * @pram data : gia tri truyen vao
         * @return bool
         * 
         * */
        function insert_table_test($data){
            foreach($data as $row){
                if($row == 'khuyenmai'){
                    return true;
                }
                if(!isset($_POST[$row])){
                    return false;
                }
                $a = $this->input->input_stream($row,TRUE);
                if(empty($a)){
                    return false;
                }
            }
            return true;
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
        
        function load_thongtin(){
            //$err_full = array('id' => null);
            //$err_full['id'] = 'Vui lòng chọn loại sản phẩm ...';
            if(!isset($_POST['id'])){
                $err_full['id'] = 'Vui lòng chọn loại sản phẩm ...';
                $id = null;
            }
            else{
                $id = $_POST['id'];
            }
            switch ($id) {
                case 101:
                {
                    $this->ham_101();
                    //echo 'chon 101';
                    break;
                }
                    
                case 102:
                {
                    $this->ham_102();
                    //echo 'chon 102';
                    break;
                }
                    
                case 103:
                {
                    $this->ham_103();
                    //echo 'chon 103';
                    break;
                }
                    
                case 104:
                {
                    $this->ham_104();
                    //echo 'chon 104';
                    break;
                }
                    
                case 105:
                {
                    $this->ham_105();
                    //echo 'chon 105';
                    break;
                }
                
                case 106:
                {
                    $this->ham_106();
                    //echo 'chon 104';
                    break;
                }
                
                case 201:
                {
                    $this->ham_201();
                    //echo 'chon 101';
                    break;
                }
                    
                case 202:
                {
                    $this->ham_202();
                    //echo 'chon 102';
                    break;
                }
                    
                case 203:
                {
                    $this->ham_203();
                    //echo 'chon 103';
                    break;
                }
                    
                case 204:
                {
                    $this->ham_204();
                    //echo 'chon 104';
                    break;
                }
                    
                case 301:
                {
                    $this->ham_301();
                    //echo 'chon 101';
                    break;
                }
                    
                case 302:
                {
                    $this->ham_301();
                    //echo 'chon 102';
                    break;
                }
                    
                case 303:
                {
                    $this->ham_301();
                    //echo 'chon 103';
                    break;
                }
                    
                case 304:
                {
                    $this->ham_301();
                    //echo 'chon 104';
                    break;
                }
                    
                case 305:
                {
                    $this->ham_301();
                    //echo 'chon 105';
                    break;
                }
                    
                case 306:
                {
                    $this->ham_306();
                    //echo 'chon 105';
                    break;
                }
                case 401:{
                    $this->ham_401();
                    break;
                }
                case 402:{
                    $this->ham_402();
                    break;
                }
                case 403:{
                    $this->ham_403();
                    break;
                }
                case 404:{
                    $this->ham_404();
                    break;
                }
                case 501:{
                    $this->ham_501();
                    break;
                }
                case 502:{
                    $this->ham_502();
                    break;
                }
                case 503:{
                    $this->ham_503();
                    break;
                }
                case 601:{
                    $this->ham_601();
                    break;
                }
                case 602:{
                    $this->ham_602();
                    break;
                }
                case 603:{
                    $this->ham_603();
                    break;
                }
                case 604:{
                    $this->ham_604();
                    break;
                }
                case 605:{
                    $this->ham_605();
                    break;
                }
                case 701:{
                    $this->ham_701();
                    break;
                }
                case 702:{
                    $this->ham_702();
                    break;
                }
                case 801:{
                    $this->ham_801();
                    break;
                }
                default:
                    
                break;
            }
        }
        function upload_img(){
            //$this->session->set_userdata(array('id'=>1));
            // cau hinh va goi thu vien upload
            $this->user_id = $this->session->userdata('id');
            $time_stamp = date('Y-m-d H-i-s');
            $config['file_name']= $this->user_id.' '.$time_stamp;
            $config['upload_path'] = 'public/sanpham';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 2*1024;
            //$config['max_width'] = 1024;
            //$config['max_height'] = 768;
            
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload("img_sanpham")){
                //$error = array('error' => $this->upload->display_errors());
                echo 'Error';
            }
            else{
                // tao anh thumbnail
                $CI =& get_instance();
                $CI->load->library('Thumbnailimage');
                $this->thumbnailimage->load(base_url().'public/sanpham/'.$this->upload->data('file_name'));
                $this->thumbnailimage->resizeToWidth(150);
                $this->thumbnailimage->save('public/sanpham/thumb/thumb-'.$this->upload->data('file_name'));
                
                //echo '<img src="'.base_url().'public/sanpham/thumb/thumb-'.$this->upload->data('file_name').'" />';
                //echo 'Upload success';
                //echo base_url().'public/sanpham/thumb/thumb-'.$this->upload->data('file_name').'';
                echo $this->upload->data('file_name');
            }
            
            sleep(1);
            //The image you are attempting to upload doesn't fit into the allowed dimensions
            // hinh anh co kich thuoc khong cho phep
        }
    }
?>