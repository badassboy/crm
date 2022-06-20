<?php

include("../functions.php");
// $ch = new Business();
$dbh = DB();

	
	if (isset($_POST['customersExcel'])) {

		 function filterData(&$str)
	{
		// filter data before adding data to the excel
		$str = preg_replace("/\t/", "\\t", $str); 
		$str = preg_replace("/\r?\n/", "\\n", $str); 
		if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
	}


	$fileName = "codexworld".".xlsx";

			// column names for download
		$fields = array("CUSTOMERID","FULLNAME", "DATE","MOBILE","EMAIL","ADDRESS");

		// Display column names as first row
		$excelData = implode("\t", array_values($fields)) . "\n";

		// fetch records from database
		$stmt = $dbh->prepare("SELECT * FROM customer ORDER BY id ASC");
		$stmt->execute();
		// $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		while ($row = $stmt->fetch()) {
			$item_data = array($row["customerID"],$row["fullName"],$row["cust_date"],$row["phone"],$row["email"],$row["address"]);

			array_walk($item_data, 'filterData');
			$excelData .= implode("\t", array_values($item_data)) ."\n";

		}

		// headers for download
		header("Content-Disposition: attachment; filename=\"$fileName\""); 
		header("Content-Type: application/vnd.ms-excel"); 

		// render excel data.
		echo $excelData;
		exit;




	 	 
	 } 


?>