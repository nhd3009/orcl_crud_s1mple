<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-cart menu-icon"></i>
                </span> Đơn hàng
              </h3>
              <a class="btn btn-success" href="index.php?content=add_order">
                <span class="menu-title">Thêm đơn hàng</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Đơn hàng</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Order_ID </th>
                            <th> Tình trạng </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_orders) && is_array($result_orders) && count($result_orders) > 0) {
                                    $i = 1;
                                    foreach ($result_orders as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['ORDER_ID']}</td>";
                                        echo "<td>{$item['ORDER_STATUS']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=update_order&id='. $item['ORDER_ID'] .'">Sửa</a>
                                        <a class="btn btn-secondary" href="index.php?content=detail_order&id='. $item['ORDER_ID'] .'">Chi tiết</a>
                                        <a class="btn btn-danger" href="index.php?content=del_order&id='. $item['ORDER_ID'] .'">Xóa</a></td>';
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