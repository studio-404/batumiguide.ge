<?php defined('DIR') OR exit;
    $parent_slug = db_retrieve('slug', c("table.pages"), 'menutype', $menuid);
?>
    <div id="title" class="fix">
        <div class="icon"><img src="bg/img/edit.png" width="16" height="16" alt="" /></div>
        <div class="name"><?php echo a("catalogs");?>: <?php echo ($route[1] == 'edit') ? $pagetitle.' - '.a('ql.edit') : $pagetitle.' - '.a('add'); ?></div>
    </div>
    <div id="box">
        <div id="part">
<?php $ulink = ($route[1]=="add") ? ahref(array($route[0], 'add', $menuid)) : ahref(array($route[0], 'edit', $id)); ?>
            <div id="news">
                <form id="catform" name="catform" method="post" action="<?php echo $ulink;?>">
                    <div id="general">
                        <input type="hidden" name="tabstop" id="tabstop" value="edit" />
                        <input type="hidden" name="menuid" value="<?php echo $menuid ?>" />
                        <div class="list fix">
                            <div class="icon"><a href="#"><img src="bg/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title"><?php echo a("info");?>: <span class="star">*</span></div>
                        </div>

                        <div class="list2 fix">
                            <div class="name"><?php echo a("title");?>: <span class="star">*</span></div>
                            <input type="text" id="pagetitle" name="title" value="<?php echo ($route[1]=='edit') ? $title : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name"><?php echo a("friendlyURL");?>:</div>
                            <?php echo c('site.url') . l() .'/'. $parent_slug.'/'; ?>
                            <input type="text" id="slug" name="slug" value="<?php echo ($route[1]=='edit') ? $slug : '' ?>" class="inp-ssmall" />
                            <?php echo ($route[1] == 'edit') ? '/'.$id : '';?>
                        </div>

                        <div class="list2 fix dn">
                            <div class="name"><?php echo a("date");?>: <span class="star">*</span></div>
                            <input type="text" name="postdate" value="<?php echo ($route[1]=='edit') ? date('Y-m-d', strtotime($postdate)) : date('Y-m-d'); ?>" id="postdate" class="inp-small" />
                            <div class="name"><?php echo a("time");?>: <span class="star">*</span></div>
                            <input type="text" name="posttime" value="<?php echo ($route[1]=='edit') ? date('H:i:s', strtotime($postdate)) : date('H:i:s'); ?>" id="posttime" class="inp-small" />
                        </div>

                        <div class="list fix">
                            <div class="name">არტიკული</div>
                            <input type="text" name="artikul" value="<?php echo ($route[1]=='edit') ? $artikul : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">მისამართი</div>
                            <input type="text" name="address" value="<?php echo ($route[1]=='edit') ? $address : '' ?>" class="inp"/>
                        </div>

                        <!-- SELECT BOX GIO START -->
                        <div class="list fix">
                            <div class="name">მისამართი List</div>
                            <div class="g-select-wrap" data-opened="false">
                                <input type="hidden" name="addresslists" value="" />
                                <div class="g-select-show"></div>
                                <div class="g-select-list">
                                    <div class="g-select-search">
                                        <input type="text" class="addressSearch" value="" placeholder="ძიება" />
                                    </div>
                                    <div class="select-results">
                                        <?php 
                                        $items = select_addresses();
                                        $ex = explode(",", $addresslists);
                                        foreach($items as $item):
                                            $checked = (in_array($item["id"], $ex)) ? ' checked="checked"' : '';
                                        ?>
                                        <label>
                                            <input type="checkbox" class="g-select-checkboxes" value="<?=$item["id"]?>" data-title="<?=htmlentities($item["title"])?>"<?=$checked?> /> 
                                            <span><?=$item["title"]?></span>
                                        </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">
                                <?php 
                                $texts = array();
                                if($route[1]=='edit' && !empty($addresslists)){
                                    $lists = select_addresses($addresslists);
                                    foreach ($lists as $list) {
                                       $texts[] = $list["title"];
                                    }
                                }
                                ?>
                                gselect_init(
                                    ".g-select-wrap", 
                                    "<?=($route[1]=='edit') ? $addresslists : ''?>", 
                                    "<?=implode($texts, ", ")?>"
                                );
                            </script>
                        </div>
                        <!-- SELECT BOX GIO END -->

                        <div class="list fix">
                            <div class="name">ვებ-გვერდი</div>
                            <input type="text" name="website" value="<?php echo ($route[1]=='edit') ? $website : '' ?>" class="inp"/>
                        </div>
                        <div class="list fix">
                            <div class="name">ელ. ფოსტა</div>
                            <input type="text" name="mail" value="<?php echo ($route[1]=='edit') ? $mail : '' ?>" class="inp"/>
                        </div>
                        <div class="list fix">
                            <div class="name">ტელეფონი</div>
                            <input type="text" name="phone" value="<?php echo ($route[1]=='edit') ? $phone : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">ტელეფონი 2</div>
                            <input type="text" name="phone2" value="<?php echo ($route[1]=='edit') ? $phone2 : '' ?>" class="inp"/>
                        </div>
                                                                                                                        
                        
                        <div class="list fix">
                            <div class="name">Facebook</div>
                            <input type="text" name="facebook" value="<?php echo ($route[1]=='edit') ? $facebook : '' ?>" class="inp"/>
                        </div>
                        <div class="list fix">
                            <div class="name">Instagram</div>
                            <input type="text" name="instagram" value="<?php echo ($route[1]=='edit') ? $instagram : '' ?>" class="inp"/>
                        </div>
                        <div class="list fix">
                            <div class="name">Twitter</div>
                            <input type="text" name="twitter" value="<?php echo ($route[1]=='edit') ? $twitter : '' ?>" class="inp"/>
                        </div>
                        <div class="list fix">
                            <div class="name">TripAdvisor</div>
                            <input type="text" name="tripadvisor" value="<?php echo ($route[1]=='edit') ? $tripadvisor : '' ?>" class="inp"/>
                        </div> 
                        <div class="list fix">
                            <div class="name">LinkedIn</div>
                            <input type="text" name="linkedin" value="<?php echo ($route[1]=='edit') ? $linkedin : '' ?>" class="inp"/>
                        </div>
                        <div class="list fix">
                            <div class="name">YouTube</div>
                            <input type="text" name="youtube" value="<?php echo ($route[1]=='edit') ? $youtube : '' ?>" class="inp"/>
                        </div> 
                        
                        <div class="list fix">
                            <div class="name">Booking</div>
                            <input type="text" name="booking" value="<?php echo ($route[1]=='edit') ? $booking : '' ?>" class="inp"/>
                        </div>
                        <div class="list fix">
                            <div class="name">Airbnb</div>
                            <input type="text" name="airbnb" value="<?php echo ($route[1]=='edit') ? $airbnb : '' ?>" class="inp"/>
                        </div>
                        
                        <div class="list fix">
                            <div class="name">შაბ.-კვი.</div>
                            <input type="text" name="SatSun" value="<?php echo ($route[1]=='edit') ? $SatSun : '' ?>" class="inp"/>
                        </div> 
                        <div class="list fix">
                            <div class="name">ორშ.-სამშ.</div>
                            <input type="text" name="MonFri" value="<?php echo ($route[1]=='edit') ? $MonFri : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name">დახურვის საათი (HH:MM:SS)</div>
                            <input type="text" name="closetime" value="<?php echo ($route[1]=='edit') ? $closetime : '' ?>" class="inp"/>
                        </div>
                        
                        <div class="list fix">
                            <div class="name">Tag</div>
                            <input type="text" name="tag" value="<?php echo ($route[1]=='edit') ? $tag : '' ?>" class="inp"/>
                        </div>
                        
