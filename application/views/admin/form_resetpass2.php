<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang đăng nhập</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
<style>
    #form_login{
        width: 350px;
        height: auto;
        margin: 0px auto;
        margin-top: 100px;
		border: 1px solid #CCC;
		box-shadow:5px 5px 5px #F0F0F0;
        border-radius: 4px;
		background-color:#FFF;
        font-family: serif;
        /*background-image:url(images/blogger_widgets_visible_only_to_admin.jpg);*/
		background-size:198px;
		background-repeat:no-repeat;
		background-position: bottom;
        background-position: right;
    }
    #form_err{
        width: 350px;
        height: auto;
        margin: 0px auto;
        margin-top: 50px;
        border: 1px solid #CCC;
		box-shadow:5px 5px 5px #F0F0F0;
        border-radius: 4px;
		background-color:#FFF;
        font-family: serif;
        color: red;
        font-style: italic;
        
    }
    #form_err p {
        margin-top: 5px;
    }
</style>
<style>
    .title-page{
        font-size: 22px;
        font-family: serif;
        font-weight: bold;
        color: #C7C6C6;
    }
    .banner-top{
        background-color: #1e8cbe;
        border-bottom: 1px solid #0079aa;
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        height: 46px;
    }
    .box-page-log{
        margin-top: 6px;
    }
    .box-login-center{
        margin: 16px;
    }
    body{
        background-color: #EAEBEC;
    }
</style>
<div class="body">
    <div class="container-fluid banner-top">
        <div class="row">
            <div class="col-md-3 box-page-log">
            <a href="#">
                <div class="col-md-6">
                    <img src="<?php echo base_url();?>public/images/1458401946613_49686.jpg" width="100%"/>
                </div>
                <div class="col-md-6">
                    <span class="title-page">Batheitblog.com</span>
                </div>
            </a>
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(e) {
            setTimeout(function(){
				$('#form_err').fadeOut("slow");
                
			},3000);
			
        });
		function timer_out(){
				alert('hello');
		}
    </script>
    <div class="container">
            <?php
                /*if(isset($email)){
                    if(!empty($email)){
                        echo '<div id="form_err"><p>Bạn đã nhập sai mật khẩu ...</p></div>';
                    }
                    else{
                        echo '<div id="form_err"><p>Tên đăng nhập hoặc mật khẩu không tồn tại ...</p></div>';
                    }
                }
                */
            ?>
        <div class="row">
            <div id="form_login">
                    <form class="box-login-center" action="<?php echo base_url();?>admin/login/change_password" method="post">
                        <div class="form-group">
                          <label for="email">Password New</label>
                          <input type="text" class="form-control" name="password" placeholder="Enter password">
                        </div>
                        <button type="submit" class="btn btn-info">Change password</button>
                        <br />
                        <br />
                        <a href="<?php echo base_url();?>admin/login">Login</a>
                    </form>
                    
            </div>
        </div>
        <div class="row">
            <div id="form_login">
                
            </div>
        </div>
    </div>
</div>


</body>
</html>
