<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

    class Functions{
        var $CI = null;
        function __construct(){
            $this->CI = & get_instance();
            
            $this->CI->load->database();
            $this->CI->load->helper('url');
        }
        function pagination_page($url =null,$total = null,$record = null,$giatri_get = null,$hienthi = true){
            $this->CI->load->library('pagination');  
            // cấu hình phân trang  
            $config['base_url'] = base_url().''.$url; // xác định trang phân trang  
            $config['total_rows'] = $total; // xác định tổng số record  
            $config['per_page'] = $record; // xác định số record ở mỗi trang  
            //$config['uri_segment'] = 2; // xác định segment chứa page number
            $config['num_links'] = 1;   // số link hiển thị trong phân trang đứng trước trang được chọn
            // html va css
            // vien bo ngoai cung cua phan trang
            $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
            $config['full_tag_close'] = '</ul>';
            // vien bo ngoai first va last
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            // noi dung trong first va last
            $config['first_link'] = '<span class="glyphicon glyphicon-step-backward custom-paginations" ></span>';
            $config['last_link'] = '<span class="glyphicon glyphicon-step-forward custom-paginations" ></span>';
            // vien bo ngoai next
            $config['next_link'] = '<span class="glyphicon glyphicon-chevron-right custom-paginations" ></span>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            // vien bo ngoai prev
            $config['prev_link'] = '<span class="glyphicon glyphicon-chevron-left custom-paginations" ></span>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            // vien bo ngoai so duoc chon
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            // vien bo ngoai tung so 
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['display_pages'] = $hienthi;
            
            $this->CI->pagination->initialize($config);
            $pagination_pages = $this->CI->pagination->create_links();
            $index = ($this->CI->uri->segment($giatri_get)=='')?0:$this->CI->uri->segment($giatri_get);
            $data = array('pagination_pages' =>$pagination_pages,'get_index' => $index);
            return $data;
        }
        /**
         * 2 ham test la ham nhap phan trang
         * co the duoc su dung
         * 
         * */
        function test(){
            //$total_books = $this->pagination_model->i_fGetTotalBooks(); 
            $perpage	= 2;
            $this->load->library('pagination'); 
            $config['total_rows'] = 50; 
            $config['per_page'] = $perpage; 
            $config['next_link'] = 'Next »'; 
            $config['prev_link'] = '« Prev'; 
            $config['num_tag_open'] = '|'; 
            $config['num_tag_close'] = '|'; 
            $config['num_links']	= 5; 
            $config['cur_tag_open'] = '<a class="currentpage">'; 
            $config['cur_tag_close'] = '</a>'; 
            $config['base_url'] = base_url().'/pagination/'; 
            $config['uri_segment']	= 3;
            $this->pagination->initialize($config);
            $pagination = $this->pagination->create_links();
            echo $pagination;
            $offset = ($this->uri->segment(2)=='') ? 0 : $this->uri->segment(3);
            echo $offset; 
            //echo 'trang hien tai'.$offset;
        }
        function test2(){
            $chatlieu2 = array('Cotton','Thô','Kaki','Kate','Dạ / Nỉ','Jeans / Bò / Denim','Lanh / linen / tone ','Lụa',
                    'Lụa tơ tằm','Nilon / Nylon','Voan','Da','Ren','Len','Thun','Lưới','Nhung','Polyester','Posts','Chất liệu khác');
            $this->load->library('pagination');  
            // cấu hình phân trang  
            $config['base_url'] = base_url().'admin/tintuc/test2'; // xác định trang phân trang  
            $config['total_rows'] = count($chatlieu2); // xác định tổng số record  
            
            $config['per_page'] = 4; // xác định số record ở mỗi trang  
            //$config['uri_segment'] = 2; // xác định segment chứa page number
            
            // vien bo ngoai cung cua phan trang
            $config['full_tag_open'] = '<p>';
            $config['full_tag_close'] = '</p>';
            // vien bo ngoai first va last
            $config['first_link'] = 'First';
            $config['last_link'] = 'Last';
            // vien bo ngoai next
            $config['next_tag_open'] = '<h2>';
            $config['next_tag_close'] = '</h2>';
            // vien bo ngoai prev
            $config['prev_tag_open'] = '<h2>';
            $config['prev_tag_close'] = '</h2>';
            // vien bo ngoai so duoc chon
            $config['cur_tag_open'] = '<b>';
            $config['cur_tag_close'] = '</b>';
            // vien bo ngoai tung so 
            $config['num_tag_open'] = '<div>';
            $config['num_tag_close'] = '</div>';
            //$config['display_pages'] = FALSE;
            $this->pagination->initialize($config);  
            echo $this->uri->segment(4);
            echo $this->pagination->create_links();
            return $this->uri->segment(4);
            
            //$data['data'] = $this->B4ook_Model->list_all($config['per_page'],$this->uri->segment(2)); 
             
        }
        function test3(){
            $this->CI->load->library('Functions');
            $this->CI->functions->pagination_page();
        }
    }
?>