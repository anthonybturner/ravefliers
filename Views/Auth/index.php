<?php
include_once '../../inc/_global.php';

@$action = $_REQUEST['action'];
@$format = $_REQUEST['format'];
$errors = null;

switch ($action) {
		
	case 'login':
		$model = array('Email'=>null, 'Password' => null);
		$view 	= 'login.php';		
		$title	= "Login"	;	
		break;
		
	case 'submit-login':
	
		//Validate that the user gave input for all required fields
		$errors = Auth::Validate($_REQUEST);
		if( !$errors ){
			
			$email = $_POST['Email'];
			if(Auth::is_valid_user_creds($email, $_POST['Password'])){
				
				$results = Users::GetByEmail($email);		
		        $_SESSION['User'] = $results['Email'];
				$_SESSION['FirstName'] = $results['FirstName'];
				$_SESSION['LastName'] = $results['LastName'];
				$_SESSION['Photo'] = $results['Photo'];
				
				$user_type= $results['UserType'];
					
				$_SESSION['UserType'] = $user_type;
				
				if( Auth::HasAdminPermission($user_type)){
					
					header("Location: ../Users/");
		
				}else{
					
					header("Location: ../Home/");
				}
					
				die();
			}else{
					
				$_REQUEST['Status'] = "Failed";

			}
		}
		
		$model = $_REQUEST;
		$view = 'login.php';
		$title = "Login";
		
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
