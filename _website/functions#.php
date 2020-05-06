<?php

function events_test()
{
    $sql = "SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND visibility = 1 AND menuid = 17 AND `deleted` = '0' ORDER BY postdate DESC LIMIT 15;";
    $news = db_fetch_all($sql);
    if (empty($news))
        return NULL;
    $out = NULL;
	$count = 0;
    foreach ($news AS $item)
    {
		$count++;
        $link = href($item['id']);

	        $out .= '
					<div class="col-sm-2">
						<a href="'.$link.'" class="Item">
							<div class="Image"><img src="'.$item['image1'].'"/></div>
							<div class="Info">
								<div class="Title">' . $item['title'] . '</div>
								<li class="Address">' . $item['address'] . '</li>
								<li class="Time">' . convert_date($item["postdate"]) . '</li>
							</div>
						</a>
					</div>
		        ';

    }
    return $out;
}

function food() {
    $sql = "SELECT * FROM " . c("table.catalogs") . " WHERE language = '" . l() . "' AND menuid = 4 AND deleted = 0 AND visibility = 1 ORDER BY position ASC LIMIT 20";
    $items = db_fetch_all($sql);
    $out = "";
    foreach($items as $item){
		
		$cat=db_fetch("select * from menus where language='".l()."' and id=".$item["menuid"]);
		$catpage=db_fetch("select * from pages where language='".l()."' and menutype='".$cat["id"]."'");		
		
		$link = href($catpage["id"]).'/'.$item['slug'].'/'.$item['id'];	
		
//		$link = href(4, array(), l(), $item['id']);					
		
        $out.= '					
					<div class="col-sm-2">
						<a href="'.$link.'" class="Item">
							<div class="Image"><img src="'.$item['image2'].'"/></div>
							<div class="Info">
								<div class="CompanyLogo"><img src="'.$item['image1'].'"/></div>
									<div class="Category">რესტორანი</div>
								<div class="Title">' . $item['title'] . '</div>
								<li class="Address">' . $item['address'] . '</li>
								<li class="Time">'.$item['MonFri'].'</li>
							</div>
						</a>
					</div>					
				';
					//<div class="col-sm-2">
						//<a href="'.$link.'" class="Item">
						//	<div class="Image"><img src="'.$item['image1'].'"/></div>
					//		<div class="Info">
					//			<div class="Title">' . $item['title'] . '</div>
					//			<li class="Address">' . $item['address'] . '</li>
						//	</div>
					//	</a>
					//</div>
    }
return $out;
}

function events()
{
    $sql = "SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND visibility = 1 AND menuid = 17 AND postdate >= '".date("Y-m-d h:i:s")."' AND `deleted` = '0' ORDER BY postdate ASC LIMIT 1;";
    $news = db_fetch_all($sql);
    if (empty($news))
        return NULL;
    $out = NULL;
	$count = 0;
    foreach ($news AS $item)
    {
		$count++;
        $link = href($item['id']);

	        $out .= '
					<a href="'.$link.'" class="Item">
						<div class="Image">
							<img src="'.$item['image1'].'"/>
						</div>
						<div class="Info">
							<div class="Date"><label>'.date("d", strtotime($item['postdate'])).' '.date("M", strtotime($item['postdate'])).'</div>
							<div class="Title">' . $item['title'] . '</div>
							<div class="Text">
                                ' . $item['content'] . '
							</div>
							<div class="Address">' . $item['address'] . '</div>
						</div>
					</a>
		        ';
				
				//<div class="HomeEventItem">
					//<div class="Image"><img src="'.$item['image1'].'"/></div>
					//<div class="TitleAndCategory">
					//	<label>' . $item['title'] . '</label>
				//		<!--<span>Live Concert</span>-->
				//	</div>
				//	<div class="DateAndAddress">
				//		<li><span class="Time"></span>' . convert_date($item["postdate"]) . '</li>
				//		<li><span class="marker"></span> ' . $item['address'] . '</li>
				//	</div>
				//	<a href="'.$link.'" class="TicketButton">
				//		<span>'.l('readmore').'</span>
				//		<i>'.l('readmore').'</i>
				//	</a>
			//	</div>	

    }
    return $out;
}

function events_top()
{
    $sql = "SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND visibility = 1 AND menuid = 17 AND postdate >= '".date("Y-m-d h:i:s")."' AND homepage = 1 AND `deleted` = '0' ORDER BY postdate ASC LIMIT 15;";
    $news = db_fetch_all($sql);
    if (empty($news))
        return NULL;
    $out = NULL;
	$count = 0;
    foreach ($news AS $item)
    {
		$count++;
        $link = href($item['id']);

							//<div class="Item">
								//<div class="Image">
								//	<img src="'.$item['image1'].'"/>
								//</div>
								//<div class="Info">
								//	<div class="Date"><label>'.date("d", strtotime($item['postdate'])).'</label><span>'.date("M", strtotime($item['postdate'])).'</span></div>
								//	<div class="Title">
								//		<label>' . $item['title'] . '</label>
								//		<!--<span>Live Concert</span>-->
								//	</div>
								//	<div class="Text">
								//	' . $item['description'] . '	
								//	</div>
								//	<a href="'.$link.'" class="TicketButton2">'.l('readmore').'</a>
								//	<div class="CityText">'.$item['address'].'</div>
								//</div>
						//	</div>	
		
	        $out .= '	
					<div class="col-sm-12">
						<a href="'.$link.'" class="Item">
							<div class="Image">
								<img src="'.$item['image1'].'"/>
							</div>
							<div class="Info">
								<label>'.$item['title'].'</label>
								<span><i class="fa fa-clock-o"></i>'.date("d", strtotime($item['postdate'])).' '.date("M", strtotime($item['postdate'])).'</span>
								</label><span>
							</div>
							<div class="MoreButton">
								<i class="fa fa-angle-right"></i>
							</div>
						</a>
					</div>							
		        ';

    }
    return $out;
}


