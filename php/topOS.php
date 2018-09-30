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
	$sql = "SELECT opsys FROM Sessions GROUP BY opsys ORDER BY COUNT(opsys) DESC LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$result = $row["opsys"];
	echo ucfirst($result);
 }
 $conn->close();
?>