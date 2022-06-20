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
                      <th scope="col">customerID</th>
                      <th scope="col">FullName</th>
                      <th scope="col">Status</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $customers = $ch->getCustomers();
                    foreach ($customers as $row) {
                       echo '
                              <tr>
                                <td>'.$row['customerID'].'</td>
                                <td>'.$row['fullName'].'</td>
                                <td>'.$row['status'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['address'].'</td>
                               
                              </tr>

                       ';
                     } 



                    ?>

                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                   
                  
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