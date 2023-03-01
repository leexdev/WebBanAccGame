
<link rel="stylesheet" type="text/css" href="/assets/css/custom.css">
<?php if($settings['notify']):?>
<script type="text/javascript">
               swal({   
                        title: "Thông báo",
                            html: true,
                            text: "<?=$settings['notify'];?>",   
                            showConfirmButton:true
        
                     }, function() {
                         
                         
                        });
</script>
<?php endif;?>
<?php
$count_products = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0' AND `type_account` = 'Liên Quân Mobile'");
$count_products_buy = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` != '0' AND `type_account` = 'Liên Quân Mobile'")+845;
$count_products_ff = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0' AND `type_account` = 'Free Fire'");
$count_products_ff_buy = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` != '0' AND `type_account` = 'Free Fire'")+423;
$count_products_pubg = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` = '0' AND `type_account` = 'PUBG Mobile'");
$count_products_pubg_buy = $db->fetch_row("SELECT COUNT(*) FROM `products` WHERE `status` != '0' AND `type_account` = 'PUBG Mobile'")+656;
$count_rd_1 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '1'");
$count_rd_1_buy = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '1'")+652;
$count_rd_2 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '2'");
$count_rd_2_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '2'")+360;
$count_rd_3 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '3'");
$count_rd_3_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '3'")+846;
$count_rd_4 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '4'");
$count_rd_4_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '4'")+452;
$count_rd_5 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '5'");
$count_rd_5_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '5'")+253;
$count_rd_6 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '6'");
$count_rd_6_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '6'")+305;
$count_rd_7 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '7'");
$count_rd_7_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '7'")+305;
$count_rd_8 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '8'");
$count_rd_8_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '8'")+505;
$count_rd_9 = $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` = '0' AND `type` = '9'");
$count_rd_9_buy= $db->fetch_row("SELECT COUNT(*) FROM `acc_random` WHERE `status` != '0' AND `type` = '9'")+421;

