<?php
/*
╔═════════════════════════════════════════════╗
║     Design by Lua Uy Tin                    ║
║      Facebook: facebook.com/luauytin        ║
║   Hotline: 0369.056.756 - 0359.283.357      ║
╚═════════════════════════════════════════════╝
*/

// Kết nối database và thông tin chung
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
$get_info = new Info;
if (!$user) {
?>
<tr><td colspan="6" class="text-center"><p>Vui lòng đăng nhập để xem thông tin !</p></td></tr>
<?php
exit;
}elseif(!$_POST){
exit;
}

$iduser = $accounts['username'];
$input = new Input;
$page = (int)$input->input_post("page");

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_buy WHERE username = '{$iduser}' LIMIT 1");
$limit = 20*$page;
$sql_get_list_mem = "SELECT * FROM `history_buy` WHERE username = '{$iduser}' ORDER BY `time` DESC  LIMIT $limit";

// Nếu có 
if ($total_record){
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){
if($data['type'] != 0):
$products = $db->fetch_assoc("SELECT * FROM `acc_random` WHERE id = '".$data['id_random']."' LIMIT 1", 1);
$products["type_account"] = "Random ".$get_info->random_level($products["type"]);
$url = "/garena/random-lien-quan.html";
$data['id_products'] = $data['id_random'];
else:
$products = $db->fetch_assoc("SELECT * FROM `products` WHERE id = '".$data['id_products']."' LIMIT 1", 1);
$url = "/accounts/".$data['id_products'].".html";
endif;?>
                <tr>
                    <td class="text-primary"><a href="<?=$url?>" target="_blank" style="font-weight:bold;color: #0ce2ab;"><?=$data['id_products']; ?><?php echo (time() - $data['time'] < 86400) ? ' <sup><img src="/assets/images/new.gif"></sup>':''?></a></td>
                    <td class="text-primary"><?=$products["type_account"];?></td>
                    <td class="text-primary"><?=$products['username']; ?></td>
                    <td class="text-primary"><?=$products['password']; ?></td>
                    <td class="text-primary"><?=number_format($products['price'], 0, '.', '.'); ?>đ</td>
                    <td class="text-primary"><?=date("d-m-Y H:i", $data['time']); ?></td>
                </tr>
<?php } if($limit < $total_record){?>
<td class="text-center" colspan="6"><a onclick="page=<?php echo $page+1;?>;load_page();">Xem thêm</a></td>
<?php }}else{?>
<tr><td colspan="6" class="text-center"><p>Bạn Chưa Có Cuộc Giao Dịch Nào !</p></td></tr>
<?php }?>




