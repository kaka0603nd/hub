<?php
    class Dangnhap extends CI_Controller{
        public $CI;
        function __construct(){
            parent::__construct();
            $this->load->model('User_model');
            $this->load->helper(array('url','cookie'));
            // load thu vien open
            $this->CI =& get_instance();
            $this->load->library(array('check','session'));
            
        }
        function index(){
            $this->loadview('page/login/log');
        }
        function loguser(){
            $name = $this->input->input_stream('name',TRUE);
            $passwd = $this->input->input_stream('passwd',TRUE);
            $remember = $this->input->post('remember');
            
            $tinhtrang = true;
            $err_full = array();
            //$err_full = array('name' => null,'passwd' => null,'login' => null);
            // test trong
            $err_full = array(
                'name' => empty($name)?false:true,
                'passwd' => empty($passwd)?false:true
            );
            //$err_full['name'] .= empty($name)?false:true;
            //$err_full['passwd'] .= empty($passwd)?false:true;
            // test class open
            
            if(array_search(false,$err_full)){
                $tinhtrang = false;
            }
            if($tinhtrang){
                //$passwd = md5($passwd);
                $login_by = filter_var($name,FILTER_VALIDATE_EMAIL)?'email':'name';
                switch($login_by){
                    case 'name' : {
                        $this->CI->load->library('Auth');
                        if($this->CI->auth->process_login_user(array($name,$passwd),'name')){
                            $this->load->model('Sanpham_model');
                            $trangthai_ok = $this->Sanpham_model->get_user_store_session($this->session->userdata('id'),$this->session->userdata('type'));
                            if($trangthai_ok['trangthai'] == 2){
                                echo 'Chưa xác nhận';
                                $this->session->set_flashdata('message', 'Hãy vào email để xác nhận tài khoản ...');
                                return redirect(base_url().'dangnhap');
                            }
                            else{
                                if($trangthai_ok['trangthai'] == 3){
                                    echo 'Chưa xác nhận';
                                    $this->session->set_flashdata('message', 'Tài khoản đã bị chặn.');
                                    return redirect(base_url().'dangnhap');
                                }
                            }
                            if(!empty($remember)){
                                set_cookie('name_soft',$name,time() + (86400 * 30));
                                set_cookie('passwd_soft',$passwd,time() + (86400 * 30));
                            }
                            redirect(base_url().'home');
                        }
                        else{
                            $err_full['login'] = 'Sai tên đăng nhập hoặc mật khẩu !';
                            return $this->loadview('page/login/log',$err_full);
                        }
                    }
                    break;
                    
                    case 'email' : {
                        $this->CI->load->library('Auth');
                        if($this->CI->auth->process_login_user(array($name,$passwd),'email')){
                            $this->load->model('Sanpham_model');
                            $trangthai_ok = $this->Sanpham_model->get_user_store_session($this->session->userdata('id'),$this->session->userdata('type'));
                            if($trangthai_ok['trangthai'] == 2){
                                echo 'Chưa xác nhận';
                                $this->session->set_flashdata('message', 'Hãy vào email để xác nhận tài khoản ...');
                                return redirect(base_url().'dangnhap');
                            }
                            else{
                                if($trangthai_ok['trangthai'] == 3){
                                    echo 'Chưa xác nhận';
                                    $this->session->set_flashdata('message', 'Tài khoản đã bị chặn.');
                                    return redirect(base_url().'dangnhap');
                                }
                            }
                            if(!empty($remember)){
                                set_cookie('name_soft',$name,time() + (86400 * 30));
                                set_cookie('passwd_soft',$passwd,time() + (86400 * 30));
                            }
                            redirect(base_url().'home');
                        }
                        else{
                            $err_full['login'] = 'Sai tên đăng nhập hoặc mật khẩu !';
                            return $this->loadview('page/login/log',$err_full);
                        }
                    }
                        
                    break;
                }
            }
            else{
                $check = array(
                    'check' => 'Vui lòng nhập đầy đủ tên và mật khẩu'
                );
                return $this->loadview('page/login/log',$check);
            }
            
            
        }
        
        function logout(){
            $this->session->sess_destroy();
            redirect(base_url().'home');
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