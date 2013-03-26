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

	$query = "SELECT * FROM administrators WHERE username = '$curuser'";
	$result = $mysqli->query($query);
	if($result){
		// Cycle through results
		while ($row = $result->fetch_assoc()) {
			$email = $row['email'];
			$firstname = $row['firstname'];
			$lastname = $row['lastname'];
			$position = $row['position'];
			$address = $row['address'];
			$description = $row['description'];
			$image = $row['image'];
			$contact_display = $row['contact_display'];
		}
	}

	include 'views/edit_account.php';
}
else {
	header('Location: ../index.php');
}