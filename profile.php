<!doctype html>

<html lang="en">
	<head>
		<title>Your profile's page</title>
		<meta name="robots" content="nofollow">
		<meta name="description" content="Your profile page">

<?php include 'php/header.php';?>

			<?php session_start(); ?>
			<section class="sel">
				<div class="info">
					<h2><?php echo $_SESSION['username']."'s profile"; ?></h2>
				</div>
			</section>
			
			<main class="main_part">
				<hr>
				<div class="userpic">
					<?php echo '<img src= "userimages/image_'.$_SESSION['username'].'.png" class="up" alt="userimage">' ?>
				</div>
				<?php
				   if(isset($_FILES['image'])){
					  $errors= array();
					  $file_name = $_FILES['image']['name'];
					  $file_size =$_FILES['image']['size'];
					  $file_tmp =$_FILES['image']['tmp_name'];
					  $file_type=$_FILES['image']['type'];
					  $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
					  
					  $expensions= array("png");
					  
					  if(in_array($file_ext,$expensions)=== false){
						 $errors[]="extension not allowed, please choose a PNG file.";
					  }
					  
					  if($file_size > 2097152){
						 $errors[]='File size must be excately 2 MB';
					  }
					  
					  if(empty($errors)==true){
						 move_uploaded_file($file_tmp,"userimages/image_".$_SESSION['username'].".png");
						 echo "Success";
					  }else{
						 print_r($errors);
					  }
				   }
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="file" name="image" />
					<input type="submit"/>
				</form>
			</main>
			
<?php include 'php/footer.php';?>