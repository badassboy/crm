<?php 

include("navbar.php");



 ?>

  <style>
      .bd-placeholder-img {
        
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      /*page*/

      .signup {
        background-color:#f2f2f2;
        height: 500px;
      }

      .explanation {
        margin: auto 20%;
      }

      .text-center {
        padding-top: 2%;
      }
      
      /*page*/
    </style>


<body>

	<div class="container-fluid signup">

    <h3 class="text-center">Pricing</h3>

   

 



   <div class="row">


        <div class="col-md-3">
         <div class="card" style="width: 18rem;">
           <div class="card-body">
             <h5 class="card-title">STANDARD</h5>
             <p class="card-text">$9/Month</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Scoring Rules</li>
             <li class="list-group-item">Workflows</li>
             <li class="list-group-item">Multiple Pipelines</li>
             <li class="list-group-item">Mass Email</li>
             <li class="list-group-item">Custom Dashboard</li>
             <li class="list-group-item">Canvas(1 view/org)</li>
             <li class="list-group-item">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">REQUEST  A QUOTE</button>
            </li>

           </ul>


         </div>
        </div>

        <div class="col-md-3">
         <div class="card" style="width: 18rem;">
           <div class="card-body">
             <h5 class="card-title">PROFESSIONAL</h5>
             <p class="card-text">$25/month</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">SalesSignals</li>
             <li class="list-group-item">BluePrint</li>
             <li class="list-group-item">Web-to-Case Form</li>
             <li class="list-group-item">Validation Rules</li>
             <li class="list-group-item">Inventory Management</li>
             <li class="list-group-item">Canvas(3 views/org)</li>
             <li class="list-group-item">
              <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">REQUEST  A QUOTE</button>
            </li>

           </ul>


         </div>
        </div>

        <div class="col-md-3">
         <div class="card" style="width: 18rem;">
           <div class="card-body">
             <h5 class="card-title">ENTERPRISE</h5>
             <p class="card-text">$30/month</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">AI Implementation</li>
             <li class="list-group-item">Command Center</li>
             <li class="list-group-item">Multi-user Portals</li>
             <li class="list-group-item">Advanced Customization</li>
             <li class="list-group-item">Mobile SDK & MDM</li>
             <li class="list-group-item">Canvas(5 views/modules)</li>
             <li class="list-group-item">
              <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
              REQUEST  A QUOTE</button></li>
           </ul>

         </div>
        </div>


        <div class="col-md-3">
         <div class="card" style="width: 18rem;">
           <div class="card-body">
             <h5 class="card-title">ULTIMATE</h5>
             <p class="card-text">$40/month</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Advanced BI-bundled with Cloudsoft Analytics</li>
             <li class="list-group-item">Enhanced Feature Limit</li>
             <li class="list-group-item">Canvas(25 views/module)</li>
             <li class="list-group-item">
              <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">REQUEST  A QUOTE</button>
            </li>

           </ul>

         </div>
        </div>

     
   </div>
   <!-- end of row -->

   <!-- modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">REQUEST FOR QUOTE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Call:+233553314087</p><br>
        <p>Whatsapp:+233545804166</p>
      </div>

     <!--  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->

    </div>
  </div>
  </div>
   <!-- modal -->

  <?php include("footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

