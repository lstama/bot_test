<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require 'vendor/autoload.php';
use GuzzleHttp\Client;


if ( ! function_exists('sendToChatApi'))
{
    function sendToChatApi($auth, $content_type, $body) {

    	$client = new Client;
    	
		$header["Content-Type"]  = $content_type;
		$header["Authorization"] = $auth;
		$result 		 		 = $client->post('https://api.obrol.id/api/v1/bot/send-mass', ['verify' => false, 'headers' => $header, 'body' => $body]);
		
		return $result;
		
	}   
}
