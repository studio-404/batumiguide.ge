
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="DescriptionPage">
	<div class="DescriptionHeader" style="background-color: transparent;">
		<div class="DescHeader g-mobile-slick-image">
			<div class="ImageBg" style="background:url('<?php echo $image1;?>');"></div>
			<div class="ImageBg" style="background:url('<?php echo $image2;?>');"></div>
			<div class="ImageBg" style="background:url('<?php echo $image3;?>');"></div>
		</div>
		<div class="container">
			<div class="col-sm-12">
				<div class="DescHeadInfo">
					<div class="CompanyInfo">
						<div class="col-sm-12">
							<div class="CompanyTitle MobileTItle1">
								<label><?php echo $title;?></label>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="CompanyInfoList">
                            <?php if($phone!=''){?>
								<li><span><i class="fa fa-phone"></i></span><?php echo $phone;?></li>
                            <?php } ?> 
                            <?php if($mail!=''){?>   
								<li><span><i class="fa fa-envelope"></i></span><?php echo $mail;?></li>
                            <?php } ?> 
                            <?php if($website!=''){?>                                 
								<li><span><i class="fa fa-link"></i></span><?php echo $website;?></li>
                            <?php } ?> 
                            <?php if($address!=''){?>                                 
								<li><span><i class="fa fa-map-marker"></i></span><?php echo $address;?></li>
                            <?php } ?> 

                            <?php if($facebook!=''){?>                                 
								<li><a href="<?php echo $facebook;?>" target="_blank"><span><i class="fa fa-facebook"></i></span></a></li>
                            <?php } ?>                                 
							</div>
							<!-- <div class="CompanySocial">
                            <?php if($facebook!=''){?>
								<a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            <?php } ?>
							</div> -->
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="DescriptionHead2">
			<div class="container">
				<div class="col-sm-8" style="padding-right:0; padding-left:0">
					<div class="EventTime">
						<div class="Round_l Red">L</div>
						<div class="TimeInfo"> 
							<label>
							<?php 
//							if (date(" H:i:s", time()) > "21:00:00"){
//								echo "ღიაა";
//								}else{
//									echo "დაკეტილია";
//									} 
							?>
                            </label>
<!--							ორშ-პარ: <span><?php // echo $MonFri;?></span>
							შაბ-კვ: <span><?php // echo $SatSun;?></span>-->
						</div>
						<!-- <div class="Round_l Blue">L</div>
						<div class="TimeInfo">
							7 December - 23 December  
						</div> -->
					</div>
				</div>
				<div class="col-sm-4 text-right padding_0">
					<div class="PayMethods">
<!--                    <?php if($visa!=''){?>
						<img src="_website/img/visa.png"/>
						<img src="_website/img/mastercard_1.png"/>
						<img src="_website/img/mastercard_2.png"/>
                    <?php }?>
                    <?php if($cash!=''){?>    
						<img src="_website/img/cash1.png"/>
                    <?php }?>
-->					</div>
				</div>
			</div>
			
		</div>
		<div class="DescriptionContent">
			<div class="col-sm-12"> 
				<div class="DescInfo"> 
					<div class="Title">აღწერა</div>
					<div class="Text"> 
						<div class="more">
							<?php echo $content;?>
						</div>
					</div> 						
					
					<div class="DescGalleryBoxs">
						<div class="Name"></div>
						<div class="GalleryBoxSlider">
							<?php if($image1!=''){?> 
							<a href="<?php echo $image1;?>" class="Item fancybox" rel="group">
								<img src="<?php echo $image1;?>"/>
							</a>
							<?php } ?>  
							<?php if($image2!=''){?>                                 
							<a href="<?php echo $image2;?>" class="Item fancybox" rel="group">
								<img src="<?php echo $image2;?>"/>
							</a>
							<?php } ?>  
							<?php if($image3!=''){?>                                 
							<a href="<?php echo $image3;?>" class="Item fancybox" rel="group">
								<img src="<?php echo $image3;?>"/>
							</a>
							<?php } ?>
						</div>
					</div>  

					<div class="DescriptionPaddingLeft">
						<div class="DescButtons">
							<!--<button class="Button11">მენიუ </button>-->
							<button class="Button11"><?php echo $price;?> ლ</button>
						</div>
					</div>						
<!--					<div class="DescriptionPaddingLeft">
						<div class="DescInfo">
							<div class="TagsDiv">
								<a href="" class="Tag">მანქანა</a>
								<a href="" class="Tag">კაფე</a>
							</div>
						</div>
					</div>
				</div>
				<div class="DescriptionSidebar">
					<div class="InsidePartnetIcons">
						<div class="Image">
							<img src="_website/img/time.jpg"/>
						</div>
						<div class="Image">
							<img src="_website/img/puma.jpg"/>
						</div>

						<div class="Image">
							<img src="_website/img/smarti.jpg"/>
						</div>
						<div class="Image">
							<img src="_website/img/pensa.jpg"/>
						</div>
						<div class="Image">
							<img src="_website/img/dankin.jpg"/>
						</div>
					</div>
				</div>
