<?php
    class Thongke extends CI_Controller{
        private $id;
        public $CI = null;
        function __construct(){
            parent::__construct();
            $this->load->library('session');
            if($this->session->userdata('email') == ''){
                return redirect(base_url().'admin/login');
            }
            
            $this->load->library('session');
            $this->session->set_userdata(array('id'=>'1'));
            $this->CI = & get_instance();
            $this->load->model('Sanpham_model');
        }
        
        function index(){
            
            $this->loadview('admin/dasbar/form_thongke');
        }
        
        public function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('admin/main',$datas);
        }
    }
?>