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
$iduser = $accounts['username'];
$sql_setting_latthe =  "SELECT * FROM `setting_latthe`";
$setting_latthe = $db->fetch_assoc($sql_setting_latthe, 1);
$tile1 = $setting_latthe['1'];//tỉ lệ kc1
$tile2 = $setting_latthe['2'];//tỉ lệ kc2
$tile3 = $setting_latthe['3'];//tỉ lệ kc3
$tile4 = $setting_latthe['4'];//tỉ lệ kc4
$tile5 = $setting_latthe['5'];//tỉ lệ kc5
$tile6 = $setting_latthe['6'];//tỉ lệ kc6
$tile7 = $setting_latthe['7'];//tỉ lệ kc7
$tile8 = $setting_latthe['8'];//tỉ lệ kc8
$tile9 = $setting_latthe['9'];//tỉ lệ kc9
$price = $setting_latthe['latthe_price'];//giá lật thẻ
if(!$_POST){load_url('/');}
if (!is_client()) {
        echo json_encode(array('status' => "error",'link' => "/login.html", 'msg' => "Bạn chưa đăng nhập !"));exit();}

if($_POST['type'] == 'danhuy2k5'){
$phanqua = array('89' => $tile1,
                 '111' => $tile2, 
                 '120' => $tile3, 
                 '250' => $tile4, 
                 '500' => $tile5, 
                 '3000' => $tile6, 
                 '5000' => $tile7, 
                 '12000' => $tile8, 
                 '25000' => $tile9);//chỉnh tỉ lệ ở đây

$mangphanqua = array();
foreach ($phanqua as $phanqua=>$value)
{
    $mangphanqua = array_merge($mangphanqua, array_fill(0, $value, $phanqua));
}

$kc = $mangphanqua[array_rand($mangphanqua)];
$img = '/latthe/'.$kc.'kc.jpg';


	if(!is_client()){
 $status = 'login'; // false
 $msg = 'Đăng nhập đi, xem json cái lol.';
}
elseif($settings['status'] == 0){
    $status = 'error'; // false
    $msg = 'Trang web của chúng tôi đang tạm dừng giao dịch, quay lại sau !';
    
}
elseif ($accounts['cash'] < $price ) {
        $status = 'error'; // false
    $msg ='Bạn cần '.number_format($price).'đ để chơi vòng quay này !';
    
}
else{
   $status = 'success'; // 
   $ketqua123 = 'success';
   $db->query("UPDATE `products` SET `status` = '1' WHERE `id` = '{$id}' LIMIT 1");// status
        $db->query("UPDATE `accounts` SET `cash` = `cash` - '".$price."' WHERE `username` = '{$iduser}'");//trừ tiền
        $db->query("UPDATE `accounts` SET `diamon_ff` = `diamon_ff` + $kc WHERE `username` = '{$iduser}'");//cộng kim cương
        $db->query("INSERT INTO `history_latthe` (	username,diamon,time,date) VALUES ('$iduser','$kc','$date_current','$date_now')");// lịch sử
   
 $msg = 'Chúc mừng bạn đã trúng '.number_format($kc).' Kim Cương';

}

	$arr = array('status' => $status,'success' => $ketqua123, 'img' => $img,'msg' => $msg);

echo json_encode($arr);
}else{
    echo '?';
}

