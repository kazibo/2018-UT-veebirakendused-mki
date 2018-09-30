<?php
	session_start();
	
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		if($_SERVER['PHP_SELF'] == "/profile.php")
		{
			include 'logoutButton.php';
		}
		else
		{
			include 'profileButton.php';
			//include 'usersData.php';
		}
		//echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
	}
	else
	{
		include 'logRegButtons.php';
		
		if($_SERVER['PHP_SELF'] == "/profile.php")
		{
			header("Location: /index.php");
		}
		//session_destroy();
	} 
?>