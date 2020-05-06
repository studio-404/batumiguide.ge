<?php defined('DIR') OR exit; ?> 
<div class="SimilarObjects g-shadow" style="position: relative;">
    <div class="g-shadow-up" style="width: 100%; height: 100%; background-color: transparent; position: absolute; left: 0; top: 0px;"></div>
    <div class="container">
            <div class="col-sm-6">
                <div class="DivTitle"><?php echo $title;?></div>
            </div>

            <div class="EventDiv">
                <!-- ListStyleEvent -->
                <div class="AllEventsDiv ListStyleEvent">
                    <div class="row">
                    <?php foreach($news as $a) : ?>
                        <div class="col-sm-12">
                            <a href="<?php echo href($a["id"]);?>" class="EventItem">
                                <div class="Image"><img src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>"/></div>
                                <div class="Info" style="height: auto;">
                                    <div class="Title" style="padding-bottom: 0px;">
                                        <?php echo $a["title"];?>
                                    </div>
                                    <!-- <div class="Date"><i class="fa fa-clock-o"></i> <?php echo $a["postdate"];?></div> -->
                                </div>
                                <div class="LinkButton"><i class="fa fa-angle-right"></i></div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                    </div>

                </div>
            </div>
    </div>
</div>