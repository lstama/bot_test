<?php

class Bot_Account {

	public $username 	;
	public $password 	;
	public $bot_id 		;
	public $hookSecret  ;

	public function __construct() {

		$this->username  = getenv('BOT_USERNAME');
		$this->password  = getenv('BOT_PASSWORD');
		$this->bot_id 	 = getenv('BOT_ID');
		$this->hookSecret= getenv('BOT_HOOK_SECRET');

	}
}