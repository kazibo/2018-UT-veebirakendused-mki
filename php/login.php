<?php 

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
 
 
if(!empty($username) && !empty($password))
{
	require_once("/external_includes/dbdata.php");

	// Create connection
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()){
	  die('Connect Error ('. mysqli_connect_errno() .') '
		. mysqli_connect_error());
	}
	else{
		$enq_pass = MD5($password);
		$stmt = $conn->prepare("SELECT * FROM Users WHERE (username=? or email=?) and password='$enq_pass'");
		$stmt->bind_param("ss",$username,$username);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows == 1)
		{
			session_start();
			$_SESSION['loggedin'] = true;
			$_SESSION['username'] = $username;
			echo "<script type='text/javascript'>alert('Successfully logged in!!');</script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Incorrect username or password!');</script>";
		}
		header('Location: /index.php');
		$conn->close();
	}
}
else
{
	if(empty($password))
	{
		echo "<script type='text/javascript'>alert('Please enter your password!');</script>";
		header('Location: /index.php');
	}
	elseif(empty($username))
	{
		echo "<script type='text/javascript'>alert('Please enter your username first!');</script>";
		header('Location: /index.php');
	}
	die();
}
 ?>