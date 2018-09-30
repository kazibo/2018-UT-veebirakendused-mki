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
	$sql = "SELECT COUNT(*) AS amount FROM `Sessions` where time >= date_sub(now(), interval 1 week)";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	echo $row["amount"];
 }
 $conn->close();
?>