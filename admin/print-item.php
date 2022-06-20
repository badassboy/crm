<?php 

include("../functions.php");
$ch = new Business();

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	 <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

    <style type="text/css">
    	button{
    		margin-left: 30%;
    		width: 50%;
    	}
    </style>
</head>
<body>


				<table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ProductID</th>
                      <th scope="col">ItemName</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Unit Price</th>
                      <th scope="col">Status</th>
                      <th scope="col">Description</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php 

                    $items = $ch->getItems();
                    foreach ($items as $row) {
                      echo '

                    <tr>
                      <td>'.$row['itemID'].'</td>
                      <td>'.$row['itemName'].'</td>
                      <td>'.$row['quantity'].'</td>
                      <td>'.$row['price'].'</td>
                      <td>'.$row['status'].'</td>
                      <td>'.$row['description'].'</td>
                    </tr>


                      ';
                    }



                    ?>


                   
                   
                  </tbody>
                </table>

        <button type="submit" class="btn btn-primary btn-lg" id="print" onclick="printPage()">Print</button>

                <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
      
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>


    <script>
        function printPage() {
            window.print();
        }
    </script>

</body>
</html>