<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-cart menu-icon"></i>
                </span> Tạo đơn hàng
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <form action="index.php?content=add_order" method="post" class="forms-sample">
                    <h4 class="card-title" style="margin-bottom: 30px; font-weight: bold;">Đơn hàng</h4>
                        <div class="form-group">
                            <label for="inputOrderdate">Ngày đặt hàng</label>
                            <input type="datetime-local" class="form-control" id="inputOrderdate" name="order_date" placeholder="Ngày đặt hàng">
                        </div>
                        <div class="form-group">
                            <label for="inputDeliverydate">Ngày giao hàng</label>
                            <input type="datetime-local" class="form-control" id="inputDeliverydate" name="delivery_date" placeholder="Ngày giao hàng">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Tình trạng</label>
                            <select class="form-control" id="inputStatus" name="order_status">
                                <option value="Processing" selected>Processing</option>
                                <option value="Success">Success</option>
                                <option value="On Delivery">On Delivery</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Khách hàng</label>
                            <select class="form-control" id="inputCustomer" name="customer_id" style="color: black;">
                                <?php foreach ($list_customers as $customer): ?>
                                    <option value="<?=$customer['CUSTOMER_ID']?>">
                                        <?=$customer['CUSTOMER_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" name="addOrder" value="Đồng ý">
                        <a href="index.php?content=orders" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>