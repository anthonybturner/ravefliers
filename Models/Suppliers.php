<?php

/**
 * 
 */
class Suppliers {
	
	static public function Get($id=null){
			
		
		if(isset($id)){
			
			return fetch_one("SELECT * FROM Suppliers WHERE id=$id");//Double quotes takes the actual value of $id
		}else{
			return fetch_all('SELECT * FROM Suppliers');
		}
		
		return $ret;	
		
	}
	
	static public function Delete($id){
		
		$conn = GetConnection();
			
		$sql = " DELETE FROM Suppliers WHERE id=$id";
		
		$conn->query($sql);//Insert the values from the associative array $row into the current connections database with the $sql variable
        $error = $conn->error;    //Returns the last error message (if there's one) for the most recent MySQLi function call that can succeed or fail.
                   
        $conn->close();
        
        if($error){
                return array('db_error' => $error);//Create and return an array pointing to the error msg
        }else {
                return false;
        }	
	}
	
	static public function Save($row){
		
		$conn = GetConnection();
		$row2 = Suppliers::Encode($row, $conn);
		
		if($row['id']){//Update field if the returned value for the id is not null
			
			$sql = " UPDATE Suppliers "														//change to 2013Fall_Users_id
			.		"	Set Name='$row2[Name]' WHERE id=$row[id]";
		}else{
			
			//Insert statement ( a new record )
				$sql = " Insert Into Suppliers (Name) "
                        .        " Values ('$row2[Name]') ";
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
				
		return array('id' => null, 'Name' => null);
		
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field
		if( !$row['Name'])$errors['Name'] = 'is required'; 		
				
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
