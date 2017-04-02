<?php
	include 'se_connect.php';
	
	//$distance_limit = 5;
	//$consumer_locx = 1;
	//$consumer_locy = 1;
	
	$consumer_locx = (int)$_POST['consumer_locx'];
	$consumer_locy = (int)$_POST['consumer_locy'];
	$radial_distance = (int)$_POST['radial_distance'] + 1;
	
	//echo $consumer_locx.' '.$consumer_locy;
	//$consumer_locx = (float)$consumer_locx;
	//$consumer_locy = (float)$consumer_locy;
		
	
	$q1 = 'select service_name, service_id, provider_name,provider_locx,provider_locy,provider_phno from service JOIN provider ON 
		   service.provider_id = provider.provider_id where 
		   ((provider_locx - '.$consumer_locx.')*(provider_locx - '.$consumer_locx.')) + ((provider_locy - '.$consumer_locy.')*(provider_locy - '.$consumer_locy.')) <= '.$radial_distance.' and available = 1'; 
	
	
	//$distance = ((provider_locx - '.$consumer_locx.')*(provider_locx - 1)) + ((provider_locy - '.$consumer_locy.')*(provider_locy - '.$consumer_locy.'));
	
	$result = $handle->query($q1);	
	$output = array();	
	
	while($row = $result->fetch_assoc()){							
		$arr = array();
		$arr['service_name'] = $row['service_name'];
		$arr['service_id'] = $row['service_id'];
		$arr['provider_name'] = $row['provider_name'];	
		$arr['provider_phno'] = $row['provider_phno'];
		$arr['distance'] = (int)sqrt(($row['provider_locx']-$consumer_locx)*($row['provider_locx']-$consumer_locx)+($row['provider_locy']-$consumer_locy)*($row['provider_locy']-$consumer_locy));
		array_push($output,$arr);
	}		
	echo  json_encode($output);
?>
