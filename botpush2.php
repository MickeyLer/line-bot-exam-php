<?php
	mysql> CREATE USER 'u136290615_user'@'127.0.0.1' IDENTIFIED BY 'HYIegy`b';
	mysql> GRANT ALL PRIVILEGES ON *.* TO 'u136290615_user'@'127.0.0.1'
  	  ->     WITH GRANT OPTION;
	mysql> CREATE USER 'u136290615_user'@'127.0.0.1' IDENTIFIED BY 'HYIegy`b';
	mysql> GRANT ALL PRIVILEGES ON *.* TO 'u136290615_user'@'%'
  	  ->     WITH GRANT OPTION;

	$conn = new mysqli("127.0.0.1","u136290615_user","HYIegy`b","u136290615_sub");
	// Check connection
	if ($conn->connect_error) {
   		die("Connection failed555: " . $conn->connect_error);
	}
	echo "Connected successfully";
?>

 








