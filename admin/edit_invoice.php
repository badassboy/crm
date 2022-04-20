<?php

require("../database.php");
$db = DB();
$id = "";

$msg = "";
	
	$id = $_GET['edit'];

	if (isset($id)) {


		$stmt = $db->prepare("SELECT * FROM invoice WHERE id = ?");
		$stmt->execute([$id]);
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $invoice_id = $row['id'];
			// $title  = $row['title'];
			// $description = $row['full_description'];
		}
	}else {
		echo  "no";
	}


    if(isset($_POST['update'])){

        $travel_country = $_POST['travel_country'];
        $next_of_kin = $_POST['next_of_kin'];
        $travel_purpose = $_POST['travel_purpose'];
        $note = $_POST['note'];
        $id = $_POST['id'];

        $stmt = $db->prepare("UPDATE invoice SET travel_country = ?,next_of_kin = ?,travel_purpose = ?,note =?
         WHERE id = ?");
		$stmt->execute([$travel_country,$next_of_kin,$travel_purpose,$note,$id]);
		$row = $stmt->rowCount();
		if ($row>0) {
			$msg = '<div class="alert alert-success" role="alert">Invoice Updated</div>';
		}else {
			$msg =  '<div class="alert alert-danger" role="alert">Failed to update invoice</div>';
		}


    }


?>




<!DOCTYPE html>
<html>
<head>
	<title></title>
   <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

   <style type="text/css">
   	
   	*{
   		margin: 0;
   		padding: 0;
   		box-sizing: border-box;
   		font-family: 'Raleway', sans-serif;
   	}

   	

   	.edit-page{

   		background-color:#f2f2f2;
   		height: 800px;
   		display: flex;
   	   flex-direction: row;
   	   flex-wrap: wrap;
   	   justify-content: center;
   	   align-items: center;

   	}


   	.edit-form {
   		background-color: hsl(0, 0%, 100%);
   		height: 640px;
   		width: 50%;
   		padding-top: 3%;

   	}

   	.edit-form h3 {
   		padding-top: 7%;
   		padding-left: 30%;
   		padding-bottom: 1%;
   		font-weight: bolder;
   	}

   	 input[type=text] {
   		width: 100%;
   		/*margin-left: 30%;*/
   		font-size: 20px;
   	}

   	form label {
   		padding-left: 30%;
   		font-weight: bolder;
   	}


   	.btn-primary {
   		width: 100%;
   		height: 40px;
   		/*margin-left: 30%;*/
   		border: 2px solid ##e6e600;
   		font-weight: bolder;
   	}

   </style>

</head>
<body>

	<div class="container-fluid edit-page">

		<div class="container edit-form">
			<?php

			if (isset($msg)) {
				echo $msg;
			}

			?>
			<h3>Edit Invoice</h3>
			<form method="post" action="">

			  <div class="form-group">
			    <label for="exampleInputEmail1">Travelling Country</label>
			     <select class="form-control" name="travel_country">
			      <option value="usa">USA</option>
			      <option value="canada">Canada</option>
			      <option value="australia">Australia</option>
			      <option value="china">China</option>
			      <option value="india">India</option>
			      <option value="europe">Europe</option>
			    </select>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Next of kin</label>
			    <input type="text" name="next_of_kin" class="form-control">
			  </div>


			  <div class="form-group">
			    <label>Travelling Purpose</label>
			    <select class="form-control" name="travel_purpose">
			         <option value="study">Study Abroad</option>
			         <option value="tourism">Tourism</option>
			         <option value="live">Live and work</option>
			       </select>
			  </div>

			  <div class="form-group">
			    <label for="exampleInputEmail1">Note</label>
			    <textarea class="form-control" name="note" rows="3" cols="3"></textarea>
			  </div>


			  <div class="form-group">
			  	<input type="hidden" name="id" value="<?php echo $invoice_id; ?>">
			  </div>


			  <button type="submit" name="update" class="btn btn-primary">Update</button>
			</form>
		</div>
		
	</div>

	




	 <!-- jQuery CDN  -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	
	 <!-- Bootstrap JS -->
	<script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
</body>
</html>