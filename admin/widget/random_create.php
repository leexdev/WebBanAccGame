<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
?>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <form id="create_random" action="" enctype ="multipart/form-data" method="POST">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Đăng <b class="count_rd"></b> tài khoản random</h4><br/>
                                      <select class="form-control border-input" name="type">
                                     
                                        <option value="6">Free Fire <?=$settings['rd_6']*0.001;?>K</option>
                                        <option value="7">Free Fire <?=$settings['rd_7']*0.001;?>K</option>
                                        <option value="8">Free Fire <?=$settings['rd_8']*0.001;?>K</option>
                                        <option value="9">Free Fire <?=$settings['rd_9']*0.001;?>K</option>
                                     
                                      </select>
                              <hr/>
                            </div>
                            <div class="content">                                
                            <div class="random">
                            
                            <div class="row">
                             <div class="col-sm-5 col-xs-5">
                              <div class="form-group">
                                <label for="username">Tên đăng nhập:</label>
                                <input type="text" class="form-control border-input" name="username[]" placeholder="Tên đăng nhập">
                              </div></div>
                             <div class="col-sm-5 col-xs-5">
                              <div class="form-group">
                                <label for="password">Mật khẩu:</label>
                                <input type="text" class="form-control border-input" name="password[]" placeholder="Mật khẩu">
                              </div></div>   
                            <div class="col-sm-2 col-xs-2">
                              <div class="form-group">
                                <label><br/></label>
                                <button id="submit" class="form-control btn btn-info add_button active"><i class="fa fa-plus-circle" style="font-size: 150%;"></i> THÊM</button>
                              </div></div>
                            </div>        
                            </div>         
                            </div>
                            <div class="footer"><hr>
                                <button id="submit" type="submit" class="btn btn-success"><i class="fa fa-pencil-square-o"></i> ĐĂNG</button>
                            </div><br/>
                            </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

