<html>
	<head>
		<title>AndCo International</title>

		<?php include 'common/head.html'; ?>

		<!-- BGCarousel -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		<script src="assets/bgcarousel/bgcarousel.js" type="text/javascript">

		/***********************************************
		* Background Image Carousel- © Dynamic Drive (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit http://www.dynamicdrive.com/ for this script and 100s more.
		***********************************************/

		</script>
		<script type="text/javascript">
			var firstbgcarousel=new bgCarousel({
				wrapperid: 'mybgcarousel', //ID of blank DIV on page to house carousel

				imagearray: [
					<?php if($result) {
						while($row = $result->fetch_assoc()) {
							$image = $row['image'];
							$description = strip_tags($row['description']);
							$id = $row['id'];
							$name = $row['name'];

							if (strlen($description) > 100) {
								$newbody = substr($description, 0, 100);
								$description = $newbody . "..."; 
							}

							?>
							['<?php echo "$image"; ?>', '<?php echo "$name"; ?><br><a href = "solution.php?id=<?php echo "$id"; ?>"><?php echo "$description"; ?></a>'],
							<?php
						}
					} ?>

					['assets/images/industrial_piping.jpg', 'This is a description for this specific photo'], //["image_path", "optional description"]
					['assets/images/industrial_piping_again.jpg', 'This is a description for another photo'] //<--no trailing comma after very last image element!
				],
				displaymode: {type:'auto', pause:3000, cycles:2, stoponclick:false, pauseonmouseover:true},
				navbuttons: ['assets/bgcarousel/left.png', 'assets/bgcarousel/right.png', 'assets/up.gif', 'assets/down.gif'], // path to nav images
				activeslideclass: 'selectedslide', // CSS class that gets added to currently shown DIV slide
				orientation: 'h', //Valid values: "h" or "v"
				persist: true, //remember last viewed slide and recall within same session?
				slideduration: 500 //transition duration (milliseconds)
			})

			/*

			var firstbgcarousel=new bgCarousel({
				wrapperid: 'mybgcarousel', //ID of blank DIV on page to house carousel
				imagearray: [
					['assets/images/industrial_piping.jpg', 'This is a description for this specific photo'], //["image_path", "optional description"]
					['assets/images/industrial_piping_again.jpg', 'This is a description for another photo'] //<--no trailing comma after very last image element!
				],
				displaymode: {type:'auto', pause:3000, cycles:2, stoponclick:false, pauseonmouseover:true},
				navbuttons: ['assets/bgcarousel/left.png', 'assets/bgcarousel/right.png', 'assets/up.gif', 'assets/down.gif'], // path to nav images
				activeslideclass: 'selectedslide', // CSS class that gets added to currently shown DIV slide
				orientation: 'h', //Valid values: "h" or "v"
				persist: true, //remember last viewed slide and recall within same session?
				slideduration: 500 //transition duration (milliseconds)
			})
			*/
		</script>

	</head>
	<body>
		<?php include 'common/header.php' ?>
		<div class = "container">
			
			<div class = "meat">
				<div class = "meat_title">
					<h2 style = "padding-left:10px">AndCo will find the right Power Quality solution that suits you.</h2>
				</div>

				<!-- Image Slide Show -->
				<div id = "bgcarousel_shell">
					<div id="mybgcarousel" class="bgcarousel"></div>
				</div>

				<div >
					<p style = "margin-left:10px;">						 
						Since 1989 AndCo has been serving the Latin America and Caribbean markets, 
						fulfilling industrial requirements for raw materials, electrical equipment, 
						components, process control instrumentation, measurement products and spare parts, 
						chiefly for heat process applications.  Today serving the globe, we have specialized in 
						Process Heat  and Power Quality  solutions.  
						<br>
						<br>
						 Vestibulum sit amet lorem dolor. Curabitur non ipsum eget sapien scelerisque malesuada quis vel augue. Integer varius auctor augue ac dictum. Maecenas imperdiet sollicitudin ultricies. Cras eu urna nisi. Proin eros mi, egestas aliquet facilisis eget, rhoncus quis odio. Curabitur tellus neque, condimentum ut aliquet eget, faucibus quis nisl. Vestibulum ac posuere dui. Nam viverra iaculis ligula vitae cursus. Maecenas fermentum lectus et mauris fringilla aliquet. Cras a mauris vitae urna imperdiet tincidunt in eget est.
<br>
<br>
Quisque vitae erat a mi accumsan tincidunt. In vestibulum sollicitudin augue at interdum. Pellentesque ac magna eros, pretium gravida sapien. Quisque pulvinar laoreet neque, at convallis velit imperdiet at. Fusce lacinia odio ac eros consequat mollis. Vestibulum quis mauris eget dui laoreet vestibulum. Etiam ornare velit non quam tincidunt sollicitudin sollicitudin eros ullamcorper. 
					</p>
					<br>
				</div>
			</div>
			<?php include 'common/footer.html' ?>
		</div>
	</body>
</html>