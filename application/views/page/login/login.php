<script type="text/javascript" src="<?php echo base_url();?>public/js/login.js"></script>
<script>
	$(document).ready(function(e) {
        $('.form-validate').click(function(){
			$(this).slideUp("slow");
		});
        //$('.err_input').addClass('form-validate');
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
		border-radius: 4px;
		border: 1px dotted #EC3C5D;
		padding-left: 12px;
		padding-top: 5px;
		margin-bottom: 5px;
        line-height: 20px;
        cursor: pointer;
    }
</style>
<!-- body giohang -->
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
        /*display: none;*/
    }
    span.err_gioitinh{
        color: #F30E0E;
        font-style: italic;
        font-size: 14px;
        font-family: serif;
    }
</style>
<script>
    
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="duongdan_link">
            Đường dẫn file
        </div>
        <?php
        if(isset($err_full))
            //echo var_dump($err_full);
        ?>
        <form action="<?php echo base_url();?>Dangki/dangki" method="post">
            <section class="col-md-8">
                
                <div class="row">
                    <div class="col-md-12">
                        
                            <?php
                                if(isset($check['math_name']))
                                    if(!$check['math_name']){
                                        //echo '<div class="form-validate"><span><img src="'.base_url().'public/images/icon/close.png"/></span></div>';
                                        echo '<div class="form-validate"><div class="row"><div class="col-md-11">Tên đăng nhập đã tồn tại vui lòng đăng kí dưới 1 tên khác </div><div> <span class="col-md-1"><img src="'.base_url().'public/images/icon/close.png"/></span> </div> </div></div>';
                                    }
                                if(isset($check['math_email']))
                                    if(!$check['math_email']){
                                        echo '<div class="form-validate"><div class="row"><div class="col-md-11">Email đã tồn tại vui lòng đăng kí dưới 1 email khác</div><div> <span class="col-md-1"><img src="'.base_url().'public/images/icon/close.png"/></span> </div> </div></div>';
                                    }
                            ?>
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="title_dangki">
                            <span>Đăng ký thành viên</span>
                        </div>
                        <div class="content" id="page_content">
                        <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <center>THÔNG TIN ĐĂNG KÍ</center>
                                        
                                    </div>
                                    <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Thông tin đăng kí</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="text_input">
                                        <input type="text" placeholder="Name" name="name" class="name" value="<?php echo isset($insert['name'])?$insert['name']:'';?>"/>
                                        <span class="err_input err_name">
                                        <?php
                                            if(isset($check['name'])){
                                                if(!$check['name']){
                                                    echo '* Vui lòng không để trống hoặc nhập kí tự đặc biệt ...';
                                                }
                                            }
                                        ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="text_input">
                                        <input type="text" placeholder="Địa chỉ e-mail" name="email" class="email" value="<?php echo isset($insert['email'])?$insert['email']:'';?>"/>
                                        <span class="err_input err_email">
                                            <?php
                                            if(isset($check['email'])){
                                                if(!$check['email']){
                                                    echo '* Vui lòng nhập đúng định dạng email ...';
                                                }
                                            }
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="text_input">
                                            <input type="text" placeholder="Pass word" name="password" class="password"/>
                                            <span class="err_input err_password">
                                                <?php
                                                if(isset($check['password'])){
                                                    if(!$check['password']){
                                                        echo '* Password phải lớn hơn 6 kí tự ...';
                                                    }
                                                }
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text_input">
                                            <input type="text" placeholder="Nhập lại pass word" name="password_again" class="passwordagain"/>
                                            <span class="err_input err_passwordagain">
                                                <?php
                                                if(isset($check['password_again'])){
                                                    if(!$check['password_again']){
                                                        echo '* Nhập password không trùng khớp ...';
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
                                    <strong>Thông tin cá nhân</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>Họ tên</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="row">
                                        
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="text_input">
                                                <input type="text" placeholder="Họ" name="fullname" class="fullname" value="<?php echo isset($insert['fullname'])?$insert['fullname']:'';?>"/>
                                                <span class="err_input err_fullname">
                                                    <?php
                                                    if(isset($check['fullname'])){
                                                        if(!$check['fullname']){
                                                            echo '* Không được để trống trường này ...';
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                            <div class="text_input">
                                                <input type="text" placeholder="Tên" name="fullho" class="fullho" value="<?php echo isset($insert['fullho'])?$insert['fullho']:'';?>"/>
                                                <span class="err_input err_fullho">
                                                    <?php
                                                    if(isset($check['fullho'])){
                                                        if(!$check['fullho']){
                                                            echo '* Không được để trống trường này ...';
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                $(document).ready(function(e){
                                   $('.select_gioitinh').change(function(){
                                        $('.gioitinh').val($('.select_gioitinh').val());
                                   }) 
                                });
                            </script>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>Giới tính</span>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <div class="text_input">
                                        <select class="select_gioitinh" name="gioitinh">
                                            <option value="1">Nam</option>
                                            <option value="2">Nữ</option>
                                        </select>
                                        
                                        <span class="err_gioitinh">
                                            <?php
                                                    if(isset($check['gioitinh'])){
                                                        if(!$check['gioitinh']){
                                                            echo '* Chọn giới tính của bạn ...';
                                                        }
                                                    }
                                                    ?>
                                        </span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <span>Ngày sinh:</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text_input">
                                                <input type="text" placeholder="Ngày" name="date" class="date" value="<?php 
                                                                                                                        if(isset($insert['ngaysinh'])){
                                                                                                                            $abc = explode('/',$insert['ngaysinh']);
                                                                                                                            echo $abc[2];
                                                                                                                        }
                                                                                                                        else{
                                                                                                                            echo '';
                                                                                                                        }
                                                                                                                        ?>"/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text_input">
                                                <select name="month" class="month">
                                                    <?php
                                                        for($i =1;$i<=12;$i++){
                                                            
                                                        
                                                    ?>
                                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text_input">
                                                <select name="year" class="year">
                                                    <?php
                                                        for($i =date('Y');$i>=1980;$i--){
                                                    ?>
                                                        <option value="<?php echo $i?>"><?php echo $i?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="err_input err_date">
                                                <?php
                                                $ngaysinh_report = true;
                                                    if(isset($check['year'])){
                                                        if(!$check['year']){
                                                            $ngaysinh_report = false;
                                                            
                                                        }
                                                    }
                                                    if(isset($check['month'])){
                                                        if(!$check['month']){
                                                            $ngaysinh_report = false;
                                                            //echo '* Lỗi khi nhập ngày sinh ...';
                                                        }
                                                    }
                                                    if(isset($check['date'])){
                                                        if(!$check['date']){
                                                            $ngaysinh_report = false;
                                                            //echo '* Lỗi khi nhập ngày sinh ...';
                                                        }
                                                    }
                                                    if(!$ngaysinh_report){
                                                        echo '* Lỗi khi nhập ngày sinh ...';
                                                    }
                                                    ?>
                                            </span>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group">
                                    <span>Trang ca nhan(vd: facebook, tiwer... nên có)</span>
                                </div>
                                <div class="col-md-8 form-group">
                                    <input type="text" class="form-control" name="yourpage" value="<?php echo isset($insert['yourpage'])?$insert['yourpage']:'';?>"/>
                                    <span class="err_input"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btnsub disabled" name="btnsub" value="Đăng kí"/>
                                </div>
                            </div>
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="row"></div>
                            <div class="row"></div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </section>
            </form>
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