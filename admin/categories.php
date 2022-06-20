<?php 
session_start();
include("../functions.php");
$ch = new Business();

$cat_code = "";
$cat_name = "";
$cat_desc = "";
$cate_date = "";

if (isset($_POST['cat_code'])) {
	$cat_code = $ch->testInput($_POST['cat_code']);
	// echo $child_name;
}

if (isset($_POST['cat_name'])) {
	$cat_name = $ch->testInput($_POST['cat_name']);
	// echo $child_age;
}

if (isset($_POST['cat_desc'])) {
	$cat_desc = $ch->testInput($_POST['cat_desc']);
	// echo $gender;
}

if (isset($_POST['cat_date'])) {
	$cate_date = $ch->testInput($_POST['cat_date']);

}

$child = $ch->addCategory($cat_code,$cat_name,$cat_desc,$cate_date);
	if ($child == 1) {
		// $_SESSION['msg'] = "supplier added";
		echo '<div class="alert alert-success" role="alert">Category Added</div>';
	}else {
		// $_SESSION['msg'] = "failed in adding supplier";
		echo '<div class="alert alert-danger" role="alert">Failed in adding category</div>';
		
	}









?>