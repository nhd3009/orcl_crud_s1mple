<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                </span> Thêm Danh mục sản phẩm
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=add_product_category" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="inputName">Tên danh mục sản phẩm</label>
                            <input type="text" class="form-control" id="inputName" name="product_category_name" placeholder="Tên danh mục">
                        </div>
                        <input type="submit" class="btn btn-primary" name="add" value="Thêm">
                        <a href="index.php?content=product_categories" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>