<?php
    class User extends CI_Controller{
        public $CI = null;
        function __construct(){
            parent::__construct();
            $this->load->library('session');
            if($this->session->userdata('email') == ''){
                return redirect(base_url().'admin/login');
            }
            $this->load->model('User_model');
        }
        
        function index(){
            $this->CI = & get_instance();
            $this->CI->load->library('Functions');
            $config = array(
                'url' => 'admin/user/index',
                'total' => $this->User_model->get_total_user(),
                'recond' => 2,
                'uri' => 4,
                'hienthi' => true
            );
            $data = $this->CI->functions->pagination_page($config['url'],$config['total'],$config['recond'],$config['uri'],$config['hienthi']);
            //var_dump($data);
            $result = $this->User_model->get_user($config['recond'],$data['get_index']);
            $data['danhsach'] = $result;
            //var_dump($result);
            $this->loadview('admin/user/form_user',$data);
        }
        
        function form_edit($user_id = null){
            if(empty($user_id)){
                return redirect(base_url().'admin/user');
            }
            $data['row'] = $this->User_model->get_user_id($user_id);
            $data['count'] = $this->User_model->count_user_sp($user_id);
            //echo $data['count'];
            $result = $this->User_model->user_sanpham($user_id);
            $data['sanpham'] = $result['sanpham'];
            $data['danhmuc'] = $result['danhmuc'];
            //var_dump($data);
            $this->loadview('admin/user/edit_user',$data);
        }
        
        function action_click(){
            $user_id = $this->input->input_stream('user_id',true);
            //echo $user_id;
            if(isset($_POST['spam_user'])){
                return $this->action_spam_user($user_id);
            }
            if(isset($_POST['duyet_user'])){
               return $this->action_duyet_user($user_id); 
            }
        }
        
        private function action_spam_user($user_id){
            if($this->User_model->set_trangthai($user_id,3)){
                echo '<script>alert("Cập nhập thành công ...")</script>';
                return $this->index();
            }
            else{
                echo '<script>alert("Cập nhập thất bại ...")</script>';
                return $this->index();
            }
        }
        
        private function action_duyet_user($user_id){
            if($this->User_model->set_trangthai($user_id,1)){
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