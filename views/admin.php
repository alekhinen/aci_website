<html>
	<head>
		<title>Admin</title>

		<?php include 'common/head.html'; ?>

	</head>
	<body>
		<?php include 'common/header.php' ?>
		<div class = "container">		
			<div class = "meat">
				<div class = "meat_title">
					<h1><?php echo "$curuser" ?> // Control Panel</h1>
				</div>
				<div class = "category_container">
					<div class = "column_a">
						<a class = "link_t1" href = "create/new_category.php">Create New Solution</a>
						<br>
						<a class = "link_t1" href = "create/new_solution.php">Create New Product</a>
						<br>
						<a class = "link_t1" href = "create/new_user.php">Create New Administrator</a>
					</div>
					<div class = "column_b">
						<a class = "link_t1"  href = "edit/select_category.php">Edit Solution</a>
						<br>		
						<a class = "link_t1"  href = "edit/select_solution.php">Edit Product</a>
					</div>		
				</div>
				<br>
				<div class = "meat_title" style = "border-bottom:2px solid;padding-bottom:0px;">
					<h2 style = "margin-left:10px;">User Info</h2>
				</div>
				<div class = "category_container">
					<div>
						<p>
							<a class = "link_t2" href = "edit/edit_account.php">[edit account]</a> 
							<br>
							<a class = "link_t2" href = "edit/edit_password.php">[edit password]</a> 
							<br>
							<a class = "link_t2" href = "#">[edit security question + answer]</a> 
							<br>
							ID // #<?php echo "$id"; ?> 
							<br>
							Displayed on contact page // <?php echo "$contact_display"; ?>
							<br>
							Email // <?php echo "$email"; ?>
							<br>
							First Name // <?php echo "$firstname"; ?>
							<br>
							Last Name // <?php echo "$lastname"; ?>
							<br>
							Position // <?php echo "$position"; ?>
							<br>
							Address // <?php echo "$address"; ?>
							<br>
							Description // <?php echo "$description"; ?>
							<br>
							Image // <?php echo "$image"; ?>
						</p>
					</div>
				</div>
				<br>
				<div class = "meat_title" style = "border-bottom:2px solid;padding-bottom:0px;">
					<h2 style = "margin-left:10px;">Categories Made By You</h2>
				</div>
				<div>
					<?php 
						if($result = $mysqli->query($query2)) {
							$row_count = $result->num_rows;

							if($row_count > 0) {
								// Cycle through results
							   	while ($row = $result->fetch_assoc()) {
									$category_id = $row['id'];
									$category_name = $row['name'];
									$category_description = $row['description'];
									$category_timestamp = date('F j Y', $row['timestamp']);
									$category_creator = $row['creator'];
									?>

									<div class = "category_container">
									<div>
										<div class = "column_a">
											<a class = "title" href = "categories.php?name=<?php echo "$category_name"; ?>"><?php echo "$category_name"; ?></a>
											<br>
											<p><?php echo "$category_description"; ?></p>
										</div>
										<div class = "column_b">			
											<p class = "small"> Created <?php echo "$category_timestamp"; ?> by <?php echo "$category_creator"; ?> //</p>
										</div>
									</div>
								</div>

									<?php
								}
							}
							if ($row_count == 0) {
								?>

								<div class = "category_container">
									<p>You have not made any categories...</p>
								</div>

								<?php
							}
						}
					?>
				</div>
				<br>
				<div class = "meat_title" style = "border-bottom:2px solid;padding-bottom:0px;">
					<h2 style = "margin-left:10px;">Solutions Made By You</h2>
				</div>
				<div>
					<?php 
						if($result = $mysqli->query($query3)) {
							$row_count = $result->num_rows;

							if($row_count > 0) {
								// Cycle through results
							   	while ($row = $result->fetch_assoc()) {
									$solution_id = $row['id'];
									$solution_name = $row['name'];
									$solution_description = $row['description'];
									$solution_company = $row['company'];
									$solution_timestamp = date('F j Y', $row['timestamp']);
									$solution_category = $row['category'];
									$solution_creator = $row['creator'];
									?>

									<div class = "category_container">
										<div class = "column_a">
											<a class = "title" href = "solution.php?id=<?php echo "$solution_id"; ?>"> 
												<?php echo "$solution_name"; ?> 
											</a>
											<br>
											<br>
											<p style = "font-size:.8em;padding-right:5px;">
												<?php echo "$solution_description"; ?>
											</p>
										</div>
										<div class = "column_b">
											<p class = "small"> 
												Solution ID <a class = "link_t2" href = "solution.php?id=<?php echo "$solution_id"; ?>">#<?php echo "$solution_id"; ?></a>
												// <br>

												Created <?php echo "$solution_timestamp"; ?> by <?php echo "$solution_creator"; ?> 
												// <br>
												
												Filed Under <a class = "link_t2" href = "categories.php?name=<?php echo "$solution_category"; ?>"><?php echo "$solution_category"; ?></a> 
												//

											</p>
										</div>
									</div>

									<?php 
								}
							}
							if ($row_count == 0) {
								?>

								<div class = "category_container">
									<p>You have not made any solutions...</p>
								</div>

								<?php
							}
						}
						$result->close();
						$mysqli->close();
					?>
				</div>
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>
</html>


