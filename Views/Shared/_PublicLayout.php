<!DOCTYPE html>
<html>
  <head>
    <title><?=@$title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Abstract2k - Rave Fliers" />
    <meta property="og:description" content="East Coast rave fliers, rave events, past rave events, old school ravers" />
    <meta property="og:url" content="http://turnera1.byethost10.com/Views/Home/index.php" />
    <meta property="og:image" content="http://cs.newpaltz.edu/~turnera1/2013/Resources/images/logo.png"/>
    <link href="../../Resources/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../../Resources/css/cerulean-bootstrap.min.css" rel="stylesheet" />
	
	<link type="text/css" rel="stylesheet" href="../../Resources/css/public-layout.css" />
	

  </head>
  <body>
	
	<div class="container">
		
		<? include '_PublicNav.php'; ?>
			<header>
				<? include '../Home/banner.php' ?>	
			</header>
		<hr />
	</div>
	
	 <!-- The main view area-->
	<div class="container">
		<div class="col-md-8 col-sm-10">
			<? include $view; ?>
	  	
	  	</div>
	  	
	  	<div class="col-md-4 col-sm-2">
			<? include '../Home/side-bar.php'; ?>
		</div>
	</div>
	<!-- End the main view area-->
	  	
	</div>
  	<script src="http://code.jquery.com/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
   <? if(function_exists('Scripts')) Scripts(); ?> 
    
 </body>
</html>