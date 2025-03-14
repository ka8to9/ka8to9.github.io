<?php 
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: text/css');
?>
input{
	margin-left: <? print_r(rand(5,20)); ?>px;
}

.overlay {
	background-color:rgba(255,255,255,.7);
}

