<?php

include 'User.php';
include 'Bot_Account.php';

class Kaskus_Hooks extends CI_Controller {


	public function hook() {

		if ($this->input->server('REQUEST_METHOD') == 'POST') {

			$bot_account	= new Bot_Account;
			$header 		= $this->input->request_headers();
			$httpBody 		= file_get_contents('php://input');
			$httpDate 		= $header['Date'];
			$signature 		= $header["Obrol-signature"];


			$this->load->helper('auth_helper');

			if ($signature == generateSignature($bot_account->hookSecret, $httpBody, $httpDate)) {

				$this->load->helper('receive_helper');

				$body 			= json_decode($httpBody);
				$user 			= new User($body->from, $body->fromPlain);
				$message 		= $body->body;

				handleReceivedMessage($bot_account, $user, $message);
				
			} 

			else {

				echo 'failed on hook';
			}
		}

	}
}