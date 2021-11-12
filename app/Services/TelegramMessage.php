<?php 

namespace App\Services;

class TelegramMessage {

	private $telegrambot_token;

	public function __construct() {
		$this->telegrambot_token = env('TELEGRAM_BOT_TOKEN');
	}

	public function sendMessage($data = []) {
	    $url= 'https://api.telegram.org/bot'.$this->telegrambot_token.'/sendMessage'; 
	    $data = [
	    	'chat_id' => $data['chat_id'],
	    	'text' => $data['text']
	    ];
	    $options = [
	    	'http' => [
	    	'method'=>'POST',
	    	'header'=>"Content-Type:application/x-www-form-urlencoded\r\n",
	    	'content' => http_build_query($data),
	        ],
	    ];
	    $context = stream_context_create($options);
	    $result = file_get_contents($url, false, $context);
	    return $result;
	}

	public function sendLocation($data = []) {
	    $url= 'https://api.telegram.org/bot'.$this->telegrambot_token.'/sendLocation'; 
	    $data = [
	    	'chat_id' => $data['chat_id'],
	    	'latitude' => $data['latitude'],
	    	'longitude' => $data['longitude']
	    ];
	    $options = [
	    	'http' => [
	    	'method'=>'POST',
	    	'header'=>"Content-Type:application/x-www-form-urlencoded\r\n",
	    	'content' => http_build_query($data),
	        ],
	    ];
	    $context = stream_context_create($options);
	    $result = file_get_contents($url, false, $context);
	    return $result;
	}

}

?>