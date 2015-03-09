<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
 session_start();
$post =  http_build_query($_POST);
$url = "http://services.itp.com/ITPauth/Authenticate/";
//$post = "subscribe=subscribe&l=17846&e=test@ffmi.com";
	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    if(!empty($post)) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    } 
    $result = curl_exec($ch);
    curl_close($ch);
	$dat=json_decode($result);
	$result=$dat;
	//print_r($result);
    if(sizeof($result))
	{
		$msg=(isset($result->SessionKey) and !empty($result->SessionKey)) ?  "success" : "fail";
		$errormsg=(isset($result->error) and !empty($result->error)) ?  $result->error : "noerror";
		$uname = $result->response->name;
	}
	//echo $msg;
	if((isset($result->SessionKey) and !empty($result->SessionKey)) ){
		 $_SESSION['name'] = $result->response->name;
	}
	echo json_encode(array("status"=>$msg,"message"=>$errormsg,"name"=>$uname));
	//print_r($_SESSION);
/*	else
	{
		
	}*/