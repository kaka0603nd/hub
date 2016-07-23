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
            <section class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title_dangki">
                            <span>Đăng nhập tài khoản</span>
                        </div>
                        <div class="content" id="page_content">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php
                                            if(isset($check)){
                                                if(!empty($check)){
                                                    ?>
                                                    <div class="nNote nWarning hideit">
                                                        <p><strong>WARNING: </strong><?php echo $check?></p>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            if(isset($login)){
                                                if(!empty($login)){
                                                    ?>
                                                    <div class="nNote nFailure hideit">
                                                        <p><strong>FAILURE: </strong><?php echo $login?></p>
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
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <center>THÔNG TIN ĐĂNG NHẬP</center>
                                        
                                    </div>
                                    <div class="panel-body">
                                        <form  action="<?php echo base_url();?>Dangnhap/loguser" method="post">
                                        <div class="form-group row">
                                          <label class="control-label col-sm-2" for="email" style="color: #9A9BA2;font-size: 13px;">Email / Name:</label>
                                          <div class="col-sm-6">
                                            <input type="text" class="form-control" id="name" placeholder="Enter email" name="name"/>
                                          </div>
                                        </div>
                                        <div class="form-group row">
                                          <label class="control-label col-sm-2" for="pwd" style="color: #9A9BA2;font-size: 13px;">Password:</label>
                                          <div class="col-sm-6">          
                                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="passwd"/>
                                          </div>
                                        </div>
                                        <div class="form-group row">        
                                          <div class="col-sm-offset-2 col-sm-12">
                                            <div class="checkbox">
                                              <label><input type="checkbox" name="remember" value="check"/> Remember me</label>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group row">        
                                          <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-default" name="btnsub" value="Đăng nhập"/>
                                          </div>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
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
                                    <span>Nếu bạn chưa có tài khoản</span>
                                </div>
                            </div>
                            <div>
                                <div class="col-md-12 box_dangnhap">
                                    <div class="box_dangnhap">
                                        <a class="btn btn-info" href="#" title="Đăng ký" data-toggle="modal" data-target=".bs-example-modal-sm"><span>ĐĂNG KÍ NGAY</span></a>
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