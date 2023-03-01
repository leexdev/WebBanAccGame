<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Lua Uy Tin                    ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');die();}
//lấy dữ liệu vòng quay
$sql_setting_wheel =  "SELECT * FROM `setting_wheel`";
if ($db->num_rows($sql_setting_wheel)){
	$setting_wheel = $db->fetch_assoc($sql_setting_wheel, 1);
	$price = $setting_wheel['wheel_price'];//giá quay
}else{
	echo json_encode(array('title' => 'Lỗi', 'msg' => "Vòng quay đang bảo trì. Vui lòng thử lại sau !"));die;
}

if (!is_client()) {
    echo json_encode(array('title' => 'Lỗi', 'msg' => "Bạn chưa đăng nhập !"));die;}
if($settings['status'] != 1 && !is_admin()){
    echo json_encode(array('title' => 'Lỗi', 'msg' => "Trang web của chúng tôi đang tạm ngừng giao dịch, quay lại sau !"));die;}
if($setting_wheel['status'] != 1 && !is_admin()){
    echo json_encode(array('title' => 'Lỗi', 'msg' => "Vòng quay đang bảo trì. Vui lòng thử lại sau !"));die;}
if ($accounts['block'] > 0){
    echo json_encode(array('title' => 'Lỗi', 'msg' => 'Tài khoản của bạn đã bị khóa. Lý do: '.$accounts['note'].'. Vui lòng liên hệ với Admin !'));die();}
if ($accounts['cash'] < $price){
    echo json_encode(array('title' => 'Lỗi', 'msg' => 'Bạn cần '.number_format($price).'đ để chơi vòng quay này !'));die();}

//thông tin người dùng
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);

	$db->query("UPDATE `accounts` SET `cash` = `cash` - '".$price."' WHERE `username` = '".$iduser."'");//trừ tiền
	$db->query("UPDATE `setting_wheel` SET `huvang` = `huvang` + '".$price*0.8."'");//cộng tiền vào hũ

//tạo list quà
$gift = array();
for ($i=1;$i <= 8; $i++){
    if($setting_wheel[$i] != 0) array_push($gift, $i);
}

$gift = $gift[array_rand($gift)];//lấy gói quà
$percent = $setting_wheel['id_nohu'] == $iduser && $gift == 5 ? 100:$setting_wheel[$gift];//lấy tỷ lệ
$gift = check_wheel($percent) ? $gift:4;//check tỉ lệ
$msg = info_wheel($gift)['msg'];//nội dung
$angles = info_wheel($gift)['angles'];//góc quay
$hide = $gift == 4 || $gift == 6 ? 1:0;
$huvang = $db->fetch_assoc("SELECT * FROM setting_wheel", 1)['huvang'];
$nohu = $gift == 5 ? $huvang:0;
$id_wheel = 0;


//xử lý nhận acc
if($gift == 2){
$db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '3999' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy	

}elseif($gift == 1){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '12' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy	
}elseif($gift == 3){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '7999' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
}elseif($gift == 4){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '9' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
}elseif($gift == 5){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '0' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
}elseif($gift == 6){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '0' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
       
}elseif($gift == 7){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '0' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
       
}elseif($gift == 8){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '0' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy  
      
        
}
$db->query("INSERT INTO `history_wheel` (`username`,`name`,`type`,`id_wheel`,`prize`,`nohu`,`hide`,`time`,`date`,`loaiquay`) VALUES ('".$iduser."','".$name."','".$gift."','".$id_wheel."','".$msg."','".$nohu."','".$hide."','".$date_current."','".$date_now."','1')");
$msg = $gift == 1  ? ' '.$msg :$msg;
$msg = $gift == 2  ? 'Chúc mừng bạn đã quay trúng '.$msg :$msg;
$msg = $gift == 3  ? 'Chúc mừng bạn đã quay trúng '.$msg :$msg;
$msg = $gift == 4  ? 'Chúc mừng bạn đã quay trúng '.$msg :$msg;
$msg = $gift == 5  ? 'Chúc mừng bạn đã quay trúng '.$msg :$msg;
$msg = $gift == 6  ? 'Chúc mừng bạn đã quay trúng '.$msg :$msg;
$msg = $gift == 7  ? 'Chúc mừng bạn đã quay trúng '.$msg :$msg;
$msg = $gift == 8  ? 'Chúc mừng bạn đã quay trúng '.$msg :$msg;
echo json_encode(array(
	'status' => 1,
	'msg' => $msg,
	'local' => $angles,
	'huvang' => number_format($huvang).'đ'
	));
die();