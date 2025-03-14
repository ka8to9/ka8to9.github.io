/*
kayano tokuzato
winter 2012
Senior Project: Sake
slide_show.js
*/


$(document).ready(function(){
	$('#triangle_right').click(function() {
	
		var whereWeAre = $("#production_inside").position().left;		
		var count = (whereWeAre - 700) / -700 + 1;
		
		if(count <= $('#breadcrumb li').length){
			$('#breadcrumb li').removeClass('active');
			$('#breadcrumb li[rel=' + (count) + ']').addClass('active');
		}
		
		$("#production_inside").animate({
			left: "-=700px",	
		});
			if ($("#production_inside").css("left") == "-4200px"){
				$("#production_inside").stop();
			}
	});
	  
	$('#triangle_left').click(function() {
	
		var whereWeAre = $("#production_inside").position().left;		
		var count = (whereWeAre + 700) / -700 + 1;
		
		if(count > 0){
			$('#breadcrumb li').removeClass('active');
			$('#breadcrumb li[rel=' + (count) + ']').addClass('active');
		}		
		$('#production_inside').animate({
			left: '+=700px',
		});
			if ($("#production_inside").css("left") == "0px"){
					$("#production_inside").stop();		
				}
	  });
});


/***********************************************/
/*********** breadcrumb section ****************/

			
			
			$(document).ready(function() {

				$('#breadcrumb li').bind('click',function(e){
					var count = $(this).attr('rel');
					var pxToMove = (count -1) * 700;
					$('#breadcrumb li').removeClass('active');
					$('#breadcrumb li[rel=' + count + ']').addClass('active');
	
					$('#production_inside').animate({
						left:  '-' + pxToMove + 'px',
					});			
				});
			});