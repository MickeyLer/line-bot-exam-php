<?php

	$db = new mysqli("localhost","u136290615_user","HYIegy`b","u136290615_sub") or die ("connect error".mysqli_error());
	$sql = $db->query("SELECT * FROM sub_autonotify");
	echo print _r ($sql);
?>

 








