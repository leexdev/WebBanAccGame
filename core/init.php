<?php
 
// Require các thư viện PHP
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/connect@data.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/Session.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/Functions.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/system_luauytin/Pagination.php');

// Kết nối database
$db = new DB();
$db->connect();
$db->set_char('utf8');

// Thông tin chung
$_DOMAIN = "https://".$_SERVER["SERVER_NAME"]."/";
$root = $_SERVER["DOCUMENT_ROOT"];
//Thời gian
date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:sa");
$date_now = '';
$date_now = date("Y-m-d");
$time_now = time();   

// Khởi tạo session
$session = new Session();
$session->start();
 
// Kiểm tra session
if ($session->get('user') != '')
{
    $user = $session->get('user');
}else{
    $user = '';
}
//check tồn tại user
if(isset($_SESSION['user']) && empty($_SESSION['user'])){$session->destroy();header("Location: /");die();}
// Nếu đăng nhập
if (is_client())
{
    // Lấy dữ liệu tài khoản
    $sql_accounts = "SELECT * FROM accounts WHERE username = '$user'";
    if ($db->num_rows($sql_accounts))
    {
        $accounts = $db->fetch_assoc($sql_accounts, 1);
    }
    //check block
    if($accounts['block'] > 0){
        if($accounts['time_block'] <= $time_now){
            $db->query("UPDATE `accounts` SET `block` = '0' , `time_block` = '0' , `days_block` = '0' , `note` = '' WHERE `username` = '".$accounts['username']."' LIMIT 1");}    
        }
    //check login
    if($accounts['password'] != $session->get('pass') && $accounts['fb'] == 0){
        $session->destroy();
    }
}
    // Lấy dữ liệu thông tin trang web đã cài đặt
    $sql_settings = "SELECT * FROM settings";
    if ($db->num_rows($sql_settings))
    {
        $settings = $db->fetch_assoc($sql_settings, 1);
    }
?>