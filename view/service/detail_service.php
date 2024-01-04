<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-alert menu-icon"></i>
                </span> Chi tiết dịch vụ
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=update_service" method="post" class="forms-sample">
                        <input type="hidden" id="inputId" name="service_id" value="<?=$result_one_service[0]['SERVICE_ID']?>">
                        <div class="form-group">
                            <label for="inputName">Tên dịch vụ</label>
                            <input type="text" class="form-control" id="inputName" disabled name="service_name" placeholder="Tên dịch vụ" value="<?=$result_one_service[0]['SERVICE_NAME']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputFee">Giá dịch vụ</label>
                            <input type="text" class="form-control" id="inputFee" disabled name="service_fee" placeholder="Giá" pattern="[0-9]+(\.[0-9]+)?" value="<?=$result_one_service[0]['SERVICE_FEE']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputDetail">Chi tiết dịch vụ</label>
                            <input type="text" class="form-control" id="inputDetail" disabled name="service_detail" placeholder="Chi tiết dịch vụ" value="<?=$result_one_service[0]['SERVICE_DETAIL']?>">
                        </div>
                        <?php
                            // echo '<div><label style="color: red;">Bạn có muốn sửa</label></div></br>';
                            echo '<a href="index.php?content=update_service&id='. $result_one_service[0]['SERVICE_ID'] .'" class="btn btn-primary">Sửa</a>';
                        ?>
                        
                        <a href="index.php?content=services" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>