<?php
	include 'se_connect.php';
	$providerID = (int)$_POST['providerID'];	
	$serviceName = $_POST['serviceName'];
	$noofcatetgories = $_POST['noOfCategories'];	
	
	//print_r($_POST)
	//$q5 = "Insert into CATEGORY VALUES (NULL,'".$categories[$i]."',".$service_id.",".$price[$i].")";					
	//echo $q5;
	
	$categories = array();
	$price = array();
	for( $i = 0 ; $i < $noofcatetgories ; $i++){
		array_push($categories,$_POST['category'.$i]);
		array_push($price,$_POST['price'.$i]);		
	}	
	//echo $serviceName.'    ';
	$q0 = "update service set service_name = '".$serviceName."' where provider_id = ".$providerID;	
	$res0 = $handle->query($q0);	
	//echo $handle->error;
	$flag = false;
	if($res0){			
		$q1 = "select service_id from service where provider_id = ".$providerID;	
		$res1 = $handle->query($q1);			
		if($res1){
			while($row = $res1->fetch_assoc()){				
				$service_id = $row['service_id'];		
			}			
			//echo $service_id;
			$q2 = "delete from category where service_id = ".$service_id;
			$res2 = $handle->query($q2);					
			if($res2){		
				for( $i = 0 ; $i < $noofcatetgories ; $i++){
					$q5 = "Insert into CATEGORY VALUES (NULL,'".$categories[$i]."',".$service_id.",".$price[$i].")";					
					$res5 = $handle->query($q5);					
				}	
				if($res5){
					$flag = true;						
				}						
				if($flag == true)				
					echo 'success';
			}
		}
	}
	if($flag == false)
		echo 'error';
	
?>