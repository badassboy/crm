<?php 
session_start();
include("../functions.php");
$ch = new Business();

$customer_name = "";
$sales_date = "";
$payment = "";
$category = "";
$product = "";
$quantity = "";
$unit_price = "";

if (isset($_POST['customer'])) {
	$customer_name = $ch->testInput($_POST['customer']);
	
}

if (isset($_POST['sales_date'])) {
	$sales_date = $ch->testInput($_POST['sales_date']);
	// echo $child_age;
}

if (isset($_POST['payment'])) {
	$payment = $ch->testInput($_POST['payment']);
	// echo $gender;
}

if (isset($_POST['category'])) {
	$category = $ch->testInput($_POST['category']);

}

if (isset($_POST['product'])) {
	$product = $ch->testInput($_POST['product']);
}


if (isset($_POST['quantity'])) {
	$quantity = $ch->testInput($_POST['quantity']);
}

if (isset($_POST['unit_price'])) {
	$unit_price = $ch->testInput($_POST['unit_price']);
}

$child = $ch->sales($customer_name,$sales_date,$payment,$category,$product,$quantity,$unit_price);
	if ($child == 1) {
		// $_SESSION['msg'] = "supplier added";
		echo '<div class="alert alert-success" role="alert">Sales Added</div>';
	}else {
		// $_SESSION['msg'] = "failed in adding supplier";
		echo '<div class="alert alert-danger" role="alert">Failed in adding sales</div>';
		
	}









?>