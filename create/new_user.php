<?php
include '../common/dbconnect.php';
include '../common/functions.php';
sec_session_start();
// Set current user name in variable so header.php works properly
$curuser = "";

if(login_check($mysqli) == true) {

	if(isset($_SESSION['username'])) {	
		$curuser = $_SESSION['username'];

		// Test for errors
		if(mysqli_connect_errno()){
		 	echo mysqli_connect_error();
		}

	 	include 'views/new_user.php';
	}
}

else {
	header('Location: ../index.php');
}
?>