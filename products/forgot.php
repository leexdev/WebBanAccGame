<?php
?>
<div class="sa-mainsa">
    <div class="container">
            <div class="sa-logmain sa-themain">
            <div class="sa-charingbox">
                <ul class="sa-lognav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#forgot" role="tab" data-toggle="tab" aria-expanded="false">QUÊN MẬT KHẨU</a></li>
                </ul>
                <div class="sa-logtct tab-content">
                    <div role="tabpanel" class="tab-pane active" id="forgot">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                    <form id="forgot_ajax" novalidate="novalidate">
                                        <ul>
                                            <li class="sa-lichek"><input type="text" name="username_forgot" id="username_forgot" class="form-control" placeholder="Nhập tài khoản"></li>
                                            <li class="sa-lichek"><input type="email" name="email_forgot" id="email_forgot" class="form-control" placeholder="Nhập email kết nối"></li>
                                            <li class="sa-lichek"><input type="text" name="phone_forgot" id="phone_forgot" class="form-control" placeholder="Nhập số điện thoại"></li>
                                            <li><button type="submit" class="sa-lib-dk btn btn-danger" id="forgot">LẤY LẠI MẬT KHẨU <i class="fa fa-spinner fa-spin" id="loading_forgot" style="color:white;display: none;"></i></button></li>
                                        </ul>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>