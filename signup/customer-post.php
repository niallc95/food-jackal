<?

//Includes
include('../classes/security/security.php');
include('../classes/database/database-connect.php');

if(!empty($_POST["fname"]) || !empty($_POST["lname"]) || !empty($_POST["address"]) || !empty($_POST["dob"]) || !empty($_POST["email"]) || !empty($_POST["pass"])){

	/*Error Handling*/
	
	

	/*Data from form*/
	$FNAME = $_POST["fname"];
	$LNAME = $_POST["lname"];
	$ADDRESS = $_POST["address"];
	$DOB = $_POST["dob"];
	$EMAIL = $_POST["email"];
	$PASSWORD = $_POST["pass"];
	$CREATE_TIMESTAMP = date("Y-m-d G:i:s");//SQL Timestamp

	//New Instance of security class
	$security = new Security;

	
	if($security -> emailValidation($EMAIL) == false){
		die("Invalid Email");
	}
	
	


}else{
	die("Invalid Request (Form error)");
	}
?>


