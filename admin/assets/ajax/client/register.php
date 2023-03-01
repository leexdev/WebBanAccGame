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
    echo json_encode(array('status' => "error", 'link' => "/",'title' => 'Lỗi', 'msg' => "Bạn đã đăng nhập rồi"));
}else {
    $username = strtolower($db->real_escape_string(POST('username')));
    $name = $db->real_escape_string(POST('name'));
    $password = POST('password');

    if (empty(POST('username')) || empty(POST('name')) || empty(POST('password')) || empty(POST('repassword'))) {
        echo json_encode(array('status' => "error",  'title' => "Lỗi", 'msg' =>"Thông tin đăng ký không được để trống  $username $name $password !"));exit;}
    if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,20}$/', $username)){
        echo json_encode(array('status' => "error", 'title' => "Không hợp lệ", 'msg' =>"Tài khoản chỉ gồm chữ và số. Không được sử dụng kí tự đặc biệt !"));exit;}
    if(POST('password')!=POST('repassword')){
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' =>"Xác thực mật khẩu không trùng nhau !"));exit;}
    if(strlen(POST('name')) < 6 || strlen(POST('name')) > 24){
	    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Họ tên phải từ 6 - 24 kí tự kí tự !"));exit;}
    if(strlen(POST('username')) < 6 || strlen(POST('username')) > 20){
	    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Tài khoản phải từ 6 - 20 kí tự kí tự !"));exit;}
	if(strlen(POST('password')) < 6 || strlen(POST('password')) > 40){
	    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Mật khẩu phải từ 6 - 40 kí tự kí tự !"));exit;}
        
    if($db->fetch_row("SELECT COUNT(*) FROM accounts WHERE username = '{$username}'") > 0) {
		 echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Tên đăng nhập đã tồn tại !"));exit;}
		 
    //Đủ điều kiện để đăng kí
	   $password = md5(md5($password)); 
	   $db->query("INSERT INTO `accounts` (username,name,cash,password,datetime) VALUES ('$username','$name','0','$password','$date_current')");
	   $_SESSION['user'] = $username;
       $_SESSION['pass'] = $password;
		echo json_encode(array('status' => "success", 'title' => "Thành công", 'msg' => "Đăng ký thành công. Đang đăng nhập!"));
}