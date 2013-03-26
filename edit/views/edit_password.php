<html>
	<head>
		<title>Edit Password // <?php echo "$curuser"; ?></title>

		<?php include '../common/head.html'; ?>
	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>Edit Password // <?php echo "$curuser"; ?></h1>
				</div>
				<form method="post" action="../process/process_edit_password.php">
					<div class = "post_container">	
						<!-- Input old password to confirm current user -->
						<div class = "post_title_container">
							<h4>Old Password</h4><p class = "form_title"> [required]</p>
							<div class = "pointer"></div>
						</div>
						<br>
						<input type="password" name="old_password" size="30"/>
						<br>
						<br>

						<!-- Input old password to confirm current user -->
						<div class = "post_title_container">
							<h4>New Password</h4><p class = "form_title"> [required]</p>
							<div class = "pointer"></div>
						</div>
						<br>
						<input type="password" name="new_password" size="30"/>
						<br>
						<br>

					</div>

					<input type="button" value="Submit" onclick="formhash2(this.form, this.form.new_password); formhash(this.form, this.form.old_password); " />
				</form>
			</div>
		</div>
	</body>
</html>