<?php defined('DIR') OR exit; ?>

<div class="DescriptionPage g-border-top-grey" style="padding-top: 45px;">
	<div class="container"> 
		<div class="DescriptionHead2 padding_0">
			<div class="DescriptionContent" style="padding-top: 0; padding-bottom: 0;">
				<div class="container">
					<div class="col-sm-12">
						<div class="DescHeadInfo g-position-static">
							<div class="LogoImage g-logo-mobile">
								<img src="<?php echo $image1;?>" width="100%"/>
							</div>

							<div class="CompanyInfo">
								<div class="col-sm-12">
									<div class="CompanyTitle g-color333">
										<span><?=menu_title($parentNameId)?></span>
										<label><?php echo $title;?></label>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="CompanyInfoList g-color333">
										<?php if($phone!=""):?>
										<li style="display: block;">
											<span><i class="fa fa-phone"></i></span>

											<div class="g-phones">
											<a href="tel:+<?php echo str_replace(array(" ", "+"), "", $phone);?>" style="color:#333333; line-height: 35px;"><?php echo $phone;?></a>

											<?php if($phone2!=""):?>
											<a href="tel:+<?php echo str_replace(array(" ", "+"), "", $phone2);?>" style="color:#333333; line-height: 35px;"><?php echo $phone2;?></a>
											<?php endif; ?>
											</div>
										</li>
										<?php endif; ?>

										

										<?php if($mail!=""):?>
										<li style="max-width: 230px;"><a href="mailto:<?php echo $mail;?>" style="color:#333333; line-height: 35px;"><span><i class="fa fa-envelope"></i></span><?php echo g_cut($mail, 25);?></a></li>
										<?php endif; ?>
										<?php if($website!=""):?>
										<li><span><i class="fa fa-link"></i></span><a href="<?php echo $website;?>" target="_blank" style="color:#333333;"><?php echo $website;?></a></li>
										<?php endif; ?>
									</div>
									
									<div class="CompanySocial">
										<?php if($facebook!=''){?>
											<a href="<?php echo $facebook;?>" target="_blank"><i class="fa fa-facebook"></i></a>
										<?php } ?>    
										<?php if($twitter!=''){?>
											<a href="<?php echo $twitter;?>" target="_blank"><i class="fa fa-twitter"></i></a>
										<?php } ?>    
										<?php if($instagram!=''){?>                                
											<a href="<?php echo $instagram;?>" target="_blank"><i class="fa fa-instagram"></i></a>
										<?php } ?>    
										<?php if($youtube!=''){?>                                
											<a href="<?php echo $youtube;?>" target="_blank"><i class="fa fa-youtube"></i></a>
										<?php } ?>    
										<?php if($linkedin!=''){?>                                
											<a href="<?php echo $linkedin;?>" target="_blank"><i class="fa fa-linkedin"></i></a>
										<?php } ?>    
										<?php if($tripadvisor!=''){?>                                
											<a href="<?php echo $tripadvisor;?>" target="_blank"><i class="fa fa-tripadvisor"></i></a>
										<?php } ?>  
										<?php if($booking!=''){?>                                
											<a href="<?php echo $booking;?>" target="_blank"><i class="fa fa-booking"></i></a>
										<?php } ?>                             
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="container g-margin-top-50 g-mobile-display-none">
					<div class="col-sm-8" style="padding-right:0; padding-left:0">
						<div class="EventTime">
							<div class="TimeInfo"> 
								&nbsp;
							</div>
						</div>

						<div class="PayMethods">
							&nbsp;
						</div>
					</div>
					<div class="col-sm-4 text-right padding_0">
						<div class="SmallMapDescription"> 
							<div class="INfoDiv">
								<div class="Item">
									<div class="Icon"><i class="fa fa-map-marker"></i></div>
									<label><?php echo $address;?></label>
								</div>
								<div class="ShowToMap" data-toggle="modal" data-target="#ProductModalMal">რუკაზე ნახვა</div>
							</div>
							<div class="InsideMapDiv" id="SmallMap"></div>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>


	<div class="DescriptionHeader g-autoand-trans">
			<div class="DescHeader">
				<!-- Set up your HTML -->
				<div class="owl-carousel">
				  		<?php if($image3!=''){?> 
						<a href="<?php echo $image3;?>" class="Item fancybox" rel="group" style="background-image:url('<?php echo $image3;?>')">
						</a>
						<?php } ?>  

						<?php if($image4!=''){ ?>                                 
						<a href="<?php echo $image4;?>" class="Item fancybox" rel="group" style="background-image:url('<?php echo $image4;?>')">
						</a>
						<?php } ?>  

						<?php if($image5!=''){ ?>                                 
						<a href="<?php echo $image5;?>" class="Item fancybox" rel="group" style="background-image:url('<?php echo $image5;?>')">
						</a>
						<?php } ?>  

						<?php if($image6!=''){ ?>                                 
						<a href="<?php echo $image6;?>" class="Item fancybox" rel="group" style="background-image:url('<?php echo $image6;?>')">
						</a>
						<?php } ?>
				</div>

			</div>
		</div>

	

	<div class="container"> 
			<div class="DescriptionContent">
				<div class="col-sm-12"> 
					<div class="DescInfo g-desc-width">
						<div class="Title">აღწერა</div>
						<div class="Text"> 
							<div class="more">
								<?php 
								echo strip_tags($description);
								?>
							</div>
						</div> 
						<div class="DescInfoList">
							<?php if($visa!='0'){ ?>                      
							<li>ვიზა</li>
							<?php } ?>
							<?php if($cash!='0'){ ?>
							<li>ქეში</li>
							<?php } ?>
							<?php if($wifi!='0'){ ?>                            
							<li>wifi</li>
							<?php } ?>
							<?php if($kitchentype1!='0'){ ?>                            
							<li>შერეული</li>
							<?php } ?>
							<?php if($kitchentype2!='0'){ ?>                            
							<li>ქართული</li>
							<?php } ?>
							<?php if($kitchentype3!='0'){ ?>                            
							<li>ევროპული</li>
							<?php } ?>
							<?php if($kitchentype4!='0'){ ?>                            
							<li>აზიური</li>
							<?php } ?>
							<?php if($kitchentype5!='0'){ ?>                            
							<li>აჭარული</li>
							<?php } ?>
							<?php if($kitchentype6!='0'){ ?>                            
							<li>სუში</li>
							<?php } ?>
							<?php if($kitchentype7!='0'){ ?>                            
							<li>გრილი</li>
							<?php } ?>
							<?php if($kitchentype8!='0'){ ?>                            
							<li>კავკასიური</li>
							<?php } ?>
							<?php if($kitchentype9!='0'){ ?>                            
							<li>საავტორო</li>
							<?php } ?>
							<?php if($breakfast!='0'){ ?>                            
							<li>საუზმე</li>
							<?php } ?>
							<?php if($parking!='0'){ ?>                            
							<li>პარკინგი</li>
							<?php } ?>
							<?php if($animals!='0'){ ?>                            
							<li>შინაური ცხოველები დაშვებულია</li>
							<?php } ?>
							<?php if($transfer!='0'){ ?>                            
							<li>ტრანსფერი</li>
							<?php } ?>
							<?php if($pool!='0'){ ?>                            
							<li>ბილიარდი</li>
							<?php } ?>
							<?php if($tennis!='0'){ ?>                            
							<li>ჩოგბურთის კორტები</li>
							<?php } ?>
							<?php if($casino!='0'){ ?>                            
							<li>კაზინო</li>
							<?php } ?>
							<?php if($nightclub!='0'){ ?>                            
							<li>ღამის კლუბი</li>
							<?php } ?>
							<?php if($restaruant!='0'){ ?>                            
							<li>რესტორანი</li>
							<?php } ?>
							<?php if($cafe!='0'){ ?>                            
							<li>კაფე</li>
							<?php } ?>
							<?php if($buffet!='0'){ ?>                            
							<li>ბუფეტი</li>
							<?php } ?>
							<?php if($bar!='0'){ ?>                            
							<li>ბარი</li>
							<?php } ?>
							<?php if($fitnes!='0'){ ?>                            
							<li>ფიტნესი</li>
							<?php } ?>
							<?php if($sauna!='0'){ ?>                            
							<li>საუნა</li>
							<?php } ?>
							<?php if($hamami!='0'){ ?>                            
							<li>ჰამანი</li>
							<?php } ?>
							<?php if($massage!='0'){ ?>                            
							<li>მასაჟი</li>
							<?php } ?>
							<?php if($openpond!='0'){ ?>                            
							<li>ღია აუზი</li>    
							<?php } ?>
							<?php if($closedpond!='0'){ ?>                                                    
							<li>დახურული აუზი</li>
							<?php } ?>
							<?php if($spa!='0'){ ?>                            
							<li>სპა</li>
							<?php } ?>
							<?php if($solarium!='0'){ ?>                            
							<li>სოლარიუმი</li>
							<?php } ?>
							<?php if($pwd!='0'){ ?>                            
							<li>შშმ პირთათვის ადაპტირებული</li>
							<?php } ?>
							<?php if($proom!='0'){ ?>                            
							<li>საპრეზიდენტო ნომერი</li>
							<?php } ?>
							<?php if($live!='0'){ ?>                            
							<li>Live</li>
							<?php } ?>
							<?php if($music!='0'){ ?>                            
							<li>ფონური მუსიკა</li>
							<?php } ?>
							<?php if($pandus!='0'){ ?>                            
							<li>პანდუსი</li>
							<?php } ?>
							<?php if($lounch!='0'){ ?>                            
							<li>ლანჩი</li>
							<?php } ?>
							<?php if($furshet!='0'){ ?>                            
							<li>ფურშეტი</li>
							<?php } ?>
							<?php if($onlysummer!='0'){ ?>                            
							<li>მხოლოდ ზაფხულში</li>
							<?php } ?>
							<?php if($deliveri!='0'){ ?>                            
							<li>მიტანის სერვისი</li>      
							<?php } ?> 
						</div>	
						
						<div style="clear: both;"></div>
						
						<div class="EventTime">
							<div class="TimeInfo"> 
								<i class="fa fa-clock-o"></i>
								<label>
								<?php 
								if (date("H:i:s", time()) < $closetime){
									echo "ღიაა";
									}else{
										echo "დაკეტილია";
										} 
								?>
	                            </label>
								ორშ-პარ: <span><?php echo $MonFri;?></span>
								შაბ-კვ: <span><?php echo $SatSun;?></span>
							</div>
						</div>	

						<div style="clear: both;"></div>	
											
						<div class="DescriptionPaddingLeft">
							<div class="TagsDiv">    
                                <?php
                                    $tags = explode(",", $meta_keys);
                                    foreach($tags as $tag) :
                                ?>
                                    <a href="<?php echo href(4).'?q='.urlencode(trim($tag));?>" class="Tag"><?php echo trim($tag);?></a>
                                <?php
                                    endforeach;
                                ?>
                                </div>
						</div>             
					</div> 
					
					<div class="DescriptionSidebar g-width320-desc"> 
						<?php 
						$g_banners = g_banners();
						$banner28 = array();
						if(isset($g_banners["banner28"])){
							if(!isset($_SESSION["banner28"])){
								$_SESSION["banner28"] = 0;
							}else{
								if($_SESSION["banner28"]>=(count($g_banners["banner28"])-1)){
									$_SESSION["banner28"] = 0;
								}else{
									$_SESSION["banner28"] = $_SESSION["banner28"]+1;	
								}		
							}
							
							$banner28 = $g_banners["banner28"][$_SESSION["banner28"]];
						}
						?>

						<div class="InsidePartnetIcons">
							<?php if(isset($banner28) && $banner28 != ""){ ?>
								<?php if($banner28["htmlstring"]==2){ ?>
									<div class="g-bannerleft g-border-solid-grey">
										<iframe src="<?=$banner28["image1"]?>" frameborder="0" style="width:100%; overflow:hidden;"></iframe>
									</div>
								<?php }else{ ?>			
									<a href="<?=$banner28["link"]?>" class="g-bannerleft g-border-solid-grey" style="background-image: url('<?=$banner28["image1"]?>');" title="<?=htmlentities($banner28["title"])?>" target="_blank"></a>
								<?php } ?>								
							<?php }else{ ?>
							<div class="g-bannerleft">320x400</div>
							<?php } ?>
						</div>
					</div>
				</div>	
			</div> 				
	</div>


