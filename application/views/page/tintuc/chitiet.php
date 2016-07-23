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
    
    
    <style>
    #duongdan_link{
        margin-bottom: 10px;
        margin-top: 10px;
        line-height: 21px;
        display: inline-block;
    }
        
    </style>
    <style>
    .tintuc_tieude{
        
    }
    .tintuc_tieude>h3{
        margin-top: 0px;
        /*line-height: 180%;*/
        color: #c54134;
        font-size: 1.5em;
        
    }
    .tintuc_hinhanh{
        width:100%; 
        max-height:300px;
        height: 180px;
        padding:3px; 
        border:1px solid #c0c0c0;
    }
    p.time {
        
    }
    .fa {
        
        font-size: inherit;
    }
    .user-admin-tintuc{
        
        padding-bottom:10px;
        
    }
    .custom_glyphicon{
        color: #959595;
    }
    .custom_tintuc_nodung{
        font-size: 11pt;
        font-family: Helvetica,Arial,sans-serif;
        line-height: 1.4;
        font-style: oblique;
        font-family: serif;
        color: #959595;
        text-align: justify;
    }
</style>
    <section class="row" style="margin-top: 24px;">
        <div class="col-md-8">
            <h2 class="title-block"><?php echo 'TIN NỔI BẬT '?></h2>
            <div class="sanpham">
                <div class="row">
                    <div class="col-md-4">
                        <img class="tintuc_hinhanh" title="" alt="" src="<?php echo base_url();?>public/images/tintuc/<?php echo $hinhanh?>" style="" />
                        
                    </div>
                    <div class="col-md-8">
                        <section style="" class="tintuc_tieude">
                            <h3><?php if(isset($tieude)) echo $tieude?></h3>
                    		<p class="time">
                                <span class="glyphicon glyphicon-calendar custom_glyphicon" style="margin-right:4px"></span> 
                                <i>Đăng vào : <?php echo $ngaydang ?> PM </i>
                            </p>
                    		<p style="" class="user-admin-tintuc">
                                <span class="glyphicon glyphicon-user custom_glyphicon" style="margin-right:4px"></span> Đăng bởi mã :     <?php echo $user_admin_id?>		
                            </p>
                    		<p style="">
                                <span class="glyphicon glyphicon-eye-open custom_glyphicon" style="margin-right:4px;"></span> Lượt xem :   
              		            <?php echo $view?>		
                            </p>
                        </section>
                        
                        
                    </div>
                           
                </div>      
                <br />  
                <section class="row">
                    <div class="col-md-12 custom_tintuc_nodung">
                    
                    <?php
                        echo $noidung;
                    ?>
                    </div>
                </section>
                <div class="row">
                    <div class="col-md-12">
                        <p style="text-align: right;"><i>Nguồn tin : <?php echo $nguontin?></i></p>
                    </div>
                </div>
            </div>
            
            
            
        </div>
        <div class="col-md-4">
            <h2 class="title-block"><?php echo 'TIN XEM NHIỀU '?></h2>
            <div class="sanpham">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Panel Heading</div>
                            <div class="panel-body">Panel Content</div>
                        </div>    
                    </div>
                        
                </div>        
            </div>
            
        </div>
    </section>
       
</div>