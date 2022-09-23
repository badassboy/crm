 <!-- modal button-->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#itemModal">Add Product</button>

        <div class="modal fade" id="itemModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

      <form method="post" id="appointment" action="products.php">

        <div class="row">

                  

                    <div class="col">
                            <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Product Name</label>
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
                <label for="exampleFormControlInput1" class="control-label">Rate/Price</label>
    <input type="text"  name="price" class="form-control"  placeholder="Unit Price" required>
              </div>
                    </div>

                    
                    

                </div>


                 <div class="row">

                   

                    <!--  <div class="col">
                         <div class="form-group">
                <label for="exampleFormControlInput1">Product Image</label>
                 <input type="file" name="photo" class="form-control-file">
   
              </div> 
                    </div> -->

                      <div class="col">
                          <div class="form-group">
                <label for="exampleFormControlInput1">Category</label>
                <select class="form-control" name="prod_cat" id="exampleFormControlSelect1">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>


  
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

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="submit" name="laliga" class="btn btn-primary">Save changes</button> -->
      </div>

    </div>
  </div>
</div>



             
                <!-- <h5>Suppliers</h5> -->
               