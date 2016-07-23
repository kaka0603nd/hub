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
    .insert_div{
        display: none;
    }
    .form-validate{
        box-sizing: border-box;
        /*text-align: center;*/
        font-family: serif;
        font-style: italic;
        font-size: 14px;
        color: #FF2828;
		border-radius: 4px;
		border: 1px dotted #EC3C5D;
		padding-left: 12px;
		padding-top: 5px;
		margin-bottom: 5px;
    }
</style>
<script>
    $(document).ready(function(e) {
        setTimeout(function(){
			$('.form-validate').slideUp("slow");
		},5000);		
    });
</script>
<script src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
<?php
    if(isset($full_err)){
        //var_dump($full_err);
    }
?>
<div class="container form_big" id="form_big">
    <div class="row">
        <div class="col-md-12" id="duongdan_link">
            Đường dẫn file
        </div>
        <div class="col-md-12">
            
                <?php
                    if(isset($full_err['validate'])){
                        if(!empty($full_err['validate'])){
                            // echo '<div class="form-validate">'.$full_err['validate'].'</div>';
                        }
                            
                    }
                ?>
                <?php
                    if(isset($danhmuc)){
                        if(!empty($danhmuc)){
                            // echo '<div class="form-validate">'.$danhmuc.'</div>';
                        }
                            
                    }
                ?>
            
        </div>
        <div id="div_boxbig">
            <section class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title_dangki">
                            <span>Đăng sản phẩm</span>
                        </div>
                        <div class="content" id="page_content" >
                            <form action="<?php echo base_url();?>dangsanpham/sub_dang" method="post" name="form_input">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Thông tin sản phẩm :</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tên sản phẩm :</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="text_input">
                                        <input class="form-control tensanpham" type="text" placeholder="Tên sản phẩm" name="tensanpham" value="<?php echo isset($insert['tensanpham'])?$insert['tensanpham']:'';?>" />
                                        <?php
                                            if(isset($full_err['tensanpham'])){
                                                if(!$full_err['tensanpham']){
                                                    ?>
                                                    <span class="err_input">* Vui lòng không để trống hoặc nhập kí tự đặc biệt ...</span>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tiêu đề bài viết :</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="text_input">
                                        <input class="form-control tieude" type="text" placeholder="Tiêu đề bài viết" name="tieude" value="<?php echo isset($insert['tieude'])?$insert['tieude']:'';?>"/>
                                        <?php
                                            if(isset($insert['tieude'])){
                                                if(!$insert['tieude']){
                                                    ?>
                                                    <span class="err_input">* Vui lòng nhập vào tiêu đề ...</span>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(e){
                                	$('.select_danhmuc').change(select_danhmuc);
									function select_danhmuc(){
										$.ajax({
                        				url:"<?php echo base_url();?>dangsanpham/load_thongtin",
                        				data:{
                        					id : $('.select_danhmuc').val()
                        					},
                        				type:"POST",
                        				dataType:"text",
                        				
                        				success: function(result){
                        				    $(".insert_div").hide("slow");
                        				    $(".insert_div").show("slow");
                        					$(".insert_div").html(result);
                        				},
                                        error:function (xhr, ajaxOptions, thrownError){
                                           //On error, we alert user
                                           alert(thrownError);
                                        }
                        				
                        			});
									}
                                });
                            </script>
                            
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Chuyên mục :</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="text_input">
                                        <select class="form-control select_danhmuc danhmuc" name="danhmuc">
                                            <option selected="selected" value="0">«Chọn danh mục»</option>
                                            <option id="cat2000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="2000"> -- Phương tiện -- </option>
                                            <option id="cat2020" value="101"> Xe máy </option>
                                            <option id="cat2010" value="102"> Ô tô </option>
                                            <option id="cat2060" value="103"> Xe đạp </option>
                                            <option id="cat2050" value="104"> Xe tải</option>
                                            <option id="cat2050" value="105"> Xe khác </option>
                                            <option id="cat2030" value="106"> Phụ tùng, Phụ kiện xe </option>
                                            <option id="cat1000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="1000"> -- Bất động sản -- </option>
                                            <option id="cat1010" value="201"> Căn hộ/Chung cư </option>
                                            <option id="cat1020" value="202"> Nhà ở </option>
                                            <option id="cat1040" value="203"> Đất </option>
                                            <option id="cat1030" value="204"> Văn phòng, Mặt bằng kinh doanh </option>
                                            
                                            <option id="cat5000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="5000"> -- Đồ điện tử -- </option>
                                            <option id="cat5010" value="301"> Điện thoại di động </option>
                                            <option id="cat5040" value="302"> Máy tính bảng </option>
                                            <option id="cat5030" value="303"> Máy tính, Laptop </option>
                                            <option id="cat5050" value="304"> Máy ảnh, Máy quay </option>
                                            <option id="cat5020" value="305"> Tivi, Loa, Amply, Máy nghe nhạc </option>
                                            <option id="cat5060" value="306"> Phụ kiện, Linh kiện </option>
                                            <option id="cat3000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="3000"> -- Thời trang, Đồ dùng cá nhân -- </option>
                                            <option id="cat3030" value="401"> Quần áo </option>
                                            <option id="cat3040" value="402"> Giày dép</option>
                                            <option id="cat3040" value="403"> Túi xách </option>
                                            <option id="cat3010" value="404"> Mẹ và bé, Phụ kiện </option>
                                            <option id="cat9000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="9000"> -- Nội ngoại thất, Đồ gia dụng -- </option>
                                            <option id="cat9030" value="501"> Tủ lạnh, Máy lạnh, Máy giặt </option>
                                            <option id="cat9040" value="502"> Nội ngoại thất, Cây cảnh </option>
                                            <option id="cat9050" value="503"> Đồ gia dụng gia đình khác </option>
                                            <option id="cat4000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="4000"> -- Giải trí, Thể thao, Sở thích -- </option>
                                            <option id="cat4030" value="601"> Vật nuôi, Thú cưng </option>
                                            <option id="cat4040" value="602"> Sách </option>
                                            <option id="cat4040" value="603"> Âm nhạc, Phim</option>
                                            <option id="cat4020" value="604"> Đồ thể thao, Dã ngoại </option>
                                            <option id="cat4010" value="605"> Sưu tầm, Game, Sở thích khác </option>
                                            <option id="cat8000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="8000"> -- Đồ dùng văn phòng, công nông nghiệp -- </option>
                                            <option id="cat8010" value="701"> Đồ dùng văn phòng </option>
                                            <option id="cat8030" value="702"> Đồ chuyên dụng, Giống nuôi trồng </option>
                                            
                                            <option id="cat7000" disabled="disabled" style="background-color:#dcdcc3;font-weight:bold;" value="7000"> -- Các loại khác -- </option>
                                            <option id="cat7010" value="801"> Các loại khác </option>
                                        </select>
                                    </div>
                                    <span class="err_input">
                                        <?php
                                            if(isset($full_err['danhmuc'])){
                                                if(!$full_err['danhmuc']){
                                                    ?>
                                                    <span class="err_input">* Vui lòng không để trống hoặc nhập kí tự đặc biệt ...</span>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        <?php
                                            //echo $danhmuc;
                                            if(isset($danhmuc)){
                                                if(!empty($danhmuc))
                                                    echo '<div class="form-validate">'.$danhmuc.'</div>';
                                            }
                                        ?>
                                    </span>
                                    
                                </div>
                                
                            </div>
                            <div class="insert_div">
                                
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tỉnh thành :</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="text_input ">
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
                                        <select id="SignUpVatGiaForm_city_id" class="form-control thanhpho" name="thanhpho">
                                            <?php
                                                foreach($select_tinhthanh as $key => $row){
                                                    if(!empty($key)){
                                                        echo '<option value="'.$key.'">'.$row.'</option>';
                                                    }
                                                    
                                                }
                                            ?>
                                        </select>
                                        
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Tình trạng :</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-5">
                                        	<select name="tinhtrang" class="tinhtrang form-control">
                                            	<option selected="selected" value="" disabled="disabled">«Chọn tình trạng»</option>
                                            	<option value="1" 
                                                <?php 
                                                if(isset($insert['tinhtrang']))
                                                    if($insert['tinhtrang'] ==1)
                                                        echo 'selected="selected"';
                                            	?>
                                                >Mới</option>
                                                <option value="2"
                                                <?php 
                                                if(isset($insert['tinhtrang']))
                                                    if($insert['tinhtrang'] ==2)
                                                        echo 'selected="selected"';
                                            	?>
                                                >Đã qua sử dụng</option>
                                            </select>
                                            
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="err_input">
                                            <?php
                                                        if(isset($full_err['tinhtrang'])){
                                                            if(!$full_err['tinhtrang']){
                                                                ?>
                                                                <span class="err_input">* Vui lòng chọn tình trạng sản phẩm ...</span>
                                                                <?php
                                                            }
                                                        }
                                            ?>
                                            </span>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                
                                
                            </div>
                            
                            <style>
                                input.img_sanpham{
                                    border: 1px solid #DAD8D8;
                                    cursor: pointer;
                                    font-size: 13px;
                                    box-shadow: 5px 5px 5px 0px #D6D4D4;
                                    height: 87px;
                                    margin: 0;
                                    width: 70px;
                                    background-image: url(<?php base_url();?>public/images/camera-outline.png);
                                    background-size: 69px;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                }
                                #hinhanh_upload{
                                    padding: 0px;
                                }
                                div#themanh_upload{
                                    width: 70px;
                                }
                                /*
                                div#box_upload{
                                    width: 740px;
                                    height: 238px;
                                    position: relative;
                                }
                                div#box_uploadjoin{
                                    width: 100%;
                                    position: absolute;
                                    top: 430px;
                                }
                                */
                                div.div_upload_img{
                                    background-color: #fff;
                            		border: 1px solid #cdcdcd;
                            		border-radius: 4px;
                            		color: white;
                            		display: inline-block;
                            		font-weight: bold;
                            		text-decoration: none;
                            		position:relative;
                                    height: 96px;
                                    width: 86px;
                                    background-image: url(<?php echo base_url()?>public/images/camera-outline.png);
                                    background-size: 69px;
                                    background-position: center;
                                    background-repeat: no-repeat;
                                    background-position-y: 2px;
                                    cursor: pointer;
                                    margin-right: 5px;
                                }
                                div.div_upload_img:hover{
                                    background-color:#efefef;
                                }
                                div.box-upload-image{
                                    display: inline-block;
                                    position: relative;
                                }
                                span.control-box-upload{
                                    position: absolute;
                                    top: 0px;
                                    top: -11px;
                                    left: -15px;
                                    z-index: 20;
                                    display: none;
                                }
                                span.delete_control {
                                    padding-left: 5px;
                                    padding-right: 5px;
                                    padding-top: 5px;
                                    padding-bottom: 5px;
                                    border: 1px solid #959595;
                                    border-radius: 90px;
                                    cursor: pointer;
                                }
                            </style>
                            <script>
                                $(document).ready(function(e) {
                                    
                                    $('.delete_control1').click(delete_image1);
                                    $('.delete_control2').click(delete_image2);
                                    $('.delete_control3').click(delete_image3);
                                    $('.delete_control4').click(delete_image4);
                                    $('.delete_control5').click(delete_image5);
                                    $('.delete_control6').click(delete_image6);
									
									
									$('.delete_control').click(function(){
									   
										$(this).children('input').val("");
									});
									
                                    $('.gia').click(function(){
										/*var text = '';
										text = $('.hinhanh').val();
										var arr = text.split(",");
										alert(arr[0]);
										*/
									});
									function delete_image1(){
										$('.img_upload1').css('background-image','');
                                        $(this).hide();
										// delete image
                                        /*
										text = $('.hinhanh').val();
                                        
										//after_text = "";
										var arr = text.split(",");
										var rong = "";
										after_text = arr.splice(0,1);
										$('.hinhanh').val(arr);
                                        */
                                        //$(this).children('input').val("");
										/*if(arr.length ==1){
											$('.hinhanh').val("");
											return;
										}
										for(var i=0;i< arr.length ;i++){
											if(i== arr.length-1){
												after_text += arr[i];
											}
											else{
												after_text += arr[i]+"|";
											}
										}
										*/
										
										
									}
                                    function delete_image2(){
										$('.img_upload2').css('background-image','');
                                        $(this).hide();
										
                                        /*
										// delete image
										text = $('.hinhanh').val();
										//after_text = "";
										var arr = text.split(",");
										
										after_text = arr.splice(1,1);
										$('.hinhanh').val(arr);
                                        */
									}
                                    function delete_image3(){
										$('.img_upload3').css('background-image','');
                                        $(this).hide();
                                        /*
										// delete image
										text = $('.hinhanh').val();
										//after_text = "";
										var arr = text.split(",");
										
										after_text = arr.splice(2,1);
										$('.hinhanh').val(arr);
                                        */
									}
                                    function delete_image4(){
										$('.img_upload4').css('background-image','');
                                        $(this).hide();
                                        /*
										// delete image
										text = $('.hinhanh').val();
										//after_text = "";
										var arr = text.split(",");
										
										after_text = arr.splice(3,1);
										$('.hinhanh').val(arr);
                                        */
									}
                                    function delete_image5(){
										$('.img_upload5').css('background-image','');
                                        $(this).hide();
                                        /*
										// delete image
										text = $('.hinhanh').val();
										//after_text = "";
										var arr = text.split(",");
										
										after_text = arr.splice(4,1);
										$('.hinhanh').val(arr);
                                        */
									}
                                    function delete_image6(){
										$('.img_upload6').css('background-image','');
                                        $(this).hide();
                                        /*
										// delete image
										text = $('.hinhanh').val();
										//after_text = "";
										var arr = text.split(",");
										
										after_text = arr.splice(5,1);
										$('.hinhanh').val(arr);
                                        */
									}
                                });
                                
                            </script>
                            <div class="row" id="upload_hinhanh">
                                <div id="box_upload">
                                    <div class="col-md-3">
                                        <p>Hình ảnh sản phẩm :</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="display: inline-block;" class="box-upload-image">
                                                    <span class="delete_control control-box-upload delete_control1">
                                                        <input type="hidden" class="input_upload1" name="hinhanh[]" /><img src="<?php echo base_url();?>public/images/icon/close.png"/>
                                                    </span>
                                                        <div class="div_upload_img img_upload1">
                                                            
                                                        </div>
                                                </div>
                                                <div style="display: inline-block;" class="box-upload-image">
                                                <span class="delete_control control-box-upload delete_control2"><input type="hidden" class="input_upload2" name="hinhanh[]"/><img src="<?php echo base_url();?>public/images/icon/close.png"/></span>
                                                    <div class="div_upload_img img_upload2">
                                                    
                                                    </div>
                                                </div>
                                                <div style="display: inline-block;" class="box-upload-image">
                                                <span class="delete_control control-box-upload delete_control3"><input type="hidden" class="input_upload3" name="hinhanh[]"/><img src="<?php echo base_url();?>public/images/icon/close.png"/></span>
                                                    <div class="div_upload_img img_upload3">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div style="display: inline-block;" class="box-upload-image">
                                                <span class="delete_control control-box-upload delete_control4"><input type="hidden" class="input_upload4" name="hinhanh[]"/><img src="<?php echo base_url();?>public/images/icon/close.png"/></span>
                                                    <div class="div_upload_img img_upload4" >
                                                    
                                                    </div>
                                                </div>
                                                <div style="display: inline-block;" class="box-upload-image">
                                                <span class="delete_control control-box-upload delete_control5"><input type="hidden" class="input_upload5" name="hinhanh[]"/><img src="<?php echo base_url();?>public/images/icon/close.png"/></span>
                                                    <div class="div_upload_img img_upload5">
                                                    
                                                    </div>
                                                </div>
                                                <div style="display: inline-block;" class="box-upload-image">
                                                <span class="delete_control control-box-upload delete_control6"><input type="hidden" class="input_upload6" name="hinhanh[]"/><img src="<?php echo base_url();?>public/images/icon/close.png"/></span>
                                                    <div class="div_upload_img img_upload6">
                                                    
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<input class="form-control hinhanh_sp hinhanh" type="hidden" placeholder="Name" name="hinhanh" value="<?php echo isset($insert['hinhanh'])?$insert['hinhanh']:''?>"/> -->
                                    <?php
                                            if(isset($full_err['hinhanh'])){
                                                if(!$full_err['hinhanh']){
                                                    ?>
                                                    <span class="err_input">* Vui lòng chọn 1 hình ảnh ...</span>
                                                    <?php
                                                }
                                            }
                                        ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Giá :</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="text_input">
                                        <input class="form-control gia" type="text" placeholder="Nhập vào giá" name="gia" value="<?php echo isset($insert['gia'])?$insert['gia']:'';?>"/>
                                        <span class="err_input">
                                        <?php
                                            if(isset($full_err['gia'])){
                                                if(!$full_err['gia']){
                                                    ?>
                                                    <span class="err_input">* Vui lòng không nhập chữ và không để trống giá ...</span>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Liên hệ :</p>
                                </div>
                                <div class="col-md-9">
                                    <div class="text_input">
                                        <input class="form-control lienhe" type="text" placeholder="Liên hệ" name="lienhe" value="<?php echo isset($insert['lienhe'])?$insert['lienhe']:'';?>"/>
                                        <span class="err_input">
                                            <?php
                                                if(isset($full_err['lienhe'])){
                                                    if(!$full_err['lienhe']){
                                                        ?>
                                                        <span class="err_input">* Vui lòng không để trống ...</span>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Cách thanh toán :</p>
                                </div>
                                <div class="col-md-5">
                                    <div class="text_input">
                                        <p>Người bán và người mua tự thoả thuận </p>
                                    </div>
                                </div>
                            </div>
                            <script>
								//$('.cke_editable').attr('id','noidung');
                                /*
                                $(document).ready(function(e){
                                   $('.textarea_lienhe').keydown(function(){
                                        alert('hello'+$(this).val());
                                        $('.noidung_sp').val($(this).html());
                                   });
                                });
                                */
                            </script>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Nội dung và miêu tả sản phẩm :</p>
                                </div>
                                <div class="col-md-9">
                                    <div class="text_input">
                                        <textarea style="width: 100%;" rows="10" class="textarea_lienhe noidung" name="noidung" id="editor1"><?php echo isset($insert['noidung'])?$insert['noidung']:'';?></textarea>
                                        <script>
                                 
                                           CKEDITOR.replace( 'editor1' );
                                 
                                       </script> 
                                        <span class="err_input">
                                            <?php
                                                if(isset($full_err['noidung'])){
                                                    if(!$full_err['noidung']){
                                                        ?>
                                                        <span class="err_input">* Vui lòng không để trống ...</span>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <script>
								
								
                            </script>
                            <script>
								$(document).ready(function(e) {
									/*
									if(document.form_input.vanchuyen.value.length<1){
										alert("Hello from 1");
									}
									*/
								});
								
							</script>
                            <div class="row">
                                <div class="col-md-3">
                                    <p>Quy trình vận chuyển & giao nhận: 0/2000 </p>
                                </div>
                                <div class="col-md-9">
                                    <div class="text_input">
                                        <textarea class="form-control vanchuyen" style="width: 100%;" rows="5" name="vanchuyen" id="vanchuyen" ><?php echo isset($insert['vanchuyen'])?$insert['vanchuyen']:'';?></textarea>
                                        <span class="err_input">
                                            <?php
                                                if(isset($full_err['vanchuyen'])){
                                                    if(!$full_err['vanchuyen']){
                                                        ?>
                                                        <span class="err_input">* Vui lòng không để trống ...</span>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <p>
                                    <strong>Thông tin</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    
                                </div>
                                <div class="col-md-9">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" class="form-control input_captcha" placeholder="Nhập captcha"/>
                                                    
                                                </td>
                                                <td>
                                                    <div class="insert_captcha">
                                            
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="btn btn-default btn_refresh">Refresh</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">
                                                    <span class="err_input err_captcha"></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <script type="text/javascript">
                                    $(document).ready(function(e) {
										
										function show_captcha(){
											$.ajax({
												url: "<?php echo base_url();?>dangsanpham/show_captcha",
												data: {
														} ,
												dataType:"text",
												type:"POST",
												success: function(data){
													$('.insert_captcha').html(data);
												}
											});
										}
                                        
										show_captcha();
										
										var test_captchas = false;
										
                                        function test_captcha(){
                                            var input_captcha = $('.input_captcha').val();
                                            $.ajax({
												url: "<?php echo base_url();?>dangsanpham/xacthuc_captcha",
												data: {
													input : input_captcha
														} ,
												dataType:"text",
												type:"POST",
												success: function(data){
													if(data == 'NOT'){
													   //alert('Captcha nhập không trùng khớp vui lòng kiểm tra lại');
                                                       test_captchas = false;
                                                       return false;
													}
                                                    else{
														test_captchas = true;
														return true;
                                                    }
												}
											});
                                        }
										
										
										
                                        // show captcha 
										$('.btn_refresh').click(show_captcha);
										$('.input_captcha').keyup(test_captcha);
                                        // click submit
										var test = true;
										$('.btn_dangsanpham').click(function(){
											//test_captchas = test_captcha();
											test = true;
											/*
											if(document.form_input.noidung.value.length<1){
												alert("Hello form");
											}
											return false;
											*/
											if($('.tensanpham').val() == ""){
												alert('Tên sản phẩm không được để trống');
												$('.tensanpham').focus();
												test = false;
												return test;
											}
											
											if(!check('tieude','Tiêu đề')){
												test = false;
												return test;
											}
											
											if(!check_select('danhmuc','Danh mục')){
												test = false;
												return test;
											}
											
											if(!check_select('tinhthanh','Tỉnh thành')){
												test = false;
												return test;
											}
											
											if(!check_select('tinhtrang','Tình trạng')){
												test = false;
												return test;
											}
											
											if(!check('hinhanh','Hình ảnh')){
												test = false;
												$('.div_upload_img').focus();
												return test;
											}
											
											if(!check('gia','Giá')){
												test = false;
												return test;
											}
											
											if(!check('lienhe','Liên hệ')){
												test = false;
												return test;
											}
											
											/*
											var abc = document.getElementById('vanchuyen').innerHTML;
											alert(abc);
											if(abc == ""){
												test = false;
												return test;
											}
											*/
											
											if(!test_captchas){
												$('.err_captcha').html('Captcha nhập không trùng khớp vui lòng kiểm tra lại');
												show_captcha();
												$('.input_captcha').val('');
												$('.input_captcha').focus();
												alert('Captcha nhập không trùng khớp vui lòng kiểm tra lại');
												return false;
											}
											
											
                                            
										});
										/*
                                        function check_tieude(){
											if($('.tieude').val() == ""){
												alert('Tiêu đề sản phẩm không được để trống');
												$('.tieude').focus();
												test = false;
												return false;
											}
										}
										*/
										
										function check(name,thongbao){
											if($('.'+name).val() == ""){
												alert(thongbao+' sản phẩm không được để trống ');
												$('.'+name).focus();
												test = false;
												return false;
											}
											return true;
										}
										
										function check_select(name,thongbao){
											if($('.'+name).val() == 0 || $('.'+name).val() == ""){
												alert('Vui lòng lựa chọn '+thongbao);
												$('.'+name).focus();
												test = false;
												return false;
											}
											return true;
										}
										
                                        // change input
                                        function test_editor(){
											var abc = document.getElementById('vanchuyen').innerHTML;
											alert(abc+" Hello");
										}
										
                                    });
									
                                </script>
                            </div>
                            <!-- 
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="button" class="btn btn-success btn_dangsanphams" value="ĐĂNG SẢN PHẨM"/>
                                </div>
                            </div>
                            -->
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn_dangsanpham" value="ĐĂNG SẢN PHẨM"/>
                                </div>
                            </div>
                            <div class="row">
                            </div>
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="row"></div>
                        </form>
                            <!--upload anh bang popup -->
                            
                    
                    
                </div>
            </div>
                
                
            </section>
         
         <div id="div_formjoin">
            
         </div>
        </div>
            <style>
                .sidebar_dangnhap{
                    background: #fff none repeat scroll 0 0;
                    margin-bottom: 10px;
                    padding: 20px 0px 30px;
                }
                .box_dangnhap{
                    background: #fff none repeat scroll 0 0;
                    padding: 8px 7px 30px;
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
            <aside class="sidebar right-sidebar col-lg-4 col-md-4 col-sm-4">
                <div class="row" id="box_sidebar">
                    <div class="col-md-12">
                        <div class="title_dangnhap">
                            <span>Login</span>
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
                                        <a class="btn btn-info"><span>ĐĂNG NHẬP NGAY</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
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
                <div class="row"></div>
            </aside>
        
    </div>
</div>
</div>
<div class="insert_style">
	
</div>
<style>
		.add_image_bg{
			background-image:url(<?php echo base_url();?>public/images/icon/a.jpg);
			background-color:#F00;
			
		}
    </style>
<script>
	$(document).ready(function(e) {
        $('.div_upload_img').click(hienthi_popup);
		$('.upload_ok').click(exit_popup);
		// load ajax khi click
		$('.upload_cance').click(exit_popup);
        $('.div_upload').click(exit_popup);
		function hienthi_popup(){
		  if($(this).css('background-image') != 'url("http://localhost:8080/Boxshop/public/images/camera-outline.png")'){
		      return;
		  }
          else{
            $('.upload_hienthi').attr("src","");
            $('.form_big').addClass('popup_bgr');
			$('.div_upload').slideDown("fast");
			$('.div_uploadchild').slideDown("slow");
          }
			
		}
		function exit_popup(){
			$('.div_upload').slideUp("slow");
			$('.div_uploadchild').slideUp("fast");
			$('.form_big').removeClass('popup_bgr');
		}
    });
</script>
<style>
	.form_big{
		/*height:5000px;*/
	}
	.div_upload{
		position:fixed;
		display:none;
		
		top: 0;
		left: 0;
		right: 0;
		opacity:0.5;
		height: 100%;
    	width: 100%;
		margin:0px auto;
		background-color:#F6F;
		
	}
	div.div_uploadchild{
		position:fixed;
		display:none;
		top: 129px;
		left: 8%;
		right: 8%;
		height: 420px;
    	width: 50%;
		margin:0px auto;
		background-color:#999;
	}
	.div_input input{
		border: 0 none;
		cursor: pointer;
		font-size: 13px;
		height: 107px;
		margin: 0;
		opacity: 0;
		right: 0;
		top: 0;
		width: 100px;
		z-index: 100;
		position:absolute;
	}
	.popup_bgr{
		background-color:#F9F9F9;
		opacity:0.5;
	}
	.div_input{
		background-color: #fff;
		border: 1px solid #cdcdcd;
		border-radius: 4px;
		color: white;
		display: inline-block;
		font-weight: bold;
		text-decoration: none;
		position:relative;
		width:108px;
	}
	.div_input:hover{
		background-color:#efefef;
	}
	.div_inputchild{
		position:relative;
		z-index:0;
	}
	
	.div_inputchild{
		background-color: transparent;
		background-repeat: no-repeat;
		color: #6d6d6d;
		height: 100%;
		margin: 0 auto;
		position: relative;
		text-align: center;
		width: 100%;
		background-position: center center;
		background-repeat: no-repeat;
		z-index:1;
	}
	.div_inputchild2{
		background: rgba(0, 0, 0, 0) url("<?php echo base_url()?>public/images/ai.png") no-repeat scroll -198px -2px;
    	height: 47px;
    	width: 57px;
		border-radius: 5px;
		height: 46px;
		margin: 20px auto 16px;
		position: relative;
	}
	#thongbao_upload{
        color: white;
        font-family: serif;
        font-size: 18px;
	}
    .upload_cance{
        position: absolute;
        top: 0;
        right: 0;
    }
</style>
<!-- upload hinh anh -->
    <style>
                                    .preview
                                    {
                                        width:200px;
                                        border:solid 1px #dedede;
                                        padding:10px;
                                    }
                                    #show, #preview
                                    {
                                        color:#cc0000;
                                        font-size:12px
                                    }
                                </style>
                                <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
                                <script src="<?php echo base_url();?>public/js/jquery.form.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        
										$('#img_sanpham').live('change', function(){
										  var imagespath = $('.hinhanh_sp').val();
				                            $("#show").html('');
											$("#preview").html('');
											$("#preview").html('<img src="<?php echo base_url();?>public/images/loader.gif" width="107px" height="18px" alt="Uploading...."/>');
											$("#imageform").ajaxForm({
													success: function(result) {
													   if(result == "Error"){
													       $("#show").html(result+" : KIỂM TRA LẠI ĐIỀU KIỆN UPLOAD ẢNH BÊN DƯỚI");
													   }
    									               else{
									                       $("#preview").html('');
                                                           if(imagespath == ""){
                                                            $('.hinhanh_sp').val(result);
                                                           }
                                                           else{
                                                            $('.hinhanh_sp').val(imagespath+','+result);
                                                           }
                                                           $('.upload_hienthi').attr("src","<?php echo base_url().'public/sanpham/thumb/thumb-'?>"+result);
                                                           //alert(result);
                                                           //$('.div_upload_img').attr('background-image',"url(<?php echo base_url().'public/sanpham/thumb/thumb-'?>"+result+")");
                                                           if($('.img_upload1').css('background-image') == 'url("http://localhost:8080/Boxshop/public/images/camera-outline.png")'){
                                                            $('.img_upload1').css('background-image','url(<?php echo base_url().'public/sanpham/thumb/thumb-'?>'+result+')');
                                                            $('.input_upload1').val(result);
                                                            $('.delete_control1').show();
                                                            return;
                                                           }
                                                           if($('.img_upload2').css('background-image') == 'url("http://localhost:8080/Boxshop/public/images/camera-outline.png")'){
                                                            $('.img_upload2').css('background-image','url(<?php echo base_url().'public/sanpham/thumb/thumb-'?>'+result+')');
                                                            $('.input_upload2').val(result);
                                                            $('.delete_control2').show();
                                                            return;
                                                           }
                                                           if($('.img_upload3').css('background-image') == 'url("http://localhost:8080/Boxshop/public/images/camera-outline.png")'){
                                                            $('.img_upload3').css('background-image','url(<?php echo base_url().'public/sanpham/thumb/thumb-'?>'+result+')');
                                                            $('.input_upload3').val(result);
                                                            $('.delete_control3').show();
                                                            return;
                                                           }
                                                           if($('.img_upload4').css('background-image') == 'url("http://localhost:8080/Boxshop/public/images/camera-outline.png")'){
                                                            $('.img_upload4').css('background-image','url(<?php echo base_url().'public/sanpham/thumb/thumb-'?>'+result+')');
                                                            $('.input_upload4').val(result);
                                                            $('.delete_control4').show();
                                                            return;
                                                           }
                                                           if($('.img_upload5').css('background-image') == 'url("http://localhost:8080/Boxshop/public/images/camera-outline.png")'){
                                                            $('.img_upload5').css('background-image','url(<?php echo base_url().'public/sanpham/thumb/thumb-'?>'+result+')');
                                                            $('.input_upload5').val(result);
                                                            $('.delete_control5').show();
                                                            return;
                                                           }
                                                           if($('.img_upload6').css('background-image') == 'url("http://localhost:8080/Boxshop/public/images/camera-outline.png")'){
                                                            $('.img_upload6').css('background-image','url(<?php echo base_url().'public/sanpham/thumb/thumb-'?>'+result+')');
                                                            $('.input_upload6').val(result);
                                                            $('.delete_control6').show();
                                                            return;
                                                           }
														   //alert($('.img_upload1').css('background-image'));
														   //$('.insert_style').html("xin chao");
														   //$('.div_upload_img').addClass('add_image_bg');
    									               }
														//alert('hello');
														//$('#show').html(result);
                                                        
													  },
											}).submit();
										});
								}); 
                                </script>                            
    <div class="div_upload">
    	
    	
    </div>
    <div class="container">
        <div class="div_uploadchild">
            <div class="panel panel-default">
                <div class="panel-heading">Đăng hình ảnh sản phẩm</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="row">
                                <div class="div_input">
                                    <form id="imageform" action="<?php echo base_url();?>Dangsanpham/upload_img" method="post" enctype="multipart/form-data">
                                        <input type="file" name="img_sanpham" id="img_sanpham" class="img_sanpham" />
                                    </form>
                                    <div class="div_inputchild">
                                        <div class="div_inputchild2">
                                        </div>
                                        <p>Đăng hình</p>
                                    </div>
                                </div>
                            </div>                           
                            <div class="row">
                                <div id="preview"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <style>
                            .upload_control{
                                padding-left: 9px;
                                padding-right: 9px;
                                padding-top: 6px;
                                padding-bottom: 6px;
                                border: 1px solid #959595;
                                border-radius: 90px;
                            }
                        </style>
                        <div class="col-md-8">
                            <div class="row" >
                                <img src="" width="150px" height="100px" class="upload_hienthi" />
                            </div>
                            <div class="row">
                                <a href="#" class="btn"><span class="upload_insert upload_control"><img src="<?php echo base_url();?>public/images/icon/uploaded.png"/></span></a>
                                <a href="#" class="btn"><span class="upload_del upload_control"><img src="<?php echo base_url();?>public/images/icon/deleteFile.png"/></span></a>
                            </div>
                            
                        </div>
                    </div>
                    
                    
                    
                    <div class="col-md-12">
                        <div id="show">
                            
                        </div>
                    </div>
                </div>
                
                <div class="btn upload_cance"><span class=""><img src="<?php echo base_url();?>public/images/icon/veri1.png"/></span></div>
            </div>
            
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-10">
                        <div id="thongbao_upload">
                            <ul>
                                <li>Chỉ đăng ảnh có định dạng png hoặc jpg</li>
                                <li>Kích thước ảnh dưới 2Mb</li>
                                <li>Ảnh có chiều cao không quá 768 và rộng không quá 1024</li>
                            </ul>
                        </div>
                        
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                    <div class="col-md-4">
                        
                    </div>
                </div>
            </div>
        	
            
            
        </div>
    </div>
    