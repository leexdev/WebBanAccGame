<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Youtuber THI FF VLOG          ║
║      Facebook: facebook.com/ytbThiFF        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
session_start();
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//check post
if(!$_POST){load_url('/');}
if (is_client()) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi",'msg' => "Vui lòng đăng xuất để thực hiện nội dung !"));exit();}

        $phone = $db->real_escape_string(POST('phone_forgot'));
        $email = $db->real_escape_string(POST('email_forgot'));
        $username = strtolower($db->real_escape_string(POST('username_forgot')));
        
        if(empty($phone) || empty($email) || empty($username)){
            echo json_encode(array('status' => "error", 'title' => "Lỗi",'msg' => "Vui lòng cung cấp đủ thông tin yêu cầu !"));exit();}
        if(!preg_match('/^[A-Za-z0-9]{6,20}$/', $username)){
            echo json_encode(array('status' => 'error', 'title' => "Không hợp lệ !", 'msg' =>"Tài khoản từ 6-20 kí tự chỉ gồm chữ ,số. Không được sử dụng kí tự đặc biệt !"));exit;}
        if(!preg_match("/^\+?(84|0)(1\d{9}|9\d{8}|8\d{8}|3\d{8}|7\d{8}|5\d{8})$/", $phone)){
            echo json_encode(array('status' => "error", 'title' => "Không hợp lệ !", 'msg' => "Số điện thoại không đúng định dạng !"));exit;}
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo json_encode(array('status' => "error", 'title' => "Không hợp lệ !", 'msg' => "Email không đúng định dạng !"));exit();}
        //check thông tin
        if($db->fetch_row("SELECT COUNT(*) FROM `accounts` WHERE `username` = '{$username}' AND `email` = '{$email}' AND `phone` = '{$phone}'") < 1){
            echo json_encode(array('status' => "error", 'title' => "Không hợp lệ !", 'msg' => "Thông tin yêu cầu không chính xác !"));exit;}
       
        $password =  rand(1111111,99999999);
        
//gửi mail
    $subject = "Cấp lại mật khẩu mới trên website $_DOMAIN";
    $title = 'Cấp lại mật khẩu';
    $nTo = $username;
    $mTo = $email;
    $content = '
<html>
<body>
<table align="center" border="2" cellpadding="5" cellspacing="3" style="background-color:#00CC99;width:100%;">
    <thead>
        <tr>
            <th scope="col">
            <p>Hi <i style="color:red;">'.$username.'</i>. Mật khẩu mới của bạn là:</p>

            <table align="center" border="1" cellpadding="1" cellspacing="10" style="background-color:green;width:150px;color:white;">
                <tbody>
                    <tr>
                        <td>'.$password.'</td>
                    </tr>
                </tbody>
            </table>

            <p style="text-align: left;"><span style="font-size:15px;">Đăng nhập tại: <em><span style="color:#0000FF;">'.$_DOMAIN.'</span></em></span></p>
            <p style="text-align: left;"><span style="font-size:11px;">'.$date_current.'</span></p>
            <p style="text-align: right;"><span style="font-size:11px;"><em><span style="color:#0000FF;">'.$settings['title'].'</span></em></span></p>
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
</body>
</html>
    ';
    
    $mail = sendMail($title, $subject, $content, $nTo, $mTo);
    
    if($mail->error == 0):
        $newpass = md5(md5($password));
        $db->query("UPDATE `accounts` SET `password` = '{$newpass}' WHERE `username` = '{$username}' LIMIT 1");
        //thông báo
            echo json_encode(array('status' => "success", 'title' => "Thành công", 'link' => '/','msg' => "Mật khẩu mới đã được gửi về Email. Vui lòng kiểm tra hộp thư đến ( hoặc có thể trong mục thư spam)."));exit;
    else:
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'link' => '','msg' => "Không thể gửi mật khẩu tới Email. Xin vui lòng thử lại sau !"));exit;
    endif;
?>