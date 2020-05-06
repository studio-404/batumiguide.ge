 var Config = {
    website: "http://batumiguide.ge/"
};

$(window).scroll(function() {    
    //var scroll = $(window).scrollTop();
   // if (scroll >= 110) {
   //     $("body").addClass("FixedSmallHeader");
  //  } else {
  //      $("body").removeClass("FixedSmallHeader");
  //  }
});


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

	//$( function() {
		//$( "#datepicker" ).datepicker();
	//});



	// $('.PriceBoxSlider').slick({
	// 	infinite: true,
	// 	dots: true,
	//   	slidesToShow: 7,
	//   	slidesToScroll: 7,
	//   	arrows: false,
	//   	speed: 1000,
	//   	responsive: [
	// 	    {
	// 	      breakpoint: 480,
	// 	      settings: {
	// 	        slidesToShow: 2,
	// 	        slidesToScroll: 2
	// 	      }
	// 	    }
	// 	    // You can unslick at a given breakpoint now by adding:
	// 	    // settings: "unslick"
	// 	    // instead of a settings object
	// 	  ]
	// });

  

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
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
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
		    // You can unslick at a given breakpoint now by adding:
		    // settings: "unslick"
		    // instead of a settings object
		  ]
	});
		

	// if (document.documentElement.clientWidth < 992) { 
	// 	$('.row').slick({
	// 		infinite: true,
	// 		dots: true,
	// 	  	slidesToShow: 1,
	// 	  	slidesToScroll: 1,
	// 	  	arrows: true,
	// 	  	speed: 1000,  		 
	// 		responsive: [
	// 		    {
	// 		      breakpoint: 480,
	// 		      settings: {
	// 		        slidesToShow: 2,
	// 		        slidesToScroll: 2
	// 		      }
	// 		    }
	// 		    // You can unslick at a given breakpoint now by adding:
	// 		    // settings: "unslick"
	// 		    // instead of a settings object
	// 		  ]
	// 	});
	// }


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
			    // You can unslick at a given breakpoint now by adding:
			    // settings: "unslick"
			    // instead of a settings object
			  ]
		});
	} 
	
	
	// $('iframe').load( function() {
	// 	$('iframe').contents().find("head")
		  
	// });
	

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