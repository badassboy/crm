<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM deals");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-deals.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$dealName = $result['dealName'];
	$contactName = $result['contactName'];
	$deal_type = $result['dealType'];
	$amount = $result['amount'];
	$revenue = $result['revenue'];
	$closing_date = $result['closing_date'];
	

	$json[] = array(
		
		"dealName" => $dealName,
		"contactName" => $contactName,
		"dealType" => $deal_type,
		"amount" => $amount,
		"revenue" => $revenue,
		"closingDate" => $closing_date,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







