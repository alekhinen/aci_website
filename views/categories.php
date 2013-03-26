<html>
	<head>
		<title><?php echo "$category"; ?></title>

		<?php include 'common/head.html'; ?>
		
	</head>
	<body>
		<?php include 'common/header.php' ?>
		<div class = "container">
			
			<div class = "meat">
				<div class = "meat_title">
					<h1><a class = "link_t2" style = "color:inherit;" href = "solutions.php">Solutions</a> // <?php echo "$category"; ?></h1>
					<p style = "padding-left:10px">Select a product for information</p>
				</div>
				<div>
					<?php 
						if($result){
							$row_count = $result->num_rows;

							if($row_count > 0) {
								?>

								<div class = "category_container">
									<div class = "column_a">
										<?php
											echo "<p>";
											if ($currentpage > 1) 
											{
											   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=1&order=$order'><<</a> ";
											   $prevpage = $currentpage - 1;
											   
											   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$prevpage&order=$order'><</a> ";
											}  
													
											for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) 
											{
											   if (($x > 0) && ($x <= $totalpages)) 
											   {
												  if ($x == $currentpage) 
												  {
													 echo "[<b>$x</b>]";
												  }
												  else 
												  {
													 echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$x&order=$order'>$x</a> ";
												  } 
											   } 
											} 
												
											if ($currentpage != $totalpages) 
											{
											   $nextpage = $currentpage + 1; 
											   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$nextpage&order=$order'>></a> ";
											   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$totalpages&order=$order'>>></a> ";
											}
											echo "</p>";
										?>
									</div>
									<div class = "column_b">
										<p class = "small">order by <a class = "link_t2" style = "font-size:inherit;" href = "<?php echo "{$_SERVER['PHP_SELF']}?name=$category&currentpage=$currentpage"; ?>&order=0">newest</a> / <a class = "link_t2" style = "font-size:inherit;" href = "<?php echo "{$_SERVER['PHP_SELF']}?name=$category&currentpage=$currentpage"; ?>&order=1&">oldest</a></p>
									</div>
								</div>

								<?php
								// Cycle through results
							   	while ($row = $result->fetch_assoc()) {
									$solution_id = $row['solution_id'];
									$solution_name = $row['solution_name'];
									$solution_description = $row['solution_description'];
									$solution_company = $row['solution_company'];
									$solution_timestamp = date('F j Y', $row['solution_timestamp']);
									$solution_category = $row['category_name'];
									$solution_creator = $row['solution_creator'];
									$solution_image = $row['solution_image'];

									$urlexists = false;

									if(strlen($solution_image) > 0) {
										if(urlExists($solution_image)) {
											$urlexists = true;
											$info = getimagesize("$solution_image");	
											$max = 100;
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
										<div class = "column_a">
											<?php 
												if ($urlexists) {
											?>
												<div class = "solution_image_container">
													<img id = "solution_image" class = "images" src = "<?php echo "$solution_image"; ?>" width = "<?php echo "$width"; ?>" height = "<?php echo "$height"; ?>"/>
												</div>
											<?php
												} 
											?>
											<div>
												<a class = "title" href = "solution.php?id=<?php echo "$solution_id"; ?>"> 
													<?php echo "$solution_name"; ?> 
												</a>
												<br>
												<br>
												<p style = "font-size:.8em;padding-right:5px;">
													<?php echo "$solution_description"; ?>
												</p>
											</div>
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
								?>

								<div class = "category_container">
									<?php
										echo "<p>";
										if ($currentpage > 1) 
										{
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=1&order=$order'><<</a> ";
										   $prevpage = $currentpage - 1;
										   
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$prevpage&order=$order'><</a> ";
										}  
												
										for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) 
										{
										   if (($x > 0) && ($x <= $totalpages)) 
										   {
											  if ($x == $currentpage) 
											  {
												 echo "[<b>$x</b>]";
											  }
											  else 
											  {
												 echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$x&order=$order'>$x</a> ";
											  } 
										   } 
										} 
											
										if ($currentpage != $totalpages) 
										{
										   $nextpage = $currentpage + 1; 
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$nextpage&order=$order'>></a> ";
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?name=$category&currentpage=$totalpages&order=$order'>>></a> ";
										}
										echo "</p>";
									?>
								</div>

								<?php
							}
							
							if ($row_count == 0) {
								?>

								<div class = "category_container">
									<p>No Solutions Available...</p>
								</div>

								<?php
							}
						}
					?>
				</div>
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>
</html>