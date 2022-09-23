<?php 
session_start();
include("../functions.php");
$ch = new Business();

$customer_name = "";
$phone = "";
$whatsapp = "";
$email = "";
$location = "";
$current_date = "";

if (isset($_POST['cust_name'])) {
	$customer_name = $ch->testInput($_POST['cust_name']);
	
}

if (isset($_POST['cust_phone'])) {
	$phone = $ch->testInput($_POST['cust_phone']);
	// echo $child_age;
}

if (isset($_POST['whatsapp'])) {
	$whatsapp = $ch->testInput($_POST['whatsapp']);
	// echo $gender;
}

if (isset($_POST['cust_email'])) {
	$email = $ch->testInput($_POST['cust_email']);

}

if (isset($_POST['location'])) {
	$location = $ch->testInput($_POST['location']);
}


if (isset($_POST['cust_date'])) {
	$current_date = $ch->testInput($_POST['cust_date']);
}



$child = $ch->customer($customer_name,$phone,$whatsapp,$email,$location,$current_date);
	if ($child == 1) {
		// $_SESSION['msg'] = "supplier added";
		echo '<div class="alert alert-success" role="alert">Sales Added</div>';
	}else {
		// $_SESSION['msg'] = "failed in adding supplier";
		echo '<div class="alert alert-danger" role="alert">Failed in adding sales</div>';
		
	}









?>