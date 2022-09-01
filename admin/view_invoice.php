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
			$customer = $row['company'];
			$item = $row['item'];
			$invoice_date = $row['invoice_date'];
			$payment_due = $row['payment_due'];
			$validity = $row['validity'];
			$amount = $row['amount'];
			$total_amount = $row['total_amount'];
			$note = $row['note'];

		}
	}else {
		echo  "no";
	}

	// email invoice
	if (isset($_POST['invoicing'])) {

      // service provider details.

      $details = $ch->getCompanyDetails();
      foreach ($details as $row) {
         print($row);
      }


         


      


		$from = $_POST['provider_email'];
		$to = $_POST['cust_email'];
		$subject = $_POST['subject'];
		$message = '

			<html>
			<body>

				<div class="col-md-12">
      <div class="invoice">
         
         <div class="invoice-header">
            <div class="invoice-from">
               <small>from</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse"><?php echo $Company;?></strong><br>
                  Street Address<br>
                  City, Zip Code<br>
                  Phone: 123456<br>
                  Fax:6666
               </address>
            </div>
            <div class="invoice-to">
               <small>to</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">Company Name</strong><br>
                  Street Address<br>
                  City, Zip Code<br>
                  Phone: (123) 456-7890<br>
                  Fax: (123) 456-7890
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice / July period</small>
               <div class="date text-inverse m-t-5"><?php echo $invoice_date; ?></div>
               <div class="invoice-detail">
                  <p>Invoice Number:<?php echo $invoice_number?></p>
                 
               </div>
            </div>
         </div>
        
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>TASK DESCRIPTION</th>
                        <th class="text-center" width="10%">AMOUNT</th>
                       
                        <th class="text-right" width="20%">TOTAL AMOUNT</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>

                           <span class="text-inverse"><?php echo $item; ?></span><br>
                           <small><?php echo $note; ?></small>
                        </td>

                        <td class="text-center"><?php echo $amount; ?></td>
                       
                        <td class="text-right"><?php echo $total_amount; ?></td>
                     </tr>

                    

                    
                  </tbody>
               </table>
           
            <div class="invoice-price">
               <div class="invoice-price-left">
                  
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL</small> <span class="f-w-600"><?php echo $total_amount; ?></span>
               </div>
            </div>
          
         </div>
         
      </div>
   </div>

			<body>
			</html>

			


		';



		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		$send_email = mail($to, $subject, $message, implode("\r\n", $headers));
		if ($send_email) {
			$msg = "invoice sent";
		}else{
			$msg = "failed to send invoice";
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

   	.invoice {
    background: #fff;
    padding: 20px
}

.invoice-company {
    font-size: 20px
}

.invoice-header {
    margin: 0 -20px;
    background: #f0f3f4;
    padding: 20px
}

.invoice-date,
.invoice-from,
.invoice-to {
    display: table-cell;
    width: 1%
}

.invoice-from,
.invoice-to {
    padding-right: 20px
}

.invoice-date .date,
.invoice-from strong,
.invoice-to strong {
    font-size: 16px;
    font-weight: 600
}

.invoice-date {
    text-align: right;
    padding-left: 20px
}

.invoice-price {
    background: #f0f3f4;
    display: table;
    width: 100%
}

.invoice-price .invoice-price-left,
.invoice-price .invoice-price-right {
    display: table-cell;
    padding: 20px;
    font-size: 20px;
    font-weight: 600;
    width: 75%;
    position: relative;
    vertical-align: middle
}

.invoice-price .invoice-price-left .sub-price {
    display: table-cell;
    vertical-align: middle;
    padding: 0 20px
}

.invoice-price small {
    font-size: 12px;
    font-weight: 400;
    display: block
}

.invoice-price .invoice-price-row {
    display: table;
    float: left
}

.invoice-price .invoice-price-right {
    width: 25%;
    background: #2d353c;
    color: #fff;
    font-size: 28px;
    text-align: right;
    vertical-align: bottom;
    font-weight: 300
}

.invoice-price .invoice-price-right small {
    display: block;
    opacity: .6;
    position: absolute;
    top: 10px;
    left: 10px;
    font-size: 12px
}

.invoice-footer {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-size: 10px
}

.invoice-note {
    color: #999;
    margin-top: 80px;
    font-size: 85%
}

.invoice>div:not(.invoice-footer) {
    margin-bottom: 20px
}

.btn.btn-white, .btn.btn-white.disabled, .btn.btn-white.disabled:focus, .btn.btn-white.disabled:hover, .btn.btn-white[disabled], .btn.btn-white[disabled]:focus, .btn.btn-white[disabled]:hover {
    color: #2d353c;
    background: #fff;
    border-color: #d9dfe3;
}



   


  

   </style>

</head>
<body>

	<div class="container-fluid edit-page">

      <?php

      $id = $_GET['edit'];

      $details = $ch->getCompanyDetails();
      foreach ($details as $row) {
         $company = $row['company'];
         $address = $row['address'];
         $mobile = $row['mobile'];
      }

      $customerDetails = $ch->getCustomerDetails($id);
      // var_dump($customerDetails);
      // echo(count($customerDetails));
      foreach ($customerDetails as $rows) {
         // $customer_company = $rows['company'];
         $customer_mobile = $rows['mobile'];
         // echo $customer_mobile;
         $customer_location = $rows['location'];
      }



       ?>


		<div class="container">
   <div class="col-md-12">
      <div class="invoice">
         
         <div class="invoice-header">
            <div class="invoice-from">
               <small>from</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse"><?php echo $company; ?></strong><br>
                  <?php echo $address; ?><br>
                  <?php echo $address; ?><br>
                  Phone: <?php echo $mobile;  ?><br>
                  Mobile: <?php echo $mobile; ?>
               </address>
            </div>
            <div class="invoice-to">
               <small>to</small>
               <address class="m-t-5 m-b-5">
                  <strong class="text-inverse">hi</strong><br>
                  Street Address<br>
                  <?php echo $customer_location; ?><br>
                  Phone: <?php echo $customer_mobile; ?><br>
                  Fax: (123) 456-7890
               </address>
            </div>
            <div class="invoice-date">
               <small>Invoice / July period</small>
               <div class="date text-inverse m-t-5"><?php echo $invoice_date; ?></div>
               <div class="invoice-detail">
                  <p>Invoice Number:<?php echo $invoice_number?></p>
                 
               </div>
            </div>
         </div>
         <!-- end invoice-header -->
         <!-- begin invoice-content -->
         <div class="invoice-content">
            <!-- begin table-responsive -->
            <div class="table-responsive">
               <table class="table table-invoice">
                  <thead>
                     <tr>
                        <th>TASK DESCRIPTION</th>
                        <th class="text-center" width="10%">AMOUNT</th>
                       
                        <th class="text-right" width="20%">TOTAL AMOUNT</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
                        <td>

                           <span class="text-inverse"><?php echo $item; ?></span><br>
                           <small><?php echo $note; ?></small>
                        </td>

                        <td class="text-center"><?php echo $amount; ?></td>
                       
                        <td class="text-right"><?php echo $total_amount; ?></td>
                     </tr>

                    

                    
                  </tbody>
               </table>
            </div>
            <!-- end table-responsive -->
            <!-- begin invoice-price -->
            <div class="invoice-price">
               <div class="invoice-price-left">
                  
               </div>
               <div class="invoice-price-right">
                  <small>TOTAL</small> <span class="f-w-600"><?php echo $total_amount; ?></span>
               </div>
            </div>
            <!-- end invoice-price -->
         </div>
         
      </div>
   </div>

   <!-- button trigger modal -->
   	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Send invoice
</button>


</div>

</div>

<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Send this invoice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      	<form method="post">

  <div class="form-group">
    <label for="exampleInputEmail1">From</label>
    <input type="email" class="form-control" name="provider_email">
    
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">To</label>
    <input type="email" class="form-control" name="cust_email" placeholder="Customer Email" required>
    
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Subject</label>
    <input type="text" class="form-control" name="subject" value="Invoice from payment reminder">
  </div>

 

  <button type="submit" class="btn btn-primary" name="invoicing">Submit</button>
</form>


       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>




	




	 <!-- jQuery CDN  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	 <!-- Bootstrap JS -->
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>