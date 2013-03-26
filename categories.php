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

$category = $_GET['name'];

// ----------------------------------- Page Count -----------------------------------
// Count the amount of categories
if($stmt = $mysqli->prepare("SELECT COUNT(*), b.id AS category_id FROM solutions AS a JOIN categories AS b ON (a.category = b.name) WHERE b.name = ? AND a.visibility = 0")) {
	$stmt->bind_param('s', $category); // Bind "$email" to parameter.
	$stmt->execute(); // Execute the prepared query.
	$stmt->store_result();
	$stmt->bind_result($numrows, $category_id); // get variables from result.
	$stmt->fetch();
}
$rowsperpage = 10;
// Total pages
$totalpages = ceil($numrows / $rowsperpage);
	
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage']))  {
	$currentpage = (int) $_GET['currentpage'];
}
else {
	$currentpage = 1;
}	

if ($currentpage > $totalpages) {
	$currentpage = $totalpages;
}
if ($currentpage < 1) {
	$currentpage = 1;
}

// Offset
$offset = ($currentpage - 1) * $rowsperpage;



/*
while ($list = $stmt->fetch(PDO::FETCH_ASSOC)) {
	echo $list['id'] . " : " . $list['number'] . "<br />";
}
*/
	
$range = 3;

// ----------------------------------- End Page Count -------------------------------



if(strlen($category) > 0 ) {

	$query = "SELECT a.id AS solution_id, a.name AS solution_name, a.description AS solution_description, a.timestamp AS solution_timestamp, a.creator AS         
			  solution_creator, a.image AS solution_image, b.name AS category_name, b.description AS category_description, b.timestamp AS category_timestamp
			  FROM solutions AS a 
			  JOIN categories AS b ON (a.category = b.name) 
			  WHERE b.name = '$_GET[name]' AND a.visibility = 0
			  ORDER BY solution_timestamp 
			  DESC LIMIT $offset, $rowsperpage";

	if(isset($_GET['order'])) {
		$order = $_GET['order'];

		if($order == 1) {
			$query = "SELECT a.id AS solution_id, a.name AS solution_name, a.description AS solution_description, a.timestamp AS solution_timestamp, a.creator AS         
			  solution_creator, a.image AS solution_image, b.name AS category_name, b.description AS category_description, b.timestamp AS category_timestamp
			  FROM solutions AS a 
			  JOIN categories AS b ON (a.category = b.name) 
			  WHERE b.name = '$_GET[name]' AND a.visibility = 0
			  ORDER BY solution_timestamp 
			  ASC LIMIT $offset, $rowsperpage";
		}
		if($order == 0) {

		}
	}

	$result = $mysqli->query($query);

	include 'views/categories.php';
}

if(strlen($category) == 0) {
	header('Location: index.php');
}



?>