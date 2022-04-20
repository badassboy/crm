<?php

require("../functions.php");
$ch = new Church();
$dbh = DB();

if (!empty($_GET['id'])) 
{

	$id = $_GET['id'];
	$verified = $ch->confirmEmail($id);

	if ($verified) {
		echo '<div class="alert alert-success" role="alert">Email Confirmed</div>';
		sleep(10);
		header("Location:login.php");
		exit();
	}else {
		echo '<div class="alert alert-danger" role="alert">Email confirmation failed</div>';
	}
	
	

		
}


?>