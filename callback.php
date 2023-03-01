<?php 
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
if(!$_GET){die();}
if(isset($_GET['status']) && isset($_GET['thucnhan']) && $_GET['content']) {
$cash_nhan = $_GET['thucnhan'];
###############################################################################################################################################################
$sql = "SELECT * FROM `history_card` WHERE `status` = '0' AND `trans_id` = '".GET('content')."' LIMIT 1";
if($db->fetch_row($sql)){
$luauytin = $db->fetch_assoc($sql,1);
        if(GET('status') == 'success'){
            //cập nhật data
            $db->query("UPDATE `history_card` SET `status` = '1' WHERE `id` = '".$luauytin['id']."' LIMIT 1");
            $db->query("UPDATE `accounts` SET `cash` = `cash` + '".$luauytin['cash_nhan']."' WHERE `username` = '".$luauytin['username']."'");
			//top recharge
            if($cash_nhan > 0){
                if($db->fetch_row("SELECT COUNT(*) FROM `top_recharge` WHERE username = '{$iduser}'") > 0){
                    $db->query("UPDATE `top_recharge` SET `cash` = `cash` + '".$luauytin['count_card']."' WHERE `username` = '{$iduser}'");}else{
                    $db->query("INSERT INTO `top_recharge` (username,name,cash) VALUES ('$iduser','".$luauytin['name']."','".$luauytin['count_card']."')");}
            }
        }else{
            $status = GET('status') == 2 || GET('status') == 3 ? 3:(GET('status') == 5 ? 2:4);
            $db->query("UPDATE `history_card` SET `status` = '2', `notice` = '".$_GET['message']."', `cash_nhan` = '0' WHERE `id` = '".$luauytin['id']."' LIMIT 1");
        }
}
################################################################################################################################################################
}