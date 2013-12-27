
<?php
	//Controller for the model
	include_once "../../inc/_global.php";
Auth::Secure();

	@$action = $_REQUEST['action'];//Merges together the GET and POST
	@$format = $_REQUEST['format'];//Merges together the GET and POST
	
	
	switch ($action) {
			
			case 'new':
			$model = ProductKeywords::Blank();//Null Associative array
			$view  = 'edit.php';
			$title = "New Product Keyword:";
			break;
			
		
		case 'details':
			$model = ProductKeywords::Get($_REQUEST['id']);
			$view = 'details.php';
			$title = "Details: $model[Keywords_id]";
			break;
			
		
			
		case 'edit':
			
			$model = ProductKeywords::Get($_REQUEST['id']);
			$view  = 'edit.php';
			$title = "Edit: $model[Keywords_id]";
			break;
	
		case 'save':
			
			$errors = ProductKeywords::Validate($_REQUEST);//Check validation if it is good
			if(!$errors){
				//Check for errors when saving
				$errors = ProductKeywords::Save($_REQUEST);//Save
			}
		
			//If there are still no errrors then we redirect
			if( !$errors){
				
				header("Location: ?");
				die();//Kills preproccesor processing
				//End after die	
			}
			//Only get here if there are errors
			$model = $_REQUEST;//Repost previous entered data from post
			$view = 'edit.php';
			$title = "Save: $model[Keywords_id]";
			break;	
			
			case 'delete':
						
			//Only triggered when a 'post' is sent
			if(isset($_POST['id'])){
				
				$errors = ProductKeywords::Delete($_REQUEST['id']);
				if( $errors ){
				
					//Display the record with error messages
					$model = ProductKeywords::Get($_REQUEST['id']);
					$view = 'error.php';
					break;
					
				}
				
				header("Location: ?");
				die();
			}
			
			//Default call when no 'post' is sent
			$model = ProductKeywords::Get($_REQUEST['id']);
			$view  = 'delete.php';			
			$title = "Delete: $model[Keywords_id]" ;
			break;
					
		default:
			$model = ProductKeywords::Get();
			$view = 'list.php';//Gives list of keyowrds to list.php
			break;
	}

	switch ($format) {
		
		case 'dialog':
			include '../Shared/_DialogLayout.php';
			break;
		
		default:
			$model_cat=	ProductsCategory::Get();
			include '../Shared/_Layout.php';
			break;
	}
	


	