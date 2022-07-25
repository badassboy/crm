<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#purchaseReturnsModal">
  Purchase Returns
</button>

<!-- Modal -->
<div class="modal fade" id="purchaseReturnsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <div id="test"></div>

      <form method="post" id="purchaseReturns" action="processPurchaseReturns.php">

            <!-- <div class="row"> -->

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Customer Name</label>
<input type="text" name="cust_name" class="form-control"  placeholder="Customer Name" required>
                  </div> 
                    </div>

                    <div class="col">
                      <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Product</label>
      <input type="text" name="return_product" class="form-control" placeholder="Product" required>
                      </div>  
                  </div>


                   <div class="col">
                        <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Quantity</label>
            <input type="text" name="return_quantity" class="form-control" placeholder="Quantity" required>
                         
                      </div>  
                  </div>


                    
                <!-- </div> -->

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label  class="control-label">Return status</label>
                     <select class="form-control"  name="return_status" required>
                        <option>Select</option>
                        <option value="Pending">Pending</option>
                        <option value="Complete">Complete</option>
                        <option value="Uncomplete">Uncomplete</option>

                       
                      </select>
                  </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label>Date</label>
    <input type="date"  name="return_date" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
              </div>
                    </div>

                    
                  </div>

                
    <button type="submit" class="btn btn-primary" name="sReturns">Submit</button>
               </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>