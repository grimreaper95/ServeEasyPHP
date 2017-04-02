<?php
	include 'se_connect.php';
	$provider_id = (int)$_POST['provider_id'];
	$q1 = 'select service_id from service where provider_id = '.$provider_id;	
	$res1 = $handle->query($q1);	
	$cnt1 = mysqli_num_rows($res1);
	if($cnt1 > 0){	
		$output = array();	
		while($row = $res1->fetch_assoc()){							
			$service_id = $row['service_id'];		
		}
		array_push($output,$service_id);
		$q2 = 'select category_name from category where service_id = '.$service_id;
		$res2 = $handle->query($q2);
		$cnt2 = mysql_num_rows($res2);
		if($cnt2 > 0){
			$i = 1;
			$arr = array();
			while($row = $res2->fetch_assoc()){				
				$arr['cat' + $i++] = $row['category_name'];												
			}
		}
		array_push($output,$arr);
		json_encode($output);
		echo $output;
	}
?>