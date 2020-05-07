<?php defined('DIR') OR exit();
    if (empty($storage->product)) {
        $section = $storage->section;
    } else {
        $section = $storage->product;
    }
    $section['pid'] = $storage->product['id'];
    $section['id'] = $storage->section['id'];
    empty($section["meta_keys"]) AND $section["meta_keys"] = s('keywords');
    empty($section["meta_desc"]) AND $section["meta_desc"] = s('description');
?>

<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> -->
    <meta name="viewport" content="width=360, user-scalable=no" />

    <base href="<?php echo href(); ?>" />
    <title><?php echo strip_tags(s('sitetitle').' - '.$section["title"]); ?></title>
    <meta name="keywords" content="<?php echo s('keywords').', '.$section["meta_keys"] ?>" />
    <meta name="description" content="<?php echo s('description').', '.$section["meta_desc"] ?>" />
    <meta name="robots" content="index, follow" />
    
    <meta property="og:title" content="<?php echo strip_tags($section["title"]).' - '.s('sitetitle');?>" />
    <meta property="og:image" content="<?php echo (!empty($section["image1"])) ? $section["image1"] : href().WEBSITE."/img/logo2.png";?>" />
    <meta property="og:description" content="<?php echo $section["meta_desc"] ?>"/>
    <meta property="og:url" content="<?php echo href($storage->section['id'], array(), '', $section["pid"]);?>" />
    <meta property="og:site_name" content="<?php echo s('sitetitle'); ?>" />
    <meta property="og:type" content="Website" />
    
    <link rel="icon" href="favicon.ico" />
    
<script src="https://code.jquery.com/jquery-3.1.0.js" ></script>
<script src="_website/js/bootstrap.js" type="text/javascript"></script>
<script src="_website/js/wow.js" type="text/javascript"></script>
<script src="_website/js/slick.js" type="text/javascript"></script>
<script src="_website/js/bootstrap-select.js" type="text/javascript"></script>
<script src="_website/js/fancybox.min.js"></script>
<script src="_website/js/jquery.raty.js"></script>
<script src="_website/js/jquery.slimscroll.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4_axk5RwRUCAiKPceFtqVlxXdNiqMi_Q&language=ka"></script>
<script src="_website/js/owl.carousel.min.js" type="text/javascript"></script>
<script src="_website/js/scripts.js" type="text/javascript"></script>

<link rel="stylesheet" href="_website/css/font-awesome.css">
<link rel="stylesheet" href="_website/css/bootstrap.css">
<link rel="stylesheet" href="_website/css/fonts.css">
<link rel="stylesheet" href="_website/css/slick.css">  
<link rel="stylesheet" href="_website/css/fancybox.min.css" />
<link rel="stylesheet" href="_website/css/animate.css">
<link rel="stylesheet" href="_website/css/bootstrap-select.css">
<link rel="stylesheet" href="_website/css/owl.carousel.min.css">
<link rel="stylesheet" href="_website/css/style.css?v=6">
<link rel="stylesheet" href="_website/css/custom_res.css?v=6">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-77706931-6"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-77706931-6');
</script>

</head>
<body class="">
	<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=351760962294639&autoLogAppEvents=1"></script>
<?php 

$g_banners = g_banners();
$banner25 = array();

if(isset($g_banners["banner25"])){
	if(!isset($_SESSION["banner25"])){
		$_SESSION["banner25"] = 0;
	}else{
		if($_SESSION["banner25"]>=(count($g_banners["banner25"])-1)){
			$_SESSION["banner25"] = 0;
		}else{
			$_SESSION["banner25"] = $_SESSION["banner25"]+1;	
		}		
	}
	
	$banner25 = $g_banners["banner25"][$_SESSION["banner25"]];
}
?>


