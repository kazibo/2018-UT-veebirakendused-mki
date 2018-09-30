<?php
 $host="localhost";
 $dbusername="root";
 $dbpassword="rootroot";
 $dbname="Data";
 $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
 

 if (mysqli_connect_error())
 {
	die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
 }
 else
 {
	$sql = "SELECT browser FROM Sessions GROUP BY browser ORDER BY COUNT(browser) DESC LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$result = $row["browser"];
	echo $result;
 }
 $conn->close();
?>