function categories_menu_home_search_inner() {
	$storage = Storage::instance();
	$out = '';
    $sql = "SELECT id, title, idx, redirectlink, menutitle, level, menuid, category FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = 0 AND visibility = 1 ORDER BY position asc;";
    $sections = db_fetch_all($sql);
    if (empty($sections))
        return NULL;
    for ($idx = 0, $out = NULL, $num = count($sections); $idx < $num; $idx++)
    {
		    $sql_in = "SELECT id, title, idx, image2, redirectlink, menutitle, menutype, category, masterid FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = " . $sections[$idx]['id'] . " AND visibility = 1 ORDER BY position;";
	    	$sections_in = db_fetch_all($sql_in);
	    	$cnt_sections_in = count($sections_in);
			if($cnt_sections_in > 0) {
				for ($idx_in = 0, $num_in = count($sections_in); $idx_in < $num_in; $idx_in++)
	    		{
	    			$active = (isset($_GET["c"]) && is_numeric($_GET["c"]) && $_GET["c"]==$sections_in[$idx_in]['menutype']) ? ' selected="selected"' : '';
			        $link_in = (($sections_in[$idx_in]['redirectlink'] == '') || ($sections_in[$idx_in]['redirectlink'] == 'NULL')) ? href($sections_in[$idx_in]['id']) : $sections_in[$idx_in]['redirectlink'];
					$out .= '
						<option value="'.$sections_in[$idx_in]['menutype'].'"'.$active.'>' . $sections_in[$idx_in]['menutitle'] . '</option>					
							'."\n";
				}
			}
    }
    return $out;
}

function categories_menu_home_search() {
	$storage = Storage::instance();
	$out = '';
    $sql = "SELECT id, title, idx, redirectlink, menutitle, menutype, level, menuid, category FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = 0 AND visibility = 1 ORDER BY position asc;";
    $sections = db_fetch_all($sql);
    if (empty($sections))
        return NULL;
    for ($idx = 0, $out = NULL, $num = count($sections); $idx < $num; $idx++)
    {
		    $sql_in = "SELECT id, title, idx, image2, redirectlink, menutitle, menutype, category, masterid FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = " . $sections[$idx]['id'] . " AND visibility = 1 ORDER BY position;";
	    	$sections_in = db_fetch_all($sql_in);
	    	$cnt_sections_in = count($sections_in);
			if($cnt_sections_in > 0) {
				for ($idx_in = 0, $num_in = count($sections_in); $idx_in < $num_in; $idx_in++)
	    		{
			        $link_in = (($sections_in[$idx_in]['redirectlink'] == '') || ($sections_in[$idx_in]['redirectlink'] == 'NULL')) ? href($sections_in[$idx_in]['id']) : $sections_in[$idx_in]['redirectlink'];
					$out .= '
						<li data-id="'.$sections_in[$idx_in]['menutype'].'" data-title="'.htmlentities($sections_in[$idx_in]['menutitle']).'"><a href="javascript:;"><i class="fa ' . $sections_in[$idx_in]['image2'] . '"></i>' . $sections_in[$idx_in]['menutitle'] . '</a></li>					
							'."\n";
				}
			}
    }
    return $out;
}

function categories_menu_home() {
	$storage = Storage::instance();
	$out = '';
    $sql = "SELECT id, title, idx, redirectlink, menutitle, level, menuid, category FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = 0 AND visibility = 1 ORDER BY position asc;";
    $sections = db_fetch_all($sql);
    if (empty($sections))
        return NULL;
    for ($idx = 0, $out = NULL, $num = count($sections); $idx < $num; $idx++)
    {
		    $sql_in = "SELECT id, title, idx, image2, redirectlink, menutitle, category, masterid FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = " . $sections[$idx]['id'] . " AND visibility = 1 ORDER BY position;";
	    	$sections_in = db_fetch_all($sql_in);
	    	$cnt_sections_in = count($sections_in);
			if($cnt_sections_in > 0) {
				for ($idx_in = 0, $num_in = count($sections_in); $idx_in < $num_in; $idx_in++)
	    		{
			        $link_in = (($sections_in[$idx_in]['redirectlink'] == '') || ($sections_in[$idx_in]['redirectlink'] == 'NULL')) ? href($sections_in[$idx_in]['id']) : $sections_in[$idx_in]['redirectlink'];
					$out .= '
						<a href="' .$link_in.'" class="Item" data-toggle="tooltip" data-placement="top" title="' . $sections_in[$idx_in]['menutitle'] . '">
							<i class="fa ' . $sections_in[$idx_in]['image2'] . '"></i>
						</a>					
							'."\n";
				}
			}
    }
    return $out;
}

function categories_menu($menutype = false) {
	$storage = Storage::instance();
	$out = '';
    $sql = "SELECT id, title, idx, redirectlink, menutitle, level, menuid, category FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = 0 AND visibility = 1 ORDER BY position asc;";
    $sections = db_fetch_all($sql);
    if (empty($sections))
        return NULL;
    for ($idx = 0, $out = NULL, $num = count($sections); $idx < $num; $idx++)
    {
		    $sql_in = "SELECT id, title, idx, image2, redirectlink, menutitle, menutype, category, masterid FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = " . $sections[$idx]['id'] . " AND visibility = 1 ORDER BY position;";
	    	$sections_in = db_fetch_all($sql_in);
	    	$cnt_sections_in = count($sections_in);
			if($cnt_sections_in > 0) {
				for ($idx_in = 0, $num_in = count($sections_in); $idx_in < $num_in; $idx_in++)
	    		{
			        $link_in = (($sections_in[$idx_in]['redirectlink'] == '') || ($sections_in[$idx_in]['redirectlink'] == 'NULL')) ? href($sections_in[$idx_in]['id']) : $sections_in[$idx_in]['redirectlink'];
					//$out .= '
					//	<a href="' .$link_in.'" class="Item" data-toggle="tooltip" data-placement="right" title="' . $sections_in[$idx_in]['menutitle'] . '">
						//	<i class="fa ' . $sections_in[$idx_in]['image2'] . '"></i>
					//	</a>					
						//	'."\n";
			        $active = (isset($menutype) && $menutype==$sections_in[$idx_in]['menutype']) ? " active" : "";
					$out .= '
						<a href="' .$link_in.'" class="Item'.$active.'">
							<div><i class="fa ' . $sections_in[$idx_in]['image2'] . '"></i></div>
							<span>' . $sections_in[$idx_in]['menutitle'] . '</span>
						</a>					
							'."\n";		
				}
			}
    }
    return $out;
}

