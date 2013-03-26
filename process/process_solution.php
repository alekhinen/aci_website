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
	
	// Get name
	$name = strip_tags($_POST['name']);
	// Get description
	$description = strip_tags($_POST['description'], '<br>, <b>, <u>');
	// Get company
	$company = strip_tags($_POST['company']);
	// Get image
	$image = strip_tags($_POST['image']);
	// Get category
	$category = $_POST['category'];
	// Get popularity
	$popularity = $_POST['popularity'];


	//Check to see if there is any data in the variables
	if (strlen($name) > 0 && strlen($description) > 0 && strlen($company) > 0) {
		$query_check = "SELECT name FROM solutions WHERE description = '$description' AND name = '$name'"; 
		//Query the database for duplicate data
		if($result = $mysqli->query($query_check)) {
			//Get row count
			$row_count = $result->num_rows;		
			//Test if there is any duplicate data 
			if($row_count == 0){
				//Insert data into solutions
				if ($insert_stmt = $mysqli->prepare("INSERT INTO solutions (name, description, company, timestamp, creator, category, image, popularity) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {    
				   /*
				   *	i -> integer
				   *	d -> double
				   *	s -> string
				   *	b -> blob (sent in packets)
				   */
				   // Bind parameters to statement
				   $insert_stmt->bind_param('sssisssi', $name, $description, $company, time(), $curuser, $category, $image, $popularity); 
				   // Execute the prepared query.
				   $insert_stmt->execute();

					// Query for the row that was just made
					$query = "SELECT id FROM solutions ORDER BY id DESC LIMIT 1";

					if($result = $mysqli->query($query)) { 
						while($row = $result->fetch_assoc()) {
							$id = $row['id'];
							header("Location: ../solution.php?id=$id");
						}
					}
				}
			}
			//If there is duplicate data
			if($row_count > 0) {
				echo "Duplicate data detected";
			}
		}	
	}
	else {
		echo "All forms are required";
	} 
} 
else {
   header('Location: ../index.php');
}


// $mysqli->query("INSERT INTO solutions (name, description, company, timestamp, creator, category, image) VALUES ('$name', '$description', '$company', '".time()."', '$curuser', '$category', '$image')");
// $query = "SELECT id FROM solutions ORDER BY id DESC LIMIT 1";
					
//					if($result = $mysqli->query($query);) {
//						while($row = $result->fetch_assoc()) {
//							$id = $row['id'];
//							header("Location: ../solution.php?id=$id");
//						}
//					}
