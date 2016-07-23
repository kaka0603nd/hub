<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paint</title>
<script type="text/javascript" src="<?php echo base_url();?>public/bootstrap-3.3.5-dist/js/jquery-2.2.0.js"></script>
    <!--
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
    -->
    <!-- khong kha dung voi bootstrap3.3.6 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
    <link rel="stylesheet" href="<?php echo base_url();?>public/dist/css/bootstrap.min.css" />
    <script src="<?php echo base_url();?>public/jquery/jquery-2.2.0.js"></script>
    <script src="<?php echo base_url();?>public/dist/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
	body{
		background-image:url(<?php echo base_url();?>public/images/bg.png);
        font-size: 14px;
	}
    .glyphicon{
        color: #F00;
    }
	#banner-top-col{
		background-color:#222;
	}
	#banner-top{
		float:right;
        
	}
    #banner-top-ul{
        float:right;
        
    }
    #banner-top-ul>ul>li>a{
        color: red;
    }
	#navbar-radio{
	   border: 0;
       margin-bottom: 0px;
	}
    .navbar{
        /*box-shadow: 0px 13px 33px #fffaaa; */
        box-shadow: 0px 9px 21px #BFBFBB;
    }
    .active{
        /*border-bottom: 1px solid #ffffff;*/
    }
    .img_logo{
        padding: 0;
    }
    .btn-dangsanpham{
        
        background: #fffaaa;
        padding-bottom: 4px;
        padding-top: 6px;
        margin-top: 9px;
        border-radius: 4px;
        color: red;
        font-weight: bold;
        font-family: inherit;
        font-size: 20px;
        box-shadow: 0px 0px 6px 4px #DADAD7;
    }
    ul{
        padding-left: 0;
    }
        /* Dành cho điện thoại */
    @media all and (max-width: 320px) {
        img.image_sp {
			/*transition: all 0.3s ease 0s;*/
			width: 50%;
		}
    }
     
    /* Dành cho máy tính bảng chiều dọc */
    @media all and (max-width: 600px) {
        img.image_sp {
			/*transition: all 0.3s ease 0s;*/
			width: 50%;
		}
    }
     
    /* Dành cho máy tính bảng chiều ngang */
    @media all and (max-width: 1024px) {
		img.image_sp {
			/*transition: all 0.3s ease 0s;*/
			width: 50%;
		}
	}
     
    /* Dành cho màn hình desktop */
    @media all and (max-width: 1280px) {
		div.body-left{
			display:none;
			
		}
	}
    
    @media screen and (max-width: 480px) {
    	#chon_danhmuc{
            display: none;
        }
		div.body-left{
			display:block;
			
		}
		div.danhmuc-min{
			position:fixed;
			display:block;
		}
		img.image_sp {
			/*transition: all 0.3s ease 0s;*/
			width: 50%;
		}
	}
	
	.body-left{
		position:fixed;
		/*position:absolute;*/
		display:none;
		/*width: 255px;*/
		height:1000px;
		background-color:#8A1111;
		z-index:36;
		width: 274px;
		min-width: 140px;
		max-width: 440px;
		margin-left:-274px;
        overflow: scroll;
	}
	.danhmuc-min{
		position:absolute;
		display:none;
		z-index:37;
		margin-top:60px;
	}
    a {
        text-decoration: none;
        transition: color .1s,background .2s;
        -webkit-transition: color .1s,background .2s;
        -moz-transition: color .1s,background .2s;
        -ms-transition: color .1s,background .2s;
        -o-transition: color .1s,background .2s;
        /*transition: color 0.1s ease 0s, background 0.2s ease 0s;*/
    }
    a:hover{
        color: #318DFD;
    }
    
</style>
<script>
	//screen.width
	$(document).ready(function(e) {
        var value_left = true;
		$('div.danhmuc-min').click(function(){
			if(value_left){
				$(this).animate({marginLeft: "+=274px"},"slow");
				$('div.body-left').animate({marginLeft: "+=274px"},"slow");
				value_left = false;
			}
			else{
				$(this).animate({marginLeft: "-=274px"},"slow");
				$('div.body-left').animate({marginLeft: "-=274px"},"slow");
				value_left = true;
			}
		}
		);
		
		/*
		$("div.danhmuc-min").toggle(
        function(){
			$(this).animate({marginLeft: "+=247px"},"slow");
			$('div.body-left').animate({marginLeft: "+=247px"},"slow");	
		},
        function(){
			$(this).animate({marginLeft: "-=247px"},"slow");
			$('div.body-left').animate({marginLeft: "-=247px"},"slow");	
		});
		*/
    });
</script>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '230267730673372',
      xfbml      : true,
      version    : 'v2.6'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script src="http://uhchat.net/code.php?f=038339"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>

<body>
<style>
    .custom_left_box_ul{
        width: 274px;
        border: 1px solid #12ECC1;
    }
    .custom_left_box_ul_div{
        border: 1px solid #12ECC1;
        padding: 5px 5px;
        position: relative;
        text-align: center;
        
        background-repeat: no-repeat;
        background-size: 28px;
        background-position-x: 32px;
        background-position-y: 2px;
        background-color: #fff;
    }
    .custom_left_box_ul_div_dientu{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/dientu.png');
    }
    .custom_left_box_ul_div_dienthoai{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/dienthoai.png');
    }
    .custom_left_box_ul_div_span{
        color: #EA1919;
        position: absolute;
        right: 4px;
        top: 6px;
    }
    .custom_left_box_ul_li{
        /*padding-left: 15px;*/
    }
    .custom_left_box_ul_li_div{
        border: 1px solid #fff;
        padding: 5px 5px;
        position: relative;
        
    }
    .custom_left_box_ul_li_div_span{
        color: #EA1919;
        position: absolute;
        right: 4px;
        top: 6px;
    }
    .custom_left_box_ul_li_ul_li{
        padding-left: 5px;
    }