function getq($column = array(), $id, $table='pages', $lang=true, $vis=true) {
	if ($lang)
		$lang = l();
	$vis = $vis ? ' and visibility=1' : '';
	$column = implode(', ', $column);
	$sql = "SELECT {$column} from {$table} where id = {$id} and language='{$lang}' and deleted=0{$vis}";
	$sql = db_fetch($sql);
	if (count($sql) > 1)
		return $sql;
	else
		return $sql[$column];
	return null;
}

function pager($id, $page_cur, $page_max, $page_show, $query) {
	$out = '';
	if ($page_max > 1) {
		unset($query['page'],$query['pos']);
		$page = (empty($query)) ? '?page=' : '&page=';
		$out .= '<div class="pager" class="col-sm-7"><ul class="pagination">';
	    if ($page_cur > 1) {
	        // $out .= '<li><a href="'.href($id, $query).$page.'1">&laquo;</a></li>';
	        $out .= '<li><a href="'.href($id, $query).$page.($page_cur - 1).'" class="previous">'.l("prev").'</a></li>';
		}
        $index_start = ($page_cur - $page_show) <= 0 ? 1 : $page_cur - $page_show;
        $index_finish = ($page_cur + $page_show) >= $page_max ? $page_max : $page_cur + $page_show;
        if (($page_cur - $page_show) > 1)
            $out .= '<li>...</li>';
        for ($i = $index_start; $i <= $index_finish; $i++) {
            $out .= '<li><a '.(($page_cur==$i) ? 'class="active"':'').' href="'.href($id, $query).$page.$i.'">'.$i.'</a></li>';
        }
        if (($page_cur + $page_show) < $page_max)
            $out .= '<li><a nohref="" class="NoHref">...<a/></li>';
	    if ($page_cur < $index_finish) {
	        $out .= '<li><a href="'.href($id, $query).$page.($page_cur + 1).'" class="next">'.l("next").'</a></li>';
	        // $out .= '<li><a href="'.href($id, $query).$page.$page_max.'">&raquo;</a></li>';
	    }
	    $out .= '</ul>';
/*	    if ($page_cur < $index_finish) {
		        $out .= '<div class="next right">
		          <a href="'.href($id, $query).$page.($page_cur + 1).'">
		            '.l("next").'
		          </a>
		        </div>';
	    }
*/
    		$out .= '</div>';
	}
	return $out;
}

function main_menu()
{
	$storage = Storage::instance();
	$out = '';
    $sql = "SELECT id, title, idx, redirectlink, menutitle, level, menuid, category FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND id != 1 AND id != 4 AND id != 5 AND deleted = 0 AND masterid = 0 AND visibility = 1 ORDER BY position asc;";
    $sections = db_fetch_all($sql);
    if (empty($sections))
        return NULL;
    for ($idx = 0, $out = NULL, $num = count($sections); $idx < $num; $idx++)
    {
        $link = (($sections[$idx]['redirectlink'] == '') || ($sections[$idx]['redirectlink'] == 'NULL')) ? href($sections[$idx]['id']) : $sections[$idx]['redirectlink'];
		$active = 0;
			$out .= '<li'.(($sections[$idx]["id"] == $active && $sections[$idx]["id"] != 1) ? ' class="active"':'').'>'."\n";
				$sql_in = "SELECT id, title, idx, redirectlink, menutitle, category, masterid FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 1 AND deleted = 0 AND masterid = " . $sections[$idx]['id'] . " AND visibility = 1 ORDER BY position;";
				$sections_in = db_fetch_all($sql_in);
				$cnt_sections_in = count($sections_in); 
				$out .= '<a href="' . $link . '">' . ((l()=='ge') ? $sections[$idx]['menutitle'] : $sections[$idx]['menutitle']) . '</a>'."\n";
				if($cnt_sections_in > 0) {
					$out .= '<ul>'."\n";
					for ($idx_in = 0, $num_in = count($sections_in); $idx_in < $num_in; $idx_in++)
					{
						//			        $out .= '<div  class="fixed-menu" '.(($sections[$idx]['id']==$sections_in[$idx_in]['masterid']) ? 'style="display:block;"' : '' ).'>';
						$link_in = (($sections_in[$idx_in]['redirectlink'] == '') || ($sections_in[$idx_in]['redirectlink'] == 'NULL')) ? href($sections_in[$idx_in]['id']) : $sections_in[$idx_in]['redirectlink'];
						$out .= '<li>'."\n";
						$out .= '<a href="' .$link_in.'">' . $sections_in[$idx_in]['menutitle'] . '</a>'."\n";
						$out .= '</li>'."\n";
					}
					$out .= '</ul>'."\n";
			}
			$out .= '</li>'."\n";
    }
    return $out;
}

