<?php
/*
╔═════════════════════════════════════════════╗
║             Design by LuaUyTin              ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0984.459.954 - 0899.91.31.91     ║
╚═════════════════════════════════════════════╝
*/
 
// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');

// Nếu đăng nhập
if(is_admin()){
    
    $w_1 = (int)POST('wheel_1');
    $w_2 = (int)POST('wheel_2');
    $w_3 = (int)POST('wheel_3');
    $w_4 = (int)POST('wheel_4');
    $w_5 = (int)POST('wheel_5');
    $w_6 = (int)POST('wheel_6');
    $w_7 = (int)POST('wheel_7');
    $w_8 = (int)POST('wheel_8');
    $huvang = (int)POST('huvang');
    $wheel_price = (int)POST('wheel_price');
    $status = (int)POST('status');
    $id_nohu = addslashes(strtolower(POST('id_nohu')));;

    //cập nhật
    $db->query("UPDATE `setting_wheel` SET
        `1` = '".$w_1."',
        `2` = '".$w_2."',
        `3` = '".$w_3."',
        `4` = '".$w_4."',
        `5` = '".$w_5."',
        `6` = '".$w_6."',
        `7` = '".$w_7."',
        `8` = '".$w_8."',
        `huvang`   = '".$huvang."',
        `wheel_price` = '".$wheel_price."',
        `status` = '".$status."',
        `id_nohu`  = '".$id_nohu."' 
    ");
    echo json_encode(array('status' => "success", 'msg' => "Cập nhật dữ liệu thành công !"));
    
}
else {
    echo json_encode(array('status' => "warning", 'msg' => "Bạn chưa đăng nhập hoặc không phải là Admin"));
}
?>