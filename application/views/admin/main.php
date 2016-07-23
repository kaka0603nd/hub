<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
    .row.content {height: auto}
    
    .sidenav {
      background-color: #f1f1f1;
      height: auto;
    }
    
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
  <style>
  body{
    background-image:url(<?php echo base_url();?>public/images/icon/-login-bspace-images-login_background.png);
    font-size: 13px;
    color: #595959;
    font-family: Arial, Helvetica, sans-serif;
    line-height: 20px;
  }
  .box-content-show{
		background-image:url(<?php echo base_url();?>public/images/bg.jpg);
	}
                    div#title_thongtingianhang{
                        font-size: 24px;
                        margin-bottom: 5px;
                        font-family: serif;
                        font-weight: bold;
						color:#00F;
                    }
                    table#table_thongtingianhang{
                        width: 100%;
                        font-size: 16px;
                        font-family: serif;
                    }
                    img#img_thongtingianhang{
                        width: 60px;
                    }
                    table{
                        background: #f7f7f7 none repeat scroll 0 0;
                        margin-bottom: 20px;
                    }
                    table thead tr th{
                        background: #a1aaaf none repeat scroll 0 0;
                        border-bottom: 1px solid #fff;
                        border-right: 1px solid #fff;
                        color: #fff;
                        font-size: 14px;
                        font-weight: 300;
                        text-align: left;
                    }
                    #date_update{
                        font-style: italic;
                        font-size: 12px;
                        color: #E0E0DC;
                    }
                    #khoa{
                        color:#F00;
						font-weight:bold;
						font-size:16px;
                    }
                </style>
                <style>
					.container{
					   /*width: 1053px;*/
					}
                </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- <img src="<?php echo base_url();?>public/images/1458401946613_49686.jpg" width="100%" height="150px"/>  -->
    </div>
</div>
<style>
	#thanh-menu{
		height: auto;
		background-color: #141415;
		font:Arial, Helvetica, sans-serif;
		margin-top: 0;
		font-size: 12pt;
		font-weight: bold;
		color:#FFF;
	}
	#menu a, #dangnhap a{
		color:#FFF;
		text-decoration:none;

	}
	#menu, #dangnhap{
		margin-top: 7px;
    	margin-bottom: 5px;
	}
    
	.col-sm-3 { 
		
		border:1px solid #CCC;
        border-radius: 4px;
		/*box-shadow:5px 5px 5px #F7F7F7;*/
	}
	.col-sm-9 { 
		
		border:1px solid #CCC;
		/*box-shadow:5px 5px 5px #F7F7F7;*/
	}
    .sidenavs{
        background-image: url(<?php echo base_url();?>public/images/icon/-login-bspace-images-login_background.png);
        border-radius: 0px;
    }
</style>
<?php
    $user_img = $this->session->userdata('hinhanh');
?>
<div class="container-fluid" id="thanh-menu">
	<div class="col-md-11">
    	<div  id="menu" > 
                <a href="<?php echo base_url();?>home"><span class="glyphicon glyphicon-home"></span> Trang chủ</a>
                		 
        </div>
    </div>
    <div class="col-md-">
    	<div id="dangnhap">
            
            <a href="<?php echo base_url();?>admin/login/logout"><span class="glyphicon glyphicon-share-alt"></span> <span>Đăng xuất</span></a>
        </div>
    </div>
	
    
