<?php

defined('DIR') OR exit;

class Manager_Pages
{

    protected $storage;

    public function __construct()
    {
        $this->storage = Storage::instance();
        $this->storage->content = NULL;
    }

    function error()
    {
        $tpl['title'] = l('404');
        $this->storage->content = template('404', $tpl);
    }

    function attached_images($idx)
    {
        if (empty($idx) OR $idx === FALSE)
        {
            return NULL;
        }
        $sql = "SELECT * FROM `".c("table.attached")."` WHERE `page` = {$idx} ORDER BY `position` ASC;";
        $res = db_fetch_all($sql);
        if (empty($res))
        {
            return NULL;
        }
        $images = array();
        foreach ($res as $file)
        {
            $ext = substr(strrchr($file['path'], '.'), 1);
            if (in_array($ext, c('thumbnail.exts')))
            {
                $file['ext'] = $ext;
                $images[] = $file;
            }
        }
        if (empty($images))
        {
            return NULL;
        }
        return template('attached_images', array('images' => $images));
    }

    function attached_files($idx)
    {
        if (empty($idx) || $idx === false)
        {
            return NULL;
        }
        $sql = "SELECT * FROM `".c("table.attached")."` WHERE `page` = {$idx} ORDER BY `position` ASC;";
        $res = db_fetch_all($sql);
        if (empty($res))
        {
            return NULL;
        }
        $files = array();
        foreach ($res as $file)
        {
            $ext = substr(strrchr($file['path'], '.'), 1);
            if (!in_array($ext, c('thumbnail.exts')))
            {
                $file['ext'] = $ext;
                $files[] = $file;
            }
        }
        if (empty($files))
        {
            return NULL;
        }
        return template('attached_files', array('files' => $files));
    }

    function attached_all_files($idx)
    {
        if (empty($idx))
            return NULL;
        $sql = "SELECT * FROM `".c("table.attached")."` WHERE page = {$idx} ORDER BY position ASC;";
        $tpl["files"] = db_fetch_all($sql);
        if (empty($tpl))
            return NULL;
        return template('all_files', array('all_files' => $tpl));
    }

    ///////////// DO NOT EDIT ABOVE !!! //////////////

    function text()
    {
        if ($this->storage->section['redirectlink']!='')
            redirect($this->storage->section['redirectlink']);
        $this->storage->attachments = $this->attached_all_files($this->storage->section['id']);
        /*
          $this->storage->attachments = array();
          $this->storage->attachments['all'] = $this->attached_all_files($this->storage->section['id']);
          $this->storage->attachments['files'] = $this->attached_files($this->storage->section['id']);
          $this->storage->attachments['images'] = $this->attached_images($this->storage->section['id']);
          $tpl['attachments_all'] = $this->attached_all_files($this->storage->section['id']);
        */
        $tpl['attachments_all'] = $this->attached_all_files($this->storage->section['id']);
        $files = array();
        $images = array();
        $videos = array();
        $sql = "SELECT * FROM `".c("table.attached")."` WHERE page = {$this->storage->section['id']} ORDER BY position ASC;";
        $res = db_fetch_all($sql);
        foreach ($res as $file)
        {
            $ext = substr(strrchr($file['file'], '.'), 1);
            if (!in_array($ext, c('thumbnail.exts')))
            {
                if(strstr($file['file'],"youtu.be")) {
                    $file['path'] = str_replace('youtu.be','www.youtube.com/embed',$file['path']);
                    $videos[] = $file;
                } else {
                    $file['ext'] = $ext;
                    $files[] = $file;
                }
            }
            else
            {
                $image['ext'] = $ext;
                $images[] = $file;
            }
        }

        // if ($this->storage->section['menuid']==4 || $this->storage->section['menuid']==5 || $this->storage->section['menuid']==6) {
        //     $ip_arr = explode("|", $this->storage->section['field6']);
        //     if (!in_array(get_ip(), $ip_arr)) {
        //         if (count($ip_arr) < 0) {
        //             $ip_arr[] = get_ip();
        //         } else {
        //             $ip_arr = array_splice($ip_arr, 1);
        //             $ip_arr[] = get_ip();
        //         }
        //         $ip_arr = implode("|", $ip_arr);
        //         $lastvisit = db_update(c("table.pages"), array('field6' => $ip_arr), "WHERE `id` = {$this->storage->section["id"]}");
        //         db_query($lastvisit);
        //         $counter = db_update(c("table.pages"), array('field5' => $this->storage->section['field5']+1), "WHERE `id` = {$this->storage->section["id"]}");
        //         db_query($counter);
        //     }
        // }

        $tpl = $this->storage->section;
        $tpl['user'] = $this->storage->user;
        $sql = "SELECT * FROM `".c("table.attached")."` WHERE page = {$this->storage->section['id']} and language='".l()."' ORDER BY position ASC;";
        $tpl["files"] = db_fetch_all($sql);
//        $tpl["files"] = $files;
        $tpl["videos"] = $videos;
        $tpl["images"] = $images;

        if($this->storage->section["template"]=='') {
            if(is_from_list($this->storage->section['menuid'])) {
                $menutype=db_fetch("SELECT * from menus where language='".l()."' and id=".$this->storage->section['menuid']);
                if($menutype["type"]=="news")
                    $this->storage->content = template('newstext', $tpl);
                elseif($menutype["type"]=="articles")
                    $this->storage->content = template('articletext', $tpl);
                elseif($menutype["type"]=="events")
                    $this->storage->content = template('eventtext', $tpl);
                else
                    $this->storage->content = template('listtext', $tpl);
            } else {
                $this->storage->content = template('text', $tpl);
            }
        } else {
            $this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
        }
    }

