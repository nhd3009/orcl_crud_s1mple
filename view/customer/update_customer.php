<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-multiple menu-icon"></i>
                </span> Cập nhật Khách hàng
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
                  <form action="index.php?content=updatecustomer" method="post" class="forms-sample">
                    <input type="hidden" id="inputId" name="customer_id" value="<?=$result_one_customer[0]['CUSTOMER_ID']?>">
                        <div class="form-group">
                            <label for="inputName">Họ và tên</label>
                            <input type="text" class="form-control" id="inputName" name="customer_name" value="<?=$result_one_customer[0]['CUSTOMER_NAME']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputSDT">Số điện thoại</label>
                            <input type="text" class="form-control" id="inputSDT" name="customer_contact" value="<?=$result_one_customer[0]['CONTACT_NUMBER']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Địa chỉ</label>
                            <input type="text" class="form-control" id="inputAddress" name="customer_address" value="<?=$result_one_customer[0]['ADDRESS']?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                    </form>
                  </div>
                </div>
              </div>
            </div>