</div>









<div class="SimilarObjects g-shadow" style="position: relative;">
	<div class="g-shadow-up" style="width: 100%; height: 100%; background-color: transparent; position: absolute; left: 0; top: 0;"></div>
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
        	<?php echo similar_products($menuid, $id); ?>
		</div>
	</div>
</div>




<div class="modal fade" id="ProductModalMal" tabindex="-1" role="dialog" aria-labelledby="ProductModalMal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">      
			<div class="modal-body">
				<div class="ModalCloseDiv close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></div>
				<a href="https://maps.google.com/?q=<?php echo $x;?>,<?php echo $y;?>" class="g-mapdirection" target="_blank">
					<i class="fa fa-location-arrow"></i>
				</a>
				<div class="InsideMapDiv" id="ModalMap"></div>
				<script type="text/javascript">
				$(document).ready(function () { ModalMap();  });
 					var map;
					var markers = [];
					var lastinfowindow;
					var locIndex;


						if ( !Array.prototype.forEach ) {
						  Array.prototype.forEach = function(fn, scope) {
							for(var i = 0, len = this.length; i < len; ++i) {
							  fn.call(scope, this[i], i, this);
							}
						  }
						} 

						var data = [{
									address:'<?php echo $x;?>, <?php echo $y;?>',
									misamarti:'',
									image:'',
								}
																	
						];



					function ModalMap() {
						var latlng = new google.maps.LatLng(<?php echo $x;?>, <?php echo $y;?>);
						var myOptions = {
							zoom: 16,
							center: latlng,
							disableDefaultUI: true,
							mapTypeId: google.maps.MapTypeId.ROADMAP,

						};
						map = new google.maps.Map(document.getElementById("ModalMap"),myOptions);
						
						geocoder = new google.maps.Geocoder();
						
						data.forEach(function(mapData,idx) {
							geocoder.geocode( { 'address': mapData.address}, function(results, status) {
									if (status == google.maps.GeocoderStatus.OK) {
										var marker = new google.maps.Marker({
											map: map, 
											position: results[0].geometry.location,
											title: mapData.title,											
											icon: '_website/img/map_pin.png'
										});
										var contentHtml = '<div class="CategoriesDiv CatToMap">'+
																'<a href="#" class="Item MapItem1 loc" data-locid="2">'+
																	'<div class="Image"><img src="'+mapData.image+'"></div>'+
																	'<div class="Info">'+
																		'<div class="Category">'+mapData.misamarti+'</div>'+
																	'</div>'+
																'</a>'+
															'</div>';
										var infowindow = new google.maps.InfoWindow({
											content: contentHtml
										});										
										
										google.maps.event.addListener(marker, 'click', function() {											
										  infowindow.open(map,marker);
										  if( infowindow ) {
											   infowindow.close();
										  }
										});
										marker.locid = idx+1;
										marker.infowindow = infowindow;
										markers[markers.length] = marker;								


									} else {
										//alert("Geocode was not successful for the following reason: " + status);
									}
								});

						});
						
						


						$(document).on("click",".loc",function() {
							var thisloc = $(this).data("locid");
							for(var i=0; i<markers.length; i++) {
								if(markers[i].locid == thisloc) {
									//get the latlong
									if(lastinfowindow instanceof google.maps.InfoWindow) lastinfowindow.close();
									map.panTo(markers[i].getPosition());
									markers[i].infowindow.open(map, markers[i]);
									lastinfowindow = markers[i].infowindow;
								}
							}
						});
					 


						 

					}

					</script>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$(document).ready(function(){
		  $(".owl-carousel").owlCarousel({
		    loop:true,
		    items:4,
		    margin:5,
		    responsiveClass:true,
		    responsive:{
		        0:{
		            items:1,
		            nav:true
		        },
		        600:{
		            items:3,
		            nav:true
		        },
		        1000:{
		            items:4,
		            nav:true,
		            loop:true
		        }
		    }
    
		});
	});
