<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-paw menu-icon"></i>
                </span> Thêm thú cưng
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                  <form action="index.php?content=add_pet" method="post" class="forms-sample">
                        <div class="form-group">
                            <label for="inputName">Tên thú cưng</label>
                            <input type="text" class="form-control" id="inputName" name="pet_name" placeholder="Tên thú cưng">
                        </div>
                        <div class="form-group">
                            <label for="inputDetail">Mô tả thú cưng</label>
                            <input type="text" class="form-control" id="inputDetail" name="pet_description" placeholder="Mô tả thú cưng">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Giá</label>
                            <input type="text" class="form-control" id="inputPrice" name="pet_price" placeholder="Giá sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="inputQuantity">Tình trạng</label>
                            <select class="form-control" id="inputCategory" name="pet_status">
                                <option value="Available">Có sẵn</option>
                                <option value="Not Available">Không có sẵn</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Danh mục</label>
                            <select class="form-control" id="inputCategory" name="pet_category">
                                <?php foreach ($list_of_categories as $category): ?>
                                    <option value="<?=$category['PET_CATEGORY_ID']?>">
                                        <?=$category['PET_CATEGORY_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputSupplier">Nhà cung cấp</label>
                            <select class="form-control" id="inputSupplier" name="pet_supplier">
                                <?php foreach ($list_of_suppliers as $supplier): ?>
                                    <option value="<?=$supplier['SUPPLIER_ID']?>">
                                        <?=$supplier['SUPPLIER_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="addPet" value="Đồng ý">
                        <a href="index.php?content=pets" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>