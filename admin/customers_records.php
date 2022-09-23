 <!-- modal button-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#customerModal">Add Customer</button>

        <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <div id="response"></div>

      <form method="post" id="supply" action="customersarena.php">

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

                              
              </div>

                            <div class="row">

                               <div class="col">
                                   <div class="form-group">
                          <label for="exampleFormControlInput1">Whatsapp Number</label>
                <input type="text"  name="whatsapp" class="form-control" placeholder="Whatsapp Line" required>
                              </div> 
                                </div>


                                <div class="col">
                                   <div class="form-group">
                          <label for="exampleFormControlInput1">Email</label>
                <input type="email"  name="cust_email" class="form-control" placeholder="Email" required>
                              </div> 
                                </div>

                              </div>

                            <div class="row">

                              <div class="col">
                                    <div class="form-group">
                      <label for="exampleFormControlInput1" class="control-label">Location</label>
    <input type="text"  name="location" class="form-control"  placeholder="Address" required>
                          </div>
                                </div>

                               

                                <div class="col">
                                      <div class="form-group">
                            <label for="exampleFormControlInput1" class="control-label">Date</label>
                <input type="date" name="cust_date" class="form-control"  placeholder="">

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
               