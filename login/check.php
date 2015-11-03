<?php

//if user is logged in already
if(isset($_COOKIE['user'])){
	header("Location: ../index.php");
}

//if the user tries to open this script without form action
if(!(isset($_POST['email']))&&(!(isset($_POST['pass'])))&&((!(isset($_POST['customer'])))or(!(isset($_POST['vendor']))))){
	header("Location: ../index.php");
}

include('../food-jackal/classes/database/database-connect.php');

$con = new Database;
$con->connectToDatabase();

if(isset($_POST['submit'])){_
$email = $_POST['email'];
$pass = $_POST['pass'];
$cust = $_POST['customer'];
$vend = $_POST['vendor'];
}
else{
	include "Login.php";
	session_start();
	$_SESSION['error'] = "Something went wrong. Please try again.";
}

if(isset($_POST['customer'])){
$query = "SELECT * FROM users WHERE password='$pass' AND email='$email'AND position='$cust'";	
}
else if(isset($_POST['vendor'])){
$query = "SELECT * FROM users WHERE password='$pass' AND email='$email' AND position='$vend'";		
}
else{
	header("Location: ../index.php");
}


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
