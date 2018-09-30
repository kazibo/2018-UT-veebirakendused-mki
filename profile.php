<?php include 'php/header.php';?>
			<?php session_start(); ?>
			<div class="info">
				<?php echo $_SESSION['username']."'s profile"; ?>
			</div>
			
<?php include 'php/footer.php';?>