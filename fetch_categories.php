<?php
	include 'se_connect.php';	
	
	$service_id = $_POST['service_id'];	
	
	$q1 = "select service_name, provider_name,provider_phno from provider join 
		   service on provider.provider_id = service.provider_id  and 
		   service.service_id = '".$service_id."';";		   
	$result = $handle->query($q1);			
	$arr1 = array();
	while($row = $result->fetch_assoc()){								
		$arr1['service_name']  = $row['service_name'];
		$arr1['provider_name'] = $row['provider_name'];
		$arr1['provider_phno'] = $row['provider_phno'];		
	}		
	$q1 = "select category_id,category_name,price from category where service_id = '".$service_id."';";
	$result = $handle->query($q1);			
	$arr = array();
	while($row = $result->fetch_assoc()){		
		$arr2 = array();
		$arr2['category_id'] = $row['category_id'];
		$arr2['category_name'] = $row['category_name'];	
		$arr2['category_price'] = $row['price'];	
		array_push($arr,$arr2);
	}			
	$arr1['category_list'] = $arr;	
	echo json_encode($arr1);	
?>