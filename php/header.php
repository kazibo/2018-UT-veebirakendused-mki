		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCa4lvlGGsH9Su95fKG8wYqHRsvDXNL-qY&callback=initMap"></script>
	</head>
	
	<body>
		
		<header>
			<div class="logo" >
				<a class="hint--right  hint--bounce hint--info" aria-label="You can click on me" href="index.php">
					Neli-Chan
				</a>
			</div>
			
			<div class="buttonMenu">
			
			<?php include 'php/langButton.php';?>
			<?php include 'php/checkAuth.php';?>
		</header>