function main_menu_bottom()
{
	$storage = Storage::instance();
	$out = '';
    $sql = "SELECT id, title, idx, redirectlink, menutitle, level, menuid, category FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 4 AND deleted = 0 AND masterid = 0 AND visibility = 1 ORDER BY position asc;";
    $sections = db_fetch_all($sql);
    if (empty($sections))
        return NULL;
    for ($idx = 0, $out = NULL, $num = count($sections); $idx < $num; $idx++)
    {
        $link = (($sections[$idx]['redirectlink'] == '') || ($sections[$idx]['redirectlink'] == 'NULL')) ? href($sections[$idx]['id']) : $sections[$idx]['redirectlink'];

//		menu-selected
		$active = 0;
		if ($storage->page_type !== 'error') {
			if ($storage->section["level"]==2) {
				$menu = db_fetch("SELECT id FROM ".c("table.pages")." WHERE idx=".$storage->section["masterid"]." AND language = '".l()."'");
				$active = $menu["id"];
			} elseif ($storage->section["menuid"]>4) {
			    $menu = db_fetch("SELECT title FROM ".c("table.menus")." WHERE id=".$storage->section["menuid"]."");
			    $menu_in = db_fetch("SELECT id, masterid, level FROM ".c("table.pages")." WHERE attached ='".$menu["title"]."' AND language = '".l()."'");
			    if ($menu_in["level"]==1) {
			    	$active = $menu_in["id"];
			    } else {
			    	$master = db_fetch("SELECT id FROM ".c("table.pages")." WHERE idx='".$menu_in["masterid"]."'");
					$active = $master["id"];
			    }
			} elseif ($storage->section["level"]==3) {
				$menu = db_fetch("SELECT masterid FROM ".c("table.pages")." WHERE idx=".$storage->section["masterid"]." AND language = '".l()."'");
				$child = db_fetch("SELECT id FROM ".c("table.pages")." WHERE idx=".$menu["masterid"]." AND language = '".l()."'");
				$active = $child["id"];
			} else {
				$active = $storage->section["id"];
			}
		}

		$out .= '
						<li '.(($sections[$idx]["id"] == $active) ? ' class="active BigMenu1 BigMenu"':' class="BigMenu1 BigMenu"').'>
				'."\n";
		    $sql_in = "SELECT id, title, idx, redirectlink, menutitle, category, masterid FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 4 AND deleted = 0 AND masterid = " . $sections[$idx]['id'] . " AND visibility = 1 ORDER BY position;";
	    	$sections_in = db_fetch_all($sql_in);
	    	$cnt_sections_in = count($sections_in);
	    	if($cnt_sections_in <=0) 
	        	$out .= '
								<a href="' . $link . '">' . ((l()=='ge') ? $sections[$idx]['menutitle'] : $sections[$idx]['menutitle']) . '</a>
						'."\n";
			else
	        	$out .= '<a nohref="" class="NoHref">' . ((l()=='ge') ? $sections[$idx]['menutitle'] : $sections[$idx]['menutitle']) . '</a>'."\n";
			if($cnt_sections_in > 0) {
				$out .= '<ul class="FirstUL">'."\n";
				for ($idx_in = 0, $num_in = count($sections_in); $idx_in < $num_in; $idx_in++)
	    		{
//			        $out .= '<div  class="fixed-menu" '.(($sections[$idx]['id']==$sections_in[$idx_in]['masterid']) ? 'style="display:block;"' : '' ).'>';
			        $link_in = (($sections_in[$idx_in]['redirectlink'] == '') || ($sections_in[$idx_in]['redirectlink'] == 'NULL')) ? href($sections_in[$idx_in]['id']) : $sections_in[$idx_in]['redirectlink'];
	            	$out .= '<li class="">'."\n";
					$out .= '<a href="' .$link_in.'">' . $sections_in[$idx_in]['menutitle'] . '</a>'."\n";
					$sql_in2 = "SELECT id, title, idx, redirectlink, menutitle, category FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 4 AND deleted = 0 AND masterid = " . $sections_in[$idx_in]['id'] . " AND visibility = 1 ORDER BY position;";
					$sections_in2 = db_fetch_all($sql_in2);
					 if(count($sections_in2) > 0) {
					 	$out .= '<div class="sub s2">'."\n";
					 	$out .= '<ul class="lastUL">'."\n";
					 	for ($idx_in2 = 0, $num_in2 = count($sections_in2); $idx_in2 < $num_in2; $idx_in2++)
					 	{
					 		$link_in2 = (($sections_in2[$idx_in2]['redirectlink'] == '') || ($sections_in2[$idx_in2]['redirectlink'] == 'NULL')) ? href($sections_in2[$idx_in2]['id']) : $sections_in2[$idx_in2]['redirectlink'];
					 		$out .= '<li>'."\n";
					 		$out .= '<a href="' . $link_in2 . '">' . $sections_in2[$idx_in2]['menutitle'] . '</a>'."\n";
					 		$sql_in3 = "SELECT id, title, idx, redirectlink, menutitle FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menuid = 4 AND deleted = 0 AND masterid = " . $sections_in2[$idx_in2]['idx'] . " AND visibility = 1 ORDER BY position;";
					 	$sections_in3 = db_fetch_all($sql_in3);
					 		if(count($sections_in3) > 0) {
					 			$out .= '<div class="sub s2">'."\n";
					 			$out .= '<ul>'."\n";
					 			for ($idx_in3 = 0, $num_in3 = count($sections_in3); $idx_in3 < $num_in3; $idx_in3++)
					 			{
					 				$link_in3 = (($sections_in3[$idx_in3]['redirectlink'] == '') || ($sections_in3[$idx_in]['redirectlink'] == 'NULL')) ? href($sections_in3[$idx_in3]['id']) : $sections_in3[$idx_in3]['redirectlink'];
					 				$out .= '<li>'."\n";
					 				$out .= '<a href="' . $link_in3 . '">' . $sections_in3[$idx_in3]['menutitle'] . '</a>'."\n";
					 				$out .= '</li>'."\n";
					 			}
					 			$out .= '</ul>'."\n";
					 			$out .= '</div>'."\n";
					 		} else {
					 			$out .= ''."\n";
					 		}
					 		$out .= '</li>'."\n";
					 	}
					 	$out .= '</ul>'."\n";
					 	$out .= '</div>'."\n";
					 } else {
					 	$out .= ''."\n";
					 }
					$out .= '</li>'."\n";
				}
	            $out .= '</ul>'."\n";
			} else {
		        $out .= ''."\n";
			}
		$out .= '
						</li>
				'."\n";
    }
    return $out;
}

