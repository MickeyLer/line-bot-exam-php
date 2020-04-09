<?php

	$conn = new mysqli("localhost","u136290615_user","HYIegy`b","u136290615_sub") or die ("connect error".mysqli_error());
	// Check connection
	if ($conn->connect_error) {
   		die("Connection failed: " . $conn->connect_error);
	}
	echo "Connected successfully";
?>

 








