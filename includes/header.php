<?php
    $id = !empty(GET('id')) ? (int)GET('id') : 0; 
    $info = new Info;
    $meta = '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    $meta .= '<meta property="og:locale" content="vi_VN" />';
    $meta .= '<meta property="og:image" content="'.$info->get_thumb($id).'" />';
    $meta .= '<link rel="alternate" hreflang="x-default" href="'.$_DOMAIN.'" />';
    $meta .= '<meta property="fb:app_id" content="768874526617452" />';
    $sql_products = "SELECT id, note, price, type_account, status, skins_count,champs_count FROM products WHERE id = '$id' LIMIT 1";
    if($db->num_rows($sql_products) > 0){
    $post_info = $db->fetch_assoc($sql_products, 1);
    $meta .= '<meta property="og:type" content="product" />';
    $meta .= '<meta property="og:title" content="Tài khoản '.$post_info["type_account"].' #'.$id.' | '.$settings['title'].'" />';
    $settings['title'] = 'Tài khoản '.$post_info["type_account"].'  #'.$id.' | '.$settings['title'];
    $meta .= '<meta property="og:url" content="'.$_DOMAIN.'accounts/'.$id.'.html" />';
    if($post_info["type_account"] == 'Liên Quân Mobile'){
    $meta .= '<meta property="og:description" content="'.$post_info["champs_count"].' Tướng - '.$post_info["skins_count"].' Trang Phục - Giá '.number_format($post_info["price"], 0, '.', '.').'đ"/>';
    }else{
    $meta .= '<meta property="og:description" content="Giá '.number_format($post_info["price"], 0, '.', '.').'đ"/>';
    }
    }else{
        $meta .= '<meta property="og:type" content="website" />';
        $meta .= '<meta property="og:url" content="'.$_DOMAIN.'" />';
        $meta .= '<meta property="og:title" content="'.$settings['title'].'" />';
        $meta .= '<meta property="og:description" content="'.$settings['descr'].'"/>';
    }
    $now_month = getdate();
?>
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
	<link href="https://acclienquan24h.vn/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://acclienquan24h.vn/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://acclienquan24h.vn/assets/css/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN: BASE PLUGINS  -->
	<link href="https://acclienquan24h.vn/assets/css/owl.carousel.css" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	<!-- END: BASE PLUGINS -->

	<!-- BEGIN THEME STYLES -->
	<link href="https://acclienquan24h.vn/assets/home/style.css?v=0.0.2" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/bootstrap-social.css" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/components.css?v=1" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/default.css" rel="stylesheet" id="style_theme" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/custom.css" rel="stylesheet" type="text/css"/>

	<link rel="stylesheet" href="https://acclienquan24h.vn/assets/css/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="https://acclienquan24h.vn/assets/css/owl-carousel/owl.theme.css">
	<link rel="stylesheet" href="https://acclienquan24h.vn/assets/css/owl-carousel/owl.transitions.css">
	
	<script src="https://acclienquan24h.vn/assets/js/plugins/jquery-2.1.0.min.js"></script>
	<script src="https://acclienquan24h.vn/assets/js/plugins/bootstrap.min.js"></script>
	<script src="https://acclienquan24h.vn/assets/js/plugins/owl.carousel.min.js"></script>
	<script src="https://acclienquan24h.vn/assets/js/plugins/slider.js"></script>
    <script src="https://acclienquan24h.vn/assets/js/bootstrap3-typeahead.min.js"></script>
	<script src="https://acclienquan24h.vn/assets/home/swiper.js"></script>
	<script src="https://acclienquan24h.vn/assets/home/functions.js"></script>
	<script src="https://acclienquan24h.vn/assets/js/plugins/jquery.cookie.js"></script>
	<link href="https://acclienquan24h.vn/assets/home/swiper.css?v=1" rel="stylesheet" type="text/css"/>
	<link href="https://acclienquan24h.vn/assets/css/style.css?v=6996169" rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9/dist/sweetalert2.min.css" id="theme-styles">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0, user-scalable=no" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700&amp;subset=all' rel='stylesheet' type='text/css'>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/socicon/socicon.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/bootstrap-social/bootstrap-social.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/animate/animate.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN: BASE PLUGINS  -->
	<link href="<?=$home;?>/assets/frontend/theme/assets/global/plugins/magnific/magnific.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/owl-carousel/assets/owl.carousel.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
	<!-- END: BASE PLUGINS -->
	<!-- BEGIN: PAGE STYLES -->
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
	<!-- END: PAGE STYLES -->
	<!-- BEGIN THEME STYLES -->

    <link href="<?=$home;?>/assets/frontend/home/css/style.css?v=2.1.0" rel="stylesheet" type="text/css">
	<link href="<?=$home;?>/assets/frontend/theme/assets/demos/default/css/plugins.css" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/demos/default/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/demos/default/css/themes/default.css" rel="stylesheet" id="style_theme" type="text/css"/>
	<link href="<?=$home;?>/assets/frontend/theme/assets/demos/default/css/custom.css" rel="stylesheet" type="text/css"/>
	<!-- 

	 -->
	<script src="<?=$home;?>/assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
	<script src="<?=$home;?>/assets/frontend/plugins/jquery-cookie/jquery.cookie.js"></script>
	<link href="<?=$home;?>/assets/frontend/css/style.css?v=155870123818499" rel="stylesheet" type="text/css"/>

    <link rel="stylesheet" type="text/css" href="<?=$home;?>/assets/frontend/home/css/custom.css">
    <link href="<?=$home;?>/assets/frontend/home/css/swiper.css" rel="stylesheet">

    <script src="<?=$home;?>/assets/frontend/home/sweetalert.min.js"></script>
    <link rel="stylesheet" href="<?=$home;?>/assets/frontend/home/sweetalert.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.all.min.js"></script>
	<!-- END THEME STYLES -->

 
