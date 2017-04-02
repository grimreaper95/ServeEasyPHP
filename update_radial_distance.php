<?php
	include 'se_connect.php';
	$consumer_id = $_POST['consumer_id'];
	$radial_distance = $_POST['radial_distance'];
	$q = 'update consumer set radial_distance = '.$radial_distance.' where consumer_id = '.$consumer_id;
	$res = $handle->query($q);
	if($res){
		echo 'success';
	}
	else{
		echo 'error';
	}
?>