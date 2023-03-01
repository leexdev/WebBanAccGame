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
$sql_setting_wheel1 =  "SELECT * FROM `setting_wheel1`";
if ($db->num_rows($sql_setting_wheel1)){
	$setting_wheel1 = $db->fetch_assoc($sql_setting_wheel1, 1);
	$price1 = $setting_wheel1['wheel_price'];//giá quay
}else{
	echo json_encode(array('title' => 'Lỗi', 'msg1' => "Vòng quay đang bảo trì. Vui lòng thử lại sau !"));die;
}

if (!is_client()) {
    echo json_encode(array('title' => 'Lỗi', 'msg1' => "Bạn chưa đăng nhập !"));die;}
if($settings['status'] != 1 && !is_admin()){
    echo json_encode(array('title' => 'Lỗi', 'msg1' => "Trang web của chúng tôi đang tạm ngừng giao dịch, quay lại sau !"));die;}
if($setting_wheel1['status'] != 1 && !is_admin()){
    echo json_encode(array('title' => 'Lỗi', 'msg1' => "Vòng quay đang bảo trì. Vui lòng thử lại sau !"));die;}
if ($accounts['block'] > 0){
    echo json_encode(array('title' => 'Lỗi', 'msg1' => 'Tài khoản của bạn đã bị khóa. Lý do: '.$accounts['note'].'. Vui lòng liên hệ với Admin !'));die();}
if ($accounts['cash'] < $price){
    echo json_encode(array('title' => 'Lỗi', 'msg1' => 'Bạn cần '.number_format($price).'đ để chơi vòng quay này !'));die();}

//thông tin người dùng
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);

	$db->query("UPDATE `accounts` SET `cash` = `cash` - '".$price."' WHERE `username` = '".$iduser."'");//trừ tiền
	$db->query("UPDATE `setting_wheel1` SET `huvang` = `huvang` + '".$price*0.8."'");//cộng tiền vào hũ

//tạo list quà
$gift = array();
for ($i=11;$i <= 18; $i++){
    if($setting_wheel1[$i] != 0) array_push($gift, $i);
}

$gift = $gift[array_rand($gift)];//lấy gói quà
$percent = $setting_wheel1['id_nohu'] == $iduser && $gift == 15 ? 100:$setting_wheel1[$gift];//lấy tỷ lệ
$gift = check_wheel1($percent) ? $gift:14;//check tỉ lệ
$msg1 = info_wheel1($gift)['msg1'];//nội dung
$angles1 = info_wheel1($gift)['angles1'];//góc quay
$hide = $gift == 14 || $gift == 16 ? 1:0;
$huvang = $db->fetch_assoc("SELECT * FROM setting_wheel1", 1)['huvang'];
$nohu = $gift == 5 ? $huvang:0;
$id_wheel1 = 0;

//xử lý nhận acc
if($gift == 12){
$db->query("UPDATE `accounts` SET `cash` = `cash` + '{$price}' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy	
}elseif($gift == 11){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '45' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy	
}elseif($gift == 14){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '90' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
}elseif($gift == 15){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '230' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
}elseif($gift == 16){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '9000' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
}elseif($gift == 17){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '3000' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy      
}elseif($gift == 18){
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + '135' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy        
        
}
$db->query("INSERT INTO `history_wheel1` (`username`,`name`,`type`,`id_wheel1`,`prize`,`nohu`,`hide`,`time`,`date`) VALUES ('".$iduser."','".$name."','".$gift."','".$id_wheel1."','".$msg1."','".$nohu."','".$hide."','".$date_current."','".$date_now."')");
$msg1 = $gift == 18 ? $msg1.'':$msg1;
echo json_encode(array(
	'status' => 1,
	'msg1' => $msg1,
	'local' => $angles1,
	'huvang' => number_format($huvang).'đ'
	));
die();