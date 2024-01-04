<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-houzz-box menu-icon"></i>
                </span> Thêm nhà cung cấp
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=add_supplier" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="inputName">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" id="inputName" name="supplier_name" placeholder="Tên nhà cung cấp">
                        </div>
                        <div class="form-group">
                            <label for="inputSDT">Số điện thoại</label>
                            <input type="text" class="form-control" id="inputSDT" name="supplier_contact" placeholder="Số điện thoại">
                        </div>
                        <input type="submit" class="btn btn-primary" name="addSupplier" value="Thêm">
                        <a href="index.php?content=suppliers" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>