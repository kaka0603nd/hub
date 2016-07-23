<h4 id="click_here"><small>Trang chủ > Thông tin nổi bật</small></h4>
<script src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
<hr>
<script>
    $(document).ready(function(e) {
		$('.btnbaocao').click(function(){
			//var check = document.form_chk.chk.length;
			var check = $('.chk').length;
			var c_value = '';
			for (var i=0; i < check; i++)
			{
				if (document.form_chk.chk[i].checked)
				{
					c_value += document.form_chk.chk[i].value+"<br/>";
				}
			}
			$('.danhsach_baocao').val(c_value);
			//alert(result);
			if($('.danhsach_baocao').val() == ''){
				alert('Vui lòng click vào hộp chọn nơi cần báo cáo !');
				return false;
			}
			return true;
		});
    });
</script>
<br />
    <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger" ><a href="<?php echo base_url();?>admin/tintuc/form_insert_info" style="color: white;text-decoration: none;">* Sản phẩm chưa duyệt</a></span>
            </div>
        </div>
        <br />
        <style>
            .check-baocao{
                text-align: center;
            }
            h4{
                color: #EC272E;
            }
        </style>
        <form action="<?php echo base_url();?>admin/sanpham/action_duyetform/<?php echo $data['sanpham_id']?>/<?php echo $data['danhmuc_sanpham']?>" method="post" name="form_chk">
        <table class="table table-bordered" id="table_thongtingianhang">
            <thead>
                <tr >
                    <th width="20%">THUỘC TÍNH</th>
                    <th width="70%">THÔNG SỐ</th>
                    <th width="10%">Báo cáo</th>
                </tr>
            </thead>
            <tbody>
                <tr style="text-align: center;">
                    <td colspan="3"><h4>Thông tin sản phẩm</h4></td>
                </tr>
                <tr>
                    <td>Mã sản phẩm</td>
                    <td><span><?php echo $data['sanpham_id']?></span><input name='sp_id' class="form-control" type="hidden" value="<?php echo $data['id']?>"/></td>
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Mã sản phẩm : <?php echo $data['id']?>"/></td>                    
                </tr>
                <tr>
                    <td>Tên sản phẩm</td>
                    <td><input name='sp_ten' class="form-control" value="<?php echo $data['tensanpham']?>"/></td>
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Tên sản phẩm : <?php echo $data['tensanpham']?>"/></td>                   
                </tr>
                <tr>
                    <td>Tiêu đề</td>
                    <td><input name='sp_tieude' class="form-control" value="<?php echo $data['tieude']?>"/></td>
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Tiêu đề : <?php echo $data['tieude']?>" /></td>                    
                </tr>
                <tr>
                    <td>Hình ảnh sản phẩm</td>
                    <td><img src="<?php echo base_url();?>sanpham/thumb/thumb-<?php echo $data['hinhanh']?>" width="100px"/></td>
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Hình ảnh : <?php echo base_url();?>sanpham/thumb/thumb-<?php echo $data['hinhanh']?>"/></td>                    
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td>
                        <pre>
                            <?php
                                echo $data['noidung'];
                            ?>
                        </pre>
                    </td>
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Nội dung : <?php echo $data['noidung']?>"/></td>                    
                </tr>
                <tr>
                    <td>Danh mục</td>
                    <td><input name='sp_danhmuc' class="form-control" value="<?php echo $data['danhmuc_name']?>"/></td> 
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Danh mục : <?php echo $data['danhmuc_name']?>" /></td>                   
                </tr>
                <tr>
                    <td>Ngày đăng</td>
                    <td><input name='sp_ngaydang' class="form-control" value="<?php echo $data['ngaydang']?>"/></td>     
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Ngày đăng : <?php echo $data['ngaydang']?>"/></td>               
                </tr>
                <tr>
                    <td>Giá</td>
                    <td><input name='sp_gia' class="form-control" value="<?php echo $data['gia']?>"/></td>   
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Giá : <?php echo $data['gia']?>" /></td>                 
                </tr>
                
                <tr>
                    <td>Liên hệ</td>
                    <td><input name='sp_lienhe' class="form-control" value="<?php echo $data['lienhe']?>"/></td> 
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Liên hệ : <?php echo $data['lienhe']?>"/></td>                   
                </tr>
                <tr>
                    <td>Vận chuyển</td>
                    <td><input name='sp_vanchuyen' class="form-control" value="<?php echo $data['vanchuyen']?>"/></td>   
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Vận chuyển : <?php echo $data['vanchuyen']?>" /></td>                 
                </tr>
                <tr>
                    <td>ID người đăng</td>
                    <td><span><?php echo $data['user_id']?></span></td>   
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="<?php echo $data['user_id']?>"/></td>                 
                </tr>
                <tr>
                    <td>Tên người đăng</td>
                    <td><span><?php echo $data['user_id']?></span></td>    
                    <td class="check-baocao"><input type="checkbox" name="chk" class='chk' value="Tên người đăng : <?php echo $data['user_id']?>" /></td>                
                </tr>
                
                <tr>
                    <td>Tình trạng</td>
                    <td><span><?php if($data['tinhtrang'] == 1) echo 'Mới'; else if($data['tinhtrang'] == 2) echo 'Cũ'; else echo 'Không xác định';?></span></td>      
                    <td class="check-baocao"><input type="checkbox" name="check_tinhtrang" /></td>              
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center;"><h4>Thông tin mở rộng</h4></td>
                </tr>
                <?php
                    foreach($extend as $key => $row)
                    {
                ?>
                <tr>
                    <td><?php echo $key?></td>
                    <td><span><?php echo $extend[$key]?></span></td>      
                    <td class="check-baocao"><input type="checkbox" name="check_trangthai" /></td>              
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <td colspan="3" style="text-align: center;"><h4>Báo cáo vào mục ghi chú nếu có lỗi hoặc bỏ qua nếu không phát hiện lỗi</h4></td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td colspan="2"><span><?php if($data['trangthai'] == 2) echo 'Chờ duyệt'; else if($data['tinhtrang'] == 1) echo 'Đã duyệt'; else echo 'Không xác định';?></span></td>      
                    <!-- <td class="check-baocao"><input type="checkbox" name="chk" class='chk' /></td>     -->         
                </tr>
                <tr>
                    <td>Ghi chú</td>
                    
                    <td class="check-baocao" colspan="2">
                        <textarea id="editor1" name="ghichu"></textarea>
                        <script>
                     
                               CKEDITOR.replace( 'editor1' );
                     
                        </script> 
                    </td>              
                </tr>
                <input type="hidden" name="danhsach_baocao" class="danhsach_baocao"/>
                <tr>
                    <td></td>
                    <td colspan="2">
                        <input type="submit" name="btnxong" value="XONG (Không có lỗi)" class="btn btn-success btnxong"/>
                        <input type="submit" name="btnbaocao" value="Báo cáo lại người dùng" class="btn btn-warning btnbaocao"/>
                        <input type="submit" name="btn_nguoidungspam" value="Người dùng spam" class="btn btn-danger btn_nguoidungspam"/>
                    </td>   
                                     
                </tr>
            </tbody>
        </table>
    </form>