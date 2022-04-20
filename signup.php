<?php 

include("navbar.php");

include("functions.php");

$ch = new Business();

$msg = "";

if (isset($_POST['signup'])) {


	
	// $email = trim($_POST['email']);
	$username = htmlspecialchars($_POST['username']);
	$email = htmlspecialchars($_POST['email']);
	$password = htmlspecialchars($_POST['password']);
	$password2 = htmlspecialchars($_POST['password2']);


	if (!empty($username) || !empty($email)  || !empty($password) || !empty($password2)) {

		

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

  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      /*page*/

      .signup {
      	background-color:#f5f5f5;
      	height: 500px;
      	/*margin-top: 10%;*/
      }

      .form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin h1 {
	margin-top: 15%;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}

.form-signin input[type="text"] {
  margin-bottom: 5%;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="email"] {
  margin-bottom: 3%;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

button {
  margin-bottom: 10px;
  width: 100%;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
      /*page*/
    </style>


<body>

	<div class="container-fluid signup">
		<?php 

		if (isset($msg)) {
			echo $msg;
		}


		?>
		<form class="form-signin" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Register Here</h1>

   <label for="inputEmail" class="sr-only">Username</label>
  <input type="text" name="username"  class="form-control" placeholder="Username" required autofocus>


  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

   <label for="inputPassword" class="sr-only">Confirm Password</label>
  <input type="password" name="password2" id="inputPassword" class="form-control" placeholder="Confirm Password" required>

 <!--  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div> -->

  <button class="btn btn-primary" type="submit" name="signup">Sign Up</button>
  <p>Already Registered? <a href="login.php">Login</a></p>
</form>
	</div>

	


	
<?php include("footer.php"); ?>
</body>

