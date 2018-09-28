<?php 

 $username = filter_input(INPUT_POST, 'username');
 $password = filter_input(INPUT_POST, 'password');
 //$email = filter_input(INPUT_POST, 'email');
 
if(!empty($username))
{
	if(!empty($password))
	{
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "rootroot";
		$dbname = "Data";

		// Create connection
		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

		if (mysqli_connect_error())
		{
		  die('Connect Error ('. mysqli_connect_errno() .') '
			. mysqli_connect_error());
		}
		else
		{
			$enq_pass = MD5('$password');
			$sql = "INSERT INTO Users (username, password, email)
			values ('$username','$enq_pass','works')";
			if ($conn->query($sql)){
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
		echo "<script type='text/javascript'>alert('Please enter your password!');window.location='index.html';</script>";
		die();
	}	
}
else
{
	echo "<script type='text/javascript'>alert('Please enter your username first!');window.location='index.html';</script>";
	die();
}
 ?>