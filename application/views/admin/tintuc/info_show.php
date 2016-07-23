    <h4><small>Trang chủ > Thông tin nổi bật</small></h4>
      <hr>
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger" ><a href="<?php echo base_url();?>admin/tintuc/form_insert_info" style="color: white;text-decoration: none;"><span>* Thêm tin khác</span></a></span>
            </div>
        </div>
        <br />
        <table class="table table-bordered" id="table_thongtingianhang">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="9%">Hình ảnh</th>
                    <th width="32%">Tiêu đề</th>
                    <th width="15%">Ngày Đăng</th>
                    <th width="15%">Người đăng</th>
                    <th width="12%">Trạng thái</th>
                    <th width="12%">Control</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($get_data as $row){
                        
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><img src="<?php echo base_url();?>public/images/tintuc/thumb/thumb-<?php echo $row['hinhanh']?>" width="50px"/></td>
                    <td><a href="#"><?php echo $row['tieude']?> ...</a></td>
                    <td><span><?php echo $row['ngaydang']?></span></td>
                    <td><span><?php echo $row['user_admin_id']?></span></td>
                    <td><span><?php if($row['trangthai'] == 1)echo 'Hiển thị';else echo 'Không hiển thị';?></span></td>
                    <td><a class="btn btn-success" href="<?php echo base_url();?>admin/tintuc/form_edit_info/<?php echo $row['id']?>"><img src="<?php echo base_url();?>public/images/archiv.png"/></a><a class="btn btn-warning" href="<?php echo base_url();?>admin/tintuc/action_delete/<?php echo $row['id']?>"><img src="<?php echo base_url();?>public/images/trash_mail.gif"/></a></td>
                </tr>
                <?php
                    }
                ?>
                
            </tbody>
        </table>
        <style>
            
        </style>
        <div class="row pagination_pages">
            <div class="col-md-9">
                
            </div>
            <div class="">
                <?php
                    echo $pagination_pages;
                ?>
            </div>
        </div>     
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        