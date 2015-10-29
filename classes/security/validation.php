<?php
/*
 * @category  User Input Validation (Server Side)
 * @package   classes/security
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
*/


	
class Validation{
	


	
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
	
	/* Validate Irish Phone Number*/
	public function checkIrishLandline($input){
		if(!preg_match("/^\s*(\(?\s*\d{1,4}\s*\)?\s*[\d\s]{5,10})\s*$/",$input)){
			return false;
		}else{
			return true;
			}
	}
	

}//Close Class





?>
