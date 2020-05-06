/*
** GIO JS :)
*/
var ajaxRequest = (resultDivId, postFile, requestQuery) => {
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var obj = JSON.parse(this.responseText);
			document.getElementById(resultDivId).innerHTML = obj.Success.html;
		}
	};
	xhttp.open("POST", postFile, true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send(requestQuery);
};

(function(){

	/* Home page START */
	var gsearch = document.getElementById("g-search-input");
	if(typeof gsearch !== "undefined" && gsearch!=null){
		gsearch.addEventListener("keyup", (e)=>{
			var key = e.target.value;
			var input_lang = document.getElementById("input_lang");

			document.getElementById("g-search-result").innerHTML = "<div style=\"width:calc(100% - 50px); float:left;\"><img src=\"/_website/img/loading_icon.gif\" align=\"center\" width=\"25\" height=\"25\" style=\"margin:25px auto; width:25px; display:block;\" alt=\"loader\" /></div>";

			if(typeof key !== "undefined" && key.length >= 1 && typeof input_lang !== "undefined"){
				let url = "/"+input_lang.value+"/?ajax=true";
				ajaxRequest("g-search-result", url, "type=search&key="+key);
			}
		});
	}


	var categoryDropDown = document.getElementsByClassName("CategoriesDropDown")[0];
	if(typeof categoryDropDown !== "undefined"){
		var category_s = document.getElementsByClassName("category_s")[0];
		categoryDropDown.addEventListener("click", (e) => {
			let catid = e.target.parentNode.getAttribute("data-id");

			if(typeof category_s !== "undefined"){
				category_s.value = catid;
				var event = new Event('change');
				category_s.dispatchEvent(event);
			}
		});

		if(typeof category_s !== "undefined"){
			category_s.addEventListener("change", (e) => {
				document.getElementById("result_box").style.display = "none";
				var input_lang = document.getElementById("input_lang");
				var catid = parseInt(e.target.value);
				var val = document.getElementsByClassName("searchKey_s")[0].value;

				if(val.length > 1){
					let url = "/"+input_lang.value+"/?ajax=true";
					ajaxRequest("result_box", url, "type=search&key="+val+"&catid="+catid);
					document.getElementById("result_box").style.display = "block";
				}

			});
		}
	}


	var searchKey_box = document.getElementsByClassName("searchKey_box")[0];
	if(typeof searchKey_box !== "undefined"){
		searchKey_box.style.position = "relative";
	}

	var searchKey_s = document.getElementsByClassName("searchKey_s")[0];
	var input_lang = document.getElementById("input_lang");
	if(typeof searchKey_s !== "undefined"){
		searchKey_s.addEventListener("keyup", (e) => {
			document.getElementById("result_box").style.display = "none";
			let val = e.target.value;
			let catid = parseInt(document.getElementsByClassName("category_s")[0].value);
			
			if(val.length > 1){
				let url = "/"+input_lang.value+"/?ajax=true";
				ajaxRequest("result_box", url, "type=search&key="+val+"&catid="+catid);
				document.getElementById("result_box").style.display = "block";
			}			
		});
	}
	/* Home page END */


	/* Catalog page START */
	if(typeof document.getElementsByClassName("gsearchButton")[0] !== "undefined"){
		document.getElementsByClassName("gsearchButton")[0].addEventListener("click", (e) => {
			console.log("go to map");
			let input_lang = document.getElementById("input_lang");
			let cat = "";
			let adr = "";
			let key = "";
			if(typeof catData !== "undefined"){//category page
				cat = parseInt(catData.menutype);
				adr = parseInt(document.getElementsByClassName("addresses_search")[1].value);
				key = document.getElementsByClassName("search_key")[0].value;
			}else{//home page
				cat = parseInt(document.getElementsByClassName("category_s")[0].value);
				adr = "";
				key = document.getElementsByClassName("searchKey_s")[0].value;
			}

			location.href = "/"+input_lang.value+"/map?c="+cat+"&a="+adr+"&q="+key;
		});
	}

	if(typeof document.getElementsByClassName("addresses_search")[0] !== "undefined"){
		document.getElementsByClassName("addresses_search")[0].addEventListener("change", function(e){
			console.log(e.target);
			let addr = document.getElementsByClassName("addresses_search")[1].value;
			let key = document.getElementsByClassName("search_key")[0].value;
			let input_lang = document.getElementById("input_lang");
			
			let url = window.location.href.split('?')[0];
			let pageUrl = url + "?a="+addr+"&q="+key;
			window.history.pushState('', '', pageUrl);
			let ajaxUrl = "/"+input_lang.value+"/?ajax=true";
			ajaxRequest("gresults", ajaxUrl, "type=searchCatalog&key="+key+"&addr="+addr+"&id="+catData.id+"&title="+catData.title+"&menutype="+catData.menutype);		
		});
	}

	if(typeof document.getElementsByClassName("search_key")[0] !== "undefined"){
		document.getElementsByClassName("search_key")[0].addEventListener("keydown", function(){ 
			let addr = document.getElementsByClassName("addresses_search")[1].value;
			let key = document.getElementsByClassName("search_key")[0].value;
			let input_lang = document.getElementById("input_lang");

			let url = window.location.href.split('?')[0];
			var pageUrl = url + "?a="+addr+"&q="+key;
			window.history.pushState('', '', pageUrl);

			if(key.length>1){
				let ajaxUrl = "/"+input_lang.value+"/?ajax=true";
				ajaxRequest("gresults", ajaxUrl, "type=searchCatalog&key="+key+"&addr="+addr+"&id="+catData.id+"&title="+catData.title+"&menutype="+catData.menutype);
			}
		});
	}
	/* Catalog page END */
})();