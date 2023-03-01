<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/admin/assets/ajax/systems/create_random_file.php');
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <form action="" enctype ="multipart/form-data" method="POST">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Đăng <b class="count_rd"></b> tài khoản random</h4><br/>
                                <div class="row">
                                    <div class="col-sm-6">
                                      <select class="form-control border-input" name="type">
                                        <option value="1">Thường <?=$settings['rd_1']*0.001;?>K</option>
                                        <option value="2">Trung Cấp <?=$settings['rd_2']*0.001;?>K</option>
                                        <option value="3">Cao Cấp <?=$settings['rd_3']*0.001;?>K</option>
                                        <option value="4">Siêu Cấp <?=$settings['rd_4']*0.001;?>K</option>
                                        <option value="5">VIP <?=$settings['rd_5']*0.001;?>K</option>
                                        <option value="6">Free Fire <?=$settings['rd_6']*0.001;?>K</option>
                                        <option value="7">Free Fire <?=$settings['rd_7']*0.001;?>K</option>
                                        <option value="8">Free Fire <?=$settings['rd_8']*0.001;?>K</option>
                                        <option value="9">Free Fire <?=$settings['rd_9']*0.001;?>K</option>
                                        <option value="10">Kim Cương FF <?=$settings['rd_10']*0.001;?>K</option>
                                        <option value="11">Kim Cương FF <?=$settings['rd_11']*0.001;?>K</option>
                                      </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" class="form-control border-input" name="file_acc">
                                    </div>
                                </div>
                                <br/>
                                <div class="footer">
                                    <button id="submit" type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> ĐĂNG</button>
                                </div><br/>
                            </div>
                    </form>
                    <blockquote class="blockquote">
                                  <p>* Chỉ hỗ trợ file text dạng tk|mk</p>
                    </blockquote>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

