<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
?>
<script>
page = 1;
name = '';
username="";
phone = "";
email = "";
</script>

<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12"><div class="card"><div class="content">
        <div class="row">
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control border-input" placeholder="Nhập name">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="text" id="username" name="username" class="form-control border-input" placeholder="Nhập username">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control border-input" placeholder="Nhập email">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" id="phone" name="phone" class="form-control border-input" placeholder="Nhập số điện thoại">
                    <span class="input-group-btn">
                        <button class="btn btn-secondary search" type="submit" onclick="fitler();">Tìm</button>
                    </span>
                </div>
            </div>
        </div>
        </div></div></div>
        
        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title"><center style="font-weight:bold;">DANH SÁCH THÀNH VIÊN</center></h4>
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
                $.post("/admin/assets/ajax/pages/member.php", { page : page , username : username , name : name , phone : phone , email : email})
                .done(function(data) {
                    $(".list").html('');
                    $('.list').empty().append(data);
                    $(".list").show();   
                }); 
            }

            function fitler(){
                name = $("#name").val();
                username = $("#username").val();
                phone = $("#phone").val();
                email = $("#email").val();
                load_list();                                              
            }

load_list();
</script>
