<?php defined('DIR') OR exit; ?>
<!-- main-cont -->
<?php
	$mark = 0;
	if((isset($_GET["q"]) && mb_strlen($_GET["q"], "UTF8")>1) || isset($_GET["c"]) || isset($_GET["a"])) {
		$mark = 1;
		$q = db_escape($_GET["q"]); 
		$newsCat = "";
		if(isset($_GET["c"]) && is_numeric($_GET["c"])){
			$c = (int)$_GET["c"];
			$newsCat = " AND `menuid` IN(".$c.") ";
		}
		$newsAddres = "";
		if(isset($_GET["a"]) && is_numeric($_GET["a"])){
			$a = (int)$_GET["a"];
			$newsAddres = " AND FIND_IN_SET('".(int)$_GET["a"]."', `addresslists`) ";
		}

		$all_news = "";
		if($q!="NULL"){
	    	$all_news = " AND (title like '%".$q."%' OR content like '%".$q."%') "; 
		}
	    //Pager: start
	    $page = abs(get('page', 1));
	    $per_page = c('articles.per_page');
	    $limit = " LIMIT " . (($page - 1) * $per_page) . ",{$per_page}";
	    $count = "SELECT COUNT(*) AS cnt FROM `".c("table.catalogs")."` WHERE language = '" . l() . "' {$all_news}{$newsCat}{$newsAddres}AND visibility = 1 AND deleted = 0 ORDER BY postdate DESC;";
	    $count = db_fetch($count);
	    $count = empty($count) ? 0 : $count['cnt'];
	    $page_max = ceil($count / $per_page);
	    $page_cur = $page;
	    $page_max = $page_max;
	    $item_count = $count;
	    //Pager: end
	    $sql = "SELECT * FROM `".c("table.catalogs")."` WHERE language = '" . l() . "' {$all_news}{$newsCat}{$newsAddres}AND `deleted` = '0' AND visibility = 1 ORDER BY postdate DESC{$limit};";
	    $res = db_fetch_all($sql);
	    // echo $sql;
	    $articles = $res;
	    if(count($articles)==0)
	    	$mark = 0;
	}
?>
<div class="SmallHeaderInside">
	<div class="container"> 			
		<div class="CategoryTitle">
			<div class="col-sm-12"> 
				<div class="Icon"><i class="fa <?php echo $image2; ?>"></i></div>
				<div class="Title"><?php echo $title; ?> : <?php if($mark != 0) : ?><?php echo $item_count;?> <?php else : ?> 0 <?php endif; ?>ობიექტი</div> 
			</div>
		</div>
		<div class="HeaderWidthRight">				 
			<div class="row">
				<!-- <div class="col-sm-2">
					<select class="BatumiGuideSelectBlue">
						<option>ყველა კატეგორიაში</option>
                        <?php echo categories_menu_home_search_inner()?>
					</select>
				</div> -->
				<?php 
				$select_addresses = select_addresses();
				?>
				<div class="col-sm-2">
					<select class="BatumiGuideSelectBlue addresses_search">
						<option value=""><?=l("choose")?></option>
						<?php foreach($select_addresses as $item): ?>
						<option value="<?=$item["id"]?>" <?=(isset($_GET["a"]) && is_numeric($_GET["a"]) && $_GET["a"]==$item["id"]) ? "selected='selected'" : ""?>><?=$item["title"]?></option>
						<?php endforeach; ?>
					</select>
				</div>  
				<div class="col-sm-2">
					<input type="text" class="HeaderBlueInput search_key" value="<?=(isset($_GET["q"])) ? htmlentities($_GET["q"]) : ''?>"/>
				</div>         
				<div class="col-sm-2 ColSm222">
					<button class="OrangeButtonRound gsearchButton"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
				</div>
			</div>				 
		</div> 
	</div>
</div>



 
<div class="CategoriesPage">
	<div class="container">
		<div class="SidebarCategories display_none_mobile">
			<div class="col-sm-12">
				<div class="CategorySidebar"> 
					<?php echo categories_menu((isset($_GET["c"])) ? (int)$_GET["c"] : '');?>
				</div>
			</div>
		</div>
		<div class="CategoriesDiv">
			<div class="row">
				<?php if($mark == 0) : ?>
					<div class="col-sm-12">
						<div class="alert alert-danger">
							არ მოიძებნა
						</div>
					</div>
				<?php else : ?>	            
				<?php foreach($articles as $a) : ?>	
				<?php 
						$cat=db_fetch("select * from menus where language='".l()."' and id=".$a["menuid"]);
						$catpage=db_fetch("select * from pages where language='".l()."' and menutype='".$cat["id"]."'");		
						
						$link = href($catpage["id"]).'/'.$a['slug'].'/'.$a['id'];	

				// $link = href($id, array(), l(), $a['id']);
				?>
				<div class="col-sm-2">
					<a href="<?php echo $link; ?>" class="Item">
						<div class="Image"><img src="<?php echo $a['image1'] ?>" title="<?php echo $a['title'] ?>"/></div>
						<div class="Info">
							<div class="Category"><?php echo $catpage["title"]; ?></div>
							<div class="Title"><?php echo $a['title'] ?></div>
							<li class="Address"><?php echo $a['address'] ?></li>
							<li class="Time"><?php echo $a['SatSun'] ?></li>
						</div>
					</a>
				</div>
<?php endforeach; ?>
<?php endif; ?>	
		
			</div>
		</div>
	</div>
</div>

<?php if($mark != 0) { ?>
<?php if($page_max>1) : ?>
<div class="Pagination">
    <div class="container-fluid text-center">
    <li class="PrevLink"><a href="<?php echo href($id).'?q='.$q.'&page=1';?>"><i class="fa fa-angle-left"></i></a></li>     
<?php for($i=1;$i<=$page_max;$i++) : ?>	
    <li <?php echo ($page_cur==$i) ? 'class="active"':'';?>><a href="<?php echo href($id).'?q='.$q.'&page='.$i;?>"><?php echo $i;?></a></li>
<?php endfor; ?>
    <li class="NextLink"><a href="<?php echo href($id).'?q='.$q.'&page='.$page_max;?>"><i class="fa fa-angle-right"></i></a></li>
    </div>
</div>            
<?php endif;?>
<?php } ?>

<script type="text/javascript">
	<?php 
	if(isset($_GET["a"]) && is_numeric($_GET["a"])){

	}
	?>

	document.getElementsByClassName("gsearchButton")[0].addEventListener("click", (e) => {
		let select = document.getElementsByClassName("addresses_search")[1].value;
		let key = document.getElementsByClassName("search_key")[0].value;
		let c = "<?=(isset($_GET["c"]) && is_numeric($_GET["c"])) ? $_GET["c"] : ''?>";
		let url = window.location.href.split('?')[0];



		location.href = url + "?c="+c+"&a="+select+"&q="+key;
	});
</script>