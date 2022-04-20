<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("../functions.php");
$ch = new Business();

$info = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


	$username = trim($_POST['username']);
	$pwd = trim($_POST['pwd']);
	
	if (!empty($username) || !empty($pwd)) {

		$user = $ch->loginAdmin($username,$pwd);
		if ($user AND $user['verified'] == "yes") {
			$_SESSION['username']=$username;
			header("Location: homepage.php");
			// return;
		}else{
			$info = '<div class="alert alert-danger" role="alert">Login failed</div>';
		}

	}else {

		$info = '<div class="alert alert-danger" role="alert">Fields required</div>';;	
		
		

	}
}






?> 


 <!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	

	<title></title>

	<link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin-index.css">
</head>
<body>

<!-- login page here -->
	<div class="container-fluid auth_page">

		<div class="container-fluid header">

			<h1>ADMIN LOGIN</h1>
		
		</div>

			<h3>LOGIN HERE</h3>
			    <div class="second">
			    	
			    	<form method="post" action="index.php">
			    		<?php

			    		if (isset($info)) {
			    			echo $info;
			    		}

			    		?>
			    	  <div class="form-group">
			    	      <label for="exampleInputEmail1">Username(*)</label>
			    	      <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
			    	      
			    	    </div>

			    	  <div class="form-group">
			    	    <label for="exampleInputPassword1">Password(*)</label>
			    	    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" placeholder="Password" required="required">
			    	  </div>

			    	  

			    	 <input type="submit" name="login" class="default" value="Login">

			    	  <br>
			    	  <p class="next">Forget Password?<a href="forget_password.php" style="color: #009933;">Click Here</a></p>
			    	  <p class="next">Not Registered?<a href="admin-signup.php" style="color: #009933;">SignUp</a></p>
			    	</form>
			    </div>

			


		


	</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>

</body>
</html>