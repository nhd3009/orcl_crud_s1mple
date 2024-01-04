<div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-houzz-box menu-icon"></i>
                </span> Nhà cung cấp
              </h3>
              <a class="btn btn-success" href="index.php?content=add_supplier">
                <span class="menu-title">Thêm nhà cung cấp</span>
                <i class="mdi mdi-database-plus menu-icon"></i>
              </a>
            </div>
            <div class="row">
              <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nhà cung cấp</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th> STT </th>
                            <th> Tên nhà cung cấp </th>
                            <th> Số điện thoại </th>
                            <th> Hành động </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (isset($result_suppliers) && is_array($result_suppliers) && count($result_suppliers) > 0) {
                                    $i = 1;
                                    foreach ($result_suppliers as $item) {
                                        echo "<tr>\n";
                                        echo "<td>$i</td>";
                                        echo "<td>{$item['SUPPLIER_NAME']}</td>";
                                        echo "<td>{$item['CONTACT_NUMBER']}</td>";
                                        echo '<td><a class="btn btn-primary" href="index.php?content=update_supplier&id='. $item['SUPPLIER_ID'] .'">Sửa</a>
                                        <a class="btn btn-danger" href="index.php?content=del_supplier&id='. $item['SUPPLIER_ID'] .'">Xóa</a></td>';
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