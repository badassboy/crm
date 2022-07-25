<?php
include("../functions.php");
// include("../database.php");
$ch = new Business();

$dbh = DB();


if(isset($_POST['laliga'])){
    $itemNumber = $ch->testInput($_POST['item_number']);
    $itemName = $ch->testInput($_POST['item_name']);
    $product_status = $ch->testInput($_POST['product_status']);
    $quantity = $ch->testInput($_POST['quantity']);
    $price = $ch->testInput($_POST['price']);
    $total_stock = $ch->testInput($_POST['stock']);
    $discount = $ch->testInput($_POST['discount']);
    // $product_image = $_FILES['photo']['name'];
    $description = $ch->testInput($_POST['description']);
  // var_dump($picture);
  

  if(empty($itemNumber) || empty($itemName) || empty($quantity) || empty($price)){
    $msg = '<div class="alert alert-danger" role="alert">Please all fields are required</div>';
  }else {
    $laliga = $ch->addItem($itemNumber,$itemName,$product_status,$quantity,$price,$total_stock,$discount,$description);
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
    $item_name = $ch->testInput($_POST['item_name']);
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
// if(isset($_POST['vendor'])){
//     $fullName = $ch->testInput($_POST['vendor_name']);
//     $phone = $ch->testInput($_POST['phone']);
//     $email = $ch->testInput($_POST['email']);
//     $address = $ch->testInput($_POST['address']);
//     $city = $ch->testInput($_POST['city']);
//     $vendor_date = $ch->testInput($_POST['vendor_date']);
  

 
//     $laliga = $ch->vendor($fullName,$phone,$email,$address,$city,$vendor_date);
//     if($laliga){
//       $vend = '<div class="alert alert-success" role="alert">vendor Added</div>';
//     }else {
//       $vend = '<div class="alert alert-danger" role="alert">Failed in adding vendor</div>';
//     }
// }
// vendor

// sales
// $total_sales = "";
if(isset($_POST['sales'])){
   
    $item_name = $ch->testInput($_POST['item_name']);
    $discount = $ch->testInput($_POST['discount']);
    $quantity = $ch->testInput($_POST['quantity']);
    $price = $ch->testInput($_POST['price']);

    $salesDate = $ch->testInput($_POST['sales_date']);
    $totalCost = $ch->testInput($_POST['total']);

  if(empty($item_name) || empty($quantity) || empty($price) || empty($salesDate)){
    $sales = '<div class="alert alert-danger" role="alert">Input required</div>';
  }else {
    $laliga = $ch->sales($item_name,$discount,$quantity,$price,$salesDate,$totalCost);
    if($laliga){
      $sales = '<script>alert("sales added")</script>';
    }else {
      $sales = '<script>alert("failed in adding sales")</script>';
    }

  }

}
// sales

// customer
if(isset($_POST['customer'])){

    $fullName = $ch->testInput($_POST['cust_name']);
    $status = $ch->testInput($_POST['status']);
    $phone = $ch->testInput($_POST['cust_phone']);
    $email = $ch->testInput($_POST['cust_email']);
    $address = $ch->testInput($_POST['cust_address']);
    $city = $ch->testInput($_POST['cust_city']);
    $vendor_date = $ch->testInput($_POST['cust_date']);
    
  

  if(empty($fullName) || empty($phone) || empty($email) || empty($address) || empty($city) || empty($vendor_date)){
    $info = '<div class="alert alert-danger" role="alert">All input required</div>';
  }else {
    $customer = $ch->customer($fullName,$status,$phone,$email,$address,$city,$vendor_date);
    if($customer){
      $info = '<script>alert("Customer Added")</script>';
    }else {
      $info = '<script>alert("Failed in adding customer")</script>';
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

    <!-- independent css file -->
    <link rel="stylesheet" type="text/css" href="css/inventory.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    
    


   
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
       <?php  include("inventorytabs.php"); ?>
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


                   <div class="col">
                            <div class="form-group">
                  <label for="exampleFormControlInput1">Status</label>
                          <select class="form-control" name="product_status">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                            
                          </select>
     
                            </div>  
                  </div>


                    
                </div>

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Quantity</label>
    <input type="text"  name="quantity" id="product_quantity" class="form-control" placeholder="Quantity" required>
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
    <input type="text"  name="stock" class="form-control" id="product_stock"  placeholder="Total Stock" readonly>
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

                    <!--  <div class="col">
                         <div class="form-group">
                <label for="exampleFormControlInput1">Product Image</label>
                 <input type="file" name="photo" class="form-control-file">
   
              </div> 
                    </div> -->


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


            <!-- Suppliers -->
            <div class="container supplier" id="four">
              <?php include("supplysection.php"); ?>

              <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">FullName</th>
                <th scope="col">Date</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 

              $suppliers = $ch->getSuppliers();
              foreach ($suppliers as $row) {
                
              ?>
                
              <tr id="delete<?php echo $row['id']; ?>">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['sup_date']; ?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><button onclick="deleteSupplier(<?php echo $row['id']; ?>)">Delete</button></td>
            </tr>
                
              <?php } ?>
          </tbody>
          </table>

          </div>
            <!-- Suppliers -->

            <!-- Category -->

              <div class="container category" id="seven">
              <?php include("categorysection.php"); ?>

              <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 

              $suppliers = $ch->getCategories();
              foreach ($suppliers as $row) {
                
              ?>
                
              <tr id="delete<?php echo $row['id']; ?>">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['cat_code']; ?></td>
                  <td><?php echo $row['cat_name']; ?></td>
                  <td><?php echo $row['cat_desc'];?></td>
                  <td><?php echo $row['cat_date']; ?></td>
                  <td><button onclick="deleteSupplier(<?php echo $row['id']; ?>)">Delete</button></td>
            </tr>
                
              <?php } ?>
          </tbody>
          </table>

             

          </div>
            <!-- Category -->



          <!-- Purchase -->

            <div class="container purchase" id="three">

             
                <h5>Purchase</h5>
               <form method="post">

                 <?php
                if(isset($user_msg)){
                  echo $user_msg;
                }

                $current_date = date("Y-m-d");

               
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
                          <select class="form-control" name="item_name" required>
                        <?php 

                        $Items = $ch->getItems();
                        foreach ($Items as $row) {
                            echo '

                            <option>'.$row['itemName'].'</option>
                            ';
                        }

                        ?>
                     
                    </select>

      
                        </div>  

                    </div>

                    <div class="col">
                      <div class="form-group">
                          <label for="exampleFormControlInput1" class="control-label">Purchase Date</label>
      <input type="text" name="purchase_date" class="form-control" value="<?php echo $current_date; ?>" readonly>
                        </div>  

                    </div>
                    
                </div>

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Quantity</label>
    <input type="text"  name="item_quantity" class="form-control" placeholder="Quantity" required>
                  </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1" class="control-label">Unit Price</label>
    <input type="text"  name="item_price" class="form-control"  placeholder="Unit Price" required>
              </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1">Total Purchase</label>
    <input type="text"  name="total_cost" class="form-control" value="" readonly>
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
    <input type="text" name="stock" class="form-control"  placeholder="Current Stock" readonly>

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

                            $current_date = date("Y-m-d");


                          ?>
                            <h5>Sales</h5>
                           <form method="post">

                            <div class="row">

                          <div class="col">
                            <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Item Name</label>
                    <select class="form-control" name="item_name" required>
                        <?php 

                        $Items = $ch->getItems();
                        foreach ($Items as $row) {
                            echo '

                            <option>'.$row['itemName'].'</option>
                            ';
                        }

                        ?>
                     
                    </select>

                  </div>
                        </div>

                                 <div class="col">
                                      <div class="form-group">
                            <label class="control-label">Sales Date</label>
    <input type="text" name="sales_date" class="form-control" value="<?php echo $current_date;?>" readonly>

                          </div>
                                </div>

                                <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">Total Stock</label>
            <input type="text" name="total_stock" class="form-control"  placeholder="TotalStock" readonly>
                              </div> 
                                </div>



                               <!--  <div class="col">
                                  <div class="form-group">
                                      <label for="exampleFormControlInput1">CustomerID</label>
      <input type="text" name="customerID" class="form-control" placeholder="CustomerID" required>
                                    </div>  

                                </div> -->
                                
                            </div>

                            <div class="row">

                               <!--  <div class="col">
                                   <div class="form-group">
                                <label for="exampleFormControlInput1">Customer Name</label>
                <input type="text"  name="customer_name" class="form-control" placeholder="Customer Name" required>
                              </div> 
                                </div> -->

                               


                                
                            </div>

                            <div class="row">

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1">Discount</label>
    <input type="text" class="form-control" name="discount"  id="discount"  placeholder="Discount">
                          </div> 
                                </div>

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1" class="control-label">Quantity</label>
        <input type="number" min="1" class="form-control" name="quantity"  id="quantity">
                          </div> 
                                </div>

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1" class="control-label">Unit Price</label>
    <input type="number" min="1" class="form-control" name="price"  id="pricing"  placeholder="Unit Price">
                          </div> 
                                </div>

                               



                                 <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1" class="control-label">Total Cost</label>
    <input type="number" class="form-control" name="total" placeholder="Total" id="total" readonly>
                          </div> 
                                </div>

                               

                            </div>

              
    <button type="submit" name="sales" class="btn btn-primary">Submit</button>
                           </form> 
                        </div>
            <!-- sales -->



            <!-- vendor -->
                        <!-- <div class="container vendor" id="four"> -->

                         

                          
                           <!--  <h5>Vendor</h5>
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
                           </form>  -->
                        <!-- </div> -->
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
                                <label for="exampleFormControlInput1" class="control-label">FullName</label>
            <input type="text" name="cust_name" class="form-control"  placeholder="FullName" required>
                              </div> 
                                </div>

                                <div class="col">
                                  <div class="form-group">
                              <label for="exampleFormControlInput1" class="control-label">Phone</label>
                  <input type="text" name="cust_phone" class="form-control" placeholder="Phone" required>
                                    </div>  

                                </div>

                                <div class="col">
                                  <div class="form-group">
                              <label for="exampleFormControlInput1">Status</label>
                              <select class="form-control" name="status">
                                <option value="Available">Available</option>
                                <option value="Not Available">Not Available</option>
                                
                              </select>
                                    </div>  

                                </div>


                                
                            </div>

                            <div class="row">

                                <div class="col">
                                   <div class="form-group">
                          <label for="exampleFormControlInput1" class="control-label">Email</label>
                <input type="email"  name="cust_email" class="form-control" placeholder="Email" required>
                              </div> 
                                </div>

                                <div class="col">
                                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="control-label">Address</label>
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
                            <label for="exampleFormControlInput1" class="control-label">Date</label>
                <input type="date" name="cust_date" class="form-control"  placeholder="">

                          </div>
                                </div>

                            </div>

              
                                
            <button type="submit" class="btn btn-primary" name="customer">Submit</button>
                           </form> 
                        </div>
            <!-- customers -->


            <!-- sales returns -->
             <div class="container sreturns" id="eight">
              <?php include("salesReturns.php"); ?>

              <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">FullName</th>
                <th scope="col">Date</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 

              $suppliers = $ch->getSuppliers();
              foreach ($suppliers as $row) {
                
              ?>
                
              <tr id="delete<?php echo $row['id']; ?>">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['sup_date']; ?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><button onclick="deleteSupplier(<?php echo $row['id']; ?>)">Delete</button></td>
            </tr>
                
              <?php } ?>
          </tbody>
          </table>

          </div>

            <!-- sales returns -->

            <!-- purchase returns -->
             <div class="container preturns" id="nine">
              <?php include("purchaseReturns.php"); ?>

              <table class="table">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">FullName</th>
                <th scope="col">Date</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              <?php 

              $suppliers = $ch->getSuppliers();
              foreach ($suppliers as $row) {
                
              ?>
                
              <tr id="delete<?php echo $row['id']; ?>">
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['sup_date']; ?></td>
                  <td><?php echo $row['email'];?></td>
                  <td><?php echo $row['address']; ?></td>
                  <td><button onclick="deleteSupplier(<?php echo $row['id']; ?>)">Delete</button></td>
            </tr>
                
              <?php } ?>
          </tbody>
          </table>

          </div>
            <!-- purchase returns -->






            <!-- reporting -->
            <?php include("reports.php"); ?>
            <!-- reporting -->

           
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
   

    <script type="text/javascript" src="inventory.js"></script>
      
   <!-- Bootstrap JS -->
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

   

    <script type="text/javascript">

      $(document).ready(function(){

       
          // sales
          $("#pricing").change(function(){

            var pricing = $("#pricing").val();
            var quantity = $("#quantity").val();

            var total = pricing*quantity;
            $("#total").val(total.toString());


          });
          // sales


          $("#product_quantity").change(function(){

             var value = $("#product_quantity").val();

              $("#product_stock").val(value);

          });


           // sorted Items selection
             $("#sortedItems").change(function(){

                // load php file into the table
                $("#itemsTable").load("getItemsTest.php");

             });
        });


      $(document).on('click','#tab-holder > button', function(){

        var id = $(this).data('id');
        $('.tab-cont >div').removeClass('selected');
        $('.tab-cont #' + id).addClass('selected');

      }); 

      // suppliers form ajax submission.
        $("#supply").on("submit",function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            url:"suppliers.php",
            data:$("#supply").serialize(),
          })

          .done(function(data){
            $("#response").html(data);
            // console.log("success");
          })
          .fail(function(data){
            $("#response").html(data);
            // console.log("failed");

          });

        });

        // delete Suppliers ajax
        function deleteSupplier(id)
        {
          if (confirm("Are u sure")) {
            $.ajax({
              type:"post",
              url:"delete_supply.php",
              data:{delete_id:id},
              success:function(data){
                  $("#delete"+id).hide();
              }

            });
          }
        }

        // category form ajax submission
        $("#category").on("submit",function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            url:"categories.php",
            data:$("#category").serialize(),
          })

          .done(function(data){
            $("#response").html(data);
            // console.log("success");
          })
          .fail(function(data){
            $("#response").html(data);
            // console.log("failed");

          });

        });

        // sales returns ajax
        $("#salesReturns").on("submit",function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            url:"processSalesReturns.php",
            data:$("#salesReturns").serialize(),
          })

          .done(function(data){
            $("#test").html(data);
            // alert("success");
            // console.log("success");
          })
          .fail(function(data){
            // alert("failed");
            $("#test").html(data);
            // console.log("failed");

          });

        });

        // purchase returns.
        $("#purchaseReturns").on("submit",function(e){
          e.preventDefault();
          $.ajax({
            type:"post",
            url:"processPurchaseReturns.php",
            data:$("#purchaseReturns").serialize(),
          })

          .done(function(data){
            $("#test").html(data);
            // alert("success");
            // console.log("success");
          })
          .fail(function(data){
            // alert("failed");
            $("#test").html(data);
            // console.log("failed");

          });

        });




       
  </script>
</body>

</html>