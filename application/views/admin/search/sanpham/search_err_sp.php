    <h4><small>Trang chủ > Danh sách sản phẩm</small></h4>
      <hr>
        
        <style>
            .form-control>option{
                font-size: 18px;
                font-family: serif;
            }
        </style>
        <div class="row">
            <form action="<?php echo base_url();?>admin/sanpham/get_search" method="POST">
            <div class="col-md-1"></div>
            <div class="col-md-10 box-form-selectsv">
                <div class="col-md-2" style="padding-top: 11px; padding-bottom: 7px;">
                    <span>Kiểu tìm kiếm</span>
                </div>
                <div class="col-md-4" style="padding-top: 7px;padding-bottom: 7px;">
                    <select class="form-control" name="select_danhmuc">
                        <option selected="selected" disabled="disabled" value=""><span> << Kiểu tìm kiếm >></span></option>
                        <option value="id"><span>ID sản phẩm</span></option>
                        <option value="tensanpham"><span>Tên sản phẩm</span></option>
                        <option value="tieude"><span>Tiêu đề sản phẩm</span></option>
                        <option value="ngaydang"><span>Ngày đăng</span></option>
                        <option value="danhmuc"><span>Danh mục</span></option>
                        <option value="trangthai"><span>Trạng thái</span></option>
                    </select>
                    
                </div>
                
                <div class="col-md-4" style="padding-top: 7px;padding-bottom: 7px;">
                    <input type="text" name="key_work" class="form-control" placeholder="Nhập từ khóa ..."/>
                </div>
                <div class="col-md-2" style="padding-top: 7px;padding-bottom: 7px;">
                    <input type="submit" class="btn btn-default" value="Tìm kiếm" name="btnsub"/>
                </div>
            </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <a href="<?php echo base_url();?>admin/sanpham/chua_duyet" style="color: white;text-decoration: none;" class="btn btn-danger"><span class="glyphicon glyphicon-time"></span> Sản phẩm chưa duyệt</a>
            </div>
        </div>
        <br />
        <table class="table table-bordered" id="table_thongtingianhang">
            <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="9%">Hình ảnh</th>
                    <th width="20%">Tên sản phẩm</th>
                    <th width="14%">Tiêu đề</th>
                    <th width="10%">Ngày Đăng</th>
                    <th width="12%">Danh mục</th>
                    <th width="10%">Trạng thái</th>
                    <th width="12%">Control</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="8">
                    <h4>Không tìm thấy nội dung </h4>
                </td>
                
            </tr>
                
                
            </tbody>
        </table>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        