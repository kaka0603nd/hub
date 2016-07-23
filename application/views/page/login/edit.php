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
                        
                        
                        <li class="forms"><a href="#" title="" class="exp inactive"><span>Thông tin cá nhân</span></a>
                            
                        </li>
                        <li class="ui"><a href="ui_elements.html" title="" class="active"><span>Sửa thông tin</span></a></li>
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
        <style>
            .page_content{
                background: #fff none repeat scroll 0 0;
                margin-bottom: 10px;
                padding: 20px 20px 30px;
            }
            
            
        </style>
        <style>
    
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
        margin-bottom: 5px;
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
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h2 style="padding: 5px 0 !important" class="title-block">Quản lý tài khoản</h2>
                    <p>
                        Xin chào,
                    <span style="font-weight:bold;" id=""></span>
                    </p>
                    <br />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                                <div class="col-md-12">
                                    <?php
                                            if(isset($check)){
                                                if(!$check['math_name']){
                                                    ?>
                                                    <div class="nNote nWarning hideit">
                                                        <p><strong>WARNING: </strong><?php echo 'Têm đăng nhập đã được dùng rồi hãy thử tên khác'?></p>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            if(isset($check)){
                                                if(!$check['math_email']){
                                                    ?>
                                                    <div class="nNote nWarning hideit">
                                                        <p><strong>WARNING: </strong><?php echo 'Email đã được dùng rồi hãy thử email khác'?></p>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                </div>
                                
                            </div>
                            <style>
                                .nWarning {
                                    background: #ffe9ad url(<?php echo base_url();?>public/images/icon/error.png) no-repeat 15px center;
                                    border: 1px solid #eac572;
                                    color: #826200;
                                }
                                .nNote {
                                    cursor: pointer;
                                    margin: 32px 0px 0px 0px;
                                    box-shadow: inset 0 0 1px #fff;
                                    -webkit-box-shadow: inset 0 0 1px #fff;
                                    -moz-box-shadow: inset 0 0 1px #fff;
                                }
                                .nNote p {
                                    font-size: 11px;
                                    padding: 10px 25px 10px 54px;
                                    margin: 0px;
                                    color: #565656;
                                }
                                .nNote strong {
                                    margin-right: 5px;
                                }
                                .nFailure {
                                    background: #fccac1 url(<?php echo base_url();?>public/images/icon/exclamation.png) no-repeat 15px center;
                                    border: 1px solid #e18b7c;
                                    color: #AC260F;
                                }
                            </style>
                            <script>
                                $(document).ready(function(e){
                                   $('.hideit').click(function(){
                                        $(this).slideUp("slow");
                                   });
                                });
                            </script>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-12">
                    
                    <div class="page_content">
                    <form action="<?php echo base_url();?>dangki/action_edit" method="post">
                    
                    <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Thông tin đăng đăng nhập</strong></p>
                                </div>
                            </div>
                        <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                <p>Tên đăng nhập</p>
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
                                <p>Email đăng nhập</p>
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
                                        <?php
                                            if(isset($insert['gioitinh'])){
                                                if($insert['gioitinh'] ==1){
                                                    ?>
                                                    <option value="1" selected="">Nam</option>
                                                    <option value="2">Nữ</option>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <option value="1">Nam</option>
                                                    <option value="2" selected="">Nữ</option>
                                                    <?php
                                                }
                                            }
                                        ?>
                                            
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
                                <?php 
                                $ngay = $thang = $nam = '';
                                if(isset($insert['ngaysinh'])){
                                    $abc = explode('/',$insert['ngaysinh']);
                                    $ngay = $abc[0];
                                    $thang = $abc[1];
                                    $nam = $abc[2];
                                }
                                else{
                                    echo '';
                                }
                                ?>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="text_input">
                                                <input type="text" placeholder="Ngày" name="date" class="date" value="<?php echo $ngay?>"/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text_input">
                                                <select name="month" class="month">
                                                    <?php
                                                        for($i =1;$i<=12;$i++){
                                                            if($thang == $i){
                                                                ?>
                                                                <option value="<?php echo $i?>" selected=""><?php echo $i?></option>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                <option value="<?php echo $i?>"><?php echo $i?></option>
                                                                <?php
                                                            }
                                                    
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
                                                            if($nam == $i){
                                                                ?>
                                                                <option value="<?php echo $i?>" selected=""><?php echo $i?></option>
                                                                <?php
                                                            }
                                                            else{
                                                                ?>
                                                                    <option value="<?php echo $i?>"><?php echo $i?></option>
                                                                <?php
                                                            }
                                                    
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
                                    <input type="submit" class="btn btn-success btnsub " name="btnsub" value="Cập nhập"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>