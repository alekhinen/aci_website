<html>
	<head>
		<title><?php echo "$name"; ?></title>

		<?php include 'common/head.html'; ?>

	</head>
	<body>
		<?php include 'common/header.php' ?>
		<div class = "container">
			
			<div class = "meat">
				<div class = "meat_title">
					<h1 class = "small"><a class = "link_t2" style = "color:inherit;" href = "../solutions.php">Solutions</a> //
						<a class = "link_t2" style = "color:inherit;" href = "categories.php?name=<?php echo "$category"; ?>"><?php echo "$category"; ?></a> //
						<?php echo "$name"; ?>
					</h1>
				</div>
				<?php 
					if ($urlexists) {
				?>
					<div class = "category_container">
						<div class = "column_a" id = "solution_info">
							<h2><?php echo "$name"; ?></h2>
							<h3><?php echo "$company"; ?></h3>
							<p><?php echo "$description"; ?></p>
							<br>
							<p class = "small">// Posted on <?php echo "$timestamp"; ?> by <?php echo "$creator"; ?></p>
							<br>
							<a class = "title" href = "quoterequest.php?id=<?php echo "$id"; ?>">Request a quote</a>
						</div>

						<div class = "column_b"style = "float:left;margin-top:10px;width:<?php echo "$width + 30"; ?>;">
							<img id = "solution_image" class = "images" src = "<?php echo "$image"; ?>" width = "<?php echo "$width"; ?>" height = "<?php echo "$height"; ?>"/>
						</div>
					</div>
				<?php
					}
					
					if (!$urlexists) {
						?>

						<div id = "solution_info">
							<h1><?php echo "$name"; ?></h1>
							<h2><?php echo "$company"; ?></h2>
							<p><?php echo "$description"; ?></p>
							<br>
							<p>Posted on <?php echo "$timestamp"; ?> by <?php echo "$creator"; ?></p>
							<br>
							<br>
							<a class = "title" href = "#">Request a quote</a>
						</div>

						<div style = "float:left;margin-top:10px;width:400px;">
							<p>No image available...</p>
						</div>

						<?php
					}
					?>
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>
</html>