<html>
	<head>
		<title>Edit Account // <?php echo "$curuser"; ?></title>

		<?php include '../common/head.html'; ?>

	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>Edit Account // <?php echo "$curuser"; ?></h1>
				</div>
				<form method="post" action="../process/process_edit_account.php">
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

					<!-- Input new email -->
					<div class = "post_title_container">
						<h4>Email</h4><p class = "form_title"> [leave as is if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="email" class = "forminput"/><?php echo "$email"; ?></textarea>
					<br>
					<br>

					<!-- Input first name -->
					<div class = "post_title_container">
						<h4>First Name</h4><p class = "form_title"> [leave as is if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="firstname" class = "forminput"/><?php echo "$firstname"; ?></textarea>
					<br>
					<br>

					<!-- Input last name -->
					<div class = "post_title_container">
						<h4>Last Name</h4><p class = "form_title"> [leave as is if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="lastname" class = "forminput"/><?php echo "$lastname"; ?></textarea>
					<br>
					<br>

					<!-- Input position -->
					<div class = "post_title_container">
						<h4>Position</h4><p class = "form_title"> [leave as is if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="position" class = "forminput"/><?php echo "$position"; ?></textarea>
					<br>
					<br>

					<!-- Edit address -->
					<div class = "post_title_container">
						<h4>Address</h4><p class = "form_title"> [leave as is if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="address" class = "forminput"/><?php echo "$address"; ?></textarea>
					<br>
					<br>

					<!-- Edit description -->
					<div class = "post_title_container">
						<h4>Description</h4><p class = "form_title"> [leave as is if no changes need to be made]</p><p class = "small"> &#60;br&#62; = space | &#60;b&#62; <b>bolded text</b> &#60;/b&#62; | &#60;u&#62; <u>underlined text</u> &#60;/u&#62;</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="description" class = "forminput"/><?php echo "$description"; ?></textarea>
					<br>
					<br>

					<!-- Edit image -->
					<div class = "post_title_container">
						<h4>Image [url]</h4><p class = "form_title"> [leave as is if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="image" class = "forminput"/><?php echo "$image"; ?></textarea>
					<br>
					<br>

					<!-- Select whether to display on contact page or not -->
					<div class = "post_title_container">
						<h4>Display on contact page?</h4>
						<div class = "pointer"></div>
					</div>
					<br>
					<select name="contact_display">
						<option value = '0'> No </option>
						<option value = '1'> Yes </option>
					</select>
					<br>
					<br>


					<input type="button" value="Submit" onclick="formhash(this.form, this.form.old_password); " />
				</div>
				</form>
			</div>
		</div>
	</body>
</html>