function location()
{
    $storage = Storage::instance();
	$out = '';
    $page = db_fetch("SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND id= '".c("section.home")."' LIMIT 1;");
	if($storage->section["id"]!=1)
		$out .= '<li><a href="' . href(c("section.home")) . '">' . $page["title"] . '</a></li>'."\n";
	$segment = '';
    if (is_numeric($storage->segments[count($storage->segments) - 1])) {
		if($storage->section["category"]==16) {
			for($i=0; $i<count($storage->segments)-2; $i++) :
				$segment .= (($segment!='') ? '/' : '').$storage->segments[$i];
				$page = db_fetch("SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND slug = '{$segment}' LIMIT 1;");
				$link = (($page['redirectlink'] == '') || ($page['redirectlink'] == 'NULL')) ? href($page['id']) : $page['redirectlink'];
				$title = $page['title'];
				$out .= '<li><a href="' . $link . '">' . $title . '</a></li>'."\n";
			endfor;
			$product = db_fetch("SELECT * from catalogs where language='".l()."' and id=".db_escape($storage->product['id']));
			$cat = db_fetch("SELECT * from menus where language='".l()."' and id=".$product["menuid"]);
			$catpage = db_fetch("SELECT * from pages where language='".l()."' and attached='".$cat["title"]."'");
			// $out .= '<li class="active"><a href="'.href($catpage["id"], array(), l(), $product['id']).'">' . $product["title"] . '</a></li>'."\n";
		} else {
			$group = db_fetch("SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND menutype = '".$storage->section['menuid']."' LIMIT 1;");
			$segments = explode("/", $group["slug"]);
			for($i=0; $i<count($segments); $i++) :
				$segment .= (($segment!='') ? '/' : '').$segments[$i];
				$page = db_fetch("SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND slug = '{$segment}' LIMIT 1;");
				$link = (($page['redirectlink'] == '') || ($page['redirectlink'] == 'NULL')) ? href($page['id']) : $page['redirectlink'];
				$title = $page['title'];
				$out .= '<li><a href="' . $link . '" class="active">' . $title . '</a></li>'."\n";
			endfor;
			$link = (($storage->section['redirectlink'] == '') || ($storage->section['redirectlink'] == 'NULL')) ? href($storage->section['id']) : $storage->section['redirectlink'];
			$title = $storage->section['title'];
			// $out .= '<li class="active"><a href="' . $link . '">' . $title . '</a></li>'."\n";
		}
	} else {
		for($i=0; $i<count($storage->segments); $i++) :
			$segment .= (($segment!='') ? '/' : '').$storage->segments[$i];
			$page = db_fetch("SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND slug = '{$segment}' LIMIT 1;");
			$link = (($page['redirectlink'] == '') || ($page['redirectlink'] == 'NULL')) ? href($page['id']) : $page['redirectlink'];
			$title = $page['title'];
			$out .= '<li><a href="' . $link . '"'.(($i==count($storage->segments)-1) ? ' class="active"' : '').'>' . $title . '</a></li>'."\n";
		endfor;
	}
    return $out;
}

function calendar($id = 17, $date = array(), $objid) {
    $out = '';

    $month_names = c('month.names');
    $day_names = c('day.shortnames');
    $day = 1;
    $today = 0;

	$year = isset($date['y']) ? $date['y'] : date('Y');
	$month = isset($date['m']) ? abs($date['m']) : date('n');

    $month_num = count($month_names);

    $next_year = $year;
    $prev_year = $year;

    $next_month = $month + 1;
    $prev_month = $month - 1;
    if ($next_month == 13) {
        $next_month = 1;
        $next_year = $year + 1;
    }
    if ($prev_month == 0) {
        $prev_month = 12;
        $prev_year = $year - 1;
    }
    if ($year == date('Y') && $month == date('n')) {
        $today = date('j');
    }
    $first_day_in_month = date('N', mktime(0,0,0, $month, 1, $year));
    $days_in_month = date("t", mktime(0, 0, 0, $month, 1, $year));
	$day_list = array_fill(1, $days_in_month, 0);

	$upcoming_slug = db_retrieve('slug', c("table.pages"), 'id', 27);
	$past_slug = db_retrieve('slug', c("table.pages"), 'id', 33);

    $out .= '<table id="calendar">';
    $out .= '<tr><td class="prev"><a href="'.href($id, array('y' => $prev_year, 'm' => $prev_month)).'" id="cmla" class="left"></a></td><td id="cm-date" colspan="5">' . $month_names[$month][l()] . ' ' . $year . '</td><td class="next"><a href="'.href($id, array('y' => $next_year, 'm' => $next_month)).'" id="cmra" class="right"></a></td></tr>';
    $out .= '<tr id="days">';
    for ($i = 1; $i <= 7; $i++) {
        $out .= '<td class="header">' . $day_names[$i][l()] . '</td>';
    }
    $out .= '</tr>';
    
    $total_place = db_fetch("SELECT sum(place) * 2 as qnt from obj_places where objid={$objid} and visibility=1 and language='".l()."'");
    $total_place = $total_place['qnt'];

    $resdate = db_fetch_all("SELECT day(resdate) as day, month(resdate) as month, year(resdate) as year from ".c("table.cart")." where objid={$objid} and sold=1 and resdate between '".date('Y-m-d H:i:s')."' and '".date('Y-m-d H:i:s', strtotime('+ 30 DAYS'))."' group by orderid");
    if (!empty($resdate)) {
    	$res_flip = array();
    	$i = 1;
	    foreach ($resdate as $value) {
	    	if (isset($res_flip[$value['day']]) && $res_flip[$value['day']]['day'] == $value['day']) {
	    		$i++;
		    	$value['count'] = $i;
	    	} else {
	    		$i = 1;
		    	$value['count'] = $i;
		    }
	    	$res_flip[$value['day']] = $value;
	    }
	    foreach ($day_list as $key => $value) {
	    	if (!isset($res_flip[$key]))
	    		$reserved[$key] = array('day' => 0, 'month' => 0, 'year' => 0);
	    	else
		    	$reserved[$key] = $res_flip[$key];
	    }
	    unset($resdate, $res_flip);
    } else {
    	$reserved = $day_list;
    }
    
    while ($day <= $days_in_month) {
        $out .= '<tr>';
        for ($i = 1; $i <= 7; $i++) {
            $class = '';
            if ($i > 4) {
                $class = ' weekend';
            }
            if ($day == $today) {
                $class = ' today';
            }
            if (($first_day_in_month == $i || $day > 1) && ($day <= $days_in_month)) {
            	if ($day == $reserved[$day]['day'] && $month == $reserved[$day]['month'] && $year == $reserved[$day]['year']) {
            	    $class = ($total_place > $reserved[$day]['count']) ? ' res' : ' res-full';
            	    $link = (date('Ymd', strtotime($year.$month.$day)) > $year.$month.$day) ? $upcoming_slug : $past_slug;
	                $out .= '<td class="day'.$class.'"><div class="number"><a href="'.href($link, array('y' => $year, 'm' => $month, 'd' => $day)).'">'.$day.'</a></div></td>';
            	} else {
                	$out .= '<td class="day'.$class.'"><div class="number">'.$day.'</div></td>';
            	}
                $day++;
            } else {
                $out .= '<td '.$class.'>&nbsp;</td>';
            }
        }
        $out .= '</tr>';
    }
    $out .= '</table>';
    return $out;
}

