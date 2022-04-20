<?php  

include("../functions.php");
$ch = new Business();






?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	

	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/forget_password.css">

	<!-- custom google font -->
	<link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet">

	
</head>
<body>

	<div class="container-fluid forget">
			<h3>Please enter email to reset password</h3>

		<div class="container-fluid email_form">
			<form method="post"  action="admin_link.php">
			  <div class="form-group">
			    <label>Email address</label>
			    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
			   
			  </div>
			  <button type="submit" name="send_email" class="default">Submit</button>

			</form>
			
		</div>
		
	</div>


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>