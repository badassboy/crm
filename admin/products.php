<?php 
session_start();
include("../functions.php");
$ch = new Business();

$product = "";
$status = "";
$quantity = "";
$price = "";
$category = "";
$description = "";

if (isset($_POST['item_name'])) {
	$product = $ch->testInput($_POST['item_name']);
	
}

if (isset($_POST['product_status'])) {
	$status = $ch->testInput($_POST['product_status']);
	
}

if (isset($_POST['quantity'])) {
	$quantity = $ch->testInput($_POST['quantity']);
	
}

if (isset($_POST['price'])) {
	$price = $ch->testInput($_POST['price']);

}

if (isset($_POST['prod_cat'])) {
	$category = $ch->testInput($_POST['prod_cat']);
}

if (isset($_POST['description'])) {
	$description = $ch->testInput($_POST['description']);
}


$child = $ch->addItem($product,$status,$quantity,$price,$category,$description);
	if ($child == 1) {
		// $_SESSION['msg'] = "supplier added";
		echo '<div class="alert alert-success" role="alert">Product Added</div>';
	}else {
		// $_SESSION['msg'] = "failed in adding supplier";
		echo '<div class="alert alert-danger" role="alert">Failed in adding product</div>';
		
	}









?>