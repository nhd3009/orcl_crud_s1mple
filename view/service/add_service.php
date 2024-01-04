<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-alert menu-icon"></i>
                </span> Thêm dịch vụ
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=add_service" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="inputName">Tên dịch vụ</label>
                            <input type="text" class="form-control" id="inputName" name="service_name" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="inputFee">Giá dịch vụ</label>
                            <input type="text" class="form-control" id="inputFee" name="service_fee" placeholder="Giá" pattern="[0-9]+(\.[0-9]+)?">
                        </div>
                        <div class="form-group">
                            <label for="inputDetail">Chi tiết dịch vụ</label>
                            <input type="text" class="form-control" id="inputDetail" name="service_detail" placeholder="Chi tiết dịch vụ">
                        </div>
                        <input type="submit" class="btn btn-primary" name="addService" value="Thêm">
                        <a href="index.php?content=services" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>