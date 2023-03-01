<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Lua Uy Tin                    ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$info_card = new Info;
//check info
//if(!$_POST){load_url('/');}
if (!is_client()) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Bạn chưa đăng nhập"));exit;}
if ($accounts['block'] > 0){
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => 'Tài khoản của bạn đã bị khóa. Lý do: '.$accounts['note'].'. Vui lòng liên hệ với Admin !'));exit();}
if($settings['status'] == 0){
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Trang web của chúng tôi đang tạm dừng giao dịch, quay lại sau !"));exit;}
if (!POST('card_type_id')) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa chọn loại nhà mạng"));exit;}
if (!POST('price_guest')) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Chưa chọn mệnh giá thẻ"));exit;}
if (!POST('pin')) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Độ dài mã thẻ hoặc số seri không hợp lệ"));exit;}
if (!POST('seri')) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Độ dài mã thẻ hoặc số seri không hợp lệ"));exit;}

//info user
$iduser = $accounts['username'];
$name = addslashes($accounts['name']);
 
//Truyền dữ liệu thẻ
$type = (int)POST('card_type_id'); // loại thẻ
$amount = (int)POST('price_guest');// mệnh giá
$code = POST('pin'); // mã thẻ
$serial = POST('seri'); // serial

if($type > 10){
    $type_recharge = 2;
    $type = $type - 10;
    $type_nap = "chậm";
}else{
    $type_recharge = 1;
    $type_nap = "tự động";
}
if(!luauytin($type,POST('seri'),POST('pin'))){
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Mã thẻ hoặc seri không đúng định dạng !"));exit();}
//check thẻ có tồn tại hay không
if($info_card->get_string_card($type) == 'null'){
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Thẻ không hỗ trợ trên hệ thống"));exit();}
//chiết khấu card
$ck_card = $db->fetch_assoc("SELECT * FROM `ck_card` WHERE `id` = '{$type_recharge}'", 1);
//Check thẻ nạp có hoạt động không
    if ($db->fetch_row("SELECT COUNT(*) FROM `auto_card` WHERE `{$type}` = 'on' AND `id` = '{$type_recharge}'") == 0) {
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Hiện tại ".$info_card->get_string_card($type)." bảo trì nạp $type_nap."));exit();}

    if($db->fetch_row("SELECT COUNT(*) FROM history_card WHERE pin = '{$code}' AND seri = '{$serial}'")){
        echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Thẻ đã được nạp trên hệ thống. Vui lòng sử dụng thẻ khác"));exit;}
    
$cash_nhan = $ck_card[''.$type.'']*$amount*0.01;
if($type_recharge == 2){//gạch chậm
        $db->query("INSERT INTO `history_card` (username,name,type_card,count_card,cash_nhan,time,date,seri,pin,status) VALUES ('$iduser','$name','$type','$amount','$cash_nhan','$date_current','$date_now','$serial','$code','0')");// lịch sử
        echo json_encode(array('title' => "Thành công !",'status' => "success", 'msg' => "Gửi thẻ ".$info_card->get_string_card($type)." mệnh giá ".number_format($amount)."đ thành công. Vui lòng đợi hệ thống xử lý trong ít phút"));exit;
}elseif($type_recharge == 1){ 
    
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
    $telco = array(1 => 'VIETTEL', 2 => 'MOBIFONE', 3 => 'VINAPHONE')[$type];
    $request_id = rand(100000000, 999999999);  /// Cái này có thể mà mã order của bạn, nếu không có thì để nguyên ko cần động vào.
    
    $obj = json_decode(curl_get("https://nhanthecao.vn/api/card-auto.php?type=$telco&menhgia=$amount&seri=$serial&pin=$code&APIKey=".$settings['apinhanthecao']."&callback=https://".$_SERVER['SERVER_NAME']."/callback.php&content=$request_id"), true);
            if ($obj['data']['status'] == 'success') {
                //Gửi thẻ thành công, đợi duyệt.
                $db->query("INSERT INTO `history_card` (trans_id,username,name,type_card,count_card,cash_nhan,time,date,seri,pin,status) VALUES ('$request_id','$iduser','$name','$type','$amount','$cash_nhan','$date_current','$date_now','$serial','$code','0')");// lịch sử
                echo json_encode(array('title' => "Chờ xử lý",'status' => "success", 'msg' => "Gửi yêu cầu thành công. Vui lòng chờ xử lý. Làm mới trang để nhận trạng thái thẻ mới nhất !"));exit;
            } else{
				//Lỗi
                echo json_encode(array('title' => "Lỗi", 'status' => "error", 'msg' => 'Lỗi: '.$obj['data']['msg']));exit;
			}
##########################################################################################################################
}else{
    echo json_encode(array('status' => "error", 'title' => "Lỗi", 'msg' => "Lỗi không xác định. Vui lòng thử lại !"));
}