</script>

<script>
var infowindow = null;
$(document).ready(function () { initialize();  });
function initialize() {
	var centerMap = new google.maps.LatLng(<?php echo $x;?>, <?php echo $y;?>);
	var myOptions = {
		zoom: 12,
		center: centerMap,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	}
	var map = new google.maps.Map(document.getElementById("SmallMap"), myOptions);
	setMarkers(map, sites);
	infowindow = new google.maps.InfoWindow({
			content: "loading..."
		});
	var bikeLayer = new google.maps.BicyclingLayer();
	bikeLayer.setMap(map);
}

var sites = [									
		[ 
			'', 
			<?php echo $x;?>, <?php echo $y;?>, 
			18, 
			''
		]
];

var styles = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}];

var styledMap = new google.maps.StyledMapType({name: "Styled Map"}); 

function setMarkers(map, markers) {
	map.mapTypes.set('map_style', styledMap);
	map.setMapTypeId('map_style');
	for (var i = 0; i < markers.length; i++) {
		var sites = markers[i];
		var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
		var marker = new google.maps.Marker({
			position: siteLatLng,										
			icon: '_website/img/map_pin.png',
			map: map,
			title: sites[0],
			zIndex: sites[3],
			html: sites[4]
		});
		var contentString = "Some content";

		google.maps.event.addListener(marker, "click", function () {
			infowindow.setContent(this.html);
			infowindow.open(map, this);
		});
	}
}
</script> 


