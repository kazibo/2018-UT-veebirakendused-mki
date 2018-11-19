<?php include "php/languages/config.php"; ?>
<!doctype html>

<html lang="en">
	<head>
		<title><?php echo $lang['title'] ?></title>
		<meta name="description" content="Welcome to Nelichan - Estonian social forum site">

<?php include 'php/header.php';?>
<?php include 'php/usersData.php';?>
			
			<main class="main_part">
					<a class="magic" href="#stats"><?php echo $lang['stat_check'];?></a>
					<div class="bunny">
						<img src= "images/unavailable.gif" class="jb" alt="jumping bunny">
					</div>
					
					<div class="magic">
						<?php echo $lang['gif'] ?>
					</div>
			</main>
				<section class="sel">
					<div id="stats" class="stats"><h2><?php echo $lang['stat_title'];?></h2></div>
					<div class="stats_info"> <?php echo $lang['stat_visitors'] . ":";?>
						<div id="visitors"></div>
					</div>
					
					<div class="stats_info"><?php echo $lang['stat_country'] . ":";?>
						<div id="country"></div>
					</div>
					
					<div class="stats_info"><?php echo $lang['stat_browser'] . ":";?>
						<div id="browser"></div>
					</div>
					
					<div class="stats_info"><?php echo $lang['stat_os'] . ":";?>
						<div id="OS"></div>
					</div>
				</section>
<?php include 'php/footer.php';?>