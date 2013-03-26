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

	if (isset($_POST['cat_id'])) {
		$cat_id = $_POST['cat_id'];
		$query = "SELECT name, description, image, visibility FROM categories WHERE id = $cat_id";
		$result = $mysqli->query($query);

		if ($result) {
			while($row = $result->fetch_assoc()) {
				$name = $row['name'];
				$description = $row['description'];
				$image = $row['image'];
				$visibility = $row['visibility'];
			}
		}

		include 'views/edit_category.php';
	}
	
}
else {
	header('Location: ../index.php');
}