<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('oauthenticate'))
{
    function oauthenticate($username, $password) {
    	
    	#todo: Waiting for kaskus api to complete this code
    	#temp:
    	$result['status'] = true;
    	$result['token'] = true;
    	$result['token_secret'] = true;
    	
    	return $result;
	}   
}