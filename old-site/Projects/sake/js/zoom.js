$(function() {
		
			var offsetX = -210;
			var offsetY =20;
			
			$('a.product_zoom').hover(function(evt){
			
			
				//mouse on
				var href = $(this).attr('href');
				$('<img id="largeImage" src="' + href + '" alt="big image" />')
				.css('top', evt.pageY + offsetY)
				.css('left', evt.pageX + offsetX)
				.appendTo('body');
				
			
			}, function(){
				//mouse off
				$('#largeImage').remove();
			
			});
			
			$('a.product_zoom').mousemove(function(evt){
				$("#largeImage")
				.css('top', evt.pageY + offsetY)
				.css('left', evt.pageX + offsetX);
			});
			
			$('a.product_zoom').click(function(evt){
				return false;
			});
		
		});