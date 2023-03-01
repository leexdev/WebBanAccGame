<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Lua Uy Tin                    ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
session_start();
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');}
if (is_client()) {
    echo json_encode(array('status' => "error",'link' => "/", 'title' => "Lỗi", 'msg' => "Bạn đã đăng nhập rồi"));
}else{
    if (!$_POST['username'] || !$_POST['password']) {
    echo json_encode(array('status' => "error",'title' => "Lỗi", 'msg' => "Thông tin đăng nhập không được để trống!"));exit();}
    $username = addslashes(strtolower($db->real_escape_string(POST('username'))));
    $password = addslashes(md5(md5(POST('password'))));
    
    if(!preg_match('/^[A-Za-z0-9]{6,20}$/', $username)){
        echo json_encode(array('status' => "error", 'title' => "Không hợp lệ", 'msg' =>"Tài khoản chỉ gồm chữ ,số. Không được sử dụng kí tự đặc biệt !"));exit;}
    
    $check_user = $db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$username}' AND password = '{$password}'"); // kiểm tra tài khoản
    $check_phone = $db->fetch_row("SELECT COUNT(*) FROM accounts WHERE phone = '{$username}' AND password = '{$password}'"); // kiểm tra số điện thoại
    
    if(($check_user + $check_phone) != 1){
        echo json_encode(array('status' => "error",'title' => "Lỗi", 'msg' =>"Thông tin đăng nhập không chính xác !"));exit;}
    //Get dữ liệu tài khoản    
    $data_accounts = $db->fetch_assoc("SELECT * FROM `accounts` WHERE `username` = '{$username}' OR `phone` = '{$username}'", 1);
    $_SESSION['user'] = $data_accounts['username'];
    $_SESSION['pass'] = $password;
        echo json_encode(array('status' => "success",'title' => "Thành công", 'msg' => "Thành công. Đang đăng nhập !"));
    exit();
}