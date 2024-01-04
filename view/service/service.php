<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-account-alert menu-icon"></i>
                </span> Dịch vụ
              </h3>
              <a class="btn btn-success" href="index.php?content=add_service">
                <span class="menu-title">Thêm dịch vụ</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Dịch vụ</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên dịch vụ </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_services) && is_array($result_services) && count($result_services) > 0) {
                                    $i = 1;
                                    foreach ($result_services as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['SERVICE_NAME']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=update_service&id='. $item['SERVICE_ID'] .'">Sửa</a>
                                        <a class="btn btn-secondary" href="index.php?content=detail_service&id='. $item['SERVICE_ID'] .'">Chi tiết</a>
                                        <a class="btn btn-danger" href="index.php?content=del_service&id='. $item['SERVICE_ID'] .'">Xóa</a></td>';
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