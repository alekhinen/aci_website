<?php
	if(isset($_GET['error'])) { 
		echo 'Error Logging In!';
	}
?>
<html>
	<head>
		<title>Login</title>

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
					<h1>Login</h1>
				</div>
				<form method="post" action="process/process_login.php">
					<div class = "category_container">
						<p class = "small"><a class = "link_t1" href = "passwordresetrequest.php">forgot password?</a></p>

						<table frame = "none" style = "margin-top:10px">
						<tr>
							<td><p>Email</p></td>
							<td><input type="text" name="email" size="30"/></td>
						</tr>
						<tr>
							<td><p>Password</p></td>
							<td><input type="password" name="password" size="30"/></td>
						</tr>
						<tr>
							<td colspan="2"><input type="button" value="Login" onclick="formhash(this.form, this.form.password);" /></td>
						</tr>
					</table>
					</div>
					
				</form>						
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>

</html>