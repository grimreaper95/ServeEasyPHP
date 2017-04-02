<?php
	include 'se_connect.php';	
	$provider_id = 500;//(int)$_POST['provider_id'];
	//$type = $_POST['type'];	
	$status_delivered = 3;
	$status_cancelled = 4;	
	$q1 = "select request_id,consumer_name,category_name,quantity,date,due_date,status from 
		  request join consumer on request.consumer_id = consumer.consumer_id join category 
		  on request.category_id = category.category_id and request.provider_id = ".$provider_id." 
		  and (request.status = ".$status_delivered." OR request.status = ".$status_cancelled.")";		  		
	$output = array();			
	$result = $handle->query($q1);				
	while($row = $result->fetch_assoc()){		
		$arr = array();
		$arr['consumer_name'] = $row['consumer_name'];
		$arr['category_name'] = $row['category_name'];
		$arr['quantity'] = $row['quantity'];		
		$arr['request_id'] = $row['request_id'];
		$arr['date'] = $row['date'];
		$arr['due_date'] = $row['due_date'];
		if($row['status'] == 3)
			$arr['status'] = "delivered";
		else if($row['status'] == 4)
			$arr['status'] = "cancelled";
		array_push($output,$arr);
	}						
	echo json_encode($output);		
?>
