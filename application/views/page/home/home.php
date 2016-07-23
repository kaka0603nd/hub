<style>
    .custom-pan-head{
        /*background-image: url(<?php echo base_url();?>public/images/icon/filter_tab_bg.jpg);
        background-position: 5px 6px;
        */
        background: rgba(0, 0, 0, 0) url("<?php echo base_url();?>public/images/icon/filter_tab_bg.jpg") repeat-x scroll 0 0;
        border-color: #dedcdc #dedcdc #ff5067;
        border-image: none;
        border-style: solid;
        border-width: 1px 1px 2px;
        color: #ff5067;
        font: 400 16px/43px HelveticaBold;
        height: 36px;
        margin: 0;
        padding: 0 12px;
        text-transform: uppercase;
        font-weight: bold;
        
    }
    .custom-pan-head span{
        color: #ff5067;
    }
    .custom-nav{
        background: #fff url("<?php echo base_url();?>public/images/icon/filter_tab_select.jpg") repeat-x scroll 0 0;
        height: 42px;
    }
    .panel-body {
        padding: 0;
    }
    /*.custom_li{
        background: #fff url("<?php echo base_url();?>public/images/icon/filter_tab_select.jpg") repeat-x scroll 0 0;
        height: 42px;
    }
    */
    
    .product-image {
        background: #fff url("/Images/v2014/loading-pico.gif") no-repeat scroll center center;
        display: block;
        overflow: hidden;
        padding: 10px;
        height: 164px;
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
    .panel{
        margin-top: 20px;
        margin-bottom: 20px;
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
    });
</script>
<?php
    //var_dump($dienthoai); 
