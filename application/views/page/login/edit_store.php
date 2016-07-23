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
                    <form action="<?php echo base_url();?>dangki/action_edit" method="post">
                    <div class="page_content">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <center>THÔNG TIN GIAN HÀNG</center>
                                        
                            </div>
                            <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <p><strong>Thông tin đăng nhập</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="text_input">
                                        <input type="text" placeholder="Name" name="name" value="<?php echo isset($insert['name'])?$insert['name']:'';?>"/>
                                        <span class="err_input">
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
                                <div class="col-lg-12 col-md-12 col-sm-12">
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
                                    <strong>Thông tin gian hàng</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>Tên gian hàng : </span>
                                </div>
                                <div class="col-md-10">
                                    <div class="text_input">
                                        <input type="text" placeholder="tên gian hàng" name="name_store" value="<?php echo isset($insert['name_store'])?$insert['name_store']:'';?>"/>
                                        <span class="err_input">
                                                    <?php
                                                    if(isset($check['name_store'])){
                                                        if(!$check['name_store']){
                                                            echo '* Không được để trống trường này ...';
                                                        }
                                                    }
                                                    ?>
                                                </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-2">
                                    <span>Địa chỉ gian hàng : </span>
                                </div>
                                <div class="col-md-10">
                                    <div class="text_input">
                                        <input type="text" placeholder="nhập địa chỉ gian hàng" name="diachi" value="<?php echo isset($insert['diachi'])?$insert['diachi']:'';?>"/>
                                        <?php
                                                    if(isset($check['diachi'])){
                                                        if(!$check['diachi']){
                                                            echo '* Không được để trống trường này ...';
                                                        }
                                                    }
                                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>Số chứng minh người đăng kí : </span>
                                </div>
                                <div class="col-md-10">
                                    <div class="text_input">
                                        <input type="text" placeholder="nhập chứng minh thư người đăng kí gian hàng" name="sochungminh" value="<?php echo isset($insert['sochungminh'])?$insert['sochungminh']:'';?>"/>
                                        <span class="err_input">
                                        <?php
                                                    if(isset($check['sochungminh'])){
                                                        if(!$check['sochungminh']){
                                                            echo '* Không được để trống trường này ...';
                                                        }
                                                    }
                                                    ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-md-2">
                                    <span>Tỉnh : </span>
                                </div>
                                <div class="col-md-4">
                                    <div class="text_input">
                                        <select id="SignUpVatGiaForm_city_id" class="span12 id-city" name="tinhthanh">
                                            <option value="ha_noi">Hà Nội</option>
                                            <option value="tp_ho_chi_minh">TP. Hồ Chí Minh</option>
                                            <option value="hai_phong">Hải Phòng</option>
                                            <option value="da_nang">Đà Nẵng</option>
                                            <option value="can_tho">Cần Thơ</option>
                                            <option value="an_giang">An Giang</option>
                                            <option value="bac_giang">Bắc Giang</option>
                                            <option value="bac_kan">Bắc Kạn</option>
                                            <option value="bac_lieu">Bạc Liêu</option>
                                            <option value="bac_ninh">Bắc Ninh</option>
                                            <option value="ba_ria_vung_tau">Bà Rịa - Vũng Tàu</option>
                                            <option value="ben_tre">Bến Tre</option>
                                            <option value="binh_dinh">Bình Định</option>
                                            <option value="binh_duong">Bình Dương</option>
                                            <option value="binh_phuoc">Bình Phước</option>
                                            <option value="binh_thuan">Bình Thuận</option>
                                            <option value="cao_bang">Cao Bằng</option>
                                            <option value="ca_mau">Cà Mau</option>
                                            <option value="dak_lak">Đắk Lắk</option>
                                            <option value="dak_nong">Đắk Nông</option>
                                            <option value="dien_bien">Điện Biên</option>
                                            <option value="dong_nai">Đồng Nai</option>
                                            <option value="dong_thap">Đồng Tháp</option>
                                            <option value="gia_lai">Gia Lai</option>
                                            <option value="hai_duong">Hải Dương</option>
                                            <option value="hau_giang">Hậu Giang</option>
                                            <option value="ha_giang">Hà Giang</option>
                                            <option value="ha_nam">Hà Nam</option>
                                            <option value="ha_tinh">Hà Tĩnh</option>
                                            <option value="hoa_binh">Hòa Bình</option>
                                            <option value="hung_yen">Hưng Yên</option>
                                            <option value="khanh_hoa">Khánh Hòa</option>
                                            <option value="kien_giang">Kiên Giang</option>
                                            <option value="kon_tum">Kon Tum</option>
                                            <option value="lai_chau">Lai Châu</option>
                                            <option value="lam_dong">Lâm Đồng</option>
                                            <option value="lang_son">Lạng Sơn</option>
                                            <option value="lao_cai">Lào Cai</option>
                                            <option value="long_an">Long An</option>
                                            <option value="nam_dinh">Nam Định</option>
                                            <option value="nghe_an">Nghệ An</option>
                                            <option value="ninh_binh">Ninh Bình</option>
                                            <option value="ninh_thuan">Ninh Thuận</option>
                                            <option value="phu_tho">Phú Thọ</option>
                                            <option value="phu_yen">Phú Yên</option>
                                            <option value="quang_binh">Quảng Bình</option>
                                            <option value="quang_nam">Quảng Nam</option>
                                            <option value="quang_ngai">Quảng Ngãi</option>
                                            <option value="quang_ninh">Quảng Ninh</option>
                                            <option value="quang_tri">Quảng Trị</option>
                                            <option value="soc_trang">Sóc Trăng</option>
                                            <option value="son_la">Sơn La</option>
                                            <option value="tay_ninh">Tây Ninh</option>
                                            <option value="thai_binh">Thái Bình</option>
                                            <option value="thai_nguyen">Thái Nguyên</option>
                                            <option value="thanh_hoa">Thanh Hóa</option>
                                            <option value="thua_thien_hue">Thừa Thiên - Huế</option>
                                            <option value="tien_giang">Tiền Giang</option>
                                            <option value="tra_vinh">Trà Vinh</option>
                                            <option value="tuyen_quang">Tuyên Quang</option>
                                            <option value="vinh_long">Vĩnh Long</option>
                                            <option value="vinh_phuc">Vĩnh Phúc</option>
                                            <option value="yen_bai">Yên Bái</option>
                                        </select>
                                        <span class="err_input"></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <span>Số điện thoại công ty : </span>
                                </div>
                                <div class="col-md-4">
                                    <div class="text_input">
                                        <input type="text" placeholder="Số điện thoại" name="sodienthoai" value="<?php echo isset($insert['sodienthoai'])?$insert['sodienthoai']:'';?>"/>
                                        <span class="err_input">
                                            <?php
                                                    if(isset($check['sodienthoai'])){
                                                        if(!$check['sodienthoai']){
                                                            echo '* Chỉ được phép nhập số và không được để trống ...';
                                                        }
                                                    }
                                                    ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <span>WebSite công ty : </span>
                                </div>
                                <div class="col-md-10">
                                    <div class="text_input">
                                        <input type="text" placeholder="nhập địa chỉ website" name="website" value="<?php echo isset($insert['website'])?$insert['website']:'';?>"/>
                                        <?php
                                                    /*if(isset($check['website'])){
                                                        if(!$check['website']){
                                                            echo '* Không được để trống trường này ...';
                                                        }
                                                    }
                                                    */
                                                    ?>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="CẬP NHẬP" name="btnsub"/>
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
                </form>    
                </div>
            </div>
        </div>
    </div>
</div>