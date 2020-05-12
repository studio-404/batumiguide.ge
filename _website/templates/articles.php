<?php defined('DIR') OR exit; ?>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="_website/css/calendar.css">

<div class="SmallHeaderInside g-border-top-grey" style="margin-bottom: 0px;">
	<div class="container"> 			
		<div class="CategoryTitle">
			<div class="col-sm-12"> 
				<div class="Icon g-bgred"><i class="fa <?php echo $image2;?>"></i></div>
				<div class="Title"><?php echo $title;?> ( <?=$item_count?> )</div> 

        <div class="g-datepicker g-desktop-hide g-datepicker-mobile">
          <input type="text" name="daterangemobile" class="g-picker g-from" placeholder="<?=l("daterangepickersearch")?>" autocomplete="off" value="<?=$dateString?>" readonly="readonly" />
        </div>
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
				<div class="row" id="gresults">
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
                <input type="hidden" name="catalogtitle" id="catalogtitle" value="" />
                <input type="hidden" name="loading" id="loading" value="false" />
                <input type="hidden" name="loaded" id="loaded" value="<?=c('articles.per_page')?>" />
                <input type="hidden" name="daterange" id="daterange" value="<?=(isset($_GET["daterange"])) ? htmlentities($_GET["daterange"]) : ""?>" />
                <div class="g-gifloader" style="margin: 20px 0; width: 100%; clear: both; text-align: center;">
                    <img src="img/loader2.gif" alt="" width="100" align="center" style="margin: 0 auto; width:100px;" alt="" />
                </div>
			</div>
		</div>
	</div>
	<div class="g-shadow" style="width: 100%; height: 74px; background-color: transparent; position: absolute; left: 0; bottom: 0px;"></div>
</div>


<?php 
$ms = c("month.names"); 
$ds = c("day.shortnames"); 
?>
<script type="text/javascript">
$(function() {
  $('input[name="daterange"], input[name="daterangemobile"]').daterangepicker({
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
    opens: 'left',
    beforeShowDay: function(date) {
        return [true, 'css-class-to-highlight'+date, 'tooltipText'];
    },
  }, function(start, end, label) {
    location.href = "https://batumiguide.ge/<?=l()?>/events/?daterange="+start.format('DD-MM-YYYY')+"@"+end.format('DD-MM-YYYY');
  });
});
</script>
<script type="text/javascript">
var perpage = parseInt("<?=(int)c('articles.per_page')?>");
var total = parseInt("<?=(int)$item_count?>");

$(window).scroll(function() {
    if($(window).scrollTop() + $(window).height() > $(document).height() - 100) {
        callAjax('articles', perpage, total);
    }
}); 
</script>