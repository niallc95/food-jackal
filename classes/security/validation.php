<?php
/*
 * @category  User Input Validation (Server Side)
 * @package   classes/security
 * @author    Graham Murray <graham@graham-murray.com>
 * @copyright Copyright (c) 2015
*/

class Validation{
	
	/* Check if input is a valid email address */
	function emailValidation($email)
	{
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			return false;
		}else{
			return true;	
			}
	
	}



}//Close Class

?>
