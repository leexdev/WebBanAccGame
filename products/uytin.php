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
                    <li role="presentation" class="active"><a role="tab" data-toggle="tab" aria-expanded="false">RÚT KIM CƯƠNG FREE FIRE</a></li>
                </ul>
                <div class="sa-logtct tab-content">
                    <div role="tabpanel" class="tab-pane active">
                        <div class="row">
                            
                        <div class="col-md-4 col-md-offset-4">
                            <div class="sa-proportion">
                                <div class="sa-ls-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <td>BẠN CÓ <span style="color:#ffed00;"><?=$accounts['diamon_ff'];?></span> KIM CƯƠNG</td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                            <div class="col-md-4 col-md-offset-4">
                                    <form id="rut_kc_ff_luauytin" novalidate="novalidate">
                                        <ul>
                                            <li class="sa-logse">
                                                <select name="soluong" id="soluong" class="form-control">
                                                    <option value="" style="display: none;">Gói kim cương</option>
                                        
                        		                    <option value="1">1.900 Kim Cương</option>
                                                    <option value="2">2.900 Kim Cương</option>
                        		                    <option value="3">5.200 Kim Cương</option>
                        		                    <option value="4">6.300 Kim Cương</option>
                        		                    <option value="5">10.000 Kim Cương</option>
                                                </select>
                                            </li>
                                            <li class="sa-lichek"><input type="number" name="id_ingame" id="id_ingame" class="form-control" placeholder="Nhập ID Ingame"></li>
                                            <li class="sa-librow clearfix">
                                                <span><button type="submit" class="sa-lib-dk btn btn-danger">RÚT NGAY <i class="fa fa-spinner fa-spin" id="loading" style="color:white;display: none;"></i></button></span>
                                                <span><button type="reset" class="sa-lib-del btn btn-default">NHẬP LẠI</button></span>
                                            </li>
                                        </ul>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                <div class="sa-lsnmain clearfix" style="margin-top: 40px;">
                    <h1 class="sa-ls-tit">Lịch sử giao dịch</h1>
                    <div class="sa-ls-table table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã yêu cầu</td>
                                    <td>ID Ingame</td>
                                    <td>Số kim cương</td>
                                    <td>Thời gian</td>
                                    <td>Trạng thái</td>
                                </tr>
                            </thead>
                            <tbody class="list"></tbody>
                        </table>
                    </div>
                </div>




        </div>
    </div>
</div>
<script>
    page = 1;
           function load_page(){
                $.post("/assets/ajax/pages/history_dff.php", { page : page })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }
load_page();
</script>