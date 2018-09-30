<?php
 include 'php/browser.php';
 $ua=getBrowser();
 $ip = $_SERVER['REMOTE_ADDR'];
 $details = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip={$ip}"));
 $browser = $ua['name'];
 $opsys = $ua['platform'];
 $country = $details->geoplugin_countryName;
 
 $ipaddress = $_SERVER['REMOTE_ADDR'];
 $page = "http://".$_SERVER['HTTP_HOST']."".$_SERVER['PHP_SELF'];

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
	$sql = "INSERT INTO Sessions(ip, browser, page, country, opsys)
	values('$ipaddress','$browser','$page','$country','$opsys')";
 }
 $conn->query($sql);
 $conn->close();
?>