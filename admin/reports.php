  <div class="container event" id="two">

              
                <div id="tab-holder">
    <button type="button" class="btn btn-primary" data-id="everyday"
    style="margin:-7% 3%;"><span>Items</span></button>
    <button type="button" class="btn btn-primary" data-id="sunday"
     style="margin:1% 3%;"><span>Purchase</span></button>
    <button type="button" class="btn btn-primary" data-id="buffet"
     style="margin:1% 3%;"><span>Sales</span></button>   
    <button type="button" class="btn btn-primary" data-id="xmas"
     style="margin:1% 3%;"><span>Customers</span></button> 
              </div>  

            <div class="tab-cont">

              <div id="everyday" class="selected">
                <!-- print table -->
                <div class="actions">
                  <form method="post" action="print-item.php" target="_new">
               <button type="submit" id="print-item" name="print-item" class="btn btn-primary">Print</button>
                </form>
               
              
                <form method="post" action="items_excel.php">
                  
                <button type="submit" name="itemExcel" class="btn btn-primary">Excel</button>
                </form>

                  <form method="post" action="itempdf.php">
                  <button type="submit" name="itemspdf" class="btn btn-primary">PDF</button>
                  </form>

                  <!-- <form method="post"> -->

                    <div class="form-group">
                     
                    <select  name="selectedValue" id="sortedItems" 
                    style="width:15%; margin-top: 1%; margin-left: 2%;">
                      <option value="0">0</option>
                      <option value="2">2</option>
                      <option value="5">5</option>
                     
                    </select>
                    <label>entries</label>

                   
                    </div>
                    
                  <!-- </form> -->
                    
                </div>
                

                 <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">ProductID</th>
                      <th scope="col">ItemName</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Unit Price</th>
                      <th scope="col">Description</th>
                    </tr>
                  </thead>

                  <tbody id="itemsTable">
                    <?php 

                   $items = $ch->getItems();
                     foreach ($items as $row) {
                      echo '

                    <tr>
                      <td>'.$row['itemID'].'</td>
                      <td>'.$row['itemName'].'</td>
                      <td>'.$row['quantity'].'</td>
                      <td>'.$row['price'].'</td>
                      <td>'.$row['description'].'</td>
                    </tr>


                      ';
                    }

                  ?>
                   
                   
                  </tbody>
                </table>

              </div>
              <!-- end of items report -->

              <div id="sunday">

                 <div class="actions">
                  <form method="post" action="print-purchase.php" target="_new">
               <button type="submit"  name="print-item" class="btn btn-primary">Print</button>
                </form>
               
              
                <form method="post" action="purchase_excel.php">
                  
                <button type="submit" name="purchaseExcel" class="btn btn-primary">Excel</button>
                </form>

                  <form method="post" action="purchasepdf.php">
                  <button type="submit" name="purchasepdf" class="btn btn-primary">PDF</button>
                    
                  </form>
                </div>
               

                 <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">PurchaseID</th>
                        <th scope="col">ItemName</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Purchase Date</th>
                        <th scope="col">Current Stock</th>
                      </tr>
                    </thead>

                    <tbody>

                      <?php 

                    $items = $ch->getPurchase();
                    foreach ($items as $row) {
                      echo '

                    <tr>
                      <td>'.$row['purchaseID'].'</td>
                      <td>'.$row['itemName'].'</td>
                      <td>'.$row['quantity'].'</td>
                      <td>'.$row['price'].'</td>
                      <td>'.$row['purchase_date'].'</td>
                      <td>'.$row['current_stock'].'</td>
                    </tr>


                      ';
                    }



                    ?>
                   
                     
                    </tbody>

                  </table>
              </div>

              <!-- end of purchase report -->

              <div id="buffet">

                 <div class="actions">
                  <form method="post" action="print-sales.php" target="_new">
           <button type="submit"  name="print-sales" class="btn btn-primary">Print</button>
                </form>
               
              
                <form method="post" action="sales_excel.php">
                  
                <button type="submit" name="salesExcel" class="btn btn-primary">Excel</button>
                </form>

                  <form method="post" action="salespdf.php">
                  <button type="submit" name="salespdf" class="btn btn-primary">PDF</button>
                    
                  </form>
                </div>

                
                 <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">SalesID</th>
                      <th scope="col">Product</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Price</th>
                      <th scope="col">Date</th>
                      <th scope="col">Item Cost</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $sales = $ch->getSales();
                    foreach ($sales as $row) {
                       echo '
                              <tr>
                                <td>'.$row['saleID'].'</td>
                                <td>'.$row['itemName'].'</td>
                                <td>'.$row['quantity'].'</td>
                                <td>'.$row['price'].'</td>
                                <td>'.$row['salesDate'].'</td>
                                <td>'.$row['price'].'</td>
                              </tr>

                       ';
                     } 



                    ?>

                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                   
                  
                  </tbody>
                </table>
              </div>

              <!-- end of sales report -->


              <div id="xmas">

                  <div class="actions">
                  <form method="post" action="print-customers.php" target="_new">
               <button type="submit" id="print-item" name="print-item" class="btn btn-primary">Print</button>
                </form>
               
              
                <form method="post" action="customers_excel.php">
                  
                <button type="submit" name="customersExcel" class="btn btn-primary">Excel</button>
                </form>

                  <form method="post" action="customerspdf.php">
                  <button type="submit" name="customerspdf" class="btn btn-primary">PDF</button>
                    
                  </form>
                </div>

                   

                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">customerID</th>
                      <th scope="col">FullName</th>
                      <th scope="col">Date</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Email</th>
                      <th scope="col">Address</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php 

                    $customers = $ch->getCustomers();
                    foreach ($customers as $row) {
                       echo '
                              <tr>
                                <td>'.$row['customerID'].'</td>
                                <td>'.$row['fullName'].'</td>
                                <td>'.$row['cust_date'].'</td>
                                <td>'.$row['phone'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['address'].'</td>
                               
                              </tr>

                       ';
                     } 



                    ?>

                    <tr>
                      <td>1</td>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                   
                  
                  </tbody>
                </table>
              </div>

              <!-- end of customers report -->

            </div>





              
            </div>
                