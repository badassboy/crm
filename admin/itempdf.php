<?php 
require_once("fpdf.php");
include("../database.php");
$dbh = DB();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);




if (isset($_POST['itemspdf'])) 
{

	
	$stmt = $dbh->prepare("SELECT itemID,itemName,status,quantity,price,stock,description FROM item ORDER BY id ASC");
	$stmt->execute();
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


	foreach ($data as $datas) {
		$pdf->SetFont('Arial','',12);
		$pdf->Ln();

		foreach ($datas as $arr) {
			$pdf->Cell(40,12,$arr,1);
		}
	}


	// $heading = array("ITEMID","ITEMNAME","QUANTITY","PRICE","STATUS","STOCK");
	// // echo(gettype($heading));
	// // echo(count($heading));
	// foreach($heading as $row) {
	// 	$pdf->SetFont('Arial','',12);
	// 	$pdf->Ln();

	// 	$itemsArr = explode(" ", $row);
	// 	if (is_array($itemsArr)) {
	// 		foreach ($itemsArr as $arr) {
	// 			$pdf->Cell(40,12,$arr,1);
	// 		}

	// 	}else {
	// 		echo "array does not exist";
	// 	}
		
	// }



	$pdf->Output();


}


?>