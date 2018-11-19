<?php include "php/languages/config.php"; ?>
<!doctype html>

<html lang="en">
	<head>
		<title>Nelichan Description</title>
		<meta name="description" content="Here you can read about us and that project">

<?php include 'php/header.php';?>
			<section class="sel">
				<div class="info">
					<h2><?php echo $lang['menu_about'] ?></h2>
				</div>
			</section>
			
			<main class="main_part">
				<hr>
			
				<div class="mapHeader">
					<?php echo $lang['about_map'] ?>
				</div>
				
				<div class="map" id="map"></div>
				
			</main>
			
<?php include 'php/footer.php';?>
