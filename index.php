<?php
// Require database
require_once 'core/init.php';
// Danh sach account

$xss = new Anti_xss;
$act = $xss->clean_up(GET('act'));
if(($act == 'forgot' || $act == 'login') && is_client()){$act = '';
}elseif(($act == 'info' || $act == 'rut-kc-ff') && !is_client()){$act = 'login';}
switch ($act) {
	case 'login':
	    $title = "Đăng nhập vào hệ thống";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/login.php'; 
		break;
	case 'forgot':
	    $title = "Quên mật khẩu đăng nhập";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/forgot.php'; 
		break;
	case 'info':
        $title = "Thông tin người dùng";
		$settings['title'] = $title.' | '.$settings['title'];
        require_once 'includes/header.php';
		require_once 'products/info.php'; 
		break;
case 'uy-tin':
        $title = "Uy Tín Shop";
		$settings['title'] = $title.' | '.$settings['title'];
        require_once 'includes/header.php';
		require_once 'products/uytin.php'; 
		break;
	case 'view_accounts':
	    require_once 'includes/header.php';
		require_once 'products/view_accounts.php'; 
		break;
	case 'accounts':
	    $luauytin = new Info;
	    $type = $luauytin->type_account(GET('type')) != '' ? $luauytin->type_account(GET('type')):'Liên Quân Mobile';
		$settings['title'] = 'Shop Bán Nick '.$type.' | '.$settings['title'];
		require_once 'includes/header.php';
		require_once 'includes/account.php'; 
		break;
	case 'recharge':
	    $title = "Nạp tiền từ thẻ cào";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/recharge.php'; 
		break;
	case 'history_buy':
	    $title = "Lịch sử mua nick";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/history/buy.php'; 
		break;
	case 'history_card':
	    $title = "Lịch nạp thẻ cào";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/history/card.php'; 
		break;
	case 'random_lq':
	    $luauytin = new Info;
	    $type = $luauytin->random_level(GET('type')) != '' ? (int)GET('type'):1;
	    $title = 'Thử Vận May '.$luauytin->random_level($type).' '.$settings['rd_'.$type]*0.001.'K - Random '.$luauytin->random_level($type).' '.$settings['rd_'.$type]*0.001.'K';
	    
		$settings['title'] = $title.' | '.$settings['title'];
	    $settings['descr'] = 'thử vận may liên quân 9k shop thử vận may liên quân thử vận may acc liên quân thử vận may 9k shop acc thử vận may mua acc random liên quân bán acc liên quân random thu van may lien quan  shop liên quân thử vận may thử vận may acc liên quân shop acc thử vận may acc liên quân 9k mua acc random liên quân shop liên quân 9k thử vận may 20k mua acc liên quân 9k random liên quân acc random liên quân là gì bán acc liên quân random thử vận may acc liên quân 9k acc lien quan random acc random lq thử vận may liên quân shop acc random liên quân shop liên quân';
	    $settings['keywords'] = 'thử vận may liên quân 9k shop thử vận may liên quân thử vận may acc liên quân thử vận may 9k shop acc thử vận may mua acc random liên quân bán acc liên quân random thu van may lien quan  shop liên quân thử vận may thử vận may acc liên quân shop acc thử vận may acc liên quân 9k mua acc random liên quân shop liên quân 9k thử vận may 20k mua acc liên quân 9k random liên quân acc random liên quân là gì bán acc liên quân random thử vận may acc liên quân 9k acc lien quan random acc random lq thử vận may liên quân shop acc random liên quân shop liên quân';
	    require_once 'includes/header.php';
		require_once 'includes/random.php'; 
		break;
	case 'atm':
	    $title = "Hướng dẫn thanh toán qua ATM - MoMo";
		$settings['title'] = $title.' | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/pages/atm.html'; 
		break;
	case 'rut-kc-ff':
		$settings['title'] = 'Rút kim cương Free Fire | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/rut-kc-ff.php'; 
		break;
	case 'wheel':
	    $settings['title'] = 'Vòng quay Free Fire | '.$settings['title'];
	    require_once 'includes/header.php';
		require_once 'products/wheel.php'; 
		break;
	default:
	    require_once 'includes/header.php';
		require_once 'includes/home_1.php';
		break;
}
// Require footer
require_once 'includes/footer.php';
 
?>