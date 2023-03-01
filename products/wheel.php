<?php
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/core/init.php');
//lấy dữ liệu vòng quay
$sql_setting_wheel =  "SELECT * FROM `setting_wheel`";
if ($db->num_rows($sql_setting_wheel)){
    $setting_wheel = $db->fetch_assoc($sql_setting_wheel, 1);
    $price = $setting_wheel['wheel_price'];//giá quay
}else{
    die('Bảo trì');
}
?>
<link rel="stylesheet" type="text/css" href="/assets/css/custom.css">
<link rel="stylesheet" type="text/css" href="assets/css/wheel.css">
<script type="text/javascript" src="/assets/js/Custom/wheel.js"></script>
<?php
$cash = "SELECT * FROM `history_wheel` order by id desc LIMIT 15";
if ($db->num_rows($cash) > 0):?>
<div class="sl-search">
    <div class="container">
        <div class="col-sm-12" style="background-color: #323131;font-size: 17px;color: #fff;">
            <marquee scrollamount="4" style="padding-top: 8px;">
<?php foreach ($db->fetch_assoc($cash, 0) as $key => $data){?>
<img src="/assets/images/run.gif" style="border-radius: 1.25em;width: 27px;"> <b style="color: #f5ff91;"><?=$data['name'];?></b> vừa quay số <?=time_stamp(strtotime($data['time']));?> 
<?php }?>

            </marquee>
        </div>
    </div>
</div>
<?php endif; ?>
      <style>
body {
	background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAA1BMVEX///+nxBvIAAAASElEQVR4nO3BgQAAAADDoPlTX+AIVQEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADwDcaiAAFXD1ujAAAAAElFTkSuQmCC");
} 

</style>
<meta name="csrf-token" content="bn7FAfcRlW8pp1yw5C1EfHQOFjarKszbzijaDy2c">
<div class="c-content-title-1 pd50">
    <h3 class="c-center c-font-uppercase c-font-bold" >Vòng quay mp40 mãng xà</h3>
    <div class="c-line-center c-theme-bg"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sa-mainsa">
    <div class="container">
        <div class="sa-logmain sa-themain">
            <div class="sa-charingbox">
                <div class="sa-logtct">
                    <div class="row">
                        <div class="col-md-6">
                            <section class="rotation">
                                <div class="play-spin">
                                    <a href="#" class="ani-zoom" id="start-played"><img src="https://shopkelygaming.net/vongquay/img/kimquay.png" alt="Play Center">
                                    </a>
                                    <img src="https://shopkelygaming.net/vongquay/img/vqmp40mangxa.png" alt="Play" id="rotate-play">
                                </div>
                                <br />
                                <style>
                                    .h3,
                                    h3 {
                                        font-size: 24px;
                                    }
                                    
                                    img#hu {
                                        width: 55%;
                                    }
                                </style>
                                <div class="text-center">
                                    <h3 class="num-play"><span><?=number_format($setting_wheel['wheel_price']);?>đ</span> mỗi lượt quay.</h3>
                                </div>
                            </section>
                        </div>
                        <div class="col-md-6">
                            <div class="sa-charingbox">
                                <div class="sa-charingbox">
                                    <div class="text-center">
                                        <img src="/assets/img/huvang.png" id="hu" class="text-center">
                                        <h3>Trong Hũ Vàng Có <span id="huvang" style="color: #ffc800;font-size: 26px;"><?=number_format($setting_wheel['huvang']);?>đ</span><h3>
            </div>
        <br />
                   </div>
                            </div>
</div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>