<p class="btn" style="text-align:center; font-weight:bold; line-height:20px; cursor:pointer; font-size:16px; color:#F00;">Uncheck All</p>
<script>
$('.btn').click(function() {

$('input[type=checkbox]').each(function() 
{ 
        this.checked = false; 
}); 
})
</script>
                         <div class="list fix">
                            <div class="icon"><a href="#"><img src="bg/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title">საერთო: <span class="star">*</span></div>
                        </div>                       
                        <div class="list2 fix">
                            <div class="name">Visa: <span class="star" title="Visa">*</span></div>
                            <input type="checkbox" name="visa" class="inp-check"<?php echo (($route[1]=='edit')&&($visa==0)) ? '' : ' checked' ?> />
                            <div class="name">ქეში: <span class="star" title="ქეში">*</span></div>
                            <input type="checkbox" name="cash" class="inp-check"<?php echo (($route[1]=='edit')&&($cash==0)) ? '' : ' checked' ?> />
                            <div class="name">Wi-Fi: <span class="star" title="Wi-Fi">*</span></div>
                            <input type="checkbox" name="wifi" class="inp-check"<?php echo (($route[1]=='edit')&&($wifi==0)) ? '' : ' checked' ?> />
                            <div class="name">პარკინგი: <span class="star" title="პარკინგი">*</span></div>
                            <input type="checkbox" name="parking" class="inp-check"<?php echo (($route[1]=='edit')&&($parking==0)) ? '' : ' checked' ?> />  
                            <div class="name">შშმპ: <span class="star" title="შშმ პირთათვის ადაპტირებული">*</span></div>
                            <input type="checkbox" name="pwd" class="inp-check"<?php echo (($route[1]=='edit')&&($pwd==0)) ? '' : ' checked' ?> />                            
                            <div class="name">შცდ: <span class="star" title="შინაური ცხოველები დაშვებულია">*</span></div>
                            <input type="checkbox" name="animals" class="inp-check"<?php echo (($route[1]=='edit')&&($animals==0)) ? '' : ' checked' ?> />
                            <div class="name">Live: <span class="star" title="Live">*</span></div>
                            <input type="checkbox" name="live" class="inp-check"<?php echo (($route[1]=='edit')&&($live==0)) ? '' : ' checked' ?> />
                            <div class="name">მუსიკა: <span class="star" title="ფონური მუსიკა">*</span></div>
                            <input type="checkbox" name="music" class="inp-check"<?php echo (($route[1]=='edit')&&($music==0)) ? '' : ' checked' ?> />
                            <div class="name">პანდუსი: <span class="star" title="პანდუსი">*</span></div>
                            <input type="checkbox" name="pandus" class="inp-check"<?php echo (($route[1]=='edit')&&($pandus==0)) ? '' : ' checked' ?> />    
                            <div class="name">ზაფხულში: <span class="star" title="ღიაა მხოლოდ ზაფხულში">*</span></div>
                            <input type="checkbox" name="onlysummer" class="inp-check"<?php echo (($route[1]=='edit')&&($onlysummer==0)) ? '' : ' checked' ?> />  
                            
                            <div class="name" style="display:block;">დელივერი: <span class="star" title="მიტანის სერვისი">*</span></div>
                            <input type="checkbox" name="deliveri" class="inp-check"<?php echo (($route[1]=='edit')&&($deliveri==0)) ? '' : ' checked' ?> />
                        </div> 
                        
                         <div class="list fix">
                            <div class="icon"><a href="#"><img src="bg/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title">უკატეგორიო: <span class="star">*</span></div>
                        </div>                       
                        <div class="list2 fix">
                            <div class="name">საუზმე: <span class="star" title="საუზმე">*</span></div>
                            <input type="checkbox" name="breakfast" class="inp-check"<?php echo (($route[1]=='edit')&&($breakfast==0)) ? '' : ' checked' ?> />
                            <div class="name">ტრანსფერი: <span class="star" title="ტრანსფერი">*</span></div>
                            <input type="checkbox" name="transfer" class="inp-check"<?php echo (($route[1]=='edit')&&($transfer==0)) ? '' : ' checked' ?> />
                            <div class="name">ბილიარდი: <span class="star" title="ბილიარდი">*</span></div>
                            <input type="checkbox" name="pool" class="inp-check"<?php echo (($route[1]=='edit')&&($pool==0)) ? '' : ' checked' ?> />
                            <div class="name">კორტები: <span class="star" title="ჩოგბურთის კორტები">*</span></div>
                            <input type="checkbox" name="tennis" class="inp-check"<?php echo (($route[1]=='edit')&&($tennis==0)) ? '' : ' checked' ?> />
                            <div class="name">ღამის კლუბი: <span class="star" title="ღამის კლუბი">*</span></div>
                            <input type="checkbox" name="nightclub" class="inp-check"<?php echo (($route[1]=='edit')&&($nightclub==0)) ? '' : ' checked' ?> />
                            <div class="name">კაზინო: <span class="star" title="კაზინო">*</span></div>
                            <input type="checkbox" name="casino" class="inp-check"<?php echo (($route[1]=='edit')&&($casino==0)) ? '' : ' checked' ?> />
                            <div class="name">კაფე: <span class="star" title="კაფე">*</span></div>
                            <input type="checkbox" name="cafe" class="inp-check"<?php echo (($route[1]=='edit')&&($cafe==0)) ? '' : ' checked' ?> />
                            <div class="name">რესტორანი: <span class="star" title="რესტორანი">*</span></div>
                            <input type="checkbox" name="restaruant" class="inp-check"<?php echo (($route[1]=='edit')&&($restaruant==0)) ? '' : ' checked' ?> />
                            <div class="name">ბუფეტი: <span class="star" title="ბუფეტი">*</span></div>
                            <input type="checkbox" name="buffet" class="inp-check"<?php echo (($route[1]=='edit')&&($buffet==0)) ? '' : ' checked' ?> />
                            <div class="name">ბარი: <span class="star" title="ბარი">*</span></div>
                            <input type="checkbox" name="bar" class="inp-check"<?php echo (($route[1]=='edit')&&($bar==0)) ? '' : ' checked' ?> />
                            <div class="name">საპრეზიდენტო: <span class="star" title="საპრეზიდენტო ნომერი">*</span></div>
                            <input type="checkbox" name="proom" class="inp-check"<?php echo (($route[1]=='edit')&&($proom==0)) ? '' : ' checked' ?> />
                            <div class="name">ლანჩი: <span class="star" title="ლანჩი">*</span></div>
                            <input type="checkbox" name="lounch" class="inp-check"<?php echo (($route[1]=='edit')&&($lounch==0)) ? '' : ' checked' ?> />
                            <div class="name">ფურშეტი: <span class="star" title="ფურშეტი">*</span></div>
                            <input type="checkbox" name="furshet" class="inp-check"<?php echo (($route[1]=='edit')&&($furshet==0)) ? '' : ' checked' ?> />
                        </div>                        


                         <div class="list fix">
                            <div class="icon"><a href="#"><img src="bg/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title">სპა მომსახურება: <span class="star">*</span></div>
                        </div>                       
                        <div class="list2 fix">
                            <div class="name">სოლარიუმი: <span class="star" title="სოლარიუმი">*</span></div>
                            <input type="checkbox" name="solarium" class="inp-check"<?php echo (($route[1]=='edit')&&($solarium==0)) ? '' : ' checked' ?> />                        
                            <div class="name">ფიტნესი: <span class="star" title="ფიტნესი">*</span></div>
                            <input type="checkbox" name="fitnes" class="inp-check"<?php echo (($route[1]=='edit')&&($fitnes==0)) ? '' : ' checked' ?> />                                                
                            <div class="name">საუნა: <span class="star" title="კაზინო">*</span></div>
                            <input type="checkbox" name="sauna" class="inp-check"<?php echo (($route[1]=='edit')&&($sauna==0)) ? '' : ' checked' ?> />
                            <div class="name">ჰამანი: <span class="star" title="ჰამანი">*</span></div>
                            <input type="checkbox" name="hamami" class="inp-check"<?php echo (($route[1]=='edit')&&($hamami==0)) ? '' : ' checked' ?> />
                            <div class="name">მასაჟი: <span class="star" title="მასაჟი">*</span></div>
                            <input type="checkbox" name="massage" class="inp-check"<?php echo (($route[1]=='edit')&&($massage==0)) ? '' : ' checked' ?> />
                            <div class="name">ღ. აუზი: <span class="star" title="ღია აუზი">*</span></div>
                            <input type="checkbox" name="openpond" class="inp-check"<?php echo (($route[1]=='edit')&&($openpond==0)) ? '' : ' checked' ?> />
                            <div class="name">დ. აუზი: <span class="star" title="დახურული აუზი">*</span></div>
                            <input type="checkbox" name="closedpond" class="inp-check"<?php echo (($route[1]=='edit')&&($closedpond==0)) ? '' : ' checked' ?> />
                            <div class="name">სპა: <span class="star" title="სპა">*</span></div>
                            <input type="checkbox" name="spa" class="inp-check"<?php echo (($route[1]=='edit')&&($spa==0)) ? '' : ' checked' ?> /> 
                        </div> 
                        
                         <div class="list fix">
                            <div class="icon"><a href="#"><img src="bg/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title">სამზარეულო: <span class="star">*</span></div>
                        </div>                       
                        <div class="list2 fix">
                            <div class="name">შერეული: <span class="star" title="შერეული">*</span></div>
                            <input type="checkbox" name="kitchentype1" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype1==0)) ? '' : ' checked' ?> />
                            <div class="name">ქართული: <span class="star" title="ქართული">*</span></div>
                            <input type="checkbox" name="kitchentype2" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype2==0)) ? '' : ' checked' ?> />
                            <div class="name">ევროპული: <span class="star" title="ევროპული">*</span></div>
                            <input type="checkbox" name="kitchentype3" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype3==0)) ? '' : ' checked' ?> />
                            <div class="name">აზიური: <span class="star" title="აზიური">*</span></div>
                            <input type="checkbox" name="kitchentype4" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype4==0)) ? '' : ' checked' ?> />                            
                            <div class="name">აჭარული: <span class="star" title="აჭარული">*</span></div>
                            <input type="checkbox" name="kitchentype5" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype5==0)) ? '' : ' checked' ?> />
                            <div class="name">სუში: <span class="star" title="სუში">*</span></div>
                            <input type="checkbox" name="kitchentype6" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype6==0)) ? '' : ' checked' ?> />
                            <div class="name">გრილი: <span class="star" title="გრილი">*</span></div>
                            <input type="checkbox" name="kitchentype7" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype7==0)) ? '' : ' checked' ?> />
                            <div class="name">კავკასიური: <span class="star" title="კავკასიური">*</span></div>
                            <input type="checkbox" name="kitchentype8" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype8==0)) ? '' : ' checked' ?> />
                            <div class="name">საავტორო: <span class="star" title="საავტორო">*</span></div>
                            <input type="checkbox" name="kitchentype9" class="inp-check"<?php echo (($route[1]=='edit')&&($kitchentype9==0)) ? '' : ' checked' ?> />
                        </div>                        


                        <div class="list fix">
                            <div class="icon"><a href="#"><img src="bg/img/minus.png" width="16" height="16" alt="" /></a></div>
                            <div class="title"><?php echo a("general");?>: <span class="star">*</span></div>
                        </div>

                        <div class="list2 fix">
                            <div class="name" style="line-height:16px;"><?php echo a('content') ?>: <span class="star">*</span></div>
                            <div class="left" style="width:900px;">
                                <textarea name="description" class="editor" style="height:200px; margin-top:2px; margin-bottom:2px;"><?php echo ($route[1]=='edit') ? $description : '' ?></textarea>
                            </div>
                        </div>
                        
                        <div class="list2 fix">
                            <div class="name" style="line-height:16px;">დამატებით სერვისები: <span class="star">*</span></div>
                            <div class="left" style="width:900px;">
                                <textarea name="additionalservices" class="editor" style="height:200px; margin-top:2px; margin-bottom:2px;"><?php echo ($route[1]=='edit') ? $additionalservices : '' ?></textarea>
                            </div>
                        </div> 
                        
                        <div class="list2 fix">
                            <div class="name" style="line-height:16px;">ფასები: <span class="star">*</span></div>
                            <div class="left" style="width:900px;">
                                <textarea name="price" class="editor" style="height:200px; margin-top:2px; margin-bottom:2px;"><?php echo ($route[1]=='edit') ? $price : '' ?></textarea>
                            </div>
                        </div>                                               
                        
						<div class="list2 fix">
						<div class="name" style="line-height:16px;">აირჩიეთ რუკაზე კოორდინატები <span class="star">*</span></div>					
	                        
							<div id="canvas"></div>
							
							
							<div class="name">X: <span class="star">*</span></div>					
                            <input type="text" id="latitude" name="x" value="<?php echo ($route[1]=='edit') ? $x : '' ?>" class="inp-small"/>
                            
                            <div class="name">Y: <span class="star">*</span></div>					
                            <input type="text" id="longitude" name="y" value="<?php echo ($route[1]=='edit') ? $y : '' ?>" class="inp-small"/>

                        </div>                  

                        <div class="list2 fix">
                            <div class="name"><?php echo a("description");?></div>
                            <input type="text" name="meta_desc" value="<?php echo ($route[1]=='edit') ? $meta_desc : '' ?>" class="inp"/>
                        </div>

                        <div class="list fix">
                            <div class="name"><?php echo a("keywords");?></div>
                            <input type="text" name="meta_keys" value="<?php echo ($route[1]=='edit') ? $meta_keys : '' ?>" class="inp"/>
                        </div>

                        <div class="list2 fix">
                            <div class="name">ლოგო: <span class="star">*</span></div>
                            <input type="text" id="image1" name="image1" value="<?php echo ($route[1]=='edit') ? $image1 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image1"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list fix">
                            <div class="name">ქოვერი: <span class="star">*</span></div>
                            <input type="text" id="image2" name="image2" value="<?php echo ($route[1]=='edit') ? $image2 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image2"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image3" name="image3" value="<?php echo ($route[1]=='edit') ? $image3 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image3"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image4" name="image4" value="<?php echo ($route[1]=='edit') ? $image4 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image4"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list2 fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image5" name="image5" value="<?php echo ($route[1]=='edit') ? $image5 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image5"><?php echo a('browse') ?></a>
                        </div>
                        
                        <div class="list fix">
                            <div class="name"><?php echo a("image");?>: <span class="star">*</span></div>
                            <input type="text" id="image6" name="image6" value="<?php echo ($route[1]=='edit') ? $image6 : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="image6"><?php echo a('browse') ?></a>
                        </div>                                                 
                                                
                        <div class="list fix">
                            <div class="name">File: <span class="star">*</span></div>
                            <input type="text" id="file" name="file" value="<?php echo ($route[1]=='edit') ? $file : '' ?>" class="inp" style="width:500px;" />
                            <a href="javascript:;" class="popup button br" data-browse="file"><?php echo a('browse') ?></a>
                        </div>

                        <div class="list2 fix">
                            <div class="name"><?php echo a("visibility");?>: <span class="star" title="<?php echo a('tt.visibility');?>">*</span></div>
                            <input type="checkbox" name="visibility" class="inp-check"<?php echo (($route[1]=='edit')&&($visibility==0)) ? '' : ' checked' ?> />
                        </div>

                        <div class="list2 fix">
                            <div class="name">Recommended: <span class="star" title="Recommended">*</span></div>
                            <input type="checkbox" name="recommended" class="inp-check"<?php echo (($route[1]=='edit')&&($recommended==0)) ? '' : ' checked' ?> />
                        </div>

                        <div class="list2 fix">
                            <div class="name">Popular: <span class="star">*</span></div>
                            <input type="checkbox" name="popu" class="inp-check"<?php echo (($route[1]=='edit')&&($popu==0)) ? '' : ' checked' ?> />
                        </div>
                    </div>
                </form>
            </div>
            <div id="bottom" class="fix">
                <a href="javascript:save('edit');" class="button br"><?php echo a("save");?></a>
                <a href="javascript:save('close');" class="button br"><?php echo a("save&close");?></a>
                <a href="<?php echo ahref(array($route[0], 'show', $menuid));?>" class="button br"><?php echo a("cancel");?></a>
            </div>
        </div>
    </div>
