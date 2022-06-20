<?php

include("../../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM service_orders");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$print = '<a href="print-service.php?print='.$id.'">
				<i class="fa fa-print" aria-hidden="true"></i>
			  </a>';
	// $edit = '<a href="edit-latest.php?edit='.$id.'">
	// 			<i class="fa fa-pencil" aria-hidden="true"></i>
	// 		  </a>';


	$order_date = $result['order_date'];
	$client = $result['client'];
	$mobile = $result['mobile'];
	$service = $result['service'];
	$rate = $result['rate'];
	$payment_type = $result['paymentType'];
	$payment_status = $result['status'];
	

	$json[] = array(
		
		"id" => $id,
		"order_date" => $order_date,
		"client" => $client,
		"mobile" => $mobile,
		"service" => $service,
		"rate" => $rate,
		"payment_type" => $payment_type,
		"payment_status" => $payment_status,
		"print" => $print
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







