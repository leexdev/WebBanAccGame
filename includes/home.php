
<style>
    
    .tm-statistic .txt-stt h2{font: bold 40px/40px Arial, sans-serif; color: #f3bb6b; text-shadow: 0 0 5px rgba(0, 0, 0, 0.75);}
          .about-home {
    width: 100%;
    color:black;
    float: left;
    clear: both;
    display: block;
    font-size: 14px;
    line-height: 22px;
    padding: 2%;
    margin-bottom: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background: #f5f5f5;
}
#prlg-Wrapper {
  overflow: hidden;
  /* width: 964px; */
  background-color: #333;
  height: 266px;
  margin-top: 25px;
  border: 4px solid white;
}

/* line 32, ../sass/screen.scss */
#prlg-Container {
  width: 2000px;
}
/* line 35, ../sass/screen.scss */
#prlg-Container .prlg-skewCon {
  position: relative;
  left: -77px;
  top: -41px;
  overflow: hidden;
  height: 407px;
  -webkit-transform: skew(-24deg, 0);
  -moz-transform: skew(-24deg, 0);
  -ms-transform: skew(-24deg, 0);
  -o-transform: skew(-24deg, 0);
  transform: skew(-24deg, 0);
  float: left;
  border-right: 10px solid white;
}
/* line 46, ../sass/screen.scss */
#prlg-Container .prlg-unSkewCon {
  width: 100%;
  -webkit-transform: skew(24deg, 0);
  -moz-transform: skew(24deg, 0);
  -ms-transform: skew(24deg, 0);
  -o-transform: skew(24deg, 0);
  transform: skew(24deg, 0);
  position: relative;
  left: -42px;
  top: 11px;
  display: block;
}
/* line 55, ../sass/screen.scss */
#prlg-Container .prlg-image img {
  /* width: 400px; */
  -webkit-animation: blur 1s ease-in-out;
}
/* line 59, ../sass/screen.scss */

#prlg-Container .prlg-image:hover  b.vl{
  border: 2px solid white;


  display:block;

}

/* line 63, ../sass/screen.scss */
#prlg-Container .prlg-title {
  background: rgb(253, 182, 3);
  /* height: 32px; */
  line-height: 34px;
  position: absolute;
  padding-left: 24px;
  /* text-transform: uppercase; */
  text-align: left;
  top: 30px;
  left: 104px;
  width: 100%;
}
/* line 74, ../sass/screen.scss */
#prlg-Container .prlg-title a {
  color: #fff;
}
/* line 79, ../sass/screen.scss */
#prlg-Container .bottom .prlg-title {
  top: 29px;
  left: 42px;
}
/* line 84, ../sass/screen.scss */
#prlg-Container .prlg-skewCon.bottom:first-child .prlg-title {

    
}

b.vl {
    display: none;
    background-color: rgba(239, 0, 0, 0.075) !important;
    position: absolute;
    top: 22%;
    left: 20%;
    color: #fdb603;
    padding: 7px;
    font-size: 35px;
}