?>
<div class="sl-search">
    <div class="container">
        <div class="sl-sebox">
            <div class="sl-row clearfix">
                <div class="sl-col col-md-12 col-xs-12">
                    <h1 class="sl-htit text-center" style="font-size: 29px;">LIÊN QUÂN MOBILE</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="sl-lprod">
    <div class="container">
        <div class="sllpbox">
            <div class="sl-produl clearfix">
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="garena/lien-quan.html" title="Tài Khoản Liên Quân 100% Trắng Thông Tin">
                                <h3 class="sl-prcode text-center"><span>ACC LIÊN QUÂN</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/acc.jpg" alt="Trắng TT - Đảm Đảm - Uy Tín"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                        <li>Tài Khoản Chưa Bán: <?=number_format($count_products);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_products_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="garena/lien-quan.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-lien-quan.html" title="THỬ VẬN MAY RANDOM 9K">
                                <h3 class="sl-prcode text-center"><span>THỬ VẬN MAY  <?=number_format($settings['rd_1']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/9Klq.jpg" alt="Thử vận may 9.000đ"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                        <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_1);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_1_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-lien-quan.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                     
                     <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-lien-quan-trung-cap.html" title="THỬ VẬN MAY RANDOM TRUNG CẤP 30k">
                                <h3 class="sl-prcode text-center"><span>Liên Quân  <?=number_format($settings['rd_2']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/30kGG.jpg" alt="Thử vận may 25.000đ"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                        <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_2);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_2_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-lien-quan-trung-cap.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-lien-quan-cao-cap.html" title="THỬ VẬN MAY RANDOM CAO CẤP 50.000 VNĐ">
                                <h3 class="sl-prcode text-center"><span>Liên Quân  <?=number_format($settings['rd_3']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/50kGG.jpg" alt="Thử vận may 50.000đ"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                        <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_3);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_3_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-lien-quan-cao-cap.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-lien-quan-sieu-cap.html" title="THỬ VẬN MAY RANDOM SIÊU CẤP 100.000 VNĐ">
                                <h3 class="sl-prcode text-center"><span>Liên Quân  <?=number_format($settings['rd_4']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/100kGG.jpg" alt="Thử vận may 100.000đ"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                       <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_4);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_4_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-lien-quan-sieu-cap.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-lien-quan-vip.html" title="THỬ VẬN MAY RANDOM SIÊU CẤP 200.000 VNĐ">
                                <h3 class="sl-prcode text-center"><span>Liên Quân  <?=number_format($settings['rd_5']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/200kGG.jpg" alt="Thử vận may"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                       <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_5);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_5_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-lien-quan-vip.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-lien-quan-sieu-vip.html" title="THỬ VẬN MAY KIM CƯƠNG">
                                <h3 class="sl-prcode text-center"><span>Vận May Kim Cương <?=number_format($settings['rd_6']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/50kffKC.jpg" alt="Thử vận may"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                       <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_6);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_6_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-lien-quan-sieu-vip.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="garena/free-fire.html" title="Tài Khoản Free Fire">
                                <h3 class="sl-prcode text-center"><span>ACC FREE FIRE</span></h3>
                                <p class="sl-primg"><img src="/assets/images/free-fire.jpg" alt="Trắng TT - Đảm Đảm - Uy Tín"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                        <li>Tài Khoản Chưa Bán: <?=number_format($count_products_ff);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_products_ff_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="garena/free-fire.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-free-fire.html" title="THỬ VẬN MAY">
                                <h3 class="sl-prcode text-center"><span>Thử Vận May 9k Free Fire <?=number_format($settings['rd_7']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/9ffk.jpg" alt="Thử vận may"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                       <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_7);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_7_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-free-fire.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/garena/random-free-fire-vip.html" title="THỬ VẬN MAY">
                                <h3 class="sl-prcode text-center"><span>Thử Vận May 50k Free Fire<?=number_format($settings['rd_9']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/50k.jpg" alt="Thử vận may"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                       <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_9);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_9_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/garena/random-free-fire-vip.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/tencent/pubg-mobile.html" title="Tài Khoản Lpubg mobile">
                                <h3 class="sl-prcode text-center"><span>ACC PUBG MOBILE</span></h3>
                                <p class="sl-primg"><img src="/assets/images/bg-pubg-mobile.jpg" alt="Trắng TT - Đảm Đảm - Uy Tín"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                        <li>Tài Khoản Chưa Bán: <?=number_format($count_products_pubg);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_products_pubg_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/tencent/pubg-mobile.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="sl-prodli">
                        <div class="sl-prodbox">
                            <a class="sl-prlinks" href="/tencent/random-pubg-mobile.html" title="THỬ VẬN MAY">
                                <h3 class="sl-prcode text-center"><span>Thử Vận May 50K PUBGMB <?=number_format($settings['rd_8']);?> VNĐ</span></h3>
                                <p class="sl-primg"><img src="/assets/images/thum_random/50kpubgmb.jpg" alt="Thử vận may"></p>
                            </a>
                            <div class="sl-prifs">
                                <div class="sl-prifbot">
                                    <ul>
                                       <li>Tài Khoản Chưa Bán: <?=number_format($count_rd_8);?></li>
                                        <li>Tài Khoản Đã Bán: <?=number_format($count_rd_8_buy);?></li>
                                    </ul>
                                </div>

                                <p class="sl-prbot"><a href="/tencent/random-pubg-mobile.html" title="XEM TẤT CẢ" class="sl-btnod">XEM TẤT CẢ</a></p>
                            </div>
                        </div>
                    </div>
                                
                                        
            </div>
            
        </div>
    </div>
</div>

<div class="container" style="margin-top: 15px;">
    <link rel="stylesheet" href="/assets/css/luauytin-ahihi.css">
    <div class="fan">
        <div class="col-md-6 features">
            <h3>DỊCH VỤ CỦA CHÚNG TÔI</h3>
            <div class="support">
                <div class="col-md-2 ficon hvr-rectangle-out">
                    <i class="fa fa-user " aria-hidden="true"></i>
                </div>
                <div class="col-md-10 ftext">
                    <h4>Tự động giao dịch</h4>
                    <p>Thanh toán tự động 24/7 bằng cách nạp tiền mua acc.</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="shipping">
                <div class="col-md-2 ficon hvr-rectangle-out">
                    <i class="fa fa-bus" aria-hidden="true"></i>
                </div>
                <div class="col-md-10 ftext">
                    <h4>Giao dịch an toàn</h4>
                    <p>Có thể giao dịch thủ công thông qua các thông tin trong phần liên hệ.</p>
                </div>  
                <div class="clearfix"></div>
            </div>
            <div class="money-back">
                <div class="col-md-2 ficon hvr-rectangle-out">
                    <i class="fa fa-money" aria-hidden="true"></i>
                </div>
                <div class="col-md-10 ftext">
                    <h4>Uy tín hàng đầu</h4>
                    <p>Cam kết tất cả tài khoản trên website đều đúng như thông tin và hình ảnh trên web.</p>
                </div>  
                <div class="clearfix"></div>                
            </div>
        </div>
        <div class="col-md-6 testimonials">
            <div class="test-inner">
                <div class="wmuSlider example1 animated wow slideInUp" data-wow-delay=".5s" style="height: 291px;">
                    <div class="wmuSliderWrapper">
                        <article style="position: absolute; width: 100%; opacity: 0;"> 
                            <div class="banner-wrap">
                                <img src="/assets/images/bechanh.png" alt=" " class="img-responsive">
                                <p>Shop bán acc liên quân rẻ nhất mà tôi từng gặp. Có dịp tôi sẽ ủng hộ tiếp!</p>
                                <h4># Bé Chanh</h4>
                            </div>
                        </article>
                        <article style="position: relative; width: 100%; opacity: 1;"> 
                            <div class="banner-wrap">
                                <img src="/assets/images/kinas.png" alt=" " class="img-responsive">
                                <p>Chủ shop nhiệt tình, chất lượng trên cả tuyệt vời. Đây đúng là shop acc số 1 Việt Nam!</p>
                                <h4># Kinas</h4>
                            </div>
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;">
                            <div class="banner-wrap">
                                <img src="/assets/images/hhcc.png" alt=" " class="img-responsive">
                                <p>Mua acc ở đây tôi không có gì phàn nàn, giá quá rẻ mà acc lại quá ngon! Sẽ tiếp tục ủng hộ nếu có cơ hội.</p>
                                <h4># HHCC</h4>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
                <script src="/assets/js/jquery.wmuSlider.js"></script> 
                                <script>
                                    $('.example1').wmuSlider();         
                                </script> 
</div>