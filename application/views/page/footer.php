<style>
        div.div_footer{
            background-color:#F7F7F7;
        }
        div#box_footer{
            /*text-align: center;*/
        }
        
        img#lienket_facebook{
            background: rgba(0, 0, 0, 0) url("<?php echo base_url();?>public/images/sunny_common.png") no-repeat scroll -757px -2px;
            height: 20px;
            width: 20px;
            margin-right: 5px;
        }
        img#lienket_google{
            background: rgba(0, 0, 0, 0) url("<?php echo base_url();?>public/images/sunny_common.png") no-repeat scroll -759px -48px;
            height: 20px;
            width: 20px;
            margin-right: 5px;
        }
        img#lienket_youtube{
            background: rgba(0, 0, 0, 0) url("<?php echo base_url();?>public/images/sunny_common.png") no-repeat scroll -783px -24px;
            height: 20px;
            width: 20px;
            margin-right: 5px;
        }
        div#table_lienket ul{
            padding: 0px;
            list-style: none;
        }
        div#table_lienket ul li{
            margin-bottom:3px;
        }
        
    </style>
	<div id="footer">
        <div class="container-fluid">
            <div class="row div_footer">
                <div class="col-md-2">
                    <span class="call-price">&nbsp;</span>
                </div>
                <div class="col-md-2">
                    <div id="box_footer">
                        <a href="#"><img src="<?php echo base_url();?>public/images/apple.png" style="width: 60%;"/></a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="box_footer">
                        <span>Liên kết</span>
                        <hr />
                        <div id="table_lienket">
                            <ul >
                                <li><a href=""><img src="<?php echo base_url();?>public/images/transparent.gif" id="lienket_facebook"/><span>Facebook</span></a></li>
                                <li><a href=""><img src="<?php echo base_url();?>public/images/transparent.gif" id="lienket_google"/><span>Google +</span></a></li>
                                <li><a href=""><img src="<?php echo base_url();?>public/images/transparent.gif" id="lienket_youtube"/><span>Youtube</span></a></li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="box_footer">
                        <span>Hỗ trợ khách hàng</span>
                        <hr />
                        <div id="table_lienket">
                            <ul>
                                <li><a href=""><span>Trung tâm trợ giúp</span></a></li>
                                <li><a href=""><span>An toàn mua bán</span></a></li>
                                <li><a href=""><span>Quy định cần biết</span></a></li>
                                <li><a href=""><span>Liên hệ hỗ trợ</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div id="box_footer">
                        <span>Bản quyền</span>
                        <hr />
                        <div >
                            <a href=""><p>Copyright &copy; 2016 Apple Inc. All rights reserved.</p></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <span class="call-price">&nbsp;</span>
                </div>
            </div>
            
        </div>
    </div>
    </div>
</body>
</html>