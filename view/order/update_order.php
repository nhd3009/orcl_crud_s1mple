<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-cart menu-icon"></i>
                </span> Sửa đơn hàng
              </h3>
            </div>
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                    <form action="index.php?content=update_order" method="post" class="forms-sample">
                    <h4 class="card-title" style="margin-bottom: 30px; font-weight: bold;">Đơn hàng</h4>
                        <input type="hidden" id="inputId" name="order_id" value="<?=$result_one_order[0]['ORDER_ID']?>">
                        <div class="form-group">
                        <?php
                            $oracleTimestamp = $result_one_order[0]['ORDER_DATE'];

                            // Chuyển đổi chuỗi thành đối tượng DateTime
                            $dateTime = DateTime::createFromFormat('d-M-y h.i.s.u A', $oracleTimestamp);

                            // Định dạng lại thành chuỗi có thể đọc được bởi datetime-local
                            $formattedDateTime = $dateTime->format('Y-m-d\TH:i:s');
                        ?>
                            <label for="inputOrderdate">Ngày đặt hàng</label>
                            <input type="datetime-local" class="form-control" id="inputOrderdate" name="order_date" value="<?=$formattedDateTime?>" placeholder="Ngày đặt hàng">
                        </div>
                        <?php
                            $oracleTimestamp = $result_one_order[0]['EXPECTED_DELIVERY_DATE'];

                            // Chuyển đổi chuỗi thành đối tượng DateTime
                            $dateTime = DateTime::createFromFormat('d-M-y h.i.s.u A', $oracleTimestamp);

                            // Định dạng lại thành chuỗi có thể đọc được bởi datetime-local
                            $formattedDateTime = $dateTime->format('Y-m-d\TH:i:s');
                        ?>
                        <div class="form-group">
                            <label for="inputDeliverydate">Ngày giao hàng</label>
                            <input type="datetime-local" class="form-control" id="inputDeliverydate" name="delivery_date" value="<?=$formattedDateTime?>" placeholder="Ngày giao hàng">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Tình trạng</label>
                            <select class="form-control" id="inputStatus" name="order_status">
                                <option value="Processing" <?=($result_one_order[0]['ORDER_STATUS'] == 'Processing') ? 'selected' : ''?>>Processing</option>
                                <option value="Success" <?=($result_one_order[0]['ORDER_STATUS'] == 'Success') ? 'selected' : ''?>>Success</option>
                                <option value="On Delivery" <?=($result_one_order[0]['ORDER_STATUS'] == 'On Delivery') ? 'selected' : ''?>>On Delivery</option>
                                <option value="Cancel" <?=($result_one_order[0]['ORDER_STATUS'] == 'Cancel') ? 'selected' : ''?>>Cancel</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Khách hàng</label>
                            <select class="form-control" id="inputCustomer" name="customer_id" style="color: black;">
                                <?php foreach ($list_customers as $customer): ?>
                                    <option value="<?=$customer['CUSTOMER_ID']?>" 
                                        <?=($customer['CUSTOMER_ID'] == $result_one_order[0]['CUSTOMER_ID']) ? 'selected' : ''?>>
                                        <?=$customer['CUSTOMER_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <hr style="border: 1px solid black; margin: 40px">
                        <div style="display: flex; align-items: center; margin-bottom: 30px;">
                            <h4 class="card-title" style="font-weight: bold; align-items: center;">Chi tiết đơn hàng</h4>
                            <a style="margin-left: auto;"  class="btn btn-success" href="index.php?content=add_order_detail&id=<?=$result_one_order[0]['ORDER_ID']?>" >
                                <span class="menu-title">Thêm chi tiết đơn hàng</span>
                                <i class="mdi mdi-database-plus menu-icon"></i>
                            </a>
                        </div>
                        <?php
                            echo '<table style="margin: 20px;" class="table">';
                            echo '<thead><tr>
                                    <th>Category</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Action</th>
                                  </tr></thead>';
                            echo '<tbody>';
                            $services_mapping = array();
                            foreach ($list_services as $service) {
                                $services_mapping[$service['SERVICE_ID']] = array(
                                    'SERVICE_NAME' => $service['SERVICE_NAME'],
                                    'SERVICE_FEE' => $service['SERVICE_FEE']);
                            }
                            $products_mapping = array();
                            foreach ($list_products as $product) {
                                $products_mapping[$product['PET_PRODUCT_ID']] = array(
                                    'PET_PRODUCT_NAME' => $product['PET_PRODUCT_NAME'],
                                    'PRODUCT_PRICE' => $product['PRODUCT_PRICE']);
                            }
                            $pets_mapping = array();
                            foreach ($list_pets as $pet) {
                                $pets_mapping[$pet['PET_ID']] = array(
                                    'PET_NAME' => $pet['PET_NAME'],
                                    'PET_PRICE' => $pet['PET_PRICE']);
                            }

                            foreach($result_order_detail as $row){
                                echo '<tr>';
                                if($row['SERVICE_ID'] !== null){
                                    if ($row['SERVICE_ID'] !== null && isset($services_mapping[$row['SERVICE_ID']])) {
                                        $service = $services_mapping[$row['SERVICE_ID']];
                                        echo '<td>SERVICE</td><td>' . $service['SERVICE_NAME'] . '</td>';
                                        echo '<td>' . $service['SERVICE_FEE'] . '</td>';
                                        echo '<td>' . $row['QUANTITY'] . '</td>';
                                        echo '<td>' . ($service['SERVICE_FEE'] * $row['QUANTITY']). '</td>';
                                    }
                                }
                                else if($row['PET_ID'] !== null){
                                    if ($row['PET_ID'] !== null && isset($pets_mapping[$row['PET_ID']])) {
                                        $pet = $pets_mapping[$row['PET_ID']];
                                        echo '<td>PET</td><td>' . $pet['PET_NAME'] . '</td>';
                                        echo '<td>' . $pet['PET_PRICE'] . '</td>';
                                        echo '<td>' . $row['QUANTITY'] . '</td>';
                                        echo '<td>' . ($pet['PET_PRICE'] * $row['QUANTITY']). '</td>';
                                    }
                                }
                                else if($row['PET_PRODUCT_ID'] !== null){
                                    if ($row['PET_PRODUCT_ID'] !== null && isset($products_mapping[$row['PET_PRODUCT_ID']])) {
                                        $product = $products_mapping[$row['PET_PRODUCT_ID']];
                                        echo '<td>PRODUCT</td><td>' . $product['PET_PRODUCT_NAME'] . '</td>';
                                        echo '<td>' . $product['PRODUCT_PRICE'] . '</td>';
                                        echo '<td>' . $row['QUANTITY'] . '</td>';
                                        echo '<td>' . ($product['PRODUCT_PRICE'] * $row['QUANTITY']). '</td>';
                                    }
                                }
                                else{
                                    echo '';
                                }
                                echo '<td><a class="btn btn-danger" href="index.php?content=delete_order_detail&id='. $row['ORDER_DETAIL_ID'] .'&order_id='. $result_one_order[0]['ORDER_ID'] .'">Xóa</a></td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                        ?>
                        <input type="submit" class="btn btn-primary" name="updateOrder" value="Đồng ý">
                        <a href="index.php?content=orders" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>