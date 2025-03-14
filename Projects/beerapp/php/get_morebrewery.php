<?php 
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		
        // create curl resource 
        $ch = curl_init(); 
		$breweryId = $_GET['breweryId'];
		
        // set url 
        curl_setopt($ch, CURLOPT_URL, "http://api.brewerydb.com/v2/brewery/".$breweryId."?withLocations=Y&withSocialAccounts=Y&withGuilds=Y&withAlternateNames=Y&key=b611258a65328d4fb1ae3c5c7e96e3ca&format=json"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 
		print_r($output);
		
        // close curl resource to free up system resources 
        curl_close($ch); 
        
        
/* -------------------------------- */ 
		//for images       

		
        // create curl resource 
        //$ch = curl_init(); 
		//$searchTerm = $_GET['search'];
		
        // set url 
        //curl_setopt($ch, CURLOPT_URL, "http://api.brewerydb.com/v2/beer/RUg90U/breweries?key=94a19f9d93e9bdb2385bb54491e38d29".$searchTerm); 

  
?>