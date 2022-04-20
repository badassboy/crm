<?php

include("../functions.php");
$ch = new Business();

// $totalCost = "";

if(isset($_POST['laliga'])){
    $itemNumber = $ch->testInput($_POST['item_number']);
    $itemName = $ch->testInput($_POST['item_name']);
    $quantity = $ch->testInput($_POST['quantity']);
    $price = $ch->testInput($_POST['price']);
    $total_stock = $ch->testInput($_POST['stock']);
    $discount = $ch->testInput($_POST['discount']);
    $description = $ch->testInput($_POST['description']);
  // var_dump($picture);
  

  if(empty($itemNumber) || empty($itemName) || empty($quantity) || empty($price)){
    $msg = '<div class="alert alert-danger" role="alert">Please all fields are required</div>';
  }else {
    $laliga = $ch->addItem($itemNumber,$itemName,$quantity,$price,$total_stock,$discount,$description);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Item uploaded</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in uploading item</div>';
    }
  }

}
// end of adding contact


// add purcase
if(isset($_POST['purchasing'])){
    $item_number = $ch->testInput($_POST['itemNumber']);
    $item_name = $ch->testInput($_POST['itemName']);
    $item_quantity = $ch->testInput($_POST['item_quantity']);
    $item_price = $ch->testInput($_POST['item_price']);
    $purchaseDate = $ch->testInput($_POST['purchase_date']);
    $vendor = $ch->testInput($_POST['vendor']);
    $currentStock = $ch->testInput($_POST['stock']);

   $purchase = $ch->purchase($item_number,$item_name,$item_quantity,$item_price,$purchaseDate,$vendor,$currentStock);
    if($purchase){
      $user_msg = '<div class="alert alert-success" role="alert">Purchase Added</div>';
    }else {
      $user_msg = '<div class="alert alert-danger" role="alert">Failed in adding purchase</div>';
    }

}
// add purchase.

// vendor
if(isset($_POST['vendor'])){
    $fullName = $ch->testInput($_POST['vendor_name']);
    $phone = $ch->testInput($_POST['phone']);
    $email = $ch->testInput($_POST['email']);
    $address = $ch->testInput($_POST['address']);
    $city = $ch->testInput($_POST['city']);
    $vendor_date = $ch->testInput($_POST['vendor_date']);
  

 
    $laliga = $ch->vendor($fullName,$phone,$email,$address,$city,$vendor_date);
    if($laliga){
      $vend = '<div class="alert alert-success" role="alert">vendor Added</div>';
    }else {
      $vend = '<div class="alert alert-danger" role="alert">Failed in adding vendor</div>';
    }
}
// vendor

// sales
if(isset($_POST['sales'])){
    $itemNumber = $ch->testInput($_POST['item_number']);
    $customerID = $ch->testInput($_POST['customerID']);
    $customerName = $ch->testInput($_POST['customer_name']);
    $item_name = $ch->testInput($_POST['item_name']);
    $quantity = $ch->testInput($_POST['quantity']);
    $price = $ch->testInput($_POST['price']);
    $salesDate = $ch->testInput($_POST['sales_date']);

    
  

  if(empty($itemNumber) || empty($customerID) || empty($customerName) || empty($item_name) || empty($quantity) || empty($price) || empty($salesDate)){
    $sales = '<div class="alert alert-danger" role="alert">Input required</div>';
  }else {
    $laliga = $ch->sales($itemNumber,$item_name,$quantity,$price,$salesDate,$customerName,$customerID);
    if($laliga){
      $sales = '<div class="alert alert-success" role="alert">Sales Added</div>';
    }else {
      $sales = '<div class="alert alert-danger" role="alert">Failed in adding sales</div>';
    }

  }

}
// sales

