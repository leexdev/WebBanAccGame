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
$page = (int)POST("page");

$total_record = $db->fetch_row("SELECT COUNT(id) FROM `history_wheel1` LIMIT 1");
$limit = 15*$page > 90 ? 90:15*$page;
$sql_history = "SELECT * FROM `history_wheel1` WHERE `hide` = '0' ORDER BY `time` DESC  LIMIT ".$limit;

// Nếu có 
if ($total_record){
foreach ($db->fetch_assoc($sql_history, 0) as $key => $data){
?>
                <tr>
                    <td><?=$data['name'];?></td>
                    <td><?=$data['prize'];?></td>
                    <td><?=$data['time'];?></td>
                </tr>
<?php } if($limit < $total_record && $limit < 90){?>
<td class="text-center" colspan="3"><a onclick="page=<?=$page+1;?>;history_wheel_public();" style="color: #a1c938;font-weight: 900;font-size: larger;">XEM THÊM <i class="fa fa-spinner fa-spin loading_other_2" style="display: none;"></i></a></td>
<?php }}else {
?>
<tr><td colspan="3" class="text-center"><p>KHÔNG CÓ DỮ LIỆU !</p></td></tr>
<?php
}
?>




