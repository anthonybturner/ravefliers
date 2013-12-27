<?php
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];
$errors = null;

switch ($action) {
		

	case 'register':
		
		$model = Users::Blank();
		$view = 'register.php';
		$title = "Register";
		break;
		
	case  'submit-register':
				
		$errors = Users::Validate($_REQUEST);
		if(!$errors){
			$errors = Users::Save($_REQUEST);			
		}
		if(!$errors){
			
			header('Location: ../Home');
			die();
			
		}else{
			$model = $_REQUEST;
			$view = 'register.php';
			$title	= "Register: $model[FirstName] $model[LastName]"	;			
		}		
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
		include '../Shared/_Layout.php';		
		break;
}

		
		
		