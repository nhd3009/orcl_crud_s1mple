<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-cart menu-icon"></i>
                </span> Chi tiết đơn hàng
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
                            <label for="inputOrderdate">Ngày đặt hàng</label>
                            <input type="text" disabled class="form-control" id="inputOrderdate" name="order_date" value="<?=$result_one_order[0]['ORDER_DATE']?>" placeholder="Ngày đặt hàng">
                        </div>
                        <div class="form-group">
                            <label for="inputDeliverydate">Ngày giao hàng</label>
                            <input type="text" disabled class="form-control" id="inputDeliverydate" name="delivery_date" value="<?=$result_one_order[0]['EXPECTED_DELIVERY_DATE']?>" placeholder="Ngày giao hàng">
                        </div>
                        <div class="form-group">
                            <label for="inputPrice">Tổng giá trị đơn hàng</label>
                            <input type="text" disabled class="form-control" id="inputPrice" <?=(!empty($result_total_amount) ? 'style="color: black;"' : 'style="color: red;"')?>name="total_amount" value="<?=(!empty($result_total_amount) ? $result_total_amount[0]['TOTAL_AMOUNT'] : 'Không có chi tiết đơn hàng')?>" placeholder="Giá trị đơn hàng">
                        </div>
                        <div class="form-group">
                            <label for="inputStatus">Tình trạng</label>
                            <input type="text" disabled class="form-control" id="inputStatus" name="order_status" value="<?=$result_one_order[0]['ORDER_STATUS']?>" placeholder="Tình trạng">
                        </div>
                        <div class="form-group">
                            <label for="inputCategory">Khách hàng</label>
                            <select disabled class="form-control" id="inputCustomer" name="customer_name" style="color: black;">
                                <?php foreach ($list_customers as $customer): ?>
                                    <option value="<?=$customer['CUSTOMER_ID']?>" 
                                        <?=($customer['CUSTOMER_ID'] == $result_one_order[0]['CUSTOMER_ID']) ? 'selected' : ''?>>
                                        <?=$customer['CUSTOMER_NAME']?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <hr style="border: 1px solid black; margin: 40px">
                        
                        <h4 class="card-title" style="margin-bottom: 30px; font-weight: bold;">Chi tiết đơn hàng</h4>
                        <?php
                            echo '<table style="margin: 20px;" class="table">';
                            echo '<thead><tr>
                                    <th>Category</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
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
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                        ?>
                        <?php
                            echo '<a href="index.php?content=update_order&id='. $result_one_order[0]['ORDER_ID'] .'" class="btn btn-primary">Sửa</a>';
                        ?>
                        
                        <a href="index.php?content=orders" class="btn btn-danger">Thoát</a>
                    </form>
                  </div>
                </div>
              </div>
            </div>