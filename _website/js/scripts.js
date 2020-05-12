 var Config = {
    website: "http://batumiguide.ge/"
};


$(document).ready(function(){	
	$('.MobileHeaderInput').click(function(e){
        $('body').addClass('BodyOverflowHidden');
        $('.MobileSearch_1').removeClass('DisplayNone');
    });
	$('.HideSearch_1').click(function(e){
        $('body').removeClass('BodyOverflowHidden');
        $('.MobileSearch_1').addClass('DisplayNone');
    });
	
	
	$('.ClickSettings').click(function(e){
        $('.CategorySettings').toggleClass('HiddenDiv');
        $('.ShowSettings').toggleClass('active');
        $('.CategorySettings.ShowInMap').toggleClass('ShowInMap');
    });
	
	
	$('.ShowMapDiv').click(function(e){
        $('.MobileCategoryMap').toggleClass('HiddenDiv2');
    });
	$('.CloseMobileMap').click(function(e){
        $('.MobileCategoryMap').toggleClass('HiddenDiv2');
    });
	$('.ShowSettingsToMap').click(function(e){
        $('.CategorySettings').toggleClass('HiddenDiv');
        $('.CategorySettings').toggleClass('ShowInMap');
    });
	$('.ClickInMap').click(function(e){
        $('.CategorySettings').toggleClass('ShowInMap');
     });
	
});







$(document).ready(function(){
	$('.SimilarObjects .CategoriesDiv').slick({
		infinite: true,
		dots: false,
	  	slidesToShow: 4,
	  	slidesToScroll: 4,
	  	arrows: true,
	  	speed: 1000,  
	  	prevArrow: $('.SimilarArrow .Left'),
        nextArrow: $('.SimilarArrow .Right'),		 
		responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
				dots: true,
				arrows: false,
				appendDots: $('.SimilarDots'),	
		      }
		    }
		]
	});
	
	$('.PopularObjects .CategoriesDiv').slick({
		infinite: true,
		dots: false,
	  	slidesToShow: 4,
	  	slidesToScroll: 4,
	  	arrows: true,
	  	speed: 1000,  
	  	prevArrow: $('.PopularArrow .Left'),
        nextArrow: $('.PopularArrow .Right'),		 
		responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
				dots: true,
				arrows: false,
				appendDots: $('.SimilarDots'),	
		      }
		    }
		]
	});

	$('.g-SimilarObjects .CategoriesDiv').slick({
		infinite: true,
		dots: false,
	  	slidesToShow: 3,
	  	slidesToScroll: 3,
	  	arrows: true,
	  	speed: 1000,  
	  	prevArrow: $('.g-simarrows .Left'),
        nextArrow: $('.g-simarrows .Right'),		 
		responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
				dots: true,
				arrows: false,
				appendDots: $('.SimilarDots'),	
		      }
		    }
		]
	});
	
	$('.HomeLogosSlide .LogoSlide').slick({
		infinite: true,
		dots: false,
	  	slidesToShow: 6,
	  	slidesToScroll: 5,
	  	arrows: true,
	  	speed: 1000,  
	  	prevArrow: $('.HomeLogosArrow .Left'),
        nextArrow: $('.HomeLogosArrow .Right'),		 
		responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 1,
				dots: false,
				arrows: false,
				//appendDots: $('.SimilarDots'),	
		      }
		    }
		]
	}); 


	$('.LeftCategoriesList .CategoriesDiv').slimScroll({
		height: '100%',
		railVisible: false,
		alwaysVisible: false,
		wheelStep: 30, 
		allowPageScroll : false,
		size: '5px',
		color: '#f93936',
		distance: '0px',  
		railOpacity: 1,
	});

	if (document.documentElement.clientWidth > 992) { 
		$('.EventsList').slick({
			infinite: true,
			dots: true,
		  	slidesToShow: 3,
		  	slidesToScroll: 3,
		  	arrows: true,
		  	vertical: true,
		  	speed: 1000,  
		  	appendDots: $('.EventSlideControl .Dots'),		
		  	prevArrow: $('.EventSlideControl .PrevArrow'), 
	        nextArrow: $('.EventSlideControl .NextArrow'),	
		});
	}	 

	if (document.documentElement.clientWidth < 992) { 
		$('.DescHeader').slick({
			infinite: true,
			dots: true,
		  	slidesToShow: 1,
		  	slidesToScroll: 1,
		  	arrows: false,
		  	vertical: true,
		  	speed: 1000,   
		});
	}	

}); 





/***********************************************************/


