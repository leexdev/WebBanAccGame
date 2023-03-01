<?php
$auto_card_1 = $db->fetch_assoc("SELECT * FROM auto_card WHERE id = '1'", 1);
$auto_card_2 = $db->fetch_assoc("SELECT * FROM auto_card WHERE id = '2'", 1);
$ck_card_1 = $db->fetch_assoc("SELECT * FROM ck_card WHERE id = '1'", 1);
$ck_card_2 = $db->fetch_assoc("SELECT * FROM ck_card WHERE id = '2'", 1);
?>

<div class="sa-mainsa">
    <div class="container">
            <div class="sa-logmain sa-themain">
            <div class="sa-charingbox">
                <ul class="sa-lognav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#nap-the" role="tab" data-toggle="tab" aria-expanded="false">NẠP THẺ</a></li>
                    <li role="presentation" class=""><a href="#tile" role="tab" data-toggle="tab" aria-expanded="false">TỈ LỆ NẠP</a></li>
                </ul>
                <div class="sa-logtct tab-content">
                    <div role="tabpanel" class="tab-pane active" id="nap-the">
                        <div class="row">
                            
                        <div class="col-md-4 col-md-offset-4">
                            <div class="sa-proportion">
                                <div class="sa-ls-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>CHÚ Ý CHỌN ĐÚNG MỆNH GIÁ THẺ KHÔNG MẤT THẺ NHÉ AE,THỜI GIAN CHỜ DUYỆT LÀ 10-20P AE KIÊN NHẪN NHÉ!</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4 col-md-offset-4">
                                    <form id="card_charing_ajax" novalidate="novalidate">
                                        <ul>
                                            <li class="sa-logse">
                                                <select name="card_type_id" id="card_type_id" class="form-control">
                                                    <option value="" style="display: none;">Chọn loại thẻ</option>
                        		                <?php if($auto_card_1['1'] == "on"):?>
                                                    <option value="1">Viettel  ( AUTO )</option>
                                                <?php endif;?>
                                                <?php if($auto_card_1['2'] == "on"):?>
                                                    <option value="2">Mobifone ( AUTO )</option>
                                                <?php endif;?>
                                                <?php if($auto_card_1['3'] == "on"):?>
                                                    <option value="3">Vinaphone ( AUTO )</option>
                                                <?php endif;?>
                                                <?php if($auto_card_2['1'] == "on"):?>
                                                    <option value="11">Viettel )</option>
                                                <?php endif;?>
                                                <?php if($auto_card_2['2'] == "on"):?>
                                                    <option value="12">Mobifone </option>
                                                <?php endif;?>
                                                <?php if($auto_card_2['3'] == "on"):?>
                                                    <option value="13">Vinaphone </option>
                                                <?php endif;?>
                                                </select>
                                            </li>
                                                <p style="color:red">Chọn sai mệnh giá sẽ mất thẻ</p>
                                                <li class="sa-logse">
                                                <select name="price_guest" id="price_guest" class="form-control">
                                                    <option value="" style="display: none;">Mệnh giá</option>
                        		                    <option value="10000">10.000</option>
                                                    <option value="30000">30.000</option>
                        		                    <option value="20000">20.000</option>
                        		                    <option value="50000">50.000</option>
                        		                    <option value="100000">100.000</option>
                                                    <option value="300000">300.000</option>
                        		                    <option value="200000">200.000</option>
                        		                    <option value="500000">500.000</option>
                                                      <option value="1000000">1.000.000</option>
                                                </select>
                                            </li>
                                            <li class="sa-lichek"><input type="text" name="seri" id="seri" class="form-control" placeholder="Nhập serial thẻ"></li>
                                            <li class="sa-lichek"><input type="text" name="pin" id="pin" class="form-control" placeholder="Nhập mã thẻ"></li>
                                            <li class="sa-librow clearfix">
                                                <span><button type="submit" class="sa-lib-dk btn btn-danger">NẠP THẺ <i class="fa fa-spinner fa-spin" id="loading" style="color:white;display: none;"></i></button></span>
                                                <span><button type="reset" class="sa-lib-del btn btn-default">NHẬP LẠI</button></span>
                                            </li>
                                        </ul>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="tile">
                        
                        <div class="sa-hdnap">
                            <div class="sa-hdnapmain clearfix">
                                <table class="table table-bordered">
                                <thead>            
                                    <tr>
                                        <th class="text-center">Nhà mạng</th>
                                        <th class="text-center">Nạp auto</th>
                                        <th class="text-center">Nạp chậm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">Viettel</td>
                                        <td class="text-center"><?php echo ($auto_card_1['1'] != "on") ? '<span style="color:red;">Bảo trì</span>':$ck_card_1['1']."%"; ?></td>
                                        <td class="text-center"><?php echo ($auto_card_2['1'] != "on") ? '<span style="color:red;">Bảo trì</span>':$ck_card_2['1']."%"; ?></td>
                                    </tr> 
                                    <tr>
                                        <td class="text-center">Mobifone</td>
                                        <td class="text-center"><?php echo ($auto_card_1['2'] != "on") ? '<span style="color:red;">Bảo trì</span>':$ck_card_1['2']."%"; ?></td>
                                        <td class="text-center"><?php echo ($auto_card_2['2'] != "on") ? '<span style="color:red;">Bảo trì</span>':$ck_card_2['2']."%"; ?></td>
                                    </tr> 
                                    <tr>
                                        <td class="text-center">Vinaphone</td>
                                        <td class="text-center"><?php echo ($auto_card_1['3'] != "on") ? '<span style="color:red;">Bảo trì</span>':$ck_card_1['3']."%"; ?></td>
                                        <td class="text-center"><?php echo ($auto_card_2['3'] != "on") ? '<span style="color:red;">Bảo trì</span>':$ck_card_2['3']."%"; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>