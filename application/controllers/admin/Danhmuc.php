<?php
    class Danhmuc extends CI_Controller{
        public $CI = null;
        public $id;
        public $name;
        public $date;
        public $danhmuc_sanpham;
        function __construct(){
            parent::__construct();
            $this->load->library('session');
            if($this->session->userdata('email') == ''){
                return redirect(base_url().'admin/login');
            }
            $this->load->model('Danhmuc_model');            
        }
        function index(){
            $data['danhmuc'] = $this->Danhmuc_model->get_danhmuc();
            $this->loadview('admin/danhmuc/form_danhmuc',$data);
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