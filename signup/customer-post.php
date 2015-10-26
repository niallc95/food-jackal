<?

//Includes
include('');
if(!empty($_POST["fname"]) || !empty($_POST["lname"]) || !empty($_POST["address"]) || !empty($_POST["dob"]) || !empty($_POST["email"]) || !empty($_POST["pass"]) || !empty($_POST["pass2"]){

	

	
	/*Data from form*/
	$FNAME = $_POST["fname"];
	$LNAME = $_POST["lname"];
	$ADDRESS = $_POST["address"];
	$DOB = $_POST["dob"];
	$EMAIL = $_POST["email"];
	$PASSWORD = $_POST["pass"];
	$CREATE_TIMESTAMP = date("Y-m-d G:i:s");//SQL Timestamp

	

	
	


}else{
	die("Invalid Request (Form error)");
	}
?>

