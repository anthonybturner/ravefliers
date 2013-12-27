<?php
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];

$errors = null;

switch ($action) {
	
	
	case 'terms':
		
		$text = $_POST['data'];
		$model = Fliers::FindMatches($text);
		$view = 'list-search.php';
	break;
	
	case 'search':

		$model = $_REQUEST;
		$view = 'list-search.php';
		$title = "Search results";
		break;
	
	

	case 'flier': 
		
		$ids = json_decode($_REQUEST['ids']);
		
		for ($i=0; $i < sizeof($ids) ; $i++) { 
			
			$item = Fliers::Get($ids[$i] );
			
			//If the item is not set, then the item with the given id was not in the database
			while( !isset($item)){
			//Get a random id.
				$last = Fliers::GetLast();
				$item = Fliers::Get(rand(1,$last['MAX(id)']));
			}
			$model[$i] = $item;
		}

		$title = 'Flier';
		$view = 'details.php';
		break;
	case 'fliers':
		$model = Fliers::GetByCategory($_REQUEST['FliersCategory_id']);
		$title = "Fliers";
		$view = 'list.php';
		break;
		
	case 'albums':
		$model = FliersCategory::Get();
		$title = "Albums";
		 $loaded = true;
		$view = 'list.php';
		break;
		
		
	case 'delete':
		
		if(isset($_REQUEST['id'])){

			$cart  = $_SESSION['cart'];
			foreach ($cart as $key => $id) {
				
				if( $id == $_REQUEST['id']){
					 unset($_SESSION['cart'][$key]);
					break;
				}
			} 
		}
		
		$model  = $_SESSION['cart'];
		//Populate the model with items from each id
		foreach ($model as $key => $id) {
			
				$item = Products::Get($id);
				$model[$key] = $item;
		} 
		
		$view 	= 'list.php';					
		$title	= "Cart"	;			
		break;
		
		
	case 'profile':
		
		
		break;
		
	case 'register':
		
		header('Location: ../Register/index.php?action=register');
		die();
		break;
		
		
		break;
		

	case 'login':
		
		header('Location: ../Auth/index.php?action=login');
		die();
		break;
		
	case 'logout':
		Auth::LogOut();
		//Intentionally not using a break to go to default
	default:
	
		$view 	= 'home.php';
		$title	= 'My Website';		
		break;
}

switch ($format) {
	case 'dialog':
		include '../Shared/_DialogLayout.php';				
		break;
		
	case 'plain':
		include $view;
		break;
		
	case 'json':
		echo json_encode(array('model'=> $model, 'errors'=> $errors));
		break;
	
	default:
		//$model_cat=	ProductsCategory::Get();
		include '../Shared/_PublicLayout.php';		
		break;
}
