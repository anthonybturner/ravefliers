<?php
	//Controller for the model
	include_once "../../inc/_global.php";
Auth::Secure();

	@$action = $_REQUEST['action'];//Merges together the GET and POST
	@$format = $_REQUEST['format'];
	
	switch ($action) {
		
		case 'new':
			$model = Products::Blank();//Null Associative array
			$view  = 'edit.php';
			$title = "Create new Product";
			break;
		
		case 'details':
			$model = Products::Get($_REQUEST['id']);
			$view = 'details.php';
			$title = "Details for: $model[Name]";
			break;
			
		case 'edit':
			
			$model = Products::Get($_REQUEST['id']);
			$view  = 'edit.php';
			$title = "Edit: $model[Name]";
			break;
			
			
		case 'save':
			
			$errors = Products::Validate($_REQUEST);//Check validation if it is good
			if(!$errors){
				//Check for errors when saving
				$errors = Products::Save($_REQUEST);//Save
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
						
			//Only triggered when a 'post' is sent
			if(isset($_POST['id'])){
				
				$errors = Products::Delete($_REQUEST['id']);
				if( $errors ){
				
					//Display the record with error messages
					$model = Products::Get($_REQUEST['id']);
					$view = 'error.php';
					break;
					
				}
				
				header("Location: ?");
				die();
			}
			
			//Default call when no 'post' is sent
			$model = Products::Get($_REQUEST['id']);
			$view  = 'delete.php';			
			$title = "Delete: $model[Name]" ;
			break;
					
		default:
			$model = Products::Get();
			$view = 'list.php';//Gives list of keyowrds to list.php
	
	}

			
switch($format){
	
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
		include '../Shared/_Layout.php';
		break;

}
	