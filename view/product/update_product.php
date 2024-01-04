<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-food-variant menu-icon"></i>
                </span> Sửa sản phẩm
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=update_product" method="post" class="forms-sample">
                        <input type="hidden" id="inputId" name="product_id" value="<?=$result_one_product[0]['PET_PRODUCT_ID']?>">
                        <div class="form-group">
                            <label for="inputName">Tên sản phẩm</label>
                            <input type="text" class="form-control" id="inputName" name="product_name" placeholder="Tên sản phẩm" value="<?=$result_one_product[0]['PET_PRODUCT_NAME']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputDetail">Chi tiết sản phẩm</label>
                            <input type="text" class="form-control" id="inputDetail" name="product_detail" placeholder="Chi tiết sản phẩm" value="<?=$result_one_product[0]['PET_PRODUCT_DETAIL']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Giá</label>
                            <input type="text" class="form-control" id="inputPrice" name="product_price" placeholder="Giá sản phẩm" value="<?=$result_one_product[0]['PRODUCT_PRICE']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputQuantity">Số lượng</label>
                            <input type="text" class="form-control" id="inputQuantity" name="product_quantity" placeholder="Số lượng sản phẩm" value="<?=$result_one_product[0]['QUANTITY_ON_HAND']?>">
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Danh mục</label>
                            <select class="form-control" id="inputCategory" name="product_category">
                                <?php foreach ($list_of_categories as $category): ?>
                                    <option value="<?=$category['PET_PRODUCT_CATEGORY_ID']?>" 
                                        <?=($category['PET_PRODUCT_CATEGORY_ID'] == $result_one_product[0]['PET_PRODUCT_CATEGORY_ID']) ? 'selected' : ''?>>
                                        <?=$category['PET_PRODUCT_CATEGORY_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputSupplier">Nhà cung cấp</label>
                            <select class="form-control" id="inputSupplier" name="product_supplier">
                                <?php foreach ($list_of_suppliers as $supplier): ?>
                                    <option value="<?=$supplier['SUPPLIER_ID']?>" 
                                        <?=($supplier['SUPPLIER_ID'] == $result_one_product[0]['SUPPLIER_ID']) ? 'selected' : ''?>>
                                        <?=$supplier['SUPPLIER_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="updateProduct" value="Đồng ý">
                        <a href="index.php?content=products" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>