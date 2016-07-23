<script src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
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
    
    <section class="row" style="margin-top: 24px;">
        <div class="col-md-12">
            <h2 class="title-block"><?php echo 'NGƯỜI DÙNG PHẢN HỒI '?></h2>
            <div class="panel panel-default">
              <div class="panel-heading">Thông tin phản hồi</div>
              <div class="panel-body">
                <form action="<?php echo base_url();?>phanhoi/action_phanhoi" method="post">
                    <table class="table table-hover">
                        <tr>
                            <td>Email</td>
                            <td><input class="form-control" type="text" name="email" value="<?php echo $this->session->has_userdata('email')?$this->session->userdata('email'):''?>"/></td>
                        </tr>
                        <tr>
                            <td><span>Thông tin phản hồi</span></td>
                            <td>
                            <textarea style="width: 100%;" id="editor1" name="noidung" placeholder="Nhập vào nội dung ..."></textarea>
                            <script>
                     
                               CKEDITOR.replace( 'editor1' );
                     
                           </script> 
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button name="btnphanhoi" type="submit" class="btn btn-default">Gửi phản hồi</button></td>
                        </tr>
                    </table>
                </form>
              </div>
            </div>
        </div>
        <?php
            
        ?>
        
    </section>
         
</div>