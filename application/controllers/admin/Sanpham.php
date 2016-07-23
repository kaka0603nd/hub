<?php
    class Sanpham extends CI_Controller{
        
        public $CI = null;
        function __construct(){
            parent::__construct();
            $this->load->library('session');
            if($this->session->userdata('email') == ''){
                return redirect(base_url().'admin/login');
            }
            $this->load->model('Sanpham_model');
            $this->load->helpers(array('url','form'));
        }
        
        function index(){
            $this->CI = & get_instance();
            $this->CI->load->library('Functions');
            $arr = array(
                'urls' => 'admin/sanpham/index',
                'totals' => $this->Sanpham_model->count_sp(),
                'reconds' => 4,
                'uris' => 4,
                'hienthis' => true
            );
            $data = $this->CI->functions->pagination_page($arr['urls'],$arr['totals'],$arr['reconds'],$arr['uris'],$arr['hienthis']);
            $result = $this->Sanpham_model->show_all($arr['reconds'],$data['get_index']);
            $data['danhsach'] = $result;
            
            
            $this->loadview('admin/sanpham/form_dssp',$data);
        }
        
        function show_phantrang(){
            
        }
        
        public function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('admin/main',$datas);
        }
        
        public function form_edit_sanpham($id =null,$danhmuc_sanpham =null){
            if(empty($id) || empty($danhmuc_sanpham)){
                return redirect(base_url().'admin/sanpham/');
            }
            $this->Sanpham_model->update_choduyet($id);
            $data['data'] = $this->Sanpham_model->show_by_sanpham($id,$danhmuc_sanpham);
            $array_str = $this->Sanpham_model->show_by_sanpham_morong($id,$danhmuc_sanpham);
            $array_null = array();
            
            foreach($array_str as  $key =>  $row){
                if(!empty($array_str[$key]) && $key != 'id'){
                    $array_null[$key] = $array_str[$key];
                }
            }
            $data['extend'] = $array_null;
            //var_dump($array_null);
            return $this->loadview('admin/sanpham/form_scansp',$data);
        }
        
        public function action_duyetform($sanpham_id = null,$danhmuc_sanpham = null){
            $user_admin_id = $this->session->userdata('id');
            if(empty($sanpham_id) || empty($danhmuc_sanpham)){
                return redirect(base_url().'admin/sanpham/');
            }
            if(isset($_POST['btnxong'])){
                return $this->_action_xong($sanpham_id,$user_admin_id);    // ok
            }
            if(isset($_POST['btnbaocao'])){
                return $this->_action_baocao($sanpham_id,$user_admin_id); // watting ...
            }
            if(isset($_POST['btn_nguoidungspam']) ){
                return $this->_action_nguoidungspam($sanpham_id,$danhmuc_sanpham);
            }
        }
        
        private function _action_xong($sanpham_id,$user_admin_id){
            if($this->Sanpham_model->update_duyetform($sanpham_id,1,$user_admin_id)){
                echo '<script>alert("Duyệt thành công")</script>';
                return redirect(base_url().'admin/sanpham');
            }
            else{
                echo '<script>alert("Duyệt không thành công")</script>';
                return $this->index();
            }
        }
        
        private function _action_baocao($sanpham_id,$user_admin_id){
            $md5_id = md5($sanpham_id);
            $sent_info = '<h4>Chúng tôi đã tìm thấy có sự nhầm lẫn trong sản phẩm bạn đăng</h4><br/>';
            $baocao = $this->input->post('danhsach_baocao');
            $ghichu = $this->input->post('ghichu');
            $sent_info .= $ghichu.'<br/>';
            $sent_info .= $baocao.'<br/>';
            $sent_info = '<h4>Vui lòng click vào link sau để cập nhập lại</h4><br/>';
            
            // lay thong tin nguoi dung bang id san pham
            $get_user = $this->Sanpham_model->show_user_by($sanpham_id);    
            $email_user = $get_user['email'];
            // link dung de update san pham
            $sent_info .= base_url().'admin/sanpham/'.$md5_id.'/'.$get_user['hack_email'];
            
            // da duyet form va khong hien thi
            $this->Sanpham_model->update_duyetform($sanpham_id,2,$user_admin_id);
            
            if($this->sent_email($email_user,$sent_info)){
                echo '<script>alert("Đã báo cáo tới người dùng thành công")</script>';
                return redirect(base_url().'admin/sanpham');
            }
            else{
                echo '<script>alert("Không thể báo cáo tới người dùng")</script>';
                return redirect(base_url().'admin/sanpham');
            }
        }
        
        /**
         * 
         * function user click spam 
         * @param idsanpham 
         * @param danhmuc_sanpham
         * @return bool
         * 
         * */
        private function _action_nguoidungspam($sanpham_id,$danhmuc_sanpham){
            // lay thong tin gui toi nguoi dung
            $sent_info = '<h4>Sản phẩm không được hiển thị do có những lỗi đáng nghiêm trọng vui lòng kiểm tra lại</h4><br/>';
            $baocao = $this->input->post('danhsach_baocao');
            $ghichu = $this->input->post('ghichu');
            $sent_info .= $ghichu.'<br/>';
            $sent_info .= $baocao.'<br/>';
            // lay email nguoi dung
            $get_user = $this->Sanpham_model->show_user_by($sanpham_id);    // lay thong tin nguoi dung bang id san pham
            $email_user = $get_user['email'];
            
            if($this->sent_email($email_user,$sent_info)){
                echo '<script>alert("Đã báo cáo tới người dùng thành công")</script>';
                $this->Sanpham_model->del_sp($sanpham_id);
                return redirect(base_url().'admin/sanpham');
            }
            else{
                echo '<script>alert("Không thể báo cáo tới người dùng")</script>';
                return redirect(base_url().'admin/sanpham');
            }
            
        }
        
        /**
         * 
         * show sp da duyet
         * @return void
         * 
         * */
        public function da_duyet(){
            $this->menu_select('da_duyet',1);
        }
        
        function chua_duyet(){
            $this->menu_select('chua_duyet',3);
        }
        
        function bao_cao(){
            $this->menu_select('bao_cao',1,2);
        }
        
        function menu_select($trangthai,$value,$show = null){
            $this->CI = & get_instance();
            $this->CI->load->library('Functions');
            $arr = array(
                'urls' => 'admin/sanpham/'.$trangthai.'/',
                'totals' => $this->Sanpham_model->count_sp_trangthai($value),
                'reconds' => 4,
                'uris' => 4,
                'hienthis' => true
            );
            $data = $this->CI->functions->pagination_page($arr['urls'],$arr['totals'],$arr['reconds'],$arr['uris'],$arr['hienthis']);
            $result = $this->Sanpham_model->show_sp_trangthai($value,$show,$arr['reconds'],$data['get_index']);
            $data['danhsach'] = $result;
            //var_dump($data);
            $this->loadview('admin/sanpham/form_dssp',$data);
        }
        
        function get_search($type = null,$key =null){
            if(isset($_POST['btnsub'])){
                $type = $this->input->post_get('select_danhmuc');
                $key = $this->input->post_get('key_work');
            }
            $err['type'] = empty($type)?false:true;
            $err['key'] = empty($key)?false:true;
            if(array_search(false,$err) != ''){
                echo '<script>alert("Vui lòng chọn kiểu tìm kiếm và nhập vào khóa ...")</script>';
                return $this->index();
            }
            $arr_list = explode(' ',$key);
            $results = $this->Sanpham_model->get_search($type,$arr_list);
            //var_dump($results);
            if(!$results){
                $this->loadview('admin/search/sanpham/search_err_sp');
            }
            else{
                $this->CI = & get_instance();
                $this->CI->load->library('Functions');
                $arr = array(
                    'urls' => 'admin/sanpham/get_search/'.$type.'/'.$key.'',
                    'totals' => $this->Sanpham_model->count_search($type,$arr_list),
                    'reconds' => 2,
                    'uris' => 6,
                    'hienthis' => true
                );
                $data = $this->CI->functions->pagination_page($arr['urls'],$arr['totals'],$arr['reconds'],$arr['uris'],$arr['hienthis']);
                $result = $this->Sanpham_model->get_search($type,$arr_list,$arr['reconds'],$data['get_index']);
                
                $data['danhsach'] = $result;
                $this->loadview('admin/search/sanpham/search_sp',$data);
                
            }
            //echo $this->vn_str_filter('Có phải em là mùa thu Hà Nội');
        }
        
        
        
        /**
         * 
         * pugin sent mail mở rộng
         * @param email nguoi nhan
         * @param thong tin can gui
         * @return bool
         * 
         * */
        public function sent_email($your_email,$info_sent){
            //echo date('h-i-s');
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                //'smtp_port' => 587,
                'smtp_user' => 'anynomous868686@gmail.com',
                'smtp_pass' => '06031994',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8' //chartset bạn cấu hình theo cách của bạn.
            );
            
            $this->load->library('email', $config);
            
            $this->email->set_newline("\r\n");
            $this->email->from('kaka0603nd@gmail.com', 'Your Name');
            $this->email->to($your_email);
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');
            
            $this->email->subject('Email tu website batheitblog sent');
            $this->email->message('Click vào link sau để xác nhận : '.$info_sent);
            $result = $this->email->send();  
            return $result;
        }
    }
?>