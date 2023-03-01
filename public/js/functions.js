(function($){
    $(document).ready(function () {
        web365.main.initEvent();
        if ($("#modal-ads").length > 0) {
            $('#modal-ads').modal('show');
        }
        // Show menu mobile
        $('.sa-imn').click(function(){
            $('.sa-menu').toggleClass('sa-mnshow');
        });
        
        $(window).bind('scroll', function () {
            if ($(window).scrollTop() > 600) {
                $('.sa-filbox-random').addClass('sa-hdfix');
            } else {
                $('.sa-filbox-random').removeClass('sa-hdfix');
            }
        });
	});

})(window.jQuery);

var web365 = web365 || {};
web365.main = (function () {


    function initEvent() {

        
        $('.ac-buy-acc').click(function(e) {
            e.preventDefault();
                 /*Há»i Ä‘iá»u khoáº£n*/
            // swal({
            // title: "XĂ¡c nháº­n mua.",
            // text: "Báº¡n báº¥m xĂ¡c nháº­n mua nghÄ©a lĂ  Ä‘á»“ng Ă½ vá»›i Ä‘iá»u khoáº£n cá»§a chĂºng tĂ´i.",
            // icon: "warning",
            // buttons: true,
            // dangerMode: true,
            // })
            // .then((willDelete) => {
            // if (willDelete) {
            
            
            
            $.post('/process/buy.php', {
             accId: $(this).attr('data-id'), type :$(this).attr('type')
            }, function(res) {
            
            
             if (res.error) {
              if (res.isNotLogin) {
               swal({
                 title: "Báº¡n chÆ°a Ä‘Äƒng nháº­p.",
                 text: "Báº¥m xĂ¡c nháº­n Ä‘á»ƒ Ä‘Äƒng nháº­p báº±ng facebook!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {
                 if (willDelete) {
                  document.location.href = '/oauth?login';
                 } else {
                  swal("Báº¡n vá»«a há»§y Ä‘Äƒng nháº­p!");
                 }
                });
              } else if (res.isNotMoney) {
               swal({
                 title: "Báº¡n khĂ´ng Ä‘á»§ tiá»n.",
                 text: "Báº¥m xĂ¡c nháº­n Ä‘á»ƒ náº¡p tiá»n vĂ o tĂ i khoáº£n!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {
                 if (willDelete) {
                  document.location.href = '/nap-tien.html';
                 } else {
                  swal("KhĂ´ng náº¡p tiá»n sao mĂ  mua háº£ báº¡n!");
                 }
                });
              }
              if (res.isNotLive) {
               swal({
                 title: "OPP, Warning!",
                 text: "TĂ i khoáº£n khĂ´ng tá»“n táº¡i, mua acc khĂ¡c nhĂ©.",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {});
              }
              if (res.isBuyMax) {
               var show = "Má»—i ngĂ y chá»‰ mua Ä‘Æ°á»£c 2 acc giĂ¡ dÆ°á»›i 100k, acc giĂ¡ trĂªn 100k mua khĂ´ng giá»›i háº¡n.";
               swal({
                 title: "Dá»«ng láº¡i.",
                 text: show,
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {});
              }
              if (res.isBuyMaxUser) {
               var show = "Báº¡n chá»‰ Ä‘Æ°á»£c mua " + res.solanmua + " trong má»™t ngĂ y!";
               swal({
                 title: "Dá»«ng láº¡i.",
                 text: show,
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {});
              }
              if (res.isNotActive) {
                    swal({
                      title: "TĂ i khoáº£n nĂ y Ä‘Ă£ Ä‘Æ°á»£c bĂ¡n.",
                      text: "TĂ i khoáº£n nĂ y Ä‘Ă£ bĂ¡n, vui lĂ²ng mua acc khĂ¡c!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                    });
                }
              if (res.isLoginFalse) {
               swal({
                 title: "TĂ i khoáº£n Ä‘Ă£ bá»‹ Ä‘á»•i máº­t kháº©u.",
                 text: "TĂ i khoáº£n Ä‘Ă£ bá»‹ Ä‘á»•i máº­t kháº©u, vui lĂ²ng mua acc khĂ¡c!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {});
              }
              if (res.isException) {
               swal({
                 title: "Há»‡ thá»‘ng Ä‘ang báº­n.",
                 text: "Há»‡ thá»‘ng Ä‘ang quĂ¡ táº£i, vui lĂ²ng báº¥m mua ngay sau 5s ná»¯a!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
                })
                .then((willDelete) => {});
              }
              
             } else {
              swal({
                title: "Báº¡n Ä‘Ă£ mua thĂ nh cĂ´ng.",
                text: "Báº¥m xĂ¡c nháº­n Ä‘á»ƒ xem tĂ i khoáº£n + máº­t kháº©u!",
                icon: "success",
                buttons: true,
                dangerMode: true,
               })
               .then((willDelete) => {
                if (willDelete) {
                 document.location.href = '/page/lich-su-mua.html';
                } else {
                 swal("Báº¡n cĂ³ thá»ƒ xem láº¡i thĂ´ng tin acc táº¡i lá»‹ch sá»­ mua!");
                }
               });
            
             }
            
            }, "json");
            
            
            // /*Há»i Ä‘iá»u khoáº£n*/              
            // } else {
            // swal("Báº¡n má»›i há»§y giao dá»‹ch!");
            // }
            // });
        
        
        
        });
        /*End buy */
        $('.submit-nap-the-page').click(function(e) {
            $('#card-charing-page .submit-nap-the-page').text('Loading ...');
            $.post('/process/napcham.php', $('#card-charing-page').serialize(), function(res) {
                        
                  
    
                 if (res.err) {
                      
                      swal({
                            title: "ThĂ´ng bĂ¡o!",
                            text: res.msg,
                            icon: "warning",
                            buttons: 'XĂ¡c nháº­n',
                            dangerMode: true,
                        })
                        .then((willDelete) => {});
    
                  } else {
                      swal({
                            title: "ThĂ´ng bĂ¡o!",
                            text: res.msg,
                            icon: "success",
                            buttons: 'XĂ¡c nháº­n',
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            document.location.reload();
                        });
    
                  }
                  
    
              }, "json").complete(function() {
                  $('#card-charing-page .submit-nap-the-page').text('Náº¡p Tháº»');
              });
        });
        $('.submit-nap-the-home').click(function(e) {
            $('#card-charing-home .submit-nap-the-home').text('Loading ...');
            $.post('/process/napcham.php', $('#card-charing-home').serialize(), function(res) {
                        
                  if (res.err) {
                      
                      if (res.isNotLogin) {
                       swal({
                         title: "Báº¡n chÆ°a Ä‘Äƒng nháº­p.",
                         text: "Báº¥m xĂ¡c nháº­n Ä‘á»ƒ Ä‘Äƒng nháº­p!",
                         icon: "warning",
                         buttons: true,
                         dangerMode: true,
                        })
                        .then((willDelete) => {
                         if (willDelete) {
                          document.location.href = '/oauth?login';
                         } else {
                          swal("Báº¡n vá»«a há»§y Ä‘Äƒng nháº­p!");
                         }
                        });
                      }else{
                      
                      swal({
                            title: "ThĂ´ng bĂ¡o!",
                            text: res.msg,
                            icon: "warning",
                            buttons: 'XĂ¡c nháº­n',
                            dangerMode: true,
                        })
                        .then((willDelete) => {});
                          
                      }
    
                  } else {
                      swal({
                            title: "ThĂ´ng bĂ¡o!",
                            text: res.msg,
                            icon: "success",
                            buttons: 'XĂ¡c nháº­n',
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            document.location.reload();
                        });
    
                  }
                
              }, "json").complete(function() {
                  $('#card-charing-home .submit-nap-the-home').text('Náº¡p Tháº»');
              });
              
        });
     
        /*Show model view random*/
        $('.xem-acc-random').click(function(e) {
            
            swal({
                title: "ThĂ´ng bĂ¡o!",
                text: "TĂ i khoáº£n Random. Thá»­ váº­n may ngay nĂ o!",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {});
        });
        /*End show view*/


        $('.sa-ptbtn').click(function (e) {
            e.preventDefault();

            $('#popImg .modal-title').html($(this).closest('li').find('label').html());

            $('.sa-popimg img').attr('src', $(this).attr('data-src'));

            $('#popImg').modal('show');

        });
        

    }


    return {
        initEvent: initEvent
    };

})();