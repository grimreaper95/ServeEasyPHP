<?php
	include 'se_connect.php';
	$provider_id = 501;
	
	$q =  "select request_id,category_name,quantity,consumer_name 
		   from request join category
	       on request.category_id = category.category_id 
		   join consumer on request.consumer_id = consumer.consumer_id 
		   where request.provider_id = ".$provider_id." and seen = 0";
    $output = array();							
	$result = $handle->query($q);	
	while($row = $result->fetch_assoc()){							
		$arr = array();
		$arr['request_id'] = $row['request_id'];
		$arr['category_name'] = $row['category_name'];
		$arr['quantity'] = $row['quantity'];
		$arr['consumer_name'] = $row['consumer_name'];			
		array_push($output,$arr);
	}
	echo json_encode($output);
?>