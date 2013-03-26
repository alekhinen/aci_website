<?php
include '../common/dbconnect.php';
include '../common/functions.php';
sec_session_start();
// Set current user name in variable so header.php works properly
$curuser = "";

if(login_check($mysqli) == true) {
	// Set current user name in variable so header.php works properly
	if(isset($_SESSION['username'])) {	
		$curuser = $_SESSION['username'];
	}

	// Test for errors
	if(mysqli_connect_errno()){
		echo mysqli_connect_error();
	}

	// Getting the Username
	$username = strip_tags($_POST['username']);
	// Getting the email
	$email = strip_tags($_POST['email']);
	// The hashed password from the form
	$password = $_POST['p']; 
	// Create a random salt
	$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	// Create salted password (Careful not to over season)
	$password = hash('sha512', $password.$random_salt);

	// Get the security question 
	$sec_question = strip_tags($_POST['sec_question']);
	// Get the hashed security answer
	$sec_answer = $_POST['q'];
	// Create a new salt for the security answer
	$random_salt_sec = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	// Create salted security answer
	$sec_answer = hash('sha512', $sec_answer.$random_salt_sec); 
	
	if (strlen($username) > 0 && strlen($password) > 0 && strlen($sec_question) && strlen($sec_answer) > 0) {

		if ($stmt = $mysqli->prepare("SELECT username, email FROM administrators WHERE username = ? OR email = ?")) {
			$stmt->bind_param('ss', $username, $email);
			$stmt->execute();
			$stmt->store_result();
		    $stmt->bind_result($db_username, $db_email); // get variables from result.
		    $stmt->fetch();

		    if ($stmt->num_rows == 0) { // If the username or password has not been used
		    	// Make sure you use prepared statements!
				if ($insert_stmt = $mysqli->prepare("INSERT INTO administrators (username, email, password, salt, timestamp, sec_question, sec_answer, sec_salt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {    
				   $insert_stmt->bind_param('ssssisss', $username, $email, $password, $random_salt, time(), $sec_question, $sec_answer, $random_salt_sec); 
				   // Execute the prepared query.
				   $insert_stmt->execute();

				   header('Location: ../index.php');
				}
		    }
		    else {
		    	echo "that username/email has been used already.";
		    }
		}
	} 
	else {
		echo "all forms are required...";
	}	
}
else {
	header('Location: ../index.php');
}


?>