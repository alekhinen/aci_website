<html>
	<head>
		<title>Select Solution To Edit</title>

		<?php include '../common/head.html'; ?>

	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>Select Solution To Edit</h1>
				</div>
				<form method="post" action="../edit/edit_category.php">
					<div class = "post_container">
						<!-- Select solution to edit -->
						<div class = "post_title_container">
							<h4>Select Solution to Edit</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<select name="cat_id">
							<?php 
								if($result){
									// Cycle through results
								   	while ($row = $result->fetch_assoc()) {
										$cat_name = $row['name'];
										$cat_id = $row['id'];
										$cat_vis = $row['visibility'];
										if ($cat_vis == 0) {
											echo "<option value = '$cat_id'> ID# $cat_id | $cat_name </option>";
										}
										else {
											echo "<option value = '$cat_id'> INVISIBLE | ID# $cat_id | $cat_name </option>";
										}
										
									}
								}
							?>
						</select>
						<br>
						<br>

						<input type="submit" value="submit"/>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>