
<script>
	$(document).ready(function(e) {
        $('.form-validate').click(function(){
			$(this).slideUp("slow");
		});
        //$('.err_input').addClass('form-validate');
    });
    
</script>
<script>
    /*$(document).ready(function(){
        //$('#imgSmile').width(200);
        $('img').mouseover(function()
           {
              $(this).css("cursor","pointer");
           });
       $("img").toggle(function()
         {$(this).animate({width: "500px"}, 'slow');},
         function()
         {$(this).animate({width: "200px"}, 'slow');
   });
});*/
    $(document).ready(function(e) {
        /*$('.image_sp').hover(
			function(){
				$(this).animate({width:"164px"},80);
			},
			function(){
				$(this).animate({width:"100%"},80);
			});
            */
        $('.btn_giohang').click(function(){
			var s = $(this).children('.input_id').val();
			$.ajax({
				url: "<?php echo base_url();?>giohang/add_cart/",
				data:{
				    id : s
				},
				dataType:"text",
				type:"POST",
				success: function(result){
					//$('.show_giohang').html(result);
                    $('.giohang_thongbao').slideUp("slow");
                    $('.giohang_thongbao').slideDown("slow");                    
                    $('.giohang_thongbao').html(result);
                    
                    $('.custom_alert').slideDown('slow');
                    $('.custom_alert_content').html('Đã thêm sản phẩm vào giỏ hàng...');
                    setTimeout(hide_custom_alert,4000);
            		function hide_custom_alert(){
            			$('.custom_alert').slideUp("slow");
            		}
				},
                error:function (xhr, ajaxOptions, thrownError){
                    //On error, we alert user
                    alert(thrownError);
                }
			});
            return false;
		});
    });
</script>
<style>
    .form-validate{
        box-sizing: border-box;
        /*text-align: center;*/
        font-family: serif;
        font-style: italic;
        font-size: 14px;
        color: #FF2828;
		border-radius: 2px;
		border: 1px dotted #EC3C5D;
		padding-left: 12px;
		padding-top: 5px;
		margin-bottom: 5px;
        line-height: 20px;
        cursor: pointer;
    }
</style>
<style>
	.main{
		background-color:#FFF;
		border:1px solid #F5F5F5;
		box-shadow:5px 5px 5px #CCCCCC;
		height:auto;
		width:380px;
	}
	.box_hinhanh{
		height:auto;
		width:800px;
		overflow:hidden;
	}
	.hinhanh{
		width:80px;
		height:100%;
		float:left;
		opacity:0.5;
	}
	.hide_hinhanh{
		display:none;
	}
	div.hinhanh:hover{
	   background-color:#F4F4F4;
	   opacity:1;
	   border:1px solid #CCC;
	   border-radius:4px;
	}
	div.hinhanh>img{
		width:76px;
		height:76px;
	}
	#show_hinhanh{
		width:100%;
		height:100%;
	}
    #show_hinhanh>img{
		width:100%;
        margin: 0px auto;
    }
    .custom_table{
        background: #f5f5f5 none repeat scroll 0 0;
        border-collapse: separate;
        box-shadow: 0 1px 0 #fff inset;
        font-size: 14px;
        line-height: 16px;
        text-align: left;
        width: 100%;
    }
    .custom_table tr td {
        background: #f1f1f1 none repeat scroll 0 0;
        border-right: 1px solid #fff;
        border-top: 1px solid #fff;
        
        border-bottom: 1px solid #e8e8e8;
        border-left: 1px solid #e8e8e8;
        padding: 10px;
        position: relative;
        transition: all 0.3s ease 0s;
    }
    .custom_table tr td:first-child {
        box-shadow: 1px 0 0 #fff inset;
    }
</style>
<script>
	$(document).ready(function(e) {
        $(".btnlefts").click(left_click);
			$(".btnrights").click(right_click);
			$('.hinhanh2').hide('fast');
			function left_click(){
				//$('.hinhanh2').addClass('hide_hinhanh');
				//$('.hinhanh1').removeClass('hide_hinhanh');
				$(".box_hinhanh").animate({marginLeft:"0px"});
				$('.hinhanh2').hide('slow');
				$('.hinhanh1').show('slow');
			}
			function right_click(){
				//$('.hinhanh1').addClass('hide_hinhanh');
				//$('.hinhanh2').removeClass('hide_hinhanh');
				$(".box_hinhanh").animate({marginLeft:"0px"});
				$('.hinhanh1').hide('slow');
				$('.hinhanh2').show('slow');
			}
			$('.hinhanh>img').click(hienthi_hinhanh);
			function hienthi_hinhanh(){
				var s = $(this).attr('src');
				$('.sanpham_hinhanh').attr('src',s);
				//alert(s);
			}
    });
