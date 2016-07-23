    <h4><small>Trang chủ > Thêm tin mới</small></h4>
    <script src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
    <style>
        .err{
            margin: .5em 0 0;
            display: block;
            color: #dd4b39;
            line-height: 17px;
            font: small-caption;
        }
    </style>
      <hr>
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger"><a href="#" style="color: white;">* Thêm tin khác</a></span>
            </div>
        </div>
        <br />
        <?php
            if(isset($tieude)){
                //echo 'tieude'.$tieude;
            }
        ?>
        <form action="<?php echo base_url();?>admin/tintuc/action_insert_info" method="post" enctype="multipart/form-data">
        <table class="table table-hover">
            
                <tbody>
                    <tr>
                        <td style="width: 20%;"><span>Mã tin</span></td>
                        <td><span>1211704</span></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Tiêu đề</span></td>
                        <td><input type="text" name="tieude" class="form-control" value="<?php if(isset($tieude)) echo $tieude?>" placeholder="Nhập vào tiêu đề ..."/><span class="err"><?php if(isset($tieude))if(empty($tieude)) echo '* không được bỏ trống trường này'?></span></td>
                        
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Nội dung</span></td>
                        <td>
                            
                            <textarea style="width: 100%;" id="editor1" name="noidung" placeholder="Nhập vào nội dung ..."><?php if(isset($noidung)) echo $noidung?></textarea>
                            <span class="err"><?php if(isset($noidung))if(empty($noidung)) echo '* không được bỏ trống trường này'?></span>
                            <script>
                     
                               CKEDITOR.replace( 'editor1' );
                     
                           </script> 
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Nguồn tin</span></td>
                        <td><input type="text" name="nguontin" class="form-control" value="<?php if(isset($nguontin)) echo $nguontin?>" placeholder="Nhập vào nguồn tin ..."/><span class="err"><?php if(isset($nguontin))if(empty($nguontin)) echo '* không được bỏ trống trường này'?></span></td>
                        
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Trạng thái</span></td>
                        <td>
                            <select class="form-control" name="trangthai" style="width: 30%;">
                                <option value="1" selected="">Hiển thị</option>
                                <option value="2">Không hiển thị</option>
                            </select>
                            <span class="err"><?php if(isset($trangthai))if(empty($trangthai)) echo '* trường này phải chọn'?></span>
                        </td>
                        
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Thêm hình ảnh</span></td>
                        <td><input type="file" name="hinhanh" class="form-control"/><span class="err"><?php if(isset($hinhanh))if(!$hinhanh) echo '* phải upload 1 ảnh và ảnh đó có size <10Mb'?></span></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span>Người đăng</span></td>
                        <td><span>Bathe0603nd</span></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;"><span></span></td>
                        <td><input type="submit" name="btnsub" class="btn btn-success" value="Thêm tin mới"/></td>
                    </tr>
                </tbody>
        </table>
      </form>