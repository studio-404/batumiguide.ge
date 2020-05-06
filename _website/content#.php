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
<link rel="stylesheet" href="_website/css/style.css">
<link rel="stylesheet" href="_website/css/custom_res.css">
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

<?php if($storage->section["id"]==1) { ?>
<div class="HeaderDiv HomeHeader">	
<?php }else{ ?>
<div class="HeaderDiv InsideHeaderDiv">
<?php }?>
	<div class="container">
		<div class="HeaderDivForMobile">
			<div class="HamburgMenu"></div>
			<div class="col-sm-6 MobilePosition1">
				<a href="<?php echo href('1');?>" class="Logo"></a>
			</div>
			<div class="col-sm-6 text-right padding-right:0">
				<div class="HeaderMenu ">
					<?php echo main_menu();?>
					<input type="hidden" name="input_lang" id="input_lang" value="<?=l()?>" />
					<div class="MobileLang">
						<a href="<?php echo href($section['id'], array(), 'ge', $section['pid']) ?>"><img src="_website/img/ka_flag.png"/></a>
						<a href="<?php echo href($section['id'], array(), 'en', $section['pid']) ?>"><img src="_website/img/en_flag.png"/></a>
						<a href="<?php echo href($section['id'], array(), 'ru', $section['pid']) ?>"><img src="_website/img/ru_flag.png"/></a>
					</div>
				</div>
				<div class="LanguageDiv">
					<div class="LangHover">
                        <?php if(l()=='ge'){ ?>
						<span><img src="_website/img/ka_flag.png"/></span>
						<div class="HoverLang">
							<a href="<?php echo href($section['id'], array(), 'en', $section['pid']) ?>"><img src="_website/img/en_flag.png"/></a>
							<a href="<?php echo href($section['id'], array(), 'ru', $section['pid']) ?>"><img src="_website/img/ru_flag.png"/></a>
						</div>
                        <?php } else if(l()=='ru'){?>
						<span><img src="_website/img/ru_flag.png"/></span>
						<div class="HoverLang">
							<a href="<?php echo href($section['id'], array(), 'en', $section['pid']) ?>"><img src="_website/img/en_flag.png"/></a>
							<a href="<?php echo href($section['id'], array(), 'ge', $section['pid']) ?>"><img src="_website/img/ka_flag.png"/></a>
						</div>
                        <?php }else{ ?>
						<span><img src="_website/img/en_flag.png"/></span>
						<div class="HoverLang">
							<a href="<?php echo href($section['id'], array(), 'ge', $section['pid']) ?>"><img src="_website/img/ka_flag.png"/></a>
							<a href="<?php echo href($section['id'], array(), 'ru', $section['pid']) ?>"><img src="_website/img/ru_flag.png"/></a>
						</div>
                        <?php } ?>

					</div>					
				</div>
			</div> 
		</div>
<?php if($storage->section["id"]==1) { ?>         
		<div class="col-sm-12 ContainerPaddingLeft">
			<div class="row">
				<div class="col-sm-10">
					<div class="HeaderTitle">
						<?php echo l('discover');?>
						<span><?php echo l('slogan');?></span>
					</div> 
                    <form action="javascript:void(0)" method="post">    
                    	<input type="hidden" name="c" class="category_s" value="" />          
						<div class="HeaderFilter">
							<div class="btn-group">
								<button type="button" class="CategoriesSelect" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
								<ul class="dropdown-menu CategoriesDropDown">
									<!-- <li><a href="javascript:;"><i class="fa fa-list"></i><?php echo l('all.categories');?></a></li> -->
									<?php echo categories_menu_home_search();?>
								</ul>
							</div>
							<div class="HeaderInput searchKey_box">
								<input type="text" name="q" class="searchKey_s" placeholder="<?php echo l('enter.keyword');?>" />
								<div id="result_box"></div>
							</div>
							<button type="button" class="SearchButton gsearchButton"><i class="fa fa-map-marker"></i></button>
						</div>
						<script type="text/javascript">
							var li = document.getElementsByClassName("CategoriesDropDown")[0].getElementsByTagName("li")[0];
							var id = li.getAttribute("data-id");
							var title = li.getAttribute("data-title");
							document.getElementsByClassName("CategoriesSelect")[0].innerHTML = title+" <span class=\"caret pull-right\"></span>";
							document.getElementsByClassName("category_s")[0].value = id;
						</script>
                    </form>

					
					
					
					
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
								<!-- <div class="MobileCat">
									<div class="col-sm-3">
										<div class="Item">
											<div class="Icon"><i class="fa fa-bed"></i></div>
											<div class="Title">მაღაზიები</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="Item">
											<div class="Icon"><i class="fa fa-bed"></i></div>
											<div class="Title">საჭმელი & დასალევი</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="Item">
											<div class="Icon"><i class="fa fa-bed"></i></div>
											<div class="Title">მანქანა</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="Item">
											<div class="Icon"><i class="fa fa-bed"></i></div>
											<div class="Title">ბანკი</div>
										</div>
									</div>
								</div> -->
								<div class="MobileList" id="g-search-result">
									
								</div>
							</div>
						</div>
					</div>
					<!-- END MOBILE -->
					
					
					
					
					
					
					<div class="HeaderIconMenu">
						<div class="MenuTitle"><?php echo l('browse');?></div>
							<?php echo categories_menu_home();?>
					</div>
				</div> 
			</div>
		</div>
<?php } ?>        
	</div>
</div>

<?php echo html_decode($storage->content); ?>

<div class="FooterDiv">
	<div class="container">
		<div class="col-sm-4">
			<div class="CopyRight">
				&copy; 2017 All Right Reserved.
			</div>
		</div>
		<div class="col-sm-4 text-center">
			<div class="FooterSocial">
				<a href="<?php echo s('fb');?>" target="_blank">Facebook</a>
				<a href="<?php echo s('instagram');?>" target="_blank">Instagram</a>
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

<script>
        (function(w,d,u){
                var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
        })(window,document,'https://cdn.bitrix24.com/b10514479/crm/site_button/loader_1_jlm35v.js');
</script>

</body>
</html>