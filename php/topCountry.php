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
	$sql = "SELECT country FROM Sessions GROUP BY country ORDER BY COUNT(country) DESC LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$result = $row["country"];
	echo $result;
 }
 $conn->close();
?>