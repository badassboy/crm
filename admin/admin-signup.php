<?php

include("../functions.php");
$ch = new Business();

$msg = "";

if (isset($_POST['signup'])) {


	
	// $email = trim($_POST['email']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$password2 = htmlspecialchars($_POST['password2']);


	if (!empty($username) || !empty($password) || !empty($password2)) {

		

			$admin_id = $ch->registerAdmin($email,$username,$password,$password2);

			

			if ($admin_id==1) {

	$msg = '<div class="alert alert-success" role="alert">Registration successful.Check your email to activate your account</div>';

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

	<style type="text/css">

		.signup_page {
			background-color:#f5f5f5;
			height: 700px; 
		}

		.signup_page h3 {
			text-align: center;
			padding-top: 1%;
		}

		header {
			background-color:#ffffff;
			width: 100%;
			height: 60px;
		}

		header h2 {
			padding-top: 1%;
			padding-left: 4%;
		}

		.signup_form {
			width: 40%;
			height: 550px;
			background-color:rgb(255, 255, 255);
			margin: 1% auto;
		}


		input[type=text],input[type=password],input[type=tel],input[type=email]{
			width: 60%;
			margin-top: -1%;
		}

		form {
			margin-top: 3%;
			margin-left: 20%;
			padding-top: 4%;
		}

		.default {
			background-color: green;
			color: white;
			width: 60%;
			height: 40px;
			border: 1px solid green;
		}

		form label {
			padding-top: 2%;
			font-weight: bold;
		}

		.auth {
			padding-top: 3%;
		}


	</style>

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
				    <label>Username</label>
				    <input type="text" name="username" class="form-control"  placeholder="Username" required="required">
				  </div>

				  <div class="form-group">
				      <label>Email</label>
				      <input type="email" name="email" class="form-control"  placeholder="Email" required="required">
				    </div>


				


				 

				<div class="form-group">
				  <label>Password</label>
				  <input type="password" name="password" class="form-control" placeholder="Password" required="required">
				</div>


				<div class="form-group">
				  <label>Confirm Password</label>
				  <input type="password" name="password2" class="form-control" placeholder="Reapeat Password" required="required">
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