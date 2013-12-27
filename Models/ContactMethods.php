<?php

/**
 * 
 */
class ContactMethods {

	static public function Get($id=null){
			
		if(isset($id)){
			
			return fetch_one("SELECT * FROM ContactMethods WHERE id=$id");//Double quotes takes the actual value of $id
		}else{
			return fetch_all('SELECT * FROM ContactMethods');
		}
		
		return $ret;	
		
	}
	
	
	static public function Save($row){
		
		$conn = GetConnection();
		$row2 = Orders::Encode($row, $conn);
		
		if($row['id']){//Update field if the returned value for the id is not null
			
			$sql = " UPDATE ContactMethods Set Users_id='$row2[Users_id], ContactMethodType='$row2[ContactMethodType]'"
			.		"WHERE id=$row[id]";
		}else{
			
			//Insert statement ( a new record )
				$sql = " Insert Into ContactMethods (Users_id, ContactMethodType) "
                        .        " Values ('$row2[Users_id]', '$row2[ContactMethodType]') ";
		}
						
        $conn->query($sql);//Insert the values from the associative array $row into the current connections database with the $sql variable
        $error = $conn->error;    //Returns the last error message (if there's one) for the most recent MySQLi function call that can succeed or fail.
                   
        $conn->close();
        
        if($error){
                return array('db_error' => $error);//Create and return an array pointing to the error msg
        }else {
                return false;
        }	
	}
	
	
	static public function Blank(){
				
		return array('id' => null, 'Users_id' => null, 'ContactMethodType' => null);
		
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field
		if( !$row['Users_id'])$errors['Users_id'] = 'is required'; 
		if( !is_numeric($row['Users_id']))$errors['Users_id'] = 'must be a number';		
		
		if( !$row['ContactMethodType'])$errors['ContactMethodType'] = 'is required'; 	
		if( !is_numeric($row['ContactMethodType']))$errors['ContactMethodType'] = 'must be a number';	
		
		
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