<?php if($storage->section["id"]==1) { ?>
<div class="HeaderDiv HomeHeader g-padding-bottom0 g-padding-top0">	
<?php }else{ ?>
<div class="HeaderDiv InsideHeaderDiv g-padding-bottom0 g-padding-top0">
<?php }?>
	<div class="g-header-empty"></div>
	<div class="g-header">
		<div class="container">
			<div class="HeaderDivForMobile">
				<div class="HamburgMenu"></div>
				<div class="col-sm-6 MobilePosition1">
					<a href="<?php echo href('1');?>" class="Logo g-logo<?=(l()!="ge") ? ' Logo_en' : ''?>"></a>

					<form action="javascript:void(0)" method="post" class="g-search-form" autocomplete="off">    
	                    	<input type="hidden" name="c" class="category_s" value="" />          
							<div class="HeaderFilter">
								<div class="HeaderInput searchKey_box">
									<input type="text" name="q" class="searchKey_s" placeholder="<?php echo l('enter.keyword');?>" autocomplete="off" />
									<div id="result_box"></div>
								</div>
								
							</div>
	                </form>
				</div>
				<div class="col-sm-6 text-right padding-right:0">

					<div class="HeaderMenu g-headermenu-desctop-hide">
						<?php echo main_menu();?>
						<input type="hidden" name="input_lang" id="input_lang" value="<?=l()?>" />
						<div class="MobileLang">
							<a href="<?php echo href($section['id'], array(), 'ge', $section['pid']) ?>"><img src="_website/img/ka_flag.png"/></a>
							<a href="<?php echo href($section['id'], array(), 'en', $section['pid']) ?>"><img src="_website/img/en_flag.png"/></a>
							<a href="<?php echo href($section['id'], array(), 'ru', $section['pid']) ?>"><img src="_website/img/ru_flag.png"/></a>
						</div>
					</div>
					<div class="LanguageDiv g-language-box">
						<div class="LangHover g-language-item">
							<span>
								<a href="<?php echo href($section['id'], array(), 'ge', $section['pid']) ?>">
									<img src="_website/img/ka_flag.png"/>
								</a>
							</span>
						</div>	

						<div class="LangHover g-language-item">
							<span>
								<a href="<?php echo href($section['id'], array(), 'en', $section['pid']) ?>">
									<img src="_website/img/en_flag.png"/>
								</a>
							</span>
						</div>

						<div class="LangHover g-language-item">
							<span>
								<a href="<?php echo href($section['id'], array(), 'ru', $section['pid']) ?>">
									<img src="_website/img/ru_flag.png"/>
								</a>
							</span>
						</div>					
					</div>

					<button type="button" class="SearchButton gsearchButton g-mobile-display-none"><i class="fa fa-map-marker"></i> <?=l("mapstext")?></button>

					<ul class="g-top-menu g-mobile-display-none">
						<li><a href="<?php echo href(551);?>"><?=menu_title(551)?></a></li>
						<li><a href="<?php echo href(17);?>"><?=menu_title(17)?></a></li>
					</ul>

				</div> 
			</div>
		</div>
	</div>
	
    <div class="container">   
		<div class="col-sm-12 ContainerPaddingLeft">
			<div class="row">
				<div class="col-sm-12">
					<?php if($storage->section["id"]==1) { ?> 
					
					<!-- START MOBILE -->
					<div class="MobileFilterDiv">
						<div class="row">
							<div class="col-sm-12">
								<div class="HeaderFilterMobile"> 
									<div class="MobileHeaderInput">ძიება</div>
									<button class="MobileSearchButton"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
						<div class="MobileSearch_1 DisplayNone">
							<div class="FormMobile1">
								<div class="row">
									<div class="col-sm-12">
										<div class="HeaderFilterMobile">  
											<div class="MobileInput1">
												<input type="text" placeholder="ძიება" id="g-search-input" value="" autofocus/>
												<!-- <div class="ClearInput"><i class="fa fa-times-circle"></i></div> -->
											</div>
											<button class="HideSearch_1"><i class="fa fa-times"></i></button>
										</div>
									</div>
								</div>
							</div>
							<div class="FormMobileContent">
								<div class="MobileList" id="g-search-result">
									
								</div>
							</div>
						</div>
					</div>
					<!-- END MOBILE -->
					
					<?php } ?>
					
					<div class="HeaderIconMenu g-categories-list">
						<!-- <div class="MenuTitle"><?php echo l('browse');?></div> -->
						<?php echo categories_menu_home();?>
					</div>
				</div> 
			</div>
		</div>      
	</div>
