<?php

	$db = new mysqli("localhost","u136290615_user","HYIegy`b","u136290615_sub") or die ("connect error".mysqli_error());
	
	$db->set_charset("utf8");
	
	$sql = $db->query("SELECT * FROM Sub_autonotify");

	while ($n = $sql->fetch_object()){
		echo $n->name. "<br />";
	}

 








