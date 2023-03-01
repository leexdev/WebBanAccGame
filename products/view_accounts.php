<?php
$id = GET('id');
$get_info = new Info;
$products= $db->fetch_assoc("SELECT * FROM `products` WHERE `id` = '{$id}'", 1);

//check ID products
if($db->num_rows($sql_products) == 0){
    new Redirect($_DOMAIN);
}
    //tạo json tướng
    $list_champ = $db->fetch_assoc("SELECT * FROM lq_champion ORDER BY name DESC",0); 
    $rows = array();
    foreach ($list_champ as $r) { 
        $rows[] = $r;}
    $data_champ = json_decode(json_encode($rows), true);
    $champ = text($products["champs"]);

    //tạo json trang phục
    $list_skin = $db->fetch_assoc("SELECT * FROM lq_skin ORDER BY name DESC",0); 
    $rows = array();
    foreach ($list_skin as $r) { 
        $rows[] = $r;}
    $data_skin = json_decode(json_encode($rows), true);
    $skin = text($products["skins"]);
?>




        <div class="container">


                        
            </div>
            <div class="c-content-title-1">
				<h3 class="c-font-uppercase c-center c-font-bold" style="    color: #0000000 !important">THÔNG TIN TÀI KHOẢN <span class="c-font-red">#<?=$products['id']?></span></h3>
				<div class="c-line-center c-theme-bg"></div>

				<h2 class="c-font-red c-font-center"></h2>

				<p class="c-font-center">Để Xem thêm chi tiết về tài khoản vui lòng kéo xuống bên dưới.</p>
			</div>

<div class="row">
			<div class="col-md-4 col-xs-6 wow animate fadeInLeft" style="opacity: 1; visibility: visible; animation-name: fadeInLeft;">
				<div class="c-content-step-1 c-opt-1">
					<div class="c-icon"><span class="c-hr c-hr-first"><i class="fa fa-star c-font-70 c-font-green"></i></span></div>
					<div class="c-title c-font-red c-font-20 c-font-bold c-font-uppercase">#<?=$products['id']?></div>
					<div class="c-title c-font-20 c-font-bold c-font-uppercase">Free Fire</div>

				</div>
			</div>
			<div class="col-md-4 col-xs-6 wow animate fadeInLeft" data-wow-delay="0.2s" style="opacity: 1; visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
				<div class="c-content-step-1 c-opt-1">
					<div class="c-icon"><span class="c-hr"><i class="fa fa-money c-font-70 c-font-green"></i></span></div>
										<div class="c-title c-font-20 c-font-bold c-font-uppercase"> GIÁ NICK: <span class="c-font-red"><?=number_format($products['price'], 0, '.', '.')?> VNĐ</span></div>
				</div>
			</div>
			<div class="col-md-4 col-xs-12 wow animate fadeInLeft" data-wow-delay="0.4s" style="opacity: 1; visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
				<div class="c-content-step-1 c-opt-1">
					<div class="c-icon"><span class="c-hr c-hr-last"><i class="fa fa-shopping-cart c-font-70 c-font-green" aria-hidden="true"></i></span></span></div>
					<div class="c-title c-font-20 c-font-bold c-font-uppercase" style="margin-top: 17px;"><button type="button" class="btn btn-info c-btn-square c-btn-uppercase c-btn-bold load-modal" onclick="buy_acc(<?=$products['id'];?>);"> MUA NGAY </button></div>
				</div>
			</div>
</div>
<br>
<br>


<div class="row">
    <div class="col-md-3">
    	<div class="c-content-title-2">
    		<div class="c-line c-dot c-theme-bg c-theme-bg-after"></div>
    		<p class="c-center c-font-uppercase c-font-bold">Rank <span class="c-font-red"><?=$get_info->get_string_rank($products['rank'])?></span></p>
    	</div>
    </div>
    <div class="col-md-3">
    	<div class="c-content-title-2">
    		<div class="c-line c-dot c-theme-bg c-theme-bg-after"></div>
    		<p class="c-center c-font-uppercase c-font-bold">SKIN SÚNG <span class="c-font-red"><?=($products['champs_count'])?></span></p>
    	</div>
    </div>
    <div class="col-md-3">
    	<div class="c-content-title-2">
    		<div class="c-line c-dot c-theme-bg c-theme-bg-after"></div>
    		<p class="c-center c-font-uppercase c-font-bold">TRANG PHỤC <span class="c-font-red"><?=($products['skins_count'])?></span></p>
    	</div>
    </div>
    
    <div class="col-md-3">
    	<div class="c-content-title-2">
    		<div class="c-line c-dot c-theme-bg c-theme-bg-after"></div>
    		<p class="c-center c-font-uppercase c-font-bold">SỐ PET <span class="c-font-red"><?=($products['gem_count'])?></span></p>
     	</div>
    </div>
    
