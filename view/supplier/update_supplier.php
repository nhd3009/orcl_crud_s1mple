<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-houzz-box menu-icon"></i>
                </span> Cập nhật nhà cung cấp
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Tổng quan <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=update_supplier" method="post" class="forms-sample">
                    <input type="hidden" id="inputId" name="supplier_id" value="<?=$result_one_supplier[0]['SUPPLIER_ID']?>">
                        <div class="form-group">
                            <label for="inputName">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" id="inputName" name="supplier_name" value="<?=$result_one_supplier[0]['SUPPLIER_NAME']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputSDT">Số điện thoại</label>
                            <input type="text" class="form-control" id="inputSDT" name="supplier_contact" value="<?=$result_one_supplier[0]['CONTACT_NUMBER']?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="updateSupplier" value="Cập nhật">
                        <a href="index.php?content=suppliers" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>