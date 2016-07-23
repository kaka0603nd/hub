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
                    .fig_a_tintuc{
                        float: left;
                    }
                    a.tintuc_url{
                        text-decoration: none;
                        color: #287aa1;
                    }
                    img.tintuc_hinhanh{
                        float: left;
                        margin-right: 14px;
                        width: 132px;
                        
                        padding: 3px;
                        border: 1px solid #eeeeee;
                        height: 132px;
                    }
                    .tintuc_fig{
                        /*float: left;*/
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
    <section class="row" style="margin-top: 24px;">
        <div class="col-md-8">
            <h2 class="title-block"><?php echo 'TIN NỔI BẬT '?></h2>
            <div class="sanpham">
                <div class="row">
                    <div class="col-md-12">
                        <ul id="call-news">
                        <?php
                            foreach($get_data as $row){
                        ?>
                                <li>
                                    <figure>
                                        <a href="<?php echo base_url();?>tin-tuc-<?php echo $row['id']?>.html" class="fig_a_tintuc">
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
                           
                </div>        
            </div>
            
            <div class="row pagination_pages" >
                <div class="col-md-8">
                    
                </div>
                <div class="col-md-4">
                    <?php
                        echo $pagination_pages;
                    ?>
                </div>
            </div> 
            <style>
                .custom-paginations{
                    line-height: 1.5;
                }
            </style> 
        </div>
        <div class="col-md-4">
            <h2 class="title-block"><?php echo 'TIN XEM NHIỀU '?></h2>
            <div class="sanpham">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Panel Heading</div>
                            <div class="panel-body">Panel Content</div>
                        </div>    
                    </div>
                        
                </div>        
            </div>
            
        </div>
    </section>
       
</div>