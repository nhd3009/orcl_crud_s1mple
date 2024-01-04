<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                </span> Thêm khách hàng
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=add_customer" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="inputName">Tên khách hàng</label>
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="Tên khách hàng">
                        </div>
                        <div class="form-group">
                            <label for="inputSDT">Số điện thoại</label>
                            <input type="text" class="form-control" id="inputSDT" name="contact" placeholder="Số điện thoại" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Địa chỉ">
                        </div>
                        <input type="submit" class="btn btn-primary" name="addCustomer" value="Thêm">
                        <a href="index.php?content=customers" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>