<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-table-large menu-icon"></i>
                </span> Danh mục thú cưng
              </h3>
              <a class="btn btn-success" href="index.php?content=add_pet_category">
                <span class="menu-title">Thêm danh mục thú cưng</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Danh mục thú cưng</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên danh mục thú cưng </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_pet_category) && is_array($result_pet_category) && count($result_pet_category) > 0) {
                                    $i = 1;
                                    foreach ($result_pet_category as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['PET_CATEGORY_NAME']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=update_pet_category&id='. $item['PET_CATEGORY_ID'] .'">Sửa</a>
                                        <a class="btn btn-danger" href="index.php?content=del_pet_category&id='. $item['PET_CATEGORY_ID'] .'">Xóa</a></td>';
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