?>
<div class="show_giohang">
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>CÔNG NGHỆ - ĐIỆN TỬ</span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav" style="min-width: 550px;">
                        <li class="active custom_li"><a data-toggle="tab" href="#home">Điện thoại</a></li>
                        <li><a data-toggle="tab" href="#menu1">Máy tính bảng</a></li>
                        <li><a data-toggle="tab" href="#menu2">Máy tính</a></li>
                        <li><a data-toggle="tab" href="#menu3">Máy ảnh</a></li>
                        <li><a data-toggle="tab" href="#menu4">Ti vi</a></li>
                        <li><a data-toggle="tab" href="#menu5">Phụ kiện</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($dienthoai == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($dienthoai as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu1" class="tab-pane fade" >
                            <div class="row">
                                <?php
                                    if($maytinhbang == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($maytinhbang as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu2" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($maytinh == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($maytinh as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu3" class="tab-pane fade">
                          <div class="row">
                            <?php
                                    if($mayanh == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($mayanh as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2" >
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu4" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($tivi == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($tivi as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
                                        <div>
                                            <a title="<?php echo $row['tensanpham']?>" href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>">
                                                <div class="product-image">
                                                    <img alt="<?php echo $row['tensanpham']?>" src="<?php echo base_url();?>public/sanpham/<?php echo $img?>" class="image_sp" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6>
                                                <a href="#"><?php echo $row['tensanpham']?></a>
                                            </h6>
                                            <div class="priceInfo">
                                                <span class="call-price"> </span>
                                                <span class="price">
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu5" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($phukien_dientu == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($phukien_dientu as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
                                        <div>
                                            <a title="<?php echo $row['tensanpham']?>" href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>">
                                                <div class="product-image">
                                                    <img alt="<?php echo $row['tensanpham']?>" src="<?php echo base_url();?>public/sanpham/<?php echo $img?>" class="image_sp" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="product-info">
                                            <h6>
                                                <a href="#"><?php echo $row['tensanpham']?></a>
                                            </h6>
                                            <div class="priceInfo">
                                                <span class="call-price"> </span>
                                                <span class="price">
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    
    <!-- phuong tien -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>PHƯƠNG TIỆN - XE</span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav">
                        <li class="active custom_li"><a data-toggle="tab" href="#menu6">Xe máy</a></li>
                        <li><a data-toggle="tab" href="#menu7">Ô tô</a></li>
                        <li><a data-toggle="tab" href="#menu8">Xe đạp</a></li>
                        <li><a data-toggle="tab" href="#menu9">Xe tải</a></li>
                        <li><a data-toggle="tab" href="#menu10">Xe khác</a></li>
                        <li><a data-toggle="tab" href="#menu11">Phụ tùng Xe</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="menu6" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($xemay == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($xemay as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu7" class="tab-pane fade" >
                            <div class="row">
                                <?php
                                    if($oto == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($oto as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu8" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($xedap == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($xedap as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu9" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($xetai == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($xetai as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu10" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($xekhac == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($xekhac as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu11" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($phutungxe == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($phutungxe as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end noi that dien lanh -->
    
    <!-- noi that dien lanh -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>ĐỒ GIA DỤNG - NỘI THẤT</span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav">
                        <li class="active custom_li"><a data-toggle="tab" href="#menu12">Điện lạnh</a></li>
                        <li><a data-toggle="tab" href="#menu13">Nội thất</a></li>
                        <li><a data-toggle="tab" href="#menu14">Đồ gia dụng</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="menu12" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($dienlanh == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($dienlanh as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu13" class="tab-pane fade" >
                            <div class="row">
                                <?php
                                    if($noithat == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($noithat as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu14" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($dogiadung == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($dogiadung as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end noi that dien lanh -->
    
    <!-- thoi trang -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>THỜI TRANG</span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav">
                        <li class="active custom_li"><a data-toggle="tab" href="#menu15">Quần áo</a></li>
                        <li><a data-toggle="tab" href="#menu16">Giày dép</a></li>
                        <li><a data-toggle="tab" href="#menu17">Túi xách</a></li>
                        <li><a data-toggle="tab" href="#menu18">Mẹ bé</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="menu15" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($quanao == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($quanao as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu16" class="tab-pane fade" >
                            <div class="row">
                                <?php
                                    if($giaydep == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($giaydep as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu17" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($tuixach == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($tuixach as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
                                        <div>
                                            <a title="<?php echo $row['tensanpham']?>" href="<?php echo base_url();?>home/sanpham/<?php ?>">
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu18" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($mebe == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($mebe as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end noi that dien lanh -->
    
    <!-- bat dong san -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>BẤT ĐỘNG SẢN - NHÀ ĐẤT</span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav">
                        <li class="active custom_li"><a data-toggle="tab" href="#menu19">Căn hộ</a></li>
                        <li><a data-toggle="tab" href="#menu20">Nhà ở</a></li>
                        <li><a data-toggle="tab" href="#menu21">Đất</a></li>
                        <li><a data-toggle="tab" href="#menu22">Mặt bằng</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="menu19" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($canho == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($canho as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu20" class="tab-pane fade" >
                            <div class="row">
                                <?php
                                    if($nhao == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($nhao as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu21" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($dat == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($dat as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu22" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($matbang == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($matbang as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end noi that dien lanh -->
    
    <!-- noi that dien lanh -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>GIẢI TRÍ - SỞ THÍCH - VẬT NUÔI </span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav">
                        <li class="active custom_li"><a data-toggle="tab" href="#menu23">Vật nuôi</a></li>
                        <li><a data-toggle="tab" href="#menu24">Sách - tạp chí</a></li>
                        <li><a data-toggle="tab" href="#menu25">Thể thao</a></li>
                        <li><a data-toggle="tab" href="#menu26">Sưu tầm</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="menu23" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($vatnuoi == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($vatnuoi as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu24" class="tab-pane fade" >
                            <div class="row">
                                <?php
                                    if($sach == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($sach as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu25" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($thethao == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($thethao as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu26" class="tab-pane fade">
                            <div class="row">
                                <?php
                                    if($suutam == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($suutam as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end noi that dien lanh -->
    
    <!-- noi that dien lanh -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>ĐỒ DÙNG</span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav">
                        <li class="active custom_li"><a data-toggle="tab" href="#menu27">Đồ dùng văn phòng</a></li>
                        <li><a data-toggle="tab" href="#menu28">Đồ chuyên dụng</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="menu27" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($dodungvanphong == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($dodungvanphong as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                        <div id="menu28" class="tab-pane fade" >
                            <div class="row">
                                <?php
                                    if($dodungchuyendung == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                    foreach($dodungchuyendung as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end noi that dien lanh -->
    
    <!-- noi that dien lanh -->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading custom-pan-head"><span>SẢN PHẨM KHÁC</span></div>
              <div class="panel-body">
                    <ul class="nav nav-tabs custom-nav">
                        <li class="active custom_li"><a data-toggle="tab" href="#menu29">Sản phẩm khác</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="menu29" class="tab-pane fade in active">
                            <div class="row">
                                <?php
                                    if($cacloaikhac == false){
                                        echo '<div class="col-md-12" style="height: 298px;"><h3>SORRY</h3><p>Đang chờ cập nhập vui lòng chuyển qua gian hàng khác ...</p></div>';
                                    }
                                    else{
                                       
                                    foreach($cacloaikhac as $row){
                                    $img = $row['hinhanh'];
                                    if(empty($img)){
                                        $img = 'image_null.png';
                                    }
                                    else{
                                        $arr_img = explode(',',$img);
                                        $img = $arr_img[0];
                                    }
                                ?>
                                <div class="col-md-2">
                                    <div>
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
                                                    <strong><?php echo number_format($row['gia']) ?>₫</strong>
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
                </div>
            </div>
        </div>
    </div>
    <!-- end noi that dien lanh -->
</div>
