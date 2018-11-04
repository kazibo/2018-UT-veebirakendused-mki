<?php
 session_start();
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
	}
	else
	{
		header('Location: /index.php');
	}

 echo "<p>IP Address : ".$ipaddress."</p>";
 echo "<p>Current Page : ".$page."</p>";
 echo "<p>Current Time : ".$datetime."</p>";
 echo "<p>Browser : ".$useragent."</p>";
 
?>