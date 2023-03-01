<?php
/*

*/
$get_info = new Info; 
?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <?php
                $result = $db->fetch_row("SELECT COUNT(*) FROM `history_buy` WHERE `id_products` != '0' AND `date` = '{$date_now}'",1);
                $total = $db->fetch_row("SELECT SUM(price) FROM `history_buy` WHERE `id_products` != '0' AND `date` = '{$date_now}'",1);                
                ?>    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mua tài khoản</h4>
                                <p class="category">Doanh thu trong hôm nay là <b class="text-danger"><?php echo number_format($total, 0, '.', '.'); ?><sup>đ</sup></b></p>
                            </div>
                            <div class="content">
                                <table class="table table-striped">
                                        <thead>
                                          <th>Mã số</th>
                                        <th>Người mua</th>
                                        <th>Giá tiền</th>
                                        <th>Thời gian</th>
                                      </thead>
                                      <tbody>
                                        <?php
                                        if ($result == 0){?>
                                            <tr><td colspan="4" class="text-center">Hôm nay chưa có giao dịch</td></tr>
                                      <?php }else{
                                      // kết thúc phân trang
                                      $list_card = $db->fetch_assoc("SELECT * FROM `history_buy` WHERE `id_products` != '0' AND `date` = '{$date_now}' ORDER BY `time` DESC LIMIT 5",0);
                                      foreach ($list_card as $item) {
                                      ?>                                        
                                          <tr>
                                            <td><?php echo $item["id_products"]; ?></td>
                                            <td><?php echo $item["name"]; ?></td>
                                            <td><?php echo number_format($item['price'], 0, '.', '.'); ?>đ</td>
                                            <td><?php echo date("d-m-Y H:i:s",$item["time"]); ?></td>
                                          </tr>
                                      <?php 
                                        }
                                      }
                                      ?>
                                      </tbody>
                                  </table>
                                    
                                    <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <a href="/admin/buy"><i class="ti-angle-right"></i> Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                $result = $db->fetch_row("SELECT COUNT(*) FROM `history_card` WHERE `status` = '1' AND `date` = '{$date_now}'",1);
                $total = $db->fetch_row("SELECT SUM(count_card) FROM `history_card` WHERE `status` = '1' AND `date` = '{$date_now}'",1);                
                ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Nạp thẻ</h4>
                                <p class="category">Doanh thu trong hôm nay là <b class="text-danger"><?php echo number_format($total, 0, '.', '.'); ?><sup>đ</sup></b></p>
                            </div>
                            <div class="content">
                        <div class="table-responsive"><table class="table table-striped">
                                        <thead>
                                          <th>Tên</th>
                                        <th>Loại thẻ</th>
                                        <th>Mệnh giá</th>
                                        <th>Thời gian</th>
                                      </thead>
                                      <tbody>
                                        <?php
                                      if ($result == 0){
                                      ?>
                                      <tr><td colspan="4" class="text-center">Hôm nay chưa có giao dịch</td></tr>
                                      <?php
                                      }else{
                                      // kết thúc phân trang
                                      $list_card = $db->fetch_assoc("SELECT * FROM `history_card` WHERE `status` = '1' AND `date` = '{$date_now}' ORDER BY `time` DESC LIMIT 5",0);
                                      foreach ($list_card as $item) {
                                      ?>                                        
                                          <tr>
                                            <td><?php echo $item["name"]; ?></td>
                                            <td><?php echo $get_info->get_string_card($item["type_card"]); ?></td>
                                            <td><?php echo number_format($item['count_card'], 0, '.', '.'); ?>đ</td>
                                            <td><?php echo $item["time"]; ?></td>
                                          </tr>
                                      <?php 
                                        }
                                      }
                                      ?>
                                      </tbody>
                                  </table></div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <a href="/admin/topup"><i class="ti-angle-right"></i> Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">


                <?php
                $result = $db->fetch_row("SELECT COUNT(*) FROM `history_wheel` WHERE `date` = '{$date_now}'",1);              
                ?>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Vòng quay</h4>
                                <p class="category">Số lượt quay hôm nay là <b class="text-danger"><?=number_format($result, 0, '.', '.'); ?></b></p>
                            </div>
                            <div class="content">
                        <div class="table-responsive"><table class="table table-striped">
                                      <thead>
                                          <th>Tên</th>
                                          <th>Phần thưởng</th>
                                          <th>Thời gian</th>
                                      </thead>
                                      <tbody>
                                        <?php
                                      if ($result == 0){
                                      ?>
                                      <tr><td colspan="4" class="text-center">Hôm nay chưa có giao dịch</td></tr>
                                      <?php
                                      }else{
                                      // kết thúc phân trang
                                      $list_card = $db->fetch_assoc("SELECT * FROM `history_wheel` WHERE `date` = '{$date_now}' ORDER BY `time` DESC LIMIT 5",0);
                                      foreach ($list_card as $item) {
                                      ?>                                        
                                          <tr>
                                            <td><?=$item["name"]; ?></td>
                                            <td><?=$item["prize"]; ?></td>
                                            <td><?=$item["time"]; ?></td>
                                          </tr>
                                      <?php 
                                        }
                                      }
                                      ?>
                                      </tbody>
                                  </table></div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <a href="/admin/wheel_log"><i class="ti-angle-right"></i> Xem tất cả</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
