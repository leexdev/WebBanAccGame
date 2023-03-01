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
    echo json_encode(array('status' => "warning", 'msg' => "Bạn không phải là admin !"));exit();}
    
    //Update table auto_card id:1
    $db->query("UPDATE auto_card SET `1` = '".$_POST['ac_1']."',`2` = '".$_POST['ac_2']."',`3` = '".$_POST['ac_3']."' WHERE `id` = '1'");
    //Update table auto_card id:2
    $db->query("UPDATE auto_card SET `1` = '".$_POST['acc_1']."',`2` = '".$_POST['acc_2']."',`3` = '".$_POST['acc_3']."' WHERE `id` = '2'");
    //update table ck_card id:1
    $db->query("UPDATE ck_card SET `1` = '100' - '".$_POST['ck1']."',`2` = '100' - '".$_POST['ck2']."',`3` = '100' - '".$_POST['ck3']."' WHERE `id` = '1'");
    //update table ck_card id:2    
    $db->query("UPDATE ck_card SET `1` = '100' - '".$_POST['ckc1']."',`2` = '100' - '".$_POST['ckc2']."',`3` = '100' - '".$_POST['ckc3']."' WHERE `id` = '2'");
    
echo json_encode(array('status' => "success",'link' => "", 'msg' => "Lưu cài đặt thành công !"));
exit();
?>    