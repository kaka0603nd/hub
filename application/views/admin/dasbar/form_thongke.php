<h4><small>Trang chủ > thống kê</small></h4>
      <hr/>
        <div class="row">
            <center><h2 style="FONT-WEIGHT: BOLD;color: #E80D16;text-shadow: 5px 5px 5px #8C8C86;">Thống kê</h2></center>
            <br />
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading" style="text-align: center;">
                    <span class="glyphicon glyphicon-phone"></span><span>Số sản phẩm đăng trong 3 tháng gần nhất</span>
                  </div>
                  <div class="panel-body">
                  <?php
                    $CI = &get_instance();
                    $CI->load->model('Sanpham_model');
                    
                  ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Thời điểm</th>
                                <th>Số sản phẩm đăng</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Tháng 3 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->Sanpham_model->thongke_thang('2016-03');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tháng 4 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->Sanpham_model->thongke_thang('2016-04');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tháng 5 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->Sanpham_model->thongke_thang('2016-05');
                                ?>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading" style="text-align: center;">
                    <span class="glyphicon glyphicon-user"></span><span>Số người đăng kí trong 3 tháng gần nhất</span>
                  </div>
                  <div class="panel-body">
                  <?php
                    $CI = &get_instance();
                    $CI->load->model('User_model');
                    
                  ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Thời điểm</th>
                                <th>Số người đăng kí</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Tháng 3 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->User_model->thongke_thang('3/2016');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tháng 4 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->User_model->thongke_thang('4/2016');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tháng 5 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->User_model->thongke_thang('4/2016');
                                ?>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default">
                  <div class="panel-heading" style="text-align: center;">
                    <span class="glyphicon glyphicon-home"></span><span>Số gian hàng đăng kí trong 3 tháng gần nhất</span>
                  </div>
                  <div class="panel-body">
                  <?php
                    $CI = &get_instance();
                    $CI->load->model('Store_model');
                    
                  ?>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Thời điểm</th>
                                <th>Số gian hàng đăng kí</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>Tháng 3 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->Store_model->thongke_thang('2016-03');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tháng 4 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->Store_model->thongke_thang('2016-04');
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tháng 5 - 2016</td>
                            <td>
                                <?php
                                    echo $CI->Store_model->thongke_thang('2016-05');
                                ?>
                            </td>
                        </tr>
                    </table>
                  </div>
                </div>
            </div>
        </div>
