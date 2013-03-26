<html>
	<head>
		<title>Edit Solution</title>

		<?php include '../common/head.html'; ?>

	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>Edit Solution #<?php echo "$cat_id"; ?></h1>
				</div>
				<form method="post" action="../process/process_edit_category.php">
					
					<!-- Edit name -->
					<div class = "post_title_container">
						<h4>Name</h4><p class = "form_title">[leave blank if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="name" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/><?php echo "$name"; ?></textarea>
					<br>
					<br>

					<!-- Edit description -->
					<div class = "post_title_container">
						<h4>Description</h4><p class = "form_title">[leave blank if no changes need to be made]</p><p class = "small"> &#60;br&#62; = space | &#60;b&#62; <b>bolded text</b> &#60;/b&#62; | &#60;u&#62; <u>underlined text</u> &#60;/u&#62;</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="description" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/><?php echo "$description"; ?></textarea>
					<br>
					<br>

					<!-- Edit image -->
					<div class = "post_title_container">
						<h4>Image</h4><p class = "form_title">[leave blank if no changes need to be made]</p>
						<div class = "pointer"></div>
					</div>
					<br>
					<textarea name="image" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/><?php echo "$image"; ?></textarea>
					<br>
					<br>

					<!-- Edit Visibility -->
					<div class = "post_title_container">
						<h4>Visibility</h4>
						<div class = "pointer"></div>
					</div>
					<br>
					<select name="visibility">
						<?php
							if ($visibility == 0) {
								?>
								<option value = '0'>Visible</option>
								<option value = '1'>Not Visible</option>
								<?php
							}
							else {
								?>
								<option value = '1'>Not Visibile</option>
								<option value = '0'>Visible</option>
								<?php
							}
						?>
						
					</select>
					<br>
					<br>

					<!-- Submit the original name of the category -->
					<input type = "hidden" name = "old_category" value = "<?php echo "$name"; ?>"/>

					<!-- Submit the original name of the category -->
					<input type = "hidden" name = "cat_id" value = "<?php echo "$cat_id"; ?>"/>

					<br>
					<input type="submit" value="submit"/>
				</form>
			</div>
		</div>
	</body>
</html>