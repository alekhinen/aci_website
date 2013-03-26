<html>
	<head>
		<title>Password Reset Request</title>

		<!-- CSS Files -->
		<link rel="stylesheet" type="text/css" href="assets/main.css" />

		<!-- Mobile Stuff + CSS -->
		<link rel = "stylesheet" type = "text/css" href = "assets/mobile.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1.0 user-scalable=0;">

		<!-- Font Files -->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|Didact+Gothic' rel='stylesheet' type='text/css'>

		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/favicon.png"/>

		<!-- Setting up device width -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Javascript Stuff -->
		<script type="text/javascript" src="assets/sha512.js"></script>
		<script type="text/javascript" src="assets/forms.js"></script>
		
	</head>
	<body>
		<div class = "container"> 
			<?php include 'common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>Password Reset Request</h1>
				</div>
				<form method="post" action="passwordreset.php">
					<div class = "category_container">
						<table frame = "none" style = "margin-top:10px">
						<tr>
							<td><p>Email</p></td>
							<td><input type="text" name="email" size="30"/></td>
						</tr>
						<tr>
							<td><p>Username</p></td>
							<td><input type="text" name="username" size="30"/></td>
						</tr>
						<tr>
							<td colspan="2"><input type="Submit" value="Submit"/></td>
						</tr>
					</table>
					</div>
					
				</form>						
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>
</html>