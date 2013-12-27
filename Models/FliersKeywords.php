<?php

/**
 * 
 */
class ProductKeywords {
	

	static public function Get($id=null){
			
		if(isset($id)){
			
			return fetch_one("SELECT * FROM Product_Keywords WHERE id=$id");//Double quotes takes the actual value of $id
		}else{
			return fetch_all('SELECT * FROM Product_Keywords');
		}

	}
	
	static public function Save($row){
		
		$conn = GetConnection();
		$row2 = Keywords::Encode($row, $conn);
		
		if($row['id']){
			
			$sql = " UPDATE Product_Keywords "
			.		"	Set Products_id='$row2[Products_id]', Keywords_id='$row2[Keywords_id]' "
			.		"	WHERE id=$row[id]	";
		}else{
			
			//Insert statement ( a new record )
				$sql = " Insert Into Product_Keywords (Products_id, Keywords_id) "
                        .        " Values ('$row2[Products_id]', '$row2[Keywords_id]') ";
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


	static public function Delete($id){
		
		$conn = GetConnection();
			
		$sql = " DELETE FROM Keywords WHERE id=$id";
		
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
				
		return array('id'=> null, 'Products_id'=> null,'Keywords_id' => null);
		
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field
		if( !$row['Products_id'])$errors['Products_id'] = 'is required'; 		
		if( !is_numeric($row['Products_id']))$errors['Products_id'] = 'must be a number';
		
		if( !$row['Keywords_id'])$errors['Keywords_id'] = 'is required';
		if( !is_numeric($row['Keywords_id']))$errors['Keywords_id'] = 'must be a number';
				
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
