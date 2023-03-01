<?php
$type = GET('type');
if($accounts['password'] == ''){$type = 'password';}
if($type != 'email' && $type != 'phone' && $type != 'password'){$type = '';}
?>
<!-- END: HEADER -->
<div class="c-layout-page">
	<!-- BEGIN: PAGE CONTENT -->
		<div class="c-layout-page">
		<!-- BEGIN: PAGE CONTENT -->
		<div class="m-t-20 visible-sm visible-xs"></div>


<div class="container c-size-md ">
	<div class="col-md-12">
		<div class="text-center">
			<center>
				<h2 class="c-font-bold c-font-28">ID Của Bạn: <?=$accounts['id'];?></h2>
			</center>

		</div>

	</div>
</div>
		<div class="c-layout-page" style="margin-top: 20px;">
			<div class="container">
				<div class="c-layout-sidebar-menu c-theme ">
                    	<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
			<!-- BEGIN: LAYOUT/SIDEBARS/SHOP-SIDEBAR-DASHBOARD -->
			<div class="c-content-title-3 c-title-md c-theme-border">
				<h3 class="c-left c-font-uppercase">Menu tài khoản</h3>
				<div class="c-line c-dot c-dot-left "></div>
			</div>

			<div class="c-content-ver-nav">
				<ul class="c-menu c-arrow-dot c-square c-theme">
					<li><a href="/user/profile" class="active">Thông tin tài khoản</a></li>
				</ul>
			</div>
		</div>

		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15">
			<div class="c-content-title-3 c-title-md c-theme-border">
				<h3 class="c-left c-font-uppercase">Menu giao dịch</h3>
				<div class="c-line c-dot c-dot-left "></div>
			</div>
			<div class="c-content-ver-nav m-b-20">
				<ul class="c-menu c-arrow-dot c-square c-theme">
					<li><a href="/recharge.html" class=""><b>Nạp thẻ tự động</b></a></li>
					<li><a href="/rut-kim-cuong-free-fire.html" class="">Rút kim cương</a></li>
					<li><a href="/history/recharge.html" class="">Thẻ cào đã nạp</a></li>
					<li><a href="/history/buy.html" class="">Tài khoản đã mua</a></li>
					
				</ul>
			</div>
		</div>
	</div>                </div>				<div class="c-layout-sidebar-content ">
					<!-- BEGIN: PAGE CONTENT -->
					<!-- BEGIN: CONTENT/SHOPS/SHOP-CUSTOMER-DASHBOARD-1 -->
					<div class="c-content-title-1">
						<h3 class="c-font-uppercase c-font-bold">Thông tin tài khoản</h3>
						<div class="c-line-left"></div>
					</div>
					<table class="table table-striped">
						<tbody>
						   
						<tr>
							<th scope="row">Tên tài khoản:</th>
							<th><?=$accounts['username'];?></th>
						</tr>
						<tr>
							<th scope="row">Số dư tài khoản:</th>
							<td><b class="text-danger"><?=number_format($accounts['cash'])?> đ</b></td>
						</tr>
						<tr>
							<th scope="row">Số dư kim cương:</th>
							<td><b class="text-danger"><?=number_format($accounts['diamon_ff'])?> kim cương</b></td>
						</tr>
						
						</tbody></table>
					<!-- END: PAGE CONTENT -->
				</div>
			</div>
		</div>