</div>

		
        </div>


        <div class="container m-t-20 content_post">

    <div class="text-center">
        <b class="c-font-20">Hình ảnh chi tiết của tài khoản <span class="c-font-red">Free Fire #<?=$products['id']?></span></b>
    <br>
    <br>
    <div class="c-content-title-2">
    		<div class="c-line c-dot c-theme-bg c-theme-bg-after"></div>
    </div>
    
                             <?php
                                        $arr_info = glob($root."/assets/files/post/".$id."-*");
                                        if($arr_info){
                                         foreach ($arr_info as $inf) { 
                                            $img = str_replace($root,"",$inf);      
                                            $name = str_replace($root."/assets/files/post/","",$inf);?>
                                                                                <p>
                        <img src="<?php echo $img; ?>" class="zoom">
                    </p>
                                        
                                   
                             <?php }}?>
                                    <?php
                                        $arr_info = glob($root."/assets/files/gem/".$id."-*");
                                        if($arr_info){
                                         foreach ($arr_info as $inf) { 
                                            $img = str_replace($root,"",$inf);      
                                            $name = str_replace($root."/assets/files/gem/","",$inf);?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo $img; ?>">
                                        </div>
                                    <?php }}?>
                                </div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-pagination"></div>
                            </div>
                            </div>
                        </div>
                        <?php if(!empty($products["champs"])){?>
                        <div role="tabpanel" class="tab-pane" id="ct-tuong">
                            <ul class="l-i-c-acc">
                                <?php foreach ($data_champ as $list){
                                    if (in_array_r(strtolower(trim($list['name'])), $champ)) {?>
                                    <li><img src="/assets/images/lq_champion/<?=$list['img_name'];?>" title="<?=$list['name'];?>" alt="<?=$list['name'];?>"><label style="<?php if($list['vip'] != 'no'){echo 'background-color: yellow;color:red;';}?>"><?=$list['name'];?></label></li>
                                <?php }}?> 
                            </ul>
                        </div>
                        <?php }?>
                        <?php if(!empty($products["skins"])){?>
                        <div role="tabpanel" class="tab-pane" id="ct-trang-phuc">
                            <ul class="l-i-c-acc">
                                <?php foreach ($data_skin as $list){
                                    if (in_array_r(strtolower(trim($list['name'])), $skin)) {?>
                                    <li><img src="/assets/images/lq_skin/<?=$list['img_name'];?>" title="<?=$list['name'];?>" alt="<?=$list['name'];?>"><label style="<?php if($list['vip'] != 'no'){echo 'background-color: yellow;color:red;';}?>"><?=$list['name'];?></label></li>
                                <?php }}?> 
                            </ul>
                        </div>
                        <?php }?>

<?php
$total_record = $db->fetch_row("SELECT COUNT(id) FROM `products` WHERE `id` != '{$products['id']}' AND `status` = '0' AND `type_account` = '{$products['type_account']}' LIMIT 1");
$sql_get = "SELECT * FROM `products` WHERE `status` = '0' AND `id` != '{$products['id']}' AND `type_account` = '{$products['type_account']}' ORDER BY RAND() LIMIT 4";
if ($total_record){?>
                        <br/><br/>
                        <div class="sa-ttmore">
                            <h2 class="sa-ttmoretit">ACC CÙNG ĐƠN GIÁ</h2>
                            <div class="swiper-container sattmore swiper-container-horizontal">
                                <div class="sa-lpmain">
                                <div class="jscroll-inner">

<?php foreach ($db->fetch_assoc($sql_get, 0) as $key => $data){?>
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
                            </div>
                            </div>
                        </div>
<?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>