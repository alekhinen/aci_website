<?php
include 'common/dbconnect.php';
include 'common/functions.php';
sec_session_start();
// Set current user name in variable so header.php works properly
$curuser = "";

if(login_check($mysqli) == true) {
	if(isset($_SESSION['username'])) {	
		$curuser = $_SESSION['username'];
	}
}

// Test for errors
if(mysqli_connect_errno()){
 	echo mysqli_connect_error();
}


$get_id = strip_tags($_GET[id]);
$query = "SELECT * FROM solutions WHERE id = '$get_id'";
$result = $mysqli->query($query);

if($result){
	// Cycle through results
   	while ($row = $result->fetch_assoc()) {
		$id = $row['id'];
		$name = $row['name'];
		$description = $row['description'];
		$company = $row['company'];
		$timestamp = date('F j, Y ',$row['timestamp']);
		$creator = $row['creator'];
		$category = $row['category'];
		$image = $row['image'];

		$urlexists = false;

		if(strlen($image) > 0) {
			if(urlExists($image)) {
				$urlexists = true;
				$info = getimagesize("$image");	
				$max = 400;
				$info[0];
				$info[1];	
				$biggest = $info[0];	

				if($info[1] > $info[0]) {
					$biggest = $info[1];
				}	
				
				$ratio = ($max / $biggest);		
				$width = $info[0]*$ratio;
				$height = $info[1]*$ratio;
			}
		}
	}
	// Free result set
    $result->free();

    include 'views/solution.php';
}
    

    

if(!$result) {
	header('Location: index.php');
}

?>