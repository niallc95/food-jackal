<?php

/*
 * @category  MySQLi Data Access Layer
 * @package   classes/databases
 * @file      db-test.php
 * @data      26/10/15
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
 * @description This file is to test the Database class to ensure it functions correctly.
*/

include('database-connect.php');

	$connection = new Database; //Instance of Database Class
	
	$connection->connectToDatabase();//Connect to database
	
	echo '<br>';

	//Insert Query
	$insertSQL = "INSERT INTO Customer( customerFname, customerLname, customerEmail, customerAddress, customerDOB, customerAccountCreation, 	customerPassword )VALUES ('John', 'Newman', 'jm@yahoo.ie', '133 Hilltown Lawn', '1935/11/18', NOW( ) , '2324')";

	$connection-> insertData($insertSQL); 

	//Select Query
	$statement = "SELECT * FROM Customer";

	$dataset = $connection->selectData($statement);

	
	
	//Update Query
	$update = "UPDATE Customer SET customerFname='Fart' WHERE customerId=3";
	$connection -> updateDatabase($update);
	
	for($i = 61; $i <=67; $i++)
	{
	//Delete Data
	$delete = "DELETE FROM Customer
		WHERE customerId = ".$i;

	$connection -> deleteData($delete);
	echo 'Record '.$i.' deleted';
	}


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
