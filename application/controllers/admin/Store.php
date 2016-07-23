<?php
    class Store extends CI_Controller{
        public $CI = null;
        function __construct(){
            parent::__construct();
            $this->load->library('session');
            if($this->session->userdata('email') == ''){
                return redirect(base_url().'admin/login');
            }
            $this->load->model('Store_model');
        }
        
        function index(){
            $this->CI = & get_instance();
            $this->CI->load->library('Functions');
            $config = array(
                'url' => 'admin/store/index',
                'total' => $this->Store_model->get_total_store(),
                'recond' => 2,
                'uri' => 4,
                'hienthi' => true
            );
            $data = $this->CI->functions->pagination_page($config['url'],$config['total'],$config['recond'],$config['uri'],$config['hienthi']);
            //var_dump($data);
            $result = $this->Store_model->get_store($config['recond'],$data['get_index']);
            $data['danhsach'] = $result;
            //var_dump($result);
            $this->loadview('admin/store/form_store',$data);
        }
        
        function form_edit($store_id = null){
            if(empty($store_id)){
                return redirect(base_url().'admin/store');
            }
            $data['row'] = $this->Store_model->get_store_id($store_id);
            $data['count'] = $this->Store_model->count_store_sp($store_id);
            //echo $data['count'];
            $result = $this->Store_model->store_sanpham($store_id);
            $data['sanpham'] = $result['sanpham'];
            $data['danhmuc'] = $result['danhmuc'];
            //var_dump($data);
            $this->loadview('admin/store/edit_store',$data);
        }
        
        function action_click($id = null){
            $store_id = $id;
            //echo $store_id;
            if(isset($_POST['spam_store'])){
                return $this->action_spam_store($store_id);
            }
            if(isset($_POST['duyet_store'])){
               return $this->action_duyet_store($store_id); 
            }
        }
        
        public function action_spam_store($store_id){
            if($this->Store_model->set_trangthai($store_id,3)){
                echo '<script>alert("Cập nhập thành công ...")</script>';
                return $this->index();
            }
            else{
                echo '<script>alert("Cập nhập thất bại ...")</script>';
                return $this->index();
            }
        }
        
        public function action_duyet_store($store_id){
            if($this->Store_model->set_trangthai($store_id,1)){
                echo '<script>alert("Cập nhập thành công ...")</script>';
                return $this->index();
            }
            else{
                echo '<script>alert("Cập nhập thất bại ...")</script>';
                return $this->index();
            }
        }
        
        /**
         * 
         * load page default
         * @param url page child
         * @param data array
         * return view
         * 
         * */
        public function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('admin/main',$datas);
        }
    }
?>