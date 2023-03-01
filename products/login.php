<?php
?>
<div class="sa-mainsa">
    <div class="container">
            <div class="sa-logmain sa-themain">
            <div class="sa-charingbox">
                <ul class="sa-lognav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab" aria-expanded="true">ĐĂNG NHẬP</a></li>
                    <li role="presentation"><a href="#register" role="tab" data-toggle="tab" aria-expanded="false">ĐĂNG KÝ</a></li>
                </ul>
                <div class="sa-logtct tab-content">
                    <div role="tabpanel" class="tab-pane active" id="login">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                    <form id="login_ajax" novalidate="novalidate">
                                        <ul>                           
                                            <li class="sa-lichek"><input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản"></li>
                                            <li class="sa-lichek"><input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu"></li>
                                            <li><button type="submit" id="login" class="sa-lib-dk btn btn-danger">ĐĂNG NHẬP <i class="fa fa-spinner fa-spin" id="loading_login" style="color:white;display: none;"></i></button></li>
                                        
                                           <!-- <li style="text-align: center;">HOẶC</li>
                                            <li><a href="/login-facebook.html" class="sa-lib-dk btn btn-default" style="background: -webkit-linear-gradient(bottom, #3b5998 0%, #3b5998 100%);">ĐĂNG NHẬP FACEBOOK <i class="fa fa-facebook"></i></a></li> -->
                                        
                                            <li style="text-align: center;"><a href="/forgot.html">Quên mật khẩu ?</a></li>
                                        </ul>
                                    </form>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="register">
                        <div class="row">
                            <div class="col-md-4 col-md-offset-4">
                                    <form id="register_ajax" novalidate="novalidate">
                                        <ul>
                                            <li class="sa-lichek"><input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ và tên"></li>
                                            <li class="sa-lichek"><input type="text" name="username" id="username" class="form-control" placeholder="Nhập tài khoản"></li>
                                            <li class="sa-lichek"><input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu"></li>
                                            <li class="sa-lichek"><input type="password" name="repassword" id="repassword" class="form-control" placeholder="Nhập lại mật khẩu"></li>
                                            <li><button type="submit" class="sa-lib-dk btn btn-danger" id="register">ĐĂNG KÝ <i class="fa fa-spinner fa-spin" id="loading_reg" style="color:white;display: none;"></i></button></li>
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