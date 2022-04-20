<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM leads");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-lead.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$name = $result['fullName'];
	$phone = $result['phone'];
	$lead_source = $result['lead_source'];
	$email = $result['email'];
	$rating = $result['rating'];
	

	$json[] = array(
		
		"name" => $name,
		"phone" => $phone,
		"lead_source" => $lead_source,
		"email" => $email,
		"rating" => $rating,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







