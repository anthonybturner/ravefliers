<?php

/**
 * 
 */
class Home {
	
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
		//User exist
		if(Users::DoesExist($row)){
				
			return;
		}else{
								
			//Create a blank or simple password for a  guest registered user
			//This is for guest orders.
			$row['Password'] = '';
			$row['UserType'] = 11;//Guest usertype
			$errors = Users::Save($row);
		}
		
		if(!$errors){
			
			//Get the User's id which was just created
			//Create Address
			$id = Users::GetId($row['FirstName'], $row['LastName']);
			if( isset($id)){
				$address_row = Addresses::Blank();			
				
				$address_row['City'] = $row['City']; 
				$address_row['State'] = $row['State'];
				$address_row['Zipcode'] = $row['Zipcode'];
				$address_row['Users_id'] = $id['id'];
				$address_row['AddressType'] = 7;
				$errors = Addresses::Save($address_row);
					
			}else{
				echo "errrors";
				print_r($errors);
				//No id so take action to abort
			}
			
			if( !$errors ){
				//Address was saved
				//Set Order information  
				$address_id = Addresses::GetByUserId($address_row['Users_id']);
				$order_row['id'] = null;
				$order_row['Addresses_id'] = $address_id['id'];
				$order_row['User_id'] = $address_row['Users_id'];
				$errors = Orders::Save($order_row);

			}else{
				
				print_r($errors);
				//Errors occured possibly abort
			}
			
			if( !$errors ){
				//Order was saved
				//Set Order item information
				$orders_id = Orders::GetByUserId($order_row['User_id']);//The id for a given User's order
				$model  = $_SESSION['cart'];
				//Populate the model with items from each id
				foreach ($model as $key => $id) {
				
					//$orders_row['id'] = null;
					$item = Products::Get($id);					
					$orders_item_row['id'] = null;
					$orders_item_row['Name'] = $item['Name'];
					$orders_item_row['Orders_id'] = $orders_id['id'];
					$orders_item_row['Products_id'] = $item['id'];
					$errors = OrdersItems::Save($orders_item_row);
				} 
				
			}else{
					
				print_r($errors);
				//Errors maybe abort
			}
			
			if( !$errors){
				echo "Order submitted!";
			}		
		}
	}
	
	
	static public function EmptyCart(){
			
			$cart  = $_SESSION['cart'];
			if(isset($cart)){
				
				foreach ($cart as $key => $id) {
					
					unset($_SESSION['cart'][$key]);
	
				} 
				
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
				
		return array('id'=> null, 'FirstName' => null , 'LastName' => null, 
		'Address' => null, 'Address2' => null, 'City' => null, 'State' => null,
		'Zipcode' => null, 'PhoneNumber' => null, 'Email' => null);
	}
	
	
	static public function CheckoutBlank(){
				
		return array('id'=> null, 'Cardholder' => null , 'CardNumber' => null, 
		'ExpirationDate' => null, 'SecCode' => null);
	}
	
	static public function Validate($row){

		$errors = array();//Only one error per field/element
		if( !$row['FirstName'])$errors['FirstName'] = 'is required'; 		
		if( !$row['LastName'])$errors['LastName'] = 'is required';
		if( !$row['Address'])$errors['Address'] = 'is required';
		if( !$row['Address2'])$errors['Address2'] = 'is required';
		if( !$row['City'])$errors['City'] = 'is required';
		if( !$row['State'])$errors['State'] = 'is required';
		if( !$row['Zipcode'])$errors['Zipcode'] = 'is required';
		if( !$row['PhoneNumber'])$errors['PhoneNumber'] = 'is required';
		if( !$row['Email'])$errors['Email'] = 'is required';
				
		return count($errors) ? $errors : null;
	}

	static public function ValidateCreditInfo($row){

		$errors = array();//Only one error per field/element
		if( !$row['Cardholder'])$errors['Cardholder'] = 'is required'; 		
		if( !$row['CardNumber'])$errors['CardNumber'] = 'is required';
		if( !$row['ExpirationDate'])$errors['ExpirationDate'] = 'is required';
		if( !$row['SecCode'])$errors['SecCode'] = 'is required';
	
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
