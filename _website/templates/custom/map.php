<?php defined('DIR') OR exit; ?><div class="SmallHeaderInside ContactHeader">
	<div class="container"> 			
		<div class="CategoryTitle">
			<div class="col-sm-12"> 
				<div class="Icon"><i class="fa <?php echo $image2; ?>"></i></div>
				<div class="Title"><?php echo $title; ?></div> 
			</div>
		</div>
		<div class="HeaderWidthRight">				 
			<div class="row">
				<form action="" method="get">
					<div class="col-sm-2">
						<select class="BatumiGuideSelectBlue gcategorySelect">
	                        <?php echo categories_menu_home_search_inner()?>
						</select>
					</div>  
					<?php 
					$menutype = (isset($_GET["c"]) && is_numeric($_GET["c"])) ? $_GET["c"] : false;
					$select_addresses = select_addresses(false, $menutype);
					?>
					<input type="hidden" name="c" value="<?=(int)$_GET["c"]?>">
					<div class="col-sm-2">
						<select class="BatumiGuideSelectBlue map_addresses_search" name="a">
							<option value=""><?=l("choose")?></option>
							<?php foreach($select_addresses as $item): ?>
							<option value="<?=$item["id"]?>" <?=(isset($_GET["a"]) && is_numeric($_GET["a"]) && $_GET["a"]==$item["id"]) ? "selected='selected'" : ""?>><?=$item["title"]?></option>
							<?php endforeach; ?>
						</select>
					</div> 


					<div class="col-sm-2">
						<input type="text" name="q" class="HeaderBlueInput map_search_key" value="<?=(isset($_GET["q"])) ? htmlentities($_GET["q"]) : ''?>" />
					</div> 			
					<div class="col-sm-2 ColSm222">
						<button type="submit" class="OrangeButtonRound"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
					</div>

					<div class="col-sm-2 ColSm222"> 
						<button type="button" class="neabySearch" title="Nearby Search"><i class="fa fa-search-plus" aria-hidden="true"></i></button> 
					</div>
				</div>
			</form>				 
		</div> 
	</div>
</div>



<div class="CategoriesPageMap">
	<div class="container-fluid padding_0">
		<div class="LeftCategoriesList" style="display:none;">
			<div class="CategoriesDiv">
				 <div class="map-list">
					<div id="locs"></div>
				 </div>				 
			</div>	
		</div>
		<div class="CategoriesMap">
			<div id="CategoriesMap"></div>
			<script type="text/javascript">
				var searchData = {
					"c":"<?=(isset($_GET["c"]) && is_numeric($_GET["c"])) ? (int)$_GET["c"] : 0?>",
					"a":"<?=(isset($_GET["a"]) && is_numeric($_GET["a"])) ? (int)$_GET["a"] : 0?>",
					"q":"<?=(isset($_GET["q"])) ? htmlentities($_GET["q"]) : ""?>"
				};
			</script>
			<script type="text/javascript" src="/_website/js/map.js"></script>
		</div>
	</div>
</div>
