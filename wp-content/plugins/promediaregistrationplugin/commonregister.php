<?php //$subject= html_entity_decode($rec_info['subject'] , ENT_NOQUOTES);
//$crm_nlid = 194;
/*$url = 'http://services.itp.com/ITPauth/Register';

                                $data = 'email='.urlencode($email).'&nlid='.$crm_nlid;
                                $ch = curl_init(); // initialize curl handle
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
                                curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
                                curl_setopt($ch, CURLOPT_POST, 60); // times out after 20s
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // add POST fields
                                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                                $result = curl_exec($ch); // run the whole process & set $result=response from server

                                print_r($result);
								if(curl_error($ch)=='') {
                                            $msg = "REgistered Successfully".$ch." - check your inbox.";
                                }
                                else {
                                            $msg = "CURL ERROR (" . curl_error($ch) . ") ! Newsletter test For : ".$subject." NOT sent.";
                                }
                                curl_close($ch);
								echo $msg;*/
								
								//print_r($_POST);
								$post =  http_build_query($_POST);
$url = "http://services.itp.com/ITPauth/Register";
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
    if(sizeof($result))
	{
		
		$msg=(isset($result->SessionKey) and !empty($result->SessionKey)) ?  "success" : "fail";
		$errormsg=(isset($result->error) and !empty($result->error)) ?  $result->error : "noerror";
	}
	
	echo json_encode(array("status"=>$msg,"message"=>$errormsg));
/*	else
	{
		
	}*/