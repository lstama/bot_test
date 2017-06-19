<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('generateSignature'))
{
    function generateSignature($hookSecret, $httpBody, $httpDate) {
    	
    	$stringToEncode = $httpDate . $httpBody;
    	$hashedString 	= base64_encode(hash_hmac('sha256', $stringToEncode, $hookSecret, true));
    	
        return $hashedString;

	}   
}

if ( ! function_exists('basicAuth'))
{
    function basicAuth($username, $password) {
    	
    	$stringToEncode = $username . ':' . $password;
    	$hashedString 	= base64_encode($stringToEncode);
    	
        return 'Basic ' . $hashedString;

	}   
}
