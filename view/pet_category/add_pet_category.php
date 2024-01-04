<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-table-large menu-icon"></i>
                </span> Thêm Danh mục thú cưng
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=add_pet_category" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="inputName">Tên danh mục thú cưng</label>
                            <input type="text" class="form-control" id="inputName" name="pet_category_name" placeholder="Tên danh mục">
                        </div>
                        <input type="submit" class="btn btn-primary" name="add" value="Thêm">
                        <a href="index.php?content=pet_categories" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>