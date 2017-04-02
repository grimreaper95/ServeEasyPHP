<?php
	include 'se_connect.php';
	
	$provider_id = (int)$_POST['provider_id'];
	$type = $_POST['type'];
		
	if($type == 'active'){
		$status = 1;		
	}
	else{
		$status = 2;		
	}	
	
	$q1 = "select due_date,request_id,consumer_name,consumer_phno,category_name,quantity,address,provider_locx,provider_locy,consumer_locx,consumer_locy from 
		  request join consumer on request.consumer_id = consumer.consumer_id join category 
		  on request.category_id = category.category_id join provider on provider.provider_id = request.provider_id 
		  and request.provider_id = ".$provider_id." and request.status = ".$status;		  
	$output = array();		
		$result = $handle->query($q1);		
		while($row = $result->fetch_assoc()){							
			$arr = array();
			$arr['consumer_name'] = $row['consumer_name'];
			$arr['consumer_phno'] = $row['consumer_phno'];
			$arr['category_name'] = $row['category_name'];
			$arr['quantity'] = $row['quantity'];				
			$arr['request_id'] = $row['request_id'];			
			$arr['address'] = $row['address'];	
			$arr['due_date'] = $row['due_date'];
			$arr['distance'] = (int)sqrt(($row['provider_locx']-$row['consumer_locx'])*($row['provider_locx']-$row['consumer_locx'])+($row['provider_locy']-$row['consumer_locy'])*($row['provider_locy']-$row['consumer_locy']));
			array_push($output,$arr);
		}					
echo json_encode($output);		

/*	else{
		$result = $handle->query($q1);		
		while($row = $result->fetch_assoc()){							
			$arr = array();
			$arr['consumer_name'] = $row['consumer_name'];
			$arr['category_name'] = $row['category_name'];
			$arr['request_id'] = $row['request_id'];
			$arr['quantity'] = $row['quantity'];	
			$arr['address'] = $row['address'];	
			$arr['distance'] = (int)sqrt(($row['provider_locx']-$row['consumer_locx'])*($row['provider_locx']-$row['consumer_locx'])+($row['provider_locy']-$row['consumer_locy'])*($row['provider_locy']-$row['consumer_locy']));
			array_push($output,$arr);
		}			
	}	*/
	
		
?>