<?php
    class Dangki extends CI_Controller{
        private $name;
        public $email;
        private $password;
        private $password_again;
        private $fullname;
        private $fullho,$gioitinh,$date,$month,$year,$yourpage,$ngaysinh;
        private $hinhanh;
        private $trangthai;
        private $website;
        private $created_at;
        private $update_at;
        private $type;
        public $CI;
        
        function __construct(){
            parent::__construct();
            $this->load->helper(array('form', 'url'));
            $this->load->model('User_model');
            $this->CI = &get_instance();
            //$this->load->library('Check');
        }
        
        /**
         * 
         * get all
         * 
         * */
        function index(){
            $url = 'page/login/login';
            $this->loadview($url);
        }
        
        function xuly(){
            
        }
        
        function check_key(){
            if($this->User_model->check_user('kaka')){
                echo 'ten trung khop';
            }
            else{
                echo 'khong ton tai';
            }
        }
        
        public function dangki(){
            if(isset($_POST['btnsub'])){
               // input data
            $this->name = $this->input->post('name',TRUE);
            $this->email = $this->input->post('email',TRUE);
            $this->password = $this->input->post('password',TRUE);
            $this->password_again = $this->input->post('password_again',TRUE);
            $this->fullname = $this->input->post('fullname',TRUE);
            $this->fullho = $this->input->post('fullho',TRUE);
            $this->gioitinh = $this->input->post('gioitinh');
            $this->date = $this->input->post('date',TRUE);
            $this->month = $this->input->post('month',TRUE);
            $this->year = $this->input->post('year',TRUE);
            $this->ngaysinh = $this->year.'/'.$this->month.'/'.$this->date;
            $this->yourpage = $this->input->post('yourpage',TRUE);
            $this->trangthai = 2;
            $this->created_at = date('Y/m/d');
            $this->hinhanh = '';
            $this->type = 'user';
            
            // insert input
            $insert = array(
                'name' =>$this->name,
                'email' =>$this->email,
                'password' => md5($this->password),
                'fullname' => $this->fullname,
                'fullho' => $this->fullho,
                'hinhanh' => $this->hinhanh,
                'trangthai' => $this->trangthai,
                'gioitinh' => $this->gioitinh,
                'created_at' => $this->created_at,
                'ngaysinh' => $this->ngaysinh,
                'yourpage' =>$this->yourpage,
                'hack_email'=> md5($this->email),
                'type' => $this->type
            );
            
            // test
            $this->CI->load->library('Check');
            $err = array(
                'name' => (!$this->CI->check->check_name($this->name) || empty($this->name))?false:$this->name,
                'email' => (!$this->CI->check->check_email($this->email) || empty($this->email))?false:$this->email,
                'password' => (empty($this->password)|| strlen($this->password)<6)?false:$this->password,
                'password_again' => ($this->password_again != $this->password)?false:$this->password_again,
                'fullname' => empty($this->fullname)?false:$this->fullname,
                'gioitinh' => empty($this->gioitinh)?false:$this->gioitinh,
                'fullho' => empty($this->fullho)?false:$this->fullho,
                'year' => (!$this->CI->check->check_num($this->year) || empty($this->year))?false:$this->year,
                'month' => (!$this->CI->check->check_num($this->month) || empty($this->month))?false:$this->month,
                'date' => (!$this->CI->check->check_num($this->date) || empty($this->date) || $this->date>31)?false:$this->date,
                'yourpage' => true
            );
            if(!empty($this->name)){
                $err['math_name'] = $this->User_model->check_user(['name' => $this->name])?false:$this->name;
            }
            if(!empty($this->email)){
                $err['math_email'] = $this->User_model->check_user(['email' => $this->email])?false:$this->email;
            }
            
            // test insert
            $data = array(
                'check' =>$err,
                'insert' => $insert
            );
            if(array_search(false,$err)){
                //var_dump($err);
                return $this->loadview('page/login/login',$data);
            }
            else{
                if($this->User_model->insert_user($insert)){
                    $link = base_url().'home/xacnhan/'.$this->email;
                    $this->sent_email($this->email,$link);
                    //echo '<script>alert("Đăng kí thành công vui lòng kiểm tra lại email")</script>';
                    $this->session->set_flashdata('message', 'Đăng kí thành công vui lòng kiểm tra lại email.');
                    return redirect(base_url().'dangnhap');
                    //redirect(base_url().'home');
                }
                else{
                    $this->session->set_flashdata('message', 'Có lỗi trong quá trình đăng kí.');
                    return redirect(base_url().'dangnhap');
                    //redirect(base_url().'home');
                }
            } 
            }
            
        }
        
        function check_key_name($name){
            if($this->user_model->check_user($name)){
                return true;
            }
            else{
                return false;
            }
        }
        
        
        
        function dangnhap(){
            $this->loadview('page/login/log');
        }
        function dangnhap_click(){
            
        }
        
        function update(){
            if(!$this->session->has_userdata('id')){
                return redirect(base_url().'dangnhap');
            }
            $type_user = $this->session->has_userdata('type')?$this->session->userdata('type'):'';
            $id = $this->session->userdata('id');
            
            if(empty($type_user)){
                return redirect(base_url().'dangnhap');
            }
            switch($type_user){
                case 'user':{
                    $this->update_user($id);
                    break;
                }
                case 'store':{
                    $this->update_store($id);
                    break;
                }
                default : redirect(base_url().'home');
            }
        }
        
        function update_user($id){            
            $this->load->model('User_model');
            $result = $this->User_model->get_user_id($id);
            //var_dump($result);
            if(count($result)<1){
                return redirect(base_url().'home');
            }
            $this->loadview('page/login/update_user',$result);
        }
        
        function update_store($id){
            $this->load->model('Store_model');
            $result = $this->Store_model->get_store_id($id);
            //var_dump($result);
            if(count($result)<1){
                return redirect(base_url().'home');
            }
            $this->loadview('page/login/update_store',$result);
        }
        
        function edit($email = null){
            if(!$this->session->has_userdata('id')){
                return redirect(base_url().'dangnhap');
            }
            $type_user = $this->session->has_userdata('type')?$this->session->userdata('type'):'';
            $id = $this->session->userdata('id');
            
            if(empty($type_user)){
                return redirect(base_url().'dangnhap');
            }
            switch($type_user){
                case 'user':{
                    $this->edit_user($id);
                    break;
                }
                case 'store':{
                    $this->edit_store($id);
                    break;
                }
                default : redirect(base_url().'home');
            }
            
            
        }
        
        function edit_user($id){
            $this->load->model('User_model');
            $result = $this->User_model->get_user_id($id);
            if(count($result)<1){
                return redirect(base_url().'dangnhap');
            }
            $insert = array(
                'name' =>$result['name'],
                'email' =>$result['email'],
                'fullho' => $result['fullho'],
                'fullname' => $result['fullname'],
                'hinhanh' => $result['hinhanh'],
                'trangthai' => $result['trangthai'],
                'gioitinh' => $result['gioitinh'],
                'created_at' => $result['created_at'],
                'ngaysinh' => $result['ngaysinh'],
                'yourpage' =>$result['yourpage'],
            );
            //var_dump($result);
            $data['insert'] = $insert;
            //$data = $result;
            $this->loadview('page/login/edit',$data);
        }
        
        function edit_store($id){
            $this->load->model('Store_model');
            $result = $this->Store_model->get_store_id($id);
            if(count($result)<1){
                return redirect(base_url().'dangnhap');
            }
            $insert = array(
                'name' =>$result['name'],
                'email' =>$result['email'],
                'name_store' => $result['name_store'],
                'sodienthoai' => $result['sodienthoai'],
                'diachi' => $result['diachi'],
                'tinhthanh' => $result['tinhthanh'],
                'sochungminh' => $result['sochungminh'],
                'created_at' => $result['created_at'],
                'hinhanh' => $result['hinhanh'],
                'website' =>$result['website'],
            );
            //var_dump($result);
            $data['insert'] = $insert;
            //$data = $result;
            $this->loadview('page/login/edit_store',$data);
        }
        
        function action_edit(){
            // test id session
            if(!$this->session->has_userdata('id')){
                return redirect(base_url().'dangnhap');
            }
            $id = $this->session->userdata('id');
            // test type session
            $type_user = $this->session->has_userdata('type')?$this->session->userdata('type'):'';
            if(empty($type_user)){
                return redirect(base_url().'dangnhap');
            }
            switch($type_user){
                case 'user':{
                    $this->action_edit_user($id);
                    break;
                }
                case 'store':{
                    $this->action_edit_store($id);
                    break;
                }
                default : redirect(base_url().'home');
            }
        }
        
        function action_edit_user($user_id){
            if(isset($_POST['btnsub'])){
               // input data
                $this->name = $this->input->post('name',TRUE);
                $this->email = $this->input->post('email',TRUE);
                
                $this->fullname = $this->input->post('fullname',TRUE);
                $this->fullho = $this->input->post('fullho',TRUE);
                $this->gioitinh = $this->input->post('gioitinh');
                $this->date = $this->input->post('date',TRUE);
                $this->month = $this->input->post('month',TRUE);
                $this->year = $this->input->post('year',TRUE);
                $this->ngaysinh = $this->date.'/'.$this->month.'/'.$this->year;
                $this->yourpage = $this->input->post('yourpage',TRUE);
                $this->trangthai = 3;
                $this->update_at = date('Y-m-d');
                //$this->hinhanh = '';
                $this->type = 'user';
                
                // insert input
                $insert = array(
                    'name' =>$this->name,
                    'email' =>$this->email,
                    
                    'fullname' => $this->fullname,
                    'fullho' => $this->fullho,
                    //'hinhanh' => $this->hinhanh,
                    'trangthai' => $this->trangthai,
                    'gioitinh' => $this->gioitinh,
                    'updated_at' => $this->update_at,
                    'ngaysinh' => $this->ngaysinh,
                    'yourpage' =>$this->yourpage,
                    'hack_email'=> md5($this->email),
                    'type' => $this->type
                );
                
                // test
                $this->CI->load->library('Check');
                $err = array(
                    'name' => (!$this->CI->check->check_name($this->name) || empty($this->name))?false:$this->name,
                    'email' => (!$this->CI->check->check_email($this->email) || empty($this->email))?false:$this->email,
                    
                    'fullname' => empty($this->fullname)?false:$this->fullname,
                    'gioitinh' => empty($this->gioitinh)?false:$this->gioitinh,
                    'fullho' => empty($this->fullho)?false:$this->fullho,
                    'year' => (!$this->CI->check->check_num($this->year) || empty($this->year))?false:$this->year,
                    'month' => (!$this->CI->check->check_num($this->month) || empty($this->month))?false:$this->month,
                    'date' => (!$this->CI->check->check_num($this->date) || empty($this->date) || $this->date>31)?false:$this->date,
                    'yourpage' => true
                );
                
                if(!empty($this->name)){
                    $err['math_name'] = $this->User_model->check_user_change(['name'=>$this->name],$user_id)?false:true;
                }
                if(!empty($this->email)){
                    $err['math_email'] = $this->User_model->check_user_change(['email'=>$this->email],$user_id)?false:true;
                }
                
                // test insert
                $data = array(
                    'check' =>$err,
                    'insert' => $insert
                );
                if(array_search(false,$err)){
                    //var_dump($err);
                    
                    return $this->loadview('page/login/edit',$data);
                }
                else{
                    if($this->User_model->update_user($user_id,$insert)){
                        echo '<script>alert("Cập nhập thành công")</script>';
                        $this->session->set_userdata(array('email'=>$this->email));
                        redirect(base_url().'dangki/update_user');
                    }
                    else{
                        echo '<script>alert("Có lỗi trong quá trình cập nhập")</script>';
                        redirect(base_url().'home');
                    }
                } 
            }
        }
        
        function action_edit_store($store_id){
            $this->load->model('Store_model');
            if(isset($_POST['btnsub'])){
                $this->name = $this->input->post('name',TRUE);
                $this->email = $this->input->post('email',TRUE);
                $this->name_store = $this->input->post('name_store',TRUE);
                
                $this->diachi = $this->input->post('diachi');
                $this->tinhthanh = $this->input->post('tinhthanh',TRUE);
                $this->sodienthoai = $this->input->post('sodienthoai',TRUE);
                $this->type = 'store';
                $this->sochungminh = $this->input->post('sochungminh',TRUE);
                $this->website = $this->input->post('website',TRUE);
                $this->update_at = date('Y-m-d H:m:s');
                
                // insert input
                $insert = array(
                    'name' =>$this->name,
                    'email' =>$this->email,
                    'name_store' => $this->name_store,
                    'diachi' => $this->diachi,
                    'tinhthanh' => $this->tinhthanh,
                    'sodienthoai' => $this->sodienthoai,
                    'sochungminh' => $this->sochungminh,
                    'updated_at' => $this->update_at,
                    'website' => $this->website,
                    'hack_email'=> md5($this->email),
                    'type' => $this->type
                );
                
                // test
                $this->CI->load->library('Check');
                $err = array(
                    'name' => (!$this->CI->check->check_name($this->name) || empty($this->name))?false:$this->name,
                    'email' => (!$this->CI->check->check_email($this->email) || empty($this->email))?false:$this->email,
                    'name_store' => empty($this->name_store)?false:$this->name_store,
                    'diachi' => empty($this->diachi)?false:$this->diachi,
                    'tinhthanh' => empty($this->tinhthanh)?false:$this->tinhthanh,
                    'sodienthoai' => (!$this->CI->check->check_num($this->sodienthoai) || empty($this->sodienthoai) || strlen($this->sodienthoai)>12)?false:$this->sodienthoai,
                    'sochungminh' => (!$this->CI->check->check_num($this->sochungminh) || empty($this->sochungminh)|| strlen($this->sochungminh)>9)?false:$this->sochungminh,
                    
                );
                if(!empty($this->name)){
                    $err['math_name'] = $this->Store_model->check_store(['name' => $this->name])?false:$this->name;
                }
                if(!empty($this->email)){
                    $err['math_email'] = $this->Store_model->check_store(['email' => $this->email])?false:$this->email;
                }
                
                // test insert
                $data = array(
                    'check' =>$err,
                    'insert' => $insert
                );
                if(array_search(false,$err)){
                    //var_dump($err);
                    return $this->loadview('page/login/edit_store',$data);
                }
                else{
                    if($this->Store_model->update_store($store_id,$insert)){
                        echo '<script>alert("Cập nhập thành công")</script>';
                        redirect(base_url().'dangki/update_store');
                    }
                    else{
                        echo '<script>alert("Có lỗi trong quá trình cập nhập")</script>';
                        redirect(base_url().'home');
                    }
                }
            }
        }
        
        
        function check_fullname($fullname = null){
            /**
			* dau \... the hien dau do la dau khong duoc truc tiep dung ma phai co \... di truoc
			* so sanh bien a voi bien b neu bien b co ton tai gia tri cua bien a thi tra ve true
			*/
			$check2 = '/^@|#|\.|\$|\'|\+|-|=|_|\(|\)|\[|\]|!$/';
            if(preg_match($check2,$fullname)){
                return false;
				//var_dump($con); 
            }
            return true;
        }
        function check_date($date){
            $num = '/[0-9]/';
            if(!preg_match($num,$date['date']) || !preg_match($num,$date['month']) || !preg_match($num,$date['year'])){
                return false;
                echo '1';
            }
            $pattern = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
            $result = $date['date'].'/'.$date['month'].'/'.$date['year'];
            //$subject = '12/10/2014';
            if (preg_match($pattern, $result)){
                return true;
                echo '2';
            }
            return false;
        }
        
        function upload_img(){
            if(!$this->session->has_userdata('id')){
                echo 'Error';
                return ;
            }
            $type_user = $this->session->has_userdata('type')?$this->session->userdata('type'):'';
            
            $user_id = $this->session->userdata('id');
            //$user_id = 1;
            $time_stamp = date('Y-m-d H-i-s');
            $config['file_name']= $user_id.' '.$time_stamp;
            if($type_user == 'user'){
                $config['upload_path'] = 'public/images/user';
            }
            else{
                $config['upload_path'] = 'public/images/store';
            }
            //$config['upload_path'] = 'public/images/user';
            $config['allowed_types'] = 'jpg|png';
            $config['max_size'] = 2*1024;
            //$config['max_width'] = 1024;
            //$config['max_height'] = 768;
            
            $this->load->library('upload',$config);
            if(!$this->upload->do_upload("input_img")){
                //$error = array('error' => $this->upload->display_errors());
                echo 'Error';
            }
            else{
                // tao anh thumbnail
                $CI =& get_instance();
                $CI->load->library('Thumbnailimage');
                
                if($type_user == 'user'){
                    $this->thumbnailimage->load(base_url().'public/images/user/'.$this->upload->data('file_name'));
                    $this->thumbnailimage->resizeToWidth(150);
                    $this->thumbnailimage->save('public/images/user/thumb/thumb-'.$this->upload->data('file_name'));
                }
                else{
                    $this->thumbnailimage->load(base_url().'public/images/store/'.$this->upload->data('file_name'));
                    $this->thumbnailimage->resizeToWidth(150);
                    $this->thumbnailimage->save('public/images/store/thumb/thumb-'.$this->upload->data('file_name'));
                }
                
                
                
                if($type_user == 'user'){
                    if($this->User_model->update_user($user_id,array('hinhanh' => $this->upload->data('file_name')))){
                        echo $this->upload->data('file_name');
                    }
                    else{
                        echo 'Error';
                    }
                }
                else{
                    if($type_user == 'store'){
                        $this->load->model('Store_model');
                        if($this->Store_model->update_store($user_id,array('hinhanh' => $this->upload->data('file_name')))){
                            echo $this->upload->data('file_name');
                        }
                        else{
                            echo 'Error';
                        }
                    }
                }
                
                
            }
            
            sleep(1);
        }
        
        /**
         * 
         * pugin sent mail mở rộng
         * @param email nguoi nhan
         * @param thong tin can gui
         * @return bool
         * 
         * */
        public function sent_email($your_email,$info_sent){
            //echo date('h-i-s');
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                //'smtp_port' => 587,
                'smtp_user' => 'anynomous868686@gmail.com',
                'smtp_pass' => '06031994',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8' //chartset bạn cấu hình theo cách của bạn.
            );
            
            $this->load->library('email', $config);
            
            $this->email->set_newline("\r\n");
            $this->email->from('kaka0603nd@gmail.com', 'Your Name');
            $this->email->to($your_email);
            //$this->email->cc('another@another-example.com');
            //$this->email->bcc('them@their-example.com');
            
            $this->email->subject('Email tu website batheitblog sent');
            $this->email->message('Click vào link sau để xác nhận : '.$info_sent);
            $result = $this->email->send();  
            return $result;
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