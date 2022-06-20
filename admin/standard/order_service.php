<?php

include("../../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){
    $order_date = $ch->testInput($_POST['order_date']);
    $client_name = $ch->testInput($_POST['client_name']);
    $clent_mobile = $ch->testInput($_POST['client_mobile']);
    $service_type = $ch->testInput($_POST['services']);
    $rate = $ch->testInput($_POST['rate']);
    $paid_amount = $ch->testInput($_POST['amount_paid']);
    $due_amount = $ch->testInput($_POST['amount_due']);
    $payment_type = $ch->testInput($_POST['type']);
    $payment_status = $ch->testInput($_POST['status']);
    $payment_place = $ch->testInput($_POST['payment_place']);
    
  

  if(empty($order_date) || empty($client_name) || empty($client_name)){
    $msg = '<div class="alert alert-danger" role="alert">Please all fields are required</div>';
  }else {
    $laliga = $ch->addOrders($order_date,$client_name,$clent_mobile,$service_type,$rate,
        $paid_amount,$due_amount,$payment_type,$payment_status,$payment_place);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Order Created</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in creating order</div>';
    }
  }

}
// end of laliga news



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../../font-awesome/css/font-awesome.css">

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
                <p>Services</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Service Orders</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Orders</a>
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

            <!-- <h2>Services</h2> -->

            <div class="container appointment show" id="one">
              <!-- <div id="message"></div> -->
              <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
                <!-- <h5>Services</h5> -->
               <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                         <div class="form-group">
                    <label for="exampleFormControlInput1">Order Date</label>
        <input type="date" name="order_date" class="form-control"  placeholder="Order Date" required>
                  </div>
                    </div>

                    <div class="col">
                         <div class="form-group">
                    <label for="exampleFormControlInput1">Client Name</label>
        <input type="text" name="client_name" class="form-control"  placeholder="Client Name" required>
                  </div>
                    </div>

                    <div class="col">
                         <div class="form-group">
                    <label for="exampleFormControlInput1">Client Contact</label>
        <input type="text" name="client_mobile" class="form-control"  placeholder="Client Mobile" required>
                  </div>
                    </div>


                </div>

               

                  

              

              <div class="row">

                <div class="col">
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Service</label>
                    <select class="form-control" name="services" required>
                         <?php 

                    $services = $ch->getServices();
                    foreach ($services as $row) {
                        echo '

                            <option value="'.$row['name'].'">'.$row['name'].'</option>

                        ';
                    }

                    ?>
                      
                      
                    </select>
                   

       

              </div> 
                </div>

                <div class="col">
                     <div class="form-group">
                    <label for="exampleFormControlInput1">Rate</label>
                    <input type="number" min="1" name="rate" placeholder="Rate" required>

                    </div>
                </div>

                <div class="col">
                     <div class="form-group">
                    <label for="exampleFormControlInput1">Amount Paid</label>
        <input type="number" min="1" name="amount_paid" class="form-control"  placeholder="Amount Paid" required>

              </div>
                </div>


                 <div class="col">
                     <div class="form-group">
                    <label for="exampleFormControlInput1">Amount Due</label>
        <input type="number" min="1" name="amount_due" class="form-control"  placeholder="Amount Due" required>

              </div>
                </div>
                  
              </div>

              

              <div class="row">

                <div class="col">
                   <div class="form-group">
                    <label for="exampleFormControlInput1">Payment Type</label>
                    <select class="form-control" name="type" required>
                      <option>Select</option>
                      <option>Cheque</option>
                      <option>Cash</option>
                      <option>Credit Card</option>
                      
                    </select>

              </div> 
                </div>

                <div class="col">
                    <div class="form-group">
                    <label for="exampleFormControlInput1">Payment Status</label>
                    <select class="form-control" name="status" required>
                      <option>Select</option>
                      <option>Full Payment</option>
                      <option>Advance Payment</option>
                      <option>No Payment</option>
                    </select>

              </div>
                </div>

                <div class="col">
                   <div class="form-group">
                    <label for="exampleFormControlInput1">Payment Place</label>
                    <select class="form-control" name="payment_place">
                      <option>Select</option>
                      <option>Inside Valley</option>
                      <option>Outside Valley</option>
                      
                    </select>

              </div> 
                </div>
                  
              </div>


              

        


            





                

                 

                
                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>

                   


                

    
            


               


             <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">ID</th>
                <th scope="col">ServiceName</th>
                <th scope="col">Rate</th>
                <th scope="col">Client</th>
                <th scope="col">Mobile</th>
              
                <th scope="col">Payment Type</th>
                <th scope="col">Payment Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody></tbody>

            </table>
              
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

        // display all featured news
        $(document).ready(function(){

$.ajax({
 url:"order_ajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var print  = response[i]["print"];

         // var action = edit.concat(" ", my_delete);

         var id = response[i]["id"];
         // var order_rate = response[i]["name"];

         var rate = response[i]["rate"];
       
         var  client = response[i]["client"];
         var  mobile = response[i]["mobile"];
         var  service = response[i]["service"];
         var  payment_type = response[i]["payment_type"];
         var  payment_status = response[i]["payment_status"];

         var table_str = "<tr>" +
                      
                      
                      "<td>" + id + "</td>" +
                      "<td>" + service + "</td>" +
                      "<td>" + rate + "</td>" +
                      "<td>" + client + "</td>" +
                      "<td>" + mobile + "</td>" +
                      "<td>" + payment_type + "</td>" +
                      "<td>" + payment_status + "</td>" +
                      "<td>" + print + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          });  

      });

    var button = document.getElementById("upload");
    button.addEventListener("click", function(){

        online = window.navigator.onLine;


        if (navigator.onLine) {
          // console("onLine");
        } else {
          alert("offline");
        }


    });

  
              


        

           






        


    </script>
</body>

</html>