<html>
	<head>
		<title>Solutions</title>

		<?php include 'common/head.html'; ?>

	</head>
	<body>
		<?php include 'common/header.php' ?>
		<div class = "container">
			
			<div class = "meat">
				<div class = "meat_title">
					<h1>Solutions</h1>
					<p style = "padding-left:10px">Select a solution to view a list of products.</p>
				</div>
				<div>
					<?php 
						if($result){
							?>

							<div class = "category_container">
								<div class = "column_a">
									<?php
										echo "<p>";
										if ($currentpage > 1) 
										{
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=1&order=$order'><<</a> ";
										   $prevpage = $currentpage - 1;
										   
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage&order=$order'><</a> ";
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
												 echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$x&order=$order'>$x</a> ";
											  } 
										   } 
										} 
											
										if ($currentpage != $totalpages) 
										{
										   $nextpage = $currentpage + 1; 
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage&order=$order'>></a> ";
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages&order=$order'>>></a> ";
										}
										echo "</p>";
									?>
								</div>
								<div class = "column_b">
									<p class = "small">order by <a class = "link_t2" style = "font-size:inherit;" href = "solutions.php?order=0">newest</a> / <a class = "link_t2" style = "font-size:inherit;" href = "solutions.php?order=1">oldest</a></p>
								</div>
							</div>

							<?php
							// Cycle through results
						   	while ($row = $result->fetch_assoc()) {
								$category_id = $row['id'];
								$category_name = $row['name'];
								$category_description = $row['description'];
								$category_creator = $row['creator'];
								$category_timestamp = date('F j, Y', $row['timestamp']);
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
							?>

							<div class = "category_container">
									<?php
										echo "<p>";
										if ($currentpage > 1) 
										{
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=1&order=$order'><<</a> ";
										   $prevpage = $currentpage - 1;
										   
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage&order=$order'><</a> ";
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
												 echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$x&order=$order'>$x</a> ";
											  } 
										   } 
										} 
											
										if ($currentpage != $totalpages) 
										{
										   $nextpage = $currentpage + 1; 
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage&order=$order'>></a> ";
										   echo " <a class = 'link_t2' href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages&order=$order'>>></a> ";
										}
										echo "</p>";
									?>
								</div>

							<?php
						}
						else {
							?>
							<div class = "category_container">
								<p>No Categories Available...</p>
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>
</html>