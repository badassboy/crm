<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM contact");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-advert.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Send Email</button>
			  ';



	

	$firstName = $result['firstName'];
	$lastName = $result['lastName'];
	$email = $result['email'];
	$city = $result['location'];
	

	$json[] = array(
		
		"first_name" => $firstName,
		"last_name" => $lastName,
		"email" => $email,
		"city" => $city,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