<script language="javascript" type="text/javascript">
    $(document).on('click', function(e){
        target = $(e.target);
        if (target.hasClass('popup')) {
            id = target.data('browse');
            $.fancybox({
                width    : 985,
                height   : 600,
                type     : 'iframe',
                href     : '<?php echo JAVASCRIPT ?>/tinymce/filemanager/dialog.php?field_id='+id,
                autoSize : false
            });
            e.preventDefault();
        } else if (target.data('tab')) {
            $(target).toggleClass('selbutton');
            $(target).siblings().removeClass('selbutton');
            $('#'+target.data('tab')).show().siblings().hide();
            $('#tab').val(target.data('tab'));
        }
    });

	function save(action) {
        $("#tabstop").val(action);
		var validate = 1;
		var msg = "";
        if($("#pagetitle, #otitle").val()=='') {
            msg = "<?php echo a('error.title');?>";
            validate = 0;
        }
		if(validate == 1) {
            $('#catform').submit();
		} else {
			alert(msg);
		}
	}

    function nextlang(lang) {
        save(lang);
    }
    function chclick(id, tab) {
        var active = ($('#vis_'+id).val()==0) ? 1 : 0;
        $.post("<?php echo ahref(array($route[0], 'visitem'));?>?visibility=" + active + "&id=" + id + "&tab=" + tab, function(data) {
            if(active==1)
                $('#img_'+id).attr("src","bg/img/buttons/icon_visible.png");
            else
                $('#img_'+id).attr("src","bg/img/buttons/icon_unvisible.png");
            $('#vis_'+id).val(active);
        });
    }

    function del(id, title, tab) {
        if (confirm("<?php echo a('deletequestion'); ?>" + title + "?")) {
            $.post("<?php echo ahref(array($route[0], 'delitem'));?>?id=" + id + "&tab=" + tab, function(){
                $("#div" + id).innerHTML = "";
                $("#div" + id).hide();
            });
        }
    }
