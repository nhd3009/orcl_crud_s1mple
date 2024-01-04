<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-clipboard-text menu-icon"></i>
                </span> Danh mục sản phẩm
              </h3>
              <a class="btn btn-success" href="index.php?content=add_product_category">
                <span class="menu-title">Thêm danh mục sản phẩm</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh mục sản phẩm</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên danh mục sản phẩm </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_product_category) && is_array($result_product_category) && count($result_product_category) > 0) {
                                    $i = 1;
                                    foreach ($result_product_category as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['PET_PRODUCT_CATEGORY_NAME']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=update_product_category&id='. $item['PET_PRODUCT_CATEGORY_ID'] .'">Sửa</a>
                                        <a class="btn btn-danger" href="index.php?content=del_product_category&id='. $item['PET_PRODUCT_CATEGORY_ID'] .'">Xóa</a></td>';
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