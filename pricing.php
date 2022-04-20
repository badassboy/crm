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
        height: 470px;
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


        <div class="col-md-4">
         <div class="card" style="width: 18rem;">
           <div class="card-body">
             <h5 class="card-title">Free</h5>
             <p class="card-text">$0/month</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Lead Generation</li>
             <li class="list-group-item">Marketing Automation</li>
             <li class="list-group-item">Analytics</li>
           </ul>


         </div>
        </div>

        <div class="col-md-4">
         <div class="card" style="width: 18rem;">
           <div class="card-body">
             <h5 class="card-title">Basic</h5>
             <p class="card-text">$15/month</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Lead Generation</li>
             <li class="list-group-item">Marketing Automation</li>
             <li class="list-group-item">Analytics</li>
           </ul>


         </div>
        </div>

        <div class="col-md-4">
         <div class="card" style="width: 18rem;">
           <div class="card-body">
             <h5 class="card-title">Premium</h5>
             <p class="card-text">$29/month</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Lead Generation</li>
             <li class="list-group-item">Marketing Automation</li>
             <li class="list-group-item">Analytics</li>
           </ul>


         </div>
        </div>
     
   </div>

	
	</div>

	


	
<?php include("footer.php"); ?>
</body>

