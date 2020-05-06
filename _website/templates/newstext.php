<?php defined('DIR') OR exit; ?>

<!-- <div class="SmallHeaderInside ContactHeader g-border-top-grey">
    <div class="container">
        <div class="col-sm-12">
            
        </div>
    </div>
</div> -->

<div class="DescriptionPage Nobg g-float-left100 g-shadow" style="position: relative;">
    <div class="g-shadow-up" style="width: 100%; height: 100%; background-color: transparent; position: absolute; left: 0; top: 0px;"></div>
    <div class="container"> <!-- g-width900 -->
        <div class="col-sm-8">
            <div class="DescriptionContent AboutParentDiv g-desktop-100-plus-40" style="padding-top: 0px; padding-bottom: 0px;">
                <div class="cov">

                    <div class="DescriptionPaddingLeft">
                        <div class="DescInfo Width100">
                            <div class="col-sm-12">
                                <div class="ContactTitle" style="text-align: left; padding: 20px 0 0 0;">
                                    <?php echo $title ?>

                                    <?php $actual_link = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>
                                    <div style="clear: both; width: 100%;"></div>
                                    <div style="float: left; margin-bottom: 10px;">
                                        <div class="fb-like" data-href="<?=$actual_link?>" data-width="" data-layout="button" data-action="like" data-size="small" data-share="true"></div>

                                        <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
                                        <script type="IN/Share" data-url="https://www.linkedin.com"></script>
                                    </div>
                                    
                                    <div class="g-tweet" style="float: left; margin-top: 7px; margin-left: 5px; margin-bottom: 10px;">
                                    <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?=urlencode($title)?>" data-size="small">Tweet</a>
                                    </div>
                                    <script>window.twttr = (function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0],
                                    t = window.twttr || {};
                                    if (d.getElementById(id)) return t;
                                    js = d.createElement(s);
                                    js.id = id;
                                    js.src = "https://platform.twitter.com/widgets.js";
                                    fjs.parentNode.insertBefore(js, fjs);

                                    t._e = [];
                                    t.ready = function(f) {
                                    t._e.push(f);
                                    };

                                    return t;
                                    }(document, "script", "twitter-wjs"));</script>

                                </div>
                                <img alt="" src="<?php echo $image1;?>" class="Width100" />
                                    <br /><br />
                                <div class="Text">
                                    <?php echo $content ?>
                                </div>
                                <div class="TagsDiv">    
                                <?php
                                    $tags = explode(",", $meta_keys);
                                    foreach($tags as $tag) :
                                ?>
                                    <a href="<?php echo href(551).'?q='.urlencode(trim($tag));?>" class="Tag"><?php echo trim($tag);?></a>
                                <?php
                                    endforeach;
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="DescriptionSidebar g-width320-desc"> 
                        <?php 
                        $g_banners = g_banners();
                        $banner28 = array();
                        if(isset($g_banners["banner28"])){
                            if(!isset($_SESSION["banner28"])){
                                $_SESSION["banner28"] = 0;
                            }else{
                                if($_SESSION["banner28"]>=(count($g_banners["banner28"])-1)){
                                    $_SESSION["banner28"] = 0;
                                }else{
                                    $_SESSION["banner28"] = $_SESSION["banner28"]+1;    
                                }       
                            }
                            
                            $banner28 = $g_banners["banner28"][$_SESSION["banner28"]];
                        }
                        ?>

                        <div class="InsidePartnetIcons g-margin-top50-desc">
                            <?php if(isset($banner28) && count($banner28)>0){ ?>
                                <?php if($banner28["htmlstring"]==2){ ?>
                                    <iframe src="<?=$banner28["image1"]?>" frameborder="0" class="g-bannerleft g-border-solid-grey g-desktop-show-mobile-hide" style="width:100%; overflow:hidden;"></iframe>

                                    <iframe src="<?=$banner28["image2"]?>" frameborder="0" class="g-bannerleft g-border-solid-grey g-desktop-hide-mobile-show" style="width:100%; overflow:hidden;"></iframe>
                                <?php }else{ ?>         
                                    <a href="<?=$banner28["link"]?>" class="g-bannerleft g-border-solid-grey g-desktop-show-mobile-hide" style="background-image: url('<?=$banner28["image1"]?>');" title="<?=htmlentities($banner28["title"])?>" target="_blank"></a>

                                    <a href="<?=$banner28["link"]?>" class="g-bannerleft g-border-solid-grey g-desktop-hide-mobile-show" style="background-image: url('<?=$banner28["image2"]?>');" title="<?=htmlentities($banner28["title"])?>" target="_blank"></a>
                                <?php } ?>                              
                            <?php }else{ ?>
                            <div class="g-bannerleft">320x400</div>
                            <?php } ?>
                        </div>
                    </div>
        </div>
    </div>
</div>

<div style="clear: both;"></div>

<div class="g-SimilarObjects g-shadow-up" style="position: relative;">
    <div class="container">
        <div class="col-sm-6">
            <div class="DivTitle"><?=menu_title(551)?> <a href="<?=href(551)?>"><?=l("view.all")?></a></div>
        </div>
        <div class="col-sm-6 text-right">
            <div class="ArrowsDiv g-simarrows g-mobile-display-none">
                <div class="Arrow Right"><i class="fa fa-angle-right"></i></div>
                <div class="Arrow Left"><i class="fa fa-angle-left"></i></div>
            </div>
        </div>
        <div class="CategoriesDiv">
            <?php echo gblog(); ?>
        </div>
    </div>

    <div class="g-shadow" style="width: 100%; height: 74px; background-color: #f8f9fa; position: absolute; left: 0; bottom: 0px;"></div>
</div>
