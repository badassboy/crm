<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">
  Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

         <div id="response"></div>

          <form method="post" id="category" action="categories.php">

            <!-- <div class="row"> -->

                    <div class="col">
                       <div class="form-group">
                    <label>Category Code</label>
          <input type="text" name="cat_code" class="form-control"  placeholder="Category Code">
                  </div> 
                    </div>

                    <div class="col">
                            <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Category Name</label>
      <input type="text" name="cat_name" class="form-control" placeholder="Category Name" required>
                            </div>  
                  </div>


                   <div class="col">
                            <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="cat_desc" rows="3"></textarea>
                         
                            </div>  
                  </div>

                  <div class="col">
                            <div class="form-group">
                  <label>Category Date</label>
      <input type="text" name="cat_date" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
                            </div>  
                  </div>


              <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>