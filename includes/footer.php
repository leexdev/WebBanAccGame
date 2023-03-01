<?php

$count_buy = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` != '0'")+$db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0'")+4756;

$acc = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0'") + $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0'");
$members = $db->fetch_row("SELECT COUNT(*) FROM `accounts`")+7623;
?>
<div class="sl-footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-4">
Chuyên bán ACC game Liên Quân, Free Fire, Pubg Mobile và có phần Thử Vận May nếu may mắn quý khách sẽ có cơ hội nhận được acc vip.
<br />
Shop giao dịch hoàn toàn tự động 24/24, với đội CSKH nhiệt tình và thân thiện sẽ làm hài lòng quý khách.
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">

Chúng tôi làm việc một cách chuyên nghiệp, uy tín, nhanh chóng và luôn đặt quyền lợi của bạn lên hàng đầu

Với Tiêu Chí Khách Hàng Là Trên Hết Shop Chúng Tôi Sẽ Mang Đến Khách Hàng Những Trải Nghiệm Ưng Ý Nhất

            </div>

   <div class="col-xs-12 col-sm-12 col-md-4">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4">
                    <div class="fb-page" data-href="<?=$settings['fb_admin'];?>" data-tabs="timeline" data-height="270" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$settings['fb_admin'];?>" class="fb-xfbml-parse-ignore"><a href="<?=$settings['fb_admin'];?>">FB</a></blockquote></div>
            </div>
        </div>
        <p class="sl-copyright">© 2022 Copyright <a href="https://tuanori.vn/" style="color: #ef282b"><b>TUANORI.VN</b></a></p>
    </div>
</div>

<!-- END: LAYOUT/FOOTERS/FOOTER-5 -->

<div class="c-layout-go2top">
	<i class="icon-arrow-up"></i>
</div>


<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,4187655,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<!-- Histats.com  END  -->
</body>
</html>