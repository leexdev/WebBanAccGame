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

$total_record = $db->fetch_row("SELECT COUNT(id) FROM `history_latthe` WHERE `username` = '".$iduser."' LIMIT 1");
$limit = 15*$page;
$sql_history = "SELECT * FROM `history_latthe` WHERE `username` = '".$iduser."' ORDER BY `time` DESC  LIMIT ".$limit;
?>
// Nếu có 
   <div class="sa-ls-table table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td style="width: 60px;">ID</td>
                                                    <td>SỐ KIM CƯƠNG</td>
                                                    <td>THỜI GIAN</td>
                                                </tr>
                                            </thead>
                                            <tbody id="history_wheel3">
                                                  <?php
                                                  $danhuy2k5_user = $accounts['username'];
                                                    $slq_history_wheel = "SELECT * FROM `history_latthe` WHERE `username` = '$danhuy2k5_user' AND `type` != '0' ORDER BY `time` DESC LIMIT 7";
                                                    if ($db->num_rows($slq_history_wheel)){
                                                        foreach ($db->fetch_assoc($slq_history_wheel, 0) as $key => $row){?>
                                                    <tr>
                                                        <td><?=$row['id'];?></td>
                                                       <td><?=$row['diamon'];?></td>
                                                        <td><?=$row['time'];?></td>
                                                    </tr>
                                        
<?php } if($limit < $total_record){?>
<td class="text-center" colspan="3"><a onclick="page=<?=$page+1;?>;history_latthe();" style="color: #a1c938;font-weight: 900;font-size: larger;">XEM THÊM <i class="fa fa-spinner fa-spin loading_other" style="display: none;"></i></a></td>
<?php }}else {
?>
<tr><td colspan="3" class="text-center"><p>KHÔNG CÓ DỮ LIỆU !</p></td></tr>
<?php
}
?>




