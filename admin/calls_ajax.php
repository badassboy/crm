<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM calls");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	// this is the code 

	$id = $result['id'];
	// this is the id of the records from the database

	$box_id = $result['id'];
	// this is what u informed me to do

	$check_box = '<input type="checkbox" id="chk_'.$box_id.'" value="1">';

	$trash = '<a href="delete-calls.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';

	$check_box = $check_box;
	$contact = $result['contact'];
	$related = $result['related'];
	$call_date = $result['call_date'];
	$call_time = $result['call_time'];
	$subject = $result['subject'];
	$purpose = $result['purpose'];
	

	$json[] = array(
		
		"box" => $check_box,
		"contact" => $contact,
		"related" => $related,
		"call_date" => $call_date,
		"call_time" => $call_time,
		"subject" => $subject,
		"purpose" => $purpose,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