    function feedback()
    {
        $this->storage->attachments = $this->attached_all_files($this->storage->section['id']);
		$tpl = $this->storage->section;
		if($this->storage->section["template"]=='')
	        $this->storage->content = template('contact', $tpl);
		else
	        $this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function search()
    {
    	$search = $this->storage->section; 
        if($this->storage->section["template"]=='')
            $this->storage->content = template('search', $search);
        else
            $this->storage->content = template('custom/'.$this->storage->section["template"], $search);
    }


    function sitemap()
    {
        $tpl = $this->storage->section;
		if($this->storage->section["template"]=='')
	        $this->storage->content = template('sitemap', $tpl);
		else
	        $this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function home()
    {
        $tpl = $this->storage->section;
        $this->storage->content = template('home', $tpl);
    }

    function wizard()
    {
        $this->storage->title = $this->storage->section['title'];
        $file = $this->storage->section['attached'];
        file_exists(c('folders.plugins').$file) AND require_once c('folders.plugins').$file;
    }

    function news()
    {
        $query = get("q");
        $search = "";
        if($query!=""){
            $search = " AND
                (
                    content LIKE '%{$query}%'
                    OR description LIKE '%{$query}%'
                    OR title LIKE '%{$query}%'
                    OR meta_keys LIKE '%{$query}%'
                )";
        }
        $count = "SELECT COUNT(*) AS cnt FROM `".c("table.pages")."` WHERE menuid = {$this->storage->section['menutype']} and language = '" . l() . "' and visibility = 1 and deleted = 0".$search." ORDER BY postdate DESC;";
        $count = db_fetch($count);

        // pager
        $page = abs(get('page', 1));
        $per_page = c('news.per_page');
        $count = $count['cnt'];
        $page_max = ceil($count / $per_page);
        $page = ($page > $page_max && $page_max != 0) ? $page_max : $page;
        $limit = "LIMIT " . (($page - 1) * $per_page) . ", {$per_page}";
        // pager end

        $sql = "SELECT * FROM `".c("table.pages")."` WHERE menuid = {$this->storage->section['menutype']} and language = '" . l() . "' and visibility = 1 and deleted = 0".$search." ORDER BY postdate DESC {$limit};";
        $res = db_fetch_all($sql);

        $tpl = $this->storage->section;
        $tpl['news'] = $res;
        
        $tpl['page_cur'] = $page;
        $tpl['page_max'] = $page_max;

		if($this->storage->section["template"]=='')
	        $this->storage->content = template('news', $tpl);
		else
	        $this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function lists()
    {
        $all = (get('all') == 'show');
        $menu_id = $this->storage->section['menutype'];
        if (!$all AND (empty($menu_id) OR $menu_id == 'NULL'))
            return ($this->storage->content = NULL);
        $all_news = $all ? " AND menuid IN (SELECT id FROM `".c("table.menus")."` WHERE `deleted` = '0' AND type = 'list') " : " AND menuid = {$menu_id} ";
        //Pager: start
        $page = abs(get('page', 1));
        $per_page = c('list.per_page');
        $limit = " LIMIT " . (($page - 1) * $per_page) . ",{$per_page}";
        $count = "SELECT COUNT(*) AS cnt FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND visibility = 1 AND deleted = 0 ORDER BY postdate DESC;";
        $count = db_fetch($count);
        $count = empty($count) ? 0 : $count['cnt'];
        $page_max = ceil($count / $per_page);
        $tpl = $this->storage->section;
        $tpl['page_cur'] = $page;
        $tpl['page_max'] = $page_max;
        $tpl['item_count'] = $count;
        $tpl['all_par'] = $all ? '&all=show' : null;
        //Pager: end
        $sql = "SELECT * FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND `deleted` = '0' AND visibility = 1 ORDER BY postdate DESC{$limit};";
        $res = db_fetch_all($sql);
        $tpl['lists'] = $res;
        if($this->storage->section["template"]=='')
            $this->storage->content = template('list', $tpl);
        else
            $this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function events()
    {
        $all = (get('all') == 'show');
        $menu_id = $this->storage->section['menutype'];
        if (!$all AND (empty($menu_id) OR $menu_id == 'NULL'))
            return ($this->storage->content = NULL);
        $all_news = $all ? " AND menuid IN (SELECT id FROM `".c("table.menus")."` WHERE `deleted` = '0' AND type = 'events') " : " AND menuid = {$menu_id} ";
        //Pager: start
        $page = abs(get('page', 1));
        $per_page = c('events.per_page');
        $limit = " LIMIT " . (($page - 1) * $per_page) . ",{$per_page}";
        $count = "SELECT COUNT(*) AS cnt FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND visibility = 1 AND deleted = 0 ORDER BY postdate DESC;";
        $count = db_fetch($count);
        $count = empty($count) ? 0 : $count['cnt'];
        $page_max = ceil($count / $per_page);
        $tpl = $this->storage->section;
        $tpl['page_cur'] = $page;
        $tpl['page_max'] = $page_max;
        $tpl['item_count'] = $count;
        $tpl['all_par'] = $all ? '&all=show' : null;
        //Pager: end
        $sql = "SELECT * FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND `deleted` = '0' AND visibility = 1 ORDER BY postdate DESC{$limit};";
        echo $sql;
        $res = db_fetch_all($sql);
        $tpl['events'] = $res;
        if($this->storage->section["template"]=='')
            $this->storage->content = template('events', $tpl);
        else
            $this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function articles()
    {
        $all = (get('all') == 'show');
        $menu_id = $this->storage->section['menutype'];
        if (!$all AND (empty($menu_id) OR $menu_id == 'NULL'))
            return ($this->storage->content = NULL);
        $all_news = $all ? " AND menuid IN (SELECT id FROM `".c("table.menus")."` WHERE `deleted` = '0' AND type = 'articles') " : " AND menuid = {$menu_id} ";

        $tpl = $this->storage->section;
        /*G script start*/
        $tpl["startDate"] = date("d/m/Y");
        $tpl["endDate"] = date("d/m/Y");
        $tpl["dateString"] = "";
        if(
            isset($_GET["daterange"]) && 
            !empty($_GET["daterange"])
          ){
          $daterange = explode("@", $_GET["daterange"]);
          
          if(
            isset($daterange[0]) && 
            isset($daterange[1]) && 
            g_validateDate($daterange[0], 'd-m-Y') && 
            g_validateDate($daterange[1], 'd-m-Y')
          ){
            $tpl["startDate"] = $daterange[0];
            $tpl["endDate"] = $daterange[1];
            $tpl["dateString"] = $tpl["startDate"]." / ".$tpl["endDate"];
          }
        }
        /*G script end*/
        
        // search by date
        $seachBydate = "";
        if(isset($_GET['daterange'])){
            $explodeStart = explode("-", $tpl["startDate"]);
            $explodeEnd = explode("-", $tpl["endDate"]);
            $startString = $explodeStart[2]."-".$explodeStart[1]."-".$explodeStart[0]." 00:00:00";
            $endString = $explodeEnd[2]."-".$explodeEnd[1]."-".$explodeEnd[0]." 00:00:00";

            $seachBydate = " AND ((DATE(`postdate`)>='".$startString."' AND DATE(`postdate`)<='".$endString."') OR (DATE(`expiredate`)>='".$startString."' AND DATE(`expiredate`)<='".$endString."'))";
        }

        //Pager: start
        $page = abs(get('page', 1));
        $per_page = c('articles.per_page');
        $limit = " LIMIT " . (($page - 1) * $per_page) . ",{$per_page}";
        $count = "SELECT COUNT(*) AS cnt FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND visibility = 1 AND deleted = 0".$seachBydate." AND `postdate`!='0000-00-00 00:00:00' AND `expiredate`!='0000-00-00 00:00:00' ORDER BY postdate DESC;";
        $count = db_fetch($count);

        $count = empty($count) ? 0 : $count['cnt'];
        $page_max = ceil($count / $per_page);
        
        $tpl['page_cur'] = $page;
        $tpl['page_max'] = $page_max;
        $tpl['item_count'] = $count;
        $tpl['all_par'] = $all ? '&all=show' : null;

        
        //Pager: end
        $sql = "SELECT *, DATE(`postdate`) as postdatestring, DATE(`expiredate`) as expiredatestring FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND `deleted` = '0' AND visibility = 1".$seachBydate." AND `postdate`!='0000-00-00 00:00:00' AND `expiredate`!='0000-00-00 00:00:00' ORDER BY postdate DESC{$limit};";
        $res = db_fetch_all($sql);
        // echo $sql;
        // exit;

        /* All Events START */
        $gselect = "SELECT `postdate` as startdate, `expiredate` as enddate FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND `deleted` = '0' AND visibility = 1 AND `postdate`!='0000-00-00 00:00:00' AND `expiredate`!='0000-00-00 00:00:00' ORDER BY postdate DESC;";
        $gfetch = db_fetch_all($gselect);
        $gdates = array();
        $i = 0;
        foreach ($gfetch as $k => $v) {
            $expl = preg_match('/\d{4}-\d{2}-\d{2}/', $v["startdate"], $start);
            $expl = preg_match('/\d{4}-\d{2}-\d{2}/', $v["enddate"], $end);

            // $ex1 = explode("-", $start[0]);
            // $ex2 = explode("-", $end[0]);
            // $gdates[$i]["startdate"] = $ex1[2]."/".$ex1[1]."/".$ex1[0];
            // $gdates[$i]["enddate"] = $ex2[2]."/".$ex2[1]."/".$ex2[0];

            $gdates[$i]["startdate"] = $start[0];
            $gdates[$i]["enddate"] = $end[0];

            $i++;
        }

        /* All Events END */

        $postdatesql = "SELECT `title`, `postdate`, `expiredate` FROM `".c("table.pages")."` WHERE language = '" . l() . "' {$all_news}AND `deleted` = '0' AND visibility = 1;";
        $postdateres = db_fetch_all($postdatesql);

        $tpl['articles'] = $res;
        $tpl['postdates'] = $postdateres;
        $tpl['gdates'] = $gdates;

        if($this->storage->section["template"]=='')
            $this->storage->content = template('articles', $tpl);
        else
            $this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function photo()
    {
        $sql_c = "SELECT * FROM `".c("table.pages")."` WHERE `masterid` = '{$this->storage->section['id']}' and visibility=1 and deleted=0 and language='".l()."' order by position asc;";
        $res_c = db_fetch_all($sql_c);

		if(!empty($res_c)) {
			$photos = $this->storage->section;
			$photos["children"] = $res_c;
			if($this->storage->section["template"]=='')
				$this->storage->content = template('galleries', $photos);
			else
				$this->storage->content = template('custom/'.$this->storage->section["template"], $photos);
			return;
		}

        $count = "SELECT count(*) as cnt from `".c("table.galleries")."` WHERE `menuid` = {$this->storage->section['menutype']} AND `deleted` = '0' AND `language` = '" . l() . "' AND visibility=1 ORDER BY `position` DESC";
        $count = db_fetch($count);

        // pager
        $page = abs(get('page', 1));
        $per_page = c('photos.per_page');
        $count = $count['cnt'];
        $page_max = ceil($count / $per_page);
        $page = ($page > $page_max && $page_max != 0) ? $page_max : $page;
        $limit = " LIMIT " . (($page - 1) * $per_page) . ", {$per_page}";
        // pager end

        $sql = "SELECT * FROM `".c("table.galleries")."` WHERE `menuid` = {$this->storage->section['menutype']} AND `deleted` = '0' AND `language` = '" . l() . "' AND visibility=1 ORDER BY `position` DESC{$limit}";
        $res = db_fetch_all($sql);

        $photos = $this->storage->section;
        
        $photos['page_cur'] = $page;
        $photos['page_max'] = $page_max;

        $photos["catalogs"] = $res;

		$photos["photos"] = $res;

		if($this->storage->section["template"]=='')
	        $this->storage->content = template('galleries', $photos);
		else
			$this->storage->content = template('custom/'.$this->storage->section["template"], $photos);
    }

   function video()
    {
        $sql_c = "SELECT * FROM `".c("table.pages")."` WHERE `deleted` = '0' AND `masterid` = '{$this->storage->section['id']}' order by position;";
        $res_c = db_fetch_all($sql_c);

		if(isset($_GET["q"])) {
			$q = db_escape($_GET["q"]); 
            $videos = $this->storage->section;
			$sql = "SELECT * FROM `".c("table.galleries")."` WHERE menuid in (select menutype from pages where masterid=3 and language='".l()."') AND `deleted` = '0' AND `language` = '" . l() . "' AND (title like '%".$q."%' OR author like '%".$q."%' OR meta_keys like '%".$q."%') ORDER BY `position` DESC;";
   	        $videos["videos"] = db_fetch_all($sql);;

            $videos["children"] = $res_c;
            if($this->storage->section["template"]=='')
                $this->storage->content = template('videolist', $videos);
            else
                $this->storage->content = template('custom/'.$this->storage->section["template"], $videos);
            return;
		}
		
        if(!empty($res_c)) {
            $videos = $this->storage->section;
	        $sql = "SELECT * FROM `".c("table.galleries")."` WHERE menuid in (select menutype from pages where masterid=3 and language='".l()."') AND `deleted` = '0' AND `language` = '" . l() . "' ORDER BY `position` DESC;";
   	        $videos["videos"] = db_fetch_all($sql);;

            $videos["children"] = $res_c;
            if($this->storage->section["template"]=='')
                $this->storage->content = template('videolist', $videos);
            else
                $this->storage->content = template('custom/'.$this->storage->section["template"], $videos);
            return;
        }

        $this->storage->title = $this->storage->section['title'];
        $sql_v = "SELECT * FROM `".c("table.menus")."` WHERE `deleted` = '0' AND `type` = 'videogallery' AND `id` = '{$this->storage->section['menutype']}';";
        $res_v = db_fetch($sql_v);

        $menu_id = $res_v["id"];
//        $menu_id = db_retrieve('id', c("table.menus"), 'visibility', 1, "AND `type` = 'videogallery' AND `name` = '{$this->storage->section['attached']}'");
        if (empty($menu_id) OR $menu_id == 'NULL')
        {
	        $videos = $this->storage->section;
	        $videos["videos"] = null;
        } else {
	        $sql = "SELECT * FROM `".c("table.galleries")."` WHERE `menuid` = {$menu_id} AND `deleted` = '0' AND `language` = '" . l() . "' ORDER BY `position` DESC;";
	        $res = db_fetch_all($sql);
	        $videos = $this->storage->section;
	        $videos["videos"] = $res;
        }
        if($this->storage->section["template"]=='')
            $this->storage->content = template('videos', $videos);
        else
            $this->storage->content = template('custom/'.$this->storage->section["template"], $videos);
    }

    function audio()
    {
        $sql_c = "SELECT * FROM `".c("table.pages")."` WHERE `deleted` = '0' AND `masterid` = '{$this->storage->section['id']}' order by position;";
        $res_c = db_fetch_all($sql_c);

        if(!empty($res_c)) {
            $audios = $this->storage->section;
	        $sql = "SELECT * FROM `".c("table.galleries")."` WHERE menuid in (select menutype from pages where masterid=4 and language='".l()."') AND `deleted` = '0' AND `language` = '" . l() . "' ORDER BY `position` DESC;";
   	        $audios["audios"] = db_fetch_all($sql);;

            $audios["children"] = $res_c;
            if($this->storage->section["template"]=='')
                $this->storage->content = template('audiolist', $audios);
            else
                $this->storage->content = template('custom/'.$this->storage->section["template"], $audios); 
            return;
        }

        $this->storage->title = $this->storage->section['title'];
        $sql_v = "SELECT * FROM `".c("table.menus")."` WHERE `deleted` = '0' AND `type` = 'audiogallery' AND `id` = '{$this->storage->section['menutype']}';";
        $res_v = db_fetch($sql_v);

        $menu_id = $res_v["id"];
        if (empty($menu_id) OR $menu_id == 'NULL')
        {
	        $videos = $this->storage->section;
	        $audios["audios"] = null;
        } else {
	        $sql = "SELECT * FROM `".c("table.galleries")."` WHERE `menuid` = {$menu_id} AND `deleted` = '0' AND `language` = '" . l() . "' ORDER BY `position` DESC;";
	        $res = db_fetch_all($sql);
	        $audios = $this->storage->section;
	        $audios["audios"] = $res;
	    }
		if($this->storage->section["template"]=='')
	        $this->storage->content = template('audios', $audios);
		else
			$this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function poll()
    {
        $this->storage->title = $this->storage->section['title'];
        $sql_v = "SELECT * FROM `".c("table.menus")."` WHERE `deleted` = '0' AND `type` = 'poll' AND `title` = '{$this->storage->section['attached']}';";
        $res_v = db_fetch($sql_v);
		$menu_id = $res_v["id"];

		if(isset($_GET["vote_form_perform"])) {
			$ip = get_ip() . '-' . $_SERVER['REMOTE_ADDR'];
			$ippresent=db_fetch("select count(*) as cnt from pollips where votedate='".date("Y-m-d")."' and ip='".$ip."' and pollid='".$menu_id."' ");
			if($ippresent["cnt"]==0) {
				db_query("insert into `".c("table.pollips")."` (votedate, ip, pollid) values('".date("Y-m-d")."','".$ip."','".$menu_id."')");
				db_query("update `".c("table.pollanswers")."` set answercounttotal=answercounttotal+1 where id='".$_GET["pollanswers"]."'");
				db_query("update `".c("table.pollanswers")."` set answercount=answercount+1 where id='".$_GET["pollanswer"]."' and language='".l()."'");
			}
		}
        if (empty($menu_id) OR $menu_id == 'NULL')
        {
            return ($this->storage->content = NULL);
        }
        $sql = "SELECT * FROM `".c("table.pollanswers")."` WHERE `pollid` = {$menu_id} AND `deleted`=0 AND `visibility`=1 AND `language` = '" . l() . "' ORDER BY `position`;";
        $res = db_fetch_all($sql);
        if (empty($res))
        {
            return ($this->storage->content = NULL);
        }
		$poll = $this->storage->section;
        $poll["answers"] = $res;
        $poll["pollid"] = $res_v["id"];
		if($this->storage->section["template"]=='')
	        $this->storage->content = template('poll', $poll);
		else
			$this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

    function catalog()
    {
        if(!empty($this->storage->product)) {

            $product = $this->storage->product;
            $product["pageid"] = $this->storage->section['id'];
            $product["level"] = $this->storage->section['level'];
            $product["headline"] = $this->storage->section['title'];
            $product['user'] = $this->storage->user;
            
            if ($product["visibility"] == 1) {
                $this->storage->content = template('product', $product);
            }
            return;
        }

        if ($this->storage->section['menutype'] == 0)
            return ($this->storage->content = NULL);

        $sql_c = "SELECT * FROM `".c("table.pages")."` WHERE `masterid` = {$this->storage->section['id']} and category = 16 AND `language` = '" . l() . "' AND `visibility`=1 AND `deleted`=0 ORDER BY position asc";

        $res_c = db_fetch_all($sql_c);

        if(!empty($res_c)) {
            $count = "SELECT count(*) as cnt from `".c("table.catalogs")."` WHERE menuid = {$this->storage->section['menutype']} and visibility=1 and deleted=0 and language = '" . l() . "' order by id desc";
            $count = db_fetch($count);

            // pager
            $page = abs(get('page', 1));
            $per_page = c('catalog.per_page');
            $count = $count['cnt'];
            $page_max = ceil($count / $per_page);
            $page = ($page > $page_max && $page_max != 0) ? $page_max : $page;
            $limit = " LIMIT " . (($page - 1) * $per_page) . ", {$per_page}";
            // pager end
            $selectpages = db_fetch_all("SELECT `menutype` FROM `pages` WHERE `masterid`=4 AND `language`='ge' AND `deleted`=0");
            $mtypes = array();
            foreach ($selectpages as $v) {
                $mtypes[] = $v["menutype"];
            }

            $query = get("q");
            $search = "";
            if($query!=""){
                $search = " AND
                    (
                        content LIKE '%{$query}%'
                        OR description LIKE '%{$query}%'
                        OR title LIKE '%{$query}%'
                        OR meta_keys LIKE '%{$query}%'
                    )";
            }
            $res = "SELECT (SELECT COUNT(id) from `".c("table.catalogs")."` WHERE menuid IN (".implode(",", $mtypes).") and visibility=1 and deleted=0 and language = '" . l() . "'".$search.") as counted, catalogs.* from `".c("table.catalogs")."` WHERE menuid IN (".implode(",", $mtypes).") and visibility=1 and deleted=0 and language = '" . l() . "'".$search." order by recommended DESC, '".(isset($_GET['date']) ? 'postdate' : 'id')."' desc".$limit;

            $res = db_fetch_all($res);
            // echo "<pre>";
            // print_r($res);
            // echo "</pre>";
            // exit;

            $catalog = $this->storage->section;
            
            $catalog['page_cur'] = $page;
            $catalog['page_max'] = $page_max;

            $catalog["catalogs"] = $res;

            $catalog["parents"] = $res_c;
            $catalog["storageid"] = $this->storage->section['id'];

            if($this->storage->section["template"]=='')
                $this->storage->content = template('catalogs', $catalog);
            else
                $this->storage->content = template('custom/'.$this->storage->section["template"], $catalog);
            return;
        } else {
            $count = "SELECT count(*) as cnt FROM `".c("table.catalogs")."` WHERE visibility=1 and deleted=0 and language = '" . l() . "' order by id desc";
            $count = db_fetch($count);

            // pager
            $page = abs(get('page', 1));
            $per_page = c('catalog.per_page');
            $count = $count['cnt'];
            $page_max = ceil($count / $per_page);
            $page = ($page > $page_max && $page_max != 0) ? $page_max : $page;
            $limit = " LIMIT " . (($page - 1) * $per_page) . ", {$per_page}";
            // pager end

            // Filter start
            $filter = "";

            $norm = db_fetch_all("SELECT distinct norm FROM catalogs WHERE language = '" . l() . "' AND visibility = 1 AND deleted = 0;");
            $f_norm = array();
            for($r=1; $r<count($norm); $r++) {
                if(isset($_GET["check3".$r]))
                    $f_norm[] = " norm ='" . db_escape($_GET["check3".$r])."'"; 
            }
            
            if(count($f_norm)>0) {
                $filter_norm = implode(" OR ",$f_norm);
                $filter .= ' AND ('.$filter_norm.') ';
            }

            $form = db_fetch_all("SELECT distinct form FROM catalogs WHERE language = '" . l() . "' AND visibility = 1 AND deleted = 0;");
            $f_form = array();
            for($f=1; $f<count($form); $f++) {
                if(isset($_GET["check4".$f]))
                    $f_form[] = " form ='" . db_escape($_GET["check4".$f])."'"; 
            }
            
            if(count($f_form)>0) {
                $filter_form = implode(" OR ",$f_form);
                $filter .= ' AND ('.$filter_form.') ';
            }

            $gewindeart = db_fetch_all("SELECT distinct gewindeart FROM catalogs WHERE language = '" . l() . "' AND visibility = 1 AND deleted = 0;");
            $f_gewindeart = array();
            for($f=1; $f<count($gewindeart); $f++) {
                if(isset($_GET["check5".$f]))
                    $f_gewindeart[] = " gewindeart ='" . db_escape($_GET["check5".$f])."'"; 
            }
            
            if(count($f_gewindeart)>0) {
                $filter_gewindeart = implode(" OR ",$f_gewindeart);
                $filter .= ' AND ('.$filter_gewindeart.') ';
            }

            $schneidrichtung = db_fetch_all("SELECT distinct schneidrichtung FROM catalogs WHERE language = '" . l() . "' AND visibility = 1 AND deleted = 0;");
            $f_schneidrichtung = array();
            for($f=1; $f<count($schneidrichtung); $f++) {
                if(isset($_GET["check6".$f]))
                    $f_schneidrichtung[] = " schneidrichtung ='" . db_escape($_GET["check6".$f])."'"; 
            }
            
            if(count($f_schneidrichtung)>0) {
                $filter_schneidrichtung = implode(" OR ",$f_schneidrichtung);
                $filter .= ' AND ('.$filter_schneidrichtung.') ';
            }

            $lochart = db_fetch_all("SELECT distinct lochart FROM catalogs WHERE language = '" . l() . "' AND visibility = 1 AND deleted = 0;");
            $f_lochart = array();
            for($f=1; $f<count($lochart); $f++) {
                if(isset($_GET["check7".$f]))
                    $f_lochart[] = " lochart ='" . db_escape($_GET["check7".$f])."'"; 
            }
            
            if(count($f_lochart)>0) {
                $filter_lochart = implode(" OR ",$f_lochart);
                $filter .= ' AND ('.$filter_lochart.') ';
            }
            // Filter end

            /* new filters START*/
            if(isset($_GET["a"]) && is_numeric($_GET["a"])){
                $filter .= ' AND FIND_IN_SET("'.(int)$_GET["a"].'", `addresslists`) ';
            }

            if(isset($_GET["q"]) && preg_match('/^[_A-z0-9ა-ჰ]*$/', $_GET["q"])){
                $q = str_replace(array("'", '"'), "", $_GET["q"]);
                $filter .= ' AND (title LIKE "%'.$q.'%" OR content LIKE "%'.$q.'%") ';
            }
            /* new filters END*/

            $sql = "SELECT (SELECT COUNT(id) FROM `catalogs` WHERE menuid = {$this->storage->section['menutype']} and visibility=1 and deleted=0 and language = '" . l() . "' ".$filter.") as counted, `catalogs`.* FROM `catalogs` WHERE menuid = {$this->storage->section['menutype']} and visibility=1 and deleted=0 and language = '" . l() . "' ".$filter." order by recommended DESC, id desc"."{$limit}";
            // echo $sql; 
            $res = db_fetch_all($sql);

            $catalog = $this->storage->section;
            
            $catalog['page_cur'] = $page;
            $catalog['page_max'] = $page_max;

            $catalog["items"] = $res;
            $catalog["storageid"] = $this->storage->section['id'];
            
            if($this->storage->section["template"]=='')
                $this->storage->content = template('catalog', $catalog);
            else
                $this->storage->content = template('custom/'.$this->storage->section["template"], $catalog);
        }
    }

    function faq()
    {
        $this->storage->title = $this->storage->section['title'];
		$menu_sql = "SELECT id FROM " . c("table.menus") . " WHERE `deleted` = '0' AND `type` = 'faq' AND `id` = '{$this->storage->section['menutype']}'";
        $menu_array = db_fetch($menu_sql);
		$menu_id = $menu_array["id"];
        $sql = "SELECT * FROM `".c("table.pages")."` WHERE `deleted` = '0' AND language = '" . l() . "' AND menuid='".$menu_id."' AND visibility = 1 ORDER BY position;";
        $res = db_fetch_all($sql);
	    $tpl = $this->storage->section;
        $tpl['news'] = $res;
        $this->storage->content = $sql;
		if($this->storage->section["template"]=='')
	        $this->storage->content = template('faq', $tpl);
		else
			$this->storage->content = template('custom/'.$this->storage->section["template"], $tpl);
    }

}
