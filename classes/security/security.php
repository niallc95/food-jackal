<?php

class Security{
	
	
	function emailValidation($email){
		
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  			return false;
		}else{
			return true;	
			}
	
	}//Close checkEmailRegEx()



}//Close Class

?>
