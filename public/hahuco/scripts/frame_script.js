$(document).ready(function(){
	
	$("img.lazy").lazyload();
	
	/***********************************************************************************/
	
	if($("#owl-demo").length){
		$("#owl-demo").owlCarousel({ 
			navigation: true,
			pagination: false,
			autoPlay: true,
			lazyLoad : true,
			singleItem:true,			
			transitionStyle : "fade"
		});
	}
	
	if($("#owl-demo2").length){
		$("#owl-demo2").owlCarousel({ 
			navigation: false,
			pagination: false,
			autoPlay: 2000,
			items : 10,
			itemsDesktop : [1000,10], //5 items between 1000px and 901px
			itemsDesktopSmall : [900,5], // betweem 900px and 601px
			itemsTablet: [600,2], //2 items between 600 and 0
			itemsMobile : [480,2], // itemsMobile disabled - inherit from itemsTablet option
			lazyLoad : true
		});
	}
	
	/***********************************************************************************/
	
	$(".icon_menu_mobile").click(function(e) {
		$val=$(".icon_menu_mobile").attr("val");
		if($val==0){
			$(".menu_mobile").attr("style","visibility: visible;");
			$(this).attr("val",1);
			$('body').attr("class","ad_body");
		}
	});
	$(".close_menu_mobile").click(function() {
		$(".menu_mobile").removeAttr("style");
		$(".icon_menu_mobile").attr("val",0);
		$('body').removeAttr("class");		
	});
	
});