$(document).ready(function(){
    $(".fancybox").fancybox({
         
    });
}); 
   

$(document).ready(function() {

	$('#LoginModal').modal()  

	$CategoryDrop = $('.CategoriesDropDown');
	$CategoryDrop.find("li").click(function(){
		$caret = ' <span class="caret pull-right"></span>';
		$val = $(this).html();
	$(".CategoriesSelect").html($val+$caret)
});
	
 
	$.fn.raty.defaults.path = 'img'; 
    $('#DescriptionRating').raty();
 


	$('.HamburgMenu').click(function(e){
        $('.HeaderMenu').toggleClass('ShowHeaderMenu');
        $('body').toggleClass('MenuBackground');
    });


	if (document.documentElement.clientWidth > 992) { 
		$('.BatumiGuideSelect').selectpicker();
		$('.BatumiGuideSelectBlue').selectpicker();
	}

	$('.ChangeEventStructure').click(function(e){
        $('.AllEventsDiv').toggleClass('ListStyleEvent');
    });


	$(function () {
		$('[data-toggle="tooltip"]').tooltip({
			'container':'body'
		})
	})
  

	$('.CategoriesDivSlideClass .row').slick({
		infinite: true,
		dots: true,
	  	slidesToShow: 5,
	  	slidesToScroll: 5,
	  	arrows: true,
	  	speed: 1000,  		 
		responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1,
				dots: false,
				arrows: false,
		      }
		    }
		  ]
	});
	
	
	
	$('.HomeEventSlider').slick({
		infinite: true,
		dots: true,
	  	slidesToShow: 1,
	  	slidesToScroll: 1,
	  	arrows: true,
	  	speed: 1000,
	  	responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
				arrows: false,
				dots: false,
		      }
		    }
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
	});
	
	
	$('.HomeSmallPartners .row').slick({
		infinite: true,
		dots: false,
	  	slidesToShow: 3,
	  	slidesToScroll: 1,
	  	arrows: false,
	  	speed: 1000,
	  	responsive: [
		    {
		      breakpoint: 480,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1,
		      }
		    }
		  ]
	});


	if (document.documentElement.clientWidth < 992) { 
		$('.HomePartnetIcons .ContainerPadding').slick({
			infinite: true,
			dots: true,
		  	slidesToShow: 1,
		  	slidesToScroll: 1,
		  	arrows: true,
		  	speed: 1000,  		 
			responsive: [
			    {
			      breakpoint: 480,
			      settings: {
			        slidesToShow: 3,
			        slidesToScroll:3
			      }
			    }
			  ]
		});
	} 
	

});



$(document).ready(function() { 
    var showChar = 300;   
    var ellipsestext = "...";
    var moretext = "Show";
    var lesstext = "Hide";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '</span><span class="morecontent"><span>' + h + '</span><a href="" class="morelink less">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(lesstext);
        } else {
            $(this).addClass("less");
            $(this).html(moretext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
    
});

function ajax(ajaxUrl, queryParams = ""){
	var lang = document.getElementById("input_lang").value;

	var xhttp = new XMLHttpRequest();

	xhttp.open("POST", "/"+lang+"/?ajax=true"+queryParams, true);
	xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded; charset=UTF-8');
	xhttp.send(ajaxUrl);

	return xhttp;
}


function callAjax(page, perpage, total){
	var loading = $("#loading").val();
	var storageid = (typeof $("#storageid").val() !== "undefined") ? $("#storageid").val() : 0;
	var loaded = (typeof $("#loaded").val() !== "undefined") ? $("#loaded").val() : 0;
	var daterange = (typeof $("#daterange").val() !== "undefined") ? $("#daterange").val() : 0;
	var catalogtitle = (typeof $("#catalogtitle").val() !== "undefined") ? $("#catalogtitle").val() : 0;
	$("#loading").val("true");
	$(".g-gifloader").show();

	if(loading=="false"){
		var xhttp = ajax("type=loadmoreitems&page="+page+"&storageid="+storageid+"&perpage="+perpage+"&loaded="+loaded+"&total="+total+"&daterange="+daterange+"&catalogtitle="+catalogtitle);
		xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				var responseText = JSON.parse(this.responseText);

				if(responseText.Error.Code==1){
					console.log(responseText.Error.Text);
					$("#loading").val("false");
				}else{
					if(responseText.Success.outHtml!=""){
						$("#loaded").val(responseText.Success.loadedafter);
						$("#gresults").append(responseText.Success.outHtml);
						$("#loading").val("false");
					}
				}

				$(".g-gifloader").hide();
			}
		};
	}
}