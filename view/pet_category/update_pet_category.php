<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-table-large menu-icon"></i>
                </span> Cập nhật Danh mục thú cưng
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=update_pet_category" method="post" class="forms-sample">
                    <input type="hidden" id="inputId" name="pet_category_id" value="<?=$result_one_pet_category[0]['PET_CATEGORY_ID']?>">
                        <div class="form-group">
                            <label for="inputName">Tên danh mục thú cưng</label>
                            <input type="text" class="form-control" id="inputName" name="pet_category_name" value="<?=$result_one_pet_category[0]['PET_CATEGORY_NAME']?>">
                        </div>
                        <input type="submit" class="btn btn-primary" name="update" value="Cập nhật">
                        <a href="index.php?content=pet_categories" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>