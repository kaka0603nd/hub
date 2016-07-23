<?php
    class Giohang extends CI_Controller{
        public $CI;
        private $id;
        private $name;
        private $price;
        private $qty;
        private $option;
        private $rowid;
        
        function __construct(){
            parent::__construct();
            $this->load->model('Sanpham_model');
            $this->load->library('cart');
            //$this->load->library('session');
        }
        
        function index(){
            $result = $this->cart->contents();
            $data['cart'] = $result;
            //var_dump($result);
            $this->loadview('page/giohang/form_giohang',$data);
        }
        
        /**
         * 
         * add san pham into cart
         * @param id sp
         * @return cart
         * 
         * */
        function add_cart(){
            $this->id = $_POST['id'];
            $result = $this->Sanpham_model->get_sp_id($this->id);
            if(!$result){
                echo '<script>alert("Lỗi cập nhập giỏ hàng")</script>';
                return;
            }
            $this->name = $result['tensanpham'];
            $this->price = $result['gia'];
            $this->qty = 1;
            $this->option = array('tinhtrang' => $result['tinhtrang'],'hinhanh' => $result['hinhanh']);
            
            $data = array(
                'id' => $this->id,
                'name' => $this->name,
                'qty' => $this->qty,
                'price' => $this->price,
                'option' => $this->option
            );
            
            if(empty($this->id)){
                echo '<script>alert("Lỗi cập nhập giỏ hàng")</script>';
                //return;
            }
            else{
                $this->cart->insert($data);
                $counts = $this->cart->contents();
                echo count($counts);
            }
        }
        
        function update_cart(){
            if(isset($_POST['btn_update'])){
                $rowid = $this->input->post('rowid');
                $qty = $this->input->post('qty');
                //var_dump($qty);
                //var_dump($rowid);
                if(count($rowid) != count($qty)){
                    return redirect(base_url().'home');
                }
                $i = 0;
                $data = array();
                foreach($rowid as $key => $row){
                    $data[$i] = array('rowid' => $row,'qty' => $qty[$i]);
                    $i++;
                }
                if($this->cart->update($data)){
                    echo '<script>alert("Cập nhập giỏ hàng ok")</script>';
                    $this->session->set_flashdata('message', 'Đã cập nhập giỏ hàng');
                    return redirect(base_url().'gio-hang.html');
                }
                else{
                    $this->session->set_flashdata('message', 'Lỗi cập nhập giỏ hàng');
                    return redirect(base_url().'gio-hang.html');
                }
            }
        }
        
        function del_one(){
            $rowid = $_POST['rowid'];
            $data = array('rowid' => $rowid,'qty' => 0);
            if($this->cart->update($data)){
                $counts = $this->cart->contents();
                echo count($counts);
            }
            else{
                echo '<script>alert("Cập nhập giỏ hàng false")</script>';
            }
            
        }
        
        function get_cart(){
            $result = $this->cart->contents();
            $data['cart'] = $result;
            //var_dump($result);
            $this->loadview('page/giohang/form_giohang',$data);
        }
        
        function del_all_cart(){
            $this->cart->destroy();
            echo '<script>alert("Đã xóa tất cả giỏ hàng")</script>';
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