// customer
if(isset($_POST['customer'])){
    $fullName = $ch->testInput($_POST['cust_name']);
    $phone = $ch->testInput($_POST['cust_phone']);
    $email = $ch->testInput($_POST['cust_email']);
    $address = $ch->testInput($_POST['cust_address']);
    $city = $ch->testInput($_POST['cust_city']);
    $vendor_date = $ch->testInput($_POST['cust_date']);
    
  

  if(empty($fullName) || empty($phone) || empty($email) || empty($address) || empty($city) || empty($vendor_date)){
    $info = '<div class="alert alert-danger" role="alert">All input required</div>';
  }else {
    $customer = $ch->customer($fullName,$phone,$email,$address,$city,$vendor_date);
    if($customer){
      $info = '<div class="alert alert-success" role="alert">Customer Added</div>';
    }else {
      $info = '<div class="alert alert-danger" role="alert">Failed in adding customer</div>';
    }

  }

}
// customer



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

            .purchase{

                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;

            }

            .vendor{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

             .sales{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

             .customer{
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

        .form-group .control-label:after{
           content: " *";
          color: red;
          font-weight: 100;
          font-size: 20px;
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
                <p>Contact</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Item</a>
            </li>

            <li>
                <a href="#" id="purchase" data-target="three" class="test">Purchase</a>
            </li>

             <li>
                <a href="#" id="vendor" data-target="four" class="test">Vendor</a>
            </li>

             <li>
                <a href="#" id="sales" data-target="five" class="test">Sales</a>
            </li>

            <li>
                <a href="#" id="customer" data-target="six" class="test">Customer</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">Report</a>
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

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Item Number</label>
<input type="text" name="item_number" class="form-control"  placeholder="Item Number" required>
                  </div> 
                    </div>

                    <div class="col">
                            <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Item Name</label>
      <input type="text" name="item_name" class="form-control" placeholder="Item Name" required>
                            </div>  

                    </div>
                    
                </div>

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Quantity</label>
    <input type="text"  name="quantity" class="form-control" placeholder="Quantity" required>
                  </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1" class="control-label">Unit Price</label>
    <input type="text"  name="price" class="form-control"  placeholder="Unit Price" required>
              </div>
                    </div>

                     <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1" class="control-label">Total Stock</label>
    <input type="text"  name="stock" class="form-control"  placeholder="Total Stock" required>
              </div>
                    </div>
                    

                </div>

                <div class="row">

                    <div class="col">
                         <div class="form-group">
                <label for="exampleFormControlInput1">Discount</label>
    <input type="text" name="discount" class="form-control"  placeholder="Doscount">
              </div> 
                    </div>

                    <div class="col">
                          <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
<textarea class="form-control" name="description" rows="3"></textarea>
  
              </div>
                    </div>
                    
                </div>
<button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>
            <!-- end of adding item -->


            <!-- Purchase -->

            <div class="container purchase" id="three">

             
                <h5>Purchase</h5>
               <form method="post">

                 <?php
                if(isset($user_msg)){
                  echo $user_msg;
                }

                // $current_date = date("Y-m-d");

               
                ?>

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1">Item Number</label>
<input type="text" name="itemNumber" class="form-control"  placeholder="Item Number" required>
                  </div> 
                    </div>

                    <div class="col">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Item Name</label>
      <input type="text" name="itemName" class="form-control" placeholder="Item Name" required>
                        </div>  

                    </div>

                    <div class="col">
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Purchase Date</label>
      <input type="text" name="purchase_date" class="form-control" value="">
                        </div>  

                    </div>
                    
                </div>

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1">Quantity</label>
    <input type="text"  name="item_quantity" class="form-control" placeholder="Quantity" required>
                  </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1">Unit Price</label>
    <input type="text"  name="item_price" class="form-control"  placeholder="Unit Price" required>
              </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1">Total Cost</label>
    <input type="text"  name="total_cost" class="form-control" value="">
              </div>
                    </div>
                    
                </div>

                <div class="row">

                    <div class="col">
                         <div class="form-group">
                <label for="exampleFormControlInput1">Vendor</label>
    <input type="text" name="vendor" class="form-control"  placeholder="Discount">
              </div> 
                    </div>

                    <div class="col">
                          <div class="form-group">
                <label for="exampleFormControlInput1">Current Stock</label>
    <input type="text" name="stock" class="form-control"  placeholder="Current Stock">

              </div>
                    </div>

                </div>

  <button type="submit" class="btn btn-primary" name="purchasing">Submit</button>
               </form> 
            </div>
            <!-- purchase -->

              <!-- sales -->
             <div class="container sales" id="five">

                          <?php
                            if(isset($sales)){
                              echo $sales;
                            }
                          ?>
                            <h5>Sales</h5>
                           <form method="post">

                            <div class="row">

                                <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">ItemNumber</label>
            <input type="text" name="item_number" class="form-control"  placeholder="ItemNumber" required>
                              </div> 
                                </div>

                                <div class="col">
                                  <div class="form-group">
                                      <label for="exampleFormControlInput1">CustomerID</label>
      <input type="text" name="customerID" class="form-control" placeholder="CustomerID" required>
                                    </div>  

                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">Customer Name</label>
                <input type="text"  name="customer_name" class="form-control" placeholder="Customer Name" required>
                              </div> 
                                </div>

                                <div class="col">
                                    <div class="form-group">
                            <label for="exampleFormControlInput1">Item Name</label>
    <input type="text"  name="item_name" class="form-control"  placeholder="Item Name" required>
                          </div>
                                </div>


                                
                            </div>

                            <div class="row">

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1">Quantity</label>
                <input type="text" name="quantity" class="form-control"  placeholder="Quantity">
                          </div> 
                                </div>

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1">Unit Price</label>
                <input type="text" name="price" class="form-control"  placeholder="Unit Price">
                          </div> 
                                </div>

                                <div class="col">
                                      <div class="form-group">
                            <label for="exampleFormControlInput1">Date</label>
                <input type="date" name="sales_date" class="form-control"  placeholder="">

                          </div>
                                </div>

                            </div>

              
                                
            <button type="submit" class="btn btn-primary" name="sales">Submit</button>
                           </form> 
                        </div>
            <!-- sales -->



            <!-- vendor -->
                        <div class="container vendor" id="four">

                          <?php 

                          if (isset($vend)) {
                            echo $vend;
                          }


                          ?>

                          
                            <h5>Vendor</h5>
                           <form method="post">

                            <div class="row">

                                <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">FullName</label>
            <input type="text" name="vendor_name" class="form-control"  placeholder="FullName" required>
                              </div> 
                                </div>

                                <div class="col">
                                  <div class="form-group">
                                      <label for="exampleFormControlInput1">Phone</label>
                  <input type="text" name="phone" class="form-control" placeholder="Phone" required>
                                    </div>  

                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                <input type="email"  name="email" class="form-control" placeholder="Email" required>
                              </div> 
                                </div>

                                <div class="col">
                                    <div class="form-group">
                            <label for="exampleFormControlInput1">Address</label>
    <input type="text"  name="address" class="form-control"  placeholder="Address" required>
                          </div>
                                </div>


                                
                            </div>

                            <div class="row">

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1">City</label>
                <input type="text" name="city" class="form-control"  placeholder="City">
                          </div> 
                                </div>

                                <div class="col">
                                      <div class="form-group">
                            <label for="exampleFormControlInput1">Date</label>
                <input type="date" name="vendor_date" class="form-control"  placeholder="">

                          </div>
                                </div>

                            </div>

              
                                
            <button type="submit" class="btn btn-primary" name="vendor">Submit</button>
                           </form> 
                        </div>
            <!-- vendor -->

          

            <!-- customers -->
            <div class="container customer" id="six">

                          <?php
                            if(isset($info)){
                              echo $info;
                            }
                          ?>
                            <h5>Customers</h5>
                           <form method="post">

                            <div class="row">

                                <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">FullName</label>
            <input type="text" name="cust_name" class="form-control"  placeholder="FullName" required>
                              </div> 
                                </div>

                                <div class="col">
                                  <div class="form-group">
                                      <label for="exampleFormControlInput1">Phone</label>
                  <input type="text" name="cust_phone" class="form-control" placeholder="Phone" required>
                                    </div>  

                                </div>
                                
                            </div>

                            <div class="row">

                                <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                <input type="email"  name="cust_email" class="form-control" placeholder="Email" required>
                              </div> 
                                </div>

                                <div class="col">
                                    <div class="form-group">
                            <label for="exampleFormControlInput1">Address</label>
    <input type="text"  name="cust_address" class="form-control"  placeholder="Address" required>
                          </div>
                                </div>


                                
                            </div>

                            <div class="row">

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1">City</label>
                <input type="text" name="cust_city" class="form-control"  placeholder="City">
                          </div> 
                                </div>

                                <div class="col">
                                      <div class="form-group">
                            <label for="exampleFormControlInput1">Date</label>
                <input type="date" name="cust_date" class="form-control"  placeholder="">

                          </div>
                                </div>

                            </div>

              
                                
            <button type="submit" class="btn btn-primary" name="customer">Submit</button>
                           </form> 
                        </div>
            <!-- customers -->






             <div class="container event" id="two">

                <form method="post" action="print-data.php">
                <button name="print" class="btn btn-primary">Print Report</button>
                    
                </form>

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">ID</th>
                <th scope="col">ItemName</th>
                <th scope="col">ItemNumber</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">ItemID</th>
              </tr>
            </thead>

            <tbody>
                <?php 
                $items = $ch->itemReport();
                foreach ($items as $row) {
                    echo '
                    <td>'.$row['id'].'</td>
                    <td>'.$row['itemName'].'</td>
                    <td>'.$row['itemNumber'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['quantity'].'</td>
                    <td>'.$row['itemID'].'</td>


                    ';
                }



                ?>
            </tbody>

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

    $data =$ch->getCustomerEmail();
    
    ?>





    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Message Contact</h5>
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
                <select class="form-control" name="cust_email" id="exampleFormControlSelect1">
                    <?php 

                    foreach ($data as $row) {
                    echo '
                        <option>'.$row['email'].'</option>

                    ';
                }

                    ?>
                  
                </select>
              <!-- <input type="email" name="cust_email" class="form-control" id="inputPassword"> -->
            </div>
          </div>

          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" name="subject" class="form-control" id="inputPassword">
              </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                 name="message"></textarea>
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
//         $(document).ready(function(){

// $.ajax({
//  url:"contact_ajax.php",
//  type:"get",
//  dataType:"JSON",
//  success:function(response){
//    console.log(response);
//      var len = response.length;
//      for (var i = 0; i < len; i++) {

//            var edit = response[i]['edit'];
//          var my_delete  = response[i]["delete"];

//          var action = edit.concat(" ", my_delete);

//          var firstName = response[i]["first_name"];

//          var lastNme = response[i]["last_name"];
       
//          var  email = response[i]["email"];
//          var  city = response[i]["city"];

//          var table_str = "<tr>" +
                      
                      
//                       "<td>" + firstName + "</td>" +
//                       "<td>" + lastNme + "</td>" +
                    
//                       "<td>" + email + "</td>" +
//                       "<td>" + city + "</td>" +
//                       "<td>" + action + "</td>" +
//                       "</tr>";


//               $(".table tbody").append(table_str);

//             }
             
//           },
//           error:function(response){
//             console.log("Error: "+ response);
//           }
      
//           });  

//         edit.addEventListener("click", function(){
//                 $('#myModal').modal('show');
//         });

//       });

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