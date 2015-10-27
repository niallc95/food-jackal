<?php

//if user is logged in already
if(isset($_COOKIE['user'])){
	header("Locatione: ../index.php");
}

//if the user tries to open this script without form action
if(!(isset($_POST['email']))&&(!(isset($_POST['pass'])))){
	header("Location: ../index.php");
}

include('food-jackal/classes/database/database-connect.php');

$con = new Database;
$con->connectToDatabase();

$email = $_POST['email'];
$pass = $_POST['pass'];

$query = "SELECT * FROM users WHERE password='$pass' AND email='$email'";

if($result = $con->selectData($query)){
	$row_count = $mysqli_num_rows($result);	
}
else{
	//login error, display on login page
	include "Login.php";
	session_start();
	$_SESSION['error'] = "Something went wrong. Please try again.";
}

if($row_count == 1){
	//destroy error session
	session_destroy();

	//fetch matched row
	$row = mysqli_fetch_array($result);

	//make user cookie
	$cookie_name = "user";
	$cookie_value = $row['fname']+" "+ $row['lname'];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

	header('Location: ../index.php');
}
else{
	//login error, display on login page
	include "Login.php";
	session_start();
	$_SESSION['error'] = "Incorrect Username or Password. Please try again.";
}

?>
