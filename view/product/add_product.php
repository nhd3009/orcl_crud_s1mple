<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-food-variant menu-icon"></i>
                </span> Thêm sản phẩm
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=add_product" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="inputName">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="inputName" name="product_name" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="inputDetail">Chi tiết sản phẩm</label>
                            <input type="text" class="form-control" id="inputDetail" name="product_detail" placeholder="Chi tiết sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Giá</label>
                            <input type="text" class="form-control" id="inputPrice" name="product_price" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="inputQuantity">Số lượng</label>
                            <input type="text" class="form-control" id="inputQuantity" name="product_quantity" placeholder="Số lượng sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Danh mục</label>
                            <select class="form-control" id="inputCategory" name="product_category">
                                <?php foreach ($list_of_categories as $category): ?>
                                    <option value="<?=$category['PET_PRODUCT_CATEGORY_ID']?>">
                                        <?=$category['PET_PRODUCT_CATEGORY_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputSupplier">Nhà cung cấp</label>
                            <select class="form-control" id="inputSupplier" name="product_supplier">
                                <?php foreach ($list_of_suppliers as $supplier): ?>
                                    <option value="<?=$supplier['SUPPLIER_ID']?>">
                                        <?=$supplier['SUPPLIER_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="addProduct" value="Đồng ý">
                        <a href="index.php?content=products" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>