<?php
    class Phanhoi extends CI_Controller{
        public $email;
        private $noidung;
        public $thongtin;
        private $created_at;
        private $duyetbai;
        public $CI;
        public $message;
        
        function __construct(){
            parent::__construct();
            
            $this->load->library('session');
            if($this->session->userdata('email') == ''){
                return redirect(base_url().'admin/login');
            }
            
            $this->load->model('Phanhoi_model');
            
        }
        
        function index(){
            $result = $this->Phanhoi_model->get_ph();
            $data['phanhoi'] = $result;
            $this->loadview('admin/phanhoi/index',$data);
        }
        
        function chitiet($id){
            $result = $this->Phanhoi_model->get_one($id);
            $this->loadview('admin/phanhoi/chitiet',$result);
        }
        
        function action_sent(){
            if(isset($_POST['btnduyet'])){
                $info = '<h4>Vshop cám ơn đã phản hồi :</h4><br/>';
                //$this->email = $this->input->post('email');
                $this->email = 'gunni@gmail.com';
                $info .= $this->input->post('thongtin');
                if($this->sent_email('gunni@gmail.com',$info)){
                    echo '<script>alert("Đã phản hồi tới người dùng thành công")</script>';
                    //$this->Sanpham_model->del_sp($sanpham_id);
                    //return redirect(base_url().'admin/sanpham');
                }
                else{
                    echo '<script>alert("Không thể báo cáo tới người dùng")</script>';
                    //return redirect(base_url().'admin/sanpham');
                }
            }
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
            $this->email->from('anynomous868686@gmail.com', 'Your Name');
            $this->email->to($your_email);
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');
            
            $this->email->subject('Email tu website batheitblog sent');
            $this->email->message('Click vào link sau để xác nhận : '.$info_sent);
            $result = $this->email->send();  
            return $result;
        }
        
        function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('admin/main',$datas);
        }
    }
?>