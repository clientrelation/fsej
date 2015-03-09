<?php
   include("shared.php"); 
   $code = str_decrypt($_REQUEST["security_check"]);
if(empty($_REQUEST['security_code'] ) ||
	  strcasecmp($code, $_REQUEST['security_code']) == 0) {
    echo 'true';
	//echo json_encode(array('status' => 1, 'message' => 'Great!'));
    }else{
    echo 'false';
	//echo json_encode(array('status' => 0, 'message' => 'please fix the field'));
    }