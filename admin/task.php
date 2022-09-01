<?php

include("../functions.php");
$ch = new Business();

if(isset($_POST['laliga'])){
    $subject = $ch->testInput($_POST['subject']);
    $dueDate = $ch->testInput($_POST['task_date']);
    $assigned_member = $ch->testInput($_POST['assigned_member']);
    $task_start_time = $ch->testInput($_POST['task_starting_time']);
    $task_end_time = $ch->testInput($_POST['task_ending_time']);
    $total_duration = $ch->testInput($_POST['completion_duration']);
    $status = $ch->testInput($_POST['status']);
    $priority = $ch->testInput($_POST['priority']);
    $description = $ch->testInput($_POST['description']);
  // var_dump($picture);
  

$laliga = $ch->task($subject,$dueDate,$assigned_member,$task_start_time,
    $task_start_time,$total_duration,$status,$priority,$description);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Task Created</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in creating task</div>';
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



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .appointment{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .show {
          display: block;
        }


        button[type="submit"]{
            width: 60%;
            margin-left: 30%;
        }

        textarea {
            margin-bottom: 3%;
        }

        .form-group  .control-label:after {
  content:"*";color:red;
}


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>CLOUDSOFT CRM</h3>
            </div>

            <ul class="list-unstyled components">
                <p>TASK</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Add Task</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Task</a>
            </li>

         
           
           


            </ul>

           

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                    
                </div>
            </nav>

            <!-- <h2>Contact</h2> -->

            <div class="container appointment show" id="one">
              <!-- <div id="message"></div> -->
              <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
                <h5>Task</h5>
               <form method="post" id="appoint">

                <div class="row">

                  <div class="col">
                       <div class="form-group">
                    <label for="exampleFormControlInput1" class="control-label">Subject</label>
<input type="text" name="subject" class="form-control"  placeholder="Subject" required>
                  </div> 
                    </div> 

                     <div class="col">
                           <div class="form-group">
                      <label for="exampleFormControlInput1" class="control-label">Task Date</label>
          <input type="date" name="task_date" class="form-control" placeholder="Date" required>
                            </div>   
                        </div>


                     <div class="col">
                           <div class="form-group">
                              <label for="exampleFormControlInput1">Assigned To</label>
          <input type="text" name="assigned_member" class="form-control" placeholder="Team member name">
                            </div>   
                        </div>



                </div>

                    

                    <div class="row">

                       

                        <div class="col">
                             <div class="form-group">
                      <label for="exampleFormControlInput1" class="control-label">Task Starting time</label>
          <input type="time" name="task_starting_time" class="form-control" placeholder="Staring time" required>
                            </div> 
                            
                        </div>

                        <div class="col">
                            <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Task Ending time</label>
          <input type="time" name="task_ending_time" class="form-control" placeholder="Ending time" required>
                            </div>  
                        </div>

                         <div class="col">
                           <div class="form-group">
                  <label for="exampleFormControlInput1" class="control-label">Total Duration</label>
          <input type="text" name="completion_duration" class="form-control" placeholder="Competion Duartion" required>
                            </div>   
                        </div>
                        
                    </div>

                
                <div class="row">

                       <div class="col">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Status</label>
                                 <select class="form-control" name="status">
                                       <option value="none">None</option>
                                       <option value="existing business">Uncompleted</option>
                                       <option value="new business">completed</option>
                                       
                                     </select>
                               </div>  

                       </div> 


                        <div class="col">
                             <div class="form-group">
                                 <label for="exampleFormControlInput1">Priority</label>
                                 <select class="form-control" name="priority">
                                       <option value="high">High</option>
                                       <option value="low">Low</option>
                                       <option value="medium">Medium</option>
                                       
                                     </select>
                               </div>  

                       </div>


                        
                    </div>

       <textarea class="form-control" name="description" rows="3" placeholder="Description"></textarea>

                   

        <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>




             <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Subject</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
                <th scope="col">Priority</th>
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody></tbody>

            </table>
              
            </div>
                
<!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

    <?php  

    $data = $ch->getEmail();
    foreach ($data as $row) {
        $admin_email = $row['email'];
    }

    $data =$ch->getCustomerEmail();
    
    ?>





    <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Message Contact</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">

          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">From</label>
              <div class="col-sm-10">
                <input type="email" name="your_email" class="form-control" id="inputPassword"
                value="<?php echo $admin_email; ?>">
              </div>
            </div>

        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">To</label>
            <div class="col-sm-10">
                <select class="form-control" name="cust_email" id="exampleFormControlSelect1">
                    <?php 

                    foreach ($data as $row) {
                    echo '
                        <option>'.$row['email'].'</option>

                    ';
                }

                    ?>
                  
                </select>
              <!-- <input type="email" name="cust_email" class="form-control" id="inputPassword"> -->
            </div>
          </div>

          <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Subject</label>
              <div class="col-sm-10">
                <input type="text" name="subject" class="form-control" id="inputPassword">
              </div>
            </div>

            <div class="form-group row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
                <div class="col-sm-10">
                 <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                 name="message"></textarea>
                </div>
              </div>

         

          <button type="submit" name="send" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                


           

          

    <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // creating an array-like based of child nodes on a specified class name
        var links = document.getElementsByClassName("test");

     //attach click handler to each
        for (var i = 0; i < links.length; i++) {
            links[i].onclick = toggleVisible;
        }

        function toggleVisible(){
                //hide currently shown item
               document.getElementsByClassName('show')[0].classList.remove('show');
               // getting info from custom data-target  set on the element
               var id = this.dataset.target;
               // showing div
               document.getElementById(id).classList.add('show');
        }

        // display all featured news
        $(document).ready(function(){

$.ajax({
 url:"task_ajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

         var subject = response[i]["subject"];

         var task_date = response[i]["task_date"];
       
         var  status = response[i]["status"];
         var  priority = response[i]["priority"];

         var table_str = "<tr>" +
                      
                      
                      "<td>" + subject + "</td>" +
                      "<td>" + task_date + "</td>" +
                    
                      "<td>" + status + "</td>" +
                      "<td>" + priority + "</td>" +
                      "<td>" + action + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          });  

        edit.addEventListener("click", function(){
                $('#myModal').modal('show');
        });

      });

    var button = document.getElementById("upload");
    button.addEventListener("click", function(){

        online = window.navigator.onLine;


        if (navigator.onLine) {
          // console("onLine");
        } else {
          alert("offline");
        }


    });

  
              


        

           






        


    </script>
</body>

</html>