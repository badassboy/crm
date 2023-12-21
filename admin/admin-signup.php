<?php

include("../functions.php");
$ch = new Business();

$msg = "";

if (isset($_POST['signup'])) {

	$company = $ch->testInput($_POST['company']);
	$mobile = $ch->testInput($_POST['mobile']);
	$address = $ch->testInput($_POST['address']);
	$email = $ch->testInput($_POST['email']);
	$password = $ch->testInput($_POST['password']);
	
	


	if (!empty($company) || !empty($password) || !empty($email) || !empty($address)) {

		
		$admin_id = $ch->registerAdmin($company,$mobile,$address,$email,$password);

			

			if ($admin_id==1) {

	$msg = '<div class="alert alert-success" role="alert">Registration successful.</div>';

			$ch->sendEmail($email);

		}else{
				$msg = '<div class="alert alert-danger" role="alert">Error in creating account</div>';
				// print_r($adminSignUp);
			}

		

		

	}else {
		$msg = "field are required";
	}
}



?>


<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">

	

</head>
<body>

	<div class="signup_page">

		<header>
			<h2>ADMIN SIGNUP</h2>
		</header>
		<h3>SIGNUP HERE</h3>
		<div class="signup_form">
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<form method="post">


			<div class="form-group">
		    <label class="control-label">Company</label>
		    <input type="text" name="company" class="form-control"  placeholder="company" required="required">
			  </div>


				<div class="form-group">
				    <label class="control-label">Mobile</label>
				    <input type="text" name="mobile" class="form-control"  placeholder="Mobile" required="required">
				  </div>


			<div class="form-group">
		    <label class="control-label">Address</label>
		    <input type="text" name="address" class="form-control"  placeholder="Address" required="required">
		  </div>



				  <div class="form-group">
				      <label class="control-label">Email</label>
				      <input type="email" name="email" class="form-control"  placeholder="Email" required="required">
				    </div>


				<div class="row">

				 	<div class="col">
				 		<div class="form-group">
				  <label class="control-label">Password</label>
				  <input type="password" name="password" class="form-control" placeholder="Password" required="required">
				</div>
				 	</div>

				</div>

				

			<button type="submit" name="signup" class="default">Register Admin</button>
				<p class="auth">Already Registered.<a href="index.php" style="color: #009933"> Login</a></p>
			</form>
		</div>
		
	</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>