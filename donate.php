<!doctype html>

<html lang="en">
	<head>
		<title>Nelichan Donations</title>
		<meta name="description" content="Wish to support us? Here you can do that, every donation is appreciated">

<?php include 'php/header.php';?>
			<section class="sel">
				<div class="info">
					<h2>Donate page</h2>
				</div>
			</section>
			
			<main class="main_part">
				<hr>
					<form class="donation" method="post" action="php/pay.php">
						<div class="donation-container">
							
							<label for="damount"><strong>Amount</strong></label>
							<input type="text" placeholder="Amount" name="damount" id="damount" required>
							
							<div class="clearfix">
								<button type="submit">Proceed</button>
							</div>
							
						</div>
					</form>
			</main>
			
<?php include 'php/footer.php';?>