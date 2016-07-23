<?php
    class Danhmuc extends CI_Controller{
        private $sp_id;
        private $sp_name;
        private $sp_danhmuc;
        private $sp_thuonghieu;
        private $extend_info;
        private $CI;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Sanpham_model');
        }
        
        function index(){
            
        }
        
        function get($sp_danhmuc = null,$sp_thuonghieu = null){
            //$this->sp_danhmuc = $this->uri->segment(3);
            //$this->sp_thuonghieu = $this->uri->segment(4);
            $this->sp_danhmuc = $sp_danhmuc;
            $this->sp_thuonghieu = $sp_thuonghieu;
            //echo $this->sp_danhmuc.' - '.$this->sp_thuonghieu;
            if(empty($this->sp_danhmuc)){
                
            }
            $extend = $this->get_info_extend();
            $table = $extend[$this->sp_danhmuc][0];
            
            if($this->sp_thuonghieu == 'one' ){
                $count = $this->Sanpham_model->get_sp_by_num($this->sp_danhmuc,'','');
                
            }
            else{
                
                $count = $this->Sanpham_model->get_sp_by_num($this->sp_danhmuc,'','',array($table.'.thuonghieu' => $this->sp_thuonghieu),$table);
                
            }
            
            
            //var_dump($count);
            //echo count($count);
            
            $arr = array(
                //'urls' => 'danhmuc/get/'.$this->sp_danhmuc.'/'.$this->sp_thuonghieu,
                'totals' => count($count),
                'reconds' => 2,
                //'uris' => 5,
                'hienthis' => true
            );
            if($this->sp_thuonghieu == 'one'){
                $arr['urls'] = 'danhmuc/get/'.$this->sp_danhmuc.'/one';
                $arr['uris'] = 5;
            }else{
                $arr['urls'] = 'danhmuc/get/'.$this->sp_danhmuc.'/'.$this->sp_thuonghieu;
                $arr['uris'] = 5;
            }
            //echo '<h1>'.count($count).'</h1>';
            //echo $this->uri->segment(4);
            //var_dump($arr);
            $this->CI = &get_instance();
            $this->CI->load->library('Functions');
            $data = $this->CI->functions->pagination_page($arr['urls'],$arr['totals'],$arr['reconds'],$arr['uris'],$arr['hienthis']);
            $limit = array('start' =>$data['get_index'],'recond'=>$arr['reconds']);
            //var_dump($limit);
            if($this->sp_thuonghieu == 'one'){
                //echo '1';
                $result = $this->Sanpham_model->get_sp_by_num($this->sp_danhmuc,$limit,'update','',$table);
            }
            else{
                $result = $this->Sanpham_model->get_sp_by_num($this->sp_danhmuc,$limit,'update',array($table.'.thuonghieu' => $this->sp_thuonghieu),$table);
            }
            //var_dump($result);
            $data['sanpham'] = $result;
            $this->loadview('page/danhmuc/index',$data);
        }
        
        public function get_info_extend(){
            $result = array(
                '101' => array('phuongtien'),
                '102' => array('phuongtien'),
                '103' => array('phuongtien'),
                '104' => array('phuongtien'),
                '105' => array('phuongtien'),
                '106' => array('phuongtien'),
                '201' => array('batdongsan'),
                '202' => array('batdongsan'),
                '203' => array('batdongsan'),
                '204' => array('batdongsan'),
                '301' => array('dodientu'),
                '302' => array('dodientu'),
                '303' => array('dodientu'),
                '304' => array('dodientu'),
                '305' => array('dodientu'),
                '306' => array('dodientu'),
                '401' => array('thoitrang'),
                '402' => array('thoitrang'),
                '403' => array('thoitrang'),
                '404' => array('thoitrang'),
                '501' => array('ngoaithat_giadung'),
                '502' => array('ngoaithat_giadung'),
                '503' => array('ngoaithat_giadung'),
                '601' => array('giaitri_sothich'),
                '602' => array('giaitri_sothich'),
                '603' => array('giaitri_sothich'),
                '604' => array('giaitri_sothich'),
                '605' => array('giaitri_sothich'),
                '701' => array('vanphong'),
                '702' => array('vanphong'),
                '801' => array('sanphamkhac')
            );
            return $result;
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