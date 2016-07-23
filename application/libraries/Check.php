<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Check{

	/**
	 * Check layout template
	 *
	 * @var mixed
	 */
	public $template = '';
	public function get_alls(){
		echo 'get_all';
	}
    function check_name($name = null){
            $check_name = '/[^a-zA-Z0-9_]/';
            if(preg_match($check_name,$name)){
                return false;
            }
            return true;
        }
        function check_email($email = null){
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                return true;
            }
            return false;
        }
        function check_num($data = null){
            $check_name = "/[0-9]/";
            if(preg_match($check_name,$data)){
                return true;
            }
            return false;
        }
        function check_num_one($data =null){
            $pattern = '/[0-9]{0,1}/';
            if (preg_match($pattern, $data)){
                return true;
            }
            return false;
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
        function check_fullnames($all = null){
            $check2 = '/^@|#|\.|\$|\'|\+|-|=|_|\(|\)|\[|\]|!$/';
            $i=-1;
            foreach($all as $row){
                $i +=1;
                if(preg_match($row[$i],$fullname)){
                    return false;
    				//var_dump($con); 
                }
                return true;
            }
            
        }
        function check_name_sp($fullname = null){
            $check2 = '/@|#|\$|\'|\+|=|\[|\]|!$/';
            if(preg_match($check2,$fullname)){
                return false;
				//var_dump($con); 
            }
            return true;
        }
        
        function check_fullname_sp($fullname = null){
            $check2 = '/@|#|\.|\$|\'|\+|=|\[|\]|!$/';
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
                //echo '1';
            }
            $pattern = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
            $result = $date['date'].'/'.$date['month'].'/'.$date['year'];
            //$subject = '12/10/2014';
            if (preg_match($pattern, $result)){
                return true;
                //echo '2';
            }
            return false;
        }
        function check_url($url = null){
            if(filter_var($url,FILTER_VALIDATE_URL)){
                return true;
            }
            return false;
        }
        /*
        public function loadviews($url = null,$data = null){
            if(empty($url)){
                $url = 'errors/html/error_404';
            }
            $datas = array('url' =>$url,'data'=> $data);
            $this->load->view('page/main',$datas);
        }
        */
}
?>