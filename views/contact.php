<html>
	<head>
		<title>Contact</title>

		<?php include 'common/head.html'; ?>

	</head>
	<body>
		<?php include 'common/header.php' ?>
		<div class = "container">
			
			<div class = "meat">
				<div class = "meat_title">
					<h1>Contact</h1>
				</div>
				<div>
				<?php
				if ($result) {
					while ($row = $result->fetch_assoc()) {
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$description = $row['description'];
						$address = $row['address'];
						$email = $row['email'];
						$image = $row['image'];
						$position = $row['position'];
						$email2 = str_replace("@", " [at] ", $email);

						$urlexists = false;

						if(strlen($image) > 0) {
							if(urlExists($image)) {
								$urlexists = true;
								$info = getimagesize("$image");	
								$max = 200;
								$info[0];
								$info[1];	
								$biggest = $info[0];	

								if($info[1] > $info[0]) {
									$biggest = $info[1];
								}	
								
								$ratio = ($max / $biggest);		
								$width = $info[0]*$ratio;
								$height = $info[1]*$ratio;
							}
						}

						?>

						<div class = "category_container">
							
								<?php 
								if ($urlexists) {
									?>
									<div class = "column_b" style = "float:left;margin-top:10px;width:<?php echo "$width + 30"; ?>;">
										<img id = "solution_image" class = "images" src = "<?php echo "$image"; ?>" width = "<?php echo "$width"; ?>" height = "<?php echo "$height"; ?>" />
									</div>
									<?php
								}
								if (!$urlexists) {
									echo "<p>No image available...</p>";
								}
								?>
								<div id = "solution_info" class = "column_a" style = "left:<?php echo "$width + 30"; ?>;float:left">
									<h2><?php echo "$firstname $lastname"; ?></h2>
									<h3><?php echo "$position"; ?></h3>
									<p><?php echo "$address"; ?></p>
									<p><?php echo "$email2"; ?></p>
									<br>
									<p><?php echo "$description"; ?></p>
								</div>
						</div>

						<?php
					}
				}
				else {
					echo "No contacts available...";
				}

				?>
				</div>
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>
</html>