<?php

class Database{
	
	//Database details
	$username = "FoodJackal";
	$password = "Project2015";
	$host = "localhost";


	function emailValidation($email){
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			return false;
		}else{
			return true;	
			}
	
	}//Close checkEmailRegEx()



}//Close Class

?>
