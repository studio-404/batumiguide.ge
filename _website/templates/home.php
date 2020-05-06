<?php defined('DIR') OR exit; ?>

<?php 
$g_banners = g_banners();
$banner26 = array();
if(isset($g_banners["banner26"])){
	if(!isset($_SESSION["banner26"])){
		$_SESSION["banner26"] = 0;
	}else{
		if($_SESSION["banner26"]>=(count($g_banners["banner26"])-1)){
			$_SESSION["banner26"] = 0;
		}else{
			$_SESSION["banner26"] = $_SESSION["banner26"]+1;	
		}		
	}
	
	$banner26 = $g_banners["banner26"][$_SESSION["banner26"]];
}

$banner29 = array();
if(isset($g_banners["banner29"])){
	if(!isset($_SESSION["banner29"])){
		$_SESSION["banner29"] = 0;
	}else{
		if($_SESSION["banner29"]>=(count($g_banners["banner29"])-1)){
			$_SESSION["banner29"] = 0;
		}else{
			$_SESSION["banner29"] = $_SESSION["banner29"]+1;	
		}		
	}
	
	$banner29 = $g_banners["banner29"][$_SESSION["banner29"]];
}

$banner30 = array();
if(isset($g_banners["banner30"])){
	if(!isset($_SESSION["banner30"])){
		$_SESSION["banner30"] = 0;
	}else{
		if($_SESSION["banner30"]>=(count($g_banners["banner30"])-1)){
			$_SESSION["banner30"] = 0;
		}else{
			$_SESSION["banner30"] = $_SESSION["banner30"]+1;	
		}		
	}
	
	$banner30 = $g_banners["banner30"][$_SESSION["banner30"]];
}
?>

<div class="HomePageDiv g-HomePageDiv g-shadow-up">
	<div class="g-shadow">
		<div class="container">
			<div class="col-sm-6">
				<div class="HomeBigEvent" style="padding-top: 50px;">
					<div class="HeadTitle">
						<?=menu_title(17)?>
					</div>
					<?php echo events();?>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="HomeEventsDiv">
					<div class="Head">
						<span><?php echo menu_title(17);?></span>
						<a href="<?php echo href('17');?>" class="AlleventLink"><?php echo l('view.all');?></a>
					</div>
					<div class="EventsList">
						<?php echo events_top();?>
					</div>
					<div class="EventSlideControl">
						<a href="#" class="MobileAllEvents">
							<div class="Icon"><i class="fa fa-angle-right"></i></div>
							<span>ყველას ნახვა</span>
						</a>
						<div class="Dots"></div>
						<div class="PrevArrow"><i class="fa fa-angle-right"></i></div>
						<div class="NextArrow"><i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="g-bgwhite">
	<div class="container">
		<?php if(isset($banner29) && count($banner29)>0){ ?>
			<?php if($banner29["htmlstring"]==2){ ?>
				<div class="g-banner g-height90 g-border-solid-grey g-desktop-show-mobile-hide" style="overflow: hidden;">
					<iframe src="<?=$banner29["image1"]?>" frameborder="0" style="width:1220px; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>

				<div class="g-banner g-height90 g-border-solid-grey g-desktop-hide-mobile-show" style="overflow: hidden;">
					<iframe src="<?=$banner29["image2"]?>" frameborder="0" style="width:330px; max-width: 100%; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>
			<?php }else{ ?>			
				<a href="<?=$banner29["link"]?>" class="g-banner g-height90 g-desktop-show-mobile-hide" style="background-image: url('<?=$banner29["image1"]?>');" title="<?=htmlentities($banner29["title"])?>" target="_blank"></a>

				<a href="<?=$banner29["link"]?>" class="g-banner g-height90 g-desktop-hide-mobile-show" style="background-image: url('<?=$banner29["image2"]?>');" title="<?=htmlentities($banner29["title"])?>" target="_blank"></a>
			<?php } ?>			
		<?php }else{ ?>
		<div class="g-banner g-height90">
			Bannner 1220x110
		</div>
		<?php } ?>
	</div>
</div>


