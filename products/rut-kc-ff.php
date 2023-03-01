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
                                           <div class="text-center">
                    <center>
                        <h2 class="c-font-22 c-font-red">Số Kim Cương hiện có: <b><span><b><?=number_format($accounts['diamon_ff'])?></span></b></h2>
                    </center>

                </div>
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
 <div class="" style="margin: 35px 0px;border: 1px solid #cccccc;padding: 15px">
                    <p><span style="color:#e74c3c"><strong>Lưu ý:</strong></span></p>
            <p>Nhập đúng id của bạn! Nhập sai id sẽ không nhận được kc</p>

                </div>
                <!-- END: PAGE CONTENT -->

                <div class="text-center" style="margin: 15px 0">
                    <h2 >Lịch Sử Rút</h2>
                </div>
                
                    <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		             <thead>
		               <tr>
		                <th>Mã</th>
		                 <th>Id</th>
		                 <th>Kim Cương</th>
		                 <th>Thời gian</th>
		                  <th>Trạng thái</th>
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