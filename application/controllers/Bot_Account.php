<?php

class Bot_Account {

	public $username 	;
	public $password 	;
	public $bot_id 		;
	public $hookSecret  ;
	public $consumer_key;
	public $consumer_secret;

	public function __construct() {

		$this->username  = getenv('BOT_USERNAME');
		$this->password  = getenv('BOT_PASSWORD');
		$this->bot_id 	 = getenv('BOT_ID');
		$this->hookSecret= getenv('BOT_HOOK_SECRET');
		$this->consumer_key = getenv('BOT_CONSUMER_KEY');
		$this->consumer_secret = getenv('BOT_CONSUMER_SECRET'); 

	}
}