<?php
$info = new Info;
$type = $info->random_level(GET('type')) != '' ? (int)GET('type'):1;
$luauytin = $info->random_level($type).' '.$settings['rd_'.$type]*0.001.'K';

?>
<script>
    var page = 1, type = '<?=$type?>';
       swal({   
            title: "<?=$luauytin;?>",   
            text: "<?=$info->random_notify($type);?>",   
            showConfirmButton:true
        }, function() {
        });
</script>
<div class="sa-mainsa">
    <div class="container">
        <div class="sa-lprod">
            <div class="sa-filter">
                <div class="row">
<?php /*
<div class="col-sm-7 text-center" style="margin-right: -11px; margin-left: 11px;">
                    <a class="button btn <?php echo ($type == 1) ? 'btn-danger':'btn-default';?>" href="/garena/random-lien-quan.html">LQ <?=$settings['rd_1']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 2) ? 'btn-danger':'btn-default';?>" href="/garena/random-lien-quan-trung-cap.html">LQ <?=$settings['rd_2']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 3) ? 'btn-danger':'btn-default';?>" href="/garena/random-lien-quan-cao-cap.html">LQ <?=$settings['rd_3']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 4) ? 'btn-danger':'btn-default';?>" href="/garena/random-lien-quan-sieu-cap.html">LQ <?=$settings['rd_4']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 5) ? 'btn-danger':'btn-default';?>" href="/garena/random-lien-quan-vip.html">LQ <?=$settings['rd_5']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 6) ? 'btn-danger':'btn-default';?>" href="/garena/random-kim-cong-ff-vip.html">LQ <?=$settings['rd_6']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 7) ? 'btn-danger':'btn-default';?>" href="/garena/random-free-fire.html">FreeFire <?=$settings['rd_7']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 9) ? 'btn-danger':'btn-default';?>" href="/tencent/random-free-fire-vip.html">FreeFire <?=$settings['rd_9']*0.001;?>K</a>
                    <a class="button btn <?php echo ($type == 8) ? 'btn-danger':'btn-default';?>" href="/tencent/random-pubg-mobile.html">PUBG-M <?=$settings['rd_7']*0.001;?>K</a>
</div>*/?>
<div class="col-sm-12">

</div></div></div></div></div></div>
<script src="/assets/js/bootstrap3-typeahead.min.js"></script>
<div class="sa-mainsa">
    <div class="container">
        <div class="sa-lprod">
            <div class="sa-lpmain"></div>
            <div id="loading" style="display: none; text-align: center; margin-bottom: 30px;">
                <img src="/assets/images/loading.gif">
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/Custom/random_filter.js"></script>