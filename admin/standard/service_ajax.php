<?php

include("../../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM service");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-advert.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';


	$name = $result['name'];
	$rate = $result['rate'];
	$description = $result['description'];
	

	$json[] = array(
		
		"id" => $id,
		"name" => $name,
		"rate" => $rate,
		"description" => $description,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







