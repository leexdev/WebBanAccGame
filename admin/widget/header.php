<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
$card_count = $db->fetch_row("SELECT COUNT(*) FROM `history_card` WHERE `status` = '0' LIMIT 1"); // yêu cầu gạch thẻ
$rd_count = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' LIMIT 1");
$lq_count = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0' AND `type_account` = 'Liên Quân Mobile' LIMIT 1");
$pubg_count = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0' AND `type_account` = 'PUBG Mobile' LIMIT 1");
$ff_count = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0' AND `type_account` = 'Free Fire' LIMIT 1");
$wheel_count = $db->fetch_row("SELECT COUNT(*) FROM `wheel` WHERE `status` = '0'  AND `iduser` != '' LIMIT 1");
$dff_count = $db->fetch_row("SELECT COUNT(*) FROM `history_dff` WHERE `status` = '0' LIMIT 1");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Bảng điều khiển</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/admin/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="/admin/assets/css/paper-dashboard.css" rel="stylesheet"/>
    <link href="/admin/assets/css/bootstrap-multiselect.css" rel="stylesheet" type='text/css'> 

    <link href="/admin/assets/img/oficcial-512.png" rel="shortcut icon" type="image/x-icon">
    <!--page list-->
    <link href="/admin/assets/css/html_list.css" rel="stylesheet"/>
    
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="/admin/assets/css/demo.css" rel="stylesheet" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    
    <link rel="stylesheet" id="css-main" href="/admin/assets/css/style.css">
    <!--  Fonts and icons     -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="/admin/assets/css/themify-icons.css" rel="stylesheet">
    
    <link href="/admin/assets/css/sweetalert.css" rel="stylesheet" type="text/css">
    <script src="/admin/assets/js/sweetalert.min.js"></script>
    <!--js form-->
    <script src="/admin/assets/js/jquery.form.js"></script>
    <script src="/admin/assets/js/jquery.min.js"></script>
    <script src="/admin/assets/js/jquery.validate.js"></script>
    <script src="/admin/assets/js/function.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="/" class="simple-text">
                    <i class="ti-home"></i> VỀ SHOP
                </a>
            </div>

            <ul class="nav">
                <li class="<?php echo (isset($active) && $active == "main") ? 'active':''; ?>">
                    <a href="/admin">
                        <i class="ti-panel"></i>
                        <p>Thống kê</p>
                    </a>
                </li>
               
                <li  class="<?php echo (isset($active) && $active == "free-fire") ? 'active':''; ?>">
                    <a href="/admin/free-fire">
                        <i class="ti-package"></i>
                        <p>Free Fire <?php if($ff_count != 0){echo '<span class="label label-danger">'.$ff_count.'</span>';}?></p>
                    </a>
                </li>
                <li  class="<?php echo (isset($active) && $active == "random") ? 'active':''; ?>">
                    <a href="/admin/random">
                        <i class="ti-reload"></i>
                        <p>Random <?php if($rd_count != 0){echo '<span class="label label-danger">'.$rd_count.'</span>';}?></p>
                    </a>
                </li>
                <li  class="<?=$active == "wheel" ? 'active':''; ?>">
                    <a href="/admin/wheel">
                        <i class="ti-help-alt"></i>
                        <p>Vòng Quay <?='<span class="label label-danger">'.number_format($wheel_count).'</span>';?></p>
                    </a>
                </li>
                <li  class="<?php echo (isset($active) && $active == "rut-kc-ff") ? 'active':''; ?>">
                    <a href="/admin/rut-kc-ff">
                        <i class="ti-file"></i>
                        <p>Rút Kim Cương <?php if($dff_count != 0){echo '<span class="label label-danger">'.$dff_count.'</span>';}?></p>
                    </a>
                </li>
                <li  class="<?php echo (isset($active) && $active == "card_cham") ? 'active':''; ?>">
                    <a href="/admin/card_cham">
                        <i class="ti-file"></i>
                        <p>Duyệt nạp thẻ <?php if($card_count != 0){echo '<span class="label label-danger">'.$card_count.'</span>';}?></p>
                    </a>
                </li>
                <li class="<?php echo (isset($active) && $active == "member" || $active == "edit_member") ? 'active':''; ?>">
                    <a href="/admin/member">
                        <i class="ti-user"></i>
                        <p>Thành Viên</p>
                    </a>
                </li>
                <li class="<?php echo (isset($active) && $active == "setting_general") ? 'active':''; ?>">
                    <a href="/admin/setting_general">
                        <i class="ti-settings"></i>
                        <p>Cài đặt chung</p>
                    </a>
                </li>
                <li class="<?php echo (isset($active) && $active == "setting_other") ? 'active':''; ?>">
                    <a href="/admin/setting_other">
                        <i class="ti-settings"></i>
                        <p>Cài đặt khác</p>
                    </a>
                </li>
                <li>
                    <a onclick="reset_top();">
                        <i class="ti-reload"></i>
                        <p>Reset Top Nạp</p>
                    </a>
                </li>
                        
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Bảng điều khiển</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                    </ul>

                </div>
            </div>
        </nav>
