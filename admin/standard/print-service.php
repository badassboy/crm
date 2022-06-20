<?php  

include("../../functions.php");
$ch = new Business();

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">

</head>
<body>

	<div class="container interview" id="three">

                <table class="table table-bordered">

            <thead>
              <tr>
                
                <th scope="col">ID</th>
                <th scope="col">OrderDate</th>
                <th scope="col">Client</th>
                <th scope="col">Service</th>
                <th scope="col">Rate</th>
                <th scope="col">PaidAmount</th>
                <th scope="col">DueAmount</th>
                <th scope="col">Payment Type</th>
                <th scope="col">Payment Status</th>
            
              </tr>
            </thead>

            <tbody>
                 <?php 

                 if (isset($_GET['print'])) {
                     
                     $id = $_GET['print'];

                      $data = $ch->manageOrders($id);
                    foreach ($data as $row) {
                        echo '

                            <tr>
                      <th scope="row">'.$row['id'].'</th>
                      <td>'.$row['order_date'].'</td>
                      <td>'.$row['client'].'</td>
                      <td>'.$row['service'].'</td>
                      <td>'.$row['rate'].'</td>
                      <td>'.$row['paidAmount'].'</td>
                      <td>'.$row['dueAmount'].'</td>
                      <td>'.$row['paymentType'].'</td>
                      <td>'.$row['status'].'</td>
                    </tr>



                        ';
                    }





                    }

                   

				?>

                    

            </tbody>

            </table>

            <form method="" action="" target="_new" class="form-inline">
               <div class="form-group">
                  
                  <button type="submit" id="print" class="btn btn-primary"
                  onclick="printPage()">Print Data</button>
               </div>
            </form>

               
                
            </div>

          

            

               
             

            <!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>




 <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>

   <script type="text/javascript">
   		 function printPage() {
        window.print();
    }
   </script>

</body>
</html>