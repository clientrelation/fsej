<?php							//print_r($_POST);
								$main =  $_POST['Main'];
								//print_r($main);
$url = "http://services.itp.com/ITPauth/GetIndustry/";
$data = 'Main='.$main;
//print_r($data);
    $ch = curl_init(); // initialize curl handle
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // return into a variable
                                curl_setopt($ch, CURLOPT_URL, $url); // set url to post to
                                curl_setopt($ch, CURLOPT_POST, 60); // times out after 20s
                                curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // add POST fields
                                curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
                                $result = curl_exec($ch); // run the whole process & set $result=response from server
								//$result=json_decode($result);
								//print_r($result);
								echo (json_encode($result));