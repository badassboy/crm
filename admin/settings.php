<?php
session_start();
include("../functions.php");
$ch = new Business();

if(isset($_POST['info'])){
    
    if (isset($_SESSION['username'])) {

         $email = $ch->testInput($_POST['email']);
         // echo $email;
      
  
  if(empty($email)){
    $msg = '<div class="alert alert-danger" role="alert">Please all fields are required</div>';
  }else {
    $updated = $ch->updateInfo($email,$_SESSION['username']);
    if($updated){
      $msg = '<div class="alert alert-success" role="alert">Info  uploaded</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in updating info</div>';
    }

}

}else {
    echo "session not set";
}

        
}
// end of updating info


// updating password
if (isset($_POST['update'])) {
    if (isset($_SESSION['username'])) {
        $password = $_POST['new_password'];
        $confirm_password = $_POST['cpwd'];

        if (empty($password) || empty($confirm_password)) {
            $msg = '<div class="alert alert-danger" role="alert">Fields required</div>';
            
        }else {
            $updated = $ch->updatePassword($password,$confirm_password,$_SESSION['username']);
            if($updated){
            $msg = '<div class="alert alert-success" role="alert">Password Updated</div>';
            }else {
              $msg = '<div class="alert alert-danger" role="alert">Failed in updating password</div>';
            }
        }
    }
}

// delete account
if (isset($_POST['account'])) {
    if (isset($_SESSION['username'])) {
        $deleted = $ch->deleteAccount($_SESSION['username']);
        if($deleted){
            $msg = '<div class="alert alert-success" role="alert">Password Updated</div>';
            }else {
              $msg = '<div class="alert alert-danger" role="alert">Failed in updating password</div>';
            }

    }
    
}





?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .appointment{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

            .account{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .show {
          display: block;
        }


        button[type="submit"]{
            width: 60%;
            margin-left: 30%;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ATSPO</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Settings</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Business Info</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">Password</a>
            </li>

             <li>
                <a href="#" id="account" data-target="three" class="test">Delete Account</a>
            </li>

         
           
           


            </ul>

           

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                    
                </div>
            </nav>

            <!-- <h2>Contact</h2> -->

            <div class="container appointment show" id="one">
              <!-- <div id="message"></div> -->
              <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
                <h5>Contact</h5>
               <form method="post" id="appoint">

                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
    <input type="email"  name="email" class="form-control" placeholder="Email" required>
                  </div>

            <!-- <div class="form-group">
                <label for="exampleFormControlInput1">Username</label>
    <input type="text"  name="username" class="form-control"  placeholder="Username" required>
              </div> -->

                <button type="submit" class="btn btn-primary" name="info">Update</button>
               </form> 
            </div>
               

                
                <div class="container event" id="two">

                    <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>

              <form method="post" id="appoint">

               <div class="form-group">
                   <label for="exampleFormControlInput1">New Password</label>
   <input type="password"  name="new_password" class="form-control" placeholder="New Password" required>
                 </div>

           <div class="form-group">
               <label for="exampleFormControlInput1">Confirm Pasword</label>
   <input type="password"  name="cpwd" class="form-control"  placeholder="Confirm Password" required>
             </div>

               <button type="submit" class="btn btn-primary" name="update">Update</button>
              </form> 
              
            </div>

            <div class=" container account" id="three">
                <?php 

                if (isset($msg)) {
                    echo $msg;
                }

                ?>
                <form method="post">
                    <p>You will not be able to log in to your profile anymore and all your account history will be deleted without the possibility to restore</p>

                <button type="submit" class="btn btn-primary" name="account">DELETE ACCOUNT</button>
                </form>

                
                
            </div>
                
<!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

    
   





<!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // creating an array-like based of child nodes on a specified class name
        var links = document.getElementsByClassName("test");

     //attach click handler to each
        for (var i = 0; i < links.length; i++) {
            links[i].onclick = toggleVisible;
        }

        function toggleVisible(){
                //hide currently shown item
               document.getElementsByClassName('show')[0].classList.remove('show');
               // getting info from custom data-target  set on the element
               var id = this.dataset.target;
               // showing div
               document.getElementById(id).classList.add('show');
        }

       

   
              


        

           






        


    </script>
</body>

</html>