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

	if (isset($_POST['sol_id'])) {
		$sol_id = $_POST['sol_id'];
		$query = "SELECT name, description, company, image, popularity, visibility, category FROM solutions WHERE id = $sol_id";
		$result = $mysqli->query($query);
		if($result){
			// Cycle through results
			while ($row = $result->fetch_assoc()) {
				$name = $row['name'];
				$description = $row['description'];
				$sol_cat = $row['category'];
				$company = $row['company'];
				$image = $row['image'];
				$popularity = $row['popularity'];
				$visibility = $row['visibility'];
			}
		}

		$query2 = "SELECT name FROM categories";

		include 'views/edit_solution.php';
	}

}
else {
	header('Location: ../index.php');
}