</style>
<div class="body-left">
	<div style="float: left;margin-top: 60px;">
    	<ul class="custom_left_box_ul">
            <div class="custom_left_box_ul_div custom_left_box_ul_div_dientu"><a href="#" class="custom_left_box_ul_a" style="color: #EA1919;font-weight: 700;">Điện tử - Điện lạnh</a><span class="glyphicon glyphicon-triangle-bottom custom_left_box_ul_div_span"  data-toggle="collapse" href="#dientu"></span></div>
            <div id="dientu">
                <li class="custom_left_box_ul_li" >
                    <div class="custom_left_box_ul_li_div"><a href="#" class="custom_left_box_ul_li_a" style="color: #EFE438;">Tủ lạnh, Máy lạnh, Máy giặt</a><span class="glyphicon glyphicon-triangle-bottom custom_left_box_ul_li_div_span" data-toggle="collapse" href="#dientu_child_one"></span></div>
                    <ul class="custom_left_box_ul_li_ul" id="dientu_child_one">
                        <?php
                                            $i = 1;
                                            $arr_thuonghieu = array('Sanyo','Panasonic','Sharp','Samsung(Hàn Quốc)','LG(Hàn Quốc)','Electrolux','Midea','Toshiba','Hitachi','Mitsubishi Electric','Aqua','Thương hiệu khác');
                                            foreach($arr_thuonghieu as $key => $row){
                                                ?>
                                                <li class="custom_left_box_ul_li_ul_li"><a href="<?php echo base_url();?>danhmuc/get/501/<?php echo ($key+1);?>" title="Điện thoại Samsung" class="maintainHover" style="color: #0E0A42;"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                        
                    </ul>
                </li>
                <li class="custom_left_box_ul_li" >
                    <div class="custom_left_box_ul_li_div"><a href="#" style="color: #EFE438;">Ti vi, Amply, Máy nghe nhạc</a><span class="glyphicon glyphicon-triangle-bottom custom_left_box_ul_div_span" data-toggle="collapse" href="#dientu_child_two"></span></div>
                    <ul class="custom_left_box_ul_li_ul" id="dientu_child_two">
                        <?php
                                            $arr_tivi = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Sony','HTC','ASUS','HP','Lenovo','Obi','Wiko','Thương hiệu khác');
                                            foreach($arr_tivi as $key => $row){
                                                ?>
                                                <li class="custom_left_box_ul_li_ul_li"><a href="<?php echo base_url();?>danhmuc/get/305/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover" style="color: #0E0A42;"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                        
                    </ul>
                </li>
            </div>
            
            
        </ul>
    </div>
	<div style="float: left;margin-top: 2px;">
    	<ul class="custom_left_box_ul">
            <div class="custom_left_box_ul_div custom_left_box_ul_div_dienthoai"><a href="<?php echo base_url();?>danhmuc/get/301" class="custom_left_box_ul_a" style="color: #EA1919;font-weight: 700;">Điện thoại - Máy tính</a><span class="glyphicon glyphicon-triangle-bottom custom_left_box_ul_div_span"  data-toggle="collapse" href="#dienthoai"></span></div>
            <div id="dienthoai">
                <li class="custom_left_box_ul_li" >
                    <div class="custom_left_box_ul_li_div"><a href="#" class="custom_left_box_ul_li_a" style="color: #EFE438;">Điện thoại Di động</a><span class="glyphicon glyphicon-triangle-bottom custom_left_box_ul_li_div_span" data-toggle="collapse" href="#dienthoai_child_one"></span></div>
                    <ul class="custom_left_box_ul_li_ul" id="dienthoai_child_one">
                        <?php
                                            $arr_dienthoai = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Obi','Wiko','Lenovo','HTC','Sony','MAC','ASUS','ACER','DELL','HP','Thương hiệu khác');
                                            foreach($arr_dienthoai as $key => $row){
                                                ?>
                                                
                                                <li class="custom_left_box_ul_li_ul_li"><a href="<?php echo base_url();?>danhmuc/get/301/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover" style="color: #0E0A42;"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                    </ul>
                </li>
                <li class="custom_left_box_ul_li" >
                    <div class="custom_left_box_ul_li_div"><a href="#" style="color: #EFE438;">Máy tính bảng</a><span class="glyphicon glyphicon-triangle-bottom custom_left_box_ul_div_span" data-toggle="collapse" href="#dienthoai_child_two"></span></div>
                    <ul class="custom_left_box_ul_li_ul" id="dienthoai_child_two">
                        <?php
                                            $arr_dienthoai = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Obi','Wiko','Lenovo','HTC','Sony','MAC','ASUS','ACER','DELL','HP','Thương hiệu khác');
                                            foreach($arr_dienthoai as $key => $row){
                                                ?>
                                                <li class="custom_left_box_ul_li_ul_li"><a href="<?php echo base_url();?>danhmuc/get/302/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover" style="color: #0E0A42;"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                    </ul>
                </li>
            </div>
            
            
        </ul>
    </div>
</div>
<div class="danhmuc-min">
	<img src="<?php echo base_url();?>public/images/danhmuc/categories-128.png" width="35px"/>
</div>
<div class="body-full">
<!-- <img src="http://localhost:8080/Boxshop/public/captcha.php"/> -->
<div class="container-fluid">
	<div class="row" id="banner-top-col">
    	<div class="col-md-12" style="border-bottom: 1px solid #000000;">
            
                <nav class="navbar navbar-inverse navbar-fixed-top" id="navbar-radio">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                      </button>
                      <a class="navbar-brand img_logo" href="#"><img src="<?php echo base_url();?>public/images/apple.png" style="width: 50px;"/></a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                      <ul class="nav navbar-nav">
                        <li><a href="<?php echo base_url();?>home"></a></li>
                        <li class="active"><a href="<?php echo base_url();?>home">Home</a></li>
                        <li><a href="<?php echo base_url();?>home" >Sản phẩm</a></li>
                        <li><a href="<?php echo base_url();?>dang-san-pham.html" class="btn-dangsanpham" style="background: #fffaaa;
        padding-bottom: 4px;
        padding-top: 6px;
        margin-top: 9px;
        border-radius: 4px;
        color: red;
        font-weight: bold;
        font-family: inherit;
        font-size: 20px;
        box-shadow: 0px 0px 6px 4px #DADAD7;">Đăng sản phẩm</a></li>
                        <!--<li><a href="">Gian hàng</a></li> -->
                        <li class="dropdown ">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Store
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu custom_drop">
                                <?php
                                    $CI = &get_instance();
                                    $type_user = null;
                                    $type_user = $CI->session->userdata('type');
                                ?>
                              <li><a href="<?php echo base_url();?>store">Đăng kí gian hàng</a></li>
                              <?php
                                if($type_user == 'store'){
                                    ?>
                                        <li><a href="<?php echo base_url();?>my-store.html">My store</a></li>
                                    <?php
                                }
                              ?>
                              
                              <li><a href="<?php echo base_url();?>all-store.html">All store</a></li>
                              <li class="divider"></li>
                              <li><a href="#">Store best today</a></li> 
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url();?>home">About</a></li>
                        <li><a href="<?php echo base_url();?>phanhoi">Phản hồi</a></li>
                        <li><a href="<?php echo base_url();?>tin-tuc.html">Tin tức</a></li>
                        <li data-toggle="modal" data-target="#myModal"><a href="#" class="icon-map" style="padding-right: 58px;">Địa điểm</a></li>
                      </ul>
                    </div>
                  </div>
                </nav>
            
            
        	
        </div>
        <style>
            a.icon-map{
                background: url(http://localhost:8080/Boxshop/public/images/icon/map-marker-marker-inside-azure-icon.png);
                background-repeat: no-repeat;
                background-position-x: 76px;
                background-position-y: 9px;
                background-size: 32px;
                
            }
            .custom_ac{
                position: fixed;
                line-height: 50px;
                font-weight: 300;
                z-index: 1031;
                color: #fff;
                right: 112px;
            }
            .custom_ac>a{
                text-decoration: none;
                color: #fff;
            }
            .custom_ac>a:hover{
                font-style: inherit;
            }
        </style>
        <style>
            .custom_acs{
                position: fixed;
                line-height: 50px;
                font-weight: 300;
                z-index: 1031;
                color: #fff;
                right: 112px;
                cursor: pointer;
            }
            .custom_child_ac>span{
                padding-left: 4px;
            }
            .popovers-content>a, .popover-content>a>span{
                color: #596067;
                text-decoration: none;
            }
            .popovers-content>a:hover{
                
            }
        </style>
        <?php
            if($this->session->has_userdata('id')){
                ?>
                <div class="custom_acs btn_ac_click" >
                    <div class="custom_child_ac">
                        <img src="<?php echo base_url();?>public/images/icon/userPic.png"/>
                        <span>Cá nhân</span>
                        <span class="glyphicon glyphicon-chevron-down" style="padding-top: 2px;font-size: smaller;color: #fff;"></span>
                    </div>
                </div>
                <?php
            }
            else{
                ?>
                <div class="custom_ac">
                    <a class="fn-login" href="<?php echo base_url();?>dangnhap" title="Đăng nhập">Đăng nhập</a>
                    <span class="slash">/</span>
                    <a href="#" title="Đăng ký" data-toggle="modal" data-target=".bs-example-modal-sm" >Đăng ký</a>
                </div>
                
                <?php
            }
        ?>
        
        
        
    </div>
</div>
<style>
    .show_acount{
        background: #fff none repeat scroll 0 0;
        /*box-shadow: 0 1px 5px rgba(0, 0, 0, 0.2);*/
        display: none;
        padding: 15px 0px 27px 20px;
        position: fixed;
        right: 73px;
        top: 61px;
        width: 300px;
        z-index: 99999;
        box-shadow: 0 5px 10px rgba(0,0,0,.2);
        border: 1px solid rgba(0,0,0,.2);
        border-radius: 2px;
        box-sizing: border-box;
    }
    .arr-top {
        border-color: transparent transparent #fff;
        border-style: solid;
        border-width: 0 10px 10px;
        height: 0;
        position: absolute;
        right: 40px;
        top: -10px;
        width: 0;
    }
    .avt-header{
        float: left;
        padding-right: 16px;
    }
    .avt-header-type{
        position: absolute;
        /* left: 29px; */
        bottom: 4px;
        background-color: #42F7BC;
        padding: 0px 25px;
        font-weight: bold;
        color: #9C9C9C;
        font-family: sans-serif;
        /* text-shadow: 3px 3px 1px #ffffff; */
    }
    .avt-body{
        float:left;
    }
    .box_top_ac {
        padding: 0px 14px;
    }
    .box_top_ac a{
        text-decoration: none;
    }
    .box_top_ac>a>span:hover{
        color: #318DFD;
    }
    .box_top_ac>a>span{
            color: #596067;
            padding-bottom: 12px;
    }
</style>
<div class="show_acount">
    <span class="arr-top"></span>
    <div class="avt-header">
        <a title="Trang cá nhân" rel="nofollow" href="<?php echo base_url();?>dangki/update_user/<?php echo md5($this->session->userdata('email'))?>" class="fn-profile">
            <img height="80px" src="http://s120.avatar.zdn.vn/avatar_files/f/a/2/5/kaka0603nd_120_1.jpg" class="fn-thumb" alt="kaka0603nd" />
        </a>
        <span class="avt-header-type"><?php echo empty($type_user)?'':$type_user; ?></span>
    </div>
    <div class="avt-body">
        <div class="box_top_ac">
            <a href="<?php echo base_url();?>dangki/update">
                <span class="glyphicon glyphicon-user"></span><span style="padding-left: 10px;">Thông tin cá nhân</span>
            </a><br />
            <a href="<?php echo base_url();?>dangki/edit">
                <span class="glyphicon glyphicon-cog"></span>
                <span style="padding-left: 10px;">Cập nhập thông tin</span>
            </a><br />
            <a href="<?php echo base_url();?>dangnhap/logout">
                <span class="glyphicon glyphicon-lock"></span>
                <span style="padding-left: 10px;">Thoát</span>
            </a>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(e){
        var btn_ac_click_value = true;
       $('.btn_ac_click').click(function(){
            if(btn_ac_click_value){
                $('.show_acount').stop().slideDown("slow");
                btn_ac_click_value = false;
            }else{
                $('.show_acount'). stop().slideUp("slow");
                btn_ac_click_value = true;
            }
       });
    });
</script>
                <script>
                    $(document).ready(function(e){
                        
                        //$('.btn_dangnhaps').popover({title: "<p style='text-align: center;width: 135px;'><a href='<?php echo base_url();?>'><strong><?php echo $this->session->has_userdata('id')?$this->session->userdata('name'):'';?></strong></a></p>", content: "<a href='<?php echo base_url();?>dangki/update_user/<?php echo md5($this->session->userdata('email'))?>'><span class='glyphicon glyphicon-user'></span><span style='padding-left: 10px;'>Thông tin cá nhân</span></a><br/><a href='<?php echo base_url();?>dangki/update_user'><span class='glyphicon glyphicon-cog'></span><span style='padding-left: 10px;'>Cập nhập thông tin</span></a><br/><a href='<?php echo base_url();?>dangnhap/logout'><span class='glyphicon glyphicon-lock'></span><span style='padding-left: 10px;'>Thoát</span></a>", html: true, placement: "bottom"}); 
                    });
                </script>
<div id="box_danhmuc">
    <div class="container" style="margin-top: 48px;">
    <div class="row">
        <div class="col-md-8">
            <a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>public/images/icon/logo2a.png" width="295px"/></a>
        </div>
        <div class="col-md-4 box_big_gio_hang">
        <center>
            <div class="box_gio_hang">
                <ul>
                    
                    <li>
                        <a href="<?php echo base_url();?>giohang/">
                            <div class="giohang">
                                <img src="<?php echo base_url();?>public/images/icon/icon_giohang.png" />
                            </div>
                            <span>giỏ hàng</span>
                        </a>
                        <span class="giohang_thongbao"><?php
                            $counts = count($this->cart->contents());
                            echo $counts;
                        ?></span>
                    </li>
                    <!--                    
                    <li>
                        <a href="#" class="btn_dangnhap" role="button" data-toggle="popover" data-trigger="focus">
                            <div class="giohang icon_login">
                                <img src="<?php echo base_url();?>public/images/icon/userPic.png" />
                            </div>
                            <span>ngo ba the</span>
                        </a>
                    </li>
                    -->
                    <li style="clear: both;">
                    </li>
                </ul>
            </div></center>
        </div>
    </div>
</div>
</div>
<style>
    .giohang{
        background: #33F111;
        font-family: fontello;
        font-size: 16px;
        line-height: 38px;
        padding: 3px 8px;
        color: #fff;
        width: 48px;
        height: 48px;
        border-radius: 50px;
        box-shadow: -1px 2px 10px 6px #E45E10;
    }
    .box_big_gio_hang{
        /*
        position: relative;
        */
        padding-top: 15px;
        text-align: center;
        
    }
    .box_gio_hang{
        /*
        position: absolute;
        top: 0px;
        right: 0px;
        z-index: 5;
        */
        margin-left: 60px;
    }
    .box_gio_hang ul li{
        width: 55px;
        height: 48px;
        float: left;
        list-style: none;
        margin-right: 5px;
        text-align: center;
        position: relative;
    }
    .box_gio_hang ul li:hover .giohang{
        background-color: #ffffff;
        transition: 50;
    }
    .box_gio_hang ul{
        width: 160px;
    }
    .box_gio_hang ul li a{
        text-decoration: none;
    }
    .icon_login{
        padding: 13px 8px;
    }
    .giohang_thongbao{
        background-color: #E5101D;
        color: #FFF;
        position: absolute;
        top: 2px;
        left: 38px;
        width: 18px;
        height: 20px;
        line-height: 20px;
        text-indent: 0;
        z-index: 4;
        border-radius: 2px;
    }
</style>

<style>
    #box_danhmuc{
        width: 100%;
        background-color: #D8D5D5;
        background-image: url(<?php echo base_url();?>public/images/icon/banner-doanhnghiep.jpg);
        background-repeat: no-repeat;
        background-position: center;
        background-size: 100%;
    }
    .box-danhmuc .container{
        background: white;
        /* border-radius: 4px; */
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }
    #text_searchfull{
        width: 80%;
        float: left;
    }
    #btn_searchfull{
        width: 20%;
        float: left;
    }
    .padding_right{
        padding-right: 8px;
    }
    .padding_right_max{
        padding-right: 45px;
    }
    #danhmuc-show{
        display: none;
        background-color: #C7C4BE;
        font-size: 17px;
        font-family: serif;
    }
    .hover_danhmuc{
        background-color: #C7C4BE;
        cursor: pointer;
        font-size: 20px;
        font-family: serif;
        margin: 0;
        padding-top: 1px;
        padding-bottom: 4px;
        padding-left: 5px;
        border-top-left-radius: 2px;
        border-top-right-radius: 2px;
        color: #ffffff;
        padding-right: 5px;
        text-shadow: 5px 5px 5px #71716C;
        /*background-color: #C7C4BE;
        font-size: 17px;
        font-family: serif;
		margin:0;
		padding: 5px;
        */
    }
	#chon_danhmuc{
		background-color: #C7C4BE;
	}
    #danhmuc-show{
        width: 500px;
    }
    #btn_searchfull{
        position: relative;
    }
    .icon_search{
        position: absolute;
        left: 12px;
        top: 8px;
        font-size: 19px;
        color: #ffffff;
    }
    .icon_textsearch{
        position: absolute;
        left: 31px;
        top: 7px;
        color: #ffffff;
        font-weight: bold;
    }
    #btn_clicksearch{
        width: 99%;
        border-radius: 0px;
        /*padding: 9px 11px;*/
    }
    #form-search{
        border-radius: 0px;
    }
    .hiden_search{
        display: none;
        position: fixed;
        height: 100%;
        width: 100%;
        background: #fffaaa;
        z-index: 55555;
        opacity: 0;
    }
