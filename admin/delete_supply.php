<?php
include("../functions.php");
$ch = new Business();

$id = $_GET['delete_id'];
$remove = $ch->deleteSupplier($id);



?>