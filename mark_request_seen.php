<?php
	include 'se_connect.php';
	$request_id = $_POST['request_id'];
	$seen_val = $_POST['seen_val'];
	$q = 'update request 
		  set seen = '.$seen_val.' where request_id = '.$request_id;
	$result = $handle->query($q);
	if($result)
		 echo 'success';
	else 
		 echo 'error';
?>