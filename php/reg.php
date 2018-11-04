<?php 

 $email = filter_input(INPUT_POST, 'email');
 $username = filter_input(INPUT_POST, 'username');
 $password = filter_input(INPUT_POST, 'password');
 $password_r = filter_input(INPUT_POST, 'password-repeat');
 
 
if(!empty($username) && !empty($password) && !empty($email) && $password == $password_r)
{
	require_once("/external_includes/dbdata.php");

	// Create connection
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()){
	  die('Connect Error ('. mysqli_connect_errno() .') '
		. mysqli_connect_error());
	}
	else{
		$enq_pass = MD5($password);
		
		$stmt = $conn->prepare("INSERT INTO Users (username, password, email) values (?,'$enq_pass',?)");
		$stmt->bind_param("ss",$username,$email);
		
		if ($stmt->execute())
		{
			$subject = "Nelichan Registration Confirmation";
			$txt = "Hi, thanks for your registration.";
			//$headers = "";//"From: webmaster@example.com" . "\r\n" ."CC: somebodyelse@example.com";

			mail($email,$subject,$txt);
			
			echo "<script type='text/javascript'>alert('Account created!');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Something went wrong!');</script>";
			header('Location: /index.php');
		}
		$conn->close();
	}
}
else
{
	if($password !== $password_r)
	{
		echo "<script type='text/javascript'>alert('Passwords does not match!');</script>";
		header('Location: /index.php');
	}
	elseif(empty($password))
	{
		echo "<script type='text/javascript'>alert('Please enter your password!');</script>";
		header('Location: /index.php');
	}
	elseif(empty($username))
	{
		echo "<script type='text/javascript'>alert('Please enter your username first!');</script>";
		header('Location: /index.php');
	}
	elseif(empty($email))
	{
		echo "<script type='text/javascript'>alert('Please enter your email!');</script>";
		header('Location: /index.php');
	}
	die();
}
 ?>