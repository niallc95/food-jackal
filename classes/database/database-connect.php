<?php

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
	
		echo "Connection Established";

	}//Close mysql_connect
	

	/*Select Data*/
	public function selectData($sql){

		if(empty($sql)){
			die("Select Statement is Null. Ref: ".__FILE__);
		}
		$this->result = $this->conn->query($sql);

		return $this->result;//Return the dataset
	}
	
	
	/*Insert Data*/
	public function insertData($sql){
		
		if($this->conn->query($sql) === FALSE){
			echo '<br>'.'Insert Failed '.$this->conn->error;
		}

	}

	/*Update Database*/
	public function updateDatabase($sql){
		if($this->conn->query($sql) === FALSE){
			echo '<br>'.'Update Query Failed '.$this->conn->error;
		}
	}
	
	/*Close connection to database*/
	public function closeConnection()
	{
		$this->conn->close();
		echo '<br>'."Connection Closed";
	}
	



}//Close Class

?>
