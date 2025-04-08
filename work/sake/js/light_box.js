$(document).ready(function(){
	//this is setting light box width and height to whole screen size
	var pageHeight = $(document).height();
	var pageWidth = $(window).width();			
		$('#lightbox').css({
		    'height':pageHeight,
		    'width':pageWidth,
		 });
	
	//this is light box click action	
	 $("a#show-map").click(function(){
	 	$("#lightbox, #lightbox-product").fadeIn(1000);
	 })
	 $("a#close-map").click(function(){
	 	$("#lightbox, #lightbox-product").fadeOut(1000);
	 	})	 	
			 
})
			
			
			
			


