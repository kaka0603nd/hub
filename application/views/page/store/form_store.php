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
		border-radius: 2px;
		border: 1px dotted #EC3C5D;
		padding-left: 12px;
		padding-top: 5px;
		margin-bottom: 5px;
        line-height: 20px;
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="duongdan_link">
            Đường dẫn file
        </div>
        <form action="<?php echo base_url();?>store/dangki" method="post" enctype="multipart/form-data">
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="title_dangki">
                            <span>Đăng ký gian hàng</span>
                        </div>
                        <div class="content" id="page_content">
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
                                    <div class="col-md-6 ">
                                        <div class="text_input">
                                            <input type="text" placeholder="Password" name="password">
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
                                    <div class="col-md-6">
                                        <div class="text_input">
                                            <input type="text" placeholder="Password again" name="password_again"/>
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
                            <!--
                            <div class="row">
                                <div class="col-md-2">
                                    <span>Logo gian hàng : </span>
                                </div>
                                <div class="col-md-10">
                                    <div class="text_input">
                                        <input type="file" placeholder="logo" name="hinhanh"/>
                                        <span class="err_input">* Loi nay</span>
                                    </div>
                                </div>
                            </div>
                            -->
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
                            <!-- 
                            <div class="row">
                                <div class="col-md-4">
                                    <span>Số giấy phép ĐKKD/QĐ thành lập</span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="text_input">
                                        <input type="text" placeholder="Pass word" name=""/>
                                        <span class="err_input">* Loi nay</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <span>Ngày cấp:</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text_input">
                                        <input type="text" placeholder="Pass word" name=""/>
                                        <span class="err_input">* Loi nay</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <span>Nơi cấp:</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text_input">
                                        <input type="text" placeholder="Pass word" name=""/>
                                        <span class="err_input">* Loi nay</span>
                                    </div>
                                </div>
                            </div>
                            -->
                            <!--
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <span>Địa chỉ kho hàng : </span>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10">
                                    <div class="text_input">
                                        <input type="text" placeholder="Pass word" name=""/>
                                        <span class="err_input">* Loi nay</span>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2">
                                    <span>Nơi cấp:</span>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="text_input">
                                        <input type="text" placeholder="Pass word" name=""/>
                                        <span class="err_input">* Loi nay</span>
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="row">
                                <div class="col-md-2 form-group">
                                    <span>Nhập đúng : </span>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input type="text" class="form-control"/>
                                    <span class="err_input">* Loi nay</span>
                                </div>
                                <div class="col-md-2">
                                    <span>Capchar</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="ĐĂNG KÍ" name="btnsub"/>
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