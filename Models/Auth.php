<?
//Using old version for defining contant because of server's php version is < 5.3
define ("ADMIN", 1);//Move to config file
define ("USER", 2);

class Auth{
	
    public static function IsLoggedIn(){
    	
            return self::GetUser() != null;
    }
	
    public static function GetUser(){
    	
		if( isset($_SESSION['FirstName']) )
            return $_SESSION['FirstName'];
		
		else {
			return "";
		}
    }
	
	public static function is_valid_user_creds($email, $password){
		
		$results = Users::GetByEmail($email);
		if( isset($results)){
			
			return ($results['Email'] === $email) && ($results['Password'] === Users::Encrypt($password));
	
		}		
		return false;
	}
	
    public static function HasAdminPermission($user_type){
    	
			if(isset($user_type))
				return $user_type == ADMIN;
			return false;
    }
	
	 public static function HasUserPermission($user_type){
    
			if(isset($user_type))
				return $user_type == USER;
			return false;
    }
	
	 public static function HasPermissions($user_type){
    	
			return self::HasAdminPermission($user_type) || self::HasUserPermission($user_type);
			
    }

	static public function Blank(){
				
		return array('id'=> null, 'Parents_id'=> null,'Name' => null);
		
	}
    
    static public function Secure(){
    	
            if(!self::IsLoggedIn() || !Auth::HasPermissions()){
            	
               header('Location: ' . "/~turnera1/2013/Final/Views/Auth?action=login"); 
               die();
            }		
    }
	static public function Validate($row){

		$errors = array();//Only one error per field/element
		if( !$row['Email']){
			 $errors['Email'] = 'is required';
		}
		if( !$row['Password']){
			 $errors['Password'] = 'is required';
		}
		
		return count($errors) ? $errors : null;
	}
	
	
	static public function LogOut(){
			
		$_SESSION=array();
		if (session_id() != "" || isset($_COOKIE[session_name()]))
			setcookie(session_name(), '', time()-2592000, '/');
		session_destroy();
		
		return true;
	}
}