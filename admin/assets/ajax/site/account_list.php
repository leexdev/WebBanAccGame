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

$type = $get_info->type_account($input->input_post("type")) != '' ? $get_info->type_account($input->input_post("type")) : 'Liên Quân Mobile';
$page = (int)$input->input_post("page");
$order = $input->input_post("order");
$price = $input->input_post("price");
$rank = $input->input_post("rank");
$champs = $input->input_post("champ_str");
$skins = $input->input_post("skin_str");
$where = "`status` = '0' AND `type_account` = '".$type."' ";

//giá
if($price == 1) {
  $where .= "AND price <= 50000 ";
}elseif($price == 2) {
  $where .= "AND price BETWEEN 50000 AND 100000 ";
}elseif($price == 3) {
  $where .= "AND price BETWEEN 100000 AND 500000 ";
}elseif($price == 4) {
  $where .= "AND price BETWEEN 500000 AND 1000000 ";
}elseif($price == 5) {
  $where .= "AND price >= 1000000 ";
}

//rank
switch ($rank) {
  case '0': // 
    $where .= "AND rank = 0 ";
  break; 
  case '2': // đồng
   $where .= "AND rank BETWEEN 2 AND 6 ";
  break;
  case '3': // bạc
   $where .= "AND rank BETWEEN 7 AND 11 ";
  break;
  case '4': // vàng
   $where .= "AND rank BETWEEN 12 AND 16 ";
  break;
  case '5': // bk
   $where .= "AND rank BETWEEN 17 AND 21 ";
  break;
  case '6': // kc
   $where .= "AND rank BETWEEN 22 AND 26 ";
  break;
  case '7': // kc
   $where .= "AND rank = 27 ";
  break;
  case '8': // kc
   $where .= "AND rank = 28 ";
  break;  
  default:
    $where .= "";
  break;
} 
if (!empty($champs)) {
$where .= "AND `champs` LIKE '%$champs%' ";
}   
if (!empty($skins)) {
$where .= "AND `skins` LIKE '%$skins%' ";
}

    if($order == 1) {
      $order = "`id` DESC ";
    }elseif($order == 2) {
      $order = "`price` DESC ";
    }elseif($order == 3) {
      $order = "`price` ASC ";
    }elseif($order == 4) {
      $order = "`champs_count` DESC ";
    }elseif($order == 5) {
      $order = "`champs_count` ASC ";
    }elseif($order == 6) {
      $order = "`skins_count` DESC ";
    }elseif($order == 7) {
      $order = "`skins_count` ASC ";
    }elseif($order == 8) {
      $order = "`rank` DESC ";
    }elseif($order == 9) {
      $order = "`rank` ASC ";
    }else{
      $order = "`date_posted` DESC ";
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
    $total_pages = ceil($total_record/20);
    $paging = new Pagination;
    $paging->init($config);
    $sql_get = "SELECT * FROM `products` WHERE $where ORDER BY $order LIMIT {$paging->getConfig()["start"]}, {$paging->getConfig()["limit"]}";

// Nếu có 
if ($total_record){?>
<div class="jscroll-inner">
<?php
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
                    <div class="sa-lpcol">
                        <div class="sa-lpi" style="border-image: url(/assets/images/diamond.png) 25 round;">
                          <a class="sa-lpimg" href="/accounts/<?=$data['id'];?>.html">
                                <p class="sa-lpping"><img src="<?php echo $get_info->get_thumb($data['id']); ?>"></p>                            
                            <div class="sa-lpinfo">
                                <div class="sa-lpits mcustomscrollbar mCustomScrollbar _mCS_2 mCS_no_scrollbar">
                                  <div id="mCSB_2" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: 197px;" tabindex="0">
                                    <div id="mCSB_2_container" class="mCSB_container mCS_y_hidden mCS_no_scrollbar_y" style="position:relative; top:0; left:0;" dir="ltr">
                                    <?php if($data['type_account'] == 'Liên Quân Mobile'):?>
                                      ● Rank: <?php echo $get_info->get_string_rank($data['rank']); ?><br/>
                                      ● Tướng: <?=$data['champs_count'];?><br/>
                                      ● Trang Phục: <?=$data['skins_count'];?><br/>
                                      ● Bảng Ngọc: <?=$data['gem_count'];?><br/>
                                    <?php else:?>
                                      ● Rank: <?php echo $get_info->get_string_rank($data['rank']); ?><br/>
                                      ● Skin Súng: <?=$data['champs_count'];?><br/>
                                      ● Trang Phục: <?=$data['skins_count'];?><br/>
                                      ● <?=$data['type_account'] == 'PUBG Mobile' ? 'Level':'Pet';?>: <?=$data['gem_count'];?><br/>
                                    <?php endif;?>
                                    <?php if($data['note']):?>
                                      ● <?=$data['note']?>
                                    <?php endif;?>
                                    </div>
                                  <div id="mCSB_2_scrollbar_vertical" class="mCSB_scrollTools mCSB_2_scrollbar mCS-light mCSB_scrollTools_vertical" style="display: none;">
                                    <div class="mCSB_draggerContainer">
                                      <div id="mCSB_2_dragger_vertical" class="mCSB_dragger" style="position: absolute; min-height: 0px; height: 0px; top: 0px;">
                                        <div class="mCSB_dragger_bar" style="line-height: 0px;"></div>
                                      </div>
                                      <div class="mCSB_draggerRail"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>                      
                        </div>
                            </a>
                            <div class="sa-lpbott clearfix">
                            <?php if($data['type_account'] != 'Liên Quân Mobile'):?>                  
                                <div class="gg-info">
                                    <div class="gg-lpbif">
                                      <p class="hero"> Skin Súng: <?=$data['champs_count'];?></p>
                                      <p class="skin"> Trang Phục: <?=$data['skins_count'];?></p>
                                    </div>
                                    <div class="gg-lpbpri"> <p class="hero"> <?=$data['type_account'] == 'PUBG Mobile' ? 'Level':'Pet';?>: <?=$data['gem_count'];?></p>
                                      <p class="skin"> <?php echo $get_info->get_string_rank($data['rank']); ?> </p>
                                    </div>
                                </div>
                            <?php else:?>
                                <div class="gg-info">
                                    <div class="gg-lpbif">
                                      <p class="hero"> Tướng: <?=$data['champs_count'];?></p>
                                      <p class="skin"> Skin: <?=$data['skins_count'];?></p>
                                    </div>
                                    <div class="gg-lpbpri"> <p class="hero"> Ngọc: <?=$data['gem_count'];?></p>
                                      <p class="skin"> <?php echo $get_info->get_string_rank($data['rank']); ?> </p>
                                    </div>
                                </div>
                            <?php endif;?>
                                <div class="sa-lpbpri" style="text-align: left;">                                      
                                    <p class="sa-lpbpice" style="color: #f0b252;">#<?=$data['id'];?></p>
                                    <p></p>
                                    <a href="/accounts/<?=$data['id'];?>.html" class="xem-acc" title="XEM ACC" style="color:white;">XEM ACC</a>
                                </div>
                                <div class="sa-lpbpri">
                                    <p class="sa-lpbpice"><?=number_format($data['price']);?><sup>Đ</sup></p>
                                    <p></p>
                                    <a class="sa-lpbbtn ac-buy-acc" onclick="buy_acc(<?=$data['id'];?>);">MUA NGAY</a>
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