</style>
<script language="javascript">
	$(document).ready(function(e) {
		var hienthi_menu = true;
        $("#chon_danhmuc").mousemove(hienthi_danhmuc);
        $("#chon_danhmuc").mouseout(an_danhmuc);
		function hienthi_danhmuc(){
            $("#danhmuc-show").stop().show("slow");
		}
        function an_danhmuc(){
            $("#danhmuc-show").stop().hide("slow");
        }
    });
</script>
<style>
    a{
        text-decoration: none;
    }
    .dropdown-menu{
        margin-left: 14px;
        box-shadow: 5px 5px 10px rgba(0,0,0,.2);
        min-width: 264px;
    }
    .dropdown-menu>li{
        /*border: 1px solid #eaeaea;
        border-top-color: transparent;
        */
        border-left: 2px solid transparent;
        border-right: none;
        box-sizing: border-box;
    }
    .dropdown-menu>li>a {
        text-decoration: none;
        display: block;
        padding: 3px 40px;
        clear: both;
        font-weight: 400;
        line-height: 1.42857143;
        color: #333;
        white-space: nowrap;
    }
    .dropdown-menu>li>a:hover{
        background-color: #fff;
        color: #3498db;
    }
    .submenu_image{
        
        background-repeat: no-repeat;
        background-size: 26px;
        width: 40px;
        height: 40px;
        position: absolute;
        top: 16%;
        left: 2%;
        /* background-position-x: 7px; */
        /* background-position-y: 5px; */
        z-index: 5;
    }
    .submenu_image_dientu{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/dientu.png');
    }
    .submenu_image_dienthoai{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/dienthoai.png');
    }
    .submenu_image_xe{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/xe.png');
    }
    .submenu_image_batdongsan{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/batdongsan.png');
    }
    .submenu_image_thoitrang{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/thoitrang.png');
    }
    .submenu_image_noithat{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/noithat.png');
    }
    .submenu_image_giaitri{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/mayanh.png');
    }
    
    .submenu_image_dodung{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/batdongsan.png');
    }
    .submenu_image_khac{
        background-image: url('<?php echo base_url();?>public/images/danhmuc/sanphamkhac.png');
    }
    .submenu{
        position: relative;
    }
    .dropdown-menu>li>.guide {
        display: block;
        font-size: 12px;
        color: #505050;
        white-space: nowrap;
        text-overflow: ellipsis;
        overflow: hidden;
        line-height: 20px;
        cursor: pointer;
        font-weight: 400;
        padding-left: 40px;
        margin: 0 0 5px;
    }
    .guide a{
        text-decoration: none;
        transition: color .1s,background .2s;
        -webkit-transition: color .1s,background .2s;
    }
    .popovers {
        width: 200%;
        max-width: 200%;
        -webkit-border-top-left-radius: 0;
        -webkit-border-bottom-left-radius: 0;
        border-radius: 0;
        overflow: hidden;
        position: absolute;
        overflow: scroll;
        
        z-index: 1060;
        display: none;
        
        padding: 1px;
        font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: left;
        white-space: normal;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #ccc;
        border: 1px solid rgba(0,0,0,.2);
        /*border-radius: 6px;*/
        -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
        box-shadow: 0 5px 10px rgba(0,0,0,.2);

    }
    
    .popovers-content>ul {
        /* display: block; */
        /* margin: 0 0 5px; */
        padding: 0;
        float: left;
        width: 50%;
        min-height: 181px;
        list-style: none;
        z-index: 2;
    }
    .popovers-content>ul>li>a.title {
        font-weight: 700;
        text-overflow: ellipsis;
        width: 175px;
        white-space: nowrap;
        overflow: hidden;
    }
    .popovers-content>ul>li>a{
        display: block;
        line-height: 22px;
        font-weight: 400;
        text-align: left;
        font-size: 14px;
        color: #1f2228;
        color: #596067;
        text-decoration: none;
    }
    .popovers-content>ul>li>a:hover{
        color: #318DFD ;
        transition: color 0.1s ease 0s, background 0.2s ease 0s;
    }
    .popovers{
        display: none;
        top: -6px;
        left: 260px;
        height: 583px;
    }
    .submenu{
        box-sizing: border-box;
    }
    .submenu:hover{
        border-right: blue;
    }
    .submenu:hover .popovers{
        display: block;
    }
