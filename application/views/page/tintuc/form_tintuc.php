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
</div>
    <?php
        /*if(!$sanpham){
            echo '<section class="row" style="margin-top: 24px;">
                    <div class="col-md-8"><div style="height: 298px;" class=""><h3>SORRY</h3><p>Không tìm thấy gian hàng nào như thế ...</p></div></div>';
        } 
        else{
           */ 
        
    ?>
    
    <style>
    #duongdan_link{
        margin-bottom: 20px;
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
    </style>
    <style>
                    ul#call-news {
                        padding-left: 0px;
                        margin-top: 14px;
                        list-style: none;
                    }
                    ul#call-news>li {
                        float: left;
                        padding: 7px 10px 0px 7px;
                        /*width: 1000px !important;*/
                        margin-bottom: 18px;
                        border-bottom: 1px dashed #c0c0c0;
                        width: 100%;
                    }
                    figure {
                        margin: 0px;
                        padding: 0px;
                    }
                    a.tintuc_url{
                        text-decoration: none;
                        color: #287aa1;
                    }
                    img.tintuc_hinhanh{
                        float: left;
                        margin-right: 14px;
                        width: 150px;
                        padding: 3px;
                        border: 1px solid #eeeeee;
                    }
                    .tintuc_fig{
                        float: left;
                        /*width: 73%;*/
                    }
                    .tintuc_fig>h4>a{
                        font-weight: bold;
                    }
                    p.time{
                        color: #666666;
                        line-height: 18px;
                        margin-top: 8px;
                        margin-bottom: 20px;
                    }
                    p.tintuc_nd{
                        color: #666666;
                        line-height: 18px;
                        margin-top: 8px;
                        margin-bottom: 20px;
                    }
                    .more>a{
                        color: #f60;
                    }
                </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                
                <ul id="call-news">
                <?php
                    foreach($get_data as $row){
                ?>
                        <li>
                            <figure>
                                <a href="<?php echo base_url();?>tin-tuc-<?php echo $row['id']?>.html">
                                    <img src="<?php echo base_url();?>public/images/tintuc/<?php echo $row['hinhanh']?>" class="tintuc_hinhanh" />
                                </a>   
                                <figcaption class="tintuc_fig">
                                    <h4><a href="<?php echo base_url();?>tin-tuc-<?php echo $row['id']?>.html" class="tintuc_url"><?php echo $row['tieude']?> ...</a></h4>
                					<p class="time"><i>
                					Đăng vào	<?php echo $row['ngaydang']?> 					</i></p>
                                    <p class="tintuc_nd"><?php echo $row['tieude']?> ...</p>
                                    <p class="more"><a class="more" href="<?php echo base_url();?>tin-tuc-<?php echo $row['id']?>.html">Chi tiết</a></p>
                                </figcaption>
                            </figure>
                        </li>
                        <?php
                        }
                        ?>
                        
                </ul>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">Panel Heading</div>
                  <div class="panel-body">Panel Content</div>
                </div>
            </div>
        </div>
    </div>