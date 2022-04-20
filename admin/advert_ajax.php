<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM advert");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-advert.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$title = $result['title'];
	$venue = $result['venue'];
	$amount = $result['amount'];
	$days = $result['days'];
	

	$json[] = array(
		
		"title" => $title,
		"venue" => $venue,
		"amount" => $amount,
		"days" => $days,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







