<?php defined('DIR') OR exit; ?>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="_website/css/calendar.css">

<div class="SmallHeaderInside">
	<div class="container"> 			
		<div class="CategoryTitle">
			<div class="col-sm-12"> 
				<div class="Icon"><i class="fa <?php echo $image2;?>"></i></div>
				<div class="Title"><?php echo $title;?></div> 
			</div>
		</div>
		<div class="HeaderWidthRight">				 
			<div class="row">
				<div class="col-sm-2 ColSm333">
					<select class="BatumiGuideSelectBlue">
						<option>All Categories</option>
					</select>
				</div>
				<div class="col-sm-2 ColSm222">
					<button class="OrangeButtonRound"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
				</div>
			</div>				 
		</div> 
	</div>
</div>



 
<div class="EventPage">
	<div class="container">
		<div class="col-sm-12">
			<div class="EventSidebar"> 
			    <div class="form-group">
			        <div class="row">
			            <div class="col-md-8">
			                <div id="datepicker"></div>
			                <script type="text/javascript">
							$( function() {
								var dates = [
									<?php 
									foreach($postdates as $date):
									$timestamp = strtotime($date["postdate"]);
									$timestamp2 = strtotime($date["expiredate"]);
									$_date = date('d/M/Y', $timestamp);
									$_date_n = date('Y-m-d', $timestamp);

									$_date2 = date('d/M/Y', $timestamp2);
									$_date_n2 = date('Y-m-d', $timestamp2);
									
									?>
									["<?=$_date?>",<?=json_encode($date["title"])?>,"/<?=l()?>/<?=$slug?>?date=<?=$_date_n?>"], 
									["<?=$_date2?>",<?=json_encode($date["title"])?>,"/<?=l()?>/<?=$slug?>?date=<?=$_date_n2?>"], 
									<?php endforeach; ?>
								];
								
								function highlightDays(date) {
									var n = date.toString();
									var d = n[8]+n[9];
							    	var m = n[4]+n[5]+n[6];
							    	var y = n[11]+n[12]+n[13]+n[14];
							    	var fullDateh = d+"/"+m+"/"+y;
								    for (var i = 0; i < dates.length; i++) {
								        if (fullDateh == dates[i][0]) { 
								            return [true, 'ID=' + dates[i][2], dates[i][1]]; 
								        }
								    }
								    console.log(fullDateh);
								    if(fullDateh=="<?=date("d/M/Y")?>"){
								    	return [true];
								    }
								    return [false];
								}

								function SelectedDay(date, inst) {
									window.setTimeout(function () {
									var classes = inst.dpDiv.find('.ui-datepicker-current-day a').parent().attr("class").split(" ");

								       for (var i in classes) {
								            if (classes[i].substring(0, 3) == "ID=") { location.href = classes[i].substring(3) }
								       }

								    }, 0);

								}
								<?php
								$formaT = date("m/d/Y");
								if(isset($_GET["date"])){									
									if(preg_match_all(
										'/(\d{4})-(\d{2})-(\d{2})/', 
										$_GET["date"], 
										$matches, 
										PREG_OFFSET_CAPTURE)
									){
										$formaT = sprintf("%s/%s/%s", $matches[2][0][0], $matches[3][0][0], $matches[1][0][0]);
									}
								}
								$month_names = c('month.names');
								$day_names = c('day.names');
								// print_r($month_names, true);
								?>
								$( "#datepicker" ).datepicker({
									monthNames: [
										'<?=$month_names[1][l()]?>', 
										'<?=$month_names[2][l()]?>', 
										'<?=$month_names[3][l()]?>', 
										'<?=$month_names[4][l()]?>', 
										'<?=$month_names[5][l()]?>', 
										'<?=$month_names[6][l()]?>',
										'<?=$month_names[7][l()]?>',
										'<?=$month_names[8][l()]?>',
										'<?=$month_names[9][l()]?>',
										'<?=$month_names[10][l()]?>',
										'<?=$month_names[11][l()]?>',
										'<?=$month_names[12][l()]?>'
									],
            						monthNamesShort: [
            							'<?=mb_substr($month_names[1][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[2][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[3][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[4][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[5][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[6][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[7][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[8][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[9][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[10][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[11][l()], 0 , 3, "utf-8")?>', 
            							'<?=mb_substr($month_names[12][l()], 0 , 3, "utf-8")?>', 
            						],
								    dayNames: [
								    	'<?=$day_names[1][l()]?>', 
										'<?=$day_names[2][l()]?>', 
										'<?=$day_names[3][l()]?>', 
										'<?=$day_names[4][l()]?>', 
										'<?=$day_names[5][l()]?>', 
										'<?=$day_names[6][l()]?>',
										'<?=$day_names[7][l()]?>'
								    ],
								    dayNamesShort: [
								    	'<?=mb_substr($day_names[7][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[1][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[2][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[3][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[4][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[5][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[6][l()], 0 , 2, "utf-8")?>'
								    ],
								    dayNamesMin: [
								    	'<?=mb_substr($day_names[7][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[1][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[2][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[3][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[4][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[5][l()], 0 , 2, "utf-8")?>', 
            							'<?=mb_substr($day_names[6][l()], 0 , 2, "utf-8")?>'
								    ],
									firstDay: 1, 
									beforeShowDay: highlightDays, 
									onSelect: SelectedDay 
								}).datepicker("setDate", new Date("<?=$formaT?>"));
							});
			                </script>
			            </div>
			        </div>
			    </div>  
			</div>
			<div class="EventDiv">
				<div class="EventHeader">
					<div class="col-sm-6 padding_0">
						<div class="EventTitme">10.10.2018</div>
					</div>
					<div class="col-sm-6 padding_0 text-right HideMobile">
						<div class="ListDivButton ChangeEventStructure"><i class="fa fa-list-ul"></i></div>
						<div class="ViewDivButton ChangeEventStructure"><i class="fa fa-th"></i></div>
					</div>
				</div>
				<!-- ListStyleEvent -->
				<div class="AllEventsDiv ListStyleEvent">
					<div class="row">
					<?php foreach($articles as $a) : ?>	                
						<div class="col-sm-12 g-mobile-padding-right15">
							<a href="<?php echo href($a["id"]);?>" class="EventItem">
								<div class="Image"><img src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>"/></div>
								<div class="Info">
									<div class="EventTitle">ჰელუინი</div>
									<div class="CompLogo">
										<img src="<?php echo ($a["image1"]!="") ? $a["image1"]:"_website/img/article1.jpg";?>"/>
									</div>
									<div class="Title">
										<?php echo $a["title"];?>
									</div>
									<div class="Date"><i class="fa fa-clock-o"></i> <?php echo $a["postdate"];?></div>
									<div class="Address"><?php echo $a["address"];?></div>
								</div> 
								<div class="LinkButton"><i class="fa fa-angle-right"></i></div>
							</a> 
						</div>
					<?php endforeach; ?>
					</div>	

				</div>
			</div>
		</div>
	</div>
</div>




<?php if($page_max>1) : ?>
		        <div class="Pagination">
<?php for($i=1;$i<=$page_max;$i++) : ?>		          
		          <li><a href="<?php echo href($id).'?page='.$i;?>" <?php echo ($page_cur==$i) ? 'class="active"':'';?> ><?php echo $i;?></a></li>
<?php endfor; ?>
		          <div class="clear"></div>
		        </div>            
<?php endif;?>

