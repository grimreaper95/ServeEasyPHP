<?php
	include 'se_connect.php';
	
	$provider_id = '6';//$_POST['provider_id'];
	$type = 'active';//$_POST['type'];
	
	

	$q1 = "select consumer_name,category_name,quantity from 
		  request join consumer on request.consumer_id = consumer.consumer_id join category 
		  on request.category_id = category.category_id and request.provider_id = '".$provider_id."' and request.accept = 0";
		  
	
	$q2 ="select consumer_name,category_name,quantity from 
		  request join consumer on request.consumer_id = consumer.consumer_id join category 
		  on request.category_id = category.category_id and request.provider_id = '".$provider_id."' and request.accept = 1";
		  
	if($type == 'active'){
		$result = $handle->query($q1);		
		$output = array();	
		while($row = $result->fetch_assoc()){							
			$arr = array();
			$arr['consumer_name'] = $row['consumer_name'];
			$arr['category_name'] = $row['category_name'];
			$arr['quantity'] = $row['quantity'];		
			array_push($output,$arr);
		}					
	}
	
	
	else{
		$result = $handle->query($q2);		
		$output = array();	
		while($row = $result->fetch_assoc()){							
			$arr = array();
			$arr['consumer_name'] = $row['consumer_name'];
			$arr['category_name'] = $row['category_name'];
			$arr['qty'] = $row['quantity'];		
			array_push($output,$arr);
		}			
	}
	
	echo json_encode($output);
		
?>