</style>
<div id="box_danhmuc" class="box-danhmuc">
    <div class="container">
        <div class="row" style="margin-bottom: 3px; margin-top: 4px;">
            <div class="col-md-3">
                <div id="chon_danhmuc" >
                    <div class="col-md-12 hover_danhmuc dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-list " style="color: #fff;font-size: 14px;"></span>
                        <span class="" style="    font-weight: 700;    font-size: 19px;margin-left: 16px;">Danh mục sản phẩm</span>
                        <!--<span class="glyphicon glyphicon-menu-down padding_right"></span>-->
                    </div>
                    <ul class="dropdown-menu" style="    width: 264px;">
                      
                      <li class="submenu submenu-1">
                        <a href="" title="Điện tử - Điện lạnh" class="">
                            
                            <strong class="submenu-title">Điện tử - Điện lạnh</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers">
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/501/one" title="Tủ lạnh, Máy lạnh, Máy giặt">Tủ lạnh, Máy lạnh, Máy giặt</a>
                                        </li>
                                        <?php
                                            $i = 1;
                                            $arr_thuonghieu = array('Sanyo','Panasonic','Sharp','Samsung(Hàn Quốc)','LG(Hàn Quốc)','Electrolux','Midea','Toshiba','Hitachi','Mitsubishi Electric','Aqua','Thương hiệu khác');
                                            foreach($arr_thuonghieu as $key => $row){
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/501/<?php echo ($key+1);?>" title="Điện thoại Samsung" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                                    	
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/305/one" title="Ti vi, Amply, Máy nghe nhạc">Ti vi, Amply, Máy nghe nhạc</a>
                                        </li>
                                    	<?php
                                            $arr_tivi = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Sony','HTC','ASUS','HP','Lenovo','Obi','Wiko','Thương hiệu khác');
                                            foreach($arr_tivi as $key => $row){
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/305/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                    
                                    
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_dientu"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Điện thoại - Máy tính" class="">
                            
                            <strong class="submenu-title">Điện thoại - Máy tính</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="top: -71px;" >
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/301/one" title="Điện thoại di động">Điện thoại Di động</a>
                                        </li>
                                    	<?php
                                            $arr_dienthoai = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Obi','Wiko','Lenovo','HTC','Sony','MAC','ASUS','ACER','DELL','HP','Thương hiệu khác');
                                            foreach($arr_dienthoai as $key => $row){
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/301/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/302/one" title="Máy tính bảng">Máy tính bảng</a>
                                        </li>
                                    	<?php
                                            $arr_dienthoai = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Obi','Wiko','Lenovo','HTC','Sony','MAC','ASUS','ACER','DELL','HP','Thương hiệu khác');
                                            foreach($arr_dienthoai as $key => $row){
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/302/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/303/one" title="Máy tính, Lap top">Máy tính, Laptop</a>
                                        </li>
                                    	<?php
                                            $arr_dienthoai = array('Samsung','Nokia,Microsoft','Apple','LG','FPT','BlackBerry','Oppo','Obi','Wiko','Lenovo','HTC','Sony','MAC','ASUS','ACER','DELL','HP','Thương hiệu khác');
                                            foreach($arr_dienthoai as $key => $row){
                                                if($key>=9){
                                                    
                                                
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/303/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                                }
                                            }
                                        ?>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/306/one" title="Linh kiện, Phụ kiện">Linh kiện, Phụ kiện</a>
                                        </li>
                                    	
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_dienthoai"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Phương tiện - Xe" class="">
                            
                            <strong class="submenu-title">Phương tiện - Xe</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="top: -136px;" >
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/101/one" title="Xe máy">Xe máy</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/102/one" title="Ô tô">Ô tô</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/103/one" title="Xe đạp">Xe đạp</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/104/one" title="Xe tải">Xe tải</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/105/one" title="Xe khác">Xe khác</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/106/one" title="Linh kiện, Phụ kiện xe">Linh kiện, Phụ kiện xe</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_xe"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Bất động sản" class="">
                            
                            <strong class="submenu-title">Bất động sản</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="    top: -201px;" >
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/201/one" title="Căn hộ, Chung cư">Căn hộ, Chung cư</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/202/one" title="Nhà ở">Nhà ở</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/203/one" title="Đất">Đất</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/204/one" title="Mặt bằng, Kinh doanh">Mặt bằng, Kinh doanh</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_batdongsan"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Thời trang - Cá nhân" class="">
                            
                            <strong class="submenu-title">Thời trang - Cá nhân</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="top: -266px;">
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/401/one" title="Quần áo">Quần áo</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/402/one" title="Giày dép">Giày dép</a>
                                        </li>
                                        <?php
                                            $arr_giaydep = array('Zara','Chaco','Tuvi\'s','Nike','Adidas','Massimo Dutti','Thương hiệu khác');
                                            foreach($arr_giaydep as $key => $row){
                                                
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/402/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                                
                                            }
                                        ?>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/403/one" title="Túi xách">Túi xách</a>
                                        </li>
                                    	<?php
                                            $arr_tui = array('Zara','Chaco','Tuvi\'s','Nike','Adidas','Massimo Dutti','Thương hiệu khác');
                                            foreach($arr_tui as $key => $row){
                                                
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/403/<?php echo ($key+1);?>" title="<?php echo $row?>" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                                
                                            }
                                        ?>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/404/one" title="Mẹ và bé, Phụ kiện">Mẹ và bé, Phụ kiện</a>
                                        </li>
                                    	
                                    </ul>
                                    
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_thoitrang"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Nội, ngoại thất - Gia dụng" class="">
                            
                            <strong class="submenu-title">Nội, ngoại thất - Gia dụng</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="top: -331px;" >
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/502/one" title="">Nội ngoại thất, Gia dụng</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/503/one" title="">Đồ gia dụng khác</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/501/one" title="">Tủ lạnh, Máy giặt, Điều hòa</a>
                                        </li>
                                    	<?php
                                            $arr_dienlanh = array('Sanyo','Panasonic','Sharp','Samsung(Hàn Quốc)','LG(Hàn Quốc)','Electrolux','Midea','Toshiba','Hitachi','Mitsubishi Electric','Aqua','Thương hiệu khác');
                                            foreach($arr_dienlanh as $key => $row){
                                                ?>
                                                <li><a href="<?php echo base_url();?>danhmuc/get/501/<?php echo ($key+1);?>" title="Điện thoại Samsung" class="maintainHover"><?php echo $row?></a></li>
                                                <?php
                                            }
                                        ?>
                                    </ul>
                                    
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_noithat"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Giải trí - Sách" class="">
                            
                            <strong class="submenu-title">Giải trí - Sách</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="top: -396px;" >
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/601/one" title="">Vật nuôi, Thú cưng</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/602/one" title="">Sách</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/603/one" title="">Âm nhạc, Phim</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/604/one" title="">Đồ sưu tầm, Game</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/605/one" title="">Khác</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_giaitri"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Đồ dùng - Đồ chuyên dụng" class="">
                            
                            <strong class="submenu-title">Đồ dùng - Đồ chuyên dụng</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="top: -462px;" >
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/701/one" title="">Đồ dùng văn phòng</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    <ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/702/one" title="">Giống nuôi, Cây trồng</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_dodung"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                      <li class="divider"></li>
                      <li class="submenu submenu-1">
                        <a href="" title="Điện tử" class="">
                            
                            <strong class="submenu-title">Sản phẩm khác</strong>
                            <div class="guide">
                                <a href="" title="Tivi" class="">Tivi</a>, 
                                <a href="" title="Truyền hình số" class="">Truyền hình số</a>, 
                                <a href="" title="Đầu phát HD, Smart Box" class="">Smart Box</a>
                            </div>
                            <div id="submenu-84" class="popovers" style="top: -525px;" >
                                <div class="popovers-content">
                                	<ul>
                                    	<li>
                                            <a class="title" href="<?php echo base_url();?>danhmuc/get/801/one" title="">Sản phẩm khác</a>
                                        </li>
                                    	<li>
                                            <span><img src="<?php echo base_url();?>public/images/icon/loader.gif"/></span>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </a>
                        <span class="submenu_image submenu_image_khac"></span>
                        <!--<a href="#">HTML</a>-->
                      </li>
                    </ul>
                </div>
            </div>
            <!--<div class="col-md-2">
            </div>
            -->
            <style>
            /*
                #search-box .search-area {
                    border: 1px solid #ee3124;
                    margin: 6px 0 0;
                    background: #fff;
                    border-radius: 3px;
                }
                .control-group {
                    position: relative;
                }
                #search-box .search-area .search-field {
                    border: none;
                    width: 86%;
                    padding: 8px;
                    border-radius: 3px 0 0 3px;
                    height: 30px;
                }
                .control-group .search-clear {
                    position: absolute;
                    top: 9px;
                    right: 62px;
                    width: 22px;
                    height: 22px;
                    background: rgba(0,0,0,.2);
                    color: #fff;
                    cursor: pointer;
                    font-weight: 700;
                    text-align: center;
                    border: none;
                    outline: 0;
                    border-radius: 2px;
                }
                #search-box .search-area .search-button {
                    float: right;
                    display: inline-block;
                    text-align: center;
                    padding: 9px 15px 8px;
                    margin: -1px -1px 0 0;
                    background-color: #ee3124;
                    text-decoration: none;
                    border-radius: 0 3px 3px 0;
                }
                .icon-search{
                    width: 30px;
                }
                */
                .form-control{
                    padding: 6px 38px 6px 12px;
                }
                #search-box{
                    position: relative;
                }
                .btn-search{
                    position: absolute;
                    top: 0px;
                    right: 0px;
                    height: 100%;
                    width: 77px;
                    background: #ffffff;
                    border: 1px solid #ccc;
                    border-bottom-right-radius: 3px;
                    border-top-right-radius: 3px;
                }
                .show_search_pro{
					display: none;
					margin-top: 1px;
					background-color: #CCC;
					height: auto;
					width: 91%;
					position: absolute;
					z-index: 59999999999;
					-moz-border-bottom-colors: none;
					-moz-border-left-colors: none;
					-moz-border-right-colors: none;
					-moz-border-top-colors: none;
					background: #fff none repeat scroll 0 0;
					border-color: #d9d9d9 #ccc #ccc;
					border-image: none;
					border-style: solid;
					border-width: 1px;
					box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
					cursor: default;
                }
				.ul-search-form{
					padding-left: 5px;
    				padding-top: 5px;
				}
				.ul-search-form li{
					list-style:none;
					border-bottom:1px dotted #FFF0F4;
					margin-bottom: 2px;
					/*padding-bottom:2px;*/
				}
				.ul-search-form li:hover{
					box-shadow:5px 5px 5px #fffaaa;
				}
				.ul-search-form li a{
					text-decoration:none;
				}
				.ul-search-form li a img{
					width: 55px;
    				border: 1px solid;
					float:left;
				}
				.form-search-info{
					color:#318DFD;
					padding-left: 74px;
				}
				.search-money{
					color:#DC4B11;
				}
            </style>
            <script>
				$(document).ready(function(e) {
                    $('.input_search').keyup(function(){
						var data = $(this).val();
                        if(data == " "){
                            $('.show_search_pro').hide("slow");
                            $('.ul-search-form').html("");
                            
                        }
                        else{
                            $.ajax({
    							url:"<?php echo base_url();?>search/search_auto",
    							data:{
    								key:data
    							},
    							dataType:"text",
    							type:"POST",
    							success: function(result){
    							 $('.hiden_search').show();
						              $('.show_search_pro').slideDown("slow");
    								$('.ul-search-form').html(result);
    								//alert(result);
    							}
    						});
                        }
					});
					
                    $('.hiden_search').click(function(){
                        $('.input_search').val("");
						$('.show_search_pro').hide("slow");
                        $('.ul-search-form').html("");
                        $('.hiden_search').hide();
                    });
                    
					//$('.input_search').focusin(function(){alert('hello')});
					/*
					$('.input_search').focusout(function(){
					   //setTimeout(1000);
					   $(this).val("");
						$('.show_search_pro').hide("slow");
                        $('.ul-search-form').html("");
					});
					*/
					
					$('.forcus_head').focusout(function(){
						$('.input_search').val("");
					});
                    
                    /*
                    $('.show_search_pro').focusout(function(){
						$('.input_search').val("");
						$('.this').hide("slow");
                        $('.ul-search-form').html("");
					});
                    */
                });
            </script>
            <div class="col-md-9">
                <form action="<?php echo base_url();?>search/search_pro" method="get" id="form-search">
                    <div id="search-box" class="clearfix">
                        <input class="form-control input_search" name="key" type="text"  maxlength="80" placeholder="Nhập nội dung tìm kiếm..." />
                        <span class="search-clear" id="SearchClear" style=""><i class="icons icon-cancel-5"></i></span>            
                        <button class="btn-search"><img src="<?php echo base_url();?>public/images/icon/Search.png" class="icon-search"/></button>
                        <div class="show_search_pro">
                            <ul class="ul-search-form">
                            	<!--<li>
                                	<a href="<?php echo base_url();?>home/sanpham/">
                                    	<img src="<?php echo base_url();?>public/sanpham/thumb/thumb-image_null.png" width="20px"/>
                                        <div class="form-search-info">
                                            <p>Sam sung ultra hd 365k</p>
                                            <p class="search-money">956000 USD</p>
                                        </div>
                                    </a>
                                </li>
                                
                                -->
                            </ul>
                        </div>
                    </div>
                            
                </form>
                <div class="result-search">
                </div> 
                <!--<div class="col-md-3">
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <form method="get" id="form-search" >
                            <div id="search-box" class="clearfix">
                                <input class="form-control input_search" type="text"  maxlength="80" placeholder="Nhập nội dung tìm kiếm..." />
                                <span class="search-clear" id="SearchClear" style=""><i class="icons icon-cancel-5"></i></span>            
                                <button class="btn-search"><img src="<?php echo base_url();?>public/images/icon/Search.png" class="icon-search"/></button>
                            </div>
                            
                        </form>
                        <div id="search_full">
                            <div id="text_searchfull">
                                <input type="text" class="form-control" placeholder="Search Blog.." id="form-search">
                            </div>
                            <div id="btn_searchfull">
                                <input class="btn btn-warning" id="btn_clicksearch" type="submit" value=""/>
                                <span class="glyphicon glyphicon-search icon_search"></span>
                                <span class="icon_textsearch">search</span>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                -->
            </div>
        </div>
    </div>
</div>
<style>
    .custom_drop{
        position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 160px;
    padding: 5px 0;
    margin: 2px 0 0;
    font-size: 14px;
    text-align: left;
    list-style: none;
    background-color: #fff;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #ccc;
    border: 1px solid rgba(0,0,0,.15);
    border-radius: 4px;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    
    }
</style>
<div class="hiden_search">
</div>
<script>
    $(document).ready(function(e){
        var s = $('#search-box').width();
        //alert('hello : '+s);
    });
</script>

<div class="container" >
    <!--<button type="button" class="btn btn-default" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Vivamussagittis lacus vel augue laoreet rutrum faucibus.">
      Popover on bottom
    </button>
    
    <a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" >Dismissible popover</a>
    -->
    <script>
    $(document).ready(function(){
        //$('.btn_dangnhap').popover({title: "<p style='text-align: center;width: 100px;'><strong>Thông tin</strong></p>", content: "<a href='<?php echo base_url();?>dangnhap'>Đăng nhập</a><br/><a href='<?php echo base_url();?>dangki'>Đăng kí</a>", html: true, placement: "right"}); 
    });
    </script>
</div>


<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title" id="myModalLabel">Lựa chọn tài khoản đăng kí</h5>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <style>
                    .box-type-dangki>ul{
                        padding: 0px;
                    }
                    .box-type-dangki>ul>li{
                        list-style: none;
                        padding-left: 108px;
                        line-height: 3.1;
                        border: 1px solid #DADAD7;
                        margin: 5px;
                        box-sizing: border-box;
                        box-shadow: 4px 1px 10px #D2D2D0;
                        border-radius: 2px;
                        width: 100%;
                        background-repeat: no-repeat;
                        
                    }
                    li.box-type-dangki-store{
                        background-image: url(<?php echo base_url();?>public/images/icon/psd-small-store-icon-1.png);
                        background-size: 50px;
                    }
                    li.box-type-dangki-thanhvien{
                        background-image: url(<?php echo base_url();?>public/images/icon/images_Sabtenam.png);
                        background-size: 40px;
                    }
                    .box-type-dangki>ul>li>a{
                        text-decoration: none;
                        color: #c54134;
                        font-size: 14px;
                        font-weight: bold;
                    }
                    .box-type-dangki>ul>li>a:hover{
                        color: #318DFD ;
                        transition: color 0.1s ease 0s, background 0.2s ease 0s;
                    }
                </style>
                <div class="box-type-dangki">
                        <ul>
                            <li class="box-type-dangki-thanhvien"><a href="<?php echo base_url();?>dangki"><span>Thành viên</span></a></li>
                            <li class="box-type-dangki-store"><a href="<?php echo base_url();?>store"><span>Gian hàng</span></a></li>
                            
                        </ul>    
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Bạn đang ở đâu ?</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <style>
                    div.box-select-tinhthanh{
                        height: 500px;
                        overflow-y: scroll;
                    }
                    .box-select-tinhthanh>div{
                        width: 100%;
                        background-image: url(<?php echo base_url();?>public/images/icon/blue-pin.svg);
                        background-size: 50px;
                        line-height: 3.1;
                        border: 1px solid #DADAD7;
                        margin: 5px;
                        box-sizing: border-box;
                        box-shadow: 4px 1px 10px #D2D2D0;
                        border-radius: 2px;
                        width: 100%;
                        background-repeat: no-repeat;
                        text-align: center;
                    }
                    .box-select-tinhthanh>div>a{
                        text-decoration: none;
                        color: #c54134;
                        font-size: 14px;
                        font-weight: bold;
                        width: 100%;
                    }
                    .box-select-tinhthanh>div>a:hover{
                        color: #318DFD ;
                        transition: color 0.1s ease 0s, background 0.2s ease 0s;
                    }
                    div.box-select-tinhthanh-active{
                        position: relative;
                    }
                    div.box-select-tinhthanh-active>span{
                        position: absolute;
                        height: 50px;
                        width: 50px;
                        top: -12px;
                        background-image: url(<?php echo base_url();?>public/images/icon/map-marker-marker-inside-azure-icon.png);
                        right: 0px;
                        background-size: 50px;
                    }
                </style>
                <?php
                    $select_tinhthanh = array('','Toàn Quốc','Hà Nội','TP. Hồ Chí Minh','Hải Phòng','Đà Nẵng',
                                                'Cần Thơ','An Giang','Bắc Giang','Bắc Kạn','Bạc Liêu','Bắc Ninh',
                                                'Bà Rịa - Vũng Tàu','Bến Tre','Bình Định','Bình Dương','Bình Phước','Bình Thuận',
                                                'Cao Bằng','Cà Mau','Đắk Lắk','Đắk Nông','Điện Biên',
                                                'Đồng Nai','Đồng Tháp','Gia Lai','Hải Dương','Hậu Giang',
                                                'Hà Giang','Hà Nam','Hà Tĩnh','Hòa Bình','Hưng Yên',
                                                'Khánh Hòa','Kiên Giang','Kon Tum','Lai Châu','Lâm Đồng',
                                                'Lạng Sơn','Lào Cai','Long An','Nam Định','Nghệ An',
                                                'Ninh Bình','Ninh Thuận','Phú Thọ','Phú Yên','Quảng Bình',
                                                'Quảng Nam','Quảng Ngãi','Quảng Ninh','Quảng Trị','Sóc Trăng',
                                                'Sơn La','Tây Ninh','Thái Bình','Thái Nguyên','Thanh Hóa',
                                                'Thừa Thiên - Huế','Tiền Giang','Trà Vinh','Tuyên Quang','Vĩnh Long',
                                                'Vĩnh Phúc','Yên Bái');
                                    ?>
                <div class="box-select-tinhthanh">
                        <?php
                            $CI = &get_instance();
                            foreach($select_tinhthanh as $key => $row){
                                if(!empty($key)){
                                    
                                
                                if($CI->session->has_userdata('tinhthanh')){
                                    if($key == $CI->session->userdata('tinhthanh')){
                                        ?>
                                            <div class="box-select-tinhthanh-active">
                                                <a class="box-select-tinhthanh-child" href="<?php echo base_url();?>home/set_tinhthanh/<?php echo $key; ?>"><span><?php echo $row; ?></span></a>
                                                <span></span>
                                                
                                            </div>
                                        <?php
                                    }
                                    else{
                                        ?>
                                            <div>
                        
                                                <a class="box-select-tinhthanh-child" href="<?php echo base_url();?>home/set_tinhthanh/<?php echo $key; ?>"><span><?php echo $row; ?></span></a>
                                            
                                                
                                            </div>
                                        <?php
                                    }
                                }
                                else{
                                    if($key == 1){
                                       ?>
                                        <div class="box-select-tinhthanh-active">
                                                <a class="box-select-tinhthanh-child" href="<?php echo base_url();?>home/set_tinhthanh/<?php echo $key; ?>"><span><?php echo $row; ?></span></a>
                                                <span></span>
                                                
                                            </div>
                                       <?php 
                                    }
                                    else{
                                        ?>
                                            <div>
                            
                                                <a class="box-select-tinhthanh-child" href="<?php echo base_url();?>home/set_tinhthanh/<?php echo $key; ?>"><span><?php echo $row; ?></span></a>
                                            
                                                
                                            </div>
                                        <?php
                                    }
                                }
                            }
                        ?>
                        
                        <?php
                            }
                        ?>
                        
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<style>
    div.custom_alert{
        <?php
        //$CI = &get_instance();
        if(!$CI->session->has_userdata('message')){
                
                echo 'display: none;';
            }
        ?>
        
        top: 155px;
        right: 295px;
        margin: 0 auto;
        width: auto;
        position: fixed;
        line-height: 3;
        background: #AAE06B;
        box-sizing: border-box;
        box-shadow: 4px 4px 11px #CCCBCA;
		z-index:655;
    }
    span.custom_alert_tick{
        padding: 15px 35px;
        background: url(<?php echo base_url();?>public/images/icon/tick_green.png) no-repeat;
        background-position: center;
        background-size: 36px;
    }
    span.custom_alert_content{
        padding-right: 30px;
    }
    span.custom_alert_close{
        width: 20px;
        padding: 15px 35px;
        background: url(<?php echo base_url();?>public/images/icon/xclose-icon.png.pagespeed.ic.OP9RKymFYu.png) no-repeat;
        background-position: center;
        background-size: 9px;
        position: absolute;
        top: -6px;
        right: -25px;
        opacity: 0.5;
		cursor:pointer;
    }
</style>
<script>
	$(document).ready(function(e) {
        $('.custom_alert_close').click(function(){
			$('.custom_alert').fadeOut("slow");
		});
        
		setTimeout(hide_custom_alert,3000);
		function hide_custom_alert(){
			$('.custom_alert').fadeOut("slow");
		}
        <?php
        //$CI = &get_instance();
        if($CI->session->has_userdata('message')){
                
                echo '$(".custom_alert").slideDown(5000);';
            }
        ?>
    });
</script>
<div class="custom_alert">
    <span class="custom_alert_tick"></span>
    <span class="custom_alert_content">
    <?php
        //$CI = &get_instance();
        if($CI->session->has_userdata('message')){
                $message = $CI->session->flashdata('message');
                echo $message;
            }
    ?>
    </span>
    <span class="custom_alert_close"></span>
</div>