</script>

<script language="javascript" type="text/javascript">
// configuration
var myZoom = 15;
var myMarkerIsDraggable = true;
var myCoordsLenght = 6;

var defaultLat = <?php echo $x; ?>;
var defaultLng = <?php echo $y; ?>;

// creates the map
// zooms
// centers the map
// sets the map's type 
var map = new google.maps.Map(document.getElementById('canvas'), {
	zoom: myZoom,
	center: new google.maps.LatLng(defaultLat, defaultLng),
	mapTypeId: google.maps.MapTypeId.ROADMAP

});

// creates a draggable marker to the given coords
var myMarker = new google.maps.Marker({
	position: new google.maps.LatLng(defaultLat, defaultLng),
	draggable: myMarkerIsDraggable
	});

// adds a listener to the marker
// gets the coords when drag event ends
// then updates the input with the new coords
google.maps.event.addListener(myMarker, 'dragend', function(evt){
	document.getElementById('latitude').value = evt.latLng.lat().toFixed(myCoordsLenght);
	document.getElementById('longitude').value = evt.latLng.lng().toFixed(myCoordsLenght);
});

// centers the map on markers coords
map.setCenter(myMarker.position);

// adds the marker on the map
myMarker.setMap(map);

/*
var map;
var micon = new GIcon();
var iasizet='32,32';
var iasize=new Array();
iasize=iasizet.split(',');
iasize[0]=iasize[0]/2;
micon.image = "http://www.podolsk.ru/plugins/p228_googlemap_directory/icons/marker_green.png";
micon.shadow = "http://www.podolsk.ru/plugins/p228_googlemap_directory/icons/shadow/markers.png";
micon.iconSize = new GSize(32,32);
micon.shadowSize = new GSize(59,32);
micon.iconAnchor = new GPoint(iasize[0], iasize[1]);
micon.infoWindowAnchor = new GPoint(iasize[0], 0);

function p228_initialize() { 
if (GBrowserIsCompatible()) {
        map = new GMap2(document.getElementById("canvas"));
        map.setCenter(new GLatLng(55.431375,37.545905), 15);
        map.addControl(new GMapTypeControl());
        map.setMapType(G_NORMAL_MAP);
        map.addControl(new GSmallMapControl());
        
        GEvent.addListener(map, "moveend", function() {
        });
        GEvent.addListener(map, "click", function(overly,point) {
        if(!marker && point) {
        p228_set_vals(point);
        map.clearOverlays();
        var marker = new GMarker(point,{draggable: true,icon:micon});
        GEvent.addListener(marker, "dragend", function() { p228_set_vals(marker.getPoint());});
        map.addOverlay(marker);
        }
        }); 
        p228_set_map();
        }
        
      if(typeof window.onunload == 'function') {
        
        var prevonu= onunload;
        window.onunload = function() {
            prevonu();
            GUnload();  
        }} else{window.onunload = GUnload;}        
        
}


function p228_set_vals(point){
        document.getElementById('lat').value= point.y;
        document.getElementById('lon').value= point.x;
        document.getElementById('lonlat').value= point.y+','+point.x;

}

function p228_set_map(){
       var point=new Array();
       point.y=document.getElementById('lat').value;
       point.x=document.getElementById('lon').value;
       map.setCenter(new GLatLng(point.y,point.x));
       map.clearOverlays();
       var marker = new GMarker(point,{draggable: true,icon:micon});
       GEvent.addListener(marker, "dragend", function() { p228_set_vals(marker.getPoint());});
       map.addOverlay(marker);
       
} 

*/
</script>