<!DOCTYPE html>
<html lang="vi" prefix="og: http://ogp.me/ns#">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
    <title><?=$settings['title']; ?></title>
    <meta name="description" content="<?=$settings['descr']; ?>">
    <meta name="keywords" content="<?=$settings['keywords']; ?>" />
    
    <?=$meta?>
    <!-- Css -->
        <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/assets//css/jquery.mCustomScrollbar.css" rel="stylesheet" />
    <link href="/assets//css/swiper.css" rel="stylesheet" />
    <link href="/assets//css/toastr.min.css" rel="stylesheet" />
     <link rel="stylesheet" type="text/css" href="/assets/css/custom.css">
     <link href="https://shopriki.vn/assets/css/quay.css" rel="stylesheet" type="text/css"> 
    <link href="/assets//css/reset.css" rel="stylesheet" />
  
    <link href="/assets//css/site.css" rel="stylesheet" />
    <link href="/assets//css/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/assets//images/icon.png" rel="shortcut icon" type="image/x-icon">
    <link href="/assets//images/icon.png" rel="icon" type="image/x-icon">
    <!--js-->
    <script src="/assets//js/libs/jquery-1.11.2.js"></script>
    <script src="/assets//js/libs/bootstrap.js"></script>
    <script src="/assets//js/jquery.validate.min.js"></script>
    <script src="/assets//js/jquery.mousewheel.js"></script>
    <script src="/assets//js/jquery.mousewheelkc.js"></script>
    <script src="/assets//js/jquery.mCustomScrollbar.js"></script>
    <script src="/assets//js/swiper.js"></script>
    <script src="/assets//js/libs/toastr.min.js"></script>
    <script src="/assets//js/jquery.signalR-2.2.1.min.js"></script>
    <script src="/assets//js/web365.utility.js"></script>
    <script src="/assets//js/web365.main.js"></script>
    <script src="/assets//js/functions.js"></script>
    <script src="/assets//js/jquery.form.js"></script>
    <script src="/assets//js/script.js"></script>
    <script src="/assets//js/sweetalert.min.js"></script>
    <script src="/assets//js/libs/ie-emulation-modes-warning.js"></script>
    <style>
    .mt-stand {
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
    }

    .mt-element-ribbon {
        position: relative;
        margin-bottom: 30px;
    }

        .mt-element-ribbon .ribbon-content {
            margin: 0;
            padding: 25px;
            clear: both;
        }

            .mt-element-ribbon .ribbon-content.no-padding {
                padding-top: 0;
            }

        .mt-element-ribbon .ribbon {
            padding: 6px 15px;
            z-index: 5;
            float: left;
            margin: 10px 0 0 -2px;
            clear: left;
            position: relative;
            background-color: #bac3d0;
            color: #384353;
            opacity: 0.9;
        }

            .mt-element-ribbon .ribbon.ribbon-right {
                float: right;
                clear: right;
                margin: 10px -2px 0 0;
            }

            .mt-element-ribbon .ribbon.ribbon-vertical-left {
                clear: none;
                margin: -2px 0 0 10px;
                padding: 14px;
                width: 41px;
                text-align: center;
            }

            .mt-element-ribbon .ribbon.ribbon-vertical-right {
                clear: none;
                float: right;
                margin: -2px 10px 0 0;
                padding: 14px;
                width: 41px;
                text-align: center;
            }

            .mt-element-ribbon .ribbon.ribbon-shadow {
                box-shadow: 2px 2px 7px rgba(0, 0, 0, 0.4);
            }

                .mt-element-ribbon .ribbon.ribbon-shadow.ribbon-right, .mt-element-ribbon .ribbon.ribbon-shadow.ribbon-vertical-right {
                    box-shadow: -2px 2px 7px rgba(0, 0, 0, 0.4);
                }

            .mt-element-ribbon .ribbon.ribbon-round {
                border-top-right-radius: 5px !important;
                border-bottom-right-radius: 5px !important;
            }

                .mt-element-ribbon .ribbon.ribbon-round.ribbon-right {
                    border-top-right-radius: 0px !important;
                    border-bottom-right-radius: 0px !important;
                    border-top-left-radius: 5px !important;
                    border-bottom-left-radius: 5px !important;
                }

                .mt-element-ribbon .ribbon.ribbon-round.ribbon-vertical-right, .mt-element-ribbon .ribbon.ribbon-round.ribbon-vertical-left {
                    border-top-right-radius: 0px !important;
                    border-bottom-right-radius: 5px !important;
                    border-top-left-radius: 0px !important;
                    border-bottom-left-radius: 5px !important;
                }

            .mt-element-ribbon .ribbon.ribbon-border:after {
                border: 1px solid;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-vert:after {
                border-top: none;
                border-bottom: none;
                border-left: 1px solid;
                border-right: 1px solid;
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-hor:after {
                border-top: 1px solid;
                border-bottom: 1px solid;
                border-left: none;
                border-right: none;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 0;
                right: 0;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash:after {
                border: 1px solid;
                border-style: dashed;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash-vert:after {
                border-top: none;
                border-bottom: none;
                border-left: 1px solid;
                border-right: 1px solid;
                border-left-style: dashed;
                border-right-style: dashed;
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash-hor:after {
                border-top: 1px solid;
                border-bottom: 1px solid;
                border-left: none;
                border-right: none;
                border-top-style: dashed;
                border-bottom-style: dashed;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 0;
                right: 0;
            }

            .mt-element-ribbon .ribbon.ribbon-clip {
                left: -10px;
                margin-left: 0;
            }

                .mt-element-ribbon .ribbon.ribbon-clip.ribbon-right {
                    left: auto;
                    right: -10px;
                    margin-right: 0;
                }

            .mt-element-ribbon .ribbon > .ribbon-sub {
                z-index: -1;
                position: absolute;
                padding: 0;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:before, .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:after {
                    content: '';
                    position: absolute;
                    border-style: solid;
                    border-color: transparent !important;
                    bottom: -10px;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:before {
                    border-width: 0 10px 10px 0;
                    border-right-color: #222 !important;
                    left: 0;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:before, .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:after {
                    content: '';
                    position: absolute;
                    border-style: solid;
                    border-color: transparent;
                    bottom: -10px;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:before {
                    border-right-color: transparent !important;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:after {
                    border-width: 0 0 10px 10px;
                    border-left-color: #222 !important;
                    right: 0;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-bookmark:after {
                    border-left: 21px solid;
                    border-right: 20px solid;
                    border-bottom: 1em solid transparent !important;
                    bottom: -1em;
                    content: '';
                    height: 0;
                    left: 0;
                    position: absolute;
                    width: 0;
                }

            .mt-element-ribbon .ribbon:after {
                border-color: #62748f;
            }

            .mt-element-ribbon .ribbon > .ribbon-sub {
                background-color: #bac3d0;
                color: #384353;
            }

                .mt-element-ribbon .ribbon > .ribbon-sub:after {
                    border-color: #62748f;
                    border-left-color: #bac3d0;
                    border-right-color: #bac3d0;
                }

            .mt-element-ribbon .ribbon.ribbon-color-default {
                background-color: #bac3d0;
                color: #384353;
            }

                .mt-element-ribbon .ribbon.ribbon-color-default:after {
                    border-color: #9ca8bb;
                }

                .mt-element-ribbon .ribbon.ribbon-color-default > .ribbon-sub {
                    background-color: #bac3d0;
                    color: #384353;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-default > .ribbon-sub:after {
                        border-color: #62748f;
                        border-left-color: #bac3d0;
                        border-right-color: #bac3d0;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-primary {
                background-color: #337ab7;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-primary:after {
                    border-color: #286090;
                }

                .mt-element-ribbon .ribbon.ribbon-color-primary > .ribbon-sub {
                    background-color: #337ab7;
                    color: black;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-primary > .ribbon-sub:after {
                        border-color: #122b40;
                        border-left-color: #337ab7;
                        border-right-color: #337ab7;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-info {
                background-color: #659be0;
                color: #fff;
            }
            

.sa-lpmain {
    padding: 8px;
    background-color: rgba(20, 20, 20, 0.74);
}

                .mt-element-ribbon .ribbon.ribbon-color-info:after {
                    border-color: #3a80d7;
                }

                .mt-element-ribbon .ribbon.ribbon-color-info > .ribbon-sub {
                    background-color: #659be0;
                    color: #0c203a;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-info > .ribbon-sub:after {
                        border-color: #1d4f8e;
                        border-left-color: #659be0;
                        border-right-color: #659be0;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-success {
                background-color: #36c6d3;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-success:after {
                    border-color: #27a4b0;
                }

                .mt-element-ribbon .ribbon.ribbon-color-success > .ribbon-sub {
                    background-color: #36c6d3;
                    color: #020808;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-success > .ribbon-sub:after {
                        border-color: #14565c;
                        border-left-color: #36c6d3;
                        border-right-color: #36c6d3;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-danger {
                background-color: #ed6b75;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-danger:after {
                    border-color: #e73d4a;
                }

                .mt-element-ribbon .ribbon.ribbon-color-danger > .ribbon-sub {
                    background-color: #ed6b75;
                    color: #4f0a0f;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-danger > .ribbon-sub:after {
                        border-color: #a91520;
                        border-left-color: #ed6b75;
                        border-right-color: #ed6b75;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-warning {
                background-color: #F1C40F;
                color: #010100;
            }

                .mt-element-ribbon .ribbon.ribbon-color-warning:after {
                    border-color: #c29d0b;
                }

                .mt-element-ribbon .ribbon.ribbon-color-warning > .ribbon-sub {
                    background-color: #F1C40F;
                    color: #010100;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-warning > .ribbon-sub:after {
                        border-color: #614f06;
                        border-left-color: #F1C40F;
                        border-right-color: #F1C40F;
                    }

    .img-rank {
        width: 80px;
        height: 80px;
        z-index: 5;
        top: 240px;
        right: 25px;
        position: absolute;
    }

    .img-rank2 {
        width: 128px;
        height: 128px;
        z-index: 5;
        top: 180px;
        right: -15px;
        position: absolute;
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
    }

    .img-khung {
        width: 72px;
        height: 72px;
        z-index: 4;
        top: 200px;
        right: 45px;
        position: absolute;
        -ms-transform: rotate(-10deg);
        -webkit-transform: rotate(-10deg);
        transform: rotate(-10deg);
    }

    .img-item {
        width: 50px;
        height: 50px;
        z-index: 4;
        top: 225px;
        right: 85px;
        position: absolute;
        -ms-transform: rotate(-25deg);
        -webkit-transform: rotate(-25deg);
        transform: rotate(-25deg);
    }
</style>
    
</head>
<body>
</script>



    <div class="sa-header">
      <div class="container">
        <span class="sa-imn"><i class="glyphicon glyphicon-menu-hamburger"></i></span>
        <div class="sa-ftacol" style="
    width: %;
    width: 226.984375px;
    margin-left: 25px;
    margin-top: 10px;

"><a class="sa-logo" href="/" title="">
                            </a><p><a class="sa-logo" href="/" title=""></a><a href="/" title="">Shop Acc Của YOUTUBE </a></p>
                            <p><a href="/" title=""><span style="color: #f44242;">【Uy Tín An Toàn Số 1 VN】</a></p></span>
                        </div>
                          </a>
           <ul class="sa-menu clearfix" style="
    /* margin-left: 0px; */
    margin-left: 0px;
">
            <!--<li><a class ="guide_buy" href="/">Trang chủ</a></li>-->			
		
       
          <li><a href="/recharge.html" title="Nạp Tiền Shop"><b>NẠP TIỀN SHOP</b></a></li>
          <li><a href="/history/recharge.html" title="Lịch Sử">LỊCH SỬ NẠP</a></li>
          <li><a href="/rut-kim-cuong-free-fire.html" title="Rút kc">RÚT KIM CƯƠNG</a></li>
    <?php if (!is_client()): ?>
    
        <?php else: ?>
        
          <li><a href="/logout.html" title="Uy Tín">Đăng Xuất</a></li>
          <?php endif; ?>
            <?php if (is_admin()): ?>
 <li><a href="/admin" title="Uy Tín">AdminCP</a></li>
  <?php endif; ?>
            <!--<li><a class="btn btn-success" href="/napthe.php" title="Nạp tiền">Nạp tiền <sup class="sa-ic sa-mnhot"></sup></a></li>-->
        </ul>
        
<?php if (!is_client()): ?>
            <ul class="sa-login clearfix">
                <li><a href="<?=$_DOMAIN;?>login.html" title="Đăng Nhập">Đăng Nhập</a></li>
            </ul>
                       
<?php else: ?>
                           <ul class="sa-login clearfix">
                <li><a href="/infomation.html" title="Đăng Nhập"><?=($accounts['username'])?> - $ <?=number_format($accounts['cash'])?></a></li>
                
            </ul>
                    </ul>
                </div>
            </div><?php endif; ?>

        
        
        
  
            </div>
        </div>        </div>
    </div>
<?php 
if($tom['locked'] == 1){
echo '<div class="c-content-box c-size-md c-bg-grey-1">
    <div class="container">
        <div class="c-content-bar-1 c-opt-1">
            <h3 class="c-font-uppercase c-font-bold">Tài khoản của bạn đã bị khóa</h3>
            <p class="c-font-uppercase">
                Tài khoản của bạn đã bị khóa do vi phạm chính sách tại Shop vui lòng liên hệ admin để mở hoặc biết thêm thông tin!
            </p>
        </div>
    </div> 
</div>';
include 'footer.php';
exit;
}

if ($system['system'] == 1) {
	echo '<center><img src="https://upanh.tomdz.us/images/2018/07/24/image.png" style="max-width:100%"></center>';
	include 'footer.php';
	exit;
}
?>	
<style>
body {
	background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEX///+nxBvIAAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC");
} 

</style>

