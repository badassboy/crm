<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");

class Business{

	function testInput($data)
	{

		$data = trim($data);

		$data = stripslashes($data);

		$data = htmlspecialchars($data);

		return $data;
	}

	public function registerAdmin($username,$email,$password)
	{
		try{
		$dbh = DB();

		$validated_email = filter_var($email,FILTER_SANITIZE_EMAIL);
		$current_date = date("Y-m-d");
		
		$hashed = password_hash($password,PASSWORD_BCRYPT);
		$stmt = $dbh->prepare("INSERT INTO admin(username,email,password,register_date) VALUES(?,?,?,?)");
		$stmt->execute([$username,$validated_email,$hashed,$current_date]);
		$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}

	}catch(PDOException $ex){
		return $ex->getMessage();
	}
		
	}

	public function getCompanyDetails()
	{
		try{

			$db = DB();
		$stmt = $db->query("SELECT * FROM admin");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;

		}catch(PDOException $ex){
			return $ex->getMessage();
		}
		

	}

	public function getCustomerDetails($id)
	{	
		try{
			$db = DB();
		$stmt = $db->prepare("SELECT contact.location, contact.mobile
			FROM contact 
			INNER JOIN invoice ON contact.company = invoice.company WHERE invoice.id = ?");
		$stmt->execute([$id]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
		}catch(PDOException $ex){
			return $ex->getMessage();
		}
		

	}



	public function getUserDate($user)
	{
		try{
			$dbh = DB();
		$stmt = $dbh->prepare("SELECT register_date FROM admin WHERE username =?");
		$stmt->execute([$user]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
		
	}



	
	


	public function loginAdmin($userInput,$password)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT id,username,email,password FROM admin WHERE username=:input or email=:input");

		$stmt->execute(["input" => $userInput]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$count = $stmt->rowCount();
		if ($count == 1) {
			
			if (password_verify($password, $data['password'])) {
				return $data;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}

	public function sendEmail($email)
	{
		$dbh = DB();

			// validate email

		try{

					// checking if user email already exist in the  system
			$stmt = $dbh->prepare("SELECT * FROM admin  WHERE email = ?");
			$stmt->execute([$email]);
			while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$id = $data['id'];


						// Send email to user with the token in a link they can click on
				$to = $email;

				$subject = "Account Activation";



				$msg = "Click <a href='https://online.lemonfirmbank.com/admin/activate.php?id=$id'>here</a> to activate your account";

				$headers[] = 'MIME-Version: 1.0';
				$headers[] = 'Content-type: text/html; charset=iso-8859-1';

				$email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));
				if ($email_sent) {
					return true;
				}else {
					return false;
				}



			}
		}catch(ErrorException $ex){
			echo "Message: ".$ex->getMessage();
		}
	}

	public function sendForgetEmail($email)
	{

		$dbh = DB();
		$validated_email = filter_var($email,FILTER_VALIDATE_EMAIL);
		if ($validated_email) {

			try{

					// checking if user email already exist in the  system
				$stmt = $dbh->prepare("SELECT * FROM admin  WHERE email = ?");
				$stmt->execute([$validated_email]);
				while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
					$id = $data['id'];


						// Send email to user with the token in a link they can click on
					$to = $validated_email;

					$subject = "Password Reset Email";

					$msg = "Click <a href='reset_email.php?id=$id'>here</a> to activate your account";

					$headers[] = 'MIME-Version: 1.0';
					$headers[] = 'Content-type: text/html; charset=iso-8859-1';

					$email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));
					if ($email_sent) {
						return true;
					}else {
						return false;
					}



				}
			}catch(ErrorException $ex){
				echo "Message: ".$ex->getMessage();
			}

			
		}else {
			echo '<div class="alert alert-danger" role="alert">Invalid Email</div>';
		}

	}

	public function ResetUserPassword($id,$password,$password2)
	{

		$dbh = DB();
		if ($password != $password2) {
			echo '<div class="alert alert-danger" role="alert">Password does not match</div>';
		}else if (strlen($password)<6) {
			echo '<div class="alert alert-danger" role="alert">Password too short</div>';
			
		}else {

			$hashed_password = password_hash($password,PASSWORD_BCRYPT);

			$stmt = $dbh->prepare("UPDATE admin SET password =? WHERE id = ?");
			$stmt->execute([$hashed_password,$id]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}

		}
		

	}

	public function confirmEmail($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM admin WHERE id = ?");
		$stmt->execute([$id]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user) {

			if ($user['verified'] == "No") {
				$stmt = $dbh->prepare("UPDATE admin SET verified = 'yes' WHERE id=?");
				$stmt->execute([$id]);
				$data = $stmt->rowCount();
				if ($data>0) {
					return true;
				}else {
					return false;
				}
			}
			
		}else {
			echo "user account does not exist";
		}
		
	}

	public function welcomeMessage($email)
	{
		$to = $email;

		$subject = "Getting Started with Cloudsoft CRM";

		$msg = "Dear User, Thanks for signing up and we glad to have you aboard.<br>
		Over the next 15 days, you'll get to evaluate Zoho CRM and all of its features. Whether you're looking to organize your data in a centralized place, automate aspects of your business process, or you're simply ready to make a move to the cloud, we're excited to start this journey with you.
		<br> Thank you. Whatsapp: +233545804166";

		$headers[] = 'From:No reply';
		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		$email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));
		if ($email_sent) {
			return true;
		}else {
			return false;
		}

	}


	// Add services info
	public function serviceInfo(array $serviceArray)
	{
		// Validate input array keys to avoid potential issues
    $requiredKeys = ['title', 'status', 'duration', 'price', 'location', 'description'];
    foreach ($requiredKeys as $key) {
        if (!array_key_exists($key, $serviceArray)) {
            // Handle missing key error here
            return false;
        }
    }

		// get key fields from the array
		$title = $serviceArray['title'];
		$status = $serviceArray['status'];
		$duration = $serviceArray['duration'];
		$price = $serviceArray['price'];
		$location = $serviceArray['location'];
		$description = $serviceArray['description'];

		try{

			$dbs = DB();

	$stmt = $dbs->prepare("INSERT INTO service(title,status,duration,rate,location,description) VALUES(?,?,?,?,?,?)");
	$stmt->execute(array($title,$status,$duration,$price,$location,$description));
	$inserted = $stmt->rowCount();
	if($inserted>0){
		return true;
	}else {
		return false;
	}

		}catch(PDOException $ex){
			return $ex->getMessage();
		}
	

}
	
	// shows all services info
	public function displayServiceInfo()
	{
		try{
			$db = DB();
		$stmt = $db->query("SELECT * FROM service");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
		
	}

	public function addContact(array $contactArray)
	{	

		$firstName = $contactArray['firstName'];
		$middleName = $contactArray['middle_name'];
		$lastName = $contactArray['last_name'];
		$company = $contactArray['company'];
		$email = $contactArray['email'];
		$status = $contactArray['status'];
	
		$mobile = $contactArray['mobile'];
		$whatsapp = $contactArray['whatsapp'];
		$location = $contactArray['location'];
		$source = $contactArray['source'];


		try{

			$db=DB();

		
		// insert data after all validation is passed
			$stmt =$db->prepare("INSERT INTO contact(firstName,middle_name,lastName,company,email,
				status,mobile,whatsapp,location,source_lead) 
			VALUES(?,?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$firstName,$middleName,$lastName,$company,$email,$status,
		$mobile,$whatsapp,$location,$source]);
			$inserted = $stmt->rowCount();
			if ($inserted>0){
				return true;
			}else {
				return false;
			}

		}catch(PDOException $ex){
			return $ex->getMessage();
		}

	}

	public function allContact()
	{
		try{
			$db= DB();
		$stmt=$db->query("SELECT * FROM contact");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
  }

	public function addNote($note,$id)
	{
		$db=DB();
		$stmt=$db->prepare("UPDATE contact SET note=? WHERE id=?");
		$stmt->execute([$note,$id]);
		$updated = $stmt->rowCount();
		if ($updated>0) {
			return true;
		}else {
			return false;
		}

	}




	


	public function createInvoice($invoice_number,$customer,$item,$invoice_date,$payment_due,$validity,
        $amount,$totalAmount,$balance,$status,$note)
	{
		$db=DB();
		
		
		$stmt =$db->prepare("INSERT INTO invoice(invoice_number,customer,item,invoice_date,payment_due,validity,amount,total_amount,balance,status,note)VALUES(?,?,?,?,?,?,?,?,?,?,?)");
			$stmt->execute([$invoice_number,$customer,$item,$invoice_date,$payment_due,$validity,
        $amount,$totalAmount,$balance,$status,$note]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return false;
			}
		
		

	}


	public function getInvoice()
	{
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM invoice");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function editInvoice($invoice_number,$customer,$item,$invoice_date,$payment_due,$validity,$total_amount,$note,$id)
	{	
		$db = DB();
        $stmt = $db->prepare("UPDATE invoice SET invoice_number = ?,customer = ?,item = ?,invoice_date =?, payment_due = ?, validity = ?, total_amount = ?, note= ? WHERE id = ?");
		$stmt->execute([$invoice_number,$customer,$item,$invoice_date,$payment_due,$validity,$total_amount,$note,$id]);
		$row = $stmt->rowCount();
		if ($row>0) {
			return true;
		}else {
			return false;
		}
		
	}

	public function getEmail(){
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM admin");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getCustomerEmail(){
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM contact");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function invoiceEmail(){
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM invoice");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function updateInfo($email,$info)
	{
		$db = DB();
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			echo '<div class="alert alert-danger" role="alert">Invalid Email</div>';
			
		}else {
			$stmt = $db->prepare("UPDATE admin SET email = ? WHERE username =?");
			$stmt->execute([$email,$info]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		
	}

	public function updatePassword($new_password, $cpwd,$info)
	{
		$db = DB();
		if (strlen($new_password)<6) {
			echo '<div class="alert alert-danger" role="alert">Password too short</div>';
			
		}elseif($new_password != $cpwd){
			echo '<div class="alert alert-danger" role="alert">Password does not match</div>';

		}else {

			$hashed = password_hash($new_password,PASSWORD_BCRYPT);

			$stmt = $db->prepare("UPDATE admin SET password = ? WHERE username =?");
			$stmt->execute([$hashed,$info]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}

		}
	}

	public function deleteAccount($info){
		$db = DB();
		$stmt = $db->prepare("DELETE FROM admin WHERE username = ?");
		$stmt->execute([$info]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

	// inventory
	// products
	public function addItem($product,$status,$quantity,$price,$category,$description)
	{
		$dbh = DB();
		$itemID = rand();

		

	$stmt = $dbh->prepare("INSERT INTO item(itemName,status,quantity,price,category,description,itemID) VALUES(?,?,?,?,?,?,?)");
	$stmt->execute([$product,$status,$quantity,$price,$category,$description,$itemID]);
	$inserted = $stmt->rowCount();
	if($inserted>0){
		return true;
	}else {
		return false;
	}

}

public function getItems()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM item");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
		

	}


	public function getSortedItem()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM item LIMIT 1");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;

	}
	// end of items

		// Suppliers
		public function addSupplier($name,$address,$email,$contact,$current_date)
		{

			$dbh = DB();
			$stmt = $dbh->prepare("INSERT INTO suppliers(name,address,email,contact,sup_date)
				VALUES(?,?,?,?,?)");
			$stmt->execute([$name,$address,$email,$contact,$current_date]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		public function getSuppliers()
		{	
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT * FROM suppliers");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
			

		}

		public function deleteSupplier($id)
		{
			$dbh = DB();
			$stmt = $dbh->prepare("DELETE FROM suppliers WHERE id = ?");
			$stmt->execute([$id]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}
		// Suppliers

		// Categories
		public function addCategory($catCode,$catName,$catDesc,$current_date)
		{

			$dbh = DB();
			$stmt = $dbh->prepare("INSERT INTO categories(cat_code,cat_name,cat_desc,cat_date)
				VALUES(?,?,?,?)");
			$stmt->execute([$catCode,$catName,$catDesc,$current_date]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		public function getCategories()
		{	
			$dbh = DB();
			$stmt = $dbh->prepare("SELECT * FROM categories");
			$stmt->execute();
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			return $data;
			

		}

		

	public function purchase($itemNumber,$itemName,$quantity,$price,$purchaseDate,$vendor,$currentStock)
	{

		$dbh = DB();
		$purchaseID = rand();
		$stmt = $dbh->prepare("INSERT INTO purchase(itemNumber,itemName,quantity,price,purchase_date,vendor,current_stock,purchaseID) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$itemNumber,$itemName,$quantity,$price,$purchaseDate,$vendor,$currentStock,$purchaseID]);
		$inserted = $stmt->rowCount();
		if($inserted>0){
			return true;
		}else {
			return false;
		}

	}

	public function getPurchase()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM purchase");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;

	}

	public function vendor($fullName,$phone,$email,$address,$city,$vendor_date)
	{
		$dbh = DB();
		$vendorID = rand();
		$stmt = $dbh->prepare("INSERT INTO vendor(fullName,phone,email,address,city,vendor_date,vendorID) VALUES(?,?,?,?,?,?,?)");
		$stmt->execute([$fullName,$phone,$email,$address,$city,$vendor_date,$vendorID]);
		$inserted = $stmt->rowCount();
		if($inserted>0){
			return true;
		}else {
			return false;
		}

	}


	public function sales($customer,$salesDate,$payment,$category,$product,$quantity,$unit_price)
	{
		$dbh = DB();
		$saleID = rand();
		$stmt = $dbh->prepare("INSERT INTO sales(customer,salesDate,payment,category,itemName,quantity,price,saleID) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$customer,$salesDate,$payment,$category,$product,$quantity,$unit_price,$saleID]);
		$inserted = $stmt->rowCount();
		if($inserted>0){
			return true;
		}else {
			return false;
		}
	}

	

	public function getSales()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM sales");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	} 

	// sales Returns
	public function salesReturns($customer,$product,$quantity,$payment_method,$current_date)
	{
		
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO sales_returns(customer,product,quantity,payment_method,return_date) VALUES(?,?,?,?,?)");
		$stmt->execute([$customer,$product,$quantity,$payment_method,$current_date]);
		$inserted = $stmt->rowCount();
		if($inserted>0){
			return true;
		}else {
			return false;
		}

	}

	//purchase returns
	public function purchaseReturns($customer,$product,$quantity,$return_status,$current_date)
	{
		
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO purchase_returns(customer,product,quantity,return_status,return_date) VALUES(?,?,?,?,?)");
		$stmt->execute([$customer,$product,$quantity,$return_status,$current_date]);
		$inserted = $stmt->rowCount();
		if($inserted>0){
			return true;
		}else {
			return false;
		}

	}


	public function customer($fullName,$phone,$whatsapp,$email,$location,$current_date)
	{
		$dbh = DB();
		$custID = rand();
		$stmt = $dbh->prepare("INSERT INTO customer(fullName,phone,whatsapp,email,location,cust_date,customerID) VALUES(?,?,?,?,?,?,?)");
		$stmt->execute([$fullName,$phone,$whatsapp,$email,$location,$current_date,$custID]);
		$inserted = $stmt->rowCount();
		if($inserted>0){
			return true;
		}else {
			return false;
		}

	}

	public function getCustomers()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM customer");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function itemReport()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM item");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
	// inventory




	//lead generation
	public function leads($fullName,$title,$phone,$lead_source,$industry,$email,$company,$rating)
	{
		try{
			$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO leads(fullName,title,phone,lead_source,industry,email,company,rating) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$fullName,$title,$phone,$lead_source,$industry,$email,$company,$rating]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
		
	}

	// show all leads info
	public function displayLeads(){
		try{
			$dbh = DB();
		$stmt = $dbh->query("SELECT * FROM leads");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
		
		
	}

	public function deleteLead($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("DELETE FROM leads WHERE id =?");
		$stmt->execute([$id]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}
	

	//deals
	public function deals($dealName,$contactName,$dealType,$deal_source,$amount,$closing_date,
		$revenue,$description)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO deals(dealName,contactName,dealType,deal_source,amount,closing_date,revenue,description) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$dealName,$contactName,$dealType,$deal_source,$amount,$closing_date,
			$revenue,$description]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}

	public function displayDeals(){
		try{
			$dbh = DB();
		$stmt = $dbh->query("SELECT * FROM deals");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
		
	}

	public function deleteDeals($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("DELETE FROM deals WHERE id =?");
		$stmt->execute([$id]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}



	public function task($subject,$dueDate,$assigned_member,$start_time,$end_time,$completion_duration,
		$status,$priority,$description)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO task(subject,dueDate,assigned_member,start_time,end_time,completion_duration,status,priority,description) 
			VALUES(?,?,?,?,?,?,?,?,?)");
		$stmt->execute([$subject,$dueDate,$assigned_member,$start_time,$end_time,$completion_duration,$status,$priority,$description]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}

	public function displayTask(){
		try{
			$dbh = DB();
		$stmt = $dbh->query("SELECT * FROM task");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}

	}

	public function deleteTask($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("DELETE FROM task WHERE id =?");
		$stmt->execute([$id]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

	public function meeting($title,$service,$location,$assigned_member,$meeting_date,$from,$to,$related)
	{
		try{

			$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO meeting(title,service,location,assigned_member,meeting_date,meeting_start,meeting_end,related) 
			VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$title,$service,$location,$assigned_member,$meeting_date,$from,$to,$related]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}catch(PDOException $ex){
		return $ex->getMessage();
	}
		

	}

	public function displayMeeting(){
		try{
			$dbh = DB();
		$stmt = $dbh->query("SELECT * FROM meeting");
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}catch(PDOException $ex){
		return $ex->getMessage();
	}
	}

	public function deleteMeeting($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("DELETE FROM meeting WHERE id =?");
		$stmt->execute([$id]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

	public function calls($contact,$related,$call_date,$call_time,$subject,$reminder,$purpose,$agenda)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO calls(contact,related,call_date,call_time,subject,reminder,purpose,agenda) VALUES(?,?,?,?,?,?,?,?)");
		$stmt->execute([$contact,$related,$call_date,$call_time,$subject,$reminder,$purpose,$agenda]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

	public function deleteCalls($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("DELETE FROM calls WHERE id =?");
		$stmt->execute([$id]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}

	public function getCalls()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM calls");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}


	// standard Upgrade
	public function addService($service,$rate,$description)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("INSERT INTO service(name,rate,description) VALUES(?,?,?)");
		$stmt->execute([$service,$rate,$description]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

	public function getServices()
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT name FROM service");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}



	public function addOrders($order_date,$client,$mobile,$service,$rate,$paidAmount,$dueAmount,
		$paymentType,$status,$place)
	{
		$dbh = DB();

		$stmt = $dbh->prepare("INSERT INTO service_orders(order_date,client,mobile,service,rate,paidAmount,dueAmount,paymentType,status,place) VALUES(?,?,?,?,?,?,?,?,?,?)");

		$stmt->execute([$order_date,$client,$mobile,$service,$rate,$paidAmount,$dueAmount,
		$paymentType,$status,$place]);

		$data = $stmt->rowCount();

		if ($data>0) {
		  return true;
		}else {
			return false;
		}

	}



	public function manageOrders($id)
	{
		$dbh = DB();
		$stmt = $dbh->prepare("SELECT * FROM service_orders WHERE id =?");
		$stmt->execute([$id]);
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;

	}
	// standard Upgrade

















}








?>