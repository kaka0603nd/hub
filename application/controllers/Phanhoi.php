<?php
    class Phanhoi extends CI_Controller{
        private $email;
        private $noidung;
        private $created_at;
        private $duyetbai;
        public $CI;
        public $message;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Phanhoi_model');
            
        }
        
        function index(){
            $this->loadview('page/phanhoi/index');
        }
        
        function action_phanhoi(){
            if(isset($_POST['btnphanhoi'])){
                $this->email = $this->input->input_stream('email');
                $this->noidung = $this->input->input_stream('noidung');
                if(empty($this->email) || empty($this->noidung)){
                    $this->session->set_flashdata('message', 'Không được để trống thông tin nhập ...');
                    return redirect(base_url().'phanhoi');
                }
                $data = array(
                    'email'     =>  $this->email,
                    'noidung'   =>  $this->noidung,
                    'created_at'=>  date('Y-m-d H-m-s'),
                    'trangthai' =>  '3'
                );
                if($this->Phanhoi_model->insert($data)){
                    $this->session->set_flashdata('message', 'Cám ơn đã phản hồi lại chúng tôi, chúng tôi sẽ trả lời bạn trong thời gian sớm nhất ...');
                    return redirect(base_url().'home');
                }
                else{
                    $this->session->set_flashdata('message', 'Có lỗi trong quá trình phản hồi vui lòng thử lại ...');
                    return redirect(base_url().'phanhoi');
                }
            }
        }
        
        function count_ph(){
            
        }
        
        function loadview($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('page/main',$datas);
        }
    }
?>