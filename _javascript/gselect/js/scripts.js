var gselect_init = (container, defaultValues, defaultTexts) => {
	var wrap = document.querySelector(container);

	wrap.querySelector("input[type='hidden']").value = defaultValues;
	wrap.querySelector(".g-select-show").innerHTML = defaultTexts;

	var labels = wrap.getElementsByTagName("label");
	
	wrap.querySelector(".addressSearch").addEventListener("keyup", (e)=>{
		var key = e.target.value;		
		for(var i = 0; i < labels.length; i++){
			if(key.length > 1){
				let text = labels[i].getElementsByTagName("span")[0].innerHTML;
				let value = labels[i].getElementsByTagName("input")[0].value;
				
				if(text.search(key)>0){
					console.log(text.search(key));
					labels[i].style.display = "block";
				}else{
					labels[i].style.display = "none";
				}
			}else{
				labels[i].style.display = "block";
			}
		}
	});

	for(var i = 0; i < labels.length; i++){
		labels[i].addEventListener("click", (e) => {
			var checkboxes = wrap.getElementsByClassName("g-select-checkboxes");
			var ids = [];
			var texts = [];

			for(var y = 0; y < checkboxes.length; y++){
				if(checkboxes[y].checked){
					ids.push(checkboxes[y].value);
					texts.push(checkboxes[y].getAttribute("data-title"));
				}
			}

			wrap.querySelector("input[type='hidden']").value = ids.join(",");
			wrap.querySelector(".g-select-show").innerHTML = texts.join(", ");
		});

		
	}

	wrap.addEventListener("click", (e)=>{
		if(e.target.classList[0]=="g-select-show"){
			var opened = wrap.getAttribute("data-opened");
			if(opened=="true"){
				wrap.getElementsByClassName("g-select-list")[0].style.display = "none";
				wrap.getElementsByClassName("g-select-show")[0].classList.remove("flipAfter");
				wrap.setAttribute("data-opened", "false");
			}else{
				wrap.getElementsByClassName("g-select-list")[0].style.display = "block";
				wrap.getElementsByClassName("g-select-show")[0].classList.add("flipAfter");
				wrap.setAttribute("data-opened", "true");	
			}
		}		
	});
};

(function(){

})();