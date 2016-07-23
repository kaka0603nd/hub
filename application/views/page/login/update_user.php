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
<div class="container">
    <div class="row">
        <div class="col-md-12" id="duongdan_link">
            Đường dẫn file
        </div>
    </div>
</div>
<style>
    .navs {
        border-top: 1px solid #1c252b;
    }
    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .navs li {
    position: relative;
    display: list-item;
    text-align: -webkit-match-parent;
}
.navs li a {
    display: block;
    background: url(<?php echo base_url();?>public/images/icon/navItemBg.png) repeat-x 0 0;
    border-bottom: 1px solid #1c252b;
    border-top: 1px solid #404950;
    text-decoration: none;
    }
    .navs li.dash a span {
    background-image: url(<?php echo base_url();?>public/images/icon/home.png);
}
.navs li a span {
    padding: 10px 0 12px 42px;
    display: block;
    font-size: 10px;
    text-transform: uppercase;
    font-weight: bold;
    color: #efefef;
    background-position: 12px 13px;
    background-repeat: no-repeat;
}
.navs li a.active, .navs li a:active {
    background-position: 0 -86px;
    border-top: 1px solid #657d92;
    
}
.navs li a:hover {
    background-position: 0 -43px;
    border-top: 1px solid #516271;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel">
                
                <div class="panel-body">
                    <ul id="menu" class="navs">
                        
                        
                        <li class="forms"><a href="#" title="" class="exp inactive active"><span>Thông tin cá nhân</span></a>
                            
                        </li>
                        <li class="ui"><a href="ui_elements.html" title="" class=""><span>Sửa thông tin</span></a></li>
                        <li class="tables"><a href="tables.html" title="" class="exp inactive"><span>Sản phẩm của tôi</span></a>
                            
                        </li>
                        <li class="user"><a href="#" title="" class="exp inactive"><span>Thông báo</span></a>
                            
                        </li>
                        
                            
                        </li>
                    </ul>
                </div>
              </div>
        </div>
        <style>
            .title-block {
                border-bottom: 1px solid #dcdcdc;
                margin-bottom: 10px;
                padding: 5px 15px;
                font-family: "Roboto Condensed",sans-serif;
                font-size: 21px;
                font-weight: 500;
                line-height: 29px;
                margin: 0;
                padding: 15px 0;
                text-transform: uppercase;
            }
        </style>
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2 style="padding: 5px 0 !important" class="title-block">Quản lý tài khoản</h2>
                    <p>
                        Xin chào,
                    <span style="font-weight:bold;" id="Home_ContentPlaceHolder_UACMaster_ControlPlaceHolder_lb_CustomerFullname">ba the</span>
                    </p>
                    <p>Trong mục quản lý tài khoản, bạn có thể xem các hoạt động gần đây của bạn cũng như quản lý thông tin tài khoản. Chọn một link bên dưới để xem hay chỉnh sửa thông tin.</p>
                </div>
            </div>
            <script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.min.js"></script>
                                <script src="<?php echo base_url();?>public/js/jquery.form.js"></script>
                                <script type="text/javascript">
                                    $(document).ready(function(){
                                        var upload_ok = true;
                                        $('.delete_control').click(function(e){
                                           if(!upload_ok){
                                            $('.child-img-ac').css('background-image','url(<?php echo base_url();?>public/images/icon/user_photo-512.png)');
                                            upload_ok = true;
                                            $(this).hide();
                                           } 
                                        });
										$('.input_img').live('change', function(){
										  //var imagespath = $('.hinhanh_sp').val();
				                            if(!upload_ok){
				                                return false;
				                            }
											$("#preview").html('');
											$("#preview").html('<img src="<?php echo base_url();?>public/images/icon/loader5.gif" alt="Uploading...."/>');
											$("#imageform").ajaxForm({
													success: function(result) {
													   if(result == "Error"){
													       $("#show").html(result+" : KIỂM TRA LẠI ĐIỀU KIỆN UPLOAD ẢNH BÊN DƯỚI");
                                                           $("#preview").html('');
													   }
    									               else{
    									                   $('.delete_control').show();
									                       $("#preview").html('');
                                                           upload_ok = false;
                                                           /*if(imagespath == ""){
                                                            $('.hinhanh_sp').val(result);
                                                           }
                                                           else{
                                                            $('.hinhanh_sp').val(imagespath+','+result);
                                                           }
                                                           */
                                                           //$('.upload_hienthi').attr("src","<?php echo base_url().'public/images/user/thumb/thumb-'?>"+result);
                                                           $('.child-img-ac').css('background-image','url(<?php echo base_url().'public/images/user/thumb/thumb-'?>'+result+')');
    									               }
                                                        
													  },
											}).submit();
										});
								}); 
                                </script>      
                                   <style>
                                    .input_img{
                                        width: 38px;
                                        height: 100px;
                                        padding: 50px;
                                        opacity: 1;
                                        border: 1px solid #fffaaa;
                                        border-radius: 2px;
                                        position: absolute;
                                        top: 0;
                                        opacity: 0;
                                        cursor: pointer;
                                    }
                                    .box-img-ac{
                                        position: relative;
                                    }
                                    .child-img-ac{
                                        width: 50px;
                                        height: 100px;
                                        padding: 50px;
                                        opacity: 1;
                                        border: 1px solid #fffaaa;
                                        border-radius: 2px;
                                        background-image: url(<?php echo base_url();?>public/images/icon/user_photo-512.png);
                                        background-repeat: no-repeat;
                                        background-size: 62%;
                                        background-position: center;
                                        box-shadow: 5px 5px 5px #E0E0E0;
                                    }
                                    span.delete_control {
                                        padding-left: 5px;
                                        padding-right: 5px;
                                        padding-top: 5px;
                                        padding-bottom: 5px;
                                        border: 1px solid #959595;
                                        border-radius: 90px;
                                        cursor: pointer;
                                        position: absolute;
                                        top: -13px;
                                        left: -12px;
                                        display: none;
                                    }
                                   </style> 
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align: center;"><span class="glyphicon glyphicon-user"></span> <span>Thông tin liên hệ</span></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <ul>
                                        <li><span>Name : </span> <strong><?php echo $name?> </strong></li>
                                        <li><span>Email : </span> <strong><?php echo $email?> </strong></li>
                                        <li><span>Ngày sinh : </span> <strong><?php echo $ngaysinh?> </strong></li>
                                        <li><span>Giới tính : </span> <strong><?php echo $gioitinh==1?'Nam':'Nữ';?> </strong></li>
                                        
                                        <li><span>Họ và tên : </span> <strong><?php echo $fullho.' '.$fullname?> </strong></li>
                                        <li><span>Yourpage : </span> <strong><?php echo $yourpage?> </strong></li>
                                        <li><span>Ảnh : </span><strong><?php echo $name?> </strong></li>
                                    </ul>
                                    <a href="<?php echo base_url();?>dangki/edit/">Chỉnh sửa</a>
                                </div>
                                <div class="col-md-6">
                                <form id="imageform" action="<?php echo base_url();?>dangki/upload_img" method="post" enctype="multipart/form-data">
                                    <p>Cập nhập ảnh đại diện</p>
                                    <div class="box-img-ac">
                                        <div class="child-img-ac">
                                            
                                        </div>
                                        <input type="file" width="50px" height="50px" class="input_img" name="input_img"/>
                                        <span class="delete_control control-box-upload delete_control1">
                                            <input type="hidden" class="input_upload1" name="hinhanh[]" /><img src="<?php echo base_url();?>public/images/icon/close.png"/>
                                        </span>
                                    </div>
                                    <br />
                                    
                                    <div id="preview">
                                        
                                    </div>
                                    <div id="show">
                                        
                                    </div>
                                    <img class="upload_hienthi"/>
                                </form>
                                </div>
                            </div>
                            
                        </div>
                      </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="	glyphicon glyphicon-phone"></span> <span>Các sản phẩm đã đăng</span></div>
                        <div class="panel-body"><a href="">Vào danh mục sản phẩm</a></div>
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading"><span class="glyphicon glyphicon-info-sign"></span> Thông báo</div>
                        <div class="panel-body">Panel Content</div>
                      </div>
                </div>
                <!--<div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Panel Heading</div>
                        <div class="panel-body">Panel Content</div>
                      </div>
                </div>
                -->
            </div>
        </div>
    </div>
</div>