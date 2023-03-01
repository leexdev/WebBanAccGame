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
    
            <div class="sc_prod_cate">
            <div class="container"  >



                  <div class="c-content-title-4">
              					<h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">Shop Bán Acc RANDOM FF - Bán Acc RANDOM FF Giá Rẻ, Uy Tín Hàng Đầu Việt Nam </span></h3>
              				</div>




<div class="row">
           
              
       <div class=" sc_prod_cate">
            <div class="m-l-10 m-r-10">

            <div class="list_prod_cate clearfix">






<?php
foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
                        <div class="row item-list">                    
                    <div class="col-sm-6 col-md-3" id="acc-11893">
                            <div class="classWithPad">
                                <div class="image">

                                    <a href="#acc-11893">
                                        <img src="data:image/jpeg;base64,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">
                                        <span class="ms">MS: <?=$data['id'];?></span>
                                    </a>

                                </div>
                            <div class="attribute_info">
                                <div class="row">
                                   <div class="col-xs-6 a_att"> Skin: <span class="c-font-red">  Ngẫu Nhiên</span></div>
                                    <div class="col-xs-6 a_att"> Trang Phục: <span class="c-font-red">  Ngẫu Nhiên</span></div> 
                                </div>
                            </div>
                                     <div class="a-more">
            <div class="row">
                <div class="col-xs-6">
                    <div class="price_item">
                       <?=number_format($price)?>đ

                    </div>
                </div>
                <div class="col-xs-6 ">
                    <div class="view">
                        				  


                        <a onclick="buy_acc_random(<?=$data['id'];?>);">Mua</a>
                           
                                            </div>
                                        </div>

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




