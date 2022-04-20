<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){
    $contact = $ch->testInput($_POST['contact']);
    $related = $ch->testInput($_POST['related']);
    $call_date = $ch->testInput($_POST['call_date']);
    $call_time = $ch->testInput($_POST['call_time']);
    $subject = $ch->testInput($_POST['subject']);
    $reminder = $ch->testInput($_POST['reminder']);
    $purpose = $ch->testInput($_POST['purpose']);
    $agenda = $ch->testInput($_POST['agenda']);
  // var_dump($picture);
  

    $laliga = $ch->calls($contact,$related,$call_date,$call_time,$subject,$reminder,$purpose,$agenda);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Calls Scheduled</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in  scheduling calls</div>';
    }
  

}
// end of adding contact

// send email
if (isset($_POST['send'])) {
    $from = $_POST['your_email'];
    $to = $_POST['cust_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $send_email = mail($to, $subject, $message);
    if ($send_email) {
        echo "<script>alert('email sent')</script>";
    }else {
        echo "<script>alert('failed to  send email')</script>";

    }
}



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>CLOUDSOFT CRM</title>

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

        #delete {
            /*display: none;*/
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>CLOUDSOFT CRM</h3>
            </div>

            <ul class="list-unstyled components">
                <p>MEETING</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Schedule Calls</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Calls</a>
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
                <h5>CALLS</h5>
               <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1">Call To</label>
<input type="text" name="contact" class="form-control"  placeholder="Contact" required>
                  </div> 
                    </div>

                    <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Related To</label>
                              <select class="form-control" id="exampleFormControlSelect1" name="related" required>
                                  <option value="account">Account</option>
                                  <option value="deal">Deal</option>
                                  <option value="product">Product</option>
                                  <option value="sales order">Sales Order</option>
                                  <option value="purchase order">Purchase Order</option>
                                  <option value="invoice">Invoice</option>
                                </select>
                            </div>  

                    </div>
                    
                </div>


                
                    <div class="row">
                        <div class="col">
                           <div class="form-group">
                    <label for="exampleFormControlInput1">Date</label>
    <input type="date"  name="call_date" class="form-control" placeholder="Date" required>
                  </div> 
                        </div>

                        <div class="col">
                           <div class="form-group">
                <label for="exampleFormControlInput1">Time</label>
    <input type="time"  name="call_time" class="form-control"  placeholder="Time" required>
              </div>  
                        </div>

                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                <label for="exampleFormControlInput1">Subject</label>
    <input type="text" name="subject" class="form-control"  placeholder="Subject" required>
              </div> 
                        </div>

                        <div class="col">
                             <div class="form-group">
                <label for="exampleFormControlInput1">Reminder</label>
                <select class="form-control" name="reminder" placeholder="Reminder">
                  <option value="none">None</option>
                  <option value="5mins">5 mins before</option>
                  <option value="10mins">10 mins before</option>
                  <option value="15mins">15 mins before</option>
                  <option value="20mins">20 mins before</option>
                </select>
              </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                <label for="exampleFormControlInput1">Call Purpose</label>
                <select class="form-control" name="purpose">
                  <option value="none">None</option>
                  <option value="demo">Demo</option>
                  <option value="prospecting">Prospecting</option>
                  <option value="negotiation">Negotiation</option>
                  <option value="project">Project</option>
                  <option value="administrative">Administrattive</option>
                </select>
    
              </div> 
                        </div>

                       

                         <div class="col">
                             <div class="form-group">
                <label for="exampleFormControlInput1">Call Agenda</label>
                <input type="text" class="form-control" name="agenda" placeholder="Agenda">
                
              </div>
                        </div>


                    </div>
                  
                  <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>




             <div class="container event" id="two">
    <?php 

        // if(isset($_POST['calls'])){

        //     echo "hello";

        //     $checkbox = $_POST['check'];
        //     echo(gettype($checkbox));
        //     var_dump($checkbox);

        //     for($i=0; $i<count($checkbox); $i++){

        //     $del_id = $checkbox[$i];
        //     echo $del_id; 

        //     $calls_delete = $ch->deleteCalls($del_id);
        //     if ($calls_delete) {
        //         echo "deleted";
        //     }else {
        //         echo "not deleted";
        //     }

           
        //     }

        // }else {
        //     echo "form not submitted";
        // }



    ?>
                <form method="post" action="">
                     <button type="submit" name="calls" class="btn btn-primary">Delete</button>
                
           

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col"><input type="checkbox" id="checkAl"> Select All</th>
                <th scope="col">Contact</th>
                <th scope="col">Call Date</th>
                <th scope="col">Call Time</th>
                <th scope="col">Subject</th>
                <th scope="col">Purpose</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody>
                <?php 
                $calls = $ch->getCalls();
                foreach ($calls as $row) {
                    $id = $row['id'];
                    // echo($id);
                    ?>
                
                            <tr>

                        <td><input type="checkbox"  name="check[]" value="<?php echo $id;?>"></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td><?php echo $row["call_date"]?></td>
                        <td><?php echo $row["call_time"]?></td>
                        <td><?php echo $row["subject"]?></td>
                        <td><?php echo $row["purpose"]?></td>
                        <td><?php echo $row["purpose"]?></td>
                        </tr>

                        <?php 



                    
                }

               


                ?>
                
            </tbody>

            </table>

        </form>
              
            </div>
                
<!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

    <?php  

    $data = $ch->getEmail();
    foreach ($data as $row) {
        $admin_email = $row['email'];
    }

    $data =$ch->getCustomerEmail();
    
    ?>





    

                
    <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->

    <!-- Bootstrap JS -->
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });


            // your code here

            
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

        $("#checkAl").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });


     



       
       
    </script>
</body>

</html>