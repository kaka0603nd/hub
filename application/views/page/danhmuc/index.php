<style>
    .title-block {
        font-size: 21px;
        line-height: 29px;
        text-transform: uppercase;
        padding: 15px 0;
        font-family: 'Roboto Condensed',sans-serif;
        font-weight: bold;
        margin: 0;
        border-bottom: 1px solid #dcdcdc;
        padding: 5px 15px;
        margin-bottom: 10px;
    }
    .box-sanpham{
        border: 1px solid #959595;
        border-radius: 2px;
        margin-bottom: 18px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="duongdan_link">
            Đường dẫn file
        </div>
    </div>
    <?php
    
        
        
    ?>
    <!--<div class="row" style="margin-bottom: 10px">
        <div class="col-lg-10 col-md-10 col-sm-10">
            <strong style="color: #ee3124;">Chào mừng tới với gian hàng của : </strong>
            <strong>
                <?php echo $sanpham[0]['name']?></strong>
        </div>
    </div>
    -->
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
        /*height: 164px;*/
        height: 185px;
    }
    .sanpham{
        background: #ffffff;
    }
    .image_sp{
        transition: all 0.3s ease 0s;
        width: 73%;
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
				$(this).animate({width:"86%"},80);
			},
			function(){
				$(this).animate({width:"73%"},80);
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
    });
</script>
    <section class="row" style="margin-top: 24px;">
        <div class="col-md-12">
            <h2 class="title-block"><?php echo 'DANH MỤC SẢN PHẨM '?></h2>
            <div class="sanpham">
                <div class="row">
                        <?php
                        if(!$sanpham){
                                            echo '<div class="col-md-12" style="height: 298px;" ><h3>SORRY</h3><p>Đang cập nhập sản phẩm này vui lòng quay lại sau...</p></div></div>';
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
                                                        <center><img alt="<?php echo $row['tensanpham']?>" src="<?php echo base_url();?>public/sanpham/<?php echo $img?>" class="image_sp" /></center>
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
        <?php
            
        ?>
        <!--<div class="col-md-4">
            <h2 class="title-block">Sản phẩm được xem nhiều</h2>
            <div class="sanpham">
                <div class="row">
                </div>
            </div>
        </div>
        -->
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