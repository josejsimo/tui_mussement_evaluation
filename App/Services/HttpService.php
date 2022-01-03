<?php

namespace App\Services;

class HttpService {

	public static function HttpRequest($url, $method = "GET") {

		try {

			$ch = curl_init();
			curl_setopt($ch, CURLOPT_HEADER, false); 
			curl_setopt($ch, CURLOPT_NOBODY, false);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
			curl_setopt($ch, CURLOPT_POST, 1);

			$output = curl_exec($ch);

			if (!curl_errno($ch)) {
				return $output;

			}

		}
		catch(Throwable $ex) {
			throw $ex;
		}

		
	}
	
}

?>