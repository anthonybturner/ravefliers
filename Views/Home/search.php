<? 

$json = '[';
$first = true;
while($row = $model->fetch_assoc() ){
	
    if (!$first){
    	 $json .=  ','; 
	}   
    else {
    	 $first = false; 
	}
	
    $json .= '{"value":"'.$row['Name'].'"}';
}
$json .= ']';
echo($json);