</div>

<div class="g-bgwhite g-border-top-red">
	<div class="container">
		<?php if(isset($banner25) && $banner25 != ""){ ?>
			<?php if($banner25["htmlstring"]==2){ ?>
				<div class="g-banner g-height90 g-border-solid-grey g-desktop-show-mobile-hide" style="overflow:hidden;">
					<iframe src="<?=$banner25["image1"]?>" frameborder="0" style="width:1220px; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>

				<div class="g-banner g-height90 g-border-solid-grey g-desktop-hide-mobile-show" style="overflow:hidden;">
					<iframe src="<?=$banner25["image2"]?>" frameborder="0" style="width: 330px; max-width:100%; height: 110px; overflow:hidden; margin: 0; padding: 0;"></iframe>
				</div>
			<?php }else{ ?>			
				<a href="<?=$banner25["link"]?>" class="g-banner g-height90 g-desktop-show-mobile-hide" style="background-image: url('<?=$banner25["image1"]?>');" title="<?=htmlentities($banner25["title"])?>" target="_blank"></a>

				<a href="<?=$banner25["link"]?>" class="g-banner g-height90 g-desktop-hide-mobile-show" style="background-image: url('<?=$banner25["image2"]?>');" title="<?=htmlentities($banner25["title"])?>" target="_blank"></a>
			<?php } ?>			
		<?php }else{ ?>
		<div class="g-banner g-height90">
			Bannner 1220x110
		</div>
		<?php } ?>
	</div>
</div>

<?php echo html_decode($storage->content); ?>

<div class="HomeLogosSlide">
	<div class="container g-mobile-display-none">
		<div class="col-sm-12">
			<div class="ArrowsDiv HomeLogosArrow">
				<div class="Arrow Right slick-arrow" style=""><i class="fa fa-angle-right"></i></div>
				<div class="Arrow Left slick-arrow" style=""><i class="fa fa-angle-left"></i></div>
			</div>
		</div>
	</div>
	<div class="container LogoSlide">
		<?php 
		for($i=0; $i<=9; $i++):
			if(isset($g_banners["banner27"]) && isset($g_banners["banner27"][$i])){
				 if($g_banners["banner27"][$i]["htmlstring"]==2){ ?>
				 	<div class="col-sm-2">
						<iframe src="<?=$g_banners["banner27"][$i]["image1"]?>" frameborder="0" class="Item" style="width:100%; overflow:hidden;"></iframe>
					</div>
				<?php }else{ ?>			
					<div class="col-sm-2">
						<a href="<?=$g_banners["banner27"][$i]["link"]?>" class="Item" style="line-height:90px; height: 90px; text-align:center; background-image: url('<?=$g_banners["banner27"][$i]["image1"]?>'); display:block; background-repeat: no-repeat; background-size: cover; background-position: center center;" title="<?=htmlentities($g_banners["banner27"][$i]["title"])?>" target="_blank">
						</a>
					</div>
				<?php 
				} 
			}else{
		?>
				<div class="col-sm-2">
					<a href="#" class="Item" style="line-height:90px; height: 90px; text-align:center; background-color: #f2f2f2; color: rgba(0,0,0,0.3); display:block; font-family: BPG110Caps; font-size: 26px; text-decoration:none">
						180x90
					</a>
				</div>
		<?php 
			}
		endfor; 
		?>
		
	</div>
</div>

<div class="FooterDiv">
	<div class="container">
		<div class="col-sm-4">
			<div class="CopyRight">
				&copy; 2017 All Right Reserved.
			</div>
		</div>
		<div class="col-sm-4 text-center">
			<div class="FooterSocial">
				<a href="<?php echo href(3);?>"><?=menu_title(3)?></a>
				<a href="<?php echo href(6);?>"><?=menu_title(6)?></a>
				<a href="<?php echo href(586);?>"><?=menu_title(586)?></a>
			</div>
		</div>
		<div class="col-sm-4 text-right">
			<div class="PowerBy">
				creaded by <a href="https://shindi.ge/" target="_blank"></a>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/_website/js/search.js"></script>


</body>
</html>