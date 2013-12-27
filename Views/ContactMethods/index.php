<?php
	//Controller for the model
	include_once "../../inc/_global.php";
	Auth::Secure();
	@$action = $_REQUEST['action'];//Merges together the GET and POST
	@$format = $_REQUEST['format'];//Merges together the GET and POST
	
	switch ($action) {
		
		case 'new':
			$model = ContactMethods::Blank();//Null Associative array
			$view  = 'edit.php';
			$title = "Create new ContactMethod";
			break;
		
		case 'details':
			$model = ContactMethods::Get($_REQUEST['id']);
			$view = 'details.php';
			$title = "Details for ContactMethod: $model[ContactMethodType]";
			break;
				
		case 'edit':
			
			$model = ContactMethods::Get($_REQUEST['id']);
			$view  = 'edit.php';
			$title = "Edit: $model[ContactMethodType]";
			break;
			
		case 'delete':
						
			//Only triggered when a 'post' is sent
			if(isset($_POST['id'])){
				
				$errors = ContactMethods::Delete($_REQUEST['id']);
				if( $errors ){
				
					//Display the record with error messages
					$model = ContactMethods::Get($_REQUEST['id']);
					$view = 'error.php';
					break;
					
				}
				
				header("Location: ?");
				die();
			}
			
			//Default call when no 'post' is sent
			$model = ContactMethods::Get($_REQUEST['id']);
			$view  = 'delete.php';			
			$title = "Delete: $model[ContactMethodType]" ;
			break;
			
		case 'save':
			
			$errors = ContactMethods::Validate($_REQUEST);//Check validation if it is good
			if(!$errors){
				//Check for errors when saving
				$errors = ContactMethods::Save($_REQUEST);//Save
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
			$title = "Save: $model[ContactMethodType]" ;
			break;	
					
		default:
			$model = ContactMethods::Get();
			$view = 'list.php';//Gives list of keyowrds to list.php
			break;
	}

		
switch($format){
	
	case 'dialog':
		include '../Shared/_DialogLayout.php';
		break;
		
	default: 
		include '../Shared/_Layout.php';
		break;

}
	