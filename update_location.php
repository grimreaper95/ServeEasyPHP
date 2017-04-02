<?php
	include 'se_connect.php';
	$provider_id = $_POST['provider_id'];
	$loc_x = $_POST['loc_x'];
	$loc_y = $_POST['loc_y'];
	$q1 = "update provider set provider_locx= '".$loc_x."', provider_locy='".$loc_y."' where provider_id = ".$provider_id;
	//echo $q1;
	$result = $handle->query($q1);
	if($result){
		echo 'success';
	}
	else{
		echo 'error';
	}
?>