</script>
<?php
    $imgs = $sanpham['sanpham_hinhanh'];
    $img = null;
    if(empty($imgs)){
        $img = 'image_null.png';
    }
    else{
        $img = explode(',',$imgs);
        //$img = $img[0];
    }
?>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="duongdan_link">
            Đường dẫn file
        </div>
        
            <section class="col-md-8">
                
                <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="title_dangki">
                            <span>Thông tin sản phẩm</span>
                        </div>
                        <div class="content" id="page_content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <center><?php echo $sanpham['tensanpham']?></center>
                                            
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-7">
                                        <div class="row">
                                            <div class="col-md-12">
                                               <div id="show_hinhanh">
                                                    <center><img src="<?php echo base_url();?>public/sanpham/<?php echo $img[0]?>" class="sanpham_hinhanh image_sp" width="300px"/></center>
                                                </div> 
                                            </div>
                                            
                                        </div>
                                        <?php
                                        if(!is_array($img)){
                                            
                                        }
                                        else{
                                            
                                        
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="main">
                                                	<div class="box_hinhanh">
                                                        <?php
                                                        $i = 0;
                                                        //var_dump($img);
                                                        foreach($img as $key => $row){
                                                            if($i <5){
                                                                
                                                        
                                                        ?>
                                                    	<div class="hinhanh hinhanh1" href="#">
                                                        	<img src="<?php echo base_url();?>public/sanpham/<?php echo $row?>" width="80px"/>
                                                        </div>
                                                        
                                                        <?php
                                                            }
                                                            else{
                                                                ?>
                                                                <div class="hinhanh hinhanh2" >
                                                                	<img src="<?php echo base_url();?>public/sanpham/<?php echo $row?>" width="80px"/>
                                                                </div>
                                                                <?php
                                                            }
                                                            $i++;
                                                        }
                                                        ?>
                                                        
                                                        <div class="clearfix">
                                                        </div>
                                                	</div>
                                                    
                                                </div><!-- endmain-->
                                            </div>
                                    </div><!-- endsilide hinh anh-->
                                    <?php
                                        }
                                    ?>
                                    <div>
                                        <div class="btnlefts btn btn-default">
                                           <span class="glyphicon glyphicon-chevron-left">
                                           </span> 
                                        </div>
                                        <div class="btnrights btn btn-default">
                                           <span class="glyphicon glyphicon-chevron-right">
                                           </span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5" style="padding-right: 0px;">
                                    <div class="fb-like" data-href="https://batheitblog.wordpress.com/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
                                    <table class="table table-striped custom_table">
                                        <tr>
                                            <td>Tình trạng</td>
                                            <td><span><?php if($sanpham['tinhtrang'] == 1){ echo '<img src="'.base_url().'public/images/icon/moi4.gif"/> <span class="label label-info">Còn mới</span>';}else{ echo '<span class="label label-default">Đã qua sử dụng</span>';}?></span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Tên sản phẩm</span></td>
                                            <td><?php echo $sanpham['tensanpham']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Tiêu đề bài đăng</span></td>
                                            <td><?php echo $sanpham['tieude']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Chính sách bảo hành</span></td>
                                            <td><?php echo $sanpham['baohanh']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Tỉnh thành</span></td>
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
                                            <td><span class="label label-warning" style="font-size: 14px;"><?php echo $select_tinhthanh[$sanpham['sanpham_tinhthanh']]?></span></td>
                                        </tr>
                                        <?php
                                            foreach($extend as $key => $row){
                                                
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo ''.$row;?></td>
                                            <td><?php echo ''.$sanpham[$key]?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        <!-- <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </section>
            <style>
                
                .sidebar_dangnhap{
                    background: #fff none repeat scroll 0 0;
                    margin-bottom: 10px;
                    padding: 20px 0px 30px;
                }
                .box_dangnhap{
                    background: #fff none repeat scroll 0 0;
                    padding: 0px 7px 30px;
                }   
                .title_dangnhap{
                    background-color: rgba(66, 68, 82, 0.52);
                }
                div.title_dangnhap span{
                    font-size: 21px;
                    font-weight: bold;
                    padding: 12px 20px;
                    color: #ffffff;
                    font-family: serif;
                }
                #box_sidebar{
                    margin-bottom: 28px;
                }
            </style>
            <style>
					#thongtinkhuyenmai{
						margin-left: 5px;
						margin-right:5px;
					}
                    #tomtat_tinhtrang{
                        /*
                        font:Arial, Helvetica, sans-serif;
						font-size: 17px;
                        color: #00FD40;
                        opacity: 0.8;
                        font-style: italic;
                        font-weight: bold;
                        */
                        font-weight: 700;
                        font-size: 14px;
                        display: block;
                        margin: 0 0 10px;
                        color: #2ecc71;
                        text-transform: uppercase!important;
                    }
					#tomtat_gia{
						display: block;
						color: #ee3124;
						font-size: 46px;
						font-weight: 700;
						margin-right: 6px;
						font-family: Oswald,sans-serif;
                        /*
                        color: #ee3124;
                        font-size: 14px;
                        font-weight: 700;
                        margin-right: 6px;
                        font-family: Oswald,sans-serif;
                        */
					}
					#text_khuyenmai{
						color:#F00;
						font-weight:bold;
					}
					#noidung_khuyenmai ul{
						margin: 0;
    					padding: 0;
						list-style:none;
						color: #7a8188;
					}
					#khuyenmai_icon{
						margin-right:8px;
					}
                    #muahang{
                        margin-left: 0px;
                        margin-right: 0px;
                        padding: 0px;
                        margin-top: 5px;
                        margin-bottom: 5px;
                        font-weight: bold;
                    }
                    #muahang_lienhe{
                        width: 100%;
                    }
                    #margin_padding{
                        margin: 0px;
                        padding: 0px;
                    }
                    #icon_dienthoai{
                        margin-top: 15px;
                    }
                    #cacgianhang{
                        margin-top: 5px;
                    }
                    #gianhang ul{
                        list-style: none;
                        margin: 0px;
                        padding: 0px;
                        color: #7a8188;
                    }
                    #gianhang ul li span{
                        margin-right: 5px;
                    }
                    .icon-lienhe{
                        font-size: 20px;
                        font-weight: bold;
                        color: #1E0B84;
                        font-family: serif;
                        opacity: 0.8;
                    }
                </style>
            <aside class="sidebar right-sidebar col-lg-4 col-md-4 col-sm-4">
                <div class="row" id="box_sidebar">
                    <div class="col-md-12">
                        <div class="title_dangnhap">
                            <span>Giá - Thông tin</span>
                        </div>
                        <div class="sidebar_dangnhap">
                            <!--<div>
                                <div class="col-md-12">
                                    
                                </div>
                            </div>
                            -->
                            <div>
                                <div class="col-md-12 box_dangnhap">
                                    <div class="box_dangnhap">
                                        <div id='thongtinkhuyenmai'>
                                        <strong id='tomtat_tinhtrang'><?php echo $sanpham['conhang']==1?'Còn hàng':'Hết hàng'?></strong>
                                        <p id='tomtat_gia'><?php echo number_format($sanpham['gia']) ?>₫</p>
                            
                                        <div id="control_muahang">
                                        	<div class="col-md-12 muahang" id="muahang">
                                                <div class="row" id="muahang">
                                                    <a class="btn btn-success btn_giohang" id="muahang_lienhe" href="<?php echo base_url();?>giohang/add_cart/<?php echo $sanpham['sanpham_id']?>"><input type="hidden" class="input_id" value="<?php echo $sanpham['sanpham_id']?>"/><h5><img src="<?php echo base_url();?>public/images/icon/cart_add.png" width="26px"/> Thêm giỏ hàng</h5></a>
                                                </div>
                                                <div class="row" id="muahang">
                                                    <a class="btn btn-default" id="muahang_lienhe">
                                                        <h5><img src="<?php echo base_url();?>public/images/icon/New_Product_Introduction_Process.jpg" width="26px"/> Sản phẩm tương tự</h5>
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </div>
                            
                                        <div id="cacgianhang">
                                            <span style="font-style: normal;font-weight: bold;font-size: 17px;color: #920D37">Liên hệ : </span>
                                            <div id="gianhang">
                                                <h5><img src="<?php echo base_url();?>public/images/icon/phone.png" /> <span class="icon-lienhe"> : <?php echo $sanpham['lienhe']?></span></h5>
                                                <!--
                                                <ul id="list-gianhang">
                                                    <li><span class="glyphicon glyphicon-check"></span>gian hang 1</li>
                                                    <li><span class="glyphicon glyphicon-check"></span>gian hang 1</li>
                                                    <li><span class="glyphicon glyphicon-check"></span>gian hang 1</li>
                                                    <li><span class="glyphicon glyphicon-check"></span>gian hang 1</li>
                                                </ul>
                                                -->
                                                
                                            </div>
                                        </div>
                                        <div id="cacgianhang">
                                            <span style="font-style: normal;font-weight: bold;font-size: 17px;color: #920D37">Vận chuyển : </span>
                                            <div id="gianhang">
                                                <h5><img src="<?php echo base_url();?>public/images/icon/deliver-icon.png" width="25px"/> <span class="icon-lienhe"> : <?php echo $sanpham['vanchuyen']?></span></h5>
                                                <p id="date_update">Update at : <?php echo $sanpham['sanpham_ngaydang']?></p>
                                            </div>
                                        </div>
                                    </div><!-- end thongtinkhuyenmai-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="title_dangnhap">
                            <span>Những lưu ý khi đăng kí</span>
                        </div>
                        <div class="sidebar_dangnhap">
                            <div>
                                <div class="col-md-12">
                                    <span>Nếu bạn đã có tài khoản</span>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-12 box_dangnhap">
                                    <div class="box_dangnhap">
                                        <a class="link-search-field"><span>ĐĂNG NHẬP NGAY</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="row"></div>
            </aside>
        
    </div>
    <style>
                    div#title_thongtingianhang{
                        font-size: 24px;
                        margin-bottom: 5px;
                        font-family: serif;
                        font-weight: bold;
						color:#00F;
                    }
                    table#table_thongtingianhang{
                        width: 100%;
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
                    #gia_gianhang{
                        color:#F00;
						font-weight:bold;
						font-size:16px;
                    }
                </style>
                <div class="row">
                    
                    <div class="col-md-8">
                        <div id="title_thongtingianhang">
                            <span class="glyphicon glyphicon-ok-sign"></span><span class="" id="title_thongtingianhang"> Thông tin gian hàng</span>
                        </div>
                        <div style="background-color: #ffffff;">
                            <ul class="nav nav-tabs" style="background-color: #E5E6DE;opacity: 0.8">
                              <li class="active"><a data-toggle="tab" href="#home">Chi tiết</a></li>
                              <li><a data-toggle="tab" href="#menu1">Comment</a></li>
                              <li><a data-toggle="tab" href="#menu2">Người đăng</a></li>
                            </ul>
                            
                            <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                <h3>Chi tiết sản phẩm</h3>
                                <table class="table table-striped custom_table">
                                        <tr>
                                            <td width="20%">Tình trạng</td>
                                            <td><span><?php if($sanpham['tinhtrang'] == 1){ echo '<img src="'.base_url().'public/images/icon/moi4.gif"/> <span class="label label-info">Còn mới</span>';}else{ echo '<span class="label label-default">Đã qua sử dụng</span>';}?></span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Tên sản phẩm</span></td>
                                            <td><?php echo $sanpham['tensanpham']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Danh mục</span></td>
                                            <td><?php echo $sanpham['danhmuc_name']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Tiêu đề bài đăng</span></td>
                                            <td><?php echo $sanpham['tieude']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Tỉnh thành</span></td>
                                            <td><span class="label label-warning" style="font-size: 14px;"><?php echo $select_tinhthanh[$sanpham['sanpham_tinhthanh']]?></span></td>
                                        </tr>
                                        <!--<?php
                                            foreach($extend as $key => $row){
                                                
                                            
                                        ?>
                                        <tr>
                                            <td><?php echo ''.$row;?></td>
                                            <td><?php echo ''.$sanpham[$key]?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        -->
                                        <tr>
                                            <td>Xuất xứ</td>
                                            <td>Chính hãng</td>
                                        </tr>
                                        <tr>
                                            <td>Thương hiệu</td>
                                            <td>Oppo</td>
                                        </tr>
                                        <tr>
                                            <td><span>Ngày đăng</span></td>
                                            <td><?php echo $sanpham['sanpham_ngaydang']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Nội dung & miêu tả</span></td>
                                            <td><?php echo $sanpham['noidung']?></td>
                                        </tr>
                                        <tr>
                                            <td><span>Chính sách bảo hành</span></td>
                                            <td><?php echo $sanpham['baohanh']?></td>
                                        </tr>
                                    </table>
                              </div>
                              <div id="menu1" class="tab-pane fade">
                                <div>
                                    <div class="fb-comments" data-href="https://batheitblog.wordpress.com/2016/03/19/ha-milu-la-1-con-vit/" data-colorscheme="light" data-numposts="5" data-width="500"></div>
                                </div>
                                 
                              </div>
                              <div id="menu2" class="tab-pane fade">
                                <h3>Thông tin người đăng</h3>
                                <?php
                                    $CI = &get_instance();
                                    $CI->load->model('User_model');
                                    $result = $CI->User_model->get_user_dangsanpham($sanpham['sanpham_id']);
                                    //var_dump($result);
                                ?>
                                <div>
                                    <table class="table table-striped custom_table">
                                        <?php
                                            if($result['type'] == 'user'){
                                                
                                            
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td>Họ tên</td>
                                                <td><?php echo $result['fullho'].' '.$result['fullname']?></td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td><?php echo $result['name']?></td>
                                            </tr>
                                            <tr>
                                                <td>Hình ảnh</td>
                                                <td>
                                                    <?php
                                                        if(empty($result['hinhanh'])){
                                                            ?>
                                                            <div class="custom_logo_user">
                                                                <img src="<?php echo base_url();?>public/images/icon/image_null.png" width="30%"/>
                                                                <span class="label label-info">user</span>
                                                            </div>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <div class="custom_logo_user">
                                                                <img src="<?php echo base_url();?>public/images/user/<?php echo $result['hinhanh']?>" width="30%"/>
                                                                <span class="label label-info">user</span>
                                                            </div>
                                                            
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
                                            else{
                                                
                                            
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td>Tên gian hàng</td>
                                                <td><a href="<?php echo base_url();?>store/my_store/<?php echo $result['id']?>"><?php echo $result['name_store']?></a></td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại</td>
                                                <td><?php echo $result['sodienthoai']?></td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ</td>
                                                <td><?php echo $result['diachi']?></td>
                                            </tr>
                                            <tr>
                                                <td>Hình ảnh</td>
                                                <td>
                                                    <?php
                                                        if(empty($result['hinhanh'])){
                                                            ?>
                                                            <div class="custom_logo_user">
                                                                <a href="<?php echo base_url();?>store/my_store/<?php echo $result['id']?>"><img src="<?php echo base_url();?>public/images/icon/image_null.png" width="30%"/></a>
                                                                <span class="label label-success">store</span>
                                                            </div>
                                                        <?php
                                                        }
                                                        else{
                                                            ?>
                                                            <div class="custom_logo_user">
                                                                <a href="<?php echo base_url();?>store/my_store/<?php echo $result['id']?>"><img src="<?php echo base_url();?>public/images/store/<?php echo $result['hinhanh']?>" width="30%"/></a>
                                                                <span class="label label-success">store</span>
                                                            </div>
                                                        
                                                        <?php
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ</td>
                                                <td><?php echo $result['diachi']?></td>
                                            </tr>
                                        </tbody>
                                        <?php
                                            }
                                        ?>
                                    </table>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                
                    <!--<div class="col-md-8">
                        <div id="title_thongtingianhang">
                            <span class="glyphicon glyphicon-ok-sign"></span><span class="" id="title_thongtingianhang"> Thông tin gian hàng</span>
                        </div>
                        <div>
                            <table class="table table-bordered" id="table_thongtingianhang">
                                <thead>
                                    <tr>
                                        <th width="5%">Index</th>
                                        <th width="9%">Photo</th>
                                        <th width="30%">Mô tả sản phẩm</th>
                                        <th width="7%">Mới</th>
                                        <th width="20%">Cửa hàng</th>
                                        <th width="13%">Giá bán sp</th>
                                        <th>Control</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><span>1</span></td>
                                        <td><a href="#"><img src="images/1.png" id="img_thongtingianhang"/></a></td>
                                        <td>
                                            <div>
                                                <p>San pham duoc xem nhieu nhat</p>
                                                <p>Apple iPhone 5S 16GB (Vàng)</p>
                                                <p id="date_update">Update at : 29/2/2016</p>
                                            </div>
                                        </td>
                                        <td><span class="label label-danger">New</span></td>
                                        <td>
                                            <a href="#"><span>Dia chi or gian hang</span></a>
                                            <a href="#" class="btn btn-success">Come on ... </a>
                                        </td>
                                        <td>
                                            <span id="gia_gianhang">11.899.000</span>
                                            
                                        </td>
                                        <td><span class="btn btn-warning"><span class="glyphicon glyphicon-shopping-cart"></span> Them</span></td>
                                    </tr>
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    -->
                    <div class="col-md-4">
                        <style>
                        .icon_sanphamtuongtu{
                            margin-left: 5px;
                        }
                        table#table_sanphamtuongtu tbody tr td{
                            border-bottom:1px solid #F4F4F4;
                        }
                        #hinhanh_sanphamtuongtu{
                            width: 35%;
                        }
                        #hinhanh_sanphamtuongtu a img{
                            
                        }
                        #gia_sanphamtuongtu{
                            font-size: 14px;
                            margin: 0 0 5px;
                            display: block;
                            color: #ee3124;
                            font-weight: 700;
                            font-family: Oswald,sans-serif;
                        }
                    </style>
                    <div id="sanpham_tuongtu">
                        <h3>Sản phẩm tương tự <span class="	glyphicon glyphicon-hand-down icon_sanphamtuongtu"></span></h3>
                        <div id="thongtin_sanphamtuongtu">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <table id="table_sanphamtuongtu" width="100%">
                                        <tbody>
                                        <?php
                                            
                                        ?>
                                            <?php
                                                foreach($sp_tuongtu as $row){
                                                    $img_tt = $row['hinhanh'];
                                                    $img_tts = null;
                                                    if(empty($img_tt)){
                                                        $img_tts = 'image_null.png';
                                                    }
                                                    else{
                                                        $img_tts = explode(',',$img_tt);
                                                        //$img = $arr_img[0];
                                                    }
                                                
                                            ?>
                                            <tr>
                                                <td id="hinhanh_sanphamtuongtu">
                                                    <a href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>">
                                                        <img src="<?php echo base_url();?>public/sanpham/thumb/thumb-<?php echo $img_tts[0]?>" width="100%" />
                                                    </a>
                                                </td>
                                                <td style="padding-left: 5px;">
                                                    <a href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>" style="text-decoration: none;"><p><?php echo $row['tensanpham']?></p></a>
                                                    <span class="call-price">&nbsp;</span>
                                                    <span id="gia_sanphamtuongtu"><?php echo number_format($row['gia']) ?>d</span>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                            
                                            <tr>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- end sanphamtuongtu-->
                    </div>
                </div>
</div>
<style>
    .margin_padding{
        margin: 0px;
        padding: 0px;
    }
    div#duongdan_link{
        margin-top: 12px;
        margin-bottom: 50px;
    }
    div.title_dangki{
        background-color: #2ecc71;
    }
    div.title_dangki span{
        font-size: 21px;
        font-weight: bold;
        padding: 12px 20px;
        color: #ffffff;
        font-family: serif;
    }
    div#page_content{
        background: #fff none repeat scroll 0 0;
        margin-bottom: 10px;
        padding: 20px 20px 30px;
    }
    div#page_content div{
        margin-bottom: 5px;
    }
    div.text_input input{
        background: #f7f7f7 none repeat scroll 0 0;
        font-size: 14px;
        width: 100%;
        border: 1px solid #e6e6e6;
        height: 40px;
        padding: 5px 10px;
        transition: background 0.3s ease 0s;
    }
    div.text_input select{
        background: #f7f7f7 none repeat scroll 0 0;
        font-size: 14px;
        width: 100%;
        border: 1px solid #e6e6e6;
        height: 40px;
        padding: 5px 10px;
        transition: background 0.3s ease 0s;
    }
    span.err_input{
        color: #F30E0E;
        font-style: italic;
        font-size: 14px;
        font-family: serif;
    }
</style>