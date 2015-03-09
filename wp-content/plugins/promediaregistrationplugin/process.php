<?php
session_start();
if(empty($_SESSION['letters_code'] ) ||
	  strcasecmp($_SESSION['letters_code'], $_REQUEST['letters_code']) == 0) {
    echo 'true';
    }else{
    echo 'false';
    }
	//echo $_SESSION['letters_code'] ,$_REQUEST['letters_code'];
//unset($_SESSION['letters_code']);
?>