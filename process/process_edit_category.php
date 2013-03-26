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

	//If forms were not filled out, die
	if(count($_POST) == 0) {
		die();
	}

	// Test for errors
	if(mysqli_connect_errno()) {
	 	echo mysqli_connect_error();
	}

	// Get solution id
	$cat_id = $_POST['cat_id'];
	// Get old category name
	$old_name = $_POST['old_category'];
	// Get name
	$name = strip_tags($_POST['name']);
	// Get description
	$description = strip_tags($_POST['description'], "<br> <b> <u>");
	// Get image
	$image = strip_tags($_POST['image']);
	// Get visibility
	$visibility = $_POST['visibility'];

	// Check each variable for data and make multiple queries
	// There has to be a better way to do this...
	if (strlen($name) > 0) {
		// Update category name
		if ($insert_stmt = $mysqli->prepare("UPDATE categories SET name = ?, visibility = ? WHERE id = $cat_id ")) {    
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement
			$insert_stmt->bind_param('si', $name, $visibility); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
		// Update category name in solutions where solutions are in old_category name
		if ($insert_stmt = $mysqli->prepare("UPDATE solutions SET category = ? WHERE category = ?")) {
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement
			$insert_stmt->bind_param('ss', $name, $old_name); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
	}
	if (strlen($description) > 0) {
		//Insert data into solutions
		if ($insert_stmt = $mysqli->prepare("UPDATE categories SET description = ? WHERE id = $cat_id ")) {    
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement
			$insert_stmt->bind_param('s', $description); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
	}
	if (strlen($image) > 0) {
		//Insert data into solutions
		if ($insert_stmt = $mysqli->prepare("UPDATE categories SET image = ? WHERE id = $cat_id ")) {    
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement
			$insert_stmt->bind_param('s', $image); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
	}
	//Insert data into solutions
	if (strlen($name) > 0 || strlen($description) > 0) {    
		if($stmt = $mysqli->prepare("SELECT name FROM categories WHERE id = ? ")) { 
			$stmt->bind_param('i', $cat_id); // bind paramaters
			$stmt->execute(); // execute
			$stmt->store_result(); // store result
			$stmt->bind_result($name); // get variables from result.
			$stmt->fetch();
			Header("Location: ../categories.php?name=$name");
		}
	}
	if (strlen($name) == 0 && strlen($description) == 0) {
		echo "You didn't make any changes...";
	}
}
else {
	header('Location: ../index.php');
}