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
    .margin_padding{
        margin: 0px;
        padding: 0px;
    }
    div#duongdan_link{
        margin-top: 12px;
        margin-bottom: 50px;
    }
    span.span_quanlygianhang{
        font-weight: bold;
        font-size: 26px;
        color: #E24E2A;
    }
    ul {
        list-style: none;
        margin-top: 11px;
        padding: 0;
    }
    div#div_dshang div ul li{
        display: inline-block;
        padding: 5px;
        border-right: 1px solid #672B60;
        height: 23px;
    }
    #search_gianhang{
        margin-top: 8px;
        margin-bottom: 8px;
    }
    #text_search{
        background-color: #F1F1F1;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row" id="title_trang">
                <div class="col-md-3">
                    <span class="span_quanlygianhang">Quản lý gian hàng</span>
                </div> 
                <div class="col-md-2">
                    <a href="#"><span class="btn btn-default">add new *</span></a>
                </div> 
            </div>
            <div id="noidung_trang">
                
            </div>
        </div>
        <div class="col-md-12">
            <div class="row" id="div_dshang">
                <div class="col-md-12">
                    <ul>
                        <li><span>all </span><span class="badge"><?php echo $total_sanpham?></span></li>
                        <?php
                            foreach($thongtin_form as $key => $row){
                                
                            
                        ?>
                        <li><span><?php echo $key?></span> <span class="badge"> <?php echo $row?></span></li>
                        <?php
                            }
                        ?>
                        
                    </ul>
                </div> 
            </div>
            <div id="noidung_trang">
                
            </div>
        </div>
        <div class="col-md-12" id="search_gianhang">
            
                <div class="row">
                    <form>
                        <div class="col-md-2">
                            <select class="form-control">
                                <option>All date</option>
                                <option>1/2016</option>
                                <option>2/2016</option>
                                <option>3/2015</option>
                            </select>
                            <input type="hidden" name=""/>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control">
                                <option>Category</option>
                                <option>Dien thoai</option>
                                <option>May tinh bang</option>
                                <option>Laptop</option>
                            </select>
                            <input type="hidden" name=""/>
                        </div>
                        <div class="col-md-2">
                            <input class="btn btn-success" type="submit" value="Filter"/>
                        </div>
                    </form>
                    <div class="col-md-2">
                    </div>
                    <form>
                        <div class="col-md-3 margin_padding">
                            <div>
                                <input class="form-control" id="text_search"/>
                            </div>
                        </div>
                        <div class="col-md-1 margin_padding">
                            <div>
                                <input class="btn btn-danger" type="submit" value="search"/>
                            </div>
                        </div>
                    </form>
                    
                </div>
            
        </div><!-- end div search-->
        <style>
            table#table_quanlygianhang{
                width: 100%;
                background: #f7f7f7 none repeat scroll 0 0;
            }
            table#table_quanlygianhang thead tr th{
                background: #a1aaaf none repeat scroll 0 0;
                border-bottom: 1px solid #fff;
                border-right: 1px solid #fff;
                color: #fff;
                font-size: 14px;
                font-weight: 300;
                text-align: left;
            }
            #box_hinhanhsanpham{
                text-align: center;
            }
            #hinhanh_sp{
                width: 80px;
            }
            span.control_sp{
                padding: 10px;
            }
            div.box_ctr{
                display: none;
            }
            
            #text_center div{
                text-align: center;
                
            }
        </style>
        <script>
            $(document).ready(function(e){
                $(".table_dong").mousemove(function(){
                     $('.box_ctr').stop().show("slow");
                });
				$(".table_dong").mouseout(function(){
					 $('.box_ctr').stop().hide("slow");
				});
                /*
                var trangthai_check = false;
                $('.check_all').click(function(){
                    if(!trangthai_check){
                        $('.check_one').attr("checked","checked");
                        trangthai_check = true;
                    }
                    else{
                        $('.check_one'). ("checked");
                        trangthai_check = false;
                    }
                });
                */
                $(".check_all").change(function () {
                    $(".check_one").prop('checked', $(this).prop("checked"));
                });
            });
        </script>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" id="table_quanlygianhang">
                        <thead>
                            <tr>
                                <th style="width: 3%;"><input type="checkbox" class="check_all"/></th>
                                <th style="width: 3%;"><span>Id</span></th>
                                <th style="width: 10%;"><span>Tên</span></th>
                                <th style="width: 24%;"><span>Tiêu đề</span></th>
                                <th style="width: 10%;"><span>Hình ảnh</span></th>
                                
                                <th style="width: 15%;"><span>Lượt xem</span></th>
                                <th style="width: 9%;"><span>Ngày đăng</span></th>
                                <th style="width: 3%;"><span>Giá</span></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i =0;
                            foreach($sanpham as $row){
                                $imgs = $row['sanpham_hinhanh'];
                                $img = null;
                                if(empty($imgs)){
                                    $img = 'image_null.png';
                                }
                                else{
                                    $img = explode(',',$imgs);
                                    $img = $img[0];
                                }
                        ?>
                            <tr class="table_dong table_dong1">
                                <td><input class="check_one" type="checkbox" /></td>
                                <td><span><?php echo $i;?></span></td>
                                <td><span><?php echo $row['tensanpham']?></span></td>
                                <td>
                                    <div>
                                        <p><a href="<?php echo base_url();?>home/sanpham/<?php echo $row['sanpham_id']?>"><?php echo $row['tieude']?></a></p>
                                    </div>
                                    <div id="text_center">
                                        <div class="box_ctr box_ctr1">
                                            <p><span class="control_sp"><a href="<?php echo base_url();?>dangsanpham/edit/<?php echo $row['md5_id']?>">Edit </a> &nbsp;|</span><span class="control_sp"><a href="<?php echo base_url();?>store/delete_sanpham/<?php echo $row['md5_id']?>">Delete </a> &nbsp;|</span><span class="control_sp"><a href="<?php echo base_url();?>home/sanpham/<?php echo $row['sanpham_id']?>">View </a></span></p>
                                        </div>
                                    </div>
                                </td>
                                <td id="box_hinhanhsanpham"><img src="<?php echo base_url();?>public/sanpham/<?php echo $img?>" id="hinhanh_sp"/></td>
                                
                                <td><span><?php echo $row['view']?></span></td>
                                <td><span><?php echo $row['ngaydang']?></span></td>
                                <td><span><?php echo $row['gia']?>đ</span></td>
                            </tr>
                            <?php
                            $i++;
                                }
                            ?>
                            
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-10">
                    <div>Phan trang</div>
                </div>
                <div class="col-md-2">
                    <input class="btn btn-warning" type="submit" value="Xóa các mục đã chọn"/>
                </div>
                
            </div>
        </div>
        
    </div>
</div>