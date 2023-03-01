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
    /*
//gửi mail
    $subject = "Yêu cầu gạch thẻ cào tại $_DOMAIN";
    $title = 'Yêu gạch thẻ ngày '.$date_now;
    $yeucau = $db->fetch_row("SELECT COUNT(*) FROM history_card WHERE status = '0'");
    $nTo = 'luauytin';
    $mTo = $settings['email_admin'];
    $content = '
<html>
<head>
    <title></title>
</head>
<body>
<table align="center" border="2" cellpadding="5" cellspacing="3" style="background-color:#00CC99;width:100%;">
    <thead>
        <tr>
            <th scope="col">
            <p><span style="color:#000000;"><span style="font-size:22px;">Hiện tại có </span></span><span style="font-size:22px;"><span style="color:#FF0000;">'.$yeucau.'</span> yêu cầu gạch thẻ chờ xử lý</span></p>

            <p><span style="font-size:20px;"><span style="color:#000000;">Yêu cầu mới nhất:</span></span></p>

            <p style="text-align: left;"><span style="color:#000000;">IDUser: </span><span style="color:#FF0000;">'.$iduser.'</span></p>
            
            <p style="text-align: left;"><span style="color:#000000;">Name: </span><span style="color:#FF0000;">'.$name.'</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Loại thẻ: </span><span style="color:#FF0000;">'.$info_card->get_string_card($type).'</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Mệnh giá: </span><span style="color:#FF0000;">'.number_format($amount).'đ</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Serial: </span><span style="color:#FF0000;">'.$serial.'</span></p>

            <p style="text-align: left;"><span style="color:#000000;">Mã thẻ: </span><span style="color:#FF0000;">'.$code.'</span></p>

            <p style="text-align: left;">Thời gian: <span style="color:#008000;">'.$date_current.'</span></p>

            <p style="text-align: right;"><em style=""><span style="color: rgb(0, 0, 255);"><span style="font-size: 11px;">'.$settings['title'].'</span></span></em></p>
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
        echo json_encode(array('title' => "Thành công !",'status' => "success", 'msg' => "Gửi thẻ ".$info_card->get_string_card($type)." mệnh giá ".number_format($amount)."đ thành công. Vui lòng đợi hệ thống xử lý trong ít phút"));exit;
    else:
            echo json_encode(array('status' => "error", 'title' => "Lỗi", 'link' => '','msg' => "Lỗi. Vui lòng liên hệ admin !"));exit;
    endif;

    
    */
}elseif($type_recharge == 1){ // gạch tự động : trumdoithe.com
##########################################################################################################################

    $telco = array(1 => 'VIETTEL', 2 => 'MOBIFONE', 3 => 'VINAPHONE')[$type];
    $random = rand(1,9999999);
  $trumdoitheApiKey = '5GlJMvg0mZNOKC8enydHSu1stpWfXbT4';   //
    $callback = 'https://shop.bansub.com/callback.php';                 // 
  $url = 'https://doithe1s.vn/api/chargingws.php?typethe='.$telco.'&giathe='.$amount.'&serithe='.$serial.'&pincode='.$code.'&APIKeytrumdoithe='.$trumdoitheApiKey.'&callback='.$callback.'&content='.$random.'';
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data, true);

if (isset($json['data']))
{
    if ($json['data']['status'] == 'error')
    {
         echo json_encode(array('title' => "Lỗi", 'status' => "error", 'msg' => "Thẻ sai hoặc đã sử dụng !"));exit;
    }
    else if ($json['data']['status'] == 'success')
    {
        $db->query("INSERT INTO `history_card` (trans_id,username,name,type_card,count_card,cash_nhan,time,date,seri,pin,content,status) VALUES ('".$obj->trans_id."','$iduser','$name','$type','$amount','$cash_nhan','$date_current','$date_now','$serial','$code','$random','0')");// lịch sử
                echo json_encode(array('title' => "Chờ xử lý",'status' => "success", 'msg' => "Gửi yêu cầu thành công. Vui lòng chờ xử lý. Làm mới trang để nhận trạng thái thẻ mới nhất !"));exit;
       
    }
}


            
##########################################################################################################################
}else{
    echo json_encode(array('status' => "hmm", 'title' => "Lỗi", 'msg' => "Lỗi không xác định. Vui lòng thử lại !"));
}