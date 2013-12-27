<link rel="stylesheet" href="../../Resources/css/nav.css"></link>

<div class="navbar navbar-default" role="navigation">

    <div class="container">

		 <div class="navbar-header">
		 	
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".nav-c">
				<!-- This is for mobile users -->
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>

			</button>
			
			<a class="navbar-brand" href="../Home/index.php">Home</a>
						
		</div>
				
		<div class="collapse navbar-collapse nav-c">

			<ul class="nav navbar-nav">

				<li class="dropdown">
	      			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Events <b class="caret"></b></a>
	      			  <ul class="dropdown-menu">

						<li>
							<a href="#"> Categories</a>
						</li>
	        		</ul>
	      		</li>

	      		<li class="dropdown">
	      			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Music <b class="caret"></b></a>
	      			  <ul class="dropdown-menu">		
						<li>
							<a href="#"> Categories</a>
						</li>
		
	        		</ul>
	      		</li>
	      		
	      		<li class="dropdown">
	      			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forums <b class="caret"></b></a>
	      			  <ul class="dropdown-menu">
	      			  	
								
						<li>
							<a href="#"> Categories</a>
						</li>
		
	        		</ul>
	      		</li>
	      		
			</ul>
	      		
	      		<div id="access-area" class="pull-right">
	      			 <? if(Auth::IsLoggedIn()): ?>

	      			  	<span class="navbar-link">Welcome <a href="?action=profile" class="navbar-link"> <?= Auth::GetUser()?>! </a> </span>
	      			  	<a href="?action=logout" class="navbar-link navbar-right">  Logout</a>
	      			 <? else : ?>
	   				  	
	   				  	<a href="../Home/index.php?action=register" class="navbar-link  navbar-right">Register</a>
	      			  	<a href="../Home/index.php?action=login" class="navbar-link navbar-right">Login</a>
	      			  	
	      			 <? endif ?> 
	      			  
	      		</div>
			
		</div><!-- Navbar collapse -->
		
	      		
	</div><!-- Container -->
</div>
	
