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

	/*
	* Check out forms.js and edit/view/edit_account.php (at the submission point where there are 2 form hash functions)
	* forms.js returns a variable P. In this file, we are returned 2 passwords from formhash() with identical var names.
	* How do i make 2 different variable names to associate with the correct password? 
	* Look at process_login, login, new_user, and process_new_user. 
	* SHITTY WORKAROUND MADE
	*/

	// Get old password
	$old_password = $_POST['p']; //really it should be $_POST['p'] because of forms.js


	// Check if $old_password matches up with password in database
	// Using prepared Statements means that SQL injection is not possible. 
	if ($stmt = $mysqli->prepare("SELECT password, salt FROM administrators WHERE username = ? LIMIT 1")) { 
	    $stmt->bind_param('s', $curuser); // Bind "$email" to parameter.
	    $stmt->execute(); // Execute the prepared query.
	    $stmt->store_result();
	    $stmt->bind_result($db_password, $salt); // get variables from result.
	    $stmt->fetch();
	    $old_password = hash('sha512', $old_password.$salt); // hash the password with the unique salt.
	 
	    if ($stmt->num_rows == 1) { // If the user exists

	         if ($db_password == $old_password) { // Check if the password in the database matches the password the user submitted. 
	         	$new_password = $_POST['q'];
	         	// Create a random salt
				$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
				// Create salted password (Careful not to over season)
				$new_password = hash('sha512', $new_password.$random_salt);

				if ($insert_stmt = $mysqli->prepare("UPDATE administrators SET password = ?, salt = ? WHERE username = '$curuser'")) {    
				   $insert_stmt->bind_param('ss', $new_password, $random_salt); 
				   // Execute the prepared query.
				   $insert_stmt->execute();

				   header('Location: ../admin.php');
				}
	         }
	    }
	}
}
else {
	header('Location: ../index.php');
}