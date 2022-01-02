<?php

namespace App\Repositories;

use Config\AppConfig;
use App\Services\HttpService;

class CityRepository {

	private $api_url = null;

	function __construct() {
		$this->api_url = AppConfig::$TuiMussementApi;
	}

	public function get($city = null) {
		try {
			return json_decode(HttpService::HttpRequest($this->api_url));
		}
		catch(Throwable $ex) {
			throw $ex;
		}
	}

	public function set($cityWeather) {

	}	
}

?>