<!-- http://shiflett.org/blog/2011/jun/sorting-multi-dimensional-arrays-in-php -->


<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

	<head>
		<meta charset="UTF-8">
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title>Senior Presentation | Graphic & Web and Interactive Media | Summer 2012</title>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/reset-fonts-grids/reset-fonts-grids.css">
		<link type="text/css" rel="stylesheet" href="css/style.css"> 
		
		<style type="text/css">

		
		</style>			

	</head>
	<body>
		<!--[if lt IE 8]><p class=chromeframe>Your browser is <em>out of date.</em> <a href="http://browsehappy.com/">Upgrade to the most recent version</a> or <a href="http://www.google.com/chromeframe/?redirect=true">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
		<div id="wrapper">
			<header>
				<div id="top">
					<h1>SENIOR PRESENTATION SUMMER 2012</h1>
				</div>
			
			</header>
			<section class="main">
				<ul id="home"><!--
					
					
				--><li class="box">
						<a class="tolink"><img src="img/about_on.jpg" alt="about" width="" height="" />
							<div class="overlay"></div>
						</a>
					</li><!--
					
				--><?php
						// 1. making array (multi-demention array)
						$projects = array();
						
						$projects[] = array('image'=> 'img/KayanoTokuzato_1.jpg', 'url' => 'http://kayanotokuzato.com/IM205(Flynn)/beerapp', 'alt' => 'Kayano Tokuzato', 'title' => 'Kayano Tokuzato');
						$projects[] = array('image'=> 'img/PeterJun_1.jpg', 'url' => 'http://www.peterjun.com/', 'alt' => 'Peter Jun', 'title' => 'Peter Jun');
						$projects[] = array('image'=> 'img/GinaMazany_1.jpg', 'url' => 'http://www.mazanydesign.com/', 'alt' => 'Gina Mazany', 'title' => 'Gina Mazany');
						$projects[] = array('image'=> 'img/MeikleRyann_1.jpg', 'url' => 'http://ryannmeikle.com/', 'alt' => 'Ryann Meikle', 'title' => 'Ryann Meikle');
						$projects[] = array('image'=> 'img/JessicaNyoman_1.jpg', 'url' => 'http://www.jnyodesign.com/', 'alt' => 'Jessica Nyoman', 'title' => 'Jessica Nyoman');
						$projects[] = array('image'=> 'img/MiguelSolorio_1.jpg', 'url' => 'http://www.miguelsolorio.com/', 'alt' => 'Solorio Miguel', 'title' => 'Solorio Miguel');
						
						// 2. randomizing
						shuffle($projects);
						
							//this is the box that is not need to be randomizing
						//$projects[] = array('image'=> 'img/home/8.jpg', 'url' => 'http://kayanotokuzato.com/index_portfolio_3_a.html', 'alt' => 'about');
						
						// 3. loop through and output
						foreach ($projects as $project)
							{
								$img = $project['image'];
								$url = $project['url'];
								$alt = $project['alt'];
								$title = $project['title'];
								
								echo 
									"<li class='box'><a class='tolink' href='$url' target='_blank' title='$title'><img src='$img' alt='$alt' width='' height='' /><div class='overlay one'></div></a></li>";
							}					
					?><!--					
					

					
					
				--><li class="box">
						<a class="tolink"><img src="img/about_on.jpg" alt="about" width="" height="" />
							<div class="overlay about"></div>
						</a>
					</li><!--
					

					
					
				--><?php
						// 1. making array (multi-demention array)
						$projects = array();
						
						$projects[] = array('image'=> 'img/KayanoTokuzato_2.jpg', 'url' => 'http://kayanotokuzato.com/sake_32', 'alt' => 'Kayano Tokuzato', 'title' => 'Kayano Tokuzato');
						$projects[] = array('image'=> 'img/PeterJun_2.jpg', 'url' => 'http://www.peterjun.com/', 'alt' => 'Peter Jun', 'title' => 'Peter Jun');
						$projects[] = array('image'=> 'img/GinaMazany_2.jpg', 'url' => 'http://www.mazanydesign.com/', 'alt' => 'Gina Mazany', 'title' => 'Gina Mazany');
						$projects[] = array('image'=> 'img/MeikleRyann_2.jpg', 'url' => 'http://ryannmeikle.com/', 'alt' => 'Ryann Meikle', 'title' => 'Ryann Meikle');
						$projects[] = array('image'=> 'img/JessicaNyoman_2.jpg', 'url' => 'http://www.jnyodesign.com/', 'alt' => 'Jessica Nyoman', 'title' => 'Jessica Nyoman');
						$projects[] = array('image'=> 'img/MiguelSolorio_2.jpg', 'url' => 'http://www.miguelsolorio.com/', 'alt' => 'Solorio Miguel', 'title' => 'Solorio Miguel');
						
						// 2. randomizing
						shuffle($projects);
						
							//this is the box that is not need to be randomizing
						//$projects[] = array('image'=> 'img/home/8.jpg', 'url' => 'http://kayanotokuzato.com/index_portfolio_3_a.html', 'alt' => 'about');
						
						// 3. loop through and output
						foreach ($projects as $project)
							{
								$img = $project['image'];
								$url = $project['url'];
								$alt = $project['alt'];
								$title = $project['title'];
								
								echo 
									"<li class='box'><a class='tolink' href='$url' target='_blank' title='$title'><img src='$img' alt='$alt' width='' height='' /><div class='overlay one'></div></a></li>";
							}					
					?><!--
					
										
					
					
				--><li class="box">
						<a class="tolink"><img src="img/about_on.jpg" alt="about" width="" height="" />
							<div class="overlay about"></div>
						</a>
					</li><!--
					
					
					
				--><?php
						// 1. making array (multi-demention array)
						$projects = array();
						
						$projects[] = array('image'=> 'img/KayanoTokuzato_3.jpg', 'url' => 'http://kayanotokuzato.com/IM205(Flynn)/beerapp', 'alt' => 'Kayano Tokuzato', 'title' => 'Kayano Tokuzato');
						$projects[] = array('image'=> 'img/PeterJun_3.jpg', 'url' => 'http://www.peterjun.com/', 'alt' => 'Peter Jun', 'title' => 'Peter Jun');
						$projects[] = array('image'=> 'img/GinaMazany_3.jpg', 'url' => 'http://www.mazanydesign.com/', 'alt' => 'Gina Mazany', 'title' => 'Gina Mazany');
						$projects[] = array('image'=> 'img/MeikleRyann_3.jpg', 'url' => 'http://ryannmeikle.com/', 'alt' => 'Ryann Meikle', 'title' => 'Ryann Meikle');
						$projects[] = array('image'=> 'img/JessicaNyoman_3.jpg', 'url' => 'http://www.jnyodesign.com/', 'alt' => 'Jessica Nyoman', 'title' => 'Jessica Nyoman');
						$projects[] = array('image'=> 'img/MiguelSolorio_3.jpg', 'url' => 'http://www.miguelsolorio.com/', 'alt' => 'Solorio Miguel', 'title' => 'Solorio Miguel');
						
						// 2. randomizing
						shuffle($projects);
						
							//this is the box that is not need to be randomizing
						//$projects[] = array('image'=> 'img/home/8.jpg', 'url' => 'http://kayanotokuzato.com/index_portfolio_3_a.html', 'alt' => 'about');
						
						// 3. loop through and output
						foreach ($projects as $project)
							{
								$img = $project['image'];
								$url = $project['url'];
								$alt = $project['alt'];
								$title = $project['title'];
								
								echo 
									"<li class='box'><a class='tolink' href='$url' target='_blank' title='$title'><img src='$img' alt='$alt' width='' height='' /><div class='overlay one'></div></a></li>";
							}					
					?><!--

								
				
				--></ul>
				<div class="clearfix"></div>

			</section>
	
	
		</div>
	
	
	
		<script type="text/javascript">


					
		</script>
	</body>
</html>