function contact_home(){
    $sql = "SELECT * FROM  ".c("table.pages")." WHERE language = '" . l() . "' AND visibility = 1 and deleted=0 AND id =6;";
	$newshome = db_fetch($sql);
    if (empty($newshome))
        return NULL;
    $out = NULL;
	$i=0;
	$link = href($newshome['id']);
    $out = $newshome["description"];
    return $out;
}

function slide_home_title(){
	$out  = '';	
	$i = -1;
	$j = 0;
	$slides = db_fetch_all("SELECT * FROM " . c("table.galleries") . " WHERE  language = '" . l() . "' AND deleted=0 AND menuid=9 AND visibility = 1 order by position ASC" );
		$i++;
		$j++;
		foreach($slides as $slide) :
		if($i==0){
		$out.='
				<a id="carousel-selector-'.$i.'" class="col-sm-3 SelectoItem selected">
					<div class="Number">0'.$j.'</div>
					<div class="Title">'.$slide['title'].'</div>
				</a>
				'; 
		}else{ 
		$out.='
				<a id="carousel-selector-'.$i.'" class="col-sm-3 SelectoItem">
					<div class="Number">0'.$j.'</div>
					<div class="Title">'.$slide['title'].'</div>
				</a>
				';   
		}   
	    $i++;
	    endforeach;
    return $out;
}

function slide_home_img(){
	$out  = '';	
	$i = -1;
	$slides = db_fetch_all("SELECT * FROM " . c("table.galleries") . " WHERE  language = '" . l() . "' AND deleted=0 AND menuid=9 AND visibility = 1 order by position ASC" );
		$i++;
		foreach($slides as $slide) :
		if($i==0){
		$out.='
		            	<div class="active item" data-slide-number="'.$i.'">
			                <img src="'.$slide['image1'].'" class="img-responsive">
			            </div>
				'; 
		}else{
		$out.='
		            	<div class="item" data-slide-number="'.$i.'">
			                <img src="'.$slide['image1'].'" class="img-responsive">
			            </div>
				';  
		}
	    $i++;
	    endforeach;
    return $out;
}


function video_home(){
	$out  = '';	
	$i = 1;
	$slides = db_fetch_all("SELECT * FROM " . c("table.galleries") . " WHERE  language = '" . l() . "' AND deleted=0 AND menuid=10 AND visibility = 1 order by position desc" );
		foreach($slides as $slide) :
		$vid = str_replace('https://www.youtube.com/watch?','',str_replace('https://youtu.be/','',$slide['link']));
		$out.='
						<div class="vid left">
							<a href="https://www.youtube.com/v/'.$vid.'?fs=1&amp;autoplay=1" class="various fancybox.iframe">
								<img src="'.$slide['image1'].'" alt="" width="320" height="220" />
							</a>
						<!--<object width="100%" height="100%">
							<param name="movie" value="https://www.youtube.com/v/'.$vid.'?version=3&amp;hl=en_US"></param>
							<param name="allowFullScreen" value="true"></param>
							<param name="allowscriptaccess" value="always"></param>
							<param name="wmode" value="transparent"></param>
							<embed src="https://www.youtube.com/v/'.$vid.'?version=3&amp;hl=en_US" type="application/x-shockwave-flash" width="100%" height="100%" wmode="transparent" allowscriptaccess="always" allowfullscreen="true"></embed>
						</object>-->
						</div>
						';      
	    $i++;
	    endforeach;
    return $out;
}

