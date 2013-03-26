<html>
	<head>
		<title>Select Product To Edit</title>

		<?php include '../common/head.html'; ?>

	</head>
	<body>
		<div class = "container">
			<?php include '../common/header.php' ?>
			<div class = "meat">
				<div class = "meat_title">
					<h1>Select Product To Edit</h1>
				</div>
				<form method="post" action="../edit/edit_solution.php">
					<div class = "post_container">
						<!-- Select solution to edit -->
						<div class = "post_title_container">
							<h4>Select Product to Edit</h4>
							<div class = "pointer"></div>
						</div>
						<br>
						<select name="sol_id">
							<?php 
								if($result){
									// Cycle through results
								   	while ($row = $result->fetch_assoc()) {
										$sol_name = $row['name'];
										$sol_id = $row['id'];
										$sol_vis = $row['visibility'];
										if ($sol_vis == 0) {
											echo "<option value = '$sol_id'> ID# $sol_id | $sol_name </option>";
										}
										else {
											echo "<option value = '$sol_id'> INVISIBLE | ID# $sol_id | $sol_name </option>";
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