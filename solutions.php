<?php
include 'common/dbconnect.php';
include 'common/functions.php';
sec_session_start();

$curuser = "";

// Set current user name in variable so header.php works properly
if(isset($_SESSION['username']))
{	
	$curuser = $_SESSION['username'];
}

// Test for errors
if(mysqli_connect_errno()){
 	echo mysqli_connect_error();
}

// ----------------------------------- Page Count -----------------------------------
// Count the amount of categories
$count_query = "SELECT COUNT(*) FROM categories WHERE visibility = 0";
// Query
$result = $mysqli->query($count_query);
// Store row result
$r = $result->fetch_row();
// Number of rows
$numrows = $r[0];
// How many rows are displayed per page
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


while ($list = $result->fetch_assoc()) {
	echo $list['id'] . " : " . $list['number'] . "<br />";
}
	
$range = 3;

// ----------------------------------- End Page Count -------------------------------

// ----------------------------------- Get Order ------------------------------------
$query = "SELECT * FROM categories WHERE visibility = 0 ORDER BY timestamp DESC LIMIT $offset, $rowsperpage ";

if(isset($_GET['order'])) {
	$order = $_GET['order'];

	if($order == 1) {
		$query = "SELECT * FROM categories WHERE visibility = 0 ORDER BY timestamp ASC LIMIT $offset, $rowsperpage ";
	}
	if($order == 0) {
		$query = "SELECT * FROM categories WHERE visibility = 0 ORDER BY timestamp DESC LIMIT $offset, $rowsperpage ";
	}
}
	
// ----------------------------------- End Get Order -------------------------------

// Query categories from specific limit
$result = $mysqli->query($query);		

include 'views/solutions.php';
?>