function online_shop(){
	$cat=db_fetch_all("SELECT * from pages where language='".l()."' and visibility=1 and deleted=0 and masterid=3");
    foreach ($cat as $c) {
		$children = db_fetch_all("SELECT id, title, menutype, image1, menuid from ".c("table.pages")." where masterid = {$c['id']} and visibility=1 and deleted=0 and language='".l()."' ORDER BY position "); 
	}

            $i=0;
			$n = 1;
			$x = 1;
			$out = NULL;
		      if(!empty($children)) :
			    foreach ($children AS $child) {
		            $list = db_fetch_all("SELECT * FROM catalogs WHERE menuid = '".$child['menutype']."' and visibility=1 and deleted=0 and language='".l()."' ORDER BY position;");
		            if(!empty($list)):
						foreach($list as $p):
						$i+=0.2;
						if($p['menuid']==5){$n = 3;}
				        if($p['menuid']==6){$n = 2;}
						$out.='
					      <div class="col-sm-12 showbox wow fadeInUp" data-wow-delay="'.$i.'s">
					        <div class="product fix geo">
					          <div class="img left">
					            <img src="crop.php?img='.$p['image1'].'&n='.$n.'" class="img-responsive">
					          </div>
					          <div class="col-sm-10 right">
						          <h3>
						            '.$p['title'].'
						          </h3>';
						          if($p['brand']):
							          $out.='<h4>
							            '.$p['brand'].'
							          </h4>';
						          endif;
						          $out.= $p['description'] .'
						          <div class="fix" style="height:50px;">
						            <div class="note left">
						              '.l('note').'
						            </div>
						            <div class="cent">
							            <div class="quantity left bd" id="qnt'.$p['id'].'">
							              <input name="quantity" type="text" value="1" class="qnt-inp bd">
							              <div class="arrows right">
							                <img src="_website/images/arrow-sort-up.png" data-id="'.$p['id'].'" data-dir="up" class="qnt-arr">
							                <img src="_website/images/arrow-sort-down.png" data-id="'.$p['id'].'" data-dir="down" class="qnt-arr">
							              </div>
							            </div>
							            <div class="addbask left">
							              <a href="javascript:;" class="bd" onclick="add_to_basket('.$p['id'].');">'.l('add.cart').'</a>
							            </div>
						            </div>
						          </div>
						          <div class="fix cent">
							          <div class="price left">
							            '.round($p['price']).'
							            <input type="hidden" id="pr'.$p["id"].'" value="'.round($p['price']).'" /></td>
							          </div>
						          </div>
					          </div>	
					        </div>
					      </div>
						';
						endforeach;
		            endif;   		  
			   }
        	else :
		$products = db_fetch_all("
			SELECT * FROM ".c("table.catalogs")." WHERE language = '" . l() . "' AND visibility = 1 and deleted=0 ORDER BY position
		");
		if (empty($products))
	        return NULL;
			    foreach ($products AS $p) {
					$i+=0.2;
					if($p['menuid']==5){$n = 3;}
			        if($p['menuid']==6){$n = 2;}
					$out.='
				      <div class="col-sm-12 showbox wow fadeInUp" data-wow-delay="'.$i.'s">
				        <div class="product fix geo">
				          <div class="img left">
				            <img src="crop.php?img='.$p['image1'].'&n='.$n.'" class="img-responsive">
				          </div>
				          <div class="col-sm-10 right">
					          <h3>
					            '.$p['title'].'
					          </h3>';
					          if($p['brand']):
						          $out.='<h4>
						            '.$p['brand'].'
						          </h4>';
					          endif;
					          $out.= $p['description'] .'
					          <div class="fix" style="height:50px;">
					            <div class="note left">
					              '.l('note').'
					            </div>
					            <div class="cent">
						            <div class="quantity left bd" id="qnt'.$p['id'].'">
						              <input name="quantity" type="text" value="1" class="qnt-inp bd">
						              <div class="arrows right">
						                <img src="_website/images/arrow-sort-up.png" data-id="'.$p['id'].'" data-dir="up" class="qnt-arr">
						                <img src="_website/images/arrow-sort-down.png" data-id="'.$p['id'].'" data-dir="down" class="qnt-arr">
						              </div>
						            </div>
						            <div class="addbask left">
						              <a href="javascript:;" class="bd" onclick="add_to_basket('.$p['id'].');">'.l('add.cart').'</a>
						            </div>
					            </div>
					          </div>
					          <div class="fix cent">
						          <div class="price left">
						            '.round($p['price']).'
						            <input type="hidden" id="pr'.$p["id"].'" value="'.round($p['price']).'" /></td>
						          </div>
					          </div>
				          </div>	
				        </div>
				      </div>
					';
			   }
        	endif;
	return $out;
}

function about_home($id){
    $sql = "SELECT * FROM  ".c("table.pages")." WHERE language = '" . l() . "' AND visibility = 1 and deleted=0 AND id =".$id;
	$newshome = db_fetch($sql);
    if (empty($newshome))
        return NULL;
    $out = NULL;
	$i=0;
	$link = href($newshome['id']);
    $out .= '
                <h2>'.$newshome["title"].'</h2>
                '.$newshome["description"];
            if($newshome['id'] == 2):    
              $out .= ' <div class="more"><a href="'.$link.'">'. l('more') .'</a></div>
		    ';
		    endif;

    return $out;
}


function subscribe()
{
	if(isset($_POST['send'])){
	   	$email = trim(db_escape($_POST['email']));
		$result = db_fetch("SELECT email FROM subscribe WHERE email='".$email."'");
		if(!empty($result)){
			return l("email.already.indb");
		}else{
			if(empty($email)){
				return l("enter.email");
			}else{
				db_query("INSERT INTO subscribe SET email='$email'");
				return l("successfully.subscribed");
			}
		}
	}

}

function product_count() {
	$sql = "SELECT sum(quantity) as cnt FROM cart WHERE ".((isset($_SESSION["user"])) ? " userid='".$_SESSION["user"]["id"] . "'" :" session='" . session_id() . "'" )." and sold=0 and pid<>0;";
    $homepage = db_fetch($sql);
    if (empty($homepage))
        return NULL;
    return (($homepage["cnt"] != '')?($homepage["cnt"]):'0');
}


// New


function products_home()
{

    $sql = "SELECT * FROM ".c("table.pages")." WHERE masterid=2 AND language = '" . l() . "' AND visibility = 1 and deleted=0 order by position";
    $homepage = db_fetch_all($sql);
    if (empty($homepage))
        return NULL;
    		$out = '';
		    foreach ($homepage AS $home) {
				//$link = href(3, array(), l(), $home['id']);
				$link = href($home['id']);
				$out .= '
				      <div class="section">
				        <div class="container">
				          <div class="row">
				            <div class="col-md-offset-2 col-md-8 pt-off-md">
				              <div class="section-title">
				                <h2><a href="'.$link.'">'.$home['title'].'</a></h2>
				              </div>
				              <div class="img">
				                <a href="'.$link.'" class="dib">
				                  <img src="'.$home['image1'].'" class="img-responsive center-block" alt="">
				                </a>
				              </div>
				            </div>
				          </div>
				        </div>
				      </div>
	               '."\n";
		   }

    return $out;
}

function similar_products($id,$pid)
{
    $sql = "SELECT * FROM ".c("table.catalogs")." WHERE menuid='".$id."' AND  language = '" . l() . "' AND visibility = 1 and deleted=0 order by position LIMIT 15";
    $homepage = db_fetch_all($sql);
    if (empty($homepage))
        return NULL;
    $out = NULL;
						
			    foreach ($homepage AS $home) {

				$child = db_fetch("SELECT id FROM ".c("table.pages")." WHERE menutype=".$home["menuid"]." AND language = '".l()."'");

				$link = href($child["id"], array(), l(), $home['id']);

				
					if($home['id']==$pid){
					$out .= '
            <div class="col-sm-2">
				<a href="'.$link.'" class="Item">
					<div class="Image"><img src="'.$home['image2'].'"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="'.$home['image1'].'"/></div>
						<div class="Title">'.$home['title'].'</div>
						<li class="Address">'.$home['address'].'</li>
						<li class="Time">ორშ-პარ: '.$home['MonFri'].' </br> შაბ-კვ: '.$home['SatSun'].' </li>
					</div>
				</a>
			</div>
		               		'."\n";
					}else{
					$out .= '
            <div class="col-sm-2">
				<a href="'.$link.'" class="Item">
					<div class="Image"><img src="'.$home['image2'].'"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="'.$home['image1'].'"/></div>
						<div class="Title">'.$home['title'].'</div>
						<li class="Address">'.$home['address'].'</li>
						<li class="Time">ორშ-პარ: '.$home['MonFri'].' შაბ-კვ:: '.$home['SatSun'].' </li>
					</div>
				</a>
			</div>
		               		'."\n";						
					}
			   }
    
	return $out;
}

function basket_cnt()
{
	$sql = db_fetch("SELECT count(*) as cnt FROM cart WHERE sold=0 and quantity>0 and ".((isset($_SESSION["user"])) ? " userid='".$_SESSION["user"]["id"] . "'" :" session='" . session_id() . "'"));
    if (empty($sql))
        return 0;

	$count = NULL;
	$count = $sql['cnt'];

	return $count;
}

function pages($masterid){
	$sql = "SELECT * FROM ".c("table.pages")." WHERE masterid = '".$masterid."' AND language = '" . l() . "' AND visibility = 1 and deleted=0";
	$pages = db_fetch_all($sql);
    if (empty($pages))
        return NULL;
	$out = NULL;
      foreach ($pages as $page) {
	      $out .= '<div class="list col-md-3">
		      		  <div class="title">
			            <h3>'.$page['title'].'</h3>
			          </div>
			          <ul class="menu">';
					  $list = db_fetch_all("SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND visibility = 1 AND masterid = {$page['id']} AND `deleted` = '0' ORDER BY position;");
					  foreach($list as $item):
					  	  $link = href($item['id']);
					      $out .= '<li><a href="'.$link.'">'.$item['title'].'</a></li>';
					  endforeach; 
				  $out .= '</ul></div>'; 
	  }
    return $out;
}

function searchCatalog($id){
	$sql = "SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND visibility = 1 AND masterid = 6 AND `deleted` = '0' ORDER BY position;";
	$pages = db_fetch_all($sql);

    if (empty($pages))
        return NULL;
	
	if(isset($_GET['cat'])) {
		$sql = "SELECT * FROM " . c("table.pages") . " WHERE language = '" . l() . "' AND visibility = 1 AND masterid = 6 AND `deleted` = '0' AND menutype=".db_escape($_GET['cat'])." ORDER BY position;";
		$cat = db_fetch($sql);
	}
	
	$out = NULL;
	$out .= '<button type="button" name="cat" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" value="'.(isset($_GET['cat']) ? $_GET['cat'] : '').'">'.(isset($cat['title']) ? $cat['title'] : l('hauptkatalog')).'<span class="caret"></span></button>
		<input type="hidden" name="cat" value="'.(isset($_GET['cat']) ? $_GET['cat'] : '').'"/>
                <ul class="dropdown-menu">';
      foreach ($pages as $page) {
	  	  //$link = href($page['id']);
	      $out .= '<li><a href="'.href($id).'?cat='.$page['id'].'">'.$page['title'].'</a></li>'; 
	  }
	  $out .= "</ul>";
    return $out;
}




  function menu($id=1) {
  	  $items=db_fetch_all("select * from pages where language='".l()."' and masterid=".$id." order by position");
  	  $out="";
  	  foreach($items as $item) {
  	  	  $out .= '<li><a href="'.href($item["id"]).'">'.$item["title"].'</a></li>';
  	  }
  	  if(count($items)>0)
  	  	  return '<ul>'.$out.'</ul>';
  	  else 
  	  	  return $out;
  }
  function menu_count($id=1) {
  	  $items=db_fetch_all("select * from pages where language='".l()."' and masterid=".$id." order by position");
	  return count($items);
  }
  function menu_title($id=1) {
  	  $items=db_fetch("select * from pages where language='".l()."' and id=".$id." order by position");
	  return $items["title"];
  }
  function menu_desc($id=1) {
  	  $items=db_fetch("select * from pages where language='".l()."' and id=".$id." order by position");
	  return $items["description"];
  }
  function menu_visibility($id=1) { 
  	  $items=db_fetch("select * from pages where language='".l()."' and id=".$id." order by position");
	  return $items["visibility"];
  }


function select_addresses($ids = false, $menutype = false){
	if($menutype){
		$sqlQuery = "SELECT `addresslists` FROM `catalogs` WHERE menuid = ".$menutype." and visibility=1 and deleted=0 and language = '".l()."'";
		//echo $sqlQuery;
		$fetch = db_fetch_all($sqlQuery);
		$check = array();
		$address = "";
		foreach ($fetch as $v) {
			if(!empty($v['addresslists']) && !in_array($v['addresslists'], $check)){
				$check[] = $v['addresslists'];
				$address .= $v['addresslists'].",";
			}
		}

		$existingAdresses = explode(",",trim($address, ","));
		$sql = "SELECT id, title FROM pages WHERE language = '" . l() . "' AND menuid = 20 AND deleted = 0 AND visibility = 1 AND id IN(".implode(",",$existingAdresses).") ORDER BY position";

	}else if($ids){
		$sql = "SELECT id, title FROM pages WHERE language = '" . l() . "' AND menuid = 20 AND deleted = 0 AND visibility = 1 AND id IN(".$ids.") ORDER BY position";
	}else{
		$sql = "SELECT id, title FROM pages WHERE language = '" . l() . "' AND menuid = 20 AND deleted = 0 AND visibility = 1 ORDER BY position";
	}
	
    $items = db_fetch_all($sql);

    return $items;
}

function checkAdminUsers(){
	$ips = explode(",", a_s('iplist   '));
	$myIP = $_SERVER["REMOTE_ADDR"]; 
	
	$out = false;
	foreach ($ips as $ip) {
		if($ip==$myIP){
			$out = true;
		}
	}
	
	if(!$out){
		die("Sorry, you don't have a permission!");
	}
}