<?php 
session_start();
include("../functions.php");
$ch = new Business();

$supplier_name = "";
$supplier_address = "";
$supplier_email = "";
$supplier_contact = "";
$supplier_date = "";

if (isset($_POST['sup_name'])) {
	$supplier_name = $ch->testInput($_POST['sup_name']);
	// echo $child_name;
}

if (isset($_POST['sup_address'])) {
	$supplier_address = $ch->testInput($_POST['sup_address']);
	// echo $child_age;
}

if (isset($_POST['sup_email'])) {
	$supplier_email = $ch->testInput($_POST['sup_email']);
	// echo $gender;
}

if (isset($_POST['sup_contact'])) {
	$supplier_contact = $ch->testInput($_POST['sup_contact']);

}

if (isset($_POST['sup_date'])) {
	$supplier_date = $ch->testInput($_POST['sup_date']);
}


$child = $ch->addSupplier($supplier_name,$supplier_address,$supplier_email,$supplier_contact,$supplier_date);
	if ($child == 1) {
		// $_SESSION['msg'] = "supplier added";
		echo '<div class="alert alert-success" role="alert">Supplier Added</div>';
	}else {
		// $_SESSION['msg'] = "failed in adding supplier";
		echo '<div class="alert alert-danger" role="alert">Failed in adding supplier</div>';
		
	}









?>