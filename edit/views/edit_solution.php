<html>
	<head>
		<title>Edit Product</title>

		<?php include '../common/head.html'; ?>

	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>Edit Product #<?php echo "$sol_id"; ?></h1>
				</div>
				<form method="post" action="../process/process_edit_solution.php">
					<div class = "post_container">
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

						<!-- Edit company -->
						<div class = "post_title_container">
							<h4>Company</h4><p class = "form_title">[leave blank if no changes need to be made]</p>
							<div class = "pointer"></div>
						</div>
						<br>
						<textarea name="company" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/><?php echo "$company"; ?></textarea>
						<br>
						<br>

						<!-- Edit image -->
						<div class = "post_title_container">
							<h4>Image [URL]</h4><p class = "form_title">[leave blank if no changes need to be made]</p>
							<div class = "pointer"></div>
						</div>
						<br>
						<textarea name="image" id = "replyarea" style = "width:100%;border:1px solid #3e3e3e;height:50"/><?php echo "$image"; ?></textarea>
						<br>
						<br>

						<!-- Edit category -->
						<div class = "post_title_container">
							<h4>Category</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<select name="category">
							<?php 
								echo "<option value = '$sol_cat'>$sol_cat</option>";

								if($result = $mysqli->query($query2)){
									// Cycle through results
								   	while ($row = $result->fetch_assoc()) {
										$category = $row['name'];
										echo "<option value = '$category'>$category</option>";
									}
								}
							?>
						</select>
						<br>
						<br>

						<!-- Edit Popularity -->
						<div class = "post_title_container">
							<h4>Popularity</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<select name="popularity">
							<?php
								if ($popularity == 0) {
									?>
									<option value = '0'>Not Popular</option>
									<option value = '1'>Popular</option>
									<?php
								}
								else {
									?>
									<option value = '1'>Popular</option>
									<option value = '0'>Not Popular</option>
									<?php
								}
							?>
							
						</select>
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

						<!-- Send solution id with the form -->
						<input type = "hidden" name = "sol_id" value = "<?php echo "$sol_id"; ?>"/>

						<input type="submit" value="submit"/>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>