<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-paw menu-icon"></i>
                </span> Thú cưng
              </h3>
              <a class="btn btn-success" href="index.php?content=add_pet">
                <span class="menu-title">Thêm thú cưng</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Thú cưng</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên thú cưng </th>
                            <th> Tình trạng </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_pets) && is_array($result_pets) && count($result_pets) > 0) {
                                    $i = 1;
                                    foreach ($result_pets as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['PET_NAME']}</td>";
                                        echo "<td>{$item['PET_STATUS']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=update_pet&id='. $item['PET_ID'] .'">Sửa</a>
                                        <a class="btn btn-secondary" href="index.php?content=detail_pet&id='. $item['PET_ID'] .'">Chi tiết</a>
                                        <a class="btn btn-danger" href="index.php?content=del_pet&id='. $item['PET_ID'] .'">Xóa</a></td>';
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