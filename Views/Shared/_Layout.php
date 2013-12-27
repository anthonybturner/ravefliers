<!DOCTYPE html>
<html>
  <head>
    <title><?=@$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link href="../../Resources/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../Resources/css/cerulean-bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" rel="stylesheet" href="../../Resources/css/public-layout.css" />
    <style type="text/css">
    	
    	
    </style>
  </head>
  <body>

  	<? 	include('_PublicNav.php'); ?>
  	<div class="container">
	
	  	 <!-- The main view area-->
	  	 <div>
			<? include $view; ?>
		</div> 
	  	<!-- End the main view area-->

	</div>

  	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <!-- <script src="../../Resources/Scripts/main.js"></script> -->	
    
   <? if(function_exists('Scripts')) 
    	Scripts(); 
    ?>
    
 </body>
</html>