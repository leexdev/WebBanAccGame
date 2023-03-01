<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');}
if (!is_client()) {
        echo json_encode(array('status' => "error",'link' => "/login.html", 'msg' => "Bạn chưa đăng nhập !"));exit();}

$id = (int)POST('id');
$sql_products = "SELECT * FROM `products` WHERE `id` = '{$id}'";
$products = $db->fetch_assoc($sql_products,1);  
$price = $products['price'];
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);     
    
    if ($accounts['block'] > 0){
        echo json_encode(array('status' => "error", 'msg' => 'Tài khoản của bạn đã bị khóa. Lý do: '.$accounts['note'].'. Vui lòng liên hệ với Admin !'));exit();}
    if($db->num_rows($sql_products) != 1){
        echo json_encode(array('status' => "error", 'msg' => "Tài khoản không tồn tại trên hệ thống !"));exit();}
    if (!$id) {
        echo json_encode(array('status' => "error", 'msg' => "Bạn chưa chọn tài khoản !"));exit();}
    if($settings['status'] == 0){
        echo json_encode(array('status' => "error", 'msg' => "Trang web của chúng tôi đang tạm dừng giao dịch, quay lại sau !"));exit();}
    if ($products['status'] != 0) {
        echo json_encode(array('status' => "error", 'msg' => "Tài khoản bạn chọn không tồn tại hoặc đã bị mua bởi người khác !"));exit();}
    if ($accounts['cash'] < $price ) {
        echo json_encode(array('status' => "error", 'link' => "/recharge.html", 'msg' => "Bạn không đủ tiền để thanh toán, vui lòng nạp thêm !"));exit();}

    //Đủ điều kiện
        $db->query("UPDATE `products` SET `status` = '1' WHERE `id` = '{$id}' LIMIT 1");// status
        $db->query("UPDATE `accounts` SET `cash` = `cash` - '{$price}' WHERE `username` = '{$iduser}'");//trừ tiền
        $db->query("INSERT INTO `history_buy` (username,name,id_products,price,time,date,type) VALUES ('$iduser','$name','$id','$price','$time_now','$date_now',0)");// lịch sử
            echo json_encode(array('status' => "success", 'msg' => "Giao dịch thành công !"));
            
        // xóa ảnh
        
            $arr_delete = array();
            $avatar = glob("../files/thumb/".$id.".*");
            $arr_delete[] = $avatar[0];
            $gem = glob("../files/gem/".$id."-*");
            foreach ($gem as $link_gem) {
            $arr_delete[] = $link_gem;
            }
            $post = glob("../files/post/".$id."-*");
            foreach ($post as $link_post) {
            $arr_delete[] = $link_post;
            }
            foreach ($arr_delete as $link) {
            @unlink($link);
            }

exit();
?> 