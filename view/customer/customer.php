<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-account-multiple menu-icon"></i>
                </span> Khách hàng
              </h3>
              <a class="btn btn-success" href="index.php?content=add_customer">
                <span class="menu-title">Thêm khách hàng</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
<div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Khách hàng</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên khách hàng </th>
                            <th> Số điện thoại </th>
                            <th> Địa chỉ </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_customer) && is_array($result_customer) && count($result_customer) > 0) {
                                    $i = 1;
                                    foreach ($result_customer as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['CUSTOMER_NAME']}</td>";
                                        echo "<td>{$item['CONTACT_NUMBER']}</td>";
                                        echo "<td>{$item['ADDRESS']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=updatecustomer&id='. $item['CUSTOMER_ID'] .'">Sửa</a>
                                        <td><a class="btn btn-primary" href="index.php?content=customer_detail&id='. $item['CUSTOMER_ID'] .'">Xem chi tiết</a>
                                        <a class="btn btn-danger" href="index.php?content=delcustomer&id='. $item['CUSTOMER_ID'] .'">Xóa</a></td>';
                                        echo "</tr>\n";
                                        $i++;
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Không có dữ liệu</td></tr>";
                                }
                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>