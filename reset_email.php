<?php 
include("navbar.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("functions.php");
$ch = new Business();

$info = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $id = $_GET['id'];
  $password = $ch->testInput($_POST['password']);
  $confirm_password = $ch->testInput($_POST['cpwd']);
 
  if (!empty($password) || !empty($confirm_password)) {

    $user = $ch->ResetUserPassword($id,$password,$confirm_password);
    if ($user) {
      
      $info = '<div class="alert alert-success" role="alert">Paasword reset successful</div>';
      sleep(60);
      header("Location:login.php");
      exit;
      
    }else{
      $info = '<div class="alert alert-danger" role="alert">Password reset failed</div>';
    }

  }else {

    $info = '<div class="alert alert-danger" role="alert">Fields required</div>';;  
    
    

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

      if (isset($info)) {
        echo $info;
      }

    ?>
		<form class="form-signin" method="post">
  <h1 class="h3 mb-3 font-weight-normal">Enter New Password</h1>

   <label for="inputEmail" class="sr-only">New Password</label>
  <input type="password" name="password"   class="form-control" placeholder="New Password" required autofocus>

  <label for="inputEmail" class="sr-only">Confirm Password</label>
  <input type="password" name="cpwd"   class="form-control" placeholder="Confirm Password" required autofocus>


  <button class="btn btn-primary" type="submit" name="register">Submit</button>
 
</form>
	</div>

	


	
<?php include("footer.php"); ?>
</body>

