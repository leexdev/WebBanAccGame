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
if(!$_POST){load_url('/');}
if (!is_client()) {
        echo json_encode(array('status' => "error",'link' => "/login.html", 'msg' => "Bạn chưa đăng nhập !"));exit();}

$id = (int)POST('id');
$sql_random = "SELECT * FROM `acc_random` WHERE `id` = '{$id}'";
$acc_random = $db->fetch_assoc($sql_random,1);
$type = $acc_random['type'];
$diamon_ff = $type == 10 ? 200:($type == 11 ? 0:0);
$price = $settings['rd_'.$type.''];
//thông tin người dùng
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);     
    
    if ($accounts['block'] > 0){
        echo json_encode(array('status' => "error", 'msg' => 'Tài khoản của bạn đã bị khóa. Lý do: '.$accounts['note'].'. Vui lòng liên hệ với Admin !'));exit();}
    if($db->num_rows($sql_random) != 1){
        echo json_encode(array('status' => "error", 'msg' => "Tài khoản không tồn tại trên hệ thống !"));exit();}
    if (!$id) {
        echo json_encode(array('status' => "error", 'msg' => "Bạn chưa chọn tài khoản !"));exit();}
    if($settings['status'] == 0){
        echo json_encode(array('status' => "error", 'msg' => "Trang web của chúng tôi đang tạm dừng giao dịch, quay lại sau !"));exit();}
    if($settings['status_random'] == 0){
        echo json_encode(array('status' => "error", 'msg' => "Trang web của chúng tôi đang tạm dừng giao dịch, quay lại sau !"));exit();}
    if ($acc_random['status'] != 0) {
        echo json_encode(array('status' => "error", 'msg' => "Tài khoản bạn chọn không tồn tại hoặc đã bị mua bởi người khác !"));exit();}
    if ($accounts['cash'] < $price ) {
        echo json_encode(array('status' => "error", 'link' => "/recharge.html", 'msg' => "Bạn không đủ tiền để thanh toán, vui lòng nạp thêm !"));exit();}

    //Đủ điều kiện
        $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$price}',`diamon_ff` = `diamon_ff` + '{$diamon_ff}' WHERE `username` = '{$iduser}'");//trừ tiền,cộng kc tích lũy
        $db->query("UPDATE `acc_random` SET `iduser` = '{$iduser}', `id_name` = '{$name}', `status` = '1', `price` = '{$price}', `time` = '{$date_current}', `date` = '{$date_now}' WHERE `id` = '{$id}' LIMIT 1");// status
        $db->query("INSERT INTO `history_buy` (username,name,price,time,date,type,id_random) VALUES ('$iduser','$name','$price','$time_now','$date_now',1,'$id')");
            echo json_encode(array('status' => "success", 'msg' => "Giao dịch thành công !"));exit;
?> 