<?php

/**
 * 
 */
class FrontEnd {
	
	static public function Get($id=null){
			
		 if(isset($id)){
                        $sql = "        SELECT U.*, K.Name as UserType_Name
                                                FROM Users U
                                                        Join Keywords K ON U.`UserType`=K.id
                                                WHERE U.id=$id
                                        ";
                        return fetch_one($sql);                        
                }else{
                        $sql = "        SELECT U.*, K.Name as UserType_Name
                                                FROM Users U
                                                        Join Keywords K ON U.`UserType`=K.id
                                        ";
                        return fetch_all($sql); 
                }
	}
	
	static public function GetUser($username){

		$sql = "SELECT FirstName, LastName From Users WHERE FirstName='$username' ";
		echo $sql;
            return fetch_one($sql);                        
	}
	
	
	static public function GetSelectListFor($id){
			
		
		return fetch_all("SELECT FirstName, LastName FROM Users WHERE `id`=$id ");
	
	}
	
	static public function Save($row){
		
		$conn = GetConnection();
		$row2 = Users::Encode($row, $conn);
		
		if($row['id']){
			
			$sql = " UPDATE Users "
			.		"	Set FirstName='$row2[FirstName]', LastName='$row2[LastName]', Password='$row2[Password]',"
			.		"   UserType='$row2[UserType]' "
			.		"	WHERE id=$row[id]	";
		}else{
			
			//Insert statement ( a new record )
			$sql = " Insert Into Users (FirstName, LastName, Password, UserType) "
            .      " Values ('$row2[FirstName]', '$row2[LastName]', '$row2[Password]', '$row2[UserType]') ";
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
		$sql = " Delete From Users Where id=$id ";
					
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
				
		return array('id'=> null, 'FirstName' => null , 'LastName' => null, 'Password' => null, 'UserType' => null);
		
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field/element
		if( !$row['FirstName'])$errors['FirstName'] = 'is required'; 		
		if( !$row['LastName'])$errors['LastName'] = 'is required';
		if( !is_numeric($row['UserType']))$errors['UserType'] = 'must be a number';
		if( !$row['UserType'])$errors['UserType'] = 'id required';
				
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
