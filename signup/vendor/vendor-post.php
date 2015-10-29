<?php
/*
 * @category  Push data to database
 * @package   signup
 * @file      customer-post.php
 * @data      26/10/15
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
*/
//Includes
include('../../classes/security/validation.php');
include('../../classes/database/database-connect.php');

$connection = new Database;
$validate = new Validation;

if($_POST){
	$cName = $_POST['companyName'];
	$addressLine1 = $_POST['addressLine1'];
	$addressLine2 = $_POST['addressLine2'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];
	$description = base64_encode($_POST['description']);
	$email = $_POST['email'];
	$pass1 = $_POST['pw1'];
	$pass2 = $_POST['pw2'];


	$errors = array();//Array to hold error messages
	



?>	
	
	<?php 
	/* Server Side Validation performed here */
		
	
		

		/* Check if email already exists in database*/
		$emailExist= false;		
		
		$statement = 'SELECT vendorEmail FROM Vendor';
		//Select Query
		$connection->connectToDatabase();//Connect to database
		$dataset = $connection->selectData($statement);
	
		


		if ($dataset->num_rows > 0) {
	    	 
		// output data of each row
			while($row = $dataset->fetch_assoc()) {
		 		if($row["vendorEmail"] == $email){
					$emailExist = true;
				}
			}	    	 	
		}
	
		
		
		
		if($emailExist){
			array_push($errors, "Company email ".$email." already exists.");
		}
		/* End Check Email Exists */		
		
		/* */
		if(empty($description)){
			array_push($errors, "Description can't be empty.");
		}
		
		
		//Check if phone number is valid
		if(!$validate->checkIrishLandline($phone) || empty($phone)){	
			array_push($errors, "Invalid Phone Number format. Use (00)0000000");
		}
		
		//Check if company name is null
		if(empty($cName)){
			array_push($errors, "Company Name can't be empty.");
		}		
		
		//Check if addressline 1 or 2 is empty
		if(empty($addressLine1) || empty($addressLine2)){
			array_push($errors, "Address can't be empty");
		}

		//Check if city is empty and is alpha
		if(!$validate->checkAlphaCharacter($city) || empty($city)){
			array_push($errors, "City must be only alpha characters");
		}			
	
		//Check if passwords match or a greater than 6 character
		if($pass1 != $pass2 || empty($pass1)){
			array_push($errors, "Passwords do not match.");
		}
		//Check password size >= 6 
		if(strlen($pass1) < 6){
			array_push($errors, "Password must at least 6 character in length.");
		}

		
	if(count($errors) < 1){	
	?>
	<!-- Display the account summary after submission after server side validation -->
    	<table style="width:100%;"> 
		<tr>
			<center><th colspan="2">Welcome to Food Jackal <?php echo $cName;?></th></center>
		</tr>
		
		<tr>
			<center><th colspan="2">Company Account Summary</th></center>
		</tr>
		
		<tr>
			<td>Company Name:</td>
			<td><?php echo $cName;?></td>	
		</tr>
		<tr>
			<td>Address Line 1:</td>
			<td><?php echo $addressLine1;?></td>	
		</tr>
		<tr>
			<td>Address Line 2:</td>
			<td><?php echo $addressLine2;?></td>	
		</tr>
		<tr>
			<td>Phone Number:</td>
			<td><?php echo $phone;?></td>	
		</tr>
		<tr>
			<td>Email Address:</td>
			<td><?php echo $email;?></td>	
		</tr>
	</table>
	<center>
		<h3> To add products to <?php echo $cName;?>'s product listing go to the settings tab once logged in. </h3>
	</center>

   	<script type="text/javascript">resetForm()</script>
	
	<?php
	//Push data to the database 
	$insert = "INSERT INTO Vendor(vendorName, vendorAddressLine1, vendorAddressLine2, vendorCity, vendorTelephone, vendorAccountCreation, vendorLogoImageName,vendorDescription,vendorEmail,vendorPassword )VALUES ('$cName', '$addressLine1', '$addressLine2', '$city','$phone', NOW( ),'logo.jpg','$description','$email' , '$pass1')";
	$connection-> insertData($insert);
	$connection->closeConnection();
	?>
	
	
	
	<?php
	}else{//Print All the errors instead of the account summary
		
		echo '<div style="margin-top:20px; border:1px solid white;">';		
		for($i=0; $i < count($errors); $i++){
			
			echo '<center><span class="error">'.$errors[$i].'</span></center><br>';
		}//Close for loop
		echo '<script type="text/javascript">resetPassword()</script>';
		echo '</div>';
	     }


	?>



	
	

<?php	
}
?>
