<?php
	
/*@author Graham Murray
* @description This file is to test the database connection class
*
*/

include('database-connect.php');

	$connection = new Database; //Instance of Database Class
	
	$connection->connectToDatabase();//Connect to database
	
	echo '<br>';

	//Insert Query
	$insertSQL = "INSERT INTO Customer( customerFname, customerLname, customerEmail, customerAddress, customerDOB, customerAccountCreation, customerPassword )VALUES ('John', 'Newman', 'jm@yahoo.ie', '133 Hilltown Lawn', '1935/11/18', NOW( ) , '2324')";

	$connection-> insertData($insertSQL); 

	//Select Query
	$statement = "SELECT * FROM Customer";

	$dataset = $connection->selectData($statement);

	
	
	//Update Query
	$update = "UPDATE Customer SET customerFname='Fart' WHERE customerId=2";
	$connection -> updateDatabase($update);

	//Close Connection
	$connection->closeConnection();

	//List all values
	if ($dataset->num_rows > 0) {
    	 // output data of each row
    	 while($row = $dataset->fetch_assoc()) {
         	echo "<br> id: ". $row["customerId"]. " - Name: ". $row["customerFname"]." ".$row["customerLname"]. "<br>";
     	}
		} else {
     			echo "0 results";
		}
	

	
?>
