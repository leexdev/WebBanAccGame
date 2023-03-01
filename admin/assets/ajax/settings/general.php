<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');}
if(!is_admin()){
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là admin !"));exit();}
    
    $title = $_POST['title'];
    $descr = $_POST['descr'];
    $keywords = $_POST['keywords'];
    $fanpage = $_POST['fanpage'];
    $fb_admin = $_POST['fb_admin'];
    $name_admin = $_POST['name_admin'];
    $phone_admin = $_POST['phone_admin'];
    $email_admin = $_POST['email_admin'];
    $notify = $_POST['notify'];
    $domain = $_POST['domain'];
    $status = $_POST['status'];
    $video_home = $_POST['video_home'];
    $status_random = $_POST['status_random'];
    $rd_1 = $_POST['rd_1'];
    $rd_2 = $_POST['rd_2'];
    $rd_3 = $_POST['rd_3'];
    $rd_4 = $_POST['rd_4'];
    $rd_5 = $_POST['rd_5'];
    $rd_6 = $_POST['rd_6'];
    $rd_7 = $_POST['rd_7'];
    $rd_8 = $_POST['rd_8'];;
    $rd_9 = $_POST['rd_9'];
    $rd_10 = $_POST['rd_10'];
    $rd_11 = $_POST['rd_11'];
    $api = $_POST['apinhanthecao'];
    $rd_12 = 0;
    $rd_13 = 0;
    $rd_14 = 0;
    $rd_15 = 0;
    
    //Update data
    $db->query("UPDATE settings SET `title` = '$title',`descr` = '$descr',`keywords` = '$keywords', `fanpage` = '$fanpage', `fb_admin` = '$fb_admin', `name_admin` = '$name_admin', `phone_admin` = '$phone_admin', `email_admin` = '$email_admin', `notify` = '$notify', `domain` = '$domain', `status` = '$status', `status_random` = '$status_random',`video_home` = '$video_home', `rd_1` = '$rd_1', `rd_2` = '$rd_2', `rd_3` = '$rd_3', `rd_4` = '$rd_4', `rd_5` = '$rd_5', `rd_6` = '$rd_6', `rd_7` = '$rd_7', `rd_8` = '$rd_8', `rd_9` = '$rd_9', `rd_10` = '$rd_10', `rd_11` = '$rd_11', `rd_12` = '$rd_12', `rd_13` = '$rd_13', `rd_14` = '$rd_14', `rd_15` = '$rd_15', `apinhanthecao` = '$api'");
echo json_encode(array('status' => "success",'link' => "", 'msg' => "Lưu cài đặt thành công !"));
exit();
?>