<div class="SmallHeaderInside display_none_mobile g-border-top-grey" style="float: none; margin-bottom: 0">
	<div class="container"> 			
		<div class="CategoryTitle">
			<div class="col-sm-12"> 
				<button class="OrangeButtonRound gsearchButton"><i class="fa fa-bar-chart" aria-hidden="true"></i></button>
				<span class="g-maptext"><?=l("countobject")." ( ".(int)count(@$items)." )"?></span>
			</div>
		</div>
		<div class="HeaderWidthRight">				 
			<div class="row">				
				<a href="/<?=l()?>/map" class="col-sm-2 ColSm222 g-mapicon-box">
					<button class="OrangeButtonRound gsearchButton"><i class="fa fa-map-marker" aria-hidden="true"></i></button>
					<span class="g-maptext"><?=l("mapview")?></span>
				</a>
			</div>				 
		</div> 
	</div>
</div>



 
<div class="CategoriesPage" style="position: relative;">
	<div class="g-shadow-up" style="width: 100%; height: calc(100% + 5px); background-color: transparent; position: absolute; left: 0; top: -5px;"></div>

	<div class="MobileCategoryHead">
			<div class="FormMobile1">
				<div class="row">
					<div class="col-sm-12">
						<div class="HeaderFilterMobile">
							<div class="MobCategoruInput">
								<input type="text" placeholder="რესტორანი" autofocus="">
							</div>
							<button class="ShowMapDiv"><i class="fa fa-map-marker"></i></button>
							<button class="ShowSettings ClickSettings"><i class="fa fa-sliders Slide1"></i><i class="Remove1 fa fa-times"></i></button>
						</div>
					</div>
				</div>
			</div>
	</div>
	
	<div class="CategorySettings HiddenDiv"> 
		<div class="HeaderCat">
			<div class="Title">ფილტრი</div>
			<div class="CloseSeetingInMap ClickInMap"><i class="fa fa-times"></i></div>
		</div>
		<div class="Content">
			<div class="List">
				<div class="Title">დალაგება</div>
				<div class="Item CheckboxStyle1">
					<input type="checkbox" id="Check1"/> 
					<label for="Check1">ახალი</label>
				</div>
				<div class="Item CheckboxStyle1">
					<input type="checkbox" id="Check2"/> 
					<label for="Check2">პოპულარული</label>
				</div>					
			</div>
			<div class="List">
				<div class="Title">კატეგორია</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check3"/> 
					<label for="Check3">ბარი</label>
				</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check4"/> 
					<label for="Check4">რესტორანი</label>
				</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check5"/> 
					<label for="Check5">კაფე</label>
				</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check6"/> 
					<label for="Check6">პიცა</label>
				</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check3"/> 
					<label for="Check3">ბარი</label>
				</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check4"/> 
					<label for="Check4">რესტორანი</label>
				</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check5"/> 
					<label for="Check5">კაფე</label>
				</div>
				<div class="Item CheckboxStyle2">
					<input type="checkbox" id="Check6"/> 
					<label for="Check6">პიცა</label>
				</div>						
			</div>
		</div>
		<div class="CatSettingFooter">
			<button class="ResultsButton ClickSettings ">ნაპოვნია <span>63</span> ობიექტი</button>				
			
		</div>
	</div>
	
	<div class="MobileCategoryMap HiddenDiv2">			
		<div class="MapDiv">
			<div class="CloseMobileMap"><i class="Remove1 fa fa-times"></i></div>
			<button class="ShowSettingsToMap"><i class="fa fa-sliders Slide2"></i><i class="Remove2 fa fa-times"></i></button>
			<div id="MapCategories"></div>
			<script>
				var infowindow = null;
					$(document).ready(function () { initialize();  });
					function initialize() {
						var centerMap = new google.maps.LatLng(41.646909, 41.634751);
						var myOptions = {
							zoom: 12,
							disableDefaultUI: true,
							center: centerMap,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						}
						var map = new google.maps.Map(document.getElementById("MapCategories"), myOptions);
						setMarkers(map, sites);
						infowindow = new google.maps.InfoWindow({
								content: "loading..."
							});
						var bikeLayer = new google.maps.BicyclingLayer();
						bikeLayer.setMap(map);
					}

					var sites = [
							[
								'Mount Evans', 
								41.646909, 41.634751, 
								18, 
								'<div class="ShowContactToMap">'+
									'<img src="img/contact_img.png" class="ContactImageMap"/>'+
									'<div class="TitleContact">17 Memed Abashidze Ave Batumi, Georgia</div>'+
								'</div>'
							]
					];

					function setMarkers(map, markers) {
						for (var i = 0; i < markers.length; i++) {
							var sites = markers[i];
							var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
							var marker = new google.maps.Marker({
								position: siteLatLng,
								icon: 'img/marker_icon.png',
								map: map,
								title: sites[0],
								zIndex: sites[3],
								html: sites[4]
							});
							var contentString = "Some content";

							google.maps.event.addListener(marker, "click", function () {
								//alert(this.html);
								infowindow.setContent(this.html);
								infowindow.open(map, this);
							});
						}
					}

			</script>
		</div>			
		<div class="BottomContent">
			<div class="CategoriesDiv">
				<a href="#" class="Item">
					<div class="Image">
						<img src="https://batumiguide.ge/files/hotels/bleqsi/black-sea-hostel-batumi-10-INFOBATUMI%20%5B800x600%5D%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.jpg" title="ბლექსი">
					</div>
					<div class="Info"> 
						<div class="CompanyLogo">
							<img src="https://batumiguide.ge/files/hotels/bleqsi/black-sea-hostel-batumi-21-INFOBATUMI%20%5B800x600%5D%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.jpg">
						</div>
						<div class="Category">განთავსება</div>
						<div class="Title">ბლექსი</div>
						<li class="Address">გოგებაშვილის ქ 58</li>
						<li class="Time">24/7</li>
					</div>
				</a>
				<a href="#" class="Item">
					<div class="Image">
						<img src="https://batumiguide.ge/files/hotels/bleqsi/black-sea-hostel-batumi-10-INFOBATUMI%20%5B800x600%5D%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.jpg" title="ბლექსი">
					</div>
					<div class="Info"> 
						<div class="CompanyLogo">
							<img src="https://batumiguide.ge/files/hotels/bleqsi/black-sea-hostel-batumi-21-INFOBATUMI%20%5B800x600%5D%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.jpg">
						</div>
						<div class="Category">განთავსება</div>
						<div class="Title">ბლექსი</div>
						<li class="Address">გოგებაშვილის ქ 58</li>
						<li class="Time">24/7</li>
					</div>
				</a>
				<a href="#" class="Item">
					<div class="Image">
						<img src="https://batumiguide.ge/files/hotels/bleqsi/black-sea-hostel-batumi-10-INFOBATUMI%20%5B800x600%5D%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.jpg" title="ბლექსი">
					</div>
					<div class="Info"> 
						<div class="CompanyLogo">
							<img src="https://batumiguide.ge/files/hotels/bleqsi/black-sea-hostel-batumi-21-INFOBATUMI%20%5B800x600%5D%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.jpg">
						</div>
						<div class="Category">განთავსება</div>
						<div class="Title">ბლექსი</div>
						<li class="Address">გოგებაშვილის ქ 58</li>
						<li class="Time">24/7</li>
					</div>
				</a>
			</div>
		</div>			
	</div>
	
	<!-- END CATEGORY FILTER -->  
	<div class="container">
		<!-- <div class="SidebarCategories display_none_mobile">
			<div class="col-sm-12">
				<div class="CategorySidebar"> 
					<?php echo categories_menu($menutype);?>
				</div>
			</div>
		</div> -->
		<div class="CategoriesDiv" style="width: 100%;">
			<div class="row" id="gresults">
            <?php $counter = 0; 
            foreach ($items as $item): $counter++; 
            $link = href($id, array(), l(), $item['id']);
            ?>	
				<div class="col-sm-2">
					<a href="<?php echo $link; ?>" class="Item">
						<div class="Image"><img src="<?php echo ($item['image1']!=NULL) ? $item['image2'] : WEBSITE.'/img/noimage.jpg';?>" title="<?php echo $item['title'] ?>"/></div>
						<div class="Info">
							<!--<div class="RatingCount"><i class="fa fa-star"></i> 4.3</div>-->
							<div class="CompanyLogo"><img src="<?php echo ($item['image1']!=NULL) ? $item['image1'] : WEBSITE.'/img/noimage.jpg';?>"/></div>
							<div class="Category"><?php echo $title; ?></div>
							<div class="Title"><?php echo $item['title'] ?></div>
							<li class="Address"><?php echo $item['address'] ?></li>
							<li class="Time"><?php echo $item['SatSun'] ?></li>
						</div>
						<?php if($item["recommended"]==1):?>
						<div class="g-recommended">Recommended</div>
						<?php endif;?>
					</a>
				</div> 
			<?php endforeach ?>				
			</div>
		</div>
	</div>

	<div class="g-shadow" style="width: 100%; height: 74px; background-color: transparent; position: absolute; left: 0; bottom: 0px;"></div>
</div>

<script type="text/javascript">
	var catData = {
		"id":<?=$id?>,
		"menutype":<?=$menutype?>,
		"title":"<?=$title?>"
	};
</script>
<script type="text/javascript" src="/_website/js/search.js"></script>