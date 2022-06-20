 <!-- modal button-->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Supplier</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

            <!-- <div class="row"> -->

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Name</label>
<input type="text" name="sup_name" class="form-control"  placeholder="Supplier Name" required>
                  </div> 
                    </div>

                    <div class="col">
                            <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Address</label>
      <input type="text" name="sup_address" class="form-control" placeholder="Supplier Address" required>
                            </div>  
                  </div>


                   <div class="col">
                            <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Email</label>
                  <input type="email" name="sup_email" class="form-control" placeholder="Email" required>
                         
                            </div>  
                  </div>


                    
                <!-- </div> -->

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Contact</label>
    <input type="text"  name="sup_contact"  class="form-control" placeholder="Mobile" required>
                  </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1" class="control-label">Date</label>
    <input type="date"  name="sup_date" class="form-control"  placeholder="">
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
               