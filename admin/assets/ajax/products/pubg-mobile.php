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
$id_acc = $input->input_post("id_acc");
$where = "status = '0' AND type_account = 'PUBG Mobile' ";
if (!empty($username)) {
$where .= "AND username LIKE '%$username%' ";
}
if (!empty($id_acc)) {
$where .= "AND id = '$id_acc' ";
}

$total_record = $db->fetch_row("SELECT COUNT(id) FROM products WHERE $where LIMIT 1");
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
    $sql_get = "SELECT * FROM `products` WHERE $where ORDER BY `date_posted` DESC LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){
?>
                    <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <th>Mã số</th>
                                        <th>Tên đăng nhập</th>
                                        <th>Giá tiền</th>
                                        <th>Hạng</th>
                                        <th>Trang Phục</th>
                                        <th>Skin Súng</th>
                                        <th>Lever</th>
                                        <th>Ngày đăng</th>
                                        <th>Thao tác</th>
                                    </thead>
                                    <tbody>
<?php                            
$i=1;
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){ 
?>
                                        <tr>
                                            <td><?php echo $data["id"]; ?></td>
                                            <td><?php echo $data["username"]; ?></td>
                                            <td><?php echo number_format($data["price"], 0, '.', '.'); ?>đ</td>
                                            <td><?php echo $get_info->get_string_rank($data["rank"]); ?></td>
                                            <td><?php echo $data["skins_count"]; ?></td>
                                            <td><?php echo $data["champs_count"]; ?></td>
                                            <td><?php echo $data["gem_count"]; ?></td>
                                            <td><?php echo $data["date_posted"]; ?></td>
                                            <td>
                                            <button type="button" class="btn btn-primary btn-xs" title="Đẩy lên đầu" onclick="uptime_delacc('<?php echo $data["id"]; ?>','Đẩy lên đầu','uptime');"><i class="ti-arrow-up"></i></button>
                                            <a href="/admin/pubg-mobile/edit/<?php echo $data["id"]; ?>"><button type="button" class="btn btn-primary btn-xs" title="Chỉnh sửa"><span class="ti-pencil-alt2"></span></button></a> 
                                            <button type="button" class="btn btn-primary btn-xs" title="Xóa" onclick="uptime_delacc('<?php echo $data["id"]; ?>','Xóa acc','del_acc');"><span class="ti-trash"></span></button> 
                                            </td>
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
<div class="alert alert-info">Không có tài khoản nào
<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<?php
}
?>