-->			</div>
			
			
				<div class="DivForCompanyMap ForMapPosition" style="display:none;">
					<div class="InsideMapDiv" id="DescriptionMap"></div>
					<script>
						var infowindow = null;
						$(document).ready(function () { initialize();  });
						function initialize() {
						    var centerMap = new google.maps.LatLng(41.6541616, 41.6496228);
						    var myOptions = {
						        zoom: 14,
						        center: centerMap,
						        mapTypeId: google.maps.MapTypeId.ROADMAP

						    }
						    var map = new google.maps.Map(document.getElementById("DescriptionMap"), myOptions);
						    setMarkers(map, sites);
						    infowindow = new google.maps.InfoWindow({
						            content: "loading..."
						        });
						    var bikeLayer = new google.maps.BicyclingLayer();
							bikeLayer.setMap(map);
						}

						var sites = [
								[   
									'Mount Evans222',
									<?php echo $x;?>, <?php echo $y;?>, 
									18, 
									'<div class="ShowContactToMap">'+
										'<img src="<?php echo $image1;?>" class="ContactImageMap"/>'+
										'<div class="MobileNumber"><?php echo $phone;?></div>'+
										'<div class="TitleContact"><?php echo $address;?></div>'+
									'</div>'
								],
								[ 
									'Mount Evans', 
									41.715554, 44.822207, 
									18, 
									'<div class="ShowContactToMap">'+
										'<img src="_website/img/contact_img.png" class="ContactImageMap"/>'+
										'<div class="MobileNumber">0422 22 72 27</div>'+
										'<div class="TitleContact">17 Memed Abashidze Ave Batumi, Georgia</div>'+
									'</div>'
								]
						];
						
						var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

					   var styledMap = new google.maps.StyledMapType(styles,{name: "Styled Map"}); 
						
						function setMarkers(map, markers) {
							map.mapTypes.set('map_style', styledMap);
						    map.setMapTypeId('map_style');
						    for (var i = 0; i < markers.length; i++) {
						        var sites = markers[i];
						        var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
						        var marker = new google.maps.Marker({
						            position: siteLatLng,
						            icon: '_website/img/marker_icon_2.png',
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
		</div> 
	</div>
</div>






<!--<div class="SimilarObjects">
	<div class="container">
		<div class="col-sm-6">
			<div class="DivTitle">მსგავსი ობიექტები</div>
		</div>
		<div class="col-sm-6 text-right">
			<div class="Dots SimilarDots"></div>
			<div class="ArrowsDiv SimilarArrow">
				<div class="Arrow Right"><i class="fa fa-angle-right"></i></div>
				<div class="Arrow Left"><i class="fa fa-angle-left"></i></div>
			</div>
		</div>
		<div class="CategoriesDiv">
			<div class="col-sm-2">
				<a href="description.html" class="Item">
					<div class="Image"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
							<div class="Category">რესტორანი</div>
						<div class="Title">ინტურისტ ლაუნჯი</div>
						<li class="Address">შ. რუსთაველის ქ 40</li>
						<li class="Time">10:00 - 19:00</li>
					</div>
				</a>
			</div>
			<div class="col-sm-2">
				<a href="description.html" class="Item">
					<div class="Image"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
							<div class="Category">რესტორანი</div>
						<div class="Title">ეიჩ ბი ბათუმი</div>
						<li class="Address">შ. რუსთაველის ქ 40</li>
						<li class="Time">10:00 - 19:00</li>
					</div>
				</a>
			</div>
			<div class="col-sm-2">
				<a href="description.html" class="Item">
					<div class="Image"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
							<div class="Category">რესტორანი</div>
						<div class="Title">ბელისიმო</div>
						<li class="Address">შ. რუსთაველის ქ 40</li>
						<li class="Time">10:00 - 19:00</li>
					</div>
				</a>
			</div>
			<div class="col-sm-2">
				<a href="description.html" class="Item">
					<div class="Image"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
							<div class="Category">რესტორანი</div>
						<div class="Title">საბვეი</div>
						<li class="Address">შ. რუსთაველის ქ 40</li>
						<li class="Time">10:00 - 19:00</li>
					</div>
				</a>
			</div>
			<div class="col-sm-2">
				<a href="description.html" class="Item">
					<div class="Image"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
							<div class="Category">რესტორანი</div>
						<div class="Title">ეიჩ ბი ბათუმი</div>
						<li class="Address">შ. რუსთაველის ქ 40</li>
						<li class="Time">10:00 - 19:00</li>
					</div>
				</a>
			</div>
			<div class="col-sm-2">
				<a href="description.html" class="Item">
					<div class="Image"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
					<div class="Info">
						<div class="CompanyLogo"><img src="http://batumiguide.ge/files/events/Christmas%20Tree/48398850_2130742896986008_4419947099102117888_n.jpg"/></div>
							<div class="Category">რესტორანი</div>
						<div class="Title">ბელისიმო</div>
						<li class="Address">შ. რუსთაველის ქ 40</li>
						<li class="Time">10:00 - 19:00</li>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>
-->



