<?php
	include 'connect.php';
	$user_name = $_GET['user_name'];
	$password = $_GET['password'];
	$q = "Select * from userinfo where user_name = '$user_name' and password = '$password'";
	$result = $handle->query($q);
	$obj = $result->fetch_object();
	$output["count"] = $result->num_rows;
	if($result->num_rows > 0)
	$output["type"] = $obj->user_type;
	echo json_encode($output);
?>