<?php
	
	include 'se_connect.php';
	$type = $_POST['user_type'];
	$name = $_POST['name'];	
	$phone = $_POST['mobile_no'];
	$password = $_POST['password'];	
	$addr = $_POST['address'];		
	$loc_x = $_POST['loc_x'];
	$loc_y = $_POST['loc_y'];
		
	//$q = "insert into PROVIDER VALUES (NULL,'".$name."','".$phone."','".$password."','".$addr."','".$loc_x."','".$loc_y."',0)";		
	//echo $q;
	
	if($type == "provider"){	
		$q = "insert into PROVIDER VALUES (NULL,'".$name."','".$phone."','".$password."','".$addr."','".$loc_x."','".$loc_y."' ,0)";				
		$result = $handle->query($q);			
		echo 'success';
	}
	
	else if($type == "consumer"){		
		$q = "insert into CONSUMER VALUES (NULL,'".$name."','".$phone."','".$password."','".$addr."',50)";
		$result = $handle->query($q);
	}
	else 
		echo 'fail';
		
?>