</div>
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-2 sidenavs">
      <div>
      	
      </div>
      
      <br />
      <style>
        .sidenav {
            background-color: #ECEBEB;
            height: auto;
            border-radius: 4px;
            /*border: 1px solid #BFBFBD;*/
            box-sizing: border-box;
        }
        .menu_doc1>li>a{
            color: #fff;
            font-size: 11px;
            font-weight: bold;
			cursor:pointer;
        }
        .menu_doc1>li{
            border: 1px solid #565555;
            /*box-shadow: 5px 5px 5px #D6D6D1;*/
            border-radius: 4px;
        }
        .menu_doc1>li>a>span{
            padding-right: 12px;
        }
        .menu_doc1>li>ul>li>a>span{
            padding-right: 12px;
        }
        .menu_doc2{
            /*
            padding: 10px 15px;
            margin-left: 25px;
            */
            padding-left: 0px;
        }
        .menu_doc2 li{
            list-style: none;
			padding-bottom: 4px;
			padding-top: 4px;
			padding-left: 40px;
			border-bottom: 1px solid #333332;
        }
        .menu_doc2 li a:hover{
            color: white;
        }
        .menu_doc2 li:hover{
            border: 1px solid #ffffff;
            border-radius: 4px;
            /*box-shadow: 5px 5px 5px #ddd;*/
            box-sizing: border-box;
        }
        .menu_doc2>li>a{
            text-decoration: none;
            font-size: 13px;
			color: #9E9E9B;
			font-weight: bold;
			font-family:Arial, Helvetica, sans-serif;
        }
        .a-title{
            position: relative;
        }
        .menu_soxuong1{
            position: absolute;
            right: 5px;
            top: 13px;
        }
        .menu_doc1>li>a:hover{
            background-color:#C0C0C0;
        }
		.menu_doc2{
			display:none;
		}
      </style>
      <script>
	  	$(document).ready(function(e) {
            $('.li_menu_doc1').click(function(){
				$('.menu_doc2').slideUp("slow");
				$(this).children('.menu_doc2').slideDown("slow");
			});
        });
      </script>
      <ul class="nav nav-pills nav-stacked menu_doc1">
        <li class="li_menu_doc1">
            <a><span class="glyphicon glyphicon-dashboard"></span><span>Dashboard</span></a>
        </li>
        <li class="li_menu_doc1">
            <a class="a-title"><span class="glyphicon glyphicon-info-sign"></span><span>TIN TỨC</span><span class="glyphicon glyphicon-menu-down menu_soxuong1"></span></a> 
            <ul class="menu_doc2">
                <li><a href="<?php echo base_url();?>admin/tintuc/">Thông tin nổi bật</a></li>
                <li><a href="<?php echo base_url();?>admin/tintuc/form_insert_info">Thêm tin khác</a></li>
            </ul>
        </li>
        <li class="li_menu_doc1">
            <a class="a-title"><span class="glyphicon glyphicon-file"></span><span>SẢN PHẨM</span><span class="glyphicon glyphicon-menu-down menu_soxuong1"></span></a> 
            <ul class="menu_doc2">
                <li><a href="<?php echo base_url();?>admin/sanpham/">Danh sách sản phẩm</a></li>
                <li><a href="<?php echo base_url();?>admin/sanpham/da_duyet">Sản phẩm đã duyệt</a></li>
                <li class="custom_menu_phanhoi">
                    <a href="<?php echo base_url();?>admin/sanpham/chua_duyet">Sản phẩm chưa duyệt</a>
                    <span class="label label-danger custom_mess_phanhoi">
                    <?php
                        $CI = &get_instance();
                        $CI->load->model('Sanpham_model');
                        echo $CI->Sanpham_model->count_sp_trangthai(3);
                    ?>
                </span>
                </li>
                <li><a href="<?php echo base_url();?>admin/sanpham/bao_cao">Sản phẩm báo cáo</a></li>
                <li><a href="#">Sản phẩm đã hủy</a></li>
                <li><a href="#">Sản phẩm không rõ</a></li>
            </ul>
        </li>
        <li class="li_menu_doc1">
            <a class="a-title"><span class="glyphicon glyphicon-user"></span> <span>NGƯỜI DÙNG</span><span class="glyphicon glyphicon-menu-down menu_soxuong1"></span></a> 
            <ul class="menu_doc2">
                <li><a href="<?php echo base_url();?>admin/user">Danh sách người dùng</a></li>
                <li><a href="<?php echo base_url();?>admin/store">Danh sách store</a></li>
                <li><a href="#">Danh sách nhân viên</a></li>
            </ul>
        </li>
        <li class="li_menu_doc1">
            <a><span class="glyphicon glyphicon-wrench" class="a-title"></span><span>SETTING THEME</span><span class="glyphicon glyphicon-menu-down menu_soxuong1"></span></a>
            <ul class="menu_doc2">
                <li><a href="#">Hình ảnh slide</a></li>
                <li><a href="#">Hình ảnh banner</a></li>
                <li><a href="#">Hình ảnh backgroub</a></li>
            </ul>
        </li>
        <li class="li_menu_doc1 custom_menu_phanhoi">
            <a class="a-title"><span class="glyphicon glyphicon-file"></span><span>Phản hồi</span><span class="glyphicon glyphicon-menu-down menu_soxuong1"></span></a> 
            <style>
                .custom_menu_phanhoi{
                    position: relative;
                }
                .custom_mess_phanhoi{
                    position: absolute;
                    right: -5px;
                    top: 0;
                    z-index: 5;
                    width: 40px;
                    height: 20px;
                    font-weight: bold;
                    font-size: 14px;
                }
            </style>
            <ul class="menu_doc2 ">
                <li><a href="<?php echo base_url();?>admin/phanhoi/">Thông tin phản hồi</a></li>
                <span class="label label-danger custom_mess_phanhoi">
                <?php
                    //$CI = &get_instance();
                    $CI->load->model('Phanhoi_model');
                    echo $CI->Phanhoi_model->count_not_duyet();
                ?>
                </span>
            </ul>
        </li>
        <script>
				$(document).ready(function(e) {
                    $('.btnform-main').click(function(){
						alert('Chức năng đang cập nhập');
						return false;
					});
                });
            </script>
        <li class="li_menu_doc1">
            <a ><span class="glyphicon glyphicon-stats" class="a-title"></span><span>DANH MỤC</span><span class="glyphicon glyphicon-menu-down menu_soxuong1"></span></a>
            <ul class="menu_doc2">
                <li><a href="<?php echo base_url();?>admin/danhmuc">Danh sách danh mục</a></li>
                <li><a href="#" class="btnform-main">Thêm danh mục</a></li>
            </ul>
        </li>
        
      </ul>
      <br>
      
    </div>
    
    <div class="col-sm-10 box-content-show">
        <div class="row">
            <div class="col-md-12">
                <?php
                //var_dump($data);
                    $this->load->view($url,$data);
                ?>
            </div>
          </div>        
      <hr>
    </div>
  </div>
</div>

<footer class="container-fluid" style="text-align: center;">
  <p>Bản quyền thuộc Khoa Công nghệ thông tin  </p>
  <p>Thiết kế và phát triển bởi <a href="https://batheitblog.wordpress.com/">batheitblog</a></p>
</footer>

</body>
</html>
