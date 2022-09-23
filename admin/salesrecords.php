 <!-- modal button-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#salesModal">Record Sales</button>

        <div class="modal fade" id="salesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div id="response"></div>

      <form method="post" id="supply" action="suppliers.php">

         <div class="row">

          <div class="col">
            <div class="form-group">
              <label>Customer</label>
              <select class="form-control" name="item_name" required>
                        <?php 

                        $Items = $ch->getCustomers();
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
                            <label>Sales Date</label>
    <input type="text" name="sales_date" class="form-control" value="<?php echo $current_date;?>" readonly>

                          </div>
                                </div>

                               

                            </div>

                           

                            <div class="row">

                               <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1" class="control-label">Payment</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Momo</option>
                              <option>Cash</option>
                              <option>Bank Transfer</option>
                             
                            </select>

       
                          </div> 
                                </div>

                              

                                <div class="col">
                                     <div class="form-group">
                            <label for="exampleFormControlInput1">Category</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                             <?php 

                        $Items = $ch->getCategories();
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
                            <label for="exampleFormControlInput1" class="control-label">Product Name</label>
    <input type="text" min="1" class="form-control" name="product_name"  id=""  placeholder="Product Name">
                          </div> 
                                </div>

                            </div>


                                      <div class="row">

                                         <div class="col">
                                               <div class="form-group">
                                      <label for="exampleFormControlInput1" class="control-label">Quantity</label>
                                      <input type="text" name="quantity" class="form-control">
                                    

                 
                                    </div> 
                                          </div>

                                        

                                          <div class="col">
                                               <div class="form-group">
                                      <label for="exampleFormControlInput1">Unit Price</label>
                  <input type="number" min="1" class="form-control" name="unit_price"  id="quantity">
                                    </div> 
                                          </div>

                                          <div class="col">
                                               <div class="form-group">
                                      <label for="exampleFormControlInput1" class="control-label">Unit Price</label>
              <input type="number" min="1" class="form-control" name="price"  id="pricing"  placeholder="Unit Price">
                                    </div> 
                                          </div>

                                      </div>
                               



                                

                               


              
          <button type="submit" name="sales" class="btn btn-primary">Submit</button>

           
                
    
               </form>

        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" name="laliga" class="btn btn-primary">Save changes</button> -->
      </div>

    </div>
  </div>
</div>



             
                <!-- <h5>Suppliers</h5> -->
               