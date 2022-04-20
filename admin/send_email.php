<?php

require("../database.php");
$db = DB();
$id = "";

$msg = "";
	
	$id = $_GET['trash'];

	if (isset($id)) {


		$stmt = $db->prepare("SELECT * FROM invoice WHERE id = ?");
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $invoice_id = $row['id'];
			// $title  = $row['title'];
			// $description = $row['full_description'];
		}
	}else {
		echo  "no";
	}


    if(isset($_POST['send'])){

        $from = $_POST['your_email'];
        $to = $_POST['cust_email'];
        $subject = $_POST['subject'];
        $note = $_POST['note'];

        $mail_send = mail($to, $subject, $note);
        if ($mail_send) {
        	$msg = '<div class="alert alert-success" role="alert">Email Sent</div>';
        }else {
        	$msg = '<div class="alert alert-danger" role="alert">Failed in sending message</div>';
        }
        // $id = $_POST['id'];

  //       $stmt = $db->prepare("UPDATE invoice SET travel_country = ?,next_of_kin = ?,travel_purpose = ?,note =?
  //        WHERE id = ?");
		// $stmt->execute([$travel_country,$next_of_kin,$travel_purpose,$note,$id]);
		// $row = $stmt->rowCount();
		// if ($row>0) {
		// 	$msg = '<div class="alert alert-success" role="alert">Invoice Updated</div>';
		// }else {
		// 	$msg =  '<div class="alert alert-danger" role="alert">Failed to update invoice</div>';
		// }


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
			<h3>Send Email</h3>
			<form method="post" action="">

			 
			  <div class="form-group">
			    <label for="exampleInputEmail1">From</label>
			    <input type="email" name="your_email" class="form-control" placeholder="Your Email" required>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">To</label>
			    <input type="email" name="cust_email" class="form-control" placeholder="Customer Email" required>
			  </div>

			   <div class="form-group">
			    <label for="exampleInputEmail1">Subject</label>
			    <input type="text" name="subject" class="form-control" placeholder="Subject" required>
			  </div>


			 

			  <div class="form-group">
			    <label for="exampleInputEmail1">Note</label>
			    <textarea class="form-control" name="note" rows="3" cols="3" placeholder="Message"></textarea>
			  </div>


			 <!--  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $invoice_id; ?>">
			  </div> -->


			  <button type="submit" name="send" class="btn btn-primary">Send Mail</button>
			</form>
		</div>
		
	</div>

	




	 <!-- jQuery CDN  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	 <!-- Bootstrap JS -->
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>