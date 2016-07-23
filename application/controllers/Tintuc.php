<?php
    class Tintuc extends CI_Controller{
        
        public $CI;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Tintuc_model');
            $this->CI = &get_instance();
        }
        
        function index(){
            $data = $this->get_tintuc_both();
            $this->loadview('page/tintuc/form_tintucs',$data);
        }
        
        public function get_tintuc_both(){
            $this->CI->load->library('Functions');
            $this->load->model('Tintuc_model');
            // cau hinh thu vien phan trang
            $phantrang = array('total' => $this->Tintuc_model->get_all_show(),'so_record' => 5,'get_index' =>3);
            // goi thu vien phan trang va lay phan trang tra ve trang index
            $data = $this->CI->functions->pagination_page('tintuc/index',$phantrang['total'],$phantrang['so_record'],$phantrang['get_index'],true);
            // goi ham lay du lieu trong csdl limit 5,0
            $data['get_data'] = $this->Tintuc_model->get_show($phantrang['so_record'],$data['get_index']);
            return $data;
        }
        
        function chitiet_tintuc($id = null){
            if(empty($id)){
                return redirect(base_url().'page/tintuc/');
            }
            $data = $this->Tintuc_model->get_info_id($id);
            $this->loadview('page/tintuc/chitiet',$data);
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