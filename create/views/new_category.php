<html>
	<head>
		<title>New Solution</title>

		<?php include '../common/head.html'; ?>

	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>New Solution</h1>
				</div>
				<form method="post" action="../process/process_category.php">
					<div class = "post_container">
						<div class = "post_title_container">
							<h4>Name</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<textarea name="name" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/></textarea>
						<br>
						<br>

						<div class = "post_title_container">
							<h4>Description</h4><p class = "small"> &#60;br&#62; = space | &#60;b&#62; <b>bolded text</b> &#60;/b&#62; | &#60;u&#62; <u>underlined text</u> &#60;/u&#62;</p>
							<div class = "pointer"></div>
						</div>
						<br>
						<textarea name="description" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/></textarea>
						<br>
						<br>

						<div class = "post_title_container">
							<h4>Image [URL]</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<textarea name="image" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/></textarea>
						<br>
						<br>

						<input type="submit" value="submit"/>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>