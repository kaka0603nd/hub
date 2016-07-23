<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
    class Danhmuc {
        var $CI = NULL;

    	function __construct()
    	{
    		$this->CI =& get_instance();		
    		// Load additional libraries, helpers, etc.
    		$this->CI->load->library('session');
    		$this->CI->load->helper('security');
    		$this->CI->load->database();
    		$this->CI->load->helper('url');
    	}
        
        function ham_101($id = null){
            if($id == 'test'){
                $namdangki = $sokm = '';
                return $this->insert_table_test(array('namdangki','sokm'));
            }
            else{
                if(empty($id)){
                    $nam = $sokm = '';
                    $nams = $this->CI->session->userdata('namdangki');
                    $sokms = $this->CI->session->userdata('sokm');
                    
                    for($i = 1980 ; $i <= date('Y'); $i++){
                        if($nams == $i){
                            $nam .= '<option value="'.$i.'" selected=""> '.$i.' </option>';
                        }
                        else{
                            $nam .= '<option value="'.$i.'"> '.$i.' </option>'; 
                        }
                    }
                    $kmdau = 0;
                    $kmsau = 0;
                    for($i = 0 ; $i <= 48; $i++){
                        $kmsau =$kmdau+4999;
                        $kms = $kmdau.'-'.$kmsau;
                        if($kms == $sokms){
                            $sokm .= '<option value="'.$kmdau.'-'.$kmsau.'" selected=""> '.$kmdau.' - '.$kmsau.' </option>';
                        }
                        else{
                            $sokm .= '<option value="'.$kmdau.'-'.$kmsau.'"> '.$kmdau.' - '.$kmsau.' </option>';
                        }
                        $kmdau += 5000;
                    }
                    $sokm .= '<option value="0" '.($kms==0?'selected=""':'').'> Nhiều hơn </option>';
                    $this->ham_center('Năm đăng kí',$nam,'namdangki','Số km đã đi',$sokm,'sokm');
                }
                else{
                    $namdangki = $sokm = '';
                    return $this->insert_table_danhmuc('phuongtien',array('namdangki','sokm'),$id);
                }
            }           
        }
        function ham_102($id = null){
            if($id == 'test'){
                return $this->insert_table_test(array('namdangki','sokm','hopso','loainhienlieu'));
            }
            else{
                if(empty($id)){
                $this->ham_101();
                
                $hopsos = $this->CI->session->userdata('hopso');
                $loainhienlieus = $this->CI->session->userdata('loainhienlieu');
                    
                $hopso = $loainhienlieu = '';
                $hopso .= '<option value="1" '.($hopsos==1?'selected=""':'').'>Tự động</option>';
                $hopso .= '<option value="2" '.($hopsos==2?'selected=""':'').' >Số tay</option>';
                $hopso .= '<option value="3" '.($hopsos==3?'selected=""':'').' >Cả hai</option>';
                $hopso .= '<option value="4" '.($hopsos==4?'selected=""':'').' >Kiểu khác</option>';
                $loainhienlieu .= '<option value="1" '.($loainhienlieus==1?'selected=""':'').' >Xăng</option>';
                $loainhienlieu .='<option value="2" '.($loainhienlieus==2?'selected=""':'').' >Diesel</option>';
                $loainhienlieu .='<option value="3" '.($loainhienlieus==3?'selected=""':'').' >Hybrid xăng và điện</option>';
                $loainhienlieu .='<option value="4" '.($loainhienlieus==4?'selected=""':'').' >Loại nhiên liệu khác</option>';
                $this->ham_center('Hộp số',$hopso,'hopso','Loại nhiên liệu',$loainhienlieu,'loainhienlieu');
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array('namdangki','sokm','hopso','loainhienlieu'),$id);
                }
            }
        }
        function ham_103($id = null){
            if($id == 'test'){
                return $this->insert_table_test(array('loaixe','namdangki'));
            }
            else{
                if(empty($id)){
                    $nams = $this->CI->session->userdata('namdangki');
                    $loaixes = $this->CI->session->userdata('loaixe');
                    
                    $loaixe = $namdangki = '';
                    $loaixe .= '<option value="1" '.($loaixes==1?'selected=""':'').' >Mini nhật</option>';
                    $loaixe .= '<option value="2" '.($loaixes==2?'selected=""':'').' >Xe cao</option>';
                    $loaixe .= '<option value="3" '.($loaixes==3?'selected=""':'').' >Xe đạp điện</option>';
                    $loaixe .= '<option value="4" '.($loaixes==4?'selected=""':'').' >Loại xe khác</option>';
                    $namdangki .= '<option value="0" '.($nams==0?'selected=""':'').'>Chưa đăng kí</option>';
                    for($i = 1 ; $i <= 10; $i++){
                        if($nams == $i){
                            $namdangki .= '<option value="'.($i).'" selected="" > '.$i.' </option>';
                        }
                        else{
                            $namdangki .= '<option value="'.($i).'"> '.$i.' </option>';
                        }
                        
                    }
                    $this->ham_center('Loại xe',$loaixe,'loaixe','Thời gian sử dụng',$namdangki,'namdangki');
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array('namdangki','loaixe'),$id);
                }
            }
        }
        function ham_104($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('trongluong','trongtai'));
            }
            else{
                if(empty($id)){
                    $trongluong = $this->CI->session->userdata('trongluong');
                    $trongtai = $this->CI->session->userdata('trongtai');
                    
                    $this->ham_center3('Trọng Lượng','trongluong',$trongluong);
                    $this->ham_center3('Trọng tải','trongtai',$trongtai);
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array('trongluong','trongtai'),$id);
                }
            }
        }
        function ham_105($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('phuongtien',array(),$id);
                }
            }
        }
        function ham_106($id = null){
            $this->ham_105($id);
        }
        function ham_201($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('diachi','sophong','dientich'));
            }
            else{
                if(empty($id)){
                    $diachis = $this->CI->session->userdata('diachi');
                    $sophongs = $this->CI->session->userdata('sophong');
                    $dientichs = $this->CI->session->userdata('dientich');
                    
                    $this->ham_center3('Địa chỉ','diachi',$diachis);
                    $sophong = '';
                    for($i = 1 ; $i <= 10; $i++){
                        if($sophongs == $i){
                            $sophong .= '<option value="'.$i.'" selected=""> '.$i.' </option>';
                        }
                        else{
                            $sophong .= '<option value="'.$i.'"> '.$i.' </option>';
                        }
                        
                    }
                    $this->ham_center2('Số phòng',$sophong,'sophong','Diện tích(m2)','dientich',$dientichs);
                }
                else{
                    return $this->insert_table_danhmuc('batdongsan',array('diachi','sophong','dientich'),$id);
                }
            }
        }
        function ham_202($id = null){
            $this->ham_201($id);
        }
        function ham_203($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('diachi','dientich'));
            }
            else{
                if(empty($id)){
                    $diachis = $this->CI->session->userdata('diachi');
                    $dientichs = $this->CI->session->userdata('dientich');
                    
                    $this->ham_center3('Địa chỉ','diachi',$diachis);
                    $this->ham_center3('Diện tích','dientich',$dientichs);
                }
                else{
                    return $this->insert_table_danhmuc('batdongsan',array('diachi','dientich'),$id);
                }
            }            
        }
        function ham_204($id = null){
            $this->ham_203($id);
        }
        function ham_301($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('xuatsu','khuyenmai','thuonghieu'));
            }
            else{
                if(empty($id)){
                    $xs = $this->CI->session->userdata('xuatsu');
                    $km = $this->CI->session->userdata('khuyenmai');
                    $thuonghieus = $this->CI->session->userdata('thuonghieu');
                    //echo $xs;
                    $xuatsu = '';
                    $xuatsu .= '<option value="1" '.($xs==1?'selected=""':'').'>Xách tay</option>';
                    $xuatsu .= '<option value="2" '.($xs==2?'selected=""':'').'>Chính hãng</option>';
                    $xuatsu .= '<option value="3" '.($xs==3?'selected=""':'').'>Không rõ xuất xứ</option>';
                    
                    $thuonghieu = '';
                    $arr_thuonghieu = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Sony','HTC','ASUS','HP','Lenovo','Obi','Wiko','Thương hiệu khác');
                    foreach($arr_thuonghieu as $key => $row){
                        if($thuonghieus == ($key+1)){
                            $thuonghieu .= '<option value="'.($key+1).'" selected="">'.$row.'</option>';
                        }
                        else{
                            $thuonghieu .= '<option value="'.($key+1).'">'.$row.'</option>';
                        }
                        
                    }
                    
                    $this->ham_center('Xuất xứ',$xuatsu,'xuatsu','Thương hiệu',$thuonghieu,'thuonghieu');
                    $this->ham_congnghe('khuyenmai',$km);
                }
                else{
                    return $this->insert_table_danhmuc('dodientu',array('xuatsu','khuyenmai','thuonghieu'),$id);
                }
            }      
        }
        function ham_306($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('dodientu',array(),$id);
                }
            }
        }
        function ham_401($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('kichthuoc','chatlieu','mausac'));
            }
            else{
                if(empty($id)){
                    $kichthuocs = $this->CI->session->userdata('kichthuoc');
                    $chatlieus = $this->CI->session->userdata('chatlieu');
                    //$kieudangs = $this->CI->session->userdata('xuatsu');
                    $mausacs = $this->CI->session->userdata('mausac');
                    
                    
                    $kichthuoc = $chatlieu = $kieudang = $mausac = '';
                    for($i = 0 ; $i < 11; $i++){
                        if($kichthuocs == ($i+1)){
                            $kichthuoc .= '<option value="'.($i+1).'" selected=""> '.($i+1).' </option>';
                        }
                        else{
                            $kichthuoc .= '<option value="'.($i+1).'"> '.($i+1).' </option>';
                        }
                        
                    }
                    $kichthuoc2 = array('F','L','M','S','XL','XS','XXL','XXS','XXXL');
                    $i = 12;
                    foreach($kichthuoc2 as $row){
                        if($kichthuocs == $i){
                            $kichthuoc .='<option value="'.$i.'" selected="">'.$row.'</option>';
                            //$kichthuoc .= '<option value="'.($i+1).'" > '.($i+1).' </option>';
                        }
                        else{
                            $kichthuoc .='<option value="'.$i.'">'.$row.'</option>';
                        }                        
                        $i++;
                    }
                    // chat lieu
                    $chatlieu2 = array('Cotton','Thô','Kaki','Kate','Dạ / Nỉ','Jeans / Bò / Denim','Lanh / linen / tone ','Lụa',
                    'Lụa tơ tằm','Nilon / Nylon','Voan','Da','Ren','Len','Thun','Lưới','Nhung','Polyester','Chất liệu khác');
                    $j = 1;
                    foreach($chatlieu2 as $row){
                        if($chatlieus == $j){
                            $chatlieu .='<option value="'.$j.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $chatlieu .='<option value="'.$j.'" >'.$row.'</option>';
                        }
                        
                        $j++;
                    }
                    $this->ham_center('Kích thước',$kichthuoc,'kichthuoc','Chất liệu',$chatlieu,'chatlieu');
                    // mau sac
                    $mausac .= '<option value="1" style="background-color: #ffffff;" '.($mausacs==1?'selected=""':'').'>Trắng</option>';
                    $mausac .= '<option value="2" style="background-color: #000000;" '.($mausacs==2?'selected=""':'').'>Đen</option>';
                    $mausac .= '<option value="3" style="background-color: #ff0000;" '.($mausacs==3?'selected=""':'').'>Đỏ</option>';
                    $mausac .= '<option value="4" style="background-color: #112c4e;" '.($mausacs==4?'selected=""':'').'>Xanh đen</option>';
                    $mausac .= '<option value="5" style="background-color: #999999;" '.($mausacs==5?'selected=""':'').'>Xám</option>';
                    $mausac .= '<option value="6" style="background-color: #0080ff;" '.($mausacs==6?'selected=""':'').'>Xanh nước biển</option>';
                    $mausac .= '<option value="7" style="background-color: #ffff00;" '.($mausacs==7?'selected=""':'').'>Vàng</option>';
                    $mausac .= '<option value="8" style="background-color: #800080;" '.($mausacs==8?'selected=""':'').'>Tím</option>';
                    $mausac .= '<option value="9" style="background-color: #ffc0cb;" '.($mausacs==9?'selected=""':'').'>Hồng phấn</option>';
                    $mausac .= '<option value="10" style="background-color: #ff8040;" '.($mausacs==10?'selected=""':'').'>Cam</option>';
                    $mausac .= '<option value="11" style="background-color: #cccccc;" '.($mausacs==11?'selected=""':'').'>Bạc</option>';
                    $mausac .= '<option value="12" style="background-color: #fef1ce;" '.($mausacs==12?'selected=""':'').'>Kem</option>';
                    $mausac .= '<option value="13" style="background-color: #804000;" '.($mausacs==13?'selected=""':'').'>Nâu</option>';
                    $mausac .= '<option value="14" style="background-color: #ffffff;" '.($mausacs==14?'selected=""':'').'>Màu Khác</option>';
                    $this->ham_center4('Màu sắc',$mausac,'mausac');
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array('kichthuoc','chatlieu','mausac'),$id);
                }
            }     
        }
        function ham_402($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('thuonghieu','loaigiay','kichthuoc'));
            }
            else{
                if(empty($id)){
                    $thuonghieus = $this->CI->session->userdata('thuonghieu');
                    $loaigiays = $this->CI->session->userdata('loaigiay');
                    $kichthuocs = $this->CI->session->userdata('kichthuoc');
                    
                    $thuonghieu = $loaigiay = $kichthuoc ='';
                    $i = 1;
                    $thuonghieu2 = array('Zara','Chaco','Tuvi\'s','Nike','Adidas','Massimo Dutti','Thương hiệu khác');
                    foreach($thuonghieu2 as $row){
                        if($thuonghieus ==  $i){
                            $thuonghieu .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $thuonghieu .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        
                        $i++;
                    } 
                    $j = 1;
                    $loaigiay2 = array('Giày da','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara');
                    foreach($loaigiay2 as $row){
                        if($loaigiays == $j){
                            $loaigiay .='<option value="'.$j.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $loaigiay .='<option value="'.$j.'">'.$row.'</option>';
                        }
                        $j++;
                    }            
                    for($i = 5 ; $i <= 50; $i++){
                        if($kichthuocs == $i){
                            $kichthuoc .= '<option value="'.$i.'" selected=""> '.$i.' </option>';
                        }
                        else{
                            $kichthuoc .= '<option value="'.$i.'"> '.$i.' </option>';
                        }
                    }
                    $this->ham_center('Thương hiệu',$thuonghieu,'thuonghieu','Loại giầy',$loaigiay,'loaigiay');
                    $this->ham_center4('Kích thước',$kichthuoc,'kichthuoc');
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array('thuonghieu','loaigiay','kichthuoc'),$id);
                }
            }      
            
        }
        function ham_403($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('thuonghieu','loaitui','kichthuoc'));
            }
            else{
                if(empty($id)){
                    $thuonghieus = $this->CI->session->userdata('thuonghieu');
                    $loaituis = $this->CI->session->userdata('loaitui');
                    $kichthuocs = $this->CI->session->userdata('kichthuoc');
                    
                    $thuonghieu = $loaitui = $kichthuoc ='';
                    $i = 1;
                    $thuonghieu2 = array('Zara','Chaco','Tuvi\'s','Nike','Adidas','Massimo Dutti','Thương hiệu khác');
                    foreach($thuonghieu2 as $row){
                        if($thuonghieus ==  $i){
                            $thuonghieu .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $thuonghieu .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        
                        $i++;
                    } 
                    $j = 1;
                    $loaitui2 = array('Da','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara','Zara');
                    foreach($loaitui2 as $row){
                        if($loaituis == $j){
                            $loaitui .='<option value="'.$j.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $loaitui .='<option value="'.$j.'">'.$row.'</option>';
                        }
                        $j++;
                    }            
                    for($i = 5 ; $i <= 50; $i++){           
                        $kichthuoc .= '<option value="'.$i.'"> '.$i.' </option>';
                    }
                    $this->ham_center('Thương hiệu',$thuonghieu,'thuonghieu','Loại túi',$loaitui,'loaitui');
                    $this->ham_center4('Kích thước',$kichthuoc,'kichthuoc');
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array('thuonghieu','loaitui','kichthuoc'),$id);
                }
            }    
        }
        function ham_404($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('thoitrang',array(),$id);
                }
            }
        }
        function ham_501($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('thuonghieu','dungtich','kieutu'));
            }
            else{
                if(empty($id)){
                    $thuonghieus = $this->CI->session->userdata('thuonghieu');
                    $dungtichs = $this->CI->session->userdata('dungtich');
                    $kieutus = $this->CI->session->userdata('kieutu');
                    
                    $thuonghieu = $kieutu = $dungtich ='';
                    $i = 1;
                    $thuonghieu2 = array('Sanyo','Panasonic','Sharp','Samsung(Hàn Quốc)','LG(Hàn Quốc)','Electrolux','Midea','Toshiba','Hitachi','Mitsubishi Electric','Aqua','Thương hiệu khác');
                    foreach($thuonghieu2 as $row){
                        if($thuonghieus == $i){
                            $thuonghieu .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $thuonghieu .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        $i++;
                    }
                    
                    $j = 1;
                    $dungtich2 = array('Dưới 120 lít','120 -> 150 lít','150 -> 300 lít','300 -> 450 lít','Trên 450 lít');
                    foreach($dungtich2 as $rows){
                        if($dungtichs == $j){
                            $dungtich .='<option value="'.$j.'" selected="">'.$rows.'</option>';
                            
                        }
                        else{
                            $dungtich .='<option value="'.$j.'">'.$rows.'</option>';
                        }
                        
                        $j++;
                    }
                    
                    $this->ham_center('Thương hiệu',$thuonghieu,'thuonghieu','Dung tích',$dungtich,'dungtich');
                    
                    $j = 1;
                    $kieutu2 = array('Mini','Ngăn đá trên','Ngăn đá dưới','Tủ lớn','Loại khác');
                    foreach($kieutu2 as $rows){
                        if($kieutus == $j){
                            $kieutu .='<option value="'.$j.'" selected="">'.$rows.'</option>';                                                        
                        }
                        else{
                            $kieutu .='<option value="'.$j.'">'.$rows.'</option>';
                        }
                        
                        $j++;
                    }
                    $this->ham_center4('Kiểu tủ',$kieutu,'kieutu');
                }
                else{
                    return $this->insert_table_danhmuc('ngoaithat_giadung',array('thuonghieu','dungtich','kieutu'),$id);
                }
            }
        }
        function ham_502($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('donoithat'));
            }
            else{
                if(empty($id)){
                    $donoithats = $this->CI->session->userdata('kichthuoc');
                    $donoithat = '';
                    $i = 1;
                    $donoithat2 = array('Bàn ghế','Giường','Tủ','Đồ trang trí','Thiết bị vệ sinh','Tiểu cảnh sân vườn','Tiểu cảnh ban công');
                    foreach($donoithat2 as $row){
                        if($donoithats == $i){
                            $donoithat .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $donoithat .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        
                        $i++;
                    }
                    
                    $this->ham_center4('Đồ nội thất, cây cảnh',$donoithat,'donoithat');
                }
                else{
                    return $this->insert_table_danhmuc('ngoaithat_giadung',array('donoithat'),$id);
                }
            }
        }
        function ham_503($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('ngoaithat_giadung',array(),$id);
                }
            }
        }
        function ham_601($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('vethucung'));
            }
            else{
                if(empty($id)){
                    $vethucungs = $this->CI->session->userdata('vethucung');
                    
                    $vethucung = '';
                    $i = 1;
                    $vethucung2 = array('Chó cảnh','Mèo cảnh','Dịch vụ thú cưng','Phụ kiện thú cưng','Thực phẩm thú cưng','Thú cưng khác');
                    foreach($vethucung2 as $row){
                        if($vethucungs == $i){
                            $vethucung .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $vethucung .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        
                        $i++;
                    }
                    
                    $this->ham_center4('Về thú cưng',$vethucung,'vethucung');
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array('vethucung'),$id);
                }
            }
        }
        function ham_602($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('danhmucsach'));
            }
            else{
                if(empty($id)){
                    $danhmucsachs = $this->CI->session->userdata('danhmucsach');
                    
                    $danhmucsach = '';
                    $i = 1;
                    $danhmucsach2 = array('Sách ngoại văn','Sách kinh tế','Sách văn học trong nước','Sách văn học nước ngoài','Sách thường thức đời sống','Sách thiếu nhi','Sách phát triển bản thân','Sách tin học ngoại ngữ','Sách chuyên ngành','Sách giáo khoa- giáo trình','Tạp chí văn phòng phẩm','Sách khác');
                    foreach($danhmucsach2 as $row){
                        if($danhmucsachs == $i){
                            
                            $danhmucsach .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $danhmucsach .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        
                        $i++;
                    }
                    
                    $this->ham_center4('Danh mục sách',$danhmucsach,'danhmucsach');
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array('danhmucsach'),$id);
                }
            }
        }
        function ham_603($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array(),$id);
                }
            }
        }
        function ham_604($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('dothethao_dangoai'));
            }
            else{
                if(empty($id)){
                    $dothethao_dangoai = $this->CI->session->userdata('dothethao_dangoai');
                    
                    $dothethao_dangoai = '';
                    $i = 1;
                    $dothethao_dangoai2 = array('Vật dụng cần thiết','Quần áo','Đồ dùng cá nhân','Dụng cụ nấu nướng','Thực phẩm','Dụng cụ cắm trại,nghỉ ngơi','Dụng cụ cầu cứu','Dụng cụ leo núi','Túi “mưu sinh”','Túi cứu thương');
                    foreach($dothethao_dangoai2 as $row){
                        if($dothethao_dangoais == $i){
                            
                            $dothethao_dangoai .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $dothethao_dangoai .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        
                        $i++;
                    }
                    
                    $this->ham_center4('Loại đồ thể thao/ dã ngoại',$dothethao_dangoai,'dothethao_dangoai');
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array('dothethao_dangoai'),$id);
                }
            }
        }
        function ham_605($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('giaitri_sothich',array(),$id);
                }
            }
        }
        function ham_701($id = null){
            if($id == 'test'){
               return $this->insert_table_test(array('dovanphong'));
            }
            else{
                if(empty($id)){
                    $dovanphongs = $this->CI->session->userdata('dovanphong');
                    
                    $dovanphong = '';
                    $i = 1;
                    $dovanphong2 = array('giấy in','bìa các loại','băng keo','tập, vở, sổ','văn phòng phẩm khác','Nhu yếu phẩm');
                    foreach($dovanphong2 as $row){
                        if($dovanphongs == $i){
                            
                            $dovanphong .='<option value="'.$i.'" selected="">'.$row.'</option>';
                        }
                        else{
                            $dovanphong .='<option value="'.$i.'">'.$row.'</option>';
                        }
                        
                        $i++;
                    }
                    
                    $this->ham_center4('Đồ dùng văn phòng',$dovanphong,'dovanphong');
                }
                else{
                    return $this->insert_table_danhmuc('vanphong',array(),$id);
                }
            }
        }
        function ham_702($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('vanphong',array(),$id);
                }
            }
        }
        function ham_801($id = null){
            if($id == 'test'){
               return true;
            }
            else{
                if(empty($id)){
                    
                }
                else{
                    return $this->insert_table_danhmuc('sanphamkhac',array(),$id);
                }
            }
        }
        function ham_congnghe($name =null,$values = null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>Khuyến mãi</p>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="'.$name.'" style="width: 100%;" rows="10" class="form-control" id="editor1">'.$values.'</textarea>
                                    <script>
                                           CKEDITOR.replace( "editor1" );
                                    </script> 
                                </div>
                                </div>';
            echo $a;
        }
        function ham_center($one = null,$two = null,$name1 =null,$three = null,$four = null,$name2 =null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <select class="form-control" name="'.$name1.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$one.'»</option>
                                        '.$two.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p>'.$three.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <select  class="form-control" name="'.$name2.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$three.'»</option>
                                        '.$four.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
            </div>';
            echo $a;
            
        }
        function ham_center2($one = null,$two = null,$name1 = null,$three = null,$four = null,$name2 =null,$values = null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <select class="form-control" name="'.$name1.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$one.'»</option>
                                        '.$two.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <p>'.$three.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <input class="form-control" type="text" placeholder="Không được để trống" name="'.$name2.'" value="'.$values.'"/>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                            </div>';
            echo $a;
            
        }
        function ham_center3($one = null,$name1,$values = null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="text_input">
                                        <input class="form-control" type="text" placeholder="Không được để trống" name="'.$name1.'" value="'.$values.'"/>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                            </div>';
            echo $a;
        }
        function ham_center4($one = null,$two = null,$name1 = null){
            $a = '<div class="row">
                                <div class="col-md-3">
                                    <p>'.$one.'</p>
                                </div>
                                <div class="col-md-3">
                                    <div class="text_input">
                                        <select class="form-control" name="'.$name1.'">
                                        <option selected="selected" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="">«'.$one.'»</option>
                                        '.$two.'
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                                
                            </div>';
            echo $a;
        }
        
        
    }
?>