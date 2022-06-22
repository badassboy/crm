<?php 
// session_start();
include("../functions.php");
$ch = new Business();

$customer = "";
$product = "";
$quantity = "";
$payment_method = "";
$return_date = "";

if (isset($_POST['cust_name'])) {
	$customer = $ch->testInput($_POST['cust_name']);
	// echo $cust_name;
	
}

if (isset($_POST['return_product'])) {
	$product = $ch->testInput($_POST['return_product']);
	// echo $product;
	// echo $child_age;
}

if (isset($_POST['return_quantity'])) {
	$quantity = $ch->testInput($_POST['return_quantity']);
	// echo $quantity;
	// echo $gender;
}

if (isset($_POST['payment'])) {
	$payment_method = $ch->testInput($_POST['payment']);
	// echo $payment_method;
	// echo $gender;
}



if (isset($_POST['return_date'])) {

	$return_date = $ch->testInput($_POST['return_date']);
	// echo $return_date;

}

$child = $ch->salesReturns($customer,$product,$quantity,$payment_method,$return_date);
	if ($child == 1) {
		// $_SESSION['msg'] = "supplier added";
		echo '<div class="alert alert-success" role="alert">Sales Return Added</div>';
	}else {
		// $_SESSION['msg'] = "failed in adding supplier";
		echo '<div class="alert alert-danger" role="alert">Failed in adding sales return</div>';
		
	}









?>