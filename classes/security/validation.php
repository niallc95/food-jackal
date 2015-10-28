<?php
/*
 * @category  User Input Validation (Server Side)
 * @package   classes/security
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
*/
include('../database/database-connect.php');

class Validation{
	
	public $connection;

        public function Validation()//Constructor
        {
            $this->connection = new Database;
        }

	
	/* Check if input is a valid email address */
	public function emailValidation($email)
	{
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			return false;
		}else{
			return true;	
			}
	
	}

	/* Validate date in format yyyy-mm-dd*/
	public function validMySQLDate($date){
		
		if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date)){
        		return false;
    		}else{
        		return true;
   			 }

	}
	
	/* Validate a string for alpha characters*/
	public function checkAlphaCharacter($input){
		if(!preg_match("/^[a-zA-Z ]*$/",$input)){
			return false;
		}else{
			return true;
			}
	}
	

	/* Check if a customer email already exists in database for sign up */
	public function checkEmailExistsCustomer($email,$statement)
	{
		$emailExist= false;		
			
		//Select Query
		$this->connection->connectToDatabase();//Connect to database
		$dataset = $this->connection->selectData($statement);
		$this->connection->closeConnection();
		

		if ($dataset->num_rows > 0) {
	    	 
		// output data of each row
			while($row = $dataset->fetch_assoc()) {
		 		if($row["customerEmail"] == $email){
					$emailExist = true;
				}
			}	    	 	
		} else {
     			echo "0 results";
			}
		return $emailExist;

		
	}

}//Close Class

$val = new Validation;

echo var_dump($val->validMySQLDate('1995-1-14'));



?>
