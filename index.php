<!doctype html>

<html lang="en">
	<head>
		<title>Welcome to Nelichan</title>
		<meta name="description" content="Welcome to Nelichan - Estonian social forum site">

<?php include 'php/header.php';?>
<?php include 'php/usersData.php';?>
			
			<main class="main_part">
					<div class="bunny">
						<img src= "images/unavailable.gif" class="jb" alt="jumping bunny">
					</div>
					
					<div class="magic">
						Watch that jumping bunny and be patient while we learn some magic
					</div>
			</main>
				<section class="sel">
					<div class="stats"><h2>Stats</h2></div>
					<div class="stats_info">Total visitors: <?php include 'php/visitors.php';?></div>
					<div class="stats_info">Top Country: <?php include 'php/topCountry.php';?></div>
					<div class="stats_info">Top Browser: <?php include 'php/topBrowser.php';?></div>
					<div class="stats_info">Top OS: <?php include 'php/topOS.php';?></div>
				</section>
<?php include 'php/footer.php';?>