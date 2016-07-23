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
        /*if(!$sanpham){
            echo '<section class="row" style="margin-top: 24px;">
                    <div class="col-md-8"><div style="height: 298px;" class=""><h3>SORRY</h3><p>Không tìm thấy gian hàng nào như thế ...</p></div></div>';
        } 
        else{
           */ 
        
    ?>
    <!--<div class="row" style="margin-bottom: 10px">
        <div class="col-lg-10 col-md-10 col-sm-10">
            <strong style="color: #ee3124;">Chào mừng tới với gian hàng của : </strong>
            <strong>
                <?php //echo $sanpham[0]['name']?></strong>
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
        <div class="col-md-8">
            <h2 class="title-block">GIAN HÀNG<?php //echo $sanpham[0]['name_store']?></h2>
            <div class="sanpham">
                <div class="row">
                        <?php
                        if(count($store) ==0){
                                            echo '<div class="col-md-12"><div style="height: 298px;"><h3>SORRY</h3><p>Đang cập nhập gian hàng danh mục này...</p></div></div>';
                                        }
                                        else{
                                           
                                        
                        
                        ?>
                        <style>
                            .company_name{
                                font-size: 14px;
                                font-weight: bold;
                                margin-bottom: 5px;
                                color: #003399;
                            }
                            .diachi{
                                line-height: 18px;
                                font-size: 12px;
                            }
                            .so_sanpham{
                                color: #999999;
                                font-size: 12px;
                            }
                            .tb_luotxem{
                                width: 250px;
                                margin-top: 5px;
                                font-size: 12px;
                            }
                        </style>
                        <div class="col-md-12">
                            <div class="box-sanpham">
                                <table class="table table-condensed">
                                <thead>
                                  <tr>
                                    <th style="width: 5%;">STT</th>
                                    <th style="width: 15%;">Logo</th>
                                    <th style="width: 80%;" colspan="3">Thông tin gian hàng</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                    foreach($store as $row){
                                        $img = $row['hinhanh'];
                                        if(empty($img)){
                                            $img = 'image_null.png';
                                        }
                                        else{
                                            $arr_img = explode(',',$img);
                                            $img = $arr_img[0];
                                        }
                                ?>
                                  <tr>
                                    <td>1</td>
                                    <td>
                                        <a href="<?php echo base_url();?>store/my_store/<?php echo $row['id']?>"><img src="<?php echo base_url();?>public/images/store/3.png" width="100%"/></a>
                                    </td>
                                    <td colspan="2">
                                        <div class="company_name">
                                            <a rel="nofollow" href="<?php echo base_url();?>store/my_store/<?php echo $row['id']?>" class="name"> <?php echo $row['name_store']?></a>
                                        </div>
                                        <div class="diachi"><?php echo $row['diachi']?><b> <?php echo $row['tinhthanh']?></b>
                                        </div>
                                        <div class="so_sanpham">Có <b class="count">~<?php echo $row['sosanpham']?></b> sản phẩm trong <b>gian hàng</b>
                                        </div>
                                        <div class="tb_luotxem">
                                            <strong>580</strong> lượt truy cập / ngày
                                        </div>
                                    </td>
                                    <td>
                                        <span class="phone"></span>
                                        <div class="website">
                                            <a rel="nofollow" target="_blank" href="<?php echo $row['website']?>" class="text_link_2">www.<?php echo $row['website']?></a>
                                        </div>
                                    </td>
                                  </tr>
                                  <?php
                                    }
                                    
                                  ?>
                                  
                                </tbody>
                              </table>
                            </div>
                        </div>    
                        <?php
                            }
                        ?>         
                </div>        
            </div>
        </div>
        <div class="col-md-4">
            <h2 class="title-block">Gian hàng được xem nhiều</h2>
            <div class="sanpham">
                <div class="row">
                </div>
            </div>
        </div>
    </section>
    <div class="row pagination_pages">
            <div class="col-md-9">
                
            </div>
            <div class="">
                <?php
                    //echo $pagination_pages;
                ?>
            </div>
        </div>     
</div>