<html>
	<head>
		<title>New Administrator</title>

		<?php include '../common/head.html'; ?>

	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>New Administrator</h1>
				</div>
				<form method="post" action="../process/process_user.php">
					<div class = "post_container">
						<div class = "post_title_container">
							<h4>Username</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<input name="username" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;"/>
						<br>
						<br>

						<div class = "post_title_container">
							<h4>Email</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<input name="email" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;"/>
						<br>
						<br>

						<div class = "post_title_container">
							<h4>Password</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<input name="password" type = "password" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;"/>
						<br>
						<br>

						<div class = "post_title_container">
							<h4>Secret Question</h4><p class = "form_title">[for security purposes when resetting password]</p>
							<div class = "pointer"></div>
						</div>
						<br>
						<input name="sec_question" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;"/>
						<br>
						<br>

						<div class = "post_title_container">
							<h4>Secret Answer</h4><p class = "form_title">[for security purposes when resetting password]</p>
							<div class = "pointer"></div>
						</div>
						<br>
						<input name="sec_answer" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;"/>
						<br>
						<br>

						<input type="button" value="Submit" onclick="formhash2(this.form, this.form.sec_answer); formhash(this.form, this.form.password);"/>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>