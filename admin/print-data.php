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
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

</head>
<body>

	<div class="container interview" id="three">

                <table class="table table-bordered">

            <thead>
              <tr>
                
                <th scope="col">ID</th>
                <th scope="col">ItemName</th>
                <th scope="col">ItemNumber</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
               
                <th scope="col">ItemID</th>
              </tr>
            </thead>

            <tbody>
                 <?php 

                    $data = $ch->itemReport();
                    foreach ($data as $row) {
                        echo '

                            <tr>
                      <th scope="row">'.$row['id'].'</th>
                      <td>'.$row['itemName'].'</td>
                      <td>'.$row['itemNumber'].'</td>
                      <td>'.$row['price'].'</td>
                      <td>'.$row['quantity'].'</td>
                      <td>'.$row['itemID'].'</td>
                    </tr>



                        ';
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
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

   <script type="text/javascript">
   		 function printPage() {
        window.print();
    }
   </script>

</body>
</html>