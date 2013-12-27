<?php

/**
 * 
 */
class Register {

	
	static public function Blank(){
				
		return array('id'=> null, 'FirstName' => null , 'LastName' => null,'Email', 'Password' => null, 'Photo', 'UserType' => null);
		
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field/element
		if( !$row['FirstName'])$errors['FirstName'] = 'is required'; 		
		if( !$row['LastName'])$errors['LastName'] = 'is required';
		if( !$row['Email'])$errors['Email'] = 'is required';
		if( !$row['Password'])$errors['Password'] = 'is required';
				
		return count($errors) ? $errors : null;
	}
	
	//Encodes value of every single item in the list
	static function Encode($row, $conn){
		
		$row2 = array();
		foreach ($row as $key => $value) {
			
			$row2[$key] = $conn->real_escape_string($value);
		}
		
		return $row2;
		
	}
}
