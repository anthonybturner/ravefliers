
<!DOCTYPE html>
<html>
  <head>
    <title>Dialog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <style type="text/css">
    	body { padding-top: 70px; }
    </style>
  </head>
  
  
  <body>
  	<header>
  	  	<div class="container">

  			<h1> Dialog	</h1>
  		</div>
  		
  	</header>
  	
  	
  	 <!-- The main view area-->
	<? include $view; ?>
  	<!-- End the main view area-->

  	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="Scripts/main.js"></script>	
    
    <? if(function_exists('Scripts')) 
    	Scripts(); 
    ?>
    
 </body>
</html>