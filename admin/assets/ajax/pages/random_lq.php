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
$get_info = new Info;
if(!is_admin()){
?>
<div class="alert alert-warning">Bạn không có quyền xem thông tin này !
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
exit;
}elseif(!$_POST){
exit;
}

$input = new Input;
$page = (int)$input->input_post("page");
$username = $input->input_post("username");
$id = $input->input_post("id");
$where = "status != '0' ";

if (!empty($username)) {
$where .= "AND iduser LIKE '%$username%' ";
}
if (!empty($id)) {
$where .= "AND id = '$id' ";
}
$total_record = $db->fetch_row("SELECT COUNT(id) FROM acc_random WHERE $where LIMIT 1");
    // config phân trang
    $config = array(
      "current_page" => $page,
      "total_record" => $total_record,
      "limit" => "20",
      "range" => "5",
      "link_first" => "",
      "link_full" => "?page={page}"
    );
    
    $paging = new Pagination;
    $paging->init($config);
    $sql_get = "SELECT * FROM `acc_random` WHERE $where ORDER BY `time` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>Mã số</th>
                                        <th>ID User</th>
                                        <th>ID Name</th>
                                        <th>Tài khoản</th>
                                        <th>Mật khẩu</th>
                                        <th>Loại</th>
                                        <th>Thời gian</th>
                                    </thead>
                                    <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){
?>
                                        <tr>
                                            <td><?php echo $data["id"]; ?></td>
                                            <td><?php echo $data["iduser"];?></td>
                                            <td><?php echo $data["id_name"];?></td>
                                            <td><?php echo $data["username"];?></td>
                                            <td><?php echo $data["password"];?></td>
                                            <td><?php echo $get_info->random_level($data["type"]); ?></td>
                                            <td><?php echo $data["time"];?></td>
                                        </tr>



<?php 
$i++;
}
?>
                        </tbody>
                        </table>
                    </div>
                    
<?php
echo $paging->html_list(); // page
}else {
?>
<div class="alert alert-info">Không có thông tin
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




