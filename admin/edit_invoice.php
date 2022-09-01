<?php

// require("../database.php");
require("../functions.php");
$ch = new Business();
$db = DB();
$id = "";

$msg = "";
	
	$id = $_GET['edit'];

	if (isset($id)) {


		$stmt = $db->prepare("SELECT * FROM invoice WHERE id = ?");
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $invoice_id = $row['id'];
			$invoice_number  = $row['invoice_number'];
			$customer = $row['customer'];
			$item = $row['item'];
			$invoice_date = $row['invoice_date'];
			$payment_due = $row['payment_due'];
			$validity = $row['validity'];
			$total_amount = $row['total_amount'];
			$note = $row['note'];

		}
	}else {
		echo  "no";
	}


    if(isset($_POST['update'])){

        $invoice_number = $_POST['invoice_number'];
        $customer = $_POST['customer'];
        $item = $_POST['item'];
        $invoice_date= $_POST['invoice_date'];
        $payment_due = $_POST['payment_due'];
        $validity = $_POST['validity'];
        $total_amount = $_POST['total_amount'];
        $note = $_POST['note'];
        $id = $_POST['id'];

        $updated_invoice = $ch->editInvoice($invoice_number,$customer,$item,$invoice_date,$payment_due,
        	$validity,$total_amount,$note,$id);
        if ($updated_invoice) {
        	echo "<script>alert('invoice edited successfully')</script>";
        }else {
        	echo "<script>alert('failed in editing invoice')</script>";
        }





    }


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

   <style type="text/css">
   	
   	*{
   		margin: 0;
   		padding: 0;
   		box-sizing: border-box;
   		font-family: 'Raleway', sans-serif;
   	}

   	

   	.edit-page{

   		background-color:#f2f2f2;
   		height: 800px;
   		display: flex;
   	   flex-direction: row;
   	   flex-wrap: wrap;
   	   justify-content: center;
   	   align-items: center;

   	}


   	.edit-form {
   		background-color: hsl(0, 0%, 100%);
   		height: 640px;
   		width: 50%;
   		padding-top: 3%;

   	}

   	.edit-form h3 {
   		padding-top: 7%;
   		padding-left: 30%;
   		padding-bottom: 1%;
   		font-weight: bolder;
   	}

   	 input[type=text] {
   		width: 100%;
   		/*margin-left: 30%;*/
   		font-size: 20px;
   	}

   	form label {
   		padding-left: 30%;
   		font-weight: bolder;
   	}


   	.btn-primary {
   		width: 100%;
   		height: 40px;
   		/*margin-left: 30%;*/
   		border: 2px solid ##e6e600;
   		font-weight: bolder;
   	}

   </style>

</head>
<body>

	<div class="container-fluid edit-page">

		<div class="container edit-form">
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<h3>Edit Invoice</h3>
			<form method="post" action="">

				<div class="form-group">
	<input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_number;  ?>">
					
				</div>

				<div class="form-group">
					 
			      	<input type="text" class="form-control" name="customer" value="<?php echo $customer; ?>">
			     
			    
					
					
				</div>



			  <div class="form-group">
			    <input type="text" class="form-control" name="item" value="<?php echo $item; ?>">
			    
			  </div>

			  <div class="form-group">
			  
			    <input type="text" class="form-control" name="invoice_date" value="<?php echo $invoice_date; ?>">
			  </div>


			  <div class="form-group">
			   <input type="" name="payment_due" class="form-control" value="<?php echo $payment_due; ?>">
			   
			  </div>

			  <div class="row">

			  	<div class="col">
			  		<input type="" class="form-control" name="validity" value="<?php echo $validity; ?>">
			  	</div>

			  	<div class="col">
			  		<input type="" class="form-control" name="total_amount" value="<?php echo $total_amount;  ?>">
			  	</div>
			  	
			  </div>

			  <div class="form-group">
			    
	    <textarea class="form-control" name="note" rows="3" cols="3" value="<?php echo $note; ?>"></textarea>
			  </div>


			  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $invoice_id; ?>">
			  </div>


			  <button type="submit" name="update" class="btn btn-primary">Update</button>
			</form>
		</div>
		
	</div>

	




	 <!-- jQuery CDN  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	 <!-- Bootstrap JS -->
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>