<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/monkamtv        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
?>
<script>
page = 1;
username_s = id_acc = type_s = "";
</script>
<div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12"><div class="card"><div class="content">
                    <div class="btn-group btn-group-justified">
                        <a href="/admin/random_create" class="btn btn-success">Đăng tài khoản mới</a>
                        <a href="/admin/random_create_file" class="btn btn-success">Đăng tài khoản file</a>
                    </div>
                </div></div></div>

                <div class="col-md-12">
                <div class="card">
                <div class="header">
                    <h4 class="title">Tìm kiếm dữ liệu</h4>
                </div>    
                <div class="content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select class="form-control border-input" id="type_s" name="type_s">
                                        <option value="">Tất cả</option>
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
                    </div>   
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="text" id="username_s" name="username_s" class="form-control border-input" placeholder="Nhập tài khoản">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group">
                        <input type="text" id="id_acc" name="id_acc" class="form-control border-input" placeholder="Nhập ID tài khoản">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary search" type="submit" onclick="fitler();">Tìm</button>
                        </span>
                        </div>
                    </div>    
                
                </div>    
                </div>
                </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title"><center style="font-weight:bold;">TÀI KHOẢN RANDOM</center></h4>
                        </div>
                        <div class="content">
                             <div style="display: block;" class="list"></div>        
                        </div>
                    </div>
                </div>
                </div>
            </div>
</div>
    

<script>
           function load_list(){
                $(".list").hide();
                $.post("/admin/assets/ajax/products/random-lq.php", { page : page , username_s : username_s , id_acc : id_acc , type_s : type_s})
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }
            function fitler(){
                username_s = $("#username_s").val();
                id_acc = $("#id_acc").val();
                type_s = $("#type_s").val();
                load_list();                                              
            }

load_list();
</script>