@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 480px) {
b.vl {
  display: block;background-color: rgba(239, 0, 0, 0.075) !important;position: absolute;top: 23%;left: 12%;color: #ffffff;padding: 7px;font-size: 29px;}

  }

</style>
<?php
$count_products = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0'");
$count_products_buy = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` != '0'")+6845;
$count_rd_1 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '1'");
$count_rd_1_buy = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '1'")+3652;
$count_rd_2 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '2'");
$count_rd_2_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '2'")+1036;
$count_rd_3 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '3'");
$count_rd_3_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '3'")+846;
$count_rd_4 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '4'");
$count_rd_4_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '4'")+452;
?>
<div class="sa-mainsa">
    <div class="container">
<div id="prlg-Wrapper">
            <div id="prlg-Container">
                <div class="prlg-skewCon bottom" style="width:10%;    background: rgb(253, 182, 3);">
                    <div class="prlg-unSkewCon">
                        <a class="prlg-image" href="#1"> <img src=""> </a>
                        <div class="prlg-title">
                        SHOP LIÊN QUÂN<br/>    
                        Đã bán : <?=$count_products_buy?><br/>
                        Chưa bán : <?=$count_products?></div>
                    </div>
                </div>
                <div class="prlg-skewCon bottom" style="width:70%">
                    <div class="prlg-unSkewCon">
                        <a class="prlg-image" href="/garena/lien-quan.html"> <b class="vl">Mua ngay</b><img src="/assets/images/5bf3930ea22cb.jpg"> </a>
                    </div>
                </div>
            </div>
        </div>
<div id="prlg-Wrapper">
            <div id="prlg-Container">
                <div class="prlg-skewCon bottom" style="width:10%;    background: rgb(253, 182, 3);">
                    <div class="prlg-unSkewCon">
                        <div class="prlg-title">
                            RANDOM <?=$settings['rd_1']*0.001;?>K<br/>    
                            Đã bán : <?=$count_rd_1_buy?><br/>
                            Chưa bán : <?=$count_rd_1?>
                        </div>
                    </div>
                </div>
                <div class="prlg-skewCon bottom" style="width:60%">
                    <div class="prlg-unSkewCon">
                        <a class="prlg-image" href="/garena/random-lien-quan.html"> <b class="vl">Mua ngay</b><img src="/assets/images/random.png"></a>
                    </div>
                </div>
            </div>
        </div>
        
<div id="prlg-Wrapper">
            <div id="prlg-Container">
                <div class="prlg-skewCon bottom" style="width:10%;    background: rgb(253, 182, 3);">
                    <div class="prlg-unSkewCon">
                        <div class="prlg-title">
                            RAMDOM TRUNG CẤP <?=$settings['rd_2']*0.001;?>K<br/>    
                            Đã bán : <?=$count_rd_2_buy?><br/>
                            Chưa bán : <?=$count_rd_2?>
                        </div>
                    </div>
                </div>
                <div class="prlg-skewCon bottom" style="width:60%">
                    <div class="prlg-unSkewCon">
                        <a class="prlg-image" href="/garena/random-lien-quan-trung-cap.html"> <b class="vl">Mua ngay</b><img src="/assets/images/random_trung.jpg"> </a>
                    </div>
                </div>
            </div>
</div>
<div id="prlg-Wrapper">
            <div id="prlg-Container">
                <div class="prlg-skewCon bottom" style="width:10%;    background: rgb(253, 182, 3);">
                    <div class="prlg-unSkewCon">
                        <div class="prlg-title">
                            RAMDOM CAO CẤP <?=$settings['rd_3']*0.001;?>K<br/>    
                            Đã bán : <?=$count_rd_3_buy?><br/>
                            Chưa bán : <?=$count_rd_3?>
                        </div>
                    </div>
                </div>
                <div class="prlg-skewCon bottom" style="width:60%">
                    <div class="prlg-unSkewCon">
                        <a class="prlg-image" href="/garena/random-lien-quan-cao-cap.html"> <b class="vl">Mua ngay</b><img src="/assets/images/random_cao.jpg"> </a>
                    </div>
                </div>
            </div>
</div>
<div id="prlg-Wrapper">
            <div id="prlg-Container">
                <div class="prlg-skewCon bottom" style="width:10%;    background: rgb(253, 182, 3);">
                    <div class="prlg-unSkewCon">
                        <div class="prlg-title">
                            RAMDOM SIÊU CẤP <?=$settings['rd_4']*0.001;?>K<br/>    
                            Đã bán : <?=$count_rd_4_buy?><br/>
                            Chưa bán : <?=$count_rd_4?>
                        </div>
                    </div>
                </div>
                <div class="prlg-skewCon bottom" style="width:60%">
                    <div class="prlg-unSkewCon">
                        <a class="prlg-image" href="/garena/random-lien-quan-sieu-cap.html"> <b class="vl">Mua ngay</b><img src="/assets/images/random_sieu.jpg"> </a>
                    </div>
                </div>
            </div>
</div>

</div>
</div>
<?php if (!empty($settings['notify'])): ?>
<div class="modal fade" id="modal-ads" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><center>THÔNG BÁO</center></h4>
                </div>
            <div class="modal-body">
            <p><?=$settings['notify']?></p>
            </div>
        </div>
    </div></div>
<?php endif; ?>