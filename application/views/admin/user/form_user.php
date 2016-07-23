<h4><small>Trang chủ > Thông tin nổi bật</small></h4>
      <hr>
        <div class="row">
            <form>
            <div class="col-md-1"></div>
            <div class="col-md-10 box-form-selectsv">
                <div class="col-md-2" style="padding-top: 11px; padding-bottom: 7px;">
                    <span>Kiểu tìm kiếm</span>
                </div>
                <div class="col-md-3" style="padding-top: 7px;padding-bottom: 7px;">
                    <select class="form-control">
                        <option selected="selected" disabled="disabled" ><span> << Kiểu tìm kiếm >></span></option>
                        <option value="ten"><span>ten</span></option>
                    </select>
                    
                </div>
                
                <div class="col-md-4" style="padding-top: 7px;padding-bottom: 7px;">
                    <input type="text" name="key_work" class="form-control" placeholder="Nhập từ khóa ..."/>
                </div>
                <div class="col-md-2" style="padding-top: 7px;padding-bottom: 7px;">
                    <input type="submit" class="btn btn-default" value="Tìm kiếm"/>
                </div>
            </div>
            </form>
        </div>
        <br />
        <table class="table table-bordered" id="table_thongtingianhang">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="9%">Hình ảnh</th>
                    <th width="15%">Tên người dùng</th>
                    <th width="15%">Tên đăng nhập</th>
                    <th width="15%">Ngày đăng kí</th>
                    
                    <th width="10%">Trạng thái</th>
                    <th width="15%">Control</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach($danhsach as $row){
                    
                
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><img src="<?php echo base_url();?>public/images/<?php echo empty($row['hinhanh'])?'icon/user.png':'user/'.$row['hinhanh']?>" width="50px"/></td>
                    <td><a href="<?php echo base_url().'/admin/user/'.$row['id']?>"><?php echo $row['fullname']?></a></td>
                    <td><span><?php echo $row['name']?></span></td>
                    <td><span><?php echo $row['created_at']?></span></td>
                    
                    <td><span><?php 
                                if($row['trangthai']==1){
                                                echo '<span class="label label-success">Đã xác nhận</span>';
                                            } 
                                            else{
                                                if($row['trangthai']==2){
                                                    echo '<span class ="label label-warning">Chưa xác nhận</span>';
                                                }
                                                else{
                                                    echo '<span class="label label-danger">Đã chặn</span>';
                                                }
                                            }
                    ?></span>
                    </td>
                    <td><a class="btn btn-success" href="<?php echo base_url();?>admin/user/form_edit/<?php echo $row['id']?>"><img src="<?php echo base_url();?>public/images/hp-icon-approval-workflow.png" width="16px"/></a><a class="btn btn-warning" href="<?php echo base_url();?>admin/user/action_delete/<?php echo $row['id']?>"><img src="<?php echo base_url();?>public/images/trash_mail.gif"/></td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
        <div class="row pagination_pages">
            <div class="col-md-9">
                
            </div>
            <div class="">
                <?php
                    echo $pagination_pages;
                ?>
            </div>
        </div>   