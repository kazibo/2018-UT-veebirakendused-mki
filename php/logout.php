<?php
	session_start();
    session_unset();
    session_destroy();
	echo "<script type='text/javascript'>alert('See you later!');</script>";
	header("Location: /index.php");
?>