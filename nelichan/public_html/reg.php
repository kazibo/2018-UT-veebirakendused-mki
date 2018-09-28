<?php 

 $email = filter_input(INPUT_POST, 'email');
 $username = filter_input(INPUT_POST, 'username');
 $password = filter_input(INPUT_POST, 'password');
 $password_r = filter_input(INPUT_POST, 'password-repeat');
 
 
if(!empty($username) && !empty($password) && !empty($email) && $password == $password_r)
{
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "rootroot";
	$dbname = "Data";

	// Create connection
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()){
	  die('Connect Error ('. mysqli_connect_errno() .') '
		. mysqli_connect_error());
	}
	else{
		$enq_pass = MD5($password);
		$sql = "INSERT INTO Users (username, password, email)
		values ('$username','$enq_pass','$email')";
		if ($conn->query($sql))
		{
			$subject = "Nelichan Registration Confirmation";
			$txt = "Hi, thanks for your registration.";
			$headers = "From: webmaster@example.com" . "\r\n" ."CC: somebodyelse@example.com";

			mail($email,$subject,$txt,$headers);
			
			echo "<script type='text/javascript'>alert('Account created!');window.location='index.html';</script>";
		}
		else{
		//echo "Error: ". $sql ."". $conn->error;
		echo "<script type='text/javascript'>alert('Something went wrong!');window.location='index.html';</script>";
		}
		$conn->close();
	}
}
else
{
	if($password !== $password_r)
	{
		echo "<script type='text/javascript'>alert('Passwords does not match!');window.location='index.html';</script>";
	}
	elseif(empty($password))
	{
		echo "<script type='text/javascript'>alert('Please enter your password!');window.location='index.html';</script>";
	}
	elseif(empty($username))
	{
		echo "<script type='text/javascript'>alert('Please enter your username first!');window.location='index.html';</script>";
	}
	elseif(empty($email))
	{
		echo "<script type='text/javascript'>alert('Please enter your email!');window.location='index.html';</script>";
	}
	die();
}
 ?>