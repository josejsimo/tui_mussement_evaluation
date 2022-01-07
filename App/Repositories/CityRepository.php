<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;

use Config\AppConfig;
use App\Services\HttpService;
use App\Repositories\Common\Repository;

class CityRepository extends Repository implements RepositoryInterface {

	function __construct() {
		$this->api_url = AppConfig::$TuiMussementApi;
	}

	public function get($city = null) {
		try {
			return json_decode(HttpService::HttpRequest($this->api_url));
		}
		catch(\Throwable $ex) {
			throw $ex;
		}
	}

	public function set($cityWeather) {

	}	
}

?>