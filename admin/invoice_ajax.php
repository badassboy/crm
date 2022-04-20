<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM invoice");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Send Email</button>
	';
	$edit = '<a href="edit_invoice.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';



	

	$firstName = $result['firstName'];
	$lastName = $result['lastName'];
	$email = $result['email'];
	$invoice_date = $result['invoice_date'];
	$travel_country = $result['travel_country'];
	$deposit = $result['deposit'];
	$balance = $result['balance'];
	

	$json[] = array(
		
		"first_name" => $firstName,
		"last_name" => $lastName,
		"email" => $email,
		"invoice_date" => $invoice_date,
		"travel_country" => $travel_country,
		"deposit" => $deposit,
		"balance" => $balance,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







