<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){

    $title = $ch->testInput($_POST['title']) ?? "";
    $status = $ch->testInput($_POST['status']) ?? "";
    $duration = $ch->testInput($_POST['duration']) ?? "";
    $pricing = $ch->testInput($_POST['price']) ?? "";
    $location = $ch->testInput($_POST['location']) ?? "";
    $description = $ch->testInput($_POST['service_desc']) ?? "";

    $serviceArray = [

        "title" => $title,
        "status" => $status,
        "duration" => $duration,
        "price" => $pricing,
        "location" => $location,
        "description" => $description

        ];
    
 
  
$laliga = $ch->serviceInfo($serviceArray);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Services uploaded</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in uploading service</div>';
    }

  

}
// end of laliga news



?>


 <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
               
               <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                        <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Service Name</label>
        <input type="text" name="title" class="form-control"  placeholder="Service Name" required>
                  </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                            <label>Status</label>
                             <select class="form-control" name="status">
                              <option>Select</option>
                              <option value="active">Active</option>
                              <option value="inactive">Inactive</option>
                              
                            </select>

                            
                        </div>

                    </div>
                    
                </div>

               

                  <div class="form-group">
                      <label for="exampleFormControlInput1" class="control-label">Duration</label>
          <input type="text" name="duration" class="form-control"  placeholder="Duration" required>
                    </div>

                    <div class="row">

                        <div class="col">
                            <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Base Price</label>
        <input type="number" min="1" name="price" class="form-control"  placeholder="Price" required>
                  </div> 
                        </div>

                        <div class="col">
                            <div class="form-group">
                <label for="exampleFormControlInput1" class="control-label">Location</label>
    <input type="text"  name="location" class="form-control" placeholder="Location" required>
              </div> 
                        </div>
                        
                    </div>

    <div class="form-group">
        <label>Service Description</label>
     <textarea class="form-control" name="service_desc" rows="3" placeholder="Description"></textarea>
        
    </div>
        

            <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 


