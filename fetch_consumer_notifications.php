<?php
	include 'se_connect.php';
	$consumer_id =  $_POST['consumer_id'];	
	///$consumer_id = 3;	
	$q =  "select request_id,provider_id,category_name,quantity,consumer_name,seen 
		   from request join category
	       on request.category_id = category.category_id 
		   join consumer on request.consumer_id = consumer.consumer_id 
		   where request.consumer_id = ".$consumer_id." and seen = 2 OR seen = 4";		   
    $output = array();							
	$result = $handle->query($q);	
	while($row = $result->fetch_assoc()){							
		$arr = array();
		$arr['request_id'] = $row['request_id'];
		$arr['category_name'] = $row['category_name'];
		$arr['quantity'] = $row['quantity'];
		$arr['seen'] = $row['seen'];
		$arr['consumer_name'] = $row['consumer_name'];			
		array_push($output,$arr);
	}
	echo json_encode($output);
?>