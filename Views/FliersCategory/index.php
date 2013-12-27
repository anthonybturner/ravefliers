
<?php
	//Controller for the model
	include_once "../../inc/_global.php";
Auth::Secure();

	@$action = $_REQUEST['action'];//Merges together the GET and POST
	@$format = $_REQUEST['format'];//Merges together the GET and POST
	
	switch ($action) {
			
		case 'new':
			$model = ProductsCategory::Blank();//Null Associative array
			$view  = 'edit.php';
			$title = "Create new Product Category";
			break;
			
		case 'details':
			$model = ProductsCategory::Get($_REQUEST['id']);
			$view = 'details.php';
			$title = "Details: $model[Name]";
			break;
	
		case 'edit':
			
			$model = ProductsCategory::Get($_REQUEST['id']);
			$view  = 'edit.php';
			$title = "Edit: $model[Name]";
			break;
			
			
		case 'save':
			
			$errors = ProductsCategory::Validate($_REQUEST);//Check validation if it is good
			if(!$errors){
				//Check for errors when saving
				$errors = ProductsCategory::Save($_REQUEST);//Save
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
			$title = "Save: $model[Name]";
			break;	
			
		case 'delete':
			
			if(isset($_POST['id'])){
				
				$errors = ProductsCategory::Delete($_REQUEST['id']);
				
				if($errors){
					
					$model = ProductsCategory::Get($_REQUEST['id']);
					$view = 'errors.php';
					break;
				}
				
				header("Location: ?");
				die();
				
			}
			
			
			$model = ProductsCategory::Get($_REQUEST['id']);
			$view = 'delete.php';
			$title = "Delete: $model[Name]";
			break;
			
		case 'confirm_delete':
			
			ProductsCategory::Delete($_REQUEST);	
			header("Location: ?");
			die();//Kills preproccesor processing
					
		default:
			$model = ProductsCategory::Get();
			$view = 'list.php';//Gives list of keyowrds to list.php
	
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
	