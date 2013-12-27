<?php
include_once('_password.php');
include_once dirname(__FILE__).'/../Models/Auth.php';
include_once dirname(__FILE__).'/../Models/Keywords.php';
include_once dirname(__FILE__).'/../Models/Users.php';
include_once dirname(__FILE__).'/../Models/FliersKeywords.php';
include_once dirname(__FILE__).'/../Models/Fliers.php';
include_once dirname(__FILE__).'/../Models/FliersCategory.php';
include_once dirname(__FILE__).'/../Models/ContactMethods.php';
include_once dirname(__FILE__).'/../Models/PhoneNumbers.php';
include_once dirname(__FILE__).'/../Models/Addresses.php';
include_once dirname(__FILE__).'/../Models/Home.php';

session_start();

function GetConnection(){
	
	global $sql_password;
	
	$conn = new mysqli('sql307.byethost10.com', 'b10_14157757', $sql_password, 'b10_14157757_turnera_db');
	
	return $conn;
}

function fetch_all($sql){
		
	
	$ret = array();
	$conn = GetConnection();
	$result = $conn->query($sql);//Send a query with the given $sql statement/arguments
	
	echo $conn->error;
	
	while( $rs = $result->fetch_assoc()){
		
		$ret[] = $rs;//Adding on to the end of collection
	}
	

	$conn->close();
	return $ret;	
	
}


function fetch_one($sql){
		
	$arr = fetch_all($sql);//Fetch all columns and then return only the first
	return $arr[0];//Return the first

}

function fetch_one_as_string($sql){
		
	$arr = fetch_all($sql);//Fetch all columns and then return only the first
	return $arr['id'];//Return the first

}


function fetch_special($sql){
		
	$ret = array();
	$conn = GetConnection();
	$result = $conn->query($sql);//Send a query with the given $sql statement/arguments
	echo $conn->error;
	
	$conn->close();
	return $result;
		
}