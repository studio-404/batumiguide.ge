<?php defined('DIR') OR exit; ?>

  <!-- <pre> <?php 
  $gets = get_defined_vars();
  print_r($gets["catalogs"]);
  ?> </pre>-->

<div class="SmallHeaderInside display_none_mobile g-border-top-grey" style="float: none; margin-bottom: 0">
  <div class="container">       
    <div class="CategoryTitle">
      <div class="col-sm-12"> 
        <button class="OrangeButtonRound gsearchButton"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
        <span class="g-maptext"><?=l("countobject")." ( ".$catalogs[0]["counted"]." )"?></span>
      </div>
    </div>
    <div class="HeaderWidthRight" style="margin-top: 0px;">         
      <div class="row">       
        <a href="/<?=l()?>/map" class="col-sm-2 ColSm222 g-mapicon-box">
          <button class="OrangeButtonRound gsearchButton"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
          <span class="g-maptext"><?=l("mapview")?></span>
        </a>
      </div>         
    </div> 
  </div>
</div>


<div class="CategoriesPage" style="position: relative;">
  <div class="g-shadow-up" style="width: 100%; height: calc(100% + 5px); background-color: transparent; position: absolute; left: 0; top: -5px;"></div>

  <div class="container">

    <div class="CategoriesDiv" style="width: 100%;">
      <div class="row" id="gresults">
        <?php 
        foreach($catalogs as $item): 
           $link = href($id, array(), l(), $item['id']);
        ?>
        <div class="col-sm-2">
          <a href="<?=$link?>" class="Item">
            <div class="Image"><img src="<?=$item["image2"]?>" title="<?=htmlentities($item["title"])?>"></div>
            <div class="Info">
              <!--<div class="RatingCount"><i class="fa fa-star"></i> 4.3</div>-->
              <div class="CompanyLogo"><img src="<?=$item["image1"]?>"></div>
              <div class="Category"><?=$item["title"]?></div>
              <div class="Title"><?=$item["title"]?></div>
              <li class="Address"><?=$item['address']?></li>
              <li class="Time"><?=$item['SatSun']?></li>
              <?php if($item["recommended"]==1):?>
              <div class="g-recommended">Recommended</div>
              <?php endif;?>
            </div>
          </a>
        </div> 
        <?php endforeach; ?>
      </div>
      <input type="hidden" name="loading" id="loading" value="false" />
      <input type="hidden" name="loaded" id="loaded" value="<?=c('catalog.per_page')?>" />
      <input type="hidden" name="storageid" id="storageid" value="0" />
      <div class="g-gifloader" style="margin: 20px 0; width: 100%; clear: both; text-align: center;">
                    <img src="img/loader2.gif" alt="" width="100" align="center" style="margin: 0 auto; width:100px;" alt="" />
                </div>
    </div>

  </div>

</div>

<script type="text/javascript">
  $(window).scroll(function() {
     if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
        var perpage = parseInt("<?=c('catalog.per_page')?>");
        var total = parseInt("<?=$catalogs[0]["counted"]?>");
        callAjax('catalogs', perpage, total);
     }
  });  
</script>

