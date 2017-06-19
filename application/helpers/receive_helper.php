<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('handleReceivedMessage'))
{
    function handleReceivedMessage($bot_account, $user, $message) {

		$temp = & get_instance();
		$temp->load->helper('send_helper');
		$temp->load->helper('format_helper');
		$temp->load->helper('session_helper');
		$temp->load->helper('auth_helper');
		$temp->load->model('session_model');


		#'Hello world!' of this bot.
		if ($message == 'halo') {

			sendReply($user, 'Hai '.$user->username.'!');
			return;
		}

		#Check if the user has login session
		$status = checkSessionStatus($user);
		if ($status != 'logged_on') {
			
			#Status: Already asked for password, $message expected to be user password.
			if ($status == 'trying_to_login') {

				#Retrieve token and token secret for this session.
				verifyUser($bot_account, $user, $message);

			}

			#Status: First time using this bot / login session expired.
			else {

				#Create new / renew session.
				deleteSession($user);
				createSession($user); #last_session => trying_to_login

				#Ask password.
				sendReply($user, 'Hai '.$user->username."! \nSilakan masukkan password anda untuk melanjutkan.");
				
			}

			return;

		} 

		#TODO:
		#BOT MAIN FUNCTION
		$session = $temp->session_model->find_session($user->username);
		$user->token 		= $session['token'];
		$user->token_secret = $session['token_secret']; 
		$user->last_session = $session['last_session'];

		if ($message == 'menu') {

			sendReply($user, 'Hai '.$user->username."!\nAnda sekarang berada di menu.");

		}

	}   
}
