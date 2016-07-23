<style>
    .margin_padding{
        margin-top: 5px;
        margin-bottom: 10px;
    }
</style>
<script>
	$(document).ready(function(e) {
        $('.btn_giohang').click(function(){
			var s = $(this).children('.input_id').val();
			var tr_delete = $(this).children('.tr_delete').val();
			$.ajax({
				url: "<?php echo base_url();?>giohang/del_one/",
				data:{
				    rowid : s
				},
				dataType:"text",
				type:"POST",
				success: function(result){
					//$('.show_giohang').html(result);
					$("."+tr_delete).hide("slow");
                    $('.giohang_thongbao').slideUp("slow");
                    $('.giohang_thongbao').slideDown("slow");
                    $('.giohang_thongbao').html(result);
				},
                error:function (xhr, ajaxOptions, thrownError){
                    //On error, we alert user
                    alert(thrownError);
                }
			});
            return false;
		});
    });
</script>
<div class="container">
    <div class="row">
        <div class="col-md-12 margin_padding">
            <div id="duongdan_link">
                <div class="margin_padding">abc
                </div>
            </div>
            
        </div>
    </div>
    <div class="show_giohang">
    </div>
    <div class="row">
        <div class="col-md-12 margin_padding">
            <div id="huongdan_xoa">
                <div class="margin_padding">
                    <p><b><u>Hướng dẫn:</u> </b>Để xóa sản phẩm khỏi giỏ hàng, click <b>Xóa</b>/ Để thêm số lượng, điền số lượng sản phẩm vào ô rồi click <b>Cập nhật</b></p>
                </div>
            </div>
        </div>
    </div>
    <style>
        #img_sp{
            width: 100px;
        }
        .text_soluong{
            border: 1px solid #e6e6e6;
            height: 40px;
            padding: 5px 10px;
            transition: background 0.3s ease 0s;
            width: 100px;
            
        }
        div#soluong_sanpham{
            position: relative;
            box-sizing: border-box;
            margin-bottom: 5px;
        }
        span.them_giohang{
            position: absolute;
            display: block;
            margin-left: 82px;
            margin-top: 4px;
            cursor: pointer;
        }
        span.giam_giohang{
            position: absolute;
            display: block;
            margin-left: 82px;
            margin-top: 18px;
            cursor: pointer;
        }
        .tongcong_gia{
            border: none;
        }
        table{
            background: #f7f7f7 none repeat scroll 0 0;
            margin-bottom: 20px;
        }
        table tbody tr th{
            background: #a1aaaf none repeat scroll 0 0;
            border-bottom: 1px solid #fff;
            border-right: 1px solid #fff;
            color: #fff;
            font-size: 14px;
            font-weight: 300;
            text-align: left;
        }
        table tbody tr td{
            border: 1px solid #e9fbfe;
            font-size: 14px;
            vertical-align: top;
        }
        .btn-success{
            width: 88px;
        }
        .btn-warning{
            width: 88px;
        }
        #chinhsach_vanchuyen{
            font-family: serif;
            font-weight: bold;
            color: #F00;
        }
    </style>
    <script>
        $(document).ready(function(e){
            $('.them_giohang').click(change_sp_up);
            $('.giam_giohang').click(change_sp_down);
            function change_sp_up(){
                var gia = $('.gia_sp').val();
                var soluong = $('.text_soluong').val();
                soluong = parseInt(soluong)+ 1;
                $('.text_soluong').val(soluong);
                if(parseInt(soluong) >100){
                    alert('so luong san pham >0');
                    $('.text_soluong').val(100);
                    soluong= 1;
                }
                $('.tongcong_gia').val(soluong*parseInt(gia));
            }
            function change_sp_down(){
                var soluong = $('.text_soluong').val();
                soluong = parseInt(soluong)-1;
                $('.text_soluong').val(soluong);
                if(parseInt(soluong) <1){
                    alert('so luong san pham >0');
                    $('.text_soluong').val(1);
                }
            }
            
        });
        
        
    </script>
    <style>
        .btn-success{
            width: 165px;
        }
        .btn-info{
            height: 37px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
        <div id="giohang">
            <section>
                <form action="<?php echo base_url();?>giohang/update_cart" method="post">
                <div id="table_giohang">
                    <table class="orderinfo-table itemInfo-table table">
                        <tbody>
                            <tr>
                                <th width="14%">Thông tin sản phẩm</th>
                                <th width="22%">Tên sản phẩm</th>
                                <th width="10%">Số lượng</th>
                                <th width="10%">Tình trạng</th>
                                <th width="18%">Giá bán</th>
                                <th width="16%">Người đăng</th>
                                <th width="10%">Control</th>
                                <th>Tổng cộng</th>
                            </tr>
                            <?php
                                if(count($cart) ==0){
                                    ?>
                                    <tr><td colspan="6"><h4>Không có sản phẩm nào trong giỏ hàng !</h4></td></tr>
                                    <tr>
                                        <td colspan="5">
                                            <a class="btn btn-info" href="<?php echo base_url();?>">Tiếp tục mua hàng ...→</a>
                                        </td>
                                        <td>
                                            <p style="font-family: serif;font-size: 20px;">TOTAL</p>
                                        </td>
                                        <td>
                                            <p style="font-family: serif;font-size: 20px;">0₫</p>
                                        </td>
                                    </tr>
                                    <?php
                                    
                                }
                                else{
                                    $total_money = 0;
                                    foreach($cart as $row){
                                        $total_money += $row['price']*$row['qty'];
                                        $img_tts = null;
                                        $tinhtrang = '<span class="label label-warning">Hết hàng</span>';
                                        if(isset($row['option'])){
                                            $img_tt = $row['option']['hinhanh'];
                                            $tinhtrang = $row['option']['tinhtrang']==1?'<span class="label label-success">Còn hàng</span>':'<span class="label label-warning">Hết hàng</span>';
                                            if(empty($img_tt)){
                                                $img_tts = 'image_null.png';
                                            }
                                            else{
                                                $img_tts = explode(',',$img_tt);
                                                //$img = $arr_img[0];
                                            }
                                        }
                                        
                            ?>
                            <tr class="<?php echo $row['rowid']?>">
                                <td>
                                    <a title="<?php echo $row['name']?>" href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>"><img id="img_sp" alt="<?php echo $row['name']?>" src="<?php echo base_url();?>public/sanpham/thumb/thumb-<?php echo is_array($img_tts)?$img_tts[0]:$img_tts ?>" /></a>
                                </td>
                                <td>
                                    <a title="<?php echo $row['name']?>" href="<?php echo base_url();?>home/sanpham/<?php echo $row['id']?>"><p><?php echo $row['name']?></p></a>
                                </td>
                                <td>
                                    <div id="soluong_sanpham">
                                        <input type="text" name="qty[]" value="<?php echo $row['qty']?>" class="text_soluong"/>
                                        <span class="glyphicon glyphicon-triangle-top them_giohang"></span>
                                        <span class="glyphicon glyphicon-triangle-bottom giam_giohang"></span>
                                    </div>
                                    
                                </td>
                                <td>
                                    <p><?php echo $tinhtrang?></p>
                                </td>
                                <td>
                                    <p><?php echo $row['price']?>₫</p>
                                    <input class="gia_sp" type="hidden" value="<?php echo $row['price']?>"/>
                                </td>
                                <td>
                                
                                <?php
                                    $CI = &get_instance();
                                    $CI->load->model('User_model');
                                    $result = $CI->User_model->get_user_dangsanpham($row['id']);
                                    //var_dump($result);
                                ?>
                                    <?php
                                        if(count($result>0)){
                                            if( empty($result['hinhanh']) ){
                                                if($result['type'] == 'user'){
                                                    ?>
                                                    <div class="custom_logo_user">
                                                        <img src="<?php echo base_url();?>public/images/icon/image_null.png" width="40%"/>
                                                        <span class="label label-info">user</span>
                                                    </div>
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <div class="custom_logo_user">
                                                        <a href="<?php echo base_url();?>store/my_store/<?php echo $result['id']?>"><img src="<?php echo base_url();?>public/images/icon/image_null.png" width="40%"/></a>
                                                        <span class="label label-success">store</span>
                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                <a href="<?php echo base_url();?>"></a>
                                                <?php
                                            }
                                            else{
                                                if($result['type'] == 'user'){
                                                    ?>
                                                    <div class="custom_logo_user">
                                                        <img src="<?php echo base_url();?>public/images/user/<?php echo $result['hinhanh']?>" width="40%"/>
                                                        <span class="label label-info">user</span>
                                                    </div>
                                                    
                                                    <?php
                                                }
                                                else{
                                                    ?>
                                                    <div class="custom_logo_user">
                                                        <a href="<?php echo base_url();?>store/my_store/<?php echo $result['id']?>"><img src="<?php echo base_url();?>public/images/store/<?php echo $result['hinhanh']?>" width="40%"/></a>
                                                        <span class="label label-success">store</span>
                                                    </div>
                                                    
                                                    <?php
                                                }
                                                
                                            }
                                        }
                                    ?>
                                    
                                </td>                                
                                <td style="text-align: center;">
                                    <div>
                                        <a href="#" class="btn btn-warning btn_giohang"><input type="hidden" class="input_id" value="<?php echo $row['rowid']?>"/><input type="hidden" class="tr_delete" value="<?php echo $row['rowid']?>"/><img src="<?php echo base_url();?>public/images/icon/cart-delete-icon.png"/> xóa</a>
                                    </div>
                                </td>
                                <td>
                                    <p><?php echo $row['subtotal']?>₫</p>
                                    <input type="text" value="<?php echo $row['subtotal']?>" class="tongcong_gia"/>
                                    
                                </td>
                            </tr>
                            <input type="hidden" name="rowid[]" value="<?php echo $row['rowid']?>"/>
                            <?php
                                }
                                ?>
                                
                                <tr>
                                    <td colspan="5">
                                        <button name="btn_update" class="btn btn-success"><img src="<?php echo base_url();?>public/images/icon/cart-max-ok.png" width="23px"/> Cập nhập giỏ hàng</button>
                                        <a class="btn btn-info" href="<?php echo base_url();?>">Tiếp tục mua hàng ... →</a>
                                    </td>
                                    <td>
                                        <p style="font-family: serif;font-size: 20px;">TOTAL</p>
                                    </td>
                                    <td>
                                        <p style="font-family: serif;font-size: 20px;"><?php echo $total_money?>₫</p>
                                    </td>
                                </tr>
                                <?php
                                }
                            ?>
                            
                            <tr>
                                <td colspan="5">
                                    
                                </td>
                                <td colspan="2">
                                    <!--<button name="btn_capnhap" class="btn btn-success"><img src="<?php echo base_url();?>public/images/icon/cart-max-ok.png" width="23px"/> Cập nhập giỏ hàng</button>
                                    <span class="btn btn-info">Tiếp tục mua hàng</span>
                                    -->
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <p id="chinhsach_vanchuyen">→ Miễn phí vận chuyển nội thành Hà Nội với đơn hàng trên 200.000 vnđ</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </form>
            </section>
        </div>
        </div>
    </div>
</div>