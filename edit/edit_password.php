<?php
include '../common/dbconnect.php';
include '../common/functions.php';
sec_session_start();
// Set current user name in variable so header.php works properly
$curuser = "";

if(login_check($mysqli) == true) {

	//Set username to variable
	if(isset($_SESSION['username'])) {	
		$curuser = $_SESSION['username'];
	}

	// Test for errors
	if(mysqli_connect_errno()) {
	 	echo mysqli_connect_error();
	}

	include 'views/edit_password.php';
}
else {
	header('Location: ../index.php');
}