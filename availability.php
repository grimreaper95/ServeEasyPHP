<?php
	include 'se_connect.php';
	$user_id = $_POST['user_id'];	
	$availability_status = $_POST['availability_status'];
	
	$q = "update provider set available = ".$availability_status." where provider_id = ".$user_id;
	$res = $handle->query($q);	
	if($res){
		echo 'Success';
	}
	else{
		echo 'Error';
	}
?>