<div class="PopularObjects g-shadow-up" style="position: relative;">
	<div class="container">
		<div class="col-sm-6">
			<div class="DivTitle"><?=l("popularobjects")?></div>
		</div>
		<div class="col-sm-6 text-right">
			<div class="ArrowsDiv PopularArrow g-mobile-display-none">
				<div class="Arrow Right"><i class="fa fa-angle-right"></i></div>
				<div class="Arrow Left"><i class="fa fa-angle-left"></i></div>
			</div>
		</div>
		<div class="CategoriesDiv">
			<?php echo glists(array(3,4,8,9,7,10,11,19,21), "position DESC", 20, true);?>
			
		</div>
		<div style="clear:both"></div>
	</div>
	<div class="g-shadow" style="width: 100%; height: 74px; background-color: #f8f9fa; position: absolute; left: 0; bottom: 0px;"></div>
</div>


<div class="g-bgwhite">
	<div class="container">
		<?php if(isset($banner30) && count($banner30)>0){ ?>
			<?php if($banner30["htmlstring"]==2){ ?>
				<div class="g-banner g-height90 g-border-solid-grey g-desktop-show-mobile-hide" style="overflow: hidden;">
					<iframe src="<?=$banner30["image1"]?>" frameborder="0" style="width:1220px; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>

				<div class="g-banner g-height90 g-border-solid-grey g-desktop-hide-mobile-show" style="overflow: hidden;">
					<iframe src="<?=$banner30["image2"]?>" frameborder="0" style="width:330px; max-width: 100%; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>
			<?php }else{ ?>			
				<a href="<?=$banner30["link"]?>" class="g-banner g-height90 g-desktop-show-mobile-hide" style="background-image: url('<?=$banner30["image1"]?>');" title="<?=htmlentities($banner30["title"])?>" target="_blank"></a>

				<a href="<?=$banner30["link"]?>" class="g-banner g-height90 g-desktop-hide-mobile-show" style="background-image: url('<?=$banner30["image2"]?>');" title="<?=htmlentities($banner30["title"])?>" target="_blank"></a>
			<?php } ?>	
		<?php }else{ ?>
		<div class="g-banner g-height90">
			Bannner 1220x110
		</div>
		<?php } ?>
	</div>
</div>

<div class="SimilarObjects g-shadow-up" style="position: relative;">
	<div class="container">
		<div class="col-sm-6">
			<div class="DivTitle"><?=l("newaddedobjects")?></div>
		</div>
		<div class="col-sm-6 text-right">
			<div class="ArrowsDiv SimilarArrow">
				<div class="Arrow Right"><i class="fa fa-angle-right"></i></div>
				<div class="Arrow Left"><i class="fa fa-angle-left"></i></div>
			</div>
		</div>
		<div class="CategoriesDiv">
			<?php echo glists(array(3,4,8,9,7,10,11,19,21), "position DESC", 20);?>
		</div>
	</div>
	<div class="g-shadow" style="width: 100%; height: 74px; background-color: #f8f9fa; position: absolute; left: 0; bottom: 0px;"></div>
</div>

<div class="g-bgwhite">
	<div class="container">
		<?php if(isset($banner26) && $banner26 != ""){ ?>
			<?php if($banner26["htmlstring"]==2){ ?>
				<div class="g-banner g-height90 g-border-solid-grey g-desktop-show-mobile-hide" style="overflow: hidden;">
					<iframe src="<?=$banner26["image1"]?>" frameborder="0" style="width:1220px; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>

				<div class="g-banner g-height90 g-border-solid-grey g-desktop-hide-mobile-show" style="overflow: hidden;">
					<iframe src="<?=$banner26["image2"]?>" frameborder="0" style="width:330px; max-width: 100%; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>
			<?php }else{ ?>			
				<a href="<?=$banner26["link"]?>" class="g-banner g-height90 g-desktop-show-mobile-hide" style="background-image: url('<?=$banner26["image1"]?>');" title="<?=htmlentities($banner26["title"])?>" target="_blank"></a>

				<a href="<?=$banner26["link"]?>" class="g-banner g-height90 g-desktop-hide-mobile-show" style="background-image: url('<?=$banner26["image2"]?>');" title="<?=htmlentities($banner26["title"])?>" target="_blank"></a>
			<?php } ?>			
		<?php }else{ ?>
		<div class="g-banner g-height90">
			Bannner 1220x110
		</div>
		<?php } ?>
	</div>
</div>

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