<html>
	<head>
		<meta charset="UTF-8">
		<title>Kayano's Beer App</title>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="http://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
		
<!-- 		<link rel="stylesheet" type="text/css" media="screen" href=" test.php"> -->
		<link rel="stylesheet" type="text/css"href="css/style.css?cache=65765765">
		<link rel="stylesheet" type="text/css"href="css/reset.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0" />

		
		<script type="text/javascript">
			var beerlist = null;
			var currentBeer = null;
			
			$(document).ready(function(){
			
				showPages();
				
				
				// detect when the page hash changes		
				$(window).bind('hashchange', function() {
				
					showPages(window.location.hash);
					
				});
				
				//hide #beer_list (padding part of empty black background)
				$('#beer_list').each(function(){
					$(this).css('display','none');
				});
				
				//this is keyup event that trigger the search
				$('input').keyup(function(e){
					var mySearch = $(this).val();
					getStuff(mySearch);
					
					//show #beer_list (padding part of empty black background)
					$('#beer_list').show();
					//show #beer_list (padding part of empty black background)
				});
			});
			
			//this is javascript function for above.
			function showPages(pagename){
				if(pagename == ""){
					$('.page').hide();	
					$('#container_inside1').show();	
				} else if(pagename == "#details"){
					$('.page').hide();
					$('#container_inside2').show();		
				} else if(pagename == "#saved"){
					$('.page').hide();
					$('#container_inside3').show();		
				} else {
					$('.page').hide();	
					$('#container_inside1').show();	
				}
			}
			
			// saving to localStorage
			function putIntoStorage(toSave){
				
				//grab localstorage items
				var tmp = localStorage.getItem('savelist');
				
				// check if there are any items, if not make a blank array (as a string)
				if(!tmp){
					tmp = "[]";
				} 
				
				// converted localstorage string to object
				tmp = JSON.parse(tmp);
				
				// for each tmp, look through and check the toSave vs each beer id, if its the same, to tmp.push(toSave), else do nothing
/*
				var len = toSave.length,
				for (i=0; i<len)
				http://stackoverflow.com/questions/840781/easiest-way-to-find-duplicate-values-in-a-javascript-array
*/
/*
				
				if tmp.toSave == beer.id
				{
					delete
				}
				
*/
				
				
				// put our save thing into our array
				tmp.push(toSave);
				
				// put our array back in the localstorage, making it a string first
 				localStorage.setItem('savelist',JSON.stringify(tmp));
			}
			
			
			
			
			// get items out of storage, and return an array of objects
			function getStorage(){
			
				return JSON.parse(localStorage.getItem('savelist'));
			}
			
			// remove an item from the storage with the items index (id)
			function deleteFromStorage(thisId){
				
				// get all items from storage
				var savedBeers = getStorage();
				
				console.log(thisId);
				
				// remove the item we want
				savedBeers.splice(thisId,1);
				
				// delete current storage
				localStorage.removeItem('savelist');

				for(var i = 0; i < savedBeers.length; i++){
					console.log(savedBeers[i]);
					putIntoStorage(savedBeers[i]);
				}
				// put the edited list back
				
			}
			
			
			//ajax call for beer API data
			function getStuff(mySearch){
				
				
				$.ajax({
					url: 'php/get.php?search=' + mySearch,
					dataType: 'json',
					success: function(result){
						beerlist = result.data;	
						
						$("#beer_list").empty();
						
						//empty here				

						$.each(result.data,function(index){
							//console.log(result.data);
							$("#searchResultTemp").tmpl(
								{
									thisItemsIndex: index, 
									thisItemsData: beerlist[index]
								}
							).appendTo("#beer_list");
							
						});	
					    
					}
				});
			}
			
			$('#save').live('click',function(){
				putIntoStorage(currentBeer);
				alert('saved');
			});
			
			
			
			//BACK BUTTON FUNCTION HERE
			$('#back_button').live('click', function(){
				window.location.hash = "";
			});
			//TOP BUTTON FUNCTION HERE
			$('#top_button').live('click', function(){
				window.location.hash = "";
				$('.page').hide();	
				$('#container_inside1').show();
			});
			//EDIT BUTTON FUNCTION HERE
			$('.delete_button').each(function(){
				$(this).css('display','none');
			});
			$('#edit_button').live('click', function(){
				$('.delete_button').toggle();
			});
			//DELETE BUTTON FUNCTION HERE
			$('.delete_button').live('click', function(){
			
				var thisId = $(this).parent().attr("id");
				
				deleteFromStorage(thisId);	
				
				triggerSavedPage();
				
				return false;
			});



			// DO SAVE LIST HERE
			// save button live click
			$('#savedPage').live('click', function(){
				
				triggerSavedPage();

			});
			
			function triggerSavedPage(){
				
				// set the hash to 'saved'
				window.location.hash = "saved";
				
				// get local storage
				var fromStorage = getStorage();

				// empty the list
				$("#beer_savedList").empty();
				
				// create a temp var for the index
				var toTemplate = [];
				
				// loop through and put the item and its index in an object, then put it onto the temp
				for(var i = 0; i < fromStorage.length; i++){
					
					toTemplate.push({index: i, data: fromStorage[i] });
				
				}
				
				//take that temp object and put it in the template, then append it.
				$("#savedTemp").tmpl(toTemplate).appendTo("#beer_savedList");
				
			}
			
			
			//this is pulling images from API/beer/brewery
			$(".beer_name").live('click',function(){
			
				var thisBeerId = $(this).attr('id');
				var thisBreweryId = beerlist[thisBeerId].breweries[0].id;
				
				// set the hash to details, so it navigates
				window.location.hash = "details";
				
				$('#container_inside1').hide();
				$('#container_inside2').show();
				
								
				// ajax call for brewery/image
				$.ajax({
					url: 'php/get_morebrewery.php?breweryId=' + thisBreweryId,
					dataType: 'json',
					success: function(result){

						brewery = result.data;	
						
						var toTemplate = {
							thisBeer: beerlist[thisBeerId],
							thisBrewery: brewery
						};
						
						// save the reference for which beer we picked, so we can add it to our save list
						currentBeer = toTemplate;
						
						$("#indivisual_beer").empty();
						$("#eachBeerTemp").tmpl(toTemplate).appendTo("#indivisual_beer");
					    
					}
				});
				
				//show .hidden_info
				$('.beer_savedName').live('click', function(){
					
/*
					var thisButton = $('.hidden_info',this);
					
					console.log(thisButton);
					
					if(thisButton.hasClass('hidden')){
						
						thisButton.removeClass('hidden');
					} else {
						thisButton.addClass('hidden');
					}
*/

					$('.hidden_info',this).toggle();
					
				});
				
			});
				
		</script>
		
		
		<script id="searchResultTemp" type="text/x-jquery-tmpl"> 
			{{if thisItemsData.name}}
		    	<div class="beer_name" id="${thisItemsIndex}">${thisItemsData.name}</div>
		    {{/if}}
		</script>
		
		<script id="eachBeerTemp" type="text/x-jquery-tmpl"> 
	    	<div class="each_beer">
	    		
		    	<div id="table">
					<div class="each_discription">
						{{if thisBeer.name}}
			    			<div class="detail" id="name">${thisBeer.name}</div>
			    		{{/if}}
		    		</div>
		    		
		    		<div class="each_discription">
		    			<div class="heading detail">Label :</div>
		    			{{if thisBeer.labels}}
		    			
		    				{{if thisBeer.labels.large}}
		    					<div class="detail image"><img src="${thisBeer.labels.large}" /></div>
		    				{{/if}}
		    				
		    			{{else}}
		    				<div class="detail image">No picture</div>
		    			{{/if}}
		    		</div>
		    		
		    		<div class="each_discription">
		    			<div class="heading detail">Brewery Name :</div>
    					<div class="detail">
    						{{if thisBrewery.name}}
    							${thisBrewery.name} <br />
    						
    						{{else}}
		    					No Brewery Name Found
    						{{/if}}
    						
    						{{if thisBrewery.website}}
    							<a href="${thisBrewery.website}">${thisBrewery.website}</a>
    						
    						{{else}}
		    					<div class="detail">No Brewery Website Found</div>
    						{{/if}}
    					</div>
		    		</div>
		    		
		    		<div class="each_discription">
		    			<div class="heading detail">Brewery Location :</div>
    					<div class="detail">
    						{{if thisBrewery.locations}}
    						
    							{{if thisBrewery.locations}}
    								In ${thisBrewery.locations[0].locality} ${thisBrewery.locations[0].region}, 
    								{{if thisBrewery.locations[0].countryIsoCode == "US"}}
    									United States
    								{{else "JP"}}
    									Japan
    								{{else}}
    									${thisBrewery.locations[0].countryIsoCode}
    								{{/if}}
    							{{/if}}
    							
    						{{else}}
		    					<div class="detail">No Brewery Location Info. Found</div>
    							
    						{{/if}}
    						
    					</div>
		    		</div>
		    		
		    		<div class="each_discription">
		    			<div class="heading detail">Style :</div>
		    			{{if thisBeer.style}}
		    				{{if thisBeer.style.category}}
		    					{{if thisBeer.style.category.name}}
		    						<div class="detail">${thisBeer.style.category.name}</div>
		    					{{/if}}
		    				{{/if}}
		    				
		    			{{else}}
		    					<div class="detail">No Style Name Found</div>
		    			{{/if}}
		    		</div>
		    		
		    		<div class="each_discription">
			    		<div class="heading detail">Description :</div>
			    		{{if thisBeer.description}}
			    			<div class="detail">${thisBeer.description}</div>
			    		
			    		{{else}}
		    					<div class="detail">No Beer Description Found</div>
			    		{{/if}}
		    		</div>
		    		
		    		<div class="each_discription">
			    		<div class="heading detail">Alcohol by Vol :</div>
			    		{{if thisBeer.abv}}
			    			<div class="detail">${thisBeer.abv}%</div>
			    			
			    		{{else}}
		    					<div class="detail">No Vol Info. Found</div>
			    		{{/if}}
		    		</div>
		    		
		    		<div class="each_discription">
		    			<div class="heading detail">Availability :</div>
			    		{{if thisBeer.available}}
			    			{{if thisBeer.available.description}}
				    			<div class="detail">${thisBeer.available.description}</div>
			    			{{/if}}
			    		
			    		{{else}}
		    					<div class="detail">No Availability Info. Found</div>
			    		{{/if}}
		    		</div>

		    	</div>
		    </div>
		</script>
		
		<script id="savedTemp" type="text/x-jquery-tmpl">{{if data.thisBeer.name}}<div class="beer_savedName" id="${index}">
		    		${data.thisBeer.name}
		    		<div class="delete_button">x</div>
		    		
		    		<div class="hidden_info hidden">
		    			<div id="table">
				    		<div class="each_discription">
				    			<div class="heading detail">Label :</div>
				    			{{if data.thisBeer.labels}}
				    			
				    				{{if data.thisBeer.labels.large}}
				    					<div class="detail image"><img src="${data.thisBeer.labels.large}" /></div>
				    				{{/if}}
				    				
				    			{{else}}
				    				<div class="detail image">No picture</div>
				    			{{/if}}
				    		</div>
				    		
				    		<div class="each_discription">
				    			<div class="heading detail">Brewery Name :</div>
		    					<div class="detail">
		    						{{if data.thisBrewery.name}}
		    							${data.thisBrewery.name} <br />
		    						
		    						{{else}}
				    					No Brewery Name Found
		    						{{/if}}
		    						
		    						{{if data.thisBrewery.website}}
		    							<a href="${data.thisBrewery.website}">${data.thisBrewery.website}</a>
		    						
		    						{{else}}
				    					<div class="detail">No Brewery Website Found</div>
		    						{{/if}}
		    					</div>
				    		</div>
				    		
				    		<div class="each_discription">
				    			<div class="heading detail">Brewery Location :</div>
		    					<div class="detail">
		    						{{if data.thisBrewery.locations}}
		    						
		    							{{if data.thisBrewery.locations}}
		    								In ${data.thisBrewery.locations[0].locality} ${data.thisBrewery.locations[0].region}, 
		    								{{if data.thisBrewery.locations[0].countryIsoCode == "US"}}
		    									United States
		    								{{else "JP"}}
		    									Japan
		    								{{else}}
		    									${data.thisBrewery.locations[0].countryIsoCode}
		    								{{/if}}
		    							{{/if}}
		    							
		    						{{else}}
				    					<div class="detail">No Brewery Location Info. Found</div>
		    							
		    						{{/if}}
		    						
		    					</div>
				    		</div>
				    		
				    		<div class="each_discription">
				    			<div class="heading detail">Style :</div>
				    			{{if data.thisBeer.style}}
				    				{{if data.thisBeer.style.category}}
				    					{{if data.thisBeer.style.category.name}}
				    						<div class="detail">${data.thisBeer.style.category.name}</div>
				    					{{/if}}
				    				{{/if}}
				    				
				    			{{else}}
				    					<div class="detail">No Style Name Found</div>
				    			{{/if}}
				    		</div>
				    		
				    		<div class="each_discription">
					    		<div class="heading detail">Description :</div>
					    		{{if data.thisBeer.description}}
					    			<div class="detail">${data.thisBeer.description}</div>
					    		
					    		{{else}}
				    					<div class="detail">No Beer Description Found</div>
					    		{{/if}}
				    		</div>
				    		
				    		<div class="each_discription">
					    		<div class="heading detail">Alcohol by Vol :</div>
					    		{{if data.thisBeer.abv}}
					    			<div class="detail">${data.thisBeer.abv}%</div>
					    			
					    		{{else}}
				    					<div class="detail">No Vol Info. Found</div>
					    		{{/if}}
				    		</div>
				    		
				    		<div class="each_discription">
				    			<div class="heading detail">Availability :</div>
					    		{{if data.thisBeer.available}}
					    			{{if data.thisBeer.available.description}}
						    			<div class="detail">${data.thisBeer.available.description}</div>
					    			{{/if}}
					    		
					    		{{else}}
				    					<div class="detail">No Availability Info. Found</div>
					    		{{/if}}
				    		</div>
		
				    	</div>
		    		
		    		</div>
		    	</div>{{/if}}</script>
	</head>
	
	<body>
	
		<div id="container">
			<div id="container_inside1" class="page">
				<div id="nav">
					<div id="nav_background">
						<button id="savedPage" type="button"><img src="img/saved_button.png" alt="savedPage_button" ></button>
					</div><!-- end of #nav_background -->
				</div><!-- end of #nav -->
				
				<div id="search">
					<div class="coaster">
						<img src="img/coaster.png" alt="coaster" />
					</div>
					
					<form id="type">
						<input type="search" id="searchBeer" />
					</form>
					
					<div id="beer_list"></div>
				</div>
			
			</div><!-- end of #container-1_inside -->
		
			<div id="container_inside2" class="page">
				<div id="nav">
					<div id="nav_background">
						<button id="back_button" type="button"><img src="img/back_button.png" alt="back_button" ></button>
						<button id="savedPage" type="button"><img src="img/saved_button.png" alt="savedPage_button" ></button>
						<button id="save" type="button"><img src="img/save_button.png" alt="save_button" ></button>
					</div><!-- end of #nav_background -->
				</div><!-- end of #nav -->
				<div class="coaster">
					<img src="img/coaster_2.png" alt="coaster_2" width="" height="" />	
				</div><!-- end of .coaster -->
				<div id="indivisual_beer"></div>
			
			</div><!-- end of #container-2 -->
		
			<div id="container_inside3" class="page">
				<div id="nav">
					<div id="nav_background">
						<button id="top_button" type="button"><img src="img/top_button.png" alt="top_button" ></button>
<!-- 						<button id="savedPage" type="button"><img src="img/saved_button.png" alt="savedPage_button" ></button> -->
						<button id="edit_button" type="button"><img src="img/edit_button.png" alt="edit_button" ></button>
					</div><!-- end of #nav_background -->
				</div><!-- end of #nav -->

				<div id="beer_savedList"></div>
		
			</div><!-- end of #container-3 -->
		</div><!-- end of #container -->
	</body>
</html>