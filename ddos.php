<?php
session_start();
// session_destroy();
// die;
//cookie is client side (Browser) strogae
//session storage on server side 

	if(!empty($_SERVER['REMOTE_ADDR'])) {
		$client_ip = $_SERVER['REMOTE_ADDR'];
		// die($client_ip);

		//this code will run that check the client is making more then 5 request then block the ip for amking request.
		if(isset($_SESSION[$client_ip])) {
			if($_SESSION[$client_ip]['attempts'] > 5) {
				die("Access is Denied");
			}
			
		}
		
		if(isset($_SESSION[$client_ip])) {
			//if the client is access the website for 2nd time and so on
			$now = time();
			$time = $_SESSION[$client_ip]['time'];
			$new = $now - $time;
			if($new < 2) {
				$_SESSION[$client_ip]['attempts']++;
			} else {
				$_SESSION[$client_ip]['attempts'] = 0;
				$_SESSION[$client_ip]['time'] = time();
			}
		} else {
			//if client access website for the first time
			$_SESSION[$client_ip]['time'] = time();
			$_SESSION[$client_ip]['attempts'] = 1; 
		}	
		
		
	}

?>