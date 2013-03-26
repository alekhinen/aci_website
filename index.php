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

$query = "SELECT * FROM solutions WHERE popularity = 1 ORDER BY timestamp DESC LIMIT 3";
$result = $mysqli->query($query);

include 'views/index.php';
?>