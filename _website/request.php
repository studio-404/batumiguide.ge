<?php 
    defined('DIR') OR exit;
    $out = array(
        "Error" => array(
            "Code"=>1, 
            "Text"=>l("error"),
            "Details"=>""
        ),
        "Success"=>array(
            "Code"=>0, 
            "Text"=>"",
            "Details"=>""
        )
    ); 


    if(isset($_POST["type"]))
    {
        $type = $_POST["type"];

        switch ($type) {
            case 'searchMap':
                $sql = "";
                if(
                    !isset($_POST["c"]) && 
                    !isset($_POST["a"]) && 
                    !isset($_POST["q"]) 
                ){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("error");                   
                    $successText = "";
                }else{
                    $key = str_replace(
                        array(
                            "'",
                            '"',
                            "!",
                            "@",
                            "#",
                            "$",
                            "%",
                            "`",
                            "^",
                            "&",
                            "*",
                            "(",
                            ")",
                            "+",
                            "-"
                        ),
                        '',
                        $_POST["q"]
                    );

                    $filter = "";
                    if(!empty($key)){
                        $filter .= " AND (`catalogs`.`title` LIKE '%".$key."%' OR `catalogs`.`content` LIKE '%".$key."%') ";
                    }

                    if(isset($_POST["a"]) && is_numeric($_POST["a"]) && !empty($_POST["a"])){
                        $filter .= " AND (FIND_IN_SET('".(int)$_POST["a"]."', `catalogs`.`addresslists`)) ";
                    }

                    $menuid = "3,4,8,9,7,10,11,19,17";
                    if(isset($_POST["c"]) && is_numeric($_POST["c"]) && !empty($_POST["c"]) && ((int)$_POST["c"])>0){
                        $menuid = (int)$_POST["c"];
                    }

                    $filter .= " AND `catalogs`.`menuid` IN(".$menuid.") ";


                    $sql = "SELECT 
                    `catalogs`.`menuid`,
                    `catalogs`.`id`, 
                    `catalogs`.`image1`, 
                    `catalogs`.`image2`, 
                    `catalogs`.`title`, 
                    `catalogs`.`address`, 
                    `catalogs`.`SatSun`, 
                    `catalogs`.`x`, 
                    `catalogs`.`y`,
                    (SELECT `pages`.`title` FROM `pages` WHERE `pages`.`menutype` = `catalogs`.`menuid` AND `pages`.`language`='".l()."' AND `pages`.`deleted`=0 AND `pages`.`visibility`=1) AS pageTitle, 
                    (SELECT `pages`.`id` FROM `pages` WHERE `pages`.`menutype` = `catalogs`.`menuid` AND `pages`.`language`='".l()."' AND `pages`.`deleted`=0 AND `pages`.`visibility`=1) AS pageId
                    FROM 
                    `catalogs` 
                    WHERE 
                    `catalogs`.`visibility`=1 AND 
                    `catalogs`.`deleted`=0 AND 
                    `catalogs`.`language` = '" . l() . "'".$filter." ORDER BY `catalogs`.id DESC LIMIT 2500";
                    $res = db_fetch_all($sql);

                    // $id = (int)$_POST["c"];
                    $data = array();
                    $x=0;
                    // echo count($res);
                    foreach ($res as $item): 
                        $link = href($item["pageId"], array(), l(), $item['id']);
                        $src = ($item['image1']!=NULL) ? $item['image2'] : WEBSITE.'/img/noimage.jpg';
                        $src2 = ($item['image1']!=NULL) ? $item['image1'] : WEBSITE.'/img/noimage.jpg';

                        $data[$x]["title"] = $item['title'];
                        $data[$x]["address"] = $item['x'].", ".$item['y'];
                        $data[$x]["x"] = $item['x'];
                        $data[$x]["y"] = $item['y'];
                        $data[$x]["misamarti"] = $item['address'];
                        $data[$x]["image"] = $src;
                        $data[$x]["CompanyLogo"] = $src2;
                        $data[$x]["url"] = $link;
                        $data[$x]["Time"] = $item["SatSun"];
                        $data[$x]["type"] = array($item["pageTitle"]);
                        $x++;
                    endforeach;
                    $errorCode = 0;
                    $successCode = 1;
                    $errorText = "";                   
                    $successText = l("welldone");

                }

                $out = array(
                    "Error" => array(
                        "Code"=>$errorCode, 
                        "Text"=>$errorText,
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>$successCode, 
                        "Text"=>$successText,
                        "data"=>$data,
                        "Details"=>""
                    )
                );
                break;
            case 'searchCatalog':
                $html = "";
                if(
                    (!isset($_POST["addr"]) && !is_numeric($_POST["addr"]))
                ){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("error");                   
                    $successText = "";
                }else{
                    $key = str_replace(
                        array(
                            "'",
                            '"',
                            "!",
                            "@",
                            "#",
                            "$",
                            "%",
                            "`",
                            "^",
                            "&",
                            "*",
                            "(",
                            ")",
                            "+",
                            "-"
                        ),
                        '',
                        $_POST["key"]
                    );

                    $menuidIN = "3,4,8,9,7,10,11,19,17";
                    $addr = "";
                    $filter = " ";

                    if(isset($_POST["menutype"])){
                        $catid = (int)$_POST["menutype"];
                        $menuidIN = $catid;
                    }

                    $filter .= " AND menuid IN(".$menuidIN.") ";

                    
                    if(isset($_POST["addr"]) && is_numeric($_POST["addr"])){
                        $addr = (int)$_POST["addr"];

                        $filter .= ' AND FIND_IN_SET("'.(int)$addr.'", `addresslists`) ';
                    }

                    if(isset($key) && !empty($key) && preg_match('/^[_A-z0-9ა-ჰ]*$/', $key)){
                        $filter .= ' AND (title LIKE "%'.$key.'%" OR content LIKE "%'.$key.'%") ';
                    }


                    $sql = "SELECT `id`, `image1`, `image2`, `title`, `address`, `SatSun` FROM `".c("table.catalogs")."` WHERE `visibility`=1 AND `deleted`=0 AND `language` = '" . l() . "'".$filter." ORDER BY id DESC LIMIT 2500";
                    // echo ; 
                    $res = db_fetch_all($sql);
                    $id = (int)$_POST["id"];
                    $title = "";
                    if(preg_match('/^[_A-z0-9ა-ჰ]*$/', $_POST["title"])){
                        $title = $_POST["title"];
                    }

                    foreach ($res as $item): 
                        $link = href($id, array(), l(), $item['id']);
                        $src = ($item['image1']!=NULL) ? $item['image2'] : WEBSITE.'/img/noimage.jpg';
                        $src2 = ($item['image1']!=NULL) ? $item['image1'] : WEBSITE.'/img/noimage.jpg';

                        $html .= "<div class=\"col-sm-2\">";
                        $html .= "<a href=\"".$link."\" class=\"Item\">";
                        $html .= "<div class=\"Image\"><img src=\"".$src."\" title=\"".$item['title']."\"/></div>";
                        $html .= "<div class=\"Info\">";
                            // <!--<div class="RatingCount"><i class="fa fa-star"></i> 4.3</div>-->
                        $html .= "<div class=\"CompanyLogo\"><img src=\"".$src2."\"/></div>";
                        $html .= "<div class=\"Category\">".$title."</div>";
                        $html .= "<div class=\"Title\">".$item['title']."</div>";
                        $html .= "<li class=\"Address\">".$item['address']."</li>";
                        $html .= "<li class=\"Time\">".$item['SatSun']."</li>";
                        $html .= "</div>";
                        $html .= "</a>";
                        $html .= "</div>";
                    endforeach;

                    // $html = "<pre>".print_r($res, true)."</pre><br />";
                    // $html .= $sql;
                }

                $out = array(
                    "Error" => array(
                        "Code"=>0, 
                        "Text"=>"",
                        "Details"=>""
                    ),
                    "Success"=>array(
                        "Code"=>1, 
                        "Text"=>"",
                        "html"=>$html,
                        "Details"=>""
                    )
                );
                break;
            case 'search':
            $html = "";
                if(
                    strlen($_POST["key"]) < 1
                ){
                    $errorCode = 1;
                    $successCode = 0;
                    $errorText = l("error");                   
                    $successText = "";
                }else{
                    $key = str_replace(
                        array(
                            "'",
                            '"',
                            "!",
                            "@",
                            "#",
                            "$",
                            "%",
                            "`",
                            "^",
                            "&",
                            "*",
                            "(",
                            ")",
                            "+",
                            "-"
                        ),
                        '-',
                        $_POST["key"]
                    );

                    $menuidIN = "3,4,8,9,7,10,11,19,17";
                    if(isset($_POST["catid"]) && (int)$_POST["catid"] > 0){
                        $catid = (int)$_POST["catid"];
                        $menuidIN = $catid;
                    }

                    

                    $sql = 'SELECT   
                    `catalogs`.`id` AS page_id,  
                    `catalogs`.`title` AS page_title,  
                    `catalogs`.`image1` AS page_image, 
                    `catalogs`.`menuid` AS page_menuid,
                    `catalogs`.`address` AS page_address,
                    `catalogs`.`slug` COLLATE utf8_general_ci AS page_slug,
                    (
                        SELECT 
                        `pages`.`slug`
                        FROM 
                        `pages`
                        WHERE 
                        `pages`.`menutype`=page_menuid AND 
                        `pages`.`deleted`=0 AND 
                        `pages`.`visibility`=1 AND 
                        `pages`.`language`="'.l().'"
                    ) AS page_preslug,
                    (
                        SELECT   
                        COUNT(`catalogs`.`id`)
                        FROM 
                        `catalogs` 
                        WHERE 
                        (
                            `catalogs`.`title` LIKE "%'.$key.'%" OR 
                            `catalogs`.`title`="'.$key.'" OR 
                            MATCH(`catalogs`.`title`) AGAINST("'.$key.'")
                        ) AND 
                        `catalogs`.`menuid` IN('.$menuidIN.') AND 
                        `catalogs`.`language`="'.l().'" AND 
                        `catalogs`.`deleted`=0 AND 
                        `catalogs`.`visibility`=1
                    ) AS page_catalog_count
                    FROM 
                    `catalogs` 
                    WHERE 
                    (
                        `catalogs`.`title` LIKE "%'.$key.'%" OR 
                        `catalogs`.`title`="'.$key.'" OR 
                        MATCH(`catalogs`.`title`) AGAINST("'.$key.'")
                    ) AND 
                    `catalogs`.`menuid` IN('.$menuidIN.') AND 
                    `catalogs`.`language`="'.l().'" AND 
                    `catalogs`.`deleted`=0 AND 
                    `catalogs`.`visibility`=1
                    ';
                    $fetch = db_fetch_all($sql);
                    foreach ($fetch as $v):
                        $html .= sprintf(
                            "<a href=\"/%s/%s/%s/%d\" class=\"Item\">",
                            l(),
                            $v["page_preslug"],
                            $v["page_slug"],
                            $v["page_id"] 
                        );
                        
                        $html .= sprintf(
                            "<div class=\"Image\"><img src=\"%s\"/></div>",
                            $v["page_image"]
                        );
                        $html .= "<div class=\"Info\">";
                        $html .= sprintf(
                            "<label>%s</label>",
                            $v["page_title"]
                        );
                        $html .= sprintf(
                            "<span>%s</span>",
                            $v["page_address"]
                        );
                        $html .= "</div>";
                        $html .= "</a>";
                    endforeach;
                    

                }


            $out = array(
                "Error" => array(
                    "Code"=>0, 
                    "Text"=>"",
                    "Details"=>""
                ),
                "Success"=>array(
                    "Code"=>1, 
                    "Text"=>"",
                    "html"=>$html,
                    "Details"=>""
                )
            );
            break;
        }
    }

    echo json_encode($out);
    exit();