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
if (!is_client()) {
echo '<tr><td colspan="3" class="text-center"><p>VUI LÒNG ĐĂNG NHẬP !</p></td></tr>';
exit();}
$iduser = $accounts['username'];
$page = (int)POST("page");

$total_record = $db->fetch_row("SELECT COUNT(id) FROM `history_wheel2` WHERE `username` = '".$iduser."' LIMIT 1");
$limit = 15*$page;
$sql_history = "SELECT * FROM `history_wheel2` WHERE `username` = '".$iduser."' ORDER BY `time` DESC  LIMIT ".$limit;

// Nếu có 
if ($total_record){
foreach ($db->fetch_assoc($sql_history, 0) as $key => $data){
	$info = '';
	if($data['id_wheel'] != 0){
		$sql_wheel =  "SELECT * FROM `wheel2` WHERE `id` = '".$data['id_wheel']."' LIMIT 1";
		if ($db->num_rows($sql_wheel) > 0){
			$wheel = $db->fetch_assoc($sql_wheel, 1);
			$info = $wheel['status'] == 0 ? '<span style="color: #0082ff;"> (Chờ cập nhật code...)</span>':'. Code: <span style="color: #ffea00;">'.$wheel['username'].'</span>, Ghi chú: <span style="color: #00f8ff;">'.$wheel['password'].'</span>';
		}
	}
?>
                <tr>
                	<td><?=$data['id'];?></td>
                    <td><?=$data['prize'].$info;?></td>
                    <td><?=$data['time'];?></td>
                </tr>
<?php } if($limit < $total_record){?>
<td class="text-center" colspan="3"><a onclick="page=<?=$page+1;?>;history_wheel2();" style="color: #a1c938;font-weight: 900;font-size: larger;">XEM THÊM <i class="fa fa-spinner fa-spin loading_other" style="display: none;"></i></a></td>
<?php }}else {
?>
<tr><td colspan="3" class="text-center"><p>KHÔNG CÓ DỮ LIỆU !</p></td></tr>
<?php
}
?>




