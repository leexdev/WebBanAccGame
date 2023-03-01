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

$input = new Input;
$page = (int)$input->input_post("page");
$type = (int)$input->input_post("type");
if($get_info->random_level($type) == '') {$type = 1;}
$where = "`status` = '0' AND type = '$type'";
$price = $settings['rd_'.$type.''];



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
    $total_pages = ceil($total_record/20);
    $paging = new Pagination;
    $paging->init($config);
    $sql_get = "SELECT * FROM `acc_random` WHERE $where ORDER BY RAND() LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){?>
<div class="jscroll-inner">
<?php
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
                    <div class="sa-lpcol">
                        <div class="sa-lpi" style="border-image: url(/assets/images/diamond.png) 25 round;">
                            <h3><span class="sa-lpcode">Thử vận may <?=number_format($price)?><sup>Đ</sup></span></h3>
                            <p class="sa-lpping"><img src="/assets/images/thumb/random-<?=$data['type'];?>.jpg"></p>
                            <div class="sa-lpbott clearfix">                                 
                                <div class="gg-info">
                                    <div class="gg-lpbif">
                                      <p class="hero"> ??</p>
                                      <p class="skin"> ??</p>
                                    </div>
                                    <div class="gg-lpbpri"> <p class="hero"> ??</p>
                                      <p class="skin"> <?=$get_info->random_level($type)?> <?=number_format($price*0.001)?>K</p>
                                    </div>
                                </div>
                                <div class="sa-lpbpri" style="text-align: left;">                                      
                                    <p class="sa-lpbpice" style="color: #f0b252;">#<?=$data['id'];?></p>
                                    <p></p>
                                </div>
                                <div class="sa-lpbpri">
                                    <p class="sa-lpbpice"><?=number_format($price)?><sup>Đ</sup></p>
                                    <p></p>
                                    <a class="sa-lpbbtn ac-buy-acc" onclick="buy_acc_random(<?=$data['id'];?>);">THỬ NGAY</a>
                                </div>
                            </div>
                        </div>
                    </div>



<?php }?>
</div>
<div class="clearfix"></div>
<?php if($total_pages > 1){?>
<ul class="sa-pagging text-center">
<li onclick="page=1;" class="PagedList-skipToFirst"><a href="?page=1">««</a></li>
<?php
for ($i=1; $i<=$total_pages; $i++) { 
if($page==$i):
echo "<li onclick='page=$i;' class='active'><a href='?page=$i'>".$i."</a></li>";
else:
echo "<li onclick='page=$i;'><a href='?page=$i'>".$i."</a></li>";
endif;
};
?>
<li onclick="page=<?=$total_pages?>;" class="PagedList-skipToLast"><a href="?page=<?=$total_pages?>">»»</a></li>
</ul>
<?php
}}else {
?>
<h3 class="text-center">Không Có Tài Khoản Nào Được Tìm Thấy</h3>
<?php
}
?>




