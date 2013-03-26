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
	$description = strip_tags($_POST['description'], "<br> <b> <u>");

	//Check to see if there is any data in the variables
	if (strlen($name) > 0 && strlen($description) > 0) {
		$query_check = "SELECT name FROM categories WHERE name = '$name'"; 
		//Query the database for duplicate data
		if ($result = $mysqli->query($query_check)) {
			//Get row count
			$row_count = $result->num_rows;		
			//Test if there is any duplicate data 
			if ($row_count == 0){
				//Insert data into solutions
				if ($insert_stmt = $mysqli->prepare("INSERT INTO categories (name, description, timestamp, creator) VALUES (?, ?, ?, ?)")) {    
				   /*
				   *	i -> integer
				   *	d -> double
				   *	s -> string
				   *	b -> blob (sent in packets)
				   */
				   // Bind parameters to statement
				   $insert_stmt->bind_param('ssis', $name, $description, time(), $curuser); 
				   // Execute the prepared query.
				   $insert_stmt->execute();

					// Go to that specific category page
					Header("Location: ../categories.php?name=$name");
				}
			}
			//If there is duplicate data
			if ($row_count > 0) {
				echo "Category already exists";
			}
		}
	}
	//If name and description do not contain data
	else {
		echo "All forms are required.";
	}
}
else {
	header('Location: ../index.php');
}


/*session_start();

if(isset($_SESSION['username']))
{
	$curuser = $_SESSION['username'];

	if(count($_POST) == 0)
	{
		die();
	}

	include '../common/dbconnect.php';

	$name=mysql_real_escape_string(strip_tags($_POST['name']));
	$description=mysql_real_escape_string(strip_tags($_POST['description']));
	if (strlen($description) > 0 && strlen($name) > 0)
	{
		$querycheck = mysql_query("SELECT name FROM categories WHERE name = '$name'");
		if (mysql_num_rows($querycheck) == 0)
		{
			mysql_query("INSERT INTO categories (name, description, timestamp, creator) VALUES ('$name', '$description', '".time()."', '$curuser')") or die(mysql_error());
			$query = mysql_query("SELECT id FROM categories ORDER BY id DESC LIMIT 1");
			$row = mysql_fetch_array($query);
			$id = $row['id'];

			header("Location: ../categories.php?name=$name");
		}
		else
		{
			echo "category already exists";
		}
	}
	else
	{
		echo "The name and description are both required forms.";
	}
}
else
{
	echo "you aren't logged in.";
} */
