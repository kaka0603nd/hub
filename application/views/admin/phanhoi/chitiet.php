<script src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
<h4><small>Trang chủ > danh mục > chi tiết</small></h4>
      <hr>
        <div class="row">
            <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">Phản hồi</h2></center>
            <br />
        </div>
        
        <br />
        <div class="panel panel-default">
          <div class="panel-heading"><h4>Đánh giá phản hồi </h4></div>
          <div class="panel-body">
          <form action="<?php echo base_url();?>admin/phanhoi/action_sent" method="post">
            
          
            <table class="table table-bordered" id="table_thongtingianhang">
            
            <tbody>
            <style>
                .custom_noidung{
                    width: 200px;
                    overflow: hidden;
                }
            </style>
                <tr>
                    <td>ID</td>
                    <td><?php echo $id?><input name="id" type="hidden" value="<?php echo $id?>"/></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><span><?php echo $email?><input name="id" type="hidden" value="<?php echo $email?>"/></span></td>
                </tr>
                <tr>
                    <td>Ngày đăng</td>
                    <td><span><?php echo $created_at?></span></td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td><div class="custom_noidung"><span><?php echo $noidung?></span></div></td>
                </tr>
                <tr>
                    <td>Trả lời</td>
                    <td>
                        <textarea style="width: 100%;" id="editor1" name="thongtin" placeholder="Nhập vào nội dung ..."></textarea>
                            <script>
                     
                               CKEDITOR.replace( 'editor1' );
                     
                           </script>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button name="btnduyet" type="submit">Sent email</button></td>
                </tr>
            </tbody>
            </table>
            </form>
          </div>
        </div>
        
        <div class="row pagination_pages">
            <div class="col-md-9">
                
            </div>
            <div class="">
                <?php
                    //echo $pagination_pages;
                ?>
            </div>
        </div>   