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
	$sol_id = $_POST['sol_id'];
	// Get name
	$name = strip_tags($_POST['name']);
	// Get description
	$description = strip_tags($_POST['description'], "<br> <b> <u>");
	// Get company
	$company = strip_tags($_POST['company']);
	// Get image
	$image = strip_tags($_POST['image']);
	// Get category
	$category = $_POST['category'];
	// Get popularity
	$popularity = $_POST['popularity'];
	// Get visibility
	$visibility = $_POST['visibility'];

	// Check each variable for data and make multiple queries
	// There has to be a better way to do this...
	/*
	if (strlen($name) > 0) {
		//Insert data into solutions
		if ($insert_stmt = $mysqli->prepare("UPDATE solutions SET name = ? WHERE id = $sol_id ")) {    
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement
		/*	$insert_stmt->bind_param('s', $name); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
	} 
	if (strlen($description) > 0) {
		//Insert data into solutions
		if ($insert_stmt = $mysqli->prepare("UPDATE solutions SET description = ? WHERE id = $sol_id ")) {    
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement
		/*	$insert_stmt->bind_param('s', $description); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
	}
	if (strlen($company) > 0) {
		//Insert data into solutions
		if ($insert_stmt = $mysqli->prepare("UPDATE solutions SET company = ? WHERE id = $sol_id ")) {    
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement
		/*	$insert_stmt->bind_param('s', $company); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
	} 
	if (strlen($image) > 0) {
		//Insert data into solutions
		if ($insert_stmt = $mysqli->prepare("UPDATE solutions SET image = ? WHERE id = $sol_id ")) {    
			/*
			*	i -> integer
			*	d -> double
			*	s -> string
			*	b -> blob (sent in packets)
			*/
			// Bind parameters to statement 
	 	 /* $insert_stmt->bind_param('s', $image); 
			// Execute the prepared query.
			$insert_stmt->execute();
		}
	} */
	//Insert data into solutions
	if ($insert_stmt = $mysqli->prepare("UPDATE solutions SET category = ?, popularity = ?, visibility = ?, name = ?, 
	     													  description = ?, company = ?, image = ?  WHERE id = $sol_id ")) {    
		/*
		*	i -> integer
		*	d -> double
		*	s -> string
		*	b -> blob (sent in packets)
		*/
		// Bind parameters to statement
		$insert_stmt->bind_param('siissss', $category, $popularity, $visibility, $name, $description, $company, $image); 
		// Execute the prepared query.
		$insert_stmt->execute();

		header("Location: ../solution.php?id=$sol_id");
	}
	

}
else {
	header('Location: ../index.php');
}