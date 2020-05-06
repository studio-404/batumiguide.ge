<div class="SmallHeaderInside ContactHeader">
	<div class="container">
		<div class="col-sm-12">
			 <div class="ContactTitle">კონტაქტი</diV>
		</div>
	</div>
</div>



 
<div class="ContactPage">
	<div class="ContactInfoDiv">
		<div class="InfoListContact">
			<div class="col-sm-4">
				<span><i class="fa fa-envelope"></i></span> <label><a href="#" class="DIslpayA222"><?php echo s('mail');?></a></label>
			</div>
			<div class="col-sm-4">
				<span><i class="fa fa-phone"></i></span> <label><?php echo s('phone');?></label>
			</div>
			<div class="col-sm-4">
				<span><i class="fa fa-map-marker"></i></span> <label><?php echo s('address');?></label>
			</div>
			<div class="col-sm-4"></div>
			<div class="col-sm-8">
				<a href="<?php echo s('fb');?>" target="_blank" class="DIslpayA"><span class="Blue"><i class="fa fa-facebook"></i></span> <label><?php echo s('fb');?></label></a>
			</div>
		</div>
	</div>
	<div id="contact_map"></div>
	<script>

		var infowindow = null;
			$(document).ready(function () { initialize();  });
			function initialize() {
				var centerMap = new google.maps.LatLng(41.645460, 41.627484);
				var myOptions = {
					zoom: 16,
					center: centerMap,
					mapTypeId: google.maps.MapTypeId.ROADMAP,
					styles: [
						{
							"featureType": "water",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#e9e9e9"
								},
								{
									"lightness": 17
								}
							]
						},
						{
							"featureType": "landscape",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#f5f5f5"
								},
								{
									"lightness": 20
								}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "geometry.fill",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 17
								}
							]
						},
						{
							"featureType": "road.highway",
							"elementType": "geometry.stroke",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 29
								},
								{
									"weight": 0.2
								}
							]
						},
						{
							"featureType": "road.arterial",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 18
								}
							]
						},
						{
							"featureType": "road.local",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#ffffff"
								},
								{
									"lightness": 16
								}
							]
						},
						{
							"featureType": "poi",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#f5f5f5"
								},
								{
									"lightness": 21
								}
							]
						},
						{
							"featureType": "poi.park",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#dedede"
								},
								{
									"lightness": 21
								}
							]
						},
						{
							"elementType": "labels.text.stroke",
							"stylers": [
								{
									"visibility": "on"
								},
								{
									"color": "#ffffff"
								},
								{
									"lightness": 16
								}
							]
						},
						{
							"elementType": "labels.text.fill",
							"stylers": [
								{
									"saturation": 36
								},
								{
									"color": "#333333"
								},
								{
									"lightness": 40
								}
							]
						},
						{
							"elementType": "labels.icon",
							"stylers": [
								{
									"visibility": "off"
								}
							]
						},
						{
							"featureType": "transit",
							"elementType": "geometry",
							"stylers": [
								{
									"color": "#f2f2f2"
								},
								{
									"lightness": 19
								}
							]
						},
						{
							"featureType": "administrative",
							"elementType": "geometry.fill",
							"stylers": [
								{
									"color": "#fefefe"
								},
								{
									"lightness": 20
								}
							]
						},
						{
							"featureType": "administrative",
							"elementType": "geometry.stroke",
							"stylers": [
								{
									"color": "#fefefe"
								},
								{
									"lightness": 17
								},
								{
									"weight": 1.2
								}
							]
						}
					]
				}
				var map = new google.maps.Map(document.getElementById("contact_map"), myOptions);
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
						41.645460, 41.627484, 
						18, 
					
					]
			];

			function setMarkers(map, markers) {
				for (var i = 0; i < markers.length; i++) {
					var sites = markers[i];
					var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
					var marker = new google.maps.Marker({
						position: siteLatLng,
						icon: '_website/img/marker_icon.png',
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
 