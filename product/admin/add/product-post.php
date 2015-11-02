<?php
/*
 * @category  Push data to database
 * @package   add/product
 * @file      product-post.php
 * @data      26/10/15
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
*/
//Includes
include('../../../classes/security/validation.php');
include('../../../classes/database/database-connect.php');
include('../../../classes/maths/math.php');

$connection = new Database;
$validate = new Validation;
$math = new Maths;

if($_POST){
	$title = base64_encode($_POST['productTitle']);
	$price = $math->truncate_number($_POST['productPrice']);
	$description = base64_encode($_POST['description']);
	$vendorId = 1;//Temp set to 1 until login is fully working

	$errors = array();//Array to hold error messages
	



?>	
	
	<?php 
	/* Server Side Validation performed here */
	
	
		
		//Check if title is null
		if(empty($title)){
			array_push($errors, "Title can't be empty");
		}		
		
		//Check if description is empty
		if(empty($description)){
			array_push($errors, "Description can't be empty");
		}		

		//Check if price is empty
		if(empty($price)){
			array_push($errors, "Price can't be empty");
		}		


		
	if(count($errors) < 1){	
	?>
	<!-- Display the account summary after submission after server side validation -->
    	<script type="text/javascript">resetForm()</script>
    	<p class="success">Product Successfully Added</p>
   	
	<?php
	//Push data to the database 
	$connection->connectToDatabase();
	$insert = "INSERT INTO Product( productTitle, productPrice, productDesciption, productAddedDate, vendorId)VALUES ('$title', '$price', '$description', NOW(),'$vendorId')";
	$connection-> insertData($insert);
	$connection->closeConnection();
	?>
	
	
	
	<?php
	}else{//Print All the errors instead of the account summary
		
		echo '<div style="margin-top:20px; border:1px solid white;">';		
		for($i=0; $i < count($errors); $i++){
			
			echo '<center><span class="error">'.$errors[$i].'</span></center><br>';
		}//Close for loop
		echo '<script type="text/javascript">resetForm()</script>';
		echo '</div>';
	     }


	?>



	
	

<?php	
}else{
	echo '<p class="error align-center">Internal Server Error, please try again later.</p>';
}
?>
