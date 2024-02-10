 <?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){
    $firstName = $ch->testInput($_POST['first_name']) ?? "";
    $middle_name = $ch->testInput($_POST['middle_name']) ?? "";
    $last_name = $ch->testInput($_POST['last_name']) ?? "";
    $company = $ch->testInput($_POST['company']) ?? "";
    $email = $ch->testInput($_POST['email']) ?? "";
    
    $status = $ch->testInput($_POST['status']) ?? "";
    
    $mobile = $ch->testInput($_POST['mobile']) ?? "";
    $whatsapp = $ch->testInput($_POST['whatsapp']) ?? "";
    $location = $ch->testInput($_POST['location']) ?? "";
    
    $source = $ch->testInput($_POST['source']) ?? "";

    $contactArray = [

      "firstName" => $firstName,
      "middle_name" => $middle_name,
      "last_name" => $last_name,
      "company" => $company,
      "email" => $email,
      "status" => $status,
      "mobile" => $mobile,
      "whatsapp" => $whatsapp,
      "location" => $location,
      "source" => $source
];
  
  
    $laliga = $ch->addContact($contactArray);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Advert uploaded</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in uploading advert</div>';
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
                <h5>Contact</h5>
               <form method="post" id="appoint">

                <div class="row">

                    <div class="col">
                       <div class="form-group">
                    <label class="control-label">First Name</label>
            <input type="text" name="first_name" class="form-control"  placeholder="First Name" required>
                  </div> 
                    </div>

          <div class="col">
           <div class="form-group">
        <label for="exampleFormControlInput1">Middle Name</label>
    <input type="text" name="middle_name" class="form-control"  placeholder="Middle Name">
      </div> 
        </div>



                <div class="col">
                      <div class="form-group">
                      <label class="control-label">Last Name</label>
                      <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>  

                </div>

                 <div class="col">
      <div class="form-group">
      <label for="exampleFormControlInput1">Company</label>
      <input type="text" name="company" class="form-control" placeholder="Company">
        </div>  

                </div>


                    
                </div>


                
                <div class="row">

                    <div class="col">
                      <div class="form-group">
                    <label class="control-label">Email</label>
    <input type="email"  name="email" class="form-control" placeholder="Email" required>
                  </div>
  
                    </div>

                   

                     <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1">Status</label>
                <select class="form-control" id="exampleFormControlSelect1" name="status">
                    <option>Select</option>
                  <option value="Loyal customers">Loyal Customer</option>
                  <option value="recent customer">Recent Customer</option>
                  <option value="champions">Champion</option>
                  <option value="lost customer">Lost Customers</option>
                  
                </select>

   
              </div> 
                    </div>


                    
                </div>

                  

                
                <div class="row">

                   

                    <div class="col">
                        <div class="form-group">
                <label>Mobile</label>
    <input type="text"  name="mobile" class="form-control"  placeholder="Mobile">
              </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1">Whatsapp line</label>
    <input type="text"  name="whatsapp" class="form-control"  placeholder="whatsapp line">
              </div>
                    </div>
                    
                </div>

            
                <div class="row">

                    <div class="col">
                        <div class="form-group">
                <label class="control-label">Location</label>
    <input type="text" name="location" class="form-control"  placeholder="Location" required>
              </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label class="control-label">Address</label>
    <input type="text" name="address" class="form-control"  placeholder="Address" required>
              </div> 
                    </div>

                    <div class="col">
                        <div class="form-group">
                <label for="exampleFormControlInput1">Customer source</label>
                <select class="form-control" name="source">
                  <option>Select</option>
                  <option value="social media">Social media</option>
                  <option value="referral">Referral</option>
                  <option value="word of mouth">Word of mouth</option>
                  <option value="networking">Networking</option>
                </select>
    
              </div> 
                    </div>

                  </div>

              <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 