<div class="container">
    <div class="row">
        <div class="col-md-12" id="duongdan_link">
            Đường dẫn file
        </div>
    </div>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-lg-10 col-md-10 col-sm-10">
            <strong style="color: #ee3124;">Kết quả tìm kiếm với từ khóa: </strong>
            <strong>→
                <?php echo $key?></strong>
        </div>
    </div>
    <style>
    #duongdan_link{
        margin-bottom: 10px;
        margin-top: 10px;
        line-height: 21px;
        display: inline-block;
    }
        .product-image {
        background: #fff url("/Images/v2014/loading-pico.gif") no-repeat scroll center center;
        display: block;
        overflow: hidden;
        padding: 10px;
        height: 164px;
    }
    .sanpham{
        background: #ffffff;
    }
    .image_sp{
        transition: all 0.3s ease 0s;
        width: 100%;
    }
    .product-info {
        background: #fff none repeat scroll 0 0;
        overflow: hidden;
        padding: 0 10px 5px;
        text-align: center;
    }
    .product-info h6 {
        color: #1f2228;
        height: 40px;
        margin: 10px 0 5px;
    }
    .product-info h6 a{
        font-size: 14px;
        text-decoration: none;
        transition: color 0.1s ease 0s, background 0.2s ease 0s;
    }
    span.call-price {
        font-size: 12px;
        font-weight: 400;
        margin-top: 0;
    }
    .priceInfo{
        text-align: center;
    }
    .priceInfo h6{
        text-align: center;
    }
    span.price {
        color: #ee3124;
        display: block;
        font-family: Oswald,sans-serif;
        font-size: 14px;
        font-weight: 700;
        margin-right: 6px;
    }
    .show_control{
        padding: 10px;
        text-align: center;
    }
	.custom_add_class_scroll{
		position:fixed;
		top:60px;
	}
	.remove_custom_add_class_scroll{
		position:static;
		/*top:60px;*/
	}
    </style>
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
        $('.image_sp').hover(
			function(){
				$(this).animate({width:"164px"},80);
			},
			function(){
				$(this).animate({width:"100%"},80);
			});
			
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
		
		$(document).scroll(function(){
			//$('.custom_search_select').scrollTop()
			var custom_scroll = $(this).scrollTop();
			if(custom_scroll > 200){
				$('.custom_search_select').addClass('custom_add_class_scroll');
				//$('.custom_search_select').css('top','50');
			}
			else{
				$('.custom_search_select').removeClass('custom_add_class_scroll');
			}
		});
    });
</script>
    <style>
        .custom_btn_select{
            width: 100%;
        }
        .custom_select_show>ul{
            padding: 0;
            list-style: none;
            border: 1px solid #D8D8D6;
            border-radius: 4px;
            margin-top: 5px;
            
            padding-bottom: 5px;
            color: #333;
            line-height: 1.5;
            box-shadow: 5px 5px 5px #CCDED0;
        }
        .custom_select_show>ul>li{
            text-align: left;
            padding-left: 20px;
            padding-top: 5px;
        }
        .custom_select_show>ul>li>a{
            text-decoration: none;
        }
        .custom_select_show>ul>li:hover{
            background-color: #F3F3F3;
        }
    </style>
    <section class="row">
        <div class="col-md-3">
        	<div class="custom_search_select">
            	<div class="panel panel-info">
                    <div class="panel-body">
                    	<button type="button" class="btn btn-default custom_btn_select" data-toggle="collapse" data-target="#demo" >
                          Lựa chọn kiểu sắp xếp
                        </button>

                        <div id="demo" class="collapse custom_select_show">
                            <ul>
                                <li><a href="<?php echo base_url();?>search/search_param/<?php echo $key?>/view">Được xem nhiều nhất</a></li>
                                <li><a href="<?php echo base_url();?>search/search_param/<?php echo $key?>/update">Đăng mới nhất</a></li>
                                <li><a href="<?php echo base_url();?>search/search_param/<?php echo $key?>/priceup">Giá tăng dần</a></li>
                                <li><a href="<?php echo base_url();?>search/search_param/<?php echo $key?>/pricedown">Giá giảm dần</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-md-9">
            <div class="sanpham">
                <div class="row">
                    <?php
                    if($sanpham == false){
                                        echo '<div style="height: 298px;"><h3>SORRY</h3><p>Không tìm thấy sản phẩm trùng với từ khóa ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($sanpham as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                        
                    ?>
                    <div class="col-md-3">
                        <div class="box-sanpham">
                            <div>
                                            <a title="<?php echo $row['tensanpham']?>" href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>">
                                                <div class="product-image">
                                                    <img alt="<?php echo $row['tensanpham']?>" src="<?php echo base_url();?>public/sanpham/<?php echo $img?>" class="image_sp" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6>
                                                <a href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>"><?php echo $row['tensanpham']?></a>
                                            </h6>
                                            <div class="priceInfo">
                                                <span class="call-price"> </span>
                                                <span class="price">
                                                    <strong><?php echo $row['gia']?>₫</strong>
                                                </span>
                                            </div>
                                            
                                        </div>
                                        <div class="show_control">
                                            <!-- <a class="btn btn-default"><img src="<?php echo base_url();?>public/images/icon/add.png" /> Chi tiết</a>   -->
                                            <a class="btn btn-default btn_giohang" href="<?php echo base_url();?>giohang/add_cart/<?php echo $row['id']?>"><input type="hidden" class="input_id" value="<?php echo $row['id']?>"/><img src="<?php echo base_url();?>public/images/icon/cart.png" /> Giỏ hàng</a>
                                        </div>
                        </div>
                    </div>
                    <?php
                        }
                        }
                    ?>
                </div>        
            </div>
        </div>
        
    </section>
    <div class="row pagination_pages">
            <div class="col-md-9">
                
            </div>
            <div class="">
                <?php
                    echo $pagination_pages;
                ?>
            </div>
    </div>     
</div>