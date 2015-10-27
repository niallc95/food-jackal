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
include('../classes/security/validation.php');
include('../classes/database/database-connect.php');


if($_POST)
{
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$address = $_POST['address'];
	$dob = $_POST['dob'];
	$email = $_POST['email'];
	$pass1 = $_POST['pw1'];
	$pass2 = $_POST['pw2'];
	
?>	
	
	<?php 
	/* Server Side Validation to be performed here */
		//Check if input email already exists in database
		
	?>

	<!-- Display the account summary after submission after server side validation -->
    	<table style="width:100%;"> 
		<tr>
			<center><th colspan="2">Welcome to Food Jackal <?php echo $fname;?></th></center>
		</tr>
		
		<tr>
			<center><th colspan="2">Account Summary</th></center>
		</tr>
		
		<tr>
			<td>First Name:</td>
			<td><?php echo $fname;?></td>	
		</tr>
		<tr>
			<td>Last Name:</td>
			<td><?php echo $lname;?></td>	
		</tr>
		<tr>
			<td>Date of Birth:</td>
			<td><?php echo $dob;?></td>	
		</tr>
		<tr>
			<td>Email Address:</td>
			<td><?php echo $email;?></td>	
		</tr>

		<tr>
			<td>Password:</td>
			<td>Securely Stored and Encrypted</td>	
		</tr>
	</table>
	<center>
		<h3> To setup your payment preferences go the the settings once logged in. </h3>
	</center>
   	

	<?php
	//Push data to the database 

	$connection = new Database;

	$connection->connectToDatabase();

	$insert = "INSERT INTO Customer( customerFname, customerLname, customerEmail, customerAddress, customerDOB, customerAccountCreation, 		customerPassword )VALUES ('$fname', '$lname', '$email', '$address','$dob', NOW( ) , '$pass1')";

	$connection-> insertData($insert);

	?>
	
	

<?php	
}

?>
