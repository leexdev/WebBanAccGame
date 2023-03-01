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
$get_info_card = new Info;
if(!is_admin()){
?>
<div class="alert alert-warning">Vui lòng đăng nhập để xem thông tin
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
$name = $input->input_post("name");
$email = $input->input_post("email");
$phone = $input->input_post("phone");
$where = "id != '0' ";

if (!empty($username)) {
$where .= "AND username LIKE '%$username%' ";
}
if (!empty($name)) {
$where .= "AND name LIKE '%$name%' ";
}
if (!empty($phone)) {
$where .= "AND phone LIKE '%$phone%' ";
}
if (!empty($email)) {
$where .= "AND email LIKE '%$email%' ";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM accounts WHERE $where LIMIT 1");
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
    $sql_get_list_mem = "SELECT * FROM `accounts` WHERE $where ORDER BY `datetime` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Cash</th>
                                        <th>Thời gian</th>
                                        <th>Thao tác</th>
                                    </thead>
                                    <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get_list_mem, 0) as $key => $data){ 
?>
                            <tr <?=($data['block'] > 0) ? 'style="color: black;font-weight: bold;background-color: #fdafa8;"':'';?>>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['name']; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['phone']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo number_format($data['cash'], 0, '.', '.'); ?> <sup>đ</sup></td>
                                    <td><?php echo $data['datetime']; ?></td>
                                    <td><div class="btn-group"><a href="/admin/member/<?php echo $data['username']; ?>" target="_blank">
                                    <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip">Chỉnh sửa</button>
                                    </a></div></td>
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
<div class="alert alert-info">Không tìm thấy thành viên
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




