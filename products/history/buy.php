
	<!-- BEGIN: PAGE CONTENT -->
	


			<div class="container">
            
			    
				
	<div class="">	<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
<div class="c-layout-sidebar-content ">
 		<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">TÀI KHOẢN ĐÃ MUA</h3>
					<div class="c-line-left"></div>
				</div>
				<form class="form-horizontal form-find m-b-20" role="form" method="get">

					<div class="row">
					    
                        <div class="col-md-4">
                            <div class="input-group m-b-10 c-square ">
                                <span class="input-group-addon" id="basic-addon1">Thẻ cào</span>
                                <input type="text" class="form-control c-square c-theme" name="find" value=""
                                       autofocus placeholder="Mã thẻ,Serial...">
                            </div>
                        </div>

						<div class="col-md-4">
							<div class="input-group m-b-10 c-square">
								<span class="input-group-addon" id="basic-addon1">Loại thẻ</span>

								<select id="group_id" name="tel" class="form-control c-square c-theme">
									<option value="">-- Tất cả --</option>
                                    									</select>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group m-b-10 c-square">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
									 data-rtl="false">
                                    <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
												class="fa fa-calendar"></i></button>
                                    </span>
									<input type="text" class="form-control c-square c-theme" name="started_at"
										   autocomplete="off"  placeholder="Từ ngày" value="">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="input-group m-b-10 c-square">
								<div class="input-group date date-picker" data-date-format="dd/mm/yyyy"
									 data-rtl="false">
                                    <span class="input-group-btn">
                                    <button class="btn default c-btn-square p-l-10 p-r-10" type="button"><i
												class="fa fa-calendar"></i></button>
                                    </span>
									<input type="text" class="form-control c-square c-theme" name="ended_at"
										   autocomplete="off"  placeholder="Đến ngày" value="">
								</div>
							</div>

						</div>
					</div>

					<div class="row">
						<div class="col-md-4">
							<input type="submit" class="btn c-theme-btn c-btn-square m-b-10" value="Tìm kiếm">
							<a class="btn c-btn-square m-b-10 btn-danger" href="https://acclienquan24h.vn/deposit-history">Tất cả</a>
						</div>
					</div>


			</form>
				<table class="table table-hover table-custom-res">
					<tbody>
                    <tr>
                      <th>ID ACC</th>
                                    <th>Loại</th>
                                    <th>Tài khoản</th>
                                    <th>Mật khẩu</th>
                                    <th>Giá</th>
                                    <th>Ngày mua</th>
                    </tr>
                            </thead>
                            <tbody class="list"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    page = 1;
           function load_page(){
                $.post("/assets/ajax/pages/history_buy.php", { page : page })
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }
            function search(){
                id = $("#id").val();
                load_page();                                                                                                                                          
            }
load_page();
</script>