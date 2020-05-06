<?php defined('DIR') OR exit; ?>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="_website/css/calendar.css">

<div class="SmallHeaderInside" style="margin-bottom: 0px;">
	<div class="container"> 			
		<div class="CategoryTitle">
			<div class="col-sm-12"> 
				<div class="Icon g-bgred"><i class="fa <?php echo $image2;?>"></i></div>
				<div class="Title"><?php echo $title;?></div> 
			</div>
		</div>
		<div class="HeaderWidthRight HideMobile" style="top: -35px;">	
			<div class="text-right">
				<div class="ListDivButton ChangeEventStructure"><i class="fa fa-list-ul"></i></div>
				<div class="ViewDivButton ChangeEventStructure"><i class="fa fa-th"></i></div>
			</div>			 
			<!-- <div class="row">
				<div class="col-sm-2 ColSm333">
					<select class="BatumiGuideSelectBlue">
						<option>All Categories</option>
					</select>
				</div>
				<div class="col-sm-2 ColSm222">
					<button class="OrangeButtonRound"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
				</div>
			</div>	 -->			 
		</div> 
	</div>
</div>

<div style="clear: both;"></div>

 
<div class="EventPage" style="position: relative;">
	<div class="g-shadow-up" style="width: 100%; height: calc(100%); background-color: transparent; position: absolute; left: 0; top: 0;"></div>
	<div class="container">
		<div class="col-sm-12">
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
	<div class="g-shadow" style="width: 100%; height: 74px; background-color: transparent; position: absolute; left: 0; bottom: 0px;"></div>
</div>




<?php if($page_max>1) : ?>
		        <div class="Pagination">
<?php for($i=1;$i<=$page_max;$i++) : ?>		          
		          <li><a href="<?php echo href($id).'?page='.$i;?>" <?php echo ($page_cur==$i) ? 'class="active"':'';?> ><?php echo $i;?></a></li>
<?php endfor; ?>
		          <div class="clear"></div>
		        </div>            
<?php endif;?>

