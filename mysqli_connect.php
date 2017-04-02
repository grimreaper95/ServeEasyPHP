<?php
	$result = $handle->query('select * from service_provider where username = "shashank"');
	$handle = new mysqli('localhost','root','','serve_easy');
	echo $result->num_rows;
?>