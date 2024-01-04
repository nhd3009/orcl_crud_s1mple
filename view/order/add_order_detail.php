<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-cart menu-icon"></i>
                </span> Thêm chi tiết
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <form action="index.php?content=add_order_detail" method="post" class="forms-sample">
                        <?php
                            $order_id = isset($_GET['id']) ? $_GET['id'] : '';
                        ?>
                        <div class="form-group">
                            <input type="text" hidden class="form-control" name="order_id" value="<?php echo htmlspecialchars($order_id); ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Danh mục</label>
                            <select class="form-control" id="inputCategory" name="order_detail_category">
                                <option value="">None</option>
                                <option value="Dịch vụ">Dịch vụ</option>
                                <option value="Thú cưng">Thú cưng</option>
                                <option value="Sản phẩm">Sản phẩm</option>
                            </select>
                        </div>

                        <div class="form-group" id="serviceDiv" style="display: none;">
                            <label for="inputService">Dịch vụ</label>
                            <select class="form-control" id="inputService" name="service_id">
                                <option value="">None</option>
                                <?php foreach ($list_services as $service): ?>
                                    <option value="<?=$service['SERVICE_ID']?>">
                                        <?=$service['SERVICE_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" id="petDiv" style="display: none;">
                            <label for="inputService">Thú cưng</label>
                            <select class="form-control" id="inputPet" name="pet_id">
                                <option value="">None</option>
                                <?php foreach ($list_pets as $pet): ?>
                                    <option value="<?=$pet['PET_ID']?>">
                                        <?=$pet['PET_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group" id="productDiv" style="display: none;">
                            <label for="inputService">Sản phẩm</label>
                            <select class="form-control" id="inputProduct" name="product_id">
                                <option value="">None</option>
                                <?php foreach ($list_products as $product): ?>
                                    <option value="<?=$product['PET_PRODUCT_ID']?>">
                                        <?=$product['PET_PRODUCT_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputQuantity">Số lượng</label>
                            <input type="text" class="form-control" id="inputQuantity" name="quantity" placeholder="Số lượng" oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        </div>
                        <div class="form-group">
                            <label for="inputRemarks">Ghi chú</label>
                            <input type="text" class="form-control" id="inputRemarks" name="order_detail_remarks" placeholder="Ghi chú">
                        </div>
                        <input type="submit" class="btn btn-primary" name="add_detail" value="Đồng ý">
                        <a href="index.php?content=detail_order&id=<?=htmlspecialchars($order_id)?>" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function() {
                    // Bắt sự kiện khi thay đổi thẻ select danh mục
                    $('#inputCategory').on('change', function() {
                        var selectedCategory = $(this).val(); // Lấy giá trị đã chọn

                        // Ẩn hoặc hiển thị thẻ div tùy thuộc vào giá trị đã chọn
                        if (selectedCategory === 'Dịch vụ') {
                            $('#serviceDiv').show(); // Hiển thị thẻ div
                        } else{
                            $('#serviceDiv').hide(); // Ẩn thẻ div
                            $('#inputService').val('');
                        }
                        if (selectedCategory === 'Thú cưng') {
                            $('#petDiv').show(); // Hiển thị thẻ div
                        } else {
                            $('#petDiv').hide(); // Ẩn thẻ div
                            $('#inputPet').val('');
                        }
                        if (selectedCategory === 'Sản phẩm') {
                            $('#productDiv').show(); // Hiển thị thẻ div
                        } else {
                            $('#productDiv').hide(); // Ẩn thẻ div
                            $('#inputProduct').val('');
                        }
                    });
                });
            </script>