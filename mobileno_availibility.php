<?php
	include 'se_connect.php';
	$mobile_no = $_POST['mobile_no'];	
	$user_type = $_POST['user_type'];	
	//$q = "select provider_id from provider where provider_phno = '000'";
	$q = "select ".$user_type."_id from ".$user_type." where ".$user_type."_phno = '".$mobile_no."'";
	$res = $handle->query($q);	
	$cnt = mysqli_num_rows($res);
	if($cnt > 0)
		echo 'fail';
	else
		echo 'success';
?>