<?
	$model_pages = array(
		
		'ProductsCategory'=> array(
			'url' =>'Views/ProductsCategory',
			'section' => 'ProductsCategoryModel',
			'title' => 'Products Category'
		),
		
		'Products'=> array(
			'url' =>'Views/Products',
			'section' => 'ProductsModel',
			'title' => 'Products'
		),
		
		'Addresses'=> array(
			'url' =>'Views/Addresses',
			'section' => 'AddressesModel',
			'title' => 'Addresses'
		),
		'ContactMethods'=> array(
			'url' =>'Views/ContactMethods',
			'section' => 'ContactMethodsModel',
			'title' => 'ContactMethods'
		),
		'Keywords'=> array(
			'url' =>'Views/Keywords',
			'section' => 'KeywordsModel',
			'title' => 'Keywords'
		),
		'Orders'=> array(
			'url' =>'Views/Orders',
			'section' => 'OrdersModel',
			'title' => 'Orders'
		),
		'OrdersItems'=> array(
			'url' =>'Views/OrdersItems',
			'section' => 'OrdersItemsModel',
			'title' => 'OrdersItems'
		),
		'PhoneNumbers'=> array(
			'url' =>'Views/PhoneNumbers',
			'section' => 'PhoneNumbersModel',
			'title' => 'PhoneNumbers'
		),
		'ProductKeyWords'=> array(
			'url' =>'Views/ProductKeywords',
			'section' => 'ProductKeyWordsModel',
			'title' => 'Product KeyWords'
		),
		'Suppliers'=> array(
			'url' =>'Views/Suppliers',
			'section' => 'SuppliersModel',
			'title' => 'Suppliers'
		)
		
		
	);
?>
    
	<div class="navbar navbar-default" role="navigation">
    
    	<div class="container">

   			 <div class="navbar-header">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".nav-c">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="../../index.php">Amazoff</a>
				
			</div>
				
			<div class="collapse navbar-collapse nav-c">
				
				<ul class="nav navbar-nav">
									
					<li class="dropdown">
		      			  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Departments <b class="caret"></b></a>
		      			  <ul class="dropdown-menu">
		      			  	
								<? foreach($model_pages as $name => $data): ?>
									
									<li class="<?=$data['section']?>">
										<!-- Generate a url, removing white space and putting link to lower case-->
											
											<a href="../../<?=$data['url']?>" > <?=$data['title'] ?> 
										</a>
									</li>
			
							<? endforeach; ?>
		        		</ul>
		      		</li>
				</ul>
				<? $user=Auth::GetUser(); 
					if (isset($user['LastName'])) {$var="Signed in as "; $name = $user['LastName'];}
					else {
						$var="Sign in";							
						$name="";
					}
				?>
				
				<p class="navbar-text pull-right"> <?=$var?> 
					<a href="#"  class="button-primary"><? $user=Auth::GetUser(); echo ($name);?></a>
				</p>

			</div>
			
		</div>
	</div>
	
	<!-- End navbar-->