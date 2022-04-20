<?php 
include("../functions.php");
$ch = new Business();

if (isset($_GET['trash'])) {
	$id = $_GET['trash'];

	$deleted = $ch->deleteTask($id);
	if ($deleted) {
		echo '<div class="alert alert-secondary" role="alert">Delete Successful</div>';
	}else{

		echo '<div class="alert alert-danger" role="alert">Delete Failed</div>';
	}
}


?>