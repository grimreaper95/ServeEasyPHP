<?php
	
//update_request_status.php

/*
	0 -> delete
	1 -> active
	2 -> pending
	3 -> delivered
	4 -> cancelled
	5 -> failed
*/

	include 'se_connect.php';
	$request_id = (int)$_POST['request_id'];
	$status = (int)$_POST['status'];	
	
	if($status == 2){
		$q1 = "update request set status = ".$status." where request_id = ".$request_id;
		$q2 = "update request set seen = 2 where request_id = ".$request_id;		
		$result1 = $handle->query($q1);
		$result2 = $handle->query($q2);
		if($result1 && $result2)
			echo "success";
		else
			echo $handle->error;
	}
	else if($status == 4){
		$q1 = "update request set status = ".$status." where request_id = ".$request_id;
		$q2 = "update request set seen = 4 where request_id = ".$request_id;
		$result1 = $handle->query($q1);
		$result2 = $handle->query($q2);
		if($result1 && $result2)
			echo "success";
		else
			echo $handle->error;
	}
	else {
		$q1 = "update request set status = ".$status." where request_id = ".$request_id;	
		$q2 = "update request set seen = 3 where request_id = ".$request_id;		
		$result1 = $handle->query($q1);
		$result2 = $handle->query($q2);
		if($result1 && $result2)
			echo "success";
		else
			echo $handle->error;
	}
?>
