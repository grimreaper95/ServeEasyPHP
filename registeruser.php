<?php
	include 'connect.php';
	$user_name = $_GET['user_name'];
	$password = $_GET['password'];
	$q2 = "Insert into userinfo VALUES ('".$user_name."','".$password."')";
	$res = $handle->query($q2);
	if($res)
		echo 'success';
	else
		echo $handle->error;
?>