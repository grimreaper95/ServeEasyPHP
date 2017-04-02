<?php
	include 'se_connect.php';	
	$q1 = 'select * from request';
	//$q2 = "select client_name from client where client_id = ";	
	//$q3 = 'select service_name from service where service_id = ';
	$result = $handle->query($q1);
	$count = $result->num_rows;			
	$output = array();	
	
	
	while($row = $result->fetch_assoc()){									
		$temp_client_id = $row['client_id'];	
		$temp_service_id = $row['service_id'];					
		$res = $handle->query("select client_name from client where client_id = '+$temp_client_id+';");
		
		
		while($row2 = $res->fetch_assoc()){				
			$client_name = $row2['client_name'];
		}		
		
		
		$client_loc = $row['client_loc'];						
		$temp_service_id = $row['service_id'];	
		$res = $handle->query("select service_name from service where service_id = '+$temp_service_id+';");
		while($row2 = $res->fetch_assoc()){				
			$service_name = $row2['service_name'];
		}	
		$arr = array();
		$arr['service_name'] = $service_name;
		$arr['client_name'] = $client_name;
		$arr['client_loc'] = $client_loc;		
		array_push($output,$arr);
	}	
	echo  json_encode($output);
?>