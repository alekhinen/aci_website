<html>
	<head>
		<title>Password Reset // <?php echo "$username"; ?></title>

		<?php include 'common/head.html'; ?>

	</head>
	<body>
		<?php include 'common/header.php' ?>
		<div class = "container">
			
			<div class = "meat">
				<div class = "meat_title">
					<h1>Password Reset // <?php echo "$username"; ?></h1>
				</div>
				<form method="post" action="process/passwordreset.php">
				<div class = "post_container">	

					<!-- Input sec_answer -->
					<div class = "post_title_container">
						<h4><?php echo "$sec_question"; ?></h4>
						<div class = "pointer"></div>
					</div>
					<br>
					<input name="sec_answer" size="30"/>
					<br>
					<br> 

					<!-- Input new password -->
					<div class = "post_title_container">
						<h4>New Password</h4>
						<div class = "pointer"></div>
					</div>
					<br>
					<input type="password" name="new_password" size="30"/>
					<br>
					<br> 

					<!-- Submit the email -->
					<input type = "hidden" name = "email" value = "<?php echo "$email"; ?>"/>
					<!-- Submit the username -->
					<input type = "hidden" name = "username" value = "<?php echo "$username"; ?>"/>

					<input type="button" value="Submit" onclick="formhash2(this.form, this.form.sec_answer); formhash(this.form, this.form.new_password); " />
				</div>
				</form>
			</div>
		</div>
	</body>
</html>