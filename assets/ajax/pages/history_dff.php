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
<tr><td colspan="5" class="text-center"><p>Vui lòng đăng nhập để xem thông tin !</p></td></tr>
<?php
exit;
}elseif(!$_POST){
exit;
}

$iduser = $accounts['username'];
$input = new Input;
$page = (int)$input->input_post("page");

$total_record = $db->fetch_row("SELECT COUNT(id) FROM history_dff WHERE username = '{$iduser}' LIMIT 1");
$limit = 10*$page;
$sql_get_list_mem = "SELECT * FROM `history_dff` WHERE username = '{$iduser}' ORDER BY `time` DESC  LIMIT $limit";

// Nếu có 
if ($total_record){
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){?>
                <tr>
                    <td><?=$data['id']; ?></td>
                    <td><?=$data['id_ingame']; ?></td>
                    <td><?=$data['soluong']; ?></td>
                    <td><?=$data['time']; ?></td>
                    <td><b style="color:<?=$get_info -> color_status($data['status']); ?>;"><?=$get_info -> get_string_status_card($data['status']); ?></b></td>
                </tr>
<?php } if($limit < $total_record){?>
<td class="text-center" colspan="5"><a onclick="page=<?php echo $page+1;?>;load_page();">Xem thêm</a></td>
<?php }}else {
?>
<tr><td colspan="5" class="text-center"><p>Không có dữ liệu !</p></td></tr>
<?php
}
?>




