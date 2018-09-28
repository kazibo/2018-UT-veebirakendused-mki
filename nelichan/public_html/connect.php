<?php 

$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
$email = filter_input(INPUT_POST, 'email');
$host = "localhost";
$dbusername = "root";
$dbpassword = "rootroot";
$dbname = "Data";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO Users (username, password, email)
  values ('$username','$password','$email')";
  if ($conn->query($sql)){
    echo "New record is inserted sucessfully";
	var_dump ($a);
  }
  else{
    echo "Error: ". $sql ."". $conn->error;
	var_dump ($a);
  }
  $conn->close();
}

 ?>