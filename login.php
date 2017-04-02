<?php
	include 'se_connect.php';
	$user_type = $_POST['user_type'];
	$mobile_no = $_POST['mobile_no'];
	$password  = $_POST['password'];	
	$q = "select * from ".$user_type." where ".$user_type."_phno = '".$mobile_no."' and ".$user_type."_pw = '".$password."'";
	$res = $handle->query($q);
	/*if($handle->query($q)){
		echo 'success';
	}
	else 
		echo 'error';	*/
	$output = array();
	$cnt = 1;
	while($row = $res->fetch_assoc()){		
		$arr = array();
		$arr['user_name'] = $row[$user_type.'_name'];
		$arr['user_id'] = $row[$user_type.'_id'];		
		
		if($user_type == 'provider'){
			$arr['available'] = $row['available'];		
		}
		else{
			$arr['radial_distance'] = $row['radial_distance'];		
		}
		$arr['row_count'] = $cnt;
		array_push($output,$arr);
		$cnt++;
		break;
	}
	echo json_encode($output);
?>