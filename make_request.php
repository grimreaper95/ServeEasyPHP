<?php
	
	include 'se_connect.php';
	/*$service_id = 4;$consumer_id = 4;
	$category_id=6;$quantity=5;
	$consumer_locx=3;$consumer_locy=4;
	$due_day=1;$due_month=2;$due_year=3;
	$day=5;$month=2;$year=2017;*/
	
	$address=$_POST['address'];
	$service_id = $_POST['service_id'];
	$consumer_id = $_POST['consumer_id'];
	$category_id = $_POST['category_id'];
	$quantity = $_POST['quantity'];
	$consumer_locx = $_POST['consumer_locx'];
	$consumer_locy = $_POST['consumer_locy'];
	$due_day  = $_POST['due_day'];
	$due_month  = $_POST['due_month'];
	$due_year  = $_POST['due_year'];	
	$day = $_POST['day'];
	$month = $_POST['month'];
	$year = $_POST['year'];
	
	
	$seen = "0";
	$accept = "1";	
	$date = $year."-".$month."-".$day;	
	
	$due_date = $due_year."-".$due_month."-".$due_day;	
	
	
	$q1 = "select provider_id from service where service_id = '".$service_id."';";	
	$result = $handle->	query($q1);
	$row = $result->fetch_assoc();
	$provider_id  = $row['provider_id'];	
		
	$q2 = "insert into REQUEST VALUES (NULL,'".$service_id."','".$provider_id."','".$consumer_id."','".$category_id."','"
	.$quantity."','".$address."','".$consumer_locx."','".$consumer_locy."','".$date."','".$due_date."','".$seen."','".$accept."')";	
	
	$result = $handle->query($q2);
	
	if($result)
		echo 'Request made successfully';
	else 
		echo 'Error in making request. Try again!';	
?>