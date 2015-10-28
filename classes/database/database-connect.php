<?php
/*
 * @category  MySQLi Data Access Layer
 * @package   classes/databases
 * @file      database-connection.php
 * @data      26/10/15
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
*/
class Database{
		

	//Database details
	var $host = "localhost";
	var $username = "FoodJackal";
	var $password = "Project2015";
	var $database = "Food_Jackal";
	var $conn;
	var $result;


	/*Open Connection to the database*/
	public function connectToDatabase()
	{
		$this->conn = new mysqli($this->host,$this->username,$this->password,$this->database);

		if($this->conn->connect_error){//Testing Connection
			die("Cannot connect to database. Ref: database-connect.php");
		}
	
	

	}//Close mysql_connect
	

	/*Select Data*/
	public function selectData($sql){

		if(empty($sql)){
			die('SELECT Query Failed '.$this->conn->error);
		}
		$this->result = $this->conn->query($sql);

		return $this->result;//Return the dataset
	}
	
	
	/* Insert Data */
	public function insertData($sql){
		
		if($this->conn->query($sql) === FALSE){
			die('Insert Query Failed '.$this->conn->error);
		}

	}

	/* Update Database */
	public function updateDatabase($sql){
		if($this->conn->query($sql) === FALSE){
			die('Update Query Failed '.$this->conn->error);
		}
	}

	/* Delete Data */

	public function deleteData($sql){
		if($this->conn->query($sql) === FALSE){
			die('Delete Query Failed '.$this->conn->error);
		}
	}
	
	/*Close connection to database*/
	public function closeConnection()
	{
		$this->conn->close();
	}
	



}//Close Class



?>
