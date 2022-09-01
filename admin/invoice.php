<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){

    // customer data
    $invoice_number = $ch->testInput($_POST['invoice_number']);
    $customer = $ch->testInput($_POST['customer']);
    $item = $ch->testInput($_POST['item']);
    $invoice_date = $ch->testInput($_POST['invoice_date']);
    $payment_due = $ch->testInput($_POST['payment_due']);
    $validity = $ch->testInput($_POST['validity']);

    $amount = $ch->testInput($_POST['amount']);
    $totalAmount = $ch->testInput($_POST['total_amount']);
    
   
    $balance = $ch->testInput($_POST['balance']);
    $invoice_status = $ch->testInput($_POST['invoice_status']);
    $note = $ch->testInput($_POST['note']);


    $laliga = $ch->createInvoice($invoice_number,$customer,$item,$invoice_date,$payment_due,$validity,
        $amount,$totalAmount,$balance,$invoice_status,$note);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Invoice Created</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Error in creating invoice</div>';
    }
  

}
// end of creating invoice

//emailing invoice
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

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .show {
          display: block;
        }

        .form-group  .control-label:after {
            content:"*";
            color:red;
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
                <p>Invoice</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Create Invoice</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Invoice</a>
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

            <h2>Invoice</h2>

            <div class="container appointment show" id="one">
              <!-- <div id="message"></div> -->
              <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
               <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                        <div class="form-group">
                            <label>Invoice Number</label>
                    <input type="text" class="form-control" name="invoice_number" placeholder="Invoice Number">
                            
                        </div>
                        
                    </div>

                    <div class="col">
                       <div class="form-group">
                    <label class="control-label">Customer Name</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="customer" required>
                        <?php
                        // displaying customers
                        $customers = $ch->allContact();
                        foreach($customers as $row){

                            $fullName = $row['firstName']." ".$row['lastName'];



                         ?>

                         <option><?php echo $fullName ; ?></option>
                         <?php
                     }
                     ?>
                      
                      
                    </select>

                    
                </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label class="control-label">Item</label>
                <input type="text" class="form-control" name="item" placeholder="Item" required>
                            
                        </div>
                        
                    </div>

                    

                </div>
                <!-- end of row -->

                <div class="row">

                    <div class="col">
                        <div class="form-group">
                      <label class="control-label">Invoice Date</label>
          <input type="date" name="invoice_date" class="form-control" placeholder="Invoice Date" required>
                        </div> 
                  </div>

                  

                   <div class="col">
                        <div class="form-group">
                      <label class="control-label">Payment Due</label>
          <input type="date" name="payment_due" class="form-control" placeholder="Payment Date" required>
                      
                        </div> 
                  </div>

                   <div class="col">
                        <div class="form-group">
                      <label for="exampleFormControlInput1">Valid Until</label>
                      <input type="date" name="validity" class="form-control" placeholder="Valid until">
                       
                        </div> 
                  </div>

                </div>
                <!-- end of second row -->

                 <div class="row">

                    <div class="col">
                        <div class="form-group">
                      <label class="control-label">Amount</label>
          <input type="number" min="1" name="amount" class="form-control" placeholder="Amount" required>
                        </div> 
                  </div>

                   <div class="col">
                        <div class="form-group">
                      <label class="control-label">Total Amount</label>
          <input type="number" min="1" name="total_amount" class="form-control"  placeholder="Total Amount" required>
                        </div> 
                  </div>

                   <div class="col">
                        <div class="form-group">
                      <label for="exampleFormControlInput1">Balance Payment</label>
          <input type="number" min="1" name="balance" class="form-control"  placeholder="Balance">
                        </div> 
                  </div>


                </div>

                <div class="row">

                    <div class="col">
                       
                        <div class="form-group">
                <label for="exampleFormControlInput1">Status</label>
                <select class="form-control"  name="invoice_status">
                    <option>Select</option>
                  <option value="unpaid">Unpaid</option>
                  <option value="paid">Paid</option>
                  <option value="overdue">Overdue</option>
                  
                </select>

                
                </div> 

                    </div>

                     <div class="col">
                        
                        <div class="form-group">
                <label for="exampleFormControlInput1">Note</label>
     <textarea class="form-control" name="note" id="exampleFormControlTextarea1" rows="3"
     placeholder="Note"></textarea>
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
                
                <th scope="col">InvoiceNumber</th>
                <th scope="col">Customer</th>
                <th scope="col">Item</th>
                <th scope="col">Invoice Date</th>
                <th scope="col">Payment Date</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Preview</th>
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

    <?php  

    $data = $ch->getEmail();
    foreach ($data as $row) {
        $admin_email = $row['email'];
    }

    $data =$ch->invoiceEmail();
    
    ?>

     <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Payment reminder</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">

          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">From</label>
              <div class="col-sm-10">
                <input type="email" name="your_email" class="form-control" id="inputPassword"
                value="<?php echo $admin_email; ?>">
              </div>
            </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">To</label>
            <div class="col-sm-10">
               
  <input type="email" name="cust_email" class="form-control" id="inputPassword" placeholder="Email" required>
            </div>
          </div>

          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" name="subject" class="form-control" id="inputPassword" value="Invoice from your service Provider">
              </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                 name="message" placeholder="Your Message"></textarea>
                </div>
              </div>

         

          <button type="submit" name="send" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                


           

          

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
 url:"invoice_ajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];
         var my_view = response[i]['view'];

         var action = edit.concat(" ", my_delete);
         // var action = string.concat(edit,my_delete,my_view);

         var invoiceNumber = response[i]["invoice_number"];

         var customer = response[i]["customer"];
         var item = response[i]["item"];
       
         var  invoice_date = response[i]["invoice_date"];
         var  payment_due = response[i]["payment_due"];
        
         var  total_amount = response[i]["total_amount"];

         var table_str = "<tr>" +
                      
                      
                      "<td>" + invoiceNumber + "</td>" +
                      "<td>" + customer + "</td>" +
                      "<td>" + item + "</td>" +
                    
                      "<td>" + invoice_date + "</td>" +
                      "<td>" + payment_due + "</td>" +
                         "<td>" + total_amount + "</td>" +
                      "<td>" + my_view + "</td>" +
                   
                      "<td>" + action + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          }); 

          my_delete.addEventListener("click", function(){
             $('#myModal').modal('show');
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