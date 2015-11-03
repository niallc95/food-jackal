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
}
else{
	include "Login.php";
	session_start();
	$_SESSION['error'] = "Something went wrong. Please try again.";
}

if(isset($_POST['customer'])){
	$cust = $_POST['customer'];
$query = "SELECT * FROM Customer WHERE customerPassword='$pass' AND customerEmail='$email'";	
}
else if(isset($_POST['vendor'])){
$vend = $_POST['vendor'];
$query = "SELECT * FROM Vendor WHERE vendorPassword='$pass' AND vendorEmail='$email''";		
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
	if(isset($vend)){
		$cookie_name = "user";
	$cookie_value = $row['vendorName'];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}
	else if(isset($cust)){
	$cookie_name = "user";
	$cookie_value = $row['fname']+" "+ $row['lname'];
	setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
	}


	header('Location: ../index.php');
}
else{
	//login error, display on login page
	include "Login.php";
	session_start();
	$_SESSION['error'] = "Incorrect Username or Password. Please try again.";
}

?>
