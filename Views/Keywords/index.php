
<?php
	//Controller for the model
	include_once "../../inc/_global.php";
Auth::Secure();
	@$action = $_REQUEST['action'];//Merges together the GET and POST
	@$format = $_REQUEST['format'];//Merges together the GET and POST
	$errors = null;
	
	
	switch ($action) {
			
			case 'new':
			$model = Keywords::Blank();//Null Associative array
			$view  = 'edit.php';
			$title = "New Keyword:";
			break;
			
		
		case 'details':
			$model = Keywords::Get($_REQUEST['id']);
			$view = 'details.php';
			$title = "Details: $model[Name]";
			break;
			
		case 'edit':
			
			$model = Keywords::Get($_REQUEST['id']);
			$view  = 'edit.php';
			$title = "Edit: $model[Name]";
			break;
	
		case 'save':
			
			$errors = Keywords::Validate($_REQUEST);//Check validation if it is good
			if(!$errors){
				//Check for errors when saving
				$errors = Keywords::Save($_REQUEST);//Save
			}
			
			
			if( !$errors){
				
				if($format=='plain' || $format == 'json'){
					
					$view = 'item.php';
					$rs = $model = Keywords::Get($_REQUEST['id']);
				}else{
					
					header("?status=Saved&id=$_REQUEST[id]");
					die();//Kills preproccesor processing
					//End after die	
				}
				
			}else{
				
				//Only get here if there are errors
				$model = $_REQUEST;//Repost previous entered data from post
				$view = 'edit.php';
				$title = "Save: $model[Name]";
			}
			
			break;	
			case 'delete':
						
			//Only triggered when a 'post' is sent
			if(isset($_POST['id'])){
				
				$errors = Keywords::Delete($_REQUEST['id']);
				if( $errors ){
				
					//Display the record with error messages
					$model = Keywords::Get($_REQUEST['id']);
					$view = 'error.php';
					break;
					
				}
				
				header("Location: ?");
				die();
			}
			
			//Default call when no 'post' is sent
			$model = Keywords::Get($_REQUEST['id']);
			$view  = 'delete.php';			
			$title = "Delete: $model[Name]" ;
			break;
					
		default:
			$model = Keywords::Get();
			$view = 'list.php';//Gives list of keyowrds to list.php
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
			$model_cat=	ProductsCategory::Get();
			
			include '../Shared/_Layout.php';
			break;
	}
	


	