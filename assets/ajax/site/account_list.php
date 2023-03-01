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
<?php
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
<div class="row">
           
              
       <div class=" sc_prod_cate">
            <div class="m-l-10 m-r-10">

            <div class="list_prod_cate clearfix">

                    <div class="row item-list">
<div class="col-sm-6 col-md-3">
    <div class="classWithPad">
        <div class="image">

            <a href="/accounts/<?=$data['id'];?>.html">
                <img src="<?php echo $get_info->get_thumb($data['id']); ?>">
                <span class="ms">MS: <?=$data['id'];?></span>
                                   </a>
        </div>
        <div class="description">

        </div>
        <div class="attribute_info">
            <div class="row">

                   <?php if($data['type_account'] == 'Liên Quân Mobile'):?>
                    <?php else:?>
                						<div class="col-xs-6 a_att">Skin súng <span class="c-font-red"><?=$data['champs_count'];?></div>
												<div class="col-xs-6 a_att">Rank <span class="c-font-red"><?php echo $get_info->get_string_rank($data['rank']); ?></div>
						
                        						<div class="col-xs-6 a_att">Số Skin <span class="c-font-red"><?=$data['skins_count'];?></div>
												 <?php endif;?>
                
            </div>
        </div>
        <div class="a-more">
            <div class="row">
                <div class="col-xs-6">
                    <div class="price_item">
                       <?=number_format($data['price']);?>đ

                    </div>
                </div>
                <div class="col-xs-6 ">
                    <div class="view">
                        				  


                        <a href="/accounts/<?=$data['id'];?>.html">Chi tiết</a>
                           
            
                        
                                            </div>
                </div>

            </div>
        </div>
    </div>
</div>






<?php }?>
</div>
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




