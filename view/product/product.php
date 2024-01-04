<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-food-variant menu-icon"></i>
                </span> Sản phẩm
              </h3>
              <a class="btn btn-success" href="index.php?content=add_product">
                <span class="menu-title">Thêm sản phẩm</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Sản phẩm</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên sản phẩm </th>
                            <th> Giá </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_products) && is_array($result_products) && count($result_products) > 0) {
                                    $i = 1;
                                    foreach ($result_products as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['PET_PRODUCT_NAME']}</td>";
                                        echo "<td>{$item['PRODUCT_PRICE']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=update_product&id='. $item['PET_PRODUCT_ID'] .'">Sửa</a>
                                        <a class="btn btn-secondary" href="index.php?content=detail_product&id='. $item['PET_PRODUCT_ID'] .'">Chi tiết</a>
                                        <a class="btn btn-danger" href="index.php?content=del_product&id='. $item['PET_PRODUCT_ID'] .'">Xóa</a></td>';
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