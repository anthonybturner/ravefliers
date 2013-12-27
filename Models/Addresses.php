<?php

/**
 * 
 */
class Addresses {
	
	static public function Get($id=null){
			
		if(isset($id)){
			

            $sql = "        SELECT A.*, K.Name as AddressType_Name
                                    FROM Addresses A
                                            Join Keywords K ON A.`AddressType`=K.id
                                    WHERE A.id=$id
                            ";
            return fetch_one($sql);                        
               
		}else{
			 $sql = "        SELECT A.*, K.Name as AddressType_Name
                                                FROM Addresses A
                                                        Join Keywords K ON A.`AddressType`=K.id
                                        ";
                        return fetch_all($sql); 
		}
		
		return $ret;	
		
	}
	
	static public function GetByUserId($id){
			
		
        $sql = "        SELECT id FROM Addresses WHERE Users_id=$id";
        return fetch_one($sql);  	
		
	}
	
	
	
	 
	
	
	static public function Delete($id){
		
		$conn = GetConnection();
			
		$sql = " DELETE FROM Addresses WHERE id=$id";
		
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
		$row2 = Addresses::Encode($row, $conn);
		
		if($row['id']){//Update field if the returned value for the id is not null
			
			$sql = " UPDATE Addresses "														
			.		"	Set City='$row2[City]', State='$row2[State]', Zipcode='$row2[Zipcode]', "
			.		"	Users_id='$row2[Users_id]', AddressType='$row2[AddressType]' "
			.		"	WHERE id=$row[id]	";
		}else{
			
			//Insert statement ( a new record )
				$sql = " Insert Into Addresses (City, State, Zipcode, Users_id, AddressType) "
                        .        " Values ('$row2[City]', '$row2[State]', '$row2[Zipcode]', '$row2[Users_id]', '$row2[AddressType]') ";
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
				
		return array('id' => null, 'City' => null , 'State' => null, 'Zipcode' => null, 'Users_id' => null, 'AddressType' => null);
		
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field
		if( !$row['City'])$errors['City'] = 'is required'; 		
		if( !$row['State'])$errors['State'] = 'is required';
		if( !$row['Zipcode'])$errors['Zipcode'] = 'is required';
		if( !$row['Users_id'])$errors['Users_id'] = 'id required';
		if( !is_numeric($row['Users_id']))$errors['Users_id'] = 'must be a number';
		if( !$row['AddressType'])$errors['AddressType'] = 'id required';
		if( !is_numeric($row['AddressType']))$errors['AddressType'] = 'must be a number';
				
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