<?php
    class Login extends CI_Controller{
        public $CI = null;
        public $name =null;
        public $email1 =null;
        public $mahoa_email = null;
        public $id =null;
        public $password =null;
        function __construct(){
            parent::__construct();
            $this->CI = & get_instance();
            $this->CI->load->library('Auth');
            $this->load->library('session');
        }
        
        function index(){
            $this->load->view('admin/form_login');
        }
        
        /**
         * void submit login
         * return void
         * */
        function action(){
            $this->email1 = $this->input->input_stream('email');
            $this->password = $this->input->input_stream('password');
            
            if($this->CI->auth->process_login(array($this->email1,$this->password))){
                //echo 'success';
                //echo $this->session->userdata('email');
                return redirect(base_url().'admin/sanpham');
            }
            else{
                $data = array('thongtin' => '','email' => '');
                if($this->CI->auth->exit_email($this->email1)){
                    $data['email'] = 'Email tồn tại ';
                }
                $this->load->view('admin/form_login',$data);
            }
        }
        
        /**
         * click reset tai khoan hien thi form reset password
         * 
         * */
        function form_reset(){
            $this->load->view('admin/form_resetpass');
        }
        
        /**
         * nhap email de reset pass
         * neu email chinh xac thi gui email va ve trang login
         * neu khong phai email thi quay lai trang form_reset
         * */
        function reset(){
            $this->email1 = $this->input->input_stream('email');
            $id = md5($this->id);
            $this->mahoa_email = md5($this->email1);
            $data = array('email' => '');
            if($this->CI->auth->exit_email($this->email1)){
                $info_sent = base_url().'admin/login/action_reset/'.$id.'/'.$this->mahoa_email;
                $this->sent_email($this->email1,$info_sent);
                echo '<script>alert("Gửi mail thành công vui lòng vào email của bạn để xác nhận")</script>';
                redirect(base_url().'admin/login/index');
            }
            else{
                echo '<script>alert("mail này không tồn tại vui lòng kiểm tra lại")</script>';
                $this->load->view('admin/form_resetpass',$data);
            }
        }
        
        /**
         * form hien thi form de doi mat khau
         * 
         * */
        function form_reset_chil($id,$email){
            $data = array('id' => $id,'email' =>$email);
            return $this->load->view('admin/form_resetpass2',$data);
        }
        /**
         * kiem tra su ton tai cua email
         * 
         * */
        function action_reset($id = null,$email = null){
            $hack = (empty($id) || empty($email))?false:true;
            
            if($hack){
                redirect(base_url().'admin/login/form_reset_chil/'.$id.'/'.$email);
            }
            //$this->load->view('admin/form_login');
            else{
                redirect(base_url().'admin/login');
            }
            
        }
        
        function change_password($id = null,$email = null){
            echo $id.'-'.$email;
        }
        
        function logout(){
            $this->session->sess_destroy();
            return redirect(base_url().'admin/login');
        }
        
        public function sent_email($your_email,$info_sent){
            //echo date('h-i-s');
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'bathe0603nd@gmail.com',
                'smtp_pass' => '163266270',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8' //chartset bạn cấu hình theo cách của bạn.
            );
            
            $this->load->library('email', $config);
            
            $this->email->set_newline("\r\n");
            $this->email->from('bathe0603nd@gmail.com', 'Your Name');
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