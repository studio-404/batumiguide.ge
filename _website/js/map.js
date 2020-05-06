/*
** GIO JS :)
*/

var getDistanceFromLatLonInKm = (lat1,lon1,lat2,lon2) => {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1); 
  var a = 
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * 
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ; 
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
  var d = R * c; // Distance in km
  return d;
};

var deg2rad = (deg) => {
  return deg * (Math.PI/180)
};

var loadMapData = (postFile, requestQuery) => {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			if(obj.Success.Code==1 && obj.Success.data.length){
				// console.log(obj.Success.data.length);	
				initialize(obj.Success.data); 
			}
			
		}
	};
	xhttp.open("POST", postFile, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestQuery);
};

var searchNeaby = (postFile, requestQuery) => {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			if(obj.Success.Code==1 && obj.Success.data.length){
				// console.log(obj.Success.data.length);	
				//searchMap
				// getDistanceFromLatLonInKm(userLat, userLong);
			}
			
		}
	};
	xhttp.open("POST", postFile, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestQuery);
};

var initialize = (data) => {
	var myOptions = {
		center: new google.maps.LatLng(data[0].x, data[0].y),
		zoom: 13,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("CategoriesMap"), myOptions);
    

    var markers = [];
	
	var i; 		
	for (i = 0; i < data.length; i++)
	{  
		var latlngset = new google.maps.LatLng(data[i].x, data[i].y);
		var marker = new google.maps.Marker({  
      		map: map, 
      		title: data[i].title, 
      		position: latlngset, 
      		icon: '_website/img/map_pin.png'
    	});

    	marker.id = "m"+i;

    	markers.push(marker);


    
    	map.setCenter(marker.getPosition()); 
		var infowindow = new google.maps.InfoWindow();

		var content = '<div class="CategoriesDiv CatToMap">'+
		'<a href="'+data[i].url+'" class="Item MapItem1 loc" data-locid="'+marker.id+'">'+
		'<div class="Image"><img src="'+data[i].image+'"></div>'+
		'<div class="Info">'+
		'<div class="CompanyLogo"><img src="'+data[i].CompanyLogo+'"></div>'+
		'<div class="Category">'+data[i].type+'</div>'+
		'<div class="Title">'+data[i].title+'</div>'+
		'</div>'+
		'</a>'+
		'</div>';

		google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
        	return function() {
           		infowindow.setContent(content);
           		infowindow.open(map,marker);
        	};
		})(marker,content,infowindow)); 

		var sideHtml = '<div class="col-sm-6 loc" data-locid="'+marker.id+'">'+
		'<a href="'+data[i].url+'" class="Item">'+
		'<div class="Image"><img src="'+data[i].image+'"></div>'+
		'<div class="Info">'+
		'<div class="CompanyLogo"><img src="'+data[i].CompanyLogo+'"></div>'+
		'<div class="Category">'+data[i].type+'</div>'+
		'<div class="Title">'+data[i].title+'</div>'+
		'<li class="Address">'+data[i].misamarti+'</li>'+
		'<li class="Time">'+data[i].Time+'</li>'+
		'</div>'+
		'</a>'+
		'</div>';
		$("#locs").append(sideHtml); 

	}
	


};

var arrayChuck = (perChunk, data) => {
	var out = data.reduce((all,one,i) => {
	   const ch = Math.floor(i/perChunk); 
	   all[ch] = [].concat((all[ch]||[]),one); 
	   return all
	}, []);

	return out;
};




(function(){
	var input_lang = document.getElementById("input_lang");
	var ajaxUrl = "/"+input_lang.value+"/?ajax=true";

	var category = searchData.c;
	var address = searchData.a;
	var queryText = searchData.q;
	
	loadMapData(ajaxUrl, "type=searchMap&c="+category+"&a="+address+"&q="+queryText);


	document.getElementsByClassName("neabySearch")[0].addEventListener("click", (e)=>{
		if (navigator.geolocation) {
		    navigator.geolocation.getCurrentPosition((position) => {
		    	let userLat = position.coords.latitude;
		    	let userLong = position.coords.longitude;

		    	searchNeaby(ajaxUrl, "type=searchMap&c="+category+"&a="+address+"&q="+queryText+"&lat="+userLat+"&long="+userLong);
		    	// getDistanceFromLatLonInKm(userLat, userLong);
		    	// console.log("Latitude: " + userLat + "\nLongitude: " + userLong);
		    });
		} else { 
		    alert("Geolocation is not supported by this browser.");
		}
	});
	
	document.getElementsByClassName("gcategorySelect")[0].addEventListener("change", (e) => {
		let input_lang = document.getElementById("input_lang").value;
		let category = document.getElementsByClassName("gcategorySelect")[1].value;
		let queryText = searchData.q;


		let newUrl = "/"+input_lang+"/map?c="+category+"&a=&q="+queryText;
		location.href = newUrl;
	});

	document.getElementsByClassName("map_addresses_search")[0].addEventListener("change", (e) => {
		let input_lang = document.getElementById("input_lang").value;
		let address = document.getElementsByClassName("map_addresses_search")[1].value;
		
		var category = searchData.c;
		var queryText = searchData.q;


		let newUrl = "/"+input_lang+"/map?c="+category+"&a="+address+"&q="+queryText;
		location.href = newUrl;
	});
})();