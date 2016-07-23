<h4><small>Trang chủ > danh mục</small></h4>
      <hr>
        <div class="row">
            
        </div>
        <div class="row">
            <div class="col-md-12">
                <span class="btn btn-danger" ><a href="<?php echo base_url();?>" style="color: white;text-decoration: none;">* Update danh mục</a></span>
            </div>
        </div>
        <br />
        <table class="table table-bordered" id="table_thongtingianhang">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="30%">Tên</th>
                    <th width="15%">Ngày tạo</th>
                    <th width="15%">Thuộc về danh mục</th>
                    <th width="15%">Control</th>
                </tr>
            </thead>
            <tbody>
            <script>
				$(document).ready(function(e) {
                    $('.btnform').click(function(){
						alert('Chức năng đang cập nhập');
						return false;
					});
                });
            </script>
            <?php
                foreach($danhmuc as $row){
                    
                
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><span><?php echo $row['name']?></span></td>
                    <td><span><?php echo $row['date']?></span></td>
                    <td><span><?php echo $row['danhmuc_sanpham']?></span></td>
                    <td><a class="btn btn-success btnform" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>public/images/hp-icon-approval-workflow.png" width="16px"/></a><a class="btn btn-warning btnform" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>public/images/trash_mail.gif"/></td>
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
                    //echo $pagination_pages;
                ?>
            </div>
        </div>   