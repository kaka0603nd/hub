<?php
    class Search extends CI_Controller{
        public $CI;
        public $key;
        public $danhmuc;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Sanpham_model');
        }
        
        public function search_pro(){
            if($this->input->get('key')){
                $this->key = $this->input->get('key');
            }
            else{
                $this->key = $this->uri->segment(3)?$this->uri->segment(3):'';
            }
            
            //$config['base_url'] = base_url().'search/search_pro?key='.$this->key.'/';  
            $this->CI = & get_instance();
            $this->CI->load->library('Functions');
            // if khong nhap key
            if(empty($this->key)){
                echo '<script>alert("Vui lòng nhập vào giá trị để tìm kiếm")</script>';
                return redirect(base_url().'home');
            }
            // if nhap key
            $arr = array(
                'urls' => 'search/search_pro/'.$this->key,
                'totals' => $this->Sanpham_model->count_get_search($this->key),
                'reconds' => 6,
                'uris' => 4,
                'hienthis' => true
            );
            $data = $this->CI->functions->pagination_page($arr['urls'],$arr['totals'],$arr['reconds'],$arr['uris'],$arr['hienthis']);
            $result = $this->Sanpham_model->get_search_auto($this->key,array('recond'=>$arr['reconds'],'start' =>$data['get_index']));
            $data['sanpham'] = $result;
            $data['key'] = $this->key;
            $this->loadview('page/search/form_search',$data);
            //echo '<script>alert("'.$data['get_index'].'")</script>';
        }
        
        public function search_param($key = null,$param = null){
            /*if($this->input->get('key')){
                $this->key = $this->input->get('key');
            }
            else{
                $this->key = $this->uri->segment(4)?$this->uri->segment(4):'';
            }
            */
            //$config['base_url'] = base_url().'search/search_pro?key='.$this->key.'/';  
            $this->key = str_replace('%20',' ',$key) ;
            $this->CI = & get_instance();
            $this->CI->load->library('Functions');
            // if khong nhap key
            if(empty($this->key)){
                echo '<script>alert("Vui lòng nhập vào giá trị để tìm kiếm")</script>';
                return ;
            }
            //echo $param;
            if(empty($param)){
                echo '<script>alert("Vui lòng chọn kiểu sắp xếp tim kiem")</script>';
                return ;
            }
            //|| $param != 'priceup' || $param != 'pricedown'|| $param != 'update'
            if($param <> "view" && $param <> "update" && $param <> 'pricedown' && $param <> 'priceup'){
                echo '<script>alert("Vui lòng chọn kiểu sắp xếp")</script>';
                return ;
            }
            
            
            // if nhap key
            $arr = array(
                'urls' => 'search/search_param/'.$this->key.'/'.$param,
                'totals' => $this->Sanpham_model->count_get_search($this->key),
                'reconds' => 6,
                'uris' => 5,
                'hienthis' => true
            );
            $data = $this->CI->functions->pagination_page($arr['urls'],$arr['totals'],$arr['reconds'],$arr['uris'],$arr['hienthis']);
            $result = $this->Sanpham_model->get_search_auto($this->key,array('recond'=>$arr['reconds'],'start' =>$data['get_index']),$param);
            $data['sanpham'] = $result;
            $data['key'] = $this->key;
            $this->loadview('page/search/form_search',$data);
            //echo '<script>alert("'.$data['get_index'].'")</script>';
        }
        
        
        
        public function search_auto(){
            
            $this->key = $_POST['key'];
            $data ='';
            if(empty($this->key)){
                echo 'Nhập vào hộp để chúng tôi tìm sản phẩm tốt nhất cho bạn';
                return;
            }
            else{
                $result = $this->Sanpham_model->get_search_auto($this->key,array('recond'=>6,'start' =>0));
                if(count($result) == 0){
                    echo 'SORRY ...! Không tìm thấy sản phẩm nào trùng với từ khóa cần tìm ...';
                    return;
                }
                foreach($result as $row){
                    $imgs = $row['hinhanh'];
                    $img = null;
                    if(empty($imgs)){
                        $img = 'image_null.png';
                    }
                    else{
                        $img = explode(',',$imgs);
                    }
                    $str_img = is_array($img)?$img[0]:$img;
                    $data .= '<li>
                                	<a href="'.base_url().'home/sanpham/'.$row['id'].'" class="forcus_head">
                                    	<img src="'.base_url().'public/sanpham/thumb/thumb-'.$str_img.'" width="20px"/>
                                        <div class="form-search-info">
                                            <p>'.$row['tensanpham'].'</p>
                                            <p class="search-money">'.$row['gia'].'₫</p>
                                        </div>
                                    </a>
                                </li>';
                }
                echo $data;
            }
            
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