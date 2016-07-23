<h4><small>Trang chủ > Thông tin nổi bật</small></h4>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

      <hr>
      <div class="fb-like" data-href="https://batheitblog.wordpress.com/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
      <!-- <div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div> -->
        
        <br />
        <div class="row">
            <div class="col-md-3">
                <img src="<?php echo base_url().'public/';?><?php echo !empty($row['hinhanh'])?'images/user/':'images/icon/user.png' ?>" width="150px" />
            </div>
            <div class="col-md-9">
            <div class="panel panel-primary">
              <div class="panel-heading">Quản lý người dùng - <?php echo $row['id']?></div>
              <div class="panel-body">
                <form action="<?php echo base_url();?>admin/store/action_click" method="post">
                
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td style="width: 20%;"><span>Id</span></td>
                            <td><span><?php echo $row['id']?></span></td>
                            <input type="hidden" value="<?php echo $row['id']?>" name="store_id"/>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Name</span></td>
                            <td><span><?php echo $row['name']?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>CMTND</span></td>
                            <td><span><?php echo $row['sochungminh']?></span></td>
                        </tr>
                        
                        <tr>
                            <td style="width: 20%;"><span>Email</span></td>
                            <td><span><?php echo $row['email']?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Trạng thái</span></td>
                            <td><span><?php if($row['trangthai']==1){
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
                                            
                            ?></span></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;"><span>Date</span></td>
                            <td><span><?php echo $row['created_at']?></span></td>
                        </tr>
                        <tr>
                            <td><span>Số sản phẩm đã đăng</span></td>
                            <td>
                                <div style="width: 150px;">
                                    <input type="text" value="<?php echo $count?>" class="form-control" />
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td><span></span></td>
                            <td>
                                <!--<input name="duyet_store" class="btn btn-success" value="Duyệt (bỏ chặn)" type="submit"/>
                                <input name="spam_store" class="btn btn-danger" value="Chặn người này" type="submit" />
                                -->
                                <a href="<?php echo base_url();?>admin/store/action_duyet_store/<?php echo $row['id']?>" class="btn btn-success">Duyệt (bỏ chặn)</a>
                                <a href="<?php echo base_url();?>admin/store/action_spam_store/<?php echo $row['id']?>" class="btn btn-danger">Chặn người này</a>
                                <a href="<?php echo base_url();?>admin/store" style="text-decoration: none;" class="btn btn-default"><span>Back ...</span></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </form>
              </div>
            </div>
                
            </div>
            <style>
                .title-sp-dang{
                    font-size: 22px;
                    font-family: serif;
                    font-weight: bold;
                    color: #C7C6C6;
                }
            </style>
            <span class="title-sp-dang">CÁC SẢN PHẨM ĐÃ ĐĂNG</span>
            <table class="table table-bordered" id="table_thongtingianhang">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="9%">Hình ảnh</th>
                    <th width="15%">Tên sản phẩm</th>
                    <th width="15%">Tiêu đề</th>
                    <th width="15%">Ngày đăng</th>
                    
                    <th width="10%">Trạng thái</th>
                    <th width="15%">Control</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = count($danhmuc);
                    //echo $count;
                    $i=0;
                    foreach($sanpham as $row){
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><img src="<?php echo base_url();?>public/images/tintuc/thumb/thumb-<?php echo $row['hinhanh']?>" width="50px"/></td>
                    <td><a href="#"><?php echo $row['tensanpham']?></a></td>
                    <td><span><?php echo $row['tieude']?></span></td>
                    <td><span><?php echo $row['ngaydang']?></span></td>
                    
                    <td><span><?php if($row['trangthai'] == 1)
                                        echo '<span class="label label-success">Đã duyệt</span>';
                                    else 
                                        if($row['trangthai'] == 3) 
                                            echo '<span class="label label-danger">Chưa duyệt</span>';
                                        else
                                            echo '<span class="label label-info">Chờ duyệt</span>';?></span></td>
                    <td><a class="btn btn-success" href="<?php echo base_url();?>admin/sanpham/form_edit_sanpham/<?php echo $row['id'].'/'.$danhmuc[$i];?>"><img src="<?php echo base_url();?>public/images/hp-icon-approval-workflow.png" width="16px"/></a><a class="btn btn-warning" href="<?php echo base_url();?>admin/tintuc/action_delete/<?php echo $row['id'].'/'.$danhmuc[$i];?>"><img src="<?php echo base_url();?>public/images/trash_mail.gif"/></a></td>
                </tr>
                <?php
                     $i++;
                    }
                ?>
            </tbody>
        </table>
        </div>