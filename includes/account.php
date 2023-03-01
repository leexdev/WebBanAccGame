<style>
    .mt-stand {
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
    }

    .mt-element-ribbon {
        position: relative;
        margin-bottom: 30px;
    }

        .mt-element-ribbon .ribbon-content {
            margin: 0;
            padding: 25px;
            clear: both;
        }

            .mt-element-ribbon .ribbon-content.no-padding {
                padding-top: 0;
            }

        .mt-element-ribbon .ribbon {
            padding: 6px 15px;
            z-index: 5;
            float: left;
            margin: 10px 0 0 -2px;
            clear: left;
            position: relative;
            background-color: #bac3d0;
            color: #384353;
            opacity: 0.9;
        }

            .mt-element-ribbon .ribbon.ribbon-right {
                float: right;
                clear: right;
                margin: 10px -2px 0 0;
            }

            .mt-element-ribbon .ribbon.ribbon-vertical-left {
                clear: none;
                margin: -2px 0 0 10px;
                padding: 14px;
                width: 41px;
                text-align: center;
            }

            .mt-element-ribbon .ribbon.ribbon-vertical-right {
                clear: none;
                float: right;
                margin: -2px 10px 0 0;
                padding: 14px;
                width: 41px;
                text-align: center;
            }

            .mt-element-ribbon .ribbon.ribbon-shadow {
                box-shadow: 2px 2px 7px rgba(0, 0, 0, 0.4);
            }

                .mt-element-ribbon .ribbon.ribbon-shadow.ribbon-right, .mt-element-ribbon .ribbon.ribbon-shadow.ribbon-vertical-right {
                    box-shadow: -2px 2px 7px rgba(0, 0, 0, 0.4);
                }

            .mt-element-ribbon .ribbon.ribbon-round {
                border-top-right-radius: 5px !important;
                border-bottom-right-radius: 5px !important;
            }

                .mt-element-ribbon .ribbon.ribbon-round.ribbon-right {
                    border-top-right-radius: 0px !important;
                    border-bottom-right-radius: 0px !important;
                    border-top-left-radius: 5px !important;
                    border-bottom-left-radius: 5px !important;
                }

                .mt-element-ribbon .ribbon.ribbon-round.ribbon-vertical-right, .mt-element-ribbon .ribbon.ribbon-round.ribbon-vertical-left {
                    border-top-right-radius: 0px !important;
                    border-bottom-right-radius: 5px !important;
                    border-top-left-radius: 0px !important;
                    border-bottom-left-radius: 5px !important;
                }

            .mt-element-ribbon .ribbon.ribbon-border:after {
                border: 1px solid;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-vert:after {
                border-top: none;
                border-bottom: none;
                border-left: 1px solid;
                border-right: 1px solid;
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-hor:after {
                border-top: 1px solid;
                border-bottom: 1px solid;
                border-left: none;
                border-right: none;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 0;
                right: 0;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash:after {
                border: 1px solid;
                border-style: dashed;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash-vert:after {
                border-top: none;
                border-bottom: none;
                border-left: 1px solid;
                border-right: 1px solid;
                border-left-style: dashed;
                border-right-style: dashed;
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash-hor:after {
                border-top: 1px solid;
                border-bottom: 1px solid;
                border-left: none;
                border-right: none;
                border-top-style: dashed;
                border-bottom-style: dashed;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 0;
                right: 0;
            }

            .mt-element-ribbon .ribbon.ribbon-clip {
                left: -10px;
                margin-left: 0;
            }

                .mt-element-ribbon .ribbon.ribbon-clip.ribbon-right {
                    left: auto;
                    right: -10px;
                    margin-right: 0;
                }

            .mt-element-ribbon .ribbon > .ribbon-sub {
                z-index: -1;
                position: absolute;
                padding: 0;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:before, .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:after {
                    content: '';
                    position: absolute;
                    border-style: solid;
                    border-color: transparent !important;
                    bottom: -10px;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:before {
                    border-width: 0 10px 10px 0;
                    border-right-color: #222 !important;
                    left: 0;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:before, .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:after {
                    content: '';
                    position: absolute;
                    border-style: solid;
                    border-color: transparent;
                    bottom: -10px;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:before {
                    border-right-color: transparent !important;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:after {
                    border-width: 0 0 10px 10px;
                    border-left-color: #222 !important;
                    right: 0;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-bookmark:after {
                    border-left: 21px solid;
                    border-right: 20px solid;
                    border-bottom: 1em solid transparent !important;
                    bottom: -1em;
                    content: '';
                    height: 0;
                    left: 0;
                    position: absolute;
                    width: 0;
                }

            .mt-element-ribbon .ribbon:after {
                border-color: #62748f;
            }

            .mt-element-ribbon .ribbon > .ribbon-sub {
                background-color: #bac3d0;
                color: #384353;
            }

                .mt-element-ribbon .ribbon > .ribbon-sub:after {
                    border-color: #62748f;
                    border-left-color: #bac3d0;
                    border-right-color: #bac3d0;
                }

            .mt-element-ribbon .ribbon.ribbon-color-default {
                background-color: #bac3d0;
                color: #384353;
            }

                .mt-element-ribbon .ribbon.ribbon-color-default:after {
                    border-color: #9ca8bb;
                }

                .mt-element-ribbon .ribbon.ribbon-color-default > .ribbon-sub {
                    background-color: #bac3d0;
                    color: #384353;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-default > .ribbon-sub:after {
                        border-color: #62748f;
                        border-left-color: #bac3d0;
                        border-right-color: #bac3d0;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-primary {
                background-color: #337ab7;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-primary:after {
                    border-color: #286090;
                }

                .mt-element-ribbon .ribbon.ribbon-color-primary > .ribbon-sub {
                    background-color: #337ab7;
                    color: black;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-primary > .ribbon-sub:after {
                        border-color: #122b40;
                        border-left-color: #337ab7;
                        border-right-color: #337ab7;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-info {
                background-color: #659be0;
                color: #fff;
            }

.sa-lpmain {
    padding: 8px;
    background-color: rgba(20, 20, 20, 0.74);
}

                .mt-element-ribbon .ribbon.ribbon-color-info:after {
                    border-color: #3a80d7;
                }

                .mt-element-ribbon .ribbon.ribbon-color-info > .ribbon-sub {
                    background-color: #659be0;
                    color: #0c203a;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-info > .ribbon-sub:after {
                        border-color: #1d4f8e;
                        border-left-color: #659be0;
                        border-right-color: #659be0;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-success {
                background-color: #36c6d3;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-success:after {
                    border-color: #27a4b0;
                }

                .mt-element-ribbon .ribbon.ribbon-color-success > .ribbon-sub {
                    background-color: #36c6d3;
                    color: #020808;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-success > .ribbon-sub:after {
                        border-color: #14565c;
                        border-left-color: #36c6d3;
                        border-right-color: #36c6d3;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-danger {
                background-color: #ed6b75;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-danger:after {
                    border-color: #e73d4a;
                }

                .mt-element-ribbon .ribbon.ribbon-color-danger > .ribbon-sub {
                    background-color: #ed6b75;
                    color: #4f0a0f;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-danger > .ribbon-sub:after {
                        border-color: #a91520;
                        border-left-color: #ed6b75;
                        border-right-color: #ed6b75;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-warning {
                background-color: #F1C40F;
                color: #010100;
            }

                .mt-element-ribbon .ribbon.ribbon-color-warning:after {
                    border-color: #c29d0b;
                }

                .mt-element-ribbon .ribbon.ribbon-color-warning > .ribbon-sub {
                    background-color: #F1C40F;
                    color: #010100;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-warning > .ribbon-sub:after {
                        border-color: #614f06;
                        border-left-color: #F1C40F;
                        border-right-color: #F1C40F;
                    }

    .img-rank {
        width: 80px;
        height: 80px;
        z-index: 5;
        top: 240px;
        right: 25px;
        position: absolute;
    }

    .img-rank2 {
        width: 128px;
        height: 128px;
        z-index: 5;
        top: 180px;
        right: -15px;
        position: absolute;
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
    }

    .img-khung {
        width: 72px;
        height: 72px;
        z-index: 4;
        top: 200px;
        right: 45px;
        position: absolute;
        -ms-transform: rotate(-10deg);
        -webkit-transform: rotate(-10deg);
        transform: rotate(-10deg);
    }

    .img-item {
        width: 50px;
        height: 50px;
        z-index: 4;
        top: 225px;
        right: 85px;
        position: absolute;
        -ms-transform: rotate(-25deg);
        -webkit-transform: rotate(-25deg);
        transform: rotate(-25deg);
    }
</style>


			<div class="container">
            
			    
				
	<div class="">	<div class="row">
		<div class="col-md-12 col-sm-6 col-xs-6 m-t-15 m-b-20">
<div class="c-layout-sidebar-content ">
 		<div class="c-content-title-1">
					<h3 class="c-font-uppercase c-font-bold">ACC FREE FIRE</h3>
					<div class="c-line-left"></div>
				</div>
				<form class="form-horizontal form-find m-b-20" role="form" method="get">

					<div class="row">
            </div>
<script>var type = "<?=GET('type');?>";</script>
<script src="/assets/js/bootstrap3-typeahead.min.js"></script>
<script src="/assets/js/Custom/ffilter.js"></script>


      </div>
            </div>




<script src="/assets/boot.js"></script>

<script src="/assets/filter.js"></script>
<form id="vl" class="form-inline m-b-10" role="form">
    <input type="hidden" name="total" value="646">
    <input type="hidden" name="type" value="LQ">



            <div class="sa-filter">
            </div>
            </div>
            <div class="sa-lpmain"></div>
            <div id="loading" style="text-align: center; margin-bottom: 30px;">
                <img src="/assets/images/loading.gif">
            </div>
        </div>
    </div>
</div>
<?php $luauytin_tb = new Info; if($luauytin_tb->notify_account(GET('type')) != ''):?>
<script type="text/javascript">
               swal({   
                        title: "Thông báo",
                            html: true,
                            text: "<?=$luauytin_tb->notify_account(GET('type'));?>",   
                            showConfirmButton:true
        
                     }, function() {
                         
                         
                        });
</script>
<?php endif;?>