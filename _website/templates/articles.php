<?php defined('DIR') OR exit; ?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="_website/css/calendar.css">

<div class="SmallHeaderInside g-border-top-grey" style="margin-bottom: 0px;">
	<div class="container"> 			
		<div class="CategoryTitle">
			<div class="col-sm-12"> 
				<div class="Icon g-bgred"><i class="fa <?php echo $image2;?>"></i></div>
				<div class="Title"><?php echo $title;?></div> 
			</div>
		</div>
		<div class="HeaderWidthRight HideMobile">	
			<div class="g-datepicker">
				<input type="text" name="daterange" class="g-picker g-from" placeholder="<?=l("daterangepickersearch")?>" autocomplete="off" value="<?=$dateString?>" />
			</div>
			<div class="text-right">
				<div class="ListDivButton ChangeEventStructure"><i class="fa fa-list-ul"></i></div>
				<div class="ViewDivButton ChangeEventStructure"><i class="fa fa-th"></i></div>
			</div>			 
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

<?php 
$ms = c("month.names"); 
$ds = c("day.shortnames"); 
?>
<script type="text/javascript">
$(function() {
  $('input[name="daterange"]').daterangepicker({
    "autoUpdateInput": false,
  	"startDate": '<?=$startDate?>', /* moment().subtract(7, 'day') moment().add(7, 'day') */
  	"endDate": '<?=$endDate?>', /* moment().subtract(7, 'day') moment().add(7, 'day') */
  	"locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "<?=l("apply")?>",
        "cancelLabel": "<?=l("cancel")?>",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "daysOfWeek": [
            "<?=$ds[7][l()]?>",
            "<?=$ds[1][l()]?>",
            "<?=$ds[2][l()]?>",
            "<?=$ds[3][l()]?>",
            "<?=$ds[4][l()]?>",
            "<?=$ds[5][l()]?>",
            "<?=$ds[6][l()]?>"
        ],
        "monthNames": [
            "<?=$ms[1][l()]?>",
            "<?=$ms[2][l()]?>",
            "<?=$ms[3][l()]?>",
            "<?=$ms[4][l()]?>",
            "<?=$ms[5][l()]?>",
            "<?=$ms[6][l()]?>",
            "<?=$ms[7][l()]?>",
            "<?=$ms[8][l()]?>",
            "<?=$ms[9][l()]?>",
            "<?=$ms[10][l()]?>",
            "<?=$ms[11][l()]?>",
            "<?=$ms[12][l()]?>"
        ],
    	"firstDay": 1
	},
    opens: 'left'
  }, function(start, end, label) {
    // console.log("A new date selection was made: " + start.format('DD-MM-YYY') + ' to ' + end.format('DD-MM-YYY'));
    location.href = "https://batumiguide.ge/<?=l()?>/events/?daterange="+start.format('DD-MM-YYYY')+"@"+end.format('DD-MM-YYYY');
  });
});
</script>