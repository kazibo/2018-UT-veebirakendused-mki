<?php
 $host="localhost";
 $dbusername="root";
 $dbpassword="rootroot";
 $dbname="Data";
 $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
 
set_time_limit(0);
while(true)
{
	$last_ajax_call = isset($_GET['timestamp']) ? (int)$_GET['timestamp'] : null;
	clearstatcache();
	$last_change_in_data_file = time();
	//$data = 
	
	if ($last_ajax_call == null || $last_change_in_data_file > $last_ajax_call)
	{
		if (mysqli_connect_error())
		{
			die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
		}
		else
		{
			$sql = "SELECT opsys FROM Sessions GROUP BY opsys ORDER BY COUNT(opsys) DESC LIMIT 1";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			$ajax = array(
					'system' => $row["opsys"],
					'timestamp' => $last_change_in_data_file
				);

				// encode to JSON, render the result (for AJAX)
				$json = json_encode($ajax);
				echo $json;
		}
		$conn->close();

        // leave this loop step
        break;
	}
	else
	{
        // wait for 1 sec (not very sexy as this blocks the PHP/Apache process, but that's how it goes)
        sleep( 1 );
        continue;
    }
}
?>