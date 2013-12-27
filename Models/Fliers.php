<?php

/**
 * 
 */
class Fliers {
		
	static public function Get($id=null){
			
		if(isset($id)){
			
			return fetch_one("SELECT * FROM Fliers WHERE id=$id");//Double quotes takes the actual value of $id
		}else{
			return fetch_all("SELECT * FROM Fliers");
		}
		
		return $ret;	
		
	}
	
	static public function GetLast(){
		
		$sql = "SELECT MAX(id) FROM Fliers";
        return fetch_one($sql);    
		
	}
	
	static public function GetLike($term=null){
			
		if(isset($term)){
			
			return fetch_special("SELECT * FROM Fliers WHERE Name LIKE '%$term%'");//Double quotes takes the actual value of $id
		}else{
			return fetch_all('SELECT * FROM Fliers');
		}
		
		return $ret;	
		
	}
	
	static public function FindMatches($term=null){
			

		return fetch_all("SELECT Name, Picture_Url, Picture_Inside_Url, Picture_Back_Url FROM Fliers WHERE Name LIKE '%$term%'");//Double quotes takes the actual value of $id

	
		
	}
	

	static public function GetByCategory($Categoryid){
			
		
		
		return fetch_all("SELECT * FROM Fliers WHERE `FliersCategory_id`=$Categoryid");
				
	}
		
	static public function Delete($id){
		
		$conn = GetConnection();
		$sql = " DELETE FROM Fliers WHERE id=$id";

		$conn->query($sql);//Insert the values from the associative array $row into the current connections database with the $sql variable
	    $error = $conn->error;    //Returns the last error message (if there's one) for the most recent MySQLi function call that can succeed or fail.
	    $conn->close();
        
        if($error)
	         return array('db_error' => $error);//Create and return an array pointing to the error msg
	        else 
	          return false;
	     
	}
	
	static public function Save($row){
		
		$conn = GetConnection();
		$row2 = Fliers::Encode($row, $conn);
		
		if($row['id']){//Update field if the returned value for the id is not null
			
			$sql = " UPDATE Fliers "														//change to 2013Fall_Users_id
			.		"	Set Name='$row2[Name]', Location='$row2[Location]', Date='$row2[Date]', Description='$row2[Description]',"
			.		"	Picture_Url='$row2[Picture_Url]',	FliersCategory_id='$row2[FliersCategory_id]' "
			.		"	WHERE id=$row[id]	";
		}else{
			
			//Insert statement ( a new record )
				$sql = " Insert Into Fliers (Name, Location, Date, Description, Picture_Url, Picture_Inside_Url, Picture_Back_Url, FliersCategory_id) "
                        .        " Values ('$row2[Name]' ,'$row2[Location]', '$row2[Date]', "
                        .		 " '$row2[Description]', '$row2[Picture_Url]', '$row2[Picture_Inside_Url]' ,'$row2[Picture_Back_Url]','$row2[FliersCategory_id]') ";
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
				
		return array('id' => null, 'Name' => null, 'Location' => null, 'Date' => null , 'Description' => null,
			 		 'Picture_Url' => "/~turnera1/2013/Resources/images/placeholder.png", 'Picture_Inside_Url' => null ,'Picture_Back_Url' => null ,  'FliersCategory_id' => null);
		
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field
		
		if( !$row['Name'])$errors['Name'] = 'is required'; 	
		if( !$row['Picture_Url'])$errors['Picture_Url'] = 'is required'; 	
						
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
	