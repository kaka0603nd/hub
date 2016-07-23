<h4><small>Trang chủ > danh mục</small></h4>
      <hr>
        <div class="row">
            <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">Danh sách phản hồi</h2></center>
            <br />
        </div>
        
        <br />
        <table class="table table-bordered" id="table_thongtingianhang">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="10%">Email</th>
                    <th width="10%">Time</th>
                    <th width="30%">Content</th>
                    <th width="15%">Control</th>
                </tr>
            </thead>
            <tbody>
            <style>
                .custom_noidung{
                    width: 200px;
                    overflow: hidden;
                }
            </style>
            <?php
                foreach($phanhoi as $row){
                    
                
            ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><span><?php echo $row['email']?></span></td>
                    <td><span><?php echo $row['created_at']?></span></td>
                    <td><div class="custom_noidung"><span><?php echo $row['noidung']?></span></div></td>
                    <td><a class="btn btn-success btnform" href="<?php echo base_url();?>admin/phanhoi/chitiet/<?php echo $row['id']?>"><img src="<?php echo base_url();?>public/images/hp-icon-approval-workflow.png" width="16px"/></a><a class="btn btn-warning btnform" href="<?php echo base_url();?>admin/phanhoi/xoa"><img src="<?php echo base_url();?>public/images/trash_mail.gif"/></td>
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