<!-- note: -->
<!--
YQL
	Yahoo Developer Network
	http://developer.yahoo.com/yql/console/
-->


<html>
	<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>

		<script>
		
		$(document).ready(function(){
			
			// put JS code here.
					
 		});
 

		</script>
		<style>
			BODY
			{
				font-family: georgia;
				font-size: 32px;
			}
		</style>
	</head>
	<body>
	
	
	<h2>Weather</h2>
	<form name='mainForm' method="get">
	<input name='location' id='location' type='text'/><br/>
	<button id='lookUpWeather'>Look up weather</button>
	</form>

<?php
	
	// we're going to point to Yahoo's APIs
	$BASE_URL = "https://query.yahooapis.com/v1/public/yql";
	
	$data = get_data("http://weather.yahooapis.com/forecastrss?p=98121&u=f");
		 
		// Form YQL query and build URI to YQL Web service in two steps:
		
		// first, we show the query
		$yql_query = "select astronomy.sunset from weather.forecast where location='$location'";
		// then we combine the $BASE_URL and query (urlencoded) together
		$yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
		
		// show what we're calling
		// echo $yql_query_url;
		
		// Make call with cURL (curl pulls webpages - it's very common)
		$session = curl_init($yql_query_url);
		curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
		$json = curl_exec($session);
		
		// Convert JSON to PHP object 
		$phpObj = json_decode($json);
		
		// Confirm that results were returned before parsing
		if(!is_null($phpObj->query->results)){

				
		  // Parse results and extract data to display
		  foreach($phpObj->query->results as $result){
			
			$sunset = $result->astronomy->sunset;			
			echo "The sunset in $location are $sunset";
			
			

			
		  }
		}
		
		// If no results were returned...
		if(empty($result)){
		  echo "No results found";
		}
		
		
	
?>

	
	</body>
				
</html>


