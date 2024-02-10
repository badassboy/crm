<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){
    $fullName = $ch->testInput($_POST['fullName']) ?? "";
    $title = $ch->testInput($_POST['title']) ?? "";
    $phone = $ch->testInput($_POST['phone']) ?? "";
    $email = $ch->testInput($_POST['email']) ?? "";
    $company = $ch->testInput($_POST['company']) ?? "";
    $lead_source = $ch->testInput($_POST['lead_source']) ?? "";
    $rating = $ch->testInput($_POST['rating']) ?? "";
    $industry =$ch->testInput($_POST['industry']) ?? "";
  // var_dump($picture);
  

  

    $laliga = $ch->leads($fullName,$title,$phone,$lead_source,$industry,$email,$company,$rating);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Lead Added</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in adding lead</div>';
    }

  

}
// end of adding contact

// send email
if (isset($_POST['send'])) {
    $from = $_POST['your_email'];
    $to = $_POST['cust_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $send_email = mail($to, $subject, $message);
    if ($send_email) {
        echo "<script>alert('email sent')</script>";
    }else {
        echo "<script>alert('failed to  send email')</script>";

    }
}



?>



<?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
                <!-- <h5>Contact</h5> -->
               <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1">FullName</label>
<input type="text" name="fullName" class="form-control"  placeholder="FullName" required>
                  </div> 
                    </div>

                    <div class="col">
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Title</label>
                      <input type="text" name="title" class="form-control" placeholder="Title" required>
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
                <label for="exampleFormControlInput1">Company</label>
    <input type="text"  name="company" class="form-control"  placeholder="company" required>
              </div>
                    </div>

                    <div class="col">

                        <div class="form-group">
                <label for="exampleFormControlInput1">Industry</label>
                <select class="form-control" name="industry" id="exampleFormControlSelect1">
                  <option>None</option>
                  <option>Government/Millitary</option>
                  <option>Service Provider</option>
                  <option>Small/Medium Enterprise</option>
                  <option>Nursing</option>
                </select>
        
              </div> 
                        
                    </div>
                      
                  </div>

                  <div class="row">

                    <div class="col">
                                <div class="form-group">
                        <label for="exampleFormControlInput1">Lead Source</label>
            <select class="form-control" id="exampleFormControlSelect1" name="lead_source">
                          <option value="advert">Advertisement</option>
                          <option value="calls">Cold Calls</option>
                          <option value="employee refferal">Employee Referral</option>
                          <option value="external referral">External Referral</option>
                          <option value="public relations">Public Relations</option>
                          <option value="trade">Trade Show</option>
                          
                        </select>
                      
                      </div>   
                        
                    </div>

                     <div class="col">
                                <div class="form-group">
                        <label for="exampleFormControlInput1">Rating</label>
            <select class="form-control" id="exampleFormControlSelect1" name="rating">
                          <option value="none">None</option>
                          <option value="acquired">Acquired</option>
                          <option value="active">Active</option>
                          <option value="failed">Failed</option>
                          <option value="cancelled">Project Cancelled</option>
                          <option value="shit down">Shut Down</option>
                          
                        </select>
                      
                      </div>   
                        
                    </div>
                      
                  </div>

                

            

              

                
                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 