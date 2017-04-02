<?php
	include 'se_connect.php';
	$provider_id = $_POST['provider_id'];
	$q1 = 'select service_id,service_name from service where provider_id = '.$provider_id;	
	$res1 = $handle->query($q1);	
	$cnt1 = mysqli_num_rows($res1);
	if($cnt1 > 0){	
		$output = array();	
		$arr1 = array();	
		$service_id;
		while($row = $res1->fetch_assoc()){							
			$arr1['service_name'] = $row['service_name'];		
			$service_id = $row['service_id'];
		}
		array_push($output,$arr1);
		$q2 = 'select category_name,price from category where service_id = '.$service_id;
		$res2 = $handle->query($q2);
		$cnt2 = mysqli_num_rows($res2);
		if($cnt2 > 0){
			$i = 1;
			$j = 1;
			$arr2 = array();			
			while($row = $res2->fetch_assoc()){				
				$arr2['cat'.$i++] = $row['category_name'];												
				$arr2['price'.$j++] = $row['price'];												
			}												
			array_push($output,$arr2);			
		}		
		echo json_encode($output);
		
	}
?>