<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM invoice");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	// $trash = '
	// 		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Send Email</button>
	// ';

	
	

	$trash = '<a href="" data-toggle="modal" data-target="#staticBackdrop">
				<i class="fa fa-bell" aria-hidden="true"></i>
			  </a>';

  $edit = '<a href="edit_invoice.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';

	$view = '<a href="view_invoice.php?edit='.$id.'">
				<i class="fa fa-eye" aria-hidden="true"></i>
			  </a>';

	$invoice_number = $result['invoice_number'];
	$customer = $result['company'];
	$item = $result['item'];
	$invoice_date = $result['invoice_date'];
	$payment_due = $result['payment_due'];
	$total_amount = $result['total_amount'];
	

	$json[] = array(
		
		"invoice_number" => $invoice_number,
		"customer" => $customer,
		"item" => $item,
		"invoice_date" => $invoice_date,
		"payment_due" => $payment_due,
		"total_amount" => $total_amount,
		"edit" => $edit,
		"view" => $view,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







