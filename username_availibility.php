<?php
	include 'se_connect.php';
	$user_name = $_POST['user_name'];
	$user_type = $_POST['user_type'];
	if($user_type == "0")
		$user_type = 'provider';
	else 
		$user_type = 'client';	
	$q = 'select '.$user_type.'_id from '.$user_type.' where '.$user_name.'_name = '.$user_name;
	$res = $handle->query($q);	
	$cnt = 0 ;
	while($row = $res->fetch_assoc()){				
		$cnt++;
	}		
	if($cnt > 0)
		return 'fail';
	return 'success';
?>