<!-- Header -->
			<div class = "header_container">

				<div class = "banner_container">
					<div id = "banner_sub_container">
						<div id = "banner_sub_sub_container" >
							<a class = "banner" href = "../index.php"></a>
						</div>
						
						<div class = "admin_header" style = "background-color:transparent;box-shadow:none;margin:0px;padding:0px;margin-top:10px;margin-right:10px;">
							<p style = "color:#ffffff;"><b><i>Contact Us At</i></b><br>214 357 6660 <br> admin [at] andcointl.com</p>
						</div>
						<?php 
							if (strlen($curuser) > 0) {
								?>
								<div class = "admin_header" >
									<p>Logged in as: <?php echo "$curuser" ?></p>
									<a class = "link_t1" href = "../admin.php" >Admin</a>
									<br>
									<a class = "link_t1" href = "../logout.php">Logout</a>
								</div>
								<?php
							}
						?>
						
					</div>
						
				</div>	

				<div class = "main_nav_container">
					<ul class = "main_nav">
						<li class = "main_nav">
							<a class = "main_nav" href = "../index.php">
									Home
							</a>
						</li>
						<li class = "main_nav">
							<a class = "main_nav" href = "../about.php">
									About
							</a>
						</li>
						<li class = "main_nav">
							<a class = "main_nav" href = "../solutions.php">
									Solutions
							</a>
						</li>
						<li class = "main_nav">
							<a class = "main_nav" href = "../contact.php">
									Contact
							</a>
						</li>
					</ul>
				</div>	
			</div>