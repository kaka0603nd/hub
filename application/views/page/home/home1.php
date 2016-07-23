<!-- slide -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/slide/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/slide/css/style2.css" />
		<script type="text/javascript" src="<?php echo base_url();?>public/slide/js/modernizr.custom.28468.js"></script>
		<link href='http://fonts.googleapis.com/css?family=Economica:700,400italic' rel='stylesheet' type='text/css'>
	   <script type="text/javascript" src="<?php echo base_url();?>public/slide/js/jquery.cslider.js"></script>
       
		<script type="text/javascript">
			$(function() {
			
				$('#da-slider').cslider({
					autoplay	: true,
					bgincrement	: 450
				});
			
			});
		</script>	
        -->
        <style>
        /*.container {
            width: 1170px;
            position: relative;
            text-align: center;
        }
        */
        /*
        #sanpham-top>a{
            background-color:#00F;
            color: #FFF;
        }
        #sanphammuavu{
            border-bottom: 2px solid #EBEBEB;
        }
    	#sanpham-hinh{
    		width: 96%;
    		height:80%;
    	}
        */
		.da-slider{
			/*background-image:url(<?php echo base_url();?>public/images/13116Background-hai-bong-hoa-doc-dao-dep-mat.jpg)*/
		}
        
        </style>
<!-- endslide-->
<!-- 
<div class="container-fluid">
    <div class="row">
        <div id="da-slider" class="da-slider">
				<div class="da-slide">
					<h2>Easy management</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php echo base_url();?>public/slide/images/2.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Revolution</h2>
					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php echo base_url();?>public/slide/images/3.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Warm welcome</h2>
					<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php echo base_url();?>public/slide/images/1.png" alt="image01" /></div>
				</div>
				<div class="da-slide">
					<h2>Quality Control</h2>
					<p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
					<a href="#" class="da-link">Read more</a>
					<div class="da-img"><img src="<?php echo base_url();?>public/slide/images/4.png" alt="image01" width="256" height="256"/></div>
				</div>
				<nav class="da-arrows">
					<span class="da-arrows-prev"></span>
					<span class="da-arrows-next"></span>
				</nav>
			</div>
    </div>
</div>
-->
<div class="container">
    <div class="row">
        
        <div class="col-md-12" id="content-full">
            <div id="sanpham">
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active" id="sanpham-top"><a data-toggle="tab" href="#home"><?php $sp = 'CÔNG NGHỆ - ĐIỆN TỬ';echo $sp;?></a></li>
                        <li><a data-toggle="tab" href="#menu1">ĐIỆN THOẠI</a></li>
                        <li><a data-toggle="tab" href="#menu2">MÁY TÍNH BẢNG</a></li>
                        <li><a data-toggle="tab" href="#menu3">MÁY TÍNH</a></li>
                        <li><a data-toggle="tab" href="#menu3">MÁY ẢNH</a></li>
                        <li><a data-toggle="tab" href="#menu3">TI VI</a></li>
                        <li><a data-toggle="tab" href="#menu3">PHỤ KIỆN ĐIỆN TỬ</a></li>
                    </ul>
                    
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    	<img src="images/1.png" id="sanpham-hinh"/>
                                    </div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-2">
                                <br />
                                <br />
                                <br /><br />
                                <a href=""><p>xem them...</p></a>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">Panel Content</div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">Panel Content</div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">Panel Content</div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <br />
            </div><br />
            <div id="sanpham-dienlanh">
                <div class="row">
                    <ul class="nav nav-tabs">
                        <li class="active" id="sanpham-top"><a data-toggle="tab" href="#home"><?php $sp = 'SẢN PHẨM MÙA VỤ';echo $sp;?></a></li>
                        <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
                        <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                        <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>
                    </ul>
                    
                    <div class="tab-content"> 
                        <div id="home" class="tab-pane fade in">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">Panel Content</div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            <div class="col-md-2">
                                <br />
                                <br />
                                <br /><br />
                                <a href=""><p>xem them...</p></a>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">Panel Content</div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">Panel Content</div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div id="menu3" class="tab-pane fade">
                            <br />
                            <?php for($i=0;$i<5 ;$i++){
                                
                            ?>
                            <div class="col-md-2">
                                <div class="panel panel-default">
                                    <div class="panel-body">Panel Content</div>
                                    <div class="panel-footer">Panel Footer</div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="sanpham-dogiadung">
                
            </div>
            <div id="sanpham-dientuamthanh">
                
            </div>
            <div id="sanpham-dienthoai">
                
            </div>
            <div id="sanpham-kithuatso">
                
            </div>
            <div id="sanpham-labtop">
                
            </div>
            <div id="sanpham-maytinhbang">
                
            </div>
            <div id="sanpham-maytinhphukien">
                
            </div>
            <div id="sanpham-thietbivanphong">
                
            </div>
        </div>
    </div>
</div>