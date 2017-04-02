<?php
	include 'se_connect.php';
	$mobile_no = "123";//$_POST['user_mobile_no'];
	$user_type = "provider";//$_POST['user_type'];
	
	$q = "select ".$user_type."_id from ".$user_type." where ".$user_type."_phno = ".$mobile_no;
	echo $q;
	$res = $handle->query($q);
	$cnt = mysqli_num_rows($res);
	if($cnt > 0){					
				$authKey = "YourAuthKey";				
				//Multiple mobiles numbers separated by comma
				$mobileNumber = $mobile_no;								
				$senderId = "102234";				
				//Your message to send, Add URL encoding here.
				$message = urlencode("Your OTP is :");								
				$route = "default";
				$postData = array(
					'authkey' => $authKey,
					'mobiles' => $mobileNumber,
					'message' => $message,
					'sender' => $senderId,
					'route' => $route
				);
				//API URL
				$url="https://control.msg91.com/api/sendhttp.php";							
				$ch = curl_init();
				curl_setopt_array($ch, array(
					CURLOPT_URL => $url,
					CURLOPT_RETURNTRANSFER => true,
					CURLOPT_POST => true,
					CURLOPT_POSTFIELDS => $postData
					//,CURLOPT_FOLLOWLOCATION => true
				));			
				//Ignore SSL certificate verification
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);								
				$output = curl_exec($ch);				
				//Print error if any
				if(curl_errno($ch)){
					echo 'error:' . curl_error($ch);
				}				
				curl_close($ch);				
				echo $output;				
	}
	else{
		echo 'Invalid mobile no';
	}	
?>