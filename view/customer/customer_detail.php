<?php
                            echo '<table style="margin: 20px;" class="table">';
                            echo '<thead><tr>
                                    <th>Order detail id</th>
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

                            foreach($result_customer as $row){
                                echo '<tr>';
                                echo '<td>'.$row['ORDER_DETAIL_ID'].'</td>';
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